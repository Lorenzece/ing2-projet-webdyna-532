-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 28 mai 2024 à 12:30
-- Version du serveur : 5.7.24
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `coach`
--

-- --------------------------------------------------------

--
-- Structure de la table `coach`
--

CREATE TABLE `coach` (
  `ID` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Activité` varchar(255) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `adresse bureau` varchar(255) NOT NULL,
  `disponibilité` varchar(255) NOT NULL,
  `CV` varchar(255) NOT NULL,
  `courier` varchar(255) NOT NULL,
  `téléphone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `coach`
--

INSERT INTO `coach` (`ID`, `Nom`, `Activité`, `Photo`, `adresse bureau`, `disponibilité`, `CV`, `courier`, `téléphone`) VALUES
(1, 'Hercule Barbell', 'Musculation', 'C:\\MAMP\\htdocs\\projet_info\\Photo_Coach_Masculin\\photo1.jpg', '123 Rue de la Force, 75001 Paris, France', 'Lundi : 16h - 21h\r\nMardi : 16h - 21h\r\nMercredi : - - - \r\nJeudi : 16h - 21h\r\nVendredi : 16h - 21h\r\nSamedi : 14h - 19h\r\nDimanche : - - - ', 'C:\\MAMP\\htdocs\\projet_info\\CV\\CV1.png', 'hercule.barbell@example.com', '06 12 34 56 78'),
(2, 'Eva Lucian', 'Fitness', 'C:\\MAMP\\htdocs\\projet_info\\Photo_Coach_Féminin\\photo2', '45 Avenue de la Vitalité, 92100 Boulogne-Billancourt, France', 'Lundi : 14h - 20h\r\nMardi : 14h - 20h\r\nMercredi : 14h - 20h\r\nJeudi : 14h - 20h\r\nVendredi : 14h - 20h\r\nSamedi : - - -\r\nDimanche : - - -', 'C:\\MAMP\\htdocs\\projet_info\\CV\\CV2.png', 'eva.lucian@example.com', '06 98 76 54 32'),
(3, 'Pierre Lonné', 'Biking', 'C:\\MAMP\\htdocs\\projet_info\\Photo_Coach_Masculin\\photo3.jpg', '78 Rue de la Pédale, 92200 Neuilly-sur-Seine, France', 'Lundi : 10h - 20h\r\nMardi : 10h - 20h\r\nMercredi : 10h - 20h\r\nJeudi : 10h - 20h\r\nVendredi : 10h - 20h\r\nSamedi : 10h - 20h\r\nDimanche : - - -', 'C:\\MAMP\\htdocs\\projet_info\\CV\\CV3.png', 'pierre.lonne@example.com', '06 45 67 89 01'),
(4, 'Céline Pulsar', 'Cardio-Training', 'C:\\MAMP\\htdocs\\projet_info\\Photo_Coach_Féminin\\photo4.jpg', '32 Rue du Souffle, 92300 Levallois-Perret, France', 'Lundi : 17h - 21h\r\nMardi : 17h - 21h\r\nMercredi : 17h - 21h\r\nJeudi : 17h - 21h\r\nVendredi : 17h - 21h\r\nSamedi : 10h - 19h\r\nDimanche : - - - ', 'C:\\MAMP\\htdocs\\projet_info\\CV\\CV4.png', 'celine.pulsar@example.com', '06 12 34 56 78'),
(5, 'Claude Hernandez', 'Cours Collectifs', 'C:\\MAMP\\htdocs\\projet_info\\Photo_Coach_Masculin\\photo5.jpg', '56 Rue de l\'Énergie, 94110 Arcueil, France', 'Lundi : 18h - 23h \r\nMardi : 18h - 23h \r\nMercredi : 18h - 23h \r\nJeudi : 18h - 23h \r\nVendredi : 18h - 23h \r\nSamedi : - - - \r\nDimanche : - - -', 'C:\\MAMP\\htdocs\\projet_info\\CV\\CV5.png', 'claude.hernandez@example.com', '06 78 90 12 34'),
(6, 'Sophie Bleur', 'Basketball', 'C:\\MAMP\\htdocs\\projet_info\\Photo_Coach_Féminin\\photo6.jpg', '23 Rue du Panier, 93160 Noisy-le-Grand, France', 'Lundi : 9H - 21 h\r\nMardi : 9H - 21 h\r\nMercredi : 9H - 21 h\r\nJeudi : 9H - 21 h\r\nVendredi : 9H - 21 h\r\nSamedi : - - -\r\nDimanche : - - -', 'C:\\MAMP\\htdocs\\projet_info\\CV\\CV6.png', 'sophie.bleur@example.com', '06 54 32 10 98'),
(7, 'Alex Bill', 'Football', 'C:\\MAMP\\htdocs\\projet_info\\Photo_Coach_Masculin\\photo7.jpg', '17 Avenue des Buttes, 92130 Issy-les-Moulineaux, France', 'Lundi : 17h - 23h\r\nMardi : 17h - 23h\r\nMercredi : 17h - 23h\r\nJeudi : 17h - 23h\r\nVendredi : 17h - 23h\r\nSamedi : 10h - 20h\r\nDimanche : 10h - 13h', 'C:\\MAMP\\htdocs\\projet_info\\CV\\CV7.png', 'alex.bill@example.com', '06 34 56 78 90'),
(8, 'Léa Bigorne', 'Rugby', 'C:\\MAMP\\htdocs\\projet_info\\Photo_Coach_Féminin\\photo8.jpg', '12 Rue du Stade, 93170 Bagnolet, France', 'Lundi : 10h - 22h\r\nMardi : 10h - 22h\r\nMercredi : 10h - 22h\r\nJeudi : 10h - 22h\r\nVendredi : 10h - 22h\r\nSamedi : 10h - 19h\r\nDimanche : - - -', 'C:\\MAMP\\htdocs\\projet_info\\CV\\CV8.png', 'lea.bigorne@example.com', '06 23 45 67 89'),
(9, 'Pascal Set', 'Tennis', 'C:\\MAMP\\htdocs\\projet_info\\Photo_Coach_Masculin\\photo9.jpg', '89 Avenue des Courtisans, 94130 Nogent-sur-Marne, France', 'Lundi : 14h - 20h\r\nMardi : 14h - 20h\r\nMercredi : 14h - 20h\r\nJeudi : 14h - 20h\r\nVendredi : 14h - 20h\r\nSamedi : 10h - 20h\r\nDimanche : 10h - 13h', 'C:\\MAMP\\htdocs\\projet_info\\CV\\CV9.png', 'pascal.set@example.com', '06 89 76 54 32'),
(10, 'Marine Plouf', 'Natation', 'C:\\MAMP\\htdocs\\projet_info\\Photo_Coach_Féminin\\photo10.jpg', '14 Rue des Ondines, 94220 Charenton-le-Pont, France', 'Lundi : 10h - 19h \r\nMardi : 10h - 19h \r\nMercredi : 10h - 19h \r\nJeudi : 10h - 19h \r\nVendredi : 10h - 19h \r\nSamedi : - - -\r\nDimanche : - - -', 'C:\\MAMP\\htdocs\\projet_info\\CV\\CV10.png', 'marine.plouf@example.com', '06 98 75 54 32'),
(11, 'Dorian Vaché', 'Plongeon', 'C:\\MAMP\\htdocs\\projet_info\\Photo_Coach_Masculin\\photo11.jpg', '5 Rue des Halles, 92100 Boulogne-Billancourt, France', 'Lundi : 10h - 20h\r\nMardi : 14h - 23h\r\nMercredi : 10h - 20h\r\nJeudi : 10h - 20h\r\nVendredi : 14h - 23h\r\nSamedi : 10h - 20h\r\nDimanche : - - -', 'C:\\MAMP\\htdocs\\projet_info\\CV\\CV11.png', 'dorian.vache@example.com', '06 78 12 34 56');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `coach`
--
ALTER TABLE `coach`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
