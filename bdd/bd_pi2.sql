<<<<<<< HEAD
CREATE DATABASE  IF NOT EXISTS `e1395672` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `e1395672`;
=======
CREATE DATABASE  IF NOT EXISTS `bd_pi2` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bd_pi2`;
>>>>>>> Integration_beta3
-- MySQL dump 10.13  Distrib 5.6.13, for osx10.6 (i386)
--
-- Host: 127.0.0.1    Database: bd_pi2
-- ------------------------------------------------------
-- Server version	5.6.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `pi2_commentaires`
--

DROP TABLE IF EXISTS `pi2_commentaires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pi2_commentaires` (
  `idCommentaire` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `corpsCommentaire` text,
  `dateCommentaire` varchar(100) NOT NULL,
  `abus` varchar(20) DEFAULT NULL,
  `utilisateur_id` int(10) unsigned NOT NULL,
  `enchere_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idCommentaire`),
  KEY `fk_Commentaires_Utilisateurs1_idx` (`utilisateur_id`),
  KEY `fk_Commentaires_Encheres1_idx` (`enchere_id`),
<<<<<<< HEAD
  CONSTRAINT `fk_Commentaires_Encheres1` FOREIGN KEY (`enchere_id`) REFERENCES `pi2_encheres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
=======
  CONSTRAINT `fk_Commentaires_Encheres1` FOREIGN KEY (`enchere_id`) REFERENCES `pi2_encheres` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
>>>>>>> Integration_beta3
  CONSTRAINT `fk_Commentaires_Utilisateurs1` FOREIGN KEY (`utilisateur_id`) REFERENCES `pi2_utilisateurs` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pi2_commentaires`
--

LOCK TABLES `pi2_commentaires` WRITE;
/*!40000 ALTER TABLE `pi2_commentaires` DISABLE KEYS */;
<<<<<<< HEAD
INSERT INTO `pi2_commentaires` VALUES (19,'Bost quorum necem nihilo lenius ferociens Gallus u...','23-Oct-2014, 0:29',NULL,1,6),(20,'Aecem nihilo lenius ferociens Gallus ut leo cadave...','23-Oct-2014, 0:45','Abus',1,7),(23,'Some dummy text','','Non',1,6);
=======
INSERT INTO `pi2_commentaires` VALUES (19,'Bost quorum necem nihilo lenius ferociens Gallus u...','23-Oct-2014, 0:29',NULL,1,6),(23,'Some dummy text','','Non',1,6);
>>>>>>> Integration_beta3
/*!40000 ALTER TABLE `pi2_commentaires` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pi2_contacts`
--

