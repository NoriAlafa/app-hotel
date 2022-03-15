-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2022 at 02:02 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_fasilitas`
--

CREATE TABLE `tb_fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `fasilitas_1` text NOT NULL,
  `fasilitas_2` text NOT NULL,
  `fasilitas_3` text NOT NULL,
  `fasilitas_4` text NOT NULL,
  `fasilitas_5` text NOT NULL,
  `fasilitas_6` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_fasilitas`
--

INSERT INTO `tb_fasilitas` (`id_fasilitas`, `fasilitas_1`, `fasilitas_2`, `fasilitas_3`, `fasilitas_4`, `fasilitas_5`, `fasilitas_6`) VALUES
(1, 'Bebas Rokok', 'Bar Caffe', 'Kolam Renang', 'Layanan Front Office', 'Dinner', 'Karaoke'),
(2, 'Free Wifi', 'Restaurant', 'Layanan Office', 'AC', 'Soft Drink Lobby', 'Kamar Luas'),
(3, 'AC', 'smart tv', 'sprai premium', 'WiFi', 'telephone', 'pemandangan bagus'),
(4, 'GYM', 'Kolam Renang', 'Musik Room', 'AC', 'WiFi', ''),
(5, 'AC', 'WiFi', 'Smart TV', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kamar`
--

