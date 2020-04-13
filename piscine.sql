-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 13 avr. 2020 à 18:28
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
  `email` varchar(255) NOT NULL,
  `MDP` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `codepostal` int(11) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `telephone` int(10) NOT NULL,
  `paiement` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acheteur`
--

INSERT INTO `acheteur` (`email`, `MDP`, `Nom`, `Prenom`, `Adresse`, `Ville`, `codepostal`, `pays`, `telephone`, `paiement`) VALUES
('tom191298@gmail.com', 'tomyre191298', 'LARNICOL', 'Tom', '29 avenue de la république', 'Maisons-Alfort', 94700, 'France', 643554438, 'Paypal'),
('', '', 'larnicole', 'tom', '29 avenue de la republique', 'Maisons-Alfort', 94700, 'France', 643554438, ''),
('tom191298@gmail.com', 'tomyre191298', 'larnicole', 'tom', '29 avenue de la republique', 'Maisons-Alfort', 94700, 'France', 643554438, 'Visa'),
('dhvezubci\"e', 'efbzrgb Ã©r', 'rgb\"r', 'zrtb', 'efvefv', 'erfv', 35472, 'frev', 676383642, 'Visa');

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
-- Structure de la table `comptebancaire`
--

DROP TABLE IF EXISTS `comptebancaire`;
CREATE TABLE IF NOT EXISTS `comptebancaire` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `type de carte` varchar(255) NOT NULL,
  `Numero carte` varchar(22) NOT NULL,
  `Nom sur carte` varchar(255) NOT NULL,
  `Date d'expiration` varchar(255) NOT NULL,
  `Code de securité` int(4) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comptebancaire`
--

INSERT INTO `comptebancaire` (`ID`, `type de carte`, `Numero carte`, `Nom sur carte`, `Date d'expiration`, `Code de securité`) VALUES
(1, 'Mastercard', '1234 5678 1234 5678', 'Larnicol', '02/21', 987);

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `MDP` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`Nom`, `Prenom`, `email`, `MDP`, `photo`) VALUES
('laBG', 'amandine', 'jsaispasquoimettre@jtemmerde', 'jesaispas', 'soin.pnj');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
