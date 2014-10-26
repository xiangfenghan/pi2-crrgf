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

				case 'mes-oeuvres':
					$this->gererOeuvres();
					break;

				default:
					header("HTTP/1.0 404 Not Found");
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
			VueUtilisateur::afficherFormInscription();
			break;
			case 'connexion':
			VueUtilisateur::afficherFormConnexion();
			break;
			case 'parametres':
			VueUtilisateur::afficherformModSup();
			break;
			}
	}

	public function gererOeuvres()
	{

		try{
			if(isset($_POST['cmd']) == false){
					$aOeuvres=Oeuvre::rechercherListeDesOeuvres();
					VueOeuvre::afficherLesOeuvres($aOeuvres);
			}else{

				//Récupérer le texte saisi par l'internaute $_POST['txt']
				 $recherche=$_POST['txt'];
				 echo $recherche;
				$aOeuvres =Oeuvre::rechercherDesOeuvresParMotCle($recherche);

				//Si l'oeuvre existe
				if($aOeuvres  == true){
					echo "trouvé";
					/*echo "<pre>";
						var_dump ($arrayOeuvres );
					echo "</pre>";*/

					//afficher les oeuvres correspondant au mot clé
					VueOeuvre::afficherLesOeuvres($aOeuvres);

				// Sinon
				}else{
					//echo "Aucun produit ne correspond à votre recherche";

					//Repropose la liste complète des oeuvres


					VueOeuvre::afficherLesOeuvres(0,"aucun produit ne correspond à votre recherche");
				}
			}

		}catch(Exception $e){
			//repropose la saisie du numéro d'étudiant, une erreur de type
			//$aOeuvres=Oeuvre::rechercherListeDesOeuvres();
			//VueOeuvre::afficherLesOeuvres($aOeuvres);
			//VueOeuvre::afficherLesOeuvres($e->getMessage());
			echo "<p>".$e->getMessage()."</p>";
		}
	}
}