-- MySQL dump 10.13  Distrib 5.5.50, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: ode_food_poll
-- ------------------------------------------------------
-- Server version	5.5.50-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `food_list`
--

DROP TABLE IF EXISTS `food_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(30) NOT NULL,
  `foodname` varchar(90) NOT NULL,
  `serving_standard` varchar(80) NOT NULL,
  `serving_sizes` varchar(300) NOT NULL,
  `actual_serving_count` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_list`
--

LOCK TABLES `food_list` WRITE;
/*!40000 ALTER TABLE `food_list` DISABLE KEYS */;
INSERT INTO `food_list` VALUES (1,'Meat','Steak','ounce','(less than 3,3-6,6-9,more than 9)',''),(2,'Meat','Pork','ounce','(less than 3,3-6,6-9,more than 9)',''),(3,'Meat','Fish','ounce','(less than 6,6-9,9-12,more than 12)',''),(4,'Meat','Lamb','ounce','(less than 3,3-6,6-9,more than 9)',''),(5,'Meat','Chicken','ounce','(less than 4,4-7,7-10,more than 10)',''),(6,'Meat','Shrimp','ounce','(less than 4,4-7,7-10,more than 10)',''),(7,'Meat','Crab','ounce','(less than 2,2-5,5-8,more than 8)',''),(8,'Meat','Lobster','ounce','(less than 3,3-6,6-9,more than 9)',''),(9,'Meat','Clam','ounce','(less than 3,3-6,6-9,more than 9)',''),(10,'Meat','Mussel','ounce','(less than 3,3-6,6-9,more than 9)',''),(11,'Meat','Squid','ounce','(less than 3,3-6,6-9,more than 9)',''),(12,'Meat','Scallop','ounce','(less than 3,3-6,6-9,more than 9)',''),(13,'Meat','Oyster','ounce','(less than 3,3-6,6-9,more than 9)',''),(14,'Meat','Octopus','ounce','(less than 3,3-6,6-9,more than 9)',''),(15,'Meat','Abalone','ounce','(1,1-4,4-7,more than 7)',''),(16,'Vegetable','Onions','cup','(1,2-3,3-4,more than 4)',''),(17,'Vegetable','Eggplant','cup','(less than 2,2-4,4-6,more than 6)',''),(18,'Vegetable','Lettuce','cup','(less than 2,2-4,4-6,more than 6)',''),(19,'Vegetable','Turnip','medium whole','(1,2,3,more than 3)',''),(20,'Vegetable','Spinach','cup','(1,2,3,more than 3)',''),(21,'Vegetable','Tomato','medium whole','(1,2,3,more than 3)',''),(22,'Vegetable','Potato','medium whole','(1,2,3,more than 3)',''),(23,'Vegetable','Radish','cup','(1,2-3,4-5,more than 5)',''),(24,'Vegetable','Mushroom','sliced cup','(1,2-3,3-4,more than 4)',''),(25,'Vegetable','Kaffir Leaves','cup','(1,2,3,more than 3)',''),(26,'Vegetable','Gourd','medium whole','(1,2,3,more than 3)',''),(27,'Vegetable','Spring Onions','chopped cup','(1,2,3,more than 3)',''),(28,'Vegetable','Chili','whole','(1,2-3,4-5,more than 5)',''),(29,'Vegetable','Chili Pepper','whole','(1,2,3,more than 3)',''),(30,'Vegetable','Jalapeno','whole','(1,2,3,more than 3)',''),(31,'Vegetable','Sweet Potato','medium whole','(1,2,3,more than 3)',''),(32,'Vegetable','Yam','medium whole','(1,2,3,more than 3)',''),(33,'Vegetable','Yam','medium whole','(1,2,3,more than 3)',''),(34,'Vegetable','Garlic','clove','(1,2,3,more than 3)',''),(35,'Vegetable','Zucchini','medium whole','(1,2,3,more than 3)',''),(36,'Vegetable','Cucumber','medium whole','(1,2-3,4-5,more than 5)',''),(37,'Vegetable','Green Peas','cup','(1,2,3,more than 3)',''),(38,'Vegetable','Leek','whole','(1,2,3,more than 3)',''),(39,'Vegetable','Corn','cup','(1,2,3,more than 3)',''),(40,'Vegetable','Celery','medium stalk','(1,2,3,more than 3)',''),(41,'Vegetable','Carrot','medium whole','(1,2,3,more than 3)',''),(42,'Vegetable','Cauliflower','cup','(1,2,3,more than 3)',''),(43,'Vegetable','Shiitake Mushroom','cup','(1,2,3,more than 3)',''),(44,'Vegetable','Cabbage','chopped cup','(1,2,3,more than 3)',''),(45,'Vegetable','Bamboo Shoots','sliced cup','(1,2,3,more than 3)',''),(46,'Vegetable','Lotus Root','per ten slices','(1,2,3,more than 3)',''),(47,'Vegetable','Ginger','tsp','(1,2,3,more than 3)',''),(48,'Vegetable','Asparagus','cup','(1,2,3,more than 3)',''),(49,'Vegetable','Artichoke','medium whole','(1,2,3,more than 3)',''),(50,'Vegetable','Baby Corn','ear','(less than 3,3-5,6-8,more than 8)',''),(51,'Vegetable','Avocado','medium whole','(1,2,3,more than 3)',''),(52,'Vegetable','Beans','cup','(1,2,3,more than 3)',''),(53,'Vegetable','Luffa','medium whole','(1,2,3,more than 3)',''),(54,'Vegetable','Squash','medium whole','(1,2,3,more than 3)',''),(55,'Vegetable','Beetroot','cup','(1,2,3,more than 3)',''),(56,'Beverage','Black Tea','cup','(1,2,3,more than 3)',''),(57,'Beverage','Green Tea','cup','(1,2,3,more than 3)',''),(58,'Beverage','Non-Fat Milk','cup','(1,2,3,more than 3)',''),(59,'Beverage','2% Milk','cup','(1,2,3,more than 3)',''),(60,'Beverage','Whole Milk','cup','(1,2,3,more than 3)',''),(61,'Beverage','Goat Milk','cup','(1,2,3,more than 3)',''),(62,'Beverage','Coke','cup','(1,2,3,more than 3)',''),(63,'Beverage','Coffee','cup','(1,2,3,more than 3)',''),(64,'Beverage','Fruit Juice','cup','(1,2,3,more than 3)',''),(65,'Fruit','Grape','cup','(1,2-3,4-5,more than 5)',''),(66,'Fruit','Apricot','medium whole','(1,2,3,more than 3)',''),(67,'Fruit','Cherry','cup','(1,2-3,4-5,more than 5)',''),(68,'Fruit','Loquat','cup','(1,2,3,more than 3)',''),(69,'Fruit','Kiwi Fruit','medium whole','(1,2,3,more than 3)',''),(70,'Fruit','Peach','medium whole','(1,2,3,more than 3)',''),(71,'Fruit','Pear','medium whole','(1,2,3,more than 3)',''),(72,'Fruit','Jujube','ounce','(1,2,3,more than 3)',''),(73,'Fruit','Coconut','shredded cup','(1,2,3,more than 3)',''),(74,'Fruit','Raspberry','cup','(1,2,3,more than 3)',''),(75,'Fruit','Persimmon','medium whole','(1,2,3,more than 3)',''),(76,'Fruit','Plum','medium whole','(1,2,3,more than 3)',''),(77,'Fruit','Jackfruit','sliced cup','(less than 2,2-3,4-5,more than 5)',''),(78,'Fruit','Cranberries','ounce','(1,2,3,more than 3)',''),(79,'Fruit','Durian','cup','(1,2-3,4-5,more than 5)',''),(80,'Fruit','Lychee','cup','(1,2-3,4-5,more than 5)',''),(81,'Fruit','Pineapple','diced cup','(1,2-3,4-5,more than 5)',''),(82,'Fruit','Rambutan','sliced cup','(1,2-3,4-5,more than 5)',''),(83,'Fruit','Mango','medium whole','(1,2,3,more than 3)',''),(84,'Fruit','Watermelon','diced cup','(less than 2,2-4,5-7,more than 7)',''),(85,'Fruit','Fig','medium whole','(less than 2,2-3,4-5,more than 5)',''),(86,'Fruit','Guava','medium whole','(1,2,3,more than 3)',''),(87,'Fruit','Grapefruit','medium whole','(1,2,3,more than 3)',''),(88,'Fruit','Dragonfruit','medium whole','(1,2,3,more than 3)',''),(89,'Fruit','Olive','per 3 wholes','(1,2,3,more than 3)',''),(90,'Fruit','Miracle Fruit','per 3 wholes','(1,2,3,more than 3)',''),(91,'Fruit','Blackberries','cup','(1,2,3,more than 3)',''),(92,'Fruit','Lime','medium whole','(1,2,3,more than 3)',''),(93,'Fruit','Orange','medium whole','(1,2,3,more than 3)',''),(94,'Fruit','Kumquat','per 2 wholes','(1,2,3,more than 3)',''),(95,'Fruit','Strawberry','per 3 wholes','(1,2,3,more than 3)',''),(96,'Fruit','Starfruit','per 4 slices','(1,2,3,more than 3)',''),(97,'Fruit','Apple','medium whole','(1,2,3,more than 3)',''),(98,'Fruit','Mulberries','cup','(1,2,3,more than 3)',''),(99,'Fruit','Huckleberries','cup','(1,2,3,more than 3)',''),(100,'Fruit','Gooseberries','per 2 whole','(1,2,3,more than 3)','');
/*!40000 ALTER TABLE `food_list` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-25 19:25:08
