-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 12 mai 2022 à 22:45
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
CREATE DATABASE IF NOT EXISTS `vegandco` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `vegandco`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `titre` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `auteur` int(255) DEFAULT NULL,
  `source` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie_recette`
--

DROP TABLE IF EXISTS `categorie_recette`;
CREATE TABLE IF NOT EXISTS `categorie_recette` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie_recette`
--

INSERT INTO `categorie_recette` (`id`, `nom`, `parent`) VALUES
(1, 'Entrée', NULL),
(2, 'Plat', NULL),
(3, 'Dessert', NULL),
(4, 'Avec des fraises', 3),
(5, 'Apéritif', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `auteur` int(255) NOT NULL,
  `recette` int(255) NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etapes_recette`
--

DROP TABLE IF EXISTS `etapes_recette`;
CREATE TABLE IF NOT EXISTS `etapes_recette` (
  `num_etape` tinyint(4) NOT NULL,
  `recette` int(255) NOT NULL,
  `contenu` int(11) NOT NULL,
  PRIMARY KEY (`num_etape`,`recette`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `forum_discussion`
--

DROP TABLE IF EXISTS `forum_discussion`;
CREATE TABLE IF NOT EXISTS `forum_discussion` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `sujet` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `forum_messages`
--

DROP TABLE IF EXISTS `forum_messages`;
CREATE TABLE IF NOT EXISTS `forum_messages` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `utilisateur` int(255) NOT NULL,
  `discussion` int(255) NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_ecriture` datetime NOT NULL,
  `date_modification` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ingredient_recette`
--

DROP TABLE IF EXISTS `ingredient_recette`;
CREATE TABLE IF NOT EXISTS `ingredient_recette` (
  `ingredient` int(255) NOT NULL,
  `recette` int(255) NOT NULL,
  `quantite` smallint(6) NOT NULL,
  `type_quantite` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

DROP TABLE IF EXISTS `recette`;
CREATE TABLE IF NOT EXISTS `recette` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temps` time NOT NULL,
  `difficulte` int(1) NOT NULL,
  `prix` double DEFAULT NULL,
  `cuisson` time NOT NULL,
  `repos` time DEFAULT NULL,
  `preparation` time NOT NULL,
  `categorie` int(11) NOT NULL,
  `auteur` int(11) DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personne` tinyint(4) NOT NULL,
  `updated` datetime DEFAULT NULL,
  `moderation` datetime DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`id`, `titre`, `temps`, `difficulte`, `prix`, `cuisson`, `repos`, `preparation`, `categorie`, `auteur`, `image`, `personne`, `updated`, `moderation`, `note`) VALUES
(1, 'Tarte à la fraise', '30:00:00', 1, NULL, '30:00:00', '30:00:00', '30:00:00', 3, 1, 'taf.jpg', 6, NULL, NULL, 'false'),
(2, 'Tarte au citron meringuée', '30:00:00', 1, NULL, '30:00:00', '30:00:00', '30:00:00', 3, 1, 'tarte-au-citron.jpg', 6, NULL, NULL, 'false'),
(3, 'Hoummous', '03:30:00', 3, NULL, '00:30:00', NULL, '00:30:00', 1, NULL, 'houmous.png', 1, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Structure de la table `recettes_favorites`
--

DROP TABLE IF EXISTS `recettes_favorites`;
CREATE TABLE IF NOT EXISTS `recettes_favorites` (
  `utilisateur` int(255) NOT NULL,
  `recette` int(255) NOT NULL,
  PRIMARY KEY (`utilisateur`,`recette`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recuperation`
--

DROP TABLE IF EXISTS `recuperation`;
CREATE TABLE IF NOT EXISTS `recuperation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(320) NOT NULL,
  `code_recuperation` int(11) NOT NULL,
  `date_heure_recuperation` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `repas`
--

DROP TABLE IF EXISTS `repas`;
CREATE TABLE IF NOT EXISTS `repas` (
  `utilisateur` int(255) NOT NULL,
  `type` int(1) NOT NULL,
  `viande` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`date`,`type`,`utilisateur`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `id` int(255) NOT NULL,
  `token` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `statistiques_jours_vegetarismes`
--

DROP TABLE IF EXISTS `statistiques_jours_vegetarismes`;
CREATE TABLE IF NOT EXISTS `statistiques_jours_vegetarismes` (
  `id_util` int(11) NOT NULL,
  `jour` int(11) NOT NULL,
  `nb_repas_viandes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nom` int(11) NOT NULL,
  `type_post` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tag_article`
--

DROP TABLE IF EXISTS `tag_article`;
CREATE TABLE IF NOT EXISTS `tag_article` (
  `tag` int(255) NOT NULL,
  `article` int(255) NOT NULL,
  PRIMARY KEY (`tag`,`article`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tag_recette`
--

DROP TABLE IF EXISTS `tag_recette`;
CREATE TABLE IF NOT EXISTS `tag_recette` (
  `tag` int(255) NOT NULL,
  `recette` int(255) NOT NULL,
  PRIMARY KEY (`tag`,`recette`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_post`
--

DROP TABLE IF EXISTS `type_post`;
CREATE TABLE IF NOT EXISTS `type_post` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nom` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_quantite`
--

DROP TABLE IF EXISTS `type_quantite`;
CREATE TABLE IF NOT EXISTS `type_quantite` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nommage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
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
  `vegetarisme` date DEFAULT NULL,
  `signature` text COLLATE utf8mb4_unicode_ci,
  `type_utilisateur` int(255) DEFAULT NULL,
  `abonnement` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `creation`, `pseudo`, `prenom`, `nom`, `email`, `confirmation`, `hash_mdp`, `image`, `newsletter`, `vegetarisme`, `signature`, `type_utilisateur`, `abonnement`) VALUES
(1, '2022-04-28 17:55:39', 'ecoatelant', 'Emilie', 'COATELANT', 'emiliecoatelant@outlook.fr', 1, '$2y$10$57onhCmOu5Kj/ZNnDb0j6ecDuo56snAVOY2MUCrxR/y99QZXWzdOm', NULL, 0, NULL, '', 1, 0),
(2, '2022-05-12 14:23:50', 'samybm', 'Samy', 'BEN MIMOUN', 'samybm@gmail.com', NULL, 'love', NULL, NULL, NULL, NULL, NULL, NULL),
(15, '2022-05-12 14:33:33', 'aneiina', 'Chloé', 'BERNASCONI', 'chloeb@gmail.com', NULL, '$2y$10$KbY/jKaNqCDlVUu0/1dzH.3VM.UlpxjWpnGl2mBYSULkFX8QXYu/O', 'aneina.png', NULL, NULL, NULL, NULL, NULL),
(16, '2022-05-12 21:22:12', 'LEVEL', 'Sophie', 'slevel', 'slevel@efe.fr', NULL, '$2y$10$xBqiOT6N1PnKniXHNvUGw.abKvvX8nyorhGYBB/Sj4LXOvZXJBw3q', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_widget`
--

DROP TABLE IF EXISTS `utilisateur_widget`;
CREATE TABLE IF NOT EXISTS `utilisateur_widget` (
  `utilisateur` int(255) NOT NULL,
  `widget` int(255) NOT NULL,
  `actif` int(11) NOT NULL,
  PRIMARY KEY (`utilisateur`,`widget`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `widget`
--

DROP TABLE IF EXISTS `widget`;
CREATE TABLE IF NOT EXISTS `widget` (
  `id` int(255) NOT NULL,
  `nom` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
