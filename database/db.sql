-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for portofolio
CREATE DATABASE IF NOT EXISTS `portofolio` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `portofolio`;

-- Dumping structure for table portofolio.abouts
CREATE TABLE IF NOT EXISTS `abouts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gelar` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` bigint(20) NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT NULL,
  `urutan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portofolio.abouts: ~1 rows (approximately)
DELETE FROM `abouts`;
/*!40000 ALTER TABLE `abouts` DISABLE KEYS */;
INSERT INTO `abouts` (`id`, `nama`, `gambar`, `deskripsi`, `alamat`, `email`, `gelar`, `telp`, `status`, `urutan`, `created_at`, `updated_at`) VALUES
	(10, 'Bintang Febriana', 'DSC06730.jpg', 'Graduate from Informatics Engineering Departement. Experience in the testing field, such as perceptivity, attention to detail and determination. I\'m acurious person,  responsible, and usually work in a team and organization. Strong communication skills for the generation of reports and presentations that appeal to management and key stakeholders, ability to work using manual or automation testing.', 'Cikutra 201', 'bintangfebriana@itenas.ac.id', 'Bachelor of Informatics', 8999451588, 1, 2, '2022-10-06 14:38:15', '2022-10-13 16:23:47');
/*!40000 ALTER TABLE `abouts` ENABLE KEYS */;

-- Dumping structure for table portofolio.education
CREATE TABLE IF NOT EXISTS `education` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai` double(8,2) DEFAULT NULL,
  `mulai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selesai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portofolio.education: ~1 rows (approximately)
DELETE FROM `education`;
/*!40000 ALTER TABLE `education` DISABLE KEYS */;
INSERT INTO `education` (`id`, `instansi`, `jurusan`, `nilai`, `mulai`, `selesai`, `deskripsi`, `status`, `urutan`, `created_at`, `updated_at`) VALUES
	(2, 'Insitut Teknologi Nasional Bandung', 'Teknik Informatika', 3.27, '2016', '2020', 'Graduate with GPA 3.53 from scale 4.\r\n\r\nRecipient of Bawaku Scholarship 2019 and 2020.\r\nLead Assistant of Lab. Object Oriented Programming (Mar 2020 – Aug 2020)\r\nAssistant of Lab. Computer Organization and Architecture (Sep 2019 – Feb 2020)\r\nHead of Organization division HMIF (Feb 2019 - Feb 2020).\r\nAssistant of  Lab. Database Programming (Mar 2019 – Aug 2019)\r\nAssistant of Lab. Object Oriented Programming (Mar 2019 – Aug 2019)\r\nAssistant of Lab. Computer Organization and Architecture (Sep 2018 – Feb 2019)\r\nAssistant of Lab. Basic Programming (Sep 2018 – Feb 2019)\r\nHead of Community Service HMIF (Jul 2018).\r\nHead of Community Service Informatics Departement (Jun 2018).\r\nVice Chairman of Member Representative Body HMIF (Feb 2017 - Feb 2018)', 1, 1, '2022-10-02 14:42:10', '2022-10-12 15:22:27');
/*!40000 ALTER TABLE `education` ENABLE KEYS */;

