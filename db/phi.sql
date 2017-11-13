-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2017 at 10:56 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phi`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `user_id`) VALUES
('sampath', '7c4a8d09ca3762af61e59520943dc26494f8941b', 19),
('Shamitha', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2);

-- --------------------------------------------------------

--
-- Table structure for table `moh`
--

CREATE TABLE IF NOT EXISTS `moh` (
  `id` int(11) NOT NULL,
  `pat_id` varchar(255) NOT NULL,
  `rdhs` varchar(20) NOT NULL,
  `moh_area` varchar(50) NOT NULL,
  `moh_reg_no` varchar(50) NOT NULL,
  `age_year` int(11) NOT NULL,
  `age_months` int(11) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `source_of_notification` varchar(255) NOT NULL,
  `specify` varchar(255) NOT NULL,
  `disease_as_notified` varchar(255) NOT NULL,
  `disease_as_confirmed` varchar(255) NOT NULL,
  `confirmed_by` varchar(255) NOT NULL,
  `nature_of_confirmation` varchar(255) NOT NULL,
  `date_of_onset` datetime NOT NULL,
  `date_of_notification` datetime NOT NULL,
  `date_of_confirmation` datetime NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lon` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `modified_by` varchar(255) NOT NULL,
  `modified_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10014 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moh`
--

