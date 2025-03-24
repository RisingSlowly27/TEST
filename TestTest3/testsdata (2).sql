-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2025 at 04:50 AM
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
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `Sl` int(5) NOT NULL,
  `topicID` int(5) NOT NULL,
  `userID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Sl`, `topicID`, `userID`) VALUES
(133, 53, 2),
(134, 53, 5),
(135, 53, 6),
(136, 53, 1),
(137, 53, 16),
(140, 1, 16),
(142, 5, 16),
(143, 10, 16),
(144, 15, 16),
(145, 1, 1),
(146, 18, 16),
(147, 20, 16),
(148, 54, 1),
(149, 54, 16),
(150, 54, 2),
(151, 54, 3),
(152, 54, 4),
(153, 54, 1),
(155, 54, 2),
(156, 54, 3),
(157, 54, 4),
(158, 58, 2),
(159, 58, 4),
(160, 58, 5),
(161, 58, 6),
(162, 58, 30);

-- --------------------------------------------------------

--
-- Table structure for table `qbank`
--

CREATE TABLE `qbank` (
  `id` int(11) NOT NULL,
  `qID` int(5) NOT NULL,
  `testID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qbank`
--

INSERT INTO `qbank` (`id`, `qID`, `testID`) VALUES
(1, 28, 7),
(2, 29, 7),
(3, 30, 7),
(4, 31, 7),
(5, 32, 7),
(11, 93, 7),
(14, 95, 7),
(15, 93, 8),
(16, 95, 8),
(17, 97, 8),
(18, 160, 14),
(19, 161, 14),
(20, 162, 15),
(21, 163, 15);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qID` int(5) NOT NULL,
  `qType` int(2) NOT NULL,
  `qMain` varchar(500) NOT NULL,
  `qOptions` varchar(1000) NOT NULL,
  `cAnswer` varchar(1000) NOT NULL,
  `qMarks` int(5) NOT NULL,
  `uploadedBy` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qID`, `qType`, `qMain`, `qOptions`, `cAnswer`, `qMarks`, `uploadedBy`) VALUES
