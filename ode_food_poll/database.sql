-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 12, 2017 at 03:07 PM
-- Server version: 10.1.20-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u703581934_ode`
-- --
-- CREATE DATABASE IF NOT EXISTS `u703581934_ode` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
-- USE `u703581934_ode`;



DROP TABLE IF EXISTS `food_list` ;
DROP TABLE IF EXISTS `user_votes`;
DROP TABLE IF EXISTS `user_polls`;
DROP TABLE IF EXISTS `user_saved`;
--

CREATE TABLE `food_list` (
  `id` int(50) NOT NULL,
  `category` varchar(250) CHARACTER SET utf8 NOT NULL,
  `foodname` varchar(250) CHARACTER SET utf8 NOT NULL,
  `serving_standard` varchar(300) CHARACTER SET utf8 NOT NULL,
  `serving_sizes` varchar(370) CHARACTER SET utf8 NOT NULL,
  `actual_serving_count` varchar(300) CHARACTER SET utf8 NOT NULL,
  `saved` varchar(300) CHARACTER SET utf8 NOT NULL,
  `usermade` varchar(73) CHARACTER SET utf8 NOT NULL,
  `creator_username` varchar(370) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `food_list`
--

INSERT INTO `food_list` (`id`, `category`, `foodname`, `serving_standard`, `serving_sizes`, `actual_serving_count`, `saved`, `usermade`, `creator_username`) VALUES
(1, 'Meat', 'Steak', 'ounce', '(less than 3,3-6,6-9,more than 9)', '(3,3,6,8)', 'unchecked', 'no', ''),
(2, 'Meat', 'Pork', 'ounce', '(less than 3,3-6,6-9,more than 9)', '(1,3,7,9)', 'unchecked', 'no', ''),
(3, 'Seafood', 'Fish', 'ounce', '(less than 6,6-9,9-12,more than 12)', '(3,4,7,6) ', 'unchecked', 'no', ''),
(4, 'Meat', 'Lamb', 'ounce', '(less than 3,3-6,6-9,more than 9) ', '(4,6,6,4) ', 'unchecked', 'no', ''),
(5, 'Meat', 'Chicken', 'ounce', '(less than 4,4-7,7-10,more than 10)', '(2,3,9,8) ', 'unchecked', 'no', ''),
(6, 'Seafood', 'Shrimp', 'ounce', '(less than 4,4-7,7-10,more than 10)', '(4,6,6,4)', 'unchecked', 'no', ''),
(7, 'Seafood', 'Crab', 'ounce', '(less than 2,2-5,5-8,more than 8) ', '(4,8,6,2) ', 'unchecked', 'no', ''),
(8, 'Seafood', 'Lobster', 'ounce', '(less than 3,3-6,6-9,more than 9)', '(12,1,3,4) ', 'unchecked', 'no', ''),
(9, 'Seafood', 'Clam', 'ounce', '(less than 3,3-6,6-9,more than 9) ', '(11,1,3,5) ', 'unchecked', 'no', ''),
(10, 'Seafood', 'Mussel', 'ounce', '(less than 3,3-6,6-9,more than 9)', '(10,2,3,5) ', 'unchecked', 'no', ''),
(11, 'Seafood', 'Squid', 'ounce', '(less than 3,3-6,6-9,more than 9)', '(11,2,4,3)', 'unchecked', 'no', ''),
(12, 'Seafood', 'Scallop', 'ounce', '(less than 3,3-6,6-9,more than 9)', '(11,1,3,5) ', 'unchecked', 'no', ''),
(13, 'Seafood', 'Oyster', 'ounce', '(less than 3,3-6,6-9,more than 9)', '(12,2,3,4)', 'unchecked', 'no', ''),
(14, 'Seafood', 'Octopus', 'ounce', '(less than 3,3-6,6-9,more than 9) ', '(12,1,3,4)', 'unchecked', 'no', ''),
(15, 'Seafood', 'Abalone', 'ounce', '(less than 1,1-4,4-7,more than 7)', '(16,5,1,0)', 'ElvaChao1', 'no', ''),
(16, 'Vegetable', 'Onions', 'cup', '(less than 2,2-3,3-4,more than 4)', '(5,6,6,3)', 'unchecked', 'no', ''),
(17, 'Vegetable', 'Eggplant', 'cup', '(less than 2,2-4,4-6,more than 6)', '(5,5,5,5) ', 'unchecked', 'no', ''),
(18, 'Vegetable', 'Lettuce', 'cup', '(less than 2,2-4,4-6,more than 6)', '(3,7,7,3)', 'unchecked', 'no', ''),
(19, 'Vegetable', 'Turnip', 'medium whole', '(0,1,2,more than 2) ', '(8,2,2,8)', 'unchecked', 'no', ''),
(20, 'Vegetable', 'Spinach', 'cup', '(0,1,2,more than 2) ', '(2,4,7,7) ', 'unchecked', 'no', ''),
(21, 'Vegetable', 'Tomato', 'medium whole', '(0,1,2,more than 2)', '(1,9,6,4)', 'unchecked ', 'no', ''),
(22, 'Vegetable', 'Potato', 'medium whole', '(0,1,2,more than 2)', '(2,4,6,8) ', 'unchecked', 'no', ''),
(23, 'Vegetable', 'Radish', 'cup', '(0,1,2,more than 2) ', '(9,4,5,7) ', 'unchecked', 'no', ''),
(24, 'Vegetable', 'Mushroom', 'sliced cup', '(1,2-3,3-4,more than 4) ', '(2,6,5,7) ', 'unchecked ', 'no', ''),
(25, 'Vegetable', 'Kaffir Leaves  ', 'cup', '(0,1,2,more than 2) ', '(5,0,7,8)', 'unchecked', 'no', ''),
(26, 'Vegetable', 'Gourd', 'cup', '(0,1,2,more than 2)', '(12,1,3,4)', 'unchecked', 'no', ''),
(27, 'Vegetable', 'Spring Onions', 'chopped cup', '(0,1,2,more than 2)', '(1,12,6,1)', 'unchecked', 'no', ''),
(28, 'Vegetable', 'Chili', 'whole', '(0,1-2,3-4,more than 4) ', '(4,2,9,5)', 'unchecked', 'no', ''),
(29, 'Vegetable', 'Chili Pepper', 'whole', '(0,1,2,more than 2)', '(5,9,4,2)', 'unchecked', 'no', ''),
(30, 'Vegetable', 'Jalapeno', 'whole', '(0,1,2,more than 2)', '(7,3,6,4)', 'unchecked', 'no', ''),
(31, 'Vegetable', 'Sweet Potato', 'medium whole', '(0,1,2,more than 2) ', '(5,4,4,7)', 'unchecked ', 'no', ''),
(32, 'Vegetable', 'Yam', 'medium whole', '(0,1,2,more than 2) ', '(6,4,4,7)', 'unchecked', 'no', ''),
(33, 'Vegetable', 'Chinese Yam', 'cup', '(0,1,2,more than 2)', '(15,0,2,3)', 'unchecked', 'no', ''),
(34, 'Vegetable', 'Garlic', 'clove', '(less than 2,2-3,4-5,more than 5)', '(0,3,8,9)', 'unchecked', 'no', ''),
(35, 'Vegetable', 'Zucchini ', 'cup', '(0,1,2,more than 2)', '(7,1,5,7)', 'unchecked ', 'no', ''),
(36, 'Vegetable', 'Cucumber', 'medium whole', '(less than 2,2-3,4-5,more than 5)', '(2,6,8,4)', 'unchecked', 'no', ''),
(37, 'Vegetable', 'Green Peas', 'cup', '(0,1,2,more than 2)', '(3,4,5,8)', 'unchecked', 'no', ''),
(38, 'Vegetable', 'Leek', 'cup', '(0,1,2,more than 2)', '(12,7,1,1)', 'unchecked', 'no', ''),
(39, 'Vegetable', 'Corn', 'cup', '(0,1,2,more than 2) ', '(1,7,8,4)', 'unchecked', 'no', ''),
(40, 'Vegetable', 'Celery', 'cup', '(0,1,2,more than 2) ', '(10,2,4,4)', 'unchecked', 'no', ''),
(41, 'Vegetable', 'Carrot', 'cup', '(0,1,2,more than 2)', '(0,14,5,1)', 'unchecked', 'no', ''),
(42, 'Vegetable', 'Cauliflower', 'cup', '(0,1,2,more than 2)', '(2,6,6,6)', 'unchecked', 'no', ''),
(43, 'Vegetable', 'Cabbage', 'chopped cup', '(0,1,2,more than 2) ', '(0,5,9,6)', 'unchecked', 'no', ''),
(44, 'Vegetable', 'Bamboo Shoots', 'sliced cup', '(0,1,2,more than 2) ', '(17,1,1,1)', 'unchecked', 'no', ''),
(45, 'Vegetable', 'Lotus Root', 'per ten slices', '(less than 2,2-3,4-5,more than 5)', '(12,1,5,2)', 'unchecked', 'no', ''),
(46, 'Vegetable', 'Ginger', 'tsp', '(0,1,2,more than 2)', '(2,6,8,4)', 'unchecked', 'no', ''),
(47, 'Vegetable', 'Shiitake Mushroom', 'cup', '(0,1,2,more than 2) ', '(12,7,1,0)', 'unchecked', 'no', ''),
(48, 'Vegetable', 'Asparagus', 'cup', '(0,1,2,more than 2)', '(3,7,7,3)', 'unchecked', 'no', ''),
(49, 'Vegetable', 'Artichoke', 'medium whole', '(0,1,2,more than 2)', '(6,6,6,2)', 'unchecked', 'no', ''),
(50, 'Vegetable', 'Baby Corn', 'ear', '(less than 3,3-5,6-8,more than 8)', '(3,3,7,7)', 'unchecked', 'no', ''),
(51, 'Vegetable', 'Avocado', 'medium whole', '(0,1,2,more than 2)', '(2,6,8,4)', 'unchecked', 'no', ''),
(52, 'Vegetable', 'Beans', 'cup', '(0,1,2,more than 2)', '(2,6,6,6)', 'unchecked', 'no', ''),
(53, 'Vegetable', 'Luffa', 'cup', '(0,1,2,more than 2) ', '(3,2,8,7)', 'unchecked', 'no', ''),
(54, 'Vegetable', 'Squash', 'cup', '(0,1,2,more than 2)', '(7,3,6,4)', 'unchecked', 'no', ''),
(55, 'Vegetable', 'Beetroot', 'per ten slices ', '(0,1,2,more than 2)', '(7,7,3,3)', 'unchecked', 'no', ''),
(56, 'Beverage', 'Black Tea', 'cup', '(0,1,2,more than 2)', '(2,11,5,3)', 'unchecked', 'no', ''),
(57, 'Beverage', 'Green Tea ', 'cup', '(0,1,2,more than 2)', '(5,8,8,5)', 'unchecked', 'no', ''),
(58, 'Beverage', 'Non-Fat Milk', 'cup ', '(0,1,2,more than 2)', '(1,8,6,8)', 'unchecked', 'no', ''),
(59, 'Beverage', '2% Milk ', 'cup', '(0,1,2,more than 2)', '(0,8,7,7)', 'unchecked', 'no', ''),
(60, 'Beverage', 'Whole Milk', 'cup ', '(0,1,2,more than 2)', '(5,8,5,5)', 'unchecked', 'no', ''),
(61, 'Beverage', 'Goat Milk', 'cup', '(0,1,2,more than 2)', '(12,11,5,4) ', 'ElvaChao1', 'no', ''),
(62, 'Beverage', 'Coke', 'cup', '(0,1,2,more than 2)', '(5,7,6,9)', 'ElvaChao1', 'no', ''),
(63, 'Beverage', 'Fruit Juice', 'cup', '(0,1,2,more than 2)', '(11,5,7,2)', 'unchecked', 'no', ''),
(64, 'Beverage', 'Coffee', 'cup', '(0,1,2,more than 2)', '(0,6,6,8)', 'unchecked', 'no', ''),
(65, 'Fruit', 'Grape', 'cup', '(less than 2,2-3,4-5,more than 5)', '(3,7,5,5)', 'unchecked', 'no', ''),
(66, 'Fruit', 'Apricot ', 'medium whole', '(0,1,2,more than 2)', '(4,5,7,6)', 'unchecked', 'no', ''),
(67, 'Fruit', 'Cherry', 'cup', '(less than 2,2-3,4-5,more than 5)', '(6,5,5,5)', 'ElvaChao1', 'no', ''),
(68, 'Fruit', 'Loquat', 'medium whole', '(less than 2,2-3,4-5,more than 5)', '(7,8,7,4)', 'ElvaChao1', 'no', ''),
(69, 'Fruit', 'Kiwi Fruit ', 'medium whole', '(0,1,2,more than 2)', '(5,4,8,7)', 'ElvaChao1', 'no', ''),
(70, 'Fruit', 'Peach', 'medium whole', '(0,1,2,more than 2) ', '(3,5,6,6)', 'unchecked', 'no', ''),
(71, 'Fruit', 'Pear', 'medium whole', '(0,1,2,more than 2)', '(3,6,6,6)', 'unchecked', 'no', ''),
(72, 'Fruit', 'Jujube', 'medium whole', '(less than 2,2-3,4-5,more than 5)', '(3,7,7,3)', 'unchecked', 'no', ''),
(73, 'Fruit', 'Coconut', 'shredded cup', '(0,1,2,more than 2)', '(7,11,3,3)', 'ElvaChao1', 'no', ''),
(74, 'Fruit', 'Raspberry', 'cup', '(0,1,2,more than 2)', '(7,6,7,0)', 'unchecked', 'no', ''),
(75, 'Fruit', 'Persimmon', 'medium whole', '(0,1,2,more than 2)', '(7,6,3,4)', 'unchecked', 'no', ''),
(76, 'Fruit', 'Plum', 'medium whole', '(0,1,2,more than 2)', '(7,3,6,4)', 'unchecked', 'no', ''),
(77, 'Fruit', 'Jackfruit', 'sliced cup', '(less than 2,2-3,4-5,more than 5)', '(6,2,6,6)', 'unchecked', 'no', ''),
(78, 'Fruit', 'Cranberries ', 'cup', '(0,1,2,more than 2)', '(6,8,4,3)', 'unchecked', 'no', ''),
(79, 'Fruit', 'Durian', 'cup ', '(less than 2,2-3,4-5,more than 5)', '(6,2,3,9)', 'unchecked', 'no', ''),
(80, 'Fruit', 'Lychee', 'cup', '(less than 2,2-3,4-5,more than 5)', '(12,1,1,6)', 'unchecked', 'no', ''),
(81, 'Fruit', 'Pineapple', 'diced cup', '(less than 2,2-3,4-5,more than 5)', '(12,7,1,0)', 'unchecked', 'no', ''),
(82, 'Fruit', 'Rambutan', 'sliced cup', '(less than 2,2-3,4-5,more than 5)', '(7,12,2,1)', 'unchecked', 'no', ''),
(83, 'Fruit', 'Mango', 'medium whole', '(0,1,2,more than 2)', '(9,6,3,2)', 'unchecked', 'no', ''),
(84, 'Fruit', 'Watermelon', 'diced cup', '(less than 2,2-4,5-7,more than 7)', '(6,9,3,3)', 'unchecked', 'no', ''),
(85, 'Fruit', 'Fig', 'medium whole ', '(less than 2,2-3,4-5,more than 5)', '(6,3,6,5)', 'unchecked', 'no', ''),
(86, 'Fruit', 'Guava', 'medium whole', '(0,1,2,more than 2)', '(7,3,3,7)', 'unchecked', 'no', ''),
(87, 'Fruit', 'Grapefruit', 'medium whole', '(0,1,2,more than 2)', '(12,7,1,0)', 'unchecked', 'no', ''),
(88, 'Fruit', 'Dragonfruit', 'medium whole', '(0,1,2,more than 2) ', '(12,8,0,0)', 'unchecked', 'no', ''),
(89, 'Fruit', 'Olive', 'per 3 wholes', '(0,1,2,more than 2)', '(12,3,3,2)', 'unchecked', 'no', ''),
(90, 'Fruit', 'Miracle Fruit', 'per 3 wholes', '(0,1,2,more than 2) ', '(12,3,3,2)', 'unchecked', 'no', ''),
(91, 'Fruit', 'Blackberries', 'cup', '(0,1,2,more than 2)', '(8,5,6,3)', 'unchecked', 'no', ''),
(92, 'Fruit', 'Lime', 'medium whole', '(0,1,2,more than 2)', '(4,14,1,1)', 'unchecked', 'no', ''),
(93, 'Fruit', 'Orange', 'medium whole', '(0,1,2,more than 2)', '(3,3,7,7)', 'unchecked', 'no', ''),
(94, 'Fruit', 'Kumquat ', 'per 2 wholes', '(0,1,2,more than 2)', '(7,3,5,5)', 'unchecked', 'no', ''),
(95, 'Fruit', 'Strawberry', 'per 3 wholes', '(0,1,2,more than 2)', '(3,6,5,6)', 'unchecked', 'no', ''),
(96, 'Fruit', 'Starfruit', 'per 4 slices', '(0,1,2,more than 2)', '(12,2,3,3)', 'unchecked', 'no', ''),
(97, 'Fruit', 'Apple', 'medium whole', '(0,1,2,more than 2)', '(3,6,5,6) ', 'unchecked', 'no', ''),
(98, 'Fruit', 'Mulberries', 'cup', '(0,1,2,more than 2)', '(3,6,6,5)', 'unchecked', 'no', ''),
(99, 'Fruit', 'Huckleberries', 'cup ', '(0,1,2,more than 2)', '(7,12,2,1)', 'unchecked', 'no', ''),
(100, 'Fruit', 'Gooseberries', 'per 2 whole', '(0,1,2,more than 2)', '(7,12,1,0)', 'unchecked', 'no', ''),
(103, 'Beverage', 'Krungthepmahanakhon Amornrattanakosin Mahintharayutthaya', 'cup', '(0,1,2,more than 2) ', '(27,6,6,8) ', 'unchecked', 'no', ''),
(139, 'Seafood', 'Halibut', 'medium fillet', '(0,1,2,more than 2)', '(2,3,3,1)', 'ElvaChao1', 'yes', 'odeodeode333'),
(140, 'Sweets', 'Chocolate Black Forest Cake', 'medium slice', '(0,1,2,more than 2)', '(0,0,3,0)', 'ElvaChao1', 'yes', 'odeodeode333'),
(143, 'Beverage', 'Earl Grey Tea', 'cup ', '(0,1,2,more than 2)', '(3,1,2,0)', '', 'yes', 'ElvaChao1'),
(146, 'Beverage', 'Rose Tea', 'cup', '(0,1,2,more than 2)', '(3,3,2,1)', '', 'yes', 'ElvaChao1'),
(149, 'Seafood ', 'Bamboo Shrimp', 'medium cup', '(0,1,2,more than 2)', '(0,0,1,0)', '', 'yes', 'odeodeode333'),
(150, 'Beverage', 'Lavender Tea', 'cup ', '(0,1,2,more than 2)', '(4,1,4,1)', '', 'yes', 'iamodec37'),
(151, 'Seafood', 'Sea Cucumber', 'per 3 whole', '(0,1,2,more than 2)', '(1,1,0,1) ', '', 'yes', 'iamode831');

-- --------------------------------------------------------

--
-- Table structure for table `user_polls`
--

CREATE TABLE `user_polls` (
  `id` int(11) NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 NOT NULL,
  `foodname` varchar(59) CHARACTER SET utf8 NOT NULL,
  `serving_standard` varchar(30) CHARACTER SET utf8 NOT NULL,
  `serving_sizes` varchar(50) CHARACTER SET utf8 NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_pic` varchar(120) CHARACTER SET utf8 NOT NULL,
  `category` varchar(25) CHARACTER SET utf8 NOT NULL,
  `food_list_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_polls`
