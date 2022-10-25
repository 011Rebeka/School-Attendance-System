-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2022 at 01:11 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `aid` int(100) NOT NULL,
  `date_submission` date NOT NULL,
  `submit_to` varchar(100) NOT NULL,
  `asn_no` varchar(200) NOT NULL,
  `ques` varchar(300) NOT NULL,
  `asubject` varchar(50) NOT NULL,
  `class` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`aid`, `date_submission`, `submit_to`, `asn_no`, `ques`, `asubject`, `class`, `section`) VALUES
(9, '2022-03-05', 'Shorif Khan', 'Assignment 2', '3rddElementery ScienceAssignment 2.JPG', 'Elementery Science', '3rd', 'B'),
(12, '2022-04-11', 'Riya Akter ', 'Assignment 1 ', '3rddEnglishAssignment 1 .jpg', 'English', '3rd', 'd'),
(15, '2022-04-13', 'Shorif Khan', 'Assignment 4', '3rdBMathematicsAssignment 4.jpg', 'Mathematics', '3rd', 'B'),
(16, '2022-04-27', 'Rebecca Riya ', 'Fill in the blanks with suitable wrods ', '3rdDEnglishFill in the blanks with suitable wrods .jpg', 'English', '3rd', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `attandance`
--

CREATE TABLE `attandance` (
  `attid` int(100) NOT NULL,
  `id` int(100) NOT NULL,
  `roll_num` varchar(500) NOT NULL,
  `stu_name` varchar(100) NOT NULL,
  `stu_class` varchar(20) NOT NULL,
  `stu_sec` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `atten` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attandance`
--

INSERT INTO `attandance` (`attid`, `id`, `roll_num`, `stu_name`, `stu_class`, `stu_sec`, `date`, `atten`) VALUES
(51, 67, '32202', 'Nayeema Afrin', '3rd', 'd', '2022-03-03', 1),
(52, 69, '32212', 'yyyyy', '3rd', 'd', '2022-03-03', 1),
(53, 64, '32201', 'tamara jaber khan', '3rd', 'd', '2022-03-02', 1),
(54, 67, '32202', 'Nayeema Afrin', '3rd', 'd', '2022-03-02', 1),
(55, 69, '32212', 'yyyyy', '3rd', 'd', '2022-03-02', 1),
(56, 64, '32201', 'tamara jaber khan', '3rd', 'd', '2022-03-05', 1),
(57, 67, '32202', 'Nayeema Afrin', '3rd', 'd', '2022-03-05', 1),
(58, 69, '32212', 'yyyyy', '3rd', 'd', '2022-03-05', 1),
(59, 64, '32201', 'tamara jaber khan', '3rd', 'd', '2022-03-08', 1),
(60, 67, '32202', 'Nayeema Afrin', '3rd', 'd', '2022-03-08', 1),
(61, 69, '32212', 'yyyyy', '3rd', 'd', '2022-03-08', 1),
(86, 64, '32201', 'tamara jaber khan', '3rd', 'd', '2022-03-01', 1),
(87, 67, '32202', 'Nayeema Afrin', '3rd', 'd', '2022-03-01', 1),
(88, 69, '32212', 'yyyyy', '3rd', 'd', '2022-03-01', 0),
(95, 64, '32201', 'tamara jaber khan', '3rd', 'd', '2022-03-18', 1),
(96, 67, '32202', 'Nayeema Afrin', '3rd', 'd', '2022-03-18', 1),
(97, 69, '32212', 'yyyyy', '3rd', 'd', '2022-03-18', 1),
(98, 64, '32201', 'tamara jaber khan', '3rd', 'd', '2022-03-17', 0),
(99, 67, '32202', 'Nayeema Afrin', '3rd', 'd', '2022-03-17', 0),
(100, 69, '32212', 'yyyyy', '3rd', 'd', '2022-03-17', 0),
(101, 64, '32201', 'tamara jaber khan', '3rd', 'd', '2022-03-20', 1),
(102, 67, '32202', 'Nayeema Afrin', '3rd', 'd', '2022-03-20', 1),
(103, 69, '32212', 'yyyyy', '3rd', 'd', '2022-03-20', 0),
(104, 10, '40906', 'kafi firdous', '9th', 'B', '2022-03-11', 1),
(105, 11, '100910', 'Hamim sharker', '9th', 'B', '2022-03-11', 1),
(106, 12, '130907', 'Al mas', '9th', 'B', '2022-03-11', 0),
(107, 73, '140904', 'Topu ', '9th', 'B', '2022-03-11', 1),
(108, 10, '40906', 'kafi firdous', '9th', 'B', '2022-03-22', 1),
(109, 11, '100910', 'Hamim sharker', '9th', 'B', '2022-03-22', 0),
(110, 12, '130907', 'Al mas', '9th', 'B', '2022-03-22', 1),
(111, 73, '140904', 'Topu ', '9th', 'B', '2022-03-22', 1),
(112, 75, '170201', 'Mehedi hasan', '2nd', 'A', '2022-03-22', 1),
(113, 76, '130202', 'Mobin', '2nd', 'A', '2022-03-22', 1),
(114, 77, '150204', 'Maisha', '2nd', 'A', '2022-03-22', 1),
(115, 6, '32201', 'tamara jaber khan', '3rd', 'd', '2022-03-22', 1),
(116, 8, '32202', 'Nayeema Afrin', '3rd', 'd', '2022-03-22', 1),
(117, 9, '32212', 'yyyyy', '3rd', 'd', '2022-03-22', 1),
(118, 78, '190402', 'Sakib abir', '4th', 'B', '2022-03-23', 1),
(119, 79, '180405', 'Tanjila yasmin', '4th', 'B', '2022-03-23', 1),
(120, 80, '220407', 'tonmoy', '4th', 'B', '2022-03-23', 1),
(121, 6, '32201', 'tamara jaber khan', '3rd', 'd', '2022-04-05', 1),
(122, 8, '32202', 'Nayeema Afrin', '3rd', 'd', '2022-04-05', 0),
(123, 9, '32212', 'yyyyy', '3rd', 'd', '2022-04-05', 1),
(124, 81, '150307', 'Nisha Mahmuda', '3rd', 'd', '2022-04-05', 1),
(125, 82, '170301', 'Rebecca Sultana', '3rd', 'B', '2022-04-06', 1),
(126, 83, '160302', 'moon', '3rd', 'B', '2022-04-06', 1),
(127, 84, '160303', 'Rafi ahmed', '3rd', 'B', '2022-04-06', 0),
(128, 82, '170301', 'Rebecca Sultana', '3rd', 'B', '2022-04-03', 1),
(129, 83, '160302', 'moon', '3rd', 'B', '2022-04-03', 0),
(130, 84, '160303', 'Rafi ahmed', '3rd', 'B', '2022-04-03', 1),
(131, 6, '32201', 'tamara jaber khan', '3rd', 'd', '2022-04-13', 1),
(132, 8, '32202', 'Nayeema Afrin', '3rd', 'd', '2022-04-13', 0),
(133, 9, '32212', 'yyyyy', '3rd', 'd', '2022-04-13', 1),
(134, 81, '150307', 'Nisha Mahmuda', '3rd', 'd', '2022-04-13', 0),
(135, 6, '32201', 'tamara jaber khan', '3rd', 'd', '2022-04-12', 1),
(136, 8, '32202', 'Nayeema Afrin', '3rd', 'd', '2022-04-12', 1),
(137, 9, '32212', 'yyyyy', '3rd', 'd', '2022-04-12', 1),
(138, 81, '150307', 'Nisha Mahmuda', '3rd', 'd', '2022-04-12', 1),
(139, 3, '860705', 'Shoshi Khan', '7th', 'A', '2022-04-20', 1),
(140, 86, '71202', 'Mahmudul Hasan', '7th', 'A', '2022-04-20', 1),
(141, 87, '71003', 'Runa Islam', '7th', 'A', '2022-04-20', 0),
(142, 88, '71504', 'Nafia Islam', '7th', 'A', '2022-04-20', 1),
(143, 89, '72205', 'Nabiha Alam', '7th', 'A', '2022-04-20', 1),
(144, 90, '71906', 'Kamrul Hasan', '7th', 'A', '2022-04-20', 1),
(145, 91, '70807', 'Munni Hasan ', '7th', 'A', '2022-04-20', 0),
(146, 92, '72008', 'Arush ', '7th', 'A', '2022-04-20', 0),
(147, 3, '860705', 'Shoshi Khan', '7th', 'A', '2022-04-19', 1),
(148, 86, '71202', 'Mahmudul Hasan', '7th', 'A', '2022-04-19', 0),
(149, 87, '71003', 'Runa Islam', '7th', 'A', '2022-04-19', 1),
(150, 88, '71504', 'Nafia Islam', '7th', 'A', '2022-04-19', 1),
(151, 89, '72205', 'Nabiha Alam', '7th', 'A', '2022-04-19', 0),
(152, 90, '71906', 'Kamrul Hasan', '7th', 'A', '2022-04-19', 1),
(153, 91, '70807', 'Munni Hasan ', '7th', 'A', '2022-04-19', 1),
(154, 92, '72008', 'Arush ', '7th', 'A', '2022-04-19', 0),
(155, 3, '860705', 'Shoshi Khan', '7th', 'A', '2022-04-18', 1),
(156, 86, '71202', 'Mahmudul Hasan', '7th', 'A', '2022-04-18', 1),
(157, 87, '71003', 'Runa Islam', '7th', 'A', '2022-04-18', 0),
(158, 88, '71504', 'Nafia Islam', '7th', 'A', '2022-04-18', 0),
(159, 89, '72205', 'Nabiha Alam', '7th', 'A', '2022-04-18', 0),
(160, 90, '71906', 'Kamrul Hasan', '7th', 'A', '2022-04-18', 0),
(161, 91, '70807', 'Munni Hasan ', '7th', 'A', '2022-04-18', 0),
(162, 92, '72008', 'Arush ', '7th', 'A', '2022-04-18', 0),
(163, 3, '860705', 'Shoshi Khan', '7th', 'A', '2022-04-16', 0),
(164, 86, '71202', 'Mahmudul Hasan', '7th', 'A', '2022-04-16', 0),
(165, 87, '71003', 'Runa Islam', '7th', 'A', '2022-04-16', 1),
(166, 88, '71504', 'Nafia Islam', '7th', 'A', '2022-04-16', 1),
(167, 89, '72205', 'Nabiha Alam', '7th', 'A', '2022-04-16', 1),
(168, 90, '71906', 'Kamrul Hasan', '7th', 'A', '2022-04-16', 1),
(169, 91, '70807', 'Munni Hasan ', '7th', 'A', '2022-04-16', 0),
(170, 92, '72008', 'Arush ', '7th', 'A', '2022-04-16', 0),
(171, 3, '860705', 'Shoshi Khan', '7th', 'A', '2022-04-12', 0),
(172, 86, '71202', 'Mahmudul Hasan', '7th', 'A', '2022-04-12', 1),
(173, 87, '71003', 'Runa Islam', '7th', 'A', '2022-04-12', 0),
(174, 88, '71504', 'Nafia Islam', '7th', 'A', '2022-04-12', 1),
(175, 89, '72205', 'Nabiha Alam', '7th', 'A', '2022-04-12', 1),
(176, 90, '71906', 'Kamrul Hasan', '7th', 'A', '2022-04-12', 1),
(177, 91, '70807', 'Munni Hasan ', '7th', 'A', '2022-04-12', 1),
(178, 92, '72008', 'Arush ', '7th', 'A', '2022-04-12', 1),
(179, 3, '860705', 'Shoshi Khan', '7th', 'A', '2022-04-10', 1),
(180, 86, '71202', 'Mahmudul Hasan', '7th', 'A', '2022-04-10', 1),
(181, 87, '71003', 'Runa Islam', '7th', 'A', '2022-04-10', 1),
(182, 88, '71504', 'Nafia Islam', '7th', 'A', '2022-04-10', 1),
(183, 89, '72205', 'Nabiha Alam', '7th', 'A', '2022-04-10', 1),
(184, 90, '71906', 'Kamrul Hasan', '7th', 'A', '2022-04-10', 1),
(185, 91, '70807', 'Munni Hasan ', '7th', 'A', '2022-04-10', 1),
(186, 92, '72008', 'Arush ', '7th', 'A', '2022-04-10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `design`
--

CREATE TABLE `design` (
  `id` int(10) NOT NULL,
  `logo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `design`
--

INSERT INTO `design` (`id`, `logo`) VALUES
(7, 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `nid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `detail` varchar(500) NOT NULL,
  `picture` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`nid`, `title`, `detail`, `picture`) VALUES
(17, '5th', 'A', '5th.png'),
(18, '1st', 'A', '1st.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `father` varchar(100) NOT NULL,
  `mother` varchar(100) NOT NULL,
  `roll` int(11) NOT NULL,
  `class` varchar(5) NOT NULL,
  `section` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `name`, `father`, `mother`, `roll`, `class`, `section`, `address`, `contact`, `photo`, `datetime`, `dob`) VALUES
(1, 'Siam khan', 'yyy', 'xxx', 210801, '8th', 'B', 'Mirpur 1216', '01623364478', '210801.png', '2025-02-21 18:00:00', '2021-12-01'),
(2, 'Farin Sayma', 'aaaaaa', 'bbbbbbbbb', 960502, '5th', 'C', 'Uttara-1209', '01623364908', '960502.webp', '2021-02-21 18:00:00', '1996-03-14'),
(3, 'Shoshi Khan', 'ttttt', 'yyyyy', 860705, '7th', 'A', 'niketon-1212', '01623364440', '860705.jpg', '2021-02-21 18:00:00', '1986-08-09'),
(4, 'Arham Jamil', 'Rimon', 'Taposhi', 160910, '8th', 'C', 'Motijhil', '01623364678', '160910.png', '2021-02-21 18:00:00', '2016-10-06'),
(5, 'Zahin ar', 'kkkkk', 'lllllll', 190902, '9th', 'A', 'Mohakhali-1211', '01623364460', '190902.jpg', '2021-02-21 18:00:00', '2019-07-10'),
(6, 'tamara jaber khan', 'test', 'test', 32201, '3rd', 'd', 'Dhaka 1219', '01966402900', '210102.jpg', '2003-03-21 18:00:00', '2013-03-23'),
(7, 'hhhhhh', 'ffgdgdfgdffg', 'test', 22201, '2nd', 'd', 'dsdsdsdsdsd', '01966402900', '022201.jpg', '2028-02-21 18:00:00', '2022-02-13'),
(8, 'Nayeema Afrin', 'ffgdgdfgdffg', 'test', 32202, '3rd', 'd', 'dsdsdsdsdsd', '01966402988', '032202.jpg', '2003-03-21 18:00:00', '2022-03-01'),
(9, 'yyyyy', 'test', 'test', 32212, '3rd', 'd', 'Dhaka 1219', '01966402988', '032212.jpg', '2003-03-21 18:00:00', '2013-07-04'),
(10, 'kafi firdous', 'iiiiiiiiiiii', 'thhjuuh', 40906, '9th', 'B', 'Uttara-1209', '01623364789', '040906.png', '2022-03-21 18:00:00', '2004-10-12'),
(11, 'Hamim sharker', 'yyy', 'xxx', 100910, '9th', 'B', 'House#1343, East shewrapara', '01623364499', '100910.png', '2022-03-21 18:00:00', '2010-10-13'),
(12, 'Al mas', 'aaaaaa', 'bbbbbbbbb', 130907, '9th', 'B', 'East shewrapara', '01623364400', '130907.png', '2022-03-21 18:00:00', '2013-12-29'),
(73, 'Topu ', 'aaaaaaaaa', 'bbbbbbbbb', 140904, '9th', 'B', 'Niketon, Dhaka-1212', '01623364450', '140904.png', '2022-03-21 18:00:00', '2014-02-19'),
(75, 'Mehedi hasan', 'yyy', 'lllllll', 170201, '2nd', 'A', ' East shewrapara', '01623364498', '170201.png', '2022-03-21 18:00:00', '2017-06-14'),
(76, 'Mobin', 'aaaaaa', 'bbbbbbbbb', 130202, '2nd', 'A', 'Dhaka-1212', '01623364422', '130202.jpg', '2022-03-21 18:00:00', '2013-11-13'),
(77, 'Maisha', 'aaaaaa', 'bbbbbbbbb', 150204, '2nd', 'A', 'dhaka 1205', '01623364477', '150204.jpg', '2022-03-21 18:00:00', '2015-12-23'),
(78, 'Sakib abir', 'aaaaaa', 'bbbbbbbbb', 190402, '4th', 'B', 'Dhaka-1212', '01623364478', '190402.png', '2023-03-21 18:00:00', '2019-06-23'),
(79, 'Tanjila yasmin', 'aaaaaa', 'bbbbbbbbb', 180405, '4th', 'B', 'East shewrapara', '01623364494', '180405.png', '2023-03-21 18:00:00', '2018-01-23'),
(80, 'tonmoy', 'aaaaaa', 'bbbbbbbbb', 220407, '4th', 'B', 'House#906/6,', '01623364404', '220407.png', '2023-03-21 18:00:00', '2022-03-18'),
(81, 'Nisha Mahmuda', 'yyy', 'xxx', 150307, '3rd', 'd', 'Dhaka-1213', '01623364413', '150307.webp', '2005-04-21 18:00:00', '2015-06-04'),
(82, 'Rebecca Sultana', 'aaaaaa', 'bbbbbbbbb', 170301, '3rd', 'B', 'Dhaka-1212', '01623364400', '170301.png', '2006-04-21 18:00:00', '2017-06-06'),
(83, 'moon', 'yyy', 'xxx', 160302, '3rd', 'B', 'East shewrapara', '01623364499', '160302.png', '2006-04-21 18:00:00', '2016-06-06'),
(84, 'Rafi ahmed', 'ttttt', 'yyyyy', 160303, '3rd', 'B', ' Dhaka-1212', '01623364476', '160303.png', '2006-04-21 18:00:00', '2016-10-06'),
(85, 'Mobin Hasan', 'Mizan', 'selina', 170310, '3rd', 'A', 'House#1343, East shewrapara', '01623364404', '170310.png', '2012-04-21 18:00:00', '2017-12-31'),
(86, 'Mahmudul Hasan', 'bbbb', 'aaaaa', 71202, '7th', 'A', 'uttara', '01623367765', '071202.png', '2020-04-21 18:00:00', '2012-05-15'),
(87, 'Runa Islam', 'mmmm', 'nnnn', 71003, '7th', 'A', 'motijhil', '01623367769', '071003.png', '2020-04-21 18:00:00', '2010-06-22'),
(88, 'Nafia Islam', 'kkkk', 'llllll', 71504, '7th', 'A', 'Chandpur', '01623368869', '071504.jpg', '2020-04-21 18:00:00', '2015-02-03'),
(89, 'Nabiha Alam', 'eee', 'rrrr', 72205, '7th', 'A', 'ttttt', '01622576890', '072205.webp', '2020-04-21 18:00:00', '2022-04-15'),
(90, 'Kamrul Hasan', 'yyyy', 'uuuu', 71906, '7th', 'A', 'oooooooo', '01622576897', '071906.png', '2020-04-21 18:00:00', '2019-06-07'),
(91, 'Munni Hasan ', 'rrr', 'rrrr', 70807, '7th', 'A', 'wwwwwwwww', '01623368867', '070807.jpg', '2020-04-21 18:00:00', '2008-08-06'),
(92, 'Arush ', 'tttttttt', 'yyyy', 72008, '7th', 'A', 'pppppppppp', '01623368866', '072008.png', '2020-04-21 18:00:00', '2020-03-15');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subid` int(200) NOT NULL,
  `subname` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `teacher` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subid`, `subname`, `class`, `teacher`, `section`) VALUES
(9, 'Mathematics ', '8th', '24', 'B'),
(10, 'Mathematics ', '3rd', '3', 'B'),
(11, 'English', '3rd', '1', 'D'),
(12, 'Bangla ', '4th', '4', 'B'),
(13, 'Accounting', '9th', '2', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `joindate` date DEFAULT NULL,
  `contact` varchar(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `class_teacher` varchar(50) NOT NULL,
  `tclass` varchar(20) NOT NULL DEFAULT '0',
  `tsec` varchar(20) NOT NULL DEFAULT '0',
  `jdate` date DEFAULT NULL,
  `tpw` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `gender`, `designation`, `qualification`, `joindate`, `contact`, `address`, `photo`, `class_teacher`, `tclass`, `tsec`, `jdate`, `tpw`) VALUES
(1, 'Rebecca Riya ', 'Female', 'Lecturer', 'B.Sc.in CSE', '2022-02-01', '01623364469', 'Hatirjheel 1219', 'Female01623364469.png', '1', '3rd', 'D', '2022-02-28', 'abcd'),
(2, 'Habib Ur Rahman', 'Male', 'Lecturer', 'BBA', '2021-12-07', '01623364464', 'aaaaaa', 'Male01623364464.png', '1', '9th', 'B', '2022-03-22', '1234habib'),
(3, 'Prity Nur', 'Male', 'Lecturer', 'MBA', '2022-02-01', '01623364878', 'House#1343, East shewrapara', 'Male01623364878.png', '1', '3rd', 'B', '2022-04-03', '09876'),
(4, 'Salman Abdullah', 'Male', 'Lecturer', 'BSc in CSE', '2022-02-26', '01966402900', 'xwedgdgdgdf', 'Male01966402900.png', '1', '4th', 'B', '2020-11-23', '0987'),
(5, 'MD Tareq', 'Male', 'assistant teacher', 'B.Sc.in EEE', '2022-02-04', '01966402888', 'uououou', 'Male01966402888.png', '0', '4', 'B', '2022-04-01', 'Tareq'),
(24, 'Mizan Hasan', 'Male', 'Lecturer', 'MA in English', '2021-02-23', '01623364456', 'Dhaka-1309', 'Male01623364456.png', '1', '2nd', 'A', '2021-10-26', 'mizan099'),
(25, 'Swarna Hasan', 'Female', 'Lecturer', 'MBA', '2020-04-15', '01622576897', 'Dhanmondi -1215', 'Female01622576897.jpg', '1', '7th', 'A', '2021-04-15', 'swarna');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `superadmin` varchar(10) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `photo`, `status`, `superadmin`, `entry_date`) VALUES
(20, 'Rebeka Sultana', 'rebeka@gmail.com', 'admin123', 'admin123', 'admin123.jpg', 'active', 'yes', '2022-02-19 22:39:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `attandance`
--
ALTER TABLE `attandance`
  ADD PRIMARY KEY (`attid`);

--
-- Indexes for table `design`
--
ALTER TABLE `design`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roll` (`roll`),
  ADD KEY `roll_2` (`roll`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD KEY `teacher_name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `aid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `attandance`
--
ALTER TABLE `attandance`
  MODIFY `attid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `design`
--
ALTER TABLE `design`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
