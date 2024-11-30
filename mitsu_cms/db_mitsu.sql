-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Nov 2024 pada 07.14
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mitsu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_mobil`
--

CREATE TABLE `dt_mobil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ms_mobil_id` int(11) NOT NULL,
  `seri_mobil` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_11_01_062016_setting', 1),
(6, '2024_11_02_040712_ms_artikel', 1),
(7, '2024_11_02_053612_ms_galeri', 1),
(8, '2024_11_07_082121_ms_log', 1),
(9, '2024_11_18_152619_ms_caraousel', 1),
(10, '2024_11_20_012044_tipe_mobil', 1),
(11, '2024_11_20_012338_ms_mobil', 1),
(12, '2024_11_20_014315_dt_mobil', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_artikel`
--

CREATE TABLE `ms_artikel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL,
  `meta_deskripsi` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `gambar` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`gambar`)),
  `file` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_caraousel`
--

CREATE TABLE `ms_caraousel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_galeri`
--

CREATE TABLE `ms_galeri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_log`
--

CREATE TABLE `ms_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `aktivitas` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_mobil`
--

CREATE TABLE `ms_mobil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_mobil` varchar(255) NOT NULL,
  `tipe_mobil_id` int(11) NOT NULL,
  `transmisi` varchar(255) DEFAULT NULL,
  `mesin` varchar(255) DEFAULT NULL,
  `bahan_bakar` enum('bensin','diesel','listrik') DEFAULT NULL,
  `kursi` int(11) NOT NULL,
  `warna` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`gambar`)),
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_setting` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `form` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `nama_setting`, `display_name`, `icon`, `form`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dealer', 'Nama Dealer', 'fas fa-car-side', 'text', 'Mitsubishi Kartasura', '2024-11-19 22:13:12', '2024-11-19 22:41:24', NULL),
(2, 'sales', 'Marketing Executive', 'fas fa-user-tie', 'text', 'Yanis', '2024-11-19 22:13:12', '2024-11-19 22:41:24', NULL),
(3, 'no_wa', 'Nomor Telp/Whatsapp', 'fab fa-whatsapp', 'text', '6282133727946', '2024-11-19 22:13:12', '2024-11-19 22:41:24', NULL),
(4, 'alamat', 'Alamat', 'fas fa-store', 'textarea', 'Jalan Ahmad Yani, No 151, Kartasura, Sukoharjo', '2024-11-19 22:13:12', '2024-11-19 22:41:24', NULL),
(5, 'instagram', 'Instagram', 'fab fa-instagram', 'text', 'https://www.instagram.com/sunstarmotorkartasura', '2024-11-19 22:13:12', '2024-11-19 22:41:24', NULL),
(6, 'deskripsi', 'Deskripsi', 'fas fa-file-alt', 'textarea', 'Mitsubishi', '2024-11-19 22:13:12', '2024-11-19 22:41:24', NULL),
(7, 'footer', 'Footer', 'far fa-file', 'text', 'Mitsubishi Authorized Dealer SUN STAR MOTOR KARTASURA', '2024-11-19 22:13:12', '2024-11-19 22:41:24', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_mobil`
--

CREATE TABLE `tipe_mobil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin', '$2y$10$GarNmtfpwV6JCUZkfBdXd.o4cI0uXz35mtOw9ZBJioMjLeggNuSOS', '2024-11-19 22:10:41', '2024-11-19 22:10:41', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dt_mobil`
--
ALTER TABLE `dt_mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ms_artikel`
--
ALTER TABLE `ms_artikel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ms_artikel_slug_unique` (`slug`);

--
-- Indeks untuk tabel `ms_caraousel`
--
ALTER TABLE `ms_caraousel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ms_galeri`
--
ALTER TABLE `ms_galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ms_log`
--
ALTER TABLE `ms_log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ms_mobil`
--
ALTER TABLE `ms_mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tipe_mobil`
--
ALTER TABLE `tipe_mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dt_mobil`
--
ALTER TABLE `dt_mobil`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `ms_artikel`
--
ALTER TABLE `ms_artikel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ms_caraousel`
--
ALTER TABLE `ms_caraousel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ms_galeri`
--
ALTER TABLE `ms_galeri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ms_log`
--
ALTER TABLE `ms_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ms_mobil`
--
ALTER TABLE `ms_mobil`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tipe_mobil`
--
ALTER TABLE `tipe_mobil`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
