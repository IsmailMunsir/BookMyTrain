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
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `train_name` varchar(100) NOT NULL,
  `from_station` varchar(100) NOT NULL,
  `to_station` varchar(100) NOT NULL,
  `travel_date` date NOT NULL,
  `class` varchar(50) NOT NULL,
  `compartment` varchar(50) NOT NULL,
  `seat_count` int(11) NOT NULL,
  `passenger_genders` text NOT NULL,
  `status` enum('confirmed','cancelled') NOT NULL DEFAULT 'confirmed',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `train_name`, `from_station`, `to_station`, `travel_date`, `class`, `compartment`, `seat_count`, `passenger_genders`, `status`, `created_at`) VALUES
(1, 'USR5E5CB7B8', '', 'Kaltura ', 'kany', '2025-07-10', 'first', 'A', 1, '[\"male\"]', 'confirmed', '2025-07-06 19:21:16'),
(2, 'USR67C95A6D', '', 'Kaltura ', 'Kaltura ', '2025-07-10', 'first', 'B', 1, '[\"female\"]', 'confirmed', '2025-07-07 15:54:52'),
(3, 'USR964ABCA3', '', 'kalu', 'kany', '2025-07-15', 'first', 'A', 1, '[\"female\"]', 'confirmed', '2025-07-07 18:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `submitted_at`) VALUES
(1, 'Ahamed Ismail', 'ahamedismail12345@gmail.com', 'sdfgl;djfghkio', '2025-06-14 14:11:12'),
(2, 'Ahamed Ismail', 'ahamedismail12345@gmail.com', 'welcome', '2025-06-14 14:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `feedback` text NOT NULL,
  `submitted_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `feedback`, `submitted_at`) VALUES
(1, 'Ahamed Ismail', 'ahamedismail12345@gmail.com', 'asdfiokjfgkln nmdfg', '2025-06-14 23:29:29'),
(2, 'Ahamed Ismail', 'ahamedismail12345@gmail.com', 'asfsdasfgd', '2025-06-14 23:54:04'),
(3, 'Ahamed Ismail', 'ahamedismail@gmail.com', 'hello i am isamil', '2025-07-07 23:59:11');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `from_city` varchar(100) NOT NULL,
  `to_city` varchar(100) NOT NULL,
  `distance_km` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `from_city`, `to_city`, `distance_km`) VALUES
(1, 'Colombo ', 'kalutara', 5),
(2, 'Colombo ', 'kalutara', 45),
(4, 'Colombo ', 'kalutara', 45),
(5, 'kany', 'colombo', 100);

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

CREATE TABLE `trains` (
  `id` int(11) NOT NULL,
  `train_name` varchar(100) NOT NULL,
  `from_station` varchar(100) NOT NULL,
  `to_station` varchar(100) NOT NULL,
  `departure_time` time NOT NULL,
  `arrival_time` time NOT NULL,
  `train_type` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`id`, `train_name`, `from_station`, `to_station`, `departure_time`, `arrival_time`, `train_type`, `created_at`) VALUES
(1, 'kabi', 'colombo ', 'kany', '23:01:00', '14:00:00', 'Express', '2025-06-20 17:30:24'),
(2, 'kabi2', 'colombo ', 'kany', '12:02:00', '12:03:00', 'Night Mail', '2025-06-24 19:27:35'),
(3, 'kany', 'colombo', 'kany', '12:03:00', '14:00:00', 'Express', '2025-07-07 18:30:47');

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
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trains`
--
ALTER TABLE `trains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
