-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2022 at 01:40 PM
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
  `fasilitas_hotel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_fasilitas`
--

INSERT INTO `tb_fasilitas` (`id_fasilitas`, `nama_fasilitas`, `logo`, `fasilitas_hotel`) VALUES
(1, '<li>WiFi</li>\r\n<li>Karaoke</li>\r\n<li>Smart Tv</li>', '<i class=\"fas fa-smoking\" style=\"font-size: 50px;\"></i>', 'RUANG MEROKOK'),
(2, '<li>WiFi</li> \r\n<li>Karaoke</li>\r\n<li>Smart Tv</li>\r\n<li>Kolam Renang</li> \r\n<li>Gym</li>\r\n', '<i class=\"fas fa-dumbbell mb-3\" style=\"font-size: 50px;\"></i>', 'RUANG GYM'),
(3, '<li>WiFi</li>\r\n<li>Pemandangan Aesthetic</li>\r\n<li>Kolam Renang</li> \r\n<li>Dinner</liv>\r\n', '<i class=\"fas fa-swimming-pool mb-3\" style=\"font-size: 50px;\"></i>', 'KOLAM RENANG'),
(4, '<li>SoftDrink Lobby</li>\r\n<li>Kolam Renang</li>\r\n<li>Sprei Premium</li>\r\n<li>Bar</li>\r\n', '<i class=\"fas fa-utensils mb-3\" style=\"font-size: 50px;\"></i>', 'MINI RESTAURANT'),
(5, '<li>AC</li>\r\n<li>Gym</li>\r\n<li>Lunch</li>\r\n', '<i class=\"fas fa-glass-martini-alt  mb-3\" style=\"font-size: 50px;\"></i>', 'BARS'),
(8, '<li>Dinner</li>\r\n<li>Free Breakfast</li>\r\n<li>AC</li>\r\n<li>WiFi</li>', '<i class=\"fas fa-music\" style=\"font-size: 50px;\"></i>', 'NIGHT MUSIK');

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
(6, 'Hotel Murah', '<p>Sangat Murah</p>', 'BIASA', 200000, 'Tersedia', 2, '20220118_145408.jpg', '2022-03-01 09:01:46', '2022-03-16 01:33:02'),
(7, 'Wow Hotel', '<p>wpoooowww</p>', 'VIP', 300000, 'Tersedia', 3, '257640242_1074716543346452_7841743680110124039_n.jpg', '2022-03-01 09:08:23', '2022-03-01 09:08:23'),
(8, 'korewa2', '<p>nani kore</p>', 'VIP', 300000, 'Tersedia', 4, 'Screenshot (28).png', '2022-03-01 09:09:45', '2022-03-04 09:54:40'),
(9, 'Ichikiwir', '<p>Afa Iyah</p>', 'BIASA', 300000, 'Tersedia', 5, 'smk-ti-pelita-nusantara-kediri.jpg', '2022-03-02 10:00:22', '2022-03-02 10:00:22'),
(10, 'ohayou', '<p>korewa nandesuka</p>', 'VIP', 1000000, 'Tersedia', 2, '92199789_p0_master1200.jpg', '2022-03-02 10:06:25', '2022-03-16 05:31:02'),
(11, 'eaeaea', '<p>aeaeaea</p>', 'VIP', 3000000, 'Tersedia', 1, '243347566_134201875604595_8760594026456361568_n.jpg', '2022-03-03 03:48:09', '2022-03-03 03:48:09'),
(13, '999999', '<p>99999</p>', 'BIASA', 99999, 'Tersedia', 4, 'Screenshot (3).png', '2022-03-03 03:50:08', '2022-03-03 03:50:08'),
(14, '10101010', '<p>10101010</p>', 'BIASA', 40000000, 'Tersedia', 5, 'Screenshot (6).png', '2022-03-03 03:50:54', '2022-03-03 03:50:54'),
(16, 'Test Fasilitas', '<p>test oke</p>', 'VIP', 500000, 'Tersedia', 3, 'template.jpg', '2022-03-08 06:50:12', '2022-03-08 06:50:12');

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
  `tgl_check_in` datetime NOT NULL,
  `tgl_check_out` datetime NOT NULL,
  `jumlah_tamu` char(5) NOT NULL,
  `pembayaran` int(11) NOT NULL,
  `status_rev` enum('booking','bayar','out') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_reservasion`
--

INSERT INTO `tb_reservasion` (`id_reservasion`, `id_user`, `id_kamar`, `tgl_check_in`, `tgl_check_out`, `jumlah_tamu`, `pembayaran`, `status_rev`, `created_at`, `updated_at`) VALUES
(1, 5, 4, '2022-02-28 04:05:36', '2022-03-17 12:00:00', '', 500000, 'bayar', '2022-02-28 04:05:36', '2022-03-12 01:49:37'),
(2, 6, 6, '2022-02-28 05:56:17', '2022-03-17 12:00:00', '', 300000, 'out', '2022-02-28 05:56:17', '2022-03-12 01:49:37'),
(3, 7, 7, '2022-02-28 05:56:17', '2022-03-17 12:00:00', '', 100000, 'bayar', '2022-02-28 05:56:17', '2022-03-12 01:49:37'),
(4, 8, 8, '0000-00-00 00:00:00', '2022-03-17 12:00:00', '', 400000, 'bayar', '2022-02-28 06:17:37', '2022-03-12 01:49:37'),
(6, 10, 6, '2022-03-15 12:00:00', '2022-03-18 12:00:00', '', 200000, 'out', '2022-03-09 07:10:02', '2022-03-12 01:58:07'),
(7, 10, 7, '2022-03-24 12:00:00', '2022-03-17 12:00:00', '', 100000, 'booking', '2022-03-09 07:11:03', '2022-03-12 01:49:37'),
(12, 10, 6, '2022-03-10 12:00:00', '2022-03-17 12:00:00', '', 100000, 'booking', '2022-03-10 05:58:13', '2022-03-12 01:49:37'),
(18, 10, 9, '2022-03-17 12:00:00', '2022-03-19 12:00:00', '', 600000, 'booking', '2022-03-17 11:39:55', '2022-03-17 11:39:55'),
(19, 13, 7, '2022-03-20 12:00:00', '2022-03-21 12:00:00', '2', 2, 'booking', '2022-03-20 03:13:49', '2022-03-20 03:13:49'),
(20, 13, 7, '2022-03-20 12:00:00', '2022-03-21 12:00:00', '2', 600000, 'booking', '2022-03-20 03:17:10', '2022-03-20 03:17:10'),
(21, 13, 7, '2022-03-20 12:00:00', '2022-03-22 12:00:00', '3', 1800000, 'booking', '2022-03-20 03:17:53', '2022-03-20 03:17:53');

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
(13, 'Alfa', 'alfasaya@gmail.com', '1112233445555678', '$2y$10$6dNN01VV/m3GOCbjGgS41OjqRd4eVAitMBL.vRMzEM/U9YP1zwdgu', 1, 'default.jpg', '', '2022-03-17 08:14:13', '2022-03-17 08:14:13');

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
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_reservasion`
--
ALTER TABLE `tb_reservasion`
  MODIFY `id_reservasion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
