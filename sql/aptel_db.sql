-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:9001
-- Generation Time: Mar 08, 2021 at 10:48 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aptel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstName` varchar(1000) NOT NULL,
  `lastName` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL DEFAULT '../../assets/user/image/default.png',
  `staffNumber` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `contact` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstName`, `lastName`, `image`, `staffNumber`, `email`, `contact`, `password`) VALUES
(1, 'Test', 'Admin', '../../assets/user/image/default.png', 'Staff009', 'admin@apu.edu.my', '0158762345', '$2y$10$2jRxDC8Jw.ZfC6NBhSZekudihDXT.nak.3LnjZv5rMq9gSYGG8b8e');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `roomtype` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `status` varchar(1000) DEFAULT 'waiting'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `id` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `room` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `price` int(11) NOT NULL,
  `overdue` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `description`, `time`) VALUES
(1, 'new admin: ejak@apu.edu.my registered', '2021-03-07 16:48:09'),
(2, 'admin: mamank@apu.edu.my Log In Success', '2021-03-07 16:48:25'),
(3, 'admin: ejak@apu.edu.my Log In Success', '2021-03-07 16:52:30'),
(4, 'new user: tp048981@mail.apu.edu.my registered', '2021-03-07 17:03:26'),
(5, 'user: tp048981@mail.apu.edu.my Log In Success', '2021-03-07 17:03:51'),
(6, 'user: ejak@apu.edu.my Log Out', '2021-03-07 17:25:13'),
(7, 'admin: ejak@apu.edu.my Log In Success', '2021-03-07 18:56:11'),
(8, 'admin: ejak@apu.edu.my Log In Success', '2021-03-08 07:01:56'),
(9, 'user: tp048981@mail.apu.edu.my Log In Success', '2021-03-08 07:02:32'),
(10, 'user: ejak@apu.edu.my Log Out', '2021-03-08 07:58:15'),
(11, 'admin: ejak@apu.edu.my Log In Success', '2021-03-08 09:10:59'),
(12, 'user: tp048981@mail.apu.edu.my Log Out', '2021-03-08 09:11:25'),
(13, 'new user: tp048892@mail.apu.edu.my registered', '2021-03-08 09:12:29'),
(14, 'user: ejak@apu.edu.my Log Out', '2021-03-08 09:16:37'),
(15, 'user: tp048981@mail.apu.edu.my Log In Failed', '2021-03-08 09:24:27'),
(16, 'user: tp048981@mail.apu.edu.my Log In Success', '2021-03-08 09:24:41'),
(17, 'admin: ejak@apu.edu.my Log In Failed', '2021-03-08 09:25:51'),
(18, 'admin: ejak@apu.edu.my Log In Success', '2021-03-08 09:26:17'),
(19, 'new admin: admin@apu.edu.my registered', '2021-03-08 09:35:07'),
(20, 'admin: admin@apu.edu.my Log In Success', '2021-03-08 09:35:36'),
(21, 'user: admin@apu.edu.my Log Out', '2021-03-08 09:43:20'),
(22, 'new user: user@mail.apu.edu.my registered', '2021-03-08 09:44:22'),
(23, 'user: user@mail.apu.edu.my Log In Success', '2021-03-08 09:44:52'),
(24, 'user: user@mail.apu.edu.my Log Out', '2021-03-08 09:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `contract` int(11) NOT NULL,
  `file` varchar(1000) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(1000) NOT NULL DEFAULT 'waiting'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `name`, `type`) VALUES
(1, 'SPS1', 1),
(2, 'SPS2', 1),
(3, 'SPS3', 1),
(4, 'PS1', 2),
(5, 'PS2', 2),
(6, 'PS3', 2),
(7, 'SPT1', 3),
(8, 'SPT2', 3);

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `size` varchar(1000) NOT NULL,
  `Description` text NOT NULL,
  `image` varchar(1000) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`id`, `name`, `size`, `Description`, `image`, `price`) VALUES
(1, 'Super Premium - En-Suite Single', '(140+ Sqft - Larger room with fridge and table lamp)', '<p><strong>Best&nbsp;</strong>option for&nbsp;<strong><em>LONELY,RICH AND SINGLE!!!</em></strong></p>', '1.jpg', 1520),
(2, 'Premium - En-Suite Single', '(100+ Sqft - Smaller room with table lamp)', '<p><strong>Best&nbsp;</strong><strong>budget</strong> option for <em><strong>YOU!!!</strong></em></p>', '2.jpg', 1000),
(3, 'Super Premium - En-Suite Twin', '(240+ Sqft - Larger room with fridge and table lamp)', '<p>Afraid of sleeping alone?&nbsp;<em><strong>WE GOT YOU COVERED!!!</strong></em></p>', '3.jpg', 1320);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `firstName` varchar(1000) NOT NULL,
  `lastName` varchar(1000) NOT NULL,
  `tpnumber` varchar(100) NOT NULL,
  `image` varchar(1000) NOT NULL DEFAULT '../../assets/user/image/default.png',
  `email` varchar(100) NOT NULL,
  `contact` varchar(1000) NOT NULL,
  `password` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `firstName`, `lastName`, `tpnumber`, `image`, `email`, `contact`, `password`) VALUES
(1, 'Test', 'User', 'tpuser', '../../assets/user/image/default.png', 'user@mail.apu.edu.my', '014555567', '$2y$10$xhcF3dF3mM5XsLkpsfA7WO2igB57v.KKoW1rNAfS.2OyLqVSp7U5.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roomtype` (`roomtype`),
  ADD KEY `student` (`student`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student` (`student`),
  ADD KEY `room` (`room`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contract` (`contract`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`roomtype`) REFERENCES `roomtype` (`id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`student`) REFERENCES `student` (`id`);

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`student`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `contract_ibfk_2` FOREIGN KEY (`room`) REFERENCES `room` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`contract`) REFERENCES `contract` (`id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`type`) REFERENCES `roomtype` (`id`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `update_overdue` ON SCHEDULE EVERY 1 MONTH STARTS '2021-03-01 15:13:06' ON COMPLETION PRESERVE ENABLE DO update contract set contract.overdue = contract.price+contract.overdue where contract.startDate <= now() and contract.endDate >= now()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
