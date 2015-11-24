-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2015 at 08:32 AM
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
  `clanPoints` int(25) NOT NULL,
  `requiredTrophies` int(25) NOT NULL,
  `members` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `clan_details`
--

INSERT INTO `clan_details` (`id`, `tag`, `name`, `type`, `description`, `locationName`, `clanBadgeImg_s`, `clanBadgeImg_xl`, `warFrequency`, `clanLevel`, `warWins`, `clanPoints`, `requiredTrophies`, `members`) VALUES
(1, '#2J0G90RR', 'Prepare to Die', 'inviteOnly', 'This is a WAR CLAN! We war 3x a week. Rules are posted at preparetodieclan. blogspot. com. We use the App BAND to communicate outside of Clash.  Download the app and ask for an invite code. Join if you like to 3 star!', 'International', 'https://api-assets.clashofclans.com/badges/70/JvFFQDgc-22OzYP9HQPAY372sWDpWXgTHCxuzOa37k0.png', 'https://api-assets.clashofclans.com/badges/200/JvFFQDgc-22OzYP9HQPAY372sWDpWXgTHCxuzOa37k0.png', 'always', 7, 122, 18847, 800, 37),
(2, 'Gold', 'Elixir', 'DE', 'OffenseWeight', 'DefenseWeight', 'TH', 'Name', 'Gold', 0, 0, 0, 0, 0),
(3, '83000', '83000', '390', '801', '775', '10', '??', '89000', 89000, 430, 864, 874, 10),
(4, '74000', '74000', '320', '691', '633', '10', 'Sun', '89000', 89000, 430, 750, 874, 10),
(5, '73000', '73000', '320', '628', '622', '9', 'thor', '87000', 87000, 410, 806, 831, 10),
(6, '73000', '73000', '320', '652', '620', '9', 'Gomballerino', '86000', 86000, 410, 701, 823, 10),
(7, '73000', '73000', '320', '582', '615', '9', '???', '85000', 85000, 400, 742, 803, 10),
(8, '72000', '72000', '310', '613', '603', '9', '??', '82000', 82000, 380, 630, 764, 10),
(9, '71000', '71000', '310', '539', '595', '9', 'movingch??', '80000', 80000, 370, 717, 733, 10),
(10, '71000', '71000', '310', '591', '593', '9', '??', '79000', 79000, 360, 645, 719, 10),
(11, '71000', '71000', '310', '579', '588', '9', 'chalse12', '79000', 79000, 360, 676, 708, 10),
(12, '70000', '70000', '300', '713', '574', '10', 'Jae Min', '78000', 78000, 350, 591, 690, 10),
(13, '70000', '70000', '300', '566', '571', '9', '????', '76000', 76000, 340, 572, 664, 10),
(14, '69000', '69000', '300', '588', '563', '9', '???', '75000', 75000, 330, 605, 652, 10),
(15, '69000', '69000', '300', '581', '561', '9', '???', '75000', 75000, 330, 552, 644, 10),
(16, '69000', '69000', '290', '581', '553', '9', 'captine thor', '74000', 74000, 320, 570, 633, 10),
(17, '69000', '69000', '290', '592', '553', '9', 'legend mafia', '71000', 71000, 310, 599, 590, 9),
(18, '68000', '68000', '290', '569', '544', '9', 'EvilGenius', '71000', 71000, 300, 577, 583, 9),
(19, '66000', '66000', '280', '541', '519', '9', '[^??^]', '70000', 70000, 300, 617, 579, 10),
(20, '66000', '66000', '280', '543', '518', '9', '???', '69000', 69000, 290, 571, 554, 9),
(21, '61000', '61000', '250', '556', '442', '9', 'seul gi choi', '69000', 69000, 290, 563, 551, 9),
(22, '60000', '60000', '240', '537', '424', '9', '?????', '67000', 67000, 280, 547, 531, 9),
(23, '60000', '60000', '230', '676', '413', '10', 'KOBOG', '67000', 67000, 280, 544, 529, 9),
(24, '59000', '59000', '230', '521', '398', '9', 'kyung6', '65000', 65000, 270, 518, 492, 9),
(25, '56000', '56000', '210', '486', '363', '9', '????', '64000', 64000, 260, 506, 484, 9),
(26, '41000', '41000', '130', '258', '221', '8', '???', '64000', 64000, 260, 531, 483, 9),
(27, '31000', '31000', '20', '696', '134', '10', 'ClashOfClans', '63000', 63000, 260, 475, 465, 9),
(28, '', '', '', '14680', '12995', '', '', '', 0, 0, 15469, 16253, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `role`, `expLevel`, `trophies`, `clanRank`, `previousClanRank`, `donations`, `donationsReceived`, `leagueBadgeImg_s`, `leagueBadgeImg_xl`) VALUES
(1, 'juv', 'member', 122, 3296, 1, 1, 738, 60, 'https://api-assets.clashofclans.com/leagues/36/JmmTbspV86xBigM7OP5_SjsEDPuE7oXjZC9aOy8xO3s.png', 'https://api-assets.clashofclans.com/leagues/72/JmmTbspV86xBigM7OP5_SjsEDPuE7oXjZC9aOy8xO3s.png'),
(2, 'ryan', 'coLeader', 132, 2916, 2, 2, 2042, 3654, 'https://api-assets.clashofclans.com/leagues/36/olUfFb1wscIH8hqECAdWbdB6jPm9R8zzEyHIzyBgRXc.png', 'https://api-assets.clashofclans.com/leagues/72/olUfFb1wscIH8hqECAdWbdB6jPm9R8zzEyHIzyBgRXc.png'),
(3, 'doobie', 'member', 129, 2898, 3, 3, 298, 105, 'https://api-assets.clashofclans.com/leagues/36/4wtS1stWZQ-1VJ5HaCuDPfdhTWjeZs_jPar_YPzK6Lg.png', 'https://api-assets.clashofclans.com/leagues/72/4wtS1stWZQ-1VJ5HaCuDPfdhTWjeZs_jPar_YPzK6Lg.png'),
(4, 'Alex', 'admin', 103, 2839, 4, 4, 5, 360, 'https://api-assets.clashofclans.com/leagues/36/4wtS1stWZQ-1VJ5HaCuDPfdhTWjeZs_jPar_YPzK6Lg.png', 'https://api-assets.clashofclans.com/leagues/72/4wtS1stWZQ-1VJ5HaCuDPfdhTWjeZs_jPar_YPzK6Lg.png'),
(5, 'XxRSxX', 'member', 93, 2365, 5, 6, 284, 30, 'https://api-assets.clashofclans.com/leagues/36/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png', 'https://api-assets.clashofclans.com/leagues/72/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png'),
(6, 'June', 'admin', 116, 2317, 6, 5, 144, 104, 'https://api-assets.clashofclans.com/leagues/36/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png', 'https://api-assets.clashofclans.com/leagues/72/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png'),
(7, 'Red Beard', 'member', 121, 2216, 7, 7, 283, 276, 'https://api-assets.clashofclans.com/leagues/36/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png', 'https://api-assets.clashofclans.com/leagues/72/jhP36EhAA9n1ADafdQtCP-ztEAQjoRpY7cT8sU7SW8A.png'),
(8, 'splashtodd', 'coLeader', 117, 2058, 8, 8, 1448, 1403, 'https://api-assets.clashofclans.com/leagues/36/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png', 'https://api-assets.clashofclans.com/leagues/72/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png'),
(9, 'Preston', 'admin', 116, 2036, 9, 9, 2076, 1166, 'https://api-assets.clashofclans.com/leagues/36/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png', 'https://api-assets.clashofclans.com/leagues/72/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png'),
(10, 'SpideyG', 'member', 98, 2017, 10, 10, 688, 450, 'https://api-assets.clashofclans.com/leagues/36/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png', 'https://api-assets.clashofclans.com/leagues/72/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png'),
(11, 'Shutyourmouth', 'coLeader', 98, 1971, 11, 11, 1296, 719, 'https://api-assets.clashofclans.com/leagues/36/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png', 'https://api-assets.clashofclans.com/leagues/72/Hyqco7bHh0Q81xB8mSF_ZhjKnKcTmJ9QEq9QGlsxiKE.png'),
(12, 'Jannetta 13', 'member', 111, 1653, 12, 13, 520, 510, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(13, 'Stacey', 'coLeader', 99, 1635, 13, 12, 851, 660, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(14, 'Kunz Klan', 'leader', 114, 1629, 14, 15, 534, 1061, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(15, 'Bl@ckout', 'coLeader', 106, 1573, 15, 16, 471, 180, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(16, 'Tj deadmouse', 'member', 95, 1566, 16, 18, 237, 564, 'https://api-assets.clashofclans.com/leagues/36/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png', 'https://api-assets.clashofclans.com/leagues/72/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png'),
(17, 'Boo', 'coLeader', 126, 1557, 17, 20, 620, 316, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(18, 'Ambassador U.S.', 'member', 115, 1541, 18, 17, 95, 150, 'https://api-assets.clashofclans.com/leagues/36/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png', 'https://api-assets.clashofclans.com/leagues/72/Y6CveuHmPM_oiOic2Yet0rYL9AFRYW0WA0u2e44-YbM.png'),
(19, 'GiantD0nuts', 'admin', 111, 1477, 19, 19, 810, 745, 'https://api-assets.clashofclans.com/leagues/36/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png', 'https://api-assets.clashofclans.com/leagues/72/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png'),
(20, 'YourBroShah', 'member', 112, 1471, 20, 24, 130, 210, 'https://api-assets.clashofclans.com/leagues/36/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png', 'https://api-assets.clashofclans.com/leagues/72/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png'),
(21, 'Binglbee', 'admin', 92, 1465, 21, 14, 740, 650, 'https://api-assets.clashofclans.com/leagues/36/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png', 'https://api-assets.clashofclans.com/leagues/72/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png'),
(22, 'Clint', 'coLeader', 122, 1457, 22, 21, 889, 360, 'https://api-assets.clashofclans.com/leagues/36/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png', 'https://api-assets.clashofclans.com/leagues/72/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png'),
(23, 'CrAxYWolF', 'admin', 90, 1436, 23, 22, 2830, 1280, 'https://api-assets.clashofclans.com/leagues/36/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png', 'https://api-assets.clashofclans.com/leagues/72/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png'),
(24, 'fCD', 'coLeader', 107, 1380, 24, 23, 3422, 560, 'https://api-assets.clashofclans.com/leagues/36/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png', 'https://api-assets.clashofclans.com/leagues/72/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png'),
(25, 'TastyTodd', 'admin', 93, 1370, 25, 26, 236, 894, 'https://api-assets.clashofclans.com/leagues/36/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png', 'https://api-assets.clashofclans.com/leagues/72/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png'),
(26, 'ICEMAN', 'member', 108, 1350, 26, 25, 70, 90, 'https://api-assets.clashofclans.com/leagues/36/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png', 'https://api-assets.clashofclans.com/leagues/72/vd4Lhz5b2I1P0cLH25B6q63JN3Wt1j2NTMhOYpMPQ4M.png'),
(27, 'Shay', 'admin', 86, 1266, 27, 27, 0, 661, 'https://api-assets.clashofclans.com/leagues/36/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png', 'https://api-assets.clashofclans.com/leagues/72/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png'),
(28, 'Preston2', 'member', 66, 1264, 28, 29, 0, 1290, 'https://api-assets.clashofclans.com/leagues/36/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png', 'https://api-assets.clashofclans.com/leagues/72/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png'),
(29, 'Trey', 'member', 80, 1258, 29, 28, 0, 1060, 'https://api-assets.clashofclans.com/leagues/36/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png', 'https://api-assets.clashofclans.com/leagues/72/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png'),
(30, 'Colby17', 'member', 68, 1240, 30, 30, 147, 1707, 'https://api-assets.clashofclans.com/leagues/36/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png', 'https://api-assets.clashofclans.com/leagues/72/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png'),
(31, 'BallisLife', 'member', 77, 1214, 31, 31, 0, 50, 'https://api-assets.clashofclans.com/leagues/36/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png', 'https://api-assets.clashofclans.com/leagues/72/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png'),
(32, 'G.O', 'member', 69, 1163, 32, 32, 18, 570, 'https://api-assets.clashofclans.com/leagues/36/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png', 'https://api-assets.clashofclans.com/leagues/72/nvrBLvCK10elRHmD1g9w5UU1flDRMhYAojMB2UbYfPs.png'),
(33, 'comander dragon', 'admin', 79, 1091, 33, 33, 205, 551, 'https://api-assets.clashofclans.com/leagues/36/8OhXcwDJkenBH2kPH73eXftFOpHHRF-b32n0yrTqC44.png', 'https://api-assets.clashofclans.com/leagues/72/8OhXcwDJkenBH2kPH73eXftFOpHHRF-b32n0yrTqC44.png'),
(34, 'LordWolF', 'member', 73, 1043, 34, 35, 7, 167, 'https://api-assets.clashofclans.com/leagues/36/8OhXcwDJkenBH2kPH73eXftFOpHHRF-b32n0yrTqC44.png', 'https://api-assets.clashofclans.com/leagues/72/8OhXcwDJkenBH2kPH73eXftFOpHHRF-b32n0yrTqC44.png'),
(35, 'Kunzey00', 'admin', 84, 1028, 35, 34, 228, 375, 'https://api-assets.clashofclans.com/leagues/36/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png', 'https://api-assets.clashofclans.com/leagues/72/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png'),
(36, 'Dave2?7?', 'member', 81, 978, 36, 36, 30, 0, 'https://api-assets.clashofclans.com/leagues/36/8OhXcwDJkenBH2kPH73eXftFOpHHRF-b32n0yrTqC44.png', 'https://api-assets.clashofclans.com/leagues/72/8OhXcwDJkenBH2kPH73eXftFOpHHRF-b32n0yrTqC44.png'),
(37, 'RSLGunner', 'admin', 73, 952, 37, 37, 1, 350, 'https://api-assets.clashofclans.com/leagues/36/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png', 'https://api-assets.clashofclans.com/leagues/72/e--YMyIexEQQhE4imLoJcwhYn6Uy8KqlgyY3_kFV6t4.png');

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
