<?php
    const BDD='mysql:host=localhost;dbname=dev_web_projet_2;charset=utf8';
    const username='root';
    const password=''; 

    $code_barre_inscrit="";
    if(isset($_POST['code_barre_initial'])){
        $code_barre_inscrit=$_POST['code_barre_initial'];
    }
    $connexion=new PDO(BDD,username,password);
    $req_SQL_selection_infos_demandeurs="SELECT D.Nom_demandeur, D.Prenom_demandeur, D.Mail_demandeur FROM demandeur AS D WHERE D.Code_barre_demande='$code_barre_inscrit';";
    $execution_req_SQL_selection_infos_demandeurs=$connexion->prepare($req_SQL_selection_infos_demandeurs);
    $execution_req_SQL_selection_infos_demandeurs->execute();
    $resultat_req_SQL_selection_infos_demandeurs=$execution_req_SQL_selection_infos_demandeurs->fetchAll();

    $nom_demandeur="";
    $prenom_demandeur="";
    $mail_demandeur="";

    foreach($resultat_req_SQL_selection_infos_demandeurs as $data_req_SQL_selection_infos_demandeurs){
        $nom_demandeur=$data_req_SQL_selection_infos_demandeurs['Nom_demandeur'];
        $prenom_demandeur=$data_req_SQL_selection_infos_demandeurs['Prenom_demandeur'];
        $mail_demandeur=$data_req_SQL_selection_infos_demandeurs['Mail_demandeur'];
    }

    $date_rendu='ADDTIME(now(), "7 0:0:0.0")';
    $req_SQL_insertion_emprunteur="INSERT INTO emprunteur VALUES(NULL,'$nom_demandeur','$prenom_demandeur','$mail_demandeur','$code_barre_inscrit',now(),$date_rendu);"; 
    
    $execution_req_SQL_insertion_emprunteur=$connexion->prepare($req_SQL_insertion_emprunteur);
    $execution_req_SQL_insertion_emprunteur->execute();

    // DELETE FROM `demandeur` WHERE `Code_barre_demande`=2002250134300;
    $reqSQL_suppression_en_BDD_demandeur="DELETE FROM `demandeur` WHERE `Code_barre_demande`=$code_barre_inscrit;";
    $execution_suppression_en_BDD_demandeur=$connexion->prepare($reqSQL_suppression_en_BDD_demandeur);
    $execution_suppression_en_BDD_demandeur->execute();

    $req_SQL_get_nb_emprunt="SELECT E.Nb_emprunts FROM etudiant AS E WHERE E.mail_etudiant=$mail_demandeur";
    $execution_req_SQL_get_nb_emprunt=$connexion->prepare($req_SQL_get_nb_emprunt);
    $execution_req_SQL_get_nb_emprunt->execute();
    $resultat_req_SQL_get_nb_emprunt=$execution_req_SQL_get_nb_emprunt->fetchAll();

    $nb_emprunt=0;
    foreach($resultat_req_SQL_get_nb_emprunt as $data_req_SQL_get_nb_emprunt){
        $nb_emprunt=$data_req_SQL_get_nb_emprunt;
    }

    $reqSQL_MAJ_nb_emprunt="UPDATE etudiant SET Nb_emprunts=Nb_emprunts+1 WHERE mail_etudiant='$mail_demandeur';";
    $execution_reqSQL_MAJ_nb_emprunt=$connexion->prepare($reqSQL_MAJ_nb_emprunt);
    $execution_reqSQL_MAJ_nb_emprunt->execute();

    $req_SQL_MAJ_table_emprunt="UPDATE materiel SET emprunte=1 WHERE Code_barre='$code_barre_inscrit';";
    $execution_req_SQL_MAJ_table_emprunt=$connexion->prepare($req_SQL_MAJ_table_emprunt);
    $execution_req_SQL_MAJ_table_emprunt->execute();

    header('Location: espace_responsable.php');
?>