<?php
/**
 * @classe VueAccueil VueUtilisateur.class.php "classes/VueUtilisateur.class.php"
 * @version 0.0.1
 * @date 2014-10-18
 * @author Martin Côté
 * @brief Affiche les formulaires Utilisateur ainsi que la page de choix.
 * @details Permet d'afficher le choix des parametres utilisateur ainsi que leur formulaires.
 */
class VueUtilisateur {

	/**
	 * 
	 */
	public static function afficherFormModSup() {

		// Inclu les morceaux de pages, dont les metas, l'entete, la navigation et le carousel
		Vue::head('Achetez des oeuvres d\'art', 'Site de vente d\'oeuvres d\'art en ligne');
		Vue::header('Ma recherche');
		Vue::nav();

		?>
			<main id="martin">

				<div class="container" id="modification">
					<div class="row">
						<div class="col-xs-12 col-sm-8 col-sm-offset-2">

							<article class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Formulaire de modification</h3>
								</div>
								<div class="panel-body">
									<form class="form-horizontal" role="form">
										<div class="form-group">
											<label for="inputNom" class="col-sm-2 control-label">Nom</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" id="inputNom" placeholder="Nom" value="Côté">
											</div>
										</div>
										<div class="form-group">
											<label for="inputPrenom" class="col-sm-2 control-label">Prénom</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" id="inputPrenom" placeholder="Prénom" value="Martin">
											</div>
										</div>
										<div class="form-group">
											<label for="inputTel" class="col-sm-2 control-label">Téléphone</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" id="inputTel" placeholder="Téléphone" value="">
											</div>
										</div>
										<div class="form-group">
											<label for="inputEmail" class="col-sm-2 control-label">Courriel</label>
											<div class="col-sm-10">
												<input type="email" class="form-control" id="inputEmail" placeholder="Courriel" value="martincote@mail.com">
											</div>
										</div>

										<div class="form-group">
											<label for="inputPassword" class="col-sm-2 control-label">Mot de passe</label>
											<div class="col-sm-10">
												<input type="password" class="form-control" id="inputPassword" placeholder="Mot de passe">
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-offset-2 col-sm-2">
												<button type="submit" class="btn btn-default">Modifier</button>
											</div>
										</div>
									</form>
								</div>
							</article>
						</div>
					</div>
				</div>
				<!-- /container -->
				<div class="container" id="suppression">
					<div class="row">
						<div class="col-xs-12 col-sm-8 col-sm-offset-2">
							<article class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Formulaire de suppression</h3>
								</div>
								<div class="panel-body">
									<form role="form">
										<div class="form-group">
											<label for="txtarea">Pour quelles raisons désirez-vous supprimer votre compte? :</label>
											<textarea class="form-control" rows="5"></textarea>
										</div>

										<div class="col-sm-offset-2 col-sm-2">
											<div>
												<button type="submit" class="btn btn-default">Supprimer</button>
											</div>
										</div>
									</form>
								</div>
							</article>

						</div>
					</div>
				</div>

			</main>
    <!-- -------------Fin Main------------------->

		<?php

		Vue::footer();

	}//Fin de la fonction afficherFormSup
	
	public static function afficherFormInscription(){
		Vue::head('Achetez des oeuvres d\'art', 'Site de vente d\'oeuvres d\'art en ligne');
		Vue::header('Ma recherche');
		Vue::nav();
		?>
		<main id="martin" class="clearfix">
        <div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-sm-offset-2">
				<article class="panel panel-default ">
					<div class="panel-heading">
						<h3 class="panel-title">Formulaire d'inscription</h3>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" role="form">
							<div class="form-group">
								<label for="inputNom" class="col-sm-2 control-label">Nom</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" id="inputNom" placeholder="Nom">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPrenom" class="col-sm-2 control-label">Prénom</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" id="inputPrenom" placeholder="Prénom">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail" class="col-sm-2 control-label">Courriel</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" id="inputEmail" placeholder="Courriel">
								</div>
							</div>
							<div class="form-group">
								<label for="inputConfEmail" class="col-sm-2 control-label">Confirmation Courriel</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" id="inputConfEmail" placeholder="Confirmer courriel">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword" class="col-sm-2 control-label">Mot de passe</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" id="inputPassword" placeholder="Mot de passe">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-default">Soumettre</button>
								</div>
							</div>
						</form>
					</div>
				</article>
			</div>
		</div>
	</div>
	<!-- /container -->
    </main>

		<?php
		
		Vue::footer();

	}// fonction afficherFormInscription()
	
	public static function afficherFormConnexion(){
		Vue::head('Achetez des oeuvres d\'art', 'Site de vente d\'oeuvres d\'art en ligne');
		Vue::header('Ma recherche');
		Vue::nav();
		?>
		<main id="martin" class="clearfix">
			<div class="container" >
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-sm-offset-2">

						<article class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Formulaire de connexion</h3>
							</div>
							<div class="panel-body">
								<form class="form-horizontal" role="form">
									<div class="form-group">
										<label for="inputEmail" class="col-sm-2 control-label">Courriel</label>
										<div class="col-sm-10">
											<input type="email" class="form-control" id="inputEmail" placeholder="Courriel">
										</div>
									</div>
									<div class="form-group">
										<label for="inputPassword" class="col-sm-2 control-label">Mot de passe</label>
										<div class="col-sm-10">
											<input type="password" class="form-control" id="inputPassword" placeholder="Mot de passe">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											<div class="checkbox">
												<label>
													<input type="checkbox">Se souvenir de moi
												</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											<a href="index_login.html"><button type="button" class="btn btn-default">Connexion</button></a>
										</div>
									</div>
								</form>
							</div>
						</article>
					</div>
				</div>
			</div>
			<!-- /container -->
		</main>

		<?php
		Vue::footer();
	}
	
}