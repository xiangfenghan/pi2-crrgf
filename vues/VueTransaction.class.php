<?php
/**
 * @classe VueTransactionRecu VueTransactionRecu.class.php "classes/VueTransactionRecu.class.php"
 * @version 0.0.1
 * @date 2014-10-18
 * @author Eric Revelle
 * @brief Affiche le message concernant la transaction.
 * @details Permet d'afficher un message de succèss concernant la transaction.
 */
class VueTransaction {

	/**
	 * Affiche le contenu de la page d'accueil du site côté clients
	 */
	public static function afficherSuccess(array $aMsg = array()) {

		// Inclu les morceaux de pages, dont les metas, l'entete, la navigation et le carousel
		Vue::head('Transaction effectué avec succès', 'Site de vente d\'oeuvres d\'art en ligne');
		Vue::header();
		Vue::nav();

		// Si un message existe
		if ( count($aMsg) && isset($aMsg['msg']) ) {

			echo "
				<div class=\"alert alert-".$aMsg['type']." alert-dismissible\" role=\"alert\">
					<button type=\"button\" class=\"close\" data-dismiss=\"alert\">
						<span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Fermer</span>
					</button>
					<p>".$aMsg['msg']."</p>
				</div>";

		}

		echo "
			<article class=\"contenu-principal col-md-10 col-md-offset-1\">
				<section class=\"row\">
					<article class=\"col-md-10 col-md-offset-1\">
						<header>
							<h1 class=\"text-center\">Félicitation !</h1>
							<p class=\"text-center\">La transaction c'est effectué avec succès.</p>
						</header>
						<p>Nous vous remercions pour votre paiement. Votre transaction est terminée et vous allez recevoir par courriel un reçu pour votre achat. Vous pouvez vous connecter à votre compte sur <a href=\"https://www.sandbox.paypal.com\" title=\"Connectez-vous à votre compte\"><img src=\"https://www.paypalobjects.com/webstatic/fr_CA/mktg/logo-image/pp_cc_mark_37x23.jpg\" width=\"auto\" height=\"24\" alt=\"Logo de Paypal\"></a> pour consulter les détails de cette transaction.</p>
					</article>
				</section>
			</article>
		";

		Vue::footer();

	}

	public static function afficherAnnule(array $aMsg = array()) {

		// Inclu les morceaux de pages, dont les metas, l'entete, la navigation et le carousel
		Vue::head('Transaction annulé', 'Site de vente d\'oeuvres d\'art en ligne');
		Vue::header();
		Vue::nav();

		// Si un message existe
		if ( count($aMsg) && isset($aMsg['msg']) ) {

			echo "
				<div class=\"alert alert-".$aMsg['type']." alert-dismissible\" role=\"alert\">
					<button type=\"button\" class=\"close\" data-dismiss=\"alert\">
						<span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Fermer</span>
					</button>
					<p>".$aMsg['msg']."</p>
				</div>";

		}

		echo "
			<article class=\"contenu-principal col-md-10 col-md-offset-1\">
				<section class=\"row\">
					<article class=\"col-md-10 col-md-offset-1\">
						<header>
							<h1 class=\"text-center\">Paiement Annulé!</h1>
							<p class=\"text-center\">La transaction a été annulé.</p>
						</header>
						<p>Si vous en êtes pas la cause, veuillez réessayer un peu plus tard ou bien communiquer avec nous.</p>
						<pre>"; var_dump($_POST); echo "</pre>
					</article>
				</section>
			</article>
		";

		Vue::footer();

	}

