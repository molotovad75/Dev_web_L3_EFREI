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

var Erreur_saisie_statut=document.getElementsByName("#Erreur_saisie_statut");
var Erreur_saisie_nom=document.getElementsByName("#Erreur_saisie_nom");
var Erreur_saisie_prenom=document.getElementsByName("#Erreur_saisie_prenom");
var Erreur_saisie_mail=document.getElementsByName("#Erreur_saisie_mail");
var erreur_mdp_court=document.getElementsByName("#erreur_mdp_court");
var erreur_mdp_non_correspondant=document.getElementsByName("#erreur_mdp_non_correspondant");




// document.getElementById("signin").addEventListener("submit",function(e){
//     e.preventDefault();
//     requete(document.getElementById(""));
//     return false;
// });

//Utilisation de JQuery et de AJAX
function erreur_mail_inscription(){
    fetch("../controle/message_erreur.json");
    var xhr = new XMLHttpRequest();
    // $.ajax({
    //     type: "POST",
    //     url: "../controle/inscription.php",
    //     data: {
    //         action:"showData",
    //         contenu: mail_entre
    //     },
    //     dataType: "json",
    //     success: function (response) {
    //         // console.log(response);
    //         // document.getElementById("Erreur_saisie_mail").innerHTML=mail_entre
    //         $('#Erreur_saisie_mail').html(mail_entre);
    //         alert("Bien joué !")
    //     }
    // });

    xhr.onreadystatechange=function(){
        console.log(this);
        if(this.readyState == 4  && this.status==200){
            Erreur_saisie_mail.innerHTML="Addresse mail déjà utilisée !";

        }else if (this.readyState == 4 && this.status == 404) {
            alert('Error : 404');
        }
    };

    xhr.open("POST", "../controle/message_erreur.json", true);
	xhr.responseType = "text";
    xhr.send();
}

document.getElementById("signin").addEventListener("submit", function(e) {
	e.preventDefault();
 
	var valeurARecuperer = document.getElementById("adresse_mail_INS").value;
	console.log(valeurARecuperer);
	erreur_mail_inscription();
 
	return false;
});​

function erreur_no_status(message){
    document.getElementById("Erreur_saisie_status").innerHTML=message;
}

function no_password_match(message){
    document.getElementById("erreur_mdp_non_correspondant").innerHTML=message;
}

function mail_used(message){
    document.getElementById("Erreur_saisie_mail").innerHTML=message;
}

function message_fin_inscription(){
    $.ajax({
        method: "GET",
        url: "../controle/inscription.php",
        // data: { variable1: "truc", variable2: "bidule" }
        data: JSON.parse()
    }) .done(function( response ) {
        // en cas de succes de ton fichier php
         console.log(response);
    }) .fail(function(error) {
          //en cas de problème lors de l'appel de ton script php
          console.log(error);
    });
  }