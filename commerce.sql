-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 31 Janvier 2024 à 23:46
-- Version du serveur :  5.6.20-log
-- Version de PHP :  5.5.15

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
`Id_article` int(4) NOT NULL,
  `Type` int(4) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Marque` varchar(30) NOT NULL,
  `Gamme` varchar(20) NOT NULL,
  `Quantité` int(6) NOT NULL,
  `Prix_revient` float NOT NULL,
  `Prix_vente` float NOT NULL,
  `Critere_1` varchar(30) NOT NULL,
  `Critere_2` varchar(30) NOT NULL,
  `Critere_3` varchar(30) DEFAULT NULL,
  `Critere_4` varchar(30) DEFAULT NULL,
  `Critere_5` varchar(30) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`Id_article`, `Type`, `Name`, `Description`, `Marque`, `Gamme`, `Quantité`, `Prix_revient`, `Prix_vente`, `Critere_1`, `Critere_2`, `Critere_3`, `Critere_4`, `Critere_5`) VALUES
(1, 1, 'RTX 3070 TI ', 'Elle est cool, test 1', 'Gigabyte', 'RTX', 75, 50, 450, '16', '1770 MHz', '300 W', 'Oui ', ''),
(46, 1, 'GTX 1060', 'efsefsfsfse', 'Gigabyte', 'GTX', 115, 12, 34, '8', '1700 MHz', '325 W', 'Oui', ''),
(48, 4, 'B450 GAMING X PLUS ', 'fkhjgsbeofkljsbeflkjbslfkjbslfkjesbf', 'ASUS ', 'B450', 16, 30, 200, 'DDR4', '7600 MHz', 'ATX', NULL, ''),
(47, 1, 'Amd radeon 3600x', 'qdqzdqdqdqzdq', 'AMD', 'Radeon', 14, 567, 35, '12', '1600 MHz', '290 W', 'Non', ''),
(27, 2, 'i9-13900K', 'qdqzdsqzdsqzdszdqdqd', 'Intel', 'i9', 20, 117, 589, '24', '5.80 GHz', '253 W', NULL, ''),
(28, 3, 'Corsaire vengeance', 'zqdqdqdzqdqdqdq', 'Corsaire', 'Vengeance', 40, 39, 199, 'DDR5', '7600 MHz', '2x16GB', 'oui', ''),
(29, 3, 'AMD MPG X670E CARBON WIFI', 'dqdzqdqqdqdqdzqd', 'AMD', 'MPG', 10, 124, 620, 'DDR5', '7800+MT/s', 'ATX', NULL, ''),
(50, 6, 'Boitier de l''espace', 'Ne prend pas la poussière, une décoration high-tech qui s''intègre parfaitement dans n''importe quel intérieur.', 'Intel', 'COooool', 78, 50, 348, '85X75X38', 'ATX', 'Gros', 'tres long', ''),
(34, 5, 'Samsung 1T NVME', 'qzdqzdzqzdqdzqdzqdqzqdzdqz', 'Samsung', 'che pas quoi', 16, 12, 45, 'SSD', '300 mb/s', '1T0', NULL, '');

-- --------------------------------------------------------

--
-- Structure de la table `compte_client`
--

CREATE TABLE IF NOT EXISTS `compte_client` (
`Id_client` int(4) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Adresse` varchar(60) NOT NULL,
  `Code_postal` int(10) NOT NULL,
  `Mdp` varchar(50) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `compte_client`
--

INSERT INTO `compte_client` (`Id_client`, `Nom`, `Prenom`, `Email`, `Adresse`, `Code_postal`, `Mdp`) VALUES
(1, 'AAAAA', 'AAAAA', 'AAAAA@gmail.com', 'Chez moi ', 91220, 'AAAAA'),
(2, 'BBBBB', 'BBBBB', 'BBBBB@gmail.com', 'Chez moi ', 91220, 'BBBBB'),
(3, 'DUPUIS', 'PAPA', 'sss', 'qzd', 91220, 'ssqdzdsq'),
(7, 'ADMIN', 'ADMIN', 'ADMIN@gmail.com', 'ADMIN', 91220, 'ADMIN'),
(8, 'Maxime', 'Carletto', 'mhexicain@gmail.com', '16 rue des capucines', 91630, 'max');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
`Id_panier` int(4) NOT NULL,
  `Id_article` int(4) NOT NULL,
  `Id_client` int(4) NOT NULL,
  `Quantité` int(4) NOT NULL
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
MODIFY `Id_article` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT pour la table `compte_client`
--
ALTER TABLE `compte_client`
MODIFY `Id_client` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
MODIFY `Id_panier` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type_composant`
--
ALTER TABLE `type_composant`
MODIFY `Id_type` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
