-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2023 at 11:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health_monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `health_statistics`
--

CREATE TABLE `health_statistics` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `blood_pressure` varchar(120) NOT NULL DEFAULT '120/80',
  `blood_sugar` float(5,2) NOT NULL,
  `temperature` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `health_statistics`
--

INSERT INTO `health_statistics` (`id`, `date`, `blood_pressure`, `blood_sugar`, `temperature`) VALUES
(1, '0000-00-00', '120', 201.00, 37.00);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` enum('Blood Pressure','Blood Sugar','Temperature') NOT NULL,
  `value` float NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `user_id`, `type`, `value`, `date`) VALUES
(7, 2, 'Blood Pressure', 0, '2023-05-31'),
(8, 3, 'Blood Sugar', 0, '2023-05-30'),
(10, 6, 'Blood Pressure', 100, '2023-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` enum('user','admin') NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `account_type`, `fname`, `lname`) VALUES
(1, '12', '12', 'admin', 'Ruslan', 'Karimov'),
(2, '21', '21', 'user', 'Elgun', 'Pashayev'),
(3, '31', '31', 'user', 'Telman', 'Mammadov'),
(4, '33', '33', 'user', 'anyone', 'anyonevich'),
(5, '35', '35', 'user', 'Social Science', 'aesrg'),
(6, '00', '00', 'user', 'sdfgh', 'seyg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `health_statistics`
--
ALTER TABLE `health_statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `health_statistics`
--
ALTER TABLE `health_statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
