-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 31, 2025 at 11:05 AM
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
-- Database: `rapor_smk_pembangunan_bogor`
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
(9, '123', 'Pak Wira', 'pakwira@gmail.com', '$2y$12$ayQX97HkICTh7yMF2kn3Ze2jHi4Za2Mpo0drEtUqRQVvd9LUppvW2', 'admin', '2025-01-11 01:58:30', '2025-01-11 01:58:30'),
(10, '200708051976', 'Wira Indrayana, S.Kom.', 'wiraindrayana@gmail.com', '$2y$12$iGIygYDKtKN5D8845nG7heNP7eTHJ9RG3MAT7bLqQ1VJumMWsyTjK', 'admin', '2025-01-11 02:00:26', '2025-01-11 02:00:26');

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
  `daftar_siswa` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `daftar_mapel`
--

INSERT INTO `daftar_mapel` (`id`, `id_kelas`, `nama_kelas`, `nama_wali`, `jurusan`, `nama_guru`, `nama_mapel`, `daftar_siswa`, `created_at`, `updated_at`) VALUES
(59, 22, 'X-13 (X-DKV-1)', 'WIRA INDRAYANA, S.KOM.', 'Desain Komunikasi Visual', 'MAFTUHATUN SAOMI, S.PD.', 'Bahasa Indonesia', '[\"{\\\"id\\\":\\\"78\\\",\\\"name\\\":\\\"ADINDA PUTRI KANIA\\\",\\\"nis\\\":\\\"2425120201\\\",\\\"nisn\\\":\\\"0083660779\\\"}\",\"{\\\"id\\\":\\\"79\\\",\\\"name\\\":\\\"AHMAD FAUZAN KHOERI\\\",\\\"nis\\\":\\\"2425120202\\\",\\\"nisn\\\":\\\"0096356338\\\"}\"]', '2025-01-22 02:27:32', '2025-01-22 02:27:32'),
(60, 22, 'X-13 (X-DKV-1)', 'WIRA INDRAYANA, S.KOM.', 'Desain Komunikasi Visual', 'SITI MUSYARIFAH, A.MD.', 'Dasar-Dasar Desain Komunikasi Visual', '[\"{\\\"id\\\":\\\"78\\\",\\\"name\\\":\\\"ADINDA PUTRI KANIA\\\",\\\"nis\\\":\\\"2425120201\\\",\\\"nisn\\\":\\\"0083660779\\\"}\"]', '2025-01-22 02:28:20', '2025-01-22 02:28:20'),
(61, 22, 'X-13 (X-DKV-1)', 'WIRA INDRAYANA, S.KOM.', 'Desain Komunikasi Visual', 'SANDI JEMBAR WIJAYA, S.PD.', 'Seni', '[\"{\\\"id\\\":\\\"78\\\",\\\"name\\\":\\\"ADINDA PUTRI KANIA\\\",\\\"nis\\\":\\\"2425120201\\\",\\\"nisn\\\":\\\"0083660779\\\"}\",\"{\\\"id\\\":\\\"79\\\",\\\"name\\\":\\\"AHMAD FAUZAN KHOERI\\\",\\\"nis\\\":\\\"2425120202\\\",\\\"nisn\\\":\\\"0096356338\\\"}\"]', '2025-01-22 02:29:07', '2025-01-22 02:29:07'),
(62, 22, 'X-13 (X-DKV-1)', 'WIRA INDRAYANA, S.KOM.', 'Desain Komunikasi Visual', 'RIA ARNAS, S.I.KOM.', 'Informatika', '[\"{\\\"id\\\":\\\"78\\\",\\\"name\\\":\\\"ADINDA PUTRI KANIA\\\",\\\"nis\\\":\\\"2425120201\\\",\\\"nisn\\\":\\\"0083660779\\\"}\",\"{\\\"id\\\":\\\"79\\\",\\\"name\\\":\\\"AHMAD FAUZAN KHOERI\\\",\\\"nis\\\":\\\"2425120202\\\",\\\"nisn\\\":\\\"0096356338\\\"}\"]', '2025-01-22 02:29:16', '2025-01-22 02:29:16'),
(63, 22, 'X-13 (X-DKV-1)', 'WIRA INDRAYANA, S.KOM.', 'Desain Komunikasi Visual', 'WIRA INDRAYANA, S.KOM.', 'teknik informatika', '[\"{\\\"id\\\":\\\"78\\\",\\\"name\\\":\\\"ADINDA PUTRI KANIA\\\",\\\"nis\\\":\\\"2425120201\\\",\\\"nisn\\\":\\\"0083660779\\\"}\",\"{\\\"id\\\":\\\"79\\\",\\\"name\\\":\\\"AHMAD FAUZAN KHOERI\\\",\\\"nis\\\":\\\"2425120202\\\",\\\"nisn\\\":\\\"0096356338\\\"}\",\"{\\\"id\\\":\\\"80\\\",\\\"name\\\":\\\"ALJIDAN RIZKIANTO\\\",\\\"nis\\\":\\\"2425120203\\\",\\\"nisn\\\":\\\"0085337354\\\"}\"]', '2025-01-22 21:27:56', '2025-01-22 21:27:56'),
(64, 22, 'X-13 (X-DKV-1)', 'WIRA INDRAYANA, S.KOM.', 'Desain Komunikasi Visual', 'SANDI JEMBAR WIJAYA, S.PD.', 'Seni', '[\"{\\\"id\\\":\\\"78\\\",\\\"name\\\":\\\"ADINDA PUTRI KANIA\\\",\\\"nis\\\":\\\"2425120201\\\",\\\"nisn\\\":\\\"0083660779\\\"}\",\"{\\\"id\\\":\\\"79\\\",\\\"name\\\":\\\"AHMAD FAUZAN KHOERI\\\",\\\"nis\\\":\\\"2425120202\\\",\\\"nisn\\\":\\\"0096356338\\\"}\",\"{\\\"id\\\":\\\"80\\\",\\\"name\\\":\\\"ALJIDAN RIZKIANTO\\\",\\\"nis\\\":\\\"2425120203\\\",\\\"nisn\\\":\\\"0085337354\\\"}\"]', '2025-01-22 23:54:35', '2025-01-22 23:54:35'),
(65, 22, 'X-13 (X-DKV-1)', 'WIRA INDRAYANA, S.KOM.', 'Desain Komunikasi Visual', 'WIRA INDRAYANA, S.KOM.', 'sunda', '[\"{\\\"id\\\":\\\"78\\\",\\\"name\\\":\\\"ADINDA PUTRI KANIA\\\",\\\"nis\\\":\\\"2425120201\\\",\\\"nisn\\\":\\\"0083660779\\\"}\",\"{\\\"id\\\":\\\"79\\\",\\\"name\\\":\\\"AHMAD FAUZAN KHOERI\\\",\\\"nis\\\":\\\"2425120202\\\",\\\"nisn\\\":\\\"0096356338\\\"}\",\"{\\\"id\\\":\\\"80\\\",\\\"name\\\":\\\"ALJIDAN RIZKIANTO\\\",\\\"nis\\\":\\\"2425120203\\\",\\\"nisn\\\":\\\"0085337354\\\"}\"]', '2025-01-22 23:54:42', '2025-01-22 23:54:42'),
(66, 22, 'X-13 (X-DKV-1)', 'WIRA INDRAYANA, S.KOM.', 'Desain Komunikasi Visual', 'WIRA INDRAYANA, S.KOM.', 'indonesia', '[\"{\\\"id\\\":\\\"78\\\",\\\"name\\\":\\\"ADINDA PUTRI KANIA\\\",\\\"nis\\\":\\\"2425120201\\\",\\\"nisn\\\":\\\"0083660779\\\"}\",\"{\\\"id\\\":\\\"79\\\",\\\"name\\\":\\\"AHMAD FAUZAN KHOERI\\\",\\\"nis\\\":\\\"2425120202\\\",\\\"nisn\\\":\\\"0096356338\\\"}\",\"{\\\"id\\\":\\\"80\\\",\\\"name\\\":\\\"ALJIDAN RIZKIANTO\\\",\\\"nis\\\":\\\"2425120203\\\",\\\"nisn\\\":\\\"0085337354\\\"}\"]', '2025-01-22 23:54:53', '2025-01-22 23:54:53');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_nilai`
--

CREATE TABLE `daftar_nilai` (
  `id` int NOT NULL,
  `id_Wali` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_wali` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_matapelajaran` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pelajaran` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_guru` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_guru` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `daftar_siswa` text COLLATE utf8mb4_general_ci NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `daftar_siswa` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `daftar_siswa`
--