--

INSERT INTO `user_polls` (`id`, `username`, `foodname`, `serving_standard`, `serving_sizes`, `created_time`, `profile_pic`, `category`, `food_list_id`) VALUES
(135, 'odeodeode333', 'Halibut', 'medium fillet', '(0,1,2,more than 3)', '2017-02-18 13:29:13', 'http://pbs.twimg.com/profile_images/832780341194616832/3hCTSVn4_normal.jpg', 'Seafood', 139),
(136, 'odeodeode333', 'Chocolate Black Forest Cake', 'medium slice', '(0,1,2,more than 3)', '2017-02-18 02:39:00', 'http://pbs.twimg.com/profile_images/832780341194616832/3hCTSVn4_normal.jpg', 'Sweets ', 140),
(139, 'ElvaChao1', 'Earl Grey Tea', 'cup', '(0,1,2,more than 3)', '2017-02-18 07:00:32', 'http://pbs.twimg.com/profile_images/828513497847705600/v9lDMhja_normal.jpg ', 'Beverage', 143),
(142, 'ElvaChao1', 'Rose Tea', 'cup', '(0,1,2,more than 3)', '2017-02-18 07:52:02', 'http://pbs.twimg.com/profile_images/828513497847705600/v9lDMhja_normal.jp', 'Beverage', 146),
(145, 'odeodeode333', 'Bamboo Shrimp', 'medium cup', '(0,1,2,more than 3)', '2017-02-18 08:21:03', 'http://pbs.twimg.com/profile_images/832780341194616832/3hCTSVn4_normal.jp', 'Seafood', 149),
(146, 'iamodec37', 'Lavender Tea ', 'cup', '(0,1,2,more than 3)', '2017-03-26 15:47:56', 'http://abs.twimg.com/sticky/default_profile_images/default_profile_1_normal.png', 'Beverage', 150),
(147, 'iamode831', 'Sea Cucumber', 'per 3 whole', '(0,1,2,more than 3)', '2017-04-10 10:23:35', 'http://pbs.twimg.com/profile_images/851362174916108290/ex_QIRFo_normal.jpg', 'Seafood', 151);

