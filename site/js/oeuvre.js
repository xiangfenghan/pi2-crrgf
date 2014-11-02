"use strict";

$(document).ready(function()
{
	console.log("bonjour");
	/*****GESTION DE L'AFFICHAGE EN MODE GRILLE/LISTE*****/

	//Affichage en mode liste sur clic du bouton de navigation:liste
	$('#liste').click(function()
	{
	console.log("liste");
	//document.location="../index.php?page=mes-oeuvres&mode=liste";
		$('#aa').removeClass("grille liste").addClass("liste");//enlève la classe grille et ajoute la classe liste
		$('#aa article.row div').removeClass("col-md-4").addClass("col-md-12");
	});

	//Affichage en mode grille sur clic du bouton de navigation:grille
	$('#grille').click(function()
	{
	console.log("grille");
	//document.location="../index.php?page=mes-oeuvres&mode=grille";
		$('#aa').removeClass("liste grille").addClass("grille");//enlève la classe liste et ajoute la classe grille
		$('#aa article.row div').removeClass("col-md-12").addClass("col-md-4");
	});

 });