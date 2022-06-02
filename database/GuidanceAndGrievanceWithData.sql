/*
SQLyog Professional
MySQL - 10.4.22-MariaDB : Database - guidance_system
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`guidance_system` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `guidance_system`;

/*Table structure for table `complains` */

DROP TABLE IF EXISTS `complains`;

CREATE TABLE `complains` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `stud_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stud_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offense_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offense_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `complains` */

insert  into `complains`(`id`,`stud_num`,`stud_name`,`offense_title`,`offense_desc`,`created_at`,`updated_at`) values 
(4,'123456789','juan dela cruz','Test','Test','2022-04-20 07:51:56','2022-04-20 07:51:56'),
(5,'123456789','juan dela cruz','Test 2','Test 2','2022-04-20 07:53:22','2022-04-20 07:53:22'),
(6,'123456789','juan dela cruz','Test 2','Test 2','2022-04-20 07:53:49','2022-04-20 07:53:49'),
(14,'31550695','Cornelle Lathbury','Test','Test','2022-04-27 14:29:19','2022-04-27 14:29:19'),
(15,'26336624','Nonna Mallon','Test','Test','2022-04-27 14:31:11','2022-04-27 14:31:11');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

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

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2021_12_19_042025_create_teachers_table',1),
(6,'2022_03_30_210230_create_complains_table',1),
(7,'2022_03_30_212723_create_stud_profile_table',2),
(8,'2022_04_20_231444_create_teacher_complains_table',3);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

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

/*Data for the table `personal_access_tokens` */

/*Table structure for table `stud_profile` */

DROP TABLE IF EXISTS `stud_profile`;

CREATE TABLE `stud_profile` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `stud_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stud_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yr_lvl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `stud_profile` */

