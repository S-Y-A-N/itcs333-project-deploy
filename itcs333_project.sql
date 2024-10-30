-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 30, 2024 at 02:16 PM
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
-- Table structure for table `s40_rooms`
--

CREATE TABLE `s40_rooms` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(256) DEFAULT NULL,
  `type` enum('classroom','lab') NOT NULL,
  `dept` enum('is','cs','ce') NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `s40_rooms`
--

INSERT INTO `s40_rooms` (`room_id`, `room_name`, `type`, `dept`, `capacity`) VALUES
(1020, NULL, 'classroom', 'is', 40),
(1048, NULL, 'lab', 'cs', 40),
(1080, NULL, 'classroom', 'ce', 40);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(320) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`) VALUES
('100@uob.edu.bh', '$2y$10$KrYz0DBIadbKQqyfpA7tbeeTew3bbYZYQieSWYn4DcRRgOt4h4Zl6'),
('200@uob.edu.bh', '$2y$10$DSwi4LYc1iDtFBXz0ziAXuyzCP3E2M3uBmoxZfzDxsYwx7NeGXGZq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `s40_rooms`
--
ALTER TABLE `s40_rooms`
  ADD PRIMARY KEY (`room_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
