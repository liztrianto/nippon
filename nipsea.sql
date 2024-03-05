/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 8.0.30 : Database - nipsea
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`nipsea` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `nipsea`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

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

/*Data for the table `failed_jobs` */

/*Table structure for table `m_departemen` */

DROP TABLE IF EXISTS `m_departemen`;

CREATE TABLE `m_departemen` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nama_departemen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_departemen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `m_departemen` */

insert  into `m_departemen`(`id`,`nama_departemen`,`kode_departemen`,`status`,`created_at`,`updated_at`) values 
(1,'Marketing','MKT',1,'2023-12-18 08:26:24','2023-12-18 08:26:24'),
(2,'IT','IT',1,'2023-12-18 08:26:35','2023-12-18 08:26:35'),
(3,'Sales','SLS',1,'2023-12-18 08:26:49','2023-12-18 08:26:49'),
(4,'Manajemen','MJM',1,'2023-12-20 08:22:43','2023-12-20 08:22:43');

/*Table structure for table `m_depo` */

DROP TABLE IF EXISTS `m_depo`;

CREATE TABLE `m_depo` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nama_depo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_depo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_id` int DEFAULT NULL,
  `kadepo_id` int unsigned DEFAULT NULL,
  `status` smallint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `m_depo` */

insert  into `m_depo`(`id`,`nama_depo`,`kode_depo`,`manager_id`,`kadepo_id`,`status`,`created_at`,`updated_at`) values 
(1,'NPC Gresik','GK',5,4,1,'2023-12-18 08:28:44','2024-01-03 22:31:44'),
(2,'NPC Kediri','KD',NULL,NULL,1,'2023-12-20 08:21:55','2024-01-03 10:37:05'),
(3,'NPC Madura','MU',NULL,NULL,1,'2024-01-03 10:53:25','2024-01-03 10:53:25'),
(4,'NPC Malang','MG',NULL,NULL,1,'2024-01-03 10:53:49','2024-01-03 10:53:49'),
(5,'NPC Jember','JR',NULL,NULL,1,'2024-01-03 10:54:18','2024-01-03 10:54:18'),
(6,'NPC Kupang','KG',NULL,NULL,1,'2024-01-03 10:54:45','2024-01-03 10:54:45'),
(7,'NPC Ambon','AB',NULL,NULL,1,'2024-01-03 10:54:59','2024-01-03 10:54:59'),
(8,'NPC Bali','BI',NULL,NULL,1,'2024-01-03 10:55:16','2024-01-03 10:55:16'),
(9,'NPC Maumere','MR',NULL,NULL,1,'2024-01-03 10:55:34','2024-01-03 10:55:34'),
(10,'NPC Lombok','LM',NULL,NULL,1,'2024-01-03 10:55:49','2024-01-03 10:55:49'),
(11,'NPC Manado','LM',NULL,NULL,1,'2024-01-03 10:56:11','2024-01-03 10:56:11'),
(12,'NPC Samarinda','SD',NULL,NULL,1,'2024-01-03 10:56:29','2024-01-03 10:56:40'),
(13,'NPC Banjarmasin','BS',NULL,NULL,1,'2024-01-03 10:57:08','2024-01-03 10:57:08'),
(14,'NPC Sampit','SA',NULL,NULL,1,'2024-01-03 10:57:40','2024-01-03 10:57:40'),
(15,'NPC Gorontalo','GT',NULL,NULL,1,'2024-01-03 10:57:53','2024-01-03 10:57:53'),
(16,'NPC Makasar','UP',NULL,NULL,1,'2024-01-03 10:58:08','2024-01-03 10:58:08'),
(17,'NPC Pinrang','PN',NULL,NULL,1,'2024-01-03 10:58:26','2024-01-03 10:58:26'),
(18,'NPC Bone','BO',NULL,NULL,1,'2024-01-03 10:58:49','2024-01-03 10:58:49'),
(19,'NPC Kendari','KN',NULL,NULL,1,'2024-01-03 10:59:13','2024-01-03 10:59:13'),
(20,'NPC Palu','PU',NULL,NULL,1,'2024-01-03 10:59:28','2024-01-03 10:59:28');

/*Table structure for table `m_jabatan` */

DROP TABLE IF EXISTS `m_jabatan`;

CREATE TABLE `m_jabatan` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `dept_id` int NOT NULL,
  `jabatan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `m_jabatan` */

