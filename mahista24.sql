-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2023 at 12:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahista24`
--

-- --------------------------------------------------------

--
-- Table structure for table `categores`
--

CREATE TABLE `categores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categores`
--

INSERT INTO `categores` (`id`, `title`, `slug`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'هتل', 'hotels', NULL, NULL, '2023-07-04 09:49:26', '2023-07-04 09:49:26'),
(2, 'تور', 'tors', NULL, NULL, '2023-07-04 09:49:26', '2023-07-04 09:49:26'),
(3, 'ویلا و اقامت گاه', 'villas', NULL, NULL, '2023-07-04 09:49:26', '2023-07-04 09:49:26'),
(4, 'بلیط هواپیما', 'airfare', NULL, NULL, '2023-07-04 09:49:26', '2023-07-04 09:49:26'),
(5, 'بلیط قطار', 'train-ticket', NULL, NULL, '2023-07-04 09:49:26', '2023-07-04 09:49:26');

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
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `logo_image` varchar(255) DEFAULT NULL,
  `main_image` varchar(255) NOT NULL,
  `price` int(10) UNSIGNED DEFAULT NULL,
  `image_gallery` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`image_gallery`)),
  `contact_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`contact_data`)),
  `social_links` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`social_links`)),
  `location` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`location`)),
  `categore_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `title`, `slug`, `logo_image`, `main_image`, `price`, `image_gallery`, `contact_data`, `social_links`, `location`, `categore_id`, `user_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'هتل اسپیناس', '1688635146-هتل-اسپیناس', 'uploads/items/1688635146_hotel.svg', 'uploads/items/1688635146_01.jpg', 500000, '[{\"url\":\"uploads\\/items\\/1688635146_08.jpg\"},{\"url\":\"uploads\\/items\\/1688635146_07.jpg\"},{\"url\":\"uploads\\/items\\/1688635146_06.jpg\"},{\"url\":\"uploads\\/items\\/1688635146_05.jpg\"},{\"url\":\"uploads\\/items\\/1688635146_04.jpg\"},{\"url\":\"uploads\\/items\\/1688635146_03.jpg\"},{\"url\":\"uploads\\/items\\/1688635146_02.jpg\"}]', '{\"address\":\"\\u0641\\u0631\\u0627\\u0646\\u06a9\\u0641\\u0648\\u0631\\u062a\\u060c \\u062e\\u06cc\\u0627\\u0628\\u0627\\u0646 \\u0627\\u0635\\u0644\\u06cc \\u067e\\u0644\\u0627\\u06a9 45\",\"phone\":\"(302) 555-0107, (302) 555-0208\",\"email\":\"bb-hotel@example.com\",\"website\":\"bb-hotel.com\"}', '{\"facebook\":\"#\",\"twitter\":\"#\",\"instagram\":\"#\"}', NULL, 1, NULL, '1', NULL, '2023-07-06 05:49:06', '2023-07-06 05:49:06'),
(2, 'تور 3 روزه کیش', '1688651360-تور-3-روزه-کیش', NULL, 'uploads/items/1688651360_IMG_20230602_204843_957.jpg', 1000000, '[{\"url\":\"uploads\\/items\\/1688651360_\\u067e\\u0631\\u0648\\u0698\\u0647_\\u06cc \\u062c\\u062f\\u06cc\\u062f (3).png\"},{\"url\":\"uploads\\/items\\/1688651360_\\u067e\\u0631\\u0648\\u0698\\u0647_\\u06cc \\u062c\\u062f\\u06cc\\u062f (2).png\"},{\"url\":\"uploads\\/items\\/1688651360_\\u067e\\u0631\\u0648\\u0698\\u0647_\\u06cc \\u062c\\u062f\\u06cc\\u062f (1).png\"},{\"url\":\"uploads\\/items\\/1688651360_\\u067e\\u0631\\u0648\\u0698\\u0647_\\u06cc \\u062c\\u062f\\u06cc\\u062f.png\"}]', '{\"address\":\"\\u0641\\u0631\\u0627\\u0646\\u06a9\\u0641\\u0648\\u0631\\u062a\\u060c \\u062e\\u06cc\\u0627\\u0628\\u0627\\u0646 \\u0627\\u0635\\u0644\\u06cc \\u067e\\u0644\\u0627\\u06a9 45\",\"phone\":\"(302) 555-0107, (302) 555-0208\",\"email\":\"bb-hotel@example.com\",\"website\":\"bb-hotel.com\"}', '{\"facebook\":\"#\",\"twitter\":\"#\",\"instagram\":\"#\"}', NULL, 2, NULL, '1', NULL, '2023-07-06 10:19:20', '2023-07-06 10:19:20');

-- --------------------------------------------------------

--
-- Table structure for table `item_room_types`
--

CREATE TABLE `item_room_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_type_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_room_types`
--

