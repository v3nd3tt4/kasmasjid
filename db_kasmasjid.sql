/*
SQLyog Ultimate v10.3 
MySQL - 8.0.30 : Database - db_kasmasjid
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_kasmasjid` /*!40100 DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `db_kasmasjid`;

/*Table structure for table `companies` */

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `companies` */

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

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_09_26_155210_create_companies_table',1),(6,'2023_09_27_135952_create_profil_masjid_table',1),(7,'2023_09_28_124228_create_pemasukans_table',1),(8,'2023_09_30_132143_create_pengeluarans_table',1),(9,'2023_09_30_135514_create_penggunas_table',1),(10,'2023_09_30_162125_add_remember_token_to_users_table',1),(11,'2023_10_01_121344_create_pemasukan_view',1),(12,'2023_10_01_140451_create_pengeluaran_view',1);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

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

/*Table structure for table `tb_pemasukan` */

DROP TABLE IF EXISTS `tb_pemasukan`;

CREATE TABLE `tb_pemasukan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_pemasukan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pemasukan` date NOT NULL,
  `nominal_pemasukan` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_pemasukan` */

insert  into `tb_pemasukan`(`id`,`nama_pemasukan`,`tanggal_pemasukan`,`nominal_pemasukan`,`created_at`,`updated_at`) values (1,'Hamba Allah','2024-10-13',2500000,'2024-10-13 06:30:13','2024-10-13 06:30:13'),(2,'Quibusdam quos unde','2024-12-10',73000,'2024-10-13 06:30:48','2024-10-13 06:30:48');

/*Table structure for table `tb_pengeluaran` */

DROP TABLE IF EXISTS `tb_pengeluaran`;

CREATE TABLE `tb_pengeluaran` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_pengeluaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pengeluaran` date NOT NULL,
  `nominal_pengeluaran` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_pengeluaran` */

insert  into `tb_pengeluaran`(`id`,`nama_pengeluaran`,`tanggal_pengeluaran`,`nominal_pengeluaran`,`created_at`,`updated_at`) values (1,'Tagihan Air','2024-10-13',150000,'2024-10-13 06:31:07','2024-10-13 06:31:07');

/*Table structure for table `tb_profil_masjid` */

DROP TABLE IF EXISTS `tb_profil_masjid`;

CREATE TABLE `tb_profil_masjid` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_masjid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_masjid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_profil_masjid` */

insert  into `tb_profil_masjid`(`id`,`nama_masjid`,`alamat_masjid`,`created_at`,`updated_at`) values (1,'AL-Munawarrah','Banjarbaru','2024-10-13 14:18:43',NULL);

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','operator') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id`,`nama`,`username`,`password`,`level`,`created_at`,`updated_at`,`remember_token`) values (1,'Okta Pilopa','pilopa','$2y$10$MDSzugCk28LqYnYBfe3MWutYTcXUJf0XLxj06eNYJwswTMHN2Qq5W','admin','2024-10-13 14:19:08',NULL,NULL),(2,'Vendetta','v3nd3tt4','$2y$10$mgLOyzG4ej/5lJMmu30G5efD/WtJo.OtKtxJFBThuCR0HSLDB7bSa','admin','2024-10-13 06:29:44','2024-10-13 06:29:44',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*Table structure for table `pemasukanview` */

DROP TABLE IF EXISTS `pemasukanview`;

/*!50001 DROP VIEW IF EXISTS `pemasukanview` */;
/*!50001 DROP TABLE IF EXISTS `pemasukanview` */;

/*!50001 CREATE TABLE  `pemasukanview`(
 `pemasukan_januari` decimal(32,0) ,
 `pemasukan_februari` decimal(32,0) ,
 `pemasukan_maret` decimal(32,0) ,
 `pemasukan_april` decimal(32,0) ,
 `pemasukan_mei` decimal(32,0) ,
 `pemasukan_juni` decimal(32,0) ,
 `pemasukan_juli` decimal(32,0) ,
 `pemasukan_agustus` decimal(32,0) ,
 `pemasukan_september` decimal(32,0) ,
 `pemasukan_oktober` decimal(32,0) ,
 `pemasukan_november` decimal(32,0) ,
 `pemasukan_desember` decimal(32,0) ,
 `tahun` int 
)*/;

