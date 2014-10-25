<?php
/**
 * Created by Xiang Feng Han
 * User: fenix
 * Date: 14-10-23
 * Time: 21:36
 */

class Offre extends XFHModeles
{
    private $idOffre;
    private $dateOffre;
    private $montant;
    private $oBidder;

    public function __construct($idOffre, $oBidder=false, $montant=0, $dateOffre=" ")
    {
        parent::__construct();

        if($idOffre==0)
        {
            $this->setBidder($oBidder);
            $this->setMontant($montant);
            $this->setDateOffre($dateOffre);
        }
        else
        {
            $this->setIdOffre($idOffre);
            $this->rechercherOffreParId();
        }

    }

    public function setIdOffre($idOffre)
    {
        TypeException::estNumerique($idOffre);
        $this->idOffre = $idOffre;
    }

    public function setDateOffre($dateOffre)
    {
        $this->dateOffre = $dateOffre;
    }

    public function setMontant($montant)
    {
        TypeException::estNumerique($montant);
        $this->montant = $montant;
    }

    public function setBidder(Utilisateur $oBidder)
    {
        TypeException::estObjet($oBidder);
        $this->oBidder = $oBidder;
    }

    /**********/

    public function getIdOffre()
    {
        return htmlentities($this->idOffre);
    }

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


    public function rechercherOffreParId()
    {

        $sCondition = "WHERE id = " . $this->getIdOffre() . ';';
        $aOffres = $this->selectParCondition('Offres', $sCondition);

        $aOffre = $aOffres[0];

        $oBidder = new Utilisateur($aOffre['utilisateurs_id']);

        $this->setBidder($oBidder);
        $this->setDateOffre($aOffre['date']);
        $this->setMontant($aOffre['montant']);
    }


    public function creerUnOffre()
    {
        if($_SESSION['idUtilisateur']!==$this->getBidder()->getIdUtilisateur())
        {
            $oBidder = new Utilisateur($_SESSION['idUtilisateur']);
            $this->setBidder($oBidder);
            $sRequete = "INSERT INTO Offres ('montant', 'date', 'encheres_id', 'utilisateurs_id') VALUES (".$_GET['prixFin'].", now(), ".$_GET['idEnchere'].", ".$this->getBidder()->getIdUtilisateur().");";
            $idOffre = $this->insertInto($sRequete);
            $this->setIdOffre($idOffre);
            if($idOffre)
            {
                $oEnchere = new Enchere($_GET['idEnchere']);
                $oEnchere->ajoutOffre($this);
            }
        }
    }

    public static function chargerLesOffres()
    {
        $oModele = new Modeles();
        $aEnreg = $oModele->selectAllFrom('Offres');
        return $aEnreg;

    }

}


?>