	public static function afficherProduit(array $aMsg = array()) {

		// Inclu les morceaux de pages, dont les metas, l'entete, la navigation et le carousel
		Vue::head('Produit', 'Site de vente d\'oeuvres d\'art en ligne');
		Vue::header();
		Vue::nav();

		// Si un message existe
		if ( count($aMsg) && isset($aMsg['msg']) ) {

			echo "
				<div class=\"alert alert-".$aMsg['type']." alert-dismissible\" role=\"alert\">
					<button type=\"button\" class=\"close\" data-dismiss=\"alert\">
						<span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Fermer</span>
					</button>
					<p>".$aMsg['msg']."</p>
				</div>";

		}

		echo "
			<article class=\"contenu-principal col-md-10 col-md-offset-1\">
				<section class=\"row\">
					<article class=\"col-md-10 col-md-offset-1\">
						<header>
							<h1 class=\"text-center\">Produit</h1>
							<p class=\"text-center\">Description du produit</p>
						</header>
						<p>Un produit qui vous convient.</p>
						<!-- <form action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\"> -->
						<form action=\"https://www.sandbox.paypal.com/cgi-bin/webscr\" method=\"post\">
							<input type=\"hidden\" name=\"cmd\" value=\"_xclick\"><!-- Achat instantané -->
							<input type=\"hidden\" name=\"charset\" value=\"utf-8\">
							<input type=\"hidden\" name=\"return\" value=\"http://e1195921.webdev.cmaisonneuve.qc.ca/session4/pi2/site/index.php?page=paiement&action=accepte\"><!-- Url de retour -->
							<input type=\"hidden\" name=\"cancel_return\" value=\"http://e1195921.webdev.cmaisonneuve.qc.ca/session4/pi2/site/index.php?page=paiement&action=annule\">
							<input type=\"hidden\" name=\"notify_url\" value=\"http://e1195921.webdev.cmaisonneuve.qc.ca/session4/pi2/site/paypal-ipn.php\"><!-- Url pour le traitement du IPN -->
							<!-- <input type=\"hidden\" name=\"business\" value=\"arts.aux.encheres@cmaisonneuve.qc.ca\"> -->
							<input type=\"hidden\" name=\"business\" value=\"E7NW5SXHXN9JS\"><!-- Idntifiant/courriel du vendeur -->
							<input type=\"hidden\" name=\"item_name\" value=\"Peinture abstraite\">
							<input type=\"hidden\" name=\"item_number\" value=\"P53FDFF436D\">
							<input type=\"hidden\" name=\"amount\" value=\"354.75\">
							<input type=\"hidden\" name=\"shipping\" value=\"32.46\"><!-- Prix du transport.. provient de la bdd -->
							<!-- <input type=\"hidden\" name=\"tax\" value=\"1.00\"> --> <!-- Calculée dans les paramètres de Paypal -->
							<!-- <input type=\"hidden\" name=\"quantity\" value=\"1\"> -->
							<!-- <input type=\"hidden\" name=\"no_note\" value=\"1\"> -->
							<input type=\"hidden\" name=\"currency_code\" value=\"CAD\"><!-- Devise du paiement -->
							<input type=\"hidden\" name=\"custom\" value=\"userId=1 productId=6\"><!-- Mes attributs personnalise -->

							<!-- Active le remplacement de l'adresse du client chez Paypal. -->
							<!-- <input type=\"hidden\" name=\"address_override\" value=\"1\"> -->
							<!-- Définit les nouvelles valeurs pour l'adresse du client chez Paypal. -->
							<!-- <input type=\"hidden\" name=\"first_name\" value=\"John\">
							<input type=\"hidden\" name=\"last_name\" value=\"Doe\">
							<input type=\"hidden\" name=\"address1\" value=\"345 Lark Ave\">
							<input type=\"hidden\" name=\"address2\" value=\"Apt 5\">
							<input type=\"hidden\" name=\"city\" value=\"San Jose\"> -->
							<input type=\"hidden\" name=\"state\" value=\"QC\">
							<input type=\"hidden\" name=\"zip\" value=\"H1M2G6\">
							<input type=\"hidden\" name=\"country\" value=\"CA\">
							<input type=\"hidden\" name=\"lc\" value=\"CA\">
							<!-- <input type=\"hidden\" name=\"night_phone_a\" value=\"514\">
							<input type=\"hidden\" name=\"night_phone_b\" value=\"555\">
							<input type=\"hidden\" name=\"night_phone_c\" value=\"1234\">
							<input type=\"hidden\" name=\"email\" value=\"john.smith@cmaisonneuve.qc.ca\"> -->
							<input type=\"image\" name=\"submit\" border=\"0\"
							src=\"https://www.paypalobjects.com/fr_FR/i/btn/x-click-but01.gif\"
							alt=\"PayPal - The safer, easier way to pay online\">
						</form>

						<!-- Liste des mode de paiements acceptés par Paypal -->
						<!-- PayPal Logo --><table border=\"0\" cellpadding=\"10\" cellspacing=\"0\" align=\"center\"><tbody><tr><td align=\"center\"></td></tr><tr><td align=\"center\"><a href=\"https://www.paypal.com/fr/webapps/mpp/paypal-popup\" title=\"PayPal Comment Ca Marche\" onclick=\"javascript:window.open('https://www.paypal.com/fr/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;\"><img src=\"https://www.paypalobjects.com/webstatic/mktg/logo-center/logo_paypal_moyens_paiement_fr.jpg\" border=\"0\" alt=\"PayPal Acceptance Mark\" /></a></td></tr></tbody></table><!-- PayPal Logo -->

						<!-- Paiement sécurisé par Paypal -->
						<!-- PayPal Logo --><table border=\"0\" cellpadding=\"10\" cellspacing=\"0\" align=\"center\"><tbody><tr><td align=\"center\"></td></tr><tr><td align=\"center\"><a href=\"https://www.paypal.com/fr/webapps/mpp/paypal-popup\" title=\"PayPal Comment Ca Marche\" onclick=\"javascript:window.open('https://www.paypal.com/fr/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;\"><img src=\"https://www.paypalobjects.com/webstatic/mktg/logo-center/logo_paypal_securise_fr.png\" border=\"0\" alt=\"Securise par PayPal\" /></a><div style=\"text-align:center\"><a href=\"https://www.paypal.com/fr/webapps/mpp/why\" target=\"_blank\"><font size=\"2\" face=\"Arial\" color=\"#0079CD\"><strong>PayPal Comment Ca Marche</strong></font></a></div></td></tr></tbody></table><!-- PayPal Logo -->
										</article>
									</section>
								</article>
		";

		Vue::footer();

	}

}