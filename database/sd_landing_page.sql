-- MySQL dump 10.13  Distrib 9.5.0, for macos14.8 (arm64)
--
-- Host: localhost    Database: sd_landing_page
-- ------------------------------------------------------
-- Server version	9.5.0

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
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ 'e6466ce4-c70e-11f0-81d2-f3189cc60ef2:1-3861';

--
-- Table structure for table `achievements`
--

DROP TABLE IF EXISTS `achievements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `achievements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title_line1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_line2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `achievements`
--

LOCK TABLES `achievements` WRITE;
/*!40000 ALTER TABLE `achievements` DISABLE KEYS */;
INSERT INTO `achievements` VALUES (1,'Juara 1','Olimpiade Matematika','Juara 1 Olimpiade Matematika Nasional','Prestasi membanggakan di bidang akademik. Siswa kami berhasil meraih medali emas pada ajang Olimpiade Matematika tingkat Nasional.','achievements/prestasi_1_matematika_1782133276277.png','Akademik','2024','Tirta Pratama','2026-06-23 01:04:07','2026-06-23 01:04:07'),(2,'Juara 2','Debat Bahasa Inggris','Juara 2 Lomba Debat Bahasa Inggris Provinsi','Tim perwakilan sekolah menunjukkan kemampuan argumentasi dan bahasa Inggris yang luar biasa di ajang lomba debat tingkat provinsi.','achievements/prestasi_2_debat_1782133288309.png','Bahasa','2025','Karen Alexia','2026-06-23 01:04:07','2026-06-23 01:04:07'),(3,'Juara 1','Kompetisi Catur','Juara 1 Kompetisi Catur Nasional','Berpikir strategis dan tenang di bawah tekanan, siswa kami berhasil mengalahkan lawan-lawan tangguh dari seluruh negeri pada kompetisi catur nasional.','achievements/prestasi_3_catur_1782133299213.png','Olahraga & Strategi','2024','Tirta Pratama','2026-06-23 01:04:07','2026-06-23 01:04:07'),(4,'Juara 3','Karya Tulis Ilmiah','Juara 3 Lomba Karya Tulis Ilmiah Nasional','Penelitian dan inovasi sains yang cemerlang mengantarkan siswa kami menjadi salah satu yang terbaik pada lomba karya tulis ilmiah tingkat nasional.','achievements/prestasi_4_karya_1782133310377.png','Sains & Penelitian','2022','Dewi Wulan','2026-06-23 01:04:07','2026-06-23 01:04:07'),(5,'Juara 1','Lari 100m Provinsi','Juara 1 Lari 100m Tingkat Provinsi','Ketangkasan dan kecepatan luar biasa menjadikan siswa kami sebagai yang tercepat dalam ajang kejuaraan lari 100m tingkat provinsi.','achievements/prestasi_5_lari_1782133320838.png','Olahraga Fisik','2023','Rizky Maulana','2026-06-23 01:04:07','2026-06-23 01:04:07');
/*!40000 ALTER TABLE `achievements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
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
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
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
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
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
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `galleries_user_id_foreign` (`user_id`),
  CONSTRAINT `galleries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleries`
--

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
INSERT INTO `galleries` VALUES (1,1,'Kegiatan Belajar Mengajar','Suasana kelas yang aktif dan menyenangkan','2026-06-20 23:40:43','2026-06-20 23:40:43'),(2,1,'Upacara Bendera','Kegiatan upacara setiap hari Senin','2026-06-20 23:40:43','2026-06-20 23:40:43'),(3,1,'Ekstrakurikuler','Kegiatan ekskul siswa yang beragam','2026-06-20 23:40:43','2026-06-20 23:40:43'),(4,1,'Perpustakaan Sekolah','Fasilitas perpustakaan yang lengkap','2026-06-20 23:40:43','2026-06-20 23:40:43'),(5,1,'Lapangan Olahraga','Area olahraga dan bermain siswa','2026-06-20 23:40:43','2026-06-20 23:40:43'),(6,1,'Taman Sekolah','Lingkungan sekolah yang asri dan hijau','2026-06-20 23:40:43','2026-06-20 23:40:43');
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_images`
--

DROP TABLE IF EXISTS `gallery_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gallery_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `gallery_id` bigint unsigned NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_images_gallery_id_foreign` (`gallery_id`),
  CONSTRAINT `gallery_images_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_images`
--

LOCK TABLES `gallery_images` WRITE;
/*!40000 ALTER TABLE `gallery_images` DISABLE KEYS */;
INSERT INTO `gallery_images` VALUES (1,1,'gallery/kbm_1.png','Kegiatan Belajar Mengajar','2026-06-20 23:40:43','2026-06-22 06:56:06'),(2,1,'gallery/kbm_2.png','Kegiatan Belajar Mengajar','2026-06-20 23:40:43','2026-06-22 06:56:06'),(3,1,'gallery/kbm_3.png','Kegiatan Belajar Mengajar','2026-06-20 23:40:43','2026-06-22 06:56:06'),(4,2,'gallery/upacara.png','Upacara Bendera','2026-06-20 23:40:43','2026-06-21 08:51:41'),(5,2,'https://plus.unsplash.com/premium_photo-1670689708086-88f7c6c2c8d7?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=800','Upacara Bendera','2026-06-20 23:40:43','2026-06-22 06:56:06'),(6,2,'https://images.unsplash.com/photo-1597004455855-f2694b29bb80?auto=format&fit=crop&w=800&q=80','Upacara Bendera','2026-06-20 23:40:43','2026-06-22 06:56:06'),(7,3,'gallery/ekskul_1.png','Ekstrakurikuler','2026-06-20 23:40:43','2026-06-22 06:56:06'),(8,3,'gallery/ekskul_2.png','Ekstrakurikuler','2026-06-20 23:40:43','2026-06-22 06:56:06'),(9,3,'gallery/ekskul_3.png','Ekstrakurikuler','2026-06-20 23:40:43','2026-06-22 06:56:06'),(10,4,'gallery/perpus_1.png','Perpustakaan Sekolah','2026-06-20 23:40:43','2026-06-22 06:56:06'),(11,4,'https://images.unsplash.com/photo-1507842217343-583bb7270b66?auto=format&fit=crop&w=800&q=80','Perpustakaan Sekolah','2026-06-20 23:40:43','2026-06-20 23:40:43'),(12,4,'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?auto=format&fit=crop&w=800&q=80','Perpustakaan Sekolah','2026-06-20 23:40:43','2026-06-20 23:40:43'),(13,5,'gallery/olahraga_1.png','Lapangan Olahraga','2026-06-20 23:40:43','2026-06-22 06:56:06'),(14,5,'gallery/olahraga_2.png','Lapangan Olahraga','2026-06-20 23:40:43','2026-06-22 06:56:06'),(15,5,'https://images.unsplash.com/photo-1598802213955-5610439dd5cc?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=800','Lapangan Olahraga','2026-06-20 23:40:43','2026-06-22 06:56:06'),(16,6,'gallery/taman_1.png','Taman Sekolah','2026-06-20 23:40:43','2026-06-22 06:56:06'),(17,6,'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?auto=format&fit=crop&w=800&q=80','Taman Sekolah','2026-06-20 23:40:43','2026-06-20 23:40:43'),(18,6,'https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?auto=format&fit=crop&w=800&q=80','Taman Sekolah','2026-06-20 23:40:43','2026-06-20 23:40:43');
/*!40000 ALTER TABLE `gallery_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inquiries`
--

DROP TABLE IF EXISTS `inquiries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inquiries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `parent_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inquiries`
--

LOCK TABLES `inquiries` WRITE;
/*!40000 ALTER TABLE `inquiries` DISABLE KEYS */;
/*!40000 ALTER TABLE `inquiries` ENABLE KEYS */;
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
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_06_19_214750_add_role_to_users_table',1),(5,'2026_06_19_214750_create_news_table',1),(6,'2026_06_19_214751_create_galleries_table',1),(7,'2026_06_19_214751_create_gallery_images_table',1),(8,'2026_06_19_214751_create_school_profile_table',1),(9,'2026_06_19_214751_create_site_settings_table',1),(10,'2026_06_21_061509_add_name_to_school_profile_table',2),(11,'2026_06_21_155611_create_notifications_table',3),(12,'2026_06_21_162550_create_inquiries_table',4),(13,'2026_06_23_073258_create_achievements_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('draft','published') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `news_slug_unique` (`slug`),
  KEY `news_user_id_foreign` (`user_id`),
  CONSTRAINT `news_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,1,'Lomba Sains Antar SD Se-Provinsi Berhasil Digelar','lomba-sains-antar-sd-se-kota-berhasil-digelar-tyyXA','Sekolah kami berhasil menyelenggarakan lomba sains tingkat kota yang diikuti oleh lebih dari 50 sekolah dasar. Para siswa menunjukkan kreativitas dan inovasi melalui berbagai eksperimen menarik.','news/lomba_sains.png','published','2026-03-11 17:00:00','2026-06-20 09:24:12','2026-06-22 06:49:38'),(2,1,'Tim Basket Sekolah Juara Turnamen Regional','tim-basket-sekolah-juara-turnamen-regional-5oF0p','Tim basket putra sekolah kami berhasil meraih juara pertama dalam turnamen basket tingkat regional setelah mengalahkan tim lawan dengan skor tipis di babak final.','news/basket_juara.png','published','2026-02-24 17:00:00','2026-06-20 09:24:12','2026-06-22 06:49:38'),(3,1,'Festival Budaya Sekolah Tampilkan Keragaman Nusantara','festival-budaya-sekolah-tampilkan-keragaman-nusantara-uFvLb','Festival budaya tahunan sekolah menampilkan berbagai pertunjukan seni, makanan tradisional, dan pameran dari seluruh kelompok siswa yang mewakili keragaman budaya Indonesia.','news/festival_budaya.png','published','2026-01-29 17:00:00','2026-06-20 09:24:12','2026-06-22 06:49:38'),(4,1,'Klub Lingkungan Adakan Aksi Bersih-Bersih Sekolah','klub-lingkungan-adakan-aksi-bersih-bersih-sekolah-q1Axt','Anggota klub lingkungan sekolah mengorganisir kegiatan bersih-bersih yang sukses di sekitar area sekolah sebagai bagian dari program peduli lingkungan.','news/bersih_sekolah.png','published','2026-03-04 17:00:00','2026-06-20 09:24:12','2026-06-22 06:49:38'),(5,1,'Perpustakaan Baru Resmi Dibuka untuk Siswa','perpustakaan-baru-resmi-dibuka-untuk-siswa-nGsOM','Sekolah meresmikan sayap perpustakaan baru yang dilengkapi dengan koleksi buku digital, ruang baca modern, dan area kolaborasi untuk mendukung kegiatan belajar siswa.','news/perpustakaan_baru.png','published','2026-02-09 17:00:00','2026-06-20 09:24:12','2026-06-22 06:49:38');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
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
INSERT INTO `notifications` VALUES ('e8c6a2af-9ad3-4e6b-9380-4571c6fd6702','App\\Notifications\\SystemNotification','App\\Models\\User',1,'{\"title\":\"Selamat Datang!\",\"message\":\"Sistem notifikasi Anda kini telah aktif dan terintegrasi penuh.\"}',NULL,'2026-06-21 08:57:46','2026-06-21 08:57:46');
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
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school_profile`
--

