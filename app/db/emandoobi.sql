-- MySQL dump 10.13  Distrib 5.7.9, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: emandoobi
-- ------------------------------------------------------
-- Server version	5.6.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `api_keys`
--

DROP TABLE IF EXISTS `api_keys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `api_keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token_key` varchar(225) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `api_keys`
--

/*!40000 ALTER TABLE `api_keys` DISABLE KEYS */;
/*!40000 ALTER TABLE `api_keys` ENABLE KEYS */;

--
-- Temporary view structure for view `application_actions`
--

DROP TABLE IF EXISTS `application_actions`;
/*!50001 DROP VIEW IF EXISTS `application_actions`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `application_actions` AS SELECT 
 1 AS `action_type`,
 1 AS `user_id`,
 1 AS `application_id`,
 1 AS `process_type`,
 1 AS `process_stage`,
 1 AS `field1`,
 1 AS `field2`,
 1 AS `created_date`,
 1 AS `created_by`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `application_details`
--

DROP TABLE IF EXISTS `application_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) DEFAULT NULL,
  `emp_photo` varchar(255) DEFAULT NULL,
  `emp_passport1` varchar(255) DEFAULT NULL,
  `emp_passport2` varchar(255) NOT NULL,
  `emp_passport3` varchar(255) NOT NULL,
  `trade_license` varchar(255) DEFAULT NULL,
  `establishment_card` varchar(255) DEFAULT NULL,
  `emirates_id` varchar(255) NOT NULL,
  `emirates_id_back` varchar(200) NOT NULL,
  `medical_certificate` varchar(255) NOT NULL,
  `health_insurence` varchar(255) NOT NULL,
  `emp_noc` varchar(255) DEFAULT NULL,
  `emp_contract` varchar(255) DEFAULT NULL,
  `education_certificate` varchar(255) DEFAULT NULL,
  `visa_form` varchar(255) DEFAULT NULL,
  `visit_visa_copy` varchar(50) DEFAULT NULL,
  `residency_copy` varchar(50) DEFAULT NULL,
  `labour_card` varchar(255) NOT NULL,
  `other_approval` varchar(255) DEFAULT NULL,
  `other` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(10) NOT NULL,
  `modified_by` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_details`
--

/*!40000 ALTER TABLE `application_details` DISABLE KEYS */;
INSERT INTO `application_details` VALUES (1,1,NULL,'abc.png','','','trade.png','card.png','','','','','bcd.png',NULL,NULL,NULL,NULL,NULL,'',NULL,'','tesrrrr','2016-11-02 20:57:43','2016-11-02 20:57:43',0,0),(2,18,'photo-1479117844.JPG','trade-1479117844.jpg','','',NULL,NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'','','2016-11-14 15:34:04','2016-11-14 15:34:04',0,0),(3,19,'photo-1479118696.jpg','passport-1479118696.jpg','','',NULL,NULL,'','','','',NULL,NULL,'education-1479118696.jpg','visa-1479118696.jpg',NULL,NULL,'','education-1479118696.jpg','other-1479118696.jpg','','2016-11-14 15:48:17','2016-11-14 15:48:17',0,0),(4,20,'photo-1479122359.jpg','passport-1479122359.jpg','','',NULL,NULL,'','','','',NULL,NULL,'emirates_id-1479122359.JPG','emirates_id-1479122359.jpg',NULL,NULL,'','education-1479122359.jpg','other-1479122359.jpg','','2016-11-14 16:49:19','2016-11-14 16:49:19',0,0),(5,22,'photo-1479647952.jpg','passport-1479647952.jpg','','',NULL,NULL,'','','','',NULL,NULL,'','visa-1479647952.jpg',NULL,NULL,'','','','','2016-11-20 18:49:12','2016-11-20 18:49:12',0,0),(6,23,'photo-1480000310.JPG','passport-1480000310.jpg','','',NULL,NULL,'','','','',NULL,NULL,'education-1480000310.jpg','visa-1480000310.jpg',NULL,NULL,'','education-1480000310.jpg','other-1480000310.jpg','','2016-11-24 20:41:50','2016-11-24 20:41:50',0,0),(7,24,'photo-1480000470.jpg','passport-1480000470.jpg','','',NULL,NULL,'','','','',NULL,NULL,'emirates_id-1480000470.jpg','emirates_id-1480000470.jpg',NULL,NULL,'','education-1480000470.jpg','other-1480000470.jpg','','2016-11-24 20:44:30','2016-11-24 20:44:30',0,0),(8,27,'photo-1480001203.jpg','passport-1480001203.jpg','','','passport-1480001203.jpg','passport-1480001203.jpg','','','','',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'','','2016-11-24 20:56:43','2016-11-24 20:56:43',0,0),(9,31,'','','','',NULL,NULL,'','','','',NULL,NULL,'','',NULL,NULL,'','','','','2016-12-09 23:12:28','2016-12-09 23:12:28',0,0),(10,32,'','','','',NULL,NULL,'','','','',NULL,NULL,'','',NULL,NULL,'','','','','2016-12-09 23:18:25','2016-12-09 23:18:25',0,0),(11,33,'','','','',NULL,NULL,'','','','',NULL,NULL,'','',NULL,NULL,'','','','','2016-12-09 23:19:46','2016-12-09 23:19:46',0,0),(12,35,'','passport1-1482067863.jpg','passport2-1482067863.jpg','passport3-1482067863.jpg',NULL,NULL,'','','','',NULL,NULL,'','visa-1482067863.jpg',NULL,NULL,'','','','','2016-12-18 19:01:03','2016-12-18 19:01:03',0,0),(13,36,'photo-1482946445.jpg','','','',NULL,NULL,'','','','',NULL,NULL,'','',NULL,NULL,'','','','','2016-12-28 23:04:06','2016-12-28 23:04:06',0,0),(14,37,'photo-1482948383.jpg','','','',NULL,NULL,'','','emirates_id-1482948383.jpg','emirates_id-1482948383.jpg',NULL,NULL,'emirates_id-1482948383.jpg','',NULL,NULL,'','','','dfdfdfd','2016-12-28 23:36:23','2017-04-22 20:26:43',0,0),(15,38,'','','','','','passport-1482950875.jpg','','','','',NULL,NULL,'','passport-1482950875.jpg',NULL,NULL,'','education-1482950875.jpg','','','2016-12-29 00:17:55','2016-12-29 00:17:55',0,0),(16,39,'','','','','passport-1482950982.JPG','passport-1482950982.gif','','','','',NULL,'passport-1482950982.jpg','passport-1482950982.jpg','',NULL,NULL,'','','','','2016-12-29 00:19:42','2016-12-29 00:19:42',0,0),(17,40,NULL,NULL,'','',NULL,NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'','','2016-12-29 00:35:32','2016-12-29 00:35:32',0,0),(18,41,'','','passport2-1482952294.jpg','passport3-1482952294.jpg',NULL,NULL,'','','','',NULL,NULL,NULL,'passport-1482952294.JPG',NULL,NULL,'','education-1482952294.jpg','','','2016-12-29 00:41:34','2016-12-29 00:41:34',0,0),(19,42,'','','','',NULL,NULL,'emirates_id-1483201590.jpg','emirates_id-1483201590.jpg','','',NULL,NULL,'','',NULL,NULL,'','','','','2016-12-31 21:56:30','2016-12-31 21:56:30',0,0),(38,108,'photo-1492104258.JPG','photo-1492104258.png','passport2-1492104258.png','',NULL,NULL,'','','','',NULL,NULL,'','visa-1492104258.jpg',NULL,NULL,'','','','','2017-04-13 22:54:18','2017-04-22 20:16:01',0,0),(21,44,'photo-1483208784.jpg','','','','','','','','','',NULL,'emp_contract-1483208784.jpg','','visa_form-1483208784.png',NULL,NULL,'','','','','2016-12-31 23:56:24','2016-12-31 23:56:24',0,0),(22,45,'','','','',NULL,NULL,'','','','',NULL,NULL,'','',NULL,NULL,'','','','','2017-01-06 23:06:23','2017-01-06 23:06:23',0,0),(23,46,'','','','',NULL,NULL,'','','','',NULL,NULL,'','',NULL,NULL,'','','','','2017-01-06 23:07:55','2017-01-06 23:07:55',0,0),(24,47,'','','','',NULL,NULL,'','','','',NULL,NULL,'','',NULL,NULL,'','','','','2017-01-06 23:52:50','2017-01-06 23:52:50',0,0),(25,48,'','','','',NULL,NULL,'','','','',NULL,NULL,'','',NULL,NULL,'','','','','2017-01-08 01:17:16','2017-01-08 01:17:16',0,0),(26,49,'','','','',NULL,NULL,'','','','',NULL,NULL,NULL,'',NULL,NULL,'','','','tet','2017-01-23 20:32:42','2017-01-23 20:32:42',0,0),(37,107,'','','','',NULL,NULL,'','','','',NULL,NULL,'','',NULL,NULL,'','','','','2017-04-12 21:09:24','2017-04-12 21:09:24',0,0),(28,51,'','','','',NULL,NULL,'','','','',NULL,NULL,'','',NULL,NULL,'','','','','2017-02-09 01:03:31','2017-02-09 01:03:31',0,0),(29,52,'photo-1486750366.png','passport1-1486750366.png','','',NULL,NULL,'','','','',NULL,NULL,'','',NULL,NULL,'','','','','2017-02-10 23:42:46','2017-02-10 23:42:46',0,0),(30,100,'photo-1488728333.png','','','',NULL,NULL,'','','','',NULL,NULL,'','',NULL,NULL,'','','','','2017-03-05 21:08:53','2017-03-05 21:08:53',0,0),(31,101,'','','','',NULL,NULL,'','','','',NULL,NULL,'','',NULL,NULL,'','','','','2017-03-06 21:53:44','2017-03-06 21:53:44',0,0),(32,102,'','','','',NULL,NULL,'','','','',NULL,NULL,'','',NULL,NULL,'','','','','2017-03-08 20:45:43','2017-03-08 20:45:43',0,0),(33,103,'','','','',NULL,NULL,'','','','',NULL,NULL,'','',NULL,NULL,'','','','','2017-03-12 22:38:39','2017-03-12 22:38:39',0,0),(34,104,'','','','',NULL,NULL,'','','','',NULL,NULL,'','',NULL,NULL,'','','','','2017-03-13 09:53:50','2017-03-13 09:53:50',0,0),(35,105,'','','','',NULL,NULL,'','','','',NULL,NULL,'','',NULL,NULL,'','','','','2017-03-16 20:41:05','2017-03-16 20:41:05',0,0),(36,106,'','','','',NULL,NULL,'emirates_id-1491121621.jpg','emirates_id-1491121621.JPG','','health_cer-1491121621.png',NULL,NULL,'','',NULL,NULL,'','other_app-1491121621.jpg','other-1491121621.gif','THis is test my phone','2017-04-02 13:57:01','2017-04-02 13:57:01',0,0),(39,109,'photo-1492107454.png','emp_passport1-1492107454.jpg','','',NULL,NULL,'emirates_id-1492107455.jpg','','','',NULL,NULL,'education_certificate-1492107454.jpg','visa_form-1492966450.jpg',NULL,NULL,'','','photo-1492107455.jpg','ewewew','2017-04-13 23:47:35','2017-04-29 21:52:34',0,0),(40,110,'photo-1492108511.JPG','emp_passport1-1492108511.png','emp_passport2-1492108511.png','',NULL,NULL,'','','','',NULL,NULL,NULL,'',NULL,NULL,'','','photo-1492108511.JPG','dfdfdf','2017-04-14 00:05:11','2017-04-29 21:52:34',0,0),(46,114,'photo-1493406452.jpg','emp_passport1-1493406452.png','emp_passport2-1493406452.png','emp_passport3-1493406452.jpg',NULL,NULL,'emirates_id-1493406452.jpg','emirates_id_back-1493406452.jpg','','health_insurence-1493406452.JPG',NULL,NULL,'education_certificate-1493406452.JPG','visa_form-1493406452.JPG',NULL,NULL,'','photo-1493406452.jpg','photo-1493406452.JPG','','2017-04-28 23:07:32','2017-04-29 21:52:34',0,0),(43,111,'','','','',NULL,NULL,'','','','',NULL,NULL,'','',NULL,NULL,'','','','','2017-04-23 23:57:07','2017-04-29 21:52:34',0,0),(44,112,'','','','',NULL,NULL,'','','','',NULL,NULL,'','',NULL,NULL,'','','','','2017-04-24 03:33:44','2017-04-29 21:52:34',0,0),(45,113,'','','','',NULL,NULL,'','','','',NULL,NULL,'','',NULL,NULL,'','photo-1492973331.jpg','','','2017-04-23 22:48:51','2017-04-29 21:52:34',0,0),(47,115,'emp_photo-1493407064.JPG','emp_passport1-1493407064.jpg','emp_passport2-1493407064.png','emp_passport3-1493407064.JPG',NULL,NULL,'emirates_id-1493407064.png','emirates_id_back-1493407064.JPG','','health_insurence-1493407064.jpg',NULL,NULL,'education_certificate-1493407064.JPG','visa_form-1493407064.jpg',NULL,NULL,'','other_approval-1493407064.jpg','other-1493407064.JPG','','2017-04-28 23:17:44','2017-04-29 21:52:34',0,0),(48,116,'','','','',NULL,NULL,'','','','',NULL,NULL,'','',NULL,NULL,'','','','','2017-05-05 23:38:31','2017-05-05 23:38:31',0,0),(49,117,'','','','',NULL,NULL,'','','','',NULL,NULL,'','',NULL,NULL,'','','','','2017-05-10 22:30:59','2017-05-10 22:30:59',0,0),(50,118,'','','','',NULL,NULL,'','','','',NULL,NULL,'','',NULL,NULL,'','','','','2017-05-10 22:31:42','2017-05-10 22:31:42',0,0),(57,125,'emp_photo-1496344291.jpeg','emp_passport1-1496344291.jpg','','',NULL,NULL,'emirates_id-1496344291.jpg','','','',NULL,NULL,'education_certificate-1496344291.jpg','','',NULL,'','','','','2017-06-01 23:11:31','2017-06-01 23:11:31',0,0),(52,120,'','','','',NULL,NULL,'','','','',NULL,NULL,NULL,'',NULL,NULL,'','','','','2017-05-10 23:28:35','2017-05-10 23:28:35',0,0),(53,121,'','','','',NULL,NULL,'','','','',NULL,NULL,'','',NULL,NULL,'','','','','2017-05-11 20:01:56','2017-05-11 20:01:56',0,0),(54,122,'','emp_passport1-1494603660.jpg','','',NULL,NULL,'','','','',NULL,NULL,'','','visit_visa_copy-1494603660.jpg',NULL,'','','','','2017-05-12 19:41:00','2017-05-12 19:41:00',0,0),(55,123,'','','','',NULL,NULL,'','','','',NULL,NULL,'','','',NULL,'','','','','2017-05-28 14:53:16','2017-05-28 14:53:16',0,0),(56,124,'','','','',NULL,NULL,'','','','',NULL,NULL,'','','',NULL,'','','','','2017-05-28 15:05:44','2017-05-28 15:05:44',0,0),(58,126,'','','','',NULL,NULL,'','','','',NULL,NULL,'','','',NULL,'','','','','2017-06-10 19:01:51','2017-06-10 19:01:51',0,0),(59,127,'','','','',NULL,NULL,'','','','',NULL,NULL,'','','',NULL,'','','','','2017-06-26 16:42:45','2017-06-26 16:42:45',0,0),(60,128,'','','','',NULL,NULL,'','','','',NULL,NULL,'','','',NULL,'','','','','2017-06-26 16:47:33','2017-06-26 16:47:33',0,0),(61,129,'','','','',NULL,NULL,'','','','',NULL,NULL,'','',NULL,'','','','','','2017-07-15 18:45:49','2017-07-15 18:45:49',0,0),(62,130,'emp_photo-1507410002.jpg','','','',NULL,NULL,'','','','',NULL,NULL,'','',NULL,'','','','','','2017-10-08 01:00:02','2017-10-08 01:00:02',0,0),(63,131,'emp_photo-1507480646.png','','','',NULL,NULL,'','','','',NULL,NULL,'','','',NULL,'','','','','2017-10-08 20:37:26','2017-10-08 20:37:26',0,0),(64,132,'','','','',NULL,NULL,'','','','',NULL,NULL,'','','',NULL,'','','','','2017-10-08 20:39:35','2017-10-08 20:39:35',0,0),(65,133,'','emp_passport1-1507482548.png','','',NULL,NULL,'','','','',NULL,NULL,'education_certificate-1507482548.png',NULL,NULL,'','',NULL,'','ssdsdsad','2017-10-08 21:09:08','2017-10-08 21:09:08',0,0),(66,135,'','','','',NULL,NULL,'','','','',NULL,NULL,NULL,'',NULL,'','labour_card-1507563708.jpeg','','','dsdsdsdsds','2017-10-09 19:41:48','2017-10-09 19:41:48',0,0);
/*!40000 ALTER TABLE `application_details` ENABLE KEYS */;

--
-- Table structure for table `application_issues`
--

DROP TABLE IF EXISTS `application_issues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application_issues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `process_type` tinyint(4) NOT NULL COMMENT '1=>new residency,2=>renew, 3=>local transfer',
  `application_id` int(11) NOT NULL,
  `process_stage` tinyint(2) NOT NULL,
  `issues` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `supporting_document` text,
  `issue_solved` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_issues`
--

/*!40000 ALTER TABLE `application_issues` DISABLE KEYS */;
INSERT INTO `application_issues` VALUES (1,2,1,127,1,'[\"0\",\"0\",\"0\",\"education\",\"0\",\"0\"]','test',NULL,0,2,'2017-09-03 10:37:59','2017-09-03 12:07:59'),(2,2,1,128,1,'[\"0\",\"0\",\"medical\",\"0\",\"0\",\"0\"]','test',NULL,0,2,'2017-09-03 10:38:24','2017-09-03 12:08:24'),(3,2,1,124,3,'[\"0\",\"0\",\"medical\",\"0\",\"0\",\"0\"]','new test',NULL,0,2,'2017-09-03 10:41:52','2017-09-03 12:11:52');
/*!40000 ALTER TABLE `application_issues` ENABLE KEYS */;

--
-- Table structure for table `application_logs`
--

DROP TABLE IF EXISTS `application_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application_logs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `process_type` int(2) DEFAULT NULL COMMENT '1=>new residency,2=>renew, 3=>local transfer',
  `company_id` int(11) NOT NULL,
  `employee_id_number` varchar(50) DEFAULT NULL,
  `country_type` int(2) DEFAULT NULL COMMENT '1=>inside, 2=>outside',
  `employee_name` varchar(255) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `marital_status` int(2) DEFAULT NULL COMMENT '1=>single, 2=>married',
  `mother_name` varchar(150) DEFAULT NULL,
  `father_name` varchar(150) DEFAULT NULL,
  `phone_inside` varchar(15) DEFAULT NULL,
  `phone_outside` varchar(15) DEFAULT NULL,
  `address_inside` varchar(255) DEFAULT NULL,
  `address_outside` varchar(255) DEFAULT NULL,
  `all_documents` text,
  `created_by` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=153 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_logs`
--

/*!40000 ALTER TABLE `application_logs` DISABLE KEYS */;
INSERT INTO `application_logs` VALUES (152,113,2,2,20,'test12121',NULL,'renew apps','php',1,'','','','','','',NULL,2,'2017-04-23 22:48:51','2017-04-23 22:48:51');
/*!40000 ALTER TABLE `application_logs` ENABLE KEYS */;

--
-- Table structure for table `application_processes`
--

DROP TABLE IF EXISTS `application_processes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application_processes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `process_type` tinyint(4) NOT NULL COMMENT '1=>new residency,2=>renew, 3=>local transfer',
  `application_id` int(11) NOT NULL,
  `process_stage` tinyint(2) NOT NULL,
  `completion_date` varchar(50) NOT NULL,
  `supporting_document` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_processes`
--

/*!40000 ALTER TABLE `application_processes` DISABLE KEYS */;
INSERT INTO `application_processes` VALUES (6,2,1,46,3,'18-01-2017','supporting-1484761753.png',2,'2017-01-18 11:19:13'),(8,2,3,44,3,'25-01-2017','supporting-1485360636.JPG',2,'2017-01-25 09:40:36'),(9,2,3,38,6,'25-01-2017','supporting-1485360669.png',2,'2017-01-25 09:41:09'),(10,2,3,38,1,'25-01-2017','',2,'2017-01-25 09:41:30'),(11,2,3,38,2,'25-01-2017','',2,'2017-01-25 09:41:41'),(12,2,3,38,3,'25-01-2017','',2,'2017-01-25 09:41:48'),(13,2,2,52,1,'23-02-2017','',2,'2017-02-23 09:50:50'),(14,2,2,52,2,'23-02-2017','supporting-1487866867.jpg',2,'2017-02-23 09:51:07'),(15,2,2,52,3,'23-02-2017','',2,'2017-02-23 09:51:12'),(16,2,2,52,4,'23-02-2017','',2,'2017-02-23 09:51:20'),(20,2,1,51,2,'01-03-2017','',2,'2017-03-01 08:42:21'),(21,2,1,51,3,'01-03-2017','',2,'2017-03-01 08:55:13'),(22,2,1,51,4,'01-03-2017','',2,'2017-03-01 08:57:12'),(23,2,1,51,5,'01-03-2017','',2,'2017-03-01 09:27:55'),(28,2,2,100,1,'05-03-2017','supporting-1488732359.png',18,'2017-03-05 10:15:59'),(29,2,2,100,3,'06-03-2017','',2,'2017-03-06 09:27:38'),(30,2,2,100,2,'06-03-2017','supporting-1488816112.png',2,'2017-03-06 09:31:52'),(32,2,1,101,2,'08-03-2017','supporting-1488985245.png',2,'2017-03-08 08:30:45'),(40,2,1,101,6,'08-03-2017','supporting-1488986820.png',2,'2017-03-08 08:57:00'),(41,2,1,101,5,'08-03-2017','supporting-1488986990.png',2,'2017-03-08 08:59:50'),(54,2,1,102,1,'08-03-2017','supporting-1488988270.png',2,'2017-03-08 09:21:10'),(55,2,1,102,2,'08-03-2017','supporting-1488988291.png',2,'2017-03-08 09:21:31'),(56,2,1,102,3,'08-03-2017','supporting-1488988298.png',2,'2017-03-08 09:21:38'),(57,2,1,102,4,'08-03-2017','supporting-1488988309.png',2,'2017-03-08 09:21:49'),(58,2,1,102,5,'01-03-2017','supporting-1488988317.png',2,'2017-03-08 09:21:57'),(59,2,1,102,6,'08-03-2017','supporting-1488988327.png',2,'2017-03-08 09:22:07'),(60,2,1,101,1,'08-03-2017','',2,'2017-03-08 09:40:17'),(61,2,1,101,3,'08-03-2017','',2,'2017-03-08 09:40:22'),(62,2,1,101,4,'08-03-2017','',2,'2017-03-08 09:40:34'),(63,2,1,46,1,'08-03-2017','',2,'2017-03-08 09:41:07'),(64,2,1,46,2,'08-03-2017','',2,'2017-03-08 09:41:45'),(65,2,1,46,4,'08-03-2017','',2,'2017-03-08 09:42:58'),(66,2,1,46,5,'08-03-2017','',2,'2017-03-08 09:45:27'),(67,2,1,46,6,'08-03-2017','',2,'2017-03-08 09:45:37'),(68,2,1,51,1,'08-03-2017','',2,'2017-03-08 09:46:34'),(69,2,1,51,6,'08-03-2017','',2,'2017-03-08 09:47:17'),(70,2,3,44,5,'08-03-2017','',2,'2017-03-08 09:47:34'),(71,2,3,44,2,'08-03-2017','',2,'2017-03-08 09:56:09'),(73,2,2,100,4,'12-03-2017','supporting-1489338480.jpg',2,'2017-03-12 10:38:00'),(74,2,1,103,1,'12-03-2017','supporting-1489338533.jpg',2,'2017-03-12 10:38:53'),(75,2,1,103,2,'12-03-2017','supporting-1489338544.jpg',2,'2017-03-12 10:39:04'),(76,2,1,103,3,'12-03-2017','supporting-1489338672.jpg',2,'2017-03-12 10:41:12'),(77,2,1,103,4,'12-03-2017','supporting-1489338695.jpg',2,'2017-03-12 10:41:35'),(78,2,1,103,5,'12-03-2017','supporting-1489338709.jpg',2,'2017-03-12 10:41:49'),(79,2,1,103,6,'12-03-2017','supporting-1489338775.jpg',2,'2017-03-12 10:42:56'),(80,2,1,104,1,'13-03-2017','',2,'2017-03-13 09:54:45'),(81,2,1,104,2,'13-03-2017','',2,'2017-03-13 09:54:51'),(82,2,1,104,3,'13-03-2017','',2,'2017-03-13 09:55:00'),(83,2,1,104,4,'13-03-2017','',2,'2017-03-13 09:55:08'),(84,2,1,104,5,'13-03-2017','',2,'2017-03-13 09:55:12'),(86,2,1,35,2,'13-03-2017','',2,'2017-03-13 10:30:58'),(90,2,1,105,3,'16-03-2017','',2,'2017-03-16 09:36:03'),(91,2,1,105,2,'16-03-2017','supporting-1489680388.JPG',2,'2017-03-16 09:36:29'),(92,2,1,105,4,'16-03-2017','',2,'2017-03-16 09:38:30'),(93,2,1,48,2,'30-03-2017','',2,'2017-03-30 07:34:20'),(94,2,1,106,2,'03-04-2017','',2,'2017-04-03 10:22:18'),(95,2,1,109,2,'23-04-2017','',2,'2017-04-23 10:02:01'),(96,2,2,113,1,'26-04-2017','',2,'2017-04-26 11:51:17'),(97,2,1,112,1,'27-04-2017','',2,'2017-04-27 10:36:06'),(98,2,1,112,2,'28-04-2017','supporting-1493407998.png',2,'2017-04-28 11:33:18'),(99,2,1,106,1,'01-05-2017','supporting-1493653559.jpg',2,'2017-05-01 07:45:59'),(100,2,1,106,3,'01-05-2017','',2,'2017-05-01 07:46:05'),(101,2,1,106,4,'01-05-2017','',2,'2017-05-01 07:46:11'),(102,2,1,106,5,'01-05-2017','supporting-1493653584.jpg',2,'2017-05-01 07:46:24'),(103,2,1,106,6,'01-05-2017','supporting-1493653612.jpg',2,'2017-05-01 07:46:52'),(104,2,1,107,5,'03-05-2017','',2,'2017-05-03 23:42:25'),(105,2,1,107,3,'03-05-2017','',2,'2017-05-03 23:43:11'),(106,2,1,112,3,'04-05-2017','',2,'2017-05-04 00:32:05'),(107,2,3,10,1,'04-05-2017','',2,'2017-05-04 19:52:28'),(108,2,3,10,2,'04-05-2017','',2,'2017-05-04 19:53:50'),(109,2,3,3,1,'04-05-2017','',2,'2017-05-04 19:55:29'),(110,2,1,19,1,'04-05-2017','',2,'2017-05-04 19:59:10'),(111,2,2,20,1,'04-05-2017','',2,'2017-05-04 08:10:04'),(113,2,1,22,1,'04-05-2017','',2,'2017-05-04 20:33:38'),(114,2,1,32,1,'04-05-2017','',2,'2017-05-04 08:51:41'),(115,2,1,108,1,'04-05-2017','',2,'2017-05-04 08:52:17'),(116,2,1,115,1,'04-05-2017','',2,'2017-05-04 23:27:36'),(117,2,1,111,1,'04-05-2017','',2,'2017-05-04 23:48:19'),(118,2,1,115,2,'04-05-2017','',2,'2017-05-05 00:07:40'),(119,2,1,115,3,'04-05-2017','',2,'2017-05-05 00:11:34'),(120,2,1,114,1,'05-05-2017','',2,'2017-05-05 21:20:40'),(121,2,1,116,1,'05-05-2017','',2,'2017-05-05 23:44:12'),(122,2,1,117,1,'10-05-2017','',2,'2017-05-10 22:33:42'),(123,2,1,118,1,'10-05-2017','',2,'2017-05-10 22:37:12'),(124,2,1,118,2,'10-05-2017','',2,'2017-05-10 22:39:34'),(125,2,1,118,3,'10-05-2017','',2,'2017-05-10 22:43:02'),(126,2,1,118,4,'10-05-2017','',2,'2017-05-10 22:44:16'),(127,2,1,118,5,'12-05-2017','',2,'2017-05-10 22:45:04'),(128,2,1,118,6,'10-05-2017','',2,'2017-05-10 22:46:04'),(129,2,1,117,2,'10-05-2017','',2,'2017-05-10 22:51:03'),(130,2,1,117,3,'10-05-2017','',2,'2017-05-10 22:52:22'),(131,2,1,117,4,'10-05-2017','',2,'2017-05-10 22:53:12'),(132,2,1,117,5,'10-05-2017','',2,'2017-05-10 22:54:01'),(133,2,1,117,6,'10-05-2017','',2,'2017-05-10 22:54:44'),(140,2,4,120,1,'10-05-2017','',2,'2017-05-10 23:29:11'),(141,2,3,27,1,'11-05-2017','',2,'2017-05-11 00:36:00'),(142,2,3,27,2,'11-05-2017','',2,'2017-05-11 00:36:26'),(143,2,3,27,3,'11-05-2017','',2,'2017-05-11 00:46:24'),(144,2,3,27,4,'11-05-2017','',2,'2017-05-11 00:47:51'),(145,2,3,27,5,'11-05-2017','',2,'2017-05-11 00:48:02'),(146,2,3,27,6,'11-05-2017','',2,'2017-05-11 00:48:18'),(147,2,1,122,1,'12-05-2017','',2,'2017-05-12 20:59:43'),(148,2,1,125,1,'01-06-2017','supporting-1496344317.jpg',2,'2017-06-01 23:11:57'),(149,2,1,125,2,'01-06-2017','supporting-1496344358.jpg',2,'2017-06-01 23:12:38'),(150,2,1,114,2,'10-06-2017','supporting-1497114397.jpg',2,'2017-06-10 21:06:37'),(151,2,1,126,1,'12-06-2017','supporting-1497286121.jpeg',2,'2017-06-12 20:48:41'),(152,2,1,114,3,'16-06-2017','supporting-1497630407.pdf',2,'2017-06-16 20:26:47'),(153,2,3,10,2,'19-06-2017','supporting-1497889184.jpg',2,'2017-06-19 20:19:44'),(154,2,4,116,1,'28-10-2017','supporting-1507047636.jpg',2,'2017-10-03 20:20:36'),(155,2,2,129,2,'08-10-2017','',2,'2017-10-08 00:22:35'),(156,2,1,128,8,'08-10-2017','',2,'2017-10-08 00:34:35'),(157,2,2,130,4,'08-10-2017','',2,'2017-10-08 01:03:19'),(158,2,2,130,2,'28-10-2017','supporting-1507410220.jpg',2,'2017-10-08 01:03:40'),(159,2,2,130,1,'08-10-2017','',2,'2017-10-08 01:04:11'),(160,2,2,130,3,'08-10-2017','',2,'2017-10-08 01:04:25'),(161,2,2,130,5,'08-10-2017','',2,'2017-10-08 01:04:34');
/*!40000 ALTER TABLE `application_processes` ENABLE KEYS */;

--
-- Table structure for table `application_reference_numbers`
--

DROP TABLE IF EXISTS `application_reference_numbers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application_reference_numbers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `process_type` tinyint(4) NOT NULL COMMENT '1=>new residency,2=>renew, 3=>local transfer',
  `process_stage` int(11) NOT NULL,
  `ref_number` varchar(255) NOT NULL,
  `ref_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_reference_numbers`
