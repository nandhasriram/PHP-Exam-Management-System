-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2026 at 06:11 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fee_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_wise_fee`
--

CREATE TABLE `class_wise_fee` (
  `id` int(11) NOT NULL,
  `class` varchar(20) NOT NULL,
  `section` varchar(30) NOT NULL,
  `year` varchar(20) NOT NULL,
  `term` varchar(100) NOT NULL,
  `particulars` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_wise_fee`
--

INSERT INTO `class_wise_fee` (`id`, `class`, `section`, `year`, `term`, `particulars`, `amount`) VALUES
(1, '8', 'A', '2024', '1', 'semester amount', '25000');

-- --------------------------------------------------------

--
-- Table structure for table `feereceipt`
--

CREATE TABLE `feereceipt` (
  `id` int(11) NOT NULL,
  `Sno` int(11) NOT NULL,
  `Feereceiptno` varchar(10) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `StudentRollNumber` varchar(20) NOT NULL,
  `addmissionno` varchar(10) NOT NULL,
  `Studentname` varchar(250) NOT NULL,
  `class` varchar(10) NOT NULL,
  `section` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `particulars` varchar(280) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `amountpaid` varchar(20) NOT NULL,
  `dueamount` varchar(20) NOT NULL,
  `term` varchar(20) NOT NULL,
  `duedate` date NOT NULL DEFAULT current_timestamp(),
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feereceipt`
--

INSERT INTO `feereceipt` (`id`, `Sno`, `Feereceiptno`, `date`, `StudentRollNumber`, `addmissionno`, `Studentname`, `class`, `section`, `year`, `particulars`, `amount`, `amountpaid`, `dueamount`, `term`, `duedate`, `description`) VALUES
(44, 1, '1', '2024-12-09', '1', '1', 'Nandha Sri', '10', 'B', '2024', 'lab amount', '5000', '4000', '1000', '1', '2024-12-09', 'Paid'),
(45, 1, '1', '2024-12-09', '1', '1', 'Nandha Sri', '10', 'B', '2024', 'bus fee', '8000', '8000', '0', '1', '2024-12-09', 'Paid'),
(46, 2, '2', '2024-12-09', '2', '2', 'Sriram', '8', 'A', '2024', 'Sports fee', '10000', '5000', '5000', '1', '2024-12-09', 'Paid'),
(47, 2, '2', '2024-12-09', '2', '2', 'Sriram', '8', 'A', '2024', 'Book fee', '5000', '5000', '0', '1', '2024-12-09', 'Paid'),
(62, 3, '3', '2024-12-09', '3', '3', 'Prakash', '8', 'A', '2024', 'lab amount', '7000', '5000', '2000', '2', '2024-12-09', 'Paid'),
(63, 3, '3', '2024-12-09', '3', '3', 'Prakash', '8', 'A', '2024', 'Sports fee', '10000', '8000', '2000', '2', '2024-12-09', 'Paid'),
(70, 4, '4', '2024-12-10', '4', '4', 'Yuvaraj', '10', 'C', '2024', 'Tuition fee', '10000', '2000', '8000', '1', '2024-12-10', 'Paid'),
(71, 5, '5', '2024-12-10', '4', '4', 'Yuvaraj', '10', 'C', '2024', 'Tuition fee', '10000', '3000', '5000', '1', '2024-12-10', 'Paid'),
(72, 6, '6', '2024-12-10', '4', '4', 'Yuvaraj', '10', 'C', '2024', 'Tuition fee', '10000', '5000', '5000', '2', '2024-12-10', 'Paid'),
(73, 7, '7', '2024-12-10', '4', '4', 'Yuvaraj', '10', 'C', '2024', 'Tuition fee', '1000', '3000', '2000', '1', '2024-12-10', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `feereceipttemp`
--

CREATE TABLE `feereceipttemp` (
  `id` int(11) NOT NULL,
  `Feereceiptno` varchar(10) NOT NULL,
  `Sno` int(11) NOT NULL,
  `date` date NOT NULL,
  `StudentRollNumber` int(11) NOT NULL,
  `addmissionno` varchar(10) NOT NULL,
  `Studentname` varchar(250) NOT NULL,
  `class` varchar(10) NOT NULL,
  `section` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `particulars` varchar(280) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `amountpaid` varchar(20) NOT NULL,
  `dueamount` varchar(20) NOT NULL,
  `term` varchar(20) NOT NULL,
  `duedate` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_feereceipt`
--

CREATE TABLE `main_feereceipt` (
  `feereceipt_id` int(11) NOT NULL,
  `Sno` int(11) NOT NULL,
  `Feereceiptno` varchar(10) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `StudentRollNumber` varchar(20) NOT NULL,
  `addmissionno` varchar(10) NOT NULL,
  `Studentname` varchar(250) NOT NULL,
  `class` varchar(10) NOT NULL,
  `section` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `addclasswisefeeitem` varchar(50) DEFAULT NULL,
  `amountpaid` varchar(20) NOT NULL,
  `dueamount` varchar(20) NOT NULL,
  `term` varchar(20) DEFAULT NULL,
  `duedate` date NOT NULL DEFAULT current_timestamp(),
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_feereceipt`
--

INSERT INTO `main_feereceipt` (`feereceipt_id`, `Sno`, `Feereceiptno`, `date`, `StudentRollNumber`, `addmissionno`, `Studentname`, `class`, `section`, `year`, `addclasswisefeeitem`, `amountpaid`, `dueamount`, `term`, `duedate`, `description`) VALUES
(25, 1, '1', '2024-12-09', '1', '1', 'Nandha Sri', '10', 'B', '2024', NULL, '12000', '1000', '1', '2024-12-09', 'Paid'),
(26, 2, '2', '2024-12-09', '2', '2', 'Sriram', '8', 'A', '2024', 'yes', '10000', '5000', '1', '2024-12-09', 'Paid'),
(34, 3, '3', '2024-12-09', '3', '3', 'Prakash', '8', 'A', '2024', 'yes', '13000', '4000', '2', '2024-12-09', 'Paid'),
(37, 4, '4', '2024-12-10', '4', '4', 'Yuvaraj', '10', 'C', '2024', NULL, '2000', '8000', '1', '2024-12-10', 'Paid'),
(38, 5, '5', '2024-12-10', '4', '4', 'Yuvaraj', '10', 'C', '2024', NULL, '3000', '5000', '1', '2024-12-10', 'Paid'),
(39, 6, '6', '2024-12-10', '4', '4', 'Yuvaraj', '10', 'C', '2024', NULL, '5000', '5000', '2', '2024-12-10', 'Paid'),
(40, 7, '7', '2024-12-10', '4', '4', 'Yuvaraj', '10', 'C', '2024', NULL, '3000', '2000', '1', '2024-12-10', 'Paid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_wise_fee`
--
ALTER TABLE `class_wise_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feereceipt`
--
ALTER TABLE `feereceipt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feereceipttemp`
--
ALTER TABLE `feereceipttemp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_feereceipt`
--
ALTER TABLE `main_feereceipt`
  ADD PRIMARY KEY (`feereceipt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_wise_fee`
--
ALTER TABLE `class_wise_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feereceipt`
--
ALTER TABLE `feereceipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `feereceipttemp`
--
ALTER TABLE `feereceipttemp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `main_feereceipt`
--
ALTER TABLE `main_feereceipt`
  MODIFY `feereceipt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
