/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.4.6-MariaDB : Database - dbsppd
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbsppd` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `dbsppd`;

/*Table structure for table `msfnc` */

DROP TABLE IF EXISTS `msfnc`;

CREATE TABLE `msfnc` (
  `idfncmsfnc` int(11) NOT NULL AUTO_INCREMENT,
  `nmfncmsfnc` varchar(100) NOT NULL,
  PRIMARY KEY (`idfncmsfnc`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `msfnc` */

insert  into `msfnc`(`idfncmsfnc`,`nmfncmsfnc`) values 
(1,'test');

/*Table structure for table `msgol` */

DROP TABLE IF EXISTS `msgol`;

CREATE TABLE `msgol` (
  `idgolmsgol` int(11) NOT NULL AUTO_INCREMENT,
  `nmgolmsgol` varchar(100) NOT NULL,
  PRIMARY KEY (`idgolmsgol`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `msgol` */

insert  into `msgol`(`idgolmsgol`,`nmgolmsgol`) values 
(1,'Golongan 1');

/*Table structure for table `msrcu` */

DROP TABLE IF EXISTS `msrcu`;

CREATE TABLE `msrcu` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_time` timestamp NULL DEFAULT NULL,
  `log_user` varchar(50) DEFAULT NULL,
  `log_tipe` varchar(50) DEFAULT NULL,
  `log_aksi` varchar(50) DEFAULT NULL,
  `log_item` varchar(50) DEFAULT NULL,
  `log_assign_to` varchar(50) DEFAULT NULL,
  `log_assign_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `msrcu` */

/*Table structure for table `mssdt` */

DROP TABLE IF EXISTS `mssdt`;

CREATE TABLE `mssdt` (
  `idsdtmssdt` int(11) NOT NULL AUTO_INCREMENT,
  `issdtmssdt` int(11) DEFAULT NULL,
  `stsdtmssdt` varchar(200) DEFAULT NULL,
  `fnsdtmssdt` varchar(200) DEFAULT NULL,
  `drsdtmssdt` int(11) DEFAULT NULL,
  `tpsdtmssdt` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idsdtmssdt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mssdt` */

/*Table structure for table `mssdw` */

DROP TABLE IF EXISTS `mssdw`;

