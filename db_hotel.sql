-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2022 at 10:55 AM
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
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_fasilitas`
--

CREATE TABLE `tb_fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `nama_fasilitas` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `status` enum('Tersedia','Kosong') NOT NULL,
  `fasilitas` varchar(100) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kamar`
--

INSERT INTO `tb_kamar` (`id_kamar`, `nama_kamar`, `deskripsi`, `tipe_kamar`, `harga_kamar`, `status`, `fasilitas`, `gambar`, `created_at`, `updated_at`) VALUES
(4, 'Hotel Fira', 'adalah gwej', 'VIP', 3500000, 'Tersedia', 'bar caffe', 'unnamed.jpg', '2022-02-28 06:16:32', '2022-03-01 09:02:10'),
(6, 'Hotel Murah', '<p>Sangat Murah</p>', 'VIP', 10000, 'Tersedia', 'Oke', '258853866_126236396506198_6070899489570258289_n.jpg', '2022-03-01 09:01:46', '2022-03-01 09:01:46'),
(7, 'Wow Hotel', '<p>wpoooowww</p>', 'VIP', 300000, 'Tersedia', 'Kolam Renang , Club , Karaoke', '257640242_1074716543346452_7841743680110124039_n.jpg', '2022-03-01 09:08:23', '2022-03-01 09:08:23'),
(8, 'korewa2', '<p>nani kore</p>', 'BIASA', 30000, 'Tersedia', 'Kolam Renang , Club', '242402771_995142647946601_3407249521776712034_n.jpg', '2022-03-01 09:09:45', '2022-03-01 09:09:45'),
(9, 'Ichikiwir', '<p>Afa Iyah</p>', 'BIASA', 300000, 'Tersedia', 'Kolam Renang , Club , Karaoke , Free Dinner ', 'smk-ti-pelita-nusantara-kediri.jpg', '2022-03-02 10:00:22', '2022-03-02 10:00:22'),
(10, 'ohayou', '<p>korewa nandesuka</p>', 'VIP', 1000000, 'Tersedia', 'Kolam Renang , Club , Karaoke', 'ticket jepang.jpg', '2022-03-02 10:06:25', '2022-03-02 10:06:25'),
(11, 'eaeaea', '<p>aeaeaea</p>', 'VIP', 3000000, 'Tersedia', 'Kolam Renang , Club , Karaoke , Free Dinner ', '243347566_134201875604595_8760594026456361568_n.jpg', '2022-03-03 03:48:09', '2022-03-03 03:48:09'),
(12, '8888', '<p>88888</p>', 'VIP', 8888888, 'Tersedia', 'babiiii', 'Screenshot (2).png', '2022-03-03 03:49:24', '2022-03-03 03:49:24'),
(13, '999999', '<p>99999</p>', 'VIP', 99999, 'Tersedia', 'Free Dinner', 'Screenshot (3).png', '2022-03-03 03:50:08', '2022-03-03 03:50:08'),
(14, '10101010', '<p>10101010</p>', 'BIASA', 40000000, 'Tersedia', 'Kolam Renang , Club , Karaoke', 'Screenshot (6).png', '2022-03-03 03:50:54', '2022-03-03 03:50:54'),
(15, '11111111', '<p>111111</p>', 'BIASA', 11111111, 'Tersedia', 'Kolam Renang , Club', 'Screenshot (5).png', '2022-03-03 03:51:41', '2022-03-03 03:51:41');

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
(1, 5, 1, '2022-02-28 04:05:36', '2022-02-28 04:05:36', 300000, 'out', '2022-02-28 04:05:36', '2022-02-28 04:05:36'),
(2, 6, 2, '2022-02-28 05:56:17', '2022-02-28 05:56:17', 400000, 'booking', '2022-02-28 05:56:17', '2022-02-28 05:56:17'),
(3, 7, 3, '2022-02-28 05:56:17', '2022-02-28 05:56:17', 500000, 'bayar', '2022-02-28 05:56:17', '2022-02-28 05:56:17'),
(4, 8, 4, '2022-02-28 06:17:37', '2022-02-28 06:17:37', 400000, 'out', '2022-02-28 06:17:37', '2022-02-28 06:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `role`) VALUES
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
(8, 'alfaoken', 'alafanori11@gmail.com', '12334456776', '$2y$10$SLqUTTznH7GEaCTjr8FEY.XFi.ETePKdrdmH5Aa2lly/.iCwf7p.S', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'jijutsu', 'jijutsu@gmail.com', '1234567890123452', '$2y$10$.OBO/V2egMB/5WCqC78mzODoF6n10TL.82.fapIZ6cblUqkE/tFxa', 1, '2022-02-09 04:00:48', '2022-02-09 04:00:48'),
(10, 'test role', 'korwil@gmail.com', '1234567891012134', '$2y$10$WnnEmkE42OQcbLVve9NWweqjfFFAXX3BC58vq7Xt6uA5/cKx11WzK', 1, '2022-03-01 06:56:03', '2022-03-01 06:56:03'),
(11, 'mamank', 'testresep@gmail.com', '1234567890123457', '$2y$10$RbjJFb91ZrveQzFe4Z4p0OEO.B0YSCvjjyGzSz/dVk9e90PjbW632', 3, '2022-03-02 09:27:41', '2022-03-02 09:27:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

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
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_fasilitas`
--
ALTER TABLE `tb_fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_reservasion`
--
ALTER TABLE `tb_reservasion`
  MODIFY `id_reservasion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
