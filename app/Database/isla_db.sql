-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 22, 2019 at 06:07 PM
-- Server version: 5.6.43-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isla_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Company`
--

CREATE TABLE `Company` (
  `Id` varchar(255) NOT NULL,
  `CompanyName` varchar(255) NOT NULL,
  `CompanyAddress` varchar(1000) NOT NULL,
  `CompanyPhone` varchar(255) NOT NULL,
  `CompanyLogo` mediumtext NOT NULL,
  `DateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CompanyIndex` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Company`
--

INSERT INTO `Company` (`Id`, `CompanyName`, `CompanyAddress`, `CompanyPhone`, `CompanyLogo`, `DateCreated`, `CompanyIndex`) VALUES
('9a20ba82-fd0a-4b62-885f-c21d5ab52078', 'Company', 'Company Address, City, State Zip', '(999) 999-9999', '', '2019-5-22 11:26:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Roles`
--

CREATE TABLE `Roles` (
  `Id` varchar(255) NOT NULL,
  `RoleName` varchar(255) NOT NULL,
  `RoleDescription` mediumtext NOT NULL,
  `DateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateModified` datetime DEFAULT NULL,
  `RoleSettings` mediumtext,
  `RoleIndex` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Roles`
--

INSERT INTO `Roles` (`Id`, `RoleName`, `RoleDescription`, `DateCreated`, `DateModified`, `RoleSettings`, `RoleIndex`) VALUES
('a3eda8f2-ebd2-4cf9-b669-ea43a01e144e', 'Administrator', 'Administrator', '2019-05-22 10:05:41', NULL, '[]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `Id` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `DateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `RoleId` varchar(255) NOT NULL,
  `UserIndex` int(11) NOT NULL,
  `IsDeleted` datetime DEFAULT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`Id`, `FirstName`, `LastName`, `Email`, `Password`, `DateCreated`, `RoleId`,  `UserIndex`, `IsDeleted`, `Status`) VALUES
('f00e402d-a4bc-44aa-b8df-06987edc52ec', 'Travis', 'Pronschinske', 'tpronschinske@gmail.com', '$2y$10$51cCs5HNqUzbLzzsOh.Kd.br.IxuT96ISH/vwv7Q4zdBb1uBNYfAO', '2018-10-15 10:13:20', '9C7EBFC9-6117-3313-D4ED-2B46FE70EA17', 6, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Company`
--
ALTER TABLE `Company`
  ADD PRIMARY KEY (`CompanyIndex`),
  ADD UNIQUE KEY `Id` (`Id`);

--
-- Indexes for table `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`RoleIndex`),
  ADD UNIQUE KEY `Id` (`Id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`UserIndex`),
  ADD UNIQUE KEY `Id` (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Company`
--
ALTER TABLE `Company`
  MODIFY `CompanyIndex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `Roles`
--
ALTER TABLE `Roles`
  MODIFY `RoleIndex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `UserIndex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
