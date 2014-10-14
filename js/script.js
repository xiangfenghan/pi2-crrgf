/**
 * Created by fenix on 14-10-04.
 */

//Ajout d'event listeners au chargement de la page
window.addEventListener("load", function(){

    var timeLeft = document.getElementById("tempRestant");
    if(typeof timeLeft != "undefined" && timeLeft != null)
    {
        // Création du décompte pour la fin de l'enchère
        var currentTime = document.querySelector(".currentTime");

        setTimeout(function(){decompte(10)},1000);

        // Fonction à appeler à chaque seconde pour le décompte
        function decompte(secondesTotal)
        {
            if(secondesTotal>0)
            {
                var days = parseInt(secondesTotal/86400);
                var hours = parseInt((secondesTotal-days*86400)/3600);
                var minutes = parseInt((secondesTotal-hours*3600-days*86400)/60);
                var secondes = (secondesTotal-days*86400-hours*3600-minutes*60);
                timeLeft.innerHTML = days + " jours " + hours + " heures " + minutes + " minutes " + secondes + " secondes ";

                setTimeout(function(){decompte(secondesTotal-1)},1000);
            }
            else
            {
                timeLeft.innerHTML = "Cette enchère est déjà fermée!";
                var btnAcheMantenant = document.getElementById("acheterMantenant");
                var btnPlacerOffre = document.getElementById("placerOffre");
                btnAcheMantenant.setAttribute("hidden", "hidden");
                btnPlacerOffre.setAttribute("disabled", "disabled");
            }
        }
    }


    // Changement de l'image du produit au changement du SELECT à la création de l'enchère
    var creerEncherePicBox = document.getElementById("creerEncherePicBox");
    if(creerEncherePicBox!=null)
    {
        var optChoisi = document.getElementById("optChoisi");
        optChoisi.addEventListener("change", function(){
            creerEncherePicBox.innerHTML = "<img src='../images/peinture/"+ optChoisi.value +".JPG' alt='"+ optChoisi.value +".jpg'>";
        })
    }




});