-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Dim 28 Juin 2015 à 10:05
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.7

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

CREATE TABLE `auth` (
  `idRight` int(5) NOT NULL,
  `user` int(5) NOT NULL,
  `readeable` tinyint(1) NOT NULL DEFAULT '1',
  `writeable` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `auth`
--

INSERT INTO `auth` (`idRight`, `user`, `readeable`, `writeable`) VALUES
(1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `idComment` int(5) NOT NULL,
  `author` int(5) NOT NULL,
  `value` varchar(300) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `version` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `idGenre` int(5) NOT NULL,
  `name` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `genre`
--

INSERT INTO `genre` (`idGenre`, `name`) VALUES
(1, 'Pop'),
(2, 'Rock'),
(3, 'Classique');

-- --------------------------------------------------------

--
-- Structure de la table `hasgenre`
--

CREATE TABLE `hasgenre` (
  `project` int(8) NOT NULL,
  `genre` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `idNote` int(8) NOT NULL,
  `sound` int(8) NOT NULL,
  `startTime` int(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `note`
--

INSERT INTO `note` (`idNote`, `sound`, `startTime`) VALUES
(1, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

CREATE TABLE `project` (
  `idProjet` int(5) NOT NULL,
  `name` varchar(80) NOT NULL,
  `genre` int(8) DEFAULT NULL,
  `owner` int(5) NOT NULL,
  `description` text NOT NULL,
  `parent` int(5) DEFAULT NULL,
  `locked` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `project`
--

INSERT INTO `project` (`idProjet`, `name`, `genre`, `owner`, `description`, `parent`, `locked`) VALUES
(2, 'Test', 0, 1, 'Projet de test', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `sound`
--

CREATE TABLE `sound` (
  `idSound` int(8) NOT NULL,
  `src` varchar(255) NOT NULL,
  `project` int(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sound`
--

INSERT INTO `sound` (`idSound`, `src`, `project`) VALUES
(1, 'glass.wav', 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int(5) NOT NULL,
  `login` varchar(28) NOT NULL,
  `password` varchar(42) NOT NULL,
  `mail` varchar(80) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `firstName` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `login`, `password`, `mail`, `lastName`, `firstName`) VALUES
(1, 'r-dc', 'sha256:1000:jnx/ApP3TShqndJ13ObbRu2o/uBEcD', 'robin@dumontchapo.net', 'Dumont-Chaponet', 'Robin'),
(2, 'test', 'sha256:1000:jnx/ApP3TShqndJ13ObbRu2o/uBEcD', 'test@test.test', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `version`
--

CREATE TABLE `version` (
  `idVersion` int(5) NOT NULL,
  `project` int(8) NOT NULL,
  `name` varchar(42) NOT NULL,
  `user` int(8) NOT NULL,
  `views` int(10) NOT NULL,
  `duration` int(6) NOT NULL,
  `description` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`idRight`),
  ADD KEY `user` (`user`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idComment`),
  ADD KEY `author` (`author`),
  ADD KEY `version` (`version`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`idGenre`);

--
-- Index pour la table `hasgenre`
--
ALTER TABLE `hasgenre`
  ADD PRIMARY KEY (`project`,`genre`),
  ADD KEY `project` (`project`),
  ADD KEY `project_2` (`project`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`idNote`),
  ADD KEY `sound` (`sound`);

--
-- Index pour la table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`idProjet`),
  ADD UNIQUE KEY `gender` (`genre`),
  ADD KEY `idProjet` (`idProjet`),
  ADD KEY `owner` (`owner`),
  ADD KEY `root` (`parent`),
  ADD KEY `project_ibfk_3` (`parent`);

--
-- Index pour la table `sound`
--
ALTER TABLE `sound`
  ADD PRIMARY KEY (`idSound`),
  ADD UNIQUE KEY `idSound` (`idSound`),
  ADD KEY `project` (`project`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- Index pour la table `version`
--
ALTER TABLE `version`
  ADD PRIMARY KEY (`idVersion`),
  ADD KEY `project` (`project`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `auth`
--
ALTER TABLE `auth`
  MODIFY `idRight` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `idComment` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `idGenre` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `idNote` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `project`
--
ALTER TABLE `project`
  MODIFY `idProjet` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `sound`
--
ALTER TABLE `sound`
  MODIFY `idSound` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `version`
--
ALTER TABLE `version`
  MODIFY `idVersion` int(5) NOT NULL AUTO_INCREMENT;
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
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`sound`) REFERENCES `sound` (`idSound`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `user` (`idUser`) ON UPDATE CASCADE,
  ADD CONSTRAINT `project_ibfk_3` FOREIGN KEY (`parent`) REFERENCES `project` (`idProjet`) ON DELETE NO ACTION;

--
-- Contraintes pour la table `sound`
--
ALTER TABLE `sound`
  ADD CONSTRAINT `sound_ibfk_1` FOREIGN KEY (`project`) REFERENCES `project` (`idProjet`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `version`
--
ALTER TABLE `version`
  ADD CONSTRAINT `version_ibfk_1` FOREIGN KEY (`project`) REFERENCES `project` (`idProjet`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
