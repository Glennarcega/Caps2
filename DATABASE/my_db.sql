-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 11:19 AM
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
(23, '291', 'angel ', 'babuy ', ' ', '61', 'Pills', 'Insert', 1, '2023-10-18', 'Changing Method', 'BBT', 'none'),
(24, '291', 'angel ', 'babuy ', ' ', '61', 'Pills', 'Insert', 1, '2023-10-23', 'Current User', 'IUD', 'medical condition'),
(25, '295', 'ilagan', 'baby', '', '61', 'Pills', 'Insert', 1, '2023-10-22', 'New User', '', ''),
(26, '291', 'angel ', 'babuy ', ' ', '61', 'Pills', 'Insert', 1, '2023-10-24', 'Current User', 'COC', 'NONE'),
(27, '291', 'angel ', 'babuy ', ' ', '61', 'Pills', 'Insert', 1, '2024-10-24', 'Dropout & Restart', 'STM', 'E'),
(28, '299', 'dfw', 'wdwd', '', '61', 'Pills', 'Insert', 1, '2023-10-24', 'Dropout & Restart', 'Implant', 'medical condition');

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
(55, 'condom', 'shell', 'Pcs', 'batch 2', 10, 3, '2023-11-04', 'available'),
(56, 'lazartan', 'glenn', 'Tablet', 'batch 1', 1, 0, '2030-12-12', 'available'),
(60, 'Flumucil', 'Laura', 'Pcs', 'Batch 1', 0, 976, '2023-11-02', 'unavailable'),
(61, 'Pills', 'Lazada', 'Insert', 'Batch 1', 0, 59, '2026-11-11', 'available'),
(62, 'Boi', 'Blanco', 'Bottles', 'Batch 1', 0, 98, '2025-11-11', 'available');

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
  `address` varchar(100) NOT NULL,
  `productId` varchar(100) NOT NULL,
  `productName` varchar(200) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `quantity_req` int(100) NOT NULL,
  `givenDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_medicine`
--

INSERT INTO `request_medicine` (`req_med_Id`, `residentId`, `lastName`, `firstName`, `middleName`, `address`, `productId`, `productName`, `unit`, `quantity_req`, `givenDate`) VALUES
(111, '291', 'angel ', 'babuy ', ' ', '', '55', 'condom', 'Pcs', 1, '2023-10-24'),
(112, '296', 'kurimaw', 'ako', 'lang', '', '62', 'Boi', 'Bottles', 1, '2023-10-24'),
(113, '297', 'efcbje', 'dwjb', '', '', '56', 'lazartan', 'Tablet', 1, '2023-10-25'),
(114, '298', 'are', 'are', '', '', '55', 'condom', 'Pcs', 1, '2023-10-25'),
(115, '300', 'haliparot', 'ajok', '', 'IlangIlang', '55', 'condom', 'Pcs', 1, '2023-10-25'),
(116, '301', 'tanga', 'tanga', '', 'BadjCom', '55', 'condom', 'Pcs', 1, '2023-10-25'),
(117, '302', 'susoo', 'susoo', '', '', '55', 'condom', 'Pcs', 1, '2023-10-25'),
(118, '303', 'sibak', 'sinbak', '', 'Camia', '62', 'Boi', 'Bottles', 1, '2023-10-25'),
(119, '275', 'angel ', 'babuyyyy ', ' ', '', '55', 'condom', 'Pcs', 1, '2023-10-25');

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
(274, 60, 'angel', 'MAHAL', 'AKOOO', '1980-11-27', 42, 'Female', 'married', '', '', 'BadjCom', '09237648192'),
(275, 60, 'angel', 'babuyyyy', '', '1980-11-27', 42, 'Female', 'married', '', '', 'BadjCom', '09232748344'),
(276, 60, 'angel', 'babuyyyy', '', '1980-11-27', 42, 'Female', 'married', '', '', 'BadjCom', '02732838232'),
(277, 60, 'angel', 'babuyyyy', '', '1980-11-27', 42, 'Female', 'married', '', '', 'BadjCom', '09388277386'),
(279, 56, 'angel', 'babuyyyy', '', '1980-11-27', 42, 'Female', 'married', '', '', 'BadjCom', '09'),
(280, 61, 'angel', 'babuyyyy', '', '1980-11-27', 42, 'Female', 'married', '', '', 'BadjCom', '09'),
(283, 61, 'angel', 'babuyyyy', '', '1980-11-27', 42, 'Female', 'married', '', '', 'BadjCom', '09'),
(284, 61, 'angel', 'babuyyyy', '', '1980-11-27', 42, 'Female', 'married', '', '', 'BadjCom', '09'),
(287, 56, 'angel', 'babuyyyy', '', '1980-11-27', 42, 'Female', 'married', '', '', 'BadjCom', '09'),
(288, 55, 'angel', 'babuyyyy', '', '1980-11-27', 42, 'Female', 'married', '', '', 'BadjCom', '09'),
(289, 55, 'angel', 'babuyyyy', '', '1980-11-27', 42, 'Female', 'married', '', '', 'BadjCom', '09'),
(290, 61, 'angel', 'babuyyyy', '', '1980-11-27', 42, 'Female', 'married', '', '', 'BadjCom', '09'),
(291, 61, 'angel', 'babuyyyy', '', '1980-11-27', 42, 'Female', 'married', '', '', 'BadjCom', '09'),
(292, 61, 'angel', 'babuyyyy', '', '1980-11-27', 42, 'Female', 'married', '', '', 'BadjCom', '09'),
(293, 55, 'angel', 'babuyyyy', '', '1980-11-27', 42, 'Female', 'married', '', '', 'BadjCom', '09'),
(294, 55, 'angel', 'babuyyyy', '', '1980-11-27', 42, 'Female', 'married', '', '', 'BadjCom', '09'),
(295, 61, 'angel', 'babuyyyy', '', '1980-11-27', 42, 'Female', 'married', '', '', 'BadjCom', '09'),
(296, 62, 'kurimaw', 'ako', 'lang', '2001-11-11', 21, 'Male', 'single', '', '', 'Orchids', '09889139219'),
(297, 56, 'efcbje', 'dwjb', '', '2001-12-12', 21, 'Female', 'married', '', '', 'MalitamTres', '13627362763'),
(298, 55, 'are', 'are', '', '1980-12-28', 42, 'Male', 'single', '', '', 'Rosal', '09382787267'),
(299, 61, 'dfw', 'wdwd', '', '2001-12-22', 21, 'Female', '', '', '', 'MalitamDos', '09232732622'),
(300, 55, 'haliparot', 'ajok', '', '1980-12-27', 42, 'Male', 'single', '', '', 'IlangIlang', '09123613722'),
(301, 55, 'tanga', 'tanga', '', '1980-12-29', 42, 'Male', 'single', '', '', 'BadjCom', '09132183722'),
(302, 55, 'susoo', 'susoo', '', '1900-12-29', 122, 'Male', 'divorced', '', '', 'Sampaguita', '09937821827'),
(303, 62, 'sibak', 'sinbak', '', '2008-12-12', 14, 'Male', 'married', '', '', 'Camia', '09987677676');

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
(87, 'glennarcega@gmail.com', 'e88b26ac48d0d9b90fa60a6eae1a6ee5', 'ako', 'ako', 2, 'ako', '09239218922', '', '', '0000-00-00 00:00:00.000000'),
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
  MODIFY `contraceptiveId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `productId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `request_medicine`
--
ALTER TABLE `request_medicine`
  MODIFY `req_med_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `residentrecords`
--
ALTER TABLE `residentrecords`
  MODIFY `residentId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
