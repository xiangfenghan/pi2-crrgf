<link rel="stylesheet" href="../site/css/oeuvre.css">
<script src="../site/js/jquery-2.1.1.min.js"></script>
<script src="../site/js/oeuvre.js"></script>
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

	public static function afficherLesOeuvres($aOeuvres,$sMsg="&nbsp;"){

		// Inclu les morceaux de pages, dont les metas, l'entete, la navigation et le carousel
		Vue::head('Achetez des oeuvres d\'art', 'Site de vente d\'oeuvres d\'art en ligne');
		Vue::header('Ma recherche');
		Vue::nav();

		echo '<button id="grille" >Grille</button>
			<button  id="liste" >Liste</button>
		';
	/*	echo '<ul>
			<li><a href="index.php?page=mes-oeuvres&mode=grille" id="grille">Grille</a></li>
			<li><a href="index.php?page=mes-oeuvres&mode=liste" id="liste">Liste</a></li>
			</ul>';*/



		echo "<article id=\"aa\" class=\"col-md-12 affichage clearfix\">";


			echo "<section class=\"col-sm-6 col-md-3 \">";
				echo '

					<form action="index.php?page=mes-oeuvres&mode=grille" method="post">
							<fieldset>
								<legend>Rechercher des oeuvres</legend>

								<input type="text" name="txt" id="txt" value="">
								<input type="submit" name="cmd" value="Rechercher">
								<input type="reset" name="cmd" value="RAZ">
							</fieldset>
						</form>
					';

				echo '
					<select name="theme">
						<option>Classique</option>
						<option>Moderne</option>
						<option>Abstrait</option>
					</select>
				';

				echo '
					<select name="technique">
						<option>Acrylique</option>
						<option>Peinture à l\'huile</option>
					</select>
				';
			echo "</section>";

	/**
	 *
	 * @return void
	 * @param Oeuvre $oOeuvre
	 */
		echo "<section class=\"col-sm-6 col-md-9 \">";
		echo "<a href=\"index.php?page=mes-oeuvres\">Retour</a>";
		echo"<article class=\"row grille text-center\">";

		if($aOeuvres!=0)
		{
			foreach($aOeuvres As $oOeuvre){
				/***va chercher l'image de l'oeuvre***/

				echo"		<div class=\"thumbnail col-md-4\">
								<span class='apparent'>
								<img class=\"\" src=\"".$oOeuvre->getUrlOeuvre()."\" alt=\"Photos des tableaux\" >
								<h2>".$oOeuvre->getNomOeuvre()."</h2>
								<button>Enchérir</button>

								</span>

								<table class='cache text-center'>
									<tr>
										<td> Description: ".$oOeuvre->getDescriptionOeuvre()."</td>
										<td>
											<img class=\"\" src=\"".$oOeuvre->getUrlOeuvre()."\" alt=\"Photos des tableaux\" >
											<h2>".$oOeuvre->getNomOeuvre()."</h2>
											<button>Enchérir</button>
										</td>
										<td>
											Technique: ".$oOeuvre->getTechnique()."<br/>
											Theme: ".$oOeuvre->getTheme()."<br/>
											Dimension: ".$oOeuvre->getDimensionOeuvre()."pi <br/>
											Poids: ".$oOeuvre->getPoidsOeuvre()."lb
										</td>
									</tr>
								</table>
							</div>";

			}//fin du foreach

		}else
			{
				echo "<div class=\"col-md-12\">
				<p>".$sMsg."</p>
				</div>";
			}

		echo"</article>";
		echo "</section>";
		echo "</article>";


		Vue::footer();

	}//fin de la fonction afficherLesOeuvres()


	public static function afficherOeuvresParMotCle($sMsg="&nbsp;")
	{

	}
}