-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 08, 2013 at 11:07 PM
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
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `country_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=28 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_id`) VALUES
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
-- Table structure for table `configurations`
--

CREATE TABLE IF NOT EXISTS `configurations` (
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
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`id`, `facebook`, `twitter`, `email`, `keywords`, `password`, `sitemap`, `receiver_mail_1`, `receiver_mail_2`, `receiver_mail_3`, `end_date`, `gplus`) VALUES
(1, '', '', 'info@divineds.com', '', 'info1234', '', 'info@divineds.com', '', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=71 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `description`, `path`) VALUES
(1, 'Vanilla_scoop', 'Vanilla', '/assets/frontend/images/vanilla.png'),
(2, 'Strawberry_scoop', 'Strawberry', '/assets/frontend/images/strawberry.png'),
(3, 'Mango_scoop', 'Mango', '/assets/frontend/images/mango.png'),
(4, 'Chocolate_scoop', 'Chocolate', '/assets/frontend/images/chocolate.png'),
(5, 'Strawberry_Shaker shake', 'Strawberry_Shaker', '/assets/frontend/images/chocolate.png'),
(6, 'Blue Berry Shaker shake', 'Blue Berry Shaker', '/assets/frontend/images/2.png'),
(7, 'Late After Eight shake', 'Late After Eight', '/assets/frontend/images/3.png'),
(8, 'Chocolate Basbousa Shake', 'Chocolate Basbousa Shake', '/assets/frontend/images/4.png'),
(9, 'Kit Kat Fusion shake', 'Kit Kat Fusion', '/assets/frontend/images/5.png'),
(10, 'Choc-a-Lot shake', 'Choc-a-Lot', '/assets/frontend/images/6.png'),
(11, 'Basbousa Shake', 'Basbousa Shake', '/assets/frontend/images/7.png'),
(12, 'Caramilla shake', 'Caramilla Shake', '/assets/frontend/images/8.png'),
(13, 'The Hippy Shake', 'The Hippy Shake', '/assets/frontend/images/9.png'),
(14, 'Mango Dream Shake', 'Mango Dream Shake', '/assets/frontend/images/10.png'),
(15, 'Konafa Ice-Cream Sandwich plate', 'Konafa Ice-Cream Sandwich', '/assets/frontend/images/1-2.png'),
(16, 'Chocolate Time plate', 'Chocolate Time', '/assets/frontend/images/2-2.png'),
(17, 'Booster Scoopster plate', 'Booster Scoopster', '/assets/frontend/images/3-2.png'),
(18, 'Ice Raisin Crepe plate', 'Ice Raisin Crepe', '/assets/frontend/images/4-2.png'),
(19, 'Banana Split plate', 'Banana Split', '/assets/frontend/images/5-2.png'),
(20, 'Strawberry Dream plate', 'Strawberry Dream', '/assets/frontend/images/6-2.png'),
(21, 'Sugar High plate', 'Sugar High', '/assets/frontend/images/7-2.png'),
(22, 'Ice Gold Apples plate', 'Ice Gold Apples', '/assets/frontend/images/8-2.png'),
(23, 'Smooth Crunch plate', 'Smooth Crunch', '/assets/frontend/images/9-2.png'),
(24, 'Mango Konafa Madness plate', 'Mango Konafa Madness', '/assets/frontend/images/10-2.png'),
(25, 'Biscuit Crush plate', 'Biscuit Crush', '/assets/frontend/images/11-2.png'),
(26, 'Ice Donut plate', 'Ice Donut', '/assets/frontend/images/12-2.png'),
(27, 'Ice Chocolate Finger plate', 'Ice Chocolate Finger', '/assets/frontend/images/13-2.png'),
(28, 'Type A types', 'Type A', '/assets/frontend/images/typea.png'),
(29, 'Type B types', 'Type B', '/assets/frontend/images/typeb.png'),
(30, 'Type C types', 'Type C', '/assets/frontend/images/typec.png'),
(31, 'Type D types', 'Type D', '/assets/frontend/images/typed.png'),
(32, 'Type E types', 'Type E', '/assets/frontend/images/typee.png'),
(33, 'Type F types', 'Type F', '/assets/frontend/images/typef.png'),
(34, 'theme 1', 'Theme 1', '/assets/frontend/images/menu-1.png'),
(35, 'theme 2', 'Theme 2', '/assets/frontend/images/menu-2.png'),
(36, 'theme 3', 'Theme 3', '/assets/frontend/images/menu-3.png'),
(37, 'theme 4', 'Theme 4', '/assets/frontend/images/menu-4.png'),
(38, 'theme 5', 'Theme 5', '/assets/frontend/images/menu-5.png'),
(39, 'theme 6', 'Theme 6', '/assets/frontend/images/menu-6.png'),
(40, 'theme 7', 'Theme 7', '/assets/frontend/images/menu-7.png'),
(41, 'theme 8', 'Theme 8', '/assets/frontend/images/menu-8.png'),
(42, 'theme 9', 'Theme 9', '/assets/frontend/images/menu-9.png'),
(43, 'theme 10', 'Theme 10', '/assets/frontend/images/menu-10.png'),
(44, 'theme 11', 'Theme 11', '/assets/frontend/images/menu-11.png'),
(45, 'theme 12', 'Theme 12', '/assets/frontend/images/menu-12.png'),
(46, 'Image006.jpg', NULL, 'uploadsImage006.jpg'),
(47, '562898_10152036905960198_1624597422_n.jpg', NULL, 'uploads562898_10152036905960198_1624597422_n.jpg'),
(48, '562898_10152036905960198_1624597422_n1.jpg', NULL, 'uploads562898_10152036905960198_1624597422_n1.jpg'),
(49, 'andalus.jpg', NULL, 'uploadsandalus.jpg'),
(50, '562898_10152036905960198_1624597422_n2.jpg', NULL, 'uploads562898_10152036905960198_1624597422_n2.jpg'),
(51, '22112007157.jpg', NULL, 'uploads22112007157.jpg'),
(52, '221120071571.jpg', NULL, 'uploads221120071571.jpg'),
(53, '221120071572.jpg', NULL, 'uploads221120071572.jpg'),
(54, '221120071573.jpg', NULL, 'uploads221120071573.jpg'),
(55, 'andalus1.jpg', NULL, 'uploadsandalus1.jpg'),
(56, 'andalus2.jpg', NULL, 'uploadsandalus2.jpg'),
(57, 'andalus3.jpg', NULL, 'uploadsandalus3.jpg'),
(58, '221120071574.jpg', NULL, 'uploads221120071574.jpg'),
(59, '221120071575.jpg', NULL, 'uploads221120071575.jpg'),
(60, '221120071576.jpg', NULL, 'uploads221120071576.jpg'),
(61, 'andalus4.jpg', NULL, 'uploadsandalus4.jpg'),
(62, 'Image(459).jpg', NULL, 'uploadsImage(459).jpg'),
(63, '562898_10152036905960198_1624597422_n3.jpg', NULL, 'uploads562898_10152036905960198_1624597422_n3.jpg'),
(64, '562898_10152036905960198_1624597422_n4.jpg', NULL, 'uploads/562898_10152036905960198_1624597422_n4.jpg'),
(65, 'Image0061.jpg', NULL, 'uploads/Image0061.jpg'),
(66, 'Image0062.jpg', NULL, 'uploads/Image0062.jpg'),
(67, 'Image0063.jpg', NULL, 'uploads/Image0063.jpg'),
(68, '562898_10152036905960198_1624597422_n5.jpg', NULL, 'uploads/562898_10152036905960198_1624597422_n5.jpg'),
(69, '562898_10152036905960198_1624597422_n6.jpg', NULL, 'uploads/562898_10152036905960198_1624597422_n6.jpg'),
(70, 'Hydrangeas.jpg', NULL, 'uploads/Hydrangeas.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `sales_man` varchar(100) NOT NULL,
  `menu_title` varchar(100) NOT NULL,
  `file_id` int(11) unsigned DEFAULT NULL,
  `theme_id` int(11) unsigned DEFAULT NULL,
  `type_id` int(11) unsigned DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `delivery_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user_id`),
  KEY `menu_theme` (`theme_id`),
  KEY `logo` (`file_id`),
  KEY `menu_type` (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `user_id`, `name`, `phone`, `mobile`, `email`, `address`, `sales_man`, `menu_title`, `file_id`, `theme_id`, `type_id`, `quantity`, `delivery_date`) VALUES
