-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 18 mai 2022 à 23:16
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vegandco`
--

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE IF NOT EXISTS `recette` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temps` time DEFAULT NULL,
  `difficulte` int(1) NOT NULL,
  `prix` double DEFAULT NULL,
  `cuisson` time DEFAULT NULL,
  `repos` time DEFAULT NULL,
  `preparation` time NOT NULL,
  `categorie` int(11) DEFAULT NULL,
  `auteur` int(11) DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `personne` tinyint(4) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `moderation` datetime DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`id`, `titre`, `temps`, `difficulte`, `prix`, `cuisson`, `repos`, `preparation`, `categorie`, `auteur`, `image`, `personne`, `updated`, `moderation`, `note`) VALUES
(1, 'Tarte à la fraise', '30:00:00', 1, NULL, '30:00:00', '30:00:00', '30:00:00', 4, 1, 'taf.jpg', 6, NULL, NULL, 'false'),
(2, 'Tarte au citron meringuée', '30:00:00', 1, NULL, '30:00:00', '30:00:00', '30:00:00', 3, 1, 'tarte-au-citron.jpg', 6, NULL, NULL, 'false'),
(3, 'Hoummous', '03:30:00', 3, NULL, '00:30:00', NULL, '00:30:00', 1, NULL, 'houmous.png', 1, NULL, NULL, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
