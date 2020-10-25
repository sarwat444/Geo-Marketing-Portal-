-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2018 at 08:04 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `graduation`
--

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `ID` int(11) NOT NULL,
  `Name` varchar(225) NOT NULL,
  `open` time NOT NULL,
  `close` time NOT NULL,
  `country_id` int(11) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`ID`, `Name`, `open`, `close`, `country_id`, `lat`, `lng`) VALUES
(1, 'Dr.Abdalh', '00:00:00', '00:00:00', 1, 30.12, 30.1445);

-- --------------------------------------------------------

--
-- Table structure for table `compay`
--

CREATE TABLE `compay` (
  `ID` int(11) NOT NULL,
  `Name` varchar(225) NOT NULL,
  `Email` varchar(225) NOT NULL,
  `Passoword` varchar(225) NOT NULL,
  `RegStatus` tinyint(11) NOT NULL DEFAULT '0',
  `Telphone` varchar(225) NOT NULL,
  `Image` varchar(225) NOT NULL,
  `location` varchar(225) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `compay`
--

INSERT INTO `compay` (`ID`, `Name`, `Email`, `Passoword`, `RegStatus`, `Telphone`, `Image`, `location`, `Date`) VALUES
(1, 'Egypt Pharmacy ', 'Egypt@pharmacy.com', '0482545708', 0, '0411220', '', '', '0000-00-00'),
(2, 'company1', 'm@gmail.com', '123', 0, '010207185562', '', 'sd', '0000-00-00'),
(3, 'egypt', 'egypt@gmail.com', '21766599f3e28e1397416a0e7be3e56b3eb33e7a', 0, '01020718551', '', '', '2018-02-20'),
(4, 'abdo', 'abdo@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '01020718551', '', '', '2018-02-20'),
(5, 'dssfsdfs', 'namer@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '04824570555', '', '', '2018-02-20'),
(6, 'fdfgdfgfdg', 'm@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 'dsdsdsad', '', '', '2018-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `lng` double NOT NULL,
  `lat` double NOT NULL,
  `depart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `title`, `lng`, `lat`, `depart_id`) VALUES
(1, 'Benha', 30.201, 30.15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'Qayoubia'),
(3, 'Monofya');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `ID` int(11) NOT NULL,
  `Name` varchar(225) NOT NULL,
  `country_id` int(11) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`ID`, `Name`, `country_id`, `lat`, `lng`) VALUES
(1, 'Hos.Benha Universty ', 1, 30.1002, 30.1555);

-- --------------------------------------------------------

--
-- Table structure for table `medcine`
--

CREATE TABLE `medcine` (
  `id` int(11) NOT NULL,
  `Name` varchar(225) NOT NULL,
  `start_date` date NOT NULL,
  `country_id` int(11) NOT NULL,
  `Expiry` date NOT NULL,
  `Description` text NOT NULL,
  `Price` int(11) NOT NULL,
  `Avaible_quantity` int(11) NOT NULL DEFAULT '0',
  `Solid` int(11) NOT NULL DEFAULT '0',
  `mr_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medcine`
--

INSERT INTO `medcine` (`id`, `Name`, `start_date`, `country_id`, `Expiry`, `Description`, `Price`, `Avaible_quantity`, `Solid`, `mr_id`, `company_id`) VALUES
(1, 'Congestal ', '2018-02-11', 1, '2018-02-12', 'congeastal for abdo ', 11, 200, 0, 2, 1),
(2, 'medcin1', '2018-02-07', 1, '2018-03-16', 'this is safe ', 100, 8, 0, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `medical_repersentative`
--

CREATE TABLE `medical_repersentative` (
  `Mr_ID` int(11) NOT NULL,
  `Name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `location` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `Telphone` text NOT NULL,
  `RegStatus` tinyint(4) NOT NULL DEFAULT '0',
  `Date` date NOT NULL,
  `lng` double NOT NULL,
  `lat` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medical_repersentative`
--

INSERT INTO `medical_repersentative` (`Mr_ID`, `Name`, `email`, `location`, `password`, `Telphone`, `RegStatus`, `Date`, `lng`, `lat`) VALUES
(1, 'mohamed', 'mohmaed@gmail.com', '1230', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 0, '0000-00-00', 0, 0),
(2, 'ali', 'ali@gmail.com', '212', '123', '', 0, '0000-00-00', 31.211110400000003, 30.5433883),
(3, 'abodo', 'abdo@gmail.com', '', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '01020718551', 0, '2018-02-20', 0, 0),
(4, 'mohamedsdasd', 'sad@gmail.com', '', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '04825457', 0, '2018-02-20', 0, 0),
(5, 'mohamed11', 'm@gmail.com', '', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '04825457', 0, '2018-02-20', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `ID` int(11) NOT NULL,
  `Name` varchar(225) NOT NULL,
  `country_id` int(11) NOT NULL,
  `Location` varchar(225) NOT NULL,
  `open` time NOT NULL,
  `close` time NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`ID`, `Name`, `country_id`, `Location`, `open`, `close`, `lat`, `lng`) VALUES
(1, 'Dr.Mohamed Abdel Naeem', 1, '30.2011', '04:07:11', '07:19:19', 30.111, 30.14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `cli` (`country_id`);

--
-- Indexes for table `compay`
--
ALTER TABLE `compay`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con1` (`depart_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `hos` (`country_id`);

--
-- Indexes for table `medcine`
--
ALTER TABLE `medcine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comp` (`company_id`),
  ADD KEY `med1` (`mr_id`),
  ADD KEY `MED` (`country_id`);

--
-- Indexes for table `medical_repersentative`
--
ALTER TABLE `medical_repersentative`
  ADD PRIMARY KEY (`Mr_ID`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `pha` (`country_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clinic`
--
ALTER TABLE `clinic`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `compay`
--
ALTER TABLE `compay`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `medcine`
--
ALTER TABLE `medcine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `medical_repersentative`
--
ALTER TABLE `medical_repersentative`
  MODIFY `Mr_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `clinic`
--
ALTER TABLE `clinic`
  ADD CONSTRAINT `cli` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `country`
--
ALTER TABLE `country`
  ADD CONSTRAINT `con1` FOREIGN KEY (`depart_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hospital`
--
ALTER TABLE `hospital`
  ADD CONSTRAINT `hos` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medcine`
--
ALTER TABLE `medcine`
  ADD CONSTRAINT `MED` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comp` FOREIGN KEY (`company_id`) REFERENCES `compay` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dep1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `med1` FOREIGN KEY (`mr_id`) REFERENCES `medical_repersentative` (`Mr_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD CONSTRAINT `pha` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
