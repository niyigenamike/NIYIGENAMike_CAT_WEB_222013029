-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 10:56 PM
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
-- Database: `schooladministrationsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `full_name` varchar(90) DEFAULT NULL,
  `age` varchar(90) DEFAULT NULL,
  `department` varchar(90) DEFAULT NULL,
  `salary` varchar(90) DEFAULT NULL,
  `address` varchar(90) DEFAULT NULL,
  `gender` varchar(90) DEFAULT NULL,
  `user_image` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `full_name`, `age`, `department`, `salary`, `address`, `gender`, `user_image`) VALUES
(2, 'e', '3', '3', '3', '3', 'female', 'images/pixlr-image-generator-cfaea94b-5cd8-40a2-9170-8ed3b4aad732.png'),
(3, 'w', '23', 'e', '3', 'e', 'female', 'images/pixlr-image-generator-2ab021c4-1128-4c6d-a4f6-cdc3d86936fc.png'),
(4, 'w', '2', 'w', '2', 'w', 'female', 'images/pixlr-image-generator-b0633b7a-6faa-4ee6-ba43-f449e483a655.png'),
(5, 'kadi', '9', 'kadi', 'kadi', 'kadi', 'female', 'images/pixlr-image-generator-2ab021c4-1128-4c6d-a4f6-cdc3d86936fc.png');

-- --------------------------------------------------------

--
-- Table structure for table `hostels`
--

CREATE TABLE `hostels` (
  `id` int(11) NOT NULL,
  `hostel_name` varchar(90) DEFAULT NULL,
  `hostel_rooms` varchar(90) DEFAULT NULL,
  `hostel_gender` varchar(90) DEFAULT NULL,
  `user_image` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hostels`
--

INSERT INTO `hostels` (`id`, `hostel_name`, `hostel_rooms`, `hostel_gender`, `user_image`) VALUES
(2, 'new', '90', 'new', ''),
(7, 'mike3', '45', 'male', ''),
(9, 'w', '2', 'w', ''),
(10, 'this', '78', 'boys', ''),
(11, 'ben', '90', 'bo', '');

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `id` int(11) NOT NULL,
  `fullname` varchar(90) DEFAULT NULL,
  `age` varchar(90) DEFAULT NULL,
  `degree` varchar(90) DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL,
  `gender` varchar(90) DEFAULT NULL,
  `user_image` varchar(90) DEFAULT NULL,
  `address` varchar(90) DEFAULT NULL,
  `password` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`id`, `fullname`, `age`, `degree`, `email`, `gender`, `user_image`, `address`, `password`) VALUES
(4, 'peace', '9', 'phd', 'ndereya@gmail', 'male', 'images/irembo2.jpg', 'rusizi', '$2y$10$38qPui/pN8utFxELBolX1OOH0p9fVkchDuG/vokXZFaWM7YBg681C'),
(5, 'addData2', '90', 'phd', 'uwasemcoco@gmail.com', 'male', 'images/car.jpg', 'addData2', '$2y$10$fazWnTx.4v8PA3vIeRfyjux5gW7d9rBPYqos1tSbqHn284bfj81E6');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `mark_id` int(11) NOT NULL,
  `lecture_id` int(11) DEFAULT NULL,
  `date_` timestamp NULL DEFAULT current_timestamp(),
  `moduleName` varchar(255) DEFAULT NULL,
  `CAT` varchar(255) DEFAULT NULL,
  `EXAM` varchar(255) DEFAULT NULL,
  `studentId` int(11) DEFAULT NULL,
  `studId` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`mark_id`, `lecture_id`, `date_`, `moduleName`, `CAT`, `EXAM`, `studentId`, `studId`) VALUES
