<?php
    // require("information_BDD.php");

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
                    // echo "<br>",$data['mail_etudiant'], "<br>";
                    if($_POST['adresse_mail_INS']==$data['mail_etudiant']){
                        // echo 'Adresse mail déjà utilisée !';
                        $envoyer_inscription=false;
                        ?>
                            <script> //mail_used('Adresse mail déjà utilisée !');
                                    alert('Adresse mail déjà utilisée !');
                            </script>
                        <?php
                    }
                
                }

                if($envoyer_inscription==true){
                    $inscription=$connexion->prepare($req_SQL_etudiant);
                    $inscription->execute();
                    // header('Location : espace_responsable.php');
                   
                    header('Location: espace_etudiant.php');
                    $_SESSION['nom_etudiant']=$_POST['nom_INS'];
                    $_SESSION['prenom_etudiant']=$_POST['prenom_INS'];

                }
                // $envoie_requete->execute(array([
                //     'Id_etudiant' => NULL,
                //     'Nom_etudiant' => $nom,
                //     'Prenom_etudiant' => $prenom,
                //     'mail_etudiant' => $mail,
                //     'Nb_emprunts'=>0,
                //     'Mot_de_passe_etu' => $mdp
                // ]));
            }else{
                // echo 'Les 2 mots de passe correspondent pas !';

                ?>
                <script>//no_password_match('Les 2 mots de passe correspondent pas !');
                        alert('Les 2 mots de passe correspondent pas !');
                </script>
                 <?php
            }  
    }

    function inserer_responsable($nom,$prenom,$mail,$mdp){
        $req_SQL_responsable="INSERT INTO responsable VALUES(NULL,'$nom','$prenom','$mail','NONE','$mdp')"; //Insertion du nouveau responsable en BDD

        // $reqSQL_verif_doublon_mail="SELECT R.adresse_mail, E.mail_etudiant FROM responsable AS R, etudiant AS E;"; //Requete pour collecter tous les mails de la BDD
        // $req_SQL_responsable="INSERT INTO responsable VALUES(:Id_responsable,:Nom_responsable,:Prenom_responsable,:adresse_mail,:Identifiant_connexion,:Mot_de_passe_respo);";
        $reqSQL_verif_doublon_mail="SELECT R.adresse_mail FROM responsable AS R;";
        $connexion=new PDO(BDD,username,password);
        
        
       
        if($_POST["confirmer_mdp_INS"]==$mdp){
        //    echo 'L\'addresse mail que je rentre :', $_POST['adresse_mail_INS']; //Ce que rentre l'utilisateur dans le formulaire.
            //Verification mail
            $envoie_requete_verif_mail=$connexion->prepare($reqSQL_verif_doublon_mail);
            $envoie_requete_verif_mail->execute();
            $resultat_mail_etu_respo=$envoie_requete_verif_mail->fetchAll();
            $envoyer=true;
            foreach($resultat_mail_etu_respo as $data){
                // echo "<br>",$data['adresse_mail'], "<br>";
                if($_POST['adresse_mail_INS']==$data['adresse_mail']){
                    if(isset($_SERVER['X_Requested_With']) && strtoupper($_SERVER['HTTP_X-REQUESTED-WITH'])=='XMLHTTP'){
                        $reponse_code=HTTP_METHOD_NOT_ALLOWED;
                        $message="Methode non autorisée !";
                        reponse($reponse_code,$message);   
                    }else{
                        $reponse_code=HTTP_BAD_REQUEST;
                        $message="Adresse mail déjà utilisée !";
                        reponse($reponse_code,$message);  
                        $file="message_erreur.json"; 
                        $data=file_get_contents($file);
                        $message_JSON=json_encode($data);

                        header('Location: ../modele/inscription.html');
                        // echo $message_JSON;
                        ?>
                            <script> //mail_used('Adresse mail déjà utilisée !');
                                    alert('Adresse mail déjà utilisée !');
                            </script>
                        <?php
                    }

                    $envoyer=false;
                }
               
            }
            if($envoyer==true){
                $inscription=$connexion->prepare($req_SQL_responsable);
                $inscription->execute();               
                header('Location: espace_responsable.php');
                $_SESSION['nom_responsable']=$_POST['nom_INS'];
                $_SESSION['prenom_responsable']=$_POST['prenom_INS'];

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
            header('Location: ../modele/inscription.html');
            //Essayer de faire une requête AJAX.

            ?>
                <script> //no_password_match('Les 2 mots de passe ne correspondent pas !');  
                alert('Les 2 mots de passe ne correspondent pas !'); </script>
            <?php
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
            // echo "";
        }
    } catch (ErrorException $message) {
        echo $message;
    }


    function reponse($reponse_code,$reponse){
        // header('Content-Type: text/html');
        http_response_code($reponse_code);
        $reponse=[
            "reponse_code" => $reponse_code,
            "message" => $reponse
        ];
        // echo $message_json;
        file_put_contents("message_erreur.json",json_encode($reponse)); // génération du fichier JSON
        
    }   
?>