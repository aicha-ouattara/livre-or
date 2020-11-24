-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mar. 24 nov. 2020 à 15:03
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `livreor`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES
(1, 'J\'avous les coiffures afro c\'est pas mon truc ! Mais geniale !', 1, '2020-11-24 12:52:58'),
(2, 'La coiffure Bazzoka ! coool !', 2, '2020-11-24 12:54:02'),
(3, 'Pffiiouuu un reve !', 3, '2020-11-24 12:55:11'),
(4, 'Une vraie ténancière ! j\'adore bien ...', 4, '2020-11-24 02:08:50'),
(5, 'heeeeeeeey\r\n', 5, '2020-11-24 02:22:53');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'May', '$2y$10$8ZI9RPlRKW8M6At9NZwB8ePt/ABdf0t1JwsImT01L/g7UTEdJCygS'),
(2, 'Alicia', '$2y$10$mCY9vXWiL/DbRz5FoZrVV.Ke3.s9K.IUkOiAhFQ9ceRZjytD/5WfK'),
(3, 'laurie', '$2y$10$vo9TtNEF0Be47NuAxdBvru8vAYCs0vCZxd2V6n5Q9E3uqcnsytGUK'),
(4, 'Olivier', '$2y$10$kArQX.o/4DQTnPTmy4HWFul5OVo/v9IpFME6/FZp4mv7g.YK/hx3.'),
(5, 'yaya', '$2y$10$JUqkE3l6fL8Tx5iJCy7kt.2upuK6acbaXRhrsNoF5q9yEg5tV9fY6');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
