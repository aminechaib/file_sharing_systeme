-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 05:14 PM
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
-- Database: `file_share`
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

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('root@tempfolderapp.com|127.0.0.1', 'i:1;', 1713869651),
('root@tempfolderapp.com|127.0.0.1:timer', 'i:1713869651;', 1713869651);

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
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `recipient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filename` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `user_id`, `recipient_id`, `filename`, `path`, `created_at`, `updated_at`) VALUES
(4, 1, 2, 'test..xlsx', 'public/files/FKWOefFVsekMY85akLY49YqN62rkeMBsmdhtM6jv.xlsx', '2024-04-23 07:44:44', '2024-04-23 07:44:44'),
(5, 2, 1, 'test..xlsx', 'public/files/nPSD3kScl1mtiUw4n4lDLu2GqsbrQuUupWkmTGh8.xlsx', '2024-04-23 07:54:12', '2024-04-23 07:54:12'),
(6, 2, 1, 'pieces (2).sql', 'public/files/YxY3HZt82axjdC7bt9S1MrQFZyHLS1NydZQfuMly.txt', '2024-04-23 07:54:27', '2024-04-23 07:54:27'),
(7, 3, 1, 'users.sql', 'public/files/AdNfpx8CDHslWxSiTE69Q0YtgutQTyOWo1rBcgDD.txt', '2024-04-23 08:04:53', '2024-04-23 08:04:53'),
(8, 1, 2, 'pieces (2) (1).sql', 'public/files/5xLLUwtwsaeIk1fstndr0AP6j2bUkFQK5gmI44K6.txt', '2024-04-23 08:37:43', '2024-04-23 08:37:43'),
(9, 1, 2, 'test..xlsx', 'public/files/aAXR8zcf7Vg9acUdbeAorFg6bNcQJT0jHbj3xvuj.xlsx', '2024-04-23 08:59:10', '2024-04-23 08:59:10'),
(10, 2, 1, 'test..xlsx', 'public/files/yOzEueXsDwqq27qlmHidR4iTusQjkBSje7A7nzF0.xlsx', '2024-04-23 09:15:55', '2024-04-23 09:15:55'),
(11, 2, 3, 'test..xlsx', 'public/files/eay9POAKXFHLlHJq8xVWcPD0CXxNlSsukR8eE8b0.xlsx', '2024-04-23 09:16:26', '2024-04-23 09:16:26'),
(12, 2, 3, 'test..xlsx', 'public/files/VagFdNhBc9X3TUGrVZMcuuXnW859fSMebYheXA0h.xlsx', '2024-04-23 09:16:33', '2024-04-23 09:16:33'),
(13, 2, 3, 'test. (1).xlsx', 'public/files/qhfW5GW9iTQgAH0NHCr1HkIFXW475c27tMiBUWbS.xlsx', '2024-04-23 09:16:44', '2024-04-23 09:16:44'),
(14, 3, 1, 'export (8).xlsx', 'public/files/TJ9OiF3tGaW1Yusbny2G2zsIFpZX66oHWij1uuC8.xlsx', '2024-04-23 10:15:03', '2024-04-23 10:15:03'),
(15, 1, 3, 'export (9).xlsx', 'public/files/PYoElXf1dq903i7VvvZZUYbqAYUjyWnpaHH5yGlD.xlsx', '2024-04-23 10:17:12', '2024-04-23 10:17:12'),
(16, 3, 1, 'test..xlsx', 'public/files/ofY6mKMI8FmMEy1pqlQmlIX452kMIcgd6ejl7uzt.xlsx', '2024-04-24 08:59:01', '2024-04-24 08:59:01'),
(17, 3, 2, 'test. (1) (1).xlsx', 'public/files/VhcOVaF9dXIzVvvSL1GfyGBQlWVLyaHiYuaHG3ds.xlsx', '2024-04-24 09:00:23', '2024-04-24 09:00:23'),
(18, 3, 1, 'test. (1).xlsx', 'public/files/TrZCi6ZWjyxuvM1Eh17sN88rQ8kKliOO9asJacEG.xlsx', '2024-04-24 09:03:19', '2024-04-24 09:03:19'),
(19, 3, 2, 'export (8).xlsx', 'public/files/P8EcEvsGuSbYy4OgLwwkUI3hC2KBZg5RJTglwB5Y.xlsx', '2024-04-24 09:04:07', '2024-04-24 09:04:07'),
(20, 3, 1, 'test..xlsx', 'public/files/JPDyMpmeuV0rqRbuktTMiXJgjFzSMVOzkKAv2Llx.xlsx', '2024-04-24 09:05:17', '2024-04-24 09:05:17'),
(21, 3, 1, 'test..xlsx', 'public/files/jBKFHjoVzgY0BS8Grpmmmr71k0wo1wbtFTj02nXB.xlsx', '2024-04-24 09:08:10', '2024-04-24 09:08:10'),
(22, 3, 1, 'test..xlsx', 'public/files/c6m7TFFsoxg4Jjb4vuATJyJFpWIQdTMJm4uYek9R.xlsx', '2024-04-24 09:09:13', '2024-04-24 09:09:13'),
(23, 1, 2, 'users.sql', 'public/files/IWrmWGzLeGx3fkKZipYtTJ1JlbxO4rV4UH5m7F6W.txt', '2024-04-24 10:21:13', '2024-04-24 10:21:13'),
(24, 2, 1, 'test. (1).xlsx', 'public/files/1H1SnvmwUxk5uy6GI0Z2B0DzrEujHrJnGyERX6yy.xlsx', '2024-04-24 13:33:27', '2024-04-24 13:33:27'),
(25, 2, 1, 'test. (3).xlsx', 'public/files/9YEnQsm3II0FtI8gZffRfleBAGkLckoACtuSGL3t.xlsx', '2024-04-24 13:41:44', '2024-04-24 13:41:44'),
(26, 2, 1, 'test. (3).xlsx', 'public/files/uFEunbcXDrivs7mMpby8bQ4u7HMYN6s2lllujW48.xlsx', '2024-04-24 13:50:09', '2024-04-24 13:50:09'),
(27, 2, 1, 'test. (2).xlsx', 'public/files/XFli6QbjatWF34k69NGtXDaghJ0gzk0ZCgGpBmbO.xlsx', '2024-04-24 13:58:55', '2024-04-24 13:58:55'),
(28, 2, 3, 'export.csv', 'public/files/X7N1rjQY2iIKgwIkSZAiX2IOPRGkLO21QPK1yx31.txt', '2024-04-24 14:51:39', '2024-04-24 14:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `file_user`
--

CREATE TABLE `file_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(4, '2024_04_23_073819_create_files_table', 1),
(5, '2024_04_23_081048_create_file_user_table', 1),
(6, '2024_04_24_112440_add_role_to_users_table', 2);

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
('4YjMEU0C07XTXjgGfmCE8teQlxQIhbNqJsKBKjwP', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNDRiWndDNDV5c3pTeDNuU0pBMFM3c25uMUJaOTgzbnNmWXBLMWM3ZSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1713971522);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'user1', 'amine@gmail.com', NULL, '$2y$12$y05pAAZaMbA6Xhtj5iBgR.C.JAKt2YJWcstMlBV8ICE0YZarZIqy6', NULL, '2024-04-23 07:27:34', '2024-04-23 07:27:34', 'user'),
(2, 'user2', 'chaib@gmail.com', NULL, '$2y$12$cK/oqpKn.TrOfbhJ4pAruuwdKMwGM/gvY522CU8TssiZh1PwrchBe', NULL, '2024-04-23 07:28:06', '2024-04-23 07:28:06', 'user'),
(3, 'user3', 'c@gmail.com', NULL, '$2y$12$seDxED2uNAGa8HnNx66puu8t3XjOj4E99c2IP3KU7R8d8YIPtY7Ym', NULL, '2024-04-23 08:04:32', '2024-04-23 08:04:32', 'user');

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
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_user_id_foreign` (`user_id`),
  ADD KEY `files_recipient_id_foreign` (`recipient_id`);

--
-- Indexes for table `file_user`
--
ALTER TABLE `file_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_user_file_id_foreign` (`file_id`),
  ADD KEY `file_user_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `file_user`
--
ALTER TABLE `file_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_recipient_id_foreign` FOREIGN KEY (`recipient_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `files_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `file_user`
--
ALTER TABLE `file_user`
  ADD CONSTRAINT `file_user_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `file_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