-- Dumping structure for table portofolio.experiences
CREATE TABLE IF NOT EXISTS `experiences` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `profesi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mulai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selesai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portofolio.experiences: ~3 rows (approximately)
DELETE FROM `experiences`;
/*!40000 ALTER TABLE `experiences` DISABLE KEYS */;
INSERT INTO `experiences` (`id`, `profesi`, `perusahaan`, `mulai`, `selesai`, `jenis`, `urutan`, `status`, `deskripsi`, `created_at`, `updated_at`) VALUES
	(1, 'Quality Assurance', 'Dinas Pariwisata dan Kebudayaan Jawa Barat', '2020', '2021', 2, 2, 1, 'Black box testing Admin and Moblie Smiling West Java, Automation Test Ad min Smiling West Java using Selenium Python and Java and Collaborate with developer and product owner to  stay current on product features and intended functionality.', '2022-10-06 15:06:36', '2022-10-13 15:55:07'),
	(2, 'Quality Assurance Engineer', 'PT Pegadaian Pusat', '2021', '2022', 1, 1, 1, 'Manual Test use tools (Postman, DB postgresql); Testing, re-testing, and coordinating with Software Engineers and Bussines Analyst; Automate Testing using Katalon; Create test cases & test suites; Create Test Case use BDD/Cucumber; Data-Driven Test using katalon; Automation API in Katalon; Connect DB in katalon; Create an Automation Test case with a combination use API (GET, POST, PUT, DELETE) and Get Query(SELECT, INSERT, UPDATE and DELETE); Jira; Ocp Mikroservice', '2022-10-06 15:08:36', '2022-10-13 16:00:45'),
	(3, 'Machine Learning Intern', 'Lembaga Ilmu Pengetahuan Indonesia LIPI', '2019', '2019', 1, 3, 1, 'Integrating three programming languages, python, HTML, and JavaScript. Then deploy the deep learning model, so that it can be operated in website. Use framework flask.', '2022-10-13 15:56:21', '2022-10-13 15:56:21');
/*!40000 ALTER TABLE `experiences` ENABLE KEYS */;

-- Dumping structure for table portofolio.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portofolio.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table portofolio.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portofolio.migrations: ~14 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2022_09_24_121240_create_abouts_table', 1),
	(6, '2022_09_24_121313_create_socialmedia_table', 1),
	(7, '2022_09_24_121329_create_education_table', 1),
	(8, '2022_09_24_121347_create_experiences_table', 1),
	(9, '2022_09_24_121356_create_skills_table', 1),
	(10, '2022_09_24_121411_create_portofolios_table', 1),
	(11, '2022_09_24_121422_create_professions_table', 1),
	(12, '2022_09_24_121439_create_referensis_table', 1),
	(13, '2022_09_25_011954_create_posts_table', 1),
	(14, '2022_09_25_094242_create_products_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table portofolio.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portofolio.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table portofolio.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
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

-- Dumping data for table portofolio.personal_access_tokens: ~0 rows (approximately)
DELETE FROM `personal_access_tokens`;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table portofolio.portofolios
CREATE TABLE IF NOT EXISTS `portofolios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portofolio.portofolios: ~2 rows (approximately)
DELETE FROM `portofolios`;
/*!40000 ALTER TABLE `portofolios` DISABLE KEYS */;
INSERT INTO `portofolios` (`id`, `nama`, `gambar`, `link`, `deskripsi`, `status`, `urutan`, `created_at`, `updated_at`) VALUES
	(3, 'Identification of Plant Disease', '1665069486.png', 'skp', 'Deploy trained models of machine learning training using flask and ajax.\r\nUse tools ; Python, Javascript, Flask, Tensorflow,Html and Keras', 1, 1, '2022-10-06 15:18:06', '2022-10-06 15:18:06'),
	(4, 'Identification of Tea Leaf Disease', '1665069624.jpg', 'dsada', 'Website to identification of Apple Plant Diseases using Resnet 50 Dilated.', 2, 2, '2022-10-06 15:20:24', '2022-10-06 15:20:24');
/*!40000 ALTER TABLE `portofolios` ENABLE KEYS */;

-- Dumping structure for table portofolio.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portofolio.posts: ~2 rows (approximately)
DELETE FROM `posts`;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `title`, `category`, `content`, `image`, `created_at`, `updated_at`) VALUES
	(3, 'sdad', 'cat', 'awasawasawasawasawasawasawasawasawasawasawasawasawasawasawasawasawasawasawasawasawasawasawasawasawasawasawasawasawasawasawasawasawasawasawasawasawas', '1664681852.jpg', '2022-10-01 19:30:56', '2022-10-02 03:37:40'),
	(4, 'll', 'll', 'hfddfgdfhfddfgdfhfddfgdfhfddfgdfhfddfgdfhfddfgdfhfddfgdfhfddfgdfhfddfgdfhfddfgdfhfddfgdfhfddfgdfhfddfgdfhfddfgdfhfddfgdfhfddfgdfhfddfgdfhfddfgdfhfddfgdfhfddfgdf', '1665064520.jpg', '2022-10-06 13:55:20', '2022-10-06 13:55:20');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Dumping structure for table portofolio.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portofolio.products: ~1 rows (approximately)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `detail`, `image`, `created_at`, `updated_at`) VALUES
	(1, 'dsada', 'dasdsad', '20220925094602.jpg', '2022-09-25 09:45:40', '2022-09-25 09:46:02');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table portofolio.professions
CREATE TABLE IF NOT EXISTS `professions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `profesi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portofolio.professions: ~2 rows (approximately)
DELETE FROM `professions`;
/*!40000 ALTER TABLE `professions` DISABLE KEYS */;
INSERT INTO `professions` (`id`, `profesi`, `status`, `urutan`, `created_at`, `updated_at`) VALUES
	(2, 'Quality Assurance Engineer', 1, 1, '2022-10-06 15:21:45', '2022-10-06 15:21:45'),
	(3, 'Machine Learning', 1, 2, '2022-10-13 15:58:27', '2022-10-13 15:58:27');
/*!40000 ALTER TABLE `professions` ENABLE KEYS */;

