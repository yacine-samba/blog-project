-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 14 jan. 2023 à 03:01
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `visionsneakers`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `article_id`, `author`, `content`, `created_at`) VALUES
(1, 2, 'Visiteur', 'TEST', '2023-01-13 19:56:59'),
(2, 3, 'test', 'test', '2023-01-13 20:11:02'),
(3, 3, 'test', 'test', '2023-01-13 20:14:29'),
(4, 3, 'test', 'test', '2023-01-13 20:14:53'),
(5, 3, '', '', '2023-01-13 20:22:52'),
(6, 3, '', '', '2023-01-13 20:23:20'),
(7, 3, '', '', '2023-01-13 20:23:22'),
(8, 3, '', '', '2023-01-13 20:24:23'),
(9, 3, '', '', '2023-01-13 20:24:26'),
(10, 3, '', '', '2023-01-13 20:24:27'),
(11, 3, '', '', '2023-01-13 20:25:00'),
(12, 3, '', '', '2023-01-13 20:25:09'),
(13, 3, '', '', '2023-01-13 20:25:10'),
(14, 3, '', '', '2023-01-13 20:29:51'),
(15, 3, '', '', '2023-01-13 21:36:28'),
(16, 3, '', '', '2023-01-13 21:39:40'),
(17, 3, '', '', '2023-01-13 21:40:11'),
(18, 3, '', '', '2023-01-13 21:40:21'),
(19, 2, '', '', '2023-01-13 21:40:33'),
(20, 2, '', '', '2023-01-13 21:41:35'),
(21, 2, '', '', '2023-01-13 21:42:09'),
(22, 2, '', '', '2023-01-13 21:42:57'),
(23, 2, '', '', '2023-01-13 21:42:57'),
(24, 2, '', '', '2023-01-13 21:47:00'),
(25, 2, 'zsdaef', 'ezfr', '2023-01-13 21:47:03'),
(26, 3, '', '', '2023-01-13 22:02:59'),
(27, 3, '', '', '2023-01-14 01:25:31'),
(28, 3, '', '', '2023-01-14 01:25:34'),
(29, 3, '', '', '2023-01-14 01:26:06'),
(30, 3, '', '', '2023-01-14 01:31:45'),
(31, 3, '', '', '2023-01-14 01:36:00'),
(32, 3, '', '', '2023-01-14 01:38:36'),
(33, 3, '', '', '2023-01-14 01:38:43'),
(34, 3, '', '', '2023-01-14 01:39:13'),
(35, 3, '', '', '2023-01-14 01:39:15');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
