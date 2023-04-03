/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 8.0.32 : Database - image_reorder
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`image_reorder` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `image_reorder`;

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `product_id` bigint NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `excerpt` text,
  `description` text,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `products` */

insert  into `products`(`product_id`,`title`,`excerpt`,`description`) values 
(1,'Product 1','This excerpt for product 1','This is long description for product 1. This is long description for product 1.'),
(2,'Product 2\r\n	','This is excerpt for product 2','This is long description for product 2. This is long description for product 2. ');

/*Table structure for table `products_images` */

DROP TABLE IF EXISTS `products_images`;

CREATE TABLE `products_images` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned NOT NULL,
  `image` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `is_video` tinyint(1) NOT NULL DEFAULT '0',
  `original_image` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `original_height` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `original_width` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `is_primary` enum('0','1') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT '0',
  `alt_text` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `position` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

/*Data for the table `products_images` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
