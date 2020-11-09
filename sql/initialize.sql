-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2020 at 06:22 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itdp`
--
CREATE DATABASE IF NOT EXISTS `itdp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `itdp`;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `attendance_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `attendance_status_code` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_status_code` int(11) NOT NULL,
  `event_type_code` int(11) NOT NULL,
  `event_start_date` datetime NOT NULL,
  `event_end_date` datetime NOT NULL,
  `number_of_participants` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `total_cost` float NOT NULL,
  `comments` text NOT NULL,
  `other_details` text NOT NULL,
  `event_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedback_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `committee_lead_id` int(11) NOT NULL,
  `participant_id` int(11) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `has_teams`
--

CREATE TABLE `has_teams` (
  `has_team_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `participant_id` int(11) NOT NULL,
  `team_role_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ref_attendance_status`
--

CREATE TABLE `ref_attendance_status` (
  `attendance_status_code` int(11) NOT NULL,
  `attendance_status_name` varchar(256) NOT NULL,
  `attendance_status_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ref_event_status`
--

CREATE TABLE `ref_event_status` (
  `event_status_code` int(11) NOT NULL,
  `event_status_description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ref_event_types`
--

CREATE TABLE `ref_event_types` (
  `event_type_code` int(11) NOT NULL,
  `event_type_description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ref_team_roles`
--

CREATE TABLE `ref_team_roles` (
  `team_role_code` int(11) NOT NULL,
  `team_role_description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ref_user_roles`
--

CREATE TABLE `ref_user_roles` (
  `user_role` int(11) NOT NULL,
  `user_role_name` varchar(256) NOT NULL,
  `user_role_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `user_first_name` varchar(256) NOT NULL,
  `user_last_name` text NOT NULL,
  `user_password` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_gender` varchar(256) NOT NULL,
  `user_role_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `user_id` (`user_id`,`attendance_status_code`),
  ADD KEY `attendance_status_code` (`attendance_status_code`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `event_status_code` (`event_status_code`,`event_type_code`),
  ADD KEY `event_type_code` (`event_type_code`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `team_id` (`team_id`,`event_id`,`committee_lead_id`,`participant_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `has_teams`
--
ALTER TABLE `has_teams`
  ADD PRIMARY KEY (`has_team_id`),
  ADD KEY `team_id` (`team_id`,`participant_id`,`team_role_code`),
  ADD KEY `team_role_code` (`team_role_code`);

--
-- Indexes for table `ref_attendance_status`
--
ALTER TABLE `ref_attendance_status`
  ADD PRIMARY KEY (`attendance_status_code`);

--
-- Indexes for table `ref_event_status`
--
ALTER TABLE `ref_event_status`
  ADD PRIMARY KEY (`event_status_code`);

--
-- Indexes for table `ref_event_types`
--
ALTER TABLE `ref_event_types`
  ADD PRIMARY KEY (`event_type_code`);

--
-- Indexes for table `ref_team_roles`
--
ALTER TABLE `ref_team_roles`
  ADD PRIMARY KEY (`team_role_code`);

--
-- Indexes for table `ref_user_roles`
--
ALTER TABLE `ref_user_roles`
  ADD PRIMARY KEY (`user_role`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_role_code` (`user_role_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `has_teams`
--
ALTER TABLE `has_teams`
  MODIFY `has_team_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_attendance_status`
--
ALTER TABLE `ref_attendance_status`
  MODIFY `attendance_status_code` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_event_status`
--
ALTER TABLE `ref_event_status`
  MODIFY `event_status_code` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_event_types`
--
ALTER TABLE `ref_event_types`
  MODIFY `event_type_code` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_team_roles`
--
ALTER TABLE `ref_team_roles`
  MODIFY `team_role_code` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_user_roles`
--
ALTER TABLE `ref_user_roles`
  MODIFY `user_role` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `attendances_ibfk_2` FOREIGN KEY (`attendance_status_code`) REFERENCES `ref_attendance_status` (`attendance_status_code`),
  ADD CONSTRAINT `attendances_ibfk_3` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`event_status_code`) REFERENCES `ref_event_status` (`event_status_code`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`event_type_code`) REFERENCES `ref_event_types` (`event_type_code`);

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`);

--
-- Constraints for table `has_teams`
--
ALTER TABLE `has_teams`
  ADD CONSTRAINT `has_teams_ibfk_1` FOREIGN KEY (`team_role_code`) REFERENCES `ref_team_roles` (`team_role_code`),
  ADD CONSTRAINT `has_teams_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `teams` (`team_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_role_code`) REFERENCES `ref_user_roles` (`user_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
