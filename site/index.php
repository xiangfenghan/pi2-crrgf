<?php
	// Déclaration de constantes pour facilite l'acces aux chemins
	define('DS', '/'); // Le séparateur de dossier
	define('SITE', dirname($_SERVER['SCRIPT_NAME'])); // La base du site
	define('RACINE', dirname(SITE)); // La racine
	define('SYSTEME', RACINE.DS."systeme");

	require_once '../systeme/includes.php';
	ControleurSite::gererSite();

 ?>