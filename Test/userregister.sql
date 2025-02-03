-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2025 at 07:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userregister`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `user_id` int(5) NOT NULL,
  `Email` varchar(320) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `user_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`user_id`, `Email`, `Password`, `name`, `user_type`) VALUES
(1, 'donaloysius112@gmail.com', 'ItzSecret', 'DON ALOYSIUS', 0),
(2, 'anujDhurve@gmail.com', 'yoUKnow', 'Anuj Dhurve', 1),
(3, 'hmmmmm@hmm.com', 'hahaha', 'DON ALOYSIUS', 0),
(4, 'test@test.com', 'test4you', 'tester', 1),
(5, 'hmmm@gmail.com', 'hhhhh', 'hmmmm', 0),
(6, 'vvvv@gmail.com', 'varunnn', 'Varun', 1),
(7, 'Jerry@CN.com', 'DOGCAT', 'TOM', 2),
(8, 'hvjhjhvjhv@ggg.com', 'asdfgh', 'asasad', 2),
(12, 'test2@test.com', 'aassdd', 'tester2', 0),
(13, 'test2@test.com', 'aassdd', 'tester2', 0),
(14, 'test3@gmail', 'aassdd', 'tester3', 0),
(15, 'test4@test.com', 'aassdd', 'tester4', 0),
(16, 'test5@test.com', 'aassdd', 'tester5', 0),
(17, 'test1@test', 'qqwwee', 'tester1', 0),
(18, 'test6@test.com', 'qqwwee', 'tester6', 0),
(19, 'test6@test.com', 'hellooo', 'tester6', 0),
(20, 'test6@test.com', 'hellooo', 'tester6', 0),
(21, 'test7@test.com', 'Rising', 'tester7', 0),
(22, 'test6@test.com', 'tststsa', 'tester7b', 2),
(23, 'don@kmail.com', 'aassdd', 'DON ALOYSIUS', 2),
(24, 'JEJE@JAYJAY', 'JAEjae', 'JJ ', 1),
(25, 'ssh@test.com', 'aassdd', 'Souhardya', 1),
(26, 'stupidity@feelings.feel', 'pppoooiii', 'Stupid Tester', 0),
(27, 'Real@Fake.com', 'FakePass', 'Real One', 2),
(28, 'hmmmmm@hmm.com', 'also123', 'john', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
