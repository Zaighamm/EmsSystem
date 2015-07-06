-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2015 at 06:34 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

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
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`aid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `name`, `gender`, `phone`, `email`) VALUES
(1, 'Ali Asad', 'Male', '00-0000000', '12105101@gift.edu.pk');

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
  `aid` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `phone`, `email`, `jobtype`, `gender`, `address`, `aid`) VALUES
(8, 'Farhan', '00-000', '12105080@gift.edu.pk', 'customer service', 'Male', 'Ali pur chatha', 1),
(9, 'nouman', '00-000', '12105081@gift.edu.pk', 'acountant', 'Male', 'sialkot sadar cant', 1),
(10, 'zohaib', '00-000', '12105086@gift.edu.pk', 'cashier', 'Male', ' gujranwala kachi fatoman', 1),
(11, 'hamza', '00-000', '12105083@gift.edu.pk', 'designer', 'Male', 'satilite town gujranwala', 1),
(12, 'zawar', '00-000', '12105061@gift.edu.pk', 'nasa worker', 'Male', 'silakot cant', 1),
(13, 'umair', '00-000', '12105048@gift.edu.pk', 'chief of workers', 'Male', 'rawali cantt gujranwala', 1),
(14, 'umer ', '00-000', '12105108@gift.edu.pk', 'researcher', 'Male', 'daska 8-no', 1),
(15, 'rizwan', '00-000', '12105099@gift.edu.pk', 'sports player', 'Male', 'kamoke', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
`id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `flag` char(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `flag`) VALUES
(1, 'Ali', '202cb962ac59075b964b07152d234b70', 'A'),
(17, 'Farhan', '202cb962ac59075b964b07152d234b70', 'E'),
(18, 'nouman', '202cb962ac59075b964b07152d234b70', 'E'),
(19, 'zohaib', '202cb962ac59075b964b07152d234b70', 'E'),
(20, 'hamza', '202cb962ac59075b964b07152d234b70', 'E'),
(21, 'zawar', '202cb962ac59075b964b07152d234b70', 'E'),
(22, 'umair', '202cb962ac59075b964b07152d234b70', 'E'),
(23, 'umer ', '202cb962ac59075b964b07152d234b70', 'E'),
(24, 'rizwan', '202cb962ac59075b964b07152d234b70', 'E');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
 ADD PRIMARY KEY (`id`), ADD KEY `aid` (`aid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `admin` (`aid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