INSERT INTO `moh` (`id`, `pat_id`, `rdhs`, `moh_area`, `moh_reg_no`, `age_year`, `age_months`, `gender`, `occupation`, `source_of_notification`, `specify`, `disease_as_notified`, `disease_as_confirmed`, `confirmed_by`, `nature_of_confirmation`, `date_of_onset`, `date_of_notification`, `date_of_confirmation`, `lat`, `lon`, `status`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(10013, '22', 'CMC', '4', '22', 2, 0, 'Male', 'teacher', 'active_servelance by_phi', '', 'df', 'df', 'moh', 'clinical_and_serological', '2017-11-01 00:00:00', '2017-11-03 00:00:00', '2017-11-05 00:00:00', '', '', 'updated', 'Shamitha', '2017-11-10 03:24:55', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `phi`
--

CREATE TABLE IF NOT EXISTS `phi` (
  `id` int(11) NOT NULL,
  `pat_id` varchar(255) NOT NULL,
  `phi_ref` varchar(255) NOT NULL,
  `moh_not` varchar(255) NOT NULL,
  `phi_ran` varchar(255) NOT NULL,
  `moh_area` varchar(255) NOT NULL,
  `notified` varchar(255) NOT NULL,
  `notified_date` datetime NOT NULL,
  `conf_dis` varchar(255) NOT NULL,
  `conf_date` datetime NOT NULL,
  `pat_name` varchar(255) NOT NULL,
  `move_address` varchar(255) NOT NULL,
  `pat_age` int(11) NOT NULL,
  `ethnic` varchar(255) NOT NULL,
  `onset_date` datetime NOT NULL,
  `hos_date` datetime NOT NULL,
  `dis_date` datetime NOT NULL,
  `lab_out` varchar(255) NOT NULL,
  `outbreak` varchar(255) NOT NULL,
  `isolate` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lon` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `modified_by` varchar(255) NOT NULL,
  `modified_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phi`
--

INSERT INTO `phi` (`id`, `pat_id`, `phi_ref`, `moh_not`, `phi_ran`, `moh_area`, `notified`, `notified_date`, `conf_dis`, `conf_date`, `pat_name`, `move_address`, `pat_age`, `ethnic`, `onset_date`, `hos_date`, `dis_date`, `lab_out`, `outbreak`, `isolate`, `lat`, `lon`, `status`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(45, '22', '1', '2', '3', '4', 'notified', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 'patName', '', 2, 'Other', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Laboratory Findings Outcome', '', '', '', '', 'pending', 'Shamitha', '2017-11-09 23:40:04', '', '0000-00-00 00:00:00'),
(53, '25', 'D1/MA/DF/123/134/2017', 'D1/DF//134/2017', 'MATTAKKULIYA', 'D1', 'Dengue', '2017-11-09 00:00:00', '6', '2017-11-15 00:00:00', 'Namal Arunoda', 'Joseph Dias Mawatha , Aluthmawatha', 15, 'Sinhalese', '2017-11-02 00:00:00', '2017-11-04 00:00:00', '2017-11-06 00:00:00', 'NS1', 'Recovered', 'Home', '', '', 'pending', 'Shamitha', '2017-11-10 03:16:11', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient_data`
--

CREATE TABLE IF NOT EXISTS `tbl_patient_data` (
  `pat_id` int(11) NOT NULL,
  `pat_center` int(11) DEFAULT NULL,
  `pat_institution` varchar(100) DEFAULT NULL,
  `pat_refno` varchar(50) DEFAULT NULL,
  `pat_name` varchar(100) DEFAULT NULL,
  `pat_sex` varchar(10) DEFAULT NULL,
  `pat_mobile` varchar(20) DEFAULT NULL,
  `pat_nic` varchar(50) DEFAULT NULL,
  `pat_invdate` date DEFAULT NULL,
  `pat_onsetdate` date NOT NULL,
  `pat_admission_date` date NOT NULL,
  `pat_street` varchar(500) DEFAULT NULL,
  `pat_area` varchar(100) DEFAULT NULL,
  `pat_sward` varchar(100) DEFAULT NULL,
  `pat_district` varchar(100) DEFAULT NULL,
  `ins_district` varchar(100) DEFAULT NULL,
  `pat_dob` date DEFAULT NULL,
  `pat_yrs` varchar(10) DEFAULT NULL,
  `pat_month` varchar(10) DEFAULT NULL,
  `pat_days` varchar(10) DEFAULT NULL,
  `pat_caldays` int(11) DEFAULT NULL,
  `pat_homeno` varchar(50) NOT NULL,
  `pat_school` varchar(250) NOT NULL,
  `doc_name` varchar(100) NOT NULL,
  `doc_designation` varchar(150) NOT NULL,
  `pat_virus` varchar(10) DEFAULT NULL,
  `pat_test_done` varchar(100) DEFAULT NULL,
  `pat_testdate` date DEFAULT NULL,
  `pat_result` varchar(50) DEFAULT NULL,
  `pat_complication` varchar(500) NOT NULL,
  `pat_death` varchar(1) NOT NULL,
  `pat_death_date` date NOT NULL,
  `pat_status` varchar(1) DEFAULT NULL,
  `pat_date` date DEFAULT NULL,
  `pat_lastupdated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_patient_data`
--

INSERT INTO `tbl_patient_data` (`pat_id`, `pat_center`, `pat_institution`, `pat_refno`, `pat_name`, `pat_sex`, `pat_mobile`, `pat_nic`, `pat_invdate`, `pat_onsetdate`, `pat_admission_date`, `pat_street`, `pat_area`, `pat_sward`, `pat_district`, `ins_district`, `pat_dob`, `pat_yrs`, `pat_month`, `pat_days`, `pat_caldays`, `pat_homeno`, `pat_school`, `doc_name`, `doc_designation`, `pat_virus`, `pat_test_done`, `pat_testdate`, `pat_result`, `pat_complication`, `pat_death`, `pat_death_date`, `pat_status`, `pat_date`, `pat_lastupdated`) VALUES
(25, 3, 'Nawaloka', '20032', 'Talla', '2', '0112312343', '', '2017-11-09', '2017-11-06', '2017-11-09', 'Joseph Dias Mawatha', NULL, 'Aluthmawatha', 'District 1', 'D2B', '0000-00-00', '0', '7', '8', 0, '43', 'Al Hakeem Muslim V', 'Rold', 'MO', 'Dengue', 'NS1', '2017-11-07', '1', 'Dengue Encephalopathy', '1', '2017-11-09', 'Y', '2017-11-09', '2017-11-09 17:16:46'),
(22, 3, 'NHSL', '56784', 'Chithra', '1', '456789', '', '2017-11-02', '2017-11-01', '2017-11-04', 'Bloemendhal Road', NULL, 'Aluthmawatha', 'District 1', 'D3', '2017-11-02', '', '', '', 0, '3', 'Agamethi Vidylaya', '', '', 'Dengue', 'IgM', '2017-11-02', '1', 'Dengue Shock Syndrome', '2', '0000-00-00', 'Y', '2017-11-09', '2017-11-09 16:21:45'),
(23, 3, 'Cooperative Hospital', '12121', 'asdfg', '2', '121211111111', '21212', '2017-11-03', '2017-11-03', '2017-11-03', 'Bloemendhal Road', NULL, 'Aluthmawatha', 'District 1', 'D2A', '2017-11-02', '', '', '', 0, '1212121', 'Good Shepherd Convent Tamil', '1asdfg', 'MO', 'Dengue', 'IgG', '2017-11-02', '1', 'Dengue Shock Syndrome', '2', '0000-00-00', 'Y', '2017-11-09', '2017-11-09 16:53:11'),
(24, 3, 'Nil', '2444', 'DSFS', '1', '35563535', '245242V', '2017-11-01', '2017-11-01', '2017-11-01', 'Joseph Dias Mawatha', NULL, 'Aluthmawatha', 'District 1', 'D1', '2017-11-08', '', '', '', 0, '435565336', '', 'GT', 'MO', 'Influenza', 'PCR', '2017-11-08', '1', 'Dengue Shock Syndrome', '1', '2017-11-09', 'Y', '2017-11-09', '2017-11-09 16:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `number` varchar(255) NOT NULL,
  `user_role_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `email`, `number`, `user_role_id`) VALUES
(2, 'Shamitha', 'Vithanage', 'shamitha88@gmail.com', '', 14),
(19, 'Sampath', 'Dehigaspitiya', 'sd@gmail.com', '3', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `user_role_id` int(11) NOT NULL,
  `user_role_name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_role_id`, `user_role_name`) VALUES
(1, 'System Admin'),
(2, 'PHI'),
(3, 'MOH'),
(14, 'Super Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `moh`
--
ALTER TABLE `moh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phi`
--
ALTER TABLE `phi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_patient_data`
--
ALTER TABLE `tbl_patient_data`
  ADD PRIMARY KEY (`pat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`), ADD KEY `user_role_id` (`user_role_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`user_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `moh`
--
ALTER TABLE `moh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10014;
--
-- AUTO_INCREMENT for table `phi`
--
ALTER TABLE `phi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `tbl_patient_data`
--
ALTER TABLE `tbl_patient_data`
  MODIFY `pat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