--

/*!40000 ALTER TABLE `application_reference_numbers` DISABLE KEYS */;
INSERT INTO `application_reference_numbers` VALUES (1,2,48,1,2,'test-555','2017-01-18',2,'2017-01-18 09:35:36'),(2,2,48,1,1,'555','2017-01-18',2,'2017-01-18 09:50:48'),(3,2,46,1,2,'test-5','2017-01-18',2,'2017-01-18 10:03:35'),(5,2,48,1,6,'testere','2017-01-19',2,'2017-01-19 09:26:04'),(6,2,46,1,1,'test-66','2017-01-16',2,'2017-01-19 10:20:54'),(7,2,49,4,1,'can-333','2017-01-23',2,'2017-01-23 08:59:16'),(8,2,44,3,1,'test-444','2017-01-25',2,'2017-01-25 09:05:25'),(11,2,51,1,1,'fgfgffgf','2017-03-02',2,'2017-03-02 12:58:50'),(12,2,37,2,2,'ttttt','2017-03-08',17,'2017-03-08 10:03:42'),(13,2,103,1,4,'45454','2017-03-12',2,'2017-03-12 10:41:25'),(14,2,103,1,6,'fggfgf','2017-03-12',2,'2017-03-12 10:42:21'),(18,2,35,1,2,'4444','2017-03-13',2,'2017-03-13 08:37:11'),(19,2,36,1,1,'weew','2017-03-13',2,'2017-03-13 08:37:18'),(20,2,36,1,2,'growww','2017-03-13',2,'2017-03-11 08:37:27'),(21,2,10,3,2,'7777','2017-03-13',2,'2017-03-13 08:37:48'),(22,2,32,1,2,'78787','2017-03-14',2,'2017-03-14 09:56:04'),(23,2,105,1,1,'4545','2017-03-26',2,'2017-03-26 01:27:56'),(24,2,106,1,2,'jjjj','2017-04-01',2,'2017-04-03 08:09:37'),(25,2,106,1,3,'test123','2017-04-06',2,'2017-04-03 10:20:48'),(26,2,104,1,2,'wewewe','2017-04-12',2,'2017-04-04 09:28:24'),(27,2,104,1,3,'rewrrwrw','2017-04-08',2,'2017-04-04 09:38:27'),(28,2,112,1,1,'rtrt','2017-04-27',2,'2017-04-27 08:02:18'),(29,2,111,1,1,'hjhjhj','2017-04-27',2,'2017-04-27 08:08:02'),(30,2,108,1,1,'3212','2017-04-27',2,'2017-04-27 08:34:08'),(31,2,115,1,1,'erer44','2017-04-29',2,'2017-04-29 12:21:20'),(32,2,112,1,2,'332','2017-05-03',2,'2017-05-03 23:33:34'),(33,2,112,1,3,'34343','2017-05-03',2,'2017-05-03 23:33:45'),(34,2,10,3,1,'3434','2017-05-04',2,'2017-05-04 19:52:23'),(35,2,3,3,1,'sdsd','2017-05-04',2,'2017-05-04 19:54:35'),(36,2,19,1,1,'232','2017-05-04',2,'2017-05-04 19:58:25'),(37,2,20,2,1,'343','2017-05-04',2,'2017-05-04 20:09:15'),(38,2,22,1,1,'3434','2017-05-04',2,'2017-05-04 20:10:54'),(39,2,22,2,1,'dummy','2017-05-04',2,'2017-05-04 20:33:38'),(40,2,32,1,1,'434','2017-05-04',2,'2017-05-04 08:51:32'),(41,2,115,1,2,'3434','2017-05-04',2,'2017-05-04 23:29:17'),(42,2,107,1,1,'re33','2017-05-04',2,'2017-05-04 23:47:31'),(43,2,111,1,1,'dummy','2017-05-04',2,'2017-05-04 23:48:19'),(44,2,115,1,3,'2222','2017-05-04',2,'2017-05-05 00:10:36'),(45,2,114,1,1,'45455','2017-05-05',2,'2017-05-05 20:53:35'),(46,2,114,1,2,'dummy','2017-05-05',2,'2017-05-05 21:20:40'),(47,2,116,1,1,'111','2017-05-05',2,'2017-05-05 23:39:14'),(48,2,116,1,2,'dummy','2017-05-05',2,'2017-05-05 23:44:12'),(49,2,113,2,2,'no','2017-05-07',2,'2017-05-07 14:26:53'),(50,2,114,1,3,'yes','2017-05-07',2,'2017-05-07 14:34:36'),(51,2,117,1,1,'yes','2017-05-10',2,'2017-05-10 22:32:34'),(52,2,117,1,2,'dummy','2017-05-10',2,'2017-05-10 22:33:42'),(53,2,118,1,1,'yes','2017-05-10',2,'2017-05-10 22:36:49'),(54,2,118,1,2,'dummy','2017-05-10',2,'2017-05-10 22:37:12'),(55,2,118,1,3,'yes','2017-05-10',2,'2017-05-10 22:42:16'),(56,2,118,1,4,'yes','2017-05-10',2,'2017-05-10 22:43:48'),(57,2,118,1,5,'yes','2017-05-10',2,'2017-05-10 22:44:43'),(58,2,118,1,6,'yes','2017-05-10',2,'2017-05-10 22:45:29'),(59,2,117,1,3,'no','2017-05-10',2,'2017-05-10 22:51:49'),(60,2,117,1,4,'yes','2017-05-10',2,'2017-05-10 22:52:49'),(61,2,117,1,5,'yes','2017-05-10',2,'2017-05-10 22:53:44'),(62,2,117,1,6,'yes','2017-05-10',2,'2017-05-10 22:54:22'),(69,2,120,4,1,'yes','2017-05-10',2,'2017-05-10 23:28:57'),(70,2,116,1,4,'yes','2017-05-11',2,'2017-05-11 00:11:12'),(71,2,116,1,4,'yes','2017-05-11',2,'2017-05-11 00:11:20'),(72,2,109,1,1,'yes','2017-05-11',2,'2017-05-11 00:16:29'),(73,2,109,1,2,'yes','2017-05-11',2,'2017-05-11 00:17:49'),(74,2,108,1,2,'rerere','2017-05-11',2,'2017-05-11 00:30:17'),(75,2,108,1,3,'no','2017-05-11',2,'2017-05-11 00:30:30'),(76,2,108,1,4,'wewewewe3333','2017-05-11',2,'2017-05-11 00:31:20'),(77,2,109,1,3,'no','2017-05-11',2,'2017-05-11 00:35:22'),(78,2,109,1,4,'333333','2017-05-11',2,'2017-05-11 00:35:33'),(79,2,27,3,1,'www','2017-05-11',2,'2017-05-11 00:35:55'),(80,2,27,3,2,'','2017-05-11',2,'2017-05-11 00:36:04'),(81,2,27,3,3,'2222','2017-05-11',2,'2017-05-11 00:36:43'),(82,2,27,3,4,'2222','2017-05-11',2,'2017-05-11 00:47:46'),(83,2,27,3,5,'888','2017-05-11',2,'2017-05-11 00:47:57'),(84,2,27,3,6,'9999','2017-05-11',2,'2017-05-11 00:48:12'),(85,2,121,1,6,'test3333','2017-05-11',2,'2017-05-11 23:14:46'),(86,2,122,1,1,'9999','2017-05-12',2,'2017-05-12 20:59:36'),(87,2,121,1,3,'yes','2017-05-26',2,'2017-05-26 22:40:22'),(93,2,123,1,2,'4545454','2017-05-28',2,'2017-05-28 15:17:30'),(94,2,124,1,1,'34343','2017-05-28',2,'2017-05-28 15:17:41'),(95,2,124,1,2,'34343','2017-05-28',2,'2017-05-28 15:17:56'),(96,2,116,4,1,'222','2017-05-29',2,'2017-05-29 23:35:38'),(98,2,125,1,1,'ttrr','2017-06-01',2,'2017-06-01 23:12:07'),(99,2,125,1,2,'test','2017-06-03',2,'2017-06-01 23:12:24'),(100,2,107,1,2,'ytyt','2017-06-06',17,'2017-06-06 19:38:10'),(101,2,124,1,4,'tt666','2017-06-24',2,'2017-06-24 20:56:54'),(102,2,127,1,2,'mmm','2017-07-01',2,'2017-07-01 22:24:17'),(103,2,128,1,8,'4545TRR','2017-10-08',2,'2017-10-08 00:32:52'),(104,2,130,2,1,'','2017-10-19',2,'2017-10-08 01:03:51');
/*!40000 ALTER TABLE `application_reference_numbers` ENABLE KEYS */;

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applications` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `process_type` int(2) DEFAULT NULL COMMENT '1=>new residency,2=>renew, 3=>local transfer',
  `company_id` int(11) NOT NULL,
  `barcode` varchar(20) DEFAULT NULL,
  `employee_id_number` varchar(50) DEFAULT NULL,
  `country_type` int(2) DEFAULT NULL COMMENT '1=>inside, 2=>outside',
  `employee_name` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `marital_status` int(2) DEFAULT NULL COMMENT '1=>single, 2=>married',
  `mother_name` varchar(150) DEFAULT NULL,
  `father_name` varchar(150) DEFAULT NULL,
  `phone_inside` varchar(15) DEFAULT NULL,
  `phone_outside` varchar(15) DEFAULT NULL,
  `address_inside` varchar(255) DEFAULT NULL,
  `address_outside` varchar(255) DEFAULT NULL,
  `basic_salary` varchar(10) DEFAULT NULL,
  `housing_allowance` varchar(10) DEFAULT NULL,
  `transportation_allowance` varchar(10) DEFAULT NULL,
  `other_allowance` varchar(10) DEFAULT NULL,
  `process_status` text COMMENT 'this will update 1 to 7',
  `process_status_next` int(2) NOT NULL DEFAULT '1' COMMENT 'inserting next process to be done',
  `ref_number_status` varchar(255) NOT NULL,
  `process_issue` text,
  `next_typing` int(2) NOT NULL DEFAULT '1',
  `process_closed` int(1) NOT NULL DEFAULT '0' COMMENT '0=>in process, 1=>process closed',
  `expiry_date` varchar(30) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=136 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applications`
