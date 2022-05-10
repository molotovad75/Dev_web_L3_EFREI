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
