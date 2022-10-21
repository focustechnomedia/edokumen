-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 21, 2022 at 11:41 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ftm_edokumen`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `dokumen_id` int(11) NOT NULL,
  `bidang_id` int(11) NOT NULL,
  `subbidang_id` int(11) NOT NULL,
  `klasifikasi_id` int(11) NOT NULL,
  `nama_dokumen` varchar(200) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `share_to` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`dokumen_id`, `bidang_id`, `subbidang_id`, `klasifikasi_id`, `nama_dokumen`, `nama_file`, `share_to`, `created_at`, `updated_at`) VALUES
(1, 12, 1, 18, 'Dokumen Dinas PU', 'phpeYkmWo', 0, '2022-09-23 17:02:17', '2022-09-24 23:10:15'),
(2, 1, 4, 21, 'Dokumen Dinas Pendidikan', '1663996823_299ee6f175e6f5412e76.pdf', 0, '2022-09-23 17:20:23', '2022-09-24 23:11:08'),
(3, 4, 6, 12, 'Dokumen Kebijakan', '1664164927_69482502c798a1eed293.pdf', 0, '2022-09-25 16:02:07', '2022-09-25 16:02:07'),
(4, 4, 7, 3, 'E-Arsip Dokumen', '1664164989_47c88a2fbdffede838d7.pdf', 0, '2022-09-25 16:03:09', '2022-09-25 16:03:09'),
(5, 5, 10, 17, 'Dokumen Pemilihan Umum', '1664165031_0695600e1c148b9a4b94.jpg', 0, '2022-09-25 16:03:51', '2022-09-25 16:03:51'),
(6, 5, 11, 14, 'Dokumen Organisasasi Kemasyarakatan', '1664165092_909d08368c67ebf959df.png', 0, '2022-09-25 16:04:52', '2022-09-25 16:04:52');

-- --------------------------------------------------------

--
-- Table structure for table `ref_bidang`
--

CREATE TABLE `ref_bidang` (
  `bidang_id` int(11) NOT NULL,
  `bidang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_bidang`
--

INSERT INTO `ref_bidang` (`bidang_id`, `bidang`) VALUES
(1, 'Bidang A Tok'),
(2, 'Bidang B aja'),
(4, 'Bidang D'),
(5, 'Bidang E'),
(6, 'Bidang F'),
(8, 'Bidang H'),
(11, 'Bidang C'),
(12, 'Bidang satu lagi'),
(13, 'Bidang Satu');

-- --------------------------------------------------------

--
-- Table structure for table `ref_instansi`
--

CREATE TABLE `ref_instansi` (
  `instansi_id` int(11) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `daerah` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_instansi`
--

