-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 03 oct. 2022 à 14:04
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `symfony_le-marche-du-livre_v2`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220708122901', '2022-07-08 12:29:08', 66),
('DoctrineMigrations\\Version20220708124849', '2022-07-08 12:48:58', 44),
('DoctrineMigrations\\Version20220708140244', '2022-07-08 14:02:52', 42),
('DoctrineMigrations\\Version20220708140519', '2022-07-08 14:17:53', 97),
('DoctrineMigrations\\Version20220708141745', '2022-07-08 14:17:53', 63),
('DoctrineMigrations\\Version20220708142045', '2022-07-08 14:20:51', 42),
('DoctrineMigrations\\Version20220708142157', '2022-07-08 14:22:01', 90),
('DoctrineMigrations\\Version20220708142334', '2022-07-08 14:23:41', 39),
('DoctrineMigrations\\Version20220708142503', '2022-07-08 14:25:11', 94),
('DoctrineMigrations\\Version20220708142958', '2022-07-08 14:30:03', 99),
('DoctrineMigrations\\Version20220708144403', '2022-07-08 14:44:11', 42),
('DoctrineMigrations\\Version20220708144726', '2022-07-08 14:47:30', 78),
('DoctrineMigrations\\Version20220711093512', '2022-07-11 09:35:21', 212);

-- --------------------------------------------------------

--
-- Structure de la table `etats_usure`
--

