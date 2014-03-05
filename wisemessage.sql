/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.6.12-log : Database - wisemessage
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`wisemessage` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `wisemessage`;

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `groups` */

insert  into `groups`(`id`,`Name`) values (12,'test1'),(11,'test'),(10,'hummmmm'),(9,'wiseyaks');

/*Table structure for table `grp_members` */

DROP TABLE IF EXISTS `grp_members`;

CREATE TABLE `grp_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `grp_members` */

insert  into `grp_members`(`id`,`groupid`,`userid`) values (1,5,16),(2,5,15),(3,6,15),(4,7,15),(5,8,15),(6,9,17),(7,9,18),(9,10,17),(10,10,18),(13,11,21),(14,12,17),(15,12,18),(17,12,22),(18,12,24);

/*Table structure for table `request` */

DROP TABLE IF EXISTS `request`;

CREATE TABLE `request` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(500) NOT NULL,
  `message` varchar(2000) NOT NULL,
  `is_scheduled` tinyint(1) NOT NULL,
  `msg_date` date NOT NULL,
  `msg_from` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `request` */

insert  into `request`(`id`,`user_name`,`message`,`is_scheduled`,`msg_date`,`msg_from`) values (10,'sandnigga','A new test message',0,'2014-02-18',0),(11,'sandnigga','A new test message',0,'2014-02-18',0),(12,'sandnigga','A new test message',0,'2014-02-18',0),(13,'sandnigga','A new test message',0,'2014-02-18',0),(14,'sandnigga','A new test message',0,'2014-02-18',0),(15,'sandnigga','Hey there, how are you',0,'2014-02-18',0),(16,'sandnigga','Hey guys! How are you doing. - Naresh :)',0,'2014-02-18',0),(17,'sandnigga','adsasd',0,'2014-02-18',0),(18,'sandnigga','fdgfdg',0,'2014-02-18',0),(19,'sandnigga','safsfsfs',0,'2014-02-18',0),(20,'sandnigga','hello',0,'2014-02-18',0);

/*Table structure for table `requestlog` */

DROP TABLE IF EXISTS `requestlog`;

CREATE TABLE `requestlog` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `request_id` int(255) NOT NULL,
  `msg_to` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `complete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `requestlog` */

insert  into `requestlog`(`id`,`request_id`,`msg_to`,`type`,`complete`) values (1,7,'9851161076','SMSMessage',1),(2,7,'9851161076','SMSMessage',1),(3,7,'9851161076','SMSMessage',1),(4,7,'naresh.thapa@wiseyak.com','EmailMessage',1),(5,7,'naresh.thapa@wiseyak.com','EmailMessage',1),(6,8,'9851161076','SMSMessage',1),(7,8,'9851161076','SMSMessage',1),(8,8,'9851161076','SMSMessage',1),(9,8,'naresh.thapa@wiseyak.com','EmailMessage',1),(10,8,'naresh.thapa@wiseyak.com','EmailMessage',1),(11,9,'9851161076','SMSMessage',1),(12,9,'9851161076','SMSMessage',1),(13,9,'naresh.thapa@wiseyak.com','EmailMessage',1),(14,9,'naresh.thapa@wiseyak.com','EmailMessage',1),(15,10,'Array','SMSMessage',1),(16,10,'Array','SMSMessage',1),(17,11,'9851161076','SMSMessage',1),(18,11,'','SMSMessage',1),(19,13,'9851161076','SMSMessage',1),(20,13,'naresh.thapa@wiseyak.com','EmailMessage',1),(21,13,'naresh.thapa@wiseyak.com','EmailMessage',1),(22,14,'9851161076','SMSMessage',1),(23,14,'naresh.thapa@wiseyak.com','EmailMessage',1),(24,14,'naresh.thapa@wiseyak.com','EmailMessage',1),(25,15,'9851161076','SMSMessage',1),(26,15,'naresh.thapa@wiseyak.com','EmailMessage',1),(27,16,'9803519294','SMSMessage',1),(28,16,'9841202378','SMSMessage',1),(29,16,'raj.maharjan@wiseyak.com','EmailMessage',1),(30,16,'sworup.shakya@wiseyak.com','EmailMessage',1),(31,17,'9849121159','SMSMessage',1),(32,17,'mail.anishpradhan@gmail.com','EmailMessage',1),(33,18,'9849873006','SMSMessage',1),(34,19,'Sulav.Kafley@wiseyak.com','EmailMessage',1),(35,20,'9841147500','SMSMessage',1),(36,20,'anuj.tamrakar@wiseyak.com','EmailMessage',1);

