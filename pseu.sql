-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2020 at 02:13 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fpmoz`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_11_28_161439_create_testovi_table', 1),
(4, '2016_11_28_161440_create_odgovori_na_testove_table', 1),
(5, '2018_05_08_111554_create_predmeti_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2020_05_08_110931_create_posts_table', 1),
(8, '2020_05_08_111641_create_comments_table', 1),
(9, '2020_11_22_160943_create_pitanja_table', 1),
(10, '2020_11_22_161439_create_odgovori_table', 1),
(11, '2020_11_23_140354_create_rezultati_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `odgovoris`
--

CREATE TABLE `odgovoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pitanje_id` bigint(20) UNSIGNED NOT NULL,
  `option` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correct` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `odgovoris`
--

INSERT INTO `odgovoris` (`id`, `pitanje_id`, `option`, `correct`, `created_at`, `updated_at`) VALUES
(4, 3, 'mmmmm', 0, '2020-07-05 16:59:51', '2020-09-10 18:27:59'),
(5, 3, 'nesto 2', 0, '2020-07-05 16:59:51', '2020-07-05 16:59:51'),
(6, 3, 'nesto 3', 1, '2020-07-05 16:59:51', '2020-07-05 16:59:51'),
(7, 4, 'odgovor1', 0, '2020-08-19 15:19:53', '2020-08-19 15:19:53'),
(8, 4, 'odgovor2', 0, '2020-08-19 15:19:54', '2020-08-19 15:19:54'),
(9, 4, 'odgovor3', 1, '2020-08-19 15:19:54', '2020-08-19 15:19:54'),
(10, 4, 'odgoovor4', 0, '2020-08-19 15:19:54', '2020-08-19 15:19:54'),
(11, 5, 'Gradivna jedinica svih živih bića', 1, '2020-09-11 08:51:30', '2020-09-11 08:51:30'),
(12, 5, 'Gradivna jedinica svih bića', 0, '2020-09-11 08:51:30', '2020-09-11 08:51:30'),
(13, 5, 'Niti jedno od ponuđenih', 0, '2020-09-11 08:51:31', '2020-09-11 08:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pitanjas`
--

CREATE TABLE `pitanjas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `predmet_id` bigint(20) UNSIGNED NOT NULL,
  `question_text` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pitanjas`
--

INSERT INTO `pitanjas` (`id`, `predmet_id`, `question_text`, `created_at`, `updated_at`) VALUES
(3, 1, 'matematika i brojevi', '2020-07-05 16:59:50', '2020-09-10 17:23:01'),
(4, 1, 'Što je linearna jednadžba?', '2020-08-19 15:19:53', '2020-08-19 15:19:53'),
(5, 2, 'Šta je stanica blablab', '2020-09-11 08:51:30', '2020-09-11 08:51:56');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `predmet_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `predmeti`
--

CREATE TABLE `predmeti` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ects` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `predmeti`
--

INSERT INTO `predmeti` (`id`, `title`, `body`, `ects`, `created_at`, `updated_at`) VALUES
(1, 'Matematika', 'Matematika je matematika blbalbal', 6, '2020-07-05 15:34:55', '2020-09-11 08:50:18'),
(2, 'Biologija', 'bilogofrrfrf', 4, '2020-09-11 08:50:47', '2020-09-11 08:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `rezultati`
--

CREATE TABLE `rezultati` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `correct` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `result` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `user_id`, `result`, `created_at`, `updated_at`, `deleted_at`) VALUES
(21, 1, '2', '2020-09-14 09:33:17', '2020-09-14 09:33:17', NULL),
(22, 5, '3', '2020-09-14 09:34:12', '2020-09-14 09:34:12', NULL),
(23, 5, '1', '2020-09-14 09:45:43', '2020-09-14 09:45:44', NULL),
(24, 8, '3', '2020-09-14 09:59:25', '2020-09-14 09:59:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test_odgovors`
--

CREATE TABLE `test_odgovors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `test_id` int(10) UNSIGNED DEFAULT NULL,
  `question_id` int(10) UNSIGNED DEFAULT NULL,
  `correct` tinyint(4) DEFAULT '0',
  `option_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `test_odgovors`
--

INSERT INTO `test_odgovors` (`id`, `user_id`, `test_id`, `question_id`, `correct`, `option_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 1, 21, 5, 1, 11, '2020-09-14 09:33:17', '2020-09-14 09:33:17', NULL),
(11, 1, 21, 4, 0, 8, '2020-09-14 09:33:17', '2020-09-14 09:33:17', NULL),
(12, 1, 21, 3, 1, 6, '2020-09-14 09:33:17', '2020-09-14 09:33:17', NULL),
(13, 5, 22, 5, 1, 11, '2020-09-14 09:34:12', '2020-09-14 09:34:12', NULL),
(14, 5, 22, 4, 1, 9, '2020-09-14 09:34:12', '2020-09-14 09:34:12', NULL),
(15, 5, 22, 3, 1, 6, '2020-09-14 09:34:12', '2020-09-14 09:34:12', NULL),
(16, 5, 23, 5, 0, 13, '2020-09-14 09:45:43', '2020-09-14 09:45:43', NULL),
(17, 5, 23, 4, 1, 9, '2020-09-14 09:45:44', '2020-09-14 09:45:44', NULL),
(18, 5, 23, 3, 0, 5, '2020-09-14 09:45:44', '2020-09-14 09:45:44', NULL),
(19, 8, 24, 3, 1, 6, '2020-09-14 09:59:26', '2020-09-14 09:59:26', NULL),
(20, 8, 24, 5, 1, 11, '2020-09-14 09:59:26', '2020-09-14 09:59:26', NULL),
(21, 8, 24, 4, 1, 9, '2020-09-14 09:59:26', '2020-09-14 09:59:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Marija Magdalena', 'Dominkovic', 'marija1', 'megi.dominkovic@hotmail.com', '$2y$10$ZxS5W0G2AwcZ.7BYcuA4w.rhQvhc6miCvQlbjQPDcOsbHMXfsHwIe', 'Profesor', '2020-07-05 15:31:45', '2020-07-05 15:31:45'),
(5, 'Mirko', 'Mirić', 'mirko1', 'mirko@mirko.com', '$2y$10$Nrhx0b06eQ0TPp8j/ndNPO10j47cIoRIw2mqr7D/O3jjckOCV6aEu', '', '2020-08-26 13:11:56', '2020-08-26 13:11:56'),
(8, 'Ermin', 'Srna', 'srna123', 'userpass@example.com', '$2y$10$SrZH0tc4EclXX6bfHu.yYuFIIkmxjHfDFuGGOU8DP.q0eNpkHtRki', '', '2020-09-14 09:52:17', '2020-09-14 09:52:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `odgovoris`
--
ALTER TABLE `odgovoris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `odgovori_odgovor_id_foreign` (`pitanje_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pitanjas`
--
ALTER TABLE `pitanjas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pitanja_predmet_id_foreign` (`predmet_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_predmet_id_foreign` (`predmet_id`);

--
-- Indexes for table `predmeti`
--
ALTER TABLE `predmeti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rezultati`
--
ALTER TABLE `rezultati`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rezultati_user_id_foreign` (`user_id`),
  ADD KEY `rezultati_question_id_foreign` (`question_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_odgovors`
--
ALTER TABLE `test_odgovors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `odgovoris`
--
ALTER TABLE `odgovoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pitanjas`
--
ALTER TABLE `pitanjas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `predmeti`
--
ALTER TABLE `predmeti`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rezultati`
--
ALTER TABLE `rezultati`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `test_odgovors`
--
ALTER TABLE `test_odgovors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `odgovoris`
--
ALTER TABLE `odgovoris`
  ADD CONSTRAINT `odgovori_odgovor_id_foreign` FOREIGN KEY (`pitanje_id`) REFERENCES `pitanjas` (`id`);

--
-- Constraints for table `pitanjas`
--
ALTER TABLE `pitanjas`
  ADD CONSTRAINT `pitanja_predmet_id_foreign` FOREIGN KEY (`predmet_id`) REFERENCES `predmeti` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_predmet_id_foreign` FOREIGN KEY (`predmet_id`) REFERENCES `predmeti` (`id`),
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `rezultati`
--
ALTER TABLE `rezultati`
  ADD CONSTRAINT `rezultati_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `pitanjas` (`id`),
  ADD CONSTRAINT `rezultati_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
