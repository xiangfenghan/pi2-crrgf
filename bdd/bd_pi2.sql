-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 28 Octobre 2014 à 04:52
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bd_pi2`
--

-- --------------------------------------------------------

--
-- Structure de la table `pi2_commentaires`
--

CREATE TABLE IF NOT EXISTS `pi2_commentaires` (
  `idCommentaire` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `corpsCommentaire` text,
  `dateCommentaire` varchar(100) NOT NULL,
  `abus` varchar(20) DEFAULT NULL,
  `utilisateur_id` int(10) unsigned NOT NULL,
  `enchere_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idCommentaire`),
  KEY `fk_Commentaires_Utilisateurs1_idx` (`utilisateur_id`),
  KEY `fk_Commentaires_Encheres1_idx` (`enchere_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `pi2_commentaires`
--

INSERT INTO `pi2_commentaires` (`idCommentaire`, `corpsCommentaire`, `dateCommentaire`, `abus`, `utilisateur_id`, `enchere_id`) VALUES
(19, 'Bost quorum necem nihilo lenius ferociens Gallus u...', '23-Oct-2014, 0:29', NULL, 1, 6),
(20, 'Aecem nihilo lenius ferociens Gallus ut leo cadave...', '23-Oct-2014, 0:45', 'Abus', 1, 7),
(23, 'Some dummy text', '', 'Non', 1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `pi2_contacts`
--

CREATE TABLE IF NOT EXISTS `pi2_contacts` (
  `idContact` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomContact` varchar(100) NOT NULL,
  `prenomContact` varchar(100) NOT NULL,
  `courriel` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `dateContact` varchar(100) DEFAULT NULL,
  `statut` varchar(50) NOT NULL,
  PRIMARY KEY (`idContact`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `pi2_contacts`
--

INSERT INTO `pi2_contacts` (`idContact`, `nomContact`, `prenomContact`, `courriel`, `message`, `dateContact`, `statut`) VALUES
(1, 'Gader', 'ESKANDER', 'skandergader@yahoo.fr', 'Post quorum necem nihilo lenius ferociens Gallus u...', '23-Oct-2014, 0:29', 'Reponse'),
(2, 'TOTO', 'TATI', 'tototati@gmail.com', 'Quorum necem nihilo lenius ferociens Gallus ut leo...', '23-Oct-2014, 0:29', ''),
(5, 'adad', 'adfa', 'adfad@aaa', ' dbvbxcvbx', '28-Oct-2014 , 1:59', '');

-- --------------------------------------------------------

--
-- Structure de la table `pi2_encheres`
--

CREATE TABLE IF NOT EXISTS `pi2_encheres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(70) NOT NULL,
  `prixDebut` decimal(9,2) unsigned NOT NULL,
  `prixFin` decimal(9,2) unsigned NOT NULL,
  `prixIncrement` decimal(9,2) unsigned NOT NULL,
  `prixDirecte` decimal(9,2) unsigned DEFAULT NULL,
  `dateDebut` datetime NOT NULL,
  `dateFin` datetime DEFAULT NULL,
  `etat` enum('fermée','ouverte') NOT NULL DEFAULT 'ouverte',
  `utilisateur_id` int(10) unsigned NOT NULL,
  `oeuvre_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Encheres_Utilisateurs1_idx` (`utilisateur_id`),
  KEY `fk_Encheres_Oeuvres1_idx` (`oeuvre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `pi2_encheres`
--

INSERT INTO `pi2_encheres` (`id`, `titre`, `prixDebut`, `prixFin`, `prixIncrement`, `prixDirecte`, `dateDebut`, `dateFin`, `etat`, `utilisateur_id`, `oeuvre_id`) VALUES
(5, 'portrait', '0.00', '100.00', '0.00', '1000.00', '2014-10-02 00:00:00', '2014-11-29 00:00:00', 'ouverte', 1, 2),
(6, 'paysage', '0.00', '100.00', '0.00', NULL, '2014-10-02 00:00:00', '2014-11-22 00:00:00', 'ouverte', 2, 1),
(7, 'marine', '0.00', '20.00', '0.00', '200.00', '2014-10-02 00:00:00', '2014-10-05 00:00:00', 'fermée', 1, 1),
(8, 'composition', '0.00', '30.00', '0.00', NULL, '2014-10-02 00:00:00', '2014-10-31 00:00:00', 'fermée', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `pi2_encheresgagnees`
--

CREATE TABLE IF NOT EXISTS `pi2_encheresgagnees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int(10) unsigned NOT NULL,
  `enchere_id` int(10) unsigned NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_EncheresGagnees_Encheres1_idx` (`enchere_id`),
  KEY `fk_EncheresGagnees_Utilisateurs1_idx` (`utilisateur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `pi2_oeuvres`
--

CREATE TABLE IF NOT EXISTS `pi2_oeuvres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(60) NOT NULL,
  `description` varchar(255) NOT NULL,
  `dimension` varchar(32) NOT NULL,
  `poids` decimal(5,2) NOT NULL,
  `mediaUrl` varchar(70) NOT NULL,
  `etat` enum('disponible','en enchere','vendue','supprimé') NOT NULL DEFAULT 'disponible',
  `technique_id` int(10) unsigned NOT NULL,
  `theme_id` int(10) unsigned NOT NULL,
  `utilisateur_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Oeuvres_Techniques1_idx` (`technique_id`),
  KEY `fk_Oeuvres_Themes1_idx` (`theme_id`),
  KEY `fk_Oeuvres_Utilisateurs1_idx` (`utilisateur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `pi2_oeuvres`
--

INSERT INTO `pi2_oeuvres` (`id`, `titre`, `description`, `dimension`, `poids`, `mediaUrl`, `etat`, `technique_id`, `theme_id`, `utilisateur_id`) VALUES
(1, 'Douceur de la nuit', 'Quae et sororem cum existimabat maritus ad suam so...', '70x140', '250.00', '../medias/douceurNuit.jpg', 'en enchere', 2, 1, 1),
(2, 'Faune et Flore', 'Se est cum verbum legant Latinas qui Latinas verbu...', '80x130', '300.00', '../medias/fauneFlore.jpg', 'disponible', 4, 2, 2),
(3, 'Douceur de la nuit', 'Conloquiis scriptis deliberanti conloquiis proximis pertinacius acciri antequam simulationem pertinacius convellere codicem auxilio eique destitutus.', '75x200', '150.00', '../medias/douceurNuit.jpg', 'en enchere', 3, 3, 2),
(4, 'Faune et Flore', 'Quoddam definiunt tradunt humanarum etiam aliquotiens quaedam definiunt lunari potentia mentium quaedam filiam abdita vel.', '85x140', '175.00', '../medias/fauneFlore.jpg', 'en enchere', 3, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `pi2_offres`
--

CREATE TABLE IF NOT EXISTS `pi2_offres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `montant` decimal(9,2) unsigned NOT NULL,
  `date` datetime NOT NULL,
  `enchere_id` int(10) unsigned NOT NULL,
  `utilisateur_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Offres_Encheres1_idx` (`enchere_id`),
  KEY `fk_Offres_Utilisateurs1_idx` (`utilisateur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `pi2_techniques`
--

CREATE TABLE IF NOT EXISTS `pi2_techniques` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `pi2_techniques`
--

INSERT INTO `pi2_techniques` (`id`, `nom`) VALUES
(1, 'acrylique'),
(2, 'peinture a l''huile'),
(3, 'gouache'),
(4, 'aquarelle'),
(5, 'mixte');

-- --------------------------------------------------------

--
-- Structure de la table `pi2_themes`
--

CREATE TABLE IF NOT EXISTS `pi2_themes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `pi2_themes`
--

INSERT INTO `pi2_themes` (`id`, `nom`) VALUES
(1, 'classique'),
(2, 'moderne'),
(3, 'abstrait');

-- --------------------------------------------------------

--
-- Structure de la table `pi2_utilisateurs`
--

CREATE TABLE IF NOT EXISTS `pi2_utilisateurs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `courriel` varchar(70) NOT NULL,
  `motDePasse` varchar(60) NOT NULL,
  `telephone` varchar(14) DEFAULT NULL,
  `type` enum('membre','admin') NOT NULL DEFAULT 'membre',
  `etat` enum('inactif','actif') NOT NULL DEFAULT 'actif',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `pi2_utilisateurs`
--

INSERT INTO `pi2_utilisateurs` (`id`, `nom`, `prenom`, `courriel`, `motDePasse`, `telephone`, `type`, `etat`) VALUES
(1, 'Max', 'William', 'aa@a', '1234', '123-123', 'membre', 'actif'),
(2, 'Marceau', 'Sophie', 'bb@cc', '1324', '23454a', 'membre', 'actif'),
(3, 'hjflf', 'jhjkb', 'a@a.com', '1234', 'bkbkj', 'membre', 'inactif'),
(4, 'aab', 'aa', 'aaa@a', '1234', 'aa', 'membre', 'actif');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `pi2_commentaires`
--
ALTER TABLE `pi2_commentaires`
  ADD CONSTRAINT `fk_Commentaires_Encheres1` FOREIGN KEY (`enchere_id`) REFERENCES `pi2_encheres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Commentaires_Utilisateurs1` FOREIGN KEY (`utilisateur_id`) REFERENCES `pi2_utilisateurs` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `pi2_encheres`
--
ALTER TABLE `pi2_encheres`
  ADD CONSTRAINT `fk_Encheres_Oeuvres1` FOREIGN KEY (`oeuvre_id`) REFERENCES `pi2_oeuvres` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Encheres_Utilisateurs1` FOREIGN KEY (`utilisateur_id`) REFERENCES `pi2_utilisateurs` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `pi2_encheresgagnees`
--
ALTER TABLE `pi2_encheresgagnees`
  ADD CONSTRAINT `fk_EncheresGagnees_Encheres1` FOREIGN KEY (`enchere_id`) REFERENCES `pi2_encheres` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_EncheresGagnees_Utilisateurs1` FOREIGN KEY (`utilisateur_id`) REFERENCES `pi2_utilisateurs` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `pi2_oeuvres`
--
ALTER TABLE `pi2_oeuvres`
  ADD CONSTRAINT `fk_Oeuvres_Techniques1` FOREIGN KEY (`technique_id`) REFERENCES `pi2_techniques` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Oeuvres_Themes1` FOREIGN KEY (`theme_id`) REFERENCES `pi2_themes` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Oeuvres_Utilisateurs1` FOREIGN KEY (`utilisateur_id`) REFERENCES `pi2_utilisateurs` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `pi2_offres`
--
ALTER TABLE `pi2_offres`
  ADD CONSTRAINT `fk_Offres_Encheres1` FOREIGN KEY (`enchere_id`) REFERENCES `pi2_encheres` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Offres_Utilisateurs1` FOREIGN KEY (`utilisateur_id`) REFERENCES `pi2_utilisateurs` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
