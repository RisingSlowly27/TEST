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
-- Database: `testsdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qID` int(5) NOT NULL,
  `testID` int(5) NOT NULL,
  `qType` int(2) NOT NULL,
  `qMain` varchar(500) NOT NULL,
  `qOptions` varchar(1000) NOT NULL,
  `cAnswer` varchar(1000) NOT NULL,
  `qMarks` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_id` int(5) NOT NULL,
  `test_name` varchar(30) NOT NULL,
  `test_type` int(2) NOT NULL,
  `test_img` varchar(50) NOT NULL,
  `test_desc` varchar(100) NOT NULL,
  `uploaded_by` varchar(30) NOT NULL,
  `time_limit` time NOT NULL,
  `totalMarks` varchar(8) NOT NULL,
  `passMarks` varchar(8) NOT NULL,
  `test_link` varchar(50) NOT NULL,
  `scheduled_on` datetime NOT NULL,
  `scheduled_for` varchar(9999) NOT NULL,
  `parent_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`test_id`, `test_name`, `test_type`, `test_img`, `test_desc`, `uploaded_by`, `time_limit`, `totalMarks`, `passMarks`, `test_link`, `scheduled_on`, `scheduled_for`, `parent_id`) VALUES
(7, 'vfcvxvxvdfv', 0, '', 'fvfvdfvfvfd', '16', '00:00:10', '', '', '', '0000-00-00 00:00:00', '', 1),
(8, 'dfgregtg', 0, '', 'rgdrgdrg', '16', '00:00:10', '', '', '', '0000-00-00 00:00:00', '', 1),
(9, 'fvdfvdfbdfbd', 0, '', ' dbdscsvdsf', '16', '00:00:20', '', '', '', '0000-00-00 00:00:00', '', 27),
(10, 'fdfsdf', 0, '', 'ddsfsf', '16', '00:00:12', '', '', '', '0000-00-00 00:00:00', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `Topic_ID` int(5) NOT NULL,
  `Topic_Name` varchar(20) NOT NULL,
  `Topic_IMG` varchar(50) NOT NULL,
  `Descc` varchar(100) NOT NULL,
  `Parent_ID` int(5) NOT NULL,
  `UploadedBy` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`Topic_ID`, `Topic_Name`, `Topic_IMG`, `Descc`, `Parent_ID`, `UploadedBy`) VALUES
(1, 'Topic 1', '', 'This is the first ever topic to be inserted through databse.', 0, 16),
(2, 'Topic 2', '', 'This the second Topic and the one to be starting this first insertion to database along with Topic 1', 0, 16),
(3, 'Topic 3', '', 'This is the third Topic.', 0, 1),
(4, 'Mini Project', '', 'This contains test and contents which can be very useful for our Mini-Minor-Project', 0, 1),
(5, 'WILL IT WORK Part 4', '', 'Now I have a Strong Feeling of Intuition that it will work', 0, 16),
(6, 'WILL IT WORK Part 5', '', 'DO NOT CLICKKKKKKKKKKKKK', 0, 16),
(7, 'Stupid Topic', '', 'By Stupid Person', 0, 26),
(8, 'Stupid Test ', '', 'By Stupid Tester', 0, 26),
(9, '', '', '', 0, 26),
(10, 'LIFE ', '', 'GREAT AND AMAZING', 0, 16),
(11, 'Show Courses', '', 'Testing wether it will show course after adding it', 0, 4),
(13, 'Hmmmm', '', 'HMMM hmmm HmMm hMmM', 0, 4),
(14, 'NOOOOOO', '', 'YES!!!!!!', 0, 4),
(15, 'YESSSSSS', '', 'NOooooo!!!', 0, 4),
(16, 'YESSS But Later', '', 'OK GOT IT', 0, 4),
(17, 'Why Not Ending', '', 'Dont Know', 0, 4),
(18, 'THE END OF TODAY', '', 'IS THE START OF TOMORROW', 0, 4),
(19, 'YEss WOrking', '', 'hmmm OK OK', 0, 4),
(20, 'HAppinesss', '', 'Feeling Great Today', 0, 16),
(21, 'vxcvxvx', '', 'xcvcxvxv', 0, 16),
(22, 'Surprise Test', '', 'Yooo I got a very twisting unexpected surprise', 0, 16),
(23, 'Unexpected ', '', 'The Surprise was too unexpected', 22, 16),
(24, 'Unexpected Happiness', '', 'Yeaah Yessss', 22, 16),
(25, 'Once More', '', 'Surprise', 22, 16),
(26, 'Unexpected Sadness', '', 'Nooo, Just Kidding', 22, 16),
(27, 'Sub_Topic 1', '', 'This is a SubTopic named Sub_Topic 1 for the Topic named Topic_1', 1, 16),
(28, 'sfdssd', '', 'vfdvfvf', 6, 16),
(29, 'vvsfvsfb', '', 'bvccvb', 6, 16),
(30, 'fdgg', '', 'dggrdg', 1, 16),
(31, 'grdgd', '', 'gdrgdrg', 30, 16),
(32, 'dvsdvdsvs', '', 'dvdsvs', 28, 16),
(33, 'fsdgfsgsf', '', 'fsdgfsggf', 32, 16),
(34, 'fsefffsfe', '', '', 29, 16),
(35, 'fvdfvdsvvf', '', 'dfgdggsrg', 29, 16),
(36, 'dvsdvsfsf', '', 'fgsfgsfs', 26, 16),
(37, 'Physics', '', 'This was the hardest subject in 1st sem', 0, 16),
(38, 'regerge', '', 'gergergerg', 0, 16),
(39, 'dvdvfdg', '', 'gfdgdfgd', 2, 16),
(40, 'gfdgdfg', '', 'gdfgdf', 2, 16),
(41, 'fdgd', '', 'fgd', 40, 16),
(42, '', '', '', 0, 16),
(43, 'fdgdeger', '', 'gregerge gergeg gregreg gergerg', 2, 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qID`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`Topic_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `test_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `Topic_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
