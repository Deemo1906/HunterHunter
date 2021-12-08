-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 08, 2021 at 12:57 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hxh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
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
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`IdAdmin`, `Name`, `Mail`, `Pseudo`, `Password`) VALUES
(1, 'NPFH', 'hugo.haidar@edu.ece.fr', 'Netero', 'HXH2021');

-- --------------------------------------------------------

--
-- Table structure for table `client`
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`IdClient`, `Name`, `Mail`, `Pseudo`, `Password`, `Adress`, `City`, `PostalCode`, `Country`, `NumTel`, `CardType`, `CardNum`, `CardName`, `DateExp`, `CardCode`) VALUES
(4, 'flo', 'flo@gmail.com', 'flolebest', 'caca', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item`
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`Iditem`, `Name`, `Description`, `Price`, `SaleType`, `Category`, `Photo`, `IdAdmin`, `IdVendeur`) VALUES
(2, 'Scarlet eyes', 'Though typically brown, the irises belonging to members of the Kurta Clan glow scarlet when they are emotionally agitated. If a member of the Kurta Clan dies in that state, his/her eyes permanently stay scarlet postmortem. Due to the Scarlet Eyes being considered one of the most gorgeous colors in the world, they are treated as a rare jewel by many. After the Phantom Troupe massacres the Kurta Clan, Kurapika is the clan\'s only survivor.', 150000, 'Direct', 'Rare', 'scarlet-eyes.png', 1, 2),
(3, 'City', 'card city.', 13000, 'Direct', 'Rare', '000.jpg', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `IdLogin` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `AccountType` varchar(255) NOT NULL,
  PRIMARY KEY (`IdLogin`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`IdLogin`, `Pseudo`, `Password`, `AccountType`) VALUES
(1, 'Netero', 'HXH2021', 'admin'),
(13, 'Deemo1906', '19062001Hh', 'vendeur');

-- --------------------------------------------------------

--
-- Table structure for table `vendeur`
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendeur`
--

INSERT INTO `vendeur` (`IdVendeur`, `Name`, `Mail`, `Pseudo`, `Photo`, `Password`, `Background`) VALUES
(2, 'hugo', 'hugo.haidar19@gmail.com', 'Deemo1906', NULL, '19062001Hh', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`IdAdmin`) REFERENCES `admin` (`IdAdmin`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`IdVendeur`) REFERENCES `vendeur` (`IdVendeur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
