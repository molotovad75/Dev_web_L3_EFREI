<?php 
    session_start(); 
    if(!$_SESSION['mdp'] || !$_SESSION['mail']){
        header('Location: ../modele/index.html');
    }
    const BDD='mysql:host=localhost;dbname=dev_web_projet_2;charset=utf8';
    const username='root';
    const password='';    

    $nom_materiel="";
    $description=""; 

    $prix="";
    $code_barre="";

?>

<!DOCTYPE html>
<html>
    <head>       
        <link rel="stylesheet" href="../vue/style.css"> 
        <script src="../vue/script.js" type="text/javascript" ></script>
        <title>EFREI Paris - Projet 2 DevWeb - LACHHAB Adrien </title>
        <meta charset="utf-8" />
        
        <!-- Importation de Bootstrap -->
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/39fb408f93.js" crossorigin="anonymous"></script>
        
    </head>
    
    <body>       
        <!-- menu :  Notre matériel, Se connecter, S'inscrire -->
        <script>
            var code_barre=[];
            let code_barre_net="";
            function generationchiffre(max){//13 chiffres dans un code barre
                
                let i=0;
                for(i=0;i<13;i++){
                    code_barre.push(Math.floor(Math.random()*max));
                }               
                code_barre_net=code_barre.join('');
                if(document.getElementById("code_barre").innerHTML==""){
                    document.getElementById("code_barre").innerHTML=code_barre_net;
                    
                    // var objet_JSON={"Codebarre": code_barre_net};
                    // var fichier_json=JSON.parse(objet_JSON);
                    // //AJAX

                    // var xhr=new XMLHttpRequest();
                    // xhr.onreadystatechange=function(){
                    //     console.log(this);
                    //     if(this.readyState==4 && this.status==200){
                            
                    //     }
                    // }
                    // //Il faudrai trouver le moyen de piocher le code barre dans un fichier jSON.
                    // xhr.open("GET",,true);
                }
                else{
                    document.getElementById("code_barre").innerHTML="";
                    code_barre=[];
                    generationchiffre(max);
                }
                
                return code_barre;
            }
        </script>
        
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <header id="menu">
                <a href="../modele" id="nom_site" >ElecInfoMatos</a> <!-- id="nom_site" -->
                <div id="ins_conn">
                    <a href="deconnexion.php"  id="deconnexion"  >Déconnexion</a> <!--  id="deconnexion" -->
                </div>
                <!-- <script>const num=1; let num2=num;</script> -->
    
                <!-- <script>let num=1; let num2;</script> -->
                <!-- <a id="derouleur" onclick="num2=num;deroulement(num2);num++;num2=num;" class="number"><i class="fas fa-bars" ></i></a> -->
                <!-- <script> let i=1; let etat=false;</script>  deroulement(i,etat)-->
                <!-- <script>i=2; etat=true;</script> -->
            </header>
       
        
        <div id="page_centrale" class="container">
            <div id="presentation">
                <h1>Bienvenue dans votre espace responsable <?php echo strtoupper($_SESSION['Nom_responsable']), " ", $_SESSION['Prenom_responsable']; ?></h1>
                <br>
                <div class="row">
                    <div class="col-6">
                        <h3>Rechercher un produit dans notre stock de matériel </h3>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Recherche code barre</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Recherche description</button>
                                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Recherche nom</button>
                                </div>

                            </nav>
                                <form action="espace_responsable.php" method="POST" name="" id="">
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <!-- code barre     -->
                                            <br>
                                            <input type="text" name="recherche_materiel" id="recherche_materiel" class="form-control" placeholder="Code barre" >
                                            <br>
                                            <input type="submit" name="envoyer" id="envoyer" value="Chercher" class="form-control">
                                        </div>
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            <!-- Description -->
                                            <br>
                                            <textarea name="texte_descriptif" id="texte_descriptif" placeholder="Description du produit" class="form-control"></textarea>
                                            <br>
                                            <input type="submit" name="envoyer" id="envoyer" value="Chercher" class="form-control">
                                        </div>
                                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                            <!-- recherche_nom -->
                                            <br>
                                            <input type="text" name="recherche_materiel" id="recherche_materiel" class="form-control" placeholder="Name" >
                                            <br>

                                            <input type="submit" name="envoyer" id="envoyer" value="Chercher" class="form-control">
                                        </div>
                                    </div>
                                </form>
                                <!-- Portion de code PHP pour s'occuper du formulaire -->
                                

                    </div>
                    <div class="col-6">
                        <h3>Faites</h3>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-6">
                        <h3>Statistiques</h3>
                        
                        <!-- document.getElementById("age").innerHTML=age_adrien(); <span id="age"></span>-->
                    </div>
                    <div class="col-6">
                        <h3>Créer un article (Génération automatique du code barre et nouveau matériel en BDD) </h3>
                        <!-- <p>Veuillez générer un code barre en appuyant sur le bouton suivant : <br></p>
                        
                        <button id="generer_code_barre" class="btn btn-outline-dark" onclick="generationchiffre(10)">Générer ! </button> -->
                        <!-- <span id="codebarre"></span> -->
                        
                        <form id="creation_article" name="creation_article" method="POST" action="insertion_article.php" > <!--  action="insertion_article.php" oninput="generationchiffre(10)"-->
                           
                            <br>
                            <input type="text" id="nom_produit" name="nom_produit" placeholder="Nom du produit" class="form-control"> 
                            <br>
                            <textarea id="description" name="description" placeholder="Description du produit" class="form-control"></textarea>
                            <br>
                            <input type="number" id="euros" name="prix" placeholder="Prix €" class="form-control" step="0.01" min="0">
                            <br>
                            <!-- <output id="code_barre" name="codebarre" class="form-control" ></output>
                            <br> -->
                            
                            <input type="submit" name="envoyer" id="envoyer" value="Enregistrer" class="form-control">
                        </form>
                    </div>  
                </div>
            </div>

            <div id="prensation_technos">
                <div class="text-start">
                    <h3>Gestion des étudiants !</h3>
                    <?php

                          
                    ?>
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Mail</th>
                                <th scope="col"> Nombre d'emprunts</th>
                                <th scope="col"> Selection 
                                    <!-- <input class="form-check-input" type="checkbox" value="selectionner_tous_etudiants" id="flexCheckDefault" name="selectionner_tous_etudiants">
                                    <label class="form-check-label" for="flexCheckDefault">Tout sélectionner</label> -->
                                </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php 
                                $nombre_etudiants=0;
                                 try{
                                    $reqSQL_tous_etudiant="SELECT E.Nom_etudiant, E.Prenom_etudiant, E.mail_etudiant, E.Nb_emprunts FROM etudiant AS E ORDER BY E.Nom_etudiant";
                                    $connexion=new PDO(BDD,username,password);
                                    $execution_SQL_tous_etudiant=$connexion->prepare($reqSQL_tous_etudiant);
                                    $execution_SQL_tous_etudiant->execute();
                                    $resultat_SQL_tout_etudiant=$execution_SQL_tous_etudiant->fetchAll();
                                    $nombre_etudiants=$execution_SQL_tous_etudiant->rowCount();
        
                                    $tab_nom_etu=[$nombre_etudiants];
                                    $tab_prenom_etu=[$nombre_etudiants];
                                    $tab_mail_etu=[$nombre_etudiants];
                                    $tab_nb_emprunts_etu=[$nombre_etudiants];
                                    $i=0;
                                    foreach($resultat_SQL_tout_etudiant as $data_tab_etudiant){
                                        $tab_nom_etu[$i]=$data_tab_etudiant['Nom_etudiant'];
                                        $tab_prenom_etu[$i]=$data_tab_etudiant['Prenom_etudiant'];   
                                        $tab_mail_etu[$i]=$data_tab_etudiant['mail_etudiant'];
                                        $tab_nb_emprunts_etu[$i]=$data_tab_etudiant['Nb_emprunts'];
                                        $i=$i+1;
                                    }
                                 }catch(ErrorException $e){
                                     echo $e;
                                 } 
                                
                                $i=0;
                                for($e=1;$e<=$nombre_etudiants;$e++){
                                    ?>
                                        <tr>
                                            <th scope="row">
                                                <?php
                                                    echo $e;
                                                ?>
                                            </th>
                                            <td>
                                                <?php
                                                   echo $tab_nom_etu[$i];
                                                ?>
                                            </td>

                                            <td>
                                                <?php
                                                    echo $tab_prenom_etu[$i];
                                                ?>
                                            </td>

                                            <td>
                                                <?php
                                                    echo $tab_mail_etu[$i];
                                                ?>
                                            </td>

                                            <td>
                                                <?php
                                                    echo $tab_nb_emprunts_etu[$i];
                                                ?>
                                            </td>

                                            <td id="indice_<?php echo $e;?>">
                                                <input class="form-check-input" type="checkbox" value="<?php echo $e; ?>" id="flexCheckDefault" name="<?php echo $e; ?>">
                                                <!-- <label class="form-check-label" for="flexCheckDefault"></label> -->
                                            </td>
                                        </tr>
                                    <?php
                                    $i=$i+1;
                                }
                            ?>
                        </tbody>
                    </table>
                    <p>Sélectionner toutes les valeurs --> <input class="form-check-input" type="checkbox" value="toutes_valeurs0" id="toutes_valeurs0" name="toutes_valeurs0"></p>
                    
                    <label for="customRange2" class="form-label">Faites défiler le curseur pour faire votre choix</label> 
                    <input type="range" class="form-range" min="0" max="2" id="choix0" />
                    <p>Choix : </p><output id="choix0_final"></output>
                    
                    
                    
                    <script>
                        $(function() {
                            $('#choix0').next().text('Modification'); // Valeur par défaut
                            $('#choix0').on('input', function() {
                                var $set = $(this).val();
                                $(this).next().text($set);
                                if($(this).val()==0){
                                    $(this).next().text('Création');
                                }else if($(this).val()==1){
                                    $(this).next().text('Modification');
                                }else if($(this).val()==2){
                                    $(this).next().text('Suppression');
                                }
                            });

                            
                        });
                        // let selecteur=document.getElementById("choix0");
                        // if(selecteur.){

                        // }
                    </script>

                    <!-- CREATION -->
                    <form id="creation_etudiant" name="creation_etudiant" action="espace_responsable.php"  method="POST" class="container-fluid" enctype="multipart/form-data">
                        <div id="creation" class="form-floating mb-3">
                            <input type="text" name="nom" id="creation_nom" placeholder="Nom" class="form-control"/>
                            <label for="creation_nom">Nom</label>
                        </div>
                        <div id="creation" class="form-floating mb-3">
                            <input type="text" name="prenom" id="creation_prenom" placeholder="Prenom" class="form-control"/>
                            <label for="creation_prenom">Prenom</label>
                        </div>
                        <div id="creation" class="form-floating mb-3">
                            <input type="text" name="mail" id="creation_mail" placeholder="Adresse mail" class="form-control"/>
                            <label for="creation_mail">Adresse mail</label>
                        </div>
                        <div id="creation" class="form-floating mb-3">
                            <input type="text" name="mdp" id="creation_mdp" placeholder="Mot de passe" class="form-control"/>
                            <label for="creation_mdp">Mot de passe</label>
                        </div>
                        
                        <input type="submit" name="envoyer" id="envoyer"  value="Créer l'étudiant" class="form-control"/>
                    </form>
                    <?php
                        $nom=$_POST['nom'];
                        $prenom=$_POST['prenom'];
                        $mail=$_POST['mail'];
                        $mdp=$_POST['mdp'];
                        $reqSQL_verif_mails_responsable="SELECT R.adresse_mail FROM responsable AS R;";//Pour vérifier si notre inscrit n'a pas de compte responsable
                        $req_SQL_etudiant="INSERT INTO etudiant VALUES(NULL,'$nom','$prenom','$mail',0,'$mdp');"; //Insertion d'un étudiant dans la BDD
                        $reqSQL_verif_doublon_mail="SELECT E.mail_etudiant FROM etudiant AS E;";
                        $connexion=new PDO(BDD,username,password);

                        $envoie_requete_verif_mail=$connexion->prepare($reqSQL_verif_doublon_mail);
                        $envoie_requete_verif_mail->execute();
                        $resultat_mail_etu_respo=$envoie_requete_verif_mail->fetchAll();

                        $envoyer_inscription=true;
                        foreach($resultat_mail_etu_respo as $data){
                            if($_POST['mail']==$data['mail_etudiant']){
                                $envoyer_inscription=false;
                            }
                        
                        }

                        $envoie_requete_verif_mail_responsable=$connexion->prepare($reqSQL_verif_mails_responsable);
                        $envoie_requete_verif_mail_responsable->execute();
                        $resultat_requete_verif_mail_responsable=$envoie_requete_verif_mail_responsable->fetchAll();
                        //Boucle foreach pour vérifier tous les mails des responsables
                        foreach($resultat_requete_verif_mail_responsable as $data_mails_responsable){
                            if($_POST['mail']==$data_mails_responsable['adresse_mail']){
                                $envoyer_inscription=false;
                            }
                        }  
                        
                        if($envoyer_inscription==true){
                            $inscription=$connexion->prepare($req_SQL_etudiant);
                            $inscription->execute();
                        }
                    ?>
                    


                </div>   
                            <!-- TABLEAU GESTION DU MATERIEL -->
                <div class="text-end">
                    <h3>Gestion du matériel !</h3>
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" id="colonne_codebarre">Code Barre</th>
                                <th scope="col" id="colonne_nom_materiel">Nom du matériel</th>
                                <th scope="col" id="colonne_description">Description</th>
                                <th scope="col" id="colonne_date_achat">Date d'achat</th>
                                <th scope="col" id="colonne_prix_achat">Prix </th>
                                <th scope="col" id="colonne_liste_emprunt">Emprunté ? </th>
                                <th scope="col"> Sélection </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $nombre_materiel=0; 
                                try{    
                                    $req_SQL_recuperer_materiel="SELECT M.Code_barre, M.Nom_materiel, M.Description, M.Date_achat, M.Prix_achat, M.emprunte FROM materiel AS M";
                                    $execution_SQL_tous_materiel=$connexion->prepare($req_SQL_recuperer_materiel);
                                    $execution_SQL_tous_materiel->execute();
                                    $resultat_all_tools=$execution_SQL_tous_materiel->fetchAll();
                                    $nombre_materiel=$execution_SQL_tous_materiel->rowCount();

                                    $liste_code_barre=[$nombre_materiel];
                                    $liste_Nom_materiel=[$nombre_materiel];
                                    $liste_Description=[$nombre_materiel];
                                    $liste_Date_achat=[$nombre_materiel];
                                    $liste_Prix_achat=[$nombre_materiel];
                                    $liste_emprunts=[$nombre_materiel];

                                    $i=0;
                                    foreach($resultat_all_tools as $data_tools){
                                        $liste_code_barre[$i]=$data_tools['Code_barre'];
                                        $liste_Nom_materiel[$i]=$data_tools['Nom_materiel'];
                                        $liste_Description[$i]=$data_tools['Description'];
                                        $liste_Date_achat[$i]=$data_tools['Date_achat'];
                                        $liste_Prix_achat[$i]=$data_tools['Prix_achat'];
                                        $liste_emprunts[$i]=$data_tools['emprunte'];
                                        $i=$i+1;
                                    }


                                }catch(ErrorException $e){
                                    echo $e;
                                }
                            $i=0;
                            for($e=1;$e<=$nombre_materiel;$e++){
                            ?>
                            <tr>
                                <th scope="row">
                                    <?php
                                        echo $e;
                                    ?>
                                </th>

                                <td id="colonne_codebarre">
                                    <?php
                                        echo $liste_code_barre[$i];
                                    ?>
                                </td>

                                <td id="colonne_nom_materiel">
                                    <?php
                                        echo $liste_Nom_materiel[$i];
                                    ?>
                                </td>

                                <td id="colonne_description">
                                    <?php
                                        echo $liste_Description[$i];
                                    ?>
                                </td>

                                <td id="colonne_date_achat">
                                    <?php
                                        echo $liste_Date_achat[$i];
                                    ?>
                                </td>

                                <td id="colonne_prix_achat">
                                    <?php
                                        echo $liste_Prix_achat[$i];
                                    ?>
                                </td>

                                <td id="colonne_liste_emprunt">
                                    <?php
                                        if($liste_emprunts[$i]==0){
                                            echo "Non";
                                        }else{
                                            echo "Oui";
                                        }
                                        
                                    ?>
                                </td>

                                <td id="indice_<?php echo $e;?>">
                                    <input class="form-check-input" type="checkbox" value="<?php echo $e;?>" id="flexCheckDefault" name="<?php echo $e;?>">
                                </td>
                            </tr>
                            <?php
                                $i=$i+1;
                            }
                           
                            ?>
                            
                        </tbody>

                    </table>
                    
                    <p>Sélectionner toutes les valeurs --> <input class="form-check-input" type="checkbox" value="toutes_valeurs1" id="toutes_valeurs1" name="toutes_valeurs1"></p>

                    
                </div>

                <div class="text-start">
                    <h3> Gestion des utilisateurs ! </h3>
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Mail</th>
                                <th scope="col"> Nombre d'emprunts</th>
                                <th scope="col"> Selection 
                                    <!-- <input class="form-check-input" type="checkbox" value="selectionner_tous_etudiants" id="flexCheckDefault" name="selectionner_tous_etudiants">
                                    <label class="form-check-label" for="flexCheckDefault">Tout sélectionner</label> -->
                                </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php 
                                $nombre_etudiants=0;
                                 try{
                                    $reqSQL_tous_etudiant="SELECT E.Nom_etudiant, E.Prenom_etudiant, E.mail_etudiant, E.Nb_emprunts FROM etudiant AS E ORDER BY E.Nom_etudiant";
                                    $connexion=new PDO(BDD,username,password);
                                    $execution_SQL_tous_etudiant=$connexion->prepare($reqSQL_tous_etudiant);
                                    $execution_SQL_tous_etudiant->execute();
                                    $resultat_SQL_tout_etudiant=$execution_SQL_tous_etudiant->fetchAll();
                                    $nombre_etudiants=$execution_SQL_tous_etudiant->rowCount();
        
                                    $tab_nom_etu=[$nombre_etudiants];
                                    $tab_prenom_etu=[$nombre_etudiants];
                                    $tab_mail_etu=[$nombre_etudiants];
                                    $tab_nb_emprunts_etu=[$nombre_etudiants];
                                    $i=0;
                                    foreach($resultat_SQL_tout_etudiant as $data_tab_etudiant){
                                        $tab_nom_etu[$i]=$data_tab_etudiant['Nom_etudiant'];
                                        $tab_prenom_etu[$i]=$data_tab_etudiant['Prenom_etudiant'];   
                                        $tab_mail_etu[$i]=$data_tab_etudiant['mail_etudiant'];
                                        $tab_nb_emprunts_etu[$i]=$data_tab_etudiant['Nb_emprunts'];
                                        $i=$i+1;
                                    }
                                 }catch(ErrorException $e){
                                     echo $e;
                                 } 
                                
                                $i=0;
                                for($e=1;$e<=$nombre_etudiants;$e++){
                                    ?>
                                        <tr>
                                            <th scope="row">
                                                <?php
                                                    echo $e;
                                                ?>
                                            </th>
                                            <td>
                                                <?php
                                                   echo $tab_nom_etu[$i];
                                                ?>
                                            </td>

                                            <td>
                                                <?php
                                                    echo $tab_prenom_etu[$i];
                                                ?>
                                            </td>

                                            <td>
                                                <?php
                                                    echo $tab_mail_etu[$i];
                                                ?>
                                            </td>

                                            <td>
                                                <?php
                                                    echo $tab_nb_emprunts_etu[$i];
                                                ?>
                                            </td>

                                            <td id="indice_<?php echo $e;?>">
                                                <input class="form-check-input" type="checkbox" value="<?php echo $e; ?>" id="flexCheckDefault" name="<?php echo $e; ?>">
                                                <!-- <label class="form-check-label" for="flexCheckDefault"></label> -->
                                            </td>
                                        </tr>
                                    <?php
                                    $i=$i+1;
                                }
                            ?>
                        </tbody>
                    </table>

                    <p>Sélectionner toutes les valeurs --> <input class="form-check-input" type="checkbox" value="toutes_valeurs2" id="toutes_valeurs2" name="toutes_valeurs2"></p>
                    
                </div>
            </div>
            
            

        </div>
        
        

        <footer>
            <p id="phrase_footer" > Curieux des technologies employés ? </p>
            <p id="logos_technos"> 
                <a href="https://developer.mozilla.org/fr/docs/Glossary/HTML5" id="logo_html" class="" target="_blanck"><i class="fa fa-html5"></i> </a>
                <a href="https://developer.mozilla.org/fr/docs/Web/CSS" id="logo_css" class="" target="_blanck"><i class="fa fa-css3"></i></a>
                <a href="https://getbootstrap.com" id="logo_bootstrap" class="" target="_blanck"><i class="fab fa-bootstrap"></i></a>
                <a href="https://github.com" id="logo_github" class="" target="_blanck"><i class="fa fa-github"></i> </a>
                <a href="https://developer.mozilla.org/fr/docs/Web/JavaScript" id="logo_js" class="" target="_blanck"><i class="fa-brands fa-js"></i></a>
                <a href="https://www.php.net" id="logo_php" class="" target="_blanck"><i class="fa-brands fa-php" ></i> </a>
                <a href="https://sql.sh" id="logo_BDD" class="" target="_blanck"><i class="fa-solid fa-database" ></i></a>
                <a href="https://trello.com/fr" id="logo_trello" class="" target="_blanck"><i class="fab fa-trello" ></i></a>
                <a href="https://aws.amazon.com/fr/" id="logo_aws" class="" target="_blanck"><i class="fab fa-aws" ></i></a>
            </p>
            
        </footer>

        <!-- Bootstrap JS bundle →-->

         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
        crossorigin="anonymous">
        </script> 
        
    </body> 
    
    
</html>