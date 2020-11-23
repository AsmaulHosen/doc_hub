-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2020 at 07:18 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doc_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_book`
--

CREATE TABLE `appointment_book` (
  `appoinment_book_id` varchar(30) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctors_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `fees` float(10,2) NOT NULL,
  `payment_method` int(11) NOT NULL COMMENT '0 = bkash, 1 = Rocket, 2= Debit Card, 3 = Master Card ',
  `paymeny_desc` varchar(200) NOT NULL,
  `status` int(11) DEFAULT 0 COMMENT '0=created,1=finish,2= Reshedule'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_book`
--

INSERT INTO `appointment_book` (`appoinment_book_id`, `patient_id`, `doctors_id`, `date`, `start_time`, `end_time`, `fees`, `payment_method`, `paymeny_desc`, `status`) VALUES
('DoH A-6142', 1, 1, '2020-11-24', '10:10:00', '10:15:00', 220.00, 0, 'bdf', 0),
('DoH A-7601', 1, 1, '2020-11-30', '10:20:00', '10:40:00', 300.00, 3, 'ghf', 0),
('DoH A-8368', 1, 1, '2020-11-26', '10:20:00', '10:40:00', 300.00, 1, 'qsdd', 0),
('DoH A-9351', 1, 1, '2020-11-24', '10:10:00', '10:15:00', 220.00, 1, '24wedwe', 0);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_slot`
--

CREATE TABLE `appointment_slot` (
  `appointment_id` int(11) NOT NULL,
  `doctors_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `fees` float(20,2) NOT NULL,
  `available` int(11) NOT NULL DEFAULT 1 COMMENT '1 = open,2 = close'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_slot`
--

INSERT INTO `appointment_slot` (`appointment_id`, `doctors_id`, `start_time`, `end_time`, `fees`, `available`) VALUES
(2, 1, '10:10:00', '10:15:00', 220.00, 1),
(3, 1, '10:20:00', '10:40:00', 300.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctors_deatils`
--