--

/*!40000 ALTER TABLE `applications` DISABLE KEYS */;
INSERT INTO `applications` VALUES (1,2,1,3,'E000001','',2,'Rakesh kumar',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',1,'','',1,1,'0000-00-00',0,'2016-10-01 23:50:28','2017-07-18 23:01:17'),(2,2,2,1,'E000002','',1,'deepak',NULL,'der',1,'rere','rererere','454545','','','',NULL,NULL,NULL,NULL,'',1,'','',1,1,'0000-00-00',0,'2016-10-01 23:53:07','2017-07-18 23:01:17'),(3,2,3,3,'E000003','',1,'dinesh singh',NULL,'php',1,'sita','ram','99999999','888888','delhi-11','del-44',NULL,NULL,NULL,NULL,'{\"1\":\"\"}',2,'{\"1\":\"sdsd\"}','',2,0,'0000-00-00',0,'2016-10-02 00:15:11','2017-07-18 23:01:17'),(4,2,1,6,'E000004','',1,'dinesh',NULL,'test',1,'','','','','','',NULL,NULL,NULL,NULL,'',1,'','',1,1,'0000-00-00',0,'2016-10-07 21:23:36','2017-07-18 23:01:17'),(10,2,3,12,'E000010','',1,'test',NULL,'test',1,'test','','','','','',NULL,NULL,NULL,NULL,'{\"1\":\"\",\"2\":\"\",\"2\":\"supporting-1497889184.jpg\"}',3,'{\"2\":\"7777\",\"1\":\"3434\"}','',3,0,'0000-00-00',0,'2016-10-20 19:09:46','2017-07-18 23:01:17'),(15,2,4,12,'E000015','',2,'rajesh kumar',NULL,'test',1,NULL,NULL,'90909090',NULL,'test',NULL,NULL,NULL,NULL,NULL,'',1,'','',1,1,'0000-00-00',0,'2016-11-02 20:57:43','2017-07-18 23:01:17'),(49,2,4,15,'E000049','',NULL,'pks',NULL,NULL,NULL,NULL,NULL,'9999999999',NULL,'test',NULL,NULL,NULL,NULL,NULL,NULL,1,'{\"1\":\"can-333\"}',NULL,2,0,'',2,'2017-01-23 20:32:42','2017-07-18 23:01:17'),(19,2,1,12,'E000019','',1,'ajit',NULL,'dev',1,'test','','','','','',NULL,NULL,NULL,NULL,'{\"1\":\"\"}',2,'{\"1\":\"232\"}','',2,0,'21',2,'2016-11-14 15:48:17','2017-07-18 23:01:17'),(20,2,2,12,'E000020','',1,'pawan renew',NULL,'.net',2,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'{\"1\":\"\"}',2,'{\"1\":\"343\"}','',2,0,'12-11-2016',2,'2016-11-14 16:49:19','2017-07-18 23:01:17'),(22,2,1,11,'E000022','',1,'Danisk kumar',NULL,'pfp',1,'s','s','s','s','s','s',NULL,NULL,NULL,NULL,'{\"1\":\"\"}',2,'{\"1\":\"3434\",\"2\":\"5555\"}','',3,0,'30',2,'2016-11-20 18:49:12','2017-07-18 23:01:17'),(23,2,1,11,'E000023','',1,'ter',NULL,'dd',1,'eee','eee','33333','333','333','3344',NULL,NULL,NULL,NULL,'',1,'','',1,0,'44',2,'2016-11-24 20:41:50','2017-07-18 23:01:17'),(24,2,2,12,'E000024','',NULL,'dinesh',NULL,'test',2,'hello','ram',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',1,'','',1,1,'30',2,'2016-11-24 20:44:30','2017-07-18 23:01:17'),(25,2,3,11,'E000025','',NULL,'deepak',NULL,'test',1,'hello','ram','9999999999','888888','test','del-44',NULL,NULL,NULL,NULL,'',1,'','',1,0,'',2,'2016-11-24 20:46:44','2017-07-18 23:01:17'),(26,2,3,11,'E000026','',NULL,'deepak',NULL,'test',1,'hello','ram','9999999999','888888','test','del-44',NULL,NULL,NULL,NULL,'',1,'','',1,0,'',2,'2016-11-24 20:49:55','2017-07-18 23:01:17'),(27,2,3,11,'E000027','',NULL,'dinesh11',NULL,'test',1,'hello','ram','9999999999','888888','test','del-44',NULL,NULL,NULL,NULL,'{\"1\":\"\",\"2\":\"\",\"3\":\"\",\"4\":\"\",\"5\":\"\",\"6\":\"\"}',7,'{\"1\":\"www\",\"2\":\"\",\"3\":\"2222\",\"4\":\"2222\",\"5\":\"888\",\"6\":\"9999\"}','',7,1,'',2,'2016-11-24 20:56:43','2017-07-18 23:01:17'),(31,2,1,12,'E000031','',1,'rajesh khanna',NULL,'jug',1,'raj','test','','','','',NULL,NULL,NULL,NULL,'',1,'','',1,0,'3',2,'2016-12-09 23:12:28','2017-07-18 23:01:17'),(32,2,1,15,'E000032','',2,'kkkkk',NULL,'php',1,'hello','','','','','',NULL,NULL,NULL,NULL,'{\"1\":\"\"}',2,'{\"2\":\"78787\",\"1\":\"434\"}','',3,0,'',2,'2016-12-09 23:18:25','2017-07-18 23:01:17'),(33,2,2,12,'E000033','',NULL,'rakesh',NULL,'php',2,'hello','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',1,'','',1,0,'30',2,'2016-12-09 23:19:46','2017-07-18 23:01:17'),(34,2,4,11,'E000034','',NULL,'test',NULL,'test',1,NULL,NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'',1,'','',1,0,'',2,'2016-12-09 23:50:05','2017-07-18 23:01:17'),(35,2,1,11,'E000035','',1,'Armani',NULL,'test',1,'','','','','','',NULL,NULL,NULL,NULL,'{\"2\":\"\"}',1,'{\"2\":\"4444\"}','',1,0,'18-12-2016',2,'2016-12-18 19:01:03','2017-07-18 23:01:17'),(36,2,1,12,'E000036','',1,'Ajit singhh',NULL,'php',1,'test','','','','',NULL,NULL,NULL,NULL,NULL,'',1,'{\"1\":\"weew\",\"2\":\"growww\"}','',3,0,'28-12-2016',2,'2016-12-28 23:04:05','2017-07-18 23:01:17'),(37,2,2,12,'E000037','',NULL,'rererer',NULL,'erere',1,'','xcxc',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',1,'{\"2\":\"ttttt\"}','',1,0,'14-12-2016',2,'2016-12-28 23:36:23','2017-07-18 23:01:17'),(38,2,3,19,'E000038','',NULL,'Other anme',NULL,'test',1,'test','','','','','',NULL,NULL,NULL,NULL,'{\"6\":\"supporting-1485360669.png\",\"1\":\"\",\"2\":\"\",\"3\":\"\"}',4,'','',1,1,'',2,'2016-12-29 00:17:55','2017-07-18 23:01:17'),(39,2,3,12,'E000039','',NULL,'pk',NULL,'pppp',1,'','','','','','',NULL,NULL,NULL,NULL,'',1,'','',1,1,'',2,'2016-12-29 00:19:42','2017-07-18 23:01:17'),(41,2,4,20,'E000041','',NULL,'mmmmm',NULL,'ppppp',1,NULL,NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,'',1,'','',1,0,'',2,'2016-12-29 00:41:34','2017-07-18 23:01:17'),(44,2,3,12,'E000044','',NULL,'Raj kumar singh',NULL,'test',1,'','','','','','',NULL,NULL,NULL,NULL,'{\"3\":\"supporting-1485360636.JPG\",\"5\":\"\",\"2\":\"\"}',1,'{\"1\":\"test-444\"}','',2,1,'',2,'2016-12-31 23:56:24','2017-07-18 23:01:17'),(45,2,1,15,'E000045','',1,'shruti',NULL,'sdsd',1,'ree','','','','','',NULL,NULL,NULL,NULL,'',1,'','',1,1,'06-01-2017',2,'2017-01-06 23:06:23','2017-07-18 23:01:17'),(46,2,1,11,'E000046','',2,'shruti2',NULL,'wewe',2,'wewe','','','','','',NULL,NULL,NULL,NULL,'{\"3\":\"supporting-1484761753.png\",\"1\":\"\",\"2\":\"\",\"4\":\"\",\"5\":\"\",\"6\":\"\"}',7,'{\"2\":\"test-5\",\"1\":\"test-66\"}','',3,1,'',2,'2017-01-06 23:07:54','2017-07-18 23:01:17'),(47,2,1,12,'E000047','',2,'shruti3',NULL,'test',1,'test','','','','','',NULL,NULL,NULL,NULL,'',1,'','',1,1,'',2,'2017-01-06 23:52:50','2017-07-18 23:01:17'),(52,2,2,19,'E000052','',NULL,'renew pawan',NULL,'test',1,'','','','','','',NULL,NULL,NULL,NULL,'{\"1\":\"\",\"2\":\"supporting-1487866867.jpg\",\"3\":\"\",\"4\":\"\"}',5,'',NULL,1,1,'11-02-2017',2,'2017-02-10 23:42:46','2017-07-18 23:01:17'),(48,2,1,12,'E000048','',2,'dinesh3',NULL,'php',NULL,'test','','','','','',NULL,NULL,NULL,NULL,'{\"2\":\"\"}',1,'{\"2\":\"test-555\",\"1\":\"555\",\"6\":\"testere\"}','',3,0,'',2,'2017-01-08 01:17:16','2017-07-18 23:01:17'),(51,2,1,19,'E000051','',2,'testt',NULL,'jjjjj',1,'','','','','','',NULL,NULL,NULL,NULL,'{\"2\":\"\",\"3\":\"\",\"4\":\"\",\"5\":\"\",\"1\":\"\",\"6\":\"\"}',7,'{\"1\":\"fgfgffgf\"}','',2,1,'',2,'2017-02-09 01:03:31','2017-07-18 23:01:17'),(102,2,1,20,'E000102','',2,'Amitabh',NULL,'test',NULL,'','','','','','',NULL,NULL,NULL,NULL,'{\"1\":\"supporting-1488988270.png\",\"2\":\"supporting-1488988291.png\",\"3\":\"supporting-1488988298.png\",\"4\":\"supporting-1488988309.png\",\"5\":\"supporting-1488988317.png\",\"6\":\"supporting-1488988327.png\"}',7,'',NULL,1,1,'',2,'2017-03-08 20:45:43','2017-07-18 23:01:17'),(101,2,1,22,'E000101','',2,'shruti beta',NULL,'hrrr',NULL,'','','','','','',NULL,NULL,NULL,NULL,'{\"2\":\"supporting-1488985245.png\",\"6\":\"supporting-1488986820.png\",\"5\":\"supporting-1488986990.png\",\"1\":\"\",\"3\":\"\",\"4\":\"\"}',7,'',NULL,1,1,'',2,'2017-03-06 21:53:44','2017-07-18 23:01:17'),(100,2,2,19,'E000100','',NULL,'Aishwarya',NULL,'tester',1,'test','','','','','',NULL,NULL,NULL,NULL,'{\"1\":\"supporting-1488732359.png\",\"3\":\"\",\"2\":\"supporting-1488816112.png\",\"4\":\"supporting-1489338480.jpg\"}',5,'',NULL,1,1,'05-03-2017',17,'2017-03-05 21:08:53','2017-07-18 23:01:17'),(103,2,1,22,'E000103','',1,'test',NULL,'phph',NULL,'','','','','','',NULL,NULL,NULL,NULL,'{\"1\":\"supporting-1489338533.jpg\",\"2\":\"supporting-1489338544.jpg\",\"3\":\"supporting-1489338672.jpg\",\"4\":\"supporting-1489338695.jpg\",\"5\":\"supporting-1489338709.jpg\",\"6\":\"supporting-1489338775.jpg\"}',7,'{\"4\":\"45454\",\"6\":\"fggfgf\"}',NULL,1,1,'',2,'2017-03-12 22:38:39','2017-07-18 23:01:17'),(104,2,1,11,'E000104','',2,'REDMI',NULL,'TEST',2,'','','','','','',NULL,NULL,NULL,NULL,'{\"1\":\"\",\"2\":\"\",\"3\":\"\",\"4\":\"\",\"5\":\"\"}',6,'{\"2\":\"wewewe\",\"3\":\"rewrrwrw\"}',NULL,1,0,'',2,'2017-03-13 09:53:50','2017-07-18 23:01:17'),(105,2,1,12,'E000105','',1,'nrrrr',NULL,'pkpk',NULL,'','','','','','',NULL,NULL,NULL,NULL,'{\"3\":\"\",\"2\":\"supporting-1489680388.JPG\",\"4\":\"\"}',1,'{\"1\":\"4545\"}',NULL,2,0,'16-03-2017',2,'2017-03-16 20:41:05','2017-07-18 23:01:17'),(106,2,1,11,'E000106','',1,'Ratnesh',NULL,'teee',1,'hello','','','','','',NULL,NULL,NULL,NULL,'{\"2\":\"\",\"1\":\"supporting-1493653559.jpg\",\"3\":\"\",\"4\":\"\",\"5\":\"supporting-1493653584.jpg\",\"6\":\"supporting-1493653612.jpg\"}',7,'{\"2\":\"jjjj\",\"3\":\"test123\"}','',1,1,'01-04-2017',18,'2017-04-02 13:57:01','2017-07-18 23:01:17'),(107,2,1,11,'E000107','test-77779999',1,'pawan kumar66',NULL,'php',NULL,'mata ji','papa ji','9999999','343434','test','delhi',NULL,NULL,NULL,NULL,'{\"5\":\"\",\"3\":\"\"}',1,'{\"1\":\"re33\",\"2\":\"ytyt\"}','',3,0,'14-04-2017',2,'2017-04-12 21:09:24','2017-07-18 23:01:17'),(108,2,1,19,'E000108','555-re',1,'lalan',NULL,'test',1,'mama','papapapapapa','4444','4444','eeeee','fffffff',NULL,NULL,NULL,NULL,'{\"1\":\"\"}',2,'{\"1\":\"3212\",\"2\":\"rerere\",\"3\":\"\",\"4\":\"wewewewe3333\"}',NULL,5,0,'01-04-2017',2,'2017-04-13 22:54:18','2017-07-18 23:01:17'),(109,2,1,15,'E000109','tertt-444999erer',2,'lalan top',NULL,'testtt',1,'test','wewe','32322','2323','2323','3dsds',NULL,NULL,NULL,NULL,'{\"2\":\"\"}',1,'{\"1\":\"yes\",\"2\":\"yes\",\"3\":\"no\",\"4\":\"333333\"}','',5,0,'24-11-2016',2,'2017-04-13 23:47:35','2017-07-18 23:01:17'),(110,2,4,12,'E000110','434343rrr',NULL,'cancel test',NULL,NULL,NULL,NULL,NULL,'4334343',NULL,'3434dfdfdf',NULL,NULL,NULL,NULL,NULL,NULL,1,'',NULL,1,0,'',2,'2017-04-14 00:05:11','2017-07-18 23:01:17'),(111,2,4,11,'E000111','434343r34',1,'new tets',NULL,'test',NULL,'','','','','','',NULL,NULL,NULL,NULL,NULL,1,'',NULL,1,0,'',2,'2017-04-23 23:57:07','2017-07-18 23:01:17'),(112,2,1,15,'E000112','test4545',1,'pk test2',NULL,'tester',NULL,'','','','','','',NULL,NULL,NULL,NULL,'{\"1\":\"\",\"2\":\"supporting-1493407998.png\",\"3\":\"\"}',4,'{\"1\":\"rtrt\",\"2\":\"332\",\"3\":\"34343\"}',NULL,4,0,'01-04-2017',2,'2017-04-24 03:33:44','2017-07-18 23:01:17'),(113,2,4,20,'E000113','test12121',NULL,'renew apps',NULL,'php',1,'','','','','','',NULL,NULL,NULL,NULL,NULL,1,'',NULL,1,0,'01-04-2017',2,'2017-04-23 22:48:51','2017-07-18 23:01:17'),(114,2,1,15,'E000114','4343',1,'ajay devgan',NULL,'test',1,'','','','','','',NULL,NULL,NULL,NULL,'{\"1\":\"\",\"2\":\"supporting-1497114397.jpg\",\"3\":\"supporting-1497630407.pdf\"}',4,'{\"1\":\"45455\",\"2\":\"8888\",\"3\":\"yes\"}',NULL,4,0,'01-04-2017',2,'2017-04-28 23:07:32','2017-07-18 23:01:17'),(115,2,4,19,'E000115','test2323',2,'akshay',NULL,'rrrr',1,'mmmm','','','','','',NULL,NULL,NULL,NULL,NULL,1,'',NULL,1,0,'',2,'2017-04-28 23:17:44','2017-07-18 23:01:17'),(126,2,1,20,'E000126','6776767',2,'test pks',NULL,'tedtttt',1,'','','','','','',NULL,NULL,NULL,NULL,'{\"1\":\"supporting-1497286121.jpeg\"}',2,'','',1,0,'',2,'2017-06-10 19:01:51','2017-07-18 23:01:17'),(116,2,4,11,'E000116','949494',1,'arjun singh',NULL,'test',NULL,'','','','','','',NULL,NULL,NULL,NULL,'{\"1\":\"supporting-1507047636.jpg\"}',2,'{\"1\":\"222\"}','',2,1,'',2,'2017-05-05 23:38:31','2017-10-03 20:20:36'),(117,2,1,15,'E000117','34343',1,'Salman khan',NULL,'test',NULL,'','','','','','',NULL,NULL,NULL,NULL,'{\"1\":\"\",\"2\":\"\",\"3\":\"\",\"4\":\"\",\"5\":\"\",\"6\":\"\"}',7,'{\"1\":\"yes\",\"2\":\"\",\"3\":\"no\",\"4\":\"yes\",\"5\":\"yes\",\"6\":\"yes\"}',NULL,7,1,'11-05-2017',2,'2017-05-10 22:30:59','2017-07-18 23:01:17'),(118,2,1,15,'E000118','test-2323',2,'Amitabh bachan',NULL,'test',1,'','','','','','',NULL,NULL,NULL,NULL,'{\"1\":\"\",\"2\":\"\",\"3\":\"\",\"4\":\"\",\"5\":\"\",\"6\":\"\"}',7,'{\"1\":\"yes\",\"2\":\"\",\"3\":\"yes\",\"4\":\"yes\",\"5\":\"yes\",\"6\":\"yes\"}',NULL,7,1,'',2,'2017-05-10 22:31:42','2017-07-18 23:01:17'),(125,2,4,15,'E000125','5656',1,'bahubali',NULL,'test',NULL,'','','','','','',NULL,NULL,NULL,NULL,NULL,1,'',NULL,1,0,'03-06-2017',2,'2017-06-01 23:11:31','2017-07-18 23:01:17'),(120,2,4,19,'E000120','45454',NULL,'Bhalal',NULL,NULL,NULL,NULL,NULL,'ytytyt',NULL,'',NULL,NULL,NULL,NULL,NULL,'{\"1\":\"\"}',2,'{\"1\":\"yes\"}',NULL,2,1,'',2,'2017-05-10 23:28:35','2017-07-18 23:01:17'),(121,2,1,19,'E000121','737373',1,'Ramesh singh',NULL,'testtt',NULL,'','','','','','',NULL,NULL,NULL,NULL,NULL,1,'{\"6\":\"test3333\",\"3\":\"yes\"}',NULL,1,0,'12-05-2017',2,'2017-05-11 20:01:56','2017-07-18 23:01:17'),(122,2,1,19,'E000122','55555',1,'singh',NULL,'test',NULL,'','','','','','',NULL,NULL,NULL,NULL,'{\"1\":\"\"}',2,'{\"1\":\"9999\"}',NULL,2,0,'',2,'2017-05-12 19:41:00','2017-07-18 23:01:17'),(123,2,1,15,'E000123','5555',2,'raj',NULL,'php',NULL,'','','','','','',NULL,NULL,NULL,NULL,NULL,1,'{\"2\":\"4545454\"}',NULL,1,0,'',2,'2017-05-28 14:53:16','2017-07-18 23:01:17'),(124,2,1,15,'E000124','34444',2,'rajni',NULL,'eeee',NULL,'','','','','','',NULL,NULL,NULL,NULL,NULL,1,'{\"1\":\"34343\",\"2\":\"34343\",\"4\":\"tt666\"}','[\"3\"]',3,0,'',2,'2017-05-28 15:05:44','2017-09-03 10:41:52'),(127,2,1,19,'E000127','4444',1,'testpk',NULL,'php',1,'ererr','','','','','',NULL,NULL,NULL,NULL,NULL,1,'{\"2\":\"mmm\"}','[\"1\"]',1,0,'01-06-2017',2,'2017-06-26 16:42:45','2017-09-03 10:37:59'),(128,2,1,12,'E000128','343434',2,'sds',NULL,'ererer',1,'','','','','','',NULL,NULL,NULL,NULL,'{\"8\":\"\"}',1,'{\"8\":\"4545TRR\"}','[\"1\"]',1,0,'',2,'2017-06-26 16:47:33','2017-10-08 00:34:35'),(129,2,2,15,'E000129','rest2222',NULL,'Bahu 3',NULL,'wewe',1,'','','','','','',NULL,NULL,NULL,NULL,'{\"2\":\"\"}',1,'',NULL,1,0,'15-07-2017',2,'2017-07-15 18:45:49','2017-10-08 00:22:35'),(130,2,2,40,'E000130','56566',NULL,'renew test',NULL,'defeee',1,'','','','','','',NULL,NULL,NULL,NULL,'{\"4\":\"\",\"2\":\"supporting-1507410220.jpg\",\"1\":\"\",\"3\":\"\",\"5\":\"\"}',6,'{\"1\":\"\"}',NULL,2,1,'08-10-2017',2,'2017-10-08 01:00:02','2017-10-08 01:04:34'),(131,2,1,11,'E000131','RAJ333',1,'Rajan kumar',NULL,'testte',NULL,'','','','','','','5000','200','100','100',NULL,1,'',NULL,1,0,'',18,'2017-10-08 20:37:26','2017-10-08 20:37:26'),(132,2,1,11,'E000132','ueurhe',2,'tesst',NULL,'sdsds',NULL,'','','','','','','3333','333','223','32',NULL,1,'',NULL,1,0,'',18,'2017-10-08 20:39:35','2017-10-08 20:39:35'),(133,2,5,15,'E000133','eeeee',NULL,'testddd',NULL,'4444',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'444','4','45','4',NULL,1,'',NULL,1,0,'',18,'2017-10-08 21:09:08','2017-10-08 21:09:09'),(135,2,4,29,'E000135','dfdfd',NULL,'ffdfdf',NULL,NULL,NULL,NULL,NULL,'43434',NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,1,'',NULL,1,0,'',2,'2017-10-09 19:41:48','2017-10-09 19:41:48');
/*!40000 ALTER TABLE `applications` ENABLE KEYS */;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_email` varchar(100) NOT NULL,
  `company_phone` varchar(15) NOT NULL,
  `company_type` int(2) NOT NULL COMMENT '1=>labour, 2=>immigration',
  `representative_name` varchar(100) DEFAULT NULL,
  `representative_mobile` varchar(15) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `trade_license_expiry` varchar(50) DEFAULT NULL,
  `immigration_expiry` varchar(50) DEFAULT NULL,
  `immigration_card` varchar(255) NOT NULL,
  `labour_card` varchar(255) NOT NULL,
  `trade_license` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(10) NOT NULL,
  `modified_by` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (1,0,'Maktaabi','pk@pk.com','555555555555',1,NULL,NULL,NULL,NULL,NULL,'','','','2016-09-09 23:06:39','2016-09-09 23:06:39',0,0,0),(2,0,'ALP plastic','alp@gmail.com','1212121212',1,NULL,NULL,NULL,NULL,NULL,'','','','2016-09-09 23:49:59','2016-09-09 23:49:59',0,0,0),(3,0,'Alibaba','sas@sas.fdfdf','4444444444',1,NULL,NULL,NULL,NULL,NULL,'','','','2016-09-09 23:57:03','2016-09-09 23:57:03',0,0,0),(4,0,'ABC pvt ltd','abc@gm.com','9000909090',1,NULL,NULL,NULL,NULL,NULL,'','','','2016-09-12 20:35:41','2016-09-12 20:35:41',0,0,0),(5,0,'Test co in','','',1,NULL,NULL,NULL,NULL,NULL,'','','','2016-09-20 22:16:38','2016-09-20 22:16:38',0,0,0),(6,0,'XYZ pvt ltd','','',2,NULL,NULL,NULL,NULL,NULL,'','','','2016-09-20 22:16:43','2016-09-20 22:16:43',0,0,0),(7,0,'Manan ltd','','',2,NULL,NULL,NULL,NULL,NULL,'','','','2016-09-20 22:19:10','2016-09-20 22:19:10',0,0,0),(8,0,'HCL pvt ltd','','',2,NULL,NULL,NULL,NULL,NULL,'','','','2016-09-20 22:19:13','2016-09-20 22:19:13',0,0,0),(9,0,'infosys','info@gmail.com','9090909909',2,NULL,NULL,NULL,NULL,NULL,'immigration-1474394952.jpg','labour-1474394952.png','trade-1474394952.jpg','2016-09-20 23:39:12','2016-09-20 23:39:12',0,0,0),(10,0,'Pawan kumar','pk@pk.com','9999999999',1,NULL,NULL,NULL,NULL,NULL,'','','','2016-09-22 00:07:25','2016-09-22 00:07:25',0,0,0),(11,2,'new company2','new@sm.com','9999999999',1,NULL,NULL,NULL,NULL,NULL,'','','','2016-10-04 22:20:10','2016-11-26 23:58:49',0,0,0),(12,2,'test','test@gmail.com','9999999999',1,NULL,NULL,NULL,NULL,NULL,'','','','2016-10-20 18:44:35','2016-10-20 18:44:35',2,0,1),(13,0,'new company2','new@sm.com','9999999999',1,NULL,NULL,NULL,NULL,NULL,'','','','2016-11-26 23:57:38','2016-11-26 23:57:38',0,0,0),(14,0,'new company2','new@sm.com','9999999999',1,NULL,NULL,NULL,NULL,NULL,'','','','2016-11-26 23:57:52','2016-11-26 23:57:52',0,0,0),(15,2,'Maktaabi test','mak@sm.com','9999999999',2,NULL,NULL,NULL,NULL,NULL,'','','','2016-12-08 22:48:05','2016-12-08 22:48:05',2,0,1),(19,2,'MNC product','test@sm.com','99999999',1,NULL,NULL,NULL,'09-05-2017','','','','','2016-12-25 21:22:41','2017-05-14 21:56:46',2,0,1),(20,2,'TRP','as@gm.com','999999999',1,NULL,NULL,NULL,NULL,NULL,'','','','2016-12-25 21:23:06','2016-12-25 21:23:06',2,0,1),(21,2,'testerpk','test@gmail.com','9999999999',2,NULL,NULL,NULL,NULL,NULL,'immigration-1482851405.jpg','','trade-1482851405.jpg','2016-12-27 20:40:06','2016-12-29 19:43:07',2,0,1),(22,2,'new test','test@gmail.com','343434343',1,NULL,NULL,NULL,NULL,NULL,'','','trade-1483112555.jpg','2016-12-30 21:12:35','2016-12-30 21:12:35',2,0,1),(23,2,'test','pawan19911hhghg5@gmail.com','07053457208',2,NULL,NULL,NULL,'11-04-2017','19-04-2017','','','','2017-04-01 07:28:25','2017-04-12 21:59:10',2,0,1),(24,2,'test1','ererereer','656656656',1,NULL,NULL,NULL,'05-04-2017','','','','','2017-04-16 21:46:43','2017-04-16 22:24:26',2,0,1),(25,2,'pk pvt ltd','mk@sm.com','8898898999',2,'pks','8898898999','this is only test purpose','',NULL,'','','','2017-05-14 20:31:49','2017-05-14 20:31:49',2,0,1),(26,2,'rkk','ww@dd.com','9999999999',1,'wwww','99999999','test','',NULL,'','','','2017-05-14 20:34:37','2017-05-14 20:34:37',2,0,1),(27,2,'pkpkpk','pk@pk222.com','3333',1,'eee','3333','test','',NULL,'','','','2017-05-14 20:39:29','2017-05-14 20:39:29',2,0,1),(28,2,'ererr','eree@fgfg.com','34343',1,'ere','4545','dsdsdd','',NULL,'','','','2017-05-14 21:14:24','2017-05-14 21:14:24',2,0,1),(29,2,'erer','eree@fgfg.com33','4545455',1,'','454545','dfddsds','',NULL,'','','','2017-05-14 21:19:51','2017-05-14 21:19:51',2,0,1),(30,2,'opopopo','pawtyty@gmyuail.com','900909',1,'uyuy','98898','testttt','31-05-2017',NULL,'','','','2017-05-15 20:21:38','2017-05-15 20:21:38',2,0,1),(31,2,'kakakaka','yuyu@tyt.com','67676',2,'tyty','5555','test here perfect .......peee',NULL,NULL,'','','','2017-05-15 20:28:29','2017-05-29 00:18:49',2,0,1),(32,2,'Eman pvt ltd','abc@sm.com','67676767676',1,'tester232','565656565','This is test only test323',NULL,NULL,'','','','2017-05-15 22:47:55','2017-06-02 22:56:20',2,0,1),(33,0,'','','',0,NULL,NULL,NULL,NULL,NULL,'','','','2017-05-29 22:31:29','2017-05-29 22:31:29',0,0,0),(34,2,'testing pvt','asa@asas.vomh','4444444444',1,'','','',NULL,NULL,'','','','2017-06-01 20:56:02','2017-06-01 20:56:02',2,0,1),(35,2,'teeee','eree@fgfg.com','444444444',1,'','','',NULL,NULL,'','','','2017-06-03 23:49:51','2017-06-03 23:49:51',2,0,1),(36,2,'sdsdsds','eree@fgfg.com','444444444',1,'','','',NULL,NULL,'','','','2017-06-04 00:00:45','2017-06-04 00:00:45',2,0,1),(37,2,'erersds','aa@aaaa.com','34343',1,'test','','',NULL,NULL,'','','','2017-06-04 00:01:39','2017-06-04 00:01:39',2,0,1),(38,2,'test3434','sas@sas.fdfdf','4545545',1,'','','',NULL,NULL,'','','','2017-06-04 00:03:23','2017-06-04 00:03:23',2,0,1),(39,2,'ewew','aa@aaaa.com','2332332',1,'test','','',NULL,NULL,'','','','2017-06-04 00:06:35','2017-06-04 00:06:35',2,0,1),(40,2,'reeee edit','eree@fgfg.com33','3333333',1,'tester test','6565656','eweweweassas asasas',NULL,NULL,'','','','2017-06-04 23:10:22','2017-08-13 13:25:02',2,0,1),(41,2,'big test','best company','545454',2,'dfdf','4545','dfdfdfd test ssdsd',NULL,NULL,'','','','2017-06-04 23:47:02','2017-06-19 20:25:51',2,0,1);
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;

--
-- Table structure for table `company_document_histories`
--

DROP TABLE IF EXISTS `company_document_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_document_histories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `document_type` varchar(70) NOT NULL,
  `document_name` varchar(100) NOT NULL,
  `document_expiry_date` varchar(30) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_document_histories`
--

/*!40000 ALTER TABLE `company_document_histories` DISABLE KEYS */;
INSERT INTO `company_document_histories` VALUES (1,32,'trade_license','trade_license-1496247154.jpg','31-05-2017','2017-05-31 20:12:34',2),(2,32,'establishment_card_hr','establishment_card_hr-1496247154.jpg','','2017-05-31 20:12:34',2),(3,32,'trade_license','trade_license-1496264004.jpg','02-06-2017','2017-06-01 00:53:24',2),(4,32,'establishment_card_hr','establishment_card_hr-1496264134.jpg','02-06-2017','2017-06-01 00:55:34',2),(5,32,'trade_license','trade_license-1496331278.jpg','08-06-2017','2017-06-01 19:34:38',2),(6,32,'establishment_card_hr','establishment_card_hr-1496331969.gif','21-06-2017','2017-06-01 19:46:10',2),(7,34,'trade_license','trade_license-1496336162.jpg','22-06-2017','2017-06-01 20:56:03',2),(8,34,'establishment_card_guest','establishment_card_guest-1496336162.jpg','23-06-2017','2017-06-01 20:56:03',2),(9,34,'shisha_license','shisha_license-1496336162.jpg','15-06-2017','2017-06-01 20:56:03',2),(11,32,'e_connection_license','e_connection_license-1496338139.jpeg','14-06-2017','2017-06-01 21:28:59',2),(12,34,'establishment_card_hr','establishment_card_hr-1496341015.jpg','09-06-2017','2017-06-01 22:16:56',2),(13,32,'labour_card','labour_card-1496427835.jpg','05-06-2017','2017-06-02 22:23:55',2),(14,32,'moa','moa-1496428119.jpg',NULL,'2017-06-02 22:28:39',2),(15,32,'amoa','amoa-1496429686.jpg',NULL,'2017-06-02 22:54:46',2),(16,32,'poa','poa-1496429780.jpg','','2017-06-02 22:56:20',2),(17,32,'ejari_deed','ejari_deed-1496433363.jpeg',NULL,'2017-06-02 23:56:04',2),(18,34,'amoa','amoa-1496515671.jpg',NULL,'2017-06-03 22:47:52',2),(19,36,'hotel_classification_certificate','hotel_classification_certificate-1496520045.jpeg','','2017-06-04 00:00:45',2),(20,36,'other','other-1496520045.jpg','','2017-06-04 00:00:45',2),(21,36,'other1','o','t','2017-06-04 00:00:45',2),(22,37,'hotel_classification_certificate','hotel_classification_certificate-1496520099.jpg','03-06-2017','2017-06-04 00:01:39',2),(23,37,'poa','poa-1496520099.jpeg','','2017-06-04 00:01:39',2),(24,37,'other1','p','o','2017-06-04 00:01:39',2),(25,39,'establishment_card_hr','establishment_card_hr-1496520395.jpg','','2017-06-04 00:06:35',2),(26,39,'other','other-1496520395.jpg','','2017-06-04 00:06:35',2),(27,39,'ejari_deed','ejari_deed-1496556089.jpg',NULL,'2017-06-04 10:01:29',2),(28,39,'poa','poa-1496556207.jpg',NULL,'2017-06-04 10:03:27',2),(29,40,'shisha_license','shisha_license-1496603422.jpeg','14-06-2017','2017-06-04 23:10:22',2),(30,40,'poa','poa-1496603422.jpg','','2017-06-04 23:10:22',2),(31,41,'labour_card','labour_card-1496605622.jpeg','08-06-2017','2017-06-04 23:47:02',2),(32,41,'ejari_deed','ejari_deed-1496605622.jpg','','2017-06-04 23:47:02',2),(33,41,'shisha_license','shisha_license-1496605808.jpg','30-06-2017','2017-06-04 23:50:08',2),(34,41,'poa','poa-1496606384.jpeg','','2017-06-04 23:59:44',2),(35,40,'e_connection_license','e_connection_license-1497032085.gif','10-06-2017','2017-06-09 22:14:45',2),(36,40,'trade_license','trade_license-1502616302.png','','2017-08-13 13:25:02',2),(37,40,'establishment_card_hr','establishment_card_hr-1502616302.png','','2017-08-13 13:25:02',2);
/*!40000 ALTER TABLE `company_document_histories` ENABLE KEYS */;

--
-- Table structure for table `company_documents`
--

DROP TABLE IF EXISTS `company_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `trade_license` varchar(60) DEFAULT NULL,
  `trade_license_expiry` varchar(15) DEFAULT NULL,
  `establishment_card_hr` varchar(60) DEFAULT NULL,
  `establishment_card_hr_expiry` varchar(15) DEFAULT NULL,
  `establishment_card_guest` varchar(60) DEFAULT NULL,
  `establishment_card_guest_expiry` varchar(15) DEFAULT NULL,
  `liquor_license` varchar(60) DEFAULT NULL,
  `liquor_license_expiry` varchar(15) DEFAULT NULL,
  `shisha_license` varchar(60) DEFAULT NULL,
  `shisha_license_expiry` varchar(15) DEFAULT NULL,
  `e_connection_license` varchar(60) DEFAULT NULL,
  `e_connection_license_expiry` varchar(15) DEFAULT NULL,
  `flag_license` varchar(60) DEFAULT NULL,
  `flag_license_expiry` varchar(15) DEFAULT NULL,
  `hotel_classification_certificate` varchar(60) DEFAULT NULL,
  `hotel_classification_certificate_expiry` varchar(15) DEFAULT NULL,
  `labour_card` varchar(60) DEFAULT NULL,
  `labour_card_expiry` varchar(15) DEFAULT NULL,
  `moa` varchar(60) DEFAULT NULL,
  `amoa` varchar(60) DEFAULT NULL,
  `poa` varchar(60) DEFAULT NULL,
  `ejari_deed` varchar(60) DEFAULT NULL,
  `other` varchar(60) DEFAULT NULL,
  `other1` varchar(60) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_documents`
--

/*!40000 ALTER TABLE `company_documents` DISABLE KEYS */;
INSERT INTO `company_documents` VALUES (2,31,2,'','27-05-2017','','16-05-2017','','31-05-2017','liquor_license-1494869968.jpg','24-05-2017','shisha_license-1494868747.jpg','31-05-2017','','31-05-2024','','','hotel_classification_certificate-1494865709.jpg','31-05-2017','','','','','poa-1494868747.jpg','','','other1-1494865709.jpg','2017-05-15 20:28:29'),(4,32,2,'trade_license-1496331278.jpg','31-05-2017','establishment_card_hr-1496331969.gif','21-06-2017','establishment_card_guest-1496247025.jpeg','','liquor_license-1494874075.jpg','31-05-2017','shisha_license-1494874117.jpg','','e_connection_license-1496338139.jpeg','14-06-2017','flag_license-1496247025.jpg','','hotel_classification_certificate-1494874075.jpg','31-05-2017','labour_card-1496427835.jpg','05-06-2017','moa-1496428119.jpg','amoa-1496429686.jpg','poa-1496429780.jpg','ejari_deed-1496433363.jpeg','other-1494874075.jpg','','2017-05-15 22:47:55'),(5,34,2,'trade_license-1496336162.jpg','22-06-2017','establishment_card_hr-1496341015.jpg','09-06-2017','establishment_card_guest-1496336162.jpg','23-06-2017','','','shisha_license-1496336162.jpg','15-06-2017','','','','','','','','','','amoa-1496515671.jpg','','','','','2017-06-01 20:56:03'),(6,35,2,'','','','','','','','','','','','','','','','','','','','','','','','','2017-06-03 23:49:52'),(7,36,2,'','','','','','','','','','','','','','','hotel_classification_certificate-1496520045.jpeg','','','','','','','','other-1496520045.jpg','','2017-06-04 00:00:45'),(8,37,2,'','','','','','','','','','','','','','','hotel_classification_certificate-1496520099.jpg','03-06-2017','','','','','poa-1496520099.jpeg','','','','2017-06-04 00:01:39'),(9,38,2,'','','','','','','','','','','e_connection_license-1496520203.jpg','','','','','','','','','','poa-1496520203.jpg','','','','2017-06-04 00:03:23'),(10,39,2,'','','establishment_card_hr-1496520395.jpg','','','','','','','','','','','','','','','','','','poa-1496556207.jpg','ejari_deed-1496556089.jpg','other-1496520395.jpg','','2017-06-04 00:06:35'),(11,40,2,'trade_license-1502616302.png','','establishment_card_hr-1502616302.png','','','','','','shisha_license-1496603422.jpeg','14-06-2017','e_connection_license-1497032085.gif','10-06-2017','','','','','','','','','poa-1496603422.jpg','','','','2017-06-04 23:10:22'),(12,41,2,'','','','','','','','','shisha_license-1496605808.jpg','30-06-2017','','','','','','','labour_card-1496605622.jpeg','08-06-2017','','','poa-1496606384.jpeg','ejari_deed-1496605622.jpg','','','2017-06-04 23:47:02');
/*!40000 ALTER TABLE `company_documents` ENABLE KEYS */;

--
-- Table structure for table `company_histories`
--

DROP TABLE IF EXISTS `company_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_histories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_email` varchar(100) NOT NULL,
  `company_phone` varchar(15) NOT NULL,
  `company_type` int(2) NOT NULL COMMENT '1=>labour, 2=>immigration',
  `representative_name` varchar(100) DEFAULT NULL,
  `representative_mobile` varchar(15) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_histories`
--

/*!40000 ALTER TABLE `company_histories` DISABLE KEYS */;
INSERT INTO `company_histories` VALUES (31,2,34,'kakakaka','yuyu@tyt.com','67676',2,'tyty','5555',NULL,'2017-05-15 20:28:29',2,1),(32,2,32,'Eman pvt ltd','abc@sm.com','67676767676',1,'tester232','565656565','This is test only test323','2017-05-15 22:47:55',2,1),(33,2,40,'reeee','eree@fgfg.com33','3333333',1,'wewee','','ewewewe','2017-06-04 23:10:22',2,1),(40,2,40,'reeee','eree@fgfg.com33','3333333',1,'wewee','6565656','eweweweassas asasas','2017-06-05 22:44:13',2,0),(41,2,41,'testing','3rerer','545454',2,'dfdf','4545','dfdfdfd test','2017-06-05 00:04:19',2,1),(45,2,40,'reeee','eree@fgfg.com33','3333333',1,'tester test','6565656','eweweweassas asasas','2017-06-09 22:17:30',2,0),(44,2,40,'reeee','eree@fgfg.com33','3333333',1,'tester','6565656','eweweweassas asasas','2017-06-09 22:15:25',2,0),(46,2,41,'testing','best company','545454',2,'dfdf','4545','dfdfdfd test ssdsd','2017-06-19 20:25:14',2,0),(47,2,41,'big test','best company','545454',2,'dfdf','4545','dfdfdfd test ssdsd','2017-06-19 20:25:51',2,0),(48,2,40,'reeee edit','eree@fgfg.com33','3333333',1,'tester test','6565656','eweweweassas asasas','2017-08-13 13:25:02',2,0);
/*!40000 ALTER TABLE `company_histories` ENABLE KEYS */;

--
-- Table structure for table `converted_applications`
--

DROP TABLE IF EXISTS `converted_applications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `converted_applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) DEFAULT NULL,
  `previous_process_type` int(1) DEFAULT NULL,
  `current_process_type` int(1) DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `converted_applications`
--

/*!40000 ALTER TABLE `converted_applications` DISABLE KEYS */;
INSERT INTO `converted_applications` VALUES (1,115,1,4,'2017-05-30 20:23:52',2),(2,119,3,4,'2017-06-01 22:45:34',2),(3,125,1,4,'2017-06-01 23:13:01',2),(4,113,2,4,'2017-06-02 20:56:03',2),(5,111,1,4,'2017-06-06 19:32:59',17);
/*!40000 ALTER TABLE `converted_applications` ENABLE KEYS */;

--
-- Table structure for table `email_notifications`
--

DROP TABLE IF EXISTS `email_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail_to` varchar(255) DEFAULT NULL,
  `mail_subject` varchar(255) DEFAULT NULL,
  `mail_message` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_notifications`
--

/*!40000 ALTER TABLE `email_notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `email_notifications` ENABLE KEYS */;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoices` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(130) DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `sub_order_id` int(10) NOT NULL,
  `amount` decimal(10,2) NOT NULL COMMENT 'Amount against invoice without taxes',
  `total_with_tax` decimal(10,2) DEFAULT NULL COMMENT 'Amount Against invoice with all taxes',
  `discount` decimal(10,2) DEFAULT NULL COMMENT 'Discount ON INVOICE (if any)',
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL COMMENT 'paid, non paid etc',
  `status` int(2) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
INSERT INTO `invoices` VALUES (1,NULL,2,1,0.00,NULL,NULL,'2017-03-25','2017-03-31','',0,1,'2017-03-25','2017-03-25 21:14:05',1);
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;

--
-- Table structure for table `login_tokens`
--

DROP TABLE IF EXISTS `login_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` char(32) NOT NULL,
  `duration` varchar(32) NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_tokens`
--

/*!40000 ALTER TABLE `login_tokens` DISABLE KEYS */;
INSERT INTO `login_tokens` VALUES (18,1,'e9f7528596fa98d49c20c3add758fdbe','2 weeks',0,'2016-09-14 00:00:12','2016-09-28 00:00:12'),(15,2,'99cb343d6f24823fc9a802c85aef3bee','2 weeks',0,'2016-09-13 17:17:10','2016-09-27 17:17:10');
/*!40000 ALTER TABLE `login_tokens` ENABLE KEYS */;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1=>new application, 2=>application issue, 3=>issue solved',
  `process_type` int(11) DEFAULT NULL COMMENT '1=>new, 2=>renew, 3=>local transfer, 4=>cancellation',
  `process_stage` int(11) DEFAULT NULL COMMENT 'when visa process completed',
  `read` tinyint(4) DEFAULT '0' COMMENT '0=>unread, 1=>read',
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=215 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES (2,2,51,1,1,NULL,1,'2017-02-09 01:03:31',2),(3,2,52,1,1,NULL,1,'2017-02-10 23:42:46',2),(5,2,50,2,NULL,NULL,1,'2017-02-16 22:23:29',2),(6,2,51,2,NULL,NULL,1,'2017-02-17 00:29:06',2),(7,2,48,2,NULL,NULL,1,'2017-03-05 10:10:40',2),(8,2,100,1,2,NULL,1,'2017-03-05 09:08:53',17),(9,2,100,4,2,2,1,'2017-03-05 10:15:59',18),(10,2,100,4,2,NULL,1,'2017-03-06 09:27:38',2),(11,2,100,4,2,NULL,1,'2017-03-06 09:31:52',2),(12,2,50,4,1,3,1,'2017-03-06 09:44:01',2),(13,2,101,1,1,NULL,1,'2017-03-06 09:53:45',2),(14,2,101,4,1,2,1,'2017-03-08 08:30:46',2),(15,2,102,1,1,NULL,1,'2017-03-08 08:45:43',2),(16,2,102,4,1,1,1,'2017-03-08 08:45:57',2),(17,2,102,4,1,2,1,'2017-03-08 08:46:05',2),(18,2,102,4,1,3,1,'2017-03-08 08:46:14',2),(19,2,102,4,1,4,1,'2017-03-08 08:46:25',2),(20,2,102,4,1,5,1,'2017-03-08 08:46:38',2),(21,2,102,4,1,6,1,'2017-03-08 08:46:46',2),(22,2,102,4,1,5,1,'2017-03-08 08:49:07',2),(23,2,101,4,1,6,1,'2017-03-08 08:57:00',2),(24,2,101,4,1,5,1,'2017-03-08 08:59:50',2),(25,2,102,4,1,1,1,'2017-03-08 09:01:03',2),(26,2,102,4,1,2,1,'2017-03-08 09:01:35',2),(27,2,102,4,1,3,1,'2017-03-08 09:01:49',2),(28,2,102,4,1,4,1,'2017-03-08 09:02:04',2),(29,2,102,4,1,5,1,'2017-03-08 09:02:17',2),(30,2,102,4,1,6,1,'2017-03-08 09:02:37',2),(31,2,102,4,1,1,1,'2017-03-08 09:10:41',2),(32,2,102,4,1,2,1,'2017-03-08 09:11:31',2),(33,2,102,4,1,3,1,'2017-03-08 09:11:48',2),(34,2,102,4,1,4,1,'2017-03-08 09:12:00',2),(35,2,102,4,1,5,1,'2017-03-08 09:12:22',2),(36,2,102,4,1,6,1,'2017-03-08 09:12:37',2),(37,2,102,4,1,1,1,'2017-03-08 09:21:10',2),(38,2,102,4,1,2,1,'2017-03-08 09:21:31',2),(39,2,102,4,1,3,1,'2017-03-08 09:21:39',2),(40,2,102,4,1,4,1,'2017-03-08 09:21:49',2),(41,2,102,4,1,5,1,'2017-03-08 09:21:58',2),(42,2,102,4,1,6,1,'2017-03-08 09:22:07',2),(43,2,101,4,1,1,1,'2017-03-08 09:40:17',2),(44,2,101,4,1,3,1,'2017-03-08 09:40:22',2),(45,2,101,4,1,4,1,'2017-03-08 09:40:34',2),(46,2,46,4,1,1,1,'2017-03-08 09:41:07',2),(47,2,46,4,1,2,1,'2017-03-08 09:41:45',2),(48,2,46,4,1,4,1,'2017-03-08 09:42:58',2),(49,2,46,4,1,5,1,'2017-03-08 09:45:27',2),(50,2,46,4,1,6,1,'2017-03-08 09:45:37',2),(51,2,51,4,1,1,1,'2017-03-08 09:46:34',2),(52,2,51,4,1,6,1,'2017-03-08 09:47:17',2),(53,2,44,4,3,5,1,'2017-03-08 09:47:34',2),(54,2,44,4,3,2,1,'2017-03-08 09:56:09',2),(55,2,50,4,1,5,1,'2017-03-08 09:56:30',2),(56,2,50,2,NULL,NULL,1,'2017-03-08 09:57:54',2),(57,2,100,4,2,4,1,'2017-03-12 10:38:00',2),(58,2,103,1,1,NULL,1,'2017-03-12 10:38:39',2),(59,2,103,4,1,1,1,'2017-03-12 10:38:54',2),(60,2,103,4,1,2,1,'2017-03-12 10:39:04',2),(61,2,103,4,1,3,1,'2017-03-12 10:41:12',2),(62,2,103,4,1,4,1,'2017-03-12 10:41:35',2),(63,2,103,4,1,5,1,'2017-03-12 10:41:49',2),(64,2,103,4,1,6,1,'2017-03-12 10:42:56',2),(65,2,104,1,1,NULL,1,'2017-03-13 09:53:50',2),(66,2,104,4,1,1,1,'2017-03-13 09:54:45',2),(67,2,104,4,1,2,1,'2017-03-13 09:54:51',2),(68,2,104,4,1,3,1,'2017-03-13 09:55:00',2),(69,2,104,4,1,4,1,'2017-03-13 09:55:08',2),(70,2,104,4,1,5,1,'2017-03-13 09:55:13',2),(71,2,50,4,1,2,1,'2017-03-13 10:03:54',2),(72,2,35,4,1,2,1,'2017-03-13 10:30:58',2),(73,2,50,4,1,2,1,'2017-03-15 10:24:59',2),(74,2,50,4,1,2,1,'2017-03-15 10:25:43',2),(75,2,50,4,1,2,1,'2017-03-15 10:26:11',2),(76,2,105,1,1,NULL,1,'2017-03-16 08:41:05',2),(77,2,105,4,1,3,1,'2017-03-16 09:36:04',2),(78,2,105,4,1,2,1,'2017-03-16 09:36:29',2),(79,2,105,4,1,4,1,'2017-03-16 09:38:30',2),(80,2,48,2,NULL,NULL,1,'2017-03-25 09:59:49',2),(81,2,48,3,NULL,NULL,1,'2017-03-25 10:06:59',34),(82,2,50,3,NULL,NULL,1,'2017-03-25 10:09:58',34),(83,2,48,4,1,2,1,'2017-03-30 07:34:20',2),(84,2,106,1,1,NULL,1,'2017-04-02 01:57:01',18),(85,2,106,4,1,2,1,'2017-04-03 10:22:18',2),(86,2,106,2,NULL,NULL,1,'2017-04-03 10:45:41',2),(87,2,42,2,NULL,NULL,1,'2017-04-04 08:58:08',2),(88,2,107,1,1,NULL,1,'2017-04-12 09:09:24',2),(89,2,106,3,NULL,NULL,1,'2017-04-12 10:41:23',17),(90,2,108,1,1,NULL,1,'2017-04-13 10:54:18',2),(91,2,109,1,1,NULL,1,'2017-04-13 11:47:35',2),(92,2,110,1,4,NULL,0,'2017-04-14 12:05:11',2),(93,2,109,2,NULL,NULL,1,'2017-04-21 08:43:05',2),(94,2,109,3,NULL,NULL,1,'2017-04-21 08:51:44',17),(95,2,109,2,NULL,NULL,1,'2017-04-21 09:08:38',2),(96,2,109,2,NULL,NULL,1,'2017-04-21 10:06:23',2),(97,2,109,3,NULL,NULL,1,'2017-04-21 11:04:35',17),(98,2,107,2,NULL,NULL,1,'2017-04-21 11:07:33',2),(99,2,107,3,NULL,NULL,1,'2017-04-21 11:07:52',17),(100,2,107,2,NULL,NULL,1,'2017-04-21 11:14:20',2),(101,2,109,2,NULL,NULL,1,'2017-04-21 11:19:11',2),(102,2,107,2,NULL,NULL,1,'2017-04-21 11:19:57',2),(103,2,107,2,NULL,NULL,1,'2017-04-21 11:23:12',2),(104,2,107,2,NULL,NULL,1,'2017-04-21 11:29:32',2),(105,2,107,3,NULL,NULL,1,'2017-04-21 11:29:48',17),(106,2,109,2,NULL,NULL,1,'2017-04-21 11:32:33',2),(107,2,109,3,NULL,NULL,1,'2017-04-21 11:32:45',17),(108,2,109,2,NULL,NULL,1,'2017-04-22 07:23:59',2),(109,2,109,3,NULL,NULL,1,'2017-04-22 07:25:08',17),(110,2,109,2,NULL,NULL,1,'2017-04-22 07:47:16',2),(111,2,109,2,NULL,NULL,1,'2017-04-22 07:47:28',2),(112,2,109,3,NULL,NULL,1,'2017-04-22 07:48:45',17),(113,2,109,4,1,2,1,'2017-04-23 10:02:02',2),(114,2,111,1,1,NULL,1,'2017-04-23 11:57:07',2),(115,2,112,1,1,NULL,1,'2017-04-24 03:33:44',2),(116,2,113,1,2,NULL,1,'2017-04-23 10:48:51',2),(117,2,113,4,2,1,1,'2017-04-26 11:51:17',2),(118,2,112,4,1,1,1,'2017-04-27 10:36:07',2),(119,2,114,1,1,NULL,1,'2017-04-28 11:07:32',2),(120,2,115,1,1,NULL,1,'2017-04-28 11:17:44',2),(121,2,112,4,1,2,1,'2017-04-28 11:33:18',2),(122,2,106,4,1,1,1,'2017-05-01 07:45:59',2),(123,2,106,4,1,3,1,'2017-05-01 07:46:05',2),(124,2,106,4,1,4,1,'2017-05-01 07:46:11',2),(125,2,106,4,1,5,1,'2017-05-01 07:46:24',2),(126,2,106,4,1,6,1,'2017-05-01 07:46:52',2),(127,2,109,3,NULL,NULL,1,'2017-05-02 20:52:14',17),(128,2,111,2,NULL,NULL,1,'2017-05-02 21:04:27',2),(129,2,111,3,NULL,NULL,1,'2017-05-02 21:04:51',17),(130,2,109,2,NULL,NULL,1,'2017-05-02 21:23:28',2),(131,2,109,3,NULL,NULL,1,'2017-05-02 21:24:00',17),(132,2,107,4,1,5,1,'2017-05-03 23:42:25',2),(133,2,107,4,1,3,1,'2017-05-03 23:43:11',2),(134,2,112,4,1,3,1,'2017-05-04 00:32:05',2),(135,2,10,4,3,1,1,'2017-05-04 19:52:28',2),(136,2,10,4,3,2,1,'2017-05-04 19:53:50',2),(137,2,3,4,3,1,1,'2017-05-04 19:55:29',2),(138,2,19,4,1,1,1,'2017-05-04 19:59:10',2),(139,2,20,4,2,1,1,'2017-05-04 08:10:04',2),(140,2,22,4,1,1,1,'2017-05-04 20:11:13',2),(141,2,22,4,1,1,1,'2017-05-04 20:33:38',2),(142,2,32,4,1,1,1,'2017-05-04 08:51:41',2),(143,2,108,4,1,1,1,'2017-05-04 08:52:17',2),(144,2,115,4,1,1,1,'2017-05-04 23:27:36',2),(145,2,111,4,1,1,1,'2017-05-04 23:48:19',2),(146,2,115,4,1,2,1,'2017-05-05 00:07:41',2),(147,2,115,4,1,3,1,'2017-05-05 00:11:34',2),(148,2,114,4,1,1,1,'2017-05-05 21:20:40',2),(149,2,116,1,1,NULL,1,'2017-05-05 23:38:31',2),(150,2,116,4,1,1,1,'2017-05-05 23:44:12',2),(151,2,117,1,1,NULL,1,'2017-05-10 22:30:59',2),(152,2,118,1,1,NULL,1,'2017-05-10 22:31:42',2),(153,2,117,4,1,1,1,'2017-05-10 22:33:42',2),(154,2,118,4,1,1,1,'2017-05-10 22:37:12',2),(155,2,118,4,1,2,1,'2017-05-10 22:39:34',2),(156,2,118,4,1,3,1,'2017-05-10 22:43:03',2),(157,2,118,4,1,4,1,'2017-05-10 22:44:16',2),(158,2,118,4,1,5,1,'2017-05-10 22:45:04',2),(159,2,118,4,1,6,1,'2017-05-10 22:46:04',2),(160,2,117,4,1,2,1,'2017-05-10 22:51:03',2),(161,2,117,4,1,3,1,'2017-05-10 22:52:22',2),(162,2,117,4,1,4,1,'2017-05-10 22:53:12',2),(163,2,117,4,1,5,1,'2017-05-10 22:54:01',2),(164,2,117,4,1,6,1,'2017-05-10 22:54:44',2),(172,2,120,1,4,NULL,1,'2017-05-10 23:28:35',2),(173,2,120,4,4,1,1,'2017-05-10 23:29:11',2),(174,2,27,4,3,1,1,'2017-05-11 00:36:00',2),(175,2,27,4,3,2,1,'2017-05-11 00:36:26',2),(176,2,27,4,3,3,1,'2017-05-11 00:46:24',2),(177,2,27,4,3,4,1,'2017-05-11 00:47:51',2),(178,2,27,4,3,5,1,'2017-05-11 00:48:02',2),(179,2,27,4,3,6,1,'2017-05-11 00:48:18',2),(180,2,121,1,1,NULL,0,'2017-05-11 20:01:56',2),(181,2,122,1,1,NULL,1,'2017-05-12 19:41:00',2),(182,2,122,4,1,1,1,'2017-05-12 20:59:43',2),(183,2,123,1,1,NULL,0,'2017-05-28 14:53:16',2),(184,2,124,1,1,NULL,1,'2017-05-28 15:05:44',2),(185,2,116,2,NULL,NULL,1,'2017-05-29 23:35:26',2),(186,2,125,1,1,NULL,1,'2017-06-01 23:11:31',2),(187,2,125,4,1,1,1,'2017-06-01 23:11:57',2),(188,2,125,4,1,2,1,'2017-06-01 23:12:38',2),(189,2,126,1,1,NULL,1,'2017-06-10 19:01:51',2),(190,2,114,4,1,2,1,'2017-06-10 21:06:37',2),(191,2,126,4,1,1,1,'2017-06-12 20:48:41',2),(192,2,126,2,NULL,NULL,1,'2017-06-12 20:49:21',2),(193,2,114,4,1,3,1,'2017-06-16 20:26:47',2),(194,2,10,4,3,2,1,'2017-06-19 20:19:44',2),(195,2,127,1,1,NULL,1,'2017-06-26 16:42:45',2),(196,2,128,1,1,NULL,1,'2017-06-26 16:47:33',2),(197,2,129,1,2,NULL,1,'2017-07-15 18:45:49',2),(198,2,116,3,NULL,NULL,1,'2017-09-03 10:16:46',17),(199,2,127,2,NULL,NULL,1,'2017-09-03 10:37:59',2),(200,2,128,2,NULL,NULL,1,'2017-09-03 10:38:24',2),(201,2,124,2,NULL,NULL,1,'2017-09-03 10:41:52',2),(202,2,116,4,4,1,1,'2017-10-03 20:20:36',2),(203,2,129,4,2,2,1,'2017-10-08 00:22:35',2),(204,2,128,4,1,8,1,'2017-10-08 00:34:35',2),(205,2,130,1,2,NULL,1,'2017-10-08 01:00:02',2),(206,2,130,4,2,4,1,'2017-10-08 01:03:19',2),(207,2,130,4,2,2,1,'2017-10-08 01:03:41',2),(208,2,130,4,2,1,1,'2017-10-08 01:04:11',2),(209,2,130,4,2,3,1,'2017-10-08 01:04:25',2),(210,2,130,4,2,5,1,'2017-10-08 01:04:34',2),(211,2,131,1,1,NULL,0,'2017-10-08 20:37:26',18),(212,2,132,1,1,NULL,0,'2017-10-08 20:39:35',18),(213,2,133,1,5,NULL,0,'2017-10-08 21:09:08',18),(214,2,135,1,4,NULL,0,'2017-10-09 19:41:48',2);
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;

--
-- Table structure for table `passport_massagers`
--

DROP TABLE IF EXISTS `passport_massagers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `passport_massagers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `dispatch_to` varchar(50) DEFAULT NULL,
  `massager_name` varchar(50) DEFAULT NULL,
  `passport_tracking_ids` varchar(100) DEFAULT NULL,
  `barcodes` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passport_massagers`
--

/*!40000 ALTER TABLE `passport_massagers` DISABLE KEYS */;
INSERT INTO `passport_massagers` VALUES (1,2,NULL,NULL,'','[\"E000129\",\"E000128\",\"E000127\",\"E000126\"]',2,'2017-07-17 22:38:53'),(2,2,NULL,NULL,'','[\"E000003\"]',2,'2017-07-17 22:43:56'),(3,2,NULL,NULL,'','[\"E000003\"]',2,'2017-07-17 22:50:21'),(4,2,NULL,NULL,'','[\"E000003\"]',2,'2017-07-17 22:52:33'),(5,2,NULL,NULL,'','[\"E000003\"]',2,'2017-07-17 22:53:40'),(6,2,'1','pawan kumar','','[\"E000003\"]',2,'2017-07-17 23:19:02'),(7,2,'1','2dwe','','[\"E000109\"]',2,'2017-07-28 23:02:17'),(8,2,'1','','','[\"E000129\",\"\"]',2,'2017-10-02 18:47:12');
/*!40000 ALTER TABLE `passport_massagers` ENABLE KEYS */;

--
-- Table structure for table `passport_trackings`
--

DROP TABLE IF EXISTS `passport_trackings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `passport_trackings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) NOT NULL,
  `barcode` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` int(2) DEFAULT NULL,
  `process_type` int(2) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passport_trackings`
--

/*!40000 ALTER TABLE `passport_trackings` DISABLE KEYS */;
INSERT INTO `passport_trackings` VALUES (1,123,'E000123',2,1,1,2,'2017-06-27 00:00:00'),(2,123,'E000123',2,1,2,2,'2017-07-09 13:19:22'),(3,124,'E000124',2,1,1,2,'2017-07-09 13:19:22'),(4,128,'E000128',2,1,1,2,'2017-07-09 13:19:22'),(5,122,'E000122',2,1,1,2,'2017-07-09 23:27:34'),(6,122,'E000122',2,2,2,18,'2017-07-09 23:29:13'),(7,122,'E000122',2,2,3,18,'2017-07-09 23:30:18'),(9,120,'E000120',2,1,1,2,'2017-07-10 23:07:26'),(10,104,'E000104',2,1,1,2,'2017-07-12 21:04:21'),(11,123,'E000123',2,2,3,2,'2017-07-14 00:00:00'),(12,112,'E000112',2,1,1,2,'2017-07-14 20:29:53'),(14,106,'E000106',2,1,1,2,'2017-07-14 21:43:31'),(15,123,'E000123',2,1,4,2,'2017-07-14 21:43:31'),(16,124,'E000124',2,2,2,2,'2017-07-15 00:00:00'),(17,126,'E000126',2,1,1,2,'2017-07-17 22:38:53'),(18,127,'E000127',2,1,1,2,'2017-07-17 22:38:53'),(23,3,'E000003',2,1,1,2,'2017-07-17 23:19:01'),(24,109,'E000109',2,1,1,2,'2017-07-28 23:02:17'),(25,129,'E000129',2,1,1,2,'2017-10-02 18:47:12');
/*!40000 ALTER TABLE `passport_trackings` ENABLE KEYS */;

--
-- Table structure for table `sub_orders`
--

DROP TABLE IF EXISTS `sub_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subscription_id` int(11) NOT NULL,
  `company_ids` varchar(255) NOT NULL,
  `created_by` int(2) NOT NULL,
  `from_date` date NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_orders`
--

/*!40000 ALTER TABLE `sub_orders` DISABLE KEYS */;
INSERT INTO `sub_orders` VALUES (1,2,1,'1',2,'2017-03-25','2017-03-25 21:11:40');
/*!40000 ALTER TABLE `sub_orders` ENABLE KEYS */;

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_name` varchar(100) NOT NULL,
  `alias_name` varchar(100) NOT NULL,
  `plan_type` varchar(50) NOT NULL,
  `plan_price` varchar(20) NOT NULL,
  `package_period` int(11) NOT NULL,
  `number_of_companies` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriptions`
--

/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
INSERT INTO `subscriptions` VALUES (1,'Basic','basic','monthly','150',1,10,'2017-03-19 00:00:00',1,1),(2,'Economic','economic','monthly','300',1,20,'2017-03-19 00:00:00',1,1),(3,'Deluxe','deluxe','monthly','650',1,50,'2017-03-19 00:00:00',1,1),(4,'Unlimited','unlimited','monthly','900',1,100,'2017-03-19 00:00:00',1,1);
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;

--
-- Temporary view structure for view `user_actions`
--

DROP TABLE IF EXISTS `user_actions`;
/*!50001 DROP VIEW IF EXISTS `user_actions`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `user_actions` AS SELECT 
 1 AS `action_type`,
 1 AS `user_id`,
 1 AS `application_id`,
 1 AS `process_type`,
 1 AS `process_stage`,
 1 AS `field1`,
 1 AS `field2`,
 1 AS `created_date`,
 1 AS `created_by`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `user_activities`
--

DROP TABLE IF EXISTS `user_activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_activities` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `useragent` varchar(256) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `last_action` int(10) DEFAULT NULL,
  `last_url` text,
  `logout_time` int(10) DEFAULT NULL,
  `user_browser` text,
  `ip_address` varchar(50) DEFAULT NULL,
  `logout` int(11) NOT NULL DEFAULT '0',
  `deleted` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=140 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_activities`
--

/*!40000 ALTER TABLE `user_activities` DISABLE KEYS */;
INSERT INTO `user_activities` VALUES (11,'c89ad1b05dfbb9aa468005e1b84bfb26',NULL,1473802852,'/emandoobi/css/frontend/bootstrap.min.css.map',NULL,'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.76 Mobile Safari/537.36','::1',0,0,0,'2016-09-13 21:45:38','2016-09-13 23:10:53'),(14,'116db8774ce84694ed28cc73c7b6c731',NULL,1485992445,'/emandoobi_24_dec/css/new/bootstrap.min.css.map',NULL,'Mozilla/5.0 (iPad; CPU OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/601.1','::1',0,0,0,'2016-09-14 00:11:15','2017-02-02 01:10:45'),(86,'6ad9b437af3ecebb2010cbe7cd1dac48',NULL,1486504540,'/emandoobi_24_dec/css/new/bootstrap.min.css.map',NULL,'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Mobile Safari/537.36','::1',0,0,0,'2017-02-07 23:25:40','2017-02-07 23:25:40'),(128,'0a94e95631e34a2977abe4cce535cf83',NULL,1502221490,'/pk_test/reports/progress',NULL,'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36','::1',0,0,0,'2017-07-15 16:43:51','2017-08-08 19:44:52'),(139,'7a7f414a4f4ee7c48b7a9b5723f582d4',2,1508089504,'/pk_test/accessDenied',NULL,'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36','::1',0,0,1,'2017-10-14 20:27:24','2017-10-15 17:45:04'),(133,'a60ef9e644e1a1d10ce2f2635008f18d',NULL,1505931572,'/pk_test/css/fonts/fontawesome-webfont.ttf',NULL,'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36','::1',0,0,0,'2017-09-20 18:19:27','2017-09-20 18:19:32');
/*!40000 ALTER TABLE `user_activities` ENABLE KEYS */;

--
-- Table structure for table `user_addresses`
--

DROP TABLE IF EXISTS `user_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_addresses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `address` varchar(256) NOT NULL,
  `city` varchar(64) NOT NULL,
  `state` varchar(32) NOT NULL,
  `postalcode` varchar(8) NOT NULL,
  `phone_number` varchar(16) DEFAULT NULL,
  `type` int(4) DEFAULT NULL COMMENT 'Billing, Shipping etc',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_addresses`
--

/*!40000 ALTER TABLE `user_addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_addresses` ENABLE KEYS */;

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `photo` text,
  `bday` date DEFAULT NULL COMMENT 'Birthday',
  `location` varchar(256) DEFAULT NULL,
  `marital_status` varchar(20) DEFAULT NULL,
  `cellphone` varchar(15) DEFAULT NULL,
  `web_page` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_details`
--

/*!40000 ALTER TABLE `user_details` DISABLE KEYS */;
INSERT INTO `user_details` VALUES (1,37,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-05-28 19:04:27','2017-05-28 19:04:27');
/*!40000 ALTER TABLE `user_details` ENABLE KEYS */;

--
-- Table structure for table `user_group_permissions`
--

DROP TABLE IF EXISTS `user_group_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_group_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_group_id` int(10) unsigned NOT NULL,
  `controller` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `action` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `allowed` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=487 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_group_permissions`
--

/*!40000 ALTER TABLE `user_group_permissions` DISABLE KEYS */;
INSERT INTO `user_group_permissions` VALUES (1,1,'Users','dashboard',0),(2,2,'Users','dashboard',1),(3,3,'Users','dashboard',0),(4,4,'Users','dashboard',0),(5,5,'Users','dashboard',0),(6,1,'Companies','add',0),(7,2,'Companies','add',1),(8,3,'Companies','add',0),(9,4,'Companies','add',0),(10,5,'Companies','add',0),(11,1,'Companies','index',0),(12,2,'Companies','index',1),(13,3,'Companies','index',0),(14,4,'Companies','index',0),(15,5,'Companies','index',0),(16,1,'Applications','index',0),(17,2,'Applications','index',1),(18,3,'Applications','index',0),(19,4,'Applications','index',0),(20,5,'Applications','index',0),(21,1,'Applications','add',0),(22,2,'Applications','add',1),(23,3,'Applications','add',0),(24,4,'Applications','add',0),(25,5,'Applications','add',0),(26,1,'Users','add_employee',0),(27,2,'Users','add_employee',1),(28,3,'Users','add_employee',0),(29,4,'Users','add_employee',0),(30,5,'Users','add_employee',0),(31,1,'Companies','all',0),(32,2,'Companies','all',1),(33,3,'Companies','all',0),(34,4,'Companies','all',0),(35,5,'Companies','all',0),(36,6,'Companies','all',0),(37,1,'Applications','adjustment',0),(38,2,'Applications','adjustment',1),(39,3,'Applications','adjustment',0),(40,4,'Applications','adjustment',0),(41,5,'Applications','adjustment',0),(42,6,'Applications','adjustment',1),(43,1,'Applications','cancellation',0),(44,2,'Applications','cancellation',1),(45,3,'Applications','cancellation',0),(46,4,'Applications','cancellation',0),(47,5,'Applications','cancellation',0),(48,6,'Applications','cancellation',1),(49,1,'Applications','local_transfer',0),(50,2,'Applications','local_transfer',1),(51,3,'Applications','local_transfer',0),(52,4,'Applications','local_transfer',0),(53,5,'Applications','local_transfer',0),(54,6,'Applications','local_transfer',1),(55,1,'Applications','renew_residency',0),(56,2,'Applications','renew_residency',1),(57,3,'Applications','renew_residency',0),(58,4,'Applications','renew_residency',0),(59,5,'Applications','renew_residency',0),(60,6,'Applications','renew_residency',1),(61,1,'Applications','new_residency',0),(62,2,'Applications','new_residency',1),(63,3,'Applications','new_residency',0),(64,4,'Applications','new_residency',0),(65,5,'Applications','new_residency',0),(66,6,'Applications','new_residency',1),(67,1,'Applications','all',0),(68,2,'Applications','all',1),(69,3,'Applications','all',0),(70,4,'Applications','all',0),(71,5,'Applications','all',0),(72,6,'Applications','all',0),(73,1,'Applications','everyone',0),(74,2,'Applications','everyone',1),(75,3,'Applications','everyone',0),(76,4,'Applications','everyone',0),(77,5,'Applications','everyone',0),(78,6,'Applications','everyone',0),(79,1,'Users','everyone',0),(80,2,'Users','everyone',1),(81,3,'Users','everyone',0),(82,4,'Users','everyone',0),(83,5,'Users','everyone',0),(84,6,'Users','everyone',0),(85,1,'Applications','everything',0),(86,2,'Applications','everything',1),(87,3,'Applications','everything',0),(88,4,'Applications','everything',0),(89,5,'Applications','everything',0),(90,6,'Applications','everything',1),(91,6,'Companies','add',0),(92,7,'Companies','add',0),(93,8,'Companies','add',1),(94,6,'Companies','index',1),(95,7,'Companies','index',0),(96,8,'Companies','index',1),(97,7,'Companies','all',0),(98,8,'Companies','all',1),(99,7,'Users','everyone',0),(100,8,'Users','everyone',1),(101,6,'Users','add_employee',0),(102,7,'Users','add_employee',0),(103,8,'Users','add_employee',1),(104,1,'Users','userInvitation',0),(105,2,'Users','userInvitation',0),(106,3,'Users','userInvitation',1),(107,4,'Users','userInvitation',0),(108,5,'Users','userInvitation',0),(109,6,'Users','userInvitation',0),(110,7,'Users','userInvitation',0),(111,8,'Users','userInvitation',0),(112,6,'Applications','index',0),(113,7,'Applications','index',0),(114,8,'Applications','index',1),(115,7,'Applications','everything',0),(116,8,'Applications','everything',1),(117,1,'Applications','update_process',0),(118,2,'Applications','update_process',1),(119,3,'Applications','update_process',0),(120,4,'Applications','update_process',0),(121,5,'Applications','update_process',0),(122,6,'Applications','update_process',1),(123,7,'Applications','update_process',0),(124,8,'Applications','update_process',1),(125,1,'Applications','visa_process_feedback',0),(126,2,'Applications','visa_process_feedback',1),(127,3,'Applications','visa_process_feedback',0),(128,4,'Applications','visa_process_feedback',0),(129,5,'Applications','visa_process_feedback',0),(130,6,'Applications','visa_process_feedback',1),(131,7,'Applications','visa_process_feedback',0),(132,8,'Applications','visa_process_feedback',1),(133,1,'Applications','everything1',0),(134,2,'Applications','everything1',1),(135,3,'Applications','everything1',0),(136,4,'Applications','everything1',0),(137,5,'Applications','everything1',0),(138,6,'Applications','everything1',1),(139,7,'Applications','everything1',0),(140,8,'Applications','everything1',1),(141,1,'Applications','get_documents',0),(142,2,'Applications','get_documents',1),(143,3,'Applications','get_documents',0),(144,4,'Applications','get_documents',0),(145,5,'Applications','get_documents',0),(146,6,'Applications','get_documents',1),(147,7,'Applications','get_documents',0),(148,8,'Applications','get_documents',1),(149,1,'Applications','everything2',0),(150,2,'Applications','everything2',1),(151,3,'Applications','everything2',0),(152,4,'Applications','everything2',0),(153,5,'Applications','everything2',0),(154,6,'Applications','everything2',1),(155,7,'Applications','everything2',0),(156,8,'Applications','everything2',1),(157,1,'Applications','download_docs',0),(158,2,'Applications','download_docs',1),(159,3,'Applications','download_docs',0),(160,4,'Applications','download_docs',0),(161,5,'Applications','download_docs',0),(162,6,'Applications','download_docs',1),(163,7,'Applications','download_docs',0),(164,8,'Applications','download_docs',1),(165,1,'Applications','get_issue_detail',0),(166,2,'Applications','get_issue_detail',0),(167,3,'Applications','get_issue_detail',0),(168,4,'Applications','get_issue_detail',0),(169,5,'Applications','get_issue_detail',0),(170,6,'Applications','get_issue_detail',0),(171,7,'Applications','get_issue_detail',0),(172,8,'Applications','get_issue_detail',1),(173,1,'Applications','visa_process_feedback_hr',0),(174,2,'Applications','visa_process_feedback_hr',1),(175,3,'Applications','visa_process_feedback_hr',0),(176,4,'Applications','visa_process_feedback_hr',0),(177,5,'Applications','visa_process_feedback_hr',0),(178,6,'Applications','visa_process_feedback_hr',0),(179,7,'Applications','visa_process_feedback_hr',0),(180,8,'Applications','visa_process_feedback_hr',1),(181,1,'Applications','app_delete',0),(182,2,'Applications','app_delete',1),(183,3,'Applications','app_delete',0),(184,4,'Applications','app_delete',0),(185,5,'Applications','app_delete',0),(186,6,'Applications','app_delete',1),(187,7,'Applications','app_delete',0),(188,8,'Applications','app_delete',1),(189,1,'Applications','completed',0),(190,2,'Applications','completed',1),(191,3,'Applications','completed',0),(192,4,'Applications','completed',0),(193,5,'Applications','completed',0),(194,6,'Applications','completed',1),(195,7,'Applications','completed',0),(196,8,'Applications','completed',1),(197,1,'Companies','view',0),(198,2,'Companies','view',1),(199,3,'Companies','view',1),(200,4,'Companies','view',0),(201,5,'Companies','view',0),(202,6,'Companies','view',0),(203,7,'Companies','view',0),(204,8,'Companies','view',0),(205,1,'Companies','edit',0),(206,2,'Companies','edit',1),(207,3,'Companies','edit',1),(208,4,'Companies','edit',0),(209,5,'Companies','edit',0),(210,6,'Companies','edit',0),(211,7,'Companies','edit',0),(212,8,'Companies','edit',0),(213,1,'Companies','delete_row',0),(214,2,'Companies','delete_row',1),(215,3,'Companies','delete_row',0),(216,4,'Companies','delete_row',0),(217,5,'Companies','delete_row',0),(218,6,'Companies','delete_row',1),(219,7,'Companies','delete_row',0),(220,8,'Companies','delete_row',1),(221,1,'Users','edit_employee',0),(222,2,'Users','edit_employee',1),(223,3,'Users','edit_employee',0),(224,4,'Users','edit_employee',0),(225,5,'Users','edit_employee',0),(226,6,'Users','edit_employee',1),(227,7,'Users','edit_employee',0),(228,8,'Users','edit_employee',1),(229,1,'Applications','download_all',0),(230,2,'Applications','download_all',1),(231,3,'Applications','download_all',1),(232,4,'Applications','download_all',0),(233,5,'Applications','download_all',0),(234,6,'Applications','download_all',1),(235,7,'Applications','download_all',0),(236,8,'Applications','download_all',1),(237,1,'Applications','view',0),(238,2,'Applications','view',1),(239,3,'Applications','view',0),(240,4,'Applications','view',0),(241,5,'Applications','view',0),(242,6,'Applications','view',1),(243,7,'Applications','view',0),(244,8,'Applications','view',1),(245,1,'Applications','everything_new',1),(246,2,'Applications','everything_new',1),(247,3,'Applications','everything_new',1),(248,4,'Applications','everything_new',0),(249,5,'Applications','everything_new',0),(250,6,'Applications','everything_new',0),(251,7,'Applications','everything_new',0),(252,8,'Applications','everything_new',1),(253,1,'Applications','put_refernece_number',0),(254,2,'Applications','put_refernece_number',1),(255,3,'Applications','put_refernece_number',0),(256,4,'Applications','put_refernece_number',0),(257,5,'Applications','put_refernece_number',0),(258,6,'Applications','put_refernece_number',1),(259,7,'Applications','put_refernece_number',0),(260,8,'Applications','put_refernece_number',1),(261,1,'Users','accessDenied',1),(262,2,'Users','accessDenied',1),(263,3,'Users','accessDenied',1),(264,4,'Users','accessDenied',1),(265,5,'Users','accessDenied',1),(266,6,'Users','accessDenied',1),(267,7,'Users','accessDenied',0),(268,8,'Users','accessDenied',1),(269,7,'Applications','new_residency',0),(270,8,'Applications','new_residency',1),(271,7,'Applications','renew_residency',0),(272,8,'Applications','renew_residency',1),(273,7,'Applications','local_transfer',0),(274,8,'Applications','local_transfer',1),(275,7,'Applications','cancellation',0),(276,8,'Applications','cancellation',1),(277,7,'Applications','adjustment',0),(278,8,'Applications','adjustment',1),(279,1,'Reports','progress',1),(280,2,'Reports','progress',1),(281,3,'Reports','progress',0),(282,4,'Reports','progress',0),(283,5,'Reports','progress',0),(284,6,'Reports','progress',1),(285,7,'Reports','progress',0),(286,8,'Reports','progress',1),(287,1,'UserActivity','everyone',0),(288,2,'UserActivity','everyone',1),(289,3,'UserActivity','everyone',0),(290,4,'UserActivity','everyone',0),(291,5,'UserActivity','everyone',0),(292,6,'UserActivity','everyone',1),(293,7,'UserActivity','everyone',0),(294,8,'UserActivity','everyone',1),(295,1,'UserActivity','me',0),(296,2,'UserActivity','me',1),(297,3,'UserActivity','me',0),(298,4,'UserActivity','me',0),(299,5,'UserActivity','me',0),(300,6,'UserActivity','me',1),(301,7,'UserActivity','me',0),(302,8,'UserActivity','me',1),(303,1,'UserActivity','view_employee',0),(304,2,'UserActivity','view_employee',1),(305,3,'UserActivity','view_employee',0),(306,4,'UserActivity','view_employee',0),(307,5,'UserActivity','view_employee',0),(308,6,'UserActivity','view_employee',1),(309,7,'UserActivity','view_employee',0),(310,8,'UserActivity','view_employee',1),(311,1,'Users','changePassword',0),(312,2,'Users','changePassword',1),(313,3,'Users','changePassword',0),(314,4,'Users','changePassword',0),(315,5,'Users','changePassword',0),(316,6,'Users','changePassword',1),(317,7,'Users','changePassword',0),(318,8,'Users','changePassword',1),(319,1,'UserActivity','change_password',0),(320,2,'UserActivity','change_password',1),(321,3,'UserActivity','change_password',0),(322,4,'UserActivity','change_password',0),(323,5,'UserActivity','change_password',0),(324,6,'UserActivity','change_password',1),(325,7,'UserActivity','change_password',0),(326,8,'UserActivity','change_password',1),(327,1,'Applications','test',0),(328,2,'Applications','test',1),(329,3,'Applications','test',0),(330,4,'Applications','test',0),(331,5,'Applications','test',0),(332,6,'Applications','test',0),(333,7,'Applications','test',0),(334,8,'Applications','test',0),(335,1,'UserActivity','notifications',0),(336,2,'UserActivity','notifications',1),(337,3,'UserActivity','notifications',0),(338,4,'UserActivity','notifications',0),(339,5,'UserActivity','notifications',0),(340,6,'UserActivity','notifications',1),(341,7,'UserActivity','notifications',0),(342,8,'UserActivity','notifications',1),(343,1,'Subscriptions','upgrade',0),(344,2,'Subscriptions','upgrade',1),(345,3,'Subscriptions','upgrade',0),(346,4,'Subscriptions','upgrade',0),(347,5,'Subscriptions','upgrade',0),(348,6,'Subscriptions','upgrade',1),(349,7,'Subscriptions','upgrade',0),(350,8,'Subscriptions','upgrade',1),(351,1,'Subscriptions','choose_plan_user',0),(352,2,'Subscriptions','choose_plan_user',1),(353,3,'Subscriptions','choose_plan_user',0),(354,4,'Subscriptions','choose_plan_user',0),(355,5,'Subscriptions','choose_plan_user',0),(356,6,'Subscriptions','choose_plan_user',0),(357,7,'Subscriptions','choose_plan_user',0),(358,8,'Subscriptions','choose_plan_user',0),(359,1,'Applications','edit_new_residency',0),(360,2,'Applications','edit_new_residency',1),(361,3,'Applications','edit_new_residency',0),(362,4,'Applications','edit_new_residency',0),(363,5,'Applications','edit_new_residency',0),(364,6,'Applications','edit_new_residency',0),(365,7,'Applications','edit_new_residency',0),(366,8,'Applications','edit_new_residency',1),(367,1,'Applications','edit_local_transfer',0),(368,2,'Applications','edit_local_transfer',1),(369,3,'Applications','edit_local_transfer',0),(370,4,'Applications','edit_local_transfer',0),(371,5,'Applications','edit_local_transfer',0),(372,6,'Applications','edit_local_transfer',0),(373,7,'Applications','edit_local_transfer',0),(374,8,'Applications','edit_local_transfer',0),(375,1,'Applications','edit_cancellation',0),(376,2,'Applications','edit_cancellation',1),(377,3,'Applications','edit_cancellation',0),(378,4,'Applications','edit_cancellation',0),(379,5,'Applications','edit_cancellation',0),(380,6,'Applications','edit_cancellation',0),(381,7,'Applications','edit_cancellation',0),(382,8,'Applications','edit_cancellation',0),(383,1,'Applications','edit_renew_residency',0),(384,2,'Applications','edit_renew_residency',1),(385,3,'Applications','edit_renew_residency',0),(386,4,'Applications','edit_renew_residency',0),(387,5,'Applications','edit_renew_residency',0),(388,6,'Applications','edit_renew_residency',0),(389,7,'Applications','edit_renew_residency',0),(390,8,'Applications','edit_renew_residency',0),(391,1,'Applications','convert_into_cancellation',0),(392,2,'Applications','convert_into_cancellation',1),(393,3,'Applications','convert_into_cancellation',0),(394,4,'Applications','convert_into_cancellation',0),(395,5,'Applications','convert_into_cancellation',0),(396,6,'Applications','convert_into_cancellation',0),(397,7,'Applications','convert_into_cancellation',0),(398,8,'Applications','convert_into_cancellation',1),(399,1,'Companies','upload_single_document',0),(400,2,'Companies','upload_single_document',1),(401,3,'Companies','upload_single_document',1),(402,4,'Companies','upload_single_document',0),(403,5,'Companies','upload_single_document',0),(404,6,'Companies','upload_single_document',0),(405,7,'Companies','upload_single_document',0),(406,8,'Companies','upload_single_document',0),(407,1,'Companies','get_history_detail',0),(408,2,'Companies','get_history_detail',1),(409,3,'Companies','get_history_detail',1),(410,4,'Companies','get_history_detail',0),(411,5,'Companies','get_history_detail',0),(412,6,'Companies','get_history_detail',1),(413,7,'Companies','get_history_detail',0),(414,8,'Companies','get_history_detail',1),(415,1,'Companies','get_company_documents',0),(416,2,'Companies','get_company_documents',1),(417,3,'Companies','get_company_documents',0),(418,4,'Companies','get_company_documents',0),(419,5,'Companies','get_company_documents',0),(420,6,'Companies','get_company_documents',1),(421,7,'Companies','get_company_documents',0),(422,8,'Companies','get_company_documents',1),(423,1,'UserActivity','passport_tracking',0),(424,2,'UserActivity','passport_tracking',1),(425,3,'UserActivity','passport_tracking',0),(426,4,'UserActivity','passport_tracking',0),(427,5,'UserActivity','passport_tracking',0),(428,6,'UserActivity','passport_tracking',1),(429,7,'UserActivity','passport_tracking',0),(430,8,'UserActivity','passport_tracking',1),(431,1,'UserActivity','passport_tracking_submit',0),(432,2,'UserActivity','passport_tracking_submit',1),(433,3,'UserActivity','passport_tracking_submit',0),(434,4,'UserActivity','passport_tracking_submit',0),(435,5,'UserActivity','passport_tracking_submit',0),(436,6,'UserActivity','passport_tracking_submit',1),(437,7,'UserActivity','passport_tracking_submit',0),(438,8,'UserActivity','passport_tracking_submit',1),(439,1,'Reports','passport_reports',0),(440,2,'Reports','passport_reports',1),(441,3,'Reports','passport_reports',0),(442,4,'Reports','passport_reports',0),(443,5,'Reports','passport_reports',0),(444,6,'Reports','passport_reports',1),(445,7,'Reports','passport_reports',0),(446,8,'Reports','passport_reports',1),(447,1,'Applications','test2',0),(448,2,'Applications','test2',1),(449,3,'Applications','test2',0),(450,4,'Applications','test2',0),(451,5,'Applications','test2',0),(452,6,'Applications','test2',0),(453,7,'Applications','test2',0),(454,8,'Applications','test2',0),(455,1,'Reports','hr_dashboard',0),(456,2,'Reports','hr_dashboard',1),(457,3,'Reports','hr_dashboard',0),(458,4,'Reports','hr_dashboard',0),(459,5,'Reports','hr_dashboard',0),(460,6,'Reports','hr_dashboard',1),(461,7,'Reports','hr_dashboard',0),(462,8,'Reports','hr_dashboard',1),(463,1,'PassportTrackings','index',0),(464,2,'PassportTrackings','index',1),(465,3,'PassportTrackings','index',0),(466,4,'PassportTrackings','index',0),(467,5,'PassportTrackings','index',0),(468,6,'PassportTrackings','index',1),(469,7,'PassportTrackings','index',0),(470,8,'PassportTrackings','index',1),(471,1,'Applications','get_barcode_image',0),(472,2,'Applications','get_barcode_image',1),(473,3,'Applications','get_barcode_image',0),(474,4,'Applications','get_barcode_image',0),(475,5,'Applications','get_barcode_image',0),(476,6,'Applications','get_barcode_image',0),(477,7,'Applications','get_barcode_image',0),(478,8,'Applications','get_barcode_image',0),(479,1,'Applications','barcode_print',0),(480,2,'Applications','barcode_print',1),(481,3,'Applications','barcode_print',0),(482,4,'Applications','barcode_print',0),(483,5,'Applications','barcode_print',0),(484,6,'Applications','barcode_print',0),(485,7,'Applications','barcode_print',0),(486,8,'Applications','barcode_print',1);
/*!40000 ALTER TABLE `user_group_permissions` ENABLE KEYS */;

--
-- Table structure for table `user_groups`
--

DROP TABLE IF EXISTS `user_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `alias_name` varchar(100) DEFAULT NULL,
  `allowRegistration` int(1) NOT NULL DEFAULT '1',
  `role_for` int(11) NOT NULL DEFAULT '0' COMMENT '0=>admin side, 1=>front end',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_groups`
--

/*!40000 ALTER TABLE `user_groups` DISABLE KEYS */;
INSERT INTO `user_groups` VALUES (1,'Admin','Admin',0,0,'2015-02-11 13:36:26','2015-02-11 13:36:26'),(2,'User','User',1,0,'2015-02-11 13:36:26','2015-02-11 13:36:26'),(3,'Guest','Guest',0,0,'2015-02-11 13:36:26','2015-02-11 13:36:26'),(4,'Operator','operator',0,0,'2015-03-23 10:21:32','2015-03-23 10:21:47'),(5,'Accountant','accountant',1,0,'2015-10-14 17:05:37','2015-10-14 17:05:37'),(6,'GRO','gro',1,1,'2016-09-24 00:48:52','2016-09-24 00:48:52'),(7,'typing person','typing',1,1,'2016-10-18 21:13:45','2017-04-01 20:05:57'),(8,'HR','hr',1,1,'2016-10-20 20:54:31','2016-10-20 20:54:31');
/*!40000 ALTER TABLE `user_groups` ENABLE KEYS */;

--
-- Table structure for table `user_settings`
--

DROP TABLE IF EXISTS `user_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_settings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `name_public` text COMMENT 'name shown on screen',
  `value` varchar(256) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_settings`
--

/*!40000 ALTER TABLE `user_settings` DISABLE KEYS */;
INSERT INTO `user_settings` VALUES (1,'defaultTimeZone','Enter default time zone identifier','Asia/Dubai','input'),(2,'siteName','Enter Your Site Name','Emandoobi','input'),(3,'siteRegistration','New Registration is allowed or not','1','checkbox'),(4,'allowDeleteAccount','Allow users to delete account','0','checkbox'),(5,'sendRegistrationMail','Send Registration Mail After User Registered','1','checkbox'),(6,'sendPasswordChangeMail','Send Password Change Mail After User changed password','1','checkbox'),(7,'emailVerification','Want to verify user\'s email address?','1','checkbox'),(8,'emailFromAddress','Enter email by which emails will be send.','example@example.com','input'),(9,'emailFromName','Enter Email From Name','User Management Plugin','input'),(10,'allowChangeUsername','Do you want to allow users to change their username?','0','checkbox'),(11,'bannedUsernames','Set banned usernames comma separated(no space, no quotes)','Administrator, SuperAdmin','input'),(12,'useRecaptcha','Do you want to captcha support on registration form?','1','checkbox'),(13,'privateKeyFromRecaptcha','Enter private key for Recaptcha from google','','input'),(14,'publicKeyFromRecaptcha','Enter public key for recaptcha from google','','input'),(15,'loginRedirectUrl','Enter URL where user will be redirected after login ','/dashboard','input'),(16,'logoutRedirectUrl','Enter URL where user will be redirected after logout','/','input'),(17,'permissions','Do you Want to enable permissions for users?','1','checkbox'),(18,'adminPermissions','Do you want to check permissions for Admin?','0','checkbox'),(19,'defaultGroupId','Enter default group id for user registration','2','input'),(20,'adminGroupId','Enter Admin Group Id','1','input'),(21,'guestGroupId','Enter Guest Group Id','3','input'),(22,'useFacebookLogin','Want to use Facebook Connect on your site?','1','checkbox'),(23,'facebookAppId','Facebook Application Id','445048658985201','input'),(24,'facebookSecret','Facebook Application Secret Code','6f8cbaf0bfdd571e8b047cd1cdb45453','input'),(25,'facebookScope','Facebook Permissions','public_profile, email','input'),(26,'useTwitterLogin','Want to use Twitter Connect on your site?','0','checkbox'),(27,'twitterConsumerKey','Twitter Consumer Key','','input'),(28,'twitterConsumerSecret','Twitter Consumer Secret','','input'),(29,'useGmailLogin','Want to use Gmail Connect on your site?','1','checkbox'),(30,'useYahooLogin','Want to use Yahoo Connect on your site?','0','checkbox'),(31,'useLinkedinLogin','Want to use Linkedin Connect on your site?','0','checkbox'),(32,'linkedinApiKey','Linkedin Api Key','','input'),(33,'linkedinSecretKey','Linkedin Secret Key','','input'),(34,'useFoursquareLogin','Want to use Foursquare Connect on your site?','0','checkbox'),(35,'foursquareClientId','Foursquare Client Id','','input'),(36,'foursquareClientSecret','Foursquare Client Secret','','input'),(37,'viewOnlineUserTime','You can view online users and guest from last few minutes, set time in minutes ','30','input'),(38,'useHttps','Do you want to HTTPS for whole site?','0','checkbox'),(39,'httpsUrls','You can set selected urls for HTTPS (e.g. users/login, users/register)',NULL,'input'),(40,'imgDir','Enter Image directory name where users profile photos will be uploaded. This directory should be in webroot/img directory','umphotos','input'),(41,'googleAppId','Google App Id','176072272130-oop5fsnc62do45b1eare7sdf8pn73hfb.apps.googleusercontent.com','input'),(42,'googleSecret','Google Secret Key','yx2hmPlYTcjQ1E227eCLrU4X','input'),(43,'adminLoginString','Login_String for Admin and Operator (login/panel/?)','emandoobi_admin','input');
/*!40000 ALTER TABLE `user_settings` ENABLE KEYS */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `fb_id` bigint(100) DEFAULT NULL,
  `fb_access_token` text,
  `twt_id` bigint(100) DEFAULT NULL,
  `twt_access_token` text,
  `twt_access_secret` text,
  `ldn_id` varchar(100) DEFAULT NULL,
  `user_group_id` varchar(256) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `phone` varchar(25) NOT NULL,
  `company_id` varchar(255) DEFAULT NULL,
  `active` varchar(3) DEFAULT '0' COMMENT 'for user is active user or inactive user',
  `email_verified` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `by_admin` int(1) NOT NULL DEFAULT '0',
  `is_subscription` int(11) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(10) NOT NULL,
  `modified_by` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`username`),
  KEY `mail` (`email`),
  KEY `users_FKIndex1` (`user_group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,0,NULL,NULL,NULL,NULL,NULL,NULL,'1','admin','7e72cdbf55c5447e9b8421645ae95229','2e22accab527754ce057648ed50cedc1','it@emandoobi.com','Admin',NULL,'',NULL,'1',1,'2017-10-08 10:56:47',0,1,'2016-09-09 10:08:00','2016-09-09 10:08:00',1,1),(2,0,NULL,NULL,NULL,NULL,NULL,NULL,'2','a','3a16f197249e93f3dd99392b6e65e61f','887fc76038408fc731c87a6ad5927e99','pawanpnf@gmail.com','pawan singh','kumar','7503518728',NULL,'1',1,'2017-10-15 05:44:59',0,1,'2016-09-11 13:15:32','2017-01-26 22:07:16',0,0),(17,2,NULL,NULL,NULL,NULL,NULL,NULL,'8',NULL,'3a16f197249e93f3dd99392b6e65e61f','887fc76038408fc731c87a6ad5927e99','pawan199115@gmail.com','tester',NULL,'99999999','[\"11\",\"15\"]','1',1,'2017-10-05 11:04:57',0,1,'2016-10-20 21:25:40','2017-04-01 20:18:01',0,0),(4,0,NULL,NULL,NULL,NULL,NULL,NULL,'2','c','4ff27d7899c8a07ea2459a64be8645f5','d1d5814fc4bf7e1b995293e2b9c50b01','deepak@gmai.com','deep','kumar','',NULL,'1',1,NULL,0,1,'2016-09-11 13:26:09','2016-09-11 13:26:09',0,0),(5,0,NULL,NULL,NULL,NULL,NULL,NULL,'2',NULL,'a12643cf64d6dd3bb99b072762631afd','1fb0d3388d7b2769abefcbd73ffaca87','pk@pks.com','pawan kr',NULL,'',NULL,'0',0,NULL,0,1,'2016-09-13 22:45:42','2016-09-13 22:45:42',0,0),(6,0,NULL,NULL,NULL,NULL,NULL,NULL,'2',NULL,'7761934ee4f83413c9b54b252006b0a1','81f00cc01fc97f037e1f3acddbeab8b9','ramesh@gm.com','ramesh kumar',NULL,'',NULL,'1',1,'2016-09-14 10:00:33',0,1,'2016-09-14 21:58:18','2016-09-14 21:58:18',0,0),(7,0,NULL,NULL,NULL,NULL,NULL,NULL,'2',NULL,'72585bc5372b2ca64f73b8a9fe85df16','ddae4b4d31d456e8fceb60732b80fb7d','hamad@gmail.com','Hamad eghdani',NULL,'',NULL,'0',1,'2016-09-14 10:53:44',0,1,'2016-09-14 22:19:42','2016-09-14 22:19:42',0,0),(13,0,NULL,NULL,NULL,NULL,NULL,NULL,'6',NULL,'5f264167fe70a8d8b7e54361cb241603','9c3412cad23ca341d9fb2f2cd61da840','rajesh@abc.com','rajesh kumar',NULL,'',NULL,'1',1,'2016-09-30 09:56:42',0,1,'2016-09-26 00:01:23','2016-09-30 21:56:35',0,0),(14,0,NULL,NULL,NULL,NULL,NULL,NULL,'6',NULL,NULL,NULL,'deepak1@gmai.com','deepak kumar',NULL,'',NULL,'1',0,NULL,0,1,'2016-09-30 22:18:28','2016-09-30 22:18:28',0,0),(15,0,NULL,NULL,NULL,NULL,NULL,NULL,'6',NULL,NULL,NULL,'raj@sm.com','raj',NULL,'',NULL,'0',0,NULL,0,1,'2016-10-07 21:27:30','2016-10-07 21:27:30',0,0),(18,2,NULL,NULL,NULL,NULL,NULL,NULL,'6',NULL,'f1dd93c8d00b7b83476e927f9171f456','f7e2733959a8c124ff434f8fc4cfd09a','pawan@gmail.com','pawan',NULL,'','[\"11\",\"15\"]','1',1,'2017-10-14 08:22:58',0,1,'2016-11-17 23:31:51','2017-04-21 20:45:00',0,0),(19,2,NULL,NULL,NULL,NULL,NULL,NULL,'7',NULL,NULL,NULL,'new@fm.com','new pk',NULL,'',NULL,'0',0,NULL,0,1,'2017-01-02 01:27:59','2017-01-02 01:27:59',0,0),(24,0,NULL,NULL,NULL,NULL,NULL,NULL,'2',NULL,'e4650fce3369e6ba0ff09502d84e3da5','05ca04b8c9cee0750f45f9e6657a10fd','abc@gmail.com','abc',NULL,'',NULL,'0',0,NULL,0,1,'2017-01-20 00:10:35','2017-01-20 00:10:35',0,0),(25,0,NULL,NULL,NULL,NULL,NULL,NULL,'2',NULL,'0b475652549583cfe981f9e92de5d5db','2e84d24b369f27b40cb78a4fd32b8374','pk@gmail.com','pk',NULL,'',NULL,'1',1,'2017-01-22 01:00:51',0,1,'2017-01-21 23:36:44','2017-01-21 23:36:44',2,0),(26,2,NULL,NULL,NULL,NULL,NULL,NULL,'7',NULL,NULL,NULL,'raj@raj.com','Raj singh',NULL,'',NULL,'0',0,NULL,0,1,'2017-01-24 21:29:15','2017-01-24 21:29:15',2,0),(27,2,NULL,NULL,NULL,NULL,NULL,NULL,'7',NULL,NULL,NULL,'as@ds.com','pakora singh',NULL,'999999999',NULL,'0',0,NULL,0,1,'2017-01-26 14:22:32','2017-01-26 21:47:25',2,0),(28,0,NULL,NULL,NULL,NULL,NULL,NULL,'8',NULL,NULL,NULL,'abc@abc.com','pal singh',NULL,'9999999999',NULL,'0',0,NULL,0,1,'2017-01-26 14:28:41','2017-01-26 20:17:14',2,0),(32,2,NULL,NULL,NULL,NULL,NULL,NULL,'7',NULL,NULL,NULL,'pks@pkaa.com','pks',NULL,'45454545',NULL,'0',0,NULL,0,1,'2017-02-02 01:39:01','2017-02-02 01:39:01',2,0),(33,2,NULL,NULL,NULL,NULL,NULL,NULL,'8',NULL,NULL,NULL,'raj@as.com','raj kumar',NULL,'3434344','[\"11\"]','0',1,NULL,0,1,'2017-02-02 01:46:53','2017-02-02 02:06:24',2,0),(34,2,NULL,NULL,NULL,NULL,NULL,NULL,'8',NULL,'b2d4c329c87effa5f3400b8a522cd1a1','52e12ce1ec917c7305e3031629043664','pawaasasnpnf@gmail.com','pawan',NULL,'343434','[\"11\",\"12\",\"20\",\"21\"]','1',1,'2017-03-25 10:05:58',0,1,'2017-02-02 01:49:23','2017-03-25 22:05:32',2,0),(35,2,NULL,NULL,NULL,NULL,NULL,NULL,'8',NULL,NULL,NULL,'test@smm.com','Tester person',NULL,'999999999','[\"11\",\"12\",\"15\",\"19\",\"20\",\"21\",\"22\"]','0',0,NULL,0,1,'2017-03-25 21:45:08','2017-03-25 21:45:08',2,0),(36,2,NULL,NULL,NULL,NULL,NULL,NULL,'7',NULL,NULL,NULL,'ll@kk.com','kjkjkj',NULL,'999999999','[\"11\",\"12\",\"15\",\"19\",\"20\",\"21\",\"22\"]','0',1,NULL,0,1,'2017-03-30 20:53:17','2017-03-30 20:53:17',2,0),(37,0,NULL,NULL,NULL,NULL,NULL,NULL,'4',NULL,'f64c8793ffffbc2dcf9b47a6beeb49e6','7fb38dc4a57000ae46ae9469c98a1fb0','aas@aaa.com','aaaa','444','',NULL,'1',1,NULL,1,1,'2017-05-28 19:04:26','2017-05-28 19:04:26',0,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

--
-- Dumping routines for database 'emandoobi'
--
/*!50003 DROP PROCEDURE IF EXISTS `app_progress_report` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `app_progress_report`(IN `userid` INTEGER)
BEGIN
	drop table if exists app_progress_reports;
	drop table if exists ref_app_id;

	CREATE TABLE app_progress_reports (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		Heading varchar(30) NOT NULL,
		entry_permit int NULL,
		outpass int NULL,
		emirates_id int NULL,
		medical_test int NULL,
		zajel int NULL,
		residence_permit int NULL,
		immigration_approval int NULL,
		evision_approval int NULL,
        visa_cancellation int NULL
	);
    

	CREATE TABLE ref_app_id (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		app_id int NULL
	);
	insert into ref_app_id(app_id)  select distinct(application_id) from application_reference_numbers where user_id=userid;
	-- start report for typing
	SET @total_entry_permit = (select count(*) from applications where process_type=1 and process_closed=0 and user_id=userid);
	SET @total_outpass = @total_entry_permit;
	SET @total_emirates_id = (select count(*) from applications where process_type in (1,2,3) and process_closed=0  and user_id=userid);
	SET @total_medical_test = @total_emirates_id;
	SET @total_zajel = @total_emirates_id;
	SET @total_residence_permit = @total_emirates_id;
	SET @total_immigration_approval = (select count(*) from applications where process_type=3 and process_closed=0 and user_id=userid);
	SET @total_evision_approval = @total_immigration_approval;
    SET @total_visa_cancellation = (select count(*) from applications where process_type=4 and process_closed=0 and user_id=userid);


	SET @entry_permit = (select count(*) from application_actions where action_type="app_references" and process_type=1 and process_stage=1 and user_id=userid);
	SET @outpass = (select count(*) from application_actions where action_type="app_references" and process_type=1 and process_stage=2 and user_id=userid);
	SET @emirates_id = (select count(*) from application_actions where (action_type="app_references") and user_id=userid and
		((process_type=1 and process_stage=3) or (process_type=2 and process_stage=1) or (process_type=3 and process_stage=2)));
	
    SET @medical_test = (select count(*) from application_actions where (action_type="app_references") and user_id=userid and
		((process_type=1 and process_stage=4) or (process_type=2 and process_stage=2) or (process_type=3 and process_stage=3)));
	SET @zajel = (select count(*) from application_actions where (action_type="app_references") and user_id=userid and
		((process_type=1 and process_stage=5) or (process_type=2 and process_stage=3) or (process_type=3 and process_stage=5)));
	SET @residence_permit = (select count(*) from application_actions where (action_type="app_references") and user_id=userid and 
		((process_type=1 and process_stage=6) or (process_type=2 and process_stage=4) or (process_type=3 and process_stage=6)));
	SET @immigration_approval = (select (@total_immigration_approval-count(*)) from application_actions where (action_type="app_references") and user_id=userid and 	process_type=3 and process_stage =1);
	SET @evision_approval = (select count(*) from application_actions where (action_type="app_references") and user_id=userid and process_type=3 and process_stage =4);
	SET @visa_cancellation = (select count(*) from application_actions where (action_type="app_references") and user_id=userid and process_type=4 and process_stage =1);

	SET @n_entry_permit = (@total_entry_permit-@entry_permit);
    SET @n_outpass = (@entry_permit-@outpass);
	SET @n_emirates_id = (@outpass-@emirates_id);
    SET @n_medical_test = (@emirates_id-@medical_test);
	SET @n_zajel = (@medical_test-@zajel);
    SET @n_residence_permit = (@zajel-@residence_permit);
	SET @n_immigration_approval = (@residence_permit-@immigration_approval);
    SET @n_evision_approval = (@immigration_approval-@evision_approval);
	SET @n_visa_cancellation = (@evision_approval-@visa_cancellation);


	insert into app_progress_reports(heading,entry_permit, outpass, emirates_id, medical_test, zajel, residence_permit, immigration_approval, evision_approval, visa_cancellation)
	values('typing-reference',@n_entry_permit, @n_outpass, @n_emirates_id, @n_medical_test, @n_zajel, @n_residence_permit, @n_immigration_approval, @n_evision_approval, @n_visa_cancellation);
	-- end report for typing


	SELECT * from app_progress_reports;

	drop table app_progress_reports;
	drop table ref_app_id;
	END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `app_progress_report2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `app_progress_report2`(IN `userid` INTEGER)
BEGIN
	drop table if exists app_progress_reports;
	drop table if exists ref_app_id;

	CREATE TABLE app_progress_reports (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		Heading varchar(30) NOT NULL,
		entry_permit int NULL,
		outpass int NULL,
		emirates_id int NULL,
		medical_test int NULL,
		zajel int NULL,
		residence_permit int NULL,
		immigration_approval int NULL,
		evision_approval int NULL,
        visa_cancellation int NULL
	);
    
	
   
	SET @n_entry_permit = (select count(*) from applications where process_type=1 and next_typing=1 and process_closed=0  and user_id=userid);
    SET @n_outpass = (select count(*) from applications where process_type=1 and next_typing=2 and process_closed=0  and user_id=userid);
	SET @n_emirates_id = (select count(*) from applications where ((process_type=1 and next_typing=3) or (process_type=2 and next_typing=1) or (process_type=3 and next_typing=2)) and process_closed=0  and user_id=userid);
    SET @n_medical_test = (select count(*) from applications where ((process_type=1 and next_typing=4) or (process_type=2 and next_typing=2) or (process_type=3 and next_typing=3)) and process_closed=0  and user_id=userid);
	SET @n_zajel = (select count(*) from applications where ((process_type=1 and next_typing=5) or (process_type=2 and next_typing=3) or (process_type=3 and next_typing=5)) and process_closed=0  and user_id=userid);
    SET @n_residence_permit = (select count(*) from applications where ((process_type=1 and next_typing=6) or (process_type=2 and next_typing=4) or (process_type=3 and next_typing=6)) and process_closed=0  and user_id=userid);
	SET @n_immigration_approval = (select count(*) from applications where process_type=3 and next_typing=1 and process_closed=0  and user_id=userid);
    SET @n_evision_approval = (select count(*) from applications where process_type=3 and next_typing=4 and process_closed=0  and user_id=userid);
	SET @n_visa_cancellation = (select count(*) from applications where process_type=4 and next_typing=1 and process_closed=0  and user_id=userid);


	insert into app_progress_reports(heading,entry_permit, outpass, emirates_id, medical_test, zajel, residence_permit, immigration_approval, evision_approval, visa_cancellation)
	values('typing-reference',@n_entry_permit, @n_outpass, @n_emirates_id, @n_medical_test, @n_zajel, @n_residence_permit, @n_immigration_approval, @n_evision_approval, @n_visa_cancellation);
	-- end report for typing
	
    -- start report for follow-up
	SET @f_t_entry_permit = (select count(*) from application_actions where action_type="app_references" and process_type=1 and process_stage=1 and user_id=userid and field1 < NOW() - INTERVAL 2 DAY);
	SET @f_t_outpass = (select count(*) from application_actions where action_type="app_references" and process_type=1 and process_stage=2 and user_id=userid);
	SET @f_t_emirates_id = (select count(*) from application_actions where (action_type="app_references") and 
		((process_type=1 and process_stage=3) or (process_type=2 and process_stage=1) or (process_type=3 and process_stage=2)) and user_id=userid and field1 < NOW() - INTERVAL 7 DAY);
	SET @f_t_medical_test = (select count(*) from application_actions where (action_type="app_references") and 
		((process_type=1 and process_stage=4) or (process_type=2 and process_stage=2) or (process_type=3 and process_stage=3)) and user_id=userid and field1 < NOW() - INTERVAL 3 DAY);
	SET @f_t_zajel = (select count(*) from application_actions where (action_type="app_references") and 
		((process_type=1 and process_stage=5) or (process_type=2 and process_stage=3) or (process_type=3 and process_stage=5)) and user_id=userid and field1 < NOW() - INTERVAL 3 DAY);
	SET @f_t_residence_permit = (select count(*) from application_actions where (action_type="app_references") and 
		((process_type=1 and process_stage=6) or (process_type=2 and process_stage=4) or (process_type=3 and process_stage=6)) and user_id=userid and field1 < NOW() - INTERVAL 2 DAY);
	SET @f_t_immigration_approval = (select count(*) from application_actions where (action_type="app_references") and user_id=userid and 	process_type=3 and process_stage =1);
	SET @f_t_evision_approval = (select count(*) from application_actions where (action_type="app_references") and user_id=userid  and field1 < NOW() - INTERVAL 3 DAY and process_type=3 and process_stage =4);
	SET @f_t_visa_cancellation = (select count(*) from application_actions where (action_type="app_references") and user_id=userid and field1 < NOW() - INTERVAL 2 DAY and process_type=4 and process_stage =1);


	SET @entry_permit = (select (@f_t_entry_permit-count(*)) from application_actions where action_type="app_processes" and process_type=1 and process_stage=1 and user_id=userid);
	SET @outpass = (select (@f_t_outpass-count(*)) from application_actions where action_type="app_processes" and process_type=1 and process_stage=2 and user_id=userid);
	SET @emirates_id = (select (@f_t_emirates_id-count(*)) from application_actions where (action_type="app_processes") and user_id=userid and 
		((process_type=1 and process_stage=3) or (process_type=2 and process_stage=1) or (process_type=3 and process_stage=2)));
	SET @medical_test = (select (@f_t_medical_test-count(*)) from application_actions where (action_type="app_processes") and user_id=userid and 
		((process_type=1 and process_stage=4) or (process_type=2 and process_stage=2) or (process_type=3 and process_stage=3)));
	SET @zajel = (select (@f_t_zajel-count(*)) from application_actions where (action_type="app_processes") and user_id=userid and 
		((process_type=1 and process_stage=5) or (process_type=2 and process_stage=3) or (process_type=3 and process_stage=5)));
	SET @residence_permit = (select (@f_t_residence_permit-count(*)) from application_actions where (action_type="app_processes") and user_id=userid and 
		((process_type=1 and process_stage=6) or (process_type=2 and process_stage=4) or (process_type=3 and process_stage=6)));

	SET @immigration_approval = (select (@f_t_immigration_approval-count(*)) from application_actions where (action_type="app_processes") and user_id=userid and 	process_type=3 and process_stage =1);
	SET @evision_approval = (select (@f_t_evision_approval-count(*)) from application_actions where (action_type="app_processes") and user_id=userid and 	process_type=3 and process_stage =4);
	SET @visa_cancellation = (select (@f_t_visa_cancellation-count(*)) from application_actions where (action_type="app_processes") and user_id=userid and 	process_type=4 and process_stage =1);

	insert into app_progress_reports(heading,entry_permit, outpass, emirates_id, medical_test, zajel, residence_permit, immigration_approval, evision_approval, visa_cancellation)
	values('follow-up',@entry_permit, @outpass, @emirates_id, @medical_test, @zajel, @residence_permit, @immigration_approval, @evision_approval, @visa_cancellation);
	-- end start report for follow-up


	SELECT * from app_progress_reports;

	drop table app_progress_reports;
	
	END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `app_progress_report3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `app_progress_report3`(IN `userid` INTEGER)
BEGIN
	drop table if exists app_progress_reports;
	drop table if exists ref_app_id;

	CREATE TABLE app_progress_reports (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		Heading varchar(30) NOT NULL,
		entry_permit int NULL,
		outpass int NULL,
		emirates_id int NULL,
		medical_test int NULL,
		zajel int NULL,
		residence_permit int NULL,
		immigration_approval int NULL,
		evision_approval int NULL,
        visa_cancellation int NULL
	);
    
	
   
	SET @n_entry_permit = (select count(*) from applications where process_type=1 and next_typing=1 and process_closed=0  and user_id=userid);
    SET @n_outpass = (select count(*) from application_processes where process_stage=1 and application_id in (select id from applications where process_type=1 and next_typing=2 and process_closed=0  and user_id=userid));
	SET @n_emirates_id = (select count(*) from applications where ((process_type=1 and next_typing=3) or (process_type=2 and next_typing=1) or (process_type=3 and next_typing=2)) and process_closed=0  and user_id=userid);
    SET @n_medical_test = (select count(*) from applications where ((process_type=1 and next_typing=4) or (process_type=2 and next_typing=2) or (process_type=3 and next_typing=3)) and process_closed=0  and user_id=userid);
	SET @n_zajel = (select count(*) from applications where ((process_type=1 and next_typing=5) or (process_type=2 and next_typing=3) or (process_type=3 and next_typing=5)) and process_closed=0  and user_id=userid);
    SET @n_residence_permit = (select count(*) from applications where ((process_type=1 and next_typing=6) or (process_type=2 and next_typing=4) or (process_type=3 and next_typing=6)) and process_closed=0  and user_id=userid);
	SET @n_immigration_approval = (select count(*) from applications where process_type=3 and next_typing=1 and process_closed=0  and user_id=userid);
    SET @n_evision_approval = (select count(*) from applications where process_type=3 and next_typing=4 and process_closed=0  and user_id=userid);
	SET @n_visa_cancellation = (select count(*) from applications where process_type=4 and next_typing=1 and process_closed=0  and user_id=userid);


	insert into app_progress_reports(heading,entry_permit, outpass, emirates_id, medical_test, zajel, residence_permit, immigration_approval, evision_approval, visa_cancellation)
	values('typing-reference',@n_entry_permit, @n_outpass, @n_emirates_id, @n_medical_test, @n_zajel, @n_residence_permit, @n_immigration_approval, @n_evision_approval, @n_visa_cancellation);
	-- end report for typing
	
    

	SELECT * from app_progress_reports;

	drop table app_progress_reports;
	
	END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `test_proc` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `test_proc`(IN `userid` varchar(64))
BEGIN
	-- SET @con = (select count(*) from applications where user_id=user_id);
  	 -- SELECT user_id;
    select count(*) from applications where user_id=userid;
COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `user_action_history` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `user_action_history`(IN `userid` INTEGER)
BEGIN
	
     SELECT * from (
	SELECT id,'companies' AS from_table, company_name AS name, '' AS process_type, '' AS process_stage, created  from companies where created_by=userid
    UNION 
	SELECT id,'users' AS from_table, first_name AS name, '' AS process_type, '' AS process_stage, created from users where created_by=userid
    UNION 
    SELECT id,'applications' AS from_table, employee_name AS name, process_type , '' AS process_stage, created from applications where created_by=userid
    UNION 
	SELECT ap.application_id AS id,'process' AS from_table, app.employee_name AS name, ap.process_type, ap.process_stage, ap.created_date AS created from application_processes as ap join applications as app
    on ap.application_id=app.id where ap.created_by=userid
    UNION 
	SELECT ai.application_id AS id,'issue' AS from_table, app.employee_name AS name, ai.process_type, ai.process_stage, ai.created_date AS created from application_issues AS ai 
    join applications as app on ai.application_id=app.id where ai.created_by=userid
    UNION 
    SELECT ptr.application_id,'passport_tracking' AS from_table, app.employee_name AS name, ptr.process_type , '' AS process_stage, ptr.created_date AS created from passport_trackings as ptr
    join applications as app on ptr.application_id=app.id where ptr.created_by=userid
    UNION 
	SELECT arn.application_id AS id,'reference' AS from_table, app.employee_name AS name, arn.process_type, arn.process_stage, arn.created_date AS created from application_reference_numbers AS arn 
    join applications as app on arn.application_id=app.id where arn.created_by=userid
    )as result order by created desc;
  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `user_activity_list` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `user_activity_list`(IN `userid` INTEGER)
BEGIN
	
    SELECT * from companies where user_id=userid;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `application_actions`
--

/*!50001 DROP VIEW IF EXISTS `application_actions`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `application_actions` AS select 'app_processes' AS `action_type`,`ap`.`user_id` AS `user_id`,`ap`.`application_id` AS `application_id`,`ap`.`process_type` AS `process_type`,`ap`.`process_stage` AS `process_stage`,`ap`.`completion_date` AS `field1`,`ap`.`supporting_document` AS `field2`,`ap`.`created_date` AS `created_date`,`ap`.`created_by` AS `created_by` from `application_processes` `ap` union select 'app_issues' AS `app_issues`,`ai`.`user_id` AS `user_id`,`ai`.`application_id` AS `application_id`,`ai`.`process_type` AS `process_type`,`ai`.`process_stage` AS `process_stage`,`ai`.`issues` AS `field1`,`ai`.`comment` AS `field2`,`ai`.`created_date` AS `created_date`,`ai`.`created_by` AS `created_by` from `application_issues` `ai` union select 'app_references' AS `app_references`,`arn`.`user_id` AS `user_id`,`arn`.`application_id` AS `application_id`,`arn`.`process_type` AS `process_type`,`arn`.`process_stage` AS `process_stage`,`arn`.`ref_date` AS `field1`,`arn`.`ref_number` AS `field2`,`arn`.`created_date` AS `created_date`,`arn`.`created_by` AS `created_by` from `application_reference_numbers` `arn` union select 'app_history' AS `app_history`,`app_logs`.`user_id` AS `user_id`,`app_logs`.`id` AS `application_id`,`app_logs`.`process_type` AS `process_type`,'' AS `process_stage`,'' AS `field1`,'' AS `field2`,`app_logs`.`created` AS `created_date`,`app_logs`.`created_by` AS `created_by` from `application_logs` `app_logs` union select 'application_converted' AS `action_type`,'' AS `user_id`,`con_app`.`application_id` AS `application_id`,'' AS `process_type`,'' AS `process_stage`,`con_app`.`previous_process_type` AS `field1`,`con_app`.`current_process_type` AS `field2`,`con_app`.`created_date` AS `created_date`,`con_app`.`created_by` AS `created_by` from `converted_applications` `con_app` union select 'passport_tracking' AS `action_type`,`pt`.`user_id` AS `user_id`,`pt`.`application_id` AS `application_id`,`pt`.`process_type` AS `process_type`,'' AS `process_stage`,'' AS `field1`,'' AS `field2`,`pt`.`created_date` AS `created_date`,`pt`.`created_by` AS `created_by` from `passport_trackings` `pt` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `user_actions`
--

/*!50001 DROP VIEW IF EXISTS `user_actions`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `user_actions` AS select 'app_processes' AS `action_type`,`ap`.`user_id` AS `user_id`,`ap`.`application_id` AS `application_id`,`ap`.`process_type` AS `process_type`,`ap`.`process_stage` AS `process_stage`,`ap`.`completion_date` AS `field1`,`ap`.`supporting_document` AS `field2`,`ap`.`created_date` AS `created_date`,`ap`.`created_by` AS `created_by` from `application_processes` `ap` union select 'app_issues' AS `action_type`,`ai`.`user_id` AS `user_id`,`ai`.`application_id` AS `application_id`,`ai`.`process_type` AS `process_type`,`ai`.`process_stage` AS `process_stage`,`ai`.`issues` AS `field1`,`ai`.`comment` AS `field2`,`ai`.`created_date` AS `created_date`,`ai`.`created_by` AS `created_by` from `application_issues` `ai` union select 'app_references' AS `app_references`,`arn`.`user_id` AS `user_id`,`arn`.`application_id` AS `application_id`,`arn`.`process_type` AS `process_type`,`arn`.`process_stage` AS `process_stage`,`arn`.`ref_date` AS `field1`,`arn`.`ref_number` AS `field2`,`arn`.`created_date` AS `created_date`,`arn`.`created_by` AS `created_by` from `application_reference_numbers` `arn` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-15 20:56:45
