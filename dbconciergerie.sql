-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 28 août 2022 à 17:39
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbconciergerie`
--

-- --------------------------------------------------------

--
-- Structure de la table `composer`
--

DROP TABLE IF EXISTS `composer`;
CREATE TABLE IF NOT EXISTS `composer` (
  `ID_TACHE` int(11) NOT NULL,
  `ID_INTERV` int(11) NOT NULL,
  PRIMARY KEY (`ID_TACHE`,`ID_INTERV`),
  KEY `FK_COMPOSER2` (`ID_INTERV`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `concierge`
--

DROP TABLE IF EXISTS `concierge`;
CREATE TABLE IF NOT EXISTS `concierge` (
  `ID_CONCIERGE` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_CONCIERGE` varchar(255) NOT NULL,
  `PRENOM_CONCIERGE` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `NOM_UTILISATEUR` varchar(255) NOT NULL,
  `MOT_DE_PASSE` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_CONCIERGE`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `concierge`
--

INSERT INTO `concierge` (`ID_CONCIERGE`, `NOM_CONCIERGE`, `PRENOM_CONCIERGE`, `EMAIL`, `NOM_UTILISATEUR`, `MOT_DE_PASSE`) VALUES
(13, 'hamza', 'hamza', 'hamzamanai.prof@gmail.com', 'hamza', '$2y$10$8e7Gv4RRVLjF9F.MJS0aA.3c9r9K3Y61w9D7w2PLMNMTlJnxXB3zy'),
(14, 'sousou', 'sousou', 'hamzamanai.prof@gmail.com', 'soso', '$2y$10$VUSGfk/t/6wLn8HHhphiwOmbelF4YYBoqeEqNQkbVPiDGr0NIKL6m'),
(12, 'zozo', 'zozo', 'hamzamanai.prof@gmail.com', 'zozo', '$2y$10$TkEFxNE/ylTHAFn.x9HFxOcwfbKCm0qi8wN3XPVKhGDtCRNM2omuW'),
(11, 'mizo', 'mizo', 'hamzamanai.prof@gmail.com', 'mizo', '$2y$10$sAyaJ724UrHmlrNerZ9MnuEH/Lj7.aF5wU15ySURrmUgq0Ivwdv0S'),
(15, 'momo', 'momo', 'hamzamanai.prof@gmail.com', 'momo', '$2y$10$JdwT52vCtuI1Le/ajJAvvu6MAoiMEfl.520t1RHxw0IhsMcsCBNqi');

-- --------------------------------------------------------

--
-- Structure de la table `immeuble`
--

DROP TABLE IF EXISTS `immeuble`;
CREATE TABLE IF NOT EXISTS `immeuble` (
  `ID_IMMEUBLE` int(11) NOT NULL,
  `ID_CONCIERGE` int(11) NOT NULL,
  `ADRESSE` text,
  `NB_ETAGE` text,
  PRIMARY KEY (`ID_IMMEUBLE`),
  KEY `FK_S_OCCUPER` (`ID_CONCIERGE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

DROP TABLE IF EXISTS `intervention`;
CREATE TABLE IF NOT EXISTS `intervention` (
  `ID_INTERV` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CONCIERGE` int(11) NOT NULL,
  `NOM_UTILISATEUR` varchar(100) NOT NULL,
  `DATE_INTERV` date DEFAULT NULL,
  `TYPE_INTERV` text,
  `ETAGE_INTERV` int(11) DEFAULT NULL,
  `ID_IMMEUBLE` int(11) NOT NULL,
  PRIMARY KEY (`ID_INTERV`),
  KEY `FK_FAIRE` (`ID_CONCIERGE`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `intervention`
--

INSERT INTO `intervention` (`ID_INTERV`, `ID_CONCIERGE`, `NOM_UTILISATEUR`, `DATE_INTERV`, `TYPE_INTERV`, `ETAGE_INTERV`, `ID_IMMEUBLE`) VALUES
(46, 12, 'hamza', '2022-08-05', 'QQQQQQQQQQQQQQ', 1, 2),
(45, 12, 'hamza', '2022-08-11', 'aaaaaaaaaaaaaaa', 1, 2),
(44, 11, 'zozo', '2022-08-19', 'aaaaaaaaaaaaaaa', 1, 2),
(48, 11, 'zozo', '2022-08-05', 'aaaaaaaaaaaaaaa', 1, 2),
(49, 1, 'coco', '2022-08-26', 'QQQQQQQQQQQQQQ', 1, 2),
(50, 1, 'coco', '2022-08-02', 'aaaaaaaaaaaaaaa', 1, 1),
(52, 12, 'hamza', '2022-08-04', 'aaaaaaaaaaaaaaa', 1, 2),
(53, 12, 'hamza', '2022-08-04', 'QQQQQQQQQQQQQQ', 1, 2),
(54, 11, 'zozo', '2022-08-04', 'aaaaaaaaaaaaaaa', 1, 2),
(55, 1, 'soso', '2022-08-11', 'QQQQQQQQQQQQQQ', 1, 2),
(56, 100, 'momo', '2022-08-18', 'zdzr', 1, 2),
(57, 100, 'momo', '2022-08-06', 'aaaaaaaaaaaaaaa', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `subir`
--

DROP TABLE IF EXISTS `subir`;
CREATE TABLE IF NOT EXISTS `subir` (
  `ID_IMMEUBLE` int(11) NOT NULL,
  `ID_INTERV` int(11) NOT NULL,
  PRIMARY KEY (`ID_IMMEUBLE`,`ID_INTERV`),
  KEY `FK_SUBIR2` (`ID_INTERV`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tache_maintenance`
--

DROP TABLE IF EXISTS `tache_maintenance`;
CREATE TABLE IF NOT EXISTS `tache_maintenance` (
  `ID_TACHE` int(11) NOT NULL,
  `ID_CONCIERGE` int(11) DEFAULT NULL,
  `LIBELLE_TACHE` text,
  PRIMARY KEY (`ID_TACHE`),
  KEY `FK_EFFECTUER` (`ID_CONCIERGE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
