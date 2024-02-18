-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 08 Janvier 2024 à 08:45
-- Version du serveur :  5.6.20-log
-- Version de PHP :  5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `e-commerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `a_gpu`
--

CREATE TABLE IF NOT EXISTS `a_gpu` (
`Id_article` int(4) NOT NULL,
  `Nom_gpu` varchar(50) NOT NULL,
  `Description_gpu` varchar(1000) NOT NULL,
  `Id_marque` int(4) NOT NULL,
  `Id_gamme` varchar(4) NOT NULL,
  `Quantité` int(4) NOT NULL,
  `Prix_revient` float NOT NULL,
  `Prix_vente` float NOT NULL,
  `Id_vram` varchar(15) NOT NULL,
  `Id_frequence` varchar(15) NOT NULL,
  `Id_consommation` varchar(15) NOT NULL,
  `RGB` varchar(15) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `a_gpu`
--

INSERT INTO `a_gpu` (`Id_article`, `Nom_gpu`, `Description_gpu`, `Id_marque`, `Id_gamme`, `Quantité`, `Prix_revient`, `Prix_vente`, `Id_vram`, `Id_frequence`, `Id_consommation`, `RGB`) VALUES
(1, 'Test 1', 'Test gmlkqdjkrngmdlqkjn,gtdr', 1, '1', 12, 20, 350, '1', '1', '1', 'OUI');

-- --------------------------------------------------------

--
-- Structure de la table `compte_client`
--

CREATE TABLE IF NOT EXISTS `compte_client` (
`Id_client` int(4) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Adresse` varchar(60) NOT NULL,
  `Code_postal` varchar(50) NOT NULL,
  `Mdp` varchar(50) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `compte_client`
--

INSERT INTO `compte_client` (`Id_client`, `Nom`, `Prenom`, `Email`, `Adresse`, `Code_postal`, `Mdp`) VALUES
(1, 'dqdqdqd', 'qdqdq', 'rootdqdqdq', 'qdqdqd', 'qdqdqdq', 'rootdqdqdq');

-- --------------------------------------------------------

--
-- Structure de la table `consommation`
--

CREATE TABLE IF NOT EXISTS `consommation` (
`Id_consommation` int(4) NOT NULL,
  `Consommation` varchar(15) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `consommation`
--

INSERT INTO `consommation` (`Id_consommation`, `Consommation`) VALUES
(1, '125 W'),
(2, '170 W');

-- --------------------------------------------------------

--
-- Structure de la table `fgpu`
--

CREATE TABLE IF NOT EXISTS `fgpu` (
`Id_frequence` int(4) NOT NULL,
  `F_core` varchar(15) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `fgpu`
--

INSERT INTO `fgpu` (`Id_frequence`, `F_core`) VALUES
(1, '1815 MHz'),
(2, '1837 MHz');

-- --------------------------------------------------------

--
-- Structure de la table `gamme`
--

CREATE TABLE IF NOT EXISTS `gamme` (
`Id_gamme` int(4) NOT NULL,
  `Gamme` varchar(15) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `gamme`
--

INSERT INTO `gamme` (`Id_gamme`, `Gamme`) VALUES
(1, 'RTX 3000'),
(2, 'RTX 2000');

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE IF NOT EXISTS `marque` (
`id_marque` int(4) NOT NULL,
  `Marque` varchar(30) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `marque`
--

INSERT INTO `marque` (`id_marque`, `Marque`) VALUES
(1, 'Razer'),
(2, 'Steelseries');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
`Id_panier` int(4) NOT NULL,
  `Id_client` int(4) NOT NULL,
  `Id_article` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
`Id_type` int(4) NOT NULL,
  `Type` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `vram`
--

CREATE TABLE IF NOT EXISTS `vram` (
`Id_vram` int(11) NOT NULL,
  `Vram` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `a_gpu`
--
ALTER TABLE `a_gpu`
 ADD PRIMARY KEY (`Id_article`);

--
-- Index pour la table `compte_client`
--
ALTER TABLE `compte_client`
 ADD PRIMARY KEY (`Id_client`);

--
-- Index pour la table `consommation`
--
ALTER TABLE `consommation`
 ADD PRIMARY KEY (`Id_consommation`);

--
-- Index pour la table `fgpu`
--
ALTER TABLE `fgpu`
 ADD PRIMARY KEY (`Id_frequence`);

--
-- Index pour la table `gamme`
--
ALTER TABLE `gamme`
 ADD PRIMARY KEY (`Id_gamme`);

--
-- Index pour la table `marque`
--
ALTER TABLE `marque`
 ADD PRIMARY KEY (`id_marque`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
 ADD PRIMARY KEY (`Id_panier`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
 ADD PRIMARY KEY (`Id_type`);

--
-- Index pour la table `vram`
--
ALTER TABLE `vram`
 ADD PRIMARY KEY (`Id_vram`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `a_gpu`
--
ALTER TABLE `a_gpu`
MODIFY `Id_article` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `compte_client`
--
ALTER TABLE `compte_client`
MODIFY `Id_client` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `consommation`
--
ALTER TABLE `consommation`
MODIFY `Id_consommation` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `fgpu`
--
ALTER TABLE `fgpu`
MODIFY `Id_frequence` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `gamme`
--
ALTER TABLE `gamme`
MODIFY `Id_gamme` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `marque`
--
ALTER TABLE `marque`
MODIFY `id_marque` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
MODIFY `Id_panier` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
MODIFY `Id_type` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `vram`
--
ALTER TABLE `vram`
MODIFY `Id_vram` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
