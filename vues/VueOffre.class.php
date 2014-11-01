<?php
/**
 * Created by Xiang Feng Han
 * User: fenix
 * Date: 14-10-24
 * Time: 23:12
 */

class VueOffre
{
    public static function afficherListeOffres($aOffres)
    {
        Vue::head('Liste des offres','Arts aux enchères - ');
        Vue::header();
        Vue::nav();

        echo "<h1>Historique des offres</h1>".
            "<a class='btn-default btn' href='index.php?page=detailEnchere'>retour</a>";
        echo "<table class='table'>";

        foreach($aOffres as $oOffre)
        {
//            print_r($oOffre->getBidder());
            echo "<tr><td>".$oOffre->getBidder()->getNom()."</td>".
                "<td>".$oOffre->getMontant()."</td>".
                "<td>".$oOffre->getDateOffre()."</td>".
                "</tr>";
        }
        echo "</table>";

        Vue::footer();
    }
}

?>