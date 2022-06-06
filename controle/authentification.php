<?php
    // require 'information_BDD.php';
    
    const BDD='mysql:host=localhost;dbname=dev_web_projet_2;charset=utf8';
    const username='root';
    const password='';
//     $Nom_responsable;
//     $Prenom_responsable;

//     $Nom_etudiant;
//     $Prenom_etudiant;

//     function connexion_responsable($mail_responsable_entre,$mdp){
//         $connexion=new PDO(BDD,username,password);
//         $reqSQL_authentification_respo="SELECT R.Nom_responsable, R.Prenom_responsable FROM responsable AS R WHERE R.Mot_de_passe_respo='$mdp' AND R.adresse_mail='$mail_responsable_entre';";    
//      //    $reqSQL_find_firstname="SELECT FROM responsable WHERE ";
//         $resultat_req_authen=$connexion->prepare($reqSQL_authentification_respo);
//         $resultat_req_authen->execute();
        
//         $resultat_nom_responsable=$resultat_req_authen->fetchAll();
//           foreach($resultat_nom_responsable as $data){
//                $_SESSION['nom_responsable']=$data['Nom_responsable']; //Affichage du nom de famille
//                $_SESSION['prenom_responsable']=$data['Prenom_responsable'];
//           }
//                //    echo $data['Prenom_responsable'];
//           if(isset($data['Nom_responsable']) && isset($data['Prenom_responsable'])){
//                // echo 'Connexion réussie ! ';
               
//                //Afficher la page utilisateur
//                header('Location: espace_responsable.php');
//                // $_SESSION['nom_responsable']=$_POST['nom_INS'];
//                // $_SESSION['prenom_responsable']=$_POST['prenom_INS'];

//           }else{
//                echo 'Connexion échoué !';
//                //Rester sur la page de connexion tout en informant le client.
//                header('Location: ../modele/connexion.html'); //Affichage de la même page
//                //Informer par requête AJAX.
//           }

      
       

//         // if ($resultat_req_authen->fetch(1)==$mail_responsable_entre && $resultat_req_authen->fetch(2)==$mdp) {
//         //     echo 'Connexion réussie ! ';
//         // } else {
//         //     echo 'Erreur de connexion !';
//         // }
        
//         //  echo 'Le numéro de notre responsable est le numéro '.$preparateur_requete2->fetch();
//     }



    function connexion($mail,$mdp){
        $connexion=new PDO(BDD,username,password);
        $reqSQL_authentification_etudiant="SELECT E.Nom_etudiant, E.Prenom_etudiant FROM etudiant AS E WHERE E.Mot_de_passe_etu='$mdp' AND E.mail_etudiant='$mail';";  //etudiant 
        $reqSQL_authentification_respo="SELECT R.Nom_responsable, R.Prenom_responsable FROM responsable AS R WHERE R.Mot_de_passe_respo='$mdp' AND R.adresse_mail='$mail';"; //responsable   
        
        //Responsable
        $resultat_req_authen_responsable=$connexion->prepare($reqSQL_authentification_respo);
        $resultat_req_authen_responsable->execute();

          //Etudiant
        $resultat_req_auhen_etudiant=$connexion->prepare($reqSQL_authentification_etudiant);
        $resultat_req_auhen_etudiant->execute();
        
        $resultat_ID_responsable=$resultat_req_authen_responsable->fetchAll();
        $resultat_ID_etudiant=$resultat_req_auhen_etudiant->fetchAll();

        $nb_req_etu=$resultat_req_auhen_etudiant->rowCount();
        $nb_req_respon=$resultat_req_authen_responsable->rowCount();

          

          

          if( $nb_req_etu==0 && $nb_req_respon!=0 ){//&& !isset($_SESSION['Nom_etudiant']) && !isset($_SESSION['Prenom_etudiant'])
               echo 'Connexion réussie pour responsable !';
               //Afficher la page utilisateur
               
               foreach($resultat_ID_etudiant as $data2){
                    // $_SESSION['Nom_etudiant']=$data2['Nom_etudiant']; //nom de famille
                    // $_SESSION['Prenom_etudiant']=$data2['Prenom_etudiant'];//prenom
     
                    $_SESSION['nom_responsable']=$data2['Nom_etudiant']; //nom de famille
                    $_SESSION['prenom_responsable']=$data2['Prenom_etudiant'];//prenom
               }
               header('Location: espace_responsable.php');
               
          }else if( $nb_req_etu!=0 && $nb_req_respon==0 ){ //&& !isset($_SESSION['Nom_responsable']) && !isset($_SESSION['Prenom_responsable'])
               //Rester sur la page de connexion tout en informant le client.
               echo 'Connexion réussie pour etudiant !';
               foreach($resultat_ID_responsable as $data1){
                    // $_SESSION['Nom_responsable']=$data1['Nom_responsable']; //nom de famille
                    // $_SESSION['Prenom_responsable']=$data1['Prenom_responsable'];
                    $_SESSION['nom_etudiant']=$data1['Nom_responsable']; //nom de famille
                    $_SESSION['prenom_etudiant']=$data1['Prenom_responsable']; //prenom
               }
               header('Location: espace_etudiant.php');
               
               
               //Informer par requête AJAX.
          }else if($nb_req_etu==0 && $nb_req_respon==0){
               // header('Location: ../modele/connexion.html'); //Affichage de la même page
               ?>
                    <script> alert("Votre indentifiant est incorrect !"); </script>
               <?php
               header('Location: ../modele/connexion.html'); 
     }

      
    }


    try{
          $_SESSION = array();
          session_destroy();
          session_start();
        
        
          connexion($_POST['adresse_mail_CO'],$_POST['mdp_CO']);

        // $reqSQL_Id_respo="SELECT R.Id_responsable FROM responsable R WHERE R.adresse_mail=$mail_responsable_entre";

        // $res=$connexion->prepare($reqSQL_mail_respo);
        // $res->execute();
        // $res2=$res->fetchAll();
        // $resultat=serialize($res2);
        // echo $resultat; 
        // $res_mail=implode("",$preparateur_requete2);
      
        // if($res2=true){
        //     echo 'Bien joué';;
        // }elseif($res2=false){
        //     echo 'Reéssayer';
        // }

        // connexion_responsable($BDD,$username,$password);
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }   

    
     function name($nom){
          return $nom;
     }
?>