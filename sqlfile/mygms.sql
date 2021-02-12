-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2021 at 03:42 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mygms`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaintid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `details` text NOT NULL,
  `regdate` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL,
  `position` varchar(20) NOT NULL,
  `updationdate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaintid`, `userid`, `type`, `title`, `details`, `regdate`, `status`, `position`, `updationdate`, `remarks`) VALUES
(1, 4, 'gquery', 'some questions', 'how & why', '2021-02-11 12:38:55', 'open', 'admin2', '2021-02-12 08:06:59', 'using this and due to this'),
(2, 4, 'complain', 'test1', 'ask hii', '2021-02-11 13:01:31', 'open', 'admin0', '2021-02-12 08:07:47', 'hello and hii'),
(3, 4, 'gquery', 'test2', 'hello', '2021-02-11 14:34:32', 'in process', 'admin1', '2021-02-12 08:08:50', 'hello good morning'),
(4, 5, 'gquery', 'test3', 'asdfg', '2021-02-11 14:35:04', 'solved', 'admin0', '2021-02-12 08:09:27', ';lkjh'),
(5, 4, 'gquery', 'greet', 'hello', '2021-02-11 21:06:53', 'open', 'admin0', '2021-02-12 08:09:55', 'hello good evening');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `mailid` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contact` bigint(11) NOT NULL,
  `address` text NOT NULL,
  `regdate` datetime NOT NULL DEFAULT current_timestamp(),
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mailid`, `password`, `contact`, `address`, `regdate`, `type`) VALUES
(1, 'admin0', 'admin0@mail.com', '0192023a7bbd73250516f069df18b500', 9876543210, '', '2021-02-11 12:35:23', ''),
(2, 'admin1', 'admin1@mail.com', '0192023a7bbd73250516f069df18b500', 9876543210, '', '2021-02-11 12:35:57', ''),
(3, 'admin2', 'admin2@mail.com', '0192023a7bbd73250516f069df18b500', 9876543210, '', '2021-02-11 12:36:33', ''),
(4, 'user1', 'user1@mail.com', '6ad14ba9986e3615423dfca256d04e3f', 1111111111, '', '2021-02-11 12:37:18', 'user'),
(5, 'user2', 'user2@mail.com', '6ad14ba9986e3615423dfca256d04e3f', 2222222222, '', '2021-02-11 12:37:48', 'user'),
(6, 'user3', 'user3@mail.com', '6ad14ba9986e3615423dfca256d04e3f', 3333333333, '', '2021-02-11 12:38:18', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaintid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mailid` (`mailid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaintid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
