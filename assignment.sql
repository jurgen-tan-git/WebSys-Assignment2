-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2023 at 06:35 PM
-- Server version: 10.4.27-MariaDB
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
  `member_id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `tg_chat_id` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` varchar(255) DEFAULT NULL,
  `otp_timestamp_expired` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`member_id`, `fname`, `lname`, `email`, `tg_chat_id`, `password`, `otp`, `otp_timestamp_expired`) VALUES
(135, 'Avin', 'Tech', 'rongk4ii@gmail.com', '282746527', '$2y$10$1K6FV7sYaukU/JOtNrfjwOTbJs7zW.kUoQTpdaS0olbTqrX2swuUa', '$2y$10$RCETP0Z8Jx6O/QF/TLRYeeuz0BcrZWpjiz45OOsjMic8atCHnPo8e', '2023-03-11 17:27:43'),
(145, 'Avin', 'Tech', 'rongk4iii@gmail.com', '199638425', '$2y$10$PyAxnPUfJI6s/tGmQUKsfOwNDdXqPoh46HwKilVQ1xsIwRfMtKjEq', '$2y$10$EV1/7T6gl/Q0se3wEK/zauHvfF/NKqeH1dXqphvFQogtP58dU.cuu', '2023-03-11 16:51:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`member_id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `member_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
