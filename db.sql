/*
SQLyog Community v12.09 (64 bit)
MySQL - 5.5.23 : Database - softgroup
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`softgroup` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `softgroup`;

/*Table structure for table `coments` */

DROP TABLE IF EXISTS `coments`;

CREATE TABLE `coments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `coment` text NOT NULL,
  `rating` int(10) DEFAULT '0',
  `creiting_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `coments` */

insert  into `coments`(`id`,`user_name`,`url`,`coment`,`rating`,`creiting_date`) values (1,'Yaro1475228062','test.loc','new text',0,'2016-09-30 12:36:57'),(16,'Yaro1475228062','test.loc','goood',0,'2016-09-30 18:38:20'),(25,'Yaro1475250245','test.loc','werwerwe',0,'2016-09-30 19:57:30'),(40,'Yaro1475250245','test.loc','trt',0,'2016-09-30 20:01:05');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
