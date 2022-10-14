-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 12 oct. 2022 à 13:56
-- Version du serveur :  5.7.11
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lyceestvincentsf`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `firstname`, `lastname`, `email`, `phone`, `message`) VALUES
(1, 'Quentin', 'pham', 'cariavalentin95@gmail.com', '0607668545', 'bonjour'),
(2, 'Quentin', 'pham', 'cariavalentin95@gmail.com', '0607668545', 'allos???'),
(8, 'Quentin', 'pham', 'cariavalentin95@gmail.com', '0607668545', 'envoie moi le password'),
(9, 'Quentin', 'u', 'hubuh@gmail.com', '82855555', 'çkiçkiççik');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220601080029', '2022-06-01 08:01:13', 151),
('DoctrineMigrations\\Version20220601085637', '2022-06-01 08:57:57', 93),
('DoctrineMigrations\\Version20220601113927', '2022-06-01 11:42:04', 140),
('DoctrineMigrations\\Version20220602073203', '2022-06-02 07:32:23', 248),
('DoctrineMigrations\\Version20220608135531', '2022-06-08 13:55:50', 177);

-- --------------------------------------------------------

--
-- Structure de la table `images_projet`
--

CREATE TABLE `images_projet` (
  `id` int(11) NOT NULL,
  `projets_id` int(11) DEFAULT NULL,
  `nom_fichier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `images_projet`
--

INSERT INTO `images_projet` (`id`, `projets_id`, `nom_fichier`) VALUES
(1, 1, 'Cap-62986de3041e8-6317374cc1f0f.png'),
(2, 2, 'Cap4-62b43f261e1ff.png');

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `technologie` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `besoins` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `bilan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `lien_projet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id`, `nom`, `technologie`, `charge`, `periode`, `besoins`, `bilan`, `lien_projet`) VALUES
(1, 'travel Agency', 'ffff', 'lloij', '23 mois', 'srthhuh', 'frtyui', ''),
(2, 'test', 'html css', 'skf', '23 mois', 'test', 'test', 'google.com');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(1, 'cariavalentin95@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$FWnWhKzYTxAPqHOd3CHhFe1XZ.rbCk74S86V/VE.PZIeEk.UmWwCu');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `images_projet`
--
ALTER TABLE `images_projet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_92EF5BEF597A6CB7` (`projets_id`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `images_projet`
--
ALTER TABLE `images_projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `images_projet`
--
ALTER TABLE `images_projet`
  ADD CONSTRAINT `FK_92EF5BEF597A6CB7` FOREIGN KEY (`projets_id`) REFERENCES `projet` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