INSERT INTO `daftar_siswa` (`id`, `id_kelas`, `nama_kelas`, `nip`, `wali_kelas`, `jurusan`, `daftar_siswa`, `created_at`, `updated_at`) VALUES
(26, 22, 'X-13 (X-DKV-1)', 'G014', 'WIRA INDRAYANA, S.KOM.', 'Desain Komunikasi Visual', '[{\"id\":\"78\",\"name\":\"ADINDA PUTRI KANIA\",\"nis\":\"2425120201\",\"nisn\":\"0083660779\"},{\"id\":\"79\",\"name\":\"AHMAD FAUZAN KHOERI\",\"nis\":\"2425120202\",\"nisn\":\"0096356338\"},{\"id\":\"80\",\"name\":\"ALJIDAN RIZKIANTO\",\"nis\":\"2425120203\",\"nisn\":\"0085337354\"}]', '2025-01-22 02:27:12', '2025-01-22 02:30:29');

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
(30, 'G014', 'WIRA INDRAYANA, S.KOM.', 'wiraindrayana@gmail.com', '$2y$12$tREthQ6DbqZgfxeHbGnSIOAiagdgqtPB8W6yfIbwa/BFHjM/Nqafq', 'L', 'Bogor', '1976-08-05', 'SMKS Pembangunan Kota Bogor, Jalan Raya Pajajaran No. 63 Kota Bogor', '081388074721', '', 'wali', '2025-01-11 02:02:10', '2025-01-22 02:37:10'),
(31, 'G060', 'WAHYU JULIANA SAPUTRO, S.PD.I', 'wahyujuliana@gmail.com', '$2y$12$/Ie4JWZ9AzyKnNJKtqb/MOKQEy6Gr/WWalJnyqLvBrqAmXUUAZh/i', 'L', 'Bogor', '1991-01-05', 'Bogor', '+62 877-7695-4886', '', 'guru', '2025-01-11 02:10:37', '2025-01-11 02:10:37'),
(32, 'G016', 'MAFTUHATUN SAOMI, S.PD.', 'maftuhatun@gmail.com', '$2y$12$wfoXSzlP6CE6yt7hM4AOUuED5IBdI5h9pN7AsGHpwz3W8T/2VyzWC', 'P', 'Bogor', '1990-01-02', 'Bogor', '+62 858-9088-6047', '', 'guru', '2025-01-11 02:12:24', '2025-01-11 02:12:24'),
(33, 'G072', 'SANDY FATAH PAMUNGKAS, S.PD.', 'sandyfatah@gmail.com', '$2y$12$YSvmAe8B2FenXmz6XJZFM.HeFfLoyMG30wmNviSmtHnmpOEXMHKPC', 'L', 'Bogor', '1995-01-02', 'Bogor', '+62 895-3234-93803', '', 'guru', '2025-01-11 02:13:39', '2025-01-11 02:13:39'),
(34, 'G051', 'MOHAMMAD FAJAR', 'fajar@gmail.com', '$2y$12$IscXzFxPxHoIhXSjrD.Yp.jC1BaI5zcp3XTPWMCKrxBgxPZcHOhOG', 'L', 'Bogor', '1999-01-05', 'Bogor', '+62 895-2710-6822', '', 'guru', '2025-01-11 02:15:22', '2025-01-11 02:15:22'),
(35, 'G065', 'JEANYS ULFI PUTRI NURJANA, S.PD.', 'jeje@gmail.com', '$2y$12$0v7pAHUX0eUPCbVI8PbMT.7yYSZsufVDPLBVGeUq4LXxz5KW5wfVK', 'P', 'Wonogiri', '2000-01-02', 'Bogor', '+62 838-7617-4694', '', 'guru', '2025-01-11 02:16:35', '2025-01-11 02:16:35'),
(36, 'G042', 'IRSYAD GIOVANNI, M.T.', 'giovanni@gmail.com', '$2y$12$tIwMONw9OOTEoE0xvW0EUes/YNBl2z3P/5Mm/QHPJ2Y0XlJXR/Dfq', 'L', 'Bogor', '1999-01-02', 'Bogor', '+62 821-2179-2142', '', 'guru', '2025-01-11 02:18:32', '2025-01-11 02:18:32'),
(37, 'G037', 'MUHAMAD YUSUF ALBANA, S.PD.', 'albana@gmail.com', '$2y$12$yEDlbeYrFMs0AKX6xLGS0OZcE0s2hKjVdDBK/ythyIxELwxeA8Yd.', 'L', 'Bogor', '1980-01-02', 'Bogor', '+62 878-2082-5925', '', 'guru', '2025-01-11 02:20:03', '2025-01-11 02:20:03'),
(38, 'G028', 'RIA ARNAS, S.I.KOM.', 'riaarnas@gmail.com', '$2y$12$pPRUSlGPR9gvygsCKQQSb.Y0Wj4nhsUXalmOnj5Uh58qrTHXd8dLO', 'P', 'Bogor', '1988-01-02', 'Bogor', '+62 858-1174-2685', '', 'wali', '2025-01-11 02:21:22', '2025-01-22 02:44:38'),
(39, 'G026', 'NUR KAMILA SALDIANA, S.T.', 'kamila@gmail.com', '$2y$12$A3onZWLXILLy39rYuP/fV.2DayqBbt.Cz6EJ/kAgH8C.uevPIiAI.', 'P', 'Bogor', '1992-01-02', 'Bogor', '+62 857-7091-7568', '', 'guru', '2025-01-11 02:22:44', '2025-01-11 02:22:44'),
(40, 'G025', 'SITI MUSYARIFAH, A.MD.', 'sitimusya@gmail.com', '$2y$12$XaV1enqqAqbe9rnxvAgDC..8NhqOASwtML80aR6KJyXgZ4zGVhjz2', 'P', 'Bogor', '1990-01-02', 'Bogor', '+62 896-3104-8483', '', 'guru', '2025-01-11 02:23:58', '2025-01-11 02:23:58'),
(41, 'G073', 'ANITA DZIKRIKA', 'anita@gmail.com', '$2y$12$6SlJ..nwCnE2KNRSutTCROSzulYo4GqlPlIB06X1Zke4xDJqlLh6.', 'P', 'Bogor', '2002-01-02', 'Bogor', '+62 896-3813-2703', '', 'guru', '2025-01-11 02:25:12', '2025-01-21 23:18:06'),
(42, 'G050', 'SANDI JEMBAR WIJAYA, S.PD.', 'sandi@gmail.com', '$2y$12$WXguxITk95S91PghJ7hva.DxTYzf39WHFhaMMpJJmFzuryqtaGORu', 'L', 'Bogor', '1999-01-02', 'Bogor', '+62 857-2374-4643', '', 'guru', '2025-01-11 03:00:31', '2025-01-21 23:30:23');

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
  `daftar_siswa` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `wali_kelas`, `jurusan`, `daftar_siswa`, `created_at`, `updated_at`) VALUES
