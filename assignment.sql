-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 15, 2023 at 02:13 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `account_id` int(10) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) NOT NULL,
  `balance` decimal(13,2) NOT NULL DEFAULT '0.00',
  `email` varchar(45) NOT NULL,
  `tg_chat_id` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` varchar(255) DEFAULT NULL,
  `otp_timestamp_expired` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `fname`, `lname`, `balance`, `email`, `tg_chat_id`, `password`, `otp`, `otp_timestamp_expired`) VALUES
(135, 'Avin', 'Tech', '-23071.00', 'rongk4ii@gmail.com', '282746527', '$2y$10$1K6FV7sYaukU/JOtNrfjwOTbJs7zW.kUoQTpdaS0olbTqrX2swuUa', '$2y$10$5a0I0pZJ95vV83.KX87g0O/a/FwAp0VmS/pc6GQ8UUpex0TNZdnZm', '2023-03-15 13:53:54'),
(145, 'Avin', 'Tech', '0.00', 'rongk4iii@gmail.com', '199638425', '$2y$10$PyAxnPUfJI6s/tGmQUKsfOwNDdXqPoh46HwKilVQ1xsIwRfMtKjEq', '$2y$10$EV1/7T6gl/Q0se3wEK/zauHvfF/NKqeH1dXqphvFQogtP58dU.cuu', '2023-03-11 16:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `account_transaction`
--

CREATE TABLE `account_transaction` (
  `account_id` int(10) NOT NULL,
  `transaction_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_transaction`
--

INSERT INTO `account_transaction` (`account_id`, `transaction_id`) VALUES
(135, 4),
(135, 5),
(135, 6),
(135, 7),
(135, 8);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(10) NOT NULL,
  `type` int(1) NOT NULL,
  `amount` decimal(13,2) NOT NULL,
  `balance` decimal(13,2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `type`, `amount`, `balance`, `timestamp`) VALUES
(4, 1, '2.00', '125.00', '2023-03-15 13:53:11'),
(5, 1, '34.00', '159.00', '2023-03-15 13:53:23'),
(6, 1, '1.00', '160.00', '2023-03-15 13:56:28'),
(7, 1, '1.00', '161.00', '2023-03-15 13:56:35'),
(8, 2, '23232.00', '-23071.00', '2023-03-15 13:59:25');

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
  MODIFY `account_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
