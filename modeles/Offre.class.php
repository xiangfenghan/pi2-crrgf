<?php
/**
* Created by Xiang Feng Han.
* User: fenix
* Date: 14-10-20
* Time: 12:46
*/

class Offre
{

    private $dateOffre;
    private $montant;
    private $oBidder;

    public function __construct($oBidder, $montant, $dateOffre)
    {
        $this->setBidder($oBidder);
        $this->setMontant($montant);
        $this->setDateOffre($dateOffre);
    }

    public function setDateOffre($dateOffre)
    {
        $this->dateOffre = $dateOffre;
    }

    public function setMontant($montant)
    {
        $this->montant = $montant;
    }

    public function setBidder(Utilisateur $oBidder)
    {
        $this->oBidder = $oBidder;
    }

    /**********/

    public function getDateOffre()
    {
        return htmlentities($this->dateOffre);
    }

    public function getMontant()
    {
        return htmlentities($this->montant);
    }

    public function getBidder()
    {
        return $this->oBidder;
    }

}



?> 