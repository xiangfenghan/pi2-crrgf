<?php
/**
 * @class Utilisateur Utilisateur.class.php "modeles/Utilisateur.class.php"
 * @version 0.0.1
 * @date 2014-10-20
 * @author Martin Côté
 * @brief Modèles Utilisateur
 * @details Modele contenant les fonctions Utilisateurs
 */

class Utilisateur extends Modeles{
<<<<<<< HEAD
	
=======

>>>>>>> upstream/master
	/* Propriétés privées */
	private $idUtilisateur;
	private $sNom;
	private $sPrenom;
	private $sCourriel;
	private $sMotDePasse;
	private $sTel;
	private $sTypeUtilisateur;
<<<<<<< HEAD
	private $sEtat;
	
=======
	private $sEtat

>>>>>>> upstream/master
	/**
	 * variable qui provient de la relation de composition
	 * entre la classe Dossier et la classe Etudiant
	 */
<<<<<<< HEAD
	
	
=======


>>>>>>> upstream/master
	/**
	 * Constructeur
	 * @param integer $idEtudiant
	 * @param string $sNom
	 * @param string $sPrenom
	 * @param integer $iAge
	 */
	public function __construct($idUtilisateur=0, $sNom=" ", $sPrenom=" ", $sCourriel=" ", $MotDePasse=" ",$sTel=" ",$sTypeUtilisateur="membre",$sEtat="actif" ){
<<<<<<< HEAD
		$this->setIdUtilisateur($idUtilisateur);
=======
		$this->setIdEtudiant($idUtilisateur);
>>>>>>> upstream/master
		$this->setNom($sNom);
		$this->setPrenom($sPrenom);
		$this->setCourriel($sCourriel);
		$this->setMotDePasse($MotDePasse);
		$this->setTel($sTel);
		$this->setTypeUtilisateur($sTypeUtilisateur);
		$this->setEtat($sEtat);
<<<<<<< HEAD
		
	} //fin du constructeur
	
=======

	} //fin du constructeur

>>>>>>> upstream/master
	/* Affectation */
	/**
	 *  * @param string $sNom
	 */
	public function setNom($sNom){
		TypeException::estString($sNom);
		TypeException::estVide($sNom);
<<<<<<< HEAD
		
=======

>>>>>>> upstream/master
		$this->sNom = $sNom;
	}
	/**
	 * @param string $sPrenom
	 */
	public function setPrenom($sPrenom){
		TypeException::estString($sPrenom);
		TypeException::estVide($sPrenom);
<<<<<<< HEAD
		
=======

>>>>>>> upstream/master
		$this->sPrenom = $sPrenom;
	}
	/**
	 * @param string $sCourriel
	 */
	public function setCourriel($sCourriel){
		TypeException::eststring($sCourriel);
<<<<<<< HEAD
		TypeException::estVide($sCourriel);
=======
		TypeException::estVide($sPrenom);
>>>>>>> upstream/master

		$this->sCourriel = $sCourriel;
	}
	/**
	 * @param integer $idUtilisateur
	 */
