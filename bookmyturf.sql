/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.10.2-MariaDB : Database - bookmyturf
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bookmyturf` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;

USE `bookmyturf`;

/*Table structure for table `bookings` */

DROP TABLE IF EXISTS `bookings`;

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `turf_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `slot_id` int(11) DEFAULT NULL,
  `week_id` int(11) DEFAULT NULL,
  `booking_date` varchar(30) DEFAULT NULL,
  `members` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `bookings` */

insert  into `bookings`(`booking_id`,`turf_id`,`user_id`,`slot_id`,`week_id`,`booking_date`,`members`,`status`) values 
(1,7,1,1,1,'2023/10/27','11','booked');

/*Table structure for table `challenge` */

DROP TABLE IF EXISTS `challenge`;

CREATE TABLE `challenge` (
  `challenge_id` int(11) NOT NULL AUTO_INCREMENT,
  `from_user_id` int(11) DEFAULT NULL,
  `to_user_id` int(11) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `turf_id` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`challenge_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `challenge` */

insert  into `challenge`(`challenge_id`,`from_user_id`,`to_user_id`,`date`,`turf_id`,`status`) values 
(1,2,1,'2023-10-27',7,'accepted');

/*Table structure for table `feedback` */

DROP TABLE IF EXISTS `feedback`;

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `datetime` varchar(20) DEFAULT NULL,
  `turf_id` int(11) DEFAULT 0,
  PRIMARY KEY (`feedback_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `feedback` */

insert  into `feedback`(`feedback_id`,`user_id`,`description`,`datetime`,`turf_id`) values 
(1,2,'good turf with good space','2023-10-27',1),
(2,2,'nice app overall userfriendly','2023-10-27',0),
(3,2,'Good ground but price is very high','2023-10-27',1),
(4,2,'bad managment','2023-10-27',1),
(5,2,'bad facilities','2023-10-27',3),
(6,2,'bad facilities','2023-10-27',3),
(7,2,'Awesome space but price is high ','2023-10-27',7);

/*Table structure for table `images` */

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `turf_id` int(11) DEFAULT NULL,
  `image_path` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `images` */

insert  into `images`(`image_id`,`turf_id`,`image_path`) values 
(1,7,'C:/wamp64/www/Playhub/assets/turf_images/pexels-asad-photo-maldives-169198.jpg'),
(2,7,'C:/wamp64/www/Playhub/assets/turf_images/pexels-fu-zhichao-587741.jpg'),
(3,7,'C:/wamp64/www/Playhub/assets/turf_images/pexels-fu-zhichao-587741.jpg');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `usertype` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `login` */

insert  into `login`(`login_id`,`username`,`password`,`usertype`) values 
(1,'admin','admin','admin');

/*Table structure for table `slots` */

DROP TABLE IF EXISTS `slots`;

CREATE TABLE `slots` (
  `slot_id` int(11) NOT NULL AUTO_INCREMENT,
  `slot_time` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`slot_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `slots` */

insert  into `slots`(`slot_id`,`slot_time`) values 
(1,'12:00-1:00'),
(2,'1:00-2:00'),
(3,'2:00-3:00'),
(4,'4:00-5:00'),
(5,'5:00-6:00'),
(6,'7:00-8:00'),
(7,'8:00-9:00'),
(8,'9:00-10:00'),
(9,'10:00-11:00'),
(10,'11:00-12:00'),
(11,'12:00-13:00'),
(12,'13:00-14:00'),
(13,'14:00-15:00'),
(14,'15:00-16:00'),
(15,'16:00-17:00'),
(16,'18:00-19:00'),
(17,'19:00-20:00'),
(18,'20:00-21:00'),
(19,'21:00-22:00'),
(20,'22:00-23:00'),
(21,'23:00-24:00');

/*Table structure for table `turf` */

DROP TABLE IF EXISTS `turf`;

CREATE TABLE `turf` (
  `turf_id` int(11) NOT NULL AUTO_INCREMENT,
  `turf_name` varchar(30) DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`turf_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `turf` */

insert  into `turf`(`turf_id`,`turf_name`,`location`,`username`,`password`,`status`) values 
(1,'UNITED FOOTBALL TURF','kakkanad','united','united','active'),
(2,'Greenfield Indoor Cricket Turf','kannur','greenfield','greenfield','active'),
(3,'Derby Football / cricket Turf','alappuzha','derby','derby','active'),
(4,'Jawahar Stadium Complex','kannur','jawahar','jawahar','active'),
(5,'Tiki Taka Sports Arena','kannur','tiki','tiki','active'),
(6,'Champions Cricket Ground','kalavoor','champions','champions','active'),
(7,'Malarvady Arts & Sports Club C','alappuzha','turf','turf','active');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `location` varchar(20) DEFAULT NULL,
  `pin` varchar(8) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `status` varbinary(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user` */

insert  into `user`(`user_id`,`first_name`,`last_name`,`email`,`phone`,`location`,`pin`,`username`,`password`,`status`) values 
(1,'amal','ganesh','amalganesh@gmail.com','7356529545','kannur','670331','user1','user1','active'),
(2,'rahul','ganesh','rahulganesh@gmail.com','7898985658','alappuzha','223344','user2','user2','active');

/*Table structure for table `week` */

DROP TABLE IF EXISTS `week`;

CREATE TABLE `week` (
  `week_id` int(11) NOT NULL AUTO_INCREMENT,
  `week_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`week_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `week` */

insert  into `week`(`week_id`,`week_name`) values 
(1,'sunday'),
(2,'monday'),
(3,'tuesday'),
(4,'wednesday'),
(5,'thursday'),
(6,'friday'),
(7,'saturday');

/*Table structure for table `working_days` */

DROP TABLE IF EXISTS `working_days`;

CREATE TABLE `working_days` (
  `working_day_id` int(11) NOT NULL AUTO_INCREMENT,
  `week_id` int(11) DEFAULT NULL,
  `turf_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`working_day_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `working_days` */

insert  into `working_days`(`working_day_id`,`week_id`,`turf_id`) values 
(1,1,1),
(2,2,1),
(3,3,1),
(6,4,1),
(7,5,1),
(8,1,3),
(9,2,3),
(10,3,3),
(11,6,3),
(12,2,7),
(13,3,7),
(14,4,7),
(15,6,7),
(16,7,7);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
