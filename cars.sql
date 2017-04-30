-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2017 at 06:22 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tbl_automobiles`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `automobile_id` int(11) NOT NULL,
  `car_model` varchar(255) NOT NULL,
  `weight` decimal(10,0) NOT NULL,
  `manufacture_year` year(4) NOT NULL,
  `sales_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`automobile_id`, `car_model`, `weight`, `manufacture_year`, `sales_email`) VALUES
(1, 'Honda', '6', 2000, 'test@hotmail.com'),
(2, 'Toyota', '6', 2004, 'kate@hotmail.com'),
(3, 'Audi', '8', 2017, 'mike@hotmail.com'),
(4, 'Mercedes', '8', 2015, 'benz@hotmail.com'),
(5, 'Chevrolet', '7', 1999, 'chevy@hotmail.com'),
(6, 'Ford', '9', 1995, 'ford@hotmail.com'),
(7, 'Ford', '10', 2000, 'bob@hotmail.com'),
(8, 'Mercedes', '10', 2017, 'mercedes@hotmail.com'),
(9, 'Honda', '9', 2006, 'hondacivic@hotmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`automobile_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `automobile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
