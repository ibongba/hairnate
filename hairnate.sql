-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 09, 2020 at 11:33 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hairnate`
--

-- --------------------------------------------------------

--
-- Table structure for table `barber`
--

CREATE TABLE `barber` (
  `id_barber` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `id_partner` int(11) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `image` text NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hairstyle`
--

CREATE TABLE `hairstyle` (
  `id_hairstyle` int(15) NOT NULL,
  `id_partner` int(15) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `image` text,
  `type` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hairstyle`
--

INSERT INTO `hairstyle` (`id_hairstyle`, `id_partner`, `name`, `description`, `price`, `image`, `type`) VALUES
(1, 0, 'ทรงผมรองทรงสูง', 'ทรงผมพื้นฐานสำหรับคุณ', 300, 'upload/1598974155รองทรงสูง.png', 1),
(2, 0, 'ทรงผมรองทรงกลาง', 'ทรงผมพื้นฐานสำหรับคุณ', 350, 'upload/1598974130รองทรงกลาง.png', 1),
(3, 0, 'ทรงผมรองทรงต่ำ', 'ทรงผมพื้นฐานสำหรับคุณ', 250, 'upload/1598974185รองทรงต่ำ.png', 1),
(4, 0, 'ทรงผมปัดข้าง', 'ทรงผมพื้นฐานสำหรับคุณ', 350, 'upload/1598974223ปาดข้าง.png', 1),
(5, 0, 'ทรงผมสกีนเฮด', 'ทรงผมพื้นฐานสำหรับคุณ', 400, 'upload/1598974360สกีนเฮด.png', 1),
(6, 0, 'undercut', 'ทรงผมพื้นฐานสำหรับคุณ', 450, 'upload/1598974383undercut.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `id` int(15) NOT NULL,
  `biz_name` text NOT NULL,
  `biz_email` text NOT NULL,
  `location` text NOT NULL,
  `biz_type` tinyint(1) NOT NULL,
  `fk_user_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id_promotion` int(15) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `promotion_price` double NOT NULL,
  `fk_hairstyle_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `service_detail`
--

CREATE TABLE `service_detail` (
  `service_date` date NOT NULL,
  `service_time` text NOT NULL,
  `service_location` text NOT NULL,
  `service_phone` varchar(10) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `price` int(11) DEFAULT NULL,
  `id_barber` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_hairstyle` int(11) NOT NULL,
  `id_service_detail` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `username` text NOT NULL,
  `surname` text,
  `password` text NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barber`
--
ALTER TABLE `barber`
  ADD PRIMARY KEY (`id_barber`);

--
-- Indexes for table `hairstyle`
--
ALTER TABLE `hairstyle`
  ADD PRIMARY KEY (`id_hairstyle`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id_promotion`);

--
-- Indexes for table `service_detail`
--
ALTER TABLE `service_detail`
  ADD PRIMARY KEY (`id_service_detail`),
  ADD KEY `id_hairstyle` (`id_hairstyle`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_barber` (`id_barber`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barber`
--
ALTER TABLE `barber`
  MODIFY `id_barber` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hairstyle`
--
ALTER TABLE `hairstyle`
  MODIFY `id_hairstyle` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id_promotion` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_detail`
--
ALTER TABLE `service_detail`
  MODIFY `id_service_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `partner`
--
ALTER TABLE `partner`
  ADD CONSTRAINT `fk_a_ID` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
