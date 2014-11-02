<?php
/**
 * @classe VueContact VueContact.class.php "classes/VueContact.class.php"
 * @version 0.0.1
 * @date 2014-10-25
 * @author Gader Eskander
 * @brief Affiche le contenue de la page de contact.
 * @details Permet d'afficher le contenu de la page de contact.
 */
class VueContact {

	public static function afficherContact(array $aMsg = array()) {

		// Inclu les morceaux de pages, dont les metas, l'entete, la navigation .
		Vue::head('Contactez-nous', 'Page de contact de site Arts aux enchères','commentaire.css');
		Vue::header('Ma recherche');
		Vue::nav();

		if ( count($aMsg) ){

			echo "<p>".$aMsg['msg']."</p>";

		}

		echo "
		<main  class=\"clearfix\">
			<article id=\"Contact\" >
				<article class=\"row\"  >
					<h1 class=\"text-center\">Laissez-nous un message</h1>
					<p class=\"text-center\">
						Pour nous contacter, utilisez ce formulaire en précisant l’objet de votre message
					</p>
					<article class=\"col-md-2 col-xs-1\"></article>
					<!-- Débue Formulaire-->
					<article class=\" col-xs-10 col-md-8 form\">
						<form action=\"index.php?page=".$_GET['page']."&action=ajouContact\" method=\"post\">
							<article class=\"form-group \">
								<label>Nom</label>
								<input type=\"text\" class=\"form-control\" name=\"txtNom\">

							</article>
							<article class=\"form-group \">
								<label>Prénom</label>
								<input type=\"text\" class=\"form-control\" name=\"txtPrenom\" >

							</article>

							<article class=\"form-group\">
								<label for=\"exampleInputEmail1\">Adresse e-mail</label>
								<article class=\"input-group\">
									<article class=\"input-group-addon\">
										@
									</article>
									<input class=\"form-control\" type=\"email\" name=\"txtEmail\" placeholder=\"email@yahoo.ca\">
								</article>
							</article>
							<article class=\"row form-group\">
								<article class=\"col-md-12\">
									<label >Message</label>
									<textarea class=\"form-control\" rows=\"5\"  name=\"textarea\"> </textarea>
								</article>
							</article>
							<input type=\"submit\" name=\"cmd\" value=\"Envoyer\">
						</form>
					</article>
					<!-- Fin Formulaire-->

					<article class=\"col-md-2 col-xs-1\"></article>
				</article>
			</article>
			 </main>
		";

		Vue::footer();

	}

}