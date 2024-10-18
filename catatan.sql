-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 12:47 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catatan`
--

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `suhu` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catatan`
--

INSERT INTO `catatan` (`id`, `nik`, `tanggal`, `jam`, `lokasi`, `suhu`) VALUES
(32, '3522145912030001', '2022-03-07', '09:38:00', 'Jakarta', 36),
(33, '3522145912030001', '2022-03-07', '09:38:00', 'Jakarta', 37),
(34, '3522145912030001', '2022-03-07', '09:38:00', 'Jakarta', 35),
(35, '3522145912030001', '2022-03-15', '13:13:00', 'SMK 4 Bojonegoro', 36),
(38, '3522145912030002', '2022-03-20', '09:41:00', 'Sukowati', 34),
(39, '3522135602040002', '2022-03-21', '09:04:00', 'Kapas', 32),
(40, '3522135602040002', '2022-03-13', '07:05:00', 'Bjn', 32),
(42, '3522145912030001', '2022-02-10', '20:05:00', 'SMK 4 Bojonegoro', 37),
(43, '3522145912030001', '2022-02-24', '20:05:00', 'kapas', 36),
(45, '3522145912030001', '2022-03-27', '22:48:00', 'Bandung', 33),
(46, '3522145912030001', '2022-04-14', '20:58:00', 'Surabaya', 34),
(47, '123', '2022-10-08', '07:51:00', 'malang', 60),
(48, '123', '2022-11-23', '08:27:00', 'malang', 38),
(49, '123', '2023-02-02', '02:24:00', 'Bandung', 34),
(50, '123', '2023-02-16', '12:23:00', 'malang', 34);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nik`, `nama_lengkap`, `password`, `foto`) VALUES
(60, '123', 'yudhi', '202cb962ac59075b964b07152d234b70', '202210370311066.jpg'),
(61, 'yudhi', 'yudhi', '202cb962ac59075b964b07152d234b70', 'bg1.jpg'),
(62, 'admin', 'yudhi', '21232f297a57a5a743894a0e4a801fc3', 'slide 3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
