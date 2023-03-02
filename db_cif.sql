-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : jeu. 02 mars 2023 à 08:26
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
(13, 'Histoire'),
(10, 'Humanitaire'),
(1, 'Livre'),
(17, 'Mode'),
(14, 'Musique'),
(4, 'Nature'),
(7, 'Photographie'),
(8, 'Restaurant'),
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
  `cifTitre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cifDescription` varchar(1000) NOT NULL,
  `cifDate` datetime NOT NULL,
  `fkUtilisateur` int UNSIGNED NOT NULL,
  `fkCategorie` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `t_cif`
--

INSERT INTO `t_cif` (`idCif`, `cifTitre`, `cifDescription`, `cifDate`, `fkUtilisateur`, `fkCategorie`) VALUES
(22, 'Le Comptoir du Relais', 'J\'ai récemment visité Le Comptoir du Relais à Paris et j\'ai été époustouflé par la qualité de la nourriture et du service. Chaque plat était présenté avec soin et le personnel était très aimable et attentionné.', '2023-02-02 09:00:52', 1, 8),
(23, 'Thriller', 'Cet album est un classique absolu. Chaque chanson est incroyablement entraînante et les paroles sont incroyablement bien écrites. Michael Jackson était vraiment un génie musical.', '2023-03-02 09:01:10', 2, 14),
(24, 'Le Machu Picchu', 'J\'ai fait un voyage épique au Machu Picchu il y a quelques années et c\'était vraiment incroyable. Les vues sont à couper le souffle et l\'histoire de l\'endroit est vraiment fascinante. C\'est un voyage que je recommanderais à tout le monde.', '2023-03-02 09:01:23', 2, 5),
(25, 'La théorie de la relativité restreinte', 'La théorie de la relativité restreinte d\'Einstein est l\'une des réalisations les plus remarquables de l\'histoire de la science. Les idées qu\'elle contient ont révolutionné notre compréhension de l\'univers et ont eu des implications dans de nombreux domaines différents.', '2023-02-16 10:02:41', 3, 9),
(26, 'Les portraits de Steve McCurry', ' J\'aime la façon dont Steve McCurry capture l\'essence de ses sujets dans ses portraits. Chaque photo est vraiment magnifique et raconte une histoire. J\'aimerais pouvoir prendre des photos comme lui un jour.', '2023-03-02 09:03:13', 4, 7),
(27, 'LeBron James', 'LeBron James est l\'un des plus grands joueurs de basket-ball de tous les temps. Sa force physique, sa vitesse, son agilité et sa vision sur le terrain en font un joueur incroyablement complet et dominant. En dehors du terrain, il est également un leader inspirant et un défenseur passionné des droits des athlètes.', '2023-03-02 09:04:19', 5, 2),
(28, 'Blade Runner', 'Blade Runner est un classique de la science-fiction qui explore des thèmes profonds tels que l\'identité, la technologie et la condition humaine. Les performances de Harrison Ford et Rutger Hauer sont incroyables et l\'ambiance sombre et futuriste du film est captivante.', '2023-03-02 09:04:42', 6, 15),
(29, 'Le musée du Louvre', 'Le musée du Louvre est l\'un des plus grands et des plus impressionnants musées du monde. Chaque salle est remplie d\'œuvres d\'art incroyables, allant des statues antiques aux peintures les plus célèbres du monde. Si vous êtes un amateur d\'art et de culture, c\'est un endroit que vous devez absolument visiter.', '2023-03-02 09:05:04', 7, 6),
(30, 'Le sac Birkin d\'Hermès', 'Le sac Birkin d\'Hermès est un symbole de style et de sophistication. Fabriqué à la main à partir des meilleurs matériaux, chaque sac est un chef-d\'œuvre unique qui peut coûter des dizaines de milliers de dollars. Si vous êtes un amateur de mode, c\'est un accessoire que vous devez absolument posséder.', '2023-03-02 09:05:24', 8, 17),
(31, 'La révolution française', 'La révolution française a été l\'un des événements les plus importants de l\'histoire de France et du monde. Elle a abouti à la chute de la monarchie française et à l\'avènement de la République, mais a également entraîné des années de violence et de chaos. C\'est une période fascinante à étudier et à comprendre.', '2023-03-02 09:06:01', 9, 13),
(32, 'Médecins sans frontières', 'Médecins sans frontières est une organisation humanitaire incroyable qui fournit des soins médicaux d\'urgence aux personnes touchées par des conflits armés, des épidémies et des catastrophes naturelles. Les médecins et les bénévoles de MSF risquent souvent leur vie pour aider les autres, ce qui est vraiment admirable.', '2023-03-02 09:06:23', 10, 10),
(33, 'L\'indépendance du Portugal', 'L\'histoire de l\'indépendance du Portugal est fascinante et riche en événements historiques. De la révolution des œillets en 1974 qui a mis fin à la dictature salazariste, à la reconnaissance de l\'indépendance de l\'Angola et du Mozambique en 1975, cette période a marqué la fin d\'une époque et l\'avènement d\'un nouvel ordre politique et social. Je recommande vivement de s\'intéresser à cette période passionnante de l\'histoire portugaise.', '2023-03-02 09:09:41', 1, 13),
(34, 'Gigachad', 'Gigachad est un personnage emblématique de la communauté des passionnés de musculation et de fitness. Avec son corps sculpté, ses performances physiques incroyables et son attitude inspirante, il est un modèle pour des millions de personnes à travers le monde. Si vous cherchez de la motivation pour atteindre vos objectifs de fitness, Gigachad est une source d\'inspiration incontournable.', '2023-03-02 09:11:03', 2, 2),
(35, 'Cristiano Ronaldo', 'Cristiano Ronaldo est un joueur de football légendaire, reconnu pour ses performances incroyables sur le terrain, sa technique impeccable et son engagement envers le sport. En tant que fan de football, je suis admirative de sa détermination, de son travail acharné et de sa passion pour le jeu. Si vous cherchez un exemple de persévérance et de succès, Cristiano Ronaldo est un choix évident.', '2023-03-02 09:11:58', 11, 2),
(36, 'Le Petit Bistrot', 'Le Petit Bistrot est un restaurant charmant et accueillant, qui offre une cuisine française traditionnelle et délicieuse. Les plats sont préparés avec des ingrédients frais et locaux, et le service est toujours chaleureux et attentif. Si vous cherchez une expérience culinaire authentique et mémorable, Le Petit Bistrot est un excellent choix.', '2023-03-02 09:14:34', 6, 8),
(37, 'Les îles Galápagos', 'Les îles Galápagos sont un véritable trésor de la nature, avec une faune et une flore uniques qui ne se trouvent nulle part ailleurs sur la planète. Les tortues géantes, les iguanes marins et les fous à pieds bleus sont quelques-unes des espèces fascinantes que vous pouvez observer lors de votre visite. Si vous cherchez un voyage qui vous emmènera dans un monde différent et vous offrira une expérience inoubliable, les îles Galápagos sont une destination à ne pas manquer.', '2023-03-02 09:14:56', 6, 5),
(38, 'Tour de Belém', 'La tour de Belém est un symbole de l\'histoire riche et fascinante du Portugal. Construite au 16ème siècle comme une forteresse pour protéger l\'entrée du port de Lisbonne, elle est aujourd\'hui classée au patrimoine mondial de l\'UNESCO. Si vous êtes intéressé par l\'histoire du Portugal, la tour de Belém est un incontournable.', '2023-03-02 09:16:38', 3, 13),
(39, 'Restaurante Solar dos Presuntos', 'Le Restaurante Solar dos Presuntos est l\'un des restaurants les plus renommés de Lisbonne, offrant une cuisine portugaise traditionnelle et raffinée. Les fruits de mer frais, les plats à base de viande et les desserts savoureux sont quelques-unes des spécialités que vous pouvez déguster dans cet établissement prestigieux. Si vous cherchez une expérience culinaire exceptionnelle à Lisbonne, le Restaurante Solar dos Presuntos est un choix sûr.', '2023-03-02 09:17:02', 7, 8),
(40, 'Fado', 'Le fado est un genre musical traditionnel portugais, qui est souvent décrit comme l\'âme du Portugal. Les chanteurs de fado expriment des émotions profondes à travers leurs chansons mélancoliques et poétiques, accompagnées de guitares acoustiques. Si vous cherchez à découvrir la culture portugaise et à ressentir des émotions intenses, le fado est un incontournable.', '2023-03-02 09:17:18', 7, 6),
(41, 'Casa dos Rapazes', 'La Casa dos Rapazes est une association caritative qui offre un soutien éducatif et social aux enfants et aux jeunes en difficulté. Elle travaille à aider les jeunes à se développer, à apprendre et à atteindre leur potentiel. Si vous cherchez à faire une différence dans la vie des enfants portugais, la Casa dos Rapazes est une organisation humanitaire qui mérite votre soutien.', '2023-03-02 09:17:48', 12, 10),
(42, 'Surf à Nazaré', 'Nazaré est une plage célèbre pour ses vagues gigantesques, qui attirent des surfeurs du monde entier. Si vous cherchez un défi sportif et une expérience de surf inoubliable, Nazaré est l\'endroit idéal. Vous pouvez également assister aux compétitions de surf qui se déroulent régulièrement sur cette plage spectaculaire.', '2023-03-02 09:18:05', 12, 2),
(43, 'Festival de musique de Paredes de Coura', 'Le Festival de musique de Paredes de Coura est l\'un des plus grands événements musicaux du Portugal, attirant des artistes locaux et internation.', '2023-03-02 09:18:26', 8, 14),
(44, 'Jungfraujoch', 'Une expérience incroyable au sommet de l\'Europe. Prenez le train jusqu\'à la station de montagne la plus élevée d\'Europe et découvrez la vue à couper le souffle sur les montagnes suisses enneigées.', '2023-03-02 09:19:50', 13, 5),
(45, 'Château de Chillon', 'Un château médiéval magnifiquement préservé sur les rives du lac Léman. Visitez le château et découvrez l\'histoire de la Suisse à travers les siècles.', '2023-03-02 09:20:10', 13, 13),
(46, 'Les Trois Couronnes', 'Un restaurant gastronomique étoilé Michelin avec une vue imprenable sur le lac Léman. Dégustez une cuisine raffinée et créative dans un cadre élégant et romantique.', '2023-03-02 09:20:55', 14, 8),
(47, 'Musée Olympique', 'Découvrez l\'histoire des Jeux Olympiques à travers une collection impressionnante d\'objets, d\'artefacts et de souvenirs dans un musée moderne et interactif.', '2023-03-02 09:21:06', 14, 6),
(48, 'Croix-Rouge suisse', 'Une organisation humanitaire de premier plan en Suisse qui fournit une aide d\'urgence, des soins de santé et un soutien social aux personnes en situation de crise et de détresse.', '2023-03-02 09:21:16', 14, 10),
(49, 'Ski à Verbier', 'Une station de ski de renommée mondiale offrant une grande variété de pistes pour tous les niveaux de compétence, ainsi que des vues spectaculaires sur les Alpes suisses.', '2023-03-02 09:21:49', 4, 2),
(50, 'Montreux Jazz Festival', 'L\'un des plus grands festivals de jazz et de musique au monde, qui attire des artistes renommés du monde entier chaque année. Profitez d\'une expérience musicale inoubliable au bord du lac Léman.', '2023-03-02 09:22:06', 15, 14);

