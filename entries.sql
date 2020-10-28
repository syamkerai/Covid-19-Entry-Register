-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 28, 2020 at 03:13 PM
-- Server version: 10.2.34-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vregister`
--

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

CREATE TABLE `entries` (
  `u_id` int(11) NOT NULL,
  `u_fname` varchar(100) CHARACTER SET ascii DEFAULT NULL,
  `u_lname` varchar(100) CHARACTER SET ascii DEFAULT NULL,
  `u_mnumber` int(12) DEFAULT NULL,
  `u_noofmembers` int(2) NOT NULL,
  `u_tdate` date NOT NULL,
  `u_intime` text NOT NULL,
  `u_outtime` text NOT NULL DEFAULT '00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entries`
--

INSERT INTO `entries` (`u_id`, `u_fname`, `u_lname`, `u_mnumber`, `u_noofmembers`, `u_tdate`, `u_intime`, `u_outtime`) VALUES
(54, 'SYAM', 'SDVU', 474906544, 0, '2020-10-27', '11:53:14', '00:00:00'),
(53, 'SYAM', 'KIEW', 2147483647, 0, '2020-10-27', '11:49:42', '11:49:51'),
(52, 'SYAM', 'KERAI', 474901891, 0, '2020-10-27', '08:05:59', '11:49:30'),
(51, 'SYAM', 'KERAI', 474901891, 0, '2020-10-27', '08:05:57', '11:49:52'),
(50, 'SYAM', 'KERAI', 474901891, 0, '2020-10-27', '08:05:02', '11:49:54'),
(49, 'SYAM', 'KERAI', 474901891, 0, '2020-10-27', '08:05:00', '11:49:56'),
(48, 'SYAM', 'KERAI', 474901891, 0, '2020-10-27', '08:02:44', '11:49:57'),
(47, 'SYAM', 'KERAI', 474901891, 0, '2020-10-27', '08:02:44', '11:49:59'),
(46, 'SYAM', 'KERAI', 474901891, 0, '2020-10-27', '08:02:44', '11:50:01'),
(45, 'SYAM', 'KERAI', 474901891, 0, '2020-10-27', '08:02:38', '11:50:03'),
(44, 'SYAM', 'KERAI', 474901891, 0, '2020-10-27', '08:02:36', '11:50:05'),
(43, 'SYAM', 'KERAI', 474901891, 0, '2020-10-27', '07:53:06', '11:50:06'),
(42, 'SYAM', 'KERAI', 474901891, 0, '2020-10-27', '07:53:04', '11:50:08'),
(41, 'SYAM', 'KERAI', 474901891, 0, '2020-10-27', '07:53:03', '11:50:10'),
(55, 'John', 'Smith', 411222333, 2, '2020-10-27', '11:53:14', '00:00:00'),
(56, 'fsdfdsf', 'dsfsdf', 411222333, 1, '2020-10-28', '1:30:49 PM', '00:00:00'),
(57, 'bcvb', 'gdfgdfg', 45612346, 1, '2020-10-28', '1:37:39 PM', '00:00:00'),
(58, 'vbnbv', 'gdfg', 412345678, 3, '2020-10-28', '1:41:24 PM', '00:00:00'),
(59, 'fdsfsdf', 'gfdg', 455666333, 1, '2020-10-28', '1:42:32 PM', '00:00:00'),
(60, 'gdfg', 'hgh', 412345689, 3, '2020-10-28', '1:43:19 PM', '00:00:00'),
(61, 'Adam', 'Doe', 412852963, 3, '2020-10-28', '1:46:32 PM', '00:00:00'),
(62, 'gfn', 'hgf', 412456123, 1, '2020-10-28', '3:06:47 PM', '00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entries`
--
ALTER TABLE `entries`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entries`
--
ALTER TABLE `entries`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
