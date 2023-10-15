-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2023 at 06:20 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `productId` int(30) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `sponsor` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `batch` varchar(100) NOT NULL,
  `quantity1` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `expDate` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`productId`, `productName`, `sponsor`, `unit`, `batch`, `quantity1`, `total`, `expDate`, `status`) VALUES
(55, 'condom', 'shell', 'boxes', 'batch 2', 1, 0, '2003-12-12', 'available'),
(56, 'lazartan', 'glenn', 'boxes', 'batch 1', 1, 0, '2030-12-12', 'available'),
(59, 'iud', 'Kirt', 'Insert', 'Batch 1', 0, 98, '2029-10-24', 'available'),
(60, 'Flumucil', 'Laura', 'Pcs', 'Batch 1', 0, 978, '2023-10-11', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `request_medicine`
--

CREATE TABLE `request_medicine` (
  `req_med_Id` int(11) NOT NULL,
  `residentId` varchar(100) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `firstName` varchar(200) NOT NULL,
  `middleName` varchar(200) NOT NULL,
  `productId` varchar(100) NOT NULL,
  `productName` varchar(200) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `quantity_req` int(100) NOT NULL,
  `givenDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_medicine`
--

INSERT INTO `request_medicine` (`req_med_Id`, `residentId`, `lastName`, `firstName`, `middleName`, `productId`, `productName`, `unit`, `quantity_req`, `givenDate`) VALUES
(86, '274', 'arcega', 'glenn emersom', 'plata', '60', 'Flumucil', 'Pcs', 1, '2023-10-15'),
(87, '275', 'arcega', 'glaiza', '', '60', 'Flumucil', 'Pcs', 1, '2023-10-15'),
(88, '274', 'arcega ', 'glenn emersom ', 'plata ', '60', 'Flumucil', 'Pcs', 7, '2023-10-15'),
(89, '276', 'wfdw', 'wdfwf', '', '60', 'Flumucil', 'Pcs', 1, '1221-12-12'),
(90, '275', 'arcega ', 'glaiza ', ' ', '60', 'Flumucil', 'Pcs', 1, '2023-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `residentrecords`
--

CREATE TABLE `residentrecords` (
  `residentId` int(30) NOT NULL,
  `productId` int(30) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `firstName` varchar(200) NOT NULL,
  `middleName` varchar(200) NOT NULL,
  `dateBirth` date NOT NULL,
  `age` int(10) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contactNumber` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `residentrecords`
--

INSERT INTO `residentrecords` (`residentId`, `productId`, `lastName`, `firstName`, `middleName`, `dateBirth`, `age`, `sex`, `address`, `contactNumber`) VALUES
(274, 60, 'arcega', 'glenn emersom', 'plata', '2023-10-15', 0, 'Male', 'MalitamDos', '0930182938'),
(275, 60, 'arcega', 'glaiza', '', '2023-10-02', 0, 'Male', 'Sampaguita', '09952846057'),
(276, 60, 'wfdw', 'wdfwf', '', '1221-12-12', 0, 'Male', 'BadjCom', '09138219783');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `usertype` int(2) NOT NULL,
  `address` varchar(200) NOT NULL,
  `mobile_number` varchar(12) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `reset_token_hash` varchar(64) NOT NULL,
  `reset_token_expires_at` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `fname`, `lname`, `usertype`, `address`, `mobile_number`, `photo`, `reset_token_hash`, `reset_token_expires_at`) VALUES
(1, 'glennarcega177@gmail.com', 'fdb606791dfaec7dea946b0ff93b9b58', '', '', 1, '', '', '', '', '0000-00-00 00:00:00.000000'),
(86, 'bhw@gmail.com', '6adcff9bb6c324d349dfd67c82e1e832', 'bhw', 'bhw', 2, 'bhw', '10938712', '', '', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `id` int(10) NOT NULL,
  `usertypes` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`id`, `usertypes`) VALUES
(1, 'admin'),
(2, 'bhw\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `request_medicine`
--
ALTER TABLE `request_medicine`
  ADD PRIMARY KEY (`req_med_Id`);

--
-- Indexes for table `residentrecords`
--
ALTER TABLE `residentrecords`
  ADD PRIMARY KEY (`residentId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `productId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `request_medicine`
--
ALTER TABLE `request_medicine`
  MODIFY `req_med_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `residentrecords`
--
ALTER TABLE `residentrecords`
  MODIFY `residentId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
