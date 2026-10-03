-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2026 at 09:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `created_at`) VALUES
(1, 'Charissa Haban', 'charissahbn@gmail.com', '09123456789', '2026-09-23 15:48:42'),
(2, ' Winter Alexander', 'winter@gmail.com', ' 09123456789', '2026-09-23 15:51:36'),
(3, 'Raiden Griarte', 'raideng@gmail.com', '09123456789', '2026-09-23 15:52:13'),
(4, 'Leo Barrion', 'leob@gmail.com', ' 09123456789', '2026-09-23 15:52:50'),
(5, 'Jilianne Paquibot', 'jiliannep@gmail.com', ' 09123456789', '2026-09-23 15:53:16'),
(6, 'benedict haban', 'benedicthbn@gmail.com', '09982309212', '2026-10-03 03:39:30'),
(7, 'shanty garibay', 'shantyg@gmail.com', '09260831061', '2026-10-03 07:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `avatar`, `created_at`) VALUES
(1, 'cha01', 'Charissa Haban ', NULL, '2026-09-23 15:58:16'),
(2, 'win02 ', 'Winter Alexander', '1791013341_eba05f99318d7ac64009.jpg', '2026-09-23 16:01:44'),
(3, 'rai03', 'Raiden Griarte', '1791013390_94ed8d9252ac911c2109.jpg', '2026-09-23 16:02:18'),
(4, 'leo04', 'Leo Barrion', '1791013397_cdbb46bca11bda3bed98.jpg', '2026-09-23 16:02:41'),
(5, 'jil05', 'Jilianne Paquibot ', '1791013404_e53a7aaed377d4462cdd.jpg', '2026-09-23 16:03:10'),
(6, 'karina', 'karina dela cruz', NULL, '2026-10-03 05:49:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
