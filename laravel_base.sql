-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jun 2025 pada 13.06
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_base`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota_profiles`
--

CREATE TABLE `anggota_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `no_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('aktif','nonaktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `angsuran`
--

CREATE TABLE `angsuran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pinjaman_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `jumlah_bayar` decimal(15,2) NOT NULL,
  `denda` decimal(15,2) NOT NULL DEFAULT 0.00,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `assets`
--

CREATE TABLE `assets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 1,
  `tanggal_beli` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasis`
--

CREATE TABLE `donasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `donatur_id` bigint(20) UNSIGNED NOT NULL,
  `zisco_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jenis_donasi_id` bigint(20) UNSIGNED NOT NULL,
  `nominal` decimal(15,2) NOT NULL,
  `bulan_donasi` date NOT NULL,
  `metode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `donaturs`
--

CREATE TABLE `donaturs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `instansi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_donatur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kontak` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `instansis`
--

CREATE TABLE `instansis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penanggung_jawab_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `instansis`
--

INSERT INTO `instansis` (`id`, `nama`, `alamat`, `telepon`, `penanggung_jawab_id`, `created_at`, `updated_at`) VALUES
(1, 'Sidoarjo', 'Sidoarjo', '0', NULL, '2025-06-20 11:01:03', '2025-06-20 11:01:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_donasis`
--

CREATE TABLE `jenis_donasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('Zakat','Infak','Wakaf') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_usahas`
--

CREATE TABLE `jenis_usahas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kwitansis`
--

CREATE TABLE `kwitansis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `donasi_id` bigint(20) UNSIGNED NOT NULL,
  `nomor_transaksi` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `komisi_zisco` decimal(15,2) NOT NULL,
  `dicetak` tinyint(1) NOT NULL DEFAULT 0,
  `bulan_donasi` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_logs`
--

CREATE TABLE `login_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `login_logs`
--

INSERT INTO `login_logs` (`id`, `user_id`, `ip_address`, `ket`, `location`, `user_agent`, `created_at`, `updated_at`) VALUES
(1, 1, '127.0.0.1', 'In User', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-20 08:39:50', '2025-06-20 08:39:50'),
(2, 1, '127.0.0.1', 'Out', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-20 08:42:26', '2025-06-20 08:42:26'),
(3, 1, '127.0.0.1', 'In User', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-20 08:42:30', '2025-06-20 08:42:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `permission_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `title`, `route`, `icon`, `parent_id`, `order`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 'System', NULL, 'ri-layout-2-line', NULL, 1, 1, '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(2, 'Menu', 'menu', 'ri-layout-top-2-line', 1, 1, 1, '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(3, 'User Menu', 'menuuser', 'ri-layout-top-2-line', 1, 2, 1, '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(4, 'Roles & Permission', NULL, 'ri-shield-user-line', 1, 3, 1, '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(5, 'Roles', 'role', 'ri-circle-fill', 4, 1, 1, '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(6, 'Permission', 'permission', 'ri-circle-fill', 4, 2, 1, '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(7, 'User', 'user', 'ri-user-line', 1, 4, 1, '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(8, 'Log History', 'log', 'ri-history-line', 1, 5, 1, '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(9, 'Master', NULL, 'ri-database-2-line', NULL, 2, 1, '2025-06-20 06:29:49', '2025-06-20 08:54:22'),
(10, 'Perusahaan', 'perusahaan', 'ri-community-line', 9, 11, 1, '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(11, 'Jenis Usaha', 'jenis-usaha', 'ri-shopping-bag-line', 9, 12, 1, '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(12, 'Anggota', 'tipe-dokumen', 'ri-id-card-line', 9, 13, 1, '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(13, 'Tipe Dokumen', 'tipe-dokumen', 'ri-layout-top-2-line', 9, 14, 1, '2025-06-20 06:29:49', '2025-06-20 08:55:52'),
(14, 'Pelanggan', 'pelanggan', 'ri-vip-crown-line', 9, 15, 1, '2025-06-20 06:29:49', '2025-06-20 08:55:43'),
(15, 'Pemasok', 'pemasok', 'ri-shopping-basket-line', 9, 16, 1, '2025-06-20 06:29:49', '2025-06-20 08:55:35'),
(16, 'Assets', 'dataasset', 'ri-roadster-line', 9, 17, 1, '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(17, 'SP', NULL, 'ri-hand-heart-line', 9, 18, 1, '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(18, 'Simpanan', NULL, 'ri-circle-fill', 17, 19, 1, '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(19, 'Pinjaman', NULL, 'ri-circle-fill', 17, 20, 1, '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(20, 'Simpan Pinjam', NULL, 'ri-hand-heart-line', NULL, 3, 1, '2025-06-20 06:29:49', '2025-06-20 08:54:18'),
(21, 'Simpanan', NULL, 'ri-bank-line', 20, 1, 1, '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(22, 'Setor Simpanan', NULL, 'ri-circle-fill', 21, 1, 1, '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(23, 'Penarikan', NULL, 'ri-circle-fill', 21, 2, 1, '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(24, 'Pinjaman', NULL, 'ri-article-line', 20, 2, 1, '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(25, 'Pengajuan Pinjaman', NULL, 'ri-circle-fill', 24, 1, 1, '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(26, 'Approval Pinjaman', NULL, 'ri-circle-fill', 24, 2, 1, '2025-06-20 06:29:50', '2025-06-20 06:29:50'),
(27, 'Kartu Anggota', NULL, 'ri-id-card-line', 20, 3, 1, '2025-06-20 06:29:50', '2025-06-20 06:29:50'),
(28, 'Posting SHU', NULL, 'ri-money-dollar-box-fill', 20, 4, 1, '2025-06-20 06:29:50', '2025-06-20 06:29:50'),
(29, 'LAZ', NULL, 'ri-hand-coin-line', NULL, 2, 1, '2025-06-20 10:43:08', '2025-06-20 10:43:08'),
(30, 'Transaksi', 'transaksi', 'ri-exchange-dollar-line', 17, 1, 1, '2025-06-20 10:43:08', '2025-06-20 10:59:43'),
(31, 'Zisco', 'zisco', 'ri-group-line', 29, 2, 1, '2025-06-20 10:43:08', '2025-06-20 10:43:08'),
(32, 'Jenis Donasi', 'jenis-donasi', 'ri-money-dollar-circle-line', 29, 3, 1, '2025-06-20 10:43:08', '2025-06-20 10:43:08'),
(33, 'Instansi', 'instansi', 'ri-building-line', 29, 4, 1, '2025-06-20 10:43:08', '2025-06-20 10:43:08'),
(34, 'Donatur', 'donatur', 'ri-user-heart-line', 29, 5, 1, '2025-06-20 10:43:08', '2025-06-20 10:43:08'),
(35, 'Donasi', 'donasi', 'ri-hand-heart-line', 29, 6, 1, '2025-06-20 10:43:08', '2025-06-20 10:43:08'),
(36, 'Kwitansi', 'kwitansi', 'ri-file-text-line', 29, 7, 1, '2025-06-20 10:43:08', '2025-06-20 10:43:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_06_16_093854_create_permission_tables', 1),
(6, '2025_06_17_031458_create_user_credentials_table', 1),
(7, '2025_06_18_143945_add_role_to_users_table', 1),
(8, '2025_06_18_163837_create_login_logs_table', 1),
(9, '2025_06_19_155442_create_menus_table', 1),
(10, '2025_06_19_190103_create_jenis_usahas_table', 1),
(11, '2025_06_19_190103_create_perusahaans_table', 1),
(12, '2025_06_19_190104_create_pelanggans_table', 1),
(13, '2025_06_19_190104_create_tipe_dokumens_table', 1),
(14, '2025_06_19_190105_create_assets_table', 1),
(15, '2025_06_19_190105_create_pemasoks_table', 1),
(16, '2025_06_20_104631_create_anggota_profiles_table', 1),
(17, '2025_06_20_104934_create_simpanans_table', 1),
(18, '2025_06_20_104953_create_pinjamans_table', 1),
(19, '2025_06_20_105013_create_angsuran_table', 1),
(20, '2025_06_20_105031_create_transaksis_table', 1),
(21, '2025_06_20_115801_create_ziscos_table', 1),
(22, '2025_06_20_115802_create_jenis_donasis_table', 1),
(23, '2025_06_20_115810_create_instansis_table', 1),
(24, '2025_06_20_115811_create_donaturs_table', 1),
(25, '2025_06_20_115812_create_donasis_table', 1),
(26, '2025_06_20_115812_create_kwitansis_table', 1),
(27, '2025_06_20_132902_add_foreign_key_penanggung_jawab_id_to_instansis_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

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
-- Struktur dari tabel `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasoks`
--

CREATE TABLE `pemasoks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'menu.lihat', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(2, 'menu.tambah', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(3, 'menu.ubah', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(4, 'menu.import', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(5, 'menu.hapus', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(6, 'menu.hapusall', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(7, 'user.lihat', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(8, 'user.ubah', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(9, 'user.tambah', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(10, 'user.hapus', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(11, 'permission.lihat', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(12, 'permission.ubah', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(13, 'permission.tambah', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(14, 'permission.hapus', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(15, 'role.lihat', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(16, 'role.ubah', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(17, 'role.tambah', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(18, 'role.hapus', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(19, 'loguser.lihat', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(20, 'loguser.ubah', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(21, 'loguser.tambah', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(22, 'loguser.hapus', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaans`
--

CREATE TABLE `perusahaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perusahaans`
--

INSERT INTO `perusahaans` (`id`, `nama`, `alamat`, `telepon`, `created_at`, `updated_at`) VALUES
(1, 'DIGITAL TECHNOPRENEUR INDONESIA', 'Bibis Karah 1/31', '08977507408', '2025-06-20 08:56:57', '2025-06-20 08:56:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjamans`
--

CREATE TABLE `pinjamans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `jumlah_pinjaman` decimal(15,2) NOT NULL,
  `tenor_bulan` int(11) NOT NULL,
  `bunga` decimal(5,2) NOT NULL,
  `status` enum('pending','disetujui','ditolak','lunas') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `tanggal_disetujui` date DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(2, 'Admin', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(3, 'Karyawan', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(4, 'BAAK', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(5, 'BAUK', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(6, 'Sarpras', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(7, 'Koperasi', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(8, 'Kaprodi', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(9, 'Dosen Wali', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(10, 'Mahasiswa', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(11, 'Dosen', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49'),
(12, 'User', 'web', '2025-06-20 06:29:49', '2025-06-20 06:29:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `simpanans`
--

CREATE TABLE `simpanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_simpanan` enum('pokok','wajib','sukarela') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` decimal(15,2) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_dokumens`
--

CREATE TABLE `tipe_dokumens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal` date NOT NULL,
  `tipe` enum('simpanan','pinjaman','angsuran','lainnya') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('masuk','keluar') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` decimal(15,2) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaksible_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaksible_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Diky Wahyu', 'dikywsp@gmail.com', NULL, '$2y$12$3yAl.kkE/X6Edo7N4XYO4.nDc92s43mE.0b7zsLA8G470aphXkZ6O', NULL, '2025-06-20 08:37:19', '2025-06-20 08:37:19', 'Super Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_credentials`
--

CREATE TABLE `user_credentials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `raw_data` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_credentials`
--

INSERT INTO `user_credentials` (`id`, `user_id`, `raw_data`, `created_at`, `updated_at`) VALUES
(1, 1, 'FhCgrPSNzQSa', '2025-06-20 08:37:19', '2025-06-20 08:42:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ziscos`
--

CREATE TABLE `ziscos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota_profiles`
--
ALTER TABLE `anggota_profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `anggota_profiles_no_anggota_unique` (`no_anggota`),
  ADD UNIQUE KEY `anggota_profiles_nik_unique` (`nik`),
  ADD KEY `anggota_profiles_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `angsuran_pinjaman_id_foreign` (`pinjaman_id`);

--
-- Indeks untuk tabel `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `assets_kode_unique` (`kode`);

--
-- Indeks untuk tabel `donasis`
--
ALTER TABLE `donasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donasis_donatur_id_foreign` (`donatur_id`),
  ADD KEY `donasis_zisco_id_foreign` (`zisco_id`),
  ADD KEY `donasis_jenis_donasi_id_foreign` (`jenis_donasi_id`);

--
-- Indeks untuk tabel `donaturs`
--
ALTER TABLE `donaturs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `donaturs_kode_donatur_unique` (`kode_donatur`),
  ADD KEY `donaturs_user_id_foreign` (`user_id`),
  ADD KEY `donaturs_instansi_id_foreign` (`instansi_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `instansis`
--
ALTER TABLE `instansis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instansis_penanggung_jawab_id_foreign` (`penanggung_jawab_id`);

--
-- Indeks untuk tabel `jenis_donasis`
--
ALTER TABLE `jenis_donasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_usahas`
--
ALTER TABLE `jenis_usahas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kwitansis`
--
ALTER TABLE `kwitansis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kwitansis_nomor_transaksi_unique` (`nomor_transaksi`),
  ADD KEY `kwitansis_donasi_id_foreign` (`donasi_id`);

--
-- Indeks untuk tabel `login_logs`
--
ALTER TABLE `login_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_logs_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_parent_id_foreign` (`parent_id`),
  ADD KEY `menus_permission_id_foreign` (`permission_id`);

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
-- Indeks untuk tabel `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemasoks`
--
ALTER TABLE `pemasoks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `perusahaans`
--
ALTER TABLE `perusahaans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pinjamans`
--
ALTER TABLE `pinjamans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pinjamans_user_id_foreign` (`user_id`);

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
-- Indeks untuk tabel `simpanans`
--
ALTER TABLE `simpanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `simpanans_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `tipe_dokumens`
--
ALTER TABLE `tipe_dokumens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipe_dokumens_kode_unique` (`kode`);

--
-- Indeks untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_user_id_foreign` (`user_id`),
  ADD KEY `transaksis_transaksible_type_transaksible_id_index` (`transaksible_type`,`transaksible_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `user_credentials`
--
ALTER TABLE `user_credentials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_credentials_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `ziscos`
--
ALTER TABLE `ziscos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ziscos_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota_profiles`
--
ALTER TABLE `anggota_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `assets`
--
ALTER TABLE `assets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `donasis`
--
ALTER TABLE `donasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `donaturs`
--
ALTER TABLE `donaturs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `instansis`
--
ALTER TABLE `instansis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jenis_donasis`
--
ALTER TABLE `jenis_donasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_usahas`
--
ALTER TABLE `jenis_usahas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kwitansis`
--
ALTER TABLE `kwitansis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `login_logs`
--
ALTER TABLE `login_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemasoks`
--
ALTER TABLE `pemasoks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perusahaans`
--
ALTER TABLE `perusahaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pinjamans`
--
ALTER TABLE `pinjamans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `simpanans`
--
ALTER TABLE `simpanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tipe_dokumens`
--
ALTER TABLE `tipe_dokumens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user_credentials`
--
ALTER TABLE `user_credentials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ziscos`
--
ALTER TABLE `ziscos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anggota_profiles`
--
ALTER TABLE `anggota_profiles`
  ADD CONSTRAINT `anggota_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `angsuran`
--
ALTER TABLE `angsuran`
  ADD CONSTRAINT `angsuran_pinjaman_id_foreign` FOREIGN KEY (`pinjaman_id`) REFERENCES `pinjamans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `donasis`
--
ALTER TABLE `donasis`
  ADD CONSTRAINT `donasis_donatur_id_foreign` FOREIGN KEY (`donatur_id`) REFERENCES `donaturs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `donasis_jenis_donasi_id_foreign` FOREIGN KEY (`jenis_donasi_id`) REFERENCES `jenis_donasis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `donasis_zisco_id_foreign` FOREIGN KEY (`zisco_id`) REFERENCES `ziscos` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `donaturs`
--
ALTER TABLE `donaturs`
  ADD CONSTRAINT `donaturs_instansi_id_foreign` FOREIGN KEY (`instansi_id`) REFERENCES `instansis` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `donaturs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `instansis`
--
ALTER TABLE `instansis`
  ADD CONSTRAINT `instansis_penanggung_jawab_id_foreign` FOREIGN KEY (`penanggung_jawab_id`) REFERENCES `donaturs` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `kwitansis`
--
ALTER TABLE `kwitansis`
  ADD CONSTRAINT `kwitansis_donasi_id_foreign` FOREIGN KEY (`donasi_id`) REFERENCES `donasis` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `login_logs`
--
ALTER TABLE `login_logs`
  ADD CONSTRAINT `login_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menus_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE SET NULL;

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
-- Ketidakleluasaan untuk tabel `pinjamans`
--
ALTER TABLE `pinjamans`
  ADD CONSTRAINT `pinjamans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `simpanans`
--
ALTER TABLE `simpanans`
  ADD CONSTRAINT `simpanans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_credentials`
--
ALTER TABLE `user_credentials`
  ADD CONSTRAINT `user_credentials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ziscos`
--
ALTER TABLE `ziscos`
  ADD CONSTRAINT `ziscos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
