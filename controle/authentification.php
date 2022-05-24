<?php
    // require 'information_BDD.php';
    
    const BDD='mysql:host=localhost;dbname=dev_web_projet_2;charset=utf8';
    const username='root';
    const password='';

    function connexion_responsable($mail_responsable_entre,$mdp){

        $connexion=new PDO(BDD,username,password);
        $reqSQL_authentification_respo="SELECT R.adresse_mail, R.Mot_de_passe_respo FROM responsable AS R WHERE R.Mot_de_passe_respo='$mdp' AND R.adresse_mail='$mail_responsable_entre';";    
        $resultat_req_authen=$connexion->prepare($reqSQL_authentification_respo);
        $resultat_req_authen->execute();

        echo $resultat_req_authen->fetchAll();
        // if ($resultat_req_authen->fetch(1)==$mail_responsable_entre && $resultat_req_authen->fetch(2)==$mdp) {
        //     echo 'Connexion réussie ! ';
        // } else {
        //     echo 'Erreur de connexion !';
        // }
        
        //  echo 'Le numéro de notre responsable est le numéro '.$preparateur_requete2->fetch();
    }

    try{
        // session_start();
        
       
        connexion_responsable($_POST["adresse_mail_CO"],$_POST["mdp_CO"]);
        

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