DROP TABLE IF EXISTS `school_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `school_profile` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school_profile`
--

LOCK TABLES `school_profile` WRITE;
/*!40000 ALTER TABLE `school_profile` DISABLE KEYS */;
INSERT INTO `school_profile` VALUES (1,'SDN NGADIRGO 02','SDN NGADIRGO 02 adalah sekolah dasar unggulan yang berkomitmen membentuk generasi cerdas, berkarakter, dan berprestasi melalui pendidikan holistik berbasis nilai-nilai Pancasila.','Jl. Ngadirgo RT 01 RW 08, Kelurahan Ngadirgo, Kecamatan Mijen, Kota Semarang','081332730489','sdnngadirgo02mijen@gmail.com',NULL,'2026-06-20 11:26:09','2026-06-22 05:44:06');
/*!40000 ALTER TABLE `school_profile` ENABLE KEYS */;
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
INSERT INTO `sessions` VALUES ('0KfuU1w8ZeImWJPkr3ZXauuCz1xBDfusIHzoiHYE',1,'127.0.0.1','Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1','eyJfdG9rZW4iOiJqNllQUTl1ZFJwTHg2Vlp4N29CZklJYVpIeTBuUmRmSnFGY25GN3YwIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvZGFzaGJvYXJkIiwicm91dGUiOiJhZG1pbi5kYXNoYm9hcmQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MX0=',1783259394),('9XyqUQgIQenkH8OLctLxU5kuNSvAuxvSrWQ3MBmM',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiIwNnp4V1BhdFpqTW16REZMR3Z5bm9maXFMaGhZYTNJUHFyRXpCMTJiIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvcHJlc3Rhc2kiLCJyb3V0ZSI6ImFkbWluLnByZXN0YXNpLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjF9',1782201902),('gqvgYWBuOL6K7iIJyprPyzWP24J7BDzRNhtSScmA',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJKSUhySWtYV0E5Q21mVDUyRUR0RWNibUZQMFNMRkhGSmxKam5uVTlqIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjF9',1783343949),('TfofgXvpexVEL0uo4WW9uVhd9JbzVdj2ZV3MgGxH',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJudXZ4NEZHdXV6TngzQk03elhIajI0MFVNN3l1V0xXUzVGTDg2OW96IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvZGFzaGJvYXJkIiwicm91dGUiOiJhZG1pbi5kYXNoYm9hcmQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MX0=',1782235857);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_settings`
--

DROP TABLE IF EXISTS `site_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `site_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `site_settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_settings`
--

LOCK TABLES `site_settings` WRITE;
/*!40000 ALTER TABLE `site_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `site_settings` ENABLE KEYS */;
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
  `role` enum('super_admin','staf') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'staf',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Super Admin','admin@sd.sch.id','super_admin',NULL,'$2y$12$jtr5.JFt80yxK1kSYjyx2OS0.2S7sg.x6kaD5umVawdfWcpYPD2jy',NULL,'2026-06-20 02:05:56','2026-06-20 02:05:56'),(2,'Staf IT','staf@admin.com','staf',NULL,'$2y$12$g9uiHAVoUK10gM.N6ykDQOCV3UubOwFFHoocaRwrXvzyD5xVb826.',NULL,'2026-06-21 08:53:09','2026-06-21 08:53:09');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-07-07 21:03:52
