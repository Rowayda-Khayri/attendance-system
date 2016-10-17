-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 18, 2016 at 12:37 AM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `attendance_system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `process` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_attendance_employee_idx` (`employee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `process`, `datetime`, `employee_id`, `deleted_at`) VALUES
(51, 1, '2016-10-17 23:36:35', 28, NULL),
(52, 1, '2016-10-17 23:36:40', 27, NULL),
(53, 2, '2016-10-17 23:36:43', 27, NULL),
(54, 1, '2016-10-17 23:36:46', 28, NULL),
(55, 2, '2016-10-17 23:36:48', 28, NULL),
(56, 2, '2016-10-17 23:36:53', 28, NULL),
(57, 1, '2016-10-17 23:36:57', 29, NULL),
(58, 2, '2016-10-17 23:37:00', 29, NULL),
(59, 1, '2016-10-17 23:37:02', 30, NULL),
(60, 2, '2016-10-17 23:37:05', 30, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `organization` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `organization`, `created_at`, `updated_at`, `deleted_at`) VALUES
(27, 'emp1', 'org1', '2016-10-17 23:18:29', NULL, NULL),
(28, 'emp2', 'org1', '2016-10-17 23:19:11', NULL, NULL),
(29, 'emp3', 'org2', '2016-10-17 23:19:19', NULL, NULL),
(30, 'emp4', 'org3', '2016-10-17 23:19:26', NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `fk_attendance_employee` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
