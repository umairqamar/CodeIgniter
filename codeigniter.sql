-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2016 at 06:59 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

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
-- Table structure for table `kpi`
--

CREATE TABLE `kpi` (
  `kpi_id` int(11) NOT NULL,
  `type` varchar(2) NOT NULL COMMENT 'IN=Input,OP=Output,PO=Process,OC=Outcome',
  `level` int(1) NOT NULL,
  `p_category` varchar(4) NOT NULL,
  `num` varchar(155) NOT NULL,
  `denom` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Key Performance Indicators ';

--
-- Dumping data for table `kpi`
--

INSERT INTO `kpi` (`kpi_id`, `type`, `level`, `p_category`, `num`, `denom`) VALUES
(1, 'IN', 0, '25', '123', '456'),
(2, 'OP', 1, '25', '564', '123'),
(3, 'OC', 2, '25', '456', 'asfasf'),
(4, 'OP', 0, '25', '1', 'asfasf'),
(5, 'IN', 1, '25', '45677777777777', '456');

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
(79, 108, 1),
(80, 108, 2),
(81, 108, 3),
(82, 108, 4),
(84, 108, 0),
(85, 108, 0),
(86, 109, 1),
(87, 109, 0),
(88, 109, 0);

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
(108, '914 483', ''),
(109, '01', '');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kpi`
--
ALTER TABLE `kpi`
  MODIFY `kpi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kpi_category`
--
ALTER TABLE `kpi_category`
  MODIFY `kpi_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `kpi_kra`
--
ALTER TABLE `kpi_kra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `kra`
--
ALTER TABLE `kra`
  MODIFY `kra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