CREATE TABLE `doctors_deatils` (
  `doctors_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contact_number` varchar(11) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL COMMENT '1=Male,2=Female',
  `image` varchar(500) DEFAULT NULL,
  `about` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors_deatils`
--

INSERT INTO `doctors_deatils` (`doctors_id`, `user_id`, `contact_number`, `gender`, `image`, `about`) VALUES
(1, 1, '01716514131', 1, '1.jpg', 'Efficiently myocardinate market-driven innovation via open-source alignments. Dramatically engage high-Phosfluorescently expedite impactful supply chains via focused results. Holistically . '),
(2, 2, '01918181712', 2, '2.jpg', 'Dramatically engage high-Phosfluorescently expedite impactful supply chains via focused results. Holistically . Compellingly supply just in time catalysts for change through.'),
(3, 3, '0191818171', 1, '3.jpg', 'via open-source alignments. Dramatically engage high-Phosfluorescently expedite impactful supply chains via fo'),
(8, 8, '0309234923', 1, '8.jpg', 'high-Phosfluorescently expedite impactful supply chains via focused results. Holistically . Compellingly supply just in time'),
(9, 239450, '09871717171', 1, NULL, 'its is testing ok ,,,ok testing');

-- --------------------------------------------------------

--
-- Table structure for table `education_history`
--

CREATE TABLE `education_history` (
  `education_id` int(11) NOT NULL,
  `doctors_id` int(11) NOT NULL,
  `institute_name` varchar(200) NOT NULL,
  `degree` varchar(120) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education_history`
--

INSERT INTO `education_history` (`education_id`, `doctors_id`, `institute_name`, `degree`, `year`) VALUES
(1, 1, 'abcd', 'hello', 1983),
(2, 1, 'hello', 'test 1', 1975),
(3, 8, 'fthr', 'ghdg', 1975);

-- --------------------------------------------------------

--
-- Table structure for table `experienced`
--

CREATE TABLE `experienced` (
  `experienced_id` int(11) NOT NULL,
  `doctors_id` int(11) NOT NULL,
  `hospital_name` varchar(300) NOT NULL,
  `position_name` varchar(200) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `start_year` year(4) NOT NULL,
  `end_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `experienced`
--

INSERT INTO `experienced` (`experienced_id`, `doctors_id`, `hospital_name`, `position_name`, `department_name`, `start_year`, `end_year`) VALUES
(3, 1, 'abcd', 'hello test', 'ok ok', 2018, 'Running');

-- --------------------------------------------------------

--
-- Table structure for table `medical_report_history`
--

CREATE TABLE `medical_report_history` (
  `medical_report_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `medical_desc` text DEFAULT NULL,
  `image` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical_report_history`
--

INSERT INTO `medical_report_history` (`medical_report_id`, `patient_id`, `medical_desc`, `image`, `created_at`) VALUES
(2, 1, '3rewrwe', 'temp 1.PNG', '2020-11-20 23:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `patient_details`
--

CREATE TABLE `patient_details` (
  `patient_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gender` int(11) DEFAULT NULL COMMENT '1=Male, 2=Femail,3=Others',
  `contact_number` varchar(11) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `wrok_desc` text DEFAULT NULL,
  `religion` int(11) DEFAULT NULL COMMENT '1=Islam,2=Hinduism,3=Christianity,4=Buddhism,0=others',
  `height` int(11) DEFAULT NULL COMMENT '1 = 4ft -5ft, 2 = 5ft 1" -5ft 3", 3 = 5ft 4" -5ft 8", 4 = 5ft 9" -5ft 11", 5 = 6ft -6ft 2", 6 = 6ft 3" - 6ft 6"  ',
  `weight` int(11) DEFAULT NULL COMMENT '1= 0 - 40,2=41-60,3=61-80,4=81-100,5=101-120,6=121-140,7=141-160',
  `blood_grp` int(11) DEFAULT NULL COMMENT '1=A+,2= A-,3=  B+,4= B-,5=  O+,6= O-,7=  AB+,8= AB',
  `high_pressure` int(11) DEFAULT NULL COMMENT '1=Yes,2=No,3=Dont Know',
  `blood_sugar` int(11) DEFAULT NULL COMMENT '1=Yes,2=No,3=Dont Know',
  `image` varchar(200) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `present_address` text DEFAULT NULL,
  `perrmanent_address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_details`
--

INSERT INTO `patient_details` (`patient_id`, `user_id`, `gender`, `contact_number`, `date_of_birth`, `wrok_desc`, `religion`, `height`, `weight`, `blood_grp`, `high_pressure`, `blood_sugar`, `image`, `about`, `present_address`, `perrmanent_address`) VALUES
(1, 646694, 1, '01928282828', '1996-11-09', 'Hello Testing ', 3, 2, 1, 5, 3, 1, NULL, 'oko onadkcnsakcsa', 'dcdcnd cjkdwcjkd ljklkcd', 'sacscdsbnc ncnwdc ');

-- --------------------------------------------------------

--
-- Table structure for table `speciality`
--

CREATE TABLE `speciality` (
  `speciality_id` int(11) NOT NULL,
  `doctors_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `speciality`
--

INSERT INTO `speciality` (`speciality_id`, `doctors_id`, `name`) VALUES
(2, 1, 'ok now');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(90) NOT NULL,
  `last_name` varchar(90) NOT NULL,
  `user_role` int(11) NOT NULL COMMENT '1=Patient,2=Doctor,3=Vendor',
  `email` varchar(140) NOT NULL,
  `password` varchar(120) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=created,1=Active,2=deactivate',
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `user_role`, `email`, `password`, `status`, `created_at`) VALUES
(1, 'hello 12', 'docwww', 2, 'test@gmail.com', '123456', 1, '2020-11-17'),
(2, 'hello', 'doc', 2, 'doc@gmail.com', '123456', 1, '2020-11-17'),
(3, 'wsws', 'sees', 2, 'ok@gmail.com', '123456', 1, '2020-11-17'),
(8, 'test 1', 'testing', 2, 'test1@gmail.com', '123456', 1, '2020-11-18'),
(239450, 'hello', 'ok', 2, 'hello@gmail.com', '098098', 1, '2020-11-19'),
(326285, 'hello', 'vendor test', 3, 'ven@gmail.com', '123456', 1, '2020-11-21'),
(646694, 'Rohim', 'Uddin', 1, 'rohim@gmail.com', '09870987', 1, '2020-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_details`
--

CREATE TABLE `vendor_details` (
  `vendor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `phone_no` varchar(11) NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor_details`
--

INSERT INTO `vendor_details` (`vendor_id`, `user_id`, `vendor_name`, `address`, `phone_no`, `image`) VALUES
(1, 326285, 'venor 1st', 'ok ok ', '01717171717', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_book`
--
ALTER TABLE `appointment_book`
  ADD PRIMARY KEY (`appoinment_book_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctors_id` (`doctors_id`);

--
-- Indexes for table `appointment_slot`
--
ALTER TABLE `appointment_slot`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `doctors_id` (`doctors_id`);

--
-- Indexes for table `doctors_deatils`
--
ALTER TABLE `doctors_deatils`
  ADD PRIMARY KEY (`doctors_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `education_history`
--
ALTER TABLE `education_history`
  ADD PRIMARY KEY (`education_id`),
  ADD KEY `doctors_id` (`doctors_id`);

--
-- Indexes for table `experienced`
--
ALTER TABLE `experienced`
  ADD PRIMARY KEY (`experienced_id`),
  ADD KEY `doctors_id` (`doctors_id`);

--
-- Indexes for table `medical_report_history`
--
ALTER TABLE `medical_report_history`
  ADD PRIMARY KEY (`medical_report_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_details`
--
ALTER TABLE `patient_details`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `speciality`
--
ALTER TABLE `speciality`
  ADD PRIMARY KEY (`speciality_id`),
  ADD KEY `doctors_id` (`doctors_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vendor_details`
--
ALTER TABLE `vendor_details`
  ADD PRIMARY KEY (`vendor_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_slot`
--
ALTER TABLE `appointment_slot`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctors_deatils`
--
ALTER TABLE `doctors_deatils`
  MODIFY `doctors_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `education_history`
--
ALTER TABLE `education_history`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `experienced`
--
ALTER TABLE `experienced`
  MODIFY `experienced_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medical_report_history`
--
ALTER TABLE `medical_report_history`
  MODIFY `medical_report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient_details`
--
ALTER TABLE `patient_details`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `speciality`
--
ALTER TABLE `speciality`
  MODIFY `speciality_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor_details`
--
ALTER TABLE `vendor_details`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment_book`
--
ALTER TABLE `appointment_book`
  ADD CONSTRAINT `appointment_book_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient_details` (`patient_id`),
  ADD CONSTRAINT `appointment_book_ibfk_2` FOREIGN KEY (`doctors_id`) REFERENCES `doctors_deatils` (`doctors_id`);

--
-- Constraints for table `appointment_slot`
--
ALTER TABLE `appointment_slot`
  ADD CONSTRAINT `appointment_slot_ibfk_1` FOREIGN KEY (`doctors_id`) REFERENCES `doctors_deatils` (`doctors_id`);

--
-- Constraints for table `doctors_deatils`
--
ALTER TABLE `doctors_deatils`
  ADD CONSTRAINT `doctors_deatils_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `education_history`
--
ALTER TABLE `education_history`
  ADD CONSTRAINT `education_history_ibfk_1` FOREIGN KEY (`doctors_id`) REFERENCES `doctors_deatils` (`doctors_id`);

--
-- Constraints for table `experienced`
--
ALTER TABLE `experienced`
  ADD CONSTRAINT `experienced_ibfk_1` FOREIGN KEY (`doctors_id`) REFERENCES `doctors_deatils` (`doctors_id`);

--
-- Constraints for table `medical_report_history`
--
ALTER TABLE `medical_report_history`
  ADD CONSTRAINT `medical_report_history_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient_details` (`patient_id`);

--
-- Constraints for table `patient_details`
--
ALTER TABLE `patient_details`
  ADD CONSTRAINT `patient_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `speciality`
--
ALTER TABLE `speciality`
  ADD CONSTRAINT `speciality_ibfk_1` FOREIGN KEY (`doctors_id`) REFERENCES `doctors_deatils` (`doctors_id`);

--
-- Constraints for table `vendor_details`
--
ALTER TABLE `vendor_details`
  ADD CONSTRAINT `vendor_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
