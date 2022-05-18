<?php
    // require 'information_BDD.php';
    
    

    function connexion_responsable($BDD,$username,$password){

        $connexion=new PDO($BDD,$username,$password);
        $mail_responsable_entre=$_POST['adresse_mail_CO'];
        $mdp_responsable_entre=$_POST['mdp_CO'];
        $reqSQL_mdp_respo="SELECT R.Mot_de_passe_respo FROM responsable AS R WHERE R.adresse_mail=$mail_responsable_entre";    

        $reqSQL_Id_respo="SELECT R.Id_responsable FROM responsable R WHERE R.adresse_mail=:mail";

        // $preparateur_requete1=$connexion->prepare($reqSQL_mdp_respo);
        // $preparateur_requete1->execute();

        $preparateur_requete2=$connexion->prepare($reqSQL_Id_respo);
        $preparateur_requete2->execute(
            [
                ':mail' => $mail_responsable_entre
            ]

        );

        // $resultat_requete_mdp=$preparateur_requete1->fetch();
        // if(strcmp($resultat_requete_mdp, $mdp_responsable_entre)==0){
        //     echo "connexion résussie";
        // }else{
        //     echo "échec de la connexion";
        // }   

        echo 'Le numéro de notre responsable est le numéro '.$preparateur_requete2->fetchObject();
    }

    try{
        session_start();
        $BDD= 'mysql:host=localhost;dbname=dev_web_projet_2;charset=utf8';
        $username='root';
        $password='';
       
        connexion_responsable($BDD,$username,$password);
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }   

?>