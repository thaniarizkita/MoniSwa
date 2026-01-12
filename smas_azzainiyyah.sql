-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 12, 2026 at 05:41 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smas_azzainiyyah`
--

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
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` bigint UNSIGNED NOT NULL,
  `nip` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_guru` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mapel` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pelanggaran`
--

CREATE TABLE `jenis_pelanggaran` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_pelanggaran` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poin` int NOT NULL,
  `kategori` enum('ringan','sedang','berat') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ringan',
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_pelanggaran`
--

INSERT INTO `jenis_pelanggaran` (`id`, `nama_pelanggaran`, `poin`, `kategori`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Terlambat masuk kelas', 5, 'ringan', 'Datang terlambat tanpa keterangan', '2026-01-10 23:42:18', '2026-01-10 23:42:18'),
(2, 'Tidak menggunakan seragam lengkap', 10, 'ringan', 'Atribut tidak lengkap', '2026-01-10 23:42:18', '2026-01-10 23:42:18'),
(3, 'Tidak mengerjakan PR', 5, 'ringan', 'Tidak mengerjakan tugas rumah', '2026-01-10 23:42:18', '2026-01-10 23:42:18'),
(4, 'Ramai di kelas', 10, 'ringan', 'Mengganggu proses belajar', '2026-01-10 23:42:18', '2026-01-10 23:42:18'),
(5, 'Membolos', 25, 'sedang', 'Tidak hadir tanpa izin', '2026-01-10 23:42:18', '2026-01-10 23:42:18'),
(6, 'Menyontek saat ujian', 30, 'sedang', 'Kecurangan akademik', '2026-01-10 23:42:18', '2026-01-10 23:42:18'),
(7, 'Keluar kelas tanpa izin', 20, 'sedang', 'Meninggalkan kelas tanpa ijin guru', '2026-01-10 23:42:18', '2026-01-10 23:42:18'),
(8, 'Merokok di lingkungan sekolah', 50, 'sedang', 'Melanggar aturan kesehatan', '2026-01-10 23:42:18', '2026-01-10 23:42:18'),
(9, 'Berkelahi', 75, 'berat', 'Tindakan kekerasan', '2026-01-10 23:42:18', '2026-01-10 23:42:18'),
(10, 'Membawa senjata tajam', 100, 'berat', 'Membahayakan keselamatan', '2026-01-10 23:42:18', '2026-01-10 23:42:18'),
(11, 'Narkoba', 150, 'berat', 'Terlibat narkoba', '2026-01-10 23:42:18', '2026-01-10 23:42:18'),
(12, 'Merusak fasilitas sekolah', 60, 'berat', 'Vandalisme', '2026-01-10 23:42:18', '2026-01-10 23:42:18');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_prestasi`
--

CREATE TABLE `jenis_prestasi` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_prestasi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat` enum('sekolah','kecamatan','kabupaten','provinsi','nasional','internasional') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_prestasi`
--

INSERT INTO `jenis_prestasi` (`id`, `nama_prestasi`, `tingkat`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Lomba Matematika', 'kabupaten', 'Olimpiade Matematika', '2026-01-10 23:42:17', '2026-01-10 23:42:17'),
(2, 'Lomba Fisika', 'provinsi', 'Olimpiade Fisika', '2026-01-10 23:42:18', '2026-01-10 23:42:18'),
(3, 'Lomba Bahasa Inggris', 'nasional', 'English Competition', '2026-01-10 23:42:18', '2026-01-10 23:42:18'),
(4, 'Lomba Futsal', 'kecamatan', 'Turnamen Futsal', '2026-01-10 23:42:18', '2026-01-10 23:42:18'),
(5, 'Lomba Tahfidz', 'kabupaten', 'Musabaqah Tahfidz Quran', '2026-01-10 23:42:18', '2026-01-10 23:42:18'),
(6, 'Lomba Seni', 'sekolah', 'Festival Seni Budaya', '2026-01-10 23:42:18', '2026-01-10 23:42:18');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kelas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `tingkat`, `jurusan`, `created_at`, `updated_at`) VALUES
(10, 'X IPA 1', 'X', 'IPA', '2026-01-11 17:24:35', '2026-01-11 17:24:35'),
(11, 'X IPA 2', 'X', 'IPA', '2026-01-11 17:24:35', '2026-01-11 17:24:35'),
(12, 'X IPA 3', 'X', 'IPA', '2026-01-11 17:24:35', '2026-01-11 17:24:35'),
(13, 'X IPA 4', 'X', 'IPA', '2026-01-11 17:24:35', '2026-01-11 17:24:35'),
(14, 'X IPA 5', 'X', 'IPA', '2026-01-11 17:24:35', '2026-01-11 17:24:35'),
(15, 'X IPS 1', 'X', 'IPS', '2026-01-11 17:24:35', '2026-01-11 17:24:35'),
(16, 'X IPS 2', 'X', 'IPS', '2026-01-11 17:24:35', '2026-01-11 17:24:35'),
(17, 'X IPS 3', 'X', 'IPS', '2026-01-11 17:24:35', '2026-01-11 17:24:35'),
(18, 'X IPS 4', 'X', 'IPS', '2026-01-11 17:24:35', '2026-01-11 17:24:35'),
(19, 'X IPS 5', 'X', 'IPS', '2026-01-11 17:24:35', '2026-01-11 17:24:35'),
(20, 'XI IPA 1', 'XI', 'IPA', '2026-01-11 17:24:57', '2026-01-11 17:24:57'),
(21, 'XI IPA 2', 'XI', 'IPA', '2026-01-11 17:24:57', '2026-01-11 17:24:57'),
(22, 'XI IPA 3', 'XI', 'IPA', '2026-01-11 17:24:57', '2026-01-11 17:24:57'),
(23, 'XI IPA 4', 'XI', 'IPA', '2026-01-11 17:24:57', '2026-01-11 17:24:57'),
(24, 'XI IPA 5', 'XI', 'IPA', '2026-01-11 17:24:57', '2026-01-11 17:24:57'),
(25, 'XI IPS 1', 'XI', 'IPS', '2026-01-11 17:24:57', '2026-01-11 17:24:57'),
(26, 'XI IPS 2', 'XI', 'IPS', '2026-01-11 17:24:57', '2026-01-11 17:24:57'),
(27, 'XI IPS 3', 'XI', 'IPS', '2026-01-11 17:24:57', '2026-01-11 17:24:57'),
(28, 'XI IPS 4', 'XI', 'IPS', '2026-01-11 17:24:57', '2026-01-11 17:24:57'),
(29, 'XI IPS 5', 'XI', 'IPS', '2026-01-11 17:24:57', '2026-01-11 17:24:57'),
(30, 'XII IPA 1', 'XII', 'IPA', '2026-01-11 17:25:17', '2026-01-11 17:25:17'),
(31, 'XII IPA 2', 'XII', 'IPA', '2026-01-11 17:25:17', '2026-01-11 17:25:17'),
(32, 'XII IPA 3', 'XII', 'IPA', '2026-01-11 17:25:17', '2026-01-11 17:25:17'),
(33, 'XII IPA 4', 'XII', 'IPA', '2026-01-11 17:25:17', '2026-01-11 17:25:17'),
(34, 'XII IPA 5', 'XII', 'IPA', '2026-01-11 17:25:17', '2026-01-11 17:25:17'),
(35, 'XII IPS 1', 'XII', 'IPS', '2026-01-11 17:25:17', '2026-01-11 17:25:17'),
(36, 'XII IPS 2', 'XII', 'IPS', '2026-01-11 17:25:17', '2026-01-11 17:25:17'),
(37, 'XII IPS 3', 'XII', 'IPS', '2026-01-11 17:25:17', '2026-01-11 17:25:17'),
(38, 'XII IPS 4', 'XII', 'IPS', '2026-01-11 17:25:17', '2026-01-11 17:25:17'),
(39, 'XII IPS 5', 'XII', 'IPS', '2026-01-11 17:25:17', '2026-01-11 17:25:17');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2026_01_11_062953_create_kelas_table', 1),
(6, '2026_01_11_063032_create_siswa_table', 1),
(7, '2026_01_11_063102_create_wali_murid_table', 1),
(8, '2026_01_11_063112_create_guru_table', 1),
(9, '2026_01_11_063122_create_jenis_prestasi_table', 1),
(10, '2026_01_11_063132_create_jenis_pelanggaran_table', 1),
(11, '2026_01_11_063141_create_prestasi_table', 1),
(12, '2026_01_11_063150_create_pelanggaran_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `jenis_pelanggaran_id` bigint UNSIGNED NOT NULL,
  `guru_id` bigint UNSIGNED DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `tanggal` date NOT NULL,
  `status` enum('belum_ditindak','dalam_proses','selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum_ditindak',
  `tindakan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `jenis_prestasi_id` bigint UNSIGNED NOT NULL,
  `guru_id` bigint UNSIGNED DEFAULT NULL,
  `nama_kegiatan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peringkat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `tanggal` date NOT NULL,
  `sertifikat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint UNSIGNED NOT NULL,
  `nis` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_siswa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kelas` bigint UNSIGNED NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ayah` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('aktif','nonaktif','lulus') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama_siswa`, `id_kelas`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_hp`, `email`, `nama_ayah`, `nama_ibu`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(3, '2023003', 'Tayna Rizkita', 34, 'P', 'Sukabumi', '2004-12-12', 'Islam', 'jl cigunung', '0898929787483', 'thaniarizkita123@ummi.ac.id', 'justin', 'selena', NULL, 'aktif', '2026-01-11 11:10:10', '2026-01-11 11:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','guru','siswa','wali') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'siswa',
  `relasi_id` bigint UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `relasi_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$12$mhunjkMg.6EF2O.7jI6ulurOdt8BbG0zMmaUHp4zoX7NEKJUHv4Gi', 'admin', NULL, NULL, '2026-01-10 23:42:17', '2026-01-10 23:42:17'),
(2, 'guru', '$2y$12$mva3Mo47tjPcyagx.1bkDeieKWvPzPA5amgb36H5fhgh6LiOTY8TO', 'guru', NULL, NULL, '2026-01-10 23:42:17', '2026-01-11 10:26:27'),
(7, 'taynari', '$2y$12$8D8yHSzJ4OetFSzxficbu.n5N6v1StqScRq3RxHyWmp05tMKluN3a', 'siswa', 3, 'GlfSwSa0JHIgGJZ0KFP91NYdr1oL5Y26geHdL4OuPNa3GdbPL63Kj6bu39je', '2026-01-11 11:10:41', '2026-01-11 11:34:12'),
(8, 'wali', '$2y$12$VinLT7wxEC7ADGbMcFNi0OBn5pbEPYNhK573hOyfR4dDzfZ49XXXi', 'wali', 1, NULL, '2026-01-11 11:39:49', '2026-01-11 22:20:44');

-- --------------------------------------------------------

--
-- Table structure for table `wali_murid`
--

CREATE TABLE `wali_murid` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_wali` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_siswa` bigint UNSIGNED NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hubungan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Orang Tua',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wali_murid`
--

INSERT INTO `wali_murid` (`id`, `nama_wali`, `id_siswa`, `no_hp`, `alamat`, `hubungan`, `created_at`, `updated_at`) VALUES
(1, 'ddtrdyf', 3, '0898929787483', 'm,', 'Orang Tua', '2026-01-11 11:39:25', '2026-01-11 11:39:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guru_nip_unique` (`nip`);

--
-- Indexes for table `jenis_pelanggaran`
--
ALTER TABLE `jenis_pelanggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_prestasi`
--
ALTER TABLE `jenis_prestasi`
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
-- Indexes for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggaran_siswa_id_foreign` (`siswa_id`),
  ADD KEY `pelanggaran_jenis_pelanggaran_id_foreign` (`jenis_pelanggaran_id`),
  ADD KEY `pelanggaran_guru_id_foreign` (`guru_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prestasi_siswa_id_foreign` (`siswa_id`),
  ADD KEY `prestasi_jenis_prestasi_id_foreign` (`jenis_prestasi_id`),
  ADD KEY `prestasi_guru_id_foreign` (`guru_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswa_nis_unique` (`nis`),
  ADD KEY `siswa_id_kelas_foreign` (`id_kelas`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `wali_murid`
--
ALTER TABLE `wali_murid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wali_murid_id_siswa_foreign` (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_pelanggaran`
--
ALTER TABLE `jenis_pelanggaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jenis_prestasi`
--
ALTER TABLE `jenis_prestasi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wali_murid`
--
ALTER TABLE `wali_murid`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD CONSTRAINT `pelanggaran_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pelanggaran_jenis_pelanggaran_id_foreign` FOREIGN KEY (`jenis_pelanggaran_id`) REFERENCES `jenis_pelanggaran` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pelanggaran_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `prestasi_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `prestasi_jenis_prestasi_id_foreign` FOREIGN KEY (`jenis_prestasi_id`) REFERENCES `jenis_prestasi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prestasi_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wali_murid`
--
ALTER TABLE `wali_murid`
  ADD CONSTRAINT `wali_murid_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
