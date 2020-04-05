-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  ven. 03 avr. 2020 à 12:03
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idChapitre` int(11) NOT NULL,
  `pseudo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `commentaire` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `dateHeure` datetime NOT NULL,
  `signalement` int(11) NOT NULL,
  `dateSignalement` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `idChapitre`, `pseudo`, `commentaire`, `dateHeure`, `signalement`, `dateSignalement`) VALUES
(34, 6, 'AlF', 'on rajoute un petit commentaire vite fait\r\n', '2020-03-29 22:03:46', 0, '0000-00-00 00:00:00'),
(6, 8, 'AlF', 'ca c\'est mon commentaire !', '2020-03-13 09:24:12', 0, '2020-04-01 15:16:18'),
(7, 8, 'AlFi', 'ca c\'est mon commentaire ca c\'est mon comm entaire ca c\'est mon commentaire !', '2020-03-13 00:00:00', 0, '2020-03-30 23:22:49'),
(8, 7, 'moi', 'chapitre 7  4', '2020-03-13 10:04:01', 1, '2020-03-31 14:18:30'),
(10, 7, 'moi', 'chapitre 7  3', '0000-00-00 00:00:00', 1, '2020-03-31 14:18:28'),
(11, 7, 'Mon pseu', 'chapitre 7  2', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(12, 7, 'aze', 'chapitre 7  1', '0000-00-00 00:00:00', 1, '2020-03-31 14:50:56'),
(13, 7, 'atrefg', 'chapitre 7  5', '2020-03-13 10:29:37', 1, '2020-03-31 14:18:32'),
(15, 6, 'rett', 'retest', '2020-03-13 10:55:09', 0, '0000-00-00 00:00:00'),
(16, 6, 'idtest', 'testID', '2020-03-13 11:01:06', 0, '0000-00-00 00:00:00'),
(17, 5, 'idtest', 'testID', '2020-03-13 11:02:32', 0, '0000-00-00 00:00:00'),
(18, 5, 'sdf', 'fds', '2020-03-13 11:04:43', 0, '0000-00-00 00:00:00'),
(36, 7, 'youregchof', 'aaaaaaaaaaaaaaaaaaaaaaaaaaare zer zertztrzt zriutpoizr tuopzri tpozri tpozrtuozr^tuzrti ^^toiu irzptioiteopyutopytoîyoptiyotpiypotuiopyerutiyu ytpoiyu', '2020-03-31 14:52:06', 0, '0000-00-00 00:00:00'),
(20, 4, 'AlF', 'dernier test\r\n', '2020-03-13 11:07:57', 0, '0000-00-00 00:00:00'),
(21, 3, 'AlF', 'encore 1 test', '2020-03-13 11:08:56', 0, '0000-00-00 00:00:00'),
(22, 2, 'qsd', 'one more test', '2020-03-13 11:11:25', 0, '0000-00-00 00:00:00'),
(23, 2, 'AlF', 'et un test de plus', '2020-03-13 11:13:13', 1, '2020-03-30 23:49:36'),
(24, 0, 'AlF', 'fdsfd', '2020-03-13 13:51:41', 0, '0000-00-00 00:00:00'),
(25, 0, 'moi', 'test du chapitre 6', '2020-03-13 14:01:13', 0, '0000-00-00 00:00:00'),
(26, 6, 'moi', 'test du chapitre 6', '2020-03-13 14:03:42', 0, '0000-00-00 00:00:00'),
(35, 8, 'me', 'here my com', '2020-03-30 14:49:51', 0, '2020-03-31 14:07:07'),
(29, 2, 'chap', 'chapitre 2', '2020-03-13 14:08:44', 0, '0000-00-00 00:00:00'),
(30, 5, 'test', 'test chapitre 5', '2020-03-13 14:32:59', 1, '2020-03-30 23:45:32'),
(31, 5, 'AlF', 'retest du chapitre 5', '2020-03-13 14:35:01', 0, '0000-00-00 00:00:00'),
(37, 7, 'aaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2020-03-31 14:52:25', 0, '0000-00-00 00:00:00'),
(38, 7, 'aaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2020-03-31 14:53:40', 1, '2020-04-01 16:24:57'),
(39, 7, 'd', 'eteeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeettrrrrrrrrrrrrrrrrrrrrrr', '2020-03-31 14:55:04', 0, '0000-00-00 00:00:00'),
(41, 7, 'moi', 'sdfsdf', '2020-03-31 15:14:36', 1, '2020-03-31 15:14:44'),
(42, 7, 'azez', '&lt;p&gt;test&lt;/p&gt;', '2020-03-31 16:12:56', 1, '2020-03-31 16:29:26'),
(43, 7, 'fds', '<p>test</p>', '2020-03-31 16:13:22', 0, '0000-00-00 00:00:00'),
(44, 7, 'd', '&lt;div&gt;retest&lt;/div&gt;', '2020-03-31 16:13:51', 1, '2020-04-01 16:25:00'),
(45, 7, ' fhqf yhiuoq', 'd foisudfoi usdoif ujisd fiosdufoi shdfuiod hgoisf g uifhguifd goiujqigoiduqyh giohdfg iuoqhd oipgudoif gujoidfqp guoifdug oiqfu giopufqdpoi guqfoig u', '2020-03-31 22:05:15', 0, '0000-00-00 00:00:00'),
(46, 7, ' fhqf yhiuoq', 'd foisudfoi usdoif ujisd fiosdufoi shdfuiod hgoisf g uifhguifd goiujqigoiduqyh giohdfg iuoqhd oipgudoif gujoidfqp guoifdug oiqfu giopufqdpoi guqfoig u', '2020-03-31 22:08:56', 1, '2020-04-01 16:24:59'),
(47, 8, 'moi', 'je test le ch8 au ch7', '2020-03-31 22:10:45', 0, '0000-00-00 00:00:00'),
(48, 8, 'tes', 'test', '2020-03-31 22:18:35', 0, '2020-04-01 15:17:24');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
