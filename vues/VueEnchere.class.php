<?php
/**
 * Created by Xiang Feng Han
 * User: fenix
 * Date: 14-10-23
 * Time: 21:41
 */

class VueEnchere
{
    public static function afficherLesEnchere($aEncheres)
    {
        Vue::head('Liste des enchères','Arts aux enchères');
        Vue::header();
        Vue::nav();

        if(count($aEncheres)>0)
        {
            $i = 0;
            foreach($aEncheres as $oEnchere)
            {
                if($i==4)
                {
                    echo "</div><div class='row'>";
                    $i=0;
                }

                echo "<article class='col-md-3 col-sm-6'>";

                echo "<img src='".$oEnchere->getOeuvreEnchere()->getUrlOeuvre()."' class='img-responsive' alt='Responsive image'>";
                echo "<a href='index.php?page=detailsEnchere&idEnchere=" . $oEnchere->getIdEnchere() . "'><h1>".$oEnchere->getOeuvreEnchere()->getNom()."</h1></a>";
                echo "<p>".$oEnchere->getOeuvreEnchere()->getDescription()."</p>";
                echo "<span>".$oEnchere->getPrixDebut()."</span>";
                echo "<span>".$oEnchere->getPrixAcheterMaintenant()."</span>";
                echo "<article>";
                $i++;
            }
        }
        else
        {
            echo "<div class='container'>";
            echo "<span class='label label-danger'>Il n'y ai aucune enchere disponible en ce monment.</span>";
            echo "</div>";
        }


        Vue::footer();
    }

    public static function afficherListeEncheres($aEncheres)
    {
        Vue::head('Liste des enchères','Arts aux enchères');
        Vue::header();
        Vue::nav();

        echo "<div class='container'>";
        echo "<h1>Gestion des enchères</h1>".
             "<a class='btn-default btn' href='index.php?page=gestionEnchere&action=add'>Creer une enchere</a>";
        if(count($aEncheres)>0)
        {
            echo "<table class='table'>";

            foreach($aEncheres as $oEnchere)
            {
                echo "<tr><td>".$oEnchere->getNomEnchere()."</td>".
                    "<td><img src='".$oEnchere->getOeuvreEnchere()->getUrlOeuvre()."' class='img-responsive' alt='Responsive image' class='col-md-2'></td>".
                    "<td>".$oEnchere->getEtat()."</td>".
                    "<td><a href='index.php?page=gestionEnchere&action=mod&idEnchere=".$oEnchere->getIdEnchere()."'>Modifier</a></td>".
                    "<td><a href='index.php?page=gestionEnchere&action=sup&idEnchere=".$oEnchere->getIdEnchere()."'>Supprimer</a></td>".
                    "</tr>";
            }
            echo "</table></div>";
        }
        else
        {
            echo "<div class='container'>";
            echo "<span class='label label-danger'>Il n'y ai aucune enchere disponible en ce monment.</span>";
            echo "</div>";
        }


        Vue::footer();
    }


