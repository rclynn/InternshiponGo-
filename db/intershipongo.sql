-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2022 at 05:39 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intershipongo`
--

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE `agency` (
  `agencyNAME` varchar(100) NOT NULL,
  `agencyPERSONEL` varchar(110) NOT NULL,
  `agencyIMG` varchar(100) DEFAULT NULL,
  `agencyUSERNAME` varchar(100) DEFAULT NULL,
  `agencyPASSWORD` varchar(100) DEFAULT NULL,
  `agencyCONTACT` varchar(100) DEFAULT NULL,
  `agencyLOCATION` varchar(110) DEFAULT NULL,
  `agencyID` int(10) NOT NULL,
  `agencyWORKAVAILID` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agency`
--

INSERT INTO `agency` (`agencyNAME`, `agencyPERSONEL`, `agencyIMG`, `agencyUSERNAME`, `agencyPASSWORD`, `agencyCONTACT`, `agencyLOCATION`, `agencyID`, `agencyWORKAVAILID`) VALUES
('Psu', 'VAA', 'null.png', '1', '1', '09000000001', 'Lingayen, Pangasinan', 1, ''),
('PHILIPPINE INFORMATION AGENCY', 'MS. VENUS MAY SARMIENTO', 'null.png', '2', '2', '09000000002', 'Dagupan City, Pangasinan', 2, ''),
('GIRL SCOUTS OF THE PHILIPPINES', 'Sample 1', 'null.png', '3', '3', '09000000003', 'Sample', 3, ''),
('PHILIPPINE HEALTH INSURANCE CORPORATION', 'ATTY. RODOLFO B. DEL ROSARIO, JR.', 'null.png', '4', '4', '09000000004', 'Sample', 4, ''),
('YES FM', 'Sample 2', 'null.png', '5', '5', '09000000005', 'Sample', 5, ''),
('RTC LINGAYEN', 'Sample 3', 'null.png', '6', '6', '09000000006', 'Lingayen, Pangasinan', 6, '');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructorID` int(100) NOT NULL,
  `instructorNAME` varchar(100) DEFAULT NULL,
  `instructorUSERNAME` varchar(100) DEFAULT NULL,
  `instructorPASSWORD` varchar(100) DEFAULT NULL,
  `instructorNUMBER` varchar(100) DEFAULT NULL,
  `instructorSECTIONHANDLE` varchar(100) DEFAULT NULL,
  `instructorCOURSE` varchar(100) DEFAULT NULL,
  `instructorSCHOOL` varchar(100) DEFAULT NULL,
  `instructorIMG` varchar(100) DEFAULT NULL,
  `instructorDATEADDED` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructorID`, `instructorNAME`, `instructorUSERNAME`, `instructorPASSWORD`, `instructorNUMBER`, `instructorSECTIONHANDLE`, `instructorCOURSE`, `instructorSCHOOL`, `instructorIMG`, `instructorDATEADDED`) VALUES
(1, 'VAA', 'VAA', 'VAA', NULL, 'A', 'Bachelor of Science in Information and Technology', 'Pangasinan State University', 'null.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentID` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `studentnumber` varchar(50) NOT NULL,
  `picture` varchar(50) DEFAULT NULL,
  `contactnumber` varchar(20) NOT NULL,
  `datecreated` varchar(20) NOT NULL,
  `agency` varchar(10) NOT NULL,
  `section` varchar(10) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `colleges` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `esignature` varchar(100) DEFAULT NULL,
  `classyear` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `firstname`, `middlename`, `lastname`, `address`, `birthdate`, `gender`, `password`, `studentnumber`, `picture`, `contactnumber`, `datecreated`, `agency`, `section`, `department`, `colleges`, `email`, `esignature`, `classyear`) VALUES
