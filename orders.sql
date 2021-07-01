-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2021 at 10:04 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orders`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department_name` varchar(150) NOT NULL,
  `head_name` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `head_name`, `created_at`, `updated_at`) VALUES
(1, 'Biomedical', 'ahmed', '2021-03-20 00:02:44', '0000-00-00 00:00:00'),
(2, 'Electronics', 'hamdi', '2021-03-20 00:02:44', '0000-00-00 00:00:00'),
(3, 'Electricity', 'yasser', '2021-03-20 00:02:44', '0000-00-00 00:00:00'),
(4, 'Mechanics', 'mohamed', '2021-03-20 00:02:44', '0000-00-00 00:00:00'),
(5, 'Sivil', 'ali', '2021-03-20 00:02:44', '0000-00-00 00:00:00'),
(6, 'AC', 'hany', '2021-03-20 00:02:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `job_orders`
--

CREATE TABLE `job_orders` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `location` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `requester_name` varchar(150) NOT NULL,
  `department_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `telephone` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_orders`
--

INSERT INTO `job_orders` (`id`, `description`, `location`, `status`, `requester_name`, `department_id`, `user_name`, `telephone`, `created_at`, `updated_at`) VALUES
(1, ' seeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeeeseeeweeeeeeeeeeeeee', 'elmonib', 0, 'reem', 1, 'reem', '01140452296', '2021-03-14 19:18:16', '2021-03-09 10:13:57'),
(2, 'make me happy make me happy make me happy make me happy make me happy', 'elmonib', 1, 'ali', 2, 'reem', '01140452296', '2021-03-14 23:49:55', '2021-03-14 21:49:55'),
(4, 'eeeee', 'elmonib', 1, 'yyy', 2, 'reem', '01140452296', '2021-03-15 17:28:03', '2021-03-15 15:28:03'),
(5, 'eeee', 'elmonib', 1, 'ee', 2, 'reem', '01140452296', '2021-03-15 17:32:28', '2021-03-15 15:32:28'),
(6, 'g', 'elmonib', 1, 'yyy', 2, 'reem', '01140452296', '2021-03-15 17:39:12', '2021-03-15 15:39:12'),
(7, 'oui', 'elmonib', 0, 'q', 2, 'reem', '01140452296', '2021-03-15 12:28:49', '2021-03-15 12:28:49'),
(8, 'qqq', 'elmonib', 1, 'qq', 2, 'reem', '01140452296', '2021-03-15 17:27:08', '2021-03-15 15:27:08'),
(9, 'r', 'elmonib', 1, 'reem yasser', 2, 'reem', '01140452296', '2021-03-15 17:35:49', '2021-03-15 15:35:49'),
(10, 'ewr', 'elmonib', 0, 'rahms', 2, 'reem', '01140452296', '2021-03-15 12:35:57', '2021-03-15 12:35:57'),
(11, '444444444444444', 'elmonib', 1, 'yyyyyyyyyyyyyyyyyyyyyyyyyyyy', 2, 'reem', '011404522964444444444', '2021-03-15 17:35:10', '2021-03-15 15:35:10'),
(12, 'd', 'elmonib', 1, 'yyy', 2, 'reem', '01140452296', '2021-03-15 17:35:04', '2021-03-15 15:35:04'),
(13, 'a', 'elmonib', 0, 'ana', 2, 'reem', '01140452296', '2021-03-15 12:59:05', '2021-03-15 12:59:05'),
(14, 'gg', 'elmonib', 1, 'ali', 2, 'reem', '01140452296', '2021-03-15 17:37:03', '2021-03-15 15:37:03'),
(15, 'h am happy', 'elmonib', 1, 'ahmed yasser', 2, 'reem', '01110202303', '2021-03-15 17:38:06', '2021-03-15 15:38:06'),
(16, 'sd', 'elmonib', 1, 'ahmed faseh', 2, 'reem', '011404522964444444444', '2021-03-15 17:36:51', '2021-03-15 15:36:51'),
(17, 'a', 'elmonib', 0, 'yyy', 1, 'reem1', '01140452296', '2021-03-19 20:58:49', '2021-03-19 20:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `technicians`
--

CREATE TABLE `technicians` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `job_of_number` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `technicians`
--

INSERT INTO `technicians` (`id`, `name`, `job_of_number`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'ali', 3, 1, '2021-03-14 19:11:40', '0000-00-00 00:00:00'),
(2, 'ahmed', 7, 2, '2021-03-15 19:15:45', '2021-03-15 17:15:45'),
(3, 'yasser', 4, 1, '2021-03-14 19:42:41', '0000-00-00 00:00:00'),
(4, 'rahma', 0, 1, '2021-03-15 17:38:19', '2021-03-15 17:38:19');

-- --------------------------------------------------------

--
-- Table structure for table `techni_job`
--

CREATE TABLE `techni_job` (
  `id` int(11) NOT NULL,
  `techni_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `techni_job`
--

INSERT INTO `techni_job` (`id`, `techni_id`, `job_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-03-14 19:12:22', '0000-00-00 00:00:00'),
(2, 1, 2, '2021-03-14 19:12:22', '0000-00-00 00:00:00'),
(3, 3, 1, '2021-03-14 19:43:27', '0000-00-00 00:00:00'),
(4, 2, 8, '2021-03-15 17:26:29', '2021-03-15 17:26:29'),
(5, 3, 8, '2021-03-15 17:26:29', '2021-03-15 17:26:29'),
(6, 2, 4, '2021-03-15 19:13:13', '2021-03-15 19:13:13'),
(7, 2, 6, '2021-03-15 19:15:08', '2021-03-15 19:15:08'),
(8, 2, 9, '2021-03-15 19:15:45', '2021-03-15 19:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `role`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'reem', '12345', 1, 1, '2021-03-16 21:04:43', '0000-00-00 00:00:00'),
(2, 'reem1', '123', 0, 1, '2021-03-16 20:45:36', '2021-03-16 20:45:36'),
(3, 'ahmed', '111', 0, 2, '2021-03-19 21:01:52', '0000-00-00 00:00:00'),
(4, 'remo', '444', 1, 2, '2021-03-19 21:02:32', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_orders`
--
ALTER TABLE `job_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technicians`
--
ALTER TABLE `technicians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `techni_job`
--
ALTER TABLE `techni_job`
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
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_orders`
--
ALTER TABLE `job_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `technicians`
--
ALTER TABLE `technicians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `techni_job`
--
ALTER TABLE `techni_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
