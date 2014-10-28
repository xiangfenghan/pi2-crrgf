<?php
/**
 * @classe VueContact VueContact.class.php "classes/VueContact.class.php"
 * @version 0.0.1
 * @date 2014-10-25
 * @author Gader Eskander
 * @brief Affiche des Commentaires.
 * @details Permet d'afficher le contenu des Commentaires pour un enchère.
 */

class VueCommentaire {

	public static function afficherFormPoserUnCommentaires($IdConnecte)
	{
		/** il faut passer pour la fonction le param. $oUtilisateur
		* $Nom= $oUtilisateur ->getNom();
		 * $Prenom= $oUtilisateur ->getPrenom();
		 * $nom_prenom= $Nom . $Prenom;
		 * $IdConnecte=$oUtilisateur-> getIdUtilisateur();
		 *
		*/

		echo '
		<article class="col-xs-12 col-sm-10 col-sm-offset-1   icon_commenter ">
			<article class="row commentaires">
				<section class=" col-sm-2 col-xs-12">
					<div class="text-center ">
						<p><span class="glyphicon glyphicon-user"></span></p>
						<p class="icon_pos_comm">Gader Eskander</p>
					</div>
				</section>
				<section class=" col-sm-10 col-xs-12">
				<form class=" form-horizontal " action="index.php?page='.$_GET["page"].'&action=ajouCommentaire&idUtilisateur='.$IdConnecte.'" method="post">
						<fieldset>
							<legend ><a href="index.php?page=.$_GET["page"].&action=instruction_commentaire">Consignes sur les commentaires</a></legend>
								<article class="clearfix">
								<textarea rows="3" name="txtCommentaire" id="commentaire"  ></textarea>
								</article>

								<input class="btn-primary  pull-right" type="submit" name="cmd" value="Publier">
						</fieldset>
					</form>
				</section>
			</article>
		</article>';
	}//Fin afficherFormPoserUnCommentaires()


	/**
	 * Côté internaute - Afficher la liste de tous les Commentaires
	 * @param array $aCommentaires tableau d'objets Cmmentaire
	 */
	public static function afficherListeCommentaires($aCmmentaires,$IdConnecte)
	{
		if (count($aCmmentaires) <= 0 && !empty($aMsg['sMsg'])) {
			echo "<p>Aucun Commentaire n'est disponible. Veuillez en ajouter un.</p>";
			return;
		}
		else {

			 $aMsg = array();
			for ($iComm = 0; $iComm < count($aCmmentaires); $iComm++)
			{
				$IdUtilisateur= $aCmmentaires[$iComm] -> getIdUtilisateur();
				// $oUtilisateur= new Utilisateur($IdUtilisateur);
				// $oUtilisateur ->rechercherUnUtilisateur();
				// $Nom= $oUtilisateur ->getNom();
				// $Prenom= $oUtilisateur ->getPrenom();
				if($IdUtilisateur==$IdConnecte)
				{
					$aMsg['titre'] = "Supprimer";
				}else{
					$aMsg['titre'] = "Signaler un abus";
				}

				echo '
					<article class="col-xs-12 col-sm-10 col-sm-offset-1 icon_commenter ">
						<article class="row comment_afficher">
							<section class=" col-sm-2 col-xs-12">
								<div class="text-center ">
									<p><span class="glyphicon glyphicon-user"></span></p>
									<p class="Nom_prenom">Gader Eskander</p>
								</div>
							</section>
							<section  class=" col-sm-10 col-xs-12">
								<p >'.$aCmmentaires[$iComm] -> getDateCommentaire().' <a class="abus" href="index.php?page='.$_GET['page'].'&action='.$aMsg['titre'].'"> | '.$aMsg['titre'].' </a></p>

								<p>'.$aCmmentaires[$iComm] -> getCorpsCommentaire().'</p>
							</section>
						</article>
					</article>';
			}
				echo '
					<!-- Fin Affichage_commentaires-->';
		}

	}//Fin afficherListeCommentaires


	/**
	 * Côté administrateur - Afficher la liste de tous les Commentaires
	 * @param array $aCommentaires tableau d'objets Cmmentaire
	 */
	public static function admi_afficherCommentaire() {

	}

}
