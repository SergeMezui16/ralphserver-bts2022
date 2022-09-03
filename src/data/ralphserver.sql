-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 03 sep. 2022 à 19:05
-- Version du serveur : 8.0.30-0ubuntu0.22.04.1
-- Version de PHP : 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ralphserver`
--

CREATE DATABASE `ralphserver`;

-- --------------------------------------------------------

--
-- Structure de la table `file`
--

CREATE TABLE `file` (
  `id` int NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Key` varchar(255) NOT NULL,
  `Path` varchar(255) NOT NULL,
  `Owner` int NOT NULL,
  `Type` int NOT NULL,
  `Download` int NOT NULL,
  `Note` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Right` json NOT NULL,
  `Status` tinyint NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `deleted` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `file`
--

INSERT INTO `file` (`id`, `Name`, `Key`, `Path`, `Owner`, `Type`, `Download`, `Note`, `Right`, `Status`, `created`, `modified`, `deleted`) VALUES
(25, 'Note', '2y10J3OrHIAyvvn5w3TaATyO28Ud2BPaPOquXsCrdhpUdcef4496y6', 'note-ralphserver-62548f43b64b9.pdf', 8, 1, 0, 'zertyu', '[\"22\"]', 0, '2022-04-11 21:27:47', '2022-04-11 21:27:47', 1),
(26, 'Test', '2y10izPXAdrrbVXl1VyShGLgQevR6h8EBAnRQ2wE9JLxkgv2l18YiEi', 'test-ralphserver-625570897ce36.pdf', 1, 1, 0, 'note', '[\"20\"]', 0, '2022-04-12 13:28:57', '2022-04-12 13:28:57', 0);

-- --------------------------------------------------------

--
-- Structure de la table `Group`
--

CREATE TABLE `Group` (
  `id` int NOT NULL,
  `Name` varchar(255) NOT NULL,
  `About` text,
  `Level` int NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `deleted` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `Group`
--

INSERT INTO `Group` (`id`, `Name`, `About`, `Level`, `created`, `modified`, `deleted`) VALUES
(8, 'DR', 'Direction Générale', 2, '2022-03-22 10:34:27', '2022-04-11 06:26:20', 0),
(19, 'RH', 'Ressources Humaines', 2, '2022-03-23 15:24:33', '2022-04-11 06:27:08', 0),
(20, 'ADMIN', 'Les administrateurs du système.', 1, '2022-03-27 20:27:05', '2022-04-11 06:27:29', 0),
(21, 'ROBOTIQUE', 'DEPARTEMENT DE ROBOTIQUE', 3, '2022-03-27 20:37:45', '2022-04-11 06:28:48', 0),
(22, 'COMPTABILITE', 'DEPARTEMENT DE COMPTABILITE', 3, '2022-03-27 20:39:35', '2022-04-11 06:29:37', 0);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int NOT NULL,
  `Object` varchar(255) NOT NULL,
  `Sender` int NOT NULL,
  `Recipient` json NOT NULL,
  `Body` text NOT NULL,
  `Status` int NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `deleted` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `Object`, `Sender`, `Recipient`, `Body`, `Status`, `created`, `modified`, `deleted`) VALUES
(17, 'AZERTYUI', 8, '[\"1\", \"9\"]', '<p>sqdfghj</p>\r\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 48.5073%;\">e</td>\r\n<td style=\"width: 48.5073%;\">ii</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 48.5073%;\">&nbsp;</td>\r\n<td style=\"width: 48.5073%;\">i</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 48.5073%;\">&nbsp;</td>\r\n<td style=\"width: 48.5073%;\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>', 0, '2022-07-27 11:28:09', '2022-07-27 11:28:09', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Birth` date DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Phone` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `Job` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `Sex` varchar(255) DEFAULT NULL,
  `About` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `Group` int NOT NULL,
  `Avatar` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `Name`, `Birth`, `Email`, `Password`, `Phone`, `Job`, `Sex`, `About`, `Group`, `Avatar`, `created`, `modified`, `deleted`) VALUES
(1, 'Serge', '2012-03-23', 'se@sm.cm', '$2y$10$WlYSTWNgA0/YGkr/L7ofzuRUxaHvXBdLB35r.XCrKpLVgayi0Fax2', '6 92 04 13 34', 'Développeur Web', 'O', 'Je suis un developpeur Web.', 19, '1-ralphserver.png', '2022-03-21 23:48:17', '2022-07-27 11:25:12', 0),
(8, 'Admin', '1999-03-11', 'ad@sm.cm', '$2y$10$MSPbNhFkLk3U8S65MoCFze98daaEEQ4hRSE7gX1LZQhsUYwoCd04K', '6565656', 'Admin', 'O', 'Compte administrateur N°1.', 20, '', '2022-03-23 23:54:26', '2022-03-28 10:59:24', 0),
(9, 'Franckhy', NULL, 'fr@gmail.com', '$2y$10$MYmg/4qKpbgzjan7ZQ0E5uAN34I7IwgvcdzH3dCmA.8cMm2sruiya', NULL, NULL, NULL, NULL, 19, NULL, '2022-03-27 20:43:48', NULL, 0),
(10, 'Ebassa Yann', '2001-04-11', 'yanstars291@sm.cm', '$2y$10$Aq8ygSuvnZCdYPoRw9QdXe2uYNYyCfplZXMMVltMC6g49c6aOUouu', '+237655631721', 'latéral', 'M', 'latéral moderne', 19, '10-ralphserver.jpg', '2022-03-27 20:44:52', '2022-03-29 12:38:27', 0),
(11, 'Emmanuel', NULL, 'em@sm.cm', '$2y$10$7GUkK0JiosYLP4pz7KYTGO1fZESSOIpNaKMD6G.6n5CpPkF3dUg9K', NULL, NULL, NULL, NULL, 8, NULL, '2022-03-27 20:45:28', '2022-03-27 20:48:21', 0),
(12, 'Steeve', NULL, 'st@sm.cm', '$2y$10$zimUUWSWv4WHqPE.RLiP6e5Aa0jglYf0nzwDeVn8tecrxfpgl1cYm', NULL, NULL, NULL, NULL, 21, NULL, '2022-03-27 20:45:59', '2022-04-11 06:30:32', 0),
(13, 'Mindah', '2003-10-28', 'mindahnkemeni@gmail.com', '$2y$10$/a9SUxgL56VNdr9thXWQme3okcsEi2ZZWxF.apeefU3qTxqmJi1dy', '655378864', 'fou', 'M', 'king', 21, '13-ralphserver.png', '2022-03-27 20:46:43', '2022-03-28 11:08:00', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Group`
--
ALTER TABLE `Group`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Sender` (`Sender`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Group` (`Group`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `file`
--
ALTER TABLE `file`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `Group`
--
ALTER TABLE `Group`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`Sender`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Group`) REFERENCES `Group` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