(28, 0, 'CHANGED', 'cat-|-dog-|-mouse-|-scene', 'dog->|mouse->|', 3, 16),
(29, 0, 'which one??', 'a-|-b-|-c-|-d', 'a->|b->|', 5, 16),
(30, 0, 'Real Question : May we Go ? ? ?', 'Yes-|-Lets Go-|-Ready-|-OK', 'Yes->|Lets Go->|Ready->|OK->|', 6, 16),
(31, 0, 'My Age ?', '18-|-19-|-20-|-21', '20->|', 6, 16),
(32, 0, 'Hows the Josh ? ? ?', 'High-|-low-|-Rising-|-normal', 'High->|Rising->|', 10, 16),
(33, 0, 'Which of there are Halls ?', 'Wolfendan Hall-|-Richardson Hall-|-B. Sen Hall-|-Sengupta Hall', 'Wolfendan Hall->|Richardson Hall->|Sengupta Hall->|', 15, 31),
(34, 0, 'Where is CST Department?', 'MN Dastur-|-I Hall-|-Main Building-|-SnT', 'MN Dastur->|', 5, 31),
(35, 0, 'Which is the Best Department in IIEST Shibpur ?', 'IT-|-EE-|-CST-|-ETC', 'CST->|', 10, 31),
(54, 0, 'sdfsgsghs', 'fsdfsdf-|-sfsdfdsf-|-fdfs-|-fsdsefe', 'sfsdfdsf->|', 0, 16),
(93, 0, 'Additional', 'sgfwe-|-fefe-|-wegg-|-wegewfef', 'fefe->|', 5, 16),
(95, 0, 'Extra', 'rgrg-|-egerg-|-greger-|-rgerge', 'egerg->|', 5, 16),
(97, 0, 'vsvdsvavdsgwg', 'gsdgr-|-rgeg-|-ergreg-|-regerg', '', 5, 16),
(157, 0, 'bcdefg', 'q-|-w-|-e-|-r', 'e->|', 5, 16),
(159, 0, 'Are you Deleted ? ? ?', 'dfsfeg-|-regergre-|-grgreg-|-rgerg', 'regergre->|', 10, 16),
(160, 0, 'SGSGSRGW', 'FDSG-|-HTHTH-|-TJRTJR-|-TYRYET', 'TJRTJR->|', 3, 16),
(161, 0, '8) Which is the Best Department in IIEST Shibpur ?', 'IT-|-EE-|-CST-|-ETC', 'CST->|', 10, 16),
(162, 0, 'fasgwhrhwherh', 'cat-|-Lets Go-|-frog-|-fsdfsd', 'cat->|', 10, 1),
(163, 0, '6) Which of there are Halls ?', 'Wolfendan Hall-|-Richardson Hall-|-B. Sen Hall-|-Sengupta Hall', 'Wolfendan Hall->|Richardson Hall->|Sengupta Hall->|', 30, 1);

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
(7, 7, 31, 'dog->|c&|&d->|Lets Go->|19->|->|', 6, '00:00:17', 0),
(8, 7, 1, 'dog&|&mouse->|b&|&c->|Yes&|&Lets Go&|&Ready&|&OK->|20->|High&|&Rising->|gewge->|fefeef->|', 30, '00:00:31', 1),
(9, 7, 1, 'dog&|&mouse->|a&|&b&|&c&|&d->|Yes&|&Lets Go->|20->|High&|&Rising->|sgfwe&|&fefe->|egerg->|', 24, '00:00:26', 1),
(10, 7, 33, 'dog&|&mouse->|a->|Yes&|&Lets Go->|20->|High&|&Rising->|wegg->|egerg->|', 24, '00:01:20', 1),
(11, 7, 16, 'dog->|c->|Yes&|&Lets Go->|20->|High&|&Rising->|wegewfef->|egerg->|', 21, '00:00:26', 1),
(12, 8, 16, 'fefe->|rgrg->|ergreg->|', 5, '00:00:30', 0),
(13, 15, 30, 'cat->|Wolfendan Hall&|&Richardson Hall&|&Sengupta Hall->|', 40, '00:00:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testmap`
--

CREATE TABLE `testmap` (
  `Sl` int(5) NOT NULL,
  `testID` int(5) NOT NULL,
  `userID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testmap`
--

INSERT INTO `testmap` (`Sl`, `testID`, `userID`) VALUES
(1, 7, 1),
(2, 7, 2),
(3, 7, 3),
(4, 7, 4),
(5, 7, 5),
(6, 7, 30),
(8, 8, 1),
(9, 8, 2),
(10, 8, 3),
(11, 8, 4),
(12, 8, 16),
(13, 15, 2),
(14, 15, 3),
(15, 15, 4),
(16, 15, 5),
(17, 15, 30);

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
  `scheduled_on` varchar(30) NOT NULL,
  `parent_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`test_id`, `test_name`, `test_type`, `test_img`, `test_desc`, `uploaded_by`, `time_limit`, `totalM`, `passMarks`, `scheduled_on`, `parent_id`) VALUES
(7, 'Testing Test', 0, '', 'fvfvdfvfvfd', '16', '00:10:01', 45, '10', '10-03-2025', 1),
(8, 'DSA', 0, '', 'dkjasbdjbdjasbdkjabdkj', '16', '00:00:30', 20, '10', '10-03-2025', 1),
(9, 'fvdfvdfbdfbd', 0, '', ' dbdscsvdsf', '16', '00:00:20', 0, '', '0000-00-00 00:00:00', 27),
(10, 'fdfsdf', 0, '', 'ddsfsf', '16', '00:00:12', 0, '', '0000-00-00 00:00:00', 1),
(11, 'vergefv', 0, '', 'effveffvefv', '16', '00:00:30', 0, '', '0000-00-00 00:00:00', 44),
(12, 'dcsdc', 0, '', 'dvsdv', '6', '00:00:20', 0, '', '0000-00-00 00:00:00', 46),
(13, 'FRICTION', 0, '', 'HDBSD JFDF  ', '31', '00:01:01', 30, '10', '0000-00-00 00:00:00', 49),
(14, 'FRICTION PART 1', 0, '', 'JSBJ FAFKJ AFAFNAGE F EGLKEN', '16', '00:02:01', 13, '10', '', 56),
(15, 'WEB D', 0, '', 'dedecejc rvergerg', '1', '00:01:01', 40, '15', '10-03-2025', 58);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `Topic_ID` int(5) NOT NULL,
  `Topic_Name` varchar(20) NOT NULL,
  `Topic_IMG` varchar(50) NOT NULL,
  `Descc` varchar(100) NOT NULL,
  `type` int(1) NOT NULL,
  `Parent_ID` int(5) NOT NULL,
  `UploadedBy` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`Topic_ID`, `Topic_Name`, `Topic_IMG`, `Descc`, `type`, `Parent_ID`, `UploadedBy`) VALUES
(1, 'Course 1', '', 'This is the first ever Course to be inserted through databse.', 0, 0, 16),
(2, 'Course 2', '', 'This the second Course and the one to be starting this first insertion to database along with Topic ', 0, 0, 16),
(3, 'Course 3', '', 'This is the third Course.', 0, 0, 1),
(4, 'Mini Project', '', 'This contains test and contents which can be very useful for our Mini-Minor-Project', 0, 0, 1),
(5, 'WILL IT WORK Part 4', '', 'Now I have a Strong Feeling of Intuition that it will work', 0, 0, 16),
(6, 'WILL IT WORK Part 5', '', 'DO NOT CLICKKKKKKKKKKKKK', 0, 0, 16),
(7, 'Stupid Topic', '', 'By Stupid Person', 0, 0, 26),
(8, 'Stupid Test ', '', 'By Stupid Tester', 0, 0, 26),
(9, '', '', '', 0, 0, 26),
(10, 'LIFE ', '', 'GREAT AND AMAZING', 0, 0, 16),
(11, 'Show Courses', '', 'Testing wether it will show course after adding it', 0, 0, 4),
(13, 'Hmmmm', '', 'HMMM hmmm HmMm hMmM', 0, 0, 4),
(14, 'NOOOOOO', '', 'YES!!!!!!', 0, 0, 4),
(15, 'YESSSSSS', '', 'NOooooo!!!', 0, 0, 4),
(16, 'YESSS But Later', '', 'OK GOT IT', 0, 0, 4),
(17, 'Why Not Ending', '', 'Dont Know', 0, 0, 4),
(18, 'THE END OF TODAY', '', 'IS THE START OF TOMORROW', 0, 0, 4),
(19, 'YEss WOrking', '', 'hmmm OK OK', 0, 0, 4),
(20, 'HAppinesss', '', 'Feeling Great Today', 0, 0, 16),
(21, 'vxcvxvx', '', 'xcvcxvxv', 0, 0, 16),
(22, 'Surprise Test', '', 'Yooo I got a very twisting unexpected surprise', 0, 0, 16),
(23, 'Unexpected ', '', 'The Surprise was too unexpected', 0, 22, 16),
(24, 'Unexpected Happiness', '', 'Yeaah Yessss', 0, 22, 16),
(25, 'Once More', '', 'Surprise', 0, 22, 16),
(26, 'Unexpected Sadness', '', 'Nooo, Just Kidding', 0, 22, 16),
(27, 'Sub_Topic 1', '', 'This is a SubTopic named Sub_Topic 1 for the Topic named Topic_1', 0, 1, 16),
(28, 'sfdssd', '', 'vfdvfvf', 0, 6, 16),
(29, 'vvsfvsfb', '', 'bvccvb', 0, 6, 16),
(30, 'fdgg', '', 'dggrdg', 0, 1, 16),
(31, 'grdgd', '', 'gdrgdrg', 0, 30, 16),
(32, 'dvsdvdsvs', '', 'dvdsvs', 0, 28, 16),
(33, 'fsdgfsgsf', '', 'fsdgfsggf', 0, 32, 16),
(34, 'fsefffsfe', '', '', 0, 29, 16),
(35, 'fvdfvdsvvf', '', 'dfgdggsrg', 0, 29, 16),
(36, 'dvsdvsfsf', '', 'fgsfgsfs', 0, 26, 16),
(37, 'Physics', '', 'This was the hardest subject in 1st sem', 0, 0, 16),
(38, 'regerge', '', 'gergergerg', 0, 0, 16),
(39, 'dvdvfdg', '', 'gfdgdfgd', 0, 2, 16),
(40, 'gfdgdfg', '', 'gdfgdf', 0, 2, 16),
(41, 'fdgd', '', 'fgd', 0, 40, 16),
(42, '', '', '', 0, 0, 16),
(43, 'fdgdeger', '', 'gregerge gergeg gregreg gergerg', 0, 2, 16),
(44, 'Sum', '', 'xbsb xwskxjwbxkjw dcedbckbcde dcedckjdebce dcedcc', 0, 0, 16),
(45, '3rferfrfrferfr', '', 'ferfrefv', 0, 44, 16),
(46, 'dscsdcds', '', 'dsvdsvds', 0, 0, 6),
(47, 'dsfsdgvgdg', '', 'dsfsddf', 0, 0, 30),
(48, 'SCIECE X', '', 'adbasdbsajkd djasdk kkdnajsdkja askjdnsacasc saaskcsancasjc ssac ', 0, 0, 31),
(49, 'PHYSICS', '', 'JHVHS SJ CSSJC C CSS S DSD', 0, 48, 31),
(50, 'CHEMISTRY', '', 'EJENDJD DJD EFEF D DDD FEFEKJD  EFE', 0, 48, 31),
(51, 'Testing20', '', 'dsdfegfegrwgrgwegweg', 0, 0, 16),
(53, 'PRIVATE COURSE', '', 'This is the first Private Course ever created and is created by tester5', 1, 0, 16),
(54, 'My Course', '', 'sffegdqwfwegwrbrhwwfw', 1, 0, 16),
(55, 'PHYSICS II', '', 'This includes various Physics Concept Tests', 0, 0, 16),
(56, 'FRICTION', '', 'KDKFJEFF GKNKNS', 0, 55, 16),
(57, 'CHEMISTRY', '', 'fwgwefwweg', 0, 0, 16),
(58, 'Private Course Trial', '', 'gvds vberger erger erg ', 1, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`Sl`);

--
-- Indexes for table `qbank`
--
ALTER TABLE `qbank`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `testmap`
--
ALTER TABLE `testmap`
  ADD PRIMARY KEY (`Sl`);

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
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `Sl` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `qbank`
--
ALTER TABLE `qbank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `resultID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `testmap`
--
ALTER TABLE `testmap`
  MODIFY `Sl` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `test_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `Topic_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
