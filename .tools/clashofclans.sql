-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2016 at 02:44 PM
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
(1, '#90GLL8R0', 'Dragon Hoard', 'inviteOnly', 'BRING ALL YOU''VE GOT AND IT BEST BE MUCH. WE ARE A CLAN THAT''S TOUGH TO TOUCH. WHEN YOUR MEMBERS DEPLETE, CAUSE THEY JUST CAN''T COMPETE, REMEMBER PTDH WHEN THEY RUN, HIDE, AND RETREAT. WR ~ 127-22-3  Good war Sultans!!!! feel free to stop over', 'United States', 'https://api-assets.clashofclans.com/badges/70/UAEwhGSHCHZngYhDOWR2M_PP2SOwSmzIx1-dccK29FA.png', 'https://api-assets.clashofclans.com/badges/200/UAEwhGSHCHZngYhDOWR2M_PP2SOwSmzIx1-dccK29FA.png', 'always', 8, 126, 20, 5, 23805, 1200, 49);

-- --------------------------------------------------------

--
-- Table structure for table `enemy_attacks`
--

CREATE TABLE IF NOT EXISTS `enemy_attacks` (
  `playerId` bigint(20) NOT NULL,
  `warId` int(11) NOT NULL,
  `damage` int(4) NOT NULL,
  `attacker` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `attackerClan` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `starsWon` int(1) NOT NULL,
  `starsEarned` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=50 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `role`, `expLevel`, `trophies`, `clanRank`, `previousClanRank`, `donations`, `donationsReceived`, `leagueBadgeImg_s`, `leagueBadgeImg_xl`) VALUES
