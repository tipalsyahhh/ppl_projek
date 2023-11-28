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

/*Table structure for table `even` */

DROP TABLE IF EXISTS `even`;

CREATE TABLE `even` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_even` varchar(300) DEFAULT NULL,
  `tanggal_acara` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deskripsi` text DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `harga_tiket` decimal(10,0) DEFAULT NULL,
  `status_even` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `even` */

insert  into `even`(`id`,`nama_even`,`tanggal_acara`,`deskripsi`,`image`,`harga_tiket`,`status_even`) values 
(6,'perayaan malam pergantian tahun','2023-11-28 15:19:06','merayakan malam tahun baru bersama keluarga, sahabat dan pasangan.','images/1701159546.jpg',45000,'berlaku');

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

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
/*Table structure for table `follows` */

DROP TABLE IF EXISTS `follows`;

CREATE TABLE `follows` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `following_user_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `following_user_id` (`following_user_id`),
  CONSTRAINT `follows_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`id`),
  CONSTRAINT `follows_ibfk_2` FOREIGN KEY (`following_user_id`) REFERENCES `login` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `follows` */

insert  into `follows`(`id`,`user_id`,`following_user_id`) values 
(4,21,20),
(6,20,21),
(9,23,27),
(10,20,27),
(11,21,27),
(12,21,23),
(13,23,21);

/*Table structure for table `friendships` */

DROP TABLE IF EXISTS `friendships`;

CREATE TABLE `friendships` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `friend_id` int(11) unsigned DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `friend_id` (`friend_id`),
  CONSTRAINT `friendships_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`id`),
  CONSTRAINT `friendships_ibfk_2` FOREIGN KEY (`friend_id`) REFERENCES `login` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `friendships` */

<<<<<<< HEAD
=======
=======
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
/*Table structure for table `likes` */

DROP TABLE IF EXISTS `likes`;

CREATE TABLE `likes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `like` int(11) unsigned DEFAULT NULL,
  `comentar` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `status_id` (`status_id`),
  CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`id`),
  CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
=======
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
=======
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49

/*Data for the table `likes` */

insert  into `likes`(`id`,`user_id`,`like`,`comentar`,`created_at`,`updated_at`,`status_id`) values 
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
(33,21,1,NULL,'2023-11-08 20:18:22','2023-11-08 20:18:22',9),
(37,21,1,NULL,'2023-11-20 22:07:40','2023-11-20 22:07:40',12),
(38,20,NULL,' umi lelah ya , pasti capek bnget ya banyak kegiatan , semangat umi jaga kesehatan minum fitamin ya istrahat yg cukup keep strong','2023-11-21 00:54:24','2023-11-21 00:54:24',12),
(42,23,NULL,'terimakasih ka telah berkunjung di pantai kedu warna','2023-11-21 09:37:51','2023-11-21 09:37:51',12),
(43,23,NULL,'??','2023-11-21 12:48:45','2023-11-21 12:48:45',12),
(47,21,1,NULL,'2023-11-27 19:58:11','2023-11-27 19:58:11',16);
<<<<<<< HEAD
=======
=======
(2,21,NULL,'keren bang!','2023-10-15 22:16:45','2023-10-15 22:16:45',5),
(17,21,1,NULL,'2023-10-16 01:28:47','2023-10-16 01:28:47',5),
(19,21,NULL,'Saya sangat suka bermalam di hotel tersebut','2023-10-16 01:32:37','2023-10-16 01:32:37',7),
(20,21,1,NULL,'2023-10-16 02:20:41','2023-10-16 02:20:41',8),
(21,21,1,NULL,'2023-10-16 22:41:22','2023-10-16 22:41:22',7),
(22,21,1,NULL,'2023-10-17 02:04:58','2023-10-17 02:04:58',7),
(23,21,1,NULL,'2023-10-17 02:05:02','2023-10-17 02:05:02',8),
(24,21,NULL,'lumayan','2023-10-17 02:07:40','2023-10-17 02:07:40',7),
(25,21,1,NULL,'2023-10-17 05:13:34','2023-10-17 05:13:34',7),
(26,21,1,NULL,'2023-10-17 05:15:48','2023-10-17 05:15:48',5),
(27,21,1,NULL,'2023-10-17 05:16:22','2023-10-17 05:16:22',5),
(28,21,1,NULL,'2023-10-17 05:19:19','2023-10-17 05:19:19',5),
(29,20,NULL,'pelayanan cukup baik dengan harga segitu','2023-10-17 23:45:57','2023-10-17 23:45:57',7),
(30,26,1,NULL,'2023-10-18 22:33:55','2023-10-18 22:33:55',5);
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49

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
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
=======
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
=======
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49

