<?php
/**
 * Created by Xiang Feng Han
 * User: fenix
 * Date: 14-10-23
 * Time: 21:15
 */

class Enchere extends XFHModeles
{
    private $idEnchere;
    private $nomEnchere;
    private $prixDebut;
    private $montantAugment;
    private $prixAcheterMaintenant;
    private $dateDebut;
    private $dateFin;
    private $aColletionOffres;
    private $aColletionCommentaires;
    private $oCreateurEnchere;
    private $oOeuvre;
    private $etat;
    private $prixFin;

    public function  __construct($idEnchere, $oCreateur=false, $oOeuvre=false, $nomEnchere=" ", $prixDebut=0, $montantAugment=0, $prixAcheterMaintenant=0, $dateDebut=" ", $dateFin=" ")
    {
        parent::__construct();

        if($idEnchere==0)
        {
            //Nouvelle enchère
            $this->setCreateurEnchere($oCreateur);
            $this->setOeuvreEnchere($oOeuvre);
            $this->setNomEnchere($nomEnchere);
            $this->setPrixDebut($prixDebut);
            $this->setMontantAugment($montantAugment);
            $this->setPrixAcheterMaintenant($prixAcheterMaintenant);
            $this->setDateDebut($dateDebut);
            $this->setDateFin($dateFin);
            $this->setCollectionOffre(array());
            $this->setCollectionCommentaire(array());
            $this->setPrixFin($prixDebut);

        }
        else
        {
            //Enchere existante
            $this->setIdEnchere($idEnchere);
            $this->chargerUneEnchereParIdEnchere();
        }

    }

    /**
     *
     */
    public function setIdEnchere($idEnchere)
    {
        TypeException::estNumerique($idEnchere);
        $this->idEnchere = $idEnchere;
    }

    public function setCreateurEnchere(Utilisateur $oUtilisateur)
    {
        TypeException::estObjet($oUtilisateur);
        $this->oCreateurEnchere = $oUtilisateur;
    }

    public function setOeuvreEnchere(Oeuvre $oOeuvre)
    {
        TypeException::estObjet($oOeuvre);
        $this->oOeuvre = $oOeuvre;
    }

    public function setNomEnchere($nomEnchere)
    {
        TypeException::estString($nomEnchere);
        $this->nomEnchere = $nomEnchere;
    }

    public function setPrixDebut($prixDebut)
    {
        $prixDebut = number_format($prixDebut,2);
        TypeException::estFloat($prixDebut);
        $this->prixDebut = $prixDebut;
    }

    public function setMontantAugment($montantAugment)
    {
        $montantAugment = number_format($montantAugment,2);
        TypeException::estFloat($montantAugment);
        $this->montantAugment = $montantAugment;
    }

    public function setPrixAcheterMaintenant($prixAcheterMaintenant)
    {
        $prixAcheterMaintenant = number_format($prixAcheterMaintenant,2);
        TypeException::estFloat($prixAcheterMaintenant);
        $this->prixAcheterMaintenant = $prixAcheterMaintenant;
    }

    public function setDateDebut($date)
    {
        $this->dateDebut = $date;
    }

    public function setDateFin($date)
    {
        $this->dateFin = $date;
    }

    public function getPrixFin()
    {
        return $this->prixFin;
    }

    public function setPrixFin($prix)
    {
        if($prix>=($this->getPrixFin()+$this->getMontantAugment()) || !$this->getPrixFin())
        {
            $this->prixFin = $prix;
        }
        else
        {
            return false;
        }
    }

    public function ajoutOffre(Offre $oOffre)
    {
        TypeException::estObjet($oOffre);
        $this->aColletionOffres[] = $oOffre;
    }

    public function setCollectionOffre($aCollectionOffre)
    {
        TypeException::estArray($aCollectionOffre);

        foreach($aCollectionOffre as $index=>$offre)
        {
            if(!get_class($offre)=='Offre')
            {
                unset($aCollectionOffre[$index]);
            }
        }

        $this->aColletionOffres = $aCollectionOffre;
    }

    public function ajoutCommentaire(Commentaire $oCommentaire)
    {
        TypeException::estObjet($oCommentaire);
        $this->aColletionCommentaires[] = $oCommentaire;
    }

