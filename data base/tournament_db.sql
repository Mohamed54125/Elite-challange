-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2024 at 08:20 PM
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
-- Database: `tournament_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'root', '$2y$10$mQZl4jfFf6yaP4PX2nrwWeT0vx5OfqAFiD/na88WmkTFuX8Ya4gHe', 'root@gmail.com', '2024-10-24 10:14:46'),
(2, 'ali', '$2y$10$dp3vSUxBMF4Nl1WQ3oky8.hldJH9SR4O4qG0jS0tXARbqaSrS5XM2', 'ali@gmail.com', '2024-10-24 19:13:07'),
(3, 'mondy', '$2y$10$iUWD/i9I/UAcBgg8LRvnfOIJxII/1MRfe2snizTueYdmNRTkIiSvW', 'mondymohamed072@gmail.com', '2024-10-24 22:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE `group_members` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `member1` varchar(255) DEFAULT NULL,
  `member2` varchar(255) DEFAULT NULL,
  `member3` varchar(255) DEFAULT NULL,
  `member4` varchar(255) DEFAULT NULL,
  `member5` varchar(255) DEFAULT NULL,
  `registration_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_members`
--

INSERT INTO `group_members` (`id`, `group_name`, `member1`, `member2`, `member3`, `member4`, `member5`, `registration_date`) VALUES
(1, 'team3', 'member1', 'member2', 'member3', 'member4', 'member5', '2024-10-24 18:44:54'),
(2, 'admingroup', 'member2', 'member2', 'member2', 'member2', 'member2', '2024-10-24 21:19:04'),
(3, 'sameh group', 'member2', 'member2', 'member2', 'member2', '', '2024-10-24 21:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `username`, `category`, `score`, `created_at`) VALUES
(1, 'mondy', 'Science Challenge', 0, '2024-10-24 22:43:55'),
(2, 'mondy', 'Programming Challenge', 1, '2024-10-24 22:43:55'),
(3, 'mondy', 'Math Challenge', 2, '2024-10-24 22:43:55'),
(4, 'mondy', 'History Challenge', 0, '2024-10-24 22:43:55'),
(5, 'mondy', 'Football Challenge', 0, '2024-10-24 22:43:55'),
(6, 'mondy', 'Geography Challenge', 6, '2024-10-24 22:43:55'),
(7, 'admin1', 'Science Challenge', 6, '2024-10-24 22:43:55'),
(8, 'admin1', 'Science Challenge', 1, '2024-10-24 22:43:55'),
(9, 'admin1', 'Programming Challenge', 2, '2024-10-24 22:43:55'),
(10, 'admin1', 'Programming Challenge', 1, '2024-10-24 22:43:55'),
(11, 'admin1', 'Programming Challenge', 1, '2024-10-24 23:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `participate_as` enum('individual','group') NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `participate_as`, `group_name`, `created_at`) VALUES
(1, 'mondy', 'mondymohamed072@gmail.com', '$2y$10$agIBW.YdZ8Ug1i6HZD3WMux3JEBmsUekadHmzMfl0sqXxEisHYm02', 'group', 'team3', '2024-10-24 22:44:32'),
(2, 'admin1', 'admin@gmail.com', '$2y$10$gmoJBEaTg2Huv.5Jb86Po.SK.3chj.qttO6NbVqAgKsmpYEiUDYfq', 'group', 'admingroup', '2024-10-24 22:44:32'),
(3, 'sameh', 'sameh@gmail.com', '$2y$10$fy/fNoiVYDx4410vSCCevu7lf2ZcE5XhvkXbALxjvq2tsPqGcQ71q', 'group', 'sameh group', '2024-10-24 22:44:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
