-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2025 at 08:39 PM
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
-- Database: `bookmytrain`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('active','banned') NOT NULL DEFAULT 'active',
  `profile_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `status`, `profile_image`, `created_at`) VALUES
('USR5E5CB7B8', 'Ahamed Ismail', 'ismail12345@gmail.com', '0752236387', '06/1A, Moor Street, Kalutara South', '$2y$10$E39krpNlb0eeDdKBGEBeke9DKmMGXARHBMNLECxYWk4gcwyhGD43C', 'active', '1751828765_my image .jpg', '2025-07-06 19:06:05'),
('USR67C95A6D', 'Ahamed Ismail', 'ahamedismail12345@gmail.com', '0752236387', '06/1A, Moor Street, Kalutara South', '$2y$10$F3WaF5h8NvRNNfXjyoM32OITmeXGzx170Pa.RjY9IQxE6PEv55lXG', 'active', '1751828610_download.jpeg', '2025-07-06 19:03:30'),
('USR964ABCA3', 'kabi', '12345@gmail.com', '0752236387', '6/1A Moor Street', '$2y$10$u4c.YT7WiPMPBmmiTYrWH.LYSs2jEttbJTQ.P3QZYKRwqpy0mA.Ve', 'banned', '1751912925_WhatsApp Image 2025-06-25 at 23.46.58_44b0a34e.jpg', '2025-07-07 17:29:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
