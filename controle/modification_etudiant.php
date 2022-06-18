<?php

    const BDD='mysql:host=localhost;dbname=dev_web_projet_2;charset=utf8';
    const username='root';
    const password='';    
    
    $mail_actuel="";
    $nouveau_nom="";
    $nouveau_prenom="";
    $nouveau_mdp="";

    if(isset($_POST['mail_initial']) || isset($_POST['modification_nom']) || isset($_POST['modification_prenom']) || isset($_POST['modification_mdp'])){
        $mail_actuel=$_POST['mail_initial'];
        $nouveau_nom=$_POST['modification_nom'];
        $nouveau_prenom=$_POST['modification_prenom'];
        $nouveau_mdp=$_POST['modification_mdp'];
    }

    $connexion= new PDO(BDD,username,password);

    $reqSQL_modification_etudiant_BDD_nom="UPDATE etudiant SET Nom_etudiant='$nouveau_nom' WHERE `mail_etudiant`='$mail_actuel';";
    $reqSQL_modification_etudiant_BDD_prenom="UPDATE etudiant SET Prenom_etudiant='$nouveau_prenom' WHERE `mail_etudiant`='$mail_actuel';";
    $reqSQL_modification_etudiant_BDD_mdp="UPDATE etudiant SET Mot_de_passe_etu='$nouveau_mdp' WHERE `mail_etudiant`='$mail_actuel';";

    if(strlen($nouveau_nom)>0 && strlen($nouveau_prenom)>0 && strlen($nouveau_mdp)>0){

        $connexion->prepare($reqSQL_modification_etudiant_BDD_nom)->execute();
        $connexion->prepare($reqSQL_modification_etudiant_BDD_prenom)->execute();
        $connexion->prepare($reqSQL_modification_etudiant_BDD_mdp)->execute();

    }else if(strlen($nouveau_nom)>0  && strlen($nouveau_prenom)>0 && strlen($nouveau_mdp)==0){
        $connexion->prepare($reqSQL_modification_etudiant_BDD_nom)->execute();
        $connexion->prepare($reqSQL_modification_etudiant_BDD_prenom)->execute();
    }
    else if(strlen($nouveau_nom)>0  && strlen($nouveau_prenom)==0 && strlen($nouveau_mdp)>0){
        $connexion->prepare($reqSQL_modification_etudiant_BDD_nom)->execute();
        $connexion->prepare($reqSQL_modification_etudiant_BDD_mdp)->execute();
    }
    else if(strlen($nouveau_nom)>0   && strlen($nouveau_prenom)==0 && strlen($nouveau_mdp)==0){
        $connexion->prepare($reqSQL_modification_etudiant_BDD_nom)->execute();
    }
    else if(strlen($nouveau_nom)==0 && strlen($nouveau_prenom)>0  && strlen($nouveau_mdp)>0){
        $connexion->prepare($reqSQL_modification_etudiant_BDD_prenom)->execute();
        $connexion->prepare($reqSQL_modification_etudiant_BDD_mdp)->execute();
    }
    else if(strlen($nouveau_nom)==0 && strlen($nouveau_prenom)>0 && strlen($nouveau_mdp)==0){
        $connexion->prepare($reqSQL_modification_etudiant_BDD_prenom)->execute();
    }
    else if(strlen($nouveau_nom)==0 && strlen($nouveau_prenom)==0 && strlen($nouveau_mdp)>0 ){
        $connexion->prepare($reqSQL_modification_etudiant_BDD_mdp)->execute();
    }

    header('Location: espace_responsable.php');
?>