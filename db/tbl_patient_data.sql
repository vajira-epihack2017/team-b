-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 14, 2017 at 07:08 AM
-- Server version: 5.7.19
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient_data`
--

DROP TABLE IF EXISTS `tbl_patient_data`;
CREATE TABLE IF NOT EXISTS `tbl_patient_data` (
  `pat_id` int(11) NOT NULL AUTO_INCREMENT,
  `pat_center` int(11) NOT NULL,
  `pat_institution` varchar(100) NOT NULL,
  `pat_refno` varchar(50) NOT NULL,
  `pat_name` varchar(100) NOT NULL,
  `pat_sex` varchar(10) NOT NULL,
  `pat_mobile` varchar(20) NOT NULL,
  `pat_nic` varchar(50) NOT NULL,
  `pat_invdate` date NOT NULL,
  `pat_street` varchar(500) NOT NULL,
  `pat_area` varchar(100) NOT NULL,
  `pat_sward` varchar(100) NOT NULL,
  `pat_district` varchar(100) NOT NULL,
  `ins_district` varchar(100) NOT NULL,
  `pat_dob` date NOT NULL,
  `pat_yrs` varchar(10) NOT NULL,
  `pat_month` varchar(10) NOT NULL,
  `pat_days` varchar(10) NOT NULL,
  `pat_caldays` int(11) NOT NULL,
  `pat_virus` varchar(10) NOT NULL,
  `pat_test_done` varchar(100) NOT NULL,
  `pat_testdate` date NOT NULL,
  `pat_result` varchar(50) NOT NULL,
  `pat_status` varchar(1) NOT NULL,
  `pat_date` date NOT NULL,
  `pat_lastupdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_patient_data`
--

INSERT INTO `tbl_patient_data` (`pat_id`, `pat_center`, `pat_institution`, `pat_refno`, `pat_name`, `pat_sex`, `pat_mobile`, `pat_nic`, `pat_invdate`, `pat_street`, `pat_area`, `pat_sward`, `pat_district`, `ins_district`, `pat_dob`, `pat_yrs`, `pat_month`, `pat_days`, `pat_caldays`, `pat_virus`, `pat_test_done`, `pat_testdate`, `pat_result`, `pat_status`, `pat_date`, `pat_lastupdated`) VALUES
(1, 0, 'Cooperative Hospital', '1234', 'Lakshman', '2', '0713772882', '753642420V', '2017-11-08', 'Cooperative Hospital', '', 'Wekanda', 'District 2A', 'D7', '2017-02-07', '5', '0', '0', 0, 'Dengue', 'NS1', '2017-11-02', '1', 'Y', '2017-11-08', '2017-11-10 03:21:07'),
(2, 3, 'Police', '2345', 'Name of the patient', '2', '9237983487', '753642420V', '2017-11-08', 'Bosanwatte Lane', '', 'Aluthmawatha', 'District 4', 'D2A', '2017-04-17', '3', '6', '4', 0, 'Dengue', 'RTPCR', '2017-11-02', '1', 'D', '2017-11-08', '2017-11-10 03:13:58'),
(3, 3, 'Police', '5327', '', '1', '9237983487', '753642420V', '0000-00-00', 'Park Road', '', 'Bambalapitiya', 'District 5', 'D7', '2017-02-07', '9', '0', '0', 0, 'Dengue', 'PCR', '2017-11-03', '1', 'D', '2017-11-08', '2017-11-10 03:13:50'),
(4, 3, 'Delmon', '73289', 'Name of the patient', '1', '9898348975', '753642420V', '2017-10-31', 'Nawam Mawatha - 30.11.1987', '', 'Wekanda', 'District 2B', 'D7', '2017-02-07', '5', '6', '8', 0, 'Dengue', 'NS1', '2017-11-03', '1', 'Y', '2017-11-08', '2017-11-10 03:12:45'),
(5, 3, 'Air Force Hospital', '378390', 'Ayomi Liyanage', '1', '8798623109', '753642420V', '2017-11-01', 'Bosanwatte Lane', '', 'Aluthmawatha', 'District 1', 'D6', '2011-04-12', '', '5', '14', 6, 'Dengue', 'NS1', '2017-11-02', '1', 'Y', '2017-11-08', '2017-11-10 03:12:39'),
(6, 3, 'Air Force Hospital', '123473', 'Ayomi Liyanage', '1', '98389279', '753642420V', '2017-11-01', 'Bagatalle Road', '', 'Bambalapitiya', 'District 5', 'D6', '2017-02-07', '0', '0', '14', 0, 'Dengue', 'NS1', '2017-11-02', '1', 'Y', '2017-11-09', '2017-11-10 03:12:33'),
(7, 3, 'Cooperative Hospital', '1000', 'Amila', '2', '9085566833', '753642420V', '2017-11-01', 'Panchikawatte Road', '', 'Aluthkade East', 'District 2A', 'D2A', '2017-11-08', '1', '4', '3', 0, 'Dengue', 'IgM', '2017-11-02', '1', 'Y', '2017-11-09', '2017-11-10 03:13:14'),
(8, 3, 'LRH', '456378', 'Ayomi Liyanage', '2', '0773145523', '753642420V', '2017-11-06', 'Park Road', '', 'Kirula', 'District 4', 'D4', '2017-02-07', '0', '6', '0', 0, 'Dengue', 'NS1', '2017-11-09', '1', 'Y', '2017-11-09', '2017-11-10 03:12:24'),
(9, 0, 'Cooperative Hospital', '1234', 'Lakshman', '2', '0713772882', '753642420V', '2017-11-22', 'Cooperative Hospital', '', 'Wekanda', 'District 2A', 'D7', '2017-02-07', '5', '0', '0', 0, '', 'NS1', '2017-11-22', '1', 'Y', '2017-11-08', '2017-11-10 03:13:22'),
(10, 3, 'Cooperative Hospital', '1000', 'Amila', '2', '9085566833', '753642420V', '2017-11-01', 'Panchikawatte Road', '', 'Aluthkade East', 'District 2A', 'D2A', '2017-11-08', '1', '4', '3', 0, 'Dengue', 'IgM', '2017-11-02', '1', 'Y', '2017-11-09', '2017-11-10 03:12:58'),
(11, 3, 'Delmon', '73289', 'Name of the patient', '1', '9898348975', '753642420V', '2017-10-31', 'Nawam Mawatha - 30.11.1987', '', 'Wekanda', 'District 2B', 'D7', '2017-11-08', '5', '6', '8', 0, 'Dengue', 'NS1', '2017-11-03', '1', 'Y', '2017-11-08', '2017-11-10 03:13:32'),
(12, 3, 'Air Force Hospital', '378390', 'Ayomi Liyanage', '1', '8798623109', '753642420V', '2017-11-01', 'Bosanwatte Lane', '', 'Aluthmawatha', 'District 1', 'D6', '2011-04-12', '', '5', '14', 6, 'Dengue', 'NS1', '2017-11-02', '1', 'Y', '2017-11-08', '2017-11-10 03:13:37'),
(13, 3, 'Air Force Hospital', '123473', 'Ayomi Liyanage', '1', '98389279', '753642420V', '2017-11-01', 'Bagatalle Road', '', 'Bambalapitiya', 'District 5', 'D6', '2017-11-29', '0', '0', '14', 0, 'Dengue', 'NS1', '2017-11-02', '1', 'Y', '2017-11-09', '2017-11-10 03:13:41'),
(14, 3, 'LRH', '456378', 'Ayomi Liyanage', '2', '0773145523', '753642420V', '2017-11-06', 'Park Road', '', 'Kirula', 'District 4', 'D4', '2017-11-08', '0', '6', '0', 0, 'Dengue', 'NS1', '2017-11-09', '1', 'Y', '2017-11-09', '2017-11-10 03:13:45'),
(15, 3, 'Police', '5327', 'Amila', '1', '9237983487', '753642420V', '2017-11-08', 'Park Road', '', 'Bambalapitiya', 'District 3', 'D7', '2017-11-15', '9', '0', '0', 0, 'Dengue', 'PCR', '2017-11-03', '1', 'D', '2017-11-08', '2017-11-10 03:13:55'),
(16, 3, 'Police', '2345', 'Ayomi Liyanage', '2', '9237983487', '753642420V', '2017-11-08', 'Bosanwatte Lane', '', 'Aluthmawatha', 'District 5', 'D2A', '2017-04-17', '3', '6', '4', 0, 'Dengue', 'RTPCR', '2017-11-02', '1', 'D', '2017-11-08', '2017-11-10 03:14:04'),
(17, 3, 'Cooperative Hospital', '1000', 'Amila', '2', '9085566833', '753642420V', '2017-11-01', 'Panchikawatte Road', '', 'Aluthkade East', 'District 2A', 'D2A', '2017-11-08', '1', '4', '3', 0, 'Dengue', 'IgM', '2017-11-02', '1', 'Y', '2017-11-09', '2017-11-10 03:13:14'),
(18, 3, 'Cooperative Hospital', '1000', 'Amila', '2', '9085566833', '753642420V', '2017-11-01', 'Panchikawatte Road', '', 'Aluthkade East', 'District 2A', 'D2A', '2017-11-08', '1', '4', '3', 0, 'Dengue', 'IgM', '2017-11-02', '1', 'Y', '2017-11-09', '2017-11-10 03:12:58'),
(19, 3, 'Cooperative Hospital', '1000', 'Amila', '2', '9085566833', '753642420V', '2017-11-01', 'Panchikawatte Road', '', 'Aluthkade East', 'District 2A', 'D2A', '2017-11-08', '1', '4', '3', 0, 'Dengue', 'IgM', '2017-11-02', '1', 'Y', '2017-11-09', '2017-11-10 03:13:14'),
(20, 3, 'Cooperative Hospital', '1000', 'Amila', '2', '9085566833', '753642420V', '2017-11-01', 'Panchikawatte Road', '', 'Aluthkade East', 'District 2A', 'D2A', '2017-11-08', '1', '4', '3', 0, 'Dengue', 'IgM', '2017-11-02', '1', 'Y', '2017-11-09', '2017-11-10 03:12:58'),
(21, 3, 'Cooperative Hospital', '1000', 'Amila', '2', '9085566833', '753642420V', '2017-11-01', 'Panchikawatte Road', '', 'Aluthkade East', 'District 2A', 'D2A', '2017-11-08', '1', '4', '3', 0, 'Dengue', 'IgM', '2017-11-02', '1', 'Y', '2017-11-09', '2017-11-10 03:13:14'),
(22, 3, 'Cooperative Hospital', '1000', 'Amila', '2', '9085566833', '753642420V', '2017-11-01', 'Panchikawatte Road', '', 'Aluthkade East', 'District 2A', 'D2A', '2017-11-08', '1', '4', '3', 0, 'Dengue', 'IgM', '2017-11-02', '1', 'Y', '2017-11-09', '2017-11-10 03:12:58'),
(23, 3, 'Cooperative Hospital', '1000', 'Amila', '2', '9085566833', '753642420V', '2017-11-01', 'Panchikawatte Road', '', 'Aluthkade East', 'District 2A', 'D2A', '2017-11-08', '1', '4', '3', 0, 'Dengue', 'IgM', '2017-11-02', '1', 'Y', '2017-11-09', '2017-11-10 03:13:14'),
(24, 3, 'Cooperative Hospital', '1000', 'Amila', '2', '9085566833', '753642420V', '2017-11-01', 'Panchikawatte Road', '', 'Aluthkade East', 'District 2A', 'D2A', '2017-11-08', '1', '4', '3', 0, 'Dengue', 'IgM', '2017-11-02', '1', 'Y', '2017-11-09', '2017-11-10 03:12:58'),
(25, 3, 'Cooperative Hospital', '1000', 'Amila', '2', '9085566833', '753642420V', '2017-11-01', 'Panchikawatte Road', '', 'Aluthkade East', 'District 2A', 'D2A', '2017-11-08', '1', '4', '3', 0, 'Dengue', 'IgM', '2017-11-02', '1', 'Y', '2017-11-09', '2017-11-10 03:13:14'),
(26, 3, 'Cooperative Hospital', '1000', 'Amila', '2', '9085566833', '753642420V', '2017-11-01', 'Panchikawatte Road', '', 'Aluthkade East', 'District 2A', 'D2A', '2017-11-08', '1', '4', '3', 0, 'Dengue', 'IgM', '2017-11-02', '1', 'Y', '2017-11-09', '2017-11-10 03:12:58'),
(27, 0, 'Cooperative Hospital', '1234', 'Lakshman', '2', '0713772882', '753642420V', '2017-11-08', 'Cooperative Hospital', '', 'Wekanda', 'District 2A', 'D7', '2017-02-07', '5', '0', '0', 0, 'Dengue', 'NS1', '2017-11-01', '1', 'Y', '2017-11-08', '2017-11-10 03:12:50'),
(28, 3, 'Delmon', '73289', 'Name of the patient', '1', '9898348975', '753642420V', '2017-10-31', 'Nawam Mawatha - 30.11.1987', '', 'Wekanda', 'District 2B', 'D7', '2017-02-07', '5', '6', '8', 0, 'Dengue', 'NS1', '2017-11-03', '1', 'Y', '2017-11-08', '2017-11-10 03:12:45'),
(29, 3, 'Air Force Hospital', '378390', 'Ayomi Liyanage', '1', '8798623109', '753642420V', '2017-11-01', 'Bosanwatte Lane', '', 'Aluthmawatha', 'District 1', 'D6', '2011-04-12', '', '5', '14', 6, 'Dengue', 'NS1', '2017-11-02', '1', 'Y', '2017-11-08', '2017-11-10 03:12:39'),
(30, 3, 'Air Force Hospital', '123473', 'Ayomi Liyanage', '1', '98389279', '753642420V', '2017-11-01', 'Bagatalle Road', '', 'Bambalapitiya', 'District 5', 'D6', '2017-02-07', '0', '0', '14', 0, 'Dengue', 'NS1', '2017-11-02', '1', 'Y', '2017-11-09', '2017-11-10 03:12:33'),
(31, 3, 'LRH', '456378', 'Ayomi Liyanage', '2', '0773145523', '753642420V', '2017-11-06', 'Park Road', '', 'Kirula', 'District 4', 'D4', '2017-02-07', '0', '6', '0', 0, 'Dengue', 'NS1', '2017-11-09', '1', 'Y', '2017-11-09', '2017-11-10 03:12:24'),
(32, 0, 'Cooperative Hospital', '1234', 'Lakshman', '2', '0713772882', '753642420V', '2017-11-22', 'Cooperative Hospital', '', 'Wekanda', 'District 2A', 'D7', '2017-02-07', '5', '0', '0', 0, '', 'NS1', '2017-11-22', '1', 'Y', '2017-11-08', '2017-11-10 03:13:22'),
(33, 3, 'Delmon', '73289', 'Name of the patient', '1', '9898348975', '753642420V', '2017-10-31', 'Nawam Mawatha - 30.11.1987', '', 'Wekanda', 'District 2B', 'D7', '2017-11-08', '5', '6', '8', 0, 'Dengue', 'NS1', '2017-11-03', '1', 'Y', '2017-11-08', '2017-11-10 03:13:32'),
(34, 3, 'Air Force Hospital', '378390', 'Ayomi Liyanage', '1', '8798623109', '753642420V', '2017-11-01', 'Bosanwatte Lane', '', 'Aluthmawatha', 'District 1', 'D6', '2011-04-12', '', '5', '14', 6, 'Dengue', 'NS1', '2017-11-02', '1', 'Y', '2017-11-08', '2017-11-10 03:13:37'),
(35, 3, 'Air Force Hospital', '123473', 'Ayomi Liyanage', '1', '98389279', '753642420V', '2017-11-01', 'Bagatalle Road', '', 'Bambalapitiya', 'District 5', 'D6', '2017-11-29', '0', '0', '14', 0, 'Dengue', 'NS1', '2017-11-02', '1', 'Y', '2017-11-09', '2017-11-10 03:13:41'),
(36, 3, 'LRH', '456378', 'Ayomi Liyanage', '2', '0773145523', '753642420V', '2017-11-06', 'Park Road', '', 'Kirula', 'District 4', 'D4', '2017-11-08', '0', '6', '0', 0, 'Dengue', 'NS1', '2017-11-09', '1', 'Y', '2017-11-09', '2017-11-10 03:13:45'),
(37, 3, 'Police', '5327', '', '1', '9237983487', '753642420V', '2017-11-06', 'Park Road', '', 'Bambalapitiya', 'District 5', 'D7', '2017-02-07', '9', '0', '0', 0, 'Dengue', 'PCR', '2017-11-03', '1', 'D', '2017-11-08', '2017-11-10 03:13:50'),
(38, 3, 'Police', '5327', 'Amila', '1', '9237983487', '753642420V', '2017-11-08', 'Park Road', '', 'Bambalapitiya', 'District 3', 'D7', '2017-11-15', '9', '0', '0', 0, 'Dengue', 'PCR', '2017-11-03', '1', 'D', '2017-11-08', '2017-11-10 03:13:55'),
(39, 3, 'Police', '2345', 'Name of the patient', '2', '9237983487', '753642420V', '2017-11-08', 'Bosanwatte Lane', '', 'Aluthmawatha', 'District 4', 'D2A', '2017-04-17', '3', '6', '4', 0, 'Dengue', 'RTPCR', '2017-11-02', '1', 'D', '2017-11-08', '2017-11-10 03:13:58'),
(40, 3, 'Police', '2345', 'Ayomi Liyanage', '2', '9237983487', '753642420V', '2017-11-08', 'Bosanwatte Lane', '', 'Aluthmawatha', 'District 5', 'D2A', '2017-04-17', '3', '6', '4', 0, 'Dengue', 'RTPCR', '2017-11-02', '1', 'D', '2017-11-08', '2017-11-10 03:14:04');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
