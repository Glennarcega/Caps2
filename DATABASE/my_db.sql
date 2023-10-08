-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2023 at 12:43 PM
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
(59, 'Pills', 'Kirt', 'tablet', 'Batch 1', 0, 98, '2029-10-24', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `request_medicine`
--

CREATE TABLE `request_medicine` (
  `req_med_Id` int(11) NOT NULL,
  `residentId` varchar(100) NOT NULL,
  `residentName` varchar(200) NOT NULL,
  `productId` varchar(100) NOT NULL,
  `productName` varchar(200) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `quantity_req` int(100) NOT NULL,
  `givenDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_medicine`
--

INSERT INTO `request_medicine` (`req_med_Id`, `residentId`, `residentName`, `productId`, `productName`, `unit`, `quantity_req`, `givenDate`) VALUES
(79, '270', 'glaiza mae arcxega ', '58', 'Mioge', 'boxes', 8, '2023-09-30'),
(80, '269', 'arcega glenn emerson ', '56', 'lazartan', 'boxes', 1, '2023-09-30'),
(81, '272', 'Kristy ', '59', 'Pills', 'tablet', 1, '2023-10-01'),
(82, '269', 'arcega glenn emerson ', '55', 'condom', 'boxes', 1, '2023-10-01'),
(83, '269', 'arcega glenn emerson ', '59', 'Pills', 'tablet', 1, '2023-10-08'),
(84, '269', 'arcega glenn emerson ', '56', 'lazartan', 'boxes', 1, '2023-10-08'),
(85, '273', 'Kaell', '56', 'lazartan', 'boxes', 1, '2023-10-08');

-- --------------------------------------------------------

--
-- Table structure for table `residentrecords`
--

CREATE TABLE `residentrecords` (
  `residentId` int(30) NOT NULL,
  `productId` int(30) NOT NULL,
  `residentName` varchar(100) NOT NULL,
  `dateBirth` date NOT NULL,
  `age` int(10) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contactNumber` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `residentrecords`
--

INSERT INTO `residentrecords` (`residentId`, `productId`, `residentName`, `dateBirth`, `age`, `sex`, `address`, `contactNumber`) VALUES
(269, 56, 'arcega glenn emerson', '2001-11-17', 21, 'Male', 'IlangIlang', '0912083928'),
(272, 59, 'Kristy ', '2002-06-05', 42, 'Female', 'BadjCom', '0901278128'),
(273, 56, 'Kaell', '2023-10-08', 21, 'Male', 'Orchids', '098281393');

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
  MODIFY `productId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `request_medicine`
--
ALTER TABLE `request_medicine`
  MODIFY `req_med_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `residentrecords`
--
ALTER TABLE `residentrecords`
  MODIFY `residentId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
