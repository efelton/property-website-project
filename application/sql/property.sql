-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2013 at 01:04 AM
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
-- Table structure for table `adminusers`
--

CREATE TABLE IF NOT EXISTS `adminusers` (
  `userid` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`userid`, `password`) VALUES
('admin', 'd39ccb49a0b0b414d624224b14de2fa3');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`property_id`, `title`, `description`, `address_line_1`, `address_line_2`, `address_line_3`, `county_id`, `type_id`, `update_timestamp`, `is_sold`, `price`, `photo_path`) VALUES
(1, 'A small, bijou residence', 'Indescribable', '1 Nice Villas', 'Dublin 11', '', 6, 1, '2013-12-17 18:12:46', 0, 200000, 'crystal.jpg'),
(2, 'Place in the city', 'test', 'test', 'test', 'test', 1, 2, '2013-12-17 18:13:02', 0, 400000, 'extension.jpg'),
(3, 'Glorious Mansion', 'amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing amazing ', '1 Amazing st', 'Amazing boul', 'Amazington', 6, 2, '2013-12-19 22:00:00', 1, 99000, 'sample.jpg'),
(4, 'Testy Place', 'test', 'Testy court', 'Flavia way', 'Cantelope', 3, 3, '2013-12-17 22:15:56', 1, 500000, 'sample.jpg'),
(5, 'Tuple place', 'test', '1 the county type', 'test', 'test2', 4, 1, '2013-12-17 18:13:25', 0, 450000, 'sample.jpg'),
(6, 'Galway Looker', 'Galway (Irish: Cathair na Gaillimhe), is a city in Ireland. It is in the West Region and the province of Connacht. Galway City Council is the local authority for the city. Galway lies on the River Corrib between Lough Corrib and Galway Bay and is surrounded by County Galway. It is the fourth most populous city in the state and the sixth most populous on the island of Ireland.', '21 Taylor''s Hill', '', '', 7, 1, '2013-12-17 20:21:01', 0, 285000, 'galway.jpg'),
(7, 'Modest Abode', 'When in the Course of human events, it becomes necessary for one people to dissolve the political bands which have connected them with another, and to assume among the powers of the earth, the separate and equal station to which the Laws of Nature and of Nature''s God entitle them, a decent respect to the opinions of mankind requires that they should declare the causes which impel them to the separation.\r\n\r\nWe hold these truths to be self-evident, that all men are created equal, that they are endowed by their Creator with certain unalienable Rights, that among these are Life, Liberty and the pursuit of Happiness.--That to secure these rights, Governments are instituted among Men, deriving their just powers from the consent of the governed,', '123 Able st.', 'Abodington', '', 16, 1, '2013-12-19 22:03:06', 0, 125000, 'whitehouse.jpg'),
(8, 'Coronation St', ' "Albert Tatlock (Jack Howarth): Have you got summat to tell me? \r\nMinnie Caldwell (Margot Bryant): Yes, Albert, I''m afraid I have. \r\nAlbert: Well, if you got summat to say, spit it out instead of rabbitin'' on about nothin''.\r\nMinnie: I am not rabbitin'' on about nothin'', Albert, I am definitely rabbitin'' on about somethin''.\r\nAlbert: What? \r\nMinnie: Our future life together. I don''t think we got one. ', '10 Coronation St', 'Angst town', '', 26, 3, '2013-12-19 22:07:18', 0, 85000, 'coronation.jpg'),
(18, 'Very Affordable', 'A doll of a place; for all your 9 inch tall needs', '1 Barbie St', '', '', 14, 1, '2013-12-19 22:01:52', 0, 250, 'dollhouse.jpg'),
(20, 'Canterlot Castle', 'A never to be repeated offer. Home of the princess. The chance to buy this mythical property. Excellent for stabling your magical ponies..', '1 Royal Way', 'Canterlot Mountain', '', 12, 1, '2013-12-20 00:51:21', 0, 99999999, 'canterlot1.png');

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