CREATE TABLE `tb_kamar` (
  `id_kamar` int(11) NOT NULL,
  `nama_kamar` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tipe_kamar` varchar(20) NOT NULL,
  `harga_kamar` int(11) NOT NULL,
  `status_kamar` enum('Tersedia','Kosong') NOT NULL,
  `id_fasilitas` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kamar`
--

INSERT INTO `tb_kamar` (`id_kamar`, `nama_kamar`, `deskripsi`, `tipe_kamar`, `harga_kamar`, `status_kamar`, `id_fasilitas`, `gambar`, `created_at`, `updated_at`) VALUES
(4, 'Hotel Fira', 'adalah gwej', 'VIP', 300000, 'Kosong', 1, 'unnamed.jpg', '2022-02-28 06:16:32', '2022-03-04 08:09:54'),
(6, 'Hotel Murah', '<p>Sangat Murah</p>', 'VIP', 200000, 'Tersedia', 2, 'Screenshot (36).png', '2022-03-01 09:01:46', '2022-03-12 01:58:06'),
(7, 'Wow Hotel', '<p>wpoooowww</p>', 'VIP', 300000, 'Tersedia', 3, '257640242_1074716543346452_7841743680110124039_n.jpg', '2022-03-01 09:08:23', '2022-03-01 09:08:23'),
(8, 'korewa2', '<p>nani kore</p>', 'VIP', 300000, 'Tersedia', 4, 'Screenshot (28).png', '2022-03-01 09:09:45', '2022-03-04 09:54:40'),
(9, 'Ichikiwir', '<p>Afa Iyah</p>', 'BIASA', 300000, 'Tersedia', 5, 'smk-ti-pelita-nusantara-kediri.jpg', '2022-03-02 10:00:22', '2022-03-02 10:00:22'),
(10, 'ohayou', '<p>korewa nandesuka</p>', 'VIP', 1000000, 'Tersedia', 2, 'ticket jepang.jpg', '2022-03-02 10:06:25', '2022-03-02 10:06:25'),
(11, 'eaeaea', '<p>aeaeaea</p>', 'VIP', 3000000, 'Tersedia', 1, '243347566_134201875604595_8760594026456361568_n.jpg', '2022-03-03 03:48:09', '2022-03-03 03:48:09'),
(13, '999999', '<p>99999</p>', 'BIASA', 99999, 'Tersedia', 4, 'Screenshot (3).png', '2022-03-03 03:50:08', '2022-03-03 03:50:08'),
(14, '10101010', '<p>10101010</p>', 'BIASA', 40000000, 'Tersedia', 5, 'Screenshot (6).png', '2022-03-03 03:50:54', '2022-03-03 03:50:54'),
(16, 'Test Fasilitas', '<p>test oke</p>', 'VIP', 500000, 'Tersedia', 3, 'template.jpg', '2022-03-08 06:50:12', '2022-03-08 06:50:12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reservasion`
--

CREATE TABLE `tb_reservasion` (
  `id_reservasion` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `tgl_check_in` datetime NOT NULL,
  `tgl_check_out` datetime NOT NULL,
  `pembayaran` int(11) NOT NULL,
  `status_rev` enum('booking','bayar','out') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_reservasion`
--

INSERT INTO `tb_reservasion` (`id_reservasion`, `id_user`, `id_kamar`, `tgl_check_in`, `tgl_check_out`, `pembayaran`, `status_rev`, `created_at`, `updated_at`) VALUES
(1, 5, 4, '2022-02-28 04:05:36', '2022-03-17 12:00:00', 100000, 'bayar', '2022-02-28 04:05:36', '2022-03-12 01:49:37'),
(2, 6, 6, '2022-02-28 05:56:17', '2022-03-17 12:00:00', 100000, 'out', '2022-02-28 05:56:17', '2022-03-12 01:49:37'),
(3, 7, 7, '2022-02-28 05:56:17', '2022-03-17 12:00:00', 100000, 'bayar', '2022-02-28 05:56:17', '2022-03-12 01:49:37'),
(4, 8, 8, '0000-00-00 00:00:00', '2022-03-17 12:00:00', 100000, 'bayar', '2022-02-28 06:17:37', '2022-03-12 01:49:37'),
(6, 10, 6, '2022-03-15 12:00:00', '2022-03-18 12:00:00', 200000, 'out', '2022-03-09 07:10:02', '2022-03-12 01:58:07'),
(7, 10, 7, '2022-03-24 12:00:00', '2022-03-17 12:00:00', 100000, 'booking', '2022-03-09 07:11:03', '2022-03-12 01:49:37'),
(12, 10, 6, '2022-03-10 12:00:00', '2022-03-17 12:00:00', 100000, 'booking', '2022-03-10 05:58:13', '2022-03-12 01:49:37'),
(13, 10, 6, '2022-03-10 12:00:00', '2022-03-17 12:00:00', 100000, 'booking', '2022-03-10 05:58:39', '2022-03-12 01:49:37'),
(14, 10, 7, '2022-03-10 12:00:00', '2022-03-17 12:00:00', 100000, 'booking', '2022-03-10 05:59:50', '2022-03-12 01:49:37'),
(15, 10, 16, '2022-03-10 12:00:00', '2022-03-17 12:00:00', 100000, 'booking', '2022-03-10 07:11:07', '2022-03-12 01:49:37'),
(16, 10, 16, '2022-03-10 12:00:00', '2022-03-17 12:00:00', 100000, 'booking', '2022-03-10 07:12:35', '2022-03-12 01:49:37');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`role_id`, `role`) VALUES
(1, 'user'),
(2, 'admin'),
(3, 'resepsionis');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `email`, `nik`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(5, 'alfaoke', 'alafanori@gmail.com', '23112245', '$2y$10$.2gmrZGP/IL1zuvjBbinCuC1qg6p0kxdCQ7dkWqM1x.iDOIrnfHHW', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'rudy', 'rudy@gmail.com', '2147483647', '$2y$10$lu4tSO/p5dF92AXFDPPQm.r8WCuS1yemwG33cbhWxEEumNXxKTTAi', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'erin', 'erinrisna1922@gmail.com', '95884883455', '$2y$10$6nY/T55yyHWrPQ/lrCit9uTqqobcItvENDU4afl2Yl5v6fbcHvit2', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'alfaoken ', 'alafanori11@gmail.com', '12334456776', '$2y$10$SLqUTTznH7GEaCTjr8FEY.XFi.ETePKdrdmH5Aa2lly/.iCwf7p.S', 1, '0000-00-00 00:00:00', '2022-03-04 08:09:54'),
(9, 'jijutsu', 'jijutsu@gmail.com', '1234567890123452', '$2y$10$.OBO/V2egMB/5WCqC78mzODoF6n10TL.82.fapIZ6cblUqkE/tFxa', 1, '2022-02-09 04:00:48', '2022-02-09 04:00:48'),
(10, 'korwil', 'korwil2@gmail.com', '1234567891012135', '$2y$10$a3L3BHRXUyIU9a.r6EFIyORxyMs8m6LS8ETl5cx.xvfWLbAtVV8YW', 1, '2022-03-01 06:56:03', '2022-03-12 21:54:00'),
(11, 'mamank', 'testresep@gmail.com', '1234567890123457', '$2y$10$RbjJFb91ZrveQzFe4Z4p0OEO.B0YSCvjjyGzSz/dVk9e90PjbW632', 3, '2022-03-02 09:27:41', '2022-03-02 09:27:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_fasilitas`
--
ALTER TABLE `tb_fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `tb_reservasion`
--
ALTER TABLE `tb_reservasion`
  ADD PRIMARY KEY (`id_reservasion`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_fasilitas`
--
ALTER TABLE `tb_fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_reservasion`
--
ALTER TABLE `tb_reservasion`
  MODIFY `id_reservasion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
