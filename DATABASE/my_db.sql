-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2023 at 03:25 AM
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

INSERT INTO `medicines` (`productId`, `productName`, `sponsor`, `batch`, `quantity1`, `total`, `expDate`, `status`, `action`) VALUES
(55, 'condom', 'shell', 'batch 2', 20, 120, '2003-12-12', 'available', '');

-- --------------------------------------------------------

--
-- Table structure for table `request_medicine`
--

CREATE TABLE `request_medicine` (
  `residentId` varchar(100) NOT NULL,
  `productId` varchar(100) NOT NULL,
  `productName` varchar(200) NOT NULL,
  `quantity_req` int(100) NOT NULL,
  `givenDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_medicine`
--

INSERT INTO `request_medicine` (`residentId`, `productId`, `productName`, `quantity_req`, `givenDate`) VALUES
('257', '2', 'bioflu', 6, '2023-09-25'),
('257', '2', 'bioflu', 2, '2023-09-25'),
('257', '1', 'biogesic 2', 5, '2023-09-25'),
('258', '1', 'biogesic 2', 2, '2023-09-26'),
('259', '4', 'cdm', 1, '0212-12-12'),
('260', '45', 'condom', 10, '2023-09-26'),
('260', '46', 'biogesic', 10, '2023-09-26'),
('260', '45', 'condom', 5, '2023-09-26'),
('260', '45', 'condom', 1, '2023-09-26'),
('260', '45', 'condom', 1, '2023-09-26'),
('260', '45', 'condom', 3, '2023-09-26'),
('260', '45', 'condom', 10, '2023-09-27'),
('260', '45', 'condom', 1, '2023-09-27'),
('260', '45', 'condom', 1, '1212-12-12'),
('260', '45', 'condom', 8, '1212-12-12'),
('261', '45', 'condom', 12, '0121-02-12'),
('261', '45', 'condom', 8, '0000-00-00'),
('261', '45', 'condom', 30, '1212-12-12'),
('260', '45', 'condom', 1, '1221-12-12'),
('260', '45', 'condom', 5, '0002-03-23'),
('260', '45', 'condom', 1, '0012-12-12'),
('260', '45', 'condom', 1, '0000-00-00'),
('260', '45', 'condom', 1, '1212-12-12'),
('261', '45', 'condom', 1, '1212-12-12'),
('260', '45', 'condom', 1, '0121-12-12'),
('260', '45', 'condom', 12, '0121-12-12'),
('260', '45', 'condom', 7, '1212-12-12'),
('260', '45', 'condom', 1, '1221-12-12'),
('261', '45', 'condom', 1, '2112-02-11'),
('261', '45', 'condom', 2, '3232-12-31'),
('261', '45', 'condom', 1, '0121-12-12'),
('261', '45', 'condom', 12, '0012-12-12'),
('260', '45', 'condom', 3, '1212-12-12'),
('260', '45', 'condom', 5, '1212-12-12'),
('261', '45', 'condom', 5, '1212-02-12'),
('261', '45', 'condom', 3, '2023-09-27'),
('261', '45', 'condom', 1, '1221-12-12'),
('261', '45', 'condom', 1, '0000-00-00'),
('261', '45', 'condom', 1, '1221-12-12'),
('261', '45', 'condom', 1, '1221-12-12'),
('261', '45', 'condom', 3, '1221-12-12'),
('261', '45', 'condom', 1, '2121-12-21'),
('261', '45', 'condom', 4, '0000-00-00'),
('261', '45', 'condom', 1, '0000-00-00'),
('261', '45', 'condom', 1, '0000-00-00'),
('261', '45', 'condom', 3, '0000-00-00'),
('260', '45', 'condom', 1, '1212-12-12'),
('260', '45', 'condom', 1, '1221-12-12'),
('261', '47', 'tae', 1, '0000-00-00'),
('261', '47', 'tae', 1, '0000-00-00'),
('261', '47', 'tae', 1, '2023-09-27'),
('262', '47', 'tae', 21, '1221-02-12'),
('262', '45', 'condom', 1, '2023-09-27'),
('262', '45', 'condom', 1, '2023-09-27'),
('262', '47', 'tae', 1, '2023-09-28'),
('263', '47', 'tae', 12, '2023-09-26'),
('263', '47', 'tae', 3, '2023-09-27'),
('263', '45', 'condom', 1, '2023-09-30');

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
(263, 47, 'mama', '2009-11-12', 12, 'Male', 'IlangIlang', '0293102382');

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
(73, 'bhw', '6adcff9bb6c324d349dfd67c82e1e832', 'bhw', 2);

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
  MODIFY `productId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `residentrecords`
--
ALTER TABLE `residentrecords`
  MODIFY `residentId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
