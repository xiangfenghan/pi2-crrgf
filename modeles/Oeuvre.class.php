<?php
require_once("Theme.class.php");
require_once("Technique.class.php");
require_once ("Utilisateur.class.php");
require_once("../libs/MySqliLib.class.php");
require_once("../libs/TypeException.class.php");
require_once("../libs/MySqliException.class.php");
class Oeuvre extends Modeles{

	private $idOeuvre;
	private $sNomOeuvre;
	private $sUrlOeuvre;
	private $sDescriptionOeuvre;
	private $sDimensionOeuvre;
	private $iPoidsOeuvre;
	private $sEtatOeuvre;

	/* Propriété traduisant la relation d'association entre Oeuvre et Theme,Oeuvre et Technique*/
	private $oTheme;
	private $oTechnique;
	private $oUtilisateur;

	public function __construct($idOeuvre = 0, $sNomOeuvre= " ", $sUrlOeuvre=" ",
	$sDescriptionOeuvre=" ",$sDimensionOeuvre=" ",$iPoidsOeuvre=0,$sEtatOeuvre="en enchere", $sNomTheme=" ",$sNomTechnique=" ",$sNomUtilisateur=" ")
	{

		$this->setIdOeuvre($idOeuvre);
		$this->setNomOeuvre($sNomOeuvre);
		$this->setUrlOeuvre($sUrlOeuvre);
		$this->setDescriptionOeuvre($sDescriptionOeuvre);
		$this->setDimensionOeuvre($sDimensionOeuvre);
		$this->setPoidsOeuvre($iPoidsOeuvre);
		$this->setEtatOeuvre($sEtatOeuvre);

		//Rechercher le theme associé à cet oeuvre
		$this->oTheme = new Theme();
		$this->oTheme->setNomTheme($sNomTheme);

		//Rechercher la technique associé à cet oeuvre
		$this->oTechnique = new Technique();
		$this->oTechnique->setNomTechnique($sNomTechnique);

		//Rechercher la technique associé à cet oeuvre
		$this->oUtilisateur = new Utilisateur();
		$this->oUtilisateur->setNom($sNomUtilisateur);
	}

	/**************LES SET******************/
	public function setIdOeuvre($idOeuvre)
	{
		TypeException::estNumerique($idOeuvre);
		$this->idOeuvre = $idOeuvre;
	}//fin de la fonction setIdOeuvre()


	public function setNomOeuvre($sNomOeuvre)
	{
		TypeException::estVide($sNomOeuvre);
		TypeException::estString($sNomOeuvre);
		$this->sNomOeuvre = $sNomOeuvre;
	}//fin de la fonction setNomOeuvre()

	public function setUrlOeuvre($sUrlOeuvre)
	{
		TypeException::estVide($sUrlOeuvre);
		TypeException::estString($sUrlOeuvre);
		$this->sUrlOeuvre = $sUrlOeuvre;
	}//fin de la fonction setUrlOeuvre()

	public function setDescriptionOeuvre($sDescriptionOeuvre)
	{
		TypeException::estVide($sDescriptionOeuvre);
		TypeException::estString($sDescriptionOeuvre);
		$this->sDescriptionOeuvre = $sDescriptionOeuvre;
	}//fin de la fonction setDescriptionOeuvre();

	public function setDimensionOeuvre($sDimensionOeuvre)
	{
		TypeException::estVide($sDimensionOeuvre);
		TypeException::estString($sDimensionOeuvre);
		$this->sDimensionOeuvre = $sDimensionOeuvre;
	}//fin de la fonction setLargeurOeuvre()


	public function setPoidsOeuvre($iPoidsOeuvre)
	{
		TypeException::estNumerique($iPoidsOeuvre);
		$this->iPoidsOeuvre = $iPoidsOeuvre;
	}//fin de la fonction setPoidsOeuvre()

