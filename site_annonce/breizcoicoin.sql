-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 04 juin 2022 à 03:48
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `breizcoicoin`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `idannonce` int(11) NOT NULL,
  `titreannonce` varchar(300) DEFAULT NULL,
  `texteannonce` varchar(1500) DEFAULT NULL,
  `prix` double DEFAULT NULL,
  `dateannonce` date DEFAULT NULL,
  `idcategorie` int(11) DEFAULT NULL,
  `idutilisateur` int(11) DEFAULT NULL,
  `lienImage` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`idannonce`, `titreannonce`, `texteannonce`, `prix`, `dateannonce`, `idcategorie`, `idutilisateur`, `lienImage`) VALUES
(1, 'SAMSUNG Noir', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1234, '2022-06-16', 3, 1, 'Copy of productslide-1.jpg'),
(2, 'Tablette', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 23242, '2022-06-30', 3, 1, 'pic1.jpg'),
(3, 'BMW noir/blanc', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 543354, '2022-06-30', 1, 1, 'ser-pic5.jpg'),
(4, 'Chaussure Nike', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 123, '2022-06-29', 4, 1, 'ser-pic4.jpg'),
(5, 'Chaussure Noir', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 13224, '2022-06-04', 4, 1, 'pic4.png'),
(6, 'Camera', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 234, '2022-06-04', 5, 1, 'pic3.png'),
(7, 'Camera Video', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 345, '2022-06-04', 5, 1, 'ser-pic3.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idcategorie` int(11) NOT NULL,
  `nomcategorie` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idcategorie`, `nomcategorie`) VALUES
(1, 'Voiture'),
(2, 'Maison'),
(3, 'Portable'),
(4, 'Chaussure'),
(5, 'Appareil');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `idannonce` int(11) NOT NULL,
  `idutilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idutilisateur` int(11) NOT NULL,
  `nomutilisateur` varchar(100) DEFAULT NULL,
  `prenomsutilisateur` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mot_pass` varchar(1000) DEFAULT NULL,
  `roles` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idutilisateur`, `nomutilisateur`, `prenomsutilisateur`, `email`, `mot_pass`, `roles`) VALUES
(1, 'Kouame', 'Bi', 'emma@gmail.com', 'm', 'admin'),
(2, 'Nana', 'Akissi', 'nana@gmail.com', 'm', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`idannonce`),
  ADD KEY `idutilisateur` (`idutilisateur`),
  ADD KEY `idcategorie` (`idcategorie`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idcategorie`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`idannonce`,`idutilisateur`),
  ADD KEY `idutilisateur` (`idutilisateur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idutilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `idannonce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idcategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idutilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_10` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_100` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_101` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_102` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_103` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_104` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_105` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_106` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_107` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_108` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_109` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_11` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_110` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_111` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_112` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_12` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_13` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_14` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_15` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_16` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_17` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_18` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_19` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_2` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_20` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_21` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_22` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_23` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_24` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_25` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_26` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_27` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_28` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_29` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_3` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_30` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_31` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_32` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_33` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_34` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_35` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_36` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_37` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_38` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_39` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_4` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_40` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_41` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_42` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_43` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_44` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_45` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_46` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_47` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_48` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_49` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_5` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_50` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_51` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_52` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_53` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_54` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_55` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_56` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_57` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_58` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_59` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_6` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_60` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_61` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_62` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_63` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_64` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_65` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_66` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_67` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_68` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_69` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_7` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_70` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_71` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_72` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_73` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_74` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_75` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_76` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_77` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_78` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_79` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_8` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_80` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_81` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_82` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_83` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_84` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_85` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_86` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_87` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_88` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_89` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_9` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_90` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_91` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_92` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_93` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_94` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_95` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_96` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_97` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `annonce_ibfk_98` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `annonce_ibfk_99` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`);

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_10` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_100` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_101` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_102` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_103` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_104` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_105` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_106` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_107` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_108` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_109` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_11` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_110` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_111` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_112` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_12` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_13` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_14` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_15` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_16` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_17` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_18` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_19` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_20` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_21` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_22` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_23` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_24` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_25` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_26` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_27` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_28` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_29` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_3` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_30` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_31` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_32` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_33` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_34` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_35` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_36` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_37` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_38` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_39` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_4` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_40` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_41` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_42` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_43` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_44` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_45` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_46` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_47` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_48` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_49` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_5` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_50` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_51` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_52` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_53` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_54` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_55` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_56` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_57` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_58` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_59` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_6` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_60` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_61` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_62` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_63` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_64` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_65` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_66` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_67` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_68` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_69` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_7` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_70` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_71` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_72` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_73` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_74` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_75` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_76` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_77` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_78` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_79` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_8` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_80` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_81` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_82` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_83` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_84` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_85` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_86` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_87` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_88` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_89` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_9` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_90` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_91` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_92` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_93` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_94` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_95` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_96` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_97` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `favoris_ibfk_98` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`),
  ADD CONSTRAINT `favoris_ibfk_99` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
