-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 22 Août 2017 à 11:26
-- Version du serveur :  5.7.19-0ubuntu0.16.04.1
-- Version de PHP :  7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `c_taxo`
--

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE `competences` (
  `nom` varchar(40) NOT NULL,
  `domaine` varchar(40) NOT NULL,
  `placed` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `competences`
--

INSERT INTO `competences` (`nom`, `domaine`, `placed`) VALUES
('C', 'computer science', 0),
('C++', 'computer science', 0),
('Fonctionnal', 'computer science', 0),
('hiza guruma', 'sports', 1),
('Imperative', 'computer science', 0),
('JAVA', 'computer science', 0),
('Judo', 'sports', 1),
('ko soto gake', 'sports', 1),
('ko soto gari', 'sports', 1),
('ne waza', 'sports', 1),
('okuri ashi harai', 'sports', 1),
('OOP', 'computer science', 0),
('sutemi waza', 'sports', 1),
('tachi waza', 'sports', 1);

-- --------------------------------------------------------

--
-- Structure de la table `contribution`
--

CREATE TABLE `contribution` (
  `id` int(11) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `concept1` varchar(40) NOT NULL,
  `concept2` varchar(40) NOT NULL,
  `vote` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contribution`
--

INSERT INTO `contribution` (`id`, `ip`, `time`, `concept1`, `concept2`, `vote`) VALUES
(6, '127.0.0.1', '2017-07-18 15:13:18', 'KO SOTO GAKE', 'sutemi waza', 'tc'),
(7, '127.0.0.1', '2017-07-18 15:14:24', '', 'ko soto gake', 'tc'),
(8, '127.0.0.1', '2017-07-18 15:14:26', '', 'ko soto gake', 'tc'),
(9, '127.0.0.1', '2017-07-18 15:24:40', '', 'ko soto gake', 'tc'),
(10, '127.0.0.1', '2017-07-18 17:04:31', 'C', 'c++', 'tc'),
(11, '127.0.0.1', '2017-07-18 17:36:20', 'JAVA', 'c++', 'tc'),
(12, '127.0.0.1', '2017-07-18 17:36:23', 'JAVA', 'c', 'td'),
(13, '127.0.0.1', '2017-07-18 17:36:25', 'JAVA', 'c', 'td'),
(14, '127.0.0.1', '2017-07-19 15:05:58', 'C', 'java', 'tc'),
(15, '127.0.0.1', '2017-07-19 15:06:02', 'C', 'c++', 'td'),
(16, '127.0.0.1', '2017-07-19 15:06:04', 'C', 'c', 'td'),
(17, '127.0.0.1', '2017-07-19 15:06:08', 'C', 'c', 'te'),
(18, '127.0.0.1', '2017-07-19 15:17:42', 'C', 'java', 'tc'),
(19, '127.0.0.1', '2017-07-19 15:17:45', 'C', 'c++', 'td'),
(20, '127.0.0.1', '2017-07-19 15:17:47', 'C', 'c', 'td'),
(21, '127.0.0.1', '2017-07-19 15:17:57', 'C', 'c', 'te'),
(22, '127.0.0.1', '2017-07-19 15:22:11', 'C', 'java', 'tc'),
(23, '127.0.0.1', '2017-07-19 15:22:15', 'C', 'c++', 'td'),
(24, '127.0.0.1', '2017-07-19 15:22:16', 'C', 'c', 'td'),
(25, '127.0.0.1', '2017-07-19 15:22:18', 'C', 'c', 'te'),
(26, '127.0.0.1', '2017-07-20 10:59:48', 'C', 'java', 'tc'),
(27, '127.0.0.1', '2017-07-20 10:59:51', 'C', 'c++', 'td'),
(28, '127.0.0.1', '2017-07-20 10:59:53', 'C', 'c', 'td'),
(29, '127.0.0.1', '2017-07-20 10:59:55', 'C', 'c', 'te'),
(30, '127.0.0.1', '2017-07-20 11:06:06', 'C', 'fonctionnal', 'tf'),
(31, '127.0.0.1', '2017-07-20 11:06:29', 'C', 'java', 'tc'),
(32, '127.0.0.1', '2017-07-20 11:06:31', 'C', 'c++', 'tf'),
(33, '127.0.0.1', '2017-07-20 11:06:34', 'C', 'c', 'tf'),
(34, '127.0.0.1', '2017-07-20 11:06:37', 'C', 'c', 'tf'),
(35, '127.0.0.1', '2017-07-20 11:11:08', 'C', 'fonctionnal', 'tf'),
(36, '127.0.0.1', '2017-07-20 11:11:18', 'C', 'java', 'tc'),
(37, '127.0.0.1', '2017-07-20 11:11:20', 'C', 'c++', 'tf'),
(38, '127.0.0.1', '2017-07-20 11:11:22', 'C', 'c', 'tf'),
(39, '127.0.0.1', '2017-07-20 11:12:09', 'C', 'java', 'tc'),
(40, '127.0.0.1', '2017-07-20 11:12:11', 'C', 'c++', 'tf'),
(41, '127.0.0.1', '2017-07-20 11:12:13', 'C', 'c', 'tf'),
(42, '127.0.0.1', '2017-07-20 11:23:41', 'C', 'java', 'tc'),
(43, '127.0.0.1', '2017-07-20 11:23:48', 'C', 'c++', 'tf'),
(44, '127.0.0.1', '2017-07-20 11:23:49', 'C', 'c', 'tf'),
(45, '127.0.0.1', '2017-07-20 11:23:52', 'C', 'c', 'tf'),
(46, '127.0.0.1', '2017-07-20 11:26:37', 'C', 'fonctionnal', 'tf'),
(47, '127.0.0.1', '2017-07-20 11:26:45', 'C', 'fonctionnal', 'tc'),
(48, '127.0.0.1', '2017-07-20 11:27:21', 'C', 'java', 'tc'),
(49, '127.0.0.1', '2017-07-20 11:27:24', 'C', 'c++', 'tf'),
(50, '127.0.0.1', '2017-07-20 11:27:25', 'C', 'c++', 'tf'),
(51, '127.0.0.1', '2017-07-20 11:35:39', 'C', 'java', 'tc'),
(52, '127.0.0.1', '2017-07-20 11:35:42', 'C', 'c++', 'tf'),
(53, '127.0.0.1', '2017-07-20 11:35:45', 'C', 'c', 'tf'),
(54, '127.0.0.1', '2017-07-20 11:35:48', 'C', 'c', 'tf'),
(55, '127.0.0.1', '2017-07-20 11:39:41', 'C', 'java', 'tc'),
(56, '127.0.0.1', '2017-07-20 11:39:42', 'C', 'c++', 'tf'),
(57, '127.0.0.1', '2017-07-20 11:39:45', 'C', 'c', 'te'),
(58, '127.0.0.1', '2017-07-20 11:39:48', 'C', 'c', 'tf'),
(59, '127.0.0.1', '2017-07-20 11:53:46', 'C', 'java', 'tc'),
(60, '127.0.0.1', '2017-07-20 11:53:50', 'C', 'c++', 'tf'),
(61, '127.0.0.1', '2017-07-20 11:53:55', 'C', 'c', 'td'),
(62, '127.0.0.1', '2017-07-20 11:53:57', 'C', 'c', 'tf'),
(63, '127.0.0.1', '2017-07-20 11:57:07', 'OOP', 'java', 'tc'),
(64, '127.0.0.1', '2017-07-20 11:57:11', 'OOP', 'c++', 'tf'),
(65, '127.0.0.1', '2017-07-20 11:57:14', 'OOP', 'c', 'tf'),
(66, '127.0.0.1', '2017-07-20 11:57:17', 'OOP', 'c', 'tf'),
(67, '127.0.0.1', '2017-07-20 12:01:28', 'OOP', 'java', 'tc'),
(68, '127.0.0.1', '2017-07-20 12:01:31', 'OOP', 'c++', 'tf'),
(69, '127.0.0.1', '2017-07-20 12:01:33', 'OOP', 'c', 'tf'),
(70, '127.0.0.1', '2017-07-20 12:01:34', 'OOP', 'c', 'tf'),
(71, '127.0.0.1', '2017-07-20 12:02:47', 'OOP', 'java', 'tc'),
(72, '127.0.0.1', '2017-07-20 12:02:50', 'OOP', 'c++', 'tf'),
(73, '127.0.0.1', '2017-07-20 12:02:52', 'OOP', 'c', 'tf'),
(74, '127.0.0.1', '2017-07-20 12:02:55', 'OOP', 'c', 'te'),
(75, '127.0.0.1', '2017-07-20 14:10:19', 'JAVA', 'computer science', 'tc'),
(76, '127.0.0.1', '2017-07-20 14:10:34', 'IMPERATIVE', 'java', 'tf'),
(77, '127.0.0.1', '2017-07-20 14:10:51', 'C++', 'java', 'tc'),
(78, '127.0.0.1', '2017-07-20 14:10:55', 'C++', 'java', 'td'),
(79, '127.0.0.1', '2017-07-20 14:11:07', 'OOP', 'java', 'tc'),
(80, '127.0.0.1', '2017-07-20 14:11:10', 'OOP', 'c++', 'tf'),
(81, '127.0.0.1', '2017-07-20 14:11:12', 'OOP', 'c++', 'tf'),
(82, '127.0.0.1', '2017-07-20 14:11:31', 'C', 'oop', 'tc'),
(83, '127.0.0.1', '2017-07-20 14:11:35', 'C', 'java', 'tc'),
(84, '127.0.0.1', '2017-07-20 14:11:37', 'C', 'c++', 'td'),
(85, '127.0.0.1', '2017-07-20 14:11:38', 'C', 'c++', 'td'),
(86, '127.0.0.1', '2017-07-20 14:11:52', 'FONCTIONNAL', 'imperative', 'td'),
(87, '127.0.0.1', '2017-07-20 14:14:40', 'C', 'oop', 'tc'),
(88, '127.0.0.1', '2017-07-20 14:14:43', 'C', 'java', 'tc'),
(89, '127.0.0.1', '2017-07-20 14:14:45', 'C', 'c++', 'td'),
(90, '127.0.0.1', '2017-07-20 14:14:46', 'C', 'c', 'td'),
(91, '127.0.0.1', '2017-07-20 14:14:50', 'C', 'c', 'te'),
(92, '127.0.0.1', '2017-07-20 14:15:25', 'C', 'oop', 'tc'),
(93, '127.0.0.1', '2017-07-20 14:15:27', 'C', 'java', 'tc'),
(94, '127.0.0.1', '2017-07-20 14:15:29', 'C', 'c++', 'td'),
(95, '127.0.0.1', '2017-07-20 14:15:30', 'C', 'c', 'td'),
(96, '127.0.0.1', '2017-07-20 14:15:32', 'C', 'c', 'td'),
(97, '127.0.0.1', '2017-07-20 14:16:16', 'KO SOTO GAKE', 'sports', 'tc'),
(98, '127.0.0.1', '2017-07-20 14:16:34', 'NE WAZA', 'ko soto gake', 'td'),
(99, '127.0.0.1', '2017-07-20 14:16:54', 'HIZA GURUMA', 'ko soto gake', 'td'),
(100, '127.0.0.1', '2017-07-20 14:17:05', 'HIZA GURUMA', 'ko soto gake', 'td'),
(101, '127.0.0.1', '2017-07-20 14:17:31', 'OKURI ASHI HARAI', 'ko soto gake', 'td'),
(102, '127.0.0.1', '2017-07-20 14:17:33', 'OKURI ASHI HARAI', 'hiza guruma', 'td'),
(103, '127.0.0.1', '2017-07-20 14:17:35', 'OKURI ASHI HARAI', 'hiza guruma', 'td'),
(104, '127.0.0.1', '2017-07-20 14:18:02', 'JUDO', 'ne waza', 'tf'),
(105, '127.0.0.1', '2017-07-20 14:18:04', 'JUDO', 'ko soto gake', 'tf'),
(106, '127.0.0.1', '2017-07-20 14:18:06', 'JUDO', 'hiza guruma', 'tf'),
(107, '127.0.0.1', '2017-07-20 14:18:08', 'JUDO', 'hiza guruma', 'tf'),
(108, '127.0.0.1', '2017-07-20 14:18:23', 'TACHI WAZA', 'okuri ashi harai', 'tc'),
(109, '127.0.0.1', '2017-07-20 14:18:33', 'TACHI WAZA', 'ne waza', 'td'),
(110, '127.0.0.1', '2017-07-20 14:18:36', 'TACHI WAZA', 'ko soto gake', 'td'),
(111, '127.0.0.1', '2017-07-20 14:18:39', 'TACHI WAZA', 'hiza guruma', 'td'),
(112, '127.0.0.1', '2017-07-20 14:18:42', 'TACHI WAZA', 'hiza guruma', 'td'),
(113, '127.0.0.1', '2017-07-20 14:19:01', 'SUTEMI WAZA', 'tachi waza', 'tc'),
(114, '127.0.0.1', '2017-07-20 14:19:09', 'SUTEMI WAZA', 'okuri ashi harai', 'td'),
(115, '127.0.0.1', '2017-07-20 14:19:18', 'SUTEMI WAZA', 'ne waza', 'tf'),
(116, '127.0.0.1', '2017-07-20 14:19:23', 'SUTEMI WAZA', 'ko soto gake', 'td'),
(117, '127.0.0.1', '2017-07-20 14:19:25', 'SUTEMI WAZA', 'hiza guruma', 'tf'),
(118, '127.0.0.1', '2017-07-20 14:19:28', 'SUTEMI WAZA', 'hiza guruma', 'tf'),
(119, '127.0.0.1', '2017-07-20 14:19:43', 'KO SOTO GARI', 'tachi waza', 'tc'),
(120, '127.0.0.1', '2017-07-20 14:19:57', 'KO SOTO GARI', 'sutemi waza', 'td'),
(121, '127.0.0.1', '2017-07-20 14:19:59', 'KO SOTO GARI', 'okuri ashi harai', 'tc'),
(122, '127.0.0.1', '2017-07-20 14:20:04', 'KO SOTO GARI', 'ko soto gake', 'td'),
(123, '127.0.0.1', '2017-07-20 14:20:05', 'KO SOTO GARI', 'hiza guruma', 'td'),
(124, '127.0.0.1', '2017-07-20 14:20:06', 'KO SOTO GARI', 'hiza guruma', 'td'),
(125, '127.0.0.1', '2017-07-20 14:47:06', 'OOC', 'oop', 'tc'),
(126, '127.0.0.1', '2017-07-20 14:47:13', 'OOC', 'oop', 'td'),
(127, '127.0.0.1', '2017-07-20 15:20:32', 'IMPERATIVE', 'imperative', 'te'),
(128, '127.0.0.1', '2017-07-20 15:20:59', 'C++', 'oop', 'tc'),
(129, '127.0.0.1', '2017-07-20 15:21:03', 'C++', 'java', 'tc'),
(130, '127.0.0.1', '2017-07-20 15:21:05', 'C++', 'c++', 'td'),
(131, '127.0.0.1', '2017-07-20 15:21:08', 'C++', 'c++', 'te'),
(132, '127.0.0.1', '2017-07-20 16:06:50', 'FONCTIONNAL', 'fonctionnal', 'td'),
(133, '127.0.0.1', '2017-07-20 16:06:53', 'FONCTIONNAL', 'fonctionnal', 'td'),
(134, '127.0.0.1', '2017-07-21 11:19:50', 'JAVA', 'ooc', 'tc'),
(135, '127.0.0.1', '2017-07-21 11:20:18', 'JAVA', 'ooc', 'td'),
(136, '127.0.0.1', '2017-07-21 11:20:35', 'OOP', 'ooc', 'tc'),
(137, '127.0.0.1', '2017-07-21 11:20:39', 'OOP', 'java', 'td'),
(138, '127.0.0.1', '2017-07-21 11:20:52', 'OOP', 'java', 'tf'),
(139, '127.0.0.1', '2017-07-21 11:21:11', 'OOC', 'oop', 'tc'),
(140, '127.0.0.1', '2017-07-21 11:21:16', 'OOC', 'ooc', 'td'),
(141, '127.0.0.1', '2017-07-21 11:21:18', 'OOC', 'ooc', 'te'),
(142, '127.0.0.1', '2017-07-21 11:21:30', 'C', 'oop', 'tc'),
(143, '127.0.0.1', '2017-07-21 11:21:36', 'C', 'java', 'tc'),
(144, '127.0.0.1', '2017-07-21 11:21:39', 'C', 'java', 'td'),
(145, '127.0.0.1', '2017-07-21 11:22:04', 'IMPERATIVE', 'imperative', 'te'),
(146, '127.0.0.1', '2017-07-21 11:22:23', 'OOC', 'oop', 'tc'),
(147, '127.0.0.1', '2017-07-21 11:22:26', 'OOC', 'java', 'tc'),
(148, '127.0.0.1', '2017-07-21 11:22:29', 'OOC', 'c', 'tf'),
(149, '127.0.0.1', '2017-07-21 11:22:33', 'OOC', 'c', 'tf'),
(150, '127.0.0.1', '2017-07-25 10:24:41', 'FONCTIONNAL', 'fonctionnal', 'td'),
(151, '127.0.0.1', '2017-07-25 10:24:46', 'FONCTIONNAL', 'fonctionnal', 'te'),
(152, '127.0.0.1', '2017-08-21 15:46:24', 'JAVA', 'oop', 'tc'),
(153, '127.0.0.1', '2017-08-21 15:46:37', 'JAVA', 'java', 'tc'),
(154, '127.0.0.1', '2017-08-21 15:46:40', 'JAVA', 'java', 'te'),
(155, '127.0.0.1', '2017-08-21 16:52:19', 'OOP', 'computer science', 'tc'),
(156, '127.0.0.1', '2017-08-21 16:52:35', 'IMPERATIVE', 'oop', 'tf'),
(157, '127.0.0.1', '2017-08-21 16:53:21', 'C++', 'oop', 'tc'),
(158, '127.0.0.1', '2017-08-21 16:53:44', 'C++', 'oop', 'tc'),
(159, '127.0.0.1', '2017-08-21 16:54:00', 'FONCTIONNAL', 'imperative', 'td'),
(160, '127.0.0.1', '2017-08-21 16:54:14', 'JAVA', 'oop', 'tc'),
(161, '127.0.0.1', '2017-08-21 16:54:17', 'JAVA', 'c++', 'tc'),
(162, '127.0.0.1', '2017-08-21 16:54:19', 'JAVA', 'c++', 'td'),
(163, '127.0.0.1', '2017-08-21 16:54:29', 'C', 'oop', 'tc'),
(164, '127.0.0.1', '2017-08-21 16:54:30', 'C', 'java', 'tc'),
(165, '127.0.0.1', '2017-08-21 16:54:32', 'C', 'c++', 'td'),
(166, '127.0.0.1', '2017-08-21 16:54:42', 'C', 'c++', 'td'),
(167, '127.0.0.1', '2017-08-21 16:57:19', 'OOP', 'computer science', 'tc'),
(168, '127.0.0.1', '2017-08-21 16:57:33', 'FONCTIONNAL', 'oop', 'td'),
(169, '127.0.0.1', '2017-08-21 16:57:47', 'C', 'oop', 'tc'),
(170, '127.0.0.1', '2017-08-21 16:57:59', 'IMPERATIVE', 'fonctionnal', 'tf'),
(171, '127.0.0.1', '2017-08-21 16:58:02', 'IMPERATIVE', 'fonctionnal', 'td'),
(172, '127.0.0.1', '2017-08-21 16:58:26', 'JAVA', 'oop', 'tc'),
(173, '127.0.0.1', '2017-08-21 16:58:28', 'JAVA', 'c', 'tc'),
(174, '127.0.0.1', '2017-08-21 16:58:30', 'JAVA', 'c', 'td'),
(175, '127.0.0.1', '2017-08-21 16:58:39', 'C++', 'oop', 'tc'),
(176, '127.0.0.1', '2017-08-21 16:58:41', 'C++', 'java', 'tc'),
(177, '127.0.0.1', '2017-08-21 16:58:43', 'C++', 'c', 'td'),
(178, '127.0.0.1', '2017-08-21 16:58:45', 'C++', 'c', 'tc'),
(179, '127.0.0.1', '2017-08-22 11:10:45', 'IMPERATIVE', 'computer science', 'tc'),
(180, '127.0.0.1', '2017-08-22 11:11:03', 'JAVA', 'imperative', 'tc'),
(181, '127.0.0.1', '2017-08-22 11:11:14', 'FONCTIONNAL', 'imperative', 'td'),
(182, '127.0.0.1', '2017-08-22 11:11:23', 'C', 'java', 'tc'),
(183, '127.0.0.1', '2017-08-22 11:11:25', 'C', 'java', 'td'),
(184, '127.0.0.1', '2017-08-22 11:12:15', 'C++', 'java', 'tc'),
(185, '127.0.0.1', '2017-08-22 11:12:18', 'C++', 'c', 'td'),
(186, '127.0.0.1', '2017-08-22 11:12:20', 'C++', 'c', 'td'),
(187, '127.0.0.1', '2017-08-22 11:12:35', 'OOP', 'java', 'tc'),
(188, '127.0.0.1', '2017-08-22 11:12:38', 'OOP', 'c++', 'tf'),
(189, '127.0.0.1', '2017-08-22 11:12:40', 'OOP', 'c', 'tf'),
(190, '127.0.0.1', '2017-08-22 11:12:42', 'OOP', 'c', 'tf');

-- --------------------------------------------------------

--
-- Structure de la table `domaines`
--

CREATE TABLE `domaines` (
  `nom` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `domaines`
--

INSERT INTO `domaines` (`nom`) VALUES
('computer science'),
('sports');

--
-- Déclencheurs `domaines`
--
DELIMITER $$
CREATE TRIGGER `addDomaine` AFTER INSERT ON `domaines` FOR EACH ROW BEGIN     
INSERT INTO taxonomy_v3 VALUES ('skills', NEW.nom,1,1,'skills');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `Persons`
--

CREATE TABLE `Persons` (
  `father` varchar(255) NOT NULL,
  `child` varchar(255) NOT NULL,
  `domaine` varchar(255) DEFAULT NULL,
  `votes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `precheck`
--

CREATE TABLE `precheck` (
  `competence` varchar(40) NOT NULL,
  `checkpoint` int(11) DEFAULT '0',
  `domaine` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `precheck`
--

INSERT INTO `precheck` (`competence`, `checkpoint`, `domaine`) VALUES
('ART MARTIAUX', 6, 'sports'),
('AVIRON', 6, 'sports'),
('C++', 4, 'computer science'),
('COLLECTIF', 6, 'sports'),
('HASKELL', 3, 'computer science'),
('INDIVIDUEL', 6, 'sports'),
('JAVA', 5, 'computer science'),
('KAYAK', 6, 'sports'),
('NATATION', 6, 'sports'),
('NAUTIQUE', 7, 'sports'),
('OOC', 5, 'computer science'),
('OOP', 5, 'computer science'),
('PHP', 2, 'computer science'),
('PROLOGUE', 4, 'computer science'),
('PYTHON', 4, 'computer science'),
('RAQUETTE', 7, 'sports'),
('SCALA', 2, 'computer science'),
('SCHEME', 4, 'computer science'),
('SURF', 6, 'sports');

--
-- Déclencheurs `precheck`
--
DELIMITER $$
CREATE TRIGGER `validate` AFTER UPDATE ON `precheck` FOR EACH ROW BEGIN
IF NEW.checkpoint = 5
THEN
INSERT INTO competences VALUES (NEW.competence, NEW.domaine,0);
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `taxonomy_v3`
--

CREATE TABLE `taxonomy_v3` (
  `father` varchar(40) NOT NULL,
  `child` varchar(40) NOT NULL,
  `domaine` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `taxonomy_v3`
--

INSERT INTO `taxonomy_v3` (`father`, `child`, `domaine`) VALUES
('judo', 'ne waza', 'sports'),
('judo', 'sutemi waza', 'sports'),
('judo', 'tachi waza', 'sports'),
('skills', 'computer science', 'skills'),
('skills', 'sports', 'skills'),
('sports', 'judo', 'sports'),
('sutemi waza', 'hiza guruma', 'sports'),
('sutemi waza', 'ko soto gake', 'sports'),
('sutemi waza', 'ko soto gari', 'sports'),
('sutemi waza', 'okuri ashi harai', 'sports');

-- --------------------------------------------------------

--
-- Structure de la table `taxonomy_v3global`
--

CREATE TABLE `taxonomy_v3global` (
  `father` varchar(255) NOT NULL,
  `child` varchar(255) NOT NULL,
  `domaine` varchar(255) DEFAULT NULL,
  `votes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `taxonomy_v3global`
--

INSERT INTO `taxonomy_v3global` (`father`, `child`, `domaine`, `votes`) VALUES
('c', 'c++', 'computer science', 1),
('computer science', 'fonctionnal', 'computer science', 3),
('computer science', 'imperative', 'computer science', 3),
('imperative', 'oop', 'computer science', 3),
('oop', 'c', 'computer science', 3),
('oop', 'c++', 'computer science', 2),
('oop', 'java', 'computer science', 3);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`nom`);

--
-- Index pour la table `contribution`
--
ALTER TABLE `contribution`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `domaines`
--
ALTER TABLE `domaines`
  ADD PRIMARY KEY (`nom`);

--
-- Index pour la table `Persons`
--
ALTER TABLE `Persons`
  ADD PRIMARY KEY (`father`,`child`);

--
-- Index pour la table `precheck`
--
ALTER TABLE `precheck`
  ADD PRIMARY KEY (`competence`),
  ADD UNIQUE KEY `competence` (`competence`);

--
-- Index pour la table `taxonomy_v3`
--
ALTER TABLE `taxonomy_v3`
  ADD PRIMARY KEY (`father`,`child`);

--
-- Index pour la table `taxonomy_v3global`
--
ALTER TABLE `taxonomy_v3global`
  ADD PRIMARY KEY (`father`,`child`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `contribution`
--
ALTER TABLE `contribution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
