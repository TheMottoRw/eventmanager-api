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
  `contact_number` varchar(140) DEFAULT NULL,
  `address` text,
  `password` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `businesses`
--

LOCK TABLES `businesses` WRITE;
/*!40000 ALTER TABLE `businesses` DISABLE KEYS */;
INSERT INTO `businesses` VALUES (1,'Kayken Ltd','Software development','123456789','0726183049','Kacyiru,RWanda','$2y$10$IwDTcWwzS//47t.dqQ6QqugZ5YRUkyrsRbdYzMLolpzumjLkgR1Ea','pending','2021-07-02 23:04:46','2021-07-02 20:58:25'),(2,'Seveeen Ltd','Coding','15465388',NULL,'Musanze,North','$2y$10$qsctrrFU/5uYMoyWkicmDe1Omgp7ihDbxI3OL5B88HvrsrGSUS4wS','pending','2021-07-10 10:51:26','2021-07-10 10:51:26'),(3,'Qonics','Web development','1546385','0783598635','Gasabo,Kigali','$2y$10$7q9R.zyLVKzmApgMLDxBHe2BH398vC0LsfA7lYQVuiuqe8tsxZhMu','pending','2021-07-10 10:56:23','2021-07-10 10:56:23'),(4,'Nsulo Just','Construction','154326584','250789456320','Nyamirambo,Kigali','$2y$10$zfarNVVDVce19J.m7LIsp.kkS6i8bhVp1fXh2OPillaJXTaSbjmPS','pending','2021-07-10 19:01:17','2021-07-10 19:01:17');
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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evenements`
--

LOCK TABLES `evenements` WRITE;
/*!40000 ALTER TABLE `evenements` DISABLE KEYS */;
INSERT INTO `evenements` VALUES (1,1,'Hackthon for Climate change','Hackathon','Best project development for climate change',NULL,NULL,'2021-07-02 23:30:00','2021-07-03 12:00:00',15,'','pending','2021-07-02 20:59:49','2021-07-02 20:59:49'),(16,1,'We gonna party','Entertainment','It is networking and having fun event','to be added','','2021-07-01 13:00:00','2021-07-01 17:00:00',30,'','rejected','2021-07-10 17:24:05','2021-07-09 20:10:54'),(17,1,'We gonna party','Entertainment','It is networking and having fun event','to be added','http://192.168.43.161:8000/uploads/20210709081138208639.png,http://192.168.43.161:8000/uploads/20210709081138587566.png,http://192.168.43.161:8000/uploads/20210709081138356052.png','2021-07-01 13:00:00','2021-07-01 17:00:00',30,'','pending','2021-07-09 20:11:38','2021-07-09 20:11:38'),(18,1,'We gonna party','Entertainment','It is networking and having fun event','to be added','http://192.168.43.161:8000/uploads/20210709081153847069.png,http://192.168.43.161:8000/uploads/20210709081153906455.png,http://192.168.43.161:8000/uploads/2021070908115339333.png','2021-07-01 13:00:00','2021-07-01 17:00:00',30,'','approved','2021-07-10 17:24:19','2021-07-09 20:11:53'),(20,1,'We gonna party','Entertainment','It is networking and having fun event',NULL,'http://192.168.43.161:8000/uploads/2021070908131038998.png,http://192.168.43.161:8000/uploads/20210709081310933063.png,http://192.168.43.161:8000/uploads/20210709081310855814.png','2021-07-01 13:00:00','2021-07-01 17:00:00',30,'','pending','2021-07-09 20:13:10','2021-07-09 20:13:10'),(27,1,'We gonna party','Entertainment','It is networking and having fun event',NULL,'http://192.168.43.161:8000/uploads/20210709082552167315.png,http://192.168.43.161:8000/uploads/20210709082552905246.png,http://192.168.43.161:8000/uploads/20210709082552733836.png','2021-07-01 13:00:00','2021-07-01 17:00:00',30,'','pending','2021-07-09 20:25:52','2021-07-09 20:25:52'),(29,1,'We gonna party','Entertainment','It is networking and having fun event',NULL,'http://192.168.43.161:8000/uploads/20210709082648211985.png,http://192.168.43.161:8000/uploads/2021070908264894332.png,http://192.168.43.161:8000/uploads/20210709082648589880.png','2021-07-01 13:00:00','2021-07-01 17:00:00',30,'','pending','2021-07-09 20:26:48','2021-07-09 20:26:48'),(49,1,'Partying','Entertainment','Having fund and vibe for youth','.','http://192.168.43.161:8000/uploads/20210709090026430162.png,http://192.168.43.161:8000/uploads/20210709090026402547.png,http://192.168.43.161:8000/uploads/2021070909002620834.png','2021-07-10 18:30:00','2021-07-10 23:30:00',13,'','approved','2021-07-10 17:17:46','2021-07-09 21:00:26'),(50,4,'Copa America finale','Football','Neymar face Messi','.','http://192.168.43.161:8000/uploads/20210710072106261281.png,http://192.168.43.161:8000/uploads/20210710072106527014.png,http://192.168.43.161:8000/uploads/20210710072106297998.png','2021-07-11 02:00:00','2021-07-11 03:45:00',5,'','pending','2021-07-10 19:21:06','2021-07-10 19:21:06'),(51,4,'Final match of Euro championship','Football','Italy face England on Wembley stadium where Engish players will be at home','.','http://192.168.43.161:8000/uploads/20210710072457218073.png,http://192.168.43.161:8000/uploads/20210710072457266011.png,http://192.168.43.161:8000/uploads/2021071007245789064.png','2021-07-11 21:00:00','2021-07-11 23:00:00',60000,'','pending','2021-07-10 19:24:57','2021-07-10 19:24:57'),(52,4,'User engagement','Marketing','For engaging audience to be ware of Imenye product','.','http://192.168.43.161:8000/uploads/20210710072923619937.png,http://192.168.43.161:8000/uploads/2021071007292371555.png,http://192.168.43.161:8000/uploads/20210710072923862946.png','2021-08-03 18:30:00','2021-08-03 19:30:00',120,'','approved','2021-07-10 19:31:11','2021-07-10 19:29:23');
/*!40000 ALTER TABLE `evenements` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
INSERT INTO `reservation` VALUES (1,1,1,2,'2021-07-02 21:03:31','pending','2021-07-02 21:03:31'),(2,1,1,1,'2021-07-10 18:25:55','pending','2021-07-10 18:25:55');
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Emera','emera@gmail.com','0780000001','$2y$10$y4mWWq9iXzmQM9qT5O3ADuCTWVFhaCNVok9HZ8/V855j4R6mjyxbO','2021-07-02 21:02:33','Admin','2021-07-02 21:02:33'),(2,'Benon','benon@gmail.com','0726183050','$2y$10$FmNSLhp8uMPrLd3ppndeeOOF.uWE9mi1UCW/kEhp4KrMmK67YGPgK','2021-07-02 21:03:12','Standard','2021-07-02 21:03:12'),(3,'Manzi Roger','roro@gmail.com','250789456125','$2y$10$rQnjcCrWASNzIBxLgPaiw.MJzGYLk.YCDbdcBcQL/xjdWrGq6Dvq2','2021-07-10 18:57:57','Standard','2021-07-10 18:57:57');
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

-- Dump completed on 2021-07-10 22:11:18
