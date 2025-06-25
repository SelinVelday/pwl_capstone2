CREATE DATABASE  IF NOT EXISTS `pwl_capstone2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pwl_capstone2`;
-- MySQL dump 10.13  Distrib 8.0.41, for macos15 (x86_64)
--
-- Host: 127.0.0.1    Database: pwl_capstone2
-- ------------------------------------------------------
-- Server version	9.2.0

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
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('laravel_cache_committe@papilaya.com|127.0.0.1','i:1;',1750811336),('laravel_cache_committe@papilaya.com|127.0.0.1:timer','i:1750811336;',1750811336);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speaker` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poster_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_fee` decimal(10,2) NOT NULL DEFAULT '0.00',
  `max_participants` int DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `events_created_by_foreign` (`created_by`),
  CONSTRAINT `events_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'Seminar Nasional AI 2025','2025-08-10','15:30:00','Gedung Serbaguna Papilaya','Dr. Elara Vance','event_posters/16qonVXC8pbgmUGl7IsvNDz0qtliwehJPdqLJDVx.jpg',150000.00,100,'Seminar mendalam tentang masa depan Artificial Intelligence dan dampaknya pada industri.',3,'2025-06-24 08:33:38','2025-06-24 14:00:38'),(2,'Workshop Public Speaking','2025-09-05','11:00:00','Auditorium Papilaya','Aria Chen, M.I.Kom','event_posters/1N7PkqxSABOHmEkZWDrYOOzFIIaJcEGBKiapfGDf.png',75000.00,50,'Tingkatkan kepercayaan diri dan kemampuan berbicara di depan umum Anda.',3,'2025-06-24 08:33:38','2025-06-24 14:24:41'),(3,'Bazaar & Pameran Karya Mahasiswa','2025-09-20','10:30:00','Lapangan Utama Kampus','Internal Mahasiswa','event_posters/rPf09WJAJwzMCZUMXTZPRQwbSIfm99GT3GvFLk57.png',0.00,NULL,'Lihat dan beli karya-karya inovatif dari mahasiswa Papilaya University.',3,'2025-06-24 08:33:38','2025-06-24 14:23:16'),(4,'Digital Marketing Bootcamp: From Zero to Pro','2025-08-15','09:00:00','Laboratorium Komputer, Gedung B Lantai 3','Adinda Lestari (Digital Marketing Strategist di TechCorp)','event_posters/9cmVj7P88bvVcTnZAWbZicyGA8TPd9gxtfi2rNWv.png',125000.00,40,'Pelajari dasar-dasar hingga strategi tingkat lanjut dalam dunia pemasaran digital. Materi mencakup SEO (Search Engine Optimization), SEM (Search Engine Marketing), periklanan media sosial, dan analitik. Cocok untuk semua jurusan yang ingin meningkatkan keahlian digital.',3,'2025-06-24 10:30:57','2025-06-24 14:21:51'),(6,'Advanced Web Development: Real-Time Apps with Laravel & Vue.js','2025-06-25','13:30:00','Pusat Inovasi Digital Papilaya, Gedung C','Dian Prawira (Senior Software Engineer di DigiNusa)','event_posters/JJ0jl6QwN0BmPL8xKaA6f1ylq9KLizrpWl8hA5JD.png',2500000.00,30,'Tingkatkan skill web development Anda ke level selanjutnya. Workshop intensif ini akan membahas arsitektur modern untuk membangun aplikasi web interaktif dan real-time menggunakan Laravel sebagai backend dan Vue.js sebagai frontend. Peserta akan belajar tentang WebSockets, API, dan state management.',3,'2025-06-24 18:04:54','2025-06-24 18:05:08');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
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
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned NOT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
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
INSERT INTO `migrations` VALUES (9,'2025_06_24_163225_create_password_reset_tokens_table',1),(10,'2025_06_24_180205_create_notifications_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES ('20b0de48-3b0b-41cd-bb96-9d0e0257dfce','App\\Notifications\\CertificateReady','App\\Models\\User',8,'{\"event_name\":\"Seminar Nasional AI 2025\",\"message\":\"Sertifikat Anda untuk event \\\"Seminar Nasional AI 2025\\\" sudah tersedia untuk diunduh!\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/member\\/my-registrations\"}',NULL,'2025-06-24 16:45:48','2025-06-24 16:45:48'),('bc682519-22cb-461b-8271-02713b878a5f','App\\Notifications\\CertificateReady','App\\Models\\User',14,'{\"event_name\":\"Seminar Nasional AI 2025\",\"message\":\"Sertifikat Anda untuk event \\\"Seminar Nasional AI 2025\\\" sudah tersedia untuk diunduh!\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/member\\/my-registrations\"}',NULL,'2025-06-24 18:08:26','2025-06-24 18:08:26');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
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
INSERT INTO `password_reset_tokens` VALUES ('finance@papilaya.com','$2y$12$gmt0v.J41v9.EJ3CeDMgAulieQ4acFaRdjr8eLvaCjouOPN1nNt32','2025-06-24 09:35:04');
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
-- Table structure for table `registrations`
--

DROP TABLE IF EXISTS `registrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `event_id` bigint unsigned NOT NULL,
  `registration_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` enum('pending','paid','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_proof_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attended` tinyint(1) NOT NULL DEFAULT '0',
  `certificate_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `registrations_user_id_event_id_unique` (`user_id`,`event_id`),
  UNIQUE KEY `registrations_registration_code_unique` (`registration_code`),
  KEY `registrations_event_id_foreign` (`event_id`),
  CONSTRAINT `registrations_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  CONSTRAINT `registrations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registrations`
--

LOCK TABLES `registrations` WRITE;
/*!40000 ALTER TABLE `registrations` DISABLE KEYS */;
INSERT INTO `registrations` VALUES (1,4,1,'0L9OMNONOF','paid','payment_proofs/dummy_proof_budi.jpg',1,'certificates/dummy_cert_budi.pdf','2025-06-24 08:33:38','2025-06-24 08:33:38'),(2,5,1,'JIGGGFQHGL','paid','payment_proofs/dummy_proof_siti.jpg',0,NULL,'2025-06-24 08:33:38','2025-06-24 10:03:02'),(3,6,2,'EZ7WOHFW1A','paid','payment_proofs/6ywPFnunpgdqcHh2uoBhHHpd5QS7fwe8kHgzvhj0.jpg',1,'certificates/vge703AES0IT21NjlN4wsPtJTSzeAEUStv5WqR9W.pdf','2025-06-24 08:33:38','2025-06-24 10:59:52'),(4,5,2,'4RLDfVM6Z91750782949','pending',NULL,0,NULL,'2025-06-24 09:35:49','2025-06-24 09:35:49'),(6,6,1,'hAGTBZz2IY1750784527','paid','payment_proofs/xlyHGHBm6EF2pEc3YzgWjC3J4U1xqUZcxSZWN8ht.jpg',0,NULL,'2025-06-24 10:02:07','2025-06-24 12:40:34'),(7,6,3,'xNNWP6BTfX1750786273','pending',NULL,0,NULL,'2025-06-24 10:31:13','2025-06-24 10:31:13'),(8,8,1,'WSNvYQAS0z1750796324','paid','payment_proofs/5tbmkWoT8MKZCK5NPIzJaH6TlF8p5dWZn89hUnhZ.jpg',1,'certificates/36ewBWX0iaDBAmQsCSppSLGEe5PbNdObFruIMrBD.pdf','2025-06-24 13:18:44','2025-06-24 16:45:48'),(9,8,2,'wSvKrDzV6U1750797109','pending',NULL,0,NULL,'2025-06-24 13:31:49','2025-06-24 13:31:49'),(10,10,1,'T8QOJTPg2C1750810499','paid','payment_proofs/swkhNXJKgy02cBCGwQWTfNHP1K3ZbBzQvkQY7I94.png',0,NULL,'2025-06-24 17:14:59','2025-06-24 18:11:22'),(11,10,4,'6yphgx85a81750810540','pending',NULL,0,NULL,'2025-06-24 17:15:40','2025-06-24 17:15:40'),(12,11,1,'tW4Kax299R1750810844','paid','payment_proofs/SwWULavlywgbUlkW0RutkFEsQgTa9WdDY1NsUjDo.png',0,NULL,'2025-06-24 17:20:44','2025-06-24 17:26:27'),(13,11,4,'3gpV6b0TTN1750810891','pending',NULL,0,NULL,'2025-06-24 17:21:31','2025-06-24 17:26:38'),(14,13,4,'DeE5CD8pZq1750812275','pending','payment_proofs/qCzmx9kyTNX7vqLVG3F9tWGGEVB8AROTqz72Khqu.png',0,NULL,'2025-06-24 17:44:35','2025-06-24 17:45:04'),(15,13,3,'WCFVJG2KIN1750812323','pending',NULL,0,NULL,'2025-06-24 17:45:23','2025-06-24 17:45:23'),(16,14,1,'Bqg3qIzHbB1750813029','paid','payment_proofs/VvKzVoB2WFrQGC7PgwiyfpdZDuHKr2vjb19DWiro.png',1,'certificates/IeIvJR6UX5HUxu6swpOQe3UMLa96ugiLPpf5nK5T.pdf','2025-06-24 17:57:09','2025-06-24 18:08:26'),(17,14,4,'M8R6ZwsX8t1750813062','paid','payment_proofs/bsJ6DscdjTriEfTAGJI4ZsOX9RcqmlfyQBDyu4rR.png',0,NULL,'2025-06-24 17:57:42','2025-06-24 18:02:25'),(18,14,6,'MBDM2thHW91750813556','pending','payment_proofs/ASyaWZD6AuVVR6rvRLfk97ytooWzPrbjxnD4s8f0.png',0,NULL,'2025-06-24 18:05:56','2025-06-24 18:06:27');
/*!40000 ALTER TABLE `registrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `session_registrations`
--

DROP TABLE IF EXISTS `session_registrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `session_registrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `registration_id` bigint unsigned NOT NULL,
  `sub_event_id` bigint unsigned NOT NULL,
  `attended_session` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `session_registrations_registration_id_sub_event_id_unique` (`registration_id`,`sub_event_id`),
  KEY `session_registrations_sub_event_id_foreign` (`sub_event_id`),
  CONSTRAINT `session_registrations_registration_id_foreign` FOREIGN KEY (`registration_id`) REFERENCES `registrations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `session_registrations_sub_event_id_foreign` FOREIGN KEY (`sub_event_id`) REFERENCES `sub_events` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `session_registrations`
--

LOCK TABLES `session_registrations` WRITE;
/*!40000 ALTER TABLE `session_registrations` DISABLE KEYS */;
INSERT INTO `session_registrations` VALUES (1,1,1,1,'2025-06-24 08:33:38','2025-06-24 08:33:38');
/*!40000 ALTER TABLE `session_registrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('4ENhTFEXnybp6HMnkxY9JOdPCCjw4RF2oVvR80qM',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoieDNvTWs4TURlMmRodkFkVXJ5bmZqdHlkanRsY0hMVGQ2UW1HQWR2ZyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=',1750808792),('e8Yl2SvjqB3N7zLJm1LTRax9b9K9wF171WdHDDXn',NULL,'127.0.0.1','Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Mobile Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiYTVJNjZZRVRxdU9Gczh5SUZkVUVXaW1aSjhPdmNaRHNUNVo2ZmpmOSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=',1750813974),('VxE3hedfH40gwn4EGElhcQ0mCwgGFlqzPfrKQ98Z',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiN2EzTlo2UWNXb21nNXlWa0VpOU05TFV4aGQzbFFaWTJaWlNNdnp1aSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=',1750809937);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_events`
--

DROP TABLE IF EXISTS `sub_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sub_events` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `event_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speaker` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_participants` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_events_event_id_foreign` (`event_id`),
  CONSTRAINT `sub_events_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_events`
--

LOCK TABLES `sub_events` WRITE;
/*!40000 ALTER TABLE `sub_events` DISABLE KEYS */;
INSERT INTO `sub_events` VALUES (1,1,'Sesi 1: Pengenalan Deep Learning',NULL,'2025-08-10','10:00:00','12:00:00','Ruang A','Prof. Kael',50,'2025-06-24 08:33:38','2025-06-24 08:33:38'),(2,1,'Sesi 2: Etika dalam AI',NULL,'2025-08-10','13:00:00','15:00:00','Ruang B','Dr. Lyra',50,'2025-06-24 08:33:38','2025-06-24 08:33:38');
/*!40000 ALTER TABLE `sub_events` ENABLE KEYS */;
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
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('guest','member','admin','finance','committee') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin User','admin@papilaya.com','2025-06-24 08:33:37','$2y$12$w.HQZYc6cDy9eO0pvobRK.cTb29hMef0heiBMIT0emIgdeVAU1iLG','admin',1,NULL,'2025-06-24 08:33:37','2025-06-24 08:33:37'),(2,'Finance User 1','finance1@papilaya.com','2025-06-24 08:33:37','$2y$12$sxUA2ggdWpTzfeR/q5DqluMnRB50D/B67wxrNdMdhfb82FwRiMBb2','finance',1,NULL,'2025-06-24 08:33:37','2025-06-24 17:59:46'),(3,'Committee User','committee@papilaya.com','2025-06-24 08:33:37','$2y$12$4tORpnTUdYSY4mWUgnGdV.DKDbhbYHGOzTDWCz02BHLNUXsZ0JRtu','committee',1,NULL,'2025-06-24 08:33:37','2025-06-24 08:33:37'),(4,'Budi Member','budi@papilaya.com','2025-06-24 08:33:38','$2y$12$CAjZTY7GnLmqh.Y/zaGrOehndlUH.MKM0jtCAKZ4EIUVXfNIrT21i','member',1,NULL,'2025-06-24 08:33:38','2025-06-24 08:33:38'),(5,'Siti Member','siti@papilaya.com','2025-06-24 08:33:38','$2y$12$rIr71qyYIp9KlZ1PTbPaq.YjfKoXYAzaLpMXTrs97z1zsPE.zFSkW','member',1,NULL,'2025-06-24 08:33:38','2025-06-24 08:33:38'),(6,'Charlie Member','charlie@papilaya.com','2025-06-24 08:33:38','$2y$12$kujQoXwS0NCeqovDs45d7Ov3M0FcCh4bvSATRySe0czcfC5aQUiTa','member',1,NULL,'2025-06-24 08:33:38','2025-06-24 08:33:38'),(7,'Silvia Wijayanto','silvia@papilaya.com',NULL,'$2y$12$IEOcqtNqr.K8HtoCYWjBvebVSSKentF0WelRj8Uk.OQpl2nLycSOC','committee',1,NULL,'2025-06-24 11:42:12','2025-06-24 17:23:58'),(8,'Denada','denada@papilaya.com',NULL,'$2y$12$7DgBA83oXpMWZ17QZijLY.V49/Z/cC7cgqIRj3rRfkgozI1wohf7S','member',1,NULL,'2025-06-24 13:18:30','2025-06-24 13:18:30'),(10,'Selin','selin@papilaya.com',NULL,'$2y$12$MG2uDEVGVuK3/ngYIaL8Puy47qOZliK8DfMfLqw.mNuR1PEXzVVRK','member',1,NULL,'2025-06-24 17:14:45','2025-06-24 17:14:45'),(11,'John','john@papilaya.com',NULL,'$2y$12$XCdU4k8tmhThievMse6Ssu8dWeXSZdEco26PGaVLQycBKHTfY3zLa','member',1,NULL,'2025-06-24 17:20:08','2025-06-24 17:20:08'),(12,'Virna','virna@papilaya.com',NULL,'$2y$12$ijO.zUmI4GLh6hi1OVXl6uFbaZAJIvd8W.Ig919D.S9H7DnND1Z4G','finance',1,NULL,'2025-06-24 17:24:39','2025-06-24 17:24:39'),(13,'Ayu','ayu@papilaya.com',NULL,'$2y$12$anUnop8JvFmxcZWiw/Wqd.x2O.ZA2VcHMBWGkZWQECsERWIpTrjx2','member',1,NULL,'2025-06-24 17:44:01','2025-06-24 17:44:01'),(14,'Nadin','nadin@papilaya.com',NULL,'$2y$12$ojQbyrhrJ3tINwyovHXXI.qnYAOVhLcN5uZgIsaDfiPWBbPyO3IPu','member',1,NULL,'2025-06-24 17:56:51','2025-06-24 17:56:51'),(15,'Delina','delina@papilaya.com',NULL,'$2y$12$7sQqe3Mb1z5nuZvBesLHTOlpTkH44o.jwUkDlPR6I46sLiROnHdvy','committee',1,NULL,'2025-06-24 18:00:28','2025-06-24 18:00:28');
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

-- Dump completed
