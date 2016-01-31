-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2016 at 04:15 PM
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
(1, '#90GLL8R0', 'Dragon Hoard', 'inviteOnly', 'ADULT CLAN FOUNDED 2/6/15 - WR 127/23/3 good war so far mach 10 keep that **** up!', 'United States', 'https://api-assets.clashofclans.com/badges/70/UAEwhGSHCHZngYhDOWR2M_PP2SOwSmzIx1-dccK29FA.png', 'https://api-assets.clashofclans.com/badges/200/UAEwhGSHCHZngYhDOWR2M_PP2SOwSmzIx1-dccK29FA.png', 'always', 8, 127, 20, 5, 23087, 1200, 44);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=45 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `role`, `expLevel`, `trophies`, `clanRank`, `previousClanRank`, `donations`, `donationsReceived`, `leagueBadgeImg_s`, `leagueBadgeImg_xl`) VALUES
(1, 'WalterSobchak', 'coLeader', 107, 3196, 1, 1, 2782, 3283, 'https://api-assets.clashofclans.com/leagues/36/JmmTbspV86xBigM7OP5_SjsEDPuE7oXjZC9aOy8xO3s.png', 'https://api-assets.clashofclans.com/leagues/72/JmmTbspV86xBigM7OP5_SjsEDPuE7oXjZC9aOy8xO3s.png'),
(2, 'Boo', 'coLeader', 133, 3031, 2, 2, 673, 180, 'https://api-assets.clashofclans.com/leagues/36/olUfFb1wscIH8hqECAdWbdB6jPm9R8zzEyHIzyBgRXc.png', 'https://api-assets.clashofclans.com/leagues/72/olUfFb1wscIH8hqECAdWbdB6jPm9R8zzEyHIzyBgRXc.png'),
(3, 'Alex', 'admin', 105, 2902, 3, 3, 192, 465, 'https://api-assets.clashofclans.com/leagues/36/4wtS1stWZQ-1VJ5HaCuDPfdhTWjeZs_jPar_YPzK6Lg.png', 'https://api-assets.clashofclans.com/leagues/72/4wtS1stWZQ-1VJ5HaCuDPfdhTWjeZs_jPar_YPzK6Lg.png'),
(4, 'Raiders', 'coLeader', 106, 2753, 4, 4, 814, 1348, 'https://api-assets.clashofclans.com/leagues/36/4wtS1stWZQ-1VJ5HaCuDPfdhTWjeZs_jPar_YPzK6Lg.png', 'https://api-assets.clashofclans.com/leagues/72/4wtS1stWZQ-1VJ5HaCuDPfdhTWjeZs_jPar_YPzK6Lg.png'),
(5, 'fCD', 'admin', 109, 2608, 5, 5, 344, 656, 'https://api-assets.clashofclans.com/leagues/36/pSXfKvBKSgtvfOY3xKkgFaRQi0WcE28s3X35ywbIluY.png', 'https://api-assets.clashofclans.com/leagues/72/pSXfKvBKSgtvfOY3xKkgFaRQi0WcE28s3X35ywbIluY.png'),
(6, 'Ehud', 'admin', 103, 2590, 6, 6, 2404, 2219, 'https://api-assets.clashofclans.com/leagues/36/pSXfKvBKSgtvfOY3xKkgFaRQi0WcE28s3X35ywbIluY.png', 'https://api-assets.clashofclans.com/leagues/72/pSXfKvBKSgtvfOY3xKkgFaRQi0WcE28s3X35ywbIluY.png'),
(7, 'TP01', 'coLeader', 132, 2518, 7, 7, 52, 231, 'https://api-assets.clashofclans.com/leagues/36/kSfTyNNVSvogX3dMvpFUTt72VW74w6vEsEFuuOV4osQ.png', 'https://api-assets.clashofclans.com/leagues/72/kSfTyNNVSvogX3dMvpFUTt72VW74w6vEsEFuuOV4osQ.png'),
(8, 'Arcticc0', 'admin', 134, 2455, 8, 9, 2306, 2735, 'https://api-assets.clashofclans.com/leagues/36/kSfTyNNVSvogX3dMvpFUTt72VW74w6vEsEFuuOV4osQ.png', 'https://api-assets.clashofclans.com/leagues/72/kSfTyNNVSvogX3dMvpFUTt72VW74w6vEsEFuuOV4osQ.png'),
(9, 'DV8 2014', 'coLeader', 115, 2452, 9, 8, 651, 922, 'https://api-assets.clashofclans.com/leagues/36/kSfTyNNVSvogX3dMvpFUTt72VW74w6vEsEFuuOV4osQ.png', 'https://api-assets.clashofclans.com/leagues/72/kSfTyNNVSvogX3dMvpFUTt72VW74w6vEsEFuuOV4osQ.png'),
(10, 'GiantD0nuts', 'coLeader', 114, 2386, 10, 13, 2761, 924, 'https://api-assets.clashofclans.com/leagues/36/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png', 'https://api-assets.clashofclans.com/leagues/72/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png'),
(11, 'davi', 'admin', 97, 2376, 11, 12, 861, 2772, 'https://api-assets.clashofclans.com/leagues/36/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png', 'https://api-assets.clashofclans.com/leagues/72/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png'),
(12, 'oli', 'coLeader', 105, 2366, 12, 11, 2981, 4567, 'https://api-assets.clashofclans.com/leagues/36/kSfTyNNVSvogX3dMvpFUTt72VW74w6vEsEFuuOV4osQ.png', 'https://api-assets.clashofclans.com/leagues/72/kSfTyNNVSvogX3dMvpFUTt72VW74w6vEsEFuuOV4osQ.png'),
(13, 'Kunz Klan', 'coLeader', 114, 2357, 13, 10, 98, 524, 'https://api-assets.clashofclans.com/leagues/36/kSfTyNNVSvogX3dMvpFUTt72VW74w6vEsEFuuOV4osQ.png', 'https://api-assets.clashofclans.com/leagues/72/kSfTyNNVSvogX3dMvpFUTt72VW74w6vEsEFuuOV4osQ.png'),
(14, 'KING ME', 'admin', 85, 2317, 14, 14, 691, 889, 'https://api-assets.clashofclans.com/leagues/36/kSfTyNNVSvogX3dMvpFUTt72VW74w6vEsEFuuOV4osQ.png', 'https://api-assets.clashofclans.com/leagues/72/kSfTyNNVSvogX3dMvpFUTt72VW74w6vEsEFuuOV4osQ.png'),
(15, 'reckless', 'coLeader', 109, 2260, 15, 16, 4859, 3812, 'https://api-assets.clashofclans.com/leagues/36/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png', 'https://api-assets.clashofclans.com/leagues/72/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png'),
(16, 'Preston', 'admin', 116, 2253, 16, 15, 212, 662, 'https://api-assets.clashofclans.com/leagues/36/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png', 'https://api-assets.clashofclans.com/leagues/72/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png'),
(17, 'TastyTodd', 'admin', 98, 2194, 17, 18, 324, 1747, 'https://api-assets.clashofclans.com/leagues/36/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png', 'https://api-assets.clashofclans.com/leagues/72/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png'),
(18, 'zechariah', 'member', 87, 2185, 18, 19, 97, 36, 'https://api-assets.clashofclans.com/leagues/36/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png', 'https://api-assets.clashofclans.com/leagues/72/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png'),
(19, 'pat&ash', 'admin', 94, 2163, 19, 21, 21, 0, 'https://api-assets.clashofclans.com/leagues/36/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png', 'https://api-assets.clashofclans.com/leagues/72/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png'),
(20, 'G.O', 'coLeader', 73, 2141, 20, 20, 57, 2101, 'https://api-assets.clashofclans.com/leagues/36/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png', 'https://api-assets.clashofclans.com/leagues/72/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png'),
(21, 'Red Beard', 'admin', 123, 2140, 21, 22, 1035, 674, 'https://api-assets.clashofclans.com/leagues/36/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png', 'https://api-assets.clashofclans.com/leagues/72/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png'),
(22, 'ryan', 'coLeader', 136, 2063, 22, 23, 1617, 108, 'https://api-assets.clashofclans.com/leagues/36/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png', 'https://api-assets.clashofclans.com/leagues/72/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png'),
(23, 'mein', 'coLeader', 108, 2045, 23, 25, 147, 207, 'https://api-assets.clashofclans.com/leagues/36/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png', 'https://api-assets.clashofclans.com/leagues/72/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png'),
(24, 'Mike Hunt', 'coLeader', 129, 1947, 24, 28, 683, 332, 'https://api-assets.clashofclans.com/leagues/36/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png', 'https://api-assets.clashofclans.com/leagues/72/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png'),
(25, 'dwattz', 'coLeader', 82, 1924, 25, 27, 116, 145, 'https://api-assets.clashofclans.com/leagues/36/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png', 'https://api-assets.clashofclans.com/leagues/72/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png'),
(26, 'lj', 'member', 136, 1885, 26, 0, 155, 72, 'https://api-assets.clashofclans.com/leagues/36/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png', 'https://api-assets.clashofclans.com/leagues/72/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png'),
(27, 'Mickey', 'admin', 77, 1849, 27, 30, 908, 1231, 'https://api-assets.clashofclans.com/leagues/36/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png', 'https://api-assets.clashofclans.com/leagues/72/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png'),
(28, 'Uhtred', 'admin', 140, 1841, 28, 33, 4275, 3739, 'https://api-assets.clashofclans.com/leagues/36/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png', 'https://api-assets.clashofclans.com/leagues/72/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png'),
(29, 'Brian', 'coLeader', 92, 1789, 29, 31, 17305, 796, 'https://api-assets.clashofclans.com/leagues/36/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png', 'https://api-assets.clashofclans.com/leagues/72/CorhMY9ZmQvqXTZ4VYVuUgPNGSHsO0cEXEL5WYRmB2Y.png'),
(30, 'DROCK', 'admin', 93, 1740, 30, 34, 117, 272, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(31, 'hangcrazy', 'coLeader', 72, 1698, 31, 35, 954, 643, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(32, 'lj2', 'leader', 101, 1695, 32, 37, 301, 4054, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(33, 'YourBroShah', 'member', 113, 1649, 33, 36, 38, 90, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(34, 'King_Nate', 'admin', 80, 1585, 34, 41, 603, 338, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(35, 'Stacey', 'admin', 101, 1578, 35, 40, 73, 1081, 'https://api-assets.clashofclans.com/leagues/36/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png', 'https://api-assets.clashofclans.com/leagues/72/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png'),
(36, 'Cross', 'coLeader', 86, 1578, 36, 38, 1082, 977, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(37, 'Bean Dip', 'admin', 74, 1460, 37, 43, 1105, 391, 'https://api-assets.clashofclans.com/leagues/36/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png', 'https://api-assets.clashofclans.com/leagues/72/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png'),
(38, 'Lord Joel', 'member', 63, 1453, 38, 0, 0, 0, 'https://api-assets.clashofclans.com/leagues/36/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png', 'https://api-assets.clashofclans.com/leagues/72/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png'),
(39, 'Binglbee', 'admin', 100, 1440, 39, 45, 1253, 1119, 'https://api-assets.clashofclans.com/leagues/36/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png', 'https://api-assets.clashofclans.com/leagues/72/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png'),
(40, 'ehud', 'admin', 53, 1366, 40, 46, 0, 200, 'https://api-assets.clashofclans.com/leagues/36/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png', 'https://api-assets.clashofclans.com/leagues/72/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png'),
(41, 'DV8 2015', 'admin', 54, 1343, 41, 48, 0, 620, 'https://api-assets.clashofclans.com/leagues/36/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png', 'https://api-assets.clashofclans.com/leagues/72/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png'),
(42, 'Mike Hawk', 'member', 48, 1321, 42, 47, 0, 20, 'https://api-assets.clashofclans.com/leagues/36/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png', 'https://api-assets.clashofclans.com/leagues/72/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png'),
(43, 'TP03', 'admin', 76, 1203, 43, 49, 406, 2615, 'https://api-assets.clashofclans.com/leagues/36/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png', 'https://api-assets.clashofclans.com/leagues/72/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png'),
(44, 'Preston', 'coLeader', 47, 1127, 44, 50, 0, 200, 'https://api-assets.clashofclans.com/leagues/36/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png', 'https://api-assets.clashofclans.com/leagues/72/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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

-- --------------------------------------------------------

--
-- Table structure for table `war_events`
--

CREATE TABLE IF NOT EXISTS `war_events` (
  `playerId` bigint(20) NOT NULL,
  `warId` int(11) NOT NULL,
  `attackId` int(11) NOT NULL,
  `isAttack` bit(1) NOT NULL COMMENT '1: attack 0: defense',
  `damage` int(11) NOT NULL,
  `starsWon` int(11) NOT NULL,
  `starsEarned` int(11) NOT NULL,
  `enemyName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `enemyClan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `myRank` int(11) NOT NULL,
  `enemyRank` int(11) NOT NULL,
  `myTH` int(11) NOT NULL,
  `enemyTH` int(11) NOT NULL,
  `rating1` float NOT NULL COMMENT 'paddyj''s algorithm based on rank',
  `rating2` float NOT NULL COMMENT 'new algorithm based on weights',
  `myWeight` int(11) NOT NULL COMMENT 'player''s offense weight if isAttack, else defense weight',
  `enemyWeight` int(11) NOT NULL COMMENT 'enemy''s defense weight if isAttack, else offense weight'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
