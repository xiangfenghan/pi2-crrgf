<?php
/**
 * @classe Vue Vue.class.php "classes/Vue.class.php"
 * @version 0.0.1
 * @date 2014-10-17
 * @author Eric Revelle
 * @brief Affiche les différentes parties communes aux pages.
 * @details Permet d'afficher les parties communes de toutes les pages
 * comme l'entete, le pied de page, la naviagtion et les asides.
 */
class Vue {

	public static function head($sTitre = "", $sDescription = "", $sNomStyle = "", $sLienScript = "") {

		echo "
			<!DOCTYPE html>
			<!--[if lt IE 7]><html class=\"no-js lt-ie9 lt-ie8 lt-ie7\"> <![endif]-->
			<!--[if IE 7]><html class=\"no-js lt-ie9 lt-ie8\"> <![endif]-->
			<!--[if IE 8]><html class=\"no-js lt-ie9\"> <![endif]-->
			<!--[if gt IE 8]><!-->
			<html class=\"no-js\">
			<!--<![endif]-->
			<head>
				<base href=\"".SITE.DS."\">
				<meta charset=\"utf-8\">
				<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
				<title>Informations - Étape 1 - Arts aux Enchères</title>
				<meta name=\"description\" content=\"\">
				<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
				<link rel=\"stylesheet\" href=\"css/bootstrap.css\">
				<link rel=\"stylesheet\" href=\"css/bootstrap-theme.css\">
				<link rel=\"stylesheet\" href=\"css/main.css\">
				<script src=\"js/vendor/modernizr-2.6.2-respond-1.1.0.min.js\"></script>
			</head>
			<body>
				<!--[if lt IE 7]>
				<p class=\"browsehappy\">La version de votre navigateur est <strong>désuète</strong>.
				Pour une expérience optimale, il est recommandé de le <a href=\"http://browsehappy.com/\">mettre à jour</a>.</p>
				<![endif]-->
		";

	}

	public static function header($sRecherche = "") {

		echo "
			<!-- Entete du document -->
			<header class=\"entete-document container-fluid\">
				<div class=\"container-fluid\">
					<section class=\"row\">
						<div class=\"col-sm-offset-1\">
							<div class=\"row\">
								<!-- Logo & menu burger -->
								<div class=\"col-sm-2 text-center\">
									<a href=\"index.html\"><img src=\"img/logo-139x60.png\" height=\"60\" width=\"139\" alt=\"\"></a>
									<button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-menu\">
										<span class=\"sr-only\">Toggle navigation</span>
										<span class=\"icon-bar\"></span>
										<span class=\"icon-bar\"></span>
										<span class=\"icon-bar\"></span>
									</button>
								</div><!-- /Logo & menu burger -->
								<!-- Zone de recherche -->
								<div class=\"col-xs-8 col-xs-offset-2 col-sm-6 col-md-6 col-md-offset-1\">
									<form class=\"navbar-form\" role=\"search\">
										<div class=\"input-group\">
											<input type=\"search\" class=\"form-control\" placeholder=\"Je cherche\" autofocus=\"autofocus\">
											<span class=\"input-group-btn\">
												<button type=\"submit\" class=\"btn btn-default\">Rechercher</button>
											</span>
										</div>
									</form>
								</div><!-- /Zone de recherche -->
							</div>
						</div>
					</section>
				</div>
			</header><!-- /Entete du document -->
		";

	}

	public static function nav() {

		echo "
			<nav class=\"navbar\" role=\"navigation\">
				<div class=\"container-fluid\">
					<section class=\"row\">
						<!-- navbar-collapse -->
						<div class=\"collapse navbar-collapse navbar-menu\">
							<div class=\"col-md-5 col-md-offset-1\">
								<ul class=\"nav navbar-nav\">
									<li><a href=\"pages/Nos_encheres.html\">Nos enchères</a></li>
									<li><a href=\"pages/Liste_Artistes.html\">Artistes</a></li>
									<li><a href=\"pages/Contact.html\">Contact</a></li>
								</ul>
							</div>
							<div class=\"col-md-5\">
								<ul class=\"nav navbar-nav navbar-right\">
									<li><a href=\"pages/formulaire_login.html\">Se connecter</a></li>
									<li><a href=\"pages/formulaire_inscription.html\">S'inscrire</a></li>
									<!-- <li><a href=\"#\">Link</a></li>
									<li class=\"dropdown\">
										<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Dropdown <b class=\"caret\"></b></a>
										<ul class=\"dropdown-menu\">
											<li><a href=\"#\">Action</a></li>
										</ul>
									</li> -->
								</ul>
							</div>
						</div><!-- /.navbar-collapse -->
					</section>
				</div>
			</nav>
			<main class=\"container-fluid\">
				<!-- row principale -->
				<div class=\"row\">
		";

	}

