-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 04:58 AM
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
  `password` varchar(255) NOT NULL,
  `otp` varchar(255) DEFAULT NULL,
  `otp_timestamp_expired` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`member_id`, `fname`, `lname`, `email`, `password`, `otp`, `otp_timestamp_expired`) VALUES
(1, 'avin', 'tech', 'rongk4ii@gmail.com', '$2y$10$EeAJLNtRsBAn0GlKAVeeIeOOPkgq08B27YxM6/ZyW8wfizpEwiemO', '$2y$10$9bjGShL57lJmoCcKCapZZOcFTryEhSVBjNTxkhmbptJIGzxIbP8ka', '2023-03-09 03:54:27'),
(3, 'Avin', 'Tech', 'rongk4iii@gmail.com', '$2y$10$2fDHl/rJ559tTDkVw1QqM.J3h3cHu18vNknQWpLwV8Sk82YeUDoqS', '$2y$10$et254h2M/pmcBZ.5Bardu.l6ZRIKvx..73bgm6Z9na1jPxSl4yvFO', '2023-03-08 18:48:38'),
(14, 'Avin', 'Tech', 'rongk4iiiii@gmail.com', '$2y$10$AGzZWDzW4zxil/Kg22MAj.y3oj.9ApyRpqIENHUIfXQRPBtP7cxPW', NULL, NULL),
(18, 'Avin', 'Tech', 'rongk4iooi@gmail.com', '$2y$10$QKT8s/errr0W5CZG9cukE.J4iyNv8xJI1ZORAEsS11z9xvQzh1zUu', NULL, NULL),
(25, 'Avin', 'Tech', 'rongk4asdadsii@gmail.com', '$2y$10$IouwwN9QZ.b1jvcyi7L/OO8ypSEksTIlvQ5CD8yGwaqOAqquTaxRa', NULL, NULL),
(32, 'Avin', 'Tech', 'rongk4iasdasdasdasdai@gmail.com', '$2y$10$/bnNm.Ps9Gh9/7oJogK8NuVhTklNdjLbIZNG34VAYTZ8kIyxl3Yiu', NULL, NULL),
(33, 'Avin', 'Tech', 'rongk4iasdasdai@gmail.com', '$2y$10$QCf7e5yGk/GGrcutJBedmObb9udt4znHbN30ZppNKeiRoMX/SNOt6', NULL, NULL),
(38, 'Avin', 'Tech', 'rongk4ii1231231123@gmail.com', '$2y$10$EsiaM8ll5whNHaaDr2G.vOKtd2Ww8TSEk1zIR8kOZkTu/q2qpXZkS', NULL, NULL),
(50, 'Avin', 'Tech', 'rongk412321312313213132132132ii@gmail.com', '$2y$10$Wt/nywSkM7DII1A4NnqbruDY0/jXeFm5xkJ6lk1DreHW5P0P4Ctei', NULL, NULL),
(59, 'Avin', 'Tech', 'rongk4ii98465@gmail.com', '$2y$10$76p9HVmCgHZ2fhlvxYQfg.isDN480zCqcTLwTgCpLN0OOPEFuTxey', NULL, NULL),
(60, 'Avin', 'Tech', 'rongk4ii958465@gmail.com', '$2y$10$kAa0dsHTpzt.stcswQV8bephtGHThfEj40NsWhg8DlF8jzkF0OK9O', NULL, NULL),
(61, 'Avin', 'Tech', 'rongk4ii95865465@gmail.com', '$2y$10$FbJb6/Nb.7.0VsXAGM5mG.Y9Kqdu6mQ3vrFhfR0ROsVUD.rpWZXju', NULL, NULL),
(62, 'Avin', 'Tech', 'rongk4ii958565465@gmail.com', '$2y$10$nRxR.Ld1oeM0QfCm9W9a9.bVwBcKCRuYEsvqscteMoN8amvKaqNDW', NULL, NULL),
(64, 'Avin', 'Tech', 'rongk4123123213213213213213213213ii@gmail.com', '$2y$10$ZDFrCyk9pEHpGpzjE2TWIe8134lm2a5sV6Toy3BLTwl00YuUETLAm', NULL, NULL),
(72, 'Avin', 'Tech', 'rongk12314ii@gmail.com', '$2y$10$XW5Hc0PXQjrlYsD14zryW.s6T9YfPcvIZVbVJ9KrBEHvThyMvgFEa', NULL, NULL),
(75, 'Avin', 'Tech', 'rongk4ii@gm1231ail.com', '$2y$10$hxpACoMB3GzdUSh/I5saDO7e7M5Ht6t9fISXCcNiNPs0fx2wU0CCy', NULL, NULL),
(77, 'Avin', 'Tech', 'rongk41231231231312313ii@gmail.com', '$2y$10$7HQxOIHIaC2BrXYL9R5g..ejRXMPD16erg6eM.Q8HK3HKRN6TLvBS', NULL, NULL);

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
  MODIFY `member_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
