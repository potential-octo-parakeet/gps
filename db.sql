-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 12, 2012 at 02:23 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gps`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `human_id` int(11) NOT NULL,
  `address1` varchar(200) NOT NULL,
  `address2` varchar(128) NOT NULL,
  `city` varchar(128) NOT NULL,
  `state` varchar(128) NOT NULL,
  `postal` varchar(9) NOT NULL,
  `country` varchar(44) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `zoom` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `human_id` (`human_id`,`address1`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `human_id`, `address1`, `address2`, `city`, `state`, `postal`, `country`, `lat`, `lng`, `zoom`) VALUES
(1, 3, '', '', '', 'Bohol', '', 'Philippines', 0, 0, 0),
(2, 3, '', '', '', 'Bohol', '', 'Philippines', 0, 0, 0),
(3, 3, '', '', '', 'Bohol', '', 'Philippines', 0, 0, 0),
(4, 3, 'Base 1, Workplace 2', '', 'Calape', 'Bohol', '6328', 'Philippines', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `short_name` varchar(2) NOT NULL,
  `long_name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `short_name_2` (`short_name`),
  KEY `short_name` (`short_name`,`long_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=237 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `short_name`, `long_name`) VALUES
(5, 'AD', 'Andorra'),
(221, 'AE', 'United Arab Emirates'),
(1, 'AF', 'Afghanistan'),
(9, 'AG', 'Antigua and Barbuda'),
(7, 'AI', 'Anguilla'),
(2, 'AL', 'Albania'),
(11, 'AM', 'Armenia'),
(148, 'AN', 'Netherlands Antilles'),
(6, 'AO', 'Angola'),
(8, 'AQ', 'Antarctica'),
(10, 'AR', 'Argentina'),
(4, 'AS', 'American Samoa'),
(14, 'AT', 'Austria'),
(13, 'AU', 'Australia'),
(12, 'AW', 'Aruba'),
(15, 'AZ', 'Azerbaijan'),
(27, 'BA', 'Bosnia and Herzegovina'),
(19, 'BB', 'Barbados'),
(18, 'BD', 'Bangladesh'),
(21, 'BE', 'Belgium'),
(34, 'BF', 'Burkina Faso'),
(33, 'BG', 'Bulgaria'),
(17, 'BH', 'Bahrain'),
(35, 'BI', 'Burundi'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(32, 'BN', 'Brunei Darussalam'),
(26, 'BO', 'Bolivia'),
(30, 'BR', 'Brazil'),
(16, 'BS', 'Bahamas'),
(25, 'BT', 'Bhutan'),
(29, 'BV', 'Bouvet Island'),
(28, 'BW', 'Botswana'),
(20, 'BY', 'Belarus'),
(22, 'BZ', 'Belize'),
(38, 'CA', 'Canada'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(50, 'CD', 'Congo, the Democratic Republic of the'),
(41, 'CF', 'Central African Republic'),
(49, 'CG', 'Congo'),
(203, 'CH', 'Switzerland'),
(51, 'CK', 'Cook Islands'),
(43, 'CL', 'Chile'),
(37, 'CM', 'Cameroon'),
(44, 'CN', 'China'),
(47, 'CO', 'Colombia'),
(52, 'CR', 'Costa Rica'),
(186, 'CS', 'Serbia and Montenegro'),
(54, 'CU', 'Cuba'),
(39, 'CV', 'Cape Verde'),
(45, 'CX', 'Christmas Island'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(79, 'DE', 'Germany'),
(58, 'DJ', 'Djibouti'),
(57, 'DK', 'Denmark'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(3, 'DZ', 'Algeria'),
(61, 'EC', 'Ecuador'),
(66, 'EE', 'Estonia'),
(62, 'EG', 'Egypt'),
(233, 'EH', 'Western Sahara'),
(65, 'ER', 'Eritrea'),
(196, 'ES', 'Spain'),
(67, 'ET', 'Ethiopia'),
(71, 'FI', 'Finland'),
(70, 'FJ', 'Fiji'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(136, 'FM', 'Micronesia, Federated States of'),
(69, 'FO', 'Faroe Islands'),
(72, 'FR', 'France'),
(76, 'GA', 'Gabon'),
(222, 'GB', 'United Kingdom'),
(84, 'GD', 'Grenada'),
(78, 'GE', 'Georgia'),
(73, 'GF', 'French Guiana'),
(80, 'GH', 'Ghana'),
(81, 'GI', 'Gibraltar'),
(83, 'GL', 'Greenland'),
(77, 'GM', 'Gambia'),
(88, 'GN', 'Guinea'),
(85, 'GP', 'Guadeloupe'),
(64, 'GQ', 'Equatorial Guinea'),
(82, 'GR', 'Greece'),
(195, 'GS', 'South Georgia and the South Sandwich Islands'),
(87, 'GT', 'Guatemala'),
(86, 'GU', 'Guam'),
(89, 'GW', 'Guinea-Bissau'),
(90, 'GY', 'Guyana'),
(95, 'HK', 'Hong Kong'),
(92, 'HM', 'Heard Island and Mcdonald Islands'),
(94, 'HN', 'Honduras'),
(53, 'HR', 'Croatia'),
(91, 'HT', 'Haiti'),
(96, 'HU', 'Hungary'),
(99, 'ID', 'Indonesia'),
(102, 'IE', 'Ireland'),
(103, 'IL', 'Israel'),
(98, 'IN', 'India'),
(31, 'IO', 'British Indian Ocean Territory'),
(101, 'IQ', 'Iraq'),
(100, 'IR', 'Iran, Islamic Republic of'),
(97, 'IS', 'Iceland'),
(104, 'IT', 'Italy'),
(105, 'JM', 'Jamaica'),
(107, 'JO', 'Jordan'),
(106, 'JP', 'Japan'),
(109, 'KE', 'Kenya'),
(113, 'KG', 'Kyrgyzstan'),
(36, 'KH', 'Cambodia'),
(110, 'KI', 'Kiribati'),
(48, 'KM', 'Comoros'),
(177, 'KN', 'Saint Kitts and Nevis'),
(111, 'KR', 'Korea, Republic of'),
(112, 'KW', 'Kuwait'),
(40, 'KY', 'Cayman Islands'),
(108, 'KZ', 'Kazakhstan'),
(115, 'LB', 'Lebanon'),
(178, 'LC', 'Saint Lucia'),
(119, 'LI', 'Liechtenstein'),
(197, 'LK', 'Sri Lanka'),
(117, 'LR', 'Liberia'),
(116, 'LS', 'Lesotho'),
(120, 'LT', 'Lithuania'),
(121, 'LU', 'Luxembourg'),
(114, 'LV', 'Latvia'),
(118, 'LY', 'Libyan Arab Jamahiriya'),
(141, 'MA', 'Morocco'),
(138, 'MC', 'Monaco'),
(137, 'MD', 'Moldova, Republic of'),
(124, 'MG', 'Madagascar'),
(130, 'MH', 'Marshall Islands'),
(123, 'MK', 'Macedonia, the Former Yugoslav Republic of'),
(128, 'ML', 'Mali'),
(143, 'MM', 'Myanmar'),
(139, 'MN', 'Mongolia'),
(122, 'MO', 'Macao'),
(156, 'MP', 'Northern Mariana Islands'),
(131, 'MQ', 'Martinique'),
(132, 'MR', 'Mauritania'),
(140, 'MS', 'Montserrat'),
(129, 'MT', 'Malta'),
(133, 'MU', 'Mauritius'),
(127, 'MV', 'Maldives'),
(125, 'MW', 'Malawi'),
(135, 'MX', 'Mexico'),
(126, 'MY', 'Malaysia'),
(142, 'MZ', 'Mozambique'),
(144, 'NA', 'Namibia'),
(149, 'NC', 'New Caledonia'),
(152, 'NE', 'Niger'),
(155, 'NF', 'Norfolk Island'),
(153, 'NG', 'Nigeria'),
(151, 'NI', 'Nicaragua'),
(147, 'NL', 'Netherlands'),
(157, 'NO', 'Norway'),
(146, 'NP', 'Nepal'),
(145, 'NR', 'Nauru'),
(154, 'NU', 'Niue'),
(150, 'NZ', 'New Zealand'),
(158, 'OM', 'Oman'),
(162, 'PA', 'Panama'),
(165, 'PE', 'Peru'),
(74, 'PF', 'French Polynesia'),
(163, 'PG', 'Papua New Guinea'),
(166, 'PH', 'Philippines'),
(159, 'PK', 'Pakistan'),
(168, 'PL', 'Poland'),
(179, 'PM', 'Saint Pierre and Miquelon'),
(167, 'PN', 'Pitcairn'),
(170, 'PR', 'Puerto Rico'),
(161, 'PS', 'Palestinian Territory, Occupied'),
(169, 'PT', 'Portugal'),
(160, 'PW', 'Palau'),
(164, 'PY', 'Paraguay'),
(171, 'QA', 'Qatar'),
(172, 'RE', 'Reunion'),
(173, 'RO', 'Romania'),
(174, 'RU', 'Russian Federation'),
(175, 'RW', 'Rwanda'),
(184, 'SA', 'Saudi Arabia'),
(192, 'SB', 'Solomon Islands'),
(187, 'SC', 'Seychelles'),
(198, 'SD', 'Sudan'),
(202, 'SE', 'Sweden'),
(189, 'SG', 'Singapore'),
(176, 'SH', 'Saint Helena'),
(191, 'SI', 'Slovenia'),
(200, 'SJ', 'Svalbard and Jan Mayen'),
(190, 'SK', 'Slovakia'),
(188, 'SL', 'Sierra Leone'),
(182, 'SM', 'San Marino'),
(185, 'SN', 'Senegal'),
(193, 'SO', 'Somalia'),
(199, 'SR', 'Suriname'),
(183, 'ST', 'Sao Tome and Principe'),
(63, 'SV', 'El Salvador'),
(204, 'SY', 'Syrian Arab Republic'),
(201, 'SZ', 'Swaziland'),
(217, 'TC', 'Turks and Caicos Islands'),
(42, 'TD', 'Chad'),
(75, 'TF', 'French Southern Territories'),
(210, 'TG', 'Togo'),
(208, 'TH', 'Thailand'),
(206, 'TJ', 'Tajikistan'),
(211, 'TK', 'Tokelau'),
(209, 'TL', 'Timor-Leste'),
(216, 'TM', 'Turkmenistan'),
(214, 'TN', 'Tunisia'),
(212, 'TO', 'Tonga'),
(215, 'TR', 'Turkey'),
(213, 'TT', 'Trinidad and Tobago'),
(218, 'TV', 'Tuvalu'),
(205, 'TW', 'Taiwan, Province of China'),
(207, 'TZ', 'Tanzania, United Republic of'),
(220, 'UA', 'Ukraine'),
(219, 'UG', 'Uganda'),
(224, 'UM', 'United States Minor Outlying Islands'),
(223, 'US', 'United States'),
(225, 'UY', 'Uruguay'),
(226, 'UZ', 'Uzbekistan'),
(93, 'VA', 'Holy See (Vatican City State)'),
(180, 'VC', 'Saint Vincent and the Grenadines'),
(228, 'VE', 'Venezuela'),
(230, 'VG', 'Virgin Islands, British'),
(231, 'VI', 'Virgin Islands, U.s.'),
(229, 'VN', 'Viet Nam'),
(227, 'VU', 'Vanuatu'),
(232, 'WF', 'Wallis and Futuna'),
(181, 'WS', 'Samoa'),
(234, 'YE', 'Yemen'),
(134, 'YT', 'Mayotte'),
(194, 'ZA', 'South Africa'),
(235, 'ZM', 'Zambia'),
(236, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `human`
--

CREATE TABLE IF NOT EXISTS `human` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fb_id` varchar(32) NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `middlename` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `timezone` varchar(6) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `last_page` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fb_id` (`fb_id`,`firstname`,`lastname`),
  KEY `email` (`email`),
  KEY `password` (`password`),
  KEY `verified` (`verified`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `human`
--

INSERT INTO `human` (`id`, `fb_id`, `firstname`, `middlename`, `lastname`, `email`, `password`, `gender`, `reg_date`, `last_update`, `timezone`, `verified`, `last_page`) VALUES
(1, '', 'Mar', '', 'Cejas', 'mvcejas@gmail.com', '4297f44b13955235245b2497399d7a93', 'male', '2012-08-12 12:56:08', '2012-08-12 12:56:08', '', 0, ''),
(2, '', 'Mar', '', 'Cejas', 'mvcejas@gmail.com', '0775d3c1441ed51591b88bf73cd62950', 'male', '2012-08-12 13:01:43', '2012-08-12 13:01:43', '', 0, ''),
(3, '', 'Mar', '', 'Cejas', 'mvcejas@gmail.com', '8ce87b8ec346ff4c80635f667d1592ae', 'male', '2012-08-12 13:04:45', '2012-08-12 14:05:46', '', 0, '/address.php');

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE IF NOT EXISTS `phone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `human_id` int(11) NOT NULL,
  `phone` varchar(12) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `human_id` (`human_id`),
  KEY `phone` (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
