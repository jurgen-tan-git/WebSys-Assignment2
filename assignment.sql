-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 28, 2023 at 06:31 PM
-- Server version: 8.0.32-0ubuntu0.20.04.2
-- PHP Version: 7.4.3-4ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) NOT NULL,
  `balance` decimal(13,2) NOT NULL DEFAULT '0.00',
  `email` varchar(45) NOT NULL,
  `tg_chat_id` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` varchar(255) DEFAULT NULL,
  `otp_timestamp_expired` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `fname`, `lname`, `balance`, `email`, `tg_chat_id`, `password`, `otp`, `otp_timestamp_expired`) VALUES
(173, 'Sherly', 'Yee', '14.00', 'yeesherlyyy@gmail.com', '199638425', '$2y$10$/IhCni8tTtfI5nLflY4VA.x96GTFimGerqZN20UueNw/NaWk/FEV2', '$2y$10$0WJIjwzH107fOSljGY12refNbkVQYIIbolKfBuOKAeBdUqJ8t1jEC', '2023-03-28 09:38:48'),
(174, 'marcus', 'ong', '0.00', 'marcus17ongg@gmail.com', '499363254', '$2y$10$0Pwk3GlkSbBHERjl9x9bOeQdv7tZ8knIPktVTbTpxkKiWDXaKNWCO', '$2y$10$DcOQtsgOGQD4Kvbf0W0/He07s56DOB0oeqp0Psc/grZ5lGo2JCg8W', '2023-03-28 06:46:14'),
(175, 'Jurgen', 'Tan', '1000100.00', '2202000@sit.singaporetech.edu.sg', '318550782', '$2y$10$vZvE7cGmaiBcSJbrdAGrgeGdcDQW6bq.s3tvRASewoe3lmxvPfl.G', '$2y$10$h7wyg51iMktotZFtMhyhoeVAAUW9KWmsA12btR1bQ34WCchHb.RNG', '2023-03-28 07:05:56'),
(176, 'kevin', 'neo', '0.00', '2201371@sit.singaporetech.edu.sg', '698253427', '$2y$10$NO8t03kL.tzbtOAHCp4DH.83VNtqf87XgQNCu3BUVNenAG.72nMdC', '$2y$10$CUnCKVuIuoMEBsFbMRqUpeatsp4MxtsN4VEKVGqgF92xBTEDhzy0W', '2023-03-28 07:02:10'),
(177, 'avin', 'tech', '23.00', 'rongk4ii@gmail.com', '282746527', '$2y$10$Z7zQ96AGO4LncuhHcZxZeu51V88.giZbXS.iRKt2lEr511KhPqKg.', '$2y$10$.HoIMLOpxcfT0RYi/c4nzeDyYFsIinBaFPgbR4qQJ4piuJsuoQ1EC', '2023-03-28 09:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `account_transaction`
--

CREATE TABLE `account_transaction` (
  `account_id` int NOT NULL,
  `transaction_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `account_transaction`
--

INSERT INTO `account_transaction` (`account_id`, `transaction_id`) VALUES
(175, 17),
(175, 18),
(177, 20),
(177, 21),
(177, 22),
(177, 23),
(177, 24),
(173, 25),
(173, 26),
(177, 27),
(177, 28),
(173, 29),
(177, 30),
(177, 31),
(177, 32),
(173, 33),
(177, 34),
(173, 35),
(177, 36),
(177, 37),
(177, 38);

-- --------------------------------------------------------

--
-- Table structure for table `pwd_reset`
--

CREATE TABLE `pwd_reset` (
  `email` varchar(45) NOT NULL,
  `reset_selector` varchar(255) NOT NULL,
  `reset_token` varchar(255) NOT NULL,
  `reset_expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int NOT NULL,
  `type` int NOT NULL,
  `amount` decimal(13,2) NOT NULL,
  `balance` decimal(13,2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `istransfer` int NOT NULL DEFAULT '0',
  `email` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `type`, `amount`, `balance`, `timestamp`, `istransfer`, `email`) VALUES
(14, 1, '1.00', '1.00', '2023-03-24 09:15:59', 0, NULL),
(15, 2, '2.00', '-1.00', '2023-03-24 09:23:57', 0, NULL),
(16, 1, '3.00', '2.00', '2023-03-26 04:29:09', 0, NULL),
(17, 1, '100.00', '100.00', '2023-03-28 07:06:01', 0, NULL),
(18, 1, '1000000.00', '1000100.00', '2023-03-28 07:06:09', 0, NULL),
(20, 1, '12.00', '12.00', '2023-03-28 07:47:50', 0, NULL),
(21, 1, '12.12', '24.12', '2023-03-28 07:49:42', 0, NULL),
(22, 0, '12.00', '12.12', '2023-03-28 09:34:12', 0, NULL),
(23, 1, '12.00', '12.00', '2023-03-28 09:34:12', 0, NULL),
(24, 0, '12.00', '0.00', '2023-03-28 09:41:21', 0, NULL),
(25, 1, '12.00', '12.00', '2023-03-28 09:41:21', 0, NULL),
(26, 0, '12.00', '0.00', '2023-03-28 09:47:17', 0, NULL),
(27, 1, '12.00', '12.00', '2023-03-28 09:47:17', 0, NULL),
(28, 0, '1.00', '11.00', '2023-03-28 09:50:39', 1, NULL),
(29, 1, '1.00', '1.00', '2023-03-28 09:50:39', 1, NULL),
(30, 0, '1.00', '10.00', '2023-03-28 09:58:46', 1, 'yeesherlyyy@gmail.com'),
(31, 1, '1.00', '11.00', '2023-03-28 09:58:46', 1, 'yeesherlyyy@gmail.com'),
(32, 0, '12.00', '-1.00', '2023-03-28 10:00:19', 1, 'yeesherlyyy@gmail.com'),
(33, 1, '12.00', '13.00', '2023-03-28 10:00:19', 1, 'rongk4ii@gmail.com'),
(34, 0, '1.00', '-2.00', '2023-03-28 10:00:52', 1, 'yeesherlyyy@gmail.com'),
(35, 1, '1.00', '14.00', '2023-03-28 10:00:52', 1, 'rongk4ii@gmail.com'),
(36, 1, '12.00', '10.00', '2023-03-28 10:23:00', 0, NULL),
(37, 1, '12.00', '22.00', '2023-03-28 10:24:00', 0, NULL),
(38, 1, '1.00', '23.00', '2023-03-28 10:31:24', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`account_id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `tg_chat_id` (`tg_chat_id`);

--
-- Indexes for table `account_transaction`
--
ALTER TABLE `account_transaction`
  ADD KEY `fk_account_transaction` (`account_id`),
  ADD KEY `fk_transaction_account` (`transaction_id`);

--
-- Indexes for table `pwd_reset`
--
ALTER TABLE `pwd_reset`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_transaction`
--
ALTER TABLE `account_transaction`
  ADD CONSTRAINT `fk_account_transaction` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`),
  ADD CONSTRAINT `fk_transaction_account` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
