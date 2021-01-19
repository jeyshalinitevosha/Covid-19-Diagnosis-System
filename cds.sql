-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2021 at 06:35 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cds`
--

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `resultID` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `Q1` varchar(30) NOT NULL,
  `Q2` varchar(30) NOT NULL,
  `Q3` varchar(30) NOT NULL,
  `Q4` varchar(30) NOT NULL,
  `Q5` varchar(30) NOT NULL,
  `Q6` varchar(30) NOT NULL,
  `Q7` varchar(30) NOT NULL,
  `Q8` varchar(30) NOT NULL,
  `Q9` varchar(30) NOT NULL,
  `Q10` varchar(30) NOT NULL,
  `overall` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`resultID`, `user_id`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `Q6`, `Q7`, `Q8`, `Q9`, `Q10`, `overall`) VALUES
(2, 8, 'Yes', 'Yes', 'Yes', 'No', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'High'),
(3, 8, 'Yes', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'Yes', 'No', 'Moderate'),
(4, 8, 'Yes', 'Yes', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Moderate');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `ad_line1` varchar(100) NOT NULL,
  `ad_line2` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `postal_code` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `user_type`, `ad_line1`, `ad_line2`, `city`, `state`, `postal_code`) VALUES
(4, 'test4', '81dc9bdb52d04dc20036dbd8313ed055', '', 'opt', '', 'kepong', 'kl', 32333),
(5, 'tevosha', '613fa9b3c707b1a2d5b33455949156dc', 'user', 'Aman Dua', '', 'Kepong ', 'kl', 52100),
(6, 'TestCreateUser', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'Kepong', '', 'Kepong', 'kl', 52100),
(7, 'TestCreateAdmin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Kepong', '', 'Kepong', 'kl', 52100),
(8, 'haziq', '202cb962ac59075b964b07152d234b70', 'user', 'Jalan Enclave I', '', 'Labu', 'n9', 71760),
(9, 'abdul', '202cb962ac59075b964b07152d234b70', 'user', 'Jalan Enclave I', '', 'Labu', 'n9', 71760);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`resultID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `resultID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
