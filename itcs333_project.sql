-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2024 at 01:09 PM
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
-- Database: `itcs333_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `email` varchar(320) NOT NULL,
  `room_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(256) DEFAULT NULL,
  `type` enum('classroom','lab') NOT NULL,
  `equip` set('Whiteboard','Smart Board','Projector','DC Power Supply','Digital Multimeter','Function Generator','Electronics Components','Server') NOT NULL,
  `dept` enum('is','cs','ce') NOT NULL,
  `capacity` int(11) NOT NULL,
  `usage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_name`, `type`, `equip`, `dept`, `capacity`, `usage`) VALUES
(22, '', 'lab', 'Whiteboard,Smart Board,Projector', 'is', 20, 0),
(23, '', 'lab', 'Whiteboard,Smart Board,Projector', 'is', 20, 0),
(32, '', 'classroom', 'Whiteboard,Smart Board,Projector', 'is', 40, 0),
(49, NULL, 'classroom', 'Whiteboard,Smart Board,Projector', 'cs', 40, 0),
(51, NULL, 'lab', 'Whiteboard,Smart Board,Projector', 'cs', 20, 0),
(56, NULL, 'classroom', 'Whiteboard,Smart Board,Projector', 'cs', 40, 0),
(57, NULL, 'classroom', 'Whiteboard,Smart Board,Projector', 'cs', 40, 0),
(58, NULL, 'classroom', 'Whiteboard,Smart Board,Projector', 'cs', 40, 0),
(60, NULL, 'classroom', 'Whiteboard,Smart Board,Projector', 'cs', 40, 0),
(77, NULL, 'classroom', 'Whiteboard,Smart Board,Projector', 'ce', 40, 0),
(79, NULL, 'lab', 'Whiteboard,Smart Board,Projector', 'ce', 40, 0),
(86, NULL, 'classroom', 'Whiteboard,Smart Board,Projector', 'ce', 40, 0),
(88, NULL, 'classroom', 'Whiteboard,Smart Board,Projector', 'ce', 40, 0),
(1002, 'The Open Area Labs', 'lab', 'Whiteboard,Smart Board,Projector', 'is', 100, 0),
(1008, '', 'lab', 'Whiteboard,Smart Board,Projector', 'is', 20, 0),
(1009, '', 'lab', 'Whiteboard,Smart Board,Projector', 'is', 20, 0),
(1010, '', 'lab', 'Whiteboard,Smart Board,Projector', 'is', 20, 0),
(1012, '', 'lab', 'Whiteboard,Smart Board,Projector', 'is', 20, 0),
(1014, '', 'lab', 'Whiteboard,Smart Board,Projector', 'is', 20, 0),
(1043, NULL, 'lab', 'Whiteboard,Smart Board,Projector', 'cs', 20, 0),
(1045, NULL, 'lab', 'Whiteboard,Smart Board,Projector', 'cs', 20, 0),
(1047, NULL, 'classroom', 'Whiteboard,Smart Board,Projector', 'cs', 40, 0),
(1048, NULL, 'classroom', 'Whiteboard,Smart Board,Projector', 'cs', 40, 0),
(1050, NULL, 'lab', 'Whiteboard,Smart Board,Projector', 'cs', 20, 0),
(1052, NULL, 'lab', 'Whiteboard,Smart Board,Projector', 'cs', 20, 0),
(1081, 'Advanced Digital Lab', 'lab', 'Whiteboard,Smart Board,Projector,Electronics Components', 'ce', 20, 0),
(1083, 'Digital Lab', 'lab', 'Whiteboard,Smart Board,Projector,Electronics Components', 'ce', 20, 0),
(1085, NULL, 'classroom', 'Whiteboard,Smart Board,Projector', 'ce', 40, 0),
(1086, NULL, 'classroom', 'Whiteboard,Smart Board,Projector', 'ce', 40, 0),
(1087, 'Microprocessor Lab', 'lab', 'Whiteboard,Smart Board,Projector,Electronics Components', 'ce', 20, 0),
(1089, 'Computer Electronic Lab', 'lab', 'Whiteboard,Smart Board,Projector,DC Power Supply,Digital Multimeter,Function Generator,Electronics Components', 'ce', 20, 0),
(2005, '', 'classroom', 'Whiteboard,Smart Board,Projector', 'is', 40, 0),
(2007, '', 'classroom', 'Whiteboard,Smart Board,Projector', 'is', 40, 0),
(2008, '', 'classroom', 'Whiteboard,Smart Board,Projector', 'is', 40, 0),
(2010, '', 'classroom', 'Whiteboard,Smart Board,Projector', 'is', 40, 0),
(2011, '', 'classroom', 'Whiteboard,Smart Board,Projector', 'is', 40, 0),
(2012, '', 'classroom', 'Whiteboard,Smart Board,Projector', 'is', 40, 0),
(2013, '', 'classroom', 'Whiteboard,Smart Board,Projector', 'is', 40, 0),
(2015, '', 'classroom', 'Whiteboard,Smart Board,Projector', 'is', 40, 0),
(2043, NULL, 'lab', 'Whiteboard,Smart Board,Projector', 'cs', 20, 0),
(2045, NULL, 'lab', 'Whiteboard,Smart Board,Projector', 'cs', 20, 0),
(2046, NULL, 'classroom', 'Whiteboard,Smart Board,Projector', 'cs', 40, 0),
(2048, NULL, 'classroom', 'Whiteboard,Smart Board,Projector', 'cs', 40, 0),
(2049, NULL, 'classroom', 'Whiteboard,Smart Board,Projector', 'cs', 40, 0),
(2050, NULL, 'classroom', 'Whiteboard,Smart Board,Projector', 'cs', 40, 0),
(2051, 'The Benefit Advanced Artificial Intelligence & Computing Lab', 'lab', 'Whiteboard,Smart Board,Projector,Server', 'cs', 20, 0),
(2053, NULL, 'lab', 'Whiteboard,Smart Board,Projector', 'cs', 20, 0),
(2081, 'Network Lab', 'classroom', 'Whiteboard,Smart Board,Projector,Server', 'ce', 20, 0),
(2083, 'PC Instructional Lab', 'classroom', 'Whiteboard,Smart Board,Projector,Server', 'ce', 20, 0),
(2084, NULL, 'classroom', 'Whiteboard,Smart Board,Projector', 'ce', 40, 0),
(2086, NULL, 'classroom', 'Whiteboard,Smart Board,Projector', 'ce', 40, 0),
(2087, NULL, 'classroom', 'Whiteboard,Smart Board,Projector', 'ce', 40, 0),
(2088, NULL, 'classroom', 'Whiteboard,Smart Board,Projector', 'ce', 40, 0),
(2089, 'Internet of Things Lab', 'classroom', 'Whiteboard,Smart Board,Projector,Server', 'ce', 20, 0),
(2091, 'Huawei ICT Academy', 'classroom', 'Whiteboard,Smart Board,Projector,Server', 'ce', 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(320) NOT NULL,
  `password` varchar(256) NOT NULL,
  `username` varchar(100) NOT NULL,
  `profile_picture` varchar(256) NOT NULL DEFAULT 'default-pfp.png',
  `admin` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `username`, `profile_picture`, `admin`) VALUES
('100@uob.edu.bh', '$2y$10$KrYz0DBIadbKQqyfpA7tbeeTew3bbYZYQieSWYn4DcRRgOt4h4Zl6', '100@uob.edu.bh', 'default-pfp.png', b'0'),
('200@uob.edu.bh', '$2y$10$DSwi4LYc1iDtFBXz0ziAXuyzCP3E2M3uBmoxZfzDxsYwx7NeGXGZq', '200@uob.edu.bh', 'default-pfp.png', b'1'),
('300@uob.edu.bh', '$2y$10$Dn4I.YSZJAZye0dfvpVg7.pI.FcuTrIPPQh/021okesLwYnDuAvTu', '300', '300_', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
