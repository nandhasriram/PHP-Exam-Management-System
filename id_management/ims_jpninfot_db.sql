-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2026 at 06:06 AM
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
-- Database: `ims_jpninfot_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admisapplicaparentsdetail`
--

CREATE TABLE `admisapplicaparentsdetail` (
  `id` int(11) NOT NULL,
  `EnrollNo` varchar(20) NOT NULL,
  `AdmissionNo` varchar(20) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `FatherSurName` varchar(150) NOT NULL,
  `StudentName` varchar(150) NOT NULL,
  `FatherName` varchar(150) NOT NULL,
  `FatherDob` varchar(30) NOT NULL,
  `FatherNationality` varchar(100) NOT NULL,
  `FatherQualification` varchar(150) NOT NULL,
  `FatherOccupation` varchar(150) NOT NULL,
  `FatherCitizenship` varchar(100) NOT NULL,
  `FatherDesignation` varchar(200) NOT NULL,
  `FatherOffice1` varchar(150) NOT NULL,
  `FatherOffice2` varchar(150) NOT NULL,
  `FatherMobile` varchar(50) NOT NULL,
  `FatherOffphone` varchar(50) NOT NULL,
  `FatherEmail` varchar(200) NOT NULL,
  `MotherName` varchar(150) NOT NULL,
  `MotherDob` varchar(30) NOT NULL,
  `MotherNationality` varchar(100) NOT NULL,
  `MotherSurname` varchar(150) NOT NULL,
  `MotherQualification` varchar(150) NOT NULL,
  `MotherOccupation` varchar(150) NOT NULL,
  `MotherCitizenship` varchar(100) NOT NULL,
  `MotherDesignation` varchar(200) NOT NULL,
  `MotherOffice1` varchar(150) NOT NULL,
  `MotherOffice2` varchar(150) NOT NULL,
  `MotherMobile` varchar(50) NOT NULL,
  `MotherOffphone` varchar(50) NOT NULL,
  `MotherEmail` varchar(200) NOT NULL,
  `GuardianName` varchar(150) NOT NULL,
  `GuardianDob` varchar(30) NOT NULL,
  `GuardianNationality` varchar(100) NOT NULL,
  `GuardianSurname` varchar(150) NOT NULL,
  `GuardianQualification` varchar(150) NOT NULL,
  `GuardianOccupation` varchar(150) NOT NULL,
  `GuardianCitizenship` varchar(100) NOT NULL,
  `GuardianDesignation` varchar(200) NOT NULL,
  `GuardianOffice1` varchar(150) NOT NULL,
  `GuardianOffice2` varchar(150) NOT NULL,
  `GuardianMobile` varchar(50) NOT NULL,
  `GuardianOffphone` varchar(50) NOT NULL,
  `GuardianEmail` varchar(200) NOT NULL,
  `Studentphoto` varchar(200) NOT NULL,
  `Fatherphoto` varchar(150) NOT NULL,
  `Motherphoto` varchar(150) NOT NULL,
  `Guardianphoto` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admisapplicapassportlangdetail`
--

CREATE TABLE `admisapplicapassportlangdetail` (
  `id` int(11) NOT NULL,
  `EnrollNo` varchar(20) NOT NULL,
  `AdmissionNo` varchar(20) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `Country` varchar(250) NOT NULL,
  `PASSPORTNumber` varchar(150) NOT NULL,
  `PASSPORTPlaceofissue` varchar(150) NOT NULL,
  `PASSPORTDateofissue` varchar(100) NOT NULL,
  `PASSPORTValidupto` varchar(100) NOT NULL,
  `PASSPORTTypeVisa` varchar(200) NOT NULL,
  `PASSPORTDateofexpiry` varchar(40) NOT NULL,
  `PASSPORTOtherdetails` varchar(400) NOT NULL,
  `Language1` varchar(150) NOT NULL,
  `Language1ToSpeak` varchar(100) NOT NULL,
  `Language1ToRead` varchar(100) NOT NULL,
  `Language1ToWrite` varchar(100) NOT NULL,
  `Language2` varchar(150) NOT NULL,
  `Language2ToSpeak` varchar(100) NOT NULL,
  `Language2ToRead` varchar(100) NOT NULL,
  `Language2ToWrite` varchar(100) NOT NULL,
  `Language3` varchar(150) NOT NULL,
  `Language3ToSpeak` varchar(100) NOT NULL,
  `Language3ToRead` varchar(100) NOT NULL,
  `Language3ToWrite` varchar(100) NOT NULL,
  `Language4` varchar(150) NOT NULL,
  `Language4ToSpeak` varchar(100) NOT NULL,
  `Language4ToRead` varchar(100) NOT NULL,
  `Language4ToWrite` varchar(100) NOT NULL,
  `ENGLISHSpeak` varchar(100) NOT NULL,
  `ENGLISHRead` varchar(100) NOT NULL,
  `ENGLISHWrite` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admisapplicapervacadrec`
--

CREATE TABLE `admisapplicapervacadrec` (
  `id` int(11) NOT NULL,
  `EnrollNo` varchar(20) NOT NULL,
  `AdmissionNo` varchar(20) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `PRERECLKGschool` varchar(200) NOT NULL,
  `PRERECLKGCountryState` varchar(100) NOT NULL,
  `PRERECLKGAcademicyr` varchar(50) NOT NULL,
  `PRERECLKGMedium` varchar(200) NOT NULL,
  `PRERECLKGSecLang` varchar(200) NOT NULL,
  `PRERECLKGThirdLang` varchar(200) NOT NULL,
  `PRERECUKGschool` varchar(200) NOT NULL,
  `PRERECUKGCountryState` varchar(100) NOT NULL,
  `PRERECUKGAcademicyr` varchar(50) NOT NULL,
  `PRERECUKGMedium` varchar(200) NOT NULL,
  `PRERECUKGSecLang` varchar(200) NOT NULL,
  `PRERECUKGThirdLang` varchar(200) NOT NULL,
  `PRERECIschool` varchar(200) NOT NULL,
  `PRERECICountryState` varchar(100) NOT NULL,
  `PRERECIAcademicyr` varchar(50) NOT NULL,
  `PRERECIMedium` varchar(200) NOT NULL,
  `PRERECISecLang` varchar(200) NOT NULL,
  `PRERECIThirdLang` varchar(200) NOT NULL,
  `PRERECIIschool` varchar(200) NOT NULL,
  `PRERECIICountryState` varchar(100) NOT NULL,
  `PRERECIIAcademicyr` varchar(50) NOT NULL,
  `PRERECIIMedium` varchar(200) NOT NULL,
  `PRERECIISecLang` varchar(200) NOT NULL,
  `PRERECIIThirdLang` varchar(200) NOT NULL,
  `PRERECIIIschool` varchar(200) NOT NULL,
  `PRERECIIICountryState` varchar(100) NOT NULL,
  `PRERECIIIAcademicyr` varchar(50) NOT NULL,
  `PRERECIIIMedium` varchar(200) NOT NULL,
  `PRERECIIISecLang` varchar(200) NOT NULL,
  `PRERECIIIThirdLang` varchar(200) NOT NULL,
  `PRERECIVschool` varchar(200) NOT NULL,
  `PRERECIVCountryState` varchar(100) NOT NULL,
  `PRERECIVAcademicyr` varchar(50) NOT NULL,
  `PRERECIVMedium` varchar(200) NOT NULL,
  `PRERECIVSecLang` varchar(200) NOT NULL,
  `PRERECIVThirdLang` varchar(200) NOT NULL,
  `PRERECVschool` varchar(200) NOT NULL,
  `PRERECVCountryState` varchar(100) NOT NULL,
  `PRERECVAcademicyr` varchar(50) NOT NULL,
  `PRERECVMedium` varchar(200) NOT NULL,
  `PRERECVSecLang` varchar(200) NOT NULL,
  `PRERECVThirdLang` varchar(200) NOT NULL,
  `PRERECVIschool` varchar(200) NOT NULL,
  `PRERECVICountryState` varchar(100) NOT NULL,
  `PRERECVIAcademicyr` varchar(50) NOT NULL,
  `PRERECVIMedium` varchar(200) NOT NULL,
  `PRERECVISecLang` varchar(200) NOT NULL,
  `PRERECVIThirdLang` varchar(200) NOT NULL,
  `PRERECVIIschool` varchar(200) NOT NULL,
  `PRERECVIICountryState` varchar(100) NOT NULL,
  `PRERECVIIAcademicyr` varchar(50) NOT NULL,
  `PRERECVIIMedium` varchar(200) NOT NULL,
  `PRERECVIISecLang` varchar(200) NOT NULL,
  `PRERECVIIThirdLang` varchar(200) NOT NULL,
  `PRERECVIIIschool` varchar(200) NOT NULL,
  `PRERECVIIICountryState` varchar(100) NOT NULL,
  `PRERECVIIIAcademicyr` varchar(50) NOT NULL,
  `PRERECVIIIMedium` varchar(200) NOT NULL,
  `PRERECVIIISecLang` varchar(200) NOT NULL,
  `PRERECVIIIThirdLang` varchar(200) NOT NULL,
  `PRERECIXschool` varchar(200) NOT NULL,
  `PRERECIXCountryState` varchar(100) NOT NULL,
  `PRERECIXAcademicyr` varchar(50) NOT NULL,
  `PRERECIXMedium` varchar(200) NOT NULL,
  `PRERECIXSecLang` varchar(200) NOT NULL,
  `PRERECIXThirdLang` varchar(200) NOT NULL,
  `PRERECXschool` varchar(200) NOT NULL,
  `PRERECXCountryState` varchar(100) NOT NULL,
  `PRERECXAcademicyr` varchar(50) NOT NULL,
  `PRERECXMedium` varchar(200) NOT NULL,
  `PRERECXSecLang` varchar(200) NOT NULL,
  `PRERECXThirdLang` varchar(200) NOT NULL,
  `PRERECXIschool` varchar(200) NOT NULL,
  `PRERECXICountryState` varchar(100) NOT NULL,
  `PRERECXIAcademicyr` varchar(50) NOT NULL,
  `PRERECXIMedium` varchar(200) NOT NULL,
  `PRERECXISecLang` varchar(200) NOT NULL,
  `PRERECXIThirdLang` varchar(200) NOT NULL,
  `PRERECXIIschool` varchar(200) NOT NULL,
  `PRERECXIICountryState` varchar(100) NOT NULL,
  `PRERECXIIAcademicyr` varchar(50) NOT NULL,
  `PRERECXIIMedium` varchar(200) NOT NULL,
  `PRERECXIISecLang` varchar(200) NOT NULL,
  `PRERECXIIThirdLang` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admisapplicapervacadrec_cms`
--

CREATE TABLE `admisapplicapervacadrec_cms` (
  `id` int(11) NOT NULL,
  `EnrollNo` varchar(30) NOT NULL,
  `AdmissionNo` varchar(30) NOT NULL,
  `Date` varchar(30) NOT NULL,
  `schoolName_xii` varchar(200) NOT NULL,
  `RegNo_xii` varchar(100) NOT NULL,
  `Academic_Year_xii` varchar(50) NOT NULL,
  `Attempts_xii` varchar(10) NOT NULL,
  `Board_of_Exam_xii` varchar(200) NOT NULL,
  `Language_xii` varchar(100) NOT NULL,
  `Subject1_xii` varchar(200) NOT NULL,
  `Marks1_xii` varchar(10) NOT NULL,
  `Subject2_xii` varchar(100) NOT NULL,
  `Marks2_xii` varchar(10) NOT NULL,
  `Subject3_xii` varchar(100) NOT NULL,
  `Marks3_xii` varchar(10) NOT NULL,
  `Subject4_xii` varchar(100) NOT NULL,
  `Marks4_xii` varchar(10) NOT NULL,
  `Subject5_xii` varchar(100) NOT NULL,
  `Marks5_xii` varchar(10) NOT NULL,
  `Subject6_xii` varchar(100) NOT NULL,
  `Marks6_xii` varchar(10) NOT NULL,
  `PRE_Dip_Degree` varchar(200) NOT NULL,
  `PRE_Deg_Ins_name` varchar(200) NOT NULL,
  `PRE_Deg_RegNo` varchar(50) NOT NULL,
  `PRE_Deg_Acad_Year` varchar(20) NOT NULL,
  `PRE_Deg_Discipline` varchar(200) NOT NULL,
  `PRE_Deg_University` varchar(200) NOT NULL,
  `PRE_Deg_Class` varchar(20) NOT NULL,
  `PRE_Deg_Mark1` varchar(10) NOT NULL,
  `PRE_Deg_Sem1` varchar(20) NOT NULL,
  `PRE_Deg_Mark2` varchar(10) NOT NULL,
  `PRE_Deg_Sem2` varchar(20) NOT NULL,
  `PRE_Deg_Mark3` varchar(10) NOT NULL,
  `PRE_Deg_Sem3` varchar(20) NOT NULL,
  `PRE_Deg_Mark4` varchar(10) NOT NULL,
  `PRE_Deg_Sem4` varchar(20) NOT NULL,
  `PRE_Deg_Mark5` varchar(10) NOT NULL,
  `PRE_Deg_Sem5` varchar(20) NOT NULL,
  `PRE_Deg_Mark6` varchar(10) NOT NULL,
  `PRE_Deg_Sem6` varchar(20) NOT NULL,
  `PRE_Deg_Mark7` varchar(10) NOT NULL,
  `PRE_Deg_Sem7` varchar(20) NOT NULL,
  `PRE_Deg_Mark8` varchar(10) NOT NULL,
  `PRE_Deg_Sem8` varchar(20) NOT NULL,
  `PRE_Deg_Mark9` varchar(10) NOT NULL,
  `PRE_Deg_Sem9` varchar(20) NOT NULL,
  `PRE_Deg_Mark10` varchar(10) NOT NULL,
  `PRE_Deg_Sem10` varchar(20) NOT NULL,
  `PRE_Deg_Mark11` varchar(10) NOT NULL,
  `PRE_Deg_Sem11` varchar(20) NOT NULL,
  `PRE_Deg_Mark12` varchar(10) NOT NULL,
  `PRE_Deg_Sem12` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admisapplicasiblingacadother`
--

CREATE TABLE `admisapplicasiblingacadother` (
  `id` int(11) NOT NULL,
  `EnrollNo` varchar(20) NOT NULL,
  `AdmissionNo` varchar(20) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `SiblingName1` varchar(200) NOT NULL,
  `SiblingAge1` varchar(20) NOT NULL,
  `SiblingClass1` varchar(150) NOT NULL,
  `SiblingSchoolCollege1` varchar(200) NOT NULL,
  `SiblingName2` varchar(200) NOT NULL,
  `SiblingAge2` varchar(20) NOT NULL,
  `SiblingClass2` varchar(150) NOT NULL,
  `SiblingSchoolCollege2` varchar(200) NOT NULL,
  `SiblingName3` varchar(200) NOT NULL,
  `SiblingAge3` varchar(20) NOT NULL,
  `SiblingClass3` varchar(150) NOT NULL,
  `SiblingSchoolCollege3` varchar(200) NOT NULL,
  `academicachieve` varchar(400) NOT NULL,
  `extracurricularachieve` varchar(400) NOT NULL,
  `learningassessment` varchar(400) NOT NULL,
  `healthconcerns` varchar(400) NOT NULL,
  `disciplinaryproblems` varchar(400) NOT NULL,
  `otherinformation` varchar(400) NOT NULL,
  `expectationsfrSchool` varchar(400) NOT NULL,
  `expectationsothers` varchar(400) NOT NULL,
  `IDENTIFICATIONMARKS1` varchar(400) NOT NULL,
  `IDENTIFICATIONMARKS2` varchar(400) NOT NULL,
  `DECLARATION` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admisapplicastuddetail`
--

CREATE TABLE `admisapplicastuddetail` (
  `id` int(11) NOT NULL,
  `EnrollNo` varchar(20) NOT NULL,
  `AdmissionNo` varchar(20) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `StudentSurName` varchar(150) NOT NULL,
  `StudentName` varchar(150) NOT NULL,
  `dobdd` varchar(30) NOT NULL,
  `dobmm` varchar(5) NOT NULL,
  `dobyy` varchar(5) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Age` varchar(20) NOT NULL,
  `MotherTongue` varchar(200) NOT NULL,
  `Religion` varchar(100) NOT NULL,
  `Nationality` varchar(100) NOT NULL,
  `Community` varchar(100) NOT NULL,
  `Caste` varchar(100) NOT NULL,
  `PresentAddress1` varchar(250) NOT NULL,
  `PresentAddress2` varchar(250) NOT NULL,
  `PresentAddress3` varchar(250) NOT NULL,
  `PresentAddress4` varchar(250) NOT NULL,
  `PresentPinCode` varchar(230) NOT NULL,
  `PresentState` varchar(250) NOT NULL,
  `PresentResPhone` varchar(20) NOT NULL,
  `PresentEmail` varchar(200) NOT NULL,
  `PermanentAddress1` varchar(250) NOT NULL,
  `PermanentAddress2` varchar(250) NOT NULL,
  `PermanentAddress3` varchar(250) NOT NULL,
  `PermanentAddress4` varchar(250) NOT NULL,
  `PermanentPinCode` varchar(230) NOT NULL,
  `PermanentState` varchar(250) NOT NULL,
  `PermanentResPhone` varchar(20) NOT NULL,
  `PermanentEmail` varchar(200) NOT NULL,
  `admissionClass` varchar(100) NOT NULL,
  `admissionSection` varchar(100) NOT NULL,
  `Secondlanguage` varchar(100) NOT NULL,
  `GroupinclassXI` varchar(200) NOT NULL,
  `Parent_occupation` varchar(200) NOT NULL,
  `Annual_Income` varchar(50) NOT NULL,
  `Special_Category` varchar(200) NOT NULL,
  `Quota` varchar(200) NOT NULL,
  `Physical_Disability` varchar(200) NOT NULL,
  `Marital_Status` varchar(200) NOT NULL,
  `Blood_Group` varchar(200) NOT NULL,
  `Hostel_Required` varchar(200) NOT NULL,
  `Trans_Board_point` varchar(200) NOT NULL,
  `DD_No` varchar(50) NOT NULL,
  `dd_Date` date NOT NULL,
  `Bank` varchar(200) NOT NULL,
  `Amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admisapplicastuddetail`
--

INSERT INTO `admisapplicastuddetail` (`id`, `EnrollNo`, `AdmissionNo`, `Date`, `StudentSurName`, `StudentName`, `dobdd`, `dobmm`, `dobyy`, `Gender`, `Age`, `MotherTongue`, `Religion`, `Nationality`, `Community`, `Caste`, `PresentAddress1`, `PresentAddress2`, `PresentAddress3`, `PresentAddress4`, `PresentPinCode`, `PresentState`, `PresentResPhone`, `PresentEmail`, `PermanentAddress1`, `PermanentAddress2`, `PermanentAddress3`, `PermanentAddress4`, `PermanentPinCode`, `PermanentState`, `PermanentResPhone`, `PermanentEmail`, `admissionClass`, `admissionSection`, `Secondlanguage`, `GroupinclassXI`, `Parent_occupation`, `Annual_Income`, `Special_Category`, `Quota`, `Physical_Disability`, `Marital_Status`, `Blood_Group`, `Hostel_Required`, `Trans_Board_point`, `DD_No`, `dd_Date`, `Bank`, `Amount`) VALUES
(11, '', '1', '08/12/2024', '', 'Nandha Sri', '25', '04', '2002', 'Male', '22', '', 'Hindu', 'Indian', 'BC', 'Devangar', '', '', '', '', '', '', '9994468552', 'nandhasriram05@gmail.com', '', '', '', '', '', '', '', '', 'BE', 'CSE', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', ''),
(12, '', '2', '09/12/2024', '', 'Sriram', '26', '05', '2002', 'Male', '22', '', 'Hindu', 'Indian', 'BC', 'Devangar', '', '', '', '', '', '', '9791203099', 'sriram007@gmail.com', '', '', '', '', '', '', '', '', '8', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', ''),
(13, '', '3', '09/12/2024', '', 'Prakash', '26', '07', '2002', 'Male', '28', '', 'Hindu', 'Indian', 'BC', 'Devangar', '', '', '', '', '', '', '7418522136', 'prakash12@gmail.com', '', '', '', '', '', '', '', '', '8', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', ''),
(14, '', '4', '10/12/2024', '', 'Yuvaraj', '28', '7', '2004', 'Male', '21', '', 'Hindu', 'Indian', 'BC', 'Devangar', '', '', '', '', '', '', '8248171923', 'yuvaraj21@gmail.com', '', '', '', '', '', '', '', '', '10', 'C', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `classbscseccsstudattendance`
--

CREATE TABLE `classbscseccsstudattendance` (
  `id` int(11) NOT NULL,
  `sno` varchar(10) NOT NULL,
  `AdmissionNo` varchar(20) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `StudentName` varchar(250) NOT NULL,
  `RollNumber` varchar(10) NOT NULL,
  `Attendance` varchar(300) NOT NULL,
  `Class` varchar(200) NOT NULL,
  `GroupSection` varchar(30) NOT NULL,
  `AttendanceDate` varchar(50) NOT NULL,
  `ampm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classbscseccsstuddetail`
--

CREATE TABLE `classbscseccsstuddetail` (
  `Id` int(11) NOT NULL,
  `AdmissionNo` varchar(20) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `StudentName` varchar(250) NOT NULL,
  `RollNumber` varchar(10) NOT NULL,
  `Community` varchar(300) NOT NULL,
  `Class` varchar(200) NOT NULL,
  `GroupSection` varchar(300) NOT NULL,
  `DateofAdmission` varchar(50) NOT NULL,
  `DateofBirth` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classbscseccsstuddetail`
--

INSERT INTO `classbscseccsstuddetail` (`Id`, `AdmissionNo`, `Date`, `StudentName`, `RollNumber`, `Community`, `Class`, `GroupSection`, `DateofAdmission`, `DateofBirth`) VALUES
(7, '1', '19/11/2024', 'nsr', '1', 'bc', 'be', 'cse', '24/7/2019', '25/04/2002');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admisapplicastuddetail`
--
ALTER TABLE `admisapplicastuddetail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admisapplicastuddetail`
--
ALTER TABLE `admisapplicastuddetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