DROP TABLE IF EXISTS `etats_usure`;
CREATE TABLE IF NOT EXISTS `etats_usure` (
  `id` int NOT NULL AUTO_INCREMENT,
  `etat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etats_usure`
--

INSERT INTO `etats_usure` (`id`, `etat`) VALUES
(1, 'Neuf/Comme neuf'),
(2, 'Bon état'),
(3, 'Moyen'),
(4, 'Mauvais');

-- --------------------------------------------------------

--
-- Structure de la table `formats`
--

DROP TABLE IF EXISTS `formats`;
CREATE TABLE IF NOT EXISTS `formats` (
  `id` int NOT NULL AUTO_INCREMENT,
  `format` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formats`
--

INSERT INTO `formats` (`id`, `format`) VALUES
(1, 'Poche (11 x 18cm)'),
(2, 'Digest (14 x 21.6cm)'),
(3, 'Roman A5 (15 x 21cm)'),
(4, 'Royal (16 x 24cm)'),
(5, 'A4 (21 x 29.7cm)');

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `genres`
--

INSERT INTO `genres` (`id`, `genre`) VALUES
(1, 'Fantasy'),
(2, 'Science-Fiction'),
(3, 'Biographie/Autobiographie'),
(4, 'Littérature'),
(5, 'Bandes dessinées'),
(6, 'Jeunesse'),
(7, 'science fiction');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `auteur_livre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre_livre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_livre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre_livre_id` int NOT NULL,
  `format_livre_id` int NOT NULL,
  `etat_livre_id` int NOT NULL,
  `vendeur_livre_id` int NOT NULL,
  `prix_livre` double NOT NULL,
  `date_annonce_livre` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_927187A48484DA76` (`genre_livre_id`),
  KEY `IDX_927187A490E3151F` (`format_livre_id`),
  KEY `IDX_927187A4AA0C8D5B` (`etat_livre_id`),
  KEY `IDX_927187A4AAD1C4A8` (`vendeur_livre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id`, `auteur_livre`, `titre_livre`, `image_livre`, `genre_livre_id`, `format_livre_id`, `etat_livre_id`, `vendeur_livre_id`, `prix_livre`, `date_annonce_livre`) VALUES
(8, 'Robin Hobb', 'L\'assassin royal t1', 'assassin-royal-T1.png', 1, 1, 1, 1, 7.5, '2022-07-11 00:00:00'),
(9, 'Robin Hobb', 'L\'assassin royal t2', 'assassin-royal-T2.png', 1, 1, 1, 1, 7.5, '2022-07-11 00:00:00'),
(10, 'Robin Hobb', 'L\'assassin royal t3', 'assassin-royal-T3.png', 1, 1, 1, 1, 7.5, '2022-07-11 00:00:00'),
(11, 'Robin Hobb', 'L\'assassin Royal T4', 'assassin-royal-T4.png', 1, 1, 2, 2, 12, '2022-07-11 00:00:00'),
(12, 'Robin Hobb', 'L\'assassin Royal T5', 'assassin-royal-T5.png', 1, 1, 3, 2, 4.99, '2022-07-11 00:00:00'),
(13, 'Robin Hobb', 'L\'assassin Royal T6', 'assassin-royal-T6.png', 1, 1, 2, 3, 6.43, '2022-07-11 00:00:00'),
(14, 'Robin Hobb', 'L\'assassin royal tome 7', 'assassin-royal-T7.png', 1, 1, 1, 3, 15, '2022-07-11 00:00:00'),
(15, 'Robin Hobb', 'L\'assassin Royal T8', 'assassin-royal-T8.png', 1, 1, 1, 3, 4.8, '2022-07-11 00:00:00'),
(16, 'Robin Hobb', 'L\'assassin Royal Tome 9', 'assassin-royal-T9.png', 1, 1, 1, 4, 4.5, '2022-05-04 00:00:00'),
(17, 'Robin Hobb', 'L\'assassin royal t10', 'assassin-royal-T10.png', 1, 1, 4, 4, 3, '2022-04-07 00:00:00'),
(18, 'Robin Hobb', 'L\'assassin royal tome 11', 'assassin-royal-T11.png', 1, 1, 1, 4, 7.5, '2022-06-10 00:00:00'),
(19, 'Robin Hobb', 'L\'assassin royal t12', 'assassin-royal-T12.png', 1, 1, 2, 4, 6.8, '2022-07-11 00:00:00'),
(20, 'Robin Hobb', 'L\'assassin royal tome 13', 'assassin-royal-T13.png', 1, 1, 1, 3, 9, '2022-05-05 00:00:00'),
(21, 'David EDDINGS', 'La Mallorée t1', 'malloree-t1.png', 1, 1, 1, 5, 7.5, '2022-07-10 00:00:00'),
(22, 'David EDDINGS', 'La Mallorée T2', 'malloree-t2.png', 1, 1, 1, 5, 7.5, '2022-07-11 00:00:00'),
(23, 'David EDDINGS', 'La Mallorée Tome 3', 'malloree-t3.png', 1, 1, 2, 5, 6, '2022-07-11 00:00:00'),
(24, 'David EDDINGS', 'La Mallorée Tome 4', 'malloree-t4.png', 1, 1, 3, 6, 4.5, '2022-07-11 00:00:00'),
(25, 'David EDDINGS', 'La Mallorée T5', 'malloree-t5.png', 1, 1, 3, 6, 4.5, '2022-07-11 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_utilisateur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `prenom_utilisateur`) VALUES
(1, 'admintest@mail.com', '[\"ROLE_ADMIN\"]', '$2y$13$SGy1iMG2vvisZ1OEgE9T9uF.vD7jMsy0yUYmg7b8nKefDrAzEINAe', 'Marie'),
(2, 'testinscription@mail.com', '[]', '$2y$13$vn.JwzgM/UK3/QcM2cmj6OrIjUzNRKeI.Vq2mCh4houyRB9USdeWW', 'David'),
(3, 'luc@mail.com', '[]', 'mdpmdp123', 'Luc'),
(4, 'Simone@mail.com', '[]', 'mdpmdp123', 'Simone'),
(5, 'Mirabelle@mail.com', '[]', 'mdpmdp123', 'Mirabelle'),
(6, 'andre@mail.com', '[]', 'mdpmdp123', 'André'),
(7, 'zoe@mail.com', '[]', 'mdpmdp123', 'Zoé');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `livres`
--
ALTER TABLE `livres`
  ADD CONSTRAINT `FK_927187A48484DA76` FOREIGN KEY (`genre_livre_id`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `FK_927187A490E3151F` FOREIGN KEY (`format_livre_id`) REFERENCES `formats` (`id`),
  ADD CONSTRAINT `FK_927187A4AA0C8D5B` FOREIGN KEY (`etat_livre_id`) REFERENCES `etats_usure` (`id`),
  ADD CONSTRAINT `FK_927187A4AAD1C4A8` FOREIGN KEY (`vendeur_livre_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
