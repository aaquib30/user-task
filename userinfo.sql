-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 28, 2023 at 05:56 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `conn`
--

DROP TABLE IF EXISTS `conn`;
CREATE TABLE IF NOT EXISTS `conn` (
  `Task_no` int(3) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `Task` varchar(20) NOT NULL,
  `Status` varchar(30) NOT NULL,
  PRIMARY KEY (`Task_no`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conn`
--

INSERT INTO `conn` (`Task_no`, `user_id`, `Task`, `Status`) VALUES
(1, 2, 'coding', 'pending'),
(2, 4, 'coding', 'Done'),
(3, 10, 'code', 'Done'),
(4, 4, 'coding', 'pending'),
(5, 7, 'file', 'Done'),
(6, 12, 'sales man', 'Done'),
(7, 13, 'coding', 'Done'),
(8, 11, 'coding', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `S.no` int(3) NOT NULL AUTO_INCREMENT,
  `Teacher name` varchar(30) NOT NULL,
  `Age` int(30) NOT NULL,
  `Number` bigint(15) NOT NULL,
  `Subject name` varchar(20) NOT NULL,
  PRIMARY KEY (`S.no`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`S.no`, `Teacher name`, `Age`, `Number`, `Subject name`) VALUES
(7, 'aaquib', 25, 9112345678, 'coding'),
(11, 'aaquib', 25, 9112345678, 'coding');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(3) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `Email` text NOT NULL,
  `Number` bigint(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `Name`, `Email`, `Number`) VALUES
(1, 'aaquibB', 'aaquibshakeel@gmail.com', 9112345678),
(2, 'aaquib', 'aaquibshakeel@gmail.com', 9112345678),
(3, 'hacker', 'hacker@gmail.com', 9112345678),
(4, 'osama', 'osama@gmail.com', 7878787555),
(5, 'aaquib', 'aaquibshakeel@gmail.com', 9112345678),
(6, 'india', 'bleedblue@gmail.com', 1111111111),
(7, 'shakeel khan', 'ssdnf@kfd.com', 5656565555),
(8, 'aaquib', 'ssdnf@kfd.com', 9112345678),
(9, 'mohsin', 'mohsin@gma.com', 5555555555),
(10, 'aaquib', 'aaquibshakeel@gmail.com', 9112345678),
(11, 'shakeel', 'ssdnf@kfd.com', 5222215555),
(12, 'osama', 'osama@gmail.com', 7444889972),
(13, '{aaquib}', '{khan}', 123),
(14, '', '', 7869005513),
(61, 'df', 'joij', 123456789),
(60, 'df', 'joij', 123456789),
(59, 'df', 'joij', 123456789),
(58, '', '', 123456789),
(57, '', '', 123456789),
(22, 'khan', 'aaquib', 7869005513),
(23, 'aaquib', 'khan ', 7869005513),
(24, 'shakeel', 'khan', 9981970055),
(25, 'ABC', 'nfjn', 123),
(26, 'aaquibn ', 'shakeeel@gmail.com', 7987224499),
(27, 'aaquibn ', 'shakeeel@gmail.com', 7987224499),
(28, 'shakeel', 'khan', 5),
(56, '', '', 123456789),
(55, '', '', 123456789),
(54, 'abc', 'sha', 123456789),
(53, 'abc', 'sha', 123456789),
(52, 'JJNJ', 'jj', 123456789),
(51, 'JJNJ', 'jj', 123456789),
(50, '', '', 123456789),
(49, '', '', 123456789),
(48, 'jndj', 'jnjsb', 15555555),
(47, 'jndj', 'jnjsb', 15555555),
(45, 'aaquib', 'kjk', 12555),
(46, 'aaquib', 'kjk', 12555),
(62, 'df', 'joij', 123456789),
(63, 'df', 'joij', 123456789),
(64, 'df', 'joij', 123456789),
(65, 'df', 'joij', 123456789),
(66, 'df', 'joij', 123456789),
(67, 'df', 'joij', 123456789),
(68, 'df', 'joij', 123456789),
(69, 'df', 'joij', 123456789),
(70, 'df', 'joij', 123456789),
(71, 'abc', 'kbc', 123456789),
(72, 'abc', 'kbc', 123456789),
(73, '', '', 123456789),
(74, '', '', 123456789),
(75, 'abc', 'kkps', 123456789),
(76, 'abc', 'kkps', 123456789),
(77, 'aaquib ', 'shakeel', 123456789),
(78, 'aaquib ', 'shakeel', 123456789),
(86, 'first ', 'name', 123456789),
(85, 'first ', 'name', 123456789),
(87, 'last', 'name', 123456789),
(88, 'last', 'name', 123456789),
(89, '', '', 123456789),
(90, '', '', 123456789),
(91, 'khan', 'SHAJKEEEL', 123456789),
(92, 'khan', 'SHAJKEEEL', 123456789),
(93, 'mohsin', 'Aaquibkhann30@gmail.com', 7869005513),
(94, 'mohsin', 'Aaquibkhann30@gmail.com', 7869005513),
(95, 'mohsin', 'Aaquibkhann30@gmail.com', 7869005513),
(96, 'abc', 'Aaquibkhann30@gmail.com', 7869005513),
(97, '<script>', 'aaquibkhann30@gmail.com', 7869005513);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
