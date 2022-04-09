-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2022 at 02:17 PM
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
  `nama_fasilitas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_fasilitas`
--

INSERT INTO `tb_fasilitas` (`id_fasilitas`, `nama_fasilitas`) VALUES
(1, '<li>WiFi</li>\r\n<li>Karaoke</li>\r\n<li>Smart Tv</li>'),
(2, '<li>WiFi</li> \r\n<li>Karaoke</li>\r\n<li>Smart Tv</li>\r\n<li>Kolam Renang</li> \r\n<li>Gym</li>\r\n'),
(3, '<li>WiFi</li>\r\n<li>Pemandangan Aesthetic</li>\r\n<li>Kolam Renang</li> \r\n<li>Dinner</liv>\r\n'),
(4, '<li>SoftDrink Lobby</li>\r\n<li>Kolam Renang</li>\r\n<li>Sprei Premium</li>\r\n<li>Bar</li>\r\n'),
(5, '<li>AC</li>\r\n<li>Gym</li>\r\n<li>Lunch</li>\r\n'),
(8, '<li>Dinner</li>\r\n<li>Free Breakfast</li>\r\n<li>AC</li>\r\n<li>WiFi</li>');

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
(18, 10, 9, 98787985, '2022-03-17 12:00:00', '2022-03-19 12:00:00', 600000, 'booking', '2022-03-17 11:39:55', '2022-03-17 11:39:55'),
(24, 10, 13, 1355100189, '2022-04-01 12:00:00', '2022-04-03 12:00:00', 199998, 'booking', '2022-04-01 01:35:08', '2022-04-01 01:35:08'),
(31, 10, 10, 657134179, '2022-04-03 12:00:00', '2022-04-04 12:00:00', 200000, 'booking', '2022-04-03 09:09:25', '2022-04-03 09:09:25'),
(33, 10, 11, 2077464034, '2022-04-08 12:00:00', '2022-04-09 12:00:00', 3000000, 'booking', '2022-04-07 23:53:59', '2022-04-07 23:53:59'),
(34, 10, 13, 717987679, '2022-04-08 12:00:00', '2022-04-09 12:00:00', 99999, 'booking', '2022-04-07 23:55:47', '2022-04-07 23:55:47');

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
-- Table structure for table `tb_services`
--

CREATE TABLE `tb_services` (
  `id_services` int(11) NOT NULL,
  `services` varchar(20) NOT NULL,
  `detail_services` text NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_services`
--

INSERT INTO `tb_services` (`id_services`, `services`, `detail_services`, `img`) VALUES
(1, 'Concierge Services', '<li>melayani permintaan dan pertanyaan dari tamu, terutama yang tidak bisa dijawab oleh staf hotel lain</li>', 'Concierge.jpg'),
(3, 'Driver', '<li>Melayani anda ketika ingin menggunakan sopir pribadi untuk pergi berbelanja , jalan-jalan , dll</li>', 'driver-Service.jpg'),
(4, 'Dry Cleaning', '<li> mencuci pakaian dengan menggunakan cairan pelarut kotoran yang aman , dan dengan cepat baju langsung bisa dipakai kembali</li>', 'dry-cleaning.jpg'),
(5, 'Room Service', '<li>Menerima pembersihan kamar kembali , serta kebutuhan yang anda inginkan seperti menambah bantal&nbsp;</li>', 'room-services.jpg'),
(6, 'Turndown', '<li>Melayani customisasi kamar sesuai dengan yang anda inginkan</li>', 'turndown-service.jpg'),
(7, 'Outdoor', '<li>Nikmati perjalanan outdoor mu dengan menyenangkan</li>', 'hotel.jpg');

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
(10, 'korwil', 'korwil2@gmail.com', '1234567891012135', '$2y$10$C1zNvAI.SGqp7EB/uonn/eQFaC4r1.BJEqERINZEURJBcVYzk7Gh.', 1, '277582039_475366887609641_636773935210375720_n.jpg', '<li>Yoi</li>', '2022-03-01 06:56:03', '2022-04-03 09:30:36'),
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
-- Indexes for table `tb_services`
--
ALTER TABLE `tb_services`
  ADD PRIMARY KEY (`id_services`);

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
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id_reservasion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_services`
--
ALTER TABLE `tb_services`
  MODIFY `id_services` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
