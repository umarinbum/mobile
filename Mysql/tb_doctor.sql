-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2017 at 04:50 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_doctor`
--

CREATE TABLE `tb_doctor` (
  `id_doctor` int(7) NOT NULL,
  `name_doctor` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_doctor` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_doctor`
--

INSERT INTO `tb_doctor` (`id_doctor`, `name_doctor`, `status`, `img_doctor`) VALUES
(1, 'นพ.วิทวัส  อังคทะวานิช', '1', 't9.png'),
(2, 'นพ.สมศักดิ์  ชุลีวัฒนะพงศ์', '0', 't13.png'),
(3, 'นพ.สมบูรณ์  ธรรมรังรอง', '0', 't12.png'),
(4, 'นพ.กรีชาติ  พรสินศิริรักษ์', '0', 't1.png'),
(5, 'นพ.ไกรฤทธิ์  ติยะกุล', '0', 't3.png'),
(6, 'นพ.กิตติชัย  ปิยารักษ์', '0', 't2.png'),
(7, 'นพ.โชคชัย  อมรสวัสดิ์วัฒนา', '0', 't4.png'),
(8, 'นพ.วิรัตน์  โอสถาเลิศ', '0', 't10.png'),
(9, 'นพ.สุกิจ   วรธำรง', '1', 't15.png'),
(10, 'นพ.ธวัชชัย  บุญพัฒนพงศ์', '1', 't5.png'),
(11, 'นพ.สานิจ  พงคพนาไกร', '1', 't14.png'),
(12, 'นพ.สุทัศน์   คุณวโรตม์', '1', 't16.png'),
(13, 'นพ.วิเชียร  ว่องวงศ์ศรี', '1', 't8.png'),
(14, 'นพ.พิชญ์   ไพบูลย์เกษมสุทธิ', '1', 't7.png'),
(15, 'นพ.ศิริพงษ์      ลักขณาวงศ์', '1', 't11.png'),
(16, 'นพ.ปราโมทย์  มนูรังสี', '1', 't6.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_doctor`
--
ALTER TABLE `tb_doctor`
  ADD PRIMARY KEY (`id_doctor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_doctor`
--
ALTER TABLE `tb_doctor`
  MODIFY `id_doctor` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
