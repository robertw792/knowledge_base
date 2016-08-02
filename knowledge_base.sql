-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2016 at 05:01 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knowledge_base`
--

-- --------------------------------------------------------

--
-- Table structure for table `at_record`
--

CREATE TABLE `at_record` (
  `id` int(11) NOT NULL,
  `at_type` varchar(10) NOT NULL,
  `error_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `solution` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `at_record`
--

INSERT INTO `at_record` (`id`, `at_type`, `error_name`, `description`, `solution`) VALUES
(1, 'JAWS', 'cannot read text on word', 'cannot read text when using windows', 'turn it on :)\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`) VALUES
(1, 'rob', 'R@b123', 'Robert', 'Williams');

-- --------------------------------------------------------

--
-- Table structure for table `wcag_record`
--

CREATE TABLE `wcag_record` (
  `id` int(11) NOT NULL,
  `error_name` varchar(100) NOT NULL,
  `wcag_level` varchar(9) NOT NULL,
  `description` varchar(200) NOT NULL,
  `code_snippet` text NOT NULL,
  `guidance` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wcag_record`
--

INSERT INTO `wcag_record` (`id`, `error_name`, `wcag_level`, `description`, `code_snippet`, `guidance`) VALUES
(1, 'test', 'A', 'test', 'test', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `at_record`
--
ALTER TABLE `at_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wcag_record`
--
ALTER TABLE `wcag_record`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `at_record`
--
ALTER TABLE `at_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wcag_record`
--
ALTER TABLE `wcag_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
