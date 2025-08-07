-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2025 at 12:45 PM
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
-- Database: `boardfinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '2022-06-23 09:59:43');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `ProfileImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`, `ProfileImage`) VALUES
(1, 'dharshi', 'dharshidd339@gmail.com', '01cfcd4f6b8770febfb40cb906715822', '0772458465', '2001-08-16', 'abc d', 'colombo', 'Sri Lanka', '2025-06-15 10:22:34', '2025-06-17 04:18:11', 'banner-image5.jpg'),
(4, 'drc', 'drc@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '0778765432', '2001-08-16', 'abcd', 'kandy', 'Sri Lanka', '2025-06-15 10:36:26', NULL, 'home.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblboarding`
--

CREATE TABLE `tblboarding` (
  `id` int(11) NOT NULL,
  `OwnerId` int(11) NOT NULL,
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehiclesBrand` int(11) DEFAULT NULL,
  `VehiclesOverview` longtext DEFAULT NULL,
  `PricePerDay` int(11) DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `ModelYear` int(6) DEFAULT NULL,
  `SeatingCapacity` int(11) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `AirConditioner` int(11) DEFAULT NULL,
  `PowerDoorLocks` int(11) DEFAULT NULL,
  `AntiLockBrakingSystem` int(11) DEFAULT NULL,
  `BrakeAssist` int(11) DEFAULT NULL,
  `PowerSteering` int(11) DEFAULT NULL,
  `DriverAirbag` int(11) DEFAULT NULL,
  `PassengerAirbag` int(11) DEFAULT NULL,
  `PowerWindows` int(11) DEFAULT NULL,
  `CDPlayer` int(11) DEFAULT NULL,
  `CentralLocking` int(11) DEFAULT NULL,
  `CrashSensor` int(11) DEFAULT NULL,
  `LeatherSeats` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblboarding`
--

INSERT INTO `tblboarding` (`id`, `OwnerId`, `VehiclesTitle`, `VehiclesBrand`, `VehiclesOverview`, `PricePerDay`, `FuelType`, `ModelYear`, `SeatingCapacity`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, `BrakeAssist`, `PowerSteering`, `DriverAirbag`, `PassengerAirbag`, `PowerWindows`, `CDPlayer`, `CentralLocking`, `CrashSensor`, `LeatherSeats`, `RegDate`, `UpdationDate`) VALUES
(9, 0, 'SAFEST PLACE EVER', 8, 'No.16 , Peradeniya Road ,Kandy', 250, 'Kandy', 2022, 5, 'IMG-20250530-WA0040.jpg', 'IMG-20250530-WA0040.jpg', 'IMG-20250530-WA0044.jpg', 'WhatsApp Image 2025-05-30 at 15.03.06_a4cfbca0.jpg', 'IMG-20250530-WA0049.jpg', 1, 1, 1, 1, 1, 1, 1, NULL, NULL, 1, 1, 1, '2025-05-31 06:07:56', '2025-06-03 05:33:30'),
(10, 0, 'SAFER', 9, '16', 250, 'Colombo', 2020, 5, 'IMG-20250530-WA0011.jpg', 'IMG-20250530-WA0044.jpg', 'IMG-20250530-WA0046.jpg', 'IMG-20250530-WA0049.jpg', 'WhatsApp Image 2025-05-30 at 15.03.06_a4cfbca0.jpg', 1, 1, 1, 1, 1, 1, 1, NULL, 1, NULL, 1, 1, '2025-05-31 06:54:26', '2025-06-03 06:10:53'),
(11, 0, 'Thayillam', 10, '16', 250, 'Jaffna', 2020, 5, 'WhatsApp Image 2025-05-30 at 14.59.17_763829a0.jpg', 'WhatsApp Image 2025-05-30 at 14.59.18_2ffd8fd2.jpg', 'IMG-20250530-WA0049.jpg', 'WhatsApp Image 2025-05-30 at 15.03.06_a4cfbca0.jpg', 'IMG-20250530-WA0049.jpg', 1, 1, 1, 1, 1, 1, 1, NULL, 1, NULL, 1, 1, '2025-05-31 06:59:16', '2025-06-03 06:11:33'),
(12, 0, 'Stay SAFE', 8, '`1234567890', 250, 'Kandy', 2020, 5, 'WhatsApp Image 2025-05-30 at 14.59.18_2ffd8fd2.jpg', 'IMG-20250530-WA0040.jpg', 'IMG-20250530-WA0011.jpg', 'WhatsApp Image 2025-05-30 at 15.03.06_a4cfbca0.jpg', 'IMG-20250530-WA0035.jpg', 1, 1, 1, 1, NULL, 1, NULL, NULL, NULL, 1, 1, NULL, '2025-06-01 20:17:18', NULL),
(14, 0, 'Samarasinghe home', 8, 'sderftg', 250, 'Kandy', 2020, 12, 'IMG-20250530-WA0047.jpg', 'IMG-20250530-WA0040.jpg', 'IMG-20250530-WA0040.jpg', 'IMG-20250530-WA0034.jpg', 'IMG-20250530-WA0036.jpg', NULL, 1, NULL, NULL, NULL, 1, 1, NULL, NULL, 1, NULL, NULL, '2025-06-02 19:53:23', '2025-06-03 05:10:32'),
(15, 0, 'Stay ', 8, 'asdf', 250, 'Kandy', 2022, 4, 'IMG-20250530-WA0009.jpg', 'IMG-20250530-WA0009.jpg', 'IMG-20250530-WA0009.jpg', 'IMG-20250530-WA0009.jpg', 'IMG-20250530-WA0009.jpg', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, '2025-06-02 21:30:29', NULL),
(16, 0, 'Dharshi\'s boarding', 9, '100/2,Moratuva,Colombo', 100, 'Colombo', 2022, 2, 'WhatsApp Image 2025-05-30 at 14.59.17_763829a0.jpg', 'IMG-20250530-WA0040.jpg', 'WhatsApp Image 2025-05-30 at 14.59.17_763829a0.jpg', 'IMG-20250530-WA0044.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, 1, '2025-06-03 05:31:19', NULL),
(17, 1, 'new owner', 8, 'No. 16 Kandy', 250, 'Kandy', 2022, 4, 'WhatsApp Image 2025-05-30 at 14.59.18_15cf7960.jpg', 'IMG-20250530-WA0036.jpg', 'IMG-20250530-WA0040.jpg', 'IMG-20250530-WA0036.jpg', 'IMG-20250530-WA0011.jpg', 1, 1, NULL, NULL, 1, 1, NULL, NULL, 1, NULL, NULL, NULL, '2025-06-17 04:41:10', '2025-06-17 06:19:11'),
(18, 1, 'drc', 9, 'No. 16 Colombo ', 250, 'Colombo', 2022, 4, 'WhatsApp Image 2025-05-30 at 15.02.33_dcc551d1.jpg', 'IMG-20250530-WA0009.jpg', 'IMG-20250530-WA0036.jpg', 'WhatsApp Image 2025-05-30 at 15.02.33_91088fd9.jpg', 'IMG-20250530-WA0011.jpg', 1, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, 1, NULL, NULL, '2025-06-17 06:37:14', '2025-06-17 06:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `id` int(11) NOT NULL,
  `BookingNumber` bigint(12) DEFAULT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `BoardingId` varchar(255) DEFAULT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`id`, `BookingNumber`, `userEmail`, `BoardingId`, `FromDate`, `ToDate`, `message`, `Status`, `PostingDate`, `LastUpdationDate`) VALUES
(1, NULL, 'test@gmail.com', '1', '2020-07-07', '2020-07-09', 'What  is the cost?', 1, '2020-07-07 14:03:09', '2025-06-02 20:38:44'),
(2, NULL, 'test@gmail.com', '4', '2020-07-19', '2020-07-24', 'nice one', 1, '2020-07-09 17:49:21', '2025-06-02 20:38:49'),
(3, NULL, 's@gmail.com', '9', '2025-05-05', '2025-05-31', 'gh', 1, '2025-05-31 10:42:29', '2025-06-02 20:38:59'),
(4, NULL, 'q@gmail.com', '10', '2025-06-02', '2025-07-01', 'bv', 2, '2025-06-01 17:31:28', '2025-06-02 20:38:55'),
(5, NULL, 'q@gmail.com', '9', '2025-06-03', '2025-06-03', 'cvb', 2, '2025-06-01 17:40:01', '2025-06-02 08:51:51'),
(6, NULL, 'q@gmail.com', '11', '2025-07-10', '2025-07-10', '1234', 1, '2025-06-01 18:31:37', '2025-06-02 08:52:09'),
(7, NULL, 'm.krishnanath0716@gmail.com', '9', '2025-06-05', '2025-06-25', 'qw', 1, '2025-06-02 08:51:19', '2025-06-02 08:52:32'),
(8, NULL, 'qw@gmail.com', '11', '2025-06-25', '2025-06-26', 'b', 1, '2025-06-02 19:40:35', '2025-06-02 20:28:08'),
(9, NULL, 'qw@gmail.com', '14', '2025-06-04', '2025-06-05', '56', 1, '2025-06-02 20:09:24', '2025-06-02 20:49:07'),
(10, NULL, 'qw@gmail.com', '15', '2025-06-05', '2025-07-04', 'asdfgh', 2, '2025-06-02 21:31:08', '2025-06-03 00:57:19'),
(11, NULL, 'qw@gmail.com', '10', '2025-07-09', '2025-07-18', 'cvcb', 2, '2025-06-03 00:17:17', '2025-06-03 05:11:18'),
(12, NULL, 'qw@gmail.com', '14', '2025-06-07', '2025-06-28', 'fre', 1, '2025-06-03 04:12:50', '2025-06-03 05:11:35'),
(13, NULL, 'drc@gmail.com', '13', '2025-06-11', '2025-07-23', 'rent', 0, '2025-06-03 04:59:06', NULL),
(14, NULL, 'drc@gmail.com', '12', '2026-01-03', '2028-10-30', 'ww', 0, '2025-06-03 05:01:59', NULL),
(15, NULL, 'd@gmail.com', '16', '2025-07-01', '2028-02-29', 'i want single room.', 0, '2025-06-03 06:38:24', NULL),
(16, NULL, 'kjn@gmail.com', '9', '2025-09-07', '2026-02-18', 'rent', 0, '2025-06-08 02:57:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusinfo`
--

CREATE TABLE `tblcontactusinfo` (
  `id` int(11) NOT NULL,
  `Address` tinytext DEFAULT NULL,
  `EmailId` varchar(255) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcontactusinfo`
--

INSERT INTO `tblcontactusinfo` (`id`, `Address`, `EmailId`, `ContactNo`) VALUES
(1, 'No.16 ,Keppetipola Rd, Kandy', 'dharshidd339@gmail.com', '0741133421');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusquery`
--

CREATE TABLE `tblcontactusquery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcontactusquery`
--

INSERT INTO `tblcontactusquery` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(2, 'qw', 'q@gmail.com', '0741133421', 'welcome', '2025-06-01 18:30:01', 1),
(3, 'new', 'ab@gmail.com', '0772458465', 'hiiiiiiiiiiiiiiiiiiiiiiii', '2025-06-02 21:52:24', 1),
(4, 'drc', 'dharshidd339@gmail.com', '0772458465', 'i have issue', '2025-06-03 05:18:17', 1),
(5, 'dharshi', 'dd@gmail.com', '0778765432', 'i have a doubt.', '2025-06-03 06:32:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL,
  `Address` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `type`, `detail`, `Address`) VALUES
(1, 'Terms and Conditions', 'terms', ' Terms & Conditions\n\n#Must be 18+ to use the platform.\n\n#Use real info when registering.\n\n#Owners must list accurate details.\n\n#Payment and cancellation are handled by owners.\n\n#No abuse or fraud allowed.\n\n#We may update terms anytime.\n\n', NULL),
(2, 'Privacy Policy', 'privacy', 'Privacy Policy \n\n#We collect basic info (name, contact, ID, etc.).\n\n#for bookings, communication, and safety.\n\n#We don’t sell data.\n\n#Only shared when needed (e.g., booking, legal reasons).\n\n#Your data is secure with us.\n\n#You can request data removal anytime.', NULL),
(3, 'About Us ', 'aboutus', 'Welcome to Board Finder\nWe help students and workers find safe, comfortable, and affordable boardings near universities or workplaces. Trusted by many, our verified listings and easy process make your stay simple and stress-free!\n\n', NULL),
(11, 'FAQs', 'faqs', 'How to book?\nBrowse listings, choose one, and follow the booking steps. Some may need direct contact.\n\n1-Documents needed?\n  Valid ID (e.g., Student ID or NIC) and sometimes a deposit.\n\n2-Can I cancel?\n  Depends on owner’s policy. Check terms before booking.\n\n3-How to pay?\n  Via cash, bank transfer, or online (as per owner).\n\n4-utilities included?\n  Sometimes. Confirm with the owner.\n\n5-Problem with a boarding?\n  Contact the owner or our support.\n\n6-Is it safe?\n  Yes. We verify listings, but always check in person.\n\n7-Can I extend stay?\n  Yes, if the owner agrees.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblreview`
--

CREATE TABLE `tblreview` (
  `id` int(11) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `Testimonial` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblreview`
--

INSERT INTO `tblreview` (`id`, `UserEmail`, `Testimonial`, `PostingDate`, `status`) VALUES
(2, 'qw@gmail.com', 'I am satisfied with their service great job', '2025-06-02 20:50:41', 1),
(3, 'qw@gmail.com', 'qwer', '2025-06-03 04:32:42', 1),
(4, 'drc@gmail.com', 'good system', '2025-06-03 04:54:17', 1),
(5, 'drc@gmail.com', 'good', '2025-06-03 04:54:55', NULL),
(6, 'drc@gmail.com', 'drc', '2025-06-03 04:57:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscribers`
--

CREATE TABLE `tblsubscribers` (
  `id` int(11) NOT NULL,
  `SubscriberEmail` varchar(120) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblsubscribers`
--

INSERT INTO `tblsubscribers` (`id`, `SubscriberEmail`, `PostingDate`) VALUES
(4, 'harish@gmail.com', '2020-07-07 09:26:21'),
(5, 'kunal@gmail.com', '2020-07-07 09:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbluni`
--

CREATE TABLE `tbluni` (
  `id` int(11) NOT NULL,
  `UniversityName` varchar(255) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbluni`
--

INSERT INTO `tbluni` (`id`, `UniversityName`, `CreationDate`, `UpdationDate`) VALUES
(8, 'Peradeniya', '2025-05-31 06:00:40', NULL),
(9, 'Moratuwa', '2025-05-31 06:00:44', NULL),
(10, 'Jaffna', '2025-05-31 06:00:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `ProfileImage` varchar(255) DEFAULT NULL,
  `role` enum('admin','owner','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`, `ProfileImage`, `role`) VALUES
(2, 'dharshi', 's@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1234567890', '', '', '', '', '2025-05-31 10:41:20', '2025-06-12 02:22:13', 'banner-image.jpg', 'user'),
(3, 'dharshi', 'ss@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0775910523', NULL, NULL, NULL, NULL, '2025-05-31 17:41:14', NULL, NULL, 'user'),
(4, 'qw', 'q@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '0775910523', NULL, NULL, NULL, NULL, '2025-06-01 17:30:52', NULL, NULL, 'user'),
(5, 'qw', 'm.krishnanath0716@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1234567890', NULL, NULL, NULL, NULL, '2025-06-02 08:50:15', NULL, NULL, 'user'),
(6, 'new', 'qw@gmail.com', 'b59c67bf196a4758191e42f76670ceba', '1234567890', NULL, NULL, NULL, NULL, '2025-06-02 19:39:57', '2025-06-03 05:20:53', NULL, 'user'),
(7, 'drc', 'drc@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '0775910523', NULL, NULL, NULL, NULL, '2025-06-03 04:52:30', NULL, NULL, 'user'),
(8, 'Nafla', 'naf@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0771234567', NULL, NULL, NULL, NULL, '2025-06-03 05:35:26', NULL, NULL, 'user'),
(9, 'Kavin', 'kav@gmail.com', 'ed2b1f468c5f915f3f1cf75d7068baae', '0771122334', NULL, NULL, NULL, NULL, '2025-06-03 05:36:25', NULL, NULL, 'user'),
(10, 'dharshika', 'd@gmail.com', '202cb962ac59075b964b07152d234b70', '0771234567', NULL, NULL, NULL, NULL, '2025-06-03 06:34:14', NULL, NULL, 'user'),
(11, 'kjn', 'kjn@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1234567890', '16/08/2001', 'abc d', 'colombo', 'Sri Lanka', '2025-06-08 02:56:02', '2025-06-08 03:08:00', NULL, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `EmailId_2` (`EmailId`),
  ADD KEY `EmailId` (`EmailId`);

--
-- Indexes for table `tblboarding`
--
ALTER TABLE `tblboarding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblreview`
--
ALTER TABLE `tblreview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluni`
--
ALTER TABLE `tbluni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblboarding`
--
ALTER TABLE `tblboarding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblreview`
--
ALTER TABLE `tblreview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbluni`
--
ALTER TABLE `tbluni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
