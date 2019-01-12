-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 08 Janvier 2019 à 18:43
-- Version du serveur :  5.5.59-0+deb8u1
-- Version de PHP :  5.6.33-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `Motherroad`
--
CREATE DATABASE IF NOT EXISTS `Motherroad` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `Motherroad`;

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

DROP TABLE IF EXISTS `Users`;
CREATE TABLE IF NOT EXISTS `Users` (
  `ID-User` int(11) DEFAULT NULL,
  `Email` varchar(60) NOT NULL DEFAULT '',
  `Prenom` varchar(30) DEFAULT NULL,
  `Nom` varchar(30) DEFAULT NULL,
  `Pseudo` varchar(30) DEFAULT NULL,
  `Adresse` varchar(100) NOT NULL,
  `Ville` char(50) NOT NULL,
  `CodePostal` varchar(5) NOT NULL,
  `Telephone` varchar(8) NOT NULL,
  `Presence` int(1) NOT NULL,
  `Participation` int(1) NOT NULL,
  `Fonction` int(2) NOT NULL,
  `ConjointEmail` varchar(60) NOT NULL,
  `Photo` char(100) NOT NULL COMMENT 'trombinoscope',
  `Droit` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Gestion des Users';

--
-- Contenu de la table `Users`
--

INSERT INTO `Users` (`ID-User`, `Email`, `Prenom`, `Nom`,`Pseudo`,`Adresse`, `Ville`, `CodePostal`, `Telephone`, `Presence`, `Participation`,`Fonction`, `ConjointEmail`, `Photo`,`Droit`) VALUES
(1, 'marc.dulche@numericable.fr', 'Marc', 'Dulche','Sunspider', '17 Rue Maurice Barres', 'Plaisir', '78370', '0651390096', 2, 2, 1, 'Jacqueline.dumarquez@numericable.fr', '',1),
(2, 'eddy.dulche@free.fr', 'Eddy', 'Dulche','', '17 Rue Maurice Barres', 'Plaisir', '78370', '0651157029', 1, 1, 1, '', '',1);

-- --------------------------------------------------------

--
-- Structure de la table `Participer`
--

DROP TABLE IF EXISTS `Participer`;
CREATE TABLE IF NOT EXISTS `Participer` (
`ID` int(1) NOT NULL COMMENT 'Id Participer',
  `Libelle` char(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Participer`
--

INSERT INTO `Participer` (`ID`, `Libelle`) VALUES
(1, 'Seul'),
(2, 'Avec votre conjoint'),
(3, 'Avec un(e) ami(e)');

-- --------------------------------------------------------

--
-- Structure de la table `Presence`
--

DROP TABLE IF EXISTS `Presence`;
CREATE TABLE IF NOT EXISTS `Presence` (
`ID` int(1) NOT NULL COMMENT 'Id presence',
  `Libelle` char(60) NOT NULL COMMENT 'Libelle'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Presence`
--

INSERT INTO `Presence` (`ID`, `Libelle`) VALUES
(1, 'Juste nous suivre'),
(2, 'Participer à l''aventure depuis Chicago'),
(3, 'Participer à l''aventure depuis le Texas');

--
-- Structure de la table `Fonction`
--

DROP TABLE IF EXISTS `Fonction`;
CREATE TABLE IF NOT EXISTS `Fonction` (
`ID` int(2) NOT NULL COMMENT 'Id Fonction',
  `Libelle` char(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Fonction`
--

INSERT INTO `Fonction` (`ID`, `Libelle`) VALUES
(1, 'Organisateur'),
(2, 'Adjoint'),
(3, 'Secrétaire'),
(4, 'Trésorier'),
(5, 'Webmaster'),
(6, 'Voyageur'),
(7, 'Visiteur');

--
-- Structure de la table `Fonction`
--

DROP TABLE IF EXISTS `Droits`;
CREATE TABLE IF NOT EXISTS `Droits` (
`ID` int(2) NOT NULL COMMENT 'Id Droits',
  `Libelle` char(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Droits`
--

INSERT INTO `Droits` (`ID`, `Libelle`) VALUES
(1, 'Admin'),
(2, 'SuperUser'),
(3, 'Visiteur');
-- --------------------------------------------------------


--
-- Index pour les tables exportées
--

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
 ADD PRIMARY KEY (`Email`), ADD UNIQUE KEY `ID-User` (`ID-User`);

--
-- Index pour la table `Participer`
--
ALTER TABLE `Participer`
 ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Presence`
--
ALTER TABLE `Presence`
 ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Fonction`
--
ALTER TABLE `Fonction`
 ADD PRIMARY KEY (`ID`);

-- Index pour la table `Droits`
--
ALTER TABLE `Droits`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Participer`
--
ALTER TABLE `Participer`
MODIFY `ID` int(1) NOT NULL AUTO_INCREMENT COMMENT 'Id Participer',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Presence`
--
ALTER TABLE `Presence`
MODIFY `ID` int(1) NOT NULL AUTO_INCREMENT COMMENT 'Id presence',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Fonction`
--
ALTER TABLE `Fonction`
MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT COMMENT 'Id Fonction',AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `Droits`
--
ALTER TABLE `Droits`
MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT COMMENT 'Id Droits',AUTO_INCREMENT=4;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
