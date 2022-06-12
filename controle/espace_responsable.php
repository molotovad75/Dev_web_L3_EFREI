<?php 
    session_start(); 
    if(!$_SESSION['mdp'] || !$_SESSION['mail']){
        header('Location: ../modele/index.html');
    }
    const BDD='mysql:host=localhost;dbname=dev_web_projet_2;charset=utf8';
    const username='root';
    const password='';    

    
?>

<!DOCTYPE html>
<html>
    <head>       
        <script src="../vue/script.js" type="text/javascript" ></script>
        <title>EFREI Paris - Projet 2 DevWeb - LACHHAB Adrien </title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../vue/style.css"> 
        <!-- Importation de Bootstrap -->
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
                if(document.getElementById("codebarre").innerHTML==""){
                    document.getElementById("codebarre").innerHTML="Le code barre sera : "+code_barre_net;
                }else{
                    document.getElementById("codebarre").innerHTML="";
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
                                <form action="" method="POST" name="" id="">
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <!-- code barre     -->
                                            <br>
                                            <input type="text" name="recherche_materiel" id="recherche_materiel" class="form-control" placeholder="Code barre" >

                                        </div>
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            <!-- Description -->
                                            <br>
                                            <textarea name="texte_descriptif" id="texte_descriptif" placeholder="Description du produit">
                                            </textarea>
                                        </div>
                                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                            <!-- recherche_nom -->
                                            <br>
                                            <input type="text" name="recherche_materiel" id="recherche_materiel" class="form-control" placeholder="Name" >
                                        </div>
                                    </div>
                                </form>
                                

                        <!-- <form id="formulaire_recherche_materiel" name="formulaire_recherche_materiel" method="POST" action="espace_responsable.php">
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                Moyen de recherche du matériel demandé
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><button class="dropdown-item" href="#" onclick="recherche_code_barre()">Code barre</button></li>
                                    <li><button class="dropdown-item" href="#" onclick="recherche_description()">Description</button></li>
                                    <li><button class="dropdown-item" href="#" onclick="recherche_nom()">Nom</button></li>
                                </ul>
                            </div>

                            <div class="row justify-content-md-center">
                                <div class="form-floating mb-3">
                                    <input type="text" name="recherche_materiel" id="recherche_materiel" class="form-control" placeholder="Name" >
                                    <label for="recherche_materiel" id="recherche_materiel" >Name</label>
                                </div>

                                <div class="mb-3">
                                    <input type="submit" name="rechercher" id="rechercher" value="Rechercher le matériel" class="form-control">
                                    
                                </div>
                            </div>

                            <script>
                                 function recherche_code_barre(){
                                    if(document.getElementById("recherche_materiel").placeholder=="Name"){
                                        document.getElementById("recherche_materiel").placeholder="Faites votre recherche avec le code barre";
                                    }
                                   
                                    // return mode;
                                }
                                
                                function recherche_description(){
                                    if(document.getElementById("recherche_materiel").placeholder=="Name"){
                                        document.getElementById("recherche_materiel").placeholder="Faites votre recherche avec la description";
                                    }
                                    
                                    // return mode;
                                }

                                function recherche_nom(){
                                    if(document.getElementById("recherche_materiel").placeholder=="Name"){
                                        document.getElementById("recherche_materiel").placeholder="Faites votre recherche avec le nom du produit";
                                    }
                                   
                                    // return mode;
                                }
                            </script>
                            
                        </form> -->
                        

                    </div>
                    <div class="col-6">
                        <h3>Faites</h3>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-6">
                        <h3>Statistiques</h3>
                        <p>

                        </p>
                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Nombre de prêts actuels</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <p class="card-text">
                                <a href="#" class="stretched-link text-danger" style="position: relative;">Stretched link will not work here, because <code>position: relative</code> is added to the link</a>
                                </p>
                                <p class="card-text bg-light" style="transform: rotate(0);">
                                This <a href="#" class="text-warning stretched-link">stretched link</a> will only be spread over the <code>p</code>-tag, because a transform is applied to it.
                                </p>
                            </div>
                        </div>
                        <!-- document.getElementById("age").innerHTML=age_adrien(); <span id="age"></span>-->
                    </div>
                    <div class="col-6">
                        <h3>Générer un code-barre </h3>
                        <p>Veuillez générer un code barre en appuyant sur le bouton suivant : <br></p>
                        <button id="generer_code_barre" class="btn btn-outline-dark" onclick="generationchiffre(10)">Générer ! </button> <span id="codebarre"></span><br>

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

                                            <td>
                                                <input class="form-check-input" type="checkbox" value="<?php echo $e; ?>" id="flexCheckDefault" name="<?php $e; ?>">
                                                <!-- <label class="form-check-label" for="flexCheckDefault"></label> -->
                                            </td>
                                        </tr>
                                    <?php
                                    $i=$i+1;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>   

                <div class="text-end">
                    <h3>Gestion du matériel !</h3>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>

                <div class="text-start">
                    <h3> Gestion des utilisateurs ! </h3>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                    
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