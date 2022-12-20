-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 18 déc. 2022 à 17:15
-- Version du serveur : 10.6.5-MariaDB
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `reservationsalles`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES
(106, 'test3421', 'ceci est une trÃ¨s longue description joejz,foefoiheijfbijbdeuifbcjk b ueib feuhiof k\"ofhoihn zfhiof hof', '2022-12-16 18:00:00', '2022-12-16 19:00:00', 2),
(104, 'ceci est un trÃ¨s long titre................', 'biohÃ Ã§i', '2022-12-16 13:00:00', '2022-12-16 14:00:00', 2),
(103, 'ceci est un trÃ¨s long titre................', 'biohÃ Ã§i', '2022-12-16 12:00:00', '2022-12-16 13:00:00', 2),
(102, 'ceci est un trÃ¨s long titre................', 'biohÃ Ã§i', '2022-12-16 11:00:00', '2022-12-16 12:00:00', 2),
(101, 'ceci est un trÃ¨s long titre................', 'biohÃ Ã§i', '2022-12-16 10:00:00', '2022-12-16 11:00:00', 2),
(105, 'test3421', 'ceci est une trÃ¨s longue description joejz,foefoiheijfbijbdeuifbcjk b ueib feuhiof k\"ofhoihn zfhiof hof', '2022-12-16 17:00:00', '2022-12-16 18:00:00', 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'admin', '$2y$10$qRKVhrHODzXY7wWk8IA5ZOFzlRuONICPyITQBsZvR5ZVkRjTrgHae'),
(2, 'leadbs', '$2y$10$DHROQTOrb2L7peekqzGxs.7ogAkrGQno8yseG0NgdI5f38BRhCQeC');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
