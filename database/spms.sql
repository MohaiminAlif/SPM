-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 05:47 PM
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
-- Database: `group_4_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `serial` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`serial`, `id`, `firstName`, `lastName`, `email`, `password`) VALUES
(1, 1, 'admin', '', 'admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `co`
--

CREATE TABLE `co` (
  `serial` int(11) NOT NULL,
  `courseId` varchar(100) NOT NULL,
  `ploId` int(11) NOT NULL,
  `co1` tinyint(1) DEFAULT NULL,
  `co2` tinyint(1) DEFAULT NULL,
  `co3` tinyint(1) DEFAULT NULL,
  `co4` tinyint(1) DEFAULT NULL,
  `co5` tinyint(1) DEFAULT NULL,
  `co6` tinyint(1) DEFAULT NULL,
  `co7` tinyint(1) DEFAULT NULL,
  `co8` tinyint(1) DEFAULT NULL,
  `co9` tinyint(1) DEFAULT NULL,
  `co10` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co`
--

INSERT INTO `co` (`serial`, `courseId`, `ploId`, `co1`, `co2`, `co3`, `co4`, `co5`, `co6`, `co7`, `co8`, `co9`, `co10`) VALUES
(1, 'CSE-101', 1, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10),
(2, 'EEE-101', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'EEE-101', 3, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'EEE-101', 4, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'EEE-101', 5, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(6, 'EEE-101', 6, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'EEE-101', 7, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(8, 'EEE-101', 8, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'EEE-101', 9, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(10, 'EEE-101', 10, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL),
(11, 'EEE-101', 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(12, 'EEE-101', 12, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(13, 'EEE-101', 13, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL),
(14, 'EEE-101', 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(15, 'EEE-101', 15, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `serial` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `programId` varchar(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `credit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`serial`, `id`, `programId`, `title`, `credit`) VALUES
(1, 'CSE-101', 'CSE', 'Programming', 4),
(2, 'EEE-101', 'EEE', 'Intronduction to electronics', 3);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `serial` int(11) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `section` varchar(10) NOT NULL,
  `examName` varchar(50) NOT NULL,
  `courseId` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `q1Max` int(11) DEFAULT NULL,
  `q2Max` int(11) DEFAULT NULL,
  `q3Max` int(11) DEFAULT NULL,
  `q4Max` int(11) DEFAULT NULL,
  `q5Max` int(11) DEFAULT NULL,
  `q6Max` int(11) DEFAULT NULL,
  `q7Max` int(11) DEFAULT NULL,
  `q8Max` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`serial`, `semester`, `section`, `examName`, `courseId`, `status`, `q1Max`, `q2Max`, `q3Max`, `q4Max`, `q5Max`, `q6Max`, `q7Max`, `q8Max`) VALUES
(1, 'Spring 22', '2', 'Midterm', 'CSE-101', 1, 1, 3, 4, 7, 4, 7, 4, 6),
(2, 'spring 22', '3', 'final', 'EEE-101', NULL, 44, 57, 6, 5, 45, 54, 87, 87);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `serial` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(200) NOT NULL,
  `uName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`serial`, `id`, `firstName`, `lastName`, `email`, `password`, `uName`) VALUES
(1, 164543, 'faculty', 'f', 'faculty@gmail.com', '123456', 'IUB');

-- --------------------------------------------------------

--
-- Table structure for table `highermanagement`
--

CREATE TABLE `highermanagement` (
  `serial` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(200) NOT NULL,
  `uName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `highermanagement`
--

INSERT INTO `highermanagement` (`serial`, `id`, `firstName`, `lastName`, `email`, `password`, `uName`) VALUES
(1, 1, 'HM', 'HM', 'hm@gmail.com', '123456', 'IUB');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `serial` int(11) NOT NULL,
  `examId` int(11) NOT NULL,
  `section` varchar(5) NOT NULL,
  `studentId` int(11) NOT NULL,
  `mark1` int(11) DEFAULT NULL,
  `mark1Co` int(11) DEFAULT NULL,
  `mark2` int(11) DEFAULT NULL,
  `mark2Co` int(11) DEFAULT NULL,
  `mark3` int(11) DEFAULT NULL,
  `mark3Co` int(11) DEFAULT NULL,
  `mark4` int(11) DEFAULT NULL,
  `mark4Co` int(11) DEFAULT NULL,
  `mark5` int(11) DEFAULT NULL,
  `mark5Co` int(11) DEFAULT NULL,
  `mark6` int(11) DEFAULT NULL,
  `mark6Co` int(11) DEFAULT NULL,
  `mark7` int(11) DEFAULT NULL,
  `mark7Co` int(11) DEFAULT NULL,
  `mark8` int(11) DEFAULT NULL,
  `mark8Co` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`serial`, `examId`, `section`, `studentId`, `mark1`, `mark1Co`, `mark2`, `mark2Co`, `mark3`, `mark3Co`, `mark4`, `mark4Co`, `mark5`, `mark5Co`, `mark6`, `mark6Co`, `mark7`, `mark7Co`, `mark8`, `mark8Co`) VALUES
(1, 1, '2', 1732428, 3, 1, 5, 2, 7, 1, 7, 4, 5, 8, 8, 4, 9, 8, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `marks_exam`
--

CREATE TABLE `marks_exam` (
  `sl` int(11) NOT NULL,
  `student_id` int(100) NOT NULL,
  `course_id` varchar(100) NOT NULL,
  `exam_name` varchar(200) NOT NULL,
  `semester` varchar(200) NOT NULL,
  `section` varchar(5) NOT NULL,
  `q1_mark` int(11) DEFAULT NULL,
  `q1_co` int(11) DEFAULT NULL,
  `q1_max` int(11) DEFAULT NULL,
  `q2_mark` int(11) DEFAULT NULL,
  `q2_co` int(11) DEFAULT NULL,
  `q2_max` int(11) DEFAULT NULL,
  `q3_mark` int(11) DEFAULT NULL,
  `q3_co` int(11) DEFAULT NULL,
  `q3_max` int(11) DEFAULT NULL,
  `q4_mark` int(11) DEFAULT NULL,
  `q4_co` int(11) DEFAULT NULL,
  `q4_max` int(11) DEFAULT NULL,
  `q5_mark` int(11) DEFAULT NULL,
  `q5_co` int(11) DEFAULT NULL,
  `q5_max` int(11) DEFAULT NULL,
  `q6_mark` int(11) DEFAULT NULL,
  `q6_co` int(11) DEFAULT NULL,
  `q6_max` int(11) DEFAULT NULL,
  `q7_mark` int(11) DEFAULT NULL,
  `q7_co` int(11) DEFAULT NULL,
  `q7_max` int(11) DEFAULT NULL,
  `q8_mark` int(11) DEFAULT NULL,
  `q8_co` int(11) DEFAULT NULL,
  `q8_max` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks_exam`
--

INSERT INTO `marks_exam` (`sl`, `student_id`, `course_id`, `exam_name`, `semester`, `section`, `q1_mark`, `q1_co`, `q1_max`, `q2_mark`, `q2_co`, `q2_max`, `q3_mark`, `q3_co`, `q3_max`, `q4_mark`, `q4_co`, `q4_max`, `q5_mark`, `q5_co`, `q5_max`, `q6_mark`, `q6_co`, `q6_max`, `q7_mark`, `q7_co`, `q7_max`, `q8_mark`, `q8_co`, `q8_max`) VALUES
(1, 1732428, 'CSE-101', 'Midterm', 'spring 22', '2', 5, 1, 7, 3, 7, 3, 8, 3, 8, 3, 9, 6, 4, 7, 4, 8, 5, 9, 5, 8, 5, 6, 5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `plo`
--

CREATE TABLE `plo` (
  `serial` int(11) NOT NULL,
  `programId` varchar(50) NOT NULL,
  `indx` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plo`
--

INSERT INTO `plo` (`serial`, `programId`, `indx`, `title`, `description`) VALUES
(1, 'CSE', 1, 'plo 1', 'this is plo 1'),
(2, 'EEE', 1, 'plo 1', 'this is plo 1'),
(3, 'EEE', 2, 'plo 2', 'this is plo 2'),
(4, 'EEE', 3, 'plo 3', 'this is plo 3'),
(5, 'EEE', 4, 'plo 4', 'this is plo 4'),
(6, 'EEE', 5, 'plo 5', 'this is plo 5'),
(7, 'EEE', 6, 'plo 6', 'this is plo 6'),
(8, 'EEE', 7, 'plo 7', 'this is plo 7'),
(9, 'EEE', 8, 'plo 8', 'this is plo 8'),
(10, 'EEE', 9, 'plo 9', 'this is plo 9'),
(11, 'EEE', 10, 'plo 10', 'this is plo 10'),
(12, 'EEE', 11, 'plo 11', 'this is plo 11'),
(13, 'EEE', 12, 'plo 12', 'this is plo 12'),
(14, 'EEE', 13, 'plo 13', 'this is plo 13'),
(15, 'EEE', 14, 'plo 14', 'this is plo 14'),
(16, 'EEE', 15, 'plo 15', 'this is plo 15'),
(17, 'EEE', 16, 'plo 16', 'this is plo 16');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `serial` int(11) NOT NULL,
  `id` varchar(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `school` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`serial`, `id`, `title`, `school`) VALUES
(1, 'CSE', 'Computer science and engineering', 'SETS'),
(2, 'EEE', 'Electrical and Electronics Engineering', 'SETS'),
(3, 'BBA', 'Business', 'SLASS'),
(4, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `registeroffice`
--

CREATE TABLE `registeroffice` (
  `serial` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(200) NOT NULL,
  `uName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registeroffice`
--

INSERT INTO `registeroffice` (`serial`, `id`, `firstName`, `lastName`, `email`, `password`, `uName`) VALUES
(1, 1234567, 'Register', 'Office', 'ro@gmail.com', '123456', 'IUB');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `serial` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `programId` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `uName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`serial`, `id`, `firstName`, `lastName`, `email`, `programId`, `password`, `uName`) VALUES
(7, 1732428, 'student', 'st', 'student@gmail.com', 'CSE', '123456', 'IUB'),
(9, 12345, 'st2', 'st', 'st@gmail.com', 'CSE', '123456', 'IUB');

-- --------------------------------------------------------

--
-- Table structure for table `ugc`
--

CREATE TABLE `ugc` (
  `serial` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(200) NOT NULL,
  `uName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ugc`
--

INSERT INTO `ugc` (`serial`, `id`, `firstName`, `lastName`, `email`, `password`, `uName`) VALUES
(1, 1, 'UGC', 'UGC', 'ugc@gmail.com', '123456', 'IUB');

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `serial` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `universityName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`serial`, `id`, `universityName`) VALUES
(1, 1, 'IUB');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `program_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `program_id`) VALUES
(1, 'student', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`serial`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `co`
--
ALTER TABLE `co`
  ADD PRIMARY KEY (`serial`),
  ADD UNIQUE KEY `ploId` (`ploId`),
  ADD KEY `courseId` (`courseId`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`serial`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `programId` (`programId`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`serial`),
  ADD KEY `courseId` (`courseId`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`serial`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `uName` (`uName`);

--
-- Indexes for table `highermanagement`
--
ALTER TABLE `highermanagement`
  ADD PRIMARY KEY (`serial`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`serial`),
  ADD KEY `examId` (`examId`),
  ADD KEY `studentId` (`studentId`);

--
-- Indexes for table `marks_exam`
--
ALTER TABLE `marks_exam`
  ADD PRIMARY KEY (`sl`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `plo`
--
ALTER TABLE `plo`
  ADD PRIMARY KEY (`serial`),
  ADD KEY `programId` (`programId`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`serial`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `registeroffice`
--
ALTER TABLE `registeroffice`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`serial`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `uName` (`uName`),
  ADD KEY `programId` (`programId`);

--
-- Indexes for table `ugc`
--
ALTER TABLE `ugc`
  ADD PRIMARY KEY (`serial`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`serial`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `universityName` (`universityName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `co`
--
ALTER TABLE `co`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `highermanagement`
--
ALTER TABLE `highermanagement`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `marks_exam`
--
ALTER TABLE `marks_exam`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plo`
--
ALTER TABLE `plo`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `registeroffice`
--
ALTER TABLE `registeroffice`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ugc`
--
ALTER TABLE `ugc`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `co`
--
ALTER TABLE `co`
  ADD CONSTRAINT `co_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `co_ibfk_2` FOREIGN KEY (`ploId`) REFERENCES `plo` (`serial`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`programId`) REFERENCES `program` (`id`);

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `course` (`id`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`uName`) REFERENCES `university` (`universityName`);

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`examId`) REFERENCES `exam` (`serial`),
  ADD CONSTRAINT `marks_ibfk_2` FOREIGN KEY (`studentId`) REFERENCES `student` (`id`);

--
-- Constraints for table `marks_exam`
--
ALTER TABLE `marks_exam`
  ADD CONSTRAINT `marks_exam_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `plo`
--
ALTER TABLE `plo`
  ADD CONSTRAINT `plo_ibfk_1` FOREIGN KEY (`programId`) REFERENCES `program` (`id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`uName`) REFERENCES `university` (`universityName`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`programId`) REFERENCES `program` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