(1, 14444, '2024-04-30 18:59:00', '1', '23', '32', 100, ''),
(2, 14444, '2024-04-30 18:59:00', '1', '23', '32', 100, ''),
(3, 14444, '2024-04-30 19:01:04', '3', '12', '12', 100, ''),
(4, 14444, '2024-04-30 19:01:04', '3', '12', '12', 100, ''),
(5, 14444, '2024-04-30 19:06:39', '6', '1', '1', 100, ''),
(6, 14444, '2024-04-30 19:06:39', '6', '1', '1', 100, ''),
(7, 14444, '2024-04-30 19:07:04', '6', '1', '1', 100, ''),
(8, 14444, '2024-04-30 19:08:25', '6', '12', '22', 100, ''),
(9, 14444, '2024-04-30 19:08:25', '6', '12', '22', 100, ''),
(10, 14444, '2024-04-30 19:08:41', '6', '12', '22', 100, '');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `module_id` int(11) NOT NULL,
  `module_code` varchar(90) DEFAULT NULL,
  `module_name` varchar(90) DEFAULT NULL,
  `lecture_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`module_id`, `module_code`, `module_name`, `lecture_id`) VALUES
(1, '11111', 'enterprenuer', 1),
(2, NULL, 'math', NULL),
(3, NULL, 'phyics', NULL),
(4, NULL, 'english', NULL),
(5, NULL, 'phyilosopht', NULL),
(6, NULL, 'chemistry', NULL),
(7, NULL, '1', NULL),
(8, NULL, 'statiscs', NULL),
(9, NULL, '3', NULL),
(10, NULL, 'ikinyarwanda', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schooladmin`
--

CREATE TABLE `schooladmin` (
  `id` int(11) NOT NULL,
  `stud_fullName` varchar(90) DEFAULT NULL,
  `stud_email` varchar(90) DEFAULT NULL,
  `stud_regNumber` varchar(90) DEFAULT NULL,
  `stud_address` varchar(90) DEFAULT NULL,
  `stud_hostelStatus` varchar(90) DEFAULT NULL,
  `stud_password` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schooladmin`
--

INSERT INTO `schooladmin` (`id`, `stud_fullName`, `stud_email`, `stud_regNumber`, `stud_address`, `stud_hostelStatus`, `stud_password`) VALUES
(1, 'mike', 'mike', '1234546', 'mike', 'mike', 'mike');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `fullname` varchar(90) DEFAULT NULL,
  `age` varchar(90) DEFAULT NULL,
  `regnumber` varchar(90) DEFAULT NULL,
  `department` varchar(90) DEFAULT NULL,
  `address` varchar(90) DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL,
  `password` varchar(90) DEFAULT NULL,
  `gender` varchar(90) DEFAULT NULL,
  `user_image` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fullname`, `age`, `regnumber`, `department`, `address`, `email`, `password`, `gender`, `user_image`) VALUES