	public function setEtatOeuvre($sEtatOeuvre)
	{
		TypeException::estVide($sEtatOeuvre);
		TypeException::estString($sEtatOeuvre);

		$aEtatOeuvres = array("disponible", "en enchere", "vendue","supprimé");
		if (in_array($sEtatOeuvre, $aEtatOeuvres) == false) {
			throw new TypeException(get_class($this)." :: Le paramètre n'est pas une catégorie acceptable - ".$sEtatOeuvre);
		}
		$this->sEtatOeuvre = $sEtatOeuvre;
	} //fin de la fonction setEtatOeuvre()

	public function setTheme(Theme $oTheme)
	{
		$this->oTheme = $oTheme;
	}//fin de la fonction setTheme()

	public function setTechnique(Technique $oTechnique)
	{
		$this->oTechnique = $oTechnique;
	}//fin de la fonction setTechnique()

	public function setUtilisateur(Utilisateur $oUtilisateur)
	{
		$this->oUtilisateur = $oUtilisateur;
	}//fin de la fonction setUtilisateur()

	/**************LES GET******************/
	public function getIdOeuvre()
	{
		return $this->idOeuvre;
	}//fin de la fonction getIdOeuvre()

	public function getNomOeuvre()
	{
		return htmlentities($this->sNomOeuvre);
	}//fin de la fonction getNomOeuvre()

	public function getUrlOeuvre()
	{
		return htmlentities($this->sUrlOeuvre);
	}//fin de la fonction getUrlOeuvre()

	public function getDescriptionOeuvre()
	{
		return htmlentities($this->sDescriptionOeuvre);
	}//fin de la fonction getDescriptionOeuvre()

	public function getDimensionOeuvre()
	{
		return htmlentities($this->sDimensionOeuvre);
	}//fin de la fonction getLargeurOeuvre()


	public function getPoidsOeuvre()
	{
		return $this->iPoidsOeuvre;
	}//fin de la fonction getPoidsOeuvre()

	public function getEtatOeuvre()
	{
		return htmlentities($this->sEtatOeuvre);
	}//fin de la fonction getEtatOeuvre()

	public function getTheme()
	{
		return  htmlentities ($this->oTheme->getNomTheme());
	}//fin de la fonction getTheme()

	public function getTechnique()
	{
		return  htmlentities ($this->oTechnique->getNomTechnique());
	}//fin de la fonction getTechnique()

	public function getUtilisateur()
	{
		return  htmlentities ($this->oUtilisateur->getNomUtilisateur());
	}//fin de la fonction getUtilisateur()

	/***************LES METHODES*************************/

	/**
	 * Rechercher tous les oeuvres de la base de données
	 * @return array ce tableau contient des objets oeuvres
	 */
	 public static function rechercherListeDesOeuvresEnVente(){

	 	//Connexion à la base de données
	 	$oConnexion = new MySqliLib();
	 	//Requête de recherche de tous les oeuvres
	 	$sRequete = "
	 		SELECT pi2_oeuvres.id,titre,description,dimension,poids,mediaUrl,etat,pi2_techniques.nom as techniqueNom,pi2_themes.nom as themeNom
			FROM pi2_oeuvres
			LEFT JOIN (pi2_techniques,pi2_themes) ON (pi2_techniques.id=pi2_oeuvres.technique_id AND pi2_themes.id=pi2_oeuvres.theme_id)
			WHERE etat='en enchere';
		";

		//echo $sRequete;
	 	//Exécuter la requête

	 	$oResult = $oConnexion->executer($sRequete);

		if($oResult)
		{
			echo "connexion reusssie";
		}else
			{
				echo "pas de connexion";
			}
		//Récupérer le tableau des enregistrements
	 	$aEnreg = $oConnexion->recupererTableau($oResult);
		/*echo "<pre>";
		var_dump ($aEnreg);
		echo "</pre>";*/
		$aOeuvres=array();

		for($iEnreg=0; $iEnreg<count($aEnreg);$iEnreg++)
		{
			//affecter un objet à un élément du tableau
			$aOeuvres[$iEnreg]=new Oeuvre($aEnreg[$iEnreg]['id'],$aEnreg[$iEnreg]['titre'],$aEnreg[$iEnreg]['mediaUrl'],
			$aEnreg[$iEnreg]['description'],$aEnreg[$iEnreg]['dimension'],$aEnreg[$iEnreg]['poids'],
			$aEnreg[$iEnreg]['etat'],$aEnreg[$iEnreg]['techniqueNom'],$aEnreg[$iEnreg]['themeNom']);
			/*echo "<pre>";
			var_dump ($aOeuvres);
			echo "</pre>";*/
		}
		//retourner le tableau d'objets
		return $aOeuvres;

	}//fin de la fonction rechercherListeDesOeuvres()

