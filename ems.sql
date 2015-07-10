-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2015 at 07:34 PM
-- Server version: 5.6.20
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `jobtype` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `added_by` int(11) NOT NULL,
  `Join_Date` date NOT NULL,
  `Lev_Date` date DEFAULT NULL,
  `status` char(1) NOT NULL,
  `client` varchar(30) DEFAULT NULL,
  `clientc` varchar(50) DEFAULT NULL,
  `project` varchar(50) DEFAULT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `phone`, `email`, `jobtype`, `gender`, `address`, `added_by`, `Join_Date`, `Lev_Date`, `status`, `client`, `clientc`, `project`, `image`) VALUES
(1, 'Zaigham Zafar', '00-000', '11105090@gift.edu.pk', 'Administrator', 'Male', 'Sialkot', 1, '2015-04-01', '0000-00-00', 'A', NULL, NULL, NULL, ''),
(10, 'Ali asad', '00-005', '12105102@gift.edu.pk', 'Manager', 'Male', 'Sialkot', 1, '2015-03-18', '2015-07-29', 'R', NULL, NULL, NULL, ''),
(11, 'test', 'test', 'test', 'test', 'Male', 'sajhajsha', 1, '2015-07-01', '0000-00-00', 'A', 'la pata', 'pkayysyya', 'pata ni', ''),
(12, 'Nouman', '00-000', '12105081@gift.edu.pk', 'Service Department', 'Male', 'Sialkot', 1, '2015-07-10', '0000-00-00', 'B', '', '', '', ''),
(17, 'saba', '00-00', 'a@b.com', 'aa', 'Female', 'sss', 1, '2015-07-10', '0000-00-00', 'A', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `emp_attendance`
--

CREATE TABLE IF NOT EXISTS `emp_attendance` (
  `id` int(11) NOT NULL,
  `empid` int(11) NOT NULL,
  `Date` date NOT NULL,
  `AttendanceStatus` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_attendance`
--

INSERT INTO `emp_attendance` (`id`, `empid`, `Date`, `AttendanceStatus`) VALUES
(1, 1, '2015-07-01', 'A'),
(2, 10, '2015-07-01', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `flag` char(1) NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `flag`, `emp_id`) VALUES
(1, 'zaigham', '202cb962ac59075b964b07152d234b70', 'A', 1),
(3, 'ali', '202cb962ac59075b964b07152d234b70', 'M', 10),
(4, 'Nouman', '202cb962ac59075b964b07152d234b70', 'E', 12),
(9, 'saba', '202cb962ac59075b964b07152d234b70', 'M', 17);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `no` int(11) NOT NULL,
  `flag` char(1) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`no`, `flag`, `note`) VALUES
(1, 'N', 'Holiday on 11 july.'),
(2, 'C', 'Tommorow is not holiday');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_attendance`
--
ALTER TABLE `emp_attendance`
  ADD PRIMARY KEY (`id`), ADD KEY `emp_attendance_ibfk_1` (`empid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`), ADD KEY `login_ibfk_1` (`emp_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `emp_attendance`
--
ALTER TABLE `emp_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `emp_attendance`
--
ALTER TABLE `emp_attendance`
ADD CONSTRAINT `emp_attendance_ibfk_1` FOREIGN KEY (`empid`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