(3, 'Mark Joseph', 'S.', 'Raoet', 'Lingayen', '2020-10-17', 'Male', '16-LN-00768', '16-LN-00768', 'null.png', '', '', '', 'Section 2', 'Bachelor of Science in Information and Technology', 'Pangasinan State University', '', 'null.png', '2022'),
(5, 'Viah', 'N.', 'Caburnay', 'Bugallon', '2020-10-18', 'Female', '17-LN-00214', '17-LN-00214', 'null.png', '', '', '', 'Section 2', 'Bachelor of Science in Information and Technology', 'Pangasinan State University', '', 'null.png', '2022'),
(6, 'Vincent', 'Reyes', 'Perez', 'LINGAYEN', '1998-11-24', 'Male', 'vince', '15-LN-00522', 'null.png', '09155882430', '12/05/2020 05:33:40 ', 'Psu', 'Section 3', 'Bachelor of Science in Information and Technology', 'Pangasinan State University', '', 'null.png', '2022'),
(7, 'Jessa Mae', 'Flores', 'Delos Reyes', 'Binmaley', '1996-11-30', 'Female', 'jess', '17-LN-00122', 'null.png', '09771029025', '12/05/2020 06:36:48 ', 'Psu', 'Section 3', 'Bachelor of Science in Information and Technology', 'Pangasinan State University', 'jessamaedreyes30@gmail.com', 'null.png', '2022'),
(14, 'Lorraine', 'Maurillo', 'Ramos', 'LINGAYEN', '1998-10-23', 'Female', 'frey', '17-LN-00008', 'null.png', '09567822221', '12/24/2020 09:21:29 ', 'Psu', 'Section 3', 'Bachelor of Science in Information and Technology', 'Pangasinan State University', 'loraineramos@gmail.com', 'null.png', '2022'),
(15, 'Maurene', 'Delos Santos', 'Caldito', 'Dagupan', '2020-12-19', 'Female', '15-LN-0001', '15-LN-0001', 'null.png', '', '12/26/2020 01:25:58 ', 'Psu', 'Section 3', 'Bachelor of Science in Information and Technology', 'Pangasinan State University', '', 'null.png', '2022'),
(16, 'Rospebel', 'G.', 'Meneses', '', '0000-00-00', 'Female', '17-LN-00158', '17-LN-00158', 'null.png', '', '02/06/2021 10:28:52 ', 'Psu', 'Section 2', 'Bachelor of Science in Information and Technology', 'Pangasinan State University', '', 'null.png', '2022'),
(17, 'Vernie', '', 'Micua', '', '0000-00-00', 'Female', '17-LN-00147', '17-LN-00147', 'null.png', '', '02/06/2021 10:30:24 ', 'Psu', 'Section 2', 'Bachelor of Science in Information and Technology', 'Pangasinan State University', '', 'null.png', '2022'),
(18, 'Rassasi Lexie', 'A.', 'Oreta', '', '0000-00-00', 'Male', '17-LN-00147', '17-LN-00147', 'null.png', '', '02/06/2021 10:31:56 ', 'Psu', 'Section 2', 'Bachelor of Science in Information and Technology', 'Pangasinan State University', '', 'null.png', '2022'),
(19, 'Kimberly', 'C.', 'Bolasoc', '', '0000-00-00', 'Female', '17-LN-00030', '17-LN-00030', 'null.png', '', '02/06/2021 10:34:41 ', 'Psu', 'Section 2', 'Bachelor of Science in Information and Technology', 'Pangasinan State University', '', 'null.png', '2022'),
(20, 'Alejandro', 'T.', 'Abad Jr.', '', '0000-00-00', 'Male', '17-LN-00233', '17-LN-00233', 'null.png', '', '02/06/2021 10:36:11 ', 'Psu', 'Section 2', 'Bachelor of Science in Information and Technology', 'Pangasinan State University', '', 'null.png', '2022'),
(21, 'Jairus Ezekiel', 'A.', 'Velasquez', '', '0000-00-00', 'Male', '17-LN-00148', '17-LN-00148', 'null.png', '', '02/06/2021 10:37:44 ', 'Psu', 'Section 1', 'Bachelor of Science in Information and Technology', 'Pangasinan State University', '', 'null.png', '2022'),
(22, 'Maricar', 'D.', 'Ico', '', '0000-00-00', 'Male', '17-LN-00081', '17-LN-00081', 'null.png', '09155882430', '02/06/2021 10:40:25 ', 'Capitol', 'Section 1', 'Bachelor of Science in Information and Technology', 'Pangasinan State University', '', 'null.png', '2022'),
(23, 'Julie', 'S', 'Manuel', '', '0000-00-00', 'Female', '17-LN-00177', '17-LN-00177', 'null.png', '09771029025', '02/06/2021 10:41:15 ', 'Psu', 'Section 1', 'Bachelor of Science in Information and Technology', 'Pangasinan State University', '', 'null.png', '2022'),
(24, 'Marjorie', 'C.', 'Soriano', 'Mangaldan', '1996-10-30', 'Female', '17-LN-00029', '17-LN-0029', 'null.png', '09518765068', '02/07/2021 10:04:08 ', 'Psu', 'Section 3', 'Bachelor of Science in Information and Technology', 'Pangasinan State University', '', 'null.png', '2022'),
(25, 'Alberto', 'D.', 'Cancino Jr.', 'Binmaley', '1994-11-14', 'Male', '17-LN-00208', '17-LN-00208', 'null.png', '09369625910', '02/07/2021 10:05:57 ', 'Psu', 'Section 3', 'Bachelor of Science in Information and Technology', 'Pangasinan State University', '', 'null.png', '2022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`agencyID`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructorID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agency`
--
ALTER TABLE `agency`
  MODIFY `agencyID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `instructorID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
