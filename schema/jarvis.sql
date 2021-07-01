# ************************************************************
# Sequel Ace SQL dump
# Version 3034
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 8.0.25)
# Database: jarvis
# Generation Time: 2021-07-01 21:42:13 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table clients
# ------------------------------------------------------------

CREATE TABLE `clients` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `ap_contact` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `active` char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



# Dump of table construction_types
# ------------------------------------------------------------

CREATE TABLE `construction_types` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `construction_type` varchar(128) DEFAULT NULL,
  `active` char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



# Dump of table design_phases
# ------------------------------------------------------------

CREATE TABLE `design_phases` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `design_phase` varchar(128) DEFAULT NULL,
  `active` char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



# Dump of table employees
# ------------------------------------------------------------

CREATE TABLE `employees` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(128) DEFAULT NULL,
  `last_name` varchar(128) DEFAULT NULL,
  `discipline` varchar(128) DEFAULT NULL,
  `address` text,
  `phone_number` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `token` char(32) DEFAULT NULL,
  `secret` char(32) DEFAULT NULL,
  `permissions` json DEFAULT NULL,
  `active` char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



# Dump of table exclusions
# ------------------------------------------------------------

CREATE TABLE `exclusions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `exclusion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `active` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



# Dump of table hvac_system_types
# ------------------------------------------------------------

CREATE TABLE `hvac_system_types` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `hvac_system_type` varchar(128) DEFAULT NULL,
  `active` char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



# Dump of table project_markets
# ------------------------------------------------------------

CREATE TABLE `project_markets` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `project_market` varchar(128) DEFAULT NULL,
  `active` char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



# Dump of table projects
# ------------------------------------------------------------

CREATE TABLE `projects` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int unsigned NOT NULL DEFAULT '0',
  `client_id` int unsigned NOT NULL DEFAULT '0',
  `status_id` int unsigned NOT NULL DEFAULT '0',
  `project_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `project_description` text,
  `scope_of_work` text,
  `exclusions` text,
  `project_market_id` int unsigned NOT NULL DEFAULT '0',
  `construction_type_id` int unsigned NOT NULL DEFAULT '0',
  `hvac_system_type_id` int unsigned NOT NULL DEFAULT '0',
  `phase_id` int unsigned NOT NULL DEFAULT '0',
  `project_manager` int unsigned NOT NULL DEFAULT '0',
  `hvac_designer` int unsigned NOT NULL DEFAULT '0',
  `electrical_engineer` int unsigned NOT NULL DEFAULT '0',
  `plumbing_designer` int unsigned NOT NULL DEFAULT '0',
  `construction_administrator` int unsigned NOT NULL DEFAULT '0',
  `proposal_date` date NOT NULL DEFAULT '1000-01-01',
  `kickoff_date` date NOT NULL DEFAULT '1000-01-01',
  `sd_date` date NOT NULL DEFAULT '1000-01-01',
  `dd_date` date NOT NULL DEFAULT '1000-01-01',
  `cd_qaqc_date` date NOT NULL DEFAULT '1000-01-01',
  `cd_date` date NOT NULL DEFAULT '1000-01-01',
  `bidding_date` date NOT NULL DEFAULT '1000-01-01',
  `completion_date` date NOT NULL DEFAULT '1000-01-01',
  `add_1_date` date NOT NULL DEFAULT '1000-01-01',
  `add_2_date` date NOT NULL DEFAULT '1000-01-01',
  `add_3_date` date NOT NULL DEFAULT '1000-01-01',
  `add_4_date` date NOT NULL DEFAULT '1000-01-01',
  `ca_start_date` date NOT NULL DEFAULT '1000-01-01',
  `ca_complete_date` date NOT NULL DEFAULT '1000-01-01',
  `square_footage` decimal(12,4) unsigned DEFAULT NULL,
  `initial_fee` decimal(12,4) unsigned DEFAULT NULL,
  `bidding_fee` decimal(12,4) unsigned DEFAULT NULL,
  `study_fee` decimal(12,4) unsigned DEFAULT NULL,
  `dd_fee` decimal(12,4) unsigned DEFAULT NULL,
  `sd_fee` decimal(12,4) unsigned DEFAULT NULL,
  `cd_fee` decimal(12,4) unsigned DEFAULT NULL,
  `ca_fee` decimal(12,4) unsigned DEFAULT NULL,
  `additional_fee` decimal(12,4) unsigned DEFAULT NULL,
  `closeout_fee` decimal(12,4) unsigned DEFAULT NULL,
  `total_fee` decimal(12,4) unsigned DEFAULT NULL,
  `hvac_constuction_cost` decimal(12,4) unsigned DEFAULT NULL,
  `electrical_construction_cost` decimal(12,4) unsigned DEFAULT NULL,
  `plumbing_contruction_cost` decimal(12,4) unsigned DEFAULT NULL,
  `study_bill_percentage` decimal(7,4) unsigned DEFAULT NULL,
  `sd_bill_percentage` decimal(7,4) unsigned DEFAULT NULL,
  `dd_bill_percentage` decimal(7,4) unsigned DEFAULT NULL,
  `active` char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



# Dump of table statuses
# ------------------------------------------------------------

CREATE TABLE `statuses` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(128) DEFAULT NULL,
  `active` char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
