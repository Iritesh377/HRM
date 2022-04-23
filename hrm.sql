-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2022 at 09:54 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `empbankaccdetails`
--

CREATE TABLE `empbankaccdetails` (
  `id` int(255) NOT NULL,
  `accholdername` varchar(255) NOT NULL,
  `accnumber` int(11) NOT NULL,
  `bankname` varchar(355) NOT NULL,
  `pannumber` int(11) NOT NULL,
  `branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `empcompanydetails`
--

CREATE TABLE `empcompanydetails` (
  `id` int(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `doj` date NOT NULL,
  `joiningsalary` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `empcompanydetails`
--

INSERT INTO `empcompanydetails` (`id`, `department`, `designation`, `doj`, `joiningsalary`) VALUES
(1, 'sigan falne', 'head', '2022-04-19', 25000),
(2, 'sigan falne', 'head', '2022-04-19', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `empdoc`
--

CREATE TABLE `empdoc` (
  `id` int(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `offerletter` varchar(255) NOT NULL,
  `joiningletter` varchar(255) NOT NULL,
  `contractandagreement` varchar(255) NOT NULL,
  `idproff` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employeesdetails`
--

CREATE TABLE `employeesdetails` (
  `id` int(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `fathername` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `fulladdress` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeesdetails`
--

INSERT INTO `employeesdetails` (`id`, `photo`, `fullname`, `fathername`, `dob`, `gender`, `phone`, `fulladdress`, `email`, `password`) VALUES
(1, '', 'addacaw', 'csacqwd', '2022-04-11', 'cadqawdad', 351541632, 'lkhctagudcicad', 'jkxcytv@gmail.com', 'c35a4bb9af13c3a6542f4e528aed692a'),
(2, '', 'awdacawf', 'cawfdadfc', '2022-04-11', 'awca', 5213515, 'dacawdcaca', 'fadjkQ@gmail.com', 'cadcwdw');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `name` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `role` varchar(255) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`, `role`) VALUES
(4, 'techybug', '202cb962ac59075b964b07152d234b70', 'Subodh Aryal', 'Admin'),
(5, 'techy', '202cb962ac59075b964b07152d234b70', 'Subodh Aryal', 'Admin'),
(6, 'alu', '202cb962ac59075b964b07152d234b70', 'Bobby Price', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empbankaccdetails`
--
ALTER TABLE `empbankaccdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empcompanydetails`
--
ALTER TABLE `empcompanydetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empdoc`
--
ALTER TABLE `empdoc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeesdetails`
--
ALTER TABLE `employeesdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empbankaccdetails`
--
ALTER TABLE `empbankaccdetails`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `empcompanydetails`
--
ALTER TABLE `empcompanydetails`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `empdoc`
--
ALTER TABLE `empdoc`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employeesdetails`
--
ALTER TABLE `employeesdetails`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `empbankaccdetails`
--
ALTER TABLE `empbankaccdetails`
  ADD CONSTRAINT `empbankaccdetails_ibfk_1` FOREIGN KEY (`id`) REFERENCES `empcompanydetails` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
