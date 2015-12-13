-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2015 at 03:53 PM
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
  `tag` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL,
  `description` varchar(500) NOT NULL,
  `locationName` varchar(25) NOT NULL,
  `clanBadgeImg_s` varchar(400) NOT NULL,
  `clanBadgeImg_xl` varchar(400) NOT NULL,
  `warFrequency` varchar(25) NOT NULL,
  `clanLevel` int(10) NOT NULL,
  `warWins` int(10) NOT NULL,
  `warLosses` int(10) DEFAULT NULL,
  `warTies` int(10) DEFAULT NULL,
  `clanPoints` int(25) NOT NULL,
  `requiredTrophies` int(25) NOT NULL,
  `members` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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
  `name` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `expLevel` int(50) NOT NULL,
  `trophies` int(50) NOT NULL,
  `clanRank` int(50) NOT NULL,
  `previousClanRank` int(50) NOT NULL,
  `donations` int(50) NOT NULL,
  `donationsReceived` int(50) NOT NULL,
  `leagueBadgeImg_s` varchar(200) NOT NULL,
  `leagueBadgeImg_xl` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

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
-- Table structure for table `members_statistics`
--

CREATE TABLE IF NOT EXISTS `members_statistics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `totalAttacks` int(20) DEFAULT NULL,
  `starsEarned` int(10) DEFAULT NULL,
  `starsWon` int(10) DEFAULT NULL,
  `damage` int(4) DEFAULT NULL,
  `avgStarsEarned` float DEFAULT NULL,
  `offenseValCalc` float DEFAULT NULL,
  `defenseValCalc` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
