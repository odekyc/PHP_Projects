-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2017 at 08:47 PM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `c9`
--
--
-- Database: `ode_food_poll`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_list`
--

CREATE TABLE IF NOT EXISTS `food_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(30) NOT NULL,
  `foodname` varchar(300) DEFAULT NULL,
  `serving_standard` varchar(80) NOT NULL,
  `serving_sizes` varchar(300) NOT NULL,
  `actual_serving_count` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=104 ;

--
-- Dumping data for table `food_list`
--

INSERT INTO `food_list` (`id`, `category`, `foodname`, `serving_standard`, `serving_sizes`, `actual_serving_count`) VALUES
(1, 'Meat', 'Steak', 'ounce', '(less than 3,3-6,6-9,more than 9)', '(3,3,6,8)'),
(2, 'Meat', 'Pork', 'ounce', '(less than 3,3-6,6-9,more than 9)', '(1,3,7,9)'),
(3, 'Meat', 'Fish', 'ounce', '(less than 6,6-9,9-12,more than 12)', '(3,4,7,6)'),
(4, 'Meat', 'Lamb', 'ounce', '(less than 3,3-6,6-9,more than 9)', '(4,6,6,4)'),
(5, 'Meat', 'Chicken', 'ounce', '(less than 4,4-7,7-10,more than 10)', '(2,3,9,8)'),
(6, 'Meat', 'Shrimp', 'ounce', '(less than 4,4-7,7-10,more than 10)', '(4,6,6,4)'),
(7, 'Meat', 'Crab', 'ounce', '(less than 2,2-5,5-8,more than 8)', '(4,8,6,2)'),
(8, 'Meat', 'Lobster', 'ounce', '(less than 3,3-6,6-9,more than 9)', '(12,1,3,4)'),
(9, 'Meat', 'Clam', 'ounce', '(less than 3,3-6,6-9,more than 9)', '(11,1,3,5)'),
(10, 'Meat', 'Mussel', 'ounce', '(less than 3,3-6,6-9,more than 9)', '(10,2,3,5)'),
(11, 'Meat', 'Squid', 'ounce', '(less than 3,3-6,6-9,more than 9)', '(11,2,4,3)'),
(12, 'Meat', 'Scallop', 'ounce', '(less than 3,3-6,6-9,more than 9)', '(11,1,3,5)'),
(13, 'Meat', 'Oyster', 'ounce', '(less than 3,3-6,6-9,more than 9)', '(12,1,3,4)'),
(14, 'Meat', 'Octopus', 'ounce', '(less than 3,3-6,6-9,more than 9)', '(12,1,3,4)'),
(15, 'Meat', 'Abalone', 'ounce', '(less than 1,1-4,4-7,more than 7)', '(14,5,1,0)'),
(16, 'Vegetable', 'Onions', 'cup', '(less than 2,2-3,3-4,more than 4)', '(5,6,6,3)'),
(17, 'Vegetable', 'Eggplant', 'cup', '(less than 2,2-4,4-6,more than 6)', '(5,5,5,5)'),
(18, 'Vegetable', 'Lettuce', 'cup', '(less than 2,2-4,4-6,more than 6)', '(3,7,7,3)'),
(19, 'Vegetable', 'Turnip', 'medium whole', '(0,1,2,more than 2)', '(8,2,2,8)'),
(20, 'Vegetable', 'Spinach', 'cup', '(0,1,2,more than 2)', '(2,4,7,7)'),
(21, 'Vegetable', 'Tomato', 'medium whole', '(0,1,2,more than 2)', '(1,9,6,4)'),
(22, 'Vegetable', 'Potato', 'medium whole', '(0,1,2,more than 2)', '(2,4,6,8)'),
(23, 'Vegetable', 'Radish', 'cup', '(0,1,2,more than 2)', '(4,4,5,7)'),
(24, 'Vegetable', 'Mushroom', 'sliced cup', '(1,2-3,3-4,more than 4)', '(2,6,5,7)'),
(25, 'Vegetable', 'Kaffir Leaves', 'cup', '(0,1,2,more than 2)', '(5,0,7,8)'),
(26, 'Vegetable', 'Gourd', 'cup', '(0,1,2,more than 2)', '(12,1,3,4)'),
(27, 'Vegetable', 'Spring Onions', 'chopped cup', '(0,1,2,more than 2)', '(1,12,6,1)'),
(28, 'Vegetable', 'Chili', 'whole', '(0,1-2,3-4,more than 4)', '(4,2,9,5)'),
(29, 'Vegetable', 'Chili Pepper', 'whole', '(0,1,2,more than 2)', '(5,9,4,2)'),
(30, 'Vegetable', 'Jalapeno', 'whole', '(0,1,2,more than 2)', '(7,3,6,4)'),
(31, 'Vegetable', 'Sweet Potato', 'medium whole', '(0,1,2,more than 2)', '(5,4,4,7)'),
(32, 'Vegetable', 'Yam', 'medium whole', '(0,1,2,more than 2)', '(6,4,4,7)'),
(33, 'Vegetable', 'Chinese Yam', 'cup', '(0,1,2,more than 2)', '(15,0,2,3)'),
(34, 'Vegetable', 'Garlic', 'clove', '(less than 2,2-3,4-5,more than 5)', '(0,3,8,9)'),
(35, 'Vegetable', 'Zucchini', 'cup', '(0,1,2,more than 2)', '(7,1,5,7)'),
(36, 'Vegetable', 'Cucumber', 'medium whole', '(less than 2,2-3,4-5,more than 5)', '(2,6,8,4)'),
(37, 'Vegetable', 'Green Peas', 'cup', '(0,1,2,more than 2)', '(3,4,5,8)'),
(38, 'Vegetable', 'Leek', 'cup', '(0,1,2,more than 2)', '(12,7,1,0)'),
(39, 'Vegetable', 'Corn', 'cup', '(0,1,2,more than 2)', '(1,7,8,4)'),
(40, 'Vegetable', 'Celery', 'cup', '(0,1,2,more than 2)', '(10,2,4,4)'),
(41, 'Vegetable', 'Carrot', 'cup', '(0,1,2,more than 2)', '(0,14,5,1)'),
(42, 'Vegetable', 'Cauliflower', 'cup', '(0,1,2,more than 2)', '(2,6,6,6)'),
(43, 'Vegetable', 'Shiitake Mushroom', 'cup', '(0,1,2,more than 2)', '(12,7,1,0)'),
(44, 'Vegetable', 'Cabbage', 'chopped cup', '(0,1,2,more than 2)', '(0,5,9,6)'),
(45, 'Vegetable', 'Bamboo Shoots', 'sliced cup', '(0,1,2,more than 2)', '(17,1,1,1)'),
(46, 'Vegetable', 'Lotus Root', 'per ten slices', '(less than 2,2-3,4-5,more than 5)', '(12,1,5,2)'),
(47, 'Vegetable', 'Ginger', 'tsp', '(0,1,2,more than 2)', '(2,6,8,4)'),
(48, 'Vegetable', 'Asparagus', 'cup', '(0,1,2,more than 2)', '(3,7,7,3)'),
(49, 'Vegetable', 'Artichoke', 'medium whole', '(0,1,2,more than 2)', '(6,6,6,2)'),
(50, 'Vegetable', 'Baby Corn', 'ear', '(less than 3,3-5,6-8,more than 8)', '(3,3,7,7)'),
(51, 'Vegetable', 'Avocado', 'medium whole', '(0,1,2,more than 2)', '(2,6,8,4)'),
(52, 'Vegetable', 'Beans', 'cup', '(0,1,2,more than 2)', '(2,6,6,6)'),
(53, 'Vegetable', 'Luffa', 'cup', '(0,1,2,more than 2)', '(3,2,8,7)'),
(54, 'Vegetable', 'Squash', 'cup', '(0,1,2,more than 2)', '(7,3,6,4)'),
(55, 'Vegetable', 'Beetroot', 'per ten slices', '(0,1,2,more than 2)', '(7,7,3,3)'),
(56, 'Beverage', 'Black Tea', 'cup', '(0,1,2,more than 2)', '(2,11,4,3)'),
(57, 'Beverage', 'Green Tea', 'cup', '(0,1,2,more than 2)', '(4,7,6,5)'),
(58, 'Beverage', 'Non-Fat Milk', 'cup', '(0,1,2,more than 2)', '(1,8,6,7)'),
(59, 'Beverage', '2% Milk', 'cup', '(0,1,2,more than 2)', '(0,8,6,6)'),
(60, 'Beverage', 'Whole Milk', 'cup', '(0,1,2,more than 2)', '(5,7,5,5)'),
(61, 'Beverage', 'Goat Milk', 'cup', '(0,1,2,more than 2)', '(7,7,3,3)'),
(62, 'Beverage', 'Coke', 'cup', '(0,1,2,more than 2)', '(2,6,5,7)'),
(63, 'Beverage', 'Coffee', 'cup', '(0,1,2,more than 2)', '(0,6,6,8)'),
(64, 'Beverage', 'Fruit Juice', 'cup', '(0,1,2,more than 2)', '(10,5,4,2)'),
(65, 'Fruit', 'Grape', 'cup', '(less than 2,2-3,4-5,more than 5)', '(3,7,5,5)'),
(66, 'Fruit', 'Apricot', 'medium whole', '(0,1,2,more than 2)', '(3,5,6,6)'),
(67, 'Fruit', 'Cherry', 'cup', '(less than 2,2-3,4-5,more than 5)', '(6,5,5,4)'),
(68, 'Fruit', 'Loquat', 'medium whole', '(less than 2,2-3,4-5,more than 5)', '(5,6,7,4)'),
(69, 'Fruit', 'Kiwi Fruit', 'medium whole', '(0,1,2,more than 2)', '(3,4,7,6)'),
(70, 'Fruit', 'Peach', 'medium whole', '(0,1,2,more than 2)', '(3,5,6,6)'),
(71, 'Fruit', 'Pear', 'medium whole', '(0,1,2,more than 2)', '(3,6,6,6)'),
(72, 'Fruit', 'Jujube', 'medium whole', '(less than 2,2-3,4-5,more than 5)', '(3,7,7,3)'),
(73, 'Fruit', 'Coconut', 'shredded cup', '(0,1,2,more than 2)', '(7,9,3,1)'),
(74, 'Fruit', 'Raspberry', 'cup', '(0,1,2,more than 2)', '(7,6,7,0)'),
(75, 'Fruit', 'Persimmon', 'medium whole', '(0,1,2,more than 2)', '(7,6,3,4)'),
(76, 'Fruit', 'Plum', 'medium whole', '(0,1,2,more than 2)', '(7,3,6,4)'),
(77, 'Fruit', 'Jackfruit', 'sliced cup', '(less than 2,2-3,4-5,more than 5)', '(6,2,6,6)'),
(78, 'Fruit', 'Cranberries', 'cup', '(0,1,2,more than 2)', '(6,8,3,3)'),
(79, 'Fruit', 'Durian', 'cup', '(less than 2,2-3,4-5,more than 5)', '(6,2,3,9)'),
(80, 'Fruit', 'Lychee', 'cup', '(less than 2,2-3,4-5,more than 5)', '(12,1,1,6)'),
(81, 'Fruit', 'Pineapple', 'diced cup', '(less than 2,2-3,4-5,more than 5)', '(12,7,1,0)'),
(82, 'Fruit', 'Rambutan', 'sliced cup', '(less than 2,2-3,4-5,more than 5)', '(7,12,2,1)'),
(83, 'Fruit', 'Mango', 'medium whole', '(0,1,2,more than 2)', '(9,6,3,2)'),
(84, 'Fruit', 'Watermelon', 'diced cup', '(less than 2,2-4,5-7,more than 7)', '(6,9,3,3)'),
(85, 'Fruit', 'Fig', 'medium whole', '(less than 2,2-3,4-5,more than 5)', '(6,3,6,5)'),
(86, 'Fruit', 'Guava', 'medium whole', '(0,1,2,more than 2)', '(7,3,3,7)'),
(87, 'Fruit', 'Grapefruit', 'medium whole', '(0,1,2,more than 2)', '(12,7,1,0)'),
(88, 'Fruit', 'Dragonfruit', 'medium whole', '(0,1,2,more than 2)', '(12,8,0,0)'),
(89, 'Fruit', 'Olive', 'per 3 wholes', '(0,1,2,more than 2)', '(12,3,3,2)'),
(90, 'Fruit', 'Miracle Fruit', 'per 3 wholes', '(0,1,2,more than 2)', '(12,3,3,2)'),
(91, 'Fruit', 'Blackberries', 'cup', '(0,1,2,more than 2)', '(8,5,6,3)'),
(92, 'Fruit', 'Lime', 'medium whole', '(0,1,2,more than 2)', '(4,14,1,1)'),
(93, 'Fruit', 'Orange', 'medium whole', '(0,1,2,more than 2)', '(3,3,7,7)'),
(94, 'Fruit', 'Kumquat', 'per 2 wholes', '(0,1,2,more than 2)', '(7,3,5,5)'),
(95, 'Fruit', 'Strawberry', 'per 3 wholes', '(0,1,2,more than 2)', '(3,6,5,6)'),
(96, 'Fruit', 'Starfruit', 'per 4 slices', '(0,1,2,more than 2)', '(12,2,3,3)'),
(97, 'Fruit', 'Apple', 'medium whole', '(0,1,2,more than 2)', '(3,6,5,6)'),
(98, 'Fruit', 'Mulberries', 'cup', '(0,1,2,more than 2)', '(3,6,6,5)'),
(99, 'Fruit', 'Huckleberries', 'cup', '(0,1,2,more than 2)', '(7,12,1,1)'),
(100, 'Fruit', 'Gooseberries', 'per 2 whole', '(0,1,2,more than 2)', '(7,12,1,0)'),
(103, 'Beverage', 'Krungthepmahanakhon Amornrattanakosin Mahintharayutthaya', 'cup', '(0,1,2,more than 2)', '(6,4,4,7)');

