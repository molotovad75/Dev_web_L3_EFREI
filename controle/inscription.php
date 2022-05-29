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
        $req_SQL_responsable="INSERT INTO responsable VALUES(NULL,'$nom','$prenom','$mail','NONE','$mdp')";

        // $req_SQL_responsable="INSERT INTO responsable VALUES(:Id_responsable,:Nom_responsable,:Prenom_responsable,:adresse_mail,:Identifiant_connexion,:Mot_de_passe_respo);";
        $connexion=new PDO(BDD,username,password);
        if($_POST["confirmer_mdp_INS"]==$mdp){
            $envoie_requete=$connexion->prepare($req_SQL_responsable);
            $envoie_requete->execute();
            echo "Bien joué responsable";

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