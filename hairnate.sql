-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2020 at 03:38 PM
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
-- Table structure for table `barber`
--

CREATE TABLE `barber` (
  `id_barber` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `id_partner` int(11) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `image` text NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barber`
--

INSERT INTO `barber` (`id_barber`, `name`, `id_partner`, `phone`, `image`, `description`) VALUES
(1, 'นาย ก', 1, NULL, 'upload/1603127669ar 4.png', 'test'),
(2, 'นาย ข', 1, NULL, 'upload/1603390937Image [default idle.png', '1'),
(3, 'Mr. A', 2, NULL, 'upload/16034666202.png', 'at condo A'),
(10, 'Mr.B', 2, '2121', 'upload/16080179898.png', 'dvsvdsv'),
(11, 'Mr. C', 2, '5645', 'upload/1608018007a1.png', 'dsdsds');

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

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `id` int(15) NOT NULL,
  `biz_name` text NOT NULL,
  `biz_email` text NOT NULL,
  `biz_house_no` text NOT NULL,
  `biz_village_no` text NOT NULL,
  `biz_sub_area` text NOT NULL,
  `biz_area` text NOT NULL,
  `biz_province` text NOT NULL,
  `biz_postal_code` text NOT NULL,
  `biz_type` tinyint(1) NOT NULL,
  `biz_image` text DEFAULT NULL,
  `fk_user_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id`, `biz_name`, `biz_email`, `biz_house_no`, `biz_village_no`, `biz_sub_area`, `biz_area`, `biz_province`, `biz_postal_code`, `biz_type`, `biz_image`, `fk_user_id`) VALUES
(1, 'test', '1234@gmail.com', '1', '', '', '', '', '', 1, NULL, 1),
(2, 'testtest', 'testtest@mail.com', '123', 'cgcxfhcghc', 'test', 'test', 'test', '121515', 1, 'upload/16034739853.png', 4),
(20, 't4t', 't44t', 'fefe', '', '', '', '', '', 2, NULL, 42),
(21, 'fwf', 'wfw', 'fwfw', 'fwfw', 'fwfwf', 'wfwf', 'wfw', '15165', 2, NULL, 43);

-- --------------------------------------------------------

--
-- Table structure for table `partner_closed`
--

CREATE TABLE `partner_closed` (
  `date` date NOT NULL,
  `time` text NOT NULL,
  `fk_partner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partner_closed`
--

INSERT INTO `partner_closed` (`date`, `time`, `fk_partner_id`) VALUES
('2020-10-24', '13:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymeny_id` int(11) NOT NULL,
  `fk_sd_id` varchar(14) NOT NULL,
  `card_name` text NOT NULL,
  `card_no` text NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `cvc` int(11) NOT NULL,
  `notification` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymeny_id`, `fk_sd_id`, `card_name`, `card_no`, `month`, `year`, `cvc`, `notification`) VALUES
(1, 'FS201023000002', '1', '2', 1, 3, 122, 0),
(2, 'DN20119000013', '', '', 0, 0, 0, 0),
(3, '', '', '', 0, 0, 0, 0),
(4, '', 'dsdsd', '', 11, 2029, 254, 0),
(5, '', '', '', 0, 0, 0, 0),
(6, '', '', '', 0, 0, 0, 0),
(7, '', '', '', 0, 0, 0, 0),
(8, '', '', '', 0, 0, 0, 0),
(9, '', '', '', 0, 0, 0, 0),
(10, '', 'kjhjkhbk', '12356564646', 9, 2030, 1234, 0),
(11, 'FS201110000013', '้ีร้้สาาส', '134565', 11, 2030, 1234, 0),
(12, 'FS201110000014', 'njnuibiubibu', '1234664', 9, 2030, 235, 0),
(13, 'FS201110000015', 'fdfssddfdsf', '15615156', 12, 2029, 5525, 0),
(14, 'FS201215000019', '', '', 0, 0, 0, 0),
(15, 'FS201215000020', '', '', 0, 0, 0, 0),
(16, 'FS201215000021', '', '', 0, 0, 0, 0),
(17, 'FS201215000023', '', '', 0, 0, 0, 0),
(18, 'FS201215000024', '', '', 0, 0, 0, 0),
(19, 'FS201215000025', '', '', 0, 0, 0, 0),
(20, 'FS201215000027', '', '', 0, 0, 0, 0),
(21, 'FS201215000044', '', '', 0, 0, 0, 0),
(22, 'FS201216000047', '', '', 0, 0, 0, 0),
(23, 'FS201216000049', '', '', 0, 0, 0, 0);

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

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`id_promotion`, `start_date`, `end_date`, `promotion_price`, `fk_hairstyle_id`) VALUES
(1, '2020-10-21', '2020-10-27', 1, 14),
(3, '2020-11-11', '2020-12-05', 1200, 38);

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
('2020-11-23', '13.00', '12 efdf undefined fdfd fdfd fdfd fdfd', '1234', 2, 1500, 3, 5, 23, 'FS201110000015', 't@m.com'),
('2020-12-17', '10.00', '12  undefined    ', '1234', 1, 250, 2, 5, 9, 'FS201215000016', 't@m.com'),
('2020-12-17', '14.00', '12  undefined    ', '1234', 1, 1, 1, 5, 14, 'FS201215000017', 't@m.com'),
('2020-12-17', '14.00', '12  undefined    ', '1234', 1, 1, 1, 5, 14, 'FS201215000018', 't@m.com'),
('2020-12-18', '10.00', '12  undefined    ', '1234', 2, 1, 1, 5, 14, 'FS201215000019', 't@m.com'),
('2020-12-18', '14.00', '12  undefined    ', '1234', 2, 1, 1, 5, 14, 'FS201215000020', 't@m.com'),
('2020-12-31', '10.00', '12  undefined    ', '1234', 2, 1, 1, 5, 14, 'FS201215000021', 't@m.com'),
('2021-01-20', '13.00', '12  undefined    ', '1234', 1, 1, 1, 5, 14, 'FS201215000022', 't@m.com'),
('2021-01-21', '14.00', '12  undefined    ', '1234', 2, 1, 1, 5, 14, 'FS201215000023', 't@m.com'),
('2020-12-30', '14.00', '12  undefined    ', '1234', 2, 1, 1, 5, 14, 'FS201215000024', 't@m.com'),
('2020-12-17', '10.00', '12  undefined    ', '1234', 2, 1, 1, 5, 14, 'FS201215000025', 't@m.com'),
('2020-12-17', '14.00', '12  undefined    ', '1234', 1, 1, 1, 5, 14, 'FS201215000026', 't@m.com'),
('2020-12-24', '10.00', '12  undefined    ', '1234', 2, 1200, 3, 5, 38, 'FS201215000027', 't@m.com'),
('2020-12-17', '10.00', '12  undefined    ', '1234', 1, 1200, 3, 5, 38, 'FS201215000028', 't@m.com'),
('2020-12-17', '14.00', '12  undefined    ', '1234', 1, 1200, 3, 5, 38, 'FS201215000029', 't@m.com'),
('2020-12-17', '14.00', '12  undefined    ', '1234', 1, 1200, 3, 5, 38, 'FS201215000030', 't@m.com'),
('2020-12-17', '15.00', '12  undefined    ', '1234', 1, 1200, 3, 5, 38, 'FS201215000031', 't@m.com'),
('2020-12-17', '10.00', '12  undefined    ', '1234', 1, 1200, 3, 5, 38, 'FS201215000032', 't@m.com'),
('2020-12-17', '09.00', '12  undefined    ', '1234', 1, 1200, 3, 5, 38, 'FS201215000033', 't@m.com'),
('2021-01-13', '09.00', '12  undefined    ', '1234', 1, 1200, 3, 5, 38, 'FS201215000034', 't@m.com'),
('2021-01-13', '09.00', '12  undefined    ', '1234', 1, 1200, 3, 5, 38, 'FS201215000035', 't@m.com'),
('2021-01-14', '10.00', '12  undefined    ', '1234', 1, 1200, 3, 5, 38, 'FS201215000036', 't@m.com'),
('2020-12-17', '10.00', '12  undefined    ', '1234', 1, 1200, 3, 5, 38, 'FS201215000037', 't@m.com'),
('2020-12-17', '10.00', '12  undefined    ', '1234', 1, 1200, 3, 5, 38, 'FS201215000038', 't@m.com'),
('2020-12-17', '10.00', '12  undefined    ', '1234', 1, 1200, 3, 5, 38, 'FS201215000039', 't@m.com'),
('2020-12-17', '11.00', '12  undefined    ', '1234', 1, 1200, 3, 5, 38, 'FS201215000040', 't@m.com'),
('2020-12-17', '14.00', '12  undefined    ', '1234', 1, 1200, 3, 5, 38, 'FS201215000041', 't@m.com'),
('2020-12-17', '14.00', '12  undefined    ', '1234', 1, 1200, 3, 5, 38, 'FS201215000042', 't@m.com'),
('2020-12-17', '14.00', '12  undefined    ', '1234', 1, 1200, 3, 5, 38, 'FS201215000043', 't@m.com'),
('2020-12-17', '11.00', '12  undefined    ', '1234', 2, 1200, 3, 5, 38, 'FS201215000044', 't@m.com'),
('2020-12-17', '14.00', '12  undefined    ', '1234', 1, 1200, 3, 5, 38, 'FS201215000045', 't@m.com'),
('2020-12-18', '09.00', '12  undefined    ', '1234', 1, 1200, 3, 5, 38, 'FS201215000046', 't@m.com'),
('2020-12-19', '10.00', '12  undefined    ', '1234', 2, 1, 1, 5, 14, 'FS201216000047', 't@m.com'),
('2020-12-24', '14.00', '12  undefined    ', '1234', 1, 1, 1, 5, 14, 'FS201216000048', 't@m.com'),
('2020-12-29', '10.00', '12  undefined    ', '1234', 2, 1, 1, 5, 14, 'FS201216000049', 't@m.com');

-- --------------------------------------------------------

--
-- Table structure for table `service_images`
--

CREATE TABLE `service_images` (
  `path` text NOT NULL,
  `fk_sd_id` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_images`
--

INSERT INTO `service_images` (`path`, `fk_sd_id`) VALUES
('upload/1603397131messageImage_1602880736761.jpg', '0'),
('upload/1603397131screencapture-localhost-matchminton-index-html-2020-10-19-22_49_49.png', '0'),
('upload/1603397277messageImage_1602880736761.jpg', '0'),
('upload/1603397277screencapture-localhost-matchminton-index-html-2020-10-19-22_49_49.png', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `username` text NOT NULL,
  `surname` text DEFAULT NULL,
  `password` text NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` text NOT NULL,
  `house_no` text NOT NULL,
  `village_no` text NOT NULL,
  `sub_area` text NOT NULL,
  `area` text NOT NULL,
  `province` text NOT NULL,
  `postal_code` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `surname`, `password`, `phone`, `email`, `house_no`, `village_no`, `sub_area`, `area`, `province`, `postal_code`, `type`) VALUES
(1, 'test', 'test', 'c4ca4238a0b923820dcc509a6f75849b', '1', '1234@gmail.com', '55', '', '', '', '', '', 2),
(3, 'asdasd', NULL, 'c4ca4238a0b923820dcc509a6f75849b', '2', 'i.bong.ba@gmail.com', '177', '15', 'terw', 'Nonthaburi', 'Nonthaburi', '123456', 1),
(4, 'yee', 'test', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 't@mail.com', '121/121', '151', 'egeg', 'fewfwe', 'fefe', '1515', 2),
(5, 'rge', NULL, '81dc9bdb52d04dc20036dbd8313ed055', '1234', 't@m.com', '12', '', '', '', '', '', 1),
(6, 'rge', NULL, 'd41d8cd98f00b204e9800998ecf8427e', '1234', 't@m.com', '12', '12', 'ddq', 'dwdw', 'dwd', '12234', 1),
(7, 'wdqwd', 'ddw', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'd@mil.com', '151', '15', 'sdwd', 'ddww', 'dww', '11616', 2),
(8, 'wdqwd', 'ddw', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'd@mil.com', '151', '15', 'sdwd', 'ddww', 'dww', '11616', 2),
(9, 'wdqwd', 'ddw', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'd@mil.com', '151', '15', 'sdwd', 'ddww', 'dww', '11616', 2),
(10, 'wdqwd', 'ddw', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'd@mil.com', '151', '15', 'sdwd', 'ddww', 'dww', '11616', 2),
(11, 'wdqwd', 'ddw', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'd@mil.com', '151', '15', 'sdwd', 'ddww', 'dww', '11616', 2),
(12, 'wdqwd', 'ddw', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'd@mil.com', '151', '15', 'sdwd', 'ddww', 'dww', '11616', 2),
(13, 'wdqwd', 'ddw', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'd@mil.com', '151', '15', 'sdwd', 'ddww', 'dww', '11616', 2),
(14, 'dwdwd', 'dwdw', '81dc9bdb52d04dc20036dbd8313ed055', 'dwd', 'ddw@fef', '154', '154', 'ddwdw', 'wfwd', 'fwfw', '1545', 2),
(15, 'dwdwd', 'dwdw', '81dc9bdb52d04dc20036dbd8313ed055', 'dwd', 'ddw@fef', '154', '154', 'ddwdw', 'wfwd', 'fwfw', '1545', 2),
(16, 'dwdwd', 'dwdw', '81dc9bdb52d04dc20036dbd8313ed055', 'dwd', 'ddw@fef', '154', '154', 'ddwdw', 'wfwd', 'fwfw', '1545', 2),
(17, 'dwdwd', 'dwdw', '81dc9bdb52d04dc20036dbd8313ed055', 'dwd', 'ddw@fef', '154', '154', 'ddwdw', 'wfwd', 'fwfw', '1545', 2),
(18, 'dwdwd', 'dwdw', '81dc9bdb52d04dc20036dbd8313ed055', 'dwd', 'ddw@fef', '154', '154', 'ddwdw', 'wfwd', 'fwfw', '1545', 2),
(19, 'dwdwd', 'dwdw', '81dc9bdb52d04dc20036dbd8313ed055', 'dwd', 'ddw@fef', '154', '154', 'ddwdw', 'wfwd', 'fwfw', '1545', 2),
(20, 'dwdwd', 'dwdw', '81dc9bdb52d04dc20036dbd8313ed055', 'dwd', 'ddw@fef', '154', '154', 'ddwdw', 'wfwd', 'fwfw', '1545', 2),
(21, 'adad', 'dadad', '81dc9bdb52d04dc20036dbd8313ed055', '12154', 'a@m.c', '15', '25', 'dwdq', 'dwd', 'dwdw', '1234', 2),
(22, 'adad', 'dadad', '81dc9bdb52d04dc20036dbd8313ed055', '12154', 'a@m.c', '15', '25', 'dwdq', 'dwd', 'dwdw', '1234', 2),
(23, 'adad', 'dadad', '81dc9bdb52d04dc20036dbd8313ed055', '12154', 'a@m.c', '15', '25', 'dwdq', 'dwd', 'dwdw', '1234', 2),
(24, 'adad', 'dadad', '81dc9bdb52d04dc20036dbd8313ed055', '12154', 'a@m.c', '15', '25', 'dwdq', 'dwd', 'dwdw', '1234', 2),
(25, 'adad', 'dadad', '81dc9bdb52d04dc20036dbd8313ed055', '12154', 'a@m.c', '15', '25', 'dwdq', 'dwd', 'dwdw', '1234', 2),
(26, 'adad', 'dadad', '81dc9bdb52d04dc20036dbd8313ed055', '12154', 'a@m.c', '15', '25', 'dwdq', 'dwd', 'dwdw', '1234', 2),
(27, 'adad', 'dadad', '81dc9bdb52d04dc20036dbd8313ed055', '12154', 'a@m.c', '15', '25', 'dwdq', 'dwd', 'dwdw', '1234', 2),
(28, 'adad', 'dadad', '81dc9bdb52d04dc20036dbd8313ed055', '12154', 'a@m.c', '15', '25', 'dwdq', 'dwd', 'dwdw', '1234', 2),
(29, 'adad', 'dadad', '81dc9bdb52d04dc20036dbd8313ed055', '12154', 'a@m.c', '15', '25', 'dwdq', 'dwd', 'dwdw', '1234', 2),
(30, 'adad', 'dadad', '81dc9bdb52d04dc20036dbd8313ed055', '12154', 'a@m.c', '15', '25', 'dwdq', 'dwd', 'dwdw', '1234', 2),
(31, 'WCWC', 'WCWC', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'w@mail.com', '15', '2', 'kmi', 'ijiji', 'ijij', '15232', 2),
(32, 'WCWC', 'WCWC', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'w@mail.com', '15', '2', 'kmi', 'ijiji', 'ijij', '15232', 2),
(33, 'WCWC', 'WCWC', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'w@mail.com', '15', '2', 'kmi', 'ijiji', 'ijij', '15232', 2),
(34, 'WCWC', 'WCWC', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'w@mail.com', '15', '2', 'kmi', 'ijiji', 'ijij', '15232', 2),
(35, 'WCWC', 'WCWC', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'w@mail.com', '15', '2', 'kmi', 'ijiji', 'ijij', '15232', 2),
(36, 'dwdw', 'dwdw', '81dc9bdb52d04dc20036dbd8313ed055', '12345', 'd@t.com', '52/1', '3', 'cecec', 'cecec', 'ceccec', '122130', 2),
(37, 'dwdw', 'dwdw', '81dc9bdb52d04dc20036dbd8313ed055', '12345', 'd@t.com', '52/1', '3', 'cecec', 'cecec', 'ceccec', '122130', 2),
(38, 'dwdw', 'dwdw', '81dc9bdb52d04dc20036dbd8313ed055', '12345', 'd@t.com', '52/1', '3', 'cecec', 'cecec', 'ceccec', '122130', 2),
(39, 'dwdw', 'dwdw', '81dc9bdb52d04dc20036dbd8313ed055', '12345', 'd@t.com', '52/1', '3', 'cecec', 'cecec', 'ceccec', '122130', 2),
(40, 'dwdw', 'dwdw', '81dc9bdb52d04dc20036dbd8313ed055', '12345', 'd@t.com', '52/1', '3', 'cecec', 'cecec', 'ceccec', '122130', 2),
(41, 'wdwd', 'dwdw', '81dc9bdb52d04dc20036dbd8313ed055', 'dwdwd', 'dwdw', 'dwdw', 'dwd', 'wdwd', 'dwdw', 'wdw', 'dwdw', 2),
(42, '4t4t', 't4t', '81dc9bdb52d04dc20036dbd8313ed055', '4t4', 't4t', 'fefe', 'fefe', 'fefefe', 'ffefef', 'fefe', '14115', 2),
(43, 'wfw', 'wfw', '81dc9bdb52d04dc20036dbd8313ed055', 'f', 'fwfw', 'wfwf', 'fwfw', 'fwfw', 'fwfw', 'wfw', '1151', 2);

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
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymeny_id`);

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
-- Indexes for table `service_images`
--
ALTER TABLE `service_images`
  ADD KEY `fk_sd_id` (`fk_sd_id`);

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
  MODIFY `id_barber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hairstyle`
--
ALTER TABLE `hairstyle`
  MODIFY `id_hairstyle` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymeny_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id_promotion` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `partner`
--
ALTER TABLE `partner`
  ADD CONSTRAINT `fk_a_ID` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
