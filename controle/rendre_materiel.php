<?php
    session_start();
    const BDD='mysql:host=localhost;dbname=dev_web_projet_2;charset=utf8';
    const username='root';
    const password=''; 

    $code_barre_initial="";
    $mail_etudiant="";
    if(isset($_POST['code_barre_initial']) && isset($_SESSION['mail_etudiant'])){
        $code_barre_initial=$_POST['code_barre_initial'];
        $mail_etudiant=$_SESSION['mail_etudiant'];
    }

    $req_SQL_supprimer_emprunteur="DELETE FROM `emprunteur` WHERE `Code_barre`='$code_barre_initial';";
    $connexion=new PDO(BDD,username,password);
    $execution_req_SQL_supprimer_emprunteur=$connexion->prepare($req_SQL_supprimer_emprunteur);
    $execution_req_SQL_supprimer_emprunteur->execute();

    // $mail_etudiant;
    $req_SQL_MAJ_nb_emprunt_etudiant="UPDATE etudiant SET `Nb_emprunts`=`Nb_emprunts`-1 WHERE `mail_etudiant`='$mail_etudiant';";
    $execution_req_SQL_MAJ_nb_emprunt_etudiant=$connexion->prepare($req_SQL_MAJ_nb_emprunt_etudiant);
    $execution_req_SQL_MAJ_nb_emprunt_etudiant->execute();


    $req_SQL_MAJ_materiel_rendu="UPDATE materiel SET `emprunte`=0 WHERE `Code_barre`='$code_barre_initial';";
    $execution_req_SQL_MAJ_materiel_rendu=$connexion->prepare($req_SQL_MAJ_materiel_rendu);
    $execution_req_SQL_MAJ_materiel_rendu->execute();

    header('Location: espace_etudiant.php');
    


?>