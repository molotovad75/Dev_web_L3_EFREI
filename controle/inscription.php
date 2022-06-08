<?php
    session_start();
    
    const BDD='mysql:host=localhost;dbname=dev_web_projet_2;charset=utf8';
    const username='root';
    const password='';
    $_SERVER['bdd']=BDD;
    $_SERVER['username']=username;
    $_SERVER['password']=password;


    const HTTP_OK=200;
    const HTTP_BAD_REQUEST=400;
    const HTTP_METHOD_NOT_ALLOWED=405;

    function inserer_etudiant($nom,$prenom,$mail,$mdp){    
            $reqSQL_verif_mails_responsable="SELECT R.adresse_mail FROM responsable AS R;";//Pour vérifier si notre inscrit n'a pas de compte responsable
            $req_SQL_etudiant="INSERT INTO etudiant VALUES(NULL,'$nom','$prenom','$mail',0,'$mdp');"; //Insertion d'un étudiant dans la BDD
            $reqSQL_verif_doublon_mail="SELECT E.mail_etudiant FROM etudiant AS E;";
            $connexion=new PDO(BDD,username,password);


            if($_POST["confirmer_mdp_INS"]==$mdp){

                echo 'L\'addresse mail que je rentre :', $_POST['adresse_mail_INS']; //Ce que rentre l'utilisateur dans le formulaire.
                //Verification mail
                $envoie_requete_verif_mail=$connexion->prepare($reqSQL_verif_doublon_mail);
                $envoie_requete_verif_mail->execute();
                $resultat_mail_etu_respo=$envoie_requete_verif_mail->fetchAll();

                $envoyer_inscription=true;
                foreach($resultat_mail_etu_respo as $data){
                    if($_POST['adresse_mail_INS']==$data['mail_etudiant']){
                        $envoyer_inscription=false;
                    }
                
                }

                $envoie_requete_verif_mail_responsable=$connexion->prepare($reqSQL_verif_mails_responsable);
                $envoie_requete_verif_mail_responsable->execute();
                $resultat_requete_verif_mail_responsable=$envoie_requete_verif_mail_responsable->fetchAll();
                //Boucle foreach pour vérifier tous les mails des responsables
                foreach($resultat_requete_verif_mail_responsable as $data_mails_responsable){
                    if($_POST['adresse_mail_INS']==$data_mails_responsable['adresse_mail']){
                        $envoyer_inscription=false;
                    }
                }   


                if($envoyer_inscription==true){
                    $inscription=$connexion->prepare($req_SQL_etudiant);
                    $inscription->execute();
                    header('Location: espace_etudiant.php');
                    $_SESSION['Nom_etudiant']=$_POST['nom_INS'];
                    $_SESSION['Prenom_etudiant']=$_POST['prenom_INS'];
                    $_SESSION['mail']=$mail;
                    $_SESSION['mdp']=$mdp;

                }else{
                    header('Location: ../modele/inscription.html');
                }
            }else{
                // echo 'Les 2 mots de passe correspondent pas !';
                header('Location: ../modele/inscription.html');
                ?>
                <script>
                        alert('Les 2 mots de passe correspondent pas !');
                </script>
                 <?php
            }  
    }

    function inserer_responsable($nom,$prenom,$mail,$mdp){
        $reqSQL_verif_mails_etudiant="SELECT E.mail_etudiant FROM etudiant AS E;";//Pour vérifier si notre inscrit n'a pas de compte étudiant
        $req_SQL_responsable="INSERT INTO responsable VALUES(NULL,'$nom','$prenom','$mail','NONE','$mdp')"; //Insertion du nouveau responsable en BDD
        $reqSQL_verif_doublon_mail="SELECT R.adresse_mail FROM responsable AS R;";
        $connexion=new PDO(BDD,username,password);
        
        
       
        if($_POST["confirmer_mdp_INS"]==$mdp){
            //Verification mail
            $envoie_requete_verif_mail=$connexion->prepare($reqSQL_verif_doublon_mail);
            $envoie_requete_verif_mail->execute();
            $resultat_mail_etu_respo=$envoie_requete_verif_mail->fetchAll();
            $envoyer=true;            

            foreach($resultat_mail_etu_respo as $data){
                // echo "<br>",$data['adresse_mail'], "<br>";
                if($_POST['adresse_mail_INS']==$data['adresse_mail']){
                    $envoyer=false;
                }
               
            }

            $envoie_requete_verif_mail_etudiant=$connexion->prepare($reqSQL_verif_mails_etudiant);
            $envoie_requete_verif_mail_etudiant->execute();
            $resultat_liste_mails_etu=$envoie_requete_verif_mail_etudiant->fetchAll();

            foreach($resultat_liste_mails_etu as $data_mail_etu){
                if($_POST['adresse_mail_INS']==$data_mail_etu['mail_etudiant']){
                    $envoyer=false;
                }
                
            }
            if($envoyer==true){
                $inscription=$connexion->prepare($req_SQL_responsable);
                $inscription->execute();               
                header('Location: espace_responsable.php');
                $_SESSION['Nom_responsable']=$_POST['nom_INS'];
                $_SESSION['Prenom_responsable']=$_POST['prenom_INS'];
                $_SESSION['mail']=$mail;
                $_SESSION['mdp']=$mdp;
            }else{
                header('Location: ../modele/inscription.html');
            }
        }else{
            header('Location: ../modele/inscription.html');
        } 
    }
    
    ?>
        
        <script src="../vue/script.js" type="text/javascript"></script>
    <?php

    try {
        if ($_POST['statut']=="Etudiant" ) {  //|| $_POST['statut_derouleur']=="Etudiant" 
            inserer_etudiant($_POST['nom_INS'],$_POST['prenom_INS'],$_POST['adresse_mail_INS'],$_POST['mdp_INS']);
        } 
        else if ( $_POST['statut']=="Responsable" ){ //|| $_POST['statut_derouleur']=="Responsable"
            inserer_responsable($_POST['nom_INS'],$_POST['prenom_INS'],$_POST['adresse_mail_INS'],$_POST['mdp_INS']);
        }
        else if (!isset($_POST['statut'])){
            header('Location: ../modele/inscription.html');
            ?>
            <script> //erreur_no_status('Veuillez selectionner un statut !'); 
                alert('Veuillez selectionner un statut !');
            </script>
            <?php
        }
    } catch (ErrorException $message) {
        echo $message;
    } 
?>