INSERT INTO `ref_instansi` (`instansi_id`, `instansi`, `daerah`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'FOCUS TECHNO MEDIA JOGJA', 'DAERAH ISTIMEWA JOGJAKARTA', 'Jl. Perumnas No. 83 Catur Tunggal Depok Sleman Yogyakarta', '2022-09-01 08:37:56', '2022-09-11 20:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `ref_klasifikasi`
--

CREATE TABLE `ref_klasifikasi` (
  `klasifikasi_id` int(11) NOT NULL,
  `kode_klasifikasi` varchar(10) NOT NULL,
  `klasifikasi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_klasifikasi`
--

INSERT INTO `ref_klasifikasi` (`klasifikasi_id`, `kode_klasifikasi`, `klasifikasi`) VALUES
(1, '000', 'Umum'),
(3, '100', 'Pemerintahan'),
(4, '200', 'Politik'),
(5, '300', 'Keamanan Ketertiban'),
(6, '400', 'Kesejahteraan Rakyat'),
(7, '500', 'Perekonomian'),
(8, '600', 'Pekerjaan Umum dan Ketenagaan'),
(9, '700', 'Pengawasan'),
(10, '800', 'Kepegawaian'),
(11, '900', 'Keuangan'),
(12, '201', 'Kebijaksanaan umum'),
(13, '210', 'Kepartaian'),
(14, '220', 'Organisasi Kemasyarakatan'),
(15, '230', 'Organisasi Profesi dan Fungsional'),
(16, '240', 'Organisasi Pemuda'),
(17, '270', 'Pemilihan Umum'),
(18, '301', 'Penertiban PKL dan Bangunan Liar'),
(19, '302', 'Penertiban  Warung Remang-remang'),
(20, '303', 'Penertiban Gepeng'),
(21, '304', 'Penertiban Parkir Kendaraan Liar'),
(22, '310', 'Pertahanan'),
(23, '311', 'Darat'),
(24, '312', 'Laut'),
(25, '313', 'Udara'),
(26, '350', 'Kejahatan'),
(27, '360', 'Bencana'),
(28, '361', 'Gunung berapi/gempa'),
(29, '362', 'Banjir/tanah longsor'),
(30, '364', 'Kebakaran');

-- --------------------------------------------------------

--
-- Table structure for table `ref_pengguna`
--

CREATE TABLE `ref_pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `role_id` int(3) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `aktif` char(5) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `ext` varchar(6) NOT NULL,
  `verifkasi` varchar(1) NOT NULL,
  `last_login` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB AVG_ROW_LENGTH=364 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ref_pengguna`
--

INSERT INTO `ref_pengguna` (`pengguna_id`, `role_id`, `username`, `password`, `aktif`, `foto`, `ext`, `verifkasi`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 1, 'dhani', NULL, NULL, NULL, '', '', '2022-09-21 09:54:48', '2022-09-20 21:54:48', '2022-09-20 21:54:48'),
(2, 2, 'artez', NULL, NULL, NULL, '', '', '2022-09-21 09:54:57', '2022-09-20 21:54:57', '2022-09-20 21:54:57'),
(3, 3, 'icha', NULL, NULL, NULL, '', '', '2022-09-21 09:55:10', '2022-09-20 21:55:10', '2022-09-20 21:55:10'),
(4, 4, 'purwono', NULL, NULL, NULL, '', '', '2022-09-21 09:55:29', '2022-09-20 21:55:20', '2022-09-20 21:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `ref_role`
--

CREATE TABLE `ref_role` (
  `role_id` int(11) NOT NULL,
  `nama_role` varchar(80) NOT NULL,
  `role` text DEFAULT NULL,
  `level` varchar(1) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=2730 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ref_role`
--

INSERT INTO `ref_role` (`role_id`, `nama_role`, `role`, `level`) VALUES
(1, 'Administrator', NULL, NULL),
(2, 'Operator Bidang A', NULL, NULL),
(3, 'Operator Bidang B', NULL, NULL),
(4, 'Operator Bidang C', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ref_subbidang`
--

CREATE TABLE `ref_subbidang` (
  `subbidang_id` int(11) NOT NULL,
  `bidang_id` int(11) NOT NULL,
  `subbidang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_subbidang`
--

INSERT INTO `ref_subbidang` (`subbidang_id`, `bidang_id`, `subbidang`) VALUES
(1, 8, 'Sub Bidang subH'),
(4, 2, 'Sub Bidang subB'),
(5, 1, 'Subidang A Tok'),
(6, 4, 'Sub Bidang D1'),
(7, 4, 'Sub Bidang D2'),
(8, 4, 'Sub Bidang D3'),
(9, 4, 'Sub Bidang D4'),
(10, 5, 'Sub Bidang E1'),
(11, 5, 'Sub Bidang E2');

-- --------------------------------------------------------

--
-- Table structure for table `ref_tahun`
--

CREATE TABLE `ref_tahun` (
  `tahun_id` int(11) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_tahun`
--

INSERT INTO `ref_tahun` (`tahun_id`, `tahun`, `created_at`, `updated_at`) VALUES
(1, '2022', '2022-09-05 09:10:22', '0000-00-00 00:00:00'),
(2, '2023', '2022-09-12 08:41:37', '2022-09-11 20:41:37'),
(3, '2024', '2022-09-12 08:43:19', '2022-09-11 20:43:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`dokumen_id`);

--
-- Indexes for table `ref_bidang`
--
ALTER TABLE `ref_bidang`
  ADD PRIMARY KEY (`bidang_id`);

--
-- Indexes for table `ref_instansi`
--
ALTER TABLE `ref_instansi`
  ADD PRIMARY KEY (`instansi_id`);

--
-- Indexes for table `ref_klasifikasi`
--
ALTER TABLE `ref_klasifikasi`
  ADD PRIMARY KEY (`klasifikasi_id`);

--
-- Indexes for table `ref_pengguna`
--
ALTER TABLE `ref_pengguna`
  ADD PRIMARY KEY (`pengguna_id`) USING BTREE,
  ADD KEY `id_pegawai` (`role_id`) USING BTREE,
  ADD KEY `id_role` (`role_id`) USING BTREE;

--
-- Indexes for table `ref_role`
--
ALTER TABLE `ref_role`
  ADD PRIMARY KEY (`role_id`) USING BTREE;

--
-- Indexes for table `ref_subbidang`
--
ALTER TABLE `ref_subbidang`
  ADD PRIMARY KEY (`subbidang_id`);

--
-- Indexes for table `ref_tahun`
--
ALTER TABLE `ref_tahun`
  ADD PRIMARY KEY (`tahun_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `dokumen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ref_bidang`
--
ALTER TABLE `ref_bidang`
  MODIFY `bidang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ref_instansi`
--
ALTER TABLE `ref_instansi`
  MODIFY `instansi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ref_klasifikasi`
--
ALTER TABLE `ref_klasifikasi`
  MODIFY `klasifikasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `ref_pengguna`
--
ALTER TABLE `ref_pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ref_role`
--
ALTER TABLE `ref_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ref_subbidang`
--
ALTER TABLE `ref_subbidang`
  MODIFY `subbidang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ref_tahun`
--
ALTER TABLE `ref_tahun`
  MODIFY `tahun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
