CREATE DATABASE  IF NOT EXISTS `bitter-adambrewer` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bitter-adambrewer`;
-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: localhost    Database: bitter-adambrewer
-- ------------------------------------------------------
-- Server version	5.7.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `follows`
--

DROP TABLE IF EXISTS `follows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `follows` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  PRIMARY KEY (`follow_id`),
  KEY `FK_follows` (`from_id`),
  KEY `FK_follows2` (`to_id`),
  CONSTRAINT `FK_follows` FOREIGN KEY (`from_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `FK_follows2` FOREIGN KEY (`to_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `follows`
--

LOCK TABLES `follows` WRITE;
/*!40000 ALTER TABLE `follows` DISABLE KEYS */;
INSERT INTO `follows` VALUES (1,7,1),(2,7,11),(3,7,6),(4,7,5),(5,7,9),(6,7,12),(7,7,3),(8,7,2),(9,7,4),(10,1,4),(11,4,1),(12,4,6),(13,4,11);
/*!40000 ALTER TABLE `follows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL AUTO_INCREMENT,
  `tweet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`like_id`),
  KEY `FK_tweet_id_idx` (`tweet_id`),
  KEY `FK_user_id_idx` (`user_id`),
  CONSTRAINT `FK_tweet_id` FOREIGN KEY (`tweet_id`) REFERENCES `tweets` (`tweet_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tweets`
--

DROP TABLE IF EXISTS `tweets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tweets` (
  `tweet_id` int(11) NOT NULL AUTO_INCREMENT,
  `tweet_text` varchar(280) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `original_tweet_id` int(11) NOT NULL DEFAULT '0',
  `reply_to_tweet_id` int(11) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tweet_id`),
  KEY `FK_tweets` (`user_id`),
  CONSTRAINT `FK_tweets` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tweets`
--

LOCK TABLES `tweets` WRITE;
/*!40000 ALTER TABLE `tweets` DISABLE KEYS */;
/*!40000 ALTER TABLE `tweets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `screen_name` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `address` varchar(200) NOT NULL,
  `province` varchar(50) NOT NULL,
  `postal_code` varchar(7) NOT NULL,
  `contact_number` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `url` varchar(50) NOT NULL,
  `description` varchar(160) NOT NULL,
  `location` varchar(50) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_pic` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Adam','Brewer','addyb','qwerty','123 Main Street','New Brunswick','E3B 3B4','5065555555','adambrewer88@gmail.com','www.google.com','Here to troll','Fredericton','2019-09-23 16:49:21',NULL),(2,'Allan','Jones','Jonesy','qwerty','123 Main Street','New Brunswick','E3B 3B4','5065555555','adambrewer88@gmail.com','www.google.com','Here to troll','Fredericton','2019-09-23 16:49:56',NULL),(3,'James','Jameson','jAmes','qwerty','123 Main Street','New Brunswick','E3B 3B4','5065555555','adambrewer88@gmail.com','www.google.com','Here to troll','Fredericton','2019-09-23 16:50:21',NULL),(4,'Johnny','Twoshoes','J2S','111qqq','542 Random Street','New Brunswick','w3b 5g5','506555555','asjkdhf@asdf.com','www.google.com','Who needs a description?','Fredericton','2019-09-23 17:07:02',NULL),(5,'Tom','Segura','BIKES','111qqq','458 Priestman Street, Apartment 23','New Brunswick','E3B 3B4','5062605793','adambrewer88@gmail.com','www.google.com','Here to troll','Fredericton','2019-09-23 17:07:38',NULL),(6,'Bert','Kreischer','theMachine','111qqq','458 Priestman Street, Apartment 23','New Brunswick','E3B 3B4','5062605793','adambrewer88@gmail.com','www.google.com','Here to troll','Fredericton','2019-09-23 17:08:08',NULL),(7,'asdfasd','asdfasdf','asdf','asdf','458 Priestman Street, Apartment 23','New Brunswick','E3B 3B4','5062605793','adambrewer88@gmail.com','www.google.com','Here to troll','Fredericton','2019-09-23 17:11:08',NULL),(8,'Joe','Rogan','JRexperience','1111qqqq','123 Main Street','New Brunswick','E3B 3B4','5065555555','asdf@adfasd.com','www.google.com','Here to troll','Fredericton','2019-09-23 17:15:11',NULL),(9,'fghsgf','dfgsdfg','vjvasdfa','111qqq','123 Main Street','New Brunswick','E3B 3B4','5065555555','asdf@adfasd.com','www.google.com','Here to troll','Fredericton','2019-09-23 17:16:21',NULL),(10,'Cookie','Monster','Coooookies','qwerty','123 Main Street','New Brunswick','E3B 3B4','5065555555','cmonster@sstreet.com','www.google.com','Give Me Cookies!','Fredericton','2019-10-04 16:19:09',NULL),(11,'John','Johnson','watchOutForJJ','1q1q1q','321 Fake Street','New Brunswick','E3B 3B4','5065555555','john@john.com','www.google.com','Watch out','Fredericton','2019-10-08 17:30:54',NULL),(12,'Bob','Dylan','theWatchtower','111qqq','321 Fake Street','New Brunswick','E3B 3B4','5065555555','bob@dylan.com','www.google.com','Here to troll','Fredericton','2019-10-08 17:33:49',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'bitter-adambrewer'
--

--
-- Dumping routines for database 'bitter-adambrewer'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-09 15:10:18
