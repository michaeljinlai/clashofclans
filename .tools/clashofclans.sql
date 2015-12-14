-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2015 at 03:23 PM
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
-- Table structure for table `clan_details`
--

CREATE TABLE IF NOT EXISTS `clan_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `locationName` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `clanBadgeImg_s` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `clanBadgeImg_xl` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `warFrequency` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `clanLevel` int(10) NOT NULL,
  `warWins` int(10) NOT NULL,
  `warLosses` int(10) DEFAULT NULL,
  `warTies` int(10) DEFAULT NULL,
  `clanPoints` int(25) NOT NULL,
  `requiredTrophies` int(25) NOT NULL,
  `members` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `clan_details`
--

INSERT INTO `clan_details` (`id`, `tag`, `name`, `type`, `description`, `locationName`, `clanBadgeImg_s`, `clanBadgeImg_xl`, `warFrequency`, `clanLevel`, `warWins`, `warLosses`, `warTies`, `clanPoints`, `requiredTrophies`, `members`) VALUES
(1, '#2J0G90RR', 'Prepare to Die', 'inviteOnly', 'This is a WAR CLAN! We war 3x a week. Rules are posted at preparetodieclan. blogspot. com. We use the App BAND to communicate outside of Clash.  Download the app and ask for an invite code. Join if you like to 3 star!', 'International', 'https://api-assets.clashofclans.com/badges/70/JvFFQDgc-22OzYP9HQPAY372sWDpWXgTHCxuzOa37k0.png', 'https://api-assets.clashofclans.com/badges/200/JvFFQDgc-22OzYP9HQPAY372sWDpWXgTHCxuzOa37k0.png', 'always', 7, 127, 20, 5, 12071, 800, 22);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `expLevel` int(50) NOT NULL,
  `trophies` int(50) NOT NULL,
  `clanRank` int(50) NOT NULL,
  `previousClanRank` int(50) NOT NULL,
  `donations` int(50) NOT NULL,
  `donationsReceived` int(50) NOT NULL,
  `leagueBadgeImg_s` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `leagueBadgeImg_xl` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `role`, `expLevel`, `trophies`, `clanRank`, `previousClanRank`, `donations`, `donationsReceived`, `leagueBadgeImg_s`, `leagueBadgeImg_xl`) VALUES
(1, 'June', 'admin', 116, 2087, 1, 1, 49, 61, 'https://api-assets.clashofclans.com/leagues/36/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png', 'https://api-assets.clashofclans.com/leagues/72/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png'),
(2, 'Shutyourmouth', 'coLeader', 98, 2018, 2, 3, 190, 207, 'https://api-assets.clashofclans.com/leagues/36/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png', 'https://api-assets.clashofclans.com/leagues/72/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png'),
(3, 'splashtodd', 'coLeader', 118, 2011, 3, 2, 282, 237, 'https://api-assets.clashofclans.com/leagues/36/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png', 'https://api-assets.clashofclans.com/leagues/72/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png'),
(4, 'Ambassador U.S.', 'member', 115, 1784, 4, 6, 151, 236, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(5, 'Defaceu', 'member', 106, 1770, 5, 4, 0, 0, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(6, 'Jannetta 13', 'member', 112, 1732, 6, 5, 210, 224, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(7, 'CrAxYWolF', 'admin', 93, 1640, 7, 7, 446, 151, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(8, 'Bl@ckout', 'coLeader', 106, 1609, 8, 8, 65, 0, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(9, 'GiantD0nuts', 'coLeader', 112, 1597, 9, 11, 220, 183, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(10, 'Colby17', 'admin', 72, 1558, 10, 9, 250, 178, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(11, 'BallisLife', 'member', 77, 1526, 11, 10, 0, 26, 'https://api-assets.clashofclans.com/leagues/36/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png', 'https://api-assets.clashofclans.com/leagues/72/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png'),
(12, 'Clint', 'coLeader', 122, 1441, 12, 12, 0, 0, 'https://api-assets.clashofclans.com/leagues/36/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png', 'https://api-assets.clashofclans.com/leagues/72/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png'),
(13, 'G.O', 'coLeader', 70, 1346, 13, 13, 0, 79, 'https://api-assets.clashofclans.com/leagues/36/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png', 'https://api-assets.clashofclans.com/leagues/72/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png'),
(14, '???????', 'leader', 111, 1300, 14, 14, 0, 0, 'https://api-assets.clashofclans.com/leagues/36/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png', 'https://api-assets.clashofclans.com/leagues/72/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png'),
(15, 'Shay', 'admin', 87, 1249, 15, 16, 105, 52, 'https://api-assets.clashofclans.com/leagues/36/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png', 'https://api-assets.clashofclans.com/leagues/72/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png'),
(16, 'Preston2', 'member', 68, 1234, 16, 17, 0, 101, 'https://api-assets.clashofclans.com/leagues/36/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png', 'https://api-assets.clashofclans.com/leagues/72/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png'),
(17, 'Trey', 'member', 82, 1193, 17, 15, 1, 113, 'https://api-assets.clashofclans.com/leagues/36/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png', 'https://api-assets.clashofclans.com/leagues/72/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png'),
(18, 'RSLGunner', 'admin', 74, 990, 18, 18, 25, 25, 'https://api-assets.clashofclans.com/leagues/36/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png', 'https://api-assets.clashofclans.com/leagues/72/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png'),
(19, 'Common Divisor', 'admin', 60, 990, 19, 19, 0, 0, 'https://api-assets.clashofclans.com/leagues/36/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png', 'https://api-assets.clashofclans.com/leagues/72/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png'),
(20, 'comander dragon', 'admin', 80, 965, 20, 21, 53, 131, 'https://api-assets.clashofclans.com/leagues/36/8OhXcwDJkenBH2kPH73eXftFOpHHRF-b32n0yrTqC44.png', 'https://api-assets.clashofclans.com/leagues/72/8OhXcwDJkenBH2kPH73eXftFOpHHRF-b32n0yrTqC44.png'),
(21, 'Dave2?7?', 'member', 82, 943, 21, 20, 0, 51, 'https://api-assets.clashofclans.com/leagues/36/8OhXcwDJkenBH2kPH73eXftFOpHHRF-b32n0yrTqC44.png', 'https://api-assets.clashofclans.com/leagues/72/8OhXcwDJkenBH2kPH73eXftFOpHHRF-b32n0yrTqC44.png'),
(22, 'cvfdsag', 'member', 4, 18, 22, 22, 0, 0, 'https://api-assets.clashofclans.com/leagues/36/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png', 'https://api-assets.clashofclans.com/leagues/72/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png');

-- --------------------------------------------------------

--
-- Table structure for table `members_attacks`
--

CREATE TABLE IF NOT EXISTS `members_attacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `members_statistics_id` int(10) NOT NULL,
  `war_id` int(10) DEFAULT NULL,
  `attackNumber` int(1) DEFAULT NULL,
  `damage` int(4) DEFAULT NULL,
  `target` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enemyClan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `starsWon` int(1) DEFAULT NULL,
  `starsEarned` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `members_statistics_id` (`members_statistics_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=239 ;

--
-- Dumping data for table `members_attacks`
--

INSERT INTO `members_attacks` (`id`, `members_statistics_id`, `war_id`, `attackNumber`, `damage`, `target`, `enemyClan`, `starsWon`, `starsEarned`) VALUES
(1, 1, 144, 1, 48, 'shuthefrontdoor', 'WeWinSometimes', 1, 1),
(2, 1, 144, 2, 66, 'KIng Wang', 'WeWinSometimes', 2, 2),
(3, 2, 144, 1, 54, '4think20twice', 'WeWinSometimes', 1, 1),
(4, 2, 144, 2, 56, 'laker4life', 'WeWinSometimes', 1, 1),
(5, 3, 144, 1, 100, 'Tonyjdm69', 'WeWinSometimes', 3, 2),
(6, 3, 144, 2, 56, 'will j', 'WeWinSometimes', 2, 1),
(7, 4, 144, 1, 100, 'Vetkama', 'WeWinSometimes', 3, 3),
(8, 4, 144, 2, 93, 'RubberToe', 'WeWinSometimes', 2, 2),
(9, 5, 144, 1, 100, 'DirtyMike', 'WeWinSometimes', 3, 3),
(10, 5, 144, 2, 100, 'BuckFutters', 'WeWinSometimes', 3, 2),
(11, 6, 144, 1, 58, 'BuckFutters', 'WeWinSometimes', 1, 1),
(12, 6, 144, 2, 100, 'Danhy', 'WeWinSometimes', 3, 2),
(13, 7, 144, 1, 58, 'Tonyjdm69', 'WeWinSometimes', 1, 1),
(14, 7, 144, 2, 66, 'Danhy', 'WeWinSometimes', 1, 0),
(15, 8, 144, 1, 43, 'Danhy', 'WeWinSometimes', 0, 0),
(16, 8, 144, 2, 100, 'rudeboii', 'WeWinSometimes', 3, 1),
(17, 9, 144, 1, 47, 'will j', 'WeWinSometimes', 0, 0),
(18, 9, 144, 2, 100, 'thimychristine', 'WeWinSometimes', 3, 1),
(19, 10, 144, 1, 89, 'Tonyjdm69', 'WeWinSometimes', 1, 0),
(20, 11, 144, 1, 60, 'will j', 'WeWinSometimes', 1, 1),
(21, 11, 144, 2, 100, 'loser', 'WeWinSometimes', 3, 1),
(22, 12, 144, 1, 98, 'thimychristine', 'WeWinSometimes', 2, 2),
(23, 12, 144, 2, 97, 'Danhy', 'WeWinSometimes', 1, 1),
(24, 13, 144, 1, 88, 'loser', 'WeWinSometimes', 2, 2),
(25, 13, 144, 2, 62, 'mcdungle', 'WeWinSometimes', 2, 2),
(26, 14, 144, 1, 100, 'MR.Beam', 'WeWinSometimes', 3, 3),
(27, 14, 144, 2, 100, 'TuLaPmP', 'WeWinSometimes', 3, 2),
(28, 15, 144, 1, 70, 'TuLaPmP', 'WeWinSometimes', 1, 1),
(29, 15, 144, 2, 67, 'rudeboii', 'WeWinSometimes', 2, 0),
(30, 16, 144, 1, 100, 'mcdungle', 'WeWinSometimes', 3, 1),
(31, 16, 144, 2, 99, 'rudeboii', 'WeWinSometimes', 2, 0),
(32, 17, 144, 1, 79, 'rudeboii', 'WeWinSometimes', 1, 0),
(33, 18, 144, 1, 100, 'teevee3', 'WeWinSometimes', 3, 2),
(34, 18, 144, 2, 77, 'rudeboii', 'WeWinSometimes', 2, 2),
(35, 19, 144, 1, 60, 'teevee3', 'WeWinSometimes', 1, 1),
(36, 19, 144, 2, 100, 'kakarlak', 'WeWinSometimes', 3, 3),
(37, 20, 144, 1, 100, 'Ebrahim Uchiha', 'WeWinSometimes', 3, 3),
(38, 2, 145, 1, 50, '~Roem_Royen~', 'INDO BLUE SKY', 1, 1),
(39, 2, 145, 2, 100, '✴PASHA✴', 'INDO BLUE SKY', 3, 2),
(40, 3, 145, 1, 100, 'BEN''S', 'INDO BLUE SKY', 3, 3),
(41, 3, 145, 2, 70, '✈Mr.RICKY✈', 'INDO BLUE SKY', 2, 2),
(42, 22, 145, 1, 54, '✴PASHA✴', 'INDO BLUE SKY', 1, 1),
(43, 22, 145, 2, 94, '~ Shagrath ~', 'INDO BLUE SKY', 2, 0),
(44, 5, 145, 1, 100, '~"RoYeN_Tea"~', 'INDO BLUE SKY', 3, 3),
(45, 5, 145, 2, 64, '~ Shagrath ~', 'INDO BLUE SKY', 2, 2),
(46, 6, 145, 1, 75, 'Waffen-SS', 'INDO BLUE SKY', 1, 0),
(47, 6, 145, 2, 99, '~ Shagrath ~', 'INDO BLUE SKY', 2, 0),
(48, 9, 145, 1, 100, 'never think', 'INDO BLUE SKY', 3, 3),
(49, 9, 145, 2, 56, 'Waffen-SS', 'INDO BLUE SKY', 1, 1),
(50, 11, 145, 1, 100, 'Waffen-SS', 'INDO BLUE SKY', 3, 2),
(51, 11, 145, 2, 56, '~ Shagrath ~', 'INDO BLUE SKY', 1, 0),
(52, 23, 145, 1, 60, 'Ms.Cycy', 'INDO BLUE SKY', 1, 1),
(53, 13, 145, 1, 100, 'S 3934 FL', 'INDO BLUE SKY', 3, 3),
(54, 13, 145, 2, 100, 'Ms.Cycy', 'INDO BLUE SKY', 3, 2),
(55, 14, 145, 1, 68, 'S 3934 FL', 'INDO BLUE SKY', 1, 0),
(56, 14, 145, 2, 63, 'Ms.Cycy', 'INDO BLUE SKY', 1, 0),
(57, 15, 145, 1, 100, '~AILERON~SKY', 'INDO BLUE SKY', 3, 0),
(58, 15, 145, 2, 37, '~ Shagrath ~', 'INDO BLUE SKY', 0, 0),
(59, 16, 145, 1, 100, '~AILERON~SKY', 'INDO BLUE SKY', 3, 3),
(60, 16, 145, 2, 56, 'Waffen-SS', 'INDO BLUE SKY', 1, 0),
(61, 19, 145, 1, 100, 'RFW', 'INDO BLUE SKY', 3, 3),
(62, 19, 145, 2, 100, 'febrian', 'INDO BLUE SKY', 3, 3),
(63, 18, 145, 1, 100, 'FRANKENSTEIN', 'INDO BLUE SKY', 3, 3),
(64, 18, 145, 2, 60, 'Waffen-SS', 'INDO BLUE SKY', 1, 0),
(65, 20, 145, 1, 100, 'muhammad reza', 'INDO BLUE SKY', 3, 3),
(66, 20, 145, 2, 76, 'RFW', 'INDO BLUE SKY', 1, 0),
(67, 24, 146, 1, 50, 'Ramiro', 'Espartanos USA', 1, 1),
(68, 24, 146, 2, 86, 'augusto fernand', 'Espartanos USA', 2, 1),
(69, 2, 146, 1, 77, 'keyner', 'Espartanos USA', 2, 2),
(70, 2, 146, 2, 68, 'cori', 'Espartanos USA', 2, 2),
(71, 3, 146, 1, 78, 'joshe', 'Espartanos USA', 1, 1),
(72, 3, 146, 2, 39, 'Ramiro', 'Espartanos USA', 0, 0),
(73, 22, 146, 1, 100, 'cori', 'Espartanos USA', 3, 1),
(74, 22, 146, 2, 54, 'augusto fernand', 'Espartanos USA', 1, 1),
(75, 4, 146, 1, 60, 'THE FLASH⚡', 'Espartanos USA', 2, 2),
(76, 4, 146, 2, 100, 'Jorge EAC', 'Espartanos USA', 3, 3),
(77, 9, 146, 1, 54, 'augusto fernand', 'Espartanos USA', 1, 0),
(78, 9, 146, 2, 68, 'joshe', 'Espartanos USA', 2, 1),
(79, 11, 146, 1, 48, 'augusto fernand', 'Espartanos USA', 0, 0),
(80, 11, 146, 2, 60, 'joshe', 'Espartanos USA', 1, 0),
(81, 12, 146, 1, 100, 'jorgemedina', 'Espartanos USA', 3, 3),
(82, 12, 146, 2, 51, 'THE FLASH⚡', 'Espartanos USA', 1, 0),
(83, 13, 146, 1, 69, 'cori', 'Espartanos USA', 2, 2),
(84, 13, 146, 2, 100, 'Morales10', 'Espartanos USA', 3, 3),
(85, 14, 146, 1, 72, 'Morales10', 'Espartanos USA', 1, 0),
(86, 14, 146, 2, 61, 'cori', 'Espartanos USA', 2, 0),
(87, 15, 146, 1, 100, 'Solo Dime Dan', 'Espartanos USA', 3, 3),
(88, 15, 146, 2, 100, 'SMALLVILLE', 'Espartanos USA', 3, 0),
(89, 16, 146, 1, 100, 'Angélica', 'Espartanos USA', 3, 1),
(90, 16, 146, 2, 100, 'SMALLVILLE', 'Espartanos USA', 3, 2),
(91, 19, 146, 1, 94, 'Angélica', 'Espartanos USA', 2, 2),
(92, 19, 146, 2, 73, 'SMALLVILLE', 'Espartanos USA', 1, 1),
(93, 18, 146, 1, 100, 'MILO', 'Espartanos USA', 3, 1),
(94, 18, 146, 2, 100, 'destroyer23', 'Espartanos USA', 3, 2),
(95, 20, 146, 1, 89, 'MILO', 'Espartanos USA', 2, 2),
(96, 20, 146, 2, 69, 'destroyer23', 'Espartanos USA', 1, 1),
(97, 2, 147, 1, 51, 'Daniel', 'Godz of Warr', 2, 2),
(98, 2, 147, 2, 100, 'Chief Mac', 'Godz of Warr', 3, 3),
(99, 22, 147, 1, 64, 'Joel The Great', 'Godz of Warr', 1, 1),
(100, 22, 147, 2, 100, 'McBride', 'Godz of Warr', 3, 3),
(101, 4, 147, 1, 100, 'Joel The Great', 'Godz of Warr', 3, 2),
(102, 4, 147, 2, 100, 'derpcicle', 'Godz of Warr', 3, 2),
(103, 5, 147, 1, 100, 'Madgud''', 'Godz of Warr', 3, 3),
(104, 5, 147, 2, 91, 'Adam', 'Godz of Warr', 2, 2),
(105, 25, 147, 1, 100, 'srblunt', 'Godz of Warr', 3, 3),
(106, 25, 147, 2, 100, 'Sandy', 'Godz of Warr', 3, 2),
(107, 26, 147, 1, 52, 'derpcicle', 'Godz of Warr', 1, 1),
(108, 26, 147, 2, 100, 'AngelTip', 'Godz of Warr', 3, 2),
(109, 8, 147, 1, 100, 'Aaron', 'Godz of Warr', 3, 1),
(110, 9, 147, 1, 87, 'Sandy', 'Godz of Warr', 1, 1),
(111, 9, 147, 2, 99, 'Aaron', 'Godz of Warr', 2, 1),
(112, 10, 147, 1, 80, 'AngelTip', 'Godz of Warr', 1, 0),
(113, 10, 147, 2, 100, 'Slick Vick', 'Godz of Warr', 3, 1),
(114, 11, 147, 1, 100, 'Nasty', 'Godz of Warr', 3, 1),
(115, 12, 147, 1, 50, 'Aaron', 'Godz of Warr', 1, 1),
(116, 12, 147, 2, 66, 'AngelTip', 'Godz of Warr', 1, 1),
(117, 13, 147, 1, 90, 'Nasty', 'Godz of Warr', 2, 2),
(118, 13, 147, 2, 100, 'Bama', 'Godz of Warr', 3, 3),
(119, 14, 147, 1, 64, 'Slick Vick', 'Godz of Warr', 2, 2),
(120, 14, 147, 2, 35, 'AngelTip', 'Godz of Warr', 0, 0),
(121, 15, 147, 1, 100, 'slay jr', 'Godz of Warr', 3, 3),
(122, 15, 147, 2, 100, 'RGVunknown956+', 'Godz of Warr', 3, 1),
(123, 16, 147, 1, 91, 'RGVunknown956+', 'Godz of Warr', 1, 0),
(124, 16, 147, 2, 47, 'AngelTip', 'Godz of Warr', 0, 0),
(125, 27, 147, 1, 84, 'RGVunknown956+', 'Godz of Warr', 2, 2),
(126, 27, 147, 2, 100, 'Guz Guz', 'Godz of Warr', 3, 0),
(127, 18, 147, 1, 100, 'KillerD4', 'Godz of Warr', 3, 2),
(128, 18, 147, 2, 97, 'RGVunknown956+', 'Godz of Warr', 1, 0),
(129, 28, 147, 1, 100, 'Guz Guz', 'Godz of Warr', 3, 3),
(130, 28, 147, 2, 100, 'Dchamp', 'Godz of Warr', 3, 3),
(131, 29, 147, 1, 54, 'KillerD4', 'Godz of Warr', 1, 1),
(132, 29, 147, 2, 100, 'Invisible', 'Godz of Warr', 3, 3),
(133, 20, 147, 1, 70, 'KillerD4', 'Godz of Warr', 2, 0),
(134, 1, 148, 1, 54, 'jonz', 'clan say', 1, 1),
(135, 1, 148, 2, 58, 'Quitong', 'clan say', 2, 2),
(136, 2, 148, 1, 56, 'don kamuti', 'clan say', 1, 1),
(137, 2, 148, 2, 60, 'jonz', 'clan say', 2, 1),
(138, 30, 148, 1, 37, 'Quitong', 'clan say', 0, 0),
(139, 30, 148, 2, 29, 'jonz', 'clan say', 0, 0),
(140, 22, 148, 1, 100, 'Alibasbas', 'clan say', 3, 3),
(141, 22, 148, 2, 100, 'chloe', 'clan say', 3, 1),
(142, 4, 148, 1, 100, 'zeratul', 'clan say', 3, 3),
(143, 4, 148, 2, 100, 'cailee', 'clan say', 3, 3),
(144, 5, 148, 1, 98, 'chloe', 'clan say', 2, 2),
(145, 5, 148, 2, 100, 'jc', 'clan say', 3, 2),
(146, 31, 148, 1, 82, 'jc', 'clan say', 1, 1),
(147, 31, 148, 2, 45, 'Quitong', 'clan say', 0, 0),
(148, 7, 148, 1, 100, 'Teacher Iris', 'clan say', 3, 3),
(149, 7, 148, 2, 100, 'enrix', 'clan say', 3, 1),
(150, 10, 148, 1, 100, 'lyntot', 'clan say', 3, 1),
(151, 10, 148, 2, 31, 'don kamuti', 'clan say', 0, 0),
(152, 11, 148, 1, 52, 'zeratul', 'clan say', 2, 0),
(153, 12, 148, 1, 100, 'chleo', 'clan say', 3, 3),
(154, 12, 148, 2, 53, 'chloe', 'clan say', 1, 0),
(155, 13, 148, 1, 99, 'enrix', 'clan say', 2, 2),
(156, 13, 148, 2, 21, 'don kamuti', 'clan say', 0, 0),
(157, 15, 148, 1, 100, 'Fujiko', 'clan say', 3, 3),
(158, 15, 148, 2, 100, 'lE.ClUlLlLlElN', 'clan say', 3, 3),
(159, 16, 148, 1, 100, 'champion', 'clan say', 3, 3),
(160, 16, 148, 2, 100, 'levie', 'clan say', 3, 2),
(161, 32, 148, 1, 53, 'lyntot', 'clan say', 1, 0),
(162, 27, 148, 1, 80, 'lyntot', 'clan say', 1, 1),
(163, 27, 148, 2, 99, 'Fujiko', 'clan say', 2, 0),
(164, 18, 148, 1, 76, 'lyntot', 'clan say', 1, 0),
(165, 18, 148, 2, 100, 'BATBATANTANAMU', 'clan say', 3, 3),
(166, 28, 148, 1, 100, 'd'' zetti', 'clan say', 3, 3),
(167, 28, 148, 2, 93, 'lyntot', 'clan say', 2, 1),
(168, 29, 148, 1, 100, 'sandra', 'clan say', 3, 3),
(169, 29, 148, 2, 52, 'levie', 'clan say', 1, 1),
(170, 20, 148, 1, 100, 'nataraki', 'clan say', 3, 3),
(171, 20, 148, 2, 100, 'sandra', 'clan say', 3, 0),
(172, 24, 149, 1, 89, '威威村', '神州帝国', 2, 0),
(173, 24, 149, 2, 100, '小孩村', '神州帝国', 3, 2),
(174, 1, 149, 1, 52, 'wang', '神州帝国', 1, 1),
(175, 1, 149, 2, 100, '狼窝', '神州帝国', 3, 3),
(176, 2, 149, 1, 50, '雇佣军', '神州帝国', 1, 1),
(177, 2, 149, 2, 49, '专杀不服', '神州帝国', 1, 1),
(178, 22, 149, 1, 49, '狼窝', '神州帝国', 0, 0),
(179, 22, 149, 2, 97, '威威村', '神州帝国', 1, 0),
(180, 4, 149, 1, 62, '夢幻之國', '神州帝国', 1, 1),
(181, 4, 149, 2, 100, '威威村', '神州帝国', 3, 1),
(182, 5, 149, 1, 100, '黑河', '神州帝国', 3, 3),
(183, 5, 149, 2, 95, '夢幻之國', '神州帝国', 2, 1),
(184, 31, 149, 1, 92, '文大人', '神州帝国', 1, 1),
(185, 31, 149, 2, 0, '威威村', '神州帝国', 0, 0),
(186, 7, 149, 1, 33, '威威村', '神州帝国', 0, 0),
(187, 7, 149, 2, 69, '鷹之國', '神州帝国', 2, 2),
(188, 9, 149, 1, 100, 'm x k', '神州帝国', 3, 3),
(189, 9, 149, 2, 100, '文大人', '神州帝国', 3, 2),
(190, 10, 149, 1, 91, '小孩村', '神州帝国', 1, 0),
(191, 10, 149, 2, 100, '小狼窝', '神州帝国', 3, 2),
(192, 11, 149, 1, 100, 'xiaopang99', '神州帝国', 3, 3),
(193, 11, 149, 2, 98, '威威村', '神州帝国', 2, 2),
(194, 12, 149, 1, 100, 'hong 9818', '神州帝国', 3, 2),
(195, 12, 149, 2, 70, '威威村', '神州帝国', 2, 0),
(196, 13, 149, 1, 70, 'hong 9818', '神州帝国', 1, 1),
(197, 13, 149, 2, 100, 'SKY', '神州帝国', 3, 3),
(198, 15, 149, 1, 76, '小孩村', '神州帝国', 1, 1),
(199, 15, 149, 2, 97, 'SKY', '神州帝国', 2, 0),
(200, 16, 149, 1, 69, '小孩村', '神州帝国', 1, 0),
(201, 16, 149, 2, 100, 'land of dave', '神州帝国', 3, 1),
(202, 32, 149, 1, 76, 'land of dave', '神州帝国', 2, 2),
(203, 32, 149, 2, 85, '小狼窝', '神州帝国', 1, 1),
(204, 27, 149, 1, 76, 'xiaopang728', '神州帝国', 1, 1),
(205, 27, 149, 2, 96, '小孩村', '神州帝国', 1, 0),
(206, 18, 149, 1, 35, '夢幻之國', '神州帝国', 0, 0),
(207, 18, 149, 2, 29, '鷹之國', '神州帝国', 0, 0),
(208, 28, 149, 1, 100, '神魔', '神州帝国', 3, 3),
(209, 28, 149, 2, 100, 'xiaopang728', '神州帝国', 3, 2),
(210, 20, 149, 1, 100, 'love4ever.miko', '神州帝国', 3, 3),
(211, 20, 149, 2, 100, '王者之国', '神州帝国', 3, 3),
(212, 3, 150, 1, 54, '페이커', '롯데', 1, 1),
(213, 3, 150, 2, 86, '길전투', '롯데', 2, 2),
(214, 22, 150, 1, 64, '태율아비', '롯데', 2, 2),
(215, 22, 150, 2, 68, '남추', '롯데', 2, 1),
(216, 4, 150, 1, 79, '남추', '롯데', 1, 1),
(217, 4, 150, 2, 55, '페이커', '롯데', 1, 0),
(218, 5, 150, 1, 78, '서주니아빠', '롯데', 2, 2),
(219, 5, 150, 2, 100, '드러와', '롯데', 3, 3),
(220, 7, 150, 1, 100, '고폭', '롯데', 3, 3),
(221, 7, 150, 2, 98, '태율아비', '롯데', 1, 0),
(222, 25, 150, 1, 100, '왕만두', '롯데', 3, 3),
(223, 25, 150, 2, 100, '남추', '롯데', 3, 1),
(224, 10, 150, 1, 95, '헤라', '롯데', 2, 1),
(225, 11, 150, 1, 100, '고추심밭', '롯데', 3, 3),
(226, 11, 150, 2, 81, '태율아비', '롯데', 1, 0),
(227, 12, 150, 1, 60, '헤라', '롯데', 1, 0),
(228, 12, 150, 2, 100, 'Fery', '롯데', 3, 2),
(229, 13, 150, 1, 100, '후니', '롯데', 3, 3),
(230, 13, 150, 2, 71, '헤라', '롯데', 1, 1),
(231, 16, 150, 1, 100, '막달려걍', '롯데', 3, 2),
(232, 16, 150, 2, 52, 'Fery', '롯데', 1, 0),
(233, 27, 150, 1, 71, 'Fery', '롯데', 1, 1),
(234, 27, 150, 2, 100, '막달려걍', '롯데', 3, 0),
(235, 18, 150, 1, 100, '승리의롯데01', '롯데', 3, 1),
(236, 18, 150, 2, 100, '던전 앤 위너', '롯데', 3, 3),
(237, 29, 150, 1, 69, '막달려걍', '롯데', 1, 1),
(238, 29, 150, 2, 94, '승리의롯데01', '롯데', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `members_statistics`
--

CREATE TABLE IF NOT EXISTS `members_statistics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `totalAttacks` int(20) DEFAULT NULL,
  `starsEarned` int(10) DEFAULT NULL,
  `starsWon` int(10) DEFAULT NULL,
  `damage` int(4) DEFAULT NULL,
  `avgStarsEarned` float DEFAULT NULL,
  `offenseValCalc` float DEFAULT NULL,
  `defenseValCalc` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `members_statistics`
--

INSERT INTO `members_statistics` (`id`, `name`, `totalAttacks`, `starsEarned`, `starsWon`, `damage`, `avgStarsEarned`, `offenseValCalc`, `defenseValCalc`) VALUES
(1, 'Boo', 6, 10, 10, 378, 1.66667, NULL, NULL),
(2, 'ryan', 12, 18, 20, 771, 1.5, NULL, NULL),
(3, 'red beard', 2, 3, 5, 156, 1.5, NULL, NULL),
(4, 'Kunz Klan', 12, 23, 28, 1049, 1.91667, NULL, NULL),
(5, 'GiantD0nuts', 12, 28, 31, 1126, 2.33333, NULL, NULL),
(6, 'Clint', 4, 3, 7, 332, 0.75, NULL, NULL),
(7, 'Alex', 8, 10, 14, 624, 1.25, NULL, NULL),
(8, 'Shutyourmouth', 3, 2, 6, 243, 0.666667, NULL, NULL),
(9, 'Stacey', 10, 13, 19, 811, 1.3, NULL, NULL),
(10, 'Tj deadmouse', 8, 5, 14, 686, 0.625, NULL, NULL),
(11, 'TastyTodd', 12, 13, 23, 955, 1.08333, NULL, NULL),
(12, 'SpideyG', 12, 15, 22, 945, 1.25, NULL, NULL),
(13, 'Binglbee', 14, 29, 30, 1170, 2.07143, NULL, NULL),
(14, 'Shay', 8, 7, 13, 563, 0.875, NULL, NULL),
(15, 'CrAxYWolF', 12, 15, 27, 1047, 1.25, NULL, NULL),
(16, 'Kunzey00', 14, 15, 30, 1214, 1.07143, NULL, NULL),
(17, 'comander dragon', 1, 0, 1, 79, 0, NULL, NULL),
(18, 'RSLGunner', 14, 19, 29, 1174, 1.35714, NULL, NULL),
(19, 'DEAD EYê', 6, 13, 13, 527, 2.16667, NULL, NULL),
(20, 'Preston2', 10, 18, 24, 904, 1.8, NULL, NULL),
(21, 'Red Beard', 6, 9, 9, 427, 1.5, NULL, NULL),
(22, 'splashtodd', 12, 14, 22, 944, 1.16667, NULL, NULL),
(23, 'XxRSxX', 1, 1, 1, 60, 1, NULL, NULL),
(24, 'juv', 4, 4, 8, 325, 1, NULL, NULL),
(25, 'fCD', 4, 9, 12, 400, 2.25, NULL, NULL),
(26, 'ICEMAN', 2, 3, 4, 152, 1.5, NULL, NULL),
(27, 'LordWolF', 8, 5, 14, 706, 0.625, NULL, NULL),
(28, 'G.O', 6, 15, 17, 593, 2.5, NULL, NULL),
(29, 'Colby17', 6, 11, 11, 469, 1.83333, NULL, NULL),
(30, 'doobie', 2, 0, 0, 66, 0, NULL, NULL),
(31, 'YourBroShah', 4, 2, 2, 219, 0.5, NULL, NULL),
(32, 'Trey', 3, 3, 4, 214, 1, NULL, NULL);

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `members_attacks`
--
ALTER TABLE `members_attacks`
  ADD CONSTRAINT `members_fk1` FOREIGN KEY (`members_statistics_id`) REFERENCES `members_statistics` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
