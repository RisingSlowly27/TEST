-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2025 at 08:09 AM
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
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `Sl` int(5) NOT NULL,
  `message` varchar(5000) NOT NULL,
  `fromID` int(5) NOT NULL,
  `toID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`Sl`, `message`, `fromID`, `toID`) VALUES
(1, 'Hey Tester, You are doing Nice ! ! !', 1, 16),
(2, 'Let\'s Finish this Together ! And Focus on Enhancing our knowledge and making ourselves better.', 16, 1),
(3, 'Are You Ready', 16, 4),
(4, 'Good Morning', 2, 16),
(7, 'What\'s Uppppp?', 30, 16),
(8, 'Test Message from Tester', 16, 30),
(9, 'Good Night Bro', 16, 2),
(10, 'Hellooooooo', 16, 4),
(11, 'Hmm', 16, 4),
(12, 'OK', 16, 4),
(13, 'hahaahahahaahha', 4, 16),
(14, '?', 16, 4),
(15, 'hmm', 16, 4),
(16, 'hmm', 16, 30),
(19, 'Hi JJ ! !', 16, 24),
(21, 'Hi Zaheer', 16, 30),
(22, 'hello', 16, 2);

-- --------------------------------------------------------

--
-- Table structure for table `newcon`
--

CREATE TABLE `newcon` (
  `Sl` int(5) NOT NULL,
  `user1` int(5) NOT NULL,
  `user2` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newcon`
--

INSERT INTO `newcon` (`Sl`, `user1`, `user2`) VALUES
(2, 1, 16),
(3, 16, 4),
(4, 2, 16),
(7, 16, 30),
(11, 16, 24);

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
(28, 'hmmmmm@hmm.com', 'also123', 'john', 0),
(29, 'deejus1001c@gmail.com', 'test1', 'sumiran tamang', 0),
(30, 'detetivesimp@gmail.com', 'hellomrdon', 'Zaheer ul Islam', 0),
(31, 'TEACHcom@tch', 'qqwwee', 'Teacher M', 0),
(32, 'twenty@20.com', 'zzxxcc', 'New@20', 0),
(33, 'abcd123@gmail.com', 'aassdd', 'Yasharth Shukla', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`Sl`);

--
-- Indexes for table `newcon`
--
ALTER TABLE `newcon`
  ADD PRIMARY KEY (`Sl`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `Sl` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `newcon`
--
ALTER TABLE `newcon`
  MODIFY `Sl` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
