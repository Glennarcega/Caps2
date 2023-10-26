-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2023 at 05:40 PM
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
(33, '310', 'Lomboy', 'Anna', 'P', '64', 'IUD', 'Insert', 1, '2023-10-25', 'New User', '', ''),
(34, '311', 'Arce ', 'KIRTY ', 'K ', '64', 'IUD', 'Insert', 1, '2023-10-26', 'New User', '', '');

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
(63, 'Bigesic', 'Shell', 'Tablet', 'Batch 1', 0, 998, '2030-10-26', 'available'),
(64, 'IUD', 'Shell', 'Insert', 'Batch 1', 0, 98, '2030-10-26', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `record_data_graph`
--

CREATE TABLE `record_data_graph` (
  `recordId` int(100) NOT NULL,
  `residentId` varchar(100) NOT NULL,
  `productId` int(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `quantity_req` int(100) NOT NULL,
  `givenDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `record_data_graph`
--

INSERT INTO `record_data_graph` (`recordId`, `residentId`, `productId`, `address`, `productName`, `quantity_req`, `givenDate`) VALUES
(6, '310', 64, 'BadjCom', 'IUD', 1, '2023-10-25'),
(7, '311', 63, 'MalitamTres', 'Bigesic', 1, '2023-10-26'),
(8, '311', 63, 'MalitamTres', 'Bigesic', 1, '2023-10-26'),
(9, '311', 64, 'MalitamTres', 'IUD', 1, '2023-10-26');

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
(125, '311', 'Arce', 'KIRTY', 'K', '63', 'Bigesic', 'Tablet', 1, '2023-10-26'),
(126, '311', 'Arce ', 'KIRTY ', 'K ', '63', 'Bigesic', 'Tablet', 1, '2023-10-26');

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
  `address` varchar(100) NOT NULL,
  `contactNumber` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `residentrecords`
--

INSERT INTO `residentrecords` (`residentId`, `productId`, `lastName`, `firstName`, `middleName`, `dateBirth`, `age`, `sex`, `civilStatus`, `address`, `contactNumber`) VALUES
(310, 64, 'Lomboy', 'Anna', 'P', '1990-12-27', 32, 'Female', '', 'BadjCom', '09123456789'),
(311, 63, 'Arce', 'KIRTY', 'K', '2001-12-16', 21, 'Female', 'married', 'MalitamTres', '09876554323');

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
(1, 'glennarcega177@gmail.com', '1106a08ad857cb393a67e355d0d48df6', 'glenn', 'arcega', 1, 'tabangao ambulong', '09213721736', 'profile.jpg', '', '0000-00-00 00:00:00.000000'),
(86, 'gmadmsnd', 'd41d8cd98f00b204e9800998ecf8427e', 'bhw', 'bhw', 2, 'bhw1234', '09326736273', 'profile.jpg', '', '0000-00-00 00:00:00.000000'),
(87, 'bhw@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'ako', 'ako', 2, 'ako', '09239218922', '', '', '0000-00-00 00:00:00.000000'),
(88, 'frd', 'd41d8cd98f00b204e9800998ecf8427e', 'si', 'si', 2, 'si', '09328738284', '', '', '0000-00-00 00:00:00.000000');

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
-- Indexes for table `record_data_graph`
--
ALTER TABLE `record_data_graph`
  ADD PRIMARY KEY (`recordId`);

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
  MODIFY `contraceptiveId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `productId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `record_data_graph`
--
ALTER TABLE `record_data_graph`
  MODIFY `recordId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `request_medicine`
--
ALTER TABLE `request_medicine`
  MODIFY `req_med_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `residentrecords`
--
ALTER TABLE `residentrecords`
  MODIFY `residentId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=312;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
