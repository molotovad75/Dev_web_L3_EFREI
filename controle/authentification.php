<?php
    const BDD='mysql:host=localhost;dbname=dev_web_projet_2;charset=utf8';
    const username='root';
    const password='';

    function connexion($mail,$mdp){
        $connexion=new PDO(BDD,username,password);

        //Responsable
        $reqSQL_authentification_respo="SELECT R.Nom_responsable, R.Prenom_responsable FROM responsable AS R WHERE R.Mot_de_passe_respo='$mdp' AND R.adresse_mail='$mail';"; //responsable
        $resultat_req_authen_responsable=$connexion->prepare($reqSQL_authentification_respo);
        $resultat_req_authen_responsable->execute();
        $resultat_ID_responsable=$resultat_req_authen_responsable->fetchAll();
        $nb_req_respon=$resultat_req_authen_responsable->rowCount();

        //Etudiant
        $reqSQL_authentification_etudiant="SELECT E.Nom_etudiant, E.Prenom_etudiant FROM etudiant AS E WHERE E.Mot_de_passe_etu='$mdp' AND E.mail_etudiant='$mail';";  //etudiant 
        $resultat_req_auhen_etudiant=$connexion->prepare($reqSQL_authentification_etudiant);
        $resultat_req_auhen_etudiant->execute();        
        $resultat_ID_etudiant=$resultat_req_auhen_etudiant->fetchAll();
        $nb_req_etu=$resultat_req_auhen_etudiant->rowCount();
        
          if( $nb_req_etu==0 && $nb_req_respon!=0 ){
               //Afficher la page utilisateur
               
               foreach($resultat_ID_responsable as $data2){
                    $_SESSION['Nom_responsable']=$data2['Nom_responsable']; //nom de famille
                    $_SESSION['Prenom_responsable']=$data2['Prenom_responsable'];//prenom
               }
               $_SESSION['mail']=$mail;
               $_SESSION['mdp']=$mdp;
               header('Location: espace_responsable.php');
              
          }else if( $nb_req_etu!=0 && $nb_req_respon==0 ){ //&& !isset($_SESSION['Nom_responsable']) && !isset($_SESSION['Prenom_responsable'])
               //Rester sur la page de connexion tout en informant l'étudiant.
               foreach($resultat_ID_etudiant as $data){
                    $_SESSION['Nom_etudiant']=$data['Nom_etudiant']; //nom de famille
                    $_SESSION['Prenom_etudiant']=$data['Prenom_etudiant'];
               }
               $_SESSION['mail_etudiant']=$mail;
               $_SESSION['mdp_etudiant']=$mdp;
               header('Location: espace_etudiant.php');
          }else if($nb_req_etu==0 && $nb_req_respon==0){
               ?>
                    <script> alert("Votre indentifiant est incorrect !"); </script>
               <?php
               header('Location: ../modele/connexion.html'); 
     } 
    }

    try{
          session_start();
          connexion($_POST['adresse_mail_CO'],$_POST['mdp_CO']);
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }   
?>