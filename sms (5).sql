-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 04, 2020 at 01:10 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uname` varchar(20) NOT NULL,
  `passwd` varchar(30) NOT NULL,
  `token` varchar(10) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `passwd`, `token`, `mobile`) VALUES
(1, 'admin', 'admin', '', '7501629082');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

DROP TABLE IF EXISTS `batch`;
CREATE TABLE IF NOT EXISTS `batch` (
  `bid` int(10) NOT NULL AUTO_INCREMENT,
  `time` time NOT NULL,
  `day` varchar(10) NOT NULL,
  `cid` int(10) NOT NULL,
  PRIMARY KEY (`bid`),
  KEY `cid` (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`bid`, `time`, `day`, `cid`) VALUES
(46, '23:00:00', 'Sunday', 21),
(47, '01:30:00', 'Wenesday', 24),
(48, '03:00:00', 'Friday', 19),
(49, '12:00:00', 'Sunday', 19),
(50, '07:30:00', 'Thrusday', 23),
(51, '05:30:00', 'Thrusday', 24),
(52, '05:30:00', 'Monday', 22),
(53, '14:00:00', 'Saturday', 18),
(54, '01:59:00', 'Thrusday', 24),
(55, '23:01:00', 'Tuesday', 18);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `cid` int(10) NOT NULL AUTO_INCREMENT,
  `course_name` char(30) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `course_fees` decimal(50,0) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `course_name`, `duration`, `course_fees`) VALUES
(18, 'dtp', '12', '300002'),
(19, 'tally', '6 ', '2500'),
(21, 'photoshop', '6 ', '2050'),
(22, 'ms office', '6 ', '2000'),
(23, 'cca', '6 ', '2500'),
(24, 'web devolop', '12 ', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `fees_type`
--

DROP TABLE IF EXISTS `fees_type`;
CREATE TABLE IF NOT EXISTS `fees_type` (
  `fees_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `fees_type` varchar(20) NOT NULL,
  PRIMARY KEY (`fees_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees_type`
--

INSERT INTO `fees_type` (`fees_type_id`, `fees_type`) VALUES
(5, 'admission'),
(6, 'tuition'),
(7, 'exam'),
(8, 'others');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `sid` int(6) NOT NULL AUTO_INCREMENT,
  `stu_id` varchar(10) NOT NULL,
  `stu_name` varchar(25) NOT NULL,
  `Gur _name` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `aadhar` varchar(20) NOT NULL,
  `gender` char(10) NOT NULL,
  `caste` char(10) DEFAULT NULL,
  `edu_qua` char(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `batch_id` varchar(50) DEFAULT NULL,
  `photo` varchar(350) NOT NULL,
  `certificate_issue` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`sid`),
  KEY `batch_id` (`batch_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `stu_id`, `stu_name`, `Gur _name`, `address`, `mobile`, `dob`, `aadhar`, `gender`, `caste`, `edu_qua`, `course_id`, `batch_id`, `photo`, `certificate_issue`) VALUES
(34, 'S1', 'mou kundu', 'mr arabinda das', 'dhaka ', '9614312163', '1990-06-20', '123456', 'Female', 'General', 'kolkata', 23, '55', 'student_img/amalgamation-logo.png', NULL),
(35, 'S35', 'moukundu', 'mr das', 'adr', '789456123', '1990-10-20', '123456', 'Female', 'General', 'du', 19, '50', 'student_img/1 copy.jpg', NULL),
(36, 'S36', 'kamal kundu', 'dip chand', 'adrd ddd', '789456123', '1986-07-25', '123456', 'Male', 'Others', 'duss', 18, '49', 'student_img/WIN_20180819_23_26_51_Pro.jpg', NULL),
(50, 'S50', 'kamal kundu', 'Sanyu', 'Shani Mandir, Old Route No NH 34', '', '0088-02-05', '', 'Male', 'General', '', 18, '52', 'student_img/1 copy.jpg', NULL),
(51, 'S51', 'moukundu', 'Sanyu', 'Shani Mandir, Old Route No NH 34', '7501629082', '1988-12-05', '123456789555', 'Male', 'General', 'dugggggggg', 21, '46', 'student_img/28 kb.jpg', NULL),
(60, 'S60', 'SIRSHENDU3 KUNDU 56', 'dip chand', 'gh', '9614312155', '1899-12-05', '456987', 'Male', 'General', 'Ma', 19, '', 'student_img/MRV_20200118_00_45_20.jpg', NULL),
(61, 'S61', 'SIRSHENDU3 KUNDU 56', 'dip chand', 'gh', '9614312155', '1899-12-05', '456987', 'Male', 'General', 'Ma', 24, '', 'student_img/28 kb.jpg', NULL),
(62, 'S62', 'SIRSHENDU3 KUNDU 56', 'dip chand', 'gh', '9614312155', '1899-12-05', '456987', 'Male', 'General', 'Ma', 24, '', 'student_img/28 kb.jpg', NULL),
(63, 'S63', 'SIRSHENDU3 KUNDU 56', 'dip chand', 'gh', '9614312155', '1899-12-05', '456987', 'Male', 'General', 'Ma', 24, '', 'student_img/28 kb.jpg', NULL),
(64, 'S64', 'SIRSHENDU3 KUNDU 56', 'dip chand', 'gh', '9614312155', '1899-12-05', '456987', 'Male', 'General', 'Ma', 24, '', 'student_img/28 kb.jpg', NULL),
(65, 'S65', 'SIRSHENDU', 'dip chand', 'gh', '9614312155', '1899-12-05', '456987', 'Male', 'General', 'Ma', 24, '', 'student_img/28 kb.jpg', NULL),
(66, 'S66', 'SIRSHENDU', 'dip chand', 'gh', '9614312155', '1899-12-05', '456987', 'Male', 'General', 'Ma', 24, '', 'student_img/28 kb.jpg', NULL),
(67, 'S67', 'SIRSHENDU KUNDU', 'Sanyu kundu', 'Shani Mandir, Old Route No NH 34', '7501629082', '1988-12-05', '456987', 'Male', 'General', 'kolkata', 24, '', 'student_img/28 kb.jpg', NULL),
(68, 'S68', 'ram adhikary', 'Sanyu', 'Barabazar Street', '7501629082', '2020-01-08', '123456789555', 'Male', 'General', 'dusss', 24, '', 'student_img/28 kb.jpg', NULL),
(69, 'S69', 'gh', 'ggg', '456', '45698', '1988-12-05', '45698755555', 'Female', 'General', 'j', 23, '', 'student_img/amalgamation-logo.png', NULL),
(70, 'S70', 'dd', 'ddd', 'ddd', '455', '1988-12-05', '456987', 'Male', 'General', 'd', 23, '', 'student_img/amalgamation-logo.png', NULL),
(71, 'S71', 'dd', 'ddd', 'ddd', '455', '1988-12-05', '456987', 'Male', 'General', 'd', 23, '', 'student_img/amalgamation-logo.png', NULL),
(72, 'S72', 'Sirshendu Kundu', 'Sanyu kundu', 's', '456987', '1988-12-05', '45698755555', 'Male', 'General', 'sd', 18, '', 'student_img/Array', NULL),
(73, 'S73', 'Sirshendu Kundu', 'Sanyu kundu', 's', '456987', '1988-12-05', '45698755555', 'Male', 'General', 'sd', 18, '', 'student_img/amalgamation-logo.png', NULL),
(74, 'S74', 'Sirshendu Kundu', 'Sanyu kundu', 's', '456987', '1988-12-05', '45698755555', 'Male', 'General', 'sd', 18, '', 'student_img/amalgamation-logo.png', NULL),
(75, 'S75', 'SWASTIKA DAS', 'ghj', 'hjki', '456987', '1988-12-05', '45698755555', 'Male', 'General', 'ghjk', 18, '', 'student_img/amalgamation-logo.png', NULL),
(76, 'S76', 'SIRSHENDU KUNDU', 'as', 'a', '9614312155', '1988-12-05', '456987', 'Male', 'General', 'dusss', 23, '', 'student_img/amalgamation-logo.png', NULL),
(77, 'S77', 'SIRSHENDU KUNDU', 'as', 'a', '9614312155', '1988-12-05', '456987', 'Male', 'General', 'dusss', 23, '', 'student_img/amalgamation-logo.png', NULL),
(78, 'S78', 'kamal kundu', 'dip chand', 'dfgtr', '963121568', '1988-12-05', '456987', 'Others', 'General', 'dusss', 24, '', 'student_img/1 copy.jpg', NULL),
(79, 'S79', 'h', 'kkl', 'hghg', '456', '1988-12-05', 'k55', 'Male', 'General', 'h', 24, '', 'student_img/1 copy.jpg', NULL),
(80, 'S80', 'Sirshendu Kundu', 'dip chand', '4', '55', '1988-12-05', '445', 'Male', 'General', '4', 21, '', 'student_img/amalgamation-logo.png', NULL),
(81, 'S81', 'Sirshendu Kundu', 'dip chand', 'sa', '7501629082', '1988-12-05', '456987', 'Male', 'General', '4', 23, '', 'student_img/amalgamation-logo.png', NULL),
(82, 'S82', 'Sirshendu Kundu', 'dip chand', 'a', 'a', '1988-12-05', 's', 'Male', 'General', 'a', 22, '', 'student_img/1 copy.jpg', NULL),
(83, 'S83', 'Sirshendu Kundu', 'dip chand', 'xxxxxxx', '9614312155', '1988-12-05', '45698755555', 'Male', 'General', 'dugggggggg', 23, '', 'student_img/1 copy.jpg', NULL),
(84, 'S84', ' Kundu', 'dip chand', 'xxxx', '9614315555', '1988-12-05', '45698755555', 'Male', 'General', 'dugggggggg', 18, '', 'student_img/amalgamation-logo.png', NULL),
(85, 'S85', 'Sirshendu Kundu23', 'dip chand', 'xxxxxxx', '9614312155', '1988-12-05', '35783', 'Male', 'General', 'dusss', 22, '', 'student_img/1 copy.jpg', NULL),
(86, 'S86', 'amit kundu', '', 'bara', '7501629082', '0000-00-00', '466556699', 'male', 'obc', 'hs', 23, NULL, '', NULL),
(87, 'S87', 'amit kundu1', '', 'bara', '7501629082', '0000-00-00', '466556699', 'male', 'obc', 'hs', 23, NULL, '', NULL),
(88, 'S88', 'hjghjgh \":  ;;', '', 'bara', '7501629082', '0000-00-00', '466556699', 'male', 'obc', 'hs', 23, NULL, '', NULL),
(89, '90', 'amit kundu13', '', 'bara', '7501629082', '0000-00-00', '466556699', 'male', 'obc', 'hs', 23, NULL, '', NULL),
(90, 'S90', 'amit kundu13', '', 'bara', '7501629082', '0000-00-00', '466556699', 'male', 'obc', 'hs', 23, NULL, '', NULL),
(91, 'S91', 'amit kundu13', '', 'bara', '7501629082', '0000-00-00', '466556699', 'male', 'obc', 'hs', 23, NULL, '', NULL),
(94, 'S92', 'amit kundu13', '', 'bara', '', '0000-00-00', '', '', NULL, '', 23, NULL, '', NULL),
(95, 'S95', 'amit kundu13', '', 'bara', '', '0000-00-00', '', '', NULL, '', 23, NULL, '', NULL),
(96, 'S96', 'amit kundu13', '', 'bara', '', '0000-00-00', '', '', NULL, '', 23, NULL, '', NULL),
(97, 'S97', 'amit kundu13', '', '', '', '0000-00-00', '', '', NULL, '', 23, NULL, '', NULL),
(98, 'S98', 'amit kundu13', '', '', '', '0000-00-00', '', '', NULL, '', 23, NULL, '', NULL),
(99, 'S99', 'kamal kundu', '', 'dfgtr', '963121568', '1988-12-05', '456987', 'Others', 'General', 'dusss', 24, NULL, '', NULL),
(100, 'S100', 'Fred', '', 'Flintstone', '', '0000-00-00', '', '', NULL, '', 23, NULL, '', NULL),
(101, 'S101', 'dhg', '', 'a', '5', '0000-00-00', '456987', 'Male', NULL, 'dd', 19, NULL, '', NULL),
(102, 'S102', 'Sirshendu Kundu', 'dip chand', '', '9614315555', '2020-08-04', '35783', 'Male', 'General', 'kolkata', 21, '', '../img/student_img/1', NULL),
(103, 'S103', 'Sirshendu Kundu', 'dip chand', '', '9614315555', '2020-08-04', '35783', 'Male', 'General', 'kolkata', 21, '', '../img/student_img/1', NULL),
(104, 'S104', 'Sirshendu Kundu', 'dip chand', '', '9614315555', '2020-08-04', '35783', 'Male', 'General', 'kolkata', 21, '', '../img/student_img/1', NULL),
(105, 'S105', 'Sirshendu test', 'dip chand', 'h', '9614312155', '2020-08-12', '45698755555', 'Male', 'General', 'Ma', 21, '', 'student_img/download.jpg', NULL);

--
-- Triggers `student`
--
DROP TRIGGER IF EXISTS `student_id_trigger`;
DELIMITER $$
CREATE TRIGGER `student_id_trigger` BEFORE INSERT ON `student` FOR EACH ROW SET NEW.stu_id = 
  CONCAT("S",COALESCE((SELECT MAX(sid)+1 from student),1))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `studentbatches`
--

DROP TABLE IF EXISTS `studentbatches`;
CREATE TABLE IF NOT EXISTS `studentbatches` (
  `sid` int(10) NOT NULL,
  `bid` int(10) NOT NULL,
  PRIMARY KEY (`sid`,`bid`),
  KEY `sid` (`sid`),
  KEY `bid` (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentbatches`
--

INSERT INTO `studentbatches` (`sid`, `bid`) VALUES
(34, 50),
(35, 48),
(36, 53),
(36, 55),
(50, 53),
(50, 55),
(60, 48),
(67, 47),
(67, 51),
(67, 54),
(68, 47),
(68, 51),
(68, 54),
(69, 50),
(70, 50),
(72, 53),
(72, 55),
(73, 53),
(73, 55),
(74, 53),
(74, 55),
(75, 55),
(76, 50),
(77, 50),
(78, 47),
(78, 51),
(78, 54),
(79, 47),
(79, 51),
(79, 54),
(80, 46),
(81, 50),
(82, 52),
(83, 50),
(84, 53),
(85, 52),
(105, 46);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `txn_id` varchar(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` decimal(5,0) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` year(4) NOT NULL,
  `fees_for` int(11) NOT NULL,
  `sid` int(6) NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `sid` (`sid`),
  KEY `fees_for` (`fees_for`)
) ENGINE=InnoDB AUTO_INCREMENT=4504 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tid`, `txn_id`, `date`, `amount`, `month`, `year`, `fees_for`, `sid`) VALUES
(200, 'T200', '2018-09-11 00:33:42', '201', 'January', 2018, 8, 36),
(201, 'T201', '2018-09-11 00:53:32', '500', 'February', 2018, 8, 36),
(202, 'T202', '2018-09-11 00:56:19', '500', 'February', 2018, 8, 36),
(203, 'T203', '2018-09-11 01:47:55', '500', 'February', 2018, 8, 36),
(204, 'T204', '2018-09-11 01:49:29', '500', 'February', 2018, 8, 36),
(206, 'T206', '2018-09-11 01:52:49', '500', 'February', 2018, 8, 36),
(207, 'T207', '2018-09-11 01:53:43', '500', 'February', 2018, 8, 36),
(208, 'T208', '2018-09-11 01:55:53', '500', 'February', 2018, 8, 36),
(209, 'T209', '2018-09-11 01:57:42', '500', 'February', 2018, 8, 36),
(210, 'T210', '2018-09-11 01:58:41', '500', 'February', 2018, 8, 36),
(211, 'T211', '2018-09-11 01:59:17', '500', 'February', 2018, 8, 36),
(212, 'T212', '2018-09-11 02:00:13', '500', 'February', 2018, 8, 36),
(213, 'T213', '2018-09-11 02:02:46', '500', 'February', 2018, 8, 36),
(214, 'T214', '2018-09-11 02:03:46', '500', 'February', 2018, 8, 36),
(215, 'T215', '2018-09-11 02:03:52', '500', 'February', 2018, 8, 36),
(216, 'T216', '2018-09-11 02:04:13', '500', 'February', 2018, 8, 36),
(217, 'T217', '2018-09-11 02:06:08', '500', 'February', 2018, 8, 36),
(218, 'T218', '2018-09-11 02:08:34', '500', 'February', 2018, 8, 36),
(219, 'T219', '2018-09-11 02:09:30', '500', 'February', 2018, 8, 36),
(220, 'T220', '2018-09-11 02:09:50', '500', 'February', 2018, 8, 36),
(221, 'T221', '2018-09-11 02:10:47', '500', 'February', 2018, 8, 36),
(222, 'T222', '2018-09-11 02:11:45', '500', 'February', 2018, 8, 36),
(223, 'T223', '2018-09-11 02:12:44', '500', 'February', 2018, 8, 36),
(224, 'T224', '2018-09-11 02:13:21', '500', 'February', 2018, 8, 36),
(225, 'T225', '2018-09-11 02:14:04', '500', 'February', 2018, 8, 36),
(228, 'T228', '2018-09-11 13:46:28', '201', 'November', 2016, 5, 36),
(229, 'T229', '2018-09-15 22:59:38', '201', 'March', 2016, 6, 36),
(230, 'T230', '2018-09-23 21:43:01', '500', 'March', 2018, 6, 36),
(231, 'T231', '2018-09-25 00:52:12', '1001', 'March', 2017, 5, 36),
(232, 'T232', '2018-09-25 00:55:25', '500', 'April', 2017, 6, 36),
(234, 'T234', '2018-10-03 20:06:31', '1000', 'October', 2018, 6, 36),
(245, 'T245', '2020-01-15 22:29:46', '1000', 'January', 2015, 5, 36),
(4503, 'T246', '2020-01-23 00:20:27', '100', 'January', 2015, 5, 36);

--
-- Triggers `transaction`
--
DROP TRIGGER IF EXISTS `txn_id_trigger`;
DELIMITER $$
CREATE TRIGGER `txn_id_trigger` BEFORE INSERT ON `transaction` FOR EACH ROW SET NEW.txn_id = 
  CONCAT("T",COALESCE((SELECT MAX(tid)+1 from transaction),1))
$$
DELIMITER ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `batch_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `course` (`cid`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`cid`);

--
-- Constraints for table `studentbatches`
--
ALTER TABLE `studentbatches`
  ADD CONSTRAINT `studentbatches_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentbatches_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `batch` (`bid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`fees_for`) REFERENCES `fees_type` (`fees_type_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
