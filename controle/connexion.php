<!DOCTYPE html>
<html>
    <head>
        <title>EFREI Paris - Projet 2 DevWeb - LACHHAB Adrien </title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../vue/style.css"> 
        <!-- Importation de Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/39fb408f93.js" crossorigin="anonymous"></script>
        <script src="../vue/script.js" type="text/javascript" > </script>
    </head>
    <body>
        <header id="menu">
            <a href="../modele" id="nom_site" >ElecInfoMatos.com</a>  <!-- id="nom_site" -->
        </header>
        <section class=""   >

        </section>
        <div class="container">
            <div class="row">
                <h1></h1>
                <div class="col-6">
                    <input type="text" name="identifiant" id="identifiant" placeholder="ID or mail adresse/Identifiant ou adresse électronique">
                </div>
                <div class="col-6">
                    <input tpe="password" name="mdp" id="mdp" placeholder="Password/Mot de passe">
                </div>

                <input type="submit" name="envoyer" id="envoyer" placeholder="Send/Envoyer"> 
            </div>
        </div>
        
        <footer>
            <p id="phrase_footer" > Pour en savoir plus sur ces technologies !</p>
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