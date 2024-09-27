-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 26 Avril 2024 à 08:34
-- Version du serveur :  5.6.20-log
-- Version de PHP :  5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `commerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
`Id_article` int(5) NOT NULL,
  `Type` int(5) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Marque` varchar(30) NOT NULL,
  `Gamme` varchar(20) NOT NULL,
  `Quantité` int(10) NOT NULL,
  `Prix_revient` float NOT NULL,
  `Prix_vente` float NOT NULL,
  `Critere_1` varchar(30) DEFAULT NULL,
  `Critere_2` varchar(30) DEFAULT NULL,
  `Critere_3` varchar(30) DEFAULT NULL,
  `Critere_4` varchar(30) DEFAULT NULL,
  `Critere_5` varchar(30) DEFAULT NULL,
  `Actif` varchar(255) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`Id_article`, `Type`, `Name`, `Description`, `Marque`, `Gamme`, `Quantité`, `Prix_revient`, `Prix_vente`, `Critere_1`, `Critere_2`, `Critere_3`, `Critere_4`, `Critere_5`, `Actif`) VALUES
(1, -1, 'non', 'non', '', '', 0, 0, 0, '', '', '', '', '', 'obligatoire pour pas buguer');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
`Id_commande` int(6) NOT NULL,
  `Id_article` int(6) NOT NULL,
  `Id_client` int(6) NOT NULL,
  `Quantité` int(6) NOT NULL,
  `Date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `compte_client`
--

CREATE TABLE IF NOT EXISTS `compte_client` (
`Id_client` int(5) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Adresse` varchar(60) NOT NULL,
  `Code_postal` int(10) NOT NULL,
  `Mdp` varchar(50) NOT NULL,
  `Solde` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `compte_client`
--

INSERT INTO `compte_client` (`Id_client`, `Nom`, `Prenom`, `Email`, `Adresse`, `Code_postal`, `Mdp`, `Solde`) VALUES
(-1, 'ADMIN', 'ADMIN', 'ADMIN@gmail.com', 'ADMIN', 91220, 'ADMIN', 0);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
`Id_panier` int(5) NOT NULL,
  `Id_article` int(5) NOT NULL,
  `Id_client` int(5) NOT NULL,
  `Quantité` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `type_composant`
--

CREATE TABLE IF NOT EXISTS `type_composant` (
`Id_type` int(4) NOT NULL,
  `Type` varchar(20) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `type_composant`
--

INSERT INTO `type_composant` (`Id_type`, `Type`) VALUES
(1, 'Carte Graphique'),
(2, 'Processeur'),
(3, 'RAM'),
(4, 'Carte mere'),
(5, 'Stockage'),
(6, 'Boitier'),
(7, 'Alimentation'),
(8, 'Refroidissement');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
 ADD PRIMARY KEY (`Id_article`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
 ADD PRIMARY KEY (`Id_commande`);

--
-- Index pour la table `compte_client`
--
ALTER TABLE `compte_client`
 ADD PRIMARY KEY (`Id_client`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
 ADD PRIMARY KEY (`Id_panier`);

--
-- Index pour la table `type_composant`
--
ALTER TABLE `type_composant`
 ADD PRIMARY KEY (`Id_type`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
MODIFY `Id_article` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
MODIFY `Id_commande` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `compte_client`
--
ALTER TABLE `compte_client`
MODIFY `Id_client` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
MODIFY `Id_panier` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type_composant`
--
ALTER TABLE `type_composant`
MODIFY `Id_type` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