CREATE TABLE `mssdw` (
  `idsdwmssdw` int(11) NOT NULL AUTO_INCREMENT,
  `issdwmssdw` int(11) DEFAULT NULL,
  `wksdwmssdw` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsdwmssdw`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mssdw` */

/*Table structure for table `msspd` */

DROP TABLE IF EXISTS `msspd`;

CREATE TABLE `msspd` (
  `nospdmsspd` int(11) NOT NULL AUTO_INCREMENT,
  `wkspdmsspd` varchar(100) DEFAULT NULL COMMENT 'list worker',
  `vdspdmsspd` varchar(200) DEFAULT NULL COMMENT 'vendor',
  `stspdmsspd` enum('Belum','Sudah','Ditolak') DEFAULT 'Belum' COMMENT 'status',
  `fcspdmsspd` varchar(200) DEFAULT NULL COMMENT 'function',
  `ptspdmsspd` date DEFAULT NULL,
  `atspdmsspd` date DEFAULT NULL COMMENT 'acc date',
  `wcspdmsspd` varchar(200) DEFAULT NULL COMMENT 'watcher',
  `ldspdmsspd` int(11) DEFAULT NULL COMMENT 'leader',
  `rsspdmsspd` varchar(250) DEFAULT NULL COMMENT 'reason',
  `dsspdmsspd` datetime DEFAULT NULL COMMENT 'date start',
  `dfspdmsspd` datetime DEFAULT NULL COMMENT 'date finish',
  `wwspdmsspd` enum('Workday','Weekday') DEFAULT NULL COMMENT 'work/week',
  `tfspdmssdp` varchar(20) DEFAULT NULL,
  `amspdmsspd` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`nospdmsspd`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `msspd` */

insert  into `msspd`(`nospdmsspd`,`wkspdmsspd`,`vdspdmsspd`,`stspdmsspd`,`fcspdmsspd`,`ptspdmsspd`,`atspdmsspd`,`wcspdmsspd`,`ldspdmsspd`,`rsspdmsspd`,`dsspdmsspd`,`dfspdmsspd`,`wwspdmsspd`,`tfspdmssdp`,`amspdmsspd`) values 
(21,'1,2','A','Belum','test',NULL,NULL,'ds',NULL,'Test','2020-02-02 23:59:00','2020-02-07 23:59:00',NULL,NULL,NULL);

/*Table structure for table `mstrf` */

DROP TABLE IF EXISTS `mstrf`;

CREATE TABLE `mstrf` (
  `idtrfmstrf` int(11) NOT NULL AUTO_INCREMENT,
  `jktrfmstrf` double DEFAULT NULL,
  `tftrfmstrf` int(11) DEFAULT NULL,
  `sttrfmstrf` varchar(200) DEFAULT NULL,
  `dttrfmstrf` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idtrfmstrf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mstrf` */

/*Table structure for table `msusr` */

DROP TABLE IF EXISTS `msusr`;

CREATE TABLE `msusr` (
  `idusrmsusr` int(11) NOT NULL AUTO_INCREMENT,
  `unusrmsusr` varchar(45) DEFAULT NULL,
  `pwusrmsusr` varchar(200) DEFAULT NULL,
  `nmusrmsusr` varchar(70) NOT NULL,
  `lcusrmsusr` varchar(255) NOT NULL,
  `lvusrmsusr` enum('leader','watcher','admin','superadmin') NOT NULL,
  `fcusrmsusr` int(11) NOT NULL,
  `ldusrmsusr` int(11) DEFAULT NULL,
  `emusrmsusr` varchar(90) DEFAULT NULL,
  `hpusrmsusr` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`idusrmsusr`),
  UNIQUE KEY `UNIQUE` (`unusrmsusr`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `msusr` */

insert  into `msusr`(`idusrmsusr`,`unusrmsusr`,`pwusrmsusr`,`nmusrmsusr`,`lcusrmsusr`,`lvusrmsusr`,`fcusrmsusr`,`ldusrmsusr`,`emusrmsusr`,`hpusrmsusr`) values 
(3,'test','test','dsasfd','fff','admin',1,NULL,'fffff@gmail.com','0888888'),
(4,'test2','test2','test2','test','superadmin',1,NULL,'test@gmail.com','0888888'),
(10,'ds','sd','sad','sad','watcher',1,9,'asd','sad'),
(11,'test21','098f6bcd4621d373cade4e832627b4f6','test','test','watcher',1,9,'sadsda@gmail.com','08888888');

/*Table structure for table `msvdr` */

DROP TABLE IF EXISTS `msvdr`;

CREATE TABLE `msvdr` (
  `idvdrmsvdr` int(11) NOT NULL AUTO_INCREMENT,
  `nmvdrmsvdr` varchar(50) NOT NULL,
  `lcvdrmsvdr` varchar(255) DEFAULT NULL,
  `dcvdrmsvdr` text DEFAULT NULL,
  `hpvdrmsvdr` varchar(13) DEFAULT NULL,
  `emvdrmsvdr` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`idvdrmsvdr`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `msvdr` */

insert  into `msvdr`(`idvdrmsvdr`,`nmvdrmsvdr`,`lcvdrmsvdr`,`dcvdrmsvdr`,`hpvdrmsvdr`,`emvdrmsvdr`) values 
(1,'A','Karawang','<p>\n	Tentang</p>\n','0888888','a@gmail.com');

/*Table structure for table `mswrk` */

DROP TABLE IF EXISTS `mswrk`;

CREATE TABLE `mswrk` (
  `idwrkmswrk` int(11) NOT NULL AUTO_INCREMENT,
  `nmwrkmswrk` varchar(70) DEFAULT NULL,
  `fcwrkmswrk` int(11) DEFAULT NULL,
  `glwrkmswrk` int(11) DEFAULT NULL,
  `rtwrkmswrk` double DEFAULT NULL,
  `hpwrkmswrk` varchar(13) DEFAULT NULL,
  `alwrkmswrk` varchar(200) DEFAULT NULL,
  `tlwrkmswrk` date DEFAULT NULL,
  PRIMARY KEY (`idwrkmswrk`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `mswrk` */

insert  into `mswrk`(`idwrkmswrk`,`nmwrkmswrk`,`fcwrkmswrk`,`glwrkmswrk`,`rtwrkmswrk`,`hpwrkmswrk`,`alwrkmswrk`,`tlwrkmswrk`) values 
(1,'test',1,1,4,'08888','Subang','2020-01-04'),
(2,'test2',1,1,1,'1','1','2020-02-19');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
