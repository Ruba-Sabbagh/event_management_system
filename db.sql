-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Mar 09, 2024 at 01:00 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `svudb`
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
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `created_at`, `updated_at`, `group_name`) VALUES
(1, NULL, NULL, 'MG'),
(2, NULL, NULL, 'IT'),
(3, NULL, NULL, 'EA'),
(4, NULL, NULL, 'FA'),
(5, NULL, NULL, 'Delivary'),
(6, NULL, NULL, 'AA'),
(7, NULL, NULL, 'Tutor'),
(8, NULL, NULL, 'Telecenter'),
(9, NULL, NULL, 'Banks');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_27_071229_create_Programs_table', 2),
(9, '2014_10_12_100000_create_password_resets_table', 3),
(11, '2024_02_29_074545_groups', 5),
(12, '2024_02_29_155810_add_paid_to_users', 6),
(13, '2024_01_27_071229_create_Specialisations_table', 7),
(14, '2024_01_27_071229_create_Student_Program_table', 7),
(15, '2024_01_27_071229_create_Students_table', 7),
(16, '2024_01_27_071229_create_Terms_table', 7),
(17, '2024_01_27_071239_create_foreign_keys', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('rubasabbagh24@gmail.com', '$2y$12$joetyAg1Qf/2/wjIXQTH6OLLarIHXdvCQInnR0n8PPiRs63WvzbSu', '2024-02-01 04:50:11');

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
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `program_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_name_ar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specialisations`
--

CREATE TABLE `specialisations` (
  `specialisation_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `specialisation_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialisation_name_ar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialisation_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_id` int(11) UNSIGNED NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_fname_ar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_tname_ar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_lname_ar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_fname_en` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_tname_en` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_lname_en` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `studentsidn` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_program`
--

CREATE TABLE `student_program` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `program_id` int(11) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `term_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `term_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name_eng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name_eng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name_eng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name_eng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'male',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mbl` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `last_login` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` int(11) UNSIGNED NOT NULL,
  `last_pass_modified` int(11) DEFAULT NULL,
  `trusted` tinyint(1) DEFAULT NULL,
  `coordinator` int(11) DEFAULT NULL,
  `super_admin` tinyint(1) DEFAULT NULL,
  `nfc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pass_crypt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `archive_sys_role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_level` tinyint(1) DEFAULT NULL,
  `course_bank` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `archive_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sid_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `first_name_eng`, `father_name_eng`, `last_name_eng`, `full_name_eng`, `first_name_ar`, `father_name_ar`, `last_name_ar`, `full_name_ar`, `gender`, `address`, `phone`, `mbl`, `status`, `last_login`, `group_id`, `last_pass_modified`, `trusted`, `coordinator`, `super_admin`, `nfc`, `pass_crypt`, `archive_sys_role`, `auth_level`, `course_bank`, `create_date`, `archive_file`, `sid`, `photo`, `sid_photo`, `personal_email`) VALUES
(1, 'SVU', 'svu@svuonline.org', NULL, '$2y$12$Fyj/oQiiaJ1/Vvs2uq8R0uhw5oWvzO36jb9zs4UAL3wNXrzMhD88S', NULL, '2024-01-25 06:29:58', '2024-01-29 02:10:33', 'svu', 'svu', '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, '', 'active', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, ''),
(2, 'ralsabbagh', 'ralsabbagh@svuonline.org', NULL, '$2y$12$653bGOfyaj8xeSkmosLuGOhaKbS8lnTngh1ZrAZFoi41iSC7gQEre', 'EEk9f4yPG87soaql8fgY1msUL7iBcvrW02ouoN6COQumgMVtJ9HlHLenl6RD', NULL, '2024-03-05 03:11:28', 'Ruba', 'Bassam', 'AL Sabbagh', NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, '0944426818', 'active', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01010010891', NULL, NULL, 'rubasabbagh24@gmail.com'),
(3, 'sgojel', 'sgojel@svuonline.org', NULL, '$2y$12$kUVnXKLHy67YdgAg5aoODeLvS0lnHZ3PCoE4StgCm3nynidmacbye', NULL, NULL, NULL, 'Saya', 'Sami', 'Gojel', NULL, NULL, NULL, NULL, NULL, 'female', NULL, NULL, '0944426818', 'active', NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01010010891', NULL, NULL, 'rubasabbagh24@gmail.com'),
(4, 'aalmadani', 'aalmadani@svuonline.org', NULL, '$2y$12$T9Du2HKnK6cT7peTjIq4POMaT9e0ViEm.p1bSrnkNPYnuqK2nm8z2', NULL, '2024-03-03 15:30:18', '2024-03-03 15:30:18', 'ahmad', 'Mhd', 'Al Madani', 'ahmad Mhd Al Madani', NULL, NULL, NULL, NULL, 'male', NULL, NULL, '544543514', 'active', NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5', NULL, NULL, 'ahmad@gmail.com'),
(5, 'lalmadani', 'lalmadani@svuonline.org', '2024-03-04 01:56:16', '$2y$12$ip/oopuHApthm8EyPnKBCu68GXW068yEKSRYOG1YJvY0HdwmPkATO', NULL, '2024-03-04 01:26:05', '2024-03-04 01:56:16', 'lya', 'ahmad', 'almadani', 'lya ahmad almadani', NULL, NULL, NULL, NULL, 'female', NULL, NULL, '5546', 'active', NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '58', NULL, NULL, 'lya@gmail.com');

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
-- Indexes for table `groups`
--
ALTER TABLE `groups`
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
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `specialisations`
--
ALTER TABLE `specialisations`
  ADD PRIMARY KEY (`specialisation_id`),
  ADD KEY `specialisations_program_id_foreign` (`program_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `students_term_id_foreign` (`term_id`);

--
-- Indexes for table `student_program`
--
ALTER TABLE `student_program`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_program_program_id_foreign` (`program_id`),
  ADD KEY `student_program_student_id_foreign` (`student_id`),
  ADD KEY `student_program_term_id_foreign` (`term_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_group_id_foreign` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `specialisations`
--
ALTER TABLE `specialisations`
  MODIFY `specialisation_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_program`
--
ALTER TABLE `student_program`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `term_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `specialisations`
--
ALTER TABLE `specialisations`
  ADD CONSTRAINT `specialisations_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`program_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_term_id_foreign` FOREIGN KEY (`term_id`) REFERENCES `terms` (`term_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `student_program`
--
ALTER TABLE `student_program`
  ADD CONSTRAINT `student_program_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`program_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_program_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_program_term_id_foreign` FOREIGN KEY (`term_id`) REFERENCES `terms` (`term_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
