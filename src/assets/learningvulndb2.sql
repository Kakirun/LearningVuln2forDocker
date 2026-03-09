-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: learningvulndb2
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `prob1_table1`
--

DROP TABLE IF EXISTS `prob1_table1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prob1_table1` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_class` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prob1_table1`
--

LOCK TABLES `prob1_table1` WRITE;
/*!40000 ALTER TABLE `prob1_table1` DISABLE KEYS */;
INSERT INTO `prob1_table1` VALUES (1,'安部','Editor','a1s2d3f4'),(2,'伊藤','Viewer','q1w2e3r4'),(3,'上野','Viewer','z1x2c3v4'),(4,'遠藤','Viewer','P0_wE_r1'),(5,'大田','Viewer','Lk9_jH7g'),(6,'加藤','Editor','mN5_bV3c'),(7,'木村','Viewer','uS3_rN4m'),(8,'工藤','Viewer','2025test'),(9,'剣持','Viewer','april001'),(10,'小林','Viewer','mnbvcxz1'),(11,'佐藤','Viewer','!QAZ2wsx'),(12,'清水','Viewer','2025pass'),(13,'鈴木','Viewer','5tGb7uJm'),(14,'千石','Admin','{A9!f@d3P#XB2^T5z&CK7!xY#rV8Dp4%Zc*M6w}'),(15,'曽根','Viewer','9oKi8uHy'),(16,'田中','Viewer','Xk9vL2mP'),(17,'千葉','Editor','qR4tZ7wY'),(18,'土屋','Viewer','bN3hJ8dF'),(19,'寺田','Viewer','mK6pL9sA'),(20,'徳田','Viewer','cV2gH5jQ'),(21,'中村','Viewer','zX8dB1nC'),(22,'西村','Viewer','wE4rT7yU'),(23,'沼田','Viewer','iO9pA2sD'),(24,'根本','Viewer','fG5hJ8kL'),(25,'野村','Viewer','vB3nM6qW'),(26,'林','Viewer','Y7uI4oP1'),(27,'平野','Viewer','tR2eW5qA'),(28,'藤原','Viewer','sD8fG3hJ'),(29,'逸見','Viewer','kL6zX9cV'),(30,'本田','Editor','bN1mQ4wE'),(31,'松本','Viewer','rT7yU2iO'),(32,'三浦','Viewer','pA5sD8fG'),(33,'村上','Viewer','hJ3kL6zX'),(34,'目黒','Viewer','cV9bN2mQ'),(35,'森','Editor','Eq9wA3sz'),(36,'山田','Viewer','qwertyui'),(37,'湯浅','Viewer','asdfghjk'),(38,'吉田','Viewer','z8xcvb6n'),(39,'瀬野','Editor','ijntf9s2'),(40,'力石','Viewer','rfghmnbk'),(41,'渡部','Viewer','plk4gred');
/*!40000 ALTER TABLE `prob1_table1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prob4_table1`
--

DROP TABLE IF EXISTS `prob4_table1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prob4_table1` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_class` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prob4_table1`
--

LOCK TABLES `prob4_table1` WRITE;
/*!40000 ALTER TABLE `prob4_table1` DISABLE KEYS */;
INSERT INTO `prob4_table1` VALUES (1,'野比','一般','nobita',''),(2,'剛田','一般','takeshi',''),(3,'骨川','管理者','ZwBXSAZtjVkmzRfE3cNiTfxTW8_knW','{6XyQGh6y2axXPe_KrAaeF7u6ueAGyX3Fu9y3Nzm7dSSeS3RdgyjYemCTdiXDCQjXd8NzKVPpNmCNMctwMibz82XTDpPaYCfkaVXZccUa45Az_UeEw_Xfwmia}.txt');
/*!40000 ALTER TABLE `prob4_table1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_table`
--

DROP TABLE IF EXISTS `user_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_table` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_class` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_table`
--

LOCK TABLES `user_table` WRITE;
/*!40000 ALTER TABLE `user_table` DISABLE KEYS */;
INSERT INTO `user_table` VALUES (1,'Alex','admin','A9!f@d3P#X'),(2,'Ben','guest','B2^T5z&'),(3,'Chris','guest','CK7!xY#rV8'),(4,'David','guest','Dp4%Zc*M6w*'),(5,'Emma','guest','*E!dT7@P3qX*'),(6,'Felix','guest','*F5z#yL2*R9'),(7,'George','guest','GM6!wkD5n'),(8,'Henry','guest','HqX4!cJpZ%'),(9,'Isaac','guest','IP9N3dT7^L'),(10,'Jack','guest','J2#rV8m5z$'),(11,'Kevin','admin','KM6wJp4%'),(12,'Lucy','guest','L2!F5z#yR7');
/*!40000 ALTER TABLE `user_table` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-01-28 13:08:29
