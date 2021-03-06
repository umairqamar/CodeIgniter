-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.16-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for codeigniter
DROP DATABASE IF EXISTS `codeigniter`;
CREATE DATABASE IF NOT EXISTS `codeigniter` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `codeigniter`;


-- Dumping structure for table codeigniter.employee
DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `cnic` varchar(20) DEFAULT NULL,
  `name` varchar(150) NOT NULL,
  `father_name` varchar(150) NOT NULL COMMENT 'Father/Husband Name',
  `phone_cell` varchar(150) NOT NULL,
  `phone_land` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `dob` date NOT NULL,
  `ntn` varchar(50) NOT NULL,
  `marital_status` varchar(50) NOT NULL COMMENT 'S=Single,M=Married,D=Divorced,W=Widowed',
  `address_perm_line1` varchar(50) NOT NULL,
  `address_perm_line2` varchar(50) NOT NULL,
  `address_perm_city` varchar(50) NOT NULL,
  `address_present_line1` varchar(50) NOT NULL,
  `address_present_line2` varchar(50) NOT NULL,
  `address_present_city` varchar(50) NOT NULL,
  `emergency_name` varchar(200) NOT NULL,
  `emergency_relation` varchar(200) NOT NULL,
  `emergency_contact` varchar(200) NOT NULL,
  `is_active` tinyint(4) DEFAULT '1' COMMENT '1= active ; 0=inactive',
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table codeigniter.employee: ~0 rows (approximately)
DELETE FROM `employee`;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` (`employee_id`, `cnic`, `name`, `father_name`, `phone_cell`, `phone_land`, `email`, `dob`, `ntn`, `marital_status`, `address_perm_line1`, `address_perm_line2`, `address_perm_city`, `address_present_line1`, `address_present_line2`, `address_present_city`, `emergency_name`, `emergency_relation`, `emergency_contact`, `is_active`) VALUES
	(4, '37405-9721786-5', 'Umair Qamar', 'Muhammad Saghir Qamar', '3458541454', '03458541454', 'umairqamar@live.com', '1992-04-29', '', 'S', '289/19 Karamdad Market', 'Afshan Colony', 'Rawalpindi', '289/19 Karamdad Market', 'Afshan Colony', 'Rawalpindi', '', '', '03008541454', 1);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;


-- Dumping structure for table codeigniter.employee_education
DROP TABLE IF EXISTS `employee_education`;
CREATE TABLE IF NOT EXISTS `employee_education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL COMMENT 'Employee_id foreign key from employee table',
  `degree` varchar(50) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `year` year(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Employe Education Records';

-- Dumping data for table codeigniter.employee_education: ~2 rows (approximately)
DELETE FROM `employee_education`;
/*!40000 ALTER TABLE `employee_education` DISABLE KEYS */;
INSERT INTO `employee_education` (`id`, `employee_id`, `degree`, `institution`, `city`, `year`) VALUES
	(5, 4, 'BS Software Engineering', 'Riphah International University', 'Islamabad', '2016');
/*!40000 ALTER TABLE `employee_education` ENABLE KEYS */;


-- Dumping structure for table codeigniter.employee_eyecon
DROP TABLE IF EXISTS `employee_eyecon`;
CREATE TABLE IF NOT EXISTS `employee_eyecon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Employee Eyecon History';

-- Dumping data for table codeigniter.employee_eyecon: ~2 rows (approximately)
DELETE FROM `employee_eyecon`;
/*!40000 ALTER TABLE `employee_eyecon` DISABLE KEYS */;
INSERT INTO `employee_eyecon` (`id`, `employee_id`, `designation`, `start_date`, `end_date`) VALUES
	(2, 4, 'PHP Developer', '2016-10-15', '');
/*!40000 ALTER TABLE `employee_eyecon` ENABLE KEYS */;


-- Dumping structure for table codeigniter.employee_kra
DROP TABLE IF EXISTS `employee_kra`;
CREATE TABLE IF NOT EXISTS `employee_kra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `kra_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COMMENT='Relationship between Employee and KRA';

-- Dumping data for table codeigniter.employee_kra: ~4 rows (approximately)
DELETE FROM `employee_kra`;
/*!40000 ALTER TABLE `employee_kra` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_kra` ENABLE KEYS */;


-- Dumping structure for table codeigniter.employee_training
DROP TABLE IF EXISTS `employee_training`;
CREATE TABLE IF NOT EXISTS `employee_training` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL COMMENT 'foreign key',
  `training` varchar(100) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `start_date` varchar(100) NOT NULL,
  `end_date` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table codeigniter.employee_training: ~1 rows (approximately)
DELETE FROM `employee_training`;
/*!40000 ALTER TABLE `employee_training` DISABLE KEYS */;
INSERT INTO `employee_training` (`id`, `employee_id`, `training`, `institution`, `start_date`, `end_date`) VALUES
	(4, 4, 'CCNA Routing and Switching', 'Riphah International University', '2016-10-05', '');
/*!40000 ALTER TABLE `employee_training` ENABLE KEYS */;


-- Dumping structure for table codeigniter.employee_work
DROP TABLE IF EXISTS `employee_work`;
CREATE TABLE IF NOT EXISTS `employee_work` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL COMMENT 'Foreign key',
  `company` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Employee Work History';

-- Dumping data for table codeigniter.employee_work: ~2 rows (approximately)
DELETE FROM `employee_work`;
/*!40000 ALTER TABLE `employee_work` DISABLE KEYS */;
INSERT INTO `employee_work` (`id`, `employee_id`, `company`, `designation`, `start_date`, `end_date`) VALUES
	(2, 4, 'EYECON', 'PHP Developer', '2016-10-01', '');
/*!40000 ALTER TABLE `employee_work` ENABLE KEYS */;


-- Dumping structure for table codeigniter.kpi
DROP TABLE IF EXISTS `kpi`;
CREATE TABLE IF NOT EXISTS `kpi` (
  `kpi_id` int(11) NOT NULL AUTO_INCREMENT,
  `kpi_description` varchar(155) NOT NULL,
  `type` varchar(2) NOT NULL COMMENT 'IN=Input,OP=Output,PO=Process,OC=Outcome',
  `level` int(1) NOT NULL,
  `p_category` varchar(4) NOT NULL,
  `num` varchar(155) NOT NULL,
  `denom` varchar(155) NOT NULL,
  PRIMARY KEY (`kpi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='Key Performance Indicators ';

-- Dumping data for table codeigniter.kpi: ~5 rows (approximately)
DELETE FROM `kpi`;
/*!40000 ALTER TABLE `kpi` DISABLE KEYS */;
INSERT INTO `kpi` (`kpi_id`, `kpi_description`, `type`, `level`, `p_category`, `num`, `denom`) VALUES
	(8, 'KP1 01', 'IN', 1, '25', '123', '456'),
	(9, 'KPI 02', 'IN', 9, '26', '1', '1'),
	(10, 'KPI 03', 'OC', 9, '26', '1', '2'),
	(11, 'KPI 04', 'IN', 1, '25', '456', '456'),
	(12, 'KPI 05', 'OC', 9, '26', 'a', 'a');
/*!40000 ALTER TABLE `kpi` ENABLE KEYS */;


-- Dumping structure for table codeigniter.kpi_category
DROP TABLE IF EXISTS `kpi_category`;
CREATE TABLE IF NOT EXISTS `kpi_category` (
  `kpi_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`kpi_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- Dumping data for table codeigniter.kpi_category: ~2 rows (approximately)
DELETE FROM `kpi_category`;
/*!40000 ALTER TABLE `kpi_category` DISABLE KEYS */;
INSERT INTO `kpi_category` (`kpi_cat_id`, `category`, `description`) VALUES
	(25, 'Category 1', 'Category Description goes here'),
	(26, 'Category 02', 'Description');
/*!40000 ALTER TABLE `kpi_category` ENABLE KEYS */;


-- Dumping structure for table codeigniter.kpi_kra
DROP TABLE IF EXISTS `kpi_kra`;
CREATE TABLE IF NOT EXISTS `kpi_kra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kra` int(11) NOT NULL COMMENT 'Foreign key',
  `kpi` int(11) NOT NULL COMMENT 'Foreign key,Multiple values',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=199 DEFAULT CHARSET=utf8 COMMENT='Relationship between KRA and KPI';

-- Dumping data for table codeigniter.kpi_kra: ~16 rows (approximately)
DELETE FROM `kpi_kra`;
/*!40000 ALTER TABLE `kpi_kra` DISABLE KEYS */;
INSERT INTO `kpi_kra` (`id`, `kra`, `kpi`) VALUES
	(168, 124, 8),
	(169, 124, 9),
	(170, 124, 10),
	(171, 124, 11),
	(172, 124, 12),
	(181, 122, 10),
	(182, 122, 11),
	(185, 121, 8),
	(186, 121, 9),
	(187, 121, 10),
	(188, 121, 11),
	(189, 121, 12),
	(195, 120, 8),
	(196, 120, 9),
	(197, 120, 10),
	(198, 120, 11);
/*!40000 ALTER TABLE `kpi_kra` ENABLE KEYS */;


-- Dumping structure for table codeigniter.kra
DROP TABLE IF EXISTS `kra`;
CREATE TABLE IF NOT EXISTS `kra` (
  `kra_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` text,
  `description` text,
  PRIMARY KEY (`kra_id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8;

-- Dumping data for table codeigniter.kra: ~4 rows (approximately)
DELETE FROM `kra`;
/*!40000 ALTER TABLE `kra` DISABLE KEYS */;
INSERT INTO `kra` (`kra_id`, `code`, `description`) VALUES
	(120, 'KRA 01', 'Description for KRA 01'),
	(121, 'KRA 02', 'Description for KRA 02'),
	(122, 'KRA 03', 'Description for KRA 03'),
	(124, 'KRA 05', 'Description for KRA 05');
/*!40000 ALTER TABLE `kra` ENABLE KEYS */;


-- Dumping structure for table codeigniter.kra_category
DROP TABLE IF EXISTS `kra_category`;
CREATE TABLE IF NOT EXISTS `kra_category` (
  `kra_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`kra_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table codeigniter.kra_category: ~2 rows (approximately)
DELETE FROM `kra_category`;
/*!40000 ALTER TABLE `kra_category` DISABLE KEYS */;
INSERT INTO `kra_category` (`kra_cat_id`, `category`, `description`) VALUES
	(1, 'KRA Category', 'Description for KRA Category'),
	(2, 'My Category', '456456');
/*!40000 ALTER TABLE `kra_category` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
