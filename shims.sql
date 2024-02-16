-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 16, 2024 at 06:13 AM
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
-- Database: `shims`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkup`
--

CREATE TABLE `checkup` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `nurse_id` int(11) NOT NULL,
  `temperature` float NOT NULL,
  `height` float NOT NULL,
  `weight` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `district_name` varchar(45) NOT NULL,
  `address` varchar(255) NOT NULL,
  `division_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `district_name`, `address`, `division_id`) VALUES
(2, 'Dist1', 'Dist1', 2),
(3, 'test', 'test', 4);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `id` int(11) NOT NULL,
  `division_name` varchar(45) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id`, `division_name`, `address`) VALUES
(2, 'test2', 'testdawd'),
(4, 'Div1', 'DIv1');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `section` varchar(20) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `nurse_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `height` decimal(10,0) NOT NULL,
  `temperature` decimal(10,0) NOT NULL,
  `weight` decimal(10,0) NOT NULL,
  `findings` text NOT NULL,
  `prescription` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `student_id`, `nurse_id`, `school_id`, `height`, `temperature`, `weight`, `findings`, `prescription`, `created_at`) VALUES
(1, 3, 5, 1, 45, 45, 45, '<ol><li>dwadawawdawd</li></ol>', '<ol><li>dawdawdawdaw</li></ol>', '2023-11-12 00:24:00'),
(2, 3, 15, 1, 45, 45, 45, '<ol><li>dawdawd</li></ol>', '<ol><li>dawdawdaw</li></ol>', '2023-11-13 00:02:06'),
(3, 1, 5, 3, 45, 35, 42, '<ol><li>dwadawdawdawd</li><li>dawdawdaw</li></ol>', '<ol><li>dawdawdawd</li><li>adwdawdwa</li></ol>', '2023-11-13 00:05:15'),
(4, 1, 5, 3, 24, 23, 45, '<ol><li>dawdawdawdawd</li></ol>', '<ol><li>dawdawdawd</li></ol>', '2023-11-13 01:18:46'),
(5, 50, 5, 3, 24, 23, 45, '<ol><li>dawdawdawdawd</li></ol>', '<ol><li>dawdawdawd</li></ol>', '2023-11-13 01:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `id` int(11) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `middlename` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sex` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL,
  `street` varchar(45) NOT NULL,
  `barangay` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `province` varchar(45) NOT NULL,
  `postal` varchar(45) NOT NULL,
  `nurse_type` varchar(45) NOT NULL,
  `assigned` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`id`, `firstname`, `middlename`, `lastname`, `email`, `sex`, `contact`, `street`, `barangay`, `city`, `province`, `postal`, `nurse_type`, `assigned`) VALUES
