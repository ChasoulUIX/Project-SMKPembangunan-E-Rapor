-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 08, 2024 at 03:55 AM
-- Server version: 8.0.40-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erapor_smk_pembangunan_bogor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('murid','guru','wali','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `nip`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(7, '111', 'admin', '111@gmail.com', '$2y$12$8c/hG/biMQJaaZi4MM5fSOnfamaaHXxsjWB/Y4Zl6UMfv3XB0tjku', 'admin', '2024-12-07 20:37:30', '2024-12-07 20:37:30');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_mapel`
--

CREATE TABLE `daftar_mapel` (
  `id` bigint UNSIGNED NOT NULL,
  `id_kelas` bigint UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_wali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_guru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daftar_siswa` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daftar_mapel`
--

INSERT INTO `daftar_mapel` (`id`, `id_kelas`, `nama_kelas`, `nama_wali`, `jurusan`, `nama_guru`, `nama_mapel`, `daftar_siswa`, `created_at`, `updated_at`) VALUES
(35, 19, 'X-1', '200', 'Multimedia', '200', 'INDONESIA', '[\"{\\\"id\\\":\\\"22\\\",\\\"nis\\\":\\\"300\\\",\\\"name\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\"]', '2024-12-07 20:52:33', '2024-12-07 20:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_nilai`
--

CREATE TABLE `daftar_nilai` (
  `id` int NOT NULL,
  `id_Wali` varchar(255) NOT NULL,
  `nama_wali` varchar(255) NOT NULL,
  `id_matapelajaran` varchar(255) NOT NULL,
  `nama_pelajaran` varchar(255) NOT NULL,
  `id_guru` varchar(255) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `daftar_siswa` text NOT NULL,
  `nilai_harian1` int NOT NULL,
  `nilai_harian2` int NOT NULL,
  `nilai_harian3` int NOT NULL,
  `nilai_harian4` int NOT NULL,
  `nilai_harian5` int NOT NULL,
  `rata_rata` int NOT NULL,
  `uts` int NOT NULL,
  `uas` int NOT NULL,
  `kehadiran` int NOT NULL,
  `sikap` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_siswa`
--

CREATE TABLE `daftar_siswa` (
  `id` bigint UNSIGNED NOT NULL,
  `id_kelas` int NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wali_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daftar_siswa` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daftar_siswa`
--

INSERT INTO `daftar_siswa` (`id`, `id_kelas`, `nama_kelas`, `nip`, `wali_kelas`, `jurusan`, `daftar_siswa`, `created_at`, `updated_at`) VALUES
(22, 19, 'X-1', '200', '200', 'Multimedia', '[{\"id\": \"22\", \"nis\": \"300\", \"name\": \"300\", \"nisn\": \"300\"}]', '2024-12-07 20:52:27', '2024-12-07 20:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gurus`
--

CREATE TABLE `gurus` (
  `id` bigint UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('murid','guru','wali','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'guru',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gurus`
--

INSERT INTO `gurus` (`id`, `nip`, `name`, `email`, `password`, `gender`, `birth_place`, `birth_date`, `address`, `phone_number`, `photo`, `role`, `created_at`, `updated_at`) VALUES
(25, '200', '200', '200@gmail.com', '$2y$12$qgUtgAhCsHZ2NXEI.50IKesorYwi.Kry0oypYLUW1wNikqaxfjnea', 'L', '200', '2024-12-09', '200', '200', '/images/1733629847.jpg', 'wali', '2024-12-07 20:50:48', '2024-12-07 20:51:15'),
(26, '201', '201', '201@gmail.com', '$2y$12$NwyTHkeD6U2Eryeasr3rYeUuAPgsZHluf5s7djPEr/J4FoGk2F/PC', 'L', '201', '2024-12-11', '201', '201', '/images/1733629865.jpg', 'guru', '2024-12-07 20:51:05', '2024-12-07 20:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wali_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daftar_siswa` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `wali_kelas`, `jurusan`, `daftar_siswa`, `created_at`, `updated_at`) VALUES
(19, 'X-1', '200', 'Multimedia', NULL, '2024-12-07 20:51:27', '2024-12-07 20:51:27');

-- --------------------------------------------------------

--
-- Table structure for table `matapelajarans`
--

CREATE TABLE `matapelajarans` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` int NOT NULL,
  `nama_guru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daftar_siswa` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matapelajarans`
--

INSERT INTO `matapelajarans` (`id`, `kode_mapel`, `nama_mapel`, `nip`, `nama_guru`, `kategori`, `daftar_siswa`, `created_at`, `updated_at`) VALUES
(29, 'A9870', 'INDONESIA', 200, '200', 'umum', NULL, '2024-12-07 20:51:39', '2024-12-07 20:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2024_12_03_084919_create_gurus_table', 1),
(4, '2024_12_03_084919_create_murids_table', 1),
(5, '2024_12_03_084919_create_walis_table', 1),
(6, '2024_12_03_084920_create_admins_table', 1),
(7, '2024_12_03_090217_create_sessions_table', 1),
(8, '2024_12_03_091025_create_users_table', 1),
(9, '2024_12_03_122515_create_matapealjarans_table', 1),
(10, '2024_12_03_125039_create_kelas_table', 1),
(11, '2024_12_04_093402_create_daftar_siswa_table', 2),
(12, '2024_12_04_164959_create_daftar_nilai_table', 3),
(13, '2024_12_05_030706_create_daftar_mapel_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `murids`
--

CREATE TABLE `murids` (
  `id` bigint UNSIGNED NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `major` enum('multimedia','akuntansi','perkantoran','pemasaran') COLLATE utf8mb4_unicode_ci NOT NULL,
  `academic_year` int NOT NULL,
  `semester` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('murid','guru','wali','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'murid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `murids`
--

INSERT INTO `murids` (`id`, `nis`, `nisn`, `name`, `email`, `password`, `gender`, `birth_place`, `birth_date`, `address`, `phone_number`, `father_name`, `mother_name`, `parent_phone`, `parent_address`, `class`, `major`, `academic_year`, `semester`, `photo`, `role`, `created_at`, `updated_at`) VALUES
(22, '300', '300', '300', '300@gmail.com', '$2y$12$N1iiSWWX6VkbQx.9mHEpEOTsNTnfsqQZP9SAF/4yywMkE7Omz4eAi', 'L', '300', '2024-12-16', '300', '300', '300', '300', '300', '300', 'X-1', 'multimedia', 300, '1', NULL, 'murid', '2024-12-07 20:52:00', '2024-12-07 20:52:10'),
(23, '301', '301', '301', '301@gmail.com', '$2y$12$LdhkS2DHJA6.VVJ2GCfHk.ZQ/9rubVONtCu7Q6Kd6sEwlOwoMzgfK', 'L', '301', '2024-12-09', '301', '301', '301', '301301', '301', NULL, 'X-1', 'multimedia', 301, '1', '/images/1733630060.jpg', 'murid', '2024-12-07 20:54:21', '2024-12-07 20:54:21');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_siswa`
--

CREATE TABLE `nilai_siswa` (
  `id` int NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `id_kelas` int NOT NULL,
  `nis` int NOT NULL,
  `nama_siswa` text NOT NULL,
  `nama_wali` varchar(255) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `nama_materi_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `materi_1` varchar(255) NOT NULL,
  `nama_materi_2` varchar(255) NOT NULL,
  `materi_2` varchar(255) NOT NULL,
  `nama_materi_3` varchar(255) NOT NULL,
  `materi_3` varchar(255) NOT NULL,
  `nama_materi_4` varchar(255) NOT NULL,
  `materi_4` varchar(255) NOT NULL,
  `nama_materi_5` varchar(255) NOT NULL,
  `materi_5` varchar(255) NOT NULL,
  `na_materi` int NOT NULL,
  `uts` int NOT NULL,
  `uas` int NOT NULL,
  `kehadiran` int NOT NULL,
  `sikap` int NOT NULL,
  `nilai_rapor` int NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nilai_siswa`
--

INSERT INTO `nilai_siswa` (`id`, `nama_kelas`, `id_kelas`, `nis`, `nama_siswa`, `nama_wali`, `nama_guru`, `nama_mapel`, `nama_materi_1`, `materi_1`, `nama_materi_2`, `materi_2`, `nama_materi_3`, `materi_3`, `nama_materi_4`, `materi_4`, `nama_materi_5`, `materi_5`, `na_materi`, `uts`, `uas`, `kehadiran`, `sikap`, `nilai_rapor`, `updated_at`, `created_at`) VALUES
(30, 'X-1', 19, 300, '300', '200', '200', 'INDONESIA', 'ini', '100', '0', '0', '0', '0', '0', '0', '0', '0', 20, 0, 0, 0, 0, 8, '2024-12-07 20:52:58', '2024-12-07 20:52:48'),
(31, 'X-1', 19, 301, '301', '200', '200', 'INDONESIA', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, '2024-12-07 20:54:42', '2024-12-07 20:54:42');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('mX7ZhIkxZBnk1Fas2BSeOn6LJK4chcfCYNwS6RCw', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYURvcUNZbmZ3R215SnB4RW5iWnZZbEdVMDFNd0M4MTUzOU5rblN6OCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1733630092);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('murid','guru','wali','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'murid',
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `nip`, `nis`, `phone`, `address`, `avatar`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(49, 'admin', '111@gmail.com', '$2y$12$f5m6QATw6yEOln.rhtGukuOcSN7Vb5ZjTmpi1daJftD7RdkI0jU82', 'admin', '111', NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-07 20:37:30', '2024-12-07 20:37:30', NULL),
(53, '200', '200@gmail.com', '$2y$12$qgUtgAhCsHZ2NXEI.50IKesorYwi.Kry0oypYLUW1wNikqaxfjnea', 'wali', '200', NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-07 20:50:48', '2024-12-07 20:51:15', NULL),
(54, '201', '201@gmail.com', '$2y$12$NwyTHkeD6U2Eryeasr3rYeUuAPgsZHluf5s7djPEr/J4FoGk2F/PC', 'guru', '201', NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-07 20:51:05', '2024-12-07 20:51:05', NULL),
(55, '300', '300@gmail.com', '$2y$12$N1iiSWWX6VkbQx.9mHEpEOTsNTnfsqQZP9SAF/4yywMkE7Omz4eAi', 'murid', NULL, '300', NULL, NULL, NULL, NULL, NULL, '2024-12-07 20:52:00', '2024-12-07 20:52:00', NULL),
(56, '301', '301@gmail.com', '$2y$12$LdhkS2DHJA6.VVJ2GCfHk.ZQ/9rubVONtCu7Q6Kd6sEwlOwoMzgfK', 'murid', NULL, '301', NULL, NULL, NULL, NULL, NULL, '2024-12-07 20:54:21', '2024-12-07 20:54:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `walis`
--

CREATE TABLE `walis` (
  `id` bigint UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('murid','guru','wali','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'wali',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `walis`
--

INSERT INTO `walis` (`id`, `nip`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(20, '200', '200', '200@gmail.com', '$2y$12$qgUtgAhCsHZ2NXEI.50IKesorYwi.Kry0oypYLUW1wNikqaxfjnea', 'wali', '2024-12-07 20:51:15', '2024-12-07 20:51:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_nip_unique` (`nip`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `daftar_mapel`
--
ALTER TABLE `daftar_mapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daftar_mapel_id_kelas_foreign` (`id_kelas`);

--
-- Indexes for table `daftar_nilai`
--
ALTER TABLE `daftar_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_siswa`
--
ALTER TABLE `daftar_siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wali_kelas` (`wali_kelas`),
  ADD UNIQUE KEY `id_kelas` (`id_kelas`),
  ADD UNIQUE KEY `id_wali` (`nip`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gurus_nip_unique` (`nip`),
  ADD UNIQUE KEY `gurus_email_unique` (`email`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matapelajarans`
--
ALTER TABLE `matapelajarans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matapelajarans_kode_mapel_unique` (`kode_mapel`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `murids`
--
ALTER TABLE `murids`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `murids_nis_unique` (`nis`),
  ADD UNIQUE KEY `murids_nisn_unique` (`nisn`),
  ADD UNIQUE KEY `murids_email_unique` (`email`);

--
-- Indexes for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nip_unique` (`nip`),
  ADD UNIQUE KEY `users_nis_unique` (`nis`);

--
-- Indexes for table `walis`
--
ALTER TABLE `walis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `walis_nip_unique` (`nip`),
  ADD UNIQUE KEY `walis_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `daftar_mapel`
--
ALTER TABLE `daftar_mapel`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `daftar_nilai`
--
ALTER TABLE `daftar_nilai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `daftar_siswa`
--
ALTER TABLE `daftar_siswa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `matapelajarans`
--
ALTER TABLE `matapelajarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `murids`
--
ALTER TABLE `murids`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `walis`
--
ALTER TABLE `walis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar_mapel`
--
ALTER TABLE `daftar_mapel`
  ADD CONSTRAINT `daftar_mapel_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
