/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 10.1.9-MariaDB : Database - ci_rest
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ci_rest` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ci_rest`;

/*Table structure for table `books` */

DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `books` */

insert  into `books`(`id`,`title`,`author`,`created_at`,`updated_at`) values (1,'Buku 1','Test Author','2016-08-09 14:09:31','0000-00-00 00:00:00');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `level` enum('Admin','Member') DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`fullname`,`level`,`last_login`,`created_at`,`updated_at`) values (1,'admin','$1$uU/.fn0.$MZ74cvXgO.83RTfc1DsWy0','Admin','Admin','2016-08-11 09:37:30','2015-12-25 10:35:16','2016-08-11 10:52:13');

/*Table structure for table `users_authentication` */

DROP TABLE IF EXISTS `users_authentication`;

CREATE TABLE `users_authentication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `users_authentication` */

insert  into `users_authentication`(`id`,`users_id`,`token`,`expired_at`,`created_at`,`updated_at`) values (1,1,'$1$.L3.t91.$ta08.uDcziQeJqxBHSPm61','2016-08-09 23:11:08',NULL,NULL),(3,2,'$1$f51.6h..$u70oXho4DLA.UAjHhY8VV0','2016-08-09 23:24:26',NULL,NULL),(4,1,'$1$kI0.dK0.$s9bQF6folmp5OmMMwMNw20','2016-08-11 22:52:13',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