    public static function afficherUneEnchere($oEnchere)
    {

        Vue::head('Liste des enchères','Arts aux enchères - ', '', 'js/enchere.js');
        Vue::header();
        Vue::nav();

        echo "<article class='col-md-5 col-sm-6'>".
                "<img src='".$oEnchere->getOeuvreEnchere()->getUrlOeuvre()."' class='img-responsive' alt='Responsive image'>".
             "</article>";
        echo "<article class='col-md-7 col-sm-6'>".
             "<form action='#'><input type='hidden' id='idEnchere' value='".$oEnchere->getIdEnchere()."'>".
                "<h2>".$oEnchere->getOeuvreEnchere()->getNomOeuvre().$oEnchere->getOeuvreEnchere()->getDimensionOeuvre()."</h2>".
                "<div class='form-group'>".
                    "<label>Temps restant: </label>".
                    "<span class='tempRestant'>".$oEnchere->getTempsRestant()."</span></div>".
                "<div class='form-group'>".
                    "<label>Mise actuelle: </label>".
                    "<span class='miseActuelle' id='miseActuelle'></span></div>".
                "<div class='form-group'>".
                    "<a href='index.php?page=listeOffre'>Offres</a>".
                    "<span id='conseil'></span></div>".
                "<div class='form-group'>".
                    "<input type='text' name='prixFin' id='prixFin'>".
                    "<button id='btnOffre' onclick='AjoutOffre();'>Placer un offre</button></div>".
                "<div class='form-group'>".
                    "<span>".$oEnchere->getPrixAcheterMaintenant()."</span></div>".
                    "<button id='btnAcheter' onclick=\"document.location.href='index.php?page=PaiementMaintenant&idEnchere=".$oEnchere->getIdEnchere()."'\">Acheter maintenant</button></div>".
             "</form></article>";
        Vue::footer();
    }


    public static function formCreerEnchere($aoOeuvres)
    {
        Vue::head("","","enchere.css");
        Vue::header();
        Vue::nav();

        echo "<article class='col-md-5 col-sm-6'>".
                "<img>".
             "</article>";
        echo "<article class='col-md-7 col-sm-6>".
             "<form action='index.php?page=gestionEnchere&action=add' method='post' class='form-horizontal'>".
                "<div class='form-group'>".
                    "<label>Choisir un des votres oeuvres</label>".
                        "<select name='oeuvre'>";
                            foreach($aoOeuvres as $oOeuvre)
                            {
                                echo "<option value='".$oOeuvre->getIdOeuvre()."'>".$oOeuvre->getNomOeuvre()."</option>";
                            }
                    echo "</select></div>".
                    "<div class='form-group'><label>Titre de votre enchère</label>".
                        "<input type='text' name='titreEnchere'></div>".
                    "<div class='form-group'><label>Prix Enchère</label>".
                        "<input type='text' name='prixDebut'> \$CAD | Montant debut".
                        "<input type='text' name='prixAug'> \$CAD | Montant incrementation</div>".
                    "<div class='form-group'><label>Prix \"Acheter Maintenant\"</label>".
                        "<input type='text' name='prixDirecte'> \$CAD</div>".
                    "<div class='form-group'><label>Duree</label>".
                        "<select name='duree'>".
                            "<option value='3'>3 jours</option>".
                            "<option value='7'>7 jours</option>".
                            "<option value='10'>10 jours</option>".
                        "</select></div>".
                    "<div class='form-group'><label>Les condition d'utilisation</label>".
                        "<input type='checkbox' name='usageCondition'>J'accepte les conditions d'utilisation.</div>".
                        "<input type='submit' name='enregistrerEnchere' value='Enregistrer'>".
                "</form>".
                "</article>";

        Vue::footer();
    }

    public static function formModEnchere($oEnchere)
    {
        Vue::head("","","enchere.css");
        Vue::header();
        Vue::nav();

        echo "<article class='col-md-5 col-sm-6'>".
            "<img>".
            "</article>";
        echo "<article class='col-md-7 col-sm-6>".
            "<form action='index.php?page=gestionEnchere&action=mod' method='post' class='form-horizontal'>".
            "<div class='form-group'><label>Titre de votre enchère</label>".
            "<input type='text' name='titreEnchere' value='".$oEnchere->getNomEnchere()."'></div>".
            "<div class='form-group'><label>Prix Enchère</label>".
            "<input type='text' name='prixDebut' value='".$oEnchere->getPrixDebut()."'> \$CAD | Montant debut".
            "<input type='text' name='prixAug' value='".$oEnchere->getMontantAugment()."'> \$CAD | Montant incrementation</div>".
            "<div class='form-group'><label>Prix \"Acheter Maintenant\"</label>".
            "<input type='text' name='prixDirecte' value='".$oEnchere->getPrixAcheterMaintenant()."'> \$CAD</div>".
            "<div class='form-group'><label>Duree</label>".
            "<select name='duree'>".
            "<option value='3'>3 jours</option>".
            "<option value='7'>7 jours</option>".
            "<option value='10'>10 jours</option>".
            "</select></div>".
            "<div class='form-group'><label>Les condition d'utilisation</label>".
            "<input type='checkbox' name='usageCondition'>J'accepte les conditions d'utilisation.</div>".
            "<input type='submit' name='enregistrerEnchere' value='Enregistrer'>".
            "</form>".
            "</article>";

        Vue::footer();
    }


