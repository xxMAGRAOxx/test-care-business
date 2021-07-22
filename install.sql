-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: test-care
-- ------------------------------------------------------
-- Server version	5.7.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `invoice_address`
--

DROP TABLE IF EXISTS `invoice_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice_address` (
  `invoice_address_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_address_lgr` varchar(100) NOT NULL,
  `invoice_address_nro` varchar(10) DEFAULT NULL,
  `invoice_address_bairro` varchar(45) NOT NULL,
  `invoice_address_mun` varchar(45) NOT NULL,
  `invoice_address_cmun` int(11) NOT NULL,
  `invoice_address_cep` int(11) NOT NULL,
  `invoice_address_cep_uf` char(2) NOT NULL,
  `invoice_address_cep_uf_pais` int(11) NOT NULL,
  PRIMARY KEY (`invoice_address_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `invoice_user_types`
--

DROP TABLE IF EXISTS `invoice_user_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice_user_types` (
  `invoice_user_type_id` int(11) NOT NULL,
  `invoice_user_type_alias` varchar(45) NOT NULL,
  PRIMARY KEY (`invoice_user_type_id`),
  UNIQUE KEY `user_type_id_pk_UNIQUE` (`invoice_user_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `invoice_users`
--

DROP TABLE IF EXISTS `invoice_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice_users` (
  `invoice_user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_user_name` varchar(45) NOT NULL,
  `invoice_user_fantasia` varchar(45) DEFAULT NULL,
  `invoice_user_cnpj` varchar(45) DEFAULT NULL,
  `invoice_user_cpf` varchar(45) DEFAULT NULL,
  `invoice_user_address_id` int(11) DEFAULT NULL,
  `invoice_user_type_id` int(11) NOT NULL,
  PRIMARY KEY (`invoice_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoices` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` varchar(100) NOT NULL,
  `invoice_date_emi` datetime NOT NULL,
  `invoice_date_ent_sai` datetime DEFAULT NULL,
  `invoice_total_value` decimal(10,4) DEFAULT NULL,
  `invoice_user_emit_id` int(11) DEFAULT NULL,
  `invoice_user_dest_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`invoice_id`),
  UNIQUE KEY `invoice_id_UNIQUE` (`invoice_id`),
  UNIQUE KEY `invoice_number_UNIQUE` (`invoice_number`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-22 12:36:26