<<<<<<< HEAD
	public function setIdUtilisateur($idUtilisateur){
		TypeException::estNumerique($idUtilisateur);
		
=======
	public function setIdUtilisateurt($idUtilisateur){
		TypeException::estNumerique($idUtilisateur);

>>>>>>> upstream/master
		$this->idUtilisateur = $idUtilisateur;
	}
	/**
	* @param string $sTel
	*/
	public function setTel($sTel){
		TypeException::estString($sTel);
		TypeException::estVide($sTel);
<<<<<<< HEAD
		
		$this->sTel = $sTel;
=======
>>>>>>> upstream/master
	}
	/**
	* @param string $sTypeUtilisateur
	*/
	public function setTypeUtilisateur($sTypeUtilisateur){
		TypeException::estString($sTypeUtilisateur);
<<<<<<< HEAD
		TypeException::estVide($sTypeUtilisateur);
		
		$this->sTypeUtilisateur = $sTypeUtilisateur;
=======
		TypeException::estVide($sPrenom);
>>>>>>> upstream/master

	}
	/**
	* @param string $sEtat
	*/
	public function setEtat($sEtat){
<<<<<<< HEAD
		TypeException::estString($sEtat);		
		TypeException::estVide($sEtat);
		
		$this->sEtat = $sEtat;
=======
		TypeException::estString($sEtat);
		TypeException::estVide($sPrenom);
>>>>>>> upstream/master

	}
	/**
	* @param string $sMotDePasse
	*/
	public function setMotDePasse($sMotDePasse){

<<<<<<< HEAD
		TypeException::estVide($sMotDePasse);
		
		$this->sMotDePasse = $sMotDePasse;
	}

	
=======
		TypeException::estVide($sPrenom);

	}


>>>>>>> upstream/master
	/**
	 * @param array $aDossiers
	 */
	/*public function setDossiers($aDossiers){
		TypeException::estArray($aDossiers);
<<<<<<< HEAD
		
=======

>>>>>>> upstream/master
		$this->aDossiers = $aDossiers;
	}*/
	/**
	 *  * @return string $sNom
	 */
	public function getNom(){
		return htmlentities($this->sNom);
	}
	/**
	 * @return string $sPrenom
	 */
	public function getPrenom(){
		return htmlentities($this->sPrenom);
	}
	/**
	 * @return integer $sCourriel
	 */
	public function getCourriel(){
		return $this->sCourriel;
	}
	/**
	 * @return string $sMotDePasse
	 */
	public function getMotDePasse(){
<<<<<<< HEAD
		return $this->sMotDePasse;
=======
		return $this->sMotdePasse;
>>>>>>> upstream/master
	}
	/**
	 * @return string $sTelRes
	 */
	public function getTel(){
<<<<<<< HEAD
		return $this->sTel;
=======
		return $this->sTelRes;
>>>>>>> upstream/master
	}
	/**
	 * @return string $Etat
	 */
	public function getEtat(){
		return $this->sEtat;
	}
	/**
	 * @return string $sTypeUtilisateur
	 */
	public function getTypeUtilisateur(){
		return $this->sTypeUtilisateur;
	}
	/**
	 * @return integer $idUtilisateur
	 */
	public function getIdUtilisateur(){
		return $this->idUtilisateur;
	}
<<<<<<< HEAD
	
	
=======


