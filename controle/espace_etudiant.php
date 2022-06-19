<?php 
    session_start(); 
    if(!$_SESSION['mdp_etudiant'] || !$_SESSION['mail_etudiant']){
        header('Location: ../modele/index.html');
    }
    const BDD='mysql:host=localhost;dbname=dev_web_projet_2;charset=utf8';
    const username='root';
    const password='';  
    
?>
<!DOCTYPE html>
<html>
    <head>       
        <title>EFREI Paris - Projet 2 DevWeb - LACHHAB Adrien </title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../vue/style.css"> 
        <!-- Importation de Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/39fb408f93.js" crossorigin="anonymous"></script>
        <script src="../vue/script.js" type="text/javascript" ></script>
    </head>
    
    <body>       
        <!-- menu :  Notre matériel, Se connecter, S'inscrire -->
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <header id="menu">
                <a href="../modele" id="nom_site" >ElecInfoMatos</a> <!-- id="nom_site" -->
                <div id="ins_conn">
                    <a href="deconnexion.php"  id="deconnexion"  >Déconnexion</a>  <!--  id="deconnexion" -->
                    
                </div>
                <!-- <script>const num=1; let num2=num;</script> -->
    
                <!-- <script>let num=1; let num2;</script> -->
                <!-- <a id="derouleur" onclick="num2=num;deroulement(num2);num++;num2=num;" class="number"><i class="fas fa-bars" ></i></a> -->
                <!-- <script> let i=1; let etat=false;</script>  deroulement(i,etat)-->
                <!-- <script>i=2; etat=true;</script> -->
            </header>
       
        
        <div id="page_centrale" class="container">
            <div id="presentation">
                <h1>Bienvenue dans votre espace étudiant <?php echo strtoupper($_SESSION['Nom_etudiant']), "  ",$_SESSION['Prenom_etudiant']; ?></h1>

            </div>
            <h3>Emprunter du matériel !</h3>
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
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $nombre_materiel=0; 
                        try{    
                            $req_SQL_recuperer_materiel="SELECT M.Code_barre, M.Nom_materiel, M.Description, M.Date_achat, M.Prix_achat, M.emprunte FROM materiel AS M";
                            $connexion=new PDO(BDD,username,password);
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
                                }
                                else{
                                    echo "Oui";
                                }
                                
                            ?>
                        </td>
                    </tr>
                    <?php
                        $i=$i+1;
                    }
                    ?>
                    
                </tbody>

            </table>
            
            <form id="emprunter_materiel" name="emprunter_materiel" action="emprunter_materiel.php"  method="POST" class="container-fluid" enctype="multipart/form-data">                        
                <div id="emprunter" class="form-floating mb-3">
                    <input type="text" name="code_barre_initial" id="code_barre_initial" placeholder="Code barre initial" class="form-control">
                    <label for="code_barre_initial">Code barre initial</label>
                </div>

                <input type="submit" name="envoyer" id="envoyer"  value="Demande d'emprunt" class="form-control"/>
            </form>
            
            

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