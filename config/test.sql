-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 08 août 2019 à 15:34
-- Version du serveur :  5.7.23
-- Version de PHP :  5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `auteur` varchar(255) CHARACTER SET utf8 NOT NULL,
  `commentaire` text CHARACTER SET utf8 NOT NULL,
  `date_commentaire` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_article`, `auteur`, `commentaire`, `date_commentaire`) VALUES
(1, 1, 'Nico', 'Oh non les pauvres ', '2018-06-02 09:21:18'),
(2, 1, 'Tutu', 'Y vas y avoir de la pluie !', '2018-06-01 10:18:26'),
(3, 2, 'Nico', 'Aîe !! ça doit faire mal', '2018-06-01 08:20:17'),
(4, 2, 'Michel', 'J\'espère que tous le monde va bien', '2018-06-02 07:21:16'),
(5, 3, 'Jean', 'J\'aurai fait pareil ! ;-) des sous-sous ', '2018-06-01 08:00:00'),
(6, 3, 'David', 'Whoa !! trop bien , la chance', '2018-06-01 07:00:00'),
(7, 4, 'David', 'Ahh , bien mérité ! c\'est pas moral je sais, mais c\'est ce que je pense.', '2018-06-02 11:14:00'),
(8, 4, 'Nico', '5 ans c\'est lonnnnng', '2018-06-01 12:50:00'),
(9, 5, 'Jean', 'Allé !! on peut donc se garer comme l\'on veux !!', '2018-06-01 05:32:00'),
(10, 5, 'Emmanuel', 'Pfff !! ça c\'est encore des saletés de fonctionnaires. flemmards !', '2018-06-02 06:00:08'),
(11, 5, 'Valerie', 'Toujours les fonctionnaires qui font mal leurs travail !', '2018-06-01 06:00:00'),
(12, 6, 'Jean', 'Ca va être difficile !', '2018-06-07 04:26:00'),
(13, 6, 'Emmanuel', 'Les élèves c\'est comme les fonctionnaires ! ça sert à rien', '2018-06-05 03:04:00'),
(14, 6, 'Nico', 'Peut être que c\'est impossible ', '2018-06-01 09:00:00'),
(15, 7, 'David', 'C\'est un beau projet ça !! continuez', '2018-06-03 10:00:00'),
(16, 7, 'Emmanuel', 'Encore l\'argent que j\'aurai pas dans ma poche', '2018-06-02 06:00:00'),
(17, 8, 'Nico', 'Outch ! ', '2018-06-09 00:00:00'),
(18, 8, 'Jean ', 'Pas sur que tous le monde s\'en sorte', '2018-06-04 00:00:00'),
(19, 9, 'Jean', 'Blaaaaa !', '2018-06-04 08:00:00'),
(20, 15, 'Jean', 'Il faut bien maintenir les gens devant un écran pour éviter qu\'ils ne pensent trop. Des fois qu\'on les retrouve dans la rue.', '2018-06-02 09:00:00'),
(21, 15, 'Jean', 'Il faut bien maintenir les gens devant un écran pour éviter qu\'ils ne pensent trop. Des fois qu\'on les retrouve dans la rue.', '2018-06-02 09:00:00'),
(22, 15, 'Vico', 'Et ces personnes pratiquent-elles le souping?', '2018-06-01 03:00:00'),
(55, 19, 'Nunu', 'Pas si sûr', '2018-08-27 14:28:32'),
(54, 19, 'Nono', 'Ici c\'est là', '2018-08-27 12:09:51'),
(26, 15, 'Nicolas', 'Super ce commentaire !', '2018-06-11 10:31:10'),
(53, 3, 'Nico', 'Hello', '2018-07-30 09:50:24'),
(52, 1, 'Nico', 'de base', '2018-07-18 10:57:08'),
(36, 13, 'Nico', 'IL est peut être pas député', '2018-06-11 11:06:46'),
(51, 25, 'Gato', 'Ceci est censé être un test', '2018-01-12 15:45:25'),
(50, 11, 'Jean', 'jeanjean', '2018-06-12 16:08:22'),
(49, 18, 'sdsd', 'dsds', '2018-06-11 17:12:25'),
(56, 19, 'oo', 'msldùmsqdq', '2018-09-04 17:18:20'),
(57, 19, 'nouveau commentaire', 'nouveau', '2018-09-04 17:18:39'),
(58, 19, 'csds', 'sdsd', '2018-09-04 17:20:21'),
(59, 19, 'zeze', 'zeze', '2018-09-05 10:20:34'),
(60, 19, 'eeee', 'eeee', '2018-09-05 10:20:56'),
(61, 21, 'nivo', 'ccccc', '2018-09-07 10:40:16'),
(62, 21, 'zzzzz', 'azaaa', '2018-09-07 10:40:26');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `send_date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `title`, `content`, `send_date`) VALUES
(37, 'Un nouveau message dans l\'aasemblÃ©e', 'nouveau nouveau', '2019-07-16 13:35:04'),
(35, 'message', 'messga', '2019-07-16 13:08:51');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(150) NOT NULL,
  `pseudo` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(200) NOT NULL,
  `connexion_date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `guid`, `pseudo`, `email`, `password`, `connexion_date`) VALUES
(1, '5d48261496e20', 'michel', 'mich@m.com', '', '2019-08-05 10:50:28'),
(2, '5d499e845bee0', 'dodo', 'do@do.fr', '', '2019-08-06 13:36:36'),
(3, '5d499eb042a64', 'dodo', 'do@do.fr', '', '2019-08-06 13:37:20'),
(4, '5d499ebf17b62', 'susu', 'su@su.fr', '', '2019-08-06 13:37:35'),
(5, '5d499eda6d507', 'susu', 'su@su.fr', '', '2019-08-06 13:38:02'),
(6, '5d4c18ef022c3', 'Ema', 'ema@m.com', '$2y$10$BaUBCihVSFZZa/7bUtDYxOez7UR5mVY0BFQzwUtsxVox2iqgNzMD6', '2019-08-08 10:43:26'),
(12, '5d4c2477171ea', 'dodo', 'do@do.fr', '$2y$10$1WBs2UlOHgyL3vD84ekSZuFu.GL50SDMLhN15oyXOshn4iAgcYLJC', '2019-08-08 11:32:39'),
(13, '5d4c24d99b41b', '', '', '$2y$10$o/63Y3mAIpC5KMU0H6U77O4/OY6aFmh97XEqCVxU.EkYELQ7YX/AG', '2019-08-08 11:34:17'),
(14, '5d4c24dd66976', '', 'gvkhjk', '$2y$10$lwOhDciDgqLNHNy4irmGsOUuh2BvJ4DrbPH4MMJ0PfaJtdgmESq6u', '2019-08-08 11:34:21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