>>>>>>> upstream/master
	/**
	 * Rechercher un utilisateur par son idUtilisateur
	 * @return boolean true si l'enregistrement est trouvé dans la BDD
	 * false dans tous les autres cas
	 */
	function rechercherUnUtilisateur(){
<<<<<<< HEAD
		$oPDO = new Connexion;

		//Réaliser la requête de recherche par le idEtudiant
		$sSQL = "SELECT * FROM utilisateurs WHERE id=".$this->getIdUtilisateur();
		//préparer la requête
		$requete = $oPDO->oPDO->prepare($sSQL);
		//Exécuter la requête
		if ( $requete->execute() ) {
			//s'il y a un résultat
			if ( $requete->rowCount() ) {

				$aResultats = $requete->fetchAll();
				$this->setNom($aResultats[0]['nom']);
				$this->setPrenom($aResultats[0]['prenom']);
				$this->setCourriel($aResultats[0]['courriel']);
				$this->setIdUtilisateur($aResultats[0]['id']);
				$this->setTel($aResultats[0]['telephone']);
				$this->setEtat($aResultats[0]['etat']);
				$this->setMotDePasse($aResultats[0]['motDePasse']);
				$this->setTypeUtilisateur($aResultats[0]['type']);

			} else {

				//$sMsg = array('type'=>'warning', 'msg'=>'Aucune aucun utilisateur n'a été trouvé);

			}

		} else {

			throw new Exception("Erreur lors de la requete");
			//$sMsg = array('type'=>'danger', 'msg'=>'Erreur lors de la requete.');

		}
			
	}//fin de rechercher un utilisateur()
	
	public function rechercherUtilisateurParEmail(){
		//Réaliser la requête de recherche par le idEtudiant
		$sSQL = "SELECT * FROM utilisateurs WHERE courriel=".$this->getCourriel();
=======
		//Réaliser la requête de recherche par le idEtudiant
		$sSQL = "SELECT * FROM utilisateurs WHERE idUtilisateur=".$this->getIdUtilisateur();
>>>>>>> upstream/master
		//préparer la requête
		$requete = $oPDO->prepare($sSQL);
		//Exécuter la requête
		if ( $requete->execute() ) {
			//s'il y a un résultat
			if ( $requete->rowCount() ) {

				$aResultats = $requete->fetchAll();
				$this->setNom($aResultats[0]['nom']);
				$this->setPrenomm($aResultats[0]['prenom']);
				$this->setCourriel($aResultats[0]['courriel']);
				$this->setIdUtilisateur($aResultats[0]['id']);
				$this->setTel($aResultats[0]['telephone']);
				$this->setEtat($aResultats[0]['etat']);
				$this->setMotDePasse($aResultats[0]['motDePasse']);
				$this->setTypeUtilisateur($aResultats[0]['type']);

			} else {

				//$sMsg = array('type'=>'warning', 'msg'=>'Aucune aucun utilisateur n'a été trouvé);

			}

		} else {

			throw new Exception("Erreur lors de la requete");
			//$sMsg = array('type'=>'danger', 'msg'=>'Erreur lors de la requete.');

		}
<<<<<<< HEAD
	}
	public static function emailExiste($sCourriel){
		//ouverture de la connexion
		$oPDO = new Connexion;
		
		//Réaliser la requête de recherche par le idEtudiant
		$sSQL = "SELECT * FROM utilisateurs WHERE courriel='".$sCourriel."' AND etat='actif'";
		//préparer la requête
		$requete = $oPDO->oPDO->prepare($sSQL);
		//Exécuter la requête
		if ( $requete->execute() ) {
			//s'il y a un résultat
			if ( $requete->rowCount() ) {

				return true;

			}else{
				return false;
			}
		} else {

		throw new Exception("Erreur lors de la requete");
		//$sMsg = array('type'=>'danger', 'msg'=>'Erreur lors de la requete.');

		}
	}
	public function ajouterUtilisateur(){
		//ouverture de la connexion
		$oPDO = new Connexion;

		//Réaliser la requête de recherche par le idEtudiant
		$sSQL = "INSERT INTO utilisateurs VALUES('','".$this->sNom."','".$this->sPrenom."','".$this->sCourriel."','".$this->sMotDePasse."','".$this->sTel."','".$this->sTypeUtilisateur."','".$this->sEtat."') ";
		//préparer la requête
		$requete = $oPDO->oPDO->prepare($sSQL);
		//Exécuter la requête
		if ( $requete->execute() ) {
			$_SESSION['idUser'] = $oPDO->oPDO->lastInsertId();
			header("location:index.php");
		} else {

			throw new Exception("Erreur lors de la requete");
			//$sMsg = array('type'=>'danger', 'msg'=>'Erreur lors de la requete.');
		
		}
		
		
	}
	
	public function connexionUtilisateur(){
		//ouverture de la connexion
		$oPDO = new Connexion;

		//Réaliser la requête de recherche par le idEtudiant
		$sSQL = "Select * FROM utilisateurs WHERE motDePasse='".$this->sMotDePasse."' AND courriel='".$this->sCourriel."' AND etat='actif'";
		//préparer la requête
		$requete = $oPDO->oPDO->prepare($sSQL);
		//Exécuter la requête
		if ( $requete->execute() ) {
			if ( $requete->rowCount() ) {
				$aResultats = $requete->fetchAll();

				$this->idUtilisateur=$aResultats[0]["id"];
				return true;

			}else{
				return false;
			}
		} else {

		throw new Exception("Erreur lors de la requete");
		//$sMsg = array('type'=>'danger', 'msg'=>'Erreur lors de la requete.');

		}
	}
	
	public function modifierUtilisateur(){
		//ouverture de la connexion
		$oPDO = new Connexion;

		//Réaliser la requête de recherche par le idEtudiant
		$sSQL = "
			UPDATE utilisateurs
			SET nom='".$this->getNom()."', prenom='".$this->getPrenom()."', courriel='".$this->getCourriel()."',telephone='".$this->getTel()."', motDePasse='".$this->getMotDePasse()."'
			WHERE id='".$_SESSION['idUser']."'
		";
		//préparer la requête
		$requete = $oPDO->oPDO->prepare($sSQL);
		//Exécuter la requête
		if ( $requete->execute() ) {
			if ( $requete->rowCount() ) {

				return true;

			}else{
				return false;
			}
		} else {

		throw new Exception("Erreur lors de la requete");
		//$sMsg = array('type'=>'danger', 'msg'=>'Erreur lors de la requete.');

		}

	}//Fin modifierUtilisateur
	
	public function desactiverUtilisateur(){
		//ouverture de la connexion
		$oPDO = new Connexion;

		//Réaliser la requête de recherche par le idEtudiant
		$sSQL = "
			UPDATE utilisateurs
			SET etat='inactif'
			WHERE id='".$_SESSION['idUser']."'
		";
		//préparer la requête
		$requete = $oPDO->oPDO->prepare($sSQL);
		//Exécuter la requête
		if ( $requete->execute() ) {
				unset($_SESSION['idUser']);

		
		} else {

		throw new Exception("Erreur lors de la requete");
		//$sMsg = array('type'=>'danger', 'msg'=>'Erreur lors de la requete.');

		}

	}
	
	public static function adm_ajouterUtilisateur(){
		//ouverture de la connexion
		$oPDO = new Connexion;

		//Réaliser la requête de recherche par le idEtudiant
		$sSQL = "INSERT INTO utilisateurs VALUES('','".$this->sNom."','".$this->sPrenom."','".$this->sCourriel."','".$this->sMotDePasse."','".$this->sTel."','".$this->sTypeUtilisateur."','".$this->sEtat."') ";
		//préparer la requête
		$requete = $oPDO->oPDO->prepare($sSQL);
		//Exécuter la requête
		if ( $requete->execute() ) {
			header("location:index.php");
		} else {

			throw new Exception("Erreur lors de la requete");
			//$sMsg = array('type'=>'danger', 'msg'=>'Erreur lors de la requete.');
		
		}
		
	}//Fin adm_ajouterUtilisateur()
	
	public static function adm_modifierUtilisateur(){
		//ouverture de la connexion
		$oPDO = new Connexion;

		//Réaliser la requête de recherche par le idEtudiant
		$sSQL = "
			UPDATE utilisateurs
			SET nom='".$this->getNom()."', prenom='".$this->getPrenom()."', courriel='".$this->getCourriel()."',telephone='".$this->getTel()."', motDePasse='".$this->getMotDePasse()."', type='".$this->getTypeUtilisateur()."', etat='".$this->getEtat()."'
			WHERE id='".$this->getIdUtilisateur()."'
		";
		//préparer la requête
		$requete = $oPDO->oPDO->prepare($sSQL);
		//Exécuter la requête
		if ( $requete->execute() ) {
			if ( $requete->rowCount() ) {

				return true;

			}else{
				return false;
			}
		} else {

		throw new Exception("Erreur lors de la requete");
		//$sMsg = array('type'=>'danger', 'msg'=>'Erreur lors de la requete.');

		}

	}//Fin adm_modifierUtilisateur()
	
	public static function adm_desactiverUtilisateur(){
		//ouverture de la connexion
		$oPDO = new Connexion;

		//Réaliser la requête de recherche par le idEtudiant
		$sSQL = "
			UPDATE utilisateurs
			SET etat='inactif'
			WHERE id='".$this->getIdUtilisateur."'
		";
		//préparer la requête
		$requete = $oPDO->oPDO->prepare($sSQL);
		//Exécuter la requête
		if ( $requete->execute() ) {
			return true;	

		
		} else {

			throw new Exception("Erreur lors de la requete");
		//$sMsg = array('type'=>'danger', 'msg'=>'Erreur lors de la requete.');
			return false;
		}
	}//Fin adm_desactiverUtilisateur()
	
	public static function adm_supprimerUtilisateur(){
		//ouverture de la connexion
		$oPDO = new Connexion;

		//Réaliser la requête de recherche par le idEtudiant
		$sSQL = "
			DELETE FROM 'bd_encheres'.'utilisateurs' WHERE id='".$this->getIdUtilisateur."'
		";
		//préparer la requête
		$requete = $oPDO->oPDO->prepare($sSQL);
		//Exécuter la requête
		if ( $requete->execute() ) {
			return true;	

		
		} else {

			throw new Exception("Erreur lors de la requete");
		//$sMsg = array('type'=>'danger', 'msg'=>'Erreur lors de la requete.');
			return false;
		}
	}//Fin adm_supprimerUtilisateur()
	
	public static function adm_rechercherUtilisateurs($recherche){
		//ouverture de la connexion
		$oPDO = new Connexion;

		//Réaliser la requête de recherche par le idEtudiant
		$sSQL = "
			SELECT * FROM utilisateurs WHERE 
			id LIKE'".$Recherche."' OR
			nom LIKE'".$Recherche."' OR
			prenom LIKE'".$Recherche."' OR
			courriel LIKE'".$Recherche."' OR
			type LIKE'".$Recherche."' OR
			etat LIKE'".$Recherche."'";
		//préparer la requête
		$requete = $oPDO->oPDO->prepare($sSQL);
		//Exécuter la requête
		if ( $requete->execute() ) {
			//s'il y a un résultat
			if ( $requete->rowCount() ) {

				$aResultats = $requete->fetchAll();
				for($i=0 ;$i<count($aResultats); $i++){
					
					$aoUtilisateur[$i] = new Utilisateur($aResultats['id'], $aResultats['nom'], $aResultats['prenom'], $aResultats['courriel'], $aResultats['motDePasse'], $aResultats['telephone'], $aResultats['type'], $aResultats['etat']);
					
					return $aoUtilisateur;
					
				}

			} else {

				//$sMsg = array('type'=>'warning', 'msg'=>'Aucune aucun utilisateur n'a été trouvé);

			}
		}


	}//Fin adm_rechercherUtilisateur()
	
	public function adm_connexion(){
		//ouverture de la connexion
		$oPDO = new Connexion;

		//Réaliser la requête de recherche par le idEtudiant
		$sSQL = "Select * FROM utilisateurs WHERE motDePasse='".$this->sMotDePasse."' AND courriel='".$this->sCourriel."' AND type='admin'";
		//préparer la requête
		$requete = $oPDO->oPDO->prepare($sSQL);
		//Exécuter la requête
		if ( $requete->execute() ) {
			if ( $requete->rowCount() ) {
				$aResultats = $requete->fetchAll();

				$this->idUtilisateur=$aResultats[0]["id"];
				return true;

			}else{
				return false;
			}
		} else {

		throw new Exception("Erreur lors de la requete");
		//$sMsg = array('type'=>'danger', 'msg'=>'Erreur lors de la requete.');

		}

	}//fin adm_connexion();
}
=======

		}


	}
>>>>>>> upstream/master
