-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 01:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedback`

CREATE Database feedback;

use feedback;

--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminid`, `username`, `password`) VALUES
(1, 'admin1', 'password1'),
(2, 'admin2', 'password2'),
(3, 'admin3', 'password3');

-- --------------------------------------------------------

--
-- Table structure for table `grievance`
--

CREATE TABLE `grievance` (
  `roll` varchar(20) NOT NULL,
  `FeedBackMsg` varchar(1024) NOT NULL,
  `Subject` varchar(150) DEFAULT NULL,
  `DateTime` date NOT NULL,
  `topic` varchar(150) DEFAULT NULL,
  `type` enum('Institute','Faculty','Other') NOT NULL,
  `rate` enum('1','2','3','4','5') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grievance`
--

INSERT INTO `grievance` (`roll`, `FeedBackMsg`, `Subject`, `DateTime`, `topic`, `type`, `rate`) VALUES
('101', 'Lorem ipsum dolor sit amet...', 'Math Homework', '2024-02-20', 'Random text for roll number 101','Institute', '3'),
('102', 'a facilisi. Aenean at...', 'Science Quiz', '2024-02-20', 'Random text for roll number 102','Institute', '3'),
('103', 'Fusce eu nisi in nisi suscipit', 'English Essay', '2024-02-21', 'Random text for roll number 103','Institute', '3'),
('104', 'Curabitur tristique leo id...', 'History Project', '2024-02-21', 'Random text for roll number 104','Institute', '3'),
('105', 'Proin quis eros vitae tellus...', 'Art Assignment', '2024-02-22', 'Random text for roll number 105','Institute', '3'),
('106', 'Vestibulum et ullamcorper...', 'Physics Lab', '2024-02-22', 'Random text for roll number 106','Institute', '3'),
('107', 'Sed sed nisi sed purus...', 'Chemistry Lab', '2024-02-23', 'Random text for roll number 107','Institute', '3'),
('108', 'Integer malesuada mauris ut...', 'Geography Project', '2024-02-24', 'Random text for roll number 108','Institute', '3'),
('109', 'Donec consequat, odio nec...', 'Spanish Assignment', '2024-02-25', 'Random text for roll number 109','Institute', '3'),
('110', 'Phasellus nec nunc tempor...', 'Biology Quiz', '2024-02-25', 'Random text for roll number 110','Institute', '3'),
('111', 'Vestibulum ante ipsum primis...', 'Music Presentation', '2024-02-26', 'Random text for roll number 111','Institute', '3'),
('112', 'Mauris sed libero id a...', 'Computer Science', '2024-02-27', 'Random text for roll number 112','Institute', '3'),
('1', 'this is in the march', 'Art', '2024-02-24', 'topic is written in march', 'Other', '5'),
('1', ' test', 'Art', '2024-02-29', 'topic', 'Other', '5'),
('1', 'topic written by the 1 rollnumber', 'Science', '2024-02-02', 'main topic of the roll number', 'Other', '5'),
('1', 'topic written by the 1 rollnumber', 'Science', '2024-02-02', 'main topic of the roll number', 'Other', '5'),
('1', 'this is a good message', 'Music', '2024-03-08', 'hello wolrld', 'Other', '5'),
('1', '  sa', 'Music', '2024-03-08', '1', 'Other', '5'),
('1', 'helloworld', 'Art', '2024-03-09', '11200', 'Other', '5'),
('1', 'axaw', 'Chemistry', '2024-03-14', 'test topic', 'Other', '5'),
('1', 'hghgghg', 'Chemistry', '2024-03-14', 'Cleanliness', 'Other', '5'),
('1', ' qwedjw', 'Music', '2024-03-08', 'nice topic', 'Other', '5'),
('1', 'cw', 'Chemistry', '2024-03-12', 'hjk', 'Other', '5'),
('1', 'secew', 'test', '2024-04-03', 'wefwe', 'Other', '5'),
('1', 'secew', 'test', '2024-04-03', 'wefwe', 'Other', '5'),
('1', 'dfwe', 'test', '2024-04-02', 'srfwef', 'Other', '5'),
('1', 'dfwe', 'test', '2024-04-02', 'srfwef', 'Other', '5'),
('1', 'dfwe', 'test', '2024-04-02', 'srfwef', 'Other', '5'),
('1', 'dfwe', 'test', '2024-04-02', 'srfwef', 'Other', '5'),
('1', 'dfwe', 'test', '2024-04-02', 'srfwef', 'Other', '5'),
('1', 'dfwe', 'test', '2024-04-02', 'srfwef', 'Other', '5'),
('1', 'dfwe', 'test', '2024-04-02', 'srfwef', 'Other', '5'),
('1', 'sdfewfw', 'Select Subject', '2024-04-03', 'srvwr', 'Other', '5'),
('1', 'sdfewfw', 'Select Subject', '2024-04-03', 'srvwr', 'Other', '5'),
('1', 'ewfwef', 'Biology', '2024-04-03', 'wcwefw', 'Other', '5'),
('1', 'ewfwef', 'Biology', '2024-04-03', 'wcwefw', 'Other', '5'),
('1', 'ewfwef', 'Biology', '2024-04-03', 'wcwefw', 'Other', '5'),
('1', 'sdwedfwws', 'Select Subject', '2024-04-03', 'hello world', 'Other', '5'),
('1', 'hello world', 'Select Subject', '2024-04-03', 'testing', 'Other', '5'),
('1', 'hello world', 'Select Subject', '2024-04-03', 'testing', 'Other', '5'),
('1', 'hello world', 'Select Subject', '2024-04-03', 'testing', 'Other', '5'),
('1', 'this i a test feedback', 'Select Subject', '2024-04-02', 'this is the best topic', 'Other', '5'),
('1', 'this i a test feedback', 'Select Subject', '2024-04-02', 'this is the best topic', 'Other', '5'),
('1', 'jaxk', 'Select Subject', '2024-04-02', 'hello world', 'Other', '5'),
('1', 'ewcfwedfwed', 'Music', '2024-04-19', 'emfwenw', 'Other', '5'),
('1', 'wefed', 'dell', '0000-00-00', 'rtgerg', 'Other', '5'),
('1', 'wefed', 'dell', '2024-11-11', 'rtgerg', 'Other', '5'),
('1', 'wefed', 'dell', '2024-04-04', 'rtgerg', 'Other', '5'),
('1', 'wefed', 'dell', '2024-04-04', 'rtgerg', 'Other', '5');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `roll_number` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `semester` int(11) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `college` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`roll_number`, `name`, `semester`, `branch`, `college`, `password`) VALUES
(1, 'hero', 2,'Computer Science', 'ABC College', ' '),
(2, 'New User', 2,'Computer Science', 'ABC College', 'pass'),
(101, 'John Doe', 3, 'Computer Science', 'ABC College', 'password1'),
(102, 'Jane Smith', 2, 'Electrical Engineering', 'XYZ University', 'password2'),
(103, 'Alice Johnson', 4, 'Mechanical Engineering', 'DEF Institute', 'password3'),
(104, 'Michael Brown', 2, 'Civil Engineering', 'GHI College', 'password4'),
(105, 'Emily Wilson', 3, 'Chemical Engineering', 'JKL University', 'password5'),
(106, 'David Lee', 1, 'Information Technology', 'MNO Institute', 'password6');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `semester` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`semester`, `subject_name`) VALUES
(1, 'Mathematics'),
(1, 'Physics'),
(1, 'Computer Science'),
(1, 'Literature'),
(1, 'History'),
(2, 'Chemistry'),
(2, 'Biology'),
(2, 'Art'),
(2, 'Music'),
(2, 'Psychology'),
(3, 'Geography'),
(3, 'Economics'),
(3, 'Sociology'),
(3, 'Political Science'),
(3, 'Foreign Language'),
(4, 'Statistics'),
(4, 'Philosophy'),
(4, 'Engineering'),
(4, 'Architecture'),
(4, 'Anthropology');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`roll_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
