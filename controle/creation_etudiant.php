<?php

    const BDD='mysql:host=localhost;dbname=dev_web_projet_2;charset=utf8';
    const username='root';
    const password='';    
    $nom="";
    $prenom="";
    $mail="";
    $mdp="";
    if(isset($_POST['nom'])  ||isset($_POST['prenom'])  || isset($_POST['mail'])  || isset($_POST['mdp']) ){
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $mail=$_POST['mail'];
        $mdp=$_POST['mdp'];
    }
    
    $reqSQL_verif_mails_responsable="SELECT R.adresse_mail FROM responsable AS R;";//Pour vérifier si notre inscrit n'a pas de compte responsable
    $req_SQL_etudiant="INSERT INTO etudiant VALUES(NULL,'$nom','$prenom','$mail',0,'$mdp');"; //Insertion d'un étudiant dans la BDD
    $reqSQL_verif_doublon_mail="SELECT E.mail_etudiant FROM etudiant AS E;";
    $connexion=new PDO(BDD,username,password);

    $envoie_requete_verif_mail=$connexion->prepare($reqSQL_verif_doublon_mail);
    $envoie_requete_verif_mail->execute();
    $resultat_mail_etu_respo=$envoie_requete_verif_mail->fetchAll();

    $envoyer_inscription=true;
    foreach($resultat_mail_etu_respo as $data){
        if($mail==$data['mail_etudiant']){
            $envoyer_inscription=false;
        }
    
    }

    $envoie_requete_verif_mail_responsable=$connexion->prepare($reqSQL_verif_mails_responsable);
    $envoie_requete_verif_mail_responsable->execute();
    $resultat_requete_verif_mail_responsable=$envoie_requete_verif_mail_responsable->fetchAll();
    //Boucle foreach pour vérifier tous les mails des responsables
    foreach($resultat_requete_verif_mail_responsable as $data_mails_responsable){
        if($mail==$data_mails_responsable['adresse_mail']){
            $envoyer_inscription=false;
        }
    }  
    
    if($envoyer_inscription==true){
        $inscription=$connexion->prepare($req_SQL_etudiant);
        $inscription->execute();
    }

    header('Location: espace_responsable.php');
?>