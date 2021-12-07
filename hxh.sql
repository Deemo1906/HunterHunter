-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 07 déc. 2021 à 11:35
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hxh`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `IdAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `Pseudo` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`IdAdmin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`IdAdmin`, `Name`, `Mail`, `Pseudo`, `Password`) VALUES
(1, 'NPFH', 'hugo.haidar@edu.ece.fr', 'Netero', 'HXH2021');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `IdClient` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `Pseudo` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Adress` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `PostalCode` varchar(255) DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `NumTel` varchar(255) DEFAULT NULL,
  `CardType` varchar(255) DEFAULT NULL,
  `CardNum` varchar(255) DEFAULT NULL,
  `CardName` varchar(255) DEFAULT NULL,
  `DateExp` date DEFAULT NULL,
  `CardCode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IdClient`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `Iditem` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Price` int(11) NOT NULL,
  `SaleType` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `IdAdmin` int(11) NOT NULL,
  `IdVendeur` int(11) NOT NULL,
  PRIMARY KEY (`Iditem`),
  KEY `IdAdmin` (`IdAdmin`),
  KEY `IdVendeur` (`IdVendeur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `IdLogin` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `AccountType` varchar(255) NOT NULL,
  PRIMARY KEY (`IdLogin`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`IdLogin`, `Pseudo`, `Password`, `AccountType`) VALUES
(1, 'Netero', 'HXH2021', 'admin'),
(5, 'paulopaulpogba', 'camarche', 'client'),
(6, 'paulopaulpogba', 'sakluy', 'client'),
(7, 'paulopaulpogba', 'hjhjh', 'client'),
(8, 'paulopaulpogba', 'azert', 'client'),
(9, 'paulopaulpogba', 'guiyt', 'client'),
(10, 'paulopaulpogba', 'derirn', 'vendeur');

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `Idphoto` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) NOT NULL,
  `Iditem` int(11) NOT NULL,
  PRIMARY KEY (`Idphoto`),
  KEY `Iditem` (`Iditem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `IdVendeur` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `Pseudo` varchar(255) NOT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `Password` varchar(255) NOT NULL,
  `Background` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IdVendeur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`IdAdmin`) REFERENCES `admin` (`IdAdmin`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`IdVendeur`) REFERENCES `vendeur` (`IdVendeur`);

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`Iditem`) REFERENCES `item` (`Iditem`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