	/**
	 * Permet de rechercher des oeuvres à partir d'un mot clé
	 * @return boolean true si on trouve des oeuvres et @return un tableau des oeuvres
	 * soit false s'il n'y a aucune oeuvre
	 */

	public static function rechercherDesOeuvresParMotCle($resultat){
		//Connecter à la base de données
		$oConnexion = new MySqliLib();
		//Réaliser la requête de recherche des oeuvres par mot clé

		$sRequete = "SELECT pi2_oeuvres.id,titre,description,dimension,poids,mediaUrl,etat,pi2_techniques.nom as techniqueNom,pi2_Themes.nom as themeNom
					FROM pi2_Oeuvres
					LEFT JOIN (pi2_techniques,pi2_themes) ON (pi2_techniques.id=pi2_oeuvres.technique_id AND pi2_themes.id=pi2_oeuvres.theme_id)
					WHERE (titre LIKE '%". $resultat."%'
					OR description LIKE '%". $resultat."%'
					OR pi2_themes.nom LIKE '%". $resultat."%'
					OR pi2_techniques.nom LIKE '%". $resultat."%')
					AND etat=\"en enchere\";
		";


		echo $sRequete;

		$bRechercher = false;
		//Exécuter la requête
		$oResult = $oConnexion->executer($sRequete);

		//Récupérer le tableau des enregistrements s'il existe
		$aEnreg = $oConnexion->recupererTableau($oResult);

		$aOeuvres=array();

		if(empty($aEnreg)!= true)
		{
			for($iEnreg=0; $iEnreg<count($aEnreg);$iEnreg++ )
			{
				 //affecter un objet à un élément du tableau
				$aOeuvres[$iEnreg]=new Oeuvre($aEnreg[$iEnreg]['id'],$aEnreg[$iEnreg]['titre'],$aEnreg[$iEnreg]['mediaUrl'],$aEnreg[$iEnreg]['description'],
				$aEnreg[$iEnreg]['dimension'],$aEnreg[$iEnreg]['poids'],$aEnreg[$iEnreg]['etat'],$aEnreg[$iEnreg]['techniqueNom'],$aEnreg[$iEnreg]['themeNom']);

				$bRechercher=true;
			}
			//retourner le tableau d'objets
			return $aOeuvres;
		}
			return $bRechercher;
	 }//fin de la fonction rechercherDesOeuvresParMotCle()



	/**
	* Permet de rechercher des oeuvres par NomTheme ET NomTechnique (avec un Etat="En vente")
	* @retour un tableau des oeuvres
	*/
	public function rechercherParThemeTechnique($nomTheme,$nomTechnique)
	{
		//Connecter à la base de données
		$oConnexion = new MySqliLib();
		//Réaliser la requête de recherche des oeuvres par NomTheme ET NomTechnique, Etat="En vente"

		$sRequete = "SELECT pi2_oeuvres.id,titre,description,dimension,poids,mediaUrl,etat,pi2_techniques.nom as techniqueNom,pi2_Themes.nom as themeNom
					FROM pi2_Oeuvres
					LEFT JOIN (pi2_techniques,pi2_themes) ON (pi2_techniques.id=pi2_oeuvres.technique_id AND pi2_themes.id=pi2_oeuvres.theme_id) WHERE pi2_Themes.nom=\"".$nomTheme."\" AND pi2_techniques.nom=\"".$nomTechnique."\" AND etat=\"en enchere\";
		";

		//echo $sRequete;

		//Exécuter la requête
		$oResult = $oConnexion->executer($sRequete);
		//Récupérer le tableau des enregistrements s'il existe
		$aEnreg = $oConnexion->recupererTableau($oResult);

		$aOeuvres=array();
		for($iEnreg=0; $iEnreg<count($aEnreg);$iEnreg++ )
		{
			//affecter un objet à un élément du tableau
			$aOeuvres[$iEnreg]=new Oeuvre($aEnreg[$iEnreg]['id'],$aEnreg[$iEnreg]['titre'],$aEnreg[$iEnreg]['mediaUrl'],$aEnreg[$iEnreg]['description'],
			$aEnreg[$iEnreg]['dimension'],$aEnreg[$iEnreg]['poids'],$aEnreg[$iEnreg]['etat'],$aEnreg[$iEnreg]['techniqueNom'],$aEnreg[$iEnreg]['themeNom']);
		}
		//retourner le tableau d'objets
		return $aOeuvres;

	}

