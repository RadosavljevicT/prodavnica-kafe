/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.4.17-MariaDB : Database - kafa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kafa` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `kafa`;

/*Table structure for table `kafa` */

DROP TABLE IF EXISTS `kafa`;

CREATE TABLE `kafa` (
  `idkafe` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gramaza` int(11) NOT NULL,
  `vrstaKafe` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `zemljaPorekla` int(11) NOT NULL,
  PRIMARY KEY (`idkafe`),
  KEY `FKzemlja` (`zemljaPorekla`),
  CONSTRAINT `FKzemlja` FOREIGN KEY (`zemljaPorekla`) REFERENCES `zemlja` (`idzemlje`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `kafa` */

insert  into `kafa`(`idkafe`,`naziv`,`gramaza`,`vrstaKafe`,`zemljaPorekla`) values 
(1,'Kafica Lajt 2',74,'Crna kafa',1),
(3,'Kafica Kafa',122,'Cappuchino',4),
(7,'Kafa Diet',200,'Crna kafa',1),
(9,'Kafa sa dodatkom Cokoladnog Proteina',200,'Cafe Latte macchiato',1),
(10,'Kafa sa dodatkom Vanile',10,'Cafe Latte macchiato',6),
(11,'KafaKafice5',45,'Macchiato',1),
(13,'ChocoKaficaI',7,'Crna kafa',1),
(14,'Tamara Coffee',200,'Cafe Latte macchiato',5),
(15,'Cokoladna kafa',4,'Caffe Latte',1),
(16,'Kafa of lesnika',2,'Crna kafa',1),
(18,'Kafa sa aromom djumbira',1,'Macchiato',6),
(21,'Bozicna kafa',7,'Crna kafa',4),
(23,'Novogodisnja kafa',5,'Macchiato',5),
(24,'Hladna kafa sa aromom',3,'Crna kafa',5);

/*Table structure for table `zemlja` */

DROP TABLE IF EXISTS `zemlja`;

CREATE TABLE `zemlja` (
  `idzemlje` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idzemlje`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `zemlja` */

insert  into `zemlja`(`idzemlje`,`naziv`) values 
(1,'Srbija'),
(2,'Grcka'),
(3,'Rusija'),
(4,'Nemacka'),
(5,'Brazil'),
(6,'Nikaragva');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
