-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2021 at 05:16 PM
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
-- Database: `newhotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `username`, `password`) VALUES
(2, 'admin', 'admin'),
(3, 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenum` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `firstname`, `lastname`, `email`, `phonenum`, `country`) VALUES
(6, 'Christopher', 'Cosingan', 'a@b.com', '0912-234-5678', 'Philippines');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `inquiry_id` int(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`inquiry_id`, `fullname`, `email`, `subject`, `message`) VALUES
(1, 'sdfsd', 'sasd@asdasd', 'dsada', 'dssadsd'),
(2, 'dean', 'sasd@asdasd', 'dsada', 'asdsadasd11132'),
(3, 'dean', 'sasd@asdasd', 'dsada', 'asdsadasd11132'),
(4, 'levi', 'aadssa@asda.mn', 'dsada', '213123'),
(5, 'gfhfghf', 'aadssa@asda.mn', 'dsada', 'hgfghf'),
(6, 'sdfsd', 'aadssa@asda.mn', 'dsada', 'sadsdad'),
(7, 'dean', 'dasd@dasd.mm', 'dasd', 'asdas'),
(8, 'Christopher', 'ccosingan@gmail.com', 'dasdasda', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(255) NOT NULL,
  `checkIn` datetime NOT NULL,
  `checkOut` datetime NOT NULL,
  `adult` int(11) NOT NULL,
  `kids` int(11) NOT NULL,
  `room_cost` int(11) NOT NULL,
  `request` text NOT NULL,
  `customer_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `checkIn`, `checkOut`, `adult`, `kids`, `room_cost`, `request`, `customer_id`) VALUES
(40, '2021-06-03 01:58:00', '2021-06-03 13:58:00', 2, 2, 1391, '21312312asdads', 6),
(41, '2021-06-03 18:44:00', '2021-06-04 06:44:00', 2, 1, 1391, 'dsadasdasd', 6),
(42, '2021-06-05 17:53:00', '2021-06-06 17:53:00', 2, 2, 1391, '313211', 6);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(255) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `is_available` tinyint(1) NOT NULL,
  `reservation_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_type`, `is_available`, `reservation_id`) VALUES
(1, 'Single', 1, 40),
(2, 'Single', 1, 40),
(3, 'Single', 1, 40),
(4, 'Single', 1, 40),
(5, 'Single', 1, 40),
(6, 'Single', 1, 40),
(7, 'Single', 1, 40),
(8, 'Single', 1, 40),
(9, 'Single', 1, 40),
(10, 'Single', 1, 40),
(11, 'Single', 1, 40),
(12, 'Single', 1, 40),
(13, 'Single', 1, 40),
(14, 'Single', 1, 40),
(15, 'Twin', 1, 40),
(16, 'Twin', 1, 40),
(17, 'Twin', 1, 40),
(18, 'Twin', 1, 40),
(19, 'Twin', 1, 40),
(20, 'Twin', 1, 40),
(21, 'Twin', 1, 40),
(22, 'Twin', 1, 40),
(23, 'Twin', 1, 40),
(24, 'Twin', 1, 40),
(25, 'Twin', 1, 40),
(26, 'Twin', 1, 40),
(27, 'Twin', 1, 40),
(28, 'Twin', 1, 40),
(29, 'Family', 1, 40),
(30, 'Family', 1, 40),
(31, 'Family', 1, 40),
(32, 'Family', 1, 40),
(33, 'Family', 1, 40),
(34, 'Family', 1, 42);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inquiry_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `reservation_id` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
