-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 24 avr. 2022 à 19:29
-- Version du serveur :  5.7.29-log
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dev_web_projet_2`
--

-- --------------------------------------------------------

--
-- Structure de la table `ecole`
--

DROP TABLE IF EXISTS `ecole`;
CREATE TABLE IF NOT EXISTS `ecole` (
  `Id_ecole` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_ecole` varchar(150) DEFAULT NULL,
  `Adresse` varchar(150) DEFAULT NULL,
  `Nb_etudiant` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_ecole`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `Id_etudiant` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_etudiant` varchar(150) DEFAULT NULL,
  `Prenom_etudiant` varchar(150) DEFAULT NULL,
  `Nb_emprunts` int(11) DEFAULT NULL,
  `Mot_de_passe_etu` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`Id_etudiant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

DROP TABLE IF EXISTS `materiel`;
CREATE TABLE IF NOT EXISTS `materiel` (
  `Id_Materiel` int(11) NOT NULL AUTO_INCREMENT,
  `Code_barre` int(13) NOT NULL,
  `Nom_materiel` varchar(150) NOT NULL,
  `Description` varchar(150) NOT NULL,
  `Date_achat` date NOT NULL,
  `Prix_achat` float NOT NULL,
  `Id_fournisseur` int(11) NOT NULL,
  PRIMARY KEY (`Id_Materiel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

DROP TABLE IF EXISTS `responsable`;
CREATE TABLE IF NOT EXISTS `responsable` (
  `Id_responsable` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_responsable` varchar(150) NOT NULL,
  `Identifiant_connexion` varchar(150) NOT NULL,
  `Mot_de_passe_respo` varchar(150) NOT NULL,
  PRIMARY KEY (`Id_responsable`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
