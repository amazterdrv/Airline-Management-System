-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 09, 2018 at 08:00 AM
-- Server version: 5.7.20-log
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airlinedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `airfaretb`
--

DROP TABLE IF EXISTS `airfaretb`;
CREATE TABLE IF NOT EXISTS `airfaretb` (
  `Base_Fare` int(11) NOT NULL,
  `Route_Code` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `airfaretb`
--

INSERT INTO `airfaretb` (`Base_Fare`, `Route_Code`) VALUES
(5000, '001'),
(4500, '002');

-- --------------------------------------------------------

--
-- Table structure for table `employeetb`
--

DROP TABLE IF EXISTS `employeetb`;
CREATE TABLE IF NOT EXISTS `employeetb` (
  `Emp_Id` varchar(40) NOT NULL,
  `address` varchar(40) NOT NULL,
  `branch` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `designation` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `mob` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `flightinformationtb`
--

DROP TABLE IF EXISTS `flightinformationtb`;
CREATE TABLE IF NOT EXISTS `flightinformationtb` (
  `Flight_No` varchar(40) NOT NULL,
  `Capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flightinformationtb`
--

INSERT INTO `flightinformationtb` (`Flight_No`, `Capacity`) VALUES
('A305', 3),
('B406', 3);

-- --------------------------------------------------------

--
-- Table structure for table `flightscheduletb`
--

DROP TABLE IF EXISTS `flightscheduletb`;
CREATE TABLE IF NOT EXISTS `flightscheduletb` (
  `Flight_No` varchar(50) NOT NULL,
  `Route_Code` varchar(50) NOT NULL,
  `Origin` varchar(40) NOT NULL,
  `Dep_Date` date NOT NULL,
  `Dep_Time` time NOT NULL,
  `Destination` varchar(40) NOT NULL,
  `Arr_Date` date NOT NULL,
  `Arr_Time` time NOT NULL,
  PRIMARY KEY (`Flight_No`,`Route_Code`,`Origin`,`Dep_Date`,`Dep_Time`,`Destination`,`Arr_Date`,`Arr_Time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flightscheduletb`
--

INSERT INTO `flightscheduletb` (`Flight_No`, `Route_Code`, `Origin`, `Dep_Date`, `Dep_Time`, `Destination`, `Arr_Date`, `Arr_Time`) VALUES
('A305', '001', 'Delhi', '2018-04-09', '04:18:19', 'Pune', '2018-04-10', '06:00:00'),
('B406', '002', 'Delhi', '2018-04-09', '13:22:00', 'Pune', '2018-04-10', '12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `flightseatstb`
--

DROP TABLE IF EXISTS `flightseatstb`;
CREATE TABLE IF NOT EXISTS `flightseatstb` (
  `Flight_No` varchar(40) NOT NULL,
  `Seat_Code` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flightseatstb`
--

INSERT INTO `flightseatstb` (`Flight_No`, `Seat_Code`) VALUES
('A305', 'A0001'),
('A305', 'A0002'),
('A305', 'A0003');

-- --------------------------------------------------------

--
-- Table structure for table `passengertb`
--

DROP TABLE IF EXISTS `passengertb`;
CREATE TABLE IF NOT EXISTS `passengertb` (
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `contactno` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `residenceCity` varchar(50) NOT NULL,
  `IdentificationNo` int(100) NOT NULL,
  `residenceCountry` varchar(50) NOT NULL,
  PRIMARY KEY (`IdentificationNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `passengertb`
--

INSERT INTO `passengertb` (`firstname`, `lastname`, `contactno`, `email`, `password`, `address`, `residenceCity`, `IdentificationNo`, `residenceCountry`) VALUES
('Hritwick', 'Dutta', '9145265588', 'bunty@gmail.com', 'bunty123', 'Bengal east west colony', 'kolkata', 112233, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `seatinformationtb`
--

DROP TABLE IF EXISTS `seatinformationtb`;
CREATE TABLE IF NOT EXISTS `seatinformationtb` (
  `IdentificationNo` varchar(40) NOT NULL,
  `Seat_Code` varchar(40) NOT NULL,
  `Class` varchar(40) NOT NULL,
  `Availability` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seatinformationtb`
--

INSERT INTO `seatinformationtb` (`IdentificationNo`, `Seat_Code`, `Class`, `Availability`) VALUES
('112233', 'A0001', 'Economy', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
