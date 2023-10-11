/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.4.28-MariaDB : Database - db_web2_tipalsyah
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_web2_tipalsyah` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `db_web2_tipalsyah`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `namadepan` varchar(50) NOT NULL,
  `namabelakang` varchar(50) NOT NULL,
  `gender` char(20) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `login` */

insert  into `login`(`id`,`user`,`password`,`namadepan`,`namabelakang`,`gender`,`remember_token`,`role`) values 
(20,'cansa','$2y$10$2lQG1.CIzPZYqizM5jiIYuGwFlvBi.SEbdmFpJ.6/X9tsU5loEH7i','cansa','amaida','male','Q2w3LZo5YuDcmUnLeKzA3UWWJQT9ZAMfdQ094n3EqmCFQT39Kwn2KgDzFYrF',NULL),
(21,'jinan','$2y$10$eNepjNMFdJaLC8jlaaqLB.jLiA6/OXOCYCE50fJbCepBu0NMGIL0C','jinan','naura','male','dOvaIWMFpw8qIHURlcJ6zNYZi8fFnB4YfOAiS0EKFegaczNer0FHhRkmpays',NULL),
(22,'idoy123','$2y$10$IHF5bq.uHeycWdOSt8KaJ.dCwOSOBXwcVo9zgQgWWDj3b8OudiJsO','tipal','syah','female','SS6l0RcHsaCBxKkMlhh6AYQeYOhObDA006PoG5d5sA9pTlWPERqbWULaVYyC',NULL),
(23,'janjijiwa_official','$2y$10$rMGcbWwy2bfLJOX8YSBRJeTEEphDNuv2sDLP8M7KljPw.7csv52MC','janji','jiwa','male','F2ksPiC7f83AI5XJAFWExb0wnWCefCmZu5diREoKjDj6ssqkagLTjFY8SmC5','admin');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2023_08_18_061426_create_genre_table',1),
(6,'2023_08_18_061440_create_cast_table',1),
(7,'2023_08_18_061501_create_profile_table',1),
(8,'2023_08_18_061515_create_film_table',1),
(9,'2023_08_18_061559_create_peran_table',1),
(10,'2023_08_18_061610_create_kritik_table',1),
(11,'2023_09_02_031959_add_remember_token_to_login_table',2),
(12,'2023_09_03_083448_add_reset_token_to_login_table',3),
(13,'2023_09_04_025445_add_reset_token_created_at_to_login',4),
(14,'2023_09_08_081558_create_npm_uts1_table',5),
(15,'2023_09_08_081751_create_npm_uts2_table',5),
(16,'2023_09_08_081829_create_npm_uts3_table',5),
(17,'2023_09_08_083442_create_21312071_uts1_table',6);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

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

/*Data for the table `personal_access_tokens` */

/*Table structure for table `postingan` */

DROP TABLE IF EXISTS `postingan`;

CREATE TABLE `postingan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(60) NOT NULL,
  `harga` varchar(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `jumlah_beli` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jumlah_beli` (`jumlah_beli`),
  CONSTRAINT `postingan_ibfk_1` FOREIGN KEY (`jumlah_beli`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `postingan` */

insert  into `postingan`(`id`,`nama_menu`,`harga`,`deskripsi`,`image`,`jumlah_beli`) values 
(1,'es boba','8.200','enak','storage/images/1696963129.jpg',NULL),
(2,'es kopi susu janda khas kalianda mantap bos','9.000','seger','storage/images/1696984407.jpg',NULL);

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) unsigned DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `alamat_id` int(11) unsigned DEFAULT NULL,
  `jumlah_beli` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_id` (`menu_id`),
  KEY `user_id` (`user_id`),
  KEY `alamat_id` (`alamat_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `postingan` (`id`),
  CONSTRAINT `product_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `login` (`id`),
  CONSTRAINT `product_ibfk_3` FOREIGN KEY (`alamat_id`) REFERENCES `profile` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `product` */

insert  into `product`(`id`,`menu_id`,`user_id`,`alamat_id`,`jumlah_beli`) values 
(1,2,21,6,10),
(5,1,21,6,10);

/*Table structure for table `profile` */

DROP TABLE IF EXISTS `profile`;

CREATE TABLE `profile` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_depan` varchar(30) NOT NULL,
  `nama_belakang` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `profile` */

insert  into `profile`(`id`,`nama_depan`,`nama_belakang`,`tanggal_lahir`,`alamat`,`gender`,`user_id`) values 
(6,'jinan','naura','2023-10-02','kalianda','Perempuan',21);

/*Table structure for table `profile_images` */

DROP TABLE IF EXISTS `profile_images`;

CREATE TABLE `profile_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `image_path` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `profile_images_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `profile_images` */

insert  into `profile_images`(`id`,`user_id`,`image_path`) values 
(6,20,'images/172r07iordoHJpEUG6ELbCGJHmSAvnHiQiCVdBev.jpg'),
(7,21,'images/1TOPf8aDiTxwKdanRKDX0Q8dzVPN0xbuChAfh3aO.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
