-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 20, 2021 at 03:49 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `UID` int(5) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(8) NOT NULL,
  `Mobile_no` varchar(13) NOT NULL,
  `Date_of_reg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`UID`, `Name`, `Email`, `Password`, `Mobile_no`, `Date_of_reg`) VALUES
(1, 'sagar', 'sagarpatil98754@gmail.com', '4321', '6355947852', '2021-04-19 15:40:09'),
(2, 'jay', 'talaviyajay@gmail.com', '1000', '8488862784', '2021-04-19 15:41:42'),
(3, 'Admin', 'admin@gmail.com', 'admin123', '9996663330', '2021-04-20 13:19:38'),
(4, 'Student', 'student@gmail.com', 'stud1', '6663339990', '2021-04-20 13:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `msgs`
--

CREATE TABLE `msgs` (
  `sno` int(5) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `room` text NOT NULL,
  `senderName` varchar(20) NOT NULL,
  `ip` text NOT NULL,
  `stime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msgs`
--

INSERT INTO `msgs` (`sno`, `msg`, `room`, `senderName`, `ip`, `stime`) VALUES
(1, 'Hiii from chrome', 'New1', 'sagar', '::1', '2021-04-19 15:43:23'),
(2, 'hii from FireFox', 'New1', 'jay', '127.0.0.1', '2021-04-19 17:10:39'),
(3, 'How are You Chrome', 'New1', 'jay', '127.0.0.1', '2021-04-19 17:10:50'),
(4, 'i am fine FireFox', 'New1', 'sagar', '::1', '2021-04-19 17:11:08'),
(5, 'hii from firefox', 'Abc', 'jay', '127.0.0.1', '2021-04-20 13:13:08'),
(6, 'hii from chrome', 'Abc', 'sagar', '::1', '2021-04-20 13:13:52'),
(7, 'hiii i am admin of my group SEM6', 'SEM6', 'Admin', '127.0.0.1', '2021-04-20 13:27:29'),
(8, 'hii i am student of SEM6', 'SEM6', 'Student', '127.0.0.1', '2021-04-20 13:31:55'),
(9, 'how are you?', 'SEM6', 'Student', '127.0.0.1', '2021-04-20 13:32:50'),
(10, 'I am fine stud.', 'SEM6', 'Admin', '127.0.0.1', '2021-04-20 13:33:27');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `sno` int(11) NOT NULL,
  `roomname` text NOT NULL,
  `stime` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`sno`, `roomname`, `stime`) VALUES
(1, 'New1', '2021-04-19 15:42:51'),
(2, 'Abc', '2021-04-20 13:12:55'),
(3, 'SEM6', '2021-04-20 13:25:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`UID`);

--
-- Indexes for table `msgs`
--
ALTER TABLE `msgs`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `UID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `msgs`
--
ALTER TABLE `msgs`
  MODIFY `sno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