-- Dumping structure for table portofolio.referensis
CREATE TABLE IF NOT EXISTS `referensis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portofolio.referensis: ~0 rows (approximately)
DELETE FROM `referensis`;
/*!40000 ALTER TABLE `referensis` DISABLE KEYS */;
/*!40000 ALTER TABLE `referensis` ENABLE KEYS */;

-- Dumping structure for table portofolio.skills
CREATE TABLE IF NOT EXISTS `skills` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portofolio.skills: ~21 rows (approximately)
DELETE FROM `skills`;
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
INSERT INTO `skills` (`id`, `nama`, `gambar`, `jenis`, `urutan`, `status`, `created_at`, `updated_at`) VALUES
	(5, 'Katalon Studio', 'Katalon-logo-vector.svg.png', 1, 1, 1, '2022-10-13 15:12:50', '2022-10-13 15:12:50'),
	(6, 'Postman', 'postman-logo-0087CA0D15-seeklogo.com.png', 2, 2, 1, '2022-10-13 15:13:08', '2022-10-13 15:13:08'),
	(7, 'PostgreSql', 'Postgresql_elephant.svg.png', 3, 3, 1, '2022-10-13 15:13:37', '2022-10-13 15:13:37'),
	(8, 'Java', 'java-logo-1.png', 4, 4, 1, '2022-10-13 15:14:07', '2022-10-13 15:14:07'),
	(9, 'Flask', '1280px-Flask_logo.svg.png', 5, 5, 1, '2022-10-13 15:14:21', '2022-10-13 15:14:21'),
	(10, 'MySql', 'MySQL-Logo.wine.png', 6, 6, 1, '2022-10-13 15:14:40', '2022-10-13 15:14:40'),
	(11, 'Selenium', 'Selenium_Logo.png', 7, 7, 1, '2022-10-13 15:14:57', '2022-10-13 15:14:57'),
	(12, 'Tensorflow', '75-753841_tensorflow-logo-transparent-hd-png-download.png', 8, 8, 1, '2022-10-13 15:15:18', '2022-10-13 15:15:18'),
	(13, 'Keras', '1024px-Keras_logo.svg.png', 9, 9, 1, '2022-10-13 15:15:38', '2022-10-13 15:15:38'),
	(14, 'Git', 'Git-Icon-1788C.png', 10, 10, 1, '2022-10-13 15:15:54', '2022-10-13 15:15:54'),
	(15, 'Laravel', '985px-Laravel.svg.png', 11, 11, 1, '2022-10-13 15:16:41', '2022-10-13 15:16:41'),
	(16, 'Jira', 'atlassian-jira-logo-large.png', 12, 12, 1, '2022-10-13 15:17:01', '2022-10-13 15:17:01'),
	(17, 'Yii2', 'yii3_sign.png', 13, 13, 1, '2022-10-13 15:21:21', '2022-10-13 15:21:21'),
	(18, 'JavaScript', 'JavaScript-logo.png', 14, 14, 1, '2022-10-13 15:22:53', '2022-10-13 15:22:53'),
	(19, 'Fast.AI', 'fastai-1.png', 15, 15, 1, '2022-10-13 15:43:13', '2022-10-13 15:43:13'),
	(20, 'Google Colab', 'Google_Colaboratory_SVG_Logo.svg.png', 16, 16, 1, '2022-10-13 15:45:04', '2022-10-13 15:45:04'),
	(21, 'Jupyter Notebook', '1200px-Jupyter_logo.svg.png', 17, 17, 1, '2022-10-13 15:45:24', '2022-10-13 15:45:24'),
	(22, 'Python', '5848152fcef1014c0b5e4967.png', 18, 18, 1, '2022-10-13 15:45:43', '2022-10-13 15:45:43'),
	(23, 'Anaconda', '3571983.png', 19, 19, 1, '2022-10-13 15:46:01', '2022-10-13 15:46:01'),
	(24, 'Laragon', 'laragon-logo-D8819D2A8F-seeklogo.com.png', 20, 20, 1, '2022-10-13 15:49:20', '2022-10-13 15:49:20'),
	(25, 'PHP', 'php-logo-png-transparent-svg-vector-bie-supply-1.png', 21, 21, 1, '2022-10-13 15:49:37', '2022-10-13 15:49:37');
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;

-- Dumping structure for table portofolio.socialmedia
CREATE TABLE IF NOT EXISTS `socialmedia` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portofolio.socialmedia: ~3 rows (approximately)
DELETE FROM `socialmedia`;
/*!40000 ALTER TABLE `socialmedia` DISABLE KEYS */;
INSERT INTO `socialmedia` (`id`, `nama`, `username`, `icon`, `link`, `status`, `urutan`, `created_at`, `updated_at`) VALUES
	(1, 'Instagram', 'bntgfbrn', 'pngtree-instagram-icon-instagram-logo-png-image_3584852.png', 'https://www.instagram.com/bntgfbrn/', 1, 2, '2022-10-06 13:23:11', '2022-10-06 15:01:17'),
	(3, 'Email', 'bintangfebriana', 'gmail-email-logo-png-16.png', 'https://mail.google.com/mail/u/0/?fs=1&to=bintangfebriana@gmail.com&su=Hello%20Bintang%20i%20found%20you%20on%20the%20website&body=&tf=cm', 2, 2, '2022-10-06 15:03:18', '2022-10-06 15:03:18'),
	(4, 'Github', 'bintangitdev', 'github-logo-5F384D0265-seeklogo.com.png', 'https://github.com/bintangitdev', 3, 3, '2022-10-06 15:04:39', '2022-10-06 15:04:39');
/*!40000 ALTER TABLE `socialmedia` ENABLE KEYS */;

-- Dumping structure for table portofolio.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portofolio.users: ~1 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$AkYakp5mqklSae6hI07bk.PGiioIuh.DnWDMcqmwRGCzoTQZSIAs2', NULL, '2022-09-25 01:42:23', '2022-09-25 01:42:23');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
