/*
SQLyog Ultimate v12.4.3 (32 bit)
MySQL - 10.1.32-MariaDB : Database - default_app
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `default_application` */

DROP TABLE IF EXISTS `default_application`;

CREATE TABLE `default_application` (
  `app_id` smallint(20) NOT NULL,
  `app_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`app_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `default_application` */

insert  into `default_application`(`app_id`,`app_name`) values 
(1,'Back Office'),
(2,'Application');

/*Table structure for table `default_group` */

DROP TABLE IF EXISTS `default_group`;

CREATE TABLE `default_group` (
  `groupId` bigint(20) NOT NULL AUTO_INCREMENT,
  `groupName` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`groupId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `default_group` */

insert  into `default_group`(`groupId`,`groupName`,`description`) values 
(1,'Root','Super root'),
(2,'Admin','Akses untuk Admin'),
(3,'Public','group Public');

/*Table structure for table `default_group_menu` */

DROP TABLE IF EXISTS `default_group_menu`;

CREATE TABLE `default_group_menu` (
  `groupId` bigint(20) DEFAULT NULL,
  `menuId` bigint(20) DEFAULT NULL,
  KEY `menuId` (`menuId`),
  KEY `groupId` (`groupId`),
  CONSTRAINT `default_group_menu_ibfk_1` FOREIGN KEY (`menuId`) REFERENCES `default_menu` (`menuId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `default_group_menu_ibfk_2` FOREIGN KEY (`groupId`) REFERENCES `default_group` (`groupId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `default_group_menu` */

insert  into `default_group_menu`(`groupId`,`menuId`) values 
(1,1),
(1,2),
(1,3),
(1,4),
(1,5),
(1,6),
(1,7),
(1,8);

/*Table structure for table `default_group_page` */

DROP TABLE IF EXISTS `default_group_page`;

CREATE TABLE `default_group_page` (
  `groupId` bigint(20) DEFAULT NULL,
  `pageId` bigint(20) DEFAULT NULL,
  KEY `pageId` (`pageId`),
  KEY `groupId` (`groupId`),
  CONSTRAINT `default_group_page_ibfk_1` FOREIGN KEY (`pageId`) REFERENCES `default_page` (`pageId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `default_group_page_ibfk_2` FOREIGN KEY (`groupId`) REFERENCES `default_group` (`groupId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `default_group_page` */

insert  into `default_group_page`(`groupId`,`pageId`) values 
(1,1),
(1,2),
(1,3),
(1,4),
(1,5),
(1,6),
(1,7),
(1,8),
(1,9),
(1,10),
(1,11),
(1,13),
(1,12),
(1,14),
(1,15),
(1,16),
(1,17),
(1,18);

/*Table structure for table `default_group_user` */

DROP TABLE IF EXISTS `default_group_user`;

CREATE TABLE `default_group_user` (
  `groupId` bigint(20) DEFAULT NULL,
  `userId` bigint(20) DEFAULT NULL,
  KEY `userId` (`userId`),
  KEY `groupId` (`groupId`),
  CONSTRAINT `default_group_user_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `default_user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `default_group_user_ibfk_2` FOREIGN KEY (`groupId`) REFERENCES `default_group` (`groupId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `default_group_user` */

insert  into `default_group_user`(`groupId`,`userId`) values 
(2,2),
(1,1),
(1,10);

/*Table structure for table `default_menu` */

DROP TABLE IF EXISTS `default_menu`;

CREATE TABLE `default_menu` (
  `menuId` bigint(20) NOT NULL AUTO_INCREMENT,
  `menuName` varchar(255) NOT NULL,
  `menuDefaultPage` bigint(20) DEFAULT NULL,
  `iconMenu` varchar(255) DEFAULT NULL,
  `menuOrder` int(11) DEFAULT NULL,
  `menuStyle` enum('single','parent','sub') NOT NULL DEFAULT 'single',
  `menuColor` varchar(20) NOT NULL DEFAULT '#555555',
  `menuParentId` bigint(20) DEFAULT NULL,
  `menuDescription` text,
  `menuPosition` enum('sidebar','content') NOT NULL DEFAULT 'sidebar',
  `menuTimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `menuAppId` smallint(20) DEFAULT NULL,
  PRIMARY KEY (`menuId`),
  KEY `menuAppId` (`menuAppId`),
  KEY `menuDefaultPage` (`menuDefaultPage`),
  CONSTRAINT `default_menu_ibfk_1` FOREIGN KEY (`menuAppId`) REFERENCES `default_application` (`app_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `default_menu_ibfk_2` FOREIGN KEY (`menuDefaultPage`) REFERENCES `default_page` (`pageId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `default_menu` */

insert  into `default_menu`(`menuId`,`menuName`,`menuDefaultPage`,`iconMenu`,`menuOrder`,`menuStyle`,`menuColor`,`menuParentId`,`menuDescription`,`menuPosition`,`menuTimestamp`,`menuAppId`) values 
(1,'Pengaturan Sistem',1,'gear',2,'parent','#555555',0,'-','sidebar','2018-11-17 03:44:07',1),
(2,'Pengaturan Halaman',2,'gear',1,'sub','#555555',1,'-','sidebar','2018-11-17 03:18:34',1),
(3,'Pengaturan Menu',3,'gear',2,'sub','#555555',1,'-','sidebar','2018-11-17 03:24:56',1),
(4,'Pengaturan Pengguna',8,'people',1,'single','#555555',0,'-','sidebar','2018-11-17 03:44:20',NULL),
(5,'Pengaturan Group',11,'gear',3,'sub','#555555',1,'-','sidebar','2018-11-17 03:53:11',NULL),
(6,'Referensi',14,'list',3,'parent','#555555',0,'-','sidebar','2018-11-17 04:09:52',NULL),
(7,'Kategori',14,'list',1,'sub','#555555',6,'-','sidebar','2018-11-17 04:13:16',NULL),
(8,'Beranda',1,'home',0,'single','#555555',0,'-','sidebar','2018-11-17 04:23:03',NULL);

/*Table structure for table `default_notification` */

DROP TABLE IF EXISTS `default_notification`;

CREATE TABLE `default_notification` (
  `notifId` bigint(20) NOT NULL AUTO_INCREMENT,
  `notifJenisId` int(20) DEFAULT NULL,
  `notifNamaJenis` varchar(50) DEFAULT NULL,
  `notifPesan` text,
  `notifLink` varchar(255) DEFAULT NULL,
  `notifUserFrom` bigint(20) DEFAULT NULL,
  `notifUserTo` bigint(20) DEFAULT NULL,
  `notifFromGroup` bigint(20) DEFAULT NULL,
  `notifStatus` enum('0','1') DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`notifId`),
  KEY `notifJenisId` (`notifJenisId`),
  KEY `notifFromGroup` (`notifFromGroup`),
  KEY `default_notification_ibfk_2` (`notifUserFrom`),
  KEY `default_notification_ibfk_5` (`notifUserTo`),
  CONSTRAINT `default_notification_ibfk_2` FOREIGN KEY (`notifUserFrom`) REFERENCES `default_user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `default_notification_ibfk_4` FOREIGN KEY (`notifFromGroup`) REFERENCES `default_group` (`groupId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `default_notification_ibfk_5` FOREIGN KEY (`notifUserTo`) REFERENCES `default_user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `default_notification` */

/*Table structure for table `default_page` */

DROP TABLE IF EXISTS `default_page`;

CREATE TABLE `default_page` (
  `pageId` bigint(20) NOT NULL AUTO_INCREMENT,
  `page` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `labelPage` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `subPage` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `action` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `tambah` enum('on') CHARACTER SET latin1 DEFAULT NULL,
  `ubah` enum('on') CHARACTER SET latin1 DEFAULT NULL,
  `detil` enum('on') CHARACTER SET latin1 DEFAULT NULL,
  `hapus` enum('on') CHARACTER SET latin1 DEFAULT NULL,
  `status` enum('Yes','No') CHARACTER SET latin1 DEFAULT NULL,
  `appId` smallint(20) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pageId`),
  KEY `appId` (`appId`),
  CONSTRAINT `default_page_ibfk_1` FOREIGN KEY (`appId`) REFERENCES `default_application` (`app_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `default_page` */

insert  into `default_page`(`pageId`,`page`,`labelPage`,`subPage`,`action`,`tambah`,`ubah`,`detil`,`hapus`,`status`,`appId`,`timestamp`) values 
(1,'home','home view root','view','view','on','on','on','on','Yes',1,'2018-11-17 06:06:54'),
(2,'conf_page','conf_page view root','view','view','on','on','on','on','Yes',1,'2018-11-17 03:32:35'),
(3,'conf_menu','conf_menu view root','view','view','on','on','on','on','Yes',1,'2018-11-17 03:32:29'),
(4,'conf_page','conf_page add root','add','view','on','on','on','on','Yes',1,'2018-11-17 03:23:55'),
(5,'conf_page','conf_page edit root','edit','view','on','on','on','on','Yes',1,'2018-11-17 03:23:55'),
(6,'conf_menu','conf_menu add root','add','view','on','on','on','on','Yes',1,'2018-11-17 03:23:55'),
(7,'conf_menu','conf_menu edit root','edit','view','on','on','on','on','Yes',1,'2018-11-17 03:23:55'),
(8,'user','user view root','view','view','on','on','on','on','Yes',NULL,'2018-11-17 03:42:41'),
(9,'user','user add root','add','view','on','on','on','on','Yes',NULL,'2018-11-17 03:47:48'),
(10,'user','user edit root','edit','view','on','on','on','on','Yes',NULL,'2018-11-17 03:48:34'),
(11,'group','group view root','view','view','on','on','on','on','Yes',NULL,'2018-11-17 03:52:36'),
(12,'group','group add root','add','view','on','on','on','on','Yes',NULL,'2018-11-17 03:58:07'),
(13,'group','group edit root','edit','view','on','on','on','on','Yes',NULL,'2018-11-17 03:58:26'),
(14,'ref_kategori','ref_kategori view root','view','view','on','on','on','on','Yes',NULL,'2018-11-17 04:12:38'),
(15,'ref_kategori','ref_kategori add root','add','view','on','on','on','on','Yes',NULL,'2018-11-17 04:14:13'),
(16,'ref_kategori','ref_kategori edit root','edit','view','on','on','on','on','Yes',NULL,'2018-11-17 04:15:04'),
(17,'akun','akun view root','view','view','on','on','on','on','Yes',NULL,'2018-11-17 05:58:49'),
(18,'akun','akun editPassword root','editPassword','view','on','on','on','on','Yes',NULL,'2018-11-17 05:59:35');

/*Table structure for table `default_setting` */

DROP TABLE IF EXISTS `default_setting`;

CREATE TABLE `default_setting` (
  `setId` varchar(50) NOT NULL,
  `setNama` varchar(255) DEFAULT NULL,
  `setValue` text,
  `setOrder` int(15) DEFAULT NULL,
  `setTimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`setId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `default_setting` */

insert  into `default_setting`(`setId`,`setNama`,`setValue`,`setOrder`,`setTimestamp`) values 
('','NAMA APLIKASI','SISTEM INFORMASI AKADEMIK (SIMAK)',1,'2017-07-29 04:25:46'),
('ALMINS','ALAMAT INSTANSI','Yogyakarta',7,'2017-07-29 04:28:02'),
('DESCAPP','DESKRIPSI APLIKASI','SIMAK merupakan aplikasi yang digunakan sebagai sarana manajemen Tesis di Program Pasca Sarjana Hukum Universitas Islam Indonesia ',5,'2017-07-29 04:23:32'),
('LOGO','LOGO UII','logo2.png',8,'2017-07-29 04:21:59'),
('NMINS','NAMA INSTANSI','Program Pasca Sarja Hukum Universitas Islam Indonesia',6,'2017-07-29 04:23:32'),
('NMKET','NAMA KETUA PASCA SARJANA UII','Agus Triyanta',9,'2017-07-29 04:22:01'),
('NMSAPP','NAMA SINGKAT APLIKASI','SIMAK',2,'2017-07-29 04:23:32'),
('SKSM','NO SURAT KEPUTUSAN TIM PENGUJI SEMINAR','SK/SMPL01/SMN012017',13,'2017-07-29 04:22:33'),
('SKUJ','NO SURAT KEPUTUSAN TIM PENGUJI UJIAN','SK/SMPL01/UJN012017',15,'2017-07-29 04:22:28'),
('SRTJT','NO SURAT PENGANTAR BIMBINGAN JUDUL','SRT/SMPL01/BIM012017',12,'2017-07-29 04:22:37'),
('SRTSM','NO SURAT PERMOHONAN PENGUJI SEMINAR','SRT/SMPL01/SMN012017',14,'2017-07-29 04:22:30'),
('SRTUJ','NO SURAT PERMOHONAN PENGUJI UJIAN','SRT/SMPL01/UJN012017',16,'2017-07-29 04:22:26'),
('THNRIL','TAHUN RILIS','2017',4,'2017-07-29 04:23:32'),
('TTD','TANDA TANGAN KETUA','ttd.png',11,'2017-07-29 04:22:41'),
('VAPP','VERSI APLIKASI','Versi 1.0',3,'2017-07-29 04:23:32');

/*Table structure for table `default_user` */

DROP TABLE IF EXISTS `default_user`;

CREATE TABLE `default_user` (
  `userId` bigint(20) NOT NULL AUTO_INCREMENT,
  `realname` varchar(100) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `description` text,
  `foto` varchar(255) DEFAULT NULL,
  `active` enum('Yes','No') DEFAULT NULL,
  `appId` smallint(20) DEFAULT NULL,
  PRIMARY KEY (`userId`),
  KEY `appId` (`appId`),
  CONSTRAINT `default_user_ibfk_1` FOREIGN KEY (`appId`) REFERENCES `default_application` (`app_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `default_user` */

insert  into `default_user`(`userId`,`realname`,`username`,`password`,`description`,`foto`,`active`,`appId`) values 
(1,'Superadmin','root','e79a656c63f7afd994285ab491c96726','Superadmin Akses','','Yes',1),
(2,'Admin','admin','a577e0ad6296e88fb1898ecace3cd043','Admin akses','1711181602.png','Yes',1),
(10,'junior developer','developer','5e8edd851d2fdfbd7415232c67367cc3','-','1711184249.png','No',1);

/*Table structure for table `ref_kategori` */

DROP TABLE IF EXISTS `ref_kategori`;

CREATE TABLE `ref_kategori` (
  `prodkat_id` int(20) NOT NULL AUTO_INCREMENT,
  `prodkat_nama` varchar(100) DEFAULT NULL,
  `prodkat_deskripsi` text,
  `prodkat_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`prodkat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `ref_kategori` */

insert  into `ref_kategori`(`prodkat_id`,`prodkat_nama`,`prodkat_deskripsi`,`prodkat_timestamp`) values 
(1,'DSLR','-','2018-07-05 01:39:17'),
(2,'Mirorless','-','2018-07-05 01:39:28'),
(3,'Lensa','-','2018-07-05 01:39:44'),
(4,'Aksesoris','-','2018-07-05 01:39:52');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
