-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2022 at 09:23 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `patient_reading`
--

CREATE TABLE `patient_reading` (
  `DATA_ID` int(11) NOT NULL,
  `X` int(11) NOT NULL,
  `Y` int(11) NOT NULL,
  `Z` int(11) NOT NULL,
  `AX` int(11) NOT NULL,
  `AY` int(11) NOT NULL,
  `AZ` int(11) NOT NULL,
  `Patient_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_reading`
--

INSERT INTO `patient_reading` (`DATA_ID`, `X`, `Y`, `Z`, `AX`, `AY`, `AZ`, `Patient_ID`) VALUES
(1, 2, 34, 56, 23, 12, 67, 10),
(2, 0, 11, 9, 18, 12, 103, 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `USER_TYPE` varchar(10) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `CLINIC_ADDRESS` varchar(255) DEFAULT NULL,
  `CITY` varchar(25) DEFAULT NULL,
  `PHONE_NUMBER` varchar(15) NOT NULL,
  `BIRTHDAY` date DEFAULT NULL,
  `AGE` int(11) DEFAULT NULL,
  `GENDER` varchar(10) DEFAULT NULL,
  `DOCTOR_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `USER_TYPE`, `EMAIL`, `NAME`, `PASSWORD`, `CLINIC_ADDRESS`, `CITY`, `PHONE_NUMBER`, `BIRTHDAY`, `AGE`, `GENDER`, `DOCTOR_ID`) VALUES
(1, 'DOCTOR', 'AA@gmail.com', 'aabb', '123', 'address', 'city', '010', NULL, NULL, NULL, NULL),
(2, 'DOCTOR', 'www@gmail.com', 'bbqq', '2s3', 'address', 'rrrr', '678', NULL, NULL, NULL, NULL),
(9, 'PATIENT', 'ss@gmail.com', 'ss aa', '2', NULL, NULL, '234', '2017-05-24', 4, 'male', 1),
(10, 'PATIENT', 'eee@gmail.com', 'aa eee', '567', NULL, NULL, '567', '2016-10-27', 5, 'female', 1),
(11, 'PATIENT', 'hh@gmail.com', 'hh hh', '123', NULL, NULL, '111', '2009-05-29', 12, 'male', 2),
(12, 'DOCTOR', 'meretemad444@gmail.com', 'meret  emad', 'esraa', 'fab lab ', 'mansoura', '01283257929', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient_reading`
--
ALTER TABLE `patient_reading`
  ADD PRIMARY KEY (`DATA_ID`),
  ADD KEY `PATIENT_ID` (`Patient_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`),
  ADD KEY `D_ID` (`DOCTOR_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient_reading`
--
ALTER TABLE `patient_reading`
  MODIFY `DATA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patient_reading`
--
ALTER TABLE `patient_reading`
  ADD CONSTRAINT `PATIENT_ID` FOREIGN KEY (`Patient_ID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `D_ID` FOREIGN KEY (`DOCTOR_ID`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
