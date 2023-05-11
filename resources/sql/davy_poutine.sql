-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 11 mai 2023 à 19:24
-- Version du serveur : 8.0.31
-- Version de PHP : 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `davy_poutine`
--

-- --------------------------------------------------------

--
-- Structure de la table `poutine`
--

CREATE TABLE `poutine` (
  `id` int NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `poutine`
--

INSERT INTO `poutine` (`id`, `nom`, `description`) VALUES
(1, 'Poutine originale', ''),
(2, 'Poutine italienne', 'Sauce a spaghetti'),
(3, 'Poutine epicee', 'Frites epicees'),
(4, 'Poutine Davy', 'Boeuf, oignons, bacon, saucisse hot-dog'),
(5, 'Poutine toute garnie', 'Boeuf hache, oignons, tomates, champignons, poivrons, olives'),
(6, 'Poutine galvaude', 'Poulet, pois verts, fromage'),
(7, 'Poutine greque', 'Patates grecques, fromage bocconcini, poulet marine, tomates cerises, olives noires, concombre'),
(22, 'Poutine test', 'modif');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int NOT NULL,
  `code_usager` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mot_de_passe_hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cle_api` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `code_usager`, `mot_de_passe_hash`, `cle_api`) VALUES
(1, 'antoine', '$2y$10$chw1HB1wbdUCUwqIO.U/i.YRrq.7SM.jCI6oryE0vYqZb9QUhRGXG', 'b99317e938e47264f28d748a4e6adf84fa45a9ce'),
(2, 'mathieu', '$2y$10$krHAf4UjLof/T7Vvc7PT0O/9j27xUlSxHzOqA0huyTWsB8iAr05om', 'da361e528c7eb2fc345d02574b928a09c233cda4');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `poutine`
--
ALTER TABLE `poutine`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `poutine`
--
ALTER TABLE `poutine`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
