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

                case 'encheres':
                    $this->gererLesEncheres();
                    break;

                case 'detailEnchere':
                    $this->gererUneEnchere();
                    break;

                case 'gestionEnchere':
                    $this->gererEnchere();
                    break;

                case 'statutEnchere':
                    $this->gererAjaxEnchere();
                    break;

                case 'listeOffre':
                    $this->gererOffres();
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


	public function gererTest(){

		VueTest::afficherTest();

	}

    /**
     *
     */
    public function gererLesEncheres()
    {
        $aEnregs = Enchere::chargerLesEncheres();

        $aEncheres = array();

        foreach($aEnregs as $value)
        {
            $aEncheres[] = new Enchere($value['id']);
        }

        VueEnchere::afficherLesEnchere($aEncheres);
    }

    /**
     *
     */
    public function gererUneEnchere()
    {
//        $oEnchere = new Enchere($_GET['idEnchere']);
        $oEnchere = new Enchere(1);
        $oEnchere->chargerUneEnchereParIdEnchere();
//        print_r($oEnchere);
        VueEnchere::afficherUneEnchere($oEnchere);
    }

    /**
     *
     */
    public function gererEnchere()
    {
//        if(isset($_SESSION) && $_SESSION['idUtilisateur']!=0)
//        {

            if(!isset($_GET['action']))
            {
                $_GET['action'] = 'default';
            }
            switch($_GET['action'])
            {
                case 'add':
                    $this->gererCreerUneEnchere();
                    break;

                case 'mod':
                    $this->gererModEnchere();
                    break;

                case 'sup':
                    $this->gererSupEnchere();
                    break;

                case 'default':
                    default:
                    $this->gererListeEnchere();
                    break;
            }

//        }
//        else
//        {
//            header("Location: index.php");
//        }
    }

    public function gererAjaxEnchere()
    {

            switch($_GET['page'])
            {
                case 'statutEnchere':
                    $this->gererAjaxStatutEnchere();
                    break;
                case 'ajoutOffre':
                    if(isset($_SESSION['idUtilisateur']) && $_SESSION['idUtilisateur']!=0)
                    {
                        $this->gererAjaxAjoutOffre();
                    }
                    break;
            }

    }

    public function gererCreerUneEnchere()
    {
        //$_SESSION['idUtilisateur'] = 1;//fake utilisateur pour test!
        if(isset($_SESSION['idUtilisateur']))
        {
            $oCreateur = new Utilisateur($_SESSION['idUtilisateur']);

            $oCreateur = $oCreateur->rechercherUnUtilisateur();//it doesn't work, constructor of Class Utilisateur has errors
        }
        else
        {
            header("Location: index.php?page=utilisateur&action=connexion");
        }

        $oModeleXHFModele = new XFHModeles();

        $sCondition = "WHERE Utilisateur_id=" . $_SESSION['idUtilisateur'] . " AND etat='disponible' ;";//it doesn't work, database table 'Oeuvres' doesn't have a foreign key connect to users.

        $aEnregs = $oModeleXHFModele->selectParCondition('oeuvres', $sCondition);

        $aOeuvres = array();
        if(count($aEnregs)>0)
        {
            foreach($aEnregs as $value)
            {
                $aOeuvres[] = new Oeuvre($value['id']);
            }
            if(!isset($_POST['enregistrerEnchere']))
            {
                VueEnchere::formCreerEnchere($aOeuvres);
            }
            else
            {
                $oOeuvre = new Oeuvre($_POST['oeuvre']);
                $oEnchere = new Enchere(0, $oCreateur, $oOeuvre);
                $oEnchere = $oEnchere->creerUneEnchere();
                VueEnchere::afficherUneEnchere($oEnchere);
            }
        }
        else
        {
            header("Location: index.php?page=gererOeuvre&action=ajoutOeuvre");//if the user doesn't have any oeuvre, send to page 'add un oeuvre'
        }




    }

    public function gererModEnchere()
    {
        $oEnchere = new Enchere($_GET['idEnchere']);

        if(!isset($_POST['enregistrerEnchere']))
        {
            VueEnchere::formModEnchere($oEnchere);
        }
        else
        {
            $sReqete = "UPDATE Encheres SET titre='".$_POST['titreEnchere']."', prixDebut=".$_POST['prixDebut'].", prixIncrement=".$_POST['prixAug'].", prixDirecte=".$_POST['prixDirecte'].", dateFin=dateDebut+INTERVAL ".$_POST['duree']." DAY  WHERE id=".$this->getIdEnchere().";";
            if($oEnchere->executerRequete($sReqete))
            {
                header("Location: index.php?page=gestionEnchere");
            }
            else
            {
                echo "a venir";
            }
        }
    }

    public function gererAjaxStatutEnchere()
    {
        //$oEnchere = new Enchere($_GET['idEnchere']);

        VueEnchere::xmlAjaxDetailEnchere();
    }

    public function gererAjaxAjoutOffre()
    {
        //$oEnchere = new Enchere($_GET['idEnchere']);

        VueEnchere::xmlAjaxAjoutOffre();
    }

    public function gererSupEnchere()
    {
        $oEnchere = new Enchere($_GET['idEnchere']);
        $oEnchere->supprimerUnEnchere();

    }

    public function gererListeEnchere()
    {
        $oModeleXHFModele = new XFHModeles();

        $sCondition='';

        if(isset($_SESSION['idUtilisateur']))
        {
            $sCondition = "WHERE Utilisateur_id=" . $_SESSION['idUtilisateur'];
        }

        $aEnregs = $oModeleXHFModele->selectParCondition("pi2_Encheres", $sCondition);

        $aEncheres=array();

        foreach($aEnregs as $value)
        {
            $aEncheres[] = new Enchere($value['id']);
        }

        VueEnchere::afficherListeEncheres($aEncheres);
    }

    public function gererOffres()
    {
        $aEnregs = Offre::chargerLesOffres();

        $aOffres = array();

        foreach($aEnregs as $value)
        {
            $aOffres[] = new Offre($value['id']);
        }

        VueOffre::afficherListeOffres($aOffres);

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