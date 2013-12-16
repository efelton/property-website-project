-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2013 at 10:19 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `property`
--
CREATE DATABASE IF NOT EXISTS `property` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `property`;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE IF NOT EXISTS `properties` (
  `property_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `address_line_1` varchar(100) NOT NULL,
  `address_line_2` varchar(100) NOT NULL,
  `address_line_3` varchar(100) NOT NULL,
  `county_id` int(10) NOT NULL,
  `type_id` int(10) NOT NULL,
  `update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_sold` tinyint(1) NOT NULL,
  `price` int(11) NOT NULL,
  `photo_path` varchar(100) NOT NULL,
  PRIMARY KEY (`property_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`property_id`, `title`, `description`, `address_line_1`, `address_line_2`, `address_line_3`, `county_id`, `type_id`, `update_timestamp`, `is_sold`, `price`, `photo_path`) VALUES
(1, 'A small, bijou residence', '', '1 Nice Villas', 'Dublin 11', '', 0, 0, '2013-12-16 14:08:56', 0, 200000, ''),
(2, '', 'test', 'test', 'test', 'test', 0, 0, '2013-12-16 16:02:25', 0, 0, ''),
(3, 'Glorious Mansion', 'amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing ', '1 Amazing st', 'Amazing boul', 'Amazington', 0, 0, '2013-12-16 16:03:37', 0, 99000, ''),
(4, 'Testy Place', 'test', 'Testy court', 'Flavia way', 'Cantelope', 0, 0, '2013-12-16 16:05:50', 1, 500000, ''),
(5, 'Tuple place', 'test', '1 the county type', 'test', 'test2', 0, 1, '2013-12-16 18:32:06', 0, 450000, '');

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE IF NOT EXISTS `property_types` (
  `type_id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`type_id`, `name`) VALUES
(1, 'Detached'),
(2, 'Semi-detached'),
(3, 'Terrace');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
