-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2021 at 07:52 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karele`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `amount`, `user_id`, `ref`, `created_at`, `updated_at`) VALUES
(1, '5456', '3', 'karele1607781807', '2020-12-12 13:03:27', '2020-12-12 13:03:27'),
(2, '4', '3', 'karele1607781960', '2020-12-12 13:06:00', '2020-12-12 13:06:00'),
(3, '4', '3', 'karele1607782384', '2020-12-12 13:13:04', '2020-12-12 13:13:04'),
(4, '6', '3', 'karele1607782429', '2020-12-12 13:13:49', '2020-12-12 13:13:49'),
(5, '52525252', '10', 'karele1609263420', '2020-12-29 16:37:00', '2020-12-29 16:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `video`, `created_at`, `updated_at`) VALUES
(4, 'karele_wa_1607651698.mp4', '2020-12-11 00:54:58', '2020-12-11 00:54:58'),
(5, 'wordpress_1607771314.mp4', '2020-12-12 10:08:34', '2020-12-12 10:08:34'),
(6, 'karele_2_1607962868.mp4', '2020-12-14 15:21:08', '2020-12-14 15:21:08'),
(7, 'karele_2_1607963114.mp4', '2020-12-14 15:25:14', '2020-12-14 15:25:14');

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
(4, '2020_12_08_132629_create_videos_table', 2),
(5, '2020_12_08_135744_create_files_table', 2),
(6, '2020_12_12_131639_create_accounts_table', 3),
(7, '2020_12_12_205850_create_subscribers_table', 4),
(8, '2020_12_15_113818_create_plans_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('omolewu12@gmail.com', '$2y$10$5bL0OJ6LLBOSOnRCWrXtveO6rRnBagSxSrfl87wzMoFCsGkF.sXw.', '2020-12-29 15:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `price`, `duration`, `created_at`, `updated_at`) VALUES
(1, 'One time', '323', '6 hours', '2020-12-15 12:28:04', '2020-12-15 12:28:04'),
(2, 'Part time', '4353', '1 day', '2020-12-15 13:44:39', '2020-12-15 13:44:39'),
(3, 'Quater', '2000', '1 week', '2020-12-15 13:45:30', '2020-12-15 13:45:30'),
(4, 'Quater 1', '4789', '4 months', '2020-12-17 12:22:38', '2020-12-17 12:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` float(10,2) NOT NULL,
  `video_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `user_id`, `amount`, `video_id`, `created_at`, `updated_at`) VALUES
(1, '3', 200.00, 4, '2020-12-19 06:10:27', '2020-12-19 06:10:27'),
(2, '3', 0.00, 3, '2020-12-20 19:06:44', '2020-12-20 19:06:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalsub` int(11) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `subscriber_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `country`, `role`, `slug`, `totalsub`, `balance`, `subscriber_id`, `plan_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `dob`) VALUES
(1, 'Oluokun kabiru', 'oka@vb.fom', '6344673', 'Afganistan', 'user', 'kb', 0, '0.00', NULL, NULL, NULL, '$2y$10$XhJpkg9CwBn43p.qzUZ5.e0/vqQWfSRaeVuM8kKuGwYwyRw4C.mUm', NULL, '2020-12-08 11:57:38', '2020-12-08 11:57:38', ''),
(2, 'Oluokun kabiru', 'admin@vb.com', '322344234', 'Albania', 'admin', 'ad', 0, '0.00', NULL, NULL, NULL, '$2y$10$ZqUHbQD1SMu6CwC8TCwiauiH5FkwPuNEm8aAhDMbv5iXBO4T4P1eK', NULL, '2020-12-09 10:33:14', '2020-12-21 11:57:19', ''),
(3, 'Okunola Mariam Omobolaji', 'maryam@vb.com', '7489237499', 'Australia', 'user', 'mr', 8, '2187.00', '6', 1, NULL, '$2y$10$IDeNKDFDLLwiymI0hAY3w.0zbtttRd11G3LlGxCvq8Wn6WN2uYIRu', NULL, '2020-12-10 11:29:13', '2020-12-20 19:06:43', ''),
(10, 'Sunday Opeyemi', 'omolewu12@gmail.com', '08102519926', 'Afghanistan', 'user', 'sunday-opeyemi1609225014', 0, '52525252.00', NULL, NULL, '2020-12-02 17:01:18', '$2y$10$CXMoy/jKRDnztRQfm6QwLuy41Eff28T1rBg9dK5seAod7Ukrnoof6', 'PellVB2tpRB0sJtW2jnn06kKLh2uPHWHApeqGlVMj0FSI3bhw1J9vhHLKJFH', '2020-12-29 05:56:54', '2020-12-29 16:37:00', '2020-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `totalsubscriber` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `file_id`, `user_id`, `title`, `date`, `slug`, `price`, `totalsubscriber`, `created_at`, `updated_at`) VALUES
(3, '4', '2', 'Karele wa', '2020-12-21', 'karele-wa-1607651699', '0.00', 2, '2020-12-11 00:54:59', '2020-12-20 19:06:43'),
(4, '5', '2', 'Wordpress', '2020-12-22', 'wordpress-1607771315', '200.00', 2, '2020-12-12 10:08:35', '2020-12-19 06:10:27'),
(5, '7', '2', 'karele 2', '2020-12-22', 'karele-2-1607963115', '3000.00', 0, '2020-12-14 15:25:15', '2020-12-14 15:25:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
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
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
