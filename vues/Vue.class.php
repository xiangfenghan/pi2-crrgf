<?php
/**
 * @classe Vues Vues.class.php "classes/Vues.class.php"
 * @version 0.0.1
 * @date 2014-10-17
 * @author Eric Revelle
 * @brief Affiche les différentes parties communes aux pages.
 * @details Permet d'afficher les parties communes de toutes les pages
 * comme l'entete, le pied de page, la naviagtion et les asides.
 */
class Vue {

	public function head(){

		echo "L'entete du document";

	}

	public function nav(){

		echo "La navigation principale.";

	}

	public function footer(){

		echo "Le pied de page du document.";

	}

}