insert  into `m_jabatan`(`id`,`dept_id`,`jabatan`,`status`,`created_at`,`updated_at`) values 
(22,2,'Staff',1,'2024-01-04 23:17:34','2024-01-04 23:27:18'),
(23,4,'Manager',1,'2024-01-04 23:25:05','2024-01-04 23:25:05'),
(24,3,'Sales',1,'2024-01-04 23:28:30','2024-01-04 23:28:30'),
(25,3,'SPG',1,'2024-01-04 23:28:48','2024-01-04 23:28:48'),
(26,3,'Supervisor',1,'2024-01-04 23:29:06','2024-01-04 23:29:06'),
(27,4,'Kepala Depo',1,'2024-01-04 23:29:57','2024-01-04 23:29:57'),
(28,4,'Sekretaris',1,'2024-01-04 23:30:26','2024-01-04 23:30:26'),
(29,1,'Staff',1,'2024-01-04 23:30:49','2024-01-04 23:30:49'),
(30,1,'SENIOR MARKETING ADMIN',1,'2024-01-08 14:50:39','2024-01-08 14:50:39');

/*Table structure for table `m_toko` */

DROP TABLE IF EXISTS `m_toko`;

CREATE TABLE `m_toko` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `kode_sap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_toko` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `depo_id` int NOT NULL,
  `kota` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pemilik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `omset` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `m_toko` */

insert  into `m_toko`(`id`,`kode_sap`,`nama_toko`,`alamat`,`depo_id`,`kota`,`nama_pemilik`,`no_telp`,`omset`,`status`,`created_at`,`updated_at`) values 
(1,'600996','Bumi Jaya','Jl. Demak Surabaya',1,'SURABAYA','Hendra','031 295 2700',NULL,1,'2023-12-18 08:25:42','2023-12-20 02:53:25'),
(2,'256235','Yan Bangunan','Gresik',1,'Gresik','Haris','1258841',NULL,1,'2023-12-20 05:57:37','2023-12-20 05:57:37');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_reset_tokens_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2023_12_18_023836_create_depos_table',2),
(6,'2023_12_18_023918_create_departemens_table',2),
(7,'2023_12_18_023939_create_tokos_table',2),
(8,'2023_12_18_034552_create_signboards_table',3),
(9,'2023_12_18_093237_create_permission_tables',4);

/*Table structure for table `model_has_permissions` */

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_permissions` */

insert  into `model_has_permissions`(`permission_id`,`model_type`,`model_id`) values 
(3,'App\\Models\\User',2),
(3,'App\\Models\\User',16),
(3,'App\\Models\\User',18);

/*Table structure for table `model_has_roles` */

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_roles` */

insert  into `model_has_roles`(`role_id`,`model_type`,`model_id`) values 
(1,'App\\Models\\User',1),
(2,'App\\Models\\User',5);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values 
(1,'master-data','web','2023-12-18 14:35:19','2023-12-18 14:35:19'),
(2,'approval-signboard','web','2023-12-18 14:38:27','2023-12-18 14:38:27'),
(3,'signboard','web','2023-12-20 02:40:45','2023-12-20 02:40:45');

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

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

/*Data for the table `personal_access_tokens` */

