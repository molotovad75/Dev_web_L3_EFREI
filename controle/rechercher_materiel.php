<?php

    require 'espace_responsable.php';
    
    function recherche_code_barre($code_barre){
        $req_SQL_get_code_barre="SELECT M.Code_barre FROM materiel AS M;";
        $connexion=new PDO(BDD,username,password);    
        $execution_req_SQL_get_code_barre=$connexion->prepare($req_SQL_get_code_barre);
        $execution_req_SQL_get_code_barre->execute();
        $resultat_req_SQL_get_code_barre=$execution_req_SQL_get_code_barre->fetchAll();
        $code_barre_en_BDD=false;
        $tab_code_barre=[$execution_req_SQL_get_code_barre->rowCount()];
        $i=0;
        foreach($resultat_req_SQL_get_code_barre as $data_req_SQL_get_code_barre){
            $tab_code_barre[$i]=$data_req_SQL_get_code_barre['Code_barre'];
            $i++;
        }   

        
        for($i=0;$i<$execution_req_SQL_get_code_barre->rowCount();$i++){
            if(strcmp($code_barre, $tab_code_barre[$i])==0){
                $code_barre_en_BDD=true;
                $i=$execution_req_SQL_get_code_barre->rowCount()-1;

            }
        }

        if($code_barre_en_BDD==true){
            $req_SQL_trouver_materiel="SELECT M.Nom_materiel, M.Description, M.emprunte FROM materiel AS M WHERE  M.Code_barre='$code_barre_en_BDD';";
            $execution_req_SQL_get_information=$connexion->prepare($req_SQL_trouver_materiel);
            $execution_req_SQL_get_information->execute();
            $resultat_req_SQL_get_information=$execution_req_SQL_get_information->fetchAll();

            $tab_information_nom=[$execution_req_SQL_get_information->rowCount()];
            $tab_information_description=[$execution_req_SQL_get_information->rowCount()];
            $tab_information_emprunter=[$execution_req_SQL_get_information->rowCount()];
            $i=0;
            foreach($resultat_req_SQL_get_information as $data_req_SQL_get_information){
                $tab_information_nom[$i]=$data_req_SQL_get_information['Nom_materiel'];
                $tab_information_description[$i]=$data_req_SQL_get_information['Description'];
                $tab_information_emprunter[$i]=$data_req_SQL_get_information['emprunte'];
                $i++;
            }
            
            $_SESSION['execution_req_SQL_get_information']=$execution_req_SQL_get_information;
            $_SESSION['tab_information_nom']=$tab_information_nom;
            $_SESSION['tab_information_description']=$tab_information_description;
            $_SESSION['tab_information_emprunter']=$tab_information_emprunter;


        }
    }

    function recherche_description($description){

    }

    function recherche_nom($nom){

    }

    try{
        if(isset($_POST['recherche_materiel_code_barre']) && !isset($_POST['rechercher_via_description']) && !isset($_POST['recherche_materiel_nom'])){
            recherche_code_barre($_POST['recherche_materiel_code_barre']);
        }else if(!isset($_POST['recherche_materiel_code_barre']) && isset($_POST['rechercher_via_description']) && !isset($_POST['recherche_materiel_nom'])){
            recherche_description($_POST['rechercher_via_description']);
        }else if(!isset($_POST['recherche_materiel_code_barre']) && !isset($_POST['rechercher_via_description']) && isset($_POST['recherche_materiel_nom'])){
            recherche_nom($_POST['recherche_materiel_nom']);
        }
    }catch(ErrorException $e){
        echo $e;
    }

?>