-- --------------------------------------------------------

--
-- Table structure for table `user_polls`
--

CREATE TABLE IF NOT EXISTS `user_polls` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(35) NOT NULL,
  `foodname` varchar(60) NOT NULL,
  `serving_standard` varchar(40) NOT NULL,
  `serving_sizes` varchar(40) NOT NULL,
  `actual_serving_count` varchar(40) NOT NULL,
  `user_votes` varchar(40) NOT NULL,
  `last_vote` varchar(5) NOT NULL,
  `last_vote_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
--
-- Database: `phpmyadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE IF NOT EXISTS `pma__bookmark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE IF NOT EXISTS `pma__column_info` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_coords`
--

CREATE TABLE IF NOT EXISTS `pma__designer_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `x` int(11) DEFAULT NULL,
  `y` int(11) DEFAULT NULL,
  `v` tinyint(4) DEFAULT NULL,
  `h` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE IF NOT EXISTS `pma__history` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`,`db`,`table`,`timevalue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE IF NOT EXISTS `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`page_nr`),
  KEY `db_name` (`db_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE IF NOT EXISTS `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE IF NOT EXISTS `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  KEY `foreign_field` (`foreign_db`,`foreign_table`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE IF NOT EXISTS `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float unsigned NOT NULL DEFAULT '0',
  `y` float unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE IF NOT EXISTS `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE IF NOT EXISTS `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`,`db_name`,`table_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE IF NOT EXISTS `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`db_name`,`table_name`,`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE IF NOT EXISTS `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma_bookmark`
--

CREATE TABLE IF NOT EXISTS `pma_bookmark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma_column_info`
--

CREATE TABLE IF NOT EXISTS `pma_column_info` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma_designer_coords`
--

CREATE TABLE IF NOT EXISTS `pma_designer_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `x` int(11) DEFAULT NULL,
  `y` int(11) DEFAULT NULL,
  `v` tinyint(4) DEFAULT NULL,
  `h` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma_history`
--

CREATE TABLE IF NOT EXISTS `pma_history` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`,`db`,`table`,`timevalue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma_pdf_pages`
--

CREATE TABLE IF NOT EXISTS `pma_pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`page_nr`),
  KEY `db_name` (`db_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma_recent`
--

CREATE TABLE IF NOT EXISTS `pma_recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma_relation`
--

CREATE TABLE IF NOT EXISTS `pma_relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  KEY `foreign_field` (`foreign_db`,`foreign_table`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma_table_coords`
--

CREATE TABLE IF NOT EXISTS `pma_table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float unsigned NOT NULL DEFAULT '0',
  `y` float unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma_table_info`
--

CREATE TABLE IF NOT EXISTS `pma_table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma_table_uiprefs`
--

CREATE TABLE IF NOT EXISTS `pma_table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`,`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma_tracking`
--

CREATE TABLE IF NOT EXISTS `pma_tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`db_name`,`table_name`,`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma_userconfig`
--

CREATE TABLE IF NOT EXISTS `pma_userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
