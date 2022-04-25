function age_adrien(){
    let annee=1999;
    let mois=7;
    let jour=2;
    let age=0;
    var date=new Date(); //Création de l'objet date
    if((date.getDay<=jour || date.getDay>=jour) && date.getMonth<mois){ // Si c'est complètement inférieur au 2 juillet (le mois va de Janvier à Juin inclus)
        age=date.getFullYear-annee-1;
    }else if(date.getDay>=jour &&date.getMonth>=mois){
        age=date.getFullYear-annee;
    }else if(date.getDay<jour && date.getMonth==mois){
        age=date.getFullYear-annee-1;
    }
    return age;
}
// window.onload=age_adrien();
document.getElementById("age").innerHTML=age_adrien();