<?php
/**
 * @class Conf Conf.class.php "systeme/Conf.class.php"
 * @version 0.0.1
 * @date 2014-10-17
 * @author Eric Revelle
 * @brief Configurations de l'application
 * @details Contient les différentes donnees de configurations de l'application
 */
class Conf {

	// Tableau contenant les configurations d'accès à la base de données
	static $aBaseDonnees = array(
		"defaut" => array(
			"hote"        => "localhost",
			"bd"          => "bd_pi2",
			"utilisateur" => "root",
			"motDePasse"  => "",
		),
		"canny" => array(
			"hote"        => "localhost",
			"bd"          => "e1195921",
			"utilisateur" => "e1195921",
			"motDePasse"  => "aaa",
		),
		"feng" => array(
			"hote"        => "localhost",
			"bd"          => "code",
			"utilisateur" => "code",
			"motDePasse"  => "motdepasse",
		),
		"eskander" => array(
			"hote"        => "localhost",
			"bd"          => "code",
			"utilisateur" => "code",
			"motDePasse"  => "motdepasse",
		),
		"martin" => array(
			"hote"        => "localhost",
			"bd"          => "bd_artsencheres",
			"utilisateur" => "root",
			"motDePasse"  => "",
		)
	);

}