-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Sam 27 Juin 2015 à 08:55
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hasGenre`
--

CREATE TABLE `hasGenre` (
  `project` int(8) NOT NULL,
  `genre` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hasParticipated`
--

CREATE TABLE `hasParticipated` (
  `user` int(8) NOT NULL,
  `version` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

CREATE TABLE `project` (
  `idProjet` int(5) NOT NULL,
  `name` varchar(80) NOT NULL,
  `owner` int(5) NOT NULL,
  `root` int(5) NOT NULL,
  `description` text NOT NULL,
  `parent` int(5) NOT NULL,
  `locked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sound`
--

CREATE TABLE `sound` (
  `idSound` int(8) NOT NULL,
  `pisteNumber` int(2) NOT NULL,
  `src` varchar(255) NOT NULL,
  `startTime` int(255) NOT NULL,
  `project` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `version`
--

CREATE TABLE `version` (
  `idVersion` int(5) NOT NULL,
  `project` int(8) NOT NULL,
  `name` varchar(42) NOT NULL,
  `user` int(5) NOT NULL,
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
-- Index pour la table `hasGenre`
--
ALTER TABLE `hasGenre`
  ADD PRIMARY KEY (`project`,`genre`),
  ADD KEY `project` (`project`),
  ADD KEY `project_2` (`project`);

--
-- Index pour la table `hasParticipated`
--
ALTER TABLE `hasParticipated`
  ADD KEY `user` (`user`,`version`);

--
-- Index pour la table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`idProjet`),
  ADD KEY `idProjet` (`idProjet`),
  ADD KEY `owner` (`owner`),
  ADD KEY `root` (`root`,`parent`),
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
  MODIFY `idRight` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `idComment` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `idGenre` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `project`
--
ALTER TABLE `project`
  MODIFY `idProjet` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `sound`
--
ALTER TABLE `sound`
  MODIFY `idSound` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(5) NOT NULL AUTO_INCREMENT;
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
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`version`) REFERENCES `version` (`idVersion`),
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`author`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE CASCADE;

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