	 /**
	* Permet de rechercher des oeuvres si l'internaute choisi un des critères: NomTheme OU NomTechnique (avec un Etat="En vente")
	* @retour un tableau des oeuvres
	*/

	public function rechercherParCritere($critere,$categorie)
	{
		//Connecter à la base de données
		$oConnexion = new MySqliLib();
		//Réaliser la requête de recherche des oeuvres par NomTheme, NomTechnique, Etat="En cours"

		if ($categorie=='theme')
		{
		$sRequete = "SELECT pi2_oeuvres.id,titre,description,dimension,poids,mediaUrl,etat,pi2_techniques.nom as techniqueNom,pi2_Themes.nom as themeNom FROM pi2_Oeuvres
					LEFT JOIN (pi2_techniques,pi2_themes) ON (pi2_techniques.id=pi2_oeuvres.technique_id AND pi2_themes.id=pi2_oeuvres.theme_id) WHERE pi2_themes.nom=\"".$critere."\" AND etat=\"en enchere\";
		";
		} else

		$sRequete = "SELECT pi2_oeuvres.id,titre,description,dimension,poids,mediaUrl,etat,pi2_techniques.nom as techniqueNom,pi2_Themes.nom as themeNom FROM pi2_Oeuvres
					LEFT JOIN (pi2_techniques,pi2_themes) ON (pi2_techniques.id=pi2_oeuvres.technique_id AND pi2_themes.id=pi2_oeuvres.theme_id) WHERE pi2_techniques.nom=\"".$critere."\" AND etat=\"en enchere\";
		";
		//echo $sRequete;

		//Exécuter la requête
		$oResult = $oConnexion->executer($sRequete);
		//Récupérer le tableau des enregistrements s'il existe
		$aEnreg = $oConnexion->recupererTableau($oResult);

		$aOeuvres=array();
		for($iEnreg=0; $iEnreg<count($aEnreg);$iEnreg++ )
		{
			//affecter un objet à un élément du tableau
			$aOeuvres[$iEnreg]=new Oeuvre($aEnreg[$iEnreg]['id'],$aEnreg[$iEnreg]['titre'],$aEnreg[$iEnreg]['mediaUrl'],$aEnreg[$iEnreg]['description'],
			$aEnreg[$iEnreg]['dimension'],$aEnreg[$iEnreg]['poids'],$aEnreg[$iEnreg]['etat'],$aEnreg[$iEnreg]['techniqueNom'],
			$aEnreg[$iEnreg]['themeNom']);
		}
		//retourner le tableau d'objets
		return $aOeuvres;
	}

	public function rechercherOeuvreParId() {
		$oPDO = new Connexion();
	 	$sSQL = "SELECT * FROM pi2_Oeuvres WHERE id='".$this->getIdOeuvre()."';";
	 	$requete = $oPDO->oPDO->prepare($sSQL);
	 	$requete->execute();
	 	$res = $requete->fetchAll();
	 	if(count($res)>0)
	 	{
	 		$this->setNomOeuvre($res[0]['titre']);
	 		$this->setDescriptionOeuvre($res[0]['description']);
	 		$this->setDimensionOeuvre($res[0]['dimension']);
	 		$this->setUrlOeuvre($res[0]['mediaUrl']);
	 		$this->setEtatOeuvre($res[0]['etat']);
	 	}
	 	// die(var_dump($res));

	 }

}