DROP TABLE IF EXISTS `pi2_contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pi2_contacts` (
  `idContact` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomContact` varchar(100) NOT NULL,
  `prenomContact` varchar(100) NOT NULL,
  `courriel` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `dateContact` varchar(100) DEFAULT NULL,
  `statut` varchar(50) NOT NULL,
  PRIMARY KEY (`idContact`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pi2_contacts`
--

LOCK TABLES `pi2_contacts` WRITE;
/*!40000 ALTER TABLE `pi2_contacts` DISABLE KEYS */;
INSERT INTO `pi2_contacts` VALUES (1,'Gader','ESKANDER','skandergader@yahoo.fr','Post quorum necem nihilo lenius ferociens Gallus u...','23-Oct-2014, 0:29','Reponse'),(2,'TOTO','TATI','tototati@gmail.com','Quorum necem nihilo lenius ferociens Gallus ut leo...','23-Oct-2014, 0:29',''),(5,'adad','adfa','adfad@aaa',' dbvbxcvbx','28-Oct-2014 , 1:59','');
/*!40000 ALTER TABLE `pi2_contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pi2_encheres`
--

DROP TABLE IF EXISTS `pi2_encheres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pi2_encheres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(70) NOT NULL,
  `prixDebut` decimal(9,2) unsigned NOT NULL,
  `prixFin` decimal(9,2) unsigned NOT NULL,
  `prixIncrement` decimal(9,2) unsigned NOT NULL,
  `prixDirecte` decimal(9,2) unsigned DEFAULT NULL,
  `dateDebut` datetime NOT NULL,
  `dateFin` datetime DEFAULT NULL,
<<<<<<< HEAD
  `etat` enum('fermée','ouverte') NOT NULL DEFAULT 'ouverte',
=======
  `etat` varchar(45) NOT NULL DEFAULT 'ouverte',
>>>>>>> Integration_beta3
  `utilisateur_id` int(10) unsigned NOT NULL,
  `oeuvre_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Encheres_Utilisateurs1_idx` (`utilisateur_id`),
  KEY `fk_Encheres_Oeuvres1_idx` (`oeuvre_id`),
  CONSTRAINT `fk_Encheres_Oeuvres1` FOREIGN KEY (`oeuvre_id`) REFERENCES `pi2_oeuvres` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_Encheres_Utilisateurs1` FOREIGN KEY (`utilisateur_id`) REFERENCES `pi2_utilisateurs` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
=======
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
>>>>>>> Integration_beta3
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pi2_encheres`
--

LOCK TABLES `pi2_encheres` WRITE;
/*!40000 ALTER TABLE `pi2_encheres` DISABLE KEYS */;
<<<<<<< HEAD
INSERT INTO `pi2_encheres` VALUES (5,'portrait',50.00,100.00,10.00,300.00,'2014-10-28 00:00:00','2014-10-30 00:00:00','fermée',1,4),(6,'paysage',25.00,100.00,5.00,100.00,'2014-10-28 00:00:00','2014-11-01 00:00:00','fermée',2,1),(7,'marine',75.00,0.00,5.00,200.00,'2014-10-28 00:00:00','2014-10-28 23:05:00','fermée',2,3),(8,'composition',150.00,180.00,10.00,500.00,'2014-10-28 00:00:00','2014-10-30 00:00:00','fermée',2,1);
=======
INSERT INTO `pi2_encheres` VALUES (6,'paysage',25.00,180.00,5.00,10000.00,'2014-10-28 00:00:00','2014-11-04 00:00:00','ouverte',2,2),(9,'Phoseidon',20.00,20.00,5.00,1000.00,'2014-10-30 22:19:48','2014-11-02 22:19:48','fermée',1,5),(24,'Rainbow',20.00,70.00,5.00,2000.00,'2014-10-30 23:20:57','2014-10-31 20:15:00','fermée',1,6),(27,'TeddingtonTon',40.00,40.00,5.00,2000.00,'2014-11-01 16:03:47','2014-11-08 16:03:47','ouverte',2,4);
>>>>>>> Integration_beta3
/*!40000 ALTER TABLE `pi2_encheres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pi2_encheresgagnees`
--

DROP TABLE IF EXISTS `pi2_encheresgagnees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pi2_encheresgagnees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int(10) unsigned NOT NULL,
  `enchere_id` int(10) unsigned NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
<<<<<<< HEAD
=======
  UNIQUE KEY `enchere_id_UNIQUE` (`enchere_id`),
>>>>>>> Integration_beta3
  KEY `fk_EncheresGagnees_Encheres1_idx` (`enchere_id`),
  KEY `fk_EncheresGagnees_Utilisateurs1_idx` (`utilisateur_id`),
  CONSTRAINT `fk_EncheresGagnees_Encheres1` FOREIGN KEY (`enchere_id`) REFERENCES `pi2_encheres` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_EncheresGagnees_Utilisateurs1` FOREIGN KEY (`utilisateur_id`) REFERENCES `pi2_utilisateurs` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
<<<<<<< HEAD
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
=======
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
>>>>>>> Integration_beta3
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pi2_encheresgagnees`
--

LOCK TABLES `pi2_encheresgagnees` WRITE;
/*!40000 ALTER TABLE `pi2_encheresgagnees` DISABLE KEYS */;
<<<<<<< HEAD
=======
INSERT INTO `pi2_encheresgagnees` VALUES (5,4,24,'2014-10-31 16:30:51');
>>>>>>> Integration_beta3
/*!40000 ALTER TABLE `pi2_encheresgagnees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pi2_oeuvres`
--

DROP TABLE IF EXISTS `pi2_oeuvres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pi2_oeuvres` (
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
  KEY `fk_Oeuvres_Utilisateurs1_idx` (`utilisateur_id`),
  CONSTRAINT `fk_Oeuvres_Techniques1` FOREIGN KEY (`technique_id`) REFERENCES `pi2_techniques` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_Oeuvres_Themes1` FOREIGN KEY (`theme_id`) REFERENCES `pi2_themes` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_Oeuvres_Utilisateurs1` FOREIGN KEY (`utilisateur_id`) REFERENCES `pi2_utilisateurs` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
=======
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
>>>>>>> Integration_beta3
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pi2_oeuvres`
--

LOCK TABLES `pi2_oeuvres` WRITE;
/*!40000 ALTER TABLE `pi2_oeuvres` DISABLE KEYS */;
<<<<<<< HEAD
INSERT INTO `pi2_oeuvres` VALUES (1,'Douceur de la nuit','Quae et sororem cum existimabat maritus ad suam so...','70x140',250.00,'../medias/douceurNuit.jpg','en enchere',2,1,2),(2,'Faune et Flore','Se est cum verbum legant Latinas qui Latinas verbu...','80x130',300.00,'../medias/fauneFlore.jpg','disponible',4,2,2),(3,'Douceur de la nuit','Conloquiis scriptis deliberanti conloquiis proximis pertinacius acciri antequam simulationem pertinacius convellere codicem auxilio eique destitutus.','75x200',150.00,'../medias/douceurNuit.jpg','en enchere',3,3,2),(4,'Faune et Flore','Quoddam definiunt tradunt humanarum etiam aliquotiens quaedam definiunt lunari potentia mentium quaedam filiam abdita vel.','85x140',175.00,'../medias/fauneFlore.jpg','en enchere',3,2,1);
=======
INSERT INTO `pi2_oeuvres` VALUES (1,'Douceur de la nuit','Quae et sororem cum existimabat maritus ad suam so...','70x140',250.00,'../medias/douceurNuit.jpg','disponible',2,1,1),(2,'Faune et Flore','Se est cum verbum legant Latinas qui Latinas verbu...','80x130',300.00,'../medias/fauneFlore.jpg','en enchere',4,2,2),(3,'Douceur de la nuit','Conloquiis scriptis deliberanti conloquiis proximis pertinacius acciri antequam simulationem pertinacius convellere codicem auxilio eique destitutus.','75x200',150.00,'../medias/douceurNuit.jpg','disponible',3,3,3),(4,'Tedding','Quoddam definiunt tradunt humanarum etiam aliquotiens quaedam definiunt lunari potentia mentium quaedam filiam abdita vel.','85x140',175.00,'../medias/teddington.jpg','en enchere',3,2,2),(5,'Phoseidon','description ici','12x30',10.00,'../medias/phoseidon.jpg','disponible',1,3,4),(6,'Rainbow','rainbow rainbow rainbow rainbow rainbow rainbow rainbow','20x120',15.00,'../medias/rainbow.jpg','vendue',3,2,1);
>>>>>>> Integration_beta3
/*!40000 ALTER TABLE `pi2_oeuvres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pi2_offres`
--

DROP TABLE IF EXISTS `pi2_offres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pi2_offres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `montant` decimal(9,2) unsigned NOT NULL,
  `date` datetime NOT NULL,
  `enchere_id` int(10) unsigned NOT NULL,
  `utilisateur_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Offres_Encheres1_idx` (`enchere_id`),
  KEY `fk_Offres_Utilisateurs1_idx` (`utilisateur_id`),
  CONSTRAINT `fk_Offres_Encheres1` FOREIGN KEY (`enchere_id`) REFERENCES `pi2_encheres` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_Offres_Utilisateurs1` FOREIGN KEY (`utilisateur_id`) REFERENCES `pi2_utilisateurs` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
=======
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
>>>>>>> Integration_beta3
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pi2_offres`
--

LOCK TABLES `pi2_offres` WRITE;
/*!40000 ALTER TABLE `pi2_offres` DISABLE KEYS */;
<<<<<<< HEAD
INSERT INTO `pi2_offres` VALUES (1,800.00,'2014-10-28 21:05:36',7,1),(2,800.00,'2014-10-28 21:06:17',7,1),(3,900.00,'2014-10-28 21:06:29',7,1),(4,901.00,'2014-10-28 21:16:53',7,1),(5,902.00,'2014-10-28 21:20:55',7,1),(6,903.00,'2014-10-28 21:21:08',7,1),(7,905.00,'2014-10-28 22:06:37',7,1),(8,915.00,'2014-10-28 22:55:16',7,1);
=======
INSERT INTO `pi2_offres` VALUES (20,25.00,'2014-10-31 15:13:42',24,4),(21,30.00,'2014-10-31 15:13:49',24,4),(22,35.00,'2014-10-31 15:13:51',24,4),(23,40.00,'2014-10-31 15:51:22',24,4),(24,45.00,'2014-10-31 16:13:19',24,4),(25,50.00,'2014-10-31 16:13:26',24,4),(26,55.00,'2014-10-31 16:16:21',24,4),(27,60.00,'2014-10-31 16:16:55',24,4),(28,60.00,'2014-10-31 16:16:57',24,4),(29,65.00,'2014-10-31 19:43:35',24,4),(30,70.00,'2014-10-31 20:13:45',24,4),(31,105.00,'2014-11-01 14:18:01',6,1),(32,110.00,'2014-11-01 16:07:26',6,4),(33,120.00,'2014-11-01 22:39:14',6,1),(34,125.00,'2014-11-03 19:44:18',6,1),(35,150.00,'2014-11-03 19:44:32',6,1),(36,140.00,'2014-11-03 19:49:44',6,1),(37,170.00,'2014-11-03 20:04:03',6,1),(38,175.00,'2014-11-03 20:08:20',6,1),(39,175.00,'2014-11-03 20:08:21',6,1),(40,175.00,'2014-11-03 20:08:21',6,1),(41,180.00,'2014-11-03 20:12:59',6,1);
>>>>>>> Integration_beta3
/*!40000 ALTER TABLE `pi2_offres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pi2_techniques`
--

DROP TABLE IF EXISTS `pi2_techniques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pi2_techniques` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pi2_techniques`
--

LOCK TABLES `pi2_techniques` WRITE;
/*!40000 ALTER TABLE `pi2_techniques` DISABLE KEYS */;
INSERT INTO `pi2_techniques` VALUES (1,'acrylique'),(2,'peinture a l\'huile'),(3,'gouache'),(4,'aquarelle'),(5,'mixte');
/*!40000 ALTER TABLE `pi2_techniques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pi2_themes`
--

DROP TABLE IF EXISTS `pi2_themes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pi2_themes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pi2_themes`
--

LOCK TABLES `pi2_themes` WRITE;
/*!40000 ALTER TABLE `pi2_themes` DISABLE KEYS */;
INSERT INTO `pi2_themes` VALUES (1,'classique'),(2,'moderne'),(3,'abstrait');
/*!40000 ALTER TABLE `pi2_themes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pi2_utilisateurs`
--

DROP TABLE IF EXISTS `pi2_utilisateurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pi2_utilisateurs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `courriel` varchar(70) NOT NULL,
  `motDePasse` varchar(60) NOT NULL,
  `telephone` varchar(14) DEFAULT NULL,
  `type` enum('membre','admin') NOT NULL DEFAULT 'membre',
  `etat` enum('inactif','actif') NOT NULL DEFAULT 'actif',
  PRIMARY KEY (`id`)
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
=======
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
>>>>>>> Integration_beta3
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pi2_utilisateurs`
--

LOCK TABLES `pi2_utilisateurs` WRITE;
/*!40000 ALTER TABLE `pi2_utilisateurs` DISABLE KEYS */;
<<<<<<< HEAD
INSERT INTO `pi2_utilisateurs` VALUES (1,'Max','William','aa@a','1234','123-123','membre','actif'),(2,'Marceau','Sophie','bb@cc','1324','23454a','membre','actif'),(3,'hjflf','jhjkb','a@a.com','1234','bkbkj','membre','inactif'),(4,'aab','aa','aaa@a','1234','aa','membre','actif');
=======
INSERT INTO `pi2_utilisateurs` VALUES (1,'Max','William','aa@aa','1234','123-123','membre','actif'),(2,'Marceau','Sophie','bb@bb','1234','23454a','membre','actif'),(3,'Han','Feng','dd@dd','1234','bkbkj','membre','actif'),(4,'aab','aa','ee@ee','1234','aa','membre','actif'),(5,'Eric','Revelle','cc@cc','1234','asdf','membre','actif');
>>>>>>> Integration_beta3
/*!40000 ALTER TABLE `pi2_utilisateurs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

<<<<<<< HEAD
-- Dump completed on 2014-10-28 23:07:51
=======
-- Dump completed on 2014-11-03 20:26:29
>>>>>>> Integration_beta3
