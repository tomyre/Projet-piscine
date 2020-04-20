-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 20 avr. 2020 à 15:04
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `piscine`
--

-- --------------------------------------------------------

--
-- Structure de la table `acheteur`
--

DROP TABLE IF EXISTS `acheteur`;
CREATE TABLE IF NOT EXISTS `acheteur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `MDP` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `codepostal` int(11) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `telephone` int(10) NOT NULL,
  `paiement` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acheteur`
--

INSERT INTO `acheteur` (`ID`, `email`, `MDP`, `Nom`, `Prenom`, `Adresse`, `Ville`, `codepostal`, `pays`, `telephone`, `paiement`) VALUES
(2, 'tom191298@gmail.com', 'tomyre191298', 'LARNICOL', 'Tom', '29 avenue de la république', 'Maisons-Alfort', 94700, 'France', 643554438, 'Paypal');

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `MDP` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`ID`, `Nom`, `Prenom`, `email`, `MDP`) VALUES
(1, 'LARNICOL', 'Tom', 'tom.larnicol@edu.ece.fr', 'tomyre191298');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `IDobjet` int(11) NOT NULL,
  `idassocie` int(10) NOT NULL,
  `idvendeur` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Categorie` varchar(255) NOT NULL,
  `Categorie2` varchar(255) NOT NULL,
  `prix` int(255) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`ID`, `IDobjet`, `idassocie`, `idvendeur`, `Nom`, `Type`, `Categorie`, `Categorie2`, `prix`, `Photo`, `description`, `video`) VALUES
(6, 0, 0, 0, 'malette LV', 'VIP', 'Offre', 'Enchere', 25000, 'malette LV.jpeg', 'malette Louis Vuitton de 1850.', ''),
(20, 0, 1, 0, 'Rideaux', 'musee', 'Acheter', 'Offre', 200, 'rideaux.jpg', 'none', ''),
(15, 0, 1, 0, 'Violon', 'VIP', 'Enchere', 'Acheter', 10000, 'violon.jpg', 'stradivarius de 1920.', ''),
(2, 0, 6, 0, 'Lettre', 'musee', 'Enchere', '', 180000, 'lettre.jpg', 'Lettre d\'adieu de Charles Baudelaire.', ''),
(7, 0, 6, 0, 'Cle', 'ferraille', 'Acheter', '', 50, 'cle.jpg', 'Cle en bronze qui ete utilise pour ouvrir un des bureau de Louis XVI.', '');

-- --------------------------------------------------------

--
-- Structure de la table `encheres`
--

DROP TABLE IF EXISTS `encheres`;
CREATE TABLE IF NOT EXISTS `encheres` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDobjet` int(11) NOT NULL,
  `NOM` varchar(255) NOT NULL,
  `PrixMax` int(11) NOT NULL,
  `IDAcheteur` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

DROP TABLE IF EXISTS `offres`;
CREATE TABLE IF NOT EXISTS `offres` (
  `IDacheteur` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prix` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `offres`
--

INSERT INTO `offres` (`IDacheteur`, `ID`, `Nom`, `Prix`) VALUES
(2, 20, 'vase', '100'),
(2, 20, 'Rideaux', '100'),
(6, 20, 'Rideaux', '100');

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `MDP` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `fond` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`ID`, `Nom`, `Prenom`, `email`, `MDP`, `photo`, `fond`) VALUES
(20, 'larnicol', 'tom', 'tom191298@gmail.com', 'tomyre191298', 'ef', ''),
(23, 'ZIEGLER', 'Amandine', 'azglr06@gmail.com', 'eceEbay', 'IMG_20191206_131923.jpg', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
