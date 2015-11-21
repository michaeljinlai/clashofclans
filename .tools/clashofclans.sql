-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2015 at 06:55 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clashofclans`
--

-- --------------------------------------------------------

--
-- Table structure for table `ajax_chat_bans`
--

CREATE TABLE IF NOT EXISTS `ajax_chat_bans` (
  `userID` int(11) NOT NULL,
  `userName` varchar(64) COLLATE utf8_bin NOT NULL,
  `dateTime` datetime NOT NULL,
  `ip` varbinary(16) NOT NULL,
  PRIMARY KEY (`userID`),
  KEY `userName` (`userName`),
  KEY `dateTime` (`dateTime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `ajax_chat_invitations`
--

CREATE TABLE IF NOT EXISTS `ajax_chat_invitations` (
  `userID` int(11) NOT NULL,
  `channel` int(11) NOT NULL,
  `dateTime` datetime NOT NULL,
  PRIMARY KEY (`userID`,`channel`),
  KEY `dateTime` (`dateTime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `ajax_chat_messages`
--

CREATE TABLE IF NOT EXISTS `ajax_chat_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `userName` varchar(64) COLLATE utf8_bin NOT NULL,
  `userRole` int(1) NOT NULL,
  `channel` int(11) NOT NULL,
  `dateTime` datetime NOT NULL,
  `ip` varbinary(16) NOT NULL,
  `text` text COLLATE utf8_bin,
  PRIMARY KEY (`id`),
  KEY `message_condition` (`id`,`channel`,`dateTime`),
  KEY `dateTime` (`dateTime`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=56 ;

--
-- Dumping data for table `ajax_chat_messages`
--

INSERT INTO `ajax_chat_messages` (`id`, `userID`, `userName`, `userRole`, `channel`, `dateTime`, `ip`, `text`) VALUES
(1, 2147483647, 'ChatBot', 4, 0, '2015-11-15 02:18:44', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/login (342652)'),
(2, 426961334, '(342652)', 0, 0, '2015-11-15 02:18:53', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'asdads'),
(3, 2147483647, 'ChatBot', 4, 0, '2015-11-15 02:18:57', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/logout (342652)'),
(4, 2147483647, 'ChatBot', 4, 0, '2015-11-15 02:18:59', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/login (407426)'),
(5, 2147483647, 'ChatBot', 4, 0, '2015-11-15 02:19:02', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/logout (407426)'),
(6, 2147483647, 'ChatBot', 4, 0, '2015-11-15 02:19:15', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/login (553284)'),
(7, 2147483647, 'ChatBot', 4, 0, '2015-11-15 02:19:59', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/roll (553284) 1d6 6'),
(8, 2147483647, 'ChatBot', 4, 0, '2015-11-15 02:20:05', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/roll (553284) 1d6 4'),
(9, 2147483647, 'ChatBot', 4, 0, '2015-11-15 02:20:08', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/roll (553284) 1d6 5'),
(10, 2147483647, 'ChatBot', 4, 0, '2015-11-15 02:20:19', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/nick (553284) (keiwo)'),
(11, 450364910, '(keiwo)', 0, 0, '2015-11-15 02:20:23', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'vxc'),
(12, 450364910, '(keiwo)', 0, 0, '2015-11-15 02:21:46', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/action sdfdsf'),
(13, 2147483647, 'ChatBot', 4, 0, '2015-11-15 02:21:49', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/logout (keiwo)'),
(14, 2147483647, 'ChatBot', 4, 0, '2015-11-15 02:21:51', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/login (765831)'),
(15, 2147483647, 'ChatBot', 4, 0, '2015-11-15 02:22:02', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/logout (765831)'),
(16, 2147483647, 'ChatBot', 4, 0, '2015-11-15 02:23:17', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/login keiwo'),
(17, 1, 'keiwo', 3, 0, '2015-11-15 02:23:23', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'fdssdf'),
(18, 2147483647, 'ChatBot', 4, 0, '2015-11-15 02:23:27', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/logout keiwo'),
(19, 2147483647, 'ChatBot', 4, 0, '2015-11-15 02:23:37', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/login (what)'),
(20, 2147483647, 'ChatBot', 4, 0, '2015-11-15 02:23:39', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/logout (what)'),
(21, 2147483647, 'ChatBot', 4, 0, '2015-11-15 02:31:05', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/login keiwo'),
(22, 2147483647, 'ChatBot', 4, 0, '2015-11-15 02:31:07', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/logout keiwo'),
(23, 2147483647, 'ChatBot', 4, 0, '2015-11-15 02:31:28', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/login keiwo'),
(24, 2147483647, 'ChatBot', 4, 0, '2015-11-15 02:31:29', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/logout keiwo'),
(25, 2147483647, 'ChatBot', 4, 0, '2015-11-15 02:31:51', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/login keiwo'),
(26, 1, 'keiwo', 3, 0, '2015-11-15 02:31:54', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'asd'),
(27, 2147483647, 'ChatBot', 4, 0, '2015-11-15 02:32:13', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/logout keiwo'),
(28, 2147483647, 'ChatBot', 4, 0, '2015-11-15 02:47:21', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/login (262945)'),
(29, 418105100, '(262945)', 0, 0, '2015-11-15 02:47:24', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'lol'),
(30, 418105100, '(262945)', 0, 0, '2015-11-15 02:47:27', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'what'),
(31, 418105100, '(262945)', 0, 0, '2015-11-15 02:52:37', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'asd'),
(32, 418105100, '(262945)', 0, 0, '2015-11-15 02:53:41', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'sad'),
(33, 2147483647, 'ChatBot', 4, 0, '2015-11-15 02:55:22', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/logout (262945)'),
(34, 2147483647, 'ChatBot', 4, 0, '2015-11-15 03:01:40', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/login (who)'),
(35, 2147483647, 'ChatBot', 4, 0, '2015-11-15 03:02:04', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/logout (who)'),
(36, 2147483647, 'ChatBot', 4, 0, '2015-11-15 03:03:04', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/login (keiwo)'),
(37, 428589166, '(keiwo)', 0, 0, '2015-11-15 03:03:06', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'adsads'),
(38, 2147483647, 'ChatBot', 4, 0, '2015-11-15 03:03:36', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/logout (keiwo)'),
(39, 2147483647, 'ChatBot', 4, 0, '2015-11-15 03:04:45', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/login (119849)'),
(40, 2147483647, 'ChatBot', 4, 0, '2015-11-15 03:04:49', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/logout (119849)'),
(41, 2147483647, 'ChatBot', 4, 0, '2015-11-15 03:04:52', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/login (as)'),
(42, 2147483647, 'ChatBot', 4, 0, '2015-11-15 03:04:57', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/logout (as)'),
(43, 2147483647, 'ChatBot', 4, 0, '2015-11-15 03:09:25', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/login (keiwo)'),
(44, 2147483647, 'ChatBot', 4, 0, '2015-11-15 03:09:26', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/logout (keiwo)'),
(45, 2147483647, 'ChatBot', 4, 0, '2015-11-15 03:11:42', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/login (keiwo)'),
(46, 485436046, '(keiwo)', 0, 0, '2015-11-15 03:12:14', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '8o'),
(47, 485436046, '(keiwo)', 0, 0, '2015-11-15 03:12:16', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', ':warning:'),
(48, 2147483647, 'ChatBot', 4, 0, '2015-11-15 03:15:33', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/logout (keiwo)'),
(49, 2147483647, 'ChatBot', 4, 0, '2015-11-15 03:17:52', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/login (asd)'),
(50, 2147483647, 'ChatBot', 4, 0, '2015-11-15 03:25:15', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/logout (asd)'),
(51, 2147483647, 'ChatBot', 4, 0, '2015-11-15 03:35:33', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/login (what)'),
(52, 2147483647, 'ChatBot', 4, 0, '2015-11-15 03:35:52', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/logout (what)'),
(53, 2147483647, 'ChatBot', 4, 0, '2015-11-15 03:47:22', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/login (asd)'),
(54, 2147483647, 'ChatBot', 4, 0, '2015-11-15 03:47:27', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/logout (asd)'),
(55, 2147483647, 'ChatBot', 4, 0, '2015-11-17 02:22:23', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/login (317608)');

-- --------------------------------------------------------

--
-- Table structure for table `ajax_chat_online`
--

CREATE TABLE IF NOT EXISTS `ajax_chat_online` (
  `userID` int(11) NOT NULL,
  `userName` varchar(64) COLLATE utf8_bin NOT NULL,
  `userRole` int(1) NOT NULL,
  `channel` int(11) NOT NULL,
  `dateTime` datetime NOT NULL,
  `ip` varbinary(16) NOT NULL,
  PRIMARY KEY (`userID`),
  KEY `userName` (`userName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ajax_chat_online`
--

INSERT INTO `ajax_chat_online` (`userID`, `userName`, `userRole`, `channel`, `dateTime`, `ip`) VALUES
(424178757, '(317608)', 0, 0, '2015-11-17 02:22:25', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0');

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id`, `usuario`) VALUES
(2, 'fuck'),
(3, 'fuck'),
(4, 'my name is khan'),
(5, 'my name is khaan'),
(6, 'my name is khan');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `expLevel` int(50) NOT NULL,
  `trophies` int(50) NOT NULL,
  `clanRank` int(50) NOT NULL,
  `previousClanRank` int(50) NOT NULL,
  `donations` int(50) NOT NULL,
  `donationsReceived` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `salt` char(16) COLLATE utf8_unicode_ci NOT NULL,
  `privilege` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `privilege`, `email`) VALUES
(1, 'keiwo', '2f04f54a742317739381def9da3930145221f2badd23064189e4f12e8ad3ff9e', '39153ef1375a4bc2', 'administrator', 'i_like_something@hotmail.com'),
(2, 'normal', '80e0ce4977c91a6b5e6ba2a105b271b27413fbcf6bd00fc8151510f4379f9a94', '34307d9aebd7f92', 'user', 'Mike@mike.com'),
(3, 'happy', 'e68f17bdfd55a27ba52c1674bb8a967d3d5c207cd25de8b7ad4d5dc732220c29', '71f959425da78668', 'user', 'happy@happy.com'),
(4, 'tom', 'ba82fe15b4f8082cdb20d267286d25fdeb38cce50cd6ec17809094798b773924', '347ac2848f9600', 'user', 'adsjkhaskhj@asd.com'),
(5, 'kjahssa', '548374f6cb900c4efec0af823393096baae1ba9e9a84c51952aa271e316d3db5', '62c5cd6863545690', 'user', 'asdjkhd@asjkhd.com'),
(6, 'John', '3d0ec21e2d45c6e62c25c94f885bc63a169064edbaa710e366b6ef7998cff3dd', '33e8ee596155c920', 'user', 'john@john.com'),
(7, 'try', 'b0aa8efd47a8bf751e335210add2c6b03f0f20a4617f4c247db7fd4523e5e6ef', '93d429e6f1e1633', 'user', 'try@try.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
