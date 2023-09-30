-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2023 at 06:13 AM
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
  `status` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`productId`, `productName`, `sponsor`, `unit`, `batch`, `quantity1`, `total`, `expDate`, `status`, `action`) VALUES
(55, 'condom', 'shell', 'boxes', 'batch 2', 15, 115, '2003-12-12', 'available', ''),
(56, 'glenn', 'glenn', 'boxes', 'batch 1', 0, 4, '2030-12-12', 'available', ''),
(58, 'Mioge', 'Arcega', 'boxes', 'batch', 0, 979, '2024-03-29', 'available', '');

-- --------------------------------------------------------

--
-- Table structure for table `request_medicine`
--

CREATE TABLE `request_medicine` (
  `req_med_Id` int(11) NOT NULL,
  `residentId` varchar(100) NOT NULL,
  `productId` varchar(100) NOT NULL,
  `productName` varchar(200) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `quantity_req` int(100) NOT NULL,
  `givenDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_medicine`
--

INSERT INTO `request_medicine` (`req_med_Id`, `residentId`, `productId`, `productName`, `unit`, `quantity_req`, `givenDate`) VALUES
(1, '257', '2', 'bioflu', '', 6, '2023-09-25'),
(2, '257', '2', 'bioflu', '', 2, '2023-09-25'),
(3, '257', '1', 'biogesic 2', '', 5, '2023-09-25'),
(4, '258', '1', 'biogesic 2', '', 2, '2023-09-26'),
(5, '259', '4', 'cdm', '', 1, '0212-12-12'),
(6, '260', '45', 'condom', '', 10, '2023-09-26'),
(7, '260', '46', 'biogesic', '', 10, '2023-09-26'),
(8, '260', '45', 'condom', '', 5, '2023-09-26'),
(9, '260', '45', 'condom', '', 1, '2023-09-26'),
(10, '260', '45', 'condom', '', 1, '2023-09-26'),
(11, '260', '45', 'condom', '', 3, '2023-09-26'),
(12, '260', '45', 'condom', '', 10, '2023-09-27'),
(13, '260', '45', 'condom', '', 1, '2023-09-27'),
(14, '260', '45', 'condom', '', 1, '1212-12-12'),
(15, '260', '45', 'condom', '', 8, '1212-12-12'),
(16, '261', '45', 'condom', '', 12, '0121-02-12'),
(17, '261', '45', 'condom', '', 8, '0000-00-00'),
(18, '261', '45', 'condom', '', 30, '1212-12-12'),
(19, '260', '45', 'condom', '', 1, '1221-12-12'),
(20, '260', '45', 'condom', '', 5, '0002-03-23'),
(21, '260', '45', 'condom', '', 1, '0012-12-12'),
(22, '260', '45', 'condom', '', 1, '0000-00-00'),
(23, '260', '45', 'condom', '', 1, '1212-12-12'),
(24, '261', '45', 'condom', '', 1, '1212-12-12'),
(25, '260', '45', 'condom', '', 1, '0121-12-12'),
(26, '260', '45', 'condom', '', 12, '0121-12-12'),
(27, '260', '45', 'condom', '', 7, '1212-12-12'),
(28, '260', '45', 'condom', '', 1, '1221-12-12'),
(29, '261', '45', 'condom', '', 1, '2112-02-11'),
(30, '261', '45', 'condom', '', 2, '3232-12-31'),
(31, '261', '45', 'condom', '', 1, '0121-12-12'),
(32, '261', '45', 'condom', '', 12, '0012-12-12'),
(33, '260', '45', 'condom', '', 3, '1212-12-12'),
(34, '260', '45', 'condom', '', 5, '1212-12-12'),
(35, '261', '45', 'condom', '', 5, '1212-02-12'),
(36, '261', '45', 'condom', '', 3, '2023-09-27'),
(37, '261', '45', 'condom', '', 1, '1221-12-12'),
(38, '261', '45', 'condom', '', 1, '0000-00-00'),
(39, '261', '45', 'condom', '', 1, '1221-12-12'),
(40, '261', '45', 'condom', '', 1, '1221-12-12'),
(41, '261', '45', 'condom', '', 3, '1221-12-12'),
(42, '261', '45', 'condom', '', 1, '2121-12-21'),
(43, '261', '45', 'condom', '', 4, '0000-00-00'),
(44, '261', '45', 'condom', '', 1, '0000-00-00'),
(45, '261', '45', 'condom', '', 1, '0000-00-00'),
(46, '261', '45', 'condom', '', 3, '0000-00-00'),
(47, '260', '45', 'condom', '', 1, '1212-12-12'),
(48, '260', '45', 'condom', '', 1, '1221-12-12'),
(49, '261', '47', 'tae', '', 1, '0000-00-00'),
(50, '261', '47', 'tae', '', 1, '0000-00-00'),
(51, '261', '47', 'tae', '', 1, '2023-09-27'),
(52, '262', '47', 'tae', '', 21, '1221-02-12'),
(53, '262', '45', 'condom', '', 1, '2023-09-27'),
(54, '262', '45', 'condom', '', 1, '2023-09-27'),
(55, '262', '47', 'tae', '', 1, '2023-09-28'),
(56, '263', '47', 'tae', '', 12, '2023-09-26'),
(57, '263', '47', 'tae', '', 3, '2023-09-27'),
(58, '263', '45', 'condom', '', 1, '2023-09-30'),
(59, '264', '55', 'condom', '', 10, '2023-09-29'),
(60, '264', '55', 'condom', '', 5, '2023-09-29'),
(61, '265', '56', 'glenn', '', 10, '2023-09-29'),
(62, '261', '58', 'Mioge', 'boxes', 5, '2023-09-29'),
(63, '266', '55', 'condom', '', 1, '2023-09-29'),
(64, '267', '55', 'condom', '', 1, '2023-09-29'),
(65, '268', '55', 'condom', 'boxes', 3, '2023-09-29'),
(66, '268', '58', 'Mioge', 'boxes', 4, '2023-09-29'),
(67, '262', '56', 'glenn', 'boxes', 1, '2023-09-30'),
(68, '262', '58', 'Mioge', 'boxes', 1, '2023-09-30');

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
(260, 45, 'arcega glenn emerson', '2001-11-17', 21, 'Male', 'IlangIlang', '09298138323'),
(261, 45, 'tukmol', '1212-12-12', 21, 'Male', 'IlangIlang', '90218398129'),
(262, 47, 'sesi', '1212-12-12', 21, 'Male', 'IlangIlang', '21201391243'),
(263, 47, 'mama', '2009-11-12', 12, 'Male', 'IlangIlang', '0293102382'),
(264, 55, 'malakas', '2001-12-11', 221, 'Male', 'IlangIlang', '090318827'),
(265, 56, 'arcega glenn emerson', '2001-11-17', 21, 'Male', 'MalitamDos', '09121212819'),
(266, 55, 'kenra', '2009-09-29', 12, 'Male', 'IlangIlang', '0198309289'),
(267, 55, 'kenrick', '2001-11-22', 21, 'Male', 'Orchids', '083981293'),
(268, 55, 'dodot', '2001-11-11', 22, 'Male', 'IlangIlang', '091238293');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `usertype` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `usertype`) VALUES
(26, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1),
(73, 'bhw', '6adcff9bb6c324d349dfd67c82e1e832', 'bhw', 2),
(74, 'glenn', '3c784bff199ef62ecc2f3a988f395c62', 'glenn', 2),
(76, 'atupaw', '6548eac8ff3b15d06bf5b2b855860150', 'atupaw', 1),
(77, 'a', '0cc175b9c0f1b6a831c399e269772661', 'a', 1),
(78, 'tattoo', '306743b0726f2348d0299ae0d88967c0', 'tattoo', 2);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
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
  MODIFY `productId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `request_medicine`
--
ALTER TABLE `request_medicine`
  MODIFY `req_med_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `residentrecords`
--
ALTER TABLE `residentrecords`
  MODIFY `residentId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
