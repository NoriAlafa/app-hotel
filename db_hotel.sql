-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2022 at 08:24 AM
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
  `nama_fasilitas` varchar(100) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `fasilitas_hotel` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_fasilitas`
--

INSERT INTO `tb_fasilitas` (`id_fasilitas`, `nama_fasilitas`, `logo`, `fasilitas_hotel`, `deskripsi`) VALUES
(1, '<li>WiFi</li>\r\n<li>Karaoke</li>\r\n<li>Smart Tv</li>', '<i class=\"fas fa-smoking\" style=\"font-size: 50px;\"></i>', 'RUANG MEROKOK', 'Ruangan Khusus untuk merokok , sangat ramah untuk orang yang tidak suka asap rokok'),
(2, '<li>WiFi</li> \r\n<li>Karaoke</li>\r\n<li>Smart Tv</li>\r\n<li>Kolam Renang</li> \r\n<li>Gym</li>\r\n', '<i class=\"fas fa-dumbbell mb-3\" style=\"font-size: 50px;\"></i>', 'RUANG GYM', 'Alat Fitnes yang lengkap dan memadahi'),
(3, '<li>WiFi</li>\r\n<li>Pemandangan Aesthetic</li>\r\n<li>Kolam Renang</li> \r\n<li>Dinner</liv>\r\n', '<i class=\"fas fa-swimming-pool mb-3\" style=\"font-size: 50px;\"></i>', 'KOLAM RENANG', 'Kolam renang yang luas dan air yang bersih'),
(4, '<li>SoftDrink Lobby</li>\r\n<li>Kolam Renang</li>\r\n<li>Sprei Premium</li>\r\n<li>Bar</li>\r\n', '<i class=\"fas fa-utensils mb-3\" style=\"font-size: 50px;\"></i>', 'MINI RESTAURANT', 'Mini restaurat dengan berbagai macam masakan chef yang professional'),
(5, '<li>AC</li>\r\n<li>Gym</li>\r\n<li>Lunch</li>\r\n', '<i class=\"fas fa-glass-martini-alt  mb-3\" style=\"font-size: 50px;\"></i>', 'BARS', 'Bar dengan berbagai minuman yang nikmat'),
(8, '<li>Dinner</li>\r\n<li>Free Breakfast</li>\r\n<li>AC</li>\r\n<li>WiFi</li>', '<i class=\"fas fa-music\" style=\"font-size: 50px;\"></i>', 'NIGHT MUSIK', 'Night musik conser penghilang penat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kamar`
--

