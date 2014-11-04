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

				case 'encheres':
					ControleurAdmin::adm_GererEncheres();
					break;

				case 'commentaires' :// Administrateur
					$this->gererAdmiCommentairs_contact();
					break;

				default:
					ControleurAdmin::gererErreurs();

			}

		} catch ( Exception $e ) {

			echo "<p class=\"alert alert-danger\">".$e->getMessage()."</p>";

		}

	}

	public static function gererAccueil(){

		echo "page accueil";

	}



	public function adm_GererEncheres()
	{
<<<<<<< HEAD
		$sSQL = "SELECT * FROM pi2_Encheres";
=======
		$sSQL = "SELECT * FROM pi2_encheres";
>>>>>>> Integration_beta3

		$requete = $this->oPDO->prepare($sSQL);

		$aResultats=array();

		if ( $requete->execute() )
		{

			if ( $requete->rowCount() )
			{

				$aResultats = $requete->fetchAll();

			}
			foreach($aResultats as $value)
			{
				$aEncheres[] = new Enchere($value['id']);
			}

			VueEnchere::admAfficherListeEncheres($aEncheres);
		}
		else
		{
			throw new Exception(ERR_REQUEST);
		}




	}

}