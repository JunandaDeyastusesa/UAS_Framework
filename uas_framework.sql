-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2024 at 11:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_framework`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensis`
--

CREATE TABLE `absensis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) DEFAULT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `barang_baik` int(11) DEFAULT NULL,
  `barang_rusak` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `ruangan_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `nama`, `barang_baik`, `barang_rusak`, `deskripsi`, `ruangan_id`) VALUES
(1, 'Kursi Siswa', 20, 10, 'Sasa', 1),
(2, 'Kursi Siswa', 12, 0, 'SAsas', 1),
(3, 'Papan Tulis', 2, 0, 'Baik Semua', 3);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gurus`
--

CREATE TABLE `gurus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_guru` bigint(20) DEFAULT NULL,
  `kelas_id` varchar(255) DEFAULT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gurus`
--

INSERT INTO `gurus` (`id`, `id_guru`, `kelas_id`, `nama_guru`, `tgl_lahir`, `no_telp`, `agama`, `jenis_kelamin`, `jabatan`, `foto`, `created_at`, `updated_at`) VALUES
(2, 444, 'Kelas 3', 'fdsds', '2024-06-04', '2323', 'Budha', 'Laki-laki', 'Kepala Sekolah', '1717437969.png', '2024-06-03 11:06:09', '2024-06-07 05:07:32'),
(3, 1212, '9', '1212', '2024-06-07', '098756431234', 'Islam', 'Perempuan', 'Kepala Sekolah', '1717760017.PNG', '2024-06-07 04:33:37', '2024-06-07 05:08:39'),
(6, 333, '6', 'Nur Kotijah', '2024-06-07', '082312327654', 'Islam', 'Perempuan', 'Guru Pelajaran', '1717761314.png', '2024-06-07 04:55:14', '2024-06-07 04:55:14'),
(7, 543, '8', 'Sandy', '2024-06-07', '097567567567', 'Islam', 'Laki-laki', 'Kepala Sekolah', '1717778014.PNG', '2024-06-07 09:33:34', '2024-06-07 09:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `angka_kelas` varchar(255) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `angka_kelas`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(13, '1', 'Kelas 1', NULL, NULL),
(14, '2', 'Kelas 2', NULL, NULL),
(15, '3', 'Kelas 3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_14_083000_create_kelas_table', 2),
(10, '2024_05_29_065923_create_ruangans_table', 3),
(11, '2024_05_29_070219_create_barangs_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ruangans`
--

CREATE TABLE `ruangans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `lantai` enum('Lantai 1','Lantai 2','Lantai 3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruangans`
--

INSERT INTO `ruangans` (`id`, `nama`, `deskripsi`, `lantai`) VALUES
(1, 'Ruang Kelas 1', 'DDD', 'Lantai 1'),
(3, 'Ruang Kelas 1', 'Ruangan Kelas 1 Lantai 2', 'Lantai 2'),
(6, 'Ruang Kelas 2', 'R2', 'Lantai 1'),
(7, 'Ruang Kelas 3', 'R3', 'Lantai 1'),
(8, 'Ruang Kelas 5', NULL, 'Lantai 1');

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NISN` bigint(20) DEFAULT NULL,
  `NIS` int(11) DEFAULT NULL,
  `kelas_id` varchar(255) DEFAULT NULL,
  `foto_siswa` varchar(255) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki','Perempuan') NOT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `tempat` varchar(255) DEFAULT NULL,
  `anak_ke` int(11) DEFAULT NULL,
  `wali_siswa` varchar(255) NOT NULL,
  `semester` enum('Semester 1','Semester 2','') NOT NULL DEFAULT 'Semester 1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`id`, `NISN`, `NIS`, `kelas_id`, `foto_siswa`, `nama_siswa`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `tempat`, `anak_ke`, `wali_siswa`, `semester`, `created_at`, `updated_at`) VALUES
(7, 333, 333, '10', '1717746830.PNG', '333', '2024-06-07', 'Laki', '33', '333', 3, '33', 'Semester 2', '2024-06-07 00:53:50', '2024-06-09 02:51:54'),
(8, 222, 222, '10', '1717747142.png', '222', '2024-06-07', 'Laki', '222', '222', 2, 'Nur', 'Semester 2', '2024-06-07 00:59:02', '2024-06-09 02:51:54'),
(9, 123, 123, '10', '1717758042.png', '1233', '2024-06-07', 'Laki', 'Islam', 'Surabaya', 1, 'Saya', 'Semester 1', '2024-06-07 04:00:42', '2024-06-09 02:51:54'),
(10, 444, 444, '10', '1717781900.png', 'Juna', '2024-06-08', 'Laki', 'Islam', 'Surabaya', 1, 'Juna2', 'Semester 1', '2024-06-07 10:38:20', '2024-06-09 02:51:54'),
(11, 555, 555, '10', '1717782672.PNG', 'Sasa', '2024-06-08', 'Laki', 'yty', 'ytyt', 1, 'yty', 'Semester 1', '2024-06-07 10:51:12', '2024-06-09 02:51:54'),
(12, 666, 666, '10', '1717782927.png', '666', '2024-06-08', 'Laki', '666', '666', 6, '666', 'Semester 1', '2024-06-07 10:55:27', '2024-06-09 02:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Juna', 'juna@gmail.com', NULL, '$2y$12$StZGtuRr8Ao3GMic90m2keFwCUIYOTePSM2oWFucrBTajISw772au', NULL, '2024-06-07 23:56:23', '2024-06-07 23:56:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensis`
--
ALTER TABLE `absensis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangs_ruangan_id_foreign` (`ruangan_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ruangans`
--
ALTER TABLE `ruangans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensis`
--
ALTER TABLE `absensis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ruangans`
--
ALTER TABLE `ruangans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangs`
--
ALTER TABLE `barangs`
  ADD CONSTRAINT `barangs_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangans` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
