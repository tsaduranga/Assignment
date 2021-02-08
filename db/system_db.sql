-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2021 at 09:20 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(65) NOT NULL,
  `bank_code` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`bank_id`, `bank_name`, `bank_code`) VALUES
(3, 'Sampath Bank ', '7850 '),
(4, 'Bank of ceylon ', '5678');

-- --------------------------------------------------------

--
-- Table structure for table `bank_branches`
--

CREATE TABLE `bank_branches` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(125) NOT NULL,
  `address` text NOT NULL,
  `banks_id` int(11) NOT NULL,
  `branch_code` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_branches`
--

INSERT INTO `bank_branches` (`branch_id`, `branch_name`, `address`, `banks_id`, `branch_code`) VALUES
(1, 'seeduwa branch', '\"NO-152\"\r\n\"seeduwa\",\r\nSrilanka', 3, 'branch00p34'),
(2, 'Katunayaka Branch', '\"NO-158\"\r\n\"kstunayaka\",\r\nSrilanka', 4, 'branch00k21'),
(3, 'wennappuwa branch', '\"NO-158\"\r\n\"wennappuwa\",\r\nSrilanka', 3, 'bramch0013'),
(4, 'Naththandiya branch updated', '\"NO-159\"\r\n\"wennappuwa\",\r\nSrilanka', 3, 'branch00025');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`bank_id`),
  ADD UNIQUE KEY `bank_code` (`bank_code`),
  ADD UNIQUE KEY `bank_name` (`bank_name`);

--
-- Indexes for table `bank_branches`
--
ALTER TABLE `bank_branches`
  ADD PRIMARY KEY (`branch_id`),
  ADD KEY `fk_bank_branches_banks_idx` (`banks_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bank_branches`
--
ALTER TABLE `bank_branches`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank_branches`
--
ALTER TABLE `bank_branches`
  ADD CONSTRAINT `fk_bank_branches_banks` FOREIGN KEY (`banks_id`) REFERENCES `banks` (`bank_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
