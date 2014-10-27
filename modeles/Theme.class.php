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
		// public function rechercherNomTheme(){
		// //Connecter à la base de données
		// $oConnexion = new MySqliLib();
		// //Réaliser la requête de recherche par le idProduit
		// $sRequete = "SELECT NomTheme FROM themes LEFT JOIN oeuvres
                 // ON (oeuvres.idTheme= themes.idTheme)";
		// $bRechercher = false;


		// //Exécuter la requête
		// $oResult = $oConnexion->executer($sRequete);
		// //Récupérer le tableau des enregistrements s'il existe
		// $aThemes = $oConnexion->recupererTableau($oResult);

		// echo "<br/>";
		// //var_dump($aThemes);

		// if(empty($aThemes)!= true)
		// {
		// /*	for($iEnreg=0; $iEnreg<count($aThemes);$iEnreg++)*/
			// //{
			// //Affecter les propriétés de l'objet en cours avec les valeurs
			// /*$this->setIdTheme($aThemes[0]['idTheme']);*/


			// $this->setNomTheme($aThemes[1]['NomTheme']);
			// //echo $aThemes[$iEnreg]['NomTheme'];
			// $bRechercher=true;
			// //}
		// }
			// return $bRechercher;
	 // }//fin de la fonction rechercherDesOeuvresParMotCle()




// public function rechercherUnThemeParIdOeuvre(){
		// //Connecter à la base de données
		// $oConnexion = new MySqliLib();
		// //Réaliser la requête de recherche par le idProduit
		// $sRequete = "SELECT * FROM medias WHERE idProduit = ".$this->iProduit;

		// $bRechercher = false;
		// //Exécuter la requête
		// $oResult = $oConnexion->executer($sRequete);

		// //Récupérer le tableau des enregistrements s'il existe
		// $aMedias = $oConnexion->recupererTableau($oResult);
		// if(empty($aMedias[0]) != true){
			// //Affecter les propriétés de l'objet en cours avec les valeurs
			// $this->setNoMedia($aMedias[0]['idMedia']);
			// $this->setUrlMedia($aMedias[0]['sUrlMedia']);
			// $this->setNoProduit($aMedias[0]['idProduit']);
			// $bRechercher=true;
		// }
		// return $bRechercher;
	// }//fin de la fonction rechercherUnMediaParNoProduit()
}