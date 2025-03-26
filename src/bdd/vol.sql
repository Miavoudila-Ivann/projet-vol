-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 26 mars 2025 à 08:52
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vol`
--

-- --------------------------------------------------------

--
-- Structure de la table `avion`
--

DROP TABLE IF EXISTS `avion`;
CREATE TABLE IF NOT EXISTS `avion` (
  `id_avion` int NOT NULL AUTO_INCREMENT,
  `modele_avion` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `capacite_avion` int NOT NULL,
  `img_avion` varchar(150) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id_avion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `compagnie`
--

DROP TABLE IF EXISTS `compagnie`;
CREATE TABLE IF NOT EXISTS `compagnie` (
  `id_compagnie` int NOT NULL,
  `nom_compagnie` int NOT NULL,
  `img_compagnie` varchar(150) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id_compagnie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id_reservation` int NOT NULL AUTO_INCREMENT,
  `ref_utilisateur` int NOT NULL,
  `ref_vole` int NOT NULL,
  PRIMARY KEY (`id_reservation`),
  KEY `ref_utilisateur` (`ref_utilisateur`,`ref_vole`),
  KEY `ref_vole` (`ref_vole`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `nom_uti` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `prenom_uti` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `ville_uti` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `date_naissance` date NOT NULL,
  `mail_uti` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `mdp` varchar(50) COLLATE latin1_bin NOT NULL,
  `role` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `vole`
--

DROP TABLE IF EXISTS `vole`;
CREATE TABLE IF NOT EXISTS `vole` (
  `id_vole` int NOT NULL AUTO_INCREMENT,
  `date_vole` date NOT NULL,
  `heure_vole` time(6) NOT NULL,
  `ville_arr` varchar(50) COLLATE latin1_bin NOT NULL,
  `ville_dep` varchar(50) COLLATE latin1_bin NOT NULL,
  `ref_avion` int NOT NULL,
  `ref_compagnie` int NOT NULL,
  PRIMARY KEY (`id_vole`),
  KEY `fk_ref_compagnie` (`ref_compagnie`),
  KEY `fk_ref_avion` (`ref_avion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avion`
--
ALTER TABLE `avion`
  ADD CONSTRAINT `avion_ibfk_1` FOREIGN KEY (`id_avion`) REFERENCES `vole` (`ref_avion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `compagnie`
--
ALTER TABLE `compagnie`
  ADD CONSTRAINT `compagnie_ibfk_1` FOREIGN KEY (`id_compagnie`) REFERENCES `vole` (`ref_compagnie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`ref_vole`) REFERENCES `vole` (`id_vole`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `reservation` (`ref_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
