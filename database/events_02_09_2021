-- MySQL dump 10.13  Distrib 5.7.32, for Linux (x86_64)
--
-- Host: localhost    Database: events
-- ------------------------------------------------------
-- Server version	5.7.32

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
-- Table structure for table `businesses`
--

DROP TABLE IF EXISTS `businesses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `businesses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) DEFAULT '',
  `business_type` varchar(140) DEFAULT NULL,
  `tin` varchar(140) DEFAULT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `contact_number` varchar(140) DEFAULT NULL,
  `address` text,
  `gps_location` varchar(255) DEFAULT '',
  `password` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `businesses`
--

LOCK TABLES `businesses` WRITE;
/*!40000 ALTER TABLE `businesses` DISABLE KEYS */;
INSERT INTO `businesses` VALUES (1,'Kayken Ltd','Software development','123456789','','0726183055','Kacyiru,RWanda','','$2y$10$IwDTcWwzS//47t.dqQ6QqugZ5YRUkyrsRbdYzMLolpzumjLkgR1Ea','pending','2021-09-01 12:07:43','2021-07-02 20:58:25'),(2,'Seveeen Ltd','Coding','15465388','',NULL,'Musanze,North','','$2y$10$qsctrrFU/5uYMoyWkicmDe1Omgp7ihDbxI3OL5B88HvrsrGSUS4wS','pending','2021-07-10 10:51:26','2021-07-10 10:51:26'),(3,'Qonics','Web development','1546385','','0783598635','Gasabo,Kigali','','$2y$10$7q9R.zyLVKzmApgMLDxBHe2BH398vC0LsfA7lYQVuiuqe8tsxZhMu','pending','2021-07-10 10:56:23','2021-07-10 10:56:23'),(4,'Nsulo Just','Construction','154326584','','250789456320','Nyamirambo,Kigali','','$2y$10$zfarNVVDVce19J.m7LIsp.kkS6i8bhVp1fXh2OPillaJXTaSbjmPS','pending','2021-07-10 19:01:17','2021-07-10 19:01:17'),(5,'KayKen Inc','Software developers','102320120','','0784634120','Kacyiru,Kigali','','$2y$10$n1vAGvSgYAfXYTk/xbpog.hd432DoUOKO45ecziP8n2cdpeuEo4ry','pending','2021-07-15 17:48:45','2021-07-15 17:48:45'),(6,'Kayken Og','Software development','156432568','','0784634121','Kacyiru,Rwanda','','$2y$10$SK/9USfsZcSesdhoM..sluD82w/bF5raf6qKyeOqrwvdAagfei7T.','pending','2021-07-15 18:08:25','2021-07-15 18:08:25'),(7,'Justin Inc','Hardware','123456789','','0784634122','Nyamirambo,Kigali','','$2y$10$IIcyexo01QUsYEcKCLI.1efZW1JJYECDzaS6f5LlLu3Gwsljyv8WK','pending','2021-07-15 18:50:21','2021-07-15 18:50:21'),(8,'Emera Ionic','Chemistry','123564789','','0784634119','Kigali,Rwanda','','$2y$10$S2U6YdbU0i6OON0EKocAF.gRVaFQ8aP7i/JmpX1OYefmQwAaP9W9G','pending','2021-07-15 19:14:07','2021-07-15 19:14:07'),(9,'Kanan Ltd','Entertainment','123321123','','0784634125','Kimisagara','','$2y$10$5nmc.OlLbvUvaW/3esWweeIz9aT//VVEHAz43PXMDkoDlfGXEWIQC','pending','2021-07-15 19:23:17','2021-07-15 19:23:17'),(10,'The Mane','Entertainment','123321234','','0784634127','Kimisagara','','$2y$10$NE0RMa0LIj/f7Cn3sKDQOe7dYlx85dy2S6dBdHV4gwrIVDaARHOWa','pending','2021-07-15 19:27:00','2021-07-15 19:27:00');
/*!40000 ALTER TABLE `businesses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evenements`
--

DROP TABLE IF EXISTS `evenements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evenements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `business_id` int(11) DEFAULT NULL,
  `event_name` varchar(140) DEFAULT NULL,
  `event_type` varchar(140) DEFAULT NULL,
  `brief_description` varchar(500) DEFAULT NULL,
  `full_description` text,
  `images` text,
  `event_kikoff` datetime DEFAULT NULL,
  `event_close` datetime DEFAULT NULL,
  `reservation_allowed` int(11) DEFAULT NULL,
  `address` varchar(70) DEFAULT '',
  `status` varchar(15) NOT NULL DEFAULT 'pending',
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `business_id` (`business_id`),
  CONSTRAINT `evenements_ibfk_1` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evenements`
--

LOCK TABLES `evenements` WRITE;
/*!40000 ALTER TABLE `evenements` DISABLE KEYS */;
INSERT INTO `evenements` VALUES (1,NULL,NULL,NULL,NULL,NULL,NULL,'2021-09-04 22:00:00','2021-08-18 22:00:00',NULL,'','approved','2021-08-23 17:48:04','2021-07-02 20:59:49'),(16,NULL,NULL,NULL,NULL,NULL,NULL,'2021-08-31 11:30:00','2021-08-14 11:30:00',NULL,'','rejected','2021-08-23 17:48:04','2021-07-09 20:10:54'),(17,1,'We gonna party','Entertainment','It is networking and having fun event','to be added','http://192.168.43.161:8000/uploads/20210709081138208639.png,http://192.168.43.161:8000/uploads/20210709081138587566.png,http://192.168.43.161:8000/uploads/20210709081138356052.png','2021-08-31 23:00:00','2021-08-14 23:00:00',30,'','approved','2021-08-23 17:48:04','2021-07-09 20:11:38'),(18,1,'We gonna party','Entertainment','It is networking and having fun event','to be added','http://192.168.43.161:8000/uploads/20210709081153847069.png,http://192.168.43.161:8000/uploads/20210709081153906455.png,http://192.168.43.161:8000/uploads/2021070908115339333.png','2021-08-16 17:00:00','2021-07-30 17:00:00',30,'','cancelled','2021-08-23 17:48:04','2021-07-09 20:11:53'),(20,1,'We gonna party','Entertainment','It is networking and having fun event',NULL,'http://192.168.43.161:8000/uploads/2021070908131038998.png,http://192.168.43.161:8000/uploads/20210709081310933063.png,http://192.168.43.161:8000/uploads/20210709081310855814.png','2021-08-16 17:00:00','2021-07-30 17:00:00',30,'','approved','2021-08-23 17:48:04','2021-07-09 20:13:10'),(27,1,'We gonna party','Entertainment','It is networking and having fun event',NULL,'http://192.168.43.161:8000/uploads/20210709082552167315.png,http://192.168.43.161:8000/uploads/20210709082552905246.png,http://192.168.43.161:8000/uploads/20210709082552733836.png','2021-08-16 17:00:00','2021-07-30 17:00:00',30,'','approved','2021-08-23 17:48:04','2021-07-09 20:25:52'),(29,1,'We gonna party','Entertainment','It is networking and having fun event',NULL,'http://192.168.43.161:8000/uploads/20210709082648211985.png,http://192.168.43.161:8000/uploads/2021070908264894332.png,http://192.168.43.161:8000/uploads/20210709082648589880.png','2021-08-16 17:00:00','2021-07-30 17:00:00',30,'','approved','2021-08-23 17:48:04','2021-07-09 20:26:48'),(49,1,'Partying','Entertainment','Having fund and vibe for youth','.','http://192.168.43.161:8000/uploads/universal.jpg,http://192.168.43.161:8000/uploads/20210709090026402547.png,http://192.168.43.161:8000/uploads/2021070909002620834.png','2021-08-25 23:30:00','2021-08-08 23:30:00',13,'','approved','2021-08-23 17:48:04','2021-07-09 21:00:26'),(50,4,'Copa America finale','Football','Neymar face Messi','.','http://192.168.43.161:8000/uploads/massage.jpg,http://192.168.43.161:8000/uploads/20210710072106527014.png,http://192.168.43.161:8000/uploads/20210710072106297998.png','2021-08-26 03:45:00','2021-08-09 03:45:00',5,'','approved','2021-08-23 17:48:04','2021-07-10 19:21:06'),(51,4,'Final match of Euro championship','Football','Italy face England on Wembley stadium where Engish players will be at home','.','http://192.168.43.161:8000/uploads/couple.jpg,http://192.168.43.161:8000/uploads/20210710072457266011.png,http://192.168.43.161:8000/uploads/2021071007245789064.png','2021-08-26 23:00:00','2021-08-09 23:00:00',60000,'','approved','2021-08-23 17:48:04','2021-07-10 19:24:57'),(52,4,'User engagement','Marketing','For engaging audience to be ware of Imenye product','.','http://192.168.43.161:8000/uploads/cofee.jpg,http://192.168.43.161:8000/uploads/2021071007292371555.png,http://192.168.43.161:8000/uploads/20210710072923862946.png','2021-09-18 19:30:00','2021-09-01 19:30:00',120,'','approved','2021-08-23 17:48:04','2021-07-10 19:29:23'),(53,7,'Coding for exercising','Hackathon','For young talents','.','http://192.168.43.161:8000/uploads/20210715065208636607.png,http://192.168.43.161:8000/uploads/20210715065208748889.png,http://192.168.43.161:8000/uploads/20210715065208371455.png','2021-08-31 12:00:00','2021-08-14 12:00:00',12,'','approved','2021-08-23 17:48:04','2021-07-15 18:52:08'),(54,10,'Dance challenge','Dancing','Dance one song for fame','.','http://192.168.43.161:8000/uploads/20210715072805262379.png,http://192.168.43.161:8000/uploads/20210715072805663756.png,http://192.168.43.161:8000/uploads/20210715072805854320.png','2021-08-31 16:30:00','2021-08-14 16:30:00',25,'','approved','2021-08-23 17:48:04','2021-07-15 19:28:05'),(55,10,'Marina launch','Concert','Album 6 of marina Launch','.','http://192.168.43.161:8000/uploads/20210715072926194440.png,http://192.168.43.161:8000/uploads/20210715072926503029.png,http://192.168.43.161:8000/uploads/20210715072926806298.png','2021-08-31 22:30:00','2021-08-14 22:30:00',2500,'','cancelled','2021-08-23 17:48:04','2021-07-15 19:29:26'),(56,1,'We gonna party','Entertainment','It is networking and having fun event','to be added',',,','2021-07-01 13:00:00','2021-07-01 17:00:00',30,'','pending','2021-09-02 08:28:04','2021-09-02 08:28:04');
/*!40000 ALTER TABLE `evenements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `follows`
--

DROP TABLE IF EXISTS `follows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `follows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `business_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `business_id` (`business_id`),
  CONSTRAINT `follows_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `follows_ibfk_2` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `follows`
--

LOCK TABLES `follows` WRITE;
/*!40000 ALTER TABLE `follows` DISABLE KEYS */;
INSERT INTO `follows` VALUES (1,1,1,'2021-08-23 15:10:06','2021-08-23 15:10:06'),(6,5,4,'2021-09-01 11:37:03','2021-09-01 11:37:03'),(8,5,10,'2021-09-01 11:37:16','2021-09-01 11:37:16');
/*!40000 ALTER TABLE `follows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `business_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` enum('pending','used','cancelled') DEFAULT 'pending',
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `business_id` (`business_id`),
  KEY `event_id` (`event_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`),
  CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `evenements` (`id`),
  CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
INSERT INTO `reservation` VALUES (1,1,1,2,'2021-07-02 21:03:31','pending','2021-07-02 21:03:31'),(2,1,1,1,'2021-07-10 18:25:55','pending','2021-07-10 18:25:55'),(3,10,54,4,'2021-07-15 20:01:48','pending','2021-07-15 20:01:48');
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reset_code`
--

DROP TABLE IF EXISTS `reset_code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reset_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_id` int(11) DEFAULT NULL,
  `reference_type` varchar(15) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `status` varchar(15) DEFAULT 'pending',
  `expire_date` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  CONSTRAINT `reset_code_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reset_code`
--

LOCK TABLES `reset_code` WRITE;
/*!40000 ALTER TABLE `reset_code` DISABLE KEYS */;
INSERT INTO `reset_code` VALUES (1,6,'Standard','ST1823','pending','2021-08-31 20:30:00','2021-08-31 19:30:21','2021-08-31 19:30:21'),(2,6,'Standard','ST8843','pending','2021-08-31 22:34:00','2021-08-31 21:34:30','2021-08-31 21:34:30');
/*!40000 ALTER TABLE `reset_code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `review` text,
  `rate` float DEFAULT NULL,
  `images` text,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `evenements` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,3,50,'it was good',3,NULL,'2021-08-23 15:15:53','2021-08-23 15:15:53'),(2,5,52,'great thing',0,NULL,'2021-08-23 18:04:35','2021-08-23 18:04:35'),(3,5,53,'It is exciting',0,NULL,'2021-08-23 19:12:45','2021-08-23 19:12:45'),(4,5,17,'amazing',0,NULL,'2021-08-29 08:24:58','2021-08-29 08:24:58');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `savedforlater`
--

DROP TABLE IF EXISTS `savedforlater`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `savedforlater` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `savedforlater_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `savedforlater_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `evenements` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `savedforlater`
--

LOCK TABLES `savedforlater` WRITE;
/*!40000 ALTER TABLE `savedforlater` DISABLE KEYS */;
INSERT INTO `savedforlater` VALUES (3,5,52,'2021-08-23 18:08:27','2021-08-23 18:08:27'),(4,5,54,'2021-08-23 19:10:50','2021-08-23 19:10:50');
/*!40000 ALTER TABLE `savedforlater` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) DEFAULT '',
  `email` varchar(140) DEFAULT NULL,
  `phone` varchar(140) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_type` enum('Admin','Standard') DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Emera','emera@gmail.com','0780000001','$2y$10$y4mWWq9iXzmQM9qT5O3ADuCTWVFhaCNVok9HZ8/V855j4R6mjyxbO','2021-07-02 21:02:33','Admin','2021-07-02 21:02:33'),(2,'Benon','benon@gmail.com','0726183050','$2y$10$FmNSLhp8uMPrLd3ppndeeOOF.uWE9mi1UCW/kEhp4KrMmK67YGPgK','2021-07-02 21:03:12','Standard','2021-07-02 21:03:12'),(3,'Manzi Roger','roro@gmail.com','250789456125','$2y$10$rQnjcCrWASNzIBxLgPaiw.MJzGYLk.YCDbdcBcQL/xjdWrGq6Dvq2','2021-07-10 18:57:57','Standard','2021-07-10 18:57:57'),(4,'Munyemana James','munyemana@gmail','0726183050','$2y$10$uushIf/cx6BSaCVSk/1Fk.BdjDt/wSWD89Jyo9GpCY7wcJ7.wdIEu','2021-07-15 20:01:37','Standard','2021-07-15 20:01:37'),(5,'Manzi','manz@yahoo.com','0726183049','$2y$10$EJbR2JOnZrGfeIdToXX2Se.jIKfbqxBbTi9u.XftcUMmG460vfliG','2021-08-23 15:05:22','Standard','2021-08-23 15:05:22'),(6,'Manzi Asua','mnzroger@gmail.com','0726183052','$2y$10$ZZwquRG9ZqQjmvtodd9n4enr5IXeUhbVDeqPX8/DZExBwoRlyCnfe','2021-08-25 15:56:57','Standard','2021-08-25 15:56:57');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-02  8:29:28
