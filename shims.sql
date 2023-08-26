-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 13, 2023 at 05:33 AM
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
  `height` decimal(10,0) NOT NULL,
  `temperature` decimal(10,0) NOT NULL,
  `weight` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `student_id`, `nurse_id`, `height`, `temperature`, `weight`, `created_at`) VALUES
(1, 1, 2, 222, 45, 45, NULL),
(2, 1, 2, 222, 45, 45, NULL),
(3, 1, 2, 222, 45, 45, '2023-08-12 05:15:47');

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
(2, 'Junriel', 'Ordiniza', 'Hayao', 'junriel.hayao@ustp.edu.ph', 'Male', '09386767657', 'Purok 5', 'Mobod', 'Ozamiz', 'Misamis Occidental', '7207', 'Division Nurse', ''),
(15, 'dawdawd', 'awdwad', 'wadawdaw', 'a@a.c', 'Male', 'dawdwadw', 'dawdwad', 'awdwadwa', 'Tangub', 'Misamis Occidental', 'wadwa', 'School Nurse', ''),
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
(35, 'Junriel', 'Ordiniza', 'Hayao', 'junriel.hayao@ustp.edu.ph', 'Male', '09386767657', 'Purok 5', 'Mobod', '', 'Misamis Occidental', '7207', '', '');

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
(1, 'Junriek', 'Ordiniza', 'Hayao', 'Male', '2023-08-23', '+639386767657', 'junriel.hayao@ustp.edu.ph', 'Elma Hayao', 'Purok 5', 'Mobod', 'Ozamiz', 'Misamis Occidental', '7207', 3),
(3, 'Junriek', 'Ordiniza', 'Hayao', 'Male', '2023-08-23', '+639386767658', 'junriel.hayao@ustp.edu.ph', 'Elma Hayao', 'Purok 5', 'Mobod', 'Ozamiz', 'Misamis Occidental', '7207', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nurse_id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`firstname`);

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
  ADD UNIQUE KEY `nurse_id` (`nurse_id`),
  ADD UNIQUE KEY `username` (`username`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

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
  ADD CONSTRAINT `information_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

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
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`nurse_id`) REFERENCES `nurse` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