/*Data for the table `login` */

insert  into `login`(`id`,`user`,`password`,`namadepan`,`namabelakang`,`gender`,`remember_token`,`role`) values 
<<<<<<< HEAD
(20,'cansa','$2y$10$2lQG1.CIzPZYqizM5jiIYuGwFlvBi.SEbdmFpJ.6/X9tsU5loEH7i','cansa','amaida','male','xtSAH9OwYIcg06SPriQEf5rzkIThgVlRz6t0965yP5S97cIkmMPdYk43MZfj',NULL),
(21,'jinan_08','$2y$10$mI2DWTc0wO/aigfBFRZldeU3iLBpmlqf5gk8yXIVKmKqIqM/3EjAi','jinan','naura','male','bMQg242camZOOFQm1iyRy8n7W0UYcKnkU8iMqEjWuZK6Q409f64Qdr5CBN0n',NULL),
=======
<<<<<<< HEAD
(20,'cansa','$2y$10$2lQG1.CIzPZYqizM5jiIYuGwFlvBi.SEbdmFpJ.6/X9tsU5loEH7i','cansa','amaida','male','xtSAH9OwYIcg06SPriQEf5rzkIThgVlRz6t0965yP5S97cIkmMPdYk43MZfj',NULL),
(21,'jinan_08','$2y$10$mI2DWTc0wO/aigfBFRZldeU3iLBpmlqf5gk8yXIVKmKqIqM/3EjAi','jinan','naura','male','u7SPAIeV3tO4eqT8gmqB283cadKGCuuVOKQgRLZllug3QSEneKxlGmsNnrAM',NULL),
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
(23,'pantai_keduwarna','$2y$10$rMGcbWwy2bfLJOX8YSBRJeTEEphDNuv2sDLP8M7KljPw.7csv52MC','kedu','warna','male','wKgn8zDtvrHNrKnHbeM4JVm3WSXXdP2zMLDgl4l8Anc52WVa5sm7gtU3KfzD','admin'),
(24,'tipal123','$2y$10$Q0WWfUAFHHYfvEpCW1LAEekthX9bYjh7l2P1LbmB5hdOv6qLI9A3C','tipal','syah','female','ub45mXRelytsyPLrwz71a9u7Vna6PbZRrN8mBrf4fpTkVL34qbrGNWWDBJ1L',NULL),
(27,'nova17','$2y$10$H6xH/jSYT2M3ARGzBuNMtu.3.ecyhpdhs.67JQjQ.0YNju6/L7E0a','nova','rusmayanti','male','z6atNgl13pDPzmwDEWWPqI058EDyei0j18UBMJyF3QDiFIfbSIyxyEUuflGZ',NULL),
(28,'ilham_','$2y$10$0cCVggUd4tPt7gpBcpxPE.8U36GJ.l1WxI2nWDpCjQLQdLINHdRP2','ilham','nasul','male','nPB1qRpYv0pJa0yEeLc6cB94KYHDDJZUVj3vDqGTesfXoZQG4H6meU8nkKTg',NULL);
<<<<<<< HEAD
=======
=======
(20,'cansa','$2y$10$2lQG1.CIzPZYqizM5jiIYuGwFlvBi.SEbdmFpJ.6/X9tsU5loEH7i','cansa','amaida','male','nWWBct0M0JknMwohS6G0VBI9zvN9dAscZSYWzJZsKYDP0x10hhnXBikAlIGZ',NULL),
(21,'jinan','$2y$10$eNepjNMFdJaLC8jlaaqLB.jLiA6/OXOCYCE50fJbCepBu0NMGIL0C','jinan','naura','male','Lr2wPUQAd2mX1BxfbBN8B1a5eCsomUe713a1ZYbbFwhfoo9Y6M4Ai4y80IIn',NULL),
(22,'idoy123','$2y$10$IHF5bq.uHeycWdOSt8KaJ.dCwOSOBXwcVo9zgQgWWDj3b8OudiJsO','tipal','syah','female','SS6l0RcHsaCBxKkMlhh6AYQeYOhObDA006PoG5d5sA9pTlWPERqbWULaVYyC',NULL),
(23,'rinjani_my_adventure','$2y$10$rMGcbWwy2bfLJOX8YSBRJeTEEphDNuv2sDLP8M7KljPw.7csv52MC','Rinjani','Adventure','male','cYfxDdRPHXYtfM55TFOmtEClEyfQVO2ibR1a3Os1l9QGsqJk90rgDym6QM6K','admin'),
(24,'tipal123','$2y$10$Q0WWfUAFHHYfvEpCW1LAEekthX9bYjh7l2P1LbmB5hdOv6qLI9A3C','tipal','syah','female','OzQsefdrJfdhxaqmRA1hIImF77BJdQB48kOAPRNZwD51e4kIp2VbOkB3196K',NULL),
(25,'sa','$2y$10$4bfF97WdS7zIxEiGwdkSG.IaBG0d/p0varJoh.1izVxT6F71JeF8a','adit_','adit','female','3otfOvnLElRD3MiddbDEuHuY1LzVeL4WjYVtkbNAemC9ODDavSDZEKBUiW3u',NULL),
(26,'ilham_','$2y$10$GbmOYRnClnem1wSQcFURyOcVfxteu7.A.weOzivRp6g7CSj5KofNO','muhaji','ilham','female','dXC7Z9JwxOWMCnjUQnk7ERZ48XRCypfMqAWetHfsDDQh9yExyC8kjkkjTcZi',NULL);
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49

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
  `jenis` varchar(50) DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jumlah_beli` (`jumlah_beli`),
  CONSTRAINT `postingan_ibfk_1` FOREIGN KEY (`jumlah_beli`) REFERENCES `product` (`id`)
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `postingan` */

insert  into `postingan`(`id`,`nama_menu`,`harga`,`deskripsi`,`image`,`jumlah_beli`,`jenis`,`kapasitas`) values 
(15,'camp di pantai kedu warna','50000','camp di pantai kedu warna dari jam kedangan sampai jam 8 pagi','storage/images/1700068439.jpg',NULL,'tiket',100),
(16,'tiket masuk pantai','15000','berkunjunglah ke pantai kedua warna','storage/images/1700600348.jpg',NULL,'tiket',400),
(17,'gazebo keluarga','30000','gazebo terbuka untuk keluarga cukup hanya 30000 dapat di gunakan sepuasnya untuk besantai dan kumpul dengan keluarga anda.','storage/images/1701108845.jpg',NULL,'fasilitas',4),
(18,'delman','50000','berkeliling pantai kedu warna dengan delman bersama keluarga','storage/images/1701108934.jpeg',NULL,'fasilitas',5),
(19,'Atv','35000','berkeliling dengan motor atv','storage/images/1701108992.jpg',NULL,'fasilitas',2),
(21,'terjun payung','150000','terjun payung yang di dampingi oleh atlet profisional lampung','storage/images/1701162197.jpeg',NULL,'fasilitas',1);
=======
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `postingan` */

insert  into `postingan`(`id`,`nama_menu`,`harga`,`deskripsi`,`image`,`jumlah_beli`,`jenis`,`kapasitas`) values 
(15,'camp di pantai kedu warna','50000','camp di pantai kedu warna dari jam kedangan sampai jam 8 pagi','storage/images/1700068439.jpg',NULL,'tiket',100),
(16,'tiket masuk pantai','15000','berkunjunglah ke pantai kedua warna','storage/images/1700600348.jpg',NULL,'tiket',400),
(17,'gazebo keluarga','30000','gazebo terbuka untuk keluarga cukup hanya 30000 dapat di gunakan sepuasnya untuk besantai dan kumpul dengan keluarga anda.','storage/images/1701108845.jpg',NULL,'fasilitas',4),
(18,'delman','50000','berkeliling pantai kedu warna dengan delman bersama keluarga','storage/images/1701108934.jpeg',NULL,'fasilitas',5),
(19,'Atv','35000','berkeliling dengan motor atv','storage/images/1701108992.jpg',NULL,'fasilitas',2),
(21,'terjun payung','150000','terjun payung yang di dampingi oleh atlet profisional lampung','storage/images/1701162197.jpeg',NULL,'fasilitas',1);
=======
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `postingan` */

insert  into `postingan`(`id`,`nama_menu`,`harga`,`deskripsi`,`image`,`jumlah_beli`) values 
(1,'tiket gunung rinjani','500.40000','tiket pesawat dan penginapan','storage/images/1697250524.jpg',NULL),
(2,'kamar hotel','120.0000','nginap semalam','storage/images/1697250607.jpg',NULL),
(3,'penginapan di puncuk rinjani','100.00','penginapan 1 hari 1 malam di antar dari bawah sampai atas oleh pendamping','storage/images/1697288028.jpg',NULL),
(4,'hotel premium','100.0000','aasas','storage/images/1697289488.jpg',NULL),
(5,'hotel premium II','120.0000','asasasas','storage/images/1697292804.jpg',NULL),
(6,'kamar hotel bintang 5','500.40000','asaas','storage/images/1697292813.jpeg',NULL),
(7,'danau','123','assa','storage/images/1697292751.jpeg',NULL),
(8,'danau sagara anak','120.0000','gasken','storage/images/1697292768.jpg',NULL),
(9,'danau sagara anak 11','120.0000','sasaddff','storage/images/1697292891.jpg',NULL),
(10,'danau 4','120.0000','safgghj','storage/images/1697292904.jpeg',NULL),
(11,'danau 5','120.0000','ajyhg','storage/images/1697292922.jpg',NULL),
(12,'danau 6','120.0000','lkjhx','storage/images/1697289347.jpg',NULL);
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) unsigned DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `alamat_id` int(11) unsigned DEFAULT NULL,
  `jumlah_beli` int(11) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `is_new` int(11) DEFAULT NULL,
<<<<<<< HEAD
  `tanggal_datang` timestamp NULL DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
=======
<<<<<<< HEAD
  `tanggal_datang` timestamp NULL DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
=======
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
  PRIMARY KEY (`id`),
  KEY `menu_id` (`menu_id`),
  KEY `user_id` (`user_id`),
  KEY `alamat_id` (`alamat_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `postingan` (`id`),
  CONSTRAINT `product_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `login` (`id`),
  CONSTRAINT `product_ibfk_3` FOREIGN KEY (`alamat_id`) REFERENCES `profile` (`id`)
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `product` */

insert  into `product`(`id`,`menu_id`,`user_id`,`alamat_id`,`jumlah_beli`,`created_at`,`is_new`,`tanggal_datang`,`total_harga`,`status`) values 
(59,15,20,7,10,'2023-11-16 18:50:42',2,'2023-11-17 19:39:00',500000,'ditolak'),
(60,15,21,6,1,'2023-11-26 17:13:15',1,'2023-11-27 10:13:00',50000,'disetujui'),
(62,15,21,6,1,'2023-11-27 23:25:47',2,'2023-11-15 23:25:00',50000,'menunggu');
<<<<<<< HEAD
=======
=======
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `product` */

insert  into `product`(`id`,`menu_id`,`user_id`,`alamat_id`,`jumlah_beli`,`created_at`,`is_new`) values 
(24,2,21,6,1,'2023-10-12 17:27:52',2),
(25,1,21,6,1,'2023-10-13 00:31:16',3),
(26,2,21,6,1,'2023-10-13 01:09:58',4),
(27,2,21,6,1,'2023-10-13 01:48:00',5),
(28,1,21,6,1,'2023-10-13 02:48:07',6),
(29,2,21,6,1,'2023-10-13 05:59:32',7),
(30,1,21,6,10,'2023-10-13 06:19:58',8),
(31,1,20,7,10,'2023-10-13 07:02:37',1),
(32,12,21,6,1,'2023-10-17 06:58:03',9),
(33,5,21,6,10,'2023-10-18 22:35:05',10);
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49

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
  `biodata` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`id`)
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `profile` */

insert  into `profile`(`id`,`nama_depan`,`nama_belakang`,`tanggal_lahir`,`alamat`,`gender`,`user_id`,`biodata`) values 
(6,'jinan','naura','2023-10-02','kalianda','Perempuan',21,'\"Jangan pernah berhenti mengejar yang kamu impikan, meski apa yang didamba belum ada di depan mata.\"-bj.habibie'),
(7,'cansa','amaida','2023-10-02','pesisir','Perempuan',20,NULL),
(9,'Pantai','Kedu Warna','2022-06-07','merak belantung','Laki-laki',23,'Sutset kalianda indah'),
(10,'nova','rusmayanti','2000-11-17','tengkujuh','Perempuan',27,'\"Jangan pernah berhenti mengejar yang kamu impikan, meski apa yang didamba belum ada di depan mata.\"-bj.habibie'),
(11,'tipal','syah','2002-07-05','kalianda','Laki-laki',24,'Informatika 21');
=======
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `profile` */

insert  into `profile`(`id`,`nama_depan`,`nama_belakang`,`tanggal_lahir`,`alamat`,`gender`,`user_id`,`biodata`) values 
(6,'jinan','naura','2023-10-02','kalianda','Perempuan',21,'\"Jangan pernah berhenti mengejar yang kamu impikan, meski apa yang didamba belum ada di depan mata.\"-bj.habibie'),
(7,'cansa','amaida','2023-10-02','pesisir','Perempuan',20,NULL),
(9,'Pantai','Kedu Warna','2022-06-07','merak belantung','Laki-laki',23,'Sutset kalianda indah'),
(10,'nova','rusmayanti','2000-11-17','tengkujuh','Perempuan',27,'\"Jangan pernah berhenti mengejar yang kamu impikan, meski apa yang didamba belum ada di depan mata.\"-bj.habibie'),
(11,'tipal','syah','2002-07-05','kalianda','Laki-laki',24,'Informatika 21');
=======
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `profile` */

insert  into `profile`(`id`,`nama_depan`,`nama_belakang`,`tanggal_lahir`,`alamat`,`gender`,`user_id`) values 
(6,'jinan','naura','2023-10-02','kalianda','Perempuan',21),
(7,'cansa','amaida','2023-10-02','pesisir','Perempuan',20),
(8,'tipal','syah','2002-07-05','jl.m.yusuf sukamandi','Laki-laki',24);
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49

/*Table structure for table `profile_images` */

DROP TABLE IF EXISTS `profile_images`;

CREATE TABLE `profile_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `image_path` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `profile_images_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`id`)
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
=======
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
=======
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49

/*Data for the table `profile_images` */

insert  into `profile_images`(`id`,`user_id`,`image_path`) values 
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
(6,20,'images/RpUx2Wwn2ozhdxtxwJDEm9I0vnYEKC7z0oqs9XdV.jpg'),
(7,21,'images/5EbA498Ipb28KaWDltNask1auIIuoQAfo9VZ8PqU.jpg'),
(10,23,'images/FcjFsckPuTTpPjtCarWxDk9Jgmao8QvnFsEde5ch.jpg'),
(12,27,'images/M7hHF1BVYjuTma1O43ogJM7Bq8mweYNBTAMamlav.jpg'),
(17,24,'images/5tcP25XOJISdMkbbCEkABFr52B6vysWNqGTEwajF.jpg');
<<<<<<< HEAD
=======
=======
(6,20,'images/172r07iordoHJpEUG6ELbCGJHmSAvnHiQiCVdBev.jpg'),
(7,21,'images/1TOPf8aDiTxwKdanRKDX0Q8dzVPN0xbuChAfh3aO.jpg'),
(10,23,'images/U2aYKqCipglIzMuMPiGcuUm3THUepCUDPcPyz3fi.png'),
(11,26,'images/CO9w9uXLBDz3qOTWnl0WmZEbXv5T0q5RqkoKsUfu.jpg');
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49

/*Table structure for table `status` */

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `caption` text DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `comentar_id` int(11) unsigned DEFAULT NULL,
  `like` int(11) unsigned DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `like` (`like`),
  KEY `comentar_id` (`comentar_id`),
<<<<<<< HEAD
  CONSTRAINT `status_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
