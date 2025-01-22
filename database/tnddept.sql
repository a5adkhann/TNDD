-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2025 at 09:43 PM
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
-- Database: `tnddept`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_semesters`
--

CREATE TABLE `all_semesters` (
  `semester_id` int(11) NOT NULL,
  `semester_name` varchar(256) NOT NULL,
  `semester_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `all_semesters`
--

INSERT INTO `all_semesters` (`semester_id`, `semester_name`, `semester_number`) VALUES
(1, 'CPISM', 1),
(2, 'DISM', 2),
(3, 'HDSE I', 3),
(4, 'HDSE II', 4),
(5, 'ADSE I', 5),
(6, 'ADSE II', 6);

-- --------------------------------------------------------

--
-- Table structure for table `all_subjects`
--

CREATE TABLE `all_subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_title` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `all_subjects`
--

INSERT INTO `all_subjects` (`subject_id`, `subject_title`) VALUES
(1, 'Project Marks'),
(2, 'Project Request'),
(3, 'Project Submission'),
(4, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `concern_person`
--

CREATE TABLE `concern_person` (
  `concern_person_id` int(11) NOT NULL,
  `concern_person_designation` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `concern_person`
--

INSERT INTO `concern_person` (`concern_person_id`, `concern_person_designation`) VALUES
(1, 'TND Head');

-- --------------------------------------------------------

--
-- Table structure for table `student_applications`
--

CREATE TABLE `student_applications` (
  `student_application_id` int(11) NOT NULL,
  `student_application_date` date NOT NULL,
  `student_application_message` varchar(1000) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(256) NOT NULL,
  `student_batch_code` varchar(256) NOT NULL,
  `student_email` varchar(256) NOT NULL,
  `student_number` varchar(256) NOT NULL,
  `student_application_status` varchar(256) NOT NULL DEFAULT 'Pending',
  `student_current_semester_id` int(11) NOT NULL,
  `student_concern_person_id` int(11) NOT NULL,
  `student_application_subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_applications`
--

INSERT INTO `student_applications` (`student_application_id`, `student_application_date`, `student_application_message`, `student_id`, `student_name`, `student_batch_code`, `student_email`, `student_number`, `student_application_status`, `student_current_semester_id`, `student_concern_person_id`, `student_application_subject_id`) VALUES
(1, '2025-01-22', 'ABC', 0, 'Asad Khan', 'PR2-202409G', 'asadklm30@gmail.com', '+92 3482237240', 'Pending', 3, 1, 2),
(2, '2025-01-08', 'BAC', 0, 'Asad Khan', 'PR2-202409G', 'asadklm30@gmail.com', '+92 3482237240', 'Pending', 4, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_semesters`
--
ALTER TABLE `all_semesters`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `all_subjects`
--
ALTER TABLE `all_subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `concern_person`
--
ALTER TABLE `concern_person`
  ADD PRIMARY KEY (`concern_person_id`);

--
-- Indexes for table `student_applications`
--
ALTER TABLE `student_applications`
  ADD PRIMARY KEY (`student_application_id`),
  ADD KEY `student_semester` (`student_current_semester_id`),
  ADD KEY `student_concern_person` (`student_concern_person_id`),
  ADD KEY `student_subject` (`student_application_subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_semesters`
--
ALTER TABLE `all_semesters`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `all_subjects`
--
ALTER TABLE `all_subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `concern_person`
--
ALTER TABLE `concern_person`
  MODIFY `concern_person_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_applications`
--
ALTER TABLE `student_applications`
  MODIFY `student_application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_applications`
--
ALTER TABLE `student_applications`
  ADD CONSTRAINT `student_concern_person` FOREIGN KEY (`student_concern_person_id`) REFERENCES `concern_person` (`concern_person_id`),
  ADD CONSTRAINT `student_semester` FOREIGN KEY (`student_current_semester_id`) REFERENCES `all_semesters` (`semester_id`),
  ADD CONSTRAINT `student_subject` FOREIGN KEY (`student_application_subject_id`) REFERENCES `all_subjects` (`subject_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
