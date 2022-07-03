-- MariaDB dump 10.19  Distrib 10.5.12-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u198413917_vipcard_info
-- ------------------------------------------------------
-- Server version	10.5.12-MariaDB-cll-lve

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
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_02_21_085306_vipcard_user_management',1),(6,'2022_02_21_085333_vipcard_linked_user',1),(7,'2022_02_21_085352_vipcard_affiliate_templates',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('admin@vipcard.biz','$2y$10$Qfk6yrHbDA5zWu5O5lWbcuADzmpFfSG42AlLT8SkqqBMi97VdeKGC','2022-02-26 07:33:42');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@vipcard.biz',NULL,'$2y$10$dlNW7TieuOtWca.D5ra0QuzwmHXrKP/TaRQL2FhRt5DDsGgtNqMuG',1,1,NULL,'2022-02-26 07:36:37','2022-02-26 07:36:37'),(2,'Toan','toan@vipcard.biz',NULL,'$2y$10$9noedjytQWV0rtlkM8ua8Oi8S2TkUDZ/iArp.k68PE0Aj1thyC9se',0,1,NULL,'2022-02-24 04:46:44','2022-02-28 08:39:48'),(3,'trai','tqtkey@vipcard.biz',NULL,'$2y$10$zlR9jIGw04ROerwKHOraD.KS.JSJuW8bQOVR6uW79KOJ1VLS3b0T2',1,1,NULL,'2022-02-26 06:13:59','2022-02-26 06:39:31'),(4,'thaonguyen','thaonguyen@vipcard.biz',NULL,'$2y$10$YeFTVf5dMbdLGHtsps8wQuM4qmXDoBgAEdY5LAWb9vqkVOJfY1ecC',0,1,NULL,'2022-02-26 06:25:38','2022-02-26 06:39:36'),(5,'Yen','yen@vipcard.biz',NULL,'$2y$10$jwHXKzCuWZam5V7pRBQUp.f2xNNNcHIO4xp25WvQ/lpq8x.L08jE.',0,1,NULL,'2022-02-26 06:30:54','2022-02-26 06:39:39'),(6,'mai','mai@vipcard.biz',NULL,'$2y$10$YLxgbKXZHvGcKszyP/mCl.O/sYtcTd/KZmyJqizjZUHHiFCAGEi/y',0,1,NULL,'2022-02-26 06:33:23','2022-02-26 06:39:42'),(7,'thanh','thanh@vipcard.biz',NULL,'$2y$10$gLakwYNEw5kwl4zsih5cXu0xvWbnAGkuq9fWOLIh/V4XB..GFZpGm',0,1,NULL,'2022-02-26 06:35:49','2022-02-26 06:39:45'),(9,'Tuan','tuan@vipcard.biz',NULL,'$2y$10$g/napAv7ga68PBn/VmoO6O8nhueT1GZurExJbhf/01Ojvk9DrBv1W',0,1,'5JRAqTvzulDn9wXKau0hVbsfoImVlQbIjQUWQSzylIf2sfaFtbgL70SfNfMm','2022-03-09 15:33:43','2022-03-09 15:34:06'),(10,'Lê Văn Thức','ceo@tongluc.com',NULL,'$2y$10$AUln1pimM7cM3f6tHyJLjuxkWpiiGqhirEL1RXbPyP1eZRWD6meVe',0,1,NULL,'2022-03-17 13:39:28','2022-03-17 13:49:03'),(11,'Ngoc Anh','ngocanh@vipcard.biz',NULL,'$2y$10$8Zsn2EzjNsvO89SXtfySnec1euaZZbpXGwCmSQfd3nnze7cLcJJNO',0,1,'tkoWqfLdsPoj5QNYM82Qtp7RoNWZerjuLv8S5b0jlWekRL4lP3PgQar5rN2F','2022-06-06 14:33:57','2022-06-06 14:36:29');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vipcard_affiliate_templates`
--

DROP TABLE IF EXISTS `vipcard_affiliate_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vipcard_affiliate_templates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `affiliate_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `affiliate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `affiliate_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `affiliate_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vipcard_affiliate_templates`
--

LOCK TABLES `vipcard_affiliate_templates` WRITE;
/*!40000 ALTER TABLE `vipcard_affiliate_templates` DISABLE KEYS */;
INSERT INTO `vipcard_affiliate_templates` VALUES (1,'goidien','Gọi Điện','images/affiliate/phone.jpeg','tel:',NULL,NULL),(2,'facebook','Facebook','images/affiliate/facebook.png','https://facebook.com/',NULL,NULL),(3,'zalo','Zalo','images/affiliate/zalo.png','https://zalo.me/',NULL,NULL),(4,'instagram','Instagram','images/affiliate/instagram.png','http://www.instagram.com/',NULL,NULL),(5,'tiktok','TikTok','images/affiliate/tiktok.png','https://tiktok.com/@',NULL,NULL),(6,'youtube','Youtube','images/affiliate/youtube.png','https://www.youtube.com/c/',NULL,NULL),(7,'gmail','Gmail','images/affiliate/gmail.png','mailto:',NULL,NULL),(8,'messenger','Messenger','images/affiliate/messenger.png','http://m.me/',NULL,NULL),(9,'telegram','Telegram','images/affiliate/telegram.png','https://t.me/',NULL,NULL),(10,'momo','Momo','images/affiliate/momo.png','https://nhantien.momo.vn/',NULL,NULL),(11,'nganhang','Ngân Hàng','images/affiliate/bank.png',NULL,NULL,NULL);
/*!40000 ALTER TABLE `vipcard_affiliate_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vipcard_linked_user`
--

DROP TABLE IF EXISTS `vipcard_linked_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vipcard_linked_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `affiliate_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `affiliate_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `record_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vipcard_linked_user`
--

