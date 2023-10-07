-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2023 at 09:17 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `netvlik`
--

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
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `film_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`user_id`, `film_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-08-18 11:50:23', '2023-08-18 11:50:23'),
(1, 2, '2023-08-18 11:50:26', '2023-08-18 11:50:26'),
(1, 3, '2023-08-18 11:50:29', '2023-08-18 11:50:29'),
(2, 5, '2023-08-18 11:50:49', '2023-08-18 11:50:49'),
(2, 10, '2023-08-18 11:50:53', '2023-08-18 11:50:53'),
(2, 11, '2023-08-18 11:51:04', '2023-08-18 11:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cast` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `title`, `url`, `desc`, `genre`, `cast`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Alice in Borderland', 'images/1692382017.jpg', 'An aimless gamer and his two friends find themselves in a parallel Tokyo, where they\'re forced to compete in a series of sadistic games to survive', 'Japanese, Sci-Fi TV, TV Action & Adventure', 'Kento Yamazaki, Tao Tsuchiya, Nijiro Murakami, more', '2023-08-18 11:06:57', '2023-08-18 11:06:57', NULL),
(2, 'Jujutsu Kaisen', 'images/1692382132.jpg', 'With his days numbered, high schooler Yuji decides to hunt down and consume the remaining 19 fingers of a deadly curse so it can die with him', 'Shounen Anime, Action Anime, Japanese', 'Junya Enoki, Yuma Uchida, Asami Seto, more', '2023-08-18 11:08:52', '2023-08-18 11:08:52', NULL),
(3, 'Zom 100', 'images/1692382308.jpg', 'An overworked 24-yeaer-old finally decides to live a little and create a bucket list, when a zombie outbreak hits the country', 'Action Anime, Japanese, Anime Series', 'Shuichiro Umeda, Tomori Kusunoki, Makato Furukawa, more', '2023-08-18 11:11:48', '2023-08-18 11:11:48', NULL),
(4, 'Money Heist', 'images/1692382483.jpg', 'Eight thieves take hostages and lock themselves in the Royal Mint of Spain as a criminal mastermind manipulates the police to carry out his plan.', 'Spanish, Crime TV Shows, TV Thrillers', 'Ursula Corbero, Alvaro Morte, Itziar Ituno, more', '2023-08-18 11:14:43', '2023-08-18 11:14:43', NULL),
(5, 'NAR 23-2', 'images/1692382548.jpg', 'Junior Laboratory Assistant', 'Horror, Thriller, Action', 'VK23-2, JZ23-2, NL23-2, more', '2023-08-18 11:15:48', '2023-08-18 11:15:48', NULL),
(6, 'All of Use Are Dead', 'images/1692382775.jpg', 'A high school becomes ground zero for a zombie virus outbreak. Trapped students must fight their way out ㅡ or turn into one of the rabid infected.', 'TV Dramas, Korean, Teen TV Shows', 'Park Ji-hui, Yoon Chan-young, Cho Yi-Hyun, more', '2023-08-18 11:19:35', '2023-08-18 11:19:35', NULL),
(7, 'Uncanny Counter', 'images/1692383271.jpg', 'On his birthday, So Mun\'s struck by a strange burst of light that leaves puzzling changes to his body. He finds answers inside the local noodle shop.', 'TV Dramas, Korean, TV Action & Adventure', 'Cho Byeong-kyu, Jun-sang, Kim Se-Jeong', '2023-08-18 11:27:51', '2023-08-18 11:27:51', NULL),
(8, 'Subco Laravel', 'images/1692383678.jpg', 'Berfoto bersama subco laravel', 'Slice of Life', 'VK23-2, ZN22-2', '2023-08-18 11:34:38', '2023-08-18 11:39:34', '2023-08-18 11:39:34'),
(9, 'Subco Laravel', 'images/1692383679.jpg', 'Berfoto bersama subco laravel', 'Slice of Life', 'VK23-2, ZN22-2', '2023-08-18 11:34:39', '2023-08-18 11:35:01', '2023-08-18 11:35:01'),
(10, 'Subco Laravel', 'images/1692383966.jpg', 'Berfoto bersama subco laravel', 'Horror, Thriller, Crime, War, History', 'VK23-2, ZN22-2', '2023-08-18 11:38:03', '2023-08-18 11:39:26', NULL),
(11, 'Squid Game', 'images/1692384156.jpg', 'Hundreds of cash-strapped players accept a strange invitation to compete in childern\'s games. Inside a tempting prize awaits -- with deadly high stakes.', 'TV Dramas, Korean, TV Thrillers', 'Lee Jung-jae, Park Hae-soo, Wi Ha-jun, more', '2023-08-18 11:42:36', '2023-08-18 11:42:36', NULL);

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
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2023_08_16_022822_create_films_table', 1),
(18, '2023_08_16_054205_create_favorites_table', 1);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('member','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `password`, `img_url`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '08131318383832', '$2y$10$hiBTs26bZOR7fShxtwTHwODbdi9WI4QMjPp.I..1/S4b6ZVjMQ8a6', 'images/1692381542.jpg', 'admin', '2023-08-18 10:59:03', '2023-08-18 10:59:03'),
(2, 'VK23-2', 'vk23-2@gmail.com', '08131318383832', '$2y$10$8cNPD/yaYFu49QgiYxcy0e.7S/pK/Ag4hxwJdUr67C6Xnt4WLUnpK', 'images/1692384259.jpg', 'member', '2023-08-18 11:44:19', '2023-08-18 11:44:19');

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
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`user_id`,`film_id`),
  ADD KEY `favorites_film_id_foreign` (`film_id`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
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
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`),
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
