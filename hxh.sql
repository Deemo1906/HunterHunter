-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 11 déc. 2021 à 10:12
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`IdClient`, `Name`, `Mail`, `Pseudo`, `Password`, `Adress`, `City`, `PostalCode`, `Country`, `NumTel`, `CardType`, `CardNum`, `CardName`, `DateExp`, `CardCode`) VALUES
(4, 'flo', 'flo@gmail.com', 'flolebest', 'caca', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'florian', 'pussyslayer@ph.com', 'pussyslayer', 'pussy', 'boulevard de grenelle', 'paris', '75015', 'France', '0637397507', 'visa', '497401827613535', 'cardname', '2021-12-31', '444'),
(6, 'Varus', 'grosse@gmail.com', 'mabite', 'cum', 'avenue de la gare ', 'mormant', '77720', 'France', '0637397507', 'mastercard', '0000000000001', 'cardname', '2022-01-09', '000');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `IdCommande` int(11) NOT NULL AUTO_INCREMENT,
  `Adress` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `PostalCode` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `Price` int(11) NOT NULL,
  `NomAcheteur` varchar(255) NOT NULL,
  `NumItem` int(11) NOT NULL,
  `IdPanier` int(11) NOT NULL,
  PRIMARY KEY (`IdCommande`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`IdCommande`, `Adress`, `City`, `PostalCode`, `Country`, `Price`, `NomAcheteur`, `NumItem`, `IdPanier`) VALUES
(1, 'boulevard de grenelle', 'paris', '75015', 'France', 150000, 'florian', 2, 13),
(2, 'boulevard de grenelle', 'paris', '75015', 'France', 100000, 'florian', 7, 13);

-- --------------------------------------------------------

--
-- Structure de la table `comporter`
--

DROP TABLE IF EXISTS `comporter`;
CREATE TABLE IF NOT EXISTS `comporter` (
  `IdItem` int(11) NOT NULL,
  `IdPanier` int(11) NOT NULL,
  PRIMARY KEY (`IdItem`,`IdPanier`),
  KEY `IdPanier` (`IdPanier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Photo` varchar(255) NOT NULL,
  `IdAdmin` int(11) NOT NULL,
  `IdVendeur` int(11) NOT NULL,
  PRIMARY KEY (`Iditem`),
  KEY `IdAdmin` (`IdAdmin`),
  KEY `IdVendeur` (`IdVendeur`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`Iditem`, `Name`, `Description`, `Price`, `SaleType`, `Category`, `Photo`, `IdAdmin`, `IdVendeur`) VALUES
(2, 'Scarlet eyes', 'Though typically brown, the irises belonging to members of the Kurta Clan glow scarlet when they are emotionally agitated. If a member of the Kurta Clan dies in that state, his/her eyes permanently stay scarlet postmortem. Due to the Scarlet Eyes being considered one of the most gorgeous colors in the world, they are treated as a rare jewel by many. After the Phantom Troupe massacres the Kurta Clan, Kurapika is the clan\'s only survivor.', 150000, 'Direct', 'Rare', 'scarlet-eyes.png', 1, 2),
(3, 'Ruler\'s Blessing', 'A castle given as a prize for winning the contest, town with population 10,000 included. Its residents will live according to whatever laws and commands you issue.', 13000, 'Auction', 'Haut de gamme', '000.jpg', 1, 2),
(4, 'Patch of Forest', 'The entrance to the giant forest called the \"Mountain God\'s Garden\" where many unique endemic species live. They are all tame and friendly.', 15000, 'Auction', 'Haut de gamme', '1.jpg', 1, 2),
(5, 'Angel\'s Breath', 'She cures one person of all wounds and ills, restoring them to perfect health. She will only appear once.', 30000, 'Negotiation', 'Rare', '17.jpg', 1, 2),
(6, 'King Great White Beetle', 'It uses special pheromones to lure other insects to build a huge colony. It leaves the colony once a day for an evening stroll.', 10000, 'Auction', 'Regular', '53.jpg', 1, 2),
(7, 'Sonne Limarch\'s Used Tissue', 'Tissues used by the famous actor Sonne Limarch. It comes with a DNA certificate.', 100000, 'Direct', 'Rare', 'tissue.jpg', 1, 2),
(8, 'Killua\'s Skateboard', 'This board was owned by one of the most famous hunters in the world.', 12000, 'Negotiation', 'Regular', 'board.jpg', 1, 2),
(9, 'Gon\'s fishing rod', 'A fishing rod that can be used for fishing or as a powerful weapon. It was once used in a Hunter exam.', 12000, 'Auction', 'Haut de gamme', 'fishing-rod.png', 1, 2),
(10, 'Gun-gi board', 'Gungi is a two-player strategy board game from the Republic of East Gorteau.', 30000, 'Direct', 'Rare', 'gungi.jpg', 1, 2),
(11, 'Poor Man\'s Rose', 'Poor Man\'s Rose is a chemo-explosive weapon of mass destruction and one of the most powerful and dangerous weapons in the world.', 500000, 'Direct', 'Rare', 'rose.png', 1, 2),
(12, 'mabite', '', 1000000, 'direct', 'rare', 'photo', 1, 2),
(13, 'long sword', '', 350, 'direct', 'common', 'photo', 1, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`IdLogin`, `Pseudo`, `Password`, `AccountType`) VALUES
(1, 'Netero', 'HXH2021', 'admin'),
(13, 'Deemo1906', '19062001Hh', 'vendeur'),
(14, 'pussyslayer', 'pussy', 'client'),
(17, 'mabite', 'cum', 'client');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `IdPanier` int(11) NOT NULL AUTO_INCREMENT,
  `IdClient` int(11) NOT NULL,
  PRIMARY KEY (`IdPanier`),
  KEY `IdClient` (`IdClient`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`IdVendeur`, `Name`, `Mail`, `Pseudo`, `Photo`, `Password`, `Background`) VALUES
(2, 'hugo', 'hugo.haidar19@gmail.com', 'Deemo1906', NULL, '19062001Hh', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comporter`
--
ALTER TABLE `comporter`
  ADD CONSTRAINT `comporter_ibfk_1` FOREIGN KEY (`IdItem`) REFERENCES `item` (`Iditem`),
  ADD CONSTRAINT `comporter_ibfk_2` FOREIGN KEY (`IdPanier`) REFERENCES `panier` (`IdPanier`);

--
-- Contraintes pour la table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`IdAdmin`) REFERENCES `admin` (`IdAdmin`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`IdVendeur`) REFERENCES `vendeur` (`IdVendeur`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`IdClient`) REFERENCES `client` (`IdClient`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
