<?php
/**
 * Created by Xiang Feng Han
 * User: fenix
 * Date: 14-10-23
 * Time: 21:30
 */

class XFHModeles extends Modeles
{
    public function __construct()
    {
        parent::__construct();
    }


    public function selectParCondition($sNomTable, $sCondition)
    {
        $sSQL = "SELECT * FROM ".$sNomTable." ".$sCondition.";";

        $requete = $this->oPDO->prepare($sSQL);

        if($requete->execute())
        {
            if($requete->rowCount())
            {
                $aResultats = $requete->fetchAll();
                return $aResultats;
            }
        }
        else
        {
            throw new Exception("Erreur lors de la requete");
        }
    }

    public function executerRequete($sRequete)
    {
        $requete = $this->oPDO->prepare($sRequete);

        if($requete->execute())
        {
            return true;
        }
        else
        {
            throw new Exception("Erreur lors de la requete");
        }
    }


    public function insertInto($sRequete)
    {

        $idInsert = $this->executerRequete($sRequete);
        return $this->oPDO->lastInsertId();
    }

    public function deleteFrom($sRequete)
    {
       return $this->executerRequete($sRequete);
    }

    public function update($sRequete)
    {
        return $this->executerRequete($sRequete);
    }


}



?>