(22, 'X-13 (X-DKV-1)', 'WIRA INDRAYANA, S.KOM.', 'Desain Komunikasi Visual', NULL, '2025-01-11 02:26:19', '2025-01-22 02:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `matapelajarans`
--

CREATE TABLE `matapelajarans` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_guru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daftar_siswa` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `matapelajarans`
--

INSERT INTO `matapelajarans` (`id`, `kode_mapel`, `nama_mapel`, `nip`, `nama_guru`, `kategori`, `daftar_siswa`, `created_at`, `updated_at`) VALUES
(51, 'A4869', 'Pendidikan Agama dan Budi Pekerti', 'G060', 'WAHYU JULIANA SAPUTRO, S.PD.I', 'umum', NULL, '2025-01-11 02:53:10', '2025-01-22 01:18:44'),
(52, 'A6565', 'Pendidikan Pancasila', 'G072', 'SANDY FATAH PAMUNGKAS, S.PD.', 'umum', NULL, '2025-01-11 02:58:46', '2025-01-11 02:58:46'),
(53, 'A8678', 'Bahasa Indonesia', 'G016', 'MAFTUHATUN SAOMI, S.PD.', 'umum', NULL, '2025-01-11 02:59:04', '2025-01-11 02:59:04'),
(54, 'A3872', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 'G051', 'MOHAMMAD FAJAR', 'umum', NULL, '2025-01-11 02:59:19', '2025-01-11 02:59:19'),
(55, 'A7154', 'Sejarah', 'G065', 'JEANYS ULFI PUTRI NURJANA, S.PD.', 'umum', NULL, '2025-01-11 02:59:33', '2025-01-11 02:59:33'),
(56, 'A7896', 'Seni', 'G050', 'SANDI JEMBAR WIJAYA, S.PD.', 'umum', NULL, '2025-01-11 03:00:48', '2025-01-11 03:00:48'),
(57, 'A2496', 'Matematika', 'G042', 'IRSYAD GIOVANNI, M.T.', 'kejuruan', NULL, '2025-01-11 03:01:05', '2025-01-11 03:01:05'),
(58, 'A7066', 'Bahasa Inggris', 'G037', 'MUHAMAD YUSUF ALBANA, S.PD.', 'kejuruan', NULL, '2025-01-11 03:01:57', '2025-01-11 03:01:57'),
(59, 'A5293', 'Informatika', 'G028', 'RIA ARNAS, S.I.KOM.', 'kejuruan', NULL, '2025-01-11 03:02:07', '2025-01-11 03:02:07'),
(60, 'A5570', 'Ilmu Pengetahuan Alam dan Sosial', 'G026', 'NUR KAMILA SALDIANA, S.T.', 'kejuruan', NULL, '2025-01-11 03:02:37', '2025-01-11 03:02:37'),
(61, 'A3589', 'Dasar-Dasar Desain Komunikasi Visual', 'G025', 'SITI MUSYARIFAH, A.MD.', 'kejuruan', NULL, '2025-01-11 03:02:52', '2025-01-11 03:02:52'),
(62, 'A6059', 'Bahasa Sunda', 'G073', 'ANITA DZIKRIKA', 'lokal', NULL, '2025-01-11 03:03:03', '2025-01-21 23:37:46'),
(63, 'A5016', 'teknik informatika', 'G014', 'WIRA INDRAYANA, S.KOM.', 'kejuruan', NULL, '2025-01-22 21:27:20', '2025-01-22 21:27:20'),
(64, 'A7497', 'indonesia', 'G014', 'WIRA INDRAYANA, S.KOM.', 'umum', NULL, '2025-01-22 23:53:58', '2025-01-22 23:53:58'),
(65, 'A3516', 'sunda', 'G014', 'WIRA INDRAYANA, S.KOM.', 'lokal', NULL, '2025-01-22 23:54:10', '2025-01-22 23:54:10');

-- --------------------------------------------------------

--
-- Table structure for table `materi_pelajarans`
--

CREATE TABLE `materi_pelajarans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_guru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materi_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `materi_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `materi_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `materi_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `materi_5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materi_pelajarans`
--

INSERT INTO `materi_pelajarans` (`id`, `nama_guru`, `nama_mapel`, `materi_1`, `materi_2`, `materi_3`, `materi_4`, `materi_5`, `created_at`, `updated_at`) VALUES
(5, 'RIA ARNAS, S.I.KOM.', 'Informatika', 'web1', 'web2', 'web3', 'web4', 'web5', '2025-01-22 02:35:28', '2025-01-22 02:35:28'),
(6, 'WIRA INDRAYANA, S.KOM.', 'teknik informatika', '1', '2', '3', '4', '5', '2025-01-22 23:53:28', '2025-01-22 23:53:28');

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
  `major` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(78, '2425120201', '0083660779', 'ADINDA PUTRI KANIA', '2425120201@gmail.com', '$2y$12$eDY0JO9sIwzgN6nek9OwaOYXNpmEq4DmPfu/RO2jEkydBrSw2PNo.', 'P', 'Jakarta, 05 Oktober 2008', '2025-01-22', 'Pesona Cilebut 2 No 18 Rt 006/015 Kel. Cilebut Barat Kec. Sukaraja Kab. Bogor', '08176595355', 'MUHAMAD MUCHLIS', 'MARDIANA', '-', 'Pesona Cilebut 2 No 18 Rt 006/015 Kel. Cilebut Barat Kec. Sukaraja Kab. Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:06', '2025-01-22 01:36:03'),
(79, '2425120202', '0096356338', 'AHMAD FAUZAN KHOERI', '2425120202@gmail.com', '$2y$12$TDh8l24Vuu.37ooYLOub0O9gplysOhuS1u2kJu/1btxl0l.hvh.f2', 'L', 'Bogor, 02 Januari 2009', '2025-01-22', 'Babakan Rt 001/008 Kel. Cimahpar Kec. Bogor Utara Kota Bogor', '1', 'SUGIMO', 'SULASTRI', '-', 'Babakan Rt 001/008 Kel. Cimahpar Kec. Bogor Utara Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '2', '', 'murid', '2025-01-22 00:26:06', '2025-01-22 01:33:27'),
(80, '2425120203', '0085337354', 'ALJIDAN RIZKIANTO', '2425120203@gmail.com', '$2y$12$feZCclyt1xjCySVfateOPe29ItIx6pOFv/cw3YiEjBo6K0xiHoeVW', 'L', 'Bogor, 09 Oktober 2008', '2025-01-22', 'Ciwaringin Tanah Sewa Rt.3 Rw.2 Kel. Cibogor Kec. Bogor Tengah Kota Bogor', '08988406883', 'ANDRI YANTO', 'DINI AISYAH', '-', 'Ciwaringin Tanah Sewa Rt.3 Rw.2 Kel. Cibogor Kec. Bogor Tengah Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '2', '', 'murid', '2025-01-22 00:26:06', '2025-01-22 01:33:36'),
(81, '2425120204', '0084878867', 'ANDHIKA DWI RAHMADI', '2425120204@gmail.com', '$2y$12$ykW1He0prHYkbc46X0XH1ubVqSNLkimgHXJtoKWfUbgS2H02Wq9Wq', 'L', 'Jakarta, 07 Mei 2008', '2025-01-22', 'Mulyaharja Rt 002/009 Kel. Mulyaharja Kec. Bogor Selatan Kota Bogor', '0895386678413', 'EKO RAHMADI', 'JUMIYATI', '-', 'Mulyaharja Rt 002/009 Kel. Mulyaharja Kec. Bogor Selatan Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '2', '', 'murid', '2025-01-22 00:26:07', '2025-01-22 01:33:47'),
(82, '2425120205', '0092879325', 'AZZAHRA ADELYA HARUM', '2425120205@gmail.com', '$2y$12$lG6/.jN3lumFjWQypxVJQOdBuy3/fgVl9zXuF.rf6HWupkmxBM1QC', 'P', 'Bogor, 27 Juni 2009', '2025-01-22', 'Batu Tapak Rt.3 Rw.3 Kel. Pasir Jaya Kec. Bogor Barat Kota Bogor', '082219191966', 'SUBAGIO', 'YAYU VERAWATI', '-', 'Batu Tapak Rt.3 Rw.3 Kel. Pasir Jaya Kec. Bogor Barat Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '2', '', 'murid', '2025-01-22 00:26:07', '2025-01-22 01:33:55'),
(83, '2425120206', '0091050471', 'BILLAL ABDI NEGARA', '2425120206@gmail.com', '$2y$12$0faY8hdrmHENwJ2FFCjG4eO6ixdCqGX0MwQb2ar8oMohLhdeQ6.a2', 'L', 'Bogor, 07 Januari 2009', '2025-01-22', 'Kedung Halang Wesel Rt. 1 Rw. 3 Kel. Sukaresmi Kec. Tanah Sareal Kota Bogor', '085714661760', 'HERRY DIPO PRAHORO', 'YETTY HERAWATI', '-', 'Kedung Halang Wesel Rt.2 Rw. 3 Kel. Sukaresmi Kec. Tanah Sareal Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:07', '2025-01-22 01:36:09'),
(84, '2425120207', '0087522523', 'DENI PIRMANSYAH', '2425120207@gmail.com', '$2y$12$UyUFqqt8FeFvmSsAuzXGGeNrwF/McXHMu2uKad.iLKAgGH6e02Mya', 'L', 'Bogor, 10 Oktober 2008', '2025-01-22', 'Kp Pondok Bitung Rt 001/001 Kel. Sukaharja Kec. Cijeruk Kab Bogor', '-', 'NANDAR HIDAYAT', 'YULIATI', '-', 'Kp Pondok Bitung Rt 001/001 Kel. Sukaharja Kec. Cijeruk Kab Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '2', '', 'murid', '2025-01-22 00:26:08', '2025-01-22 01:33:14'),
(85, '2425120208', '0093238709', 'DEVAN ALVIANSYAH', '2425120208@gmail.com', '$2y$12$S79sxfja5bzF/F8QG.orjuFlyCdGXCQPz.7nsqtHqoXfrFFPQzQxe', 'L', 'Bogor, 16 Januari 2009', '2025-01-22', 'Ciburial Indah Rt 003/004 Kel. Baranangsiang Kec. Bogor Timur Kota Bogor', '085719424301', 'DUDI SUPRIATNA', 'MILAWATI', '-', 'Ciburial Indah Rt 003/004 Kel. Baranangsiang Kec. Bogor Timur Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:08', '2025-01-22 01:36:15'),
(86, '2425120209', '0086181585', 'DEVINA PUTRI KHAIRAAN', '2425120209@gmail.com', '$2y$12$UmEzohSFKkW.E4YMmvPopOZB3I.m82iT7cuigG1Kyl9GisgZR4kIa', 'P', 'Bogor, 15 Oktober 2008', '2025-01-22', 'Cilendek Timur Rt 003/006 Kel. Cilendek Timur Kec. Bogor Barat Kota Bogor', '085717389309', 'RUSNADI', 'ELA RAHMAWATY', '-', 'Cilendek Timur Rt 003/006 Kel. Cilendek Timur Kec. Bogor Barat Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:08', '2025-01-22 01:36:20'),
(87, '2425120210', '0089070852', 'DHAVIZA AZHAR LINTALANA', '2425120210@gmail.com', '$2y$12$uRIdUNSG/CTlw2eCKLL.u.cDzVWzYjBJ6/76kScyCrGZ/dx2Ek5zS', 'L', 'Bogor, 04 Desember 2008', '2025-01-22', 'Jl. Cimanggu Bharata Pura Rt 005/004 Kel. Kedung Badak Kec. Tanah Sareal Kota Bogor', '085893753717', 'ASEP AWALUDIN', 'HILDA SRI ANGGRAINI', '-', 'Jl Cimanggu Bharata Pura Rt 005/004 Kel. Kedung Badak Kec. Tanah Sareal Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:09', '2025-01-22 01:36:26'),
(88, '2425120211', '0096442716', 'FAARIS RIFQI ATSIILAH', '2425120211@gmail.com', '$2y$12$vh87e62B18b/Y5Wnlrivo.wGCeTSQh6id9KC/iIeYBq/1N622/UFe', 'L', 'Bogor, 21 Juni 2009', '2025-01-22', 'Kp Mandalasari Rt 002/003 Kel. Cimandala Kec. Sukaraja Kab. Bogor', '085780107690', 'SAMSURI', 'SUKARTI', '-', 'Kp Mandalasari Rt 002/003 Kel. Cimandala Kec. Sukaraja Kab. Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:09', '2025-01-22 01:36:33'),
(89, '2425120212', '0084713656', 'FATHUR RAHMAN AZ ZAKI', '2425120212@gmail.com', '$2y$12$5YOelk40Nj/WYHK8rxtHz.BpqmHSI3RT4cFGoKi7kQe0s99N0vC/C', 'L', 'Bogor, 14 Mei 2008', '2025-01-22', 'Bantarjati Lebak Rt.02 Rw.01 No 21 Kel.Bantarjati, Kec. Bogor Utara Kota Bogor', '087770666504', 'MULYANA', 'LISMAYANTI', '-', 'Kp. Kertasari, Rt 003/003 Kel. Bojongrangkas Kec. Ciampea Kab. Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:09', '2025-01-22 01:36:40'),
(90, '2425120213', '3087065279', 'FAUZAN ABDURAHMAN', '2425120213@gmail.com', '$2y$12$cfbEx7focu0k6IWRS7zSfuv/1jNz34caZeHm5pWBlkhXH0QFsP5n6', 'L', 'Bogor, 29 Oktober 2008', '2025-01-22', 'Kp. Kabandungan Rt 002/008 Kel. Sirnagalih Kec. Tamansari Kab. Bogor', '083811489343', 'ACEP ABDURAHMAN', 'NIHLA', '-', 'Kp Kabandungan Rt 002/008 Kel. Sirnagalih Kec. Tamansari Kab. Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:10', '2025-01-22 01:36:49'),
(91, '2425120214', '0088483731', 'FERDY ALDIANSYAH', '2425120214@gmail.com', '$2y$12$NNn9Sd04molgjf77iyDqBeRMEOsFRQEmtpWi7RuvzgrXWZ2cbGSg6', 'L', 'Bogor, 11 Oktober 2008', '2025-01-22', 'Kp. Rambay Rt 004/006 Kel. Ciluar Kec. Bogor Utara Kota Bogor', '082110206344', 'EDI REYNALDI', 'FITRI YULIANINGSIH', '-', 'Kp Rambay Rt 004/006 Kel. Ciluar Kec. Bogor Utara Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:10', '2025-01-22 01:36:55'),
(92, '2425120215', '0086664995', 'FIRLI FAUZI SUPARMAN', '2425120215@gmail.com', '$2y$12$1YqGuLxC3JmUvvk/QBhPdeAtB/D2X0.i0J4x93F5U8GpR0rEMAFte', 'L', 'Sukabumi, 19 Desember 2008', '2025-01-22', 'Kp. Tenjoayu Rt 002/002 Kel. Tenjoayu Kec. Cicurug Kab Sukabumi', '081388155443', 'HA FAUZI SUPARMAN', 'NENG LEILI', '-', 'Kp Tenkoayu Rt 002/002 Kel. Tenjoayu Kec. Cicurug Kab Sukabumi', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:10', '2025-01-22 01:37:02'),
(93, '2425120216', '0089218493', 'GALANG GUMELAR', '2425120216@gmail.com', '$2y$12$TjVmrnjYSGLtSIAZRa/SQ.0FFMZK6IgD81AABhoqnTi.ykk9VZOo.', 'L', 'Bogor, 02 Juli 2008', '2025-01-22', 'Cijujung Tengah Rt. 5/4 Kel. Cijujung Kec. Sukaraja Kab. Bogor', '087770264934', 'HILMI MUBAROK', 'RUSNAWATI', '-', 'Cijujung Rt 005/004 Kel. Cijujung Kec. Sukaraja Kab. Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:11', '2025-01-22 01:37:09'),
(94, '2425120217', '0073989323', 'HAFIIZH SALLAMUDIIN', '2425120217@gmail.com', '$2y$12$NkRuZr53VzkItF7BR9ClQ.MhBxgMuFlt9fFB9eDRqX9u5DwSVRXMG', 'L', 'Bogor, 15 Oktober 2007', '2025-01-22', 'Kedung Badak Rt.4 Rw.2 Kel. Kedng Badak Kec. Tanah Sareal Kota Bogor', '081210261334', 'SAMSUL BAHRI', 'SITI DAYI ROSMINI', '-', 'Kedung Badak Rt.4 Rw.2 Kel. Kedng Badak Kec. Tanah Sareal Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:11', '2025-01-22 01:37:16'),
(95, '2425120218', '0096035742', 'I GUSTI NYOMAN M. HAZMAN ZUL QISTHI', '2425120218@gmail.com', '$2y$12$vdAUfnGjmVLnIEcXxCJS2eG4TuJdSDbra.veYqtVC8ECOrlT4Klqq', 'L', 'Bogor, 25 Februari 2009', '2025-01-22', 'Cimanggu Gg Mantri Guru Rt 004/001 Kel. Kedung Jaya Kec. Tanah Sareal Kota Bogor', '085718107482', 'I GUSTI PUTU NGURAH BAGUS SUYASE', 'TETY HERYATI', '-', 'Cimanggu Gg Mantri Guru Rt 004/001 Kel. Kedung Jaya Kec. Tanah Sareal Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:11', '2025-01-22 01:37:22'),
(96, '2425120219', '0091142480', 'KENZO MAHARDHIKA FEBRIANO', '2425120219@gmail.com', '$2y$12$2sDMzvL0jJdWN.PGymdjbe8y.8qU8PNdCyFSiLs1Md3MqOSWxB9.q', 'L', 'Tangerang, 22 Februari 2009', '2025-01-22', 'Jl. Bougenville Blok Z 8 No 1B Rt 001/008 Taman Cimanggu Kel. Kedung Waringin Kec. Tanah Sareal Bogor', '08159897992', 'AHMAD MUKHTHOHID', 'HERMARITA CHANDRASARI', '-', 'Jl Bougenville Blok Z 8 No 1B Rt 001/008 Kel. Kedung Waringin Kec. Tanah Sareal Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:12', '2025-01-22 01:37:29'),
(97, '2425120220', '0097077021', 'MUHAMAD AL RADZIB', '2425120220@gmail.com', '$2y$12$viLUUZECFSLIUP07nERPk.jJMxjfW8tEqhhClFgwFT2A5ECPzSgnK', 'L', 'Kota Bogor, 04 Mei 2009', '2025-01-22', 'Balubur Rt 004/005 Kel. Muarasari Kec. Bogor Selatan Kota Bogor', '-', 'MUHAMAD SAIPUL ROHMAN', 'NURJANAH', '-', 'Balubur Rt 004/005 Kel. Muarasari Kec. Bogor Selatan Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:12', '2025-01-22 01:37:44'),
(98, '2425120221', '0094386896', 'MUHAMMAD ALFIANSAH', '2425120221@gmail.com', '$2y$12$d2b8Pv8xTSM3lqiE2fY5F.o4O0vCejQYcdG9VJwOjx6tPfLZfIBvK', 'L', 'Bogor, 11 Juni 2009', '2025-01-22', 'Kp Cibitung Rt 001/006 Kel. Gunung Malang Kec. Tenjolaya Kab. Bogor', '085894734312', 'PURWADI', 'IDA', '-', 'Kp Cibitung Rt 001/006 Kel. Gunung Malang Kec. Tenjolaya Kab. Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:12', '2025-01-22 01:37:51'),
(99, '2425120222', '0082147339', 'MUHAMMAD BARRU HAIKAL', '2425120222@gmail.com', '$2y$12$MYLNWXlKRn0cYhEClJ6FjeOvhb1zeaZ2la9AWEfCvCh7Wag3vGp0K', 'L', 'Bogor, 08 Oktober 2008', '2025-01-22', 'Kp Bojong Gede Rt.1 Rw.13 Kel. Bojong Gede Kec. Bojong Gede Kab. Bogor', '08975003877', 'ADI CAHYADI', 'MARLINA', '-', 'Kp Bojong Gede Rt.1 Rw.13 Kel. Bojong Gede Kec. Bojong Gede Kab. Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:12', '2025-01-22 01:37:58'),
(100, '2425120223', '0081128677', 'MUHAMMAD DENIS MAULANA', '2425120223@gmail.com', '$2y$12$pyNVBbDyYbcmTxHGIpwvK.4TOFDFTfcicrQq3ovTQnUQ0SrTckli.', 'L', 'Bogor, 26 Desember 2008', '2025-01-22', 'Kp Kawung Luwuk Rt 003/001 Kel. Tegal Gundil Kec. Bogor Utara Kota Bogor', '087803534778', 'YANA MAULANA', 'AAH', '-', 'Kp Kawung Luwuk Rt 003/001 Kel. Tegal Gundil Kec. Bogor Utara Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:13', '2025-01-22 01:38:03'),
(101, '2425120224', '3098835586', 'MUHAMMAD FABYAN NURIL GUNAWAN', '2425120224@gmail.com', '$2y$12$Qbo.WT2rBec1x5r8znqWUuqrEMsTQiFoDBQZLyhIX2iLgz07UTIcW', 'L', 'Bogor, 26 Januari 2009', '2025-01-22', 'Kp Warung Loa Rt 001/012 Kel. Sukaluyu Kec. Tamansari Kab. Bogor', '08580446936', 'HENDRI GUNAWAN', 'SUMIATI', '-', 'Kp Warung Loa Rt 001/012 Kel. Sukaluyu Kec. Tamansari Kab. Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:13', '2025-01-22 01:38:09'),
(102, '2425120225', '0098450112', 'MUHAMAD IHZA AZHARI ZULPA', '2425120225@gmail.com', '$2y$12$0hXJqV.Lji1ilfVYjTtP/uffHWZkvjD2h7XlCXn.7L8UtpnE7Mk16', 'L', 'Montong Dao, 21 Maret 2009', '2025-01-22', 'Cibedug Pabuaran Rt.1 Rw.4 Kel. Sukatani Kec. Sukaraja Kab. Bogor', '081286669251', 'ZULPAN JIHADI', 'PARNAWATI', '-', 'Cibedug Pabuaran Rt.1 Rw.4 Kel. Sukatani Kec. Sukaraja Kab. Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:13', '2025-01-22 02:13:12'),
(103, '2425120226', '0091199908', 'MUHAMMAD JABBAR EL BARRIE', '2425120226@gmail.com', '$2y$12$bGQ8C0w.ztw7v7fK4DmzPOzqMyC1tbulj6G4ejdcEU2v4y/mic3Wm', 'L', 'Bogor, 28 April 2009', '2025-01-22', 'Komp Abri Sukasari No 74 Rt 003/003 Kel. Lawanggintung Kec. Bogor Selatan Kota Bogor', '085891004543', 'ACEP YUDI HENDARTO', 'SRI RAHAYU', '-', 'Komp Abri Sukasari No 74 Rt 003/003 Kel. Lawanggintung Kec. Bogor Selatan Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:14', '2025-01-22 02:13:20'),
(104, '2425120227', '0086564265', 'MUHAMMAD PARSAIZYAN', '2425120227@gmail.com', '$2y$12$JTbwKZJfOqBELmOSrLH06e/mFjQ.CKqG6OZFrmkpZdoa0BCQSHrQu', 'L', 'Bogor, 29 November 2008', '2025-01-22', 'Jl Cimanggu Kecil Rt 003/007 Kel. Ciwaringin Kec. Bogor Tengah Kota Bogor', '08561030685', 'INDRA LESMANA', 'EMI ILCHAMIYASNI', '-', 'Jl Cimanggu Kecil Rt 003/007 Kel. Ciwaringin Kec. Bogor Tengah Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:14', '2025-01-22 02:13:27'),
(105, '2425120228', '0086941962', 'MUHAMMAD RAFI HANGGARA', '2425120228@gmail.com', '$2y$12$V.DyV.6e9BQx7pSSDLiKJOyd33zSE2c2AkxgjsiYE3Muu8/1Z5.H2', 'L', 'Bogor, 24 November 2008', '2025-01-22', 'Cikaret Gg Kosasih Rt.2 Rw.12 Kel. Cikaret Kec. Bogor Selatan Kota Bogor', '085882363226', 'OSCAR PEDRO SATRIYADI', 'SEFTY MUHARYANI', '-', 'Cikaret Gg Kosasih Rt.2 Rw.12 Kel. Cikaret Kec. Bogor Selatan Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:14', '2025-01-22 02:13:35'),
(106, '2425120229', '0086197303', 'MUHAMMAD RAIN NAUFAL', '2425120229@gmail.com', '$2y$12$ixEYHx.VGcJVbFl0mZKGYuQ3n4an8D8fcCn6hNqqJhbqGtEIrSS7W', 'L', 'Bogor, 04 Desember 2008', '2025-01-22', 'Rancamaya Rt 002/008 Kel. Rancamaya Kec. Bogor Selatan Kota Bogor', '083807393212', 'SUKRIA', 'KARNELI', '-', 'Rancamaya Rt 002/008 Kel. Rancamaya Kec. Bogor Selatan Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:14', '2025-01-22 02:13:44'),
(107, '2425120230', '0099706257', 'MUHAMMAD REZQI PRATAMA', '2425120230@gmail.com', '$2y$12$sSC5N2T6gRmMvmtbNrIL9.rf9BcKeSB22Tme9r5zMglPPQxSwPQRq', 'L', 'Bogor, 04 Agustus 2009', '2025-01-22', 'Kp Cijulang Rt 001/009 Kel. Sukaharja Kec. Cijeruk Kab. Bogor', '-', 'ADE SUHENDAR', 'ADE SURYANI', '-', 'Kp Cijulang Rt 001/009 Kel. Sukaharja Kec. Cijeruk Kab. Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:15', '2025-01-22 02:13:54'),
(108, '2425120231', '3075235404', 'MUHAMMAD RIAL HENDRI WIJAYA', '2425120231@gmail.com', '$2y$12$8Deav7QckFkoF3MN7W.Y7uEIk6PljfMrmIvMaTXmr/qrjcsxeVFDK', 'L', 'Bogor, 29 Maret 2009', '2025-01-22', 'Kp Lebak Gudang Rt 003/011 Kel. Bendungan Kec. Ciawi Kab. Bogor', '087875791070', 'ANDRI WIJAYA', 'HENI HAERANI', '-', 'Kp Lebak Gudang Rt 003/011 Kel. Bendungan Kec. Ciawi Kab. Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:15', '2025-01-22 02:14:01'),
(109, '2425120232', '3094788188', 'MUHAMMAD RIDHO RAHMAWAN', '2425120232@gmail.com', '$2y$12$u4ZwZkEjKTQWHSnrcjtFB.EqeR3OobgKroZspWqEiXn/Cb2NgyAQq', 'L', 'Bogor, 25 Mei 2009', '2025-01-22', 'Jl Lodaya Ii Cilibende Rt 005/002 Kel. Babakan Kec. Bogor Tengah Kota Bogor', '0895621180104', 'AWAN KARYAWAN', 'RACHMI MULYATI', '-', 'Jl Lodaya Ii Cilibende Rt 005/002 Kel. Babakan Kec. Bogor Tengah Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:15', '2025-01-22 02:14:08'),
(110, '2425120233', '0098320568', 'NAJMI ABDUL HADI', '2425120233@gmail.com', '$2y$12$zyrmKeCh9jH5BkipKHCitelmwaZl/BjnlxKQQv6C5Y.RlwLrsPFAe', 'L', 'Bogor, 27 Maret 2009', '2025-01-22', 'Muara Rt 003/008 Kel. Pasir Jaya Kec. Bogor Barat Kota Bogor', '081574973170', 'BABAY WIRABAYA', 'ENING YUNENGSIH', '-', 'Muara Rt 003/008 Kel. Pasir Jaya Kec. Bogor Barat Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:15', '2025-01-22 02:14:16'),
(111, '2425120234', '0092396927', 'NAYSILA ANGGRAENI', '2425120234@gmail.com', '$2y$12$fk92Dnf9BB9XKjKBO48Zh.x9W6E248.rYMg.Hnmf6ct3T6DdWqkYq', 'P', 'Bogor, 02 Mei 2009', '2025-01-22', 'Bantar Kemang Rt 001/007 Kel. Baranangsiang Kec. Bogor Timur Kota Bogor', '081585270269', 'RIDWAN SUTIANA', 'ERLIN SELVIANA', '-', 'Bantar Kemang Rt 001/007 Kel. Baranangsiang Kec. Bogor Timur Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:16', '2025-01-22 02:14:24'),
(112, '2425120235', '3091927075', 'NIZAR NIRWANA BUDIMAN', '2425120235@gmail.com', '$2y$12$Ou/dAc.AYHAanNeS77ZfdO9WzBIie64gkl3TO5Il.7fgdvkV8Wtnm', 'L', 'Bogor, 01 April 2009', '2025-01-22', 'Jl Rimba Mulya 2 Rt 003/003 Kel. Pasir Mulya Kec. Bogor Barat Kota Bogor', '085695850655', 'DENY BUDIMAN', 'INDRIANTI SARI', '-', 'Jl Rimba Mulya Ii Rt 003/003 Kel. Pasir Mulya Kec. Bogor Barat Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:17', '2025-01-22 02:14:32'),
(113, '2425120236', '0088516881', 'RADEN AHMAD RAMA SEPTIAWAN', '2425120236@gmail.com', '$2y$12$b8OATJDb3OrwM2Qa.GgecOA47PCdlfPeF7yapKwUZxrc9asq1t/C6', 'L', 'Bogor, 22 September 2008', '2025-01-22', 'Jl Pangeran Sogiri No 99 Rt 003/004 Kel. Tanah Baru Kec. Bogor Utara Kota Bogor', '-', 'RADEN AHMAD KUSWANDA', 'YATI SUMIATI', '-', 'Jl Pangeran Sogiri No 99 Rt 003/004 Kel. Tanah Baru Kec. Bogor Utara Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:17', '2025-01-22 02:14:42'),
(114, '2425120237', '0083606824', 'RADEN AJENG SAARAH ZAHIRA HARIO', '2425120237@gmail.com', '$2y$12$rgSOGqcLEXFw5fRe46Q.zeqoO4YQH8V3ndpGz8ba2ckl/en9IkFpy', 'P', 'Bogor, 09 Februari 2008', '2025-01-22', 'Jalan Ikan Mujair No.37 Rt 003/001 Kel. Kedung Waringin Kec. Tanahsareal Kota Bogor', '087827763959', 'RADEN HARIO SURYO SUSENO', 'RENNY HAERANI', '-', 'Jalan Ikan Mujair No.37 Rt 003/001 Kel. Kedung Waringin Kec. Tanahsareal Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:17', '2025-01-22 02:14:49'),
(115, '2425120238', '0096494765', 'RAFA ABDURRAHMAN', '2425120238@gmail.com', '$2y$12$82AbfWjjJfg7BQb9NjPtfOCflSoMR0CF4ZohYwQ0XIAgeY2d2RuFG', 'L', 'Bogor, 09 Januari 2009', '2025-01-22', 'Perum Bukit Kayumanis Blok C3 No 8 Rt 008/012 Kel. Kayu Manis Kec. Tanahsareal Kota Bogor', '-', 'NANANG WAKID NUR HIDAYAT', 'ERNI ROHMAWATI', '-', 'Perum Bukit Kayumanis Blok C3 No 8 Rt 008/012 Kel. Kayu Manis Kec. Tanahsareal Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:17', '2025-01-22 02:15:02'),
(116, '2425120239', '0085681831', 'RAIS RAZIQ ARKANA', '2425120239@gmail.com', '$2y$12$/4EQc3wBsrCkQKxDHXywLOKXe91a217Mj8gGbI43fgKvYMVPyQHIO', 'L', 'Jakarta, 15 November 2008', '2025-01-22', 'Cemplang Baru Blok B No 9 Rt 001/010  Kel. Cilendek Barat Kec. Bogor Barat Kota Bogor', '-', 'IQBAL', 'VANESA NOFTALI', '-', 'Cemplang Baru Blok B No 9 Rt 001/010  Kel. Cilendek Barat Kec. Bogor Barat Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:18', '2025-01-22 02:15:12'),
(117, '2425120240', '0091504547', 'RATNA PUTRI TOHIRIN', '2425120240@gmail.com', '$2y$12$pYFWgBcBz50trVElqCdwD.IGhm5JDGxsJavHpX0TjIUQ1XaBKsl6q', 'P', 'Bogor, 26 Maret 2009', '2025-01-22', 'Babakan Peundeuy Rt.5 Rw. 12 Kel. Baranangsiang Kec. Bogor Timur Kota Bogor', '081316968304', 'ALAM TOHIRIN', 'ULAN PRIHATINI', '-', 'Babakan Peundeuy Rt.5 Rw. 12 Kel. Baranangsiang Kec. Bogor Timur Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:18', '2025-01-22 02:15:18'),
(118, '2425120241', '0086370952', 'SAHRUL RAMADHAN', '2425120241@gmail.com', '$2y$12$NWNZOvPkUXy9ufa5U4dVoe3Z6Q8PtTRsbzqTnqZDu6ihzYo5nlHH2', 'L', 'Bogor, 20 September 2008', '2025-01-22', 'Babakan Fakultas No 22 Rt 005/004 Kel. Tegal Lega Kec. Bogor Tengah Kota Bogor', '-', 'SOLIHIN', 'ASNIATI', '-', 'Babakan Fakultas No 22 Rt 005/004 Kel. Tegal Lega Kec. Bogor Tengah Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:18', '2025-01-22 02:15:26'),
(119, '2425120242', '0098153126', 'SHAFA QIRANA', '2425120242@gmail.com', '$2y$12$TVvy/HSq.t0E9lNCwQ26SOFcoL8hlpvgPjsBa7a7k7nMqpBh1NXOG', 'P', 'Bogor, 17 April 2009', '2025-01-22', 'Cibuluh Rt 002/008 Kel. Cibuluh Kec. Bogor Utara Kota Bogor', '089612040491', 'SAMSUDIN', 'SARI SETIAWATI', '-', 'Cibuluh Rt 002/008 Kel. Cibuluh Kec. Bogor Utara Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:19', '2025-01-22 02:15:33'),
(120, '2425120243', '0093256950', 'SITI ASSHYFA RETNO SANTOSO', '2425120243@gmail.com', '$2y$12$UIfoWcFnHk7lkZwQN73ee.Etm4OluPsAhXi6qScwgFEDi3720DmFW', 'P', 'Bogor, 25 Maret 2009', '2025-01-22', 'Griya Alam Sentul Blok C-23 No 1 Rt 003/003 Kel. Kadumangu Kec. Babakan Madang Kab. Bogor', '081314851060', 'HERI SUSANTO', 'MONA NATALITA', '-', 'Griya Alam Sentul Blok C-23 No 1 Rt 003/003 Kel. Kadumangu Kec. Babakan Madang Kab. Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:19', '2025-01-22 02:15:39'),
(121, '2425120244', '0071749601', 'WILDAN BAGUS WICAKSONO', '2425120244@gmail.com', '$2y$12$QjZHO9Dm.PDztY2Z8lAso.ixbGhLunFdU4gse4Mt8uFG.cSPn7DEC', 'L', 'Bogor, 01 Agustus 2007', '2025-01-22', 'Perum Bumi Citra Kencana Blok D1 No 12 Rt 004/007 Kel. Kencana Kec. Tanah Sareal Kota Bogor', '08881941250', 'MUHAMAD FAHRUDIN', 'MARYANI ANGGRAINI', '-', 'Perum Bumi Citra Kencana Blok D1 No 12 Rt 004/007 Kel. Kencana Kec. Tanah Sareal Kota Bogor', 'X-13 (X-DKV-1)', 'desain_komunikasi_visual', 2025, '1', '', 'murid', '2025-01-22 00:26:19', '2025-01-22 02:15:47');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_siswa`
--

CREATE TABLE `nilai_siswa` (
  `id` int NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `id_kelas` int NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama_siswa` text NOT NULL,
  `nama_wali` varchar(255) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `nama_materi_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
  `created_at` timestamp NOT NULL,
  `updated_At` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_siswa`
--

INSERT INTO `nilai_siswa` (`id`, `nama_kelas`, `id_kelas`, `nis`, `nama_siswa`, `nama_wali`, `nama_guru`, `nama_mapel`, `nama_materi_1`, `materi_1`, `nama_materi_2`, `materi_2`, `nama_materi_3`, `materi_3`, `nama_materi_4`, `materi_4`, `nama_materi_5`, `materi_5`, `na_materi`, `uts`, `uas`, `kehadiran`, `sikap`, `nilai_rapor`, `created_at`, `updated_At`) VALUES
(6, 'X-13 (X-DKV-1)', 22, '2425120201', 'ADINDA PUTRI KANIA', 'WIRA INDRAYANA, S.KOM.', 'WIRA INDRAYANA, S.KOM.', 'indonesia', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, '2025-01-23 00:04:21', '2025-01-23 00:04:21');

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
('Cr9yqChyUaNhQVuX0CevVW2U1Q4cEZyP9tgJDXcU', NULL, '180.252.80.156', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiekRUcVF0OG9wWWw2OXgzNk5TajJzMDdIRVduOWY2MXU0dEZIb2libyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vc21rLmNoYXNvdWx1aXgubXkuaWQvZ3VydS9uaWxhaT82Mz0iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1737615119),
('QwVYME39ylwhwbGnxFQBnvgFqBCYHVDqPdliRlOW', 125, '180.252.80.156', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZzYzbUc3ZXVHV1dURXpyUll6dnlBSnI5QUNLaFppVG0wbnpiYlk3SCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vc21rLmNoYXNvdWx1aXgubXkuaWQvZ3VydS9uaWxhaT82NT0iO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMjU7fQ==', 1737615379),
('j39stD7jVebPqhIxQNqomw48cxG9csJcAfBvXe6Q', 125, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVGlEZG5UZ0F5SlVJakJsVERBZnFCQlRDNnQxYUloNnlEV0lsWXJjTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wYWdlcy9zaXN3YSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEyNTt9', 1737616108);

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
(111, 'Pak Wira', 'pakwira@gmail.com', '$2y$12$zV610k/AieH/r5/zoCrNAuKO91fnlujP2jDV5/G5/6YrF/MaZM8HO', 'admin', '123', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-11 01:58:30', '2025-01-11 01:58:30', NULL),
(112, 'Wira Indrayana, S.Kom.', 'wiraindrayana@gmail.com', '$2y$12$t2KbAL5gn4gAsZ8hXhJdiOEDV0HQoajzQGu8Ze5TUPv1AII1jzsfi', 'admin', '200708051976', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-11 02:00:26', '2025-01-11 02:00:26', NULL),
(113, 'Wira Indrayana, S.Kom.', 'wiraindrayana@gmail.com', '$2y$12$3qry0QoXKNhcwurqc0Qxt.58O2oLmR6mhhcZY.4n5SmLCdwCLvXNC', 'wali', '2007080576', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-11 02:02:10', '2025-01-11 02:02:10', NULL),
(114, 'WAHYU JULIANA SAPUTRO, S.PD.I', 'wahyujuliana@gmail.com', '$2y$12$/Ie4JWZ9AzyKnNJKtqb/MOKQEy6Gr/WWalJnyqLvBrqAmXUUAZh/i', 'guru', 'G060', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-11 02:10:37', '2025-01-11 02:10:37', NULL),
(115, 'MAFTUHATUN SAOMI, S.PD.', 'maftuhatun@gmail.com', '$2y$12$wfoXSzlP6CE6yt7hM4AOUuED5IBdI5h9pN7AsGHpwz3W8T/2VyzWC', 'guru', 'G016', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-11 02:12:24', '2025-01-11 02:12:24', NULL),
(116, 'SANDY FATAH PAMUNGKAS, S.PD.', 'sandyfatah@gmail.com', '$2y$12$YSvmAe8B2FenXmz6XJZFM.HeFfLoyMG30wmNviSmtHnmpOEXMHKPC', 'guru', 'G072', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-11 02:13:39', '2025-01-11 02:13:39', NULL),
(117, 'MOHAMMAD FAJAR', 'fajar@gmail.com', '$2y$12$IscXzFxPxHoIhXSjrD.Yp.jC1BaI5zcp3XTPWMCKrxBgxPZcHOhOG', 'guru', 'G051', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-11 02:15:22', '2025-01-11 02:15:22', NULL),
(118, 'JEANYS ULFI PUTRI NURJANA, S.PD.', 'jeje@gmail.com', '$2y$12$0v7pAHUX0eUPCbVI8PbMT.7yYSZsufVDPLBVGeUq4LXxz5KW5wfVK', 'guru', 'G065', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-11 02:16:35', '2025-01-11 02:16:35', NULL),
(119, 'IRSYAD GIOVANNI, M.T.', 'giovanni@gmail.com', '$2y$12$tIwMONw9OOTEoE0xvW0EUes/YNBl2z3P/5Mm/QHPJ2Y0XlJXR/Dfq', 'guru', 'G042', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-11 02:18:32', '2025-01-11 02:18:32', NULL),
(120, 'MUHAMAD YUSUF ALBANA, S.PD.', 'albana@gmail.com', '$2y$12$yEDlbeYrFMs0AKX6xLGS0OZcE0s2hKjVdDBK/ythyIxELwxeA8Yd.', 'guru', 'G037', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-11 02:20:03', '2025-01-11 02:20:03', NULL),
(121, 'RIA ARNAS, S.I.KOM.', 'riaarnas@gmail.com', '$2y$12$pPRUSlGPR9gvygsCKQQSb.Y0Wj4nhsUXalmOnj5Uh58qrTHXd8dLO', 'wali', 'G028', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-11 02:21:22', '2025-01-22 02:44:38', NULL),
(122, 'NUR KAMILA SALDIANA, S.T.', 'kamila@gmail.com', '$2y$12$A3onZWLXILLy39rYuP/fV.2DayqBbt.Cz6EJ/kAgH8C.uevPIiAI.', 'guru', 'G026', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-11 02:22:44', '2025-01-11 02:22:44', NULL),
(123, 'SITI MUSYARIFAH, A.MD.', 'sitimusya@gmail.com', '$2y$12$XaV1enqqAqbe9rnxvAgDC..8NhqOASwtML80aR6KJyXgZ4zGVhjz2', 'guru', 'G025', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-11 02:23:58', '2025-01-11 02:23:58', NULL),
(124, 'ANITA DZIKRIKA', 'anita@gmail.com', '$2y$12$6SlJ..nwCnE2KNRSutTCROSzulYo4GqlPlIB06X1Zke4xDJqlLh6.', 'guru', 'G073', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-11 02:25:12', '2025-01-21 23:18:06', NULL),
(125, 'WIRA INDRAYANA, S.KOM.', 'wiraindrayana@gmail.com', '$2y$12$tREthQ6DbqZgfxeHbGnSIOAiagdgqtPB8W6yfIbwa/BFHjM/Nqafq', 'wali', 'G014', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-11 02:25:43', '2025-01-22 02:37:10', NULL),
(126, 'SANDI JEMBAR WIJAYA, S.PD.', 'sandi@gmail.com', '$2y$12$WXguxITk95S91PghJ7hva.DxTYzf39WHFhaMMpJJmFzuryqtaGORu', 'guru', 'G050', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-11 03:00:31', '2025-01-21 23:30:23', NULL),
(127, 'ADINDA PUTRI KANIA', '2425120201@gmail.com', '$2y$12$pEN6QHCL4AdtH57EFEBNcehGNhKtnwmFE50foKNreedd8zwsD/bC6', 'murid', NULL, '2425120201', NULL, NULL, NULL, NULL, NULL, '2025-01-21 23:51:12', '2025-01-22 00:27:24', NULL),
(128, 'AHMAD FAUZAN KHOERI', '2425120202@gmail.com', '$2y$12$h3eW08m9z.0LKtvMy7lejeQt1hX4isJH6bbSikXt5Ka0RzkVW0Lvu', 'murid', NULL, '2425120202', NULL, NULL, NULL, NULL, NULL, '2025-01-21 23:53:20', '2025-01-22 00:30:23', NULL),
(129, 'ALJIDAN RIZKIANTO', '2425120203@gmail.com', '$2y$12$pcW8P/8VaKPMoqk7WBkXLuAdQjQN448PxDyyDoeIKNt3uFIXPlbXa', 'murid', NULL, '2425120203', NULL, NULL, NULL, NULL, NULL, '2025-01-21 23:55:04', '2025-01-22 00:32:54', NULL),
(136, 'ADINDA PUTRI KANIA', '2425120201@gmail.com', '$2y$12$eDY0JO9sIwzgN6nek9OwaOYXNpmEq4DmPfu/RO2jEkydBrSw2PNo.', 'murid', NULL, '2425120201', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:06', '2025-01-22 00:26:06', NULL),
(137, 'AHMAD FAUZAN KHOERI', '2425120202@gmail.com', '$2y$12$TDh8l24Vuu.37ooYLOub0O9gplysOhuS1u2kJu/1btxl0l.hvh.f2', 'murid', NULL, '2425120202', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:06', '2025-01-22 00:26:06', NULL),
(138, 'ALJIDAN RIZKIANTO', '2425120203@gmail.com', '$2y$12$feZCclyt1xjCySVfateOPe29ItIx6pOFv/cw3YiEjBo6K0xiHoeVW', 'murid', NULL, '2425120203', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:06', '2025-01-22 00:26:06', NULL),
(139, 'ANDHIKA DWI RAHMADI', '2425120204@gmail.com', '$2y$12$ykW1He0prHYkbc46X0XH1ubVqSNLkimgHXJtoKWfUbgS2H02Wq9Wq', 'murid', NULL, '2425120204', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:07', '2025-01-22 00:26:07', NULL),
(140, 'AZZAHRA ADELYA HARUM', '2425120205@gmail.com', '$2y$12$lG6/.jN3lumFjWQypxVJQOdBuy3/fgVl9zXuF.rf6HWupkmxBM1QC', 'murid', NULL, '2425120205', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:07', '2025-01-22 00:26:07', NULL),
(141, 'BILLAL ABDI NEGARA', '2425120206@gmail.com', '$2y$12$0faY8hdrmHENwJ2FFCjG4eO6ixdCqGX0MwQb2ar8oMohLhdeQ6.a2', 'murid', NULL, '2425120206', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:07', '2025-01-22 00:26:07', NULL),
(142, 'DENI PIRMANSYAH', '2425120207@gmail.com', '$2y$12$UyUFqqt8FeFvmSsAuzXGGeNrwF/McXHMu2uKad.iLKAgGH6e02Mya', 'murid', NULL, '2425120207', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:08', '2025-01-22 00:26:08', NULL),
(143, 'DEVAN ALVIANSYAH', '2425120208@gmail.com', '$2y$12$S79sxfja5bzF/F8QG.orjuFlyCdGXCQPz.7nsqtHqoXfrFFPQzQxe', 'murid', NULL, '2425120208', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:08', '2025-01-22 00:26:08', NULL),
(144, 'DEVINA PUTRI KHAIRAAN', '2425120209@gmail.com', '$2y$12$UmEzohSFKkW.E4YMmvPopOZB3I.m82iT7cuigG1Kyl9GisgZR4kIa', 'murid', NULL, '2425120209', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:08', '2025-01-22 00:26:08', NULL),
(145, 'DHAVIZA AZHAR LINTALANA', '2425120210@gmail.com', '$2y$12$uRIdUNSG/CTlw2eCKLL.u.cDzVWzYjBJ6/76kScyCrGZ/dx2Ek5zS', 'murid', NULL, '2425120210', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:09', '2025-01-22 00:26:09', NULL),
(146, 'FAARIS RIFQI ATSIILAH', '2425120211@gmail.com', '$2y$12$vh87e62B18b/Y5Wnlrivo.wGCeTSQh6id9KC/iIeYBq/1N622/UFe', 'murid', NULL, '2425120211', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:09', '2025-01-22 00:26:09', NULL),
(147, 'FATHUR RAHMAN AZ ZAKI', '2425120212@gmail.com', '$2y$12$5YOelk40Nj/WYHK8rxtHz.BpqmHSI3RT4cFGoKi7kQe0s99N0vC/C', 'murid', NULL, '2425120212', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:09', '2025-01-22 00:26:09', NULL),
(148, 'FAUZAN ABDURAHMAN', '2425120213@gmail.com', '$2y$12$cfbEx7focu0k6IWRS7zSfuv/1jNz34caZeHm5pWBlkhXH0QFsP5n6', 'murid', NULL, '2425120213', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:10', '2025-01-22 00:26:10', NULL),
(149, 'FERDY ALDIANSYAH', '2425120214@gmail.com', '$2y$12$NNn9Sd04molgjf77iyDqBeRMEOsFRQEmtpWi7RuvzgrXWZ2cbGSg6', 'murid', NULL, '2425120214', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:10', '2025-01-22 00:26:10', NULL),
(150, 'FIRLI FAUZI SUPARMAN', '2425120215@gmail.com', '$2y$12$1YqGuLxC3JmUvvk/QBhPdeAtB/D2X0.i0J4x93F5U8GpR0rEMAFte', 'murid', NULL, '2425120215', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:10', '2025-01-22 00:26:10', NULL),
(151, 'GALANG GUMELAR', '2425120216@gmail.com', '$2y$12$TjVmrnjYSGLtSIAZRa/SQ.0FFMZK6IgD81AABhoqnTi.ykk9VZOo.', 'murid', NULL, '2425120216', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:11', '2025-01-22 00:26:11', NULL),
(152, 'HAFIIZH SALLAMUDIIN', '2425120217@gmail.com', '$2y$12$NkRuZr53VzkItF7BR9ClQ.MhBxgMuFlt9fFB9eDRqX9u5DwSVRXMG', 'murid', NULL, '2425120217', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:11', '2025-01-22 00:26:11', NULL),
(153, 'I GUSTI NYOMAN M. HAZMAN ZUL QISTHI', '2425120218@gmail.com', '$2y$12$vdAUfnGjmVLnIEcXxCJS2eG4TuJdSDbra.veYqtVC8ECOrlT4Klqq', 'murid', NULL, '2425120218', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:11', '2025-01-22 00:26:11', NULL),
(154, 'KENZO MAHARDHIKA FEBRIANO', '2425120219@gmail.com', '$2y$12$2sDMzvL0jJdWN.PGymdjbe8y.8qU8PNdCyFSiLs1Md3MqOSWxB9.q', 'murid', NULL, '2425120219', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:12', '2025-01-22 00:26:12', NULL),
(155, 'MUHAMAD AL RADZIB', '2425120220@gmail.com', '$2y$12$viLUUZECFSLIUP07nERPk.jJMxjfW8tEqhhClFgwFT2A5ECPzSgnK', 'murid', NULL, '2425120220', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:12', '2025-01-22 00:26:12', NULL),
(156, 'MUHAMMAD ALFIANSAH', '2425120221@gmail.com', '$2y$12$d2b8Pv8xTSM3lqiE2fY5F.o4O0vCejQYcdG9VJwOjx6tPfLZfIBvK', 'murid', NULL, '2425120221', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:12', '2025-01-22 00:26:12', NULL),
(157, 'MUHAMMAD BARRU HAIKAL', '2425120222@gmail.com', '$2y$12$MYLNWXlKRn0cYhEClJ6FjeOvhb1zeaZ2la9AWEfCvCh7Wag3vGp0K', 'murid', NULL, '2425120222', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:12', '2025-01-22 00:26:12', NULL),
(158, 'MUHAMMAD DENIS MAULANA', '2425120223@gmail.com', '$2y$12$pyNVBbDyYbcmTxHGIpwvK.4TOFDFTfcicrQq3ovTQnUQ0SrTckli.', 'murid', NULL, '2425120223', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:13', '2025-01-22 00:26:13', NULL),
(159, 'MUHAMMAD FABYAN NURIL GUNAWAN', '2425120224@gmail.com', '$2y$12$Qbo.WT2rBec1x5r8znqWUuqrEMsTQiFoDBQZLyhIX2iLgz07UTIcW', 'murid', NULL, '2425120224', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:13', '2025-01-22 00:26:13', NULL),
(160, 'MUHAMAD IHZA AZHARI ZULPA', '2425120225@gmail.com', '$2y$12$0hXJqV.Lji1ilfVYjTtP/uffHWZkvjD2h7XlCXn.7L8UtpnE7Mk16', 'murid', NULL, '2425120225', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:13', '2025-01-22 00:26:13', NULL),
(161, 'MUHAMMAD JABBAR EL BARRIE', '2425120226@gmail.com', '$2y$12$bGQ8C0w.ztw7v7fK4DmzPOzqMyC1tbulj6G4ejdcEU2v4y/mic3Wm', 'murid', NULL, '2425120226', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:14', '2025-01-22 00:26:14', NULL),
(162, 'MUHAMMAD PARSAIZYAN', '2425120227@gmail.com', '$2y$12$JTbwKZJfOqBELmOSrLH06e/mFjQ.CKqG6OZFrmkpZdoa0BCQSHrQu', 'murid', NULL, '2425120227', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:14', '2025-01-22 00:26:14', NULL),
(163, 'MUHAMMAD RAFI HANGGARA', '2425120228@gmail.com', '$2y$12$V.DyV.6e9BQx7pSSDLiKJOyd33zSE2c2AkxgjsiYE3Muu8/1Z5.H2', 'murid', NULL, '2425120228', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:14', '2025-01-22 00:26:14', NULL),
(164, 'MUHAMMAD RAIN NAUFAL', '2425120229@gmail.com', '$2y$12$ixEYHx.VGcJVbFl0mZKGYuQ3n4an8D8fcCn6hNqqJhbqGtEIrSS7W', 'murid', NULL, '2425120229', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:14', '2025-01-22 00:26:14', NULL),
(165, 'MUHAMMAD REZQI PRATAMA', '2425120230@gmail.com', '$2y$12$sSC5N2T6gRmMvmtbNrIL9.rf9BcKeSB22Tme9r5zMglPPQxSwPQRq', 'murid', NULL, '2425120230', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:15', '2025-01-22 00:26:15', NULL),
(166, 'MUHAMMAD RIAL HENDRI WIJAYA', '2425120231@gmail.com', '$2y$12$8Deav7QckFkoF3MN7W.Y7uEIk6PljfMrmIvMaTXmr/qrjcsxeVFDK', 'murid', NULL, '2425120231', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:15', '2025-01-22 00:26:15', NULL),
(167, 'MUHAMMAD RIDHO RAHMAWAN', '2425120232@gmail.com', '$2y$12$u4ZwZkEjKTQWHSnrcjtFB.EqeR3OobgKroZspWqEiXn/Cb2NgyAQq', 'murid', NULL, '2425120232', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:15', '2025-01-22 00:26:15', NULL),
(168, 'NAJMI ABDUL HADI', '2425120233@gmail.com', '$2y$12$zyrmKeCh9jH5BkipKHCitelmwaZl/BjnlxKQQv6C5Y.RlwLrsPFAe', 'murid', NULL, '2425120233', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:15', '2025-01-22 00:26:15', NULL),
(169, 'NAYSILA ANGGRAENI', '2425120234@gmail.com', '$2y$12$fk92Dnf9BB9XKjKBO48Zh.x9W6E248.rYMg.Hnmf6ct3T6DdWqkYq', 'murid', NULL, '2425120234', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:16', '2025-01-22 00:26:16', NULL),
(170, 'NIZAR NIRWANA BUDIMAN', '2425120235@gmail.com', '$2y$12$Ou/dAc.AYHAanNeS77ZfdO9WzBIie64gkl3TO5Il.7fgdvkV8Wtnm', 'murid', NULL, '2425120235', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:17', '2025-01-22 00:26:17', NULL),
(171, 'RADEN AHMAD RAMA SEPTIAWAN', '2425120236@gmail.com', '$2y$12$b8OATJDb3OrwM2Qa.GgecOA47PCdlfPeF7yapKwUZxrc9asq1t/C6', 'murid', NULL, '2425120236', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:17', '2025-01-22 00:26:17', NULL),
(172, 'RADEN AJENG SAARAH ZAHIRA HARIO', '2425120237@gmail.com', '$2y$12$rgSOGqcLEXFw5fRe46Q.zeqoO4YQH8V3ndpGz8ba2ckl/en9IkFpy', 'murid', NULL, '2425120237', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:17', '2025-01-22 00:26:17', NULL),
(173, 'RAFA ABDURRAHMAN', '2425120238@gmail.com', '$2y$12$82AbfWjjJfg7BQb9NjPtfOCflSoMR0CF4ZohYwQ0XIAgeY2d2RuFG', 'murid', NULL, '2425120238', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:17', '2025-01-22 00:26:17', NULL),
(174, 'RAIS RAZIQ ARKANA', '2425120239@gmail.com', '$2y$12$/4EQc3wBsrCkQKxDHXywLOKXe91a217Mj8gGbI43fgKvYMVPyQHIO', 'murid', NULL, '2425120239', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:18', '2025-01-22 00:26:18', NULL),
(175, 'RATNA PUTRI TOHIRIN', '2425120240@gmail.com', '$2y$12$pYFWgBcBz50trVElqCdwD.IGhm5JDGxsJavHpX0TjIUQ1XaBKsl6q', 'murid', NULL, '2425120240', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:18', '2025-01-22 00:26:18', NULL),
(176, 'SAHRUL RAMADHAN', '2425120241@gmail.com', '$2y$12$NWNZOvPkUXy9ufa5U4dVoe3Z6Q8PtTRsbzqTnqZDu6ihzYo5nlHH2', 'murid', NULL, '2425120241', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:18', '2025-01-22 00:26:18', NULL),
(177, 'SHAFA QIRANA', '2425120242@gmail.com', '$2y$12$TVvy/HSq.t0E9lNCwQ26SOFcoL8hlpvgPjsBa7a7k7nMqpBh1NXOG', 'murid', NULL, '2425120242', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:19', '2025-01-22 00:26:19', NULL),
(178, 'SITI ASSHYFA RETNO SANTOSO', '2425120243@gmail.com', '$2y$12$UIfoWcFnHk7lkZwQN73ee.Etm4OluPsAhXi6qScwgFEDi3720DmFW', 'murid', NULL, '2425120243', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:19', '2025-01-22 00:26:19', NULL),
(179, 'WILDAN BAGUS WICAKSONO', '2425120244@gmail.com', '$2y$12$QjZHO9Dm.PDztY2Z8lAso.ixbGhLunFdU4gse4Mt8uFG.cSPn7DEC', 'murid', NULL, '2425120244', NULL, NULL, NULL, NULL, NULL, '2025-01-22 00:26:19', '2025-01-22 00:26:19', NULL);

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
(24, 'G014', 'WIRA INDRAYANA, S.KOM.', 'G014@smkpembangunanbogor.sch.id', '$2y$12$Dj1uaDwyI786OepJyk.zxOx4y7wjf7YVDd5lQPmCe/94kapHcJJsq', 'wali', '2025-01-11 02:25:43', '2025-01-11 02:25:43'),
(25, 'G028', 'RIA ARNAS, S.I.KOM.', 'riaarnas@gmail.com', '$2y$12$pPRUSlGPR9gvygsCKQQSb.Y0Wj4nhsUXalmOnj5Uh58qrTHXd8dLO', 'wali', '2025-01-22 02:44:38', '2025-01-22 02:44:38');

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
-- Indexes for table `materi_pelajarans`
--
ALTER TABLE `materi_pelajarans`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `walis`
--
ALTER TABLE `walis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `daftar_mapel`
--
ALTER TABLE `daftar_mapel`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daftar_siswa`
--
ALTER TABLE `daftar_siswa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matapelajarans`
--
ALTER TABLE `matapelajarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materi_pelajarans`
--
ALTER TABLE `materi_pelajarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `murids`
--
ALTER TABLE `murids`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `walis`
--
ALTER TABLE `walis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
