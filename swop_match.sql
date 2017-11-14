-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2017 at 12:14 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swop_match`
--
CREATE DATABASE IF NOT EXISTS `swop_match` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `swop_match`;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_ec_no` varchar(10) NOT NULL,
  `client_first_name` text NOT NULL,
  `client_last_name` text NOT NULL,
  `client_sex` set('Male','Female','','') NOT NULL,
  `client_mobile_no` int(14) NOT NULL,
  `client_email` varchar(30) NOT NULL,
  `client_password` varchar(15) NOT NULL,
  `client_level_taught` char(30) NOT NULL,
  `client_date_created` char(30) NOT NULL,
  `client_status` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `client_date_matched` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`client_id`) USING BTREE,
  UNIQUE KEY `UNIQUE` (`client_ec_no`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

REPLACE INTO `clients` (`client_id`, `client_ec_no`, `client_first_name`, `client_last_name`, `client_sex`, `client_mobile_no`, `client_email`, `client_password`, `client_level_taught`, `client_date_created`, `client_status`, `client_date_matched`) VALUES
(1, 'EC4567', 'Patson', 'Chizema', 'Male', 712549887, 'pchizema@gmail.com', 'minitryy', 'HIGH SCHOOL - UP TO A LEVEL', '15-09-2017 10:20:49', 'A', ''),
(2, 'EC46665', 'Thokozile', 'Chizema', 'Female', 773575643, 'thokozile@gmail.com', 'mypass', 'HIGH SCHOOL - UP TO A LEVEL', '15-09-2017 10:35:48', 'A', ''),
(4, 'TAT377', 'Tatenda', 'Chizema', 'Male', 75265623, 'tatenda@gmail.com', 'tapinda', 'HIGH SCHOOL - UP TO A LEVEL', '15-09-2017 10:50:33', 'A', ''),
(5, 'TIN0125', 'Tinotenda', 'Chizema', 'Female', 759654, 'tinotenda@gmail.com', 'tinotenda', 'HIGH SCHOOL - UP TO A LEVEL', '15-09-2017 12:54:32', 'A', ''),
(6, '5101281 V', 'THOKOZILE', 'CHIZEMA', 'Female', 773575263, 'tchizema@gmail.com', 'thokozile', 'PRIMARY - GENERAL', '15-09-2017 20:25:51', 'A', ''),
(7, 'GL98888', 'Glory', 'Chizema', 'Female', 258652, 'glory@gmail.com', 'glory', 'HIGH SCHOOL - UP TO O LEVEL', '16-09-2017 13:14:21', 'A', ''),
(8, 'MUN908', 'Munyaradzi', 'Chizema', 'Male', 775263810, 'munyaradzi@gmail.com', 'munyaradzi', 'HIGH SCHOOL - UP TO O LEVEL', '16-09-2017 19:09:19', 'A', ''),
(9, 'MAN089', 'Douglas', 'Mano', 'Male', 712589456, 'mano@gmail.com', 'manod', 'HIGH SCHOOL - UP TO O LEVEL', '17-09-2017 17:50:59', 'A', ''),
(10, 'ALF1252', 'Alford', 'Magada', 'Male', 775862225, 'alford@gmail.com', 'alford', 'PRIMARY - GENERAL', '17-09-2017 18:18:36', 'A', ''),
(11, 'CHA1252', 'Alford', 'Chara', 'Male', 775862225, 'alford@gmail.com', 'chara', 'PRIMARY - GENERAL', '17-09-2017 18:22:19', 'A', ''),
(12, 'TAS4752', 'Kelvin', 'Tash', 'Male', 77585962, 'tash@gmail.com', 'tash', 'PRIMARY - ECD', '18-09-2017 07:56:53', 'A', ''),
(13, 'MAP002', 'Shepherd', 'Mapundo', 'Male', 7758965, 'shepherd@gmail.com', 'shepherd', 'PRIMARY - ECD', '18-09-2017 08:04:46', 'A', ''),
(15, 'TIN142', 'Tinaye', 'Kembo', 'Female', 7895623, 'tinaye@gmail.com', 'tinaye', 'PRIMARY - ECD', '18-09-2017 08:40:07', 'A', ''),
(19, 'BONGS', 'Bongani', 'Ruredzo', 'Male', 789522, 'bongani@gmail.com', 'bongani', 'HIGH SCHOOL - UP TO O LEVEL', '18-09-2017 10:18:46', 'A', ''),
(21, 'SAL123', 'Salya', 'Mangena', 'Female', 8596526, 'salya@gmail.com', 'salya', 'HIGH SCHOOL - UP TO O LEVEL', '18-09-2017 12:24:08', 'A', ''),
(22, 'CHI0212', 'Chipo', 'Mudaka', 'Female', 78954622, 'chipo@gmail.com', 'chipo', 'HIGH SCHOOL - UP TO O LEVEL', '18-09-2017 13:23:32', 'A', ''),
(23, 'MIC789', 'Michael', 'Mahachi', 'Male', 7895243, 'michael@gmail.com', 'michael', 'PRIMARY - GENERAL', '18-09-2017 15:27:36', 'A', ''),
(27, 'COH125', 'Cohen', 'Majawa', 'Male', 8974562, 'cohen@gmail.com', 'cohen', 'HIGH SCHOOL - UP TO O LEVEL', '19-09-2017 21:30:11', 'A', ''),
(28, 'TAP232', 'Tapiwa', 'Chareka', 'Male', 71258962, 'tapiwa@gmail.com', 'tapiwa', 'HIGH SCHOOL - UP TO O LEVEL', '27-09-2017 08:12:26', 'A', ''),
(30, 'CHA125', 'Charles', 'Gamba', 'Male', 7895623, 'charles@gmail.com', 'charles', 'HIGH SCHOOL - UP TO O LEVEL', '27-09-2017 13:47:23', 'A', ''),
(33, 'BYR001', 'Byron', 'Black', 'Male', 7894562, 'byron@black.com', 'byron', 'HIGH SCHOOL - UP TO A LEVEL', '27-09-2017 14:05:39', 'A', ''),
(34, 'THE452', 'Theresa', 'Danda', 'Female', 789562, 'theresa@gmail.com', 'theresa', 'HIGH SCHOOL - UP TO O LEVEL', '27-09-2017 14:10:00', 'A', ''),
(35, 'TIC021', 'Tichaona', 'Chizema', 'Male', 1189456, 'tichaona@yahoo.com', 'tichaona', 'HIGH SCHOOL - UP TO O LEVEL', '27-09-2017 14:24:07', 'A', ''),
(36, 'TES001', 'Test', 'One', 'Female', 895623, 'test@yahoo.com', 'test', 'HIGH SCHOOL - UP TO O LEVEL', '29-09-2017 14:46:00', 'A', ''),
(37, 'TES002', 'Tes', 'Two', 'Male', 789456, 'test2@gmail.com', 'test2', 'HIGH SCHOOL - UP TO O LEVEL', '29-09-2017 14:47:28', 'A', ''),
(38, 'tes003', 'Test', 'Three', 'Male', 586974, 'test3@hotmail.com', 'test3', 'HIGH SCHOOL - UP TO A LEVEL', '29-09-2017 14:48:40', 'A', ''),
(39, 'tes004', 'Test', 'Four', 'Female', 586974, 'test4@me.com', 'test4', 'PRIMARY - ECD', '29-09-2017 14:50:42', 'A', ''),
(41, 'TES006', 'Test', 'Six', 'Male', 859764, 'test@live.com', 'test6', 'HIGH SCHOOL - UP TO O LEVEL', '01-10-2017 15:35:51', 'A', ''),
(54, 'REG1', 'Ab', 'Reg1', 'Male', 7485745, 'regone@ab.com', 'reg1', 'HIGH SCHOOL - UP TO O LEVEL', '01-10-2017 18:19:31', 'A', ''),
(55, 'REG2', 'Cd', 'Reg2', 'Male', 789541, 'reg2@gmail.com', 'yrtb', 'PRIMARY - GENERAL', '01-10-2017 18:22:28', 'A', ''),
(56, 'REG3', 'Ef', 'Reg3', 'Female', 774524, 'reg3@reg.com', 'res5', 'PRIMARY - ECD', '01-10-2017 18:23:59', 'A', ''),
(57, 'REG4', 'Gh', 'REG4', 'Male', 41445454, 'reg4@hut.com', 'reg5', 'HIGH SCHOOL - UP TO O LEVEL', '01-10-2017 18:25:58', 'A', ''),
(58, 'REG5', 'Ij', 'REG5', 'Female', 65322213, 'reg5@gtht.com', 'sghjds', 'HIGH SCHOOL - UP TO A LEVEL', '01-10-2017 18:28:01', 'A', ''),
(74, 'TES008', 'Test08', 'Eight', 'Female', 741258, 'test8@gmail.com', 'test6', 'HIGH SCHOOL - UP TO O LEVEL', '03-10-2017 12:51:08', 'A', ''),
(78, 'TES009', 'Test 9', 'Nine', 'Male', 258963, 'test9@gmail.com', 'test9', 'HIGH SCHOOL - UP TO O LEVEL', '03-10-2017 13:17:53', 'A', ''),
(79, 'TES010', 'Test 10', 'Ten', 'Male', 258963, 'test10@gmail.com', 'test10', 'HIGH SCHOOL - UP TO O LEVEL', '03-10-2017 13:26:12', 'A', ''),
(82, 'MAR002', 'Maria', 'Db', 'Female', 1256322, 'maria@gmail.com', 'maria', 'HIGH SCHOOL - UP TO O LEVEL', '05-10-2017 19:01:32', 'A', ''),
(83, 'TAZ001', 'Tazviona', 'Zvaita', 'Male', 258963, 'tazviona@gmail.com', 'tazviona', 'HIGH SCHOOL - UP TO O LEVEL', '06-10-2017 13:09:17', 'A', ''),
(84, 'IZV002', 'Izvoka', 'Locations', 'Male', 369852, 'izvoka@yahoo.com', 'izvoka', 'HIGH SCHOOL - UP TO O LEVEL', '06-10-2017 13:33:44', 'A', ''),
(85, 'TAZ002', 'Tazviita', 'Zvino', 'Male', 452163, 'tazviita@hotmail.com', 'tazviita', 'HIGH SCHOOL - UP TO A LEVEL', '06-10-2017 14:14:44', 'A', ''),
(87, 'PET123', 'Petros', 'Magadla', 'Male', 745686, 'Petros', 'peter', 'HIGH SCHOOL - UP TO A LEVEL', '14-10-2017 21:01:59', 'A', ''),
(88, 'PET124', 'Peturos', 'Sions', 'Male', 6655555, 'Peturos', 'peturo', 'HIGH SCHOOL - UP TO O LEVEL', '15-10-2017 17:40:50', 'A', ''),
(89, 'MAK56', 'Maka', 'Charu', 'Female', 748574, 'maka@gmail.com', 'maka', 'HIGH SCHOOL - UP TO O LEVEL', '12-11-2017 15:34:50', 'A', ''),
(90, 'TRY001', 'Tryit', 'System', 'Female', 256933, 'try@gmail.com', 'try', 'HIGH SCHOOL - UP TO O LEVEL', '13-11-2017 13:46:14', 'A', '');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
CREATE TABLE IF NOT EXISTS `districts` (
  `distr_id` int(11) NOT NULL AUTO_INCREMENT,
  `distr_name` varchar(20) NOT NULL,
  `distr_province_id` int(11) NOT NULL,
  PRIMARY KEY (`distr_id`),
  UNIQUE KEY `UNIQUE` (`distr_name`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `districts`
--

REPLACE INTO `districts` (`distr_id`, `distr_name`, `distr_province_id`) VALUES
(1, 'Harare', 1),
(2, 'Chitungwiza', 1),
(3, 'Bulawayo', 2),
(4, 'Chikomba', 3),
(5, 'Goromonzi', 3),
(6, 'Wedza', 3),
(7, 'Marondera', 3),
(8, 'Mudzi', 3),
(9, 'Murehwa', 3),
(10, 'Mutoko', 3),
(11, 'Seke', 3),
(12, 'UMP', 3),
(13, 'Bindura', 4),
(14, 'Guruve', 4),
(15, 'Mazowe', 4),
(16, 'Mt Darwin', 4),
(17, 'Muzarabani', 4),
(18, 'Rushinga', 4),
(19, 'Shamva', 4),
(20, 'Chegutu', 5),
(21, 'Hurungwe', 5),
(22, 'Kadoma', 5),
(23, 'Kariba', 5),
(24, 'Makonde', 5),
(25, 'Zvimba', 5),
(26, 'Binga', 6),
(27, 'Bubi', 6),
(28, 'Hwange', 6),
(29, 'Lupane', 6),
(30, 'Nkayi', 6),
(31, 'Tsholotsho', 6),
(32, 'Umguza', 6),
(33, 'Beitbridge', 7),
(34, 'Bulilima', 7),
(35, 'Mangwe', 7),
(36, 'Gwanda', 7),
(37, 'Insiza', 7),
(38, 'Matobo', 7),
(39, 'Umzingwane', 7),
(40, 'Chirumhanzu', 8),
(41, 'Gokwe North', 8),
(42, 'Gokwe South', 8),
(43, 'Gweru', 8),
(44, 'Kwekwe', 8),
(45, 'Mberengwa', 8),
(46, 'Shurugwi', 8),
(47, 'Zvishavane', 8),
(48, 'Bikita', 9),
(49, 'Chiredzi', 9),
(50, 'Chivi', 9),
(51, 'Gutu', 9),
(52, 'Masvingo', 9),
(53, 'Mwenezi', 9),
(54, 'Zaka', 9),
(55, 'Buhera', 10),
(56, 'Chimanimani', 10),
(57, 'Chipinge', 10),
(58, 'Makoni', 10),
(59, 'Mutare', 10),
(60, 'Mutasa', 10),
(61, 'Nyanga', 10);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `loc_id` int(11) NOT NULL AUTO_INCREMENT,
  `loc_name` varchar(20) NOT NULL,
  `loc_town_id` int(11) NOT NULL,
  `loc_distr_id` int(11) NOT NULL,
  `loc_province_id` int(11) NOT NULL,
  PRIMARY KEY (`loc_id`),
  UNIQUE KEY `UNIQUE` (`loc_name`)
) ENGINE=InnoDB AUTO_INCREMENT=414 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

REPLACE INTO `locations` (`loc_id`, `loc_name`, `loc_town_id`, `loc_distr_id`, `loc_province_id`) VALUES
(1, 'Adylinn', 11, 1, 1),
(2, 'Alexandra Park', 11, 1, 1),
(3, 'Amby', 11, 1, 1),
(4, 'Arcadia', 11, 1, 1),
(5, 'Ardbennie', 11, 1, 1),
(6, 'Ashbrittle', 11, 1, 1),
(7, 'Ashdown Park', 11, 1, 1),
(8, 'Aspindale Park', 11, 1, 1),
(9, 'Athlone', 11, 1, 1),
(10, 'Avenues', 11, 1, 1),
(11, 'Avondale', 11, 1, 1),
(12, 'Avonlea', 11, 1, 1),
(13, 'Ballantyne Park', 11, 1, 1),
(14, 'Belgravia', 11, 1, 1),
(15, 'Belvedere', 11, 1, 1),
(16, 'Beverley', 11, 1, 1),
(17, 'Bluff Hill', 11, 1, 1),
(18, 'Borrowdale', 11, 1, 1),
(19, 'Braeside', 11, 1, 1),
(20, 'Budiriro', 11, 1, 1),
(21, 'Chadcombe', 11, 1, 1),
(22, 'Chisipite', 11, 1, 1),
(23, 'Chizhanje', 11, 1, 1),
(24, 'Colne Valley', 11, 1, 1),
(25, 'Colray', 11, 1, 1),
(26, 'Coronation Park', 11, 1, 1),
(27, 'Cotswold Hills', 11, 1, 1),
(28, 'Cranborne', 11, 1, 1),
(29, 'Crowborough North', 11, 1, 1),
(30, 'Dawn Hill', 11, 1, 1),
(31, 'Donnybrook', 11, 1, 1),
(32, 'Dzivaresekwa', 11, 1, 1),
(33, 'Eastlea', 11, 1, 1),
(35, 'Emerald Hill', 11, 1, 1),
(36, 'Glen Lorne', 11, 1, 1),
(37, 'Glen Norah', 11, 1, 1),
(38, 'Glen View', 11, 1, 1),
(39, 'Glenwood', 11, 1, 1),
(40, 'Graniteside', 11, 1, 1),
(41, 'Green Grove', 11, 1, 1),
(42, 'Greencroft', 11, 1, 1),
(43, 'Greendale', 11, 1, 1),
(44, 'Greystone Park', 11, 1, 1),
(45, 'Grobbie Park', 11, 1, 1),
(46, 'Groombridge', 11, 1, 1),
(47, 'Gun Hill', 11, 1, 1),
(48, 'Haig Park', 11, 1, 1),
(49, 'Hatcliffe', 11, 1, 1),
(50, 'Hatfield', 11, 1, 1),
(51, 'Helensvale', 11, 1, 1),
(52, 'Highfield', 11, 1, 1),
(53, 'Highlands', 11, 1, 1),
(54, 'Hillside', 11, 1, 1),
(55, 'Hogerty Hill', 11, 1, 1),
(56, 'Hopley', 11, 1, 1),
(57, 'Houghton Park', 11, 1, 1),
(58, 'Induna', 11, 1, 1),
(59, 'Kambanji', 11, 1, 1),
(60, 'Kambuzuma', 11, 1, 1),
(61, 'Kensington', 11, 1, 1),
(62, 'Kutsaga', 11, 1, 1),
(63, 'Kuwadzana', 11, 1, 1),
(64, 'Letombo Park', 11, 1, 1),
(65, 'Lewisam', 11, 1, 1),
(66, 'Lincoln Green', 11, 1, 1),
(67, 'Lochinvar', 11, 1, 1),
(68, 'Logan Park', 11, 1, 1),
(69, 'Luna', 11, 1, 1),
(70, 'Mabelreign', 11, 1, 1),
(71, 'Mabvuku', 11, 1, 1),
(72, 'Malvern', 11, 1, 1),
(73, 'Mandara', 11, 1, 1),
(74, 'Mandara(Lichendale)', 11, 1, 1),
(75, 'Manresa', 11, 1, 1),
(76, 'Marimba Park', 11, 1, 1),
(77, 'Marlborough', 11, 1, 1),
(78, 'Mbare', 11, 1, 1),
(79, 'Meyrick Park', 11, 1, 1),
(80, 'Milton Park', 11, 1, 1),
(81, 'Monovale', 11, 1, 1),
(82, 'Mount Pleasant', 11, 1, 1),
(83, 'Msasa', 11, 1, 1),
(84, 'Msasa Park', 11, 1, 1),
(85, 'Mufakose', 11, 1, 1),
(86, 'New Marimba', 11, 1, 1),
(87, 'New Marlborough', 11, 1, 1),
(88, 'Newlands', 11, 1, 1),
(89, 'Northwood', 11, 1, 1),
(90, 'Park Meadowlands', 11, 1, 1),
(91, 'Parktown', 11, 1, 1),
(92, 'Philadelphia', 11, 1, 1),
(93, 'Pomona', 11, 1, 1),
(94, 'Prospect', 11, 1, 1),
(95, 'Queensdale', 11, 1, 1),
(96, 'Quinnington', 11, 1, 1),
(97, 'Rhodesville', 11, 1, 1),
(98, 'Ridgeview', 11, 1, 1),
(99, 'Rietfontein', 11, 1, 1),
(100, 'Rolf Valley', 11, 1, 1),
(101, 'Rugare', 11, 1, 1),
(102, 'Runniville', 11, 1, 1),
(103, 'Seke', 8, 2, 1),
(104, 'Sentosa', 11, 1, 1),
(105, 'Shawasha Hills', 11, 1, 1),
(106, 'Sherwood Park', 11, 1, 1),
(107, 'Southerton', 11, 1, 1),
(108, 'St. Andrews Park', 11, 1, 1),
(109, 'St. Martins', 11, 1, 1),
(110, 'St. Mary\'s', 8, 2, 1),
(111, 'Strathaven', 11, 1, 1),
(112, 'Sunningdale', 11, 1, 1),
(113, 'Sunridge', 11, 1, 1),
(114, 'Sunrise', 11, 1, 1),
(115, 'Tafara', 11, 1, 1),
(116, 'The Grange', 11, 1, 1),
(117, 'Tynwald', 11, 1, 1),
(118, 'Tynwald South', 11, 1, 1),
(119, 'Umwinsdale', 11, 1, 1),
(120, 'Uplands', 11, 1, 1),
(121, 'Vainona', 11, 1, 1),
(122, 'Warren Park', 11, 1, 1),
(123, 'Waterfalls', 11, 1, 1),
(124, 'Westgate', 11, 1, 1),
(125, 'Westlea', 11, 1, 1),
(126, 'Willowvale', 11, 1, 1),
(127, 'Wilmington Park', 11, 1, 1),
(128, 'Workington', 11, 1, 1),
(129, 'Zengeza', 8, 2, 1),
(130, 'Ascot', 3, 3, 2),
(131, 'Barbour Fields', 3, 3, 2),
(132, 'Barham Green', 3, 3, 2),
(133, 'Beacon Hill', 3, 3, 2),
(134, 'Bellevue', 3, 3, 2),
(135, 'Belmont', 3, 3, 2),
(136, 'Bradfield', 3, 3, 2),
(137, 'Burnside', 3, 3, 2),
(138, 'Cement', 3, 3, 2),
(139, 'Cowdray Park', 3, 3, 2),
(140, 'Donnington', 3, 3, 2),
(141, 'Douglasdale', 3, 3, 2),
(142, 'Eloana', 3, 3, 2),
(143, 'Emakhandeni', 3, 3, 2),
(144, 'Emganwini', 3, 3, 2),
(145, 'Enqameni', 3, 3, 2),
(146, 'Enqotsheni', 3, 3, 2),
(147, 'Entumbane', 3, 3, 2),
(148, 'Fagadola', 3, 3, 2),
(149, 'Famona', 3, 3, 2),
(150, 'Fortunes Gate (inclu', 3, 3, 2),
(151, 'Four Winds', 3, 3, 2),
(152, 'Glencoe', 3, 3, 2),
(153, 'Glengary', 3, 3, 2),
(154, 'Glenville (including', 3, 3, 2),
(155, 'Granite Park', 3, 3, 2),
(156, 'Greenhill', 3, 3, 2),
(157, 'Gwabalanda', 3, 3, 2),
(158, 'Harrisvale', 3, 3, 2),
(159, 'Helenvale', 3, 3, 2),
(160, 'Highmount', 3, 3, 2),
(161, 'Hillcrest', 3, 3, 2),
(163, 'Hillside South', 3, 3, 2),
(164, 'Hume Park', 3, 3, 2),
(165, 'Hyde Park', 3, 3, 2),
(166, 'Ilanda', 3, 3, 2),
(167, 'Iminyela', 3, 3, 2),
(168, 'Intini', 3, 3, 2),
(169, 'Jacaranda', 3, 3, 2),
(170, 'Kenilworth', 3, 3, 2),
(171, 'Khumalo', 3, 3, 2),
(172, 'Khumalo North', 3, 3, 2),
(173, 'Kilallo', 3, 3, 2),
(174, 'Killarney', 3, 3, 2),
(175, 'Kingsdale', 3, 3, 2),
(176, 'Lakeside', 3, 3, 2),
(177, 'Lobenvale', 3, 3, 2),
(178, 'Lobhengula', 3, 3, 2),
(179, 'Lochview', 3, 3, 2),
(180, 'Luveve', 3, 3, 2),
(181, 'Mabuthweni', 3, 3, 2),
(182, 'Magwegwe', 3, 3, 2),
(183, 'Magwegwe North', 3, 3, 2),
(184, 'Magwegwe West', 3, 3, 2),
(185, 'Mahatshula', 3, 3, 2),
(186, 'Makhokhoba', 3, 3, 2),
(187, 'Malindela', 3, 3, 2),
(188, 'Manningdale', 3, 3, 2),
(189, 'Marlands', 3, 3, 2),
(190, 'Matsheumhlope', 3, 3, 2),
(191, 'Matshobana', 3, 3, 2),
(192, 'Montgomery', 3, 3, 2),
(193, 'Montrose', 3, 3, 2),
(194, 'Morningside', 3, 3, 2),
(195, 'Mphophoma', 3, 3, 2),
(196, 'Munda', 3, 3, 2),
(197, 'Mzilikazi', 3, 3, 2),
(198, 'New Luveve', 3, 3, 2),
(199, 'Newsmansford', 3, 3, 2),
(200, 'Newton', 3, 3, 2),
(201, 'Newton West', 3, 3, 2),
(202, 'Nguboyenja', 3, 3, 2),
(203, 'Njube', 3, 3, 2),
(204, 'Nketa', 3, 3, 2),
(205, 'Nkulumane', 3, 3, 2),
(206, 'North End', 3, 3, 2),
(207, 'North Lynne', 3, 3, 2),
(208, 'North Trenance', 3, 3, 2),
(209, 'Northlea', 3, 3, 2),
(210, 'Northvale', 3, 3, 2),
(211, 'Ntaba Moyo', 3, 3, 2),
(212, 'Orange Grove', 3, 3, 2),
(213, 'Paddonhurst', 3, 3, 2),
(214, 'Parklands', 3, 3, 2),
(215, 'Parkview', 3, 3, 2),
(216, 'Phelandaba', 3, 3, 2),
(217, 'Phumula', 3, 3, 2),
(218, 'Phumula South', 3, 3, 2),
(219, 'Queens Park', 3, 3, 2),
(220, 'Queens Park East', 3, 3, 2),
(221, 'Queens Park West', 3, 3, 2),
(223, 'Rangemore', 3, 3, 2),
(224, 'Raylton', 3, 3, 2),
(225, 'Richmond', 3, 3, 2),
(226, 'Riverside', 3, 3, 2),
(227, 'Romney Park', 3, 3, 2),
(228, 'Sauerstown', 3, 3, 2),
(229, 'Selbourne Park', 3, 3, 2),
(230, 'Sizinda', 3, 3, 2),
(231, 'Southdale', 3, 3, 2),
(232, 'Souththwold', 3, 3, 2),
(233, 'Steeldale', 3, 3, 2),
(234, 'Suburbs', 3, 3, 2),
(235, 'Sunninghill', 3, 3, 2),
(236, 'Sunnyside', 3, 3, 2),
(237, 'Tegela', 3, 3, 2),
(238, 'The Jungle', 3, 3, 2),
(239, 'Thorngrove', 3, 3, 2),
(240, 'Trenance', 3, 3, 2),
(241, 'Tshabalala', 3, 3, 2),
(242, 'Tshabalala Extension', 3, 3, 2),
(243, 'Umguza Estate', 3, 3, 2),
(244, 'Upper Rangemore', 3, 3, 2),
(245, 'Waterford', 3, 3, 2),
(246, 'Waterlea', 3, 3, 2),
(247, 'West Somerton', 3, 3, 2),
(249, 'Westondale', 3, 3, 2),
(250, 'Willsgrove', 3, 3, 2),
(251, 'Windsor Park', 3, 3, 2),
(252, 'Woodlands', 3, 3, 2),
(253, 'Woodville', 3, 3, 2),
(254, 'Woodville Park', 3, 3, 2),
(255, 'Arcturus', 0, 0, 3),
(256, 'Beatrice', 0, 0, 3),
(257, 'Bondamakara', 0, 0, 3),
(258, 'Bromley', 0, 0, 3),
(259, 'Chivhu', 0, 0, 3),
(260, 'Epworth', 0, 0, 3),
(261, 'Goromonzi', 0, 5, 3),
(262, 'Headlands', 0, 0, 3),
(263, 'Juru', 0, 0, 3),
(264, 'Kotwa', 0, 8, 3),
(265, 'Macheke', 0, 7, 3),
(266, 'Mahusekwa', 0, 0, 3),
(267, 'Makaha', 0, 0, 3),
(268, 'Makosa', 0, 0, 3),
(269, 'Murewa', 0, 9, 3),
(270, 'Mutoko', 0, 10, 3),
(271, 'Nharira', 0, 0, 3),
(272, 'Nyamapanda', 0, 0, 3),
(273, 'Ruwa', 0, 0, 3),
(274, 'Sadza', 0, 0, 3),
(275, 'Suswe', 0, 0, 3),
(276, 'Wedza', 0, 6, 3),
(277, 'Glendale', 0, 0, 4),
(278, 'Guruve', 0, 14, 4),
(279, 'Matepatepa', 0, 0, 4),
(280, 'Mazowe', 0, 15, 4),
(281, 'Mt Darwin', 0, 16, 4),
(282, 'Mvurwi', 0, 0, 4),
(283, 'Shamva', 0, 19, 4),
(284, 'Alaska', 0, 0, 5),
(285, 'Banket', 0, 0, 5),
(286, 'Battlefields', 0, 0, 5),
(287, 'Bumi Hills', 0, 0, 5),
(288, 'Cape Haig', 0, 0, 5),
(289, 'Chakari', 0, 0, 5),
(290, 'Charara', 0, 0, 5),
(291, 'Chinengundu', 4, 20, 5),
(292, 'Chirundu', 0, 0, 5),
(293, 'Darwendale', 0, 0, 5),
(294, 'Doma', 0, 0, 5),
(295, 'Eiffel Flats', 0, 0, 5),
(296, 'Eldorado', 0, 0, 5),
(297, 'Feok', 0, 0, 5),
(298, 'Gadzema', 0, 0, 5),
(299, 'Golden Valley', 0, 0, 5),
(300, 'Kaguvi', 4, 20, 5),
(301, 'Kildonan', 0, 0, 5),
(302, 'Lion\'s Den', 0, 0, 5),
(303, 'Madadzi', 0, 0, 5),
(304, 'Magunje', 0, 0, 5),
(305, 'Makuti', 0, 0, 5),
(306, 'Makwiro', 0, 0, 5),
(307, 'Mhangura', 0, 0, 5),
(308, 'Mubayira', 0, 0, 5),
(309, 'Munyati', 0, 0, 5),
(310, 'Muriel', 0, 0, 5),
(311, 'Murombedzi', 0, 0, 5),
(312, 'Mutorashanga', 0, 0, 5),
(313, 'Mwami', 0, 0, 5),
(314, 'Orlando Heights', 0, 0, 5),
(315, 'Pfupajena', 4, 20, 5),
(316, 'Raffingora', 0, 0, 5),
(317, 'Sanyati', 0, 0, 5),
(318, 'Selous', 0, 0, 5),
(319, 'Shackleton', 0, 0, 5),
(320, 'Tashinga', 0, 0, 5),
(321, 'Tengwe', 0, 0, 5),
(322, 'Trelawney', 0, 0, 5),
(323, 'Umsweswe', 0, 0, 5),
(324, 'Umvovo', 4, 20, 5),
(325, 'Unsworth', 0, 0, 5),
(326, 'Vanad', 0, 0, 5),
(327, 'Venice', 0, 0, 5),
(328, 'Vuti', 0, 0, 5),
(329, 'Zave', 0, 0, 5),
(330, 'Amaveni Township', 15, 44, 8),
(331, 'Beverly Hills', 15, 44, 8),
(332, 'Chicago', 15, 44, 8),
(333, 'Fitchlea', 15, 44, 8),
(334, 'Gaika', 15, 44, 8),
(335, 'Golden Acres', 15, 44, 8),
(336, 'Goldrich', 15, 44, 8),
(337, 'Hillandale', 15, 44, 8),
(338, 'Mbizo Township', 15, 44, 8),
(340, 'Newtown', 15, 44, 8),
(341, 'Southwood', 15, 44, 8),
(342, 'Basera', 0, 0, 9),
(343, 'Bikita', 0, 0, 9),
(344, 'Bubye River', 0, 0, 9),
(345, 'Buffalo Range', 0, 0, 9),
(346, 'Chatsworth', 0, 0, 9),
(347, 'Chivi', 0, 0, 9),
(348, 'Estvale', 17, 52, 9),
(349, 'Felixburg', 0, 0, 9),
(350, 'Gaths Mine', 0, 0, 9),
(351, 'Glenclova', 0, 0, 9),
(352, 'Glenlivet', 0, 0, 9),
(353, 'Gurajena', 0, 0, 9),
(354, 'Gutu', 0, 0, 9),
(355, 'Gwengwerere GP', 0, 0, 9),
(356, 'Hippo Valley', 0, 0, 9),
(357, 'Mabalauta', 0, 0, 9),
(358, 'Maranda', 0, 0, 9),
(359, 'Mashava', 0, 0, 9),
(360, 'Mbizi', 0, 0, 9),
(361, 'Mucheke', 17, 52, 9),
(362, 'Mupandawana', 0, 0, 9),
(363, 'Musekiwa', 0, 0, 9),
(364, 'Mwenezi', 0, 0, 9),
(365, 'Ndanga', 0, 0, 9),
(366, 'Nemanwa', 0, 0, 9),
(367, 'Ngomahuru', 0, 0, 9),
(368, 'Ngundu', 0, 0, 9),
(369, 'Renco', 0, 0, 9),
(370, 'Rhodene ', 17, 52, 9),
(371, 'Rujeko', 17, 52, 9),
(372, 'Rutenga', 0, 0, 9),
(373, 'Sango', 0, 0, 9),
(374, 'Soti-Source', 0, 0, 9),
(375, 'Target Kopje', 17, 52, 9),
(376, 'Triangle', 0, 0, 9),
(377, 'Tswiza', 0, 0, 9),
(378, 'Zaka', 0, 0, 9),
(379, 'Zimuto Siding', 0, 0, 9),
(380, 'Birchenough Bridge', 0, 0, 10),
(381, 'Bordervale', 18, 59, 10),
(382, 'Buhera', 0, 55, 10),
(383, 'Cashel', 0, 0, 10),
(384, 'Chikanga', 18, 59, 10),
(385, 'Chipinge', 0, 57, 10),
(386, 'Dangamvura', 18, 59, 10),
(387, 'Darlington', 18, 59, 10),
(388, 'Education[edit]', 18, 59, 10),
(389, 'Fairbridge Park', 18, 59, 10),
(390, 'Fern valley', 18, 59, 10),
(391, 'Florida', 18, 59, 10),
(392, 'Garikai Hlalani Kuhl', 18, 59, 10),
(393, 'Gimboki', 18, 59, 10),
(394, 'Greenside', 18, 59, 10),
(395, 'Hauna', 0, 0, 10),
(396, 'HobHosuse', 18, 59, 10),
(397, 'Mai Maria', 18, 59, 10),
(399, 'Murambi', 18, 59, 10),
(400, 'Musha Mukadzi', 18, 59, 10),
(401, 'Natview Park', 18, 59, 10),
(402, 'Nyanga', 0, 61, 10),
(403, 'Nyazura', 0, 0, 10),
(404, 'Palmerston', 18, 59, 10),
(405, 'Sakubva', 18, 59, 10),
(406, 'Tiger\'s Kloof', 18, 59, 10),
(407, 'Tizvione', 0, 0, 10),
(408, 'Toronto', 18, 59, 10),
(409, 'Utopia', 18, 59, 10),
(410, 'Weirmouth', 18, 59, 10),
(412, 'Yeovil', 18, 59, 10),
(413, 'Zimunya', 18, 59, 10);

-- --------------------------------------------------------

--
-- Table structure for table `match_current_schools`
--

DROP TABLE IF EXISTS `match_current_schools`;
CREATE TABLE IF NOT EXISTS `match_current_schools` (
  `mcs_id` int(6) NOT NULL AUTO_INCREMENT,
  `mcs_client_ec_no` char(15) NOT NULL,
  `mcs_school_id` int(11) NOT NULL,
  `mcs_distr_id` int(11) NOT NULL,
  `mcs_province_id` int(11) NOT NULL,
  `mcs_client_level_taught` char(30) NOT NULL,
  `mcs_sub1_id` int(11) DEFAULT NULL,
  `mcs_sub2_id` int(11) DEFAULT NULL,
  `mcs_status` varchar(1) DEFAULT 'A',
  `mcs_loc_id` int(11) NOT NULL,
  `mcs_town_id` int(11) NOT NULL,
  PRIMARY KEY (`mcs_id`),
  UNIQUE KEY `UNIQUE` (`mcs_client_ec_no`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `match_current_schools`
--

REPLACE INTO `match_current_schools` (`mcs_id`, `mcs_client_ec_no`, `mcs_school_id`, `mcs_distr_id`, `mcs_province_id`, `mcs_client_level_taught`, `mcs_sub1_id`, `mcs_sub2_id`, `mcs_status`, `mcs_loc_id`, `mcs_town_id`) VALUES
(1, 'EC4567', 92, 9, 8, 'HIGH SCHOOL - UP TO A LEVEL', 33, 31, 'A', 0, 0),
(2, 'EC46665', 15, 50, 5, 'HIGH SCHOOL - UP TO A LEVEL', 1, 3, 'A', 0, 0),
(4, 'TAT377', 15, 27, 3, 'HIGH SCHOOL - UP TO A LEVEL', 5, 6, 'A', 0, 0),
(5, 'TIN0125', 48, 27, 3, 'HIGH SCHOOL - UP TO A LEVEL', 1, 9, 'A', 0, 0),
(6, '5101281 V', 36, 11, 3, 'PRIMARY - GENERAL', NULL, NULL, 'A', 0, 0),
(7, 'GL98888', 6, 26, 4, 'HIGH SCHOOL - UP TO O LEVEL', 8, 11, 'A', 0, 0),
(8, 'MUN908', 64, 42, 4, 'HIGH SCHOOL - UP TO O LEVEL', 3, 13, 'A', 0, 0),
(9, 'MAN089', 15, 41, 4, 'HIGH SCHOOL - UP TO O LEVEL', 2, 6, 'A', 0, 0),
(10, 'ALF1252', 14, 50, 2, 'PRIMARY - GENERAL', NULL, NULL, 'A', 0, 0),
(11, 'CHA1252', 14, 50, 2, 'PRIMARY - GENERAL', NULL, NULL, 'A', 0, 0),
(12, 'TAS4752', 19, 5, 1, 'PRIMARY - ECD', NULL, NULL, 'A', 0, 0),
(13, 'MAP002', 32, 5, 2, 'PRIMARY - ECD', NULL, NULL, 'A', 0, 0),
(14, 'TIN142', 19, 61, 1, 'PRIMARY - ECD', NULL, NULL, 'A', 0, 0),
(16, 'CLE123', 34, 41, 2, 'HIGH SCHOOL - UP TO O LEVEL', 21, 22, 'A', 0, 0),
(19, 'BONGS', 19, 41, 1, 'HIGH SCHOOL - UP TO O LEVEL', 3, 8, 'A', 0, 0),
(21, 'SAL123', 18, 49, 7, 'HIGH SCHOOL - UP TO O LEVEL', 15, 19, 'A', 0, 0),
(22, 'CHI0212', 18, 5, 1, 'HIGH SCHOOL - UP TO O LEVEL', 1, 11, 'A', 0, 0),
(23, 'MIC789', 18, 42, 7, 'PRIMARY - GENERAL', NULL, NULL, 'A', 0, 0),
(24, 'HEL421', 0, 13, 4, 'HIGH SCHOOL - UP TO O LEVEL', 3, 14, 'A', 0, 0),
(28, 'TAP232', 19, 41, 4, 'HIGH SCHOOL - UP TO A LEVEL', 6, 16, 'A', 0, 0),
(30, 'CHA125', 4, 24, 2, 'HIGH SCHOOL - UP TO O LEVEL', NULL, 16, 'A', 0, 0),
(33, 'BYR001', 138, 7, 6, 'HIGH SCHOOL - UP TO A LEVEL', 23, 24, 'A', 0, 0),
(34, 'THE452', 104, 10, 6, 'HIGH SCHOOL - UP TO O LEVEL', 20, 21, 'A', 0, 0),
(35, 'TIC021', 40, 58, 4, 'HIGH SCHOOL - UP TO O LEVEL', 9, 21, 'A', 0, 0),
(36, 'TES001', 59, 27, 10, 'HIGH SCHOOL - UP TO O LEVEL', 13, 21, 'A', 0, 0),
(37, 'TES002', 17, 2, 9, 'HIGH SCHOOL - UP TO O LEVEL', 1, 13, 'A', 0, 0),
(38, 'tes003', 26, 50, 6, 'HIGH SCHOOL - UP TO A LEVEL', 7, 20, 'A', 0, 0),
(39, 'tes004', 15, 42, 10, 'PRIMARY - ECD', NULL, NULL, 'A', 0, 0),
(41, 'TES006', 41, 12, 7, 'HIGH SCHOOL - UP TO O LEVEL', 13, 24, 'A', 0, 0),
(54, 'REG1', 11, 42, 8, 'HIGH SCHOOL - UP TO O LEVEL', 3, 7, 'A', 0, 0),
(55, 'REG2', 39, 42, 10, 'PRIMARY - GENERAL', NULL, NULL, 'A', 0, 0),
(56, 'REG3', 51, 44, 4, 'PRIMARY - ECD', NULL, NULL, 'A', 0, 0),
(57, 'REG4', 47, 5, 10, 'HIGH SCHOOL - UP TO O LEVEL', 6, 9, 'A', 0, 0),
(58, 'REG5', 14, 50, 10, 'HIGH SCHOOL - UP TO A LEVEL', 18, 26, 'A', 0, 0),
(74, 'TES008', 16, 5, 4, 'HIGH SCHOOL - UP TO O LEVEL', 2, 21, 'A', 0, 0),
(78, 'TES009', 13, 2, 4, 'HIGH SCHOOL - UP TO O LEVEL', NULL, NULL, 'A', 0, 0),
(79, 'TES010', 19, 2, 3, 'HIGH SCHOOL - UP TO O LEVEL', 3, 30, 'A', 0, 0),
(82, 'MAR002', 64, 41, 9, 'HIGH SCHOOL - UP TO O LEVEL', 13, 14, 'A', 0, 0),
(83, 'TAZ001', 203, 2, 8, 'HIGH SCHOOL - UP TO O LEVEL', 9, 30, 'A', 0, 0),
(84, 'IZV002', 17, 3, 4, 'HIGH SCHOOL - UP TO O LEVEL', NULL, 13, 'A', 0, 0),
(85, 'TAZ002', 169, 41, 7, 'HIGH SCHOOL - UP TO A LEVEL', 7, 24, 'A', 0, 0),
(87, 'PET123', 151, 13, 5, 'HIGH SCHOOL - UP TO A LEVEL', 3, 6, 'A', 0, 0),
(88, 'PET124', 157, 56, 8, 'HIGH SCHOOL - UP TO O LEVEL', 28, 32, 'A', 0, 0),
(89, 'MAK56', 14, 42, 1, 'HIGH SCHOOL - UP TO O LEVEL', 13, 14, 'A', 0, 0),
(90, 'TRY001', 71, 42, 10, 'HIGH SCHOOL - UP TO O LEVEL', 6, 9, 'A', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `match_pref_districts`
--

DROP TABLE IF EXISTS `match_pref_districts`;
CREATE TABLE IF NOT EXISTS `match_pref_districts` (
  `mpd_id` int(11) NOT NULL AUTO_INCREMENT,
  `mpd_distr_id` int(11) NOT NULL,
  `mpd_client_ec_no` varchar(10) NOT NULL,
  `mpd_status` varchar(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`mpd_id`) USING BTREE,
  UNIQUE KEY `UNIQUE` (`mpd_client_ec_no`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `match_pref_districts`
--

REPLACE INTO `match_pref_districts` (`mpd_id`, `mpd_distr_id`, `mpd_client_ec_no`, `mpd_status`) VALUES
(3, 41, 'EC46665', 'A'),
(5, 27, 'TAS4752', 'A'),
(21, 5, 'TIN456', 'A'),
(27, 5, 'TEM021', 'A'),
(29, 33, 'TAP232', 'A'),
(34, 48, 'CHA125', 'A'),
(36, 40, 'THE452', 'A'),
(37, 33, 'TES002', 'A'),
(45, 34, 'REG2', 'A'),
(47, 33, 'MAR002', 'A'),
(51, 40, 'PET123', 'A'),
(52, 21, 'PET124', 'A'),
(53, 32, 'EC4567', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `match_pref_districts2`
--

DROP TABLE IF EXISTS `match_pref_districts2`;
CREATE TABLE IF NOT EXISTS `match_pref_districts2` (
  `mpd2_id` int(11) NOT NULL AUTO_INCREMENT,
  `mpd2_distr_id` int(11) NOT NULL,
  `mpd2_client_ec_no` varchar(10) NOT NULL,
  `mpd2_status` varchar(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`mpd2_id`),
  UNIQUE KEY `UNIQUE` (`mpd2_client_ec_no`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `match_pref_districts2`
--

REPLACE INTO `match_pref_districts2` (`mpd2_id`, `mpd2_distr_id`, `mpd2_client_ec_no`, `mpd2_status`) VALUES
(4, 42, 'EC46665', 'A'),
(6, 55, 'TAS4752', 'A'),
(22, 5, 'TIN456', 'A'),
(28, 5, 'TEM021', 'A'),
(30, 25, 'TAP232', 'A'),
(35, 50, 'CHA125', 'A'),
(38, 50, 'TES002', 'A'),
(46, 50, 'REG2', 'A'),
(48, 55, 'MAR002', 'A'),
(49, 55, 'PET123', 'A'),
(50, 60, 'PET452', 'A'),
(51, 53, 'PET124', 'A'),
(52, 31, 'EC4567', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `match_pref_locations`
--

DROP TABLE IF EXISTS `match_pref_locations`;
CREATE TABLE IF NOT EXISTS `match_pref_locations` (
  `mpl_id` int(11) NOT NULL AUTO_INCREMENT,
  `mpl_loc_id` int(11) NOT NULL,
  `mpl_client_ec_no` varchar(10) NOT NULL,
  `mpl_status` varchar(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`mpl_id`),
  UNIQUE KEY `UNIQUE` (`mpl_client_ec_no`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `match_pref_locations`
--

REPLACE INTO `match_pref_locations` (`mpl_id`, `mpl_loc_id`, `mpl_client_ec_no`, `mpl_status`) VALUES
(1, 288, 'MUN908', 'A'),
(15, 11, 'BONGS', 'A'),
(28, 4, 'SAL123', 'A'),
(30, 11, 'CHI0212', 'A'),
(34, 13, 'BYR001', 'A'),
(38, 8, 'tes004', 'A'),
(44, 131, 'REG4', 'A'),
(46, 11, 'IZV002', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `match_pref_locations2`
--

DROP TABLE IF EXISTS `match_pref_locations2`;
CREATE TABLE IF NOT EXISTS `match_pref_locations2` (
  `mpl2_id` int(11) NOT NULL AUTO_INCREMENT,
  `mpl2_loc_id` int(11) NOT NULL,
  `mpl2_client_ec_no` varchar(10) NOT NULL,
  `mpl2_status` varchar(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`mpl2_id`),
  UNIQUE KEY `UNIQUE` (`mpl2_client_ec_no`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `match_pref_locations2`
--

REPLACE INTO `match_pref_locations2` (`mpl2_id`, `mpl2_loc_id`, `mpl2_client_ec_no`, `mpl2_status`) VALUES
(2, 135, 'MUN908', 'A'),
(13, 10, 'BONGS', 'A'),
(27, 13, 'SAL123', 'A'),
(31, 131, 'CHI0212', 'A'),
(35, 131, 'BYR001', 'A'),
(38, 257, 'tes004', 'A'),
(43, 11, 'REG4', 'A'),
(46, 13, 'IZV002', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `match_pref_locations3`
--

DROP TABLE IF EXISTS `match_pref_locations3`;
CREATE TABLE IF NOT EXISTS `match_pref_locations3` (
  `mpl3_id` int(11) NOT NULL AUTO_INCREMENT,
  `mpl3_loc_id` int(11) NOT NULL,
  `mpl3_client_ec_no` varchar(10) NOT NULL,
  `mpl3_status` varchar(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`mpl3_id`),
  UNIQUE KEY `UNIQUE` (`mpl3_client_ec_no`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `match_pref_locations3`
--

REPLACE INTO `match_pref_locations3` (`mpl3_id`, `mpl3_loc_id`, `mpl3_client_ec_no`, `mpl3_status`) VALUES
(3, 344, 'MUN908', 'A'),
(15, 11, 'BONGS', 'A'),
(28, 4, 'SAL123', 'A'),
(32, 13, 'CHI0212', 'A'),
(36, 17, 'BYR001', 'A'),
(44, 131, 'REG4', 'A'),
(46, 8, 'IZV002', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `match_pref_provinces`
--

DROP TABLE IF EXISTS `match_pref_provinces`;
CREATE TABLE IF NOT EXISTS `match_pref_provinces` (
  `mpp_id` int(11) NOT NULL AUTO_INCREMENT,
  `mpp_province_id` int(11) NOT NULL,
  `mpp_client_ec_no` varchar(10) NOT NULL,
  `mpp_status` varchar(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`mpp_id`),
  UNIQUE KEY `provUnique` (`mpp_client_ec_no`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `match_pref_provinces`
--

REPLACE INTO `match_pref_provinces` (`mpp_id`, `mpp_province_id`, `mpp_client_ec_no`, `mpp_status`) VALUES
(2, 10, 'CHA1252', 'A'),
(5, 2, 'COH125', 'A'),
(12, 5, 'TES006', 'A'),
(28, 5, 'TES008', 'A'),
(32, 9, 'TES009', 'A'),
(33, 4, 'TES010', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `match_pref_schools`
--

DROP TABLE IF EXISTS `match_pref_schools`;
CREATE TABLE IF NOT EXISTS `match_pref_schools` (
  `mps_id` int(11) NOT NULL AUTO_INCREMENT,
  `mps_school_id` int(11) NOT NULL,
  `mps_client_ec_no` varchar(10) NOT NULL,
  `mps_status` varchar(1) DEFAULT 'A',
  `mps_client_level_taught` char(30) NOT NULL,
  `mps_sub1_id` int(11) DEFAULT NULL,
  `mps_sub2_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`mps_id`),
  UNIQUE KEY `UNIQUE` (`mps_client_ec_no`),
  KEY `mps-key` (`mps_school_id`,`mps_client_ec_no`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `match_pref_schools`
--

REPLACE INTO `match_pref_schools` (`mps_id`, `mps_school_id`, `mps_client_ec_no`, `mps_status`, `mps_client_level_taught`, `mps_sub1_id`, `mps_sub2_id`) VALUES
(2, 75, 'TIN0125', 'A', 'HIGH SCHOOL - UP TO A LEVEL', 1, 9),
(7, 71, 'MAN089', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 2, 6),
(41, 14, 'TAS4752', 'A', 'PRIMARY - ECD', 0, 0),
(50, 14, 'MAP002', 'A', 'PRIMARY - ECD', 0, 0),
(82, 84, 'THE452', 'A', 'HIGH SCHOOL - O LEVEL', 20, 21),
(89, 1, 'TIC021', 'A', 'HIGH SCHOOL - ZJC', 9, 21),
(107, 61, 'TES001', 'A', 'HIGH SCHOOL - O LEVEL', 13, 21),
(111, 6, 'REG5', 'A', 'HIGH SCHOOL - UP TO A LEVEL', 18, 26),
(119, 42, 'TES008', 'A', 'HIGH SCHOOL - O LEVEL', 2, 21),
(121, 187, 'TAZ001', 'A', 'HIGH SCHOOL - O LEVEL', 9, 30),
(122, 221, 'TAZ002', 'A', 'HIGH SCHOOL - UP TO A LEVEL', 7, 24),
(123, 67, 'MAK56', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 13, 14),
(126, 2, 'REG1', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 3, 7),
(127, 65, 'TRY001', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `match_pref_schools2`
--

DROP TABLE IF EXISTS `match_pref_schools2`;
CREATE TABLE IF NOT EXISTS `match_pref_schools2` (
  `mps2_id` int(11) NOT NULL AUTO_INCREMENT,
  `mps2_school_id` int(11) NOT NULL,
  `mps2_client_ec_no` varchar(10) NOT NULL,
  `mps2_status` varchar(1) DEFAULT 'A',
  `mps2_client_level_taught` char(30) NOT NULL,
  `mps2_sub1_id` int(11) DEFAULT NULL,
  `mps2_sub2_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`mps2_id`),
  UNIQUE KEY `UNIQUE` (`mps2_client_ec_no`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `match_pref_schools2`
--

REPLACE INTO `match_pref_schools2` (`mps2_id`, `mps2_school_id`, `mps2_client_ec_no`, `mps2_status`, `mps2_client_level_taught`, `mps2_sub1_id`, `mps2_sub2_id`) VALUES
(3, 42, 'TIN0125', 'A', '', 0, 0),
(8, 18, 'MAN089', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 2, 6),
(45, 6, 'MAP002', 'A', '', 0, 0),
(83, 6, 'THE452', 'A', '', 0, 0),
(90, 2, 'TIC021', 'A', '', 0, 0),
(96, 9, 'tes005', 'A', '', 0, 0),
(108, 53, 'TES001', 'A', '', 0, 0),
(112, 15, 'REG5', 'A', '', 0, 0),
(121, 82, 'TAZ001', 'A', '', 0, 0),
(122, 205, 'TAZ002', 'A', '', 0, 0),
(123, 165, 'MAK56', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 13, 14),
(126, 9, 'REG1', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 3, 7),
(127, 69, 'TRY001', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `match_pref_schools3`
--

DROP TABLE IF EXISTS `match_pref_schools3`;
CREATE TABLE IF NOT EXISTS `match_pref_schools3` (
  `mps3_id` int(11) NOT NULL AUTO_INCREMENT,
  `mps3_school_id` int(11) NOT NULL,
  `mps3_client_ec_no` varchar(10) NOT NULL,
  `mps3_status` varchar(1) DEFAULT 'A',
  `mps3_client_level_taught` char(30) NOT NULL,
  `mps3_sub1_id` int(11) DEFAULT NULL,
  `mps3_sub2_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`mps3_id`),
  UNIQUE KEY `UNIQUE` (`mps3_client_ec_no`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `match_pref_schools3`
--

REPLACE INTO `match_pref_schools3` (`mps3_id`, `mps3_school_id`, `mps3_client_ec_no`, `mps3_status`, `mps3_client_level_taught`, `mps3_sub1_id`, `mps3_sub2_id`) VALUES
(4, 32, 'TIN0125', 'A', '', 0, 0),
(9, 16, 'MAN089', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 2, 6),
(46, 8, 'MAP002', 'A', '', 0, 0),
(84, 18, 'THE452', 'A', '', 0, 0),
(91, 4, 'TIC021', 'A', '', 0, 0),
(97, 48, 'tes005', 'A', '', 0, 0),
(109, 56, 'TES001', 'A', '', 0, 0),
(113, 12, 'REG5', 'A', '', 0, 0),
(120, 64, 'TAZ001', 'A', '', 0, 0),
(121, 30, 'TAZ002', 'A', '', 0, 0),
(122, 103, 'MAK56', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 13, 14),
(123, 171, 'TRY001', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `match_pref_schools4`
--

DROP TABLE IF EXISTS `match_pref_schools4`;
CREATE TABLE IF NOT EXISTS `match_pref_schools4` (
  `mps4_id` int(11) NOT NULL AUTO_INCREMENT,
  `mps4_school_id` int(11) NOT NULL,
  `mps4_client_ec_no` varchar(10) NOT NULL,
  `mps4_status` varchar(1) DEFAULT 'A',
  `mps4_client_level_taught` char(30) NOT NULL,
  `mps4_sub1_id` int(11) DEFAULT NULL,
  `mps4_sub2_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`mps4_id`),
  UNIQUE KEY `UNIQUE` (`mps4_client_ec_no`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `match_pref_schools4`
--

REPLACE INTO `match_pref_schools4` (`mps4_id`, `mps4_school_id`, `mps4_client_ec_no`, `mps4_status`, `mps4_client_level_taught`, `mps4_sub1_id`, `mps4_sub2_id`) VALUES
(5, 34, 'TIN0125', 'A', '', 0, 0),
(50, 14, 'MAP002', 'A', '', 0, 0),
(85, 30, 'THE452', 'A', '', 0, 0),
(92, 6, 'TIC021', 'A', '', 0, 0),
(98, 64, 'tes005', 'A', '', 0, 0),
(110, 45, 'TES001', 'A', '', 0, 0),
(114, 19, 'REG5', 'A', '', 0, 0),
(120, 160, 'TAZ001', 'A', '', 0, 0),
(121, 12, 'TAZ002', 'A', '', 0, 0),
(122, 67, 'MAN089', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 2, 6),
(123, 119, 'MAK56', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 13, 14),
(124, 119, 'TRY001', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `match_pref_schools5`
--

DROP TABLE IF EXISTS `match_pref_schools5`;
CREATE TABLE IF NOT EXISTS `match_pref_schools5` (
  `mps5_id` int(11) NOT NULL AUTO_INCREMENT,
  `mps5_school_id` int(11) NOT NULL,
  `mps5_client_ec_no` varchar(10) NOT NULL,
  `mps5_status` varchar(1) NOT NULL DEFAULT 'A',
  `mps5_client_level_taught` char(30) NOT NULL,
  `mps5_sub1_id` int(11) DEFAULT NULL,
  `mps5_sub2_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`mps5_id`),
  UNIQUE KEY `UNIQUE` (`mps5_client_ec_no`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `match_pref_schools5`
--

REPLACE INTO `match_pref_schools5` (`mps5_id`, `mps5_school_id`, `mps5_client_ec_no`, `mps5_status`, `mps5_client_level_taught`, `mps5_sub1_id`, `mps5_sub2_id`) VALUES
(6, 36, 'TIN0125', 'A', '', 0, 0),
(51, 15, 'MAP002', 'A', '', 0, 0),
(86, 44, 'THE452', 'A', '', 0, 0),
(93, 8, 'TIC021', 'A', '', 0, 0),
(115, 11, 'REG5', 'A', '', 0, 0),
(120, 95, 'TAZ001', 'A', '', 0, 0),
(121, 8, 'TAZ002', 'A', '', 0, 0),
(122, 42, 'MAN089', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 2, 6),
(123, 64, 'MAK56', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 13, 14),
(124, 15, 'TRY001', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `match_pref_schools6`
--

DROP TABLE IF EXISTS `match_pref_schools6`;
CREATE TABLE IF NOT EXISTS `match_pref_schools6` (
  `mps6_id` int(11) NOT NULL AUTO_INCREMENT,
  `mps6_school_id` int(11) NOT NULL,
  `mps6_client_ec_no` varchar(10) NOT NULL,
  `mps6_status` varchar(1) NOT NULL DEFAULT 'A',
  `mps6_client_level_taught` char(30) NOT NULL,
  `mps6_sub1_id` int(11) DEFAULT NULL,
  `mps6_sub2_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`mps6_id`),
  UNIQUE KEY `UNIQUE` (`mps6_client_ec_no`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `match_pref_schools6`
--

REPLACE INTO `match_pref_schools6` (`mps6_id`, `mps6_school_id`, `mps6_client_ec_no`, `mps6_status`, `mps6_client_level_taught`, `mps6_sub1_id`, `mps6_sub2_id`) VALUES
(87, 29, 'THE452', 'A', '', 0, 0),
(94, 9, 'TIC021', 'A', '', 0, 0),
(116, 9, 'REG5', 'A', '', 0, 0),
(120, 115, 'TAZ001', 'A', '', 0, 0),
(121, 6, 'TAZ002', 'A', '', 0, 0),
(122, 24, 'MAN089', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 2, 6),
(123, 115, 'MAK56', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 13, 14),
(124, 160, 'TRY001', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `match_pref_schools7`
--

DROP TABLE IF EXISTS `match_pref_schools7`;
CREATE TABLE IF NOT EXISTS `match_pref_schools7` (
  `mps7_id` int(11) NOT NULL AUTO_INCREMENT,
  `mps7_school_id` int(11) NOT NULL,
  `mps7_client_ec_no` varchar(10) NOT NULL,
  `mps7_status` varchar(1) NOT NULL DEFAULT 'A',
  `mps7_client_level_taught` char(30) NOT NULL,
  `mps7_sub1_id` int(11) DEFAULT NULL,
  `mps7_sub2_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`mps7_id`),
  UNIQUE KEY `UNIQUE` (`mps7_client_ec_no`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `match_pref_schools7`
--

REPLACE INTO `match_pref_schools7` (`mps7_id`, `mps7_school_id`, `mps7_client_ec_no`, `mps7_status`, `mps7_client_level_taught`, `mps7_sub1_id`, `mps7_sub2_id`) VALUES
(88, 11, 'THE452', 'A', '', 0, 0),
(117, 26, 'REG5', 'A', '', 0, 0),
(120, 99, 'TAZ001', 'A', '', 0, 0),
(121, 31, 'TAZ002', 'A', '', 0, 0),
(122, 34, 'MAN089', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 2, 6),
(123, 151, 'MAK56', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 13, 14),
(124, 164, 'TRY001', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `match_pref_schools8`
--

DROP TABLE IF EXISTS `match_pref_schools8`;
CREATE TABLE IF NOT EXISTS `match_pref_schools8` (
  `mps8_id` int(11) NOT NULL AUTO_INCREMENT,
  `mps8_school_id` int(11) NOT NULL,
  `mps8_client_ec_no` varchar(10) NOT NULL,
  `mps8_status` varchar(1) NOT NULL DEFAULT 'A',
  `mps8_client_level_taught` char(30) NOT NULL,
  `mps8_sub1_id` int(11) DEFAULT NULL,
  `mps8_sub2_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`mps8_id`),
  UNIQUE KEY `UNIQUE` (`mps8_client_ec_no`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `match_pref_schools8`
--

REPLACE INTO `match_pref_schools8` (`mps8_id`, `mps8_school_id`, `mps8_client_ec_no`, `mps8_status`, `mps8_client_level_taught`, `mps8_sub1_id`, `mps8_sub2_id`) VALUES
(118, 31, 'REG5', 'A', '', 0, 0),
(120, 77, 'TAZ001', 'A', '', 0, 0),
(121, 29, 'TAZ002', 'A', '', 0, 0),
(122, 64, 'MAN089', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 2, 6),
(123, 160, 'MAK56', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 13, 14),
(124, 242, 'TRY001', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `match_pref_schools9`
--

DROP TABLE IF EXISTS `match_pref_schools9`;
CREATE TABLE IF NOT EXISTS `match_pref_schools9` (
  `mps9_id` int(11) NOT NULL AUTO_INCREMENT,
  `mps9_school_id` int(11) NOT NULL,
  `mps9_client_ec_no` varchar(10) NOT NULL,
  `mps9_status` varchar(1) NOT NULL DEFAULT 'A',
  `mps9_client_level_taught` char(30) NOT NULL,
  `mps9_sub1_id` int(11) DEFAULT NULL,
  `mps9_sub2_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`mps9_id`),
  UNIQUE KEY `UNIQUE` (`mps9_client_ec_no`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `match_pref_schools9`
--

REPLACE INTO `match_pref_schools9` (`mps9_id`, `mps9_school_id`, `mps9_client_ec_no`, `mps9_status`, `mps9_client_level_taught`, `mps9_sub1_id`, `mps9_sub2_id`) VALUES
(1, 1, 'TAZ001', 'A', '', 0, 0),
(120, 41, 'TAZ002', 'A', '', 0, 0),
(121, 53, 'MAN089', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 2, 6),
(122, 225, 'MAK56', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 13, 14),
(123, 208, 'TRY001', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `match_pref_schools10`
--

DROP TABLE IF EXISTS `match_pref_schools10`;
CREATE TABLE IF NOT EXISTS `match_pref_schools10` (
  `mps10_id` int(11) NOT NULL AUTO_INCREMENT,
  `mps10_school_id` int(11) NOT NULL,
  `mps10_client_ec_no` varchar(10) NOT NULL,
  `mps10_status` varchar(1) NOT NULL DEFAULT 'A',
  `mps10_client_level_taught` char(30) NOT NULL,
  `mps10_sub1_id` int(11) DEFAULT NULL,
  `mps10_sub2_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`mps10_id`),
  UNIQUE KEY `UNIQUE` (`mps10_client_ec_no`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `match_pref_schools10`
--

REPLACE INTO `match_pref_schools10` (`mps10_id`, `mps10_school_id`, `mps10_client_ec_no`, `mps10_status`, `mps10_client_level_taught`, `mps10_sub1_id`, `mps10_sub2_id`) VALUES
(1, 2, 'TAZ001', 'A', '', 0, 0),
(120, 240, 'TAZ002', 'A', '', 0, 0),
(121, 15, 'MAN089', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 2, 6),
(122, 221, 'MAK56', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 13, 14),
(123, 205, 'TRY001', 'A', 'HIGH SCHOOL - UP TO O LEVEL', 6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `match_pref_towns`
--

DROP TABLE IF EXISTS `match_pref_towns`;
CREATE TABLE IF NOT EXISTS `match_pref_towns` (
  `mpt_id` int(11) NOT NULL AUTO_INCREMENT,
  `mpt_town_id` int(11) NOT NULL,
  `mpt_client_ec_no` varchar(10) NOT NULL,
  `mpt_status` varchar(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`mpt_id`),
  UNIQUE KEY `prefTown` (`mpt_client_ec_no`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `match_pref_towns`
--

REPLACE INTO `match_pref_towns` (`mpt_id`, `mpt_town_id`, `mpt_client_ec_no`, `mpt_status`) VALUES
(1, 14, 'TAT377', 'A'),
(3, 20, 'GL98888', 'A'),
(4, 18, 'REG3', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
CREATE TABLE IF NOT EXISTS `provinces` (
  `province_id` int(11) NOT NULL AUTO_INCREMENT,
  `province_name` varchar(20) NOT NULL,
  PRIMARY KEY (`province_id`),
  UNIQUE KEY `UNIQUE` (`province_name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinces`
--

REPLACE INTO `provinces` (`province_id`, `province_name`) VALUES
(2, 'Bulawayo'),
(1, 'Harare'),
(10, 'Manicaland'),
(4, 'Mashonaland Central'),
(3, 'Mashonaland East'),
(5, 'Mashonaland West'),
(9, 'Masvingo'),
(6, 'Matebeleland North'),
(7, 'Matebeleland South'),
(8, 'Midlands');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
CREATE TABLE IF NOT EXISTS `schools` (
  `school_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(30) NOT NULL,
  `school_level` varchar(10) NOT NULL,
  `school_distr_id` int(11) NOT NULL,
  `school_province_id` int(11) NOT NULL,
  `school_town_id` int(11) NOT NULL,
  `school_loc_id` int(11) NOT NULL,
  PRIMARY KEY (`school_id`)
) ENGINE=InnoDB AUTO_INCREMENT=263 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

REPLACE INTO `schools` (`school_id`, `school_name`, `school_level`, `school_distr_id`, `school_province_id`, `school_town_id`, `school_loc_id`) VALUES
(1, 'SAKUBVA 1', 'Secondary', 59, 10, 0, 0),
(2, 'SAMAHURU SDA', 'Primary', 31, 6, 0, 0),
(3, 'SAMAMBWA', 'Secondary', 44, 8, 0, 0),
(4, 'SAMAMBWA', 'Primary', 44, 8, 0, 0),
(5, 'SAMARINGA', 'Secondary', 59, 10, 0, 0),
(6, 'SAMARINGA', 'Primary', 59, 10, 0, 0),
(7, 'SANDAWANA', 'Primary', 43, 8, 0, 0),
(8, 'SANDAWANA', 'Primary', 31, 6, 0, 0),
(9, 'SANDRINGHAM', 'Secondary', 20, 5, 0, 0),
(10, 'SANDRINGHAM', 'Primary', 20, 5, 0, 0),
(11, 'SANZAGURU', 'Secondary', 58, 10, 0, 0),
(12, 'SARUWE', 'Secondary', 20, 5, 0, 0),
(13, 'SARUWE JUNIOR', 'Primary', 20, 5, 0, 0),
(14, 'SASULA', 'Primary', 47, 8, 0, 0),
(15, 'SEBAKWE', 'Primary', 44, 8, 0, 0),
(16, 'SEKE  I  HIGH', 'Secondary', 2, 1, 0, 0),
(17, 'SEKE 2 HIGH', 'Secondary', 2, 1, 0, 0),
(18, 'SEKE 3 HIGH', 'Secondary', 2, 1, 0, 0),
(19, 'SEKE 4 HIGH', 'Secondary', 2, 1, 0, 0),
(20, 'SEKE 5 HIGH', 'Secondary', 2, 1, 0, 0),
(21, 'SEKE 6 HIGH', 'Secondary', 2, 1, 0, 0),
(22, 'SELUKWE', 'Primary', 46, 8, 0, 0),
(23, 'SENGEZI', 'Primary', 44, 8, 0, 0),
(24, 'SHABANI', 'Primary', 47, 8, 0, 0),
(25, 'SHAGARI ', 'Primary', 43, 8, 0, 0),
(26, 'SHAMBA', 'Primary', 46, 8, 0, 0),
(27, 'SHAMBA', 'Primary', 43, 8, 0, 0),
(28, 'SHAMU', 'Secondary', 9, 3, 0, 0),
(29, 'SHAMU', 'Primary', 9, 3, 0, 0),
(30, 'SHARON', 'Primary', 1, 1, 0, 0),
(31, 'SHASHE', 'Primary', 40, 8, 0, 0),
(32, 'SHASHI', 'Primary', 13, 4, 0, 0),
(33, 'SHAURO', 'Primary', 43, 8, 0, 0),
(34, 'SHERUKURU', 'Secondary', 61, 10, 0, 0),
(35, 'SHERUKURU', 'Primary', 61, 10, 0, 0),
(36, 'SHERWOOD PARK', 'Primary', 44, 8, 0, 0),
(37, 'SHIKU', 'Primary', 47, 8, 0, 0),
(38, 'SHINGA', 'Secondary', 8, 3, 0, 0),
(39, 'SHINGA', 'Primary', 8, 3, 0, 0),
(40, 'SHINGAI', 'Primary', 2, 1, 0, 0),
(41, 'SHUMAGANGE', 'Primary', 43, 8, 0, 0),
(42, 'SHUNDURE', 'Secondary', 59, 10, 0, 0),
(43, 'SHUNDURE', 'Primary', 59, 10, 0, 0),
(44, 'SHUNGU', 'Secondary', 44, 8, 0, 0),
(45, 'SHURUGWI NO2', 'Secondary', 46, 8, 0, 0),
(46, 'SIBANGANI', 'Secondary', 44, 8, 0, 0),
(47, 'SIBANGANI', 'Primary', 44, 8, 0, 0),
(48, 'SIBOLISE', 'Primary', 46, 8, 0, 0),
(49, 'SIBOMVU', 'Secondary', 43, 8, 0, 0),
(50, 'SIBOZA', 'Primary', 47, 8, 0, 0),
(51, 'SIDAKENI', 'Secondary', 44, 8, 0, 0),
(52, 'SIDAKENI', 'Primary', 44, 8, 0, 0),
(53, 'SIKENTE', 'Primary', 31, 6, 0, 0),
(54, 'SIKENTE ', 'Secondary', 31, 6, 0, 0),
(55, 'SIKHOBO', 'Primary', 31, 6, 0, 0),
(56, 'SIKOMBINGO', 'Secondary', 43, 8, 0, 0),
(57, 'SIKOMBINGO ', 'Primary', 43, 8, 0, 0),
(58, 'SIKUMBA TSHOKOTSHE', 'Primary', 44, 8, 0, 0),
(59, 'SILOBELA', 'Secondary', 44, 8, 0, 0),
(60, 'SIMANA', 'Secondary', 44, 8, 0, 0),
(61, 'SIMANA', 'Primary', 44, 8, 0, 0),
(62, 'SINAMI', 'Primary', 47, 8, 0, 0),
(63, 'SIPEPA', 'Secondary', 31, 6, 0, 0),
(64, 'SIPEPA', 'Primary', 31, 6, 0, 0),
(65, 'SIPHONGWENI', 'Primary', 31, 6, 0, 0),
(66, 'SIPOPOMA', 'Primary', 29, 6, 0, 0),
(67, 'SIVANGA', 'Primary', 47, 8, 0, 0),
(68, 'SIYAHOKWE HIGH', 'Secondary', 40, 8, 0, 0),
(69, 'SIYANGAYA', 'Primary', 31, 6, 0, 0),
(70, 'SIYEZI ', 'Primary', 44, 8, 0, 0),
(71, 'SIYOKA', 'Secondary', 33, 7, 0, 0),
(72, 'SIZANE', 'Secondary', 3, 2, 0, 0),
(73, 'SOBUKHAZI ', 'Secondary', 3, 2, 0, 0),
(74, 'SODBURY', 'Secondary', 25, 5, 0, 0),
(75, 'SODBURY', 'Primary', 25, 5, 0, 0),
(76, 'SOGWALA', 'Primary', 43, 8, 0, 0),
(77, 'SOLUSI', 'Primary', 31, 6, 0, 0),
(78, 'SOLUSWE', 'Primary', 31, 6, 0, 0),
(79, 'SOMABHULA ', 'Primary', 43, 8, 0, 0),
(80, 'SOMALALA ', 'Primary', 44, 8, 0, 0),
(81, 'SOS HERMANN GMEINER', 'Secondary', 3, 2, 0, 0),
(82, 'SOS HERMANN GMEINER', 'Primary', 3, 2, 0, 0),
(83, 'SPRINGVALE HOUSE', 'Primary', 7, 3, 0, 0),
(84, 'ST . ALBAN\'S', 'Secondary', 55, 10, 0, 0),
(85, 'ST . ALBAN\'S', 'Secondary', 15, 4, 0, 0),
(86, 'ST AUGUSTINE', 'Secondary', 59, 10, 0, 0),
(87, 'ST AUGUSTINE CHAPWANYA', 'Secondary', 55, 10, 0, 0),
(88, 'ST AUGUSTINE CHAPWANYA', 'Primary', 55, 10, 0, 0),
(89, 'ST BERNARDS', 'Secondary', 55, 10, 0, 0),
(90, 'ST BERNARDS', 'Secondary', 3, 2, 0, 0),
(91, 'ST BONIFACE', 'Secondary', 21, 5, 0, 0),
(92, 'ST COLUMBUS', 'Secondary', 59, 10, 0, 0),
(93, 'ST DOMINICS CHISHAWASHA', 'Secondary', 1, 1, 0, 0),
(94, 'ST ERIC', 'Secondary', 20, 5, 0, 0),
(95, 'ST ERIC', 'Primary', 20, 5, 0, 0),
(96, 'ST FAITH\'S', 'Secondary', 44, 8, 0, 0),
(97, 'ST FAITH\'S', 'Primary', 44, 8, 0, 0),
(98, 'ST GEORGES MUCHENA', 'Primary', 59, 10, 0, 0),
(99, 'ST JOHNS CHIFAMBA', 'Primary', 55, 10, 0, 0),
(100, 'ST JUDE\'S', 'Primary', 44, 8, 0, 0),
(101, 'ST KILLIAN\'S', 'Secondary', 58, 10, 0, 0),
(102, 'ST KIZITO MAKAURE', 'Primary', 44, 8, 0, 0),
(103, 'ST MICHAELS', 'Primary', 44, 8, 0, 0),
(104, 'ST MICHAEL\'S', 'Primary', 43, 8, 0, 0),
(105, 'ST MICHAELS MAMBO', 'Secondary', 55, 10, 0, 0),
(106, 'ST MICHAELS MAMBO', 'Primary', 55, 10, 0, 0),
(107, 'ST MONICA', 'Secondary', 61, 10, 0, 0),
(108, 'ST NOAH', 'Secondary', 59, 10, 0, 0),
(109, 'ST NOAH', 'Primary', 59, 10, 0, 0),
(110, 'ST PAUL\'S', 'Secondary', 9, 3, 0, 0),
(111, 'ST PAUL\'S', 'Primary', 43, 8, 0, 0),
(112, 'ST PETER\'S MUNYATI', 'Primary', 44, 8, 0, 0),
(113, 'ST SEVERINO RUWERE', 'Primary', 43, 8, 0, 0),
(114, 'ST THERESA', 'Secondary', 58, 10, 0, 0),
(115, 'ST THERESA', 'Primary', 44, 8, 0, 0),
(116, 'ST. ALBAN\'S', 'Primary', 55, 10, 0, 0),
(117, 'ST. ALBAN\'S', 'Primary', 15, 4, 0, 0),
(118, 'ST. ANN', 'Primary', 29, 6, 0, 0),
(119, 'ST. COLUMBUS', 'Secondary', 3, 2, 0, 0),
(120, 'ST. DOMINIC\'S HIGH', 'Secondary', 59, 10, 0, 0),
(121, 'ST. FAITH (MNYAMANA) ', 'Primary', 43, 8, 0, 0),
(122, 'ST. FRANCIS', 'Secondary', 14, 4, 0, 0),
(123, 'ST. GEORGES', 'Secondary', 1, 1, 0, 0),
(124, 'ST. JOHNS', 'Secondary', 1, 1, 0, 0),
(125, 'ST. JOHNS', 'Secondary', 1, 1, 0, 0),
(126, 'ST. JOSEPH\'S', 'Primary', 31, 6, 0, 0),
(127, 'ST. JOSEPH\'S BHEMBE', 'Primary', 43, 8, 0, 0),
(128, 'St. JOSEPHS MABURUTSE', 'Secondary', 59, 10, 0, 0),
(129, 'ST. PATRICK\'S', 'Secondary', 43, 8, 0, 0),
(130, 'ST. WILFRED', 'Primary', 31, 6, 0, 0),
(131, 'STANLEY', 'Primary', 43, 8, 0, 0),
(132, 'SUNGANAI', 'Secondary', 44, 8, 0, 0),
(133, 'SUNGANAI ', 'Primary', 44, 8, 0, 0),
(134, 'SUNNY DAY CHRISTIAN', 'Primary', 1, 1, 0, 0),
(135, 'SUPWI', 'Primary', 43, 8, 0, 0),
(136, 'SVIBA', 'Primary', 43, 8, 0, 0),
(137, 'SVINURAI', 'Secondary', 55, 10, 0, 0),
(138, 'SVITA', 'Secondary', 43, 8, 0, 0),
(139, 'SWEREKI', 'Primary', 33, 7, 0, 0),
(140, 'SYDNEY MALUNGA', 'Primary', 31, 6, 0, 0),
(141, 'TADZIKAMIDZI', 'Primary', 2, 1, 0, 0),
(142, 'TAFARA 2 HIGH', 'Secondary', 1, 1, 0, 0),
(143, 'TAFARA I HIGH', 'Secondary', 1, 1, 0, 0),
(144, 'TAKUNDA', 'Secondary', 46, 8, 0, 0),
(145, 'TAKUNDA ', 'Primary', 43, 8, 0, 0),
(146, 'TAKWIRIRA', 'Secondary', 57, 10, 0, 0),
(147, 'TAKWIRIRA', 'Primary', 43, 8, 0, 0),
(148, 'TAMANDAI', 'Secondary', 57, 10, 0, 0),
(149, 'TAMANDAI', 'Primary', 57, 10, 0, 0),
(150, 'TANGENHAMO', 'Primary', 2, 1, 0, 0),
(151, 'TANGLE RANCH', 'Primary', 40, 8, 0, 0),
(152, 'TASIMUKIRA', 'Primary', 2, 1, 0, 0),
(153, 'THEMBILE', 'Primary', 31, 6, 0, 0),
(154, 'THORNHILL', 'Secondary', 43, 8, 0, 0),
(155, 'TOKWE ', 'Primary', 40, 8, 0, 0),
(156, 'TOM CHIBI', 'Primary', 47, 8, 0, 0),
(157, 'TOMBANKALA', 'Secondary', 44, 8, 0, 0),
(158, 'TOMBANKALA ', 'Primary', 44, 8, 0, 0),
(159, 'TONGOGARA', 'Secondary', 46, 8, 0, 0),
(160, 'TONGOGARA', 'Primary', 46, 8, 0, 0),
(161, 'TONGWE', 'Primary', 33, 7, 0, 0),
(162, 'TONGWE HIGH', 'Secondary', 33, 7, 0, 0),
(163, 'TOPORO', 'Primary', 33, 7, 0, 0),
(164, 'TORE ', 'Primary', 44, 8, 0, 0),
(165, 'TOTORORO', 'Secondary', 44, 8, 0, 0),
(166, 'TOTORORO', 'Primary', 44, 8, 0, 0),
(167, 'TOWLA ', 'Primary', 33, 7, 0, 0),
(168, 'TSATSE', 'Secondary', 5, 3, 0, 0),
(169, 'TSATSE', 'Primary', 5, 3, 0, 0),
(170, 'TSHABANDA', 'Primary', 31, 6, 0, 0),
(171, 'TSHABANDA ', 'Secondary', 31, 6, 0, 0),
(172, 'TSHAPEWA', 'Primary', 44, 8, 0, 0),
(173, 'TSHAYAMATHOLE', 'Primary', 29, 6, 0, 0),
(174, 'TSHIBIZINA', 'Primary', 31, 6, 0, 0),
(175, 'TSHITATSHAWA ', 'Secondary', 31, 6, 0, 0),
(176, 'TSHITHATSHAWA', 'Primary', 31, 6, 0, 0),
(177, 'TSHONGOKWE', 'Primary', 29, 6, 0, 0),
(178, 'TSIKADA', 'Secondary', 58, 10, 0, 0),
(179, 'TSIKADA PRIMARY', 'Primary', 58, 10, 0, 0),
(180, 'TSINDI', 'Secondary', 58, 10, 0, 0),
(181, 'TSVINGWE', 'Secondary', 59, 10, 0, 0),
(182, 'TSVINGWE', 'Primary', 59, 10, 0, 0),
(183, 'UMELUSI', 'Secondary', 44, 8, 0, 0),
(184, 'UMELUSI ', 'Primary', 44, 8, 0, 0),
(185, 'UMVUKWES', 'Primary', 15, 4, 0, 0),
(186, 'VAINONA', 'Primary', 1, 1, 0, 0),
(187, 'VAINONA ', 'Secondary', 1, 1, 0, 0),
(188, 'VALLEY ', 'Primary', 46, 8, 0, 0),
(189, 'VAMBARE', 'Primary', 43, 8, 0, 0),
(190, 'VENGE', 'Primary', 47, 8, 0, 0),
(191, 'VENGERE ', 'Primary', 58, 10, 0, 0),
(192, 'VENGERE HIGH', 'Secondary', 58, 10, 0, 0),
(193, 'VHEMBE', 'Secondary', 33, 7, 0, 0),
(194, 'VIMBAI', 'Secondary', 20, 5, 0, 0),
(195, 'VIMBAI', 'Primary', 20, 5, 0, 0),
(196, 'VISITATION  MAKUMBI', 'Primary', 5, 3, 0, 0),
(197, 'VUBWE', 'Secondary', 43, 8, 0, 0),
(198, 'VUHWA', 'Primary', 43, 8, 0, 0),
(199, 'VUKWE', 'Primary', 47, 8, 0, 0),
(200, 'VULAMATSHENA ', 'Primary', 44, 8, 0, 0),
(201, 'VUMBA PRIMARY', 'Primary', 43, 8, 0, 0),
(202, 'VUMUKWANA', 'Primary', 43, 8, 0, 0),
(203, 'VUNGU', 'Secondary', 43, 8, 0, 0),
(204, 'VUNGU COUNCIL', 'Primary', 43, 8, 0, 0),
(205, 'VUNGWI', 'Primary', 46, 8, 0, 0),
(206, 'VUNKU SHEMER', 'Primary', 43, 8, 0, 0),
(207, 'VURASHA', 'Secondary', 43, 8, 0, 0),
(208, 'VUTIKA', 'Secondary', 43, 8, 0, 0),
(209, 'VUTSANANA', 'Secondary', 43, 8, 0, 0),
(210, 'WADDILOVE', 'Primary', 7, 3, 0, 0),
(211, 'WADDILOVE HIGH', 'Secondary', 7, 3, 0, 0),
(212, 'WASIMA', 'Secondary', 47, 8, 0, 0),
(213, 'WATERSHED', 'Secondary', 7, 3, 0, 0),
(214, 'WATERSHED', 'Primary', 7, 3, 0, 0),
(215, 'WAVERLEY', 'Secondary', 22, 5, 0, 0),
(216, 'WEDZA', 'Primary', 47, 8, 0, 0),
(217, 'WELEZA', 'Primary', 47, 8, 0, 0),
(218, 'WESTRIDGE', 'Secondary', 1, 1, 0, 0),
(219, 'WESTRIDGE', 'Primary', 1, 1, 0, 0),
(220, 'WHITESTONE', 'Primary', 3, 2, 0, 0),
(221, 'WHUNGA', 'Primary', 33, 7, 0, 0),
(222, 'WONDOLA', 'Primary', 31, 6, 0, 0),
(223, 'WOODLANDS', 'Primary', 43, 8, 0, 0),
(224, 'WOZOLI', 'Secondary', 44, 8, 0, 0),
(225, 'WOZOLI ', 'Primary', 44, 8, 0, 0),
(226, 'ZALOBA', 'Primary', 43, 8, 0, 0),
(227, 'ZAMAZAMA', 'Primary', 43, 8, 0, 0),
(228, 'ZAMBE', 'Secondary', 59, 10, 0, 0),
(229, 'ZAMBE', 'Primary', 59, 10, 0, 0),
(230, 'ZENDA', 'Primary', 43, 8, 0, 0),
(231, 'ZENGEZA  I  HIGH', 'Secondary', 2, 1, 0, 0),
(232, 'ZENGEZA 2 HIGH', 'Secondary', 2, 1, 0, 0),
(233, 'ZENGEZA 3 HIGH', 'Secondary', 2, 1, 0, 0),
(234, 'ZENGEZA 4', 'Primary', 2, 1, 0, 0),
(235, 'ZENGEZA 4 HIGH', 'Secondary', 2, 1, 0, 0),
(236, 'ZENGEZA 5', 'Primary', 2, 1, 0, 0),
(237, 'ZENGEZA 7', 'Primary', 2, 1, 0, 0),
(238, 'ZENGEZA 8 ', 'Primary', 2, 1, 0, 0),
(239, 'ZENGEZA MAIN', 'Primary', 2, 1, 0, 0),
(240, 'ZERUVI', 'Primary', 47, 8, 0, 0),
(241, 'ZEZANI', 'Secondary', 33, 7, 0, 0),
(242, 'ZHAUGWE  NORTH', 'Primary', 46, 8, 0, 0),
(243, 'ZHOMBE ', 'Primary', 44, 8, 0, 0),
(244, 'ZIBALONGWE', 'Primary', 31, 6, 0, 0),
(245, 'ZIMBIRU', 'Secondary', 5, 3, 0, 0),
(246, 'ZIMBIRU', 'Primary', 5, 3, 0, 0),
(247, 'ZIMWATUGA', 'Primary', 31, 6, 0, 0),
(248, 'ZINDI', 'Secondary', 59, 10, 0, 0),
(249, 'ZINDI', 'Primary', 59, 10, 0, 0),
(250, 'ZRP ', 'Secondary', 1, 1, 0, 0),
(251, 'ZVAMATENGA', 'Primary', 46, 8, 0, 0),
(252, 'ZVAMAUNJE', 'Primary', 46, 8, 0, 0),
(253, 'ZVAPUNGU', 'Secondary', 58, 10, 0, 0),
(254, 'ZVEGONA', 'Primary', 47, 8, 0, 0),
(255, 'ZVERENJE', 'Primary', 43, 8, 0, 0),
(256, 'ZVIKOMBE', 'Primary', 43, 8, 0, 0),
(257, 'ZVIMHONJA', 'Secondary', 21, 5, 0, 0),
(258, 'ZVIMHONJA', 'Primary', 21, 5, 0, 0),
(259, 'ZVISEKO', 'Primary', 43, 8, 0, 0),
(260, 'ZVISHAVANE', 'Secondary', 47, 8, 0, 0),
(261, 'ZVIWUMWA', 'Secondary', 46, 8, 0, 0),
(262, 'ZVOMUKONDE', 'Secondary', 43, 8, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(60) NOT NULL,
  `sub_level` text NOT NULL,
  PRIMARY KEY (`sub_id`),
  UNIQUE KEY `UNIQUE` (`sub_name`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

REPLACE INTO `subjects` (`sub_id`, `sub_name`, `sub_level`) VALUES
(1, 'ADDITIONAL MATHS', 'O Level'),
(2, 'ART', 'O Level'),
(3, 'BIOLOGY', 'O Level'),
(4, 'PHYSICS ', 'O Level'),
(5, 'BUSINESS STUDIES', 'O Level'),
(6, 'CHEMISTRY', 'O Level'),
(7, 'COMMERCE', 'O Level'),
(8, 'COMPUTER STUDIES', 'O Level'),
(9, 'ECONOMICS', 'O Level'),
(10, 'ENGLISH', 'O Level'),
(11, 'ENGLISH LITERATURE', 'O Level'),
(12, 'FRENCH', 'O Level'),
(13, 'GEOGRAPHY', 'O Level'),
(14, 'HISTORY', 'O Level'),
(15, 'FASHION AND FABRICS ', 'O Level'),
(16, 'FOOD AND NUTRITION', 'O Level'),
(17, 'HOME MANAGEMENT', 'O Level'),
(18, 'HUMAN AND SOCIAL BIOLOGY', 'O Level'),
(19, 'INTEGRATED SCIENCE', 'O Level'),
(20, 'LAW', 'O Level'),
(21, 'MATHEMATICS', 'O Level'),
(22, 'METALWORK', 'O Level'),
(23, 'MUSIC', 'O Level'),
(24, 'NDEBELE', 'O Level'),
(25, 'PHYSICAL SCIENCE', 'O Level'),
(26, 'PRINCIPLES OF ACCOUNTS', 'O Level'),
(27, 'RELIGIOUS STUDIES', 'O Level'),
(28, 'SHONA', 'O LEVEL'),
(29, 'SOCIOLOGY', 'O Level'),
(30, 'STATISTICS', 'O Level'),
(31, 'TECHNICAL GRAPHICS', 'O Level'),
(32, 'WOODWORK', 'O Level'),
(33, 'TONGA', 'O Level');

-- --------------------------------------------------------

--
-- Table structure for table `towns`
--

DROP TABLE IF EXISTS `towns`;
CREATE TABLE IF NOT EXISTS `towns` (
  `town_id` int(11) NOT NULL AUTO_INCREMENT,
  `town_name` varchar(20) NOT NULL,
  `town_province_id` int(11) NOT NULL,
  PRIMARY KEY (`town_id`),
  UNIQUE KEY `UNIQUE` (`town_name`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `towns`
--

REPLACE INTO `towns` (`town_id`, `town_name`, `town_province_id`) VALUES
(1, 'Beitbridge', 7),
(2, 'Bindura', 4),
(3, 'Bulawayo', 2),
(4, 'Chegutu', 5),
(5, 'Chinhoyi', 5),
(6, 'Chipinge', 10),
(7, 'Chiredzi', 9),
(8, 'Chitungwiza', 1),
(9, 'Gokwe', 8),
(10, 'Gweru', 8),
(11, 'Harare', 1),
(12, 'Kadoma', 5),
(13, 'Kariba', 5),
(14, 'Karoi', 5),
(15, 'Kwekwe', 8),
(16, 'Marondera', 3),
(17, 'Masvingo', 9),
(18, 'Mutare', 10),
(19, 'Norton', 5),
(20, 'Redcliff', 8),
(21, 'Rusape', 10),
(22, 'Shurugwi', 8),
(23, 'Victoria Falls', 6),
(24, 'Zvishavane', 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