(9, 'mike0', '90', '1234', 'mine', '1', 'niyigenamike3@gmail.com', '$2y$10$KkQMNkqJL8VneQwFKjAw2edHqDUTrT6HmlxUDniCPV1Xs2/T.AvsO', 'female', 'images/pixlr-image-generator-6878b38c-ef24-4992-9d1d-0d2b81c4ce66.png'),
(10, 'mikew', '90', '1234', 'mine', '1', 'niyigenamike3@gmail.com', '$2y$10$1XCrxxE5LgLNcgPK/X9A.uKkwwdqlj7hYWG3bDJN6G1WnR8ExdcYS', 'female', 'images/pixlr-image-generator-6613f52c9f22fd5196b2e530.png'),
(11, 'mzx', '90', '1234', 'mine', '1', 'niyigenamike3@gmail.com', '$2y$10$8HDZC.g4a//KANjMWObsi.ab2P.Cf8tKnpi5Jy2SuKjKwGYIqsNuW', 'female', 'images/kora.png'),
(12, 'w', '3', '3', 'w', 'w', 'akarizaesther0@gmail.com', '$2y$10$b.q.nZUXrhKFT0QEZdMdMutbotko1TB6J84UdDgjBzYUaihz0R2Gi', 'female', 'images/like.png'),
(13, 'w', '3', '4', 'e', 'e', 'uwasemcoco@gmail.com', '$2y$10$W693SP9bE5SUuPfsnirbjOZCKBz8SdTFLrY355h79Y.xhsMSzeGja', 'female', 'images/comment.png'),
(14, 'kaliza', '56', '1234567890', 'kaliza', 'kaliza', 'akarizaesther0@gmail.com', '$2y$10$ck6qThGZwB/tJS5RtCO40OMWdPtkLiSsWxAbw1lQs1aXEXlQwFpKu', 'male', 'images/pixlr-image-generator-cfaea94b-5cd8-40a2-9170-8ed3b4aad732.png'),
(15, 'mikeDDDD', '90', '1234', 'mine', '1', 'niyigenamike3@gmail.com', '$2y$10$ub8HuLBo25j/CbYw1tzod.vIpN0XdzbqFIwh6.ZCMGzwd0tPibNVS', 'female', 'images/car.jpg'),
(16, 'joakim', '23', '1234567890', 'huye', 'huye', 'niyigenamike3@gmail.com', '$2y$10$6YuUHB8po79qKbNPa7.jLOYe/lCuZi6fueUX0FCR3Bpbax1ceNo4K', 'male', 'images/iyandikishe.png'),
(17, 'rusizi', '8', '12345678', 'rusizi', 'rusizi', 'nyabunyanaesther@gmail.com', '$2y$10$VdYBpFxjqflkfOhhTmeFcuoVEedGNFg2NJNOxdxEQiBLGefWAR4lq', 'female', 'images/car.jpg'),
(18, 'ffff', '89', '1234567890', 'hh', '90', 'mutoni@gmail.com', '$2y$10$9FGfUJJWiL/4rfBUUZTb5./acIE4sVx.dx.bCVDNWnsO.m3JqDQLu', 'female', 'images/car.jpg'),
(19, 'ak', '90', '1234', 'mine', '1', 'niyigenamike3@gmail.com', '$2y$10$f5A4VtjfXj7wo82hUP/vCu6Ir2oqhms8fNdPAakTM6xrMQtt8HjQ2', 'female', 'images/car.jpg'),
(20, 'm', '7', '33', '2345', 'hh', 'ndereya@gmail', '$2y$10$foUT6uF7KLzQVsS/KK6D6u69TUGkOZ5sm6Tbebx5LHyfwvfpDNhHy', 'female', 'images/car.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `username`, `password`, `last_login`, `date_added`, `date_updated`, `image`) VALUES
(1, 'niyigena', 'niyigena', 'niyigena', 'mike', '$2y$10$cs8G45R94SmlQBN9KcKdIOosQ/qjNsQ7EDsJH..7.vEfzwvsmhu66', NULL, '2024-04-24 11:36:28', '2024-04-24 11:36:28', ''),
(2, 'aaa', 'aaa', 'aaa', 'aaa', '47bce5c74f589f4867dbd57e9ca9f808', NULL, '2024-04-30 22:20:09', '2024-04-30 22:20:09', 'profile_images/car.jpg'),
(3, 'niyigena', 'niyigena', 'niyigena', 'niyigena', 'e648104d0fdc8f3080871981bef05561', NULL, '2024-04-30 22:32:35', '2024-04-30 22:32:35', 'profile_images/car.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users2`
--

CREATE TABLE `users2` (
  `id` int(11) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users22`
--

CREATE TABLE `users22` (
  `id` int(11) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users22`
--

INSERT INTO `users22` (`id`, `firstname`, `middlename`, `lastname`, `username`, `password`, `last_login`, `date_added`, `date_updated`) VALUES
(0, 'we', 'we', 'we', 'we', '$2y$10$cv0EPqN.VY0LuD1zekc.OeSD70NrhPvSFAowFcZXs/DwD/XXmP7ZO', NULL, '2024-04-24 11:40:11', '2024-04-24 11:40:11'),
(0, 'er', 'er', 'er', 'er', '$2y$10$M3vY4NQzsFdvDofjoIW52.HEU1U9ef9hNP04BOvQI48BqwTzEJoOG', NULL, '2024-04-24 11:41:44', '2024-04-24 11:41:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostels`
--
ALTER TABLE `hostels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`mark_id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `schooladmin`
--
ALTER TABLE `schooladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users2`
--
ALTER TABLE `users2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hostels`
--
ALTER TABLE `hostels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `mark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schooladmin`
--
ALTER TABLE `schooladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
