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
	
	/* Propriétés privées */
	private $idUtilisateur;
	private $sNom;
	private $sPrenom;
	private $sCourriel;
	private $sMotDePasse;
	private $sTel;
	private $sTypeUtilisateur;
	private $sEtat
	
	/**
	 * variable qui provient de la relation de composition
	 * entre la classe Dossier et la classe Etudiant
	 */
	
	
	/**
	 * Constructeur
	 * @param integer $idEtudiant
	 * @param string $sNom
	 * @param string $sPrenom
	 * @param integer $iAge
	 */
	public function __construct($idUtilisateur=0, $sNom=" ", $sPrenom=" ", $sCourriel=" ", $MotDePasse=" ",$sTel=" ",$sTypeUtilisateur="membre",$sEtat="actif" ){
		$this->setIdEtudiant($idUtilisateur);
		$this->setNom($sNom);
		$this->setPrenom($sPrenom);
		$this->setCourriel($sCourriel);
		$this->setMotDePasse($MotDePasse);
		$this->setTel($sTel);
		$this->setTypeUtilisateur($sTypeUtilisateur);
		$this->setEtat($sEtat);
		
	} //fin du constructeur
	
	/* Affectation */
	/**
	 *  * @param string $sNom
	 */
	public function setNom($sNom){
		TypeException::estString($sNom);
		TypeException::estVide($sNom);
		
		$this->sNom = $sNom;
	}
	/**
	 * @param string $sPrenom
	 */
	public function setPrenom($sPrenom){
		TypeException::estString($sPrenom);
		TypeException::estVide($sPrenom);
		
		$this->sPrenom = $sPrenom;
	}
	/**
	 * @param string $sCourriel
	 */
	public function setCourriel($sCourriel){
		TypeException::eststring($sCourriel);
		TypeException::estVide($sPrenom);

		$this->sCourriel = $sCourriel;
	}
	/**
	 * @param integer $idUtilisateur
	 */
	public function setIdUtilisateurt($idUtilisateur){
		TypeException::estNumerique($idUtilisateur);
		
		$this->idUtilisateur = $idUtilisateur;
	}
	/**
	* @param string $sTel
	*/
	public function setTel($sTel){
		TypeException::estString($sTel);
		TypeException::estVide($sTel);
	}
	/**
	* @param string $sTypeUtilisateur
	*/
	public function setTypeUtilisateur($sTypeUtilisateur){
		TypeException::estString($sTypeUtilisateur);
		TypeException::estVide($sPrenom);

	}
	/**
	* @param string $sEtat
	*/
	public function setEtat($sEtat){
		TypeException::estString($sEtat);		
		TypeException::estVide($sPrenom);

	}
	/**
	* @param string $sMotDePasse
	*/
	public function setMotDePasse($sMotDePasse){

		TypeException::estVide($sPrenom);

	}

	
	/**
	 * @param array $aDossiers
	 */
	/*public function setDossiers($aDossiers){
		TypeException::estArray($aDossiers);
		
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
		return $this->sMotdePasse;
	}
	/**
	 * @return string $sTelRes
	 */
	public function getTel(){
		return $this->sTelRes;
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
	
	
	/**
	 * Rechercher un utilisateur par son idUtilisateur
	 * @return boolean true si l'enregistrement est trouvé dans la BDD
	 * false dans tous les autres cas
	 */
	function rechercherUnUtilisateur(){
		//Réaliser la requête de recherche par le idEtudiant
		$sSQL = "SELECT * FROM utilisateurs WHERE idUtilisateur=".$this->getIdUtilisateur();
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
			
		}
	
	 
	}