-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2013 at 08:14 PM
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
-- Table structure for table `counties`
--

CREATE TABLE IF NOT EXISTS `counties` (
  `county_id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`county_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `counties`
--

INSERT INTO `counties` (`county_id`, `name`) VALUES
(1, 'Carlow'),
(2, 'Cavan'),
(3, 'Clare'),
(4, 'Cork'),
(5, 'Donegal'),
(6, 'Dublin'),
(7, 'Galway'),
(8, 'Kerry'),
(9, 'Kildare'),
(10, 'Kilkenny'),
(11, 'Laois'),
(12, 'Leitrim'),
(13, 'Limerick'),
(14, 'Longford'),
(15, 'Louth'),
(16, 'Mayo'),
(17, 'Meath'),
(18, 'Monaghan'),
(19, 'Offaly'),
(20, 'Roscommon'),
(21, 'Sligo'),
(22, 'Tipperary'),
(23, 'Waterford'),
(24, 'Westmeath'),
(25, 'Wexford'),
(26, 'Wicklow');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`property_id`, `title`, `description`, `address_line_1`, `address_line_2`, `address_line_3`, `county_id`, `type_id`, `update_timestamp`, `is_sold`, `price`, `photo_path`) VALUES
(1, 'A small, bijou residence', 'Indescribable', '1 Nice Villas', 'Dublin 11', '', 6, 1, '2013-12-17 18:12:46', 0, 200000, 'crystal.jpg'),
(2, 'Place in the city', 'test', 'test', 'test', 'test', 1, 2, '2013-12-17 18:13:02', 0, 400000, 'extension.jpg'),
(3, 'Glorious Mansion', 'amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing ', '1 Amazing st', 'Amazing boul', 'Amazington', 6, 3, '2013-12-17 18:13:10', 0, 99000, 'sample.jpg'),
(4, 'Testy Place', 'test', 'Testy court', 'Flavia way', 'Cantelope', 3, 0, '2013-12-17 18:13:19', 1, 500000, 'sample.jpg'),
(5, 'Tuple place', 'test', '1 the county type', 'test', 'test2', 4, 1, '2013-12-17 18:13:25', 0, 450000, 'sample.jpg'),
(6, 'Galway Looker', 'Galway (Irish: Cathair na Gaillimhe), is a city in Ireland. It is in the West Region and the province of Connacht. Galway City Council is the local authority for the city. Galway lies on the River Corrib between Lough Corrib and Galway Bay and is surrounded by County Galway. It is the fourth most populous city in the state and the sixth most populous on the island of Ireland.', '21 Taylor''s Hill', '', '', 7, 1, '2013-12-17 19:03:01', 0, 285000, '');

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
