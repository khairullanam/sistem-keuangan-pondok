-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 16 Jul 2025 pada 19.13
-- Versi server: 8.0.30
-- Versi PHP: 8.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpondok`
--
CREATE DATABASE IF NOT EXISTS `dbpondok` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `dbpondok`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bendaharas`
--

CREATE TABLE `bendaharas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bendaharas`
--

INSERT INTO `bendaharas` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'walid', '2025-06-24 15:35:13', '2025-06-24 15:35:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_ahmadhujairifarid@example.com|127.0.0.1', 'i:2;', 1751021633),
('laravel_cache_ahmadhujairifarid@example.com|127.0.0.1:timer', 'i:1751021633;', 1751021633),
('laravel_cache_ahmadhujairifarid@santri.local|127.0.0.1', 'i:2;', 1751021891),
('laravel_cache_ahmadhujairifarid@santri.local|127.0.0.1:timer', 'i:1751021891;', 1751021891),
('laravel_cache_walid@santri.local|127.0.0.1', 'i:1;', 1751021918),
('laravel_cache_walid@santri.local|127.0.0.1:timer', 'i:1751021918;', 1751021918);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jobs`
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
-- Struktur dari tabel `job_batches`
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
-- Struktur dari tabel `keuangans`
--

CREATE TABLE `keuangans` (
  `id` bigint UNSIGNED NOT NULL,
  `santri_id` bigint UNSIGNED NOT NULL,
  `bendahara_id` bigint UNSIGNED NOT NULL,
  `jenis_transaksi` enum('bayar_bulanan','simpanan','penarikan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `manual_override` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keuangans`
--

