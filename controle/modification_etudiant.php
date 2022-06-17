<?php
    const BDD='mysql:host=localhost;dbname=dev_web_projet_2;charset=utf8';
    const username='root';
    const password='';
    $mail_actuel=$_POST['mail_initial'];

    $nouveau_nom=$_POST['modification_nom'];
    $nouveau_prenom=$_POST['modification_prenom'];
    $nouveau_mail=$_POST['modification_mail'];
    $nouveau_mdp=$_POST['modification_mdp'];
    $mail_actuel_en_BDD="";
    $req_SQL_verif_mail_actuel_etudiant="SELECT E.mail_etudiant FROM etudiant AS E WHERE $mail_actuel=E.mail_etudiant;";
    $connexion= new PDO(BDD,username,password);
    $execution_verif_mail_actuel_etudiant=$connexion->prepare($req_SQL_verif_mail_actuel_etudiant);
    $execution_verif_mail_actuel_etudiant->execute();
    $resultat_execution_verif_mail_actuel_etudiant=$execution_verif_mail_actuel_etudiant->fetchAll();
    $continuite_requete=false;

    foreach($resultat_execution_verif_mail_actuel_etudiant as $data_mail_actuel_etudiant){
        if($mail_actuel==$data_mail_actuel_etudiant['mail_etudiant']){
            $mail_actuel_en_BDD=$data_mail_actuel_etudiant['mail_etudiant'];
            $continuite_requete=true;
        }
    }
    // if($continuite_requete==true){
        // $reqSQL_modification_etudiant_BDD_complete="UPDATE etudiant SET Nom_etudiant=$nouveau_nom, Prenom_etudiant=$nouveau_prenom, mail_etudiant=$nouveau_mail, Mot_de_passe_etu=$nouveau_mdp WHERE $mail_actuel=$mail_actuel_en_BDD;";
        // UPDATE etudiant SET Nom_etudiant='panini' WHERE `mail_etudiant`='tony.montana@gmail.com' 
        $reqSQL_modification_etudiant_BDD_nom="UPDATE etudiant SET Nom_etudiant='$nouveau_nom' WHERE `mail_etudiant`='$mail_actuel';";
        $reqSQL_modification_etudiant_BDD_prenom="UPDATE etudiant SET Prenom_etudiant='$nouveau_prenom' WHERE `mail_etudiant`='$mail_actuel';";
        $reqSQL_modification_etudiant_BDD_mail="UPDATE etudiant SET mail_etudiant='$nouveau_mail' WHERE `mail_etudiant`='$mail_actuel';";
        $reqSQL_modification_etudiant_BDD_mdp="UPDATE etudiant SET Mot_de_passe_etu='$nouveau_mdp' WHERE `mail_etudiant`='$mail_actuel';";

        $connexion= new PDO(BDD,username,password);
        if(isset($nouveau_nom) && isset($nouveau_prenom) && isset($nouveau_mail) && isset($nouveau_mdp)){
            // TOUS LES CHAMPS SONT REMPLIS
            // $execution_modification_etudiant_BDD_complete=$connexion->prepare($reqSQL_modification_etudiant_BDD_complete);
            // $execution_modification_etudiant_BDD_complete->execute();

            $connexion->prepare($reqSQL_modification_etudiant_BDD_nom)->execute();
            $connexion->prepare($reqSQL_modification_etudiant_BDD_prenom)->execute();
            $connexion->prepare($reqSQL_modification_etudiant_BDD_mail)->execute();
            $connexion->prepare($reqSQL_modification_etudiant_BDD_mdp)->execute();

        }else if(isset($nouveau_nom) && isset($nouveau_prenom) && isset($nouveau_mail) && !isset($nouveau_mdp)){
            // 1
            $connexion->prepare($reqSQL_modification_etudiant_BDD_nom)->execute();
            $connexion->prepare($reqSQL_modification_etudiant_BDD_prenom)->execute();
            $connexion->prepare($reqSQL_modification_etudiant_BDD_mail)->execute();

        }
        else if(isset($nouveau_nom) && isset($nouveau_prenom) && !isset($nouveau_mail) && isset($nouveau_mdp)){
            // 2
            $connexion->prepare($reqSQL_modification_etudiant_BDD_nom)->execute();
            $connexion->prepare($reqSQL_modification_etudiant_BDD_prenom)->execute();
            $connexion->prepare($reqSQL_modification_etudiant_BDD_mdp)->execute();

            $connexion->prepare("UPDATE etudiant SET mail_etudiant='$mail_actuel' WHERE `Nom_etudiant`='$nouveau_nom' AND `Prenom_etudiant`='$nouveau_prenom';")->execute();
        }
        else if(isset($nouveau_nom) && isset($nouveau_prenom) && !isset($nouveau_mail) && !isset($nouveau_mdp)){
            // 3
            $connexion->prepare($reqSQL_modification_etudiant_BDD_nom)->execute();
            $connexion->prepare($reqSQL_modification_etudiant_BDD_prenom)->execute();
        }
        else if(isset($nouveau_nom) && !isset($nouveau_prenom) && isset($nouveau_mail) && isset($nouveau_mdp)){
            // 4
            $connexion->prepare($reqSQL_modification_etudiant_BDD_nom)->execute();
            $connexion->prepare($reqSQL_modification_etudiant_BDD_mail)->execute();
            $connexion->prepare($reqSQL_modification_etudiant_BDD_mdp)->execute();
        }
        else if(isset($nouveau_nom) && !isset($nouveau_prenom) && isset($nouveau_mail) && !isset($nouveau_mdp)){
            // 5
            $connexion->prepare($reqSQL_modification_etudiant_BDD_nom)->execute();
            $connexion->prepare($reqSQL_modification_etudiant_BDD_mail)->execute();
        }
        else if(isset($nouveau_nom) && !isset($nouveau_prenom) && !isset($nouveau_mail) && isset($nouveau_mdp)){
            // 6
            $connexion->prepare($reqSQL_modification_etudiant_BDD_nom)->execute();
            $connexion->prepare($reqSQL_modification_etudiant_BDD_mdp)->execute();
            $connexion->prepare("UPDATE etudiant SET mail_etudiant='$mail_actuel' WHERE `Nom_etudiant`='$nouveau_nom' AND `Prenom_etudiant`='$pre';")->execute();
        }
        else if(isset($nouveau_nom) && !isset($nouveau_prenom) && !isset($nouveau_mail) && !isset($nouveau_mdp)){
            // 7
            $connexion->prepare($reqSQL_modification_etudiant_BDD_nom)->execute();
            $connexion->prepare("UPDATE etudiant SET mail_etudiant='$mail_actuel' WHERE `Nom_etudiant`='$nouveau_nom' AND `Prenom_etudiant`='$nouveau_prenom';")->execute();
        }
        else if(!isset($nouveau_nom) && isset($nouveau_prenom) && isset($nouveau_mail) && isset($nouveau_mdp)){
            // 8
            $connexion->prepare($reqSQL_modification_etudiant_BDD_prenom)->execute();
            $connexion->prepare($reqSQL_modification_etudiant_BDD_mail)->execute();
            $connexion->prepare($reqSQL_modification_etudiant_BDD_mdp)->execute();
        }
        else if(!isset($nouveau_nom) && isset($nouveau_prenom) && isset($nouveau_mail) && !isset($nouveau_mdp)){
            // 9
            $connexion->prepare($reqSQL_modification_etudiant_BDD_prenom)->execute();
            $connexion->prepare($reqSQL_modification_etudiant_BDD_mail)->execute();
        }
        else if(!isset($nouveau_nom) && isset($nouveau_prenom) && !isset($nouveau_mail) && isset($nouveau_mdp)){
            // 10
            $connexion->prepare($reqSQL_modification_etudiant_BDD_prenom)->execute();
            $connexion->prepare($reqSQL_modification_etudiant_BDD_mdp)->execute();
            $connexion->prepare("UPDATE etudiant SET mail_etudiant='$mail_actuel' WHERE `mail_etudiant`='$mail_actuel';")->execute();
        }
        else if(!isset($nouveau_nom) && isset($nouveau_prenom) && !isset($nouveau_mail) && !isset($nouveau_mdp)){
            // 11
            $connexion->prepare($reqSQL_modification_etudiant_BDD_prenom)->execute();
            $connexion->prepare("UPDATE etudiant SET mail_etudiant='$mail_actuel' WHERE `mail_etudiant`='$mail_actuel';")->execute();
        }
        else if(!isset($nouveau_nom) && !isset($nouveau_prenom) && isset($nouveau_mail) && isset($nouveau_mdp)){
            // 12
            $connexion->prepare($reqSQL_modification_etudiant_BDD_mail)->execute();
            $connexion->prepare($reqSQL_modification_etudiant_BDD_mdp)->execute();
        }
        else if(!isset($nouveau_nom) && !isset($nouveau_prenom) && isset($nouveau_mail) && !isset($nouveau_mdp)){
            // 13
            $connexion->prepare($reqSQL_modification_etudiant_BDD_mail)->execute();
        }
        else if(!isset($nouveau_nom) && !isset($nouveau_prenom) && !isset($nouveau_mail) && isset($nouveau_mdp)){
            // 14
            $connexion->prepare($reqSQL_modification_etudiant_BDD_mdp)->execute();
            $connexion->prepare("UPDATE etudiant SET mail_etudiant='$mail_actuel' WHERE `mail_etudiant`='$mail_actuel';")->execute();
        }
    // }

    header('Location: espace_responsable.php');
    
?>