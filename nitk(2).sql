-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2018 at 01:42 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nitk`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `id` int(1) NOT NULL,
  `rights` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`id`, `rights`) VALUES
(0, 'write'),
(1, 'read');

-- --------------------------------------------------------

--
-- Table structure for table `acm`
--

CREATE TABLE `acm` (
  `uid` int(10) NOT NULL,
  `oid` int(10) NOT NULL,
  `access` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acm`
--

INSERT INTO `acm` (`uid`, `oid`, `access`) VALUES
(4, 2, 1),
(5, 2, 1),
(6, 1, 0),
(3, 2, 0),
(3, 1, 0),
(5, 5, 0),
(6, 2, 0),
(7, 4, 1),
(5, 2, 0),
(6, 3, 1),
(7, 1, 0),
(4, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `object`
--

CREATE TABLE `object` (
  `objid` int(20) NOT NULL,
  `filename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `object`
--

INSERT INTO `object` (`objid`, `filename`) VALUES
(1, 'Sample.csv'),
(2, 'dbms.txt'),
(3, 'simple.txt'),
(4, 'network_Security.txt'),
(5, 'studentdetails.csv'),
(6, 'facultydetails.csv'),
(7, 'samplefile.tex'),
(8, 'text-example.csv');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(3, 'rahul', '$2y$10$xKb9ESx24J2IQ70h25PerOwPW5.r7lewRSKX4mTQbw0Ogga0LncVe'),
(4, 'akshay', '$2y$10$KkN8m39fdTkC/9w.VBy/6.J00xvaBvQfXCOsA2z1ZIZGnrzimGMZ6'),
(5, 'sagar', '$2y$10$ZvkMGmD/E80.uJzBWvFrIeKAz7TkVLwcmixUwS78.eAnWYhEG2xUy'),
(6, 'meena', '$2y$10$h/oEFg8Cb2.voH4fxMAQN..Y6JJHsF3GoPrDXlG.1kTqGdCx9G9ju'),
(7, 'kunal', '$2y$10$Ke66Tt8TpLjMNo.4hrFyK.9ES.L1pw/bJjeJE88STY6rdAip4zgCq'),
(8, 'swapnil', '$2y$10$AkzpnDJN4UNt5h.98rw4X.NthK8KeCAcPnjquVwjH8J95uNYt0yN6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acm`
--
ALTER TABLE `acm`
  ADD KEY `uid` (`uid`),
  ADD KEY `oid` (`oid`);

--
-- Indexes for table `object`
--
ALTER TABLE `object`
  ADD PRIMARY KEY (`objid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `object`
--
ALTER TABLE `object`
  MODIFY `objid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acm`
--
ALTER TABLE `acm`
  ADD CONSTRAINT `acm_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `acm_ibfk_2` FOREIGN KEY (`oid`) REFERENCES `object` (`objid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
