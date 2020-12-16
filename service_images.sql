-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2020 at 07:49 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `service_images`
--

CREATE TABLE `service_images` (
  `path` text NOT NULL,
  `fk_sd_id` varchar(14) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_images`
--

INSERT INTO `service_images` (`path`, `fk_sd_id`, `type`) VALUES
('upload/1603397131messageImage_1602880736761.jpg', '0', 0),
('upload/1603397131screencapture-localhost-matchminton-index-html-2020-10-19-22_49_49.png', '0', 0),
('upload/1603397277messageImage_1602880736761.jpg', '0', 0),
('upload/1603397277screencapture-localhost-matchminton-index-html-2020-10-19-22_49_49.png', '0', 0),
('upload/160814083491c810087614f8a5d547b001519165c1.jpg', 'FS201217000059', 1),
('upload/16081412548.png', 'FS201217000062', 1),
('upload/16081412543.png', 'FS201217000062', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `service_images`
--
ALTER TABLE `service_images`
  ADD KEY `fk_sd_id` (`fk_sd_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
