<?php
/**
 * @class Modeles Modeles.class.php "modeles/Modeles.class.php"
 * @version 0.0.1
 * @date 2014-10-17
 * @author Eric Revelle
 * @brief Modèles de base
 * @details Modele contenant les fonctions communes a tout les modeles de l'application
 */
class Modeles extends Connexion{

	// Messages d'erreurs
	const ERR_NO_DATA = "Aucune donnee n'a ete trouve";
	const ERR_REQUEST = "Erreur avec la requete";

	public function __construct(){

		parent::__construct();

	}

}