INSERT INTO `item_room_types` (`id`, `room_type_id`, `item_id`, `price`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 500000, '1', NULL, NULL, NULL),
(2, 2, 1, 700000, '1', NULL, NULL, NULL),
(3, 3, 1, 1000000, '1', NULL, NULL, NULL);

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
(1, '2000_01_01_000100_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2020_01_01_000200_create_categores_table', 1),
(6, '2020_01_01_000300_create_room_types_table', 1),
(7, '2020_01_01_000400_create_items_table', 1),
(8, '2020_01_01_000490_create_payments_table', 1),
(9, '2020_01_01_000500_create_orders_table', 1),
(10, '2020_01_01_000600_create_item_room_types_table', 1),
(11, '2020_01_01_000700_create_reserves_table', 1),
(12, '2023_07_06_114557_add_melicode_to_users_table', 2),
(13, '2023_07_06_114823_add_melicode_to_reserves_table', 3),
(14, '2023_07_06_132411_add_order_id_to_reserves_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('payed','waittopay','error') NOT NULL,
  `total_price` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `item_id`, `user_id`, `payment_id`, `status`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 'waittopay', 30800000, '2023-07-06 09:51:43', '2023-07-06 09:51:43'),
(2, 1, 2, 2, 'waittopay', 30800000, '2023-07-06 09:52:28', '2023-07-06 09:52:28'),
(3, 1, 2, 3, 'waittopay', 30800000, '2023-07-06 09:54:50', '2023-07-06 09:54:50'),
(4, 1, 2, 4, 'waittopay', 30800000, '2023-07-06 10:01:05', '2023-07-06 10:01:05'),
(5, 1, 2, 5, 'waittopay', 27000000, '2023-07-06 10:01:53', '2023-07-06 10:01:53'),
(6, 1, 2, 6, 'waittopay', 27000000, '2023-07-06 10:03:06', '2023-07-06 10:03:06'),
(7, 1, 2, 7, 'waittopay', 27000000, '2023-07-06 10:05:58', '2023-07-06 10:05:58'),
(8, 1, 2, 8, 'waittopay', 27000000, '2023-07-06 10:07:00', '2023-07-06 10:07:00'),
(9, 1, 2, 9, 'waittopay', 37800000, '2023-07-06 10:07:47', '2023-07-06 10:07:47'),
(10, 2, 2, 10, 'waittopay', 3000000, '2023-07-06 10:37:28', '2023-07-06 10:37:28'),
(11, 2, 2, 11, 'waittopay', 3000000, '2023-07-06 10:38:43', '2023-07-06 10:38:43'),
(12, 1, 2, 12, 'waittopay', 3000000, '2023-07-06 10:43:22', '2023-07-06 10:43:22');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `created_at`, `updated_at`) VALUES
(1, '2023-07-06 09:51:43', '2023-07-06 09:51:43'),
(2, '2023-07-06 09:52:28', '2023-07-06 09:52:28'),
(3, '2023-07-06 09:54:50', '2023-07-06 09:54:50'),
(4, '2023-07-06 10:01:05', '2023-07-06 10:01:05'),
(5, '2023-07-06 10:01:53', '2023-07-06 10:01:53'),
(6, '2023-07-06 10:03:06', '2023-07-06 10:03:06'),
(7, '2023-07-06 10:05:58', '2023-07-06 10:05:58'),
(8, '2023-07-06 10:07:00', '2023-07-06 10:07:00'),
(9, '2023-07-06 10:07:47', '2023-07-06 10:07:47'),
(10, '2023-07-06 10:37:28', '2023-07-06 10:37:28'),
(11, '2023-07-06 10:38:43', '2023-07-06 10:38:43'),
(12, '2023-07-06 10:43:22', '2023-07-06 10:43:22');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reserves`
--

CREATE TABLE `reserves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `count` int(10) UNSIGNED NOT NULL,
  `item_room_type_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `start_at` date DEFAULT NULL,
  `end_at` date DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reserves`
--

