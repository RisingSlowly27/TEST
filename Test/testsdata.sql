-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2025 at 11:29 AM
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

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qID`, `testID`, `qType`, `qMain`, `qOptions`, `cAnswer`, `qMarks`) VALUES
(28, 7, 0, 'CHANGED', 'cat-|-dog-|-mouse-|-scene', 'dog->|mouse->|', 3),
(29, 7, 0, 'which one??', 'a-|-b-|-c-|-d', 'a->|b->|', 5),
(30, 7, 0, 'Real Question : May we Go ? ? ?', 'Yes-|-Lets Go-|-Ready-|-OK', 'Yes->|Lets Go->|Ready->|OK->|', 6),
(31, 7, 0, 'My Age', '18-|-19-|-20-|-21', '19->|', 6),
(32, 7, 0, 'Hows the Josh ? ? ?', 'High-|-low-|-Rising-|-normal', 'High->|Rising->|', 10),
(33, 13, 0, 'Which of there are Halls ?', 'Wolfendan Hall-|-Richardson Hall-|-B. Sen Hall-|-Sengupta Hall', 'Wolfendan Hall->|Richardson Hall->|Sengupta Hall->|', 15),
(34, 13, 0, 'Where is CST Department?', 'MN Dastur-|-I Hall-|-Main Building-|-SnT', 'MN Dastur->|', 5),
(35, 13, 0, 'Which is the Best Department in IIEST Shibpur ?', 'IT-|-EE-|-CST-|-ETC', 'CST->|', 10);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `resultID` int(5) NOT NULL,
  `testID` int(5) NOT NULL,
  `userID` int(5) NOT NULL,
  `uAns` varchar(5000) NOT NULL,
  `uMarks` int(5) NOT NULL,
  `uTimeT` varchar(10) NOT NULL,
  `rMain` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`resultID`, `testID`, `userID`, `uAns`, `uMarks`, `uTimeT`, `rMain`) VALUES
(2, 7, 16, 'cat&|&dog->|b->|Yes&|&Lets Go&|&Ready&|&OK->|19->|High&|&Rising->|', 22, '00:09:27', 1),
(3, 7, 16, 'cat&|&dog->|b->|Yes&|&Lets Go&|&Ready&|&OK->|19->|High&|&Rising->|', 22, '00:01:33', 1),
(4, 7, 16, 'dog->|a->|OK->|19->|low->|', 6, '00:00:07', 0),
(5, 7, 16, 'cat&|&mouse->|a&|&b->|Yes&|&Lets Go&|&Ready->|->|->|', 5, '00:00:10', 1),
(6, 13, 31, 'Wolfendan Hall&|&Richardson Hall&|&Sengupta Hall->|MN Dastur&|&SnT->|CST->|', 25, '00:01:01', 1),
(7, 7, 31, 'dog->|c&|&d->|Lets Go->|19->|->|', 6, '00:00:17', 0);

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
  `totalM` int(5) NOT NULL,
  `passMarks` varchar(8) NOT NULL,
  `scheduled_on` datetime NOT NULL,
  `scheduled_for` varchar(9999) NOT NULL,
  `parent_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`test_id`, `test_name`, `test_type`, `test_img`, `test_desc`, `uploaded_by`, `time_limit`, `totalM`, `passMarks`, `scheduled_on`, `scheduled_for`, `parent_id`) VALUES
(7, 'Testing Test', 0, '', 'fvfvdfvfvfd', '16', '00:10:01', 30, '10', '0000-00-00 00:00:00', '', 1),
(8, 'DSA', 0, '', 'dkjasbdjbdjasbdkjabdkj', '16', '00:00:30', 0, '10', '0000-00-00 00:00:00', '', 1),
(9, 'fvdfvdfbdfbd', 0, '', ' dbdscsvdsf', '16', '00:00:20', 0, '', '0000-00-00 00:00:00', '', 27),
(10, 'fdfsdf', 0, '', 'ddsfsf', '16', '00:00:12', 0, '', '0000-00-00 00:00:00', '', 1),
(11, 'vergefv', 0, '', 'effveffvefv', '16', '00:00:30', 0, '', '0000-00-00 00:00:00', '', 44),
(12, 'dcsdc', 0, '', 'dvsdv', '6', '00:00:20', 0, '', '0000-00-00 00:00:00', '', 46),
(13, 'FRICTION', 0, '', 'HDBSD JFDF  ', '31', '00:01:01', 30, '10', '0000-00-00 00:00:00', '', 49);

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
(43, 'fdgdeger', '', 'gregerge gergeg gregreg gergerg', 2, 16),
(44, 'Sum', '', 'xbsb xwskxjwbxkjw dcedbckbcde dcedckjdebce dcedcc', 0, 16),
(45, '3rferfrfrferfr', '', 'ferfrefv', 44, 16),
(46, 'dscsdcds', '', 'dsvdsvds', 0, 6),
(47, 'dsfsdgvgdg', '', 'dsfsddf', 0, 30),
(48, 'SCIECE X', '', 'adbasdbsajkd djasdk kkdnajsdkja askjdnsacasc saaskcsancasjc ssac ', 0, 31),
(49, 'PHYSICS', '', 'JHVHS SJ CSSJC C CSS S DSD', 48, 31),
(50, 'CHEMISTRY', '', 'EJENDJD DJD EFEF D DDD FEFEKJD  EFE', 48, 31);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qID`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`resultID`);

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
  MODIFY `qID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `resultID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `test_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `Topic_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
