<?php 
    const BDD='mysql:host=localhost;dbname=dev_web_projet_2;charset=utf8';
    const username='root';
    const password='';    
    
    function generationchiffre($min,$max){//13 chiffres dans un code barre
                                
        $i=0;
        for($i=0;$i<13;$i++){
            $code_barre[$i]=rand($min,$max);
        }               
        $code_barre_net=implode("",$code_barre);
        
        return $code_barre_net;
    }

    $nom_materiel=$_POST['nom_produit'];
    $description=$_POST['description'];
    $prix=$_POST['prix'];
    $codebarre=generationchiffre(0,9);
    $date=date("d.m.y");
    
    
    try{
        
        $req_SQL_insertion_article_BDD="INSERT INTO materiel VALUES(NULL,'$codebarre','$nom_materiel','$description','$date','$prix',0);";
        $connexion=new PDO(BDD,username,password);
        $executer_requete_SQL=$connexion->prepare($req_SQL_insertion_article_BDD);
        $executer_requete_SQL->execute();
        header('Location: espace_responsable.php');
        
    }catch(ErrorException $e){
        echo $e;
    }
?>
