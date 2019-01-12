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
  `ID_User` int(11) DEFAULT NULL COMMENT 'Id Utilisateur',
  `Email` varchar(60) NOT NULL DEFAULT '' COMMENT '@email de l utilisateur',
  `Password` varchar(40) COMMENT 'Mot de passe',
  `Prenom` varchar(30) DEFAULT NULL COMMENT 'Prenom de l utilisateur',
  `Nom` varchar(30) DEFAULT NULL COMMENT 'Nom de l utilisateur',
  `Pseudo` varchar(30) DEFAULT NULL COMMENT 'Pseudo de l utilisateur',
  `Adresse` varchar(100) NOT NULL COMMENT 'Adresse de l utilisateur',
  `Ville` char(50) NOT NULL COMMENT 'Ville de l utilisateur',
  `CodePostal` varchar(5) NOT NULL COMMENT 'Code Postal de l utilisateur', 
  `Telephone` varchar(8) NOT NULL COMMENT 'Telephone de l utilisateur',
  `ID_Presence` int(1) NOT NULL COMMENT 'Vous êtes la pour',
  `ID_Participer` int(1) NOT NULL COMMENT 'Vous participer à l aventure',
  `ID_Fonction` int(2) NOT NULL COMMENT 'Fonction de l utilisateur ',
  `ConjointEmail` varchar(60) NOT NULL COMMENT '@email de conjoint',
  `Photo` char(100) NOT NULL COMMENT 'trombinoscope',
  `ID_Vehicule` int(1) NOT NULL COMMENT 'Type de Vehicule',	
  `Id_Droit` int(1) NOT NULL COMMENT 'droit speciaux'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Gestion des Users';

--
-- Contenu de la table `Users`
--

INSERT INTO `Users` (`ID_User`, `Email`, `Password`, `Prenom`, `Nom`,`Pseudo`,`Adresse`, `Ville`, `CodePostal`, `Telephone`, `ID_Presence`, `ID_Participer`,`ID_Fonction`, `ConjointEmail`, `Photo`, `ID_Vehicule`, `ID_Droit`) VALUES
(1, 'marc.dulche@numericable.fr', '98b66c661624337f88c28c6f7b1137e0', 'Marc', 'Dulche','Sunspider', '17 Rue Maurice Barres', 'Plaisir', '78370', '0651390096', 2, 2, 1, 'jacqueline.dumarquez@numericable.fr', '', 1,1),
(1, 'jacqueline.dumarquez@numericable.fr', 'dc647eb65e6711e155375218212b3964', 'Jacqueline', 'Dumarquez','Pepette', '17 Rue Maurice Barres', 'Plaisir', '78370', '0651390096', 2, 2, 1, 'marc.dulche@numericable.fr', '', 1,1),
(3, 'eddy.dulche@free.fr', 'dc647eb65e6711e155375218212b3964', 'Eddy', 'Dulche','', '17 Rue Maurice Barres', 'Plaisir', '78370', '0651157029', 1, 1, 1, '', '', 0,1);

-- --------------------------------------------------------

--
-- Structure de la table `Participer`
--

DROP TABLE IF EXISTS `Participer`;
CREATE TABLE IF NOT EXISTS `Participer` (
`ID_Participer` int(1) NOT NULL COMMENT 'Id Participer',
  `Libelle` char(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Participer`
--

INSERT INTO `Participer` (`ID_Participer`, `Libelle`) VALUES
(1, 'Seul'),
(2, 'Avec votre conjoint'),
(3, 'Avec un(e) ami(e)');

-- --------------------------------------------------------

--
-- Structure de la table `Presence`
--

DROP TABLE IF EXISTS `Presence`;
CREATE TABLE IF NOT EXISTS `Presence` (
`ID_Presence` int(1) NOT NULL COMMENT 'Id presence',
  `Libelle` char(60) NOT NULL COMMENT 'Libelle'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Presence`
--

INSERT INTO `Presence` (`ID_Presence`, `Libelle`) VALUES
(1, 'Juste nous suivre'),
(2, 'Participer à l''aventure depuis Chicago'),
(3, 'Participer à l''aventure depuis le Texas');

--
-- Structure de la table `Fonction`
--

DROP TABLE IF EXISTS `Fonction`;
CREATE TABLE IF NOT EXISTS `Fonction` (
`ID_Fonction` int(2) NOT NULL COMMENT 'Id Fonction',
  `Libelle` char(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Fonction`
--

INSERT INTO `Fonction` (`ID_Fonction`, `Libelle`) VALUES
(1, 'Organisateur'),
(2, 'Adjoint'),
(3, 'Secrétaire'),
(4, 'Trésorier'),
(5, 'Webmaster'),
(6, 'Voyageur'),
(7, 'Visiteur');

--
-- Structure de la table `Droits`
--

DROP TABLE IF EXISTS `Droits`;
CREATE TABLE IF NOT EXISTS `Droits` (
`ID_Droit` int(2) NOT NULL COMMENT 'Id Droits',
  `Libelle` char(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Droits`
--

INSERT INTO `Droits` (`ID_Droit`, `Libelle`) VALUES
(1, 'Admin'),
(2, 'SuperUser'),
(3, 'Visiteur');

--
-- Structure de la table `Vehicules`
--

DROP TABLE IF EXISTS `Vehicules`;
CREATE TABLE IF NOT EXISTS `Vehicules` (
`ID_Vehicule` int(2) NOT NULL COMMENT 'Id Vehicule',
  `Libelle` char(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Vehicules`
--

INSERT INTO `Vehicules` (`ID_Vehicule`, `Libelle`) VALUES
(0, 'Sans'),
(1, 'Moto'),
(2, 'Auto');

-- --------------------------------------------------------


--
-- Index pour les tables exportées
--

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
 ADD PRIMARY KEY (`Email`), ADD UNIQUE KEY `ID_User` (`ID_User`);

--
-- Index pour la table `Participer`
--
ALTER TABLE `Participer`
 ADD PRIMARY KEY (`ID_Participer`);

--
-- Index pour la table `Presence`
--
ALTER TABLE `Presence`
 ADD PRIMARY KEY (`ID_Presence`);

--
-- Index pour la table `Fonction`
--
ALTER TABLE `Fonction`
 ADD PRIMARY KEY (`ID_Fonction`);

-- Index pour la table `Droits`
--
ALTER TABLE `Droits`
 ADD PRIMARY KEY (`ID_Droit`);

-- Index pour la table `Vehicules`
--
ALTER TABLE `Vehicules`
 ADD PRIMARY KEY (`ID_Vehicule`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Participer`
--
ALTER TABLE `Participer`
MODIFY `ID_Participer` int(1) NOT NULL AUTO_INCREMENT COMMENT 'Id Participer',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Presence`
--
ALTER TABLE `Presence`
MODIFY `ID_Presence` int(1) NOT NULL AUTO_INCREMENT COMMENT 'Id presence',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Fonction`
--
ALTER TABLE `Fonction`
MODIFY `ID_Fonction` int(2) NOT NULL AUTO_INCREMENT COMMENT 'Id Fonction',AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `Droits`
--
ALTER TABLE `Droits`
MODIFY `ID_Droit` int(2) NOT NULL AUTO_INCREMENT COMMENT 'Id Droits',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Vehicules`
--
ALTER TABLE `Vehicules`
MODIFY `ID_Vehicule` int(2) NOT NULL AUTO_INCREMENT COMMENT 'Id Vehicules',AUTO_INCREMENT=3;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
