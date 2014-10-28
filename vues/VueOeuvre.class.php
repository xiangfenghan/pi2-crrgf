<!--<script src="../site/js/vendor/jquery-1.11.0.min.js"></script>-->
<?php
/**
 * @classe VueAccueil VueAccueil.class.php "classes/VueAccueil.class.php"
 * @version 0.0.1
 * @date 2014-10-18
 * @author Eric Revelle
 * @brief Affiche le contenue de la page d'accueil.
 * @details Permet d'afficher le contenu de la page d'accueil.
 */
class VueOeuvre {

	public static function afficherLesOeuvres($aOeuvres, array $aMsg = array()){

		// Inclu les morceaux de pages, dont les metas, l'entete, la navigation et le carousel
		Vue::head('Achetez des oeuvres d\'art', 'Site de vente d\'oeuvres d\'art en ligne','oeuvre.css');
		Vue::header('Ma recherche');
		Vue::nav();

		echo '<button id="grille" >Grille</button>
			<button  id="liste" >Liste</button>
		';

		echo "<article id=\"aa\" class=\"col-md-12 affichage clearfix\">";
			echo "<section class=\"col-sm-6 col-md-3 \">";
				echo '

					<form action="index.php?page=oeuvres-encheres&mode=grille" method="POST">
							<fieldset>
								<legend>Rechercher des oeuvres</legend>

								<input type="text" name="txt" id="txt" value="">
								<input type="submit" name="cmd" value="Rechercher">
								<input type="reset" name="cmd" value="RAZ">
							</fieldset>
						</form>
					';

				echo '<br/>';

				echo '<h2>Theme</h2>';
				echo '	<form action="index.php?page=oeuvres-encheres&mode=grille" method="POST">';

				echo '
							<input type="radio" name="theme" value="1">classique<br/>
							<input type="radio" name="theme" value="2">moderne<br/>
							<input type="radio" name="theme" value="3">abstrait<br/>
							<input type="radio" name="theme" value="4">mixte<br/>';
				echo '<br/>';

				echo '<h2>Technique</h2>';

				echo'		<input type="radio" name="technique" value="1">acrylique<br/>
							<input type="radio" name="technique" value="2">peinture a l\'huile<br/>
							<input type="radio" name="technique" value="3">gouache<br/>
							<input type="radio" name="technique" value="4">aquarelle<br/>
							<input type="radio" name="technique" value="5">mixte<br/>';

				echo '<br/>';

				echo'		<input type="submit" name="rech" value="Rechercher">

						</form>';

			echo "</section>";

	/**
	 *
	 * @return void
	 * @param Oeuvre $oOeuvre
	 */
		echo "<section class=\"col-sm-6 col-md-9 \">";
		echo "<a href=\"index.php?page=oeuvres-encheres\">Retour</a>";
		echo"<article class=\"row grille text-center\">";

		if($aOeuvres!=0)
		{
			foreach($aOeuvres As $oOeuvre){
				/***va chercher l'image de l'oeuvre***/

				echo"		<div class=\"thumbnail col-md-4\">
								<span class='apparent'>
								<img class=\"\" src=\"".$oOeuvre->getUrlOeuvre()."\" alt=\"Photos des tableaux\" >
								<h2>".$oOeuvre->getNomOeuvre()."</h2>
								<a href=\"index.php?page=detailsEnchere&idOeuvre=".$oOeuvre->getIdOeuvre()."\"><button>Enchérir</button></a>

								</span>

								<table class='cache text-center'>
									<tr>
										<td> Description: ".$oOeuvre->getDescriptionOeuvre()."</td>
										<td>
											<img class=\"\" src=\"".$oOeuvre->getUrlOeuvre()."\" alt=\"Photos des tableaux\" >
											<h2>".$oOeuvre->getNomOeuvre()."</h2>
											<a href=\"index.php?page=detailsEnchere&idOeuvre=".$oOeuvre->getIdOeuvre()."\"><button>Enchérir</button></a>
										</td>
										<td>
											Technique: ".$oOeuvre->getTechnique()."<br/>
											Theme: ".$oOeuvre->getTheme()."<br/>
											Dimension: ".$oOeuvre->getDimensionOeuvre()."po <br/>
											Poids: ".$oOeuvre->getPoidsOeuvre()."lb

										</td>
									</tr>
								</table>
							</div>";

			}//fin du foreach


		}else
			{
				echo "<div class=\"col-md-12\">
				<div class=\"alert alert-".$aMsg['type']." alert-dismissible\">
					<p>".$aMsg['msg']."</p>
				</div>
				</div>";
			}

		echo"</article>";
		echo "</section>";
		echo "</article>";


		Vue::footer('js/oeuvre.js');

	}//fin de la fonction afficherLesOeuvres()


	public static function afficherOeuvresParMotCle($sMsg="&nbsp;")
	{

	}
}