    public static function xmlAjaxDetailEnchere()
    {
        if(isset($_GET['idEnchere']))
        {
            $oEnchere = new Enchere($_GET['idEnchere']);

            if(strtotime($oEnchere->getDateFin())<=time())
            {
                $oEnchere->fermerEnchere();
            }



            header("Content-Type: application/xml; charset=utf-8");

            $xml = new DOMDocument("1.0", "utf-8");
            $root = $xml->createElement('detailsEnchere');

            $rootIdEnchere = $xml->createAttribute('id');
            $rootIdEnchere->value = $oEnchere->getIdEnchere();
            $root->appendChild($rootIdEnchere);

            $prixActuel = $xml->createElement('prixActuel', $oEnchere->getPrixFin());
            $root->appendChild($prixActuel);

            $prixIncremente = $xml->createElement('prixIncremente', $oEnchere->getPrixFin()+$oEnchere->getMontantAugment());
            $root->appendChild($prixIncremente);

            $statut = $xml->createElement('statut', $oEnchere->getEtat());
            $root->appendChild($statut);
            $xml->appendChild($root);

            echo $xml->saveXML();
        }
        else
        {
            exit();
        }
    }

    public static function xmlAjaxAjoutOffre()
    {
        if(isset($_GET['idEnchere']) && isset($_GET['montant']) && isset($_SESSION['idUtilisateur']))
        {
            $oEnchere = new Enchere($_GET['idEnchere']);
            $oUtilisateur = new Utilisateur($_SESSION['idUtilisateur']);
            $oOffre = new Offre($oUtilisateur, $_GET['montant'], date('Y-m-d H:i:s'));
            $oEnchere->ajoutOffre($oOffre);

            VueEnchere::xmlAjaxDetailEnchere();
        }
        else
        {
            exit();
        }
    }



    public static function admAfficherListeEncheres($aEncheres)
    {
        Vue::head('Liste des enchères','Arts aux enchères');
        Vue::header();
        Vue::nav();

        echo "<div class='container'>";
        echo "<h1>Gestion des enchères - Administration</h1>".
            "<a class='btn-default btn' href='index.php?page=gestionEnchere&action=add'>Creer une enchere</a>";
        if(count($aEncheres)>0)
        {
            echo "<table class='table'>";

            foreach($aEncheres as $oEnchere)
            {
                echo "<tr><td>".$oEnchere->getNomEnchere()."</td>".
                    "<td><img src='".$oEnchere->getOeuvreEnchere()->getUrlOeuvre()."' class='img-responsive' alt='Responsive image' class='col-md-2'></td>".
                    "<td>".$oEnchere->getEtat()."</td>".
                    "<td><a href='index.php?page=gestionEnchere&action=mod&idEnchere=".$oEnchere->getIdEnchere()."'>Modifier</a></td>".
                    "<td><a href='index.php?page=gestionEnchere&action=sup&idEnchere=".$oEnchere->getIdEnchere()."'>Supprimer</a></td>".
                    "</tr>";
            }
            echo "</table></div>";
        }
        else
        {
            echo "<div class='container'>";
            echo "<span class='label label-danger'>Il n'y ai aucune enchere disponible en ce monment.</span>";
            echo "</div>";
        }


        Vue::footer();
    }

}


?>