INSERT INTO `reserves` (`id`, `item_id`, `user_id`, `price`, `count`, `item_room_type_id`, `created_at`, `updated_at`, `start_at`, `end_at`, `order_id`) VALUES
(1, 1, 2, 7000000, 2, 1, '2023-07-06 09:54:50', '2023-07-06 09:54:50', '2023-07-12', '2023-07-19', 3),
(2, 1, 2, 9800000, 2, 2, '2023-07-06 09:54:50', '2023-07-06 09:54:50', '2023-07-12', '2023-07-19', 3),
(3, 1, 2, 14000000, 2, 3, '2023-07-06 09:54:50', '2023-07-06 09:54:50', '2023-07-12', '2023-07-19', 3),
(4, 1, 2, 7000000, 2, 1, '2023-07-06 10:01:05', '2023-07-06 10:01:05', '2023-07-12', '2023-07-19', 4),
(5, 1, 2, 9800000, 2, 2, '2023-07-06 10:01:05', '2023-07-06 10:01:05', '2023-07-12', '2023-07-19', 4),
(6, 1, 2, 14000000, 2, 3, '2023-07-06 10:01:06', '2023-07-06 10:01:06', '2023-07-12', '2023-07-19', 4),
(7, 1, 2, 5000000, 2, 1, '2023-07-06 10:01:53', '2023-07-06 10:01:53', '2023-07-06', '2023-07-11', 5),
(8, 1, 2, 7000000, 2, 2, '2023-07-06 10:01:53', '2023-07-06 10:01:53', '2023-07-06', '2023-07-11', 5),
(9, 1, 2, 15000000, 3, 3, '2023-07-06 10:01:53', '2023-07-06 10:01:53', '2023-07-06', '2023-07-11', 5),
(10, 1, 2, 5000000, 2, 1, '2023-07-06 10:03:06', '2023-07-06 10:03:06', '2023-07-06', '2023-07-11', 6),
(11, 1, 2, 7000000, 2, 2, '2023-07-06 10:03:07', '2023-07-06 10:03:07', '2023-07-06', '2023-07-11', 6),
(12, 1, 2, 15000000, 3, 3, '2023-07-06 10:03:07', '2023-07-06 10:03:07', '2023-07-06', '2023-07-11', 6),
(13, 1, 2, 5000000, 2, 1, '2023-07-06 10:05:58', '2023-07-06 10:05:58', '2023-07-06', '2023-07-11', 7),
(14, 1, 2, 7000000, 2, 2, '2023-07-06 10:05:58', '2023-07-06 10:05:58', '2023-07-06', '2023-07-11', 7),
(15, 1, 2, 15000000, 3, 3, '2023-07-06 10:05:58', '2023-07-06 10:05:58', '2023-07-06', '2023-07-11', 7),
(16, 1, 2, 5000000, 2, 1, '2023-07-06 10:07:00', '2023-07-06 10:07:00', '2023-07-06', '2023-07-11', 8),
(17, 1, 2, 7000000, 2, 2, '2023-07-06 10:07:00', '2023-07-06 10:07:00', '2023-07-06', '2023-07-11', 8),
(18, 1, 2, 15000000, 3, 3, '2023-07-06 10:07:00', '2023-07-06 10:07:00', '2023-07-06', '2023-07-11', 8),
(19, 1, 2, 7000000, 2, 1, '2023-07-06 10:07:47', '2023-07-06 10:07:47', '2023-07-06', '2023-07-13', 9),
(20, 1, 2, 9800000, 2, 2, '2023-07-06 10:07:47', '2023-07-06 10:07:47', '2023-07-06', '2023-07-13', 9),
(21, 1, 2, 21000000, 3, 3, '2023-07-06 10:07:47', '2023-07-06 10:07:47', '2023-07-06', '2023-07-13', 9),
(22, 2, 2, 3000000, 3, NULL, '2023-07-06 10:38:43', '2023-07-06 10:38:43', NULL, NULL, 11),
(23, 1, 2, 1000000, 2, NULL, '2023-07-06 10:43:22', '2023-07-06 10:43:22', NULL, NULL, 12),
(24, 1, 2, 1000000, 2, NULL, '2023-07-06 10:43:22', '2023-07-06 10:43:22', NULL, NULL, 12),
(25, 1, 2, 1000000, 2, NULL, '2023-07-06 10:43:22', '2023-07-06 10:43:22', NULL, NULL, 12);

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `title`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'یک تخته', NULL, '2023-07-05 11:05:12', '2023-07-05 11:05:12'),
(2, 'دو تخته', NULL, '2023-07-05 11:05:12', '2023-07-05 11:05:12'),
(3, 'سه تخته', NULL, '2023-07-05 11:05:12', '2023-07-05 11:05:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meliCode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `profile`, `email`, `phone`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `meliCode`) VALUES
(1, 'مدیریت', NULL, 'mahtisatourism62601@gmail.com', '09358356537', 'admin', NULL, '$2y$10$nyuNxXCZeszjt.tZO.598uyJZlb5uuv8Dhny0DNFoLMIhV/Af.EU2', NULL, '2023-07-04 09:49:26', '2023-07-04 09:49:26', NULL),
(2, 'امینی', NULL, NULL, '09356867218', 'user', NULL, NULL, NULL, '2023-07-06 09:32:38', '2023-07-06 09:32:38', '21312321312');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categores`
--
ALTER TABLE `categores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_categore_id_foreign` (`categore_id`),
  ADD KEY `items_user_id_foreign` (`user_id`);

--
-- Indexes for table `item_room_types`
--
ALTER TABLE `item_room_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_room_types_room_type_id_foreign` (`room_type_id`),
  ADD KEY `item_room_types_item_id_foreign` (`item_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_item_id_foreign` (`item_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reserves`
--
ALTER TABLE `reserves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reserves_item_id_foreign` (`item_id`),
  ADD KEY `reserves_user_id_foreign` (`user_id`),
  ADD KEY `reserves_order_id_foreign` (`order_id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categores`
--
ALTER TABLE `categores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item_room_types`
--
ALTER TABLE `item_room_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reserves`
--
ALTER TABLE `reserves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_categore_id_foreign` FOREIGN KEY (`categore_id`) REFERENCES `categores` (`id`),
  ADD CONSTRAINT `items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `item_room_types`
--
ALTER TABLE `item_room_types`
  ADD CONSTRAINT `item_room_types_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `item_room_types_room_type_id_foreign` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reserves`
--
ALTER TABLE `reserves`
  ADD CONSTRAINT `reserves_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `reserves_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `reserves_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