(41, 1, 'Gamal', '20', '201113053400', 'gshaban@3ash.net', '7-el mesaq st nasr city', 'gamal', 'gogo', 70, 1, 1, 222, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `menu_plates`
--

CREATE TABLE IF NOT EXISTS `menu_plates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) unsigned NOT NULL,
  `plate_id` int(11) unsigned NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `menu_Id_2` (`menu_id`,`plate_id`),
  KEY `menu_Id` (`menu_id`),
  KEY `plate_Id` (`plate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `menu_plates`
--

INSERT INTO `menu_plates` (`id`, `menu_id`, `plate_id`, `price`) VALUES
(3, 41, 1, 5),
(4, 41, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `menu_scopes`
--

CREATE TABLE IF NOT EXISTS `menu_scopes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) unsigned NOT NULL,
  `scope_id` int(11) unsigned NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menu_Id` (`menu_id`,`scope_id`),
  KEY `scope_id` (`scope_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `menu_scopes`
--

INSERT INTO `menu_scopes` (`id`, `menu_id`, `scope_id`, `price`) VALUES
(21, 41, 1, 5),
(22, 41, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `menu_shakes`
--

CREATE TABLE IF NOT EXISTS `menu_shakes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) unsigned NOT NULL,
  `shake_id` int(11) unsigned NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `menu_Id` (`menu_id`,`shake_id`),
  KEY `shake_id` (`shake_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `menu_shakes`
--

INSERT INTO `menu_shakes` (`id`, `menu_id`, `shake_id`, `price`) VALUES
(10, 41, 1, 5),
(11, 41, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `plates`
--

CREATE TABLE IF NOT EXISTS `plates` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `file_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `img` (`file_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `plates`
--

INSERT INTO `plates` (`id`, `name`, `file_id`) VALUES
(1, 'Konafa Ice-Cream Sandwich', 15),
(2, 'Chocolate Time', 16),
(3, 'Booster Scoopster', 17),
(4, 'Ice Raisin Crepe', 18),
(5, 'Banana Split', 19),
(6, 'Strawberry Dream', 20),
(7, 'Sugar High', 21),
(8, 'Ice Gold Apples', 22),
(9, 'Smooth Crunch', 23),
(10, 'Mango Konafa Madness', 24),
(11, 'Biscuit Crush', 25),
(12, 'Ice Donut', 26),
(13, 'Ice Chocolate Finger', 27);

-- --------------------------------------------------------

--
-- Table structure for table `scopes`
--

CREATE TABLE IF NOT EXISTS `scopes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `file_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `img` (`file_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `scopes`
--

INSERT INTO `scopes` (`id`, `name`, `file_id`) VALUES
(1, 'Vanilla', 1),
(2, 'Strawberry', 2),
(3, 'Mango', 3),
(4, 'Chocolate', 4);

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
-- Table structure for table `shakes`
--

CREATE TABLE IF NOT EXISTS `shakes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `file_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `img` (`file_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `shakes`
--

INSERT INTO `shakes` (`id`, `name`, `file_id`) VALUES
(1, 'The Strawberry Shaker', 5),
(2, 'Blue Berry Shaker', 6),
(3, 'Late After Eight', 7),
(4, 'Chocolate Basbousa Shake', 8),
(5, 'Kit Kat Fusion', 9),
(6, 'Choc-a-Lot', 10),
(7, 'Basbousa Shake', 11),
(8, 'Caramilla Shake', 12),
(9, 'The Hippy Shake', 13),
(10, 'Mango Dream', 14);

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE IF NOT EXISTS `themes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `file_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `img` (`file_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `name`, `file_id`) VALUES
(1, '1', 34),
(2, '2', 34),
(3, '3', 34),
(4, '4', 34),
(5, '5', 34),
(6, '6', 34),
(7, '7', 34),
(8, '8', 34),
(9, '9', 34),
(10, '10', 34),
(11, '11', 34),
(12, '12', 34);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `file_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `img` (`file_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `file_id`) VALUES
(1, 'Type A', 28),
(2, 'Type B', 29),
(3, 'Type C', 30),
(4, 'Type D', 31),
(5, 'Type E', 32),
(6, 'Type F', 33);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `country_id`, `city_id`, `birth_day`, `sex_id`, `status`, `registration_date`) VALUES
(1, 'nnnn', 'nnnn', 'nnnn', 111111, 'nnnnnn', 1, 19, '2013-06-20', 1, 'active', '2013-06-28 18:44:46');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menus_ibfk_2` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menus_ibfk_3` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menus_ibfk_4` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_plates`
--
ALTER TABLE `menu_plates`
  ADD CONSTRAINT `menu_plates_ibfk_4` FOREIGN KEY (`plate_id`) REFERENCES `plates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_plates_ibfk_1` FOREIGN KEY (`menu_Id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_plates_ibfk_2` FOREIGN KEY (`plate_Id`) REFERENCES `plates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_plates_ibfk_3` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_scopes`
--
ALTER TABLE `menu_scopes`
  ADD CONSTRAINT `menu_scopes_ibfk_3` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_scopes_ibfk_1` FOREIGN KEY (`menu_Id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_scopes_ibfk_2` FOREIGN KEY (`scope_id`) REFERENCES `scopes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_shakes`
--
ALTER TABLE `menu_shakes`
  ADD CONSTRAINT `menu_shakes_ibfk_3` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_shakes_ibfk_1` FOREIGN KEY (`menu_Id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_shakes_ibfk_2` FOREIGN KEY (`shake_id`) REFERENCES `shakes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plates`
--
ALTER TABLE `plates`
  ADD CONSTRAINT `plates_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scopes`
--
ALTER TABLE `scopes`
  ADD CONSTRAINT `scopes_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shakes`
--
ALTER TABLE `shakes`
  ADD CONSTRAINT `shakes_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `themes`
--
ALTER TABLE `themes`
  ADD CONSTRAINT `themes_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `types`
--
ALTER TABLE `types`
  ADD CONSTRAINT `types_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`sex_id`) REFERENCES `sex` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE  `users` ADD  `last_login` DATETIME  NULL DEFAULT NULL;

ALTER TABLE  `users` ADD  `username` VARCHAR( 100 ) NOT NULL AFTER  `id` ,
ADD UNIQUE (`username`);

ALTER TABLE  `users` ADD  `type` VARCHAR( 10 ) NULL DEFAULT NULL;