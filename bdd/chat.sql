-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 19 mai 2020 à 12:33
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `chat`
--
CREATE DATABASE IF NOT EXISTS `chat` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `chat`;

-- --------------------------------------------------------

--
-- Structure de la table `chan`
--

DROP TABLE IF EXISTS `chan`;
CREATE TABLE IF NOT EXISTS `chan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chan`
--

INSERT INTO `chan` (`id`, `name`) VALUES
(1, 'Général'),
(3, 'Aide');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_chan` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_hour` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=190 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `id_user`, `id_chan`, `message`, `date_hour`) VALUES
(188, 2, 1, 'ok', '2020-05-14 11:54:31'),
(187, 2, 1, 'ed', '2020-05-14 11:52:30'),
(179, 1, 1, 'Salut', '2020-05-14 11:04:44'),
(180, 1, 3, 'Ok', '2020-05-14 11:04:47'),
(182, 2, 1, 'Tes 2', '2020-05-14 11:05:40'),
(183, 2, 3, 'Salut', '2020-05-14 11:15:29'),
(184, 2, 3, 'ça va ?', '2020-05-14 11:29:33'),
(185, 2, 1, 'Ok', '2020-05-14 11:45:11');

-- --------------------------------------------------------

--
-- Structure de la table `rank`
--

DROP TABLE IF EXISTS `rank`;
CREATE TABLE IF NOT EXISTS `rank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rank`
--

INSERT INTO `rank` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'membre');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  `surname` varchar(35) NOT NULL,
  `login` varchar(35) NOT NULL,
  `password` varchar(155) NOT NULL,
  `mail` varchar(155) NOT NULL,
  `rank` varchar(30) NOT NULL DEFAULT 'membre',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `login`, `password`, `mail`, `rank`) VALUES
(1, 'Adrien', 'Gonzalez', 'Firefou', 'RxtTpf80', 'adrien1361@hotmail.fr', '0'),
(5, 'mimi', 'mimi', 'mimi', '$2y$05$/CfPNqaE7YM5An6/cwx4kOx.gQceiAFFVQStuyr/fJ6ZXJ0S3Erxm', 'mimi@gmail.com', 'membre'),
(3, 'nana', 'nana', 'nana', '$2y$05$Lon39U4c3bz14jqzwQXXTOqwSwuvUqI0Mzw5GQHLHqNDR1OHCiaFK', 'nana@gmail.com', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
