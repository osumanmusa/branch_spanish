-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 09:27 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spanish`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `category_image` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_image`, `created_at`, `updated_at`) VALUES
(5, 'El Alfabeto', '1684246125-card-img-1.png.png', '2023-05-16 00:00:00', '2023-05-16 00:00:00'),
(9, 'En Casa', '1684330818-Rectangle 8.png.png', '2023-05-17 00:00:00', '2023-05-17 00:00:00'),
(10, 'En Clase (In Class)', '1684330874-Rectangle 6.png.png', '2023-05-17 00:00:00', '2023-05-17 00:00:00'),
(11, 'Los Días de la Semana (Days of the Week)', '1684330909-Rectangle 7.png.png', '2023-05-17 00:00:00', '2023-05-17 00:00:00'),
(12, 'Los Meses (Months)', '1684330954-Rectangle 8 (1).png.png', '2023-05-17 00:00:00', '2023-05-17 00:00:00'),
(13, 'Los Números', '1684330988-Rectangle 6 (1).png.png', '2023-05-17 00:00:00', '2023-05-17 00:00:00'),
(14, 'Las Estaciones (Seasons)', '1684331049-Rectangle 7 (1).png.png', '2023-05-17 00:00:00', '2023-05-17 00:00:00'),
(15, '¿Qué Hora Es?', '1684331084-Rectangle 8 (2).png.png', '2023-05-17 00:00:00', '2023-05-17 00:00:00'),
(16, 'Los Colores', '1684331114-Rectangle 6 (2).png.png', '2023-05-17 00:00:00', '2023-05-17 00:00:00'),
(17, 'La Familia', '1684331145-Rectangle 7 (2).png.png', '2023-05-17 00:00:00', '2023-05-17 00:00:00'),
(18, 'Los Verbos', '1684331182-Rectangle 8 (3).png.png', '2023-05-17 00:00:00', '2023-05-17 00:00:00'),
(19, 'Los Adjetivos', '1684331213-Rectangle 6 (3).png.png', '2023-05-17 00:00:00', '2023-05-17 00:00:00'),
(20, 'La Comida', '1684331241-Rectangle 7 (3).png.png', '2023-05-17 00:00:00', '2023-05-17 00:00:00'),
(21, 'La Ropa', '1684331272-Rectangle 8 (4).png.png', '2023-05-17 00:00:00', '2023-05-17 00:00:00'),
(22, 'Los Partes del Cuerpo', '1684331306-Rectangle 6 (4).png.png', '2023-05-17 00:00:00', '2023-05-17 00:00:00'),
(23, 'Technología', '1684331490-Rectangle 7 (4).png.png', '2023-05-17 00:00:00', '2023-05-17 00:00:00'),
(24, 'Profesiones', '1684331511-Rectangle 8 (5).png.png', '2023-05-17 00:00:00', '2023-05-17 00:00:00'),
(25, 'La Naturaleza', '1684331533-Rectangle 8 (6).png.png', '2023-05-17 00:00:00', '2023-05-17 00:00:00');

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
-- Table structure for table `flashcards`
--

CREATE TABLE `flashcards` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `flashcard_title` varchar(200) NOT NULL,
  `flashcard` varchar(150) NOT NULL,
  `flashcard_backcontent` varchar(150) NOT NULL,
  `flashcard_frontcontent` varchar(150) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `pronounciation`
--

CREATE TABLE `pronounciation` (
  `id` int(11) NOT NULL,
  `flashcard_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `pronounciation_title` varchar(250) NOT NULL,
  `pronounciation_voice` varchar(250) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `question` varchar(250) NOT NULL,
  `answer_1` varchar(150) NOT NULL,
  `answer_2` varchar(150) NOT NULL,
  `answer_3` varchar(150) NOT NULL,
  `answer_4` varchar(150) NOT NULL,
  `answer` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userquestions`
--

CREATE TABLE `userquestions` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `user_answer` int(150) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(120) NOT NULL,
  `profile_image` varchar(250) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `parent_firstname` varchar(250) DEFAULT NULL,
  `parent_lastname` varchar(250) DEFAULT NULL,
  `parent_residence` varchar(250) DEFAULT NULL,
  `child_firstname` varchar(250) DEFAULT NULL,
  `child_lastname` varchar(250) DEFAULT NULL,
  `child_school` varchar(250) DEFAULT NULL,
  `student_id` varchar(250) DEFAULT NULL,
  `student_status` varchar(120) DEFAULT NULL,
  `account_status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `profile_image`, `email_verified_at`, `password`, `remember_token`, `parent_firstname`, `parent_lastname`, `parent_residence`, `child_firstname`, `child_lastname`, `child_school`, `student_id`, `student_status`, `account_status`, `created_at`, `updated_at`) VALUES
(1, 'Admin Branch', 'admin@gmail.com', 'admin', '1685366468-1_KXFKoAm8mm5iG2eZZ3pikw (1).webp.webp', NULL, '$2y$10$zIqfRmfr./xG7ECilaBzhuf2j73lcIk2O1.m2W0uBdcvWNDr/JY0y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-23 07:00:00', '2023-05-23 19:33:37'),
(2, 'musa', 'musaosuman6@gmail.com', 'parent', NULL, NULL, '$2y$10$J3KT8wvhL95E/JSZb9ALDOqaKtBrqMAfzn/Ys4r7JUfyNVhUJ2oqK', NULL, 'Musa', 'Osuman', 'er', 'moe', 'dc', 'dfz', 'S0001', 'enrolled', 'active', '2023-05-23 07:00:00', '2023-05-23 19:45:58'),
(3, 'moe', 'mole@gmail.com', 'user', NULL, NULL, '$2y$10$RvS/jcihI3shVrCb4lu.Ae9AxzXC0AhWq17HtqAS1KVyTtmanfw5O', NULL, 'Musa', 'Osuman', 'er', 'moe', 'dc', 'dfz', 'S0001', 'enrolled', 'active', '2023-05-23 07:00:00', '2023-05-23 19:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `userscore`
--

CREATE TABLE `userscore` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `s_category_id` int(11) NOT NULL,
  `user_score` varchar(150) NOT NULL,
  `q_total` varchar(250) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_record`
--

CREATE TABLE `user_record` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pronounciation_id` int(11) NOT NULL,
  `user_voice` varchar(250) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `flashcards`
--
ALTER TABLE `flashcards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category_id`),
  ADD KEY `category_id` (`category_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pronounciation`
--
ALTER TABLE `pronounciation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flashcard_id` (`flashcard_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `userquestions`
--
ALTER TABLE `userquestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `userscore`
--
ALTER TABLE `userscore`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `s_category_id` (`s_category_id`);

--
-- Indexes for table `user_record`
--
ALTER TABLE `user_record`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flashcards`
--
ALTER TABLE `flashcards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pronounciation`
--
ALTER TABLE `pronounciation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userquestions`
--
ALTER TABLE `userquestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userscore`
--
ALTER TABLE `userscore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_record`
--
ALTER TABLE `user_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flashcards`
--
ALTER TABLE `flashcards`
  ADD CONSTRAINT `flashcards_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `pronounciation`
--
ALTER TABLE `pronounciation`
  ADD CONSTRAINT `pronounciation_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `pronounciation_ibfk_2` FOREIGN KEY (`flashcard_id`) REFERENCES `flashcards` (`id`);

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
