-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 17 mai 2022 à 23:28
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
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `creation` datetime NOT NULL,
  `pseudo` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(320) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmation` tinyint(1) DEFAULT NULL,
  `hash_mdp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `newsletter` tinyint(1) DEFAULT NULL,
  `dateVegetarisme` date DEFAULT NULL,
  `signature` text COLLATE utf8mb4_unicode_ci,
  `type_utilisateur` int(255) DEFAULT NULL,
  `etape_inscription` tinyint(11) NOT NULL,
  `abonnement` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `creation`, `pseudo`, `prenom`, `nom`, `email`, `confirmation`, `hash_mdp`, `image`, `newsletter`, `dateVegetarisme`, `signature`, `type_utilisateur`, `etape_inscription`, `abonnement`) VALUES
(1, '2022-04-28 17:55:39', 'ecoatelant', 'Emilie', 'COATELANT', 'emiliecoatelant@outlook.fr', NULL, '$2y$10$57onhCmOu5Kj/ZNnDb0j6ecDuo56snAVOY2MUCrxR/y99QZXWzdOm', NULL, 1, NULL, NULL, 1, 4, 0),
(15, '2022-05-12 14:33:33', 'aneiina', 'Chloé', 'BERNASCONI', 'chloeb@gmail.com', NULL, '$2y$10$KbY/jKaNqCDlVUu0/1dzH.3VM.UlpxjWpnGl2mBYSULkFX8QXYu/O', 'aneina.png', NULL, NULL, NULL, NULL, 2, NULL),
(17, '2022-05-16 19:09:58', 'sandrine.bidan', 'Sandrine', 'BIDAN', 'sandrine0bidan@gmail.com', NULL, '$2y$10$2efSpp.KxRPeHERCcn25N.FMsSdYmZykX5VWAA7zXs.obKHRodPl.', NULL, NULL, NULL, NULL, NULL, 2, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