insert  into `stud_profile`(`id`,`stud_id`,`stud_num`,`fname`,`lname`,`name`,`gender`,`course`,`school_name`,`yr_lvl`,`section`,`email`,`phone_num`,`parent_num`,`address`,`created_at`,`updated_at`) values 
(1,'123456789','123456789','juan','dela cruz',NULL,'Male','BSIT','BCP','3','9404','juandelacruz@gmail.com','09123456789','0123456789','Quezon City','2022-04-20 16:20:26','2022-04-20 16:20:27'),
(2,NULL,'49810676','Jock','Kenderdine','Jock Kenderdine','Male','BSIT','BCP','3','9404','JockKenderdine@gmail.com','09251511456','903747954','Quezon City','2022-04-20 16:20:26','2022-04-20 16:20:26'),
(3,NULL,'44252086','Janenna','Rankling','Janenna Rankling','Female','BSIT','BCP','1','8642','JanennaRankling@gmail.com','09447464143','603151443','Quezon City','2022-04-20 16:20:26','2022-04-20 16:20:26'),
(4,NULL,'27204103','Dannye','Vannacci','Dannye Vannacci','Female','BSIT','BCP','4','3012','DannyeVannacci@gmail.com','09921010305','190676046','Quezon City','2022-04-20 16:20:26','2022-04-20 16:20:26'),
(5,NULL,'52946902','Abigael','Fish','Abigael Fish','Female','BSIT','BCP','2','2784','AbigaelFish@gmail.com','09634011781','587348079','Quezon City','2022-04-20 16:20:26','2022-04-20 16:20:26'),
(6,NULL,'47320330','Sebastian','Sleaford','Sebastian Sleaford','Male','BSIT','BCP','2','8234','SebastianSleaford@gmail.com','09882063386','636332242','Quezon City','2022-04-20 16:20:26','2022-04-20 16:20:26'),
(7,NULL,'39474652','Johnath','Burgiss','Johnath Burgiss','Female','BSIT','BCP','1','2131','JohnathBurgiss@gmail.com','09760665774','169133430','Quezon City','2022-04-20 16:20:26','2022-04-20 16:20:26'),
(8,NULL,'48070441','Emmalynn','Proppers','Emmalynn Proppers','Female','BSIT','BCP','4','2159','EmmalynnProppers@gmail.com','09823558710','191703301','Quezon City','2022-04-20 16:20:26','2022-04-20 16:20:26'),
(9,NULL,'37569169','Emalia','Joriot','Emalia Joriot','Female','BSIT','BCP','4','9570','EmaliaJoriot@gmail.com','09806678024','109575466','Quezon City','2022-04-20 16:20:26','2022-04-20 16:20:26'),
(10,NULL,'24001074','Anne-corinne','Dri','Anne-corinne Dri','Female','BSIT','BCP','1','5832','Anne-corinneDri@gmail.com','09401329693','700657759','Quezon City','2022-04-20 16:20:26','2022-04-20 16:20:26'),
(11,NULL,'10543468','Christiano','Pinsent','Christiano Pinsent','Male','BSIT','BCP','1','8593','ChristianoPinsent@gmail.com','09550264677','946088199','Quezon City','2022-04-20 16:20:26','2022-04-20 16:20:26'),
(12,NULL,'36108310','Petronella','Norcock','Petronella Norcock','Female','BSIT','BCP','3','2018','PetronellaNorcock@gmail.com','09977364952','606001319','Quezon City','2022-04-20 16:20:26','2022-04-20 16:20:26'),
(13,NULL,'31550695','Cornelle','Lathbury','Cornelle Lathbury','Female','BSIT','BCP','4','4236','CornelleLathbury@gmail.com','09735907552','556311493','Quezon City','2022-04-20 16:20:26','2022-04-20 16:20:26'),
(14,NULL,'23204264','Geoff','Tizzard','Geoff Tizzard','Male','BSIT','BCP','4','3408','GeoffTizzard@gmail.com','09317096032','485152685','Quezon City','2022-04-20 16:20:26','2022-04-20 16:20:26'),
(15,NULL,'26336624','Nonna','Mallon','Nonna Mallon','Female','BSIT','BCP','3','3655','NonnaMallon@gmail.com','09305146214','778970860','Quezon City','2022-04-20 16:20:26','2022-04-20 16:20:26'),
(16,NULL,'19556985','Law','Bernardt','Law Bernardt','Male','BSIT','BCP','2','8316','LawBernardt@gmail.com','09198445767','338451688','Quezon City','2022-04-20 16:20:26','2022-04-20 16:20:26');

/*Table structure for table `teacher_complains` */

DROP TABLE IF EXISTS `teacher_complains`;

CREATE TABLE `teacher_complains` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offense_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offense_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `teacher_complains` */

insert  into `teacher_complains`(`id`,`teacher_name`,`offense_title`,`offense_description`,`created_at`,`updated_at`) values 
(1,'Juan Dela Cruz','Test','Offense Description','2022-04-20 23:24:39','2022-04-20 23:24:39'),
(2,'Janenna Bambilao','Offense Title','Offense Description','2022-04-20 23:26:58','2022-04-20 23:26:58'),
(7,'Juana Dela Cruz','Offense Title','This is example description of Offense','2022-04-28 06:58:54','2022-04-28 06:58:54'),
(8,'Juan Dela Cruz','Title','Description','2022-04-28 06:59:48','2022-04-28 06:59:48');

/*Table structure for table `teachers` */

DROP TABLE IF EXISTS `teachers`;

CREATE TABLE `teachers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `teachers` */

insert  into `teachers`(`id`,`name`,`created_at`,`updated_at`) values 
(1,'Juana Dela Cruz','2022-04-28 06:58:54','2022-04-28 06:58:54'),
(2,'Juan Dela Cruz','2022-04-28 06:59:48','2022-04-28 06:59:48');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`is_admin`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(2,'admin','admin@gmail.com',NULL,NULL,'$2y$10$aeKBkvTOygkrUeCOcTlrBu6RC2KU4aGFsWYfne9yfHe.6ZO3nRClK',NULL,'2022-04-28 19:33:45','2022-04-28 19:33:45');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
