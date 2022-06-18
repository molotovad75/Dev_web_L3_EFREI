<?php

    const BDD='mysql:host=localhost;dbname=dev_web_projet_2;charset=utf8';
    const username='root';
    const password='';    
    $code_barre_initial="";
    if(isset($_POST['code_barre_initial'])){
        $code_barre_initial=$_POST['code_barre_initial'];
    }
    
    $req_SQL_supression_materiel="DELETE FROM `materiel` WHERE `materiel`.`Code_barre`='$code_barre_initial';";
    $connexion=new PDO(BDD,username,password);
    $execution_req_SQL_supression_materiel=$connexion->prepare($req_SQL_supression_materiel);
    $execution_req_SQL_supression_materiel->execute();


    $req_SQL_suppression_valeurs_vides="DELETE FROM `materiel` 
                                        WHERE `materiel`.`Nom_materiel` = '' 
                                        AND `materiel`.`Description` = '' 
                                        AND `materiel`.`Date_achat` = '' 
                                        AND `materiel`.`Prix_achat` = '' 
                                        AND `materiel`.`emprunte` = '';";

    $connexion=new PDO(BDD,username,password);
    $execution_req_SQL_suppression_valeurs_vides=$connexion->prepare($req_SQL_suppression_valeurs_vides);
    $execution_req_SQL_suppression_valeurs_vides->execute();

    header('Location: espace_responsable.php');

?>