<?php
    $code_barre_initial="";
    if(isset($_POST['code_barre_initial'])){
        $code_barre_initial=$_POST['code_barre_initial'];
    }

    try{
        
        header('Location: espace_etudiant.php');
    }catch(ErrorException $e){
        echo $e;
    }
?>