-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2025 at 02:48 PM
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
  `student_application_tokenid` varchar(256) NOT NULL,
  `student_application_solutionmessage` varchar(3000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(3, 'Umair Warsi', 'umairwarsi@gmail.com', '111', '--------', 1, 'uploads/shirtResolve.png', 'administrator'),
(4, 'Kamran', 'kamran@gmail.com', '111', 'PR2-202408E', 2, 'uploads/flagResolve.png', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `tnd_projects`
--

CREATE TABLE `tnd_projects` (
  `tnd_project_id` int(11) NOT NULL,
  `tnd_project_title` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tnd_projects`
--

INSERT INTO `tnd_projects` (`tnd_project_id`, `tnd_project_title`) VALUES
(1, 'Fitness Tracker'),
(2, 'Hotel Management System'),
(3, 'Courier Management System'),
(4, 'Covid Vacination System');

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
-- Indexes for table `tnd_projects`
--
ALTER TABLE `tnd_projects`
  ADD PRIMARY KEY (`tnd_project_id`);

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
  MODIFY `student_application_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_users`
--
ALTER TABLE `student_users`
  MODIFY `student_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tnd_projects`
--
ALTER TABLE `tnd_projects`
  MODIFY `tnd_project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