/*Table structure for table `pengeluaranview` */

DROP TABLE IF EXISTS `pengeluaranview`;

/*!50001 DROP VIEW IF EXISTS `pengeluaranview` */;
/*!50001 DROP TABLE IF EXISTS `pengeluaranview` */;

/*!50001 CREATE TABLE  `pengeluaranview`(
 `pengeluaran_januari` decimal(32,0) ,
 `pengeluaran_februari` decimal(32,0) ,
 `pengeluaran_maret` decimal(32,0) ,
 `pengeluaran_april` decimal(32,0) ,
 `pengeluaran_mei` decimal(32,0) ,
 `pengeluaran_juni` decimal(32,0) ,
 `pengeluaran_juli` decimal(32,0) ,
 `pengeluaran_agustus` decimal(32,0) ,
 `pengeluaran_september` decimal(32,0) ,
 `pengeluaran_oktober` decimal(32,0) ,
 `pengeluaran_november` decimal(32,0) ,
 `pengeluaran_desember` decimal(32,0) ,
 `tahun` int 
)*/;

/*View structure for view pemasukanview */

/*!50001 DROP TABLE IF EXISTS `pemasukanview` */;
/*!50001 DROP VIEW IF EXISTS `pemasukanview` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pemasukanview` AS select (select coalesce(sum(`tb_pemasukan`.`nominal_pemasukan`),0) from `tb_pemasukan` where (month(`tb_pemasukan`.`tanggal_pemasukan`) = '01')) AS `pemasukan_januari`,(select coalesce(sum(`tb_pemasukan`.`nominal_pemasukan`),0) from `tb_pemasukan` where (month(`tb_pemasukan`.`tanggal_pemasukan`) = '02')) AS `pemasukan_februari`,(select coalesce(sum(`tb_pemasukan`.`nominal_pemasukan`),0) from `tb_pemasukan` where (month(`tb_pemasukan`.`tanggal_pemasukan`) = '03')) AS `pemasukan_maret`,(select coalesce(sum(`tb_pemasukan`.`nominal_pemasukan`),0) from `tb_pemasukan` where (month(`tb_pemasukan`.`tanggal_pemasukan`) = '04')) AS `pemasukan_april`,(select coalesce(sum(`tb_pemasukan`.`nominal_pemasukan`),0) from `tb_pemasukan` where (month(`tb_pemasukan`.`tanggal_pemasukan`) = '05')) AS `pemasukan_mei`,(select coalesce(sum(`tb_pemasukan`.`nominal_pemasukan`),0) from `tb_pemasukan` where (month(`tb_pemasukan`.`tanggal_pemasukan`) = '06')) AS `pemasukan_juni`,(select coalesce(sum(`tb_pemasukan`.`nominal_pemasukan`),0) from `tb_pemasukan` where (month(`tb_pemasukan`.`tanggal_pemasukan`) = '07')) AS `pemasukan_juli`,(select coalesce(sum(`tb_pemasukan`.`nominal_pemasukan`),0) from `tb_pemasukan` where (month(`tb_pemasukan`.`tanggal_pemasukan`) = '08')) AS `pemasukan_agustus`,(select coalesce(sum(`tb_pemasukan`.`nominal_pemasukan`),0) from `tb_pemasukan` where (month(`tb_pemasukan`.`tanggal_pemasukan`) = '09')) AS `pemasukan_september`,(select coalesce(sum(`tb_pemasukan`.`nominal_pemasukan`),0) from `tb_pemasukan` where (month(`tb_pemasukan`.`tanggal_pemasukan`) = '10')) AS `pemasukan_oktober`,(select coalesce(sum(`tb_pemasukan`.`nominal_pemasukan`),0) from `tb_pemasukan` where (month(`tb_pemasukan`.`tanggal_pemasukan`) = '11')) AS `pemasukan_november`,(select coalesce(sum(`tb_pemasukan`.`nominal_pemasukan`),0) from `tb_pemasukan` where (month(`tb_pemasukan`.`tanggal_pemasukan`) = '12')) AS `pemasukan_desember`,year(`tb_pemasukan`.`tanggal_pemasukan`) AS `tahun` from `tb_pemasukan` group by year(`tb_pemasukan`.`tanggal_pemasukan`) */;