-- --------------------------------------------------------

--
-- Table structure for table `user_saved`
--

CREATE TABLE `user_saved` (
  `id` int(11) NOT NULL,
  `creator_username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `foodname` varchar(65) CHARACTER SET utf8 NOT NULL,
  `saver_username` varchar(40) CHARACTER SET utf8 NOT NULL,
  `food_list_id` int(11) NOT NULL,
  `category` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_saved`
--

INSERT INTO `user_saved` (`id`, `creator_username`, `foodname`, `saver_username`, `food_list_id`, `category`) VALUES
(2, 'odeodeode333', 'Chocolate Black Forest Cake', 'odeodeode333', 140, 'Sweets'),
(3, 'odeodeode333', 'Halibut', 'odeodeode333', 139, 'Seafood'),
(4, 'odeodeode333', 'Halibut', 'ElvaChao1', 139, 'Seafood'),
(5, 'odeodeode333', 'Chocolate Black Forest Cake', 'ElvaChao1', 140, 'Seafood'),
(7, '', 'Abalone', 'ElvaChao1', 15, 'Seafood'),
(8, '', 'Coconut', 'ElvaChao1', 73, 'Fruit'),
(11, '', 'Cherry', 'ElvaChao1', 67, 'Fruit'),
(13, '', 'Goat Milk', 'ElvaChao1', 61, 'Beverage'),
(18, '', 'Loquat', 'ElvaChao1', 68, 'Fruit'),
(19, '', 'Coke', 'ElvaChao1', 62, 'Beverage'),
(20, 'ElvaChao1', 'Earl Grey Tea', 'ElvaChao1', 143, 'Beverage'),
(21, 'ElvaChao1', 'Earl Grey Tea', 'ElvaChao1', 143, 'Beverage'),
(23, 'ElvaChao1', 'Earl Grey Tea', 'odeodeode333', 143, 'Beverage'),
(26, '', 'Kiwi Fruit', 'ElvaChao1', 69, 'Fruit'),
(29, 'ElvaChao1', 'Rose Tea', 'ElvaChao1', 146, 'Beverage'),
(32, 'ElvaChao1', 'Earl Grey Tea', 'ElvaChao1', 143, 'Beverage'),
(33, 'odeodeode333', 'Bamboo Shrimp', 'odeodeode333', 149, 'Seafood'),
(34, 'ElvaChao1', 'Rose Tea', 'ElvaChao1', 146, 'Beverage'),
(35, 'ElvaChao1', 'Rose Tea', 'ElvaChao1', 146, 'Beverage'),
(39, 'iamodec37', 'Lavender Tea', 'iamodec37', 150, 'Beverage'),
(41, 'iamodec37', 'Lavender Tea', 'iamodec37', 150, 'Beverage'),
(42, '', 'Krungthepmahanakhon Amornrattanakosin Mahintharayutthaya', 'iamodec37', 103, 'Beverage'),
(43, 'iamode831', 'Sea Cucumber', 'iamode831', 151, 'Seafood'),
(46, '', 'Coke', 'iamode831', 62, 'Beverage'),
(47, '', 'Green Tea', 'iamode831', 57, 'Beverage'),
(48, 'iamode831', 'Sea Cucumber', 'iamode831', 151, 'Seafood'),
(49, 'ElvaChao1', 'Rose Tea', 'iamode831', 146, 'Beverage'),
(50, 'iamode831', 'Sea Cucumber', 'iamode831', 151, 'Seafood'),
(51, 'ElvaChao1', 'Rose Tea', 'iamode831', 146, 'Beverage'),
(52, 'ElvaChao1', 'Rose Tea', 'iamode831', 146, 'Beverage'),
(53, 'iamodec37', 'Lavender Tea', 'simplynopress', 150, 'Beverage'),
(54, '', 'Green Tea', 'simplynopress', 57, 'Beverage'),
(55, 'iamodec37', 'Lavender Tea', 'simplynopress', 150, 'Beverage'),
(56, 'iamodec37', 'Lavender Tea', 'simplynopress', 150, 'Beverage');

-- --------------------------------------------------------

--
-- Table structure for table `user_votes`
--

CREATE TABLE `user_votes` (
  `id` int(11) NOT NULL,
  `foodname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `vote` int(11) NOT NULL,
  `vote_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `food_list_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_votes`
--

INSERT INTO `user_votes` (`id`, `foodname`, `vote`, `vote_timestamp`, `username`, `food_list_id`) VALUES
(32, 'Abalone', 1, '2017-02-12 00:55:21', 'ElvaChao1', 15),
(36, 'Goat Milk', 2, '2017-02-16 07:13:21', 'ElvaChao1', 61),
(37, 'Cherry', 4, '2017-02-16 07:24:32', 'ElvaChao1', 67),
(38, 'Coconut', 2, '2017-02-16 06:48:13', 'ElvaChao1', 73),
(56, 'Goat Milk', 4, '2017-02-18 21:40:12', 'ElvaChao1', 61),
(57, 'Goat Milk', 1, '2017-02-18 00:22:47', 'ElvaChao1', 61),
(80, 'Halibut', 1, '2017-02-18 02:36:36', 'odeodeode333', 139),
(81, 'Chocolate Black Forest Cake', 3, '2017-02-18 02:42:00', 'odeodeode333', 140),
(82, 'Chocolate Black Forest Cake', 3, '2017-02-18 03:38:46', 'odeodeode333', 140),
(84, 'Halibut', 2, '2017-02-18 02:41:12', 'ElvaChao1', 139),
(85, 'Chocolate Black Forest Cake', 3, '2017-02-18 02:40:13', 'ElvaChao1', 140),
(91, 'Loquat', 1, '2017-02-18 07:47:52', 'ElvaChao1', 68),
(92, 'Coke', 2, '2017-02-18 07:27:38', 'ElvaChao1', 62),
(93, 'Earl Grey Tea', 3, '2017-02-18 07:00:31', 'ElvaChao1', 143),
(94, 'Earl Grey Tea', 1, '2017-02-18 07:00:49', 'ElvaChao1', 143),
(96, 'Earl Grey Tea', 1, '2017-02-18 10:40:50', 'odeodeode333', 143),
(99, 'Kiwi Fruit', 1, '2017-02-18 07:39:27', 'ElvaChao1', 69),
(102, 'Rose Tea', 3, '2017-02-18 10:36:18', 'ElvaChao1', 146),
(105, 'Earl Grey Tea', 3, '2017-02-18 07:59:29', 'ElvaChao1', 143),
(106, 'Bamboo Shrimp', 3, '2017-02-18 08:02:20', 'odeodeode333', 149),
(107, 'Rose Tea', 2, '2017-02-18 17:43:29', 'ElvaChao1', 146),
(108, 'Rose Tea', 1, '2017-02-18 19:55:13', 'ElvaChao1', 146),
(112, 'Lavender Tea', 3, '2017-03-26 03:27:45', 'iamodec37', 150),
(114, 'Lavender Tea', 1, '2017-03-28 03:28:08', 'iamodec37', 150),
(115, 'Krungthepmahanakhon Amornrattanakosin Mahintharayutthaya', 4, '2017-04-08 04:34:47', 'iamodec37', 103),
(116, 'Sea Cucumber', 2, '2017-04-10 11:37:47', 'iamode831', 151),
(119, 'Coke', 1, '2017-04-10 12:40:31', 'iamode831', 62),
(120, 'Green Tea', 1, '2017-04-10 15:22:43', 'iamode831', 57),
(121, 'Sea Cucumber', 1, '2017-04-10 15:49:53', 'iamode831', 151),
(122, 'Rose Tea', 3, '2017-04-11 17:52:31', 'iamode831', 146),
(123, 'Sea Cucumber', 4, '2017-04-12 16:49:40', 'iamode831', 151),
(124, 'Rose Tea', 2, '2017-04-12 16:49:55', 'iamode831', 146),
(125, 'Rose Tea', 4, '2017-04-12 16:47:51', 'iamode831', 146),
(126, 'Lavender Tea', 3, '2017-04-16 18:54:21', 'simplynopress', 150),
(127, 'Green Tea', 2, '2017-04-16 15:25:54', 'simplynopress', 57),
(128, 'Lavender Tea', 3, '2017-04-16 18:28:50', 'simplynopress', 150),
(129, 'Lavender Tea', 1, '2017-04-16 19:32:50', 'simplynopress', 150);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_list`
--
ALTER TABLE `food_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_polls`
--
ALTER TABLE `user_polls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_saved`
--
ALTER TABLE `user_saved`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_votes`
--
ALTER TABLE `user_votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_list`
--
ALTER TABLE `food_list`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
--
-- AUTO_INCREMENT for table `user_polls`
--
ALTER TABLE `user_polls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;
--
-- AUTO_INCREMENT for table `user_saved`
--
ALTER TABLE `user_saved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `user_votes`
--
ALTER TABLE `user_votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

