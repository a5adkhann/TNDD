-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2025 at 04:51 PM
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
  `student_id` varchar(256) NOT NULL,
  `student_name` varchar(256) NOT NULL,
  `student_batch_code` varchar(256) NOT NULL,
  `student_email` varchar(256) NOT NULL,
  `student_number` varchar(256) NOT NULL,
  `student_application_status` varchar(256) NOT NULL DEFAULT 'Pending',
  `student_current_semester_id` int(11) NOT NULL,
  `student_concern_person_id` int(11) NOT NULL,
  `student_application_subject_id` int(11) NOT NULL,
  `student_user_id` int(11) NOT NULL,
  `student_application_tokenid` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_applications`
--

INSERT INTO `student_applications` (`student_application_id`, `student_application_date`, `student_application_message`, `student_id`, `student_name`, `student_batch_code`, `student_email`, `student_number`, `student_application_status`, `student_current_semester_id`, `student_concern_person_id`, `student_application_subject_id`, `student_user_id`, `student_application_tokenid`) VALUES
(2, '2025-01-10', 'uiyyjildklk', '0', 'hdsjklsklj', '679002', 'asadklm30@gmail.com', '7690902092', 'Process', 2, 1, 2, 1, 'TNDF1D4AF97'),
(3, '2025-01-21', '\r\nfreestar  \r\nWhat is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use', '7828920002', 'ssj,smnsjs', '6278298292', 'asadklm30@gmail.com', '63w7902', 'Process', 2, 1, 2, 1, 'TND1293448B');

-- --------------------------------------------------------

--
-- Table structure for table `student_users`
--

CREATE TABLE `student_users` (
  `student_user_id` int(11) NOT NULL,
  `student_user_name` varchar(256) NOT NULL,
  `student_user_email` varchar(256) NOT NULL,
  `student_user_password` varchar(256) NOT NULL,
  `student_user_batchcode` varchar(256) NOT NULL,
  `student_user_current_semester_id` int(11) NOT NULL,
  `student_user_image` varchar(256) NOT NULL,
  `user_role` varchar(256) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_users`
--

INSERT INTO `student_users` (`student_user_id`, `student_user_name`, `student_user_email`, `student_user_password`, `student_user_batchcode`, `student_user_current_semester_id`, `student_user_image`, `user_role`) VALUES
(1, 'Asad Khan', 'asadklm30@gmail.com', '111', '1111', 5, 'uploads/asad.jpg', 'student'),
(2, 'Malik Abdullah', 'malikabdullah@gmail.com', '111', '-------', 4, 'uploads/react-ui.jfif', 'student'),
(3, 'Umair Warsi', 'umairwarsi@gmail.com', '111', '--------', 1, 'uploads/shirtResolve.png', 'administrator');

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
  ADD KEY `student_subject` (`student_application_subject_id`),
  ADD KEY `student_user_id` (`student_user_id`);

--
-- Indexes for table `student_users`
--
ALTER TABLE `student_users`
  ADD PRIMARY KEY (`student_user_id`),
  ADD KEY `student_user_current_semester` (`student_user_current_semester_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_semesters`
--
ALTER TABLE `all_semesters`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `student_application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_users`
--
ALTER TABLE `student_users`
  MODIFY `student_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_applications`
--
ALTER TABLE `student_applications`
  ADD CONSTRAINT `student_concern_person` FOREIGN KEY (`student_concern_person_id`) REFERENCES `concern_person` (`concern_person_id`),
  ADD CONSTRAINT `student_semester` FOREIGN KEY (`student_current_semester_id`) REFERENCES `all_semesters` (`semester_id`),
  ADD CONSTRAINT `student_subject` FOREIGN KEY (`student_application_subject_id`) REFERENCES `all_subjects` (`subject_id`),
  ADD CONSTRAINT `student_user_id` FOREIGN KEY (`student_user_id`) REFERENCES `student_users` (`student_user_id`);

--
-- Constraints for table `student_users`
--
ALTER TABLE `student_users`
  ADD CONSTRAINT `student_user_current_semester` FOREIGN KEY (`student_user_current_semester_id`) REFERENCES `all_semesters` (`semester_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
