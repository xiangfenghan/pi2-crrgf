<?php

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


}