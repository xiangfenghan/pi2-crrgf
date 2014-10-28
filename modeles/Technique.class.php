﻿<?php

class Technique{

	private $idTechnique;
	private $sNomTechnique;

public function __construct($idTechnique=0, $sNomTechnique=" ")
{
	$this->setIdTechnique($idTechnique);
	$this->setNomTechnique($sNomTechnique);
}

/**************LES SET******************/
	public function setIdTechnique($idTechnique)
	{
		TypeException::estNumerique($idTechnique);
		$this->idTechnique = $idTechnique;
	}//fin de la fonction setIdTechnique()


	public function setNomTechnique($sNomTechnique)
	{
		TypeException::estVide($sNomTechnique);
		TypeException::estString($sNomTechnique);
		$this->sNomTechnique= $sNomTechnique;
	}//fin de la fonction setNomTechnique()


/**************LES GET******************/
	public function getIdTechnique()
	{
		return $this->idTechnique;
	}//fin de la fonction getIdTechnique()

	public function getNomTechnique()
	{
		return htmlentities($this->sNomTechnique);
	}//fin de la fonction getNomTechnique()

	public function rechercherNomTechniqueParSonId()
		{
		//Connecter à la base de données
		$oConnexion = new MySqliLib();
		//Réaliser la requête de recherche d'un nom de technique par son ID
		$sRequete = "SELECT nom FROM pi2_techniques WHERE id=".$this->idTechnique.";
		";
		//echo $sRequete;
		//Exécuter la requête
		$oResult = $oConnexion->executer($sRequete);
		//Récupérer le tableau des enregistrements s'il existe
		$aTechniques = $oConnexion->recupererTableau($oResult);
		//var_dump ($aTechniques);
		if(empty($aTechniques[0]) != true){
			//Affecter les propriétés de l'objet en cours avec les valeurs

			//$this->setIdTechnique($aTechniques[0]['idTechnique']);
			$this->setNomTechnique($aTechniques[0]['nom']);

			$bRechercherTechnique=true;
		}
		return $bRechercherTechnique;
	}//fin de la fonction rechercherNomTechniqueParSonId()

}