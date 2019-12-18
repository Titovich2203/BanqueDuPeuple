-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 18 déc. 2019 à 02:12
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `banque`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `numero` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `tel` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `numero`, `nom`, `prenom`, `adresse`, `tel`) VALUES
(1, 'BDP_03122019_CL1', 'AMAH', 'Meheza Ulrich', 'Medina rue 22 X 15', '+221781980578'),
(2, 'BDP_03122019_CL2', 'SIAVI', 'Boris Kevin', 'Medina rue 27 X 24', '+221770000000'),
(3, 'BDP_03122019_CL3', 'VICH', 'Tito', 'Medina Rue 15 X 14', '+221774988948');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `id` int(11) NOT NULL,
  `numero` varchar(25) NOT NULL,
  `dateCreation` varchar(10) NOT NULL,
  `solde` int(100) NOT NULL DEFAULT 0,
  `idClient` int(11) NOT NULL,
  `idGestCompte` int(11) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT 1,
  `sousPret` int(11) DEFAULT 0,
  `soldePret` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id`, `numero`, `dateCreation`, `solde`, `idClient`, `idGestCompte`, `etat`, `sousPret`, `soldePret`) VALUES
(1, 'BDP_03122019_C1', '03-12-2019', 35475000, 1, 1, 1, 0, 0),
(2, 'BDP_03122019_C2', '03-12-2019', 100500215, 2, 1, 1, 0, 0),
(3, 'BDP_03122019_C3', '03-12-2019', 134500000, 3, 1, 1, 0, 0),
(4, 'BDP_04122019_C4', '04-12-2019', 35000000, 1, 1, 1, 0, 0),
(5, 'BDP_04122019_C5', '04-12-2019', 45678090, 3, 1, 1, 0, 0),
(6, 'BDP_04122019_C6', '04-12-2019', 550000, 3, 1, 1, 0, 0),
(7, 'BDP_09122019_C7', '09-12-2019', 50000000, 2, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `profil` varchar(100) NOT NULL,
  `AlreadyLogIn` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `login`, `password`, `profil`, `AlreadyLogIn`) VALUES
(1, 'VICH', 'Tito', 'vich', '$2y$10$7jVgv2qqLBTqBimyQwaBV.mnx0s3bIS5GcjYTeSn5WA/GRZp0r7NC', 'superadmin', 1),
(2, 'LADMIN', 'par defaut', 'login', '$2y$10$LNthgde./wioXxf19StPNOZZpBfih2.xUrdC4Q9F1TAMzDSH6TG22', 'admin', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cni` (`numero`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero` (`numero`),
  ADD KEY `idClient` (`idClient`),
  ADD KEY `idGestCompte` (`idGestCompte`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `compte_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `compte_ibfk_2` FOREIGN KEY (`idGestCompte`) REFERENCES `utilisateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
