-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 21, 2013 at 07:50 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nstl`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `country_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=28 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `country_id`) VALUES
(1, 'Alexandria', 1),
(2, 'Aswan', 1),
(3, 'Asyut', 1),
(4, 'Beheira', 1),
(5, 'Beni Suef', 1),
(6, 'Cairo', 1),
(7, 'Dakahlia', 1),
(8, 'Damietta', 1),
(9, 'Faiyum', 1),
(10, 'Gharbia', 1),
(11, 'Giza', 1),
(12, 'Ismailia', 1),
(13, 'Kafr el-Sheikh', 1),
(14, 'Matruh', 1),
(15, 'Minya', 1),
(16, 'Monufia', 1),
(17, 'New Valley', 1),
(18, 'North Sinai', 1),
(19, 'Port Said', 1),
(20, 'Qalyubia', 1),
(21, 'Qena', 1),
(22, 'Red Sea', 1),
(23, 'Al Sharqia', 1),
(24, 'Sohag', 1),
(25, 'South Sinai', 1),
(26, 'Suez', 1),
(27, 'Luxor', 1);

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE IF NOT EXISTS `configuration` (
  `id` int(10) unsigned NOT NULL,
  `facebook` varchar(300) NOT NULL,
  `twitter` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `keywords` text NOT NULL,
  `password` varchar(300) NOT NULL,
  `sitemap` text NOT NULL,
  `receiver_mail_1` varchar(300) NOT NULL,
  `receiver_mail_2` varchar(300) NOT NULL,
  `receiver_mail_3` varchar(300) NOT NULL,
  `end_date` datetime NOT NULL,
  `gplus` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`id`, `facebook`, `twitter`, `email`, `keywords`, `password`, `sitemap`, `receiver_mail_1`, `receiver_mail_2`, `receiver_mail_3`, `end_date`, `gplus`) VALUES
(1, '', '', 'noreply@devine.come', '', 'noreply123', '', 'info@devine.come', '', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'Egypt');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `path` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

--
-- Dumping data for table `files`
--


-- --------------------------------------------------------

--
-- Table structure for table `sex`
--

CREATE TABLE IF NOT EXISTS `sex` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sex` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sex`
--

INSERT INTO `sex` (`id`, `sex`) VALUES
(1, 'male'),
(2, 'female');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(40) NOT NULL,
  `phone` int(12) NOT NULL,
  `address` varchar(512) NOT NULL,
  `country_id` int(11) unsigned DEFAULT NULL,
  `city_id` int(11) unsigned DEFAULT NULL,
  `birth_day` date DEFAULT NULL,
  `sex_id` int(11) unsigned DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `registration_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `country_id` (`country_id`),
  KEY `city_id` (`city_id`),
  KEY `sex_id` (`sex_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`sex_id`) REFERENCES `sex` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
