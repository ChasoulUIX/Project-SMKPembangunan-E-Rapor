-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 14 Des 2024 pada 12.48
-- Versi server: 10.11.9-MariaDB-cll-lve-log
-- Versi PHP: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chasoulu_smk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('murid','guru','wali','admin') NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `nip`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(7, '111', 'admin', '111@gmail.com', '$2y$12$8c/hG/biMQJaaZi4MM5fSOnfamaaHXxsjWB/Y4Zl6UMfv3XB0tjku', 'admin', '2024-12-07 20:37:30', '2024-12-07 20:37:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_mapel`
--

CREATE TABLE `daftar_mapel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kelas` bigint(20) UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `nama_wali` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `daftar_siswa` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`daftar_siswa`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `daftar_mapel`
--

INSERT INTO `daftar_mapel` (`id`, `id_kelas`, `nama_kelas`, `nama_wali`, `jurusan`, `nama_guru`, `nama_mapel`, `daftar_siswa`, `created_at`, `updated_at`) VALUES
(38, 21, 'X-1', 'pak wira', 'Multimedia', 'pak wira', 'Bahasa indonesia', '[\"{\\\"id\\\":\\\"24\\\",\\\"nis\\\":\\\"300\\\",\\\"name\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\"]', '2024-12-08 05:40:00', '2024-12-08 05:40:00'),
(41, 21, 'X-13', 'pak wira', 'Multimedia', 'pak wira', 'Bahasa jepang', '[\"{\\\"id\\\":\\\"24\\\",\\\"nis\\\":\\\"300\\\",\\\"name\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\",\"{\\\"id\\\":\\\"31\\\",\\\"name\\\":\\\"AHMAD FAUZAN KHOERI\\\",\\\"nis\\\":\\\"00\\\",\\\"nisn\\\":\\\"0096356338\\\"}\",\"{\\\"id\\\":\\\"24\\\",\\\"name\\\":\\\"ADINDA PUTRI KANIA\\\",\\\"nis\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\"]', '2024-12-11 08:26:56', '2024-12-11 08:26:56'),
(42, 21, 'X-13', 'pak wira', 'Multimedia', 'pak wira', 'Administrasi Umum', '[\"{\\\"id\\\":\\\"24\\\",\\\"nis\\\":\\\"300\\\",\\\"name\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\",\"{\\\"id\\\":\\\"31\\\",\\\"name\\\":\\\"AHMAD FAUZAN KHOERI\\\",\\\"nis\\\":\\\"00\\\",\\\"nisn\\\":\\\"0096356338\\\"}\",\"{\\\"id\\\":\\\"24\\\",\\\"name\\\":\\\"ADINDA PUTRI KANIA\\\",\\\"nis\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\"]', '2024-12-12 20:33:06', '2024-12-12 20:33:06'),
(45, 21, 'X-13', 'pak wira', 'Multimedia', 'pak wira', 'Bahasa Inggris dan Bahasa Asing Lainya', '[\"{\\\"id\\\":\\\"24\\\",\\\"nis\\\":\\\"300\\\",\\\"name\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\",\"{\\\"id\\\":\\\"31\\\",\\\"name\\\":\\\"AHMAD FAUZAN KHOERI\\\",\\\"nis\\\":\\\"00\\\",\\\"nisn\\\":\\\"0096356338\\\"}\",\"{\\\"id\\\":\\\"24\\\",\\\"name\\\":\\\"ADINDA PUTRI KANIA\\\",\\\"nis\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\"]', '2024-12-12 20:33:27', '2024-12-12 20:33:27'),
(46, 21, 'X-13', 'pak wira', 'Multimedia', 'pak wira', 'Bahasa Sunda', '[\"{\\\"id\\\":\\\"24\\\",\\\"nis\\\":\\\"300\\\",\\\"name\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\",\"{\\\"id\\\":\\\"31\\\",\\\"name\\\":\\\"AHMAD FAUZAN KHOERI\\\",\\\"nis\\\":\\\"00\\\",\\\"nisn\\\":\\\"0096356338\\\"}\",\"{\\\"id\\\":\\\"24\\\",\\\"name\\\":\\\"ADINDA PUTRI KANIA\\\",\\\"nis\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\"]', '2024-12-12 20:33:43', '2024-12-12 20:33:43'),
(47, 21, 'X-13', 'pak wira', 'Multimedia', 'pak wira', 'Ekonomi Bisnis', '[\"{\\\"id\\\":\\\"24\\\",\\\"nis\\\":\\\"300\\\",\\\"name\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\",\"{\\\"id\\\":\\\"31\\\",\\\"name\\\":\\\"AHMAD FAUZAN KHOERI\\\",\\\"nis\\\":\\\"00\\\",\\\"nisn\\\":\\\"0096356338\\\"}\",\"{\\\"id\\\":\\\"24\\\",\\\"name\\\":\\\"ADINDA PUTRI KANIA\\\",\\\"nis\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\"]', '2024-12-12 20:33:48', '2024-12-12 20:33:48'),
(48, 21, 'X-13', 'pak wira', 'Multimedia', 'pak wira', 'Ilmu Pengetahuan', '[\"{\\\"id\\\":\\\"24\\\",\\\"nis\\\":\\\"300\\\",\\\"name\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\",\"{\\\"id\\\":\\\"31\\\",\\\"name\\\":\\\"AHMAD FAUZAN KHOERI\\\",\\\"nis\\\":\\\"00\\\",\\\"nisn\\\":\\\"0096356338\\\"}\",\"{\\\"id\\\":\\\"24\\\",\\\"name\\\":\\\"ADINDA PUTRI KANIA\\\",\\\"nis\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\"]', '2024-12-12 20:33:53', '2024-12-12 20:33:53'),
(49, 21, 'X-13', 'pak wira', 'Multimedia', 'pak wira', 'Kearsipan', '[\"{\\\"id\\\":\\\"24\\\",\\\"nis\\\":\\\"300\\\",\\\"name\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\",\"{\\\"id\\\":\\\"31\\\",\\\"name\\\":\\\"AHMAD FAUZAN KHOERI\\\",\\\"nis\\\":\\\"00\\\",\\\"nisn\\\":\\\"0096356338\\\"}\",\"{\\\"id\\\":\\\"24\\\",\\\"name\\\":\\\"ADINDA PUTRI KANIA\\\",\\\"nis\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\"]', '2024-12-12 20:33:58', '2024-12-12 20:33:58'),
(50, 21, 'X-13', 'pak wira', 'Multimedia', 'pak wira', 'Korespondensi', '[\"{\\\"id\\\":\\\"24\\\",\\\"nis\\\":\\\"300\\\",\\\"name\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\",\"{\\\"id\\\":\\\"31\\\",\\\"name\\\":\\\"AHMAD FAUZAN KHOERI\\\",\\\"nis\\\":\\\"00\\\",\\\"nisn\\\":\\\"0096356338\\\"}\",\"{\\\"id\\\":\\\"24\\\",\\\"name\\\":\\\"ADINDA PUTRI KANIA\\\",\\\"nis\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\"]', '2024-12-12 20:34:38', '2024-12-12 20:34:38'),
(51, 21, 'X-13', 'pak wira', 'Multimedia', 'pak wira', 'Pendidikan Agama Islam', '[\"{\\\"id\\\":\\\"24\\\",\\\"nis\\\":\\\"300\\\",\\\"name\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\",\"{\\\"id\\\":\\\"31\\\",\\\"name\\\":\\\"AHMAD FAUZAN KHOERI\\\",\\\"nis\\\":\\\"00\\\",\\\"nisn\\\":\\\"0096356338\\\"}\",\"{\\\"id\\\":\\\"24\\\",\\\"name\\\":\\\"ADINDA PUTRI KANIA\\\",\\\"nis\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\"]', '2024-12-12 20:34:43', '2024-12-12 20:34:43'),
(52, 21, 'X-13', 'pak wira', 'Multimedia', 'pak wira', 'Pendidikan Jasmani, Olahraga dan Kesehatan', '[\"{\\\"id\\\":\\\"24\\\",\\\"nis\\\":\\\"300\\\",\\\"name\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\",\"{\\\"id\\\":\\\"31\\\",\\\"name\\\":\\\"AHMAD FAUZAN KHOERI\\\",\\\"nis\\\":\\\"00\\\",\\\"nisn\\\":\\\"0096356338\\\"}\",\"{\\\"id\\\":\\\"24\\\",\\\"name\\\":\\\"ADINDA PUTRI KANIA\\\",\\\"nis\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\"]', '2024-12-12 20:34:48', '2024-12-12 20:34:48'),
(53, 21, 'X-13', 'pak wira', 'Multimedia', 'pak wira', 'Pendidikan Pancasila dan Kewarganegaraan', '[\"{\\\"id\\\":\\\"24\\\",\\\"nis\\\":\\\"300\\\",\\\"name\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\",\"{\\\"id\\\":\\\"31\\\",\\\"name\\\":\\\"AHMAD FAUZAN KHOERI\\\",\\\"nis\\\":\\\"00\\\",\\\"nisn\\\":\\\"0096356338\\\"}\",\"{\\\"id\\\":\\\"24\\\",\\\"name\\\":\\\"ADINDA PUTRI KANIA\\\",\\\"nis\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\"]', '2024-12-12 20:34:55', '2024-12-12 20:34:55'),
(54, 21, 'X-13', 'pak wira', 'Multimedia', 'pak wira', 'Sejarah Indonesia', '[\"{\\\"id\\\":\\\"24\\\",\\\"nis\\\":\\\"300\\\",\\\"name\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\",\"{\\\"id\\\":\\\"31\\\",\\\"name\\\":\\\"AHMAD FAUZAN KHOERI\\\",\\\"nis\\\":\\\"00\\\",\\\"nisn\\\":\\\"0096356338\\\"}\",\"{\\\"id\\\":\\\"24\\\",\\\"name\\\":\\\"ADINDA PUTRI KANIA\\\",\\\"nis\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\"]', '2024-12-12 20:35:00', '2024-12-12 20:35:00'),
(55, 21, 'X-13', 'pak wira', 'Multimedia', 'pak wira', 'Seni Budaya', '[\"{\\\"id\\\":\\\"24\\\",\\\"nis\\\":\\\"300\\\",\\\"name\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\",\"{\\\"id\\\":\\\"31\\\",\\\"name\\\":\\\"AHMAD FAUZAN KHOERI\\\",\\\"nis\\\":\\\"00\\\",\\\"nisn\\\":\\\"0096356338\\\"}\",\"{\\\"id\\\":\\\"24\\\",\\\"name\\\":\\\"ADINDA PUTRI KANIA\\\",\\\"nis\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\"]', '2024-12-12 20:35:09', '2024-12-12 20:35:09'),
(56, 21, 'X-13', 'pak wira', 'Multimedia', 'pak wira', 'Simulasi dan Komunikasi Digital', '[\"{\\\"id\\\":\\\"24\\\",\\\"nis\\\":\\\"300\\\",\\\"name\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\",\"{\\\"id\\\":\\\"31\\\",\\\"name\\\":\\\"AHMAD FAUZAN KHOERI\\\",\\\"nis\\\":\\\"00\\\",\\\"nisn\\\":\\\"0096356338\\\"}\",\"{\\\"id\\\":\\\"24\\\",\\\"name\\\":\\\"ADINDA PUTRI KANIA\\\",\\\"nis\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\"]', '2024-12-12 20:35:15', '2024-12-12 20:35:15'),
(57, 21, 'X-13', 'pak wira', 'Multimedia', 'pak wira', 'Teknologi Perkantoran', '[\"{\\\"id\\\":\\\"24\\\",\\\"nis\\\":\\\"300\\\",\\\"name\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\",\"{\\\"id\\\":\\\"31\\\",\\\"name\\\":\\\"AHMAD FAUZAN KHOERI\\\",\\\"nis\\\":\\\"00\\\",\\\"nisn\\\":\\\"0096356338\\\"}\",\"{\\\"id\\\":\\\"24\\\",\\\"name\\\":\\\"ADINDA PUTRI KANIA\\\",\\\"nis\\\":\\\"300\\\",\\\"nisn\\\":\\\"300\\\"}\"]', '2024-12-12 20:35:28', '2024-12-12 20:35:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_nilai`
--

CREATE TABLE `daftar_nilai` (
  `id` int(11) NOT NULL,
  `id_Wali` varchar(255) NOT NULL,
  `nama_wali` varchar(255) NOT NULL,
  `id_matapelajaran` varchar(255) NOT NULL,
  `nama_pelajaran` varchar(255) NOT NULL,
  `id_guru` varchar(255) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `daftar_siswa` text NOT NULL,
  `nilai_harian1` int(11) NOT NULL,
  `nilai_harian2` int(11) NOT NULL,
  `nilai_harian3` int(11) NOT NULL,
  `nilai_harian4` int(11) NOT NULL,
  `nilai_harian5` int(11) NOT NULL,
  `rata_rata` int(11) NOT NULL,
  `uts` int(11) NOT NULL,
  `uas` int(11) NOT NULL,
  `kehadiran` int(11) NOT NULL,
  `sikap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_siswa`
--

CREATE TABLE `daftar_siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `wali_kelas` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `daftar_siswa` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`daftar_siswa`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `daftar_siswa`
--

INSERT INTO `daftar_siswa` (`id`, `id_kelas`, `nama_kelas`, `nip`, `wali_kelas`, `jurusan`, `daftar_siswa`, `created_at`, `updated_at`) VALUES
(24, 21, 'X-13', '200', 'pak wira', 'Multimedia', '[{\"id\":\"24\",\"nis\":\"300\",\"name\":\"300\",\"nisn\":\"300\"},{\"id\":\"31\",\"name\":\"AHMAD FAUZAN KHOERI\",\"nis\":\"00\",\"nisn\":\"0096356338\"},{\"id\":\"24\",\"name\":\"ADINDA PUTRI KANIA\",\"nis\":\"300\",\"nisn\":\"300\"}]', '2024-12-08 05:39:54', '2024-12-10 01:49:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `gurus`
--

CREATE TABLE `gurus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `birth_place` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `address` text NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `role` enum('murid','guru','wali','admin') NOT NULL DEFAULT 'guru',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gurus`
--

INSERT INTO `gurus` (`id`, `nip`, `name`, `email`, `password`, `gender`, `birth_place`, `birth_date`, `address`, `phone_number`, `photo`, `role`, `created_at`, `updated_at`) VALUES
(27, '200', 'pak wira', '200@gmail.com', '$2y$12$DdrifBc6cIOQq4PiY/9z7uuKWnUxLvFU8qRrruABZeyzugFjSN/Gi', 'L', '200', '2024-12-06', '200', '200', '/images/1733661495.png', 'wali', '2024-12-08 05:38:15', '2024-12-08 05:38:38'),
(28, '201', '201', '201@gmail.com', '$2y$12$iUHeUqQ4Bdae/PhsFcOO8elWm2yOXDA4iRj/AqJOYpVPwiRu.s.SK', 'L', '201', '2024-12-05', '201', '201', '', 'guru', '2024-12-08 05:38:30', '2024-12-08 05:38:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `wali_kelas` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `daftar_siswa` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`daftar_siswa`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `wali_kelas`, `jurusan`, `daftar_siswa`, `created_at`, `updated_at`) VALUES
(21, 'X-13', 'pak wira', 'Multimedia', NULL, '2024-12-08 05:38:52', '2024-12-10 00:38:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matapelajarans`
--

CREATE TABLE `matapelajarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_mapel` varchar(255) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `daftar_siswa` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`daftar_siswa`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `matapelajarans`
--

INSERT INTO `matapelajarans` (`id`, `kode_mapel`, `nama_mapel`, `nip`, `nama_guru`, `kategori`, `daftar_siswa`, `created_at`, `updated_at`) VALUES
(31, 'A4000', 'Bahasa indonesia', 200, 'pak wira', 'umum', NULL, '2024-12-08 05:39:04', '2024-12-08 05:39:04'),
(32, 'A7662', 'Bahasa jepang', 200, 'pak wira', 'umum', NULL, '2024-12-10 01:07:50', '2024-12-10 01:07:50'),
(33, 'A4753', 'Pendidikan Agama Islam', 200, 'pak wira', 'umum', NULL, '2024-12-12 20:27:06', '2024-12-12 20:27:06'),
(34, 'A0675', 'Pendidikan Pancasila dan Kewarganegaraan', 200, 'pak wira', 'umum', NULL, '2024-12-12 20:27:24', '2024-12-12 20:27:24'),
(35, 'A4581', 'Bahasa Indonesia', 200, 'pak wira', 'umum', NULL, '2024-12-12 20:27:39', '2024-12-12 20:27:39'),
(36, 'A9569', 'Sejarah Indonesia', 200, 'pak wira', 'umum', NULL, '2024-12-12 20:27:55', '2024-12-12 20:27:55'),
(37, 'A3006', 'Bahasa Inggris dan Bahasa Asing Lainya', 200, 'pak wira', 'umum', NULL, '2024-12-12 20:28:44', '2024-12-12 20:28:44'),
(38, 'A8155', 'Seni Budaya', 200, 'pak wira', 'umum', NULL, '2024-12-12 20:28:57', '2024-12-12 20:28:57'),
(39, 'A5606', 'Pendidikan Jasmani, Olahraga dan Kesehatan', 200, 'pak wira', 'umum', NULL, '2024-12-12 20:29:15', '2024-12-12 20:29:15'),
(40, 'A0314', 'Bahasa Sunda', 200, 'pak wira', 'lokal', NULL, '2024-12-12 20:29:27', '2024-12-12 20:29:27'),
(41, 'A7775', 'Simulasi dan Komunikasi Digital', 200, 'pak wira', 'kejuruan', NULL, '2024-12-12 20:29:47', '2024-12-12 20:29:47'),
(42, 'A3981', 'Ekonomi Bisnis', 200, 'pak wira', 'kejuruan', NULL, '2024-12-12 20:30:00', '2024-12-12 20:30:00'),
(43, 'A2445', 'Administrasi Umum', 200, 'pak wira', 'kejuruan', NULL, '2024-12-12 20:30:19', '2024-12-12 20:30:19'),
(44, 'A5932', 'Ilmu Pengetahuan', 200, 'pak wira', 'kejuruan', NULL, '2024-12-12 20:30:36', '2024-12-12 20:30:36'),
(45, 'A7705', 'Teknologi Perkantoran', 200, 'pak wira', 'kejuruan', NULL, '2024-12-12 20:30:56', '2024-12-12 20:30:56'),
(46, 'A8479', 'Korespondensi', 200, 'pak wira', 'kejuruan', NULL, '2024-12-12 20:31:12', '2024-12-12 20:31:12'),
(47, 'A3051', 'Kearsipan', 200, 'pak wira', 'kejuruan', NULL, '2024-12-12 20:31:22', '2024-12-12 20:31:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi_pelajarans`
--

CREATE TABLE `materi_pelajarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `materi_1` varchar(255) DEFAULT NULL,
  `materi_2` varchar(255) DEFAULT NULL,
  `materi_3` varchar(255) DEFAULT NULL,
  `materi_4` varchar(255) DEFAULT NULL,
  `materi_5` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `materi_pelajarans`
--

INSERT INTO `materi_pelajarans` (`id`, `nama_guru`, `nama_mapel`, `materi_1`, `materi_2`, `materi_3`, `materi_4`, `materi_5`, `created_at`, `updated_at`) VALUES
(3, 'pak wira', 'Bahasa indonesia', 'Materi 1', 'Materi 2', 'Materi 3', 'Materi 4', 'Materi 5', '2024-12-12 08:00:14', '2024-12-12 20:36:16'),
(4, 'pak wira', 'Bahasa jepang', 'Materi 1', 'Materi 2', 'Materi 3', 'Materi 4', 'Materi 5', '2024-12-12 20:36:32', '2024-12-12 20:36:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
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
-- Struktur dari tabel `murids`
--

CREATE TABLE `murids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(255) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `birth_place` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `address` text NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `parent_phone` varchar(255) NOT NULL,
  `parent_address` varchar(255) DEFAULT NULL,
  `class` varchar(255) NOT NULL,
  `major` enum('multimedia','akuntansi','perkantoran','pemasaran') NOT NULL,
  `academic_year` int(11) NOT NULL,
  `semester` enum('1','2') NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `role` enum('murid','guru','wali','admin') NOT NULL DEFAULT 'murid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `murids`
--

INSERT INTO `murids` (`id`, `nis`, `nisn`, `name`, `email`, `password`, `gender`, `birth_place`, `birth_date`, `address`, `phone_number`, `father_name`, `mother_name`, `parent_phone`, `parent_address`, `class`, `major`, `academic_year`, `semester`, `photo`, `role`, `created_at`, `updated_at`) VALUES
(24, '300', '300', 'ADINDA PUTRI KANIA', '300@gmail.com', '$2y$12$mJWZM9wTp7TQruX3EnOpt.k6WJrfXoHJuEQy9s0bE0mo0lAL4ogn.', 'L', '300', '2024-12-10', '300', '300', '300', '300', '300', '300', 'X-13', 'multimedia', 300, '1', NULL, 'murid', '2024-12-08 05:39:36', '2024-12-10 00:40:30'),
(31, '00', '0096356338', 'AHMAD FAUZAN KHOERI', 'donyy1472@gmail.com', '$2y$12$eF8Sa41ZLbn8H1q1yAqR8.bu5gRy7OzlVV/eO9vOfH/cQ1QOjXcY.', 'L', 'Bogor', '2000-01-11', '00', '0', '0', '0', '0', '0', 'X-13', 'multimedia', 0, '1', NULL, 'murid', '2024-12-10 01:29:18', '2024-12-10 01:29:18'),
(32, '636', '636', 'ALJIDAN RIZKIANTO', '636@gmail.com', '$2y$12$LJwlZoA9O8pCFEQQvS1aAeIZuXaW2GYjolxrD7HAE6nrwBD4n0Gzq', 'L', '636', '2000-01-11', '636', '636', '636', '636', '636', '636', 'X-13', 'multimedia', 636, '1', NULL, 'murid', '2024-12-10 17:09:14', '2024-12-10 17:09:14'),
(33, '600', '600', 'ANDHIKA DWI RAHMADI', '600@gmail.com', '$2y$12$jem.73wy8HWbA1tgr4Q4aOOWIBzTbB6OLK3NuTyDgWTfY3A7ddWKe', 'L', '600', '2000-01-11', '600', '600', '600', '600', '600', '600', 'X-13', 'multimedia', 600, '1', NULL, 'murid', '2024-12-10 17:09:52', '2024-12-10 17:09:52'),
(34, '601', '601', 'AZZAHRA ADELYA HARUM', '601@gmail.com', '$2y$12$a0XgJU2PSOuBoE2oxmIoFOn6eWmm7zOOq9UW1el7ub3vhKtaP5U8m', 'L', '601', '2000-01-11', '601', '601', '601', '601', '601', '601', 'X-13', 'multimedia', 601, '1', NULL, 'murid', '2024-12-10 17:10:19', '2024-12-10 17:10:19'),
(35, '602', '602', 'BILLAL ABDI NEGARA', '602@gmail.com', '$2y$12$zYjIVRfiNTGXcjjBgrc2luSTnKrNmbVcJO8DxoruUaC7qsOCrs.qy', 'L', '602', '2000-01-11', '602', '602', '602', '602', '602', '602', 'X-13', 'multimedia', 602, '1', NULL, 'murid', '2024-12-10 17:11:05', '2024-12-10 17:11:05'),
(36, '603', '603', 'DENI FIRMANSYAH', '603@gmail.com', '$2y$12$tG3kn/J1KKhjl/GnovJ68eNl0YTmiz7c3HszW7eSSMc5ulTyEBc8K', 'L', '603', '2000-01-11', '603', '603', '603', '603', '603', '603', 'X-13', 'multimedia', 603, '1', NULL, 'murid', '2024-12-10 17:11:51', '2024-12-10 17:11:51'),
(37, '604', '604', 'DEVAN ALVIANSYAH', '604@gmail.com', '$2y$12$23dfIUr86gPY8AM0vwpjq.19/3jIPrWsPnv8JLNPYoJZM.5JUJEbu', 'L', '604', '2000-01-11', '604', '604', '604', '604', '604', '604', 'X-13', 'multimedia', 604, '1', NULL, 'murid', '2024-12-10 17:12:19', '2024-12-10 17:12:19'),
(38, '605', '605', 'DEVINA PUTRI KHAIRAAN', '605@gmail.com', '$2y$12$OZ6VF1Jv4WgQV27rO9pVJeySI4SNMmb14mAoyCFO798c2TGEovcBO', 'L', '605', '2000-01-11', '605', '605', '605', '605', '605', '605', 'X-13', 'multimedia', 605, '1', NULL, 'murid', '2024-12-10 17:12:47', '2024-12-10 17:12:47'),
(39, '606', '606', 'DHAVIZA AZHAR LINTALANA', '606@gmail.com', '$2y$12$7jOuw7ZhKazGuTwFJzA69Og8RHBAJE5ezexZsRZc5XgZhsFEoAJ2m', 'L', '606', '2000-01-11', '606', '606', '606', '606', '606', '606', 'X-13', 'multimedia', 606, '1', NULL, 'murid', '2024-12-10 17:13:16', '2024-12-10 17:13:16'),
(40, '607', '607', 'FAARIS RIFQI ATSIILAH', '607@gmail.com', '$2y$12$Nu4.HsQGd43OsefqEG/hSeT0SeVdPeT05w8bcmE42Q0eekDvwyOFm', 'L', '607', '2000-01-11', '607', '607', '607', '607', '607', '607', 'X-13', 'multimedia', 607, '1', NULL, 'murid', '2024-12-10 17:13:44', '2024-12-10 17:13:44'),
(41, '608', '608', 'FATHUR RAHMAN AZ ZAKI', '608@gmail.com', '$2y$12$ZaBhntFnyuq2aJlLecWMfejtnEXkUGmv87HjEyyNC/6CbflSiJzs2', 'L', '608', '2000-01-11', '608', '608', '608', '608', '608', '608', 'X-13', 'multimedia', 608, '1', NULL, 'murid', '2024-12-10 17:14:25', '2024-12-10 17:14:25'),
(42, '609', '609', 'FAUZAN ABDURRAHMAN', '609@gmail.com', '$2y$12$74s4t8smgPzM.mBwuWRFS.Ld.vOGzHH9myS0DN8eDce5rEuoYHHZi', 'L', '609', '2000-01-11', '609', '609', '609', '609', '609', '609', 'X-13', 'multimedia', 609, '1', NULL, 'murid', '2024-12-10 17:15:02', '2024-12-10 17:15:02'),
(43, '610', '610', 'FERDY ALDIANSYAH', '610@gmail.com', '$2y$12$WLrQAgZ.jlRBliqkV1.lAONHd1pQy98IkFVr2dWCnoK.54F7/.O7e', 'L', '610', '2000-01-11', '610', '610', '610', '610', '610', '610', 'X-13', 'multimedia', 610, '1', NULL, 'murid', '2024-12-10 17:15:37', '2024-12-10 17:15:37'),
(44, '611', '611', 'FIRLI FAUZI SUPARMAN', '611@gmail.com', '$2y$12$XxztkJ1R/L.ZFn0yxtlD5Ocuoalub39HMbqYZkaEQSMn3NHyUFvI.', 'L', '611', '2000-01-11', '611', '611', '611', '611', '611', '611', 'X-13', 'multimedia', 611, '1', NULL, 'murid', '2024-12-10 17:16:24', '2024-12-10 17:16:24'),
(45, '612', '612', 'GALANG GUMELAR', '612@gmail.com', '$2y$12$Jdg7ZA3zBA6e6EdQhXz/ReVWqLwTo8BpDFnquN9Z/oJ2VrVaTuDW2', 'L', '612', '2000-11-11', '612', '612', '612', '612', '612', '612', 'X-13', 'multimedia', 612, '1', NULL, 'murid', '2024-12-10 17:16:56', '2024-12-10 17:16:56'),
(46, '613', '613', 'HAFIIZH SALLAMUDIIN', '613@gmail.com', '$2y$12$.4m.Bi.hi/ClA03uAMA4ReQ0e9/6hBTvJMY1e/ntmklw5RiNus9l.', 'L', '613', '2000-01-11', '613', '613', '613', '613', '613', '613', 'X-13', 'multimedia', 613, '1', NULL, 'murid', '2024-12-10 17:17:28', '2024-12-10 17:17:28'),
(47, '614', '614', 'I GUSTI NYOMAN MUHAMMAD HAZMAN ZUL QISTHI', '614@gmail.com', '$2y$12$Gp6we96WiT.W0VLMFGf0k.noAnDmNnLIO.41MFk15ThOVOnIROCaK', 'L', '614', '2000-01-11', '614', '614', '614', '614', '614', '614', 'X-13', 'multimedia', 614, '1', NULL, 'murid', '2024-12-10 17:18:00', '2024-12-10 17:18:00'),
(48, '615', '615', 'KENZO MAHARDHIKA FEBRIANO', '615@gmail.com', '$2y$12$s1XVqDBrMlkWfKgalzQLTO91Q3Onq.7ez9mbObYLbiIqdanI.g6zi', 'L', '615', '2000-12-11', '615', '615', '615', '615', '615', '615', 'X-13', 'multimedia', 615, '1', NULL, 'murid', '2024-12-10 17:18:39', '2024-12-10 17:18:39'),
(49, '616', '616', 'MUHAMAD AL RADZIB', '616@gmail.com', '$2y$12$AuFf9Fb3R7cVJi9xAkzZ9Ox6MmLXBJjEZ3KJ2XxNMggOD7awGJ3vG', 'L', '616', '2000-01-11', '616', '616', '616', '616', '616', '616', 'X-13', 'multimedia', 616, '1', NULL, 'murid', '2024-12-10 17:19:03', '2024-12-10 17:19:03'),
(50, '617', '617', 'MUHAMMAD ALFIANSAH', '617@gmail.com', '$2y$12$G1yVi2LjDC10tHTUW2N.cOp3/WDZ2gq9w2NlH.4HB1KMO41d0eecO', 'L', '617', '2000-01-11', '617', '617', '617', '617', '617', '617', 'X-13', 'multimedia', 617, '1', NULL, 'murid', '2024-12-10 17:19:42', '2024-12-10 17:19:42'),
(51, '618', '618', 'MUHAMMAD BARRU HAIKAL', '618@gmail.com', '$2y$12$u5KvGiOAzUdCficRsz1nmew6.X2ri6GnH7WdE4hRTW2ctEArSOvea', 'L', '618', '2000-01-11', '618', '618', '618', '618', '618', '618', 'X-13', 'multimedia', 618, '1', NULL, 'murid', '2024-12-10 17:20:21', '2024-12-10 17:20:21'),
(52, '619', '619', 'MUHAMMAD DENIS MAULANA', '619@gmail.com', '$2y$12$fXgsP6DZwPDBi6H9H/SwPeWcAPfrb3jlb7YkCy6JhkMEsYyzIFm1q', 'L', '619', '2000-01-11', '619', '619', '619', '619', '619', '619', 'X-13', 'multimedia', 619, '1', NULL, 'murid', '2024-12-10 17:20:46', '2024-12-10 17:20:46'),
(53, '620', '620', 'MUHAMMAD FABYAN NURIL GUNAWAN', '620@gmail.com', '$2y$12$SXXrCyULpK3.PZHHoYoCGuv4xIi0G.VGLoLVnJwcX8.2loHi6HegC', 'L', '620', '2000-01-11', '620', '620', '620', '620', '620', '620', 'X-13', 'multimedia', 620, '1', NULL, 'murid', '2024-12-10 17:21:24', '2024-12-10 17:21:24'),
(54, '621', '621', 'MUHAMAD IHZA AZHARI ZULPA', '621@gmail.com', '$2y$12$soC64ngNa3JZdt7pi54okeofIQimI6et.G4bP37Jx882BnKlC8N66', 'L', '621', '2000-01-11', '621', '621', '621', '621', '621', '621', 'X-13', 'multimedia', 621, '1', NULL, 'murid', '2024-12-10 17:23:13', '2024-12-10 17:23:13'),
(55, '622', '622', 'MUHAMMAD JABBAR EL BARRIE', '622@gmail.com', '$2y$12$mkfA0F/Z6rG6xuVptC57p.WupD/hPEfkDOONuhqW7qaNMupe0I0GK', 'L', '622', '2000-01-11', '622', '622', '622', '622', '622', '622', 'X-13', 'multimedia', 622, '1', NULL, 'murid', '2024-12-10 17:23:44', '2024-12-10 17:23:44'),
(56, '623', '623', 'MUHAMMAD PARSAIZYAN', '623@gmail.com', '$2y$12$CgAwzc7WEXWzfiEKI0Cr2udre1Uf8j/7J4E8I4AJHvIkTfJiVcdNW', 'L', '623', '2000-01-11', '623', '623', '623', '623', '623', '623', 'X-13', 'multimedia', 623, '1', NULL, 'murid', '2024-12-10 17:24:17', '2024-12-10 17:24:17'),
(57, '624', '624', 'MUHAMMAD RAFI HANGGARA', '624@gmail.com', '$2y$12$gZst1CwLDJlsqWt.PUBCwuNJ1an0JstwrM4dipgfZz5kw2DcANqHO', 'L', '624', '2000-01-11', '624', '624', '624', '624', '624', '624', 'X-13', 'multimedia', 624, '1', NULL, 'murid', '2024-12-10 17:24:41', '2024-12-10 17:24:41'),
(58, '625', '625', 'MUHAMMAD RAIN NAUFAL', '625@gmail.com', '$2y$12$osTXBHyalfM347Z3pN0C.uGof4WjbkZpNcWsrG2Zqbb3u4YNzaQ1q', 'L', '625', '2000-01-11', '625', '625', '625', '625', '625', '625', 'X-13', 'multimedia', 625, '1', NULL, 'murid', '2024-12-10 17:25:09', '2024-12-10 17:25:09'),
(59, '626', '626', 'MUHAMMAD REZQI PRATAMA', '626@gmail.com', '$2y$12$ec6JiTNsSFFImN2FYEIiIOn82VSwY6nHtIbjLbKlhhRqp3FOAfqte', 'L', '626', '2000-01-11', '626626', '626', '626', '626', '626', '626', 'X-13', 'multimedia', 626, '1', NULL, 'murid', '2024-12-10 17:25:36', '2024-12-10 17:25:36'),
(60, '627', '627', 'M. RIAL HENDRI WIJAYA', '627@gmail.com', '$2y$12$DIQyFvfkm7dmxl8AsQW1hOKweu7A5pAAZ6ksFDoB5bmKvDCWT58wi', 'L', '627', '2000-01-11', '627', '627', '627', '627', '627', '627', 'X-13', 'multimedia', 627, '1', NULL, 'murid', '2024-12-10 17:26:03', '2024-12-10 17:26:03'),
(61, '628', '628', 'MUHAMMAD RIDHO RAHMAWAN', '628@gmail.com', '$2y$12$0WSIEQJgupl8i66FNWXdg.1.6g.fMWf0uzVZLAz9ActCkcppO4cS6', 'L', '628', '2000-01-11', '628', '628', '628', '628', '628', '628', 'X-13', 'multimedia', 628, '1', NULL, 'murid', '2024-12-10 17:26:26', '2024-12-10 17:26:26'),
(62, '629', '629', 'NAJMI ABDUL HADI', '629@gmail.com', '$2y$12$tai0qukFpOtP4KWLekWrrOeYqjV4sjcNua5U3qwZbkSglDEvr3Ov6', 'L', '629', '2000-01-11', '629', '629', '629', '629', '629', '629', 'X-13', 'multimedia', 629, '1', NULL, 'murid', '2024-12-10 17:26:55', '2024-12-10 17:26:55'),
(63, '630', '630', 'NAYSILA ANGGRAENI', '630@gmail.com', '$2y$12$cLD15Hp9UeXqiV8Wiy4fSu7WbVKfJw0yum.lyPmyUJASBajNww4z2', 'L', '630', '2000-01-11', '630', '630', '630', '630', '630', '630', 'X-13', 'multimedia', 630, '1', NULL, 'murid', '2024-12-10 17:29:09', '2024-12-10 17:29:09'),
(64, '631', '631', 'NIZAR NIRWANA BUDIMAN', '631@gmail.com', '$2y$12$R33JUaEuEzd0/AKQROs5N.RnVRCy5yDD5gGcrK8SwsVSrfzL9Q9US', 'L', '631', '2000-01-11', '631', '631', '631', '631', '631', '631', 'X-13', 'multimedia', 631, '1', NULL, 'murid', '2024-12-10 17:29:34', '2024-12-10 17:29:34'),
(65, '632', '632', 'RADEN AHMAD RAMA SEPTIAWAN', '6322@g.com', '$2y$12$iuGWqzp7hoECUXbybiovx.w22fDj/shLhWhlUDtm3.G8wCZ36LAuy', 'L', '632', '2000-01-11', '632', '632', '632', '632', '632', '632', 'X-13', 'multimedia', 632, '1', NULL, 'murid', '2024-12-10 17:30:04', '2024-12-10 17:30:04'),
(66, '633', '633', 'RADEN AJENG SAARAH ZAHIRA HARIO', '633@gmail.com', '$2y$12$DKTrLYgkNy.Mdhf/r0kLm.JJBQiWl31cgKZyqfIqCjnSE69Sa1Rb.', 'L', '633', '2000-01-11', '633', '633', '633', '633', '633', '633', 'X-13', 'multimedia', 633, '1', NULL, 'murid', '2024-12-10 17:30:28', '2024-12-10 17:30:28'),
(67, '634', '634', 'RAFA ABDURRAHMAN', '634@gmail.com', '$2y$12$DS2Mm3RyCVqjCLRhhMlwtuU8K/zF.e.nn4xUSa7RdNTLenBr/GMR2', 'L', '634', '2000-01-11', '634', '634', '634', '634', '634', '634', 'X-13', 'multimedia', 634, '1', NULL, 'murid', '2024-12-10 17:39:46', '2024-12-10 17:39:46'),
(68, '635', '635', 'RAIS RAZIQ ARKANA', '635@gmail.com', '$2y$12$Ypkc1d4wvkaReTk5K0soK.M8c2f1d75HdP1b989pA5IVKa8UXO1xC', 'L', '635', '2000-01-11', '635', '635', '635', '635', '635', '635', 'X-13', 'multimedia', 635, '1', NULL, 'murid', '2024-12-10 17:40:13', '2024-12-10 17:40:13'),
(69, '701', '701', 'RATNA PUTRI TOHIRIN', '701@gmail.com', '$2y$12$reuj4bk/uS6BcxzyMjdk8.STa5fmGuoURQcFlNCQZzgY4ZrYVNA7a', 'L', '701', '2000-10-01', '701', '701', '701', '701', '701', '701', 'X-13', 'multimedia', 701, '1', NULL, 'murid', '2024-12-10 20:02:32', '2024-12-10 20:02:32'),
(70, '702', '702', 'SAHRUL RAMADHAN', '702@gmail.com', '$2y$12$jcpsAKaTJ2wa7zJmX.1uo.L/ygO/BtLr5IFEMoC7F6OgYhFX2ZEcy', 'L', '702', '2000-01-11', '702', '702', '702', '702', '702', '702', 'X-13', 'multimedia', 702, '1', NULL, 'murid', '2024-12-10 20:04:19', '2024-12-10 20:04:19'),
(71, '703', '703', 'SHAFA QIRANA', '703@gmail.com', '$2y$12$QyqWtHlGuVEHnf3mm4DfBubrTxmugwfZCMCDGS0X643emNXh3erxS', 'L', '703', '2000-01-11', '703', '703', '703', '703', '703', '703', 'X-13', 'multimedia', 703, '1', NULL, 'murid', '2024-12-10 20:04:49', '2024-12-10 20:04:49'),
(72, '704', '704', 'SITI ASSHYFA RETNO SANTOSO', '704@gmail.com', '$2y$12$Is5ckMEu1xmd1hp.IAvqjO5KK78jEEZL2MYH17Vsif28N8nM82Ayu', 'L', '704', '2000-01-11', '704', '704', '704', '704', '704', '704', 'X-13', 'multimedia', 704, '1', NULL, 'murid', '2024-12-10 20:05:13', '2024-12-10 20:05:13'),
(73, '705', '705', 'WILDAN BAGUS WICAKSONO', '705@gmail.com', '$2y$12$JKa/Wsgq73TR2mI02O3sze0sY.0YICnrwLZOpCVS9cQl8LeX7bOH2', 'L', '705', '2000-01-11', '705', '705', '705', '705', '705', '705', 'X-13', 'multimedia', 705, '1', NULL, 'murid', '2024-12-10 20:05:40', '2024-12-10 20:05:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_siswa`
--

CREATE TABLE `nilai_siswa` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
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
  `na_materi` int(11) NOT NULL,
  `uts` int(11) NOT NULL,
  `uas` int(11) NOT NULL,
  `kehadiran` int(11) NOT NULL,
  `sikap` int(11) NOT NULL,
  `nilai_rapor` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_At` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `nilai_siswa`
--

INSERT INTO `nilai_siswa` (`id`, `nama_kelas`, `id_kelas`, `nis`, `nama_siswa`, `nama_wali`, `nama_guru`, `nama_mapel`, `nama_materi_1`, `materi_1`, `nama_materi_2`, `materi_2`, `nama_materi_3`, `materi_3`, `nama_materi_4`, `materi_4`, `nama_materi_5`, `materi_5`, `na_materi`, `uts`, `uas`, `kehadiran`, `sikap`, `nilai_rapor`, `created_at`, `updated_At`) VALUES
(1, 'X-1', 21, 300, 'ADINDA PUTRI KANIA', 'pak wira', 'pak wira', 'Bahasa indonesia', '1', '100', '0', '0', '0', '0', '0', '0', '0', '0', 20, 0, 0, 0, 0, 8, '2024-12-10 01:20:54', '2024-12-10 01:20:54'),
(2, 'X-1', 21, 300, 'ADINDA PUTRI KANIA', 'pak wira', 'pak wira', 'Bahasa jepang', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, '2024-12-10 01:50:56', '2024-12-10 01:50:56'),
(3, 'X-13', 21, 601, 'AZZAHRA ADELYA HARUM', 'pak wira', 'pak wira', 'Bahasa indonesia', 'satu', '100', 'dua', '0', 'tiga', '0', 'empat', '0', 'lima', '0', 20, 0, 0, 0, 0, 8, '2024-12-12 08:04:07', '2024-12-12 08:04:07'),
(4, 'X-13', 21, 603, 'DENI FIRMANSYAH', 'pak wira', 'pak wira', 'Kearsipan', 'Materi 1', '100', 'Materi 2', '100', 'Materi 3', '100', 'Materi 4', '100', 'Materi 5', '100', 100, 100, 100, 100, 100, 100, '2024-12-12 20:42:41', '2024-12-12 20:42:41'),
(5, 'X-13', 21, 603, 'DENI FIRMANSYAH', 'pak wira', 'pak wira', 'Bahasa indonesia', 'Materi 1', '80', 'Materi 2', '80', 'Materi 3', '80', 'Materi 4', '80', 'Materi 5', '80', 80, 80, 80, 80, 80, 80, '2024-12-12 20:43:57', '2024-12-12 20:43:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('PLKVGkZiLQhUOHnZaIC2iNcqo3rYLjJj6bEnnw5o', NULL, '104.152.52.58', 'curl/7.61.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUFB0cURkQmR4TWtEcG5ZY0h3Vzgxbmg3V0hudE54UFNrb0xOaG13YiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vd3d3LnNtay5jaGFzb3VsdWl4Lm15LmlkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1734056345),
('y40GtKUv48YULFUKZyUxg3QtqbJtLn3kH4cdI6nf', 57, '180.251.181.160', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieEhzMVprSWRqQ1VSQXEwSnVIbFE3YkdrSGdLbzg1UDgxazRjb2FyUCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8vc21rLmNoYXNvdWx1aXgubXkuaWQvZ3VydS9qYWR3YWwiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo1Nzt9', 1734061564),
('QKZUhh9VDjMEQyxFd5hSJVqUauvfK1A4yPIiFZAR', NULL, '182.253.177.77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidGJGUHJLWjV5RXIyTk1qWVRBWW4weFR3UlJlNGJmNm5GQjFVY2RzbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vc21rLmNoYXNvdWx1aXgubXkuaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1734060868),
('GwYXMSUHdZcJynE9RrYV5wbecGHKctiyE4yRGbEI', NULL, '182.253.177.77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTVFvRjR3dXhvdTVPek5HWGRrR1ZzUDlZZlFOT2RVTmt3SHNHUEFBbSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vc21rLmNoYXNvdWx1aXgubXkuaWQiO319', 1734061729),
('j0OBcR3fZptnS8Qdn8sWdMWDlpveoybuQAm7Qcfz', 49, '180.251.181.160', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicjJra1NoZFFYTElSOVdVQzhuYVFBRUhtYTlBa2M4eHhFY1VBazRsTSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8vc21rLmNoYXNvdWx1aXgubXkuaWQvYWRtaW4va2VsYXMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0OTt9', 1734061806),
('sJa4ijIP7g0dHse7GHhi2vds1ikiET8JgGeDpEZE', NULL, '180.251.181.160', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWVdSMjAzeGdRY2hnOENNcUpTbHB6ZktsVmpYeVpsY2tRbzNHMUhpMyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vc21rLmNoYXNvdWx1aXgubXkuaWQvbG9naW4iO319', 1734077410),
('eHGZPWRyginlNys38rwzGcGFHECYwzOv6u3ZN4BM', NULL, '114.124.208.185', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMzd5b3ExNTJtNlExZFBId2k5bjJ2a1BINVZjQno0bDJsYVo0UmdQbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vc21rLmNoYXNvdWx1aXgubXkuaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1734073315),
('wB2m0gnwnaX69tajtvEF0H0f26cY6kr0ep7u4Voa', NULL, '114.124.206.9', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ1dEdERoajBRTW11VjlVOHFTN1ZrZEc5eXpmRW9OTWxJMElBb3RQUyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vc21rLmNoYXNvdWx1aXgubXkuaWQiO319', 1734078890),
('7AOULCEjbvmFCD1NbuiQGVXCHRGaxhfvkrHTWrIi', NULL, '207.241.225.134', 'Mozilla/5.0 (compatible; archive.org_bot +http://archive.org/details/archive.org_bot) Zeno/7597a01 warc/v0.8.54', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVnEyUkFxcXV4ZGkwQXVTSVI1d3V5cWxJVzFNa3RsZzNyNXA3NVZScCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vd3d3LnNtay5jaGFzb3VsdWl4Lm15LmlkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1734090277),
('H5QisUTGlc30iaASTy2um3Ac6DM6TxupntiF0kCV', NULL, '141.148.153.213', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.0 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWjVGcktxN1Racnp0NzBHREJnM0Q0ejNWSmwwc1BmNTRVU01ZT3B5VSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vc21rLmNoYXNvdWx1aXgubXkuaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1734090827),
('h9n6F0BQpThbDXwnb9j4tXtiCeTu12ljZYtxbjTd', NULL, '141.148.153.213', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.2 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNk95QUx1dEl6SWtMWXRlNzBWNjIxUmpyaUd4eWpvSFY5Q0d6YnRkViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vc21rLmNoYXNvdWx1aXgubXkuaWQvaW1hZ2VzL2xvZ29wZW1idXQucG5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1734090830),
('GZkXHsGFVrizolJo8gVhKLxVuyqFSYi4bLYIytTa', NULL, '180.251.181.167', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidmhIWG90NmRnb0huMG1ScTVDaEhqcFA4WkRWUFUxNlZENEdIVjRXciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vc21rLmNoYXNvdWx1aXgubXkuaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1734103052),
('UPunbA7lnnwfb7P84QLqim76nYOgY0VYQRIPUdhY', NULL, '180.251.181.167', 'WhatsApp/2.23.20.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSWJ0STBaS1h2TzBWMHdQWkI5SGRRWEZub0lOTEp6emFUajVwSFhTVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vc21rLmNoYXNvdWx1aXgubXkuaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1734105115),
('4BVhGze3L6cygyUw6gISHH4Jqmry6HJYHyE55q0J', NULL, '114.125.230.124', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/131.0.6778.103 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicm9lUlNuNzRvU3FSdGMzOXppYWJUa1FEbnBwOXpyTFJmczltcUt3UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vc21rLmNoYXNvdWx1aXgubXkuaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1734108370),
('qZKMMhjipYtY7Hu2byWVvfKBbhNywpkPtijFu8Py', NULL, '114.10.98.253', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib3dKdXRWRUY0WVpGWmRDbENjNXc3N05EVTlxdFd5aEZYdm5JdDVhbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vc21rLmNoYXNvdWx1aXgubXkuaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1734137142),
('PLHrCa2TaJ0ZDepORw4h0b69FSZiSXlDG5jtzXhZ', NULL, '139.59.34.150', 'Mozilla/5.0 (compatible)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibVQ4Y0tlVGtjSG01aVdJODg5d3BMT042QUtNUzVKWkV1WVMxeENmUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vd3d3LnNtay5jaGFzb3VsdWl4Lm15LmlkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1734139613),
('TITWVv7j8pOd1S2ZiliWCBore3K8Q3Zs5wYrOP8U', NULL, '76.152.201.44', 'Mozilla/5.0 (SS; Linux i686; rv:123.0) Gecko/20100101 Firefox/123.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY25Cck1CSkc4c09takZLdkxEZXRZNHRRdVdUdzVpVDV0UlFBd1BCciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vc21rLmNoYXNvdWx1aXgubXkuaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1734153596),
('uw3eyyB9P22ntAxU2k6V68YRFGq2xWOKm56n1bqK', NULL, '76.152.201.44', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV05sQzkyMzNxNXhJOW1wNEh2V0VJbzJhUXdlOGRsZ0RBek1mUjQ2SSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vd3d3LnNtay5jaGFzb3VsdWl4Lm15LmlkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1734154740);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('murid','guru','wali','admin') NOT NULL DEFAULT 'murid',
  `nip` varchar(255) DEFAULT NULL,
  `nis` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `nip`, `nis`, `phone`, `address`, `avatar`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(49, 'admin', '111@gmail.com', '$2y$12$f5m6QATw6yEOln.rhtGukuOcSN7Vb5ZjTmpi1daJftD7RdkI0jU82', 'admin', '111', NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-07 20:37:30', '2024-12-07 20:37:30', NULL),
(57, 'pak wira', '200@gmail.com', '$2y$12$DdrifBc6cIOQq4PiY/9z7uuKWnUxLvFU8qRrruABZeyzugFjSN/Gi', 'wali', '200', NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-08 05:38:15', '2024-12-08 05:38:38', NULL),
(58, '201', '201@gmail.com', '$2y$12$iUHeUqQ4Bdae/PhsFcOO8elWm2yOXDA4iRj/AqJOYpVPwiRu.s.SK', 'guru', '201', NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-08 05:38:30', '2024-12-08 05:38:30', NULL),
(59, 'ADINDA PUTRI KANIA', '300@gmail.com', '$2y$12$mJWZM9wTp7TQruX3EnOpt.k6WJrfXoHJuEQy9s0bE0mo0lAL4ogn.', 'murid', NULL, '300', NULL, NULL, NULL, NULL, NULL, '2024-12-08 05:39:36', '2024-12-10 00:40:30', NULL),
(66, 'AHMAD FAUZAN KHOERI', 'donyy1472@gmail.com', '$2y$12$eF8Sa41ZLbn8H1q1yAqR8.bu5gRy7OzlVV/eO9vOfH/cQ1QOjXcY.', 'murid', NULL, '00', NULL, NULL, NULL, NULL, NULL, '2024-12-10 01:29:18', '2024-12-10 01:29:18', NULL),
(67, 'ALJIDAN RIZKIANTO', '636@gmail.com', '$2y$12$LJwlZoA9O8pCFEQQvS1aAeIZuXaW2GYjolxrD7HAE6nrwBD4n0Gzq', 'murid', NULL, '636', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:09:14', '2024-12-10 17:09:14', NULL),
(68, 'ANDHIKA DWI RAHMADI', '600@gmail.com', '$2y$12$jem.73wy8HWbA1tgr4Q4aOOWIBzTbB6OLK3NuTyDgWTfY3A7ddWKe', 'murid', NULL, '600', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:09:52', '2024-12-10 17:09:52', NULL),
(69, 'AZZAHRA ADELYA HARUM', '601@gmail.com', '$2y$12$a0XgJU2PSOuBoE2oxmIoFOn6eWmm7zOOq9UW1el7ub3vhKtaP5U8m', 'murid', NULL, '601', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:10:19', '2024-12-10 17:10:19', NULL),
(70, 'BILLAL ABDI NEGARA', '602@gmail.com', '$2y$12$zYjIVRfiNTGXcjjBgrc2luSTnKrNmbVcJO8DxoruUaC7qsOCrs.qy', 'murid', NULL, '602', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:11:05', '2024-12-10 17:11:05', NULL),
(71, 'DENI FIRMANSYAH', '603@gmail.com', '$2y$12$tG3kn/J1KKhjl/GnovJ68eNl0YTmiz7c3HszW7eSSMc5ulTyEBc8K', 'murid', NULL, '603', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:11:51', '2024-12-10 17:11:51', NULL),
(72, 'DEVAN ALVIANSYAH', '604@gmail.com', '$2y$12$23dfIUr86gPY8AM0vwpjq.19/3jIPrWsPnv8JLNPYoJZM.5JUJEbu', 'murid', NULL, '604', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:12:19', '2024-12-10 17:12:19', NULL),
(73, 'DEVINA PUTRI KHAIRAAN', '605@gmail.com', '$2y$12$OZ6VF1Jv4WgQV27rO9pVJeySI4SNMmb14mAoyCFO798c2TGEovcBO', 'murid', NULL, '605', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:12:47', '2024-12-10 17:12:47', NULL),
(74, 'DHAVIZA AZHAR LINTALANA', '606@gmail.com', '$2y$12$7jOuw7ZhKazGuTwFJzA69Og8RHBAJE5ezexZsRZc5XgZhsFEoAJ2m', 'murid', NULL, '606', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:13:16', '2024-12-10 17:13:16', NULL),
(75, 'FAARIS RIFQI ATSIILAH', '607@gmail.com', '$2y$12$Nu4.HsQGd43OsefqEG/hSeT0SeVdPeT05w8bcmE42Q0eekDvwyOFm', 'murid', NULL, '607', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:13:44', '2024-12-10 17:13:44', NULL),
(76, 'FATHUR RAHMAN AZ ZAKI', '608@gmail.com', '$2y$12$ZaBhntFnyuq2aJlLecWMfejtnEXkUGmv87HjEyyNC/6CbflSiJzs2', 'murid', NULL, '608', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:14:25', '2024-12-10 17:14:25', NULL),
(77, 'FAUZAN ABDURRAHMAN', '609@gmail.com', '$2y$12$74s4t8smgPzM.mBwuWRFS.Ld.vOGzHH9myS0DN8eDce5rEuoYHHZi', 'murid', NULL, '609', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:15:02', '2024-12-10 17:15:02', NULL),
(78, 'FERDY ALDIANSYAH', '610@gmail.com', '$2y$12$WLrQAgZ.jlRBliqkV1.lAONHd1pQy98IkFVr2dWCnoK.54F7/.O7e', 'murid', NULL, '610', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:15:37', '2024-12-10 17:15:37', NULL),
(79, 'FIRLI FAUZI SUPARMAN', '611@gmail.com', '$2y$12$XxztkJ1R/L.ZFn0yxtlD5Ocuoalub39HMbqYZkaEQSMn3NHyUFvI.', 'murid', NULL, '611', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:16:24', '2024-12-10 17:16:24', NULL),
(80, 'GALANG GUMELAR', '612@gmail.com', '$2y$12$Jdg7ZA3zBA6e6EdQhXz/ReVWqLwTo8BpDFnquN9Z/oJ2VrVaTuDW2', 'murid', NULL, '612', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:16:56', '2024-12-10 17:16:56', NULL),
(81, 'HAFIIZH SALLAMUDIIN', '613@gmail.com', '$2y$12$.4m.Bi.hi/ClA03uAMA4ReQ0e9/6hBTvJMY1e/ntmklw5RiNus9l.', 'murid', NULL, '613', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:17:29', '2024-12-10 17:17:29', NULL),
(82, 'I GUSTI NYOMAN MUHAMMAD HAZMAN ZUL QISTHI', '614@gmail.com', '$2y$12$Gp6we96WiT.W0VLMFGf0k.noAnDmNnLIO.41MFk15ThOVOnIROCaK', 'murid', NULL, '614', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:18:00', '2024-12-10 17:18:00', NULL),
(83, 'KENZO MAHARDHIKA FEBRIANO', '615@gmail.com', '$2y$12$s1XVqDBrMlkWfKgalzQLTO91Q3Onq.7ez9mbObYLbiIqdanI.g6zi', 'murid', NULL, '615', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:18:39', '2024-12-10 17:18:39', NULL),
(84, 'MUHAMAD AL RADZIB', '616@gmail.com', '$2y$12$AuFf9Fb3R7cVJi9xAkzZ9Ox6MmLXBJjEZ3KJ2XxNMggOD7awGJ3vG', 'murid', NULL, '616', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:19:03', '2024-12-10 17:19:03', NULL),
(85, 'MUHAMMAD ALFIANSAH', '617@gmail.com', '$2y$12$G1yVi2LjDC10tHTUW2N.cOp3/WDZ2gq9w2NlH.4HB1KMO41d0eecO', 'murid', NULL, '617', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:19:42', '2024-12-10 17:19:42', NULL),
(86, 'MUHAMMAD BARRU HAIKAL', '618@gmail.com', '$2y$12$u5KvGiOAzUdCficRsz1nmew6.X2ri6GnH7WdE4hRTW2ctEArSOvea', 'murid', NULL, '618', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:20:21', '2024-12-10 17:20:21', NULL),
(87, 'MUHAMMAD DENIS MAULANA', '619@gmail.com', '$2y$12$fXgsP6DZwPDBi6H9H/SwPeWcAPfrb3jlb7YkCy6JhkMEsYyzIFm1q', 'murid', NULL, '619', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:20:46', '2024-12-10 17:20:46', NULL),
(88, 'MUHAMMAD FABYAN NURIL GUNAWAN', '620@gmail.com', '$2y$12$SXXrCyULpK3.PZHHoYoCGuv4xIi0G.VGLoLVnJwcX8.2loHi6HegC', 'murid', NULL, '620', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:21:24', '2024-12-10 17:21:24', NULL),
(89, 'MUHAMAD IHZA AZHARI ZULPA', '621@gmail.com', '$2y$12$soC64ngNa3JZdt7pi54okeofIQimI6et.G4bP37Jx882BnKlC8N66', 'murid', NULL, '621', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:23:13', '2024-12-10 17:23:13', NULL),
(90, 'MUHAMMAD JABBAR EL BARRIE', '622@gmail.com', '$2y$12$mkfA0F/Z6rG6xuVptC57p.WupD/hPEfkDOONuhqW7qaNMupe0I0GK', 'murid', NULL, '622', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:23:44', '2024-12-10 17:23:44', NULL),
(91, 'MUHAMMAD PARSAIZYAN', '623@gmail.com', '$2y$12$CgAwzc7WEXWzfiEKI0Cr2udre1Uf8j/7J4E8I4AJHvIkTfJiVcdNW', 'murid', NULL, '623', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:24:17', '2024-12-10 17:24:17', NULL),
(92, 'MUHAMMAD RAFI HANGGARA', '624@gmail.com', '$2y$12$gZst1CwLDJlsqWt.PUBCwuNJ1an0JstwrM4dipgfZz5kw2DcANqHO', 'murid', NULL, '624', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:24:41', '2024-12-10 17:24:41', NULL),
(93, 'MUHAMMAD RAIN NAUFAL', '625@gmail.com', '$2y$12$osTXBHyalfM347Z3pN0C.uGof4WjbkZpNcWsrG2Zqbb3u4YNzaQ1q', 'murid', NULL, '625', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:25:09', '2024-12-10 17:25:09', NULL),
(94, 'MUHAMMAD REZQI PRATAMA', '626@gmail.com', '$2y$12$ec6JiTNsSFFImN2FYEIiIOn82VSwY6nHtIbjLbKlhhRqp3FOAfqte', 'murid', NULL, '626', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:25:36', '2024-12-10 17:25:36', NULL),
(95, 'M. RIAL HENDRI WIJAYA', '627@gmail.com', '$2y$12$DIQyFvfkm7dmxl8AsQW1hOKweu7A5pAAZ6ksFDoB5bmKvDCWT58wi', 'murid', NULL, '627', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:26:03', '2024-12-10 17:26:03', NULL),
(96, 'MUHAMMAD RIDHO RAHMAWAN', '628@gmail.com', '$2y$12$0WSIEQJgupl8i66FNWXdg.1.6g.fMWf0uzVZLAz9ActCkcppO4cS6', 'murid', NULL, '628', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:26:26', '2024-12-10 17:26:26', NULL),
(97, 'NAJMI ABDUL HADI', '629@gmail.com', '$2y$12$tai0qukFpOtP4KWLekWrrOeYqjV4sjcNua5U3qwZbkSglDEvr3Ov6', 'murid', NULL, '629', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:26:55', '2024-12-10 17:26:55', NULL),
(98, 'NAYSILA ANGGRAENI', '630@gmail.com', '$2y$12$cLD15Hp9UeXqiV8Wiy4fSu7WbVKfJw0yum.lyPmyUJASBajNww4z2', 'murid', NULL, '630', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:29:09', '2024-12-10 17:29:09', NULL),
(99, 'NIZAR NIRWANA BUDIMAN', '631@gmail.com', '$2y$12$R33JUaEuEzd0/AKQROs5N.RnVRCy5yDD5gGcrK8SwsVSrfzL9Q9US', 'murid', NULL, '631', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:29:34', '2024-12-10 17:29:34', NULL),
(100, 'RADEN AHMAD RAMA SEPTIAWAN', '6322@g.com', '$2y$12$iuGWqzp7hoECUXbybiovx.w22fDj/shLhWhlUDtm3.G8wCZ36LAuy', 'murid', NULL, '632', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:30:04', '2024-12-10 17:30:04', NULL),
(101, 'RADEN AJENG SAARAH ZAHIRA HARIO', '633@gmail.com', '$2y$12$DKTrLYgkNy.Mdhf/r0kLm.JJBQiWl31cgKZyqfIqCjnSE69Sa1Rb.', 'murid', NULL, '633', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:30:28', '2024-12-10 17:30:28', NULL),
(102, 'RAFA ABDURRAHMAN', '634@gmail.com', '$2y$12$DS2Mm3RyCVqjCLRhhMlwtuU8K/zF.e.nn4xUSa7RdNTLenBr/GMR2', 'murid', NULL, '634', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:39:46', '2024-12-10 17:39:46', NULL),
(103, 'RAIS RAZIQ ARKANA', '635@gmail.com', '$2y$12$Ypkc1d4wvkaReTk5K0soK.M8c2f1d75HdP1b989pA5IVKa8UXO1xC', 'murid', NULL, '635', NULL, NULL, NULL, NULL, NULL, '2024-12-10 17:40:13', '2024-12-10 17:40:13', NULL),
(104, 'RATNA PUTRI TOHIRIN', '701@gmail.com', '$2y$12$reuj4bk/uS6BcxzyMjdk8.STa5fmGuoURQcFlNCQZzgY4ZrYVNA7a', 'murid', NULL, '701', NULL, NULL, NULL, NULL, NULL, '2024-12-10 20:02:32', '2024-12-10 20:02:32', NULL),
(105, 'SAHRUL RAMADHAN', '702@gmail.com', '$2y$12$jcpsAKaTJ2wa7zJmX.1uo.L/ygO/BtLr5IFEMoC7F6OgYhFX2ZEcy', 'murid', NULL, '702', NULL, NULL, NULL, NULL, NULL, '2024-12-10 20:04:19', '2024-12-10 20:04:19', NULL),
(106, 'SHAFA QIRANA', '703@gmail.com', '$2y$12$QyqWtHlGuVEHnf3mm4DfBubrTxmugwfZCMCDGS0X643emNXh3erxS', 'murid', NULL, '703', NULL, NULL, NULL, NULL, NULL, '2024-12-10 20:04:49', '2024-12-10 20:04:49', NULL),
(107, 'SITI ASSHYFA RETNO SANTOSO', '704@gmail.com', '$2y$12$Is5ckMEu1xmd1hp.IAvqjO5KK78jEEZL2MYH17Vsif28N8nM82Ayu', 'murid', NULL, '704', NULL, NULL, NULL, NULL, NULL, '2024-12-10 20:05:13', '2024-12-10 20:05:13', NULL),
(108, 'WILDAN BAGUS WICAKSONO', '705@gmail.com', '$2y$12$JKa/Wsgq73TR2mI02O3sze0sY.0YICnrwLZOpCVS9cQl8LeX7bOH2', 'murid', NULL, '705', NULL, NULL, NULL, NULL, NULL, '2024-12-10 20:05:40', '2024-12-10 20:05:40', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `walis`
--

CREATE TABLE `walis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('murid','guru','wali','admin') NOT NULL DEFAULT 'wali',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `walis`
--

INSERT INTO `walis` (`id`, `nip`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(22, '200', 'pak wira', '200@gmail.com', '$2y$12$DdrifBc6cIOQq4PiY/9z7uuKWnUxLvFU8qRrruABZeyzugFjSN/Gi', 'wali', '2024-12-08 05:38:38', '2024-12-08 05:38:38');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_nip_unique` (`nip`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `daftar_mapel`
--
ALTER TABLE `daftar_mapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daftar_mapel_id_kelas_foreign` (`id_kelas`);

--
-- Indeks untuk tabel `daftar_siswa`
--
ALTER TABLE `daftar_siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wali_kelas` (`wali_kelas`),
  ADD UNIQUE KEY `id_kelas` (`id_kelas`),
  ADD UNIQUE KEY `id_wali` (`nip`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gurus_nip_unique` (`nip`),
  ADD UNIQUE KEY `gurus_email_unique` (`email`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `matapelajarans`
--
ALTER TABLE `matapelajarans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matapelajarans_kode_mapel_unique` (`kode_mapel`);

--
-- Indeks untuk tabel `materi_pelajarans`
--
ALTER TABLE `materi_pelajarans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `murids`
--
ALTER TABLE `murids`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `murids_nis_unique` (`nis`),
  ADD UNIQUE KEY `murids_nisn_unique` (`nisn`),
  ADD UNIQUE KEY `murids_email_unique` (`email`);

--
-- Indeks untuk tabel `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `walis`
--
ALTER TABLE `walis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `daftar_mapel`
--
ALTER TABLE `daftar_mapel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `daftar_siswa`
--
ALTER TABLE `daftar_siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `matapelajarans`
--
ALTER TABLE `matapelajarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `materi_pelajarans`
--
ALTER TABLE `materi_pelajarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `murids`
--
ALTER TABLE `murids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT untuk tabel `walis`
--
ALTER TABLE `walis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
