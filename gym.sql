-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2025 at 08:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_latihan`
--

CREATE TABLE `kategori_latihan` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_latihan`
--

INSERT INTO `kategori_latihan` (`id_kategori`, `nama_kategori`, `deskripsi`, `gambar`) VALUES
(10, 'Lengan Atas', 'Kategori Lengan Atas berfokus pada penguatan otot-otot bagian atas tubuh, terutama biceps, triceps, dan bahu. Latihan pada kategori ini membantu meningkatkan kekuatan, daya tahan, serta bentuk otot lengan agar lebih proporsional dan seimbang.', '1762031870_download (1).jpg'),
(11, 'Kaki', 'rea ini dirancang khusus untuk melatih kekuatan, daya tahan, dan stabilitas otot kaki. Dengan berbagai peralatan modern seperti leg press, squat rack, hamstring curl, calf raise, dan dumbbell set, setiap latihan dapat disesuaikan dengan tingkat kemampuan anggota, mulai dari pemula hingga profesional.', '1762059458_young-man-making-sport-exercises-home.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `komentar` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `latihan`
--

CREATE TABLE `latihan` (
  `id_latihan` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_latihan` varchar(100) NOT NULL,
  `gambar1` varchar(255) DEFAULT NULL,
  `gambar2` varchar(255) DEFAULT NULL,
  `gambar3` varchar(255) DEFAULT NULL,
  `gambar4` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `step` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `latihan`
--

INSERT INTO `latihan` (`id_latihan`, `id_kategori`, `nama_latihan`, `gambar1`, `gambar2`, `gambar3`, `gambar4`, `video`, `deskripsi`, `step`) VALUES
(8, 10, 'Triceps', '1762061085_9ef303d8aa70a7750d93df68c947b645_6ad0537f-1b04-42d1-8131-a630f2cd5dc6.webp', '', '', '', '1762032220_Ltihan Tricep.mp4', 'Latihan ini berfokus pada penguatan dan pembentukan otot triceps yang terletak di bagian belakang lengan atas. Triceps berperan penting dalam gerakan mendorong, stabilisasi bahu, dan memberikan bentuk lengan yang lebih tegas serta proporsional.', 'Posisi Awal: Berdiri tegak, siku di samping tubuh, pegang beban dengan mantap.\r\nDorong: Luruskan lengan untuk mengaktifkan otot triceps.\r\nTahan: Saat lengan lurus, tahan 1–2 detik untuk kontraksi maksimal.\r\nKembali: Turunkan beban perlahan ke posisi awal dengan kontrol.'),
(9, 11, 'Latihan Kaki', '1762059766_low-angle-man-training-gym.jpg', '1762059766_young-man-making-sport-exercises-home (1).jpg', '', '', '1762059766_Latihan Kaki.mp4', 'Area ini dirancang khusus untuk melatih kekuatan, daya tahan, dan stabilitas otot kaki. Dengan berbagai peralatan modern seperti leg press, squat rack, hamstring curl, calf raise, dan dumbbell set, setiap latihan dapat disesuaikan dengan tingkat kemampuan anggota, mulai dari pemula hingga profesional.', 'Berdiri tegak, \r\nkaki selebar bahu, \r\nturunkan badan seperti duduk di kursi, \r\nlalu kembali ke posisi awal.');

-- --------------------------------------------------------

--
-- Table structure for table `latihan_offline`
--

CREATE TABLE `latihan_offline` (
  `id_latihan_offline` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_pelatih` int(11) NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `latihan_selesai`
--

CREATE TABLE `latihan_selesai` (
  `id` int(11) NOT NULL,
  `id_member` int(11) DEFAULT NULL,
  `id_program` int(11) DEFAULT NULL,
  `id_latihan` int(11) DEFAULT NULL,
  `tanggal_selesai` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_latihan`
--

CREATE TABLE `log_latihan` (
  `id_log` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_latihan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `berat` int(11) DEFAULT 0,
  `reps` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `foto_profile` varchar(255) DEFAULT 'default.png',
  `tanggal_daftar` datetime DEFAULT current_timestamp(),
  `level` int(11) DEFAULT 1,
  `streak_hari` int(11) DEFAULT 0,
  `last_login` datetime DEFAULT NULL,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nama`, `email`, `password`, `google_id`, `foto_profile`, `tanggal_daftar`, `level`, `streak_hari`, `last_login`, `status`) VALUES
(37, 'Ahmad Farhannudin', 'ahfan969@gmail.com', NULL, '111538402219395146986', 'https://lh3.googleusercontent.com/a/ACg8ocJYG49HVQ_AbFbfacR9eIW78DEiGXOU_pnvphEzu5JjbpF_y3Ku=s96-c', '2025-11-22 13:44:22', 1, 10, '2025-11-24 13:12:26', 'aktif'),
(38, 'Ahmad Farhan', 'rawot75090@gmail.com', NULL, '114279380281375307059', 'https://lh3.googleusercontent.com/a/ACg8ocLpIiQDhD1s-RnbGp3HPYGuixbbt_NHvYePrBYEb4FMt0_EhA=s96-c', '2025-11-22 13:51:19', 1, 2, '2025-11-23 14:23:16', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pelatih`
--

CREATE TABLE `pelatih` (
  `id_pelatih` int(11) NOT NULL,
  `nama_pelatih` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `spesialisasi` varchar(100) DEFAULT NULL,
  `pengalaman_tahun` int(11) DEFAULT NULL,
  `jadwal_available` text DEFAULT NULL,
  `foto_pelatih` varchar(255) DEFAULT NULL,
  `status` enum('Aktif','Nonaktif') DEFAULT 'Aktif',
  `tanggal_ditambahkan` datetime DEFAULT current_timestamp(),
  `kuota` int(11) DEFAULT 0,
  `tempat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelatih`
--

INSERT INTO `pelatih` (`id_pelatih`, `nama_pelatih`, `jenis_kelamin`, `no_telepon`, `email`, `alamat`, `spesialisasi`, `pengalaman_tahun`, `jadwal_available`, `foto_pelatih`, `status`, `tanggal_ditambahkan`, `kuota`, `tempat`) VALUES
(29, 'Brad Schoenfeld', 'Laki-laki', '08979299872', 'BradSchoenfeld@gmail.com', 'Francis', 'back dumbell', 30, '2026-01-01 12:00, 2026-01-02 12:00, 2026-01-03 12:00, 2026-01-04 12:00, 2025-12-24 12:00', '1763447407_brad-schoenfeld_orig-3750025.webp', 'Aktif', '2025-11-18 13:29:57', 5, 'Bandung utb'),
(30, 'Shaun Stafford', 'Laki-laki', '08979299872', 'ShaunStafford@gmail.com', 'Spanyol', 'Bicep', 5, '2025-12-31 12:00, 2025-12-30 12:00, 2026-04-30 12:00, 2026-04-29 12:00, 2026-04-28 12:00', '1763447617_shaun-stafford-personal-trainer-3750242.webp', 'Aktif', '2025-11-18 13:33:13', 10, 'Bandung utb'),
(31, ' Kebugaran CSS', 'Laki-laki', '08979299872', 'KebugaranCSS@gmail.com', 'Los angeles', 'Latihan Kaki', 15, '2026-02-28 12:00, 2026-02-27 12:00, 2026-02-26 12:00', '1763447807_chris-sutcliffe-css-fitness-3750412.webp', 'Aktif', '2025-11-18 13:36:38', 10, 'Bandung utb');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id_program` int(11) NOT NULL,
  `nama_program` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `durasi` int(11) DEFAULT NULL,
  `level` varchar(50) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id_program`, `nama_program`, `deskripsi`, `durasi`, `level`, `thumbnail`, `video`) VALUES
(16, 'Latihan Kaki', 'Area ini dirancang khusus untuk melatih kekuatan, daya tahan, dan stabilitas otot kaki.', 2, 'Pemula', '1762060722_low-angle-man-training-gym.jpg', '1763967225_Latihan Kaki (1) (1) (1) (1).mp4'),
(17, 'Tricep', 'Latihan Tangan', 2, 'Lanjut', '1762061053_9ef303d8aa70a7750d93df68c947b645_6ad0537f-1b04-42d1-8131-a630f2cd5dc6.webp', '1763967506_Ltihan Tricep (1) (1) (1).mp4'),
(18, 'back dumbell', 'meningkatan otot punggung', 2, 'Menengah', '1763446186_back.jpg', '1763966857_Latihan Back (1).mp4'),
(19, 'Bicep', 'Bicep adalah latihan otot besar yang berada di bagian depan lengan atas', 1, 'Pemula', '1763446359_bicep.jfif', '1763965934_Latihan Bicep (1).mp4');

-- --------------------------------------------------------

--
-- Table structure for table `program_latihan`
--

CREATE TABLE `program_latihan` (
  `id_program_latihan` int(11) NOT NULL,
  `id_program` int(11) DEFAULT NULL,
  `id_latihan` int(11) DEFAULT NULL,
  `minggu` int(11) DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `sets` int(11) DEFAULT 3,
  `reps` int(11) DEFAULT 10,
  `rest_time` int(11) DEFAULT 60
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_latihan`
--

INSERT INTO `program_latihan` (`id_program_latihan`, `id_program`, `id_latihan`, `minggu`, `hari`, `urutan`, `sets`, `reps`, `rest_time`) VALUES
(21, 16, 9, 1, 'Minggu', 1, 2, 10, 20);

-- --------------------------------------------------------

--
-- Table structure for table `program_member`
--

CREATE TABLE `program_member` (
  `id_program_member` int(11) NOT NULL,
  `id_program` int(11) DEFAULT NULL,
  `id_member` int(11) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `progress` float DEFAULT 0,
  `tanggal_selesai` datetime DEFAULT NULL,
  `status` enum('aktif','selesai') DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_member`
--

INSERT INTO `program_member` (`id_program_member`, `id_program`, `id_member`, `tanggal_mulai`, `progress`, `tanggal_selesai`, `status`) VALUES
(8, 10, 1, '2025-10-30', 0, NULL, 'aktif'),
(9, 14, 3, '2025-11-01', 50, NULL, 'aktif'),
(10, 10, 3, '2025-11-01', 0, NULL, 'aktif'),
(11, 14, 4, '2025-11-01', 100, '2025-11-01 05:14:32', 'selesai'),
(12, 10, 4, '2025-11-01', 0, NULL, 'aktif'),
(13, 10, 5, '2025-11-01', 0, NULL, 'aktif'),
(14, 14, 5, '2025-11-01', 40, NULL, 'aktif'),
(15, 14, 9, '2025-11-02', 100, '2025-11-02 04:43:28', 'selesai'),
(16, 15, 9, '2025-11-02', 0, NULL, 'aktif'),
(17, 17, 9, '2025-11-02', 0, NULL, 'aktif'),
(18, 16, 9, '2025-11-02', 100, '2025-11-02 12:42:04', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_latihan`
--

CREATE TABLE `riwayat_latihan` (
  `id_riwayat` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_latihan` int(11) NOT NULL,
  `id_program_member` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `berat` float DEFAULT 0,
  `reps` int(11) DEFAULT 0,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `kategori_latihan`
--
ALTER TABLE `kategori_latihan`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `latihan`
--
ALTER TABLE `latihan`
  ADD PRIMARY KEY (`id_latihan`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `latihan_offline`
--
ALTER TABLE `latihan_offline`
  ADD PRIMARY KEY (`id_latihan_offline`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_pelatih` (`id_pelatih`);

--
-- Indexes for table `latihan_selesai`
--
ALTER TABLE `latihan_selesai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_latihan`
--
ALTER TABLE `log_latihan`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_latihan` (`id_latihan`),
  ADD KEY `fk_log_member` (`id_member`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pelatih`
--
ALTER TABLE `pelatih`
  ADD PRIMARY KEY (`id_pelatih`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `program_latihan`
--
ALTER TABLE `program_latihan`
  ADD PRIMARY KEY (`id_program_latihan`),
  ADD KEY `id_program` (`id_program`),
  ADD KEY `id_latihan` (`id_latihan`);

--
-- Indexes for table `program_member`
--
ALTER TABLE `program_member`
  ADD PRIMARY KEY (`id_program_member`);

--
-- Indexes for table `riwayat_latihan`
--
ALTER TABLE `riwayat_latihan`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_latihan` (`id_latihan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori_latihan`
--
ALTER TABLE `kategori_latihan`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `latihan`
--
ALTER TABLE `latihan`
  MODIFY `id_latihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `latihan_offline`
--
ALTER TABLE `latihan_offline`
  MODIFY `id_latihan_offline` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `latihan_selesai`
--
ALTER TABLE `latihan_selesai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_latihan`
--
ALTER TABLE `log_latihan`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `pelatih`
--
ALTER TABLE `pelatih`
  MODIFY `id_pelatih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `program_latihan`
--
ALTER TABLE `program_latihan`
  MODIFY `id_program_latihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `program_member`
--
ALTER TABLE `program_member`
  MODIFY `id_program_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `riwayat_latihan`
--
ALTER TABLE `riwayat_latihan`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `latihan`
--
ALTER TABLE `latihan`
  ADD CONSTRAINT `latihan_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_latihan` (`id_kategori`) ON DELETE CASCADE;

--
-- Constraints for table `latihan_offline`
--
ALTER TABLE `latihan_offline`
  ADD CONSTRAINT `latihan_offline_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`),
  ADD CONSTRAINT `latihan_offline_ibfk_2` FOREIGN KEY (`id_pelatih`) REFERENCES `pelatih` (`id_pelatih`);

--
-- Constraints for table `log_latihan`
--
ALTER TABLE `log_latihan`
  ADD CONSTRAINT `fk_log_member` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE CASCADE,
  ADD CONSTRAINT `log_latihan_ibfk_1` FOREIGN KEY (`id_latihan`) REFERENCES `latihan` (`id_latihan`) ON DELETE CASCADE;

--
-- Constraints for table `program_latihan`
--
ALTER TABLE `program_latihan`
  ADD CONSTRAINT `program_latihan_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `program` (`id_program`),
  ADD CONSTRAINT `program_latihan_ibfk_2` FOREIGN KEY (`id_latihan`) REFERENCES `latihan` (`id_latihan`);

--
-- Constraints for table `riwayat_latihan`
--
ALTER TABLE `riwayat_latihan`
  ADD CONSTRAINT `riwayat_latihan_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE CASCADE,
  ADD CONSTRAINT `riwayat_latihan_ibfk_2` FOREIGN KEY (`id_latihan`) REFERENCES `latihan` (`id_latihan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
