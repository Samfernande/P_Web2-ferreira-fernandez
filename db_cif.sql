-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : jeu. 09 fév. 2023 à 12:37
-- Version du serveur : 8.0.30
-- Version de PHP : 8.0.19

DROP DATABASE IF EXISTS db_cif;
CREATE DATABASE IF NOT EXISTS db_cif;
USE db_cif;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_cif`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_categorie`
--

CREATE TABLE `t_categorie` (
  `idCategorie` int UNSIGNED NOT NULL,
  `catTitre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `t_categorie`
--

INSERT INTO `t_categorie` (`idCategorie`, `catTitre`) VALUES
(3, 'Art'),
(12, 'Cinéma'),
(6, 'Culture'),
(16, 'Fantasy'),
(8, 'Restaurant'),
(13, 'Histoire'),
(10, 'Humanitaire'),
(1, 'Livre'),
(17, 'Mode'),
(14, 'Musique'),
(4, 'Nature'),
(7, 'Photographie'),
(9, 'Science'),
(15, 'Science-fiction'),
(2, 'Sport'),
(11, 'Technologie'),
(5, 'Voyage');

-- --------------------------------------------------------

--
-- Structure de la table `t_cif`
--

CREATE TABLE `t_cif` (
  `idCif` int UNSIGNED NOT NULL,
  `cifTitre` varchar(35) NOT NULL,
  `cifDescription` varchar(1000) NOT NULL,
  `cifDate` date NOT NULL,
  `fkUtilisateur` int UNSIGNED NOT NULL,
  `fkCategorie` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `t_cif`
--

INSERT INTO `t_cif` (`idCif`, `cifTitre`, `cifDescription`, `cifDate`, `fkUtilisateur`, `fkCategorie`) VALUES
(1, 'J\'adore ça', 'Bonjour, bonjour, je suis joaau et j\'adore les avions', '2023-02-09', 3, 7),
(2, 'J\'aime la littérature', 'Bonsoir, Sammuel, 91 ans, j\'adore la littérature.', '2023-02-02', 4, 1),
(3, 'A L\'AIDE', 'A l\'AIDE, J\'AI TROP DE SWAG', '2023-02-09', 2, 10),
(4, 'J\'adore la vuie (bis)', 'Je suis joaau, et vraiment, vraiment, j\'adore ça', '2023-02-08', 3, 7),
(5, 'Cherche femme 22 ans', 'Les femme de 22 ans, c\'est mon CIF ! :D', '2023-02-02', 2, 8);

-- --------------------------------------------------------

--
-- Structure de la table `t_evaluation`
--

CREATE TABLE `t_evaluation` (
  `idEvaluation` int UNSIGNED NOT NULL,
  `evaNote` decimal(3,1) NOT NULL,
  `fkUtilisateur` int UNSIGNED NOT NULL,
  `fkCif` int UNSIGNED NOT NULL
) ;

--
-- Déchargement des données de la table `t_evaluation`
--

INSERT INTO `t_evaluation` (`idEvaluation`, `evaNote`, `fkUtilisateur`, `fkCif`) VALUES
(1, '1.0', 4, 1),
(2, '3.0', 2, 3),
(3, '5.0', 3, 2),
(4, '3.0', 2, 1),
(5, '1.5', 4, 5);

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateur`
--

CREATE TABLE `t_utilisateur` (
  `idUtilisateur` int UNSIGNED NOT NULL,
  `utiPseudo` varchar(25) NOT NULL,
  `utiMotDePasse` varchar(255) NOT NULL,
  `utiDateEntree` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `t_utilisateur`
--

INSERT INTO `t_utilisateur` (`idUtilisateur`, `utiPseudo`, `utiMotDePasse`, `utiDateEntree`) VALUES
(1, 'Michel23', 'a6c4ba02f26fe311ae442ddfcd2287a27da879ef', '2023-02-01'),
(2, 'HenryDes', 'HenryDes', '2023-02-03'),
(3, 'Joaau', 'joaau', '2023-01-13'),
(4, 'Sammuel', 'Sammuel', '2023-01-10');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_categorie`
--
ALTER TABLE `t_categorie`
  ADD PRIMARY KEY (`idCategorie`),
  ADD UNIQUE KEY `unique_categorieTitre` (`catTitre`);

--
-- Index pour la table `t_cif`
--
ALTER TABLE `t_cif`
  ADD PRIMARY KEY (`idCif`),
  ADD UNIQUE KEY `unique_cifTitre` (`cifTitre`),
  ADD KEY `fk_idUtilisateur_cif` (`fkUtilisateur`),
  ADD KEY `fk_idCategorie_cif` (`fkCategorie`);

--
-- Index pour la table `t_evaluation`
--
ALTER TABLE `t_evaluation`
  ADD PRIMARY KEY (`idEvaluation`),
  ADD KEY `fk_idUtilisateur_eval` (`fkUtilisateur`),
  ADD KEY `fk_idCif` (`fkCif`);

--
-- Index pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`),
  ADD UNIQUE KEY `unique_utiPseudo` (`utiPseudo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_categorie`
--
ALTER TABLE `t_categorie`
  MODIFY `idCategorie` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `t_cif`
--
ALTER TABLE `t_cif`
  MODIFY `idCif` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `t_evaluation`
--
ALTER TABLE `t_evaluation`
  MODIFY `idEvaluation` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  MODIFY `idUtilisateur` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_cif`
--
ALTER TABLE `t_cif`
  ADD CONSTRAINT `fk_idCategorie_cif` FOREIGN KEY (`fkCategorie`) REFERENCES `t_categorie` (`idCategorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idUtilisateur_cif` FOREIGN KEY (`fkUtilisateur`) REFERENCES `t_utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `t_evaluation`
--
ALTER TABLE `t_evaluation`
  ADD CONSTRAINT `fk_idCif` FOREIGN KEY (`fkCif`) REFERENCES `t_cif` (`idCif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idUtilisateur_eval` FOREIGN KEY (`fkUtilisateur`) REFERENCES `t_utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
