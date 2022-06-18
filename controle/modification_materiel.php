<?php

    const BDD='mysql:host=localhost;dbname=dev_web_projet_2;charset=utf8';
    const username='root';
    const password='';    
    $code_barre_actuel="";
    $nouveau_nom_materiel="";
    $description="";
    $modification_prix_achat="";
    $modification_emprunt="";
    $modification_date_achat="";

    if(isset($_POST['code_barre_actuel']) || isset($_POST['nom_materiel']) 
    || isset($_POST['description']) || isset($_POST['modification_prix_achat']) 
    || isset($_POST['modification_date_achat_materiel']) 
    || isset($_POST['modification_emprunt'])){
        
        $code_barre_actuel=$_POST['code_barre_actuel'];
        $nouveau_nom_materiel=$_POST['nom_materiel'];
        $nouvelle_description=$_POST['description'];
        $modification_prix_achat=$_POST['modification_prix_achat'];
        $modification_date_achat=$_POST['modification_date_achat_materiel'];
        $modification_emprunt=$_POST['modification_emprunt'];
    }

    $connexion= new PDO(BDD,username,password);

    $reqSQL_modification_materiel_BDD_nom_materiel="UPDATE materiel SET `Nom_materiel`='$nouveau_nom_materiel' WHERE `Code_barre`='$code_barre_actuel';";
    $reqSQL_modification_materiel_BDD_description="UPDATE materiel SET `Description`='$nouvelle_description' WHERE `Code_barre`='$code_barre_actuel';";
    $reqSQL_modification_materiel_BDD_prix_achat="UPDATE materiel SET `Prix_achat`='$modification_prix_achat' WHERE `Code_barre`='$code_barre_actuel';";
    $reqSQL_modification_materiel_BDD_date_achat="UPDATE materiel SET `Date_achat`='$modification_date_achat' WHERE `Code_barre`='$code_barre_actuel';";
    $reqSQL_modification_materiel_BDD_emprunt="UPDATE materiel SET `emprunte`='$modification_emprunt' WHERE `Code_barre`='$code_barre_actuel';";


    if( strlen($nouveau_nom_materiel)>0 && strlen($nouvelle_description)>0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)>0){
        //0
        $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_nom_materiel)->execute();
        
    }
    else if( strlen($nouveau_nom_materiel)>0 && strlen($nouvelle_description)>0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)==0){
        $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_nom_materiel)->execute();
    }
    else if( strlen($nouveau_nom_materiel)>0 && strlen($nouvelle_description)>0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)>0){
        $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_nom_materiel)->execute();
    }
    else if( strlen($nouveau_nom_materiel)>0 && strlen($nouvelle_description)>0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)==0){
        $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_nom_materiel)->execute();
        
    }
    else if( strlen($nouveau_nom_materiel)>0 && strlen($nouvelle_description)>0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)>0){

        $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_nom_materiel)->execute();
    }
    else if( strlen($nouveau_nom_materiel)>0 && strlen($nouvelle_description)>0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)==0){
        $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_nom_materiel)->execute();
        
    }
    else if( strlen($nouveau_nom_materiel)>0 && strlen($nouvelle_description)>0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)>0){
        
        $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_nom_materiel)->execute();
    }
    else if( strlen($nouveau_nom_materiel)>0 && strlen($nouvelle_description)>0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)==0){
        //8
        $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_nom_materiel)->execute();
    }
    else if( strlen($nouveau_nom_materiel)>0 && strlen($nouvelle_description)==0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)>0){

        $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_nom_materiel)->execute();
    }
    else if( strlen($nouveau_nom_materiel)>0 && strlen($nouvelle_description)==0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)==0){
        $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_nom_materiel)->execute();
        
    }
    else if( strlen($nouveau_nom_materiel)>0 && strlen($nouvelle_description)==0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)>0){

        $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_nom_materiel)->execute();
    }
    else if( strlen($nouveau_nom_materiel)>0 && strlen($nouvelle_description)==0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)==0){

        $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_nom_materiel)->execute();
    }
    else if( strlen($nouveau_nom_materiel)>0 && strlen($nouvelle_description)==0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)>0){

        $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_nom_materiel)->execute();
    }
    else if( strlen($nouveau_nom_materiel)>0 && strlen($nouvelle_description)==0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)==0){

        $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_nom_materiel)->execute();
    }
    else if( strlen($nouveau_nom_materiel)>0 && strlen($nouvelle_description)==0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)>0){

        $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_nom_materiel)->execute();
    }

    else if( strlen($nouveau_nom_materiel)>0 && strlen($nouvelle_description)==0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)==0){
        //16
        $connexion->prepare($reqSQL_modification_materiel_BDD_nom_materiel)->execute();
    }
    else if( strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)>0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)>0){

        $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
    }
    else if( strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)>0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)==0){
        $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
    }
    else if( strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)>0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)>0){

        $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
    }
    else if( strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)>0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)==0){
        $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
    }
    else if( strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)>0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)>0){

        $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
    }
    else if( strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)>0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)==0){

        $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
    }
    else if( strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)>0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)>0){

        $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
    }
    else if( strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)>0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)==0){
        //24
        $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
    }
    else if( strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)==0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)>0){
        $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
        
    }
    else if( strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)==0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)==0){
        $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
    }
    else if( strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)==0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)>0){

        $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
    }
    else if( strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)==0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)==0){
        $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
        
    }
    else if( strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)==0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)>0){
        $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
        $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
        
    }
    else if( strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)==0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)==0){

        $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
    }
    else if( strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)==0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)>0){
        $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
        
    }
    // else if( strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)==0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)==0){
    //     //32
        
    // }

    // else if(strlen($nouveau_nom_materiel)==0 &&  strlen($nouvelle_description)>0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)>0){
        
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
    // }
    // else if(strlen($nouveau_nom_materiel)==0 &&  strlen($nouvelle_description)>0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)==0){

    //     $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
    // }
    // else if(strlen($nouveau_nom_materiel)==0 &&  strlen($nouvelle_description)>0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)>0){

    //     $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
    // }
    // else if(strlen($nouveau_nom_materiel)==0 &&  strlen($nouvelle_description)>0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)==0){

    //     $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
    // }
    // else if(strlen($nouveau_nom_materiel)==0 &&  strlen($nouvelle_description)>0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)>0){

    //     $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
    // }
    // else if(strlen($nouveau_nom_materiel)==0 &&  strlen($nouvelle_description)>0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)==0){

    //     $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
    // }
    // else if(strlen($nouveau_nom_materiel)==0 &&  strlen($nouvelle_description)>0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)>0){
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
        
    // }
    // else if(strlen($nouveau_nom_materiel)==0 &&  strlen($nouvelle_description)>0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)==0){
    //     //8
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
    // }
    // else if(strlen($nouveau_nom_materiel)==0 &&  strlen($nouvelle_description)==0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)>0){
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
        
    // }
    // else if(strlen($nouveau_nom_materiel)==0 &&  strlen($nouvelle_description)==0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)==0){

    //     $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
    // }
    // else if(strlen($nouveau_nom_materiel)==0 &&  strlen($nouvelle_description)==0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)>0){

    //     $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
    // }
    // else if(strlen($nouveau_nom_materiel)==0 &&  strlen($nouvelle_description)==0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)==0){

    //     $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
    // }
    // else if(strlen($nouveau_nom_materiel)==0 &&  strlen($nouvelle_description)==0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)>0){

    //     $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
    // }
    // else if(strlen($nouveau_nom_materiel)==0 &&  strlen($nouvelle_description)==0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)==0){

    //     $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
    // }
    // else if(strlen($nouveau_nom_materiel)==0 &&  strlen($nouvelle_description)==0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)>0){

    //     $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
    // }
    // else if(strlen($nouveau_nom_materiel)==0 &&  strlen($nouvelle_description)==0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)==0){
    //     //48
        
    // }
    // else if(strlen($nouveau_nom_materiel)==0 && strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)>0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)>0){

    //     $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
    // }
    // else if(strlen($nouveau_nom_materiel)==0 && strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)>0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)==0){

    //     $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
    // }
    // else if(strlen($nouveau_nom_materiel)==0 && strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)>0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)>0){

    //     $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
    // }
    // else if(strlen($nouveau_nom_materiel)==0 && strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)>0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)==0){
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
    // }
    // else if(strlen($nouveau_nom_materiel)==0 && strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)>0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)>0){

    //     $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
    // }
    // else if(strlen($nouveau_nom_materiel)==0 && strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)>0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)==0){
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
    // }
    // else if(strlen($nouveau_nom_materiel)==0 && strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)>0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)>0){
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
    // }
    // else if(strlen($nouveau_nom_materiel)==0 && strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)>0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)==0){
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_description)->execute();
        
    // }
    // else if(strlen($nouveau_nom_materiel)==0 && strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)==0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)>0){
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
        
    // }
    // else if(strlen($nouveau_nom_materiel)==0 && strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)==0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)==0){

    //     $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
    // }
    // else if(strlen($nouveau_nom_materiel)==0 && strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)==0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)>0){
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
    // }
    // else if(strlen($nouveau_nom_materiel)==0 && strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)==0 && strlen($modification_prix_achat)>0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)==0){

    //     $connexion->prepare($reqSQL_modification_materiel_BDD_prix_achat)->execute();
    // }
    // else if(strlen($nouveau_nom_materiel)==0 && strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)==0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)>0){

    //     $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
    // }
    // else if(strlen($nouveau_nom_materiel)==0 && strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)==0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)>0 && strlen($modification_emprunt)==0){

    //     $connexion->prepare($reqSQL_modification_materiel_BDD_date_achat)->execute();
    // }
    // else if(strlen($nouveau_nom_materiel)==0 && strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)==0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)>0){
    //     $connexion->prepare($reqSQL_modification_materiel_BDD_emprunt)->execute();

    // }
    
    // else if(strlen($nouveau_nom_materiel)==0 && strlen($nouveau_nom_materiel)==0 && strlen($nouvelle_description)==0 && strlen($modification_prix_achat)==0 && strlen($modification_date_achat)==0 && strlen($modification_emprunt)==0){
    //     //64
        
    // }



    header('Location: espace_responsable.php');
?>