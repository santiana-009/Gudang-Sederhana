-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: gudang
-- ------------------------------------------------------
-- Server version	8.0.35

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
-- Table structure for table `barcods`
--

DROP TABLE IF EXISTS `barcods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `barcods` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `no_item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `po_item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_brcd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barcods`
--

LOCK TABLES `barcods` WRITE;
/*!40000 ALTER TABLE `barcods` DISABLE KEYS */;
INSERT INTO `barcods` VALUES (1,'123','2','12','2023-12-05 23:51:46','2023-12-05 23:51:46'),(3,'123','222','wqda','2023-12-05 23:55:06','2023-12-05 23:55:06'),(5,'123','222','qwdqas','2023-12-05 23:55:06','2023-12-05 23:55:06'),(6,'123','222','wqda','2023-12-05 23:55:06','2023-12-05 23:55:06'),(8,'123','222','qwdqas','2023-12-05 23:55:06','2023-12-05 23:55:06'),(9,'123','222','aasad','2023-12-06 01:32:34','2023-12-06 01:32:34'),(10,'123','222','asda','2023-12-06 01:46:24','2023-12-06 01:46:24'),(11,'123','222','aasad','2023-12-06 01:46:24','2023-12-06 01:46:24'),(12,'123','222','asda','2023-12-06 01:48:03','2023-12-06 01:48:03'),(13,'123','222','aasad','2023-12-06 01:48:03','2023-12-06 01:48:03'),(14,'123','222','asda','2023-12-06 01:48:56','2023-12-06 01:48:56'),(15,'123','222','aasad','2023-12-06 01:48:56','2023-12-06 01:48:56'),(16,'123','222','asda','2023-12-06 01:50:11','2023-12-06 01:50:11'),(17,'123','222','asda','2023-12-06 01:50:56','2023-12-06 01:50:56'),(18,'123','222','asda','2023-12-06 01:51:24','2023-12-06 01:51:24'),(19,'20082011','12938475','01MON2022054','2024-01-07 19:29:12','2024-01-07 19:29:12'),(20,'20082011','182736457','01MON2022052','2024-01-07 19:29:24','2024-01-07 19:29:24'),(22,'20082011','203971827','01MON2022010','2024-01-07 19:29:47','2024-01-07 19:29:47'),(25,'20086109','12345678','01RAD2022007','2024-01-11 19:59:48','2024-01-11 19:59:48'),(26,'20082011','128374628','01MON2022020','2024-01-11 19:59:48','2024-01-11 19:59:48');
/*!40000 ALTER TABLE `barcods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incomings`
--

DROP TABLE IF EXISTS `incomings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `incomings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `current_date` date NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty_items_info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brcd_items_info` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incomings`
--

LOCK TABLES `incomings` WRITE;
/*!40000 ALTER TABLE `incomings` DISABLE KEYS */;
INSERT INTO `incomings` VALUES (3,'2023-10-19','Tualang','Barang untuk perbaikan','(20022395)(2)(12345678),(20086109)(2)(12345678),(20022354)(3)(123456789)','(20086109)(01RAD2022006),(20086109)(01RAD2022007)','2024-01-07 19:43:34','2024-01-07 19:43:34');
/*!40000 ALTER TABLE `incomings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_item` bigint unsigned NOT NULL,
  `no_item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty_item` int NOT NULL,
  `brcd_item` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `items_no_item_unique` (`no_item`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (3,'MOUSE;USB,3 BUTTON',3,'20022354',3,0,'2024-01-07 19:12:34','2024-01-07 19:43:34'),(4,'COMPUTER CABLE;UTP,4PAIRS,CATEGORY 5',4,'20022380',0,0,'2024-01-07 19:13:04','2024-01-07 19:13:04'),(5,'PRINTER GEAR;F/LQ-2170,EPSON',5,'20022395',2,0,'2024-01-07 19:14:32','2024-01-07 19:43:34'),(6,'RIBBON MASK;F/LQ-1170,EPSON',6,'20022411',0,0,'2024-01-07 19:16:09','2024-01-07 19:16:09'),(7,'PRINT HEAD PLATE;F/LQ-2170,EPSON',7,'20022414',0,0,'2024-01-07 19:16:34','2024-01-07 19:16:34'),(8,'PAPER SENSOR F/ EPSON LQ-2170',8,'20022426',0,0,'2024-01-07 19:16:52','2024-01-07 19:16:52'),(9,'CABLE HEAD;F/ LQ-2170',9,'20022428',0,0,'2024-01-07 19:17:12','2024-01-07 19:17:12'),(10,'PAPER SENSOR F/ EPSON LQ-2180',8,'20022441',0,0,'2024-01-07 19:17:29','2024-01-07 19:17:29'),(11,'MOTHER BOARD F/ PRINTER LQ-2180,EPSON',8,'20022468',0,0,'2024-01-07 19:17:46','2024-01-07 19:17:46'),(12,'CONNECTOR;MODULE PLUG,RJ-45',11,'20022504',0,0,'2024-01-07 19:20:36','2024-01-07 19:20:36'),(13,'PRINTER HEAD;F/LQ-2180,EPSON',12,'20026790',0,0,'2024-01-07 19:21:03','2024-01-07 19:21:03'),(14,'COAXIAL CABLE;LDF4-50A,ANDREW HELIAX',13,'20027479',0,0,'2024-01-07 19:21:23','2024-01-07 19:21:23'),(15,'COAXIAL CABLE;RG-58,BELDEN',13,'20029577',0,0,'2024-01-07 19:21:44','2024-01-07 19:21:44'),(16,'BAT.CHARGER;GP338,7.5V,1600mAh,MOTOROLA',17,'20044210',0,0,'2024-01-07 19:22:00','2024-01-07 19:22:00'),(17,'SWITCH;WS-C2960-24TT-L,CISCO',18,'20050148',0,1,'2024-01-07 19:22:24','2024-01-07 19:22:24'),(18,'ROUTERBOARD;RB433AH,MIKROTIK',20,'20070855',0,1,'2024-01-07 19:22:48','2024-01-07 19:22:48'),(19,'BULLET;BM5HP,5Ghz,UBIQUITI',23,'20083532',4,0,'2024-01-07 19:23:08','2024-01-11 19:59:48'),(20,'MONITOR;COLOR,18.5\",LED,1366x768',25,'20082011',2,1,'2024-01-07 19:23:54','2024-01-11 19:59:48'),(21,'WIRELEES;OUTD,ROCKET-M5,UBIQUITI',24,'20086109',1,1,'2024-01-07 19:24:18','2024-01-11 19:59:48'),(22,'LAN CARD;TG-3468,TP-LINK',22,'20086884',0,1,'2024-01-07 19:24:36','2024-01-07 19:24:36'),(23,'UPS;I:230V,O:230V,2.2kVA,20MIN',26,'20087069',0,1,'2024-01-07 19:25:12','2024-01-07 19:25:12'),(24,'SWITCH;SLM2008T-EU,CISCO',18,'20087188',0,1,'2024-01-07 19:25:32','2024-01-07 19:25:32');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_11_19_125440_create_items_table',1),(6,'2023_11_19_125511_create_type_items_table',1),(7,'2023_11_19_125524_create_incomings_table',1),(8,'2023_11_19_125538_create_outgoings_table',1),(9,'2023_11_19_125757_create_barcods_table',1),(10,'2023_11_20_003236_create_outgoings_ends_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outgoings`
--

DROP TABLE IF EXISTS `outgoings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `outgoings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_date` date NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty_item_info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brcd_item_info` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outgoings`
--

LOCK TABLES `outgoings` WRITE;
/*!40000 ALTER TABLE `outgoings` DISABLE KEYS */;
INSERT INTO `outgoings` VALUES (5,'Fadhil','0007630','2023-11-12','Siak','Barang Untuk Distrik','(20086109)(2),(20083532)(2),(20082011)(1)','(20086109)(01RAD2022006)(12345678),(20086109)(01RAD2022007)(12345678),(20082011)(01MON2022020)(128374628)',NULL,NULL);
/*!40000 ALTER TABLE `outgoings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outgoings_ends`
--

DROP TABLE IF EXISTS `outgoings_ends`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `outgoings_ends` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_date` date NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty_item_info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brcd_item_info_out` text COLLATE utf8mb4_unicode_ci,
  `brcd_item_info_in` text COLLATE utf8mb4_unicode_ci,
  `brcd_item_info_use` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `brcd_item_info_defect` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outgoings_ends`
--

LOCK TABLES `outgoings_ends` WRITE;
/*!40000 ALTER TABLE `outgoings_ends` DISABLE KEYS */;
INSERT INTO `outgoings_ends` VALUES (9,'Fadhil','0007630','2023-11-12','Siak','Barang Untuk Distrik, Memakai ! Radio Rocket','(20086109)(2)(1)(1),(20083532)(2)(1)(1),(20082011)(1)(0)(1)','(20086109)(01RAD2022006)(12345678),(20086109)(01RAD2022007)(12345678),(20082011)(01MON2022020)(128374628)','(20086109)(01RAD2022007)(12345678),(20082011)(01MON2022020)(128374628)','(20086109)(01RAD2022006)(12345678)','2024-01-11 19:59:48','2024-01-11 19:59:48','(01RAD2022002)(Rusak di tembak petir)');
/*!40000 ALTER TABLE `outgoings_ends` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_items`
--

DROP TABLE IF EXISTS `type_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `type_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_items`
--

LOCK TABLES `type_items` WRITE;
/*!40000 ALTER TABLE `type_items` DISABLE KEYS */;
INSERT INTO `type_items` VALUES (3,'MOUSE','2024-01-07 19:04:25','2024-01-07 19:04:25'),(4,'COMPUTER CABLE','2024-01-07 19:04:35','2024-01-07 19:04:35'),(5,'PRINTER GEAR','2024-01-07 19:04:44','2024-01-07 19:04:44'),(6,'RIBBON MASK','2024-01-07 19:04:51','2024-01-07 19:04:51'),(7,'PRINT HEAD PLATE','2024-01-07 19:04:58','2024-01-07 19:04:58'),(8,'PAPER SENSOR','2024-01-07 19:05:10','2024-01-07 19:05:10'),(9,'CABLE HEAD','2024-01-07 19:05:26','2024-01-07 19:05:26'),(10,'MOTHER BOARD','2024-01-07 19:05:38','2024-01-07 19:05:38'),(11,'CONNECTOR','2024-01-07 19:05:44','2024-01-07 19:05:44'),(12,'PRINTER HEAD','2024-01-07 19:05:57','2024-01-07 19:05:57'),(13,'COAXIAL CABLE','2024-01-07 19:06:13','2024-01-07 19:06:13'),(14,'POWER SUPPLY','2024-01-07 19:09:30','2024-01-07 19:09:30'),(15,'KEYBOARD','2024-01-07 19:09:43','2024-01-07 19:09:43'),(16,'ADAPTOR','2024-01-07 19:09:59','2024-01-07 19:09:59'),(17,'BAT.CHARGER','2024-01-07 19:10:08','2024-01-07 19:10:08'),(18,'SWITCH','2024-01-07 19:10:15','2024-01-07 19:10:15'),(19,'PASSIVE POE BASE','2024-01-07 19:10:27','2024-01-07 19:10:27'),(20,'ROUTERBOARD','2024-01-07 19:10:56','2024-01-07 19:10:56'),(21,'ANTENNA','2024-01-07 19:11:04','2024-01-07 19:11:04'),(22,'LAN CARD','2024-01-07 19:11:30','2024-01-07 19:11:30'),(23,'BULLET','2024-01-07 19:11:39','2024-01-07 19:11:39'),(24,'WIRELEES','2024-01-07 19:11:45','2024-01-07 19:11:45'),(25,'MONITOR','2024-01-07 19:23:19','2024-01-07 19:23:19'),(26,'UPS','2024-01-07 19:24:48','2024-01-07 19:24:48');
/*!40000 ALTER TABLE `type_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin',NULL,'$2y$12$Bb6PvCxINofAUh8DcDtu5OorN/yA0CRol0yJhd2eKMcdgHdSN7xb.',NULL,'2023-11-21 22:56:37','2023-11-21 22:56:37');
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

-- Dump completed on 2024-07-11  3:13:54
