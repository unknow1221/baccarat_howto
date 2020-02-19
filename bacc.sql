-- phpMyAdmin SQL Dump
-- version 4.3.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 17, 2020 at 06:55 PM
-- Server version: 5.5.31
-- PHP Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE IF NOT EXISTS `code` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `credit` int(11) NOT NULL DEFAULT '0',
  `create_by` varchar(255) NOT NULL,
  `create_date` int(11) NOT NULL DEFAULT '0',
  `code_use` int(11) NOT NULL DEFAULT '0',
  `use_by` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `fml`
--

CREATE TABLE IF NOT EXISTS `fml` (
  `id` int(11) NOT NULL,
  `fm` varchar(255) NOT NULL,
  `an` varchar(255) NOT NULL,
  `idea` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fml`
--

INSERT INTO `fml` (`id`, `fm`, `an`, `idea`) VALUES
(2, 'BBBPB', 'P', 1),
(3, 'BBPBP', 'B', 1),
(4, 'BPBBB', 'B', 1),
(5, 'BPBBP', 'P', 1),
(6, 'BPBPB', 'P', 1),
(7, 'BPPBP', 'B', 1),
(8, 'BPPBB', 'B', 1),
(9, 'BPPPB', 'P', 1),
(10, 'BPPPP', 'P', 1),
(11, 'PBBBB', 'B', 1),
(12, 'PBBPB', 'P', 1),
(13, 'BPBBB', 'B', 1),
(14, 'PBPBP', 'B', 1),
(15, 'PBPPB', 'P', 1),
(16, 'PPPBP', 'B', 1),
(26, 'PPPBB', 'B', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fml_list`
--

CREATE TABLE IF NOT EXISTS `fml_list` (
  `id` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fml_list`
--

INSERT INTO `fml_list` (`id`, `time`) VALUES
(1, 0),
(2, 1581479390);

-- --------------------------------------------------------

--
-- Table structure for table `statistic`
--

CREATE TABLE IF NOT EXISTS `statistic` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `room` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `fm` varchar(255) NOT NULL,
  `an` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `credit` double(64,2) NOT NULL DEFAULT '0.00',
  `ip` varchar(255) NOT NULL,
  `reg` int(11) NOT NULL,
  `lobby` int(11) NOT NULL DEFAULT '0',
  `online` int(11) NOT NULL,
  `rank` varchar(255) NOT NULL DEFAULT 'member'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fml`
--
ALTER TABLE `fml`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fml_list`
--
ALTER TABLE `fml_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistic`
--
ALTER TABLE `statistic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `code`
--
ALTER TABLE `code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `fml`
--
ALTER TABLE `fml`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `fml_list`
--
ALTER TABLE `fml_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `statistic`
--
ALTER TABLE `statistic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