/*Table structure for table `tbl_users` */

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Mobile` varchar(100) NOT NULL,
  `Nickname` varchar(100) DEFAULT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `Active` tinyint(1) NOT NULL,
  `email` varchar(200) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_users` */

insert  into `tbl_users`(`id`,`Name`,`Address`,`Mobile`,`Nickname`,`Username`,`Password`,`Role`,`Active`,`email`,`Gender`) values (4,'dsad','dsad','9851161076','sadsa','dsadsa','1234','Admin',0,'naresh.thapa@wiseyak.com',''),(3,'dsad','dsad','9851161076','sadsa','dsadsa','','Admin',0,'naresh.thapa@wiseyak.com',''),(16,'naresh','ktm','9851161076','ram','naresh','naresh','Admin',1,'naresh.thapa@wiseyak.com',''),(7,'dsad','dsad','9851161076','sadsa','dsadsa','hhgjh','Admin',0,'naresh.thapa@wiseyak.com',''),(8,'dsad','dsad','9851161076','sadsa','dsadsa','','Admin',0,'naresh.thapa@wiseyak.com',''),(9,'dsad','dsad','9851161076','sadsa','dsadsa','','Admin',0,'naresh.thapa@wiseyak.com',''),(10,'new','dsad','9851161076','sadsa','dsadsa','','Admin',0,'naresh.thapa@wiseyak.com',''),(11,'jhgjhgjgj','dsad','9851161076','sadsa','dsadsa','','Admin',0,'naresh.thapa@wiseyak.com',''),(12,'hhehehehhe','dsad','9851161076','sadsa','dsadsa','','Admin',0,'naresh.thapa@wiseyak.com',''),(15,'test user','ktm','9851161076','ram','rambahadur','rambahadur','Admin',0,'naresh.thapa@wiseyak.com',''),(17,'Raj','Kathmandu','9803519294','becham','wisesms','pwd','Admin',1,'raj.maharjan@wiseyak.com',''),(18,'Sworup','ktm','9841202378','sandwichslayer','sandnigga','123456','Admin',1,'sworup.shakya@wiseyak.com','M'),(20,'sdfgs','sdfg','9851161076','sandwichslayer','sdfg','sdfg','Admin',0,'naresh.thapa@wiseyak.com',''),(21,'asdfasdf','asdf','9851161076','asdf','asdf','asdf','Admin',0,'naresh.thapa@wiseyak.com',''),(22,'sdfgsdfgsdfgsdfsdfg','sdfgsdfg','9851161076','asdf','sdfgsdfg','sdfgsdfg','Admin',0,'naresh.thapa@wiseyak.com','M'),(23,'sdfgsdfgs','sdfg','9851161076','asdf','sdfg','sdfg','Admin',0,'naresh.thapa@wiseyak.com','M'),(24,'anish pradhan','kupandole','9849121159','anish','anish','wisepass','Admin',1,'mail.anishpradhan@gmail.com','M'),(25,'Sulav Kafley','Sanepa','9849873006','Sulav','sulav','sulav','Admin',1,'Sulav.Kafley@wiseyak.com','M'),(26,'Anuj Tamrakar','Kalimati','9841147500','','anuj','qweasdzxc','Admin',1,'anuj.tamrakar@wiseyak.com','M');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
