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
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `follows`
--

LOCK TABLES `follows` WRITE;
/*!40000 ALTER TABLE `follows` DISABLE KEYS */;
INSERT INTO `follows` VALUES (14,41,39),(15,41,42),(16,41,40),(17,40,39),(18,39,40),(19,39,42),(20,39,41),(21,40,48),(22,39,46),(23,39,45),(24,39,50),(25,39,49),(26,49,50),(27,50,49),(28,50,39),(29,40,49),(30,40,50),(31,49,39),(32,39,44),(33,40,45),(34,40,41),(35,40,44),(36,49,41),(37,49,40),(38,49,44),(39,39,40),(40,39,39),(41,39,48),(42,47,50),(43,47,43),(44,47,41),(45,40,39),(46,45,50),(47,45,39),(48,45,40),(49,51,39),(50,40,46),(51,40,42),(52,40,47),(53,40,51);
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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (34,56,40,'2019-12-04 18:23:42'),(35,63,40,'2019-12-04 18:23:48'),(36,67,40,'2019-12-04 18:24:32'),(37,66,40,'2019-12-04 18:25:32'),(38,63,39,'2019-12-04 18:25:56'),(40,62,39,'2019-12-04 23:11:00'),(42,67,39,'2019-12-04 23:20:24'),(44,61,40,'2019-12-05 00:00:54'),(45,64,39,'2019-12-05 01:10:54'),(46,66,39,'2019-12-05 01:11:30'),(47,59,40,'2019-12-06 18:01:09');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `message_text` varchar(255) NOT NULL,
  `date_sent` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_toid_idx` (`id`,`from_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (7,50,39,'MEOW','2019-12-04 16:32:40'),(8,39,40,'Hello Nick!','2019-12-06 13:59:18');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tweets`
--

LOCK TABLES `tweets` WRITE;
/*!40000 ALTER TABLE `tweets` DISABLE KEYS */;
INSERT INTO `tweets` VALUES (49,'test',39,0,0,'2019-11-11 01:14:12'),(50,'replying to the test tweet -fun!',39,0,49,'2019-11-11 01:14:25'),(51,'How does a duck buy lipstick? She just puts it on her bill.',49,0,0,'2019-11-11 01:15:55'),(54,'How does a duck buy lipstick? She just puts it on her bill.',39,51,0,'2019-11-11 14:38:06'),(55,'\"A joke is a display of humour in which words are used within a specific and well-defined narrative structure to make people laugh and is not meant to be taken seriously.\" - Wikipedia',39,0,0,'2019-11-13 18:28:48'),(56,'Is this thing on?',39,0,0,'2019-11-13 18:33:31'),(57,'\"A joke is a display of humour in which words are used within a specific and well-defined narrative structure to make people laugh and is not meant to be taken seriously.\" - Wikipedia',49,55,0,'2019-11-13 18:34:06'),(58,'hello',39,0,57,'2019-11-13 18:57:03'),(59,'Why did the stadium get hot after the game? All the fans left!',44,0,0,'2019-11-16 22:14:02'),(60,'Why did the bicycle fall over? Because it was two tired!',44,0,0,'2019-11-16 22:14:35'),(61,'\"A joke is a display of humour in which words are used within a specific and well-defined narrative structure to make people laugh and is not meant to be taken seriously.\" - Wikipedia',39,57,0,'2019-11-19 20:33:08'),(62,'Adam is doing so well on this sprint, I think I will give him full marks!',40,0,0,'2019-11-21 23:14:07'),(63,'This is actually my real name',47,0,0,'2019-11-21 23:54:40'),(64,'Meow',50,0,0,'2019-11-22 01:10:05'),(65,'You can learn a lot from television. For instance, without television, I would have no idea that Steven Seagal is out of his mind. Or alive. I also didnâ€™t know that.',45,0,0,'2019-11-22 01:15:24'),(66,'Just a regular robot, nothing to see here... ignore the horns.',51,0,0,'2019-11-23 00:05:35'),(67,'Life is like a box of chocolates...',52,0,0,'2019-11-23 01:15:08'),(68,'Hello!',40,0,58,'2019-12-04 23:48:35'),(69,'Hello!',39,68,0,'2019-12-06 12:39:53');
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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (39,'Adam','Brewer','addyb','$2y$10$M.4I5nKlTk5s5uxoXyjfl.DZoyWNjNziF.tOm8liKuB467ulk9BKe','123 Main Street','New Brunswick','E3B 3B4','5065555555','adambrewer88@gmail.com','www.google.com','Here to troll','Fredericton','2019-10-23 13:27:51','Images/profilepics/39.png'),(40,'Nick','Taggart','nick','$2y$10$o3hKgQhYNMbi6fbnRPIebu8BAq9MYEsE2CddcSaTe5IQD/ZJL5Jky','26 Duffie Drive','New Brunswick','E3B 0R6',' (506) 460-6222','nicktaggart@nbcc.ca','nbcc.ca','Hello','Fredericton','2019-10-23 15:25:44','Images/profilepics/40.png'),(41,'Fake','Name','notreal','$2y$10$8ee6fP0QHr4mSrhGxxbVqOnOYHzxj45y7XVj3hwMJYut6rKOYNbjW','123 Main Street','Newfoundland and Labrador','E3B 3B4','5065555555','fakeperson@email.com','www.google.com','Watch out','Gander','2019-10-24 12:16:42','Images/profilepics/41.png'),(42,'Tom','Green','tomgreen','$2y$10$.W//6MJigGb4fnVNhFhUreCVjOXgjb247knepxlzWQaeI4oAfRuwS','123 Main Street','Ontario','E3B 3B4','5065555555','tom@green.com','www.google.com','This is the Tom Green Show','Toronto','2019-10-24 14:18:31','Images/profilepics/42.png'),(43,'asdfasdf','sdfgsdfg','afefsef','$2y$10$gJwa2ttnNd8RTBwsbV5FRuxDoYJT4nsxrHH8ud8VS9wz1kd9qalMG','afsdgsdfg','Alberta','E3B 3B4','3232321','asdfas@gadfgsdf','www.google.com','asdfsadf','asdfasdf','2019-10-25 17:32:12','Images/profilepics/default.jfif'),(44,'test','account','testaccount','$2y$10$PCd/XaHXiAinn.sJ3qjrNerluvnLmc2VDPoUrEi38zY33zPxhumYe','123 Main Street','Ontario','E3B 3B4','5065555555','test@account.com','www.google.com','HELLO','Toronto','2019-10-25 17:45:42','Images/profilepics/44.png'),(45,'Tom','Segura','bikes','$2y$10$7Kuxdh9q4pS54EzIHsjUwOwDsgd1/Ndg2/0ztsofqK1KUxg2g8dN6','123 Main Street','Ontario','E3B 3B4','5065555555','segura@ymh.com','www.google.com','HELLO','Toronto','2019-10-25 17:47:07','Images/profilepics/45.png'),(46,'Test','Account','testest','$2y$10$jW7f1suCO9K/QUv4el0hROZ9Vo1Tr1bCq3w0MuEit6S8OTsn1jVD2','123 Main Street','Ontario','E3B 3B4','5065555555','testaccount@email.com','www.google.com','asdfasdf','Toronto','2019-10-25 17:49:24','Images/profilepics/default.jfif'),(47,'Fake','Name','totallyfake','$2y$10$NSpQKT0fENVa.CQSQ9S9pOs6ahQiV0a57eZB/dyxvdZ1kQiQtQEfO','123 Main Street','Ontario','E3B 3B4','5065555555','fakeemail@email.com','www.google.com','dfasdfae','Toronto','2019-10-25 17:59:34','Images/profilepics/47.png'),(48,'Hello','Hello','hi','$2y$10$rc19mG8nmjDZmos1YZiNpeRXF/Z7/DZHRUJR1Z4Ujr1j/f3CK4ZD2','123 Main Street','Prince Edward Island','E3B 3B4','5065555555','hello@hello.com','www.google.com','HELLO','Summerside','2019-10-25 18:02:07','Images/profilepics/default.jfif'),(49,'Jay','Oakerson','oakerson','$2y$10$aXAiWyj6.rdpFV94me9sQudLSjZNctPCEaV1.jd/Y/JRDeS4XFENK','123 Main Street','Ontario','E3B 3B4','','bigjay@thebonfire.com','google.com','Sirius XM','Toronto','2019-11-08 22:57:02','Images/profilepics/49.png'),(50,'Princess','Cat','imaprincess','$2y$10$4rAiAIAckUdQuEMZPjals.6cQVfJzKxFozQEW5IsZpnyyzgSX081e','458 Priestman Street','New Brunswick','E3B 3B4','','princess@meow.com','google.com','Meow','Fredericton','2019-11-08 22:59:54','Images/profilepics/50.png'),(51,'Mr','Robot','mr_robot','$2y$10$bTrikauKS56uclqAUsY5s.q4D1CYROc/hllkYTdGJBWloytcOt4WK','12-111 Richmond St W','Ontario','M5H 2G4','','mister@irobot.com','google.com','Bing It!','Toronto','2019-11-23 00:00:14','Images/profilepics/51.png'),(52,'Tom','Hanks','runforrestrun','$2y$10$.zvF4Z2RHRlCDQdvKdW/A.eiloFMke4Mkz6Ohb5v1kOg0qkQ/OBlK','1102 Front Street','Yukon','Y0B 1G0','','thanks@email.com','google.com','So Cold','Dawson City','2019-11-23 01:12:48','Images/profilepics/52.png');
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

-- Dump completed on 2019-12-06 14:29:11
