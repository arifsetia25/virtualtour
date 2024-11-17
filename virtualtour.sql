-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2024 at 08:45 AM
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
-- Database: `virtualtour`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `koordinates`
--

CREATE TABLE `koordinates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `koordinat_x` varchar(100) NOT NULL,
  `koordinat_y` varchar(100) NOT NULL,
  `koordinat_z` varchar(100) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `panorama_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `target` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `koordinates`
--

INSERT INTO `koordinates` (`id`, `koordinat_x`, `koordinat_y`, `koordinat_z`, `tipe`, `keterangan`, `panorama_id`, `created_at`, `updated_at`, `target`) VALUES
(1, '0.08774140897088337', '-0.03512739547331575', '0', 'Info', 'coba', 52, '2024-11-09 08:28:59', '2024-11-09 08:28:59', ''),
(2, '1.5948651330964927', '0.08973479257199458', '1.1102230246251565e-16', 'Info', 'halo', 52, '2024-11-09 19:13:02', '2024-11-09 19:13:02', ''),
(3, '1.5948651330964927', '0.08973479257199458', '1.1102230246251565e-16', 'Info', 'halo', 52, '2024-11-09 19:21:34', '2024-11-09 19:21:34', ''),
(4, '0.5229762273534124', '0.12883451981398147', '0.424644259296684', 'Info', 'halo', 52, '2024-11-09 19:24:34', '2024-11-09 19:24:34', ''),
(5, '0.44075126154525085', '0.09379860266965516', '0.4246442592966839', 'Info', 'titik 1', 52, '2024-11-09 19:28:06', '2024-11-09 19:28:06', ''),
(6, '0.23590871487994705', '0.05545000268316632', '0.4246442592966838', 'Info', 'titik 2', 52, '2024-11-09 19:30:59', '2024-11-09 19:30:59', ''),
(7, '-0.24367525693360784', '0.13940234319412836', '0.4246442592966839', 'Info', 'titik 3', 52, '2024-11-09 19:32:00', '2024-11-09 19:32:00', ''),
(8, '-0.550420388803082', '-0.04533432984735828', '0.35709395979185227', 'Info', 'titik 4', 52, '2024-11-09 19:35:44', '2024-11-09 19:35:44', ''),
(9, '-0.11917289901115503', '0.23934642330208017', '0.42601338094213903', 'Link', NULL, 52, '2024-11-10 00:31:44', '2024-11-10 00:31:44', '51'),
(10, '-0.16105740800549956', '0.09661578228816974', '0.45738250467406627', 'Link', NULL, 52, '2024-11-10 00:37:00', '2024-11-10 00:37:00', '29'),
(11, '-0.16105740800549956', '0.09661578228816974', '0.45738250467406627', 'Link', NULL, 52, '2024-11-10 00:41:23', '2024-11-10 00:41:23', '29'),
(12, '-0.5763808139759977', '0.0686591864107586', '0.2638649984002016', 'Link', NULL, 52, '2024-11-10 00:42:01', '2024-11-10 00:42:01', '51'),
(13, '0.49655851640628984', '0.21406426261384237', '0.3373068890243411', 'Link', NULL, 52, '2024-11-16 21:39:17', '2024-11-16 21:39:17', '50'),
(14, '-0.05007600248238033', '-0.1899223996587839', '0.4573825046740664', 'Info', 'kamar mandi', 52, '2024-11-16 21:42:12', '2024-11-16 21:42:12', '29');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_07_09_222327_create_panoramas_table', 1),
(5, '2024_07_09_224812_add_column_panoramas_table', 2),
(6, '2024_07_26_162958_create_koordinates_table', 3),
(7, '2024_11_09_150357_timestamp', 4),
(8, '2024_11_09_151310_add_column_koordinates_table', 5),
(9, '2024_11_10_044616_add_column_koordinates_table', 6),
(10, '2024_11_10_072921_modify_column_keterangan_nullable_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `panoramas`
--

CREATE TABLE `panoramas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `panoramas`
--

INSERT INTO `panoramas` (`id`, `created_at`, `updated_at`, `gambar`, `title`) VALUES
(29, '2024-08-18 04:11:05', '2024-08-18 04:11:05', 'i9ngusIfus3Mll1cxfQjLahF53ai3zGDmJyEDen9.jpg', 'parkiran dan pintu masuk'),
(31, '2024-08-18 04:42:49', '2024-08-18 04:42:49', '0r3TEFLNxIgI4cQGB79L3AaChSGXsSVk1fEPt8Q0.jpg', 'gambar 2 setelah pintu masuk'),
(32, '2024-08-18 04:59:40', '2024-08-18 04:59:40', 'ec64bRS66g6gLyt0gS3EzTbqWtZJSdFpmnb3S6OQ.jpg', 'warung setelah pintu masuk'),
(33, '2024-08-18 07:39:45', '2024-08-18 07:39:45', 'cfIabWcUt8cLxAA5XLkqDYTVb7ONNBgSUj2PCMvN.jpg', 'gambar 4 saung setelah warung'),
(35, '2024-08-18 08:34:11', '2024-08-18 08:34:11', 'Cnnkmrn43NYfQXa407EhFIR1KDCTkqzTH3aSI95t.jpg', 'gambar 5'),
(37, '2024-08-18 08:59:02', '2024-08-18 08:59:02', 'CdC0cYqOrnLzHHa3HAHw2bhC0JVxfePn4rnlOTwO.jpg', 'gambar 6'),
(39, '2024-08-18 09:10:07', '2024-08-18 09:10:07', 'nwAFJbeYkl306bEbFvcp45Gb66uDApqZhKermeRz.jpg', 'gambar 7'),
(40, '2024-08-18 09:17:56', '2024-08-18 09:17:56', 'vT3nBooQ0L9x3yvuJGVI3MGoQ0fDaY3iKuW8kme2.jpg', 'gambar 8'),
(41, '2024-08-18 09:22:41', '2024-08-18 09:22:41', 'diVkaiAe7z4SBc563tiu2937TplGFFq2JqbZQgjG.jpg', 'gambar 9'),
(42, '2024-08-18 09:27:31', '2024-08-18 09:27:31', '4ZACQDP9enIcdsKxNCipgjpJOkrmv1RKFwb8lMCJ.jpg', 'gambar 10'),
(43, '2024-08-18 09:33:07', '2024-08-18 09:33:07', 'LvDt2WvPDN3JYQeTMyQI6KNbB4cyTyi47VtsquXx.jpg', 'gambar 11'),
(44, '2024-08-18 09:36:35', '2024-08-18 09:36:35', 'oqKTM3Zt3pxar08nICNlIYrMZkblxHyuOWAE16Tg.jpg', 'gambar 12'),
(45, '2024-08-18 09:42:24', '2024-08-18 09:42:24', 'RHoMXvKvpNwwroyebjDZzTU6NwPL4DQA47zRb0Ld.jpg', 'gambar 13'),
(47, '2024-08-18 12:02:21', '2024-08-18 12:02:21', 'YIF6VjnIA8aRcM574U17yA3zM0devsgeqafqIAIP.jpg', 'gambar 14'),
(48, '2024-08-18 12:02:43', '2024-08-18 12:02:43', 'CdtS6TmKtYTgrpVNEDmkSh0N7GlU5sY7o1N6doGM.jpg', 'gambar 15'),
(49, '2024-08-18 12:03:00', '2024-08-18 12:03:00', 'yZ01OJHhwSXUwnRWwxbeovfLJVq1svPVEWzzjeOd.jpg', 'gambar 16'),
(50, '2024-08-18 12:03:18', '2024-08-18 12:03:18', '8DwiZh3LJMpkADcKMZe4iW4YdKOWCrzdKW4cIHiR.jpg', 'gambar17'),
(51, '2024-08-18 12:03:36', '2024-08-18 12:03:36', 't0oID1Jy7clLD5F8rWdBybKb2rVoJUVOVfCwH9Ir.jpg', 'gambar 18'),
(52, '2024-08-18 12:22:45', '2024-08-18 12:22:45', 'GYXPnTBc4FR2q7wmoPH7XPwN1LaMHIKA7UMNQDNs.jpg', 'gambar 19');

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('lWOaATnWPAG1zAtt2VV3fBn4VapmkU3wfEHDjUAu', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNTJySkNMdzJPOXo1dXRnaWhqMDRYVjlGRTgxNGNqR3g3QWlnblZrdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wYW5vcmFtYT9wYWdlPTIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1731807774),
('qO0MxjTC8YzGRdlyvKPi3PghEr4YYSkBoa0YFrYY', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMGhaVnhjZVZHV2FiaVJxZHhvNGMwNmdSOGdsSW9JYlY1MThRUm5CdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wYW5vcmFtYS9zaG93LzUyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1731827294);

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
(1, 'Arif', 'arifsetia@gmail.com', NULL, '$2a$12$G9W82qRelgT.p9uZovRJgeq5hCzCTs.tMdAWiYzffj44HBo8vbS0G', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `koordinates`
--
ALTER TABLE `koordinates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `koordinates_panorama_id_foreign` (`panorama_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panoramas`
--
ALTER TABLE `panoramas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `koordinates`
--
ALTER TABLE `koordinates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `panoramas`
--
ALTER TABLE `panoramas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `koordinates`
--
ALTER TABLE `koordinates`
  ADD CONSTRAINT `koordinates_panorama_id_foreign` FOREIGN KEY (`panorama_id`) REFERENCES `panoramas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
