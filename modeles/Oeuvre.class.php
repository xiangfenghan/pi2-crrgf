<?php
/**
 * Created by Xiang Feng Han
 * User: fenix
 * Date: 14-10-24
 * Time: 10:19
 */

class Oeuvre
{
    private $id;
    private $nomProduit;

    public function __construct($id=0, $nom=" ")
    {
        $this->setId($id);
        $this->setNom($nom);
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setNom($nom)
    {
        $this->nomProduit = $nom;
    }


    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nomProduit;
    }
}

?>