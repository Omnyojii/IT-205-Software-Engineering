-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2019 at 10:23 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drivingschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `hours` int(2) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `hours`, `price`) VALUES
(1, '(Sedan-Manual) Own Car', 5, 2000),
(2, '(Sedan-Manual) Own Car', 7, 2800),
(3, '(Sedan-Manual) Own Car', 10, 4000),
(4, '(Sedan-Manual) Own Car', 15, 6000),
(5, '(Sedan-Manual) Own Car', 20, 10000),
(6, '(Sedan-Manual) Own Car', 30, 15000),
(7, '(Sedan-Manual) Regular', 5, 2000),
(8, '(Sedan-Manual) Regular', 7, 2800),
(9, '(Sedan-Manual) Regular', 10, 4000),
(10, '(Sedan-Manual) Regular', 15, 6000),
(11, '(Sedan-Manual) Regular', 20, 10000),
(12, '(Sedan-Manual) Regular', 30, 15000),
(14, '(Sedan-Manual) Special', 5, 2400),
(15, '(Sedan-Manual) Special', 7, 3300),
(16, '(Sedan-Manual) Special', 10, 4800),
(17, '(Sedan-Manual) Special', 15, 7200),
(18, '(Sedan-Manual) Special', 20, 12000),
(19, '(Sedan-Manual) Special', 30, 15000),
(20, '(Sedan-Manual) Rush', 5, 3000),
(21, '(Sedan-Manual) Rush', 7, 4200),
(22, '(Sedan-Manual) Rush', 10, 6000),
(23, '(Sedan-Manual) Rush', 15, 9000),
(24, '(Sedan-Manual) Rush', 20, 12000),
(25, '(Sedan-Manual) Rush', 30, 18000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
