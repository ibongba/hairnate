-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2020 at 03:01 PM
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
-- Table structure for table `service_detail`
--

CREATE TABLE `service_detail` (
  `service_date` date NOT NULL,
  `service_time` text NOT NULL,
  `service_location` text NOT NULL,
  `service_phone` varchar(10) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `price` int(11) DEFAULT NULL,
  `id_barber` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_hairstyle` int(11) NOT NULL,
  `id_service_detail` varchar(14) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_detail`
--

INSERT INTO `service_detail` (`service_date`, `service_time`, `service_location`, `service_phone`, `status`, `price`, `id_barber`, `id_users`, `id_hairstyle`, `id_service_detail`, `email`) VALUES
('2020-11-18', '13.00', '121/121 151 undefined egeg fewfwe fefe 1515', '1234', 2, 0, 0, 4, 0, '', 't@mail.com'),
('2020-10-29', '13.00', '      ', '', 1, NULL, 1, 1, 14, 'DN201023000013', ''),
('1970-01-01', '14.00', '      ', '', 1, NULL, 0, 4, 0, 'DN201024000013', ''),
('1970-01-01', '14.00', '121/121 151 undefined egeg fewfwe fefe 1515', '1234', 2, NULL, 0, 4, 0, 'DN20119000013', 't@mail.com'),
('2020-10-29', '10.00', '      ', '', 1, NULL, 1, 1, 14, 'FS201023000001', ''),
('2020-10-28', '09.00', '      ', '', 2, NULL, 1, 1, 14, 'FS201023000002', ''),
('2020-10-28', '10.00', '      ', '', 1, NULL, 1, 1, 14, 'FS201023000003', ''),
('2020-10-24', '13.00', '      ', '', 1, NULL, 1, 1, 14, 'FS201023000004', ''),
('2020-10-24', '14.00', '      ', '', 1, NULL, 1, 1, 14, 'FS201023000005', ''),
('2020-10-24', '15.00', '      ', '', 1, NULL, 1, 1, 14, 'FS201023000006', ''),
('2020-10-24', '13.00', '      ', '', 1, NULL, 1, 1, 14, 'FS201023000007', ''),
('2020-10-27', '14.00', '      ', '', 1, NULL, 1, 1, 14, 'FS201023000008', ''),
('2020-10-24', '13.00', '      ', '', 1, NULL, 1, 1, 14, 'FS201023000009', ''),
('2020-10-24', '13.00', '      ', '', 1, NULL, 1, 1, 14, 'FS201023000010', ''),
('2020-10-24', '13.00', '      ', '', 1, NULL, 1, 1, 14, 'FS201023000011', ''),
('2020-10-24', '14.00', '      ', '', 1, NULL, 1, 1, 14, 'FS201023000012', ''),
('2020-11-18', '10.00', '12  undefined    ', '1234', 2, 1200, 3, 5, 38, 'FS201110000013', 't@m.com'),
('2020-11-30', '14.00', '12 1251 undefined bjhbkjbk bjbijbi nininji 123456', '0623112231', 2, 200, 3, 5, 24, 'FS201110000014', 't@m.com'),
('2020-11-23', '13.00', '12 efdf undefined fdfd fdfd fdfd fdfd', '1234', 2, 1500, 3, 5, 23, 'FS201110000015', 't@m.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `service_detail`
--
ALTER TABLE `service_detail`
  ADD PRIMARY KEY (`id_service_detail`),
  ADD KEY `id_hairstyle` (`id_hairstyle`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_barber` (`id_barber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
