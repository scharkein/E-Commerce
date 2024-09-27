-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 26 Mai 2024 à 15:00
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`Id_article`, `Type`, `Name`, `Description`, `Marque`, `Gamme`, `Quantité`, `Prix_revient`, `Prix_vente`, `Critere_1`, `Critere_2`, `Critere_3`, `Critere_4`, `Critere_5`, `Actif`) VALUES
(1, -1, 'non', 'non', '', '', 10, 0, 0, '', '', '', '', '', 'obligatoire pour pas buguer'),
(2, 1, 'Nvidia Geforce RTX 4070', 'Grâce au DLSS 3, au ray tracing à haute vitesse et aux performances accélérées par IA, la carte graphique Gigabyte GeForce RTX 4070 WINDFORCE OC 12G vous permet d''obtenir une qualité graphique exceptionnelle pour jouer dans les meilleures conditions. Immersion totale garantie.', 'Nvidia', 'RTX 4000', 17, 119, 599, '12 GB', '2475 MHz', '200 Watt', 'Non', '', NULL),
(3, 1, 'Nvidia Geforce RTX 4090', 'La carte graphique NVIDIA GeForce RTX 4090 offre une rapidité extrême pour les joueurs comme pour les créateurs. Avec des performances hors norme et des capacités graphiques améliorées par Intelligence Artificielle, ce nouveau monstre de puissance vous permettra de plonger au coeur de l''action.', 'Nvidia', 'RTX 4000', 14, 319, 1599, '24 GB', '2520 MHz', '450 Watt', 'Non', '', NULL),
(4, 1, 'AMD Radeon RX 7900 XT', 'Basée sur l''architecture RDNA 3, la carte graphique ASRock AMD Radeon RX 7900 XT Phantom Gaming White 20GB OC est conçue pour le Jeu en 4K UHD. Puissante et efficace, elle ravira joueurs et créatifs à la recherche d''une solution graphique performante et novatrice.', 'AMD', 'RX 7000', 21, 199, 999, '16 GB', '2250 MHz', '300 Watt', 'Non', '', NULL),
(5, 1, 'Gigabyte Radeon RX 6600 EAGLE ', 'Basée sur l''architecture AMD RDNA 2 et prenant en charge le ray tracing, la carte graphique Gigabyte Radeon RX 6600 EAGLE 8G vous propose de jouer dans les meilleures conditions avec des graphismes sublimes et une fluidité remarquable. C''est la carte graphique idéale pour jouer en Full HD.', 'AMD', 'RX 6000', 19, 95, 479, '12 GB', '2581 MHz', '230 Watt', 'Non', '', NULL),
(6, 2, 'Intel core i9-13900K', 'Des jeux fluides et un PC qui ne ralentit pas. En offrant encore plus de puissance pour les programmes exigeants et les jeux et plus de coeurs pour les tâches de fond, les processeurs Intel Core de 13ème génération vous permettent de faire encore plus de choses et encore plus rapidement.', 'Intel', 'i9', 20, 117, 589, '24', '5.80 GHz', '253 Watt', '', '', NULL),
(7, 2, 'Intel core i7 13700K', 'Des jeux fluides et un PC qui ne ralentit pas. En offrant encore plus de puissance pour les programmes exigeants et les jeux et plus de coeurs pour les tâches de fond, les processeurs Intel Core de 13ème génération vous permettent de faire encore plus de choses et encore plus rapidement.', 'Intel', 'i7', 10, 83, 419, '16', '5.40 GHz', '253 Watt', '', '', NULL),
(8, 2, 'AMD Ryzen 9 7900X', 'Le processeur pour PC de bureau AMD Ryzen 9 7900X a été conçu pour vous permettre de jouer dans les meilleures conditions. Il offre des performances gaming à couper le souffle, met à disposition des technologies innovantes pour les créatifs et permet de concevoir des machines prêtes pour l''avenir.', 'AMD', 'Ryzen 9', 15, 90, 450, '12', '5.6GHz', '170 Watt', '', '', NULL),
(9, 2, 'AMD Ryzen 7 7700X', 'Le processeur pour PC de bureau AMD Ryzen 7 7700X a été conçu pour vous permettre de jouer dans les meilleures conditions. Il offre des performances gaming à couper le souffle, met à disposition des technologies innovantes pour les créatifs et permet de concevoir des machines prêtes pour l''avenir.', 'AMD', 'Ryzen 7', 35, 70, 350, '8', '5.4GHz', '105 Watt', '', '', NULL),
(10, 3, 'Corsaire vengeance', 'La mémoire Corsair Vengeance RGB DDR5 fournit des performances et des fréquences plus élevées avec de meilleures capacités optimisées pour les cartes mères Intel tout en illuminant votre PC avec un éclairage RGB dynamique sur dix zones personnalisables individuellement.', 'CORSAIR', 'Vengeance', 40, 39, 199, 'DDR5', '7600 MHz', '2x16 GB', 'Oui', '', NULL),
(11, 3, 'Corsaire dominator', 'Repoussez les limites de la performance mémoire avec la DDR5 Corsair Dominator Platinum RGB optimisée pour les plateformes Intel. La DDR5 fournit des fréquences plus élevées et de meilleures capacités que la génération précédente, ce qui aide votre système à accomplir des tâches complexes.', 'CORSAIR', 'Dominator', 20, 35, 175, 'DDR5', '6400 MHz', '2x16 GB', 'Non', '', NULL),
(12, 3, 'Kingston FURY Beast', 'La mémoire Kingston FURY Beast DDR5 intègre la toute dernière technologie de pointe aux plateformes de jeu de prochaine génération. Poussant la vitesse, la capacité et la fiabilité encore plus loin, la DDR5 arrive avec un arsenal de fonctionnalités améliorées.', 'Kingston', 'FURY Beast', 15, 35, 175, 'DDR5', '6000 MHz', '2x16 GB', 'Oui', '', NULL),
(13, 3, 'Kingston FURY Renegade', 'La mémoire Kingston FURY Renegade RGB DDR5 a été conçue pour des performances extrêmes sur les plateformes DDR5 de nouvelle génération. En plus d''être ultra-rapide (8000 MT/s) et d''embarquer 16 effets lumineux RGB, ce modèle présente un dissipateur thermique en aluminium noir et argent.', 'Kingston', 'FURY Renegade', 10, 73, 365, 'DDR5', '8000 MHz', '2x16 GB', 'Oui', '', NULL),
(14, 4, 'AMD MPG X670E CARBON WIFI', 'La MPG X670E CARBON WIFI est une carte mère gaming haut de gamme pour processeur AMD Ryzen sur socket AM5. Elle permettra de concevoir un PC gamer ultra performant basé sur les composants les plus puissants du marché, tels que les processeurs AMD Ryzen 7000 et les cartes graphiques PCI-Express 5.0.', 'AMD', 'MPG', 10, 124, 620, 'DDR5', '7800+MT/s', 'ATX', '', '', NULL),
(15, 4, 'ASROCK B650I Lightning WIFI', 'La carte mère ASRock B650I Lightning WiFi est le choix idéal pour accompagner un processeur AMD Ryzen 7000 sur socket AMD AM5 dans le cadre de l''assemblage d''une configuration gaming. Elle permet de prendre en charge la DDR5, les cartes graphiques PCIe 4.0 et les SSD à la norme PCI-Express 5.0.', 'ASROCK', 'B', 12, 56, 280, 'DDR5', '7200+MT/s', 'Mini-ITX', '', '', NULL),
(16, 4, 'Asus PRIME Z790-A WIFI', 'Conçue pour accueillir les processeurs Intel Core hybrides de 12ème et 13ème génération sur socket Intel LGA 1700, la carte mère ASUS PRIME Z790-A WI-FI servira de base solide à une configuration axée sur les performances.', 'Asus', 'Prime', 14, 60, 300, 'DDR5', '7000+MT/s', 'ATX', '', '', NULL),
(17, 4, 'Gigabyte Z690 GAMING X DDR4', 'La carte mère Gigabyte Z690 GAMING X DDR4 est conçue pour accueillir les processeurs Intel de 12ème génération sur socket LGA 1700. Elle permettra l''assemblage d''une configuration puissante et polyvalente capable de s''acquitter de toutes les tâches.', 'Gigabyte', 'Z', 22, 52, 260, 'DDR4', '5333+MT/s', 'ATX', '', '', NULL),
(18, 5, 'Samsung 980 Pro - 1 To', 'Le disque SSD 980 PRO 1 To de Samsung permet de métamorphoser les performances et la réactivité de votre machine. Bénéficiant de vitesses stratosphériques et d''une endurance très élevée, le Samsung 980 PRO s''appuie sur l''interface PCI-E 4.0 x4 ainsi que sur la technologie NVMe 1.3c.', 'Samsung', '980 Pro', 10, 25, 129, '1 To', '7000 Mo/s', 'SSD', '', '', NULL),
(19, 5, 'Crucial P3 - 1 To', 'Le SSD Crucial P3 grâce à son interface PCIe 3.0 offre des performances près de 6 fois supérieures à celles des disques SSD SATA et 22 fois supérieures à celles des disques durs classiques. Le P3 optimise le matériel existant et est une solution plus économique que l''achat de nouveaux systèmes', 'Crucial', 'P3', 24, 16, 80, '1 To', '3500 Mo/s', 'SSD', '', '', NULL),
(20, 5, 'Kingston NV2 - 1 To', 'Le SSD Kingston NV2 se dote d''une interface PCIe 4.0 x4 NVMe pour une solution de stockage qui offre des vitesses de lecture/écriture allant jusqu''à 3 500/2 800 Mo/s (suivant les modèles). Sa conception compacte rend le NV2 idéal pour les ordinateurs portables et les systèmes SFF.', 'Kingston', 'NV2', 17, 15, 75, '1 To', '3500 Mo/s', 'SSD', '', '', NULL),
(21, 5, 'Samsung 970 EVO Plus - 2 To', 'Le Samsung 970 EVO Plus M.2 PCIe 3.0 4x NVMe 1.3 dans sa version 2 To transporte votre PC dans un autre niveau de performances grâce à ses vitesses pouvant atteindre 3.5 Go/s en lecture et 3.3 Go/s en écriture et propose un cache LPDDR4 de 2 Go.', 'Samsung', '970 EVO Plus', 21, 34, 170, '2 To', '3500 Mo/s', 'SSD', '', '', NULL),
(22, 6, 'ZALMAN T6', '"Le ZALMAN T6 est un boîtier PC élégant et design, simple et efficace. Il permet l''assemblage d''une configuration bien refroidie et parée pour des évolutions futures. Pour ceux qui désireraient utiliser un lecteur optique, il est équipé d''une baie 5.25"" en façade."', 'ZALMAN', 'T6', 16, 10, 50, '200/430/377', 'ATX', 'ATX', '280 mm', '', NULL),
(23, 6, 'ZALMAN M3 PLUS RGB', 'Le boîtier ZALMAN M3 PLUS RGB va pouvoir accueillir une configuration ATX, Micro-ATX ou Mini-ITX avec une carte graphique de 355 mm de long. Ce boîtier moyen tour avec fenêtre en verre trempé sera un achat idéal pour assembler une configuration performante, axée vers le jeu et le multimédia.', 'ZALMAN', 'M3 PLUS RGB', 22, 14, 70, '210/457/407', 'mATX / Mini-ITX', 'ATX', '330 mm', '', NULL),
(24, 6, 'MSI MAG FORGE 100M', 'Conçu pour délivrer d''excellentes performances, le boîtier gaming MSI MAG FORGE 100M peut compter sur ses 3 ventilateurs de 120 mm inclus pour refroidir votre machine efficacement. Il peut accueillir une carte graphique de 330 mm maximum et propose un magnifique rétroéclairage RGB !', 'MSI', 'MAG FORGE 100M', 19, 15, 75, '210/499/421', 'ATX', 'ATX', '330 mm', '', NULL),
(25, 6, 'CORSAIR 4000D AIRFLOW', 'Le Corsair 4000D RGB Airflow est un superbe boîtier PC Moyen Tour. Il est sobre, efficace et bénéficie d''un design minimaliste sublime. Capable d''accueillir les composants les plus performants, il offre d''excellentes performances de refroidissement.', 'CORSAIR', '4000D AIRFLOW', 20, 21, 109, '230/466/453', 'ATX', 'E-ATX', '360 mm', '', NULL),
(26, 7, 'Corsair RM850x', 'L''alimentation Corsair RM850x est une alimentation PC 100% modulaire équipée d''un ventilateur innovant 135 mm. Idéale pour les PC gaming ou Power User de dernière génération, elle délivre une puissance stable et fiable et bénéficie de la certification 80PLUS Gold.', 'CORSAIR', 'RM850x', 10, 35, 179, '16/15/8,6', '850 Watt', 'ATX', '', '', NULL),
(27, 7, 'Corsair HX1200', 'L''unité d''alimentation Corsair HX1200 80PLUS Platinum est conçue pour les plates-formes de jeu, les systèmes surcadencés, ou pour n''importe quel PC sur lequel une stabilité électrique à toute épreuve est essentielle', 'CORSAIR', 'HX1200', 17, 62, 310, '15/20/8,6', '1200 Watt', 'ATX', '', '', NULL),
(28, 7, 'MSI MAG A650GL', 'Grâce à l''alimentation MSI MAG A650GL, vous disposez d''un bloc de 650 Watts certifié 80PLUS Gold avec un câblage entièrement modulaire et capable de délivrer des tensions stables à tous vos composants. Elle embarque une correction active du facteur de puissance et une topologie LLC Half Bridge.', 'MSI', 'MAG A650GL', 12, 17, 89, '14/15/8,6', '650 Watt', 'ATX', '', '', NULL),
(29, 7, 'SEASONIC PRIME TX-1000', 'L''alimentation Seasonic PRIME TX propose une certification 80+ Titanium, un design 100% modulaire et permet une utilisation Fanless en dessous de 40% de charge. Elle dispose d''un ventilateur silencieux de 135 mm et sa connectique riche lui permet d''alimenter une configuration gaming haut de gamme', 'SEASONIC', 'PRIME TX-1000', 15, 36, 180, '17/15,2/8,2', '1000 Watt', 'ATX', '', '', NULL),
(30, 8, 'Cooler Master MA612 Stealth', 'Le Cooler Master MasterAir MA8242 Stealth est un ventilateur CPU au design double tour pour des performances redoutables. Grâce à son dissipateur aluminium, ses 2 ventilateurs Mobius en Push-Pull, ses 8 caloducs et sa base en cuivre élargie, il est capable de refroidir efficacement votre CPU.', 'Cooler Master', 'MA612 Stealth', 15, 13, 68, 'Air', '62 CFM', 'LGA1700', '158 mm', '', NULL),
(31, 8, 'Noctua NH-D15', 'Digne héritier du légendaire NH-D14, dont sa construction est inspirée, et perpétuant la quête incessante d''une performance de refroidissement silencieuse, le NH-D15 est le modèle amiral de Noctua.', 'Noctua', 'NH-D15', 12, 22, 110, 'Air', '140.2 m³/h', 'Multi-socket', '165 mm', '', NULL),
(32, 8, 'ARCTIC Liquid Freezer II 360', 'Avec le kit de refroidissement à eau pour CPU tout-en-un Liquid Freezer II 360, Arctic met tout son savoir-faire au service du gaming grâce à une pompe de refroidissement compacte contrôlée par PWM et trois ventilateurs de 120 mm à roulement hydrodynamique.', 'ARCTIC', 'Liquid Freezer II 36', 23, 24, 122, 'Watercooling', '56.3 CFM', 'Multi-socket', '397 mm', '', NULL),
(33, 8, 'NZXT Kraken 360', 'Le watercooling AiO NZXT Kraken 360 vous apporte des performances de refroidissement optimales grâce à ses ventilateurs PWM F120P à haute pression statique et une personnalisation poussée grâce au logiciel NZXT CAM. La gamme Kraken propose une installation simplifiée grâce à un câble unique.', 'NZXT', 'Kraken', 19, 50, 250, 'Watercooling', '98.17 CFM', 'Multi-socket', '400 mm', '', NULL),
(34, 1, 'AMD Radeon RX 6800 XT GAMING X', 'La carte graphique AMD Radeon RX 6800 XT est propulsée par l''architecture AMD RDNA 2. Elle dotée de 72 unités de calcul améliorées,du nouvel AMD Infinity Cache de 128 Mo et jusqu''à 16 Go de mémoire dédiée GDDR6.', 'AMD', 'RX 6000', 13, 180, 900, '16 GB', '2285 MHz', '300 Watt', 'Oui', '', NULL),
(35, 1, 'Gigabyte GeForce RTX 4080 SUPE', 'Des jeux ultra-réalistes,ultra-fluides et ultra-immersifs,la carte graphique Gigabyte GeForce RTX 4080 SUPER WINDFORCE OC V2 16G met à votre disposition les technologies les plus avancées pour vous permettre de jouer dans les meilleures conditions,en très haute résolution ou en Réalité Virtuelle.', 'Nvidia', 'RTX 4000 SUPER', 10, 226, 1133, '16 GB', '2300 MHz', '320 Watt', 'Non', '', NULL),
(36, 1, 'ASUS Dual Radeon RX 7800 XT O1', 'L''architecture RDNA 3 d''AMD vous propulse dans le monde du jeu vidéo de manière unique et spectaculaire avec la carte graphique ASUS Dual Radeon RX 7800 XT O16G. Elle est parfaite pour le jeu en 1440p et au-delà.', 'AMD', 'RX 7000', 12, 123, 619, '16 GB', '2565 MHz', '270 Watt', 'Non', '', NULL),
(37, 1, 'ASUS Dual GeForce RTX 4060 OC ', 'Basée sur l''architecture NVIDIA Ada Lovelace,la carte graphique ASUS Dual GeForce RTX 4060 OC Edition 8GB s''appuie sur la technologie DLSS 3 et le ray tracing matériel pour sublimer les jeux les plus récents et vous permettre de vivre une expérience vidéoludique immersive et réaliste.', 'Nvidia', 'RTX 4000', 13, 71, 359, '8 GB', '1700 MHz', '115 Watt', 'Non', '', NULL),
(38, 2, 'Intel Core i7-14700KF', 'Avec plus de coeurs et des fréquences plus élevées,les processeurs Intel Core de 14ème génération vous permettent d''en faire plus,sans compromis sur les performances. Ils sont conçus pour répondre à tous vos besoins et pour jouer dans les meilleures conditions.', 'Intel', 'i7', 20, 99, 499, '20', '5.6 GHz', '125 Watt', '', '', NULL),
(39, 2, 'AMD Ryzen 9 5900X', 'Le processeur AMD Ryzen 9 5900X est ce qui se fait de mieux pour le jeu vidéo et le streaming : 12 Cores,24 Threads et GameCache 70 Mo. Sans parler des fréquences natives et boost qui atteignent des sommets pour vous permettre de profiter de vos jeux préférés dans les meilleures conditions.', 'AMD', 'Ryzen 9', 10, 71, 359, '12', '4.8 GHz', '105 Watt', '', '', NULL),
(40, 2, 'Intel Core i5-12400F', 'Avec plus de coeurs et plus de puissance,les processeurs Intel de 12ème génération (Alder Lake) sont prêts pour les jeux nouvelle génération,les cartes graphiques PCI-Express 5.0 ou encore la RAM DDR5. Ils vous permettront de concevoir des machines puissantes pour toutes les tâches.', 'Intel', 'i5', 15, 31, 159, '6', '4.4 GHz', '65 Watt', '', '', NULL),
(41, 2, 'AMD Ryzen 7 7800X3D', 'L''AMD Ryzen 7 7800X3D est le processeur gaming par excellence. Ce CPU Zen 4 ne propose rien de moins que 8 Coeurs physiques et 16 coeurs logiques,des fréquences de 4.2 GHz à 5.0 GHz et 104 Mo de V-Cache pour vous permettre d''atteindre des sommets de performances dans les jeux !', 'AMD', 'Ryzen 7', 11, 91, 459, '8', '5 GHz', '120 Watt', '', '', NULL),
(42, 3, 'Textorm', 'La RAM Textorm 32 Go (2x 16 Go) DDR4 2666 MHz CL19 est idéale pour l''intégration ou pour réaliser un upgrade PC. Cette mémoire vive abordable et performante fonctionne à une tension nominale de 1.2 Volts et est équipée de radiateurs pour une meilleure dissipation de la chaleur.', 'Textorm', 'Textorm', 24, 16, 81, 'DDR4', '2666 MHz', '2x16 GB', 'Non', '', NULL),
(43, 3, 'Fox Spirit Akura RGB', 'La RAM DDR4 Fox Spirit Akura RGB est idéale pour les configurations de dernière génération Intel et AMD. Performance et fiabilité sont au rendez-vous grâce à un grand radiateur ultra-efficace. Coté design,les LEDs RGB adressables offrent un rendu visuel splendide avec les cartes mères compatibles aRGB (ASUS,Gigabyte,MSI,ASRock).', 'Fox Spirit', 'Akura', 14, 13, 69, 'DDR4', '3200 MHz', '2x8 GB', 'Oui', '', NULL),
(44, 3, 'G.Skill Flare X5 Series Low Pr', 'Conçue pour les plates-formes AMD AM5 dotées de DDR5,la mémoire DDR5 de la série Flare X5 est conçue pour offrir de hautes performances dans un design discret. Dotée des profils d''overclocking AMD EXPO pour faciliter l''overclocking de la mémoire,les utilisateurs peuvent facilement obtenir des performances overclockées en activant simplement EXPO dans le BIOS sur les systèmes compatibles.', 'G.Skill', 'Flare X5 Series', 22, 30, 153, 'DDR5', '6000 MHz', '2x16 GB', 'Non', '', NULL),
(45, 3, 'Crucial ballistix rgb', 'La mémoire gamer Crucial Ballistix RGB est conçue pour l’overclocking haute performance et convient idéalment aux gamers et aux amateurs de sensations fortes cherchant à repousser les limites. Personnalisez votre machine avec 16 LED RGB réparties en 8 zones sur chaque module et contrôlez l’éclairage et la luminosité à l’aide de logiciels dédiés.Type de DIMM : Unbuffered .', 'Crucial', 'Crucial', 10, 28, 143, 'DDR5', '4800 MHz', '2x16 GB', 'Non', '', NULL),
(46, 4, 'ASUS TUF GAMING B760-PLUS WIFI', 'La carte mère ASUS TUF GAMING B760-PLUS WIFI conçue pour les processeurs Intel Core hybrides de 12ème et 13ème génération est idéale pour l''assemblage d''une configuration gaming puissante.', 'ASUS', 'TUF GAMING', 17, 41, 205, 'DDR5', '7200+MT/s', 'ATX', '', '', NULL),
(47, 4, 'Gigabyte B550 GAMING X V2', 'La carte mère Gigabyte B550 GAMING X V2 sera parfaite pour une configuration Gaming de pointe. Conçue pour les processeurs AMD Ryzen à partir de la 3ème génération sur socket AMD AM4,elle propose le PCI-Express 4.0 et la gestion de 128 Go de RAM DDR4.', 'Gigabyte', 'B550', 18, 24, 124, 'DDR4', '4800+MT/s', 'ATX', '', '', NULL),
(48, 4, 'MSI B760 GAMING PLUS WIFI', 'La carte mère MSI B760 GAMING PLUS WIFI conçue pour les processeurs Intel Core hybrides de 12ème et 13ème génération est idéale pour l''assemblage d''une configuration Gaming au coût maitrisé. Elle prend en charge les cartes graphiques PCI-Express 16x ainsi que la RAM DDR5.', 'MSI', 'B650', 17, 35, 179, 'DDR5', '6800+MT/s', 'ATX', '', '', NULL),
(49, 4, 'ASUS ROG STRIX B650-A GAMING W', 'La carte mère ASUS ROG STRIX B650-A GAMING WIFI est idéale pour concevoir un PC Gaming doté des technologies les plus avancées grâce à son socket AMD AM5 et à sa compatibilité avec les processeurs AMD Ryzen 7000.', 'ASUS', 'ROG STRIX', 18, 52, 264, 'DDR5', '6400+MT/s', 'ATX', '', '', NULL),
(50, 5, 'Samsung SSD 980 PRO M.2 PCIe N', 'Le disque SSD 980 PRO 2 To de Samsung permet de métamorphoser les performances et la réactivité de votre machine. Bénéficiant de vitesses stratosphériques et d''une endurance très élevée,le Samsung 980 PRO s''appuie sur l''interface PCI-E 4.0 x4 ainsi que sur la technologie NVMe 1.3c.', 'Samsung', '980 PRO', 16, 39, 199, '2 To', '7000 Mo/s', 'SSD', '', '', NULL),
(51, 5, 'Crucial P3 Plus 1 To', 'Le SSD NVMe Crucial P3 Plus 4 offre des performances supérieures avec des vitesses de lecture/d''écriture séquentielle pouvant atteindre 5 000 Mo/s / 4200 Mo/s (en fonction des modèles) grâce à son interface PCI-Express 4.0.', 'Crucial', 'P3', 15, 19, 99, '1 To', '5000 Mo/s', 'SSD', '', '', NULL),
(52, 5, 'Western Digital SSD WD_Black S', 'Le SSD M.2 2280 PCIe 4.0 NVMe Western Digital SSD WD Black SN770 offre à vos applications un lancement encore plus rapide et des temps d''accès ultra réduits. En jeu,il permet des latences minimales et des temps de chargement quasi instantanés.', 'Western Digital', 'WD_Black', 13, 21, 109, '1 To', '5150 Mo/s', 'SSD', '', '', NULL),
(53, 5, 'Textorm BM20 M.2 2280 PCIE NVM', 'Ce SSD Textorm de 1 To au format M.2 PCIe est idéal pour mettre à niveau un PC ou un PC portable compatible. Rapide et fiable,ce SSD Textorm est abordable et performant. Son format M.2 2280 et son interface PCIe 3.0 x4 permettent de l''intégrer facilement.', 'Textorm', 'BM20', 12, 16, 84, '1 To', '2600 Mo/s', 'SSD', '', '', NULL),
(54, 6, 'Zalman i3 Neo Black', 'Le boîtier Zalman i3 Neo Black va pouvoir accueillir une configuration ATX,Micro-ATX ou Mini-ITX avec une carte graphique de 355 mm de long. Ce boîtier moyen tour avec fenêtre en verre trempé sera un achat idéal pour assembler une configuration performante,axée vers le jeu et le multimédia.', 'Zalman', 'i3', 17, 12, 60, '219/484/422', 'ATX', 'ATX', '355 mm', '', NULL),
(55, 6, 'MSI MAG FORGE 120A AIRFLOW', 'Le boitier moyen tour MSI MAG FORGE 120A AIRFLOW propose un design épuré avec une façade en mesh pour un flux d''air optimisé et une paroi latérale en verre trempé pour une vue de choix sur votre configuration et les LEDs RGB issues des 6 ventilateurs déjà intégrés au boitier.', 'MSI', 'MAG FORGE', 18, 15, 79, '210/498/411', 'ATX', 'ATX', '330 mm', '', NULL),
(56, 6, 'NZXT H7 Flow RGB Noir', 'Tout comme les autres boîtiers de la série H de NZXT ce boîtier H7 Flow RGB est conçu pour la performance et le silence. Elégant avec son panneau en verre trempé,il est prêt à accueillir la configuration de vos rêves. Il peut recevoir une carte mère au format Mini-ITX,Micro ATX,ou ATX.', 'NZXT', 'H7', 25, 32, 164, '230/505/480', 'ATX', 'ATX', '400 mm', '', NULL),
(57, 6, 'Fractal Design North XL TG Cha', 'Le boitier Fractal Design North XL TG Charcoal Dark doit son originalité,à l''introduction de matériaux naturels comme le noyer et des détails sur mesure pour intégrer élégamment ce boitier à votre espace de vie. Alliant design épuré et ingénierie avancée du flux d''air.', 'Fractal', 'Design North', 24, 33, 169, '240/509/503', 'E-ATX', 'ATX', '413 mm', '', NULL),
(58, 7, 'Fox Spirit HG 850 80PLUS Gold', 'L''alimentation PC au format ATX Fox Spirit HG 850 dispose d''une puissance de 850 Watts avec une certification 80 Plus Gold. Grâce à sa compatibilité avec la norme ATX 3.0,elle propose un câble PCIe 5.0 / 12VHPWR qui permettra de fournir la puissance nécessaire aux cartes graphiques récentes.', 'Fox Spirit', 'HG 850', 10, 24, 124, '86/150/150', '850 Watt', 'ATX', '', '', NULL),
(59, 7, 'Corsair RM850e 80PLUS Gold', 'L''alimentation 100% modulaire Corsair RMe Series est conçue pour apporter une alimentation efficace 80 PLUS Gold à votre PC. Avec deux câbles EPS12V et son connecteur 16 broches 12VHPWR,l''alimentation RMe a toutes les connexions nécessaires pour alimenter les PC modernes les plus exigeants.', 'Corsair', 'RM850e', 12, 30, 150, '86/150/140', '850 Watt', 'ATX', '', '', NULL),
(60, 7, 'Textorm TX650M+ V2', 'Idéale pour l''intégration,l''alimentation PC Textorm TX650M+ V2 a été développée avec comme principal objectif un fonctionnement fiable,stable et silencieux avec un minimum de perte. Pour cela,Textorm a intégré des circuits et des composants triés sur le volet,gages de fiabilité et de qualité.', 'Textorm', 'TX650M+', 11, 14, 74, '86/150/146', '650 Watt', 'ATX', '', '', NULL),
(61, 7, 'Fox Spirit HG 750 80PLUS Gold', 'L''alimentation PC au format ATX Fox Spirit HG 750 dispose d''une puissance de 750 Watts avec une certification 80 Plus Gold. Grâce à sa compatibilité avec la norme ATX 3.0,elle propose un câble PCIe 5.0 / 12VHPWR qui permettra de fournir la puissance nécessaire aux cartes graphiques récentes.', 'Fractal', 'HG 750', 13, 22, 114, '86/150/150', '750 Watt', 'ATX', '', '', NULL),
(62, 8, 'MSI MAG CORELIQUID 360R V2', 'Le MAG CORELIQUID 360R V2 de MSI a tout ce que vous recherchez dans un refroidisseur watercooling. Il allie des matériaux de qualité qui offrent une durabilité exemplaire à des technologies de dissipation thermique extrêmement efficaces.', 'MSI', 'MAG', 12, 27, 139, 'Watercooling', '78.73 CFM', 'Multi-socket', '152 mm', '', NULL),
(63, 8, 'NZXT Kraken 240', 'Le watercooling AiO NZXT Kraken 240 vous apporte des performances de refroidissement optimales grâce à ses ventilateurs PWM F120P à haute pression statique et une personnalisation poussée grâce au logiciel NZXT CAM. La gamme Kraken propose une installation simplifiée grâce à un câble unique.', 'NZXT', 'Kraken', 10, 32, 160, 'Watercooling', '78.02 CFM', 'Multi-socket', '156 mm', '', NULL),
(64, 8, 'Fox Spirit Cold Snap VT120 BLA', 'Le Fox Spirit Cold Snap VT120 BLACK V2 est un système de refroidissement hautement performant pour processeur. Équipé d''un ventilateur silencieux 120 mm,de heatpipes en cuivre et d''un dissipateur aluminium à ailettes fines,il est capable de dissiper jusqu''à 180W de TDP.', 'Fox Spirit', 'Cold Snap', 10, 7, 35, 'Air', '64.5 CFM', 'Multi-socket', '157.5 mm', '', NULL),
(65, 8, 'Noctua NH-D15 Chromax Black', 'Digne héritier du légendaire NH-D14,dont sa construction est inspirée,et perpétuant la quête incessante d''une performance de refroidissement silencieuse,le NH-D15 est le modèle amiral de Noctua.', 'Noctua', 'NH-D15', 11, 29.8, 149, 'Air', '140.2 m³/h', 'Multi-socket', '165 mm', '', NULL),
(66, 6, 'cool', 'il est bien', 'wazaaa', 'raze', 12, 0.0509688, 0.254844, '210/498/411', 'gmg', 'ATX', '280 mm', 'NULL', NULL),
(67, 4, 'Dan', 'fdsuy', 'AMD', 'MPG', 11, 17.45, 87.25, 'DDR5', '7800+MT/s', 'ATX', 'NULL', 'NULL', NULL),
(68, 6, 'bhjbhjbhj', 'bn j', 'ZALMAN', 'T6', 45, 17.45, 87.25, '200/430/377', 'ATX', 'ATX', '280 mm', 'NULL', NULL),
(69, 5, 'pio', 'jhfgx', 'Samsung', '980 Pro', 19, 1, 5, '1 To', '7000 Mo/s', 'SSD', 'NULL', 'NULL', NULL),
(70, 5, 'pio', 'jhfgx', 'Samsung', '980 Pro', 17, 1, 5, '1 To', '7000 Mo/s', 'SSD', 'NULL', 'NULL', NULL),
(71, 5, 'pio', 'jhfgx', 'Samsung', '980 Pro', 23, 1, 5, '1 To', '7000 Mo/s', 'SSD', 'NULL', 'NULL', NULL),
(72, 5, 'pio', 'jhfgx', 'Samsung', '980 Pro', 12, 1, 5, '1 To', '7000 Mo/s', 'SSD', 'NULL', 'NULL', NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`Id_commande`, `Id_article`, `Id_client`, `Quantité`, `Date`) VALUES
(1, 7, 1, 30, '2024-05-14 08:34:34'),
(2, 2, 1, 15, '2024-05-14 08:34:34'),
(3, 4, 1, 2, '2024-05-14 08:36:23'),
(4, 34, 1, 2, '2024-05-14 08:36:23'),
(5, 3, 1, 3, '2024-05-14 09:03:44'),
(6, 2, 1, 1, '2024-05-14 09:06:09'),
(7, 2, 1, 1, '2024-05-14 09:06:35'),
(8, 3, 1, 1, '2024-05-14 09:06:35');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `compte_client`
--

INSERT INTO `compte_client` (`Id_client`, `Nom`, `Prenom`, `Email`, `Adresse`, `Code_postal`, `Mdp`, `Solde`) VALUES
(-1, 'ADMIN', 'ADMIN', 'ADMIN@gmail.com', 'ADMIN', 91220, 'ADMIN', 12018),
(1, 'josef', 'statami', 'salut@1', 'rue', 0, 'pipi', 4710.25),
(2, 'AAAAAdljbgoijdf', 'AAAAA', 'AAAAA@gmail.com', 'AAAAA@gmail.com', 91220, 'AAAAA', 0);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
`Id_panier` int(5) NOT NULL,
  `Id_article` int(5) NOT NULL,
  `Id_client` int(5) NOT NULL,
  `Quantité` int(5) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `panier`
--

INSERT INTO `panier` (`Id_panier`, `Id_article`, `Id_client`, `Quantité`) VALUES
(16, 7, 2, 1),
(15, 3, 2, 1);

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
MODIFY `Id_article` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
MODIFY `Id_commande` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `compte_client`
--
ALTER TABLE `compte_client`
MODIFY `Id_client` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
MODIFY `Id_panier` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `type_composant`
--
ALTER TABLE `type_composant`
MODIFY `Id_type` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
