<?php
require_once("Theme.class.php");
require_once("Technique.class.php");
require_once("../libs/MySqliLib.class.php");
require_once("../libs/TypeException.class.php");
require_once("../libs/MySqliException.class.php");
class Oeuvre{

	private $idOeuvre;
	private $sNomOeuvre;
	private $sUrlOeuvre;
	private $sDescriptionOeuvre;
	private $sDimensionOeuvre;
	private $iPoidsOeuvre;
	private $sDateCreationOeuvre;
	private $sEtatOeuvre;

	/* Propriété traduisant la relation d'association entre Oeuvre et Theme,Oeuvre et Technique*/
	private $oTheme;
	private $oTechnique;

	public function __construct($idOeuvre = 0, $sNomOeuvre= " ", $sUrlOeuvre=" ",
	$sDescriptionOeuvre=" ",$sDimensionOeuvre=" ",$iPoidsOeuvre=0,$sDateCreationOeuvre=" ",$sEtatOeuvre="En cours", $sNomTheme=" ",$sNomTechnique=" ")
	{

		$this->setIdOeuvre($idOeuvre);
		$this->setNomOeuvre($sNomOeuvre);
		$this->setUrlOeuvre($sUrlOeuvre);
		$this->setDescriptionOeuvre($sDescriptionOeuvre);
		$this->setDimensionOeuvre($sDimensionOeuvre);
		$this->setPoidsOeuvre($iPoidsOeuvre);
		$this->setDateCreationOeuvre($sDateCreationOeuvre);
		$this->setEtatOeuvre($sEtatOeuvre);

		//Rechercher le theme associé à cet oeuvre
		$this->oTheme = new Theme();
		$this->oTheme->setNomTheme($sNomTheme);

		//Rechercher la technique associé à cet oeuvre
		$this->oTechnique = new Technique();
		$this->oTechnique->setNomTechnique($sNomTechnique);
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

	public function setDateCreationOeuvre($sDateCreationOeuvre)
	{
		TypeException::estVide($sDateCreationOeuvre);
		TypeException::estString($sDateCreationOeuvre);
		$this->sDateCreationOeuvre = $sDateCreationOeuvre;
	}//fin de la fonction setDateCreationOeuvre()

	public function setEtatOeuvre($sEtatOeuvre)
	{
		TypeException::estVide($sEtatOeuvre);
		TypeException::estString($sEtatOeuvre);

		$aEtatOeuvres = array("En cours", "Ferme");
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

	public function getDateCreationOeuvre()
	{
		return $this->sDateCreationOeuvre;
	}//fin de la fonction getDateCreationOeuvre()

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


	/***************LES METHODES*************************/

	/**
	 * Rechercher tous les oeuvres de la base de données
	 * @return array ce tableau contient des objets oeuvres
	 */
	 public static function rechercherListeDesOeuvres(){

	 	//Connexion à la base de données
	 	$oConnexion = new MySqliLib();
	 	//Requête de recherche de tous les oeuvres
	 	$sRequete = "
	 		SELECT idOeuvre,nomOeuvre,urlOeuvre,descriptionOeuvre,dimensionOeuvre,poidsOeuvre,dateCreationOeuvre,etatOeuvre,nomTechnique,nomTheme FROM oeuvres LEFT JOIN (techniques,themes)
            ON (techniques.idTechnique=oeuvres.idTechnique AND themes.idTheme=oeuvres.idTheme)
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

		$aOeuvres=array();

		for($iEnreg=0; $iEnreg<count($aEnreg);$iEnreg++)
		{
			//affecter un objet à un élément du tableau
			$aOeuvres[$iEnreg]=new Oeuvre($aEnreg[$iEnreg]['idOeuvre'],$aEnreg[$iEnreg]['nomOeuvre'],$aEnreg[$iEnreg]['urlOeuvre'],$aEnreg[$iEnreg]['descriptionOeuvre'],$aEnreg[$iEnreg]['dimensionOeuvre'],$aEnreg[$iEnreg]['poidsOeuvre'],$aEnreg[$iEnreg]['dateCreationOeuvre'],$aEnreg[$iEnreg]['etatOeuvre'],$aEnreg[$iEnreg]['nomTheme'],$aEnreg[$iEnreg]['nomTechnique']);
			/*echo "<pre>";
			var_dump ($aOeuvres);
			echo "</pre>";*/
		}
		//retourner le tableau d'objets
		return $aOeuvres;

	}//fin de la fonction rechercherListeDesOeuvres()

	/**
	 * Permet de rechercher des oeuvres à partir d'un mot clé
	 * @return boolean true si on trouve des oeuvres
	 * soit false s'il n'y a aucune oeuvre
	 */

	public static function rechercherDesOeuvresParMotCle($resultat){
		//Connecter à la base de données
		$oConnexion = new MySqliLib();
		//Réaliser la requête de recherche des oeuvres par mot clé

	$sRequete = "SELECT idOeuvre,nomOeuvre,urlOeuvre,descriptionOeuvre,dimensionOeuvre,poidsOeuvre,dateCreationOeuvre,etatOeuvre,nomTechnique,nomTheme FROM oeuvres LEFT JOIN (techniques,themes)ON (techniques.idTechnique=oeuvres.idTechnique AND themes.idTheme=oeuvres.idTheme)
	WHERE (nomOeuvre LIKE '%". $resultat.
					"%' OR descriptionOeuvre LIKE '%". $resultat.
					"%' OR nomTheme LIKE '%". $resultat.
					"%' OR nomTechnique LIKE '%". $resultat."%') AND etatOeuvre=\"En cours\";
	";


		//echo $sRequete;

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
				$aOeuvres[$iEnreg]=new Oeuvre($aEnreg[$iEnreg]['idOeuvre'],$aEnreg[$iEnreg]['nomOeuvre'],$aEnreg[$iEnreg]['urlOeuvre'],$aEnreg[$iEnreg]['descriptionOeuvre'],$aEnreg[$iEnreg]['dimensionOeuvre'],$aEnreg[$iEnreg]['poidsOeuvre'],$aEnreg[$iEnreg]['dateCreationOeuvre'],$aEnreg[$iEnreg]['etatOeuvre'],$aEnreg[$iEnreg]['nomTheme'],$aEnreg[$iEnreg]['nomTechnique']);

				$bRechercher=true;
			}
			//retourner le tableau d'objets
			return $aOeuvres;
		}
			return $bRechercher;
	 }//fin de la fonction rechercherDesOeuvresParMotCle()



	/**
	 * Permet de rechercher des oeuvres par NomTheme, NomTechnique, NomTon, Etat="En cours"
	 * @return boolean true si on trouve des oeuvres
	 * soit false s'il n'y a aucune oeuvre
	 */
/*	public function rechercherDesOeuvres()
	{
		//Connecter à la base de données
		$oConnexion = new MySqliLib();
		//Réaliser la requête de recherche des oeuvres par NomTheme, NomTechnique, NomTon, Etat="En cours"

		$sRequete = "SELECT * FROM oeuvres WHERE NomTheme=".$this->getNomTheme()."AND NomTechnique=".$this->getNomTechnique()."AND NomTon=".$this->getNomTon()."AND EtatOeuvre=\"En cours\"";

		//Exécuter la requête
		$oResult = $oConnexion->executer($sRequete);
		//Récupérer le tableau des enregistrements s'il existe
		$aEnreg = $oConnexion->recupererTableau($oResult);

		$aOeuvres=array();
		for($iEnreg=0; $iEnreg<count($aEnreg);$iEnreg++ )
		{
			//affecter un objet à un élément du tableau
			$aOeuvres[$iEnreg]=new Oeuvre($aEnreg[$iEnreg]['idOeuvre'],$aEnreg[$iEnreg]['NomOeuvre'],$aEnreg[$iEnreg]['URLOeuvre'],$aEnreg[$iEnreg]['DescriptionOeuvre'],$aEnreg[$iEnreg]['LargeurOeuvre'],$aEnreg[$iEnreg]['HauteurOeuvre'],$aEnreg[$iEnreg]['PoidsOeuvre'],$aEnreg[$iEnreg]['DateCreationOeuvre'],$aEnreg[$iEnreg]['EtatOeuvre']);
		}
		//retourner le tableau d'objets
		return $aOeuvres;
	}//fin de la fonction rechercherDesOeuvres() */



}


	?>