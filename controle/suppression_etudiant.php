<?php

    const BDD='mysql:host=localhost;dbname=dev_web_projet_2;charset=utf8';
    const username='root';
    const password='';    
    $mail_initial="";
    if(isset($_POST['mail_initial'])){
        $mail_initial=$_POST['mail_initial'];
    }
    $req_SQL_supression_etudiant="DELETE FROM `etudiant` WHERE `etudiant`.`mail_etudiant`='$mail_initial';";
    $connexion=new PDO(BDD,username,password);
    $execution_req_SQL_supression_etudiant=$connexion->prepare($req_SQL_supression_etudiant);
    $execution_req_SQL_supression_etudiant->execute();


    $req_SQL_suppression_valeurs_vides="DELETE FROM `etudiant` WHERE `etudiant`.`mail_etudiant` = '' AND `etudiant`.`Nom_etudiant` = '' AND `etudiant`.`Prenom_etudiant` = '' AND `etudiant`.`Mot_de_passe_etu` = '';";
    $connexion=new PDO(BDD,username,password);
    $execution_req_SQL_suppression_valeurs_vides=$connexion->prepare($req_SQL_suppression_valeurs_vides);
    $execution_req_SQL_suppression_valeurs_vides->execute();

    header('Location: espace_responsable.php');

?>