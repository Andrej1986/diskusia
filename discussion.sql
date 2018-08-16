-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 16, 2018 at 10:31 AM
-- Server version: 5.6.38
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `discussion`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentResponses`
--

CREATE TABLE `commentResponses` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `response` text NOT NULL,
  `response_author` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loginAdmin`
--

CREATE TABLE `loginAdmin` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loginAdmin`
--

INSERT INTO `loginAdmin` (`id`, `email`, `password`) VALUES
(4, 'email@email.com', 'heslo');

-- --------------------------------------------------------

--
-- Table structure for table `topicComments`
--

CREATE TABLE `topicComments` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topicComments`
--

INSERT INTO `topicComments` (`id`, `topic_id`, `author`, `email`, `comment`, `date`) VALUES
(2, 2, 'asd', 'asd', 'asdas', '2018-08-11 11:58:23'),
(4, 2, 'dsfd', 'sdf', 'sdf', '2018-08-13 06:35:28');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `comments` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `comments`, `date`) VALUES
(1, 'tema 1', 0, '2018-08-11 11:57:53'),
(2, 'tema 2', 2, '2018-08-11 11:58:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commentResponses`
--
ALTER TABLE `commentResponses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginAdmin`
--
ALTER TABLE `loginAdmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topicComments`
--
ALTER TABLE `topicComments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentResponses`
--
ALTER TABLE `commentResponses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loginAdmin`
--
ALTER TABLE `loginAdmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `topicComments`
--
ALTER TABLE `topicComments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