    public function setCollectionCommentaire($aColletionCommentaire)
    {
        TypeException::estArray($aColletionCommentaire);

        foreach($aColletionCommentaire as $index=>$oCommentaire)
        {
            if(!get_class($oCommentaire)=='Commentaire')
            {
                unset($aColletionCommentaire[$index]);
            }
        }

        $this->aColletionCommentaires = $aColletionCommentaire;
    }

    public function setEtat($etat)
    {
        $this->etat = $etat;
    }


    /**
     *
     */
    public function getIdEnchere()
    {
        return htmlentities($this->idEnchere);
    }

    public function getCreateurEnchere()
    {
        return $this->oCreateurEnchere;
    }

    public function getOeuvreEnchere()
    {
        return $this->oOeuvre;
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

    public function getDateFin()
    {
        return htmlentities($this->dateFin);
    }

    public function getCollectionOffre()
    {
        return $this->aColletionOffres;
    }

    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * rechercher une enchere par id oeuvre
     * @return array encheres
     */
    public function rechercherUneEnchereParIdOeuvre()
    {
        //realiser la requete de rehcercher par idEnchere
        $sCondition = 'WHERE idOeuvre = ' . $this->getOeuvreEnchere()->getIdOeuvre() . ';';
        $aEncheres = $this->selectParCondition('Encheres',$sCondition);

        return $aEncheres;
    }

    /**
     * rechercher une enchere par id enchere
     */
    public function chargerUneEnchereParIdEnchere()
    {

        $condition = 'WHERE id=' . $this->getIdEnchere() . ';';
        $aEncheres = $this->selectParCondition('encheres', $condition);

        $aEnchere = $aEncheres[0];

        $oCreateur = new Utilisateur($aEnchere['Utilisateurs_id']);
        $oCreateur->rechercherUnUtilisateur();
        $oOeuvre = new Oeuvre($aEnchere['Oeuvres_id']);

        $this->setCreateurEnchere($oCreateur);
        $this->setDateFin($aEnchere['dateFin']);
        $this->setDateDebut($aEnchere['dateDebut']);
        $this->setMontantAugment($aEnchere['prixIncrement']);
        $this->setNomEnchere($aEnchere['titre']);
        $this->setOeuvreEnchere($oOeuvre);
        $this->setPrixAcheterMaintenant($aEnchere['prixDirecte']);
        $this->setPrixDebut($aEnchere['prixDebut']);
        $this->setEtat($aEnchere['etat']);
        $this->setPrixFin($aEnchere['prixFin']);

        $aOffres = $this->selectParCondition('offres', 'WHERE encheres_id=' . $this->getIdEnchere() . ' ORDER BY date ASC');

        $this->setCollectionOffre(array());

        if(is_array($aOffres) && count($aOffres)>0)
        {
            foreach($aOffres as $offre)
            {
                $oOffre = new Offre($offre["id"]);

                $this->ajoutOffre($oOffre);
            }
        }

    }

    /**
     * rechercher les encheres
     * @return array
     */
    public static function chargerLesEncheres()
    {
        $oModele = new Modeles();
        $aEncheres = $oModele->selectAllFrom("Encheres");
        return $aEncheres;
    }

    /**
     * creer une enchere
     * @return $this
     */
    public function creerUneEnchere()
    {
        $sRequete = "INSERT INTO Encheres ('titre', 'prixDebut', 'prixFin', 'montantAug', 'prixDirecte', 'dateDebut', 'dateFin', 'etat', 'utilisateur_id', 'oeuvre_id')
        VALUES ('".$_POST['titreEnchere']."', ".$_POST['prixDebut'].", ".$_POST['prixDebut'].", ".$_POST['prixAug'].", ".$_POST['prixDirecte'].", now(), now()+INTERVAL ".$_POST['duree']." DAY, 'ouverte', ".$this->oCreateurEnchere->getIdUtilisateur().", ".$this->oOeuvre->getId().");";
        $id = $this->insertInto($sRequete);
        if($id)
        {
            $this->setIdEnchere($id);
            return $this;
        }

    }

    /**
     * supprimer une enchere
     */
    public function supprimerUnEnchere()
    {
        $sRequete = "DELETE FROM Encheres WHERE id=".$this->getIdEnchere().";";
        $this->deleteFrom($sRequete);
    }

    /**
     * charger le temps restant
     * @return int
     */
    public function getTempsRestant()
    {
        $iTempsFin = strtotime($this->getDateFin());

        $iTempsRestant = $iTempsFin - time();

        return $iTempsRestant;

    }




}

?>