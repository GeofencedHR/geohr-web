-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2019 at 06:23 AM
-- Server version: 5.7.22
-- PHP Version: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geohr`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_parent_id` int(11) DEFAULT NULL,
  `user_emp_id` varchar(10) DEFAULT NULL,
  `user_first_name` varchar(25) NOT NULL,
  `user_last_name` varchar(50) DEFAULT NULL,
  `user_company` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT '1',
  `user_level` int(11) NOT NULL,
  `user_plan` int(11) NOT NULL DEFAULT '1',
  `user_last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_parent_id`, `user_emp_id`, `user_first_name`, `user_last_name`, `user_company`, `user_email`, `user_password`, `user_status`, `user_level`, `user_plan`, `user_last_updated`, `user_created`) VALUES
(2, NULL, NULL, 'Admin', NULL, NULL, 'admin@geohr.lk', '44bc7b417faef5c8125581ebaf8b8e1e', 2, 1, 1, '2018-07-31 15:36:30', '2018-07-31 15:36:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_levels`
--

CREATE TABLE `user_levels` (
  `level_id` int(11) NOT NULL,
  `level` varchar(20) NOT NULL,
  `level_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_levels`
--

INSERT INTO `user_levels` (`level_id`, `level`, `level_desc`) VALUES
(1, 'ADMIN', 'Platform admin'),
(2, 'SUBSCRIBER', 'Platform subscriber'),
(3, 'EMPLOYEE', 'Employee who works under Subscriber');

-- --------------------------------------------------------

--
-- Table structure for table `user_plans`
--

CREATE TABLE `user_plans` (
  `plan_id` int(11) NOT NULL,
  `plan` varchar(20) NOT NULL,
  `plan_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_plans`
--

INSERT INTO `user_plans` (`plan_id`, `plan`, `plan_desc`) VALUES
(1, 'NONE', 'No plan assigned for this user'),
(2, 'FREE', 'Free plan assigned');

-- --------------------------------------------------------

--
-- Table structure for table `user_statuses`
--

CREATE TABLE `user_statuses` (
  `status_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `status_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_statuses`
--

INSERT INTO `user_statuses` (`status_id`, `status`, `status_desc`) VALUES
(1, 'NEW', 'A new user and need admin approval to be function'),
(2, 'ACTIVE', 'An active user, the admin already approved.'),
(3, 'SUSPENDED', 'This user has been suspended.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `unique_indexes` (`user_email`),
  ADD KEY `user_level_relation` (`user_level`),
  ADD KEY `user_status_relation` (`user_status`),
  ADD KEY `user_plan_relation` (`user_plan`),
  ADD KEY `search_indexes` (`user_parent_id`,`user_emp_id`,`user_first_name`,`user_status`,`user_level`,`user_plan`) USING BTREE;

--
-- Indexes for table `user_levels`
--
ALTER TABLE `user_levels`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `user_plans`
--
ALTER TABLE `user_plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `user_statuses`
--
ALTER TABLE `user_statuses`
  ADD PRIMARY KEY (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_levels`
--
ALTER TABLE `user_levels`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_plans`
--
ALTER TABLE `user_plans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_statuses`
--
ALTER TABLE `user_statuses`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_level_relation` FOREIGN KEY (`user_level`) REFERENCES `user_levels` (`level_id`),
  ADD CONSTRAINT `user_plan_relation` FOREIGN KEY (`user_plan`) REFERENCES `user_plans` (`plan_id`),
  ADD CONSTRAINT `user_status_relation` FOREIGN KEY (`user_status`) REFERENCES `user_statuses` (`status_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
