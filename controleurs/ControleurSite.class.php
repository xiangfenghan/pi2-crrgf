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

				case 'detailsEnchere':
					$this->gererUneEnchere();
					break;

				case 'gestionEnchere':
					$this->gererEnchere();
					break;

				case 'listeOffre':
					$this->gererOffres();
					break;

				case 'statutEnchere':
					$this->gererAjaxStatutEnchere();
					break;

				case 'ajoutOffre':
					if(isset($_SESSION['idUser']) && $_SESSION['idUser']!=0)
					{
						$this->gererAjaxAjoutOffre();
					}
					break;

				case 'utilisateur':
					$this->gererUtilisateur();
					break;

				case 'oeuvres-encheres':
					$this->gererOeuvres();
					break;

				case 'contact':
					$this->gererContact();
					break;

				case 'commentaires' :// Administrateur
					$this->gererAdminCommentaires_contact();
					break;

				case 'transaction':
					$this->gererTransaction();
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
	 * afficher les encheres
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
	 * afficher detail d'une enchere
	 */
	public function gererUneEnchere()
	{
		if(isset($_GET['idEnchere']))
		{
			$oEnchere = new Enchere($_GET['idEnchere']);
			$oEnchere->chargerUneEnchereParIdEnchere();
		}
		elseif(isset($_GET['idOeuvre']))
		{
			$idEnchere = Enchere::rechercherIdEnchereParIdOeuvre($_GET['idOeuvre']);
			$oEnchere = new Enchere($idEnchere);
			$oEnchere->chargerUneEnchereParIdEnchere();
		}

		VueEnchere::afficherUneEnchere($oEnchere);
	}

	/**
	 *
	 */
	public function gererEnchere()
	{
		if(isset($_SESSION) && $_SESSION['idUser']!=0)
		{

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

		}
		else
		{
			header("Location: index.php");
		}
	}

	public function gererCreerUneEnchere()
	{

		if(isset($_SESSION['idUser']))
		{
			$oCreateur = new Utilisateur($_SESSION['idUser']);

			$oCreateur = $oCreateur->rechercherUnUtilisateur();//it doesn't work, constructor of Class Utilisateur has errors
		}
		else
		{
			header("Location: index.php?page=utilisateur&action=connexion");
		}

		$oModeleXHFModele = new XFHModeles();

		$sCondition = "WHERE utilisateur_id=" . $_SESSION['idUser'] . " AND etat='disponible' ;";//it doesn't work, database table 'Oeuvres' doesn't have a foreign key connect to users.

		$aEnregs = $oModeleXHFModele->selectParCondition('pi2_oeuvres', $sCondition);

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
			$sReqete = "UPDATE pi2_encheres SET titre='".$_POST['titreEnchere']."', prixDebut=".$_POST['prixDebut'].", prixIncrement=".$_POST['prixAug'].", prixDirecte=".$_POST['prixDirecte'].", dateFin=dateDebut+INTERVAL ".$_POST['duree']." DAY  WHERE id=".$_GET['idEnchere'].";";
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
		die("GererAjaxStatus ".__LINE__);
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
		var_dump($aOffres);
		VueOffre::afficherListeOffres($aOffres);

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
			case 'deconnecter':
				unset($_SESSION['idUser']);
				header('location:index.php');
				break;
		}
	}


	public function gererInscription(){
		if(!isset($_POST['cmd'])){
			$sMsg = "";
			VueUtilisateur::afficherFormInscription($sMsg);
		}
		else{
			try{
				if($_POST['courriel']===$_POST['confCourriel']){
					if(Utilisateur::emailExiste($_POST['courriel'])){
						VueUtilisateur::afficherFormInscription("Cette adresse courriel est déjà une utilisation");

					}else{
						$oUtilisateur = new Utilisateur(0, $_POST['nom'], $_POST['prenom'], $_POST['courriel'], $_POST['password'], $_POST['tel']);

//                        var_dump($oUtilisateur);
//                        echo '<br/><br/>ok<br/><br/>';
//                        var_dump($_POST);

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
//        var_dump($oUtilisateur);

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

   public function gererOeuvres()
	{
		try{
			if(isset($_POST['cmd'])==false && isset($_POST['rech'])==false)
			{
				$aOeuvres=Oeuvre::rechercherListeDesOeuvresEnVente();
				VueOeuvre::afficherLesOeuvres($aOeuvres);
			}else if(isset($_POST['cmd'])){
					//Récupérer le texte saisi par l'internaute $_POST['txt']
					$recherche=$_POST['txt'];
					echo $recherche;
					$aOeuvres =Oeuvre::rechercherDesOeuvresParMotCle($recherche);

					//Si l'oeuvre existe
					if($aOeuvres  == true)
					{
						//echo "trouvé";

						//afficher les oeuvres correspondant au mot clé
						VueOeuvre::afficherLesOeuvres($aOeuvres);
					}else
						{
							//echo "Aucun produit ne correspond à votre recherche";
							VueOeuvre::afficherLesOeuvres(0,"aucun produit ne correspond à votre recherche");
						}

				 } else if(isset($_POST['rech']))
					{
						//effectue la recherche si l'internaute a selectionné à la fois: theme ET technique
						if (isset($_POST['theme'])==true && isset($_POST['technique'])==true)
						{
							//Récupère le theme choisi par l'utilisateur
							$Theme= $_POST['theme'];
							//echo $Theme;
							//Instancier un objet Theme avec le numéro de theme choisi par l'internaute $Theme
							$oTheme = new Theme($Theme);
							//Recherche le nom du theme associé à ce numéro
							$bRechercherTheme=$oTheme->rechercherNomThemeParSonId();
							//Récupère le résultat
							$nomTheme= $oTheme->getNomTheme();

							//Récupère la technique choisie par l'utilisateur
							$Technique= $_POST['technique'];
							//echo $Technique;
							//Instancier un objet Technique avec le numéro de technique saisi par l'internaute $Technique
							$oTechnique = new Technique($Technique);
							//Recherche le nom de la technique associé à ce numéro
							$bRechercherTechnique=$oTechnique->rechercherNomTechniqueParSonId();
							//Récupère le résultat
							$nomTechnique= $oTechnique->getNomTechnique();

							if($bRechercherTheme == true && $bRechercherTechnique == true)
							{
								//echo 'trouvé';

								//Instancier un objet Oeuvre
								$oOeuvre = new Oeuvre();
								//Recherche les oeuvres correspondant aux noms du theme ET de la technique choisis par l'internaute
								$aOeuvres=$oOeuvre->rechercherParThemeTechnique($nomTheme,$nomTechnique);

								if($aOeuvres==true)
								{
									VueOeuvre::afficherLesOeuvres($aOeuvres);
								} else
									{
										VueOeuvre::afficherLesOeuvres(0,"Aucun produit ne correspond à votre recherche");
									}
							} else

								{
								   VueOeuvre::afficherLesOeuvres($oOeuvre, array('type'=>'warning','msg'=>'Aucune oeuvre de disponible.'));
								}

						} else  //effectue la recherche si l'internaute a selectionné une des categories: theme OU technique

							{   //si seulement theme est choisi
								if (isset($_POST['theme']))
								{
									//Récupérer la valeur du theme choisi par l'utilisateur(classique,moderne....)
									$Theme= $_POST['theme'];
									//donne une categorie à la valeur récupérée
									$categorie='theme';

									//Instancier un objet Theme avec le numéro de theme saisi par l'internaute $Theme
									$oTheme = new Theme($Theme);
									//Recherche le nom du theme associé à ce numéro
									$bRechercherTheme=$oTheme->rechercherNomThemeParSonId();
									//Récupère le résultat
									$nomTheme= $oTheme->getNomTheme();

										if($bRechercherTheme == true)
										{
											//affecte la valeur du theme dans une variable critère
											$critere=$nomTheme;
										}

								}   else    //si seulement technique est choisie

									{
										//Récupérer la valeur de la technique choisie par l'utilisateur(acrylique,peinture a l'huile....)
										$Technique= $_POST['technique'];
										//donne une categorie à la valeur récupérée
										$categorie='technique'  ;

										//Instancier un objet Technique avec le numéro de technique saisi par l'internaute $Technique
										$oTechnique = new Technique($Technique);
										//Recherche le nom de la technique associé à ce numéro
										$bRechercherTechnique=$oTechnique->rechercherNomTechniqueParSonId();
										//Récupère le résultat
										$nomTechnique= $oTechnique->getNomTechnique();
											if($bRechercherTechnique == true)
											{
												//affecte la valeur de la technique dans une variable critère
												$critere=$nomTechnique;
											}
									}

							//Récupération des oeuvres correspondants au theme OU à la technique
							//Instancier un objet Oeuvre
							$oOeuvre=new Oeuvre();
							//Recherche les enregistrements en fonction du:
							//critère récupéré:$nomTheme ou $nomTechnique
							//et de la categorie (type) à qui il appartient:Theme ou Technique
							$aOeuvres=$oOeuvre->rechercherParCritere($critere,$categorie);

							if($aOeuvres==true)
							{
								VueOeuvre::afficherLesOeuvres($aOeuvres);
							}
							 else
								{
									VueOeuvre::afficherLesOeuvres(0,"Aucun produit ne correspond à votre recherche");
								}
							}
					}

		}catch(Exception $e){
			echo "<p>".$e->getMessage()."</p>";
		}
	}

	public function gererContact() {

		try{
			//1èr cas : aucune action n'a été sélectionné $_GET['action'] n'a pas affecté d'une valeur
			if(isset($_GET['action']) == FALSE){
				$_GET['action']="form";
			}

			//2e cas :L'utilisateur a sélectionné une action: envoyer un message,
			switch($_GET['action']){
				case "ajouContact":
					ControleurSite::gererAjouterContact();
					break;
				case "form": default:
					VueContact::afficherContact();
			}//fin du switch() sur $_GET['action']
		}catch(Exception $e){
			echo "<p>".$e->getMessage()."</p>";
		}

	}//Fin gererContact()

	/**
	 * afficher le formulaire d'ajout et sur submit ajouter le contac dans la base de données
	 */
	public static function gererAjouterContact(){
		try{
			//1èr cas : aucun submit n'a été cliqué
			if(isset($_POST['cmd']) == false){
				//afficher le formulaire
				VueContact::afficherContact();
			//2e cas : le bouton submit Modifier a été cliqué
			}else{

				$oContact = new Contact(0,$_POST['txtNom'], $_POST['txtPrenom'], $_POST['txtEmail'], $_POST['textarea']);
				//modifier dans la base de données l'étudiant
				$oContact->ajouterUnContact();
				//echo "L'envoie de votre message s'est déroulé avec succès.";
				VueContact::afficherContact(array('type'=>'success','msg'=>'Le contact a bien été créer.'));
			}
		}catch(Exception $e){
			echo "<p>".$e->getMessage()."</p>";
		}

	}//fin de la fonction gererAjouterContact()

	public function gererCommentaire() {

		try{
			//1èr cas : aucune action n'a été sélectionné $_GET['action'] n'a pas affecté d'une valeur
			if(isset($_GET['action']) == FALSE){
				$_GET['action']="lst";
			}

			//2e cas :L'utilisateur a sélectionné une action,
			//il existe 3 possibilités add, mod, sup ou la liste des Commentaires
			switch($_GET['action']){
				case "ajouCommentaire":
					ControleurSite::gererAjouterCommentaire();
					break;
				case "Signaler un abus":
					ControleurSite::gererSignalerAbus();
					break;
				case "supprimer":
					ControleurSite::gererSupprimerCommentaire();
					break;
				case "lst": default:
				ControleurSite::gererlistCommentaire();

			}//fin du switch() sur $_GET['action']
		}catch(Exception $e){
			echo "<p>".$e->getMessage()."</p>";
		}

	}//Fin gereCommentaire()

	/**
	 * afficher le formulaire d'ajout et sur submit ajouter le contac dans la base de données
	 */
	public static function gererAjouterCommentaire(){
		try{

			$IdConnecte=2;
			$idEnchere=1;
			//1èr cas : aucun submit n'a été cliqué
			if(isset($_POST['cmd']) == false){
				//afficher le formulaire
				 // $IdConnecte=$_SESSION['idUtilisateur'];
				 // $idEnchere= $oEnchere-> getIdEnchere();


				VueCommentaire::afficherFormPoserUnCommentaires($IdConnecte);
			//2e cas : le bouton submit Publier a été cliqué
			}else{

				$oCommentaire = new Commentaire(0,$_POST['txtCommentaire'],'ncgn','nvbn',$IdConnecte, $idEnchere);
				//modifier dans la base de données l'étudiant
				$oCommentaire->ajouterUnCommentaire();
				$sMsg = "L'envoie de votre message s'est déroulé avec succès.";
				VueCommentaire::afficherFormPoserUnCommentaires($IdConnecte);
				

			}
		}catch(Exception $e){
			echo "<p>".$e->getMessage()."</p>";
		}
	}//fin de la fonction gererAjouterCommentaire()

	/**
	 * afficher la liste des Commentaires qui vont pouvoir être modifier ou supprimer et ajouter
	 */
	public static function gererlistCommentaire(){
		try{
			// $oUtilisateur= objet utilisateur connecte
			// $IdConnecte= le Id d'utilisateur connecte
			// $IdConnecte=$oUtilisateur-> getIdUtilisateur();
			$IdConnecte =2;
			VueCommentaire::afficherFormPoserUnCommentaires($IdConnecte);
			$oComment= new Commentaire();
			$aCommentaire=$oComment ->adm_rechercherListeDesCommentaires();
			$oVueCommentaire=new VueCommentaire();
			//afficher les commentaires
			$oVueCommentaire->afficherListeCommentaires($aCommentaire, $IdConnecte);
		}catch(Exception $e){
			echo "<p>".$e->getMessage()."</p>";
		}
	}//fin de la fonction gererListeDesProduit()

	public function gererAdminCommentaires_Contact(){

		try{
			//1èr cas : aucune action n'a été sélectionné $_GET['action'] n'a pas affecté d'une valeur
			if(isset($_GET['action']) == FALSE){
				$_GET['action']="lst";
			}

			//2e cas :L'utilisateur a sélectionné une action,
			//il existe 2 possibilités supprimer un Commentaire, supprimer un contact
			switch($_GET['action']){
				case "supCommentair":
					ControleurSite::gererSupprimerCommentaire();
					break;
				case "supContact":
					ControleurSite::gererSupprimerContact();
					break;
				case "lst": default:
					ControleurSite::gererlistCommentairs_Contact();
			}//fin du switch() sur $_GET['action']
		}catch(Exception $e){
			echo "<p>".$e->getMessage()."</p>";
		}

	}//Fin gererAdmiCommentairs_Contact()

	/**
	 * afficher la liste des Commentaires et des contacts pour l'administrateur
	 */
	public static function gererlistCommentairs_Contact(){
		try{

			$oComment= new Commentaire();
			$aCommentaires=$oComment ->adm_rechercherListeDesCommentaires();
			// var_export($aCommentaires);exit;
			$oContact= new Contact();
			$aContacts= $oContact->rechercherListeDesContacts();
			// var_export($aContacts);exit;
			$oVueCommentaire_Contact=new VueCommentaire_Contact();
			//afficher les commentaires et les contacts
			$oVueCommentaire_Contact->admi_afficherCommentaire_contact($aCommentaires, $aContacts);
		}catch(Exception $e){
			echo "<p>".$e->getMessage()."</p>";
		}
	}//fin de la fonction gererlistCommentairs_Contact()

	/**
	 * Supprimer un Contact de la base de données
	 * @return string message
	 */
	public static function gererSupprimerContact(){

		try{
			$oContact = new Contact($_GET['idContact']);
			$oContact->rechercherUnContact();
			//supprimer dans la base de données un Contact
			// var_export($oContact);exit;
			$oContact->supprimerUncontact();

			$aContacts= $oContact->rechercherListeDesContacts();
			$oComment= new Commentaire();
			$aCommentaires=$oComment ->adm_rechercherListeDesCommentaires();
			$oVueCommentaire_Contact=new VueCommentaire_Contact();
			//afficher les commentaires et les contacts
			$oVueCommentaire_Contact->admi_afficherCommentaire_contact($aCommentaires, $aContacts);

		}catch(Exception $e){
			return $e->getMessage();
		}
	}//fin de la gererSupprimerContact()

	/**
	 * Supprimer un Commentaire de la base de données
	 * @return string message
	 */
	public static function gererSupprimerCommentaire(){

		try{
			$oCommentaire = new Commentaire($_GET['idCommentaire']);
			$oCommentaire->rechercherUnCommentaire();
			//supprimer dans la base de données un Commentaire
			$oCommentaire->supprimerUnCommentaire();

			$oContact= new Contact();
			$aContacts= $oContact->rechercherListeDesContacts();
			$aCommentaires=$oCommentaire ->adm_rechercherListeDesCommentaires();
			$oVueCommentaire_Contact=new VueCommentaire_Contact();
			//afficher les commentaires et les contacts
			$oVueCommentaire_Contact->admi_afficherCommentaire_contact($aCommentaires, $aContacts);

		}catch(Exception $e){
			return $e->getMessage();
		}
	}//fin de la gererSupprimerContact()

	public function gererTransaction() {

		try {

			if ( !isset($_GET['action']) ) {

				$_GET['action'] = 'erreur';

			}

			switch ( $_GET['action'] ) {

				case 'accepte':
					VueTransaction::afficherSuccess(array('type'=>'success','msg'=>'Félicitation!'));
					break;

				case 'annule':
					VueTransaction::afficherAnnule(array('type'=>'danger','msg'=>'Transaction annulé!'));
					break;

				default:
				$this->gererErreurs();

			}

		} catch ( Exception $e) {

			echo "
				<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
					<button type=\"button\" class=\"close\" data-dismiss=\"alert\">
						<span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Fermer</span>
					</button>
					<p>".$e->getMessage()."</p>
				</div>";

		}

	}

}