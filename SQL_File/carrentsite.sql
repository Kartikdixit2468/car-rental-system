-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2024 at 12:25 AM
-- Server version: 8.0.36
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrentsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE `agency` (
  `id` int NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agency`
--

INSERT INTO `agency` (`id`, `username`, `email`, `phone`, `password`, `date`) VALUES
(8, 'Kartik', 'kartikdixit2468@gmail.com', '9897445643', '25d55ad283aa400af464c76d713c07ad', '2024-03-23 19:35:38'),
(9, 'Kartik', 'kartikdixit8595@gmail.com', '1234567890', '8ddcff3a80f4189ca1c9d4d902c3c909', '2024-03-23 19:40:04');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `vehicle_id` int NOT NULL,
  `from_date` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `to_date` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(15) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `username`, `vehicle_id`, `from_date`, `to_date`, `message`, `status`) VALUES
(1, 'kartikdixit2468@gmail.com', 0, 'dgferdgf', 'easfdv', 'sdfvasrgfa', 'confirmed'),
(2, 'kartikdixit2468@gmail.com', 0, 'dgferdgf', 'easfdv', 'sdfvasrgfa', 'confirmed'),
(3, 'kartikdixit2468@gmail.com', 0, '21/09/2024', '30/09/2024', 'I wan this car for family trip', 'confirmed'),
(5, 'kartikdixit2468@gmail.com', 0, '21/09/2024', '30/09/2024', 'I wan this car for company work.', 'pending'),
(6, 'kartikdixit2468@gmail.com', 0, '21/09/2024', '30/09/2024', 'I wan this car.', 'pending'),
(7, 'kartikdixit2468@gmail.com', 0, 'dgferdgf', 'easfdv', 'I wan this car for family trip', 'pending'),
(8, 'kartikdixit2468@gmail.com', 0, '21/09/2024', '30/09/2024', 'I wan this car.', 'pending'),
(9, 'kartikdixit2468@gmail.com', 7, '08/06/2024', '20/06/2024', 'I wan this car for a long trip', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbcars`
--

CREATE TABLE `tbcars` (
  `id` int NOT NULL,
  `model` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `veh_number` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `seats` varchar(3) COLLATE utf8mb4_general_ci NOT NULL,
  `rent` int NOT NULL,
  `vimg` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbcars`
--

INSERT INTO `tbcars` (`id`, `model`, `veh_number`, `seats`, `rent`, `vimg`, `last_update`) VALUES
(6, 'toyota corola', 'DL12 2426', '6', 4500, 'toyotoyAI1.jpg', '2024-03-24 00:59:50'),
(7, 'Lambaghani Venana', 'P7', '2', 50000, 'new_car.jpg', '2024-03-24 01:05:53'),
(8, 'toyota lambo', 'DL10 5000', '2', 40000, 'toyo.jpg', '2024-03-24 01:36:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `last_update`) VALUES
(10, 'Kartik', 'kartikdixit2468@gmail.com', '9897445643', '25d55ad283aa400af464c76d713c07ad', '2024-03-23 19:31:32'),
(11, 'piyush', 'kartikdixit8595@gmail.com', '1234567890', '8ddcff3a80f4189ca1c9d4d902c3c909', '2024-03-23 19:35:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbcars`
--
ALTER TABLE `tbcars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agency`
--
ALTER TABLE `agency`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbcars`
--
ALTER TABLE `tbcars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
