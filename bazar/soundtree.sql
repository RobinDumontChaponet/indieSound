-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 27 Juin 2015 à 18:40
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `soundtree`
--

-- --------------------------------------------------------

--
-- Structure de la table `auth`
--

CREATE TABLE IF NOT EXISTS `auth` (
  `idRight` int(5) NOT NULL AUTO_INCREMENT,
  `user` int(5) NOT NULL,
  `readeable` tinyint(1) NOT NULL DEFAULT '1',
  `writeable` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idRight`),
  KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `idComment` int(5) NOT NULL AUTO_INCREMENT,
  `author` int(5) NOT NULL,
  `value` varchar(300) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `version` int(8) NOT NULL,
  PRIMARY KEY (`idComment`),
  KEY `author` (`author`),
  KEY `version` (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE IF NOT EXISTS `genre` (
  `idGenre` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  PRIMARY KEY (`idGenre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `hasgenre`
--

CREATE TABLE IF NOT EXISTS `hasgenre` (
  `project` int(8) NOT NULL,
  `genre` int(8) NOT NULL,
  PRIMARY KEY (`project`,`genre`),
  KEY `project` (`project`),
  KEY `project_2` (`project`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `idProjet` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `owner` int(5) NOT NULL,
  `root` int(5) DEFAULT NULL,
  `description` text NOT NULL,
  `parent` int(5) NOT NULL,
  `locked` tinyint(1) NOT NULL,
  PRIMARY KEY (`idProjet`),
  KEY `idProjet` (`idProjet`),
  KEY `owner` (`owner`),
  KEY `root` (`root`,`parent`),
  KEY `project_ibfk_3` (`parent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `project`
--

INSERT INTO `project` (`idProjet`, `name`, `owner`, `root`, `description`, `parent`, `locked`) VALUES
(1, 'test', 1, NULL, 'was', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `sound`
--

CREATE TABLE IF NOT EXISTS `sound` (
  `idSound` int(8) NOT NULL AUTO_INCREMENT,
  `pisteNumber` int(2) NOT NULL,
  `src` varchar(255) NOT NULL,
  `startTime` int(255) NOT NULL,
  `project` int(8) NOT NULL,
  PRIMARY KEY (`idSound`),
  UNIQUE KEY `idSound` (`idSound`),
  KEY `project` (`project`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(5) NOT NULL AUTO_INCREMENT,
  `login` varchar(28) NOT NULL,
  `password` varchar(42) NOT NULL,
  `mail` varchar(80) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `login`, `password`, `mail`, `lastName`, `firstName`) VALUES
(1, 'Elice', 'Calindi', 'qwe', 'Horr', 'Elice');

-- --------------------------------------------------------

--
-- Structure de la table `version`
--

CREATE TABLE IF NOT EXISTS `version` (
  `idVersion` int(5) NOT NULL AUTO_INCREMENT,
  `project` int(8) NOT NULL,
  `name` varchar(42) NOT NULL,
  `user` int(8) NOT NULL,
  `views` int(10) NOT NULL,
  `duration` int(6) NOT NULL,
  `description` varchar(80) NOT NULL,
  PRIMARY KEY (`idVersion`),
  KEY `project` (`project`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `version`
--

INSERT INTO `version` (`idVersion`, `project`, `name`, `user`, `views`, `duration`, `description`) VALUES
(1, 1, 'test', 1, 5, 60, 'qwer'),
(2, 1, 'qwedasd', 1, 956, 185, 'qwe'),
(3, 1, 'test', 1, 0, 500, 'azxs');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `auth`
--
ALTER TABLE `auth`
  ADD CONSTRAINT `auth_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`author`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`version`) REFERENCES `version` (`idVersion`);

--
-- Contraintes pour la table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `user` (`idUser`) ON UPDATE CASCADE,
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`root`) REFERENCES `version` (`idVersion`) ON UPDATE CASCADE,
  ADD CONSTRAINT `project_ibfk_3` FOREIGN KEY (`parent`) REFERENCES `project` (`idProjet`) ON DELETE NO ACTION;

--
-- Contraintes pour la table `sound`
--
ALTER TABLE `sound`
  ADD CONSTRAINT `sound_ibfk_1` FOREIGN KEY (`project`) REFERENCES `project` (`idProjet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `version`
--
ALTER TABLE `version`
  ADD CONSTRAINT `version_ibfk_1` FOREIGN KEY (`project`) REFERENCES `project` (`idProjet`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
