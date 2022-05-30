<?php
    // require("information_BDD.php");

    session_start();
    
    const BDD='mysql:host=localhost;dbname=dev_web_projet_2;charset=utf8';
    const username='root';
    const password='';
    $_SESSION['bdd']=BDD;
    $_SESSION['username']=username;
    $_SESSION['password']=password;

    function inserer_etudiant($nom,$prenom,$mail,$mdp){    
        $req_SQL_etudiant="INSERT INTO etudiant VALUES(NULL,'$nom','$prenom','$mail',0,'$mdp');";
        $connexion=new PDO(BDD,username,password);
            if($_POST["confirmer_mdp_INS"]==$mdp){
                $envoie_requete=$connexion->prepare($req_SQL_etudiant);
                $envoie_requete->execute();
                echo "Bien joué étudiant";
                // $envoie_requete->execute(array([
                //     'Id_etudiant' => NULL,
                //     'Nom_etudiant' => $nom,
                //     'Prenom_etudiant' => $prenom,
                //     'mail_etudiant' => $mail,
                //     'Nb_emprunts'=>0,
                //     'Mot_de_passe_etu' => $mdp
                // ]));
            }else{
                echo 'Les 2 mots de passe correspondent pas !';
            }  
    }

    function inserer_responsable($nom,$prenom,$mail,$mdp){
        $req_SQL_responsable="INSERT INTO responsable VALUES(NULL,'$nom','$prenom','$mail','NONE','$mdp')"; //Insertion du nouveau responsable en BDD

        // $reqSQL_verif_doublon_mail="SELECT R.adresse_mail, E.mail_etudiant FROM responsable AS R, etudiant AS E;"; //Requete pour collecter tous les mails de la BDD
        // $req_SQL_responsable="INSERT INTO responsable VALUES(:Id_responsable,:Nom_responsable,:Prenom_responsable,:adresse_mail,:Identifiant_connexion,:Mot_de_passe_respo);";
        $reqSQL_verif_doublon_mail="SELECT R.adresse_mail, E.mail_etudiant FROM responsable AS R, etudiant AS E;";
        $connexion=new PDO(BDD,username,password);
        
        
       
        if($_POST["confirmer_mdp_INS"]==$mdp){
            
            // $inscription_fetch=$inscription->fetchAll();
            // foreach($inscription_fetch as $i){
            //     echo $i['adresse_mail'];
            // }
            // echo "mail d\'inscription en cours : "+ $inscription_fetch['adresse_mail'];

           echo 'L\'addresse mail que je rentre :', $_POST['adresse_mail_INS']; //Ce que rentre l'utilisateur dans le formulaire.
            //Verification mail
            $envoie_requete_verif_mail=$connexion->prepare($reqSQL_verif_doublon_mail);
            $envoie_requete_verif_mail->execute();
            $resultat_mail_etu_respo=$envoie_requete_verif_mail->fetchAll();
            $envoyer=true;
            foreach($resultat_mail_etu_respo as $data){
                echo "<br>",$data['adresse_mail'], "<br>";
                if($_POST['adresse_mail_INS']==$data['adresse_mail']){
                    echo 'Adresse mail déjà utilisée !';
                    $envoyer=false;
                }
               
            }
            if($envoyer==true){
                $inscription=$connexion->prepare($req_SQL_responsable);
                $inscription->execute();
                // header('Location : espace_responsable.php');
                header('Location: espace_responsable.php');

            }
            

            // $envoie_requete->execute(array([
            //     'Id_responsable' => NULL,
            //     'Nom_responsable' => $nom,
            //     'Prenom_responsable' =>  $prenom,
            //     'adresse_mail' => $mail,
            //     'Identifiant_connexion' => "NONE",
            //     'Mot_de_passe_respo' => $mdp
            // ]));


            //Ramener sur la page personnelle du responsable.
        }else{
            
            echo 'Les 2 mots de passe correspondent pas !';
            header('Location: ../modele/inscription.html');
            //Essayer de faire une requête AJAX.
        } 
    }

    try {
        if ($_POST['statut']=="Etudiant" ) {  //|| $_POST['statut_derouleur']=="Etudiant" 
            inserer_etudiant($_POST['nom_INS'],$_POST['prenom_INS'],$_POST['adresse_mail_INS'],$_POST['mdp_INS']);
        } 
        else if ( $_POST['statut']=="Responsable" ){ //|| $_POST['statut_derouleur']=="Responsable"
            inserer_responsable($_POST['nom_INS'],$_POST['prenom_INS'],$_POST['adresse_mail_INS'],$_POST['mdp_INS']);
        }
        else if (!isset($_POST['statut'])){
            header('Location: ../modele/inscription.html');
        }
    } catch (ErrorException $message) {
        //throw $th;
        echo $message;
    }


    
?>