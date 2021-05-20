-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 06:51 PM
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
-- Database: `icloudems`
--

-- --------------------------------------------------------

--
-- Table structure for table `qns_bank`
--

CREATE TABLE `qns_bank` (
  `id` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `qns` text NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `time_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qns_bank`
--

INSERT INTO `qns_bank` (`id`, `subject`, `qns`, `added_by`, `time_date`) VALUES
(1, 'test_sub_2', 'qns no 1 sub 2\r\n', 'test_user_001', '2021-05-19'),
(2, 'test_sub_2', 'qns 2 test sub 2\r\n\r\n ', 'test_user_001', '2021-05-19'),
(3, 'test_sub_2', 'qns 3 test sub 2\r\n\r\n', 'test_user_001', '2021-05-19'),
(4, 'test_sub_2', '\r\nqns 4 test sub 2', 'test_user_001', '2021-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `qpapers`
--

CREATE TABLE `qpapers` (
  `id` int(11) NOT NULL,
  `qpid` varchar(50) NOT NULL,
  `userName` text NOT NULL,
  `class` text NOT NULL,
  `examType` text NOT NULL,
  `session` text NOT NULL,
  `subject` text NOT NULL,
  `time` text NOT NULL,
  `date` text NOT NULL,
  `section` text NOT NULL,
  `qnNumber` text NOT NULL,
  `qnDESC` text NOT NULL,
  `qnMax` text NOT NULL,
  `coMap` text NOT NULL,
  `diffculty` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qpapers`
--

INSERT INTO `qpapers` (`id`, `qpid`, `userName`, `class`, `examType`, `session`, `subject`, `time`, `date`, `section`, `qnNumber`, `qnDESC`, `qnMax`, `coMap`, `diffculty`, `status`) VALUES
(1, 'test_sub_2FN2021-05-22', 'test_user_001', 'TEST CLASS 2', 'Internal', 'FN', 'test_sub_2', '2.08 Hrs', '2021-05-22', 'A', '1', 'qns no 1 sub 2', '1', 'CO1', 'Remember', ''),
(2, 'test_sub_2FN2021-05-22', 'test_user_001', 'TEST CLASS 2', 'Internal', 'FN', 'test_sub_2', '2.08 Hrs', '2021-05-22', 'A', '2', 'qns 3 test sub 2', '10', 'CO1', 'Remember', ''),
(3, 'test_sub_2FN2021-05-22', 'test_user_001', 'TEST CLASS 2', 'Internal', 'FN', 'test_sub_2', '2.08 Hrs', '2021-05-22', 'B', '3', 'qns 2 test sub 2 ', '50', 'CO1', 'Remember', '');

-- --------------------------------------------------------

--
-- Table structure for table `stdnts`
--

CREATE TABLE `stdnts` (
  `id` int(11) NOT NULL,
  `rollNum` text NOT NULL,
  `sdntName` text NOT NULL,
  `stdntFName` text NOT NULL,
  `class` text NOT NULL,
  `gender` text NOT NULL,
  `mobile` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stdnts`
--

INSERT INTO `stdnts` (`id`, `rollNum`, `sdntName`, `stdntFName`, `class`, `gender`, `mobile`, `address`) VALUES
(4, 'icloudTEST CLASS 20', 'Sainath', 'Sapa', 'TEST CLASS 2', 'Male', '9676753138', 'Tupranpet'),
(5, 'icloudTEST CLASS 21', 'ChandraShekar', 'Mahesh', 'TEST CLASS 2', 'Male', '9912246127', 'TEST');

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `id` int(11) NOT NULL,
  `qpid` text NOT NULL,
  `rollNum` text NOT NULL,
  `studentName` text NOT NULL,
  `class` text NOT NULL,
  `subject` text NOT NULL,
  `qno` text NOT NULL,
  `qmarks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`id`, `qpid`, `rollNum`, `studentName`, `class`, `subject`, `qno`, `qmarks`) VALUES
(1, 'test_sub_2FN2021-05-22', 'icloudTEST CLASS 20', 'Sainath', 'TEST CLASS 2', 'test_sub_2', 'Q1', 5),
(2, 'test_sub_2FN2021-05-22', 'icloudTEST CLASS 20', 'Sainath', 'TEST CLASS 2', 'test_sub_2', 'Q2', 4),
(3, 'test_sub_2FN2021-05-22', 'icloudTEST CLASS 20', 'Sainath', 'TEST CLASS 2', 'test_sub_2', 'Q3', 6),
(4, 'test_sub_2FN2021-05-22', 'icloudTEST CLASS 21', 'ChandraShekar', 'TEST CLASS 2', 'test_sub_2', 'Q1', 2),
(5, 'test_sub_2FN2021-05-22', 'icloudTEST CLASS 21', 'ChandraShekar', 'TEST CLASS 2', 'test_sub_2', 'Q2', 2),
(6, 'test_sub_2FN2021-05-22', 'icloudTEST CLASS 21', 'ChandraShekar', 'TEST CLASS 2', 'test_sub_2', 'Q3', 4),
(7, 'test_sub_2FN2021-05-22', 'icloudTEST CLASS 20', 'Sainath', 'TEST CLASS 2', 'test_sub_2', 'Q1', 5),
(8, 'test_sub_2FN2021-05-22', 'icloudTEST CLASS 20', 'Sainath', 'TEST CLASS 2', 'test_sub_2', 'Q2', 4),
(9, 'test_sub_2FN2021-05-22', 'icloudTEST CLASS 20', 'Sainath', 'TEST CLASS 2', 'test_sub_2', 'Q3', 6),
(10, 'test_sub_2FN2021-05-22', 'icloudTEST CLASS 21', 'ChandraShekar', 'TEST CLASS 2', 'test_sub_2', 'Q1', 2),
(11, 'test_sub_2FN2021-05-22', 'icloudTEST CLASS 21', 'ChandraShekar', 'TEST CLASS 2', 'test_sub_2', 'Q2', 2),
(12, 'test_sub_2FN2021-05-22', 'icloudTEST CLASS 21', 'ChandraShekar', 'TEST CLASS 2', 'test_sub_2', 'Q3', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `qns_bank`
--
ALTER TABLE `qns_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qpapers`
--
ALTER TABLE `qpapers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stdnts`
--
ALTER TABLE `stdnts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qns_bank`
--
ALTER TABLE `qns_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `qpapers`
--
ALTER TABLE `qpapers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stdnts`
--
ALTER TABLE `stdnts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_marks`
--
ALTER TABLE `student_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
