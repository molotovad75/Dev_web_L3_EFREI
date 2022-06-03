// var menus_transpose=document.querySelectorAll("header");

function age_adrien(){
    let annee=1999;
    let mois=7;
    let jour=2;
    let age;
    var date=new Date(); //Création de l'objet date
    if((date.getDay()<=jour || date.getDay()>=jour) && date.getMonth()<mois){ // Si c'est complètement inférieur au 2 juillet (le mois va de Janvier à Juin inclus)
        age=date.getFullYear()-annee-1;
    }else if(date.getDay()>=jour && date.getMonth()>=mois){
        age=date.getFullYear()-annee;
    }else if(date.getDay()<jour && date.getMonth()==mois){
        age=date.getFullYear()-annee-1;
    }
    
    return age;
}

document.getElementById("age").innerText=age_adrien();

// const age=new String(age_adrien());

// function deroulement(i){
//     let derouleur=document.getElementById("derouleur");
//     let classe=document.getElementsByClassName("number");
//     // classe.innerHTML="un";

//     if(classe.innerHTML=="number" && (i==1 || i=="")){
//         document.getElementById("ins_conn").style="display: block";
//         i=2;
//         classe.innerHTML="number"+i;

//     }else if(classe.innerHTML=="number"+i && i==2){
//         document.getElementById("ins_conn").style="display: none";
//         i=1;
//         classe.innerHTML="number"+i;
//     }
// }

// let i;


function deroulement(i,etat){
    // let derouleur=document.getElementById("derouleur");
    // let classe=document.getElementsByClassName("number");
    // true pour dérouler et false pour non dérouler

    if(i==1 && etat==false){
        document.getElementById("ins_conn").style="display: block";
        // i=2;
        // etat=true;

    }else if(i==2 && etat==true){
        document.getElementById("ins_conn").style="display: none";
        // i=1;
        // etat=false;
    }
}

function repeat_menu(){
   
    document.getElementById("menu_transp").innerHTML=menus_transpose;
    
}


//AJAX


// let field_mdp=document.getElementById("mdp_INS").value;
// let field_mdp_confirmer=document.getElementById("confirmer_mdp_INS").value;
// let xhr=new XMLHttpRequest();
// xhr.responseType="text";
// xhr.open("POST","../controle/inscription.html",true); 

/*
1er argument : méthode d'envoi de la requête, 
2ème argument : lien vers le fichier auquel je veux envoyer ma requête, 
3ème argument : Boolean indiquant si la requete doit être exécutée de manière asynchrone. Par défaut, elle reste à "true" !
*/

//Traitement de la réponse du serveur 

xhr.onload=
    function(){
        if (xhr.status==200) { //Si la requête au serveur réussi alors !
            fetch("./controle/inscription.html").then(response => response.json());
        } else {
            fetch("./controle/inscription.html").catch(error => alert("Erreur : " + error));
        }

    };




// function storing(data)
// {
//     var element = document.getElementById('storage');
//     element.innerHTML = data;
// }

// function submitForm(element)
// { 
//     var req =  createInstance();
//     var url = document.ajax.url.value;
//     var data = "url=" + url;
//     req.onreadystatechange = function()
//     { 
//         if(req.readyState == 4)
//         {
//                 if(req.status == 200)
//                 {
//                         storing(req.responseText);	
//                 }	
//                 else	
//                 {
//                         alert("Error: returned status code " + req.status + " " + req.statusText);
//                 }	
//         } 
//     }; 

//     req.open("POST", "pingurl.php", true); 
//     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//     req.send(data);
// }

const Erreur_saisie_statut=document.getElementsByName("#Erreur_saisie_statut");
const Erreur_saisie_nom=document.getElementsByName("#Erreur_saisie_nom");
const Erreur_saisie_prenom=document.getElementsByName("#Erreur_saisie_prenom");
const Erreur_saisie_mail=document.getElementsByName("#Erreur_saisie_mail");
const erreur_mdp_court=document.getElementsByName("#erreur_mdp_court");
const erreur_mdp_non_correspondant=document.getElementsByName("#erreur_mdp_non_correspondant");

//Utilisation de JQuery et de AJAX
// function traitement_mail_inscription(mail_entre){
//     $.ajax({
//         type: "POST",
//         url: "../controle/inscription.php",
//         data: {
//             action:"showData",
//             contenu: mail_entre
//         },
//         dataType: "json",
//         success: function (response) {
//             // console.log(response);
//             // document.getElementById("Erreur_saisie_mail").innerHTML=mail_entre
//             $('#Erreur_saisie_mail').html(mail_entre);
//             alert("Bien joué !")
//         }
//     });
// }