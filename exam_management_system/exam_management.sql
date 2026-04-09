-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2026 at 06:10 AM
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
-- Database: `exam_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_attendance`
--

CREATE TABLE `cms_attendance` (
  `id` int(11) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `school-location` varchar(100) NOT NULL,
  `program_name` varchar(150) NOT NULL,
  `room_no` int(100) NOT NULL,
  `instructor_name` varchar(150) NOT NULL,
  `period` int(11) NOT NULL,
  `class` varchar(100) NOT NULL,
  `class_start_date` date NOT NULL DEFAULT current_timestamp(),
  `class_end_date` date NOT NULL DEFAULT current_timestamp(),
  `graduation_date` date NOT NULL DEFAULT current_timestamp(),
  `class_start_time` time NOT NULL DEFAULT current_timestamp(),
  `class_end_time` time NOT NULL DEFAULT current_timestamp(),
  `student_name` varchar(150) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_bus`
--

CREATE TABLE `cms_bus` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `admission_no` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `roll_no` varchar(150) NOT NULL,
  `session` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `father_name` varchar(150) NOT NULL,
  `mother_name` varchar(150) NOT NULL,
  `father_no` varchar(11) NOT NULL,
  `mother_no` varchar(11) NOT NULL,
  `guardian_name` varchar(100) NOT NULL,
  `guardian_no` varchar(11) NOT NULL,
  `pickup_point` varchar(100) NOT NULL,
  `drop_point` varchar(100) NOT NULL,
  `area` varchar(50) NOT NULL,
  `bus_rout_no` varchar(100) NOT NULL,
  `bus_incharge` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_bus`
--

INSERT INTO `cms_bus` (`id`, `name`, `admission_no`, `section`, `roll_no`, `session`, `address`, `father_name`, `mother_name`, `father_no`, `mother_no`, `guardian_name`, `guardian_no`, `pickup_point`, `drop_point`, `area`, `bus_rout_no`, `bus_incharge`) VALUES
(1, 'Nandha Sri', '1', 'BE CSE', '1', 'FN', 'salem', 'Purushothaman', 'Revathi', '1234567890', '9876543210', '', '', 'salem', 'salem', 'salem', '80', 'sri');

-- --------------------------------------------------------

--
-- Table structure for table `cms_exam_form`
--

CREATE TABLE `cms_exam_form` (
  `id` int(11) NOT NULL,
  `session_time` varchar(50) DEFAULT NULL,
  `college_name` varchar(255) DEFAULT NULL,
  `center_code` varchar(50) DEFAULT NULL,
  `register_number` varchar(50) DEFAULT NULL,
  `admission_year` varchar(10) DEFAULT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `medium` varchar(50) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `community` varchar(100) DEFAULT NULL,
  `temporary_address` text DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `pin_code` varchar(20) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `d_d_number` varchar(50) DEFAULT NULL,
  `d_d_date` date DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `semster` int(8) NOT NULL,
  `subject_,code` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_exam_form`
--

INSERT INTO `cms_exam_form` (`id`, `session_time`, `college_name`, `center_code`, `register_number`, `admission_year`, `student_name`, `father_name`, `date_of_birth`, `course`, `medium`, `sex`, `community`, `temporary_address`, `permanent_address`, `pin_code`, `contact_number`, `bank_name`, `d_d_number`, `d_d_date`, `amount`, `created_at`, `semster`, `subject_,code`, `subject`) VALUES
(1, 'Evening', 'Mahendra Collage', 'MC8529', '611619104075', '2024', 'Nandha Sri', 'Purushothaman', '2002-04-25', 'BE', 'English', 'Male', 'BC', 'Salem', 'Salem', '636006', '9994468552', 'State Bank of India', '1234567890', '2024-12-16', 'Sixty Five Thousand', '2024-12-16 05:46:08', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cms_hall_ticket`
--

CREATE TABLE `cms_hall_ticket` (
  `id` int(11) NOT NULL,
  `register_no` varchar(100) NOT NULL,
  `current_semester` int(8) NOT NULL,
  `name` varchar(150) NOT NULL,
  `degree_branch` varchar(150) NOT NULL,
  `exam_center` varchar(150) NOT NULL,
  `subject_code` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `semester` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_hall_ticket`
--

INSERT INTO `cms_hall_ticket` (`id`, `register_no`, `current_semester`, `name`, `degree_branch`, `exam_center`, `subject_code`, `subject`, `semester`) VALUES
(1, '1', 2, 'Nandha Sri', 'B.E CSE', 'mahendra', 'HS1475', 'Engineering Maths', 2),
(2, '1', 2, 'Nandha Sri', 'B.E CSE', 'mahendra', 'US1286', 'Engineering Graphics', 2),
(3, '1', 2, 'Nandha Sri', 'B.E CSE', 'mahendra', 'HB1596', 'Microprocessor', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cms_hall_ticket_subjects`
--

CREATE TABLE `cms_hall_ticket_subjects` (
  `id` int(11) NOT NULL,
  `hall_ticket_id` int(11) NOT NULL,
  `subject code` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `semester` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_hostel`
--

CREATE TABLE `cms_hostel` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `roll_no` int(150) NOT NULL,
  `program` varchar(100) NOT NULL,
  `course_branch` varchar(150) NOT NULL,
  `mobile_number` varchar(100) NOT NULL,
  `blood_group` varchar(11) NOT NULL,
  `date_of_birth` date NOT NULL DEFAULT current_timestamp(),
  `age` int(100) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `father_number` varchar(10) NOT NULL,
  `mother_number` varchar(10) NOT NULL,
  `guardian_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `amount` varchar(10) NOT NULL,
  `dd_no` int(20) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `hostel_name` varchar(150) NOT NULL,
  `room_no` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_hostel`
--

INSERT INTO `cms_hostel` (`id`, `name`, `roll_no`, `program`, `course_branch`, `mobile_number`, `blood_group`, `date_of_birth`, `age`, `father_name`, `mother_name`, `father_number`, `mother_number`, `guardian_name`, `address`, `amount`, `dd_no`, `bank`, `hostel_name`, `room_no`) VALUES
(1, '', 0, '', '', '', '', '0000-00-00', 0, '', '', '', '', '', '', '', 0, '', '', 0),
(2, 'Nandha Sri', 2147483647, 'B.E', 'CSE', '9994468552', 'O-', '2002-04-25', 22, 'Purushothaman', 'Revathi', '7418522136', '9585320532', 'N/A', 'Salem', '65000', 1234567890, 'State Bank', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cms_leave`
--

CREATE TABLE `cms_leave` (
  `id` int(11) NOT NULL,
  `type_of_leave` enum('Short Leave','Medical Leave','Casual Leave','Vacation Leave','Semester Leave') NOT NULL,
  `available_leave` int(100) NOT NULL,
  `balance_leave` int(100) NOT NULL,
  `name` varchar(150) NOT NULL,
  `roll_no` varchar(100) NOT NULL,
  `program` varchar(150) NOT NULL,
  `department` varchar(100) NOT NULL,
  `hostel_address` text NOT NULL,
  `hall_no` varchar(100) NOT NULL,
  `days_from` date NOT NULL DEFAULT current_timestamp(),
  `days_to` date NOT NULL DEFAULT current_timestamp(),
  `prefix_date` date NOT NULL DEFAULT current_timestamp(),
  `suffix_date` date NOT NULL DEFAULT current_timestamp(),
  `purpose_of_leave` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_leave`
--

INSERT INTO `cms_leave` (`id`, `type_of_leave`, `available_leave`, `balance_leave`, `name`, `roll_no`, `program`, `department`, `hostel_address`, `hall_no`, `days_from`, `days_to`, `prefix_date`, `suffix_date`, `purpose_of_leave`, `address`, `contact_no`, `date`) VALUES
(1, 'Short Leave', 15, 14, 'Nandha Sri', '1', 'B.E', 'CSE', 'dadagapatti', '1', '2025-01-02', '2025-01-03', '2025-01-02', '2025-01-03', 'fever', 'dadagapatti', '9994468552', '2025-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `cms_no_due`
--

CREATE TABLE `cms_no_due` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `reg_no` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` enum('submitted','not submitted') NOT NULL DEFAULT 'not submitted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_no_due`
--

INSERT INTO `cms_no_due` (`id`, `name`, `reg_no`, `course`, `department`, `date`, `status`) VALUES
(1, 'Nandha Sri', '611619104075', 'BE', 'CSE', '2025-01-09', 'submitted');

-- --------------------------------------------------------

--
-- Table structure for table `cms_question_paper_preparation`
--

CREATE TABLE `cms_question_paper_preparation` (
  `id` int(11) NOT NULL,
  `collage` varchar(100) NOT NULL,
  `program_name` varchar(100) NOT NULL,
  `semester` int(8) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `register_no` varchar(100) NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `phone_no` varchar(11) NOT NULL,
  `prepare_subject` varchar(100) NOT NULL,
  `preparation_date` date NOT NULL,
  `status` enum('Allocated','Not Allocated') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_question_paper_preparation`
--

INSERT INTO `cms_question_paper_preparation` (`id`, `collage`, `program_name`, `semester`, `subject`, `date`, `register_no`, `staff_name`, `phone_no`, `prepare_subject`, `preparation_date`, `status`) VALUES
(1, 'Mahendra ', 'B.E CSE', 1, 'Computer', '2025-01-20', '1', 'nandha', '1234567890', 'Computer Science', '2025-01-24', 'Allocated');

-- --------------------------------------------------------

--
-- Table structure for table `cms_reports`
--

CREATE TABLE `cms_reports` (
  `id` int(11) NOT NULL,
  `college` varchar(100) NOT NULL,
  `program` varchar(150) NOT NULL,
  `semester` int(8) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `register_no` varchar(100) NOT NULL,
  `name` varchar(150) NOT NULL,
  `student_semester` int(8) NOT NULL,
  `cgpa` varchar(100) NOT NULL,
  `status` enum('Pass','Fail') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_reports`
--

INSERT INTO `cms_reports` (`id`, `college`, `program`, `semester`, `date`, `register_no`, `name`, `student_semester`, `cgpa`, `status`) VALUES
(1, 'Mahendra', 'B.E CSE', 1, '2025-01-31', '1', 'Nandha Sri', 1, '7.77', 'Pass');

-- --------------------------------------------------------

--
-- Table structure for table `cms_result`
--

CREATE TABLE `cms_result` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `date_of_exam` date NOT NULL DEFAULT current_timestamp(),
  `college` varchar(100) NOT NULL,
  `program_branch` varchar(150) NOT NULL,
  `regulation` varchar(11) NOT NULL,
  `semester_no` int(8) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `credits` varchar(50) NOT NULL,
  `grade` enum('O','A+','A','B+','B','C','D','U') NOT NULL,
  `grade_point` varchar(30) NOT NULL,
  `result` enum('Pass','Fail') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_result`
--

INSERT INTO `cms_result` (`id`, `name`, `date_of_birth`, `gender`, `date_of_exam`, `college`, `program_branch`, `regulation`, `semester_no`, `course_code`, `course_title`, `credits`, `grade`, `grade_point`, `result`) VALUES
(1, 'Nandha Sri', '2002-04-25', 'Male', '2025-01-16', 'Mahendra', 'B.E CSE', '2023', 1, 'HS1079', 'Computer education', '5', 'U', '7', 'Fail');

-- --------------------------------------------------------

--
-- Table structure for table `cms_revaluation_form`
--

CREATE TABLE `cms_revaluation_form` (
  `id` int(11) NOT NULL,
  `application_number` varchar(100) NOT NULL,
  `campus` varchar(100) NOT NULL,
  `name` varchar(150) NOT NULL,
  `roll_number` varchar(50) NOT NULL,
  `program` varchar(70) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `mobile_no` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mode` enum('fullTime','partTime') NOT NULL,
  `sl_no` int(11) NOT NULL,
  `semester_no` varchar(100) NOT NULL,
  `subject_code` varchar(150) NOT NULL,
  `subject_title` varchar(100) NOT NULL,
  `regular_arrear` varchar(100) NOT NULL,
  `challan_date` date NOT NULL DEFAULT current_timestamp(),
  `bank_details` varchar(150) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_revaluation_form`
--

INSERT INTO `cms_revaluation_form` (`id`, `application_number`, `campus`, `name`, `roll_number`, `program`, `branch`, `mobile_no`, `email`, `mode`, `sl_no`, `semester_no`, `subject_code`, `subject_title`, `regular_arrear`, `challan_date`, `bank_details`, `amount`, `date`) VALUES
(3, '1', 'MIT', 'NANDHA SRI', '611619104075', 'B.E/B.Tech', 'CSE', '9994468552', 'nandhasriram05@gmail.com', 'fullTime', 1, '1', 'DE8576', 'Data Engineering', 'Regular', '2024-12-16', 'State Bank', '1500', '2024-12-16'),
(4, '1', 'MIT', 'NANDHA SRI', '611619104075', 'B.E/B.Tech', 'CSE', '9994468552', 'nandhasriram05@gmail.com', 'fullTime', 2, '1', 'MC1245', 'Micro Controller', 'Regular', '2024-12-16', 'State Bank', '1500', '2024-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `cms_revaluation_marksheet`
--

CREATE TABLE `cms_revaluation_marksheet` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `date_of_exam` date NOT NULL DEFAULT current_timestamp(),
  `college` varchar(100) NOT NULL,
  `program_branch` varchar(150) NOT NULL,
  `regulation` varchar(11) NOT NULL,
  `semester_no` int(8) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `existing_grade` enum('O','A+','A','B+','B','C','D','U') NOT NULL,
  `revaluation_grade` enum('O','A+','A','B+','B','C','D','U') NOT NULL,
  `grade_point` varchar(30) NOT NULL,
  `result` enum('Pass','Fail') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_revaluation_marksheet`
--

INSERT INTO `cms_revaluation_marksheet` (`id`, `name`, `date_of_birth`, `gender`, `date_of_exam`, `college`, `program_branch`, `regulation`, `semester_no`, `course_code`, `course_title`, `existing_grade`, `revaluation_grade`, `grade_point`, `result`) VALUES
(0, 'Nandha', '2002-04-25', 'Male', '2025-01-20', 'Mahendra', 'B.E CSE', '2023', 1, 'HS1079', 'Computer education', 'U', 'B+', '7', 'Pass');

-- --------------------------------------------------------

--
-- Table structure for table `cms_staff_allocation_revaluation`
--

CREATE TABLE `cms_staff_allocation_revaluation` (
  `id` int(11) NOT NULL,
  `register_no` varchar(50) NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `phone_no` varchar(11) NOT NULL,
  `subject` varchar(75) NOT NULL,
  `semester` int(8) NOT NULL,
  `date_of_revaluation` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(150) NOT NULL DEFAULT 'Allocated'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_staff_allocation_revaluation`
--

INSERT INTO `cms_staff_allocation_revaluation` (`id`, `register_no`, `staff_name`, `phone_no`, `subject`, `semester`, `date_of_revaluation`, `status`) VALUES
(1, '1', 'Suresh', '1234567890', 'Computer', 1, '2025-01-17', 'Allocated'),
(2, '2', 'nsr', '9876543210', 'Computer', 2, '2025-01-17', 'Allocated'),
(3, '3', 'nandha', '9994468552', 'Computer', 3, '2025-01-17', 'Allocated');

-- --------------------------------------------------------

--
-- Table structure for table `cms_staff_attendance`
--

CREATE TABLE `cms_staff_attendance` (
  `id` int(11) NOT NULL,
  `collage` varchar(100) NOT NULL,
  `program` varchar(100) NOT NULL,
  `semester` int(11) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `date_of_exam` date NOT NULL DEFAULT current_timestamp(),
  `register_no` varchar(100) NOT NULL,
  `staff_name` varchar(150) NOT NULL,
  `phone_no` varchar(11) NOT NULL,
  `class_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_staff_attendance`
--

INSERT INTO `cms_staff_attendance` (`id`, `collage`, `program`, `semester`, `subject`, `date_of_exam`, `register_no`, `staff_name`, `phone_no`, `class_no`) VALUES
(1, 'Mahendra ', 'B.E', 1, 'Computer', '2025-01-14', '1', 'Suresh', '1234567890', '11');

-- --------------------------------------------------------

--
-- Table structure for table `cms_student_attendance`
--

CREATE TABLE `cms_student_attendance` (
  `id` int(11) NOT NULL,
  `collage_name` varchar(100) NOT NULL,
  `program_name` varchar(100) NOT NULL,
  `semester` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `date_of_exam` date NOT NULL DEFAULT current_timestamp(),
  `register_no` varchar(50) NOT NULL,
  `student_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_student_attendance`
--

INSERT INTO `cms_student_attendance` (`id`, `collage_name`, `program_name`, `semester`, `subject`, `date_of_exam`, `register_no`, `student_name`) VALUES
(1, 'Mahendra Collage', 'B.E CSE', 1, 'Computer', '2025-01-10', '611619104001', 'Anwar A'),
(2, 'Mahendra Collage', 'B.E CSE', 1, 'Computer', '2025-01-10', '611619104002', 'Basha');

-- --------------------------------------------------------

--
-- Table structure for table `exam_course_table`
--

CREATE TABLE `exam_course_table` (
  `id` int(11) NOT NULL,
  `course` varchar(50) NOT NULL,
  `mode_of_course` enum('Regular','PartTime','Cursus') NOT NULL DEFAULT 'Regular',
  `branch` varchar(100) NOT NULL,
  `semester` int(50) NOT NULL,
  `year` varchar(100) NOT NULL,
  `regulation` varchar(50) NOT NULL,
  `section` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_course_table`
--

INSERT INTO `exam_course_table` (`id`, `course`, `mode_of_course`, `branch`, `semester`, `year`, `regulation`, `section`) VALUES
(1, 'be', 'Regular', 'cse', 1, '2024', '2023', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `exam_form`
--

CREATE TABLE `exam_form` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `course` varchar(255) NOT NULL,
  `department` varchar(150) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `exam_date` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_form`
--

INSERT INTO `exam_form` (`id`, `student_id`, `student_name`, `course`, `department`, `subject`, `exam_date`, `status`) VALUES
(1, 1, 'nsr', 'be', 'computer', 'computer', '2024-09-01', 'Submitted'),
(4, 2, 'sri', 'be', 'computer', 'English', '2024-10-23', 'Submitted'),
(5, 3, 'nandha', 'be', 'computer', 'Tamil', '2024-10-25', 'Submitted');

-- --------------------------------------------------------

--
-- Table structure for table `exam_subject_table`
--

CREATE TABLE `exam_subject_table` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `subject_code` varchar(100) NOT NULL,
  `course` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_subject_table`
--

INSERT INTO `exam_subject_table` (`id`, `subject_name`, `subject_code`, `course`, `branch`, `year`) VALUES
(1, 'computer application', 'cs0705', 'be', 'cse', '2024');

-- --------------------------------------------------------

--
-- Table structure for table `exam_table`
--

CREATE TABLE `exam_table` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(100) NOT NULL,
  `year` varchar(50) NOT NULL,
  `month` varchar(50) NOT NULL,
  `regulation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_table`
--

INSERT INTO `exam_table` (`id`, `exam_name`, `year`, `month`, `regulation`) VALUES
(1, '2024 final sem', '2024', 'June', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `exam_time_table`
--

CREATE TABLE `exam_time_table` (
  `id` int(11) NOT NULL,
  `subject_table_id` int(20) NOT NULL,
  `exam_table_id` int(20) NOT NULL,
  `course_table_id` int(20) NOT NULL,
  `exam_date` date NOT NULL,
  `day` varchar(50) NOT NULL,
  `session` enum('FN','AN') NOT NULL DEFAULT 'FN',
  `session_time` time NOT NULL,
  `semester` int(50) NOT NULL,
  `subject_type` varchar(50) NOT NULL,
  `exam_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_time_table`
--

INSERT INTO `exam_time_table` (`id`, `subject_table_id`, `exam_table_id`, `course_table_id`, `exam_date`, `day`, `session`, `session_time`, `semester`, `subject_type`, `exam_type`) VALUES
(1, 1, 1, 1, '2024-09-01', 'monday', 'FN', '10:00:00', 1, 'regular', 'sem');

-- --------------------------------------------------------

--
-- Table structure for table `fee_collection`
--

CREATE TABLE `fee_collection` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `department` varchar(150) NOT NULL,
  `academic_amount` decimal(10,2) NOT NULL,
  `lab_amount` decimal(10,2) NOT NULL,
  `sports_amount` decimal(10,2) NOT NULL,
  `placement_amount` decimal(10,2) NOT NULL,
  `due_date` date NOT NULL,
  `status` enum('Paid','Unpaid') NOT NULL DEFAULT 'Unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fee_collection`
--

INSERT INTO `fee_collection` (`id`, `student_id`, `student_name`, `class`, `department`, `academic_amount`, `lab_amount`, `sports_amount`, `placement_amount`, `due_date`, `status`) VALUES
(1, 1, 'nsr', 'be', 'computer', 2000.00, 0.00, 0.00, 0.00, '2024-09-01', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `no_due_certificate`
--

CREATE TABLE `no_due_certificate` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `course` varchar(150) NOT NULL,
  `department` varchar(100) NOT NULL,
  `exam_fee` enum('Paid','Unpaid') NOT NULL DEFAULT 'Unpaid',
  `attendance` int(200) NOT NULL,
  `issue_date` date NOT NULL,
  `status` enum('Allowed','NotAllowed') NOT NULL DEFAULT 'NotAllowed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `no_due_certificate`
--

INSERT INTO `no_due_certificate` (`id`, `student_id`, `student_name`, `course`, `department`, `exam_fee`, `attendance`, `issue_date`, `status`) VALUES
(1, 1, 'nsr', 'be', 'computer', 'Unpaid', 90, '2024-09-01', 'NotAllowed');

-- --------------------------------------------------------

--
-- Table structure for table `paper_valuation`
--

CREATE TABLE `paper_valuation` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `marks_awarded` int(11) NOT NULL,
  `valuation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paper_valuation`
--

INSERT INTO `paper_valuation` (`id`, `staff_id`, `student_id`, `exam_id`, `staff_name`, `subject_name`, `marks_awarded`, `valuation_date`) VALUES
(1, 1, 1, 1, 'nandha', 'computer science', 400, '2024-09-04');

-- --------------------------------------------------------

--
-- Table structure for table `question_paper_preparation`
--

CREATE TABLE `question_paper_preparation` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `staff_name` varchar(50) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `preparation_date` date NOT NULL,
  `status` enum('Allotted','NotAllotted') NOT NULL DEFAULT 'Allotted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_paper_preparation`
--

INSERT INTO `question_paper_preparation` (`id`, `staff_id`, `exam_id`, `staff_name`, `subject_name`, `preparation_date`, `status`) VALUES
(1, 1, 1, 'nandha', 'English', '2024-09-04', 'Allotted');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `student_id` int(100) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `report_type` varchar(255) NOT NULL,
  `mark` int(200) NOT NULL,
  `generation_date` date NOT NULL,
  `details` text NOT NULL,
  `status` enum('Pass','Fail') NOT NULL DEFAULT 'Fail'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `student_id`, `student_name`, `report_type`, `mark`, `generation_date`, `details`, `status`) VALUES
(1, 1, 'nsr', 'mark', 470, '2024-09-03', 'good', 'Pass');

-- --------------------------------------------------------

--
-- Table structure for table `result_mark_sheet`
--

CREATE TABLE `result_mark_sheet` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `total_marks` int(11) NOT NULL,
  `result_status` enum('Pass','Fail') NOT NULL DEFAULT 'Pass',
  `result_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result_mark_sheet`
--

INSERT INTO `result_mark_sheet` (`id`, `student_id`, `exam_id`, `student_name`, `date_of_birth`, `phone_number`, `total_marks`, `result_status`, `result_date`) VALUES
(1, 1, 1, 'nsr', '2024-10-03', '1234567890', 450, 'Fail', '2024-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `result_mark_sheet_revalution`
--

CREATE TABLE `result_mark_sheet_revalution` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `revolution_form_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `existing_mark` int(200) NOT NULL,
  `revised_marks` int(200) NOT NULL,
  `result_status` enum('Pass','Fail') NOT NULL DEFAULT 'Fail',
  `result_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result_mark_sheet_revalution`
--

INSERT INTO `result_mark_sheet_revalution` (`id`, `student_id`, `revolution_form_id`, `student_name`, `existing_mark`, `revised_marks`, `result_status`, `result_date`) VALUES
(1, 1, 1, 'nsr', 450, 480, 'Pass', '2024-09-03');

-- --------------------------------------------------------

--
-- Table structure for table `revalution_form`
--

CREATE TABLE `revalution_form` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `submission_date` date NOT NULL,
  `status` enum('Pending','Approved') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `revalution_form`
--

INSERT INTO `revalution_form` (`id`, `student_id`, `exam_id`, `student_name`, `course`, `subject_name`, `submission_date`, `status`) VALUES
(1, 1, 1, 'nsr', 'computer', 'English', '2024-09-03', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `room_allocation`
--

CREATE TABLE `room_allocation` (
  `id` int(11) NOT NULL,
  `student_id_from` int(11) NOT NULL,
  `student_id_to` int(11) NOT NULL,
  `course` varchar(100) NOT NULL,
  `subject_code` varchar(100) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `room_number` varchar(50) NOT NULL,
  `building_name` varchar(100) NOT NULL,
  `exam_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_allocation`
--

INSERT INTO `room_allocation` (`id`, `student_id_from`, `student_id_to`, `course`, `subject_code`, `subject_name`, `time`, `room_number`, `building_name`, `exam_date`) VALUES
(1, 0, 0, 'be', '', '', '2024-10-28 05:46:10', '15', '', '2024-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `staff_allocation`
--

CREATE TABLE `staff_allocation` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `room_number` varchar(50) NOT NULL,
  `subject_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_allocation`
--

INSERT INTO `staff_allocation` (`id`, `staff_id`, `exam_id`, `staff_name`, `room_number`, `subject_name`) VALUES
(1, 1, 1, 'nandha', '11', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `staff_allocation_revaluation`
--

CREATE TABLE `staff_allocation_revaluation` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `revaluation_form_id` int(11) NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `allocation_date` date NOT NULL,
  `status` enum('Allocated','Unallocated') NOT NULL DEFAULT 'Unallocated'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_allocation_revaluation`
--

INSERT INTO `staff_allocation_revaluation` (`id`, `staff_id`, `revaluation_form_id`, `staff_name`, `phone_number`, `subject_name`, `allocation_date`, `status`) VALUES
(1, 1, 1, 'nandha', '1234567890', 'computer science', '2024-09-03', 'Allocated');

-- --------------------------------------------------------

--
-- Table structure for table `staff_attendance`
--

CREATE TABLE `staff_attendance` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `attendance_date` date NOT NULL,
  `status` enum('Present','Absent') NOT NULL DEFAULT 'Present'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_attendance`
--

INSERT INTO `staff_attendance` (`id`, `staff_id`, `exam_id`, `staff_name`, `attendance_date`, `status`) VALUES
(1, 1, 1, 'nandha', '2024-09-02', 'Absent'),
(2, 2, 2, 'sri', '2024-09-02', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `attendance_date` date NOT NULL,
  `status` enum('Present','Absent') NOT NULL DEFAULT 'Present'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`id`, `student_id`, `exam_id`, `student_name`, `subject`, `attendance_date`, `status`) VALUES
(1, 1, 1, 'nsr', 'English', '2024-09-02', 'Absent');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'nsr@gmail.com', '$2y$10$C/OXSWahk.yOs.S.bn7dCu6sjXBbA0yDIknat4jwJ0J0BYx/EaI9K');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_attendance`
--
ALTER TABLE `cms_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_bus`
--
ALTER TABLE `cms_bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_exam_form`
--
ALTER TABLE `cms_exam_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_hall_ticket`
--
ALTER TABLE `cms_hall_ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_hall_ticket_subjects`
--
ALTER TABLE `cms_hall_ticket_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hall_ticket_id` (`hall_ticket_id`);

--
-- Indexes for table `cms_hostel`
--
ALTER TABLE `cms_hostel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_leave`
--
ALTER TABLE `cms_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_no_due`
--
ALTER TABLE `cms_no_due`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_question_paper_preparation`
--
ALTER TABLE `cms_question_paper_preparation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_reports`
--
ALTER TABLE `cms_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_result`
--
ALTER TABLE `cms_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_revaluation_form`
--
ALTER TABLE `cms_revaluation_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_staff_allocation_revaluation`
--
ALTER TABLE `cms_staff_allocation_revaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_staff_attendance`
--
ALTER TABLE `cms_staff_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_student_attendance`
--
ALTER TABLE `cms_student_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_course_table`
--
ALTER TABLE `exam_course_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_form`
--
ALTER TABLE `exam_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_subject_table`
--
ALTER TABLE `exam_subject_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_table`
--
ALTER TABLE `exam_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_time_table`
--
ALTER TABLE `exam_time_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_collection`
--
ALTER TABLE `fee_collection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `no_due_certificate`
--
ALTER TABLE `no_due_certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paper_valuation`
--
ALTER TABLE `paper_valuation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_paper_preparation`
--
ALTER TABLE `question_paper_preparation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_mark_sheet`
--
ALTER TABLE `result_mark_sheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_mark_sheet_revalution`
--
ALTER TABLE `result_mark_sheet_revalution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revalution_form`
--
ALTER TABLE `revalution_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_allocation`
--
ALTER TABLE `room_allocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_allocation`
--
ALTER TABLE `staff_allocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_allocation_revaluation`
--
ALTER TABLE `staff_allocation_revaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_attendance`
--
ALTER TABLE `staff_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_attendance`
--
ALTER TABLE `cms_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_bus`
--
ALTER TABLE `cms_bus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cms_exam_form`
--
ALTER TABLE `cms_exam_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_hall_ticket`
--
ALTER TABLE `cms_hall_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cms_hostel`
--
ALTER TABLE `cms_hostel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cms_leave`
--
ALTER TABLE `cms_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_no_due`
--
ALTER TABLE `cms_no_due`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_question_paper_preparation`
--
ALTER TABLE `cms_question_paper_preparation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_reports`
--
ALTER TABLE `cms_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_result`
--
ALTER TABLE `cms_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_revaluation_form`
--
ALTER TABLE `cms_revaluation_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cms_staff_allocation_revaluation`
--
ALTER TABLE `cms_staff_allocation_revaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cms_staff_attendance`
--
ALTER TABLE `cms_staff_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_student_attendance`
--
ALTER TABLE `cms_student_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam_course_table`
--
ALTER TABLE `exam_course_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam_form`
--
ALTER TABLE `exam_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exam_subject_table`
--
ALTER TABLE `exam_subject_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam_table`
--
ALTER TABLE `exam_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam_time_table`
--
ALTER TABLE `exam_time_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fee_collection`
--
ALTER TABLE `fee_collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `no_due_certificate`
--
ALTER TABLE `no_due_certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paper_valuation`
--
ALTER TABLE `paper_valuation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question_paper_preparation`
--
ALTER TABLE `question_paper_preparation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `result_mark_sheet`
--
ALTER TABLE `result_mark_sheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `result_mark_sheet_revalution`
--
ALTER TABLE `result_mark_sheet_revalution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `revalution_form`
--
ALTER TABLE `revalution_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room_allocation`
--
ALTER TABLE `room_allocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff_allocation`
--
ALTER TABLE `staff_allocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff_allocation_revaluation`
--
ALTER TABLE `staff_allocation_revaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff_attendance`
--
ALTER TABLE `staff_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
