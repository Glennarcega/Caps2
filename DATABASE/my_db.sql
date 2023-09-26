-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2023 at 03:57 AM
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
  `quantity1` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `expDate` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`productId`, `productName`, `quantity1`, `total`, `expDate`, `status`, `action`) VALUES
(45, 'condom', 0, 90, '2024-03-30', 'available', '');

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
('260', '46', 'biogesic', 10, '2023-09-26');

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
(260, 45, 'arcega glenn emerson', '2001-11-17', 21, 'Male', 'IlangIlang', '09298138323');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `usertype` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `password`, `name`, `usertype`) VALUES
(26, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1),
(34, 'user', 'bhw', '6adcff9bb6c324d349dfd67c82e1e832', 'bhw', 2),
(37, 'user', 'a', '0cc175b9c0f1b6a831c399e269772661', 'a', 2),
(38, 'user', 'B', '9d5ed678fe57bcca610140957afab571', 'B', 2),
(39, 'user', 'C', '0d61f8370cad1d412f80b84d143e1257', 'C', 2),
(40, 'user', 'D', '8277e0910d750195b448797616e091ad', 'D', 2),
(41, 'user', '', '8fa14cdd754f91cc6554c9e71929cce7', 'f', 2),
(42, 'user', 'tukmol@gmail.com', '54cc3dafa5fe482436322bbe9d9f239c', 'tukmol', 0),
(43, 'admin', 'ako@gmail.com', '1cd13479e5609d79971c69051158a27f', 'ako', 0),
(44, 'user', 'enhfijdqi', 'c4ca4238a0b923820dcc509a6f75849b', 'gy', 0),
(45, 'user', 'q', '7694f4a66316e53c8cdd9d9954bd611d', 'q', 0),
(46, 'admin', 'w', 'f1290186a5d0b1ceab27f4e77c0c5d68', 'w', 0),
(47, 'admin', 'zz', '25ed1bcb423b0b7200f485fc5ff71c8e', 'zz', 0),
(48, 'user', 'kkk', 'cb42e130d1471239a27fca6228094f0e', 'kkk', 2),
(49, 'user', 'tae', '4752d51bd71f704beec34b798c76ca9e', 'tae', 2);

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
  MODIFY `productId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `residentrecords`
--
ALTER TABLE `residentrecords`
  MODIFY `residentId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
