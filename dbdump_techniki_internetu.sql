-- MySQL dump 10.13  Distrib 8.0.28, for Linux (aarch64)
--
-- Host: localhost    Database: diana_com
-- ------------------------------------------------------
-- Server version	8.0.28-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `diana_com`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `diana_com` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `diana_com`;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `userID` int DEFAULT NULL,
  `product` int DEFAULT NULL,
  KEY `orders_product_product.id_fk` (`product`),
  KEY `orders_users_users.id_fk` (`userID`),
  CONSTRAINT `orders_product_product.id_fk` FOREIGN KEY (`product`) REFERENCES `product` (`id`),
  CONSTRAINT `orders_users_users.id_fk` FOREIGN KEY (`userID`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (67,2),(67,3),(67,4),(67,5),(67,6),(70,7),(70,1),(67,1),(67,1),(67,1);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `price` decimal(9,2) DEFAULT NULL,
  `currency` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'http://212.180.138.42/images/_RAF3683.jpg','Lorem iposum',12.50,'PLN'),(2,'http://212.180.138.42/images/_RAF3697.jpg','Lorem iposum',12.50,'PLN'),(3,'http://212.180.138.42/images/_RAF3703.jpg','Lorem iposum',12.50,'PLN'),(4,'http://212.180.138.42/images/_RAF3708.jpg','Lorem iposum',12.50,'PLN'),(5,'http://212.180.138.42/images/_RAF3769.jpg','Lorem iposum',12.50,'PLN'),(6,'http://212.180.138.42/images/_RAF3780.jpg','Lorem iposum',12.50,'PLN'),(7,'http://212.180.138.42/images/_RAF3784.jpg','Lorem iposum',12.50,'PLN'),(8,'http://212.180.138.42/images/_RAF3793.jpg','Lorem iposum',12.50,'PLN'),(13,'https://i.domyseniora.pl/d10/37/17-g-ry-dla-seniora-jak-si.jpg','góry',12.00,'pln');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `administrator` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (60,'Diana','dianaszczepankowska@wp.pl','$2y$10$p6I9bsh2Z4cLnivr2jTn6O938H1JcKqZVXuIoIxTyoqsFthgQDa5m','2022-02-10 10:07:22',1),(67,'Rafal','rafal@com','$2y$10$2UxYEMVkWKQIX.7s6tPidu/kdCz4DadFdDz/mE2EJ4WgE9mZwGNmu','2022-02-10 10:27:27',0),(68,'hera','herka@wp.pl','$2y$10$yFRXAShQp2/wfTju39mWyec9klZBh6juoc.r9.j8O6eTIa/pKr19K','2022-02-12 09:10:38',0),(70,'kubek','diana@wp.pl','$2y$10$30oLAuNznkFekJ3RAwrlMuz6Kg440sZ/kBGGk9aPfUGhCC7BrpyrK','2022-02-12 12:57:53',0),(76,'SuperAdmin','super@admin','$2y$10$A02V0tPdqqJ9fZ/X7GZi6OazIQ7Iy6toy9pGA3/HbU/HbvrZkw2PK','2022-02-12 18:48:19',1);
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

-- Dump completed on 2022-02-12 19:04:27