-- --------------------------------------------------------

--
-- Structure de la table `t_evaluation`
--

CREATE TABLE `t_evaluation` (
  `idEvaluation` int UNSIGNED NOT NULL,
  `evaNote` decimal(3,1) NOT NULL,
  `fkUtilisateur` int UNSIGNED NOT NULL,
  `fkCif` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(1, 'Joao', 'c510cd8607f92e1e09fd0b0d0d035c16d2428fa4', '2023-03-02'),
(2, 'Samuel', 'c16aab9fe3288df0fb8fc1d24990a300b6b8f299', '2023-03-02'),
(3, 'Pelo la street', '58a250ea3638b31d7e9e37033d53cc61f0dd5de2', '2023-01-31'),
(4, 'Karim', '0df4ab017385e9aa3324400d725f59ea31c57132', '2023-02-23'),
(5, 'Bechire', '7343d5a93f3723ca26a0e1081e11ca011e9327c3', '2023-02-17'),
(6, 'Marie', 'f0fd596f396d8fc32d5e4fe4c73c61fa2ac55c70', '2023-02-03'),
(7, 'Emma', 'efdb8f7f2fe9c47e34dfe1fb7c491d0638ec2d86', '2023-03-01'),
(8, 'Pierre', 'ff019a5748a52b5641624af88a54a2f0e46a9fb5', '2023-01-28'),
(9, 'AjaxLeFou', '4482611cc290c2ce1399431891dcb9221c95f994', '2023-02-10'),
(10, 'Romain', 'b8aabb4b95c817d9df69b6be95b2b94d6b1efe17', '2023-02-16'),
(11, 'Davide', '1cd424918902c1dbc16c61ea09f30b31f6c2f0e9', '2023-03-01'),
(12, 'Celui qui aime les pays', 'd07b45f0e48c1a30f7110522514722cd3a7b081a', '2023-03-02'),
(13, 'Muller', 'ea1dce70351cdada45108343dcffcd9084bc150d', '2023-02-21'),
(14, 'Gilbert Gruaz', 'cd065f7067ac65a0bf2711fe65e617f2c28f632a', '2023-01-11'),
(15, 'Marco', '3829486b93ec44395f0b980424bae9b6fb07b7bc', '2023-03-02');

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
  MODIFY `idCif` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `t_evaluation`
--
ALTER TABLE `t_evaluation`
  MODIFY `idEvaluation` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  MODIFY `idUtilisateur` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
