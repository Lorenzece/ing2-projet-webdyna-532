-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 27 mai 2024 à 17:27
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
-- Base de données : `paiement`
--

-- --------------------------------------------------------

--
-- Structure de la table `coordonneespaiement`
--

CREATE TABLE `coordonneespaiement` (
  `coordonnees_id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse_ligne1` varchar(255) NOT NULL,
  `adresse_ligne2` varchar(255) DEFAULT NULL,
  `ville` varchar(100) NOT NULL,
  `code_postal` varchar(20) NOT NULL,
  `pays` varchar(50) NOT NULL,
  `numero_telephone` varchar(20) DEFAULT NULL,
  `carte_etudiant` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `coordonneespaiement`
--

INSERT INTO `coordonneespaiement` (`coordonnees_id`, `nom`, `prenom`, `adresse_ligne1`, `adresse_ligne2`, `ville`, `code_postal`, `pays`, `numero_telephone`, `carte_etudiant`) VALUES
(1, 'NomExample', 'PrenomExample', '123 Rue Exemple', 'Apt 4', 'ExempleVille', '12345', 'ExemplePays', '0123456789', '1234567890');

-- --------------------------------------------------------

--
-- Structure de la table `detailspaiement`
--

CREATE TABLE `detailspaiement` (
  `paiement_id` int(11) NOT NULL,
  `coordonnees_id` int(11) NOT NULL,
  `type_carte` enum('Visa','MasterCard','American Express','PayPal') NOT NULL,
  `numero_carte` varchar(20) NOT NULL,
  `nom_sur_carte` varchar(50) NOT NULL,
  `date_expiration` date NOT NULL,
  `code_securite` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `detailspaiement`
--

INSERT INTO `detailspaiement` (`paiement_id`, `coordonnees_id`, `type_carte`, `numero_carte`, `nom_sur_carte`, `date_expiration`, `code_securite`) VALUES
(1, 1, 'Visa', '4111111111111111', 'NomExample PrenomExample', '2025-12-31', '123');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `coordonneespaiement`
--
ALTER TABLE `coordonneespaiement`
  ADD PRIMARY KEY (`coordonnees_id`);

--
-- Index pour la table `detailspaiement`
--
ALTER TABLE `detailspaiement`
  ADD PRIMARY KEY (`paiement_id`),
  ADD KEY `coordonnees_id` (`coordonnees_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `coordonneespaiement`
--
ALTER TABLE `coordonneespaiement`
  MODIFY `coordonnees_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `detailspaiement`
--
ALTER TABLE `detailspaiement`
  MODIFY `paiement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `detailspaiement`
--
ALTER TABLE `detailspaiement`
  ADD CONSTRAINT `detailspaiement_ibfk_1` FOREIGN KEY (`coordonnees_id`) REFERENCES `coordonneespaiement` (`coordonnees_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
