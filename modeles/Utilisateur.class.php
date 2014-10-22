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
	private $sTelRes;
	private $sTelMob;
	private $sTypeUtilisateur;
	
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
	public function __construct($idUtilisateur=0, $sNom=" ", $sPrenom=" ", $sCourriel=" ", $MotDePasse=" ",$sTelRes=" ", $sTelMob=" ",$sTypeUtilisateur=" " ){
		$this->setIdEtudiant($idUtilisateur);
		$this->setNom($sNom);
		$this->setPrenom($sPrenom);
		$this->setCourriel($sCourriel);
		$this->setMotDePasse($MotDePasse);
		$this->setTelRes($sTelRes);
		$this->setTelMob($sTelMob);
		$this->setTypeUtilisateur($sTypeUtilisateur);
		
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
		TypeException::estCourriel($sCourriel);
		$this->sCourriel = $sCourriel;
	}
	/**
	 * @param integer $idUtilisateur
	 */
	public function setIdUtilisateurt($idUtilisateur){
		TypeException::estNumerique($idUtilisateur);
		
		$this->idUtilisateur = $idUtilisateur;
	}
	/*TODO 
	set TelRes
	set TelMob
	set Motdepasse
	set TypeUtilisatur
	
	*/
	
	/**
	 * @param array $aDossiers
	 */
	public function setDossiers($aDossiers){
		TypeException::estArray($aDossiers);
		
		$this->aDossiers = $aDossiers;
	}
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
	public function getTelRes(){
		return $this->sTelRes;
	}
	/**
	 * @return string $TelMob
	 */
	public function getTelMob(){
		return $this->sTelMob;
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
				$this->setNom($aResultats[0]['sNom']);
				$this->setPrenomm($aResultats[0]['sPrenom']);
				$this->setCourriel($aResultats[0]['sCourriel']);
				$this->setIdUtilisateur($aResultats[0]['idUtilisateur']);
				$this->setTelRes($aResultats[0]['sTelRes']);
				$this->setTelMob($aResultats[0]['sTelMob']);
				$this->setMotDePasse($aResultats[0]['sMotDePasse']);
				$this->setTypeUtilisateur($aResultats[0]['sTypeUtilisateur']);

			} else {

				//$sMsg = array('type'=>'warning', 'msg'=>'Aucune aucun utilisateur n'a été trouvé);

			}

		} else {

			throw new Exception("Erreur lors de la requete");
			//$sMsg = array('type'=>'danger', 'msg'=>'Erreur lors de la requete.');

		}
			
		}
	
	 
	}