/*View structure for view pengeluaranview */

/*!50001 DROP TABLE IF EXISTS `pengeluaranview` */;
/*!50001 DROP VIEW IF EXISTS `pengeluaranview` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pengeluaranview` AS select (select coalesce(sum(`tb_pengeluaran`.`nominal_pengeluaran`),0) from `tb_pengeluaran` where (month(`tb_pengeluaran`.`tanggal_pengeluaran`) = '01')) AS `pengeluaran_januari`,(select coalesce(sum(`tb_pengeluaran`.`nominal_pengeluaran`),0) from `tb_pengeluaran` where (month(`tb_pengeluaran`.`tanggal_pengeluaran`) = '02')) AS `pengeluaran_februari`,(select coalesce(sum(`tb_pengeluaran`.`nominal_pengeluaran`),0) from `tb_pengeluaran` where (month(`tb_pengeluaran`.`tanggal_pengeluaran`) = '03')) AS `pengeluaran_maret`,(select coalesce(sum(`tb_pengeluaran`.`nominal_pengeluaran`),0) from `tb_pengeluaran` where (month(`tb_pengeluaran`.`tanggal_pengeluaran`) = '04')) AS `pengeluaran_april`,(select coalesce(sum(`tb_pengeluaran`.`nominal_pengeluaran`),0) from `tb_pengeluaran` where (month(`tb_pengeluaran`.`tanggal_pengeluaran`) = '05')) AS `pengeluaran_mei`,(select coalesce(sum(`tb_pengeluaran`.`nominal_pengeluaran`),0) from `tb_pengeluaran` where (month(`tb_pengeluaran`.`tanggal_pengeluaran`) = '06')) AS `pengeluaran_juni`,(select coalesce(sum(`tb_pengeluaran`.`nominal_pengeluaran`),0) from `tb_pengeluaran` where (month(`tb_pengeluaran`.`tanggal_pengeluaran`) = '07')) AS `pengeluaran_juli`,(select coalesce(sum(`tb_pengeluaran`.`nominal_pengeluaran`),0) from `tb_pengeluaran` where (month(`tb_pengeluaran`.`tanggal_pengeluaran`) = '08')) AS `pengeluaran_agustus`,(select coalesce(sum(`tb_pengeluaran`.`nominal_pengeluaran`),0) from `tb_pengeluaran` where (month(`tb_pengeluaran`.`tanggal_pengeluaran`) = '09')) AS `pengeluaran_september`,(select coalesce(sum(`tb_pengeluaran`.`nominal_pengeluaran`),0) from `tb_pengeluaran` where (month(`tb_pengeluaran`.`tanggal_pengeluaran`) = '10')) AS `pengeluaran_oktober`,(select coalesce(sum(`tb_pengeluaran`.`nominal_pengeluaran`),0) from `tb_pengeluaran` where (month(`tb_pengeluaran`.`tanggal_pengeluaran`) = '11')) AS `pengeluaran_november`,(select coalesce(sum(`tb_pengeluaran`.`nominal_pengeluaran`),0) from `tb_pengeluaran` where (month(`tb_pengeluaran`.`tanggal_pengeluaran`) = '12')) AS `pengeluaran_desember`,year(`tb_pengeluaran`.`tanggal_pengeluaran`) AS `tahun` from `tb_pengeluaran` group by year(`tb_pengeluaran`.`tanggal_pengeluaran`) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