(1, 'TP03', 'coLeader', 132, 4064, 1, 0, 31, 0, 'https://api-assets.clashofclans.com/leagues/36/L-HrwYpFbDwWjdmhJQiZiTRa_zXPPOgUTdmbsaq4meo.png', 'https://api-assets.clashofclans.com/leagues/72/L-HrwYpFbDwWjdmhJQiZiTRa_zXPPOgUTdmbsaq4meo.png'),
(2, 'Boo', 'coLeader', 132, 3033, 2, 2, 1547, 657, 'https://api-assets.clashofclans.com/leagues/36/olUfFb1wscIH8hqECAdWbdB6jPm9R8zzEyHIzyBgRXc.png', 'https://api-assets.clashofclans.com/leagues/72/olUfFb1wscIH8hqECAdWbdB6jPm9R8zzEyHIzyBgRXc.png'),
(3, 'WalterSobchak', 'coLeader', 106, 2903, 3, 4, 2019, 2387, 'https://api-assets.clashofclans.com/leagues/36/4wtS1stWZQ-1VJ5HaCuDPfdhTWjeZs_jPar_YPzK6Lg.png', 'https://api-assets.clashofclans.com/leagues/72/4wtS1stWZQ-1VJ5HaCuDPfdhTWjeZs_jPar_YPzK6Lg.png'),
(4, 'Alex', 'admin', 105, 2850, 4, 3, 162, 410, 'https://api-assets.clashofclans.com/leagues/36/4wtS1stWZQ-1VJ5HaCuDPfdhTWjeZs_jPar_YPzK6Lg.png', 'https://api-assets.clashofclans.com/leagues/72/4wtS1stWZQ-1VJ5HaCuDPfdhTWjeZs_jPar_YPzK6Lg.png'),
(5, 'Raiders', 'coLeader', 106, 2750, 5, 5, 782, 1287, 'https://api-assets.clashofclans.com/leagues/36/4wtS1stWZQ-1VJ5HaCuDPfdhTWjeZs_jPar_YPzK6Lg.png', 'https://api-assets.clashofclans.com/leagues/72/4wtS1stWZQ-1VJ5HaCuDPfdhTWjeZs_jPar_YPzK6Lg.png'),
(6, 'fCD', 'admin', 109, 2608, 6, 6, 205, 356, 'https://api-assets.clashofclans.com/leagues/36/pSXfKvBKSgtvfOY3xKkgFaRQi0WcE28s3X35ywbIluY.png', 'https://api-assets.clashofclans.com/leagues/72/pSXfKvBKSgtvfOY3xKkgFaRQi0WcE28s3X35ywbIluY.png'),
(7, 'Ehud', 'admin', 102, 2583, 7, 7, 1887, 1669, 'https://api-assets.clashofclans.com/leagues/36/pSXfKvBKSgtvfOY3xKkgFaRQi0WcE28s3X35ywbIluY.png', 'https://api-assets.clashofclans.com/leagues/72/pSXfKvBKSgtvfOY3xKkgFaRQi0WcE28s3X35ywbIluY.png'),
(8, 'Kunz Klan', 'coLeader', 114, 2539, 8, 8, 58, 463, 'https://api-assets.clashofclans.com/leagues/36/kSfTyNNVSvogX3dMvpFUTt72VW74w6vEsEFuuOV4osQ.png', 'https://api-assets.clashofclans.com/leagues/72/kSfTyNNVSvogX3dMvpFUTt72VW74w6vEsEFuuOV4osQ.png'),
(9, 'DV8 2014', 'coLeader', 115, 2430, 9, 10, 395, 345, 'https://api-assets.clashofclans.com/leagues/36/kSfTyNNVSvogX3dMvpFUTt72VW74w6vEsEFuuOV4osQ.png', 'https://api-assets.clashofclans.com/leagues/72/kSfTyNNVSvogX3dMvpFUTt72VW74w6vEsEFuuOV4osQ.png'),
(10, 'oli', 'coLeader', 105, 2422, 10, 9, 2622, 4202, 'https://api-assets.clashofclans.com/leagues/36/kSfTyNNVSvogX3dMvpFUTt72VW74w6vEsEFuuOV4osQ.png', 'https://api-assets.clashofclans.com/leagues/72/kSfTyNNVSvogX3dMvpFUTt72VW74w6vEsEFuuOV4osQ.png'),
(11, 'KING ME', 'admin', 85, 2338, 11, 12, 575, 671, 'https://api-assets.clashofclans.com/leagues/36/kSfTyNNVSvogX3dMvpFUTt72VW74w6vEsEFuuOV4osQ.png', 'https://api-assets.clashofclans.com/leagues/72/kSfTyNNVSvogX3dMvpFUTt72VW74w6vEsEFuuOV4osQ.png'),
(12, 'Arcticc0', 'admin', 134, 2286, 12, 14, 1991, 2271, 'https://api-assets.clashofclans.com/leagues/36/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png', 'https://api-assets.clashofclans.com/leagues/72/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png'),
(13, 'red beard', 'admin', 123, 2280, 13, 13, 1481, 930, 'https://api-assets.clashofclans.com/leagues/36/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png', 'https://api-assets.clashofclans.com/leagues/72/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png'),
(14, 'reckless', 'coLeader', 109, 2278, 14, 15, 4536, 3357, 'https://api-assets.clashofclans.com/leagues/36/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png', 'https://api-assets.clashofclans.com/leagues/72/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png'),
(15, 'davi', 'admin', 97, 2275, 15, 16, 532, 2299, 'https://api-assets.clashofclans.com/leagues/36/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png', 'https://api-assets.clashofclans.com/leagues/72/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png'),
(16, 'Preston', 'admin', 116, 2164, 16, 19, 132, 542, 'https://api-assets.clashofclans.com/leagues/36/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png', 'https://api-assets.clashofclans.com/leagues/72/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png'),
(17, 'TastyTodd', 'admin', 98, 2139, 17, 17, 287, 1335, 'https://api-assets.clashofclans.com/leagues/36/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png', 'https://api-assets.clashofclans.com/leagues/72/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png'),
(18, 'Red Beard', 'admin', 123, 2130, 18, 18, 701, 250, 'https://api-assets.clashofclans.com/leagues/36/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png', 'https://api-assets.clashofclans.com/leagues/72/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png'),
(19, 'GiantD0nuts', 'admin', 114, 2051, 19, 20, 2567, 123, 'https://api-assets.clashofclans.com/leagues/36/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png', 'https://api-assets.clashofclans.com/leagues/72/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png'),
(20, 'pat&ash', 'admin', 94, 2007, 20, 22, 21, 0, 'https://api-assets.clashofclans.com/leagues/36/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png', 'https://api-assets.clashofclans.com/leagues/72/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png'),
(21, 'ryan', 'coLeader', 135, 2004, 21, 0, 97, 0, 'https://api-assets.clashofclans.com/leagues/36/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png', 'https://api-assets.clashofclans.com/leagues/72/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png'),
(22, 'Oliver iii', 'coLeader', 88, 1981, 22, 25, 3666, 2794, 'https://api-assets.clashofclans.com/leagues/36/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png', 'https://api-assets.clashofclans.com/leagues/72/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png'),
(23, 'Animal', 'coLeader', 102, 1956, 23, 26, 1226, 3010, 'https://api-assets.clashofclans.com/leagues/36/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png', 'https://api-assets.clashofclans.com/leagues/72/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png'),
(24, 'dwattz', 'coLeader', 82, 1951, 24, 23, 116, 145, 'https://api-assets.clashofclans.com/leagues/36/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png', 'https://api-assets.clashofclans.com/leagues/72/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png'),
(25, 'mein', 'coLeader', 107, 1906, 25, 27, 147, 206, 'https://api-assets.clashofclans.com/leagues/36/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png', 'https://api-assets.clashofclans.com/leagues/72/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png'),
(26, 'lj', 'coLeader', 135, 1878, 26, 0, 34, 0, 'https://api-assets.clashofclans.com/leagues/36/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png', 'https://api-assets.clashofclans.com/leagues/72/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png'),
(27, 'Brian', 'admin', 91, 1853, 27, 24, 13922, 617, 'https://api-assets.clashofclans.com/leagues/36/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png', 'https://api-assets.clashofclans.com/leagues/72/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png'),
(28, 'G.O', 'admin', 73, 1821, 28, 30, 56, 1229, 'https://api-assets.clashofclans.com/leagues/36/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png', 'https://api-assets.clashofclans.com/leagues/72/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png'),
(29, 'Mickey', 'admin', 76, 1811, 29, 32, 664, 1026, 'https://api-assets.clashofclans.com/leagues/36/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png', 'https://api-assets.clashofclans.com/leagues/72/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png'),
(30, 'WWA 3', 'coLeader', 107, 1803, 30, 29, 2236, 2369, 'https://api-assets.clashofclans.com/leagues/36/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png', 'https://api-assets.clashofclans.com/leagues/72/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png'),
(31, 'JSquared', 'admin', 94, 1736, 31, 34, 314, 1217, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(32, 'DROCK', 'admin', 93, 1705, 32, 31, 57, 118, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(33, 'King_Nate', 'member', 79, 1704, 33, 35, 434, 286, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(34, 'Stacey', 'admin', 101, 1667, 34, 0, 0, 1, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(35, 'lj2', 'leader', 101, 1632, 35, 36, 203, 3400, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(36, 'Lord Joel', 'coLeader', 78, 1605, 36, 38, 90, 285, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(37, 'Ezcalibur', 'coLeader', 90, 1591, 37, 37, 318, 475, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(38, 'hangcrazy', 'coLeader', 72, 1583, 38, 39, 483, 307, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(39, 'Cross', 'coLeader', 86, 1560, 39, 40, 813, 746, 'https://api-assets.clashofclans.com/leagues/36/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png', 'https://api-assets.clashofclans.com/leagues/72/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png'),
(40, 'Bean Dip', 'admin', 73, 1498, 40, 41, 898, 287, 'https://api-assets.clashofclans.com/leagues/36/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png', 'https://api-assets.clashofclans.com/leagues/72/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png'),
(41, 'Binglbee', 'admin', 100, 1496, 41, 42, 1092, 903, 'https://api-assets.clashofclans.com/leagues/36/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png', 'https://api-assets.clashofclans.com/leagues/72/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png'),
(42, 'DV8 2015', 'admin', 54, 1383, 42, 43, 0, 520, 'https://api-assets.clashofclans.com/leagues/36/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png', 'https://api-assets.clashofclans.com/leagues/72/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png'),
(43, 'AC', 'admin', 70, 1380, 43, 44, 0, 0, 'https://api-assets.clashofclans.com/leagues/36/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png', 'https://api-assets.clashofclans.com/leagues/72/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png'),
(44, 'Lord Joel', 'member', 63, 1369, 44, 45, 0, 155, 'https://api-assets.clashofclans.com/leagues/36/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png', 'https://api-assets.clashofclans.com/leagues/72/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png'),
(45, 'Mini Raiderz', 'admin', 61, 1329, 45, 46, 273, 500, 'https://api-assets.clashofclans.com/leagues/36/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png', 'https://api-assets.clashofclans.com/leagues/72/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png'),
(46, 'YourBroShah', 'admin', 113, 1312, 46, 33, 327, 584, 'https://api-assets.clashofclans.com/leagues/36/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png', 'https://api-assets.clashofclans.com/leagues/72/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png'),
(47, 'Preston', 'coLeader', 47, 1127, 47, 47, 0, 200, 'https://api-assets.clashofclans.com/leagues/36/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png', 'https://api-assets.clashofclans.com/leagues/72/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png'),
(48, 'Uhtred', 'admin', 140, 1069, 48, 11, 3653, 3259, 'https://api-assets.clashofclans.com/leagues/36/8OhXcwDJkenBH2kPH73eXftFOpHHRF-b32n0yrTqC44.png', 'https://api-assets.clashofclans.com/leagues/72/8OhXcwDJkenBH2kPH73eXftFOpHHRF-b32n0yrTqC44.png'),
(49, 'TP30', 'admin', 76, 997, 49, 48, 406, 2316, 'https://api-assets.clashofclans.com/leagues/36/8OhXcwDJkenBH2kPH73eXftFOpHHRF-b32n0yrTqC44.png', 'https://api-assets.clashofclans.com/leagues/72/8OhXcwDJkenBH2kPH73eXftFOpHHRF-b32n0yrTqC44.png');

-- --------------------------------------------------------

--
-- Table structure for table `members_attacks`
--

CREATE TABLE IF NOT EXISTS `members_attacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `playerId` bigint(20) NOT NULL,
  `warId` int(10) DEFAULT NULL,
  `attackNumber` int(1) DEFAULT NULL,
  `damage` int(4) DEFAULT NULL,
  `target` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enemyClan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `starsWon` int(1) DEFAULT NULL,
  `starsEarned` int(1) DEFAULT NULL,
  `rank` int(11) NOT NULL,
  `enemyRank` int(11) NOT NULL,
  `townHall` int(11) NOT NULL,
  `enemyTownHall` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `members_statistics_id` (`playerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=239 ;

--
-- Dumping data for table `members_attacks`
--

INSERT INTO `members_attacks` (`id`, `playerId`, `warId`, `attackNumber`, `damage`, `target`, `enemyClan`, `starsWon`, `starsEarned`, `rank`, `enemyRank`, `townHall`, `enemyTownHall`) VALUES
(1, 12888504461, 150, 1, 54, '페이커', '롯데', 1, 1, 1, 1, 10, 10),
(2, 12888504461, 150, 2, 86, '길전투', '롯데', 2, 2, 1, 2, 10, 10),
(3, 133145136705, 150, 1, 64, '태율아비', '롯데', 2, 2, 2, 9, 9, 9),
(4, 133145136705, 150, 2, 68, '남추', '롯데', 2, 1, 2, 5, 9, 9),
(5, 94491465800, 150, 1, 79, '남추', '롯데', 1, 1, 3, 5, 9, 9),
(6, 94491465800, 150, 2, 55, '페이커', '롯데', 1, 0, 3, 1, 9, 10),
(7, 85901645649, 150, 1, 78, '서주니아빠', '롯데', 2, 2, 4, 4, 9, 10),
(8, 85901645649, 150, 2, 100, '드러와', '롯데', 3, 3, 4, 3, 9, 10),
(9, 150325618472, 150, 1, 100, '고폭', '롯데', 3, 3, 5, 8, 9, 9),
(10, 150325618472, 150, 2, 98, '태율아비', '롯데', 1, 0, 5, 9, 9, 9),
(11, 64430025256, 150, 1, 100, '왕만두', '롯데', 3, 3, 6, 6, 9, 9),
(12, 64430025256, 150, 2, 100, '남추', '롯데', 3, 1, 6, 5, 9, 9),
(13, 167506916823, 150, 1, 95, '헤라', '롯데', 2, 1, 7, 11, 9, 9),
(14, 133146363419, 150, 1, 100, '고추심밭', '롯데', 3, 3, 8, 7, 9, 9),
(15, 133146363419, 150, 2, 81, '태율아비', '롯데', 1, 0, 8, 9, 9, 9),
(16, 81606846568, 150, 1, 60, '헤라', '롯데', 1, 0, 9, 11, 9, 9),
(17, 81606846568, 150, 2, 100, 'Fery', '롯데', 3, 2, 9, 12, 9, 9),
(18, 17188509740, 150, 1, 100, '후니', '롯데', 3, 3, 10, 10, 9, 9),
(19, 17188509740, 150, 2, 71, '헤라', '롯데', 1, 1, 10, 11, 9, 9),
(20, 77310317011, 150, 1, 100, '막달려걍', '롯데', 3, 2, 11, 13, 8, 8),
(21, 77310317011, 150, 2, 52, 'Fery', '롯데', 1, 0, 11, 12, 8, 9),
(22, 210455399790, 150, 1, 71, 'Fery', '롯데', 1, 1, 12, 12, 8, 9),
(23, 210455399790, 150, 2, 100, '막달려걍', '롯데', 3, 0, 12, 13, 8, 8),
(24, 184687165357, 150, 1, 100, '승리의롯데01', '롯데', 3, 1, 13, 14, 8, 8),
(25, 184687165357, 150, 2, 100, '던전 앤 위너', '롯데', 3, 3, 13, 15, 8, 8),
(26, 206168526023, 150, 1, 69, '막달려걍', '롯데', 1, 1, 14, 13, 8, 8),
(27, 206168526023, 150, 2, 94, '승리의롯데01', '롯데', 2, 2, 14, 14, 8, 8),
(28, 158914331484, 149, 1, 89, '威威村', '神州帝国', 2, 0, 1, 10, 10, 9),
(29, 158914331484, 149, 2, 100, '小孩村', '神州帝国', 3, 2, 1, 14, 10, 8),
(30, 158914080844, 149, 1, 52, 'wang', '神州帝国', 1, 1, 2, 3, 10, 10),
(31, 158914080844, 149, 2, 100, '狼窝', '神州帝国', 3, 3, 2, 6, 10, 9),
(32, 111669658674, 149, 1, 50, '雇佣军', '神州帝国', 1, 1, 3, 2, 10, 10),
(33, 111669658674, 149, 2, 49, '专杀不服', '神州帝国', 1, 1, 3, 1, 10, 10),
(34, 133145136705, 149, 1, 49, '狼窝', '神州帝国', 0, 0, 4, 6, 9, 9),
(35, 133145136705, 149, 2, 97, '威威村', '神州帝国', 1, 0, 4, 10, 9, 9),
(36, 94491465800, 149, 1, 62, '夢幻之國', '神州帝国', 1, 1, 5, 4, 9, 9),
(37, 94491465800, 149, 2, 100, '威威村', '神州帝国', 3, 1, 5, 10, 9, 9),
(38, 85901645649, 149, 1, 100, '黑河', '神州帝国', 3, 3, 6, 7, 9, 9),
(39, 85901645649, 149, 2, 95, '夢幻之國', '神州帝国', 2, 1, 6, 4, 9, 9),
(40, 64429109197, 149, 1, 92, '文大人', '神州帝国', 1, 1, 7, 8, 9, 9),
(41, 64429109197, 149, 2, 0, '威威村', '神州帝国', 0, 0, 7, 10, 9, 9),
(42, 150325618472, 149, 1, 33, '威威村', '神州帝国', 0, 0, 8, 10, 9, 9),
(43, 150325618472, 149, 2, 69, '鷹之國', '神州帝国', 2, 2, 8, 5, 9, 9),
(44, 12885354458, 149, 1, 100, 'm x k', '神州帝国', 3, 3, 9, 9, 9, 9),
(45, 12885354458, 149, 2, 100, '文大人', '神州帝国', 3, 2, 9, 8, 9, 9),
(46, 167506916823, 149, 1, 91, '小孩村', '神州帝国', 1, 0, 10, 14, 9, 8),
(47, 167506916823, 149, 2, 100, '小狼窝', '神州帝国', 3, 2, 10, 15, 9, 8),
(48, 133146363419, 149, 1, 100, 'xiaopang99', '神州帝国', 3, 3, 11, 11, 9, 9),
(49, 133146363419, 149, 2, 98, '威威村', '神州帝国', 2, 2, 11, 10, 9, 9),
(50, 81606846568, 149, 1, 100, 'hong 9818', '神州帝国', 3, 2, 12, 12, 9, 9),
(51, 81606846568, 149, 2, 70, '威威村', '神州帝国', 2, 0, 12, 10, 9, 9),
(52, 17188509740, 149, 1, 70, 'hong 9818', '神州帝国', 1, 1, 13, 12, 9, 9),
(53, 17188509740, 149, 2, 100, 'SKY', '神州帝国', 3, 3, 13, 13, 9, 8),
(54, 184684890132, 149, 1, 76, '小孩村', '神州帝国', 1, 1, 14, 14, 8, 8),
(55, 184684890132, 149, 2, 97, 'SKY', '神州帝国', 2, 0, 14, 13, 8, 8),
(56, 77310317011, 149, 1, 69, '小孩村', '神州帝国', 1, 0, 15, 14, 8, 8),
(57, 77310317011, 149, 2, 100, 'land of dave', '神州帝国', 3, 1, 15, 16, 8, 8),
(58, 111671510734, 149, 1, 76, 'land of dave', '神州帝国', 2, 2, 16, 16, 8, 8),
(59, 111671510734, 149, 2, 85, '小狼窝', '神州帝国', 1, 1, 16, 15, 8, 8),
(60, 210455399790, 149, 1, 76, 'xiaopang728', '神州帝国', 1, 1, 17, 17, 8, 8),
(61, 210455399790, 149, 2, 96, '小孩村', '神州帝国', 1, 0, 17, 14, 8, 8),
(62, 184687165357, 149, 1, 35, '夢幻之國', '神州帝国', 0, 0, 18, 4, 8, 9),
(63, 184687165357, 149, 2, 29, '鷹之國', '神州帝国', 0, 0, 18, 5, 8, 9),
(64, 64426718184, 149, 1, 100, '神魔', '神州帝国', 3, 3, 19, 18, 8, 8),
(65, 64426718184, 149, 2, 100, 'xiaopang728', '神州帝国', 3, 2, 19, 17, 8, 8),
(66, 38659048679, 149, 1, 100, 'love4ever.miko', '神州帝国', 3, 3, 20, 19, 7, 7),
(67, 38659048679, 149, 2, 100, '王者之国', '神州帝国', 3, 3, 20, 20, 7, 7),
(68, 158914080844, 148, 1, 54, 'jonz', 'clan say', 1, 1, 1, 2, 10, 10),
(69, 158914080844, 148, 2, 58, 'Quitong', 'clan say', 2, 2, 1, 3, 10, 10),
(70, 111669658674, 148, 1, 56, 'don kamuti', 'clan say', 1, 1, 2, 1, 10, 10),
(71, 111669658674, 148, 2, 60, 'jonz', 'clan say', 2, 1, 2, 2, 10, 10),
(72, 5940623, 148, 1, 37, 'Quitong', 'clan say', 0, 0, 3, 3, 10, 10),
(73, 5940623, 148, 2, 29, 'jonz', 'clan say', 0, 0, 3, 2, 10, 10),
(74, 133145136705, 148, 1, 100, 'Alibasbas', 'clan say', 3, 3, 4, 9, 9, 9),
(75, 133145136705, 148, 2, 100, 'chloe', 'clan say', 3, 1, 4, 7, 9, 9),
(76, 94491465800, 148, 1, 100, 'zeratul', 'clan say', 3, 3, 5, 4, 9, 9),
(77, 94491465800, 148, 2, 100, 'cailee', 'clan say', 3, 3, 5, 5, 9, 9),
(78, 85901645649, 148, 1, 98, 'chloe', 'clan say', 2, 2, 6, 7, 9, 9),
(79, 85901645649, 148, 2, 100, 'jc', 'clan say', 3, 2, 6, 6, 9, 9),
(80, 64429109197, 148, 1, 82, 'jc', 'clan say', 1, 1, 7, 6, 9, 9),
(81, 64429109197, 148, 2, 45, 'Quitong', 'clan say', 0, 0, 7, 3, 9, 10),
(82, 150325618472, 148, 1, 100, 'Teacher Iris', 'clan say', 3, 3, 8, 8, 9, 9),
(83, 150325618472, 148, 2, 100, 'enrix', 'clan say', 3, 1, 8, 10, 9, 9),
(84, 167506916823, 148, 1, 100, 'lyntot', 'clan say', 3, 1, 9, 16, 9, 8),
(85, 167506916823, 148, 2, 31, 'don kamuti', 'clan say', 0, 0, 9, 1, 9, 10),
(86, 133146363419, 148, 1, 52, 'zeratul', 'clan say', 2, 0, 10, 4, 9, 9),
(87, 81606846568, 148, 1, 100, 'chleo', 'clan say', 3, 3, 11, 11, 9, 9),
(88, 81606846568, 148, 2, 53, 'chloe', 'clan say', 1, 0, 11, 7, 9, 9),
(89, 17188509740, 148, 1, 99, 'enrix', 'clan say', 2, 2, 12, 10, 9, 9),
(90, 17188509740, 148, 2, 21, 'don kamuti', 'clan say', 0, 0, 12, 1, 9, 10),
(91, 184684890132, 148, 1, 100, 'Fujiko', 'clan say', 3, 3, 13, 12, 8, 8),
(92, 184684890132, 148, 2, 100, 'lE.ClUlLlLlElN', 'clan say', 3, 3, 13, 13, 8, 8),
(93, 77310317011, 148, 1, 100, 'champion', 'clan say', 3, 3, 14, 14, 8, 8),
(94, 77310317011, 148, 2, 100, 'levie', 'clan say', 3, 2, 14, 15, 8, 8),
(95, 111671510734, 148, 1, 53, 'lyntot', 'clan say', 1, 0, 15, 16, 8, 8),
(96, 210455399790, 148, 1, 80, 'lyntot', 'clan say', 1, 1, 16, 16, 8, 8),
(97, 210455399790, 148, 2, 99, 'Fujiko', 'clan say', 2, 0, 16, 12, 8, 8),
(98, 184687165357, 148, 1, 76, 'lyntot', 'clan say', 1, 0, 17, 16, 8, 8),
(99, 184687165357, 148, 2, 100, 'BATBATANTANAMU', 'clan say', 3, 3, 17, 17, 8, 8),
(100, 64426718184, 148, 1, 100, 'd'' zetti', 'clan say', 3, 3, 18, 18, 8, 8),
(101, 64426718184, 148, 2, 93, 'lyntot', 'clan say', 2, 1, 18, 16, 8, 8),
(102, 206168526023, 148, 1, 100, 'sandra', 'clan say', 3, 3, 19, 19, 8, 8),
(103, 206168526023, 148, 2, 52, 'levie', 'clan say', 1, 1, 19, 15, 8, 8),
(104, 38659048679, 148, 1, 100, 'nataraki', 'clan say', 3, 3, 20, 20, 7, 6),
(105, 38659048679, 148, 2, 100, 'sandra', 'clan say', 3, 0, 20, 19, 7, 8),
(106, 111669658674, 147, 1, 51, 'Daniel', 'Godz of Warr', 2, 2, 1, 1, 10, 10),
(107, 111669658674, 147, 2, 100, 'Chief Mac', 'Godz of Warr', 3, 3, 1, 2, 10, 9),
(108, 133145136705, 147, 1, 64, 'Joel The Great', 'Godz of Warr', 1, 1, 2, 3, 9, 9),
(109, 133145136705, 147, 2, 100, 'McBride', 'Godz of Warr', 3, 3, 2, 8, 9, 9),
(110, 94491465800, 147, 1, 100, 'Joel The Great', 'Godz of Warr', 3, 2, 3, 3, 9, 9),
(111, 94491465800, 147, 2, 100, 'derpcicle', 'Godz of Warr', 3, 2, 3, 6, 9, 9),
(112, 85901645649, 147, 1, 100, 'Madgud''', 'Godz of Warr', 3, 3, 4, 5, 9, 9),
(113, 85901645649, 147, 2, 91, 'Adam', 'Godz of Warr', 2, 2, 4, 4, 9, 9),
(114, 64430025256, 147, 1, 100, 'srblunt', 'Godz of Warr', 3, 3, 5, 7, 9, 9),
(115, 64430025256, 147, 2, 100, 'Sandy', 'Godz of Warr', 3, 2, 5, 9, 9, 9),
(116, 47245181237, 147, 1, 52, 'derpcicle', 'Godz of Warr', 1, 1, 6, 6, 9, 9),
(117, 47245181237, 147, 2, 100, 'AngelTip', 'Godz of Warr', 3, 2, 6, 13, 9, 9),
(118, 176093810621, 147, 1, 100, 'Aaron', 'Godz of Warr', 3, 1, 7, 10, 9, 9),
(119, 12885354458, 147, 1, 87, 'Sandy', 'Godz of Warr', 1, 1, 8, 9, 9, 9),
(120, 12885354458, 147, 2, 99, 'Aaron', 'Godz of Warr', 2, 1, 8, 10, 9, 9),
(121, 167506916823, 147, 1, 80, 'AngelTip', 'Godz of Warr', 1, 0, 9, 13, 9, 9),
(122, 167506916823, 147, 2, 100, 'Slick Vick', 'Godz of Warr', 3, 1, 9, 14, 9, 9),
(123, 133146363419, 147, 1, 100, 'Nasty', 'Godz of Warr', 3, 1, 10, 11, 9, 9),
(124, 81606846568, 147, 1, 50, 'Aaron', 'Godz of Warr', 1, 1, 11, 10, 9, 9),
(125, 81606846568, 147, 2, 66, 'AngelTip', 'Godz of Warr', 1, 1, 11, 13, 9, 9),
(126, 17188509740, 147, 1, 90, 'Nasty', 'Godz of Warr', 2, 2, 12, 11, 9, 9),
(127, 17188509740, 147, 2, 100, 'Bama', 'Godz of Warr', 3, 3, 12, 12, 9, 9),
(128, 73018553731, 147, 1, 64, 'Slick Vick', 'Godz of Warr', 2, 2, 13, 14, 9, 9),
(129, 73018553731, 147, 2, 35, 'AngelTip', 'Godz of Warr', 0, 0, 13, 13, 9, 9),
(130, 184684890132, 147, 1, 100, 'slay jr', 'Godz of Warr', 3, 3, 14, 15, 8, 8),
(131, 184684890132, 147, 2, 100, 'RGVunknown956+', 'Godz of Warr', 3, 1, 14, 16, 8, 8),
(132, 77310317011, 147, 1, 91, 'RGVunknown956+', 'Godz of Warr', 1, 0, 15, 16, 8, 8),
(133, 77310317011, 147, 2, 47, 'AngelTip', 'Godz of Warr', 0, 0, 15, 13, 8, 9),
(134, 210455399790, 147, 1, 84, 'RGVunknown956+', 'Godz of Warr', 2, 2, 16, 16, 8, 8),
(135, 210455399790, 147, 2, 100, 'Guz Guz', 'Godz of Warr', 3, 0, 16, 17, 8, 8),
(136, 184687165357, 147, 1, 100, 'KillerD4', 'Godz of Warr', 3, 2, 17, 19, 8, 8),
(137, 184687165357, 147, 2, 97, 'RGVunknown956+', 'Godz of Warr', 1, 0, 17, 16, 8, 8),
(138, 64426718184, 147, 1, 100, 'Guz Guz', 'Godz of Warr', 3, 3, 18, 17, 8, 8),
(139, 64426718184, 147, 2, 100, 'Dchamp', 'Godz of Warr', 3, 3, 18, 18, 8, 8),
(140, 206168526023, 147, 1, 54, 'KillerD4', 'Godz of Warr', 1, 1, 19, 19, 8, 8),
(141, 206168526023, 147, 2, 100, 'Invisible', 'Godz of Warr', 3, 3, 19, 20, 8, 7),
(142, 38659048679, 147, 1, 70, 'KillerD4', 'Godz of Warr', 2, 0, 20, 19, 7, 8),
(143, 158914331484, 146, 1, 50, 'Ramiro', 'Espartanos USA', 1, 1, 1, 1, 10, 10),
(144, 158914331484, 146, 2, 86, 'augusto fernand', 'Espartanos USA', 2, 1, 1, 6, 10, 9),
(145, 111669658674, 146, 1, 77, 'keyner', 'Espartanos USA', 2, 2, 2, 3, 10, 10),
(146, 111669658674, 146, 2, 68, 'cori', 'Espartanos USA', 2, 2, 2, 2, 10, 10),
(147, 12888504461, 146, 1, 78, 'joshe', 'Espartanos USA', 1, 1, 3, 4, 10, 10),
(148, 12888504461, 146, 2, 39, 'Ramiro', 'Espartanos USA', 0, 0, 3, 1, 10, 10),
(149, 133145136705, 146, 1, 100, 'cori', 'Espartanos USA', 3, 1, 4, 8, 9, 9),
(150, 133145136705, 146, 2, 54, 'augusto fernand', 'Espartanos USA', 1, 1, 4, 6, 9, 9),
(151, 94491465800, 146, 1, 60, 'THE FLASH⚡', 'Espartanos USA', 2, 2, 5, 5, 9, 10),
(152, 94491465800, 146, 2, 100, 'Jorge EAC', 'Espartanos USA', 3, 3, 5, 7, 9, 9),
(153, 12885354458, 146, 1, 54, 'augusto fernand', 'Espartanos USA', 1, 0, 6, 6, 9, 9),
(154, 12885354458, 146, 2, 68, 'joshe', 'Espartanos USA', 2, 1, 6, 4, 9, 10),
(155, 133146363419, 146, 1, 48, 'augusto fernand', 'Espartanos USA', 0, 0, 7, 6, 9, 9),
(156, 133146363419, 146, 2, 60, 'joshe', 'Espartanos USA', 1, 0, 7, 4, 9, 10),
(157, 81606846568, 146, 1, 100, 'jorgemedina', 'Espartanos USA', 3, 3, 8, 10, 9, 8),
(158, 81606846568, 146, 2, 51, 'THE FLASH⚡', 'Espartanos USA', 1, 0, 8, 5, 9, 10),
(159, 17188509740, 146, 1, 69, 'cori', 'Espartanos USA', 2, 2, 9, 8, 9, 9),
(160, 17188509740, 146, 2, 100, 'Morales10', 'Espartanos USA', 3, 3, 9, 9, 9, 9),
(161, 73018553731, 146, 1, 72, 'Morales10', 'Espartanos USA', 1, 0, 10, 9, 9, 9),
(162, 73018553731, 146, 2, 61, 'cori', 'Espartanos USA', 2, 0, 10, 8, 9, 9),
(163, 184684890132, 146, 1, 100, 'Solo Dime Dan', 'Espartanos USA', 3, 3, 11, 11, 8, 8),
(164, 184684890132, 146, 2, 100, 'SMALLVILLE', 'Espartanos USA', 3, 0, 11, 13, 8, 8),
(165, 77310317011, 146, 1, 100, 'Angélica', 'Espartanos USA', 3, 1, 12, 12, 8, 8),
(166, 77310317011, 146, 2, 100, 'SMALLVILLE', 'Espartanos USA', 3, 2, 12, 13, 8, 8),
(167, 188986152974, 146, 1, 94, 'Angélica', 'Espartanos USA', 2, 2, 13, 12, 8, 8),
(168, 188986152974, 146, 2, 73, 'SMALLVILLE', 'Espartanos USA', 1, 1, 13, 13, 8, 8),
(169, 184687165357, 146, 1, 100, 'MILO', 'Espartanos USA', 3, 1, 14, 14, 8, 8),
(170, 184687165357, 146, 2, 100, 'destroyer23', 'Espartanos USA', 3, 2, 14, 15, 8, 8),
(171, 38659048679, 146, 1, 89, 'MILO', 'Espartanos USA', 2, 2, 15, 14, 7, 8),
(172, 38659048679, 146, 2, 69, 'destroyer23', 'Espartanos USA', 1, 1, 15, 15, 7, 8),
(173, 111669658674, 145, 1, 50, '~Roem_Royen~', 'INDO BLUE SKY', 1, 1, 1, 1, 10, 10),
(174, 111669658674, 145, 2, 100, '✴PASHA✴', 'INDO BLUE SKY', 3, 2, 1, 4, 10, 9),
(175, 12888504461, 145, 1, 100, 'BEN''S', 'INDO BLUE SKY', 3, 3, 2, 3, 10, 10),
(176, 12888504461, 145, 2, 70, '✈Mr.RICKY✈', 'INDO BLUE SKY', 2, 2, 2, 2, 10, 10),
(177, 133145136705, 145, 1, 54, '✴PASHA✴', 'INDO BLUE SKY', 1, 1, 3, 4, 9, 9),
(178, 133145136705, 145, 2, 94, '~ Shagrath ~', 'INDO BLUE SKY', 2, 0, 3, 6, 9, 9),
(179, 85901645649, 145, 1, 100, '~"RoYeN_Tea"~', 'INDO BLUE SKY', 3, 3, 4, 5, 9, 9),
(180, 85901645649, 145, 2, 64, '~ Shagrath ~', 'INDO BLUE SKY', 2, 2, 4, 6, 9, 9),
(181, 115965126773, 145, 1, 75, 'Waffen-SS', 'INDO BLUE SKY', 1, 0, 5, 7, 9, 9),
(182, 115965126773, 145, 2, 99, '~ Shagrath ~', 'INDO BLUE SKY', 2, 0, 5, 6, 9, 9),
(183, 12885354458, 145, 1, 100, 'never think', 'INDO BLUE SKY', 3, 3, 6, 8, 9, 9),
(184, 12885354458, 145, 2, 56, 'Waffen-SS', 'INDO BLUE SKY', 1, 1, 6, 7, 9, 9),
(185, 133146363419, 145, 1, 100, 'Waffen-SS', 'INDO BLUE SKY', 3, 2, 7, 7, 9, 9),
(186, 133146363419, 145, 2, 56, '~ Shagrath ~', 'INDO BLUE SKY', 1, 0, 7, 6, 9, 9),
(187, 73019325884, 145, 1, 60, 'Ms.Cycy', 'INDO BLUE SKY', 1, 1, 8, 10, 9, 9),
(188, 17188509740, 145, 1, 100, 'S 3934 FL', 'INDO BLUE SKY', 3, 3, 9, 9, 9, 9),
(189, 17188509740, 145, 2, 100, 'Ms.Cycy', 'INDO BLUE SKY', 3, 2, 9, 10, 9, 9),
(190, 73018553731, 145, 1, 68, 'S 3934 FL', 'INDO BLUE SKY', 1, 0, 10, 9, 9, 9),
(191, 73018553731, 145, 2, 63, 'Ms.Cycy', 'INDO BLUE SKY', 1, 0, 10, 10, 9, 9),
(192, 184684890132, 145, 1, 100, '~AILERON~SKY', 'INDO BLUE SKY', 3, 0, 11, 11, 8, 8),
(193, 184684890132, 145, 2, 37, '~ Shagrath ~', 'INDO BLUE SKY', 0, 0, 11, 6, 8, 9),
(194, 77310317011, 145, 1, 100, '~AILERON~SKY', 'INDO BLUE SKY', 3, 3, 12, 11, 8, 8),
(195, 77310317011, 145, 2, 56, 'Waffen-SS', 'INDO BLUE SKY', 1, 0, 12, 7, 8, 9),
(196, 188986152974, 145, 1, 100, 'RFW', 'INDO BLUE SKY', 3, 3, 13, 13, 8, 8),
(197, 188986152974, 145, 2, 100, 'febrian', 'INDO BLUE SKY', 3, 3, 13, 15, 8, 5),
(198, 184687165357, 145, 1, 100, 'FRANKENSTEIN', 'INDO BLUE SKY', 3, 3, 14, 12, 8, 8),
(199, 184687165357, 145, 2, 60, 'Waffen-SS', 'INDO BLUE SKY', 1, 0, 14, 7, 8, 9),
(200, 38659048679, 145, 1, 100, 'muhammad reza', 'INDO BLUE SKY', 3, 3, 15, 14, 7, 7),
(201, 38659048679, 145, 2, 76, 'RFW', 'INDO BLUE SKY', 1, 0, 15, 13, 7, 8),
(202, 158914080844, 144, 1, 48, 'shuthefrontdoor', 'WeWinSometimes', 1, 1, 1, 3, 10, 10),
(203, 158914080844, 144, 2, 66, 'KIng Wang', 'WeWinSometimes', 2, 2, 1, 5, 10, 9),
(204, 111669658674, 144, 1, 54, '4think20twice', 'WeWinSometimes', 1, 1, 2, 1, 10, 10),
(205, 111669658674, 144, 2, 56, 'laker4life', 'WeWinSometimes', 1, 1, 2, 2, 10, 10),
(206, 17183384102, 144, 1, 100, 'Tonyjdm69', 'WeWinSometimes', 3, 2, 3, 9, 10, 9),
(207, 17183384102, 144, 2, 56, 'will j', 'WeWinSometimes', 2, 1, 3, 10, 10, 9),
(208, 94491465800, 144, 1, 100, 'Vetkama', 'WeWinSometimes', 3, 3, 4, 4, 9, 9),
(209, 94491465800, 144, 2, 93, 'RubberToe', 'WeWinSometimes', 2, 2, 4, 8, 9, 9),
(210, 85901645649, 144, 1, 100, 'DirtyMike', 'WeWinSometimes', 3, 3, 5, 7, 9, 9),
(211, 85901645649, 144, 2, 100, 'BuckFutters', 'WeWinSometimes', 3, 2, 5, 6, 9, 9),
(212, 115965126773, 144, 1, 58, 'BuckFutters', 'WeWinSometimes', 1, 1, 6, 6, 9, 9),
(213, 115965126773, 144, 2, 100, 'Danhy', 'WeWinSometimes', 3, 2, 6, 11, 9, 9),
(214, 150325618472, 144, 1, 58, 'Tonyjdm69', 'WeWinSometimes', 1, 1, 7, 9, 9, 9),
(215, 150325618472, 144, 2, 66, 'Danhy', 'WeWinSometimes', 1, 0, 7, 11, 9, 9),
(216, 176093810621, 144, 1, 43, 'Danhy', 'WeWinSometimes', 0, 0, 8, 11, 9, 9),
(217, 176093810621, 144, 2, 100, 'rudeboii', 'WeWinSometimes', 3, 1, 8, 17, 9, 8),
(218, 12885354458, 144, 1, 47, 'will j', 'WeWinSometimes', 0, 0, 9, 10, 9, 9),
(219, 12885354458, 144, 2, 100, 'thimychristine', 'WeWinSometimes', 3, 1, 9, 12, 9, 9),
(220, 167506916823, 144, 1, 89, 'Tonyjdm69', 'WeWinSometimes', 1, 0, 10, 9, 9, 9),
(221, 133146363419, 144, 1, 60, 'will j', 'WeWinSometimes', 1, 1, 11, 10, 9, 9),
(222, 133146363419, 144, 2, 100, 'loser', 'WeWinSometimes', 3, 1, 11, 13, 9, 9),
(223, 81606846568, 144, 1, 98, 'thimychristine', 'WeWinSometimes', 2, 2, 12, 12, 9, 9),
(224, 81606846568, 144, 2, 97, 'Danhy', 'WeWinSometimes', 1, 1, 12, 11, 9, 9),
(225, 17188509740, 144, 1, 88, 'loser', 'WeWinSometimes', 2, 2, 13, 13, 9, 9),
(226, 17188509740, 144, 2, 62, 'mcdungle', 'WeWinSometimes', 2, 2, 13, 14, 9, 9),
(227, 73018553731, 144, 1, 100, 'MR.Beam', 'WeWinSometimes', 3, 3, 14, 15, 9, 9),
(228, 73018553731, 144, 2, 100, 'TuLaPmP', 'WeWinSometimes', 3, 2, 14, 16, 9, 8),
(229, 184684890132, 144, 1, 70, 'TuLaPmP', 'WeWinSometimes', 1, 1, 15, 16, 8, 8),
(230, 184684890132, 144, 2, 67, 'rudeboii', 'WeWinSometimes', 2, 0, 15, 17, 8, 8),
(231, 77310317011, 144, 1, 100, 'mcdungle', 'WeWinSometimes', 3, 1, 16, 14, 8, 9),
(232, 77310317011, 144, 2, 99, 'rudeboii', 'WeWinSometimes', 2, 0, 16, 17, 8, 8),
(233, 90198882520, 144, 1, 79, 'rudeboii', 'WeWinSometimes', 1, 0, 17, 17, 8, 8),
(234, 184687165357, 144, 1, 100, 'teevee3', 'WeWinSometimes', 3, 2, 18, 18, 8, 8),
(235, 184687165357, 144, 2, 77, 'rudeboii', 'WeWinSometimes', 2, 2, 18, 17, 8, 8),
(236, 188986152974, 144, 1, 60, 'teevee3', 'WeWinSometimes', 1, 1, 19, 18, 8, 8),
(237, 188986152974, 144, 2, 100, 'kakarlak', 'WeWinSometimes', 3, 3, 19, 20, 8, 7),
(238, 38659048679, 144, 1, 100, 'Ebrahim Uchiha', 'WeWinSometimes', 3, 3, 20, 19, 7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `members_statistics`
--

CREATE TABLE IF NOT EXISTS `members_statistics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` bit(1) DEFAULT NULL,
  `playerId` bigint(20) DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `totalAttacks` int(20) DEFAULT NULL,
  `starsEarned` int(10) DEFAULT NULL,
  `starsWon` int(10) DEFAULT NULL,
  `totalDamage` int(11) DEFAULT NULL,
  `totalRating` float DEFAULT NULL,
  `warsJoined` int(11) NOT NULL,
  `townHall` int(11) NOT NULL,
  `offenseWeight` int(11) NOT NULL,
  `defenseWeight` int(11) NOT NULL,
  `goldElixir` int(11) NOT NULL,
  `darkElixir` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `members_statistics`
--

INSERT INTO `members_statistics` (`id`, `active`, `playerId`, `name`, `totalAttacks`, `starsEarned`, `starsWon`, `totalDamage`, `totalRating`, `warsJoined`, `townHall`, `offenseWeight`, `defenseWeight`, `goldElixir`, `darkElixir`) VALUES
(1, b'1', 12888504461, 'Red Beard', 6, 9, 9, 427, 13.5, 3, 10, 831, 636, 74000, 330),
(2, b'1', 133145136705, 'splashtodd', 12, 14, 22, 944, 20.1, 6, 9, 638, 615, 73000, 320),
(3, b'1', 94491465800, 'Kunz Klan', 12, 23, 28, 1049, 42.55, 6, 9, 629, 615, 73000, 320),
(4, b'1', 85901645649, 'GiantD0nuts', 12, 28, 31, 1126, 52.3, 6, 9, 627, 601, 72000, 310),
(5, b'1', 150325618472, 'Alex', 8, 10, 14, 624, 18.15, 4, 9, 561, 576, 70000, 300),
(6, b'1', 64430025256, 'fCD', 4, 9, 12, 400, 18.55, 2, 9, 610, 545, 68000, 290),
(7, b'1', 167506916823, 'Tj deadmouse', 8, 5, 14, 686, 9.55, 5, 9, 523, 506, 66000, 270),
(8, b'1', 133146363419, 'TastyTodd', 12, 13, 23, 955, 27.05, 7, 9, 518, 489, 65000, 270),
(9, b'1', 81606846568, 'SpideyG', 12, 15, 22, 945, 26.65, 6, 9, 560, 466, 63000, 260),
(10, b'1', 17188509740, 'Binglbee', 14, 29, 30, 1170, 52.2, 7, 9, 478, 424, 60000, 240),
(11, b'1', 77310317011, 'Kunzey00', 14, 15, 30, 1214, 35.45, 7, 8, 334, 327, 54000, 200),
(12, b'1', 210455399790, 'LordWolF', 8, 5, 14, 706, 6, 4, 8, 271, 298, 50000, 180),
(13, b'1', 184687165357, 'RSLGunner', 14, 19, 29, 1174, 41.25, 7, 8, 290, 292, 49000, 170),
(14, b'1', 206168526023, 'Colby17', 6, 11, 11, 469, 17.95, 3, 8, 272, 275, 47000, 160),
(15, b'1', 38659048679, 'Preston2', 10, 18, 24, 904, 35.05, 7, 7, 200, 211, 39000, 120),
(16, b'1', 158914331484, 'juv', 4, 4, 8, 325, 4.25, 2, 10, 757, 928, 93000, 450),
(17, b'1', 158914080844, 'Boo', 6, 10, 10, 378, 12.7, 3, 10, 888, 914, 92000, 440),
(18, b'1', 111669658674, 'ryan', 12, 18, 20, 771, 27.05, 6, 10, 865, 894, 91000, 440),
(19, b'1', 64429109197, 'YourBroShah', 4, 2, 2, 219, 2, 2, 9, 621, 589, 71000, 310),
(20, b'1', 12885354458, 'Stacey', 10, 13, 19, 811, 25.1, 5, 9, 536, 503, 65000, 270),
(21, b'1', 184684890132, 'CrAxYWolF', 12, 15, 27, 1047, 28.65, 6, 8, 349, 335, 55000, 200),
(22, b'1', 111671510734, 'Trey', 3, 3, 4, 214, 4.05, 2, 8, 330, 305, 51000, 180),
(23, b'1', 64426718184, 'G.O', 6, 15, 17, 593, 32.3, 3, 8, 254, 274, 47000, 160),
(24, b'1', 5940623, 'doobie', 2, 0, 0, 66, 0, 1, 10, 786, 884, 90000, 430),
(25, b'1', 47245181237, 'ICEMAN', 2, 3, 4, 152, 4.25, 1, 9, 575, 534, 67000, 280),
(26, b'1', 176093810621, 'Shutyourmouth', 3, 2, 6, 243, 4.2, 2, 9, 534, 534, 67000, 280),
(27, b'1', 73018553731, 'Shay', 8, 7, 13, 563, 13.05, 4, 9, 491, 391, 58000, 230),
(28, b'1', 188986152974, 'DEAD EYê', 6, 13, 13, 527, 22.3, 3, 8, 286, 293, 49000, 170),
(29, b'0', 115965126773, 'Clint', 4, 3, 7, 332, 4.75, 2, 9, 625, 595, 71000, 310),
(30, b'0', 73019325884, 'XxRSxX', 1, 1, 1, 60, 0.9, 1, 9, 546, 439, 61000, 250),
(31, b'0', 17183384102, 'red beard', 2, 3, 5, 156, 4.8, 1, 10, 727, 623, 73000, 320),
(32, b'0', 90198882520, 'comander dragon', 1, 0, 1, 79, 0, 1, 8, 315, 314, 52000, 190);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `privilege`, `email`) VALUES
(1, 'keiwo', 'f10d7e62bfe9fcbea5f45cdfdb4c1ad06f7e6a5de4b8889d334f9849d8033fac', 'd507fc6e51d85d', 'administrator', 'i_like_something@hotmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