CREATE TABLE `tb_kamar` (
  `id_kamar` int(11) NOT NULL,
  `nama_kamar` varchar(100) NOT NULL,
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

INSERT INTO `tb_kamar` (`id_kamar`, `nama_kamar`, `tipe_kamar`, `harga_kamar`, `status_kamar`, `id_fasilitas`, `gambar`, `created_at`, `updated_at`) VALUES
(4, 'Kamar Memeng', 'VIP', 300000, 'Kosong', 4, 'chastity-cortijo-M8iGdeTSOkg-unsplash (1).jpg', '2022-02-28 06:16:32', '2022-03-31 06:44:55'),
(9, 'Kamar Maniez', 'BIASA', 300000, 'Tersedia', 4, 'photo-1578683010236-d716f9a3f461.avif', '2022-03-02 10:00:22', '2022-03-31 06:42:47'),
(10, 'Kamar Hero', 'BIASA', 200000, 'Tersedia', 8, 'ralph-ravi-kayden-FqqiAvJejto-unsplash.jpg', '2022-03-02 10:06:25', '2022-03-31 06:41:58'),
(11, 'Kamar Uwow', 'VIP', 3000000, 'Tersedia', 1, 'vojtech-bruzek-Yrxr3bsPdS0-unsplash.jpg', '2022-03-03 03:48:09', '2022-03-31 06:38:56'),
(13, '999999', 'BIASA', 99999, 'Tersedia', 5, 'miami-florida-hotel-room-wallpaper-preview.jpg', '2022-03-03 03:50:08', '2022-03-31 06:35:20'),
(14, 'Kamar SweetRoom', 'VIP', 40000000, 'Tersedia', 3, 'photo-1611892440504-42a792e24d32.jpg', '2022-03-03 03:50:54', '2022-03-31 06:41:09'),
(16, 'Kamar Honey', 'VIP', 500000, 'Tersedia', 2, 'download.jpg', '2022-03-08 06:50:12', '2022-03-31 06:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id_pesan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pesan`
--

INSERT INTO `tb_pesan` (`id_pesan`, `nama`, `email`, `pesan`, `created_at`, `updated_at`) VALUES
(2, 'alfa', 'korwil2@gmail.com', '123jduwj', '2022-03-21 06:59:05', '2022-03-21 06:59:05');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reservasion`
--

CREATE TABLE `tb_reservasion` (
  `id_reservasion` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `invoice` int(11) NOT NULL,
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

INSERT INTO `tb_reservasion` (`id_reservasion`, `id_user`, `id_kamar`, `invoice`, `tgl_check_in`, `tgl_check_out`, `pembayaran`, `status_rev`, `created_at`, `updated_at`) VALUES
(1, 5, 4, 182346586, '2022-02-28 04:05:36', '2022-03-17 12:00:00', 500000, 'bayar', '2022-02-28 04:05:36', '2022-03-12 01:49:37'),
(2, 6, 6, 826401748, '2022-02-28 05:56:17', '2022-03-17 12:00:00', 300000, 'out', '2022-02-28 05:56:17', '2022-03-12 01:49:37'),
(3, 7, 7, 724016489, '2022-02-28 05:56:17', '2022-03-17 12:00:00', 100000, 'bayar', '2022-02-28 05:56:17', '2022-03-12 01:49:37'),
(4, 8, 8, 352917552, '0000-00-00 00:00:00', '2022-03-17 12:00:00', 400000, 'bayar', '2022-02-28 06:17:37', '2022-03-12 01:49:37'),
(6, 10, 6, 206836589, '2022-03-15 12:00:00', '2022-03-18 12:00:00', 200000, 'out', '2022-03-09 07:10:02', '2022-03-12 01:58:07'),
(7, 10, 7, 745362758, '2022-03-24 12:00:00', '2022-03-17 12:00:00', 100000, 'booking', '2022-03-09 07:11:03', '2022-03-12 01:49:37'),
(12, 10, 6, 854870275, '2022-03-10 12:00:00', '2022-03-17 12:00:00', 100000, 'booking', '2022-03-10 05:58:13', '2022-03-12 01:49:37'),
(18, 10, 9, 98787985, '2022-03-17 12:00:00', '2022-03-19 12:00:00', 600000, 'booking', '2022-03-17 11:39:55', '2022-03-17 11:39:55'),
(19, 13, 7, 109234028, '2022-03-20 12:00:00', '2022-03-21 12:00:00', 2, 'booking', '2022-03-20 03:13:49', '2022-03-20 03:13:49'),
(20, 13, 7, 564738296, '2022-03-20 12:00:00', '2022-03-21 12:00:00', 600000, 'booking', '2022-03-20 03:17:10', '2022-03-20 03:17:10'),
(21, 13, 7, 342867456, '2022-03-20 12:00:00', '2022-03-22 12:00:00', 1800000, 'booking', '2022-03-20 03:17:53', '2022-03-20 03:17:53'),
(22, 10, 6, 193847265, '2022-03-24 12:00:00', '2022-03-25 12:00:00', 200000, 'out', '2022-03-23 21:57:57', '2022-03-23 21:59:57'),
(23, 12, 7, 180346883, '2022-03-24 12:00:00', '2022-03-25 12:00:00', 600000, 'booking', '2022-03-23 22:18:24', '2022-03-23 22:18:24');

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
  `gambar` varchar(200) NOT NULL,
  `bio` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `email`, `nik`, `password`, `role_id`, `gambar`, `bio`, `created_at`, `updated_at`) VALUES
(5, 'Nakamura Alfa', 'alafanori@gmail.com', '2311224589098765', '$2y$10$q7czH9TSN96bj0QYXqm.j.5slr3pgD3Mw0NOFwO10nGJaSqMdly/G', 2, 'card.png', '<p>Halo Saya Alfa</p>', '0000-00-00 00:00:00', '2022-03-22 06:19:25'),
(6, 'rudy', 'rudy@gmail.com', '2147483647', '$2y$10$lu4tSO/p5dF92AXFDPPQm.r8WCuS1yemwG33cbhWxEEumNXxKTTAi', 2, 'default.jpg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'erin', 'erinrisna1922@gmail.com', '95884883455', '$2y$10$6nY/T55yyHWrPQ/lrCit9uTqqobcItvENDU4afl2Yl5v6fbcHvit2', 3, 'default.jpg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'jijutsu', 'jijutsu@gmail.com', '1234567890123452', '$2y$10$.OBO/V2egMB/5WCqC78mzODoF6n10TL.82.fapIZ6cblUqkE/tFxa', 1, 'default.jpg', '', '2022-02-09 04:00:48', '2022-02-09 04:00:48'),
(10, 'korwil', 'korwil2@gmail.com', '1234567891012135', '$2y$10$DknoztYxnMLybpGEtSNeD.JoBrhhcLUhNo7xTirYYDOKCmlMBc2F.', 1, '1637205760350.jpg', '<p>Bass Klemes</p>', '2022-03-01 06:56:03', '2022-03-17 07:36:59'),
(11, 'Resepsionis Cantik', 'testresep@gmail.com', '1234567890123457', '$2y$10$Ou3mQXmYrXZKL38yN4XY9e9NgxEabPAC4P/1ZldvfAjOXAAKdNxS2', 3, 'smk-ti-pelita-nusantara-kediri.jpg', '<p>Halo Saya Mamank</p>', '2022-03-02 09:27:41', '2022-03-22 06:21:58'),
(12, 'Nivila Dewi', 'Nivila@gmail.com', '9789879783843212', '$2y$10$cgxJJFa8yeoiYSc3l8Q...ZDIlxphAM3C4vgBUgWSWWDczsObJ2Qm', 1, 'fira.jpg', '<p><b>Saya Nivila</b></p>', '2022-03-17 07:39:54', '2022-03-17 22:10:38'),
(13, 'Alfa', 'alfasaya@gmail.com', '1112233445555678', '$2y$10$6dNN01VV/m3GOCbjGgS41OjqRd4eVAitMBL.vRMzEM/U9YP1zwdgu', 1, 'default.jpg', '', '2022-03-17 08:14:13', '2022-03-17 08:14:13'),
(14, 'Danes', 'danes@gmail.com', '1234567890123456', '$2y$10$PEw0ZQoo8fEA2uVE/e1tgO/ekU9JjWAy2dShJ.4Zyt/l6FowLrCYK', 3, 'default.jpg', '', '2022-03-24 21:23:58', '2022-03-24 21:23:58');

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
-- Indexes for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`id_pesan`);

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
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_reservasion`
--
ALTER TABLE `tb_reservasion`
  MODIFY `id_reservasion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
