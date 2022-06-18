-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 18 juin 2022 à 17:57
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
-- Structure de la table `emprunteur`
--

DROP TABLE IF EXISTS `emprunteur`;
CREATE TABLE IF NOT EXISTS `emprunteur` (
  `Id_emprunteur` int(150) NOT NULL AUTO_INCREMENT,
  `Nom_emprunteur` varchar(150) NOT NULL,
  `Prenom_emprunteur` varchar(150) NOT NULL,
  `mail_emprunteur` varchar(150) NOT NULL,
  `Code_barre` text NOT NULL,
  `Date_emprunt` date NOT NULL,
  PRIMARY KEY (`Id_emprunteur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `Id_etudiant` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_etudiant` varchar(150) NOT NULL,
  `Prenom_etudiant` varchar(150) NOT NULL,
  `mail_etudiant` varchar(150) NOT NULL,
  `Nb_emprunts` int(11) NOT NULL,
  `Mot_de_passe_etu` varchar(150) NOT NULL,
  PRIMARY KEY (`Id_etudiant`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`Id_etudiant`, `Nom_etudiant`, `Prenom_etudiant`, `mail_etudiant`, `Nb_emprunts`, `Mot_de_passe_etu`) VALUES
(1, 'trump', 'donald', 'donald.trump@twitter.com', 0, 'MAGA'),
(7, 'ada', 'ada', 'adrien7@gmial.com', 0, 'az'),
(10, 'Roronoa', 'Zoro', 'roronoa.zoro@gmail.com', 0, 'az'),
(12, 'Adla', 'adla', 'adrien.oeoirio@gmail.com', 0, 'azert'),
(19, 'bishow', 'bishow', 'jason.statam@gmail.com', 0, 'fight'),
(43, 'Melenchon', 'Jean luc', 'jl.melenchon@nupes.com', 0, 'premier ministre'),
(44, 'Cent bêtes', 'Kaido', 'kaido@gmail.com', 0, 'pirate'),
(45, 'Poutine', 'Volodymyr', 'v.poutine@russie-unie.com', 0, 'o');

-- --------------------------------------------------------

--
-- Structure de la table `formulaire`
--

DROP TABLE IF EXISTS `formulaire`;
CREATE TABLE IF NOT EXISTS `formulaire` (
  `Idformulaire` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(150) DEFAULT NULL,
  `Mail` varchar(150) DEFAULT NULL,
  `Message` text,
  PRIMARY KEY (`Idformulaire`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `formulaire`
--

INSERT INTO `formulaire` (`Idformulaire`, `Nom`, `Mail`, `Message`) VALUES
(1, 'sd', 'sddsdsdsd@dgmofsmoig.cmm', 'kfjfdiosjsgoisgjqvfbq\r\nvifbjiod,bfnsngh jzrirgrgssf\r\nfgbjioebj i\r\nqfjbitjefb\r\nfdbioj^qetob\r\n<fsjvpbqgbkjdfobe'),
(2, 'sdfzefrggsgrze', 'sddsdsdsd@dgmofsmoig.cmmefefzfezffez', 'kfjfdiosjsgoisgjqvfbqd\r\nvifbjiod,bfnsngh jzrirgrgssf\r\nfgbjioebj i\r\nqfjbitjefb\r\nfdbioj^qetob\r\n<fsjvpbqgbkjdfobe'),
(3, 'sdfzefrggsgrze', 'sddsdsdsd@dgmofsmoig.cmmefefzfezffez', 'kfjfdiosjsgoisgjqvfbqd\r\nvifbjiod,bfnsngh jzrirgrgssf\r\nfgbjioebj i\r\nqfjbitjefb\r\nfdbioj^qetob\r\n<fsjvpbqgbkjdfobe'),
(4, 'sdfzefrggsgrze', 'sddsdsdsd@dgmofsmoig.cmmefefzfezffez', 'kfjfdiosjsgoisgjqvfbqd\r\nvifbjiod,bfnsngh jzrirgrgssf\r\nfgbjioebj i\r\nqfjbitjefb\r\nfdbioj^qetob\r\n<fsjvpbqgbkjdfobe'),
(5, 'sdfzefrggsgrze', 'sddsdsdsd@dgmofsmoig.cmmefefzfezffez', 'kfjfdiosjsgoisgjqvfbqd\r\nvifbjiod,bfnsngh jzrirgrgssf\r\nfgbjioebj i\r\nqfjbitjefb\r\nfdbioj^qetob\r\n<fsjvpbqgbkjdfobe'),
(6, '', 'sddsdsdsd@dgmofsmoig.cmmefefzfezffez', 'kfjfdiosjsgoisgjqvfbqd\r\nvifbjiod,bfnsngh jzrirgrgssf\r\nfgbjioebj i\r\nqfjbitjefb\r\nfdbioj^qetob\r\n<fsjvpbqgbkjdfobe'),
(7, '', 'sddsdsdsd@dgmofsmoig.cmmefefzfezffez', 'kfjfdiosjsgoisgjqvfbqd\r\nvifbjiod,bfnsngh jzrirgrgssf\r\nfgbjioebj i\r\nqfjbitjefb\r\nfdbioj^qetob\r\n<fsjvpbqgbkjdfobe'),
(8, 'dsd', '', 'kfjfdiosjsgoisgjqvfbqd\r\nvifbjiod,bfnsngh jzrirgrgssf\r\nfgbjioebj i\r\nqfjbitjefb\r\nfdbioj^qetob\r\n<fsjvpbqgbkjdfobe'),
(9, 'dsd', '', ''),
(10, '', 'dfr@uji', 'efzfqezddf'),
(11, '', 'dfr@uji', 'efzfqezddf'),
(12, 'rererer', 'dfr@uji', ''),
(13, 'rererer', 'dfr@uji', ''),
(14, 'rererer', 'dfr@uji', 'rererer');

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

DROP TABLE IF EXISTS `materiel`;
CREATE TABLE IF NOT EXISTS `materiel` (
  `Id_Materiel` int(13) NOT NULL AUTO_INCREMENT,
  `Code_barre` varchar(150) NOT NULL,
  `Nom_materiel` varchar(150) NOT NULL,
  `Description` varchar(150) NOT NULL,
  `Date_achat` date NOT NULL,
  `Prix_achat` float NOT NULL,
  `emprunte` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Id_Materiel`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `materiel`
--

INSERT INTO `materiel` (`Id_Materiel`, `Code_barre`, `Nom_materiel`, `Description`, `Date_achat`, `Prix_achat`, `emprunte`) VALUES
(52, '4100106737537', 'Imprimante 3D', 'Appareil permettant la réalisation de figurines.', '2014-06-22', 320, 0),
(54, '1956844688224', 'dell', 'pc dell', '2014-06-22', 200, 0),
(55, '6417230095892', 'rer e', 'Saint lazare/ Chelles gournay/Tournan / Villiers sur marne', '2014-06-22', 3, 0),
(56, '1156521448385', 'rer e', 'Saint lazare/ Chelles gournay/Tournan / Villiers sur marne', '2014-06-22', 3, 0),
(57, '0438212897143', 'rer e', 'Saint lazare/ Chelles gournay/Tournan / Villiers sur marne', '2014-06-22', 3, 0),
(58, '4667379826722', 'RER B', 'B1 Gare du Nord B2 Robinson B3 Aéroport Charles-de-Gaulle 2 TGV B4 Saint-Rémy-lès-Chevreuse B5 Mitry - Claye B6 Massy - Palaiseau', '2014-06-22', 2, 0),
(59, '2002250134300', 'RER B', 'B1 Gare du Nord B2 Robinson B3 Aéroport Charles-de-Gaulle 2 TGV B4 Saint-Rémy-lès-Chevreuse B5 Mitry - Claye B6 Massy - Palaiseau', '2014-06-22', 2, 0),
(60, '7127773941443', 'AZZZZ', 'Bonsoir', '2014-06-22', 69, 0),
(61, '7241464094722', '', 'Le gang', '2014-06-22', 69, 0),
(62, '1342680116238', 'az', 'az', '2014-06-22', 88, 0),
(63, '4457792844932', 'ez', 'ze', '2014-06-22', 5, 0),
(64, '2139319109278', 'zeze', 'popop', '2014-06-22', 5, 0),
(65, '2484712064242', 'zezez', '787', '2014-06-22', 45, 0),
(66, '2691291203444', 'az', 'po', '2014-06-22', 12, 0),
(68, '4804649571778', 'carte graphique', 'Bonjour', '2022-06-15', 2.5, 0),
(69, '8305538551428', 'Glue Stick', 'Ca colle', '2014-06-22', 1.22, 0),
(70, '8514433842925', 'GHB', 'A utiliser en boîte de nuit', '2022-06-18', 0.02, 1);

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

DROP TABLE IF EXISTS `responsable`;
CREATE TABLE IF NOT EXISTS `responsable` (
  `Id_responsable` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_responsable` varchar(150) NOT NULL,
  `Prenom_responsable` varchar(150) NOT NULL,
  `adresse_mail` varchar(150) DEFAULT NULL,
  `Identifiant_connexion` varchar(150) NOT NULL,
  `Mot_de_passe_respo` varchar(150) NOT NULL,
  PRIMARY KEY (`Id_responsable`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `responsable`
--

INSERT INTO `responsable` (`Id_responsable`, `Nom_responsable`, `Prenom_responsable`, `adresse_mail`, `Identifiant_connexion`, `Mot_de_passe_respo`) VALUES
(1, 'King', 'Alber', 'alber.king@gmail.com', 'El lunaria de kaido', 'sabre'),
(2, 'kiko', 'cok', 'popo@fm.com', 'NONE', 'az'),
(3, 'aa', 'aa', 'oio@oio.com', 'NONE', 'po'),
(5, 'pao', 'az', 'poa@mg.com', 'NONE', 'ze'),
(6, 'ada', 'ada', 'k@k.com', 'NONE', 'az'),
(12, 'ada', 'ada', 'ppofeifsuhfiozfjrizuqoufhzryuigshlfheir@k.com', 'NONE', 'az'),
(126, 'ada', 'ada', 'corentin@gmial.com', 'NONE', 'a'),
(128, 'ada', 'ada', 'adrien@gmial.com', 'NONE', 'a'),
(130, 'ada', 'ada', 'adrien7@gmial.com', 'NONE', 'a'),
(131, 'dz', 'de', 'iioo@poe', 'NONE', 'p'),
(132, 'a', 'z', 'fd@feoeo', 'NONE', 'sabre'),
(134, 'ds', 'jj', 'roget.@gpod.cm', 'NONE', 'az'),
(135, 'ded', 'de', 'zdi@opfe.com', 'NONE', 'az'),
(136, 'zae', 'ze', 'eze@gmaiLc.com', 'NONE', 'a'),
(137, 'zae', 'ze', 'eze@zeee.com', 'NONE', 'az'),
(138, 'ze', 'ze', 'az@fzo.Com', 'NONE', 'ze'),
(139, 'ze', 'ze', 'az@fzo.Come', 'NONE', 'a'),
(140, 'hatake', 'kakashi', 'kakashi.hatake@mail.com', 'NONE', 'az'),
(142, 'z', 'a', 'luffy.zoro@gmail.com', 'NONE', 'az');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
