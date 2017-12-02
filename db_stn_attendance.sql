-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2017 at 03:21 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_stn_attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roll` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `roll`) VALUES
(1, 'Ruhul Amin', 1701010026),
(2, 'Anfal Galib', 170101035),
(3, 'Abir', 4545),
(4, 'Parvez', 5445),
(5, 'Rifat', 37),
(6, 'Nurul', 45),
(7, 'Harun', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `attend` varchar(255) NOT NULL,
  `attend_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`id`, `roll`, `attend`, `attend_date`) VALUES
(58, 170101035, 'absent', '2017-06-29'),
(57, 1701010026, 'present', '2017-06-29'),
(56, 100, 'absent', '2017-06-28'),
(55, 45, 'present', '2017-06-28'),
(54, 37, 'present', '2017-06-28'),
(53, 5445, 'present', '2017-06-28'),
(52, 4545, 'present', '2017-06-28'),
(51, 170101035, 'absent', '2017-06-28'),
(47, 1701010026, 'present', '2017-06-27'),
(48, 170101035, 'absent', '2017-06-27'),
(49, 5445, 'present', '2017-06-27'),
(50, 1701010026, 'present', '2017-06-28'),
(39, 45, 'present', '2017-06-26'),
(59, 4545, 'present', '2017-06-29'),
(60, 5445, 'absent', '2017-06-29'),
(61, 37, 'present', '2017-06-29'),
(62, 45, 'absent', '2017-06-29'),
(63, 100, 'present', '2017-06-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
