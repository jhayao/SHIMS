-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 27, 2024 at 02:23 PM
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
-- Stand-in structure for view `combined_accounts`
-- (See below for the actual view)
--
CREATE TABLE `combined_accounts` (
`id` int(11)
,`firstname` varchar(255)
,`middlename` varchar(255)
,`lastname` varchar(255)
,`email` varchar(355)
,`role` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `district_name` varchar(45) NOT NULL,
  `address` varchar(255) NOT NULL,
  `division_id` int(11) NOT NULL,
  `archived` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `id` int(11) NOT NULL,
  `division_name` varchar(45) NOT NULL,
  `address` varchar(255) NOT NULL,
  `archived` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `BMI` varchar(50) NOT NULL,
  `heart_rate` varchar(50) NOT NULL,
  `height_for_age` varchar(50) NOT NULL,
  `vision_screening` varchar(50) NOT NULL,
  `auditory_screening` varchar(50) NOT NULL,
  `skin_scalp` varchar(50) NOT NULL,
  `eyes_ear_nose` varchar(50) NOT NULL,
  `mouth_throat_neck` varchar(50) NOT NULL,
  `lungs_heart` varchar(50) NOT NULL,
  `abdomen` varchar(50) NOT NULL,
  `deformities` varchar(50) NOT NULL,
  `immunization` varchar(50) NOT NULL,
  `iron_supplementation` tinyint(4) NOT NULL,
  `deworming` tinyint(4) NOT NULL,
  `sbfp_beneficiary` tinyint(4) NOT NULL,
  `fourps_beneficiary` tinyint(4) NOT NULL,
  `menarche` tinyint(4) NOT NULL,
  `others` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `system_log` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `nurse_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned` varchar(255) NOT NULL,
  `archived` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `district_id` int(11) NOT NULL,
  `archived` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `school_assigned`
-- (See below for the actual view)
--
CREATE TABLE `school_assigned` (
`id` varchar(255)
,`nurse_id` varchar(11)
,`user_id` int(11)
);

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
  `school_id` int(11) NOT NULL,
  `archived` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_accounts`
-- (See below for the actual view)
--
CREATE TABLE `user_accounts` (
`id` int(11)
,`fullname` varchar(94)
,`assigned` varchar(255)
,`role` varchar(255)
,`email` varchar(255)
,`assignment` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `combined_accounts`
--
DROP TABLE IF EXISTS `combined_accounts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `combined_accounts`  AS SELECT `nurse_accounts`.`id` AS `id`, `nurse_accounts`.`firstname` AS `firstname`, `nurse_accounts`.`middlename` AS `middlename`, `nurse_accounts`.`lastname` AS `lastname`, `nurse_accounts`.`email` AS `email`, `nurse_accounts`.`role` AS `role` FROM (select `u`.`id` AS `id`,`n`.`firstname` AS `firstname`,`n`.`middlename` AS `middlename`,`n`.`lastname` AS `lastname`,`n`.`email` AS `email`,`n`.`nurse_type` AS `role` from (`users` `u` join `nurse` `n` on(`n`.`id` = `u`.`account_id`)) where `u`.`user_type` = 'nurse') AS `nurse_accounts`union select `student_accounts`.`id` AS `id`,`student_accounts`.`firstname` AS `firstname`,`student_accounts`.`middlename` AS `middlename`,`student_accounts`.`lastname` AS `lastname`,`student_accounts`.`email` AS `email`,`student_accounts`.`role` AS `role` from (select `u`.`id` AS `id`,`n`.`firstname` AS `firstname`,`n`.`middlename` AS `middlename`,`n`.`lastname` AS `lastname`,`n`.`email` AS `email`,'student' AS `role` from (`users` `u` join `student` `n` on(`n`.`id` = `u`.`account_id`)) where `u`.`user_type` = 'student') `student_accounts` union select `admin_account`.`id` AS `id`,`admin_account`.`firstname` AS `firstname`,`admin_account`.`middlename` AS `middlename`,`admin_account`.`lastname` AS `lastname`,`admin_account`.`email` AS `email`,`admin_account`.`role` AS `role` from (select `u`.`id` AS `id`,'Admin' AS `firstname`,'' AS `middlename`,'' AS `lastname`,`u`.`email` AS `email`,'admin' AS `role` from `users` `u` where `u`.`user_type` = 'admin' limit 1) `admin_account`  ;

-- --------------------------------------------------------

--
-- Structure for view `school_assigned`
--
DROP TABLE IF EXISTS `school_assigned`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `school_assigned`  AS SELECT `final_result`.`assigned_count` AS `id`, `final_result`.`nurse_id` AS `nurse_id`, `final_result`.`id` AS `user_id` FROM (select `result`.`assigned` AS `assigned_count`,`result`.`nurse_id` AS `nurse_id`,`users`.`id` AS `id` from ((select `user_accounts`.`assigned` AS `assigned`,`user_accounts`.`id` AS `nurse_id` from `user_accounts` where `user_accounts`.`role` = 'School Nurse' union select `school`.`id` AS `assigned`,`user_accounts`.`id` AS `nurse_id` from (`school` join `user_accounts` on(`school`.`district_id` = `user_accounts`.`assigned`)) where `user_accounts`.`role` = 'District Nurse' union select `school`.`id` AS `assigned`,`user_accounts`.`id` AS `nurse_id` from (`school` join `user_accounts` on(`school`.`division_id` = `user_accounts`.`assigned`)) where `user_accounts`.`role` = 'Division Nurse') `result` join `users` on(`users`.`account_id` = `result`.`nurse_id`)) union all select `student`.`id` AS `assigned_count`,'0' AS `nurse_id`,(select `users`.`id` from `users` where `users`.`user_type` = 'admin' limit 1) AS `id` from `student`) AS `final_result` ORDER BY `final_result`.`nurse_id` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `user_accounts`
--
DROP TABLE IF EXISTS `user_accounts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_accounts`  AS SELECT `school_nurse`.`id` AS `id`, `school_nurse`.`fullname` AS `fullname`, `school_nurse`.`assigned` AS `assigned`, `school_nurse`.`role` AS `role`, `school_nurse`.`email` AS `email`, `school_nurse`.`assignment` AS `assignment` FROM (select `n`.`id` AS `id`,concat(`n`.`firstname`,' ',substr(`n`.`middlename`,1,1),'. ',`n`.`lastname`) AS `fullname`,`n`.`assigned` AS `assigned`,`n`.`nurse_type` AS `role`,`n`.`email` AS `email`,`s`.`school_name` AS `assignment` from (`nurse` `n` join `school` `s` on(`s`.`id` = `n`.`assigned`)) where `n`.`nurse_type` = 'School Nurse') AS `school_nurse`union select `district_nurse`.`id` AS `id`,`district_nurse`.`fullname` AS `fullname`,`district_nurse`.`assigned` AS `assigned`,`district_nurse`.`role` AS `role`,`district_nurse`.`email` AS `email`,`district_nurse`.`assignment` AS `assignment` from (select `n`.`id` AS `id`,concat(`n`.`firstname`,' ',substr(`n`.`middlename`,1,1),' ',`n`.`lastname`) AS `fullname`,`n`.`assigned` AS `assigned`,`n`.`nurse_type` AS `role`,`n`.`email` AS `email`,`d`.`district_name` AS `assignment` from (`nurse` `n` join `district` `d` on(`d`.`id` = `n`.`assigned`)) where `n`.`nurse_type` = 'District Nurse') `district_nurse` union select `division_nurse`.`id` AS `id`,`division_nurse`.`fullname` AS `fullname`,`division_nurse`.`assigned` AS `assigned`,`division_nurse`.`role` AS `role`,`division_nurse`.`email` AS `email`,`division_nurse`.`assignment` AS `assignment` from (select `n`.`id` AS `id`,concat(`n`.`firstname`,' ',substr(`n`.`middlename`,1,1),' ',`n`.`lastname`) AS `fullname`,`n`.`assigned` AS `assigned`,`n`.`nurse_type` AS `role`,`n`.`email` AS `email`,`d`.`division_name` AS `assignment` from (`nurse` `n` join `division` `d` on(`d`.`id` = `n`.`assigned`)) where `n`.`nurse_type` = 'Division Nurse') `division_nurse`  ;

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
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
