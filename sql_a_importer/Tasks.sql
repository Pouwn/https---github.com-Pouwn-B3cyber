-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql:3306
-- Généré le : dim. 05 mars 2023 à 20:38
-- Version du serveur : 8.0.32
-- Version de PHP : 8.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `b3cyber`
--

-- --------------------------------------------------------

--
-- Structure de la table `Tasks`
--

CREATE TABLE `Tasks` (
  `id` int NOT NULL,
  `label` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Tasks`
--

INSERT INTO `Tasks` (`id`, `label`, `description`) VALUES
(1, 'tache 1', 'création d\'une page web'),
(2, 'Tache 2', 'Création d\'une page d\'enregistrement'),
(3, 'tache 3', 'Création de \"login.php\"'),
(4, 'tache 4', 'Création de confirmation.php'),
(5, 'tache 5', 'Création de accueil.php'),
(9, 'tache 6', 'test');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Tasks`
--
ALTER TABLE `Tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Tasks`
--
ALTER TABLE `Tasks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