	public static function footer($sNomScript = "") {

		echo "
				</div><!-- /row princiaple -->
			</main>
			<!-- Pied de page du document -->
			<footer class=\"container-fluid\">
				<aside class=\"row\">
					<section class=\"col-xs-offset-1 col-sm-5 col-sm-offset-1 col-md-3\">
						<ul class=\"list-unstyled\">
							<li><a href=\"pages/Nos_encheres.html\">Trouver une œuvre</a></li>
							<li><a href=\"pages/Liste_Artistes.html\">Recherche un Artiste</a></li>
							<li><a href=\"pages/Contact.html\">Nous joindre</a></li>
						</ul>
					</section>
					<section class=\"col-xs-offset-1 col-sm-6 col-sm-offset-0 col-md-4\">
						<ul class=\"list-unstyled\">
							<li><a href=\"pages/Politique_confidentialite.html\">Politique de confidentialité </a></li>
							<li><a href=\"pages/non_responsabilite.html\">Avis complet de non-responsabilité </a></li>
							<li><a href=\"pages/formulaire_login.html\">Connexion</a></li>
						</ul>
					</section>
					<!-- Reseaux sociaux -->
					<section class=\"col-sm-12 col-sm-offset-0 col-md-offset-0 col-md-4\">
						<div class=\"row\">
							<ul class=\"list-inline text-center\">
								<li><a href=\"https://www.facebook.com/skander.gader\"><img src=\"img/icones/logo-facebook.png\" alt=\"logo Facebook \" width=\"48\" height=\"48\" /></a></li>
								<li><a href=\"https://www.youtube.com/channel/UC2T0Ish3GMFzTRflE9bfIUQ\"><img src=\"img/icones/logo-youtube.png\" alt=\"logo Youtube\" width=\"48\" height=\"48\" /></a></li>
								<li><a href=\"http://gader-eskander.blogspot.ca/2013_10_01_archive.html\"><img src=\"img/icones/logo-blogger.png\" alt=\"logo Blogger\" width=\"48\" height=\"48\" /></a></li>
							</ul>
						</div>
						<div class=\"droits row\">
							<p class=\"text-center\">Arts aux Enchères &copy;2014 Tous droits réservés.</p>
						</div>
					</section><!-- /Reseaux sociaux -->
				</aside>
			</footer><!-- /Pied de page du document -->
			<!-- Scripts javascript -->
			<script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js\"></script>
			<script>
				window.jQuery || document.write('<script src=\"js/vendor/jquery-1.11.0.min.js\"><\/script>')
			</script>
			<script src=\"js/vendor/bootstrap.min.js\"></script>
			<script src=\"js/main.js\"></script>
			<script src=\"js/plugins.js\"></script>
			<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
			<script>
				( function(b, o, i, l, e, r) {
					b.GoogleAnalyticsObject = l;
					b[l] || (b[l] = function() {
						(b[l].q = b[l].q || []).push(arguments)
					});
					b[l].l = +new Date;
					e = o.createElement(i);
					r = o.getElementsByTagName(i)[0];
					e.src = 'http://www.google-analytics.com/analytics.js';
					r.parentNode.insertBefore(e, r)
				}(window, document, 'script', 'ga'));
				ga('create', 'UA-XXXXX-X');
				ga('send', 'pageview');
			</script>
		</body>
		</html>
		";

	}

	public static function carousel($aImages = array()) {
		// TODO
		// Rendre le carousel responsive et pleine largeur
		echo "
			<article id=\"carousel-tableau\" class=\"carousel slide hidden-xs\" data-ride=\"carousel\">
			    <ol class=\"carousel-indicators\">
			        <li data-target=\"#carousel-tableau\" data-slide-to=\"0\" class=\"active\"></li>
			        <li data-target=\"#carousel-tableau\" data-slide-to=\"1\" class=\"\"></li>
			        <li data-target=\"#carousel-tableau\" data-slide-to=\"2\" class=\"\"></li>
			        <li data-target=\"#carousel-tableau\" data-slide-to=\"3\" class=\"\"></li>
			        <li data-target=\"#carousel-tableau\" data-slide-to=\"4\" class=\"\"></li>
			        <li data-target=\"#carousel-tableau\" data-slide-to=\"5\" class=\"\"></li>
			    </ol>
			    <section class=\"carousel-inner\">
			        <article class=\"item active\">
			            <img alt=\"First slide\" src=\"img/carousel/carousel1.jpg\" height=\"350\" width=\"auto\">
			        </article>
			        <article class=\"item\">
			            <img alt=\"First slide\" src=\"img/carousel/carousel2.png\" height=\"350\" width=\"auto\">
			        </article>
			        <article class=\"item\">
			            <img alt=\"First slide\" src=\"img/carousel/carousel3.jpg\" height=\"350\" width=\"auto\">
			        </article>
			        <article class=\"item\">
			            <img alt=\"First slide\" src=\"img/carousel/carousel4.jpg\" height=\"350\" width=\"auto\">
			        </article>
			        <article class=\"item\">
			            <img alt=\"First slide\" src=\"img/carousel/carousel5.jpg\" height=\"350\" width=\"auto\">
			        </article>
			        <article class=\"item\">
			            <img alt=\"First slide\" src=\"img/carousel/carousel6.jpg\" height=\"350\" width=\"auto\">
			        </article>
			    </section>
			</article>
		";

	}

	public static function aside() {

		echo "
			Ceci est l'aside.
		";

	}

}