-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: cariproperty
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

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
-- Table structure for table `medias`
--

DROP TABLE IF EXISTS `medias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `medias_username_unique` (`username`),
  UNIQUE KEY `medias_id_user_unique` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medias`
--

LOCK TABLES `medias` WRITE;
/*!40000 ALTER TABLE `medias` DISABLE KEYS */;
INSERT INTO `medias` VALUES (1,'enomarozi',1,'enomarozi',NULL,NULL,NULL,'2023-12-03 20:13:53','2023-12-04 00:49:18'),(2,'testtest',2,'add',NULL,NULL,NULL,'2023-12-03 20:15:20','2023-12-03 20:15:20'),(3,'budi',3,'test','123',NULL,NULL,'2023-12-03 21:36:46','2023-12-03 21:36:46');
/*!40000 ALTER TABLE `medias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2019_12_14_000001_create_personal_access_tokens_table',1),(2,'2023_04_04_034921_create_penjualans_table',1),(3,'2023_04_10_070247_create_users_table',1),(4,'2023_08_22_013712_create_tanah_table',1),(5,'2023_11_29_031638_create_medias_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penjualans`
--

DROP TABLE IF EXISTS `penjualans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penjualans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `properti` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `rt` varchar(255) NOT NULL,
  `rw` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `ukuran` int(11) NOT NULL DEFAULT 0,
  `jk_tidur` int(11) NOT NULL DEFAULT 0,
  `jk_mandi` int(11) NOT NULL DEFAULT 0,
  `luas_tanah` int(11) NOT NULL DEFAULT 0,
  `luas_bangun` int(11) NOT NULL DEFAULT 0,
  `harga` int(11) NOT NULL,
  `frumah` varchar(255) NOT NULL,
  `ftamu` varchar(255) DEFAULT NULL,
  `ftidur` varchar(255) DEFAULT NULL,
  `fdapur` varchar(255) DEFAULT NULL,
  `fhalaman` varchar(255) DEFAULT NULL,
  `fmandi` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penjualans`
--

LOCK TABLES `penjualans` WRITE;
/*!40000 ALTER TABLE `penjualans` DISABLE KEYS */;
INSERT INTO `penjualans` VALUES (1,'enomarozi','1','Dijual','Rumah','Minimalis','Padang Timur','Sawahan','1','1','Sawahan 2',0,4,1,120,144,40000,'202312040445rumah1.jpeg','202312080902tanah1.jpg',NULL,NULL,NULL,NULL,'test','2023-12-03 21:45:21','2023-12-08 02:02:37'),(2,'enomarozi','1','Disewa','Rumah','Minimalis','Padang Selatan','Air Manis','2','1','Air manis',0,1,1,130,140,1400000,'202312040449kos2.jpg',NULL,NULL,NULL,NULL,NULL,'test','2023-12-03 21:49:15','2023-12-03 21:49:15'),(3,'enomarozi','1','Dijual','Tanah','Subsidi','Nanggalo','Gurun Laweh','12','1','Gurun laweh',0,0,0,140,0,120,'202312040449tanah4.jpg',NULL,NULL,NULL,NULL,NULL,'test','2023-12-03 21:49:44','2023-12-03 21:49:44'),(4,'enomarozi','1','Disewa','Ruko','Mewah','Padang Timur','Sawahan','2','21','Sawahan',0,20,1,2,12,40000,'202312040452ruko2.jpg',NULL,NULL,NULL,NULL,NULL,'123','2023-12-03 21:52:41','2023-12-03 21:52:41'),(5,'enomarozi','1','Kamar Kost','Rumah','Mewah','Padang Utara','Air Tawar Barat','3','3','Air Tawar',40,0,1,0,0,123,'202312040611kos3.jpg',NULL,NULL,NULL,NULL,NULL,'test','2023-12-03 23:11:38','2023-12-03 23:11:38'),(6,'enomarozi','1','Dijual','Rumah','Mewah','Nanggalo','Gurun Laweh','4','4','Gurun Laweh',0,4,2,100,100,4321,'202312040801rumah2.jpg',NULL,NULL,NULL,NULL,NULL,'test','2023-12-04 01:01:47','2023-12-04 01:01:47'),(7,'enomarozi','1','Kamar Kost','Rumah','Mewah','Padang Barat','Belakang Tangsi','1','1','123',100,0,2,0,0,200,'202312040802kos1.png',NULL,NULL,NULL,NULL,NULL,'test','2023-12-04 01:02:34','2023-12-04 01:02:34'),(8,'enomarozi','1','Dijual','Tanah','Subsidi','Padang Timur','Andalas','1','1','andalas',0,0,0,30,0,123,'202312040807tanah2.jpg',NULL,NULL,NULL,NULL,NULL,'321','2023-12-04 01:07:30','2023-12-04 01:07:30');
/*!40000 ALTER TABLE `penjualans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
-- Table structure for table `tanahs`
--

DROP TABLE IF EXISTS `tanahs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tanahs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `rt` varchar(255) NOT NULL,
  `rw` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `luas_tanah` int(11) NOT NULL,
  `panjang` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `ftanah1` varchar(255) NOT NULL,
  `ftanah2` varchar(255) NOT NULL,
  `ftanah3` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tanahs`
--

LOCK TABLES `tanahs` WRITE;
/*!40000 ALTER TABLE `tanahs` DISABLE KEYS */;
/*!40000 ALTER TABLE `tanahs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `namalengkap` varchar(255) NOT NULL,
  `fprofile` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Eno Marozi','202312040313desktop-wallpaper-modern-random-b-scb-modern-earth.jpg','enomarozi','marozieno0@gmail.com','$2y$10$q9TBGrJQffW6ky2sQ7w8Nu2NC5SxrMzomVrwFuO27.ypqbqGOcIkK','1997-10-03','Koto Tangah','Lubuk Buaya','Lubuk Gading 4 C/21','082288400386','2023-12-03 20:13:53','2023-12-03 20:13:53'),(3,'ini budi','202312040436test.jpg','budi','budi@gmail.com','$2y$10$0XTi7mgATGT1Q8eBD.r3Fe7s/P3RZcyyWu32YA3et4YbURxgaSXNu','1997-10-03','Kuranji','Gunung Sarik','1234','082288400386','2023-12-03 21:36:46','2023-12-03 21:36:46');
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

-- Dump completed on 2024-01-22 15:45:29
