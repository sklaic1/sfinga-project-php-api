-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 08, 2021 at 02:34 PM
-- Server version: 5.7.30-0ubuntu0.18.04.1-log
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sfinga`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People\'s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People\'s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'ES', 'Spain'),
(203, 'LK', 'Sri Lanka'),
(204, 'SH', 'St. Helena'),
(205, 'PM', 'St. Pierre and Miquelon'),
(206, 'SD', 'Sudan'),
(207, 'SR', 'Suriname'),
(208, 'SJ', 'Svalbard and Jan Mayen Islands'),
(209, 'SZ', 'Swaziland'),
(210, 'SE', 'Sweden'),
(211, 'CH', 'Switzerland'),
(212, 'SY', 'Syrian Arab Republic'),
(213, 'TW', 'Taiwan'),
(214, 'TJ', 'Tajikistan'),
(215, 'TZ', 'Tanzania, United Republic of'),
(216, 'TH', 'Thailand'),
(217, 'TG', 'Togo'),
(218, 'TK', 'Tokelau'),
(219, 'TO', 'Tonga'),
(220, 'TT', 'Trinidad and Tobago'),
(221, 'TN', 'Tunisia'),
(222, 'TR', 'Turkey'),
(223, 'TM', 'Turkmenistan'),
(224, 'TC', 'Turks and Caicos Islands'),
(225, 'TV', 'Tuvalu'),
(226, 'UG', 'Uganda'),
(227, 'UA', 'Ukraine'),
(228, 'AE', 'United Arab Emirates'),
(229, 'GB', 'United Kingdom'),
(230, 'US', 'United States'),
(231, 'UM', 'United States minor outlying islands'),
(232, 'UY', 'Uruguay'),
(233, 'UZ', 'Uzbekistan'),
(234, 'VU', 'Vanuatu'),
(235, 'VA', 'Vatican City State'),
(236, 'VE', 'Venezuela'),
(237, 'VN', 'Vietnam'),
(238, 'VG', 'Virgin Islands (British)'),
(239, 'VI', 'Virgin Islands (U.S.)'),
(240, 'WF', 'Wallis and Futuna Islands'),
(241, 'EH', 'Western Sahara'),
(242, 'YE', 'Yemen'),
(243, 'ZR', 'Zaire'),
(244, 'ZM', 'Zambia'),
(245, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `glad_auth`
--

DROP TABLE IF EXISTS `glad_auth`;
CREATE TABLE `glad_auth` (
  `user` char(32) NOT NULL,
  `pass` char(32) NOT NULL,
  `dozvole` int(11) NOT NULL DEFAULT '1',
  `ID` char(32) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `IP` char(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `glad_auth`
--

INSERT INTO `glad_auth` (`user`, `pass`, `dozvole`, `ID`, `time`, `IP`) VALUES
('Micuz', 'c5adb618bca64b2b15ed9202a47a71e8', 2, '1fe097f5833ff919be383a53c87fd72f', '2021-06-05 23:19:53', '172.17.0.1'),
('angel0000', '237391cf8685346ec9124eac31cb77fd', 2, '', '2012-07-09 15:59:20', '78.0.255.224'),
('mali_macor', 'd6e0ba092fac8d26f8dc3a9340ca740f', 2, '', '2010-10-28 05:34:23', '78.0.233.154'),
('KirkNosepicker', '9971281e43abd27de85d1e916405567d', 2, '', '2011-11-28 23:51:06', '89.164.137.20'),
('Her3tiC', 'e2fcb9188393a449a91cbd5dac7e3851', 2, '', '2010-06-04 04:47:50', '89.172.28.75');

-- --------------------------------------------------------

--
-- Table structure for table `glad_don`
--

DROP TABLE IF EXISTS `glad_don`;
CREATE TABLE `glad_don` (
  `donacija` datetime NOT NULL,
  `zgrada` char(30) NOT NULL,
  `vri_zgr` int(11) NOT NULL,
  `man_dan` char(30) DEFAULT NULL,
  `don_dan` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `glad_don`
--

INSERT INTO `glad_don` (`donacija`, `zgrada`, `vri_zgr`, `man_dan`, `don_dan`) VALUES
('2010-01-03 18:00:30', 'Treniranje', 14447434, '', '2010-01-27 18:00:31'),
('2010-09-25 13:51:47', 'Treniranje', 14447434, '', '2010-10-19 13:51:48'),
('2010-11-06 15:59:43', 'Doktorova vila', 3634699, '20.09.2012', '2010-11-20 15:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `glad_igraci`
--

DROP TABLE IF EXISTS `glad_igraci`;
CREATE TABLE `glad_igraci` (
  `id` int(6) NOT NULL,
  `ime` char(50) NOT NULL,
  `lvl` int(3) NOT NULL,
  `stat` int(2) NOT NULL DEFAULT '2',
  `dugovi` int(11) NOT NULL DEFAULT '0',
  `dato` int(11) NOT NULL DEFAULT '0',
  `termin` datetime DEFAULT NULL,
  `ukupno` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `glad_igraci`
--

INSERT INTO `glad_igraci` (`id`, `ime`, `lvl`, `stat`, `dugovi`, `dato`, `termin`, `ukupno`) VALUES
(87082, 'Micuz', 97, 2, -1855040, 0, '2010-10-19 22:03:41', 439040),
(41477, 'angel0000', 97, 2, -5618189, 0, '2010-10-19 20:44:33', 439040),
(30942, 'samexis', 90, 2, -888948, 0, '2010-10-19 20:41:03', 407680),
(58937, 'Her3tiC', 84, 2, -652800, 0, '2010-02-07 18:22:29', 380800),
(78212, 'samaelII', 96, 2, -4959360, 0, '2010-10-19 20:40:51', 434560),
(79424, 'Godar', 85, 2, -708960, 0, '2010-10-19 17:14:21', 385280),
(81113, '-MisterX-', 92, 2, -285760, 0, '2010-10-19 21:58:59', 416640),
(92545, '-WEST-', 74, 2, -202489, 0, '2010-10-19 17:11:05', 336000),
(75448, ')HAMZA(', 52, 0, 459920, 0, '2010-02-07 18:15:21', 0),
(78808, 'KirkNosepicker', 85, 2, -113978, 0, '2010-10-19 17:13:09', 385280),
(47817, 'Walek_btf', 88, 0, 531360, 0, NULL, 635040),
(58397, 'ruffryder', 67, 0, 771040, 0, NULL, 0),
(72940, '.VipeR.', 88, 2, 25247, 0, '2010-10-19 20:40:01', 398720),
(79786, '_Connan_', 81, 0, 666400, 0, '2010-02-07 21:03:41', 0),
(82775, 'Baez94', 73, 0, 0, 0, '2010-02-07 21:29:50', 568320),
(89319, 'beyt', 61, 0, 40986, 0, '2010-02-07 18:28:13', 0),
(91552, 'beyt_Junior', 51, 0, 0, 0, NULL, 399360),
(93191, 'nyla', 82, 2, -31680, 0, '2010-10-19 17:13:14', 371840),
(78809, 'Vagrant', 48, 2, 0, 0, '2010-10-19 19:30:19', 219520),
(41555, '=Skorpion=', 85, 0, 0, 0, NULL, 0),
(87615, 'Gimli_Pepe', 53, 0, -42596, 0, '2010-02-07 11:24:49', 0),
(90547, 'Shvabo', 46, 0, 0, 0, NULL, 0),
(23847, 'gladiator_mo', 58, 0, 520000, 0, NULL, 0),
(89307, 'mujaga', 87, 2, -1081840, 0, '2010-10-19 20:42:50', 394240),
(93889, 'Gladijator_HR', 20, 0, -76680, 0, NULL, 0),
(35277, 'jole03', 58, 0, 246790, 0, NULL, 0),
(84533, 'Zijan', 59, 0, 13465, 0, NULL, 0),
(96640, 'toma22', 33, 0, 125180, 0, '2010-10-19 18:01:07', 587520),
(96683, 'Lord-Draconius', 61, 2, -30717, 0, '2010-10-19 20:09:18', 277760),
(18495, 'Thc_Mafia', 86, 2, 83869, 0, '2010-10-19 20:57:38', 389760),
(26490, '-Zare-', 94, 2, -149080, 0, '2010-10-18 04:11:05', 425600),
(29205, 'Al_Rashid', 81, 2, -206735, 0, '2010-10-19 17:19:38', 367360),
(47305, '-=DeMo=-', 95, 0, 0, 0, NULL, 737280),
(43438, 'aquarius', 88, 2, 0, 0, NULL, 398720),
(95084, 'B.e.h.e.m.o.t.H', 78, 0, 0, 0, NULL, 606720),
(97035, 'Xilar85', 16, 2, -130560, 0, NULL, 76160),
(98575, 'Don_Master', 54, 2, -480, 0, '2010-10-19 20:19:19', 246400),
(97055, 'Isis', 25, 2, -138240, 0, NULL, 116480),
(85343, '_=crOmaFiA=_', 35, 2, 0, 0, NULL, 161280),
(25963, 'glavonja1', 81, 0, 0, 0, NULL, 1338240),
(94418, 'Blacksquad', 67, 0, 0, 0, NULL, 1131520),
(82743, 'vk12321', 14, 2, 0, 0, NULL, 67200),
(92214, 'Kiko_14', 20, 2, 0, 0, NULL, 94080),
(92231, 'traviannn', 34, 2, 0, 0, NULL, 156800),
(66991, 'Don_Spidey', 86, 0, -194797, 0, NULL, 1447680),
(27525, 't0ni', 71, 0, -410130, 0, NULL, 1244160),
(79315, 'NisamGay', 87, 1, -501288, 0, NULL, 1492480),
(87322, 'rex_croatorum', 48, 2, -294748, 0, NULL, 219520),
(99579, 'KaBoooM', 52, 2, -439402, 0, NULL, 237440);

-- --------------------------------------------------------

--
-- Table structure for table `glad_zgrade`
--

DROP TABLE IF EXISTS `glad_zgrade`;
CREATE TABLE `glad_zgrade` (
  `naziv` char(30) NOT NULL,
  `lvl` int(3) NOT NULL,
  `zlato` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `glad_zgrade`
--

INSERT INTO `glad_zgrade` (`naziv`, `lvl`, `zlato`) VALUES
('Forum Gladiatora', 10, 19218989),
('Banka', 4, 1625363),
('Doktorova vila', 6, 3634699),
('Dvorana ratnih heroja', 11, 3048532),
('Knjiznica', 9, 1953125),
('Negotijum X', 5, 1816385),
('Panteon', 9, 715541),
('Parna kupelj', 8, 4240372),
('Saveznicki market', 7, 1011677),
('Skladiste', 2, 2761448),
('Treniranje', 10, 22184917);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `picture` varchar(255) NOT NULL,
  `archive` enum('Y','N') NOT NULL,
  `public` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `date`, `picture`, `archive`, `public`) VALUES
(4, 'Donacije za Treniranje zavrÅ¡ene.', 'Evo donacija za dizanje Treniranje su odradene, ovdje su podaci tko je koliko dao u odnosu na ono sto je trebao:\r\n\r\n[table][tr][td]Igrac[/td][td]Level[/td][td]Dnevni iznos[/td][td]Razlika u ocekivanoj donaciji[/td][/tr]\r\n[tr][td]-MisterX-[/td][td]92[/td][td]29.760[/td][td][color=red]-1.202.240[/color][/td][/tr]\r\n[tr][td]-WEST-[/td][td]74[/td][td]24.000[/td][td][color=red]-997.511[/color][/td][/tr]\r\n[tr][td]-Zare-[/td][td]94[/td][td]30.400[/td][td][color=red]-1.370.920[/color][/td][/tr]\r\n[tr][td].VipeR.[/td][td]88[/td][td]28.480[/td][td][color=red]-1.449.247[/color][/td][/tr]\r\n[tr][td]Al_Rashid[/td][td]81[/td][td]26.240[/td][td][color=red]-1.105.265[/color][/td][/tr]\r\n[tr][td]angel0000[/td][td]97[/td][td]31.360[/td][td][color=green]4.050.189[/color][/td][/tr]\r\n[tr][td]aquarius[/td][td]88[/td][td]28.480[/td][td][color=red]-1.424.000[/color][/td][/tr]\r\n[tr][td]Don_Master[/td][td]54[/td][td]17.600[/td][td][color=red]-879.520[/color][/td][/tr]\r\n[tr][td]Godar[/td][td]85[/td][td]27.520[/td][td][color=red]-667.040[/color][/td][/tr]\r\n[tr][td]Her3tiC[/td][td]84[/td][td]27.200[/td][td][color=red]-707.200[/color][/td][/tr]\r\n[tr][td]Isis[/td][td]25[/td][td]8.320[/td][td][color=red]-277.760[/color][/td][/tr]\r\n[tr][td]KaBoooM[/td][td]52[/td][td]16.960[/td][td][color=red]-408.598[/color][/td][/tr]\r\n[tr][td]Kiko_14[/td][td]20[/td][td]6.720[/td][td][color=red]-336.000[/color][/td][/tr]\r\n[tr][td]KirkNosepicker[/td][td]85[/td][td]27.520[/td][td][color=red]-1.262.022[/color][/td][/tr]\r\n[tr][td]Lord-Draconius[/td][td]61[/td][td]19.840[/td][td][color=red]-961.283[/color][/td][/tr]\r\n[tr][td]Micuz[/td][td]97[/td][td]31.360[/td][td][color=green]287.040[/color][/td][/tr]\r\n[tr][td]mujaga[/td][td]87[/td][td]28.160[/td][td][color=red]-326.160[/color][/td][/tr]\r\n[tr][td]nyla[/td][td]82[/td][td]26.560[/td][td][color=red]-1.296.320[/color][/td][/tr]\r\n[tr][td]rex_croatorum[/td][td]48[/td][td]15.680[/td][td][color=red]-489.252[/color][/td][/tr]\r\n[tr][td]samaelII[/td][td]96[/td][td]31.040[/td][td][color=green]3.407.360[/color][/td][/tr]\r\n[tr][td]samexis[/td][td]90[/td][td]29.120[/td][td][color=red]-567.052[/color][/td][/tr]\r\n[tr][td]Thc_Mafia[/td][td]86[/td][td]27.840[/td][td][color=red]-1.475.869[/color][/td][/tr]\r\n[tr][td]traviannn[/td][td]34[/td][td]11.200[/td][td][color=red]-560.000[/color][/td][/tr]\r\n[tr][td]Vagrant[/td][td]48[/td][td]15.680[/td][td][color=red]-784.000[/color][/td][/tr]\r\n[tr][td]vk12321[/td][td]14[/td][td]4.800[/td][td][color=red]-240.000[/color][/td][/tr]\r\n[tr][td]Xilar85[/td][td]16[/td][td]5.440[/td][td][color=red]-141.440[/color][/td][/tr]\r\n[tr][td]_=crOmaFiA=_[/td][td]35[/td][td]11.520[/td][td][color=red]-576.000[/color][/td][/tr]\r\n[/table]\r\n\r\nSvi koji su u minusu, ce za slijedeci put morati dati iznos koji je uvecan za dug koji nisu sad dali.\r\nOni koji su dali vise, njima se zahvaljujemo.', '2021-06-07 11:50:42', '4-5.png', 'N', 0),
(5, 'Primanje novih Älanova', 'Za primanje novih Älanova obratite se administratorima na forumu.', '2021-06-07 13:05:52', '5-14.jpg', 'N', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` char(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `archive` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `country`, `date`, `archive`) VALUES
(19, 'Admin', 'Sfinga saveza', '', 'admin', '$2y$12$l3P4Ni/hD7sffAuSi6LtIutsapisnUU/jrDkPQPncg2BJF1DIOw.W', 'HR', '2021-06-06 20:02:05', 'N'),
(20, 'Silvio', 'Klaic', 'info@sklaic.info', 'sklaic', '$2y$12$xycyiigqGbjHLA90/c4oiu0ljqjnRJms/CNGQr7sL8pkvyHJfaVSe', 'BM', '2021-06-06 16:17:13', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `glad_auth`
--
ALTER TABLE `glad_auth`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `glad_don`
--
ALTER TABLE `glad_don`
  ADD PRIMARY KEY (`donacija`);

--
-- Indexes for table `glad_igraci`
--
ALTER TABLE `glad_igraci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `glad_zgrade`
--
ALTER TABLE `glad_zgrade`
  ADD PRIMARY KEY (`naziv`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
