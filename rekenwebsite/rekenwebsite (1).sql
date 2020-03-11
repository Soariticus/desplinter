-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 24, 2020 at 11:04 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekenwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `userID` int(255) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role` int(255) NOT NULL,
  PRIMARY KEY (`userID`,`username`),
  UNIQUE KEY `userID` (`userID`,`username`),
  UNIQUE KEY `userID_2` (`userID`,`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`userID`, `username`, `password`, `role`) VALUES
(1, 'j.bertens', '6', 1),
(2, 'm.weijs', '290', 1),
(3, 'admin01', 'admin', 2),
(4, 'admin02', 'admin', 2),
(5, 'docent01', 'docent', 3),
(6, 'docent02', 'docent', 3),
(7, 'leerling01', 'leerling', 4),
(8, 'leerling02', 'leerling', 4),
(9, 'a.rongen', 'bonnie', 4);

-- --------------------------------------------------------

--
-- Table structure for table `toets`
--

DROP TABLE IF EXISTS `toets`;
CREATE TABLE IF NOT EXISTS `toets` (
  `klas` int(1) NOT NULL,
  `vorm` int(1) NOT NULL,
  `vragen` int(250) NOT NULL,
  `maxgetal` int(250) NOT NULL,
  `min` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='min';

--
-- Dumping data for table `toets`
--

INSERT INTO `toets` (`klas`, `vorm`, `vragen`, `maxgetal`, `min`) VALUES
(5, 2, 654, 51, 0),
(6, 1, 1024, 69420, 1),
(4, 9, 20, 10, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
