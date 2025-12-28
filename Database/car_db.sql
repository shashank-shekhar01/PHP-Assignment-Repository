-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Dec 28, 2025 at 10:02 AM
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
-- Database: `car_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_enquiry`
--

CREATE TABLE `car_enquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `car_types` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_enquiry`
--

INSERT INTO `car_enquiry` (`id`, `name`, `phone`, `email`, `address`, `car_types`, `created_at`) VALUES
(2, 'Amar Singh', '9876543217', 'ama12@example.com', 'Noida, UP', 'Hatchback', '2025-12-26 11:41:17'),
(3, 'Pratik Verma', '7896512346', 'pra76@exampl.com', 'Noida, UP', 'Hatchback,SUV', '2025-12-26 11:47:55'),
(6, 'Test name', '1234567890', 'tes@exa.com', 'Delhi', 'Hatchback,Sedan,SUV', '2025-12-26 11:50:42'),
(7, 'Gaurav Khanna', '8876909012', 'gau34@example.com', 'Shimla, HP', 'Hatchback,Sedan', '2025-12-27 14:04:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_enquiry`
--
ALTER TABLE `car_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_enquiry`
--
ALTER TABLE `car_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