(5, 'Junriel', 'Ordiniza', 'Hayao', 'junriel.hayao@ustp.edu.ph', 'Male', '09386767657', 'Purok 5', 'Mobod', 'Ozamiz', 'Misamis Occidental', '7207', 'School Nurse', '3'),
(15, 'dawdawd', 'awdwad', 'wadawdaw', 'liernuj25@gmail.com', 'Female', 'dawdwadw', 'dawdwad', 'awdwadwa', 'Ozamiz', 'Misamis Occidental', '7211', '', ''),
(16, 'dawdawd', 'awdwad', 'wadawdaw', 'a@a.c', 'Male', 'dawdwadw', 'dawdwad', 'awdwadwa', 'Oroquieta', 'Misamis Occidental', 'wadwa', 'School Nurse', ''),
(18, 'Junriel', 'Ordiniza', 'Hayao', 'junriel.hayao@ustp.edu.ph', 'Male', '09386767657', 'Purok 5', 'Mobod', 'Oroquieta', 'Misamis Occidental', '72078', 'School Nurse', ''),
(19, 'Junriel', 'Ordiniza', 'Hayao', 'junriel.hayao@ustp.edu.ph', '1', '09386767657', 'Purok 5', 'Mobod', 'Oroquieta', 'Misamis Occidental', '72078', 'School Nurse', ''),
(20, 'Junriel', 'Ordiniza', 'Hayao', 'junriel.hayao@ustp.edu.ph', 'Male', '09386767657', 'Purok 5', 'Mobod', 'Oroquieta', 'Misamis Occidental', '72078', 'School Nurse', ''),
(21, 'Junriel', 'Ordiniza', 'Hayao', 'junriel.hayao@ustp.edu.ph', 'Male', '09386767657', 'Purok 5', 'Mobod', 'Oroquieta', 'Misamis Occidental', '72078', 'School Nurse', ''),
(22, 'Junriel', 'Ordiniza', 'Hayao', 'junriel.hayao@ustp.edu.ph', 'Male', '09386767657', 'Purok 5', 'Mobod', 'Oroquieta', 'Misamis Occidental', '72078', 'School Nurse', ''),
(23, 'Junriel', 'Ordiniza', 'Hayao', 'junriel.hayao@ustp.edu.ph', 'Male', '09386767657', 'Purok 5', 'Mobod', 'Oroquieta', 'Misamis Occidental', '72078', 'School Nurse', ''),
(24, 'Junriel', 'Ordiniza', 'Hayao', 'junriel.hayao@ustp.edu.ph', 'Male', '09386767657', 'Purok 5', 'Mobod', 'Oroquieta', 'Misamis Occidental', '72078', 'School Nurse', ''),
(25, 'Junriel', 'Ordiniza', 'Hayao', 'junriel.hayao@ustp.edu.ph', 'Male', '09386767657', 'Purok 5', 'Mobod', 'Oroquieta', 'Misamis Occidental', '72078', 'School Nurse', ''),
(26, 'Junriel', 'Ordiniza', 'Hayao', 'junriel.hayao@ustp.edu.ph', 'Male', '09386767657', 'Purok 5', 'Mobod', 'Oroquieta', 'Misamis Occidental', '72078', 'School Nurse', ''),
(27, 'Junriel', 'Ordiniza', 'Hayao', 'junriel.hayao@ustp.edu.ph', 'Male', '09386767657', 'Purok 5', 'Mobod', 'Oroquieta', 'Misamis Occidental', '72078', 'School Nurse', ''),
(28, 'Junriel', 'Ordiniza', 'Hayao', 'junriel.hayao@ustp.edu.ph', 'Male', '09386767657', 'Purok 5', 'Mobod', 'Oroquieta City', 'Misamis Occidental', '7207', 'Admin', ''),
(29, 'Junriel', 'Ordiniza', 'Hayao', 'junriel.hayao@ustp.edu.ph', 'Male', '09386767657', 'Purok 5', 'Mobod', 'Oroquieta City', 'Misamis Occidental', '7207', 'Admin', ''),
(30, 'Junriel', 'Ordiniza', 'Hayao', 'junriel.hayao@ustp.edu.ph', 'Male', '09386767657', 'Purok 5', 'Mobod', 'Oroquieta', 'Misamis Occidental', '72078', 'School Nurse', ''),
(31, 'Junriel', 'Ordiniza', 'Hayao', 'junriel.hayao@ustp.edu.ph', 'Male', '09386767657', 'Purok 5', 'Mobod', 'Oroquieta', 'Misamis Occidental', '72078', 'School Nurse', ''),
(32, 'Junriel', 'Ordiniza', 'Hayao', 'junriel.hayao@ustp.edu.ph', 'Male', '09386767657', 'Purok 5', 'Mobod', 'Tangub', 'Misamis Occidental', '7207', 'School Nurse', ''),
(33, 'Junriel', 'Ordiniza', 'Hayao', 'junriel.hayao@ustp.edu.ph', 'Male', '09386767657', 'Purok 5', 'Mobod', 'Tangub', 'Misamis Occidental', '7207', 'School Nurse', ''),
(35, 'Junriel', 'Ordiniza', 'Hayao', 'junriel.hayao@ustp.edu.ph', 'Male', '09386767657', 'Purok 5', 'Mobod', '', 'Misamis Occidental', '7207', '', ''),
(37, 'Genelyn', 'Cajan', 'Naquira', 'a@a.com', 'Male', '09176721014', 'Purok 3', 'Looc', 'Plaridel', 'Misamis Occidental', '7209', 'Division Nurse', '2'),
(38, 'test', 'test', 'test', 'junriel.hayao@ustp.edu.ph', 'Male', '3121212121', 'test', 'test', 'Tangub', 'Misamis Occidental', 'test', 'School Nurse', '1'),
(39, 'jun', 'jun', 'jun', 'liernuj25@gmail.com', 'Male', 'adawadawdaw', 'jun', 'jun', 'Tangub', 'Misamis Occidental', 'jun', 'School Nurse', '3'),
(40, 'jun', 'jun', 'jun', 'liernuj25@gmail.com', 'Male', 'adawadawdaw', 'jun', 'jun', 'Tangub', 'Misamis Occidental', 'jun', 'School Nurse', '3'),
(41, 'jun', 'jun', 'jun', 'liernuj25@gmail.com', 'Male', 'adawadawdaw', 'jun', 'jun', 'Tangub', 'Misamis Occidental', 'jun', 'School Nurse', '3'),
(42, 'jun', 'jun', 'jun', 'liernuj25@gmail.com', 'Male', 'adawadawdaw', 'jun', 'jun', 'Tangub', 'Misamis Occidental', 'jun', 'School Nurse', '3'),
(43, 'jun', 'jun', 'jun', 'liernuj25@gmail.com', 'Male', 'adawadawdaw', 'jun', 'jun', 'Tangub', 'Misamis Occidental', 'jun', 'School Nurse', '3'),
(44, 'test', 'test', 'test', 'kathriel143@gmail.com', 'Male', '09176721014', 'daw', 'dwa', 'Tangub', 'Misamis Occidental', '23232', 'District Nurse', '2');

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `OTP` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `valid_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`id`, `user_id`, `OTP`, `created_at`, `valid_at`) VALUES
(1, 1002, 363083, '2023-11-28 08:16:24', '2023-11-28 08:21:24'),
(3, 1002, 507665, '2023-11-28 08:27:10', '2023-11-28 08:32:10'),
(4, 1002, 658063, '2023-11-29 03:09:04', '2023-11-29 03:14:04'),
(5, 1002, 233691, '2023-11-29 03:09:19', '2023-11-29 03:14:19'),
(6, 1002, 760642, '2023-11-29 07:25:40', '2023-11-29 07:30:40'),
(7, 1002, 888598, '2023-11-29 07:27:49', '2023-11-29 07:32:49'),
(8, 1002, 318266, '2023-11-29 07:35:03', '2023-11-29 07:40:03'),
(9, 1002, 993877, '2023-11-29 07:35:07', '2023-11-29 07:40:07'),
(10, 1002, 139946, '2023-11-29 07:50:47', '2023-11-29 07:55:47'),
(11, 1002, 972129, '2023-11-29 07:50:50', '2023-11-29 07:55:50'),
(12, 1002, 517291, '2023-11-30 00:11:36', '2023-11-30 00:16:36'),
(13, 1002, 810619, '2023-11-30 00:12:17', '2023-11-30 00:17:17'),
(14, 1002, 876086, '2023-11-30 00:13:54', '2023-11-30 00:18:54'),
(15, 1002, 708796, '2023-11-30 00:21:34', '2023-11-30 00:26:34'),
(16, 1002, 171675, '2023-11-30 00:22:13', '2023-11-30 00:27:13'),
(17, 1002, 535050, '2023-11-30 00:27:18', '2023-11-30 00:32:18'),
(18, 1002, 129641, '2023-11-30 01:39:38', '2023-11-30 01:44:38'),
(19, 1002, 663583, '2023-11-30 05:21:44', '2023-11-30 05:26:44'),
(20, 1002, 224749, '2023-11-30 05:28:08', '2023-11-30 05:33:08'),
(21, 1002, 925760, '2023-11-30 05:58:37', '2023-11-30 06:03:37'),
(26, 1011, 756601, '2023-11-30 06:03:13', '2023-11-30 06:08:13'),
(27, 1011, 876543, '2023-11-30 06:03:29', '2023-11-30 06:08:29'),
(28, 1020, 675091, '2023-11-30 06:14:29', '2023-11-30 06:19:29'),
(29, 1011, 395872, '2023-12-29 08:16:50', '2023-12-29 16:21:50'),
(30, 1020, 354698, '2023-12-29 08:18:47', '2023-12-29 16:23:47'),
(31, 1011, 105182, '2024-01-10 23:15:12', '2024-01-11 07:20:12'),
(32, 1011, 719639, '2024-01-10 23:15:26', '2024-01-11 07:20:26'),
(33, 1011, 206294, '2024-01-10 23:18:46', '2024-01-11 07:23:46'),
(34, 1022, 896275, '2024-01-10 23:20:13', '2024-01-11 07:25:13'),
(35, 1011, 650696, '2024-01-15 06:21:36', '2024-01-15 14:26:36'),
(36, 1011, 136856, '2024-02-16 02:41:07', '2024-02-16 10:46:07'),
(37, 1011, 523220, '2024-02-16 02:42:17', '2024-02-16 10:47:17'),
(38, 1011, 166037, '2024-02-16 02:42:39', '2024-02-16 10:47:39'),
(39, 1011, 948232, '2024-02-16 02:46:15', '2024-02-16 10:51:15'),
(40, 1020, 225016, '2024-02-16 02:48:06', '2024-02-16 10:53:06'),
(41, 1020, 431424, '2024-02-16 02:48:10', '2024-02-16 10:53:10');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `information_id` int(11) NOT NULL,
  `generated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `generated_for` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `division_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `school_name`, `address`, `division_id`, `district_id`) VALUES
(1, 'test', 'aw', 4, 3),
(3, 'school1', 'school1', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `theme` int(11) NOT NULL,
  `color` int(11) NOT NULL,
  `card` int(11) NOT NULL,
  `sidebar` int(11) NOT NULL,
  `container` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(355) NOT NULL,
  `guardian` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `postal` varchar(255) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `firstname`, `middlename`, `lastname`, `sex`, `dob`, `contact`, `email`, `guardian`, `street`, `barangay`, `city`, `province`, `postal`, `school_id`) VALUES
(1, 'Junriel', 'Ordinizas', 'Hayao', 'Male', '2023-08-23', '+639386767657', 'junriel.hayao@ustp.edu.ph', 'Elma Hayao', 'Purok 5', 'Mobod', 'Ozamiz', 'Misamis Occidental', '7207', 3),
(3, 'Junriel', 'Ordiniza', 'Hayao', 'Male', '2023-08-23', '+639386767658', 'junriel.hayao@ustp.edu.ph', 'Elma Hayao', 'Purok 5', 'Mobod', 'Ozamiz', 'Misamis Occidental', '7207', 1),
(44, 'Junriel', 'Ordiniza', 'Hayao', 'Male', '2023-11-02', '091236547', 't@t.com', 'test', 'Rose', 'Anod', 'Tangub', 'Misamis Occidental', '1234', 1),
(49, 'a', 'a', 'a', 'Male', '2023-11-29', 'a', 'c@c.c', 'a', 'a', 'a', 'Tangub', 'Misamis Occidental', 'a', 1),
(50, 'h', 'h', 'h', 'Male', '2023-12-19', 'h', 'h@h.h', 'h', 'h', 'h', 'Tangub', 'Misamis Occidental', 'dawdaw', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `account_id`, `user_type`) VALUES
(1002, 'test', '05a671c66aefea124cc08b76ea6d30bb', 15, 'nurse'),
(1010, 'test2', 'ad0234829205b9033196ba818f7a872b', 5, 'nurse'),
(1011, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, 'admin'),
(1018, 'c@c.c', '6d9eedc31525befc60af5b6dbbd9f3e5', 49, 'student'),
(1019, 'h@h.h', 'acf31b7fa7f7b831b216f01991515227', 50, 'student'),
(1020, 'liernuj25@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 42, 'nurse'),
(1022, 'kathriel143@gmail.com', '999131b39bd6ca8a10967f8b989cba5a', 44, 'nurse');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkup`
--
ALTER TABLE `checkup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division_id` (`division_id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `division_name` (`division_name`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nurse_id` (`nurse_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`firstname`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `generated_by` (`generated_by`),
  ADD KEY `generated_for` (`generated_for`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division_id` (`division_id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userId` (`userId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nurse_id` (`account_id`),
  ADD UNIQUE KEY `username` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkup`
--
ALTER TABLE `checkup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1023;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`division_id`) REFERENCES `division` (`id`);

--
-- Constraints for table `information`
--
ALTER TABLE `information`
  ADD CONSTRAINT `information_ibfk_1` FOREIGN KEY (`nurse_id`) REFERENCES `nurse` (`id`),
  ADD CONSTRAINT `information_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `information_ibfk_3` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`);

--
-- Constraints for table `otp`
--
ALTER TABLE `otp`
  ADD CONSTRAINT `otp_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`generated_by`) REFERENCES `nurse` (`id`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`generated_for`) REFERENCES `student` (`id`);

--
-- Constraints for table `school`
--
ALTER TABLE `school`
  ADD CONSTRAINT `school_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`),
  ADD CONSTRAINT `school_ibfk_2` FOREIGN KEY (`division_id`) REFERENCES `division` (`id`);

--
-- Constraints for table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `settings_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
