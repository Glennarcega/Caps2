-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2023 at 10:51 AM
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
-- Table structure for table `contraceptivemethod_request`
--

CREATE TABLE `contraceptivemethod_request` (
  `contraceptiveId` int(100) NOT NULL,
  `residentId` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `middleName` varchar(100) NOT NULL,
  `productId` varchar(100) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `quantity_req` int(100) NOT NULL,
  `givenDate` date NOT NULL,
  `clientType` varchar(100) NOT NULL,
  `changingMethod` varchar(50) NOT NULL,
  `reason` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contraceptivemethod_request`
--

INSERT INTO `contraceptivemethod_request` (`contraceptiveId`, `residentId`, `lastName`, `firstName`, `middleName`, `productId`, `productName`, `unit`, `quantity_req`, `givenDate`, `clientType`, `changingMethod`, `reason`) VALUES
(10, '7', 'arcega', 'glenn', '', '61', 'Pills', 'Insert', 1, '2023-10-17', 'changingMethod', 'IUD', 'medical condition'),
(11, '8', 'tukmol', 'ako', '', '61', 'Pills', 'Insert', 1, '2023-10-17', 'dropoutRestart', '', ''),
(12, '9', 'maybel', 'arce', '', '61', 'Pills', 'Insert', 1, '2023-10-17', 'currentUser', '', ''),
(13, '10', 'new ', 'user', '', '61', 'Pills', 'Insert', 1, '2023-10-17', 'currentUser', '', ''),
(14, '11', 'maganda', 'maganda', '', '61', 'Pills', 'Insert', 1, '2023-10-17', 'Dropout & Restart', '', ''),
(15, '290', 'arc', 'arcega', '', '61', 'Pills', 'Insert', 1, '2023-10-17', 'Current User', 'Implant', 'dw'),
(16, '291', 'angel', 'babuy', '', '61', 'Pills', 'Insert', 1, '2023-10-17', 'Changing Method', 'BBT', 'me'),
(17, '292', 'beatrice', 'beatrice', '', '61', 'Pills', 'Insert', 1, '2023-10-17', 'Changing Method', 'LAM', 'medical condition'),
(20, '291', 'angel ', 'babuy ', ' ', '61', 'Pills', 'Insert', 1, '2023-10-18', '', '', ''),
(21, '291', 'angel ', 'babuy ', ' ', '61', 'Pills', 'Insert', 1, '2023-10-18', '', '', ''),
(22, '291', 'angel ', 'babuy ', ' ', '61', 'Pills', 'Insert', 1, '2023-10-18', 'Changing Method', 'STM', 'medical condition'),
(23, '291', 'angel ', 'babuy ', ' ', '61', 'Pills', 'Insert', 1, '2023-10-18', 'Changing Method', 'BBT', 'none');

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
(55, 'condom', 'shell', 'Pcs', 'batch 2', 10, 8, '2023-11-04', 'available'),
(56, 'lazartan', 'glenn', 'Tablet', 'batch 1', 1, 0, '2030-12-12', 'available'),
(60, 'Flumucil', 'Laura', 'Pcs', 'Batch 1', 0, 976, '2023-11-02', 'unavailable'),
(61, 'Pills', 'Lazada', 'Insert', 'Batch 1', 0, 64, '2026-11-11', 'available');

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
(90, '275', 'arcega ', 'glaiza ', ' ', '60', 'Flumucil', 'Pcs', 1, '2023-12-12'),
(91, '277', 'arcega', 'glenn', '', '60', 'Flumucil', 'Pcs', 1, '2023-10-16'),
(92, '275', 'arcega ', 'glaiza ', ' ', '56', 'lazartan', 'Tablet', 0, '2023-10-18'),
(93, '275', 'arcega ', 'glaiza ', ' ', '56', 'lazartan', 'Tablet', 1, '2023-10-18'),
(94, '275', 'arcega ', 'glaiza ', ' ', '60', 'Flumucil', 'Pcs', 1, '2023-10-17'),
(95, '278', 'arapa', 'pap', 'le', '61', 'Pills', 'Pcs', 1, '2023-10-16'),
(96, '278', 'arapa ', 'pap ', 'le ', '61', 'Pills', 'Pcs', 1, '2023-10-17'),
(97, '278', 'arapa ', 'pap ', 'le ', '55', 'condom', 'Pcs', 1, '2023-10-18'),
(98, '279', 'arcega', 'glen', '', '56', 'lazartan', 'Tablet', 1, '2023-10-17'),
(99, '280', 'arcega', 'ndw', '', '61', 'Pills', 'Insert', 1, '2023-10-17'),
(100, '287', 'FEW', 'EFEF', '', '56', 'lazartan', 'Tablet', 1, '2023-10-17'),
(101, '288', 'EF', 'W3FW', '', '55', 'condom', 'Pcs', 1, '2023-10-17'),
(102, '289', 'ESVC', 'EC', '', '55', 'condom', 'Pcs', 1, '0012-12-19'),
(103, '275', 'arcega ', 'glaiza ', ' ', '56', 'lazartan', 'Tablet', 1, '2023-10-19'),
(104, '275', 'arcega ', 'glaiza ', ' ', '55', 'condom', 'Pcs', 1, '2023-10-18'),
(105, '275', 'arcega ', 'glaiza ', ' ', '55', 'condom', 'Pcs', 1, '2023-10-19'),
(106, '291', 'angel ', 'babuy ', ' ', '55', 'condom', 'Pcs', 1, '2023-10-18');

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
  `civilStatus` varchar(20) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `houseNumber` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contactNumber` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `residentrecords`
--

INSERT INTO `residentrecords` (`residentId`, `productId`, `lastName`, `firstName`, `middleName`, `dateBirth`, `age`, `sex`, `civilStatus`, `occupation`, `houseNumber`, `address`, `contactNumber`) VALUES
(274, 60, 'arcega', 'glenn emersom', 'plata', '2023-10-15', 0, 'Male', '', '', '', 'MalitamDos', '0930182938'),
(275, 60, 'arcega', 'glaiza', '', '2023-10-02', 0, 'Male', '', '', '', 'Sampaguita', '09952846057'),
(276, 60, 'wfdw', 'wdfwf', '', '1221-12-12', 0, 'Male', '', '', '', 'BadjCom', '09138219783'),
(277, 60, 'arcega', 'glenn', '', '0012-12-12', 0, 'Male', '', '', '', 'IlangIlang', '0934829'),
(279, 56, 'arcega', 'glen', '', '1212-12-12', 810, 'Female', '', '', '', 'MalitamTres', '09372183'),
(280, 61, 'arcega', 'ndw', '', '2023-10-17', 0, 'Female', '', '', '', 'MalitamTres', '09823'),
(283, 61, 'arcega', 'ndbew', '', '2001-11-17', 21, 'Female', '', '', '', 'BadjCom', '0930182938'),
(284, 61, 'eve', 'eee', '', '2001-12-20', 21, 'Female', '', '', '', 'BadjCom', '018391292'),
(287, 56, 'FEW', 'EFEF', '', '0121-12-12', 1901, 'Female', '', '', '', 'BadjCom', '01938912'),
(288, 55, 'EF', 'W3FW', '', '0121-12-12', 1901, 'Female', '', '', '', 'MalitamDos', '0123892131'),
(289, 55, 'ESVC', 'EC', '', '1212-12-12', 810, 'Female', '', '', '', 'Sampaguita', '1321E2'),
(290, 61, 'arc', 'arcega', '', '2001-11-17', 21, 'Female', '', '', '', 'Orchids', '081921'),
(291, 61, 'angel', 'babuy', '', '1980-11-27', 42, 'Female', '', '', '', 'BadjCom', '09788765'),
(292, 61, 'beatrice', 'beatrice', '', '1900-12-26', 122, 'Female', '', '', '', 'BadjCom', '01290312893');

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
(1, 'glennarcega177@gmail.com', '2374875de91ca665b7be96d70c6b11c5', 'glenn', 'arcega', 1, 'tabangao ambulong', '03928938922', 'profile.jpg', '', '0000-00-00 00:00:00.000000'),
(86, 'bhw@gmail.com', '6adcff9bb6c324d349dfd67c82e1e832', 'bhw', 'bhw', 2, 'bhw1234', '10938712', 'profile.jpg', '', '0000-00-00 00:00:00.000000');

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
-- Indexes for table `contraceptivemethod_request`
--
ALTER TABLE `contraceptivemethod_request`
  ADD PRIMARY KEY (`contraceptiveId`);

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
-- AUTO_INCREMENT for table `contraceptivemethod_request`
--
ALTER TABLE `contraceptivemethod_request`
  MODIFY `contraceptiveId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `productId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `request_medicine`
--
ALTER TABLE `request_medicine`
  MODIFY `req_med_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `residentrecords`
--
ALTER TABLE `residentrecords`
  MODIFY `residentId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
