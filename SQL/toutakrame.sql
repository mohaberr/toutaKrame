-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 26 avr. 2021 à 07:57
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `toutakrame`
--

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE IF NOT EXISTS `ingredients` (
  `idIngredient` int(11) NOT NULL AUTO_INCREMENT,
  `libelleIngredient` varchar(50) NOT NULL,
  `quantite` float NOT NULL,
  `idRecette` int(11) NOT NULL,
  `idUnite` int(11) NOT NULL,
  PRIMARY KEY (`idIngredient`),
  KEY `Ingredients_Recettes_FK` (`idRecette`),
  KEY `Ingredients_Unites0_FK` (`idUnite`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ingredients`
--

INSERT INTO `ingredients` (`idIngredient`, `libelleIngredient`, `quantite`, `idRecette`, `idUnite`) VALUES
(1, 'poivre', 2, 1, 1),
(2, 'sel', 2, 1, 1),
(3, 'farine', 1, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

DROP TABLE IF EXISTS `recettes`;
CREATE TABLE IF NOT EXISTS `recettes` (
  `idRecette` int(11) NOT NULL AUTO_INCREMENT,
  `titreRecette` varchar(50) NOT NULL,
  `tempRecette` time NOT NULL,
  `niveauDifRecette` int(11) NOT NULL,
  `imageRecette` varchar(50) NOT NULL,
  `preparationRecette` varchar(1000) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idRecette`),
  KEY `Recettes_users_FK` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recettes`
--

INSERT INTO `recettes` (`idRecette`, `titreRecette`, `tempRecette`, `niveauDifRecette`, `imageRecette`, `preparationRecette`, `idUser`) VALUES
(1, 'patte', '00:00:10', 2, 'aaa', 'bonjour', 1),
(2, 'thon', '00:00:20', 2, 'uu', 'fffff', 2);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `idRole` int(11) NOT NULL AUTO_INCREMENT,
  `libelleRole` varchar(50) NOT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`idRole`, `libelleRole`) VALUES
(1, 'admin'),
(2, 'visiteur');

-- --------------------------------------------------------

--
-- Structure de la table `unites`
--

DROP TABLE IF EXISTS `unites`;
CREATE TABLE IF NOT EXISTS `unites` (
  `idUnite` int(11) NOT NULL AUTO_INCREMENT,
  `libelleUnite` varchar(10) NOT NULL,
  PRIMARY KEY (`idUnite`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `unites`
--

INSERT INTO `unites` (`idUnite`, `libelleUnite`) VALUES
(1, 'ml'),
(2, 'g');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `pseudoUser` varchar(50) NOT NULL,
  `mdpUser` varchar(50) NOT NULL,
  `idRole` int(11) NOT NULL,
  PRIMARY KEY (`idUser`),
  KEY `users_Roles_FK` (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `pseudoUser`, `mdpUser`, `idRole`) VALUES
(1, 'nils', '1234', 2),
(2, 'moh', '1234', 2),
(3, 'kol', '0000', 1),
(4, 'am', '0000', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `Ingredients_Recettes_FK` FOREIGN KEY (`idRecette`) REFERENCES `recettes` (`idRecette`),
  ADD CONSTRAINT `Ingredients_Unites0_FK` FOREIGN KEY (`idUnite`) REFERENCES `unites` (`idUnite`);

--
-- Contraintes pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD CONSTRAINT `Recettes_users_FK` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_Roles_FK` FOREIGN KEY (`idRole`) REFERENCES `roles` (`idRole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
