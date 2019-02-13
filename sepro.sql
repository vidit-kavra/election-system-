-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2018 at 12:06 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sepro`
--

-- --------------------------------------------------------

--
-- Table structure for table `anouncement`
--

CREATE TABLE `anouncement` (
  `sno` int(11) NOT NULL,
  `line` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anouncement`
--

INSERT INTO `anouncement` (`sno`, `line`) VALUES
(1, 'First anouncement ,multiple line testing, range testing'),
(2, 'vbjhvcjhdwbjc wehbfjwehfj weg wehgfew gfgwej gfkwej fg'),
(3, ',sdjbcjhwbbchjwj gwufjwgjfgjqw f vewv fwevyf jew ugw u f'),
(4, ',sdjbcjhwbbchjwj gwufjwgjfgjqw f vewv fwevyf jew ugw u f'),
(5, ',sdjbcjhwbbchjwj gwufjwgjfgjqw f vewv fwevyf jew ugw u f'),
(6, ',sdjbcjhwbbchjwj gwufjwgjfgjqw f vewv fwevyf jew ugw u f'),
(7, 'kjdbcdbcjbdjbcjd cwgc weu wg ywg cygew uc weg c we gcg wegccgw '),
(8, 'Anouncement by Admin			'),
(9, 'Announcement new			'),
(10, 'Test new			');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `sno` int(11) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `phno` varchar(10) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `election` varchar(50) DEFAULT NULL,
  `verified` int(11) DEFAULT '1',
  `vcount` int(11) DEFAULT '0',
  `sex` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`sno`, `fname`, `lname`, `phno`, `email`, `image`, `election`, `verified`, `vcount`, `sex`) VALUES
(1, 'Vishwaraj', 'Singh', '7309708982', 'vrajpoot47@gmail.com', 'candidates_img/1.jpg', '1', 1, 0, 'M');

-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE `elections` (
  `sno` int(11) NOT NULL,
  `election` varchar(50) DEFAULT NULL,
  `active` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elections`
--

INSERT INTO `elections` (`sno`, `election`, `active`) VALUES
(1, 'Mess Secretary', 1),
(2, 'new', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `usern` varchar(30) NOT NULL,
  `firstn` varchar(20) DEFAULT NULL,
  `lastn` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pass` varchar(35) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `phno` varchar(10) NOT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `image` varchar(60) NOT NULL,
  `verified` int(11) DEFAULT '0',
  `vcast` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `usern`, `firstn`, `lastn`, `dob`, `pass`, `email`, `phno`, `gender`, `image`, `verified`, `vcast`) VALUES
(1, 'vishu_c', 'Vishwaraj', 'Singh', '1998-11-21', 'd7fb3c87b102ec5f1c8ddb51baeb4cbc', 'vrajpoot47@gmail.com', '7309708982', 'M', 'user_img/1.jpg', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anouncement`
--
ALTER TABLE `anouncement`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `elections`
--
ALTER TABLE `elections`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anouncement`
--
ALTER TABLE `anouncement`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `elections`
--
ALTER TABLE `elections`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
