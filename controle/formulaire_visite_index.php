<?php 
    
    session_start();
    const BDD='mysql:host=localhost;dbname=dev_web_projet_2;charset=utf8';
    const username='root';
    const mdp='';

    function push_message($name,$mail,$body_message){
        $connexion_BDD=new PDO(BDD,username,mdp);
        $req_SQL_insertion_form_index="INSERT INTO formulaire VALUES(NULL,'$name','$mail','$body_message');";
        $insertion=$connexion_BDD->prepare($req_SQL_insertion_form_index);
        $insertion->execute();
    }

    try{

        if(isset($_POST['nom']) & isset($_POST['adresse_mail']) & isset($_POST['message'])){
            push_message($_POST['nom'],$_POST['adresse_mail'],$_POST['message']);
        }else if(!isset($_POST['nom']) || !isset($_POST['adresse_mail']) || !isset($_POST['message'])){
            echo 'NOOPE';
        }
        
    }
    catch(ErrorException $e){
        echo $e;
    }

?>