-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 23 juil. 2021 à 01:43
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rsma_trombi`
--

-- --------------------------------------------------------

--
-- Structure de la table `compagnie`
--

CREATE TABLE `compagnie` (
  `id_compagnie` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `compagnie`
--

INSERT INTO `compagnie` (`id_compagnie`, `name`) VALUES
(1, 'CCFPLI'),
(2, 'CFP1'),
(4, 'CFP2');

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `id_filiere` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `id_section` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`id_filiere`, `name`, `description`, `id_section`) VALUES
(1, 'D-WEB', 'Développeur Web', 7),
(4, 'MATH', 'Métier Accueil Tourisme Hôtellerie', 7),
(8, 'AAD', 'Agent Administration', 7);

-- --------------------------------------------------------

--
-- Structure de la table `grade`
--

CREATE TABLE `grade` (
  `id_grade` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `grade`
--

INSERT INTO `grade` (`id_grade`, `name`) VALUES
(1, 'Marsouin'),
(6, 'Marsouin de 1er Classe'),
(7, 'Caporal'),
(8, 'Caporal-Chef'),
(9, 'Caporal-Chef de 1er Classe');

-- --------------------------------------------------------

--
-- Structure de la table `section`
--

CREATE TABLE `section` (
  `id_section` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `id_compagnie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `section`
--

INSERT INTO `section` (`id_section`, `name`, `id_compagnie`) VALUES
(2, 'Section 1', 1),
(5, 'Section 2', 1),
(7, 'Section 3', 1);

-- --------------------------------------------------------

--
-- Structure de la table `volontaire`
--

CREATE TABLE `volontaire` (
  `id_volontaire` int(11) NOT NULL,
  `img` text DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `home` varchar(100) DEFAULT NULL,
  `contact_firstname` varchar(100) DEFAULT NULL,
  `contact_lastname` varchar(100) DEFAULT NULL,
  `contact_phone` varchar(100) DEFAULT NULL,
  `id_grade` int(11) DEFAULT NULL,
  `id_filiere` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `volontaire`
--

INSERT INTO `volontaire` (`id_volontaire`, `img`, `firstname`, `lastname`, `birthday`, `phone`, `home`, `contact_firstname`, `contact_lastname`, `contact_phone`, `id_grade`, `id_filiere`) VALUES
(59, 'charpentier.jpg', 'CHARPENTIER', 'Nato', '2001-11-14', '89673399', 'ARUE', 'CHARPENTIER', 'Franck', '89719236', 1, 1),
(60, 'faatau.jpg', 'FAATAU', 'Teheetua', '1996-05-01', '87290706', 'Papara', 'DELPUECH', 'Natacha', '87786884', 1, 1),
(61, 'ie.jpg', 'IE', 'Manutahi', '2000-01-27', '87756556', NULL, 'IE', 'Ruita', '89231491', 1, 1),
(62, 'mahatia.jpg', 'MAHATIA', 'Oariiterai', '2001-10-02', '87256872', NULL, 'UEVA', 'Hinamareva', '87768677', 1, 1),
(63, 'peterano.jpg', 'PETERANO', 'Terehaunui', '1998-10-09', '89544210', NULL, 'PETERANO', 'Angéla', '87722542', 1, 1),
(64, 'poetai.jpg', 'POETAI', 'Teriimana', '2001-10-06', '89540618', NULL, 'POETAI', 'Gaêlle', '89206883', 1, 1),
(65, 'raoulx.jpg', 'RAOULX', 'Ranihei', '1997-06-25', '8730343', NULL, 'RAOULX', 'Caroline', '87701313', 1, 1),
(66, 'tautu.jpg', 'TAUTU', 'Vaimiti', '1998-04-24', '87772726', NULL, 'TAUTU', 'Manix', '87211807', 1, 1),
(67, 'tuahou.jpg', 'TUAHU', 'Wilfred', '1999-01-27', '89673399', NULL, 'ROBSON', 'Sophia', '87373492', 1, 1),
(68, 'vanaa.jpg', 'VANAA', 'Jubilé', '1998-01-27', '89673399', NULL, 'VANAA', 'Louise', '87730788', 1, 1),
(69, '', 'MATH', 'IA', '2021-07-03', '89000000', NULL, 'TEST', 'Icule', '89206883', 1, 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `compagnie`
--
ALTER TABLE `compagnie`
  ADD PRIMARY KEY (`id_compagnie`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id_filiere`),
  ADD KEY `FK_filiere_section` (`id_section`);

--
-- Index pour la table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id_grade`);

--
-- Index pour la table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id_section`),
  ADD KEY `FK_section_compagnie` (`id_compagnie`);

--
-- Index pour la table `volontaire`
--
ALTER TABLE `volontaire`
  ADD PRIMARY KEY (`id_volontaire`),
  ADD KEY `FK_volontaire_grade` (`id_grade`),
  ADD KEY `FK_volontaire_filiere` (`id_filiere`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `compagnie`
--
ALTER TABLE `compagnie`
  MODIFY `id_compagnie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id_filiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `grade`
--
ALTER TABLE `grade`
  MODIFY `id_grade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `section`
--
ALTER TABLE `section`
  MODIFY `id_section` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `volontaire`
--
ALTER TABLE `volontaire`
  MODIFY `id_volontaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD CONSTRAINT `FK_filiere_section` FOREIGN KEY (`id_section`) REFERENCES `section` (`id_section`) ON DELETE SET NULL;

--
-- Contraintes pour la table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `FK_section_compagnie` FOREIGN KEY (`id_compagnie`) REFERENCES `compagnie` (`id_compagnie`);

--
-- Contraintes pour la table `volontaire`
--
ALTER TABLE `volontaire`
  ADD CONSTRAINT `FK_volontaire_filiere` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`),
  ADD CONSTRAINT `FK_volontaire_grade` FOREIGN KEY (`id_grade`) REFERENCES `grade` (`id_grade`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
