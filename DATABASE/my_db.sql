-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2023 at 05:26 PM
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
(1, 'biogesic 2', 12, 0, '2023-07-25', 'available', ''),
(2, 'bioflu', 1000, 980, '2023-07-16', 'available', ''),
(3, 'condom', 1, 0, '2023-07-16', 'available', ''),
(4, 'cdm', 1, 0, '2023-09-19', 'available', ''),
(5, 'popo', 1, 0, '2023-09-21', 'available', ''),
(6, 'lagu', 1, 0, '2023-09-23', 'available', '');

-- --------------------------------------------------------

--
-- Table structure for table `request_medicine`
--

CREATE TABLE `request_medicine` (
  `residentId` varchar(100) NOT NULL,
  `productId` varchar(100) NOT NULL,
  `productName` varchar(200) NOT NULL,
  `quantity1` int(100) NOT NULL,
  `quantity_req` int(100) NOT NULL,
  `givenDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_medicine`
--

INSERT INTO `request_medicine` (`residentId`, `productId`, `productName`, `quantity1`, `quantity_req`, `givenDate`) VALUES
('', '2', 'bioflu', 0, 1, '2023-09-24'),
('213', '1', 'biogesic 2', 0, 1, '2023-09-24'),
('246', '2', 'bioflu', 0, 2, '2023-09-24'),
('246', '2', 'bioflu', 0, 1, '0000-00-00'),
('230', '2', 'bioflu', 0, 1, '2023-09-24'),
('230', '2', 'bioflu', 0, 1, '0000-00-00'),
('', '2', 'bioflu', 0, 12, '1221-12-12');

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
  `contactNumber` varchar(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `quantity_req` int(100) NOT NULL,
  `givenDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `residentrecords`
--

INSERT INTO `residentrecords` (`residentId`, `productId`, `residentName`, `dateBirth`, `age`, `sex`, `address`, `contactNumber`, `productName`, `quantity_req`, `givenDate`) VALUES
(210, 1, 'arcega glenn', '2023-09-22', 12, 'Male', 'IlangIlang', '09283782137', 'biogesic 2', 1, '2023-09-22'),
(211, 1, 'ako', '2023-09-30', 90, 'Male', 'IlangIlang', '091301298', 'biogesic 2', 12, '2023-09-23'),
(212, 1, 'kda', '0000-00-00', 0, 'Male', 'IlangIlang', '', 'biogesic 2', 8, '0000-00-00'),
(213, 1, '', '0000-00-00', 0, 'Male', 'IlangIlang', '', 'biogesic 2', 9, '0000-00-00'),
(214, 1, '', '0000-00-00', 0, 'Male', 'IlangIlang', '', 'biogesic 2', 2, '0000-00-00'),
(215, 1, 'tuko', '2023-09-23', 12, 'Male', 'IlangIlang', '0192480432', 'biogesic 2', 2, '2023-09-23'),
(216, 1, 'mayvel', '2023-09-23', 12, 'Male', 'IlangIlang', '092388219', 'biogesic 2', 1, '2023-09-23'),
(217, 4, 'wangot', '2023-09-23', 87, 'Male', 'IlangIlang', '1321323', 'cdm', 7, '2023-09-23'),
(218, 5, 'ty', '0000-00-00', 0, 'Male', 'IlangIlang', '', 'popo', 10, '2023-09-23'),
(219, 5, 'jojo', '2023-09-23', 12, 'Male', 'IlangIlang', '0930812', 'popo', 12, '2023-09-23'),
(220, 5, 'jiji', '0000-00-00', 0, 'Male', 'IlangIlang', '', 'popo', 89, '0000-00-00'),
(221, 5, 'jiji', '0000-00-00', 0, 'Male', 'IlangIlang', '', 'popo', 89, '0000-00-00'),
(222, 1, 'swswswsws', '0000-00-00', 0, 'Male', 'IlangIlang', '', 'biogesic 2', 12, '0000-00-00'),
(223, 1, 'qwerty', '0000-00-00', 0, 'Male', 'IlangIlang', '', 'biogesic 2', 12, '0000-00-00'),
(224, 5, 'areraer', '2023-10-04', 13, 'Male', 'IlangIlang', '4092389785', 'popo', 1, '2023-09-23'),
(225, 4, 'glennnnnnn177777777', '2023-09-23', 21, 'Male', 'IlangIlang', '09381283', 'cdm', 1, '2023-09-23'),
(226, 4, 'loydi', '2023-09-23', 21, 'Male', 'IlangIlang', '09213425678', 'cdm', 2, '2023-09-23'),
(227, 4, 'ito', '0000-00-00', 12, 'Male', 'IlangIlang', '09137892173', 'cdm', 1, '2023-09-23'),
(228, 4, 'glennnnnnn177777777', '0000-00-00', 21, 'Male', 'IlangIlang', '9204912801', 'cdm', 1, '2023-09-23'),
(229, 1, 'arce', '0000-00-00', 13, 'Male', 'IlangIlang', '089329034', 'biogesic 2', 1, '2023-09-23'),
(230, 1, 'arce', '0000-00-00', 13, 'Male', 'IlangIlang', '089329034', 'biogesic 2', 1, '2023-09-23'),
(231, 4, '', '0000-00-00', 0, 'Male', 'IlangIlang', '', 'cdm', 0, '0000-00-00'),
(232, 1, 'ev', '0000-00-00', 12, 'Male', 'IlangIlang', '', 'biogesic 2', 1, '0000-00-00'),
(233, 1, 'akoo', '0000-00-00', 0, 'Male', 'IlangIlang', '02948143', 'biogesic 2', 1, '0000-00-00'),
(234, 1, 'nbwhgd', '0000-00-00', 0, 'Male', 'IlangIlang', '', 'biogesic 2', 12, '0000-00-00'),
(235, 1, 'e2qmdw', '0000-00-00', 0, 'Male', 'IlangIlang', '', 'biogesic 2', 1, '0000-00-00'),
(236, 1, 'fjiw', '0000-00-00', 0, 'Male', 'IlangIlang', '', 'biogesic 2', 1, '0000-00-00'),
(237, 2, 'bescfesfc', '2023-09-23', 12, 'Male', 'IlangIlang', '090284292', 'bioflu', 149, '2023-09-23'),
(238, 5, 'h3ud', '2023-09-23', 23, 'Male', 'IlangIlang', '0918398293', 'popo', 1, '2023-09-23'),
(239, 3, 'ateawuvd', '0000-00-00', 22, 'Male', 'IlangIlang', '09183201423', 'condom', 1, '2023-09-23'),
(240, 2, 'arce', '0000-00-00', 0, 'Male', 'IlangIlang', '', 'bioflu', 0, '0000-00-00'),
(241, 6, 'bayaw', '0000-00-00', 0, 'Male', 'IlangIlang', '', 'lagu', 0, '0000-00-00'),
(242, 5, 'bayaw', '2023-09-24', 12, 'Male', 'IlangIlang', '', 'popo', 0, '0000-00-00'),
(243, 3, 'arce', '2023-09-24', 21, 'Male', 'IlangIlang', '', 'condom', 0, '0000-00-00'),
(244, 3, 'areca', '2002-12-23', 12, 'Male', 'IlangIlang', '19312034303', 'condom', 1, '2013-12-23'),
(245, 6, 'taieieiiieieieieeieiei', '0000-00-00', 12, 'Male', 'IlangIlang', '1212', 'lagu', 1, '0122-12-12'),
(246, 1, 'arcega', '0000-00-00', 0, 'Male', 'IlangIlang', '', 'biogesic 2', 12, '0000-00-00'),
(247, 2, 'ikaw lang', '2023-09-24', 12, 'Male', 'IlangIlang', '29038184093', 'bioflu', 12, '2023-09-24'),
(248, 4, 'aso', '0000-00-00', 0, 'Male', 'IlangIlang', '', 'cdm', 1, '0000-00-00'),
(249, 5, 'glaiza mae arcxega', '0000-00-00', 0, 'Male', 'IlangIlang', '', 'popo', 1, '2023-09-24'),
(250, 5, 'arcega glenn', '0000-00-00', 12, 'Male', 'IlangIlang', '', 'popo', 0, '0000-00-00'),
(251, 5, 'dedq', '2212-12-21', 12, 'Male', 'IlangIlang', '', 'popo', 0, '0000-00-00'),
(252, 5, 'fwew', '2212-11-21', 12, 'Male', 'IlangIlang', '1242143434', 'popo', 1, '1121-12-12'),
(253, 2, 'michael tae', '0012-12-12', 12, 'Male', 'IlangIlang', '12132432534', 'bioflu', 12, '1221-12-12'),
(254, 2, 'fwefcw', '0021-12-21', 12, 'Male', 'IlangIlang', '12134235432', 'bioflu', 8, '1221-12-12');

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
  ADD PRIMARY KEY (`residentId`),
  ADD KEY `residentrecords_ibfk_1` (`productId`);

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
  MODIFY `productId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `residentrecords`
--
ALTER TABLE `residentrecords`
  MODIFY `residentId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `residentrecords`
--
ALTER TABLE `residentrecords`
  ADD CONSTRAINT `residentrecords_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `medicines` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
