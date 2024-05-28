-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 27 mai 2024 à 16:17
-- Version du serveur : 5.7.24
-- Version de PHP : 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet*`
--

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `password`) VALUES
(1, 'Hercule Barbell', 'hercule.barbell@exemple.com', 'Hercule1234'),
(2, 'Eva Lucian', 'eva.lucian@exemple.com', 'Eva1234'),
(3, 'Pierre Lonné', 'pierre.lonne@exemple.com', 'Pierre1234'),
(4, 'Céline Pulsar', 'céline.pulsar@exemple.com', 'Céline1234'),
(5, 'Claude Hernandez', 'claude.hernandez@exemple.com', 'Claude1234'),
(6, 'Sophie Bleur', 'sophie.bleur@exemple.com', 'Sophie1234'),
(7, 'Alex Bill', 'alex.bill@exemple.com', 'Alex1234'),
(8, 'Léa Bigorne', 'léa.bigorne@exemple.com', 'Léa1234'),
(9, 'Pascal Set', 'pascal.set@exemple.com', 'Pascal1234'),
(10, 'Marine Plouf', 'marine.plouf@exemple.com', 'Marine1234'),
(11, 'Dorian Vaché', 'dorian.vache@exemple.com', 'Dorian1234');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
