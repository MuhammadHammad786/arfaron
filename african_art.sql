-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2021 at 04:27 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `african_art`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(50) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_pass`) VALUES
(1, 'admin@gmail.com', '$2y$10$vN5Tzrh2VLAZj5beOkKaW.MNs1UPgXjTkzEVRya3Sh01NDn4.6DKm');

-- --------------------------------------------------------

--
-- Table structure for table `arts`
--

CREATE TABLE `arts` (
  `art_id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(50) NOT NULL,
  `category` varchar(255) NOT NULL,
  `tribe` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `approx_age` int(50) NOT NULL,
  `country` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date` varchar(255) NOT NULL,
  `mer_id` int(50) NOT NULL,
  `mer_name` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `art_status` varchar(50) NOT NULL,
  `pay_plan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arts`
--

INSERT INTO `arts` (`art_id`, `name`, `price`, `category`, `tribe`, `material`, `size`, `approx_age`, `country`, `image1`, `image2`, `image3`, `description`, `date`, `mer_id`, `mer_name`, `phone`, `email`, `art_status`, `pay_plan`) VALUES
(2, 'brief_form', 90, 'textiles', 'Mende', 'Stone', '', 90, 'Chad', '2d103025b421fef2f668e810aa051453.gif', '228552bb6bdd183da62941c007097034.gif', 'Bill.jpg', 'testing', '09-24-21', 4, 'admin', '', '', '2', '0'),
(4, 'brief_form', 90, 'textiles', 'Mende', 'Stone', '', 90, 'Chad', '2d103025b421fef2f668e810aa051453.gif', '228552bb6bdd183da62941c007097034.gif', 'Bill.jpg', 'testing', '09-24-21', 4, 'admin', '', '', '2', '0'),
(5, 'Palmwine Cup ', 150, 'sculpture', 'Mende', 'metal', '', 100, 'Ethiopia', 'art1.jpg', 'art2.jpg', 'art3.jpg', 'testing...........', '09-24-21', 4, 'admin', '', '', '2', '0'),
(6, 'Alois Kronschlaeger', 1500, 'sculpture', 'Senufo', 'Fabric', '12 / 14 / 15', 50, 'Angola', 'sc1.png', 'sc2.jpg', 'sc3.jpg', 'Alois Kronschlaeger (Austrian-American, b. 1966).\r\n\r\nThis piece is final sale and not eligible for return.\r\n\r\n\r\n\r\nThis work exists at the intersection of architecture, drawing, craft and sculpture. Its overtly formalist, using light and color to emphasize the volume and materiality, and shadow to extend the image beyond its frame.', '09-24-21', 4, 'admin', '', '', '2', '0'),
(34, 'testing', 90, 'pottery', 'Tellem', 'metal', '12 / 14 / 15', 67, 'Congo, Democratic Republic of the Congo', 'sc1.png', 'sc2.jpg', 'sc3.jpg', 'testing', '11-03-21', 4, 'admin', '3152655063', 'muhammadhammad842988@gmail.com', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(50) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(3, 'sculpture'),
(4, 'pottery'),
(5, 'textiles'),
(6, 'masks'),
(7, 'jewelry');

-- --------------------------------------------------------

--
-- Table structure for table `merchants`
--

CREATE TABLE `merchants` (
  `mer_id` int(50) NOT NULL,
  `mer_name` varchar(255) NOT NULL,
  `mer_email` varchar(255) NOT NULL,
  `mer_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merchants`
--

INSERT INTO `merchants` (`mer_id`, `mer_name`, `mer_email`, `mer_pass`) VALUES
(4, 'admin', 'admin@gmail.com', '$2y$10$/Gha4w/wPJ3GF7sEaMyqw.TWt2RWpDJ0OAmcaJrigJJkKeorYiPNS');

-- --------------------------------------------------------

--
-- Table structure for table `tribe`
--

CREATE TABLE `tribe` (
  `tribe_id` int(50) NOT NULL,
  `tribe_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tribe`
--

INSERT INTO `tribe` (`tribe_id`, `tribe_name`) VALUES
(5, 'Tellem'),
(6, 'Senufo'),
(7, 'Mende');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(50) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`) VALUES
(11, 'admin', 'admin@gmail.com', '$2y$10$tRz25FZcoqe1NAmOFG2giOyXoURePVvEOORfO/p24a1xFnyPhojxC'),
(12, 'Alois Kronschlaeger', 'abdul_mufeez@outlook.com', '$2y$10$EMGaaoFXto3b0/OjSALTCeAWIdPFI4pMRgIw8HUcCxzUfhk2ixjgi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `arts`
--
ALTER TABLE `arts`
  ADD PRIMARY KEY (`art_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `merchants`
--
ALTER TABLE `merchants`
  ADD PRIMARY KEY (`mer_id`);

--
-- Indexes for table `tribe`
--
ALTER TABLE `tribe`
  ADD PRIMARY KEY (`tribe_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `arts`
--
ALTER TABLE `arts`
  MODIFY `art_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `merchants`
--
ALTER TABLE `merchants`
  MODIFY `mer_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tribe`
--
ALTER TABLE `tribe`
  MODIFY `tribe_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
