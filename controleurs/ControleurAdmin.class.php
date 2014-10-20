<?php
/**
 * @class ControleurAdmin ControleurAdmin.class.php "controleurs/ControleurAdmin.class.php"
 * @version 0.0.1
 * @date 2014-10-17
 * @author Eric Revelle
 * @brief Controleur de la section administrateur
 * @details Gere et controle la section d'aministration du site
 */
class ControleurAdmin extends Controleur{

	public function __construct(){

		self::gererSite();

	}

	public static function gererSite(){

		try{

			if ( !isset($_GET['page']) ) {

				$_GET['page'] = 'accueil';

			}

			switch ( $_GET['page'] ) {

				case 'accueil':
					self::gererAccueil();
					break;

				default:
					$this->gererErreurs();

			}

		} catch ( Exception $e ) {

			echo "<p class=\"alert alert-danger\">".$e->getMessage()."</p>";

		}

	}

	public static function gererAccueil(){

		echo "page accueil";

	}

}