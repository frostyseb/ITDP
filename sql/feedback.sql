-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2020 at 03:30 PM
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
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` int(11) NOT NULL,
  `achivement_name` int(11) NOT NULL,
  `target_hour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `attendance_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `attendance_status_code` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `hour_attended` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`attendance_id`, `user_id`, `attendance_status_code`, `event_id`, `hour_attended`, `created_date`) VALUES
(2, 1, 1, 1, 0, NULL);

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
  `other_details` text NOT NULL,
  `event_name` varchar(256) NOT NULL,
  `total_hour_required` int(11) NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_status_code`, `event_type_code`, `event_start_date`, `event_end_date`, `number_of_participants`, `discount`, `total_cost`, `other_details`, `event_name`, `total_hour_required`, `comments`) VALUES
(1, 1, 2, '2020-11-08 23:59:59', '2020-11-09 23:59:59', 52, 0, 0, 'Hack2Hire is a holistic hiring process which allows to observe students on their problem solving skills, learnability, collaboration, empathy, team work and articulation. ', 'Hack2Hire 2020', 10, ''),
(2, 3, 2, '2020-11-12 16:42:45', '2020-11-18 16:42:45', 52, 0, 0, 'At Sungai X', 'Clean Beach 2020', 0, ''),
(4, 3, 3, '2020-11-11 10:00:00', '2020-11-11 11:00:00', 20, 0, 0, 'Venue: Gym Room', 'Gym Showroad', 0, 'This is an simple Gym Event'),
(5, 1, 1, '2020-11-09 22:47:00', '2020-11-09 23:47:00', 23, 1, 123, '123', 'Test Event', 0, '123'),
(6, 1, 1, '2020-11-17 21:48:00', '2020-11-12 19:48:00', 23, 2, 23, '23', 'Test Event 1', 0, '23');

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

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feedback_id`, `team_id`, `event_id`, `committee_lead_id`, `participant_id`, `feedback`) VALUES
(1, 0, 1, 2, 3, 'Test Feed Back Comment');

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

--
-- Dumping data for table `has_teams`
--

INSERT INTO `has_teams` (`has_team_id`, `team_id`, `participant_id`, `team_role_code`) VALUES
(3, 1, 1, 1),
(4, 1, 2, 2),
(5, 1, 3, 1),
(6, 1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_attendance_status`
--

CREATE TABLE `ref_attendance_status` (
  `attendance_status_code` int(11) NOT NULL,
  `attendance_status_name` varchar(256) NOT NULL,
  `attendance_status_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_attendance_status`
--

INSERT INTO `ref_attendance_status` (`attendance_status_code`, `attendance_status_name`, `attendance_status_description`) VALUES
(1, 'ATTENDED', 'user attended the event'),
(2, 'Unforeseen absences', 'no call-no show for three or more consecutive days it will be considered a job abandonment, or termination without notice.'),
(3, 'Excused absences', 'can be granted for funerals, jury duty, bereavement, childbirth, a car accident, medical appointment, and unavoidable emergencies. In these cases, employees must provide documentation to prove a reason for the absence.');

-- --------------------------------------------------------

--
-- Table structure for table `ref_event_status`
--

CREATE TABLE `ref_event_status` (
  `event_status_code` int(11) NOT NULL,
  `event_status_description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_event_status`
--

INSERT INTO `ref_event_status` (`event_status_code`, `event_status_description`) VALUES
(1, 'Completed'),
(2, 'In Progress'),
(3, 'Coming soon');

-- --------------------------------------------------------

--
-- Table structure for table `ref_event_types`
--

CREATE TABLE `ref_event_types` (
  `event_type_code` int(11) NOT NULL,
  `event_type_description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_event_types`
--

INSERT INTO `ref_event_types` (`event_type_code`, `event_type_description`) VALUES
(1, 'Training'),
(2, 'Social Hangouts'),
(3, 'Volunteer');

-- --------------------------------------------------------

--
-- Table structure for table `ref_team_roles`
--

CREATE TABLE `ref_team_roles` (
  `team_role_code` int(11) NOT NULL,
  `team_role_description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_team_roles`
--

INSERT INTO `ref_team_roles` (`team_role_code`, `team_role_description`) VALUES
(1, 'Participant'),
(2, 'Committe Lead');

-- --------------------------------------------------------

--
-- Table structure for table `ref_user_roles`
--

CREATE TABLE `ref_user_roles` (
  `user_role` int(11) NOT NULL,
  `user_role_name` varchar(256) NOT NULL,
  `user_role_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_user_roles`
--

INSERT INTO `ref_user_roles` (`user_role`, `user_role_name`, `user_role_description`) VALUES
(1, 'Participant ', 'a person who takes part in something in ITDP'),
(2, 'Program Manager', 'work with ITDP Committe Leads to plan trainings, social hangouts, and volunteer events');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `team_name`) VALUES
(1, 'New Blood'),
(2, 'Bug Team');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_first_name`, `user_last_name`, `user_password`, `user_email`, `user_gender`, `user_role_code`) VALUES
(1, 'ming123', 'Tan', 'Zhong Ming', 'itdp', 'mingblog0520@gmail.com', 'M', 1),
(2, 'jason123', 'Lee', 'Jian Sheng', 'itdp', 'jason123@gmail.com', 'M', 1),
(3, 'seb123', 'Ho', 'Jing Heng', 'itdp', 'seb123@gmail.com', 'M', 1),
(4, 'resh123', 'Reshmi', 'Ravindran', 'itdp', 'resh123@gmail.com', 'F', 1),
(5, 'pm1', 'Program', 'Manager', 'itdp', 'pm1@gmail.com', 'F', 2),
(6, 'cheng123', 'Cheng', 'Jia Zheng', 'cheng123', 'cheng123@gmail.com', 'M', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `event_id` (`event_id`),
  ADD KEY `committee_lead_id` (`committee_lead_id`),
  ADD KEY `participant_id` (`participant_id`);

--
-- Indexes for table `has_teams`
--
ALTER TABLE `has_teams`
  ADD PRIMARY KEY (`has_team_id`),
  ADD KEY `team_id` (`team_id`,`participant_id`,`team_role_code`),
  ADD KEY `team_role_code` (`team_role_code`),
  ADD KEY `participant_id` (`participant_id`);

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
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `has_teams`
--
ALTER TABLE `has_teams`
  MODIFY `has_team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ref_attendance_status`
--
ALTER TABLE `ref_attendance_status`
  MODIFY `attendance_status_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ref_event_status`
--
ALTER TABLE `ref_event_status`
  MODIFY `event_status_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ref_event_types`
--
ALTER TABLE `ref_event_types`
  MODIFY `event_type_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ref_team_roles`
--
ALTER TABLE `ref_team_roles`
  MODIFY `team_role_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ref_user_roles`
--
ALTER TABLE `ref_user_roles`
  MODIFY `user_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  ADD CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`),
  ADD CONSTRAINT `feedbacks_ibfk_2` FOREIGN KEY (`committee_lead_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `feedbacks_ibfk_3` FOREIGN KEY (`participant_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `has_teams`
--
ALTER TABLE `has_teams`
  ADD CONSTRAINT `has_teams_ibfk_1` FOREIGN KEY (`team_role_code`) REFERENCES `ref_team_roles` (`team_role_code`),
  ADD CONSTRAINT `has_teams_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `teams` (`team_id`),
  ADD CONSTRAINT `has_teams_ibfk_3` FOREIGN KEY (`participant_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_role_code`) REFERENCES `ref_user_roles` (`user_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