=======
<<<<<<< HEAD
  CONSTRAINT `status_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
=======
  CONSTRAINT `status_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`id`),
  CONSTRAINT `status_ibfk_2` FOREIGN KEY (`like`) REFERENCES `likes` (`id`),
  CONSTRAINT `status_ibfk_3` FOREIGN KEY (`comentar_id`) REFERENCES `likes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49

/*Data for the table `status` */

insert  into `status`(`id`,`user_id`,`caption`,`image`,`created_at`,`comentar_id`,`like`,`updated_at`) values 
<<<<<<< HEAD
(9,21,'beutiful sekali pantai kedu warna','storage/images/1700495037_2023_1114_12075800.jpg','2023-11-08 20:16:33',NULL,NULL,'2023-11-20 22:43:57'),
(12,21,'yang deket-deket rumah aja asal mantai','storage/images/1700489421_1692301852678.jpg','2023-11-20 21:10:21',NULL,NULL,'2023-11-20 21:10:21'),
(16,24,'asik si mantai di pantai kedua warna bareng temen-temen kuliah','storage/images/1701084087_2023_1114_12091500.jpg','2023-11-27 18:21:27',NULL,NULL,'2023-11-27 18:21:27');
=======
<<<<<<< HEAD
(9,21,'beutiful sekali pantai kedu warna','storage/images/1700495037_2023_1114_12075800.jpg','2023-11-08 20:16:33',NULL,NULL,'2023-11-20 22:43:57'),
(12,21,'yang deket-deket rumah aja asal mantai','storage/images/1700489421_1692301852678.jpg','2023-11-20 21:10:21',NULL,NULL,'2023-11-20 21:10:21'),
(16,24,'asik si mantai di pantai kedua warna bareng temen-temen kuliah','storage/images/1701084087_2023_1114_12091500.jpg','2023-11-27 18:21:27',NULL,NULL,'2023-11-27 18:21:27');
=======
(5,23,'rinjadi adalah destinasi wisata yang memiliki pemandangan yang indah','storage/images/1697285122_gunung-runjani.jpg','2023-10-14 18:56:37',NULL,NULL,'2023-10-14 19:05:22'),
(7,23,'gunung yang waw','storage/images/1697286709_OIP.jpg','2023-10-14 19:21:28',NULL,NULL,'2023-10-14 19:31:49'),
(8,23,'jjjj','storage/images/1697287022_OIP.jpg','2023-10-14 19:34:13',NULL,NULL,'2023-10-14 19:37:02');
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
