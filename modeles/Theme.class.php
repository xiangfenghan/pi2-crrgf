<?php

class Theme{

	private $idTheme;
	private $sNomTheme;

public function __construct($idTheme=0, $sNomTheme=" ")
{
	$this->setIdTheme($idTheme);
	$this->setNomTheme($sNomTheme);
}

/**************LES SET******************/
	public function setIdTheme($idTheme)
	{
		TypeException::estNumerique($idTheme);
		$this->idTheme = $idTheme;
	}//fin de la fonction setIdTheme()


	public function setNomTheme($sNomTheme)
	{
		TypeException::estVide($sNomTheme);
		TypeException::estString($sNomTheme);
		$this->sNomTheme= $sNomTheme;
	}//fin de la fonction setNomTheme()


/**************LES GET******************/
	public function getIdTheme()
	{
		return $this->idTheme;
	}//fin de la fonction getIdTheme()

	public function getNomTheme()
	{
		return htmlentities($this->sNomTheme);
	}//fin de la fonction getNomTheme()

/*************LES MÉTHODES******************/

	public function rechercherNomThemeParSonId()
	{
		$bRechercherTheme = false;
		//Connecter à la base de données
		$oConnexion = new MySqliLib();
		//Réaliser la requête de recherche d'un nom de technique par son ID
		$sRequete = "SELECT nom FROM pi2_themes WHERE id=".$this->idTheme.";
		";
		//echo $sRequete;
		//Exécuter la requête
		$oResult = $oConnexion->executer($sRequete);
		//Récupérer le tableau des enregistrements s'il existe
		$aThemes = $oConnexion->recupererTableau($oResult);

		if(empty($aThemes[0]) != true){
			//Affecter les propriétés de l'objet en cours avec les valeurs

			//$this->setIdTheme($aThemes[0]['idTheme']);
			$this->setNomTheme($aThemes[0]['nom']);

			$bRechercherTheme=true;
		}
		return $bRechercherTheme;
	}//fin de la fonction rechercherNomThemeParSonId()
}