-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2022 at 06:20 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggotas`
--

CREATE TABLE `anggotas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk_anggota` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggotas`
--

INSERT INTO `anggotas` (`id`, `nim_anggota`, `nama_anggota`, `jk_anggota`, `nohp_anggota`, `email_anggota`, `alamat_anggota`, `created_at`, `updated_at`) VALUES
(1, '1800001', 'Pirdaus', 'Laki-laki', '0812345678', 'admin@gmail.com', 'Padang', NULL, NULL),
(2, '1800002', 'Bayu Adli', 'Laki-laki', '0812345678', 'bayu@gmail.com', 'Batusangkar', NULL, NULL),
(3, '1800003', 'Bil', 'Laki-laki', '0812345678', 'bil@gmail.com', 'Padang', NULL, NULL),
(4, '1800004', 'Silvia', 'Perempuan', '0812345678', 'silvia@gmail.com', 'Padang', NULL, NULL),
(5, '1800005', 'Viki', 'Perempuan', '0812345678', 'viki@gmail.com', 'Pariaman', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `buku_models`
--

CREATE TABLE `buku_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isbn_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_terbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengarang_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_buku_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rak_buku_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku_models`
--

INSERT INTO `buku_models` (`id`, `isbn_buku`, `judul_buku`, `tahun_terbit`, `penerbit_buku`, `pengarang_buku`, `kategori_buku_id`, `rak_buku_id`, `jumlah_buku`, `gambar`, `created_at`, `updated_at`) VALUES
(1, '121228120001', 'Kesehatan Lingkungan', '2020', 'Erlangga', 'Leo Sutanto', '1', '1', '100', 'download (1).jfif', NULL, NULL),
(2, '121228120001', 'Sejarah Indonesia', '2020', 'Erlangga', 'Pirdaus', '3', '4', '100', 'download (3).jfif', NULL, NULL),
(3, '121228120002', 'Kesehatan Reproduksi', '2019', 'Erlangga', 'Dr. Citra', '1', '2', '100', 'download (2).jfif', NULL, NULL),
(4, '121228120003', 'Kesehatan Lingkungan', '2017', 'Erlangga', 'Leo Sutanto', '1', '2', '100', 'download (1).jfif', NULL, NULL),
(5, '121228120004', 'Belajar Membaca', '2019', 'Erlangga', 'Pirdaus', '5', '6', '100', 'download.jfif', NULL, NULL),
(6, '121228120005', 'Mimpi Yang Terlarang', '2020', 'Erlangga', 'Mas Budiman', '2', '3', '100', 'images.jfif', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jenis__bukus`
--

CREATE TABLE `jenis__bukus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis__bukus`
--

INSERT INTO `jenis__bukus` (`id`, `nama_jenis`, `created_at`, `updated_at`) VALUES
(1, 'Kesehatan', NULL, NULL),
(2, 'Cerpen', NULL, NULL),
(3, 'Sejarah', NULL, NULL),
(4, 'Novel', NULL, NULL),
(5, 'Majalah', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `nama`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Pirdaus', 'admin', '$2y$10$yn//RY7vOYaMyNJ7niVG.uYGmvWGOkLvvr460LXlkYy6eodrggzLe', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_31_043550_create_logins_table', 1),
(6, '2022_03_31_071812_create_jenis__bukus_table', 1),
(7, '2022_04_01_035124_create_raks_table', 1),
(8, '2022_04_03_033503_create_buku_models_table', 1),
(9, '2022_04_04_014036_create_petugas_table', 1),
(10, '2022_04_04_022757_create_anggotas_table', 1),
(11, '2022_04_04_030258_create_peminjamen_table', 1),
(12, '2022_04_04_075038_create_peminjaman__temps_table', 1),
(13, '2022_04_08_041149_create_pengembalians_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman__temps`
--

CREATE TABLE `peminjaman__temps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isbn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjamen`
--

CREATE TABLE `peminjamen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pinjam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `id_buku_pinjam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_anggota_pinjam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalians`
--

CREATE TABLE `pengembalians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `denda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengembalians`
--

INSERT INTO `pengembalians` (`id`, `id_anggota`, `id_buku`, `qty`, `denda`, `created_at`, `updated_at`) VALUES
(1, '3', '3', '1', '0', NULL, NULL),
(2, '3', '1', '5', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_petugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_petugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp_petugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_petugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_petugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nama_petugas`, `jabatan_petugas`, `nohp_petugas`, `email_petugas`, `alamat_petugas`, `created_at`, `updated_at`) VALUES
(1, 'Aidil Fitra', 'Kepala Pustaka', '0812345678', 'aidil@gmail.com', 'Payakumbuah', NULL, NULL),
(2, 'Beni Fajri', 'Admin', '0812345678', 'beni@gmail.com', 'Padang', NULL, NULL),
(3, 'Aditya', 'Sekretaris & Bendahara', '0812345678', 'aditya@gmail.com', 'Padang', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `raks`
--

CREATE TABLE `raks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_rak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas_rak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_buku_rak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `raks`
--

INSERT INTO `raks` (`id`, `nama_rak`, `kapasitas_rak`, `jenis_buku_rak`, `created_at`, `updated_at`) VALUES
(2, 'Mawar', '500', '1', NULL, NULL),
(3, 'Melati', '500', '2', NULL, NULL),
(4, 'Anggrek', '500', '3', NULL, NULL),
(5, 'Bougenvile', '400', '4', NULL, NULL),
(6, 'Matahari', '500', '5', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggotas`
--
ALTER TABLE `anggotas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku_models`
--
ALTER TABLE `buku_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis__bukus`
--
ALTER TABLE `jenis__bukus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `peminjaman__temps`
--
ALTER TABLE `peminjaman__temps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjamen`
--
ALTER TABLE `peminjamen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengembalians`
--
ALTER TABLE `pengembalians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raks`
--
ALTER TABLE `raks`
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
-- AUTO_INCREMENT for table `anggotas`
--
ALTER TABLE `anggotas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `buku_models`
--
ALTER TABLE `buku_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis__bukus`
--
ALTER TABLE `jenis__bukus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `peminjaman__temps`
--
ALTER TABLE `peminjaman__temps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `peminjamen`
--
ALTER TABLE `peminjamen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengembalians`
--
ALTER TABLE `pengembalians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `raks`
--
ALTER TABLE `raks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
