-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 01:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `carName` varchar(90) DEFAULT NULL,
  `carId` varchar(90) DEFAULT NULL,
  `year_` varchar(90) DEFAULT NULL,
  `transmission` varchar(90) DEFAULT NULL,
  `seats` varchar(90) DEFAULT NULL,
  `price` varchar(90) DEFAULT NULL,
  `image` varchar(90) DEFAULT NULL,
  `availability` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `carName`, `carId`, `year_`, `transmission`, `seats`, `price`, `image`, `availability`) VALUES
(1, 'benz', 'Auto', '2002', 'manual', '12', '100000', 'cccc.jpg', 'available'),
(2, 'toyota', 'Auto', '2001', 'automatic', '8', '5000', 'rrr.jpg', 'not_available');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `cust_fullName` varchar(100) DEFAULT NULL,
  `cust_email` varchar(100) DEFAULT NULL,
  `cust_address` varchar(100) DEFAULT NULL,
  `cust_phone` varchar(100) DEFAULT NULL,
  `cust_password` varchar(100) DEFAULT NULL,
  `cust_age` varchar(90) DEFAULT NULL,
  `cust_gender` varchar(90) DEFAULT NULL,
  `status` varchar(90) NOT NULL,
  `image` varchar(90) NOT NULL,
  `role` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `cust_fullName`, `cust_email`, `cust_address`, `cust_phone`, `cust_password`, `cust_age`, `cust_gender`, `status`, `image`, `role`) VALUES
(1, 'natacha', 'natacha@gmail.com', 'kigali', '12345678', 'natacha', '87', 'male', 'active', 'car.jpg', ''),
(2, 'debo', 'debo@gmail.com', 'rusizi', '12345678', 'debo', '4', 'male', 'active', 'cccc.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `cust_fullName` varchar(255) NOT NULL,
  `cust_email` varchar(255) NOT NULL,
  `cust_address` varchar(255) DEFAULT NULL,
  `cust_phone` varchar(20) DEFAULT NULL,
  `cust_password` varchar(255) NOT NULL,
  `cust_age` int(11) DEFAULT NULL,
  `cust_gender` enum('male','female') DEFAULT NULL,
  `status` enum('active','non_active') DEFAULT 'active',
  `salary` decimal(10,2) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `image` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `cust_fullName`, `cust_email`, `cust_address`, `cust_phone`, `cust_password`, `cust_age`, `cust_gender`, `status`, `salary`, `department`, `image`) VALUES
(1, 'me', 'niyigenamike3@gmail.com', 'qw', '0782111552', 'dfghj', 12, 'female', 'active', 2000.00, 'accountant', 'gradle.png');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `status_` varchar(100) DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `date_` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `carId` int(11) NOT NULL,
  `carImage` varchar(255) NOT NULL,
  `customerId` int(11) NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `senderId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `carId`, `carImage`, `customerId`, `customerName`, `status`, `date`, `senderId`) VALUES
(1, 0, 'gradle.png', 0, 'me', '0', '2024-04-27 11:16:29', 1),
(2, 13, 'gradle.png', 0, 'me', '0', '2024-04-27 11:18:00', 1),
(3, 12, 'gradle.png', 0, 'me', '0', '2024-04-30 05:48:56', 1),
(4, 12, 'gradle.png', 0, 'niyigena mike', '0', '2024-04-30 06:20:14', 8),
(5, 13, 'gradle.png', 0, 'niyigena mike', '0', '2024-04-30 06:20:28', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
