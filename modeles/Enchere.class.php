<?php
/**
* Created by Xiang Feng Han.
* User: fenix
* Date: 14-10-20
* Time: 12:28
*/

class Enchere
{
    private $idEnchere;
    private $nomEnchere;
    private $prixDebut;
    private $montantAugment;
    private $prixAcheterMaintenant;
    private $dateDebut;
    private $aColletionOffres;
    private $oCreateurEnchere;
    private $oProduit;

    public function  __construct($idEnchere=0, $nomEnchere, $prixDebut, $montantAugment, $prixAcheterMaintenant, $dateDebut, $oCreateur, $oProduit, $oOffre)
    {
        $this->setIdEnchere($idEnchere);
        $this->setNomEnchere($nomEnchere);
        $this->setPrixDebut($prixDebut);
        $this->setMontantAugment($montantAugment);
        $this->setPrixAcheterMaintenant($prixAcheterMaintenant);
        $this->setDateDebut($dateDebut);
        $this->setCreateurEnchere($oCreateur);
        $this->setProduitEnchere($oProduit);
        $this->setColletionOffre($oOffre);
    }

    public function setIdEnchere($idEnchere)
    {
        $this->idEnchere = $idEnchere;
    }

    public function setNomEnchere($nomEnchere)
    {
        $this->nomEnchere = $nomEnchere;
    }

    public function setPrixDebut($prixDebut)
    {
        $this->prixDebut = $prixDebut;
    }

    public function setMontantAugment($montantAugment)
    {
        $this->montantAugment = $montantAugment;
    }

    public function setPrixAcheterMaintenant($prixAcheterMaintenant)
    {
        $this->prixAcheterMaintenant = $prixAcheterMaintenant;
    }

    public function setDateDebut($date)
    {
        $this->dateDebut = $date;
    }

    public function setColletionOffre(Offre $oOffre)
    {
        $this->aColletionOffres[] = $oOffre;
    }

    public function setCreateurEnchere(Utilisateur $oUtilisateur)
    {
        $this->oCreateurEnchere = $oUtilisateur;
    }

    public function setProduitEnchere(Produit $oProduit)
    {
        $this->oProduit = $oProduit;
    }

    /*********/

    public function getIdEnchere()
    {
        return htmlentities($this->idEnchere);
    }

    public function getNomEnchere()
    {
        return htmlentities($this->nomEnchere);
    }

    public function getPrixDebut()
    {
        return htmlentities($this->prixDebut);
    }

    public function getMontantAugment()
    {
        return htmlentities($this->montantAugment);
    }

    public function getPrixAcheterMaintenant()
    {
        return htmlentities($this->prixAcheterMaintenant);
    }

    public function getDateDebut()
    {
        return htmlentities($this->dateDebut);
    }

    public function getCollectionOffre()
    {
        return $this->aColletionOffres;
    }

    public function getCreateurEnchere()
    {
        return $this->oCreateurEnchere;
    }

    public function getProduitEnchere()
    {
        return $this->oProduit;
    }

    /**
     * rechercher une enchere
     * @return array encheres
     */
    public function rechercherUneEnchere()
    {
        //connecter a la BD

        //realiser la requete de rehcercher par idEnchere
        $sRequete = "SELECT * FROM encheres WHERE idProduit=".$this->getProduitEnchere()->getIdProduit().";";

        //
        return $aEncheres;
    }

    public function creerUneEnchere()
    {
        //connecter a la BD

        //realiser la requete d'ajouter
        $sRequete = "INSERT INTO encheres SET"
    }
}


?> 