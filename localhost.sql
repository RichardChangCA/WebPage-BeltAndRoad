-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2017 at 03:32 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zlfdb`
--
CREATE DATABASE IF NOT EXISTS `zlfdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `zlfdb`;

-- --------------------------------------------------------

--
-- Table structure for table `myadmins`
--

CREATE TABLE IF NOT EXISTS `myadmins` (
  `adminId` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `adminPassword` varchar(20) NOT NULL,
  `admin_reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `myadmins`
--

INSERT INTO `myadmins` (`adminId`, `adminPassword`, `admin_reg_date`) VALUES
(100, '2015', '2017-06-16 01:57:02');

-- --------------------------------------------------------

--
-- Table structure for table `myguests`
--

CREATE TABLE IF NOT EXISTS `myguests` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthday` date DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `rank` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(13) unsigned NOT NULL,
  `password` varchar(20) NOT NULL,
  `browser` varchar(20) DEFAULT NULL,
  `headfile` varchar(100) DEFAULT NULL,
  `favorite` varchar(50) DEFAULT NULL,
  `favoriteWeb` varchar(50) DEFAULT NULL,
  `favoriteColor` varchar(10) DEFAULT NULL,
  `luckyNumber` int(1) unsigned DEFAULT NULL,
  `addText` text,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100005 ;

--
-- Dumping data for table `myguests`
--

INSERT INTO `myguests` (`id`, `firstname`, `lastname`, `gender`, `birthday`, `age`, `rank`, `email`, `phone`, `password`, `browser`, `headfile`, `favorite`, `favoriteWeb`, `favoriteColor`, `luckyNumber`, `addText`, `reg_date`) VALUES
(100000, 'ZHANG', 'lingfeng', '', NULL, NULL, NULL, '', 0, '20152649', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-16 01:57:02'),
(100001, 'lingfeng', 'ZHANG', 'male', '1997-09-17', 19, 'undergraduate', 'zlf465074419@gmail.com', 15900309938, '20152649', 'Chrome', 'uploads/1.jpg', NULL, 'https://www.w3schools.com', '#1cb5ca', 7, 'web homework', '2017-06-16 01:58:58'),
(100002, 'raiford', 'CHANG', 'male', '0000-00-00', 20, 'undergraduate', '123@321.com', 15433334342, '2015', '', NULL, NULL, '', '#000000', 7, '', '2017-06-16 02:00:04'),
(100003, 'lei', 'LI', 'male', '0000-00-00', 20, 'undergraduate', '111@11.com', 13444242132, '20152649', '', NULL, NULL, '', '#000000', 7, '', '2017-06-16 02:00:36'),
(100004, 'meimei', 'HAN', 'female', '0000-00-00', 24, 'undergraduate', '1111@qq.com', 65847363, '20152015', '', NULL, NULL, '', '#000000', 7, '', '2017-06-16 02:01:12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
