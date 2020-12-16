-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2020 at 08:09 PM
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
-- Table structure for table `hairstyle`
--

CREATE TABLE `hairstyle` (
  `id_hairstyle` int(15) NOT NULL,
  `id_partner` int(15) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `image` text DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT 1
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
(6, 0, 'undercut', 'ทรงผมพื้นฐานสำหรับคุณ', 450, 'upload/1598974383undercut.png', 1),
(7, 1, 'ทรงผมรองทรงสูง', 'ทรงผมพื้นฐานสำหรับคุณ', 300, 'upload/1598974155รองทรงสูง.png', 1),
(8, 1, 'ทรงผมรองทรงกลาง', 'ทรงผมพื้นฐานสำหรับคุณ', 350, 'upload/1598974130รองทรงกลาง.png', 1),
(9, 1, 'ทรงผมรองทรงต่ำ', 'ทรงผมพื้นฐานสำหรับคุณ', 250, 'upload/1598974185รองทรงต่ำ.png', 1),
(10, 1, 'ทรงผมปัดข้าง', 'ทรงผมพื้นฐานสำหรับคุณ', 350, 'upload/1598974223ปาดข้าง.png', 1),
(11, 1, 'ทรงผมสกีนเฮด', 'ทรงผมพื้นฐานสำหรับคุณ', 400, 'upload/1598974360สกีนเฮด.png', 1),
(12, 1, 'undercut', 'ทรงผมพื้นฐานสำหรับคุณ', 450, 'upload/1598974383undercut.png', 1),
(14, 1, '1', '1', 1, 'upload/1603387224messageImage_1602880736761.jpg', 2),
(25, 20, 'ทรงผมรองทรงสูง', 'ทรงผมพื้นฐานสำหรับคุณ', 300, 'upload/1598974155รองทรงสูง.png', 1),
(26, 20, 'ทรงผมรองทรงกลาง', 'ทรงผมพื้นฐานสำหรับคุณ', 350, 'upload/1598974130รองทรงกลาง.png', 1),
(27, 20, 'ทรงผมรองทรงต่ำ', 'ทรงผมพื้นฐานสำหรับคุณ', 250, 'upload/1598974185รองทรงต่ำ.png', 1),
(28, 20, 'ทรงผมปัดข้าง', 'ทรงผมพื้นฐานสำหรับคุณ', 350, 'upload/1598974223ปาดข้าง.png', 1),
(29, 20, 'ทรงผมสกีนเฮด', 'ทรงผมพื้นฐานสำหรับคุณ', 400, 'upload/1598974360สกีนเฮด.png', 1),
(30, 20, 'undercut', 'ทรงผมพื้นฐานสำหรับคุณ', 450, 'upload/1598974383undercut.png', 1),
(32, 21, 'ทรงผมรองทรงสูง', 'ทรงผมพื้นฐานสำหรับคุณ', 300, 'upload/1598974155รองทรงสูง.png', 1),
(33, 21, 'ทรงผมรองทรงกลาง', 'ทรงผมพื้นฐานสำหรับคุณ', 350, 'upload/1598974130รองทรงกลาง.png', 1),
(34, 21, 'ทรงผมรองทรงต่ำ', 'ทรงผมพื้นฐานสำหรับคุณ', 250, 'upload/1598974185รองทรงต่ำ.png', 1),
(35, 21, 'ทรงผมปัดข้าง', 'ทรงผมพื้นฐานสำหรับคุณ', 350, 'upload/1598974223ปาดข้าง.png', 1),
(36, 21, 'ทรงผมสกีนเฮด', 'ทรงผมพื้นฐานสำหรับคุณ', 400, 'upload/1598974360สกีนเฮด.png', 1),
(37, 21, 'undercut', 'ทรงผมพื้นฐานสำหรับคุณ', 450, 'upload/1598974383undercut.png', 1),
(38, 2, 'ทดสอบ', '1', 2500, 'upload/16050150018.png', 2),
(39, 2, 'อัลเบิรต์', '2', 2500, 'upload/16050150301596322863963.jpg', 1),
(40, 2, 'tesrrt', 'scacsac', 1234, 'upload/1608017437asset-8.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hairstyle`
--
ALTER TABLE `hairstyle`
  ADD PRIMARY KEY (`id_hairstyle`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hairstyle`
--
ALTER TABLE `hairstyle`
  MODIFY `id_hairstyle` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