LOCK TABLES `vipcard_linked_user` WRITE;
/*!40000 ALTER TABLE `vipcard_linked_user` DISABLE KEYS */;
INSERT INTO `vipcard_linked_user` VALUES (51,2,'3','123344',0,'2022-02-25 06:43:23','2022-02-25 06:43:23'),(52,2,'7','abcd@gmail.com',1,'2022-02-25 06:43:23','2022-02-25 06:43:23'),(53,2,'2','Toan123',2,'2022-02-25 06:43:23','2022-02-25 06:43:23'),(54,2,'10','0366586836',3,'2022-02-25 06:43:23','2022-02-25 06:43:23'),(58,4,'2','thaonguyen.truongnu.54',0,'2022-02-26 06:27:16','2022-02-26 06:27:16'),(59,4,'3','0373665152',1,'2022-02-26 06:27:16','2022-02-26 06:27:16'),(60,4,'4','ha_ny.2811',2,'2022-02-26 06:27:16','2022-02-26 06:27:16'),(61,4,'5','hany2811',3,'2022-02-26 06:27:16','2022-02-26 06:27:16'),(62,4,'7','hanynguyen28110103@gmail.com',4,'2022-02-26 06:27:16','2022-02-26 06:27:16'),(63,4,'11','Agribank|PHAM THI THUY NGUYEN|4512205157361',5,'2022-02-26 06:27:16','2022-02-26 06:27:16'),(64,5,'1','0377627317',0,'2022-02-26 06:32:25','2022-02-26 06:32:25'),(65,5,'2','yen0802.BiPham',1,'2022-02-26 06:32:25','2022-02-26 06:32:25'),(66,5,'8','yen0802.BiPham',2,'2022-02-26 06:32:25','2022-02-26 06:32:25'),(67,5,'3','0947245508',3,'2022-02-26 06:32:25','2022-02-26 06:32:25'),(68,6,'2','maii.ngo.50',0,'2022-02-26 06:34:59','2022-02-26 06:34:59'),(69,6,'8','maii.ngo.50',1,'2022-02-26 06:34:59','2022-02-26 06:34:59'),(70,6,'3','0973492714',2,'2022-02-26 06:34:59','2022-02-26 06:34:59'),(71,6,'10','0973492714',3,'2022-02-26 06:34:59','2022-02-26 06:34:59'),(72,6,'4','ngomai129',4,'2022-02-26 06:34:59','2022-02-26 06:34:59'),(73,6,'11','Bidv|NGO THI MAI| 56010001283222',5,'2022-02-26 06:34:59','2022-02-26 06:34:59'),(74,3,'2','tqtkey',0,'2022-02-26 08:16:33','2022-02-26 08:16:33'),(75,3,'8','tqtkey',1,'2022-02-26 08:16:33','2022-02-26 08:16:33'),(76,3,'3','0961327392',2,'2022-02-26 08:16:33','2022-02-26 08:16:33'),(77,3,'9','tqtkey',3,'2022-02-26 08:16:33','2022-02-26 08:16:33'),(78,3,'7','truongquangtrai.gts@gmail.com',4,'2022-02-26 08:16:33','2022-02-26 08:16:33'),(79,3,'10','0961327392',5,'2022-02-26 08:16:33','2022-02-26 08:16:33'),(80,3,'11','VIB|TRƯƠNG QUANG TRAI|657704060094070',6,'2022-02-26 08:16:33','2022-02-26 08:16:33'),(81,3,'11','TECHCOMBANK|TRƯƠNG QUANG TRAI|19036887170016',7,'2022-02-26 08:16:33','2022-02-26 08:16:33'),(83,10,'2','54545',0,'2022-03-17 13:40:18','2022-03-17 13:40:18'),(84,10,'2','5345',1,'2022-03-17 13:40:18','2022-03-17 13:40:18'),(108,9,'2','duytuanvoz',0,'2022-03-17 13:47:29','2022-03-17 13:47:29'),(109,9,'8','duytuanvoz',1,'2022-03-17 13:47:29','2022-03-17 13:47:29'),(110,9,'3','0986166204',2,'2022-03-17 13:47:29','2022-03-17 13:47:29'),(111,9,'10','0986166204',3,'2022-03-17 13:47:29','2022-03-17 13:47:29'),(112,9,'9','0986166204',4,'2022-03-17 13:47:29','2022-03-17 13:47:29'),(113,9,'11','Techcombank|Võ Duy Tuấn|111111',5,'2022-03-17 13:47:29','2022-03-17 13:47:29'),(114,1,'2','DaoDuyToan.IT',0,'2022-05-27 04:19:48','2022-05-27 04:19:48'),(115,1,'8','DaoDuyToan.IT',1,'2022-05-27 04:19:48','2022-05-27 04:19:48'),(116,1,'4','daoduytoan',2,'2022-05-27 04:19:48','2022-05-27 04:19:48'),(117,1,'3','0366586836',3,'2022-05-27 04:19:48','2022-05-27 04:19:48'),(118,1,'10','0366586836',4,'2022-05-27 04:19:48','2022-05-27 04:19:48'),(119,1,'9','comDolly',5,'2022-05-27 04:19:48','2022-05-27 04:19:48'),(120,1,'7','duytoanqng@gmail.com',6,'2022-05-27 04:19:48','2022-05-27 04:19:48'),(121,1,'5','toanqng1997',7,'2022-05-27 04:19:48','2022-05-27 04:19:48'),(122,1,'11','Techcombank|Đào Duy Toàn|19034887125018',8,'2022-05-27 04:19:48','2022-05-27 04:19:48'),(123,1,'11','Agribank|Đào Duy Toàn|4501205102024',9,'2022-05-27 04:19:48','2022-05-27 04:19:48'),(135,11,'2','https://www.facebook.com/profile.php?id=100010220293937',0,'2022-06-06 14:54:11','2022-06-06 14:54:11'),(136,11,'3','0948279093',1,'2022-06-06 14:54:11','2022-06-06 14:54:11'),(137,11,'4','anhhs_930',2,'2022-06-06 14:54:11','2022-06-06 14:54:11'),(138,11,'5','nmeoo00',3,'2022-06-06 14:54:11','2022-06-06 14:54:11');
/*!40000 ALTER TABLE `vipcard_linked_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vipcard_user_management`
--

DROP TABLE IF EXISTS `vipcard_user_management`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vipcard_user_management` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `greeting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vipcard_user_management`
--

LOCK TABLES `vipcard_user_management` WRITE;
/*!40000 ALTER TABLE `vipcard_user_management` DISABLE KEYS */;
INSERT INTO `vipcard_user_management` VALUES (1,'admin','Đào Duy Toàn','0366586836','Hello!','images/user/avatar/toan.JPG','2022-02-24 04:22:38','2022-06-06 15:01:19'),(2,'toan','Toan','12345','abc','images/user/avatar/tiktok.png','2022-02-24 09:28:13','2022-02-28 08:00:37'),(3,'tqtkey','Trương Quang Trai','0961372392','Hello!!!','images/user/avatar/banner.jpg','2022-02-26 06:16:09','2022-02-26 08:17:01'),(4,'thaonguyen','Trương Nữ Thảo Nguyên','0373665152','TÌM HANY HẢ???','images/user/avatar/z3174646561282_3fc1791a5e9749340615c05084f5eb04.jpeg','2022-02-26 06:27:59','2022-02-26 06:27:59'),(5,'yen','Phạm Thị Tú Yên','0377627317','Hello','images/user/avatar/yen.jpeg','2022-02-26 06:31:43','2022-02-26 06:31:43'),(6,'mai','Mai','0973492714','Hiiiiii','images/user/avatar/mai.jpeg','2022-02-26 06:34:04','2022-02-26 06:34:04'),(7,'thanh','Thành','123','Hello',NULL,'2022-02-26 06:36:12','2022-02-26 06:36:12'),(9,'duytuan','Võ Duy Tuấn','12345678','Hello!','images/user/avatar/7b3acd5a60beafe0f6af.jpg','2022-03-15 03:53:25','2022-03-17 13:44:28'),(11,'ngocanh','Ngọc Ánh','0948279093','','images/user/avatar/IMG_3386.JPG','2022-03-17 13:42:30','2022-06-06 14:52:21');
/*!40000 ALTER TABLE `vipcard_user_management` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-03  3:37:20
