<?php 
    session_start(); 
    if(!$_SESSION['mdp'] || !$_SESSION['mail']){
        header('Location: ../modele/index.html');
    }
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
                <h1>Bienvenue dans votre espace étudiant <?php echo $_SESSION['Nom_etudiant'], "  ",$_SESSION['Prenom_etudiant']; ?></h1>
                <div class="row">
                    <div class="col-6">
                        <p>Connecté en tant qu'étudiant </p>
                    </div>
                    <div class="col-6">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p>Tout en adoptant le design parttern MVC (Modèle/Vue/Contrôle), 
                            L'application web à été développer en méthode agile par 
                            le developeur web Full-Stack LACHHAB Adrien : <span id="age"></span> ans.
                        </p>
                        <!-- document.getElementById("age").innerHTML=age_adrien(); <span id="age"></span>-->
                    </div>
                    <div class="col-6">
                        <p>Voici la liste de toutes les outils et technologies utilisées lors de la création de notre plateforme</p>

                    </div>  
                </div>
            </div>

            <div id="prensation_technos">
                <div class="text-start">
                    <h3>Front-end !</h3>
                    <img src="../vue/html-css-js.jpg" class="img-fluid" id="front">
                </div>   

                <div class="text-end">
                    <h3>Back-end !</h3>
                    <img src="../vue/backend.png" class="img-fluid" id="back">
                    
                </div>

                <div class="text-start">
                    <h3> Outils de gestion de projet ! </h3>
                    <img src="../vue/gestion_projet.png" class="img-fluid" id="gestion">
                    
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