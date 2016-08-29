-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2016 at 04:35 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `camss_admin`
--

CREATE TABLE `camss_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_uname` varchar(45) NOT NULL,
  `admin_pass` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camss_admin`
--

INSERT INTO `camss_admin` (`admin_id`, `admin_uname`, `admin_pass`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `camss_component`
--

CREATE TABLE `camss_component` (
  `component_id` int(11) NOT NULL,
  `component_start` datetime NOT NULL,
  `component_end` datetime NOT NULL,
  `component_status` text NOT NULL,
  `project_id` int(11) NOT NULL,
  `rate_id` int(11) NOT NULL,
  `team_leader_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `camss_customer`
--

CREATE TABLE `camss_customer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `picture` text,
  `house_no` text,
  `street_name` text,
  `city` text,
  `country` text,
  `postal_code` text,
  `dob` date DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camss_customer`
--

INSERT INTO `camss_customer` (`id`, `first_name`, `last_name`, `email`, `picture`, `house_no`, `street_name`, `city`, `country`, `postal_code`, `dob`, `telephone`, `created_at`, `updated_at`) VALUES
(6, 'Asitha', 'Bandara', 'asitha@live.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-08-28 19:04:42', NULL),
(7, 'Iroshima', 'Bandara', 'iro@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-08-29 06:38:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `camss_data_entry`
--

CREATE TABLE `camss_data_entry` (
  `id` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `status` enum('available','occupied') DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `camss_job`
--

CREATE TABLE `camss_job` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `description` text,
  `status` enum('accepted','rejected','pending','sent') DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camss_job`
--

INSERT INTO `camss_job` (`id`, `title`, `description`, `status`, `customer_id`, `created_at`, `updated_at`) VALUES
(3, 'House', 'ane mata boundatin eka daala deepan bn                                        ', 'accepted', 6, '2016-08-29 04:24:20', '2016-08-29 10:03:36'),
(4, '1', '3333', 'pending', 6, '2016-08-29 04:31:13', '2016-08-29 04:35:44'),
(5, 'aaa', '2222                            \r\n                        ', 'rejected', 7, '2016-08-29 06:41:30', '2016-08-29 07:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `camss_login_session`
--

CREATE TABLE `camss_login_session` (
  `log_id` int(11) NOT NULL,
  `login_time` int(11) NOT NULL,
  `logout_time` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `camss_manager`
--

CREATE TABLE `camss_manager` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `status` enum('available','occipied') DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camss_manager`
--

INSERT INTO `camss_manager` (`id`, `email`, `first_name`, `last_name`, `telephone`, `status`, `description`, `created_at`, `updated_at`) VALUES
(4, 'manager@camss.lk', NULL, NULL, NULL, 'available', '12344', '2016-08-17 17:57:28', '2016-08-17 18:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `camss_news`
--

CREATE TABLE `camss_news` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `description` text,
  `status` enum('active','inactive') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `camss_payment`
--

CREATE TABLE `camss_payment` (
  `payment_id` int(11) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `payment_date` datetime NOT NULL,
  `payment_status` varchar(45) NOT NULL,
  `component_id` int(11) NOT NULL,
  `coustomer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `camss_progress`
--

CREATE TABLE `camss_progress` (
  `progress_id` int(11) NOT NULL,
  `progress_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `camss_progres_image`
--

CREATE TABLE `camss_progres_image` (
  `progress_image_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `progress_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `camss_project`
--

CREATE TABLE `camss_project` (
  `id` int(11) NOT NULL,
  `title` int(11) DEFAULT NULL,
  `description` text,
  `status` enum('ongoing','completed','paused','ignored','cancelled') DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `leader_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `camss_quit_customer`
--

CREATE TABLE `camss_quit_customer` (
  `id` int(11) NOT NULL,
  `email` text,
  `description` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camss_quit_customer`
--

INSERT INTO `camss_quit_customer` (`id`, `email`, `description`, `created_at`) VALUES
(1, 'asitha@gmail.com', 'aaaa                                \r\n       ', '2016-08-28 17:27:20');

-- --------------------------------------------------------

--
-- Table structure for table `camss_rate`
--

CREATE TABLE `camss_rate` (
  `rate_id` int(11) NOT NULL,
  `rate` varchar(45) NOT NULL,
  `feedback` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `camss_skill`
--

CREATE TABLE `camss_skill` (
  `skill_id` int(11) NOT NULL,
  `skill_name` varchar(45) NOT NULL,
  `skill_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `camss_team_leader`
--

CREATE TABLE `camss_team_leader` (
  `id` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` text NOT NULL,
  `telephone` int(11) NOT NULL,
  `status` enum('available','occuipied') DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `camss_user`
--

CREATE TABLE `camss_user` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role` enum('admin','manager','teamleader','dataentry','customer') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camss_user`
--

INSERT INTO `camss_user` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(2, 'admin@camss.lk', '202cb962ac59075b964b07152d234b70', 'admin', '2016-08-17 17:27:31', NULL),
(4, 'manager@camss.lk', '202cb962ac59075b964b07152d234b70', 'manager', '2016-08-17 17:57:28', '2016-08-17 18:10:36'),
(6, 'asitha@live.com', '202cb962ac59075b964b07152d234b70', 'customer', '2016-08-28 19:04:42', NULL),
(7, 'iro@gmail.com', '202cb962ac59075b964b07152d234b70', 'customer', '2016-08-29 06:38:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `camss_worker`
--

CREATE TABLE `camss_worker` (
  `worker_id` int(11) NOT NULL,
  `worker_fname` varchar(45) NOT NULL,
  `worker_lname` varchar(45) NOT NULL,
  `worker_pic` text NOT NULL,
  `worker_skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `camss_admin`
--
ALTER TABLE `camss_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `camss_customer`
--
ALTER TABLE `camss_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camss_data_entry`
--
ALTER TABLE `camss_data_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camss_job`
--
ALTER TABLE `camss_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camss_manager`
--
ALTER TABLE `camss_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camss_news`
--
ALTER TABLE `camss_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camss_project`
--
ALTER TABLE `camss_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camss_quit_customer`
--
ALTER TABLE `camss_quit_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camss_team_leader`
--
ALTER TABLE `camss_team_leader`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camss_user`
--
ALTER TABLE `camss_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camss_worker`
--
ALTER TABLE `camss_worker`
  ADD PRIMARY KEY (`worker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `camss_admin`
--
ALTER TABLE `camss_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `camss_job`
--
ALTER TABLE `camss_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `camss_news`
--
ALTER TABLE `camss_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `camss_project`
--
ALTER TABLE `camss_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `camss_quit_customer`
--
ALTER TABLE `camss_quit_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `camss_user`
--
ALTER TABLE `camss_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `camss_worker`
--
ALTER TABLE `camss_worker`
  MODIFY `worker_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
