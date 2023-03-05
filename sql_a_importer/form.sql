-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql:3306
-- Généré le : dim. 05 mars 2023 à 20:39
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
-- Structure de la table `form`
--

CREATE TABLE `form` (
  `id` int NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `form`
--

INSERT INTO `form` (`id`, `nom`, `prenom`, `email`, `password`) VALUES
(1, 'Aa', 'a', 'aa.a@gmail.com', '$2y$10$SsrCgxvjIoR9TKeFdVSYzequUxyWYnNzYkokk9tIaKR.PItn5ZwkK'),
(2, 'aaa', 'aaa', 'aaa@gmail.com', '$2y$10$ghWvoq87Sn6yI475EPTMru4wjd6X/GsfN10.qmL7D/Ul16C.BX3A6'),
(4, 'al', 'al', 'al@gmail.com', '$2y$10$9rhxXCl47sZuSlOdT8Vvqe2rtuCSlODTJQEuX0306IWncwzqdMlmC'),
(5, 'alx', 'alx', 'alx@gmail.com', '$2y$10$zmpmyY6Oe5xtl9pAKm2xoOUTSZZSQTSlAxUEfZogxbVg12F/yQQEa'),
(6, 'bbb', 'bbb', 'bbb@gmail.com', '$2y$10$LDd6F.IAzJa2zE9/Q/S2S.G3cskUrv9DhSBElqaUXDCgjD62oByHu');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `form`
--
ALTER TABLE `form`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
