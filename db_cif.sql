-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : jeu. 26 jan. 2023 à 09:02
-- Version du serveur : 8.0.30
-- Version de PHP : 8.0.19

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
  `carTitre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `t_cif`
--

CREATE TABLE `t_cif` (
  `idCif` int UNSIGNED NOT NULL,
  `cifTitre` varchar(100) NOT NULL,
  `cifDescription` varchar(1000) NOT NULL,
  `cifDate` date NOT NULL,
  `fkUtilisateur` int UNSIGNED NOT NULL,
  `fkCategorie` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `t_contenir`
--

CREATE TABLE `t_contenir` (
  `idContenir` int UNSIGNED NOT NULL,
  `fkEvaluation` int UNSIGNED NOT NULL,
  `fkCif` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `t_evaluation`
--

CREATE TABLE `t_evaluation` (
  `idEvaluation` int UNSIGNED NOT NULL,
  `evaNote` int UNSIGNED NOT NULL,
  `fkUtilisateur` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateur`
--

CREATE TABLE `t_utilisateur` (
  `idUtilisateur` int UNSIGNED NOT NULL,
  `utiPseudo` varchar(25) NOT NULL,
  `utiMotDePasse` varchar(25) NOT NULL,
  `utiDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `t_utilisateur`
--

INSERT INTO `t_utilisateur` (`idUtilisateur`, `utiPseudo`, `utiMotDePasse`, `utiDate`) VALUES
(1, 'joaferreira', 'asdasd', '2023-01-26');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_categorie`
--
ALTER TABLE `t_categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `t_cif`
--
ALTER TABLE `t_cif`
  ADD PRIMARY KEY (`idCif`),
  ADD KEY `fk_idUtilisateur_cif` (`fkUtilisateur`),
  ADD KEY `fk_idCategorie_cif` (`fkCategorie`);

--
-- Index pour la table `t_contenir`
--
ALTER TABLE `t_contenir`
  ADD PRIMARY KEY (`idContenir`),
  ADD KEY `fk_idEvaluation_cif` (`fkEvaluation`),
  ADD KEY `fk_idCif` (`fkCif`);

--
-- Index pour la table `t_evaluation`
--
ALTER TABLE `t_evaluation`
  ADD PRIMARY KEY (`idEvaluation`),
  ADD KEY `fk_idUtilisateur_eval` (`fkUtilisateur`);

--
-- Index pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`),
  ADD UNIQUE KEY `unique_pseudo` (`utiPseudo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_categorie`
--
ALTER TABLE `t_categorie`
  MODIFY `idCategorie` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_cif`
--
ALTER TABLE `t_cif`
  MODIFY `idCif` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_contenir`
--
ALTER TABLE `t_contenir`
  MODIFY `idContenir` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_evaluation`
--
ALTER TABLE `t_evaluation`
  MODIFY `idEvaluation` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  MODIFY `idUtilisateur` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Contraintes pour la table `t_contenir`
--
ALTER TABLE `t_contenir`
  ADD CONSTRAINT `fk_idCif` FOREIGN KEY (`fkCif`) REFERENCES `t_cif` (`idCif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idEvaluation_cif` FOREIGN KEY (`fkEvaluation`) REFERENCES `t_evaluation` (`idEvaluation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `t_evaluation`
--
ALTER TABLE `t_evaluation`
  ADD CONSTRAINT `fk_idUtilisateur_eval` FOREIGN KEY (`fkUtilisateur`) REFERENCES `t_utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
