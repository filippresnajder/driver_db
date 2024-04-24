-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: St 24.Apr 2024, 19:45
-- Verzia serveru: 10.4.32-MariaDB
-- Verzia PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `driverbase`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`) VALUES
(6, 'Filip', 'filippresnajder1@gmail.com', 'testing message 1'),
(7, 'Test', 'test@gmail.com', 'Testing message 2'),
(8, 'FooBar', 'email@hotmal.com', 'Testing message 3.');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `iso` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `countries`
--

INSERT INTO `countries` (`id`, `name`, `iso`) VALUES
(1, 'Afghanistan', 'AF'),
(2, 'Albania', 'AL'),
(3, 'Algeria', 'DZ'),
(4, 'American Samoa', 'AS'),
(5, 'Andorra', 'AD'),
(6, 'Angola', 'AO'),
(7, 'Anguilla', 'AI'),
(8, 'Antarctica', 'AQ'),
(9, 'Antigua and Barbuda', 'AG'),
(10, 'Argentina', 'AR'),
(11, 'Armenia', 'AM'),
(12, 'Aruba', 'AW'),
(13, 'Australia', 'AU'),
(14, 'Austria', 'AT'),
(15, 'Azerbaijan', 'AZ'),
(16, 'Bahamas', 'BS'),
(17, 'Bahrain', 'BH'),
(18, 'Bangladesh', 'BD'),
(19, 'Barbados', 'BB'),
(20, 'Belarus', 'BY'),
(21, 'Belgium', 'BE'),
(22, 'Belize', 'BZ'),
(23, 'Benin', 'BJ'),
(24, 'Bermuda', 'BM'),
(25, 'Bhutan', 'BT'),
(26, 'Bosnia and Herzegovina', 'BA'),
(27, 'Botswana', 'BW'),
(28, 'Bouvet Island', 'BV'),
(29, 'Brazil', 'BR'),
(30, 'British Indian Ocean Territory', 'IO'),
(31, 'Brunei Darussalam', 'BN'),
(32, 'Bulgaria', 'BG'),
(33, 'Burkina Faso', 'BF'),
(34, 'Burundi', 'BI'),
(35, 'Cambodia', 'KH'),
(36, 'Cameroon', 'CM'),
(37, 'Canada', 'CA'),
(38, 'Cape Verde', 'CV'),
(39, 'Cayman Islands', 'KY'),
(40, 'Central African Republic', 'CF'),
(41, 'Chad', 'TD'),
(42, 'Chile', 'CL'),
(43, 'China', 'CN'),
(44, 'Christmas Island', 'CX'),
(45, 'Cocos (Keeling) Islands', 'CC'),
(46, 'Colombia', 'CO'),
(47, 'Comoros', 'KM'),
(48, 'Congo', 'CG'),
(49, 'Cook Islands', 'CK'),
(50, 'Costa Rica', 'CR'),
(51, 'Croatia', 'HR'),
(52, 'Cuba', 'CU'),
(53, 'Cyprus', 'CY'),
(54, 'Czech Republic', 'CZ'),
(55, 'Denmark', 'DK'),
(56, 'Djibouti', 'DJ'),
(57, 'Dominica', 'DM'),
(58, 'Dominican Republic', 'DO'),
(59, 'Ecuador', 'EC'),
(60, 'Egypt', 'EG'),
(61, 'El Salvador', 'SV'),
(62, 'Equatorial Guinea', 'GQ'),
(63, 'Eritrea', 'ER'),
(64, 'Estonia', 'EE'),
(65, 'Ethiopia', 'ET'),
(66, 'Falkland Islands (Malvinas)', 'FK'),
(67, 'Faroe Islands', 'FO'),
(68, 'Fiji', 'FJ'),
(69, 'Finland', 'FI'),
(70, 'France', 'FR'),
(71, 'French Guiana', 'GF'),
(72, 'French Polynesia', 'PF'),
(73, 'French Southern Territories', 'TF'),
(74, 'Gabon', 'GA'),
(75, 'Gambia', 'GM'),
(76, 'Georgia', 'GE'),
(77, 'Germany', 'DE'),
(78, 'Ghana', 'GH'),
(79, 'Gibraltar', 'GI'),
(80, 'Greece', 'GR'),
(81, 'Greenland', 'GL'),
(82, 'Grenada', 'GD'),
(83, 'Guadeloupe', 'GP'),
(84, 'Guam', 'GU'),
(85, 'Guatemala', 'GT'),
(86, 'Guernsey', 'GG'),
(87, 'Guinea', 'GN'),
(88, 'Guinea-Bissau', 'GW'),
(89, 'Guyana', 'GY'),
(90, 'Haiti', 'HT'),
(91, 'Heard Island and McDonald Islands', 'HM'),
(92, 'Holy See (Vatican City State)', 'VA'),
(93, 'Honduras', 'HN'),
(94, 'Hong Kong', 'HK'),
(95, 'Hungary', 'HU'),
(96, 'Iceland', 'IS'),
(97, 'India', 'IN'),
(98, 'Indonesia', 'ID'),
(99, 'Iran', 'IR'),
(100, 'Iraq', 'IQ'),
(101, 'Ireland', 'IE'),
(102, 'Isle of Man', 'IM'),
(103, 'Israel', 'IL'),
(104, 'Italy', 'IT'),
(105, 'Jamaica', 'JM'),
(106, 'Japan', 'JP'),
(107, 'Jersey', 'JE'),
(108, 'Jordan', 'JO'),
(109, 'Kazakhstan', 'KZ'),
(110, 'Kenya', 'KE'),
(111, 'Kiribati', 'KI'),
(112, 'Kuwait', 'KW'),
(113, 'Kyrgyzstan', 'KG'),
(114, 'Lao Peoples Democratic Republic', 'LA'),
(115, 'Latvia', 'LV'),
(116, 'Lebanon', 'LB'),
(117, 'Lesotho', 'LS'),
(118, 'Liberia', 'LR'),
(119, 'Libya', 'LY'),
(120, 'Liechtenstein', 'LI'),
(121, 'Lithuania', 'LT'),
(122, 'Luxembourg', 'LU'),
(123, 'Macao', 'MO'),
(124, 'Madagascar', 'MG'),
(125, 'Malawi', 'MW'),
(126, 'Malaysia', 'MY'),
(127, 'Maldives', 'MV'),
(128, 'Mali', 'ML'),
(129, 'Malta', 'MT'),
(130, 'Marshall Islands', 'MH'),
(131, 'Martinique', 'MQ'),
(132, 'Mauritania', 'MR'),
(133, 'Mauritius', 'MU'),
(134, 'Mayotte', 'YT'),
(135, 'Mexico', 'MX'),
(136, 'Monaco', 'MC'),
(137, 'Mongolia', 'MN'),
(138, 'Montenegro', 'ME'),
(139, 'Montserrat', 'MS'),
(140, 'Morocco', 'MA'),
(141, 'Mozambique', 'MZ'),
(142, 'Myanmar', 'MM'),
(143, 'Namibia', 'NA'),
(144, 'Nauru', 'NR'),
(145, 'Nepal', 'NP'),
(146, 'Netherlands', 'NL'),
(147, 'New Caledonia', 'NC'),
(148, 'New Zealand', 'NZ'),
(149, 'Nicaragua', 'NI'),
(150, 'Niger', 'NE'),
(151, 'Nigeria', 'NG'),
(152, 'Niue', 'NU'),
(153, 'Norfolk Island', 'NF'),
(154, 'Northern Mariana Islands', 'MP'),
(155, 'Norway', 'NO'),
(156, 'Oman', 'OM'),
(157, 'Pakistan', 'PK'),
(158, 'Palau', 'PW'),
(159, 'Panama', 'PA'),
(160, 'Papua New Guinea', 'PG'),
(161, 'Paraguay', 'PY'),
(162, 'Peru', 'PE'),
(163, 'Philippines', 'PH'),
(164, 'Pitcairn', 'PN'),
(165, 'Poland', 'PL'),
(166, 'Portugal', 'PT'),
(167, 'Puerto Rico', 'PR'),
(168, 'Qatar', 'QA'),
(169, 'Romania', 'RO'),
(170, 'Russian Federation', 'RU'),
(171, 'Rwanda', 'RW'),
(172, 'Saint Kitts and Nevis', 'KN'),
(173, 'Saint Lucia', 'LC'),
(174, 'Saint Martin (French part)', 'MF'),
(175, 'Saint Pierre and Miquelon', 'PM'),
(176, 'Saint Vincent and the Grenadines', 'VC'),
(177, 'Samoa', 'WS'),
(178, 'San Marino', 'SM'),
(179, 'Sao Tome and Principe', 'ST'),
(180, 'Saudi Arabia', 'SA'),
(181, 'Senegal', 'SN'),
(182, 'Serbia', 'RS'),
(183, 'Seychelles', 'SC'),
(184, 'Sierra Leone', 'SL'),
(185, 'Singapore', 'SG'),
(186, 'Sint Maarten (Dutch part)', 'SX'),
(187, 'Slovakia', 'SK'),
(188, 'Slovenia', 'SI'),
(189, 'Solomon Islands', 'SB'),
(190, 'Somalia', 'SO'),
(191, 'South Africa', 'ZA'),
(192, 'South Georgia and the South Sandwich Islands', 'GS'),
(193, 'South Sudan', 'SS'),
(194, 'Spain', 'ES'),
(195, 'Sri Lanka', 'LK'),
(196, 'State of Palestine', 'PS'),
(197, 'Sudan', 'SD'),
(198, 'Suriname', 'SR'),
(199, 'Svalbard and Jan Mayen', 'SJ'),
(200, 'Swaziland', 'SZ'),
(201, 'Sweden', 'SE'),
(202, 'Switzerland', 'CH'),
(203, 'Syrian Arab Republic', 'SY'),
(204, 'Tajikistan', 'TJ'),
(205, 'Thailand', 'TH'),
(206, 'Timor-Leste', 'TL'),
(207, 'Togo', 'TG'),
(208, 'Tokelau', 'TK'),
(209, 'Tonga', 'TO'),
(210, 'Trinidad and Tobago', 'TT'),
(211, 'Tunisia', 'TN'),
(212, 'Turkey', 'TR'),
(213, 'Turkmenistan', 'TM'),
(214, 'Turks and Caicos Islands', 'TC'),
(215, 'Tuvalu', 'TV'),
(216, 'Uganda', 'UG'),
(217, 'Ukraine', 'UA'),
(218, 'United Arab Emirates', 'AE'),
(219, 'United Kingdom', 'GB'),
(220, 'United States', 'US'),
(221, 'United States Minor Outlying Islands', 'UM'),
(222, 'Uruguay', 'UY'),
(223, 'Uzbekistan', 'UZ'),
(224, 'Vanuatu', 'VU'),
(225, 'Viet Nam', 'VN'),
(226, 'Wallis and Futuna', 'WF'),
(227, 'Western Sahara', 'EH'),
(228, 'Yemen', 'YE'),
(229, 'Zambia', 'ZM'),
(230, 'Zimbabwe', 'ZW');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `series` varchar(100) NOT NULL,
  `team` varchar(100) NOT NULL,
  `wiki_page` text DEFAULT NULL,
  `pic_address` text NOT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `nationality`, `birthday`, `series`, `team`, `wiki_page`, `pic_address`, `added_by`) VALUES
(84, 'Fernando Alonso', 'Spain', '1981-07-29', 'Formula 1', 'Aston Martin', 'https://en.wikipedia.org/wiki/Fernando_Alonso', '../assets/img/Fernando_Alonso_NASCAR_Media_Tour_2018.jpg', 1),
(85, 'Sebastian Vettel', 'Germany', '1987-07-03', 'None', 'Retired', 'https://en.wikipedia.org/wiki/Sebastian_Vettel', '../assets/img/Sebastian_Vettel_-_2022236172324_2022-08-24_Champions_for_Charity_-_Sven_-_1D_X_MK_II_-_0418_-_B70I2428.jpg', 1),
(86, 'Lewis Hamilton', 'United Kingdom', '1985-01-07', 'Formula 1', 'Mercedes', 'https://en.wikipedia.org/wiki/Lewis_Hamilton', '../assets/img/Lewis_Hamilton_2022_São_Paulo_Grand_Prix_(52498120773)_(cropped).jpg', 1),
(87, 'Kimi Räikkonen', 'Finland', '1979-10-17', 'None', 'Retired', 'https://en.wikipedia.org/wiki/Kimi_R%C3%A4ikk%C3%B6nen', '../assets/img/220px-F12019_Schloss_Gabelhofen_(22)_(cropped).jpg', 1),
(88, 'Théo Pourchaire', 'France', '2003-08-20', 'Indycar', 'Arrow McLaren', 'https://en.wikipedia.org/wiki/Th%C3%A9o_Pourchaire', '../assets/img/Pourchaire_Podium_Oschersleben_ADAC_F4_2019-2_(cropped).jpg', 1),
(89, 'Roman Staněk', 'Czech Republic', '2004-02-25', 'Formula 2', 'Trident', 'https://en.wikipedia.org/wiki/Roman_Stan%C4%9Bk', '../assets/img/R.Staněk.jpg', 1);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `code` varchar(2) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `series`
--

INSERT INTO `series` (`id`, `code`, `name`) VALUES
(1, 'F1', 'Formula 1'),
(2, 'F2', 'Formula 2'),
(3, 'F3', 'Formula 3'),
(4, 'FA', 'F1 Academy'),
(5, 'FS', 'F1 Esports'),
(6, 'IC', 'Indycar'),
(7, 'IM', 'IMSA'),
(8, 'WE', 'WEC'),
(9, 'KA', 'Karting'),
(10, 'NO', 'None');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@driverbase.sk', '$2y$10$1TyHGDohNaYEnbEN10W.wOlrb5xWHY32Y7HDIJpDjNm1cLVzthCNq', 1),
(19, 'testaccount', 'filippresnajder1@gmail.com', '$2y$10$WpTAVf6VLyZUHkz9AdOch.oZ7uElKYM8tzWxh9xxiJxX2F8fOypU6', 0);

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `iso` (`iso`);

--
-- Indexy pre tabuľku `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pre tabuľku `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT pre tabuľku `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT pre tabuľku `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pre tabuľku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
