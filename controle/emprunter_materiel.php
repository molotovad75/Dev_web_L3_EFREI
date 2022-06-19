<?php
    session_start();
    const BDD='mysql:host=localhost;dbname=dev_web_projet_2;charset=utf8';
    const username='root';
    const password='';
    $code_barre_initial="";
    $mail_etudiant="";

    if(isset($_POST['code_barre_initial']) && isset($_SESSION['mail_etudiant']) ){
        $code_barre_initial=$_POST['code_barre_initial'];
        $mail_etudiant=$_SESSION['mail_etudiant'];
    }

    try{
      //$req_SQL_recuperation_information_materiel="SELECT M.Nom_materiel, M.Description, M.Date_achat, M.Prix_achat, M.emprunte, E.Nom_etudiant, E.Prenom_etudiant FROM materiel AS M, etudiant AS E WHERE M.Code_barre='8305538551428' AND E.mail_etudiant='donald.trump@twitter.com';";
        // $req_SQL_recuperation_information_materiel="SELECT M.Nom_materiel, M.Description, M.Date_achat, M.Prix_achat, M.emprunte, E.Nom_etudiant, E.Prenom_etudiant FROM materiel AS M, etudiant AS E WHERE M.Code_barre='$code_barre_initial' AND  E.mail_etudiant='$mail_etudiant';";
        $req_SQL_recuperation_information_materiel="SELECT E.Nom_etudiant, E.Prenom_etudiant FROM etudiant AS E WHERE E.mail_etudiant='$mail_etudiant';";
        $connexion=new PDO(BDD,username,password);
        $execution_recuperation_information_materiel=$connexion->prepare($req_SQL_recuperation_information_materiel);
        $execution_recuperation_information_materiel->execute();
        $resultat_recuperation_information_materiel=$execution_recuperation_information_materiel->fetchAll();
        $tab_nom_etudiant=$_SESSION['Nom_etudiant'];
        $tab_prenom_etudiant=$_SESSION['Prenom_etudiant'];
        
        $req_SQL_tous_code_barre="SELECT `Code_barre_demande` FROM `demandeur`";
        $connexion=new PDO(BDD,username,password);
        $execution_req_SQL_tous_code_barre=$connexion->prepare($req_SQL_tous_code_barre);
        $execution_req_SQL_tous_code_barre->execute();
        $resultat_req_SQL_tous_code_barre=$execution_req_SQL_tous_code_barre->fetchAll();

        $tab_code_barre;
        $i=0;
        foreach($resultat_req_SQL_tous_code_barre as $data_req_SQL_tous_code_barre){
            $tab_code_barre[$i]=$data_req_SQL_tous_code_barre['Code_barre_demande'];
            $i++;
        }

        $envoyer_demande=true;
        for($i=0;$i<$execution_req_SQL_tous_code_barre->rowCount();$i++){
            if($tab_code_barre[$i]==$code_barre_initial){
                $envoyer_demande=false;
            }
        }
        if($envoyer_demande==true){
            $req_SQL_demande_materiel="INSERT INTO demandeur VALUES(NULL,'$tab_nom_etudiant','$tab_prenom_etudiant','$mail_etudiant','$code_barre_initial')";
            $execution_req_SQL_demande_materiel=$connexion->prepare($req_SQL_demande_materiel);
            $execution_req_SQL_demande_materiel->execute();
        }
        
        
        header('Location: espace_etudiant.php');
    }catch(ErrorException $e){
        echo $e;
    }
?>