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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `follows`
--

LOCK TABLES `follows` WRITE;
/*!40000 ALTER TABLE `follows` DISABLE KEYS */;
INSERT INTO `follows` VALUES (14,41,39),(15,41,42),(16,41,40),(17,40,39),(18,39,40),(19,39,42),(20,39,41);
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tweets`
--

LOCK TABLES `tweets` WRITE;
/*!40000 ALTER TABLE `tweets` DISABLE KEYS */;
INSERT INTO `tweets` VALUES (1,'asdf',39,0,0,'2019-10-24 15:06:53'),(2,'I like to tweet',39,0,0,'2019-10-24 15:09:13'),(3,'Testing testing',39,0,0,'2019-10-24 22:00:35'),(4,'Tweet tweet, tweetily tweet',39,0,0,'2019-10-25 15:29:30'),(5,'Bird is the word',40,0,0,'2019-10-25 15:31:48'),(6,'Today at the bank, an old lady asked me to help check her balance. So I pushed her over.',41,0,0,'2019-10-25 15:32:35'),(7,'I told my girlfriend she drew her eyebrows too high. She seemed surprised.',39,0,0,'2019-10-25 15:33:03'),(8,'My boss told me to have a good day.. so I went home.',39,0,0,'2019-10-25 15:34:52'),(9,'Hey, this is neat',39,0,0,'2019-10-25 16:59:07'),(10,'Why did the chicken cross the road? To get to the other side',41,0,0,'2019-10-25 17:12:34'),(11,'etryretyerty',39,0,0,'2019-10-25 17:27:09');
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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (39,'Adam','Brewer','addyb','$2y$10$M.4I5nKlTk5s5uxoXyjfl.DZoyWNjNziF.tOm8liKuB467ulk9BKe','123 Main Street','New Brunswick','E3B 3B4','5065555555','adambrewer88@gmail.com','www.google.com','Here to troll','Fredericton','2019-10-23 13:27:51','Images/profilepics/39.png'),(40,'Nick','Taggart','nick','$2y$10$o3hKgQhYNMbi6fbnRPIebu8BAq9MYEsE2CddcSaTe5IQD/ZJL5Jky','26 Duffie Drive','New Brunswick','E3B 0R6',' (506) 460-6222','nicktaggart@nbcc.ca','nbcc.ca','Hello','Fredericton','2019-10-23 15:25:44','Images/profilepics/40.png'),(41,'Fake','Name','notreal','$2y$10$8ee6fP0QHr4mSrhGxxbVqOnOYHzxj45y7XVj3hwMJYut6rKOYNbjW','123 Main Street','Newfoundland and Labrador','E3B 3B4','5065555555','fakeperson@email.com','www.google.com','Watch out','Gander','2019-10-24 12:16:42','Images/profilepics/41.png'),(42,'Tom','Green','tomgreen','$2y$10$.W//6MJigGb4fnVNhFhUreCVjOXgjb247knepxlzWQaeI4oAfRuwS','123 Main Street','Ontario','E3B 3B4','5065555555','tom@green.com','www.google.com','This is the Tom Green Show','Toronto','2019-10-24 14:18:31','Images/profilepics/default.jfif'),(43,'asdfasdf','sdfgsdfg','afefsef','$2y$10$gJwa2ttnNd8RTBwsbV5FRuxDoYJT4nsxrHH8ud8VS9wz1kd9qalMG','afsdgsdfg','Alberta','E3B 3B4','3232321','asdfas@gadfgsdf','www.google.com','asdfsadf','asdfasdf','2019-10-25 17:32:12','Images/profilepics/default.jfif'),(44,'test','account','testaccount','$2y$10$PCd/XaHXiAinn.sJ3qjrNerluvnLmc2VDPoUrEi38zY33zPxhumYe','123 Main Street','Ontario','E3B 3B4','5065555555','test@account.com','www.google.com','HELLO','Toronto','2019-10-25 17:45:42','Images/profilepics/default.jfif'),(45,'Tom','Segura','bikes','$2y$10$7Kuxdh9q4pS54EzIHsjUwOwDsgd1/Ndg2/0ztsofqK1KUxg2g8dN6','123 Main Street','Ontario','E3B 3B4','5065555555','segura@ymh.com','www.google.com','HELLO','Toronto','2019-10-25 17:47:07','Images/profilepics/default.jfif'),(46,'Test','Account','testest','$2y$10$jW7f1suCO9K/QUv4el0hROZ9Vo1Tr1bCq3w0MuEit6S8OTsn1jVD2','123 Main Street','Ontario','E3B 3B4','5065555555','testaccount@email.com','www.google.com','asdfasdf','Toronto','2019-10-25 17:49:24','Images/profilepics/default.jfif'),(47,'Fake','Name','totallyfake','$2y$10$NSpQKT0fENVa.CQSQ9S9pOs6ahQiV0a57eZB/dyxvdZ1kQiQtQEfO','123 Main Street','Ontario','E3B 3B4','5065555555','fakeemail@email.com','www.google.com','dfasdfae','Toronto','2019-10-25 17:59:34','Images/profilepics/default.jfif'),(48,'Hello','Hello','hi','$2y$10$rc19mG8nmjDZmos1YZiNpeRXF/Z7/DZHRUJR1Z4Ujr1j/f3CK4ZD2','123 Main Street','Prince Edward Island','E3B 3B4','5065555555','hello@hello.com','www.google.com','HELLO','Summerside','2019-10-25 18:02:07','Images/profilepics/default.jfif');
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

-- Dump completed on 2019-10-25 15:05:31