/*Table structure for table `role_has_permissions` */

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_has_permissions` */

insert  into `role_has_permissions`(`permission_id`,`role_id`) values 
(1,1),
(2,1),
(3,1),
(2,2);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values 
(1,'Administrator','web','2023-12-18 14:46:06','2023-12-18 14:46:06'),
(2,'Manajemen','web','2023-12-19 01:51:07','2023-12-19 01:51:07'),
(3,'Marketing','web','2023-12-20 01:17:21','2023-12-20 01:17:21'),
(4,'Sales','web','2023-12-20 02:41:55','2023-12-20 02:41:55'),
(5,'PIC','web','2023-12-20 02:42:13','2023-12-20 02:42:13'),
(6,'Kepala Depo','web','2024-01-03 10:38:18','2024-01-03 10:38:18');

/*Table structure for table `signboards` */

DROP TABLE IF EXISTS `signboards`;

CREATE TABLE `signboards` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `no_document` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `toko_id` int unsigned DEFAULT NULL,
  `pemohon_id` int DEFAULT NULL,
  `depo_id` int unsigned DEFAULT NULL,
  `kadepo_id` int unsigned DEFAULT NULL,
  `shop_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `omset` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_id` int unsigned DEFAULT NULL,
  `pajak_reklame` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `jenis_pengajuan` int DEFAULT NULL,
  `konsep_branding` int DEFAULT NULL,
  `design` int DEFAULT NULL,
  `sisi` int DEFAULT NULL,
  `panjang` int DEFAULT NULL,
  `lebar` int DEFAULT NULL,
  `pengiriman` text COLLATE utf8mb4_unicode_ci,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `upload_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approve` smallint DEFAULT NULL,
  `catatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_approve` datetime DEFAULT NULL,
  `created_by` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `signboards` */

insert  into `signboards`(`id`,`no_document`,`toko_id`,`pemohon_id`,`depo_id`,`kadepo_id`,`shop_size`,`omset`,`sales`,`sales_id`,`pajak_reklame`,`tanggal_pengajuan`,`jenis_pengajuan`,`konsep_branding`,`design`,`sisi`,`panjang`,`lebar`,`pengiriman`,`alamat`,`upload_file`,`upload_foto`,`approve`,`catatan`,`tanggal_approve`,`created_by`,`created_at`,`updated_at`) values 
(2,'PENG-SBY/2020/II/0003',1,NULL,NULL,4,'14','23542135',NULL,3,'14125151','2023-12-20',1,2,1,1,5,NULL,'Pengiriman Dari Depo',NULL,NULL,NULL,0,NULL,'2024-01-05 20:24:25',NULL,'2023-12-20 02:54:05','2024-01-05 20:24:25'),
(3,'PENG-SBY/2020/II/0003',2,NULL,NULL,4,'14','23542135',NULL,3,'14125151','2023-12-20',1,1,2,1,5,3,'Pengiriman Dari Depo',NULL,NULL,NULL,1,NULL,'2024-01-08 14:43:23',NULL,'2023-12-20 05:58:30','2024-01-08 14:43:23'),
(8,'SB-SBY/2023/XII/0005',1,NULL,NULL,4,'14','23542135',NULL,NULL,'14125151','2023-12-26',2,1,2,1,5,3,'Pengiriman Dari Depo',NULL,'SB-SBY-2023-XII-0005.pdf','SB-SBY-2023-XII-0005.jpg',2,'omset kurang','2024-01-08 14:44:08',NULL,'2023-12-26 03:32:10','2024-01-08 14:44:08'),
(9,'SB-SBY/2023/XII/0006',2,NULL,NULL,4,'14','23542135',NULL,3,'14125151','2023-12-26',1,2,5,1,5,3,'Pengiriman Dari Depo',NULL,'SB-SBY-2023-XII-0006.pdf','SB-SBY-2023-XII-0006.png',0,NULL,'2023-12-27 10:40:27',NULL,'2023-12-26 05:54:31','2024-01-03 14:14:35'),
(10,'SB-SBY/2023/XII/0007',1,NULL,NULL,4,'14','23542135',NULL,3,'14125151','2023-12-26',2,2,1,2,5,3,'Pengiriman Dari Depo',NULL,'SB-SBY-2023-XII-0007.png','SB-SBY-2023-XII-0007.png',0,NULL,'2024-01-05 21:17:02',NULL,'2023-12-27 10:36:38','2024-01-05 21:17:02'),
(11,'SB-GK/2024/I/0001',1,NULL,NULL,4,'14','23542135',NULL,3,'14125151','2024-01-11',1,1,1,1,5,3,'Pengiriman Dari Depo',NULL,NULL,NULL,0,NULL,NULL,NULL,'2024-01-08 09:00:59','2024-01-08 09:00:59'),
(12,'SB-GK/2024/I/0001',2,NULL,NULL,4,'12','23525','Ainun',NULL,'124125125','2024-01-10',1,2,1,1,5,6,'depo',NULL,NULL,NULL,1,NULL,'2024-01-09 08:54:00',18,'2024-01-09 08:52:43','2024-01-09 08:54:00');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_id` int unsigned DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depo_id` int unsigned DEFAULT NULL,
  `dept_id` int unsigned DEFAULT NULL,
  `atasan_id` int unsigned DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` smallint DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_nik_unique` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`nik`,`username`,`email`,`email_verified_at`,`no_telp`,`password`,`jabatan_id`,`jabatan`,`depo_id`,`dept_id`,`atasan_id`,`image`,`active`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Administrator','000012','admin','admin@gmail.com','2023-12-28 15:02:26','08223553','$2y$12$kkq1TfSe1acHF0bIyQ/wnOaxjtUpEj17E4DT2Rhtihw3Kw.EuszVS',NULL,'IT',1,2,2,'admin.jpg',1,NULL,'2023-12-18 04:49:51','2024-01-08 08:10:48'),
(2,'Liztrianto Pujo Hardhiko','13114','liztrianto.p','liztriant@gmail.com','2023-12-31 12:04:50',NULL,'$2y$12$VlQpvUdWW2EBs6hhWwBpruRQAS4c1masT12qP2Y1bIXXfOmyPiUHm',NULL,'Staff IT',1,2,1,'admin.jpg',1,'1HyvDId1Mmt4hmYEwgrMgdX5MACPAxglZw0PsDlYjuQ7aOvLqnYdZIW5wZu0','2023-12-18 08:28:11','2023-12-31 12:04:50'),
(3,'Ainun Hidayat','1234','ainun.h','ainun.h@mail.com',NULL,NULL,'$2y$12$WwaOCAlM38FskVGK6deG4eC44kQEZMixMxc8xVUWh9iKHi5qcwIgC',NULL,'Sales',1,3,1,NULL,1,NULL,'2023-12-18 08:30:03','2023-12-18 08:30:03'),
(4,'Harijanto Purnawan','10','harijanto','harijanto@nipponpaint-indonesia.com',NULL,NULL,'$2y$12$MnAkULeP8nlTO.dcMuhlteSbSmG3lynWroPThnOTomubhIxg7RPPm',NULL,'Kepala Depo',1,3,NULL,NULL,1,NULL,'2023-12-18 08:31:38','2023-12-18 08:31:38'),
(5,'Manajemen','0001','manajemen','manajemen@mail.com','2023-12-28 15:01:50',NULL,'$2y$12$SYa9owzi/4spEWEe4kIu6.LVK9EATaabE61w93tGJBtENPH5Ut5FG',NULL,'Manager',1,2,NULL,NULL,1,NULL,'2023-12-19 01:50:01','2023-12-19 01:50:01'),
(14,'Kepala Depo Gresik','14141',NULL,'kadepo-gresik@gmail.com',NULL,'1241241','$2y$12$UI3.exy6Mpgp73p5V39zuOYajE6G5VrAsnm923hsnFipsCg4tvCvq',22,NULL,1,2,NULL,NULL,1,NULL,'2024-01-05 05:07:26','2024-01-05 05:07:26'),
(15,'Pujo','236236',NULL,'liztriantz@gmail.com',NULL,'125215','$2y$12$9b3vDQMy0HuaaEMuNnpAPeAQWR.vRS6gX1zT/yNHG9.TJlpmc3Mby',22,NULL,1,2,NULL,NULL,1,NULL,'2024-01-05 09:08:42','2024-01-05 09:08:42'),
(16,'Admin Kediri','143124',NULL,'adminkediri@gmail.com','2024-01-07 10:34:19','124151','$2y$12$6aZVbmfPJW4A896Klxm8pucQl/oabKgKp3LQ6jSFIEtG9dEUwBCbG',29,NULL,2,1,NULL,NULL,1,NULL,'2024-01-07 10:33:51','2024-01-07 10:33:51'),
(17,'Wiwit','005105',NULL,'wiwit@nipponpaint-indonesia.com','2024-01-08 14:56:32','089520044498','$2y$12$r./D44DhpyrSPBm2zhiVLetkqgYiR0Jl7KTUF/EOIl4z42EWNzlnq',30,NULL,1,1,NULL,NULL,1,NULL,'2024-01-08 14:51:03','2024-01-08 14:56:32'),
(18,'Admin Gresik','12412',NULL,'admingresik@gmail.com','2024-01-09 08:39:07','14124','$2y$12$gSZfqHPTHLR4cngjwNu.VeN0OWVz5.1C80Q6Sb8r3ejKUJH4TBTAm',29,NULL,1,1,NULL,NULL,1,NULL,'2024-01-09 08:37:52','2024-01-09 08:37:52');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
