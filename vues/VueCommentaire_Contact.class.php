<?php
/**
 * @classe VueCommentaire_Contact VueCommentaire_Contact.class.php "classes/VueCommentaire_Contact.class.php"
 * @version 0.0.1
 * @date 2014-10-25
 * @author Gader Eskander
 * @brief Affiche des Commentaires.
 * @details Permet d'afficher le contenu des Commentaires pour un enchère.
 */
 
class VueCommentaire_Contact {

	
	/**
	 * Côté administrateur - Afficher la liste de tous les Commentaires et les contact 
	 * @param array $aCommentaires tableau d'objets Cmmentaire
	 */
	public static function admi_afficherCommentaire_contact($aCommentaires, $aContacts) {
		// Inclu les morceaux de pages, dont les metas, l'entete, la navigation .
		Vue::head('Commentaires et Contactes', 'Page pour gérer les commentaires et les contacts ','commentaire.css');
		Vue::header('Ma recherche');
		Vue::nav();
		echo '
  			<main>
			<article id="Commont_Contact" >
				<article class="row">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs Tab_commentaires" role="tablist">
						<li class="active">
							<a href="#Tous_commentaires" role="tab" data-toggle="tab">Commentaires</a>
						</li>
						<li>
							<a href="#Tous_Contacts" role="tab" data-toggle="tab">Contacts</a>
						</li>
					</ul>
					<!-- Tab panes -->
					<article class="tab-content">

						<article class="tab-pane active" id="Tous_commentaires" >
							<article class="media icon_commenter">
								<article class="media-body">

									<!-- Début Affichage_commentaires-->
									<table class="table table-bordered  table-striped table-condensed">
										<thead>
											<tr>
												<th class="bg-info text-center">Nom</th>
												<th class="bg-info text-center">Commentaires</th>
												<th class="bg-info text-center Danger">Abus</th>
												<th class="bg-info text-center">Supprimer</th>
											</tr>
										</thead>
										
										<tbody>';
											for ($iComm = 0; $iComm < count($aCommentaires); $iComm++)
											{
												echo '<tr ><td class=\" text-center\">Sami</td>';
												echo '<td>'.$aCommentaires[$iComm] -> getCorpsCommentaire().'</td>';
												echo "<td class='Danger text-center' text-center>".$aCommentaires[$iComm] -> getAbus()."</td>";
												echo "<td class=\" text-center\">
														<button class=\"btn-default\" type=\"submit\">
													 	 <a href=index.php?page=".$_GET['page']."&action=supCommentair&idCommentaire=".$aCommentaires[$iComm] -> getIdCommentaire()."> Supprimer</a>
													 	</button>
													  </td>
													 </tr>";
											}
										echo'</tbody>
										</table>
									
									</article>
								</article>
						</article>
						<!-- Fin Affichage_commentaires-->

						<!-- Début Affichage Tous_Contacts-->
						<article class="tab-pane" id="Tous_Contacts">
							<table class="table table-bordered  table-striped table-condensed">
							
								<thead>
									<tr>
										<th class="bg-success text-center ">Nom</th>
										<th class="bg-success text-center">Messages</th>
										<th class="bg-success">Supprimer</th>
									</tr>
								</thead>
								
								<tbody>';
										for ($iCont = 0; $iCont < count($aContacts); $iCont++)
										{
										echo '	<tr><td>Pouline</td>';
									echo '<td>'.$aContacts[$iCont] -> getMessage().'</td>';
										echo "<td>
													<button class=\"btn-default\" type=\"submit\">
												 	 <a href=index.php?page=".$_GET['page']."&action=supContact&idContact=".$aContacts[$iComm] -> getIdContact()."> Supprimer</a>
												 	</button>
												  </td>
												 </tr>";
										}

								echo'</tbody>
							</table>
						</article>
						<!-- Fin Affichage Tous_Contacts-->
					</article>
				</article>
				</article>
		</main>
		<!-- -------------Fin Main------------------->
		';
	Vue::footer();
		
	}

}
