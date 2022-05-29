<?php
    // require 'information_BDD.php';
    
    const BDD='mysql:host=localhost;dbname=dev_web_projet_2;charset=utf8';
    const username='root';
    const password='';

    function connexion_responsable($mail_responsable_entre,$mdp){
        $connexion=new PDO(BDD,username,password);
        $reqSQL_authentification_respo="SELECT R.Nom_responsable, R.Prenom_responsable FROM responsable AS R WHERE R.Mot_de_passe_respo='$mdp' AND R.adresse_mail='$mail_responsable_entre';";    
        $resultat_req_authen=$connexion->prepare($reqSQL_authentification_respo);
        $resultat_req_authen->execute();
        
        $resultat_nom_responsable=$resultat_req_authen->fetchAll();
       foreach($resultat_nom_responsable as $data){
            $data['Nom_responsable']; //Affichage du nom de famille
            $data['Prenom_responsable'];
       }
    //    echo $data['Prenom_responsable'];
       if(isset($data['Nom_responsable']) && isset($data['Prenom_responsable'])){
            echo 'Connexion réussie !';
            $_SESSION['nom_responsable']=$data['Nom_responsable'];
            $_SESSION['prenom_responsable']=$data['Prenom_responsable'];
            //Afficher la page utilisateur
            // header('Location: espace_responsable.php');
       }else{
            echo 'Connexion échoué !';
            //Rester sur la page de connexion tout en informant le client.
            header('Location: ../modele/connexion.html'); //Affichage de la même page
            //Informer par requête AJAX.
       }

      
       

        // if ($resultat_req_authen->fetch(1)==$mail_responsable_entre && $resultat_req_authen->fetch(2)==$mdp) {
        //     echo 'Connexion réussie ! ';
        // } else {
        //     echo 'Erreur de connexion !';
        // }
        
        //  echo 'Le numéro de notre responsable est le numéro '.$preparateur_requete2->fetch();
    }

    function connexion_etudiant($mail_etudiant_entre,$mdp){
        $connexion=new PDO(BDD,username,password);
        $reqSQL_authentification_respo="SELECT E.Nom_etudiant FROM etudiant AS E WHERE E.Mot_de_passe_etu='$mdp' AND E.mail_etudiant='$mail_etudiant_entre';";    
        $resultat_req_authen=$connexion->prepare($reqSQL_authentification_respo);
        $resultat_req_authen->execute();
        
        $resultat_nom_responsable=$resultat_req_authen->fetchAll();
        // var_dump($resultat_nom_responsable);
        // exit();

       foreach($resultat_nom_responsable as $data){
            $data['Nom_responsable']; //Affichage du nom de famille
       }

       if(isset($data['Nom_responsable'])){
            echo 'Connexion réussie !';
            //Afficher la page utilisateur
            header('Location: espace_etudiant.php');
       }else{
            echo 'Connexion échoué !';
            //Rester sur la page de connexion tout en informant le client.
            header('Location: ../modele/connexion.html'); //Affichage de la même page
            //Informer par requête AJAX.
       }
    }

    try{
        session_start();
        
       
        connexion_responsable($_POST['adresse_mail_CO'],$_POST['mdp_CO']);
        

        // $reqSQL_Id_respo="SELECT R.Id_responsable FROM responsable R WHERE R.adresse_mail=$mail_responsable_entre";

        // $res=$connexion->prepare($reqSQL_mail_respo);
        // $res->execute();
        // $res2=$res->fetchAll();
        // $resultat=serialize($res2);
        // echo $resultat; 
        // $res_mail=implode("",$preparateur_requete2);
      
        // if($res2=true){
        //     echo 'Bien joué';;
        // }elseif($res2=false){
        //     echo 'Reéssayer';
        // }

        // connexion_responsable($BDD,$username,$password);
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }   

?>