-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2015 at 11:46 PM
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
(1, '#2J0G90RR', 'Prepare to Die', 'inviteOnly', 'This is a WAR CLAN! We war 3x a week. Rules are posted at preparetodieclan. blogspot. com. We use the App BAND to communicate outside of Clash.  Download the app and ask for an invite code. Join if you like to 3 star!', 'International', 'https://api-assets.clashofclans.com/badges/70/JvFFQDgc-22OzYP9HQPAY372sWDpWXgTHCxuzOa37k0.png', 'https://api-assets.clashofclans.com/badges/200/JvFFQDgc-22OzYP9HQPAY372sWDpWXgTHCxuzOa37k0.png', 'always', 7, 124, 20, 5, 15873, 800, 34);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `role`, `expLevel`, `trophies`, `clanRank`, `previousClanRank`, `donations`, `donationsReceived`, `leagueBadgeImg_s`, `leagueBadgeImg_xl`) VALUES
(1, 'Alex', 'admin', 103, 2837, 1, 1, 20, 450, 'https://api-assets.clashofclans.com/leagues/36/4wtS1stWZQ-1VJ5HaCuDPfdhTWjeZs_jPar_YPzK6Lg.png', 'https://api-assets.clashofclans.com/leagues/72/4wtS1stWZQ-1VJ5HaCuDPfdhTWjeZs_jPar_YPzK6Lg.png'),
(2, 'XxRSxX', 'member', 94, 2342, 2, 2, 410, 30, 'https://api-assets.clashofclans.com/leagues/36/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png', 'https://api-assets.clashofclans.com/leagues/72/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png'),
(3, 'June', 'admin', 116, 2255, 3, 3, 167, 134, 'https://api-assets.clashofclans.com/leagues/36/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png', 'https://api-assets.clashofclans.com/leagues/72/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png'),
(4, 'Red Beard', 'member', 121, 2149, 4, 4, 354, 276, 'https://api-assets.clashofclans.com/leagues/36/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png', 'https://api-assets.clashofclans.com/leagues/72/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png'),
(5, 'SpideyG', 'member', 98, 2079, 5, 5, 1021, 510, 'https://api-assets.clashofclans.com/leagues/36/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png', 'https://api-assets.clashofclans.com/leagues/72/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png'),
(6, 'Preston', 'admin', 116, 2018, 6, 6, 2387, 1406, 'https://api-assets.clashofclans.com/leagues/36/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png', 'https://api-assets.clashofclans.com/leagues/72/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png'),
(7, 'Shutyourmouth', 'coLeader', 98, 1960, 7, 7, 1302, 719, 'https://api-assets.clashofclans.com/leagues/36/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png', 'https://api-assets.clashofclans.com/leagues/72/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png'),
(8, 'Binglbee', 'admin', 93, 1820, 8, 8, 1048, 950, 'https://api-assets.clashofclans.com/leagues/36/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png', 'https://api-assets.clashofclans.com/leagues/72/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png'),
(9, 'splashtodd', 'coLeader', 117, 1760, 9, 9, 1761, 1943, 'https://api-assets.clashofclans.com/leagues/36/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png', 'https://api-assets.clashofclans.com/leagues/72/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png'),
(10, 'Jannetta 13', 'member', 112, 1696, 10, 10, 637, 720, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(11, 'Stacey', 'coLeader', 99, 1605, 11, 11, 0, 30, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(12, 'Kunz Klan', 'leader', 114, 1566, 12, 12, 631, 1181, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(13, 'Clint', 'coLeader', 122, 1545, 13, 13, 901, 390, 'https://api-assets.clashofclans.com/leagues/36/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png', 'https://api-assets.clashofclans.com/leagues/72/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png'),
(14, 'Ambassador U.S.', 'member', 115, 1513, 14, 14, 189, 180, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(15, 'Bl@ckout', 'coLeader', 106, 1505, 15, 15, 471, 180, 'https://api-assets.clashofclans.com/leagues/36/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png', 'https://api-assets.clashofclans.com/leagues/72/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png'),
(16, 'red beard', 'member', 121, 1460, 16, 0, 3, 0, 'https://api-assets.clashofclans.com/leagues/36/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png', 'https://api-assets.clashofclans.com/leagues/72/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png'),
(17, 'GiantD0nuts', 'admin', 111, 1431, 17, 17, 1078, 895, 'https://api-assets.clashofclans.com/leagues/36/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png', 'https://api-assets.clashofclans.com/leagues/72/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png'),
(18, 'CrAxYWolF', 'admin', 91, 1408, 18, 18, 3723, 1530, 'https://api-assets.clashofclans.com/leagues/36/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png', 'https://api-assets.clashofclans.com/leagues/72/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png'),
(19, 'Tj deadmouse', 'member', 95, 1357, 19, 19, 290, 844, 'https://api-assets.clashofclans.com/leagues/36/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png', 'https://api-assets.clashofclans.com/leagues/72/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png'),
(20, 'Boo', 'coLeader', 127, 1350, 20, 16, 938, 427, 'https://api-assets.clashofclans.com/leagues/36/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png', 'https://api-assets.clashofclans.com/leagues/72/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png'),
(21, 'fCD', 'coLeader', 108, 1310, 21, 20, 5009, 620, 'https://api-assets.clashofclans.com/leagues/36/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png', 'https://api-assets.clashofclans.com/leagues/72/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png'),
(22, 'Shay', 'admin', 87, 1283, 22, 22, 0, 766, 'https://api-assets.clashofclans.com/leagues/36/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png', 'https://api-assets.clashofclans.com/leagues/72/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png'),
(23, 'G.O', 'member', 69, 1270, 23, 24, 96, 951, 'https://api-assets.clashofclans.com/leagues/36/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png', 'https://api-assets.clashofclans.com/leagues/72/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png'),
(24, 'Preston2', 'member', 66, 1265, 24, 23, 0, 1574, 'https://api-assets.clashofclans.com/leagues/36/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png', 'https://api-assets.clashofclans.com/leagues/72/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png'),
(25, 'TastyTodd', 'admin', 93, 1245, 25, 21, 392, 1181, 'https://api-assets.clashofclans.com/leagues/36/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png', 'https://api-assets.clashofclans.com/leagues/72/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png'),
(26, 'Trey', 'member', 81, 1236, 26, 25, 0, 1270, 'https://api-assets.clashofclans.com/leagues/36/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png', 'https://api-assets.clashofclans.com/leagues/72/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png'),
(27, 'BallisLife', 'member', 77, 1158, 27, 27, 0, 75, 'https://api-assets.clashofclans.com/leagues/36/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png', 'https://api-assets.clashofclans.com/leagues/72/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png'),
(28, 'Colby17', 'member', 70, 1103, 28, 26, 176, 2270, 'https://api-assets.clashofclans.com/leagues/36/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png', 'https://api-assets.clashofclans.com/leagues/72/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png'),
(29, 'Kunzey00', 'admin', 84, 1080, 29, 28, 253, 475, 'https://api-assets.clashofclans.com/leagues/36/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png', 'https://api-assets.clashofclans.com/leagues/72/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png'),
(30, 'YourBroShah', 'member', 112, 1063, 30, 29, 230, 516, 'https://api-assets.clashofclans.com/leagues/36/8OhXcwDJkenBH2kPH73eXftFOpHHRF-b32n0yrTqC44.png', 'https://api-assets.clashofclans.com/leagues/72/8OhXcwDJkenBH2kPH73eXftFOpHHRF-b32n0yrTqC44.png'),
(31, 'comander dragon', 'admin', 80, 1060, 31, 30, 218, 551, 'https://api-assets.clashofclans.com/leagues/36/8OhXcwDJkenBH2kPH73eXftFOpHHRF-b32n0yrTqC44.png', 'https://api-assets.clashofclans.com/leagues/72/8OhXcwDJkenBH2kPH73eXftFOpHHRF-b32n0yrTqC44.png'),
(32, 'LordWolF', 'member', 73, 1010, 32, 31, 7, 272, 'https://api-assets.clashofclans.com/leagues/36/8OhXcwDJkenBH2kPH73eXftFOpHHRF-b32n0yrTqC44.png', 'https://api-assets.clashofclans.com/leagues/72/8OhXcwDJkenBH2kPH73eXftFOpHHRF-b32n0yrTqC44.png'),
(33, 'RSLGunner', 'admin', 73, 901, 33, 32, 1, 425, 'https://api-assets.clashofclans.com/leagues/36/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png', 'https://api-assets.clashofclans.com/leagues/72/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png'),
(34, 'cvfdsag', 'member', 4, 20, 34, 33, 0, 0, 'https://api-assets.clashofclans.com/leagues/36/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png', 'https://api-assets.clashofclans.com/leagues/72/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png');

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
