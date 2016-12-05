-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2016 at 11:55 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `cnic` varchar(20) DEFAULT NULL,
  `name` varchar(150) NOT NULL,
  `father_name` varchar(150) NOT NULL COMMENT 'Father/Husband Name',
  `phone_cell` varchar(150) NOT NULL,
  `phone_land` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `dob` date NOT NULL,
  `ntn` varchar(50) NOT NULL,
  `maritial_status` tinyint(1) NOT NULL COMMENT '0= single 1= married',
  `addtess_perm` varchar(200) NOT NULL,
  `address_present` varchar(200) NOT NULL,
  `emergency_contact` varchar(200) NOT NULL,
  `is_active` tinyint(4) DEFAULT '1' COMMENT '1= active ; 0=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `cnic`, `name`, `father_name`, `phone_cell`, `phone_land`, `email`, `dob`, `ntn`, `maritial_status`, `addtess_perm`, `address_present`, `emergency_contact`, `is_active`) VALUES
(3, NULL, 'Umair Qamar', '', '03458541454', '', 'umairqamar@yahoo.com', '0000-00-00', '', 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_kra`
--

CREATE TABLE `employee_kra` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `kra_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Relationship between Employee and KRA';

--
-- Dumping data for table `employee_kra`
--

INSERT INTO `employee_kra` (`id`, `employee_id`, `kra_id`) VALUES
(36, 3, 120),
(37, 3, 121),
(38, 3, 122),
(39, 3, 124);

-- --------------------------------------------------------

--
-- Table structure for table `kpi`
--

CREATE TABLE `kpi` (
  `kpi_id` int(11) NOT NULL,
  `kpi_description` varchar(155) NOT NULL,
  `type` varchar(2) NOT NULL COMMENT 'IN=Input,OP=Output,PO=Process,OC=Outcome',
  `level` int(1) NOT NULL,
  `p_category` varchar(4) NOT NULL,
  `num` varchar(155) NOT NULL,
  `denom` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Key Performance Indicators ';

--
-- Dumping data for table `kpi`
--

INSERT INTO `kpi` (`kpi_id`, `kpi_description`, `type`, `level`, `p_category`, `num`, `denom`) VALUES
(8, 'KP1 01', 'IN', 1, '25', '123', '456'),
(9, 'KPI 02', 'IN', 9, '26', '1', '1'),
(10, 'KPI 03', 'OC', 9, '26', '1', '2'),
(11, 'KPI 04', 'IN', 1, '25', '456', '456'),
(12, 'KPI 05', 'OC', 9, '26', 'a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `kpi_category`
--

CREATE TABLE `kpi_category` (
  `kpi_cat_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kpi_category`
--

INSERT INTO `kpi_category` (`kpi_cat_id`, `category`, `description`) VALUES
(25, 'Category 1', 'Category Description goes here'),
(26, 'Category 02', 'Description');

-- --------------------------------------------------------

--
-- Table structure for table `kpi_kra`
--

CREATE TABLE `kpi_kra` (
  `id` int(11) NOT NULL,
  `kra` int(11) NOT NULL COMMENT 'Foreign key',
  `kpi` int(11) NOT NULL COMMENT 'Foreign key,Multiple values'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Relationship between KRA and KPI';

--
-- Dumping data for table `kpi_kra`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `kra`
--

CREATE TABLE `kra` (
  `kra_id` int(11) NOT NULL,
  `code` text,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kra`
--

INSERT INTO `kra` (`kra_id`, `code`, `description`) VALUES
(120, 'KRA 01', 'Description for KRA 01'),
(121, 'KRA 02', 'Description for KRA 02'),
(122, 'KRA 03', 'Description for KRA 03'),
(124, 'KRA 05', 'Description for KRA 05');

-- --------------------------------------------------------

--
-- Table structure for table `kra_category`
--

CREATE TABLE `kra_category` (
  `kra_cat_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kra_category`
--

INSERT INTO `kra_category` (`kra_cat_id`, `category`, `description`) VALUES
(1, 'KRA Category', 'Description for KRA Category'),
(2, 'My Category', '456456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employee_kra`
--
ALTER TABLE `employee_kra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kpi`
--
ALTER TABLE `kpi`
  ADD PRIMARY KEY (`kpi_id`);

--
-- Indexes for table `kpi_category`
--
ALTER TABLE `kpi_category`
  ADD PRIMARY KEY (`kpi_cat_id`);

--
-- Indexes for table `kpi_kra`
--
ALTER TABLE `kpi_kra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kra`
--
ALTER TABLE `kra`
  ADD PRIMARY KEY (`kra_id`);

--
-- Indexes for table `kra_category`
--
ALTER TABLE `kra_category`
  ADD PRIMARY KEY (`kra_cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employee_kra`
--
ALTER TABLE `employee_kra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `kpi`
--
ALTER TABLE `kpi`
  MODIFY `kpi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `kpi_category`
--
ALTER TABLE `kpi_category`
  MODIFY `kpi_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `kpi_kra`
--
ALTER TABLE `kpi_kra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;
--
-- AUTO_INCREMENT for table `kra`
--
ALTER TABLE `kra`
  MODIFY `kra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `kra_category`
--
ALTER TABLE `kra_category`
  MODIFY `kra_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
