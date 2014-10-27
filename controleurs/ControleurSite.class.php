<?php
/**
 * @class ControleurSite.class.php "controleurs/ControleurSite.class.php"
 * @version 0.0.1
 * @date 2014-10-17
 * @author Eric Revelle
 * @brief Controleur de la section des utilisateurs
 * @details Gère et controle la section des utilisateurs
 */
class ControleurSite extends Controleur{

	public function __construct(){

		$this->gererSite();

	}

	public function gererSite(){

		try{

			if ( !isset($_GET['page']) ) {

				$_GET['page'] = 'accueil';

			}

			switch ( $_GET['page'] ) {

				case 'accueil':
					$this->gererAccueil();
					break;
				
				case 'utilisateur':
					$this->gererUtilisateur();
					break;

				case 'test':
					$this->gererTest();
					break;

				default:
					$this->gererErreurs();

			}

		} catch ( Exception $e ) {

			echo "<p class=\"alert alert-danger\">".$e->getMessage()."</p>";

		}

	}

	public function gererAccueil(){

		VueAccueil::afficherAccueil();

	}
	public function gererUtilisateur(){
		switch ($_GET['action']){
			case 'inscription':
			$this->gererInscription();
			break;
			case 'connexion':
			$this->gererConnexion();
			break;
			case 'parametres':
			$this->gererParametres();
			break;
			case 'déconnexion':
			unset($_SESSION['idUser']);
			header('location:index.php');
			break;
			}
	}

	public function gererTest(){

		VueTest::afficherTest();

	}
	public function gererInscription(){
		if(!isset($_POST['cmd'])){
			VueUtilisateur::afficherFormInscription($sMsg="");
		}
		else{
			try{
				if($_POST['courriel']===$_POST['confCourriel']){
					if(Utilisateur::emailExiste($_POST['courriel'])){
						VueUtilisateur::afficherFormInscription("Cette adresse courriel est déjà une utilisation");

					}else{
						$oUtilisateur = new Utilisateur(0, $_POST['nom'], $_POST['prenom'], $_POST['courriel'], $_POST['password'], $_POST['tel']);

						var_dump($oUtilisateur);
						echo '<br/><br/>ok<br/><br/>';	
						var_dump($_POST);
						
						$oUtilisateur->ajouterUtilisateur();
						header('location:index.php');
						

					}
				}
				else{
					throw new TypeException(TypeException::ERR_CONF_EMAIL);
				}
			}
			catch(Exception $e){
				VueUtilisateur::afficherFormInscription($e->getMessage());

			}
				
		}
	}
	
	public function gererConnexion(){
		if(!isset($_POST['cmd'])){
			VueUtilisateur::afficherFormConnexion("");
		}else{
			try{
				$oUtilisateur = new Utilisateur();
				$oUtilisateur->setCourriel($_POST['courriel']);
				$oUtilisateur->setMotDePasse($_POST['password']);
				if($oUtilisateur->connexionUtilisateur()){
					$_SESSION['idUser']= $oUtilisateur->getIdUtilisateur();
					//echo '<br><br>ok<br><br>';
					//var_dump($oUtilisateur);
					header('location:index.php');

				}
				else if($oUtilisateur->emailExiste($_POST['courriel'])==false){
					VueUtilisateur::afficherFormConnexion("Aucun utilisateur avec ce courriel n'est inscrit");
				}
				else{
					VueUtilisateur::afficherFormConnexion("Mot de Passe erroné");
				}
			}
			catch(Exception $e){
				VueUtilisateur::afficherFormConnexion($e->getMessage());
				
			}
		}
	}
	
	public function gererParametres(){
		$oUtilisateur = new Utilisateur($_SESSION['idUser']);
		$oUtilisateur->rechercherUnUtilisateur();
		var_dump($oUtilisateur);

		if(!isset($_POST['cmd'])){
			VueUtilisateur::afficherFormModSup($oUtilisateur, "");
		}
		else if($_POST['cmd']=='modifier'){
			try{
				$oUtilisateur= new Utilisateur($_SESSION['idUser'], $_POST['nom'], $_POST['prenom'], $_POST['courriel'], $_POST['password'], $_POST['tel']);
				$oUtilisateur->modifierUtilisateur();
				VueUtilisateur::afficherFormModSup($oUtilisateur, 'la modification s\'est bien déroulé');

			}
			catch(Exception $e){
				//var_dump($e);
				VueUtilisateur::afficherFormModSup($oUtilisateur, $e->getMessage());
				
			}
		}
		else if($_POST['cmd']=='supprimer'){
			$oUtilisateur->desactiverUtilisateur();
			header('location:index.php');
		}
	}

}