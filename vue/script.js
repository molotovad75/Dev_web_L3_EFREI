// var menus_transpose=document.querySelectorAll("header");

// function age_adrien(){
//     let annee=1999;
//     let mois=7;
//     let jour=2;
//     let age;
//     var date=new Date(); //Création de l'objet date
//     if((date.getDay()<=jour || date.getDay()>=jour) && date.getMonth()<mois){ // Si c'est complètement inférieur au 2 juillet (le mois va de Janvier à Juin inclus)
//         age=date.getFullYear()-annee-1;
//     }else if(date.getDay()>=jour && date.getMonth()>=mois){
//         age=date.getFullYear()-annee;
//     }else if(date.getDay()<jour && date.getMonth()==mois){
//         age=date.getFullYear()-annee-1;
//     }
//     document.getElementById("age").innerText=age;
//     return age;
// }



// // const age=new String(age_adrien());

// // function deroulement(i){
// //     let derouleur=document.getElementById("derouleur");
// //     let classe=document.getElementsByClassName("number");
// //     // classe.innerHTML="un";

// //     if(classe.innerHTML=="number" && (i==1 || i=="")){
// //         document.getElementById("ins_conn").style="display: block";
// //         i=2;
// //         classe.innerHTML="number"+i;

// //     }else if(classe.innerHTML=="number"+i && i==2){
// //         document.getElementById("ins_conn").style="display: none";
// //         i=1;
// //         classe.innerHTML="number"+i;
// //     }
// // }

// // let i;


// function deroulement(i,etat){
//     // let derouleur=document.getElementById("derouleur");
//     // let classe=document.getElementsByClassName("number");
//     // true pour dérouler et false pour non dérouler

//     if(i==1 && etat==false){
//         document.getElementById("ins_conn").style="display: block";
//         // i=2;
//         // etat=true;

//     }else if(i==2 && etat==true){
//         document.getElementById("ins_conn").style="display: none";
//         // i=1;
//         // etat=false;
//     }
// }


var code_barre=[];
function generationchiffre(max){//13 chiffres dans un code barre
    
    let i=0;
    for(i=0;i<13;i++){
        code_barre.push(Math.floor(Math.random()*max));
    }
    if(document.getElementById("codebarre").innerHTML==""){
        document.getElementById("codebarre").innerHTML=code_barre;
    }else{
        document.getElementById("codebarre").innerHTML="";
        code_barre=[];
        generationchiffre(max);
    }
    return code_barre;
}



function exec_une_fois(nb_exec, nom_class){
    let i="menu";
    nom_class.className=i;
}



function menu_responsive(num) {
    
    var x = document.getElementById("menu");
    if(num==0){
        exec_une_fois(num,x);
    }
    
    if (x.className === "menu") {
      x.className += " responsive";
      alert("Ca  marche");
    } else {
      x.className = "menu";
    }
}

function age(){
    let age_=0;
    var now=new Date();
    let annee=now.getFullYear()-1999;

    if(now.getMonth()<7 || (now.getDay()<2 && now.getMonth()==7) ){
        age_=annee-1;
    }else if(now.getMonth()>=7 || (now.getDay()>=2 && now.getMonth()==7)){
        age_=annee;
    }
    return age_;
}
document.getElementById("age").innerText=age();