INSERT INTO `keuangans` (`id`, `santri_id`, `bendahara_id`, `jenis_transaksi`, `jumlah`, `tanggal`, `keterangan`, `manual_override`, `created_at`, `updated_at`) VALUES
(9, 3, 1, 'simpanan', 500000, '2025-06-28', NULL, 0, '2025-06-28 08:10:47', '2025-06-28 08:10:47'),
(10, 3, 1, 'penarikan', 50000, '2025-06-28', NULL, 0, '2025-06-28 08:11:10', '2025-06-28 08:11:10'),
(11, 3, 1, 'bayar_bulanan', 250000, '2025-06-28', NULL, 1, '2025-06-28 08:11:59', '2025-06-28 08:11:59'),
(12, 4, 1, 'bayar_bulanan', 250000, '2025-06-28', NULL, 1, '2025-06-28 08:46:07', '2025-06-28 08:46:07'),
(13, 3, 1, 'bayar_bulanan', 250000, '2025-06-28', NULL, 1, '2025-06-28 08:57:42', '2025-06-28 08:57:42'),
(14, 5, 1, 'bayar_bulanan', 250000, '2025-06-28', 'spp juni', 1, '2025-06-28 08:58:02', '2025-06-28 08:58:02'),
(15, 3, 1, 'penarikan', 100000, '2025-07-01', NULL, 0, '2025-07-01 01:04:55', '2025-07-01 01:04:55'),
(16, 3, 1, 'bayar_bulanan', 250000, '2025-07-01', NULL, 1, '2025-07-01 01:06:27', '2025-07-01 01:06:27'),
(17, 3, 1, 'bayar_bulanan', 250000, '2025-01-01', NULL, 1, '2025-07-01 01:08:44', '2025-07-01 01:08:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `koperasi_transactions`
--

CREATE TABLE `koperasi_transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `santri_id` bigint UNSIGNED NOT NULL,
  `jenis_transaksi` enum('pembelian','penjualan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `metode_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tunai',
  `jumlah_pembayaran` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `koperasi_transactions`
--

INSERT INTO `koperasi_transactions` (`id`, `santri_id`, `jenis_transaksi`, `created_at`, `updated_at`, `metode_pembayaran`, `jumlah_pembayaran`) VALUES
(3, 3, 'pembelian', '2025-06-28 08:13:33', '2025-06-28 08:13:33', 'tunai', 0),
(4, 3, 'pembelian', '2025-06-28 08:13:33', '2025-06-28 08:13:33', 'tunai', 0),
(5, 4, 'pembelian', '2025-06-28 11:24:08', '2025-06-28 11:24:08', 'tunai', 120000),
(6, 3, 'pembelian', '2025-07-01 01:00:36', '2025-07-01 01:00:36', 'tunai', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `koperasi_transaction_details`
--

CREATE TABLE `koperasi_transaction_details` (
  `id` bigint UNSIGNED NOT NULL,
  `koperasi_transaction_id` bigint UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL DEFAULT '1',
  `harga_satuan` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `koperasi_transaction_details`
--

INSERT INTO `koperasi_transaction_details` (`id`, `koperasi_transaction_id`, `nama_barang`, `jumlah`, `harga_satuan`, `created_at`, `updated_at`) VALUES
(9, 5, 'Tafsir Jalalain', 1, 55000, '2025-06-28 11:24:08', '2025-06-28 11:24:08'),
(10, 5, 'Bulughul Maram', 1, 65000, '2025-06-28 11:24:08', '2025-06-28 11:24:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_20_081000_create_bendaharas_table', 1),
(5, '2025_05_20_082000_create_santris_table', 1),
(6, '2025_05_20_082948_create_keuangans_table', 1),
(7, '2025_05_24_055704_create_koperasi_transactions_table', 1),
(8, '2025_06_08_092642_create_permission_tables', 1),
(9, '2025_06_17_171449_create_koperasi_transaction_details_table', 1),
(10, '2025_06_17_171849_update_koperasi_transactions_table', 1),
(11, '2025_06_17_175015_remove_nama_barang_from_koperasi_transactions_table', 1),
(12, '2025_06_17_175650_remove_harga_satuan_from_koperasi_transactions_table', 1),
(13, '2025_06_17_181431_add_metode_pembayaran_to_koperasi_transactions_table', 1),
(14, '2025_06_17_181432_add_metode_pembayaran_to_koperasi_transactions_table', 1),
(15, '2025_06_17_184216_add_jumlah_pembayaran_to_koperasi_transactions_table', 1),
(16, '2025_06_22_191417_add_manual_override_to_keuangans_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `santris`
--

CREATE TABLE `santris` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kamar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `bendahara_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `santris`
--

INSERT INTO `santris` (`id`, `nama`, `nis`, `alamat`, `tanggal_lahir`, `kamar`, `user_id`, `bendahara_id`, `created_at`, `updated_at`) VALUES
(3, 'Ahmad Farhan Nashrullah', '535301', 'Bluto', '2009-04-27', '1A', 7, 1, '2025-06-26 11:03:22', '2025-06-26 11:25:18'),
(4, 'Abd Kholid', '535302', 'gunung kembar', '2011-02-04', '1A', 8, 1, '2025-06-26 11:24:59', '2025-06-26 11:24:59'),
(5, 'Moh. Khairul Rizal', '535303', 'Batang Batang', '2012-03-29', '1A', 9, 1, '2025-06-26 11:37:58', '2025-06-26 11:37:58'),
(6, 'Moh. Nur Yasin', '535304', 'Kalianget', '2009-07-08', '1A', 10, 1, '2025-06-26 11:41:22', '2025-06-26 11:41:22'),
(7, 'Ilham Nabil Satriawan', '535305', 'Bluto', '2008-11-09', '1A', 11, 1, '2025-06-26 11:43:20', '2025-06-26 11:43:20'),
(8, 'Ahmad Hujairi Farid', '535306', 'Kolor', '2007-03-30', '2A', 12, 1, '2025-06-26 11:45:11', '2025-06-26 11:45:11'),
(9, 'Ahmad Ulil Abrori Fatchullah', '535307', 'Talango', '2007-05-21', '2A', 13, 1, '2025-06-26 11:58:04', '2025-06-26 11:58:04'),
(10, 'Radif Vidariansyah', '535308', 'Pagar Batu', '2008-06-18', '2A', 14, 1, '2025-06-26 12:00:42', '2025-06-26 12:00:42'),
(11, 'Moh. Dahlan', '535309', 'Ambunten', '2007-02-08', '2A', 15, 1, '2025-06-26 12:03:38', '2025-06-26 12:03:38'),
(12, 'Ahmad Ramadani', '535310', 'Talango', '2008-09-01', '2A', 16, 1, '2025-06-26 12:05:42', '2025-06-26 12:05:42'),
(13, 'Moh. Aldiansah', '535311', 'Talango', '2010-03-04', '3A', 17, 1, '2025-06-26 12:07:14', '2025-06-26 12:07:14'),
(14, 'Moh. Kurniawan Ramadhani', '535312', 'Kebunan', '2006-10-12', '3A', 18, 1, '2025-06-26 12:18:51', '2025-06-26 12:18:51'),
(15, 'Ach. Hidayatur Rahman', '535313', 'Gunggung', '2007-09-13', '3A', 19, 1, '2025-06-26 12:31:49', '2025-06-26 12:32:07'),
(16, 'Ahmad Zain Ubaidillah', '535314', 'Talango', '2007-11-22', '3A', 20, 1, '2025-06-26 12:34:31', '2025-06-26 12:34:31'),
(17, 'Moh. Khofif Fauzi', '535315', 'Rubaru', '2008-07-25', '3A', 21, 1, '2025-06-26 12:36:11', '2025-06-26 12:36:11'),
(18, 'Ach. Riziq Hamidy', '535316', 'Talango', '2008-07-15', '1B', 22, 1, '2025-06-26 12:55:59', '2025-06-26 12:55:59'),
(19, 'Ach. Zainuri', '535317', 'Gapura', '2007-06-29', '1B', 23, 1, '2025-06-26 12:57:18', '2025-06-26 12:57:18'),
(20, 'Ach. Rafiqi', '535318', 'Andulang', '2007-11-30', '1B', 24, 1, '2025-06-26 12:59:02', '2025-06-26 12:59:02'),
(21, 'Zaid Ubaidillah', '535319', 'Lonos', '2009-02-20', '1B', 25, 1, '2025-06-26 13:10:47', '2025-06-26 13:10:47'),
(22, 'Moh. Alwan Fahrullah', '535320', 'Bangkal', '2008-08-01', '1B', 26, 1, '2025-06-26 13:15:53', '2025-06-26 13:15:53'),
(23, 'Rafli Hidayatul Arifin', '535321', 'Talango', '2006-11-27', '2B', 27, 1, '2025-06-26 13:23:03', '2025-06-26 13:23:03'),
(24, 'Khairul Ahnaf Fadhilil Luthfi', '535322', 'Talango', '2009-09-09', '2B', 28, 1, '2025-06-26 13:24:17', '2025-06-26 13:24:17'),
(25, 'Ahmad Fahmi Rofiqi', '535323', 'Talango', '2008-08-26', '2B', 29, 1, '2025-06-26 13:25:32', '2025-06-26 13:25:32'),
(26, 'Adli Agus Triyawan', '535324', 'Talango', '2008-08-28', '2B', 30, 1, '2025-06-26 13:26:43', '2025-06-26 13:26:43'),
(27, 'Misbahul Umam', '535325', 'Talango', '2011-10-14', '2B', 31, 1, '2025-06-26 13:27:58', '2025-06-26 13:27:58'),
(28, 'Moh. Hamdan Jamil', '535326', 'Batu Putih Daya', '2005-12-23', '3B', 32, 1, '2025-06-26 13:30:27', '2025-06-26 13:30:27'),
(29, 'Moh. Fachril Umam', '535327', 'Brambang', '2008-05-22', '3B', 33, 1, '2025-06-26 13:31:33', '2025-06-26 13:31:33'),
(30, 'Imam Rofiqi', '535328', 'Grujugan', '2008-02-28', '3B', 34, 1, '2025-06-26 13:33:02', '2025-06-26 13:33:02'),
(31, 'Moh. Izzul Haromain', '535329', 'Dasuk', '2008-03-31', '3B', 35, 1, '2025-06-26 13:34:20', '2025-06-26 13:34:20'),
(32, 'Moh. Fayat', '535330', 'Manding', '2008-03-26', '3B', 36, 1, '2025-06-26 13:35:30', '2025-06-26 13:35:30'),
(33, 'walid', '123456', 'manding', '2002-10-08', '1c', 37, 1, '2025-06-27 03:55:22', '2025-06-27 03:55:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('X7evmTmMxJ60tg2iioo3sEPtDVvitAU1szGRNR50', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoid0tnaVdka2RoZTZoSXpXejVJMWFKa1ZQdmZyVWd0QTZJVTRPUU9oZCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL2tldWFuZ2FuIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iZW5kYWhhcmEva2V1YW5nYW4va2FtYXIvMUEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1751773765),
('Zk7natPjIJQeeyhZjkjSXK0EfviToufqgp0M6EEt', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibjBWSUFKVVZ4RVV0elRXZGpnaGROZGNiQUVJOXpQdVhNaGxSdVV1dyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9zYW50cmk/cGFnZT0zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1752127329);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@example.com', NULL, '$2y$12$ipoocCM/Dp823FbPDPfpKeE/9IUoBLwn8hGd5XdMsGGGLsBA91Q8m', 'admin', NULL, '2025-06-24 15:35:12', '2025-06-24 15:35:12'),
(2, 'Bendahara', 'bendahara@example.com', NULL, '$2y$12$r..3RkbTRPMfwxG/TNETh.xaXJuogNpfbD6Sii47n/P4vbFRU/E.2', 'bendahara', NULL, '2025-06-24 15:35:12', '2025-06-24 15:35:12'),
(3, 'Koperasi', 'koperasi@example.com', NULL, '$2y$12$PBdxToF1ZxORWjkrju7TT.TIGV4Y7PxOz6J.8zJ1czU1j0glvxTli', 'koperasi', NULL, '2025-06-24 15:35:12', '2025-06-24 15:35:12'),
(4, 'Santri', 'santri@example.com', NULL, '$2y$12$0lb27zuLxMd/H4ybMgEk1e9ETt9GAElnM1IhmCa0ZaJdGf87nlkY6', 'santri', NULL, '2025-06-24 15:35:13', '2025-06-24 15:35:13'),
(5, 'Boger', 'Boger@santri.local', NULL, '$2y$12$.MmDqwfrmVqfDccLXaFJE..iXNPedfAwkCR893KKI4Ugm/Oj3OkyG', 'santri', NULL, '2025-06-24 15:39:51', '2025-06-24 15:39:51'),
(6, 'Faisal Haq', 'FaisalHaq@santri.local', NULL, '$2y$12$Cmvzoxiot.zSYuHri0zRy.YKZ3la0v7T4fpBycSXbTPmJKRwGiUja', 'santri', NULL, '2025-06-25 07:35:23', '2025-06-25 07:35:23'),
(7, 'Ahmad Farhan Nashrullah', 'AhmadFarhanNashrullah@santri.local', NULL, '$2y$12$6hj0F4gFn8aZSx3zY.rOGunJxlZOpAkGq5HCcLpXO6AZrEhdRWUkm', 'santri', NULL, '2025-06-26 11:03:22', '2025-06-26 11:03:22'),
(8, 'Abd Kholid', 'AbdKholid@santri.local', NULL, '$2y$12$WuXHsUAXUvbsFfVeROGR.OiPPVvvSjK.H.t5iNMJMnwjPzbENmvw.', 'santri', NULL, '2025-06-26 11:24:59', '2025-06-26 11:24:59'),
(9, 'Moh. Khairul Rizal', 'Moh.KhairulRizal@santri.local', NULL, '$2y$12$0DpZqEIx6gA6UA38enO6n.AnwFSoSh502l39yWclxJNojd.mTEL8S', 'santri', NULL, '2025-06-26 11:37:58', '2025-06-26 11:37:58'),
(10, 'Moh. Nur Yasin', 'Moh.NurYasin@santri.local', NULL, '$2y$12$EdwybOUXUTNYhnKIa/ff6uA44aJcnOWt5u4bWLFgJ8dHtOE37Ew3G', 'santri', NULL, '2025-06-26 11:41:22', '2025-06-26 11:41:22'),
(11, 'Ilham Nabil Satriawan', 'IlhamNabilSatriawan@santri.local', NULL, '$2y$12$psDMG.xm8r2JxrAqUL8BM.mMat5zVTZm9E09Y6n9KSiVAQ79KxTL2', 'santri', NULL, '2025-06-26 11:43:20', '2025-06-26 11:43:20'),
(12, 'Ahmad Hujairi Farid', 'AhmadHujairiFarid@santri.local', NULL, '$2y$12$mh5ib4iymeDCwLCTJ1oB0uBQbQD1CAWSE6TIsyMFL8Mzgb/BzwAJy', 'santri', NULL, '2025-06-26 11:45:11', '2025-06-26 11:45:11'),
(13, 'Ahmad Ulil Abrori Fatchullah', 'Ahmad UlilAbroriFatchullah@santri.local', NULL, '$2y$12$zHn4hw2bmRl6/JeDGM.ThOV6bh6tG25XpMGt6u5AFSBp0oCELEirO', 'santri', NULL, '2025-06-26 11:58:04', '2025-06-26 11:58:04'),
(14, 'Radif Vidariansyah', 'RadifVidariansyah@santri.local', NULL, '$2y$12$yzmzUHG3fFWjYiRipxrLAOHbOp7ahIiSPMIFCGCiqYy.x3Ik2aG7.', 'santri', NULL, '2025-06-26 12:00:42', '2025-06-26 12:00:42'),
(15, 'Moh. Dahlan', 'Moh.Dahlan@santri.local', NULL, '$2y$12$48N8bFeHVjOXFA3MUXD/k.xg3JO.hKTrHumOMhJOVfHHfC4nbPm32', 'santri', NULL, '2025-06-26 12:03:38', '2025-06-26 12:03:38'),
(16, 'Ahmad Ramadani', 'AhmadRamadani@santri.local', NULL, '$2y$12$DgGgU3t6mnwnzDzOnyEou.mmvKBfZ2F77v5rMedbefkzPj15XzzY6', 'santri', NULL, '2025-06-26 12:05:42', '2025-06-26 12:05:42'),
(17, 'Moh. Aldiansah', 'Moh.Aldiansah@santri.local', NULL, '$2y$12$RsTwFxOHVUquRFbNOJ4iL.rAkS4CM6U1trnp6zyunp.A5/mHGXBzS', 'santri', NULL, '2025-06-26 12:07:14', '2025-06-26 12:07:14'),
(18, 'Moh. Kurniawan Ramadhani', 'Moh.Kurniawan Ramadhani@santri.local', NULL, '$2y$12$3fUB58lhqhL3u6wp2of0AexpoFzC2VglT.1fivv1Z21e3GyL22Odi', 'santri', NULL, '2025-06-26 12:18:51', '2025-06-26 12:18:51'),
(19, 'Ach. Hidayatur Rahman', 'Ach.Hidayatur Rahman@santri.local', NULL, '$2y$12$q55rg36arHkycOqPq/EpnOxxsUl7tv89dL7qnLAqLY9zpVQl8Bv.y', 'santri', NULL, '2025-06-26 12:31:49', '2025-06-26 12:31:49'),
(20, 'Ahmad Zain Ubaidillah', 'AhmadZainUbaidillah@santri.local', NULL, '$2y$12$mPVSvc2/xCEOum18Y5CM1uDB0Poi3Fb.ESgbwkQ..pKRdReHBZGbO', 'santri', NULL, '2025-06-26 12:34:31', '2025-06-26 12:34:31'),
(21, 'Moh. Khofif Fauzi', 'Moh.KhofifFauzi@santri.local', NULL, '$2y$12$hQtRlRquTYm22D4CLF6lveK8Tnk7ZsvIyogRbIBr7F0KVkGOtecBO', 'santri', NULL, '2025-06-26 12:36:11', '2025-06-26 12:36:11'),
(22, 'Ach. Riziq Hamidy', 'Ach.RiziqHamidy@santri.local', NULL, '$2y$12$7r3LSdq6Clflwtdw8rl1oObl3yxRvj2eF02SH69FWJrZxsaFZ4RFq', 'santri', NULL, '2025-06-26 12:55:59', '2025-06-26 12:55:59'),
(23, 'Ach. Zainuri', 'Ach.Zainuri@santri.local', NULL, '$2y$12$ORg4XXDOa9Xz6206OZ3nGuTJdZDFzJOEV5/YyAnfSXtb6CNMGQKW6', 'santri', NULL, '2025-06-26 12:57:18', '2025-06-26 12:57:18'),
(24, 'Ach. Rafiqi', 'Ach.Rafiqi@santri.local', NULL, '$2y$12$tGTI0e0ChA8nlXOBY5fLMeAfu0c/HX6RsmJeZa4ofCOgE58vnneE6', 'santri', NULL, '2025-06-26 12:59:02', '2025-06-26 12:59:02'),
(25, 'Zaid Ubaidillah', 'ZaidUbaidillah@santri.local', NULL, '$2y$12$iFlJz2Jqu5KrXbCcSYjDjuOzQYVteRiZVuVG7aMQXjoMXfkaHypWS', 'santri', NULL, '2025-06-26 13:10:47', '2025-06-26 13:10:47'),
(26, 'Moh. Alwan Fahrullah', 'Moh.AlwanFahrullah@santri.local', NULL, '$2y$12$hIvW85Qhzp6FP4RlfCULVeMN20fpU/./y4PbWRJawvl1Pmjf9M3HC', 'santri', NULL, '2025-06-26 13:15:53', '2025-06-26 13:15:53'),
(27, 'Rafli Hidayatul Arifin', 'RafliHidayatulArifin@santri.local', NULL, '$2y$12$KA6GGgIlWxysw3xuEWd8RuFHtiu.g8RGs9oZQVzQg/vhxqDaQgWEm', 'santri', NULL, '2025-06-26 13:23:03', '2025-06-26 13:23:03'),
(28, 'Khairul Ahnaf Fadhilil Luthfi', 'KhairulAhnafFadhilil Luthfi@santri.local', NULL, '$2y$12$wWJoGDqGTFZFvjmYNExv0.SCnEq0rhWMFN5bFndFY2q.8LbGPW4Rq', 'santri', NULL, '2025-06-26 13:24:17', '2025-06-26 13:24:17'),
(29, 'Ahmad Fahmi Rofiqi', 'AhmadFahmiRofiqi@santri.local', NULL, '$2y$12$HJ2X668k60CZ3dJ.yZKIU.qZIyVQHINewjZ63S7XAITSVN2UlYjbS', 'santri', NULL, '2025-06-26 13:25:32', '2025-06-26 13:25:32'),
(30, 'Adli Agus Triyawan', 'AdliAgusTriyawan@santri.local', NULL, '$2y$12$MRGPXCAvWJ3ppUY6PNWVqeafy1uNU/TputZ8I.T64ZBehOxI7oRcK', 'santri', NULL, '2025-06-26 13:26:43', '2025-06-26 13:26:43'),
(31, 'Misbahul Umam', 'MisbahulUmam@santri.local', NULL, '$2y$12$CSmZAXn1FCWjaCLV6eIGc.fei2ME76vu6tHg87mzdDrRDGRJcBrtS', 'santri', NULL, '2025-06-26 13:27:58', '2025-06-26 13:27:58'),
(32, 'Moh. Hamdan Jamil', 'Moh.HamdanJamil@santri.local', NULL, '$2y$12$4akgdKKbTqIpUBi2l6RYxOL6URwTTIv9/Dtn.KEBagcbiEaUeMYH.', 'santri', NULL, '2025-06-26 13:30:27', '2025-06-26 13:30:27'),
(33, 'Moh. Fachril Umam', 'Moh.FachrilUmam@santri.local', NULL, '$2y$12$VUYP5ObpeH47ZnAbVE580ecXl3aQHfOxrO5zi8cLzNIAZ3HGaVzLi', 'santri', NULL, '2025-06-26 13:31:33', '2025-06-26 13:31:33'),
(34, 'Imam Rofiqi', 'ImamRofiqi@santri.local', NULL, '$2y$12$Zje/AUNqwAKj/zcnwdcko.tACytPZ7DRMY1GJ7dsi0ZvwI2bR.ZdC', 'santri', NULL, '2025-06-26 13:33:02', '2025-06-26 13:33:02'),
(35, 'Moh. Izzul Haromain', 'Moh.IzzulHaromain@santri.local', NULL, '$2y$12$Gt5h/ItoM4MJYMTpSpl8/Oock6CCz1QtCjtwD35NjOsU30iy./7J6', 'santri', NULL, '2025-06-26 13:34:20', '2025-06-26 13:34:20'),
(36, 'Moh. Fayat', 'Moh.Fayat@santri.local', NULL, '$2y$12$Nwx1oa3Kg/wodOx8GOAiL.mc8DGbcsZSGSPzNCWkQwM3FCDL.uWMO', 'santri', NULL, '2025-06-26 13:35:30', '2025-06-26 13:35:30'),
(37, 'walid', 'walid@santri.local', NULL, '$2y$12$ZOuqMEduqdAVJwP8xtK1Neg8Ela0NWMyoFzUboU.a.xr9xDJM1Jvi', 'santri', NULL, '2025-06-27 03:55:22', '2025-06-27 03:55:22');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bendaharas`
--
ALTER TABLE `bendaharas`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indeks untuk tabel `keuangans`
--
ALTER TABLE `keuangans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keuangans_santri_id_foreign` (`santri_id`),
  ADD KEY `keuangans_bendahara_id_foreign` (`bendahara_id`);

--
-- Indeks untuk tabel `koperasi_transactions`
--
ALTER TABLE `koperasi_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `koperasi_transactions_santri_id_foreign` (`santri_id`);

--
-- Indeks untuk tabel `koperasi_transaction_details`
--
ALTER TABLE `koperasi_transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `koperasi_transaction_details_koperasi_transaction_id_foreign` (`koperasi_transaction_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `santris`
--
ALTER TABLE `santris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `santris_nis_unique` (`nis`),
  ADD KEY `santris_user_id_foreign` (`user_id`),
  ADD KEY `santris_bendahara_id_foreign` (`bendahara_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bendaharas`
--
ALTER TABLE `bendaharas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keuangans`
--
ALTER TABLE `keuangans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `koperasi_transactions`
--
ALTER TABLE `koperasi_transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `koperasi_transaction_details`
--
ALTER TABLE `koperasi_transaction_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `santris`
--
ALTER TABLE `santris`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `keuangans`
--
ALTER TABLE `keuangans`
  ADD CONSTRAINT `keuangans_bendahara_id_foreign` FOREIGN KEY (`bendahara_id`) REFERENCES `bendaharas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `keuangans_santri_id_foreign` FOREIGN KEY (`santri_id`) REFERENCES `santris` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `koperasi_transactions`
--
ALTER TABLE `koperasi_transactions`
  ADD CONSTRAINT `koperasi_transactions_santri_id_foreign` FOREIGN KEY (`santri_id`) REFERENCES `santris` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `koperasi_transaction_details`
--
ALTER TABLE `koperasi_transaction_details`
  ADD CONSTRAINT `koperasi_transaction_details_koperasi_transaction_id_foreign` FOREIGN KEY (`koperasi_transaction_id`) REFERENCES `koperasi_transactions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `santris`
--
ALTER TABLE `santris`
  ADD CONSTRAINT `santris_bendahara_id_foreign` FOREIGN KEY (`bendahara_id`) REFERENCES `bendaharas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `santris_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
