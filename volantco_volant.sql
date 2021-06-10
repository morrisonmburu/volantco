-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2020 at 07:37 PM
-- Server version: 5.7.29-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `volantco_volant`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_types`
--

CREATE TABLE `account_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_types`
--

INSERT INTO `account_types` (`id`, `name`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 'Individual', '2020-05-18 21:23:13', NULL, NULL),
(2, 'Business', '2020-05-18 21:23:13', NULL, NULL),
(3, 'Corporate', '2020-05-27 10:27:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'morris', 'morrisonmburu7@gmail.com', NULL, '$2y$10$gCzCrLGws4WH5UHLKuKCUOunepuN7zmJ6QZ7HFaoSVON4ix/lx7Q.', NULL, '2020-05-25 17:20:54', '2020-05-25 17:20:54'),
(2, 'Kevine', 'kevinejames44@gmail.com', NULL, '$2y$10$DAqD0dtH08VkyQJZG6Jn1OcRa6EQLD9vtoqNjzGWpYTkr6gXDyJfq', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Metro Deliveries', NULL, NULL),
(2, 'Cargo & Freight', NULL, NULL),
(3, 'Packaging & Moves', NULL, NULL),
(4, 'Construction Logistics', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `couriers`
--

CREATE TABLE `couriers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `licenseNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `vehicle_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `vehicle_model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `vehicle_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `vehicle_platenumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `production_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `boardNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `number_of_passangers` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `status` int(11) NOT NULL DEFAULT '0',
  `driver_avatar` text COLLATE utf8mb4_unicode_ci,
  `vehicle_avatar` text COLLATE utf8mb4_unicode_ci,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_online` int(11) DEFAULT '0',
  `is_special` int(11) DEFAULT '0',
  `category` int(11) NOT NULL DEFAULT '1',
  `associate_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` text COLLATE utf8mb4_unicode_ci,
  `longitude` float DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `on_the_move` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `couriers`
--

INSERT INTO `couriers` (`id`, `Name`, `phoneNo`, `email`, `licenseNo`, `vehicle_type`, `vehicle_model`, `vehicle_color`, `vehicle_platenumber`, `production_year`, `boardNo`, `number_of_passangers`, `status`, `driver_avatar`, `vehicle_avatar`, `token`, `password`, `is_online`, `is_special`, `category`, `associate_type`, `api_token`, `longitude`, `latitude`, `on_the_move`, `created_at`, `updated_at`) VALUES
(1, 'morrisonmburu', '0703640124', 'morrisonmburu7@gmail.com', '10001', 'VNumber', 'vModel', 'vColor', 'plate_number', '2020', '2222', 'N/A', 1, 'N/A', 'N/A', 'DZeesHbNLNCiIBKmzYcYz96F8lOfH0gMs62vEClu', '$2y$10$iVpAQV9EGsvnTGI8YTuRHe/7SX6tFOi0HYRFsZXs8zjqyUoFhoOei', 1, 0, 0, 'Van', 'cJofO-lVS3Khtg9rPpA9lv:APA91bHqYu2Zw8sxkytQY0IK1iOdJKKpNf1qItN6G9_X4YsfZu1M8xbrWPdfC3j_ENXlAoJWc_GS3x4MbVs7qy_QWFDXhP2vD7UCCdFd1Ard50foh2JghctN0ff1U5t-RhYbeaWUrxvN', 36.0203, 12.2387, 1, '2020-05-29 05:52:25', '2020-06-11 09:04:53'),
(3, 'Fixoothina', '+254713671888', 'fixoothina@gmail.com', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 1, 'N/A', 'N/A', 'Ug1f6Uag7EixOTjmls0u7ISipHsoNaGlDzSNvUov', '$2y$10$2Vs8YXh6yYf6O9kw7muMc.x7LNp8x1QPOTsqDUiQ8eI2Rwd98q6g.', 0, 0, 1, 'Pickup', NULL, NULL, NULL, 0, '2020-06-03 06:57:54', '2020-06-05 04:28:25'),
(7, 'Lepheme Lepheme', '+254703640124', 'lephemesolution@gmail.com', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 0, 'N/A', 'N/A', 'vWSzuFkfj1IX7SNyyt9TDiCpwxwGzP1WYKMaHjsN', '$2y$10$q922fRkyDWymyVs7sP2lGOS3FwGfij9Q./9sXjHh3ATctegAyJIM6', 0, 0, 1, 'Express Bike', NULL, NULL, NULL, 0, '2020-06-04 05:14:10', '2020-06-05 04:28:57'),
(8, 'Job Oyagi', '+254711675217', 'oyagijob8@gmail.com', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 1, 'N/A', 'N/A', 'EdL4bE0ujXPOiWQst9ICAbOTzhoHBqLUJzDzPPTB', '$2y$10$tU6xRrnXI4c1AW4SOZs2k.j3snAN0TBxUWJnaeWbFDSOo7TiX0Qqe', 0, 0, 1, 'Express Bike', 'fNcStfeHT2KRiDDRJxxvup:APA91bGuXwiXU1hS_5DpAteplR8XSmYuzyOUHhTUjw7rRQghfMulBFM1YlcKVp3jBQmFFg4P6kkMaTNYZ3PQzRJMyaqmPQC22GP73Q2NdhXXpLFVgAx-o4QI1cIufGpI8fBYkFLGbCYG', NULL, NULL, 0, '2020-06-04 05:22:14', '2020-06-08 12:13:41'),
(10, 'Mandela Joshua', '+254701666745', 'mandelajoshua29@gmail.com', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 1, 'N/A', 'N/A', 'mGLbbM7UA8hrBxglZfcuQerDu6lLcPJfoH36UyzV', '$2y$10$HaRf/Pf671VVIrKDSnTpCOJZk0N3MsfNRfKUm963yyXxZAbIfltWO', 1, 0, 1, 'Express Bike', 'd4yorCZ1TLeruVNrYWPtBw:APA91bHWRjlOzUFAGKyvMECYW2fXYTEWUe4pn34etHt8JHmCc0ELRxUtPoy22-rg0o227N6moRmYhwkDFj_AOI_qTBzC-TlpnWxPU7F7CN0xbRs_LMDTUVQ5BKDKvRuO0hEc58JwgD2y', NULL, NULL, 0, '2020-06-04 06:03:51', '2020-06-05 04:29:38'),
(11, 'Volant Testing', '+254703640124', 'volanttesting@gmail.com', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 0, 'N/A', 'N/A', 'Z5SWCwk55I2wuoMnQBt7BAnrIAyeyOsqbZRC4cry', '$2y$10$N2Hi7645YNxBIqUL6HR70uQR4ktzWuIw27aClErdpm3VEdqbl2Vw.', 0, 0, 1, '3-Tonne Truck', NULL, NULL, NULL, 0, '2020-06-04 06:12:44', '2020-06-05 04:29:53'),
(12, 'Migot Victor', '+254723393151', 'migotvictor26@gmail.com', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 1, 'N/A', 'N/A', 'BcNmKqCmbo7kVIPB3rYHPTyy5gl6DSXpdbexitfV', '$2y$10$W0qH9AacCsJlCGogK6iiouib5xMTk8TcVMrZwatPUOKxkqKg9.hqO', 1, 0, 1, 'Messager', 'c5NVrMifTiGVba5QNsD9o2:APA91bG6K66VE8EB9GWOiKSRVOVeUISevcl_pst9Sa6fkbmE20WKrOajlCWjKpJk6vpuf1pqAsi_n8SH7fhG6Il3qYD3edbBesjLN2CMQS0_jM0f4zE2vzTOxGgUnWwSP4UVcmZ-QRPr', NULL, NULL, 0, '2020-06-04 07:31:55', '2020-06-05 05:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `dispatches`
--

CREATE TABLE `dispatches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dispatchno` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderNo` int(11) NOT NULL,
  `driverNo` int(11) NOT NULL,
  `customerName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DriverName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DriverPhone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plateNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dispatches`
--

INSERT INTO `dispatches` (`id`, `dispatchno`, `orderNo`, `driverNo`, `customerName`, `DriverName`, `DriverPhone`, `plateNumber`, `from`, `to`, `package`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'b66a9b22-25a7-447a-ae6f-382c8b92f800', 3, 1, 'morris mburu', 'N/A', '+254703640124', 'N/A', 'Hashmi BarbequeDiamond Plaza Parklands Nairobi', 'We HotelLower Kabete Rd Spring Valley Nairobi', 'Motor Cycle', 'ksh348', 1, '2020-05-29 06:40:33', '2020-06-11 15:39:08'),
(2, 'ca889a8f-2724-4391-95f9-8b13e4c7b24d', 2, 1, 'morris mburu', 'N/A', '+254703640124', 'N/A', 'NairobiNairobi Nairobi County KE', 'KampalaKampala Kampala Central Region', '28-Tonne Truck', 'ksh105836', 4, '2020-05-29 06:42:23', '2020-06-11 15:20:38'),
(3, '3d6509d5-6e08-48a3-be34-b5c1b5c1100a', 4, 1, 'morris mburu', 'N/A', '+254703640124', 'N/A', 'Limuru RoadLimuru Rd Muthaiga Nairobi', 'Waridi SchoolPlot No.20 Sports Rd Muthangari', 'Van', 'ksh1000', 5, '2020-05-29 08:37:24', '2020-06-02 12:15:23'),
(4, '0b05fbe1-2d5a-4026-8ba9-a0b4fc2223d9', 5, 1, 'morris mburu', 'N/A', '+254703640124', 'N/A', 'NairobiNairobi Nairobi County KE', 'KigaliKigali Nyarugenge Kigali City', '28-Tonne Truck', 'ksh161793', 4, '2020-05-29 08:37:35', '2020-06-01 16:21:17'),
(5, 'd75a9e49-b110-4854-b731-599cf608976c', 8, 2, 'Job Oyagi', 'N/A', '+254711675217', 'N/A', 'MwimutoGetathuru Kitisuru Nairobi City', 'Two Rivers MallKE Kitisuru Nairobi', 'Express Bike', 'ksh348', 5, '2020-05-31 04:03:50', '2020-05-31 04:03:50'),
(6, '62202ee8-b701-45aa-91b0-fbd6e91f4ca7', 16, 2, 'Job Oyagi', 'N/A', '+254711675217', 'N/A', 'Lower KabeteLower Kabete Nairobi Nairobi County', 'PipelineKE Embakasi Nairobi', 'Pickup', 'ksh10000', 5, '2020-05-31 16:48:55', '2020-05-31 16:48:55'),
(7, '247261bb-e174-4a01-8615-cf94c4c24fcd', 17, 1, 'Ubein', 'morrisonmburu', '0703640124', 'KCH 100B', 'Kisii', 'Likoni', '14-Tonne Truck', 'ksh87307', 5, '2020-06-02 04:59:14', '2020-06-02 12:43:57'),
(8, 'ecc05fd1-d04d-4b45-92c6-9c19e701548c', 13, 1, 'Job Oyagi', 'morrisonmburu', '0703640124', 'KCH 100B', 'Kibichiku Primary School', 'Nairobi CBD', '411', 'Express Bike', 5, '2020-06-02 13:35:51', '2020-06-03 13:03:59'),
(9, '23b7f111-ad94-40e3-bb0c-97d6d6abf6f6', 15, 1, 'Job Oyagi', 'morrisonmburu', '0703640124', 'KCH 100B', 'Kibichiku Primary School', 'Nairobi CBD', '411', 'Express Bike', 5, '2020-06-02 14:58:41', '2020-06-03 09:10:58'),
(10, 'c301278e-74c4-4cd7-b3c8-292d9b7a35f1', 18, 1, 'morris mburu', 'morrisonmburu', '0703640124', 'KCH 100B', 'NairobiNairobi Nairobi County KE', 'MombasaMombasa Mombasa County KE', '44839', '3-Tonne Truck', 5, '2020-06-02 15:05:28', '2020-06-03 09:11:08'),
(11, '887fa312-a9f1-4b64-ba73-195511f028d7', 23, 1, 'morris mburu', 'morrisonmburu', '0703640124', 'KCH 100B', 'NairobiNairobi Nairobi County KE', 'MombasaMombasa Mombasa County KE', '67319', '14-Tonne Truck', 5, '2020-06-02 15:31:45', '2020-06-03 09:21:50'),
(12, '2482d78c-eb61-49bc-a45f-51359a23d260', 24, 1, 'morris mburu', 'morrisonmburu', '0703640124', 'KCH 100B', 'NairobiNairobi Nairobi County KE', 'KisumuKisumu Kisumu County KE', '71113', '28-Tonne Truck', 5, '2020-06-02 15:33:47', '2020-06-03 13:04:19'),
(13, 'b2495fcc-b6cb-4f6e-a60f-7b25c95b39c2', 21, 1, 'Kevine James', 'morrisonmburu', '0703640124', 'KCH 100B', 'Mombasa', 'Kisumu', '82565', '10-Tonne Truck', 5, '2020-06-02 15:35:14', '2020-06-03 09:11:11'),
(14, 'd963896f-821d-4921-b279-bab175ed795e', 25, 1, 'morris mburu', 'morrisonmburu', '0703640124', 'KCH 100B', 'NairobiNairobi Nairobi County KE', 'NyeriNyeri Nyeri County KE', '35399', '14-Tonne Truck', 5, '2020-06-02 16:36:40', '2020-06-02 16:36:40'),
(27, 'd4fe3a13-8741-4cc9-8017-3f2ff85b6281', 31, 1, 'morris mburu', 'morrisonmburu', '0703640124', 'plate_number', 'Nairobi', 'Limuru Town.', '5579', '3-Tonne Truck', 5, '2020-06-03 08:52:23', '2020-06-03 16:23:58'),
(28, '884dceb1-84e7-445b-aa6e-4bc5c016aa68', 26, 1, 'morris mburu', 'morrisonmburu', '0703640124', 'plate_number', 'NairobiNairobi Nairobi County KE', 'KisumuKisumu Kisumu County KE', '71113', '28-Tonne Truck', 5, '2020-06-03 08:53:53', '2020-06-03 08:54:13'),
(29, '9efeff77-e892-4fbd-b4fa-2068d5b2001c', 33, 1, 'morris mburu', 'morrisonmburu', '0703640124', 'plate_number', 'Limuru Town.', 'Nairobi', '3264', 'Pickup', 5, '2020-06-03 13:06:04', '2020-06-03 16:50:50'),
(30, '71906b77-bef5-47ff-9edb-2e2b712aabd3', 32, 1, 'morris mburu', 'morrisonmburu', '0703640124', 'plate_number', 'NairobiNairobi Nairobi County KE', 'MombasaMombasa Mombasa County KE', '52349', '10-Tonne Truck', 5, '2020-06-03 13:08:11', '2020-06-03 16:40:52'),
(32, 'e5dd64e8-be48-47d6-8383-22b5be39455a', 27, 8, 'morris mburu', 'N/A', '+254711675217', 'N/A', 'Limuru Town.Limuru Town. Kiambu County KE', 'Mutarakwa Limuru RoadMutarakwa Limuru Rd Kiambu County KE', '348', 'Express Bike', 4, '2020-06-04 05:33:49', '2020-06-04 08:34:55'),
(33, 'f66a3932-f850-4d5e-b3c6-f9d7dd9442ef', 38, 8, 'Job Oyagi', 'N/A', '+254711675217', 'N/A', 'Prosperity House', 'Ngong Hills', '732', 'Express Bike', 4, '2020-06-04 06:16:35', '2020-06-04 09:17:59'),
(34, '926e12a5-4dd0-49d8-ad87-a540712bed22', 40, 10, 'Olang Kevine', 'N/A', '+254701666745', 'N/A', 'Ruiru', 'Mombasa', '26708', 'Pickup', 4, '2020-06-04 06:33:35', '2020-06-04 09:54:09'),
(35, '225e2c2d-345e-4c97-9df1-a4d7ff11a0b9', 39, 8, 'morris mburu', 'N/A', '+254711675217', 'N/A', 'NairobiNairobi Nairobi County KE', 'LimuruLimuru Kiambu County KE', '25793', '14-Tonne Truck', 4, '2020-06-04 07:51:14', '2020-06-04 10:56:21'),
(36, '0a1d8cf1-132b-4a16-9485-7157cde66c58', 41, 10, 'morris mburu', 'N/A', '+254701666745', 'N/A', 'NairobiNairobi Nairobi County KE', 'KampalaKampala Kampala Central Region', '52001', '5-Tonne Truck', 0, '2020-06-04 07:56:22', '2020-06-04 07:56:22'),
(37, 'cc670ad1-2da2-459f-8870-a27b09662584', 42, 8, 'Olang Kevine', 'N/A', '+254711675217', 'N/A', 'Kisumu', 'Mombasa', '45338', '3-Tonne Truck', 4, '2020-06-04 08:04:27', '2020-06-04 11:08:29'),
(38, '1dbc19e2-2774-47bb-989b-f8b2eb4d91cb', 44, 10, 'morris mburu', 'Mandela Joshua', '+254701666745', 'N/A', 'LimuruLimuru Kiambu County KE', 'Ngenia High SchoolKE Kiambu County', '348', 'Express Bike', 0, '2020-06-05 04:31:22', '2020-06-05 04:31:22'),
(39, '89d78220-b8b8-49c5-b54a-e37e3a93276d', 47, 12, 'Victor', 'Migot Victor', '+254723393151', 'N/A', 'Engen Thika', 'Kisumu Airport', '3819', 'Messager', 4, '2020-06-05 05:06:15', '2020-06-05 08:08:47'),
(40, 'a6c8397a-c09d-4f44-9113-766a924ef3bd', 46, 10, 'morris mburu', 'Mandela Joshua', '+254701666745', 'N/A', 'Prosperity HouseProsperity House Nairobi Nairobi County', 'Koja StageNairobi Central Nairobi City Nairobi County', '348', 'Express Bike', 0, '2020-06-05 05:07:27', '2020-06-05 05:07:27'),
(41, '6ae4af7b-f421-4457-be76-7f4eb17a7386', 48, 12, 'Victor', 'Migot Victor', '+254723393151', 'N/A', 'Homa Bay', 'Mombasa', '8578', 'Messager', 5, '2020-06-05 05:07:55', '2020-06-05 08:08:34'),
(42, 'a1be5a69-1a61-4bfc-87a2-f0a7e7725880', 50, 8, 'Job Oyagi', 'Job Oyagi', '+254711675217', 'N/A', 'Juja', 'Nairobi', '959', 'Express Bike', 4, '2020-06-05 05:13:34', '2020-06-05 08:17:23'),
(43, 'be75c036-757d-4c2b-9298-7972115e9dd6', 53, 10, 'Job Oyagi', 'Mandela Joshua', '+254701666745', 'N/A', 'Chri Micash Apartments KibichikuOff Getathuru Rd Kiambu County', 'Nairobi CBDBiashara St Nairobi Central Nairobi', '348', 'Express Bike', 0, '2020-06-05 06:44:39', '2020-06-05 06:44:39'),
(44, 'cf53b3ea-d938-4dea-8293-2e2075ff9c85', 52, 8, 'Job Oyagi', 'Job Oyagi', '+254711675217', 'N/A', 'Mwimuto Church Of God', 'Nairobi CBD', '430', 'Express Bike', 4, '2020-06-05 06:45:37', '2020-06-05 09:47:46'),
(45, '21426204-a5f7-466f-9c42-b2eda2f2e169', 51, 8, 'Job Oyagi', 'Job Oyagi', '+254711675217', 'N/A', 'Mwimuto Church Of God', 'Nairobi CBD', '430', 'Express Bike', 4, '2020-06-05 06:48:29', '2020-06-05 10:10:21'),
(46, '011d0798-6ebf-4eea-b71a-d0becc8d37a8', 57, 10, 'morris mburu', 'Mandela Joshua', '+254701666745', 'N/A', 'Mutarakwa Limuru RoadMutarakwa Limuru Rd Kiambu County KE', 'Ngenia High SchoolKE Kiambu County', '348', 'Express Bike', 0, '2020-06-06 17:28:55', '2020-06-06 17:28:55'),
(47, '832cf15a-254d-4d22-92aa-2f21894f8b02', 54, 10, 'Job Oyagi', 'Mandela Joshua', '+254701666745', 'N/A', 'Westlands', 'Mlolongo', '660', 'Express Bike', 0, '2020-06-07 04:05:04', '2020-06-07 04:05:04'),
(48, '004dc2ad-6ca3-4843-9971-055b39ceb7c5', 58, 8, 'VICTOR', 'Job Oyagi', '+254711675217', 'N/A', 'Westlands Primary School', 'Mlolongo Police Station', '711', 'Express Bike', 4, '2020-06-07 12:51:20', '2020-06-08 05:36:01'),
(49, 'bd347a99-ca28-413b-afb0-807b99941bc5', 59, 1, 'VICTOR', 'morrisonmburu', '0703640124', 'plate_number', 'Westlands Primary School', 'Mlolongo Police Station', '2658', 'Van', 3, '2020-06-07 13:00:06', '2020-06-11 16:02:57'),
(50, '9e70bb9b-31a2-4b44-ae93-e0fce4a84a0a', 63, 10, 'Job Oyagi', 'Mandela Joshua', '+254701666745', 'N/A', 'Chri Micash Gardens Apartments', 'Nairobi CBD', '453', 'Express Bike', 0, '2020-06-10 13:52:59', '2020-06-10 13:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `extra_moves`
--

CREATE TABLE `extra_moves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `house_type_id` int(11) NOT NULL,
  `rooms_count` int(11) NOT NULL,
  `type_of_rooms` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pcp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_services` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extra_moves`
--

INSERT INTO `extra_moves` (`id`, `order_id`, `house_type_id`, `rooms_count`, `type_of_rooms`, `pcp`, `other_services`, `created_at`, `updated_at`) VALUES
(1, 16, 1, 1, 'Bedsitter', '[\"Padding\",\"Packing\",\"Crafting\"]', '[\"Dstv Installation & Zuku Satellite\",\"Basic House Keeping\",\"Labelling\",\"Mounting TVs\\/Wall Hanging\",\"Mounting\",\"Furniture Protection\"]', '2020-05-31 16:34:54', '2020-05-31 16:34:54'),
(2, 62, 1, 1, 'Bedsitter', '[\"Padding\",\"Packing\",\"Crafting\"]', '[\"Dstv Installation & Zuku Satellite\",\"Mounting TVs\\/Wall Hanging\",\"Labelling\",\"Basic House Keeping\",\"Mounting\",\"Furniture Protection\"]', '2020-06-10 13:26:02', '2020-06-10 13:26:02');

-- --------------------------------------------------------

--
-- Table structure for table `freight_orders`
--

CREATE TABLE `freight_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mark` int(11) DEFAULT NULL,
  `cancel` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `truck_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stopoverlocation` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `freight_orders`
--

INSERT INTO `freight_orders` (`id`, `to`, `from`, `package`, `price`, `time`, `payment_type`, `mark`, `cancel`, `email`, `phone`, `user_id`, `truck_category`, `stopoverlocation`) VALUES
(1, 'Yaya CentreArgwings Kodhek Rd Kilimani Nairobi', 'Kenyatta National HospitalHospital Rd Kenyatta Hospital Nairobi', '5 Tonn Truck', 'KES 2000', '2020-04-20T15:00:00.000Z', 'mpesa', 1, 0, 'morrisonmburu7@gmail.com', '0703 640124', 1, 'Low Sided', '[\"-1.2935706 ,36.7960926 ,Nairobi Women\'s HospitalNairobi Kilimani Nairobi County\"]'),
(2, 'Kenyatta National HospitalHospital Rd Kenyatta Hospital Nairobi', 'Yaya CentreArgwings Kodhek Rd Kilimani Nairobi', '5 Tonn Truck', 'KES 2000', '2020-04-20T15:00:00.000Z', 'mpesa', 0, 0, 'morrisonmburu7@gmail.com', '0703 640124', 1, 'Low Sided', '[\"-1.2935706 ,36.7960926 ,Nairobi Women\'s HospitalNairobi Kilimani Nairobi County\"]'),
(3, 'Yaya CentreArgwings Kodhek Rd Kilimani Nairobi', 'Kenyatta National HospitalHospital Rd Kenyatta Hospital Nairobi', '5 Tonn Truck', 'KES 2000', '2020-04-20T15:00:00.000Z', 'mpesa', 1, 0, 'morrisonmburu7@gmail.com', '0703 640124', 1, 'High sided', '[\"-1.2935706 ,36.7960926 ,Nairobi Women\'s HospitalNairobi Kilimani Nairobi County\"]'),
(4, 'nairobi', 'kigali', 'truck', 'KES 500', '2020-04-28T14:00:00.000Z', 'mpesa', 0, 0, 'morrisonmburu7@gmail.com', '0703640124', 1, 'Low Sided', '[\"-1.2935706 ,36.7960926 ,Nairobi Women\'s HospitalNairobi Kilimani Nairobi County\",\"-1.294758 ,36.8066068 ,Java House - Upper Hill Medical CentreEagle Wings Medical Center Kilimani Nairobi\"]');

-- --------------------------------------------------------

--
-- Table structure for table `house_type`
--

CREATE TABLE `house_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `least_room_counts` int(11) NOT NULL DEFAULT '0',
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `house_type`
--

INSERT INTO `house_type` (`id`, `title`, `least_room_counts`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Bedsitter', 1, 2000.00, '2020-05-20 03:44:15', '2020-05-20 03:44:15'),
(2, 'Studio Apartment', 1, 2000.00, '2020-05-20 03:57:20', '2020-05-20 03:57:20'),
(3, 'One Bedroom House', 2, 0.00, '2020-05-20 03:57:47', '2020-05-20 03:57:47'),
(4, 'Two Bedroom House', 3, 0.00, '2020-05-20 03:58:17', '2020-05-20 03:58:17'),
(5, 'Three Bedroom House', 4, 0.00, '2020-05-20 03:58:45', '2020-05-20 03:58:45'),
(6, 'Four or More Bedroom House', 5, 0.00, '2020-05-20 03:59:47', '2020-05-20 03:59:47');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` double(10,6) NOT NULL DEFAULT '0.000000',
  `longitude` double(10,6) NOT NULL DEFAULT '0.000000',
  `order_id` int(11) NOT NULL,
  `is_stopover` int(11) NOT NULL DEFAULT '0',
  `is_destination` int(11) NOT NULL DEFAULT '-1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location_id`, `name`, `address`, `latitude`, `longitude`, `order_id`, `is_stopover`, `is_destination`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ChIJp0lN2HIRLxgRTJKXslQCz_c', 'NairobiNairobi Nairobi County KE', 'NairobiNairobi Nairobi County KE', -1.292066, 36.821946, 1, 0, 0, '2020-05-29 06:32:41', '2020-05-29 06:32:41', NULL),
(2, 'ChIJfSzAjucSQBgRWtvQNbyLYcs', 'MombasaMombasa Mombasa County KE', 'MombasaMombasa Mombasa County KE', -4.043477, 39.668206, 1, 0, 1, '2020-05-29 06:32:41', '2020-05-29 06:32:41', NULL),
(3, 'ChIJp0lN2HIRLxgRTJKXslQCz_c', 'NairobiNairobi Nairobi County KE', 'NairobiNairobi Nairobi County KE', -1.292066, 36.821946, 2, 0, 0, '2020-05-29 06:34:46', '2020-05-29 06:34:46', NULL),
(4, 'ChIJm7N0nQ-8fRcR7G9r2T2QOEU', 'KampalaKampala Kampala Central Region', 'KampalaKampala Kampala Central Region', 0.347596, 32.582520, 2, 0, 1, '2020-05-29 06:34:46', '2020-05-29 06:34:46', NULL),
(5, 'ChIJHchKrTekKhgR0o0k1jmkEiA', 'KisumuKisumu Kisumu County KE', 'KisumuKisumu Kisumu County KE', -0.091702, 34.767957, 2, 1, 0, '2020-05-29 06:34:46', '2020-05-29 06:34:46', NULL),
(6, 'ChIJ-TR4COQXKhgRNAaFOMwBj5o', 'MoloMolo Nakuru County KE', 'MoloMolo Nakuru County KE', -0.248836, 35.732371, 2, 1, 0, '2020-05-29 06:34:46', '2020-05-29 06:34:46', NULL),
(7, 'ChIJBwlkGBMXLxgRaNj3KIpFAgo', 'Hashmi BarbequeDiamond Plaza Parklands Nairobi', 'Hashmi BarbequeDiamond Plaza Parklands Nairobi', -1.258295, 36.819101, 3, 0, 0, '2020-05-29 06:35:41', '2020-05-29 06:35:41', NULL),
(8, 'ChIJwbSd6W0XLxgRjfds_DxKhp4', 'We HotelLower Kabete Rd Spring Valley Nairobi', 'We HotelLower Kabete Rd Spring Valley Nairobi', -1.257567, 36.799089, 3, 0, 1, '2020-05-29 06:35:41', '2020-05-29 06:35:41', NULL),
(9, 'EhlMaW11cnUgUmQsIE5haXJvYmksIEtlbnlhIi4qLAoUChIJF21Ow1MiLxgRIo5mC87Noh0SFAoSCX-EMgzlFi8YEVj-dw06M6lz', 'Limuru RoadLimuru Rd Muthaiga Nairobi', 'Limuru RoadLimuru Rd Muthaiga Nairobi', -1.254436, 36.823102, 4, 0, 0, '2020-05-29 08:34:59', '2020-05-29 08:34:59', NULL),
(10, 'ChIJg9L9EWoXLxgRok0dVHCYUsg', 'Waridi SchoolPlot No.20 Sports Rd Muthangari', 'Waridi SchoolPlot No.20 Sports Rd Muthangari', -1.264218, 36.799164, 4, 0, 1, '2020-05-29 08:34:59', '2020-05-29 08:34:59', NULL),
(11, 'ChIJp0lN2HIRLxgRTJKXslQCz_c', 'NairobiNairobi Nairobi County KE', 'NairobiNairobi Nairobi County KE', -1.292066, 36.821946, 5, 0, 0, '2020-05-29 08:36:27', '2020-05-29 08:36:27', NULL),
(12, 'ChIJl-fYjiWk3BkRyAsdQaU2K_M', 'KigaliKigali Nyarugenge Kigali City', 'KigaliKigali Nyarugenge Kigali City', -1.944073, 30.061885, 5, 0, 1, '2020-05-29 08:36:27', '2020-05-29 08:36:27', NULL),
(13, 'ChIJm7N0nQ-8fRcR7G9r2T2QOEU', 'KampalaKampala Kampala Central Region', 'KampalaKampala Kampala Central Region', 0.347596, 32.582520, 5, 1, 0, '2020-05-29 08:36:27', '2020-05-29 08:36:27', NULL),
(14, 'ChIJHchKrTekKhgR0o0k1jmkEiA', 'KisumuKisumu Kisumu County KE', 'KisumuKisumu Kisumu County KE', -0.091702, 34.767957, 5, 1, 0, '2020-05-29 08:36:27', '2020-05-29 08:36:27', NULL),
(15, 'ChIJVTNnejxufxcRmGmG-z-tqBQ', 'MalabaMalaba Busia County KE', 'MalabaMalaba Busia County KE', 0.636206, 34.278276, 5, 1, 0, '2020-05-29 08:36:27', '2020-05-29 08:36:27', NULL),
(16, 'ChIJHchKrTekKhgR0o0k1jmkEiA', 'Kisumu', 'n/a', -0.091702, 34.767956, 6, 0, 0, '2020-05-30 19:11:24', '2020-05-30 19:11:24', NULL),
(17, 'ChIJfSzAjucSQBgRWtvQNbyLYcs', 'Mombasa', 'n/a', -4.043477, 39.668205, 6, 0, 1, '2020-05-30 19:11:24', '2020-05-30 19:11:24', NULL),
(18, 'ChIJGQ4Kp3hXKhgRlziS5gASEZ4', 'Kericho', 'n/a', -0.368897, 35.286285, 6, 1, 0, '2020-05-30 19:11:24', '2020-05-30 19:11:24', NULL),
(19, 'ChIJ7wthz5CNKRgRGsJ8vDMY8vI', 'Nakuru', 'n/a', -0.303099, 36.080025, 6, 1, 0, '2020-05-30 19:11:24', '2020-05-30 19:11:24', NULL),
(20, 'ChIJXRorJfUXKRgRR84_VcP-yEU', 'Naivasha', 'n/a', -0.717178, 36.431026, 6, 1, 0, '2020-05-30 19:11:24', '2020-05-30 19:11:24', NULL),
(21, 'ChIJp0lN2HIRLxgRTJKXslQCz_c', 'Nairobi', 'n/a', -1.292066, 36.821945, 6, 1, 0, '2020-05-30 19:11:24', '2020-05-30 19:11:24', NULL),
(22, 'ChIJwUgHhFUpORgRaUxHbrd5KGE', 'Voi', 'n/a', -3.397311, 38.555935, 6, 1, 0, '2020-05-30 19:11:24', '2020-05-30 19:11:24', NULL),
(23, 'ChIJYUFfsuw7KxgRsS2Lx5BqUUQ', 'Kisii', 'n/a', -0.677334, 34.779602, 7, 0, 0, '2020-05-31 02:50:44', '2020-05-31 02:50:44', NULL),
(24, 'ChIJp0lN2HIRLxgRTJKXslQCz_c', 'Nairobi', 'n/a', -1.292066, 36.821945, 7, 0, 1, '2020-05-31 02:50:44', '2020-05-31 02:50:44', NULL),
(25, 'ChIJb5YKdmcYLxgRknsZwPs3924', 'MwimutoGetathuru Kitisuru Nairobi City', 'MwimutoGetathuru Kitisuru Nairobi City', -1.233799, 36.746259, 8, 0, 0, '2020-05-31 03:44:34', '2020-05-31 03:44:34', NULL),
(26, 'ChIJq-SGSEU9LxgRmWlJE6hjjsQ', 'Two Rivers MallKE Kitisuru Nairobi', 'Two Rivers MallKE Kitisuru Nairobi', -1.210846, 36.794698, 8, 0, 1, '2020-05-31 03:44:34', '2020-05-31 03:44:34', NULL),
(27, 'ChIJkVrI3MEXLxgRulEGGSJMVcU', 'The Village MarketVillage Rd Kitisuru Nairobi', 'The Village MarketVillage Rd Kitisuru Nairobi', -1.230619, 36.804131, 8, 1, 0, '2020-05-31 03:44:34', '2020-05-31 03:44:34', NULL),
(28, 'ChIJXQMdohZGLxgRX_SJNfpubNQ', 'Juja', 'n/a', -1.101822, 37.014404, 9, 0, 0, '2020-05-31 05:36:52', '2020-05-31 05:36:52', NULL),
(29, 'ChIJYUFfsuw7KxgRsS2Lx5BqUUQ', 'Kisii', 'n/a', -0.677334, 34.779602, 9, 0, 1, '2020-05-31 05:36:52', '2020-05-31 05:36:52', NULL),
(30, 'ChIJcbhbs2saLxgRP6vWzb7XVbM', 'Junction Mall Parking Hall', 'n/a', -1.298783, 36.763180, 10, 0, 0, '2020-05-31 05:57:48', '2020-05-31 05:57:48', NULL),
(31, 'ChIJByo2UD6lKhgRiZR-yPHTtvk', 'Mega City Mall', 'n/a', -0.107379, 34.770523, 10, 0, 1, '2020-05-31 05:57:48', '2020-05-31 05:57:48', NULL),
(32, 'ChIJHchKrTekKhgR0o0k1jmkEiA', 'Kisumu', 'n/a', -0.091702, 34.767956, 11, 0, 0, '2020-05-31 07:44:00', '2020-05-31 07:44:00', NULL),
(33, 'ChIJfSzAjucSQBgRWtvQNbyLYcs', 'Mombasa', 'n/a', -4.043477, 39.668205, 11, 0, 1, '2020-05-31 07:44:00', '2020-05-31 07:44:00', NULL),
(34, 'ChIJXeoyZalKIBgRoM3zor0b31Q', 'Garissa', 'n/a', -0.453229, 39.646100, 12, 0, 0, '2020-05-31 08:15:35', '2020-05-31 08:15:35', NULL),
(35, 'ChIJXQMdohZGLxgRX_SJNfpubNQ', 'Juja', 'n/a', -1.101822, 37.014404, 12, 0, 1, '2020-05-31 08:15:35', '2020-05-31 08:15:35', NULL),
(36, 'ChIJhwqcMIkYLxgRjt6PSkX-9aY', 'Kibichiku Primary School', 'n/a', -1.229308, 36.734070, 13, 0, 0, '2020-05-31 08:30:04', '2020-05-31 08:30:04', NULL),
(37, 'ChIJIdEeLNQQLxgRF4jg4965nuI', 'Nairobi CBD', 'n/a', -1.283226, 36.822018, 13, 0, 1, '2020-05-31 08:30:04', '2020-05-31 08:30:04', NULL),
(38, 'ChIJhwqcMIkYLxgRjt6PSkX-9aY', 'Kibichiku Primary School', 'n/a', -1.229308, 36.734070, 14, 0, 0, '2020-05-31 10:10:21', '2020-05-31 10:10:21', NULL),
(39, 'ChIJW6PpopEVLxgR1czxDAMrqTE', 'Kasarani', 'n/a', -1.225400, 36.897636, 14, 0, 1, '2020-05-31 10:10:21', '2020-05-31 10:10:21', NULL),
(40, 'ChIJhwqcMIkYLxgRjt6PSkX-9aY', 'Kibichiku Primary School', 'n/a', -1.229308, 36.734070, 15, 0, 0, '2020-05-31 13:00:32', '2020-05-31 13:00:32', NULL),
(41, 'ChIJIdEeLNQQLxgRF4jg4965nuI', 'Nairobi CBD', 'n/a', -1.283226, 36.822018, 15, 0, 1, '2020-05-31 13:00:32', '2020-05-31 13:00:32', NULL),
(42, 'ChIJbXx36TcYLxgRRJhz4zBySIM', 'Lower KabeteLower Kabete Nairobi Nairobi County', 'Lower KabeteLower Kabete Nairobi Nairobi County', -1.242769, 36.761750, 16, 0, 0, '2020-05-31 16:34:54', '2020-05-31 16:34:54', NULL),
(43, 'ChIJW3mpHzUSLxgRAN_gmDkeGcU', 'PipelineKE Embakasi Nairobi', 'PipelineKE Embakasi Nairobi', -1.310682, 36.887063, 16, 0, 1, '2020-05-31 16:34:54', '2020-05-31 16:34:54', NULL),
(44, 'ChIJYUFfsuw7KxgRsS2Lx5BqUUQ', 'Kisii', 'n/a', -0.677334, 34.779602, 17, 0, 0, '2020-05-31 17:34:00', '2020-05-31 17:34:00', NULL),
(45, 'ChIJLXFdP1cTQBgRbjQzj9uzYYA', 'Likoni', 'n/a', -4.084099, 39.660810, 17, 0, 1, '2020-05-31 17:34:00', '2020-05-31 17:34:00', NULL),
(46, 'ChIJp0lN2HIRLxgRTJKXslQCz_c', 'NairobiNairobi Nairobi County KE', 'NairobiNairobi Nairobi County KE', -1.292066, 36.821946, 18, 0, 0, '2020-06-02 03:21:28', '2020-06-02 03:21:28', NULL),
(47, 'ChIJfSzAjucSQBgRWtvQNbyLYcs', 'MombasaMombasa Mombasa County KE', 'MombasaMombasa Mombasa County KE', -4.043477, 39.668206, 18, 0, 1, '2020-06-02 03:21:28', '2020-06-02 03:21:28', NULL),
(48, 'ChIJfSzAjucSQBgRWtvQNbyLYcs', 'Mombasa', 'n/a', -4.043477, 39.668205, 21, 0, 0, '2020-06-02 13:58:48', '2020-06-02 13:58:48', NULL),
(49, 'ChIJHchKrTekKhgR0o0k1jmkEiA', 'Kisumu', 'n/a', -0.091702, 34.767956, 21, 0, 1, '2020-06-02 13:58:48', '2020-06-02 13:58:48', NULL),
(50, 'ChIJdUoulKAYLxgR5I8fjQERNMU', 'Wangige Market', 'n/a', -1.220061, 36.713440, 22, 0, 0, '2020-06-02 14:11:33', '2020-06-02 14:11:33', NULL),
(51, 'EhtNd2lob2tvIFJkLCBHaXRodXJhaSwgS2VueWEiLiosChQKEgmlIXAHzz8vGBG3u6a84zViEBIUChIJc5jnXck_LxgRNLLmN74T7uM', 'Mwihoko Road', 'n/a', -1.205884, 36.919720, 22, 0, 1, '2020-06-02 14:11:33', '2020-06-02 14:11:33', NULL),
(52, 'ChIJp0lN2HIRLxgRTJKXslQCz_c', 'NairobiNairobi Nairobi County KE', 'NairobiNairobi Nairobi County KE', -1.292066, 36.821946, 23, 0, 0, '2020-06-02 15:30:48', '2020-06-02 15:30:48', NULL),
(53, 'ChIJfSzAjucSQBgRWtvQNbyLYcs', 'MombasaMombasa Mombasa County KE', 'MombasaMombasa Mombasa County KE', -4.043477, 39.668206, 23, 0, 1, '2020-06-02 15:30:48', '2020-06-02 15:30:48', NULL),
(54, 'ChIJp0lN2HIRLxgRTJKXslQCz_c', 'NairobiNairobi Nairobi County KE', 'NairobiNairobi Nairobi County KE', -1.292066, 36.821946, 24, 0, 0, '2020-06-02 15:31:25', '2020-06-02 15:31:25', NULL),
(55, 'ChIJHchKrTekKhgR0o0k1jmkEiA', 'KisumuKisumu Kisumu County KE', 'KisumuKisumu Kisumu County KE', -0.091702, 34.767957, 24, 0, 1, '2020-06-02 15:31:25', '2020-06-02 15:31:25', NULL),
(56, 'ChIJp0lN2HIRLxgRTJKXslQCz_c', 'NairobiNairobi Nairobi County KE', 'NairobiNairobi Nairobi County KE', -1.292066, 36.821946, 25, 0, 0, '2020-06-02 15:36:29', '2020-06-02 15:36:29', NULL),
(57, 'ChIJvw6e0P5dKBgRnl72AvcWl4I', 'NyeriNyeri Nyeri County KE', 'NyeriNyeri Nyeri County KE', -0.437099, 36.958010, 25, 0, 1, '2020-06-02 15:36:29', '2020-06-02 15:36:29', NULL),
(58, 'ChIJp0lN2HIRLxgRTJKXslQCz_c', 'NairobiNairobi Nairobi County KE', 'NairobiNairobi Nairobi County KE', -1.292066, 36.821946, 26, 0, 0, '2020-06-02 15:42:36', '2020-06-02 15:42:36', NULL),
(59, 'ChIJHchKrTekKhgR0o0k1jmkEiA', 'KisumuKisumu Kisumu County KE', 'KisumuKisumu Kisumu County KE', -0.091702, 34.767957, 26, 0, 1, '2020-06-02 15:42:36', '2020-06-02 15:42:36', NULL),
(60, 'ChIJ7wthz5CNKRgRGsJ8vDMY8vI', 'NakuruNakuru Nakuru County KE', 'NakuruNakuru Nakuru County KE', -0.303099, 36.080026, 26, 1, 0, '2020-06-02 15:42:36', '2020-06-02 15:42:36', NULL),
(61, 'ChIJ2b3kMc8nLxgRktO1oeuv1Qo', 'Limuru Town.Limuru Town. Kiambu County KE', 'Limuru Town.Limuru Town. Kiambu County KE', -1.106930, 36.643127, 27, 0, 0, '2020-06-03 04:45:12', '2020-06-03 04:45:12', NULL),
(62, 'EhpNdXRhcmFrd2EgTGltdXJ1IFJkLCBLZW55YSIuKiwKFAoSCYfg-IqSJy8YEZMiy0pBQ5wdEhQKEgnv1Hto8icvGBFOy_23PFGFcw', 'Mutarakwa Limuru RoadMutarakwa Limuru Rd Kiambu County KE', 'Mutarakwa Limuru RoadMutarakwa Limuru Rd Kiambu County KE', -1.114259, 36.620360, 27, 0, 1, '2020-06-03 04:45:12', '2020-06-03 04:45:12', NULL),
(63, 'ChIJ2b3kMc8nLxgRktO1oeuv1Qo', 'Limuru Town.', 'n/a', -1.106930, 36.643127, 28, 0, 0, '2020-06-03 07:31:10', '2020-06-03 07:31:10', NULL),
(64, 'ChIJh83egGI8LxgR6RP95ggZGho', 'Kiambu', 'n/a', -1.174810, 36.830410, 28, 0, 1, '2020-06-03 07:31:10', '2020-06-03 07:31:10', NULL),
(65, 'ChIJp0lN2HIRLxgRTJKXslQCz_c', 'Nairobi', 'n/a', -1.292066, 36.821945, 29, 0, 0, '2020-06-03 07:37:55', '2020-06-03 07:37:55', NULL),
(66, 'ChIJHchKrTekKhgR0o0k1jmkEiA', 'Kisumu', 'n/a', -0.091702, 34.767956, 29, 0, 1, '2020-06-03 07:37:55', '2020-06-03 07:37:55', NULL),
(67, 'ChIJXRorJfUXKRgRR84_VcP-yEU', 'Naivasha', 'n/a', -0.717178, 36.431026, 29, 1, 0, '2020-06-03 07:37:55', '2020-06-03 07:37:55', NULL),
(68, 'ChIJp0lN2HIRLxgRTJKXslQCz_c', 'Nairobi', 'n/a', -1.292066, 36.821945, 30, 0, 0, '2020-06-03 07:44:43', '2020-06-03 07:44:43', NULL),
(69, 'ChIJwXq9nsgnLxgRTqML7KsQ22k', 'Limuru Town', 'n/a', -1.109088, 36.642033, 30, 0, 1, '2020-06-03 07:44:43', '2020-06-03 07:44:43', NULL),
(70, 'ChIJp0lN2HIRLxgRTJKXslQCz_c', 'Nairobi', 'n/a', -1.292066, 36.821945, 31, 0, 0, '2020-06-03 08:34:37', '2020-06-03 08:34:37', NULL),
(71, 'ChIJ2b3kMc8nLxgRktO1oeuv1Qo', 'Limuru Town.', 'n/a', -1.106930, 36.643127, 31, 0, 1, '2020-06-03 08:34:37', '2020-06-03 08:34:37', NULL),
(72, 'ChIJp0lN2HIRLxgRTJKXslQCz_c', 'NairobiNairobi Nairobi County KE', 'NairobiNairobi Nairobi County KE', -1.292066, 36.821946, 32, 0, 0, '2020-06-03 08:36:46', '2020-06-03 08:36:46', NULL),
(73, 'ChIJfSzAjucSQBgRWtvQNbyLYcs', 'MombasaMombasa Mombasa County KE', 'MombasaMombasa Mombasa County KE', -4.043477, 39.668206, 32, 0, 1, '2020-06-03 08:36:46', '2020-06-03 08:36:46', NULL),
(74, 'ChIJ2b3kMc8nLxgRktO1oeuv1Qo', 'Limuru Town.', 'n/a', -1.106930, 36.643127, 33, 0, 0, '2020-06-03 10:10:27', '2020-06-03 10:10:27', NULL),
(75, 'ChIJp0lN2HIRLxgRTJKXslQCz_c', 'Nairobi', 'n/a', -1.292066, 36.821945, 33, 0, 1, '2020-06-03 10:10:27', '2020-06-03 10:10:27', NULL),
(76, 'ChIJ2b3kMc8nLxgRktO1oeuv1Qo', 'Limuru Town.Limuru Town. Kiambu County KE', 'Limuru Town.Limuru Town. Kiambu County KE', -1.106930, 36.643127, 34, 0, 0, '2020-06-03 13:58:38', '2020-06-03 13:58:38', NULL),
(77, 'ChIJe1JB24AXLxgRmRX9jlmzqZo', 'WestlandsWestlands Nairobi County KE', 'WestlandsWestlands Nairobi County KE', -1.256823, 36.792722, 34, 0, 1, '2020-06-03 13:58:38', '2020-06-03 13:58:38', NULL),
(78, 'ChIJIV4W5asXLxgRcXZlOTG4B-A', 'Muthaiga', 'n/a', -1.250085, 36.821320, 35, 0, 0, '2020-06-03 16:11:53', '2020-06-03 16:11:53', NULL),
(79, 'ChIJW1EswycfLxgRzhK8MW7Gslc', 'Muthiga', 'n/a', -1.249721, 36.684242, 35, 0, 1, '2020-06-03 16:11:53', '2020-06-03 16:11:53', NULL),
(80, 'ChIJO0LrfDAXLxgRb09sF88mbys', 'Prosperity House', 'n/a', -1.272374, 36.811780, 38, 0, 0, '2020-06-04 05:36:52', '2020-06-04 05:36:52', NULL),
(81, 'ChIJt3hKySQCLxgRBt92GcBGjEE', 'Ngong Hills', 'n/a', -1.400000, 36.638054, 38, 0, 1, '2020-06-04 05:36:52', '2020-06-04 05:36:52', NULL),
(82, 'ChIJp0lN2HIRLxgRTJKXslQCz_c', 'NairobiNairobi Nairobi County KE', 'NairobiNairobi Nairobi County KE', -1.292066, 36.821946, 39, 0, 0, '2020-06-04 06:28:19', '2020-06-04 06:28:19', NULL),
(83, 'ChIJjdfG6kEnLxgRl6iY1oXdW8o', 'LimuruLimuru Kiambu County KE', 'LimuruLimuru Kiambu County KE', -1.111947, 36.630984, 39, 0, 1, '2020-06-04 06:28:19', '2020-06-04 06:28:19', NULL),
(84, 'ChIJDeW0jKc4LxgR-_DLwtn6p9o', 'Ruiru', 'n/a', -1.148250, 36.960453, 40, 0, 0, '2020-06-04 06:32:12', '2020-06-04 06:32:12', NULL),
(85, 'ChIJfSzAjucSQBgRWtvQNbyLYcs', 'Mombasa', 'n/a', -4.043477, 39.668205, 40, 0, 1, '2020-06-04 06:32:12', '2020-06-04 06:32:12', NULL),
(86, 'ChIJp0lN2HIRLxgRTJKXslQCz_c', 'NairobiNairobi Nairobi County KE', 'NairobiNairobi Nairobi County KE', -1.292066, 36.821946, 41, 0, 0, '2020-06-04 06:32:37', '2020-06-04 06:32:37', NULL),
(87, 'ChIJm7N0nQ-8fRcR7G9r2T2QOEU', 'KampalaKampala Kampala Central Region', 'KampalaKampala Kampala Central Region', 0.347596, 32.582520, 41, 0, 1, '2020-06-04 06:32:37', '2020-06-04 06:32:37', NULL),
(88, 'ChIJHchKrTekKhgR0o0k1jmkEiA', 'KisumuKisumu Kisumu County KE', 'KisumuKisumu Kisumu County KE', -0.091702, 34.767957, 41, 1, 0, '2020-06-04 06:32:37', '2020-06-04 06:32:37', NULL),
(89, 'ChIJHchKrTekKhgR0o0k1jmkEiA', 'Kisumu', 'n/a', -0.091702, 34.767956, 42, 0, 0, '2020-06-04 08:03:51', '2020-06-04 08:03:51', NULL),
(90, 'ChIJfSzAjucSQBgRWtvQNbyLYcs', 'Mombasa', 'n/a', -4.043477, 39.668205, 42, 0, 1, '2020-06-04 08:03:51', '2020-06-04 08:03:51', NULL),
(91, 'ChIJ7wthz5CNKRgRGsJ8vDMY8vI', 'Nakuru', 'n/a', -0.303099, 36.080025, 42, 1, 0, '2020-06-04 08:03:51', '2020-06-04 08:03:51', NULL),
(92, 'ChIJXRorJfUXKRgRR84_VcP-yEU', 'Naivasha', 'n/a', -0.717178, 36.431026, 42, 1, 0, '2020-06-04 08:03:52', '2020-06-04 08:03:52', NULL),
(93, 'ChIJp0lN2HIRLxgRTJKXslQCz_c', 'Nairobi', 'n/a', -1.292066, 36.821945, 42, 1, 0, '2020-06-04 08:03:52', '2020-06-04 08:03:52', NULL),
(94, 'ChIJwUgHhFUpORgRaUxHbrd5KGE', 'Voi', 'n/a', -3.397311, 38.555935, 42, 1, 0, '2020-06-04 08:03:52', '2020-06-04 08:03:52', NULL),
(95, 'ChIJdUoulKAYLxgR5I8fjQERNMU', 'Wangige Market', 'n/a', -1.220061, 36.713440, 43, 0, 0, '2020-06-04 08:05:33', '2020-06-04 08:05:33', NULL),
(96, 'ChIJt3hKySQCLxgRBt92GcBGjEE', 'Ngong Hills', 'n/a', -1.400000, 36.638054, 43, 0, 1, '2020-06-04 08:05:33', '2020-06-04 08:05:33', NULL),
(97, 'ChIJjdfG6kEnLxgRl6iY1oXdW8o', 'LimuruLimuru Kiambu County KE', 'LimuruLimuru Kiambu County KE', -1.111947, 36.630984, 44, 0, 0, '2020-06-05 04:26:52', '2020-06-05 04:26:52', NULL),
(98, 'ChIJ82EeiJ4nLxgRnXaW4PpUET8', 'Ngenia High SchoolKE Kiambu County', 'Ngenia High SchoolKE Kiambu County', -1.125568, 36.626329, 44, 0, 1, '2020-06-05 04:26:52', '2020-06-05 04:26:52', NULL),
(99, 'ChIJp0lN2HIRLxgRTJKXslQCz_c', 'NairobiNairobi Nairobi County KE', 'NairobiNairobi Nairobi County KE', -1.292066, 36.821946, 45, 0, 0, '2020-06-05 04:32:58', '2020-06-05 04:32:58', NULL),
(100, 'ChIJm7N0nQ-8fRcR7G9r2T2QOEU', 'KampalaKampala Kampala Central Region', 'KampalaKampala Kampala Central Region', 0.347596, 32.582520, 45, 0, 1, '2020-06-05 04:32:58', '2020-06-05 04:32:58', NULL),
(101, 'ChIJHchKrTekKhgR0o0k1jmkEiA', 'KisumuKisumu Kisumu County KE', 'KisumuKisumu Kisumu County KE', -0.091702, 34.767957, 45, 1, 0, '2020-06-05 04:32:58', '2020-06-05 04:32:58', NULL),
(102, 'ChIJT2Vl9EChfxcRE5Wr_IVe-mg', 'BusiaBusia Busia County KE', 'BusiaBusia Busia County KE', 0.460769, 34.111462, 45, 1, 0, '2020-06-05 04:32:58', '2020-06-05 04:32:58', NULL),
(103, 'ChIJ-TR4COQXKhgRNAaFOMwBj5o', 'MoloMolo Nakuru County KE', 'MoloMolo Nakuru County KE', -0.248836, 35.732371, 45, 1, 0, '2020-06-05 04:32:58', '2020-06-05 04:32:58', NULL),
(104, 'ChIJO0LrfDAXLxgRb09sF88mbys', 'Prosperity HouseProsperity House Nairobi Nairobi County', 'Prosperity HouseProsperity House Nairobi Nairobi County', -1.272374, 36.811779, 46, 0, 0, '2020-06-05 04:41:32', '2020-06-05 04:41:32', NULL),
(105, 'ChIJ70UpAdUQLxgRIztNk1bCU_E', 'Koja StageNairobi Central Nairobi City Nairobi County', 'Koja StageNairobi Central Nairobi City Nairobi County', -1.281434, 36.822648, 46, 0, 1, '2020-06-05 04:41:32', '2020-06-05 04:41:32', NULL),
(106, 'ChIJOxQFXPZOLxgR17fvwKtEF4U', 'Engen Thika', 'n/a', -1.051178, 37.095110, 47, 0, 0, '2020-06-05 05:05:49', '2020-06-05 05:05:49', NULL),
(107, 'ChIJPSkMdaylKhgRtoQhrttrniI', 'Kisumu Airport', 'n/a', -0.088294, 34.725746, 47, 0, 1, '2020-06-05 05:05:49', '2020-06-05 05:05:49', NULL),
(108, 'ChIJ_90jxffU1BkRET4aN7On1sM', 'Homa Bay', 'n/a', -0.535043, 34.453100, 48, 0, 0, '2020-06-05 05:07:23', '2020-06-05 05:07:23', NULL),
(109, 'ChIJfSzAjucSQBgRWtvQNbyLYcs', 'Mombasa', 'n/a', -4.043477, 39.668205, 48, 0, 1, '2020-06-05 05:07:23', '2020-06-05 05:07:23', NULL),
(110, 'ChIJO0LrfDAXLxgRb09sF88mbys', 'Prosperity House', 'n/a', -1.272374, 36.811780, 49, 0, 0, '2020-06-05 05:10:04', '2020-06-05 05:10:04', NULL),
(111, 'ChIJXQMdohZGLxgRX_SJNfpubNQ', 'Juja', 'n/a', -1.101822, 37.014404, 49, 0, 1, '2020-06-05 05:10:04', '2020-06-05 05:10:04', NULL),
(112, 'ChIJXQMdohZGLxgRX_SJNfpubNQ', 'Juja', 'n/a', -1.101822, 37.014404, 50, 0, 0, '2020-06-05 05:12:27', '2020-06-05 05:12:27', NULL),
(113, 'ChIJp0lN2HIRLxgRTJKXslQCz_c', 'Nairobi', 'n/a', -1.292066, 36.821945, 50, 0, 1, '2020-06-05 05:12:27', '2020-06-05 05:12:27', NULL),
(114, 'ChIJB-JU8X4ZLxgRdeluH-HpW-0', 'Mwimuto Church Of God', 'n/a', -1.235700, 36.745860, 51, 0, 0, '2020-06-05 06:37:25', '2020-06-05 06:37:25', NULL),
(115, 'ChIJIdEeLNQQLxgRF4jg4965nuI', 'Nairobi CBD', 'n/a', -1.283226, 36.822018, 51, 0, 1, '2020-06-05 06:37:25', '2020-06-05 06:37:25', NULL),
(116, 'ChIJB-JU8X4ZLxgRdeluH-HpW-0', 'Mwimuto Church Of God', 'n/a', -1.235700, 36.745860, 52, 0, 0, '2020-06-05 06:37:34', '2020-06-05 06:37:34', NULL),
(117, 'ChIJIdEeLNQQLxgRF4jg4965nuI', 'Nairobi CBD', 'n/a', -1.283226, 36.822018, 52, 0, 1, '2020-06-05 06:37:34', '2020-06-05 06:37:34', NULL),
(118, 'ChIJB6Brk2QZLxgRbaKdn7vHpCI', 'Chri Micash Apartments KibichikuOff Getathuru Rd Kiambu County', 'Chri Micash Apartments KibichikuOff Getathuru Rd Kiambu County', -1.231224, 36.732282, 53, 0, 0, '2020-06-05 06:43:23', '2020-06-05 06:43:23', NULL),
(119, 'ChIJIdEeLNQQLxgRF4jg4965nuI', 'Nairobi CBDBiashara St Nairobi Central Nairobi', 'Nairobi CBDBiashara St Nairobi Central Nairobi', -1.283226, 36.822018, 53, 0, 1, '2020-06-05 06:43:23', '2020-06-05 06:43:23', NULL),
(120, 'ChIJ550fCjwXLxgRyC5_H9-ELK0', 'Westlands', 'n/a', -1.267500, 36.812023, 54, 0, 0, '2020-06-06 09:04:43', '2020-06-06 09:04:43', NULL),
(121, 'ChIJr5jOzroMLxgRUR1CRJH0zMI', 'Mlolongo', 'n/a', -1.392234, 36.940670, 54, 0, 1, '2020-06-06 09:04:43', '2020-06-06 09:04:43', NULL),
(122, 'ChIJHahFUm0XLxgRRNKY1sbJgGk', 'Westgate Shopping Mall', 'n/a', -1.257227, 36.803207, 55, 0, 0, '2020-06-06 15:04:59', '2020-06-06 15:04:59', NULL),
(123, 'ChIJuZHCs74MLxgR4si5DLh6r-w', 'Mlolongo Weigh Bridge', 'n/a', -1.389490, 36.937817, 55, 0, 1, '2020-06-06 15:04:59', '2020-06-06 15:04:59', NULL),
(124, 'ChIJp0lN2HIRLxgRTJKXslQCz_c', 'NairobiNairobi Nairobi County KE', 'NairobiNairobi Nairobi County KE', -1.292066, 36.821946, 56, 0, 0, '2020-06-06 17:26:57', '2020-06-06 17:26:57', NULL),
(125, 'ChIJfSzAjucSQBgRWtvQNbyLYcs', 'MombasaMombasa Mombasa County KE', 'MombasaMombasa Mombasa County KE', -4.043477, 39.668206, 56, 0, 1, '2020-06-06 17:26:57', '2020-06-06 17:26:57', NULL),
(126, 'EhpNdXRhcmFrd2EgTGltdXJ1IFJkLCBLZW55YSIuKiwKFAoSCYfg-IqSJy8YEZMiy0pBQ5wdEhQKEgnv1Hto8icvGBFOy_23PFGFcw', 'Mutarakwa Limuru RoadMutarakwa Limuru Rd Kiambu County KE', 'Mutarakwa Limuru RoadMutarakwa Limuru Rd Kiambu County KE', -1.114259, 36.620360, 57, 0, 0, '2020-06-06 17:28:31', '2020-06-06 17:28:31', NULL),
(127, 'ChIJ82EeiJ4nLxgRnXaW4PpUET8', 'Ngenia High SchoolKE Kiambu County', 'Ngenia High SchoolKE Kiambu County', -1.125568, 36.626329, 57, 0, 1, '2020-06-06 17:28:31', '2020-06-06 17:28:31', NULL),
(128, 'ChIJfSdPlm4XLxgRaJrKB8rf7cg', 'Westlands Primary School', 'n/a', -1.259690, 36.797417, 58, 0, 0, '2020-06-07 12:50:07', '2020-06-07 12:50:07', NULL),
(129, 'ChIJA9Qpk5MNLxgRvDFzpzRaksI', 'Mlolongo Police Station', 'n/a', -1.389433, 36.942818, 58, 0, 1, '2020-06-07 12:50:07', '2020-06-07 12:50:07', NULL),
(130, 'ChIJfSdPlm4XLxgRaJrKB8rf7cg', 'Westlands Primary School', 'n/a', -1.259690, 36.797417, 59, 0, 0, '2020-06-07 12:56:44', '2020-06-07 12:56:44', NULL),
(131, 'ChIJA9Qpk5MNLxgRvDFzpzRaksI', 'Mlolongo Police Station', 'n/a', -1.389433, 36.942818, 59, 0, 1, '2020-06-07 12:56:44', '2020-06-07 12:56:44', NULL),
(132, 'ChIJZ4pnVck_LxgRKpesRnfgMCw', 'TRM - Thika Road Mall', 'n/a', -1.219891, 36.889214, 60, 0, 0, '2020-06-10 02:06:18', '2020-06-10 02:06:18', NULL),
(133, 'ChIJD5NfmPqfLxgRVJ_Y3tP8_qA', 'Kitengela Medical Services', 'n/a', -1.471290, 36.963410, 60, 0, 1, '2020-06-10 02:06:18', '2020-06-10 02:06:18', NULL),
(134, 'ChIJcX4pnBkXLxgR1JZIu0zCGXA', 'Parklands', 'n/a', -1.259882, 36.817890, 61, 0, 0, '2020-06-10 11:12:02', '2020-06-10 11:12:02', NULL),
(135, 'ChIJLwCPTuwQLxgRAUdND1TKttY', 'Kenyatta National Hospital', 'n/a', -1.301301, 36.806990, 61, 0, 1, '2020-06-10 11:12:02', '2020-06-10 11:12:02', NULL),
(136, 'ChIJB6Brk2QZLxgRbaKdn7vHpCI', 'Chri Micash Apartments KibichikuOff Getathuru Rd Kiambu County', 'Chri Micash Apartments KibichikuOff Getathuru Rd Kiambu County', -1.231224, 36.732282, 62, 0, 0, '2020-06-10 13:26:02', '2020-06-10 13:26:02', NULL),
(137, 'ChIJdUoulKAYLxgR5I8fjQERNMU', 'Wangige MarketWangige Kiambu County KE', 'Wangige MarketWangige Kiambu County KE', -1.220061, 36.713441, 62, 0, 1, '2020-06-10 13:26:02', '2020-06-10 13:26:02', NULL),
(138, 'ChIJk9A6QoMZLxgRGEiQSC331z8', 'Chri Micash Gardens Apartments', 'n/a', -1.232017, 36.736660, 63, 0, 0, '2020-06-10 13:35:15', '2020-06-10 13:35:15', NULL),
(139, 'ChIJIdEeLNQQLxgRF4jg4965nuI', 'Nairobi CBD', 'n/a', -1.283226, 36.822018, 63, 0, 1, '2020-06-10 13:35:15', '2020-06-10 13:35:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `volantuser_id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(10, '2020_03_26_082251_create_trucks_table', 1),
(13, '2020_04_01_143308_create_payments_table', 1),
(14, '2020_04_01_152304_create_notifications_table', 1),
(16, '2020_04_15_120421_create_messages_table', 1),
(18, '2020_04_19_130212_create_freight_orders_table', 2),
(22, '2020_03_26_083024_create_couriers_table', 4),
(26, '2020_03_26_082236_create_dispatch_table', 5),
(28, '2020_05_11_073947_create_operators_table', 6),
(31, '2020_05_11_065757_create_service_types_table', 7),
(33, '2020_03_27_044114_create_volantusers_table', 8),
(34, '2020_05_13_044123_create_permission_tables', 9),
(35, '2020_05_13_044139_create_posts_table', 10),
(39, '2020_05_15_083906_create_categories_table', 13),
(41, '2020_05_17_033540_create_settings_table', 14),
(43, '2020_05_20_050007_create_house_type_table', 16),
(45, '2020_05_20_050034_create_moves_extra_table', 17),
(46, '2020_05_24_172225_create_account_types_table', 18),
(47, '2020_05_24_172255_create_order_payments_table', 18),
(48, '2020_05_24_172817_create_payment_types_table', 18),
(49, '2020_05_24_173017_create_package_sizes_table', 18),
(50, '2020_05_24_173113_create_truck_types_table', 18),
(51, '2020_05_24_173909_create_user_roles_table', 18),
(52, '2020_03_26_082218_create_orders_table', 19),
(53, '2020_04_09_074400_create_locations_table', 19),
(55, '2020_05_25_104701_create_extra_moves_table', 20),
(58, '2014_10_12_000000_create_users_table', 21),
(59, '2020_05_25_093743_create_admins_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(16, 'App\\Admins', 1),
(17, 'App\\Admins', 1);

-- --------------------------------------------------------

--
-- Table structure for table `moves_extra`
--

CREATE TABLE `moves_extra` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `house_type_id` int(11) NOT NULL,
  `rooms_count` int(11) NOT NULL,
  `type_of_rooms` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pcp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_services` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `moves_extra`
--

INSERT INTO `moves_extra` (`id`, `order_id`, `house_type_id`, `rooms_count`, `type_of_rooms`, `pcp`, `other_services`, `created_at`, `updated_at`) VALUES
(1, 9, 3, 2, 'One Bedroom House', '[\"Padding\",\"Crafting\"]', '[\"Mounting TVs\\/Wall Hanging\",\"Dstv Installation & Zuku Satellite\"]', '2020-05-20 13:06:39', '2020-05-20 13:06:39'),
(2, 9, 2, 1, 'Studio Apartment', '[\"Padding\",\"Crafting\"]', '[\"Mounting TVs\\/Wall Hanging\",\"Dstv Installation & Zuku Satellite\"]', '2020-05-20 13:06:39', '2020-05-20 13:06:39'),
(3, 10, 1, 1, 'Bedsitter', '[\"Padding\",\"Crafting\"]', '[\"Mounting TVs\\/Wall Hanging\",\"Dstv Installation & Zuku Satellite\"]', '2020-05-20 13:10:15', '2020-05-20 13:10:15'),
(4, 10, 3, 2, 'One Bedroom House', '[\"Padding\",\"Crafting\"]', '[\"Mounting TVs\\/Wall Hanging\",\"Dstv Installation & Zuku Satellite\"]', '2020-05-20 13:10:15', '2020-05-20 13:10:15'),
(5, 21, 3, 5, '[\"Living Room\",\"Kitchen\",\"Dinning\",\"Laundry\",\"Bedroom 1\",\"Balcony\",\"Kitchen Pantry\"]', '[\"Crafting\",\"Padding\"]', '[\"Basic Housekeeping\",\"DStv or Zuku Installation\",\"Mounting TVs or Wall Hanging\",\"Labeling\",\"Mounting\"]', '2020-06-02 13:58:48', '2020-06-02 13:58:48'),
(6, 30, 1, 1, '[]', '[\"Crafting\"]', '[\"Furniture Protection\"]', '2020-06-03 07:44:43', '2020-06-03 07:44:43'),
(7, 61, 2, 2, '[]', '[\"Padding\",\"Packaging\"]', '[\"DStv or Zuku Installation\",\"Basic Housekeeping\",\"Mounting TVs or Wall Hanging\"]', '2020-06-10 11:12:02', '2020-06-10 11:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('2beb867a-07f7-492d-9b6e-73e77380faea', 'App\\Notifications\\mailNotification', 'App\\User', 1, '{\"order_id\":null}', NULL, '2020-04-19 12:52:04', '2020-04-19 12:52:04'),
('3e97d8a5-3637-4b05-87cf-4e53ad694799', 'App\\Notifications\\mailNotification', 'App\\User', 1, '{\"order_id\":null}', NULL, '2020-05-05 10:08:42', '2020-05-05 10:08:42'),
('3f549c03-c923-48ba-9c0f-aaf833be9c51', 'App\\Notifications\\mailNotification', 'App\\User', 1, '{\"order_id\":null}', NULL, '2020-04-19 12:39:55', '2020-04-19 12:39:55'),
('49809c4c-8bbf-4066-ba77-f77bb404fec9', 'App\\Notifications\\mailNotification', 'App\\User', 1, '{\"order_id\":null}', NULL, '2020-05-13 13:25:25', '2020-05-13 13:25:25'),
('52af2de0-6db4-488f-a437-275f0daa6719', 'App\\Notifications\\mailNotification', 'App\\User', 1, '{\"order_id\":null}', NULL, '2020-04-29 14:33:42', '2020-04-29 14:33:42'),
('52f3b893-3b18-4018-83fe-aaf234f03d59', 'App\\Notifications\\mailNotification', 'App\\User', 1, '{\"order_id\":null}', NULL, '2020-04-20 02:30:24', '2020-04-20 02:30:24'),
('5400e9f7-6b95-4299-8a00-7fcddc180201', 'App\\Notifications\\mailNotification', 'App\\User', 1, '{\"order_id\":null}', NULL, '2020-05-05 09:34:58', '2020-05-05 09:34:58'),
('71bcff19-5513-4ed9-9b73-8a4f1662073b', 'App\\Notifications\\mailNotification', 'App\\User', 1, '{\"order_id\":null}', NULL, '2020-04-19 12:36:00', '2020-04-19 12:36:00'),
('ba7d3372-e785-4d8a-b5b5-bbd29a98949e', 'App\\Notifications\\mailNotification', 'App\\User', 1, '{\"order_id\":null}', NULL, '2020-04-20 02:25:01', '2020-04-20 02:25:01'),
('d16320e5-6677-415f-a566-3e3ed3c24cfc', 'App\\Notifications\\mailNotification', 'App\\User', 1, '{\"order_id\":null}', NULL, '2020-04-26 14:11:07', '2020-04-26 14:11:07'),
('dd50eda8-c559-4121-b63c-5e04569951c9', 'App\\Notifications\\mailNotification', 'App\\User', 1, '{\"order_id\":null}', NULL, '2020-04-19 12:46:38', '2020-04-19 12:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('006dceca25b26c21581f2c8439f504559c3bffec941f474b1f46f77c17ab9d061ba0cd5c26a8cac8', 1, 1, 'usertoken', '[]', 0, '2020-05-25 09:26:12', '2020-05-25 09:26:12', '2021-05-25 12:26:12'),
('035e365a5ad92bfe1e7b9c6cbbfd72a0fdb8cc4f120d89f2743a0f419593ca16cab91356f60c6d9b', 2, 1, 'orderToken', '[]', 0, '2020-04-19 12:46:39', '2020-04-19 12:46:39', '2021-04-19 15:46:39'),
('0440494f33eeebfc27f8f4ab165dc59fbeb7b454957452fb6671a5e08200a5dd6ab605e28de40c0c', 1, 1, 'usertoken', '[]', 0, '2020-05-29 10:12:16', '2020-05-29 10:12:16', '2021-05-29 13:12:16'),
('04d8542ff2a1514ecd36d11b1a234a470b070cea05814a4072eb8a9c9110a094eab511e6abf5cb6b', 3, 1, 'orderToken', '[]', 0, '2020-04-29 14:33:44', '2020-04-29 14:33:44', '2021-04-29 17:33:44'),
('0529a9df22dc622801bb0655114fcb8cef237815a8060c2c071039fcea647ec20d9ec0a04b34e154', 1, 1, 'usertoken', '[]', 0, '2020-05-29 20:01:34', '2020-05-29 20:01:34', '2021-05-29 23:01:34'),
('057d6b6d9969fdcd689d4d3dbdf3a06a96584f5db8494cf40417f6e87f096af72efa8854c2228ed1', 4, 1, 'orderToken', '[]', 0, '2020-05-29 08:34:59', '2020-05-29 08:34:59', '2021-05-29 11:34:59'),
('05ae4c3d5b2b72cf17fcd54199445d0d9e95ad5973ae78fdf37720c75d173c941788231d0a1f65a5', 6, 1, 'usertoken', '[]', 0, '2020-05-27 05:55:22', '2020-05-27 05:55:22', '2021-05-27 08:55:22'),
('05e5f9c7b6867c82e67d5ab8d5f12b2cb7456f0701f771f1d649d40a7a733e3b565c81fd6ad10512', 21, 1, 'orderToken', '[]', 0, '2020-05-27 05:10:44', '2020-05-27 05:10:44', '2021-05-27 08:10:44'),
('066300f4121fce00c0a60d3b093b191293dccd4d6cd1ce45aff5ad048f3e14444b300e2a6b2b78da', 10, 1, 'orderToken', '[]', 0, '2020-05-20 13:10:15', '2020-05-20 13:10:15', '2021-05-20 16:10:15'),
('0918569f165213cf70ad533446fe505bf4553d89464926a59a179bed448efe6b62dd9bae8cf3b419', 1, 1, 'usertoken', '[]', 0, '2020-05-29 09:43:00', '2020-05-29 09:43:00', '2021-05-29 12:43:00'),
('0a07cef8f54432b4f64c33875838ea67e4841136964b93faefa64507fbf2ff59dfec1e56e92637ed', 1, 1, 'usertoken', '[]', 0, '2020-06-04 02:25:04', '2020-06-04 02:25:04', '2021-06-04 05:25:04'),
('0b10b8c7ebc9ca4a04dbbf061f7f3a379925fc9b32e2a25e2c0bb6cbae4b3be1d31e6cf1e8791b93', 11, 1, 'orderToken', '[]', 0, '2020-05-25 11:22:20', '2020-05-25 11:22:20', '2021-05-25 14:22:20'),
('0b54abf3faa19d1b53f69f2439ba734a78f53e540b13fa4435d6b005393d1b4c5bf444c564e05aae', 1, 1, 'usertoken', '[]', 0, '2020-05-25 12:17:32', '2020-05-25 12:17:32', '2021-05-25 15:17:32'),
('0d1a913e28c8004b7aee95a5aa3527bbe1e6c9160b999e09ca17664cfeb26a57dfa92c3216d03162', 1, 1, 'usertoken', '[]', 0, '2020-06-03 16:25:13', '2020-06-03 16:25:13', '2021-06-03 19:25:13'),
('0d271424563014e0ad5a042f29e92229463c85c6f5a7d644436406cdc314bbe426cc38e193d2b4f2', 1, 1, 'usertoken', '[]', 0, '2020-05-31 18:27:41', '2020-05-31 18:27:41', '2021-05-31 21:27:41'),
('0dac2d2f5a8a028f88d9a89f82d12e8d172b4e4f549afd2be8320e57a61da6e4fef630330ff8f048', 3, 1, 'orderToken', '[]', 0, '2020-04-19 12:52:06', '2020-04-19 12:52:06', '2021-04-19 15:52:06'),
('0dca2225507ac0a867279038480979fb7eb8cc2f303b6495b934c0ccb020fd5d27dcddabfcda18d9', 1, 1, 'usertoken', '[]', 0, '2020-06-11 08:48:01', '2020-06-11 08:48:01', '2021-06-11 11:48:01'),
('0e95477f292618e30f393a700006c551e6f522973dd3e18c9cd8167a8abd9c818c571a8a4f55bde1', 3, 1, 'usertoken', '[]', 0, '2020-05-27 05:48:10', '2020-05-27 05:48:10', '2021-05-27 08:48:10'),
('100a8fb589576902df675488e825da7f703099eab4093b0b59f00d1ae96fbe03cf62404c15c168bc', 4, 1, 'orderToken', '[]', 0, '2020-05-05 09:34:59', '2020-05-05 09:34:59', '2021-05-05 12:34:59'),
('10fef8da448fc789db3d31398b97221c23643cf834bf66e8cf6b7645e1136ce9052174afa3fd12fd', 1, 1, 'usertoken', '[]', 0, '2020-05-11 16:47:58', '2020-05-11 16:47:58', '2021-05-11 19:47:58'),
('114aaaeef70d63000c52ed5dce06b7b64021665a4ba160ff7de5caf4e0ec501acce3731fed21da62', 1, 1, 'usertoken', '[]', 0, '2020-04-26 12:01:42', '2020-04-26 12:01:42', '2021-04-26 15:01:42'),
('116782df5ef90c5702e7979bbef4ad635070a17c58ef3cf8d6c17d7dfb770fba59c6748bbfff6c53', 1, 1, 'usertoken', '[]', 0, '2020-05-18 13:49:50', '2020-05-18 13:49:50', '2021-05-18 16:49:50'),
('123f2019538c493f52d96dfeec2a22dc8d667700545da864841dd22707fec22a0a24591357fdb3ae', 32, 1, 'orderToken', '[]', 0, '2020-06-03 08:36:47', '2020-06-03 08:36:47', '2021-06-03 11:36:47'),
('14f7d6c3404496d841ec50e893b4c9ff30d5fddc43a213d611d8db3d2e16e070caf9da7ef2687166', 1, 1, 'usertoken', '[]', 0, '2020-06-04 06:24:02', '2020-06-04 06:24:02', '2021-06-04 09:24:02'),
('15d8e2df2c76acbe0fa9140c45c36c1029bf01c177758efd9d146c028e8a6474b6586d4cebea0c4a', 1, 1, 'usertoken', '[]', 0, '2020-05-31 19:05:10', '2020-05-31 19:05:10', '2021-05-31 22:05:10'),
('15fbf5be8911517e12d5bfaf89e476d0b48b37f7810475edb0045ecd751693fe28c5f5e08f6ffe01', 4, 1, 'orderToken', '[]', 0, '2020-05-05 10:08:44', '2020-05-05 10:08:44', '2021-05-05 13:08:44'),
('16cc762e2e8cffbfbaede77d5e7eb1211748bdc878d7040924396961c2b604575eaebb8a94fa9b4f', 1, 1, 'usertoken', '[]', 0, '2020-05-25 09:30:12', '2020-05-25 09:30:12', '2021-05-25 12:30:12'),
('1798e7ff34ed632da8ca5605b842384765f977f40a29f6937045dab34539d160ec91b819994b5555', 8, 1, 'orderToken', '[]', 0, '2020-05-31 03:44:36', '2020-05-31 03:44:36', '2021-05-31 06:44:36'),
('18eadb62c7ffea93bbcc2b69606849aa739f859f0abaac12ead95569b1fa3c64817b1106db35defd', 5, 1, 'orderToken', '[]', 0, '2020-05-25 06:57:26', '2020-05-25 06:57:26', '2021-05-25 09:57:26'),
('19147ee10b23c810e8a352795f4a99fb00c907da0c058785818b65514e24273f917d105d2e59eae3', 1, 1, 'usertoken', '[]', 0, '2020-06-03 04:44:01', '2020-06-03 04:44:01', '2021-06-03 07:44:01'),
('1966747fcc6890f62615a936a351dc3e4de76b79ccbb22d418089bbc47687388d7012fb313547184', 1, 1, 'usertoken', '[]', 0, '2020-05-28 13:38:29', '2020-05-28 13:38:29', '2021-05-28 16:38:29'),
('197bba3d404e421eb64c8545b56cabb5d8b165e1a8127361c0d2593a2437a6c6fa03543fe0a500dc', 1, 1, 'usertoken', '[]', 0, '2020-05-19 08:53:53', '2020-05-19 08:53:53', '2021-05-19 11:53:53'),
('1a6ff672501cf5a9e98770e901527ae8bd95ff549f1d9920a220c9886932ec5c31d96abcffdd2735', 10, 1, 'usertoken', '[]', 0, '2020-06-04 06:21:10', '2020-06-04 06:21:10', '2021-06-04 09:21:10'),
('1af8f8addb6f739bd048dd4354e15c43619a2b4749c71cef71ff79047756fe405eba69b9a14d7184', 1, 1, 'usertoken', '[]', 0, '2020-06-11 08:42:09', '2020-06-11 08:42:09', '2021-06-11 11:42:09'),
('1ee1faa7c44e5736b8538e663831b59b3407f7c31d0face1d68cc7c5be8f39471ce6c619821ccc4f', 28, 1, 'orderToken', '[]', 0, '2020-05-27 06:07:19', '2020-05-27 06:07:19', '2021-05-27 09:07:19'),
('1f3a0f834576424ee963c919b6bb06d1b3d82c85f849cacd5c738e7d907163685fb272deb58f3ef8', 1, 1, 'usertoken', '[]', 0, '2020-05-21 10:22:30', '2020-05-21 10:22:30', '2021-05-21 13:22:30'),
('21d681635d0f527ef6c77b0a952b6bc4d22618f2b564eb4d789a044782784d24e382cb88497c98ad', 3, 1, 'usertoken', '[]', 0, '2020-05-31 03:42:51', '2020-05-31 03:42:51', '2021-05-31 06:42:51'),
('23548b6d1995a091925f6c6d2821a7ad68cbd4e4a77c92bc47584b7132a03eefe46713b64ece982e', 2, 1, 'orderToken', '[]', 0, '2020-05-17 08:56:41', '2020-05-17 08:56:41', '2021-05-17 11:56:41'),
('235c870bb8bcb5b20eefd7e3730c692c1e2524728808f2fbc61042d56b4304625b24b7286484c956', 3, 1, 'usertoken', '[]', 0, '2020-06-06 15:21:06', '2020-06-06 15:21:06', '2021-06-06 18:21:06'),
('23ab4f7ab57ad283525f1e6aa68cd564e384a509cc357d359b33ee0757059cb7f82c3231bad79f15', 3, 1, 'usertoken', '[]', 0, '2020-05-31 16:33:11', '2020-05-31 16:33:11', '2021-05-31 19:33:11'),
('23e45ed4dc22563ef4998c9812d142f969ba51acdd90132bf484c29dccfc446921912f3440eac2e0', 1, 1, 'usertoken', '[]', 0, '2020-05-29 09:45:32', '2020-05-29 09:45:32', '2021-05-29 12:45:32'),
('249a94736c27e71f59768038e43e37f6ebbd34b92e998346737a990598e9587c5cf382c1b9de98d9', 46, 1, 'orderToken', '[]', 0, '2020-06-05 04:41:32', '2020-06-05 04:41:32', '2021-06-05 07:41:32'),
('266d2bcb1e3fca1962f64c6f1441b55e86c225200546c4afd99cba0ac922319ae856567451acef50', 3, 1, 'orderToken', '[]', 0, '2020-05-25 02:24:18', '2020-05-25 02:24:18', '2021-05-25 05:24:18'),
('28547f0353337497b7b8799002c7d9664be22b89ceb642e011f0ecdddbc9f38ba28e24c86e18b191', 1, 1, 'usertoken', '[]', 0, '2020-05-19 08:36:42', '2020-05-19 08:36:42', '2021-05-19 11:36:42'),
('28d59b201a5f923bcd6575c2c45e6e94ca795b30f3435fb5668028ccc624ee2231c430c0c4d03d7a', 1, 1, 'usertoken', '[]', 0, '2020-05-16 14:08:21', '2020-05-16 14:08:21', '2021-05-16 17:08:21'),
('290cc20884c6c6e6f0a81c3430f6e8f76894535f51881aa66b9be9cb249b87a7b97b102a4545d077', 23, 1, 'orderToken', '[]', 0, '2020-06-02 15:30:49', '2020-06-02 15:30:49', '2021-06-02 18:30:49'),
('29a902f03df3431423e00a7f260e6aa2e45d851cecd71e989dbdef00b4dd230bba54d28c427902cc', 24, 1, 'orderToken', '[]', 0, '2020-06-02 15:31:25', '2020-06-02 15:31:25', '2021-06-02 18:31:25'),
('2b5e171f691cd4db8ee2d9ee400741dbd7a1a5e8bf6a68dcfb43e0e9b2c98d63019345d01b0b270a', 45, 1, 'orderToken', '[]', 0, '2020-06-05 04:32:58', '2020-06-05 04:32:58', '2021-06-05 07:32:58'),
('2f078a7c2ab14fe7d3b762b39f01c8d539c1ef8b0cabb927f179ca3d38ddfc9a2bee0fb9646fd9d8', 1, 1, 'usertoken', '[]', 0, '2020-06-11 08:53:43', '2020-06-11 08:53:43', '2021-06-11 11:53:43'),
('2fd1ff9784b708426236694832a8a74d8ba6aeacc8340ebed1b548ccc5743991384e3e5a258baa21', 20, 1, 'orderToken', '[]', 0, '2020-05-27 04:45:11', '2020-05-27 04:45:11', '2021-05-27 07:45:11'),
('319435fed476784a4aa8a94d2483781e7e4f49105e80913e9556230091a4b366b675eeaa23a519cb', 1, 1, 'usertoken', '[]', 0, '2020-06-11 08:53:10', '2020-06-11 08:53:10', '2021-06-11 11:53:10'),
('326a46b60bb275990132058a0940941cea2cbc6351076afd837c8f650908aac591ff0cc53b89582b', 1, 1, 'usertoken', '[]', 0, '2020-05-14 13:17:35', '2020-05-14 13:17:35', '2021-05-14 16:17:35'),
('33cf1cd93cb6543b39c973c3b8da704284a6a91d3dfdcc0a97e0dcf371ad321f319e0da3a95555ca', 1, 1, 'usertoken', '[]', 0, '2020-05-25 09:31:18', '2020-05-25 09:31:18', '2021-05-25 12:31:18'),
('34193084457ffdcf5c8776b4e022bb52c73b9d5312fc8d85bf10e906fe2a33dca783e77370d58eb1', 1, 1, 'usertoken', '[]', 0, '2020-05-25 09:08:24', '2020-05-25 09:08:24', '2021-05-25 12:08:24'),
('37140e33f8a6bc33b14dc360abf35c536495b97136b51a27825d91ff058eacc40bd080418772d071', 1, 1, 'usertoken', '[]', 0, '2020-06-03 12:45:01', '2020-06-03 12:45:01', '2021-06-03 15:45:01'),
('39eced57dd81c42466dfca72405b7dfd3925cba1b636d0c79a1b2ff17c6e4e7ce9d568483e9105a3', 1, 1, 'usertoken', '[]', 0, '2020-06-04 04:01:23', '2020-06-04 04:01:23', '2021-06-04 07:01:23'),
('3ac0bc71b0141e7e06c9a11a83757dead04ce643912a2e871a662df2b019a4d2fca84907036fcfb6', 3, 1, 'usertoken', '[]', 0, '2020-05-31 07:54:06', '2020-05-31 07:54:06', '2021-05-31 10:54:06'),
('3c705882d7f83e83ee9536da26fe164b0acc20de74b93e71e19f86332d0064d248e882ae968ecb5c', 1, 1, 'orderToken', '[]', 0, '2020-04-19 12:39:57', '2020-04-19 12:39:57', '2021-04-19 15:39:57'),
('3d10ed0bdc5a30cc5552be5c1eacbff8b66773edb0bba2a4a37cdeb7574d0859cc338e32e0a31ee4', 1, 1, 'usertoken', '[]', 0, '2020-06-03 03:51:18', '2020-06-03 03:51:18', '2021-06-03 06:51:18'),
('3f1dd9084b4965474cb38170e8b6e0855a49c7d236527c404f4d6ad5e39e863ed8ac4c5b65898ebd', 10, 1, 'orderToken', '[]', 0, '2020-05-25 08:40:09', '2020-05-25 08:40:09', '2021-05-25 11:40:09'),
('3fb46993cbd4d058b8e2fe7791dc72a0e848fe942da5c0eaa8b8ed351f683d0b6692004128c5c2ec', 15, 1, 'orderToken', '[]', 0, '2020-05-25 17:10:17', '2020-05-25 17:10:17', '2021-05-25 20:10:17'),
('40e207e602b322ba0af16323dff92f021391afc2fb5e8ff068299692ee4fba9fb9c88c7fb9b8f5d8', 1, 1, 'usertoken', '[]', 0, '2020-05-31 15:18:54', '2020-05-31 15:18:54', '2021-05-31 18:18:54'),
('41cef610f24908da13fb4acebd1dcd549f35c1abe74a9760534072140e07e67c01db46441902a7ef', 22, 1, 'orderToken', '[]', 0, '2020-05-27 05:41:29', '2020-05-27 05:41:29', '2021-05-27 08:41:29'),
('4267538970b35e0dc858efb68759a942492730c8643110dc21c1ff4a99472166c596c9997fe3dcc2', 41, 1, 'orderToken', '[]', 0, '2020-06-04 06:32:37', '2020-06-04 06:32:37', '2021-06-04 09:32:37'),
('43c141996d501567a508c534aadab3e151efb650d57a167b914d5e6e753a960f65072eafe3927f3c', 2, 1, 'orderToken', '[]', 0, '2020-05-29 06:34:46', '2020-05-29 06:34:46', '2021-05-29 09:34:46'),
('443ede8644148f5635a304f7e17f4ff847e811215545774af6af28aad9649780e18e35af336d069e', 6, 1, 'orderToken', '[]', 0, '2020-05-13 15:35:34', '2020-05-13 15:35:34', '2021-05-13 18:35:34'),
('4587a50d6d96f9efec1ea29181c114ee263f3c7c4f94f30c56f50659390e5e2759835e10c0ad0cd2', 5, 1, 'orderToken', '[]', 0, '2020-05-29 08:36:27', '2020-05-29 08:36:27', '2021-05-29 11:36:27'),
('4596295af4910ae1932e1ab25c60cf0d5be0b86749baa494f1b98e969c4b177a4ae00abc12a31603', 1, 1, 'usertoken', '[]', 0, '2020-06-11 08:46:37', '2020-06-11 08:46:37', '2021-06-11 11:46:37'),
('45a7f892191de9662b7823df8531c0a7db5b36041a5a220efababa6d1b2ae9efc96a672990389d09', 62, 1, 'orderToken', '[]', 0, '2020-06-10 13:26:04', '2020-06-10 13:26:04', '2021-06-10 16:26:04'),
('4660088f91a578dbbfadc589b9da718a36c1d895b3ce794c99cda18d584c5f5bcc474ef2dea57ba2', 1, 1, 'usertoken', '[]', 0, '2020-05-30 04:38:10', '2020-05-30 04:38:10', '2021-05-30 07:38:10'),
('4661308ed6bb56728eb9a02bb6e460a8115cd1f611a5456a8589788e3596b08ed8ab3ae17e0727af', 1, 1, 'usertoken', '[]', 0, '2020-05-29 19:29:00', '2020-05-29 19:29:00', '2021-05-29 22:29:00'),
('477e0eb2c3b3f91ad8c61e687c56cd8d42cc3b513fa543e2713af7a40d1f253c70b6ab90fc927413', 18, 1, 'orderToken', '[]', 0, '2020-06-02 03:21:30', '2020-06-02 03:21:30', '2021-06-02 06:21:30'),
('49138d37b6ed37ddaf8a2035a9e08851df550421ae28c123214685b1ffd258ac84b0b585839d3a81', 34, 1, 'orderToken', '[]', 0, '2020-06-03 13:58:39', '2020-06-03 13:58:39', '2021-06-03 16:58:39'),
('4cbf24ca4bd3486863daf47ed3a4dbb536097db1e005429afe5aa25be0c2afde735e7f6fe4bdbe5b', 3, 1, 'usertoken', '[]', 0, '2020-05-27 05:24:09', '2020-05-27 05:24:09', '2021-05-27 08:24:09'),
('4d22b0426d76d85923a92a8473c558df687a735ce12e80a265d431be240c33bf0919ab6a09ef0f6a', 1, 1, 'usertoken', '[]', 0, '2020-06-03 12:51:03', '2020-06-03 12:51:03', '2021-06-03 15:51:03'),
('4f07da673745ec222b42afce707693aec38d0ba202d15ce4841ab384d634aa0b1ea772468e0f018d', 5, 1, 'usertoken', '[]', 0, '2020-05-27 04:44:00', '2020-05-27 04:44:00', '2021-05-27 07:44:00'),
('4fe8d40eb9df3efa67a85a185a25137cf62d92120b440841a3f23071a0dff46d3e0539655ffd1df5', 17, 1, 'orderToken', '[]', 0, '2020-05-25 17:12:23', '2020-05-25 17:12:23', '2021-05-25 20:12:23'),
('506032971cd6471f258d83d4e78f3c4f6b121764d7bde3743cfd7c8d60e9ee1267b124f60970898d', 1, 1, 'usertoken', '[]', 0, '2020-05-18 13:53:43', '2020-05-18 13:53:43', '2021-05-18 16:53:43'),
('52335d1c286686e7cc53c798337c4f301ff5e49e0ba52a9f1c66280525200cc1fc90e2a409a86943', 1, 1, 'usertoken', '[]', 0, '2020-05-19 16:11:08', '2020-05-19 16:11:08', '2021-05-19 19:11:08'),
('537efe32efc725947c6bf85814ed2f6dd6c72391d9f36bfba1710e30e1144c6899e79d0355fd470e', 1, 1, 'usertoken', '[]', 0, '2020-05-31 15:30:06', '2020-05-31 15:30:06', '2021-05-31 18:30:06'),
('583a729e083951f0d3b420d9a9265d9b87c7a27b8a8cce2c6f82afdb4cec33afa3698ac644ccb9b9', 1, 1, 'usertoken', '[]', 0, '2020-05-29 09:19:30', '2020-05-29 09:19:30', '2021-05-29 12:19:30'),
('58de9b5283f714845c0c2ff4a130db018cf7ae30718baf16f91dbcf41046b246042df9a6d2113b34', 56, 1, 'orderToken', '[]', 0, '2020-06-06 17:27:00', '2020-06-06 17:27:00', '2021-06-06 20:27:00'),
('59f2f78072b5f4ae3a1a0471ec99ac06673e5e5ea800b0e122e0fb00a7b24aafbceb24beffc29c2c', 14, 1, 'orderToken', '[]', 0, '2020-05-25 11:29:20', '2020-05-25 11:29:20', '2021-05-25 14:29:20'),
('5ba6031401c2e8c4ebba058c2b884f0fdb59e0a7014ba8ead356e725e0da9f292a2fb29c645d66be', 1, 1, 'usertoken', '[]', 0, '2020-05-25 09:25:13', '2020-05-25 09:25:13', '2021-05-25 12:25:13'),
('5f9a46d9d38e3bf539ae45d75a17d738cc1a7d2ee2fdc231a80060ef8de8d1e9a6f8659896a5f72d', 1, 1, 'usertoken', '[]', 0, '2020-05-29 18:35:05', '2020-05-29 18:35:05', '2021-05-29 21:35:05'),
('5fa57c142b7c008b8e35e34b67972b59b8e4653bb67e545e7565fca4c78de4bac542603caef13533', 1, 1, 'usertoken', '[]', 0, '2020-05-18 15:38:48', '2020-05-18 15:38:48', '2021-05-18 18:38:48'),
('604405049762ceb5fc8dba46598d5d438dbdfd5da0f21f9617e6c49bb551cef26d5bc593901357dc', 1, 1, 'usertoken', '[]', 0, '2020-05-26 09:46:29', '2020-05-26 09:46:29', '2021-05-26 12:46:29'),
('614f35d6045880d598ee9c083b0d12ed1ab36db626e94f346235b1e35c04b48ab22a3e3ea17f7886', 12, 1, 'orderToken', '[]', 0, '2020-05-13 15:51:51', '2020-05-13 15:51:51', '2021-05-13 18:51:51'),
('6169dfe9d480181bd334e9c8507937b326361f756e548107fe1ce8871e258ff9edc64bc90ca7cb9d', 1, 1, 'usertoken', '[]', 0, '2020-06-03 13:02:31', '2020-06-03 13:02:31', '2021-06-03 16:02:31'),
('63b2e1069cc6a1b5a10c24329dfd19dd9ddaf2c176ad06e29f3e2443fcdfd277748fa9479ce1038f', 1, 1, 'usertoken', '[]', 0, '2020-06-04 03:31:19', '2020-06-04 03:31:19', '2021-06-04 06:31:19'),
('63dfda989d15433feac76c717471d55bba8c9ba26e48e274944e21c7a1a15c98fe0baf0998e6415d', 1, 1, 'orderToken', '[]', 0, '2020-05-29 05:54:42', '2020-05-29 05:54:42', '2021-05-29 08:54:42'),
('643a18c4ca04f3a6582338d9ade33a24f4684be86c5e722f706107a8a584e56913c41d21febcc8c1', 1, 1, 'orderToken', '[]', 0, '2020-05-17 08:53:38', '2020-05-17 08:53:38', '2021-05-17 11:53:38'),
('659ed0e3af62e9ff818fdf1271b231b1a51b96a95fc41e20c89d3af1db62df7781a110a34f863b72', 1, 1, 'usertoken', '[]', 0, '2020-06-05 12:20:34', '2020-06-05 12:20:34', '2021-06-05 15:20:34'),
('65bf929acd59ccc05167689ca941f2b949cfce899a86cb49dbcdc946bf270694f75ebd749d218784', 1, 1, 'usertoken', '[]', 0, '2020-05-19 08:45:28', '2020-05-19 08:45:28', '2021-05-19 11:45:28'),
('66ada34b01eca11c5ec303dae0f2523739dec1ca6cc53683d6835f6c680715268d4ab1b3f4c4107b', 1, 1, 'usertoken', '[]', 0, '2020-06-05 11:34:25', '2020-06-05 11:34:25', '2021-06-05 14:34:25'),
('670c5625501d62241f6b4ec829c39ad3ccfd443aef833ff36955e07f6e6264d36f942068076a8c51', 1, 1, 'usertoken', '[]', 0, '2020-05-29 06:48:07', '2020-05-29 06:48:07', '2021-05-29 09:48:07'),
('680367c6eee323259d800c08e8b9e822d2e788d0496d876a120275106f06e91b0bb2b96f7742bfde', 1, 1, 'usertoken', '[]', 0, '2020-04-26 03:11:24', '2020-04-26 03:11:24', '2021-04-26 06:11:24'),
('68bcdc71744d307b5db49ee642d55535dcba2526ea264c7317bef7400fe50e51272bf252fcf1998e', 1, 1, 'usertoken', '[]', 0, '2020-05-29 17:02:32', '2020-05-29 17:02:32', '2021-05-29 20:02:32'),
('68dcae60bbdc4701a9faa18a9e4825467a786a0d1d5d9ebe74c45b88a8880d7091649d3c7d7670fc', 1, 1, 'usertoken', '[]', 0, '2020-06-02 17:14:02', '2020-06-02 17:14:02', '2021-06-02 20:14:02'),
('690b6d03d524f3f1764d5ec17e3b840cb681c122ed44d0017afd8eb94c4d66560eb3a6d1fe8a8f11', 6, 1, 'usertoken', '[]', 0, '2020-05-27 06:44:42', '2020-05-27 06:44:42', '2021-05-27 09:44:42'),
('6958543e060ebed4d25986a9cc40f3482da63f08e42e55e55fbb04787786e141ac3f2cd5e5a9086a', 1, 1, 'usertoken', '[]', 0, '2020-05-19 16:11:20', '2020-05-19 16:11:20', '2021-05-19 19:11:20'),
('6980fdf490b0b043a4da4712b54fea40aef8c50beaec95e5d47c4a2d0aa44c8196eed2aa909f7ce3', 1, 1, 'usertoken', '[]', 0, '2020-06-04 05:27:16', '2020-06-04 05:27:16', '2021-06-04 08:27:16'),
('69bb7b18f60fbcbc15e037f3cf0ea8f7344167216f47835ef1f3c25838ef7d5a179bf33796cc742f', 1, 1, 'usertoken', '[]', 0, '2020-06-02 15:28:13', '2020-06-02 15:28:13', '2021-06-02 18:28:13'),
('6bf5fc87ee85696aaeb33a494c0c185474c0bc302355a097363476d6fb0cdb9f8758428b19ecea48', 1, 1, 'usertoken', '[]', 0, '2020-06-01 15:12:05', '2020-06-01 15:12:05', '2021-06-01 18:12:05'),
('6c7e887c3e9043b83e5120c69cf094f2c5a82146847ff601f216bac7286524fc31bad9654791b51b', 1, 1, 'usertoken', '[]', 0, '2020-04-19 03:24:23', '2020-04-19 03:24:23', '2021-04-19 06:24:23'),
('6d7b56fef83f3e4aa62654e790bdf5d49c4901373f766db6552fc4c01d1c0f27d26ee9c5bfefbc24', 1, 1, 'usertoken', '[]', 0, '2020-05-28 13:56:15', '2020-05-28 13:56:15', '2021-05-28 16:56:15'),
('70a678f80ab71ba5e688ac4c492bb7ba1cef586a41e0a63a12231a099b6e9c22c6856d7cd5a104eb', 1, 1, 'usertoken', '[]', 0, '2020-05-31 19:26:49', '2020-05-31 19:26:49', '2021-05-31 22:26:49'),
('713a129318a25e7c6578cbc6a2f5432d163cd0cf9e6359b19384b0a74bce2be82b72235bde1e588c', 1, 1, 'usertoken', '[]', 0, '2020-05-25 12:12:32', '2020-05-25 12:12:32', '2021-05-25 15:12:32'),
('71dac00adcea79d6ac3c08a396330203cfb84251d80a9fd9bf634b56a5aae31f047607cb5fa47c79', 1, 1, 'usertoken', '[]', 0, '2020-05-25 12:08:51', '2020-05-25 12:08:51', '2021-05-25 15:08:51'),
('7245f6e3853d774ef899926f76e445023cdfbd64fb1792671f5461bc8258bb5f4552f55dace39788', 2, 1, 'orderToken', '[]', 0, '2020-05-29 06:00:09', '2020-05-29 06:00:09', '2021-05-29 09:00:09'),
('757c92531e4a4ac46f8bf52d03f82010d7188de0499e1f0a28f6a0fd11e4a874340351d2d7d3d54e', 1, 1, 'usertoken', '[]', 0, '2020-06-03 12:52:19', '2020-06-03 12:52:19', '2021-06-03 15:52:19'),
('76b1032cc34b1d660398fa8b56031ae57fd6b8fb623f94845eb2704970c18337c607bde8b830b696', 16, 1, 'orderToken', '[]', 0, '2020-05-25 17:11:32', '2020-05-25 17:11:32', '2021-05-25 20:11:32'),
('79306a030953dee9b68e628fa16e82a0b3b9e147c9abbef64c820caeae0e11435dcb7785da9c9a0a', 1, 1, 'usertoken', '[]', 0, '2020-05-18 15:34:39', '2020-05-18 15:34:39', '2021-05-18 18:34:39'),
('7985571c0de7cccd9889e6e10333ba51bf374801c434d518d052694feb9586b0ce326b8f87d80542', 1, 1, 'usertoken', '[]', 0, '2020-05-25 09:10:31', '2020-05-25 09:10:31', '2021-05-25 12:10:31'),
('7a89928da24633bcfdafaa3ee962a5bd44813b9106456705b1a4228388879293c672bf814078349f', 1, 1, 'usertoken', '[]', 0, '2020-05-31 16:23:27', '2020-05-31 16:23:27', '2021-05-31 19:23:27'),
('7a9a0a0e91a593818a1783de44280edc444cd313903192e331f450498c0b598cd917615c3acd445b', 26, 1, 'orderToken', '[]', 0, '2020-06-02 15:42:36', '2020-06-02 15:42:36', '2021-06-02 18:42:36'),
('7b76c5207ced8e085764be6e530a210d02f57e13e546ca3c6b20059ae76127eed464b8565f64d328', 3, 1, 'usertoken', '[]', 0, '2020-05-27 05:09:56', '2020-05-27 05:09:56', '2021-05-27 08:09:56'),
('7bdc14b424b079e4a7a22b7f81e27fb0d2cd9110c4e6c79bcdfffac907f0d3e654bf426fce6753ce', 7, 1, 'usertoken', '[]', 0, '2020-06-04 05:15:32', '2020-06-04 05:15:32', '2021-06-04 08:15:32'),
('7c2e922ab3d3cfe30111bc65798f17e55b43bec8d503f84c21bea525e36c22a43d6985408ed1a331', 1, 1, 'usertoken', '[]', 0, '2020-05-25 09:17:38', '2020-05-25 09:17:38', '2021-05-25 12:17:38'),
('7c8345cc818323b94d2cb4157e53567b08605e7ad05ac5c36c84ef3d323f0a7ba9606c6aa0baae91', 2, 1, 'orderToken', '[]', 0, '2020-04-26 14:11:08', '2020-04-26 14:11:08', '2021-04-26 17:11:08'),
('7cbe4da0c468d0ddcfadb72d1daaaf896c7291f17524dea6cb27ac0826d77ea0e61cc974fc43ba65', 1, 1, 'usertoken', '[]', 0, '2020-05-25 12:10:49', '2020-05-25 12:10:49', '2021-05-25 15:10:49'),
('7ce183a40b5aeef01fd12cdef98a0b91c9acc0c7658029e257adaddcfd5c40b3f7cf12693c700410', 1, 1, 'usertoken', '[]', 0, '2020-05-29 05:53:42', '2020-05-29 05:53:42', '2021-05-29 08:53:42'),
('80519eebad05b5a0915f93d33538b3b3ebb2f8ef8ecf439e9a77e2a896cf5ff358c30720eb9beb15', 4, 1, 'orderToken', '[]', 0, '2020-05-17 14:56:51', '2020-05-17 14:56:51', '2021-05-17 17:56:51'),
('829ff805cd763455ef5f7d4b6ac94078621812e171d1bc85b1404d91bc72296c7e1fb629f75dc8d8', 12, 1, 'orderToken', '[]', 0, '2020-05-21 10:24:51', '2020-05-21 10:24:51', '2021-05-21 13:24:51'),
('82df1f2c22a40c171d055dc7a361e88bab42d0ecdf5a5a99e567fdbbc2cf4b2a0569934e291d6a9c', 6, 1, 'orderToken', '[]', 0, '2020-05-25 07:03:14', '2020-05-25 07:03:14', '2021-05-25 10:03:14'),
('831a9ee152cf17c1b1d311d52d9b917ae6d8c0120111ff2ee31780433e921f8cb769a94fc9d0f804', 23, 1, 'orderToken', '[]', 0, '2020-05-27 06:00:29', '2020-05-27 06:00:29', '2021-05-27 09:00:29'),
('83cc036ed8169ab98ee679eed1fd9fc8c0efabaa72cb51088a3250eae0e21f8321166d14505dbea9', 4, 1, 'orderToken', '[]', 0, '2020-05-25 05:55:30', '2020-05-25 05:55:30', '2021-05-25 08:55:30'),
('849cc5ed6a515d2f2bc2861a6b6347b472e744b0aed4bda95942bfb92f9cfb3208152546f1ccc833', 7, 1, 'usertoken', '[]', 0, '2020-05-27 05:58:28', '2020-05-27 05:58:28', '2021-05-27 08:58:28'),
('86b4a8896771c4d9d59fee47accc59906e99f4bc70ba511858a7f00a571508f73e9192e9e3005e36', 1, 1, 'usertoken', '[]', 0, '2020-04-20 02:07:32', '2020-04-20 02:07:32', '2021-04-20 05:07:32'),
('86b628eac43234b8791db78eb60de4f24fe4e9d5bfa9380e9616fc80761818e1129f891bab22c2af', 1, 1, 'usertoken', '[]', 0, '2020-05-25 09:06:19', '2020-05-25 09:06:19', '2021-05-25 12:06:19'),
('8750eea10b2133281bc22d0a24056fafb0557598244e977a4875a4a021a643df9100722b09e1ffaa', 1, 1, 'usertoken', '[]', 0, '2020-05-31 18:43:28', '2020-05-31 18:43:28', '2021-05-31 21:43:28'),
('882a96bf6074b96df9ac1d0e0d8f4813dfbd106109686ffeb82ac6e98a6a205c20cfd8923d3b1950', 8, 1, 'usertoken', '[]', 0, '2020-05-27 08:44:46', '2020-05-27 08:44:46', '2021-05-27 11:44:46'),
('8aee7a429e9572fcb212e3af8bac1f35a71eaca4b1acf688c49cc806525250c2967e61778e514894', 1, 1, 'usertoken', '[]', 0, '2020-05-25 17:07:39', '2020-05-25 17:07:39', '2021-05-25 20:07:39'),
('8c304e7519b7de1c1653e9babec84e7db9aae3dbe93cade666069dae9c01b80d092c351769eb25dc', 25, 1, 'orderToken', '[]', 0, '2020-06-02 15:36:30', '2020-06-02 15:36:30', '2021-06-02 18:36:30'),
('8cff99245260b8358bc1cc84d64cb872fa5cc3b4b4f19ae41ceeebf8c8bda4711afc2bd4b866a1ce', 37, 1, 'orderToken', '[]', 0, '2020-05-28 06:04:58', '2020-05-28 06:04:58', '2021-05-28 09:04:58'),
('8e9102150ee010fb68b1fcc092a5b5e3c877c0e91e93c1608df1fffb066d348051bd9ce0c020d937', 1, 1, 'usertoken', '[]', 0, '2020-05-19 08:56:09', '2020-05-19 08:56:09', '2021-05-19 11:56:09'),
('916318b96b3d7a761e578218bfbd032b2432cec7b7c7dc09deabe02374b5c8abf173a980c702cfa0', 1, 1, 'usertoken', '[]', 0, '2020-05-25 09:12:30', '2020-05-25 09:12:30', '2021-05-25 12:12:30'),
('91edc337f3b8734fad115671eb505d2f806d9707314d45fa8e819ac26dc9246ab2feddb05d81d04d', 1, 1, 'usertoken', '[]', 0, '2020-05-25 12:08:32', '2020-05-25 12:08:32', '2021-05-25 15:08:32'),
('960e79eca60ca8a2b1bf51cdd7c11417137e79e59fc6d26f9a13a5daf6ac16191f005608a330232d', 3, 1, 'orderToken', '[]', 0, '2020-05-17 09:03:04', '2020-05-17 09:03:04', '2021-05-17 12:03:04'),
('9866f705e8fa587376ef1ac1982e886743829d27ff6b7b21e43530cca0b4a2b4bd23044598a712f2', 1, 1, 'usertoken', '[]', 0, '2020-06-01 09:08:10', '2020-06-01 09:08:10', '2021-06-01 12:08:10'),
('99188466f91a882af2ad699779f1fde978c54f8ee4747dd3709418bb5363aba82e5edcb9d0158685', 1, 1, 'usertoken', '[]', 0, '2020-05-31 19:38:10', '2020-05-31 19:38:10', '2021-05-31 22:38:10'),
('9b7a572afb3a30bedf33962009c87ddadcb8acf244c77c7d0f309ca7fd96ed6bb99bd7b3a5cd14c7', 9, 1, 'orderToken', '[]', 0, '2020-05-25 08:35:24', '2020-05-25 08:35:24', '2021-05-25 11:35:24'),
('9cec69a9286aecfc2b93b931da7c1faa6095a943c93682dfde6602f8470cfebbcb5a5f816ca5e471', 1, 1, 'usertoken', '[]', 0, '2020-05-31 15:17:22', '2020-05-31 15:17:22', '2021-05-31 18:17:22'),
('9d49095a5a75b7997ad2b644808a24dd8a619d057d5f34c153b89998c26e6db56165897dc15abef9', 1, 1, 'usertoken', '[]', 0, '2020-05-11 15:27:13', '2020-05-11 15:27:13', '2021-05-11 18:27:13'),
('9e31345c832e57192afcf2db650997b9576d0ad71b3a7ad1536f2b005eb18bb64ba495ef9f7307df', 44, 1, 'orderToken', '[]', 0, '2020-06-05 04:26:55', '2020-06-05 04:26:55', '2021-06-05 07:26:55'),
('9e73352f07e35b7e530cb53521015a3ac738907be254c4a3856d2e38f44bdea98bb9904af679e64c', 1, 1, 'usertoken', '[]', 0, '2020-05-25 12:11:53', '2020-05-25 12:11:53', '2021-05-25 15:11:53'),
('9e80c997761e21a368d0529b7d7931e02b887b1a861c061ab6cf15cf1769d7e69dd52cb2bbee9602', 3, 1, 'usertoken', '[]', 0, '2020-06-04 04:45:04', '2020-06-04 04:45:04', '2021-06-04 07:45:04'),
('9ea5941307ac1f36f42a201186ca3fc5f5552407037df66d12528a84dabb9c8789fc28f90694aafc', 2, 1, 'orderToken', '[]', 0, '2020-05-25 01:13:15', '2020-05-25 01:13:15', '2021-05-25 04:13:15'),
('9fa5a6b5274729b43ca751b2ba01ed5760f5f29268d2429679180bb99674b79bc8f6da5f6910973d', 13, 1, 'orderToken', '[]', 0, '2020-05-14 13:29:09', '2020-05-14 13:29:09', '2021-05-14 16:29:09'),
('a0a118209251a54cfb9aa168a680c5701e1edbd0959003796d9535e1624e45f2c3d349e64a9517d7', 3, 1, 'usertoken', '[]', 0, '2020-06-05 06:39:23', '2020-06-05 06:39:23', '2021-06-05 09:39:23'),
('a2690528849f429e6ac6ee545899a1d4e9a707c0220d43e9d095274485c4eab2f03b0009c97a1f20', 1, 1, 'usertoken', '[]', 0, '2020-06-01 15:11:51', '2020-06-01 15:11:51', '2021-06-01 18:11:51'),
('a29d3ff151975833c7c67fd21db3b04369364fbf66677284cf9b70e763f3a36a327d250be87a2980', 1, 1, 'usertoken', '[]', 0, '2020-05-25 09:35:38', '2020-05-25 09:35:38', '2021-05-25 12:35:38'),
('a34ca51e4e780bab0137c06bce47d54916d4ad28c17060614f937c1ceb86a30c9b2b1c02ff50011f', 19, 1, 'orderToken', '[]', 0, '2020-05-27 04:26:07', '2020-05-27 04:26:07', '2021-05-27 07:26:07'),
('a385ecde6e30e0f34b5dcb972ac2c580f81dbe6ea24fc5e126fadee91f0677565768f154ac13eeb8', 12, 1, 'usertoken', '[]', 0, '2020-06-05 05:04:19', '2020-06-05 05:04:19', '2021-06-05 08:04:19'),
('a56d395d83b705af9090d618b0e22f4f109a0a5924a24d0cbbe4315f61190622d433764278f9b92e', 1, 1, 'usertoken', '[]', 0, '2020-06-02 17:17:14', '2020-06-02 17:17:14', '2021-06-02 20:17:14'),
('a8fefc3e3fb75e11a27188ae98973d703a5d352316191d4c5940f3e8883341d847109eda43f8efb3', 3, 1, 'orderToken', '[]', 0, '2020-05-29 06:35:41', '2020-05-29 06:35:41', '2021-05-29 09:35:41'),
('a95f4b1fbad8f56a6878a1f78a7ee0748247bf79440e7842c78bdf21d5857fc4ed28dc3907ddbbce', 36, 1, 'orderToken', '[]', 0, '2020-05-27 06:45:31', '2020-05-27 06:45:31', '2021-05-27 09:45:31'),
('a964b6e0fa8b94a4deef1a9a9ed5b11299187d992bc4c2b46b44c675c1c2d44e975fbd45a6c947da', 8, 1, 'usertoken', '[]', 0, '2020-06-04 05:32:44', '2020-06-04 05:32:44', '2021-06-04 08:32:44'),
('ab2658770d59c354005761ef30034f0eea39b4d4f3f52b1c4110ee9e81b2a47f478234e41fe3a0ae', 1, 1, 'usertoken', '[]', 0, '2020-05-25 09:34:25', '2020-05-25 09:34:25', '2021-05-25 12:34:25'),
('ab3e364c4a71168f0b3769930c53532c4e288421482f00c09c6d87b1179690d2d98e3468e6d48cf5', 3, 1, 'usertoken', '[]', 0, '2020-05-28 13:28:40', '2020-05-28 13:28:40', '2021-05-28 16:28:40'),
('ae0f167fb3b299ba03b61a3eff06b11ebf323caea79ba9eb9def01db35972da41e8645bcafb56135', 1, 1, 'usertoken', '[]', 0, '2020-04-26 14:03:33', '2020-04-26 14:03:33', '2021-04-26 17:03:33'),
('aef7c162500647a98742f8e3306efe6083fb92b88d685c7c168d7d3e15bc56d37ac24765f8bfd790', 16, 1, 'orderToken', '[]', 0, '2020-05-31 16:34:56', '2020-05-31 16:34:56', '2021-05-31 19:34:56'),
('af1cbdb3b5098ea04279b22460ce7bb0abc08f85c47c4100d4cf13c7374e0c43b91f83c7bb369996', 1, 1, 'usertoken', '[]', 0, '2020-04-26 12:04:21', '2020-04-26 12:04:21', '2021-04-26 15:04:21'),
('b025a5ed216b1c6c09ff07fc136117b910db6efb82d784f8f28d51796497235215f146fed08b3bbb', 1, 1, 'usertoken', '[]', 0, '2020-05-22 05:52:07', '2020-05-22 05:52:07', '2021-05-22 08:52:07'),
('b2d9aa05fa65a741e574b71f2699aac2e06ae87b5cddbad03e523afa306ed9018551c3c4b87f9ee8', 1, 1, 'usertoken', '[]', 0, '2020-05-29 10:20:13', '2020-05-29 10:20:13', '2021-05-29 13:20:13'),
('b4e3c5fbe04f6285607a67285aa1bbac8ff960510194b52270d91ea7d49e9d4a92b0cb5035af50d1', 3, 1, 'usertoken', '[]', 0, '2020-05-31 07:48:13', '2020-05-31 07:48:13', '2021-05-31 10:48:13'),
('b527fa1a8930778edfcecdc439fde6eb0f84105ac0fe95ccf5319b4a61b25d1e4d21e2f060c1ba91', 1, 1, 'usertoken', '[]', 0, '2020-06-04 15:35:10', '2020-06-04 15:35:10', '2021-06-04 18:35:10'),
('b7252567cd1979184cbd5f4c352f91292bcf58202b2855e946238bed82cfee85cd7a51c799ac0ae4', 14, 1, 'orderToken', '[]', 0, '2020-05-15 09:27:15', '2020-05-15 09:27:15', '2021-05-15 12:27:15'),
('b832cdac130a16f30e6c76daacf76674a10f74282c782f38d7eec6bb52f4ab3e4da2f6fdae5daf2a', 1, 1, 'usertoken', '[]', 0, '2020-05-25 09:27:52', '2020-05-25 09:27:52', '2021-05-25 12:27:52'),
('b8713036f9e73c7b08e6bf1b5dc0a56ef78078e90a64c64bb7e43c1f44b5f364e4fed77f8e32c26a', 11, 1, 'orderToken', '[]', 0, '2020-05-21 10:24:05', '2020-05-21 10:24:05', '2021-05-21 13:24:05'),
('b97d31195107b72fe8aa2e3940f2a886da71a9a098f540e79b522d98a5fe220fd48a7f8a4cba9d98', 1, 1, 'usertoken', '[]', 0, '2020-05-31 10:33:54', '2020-05-31 10:33:54', '2021-05-31 13:33:54'),
('bac7e811e8b92a5e2193894f378232ff688650a4a44b5e9332bf0d6cf214602fcb46d176ff8bcafb', 1, 1, 'usertoken', '[]', 0, '2020-05-28 13:39:52', '2020-05-28 13:39:52', '2021-05-28 16:39:52'),
('bb3255c9247e70695f20e7e6049cd6a191645c5722de76881ef62dc06761c15e291dbda82311d238', 1, 1, 'usertoken', '[]', 0, '2020-05-28 13:47:09', '2020-05-28 13:47:09', '2021-05-28 16:47:09'),
('bb39bac4545b3c341b160d162b1ac4fef2bc83fbfbfab9c5d4a285d0e6e32854395db76eb30ab365', 3, 1, 'usertoken', '[]', 0, '2020-06-10 13:24:45', '2020-06-10 13:24:45', '2021-06-10 16:24:45'),
('bb60e8ca50c157b79266ff9565ee973cf184129c92d5baeb98582b54cc9a87c0b8860e58bf470670', 1, 1, 'usertoken', '[]', 0, '2020-05-25 09:11:25', '2020-05-25 09:11:25', '2021-05-25 12:11:25'),
('bc5e04b7ad2c6c477487b174d50a9eab5f0aa9e3530e7d0c0296f00b633e9e6822d3a5c423478946', 1, 1, 'orderToken', '[]', 0, '2020-04-20 02:30:25', '2020-04-20 02:30:25', '2021-04-20 05:30:25'),
('be01f137c8fe1d4c1ec2a6e0ffd8cdbb6a30ad664d568f314a472c64152593aa5825d9b43b09ab38', 1, 1, 'usertoken', '[]', 0, '2020-06-02 16:17:50', '2020-06-02 16:17:50', '2021-06-02 19:17:50'),
('bf236649f81f6dab5d23e0edbcba48584d99ba931b40a6653e0b0135c8fbcff747d3c9c7cf7c3abd', 1, 1, 'usertoken', '[]', 0, '2020-05-29 06:49:52', '2020-05-29 06:49:52', '2021-05-29 09:49:52'),
('bf93255e0d1880a225e40e236df061a39948165d13a87f05cd807866307503a79e62ca5f7074e92b', 1, 1, 'usertoken', '[]', 0, '2020-06-05 06:31:26', '2020-06-05 06:31:26', '2021-06-05 09:31:26'),
('bfda564ae22228adaa6b61840c5e7da6ebf175f7d7e10596153f90d712d046948ba174bba79b55b6', 1, 1, 'usertoken', '[]', 0, '2020-05-28 13:34:34', '2020-05-28 13:34:34', '2021-05-28 16:34:34'),
('c1c31fad837035aac1d1e1d1d847644c60f7a34a75f0713a257b0451c839edf3179df770ec3ecb6b', 1, 1, 'usertoken', '[]', 0, '2020-06-03 12:04:52', '2020-06-03 12:04:52', '2021-06-03 15:04:52'),
('c2e4f42014c6485a32067dca26d15cd259b637bf0b1a57de2e2f3ab63466ba7bb7ea3efacb554d75', 57, 1, 'orderToken', '[]', 0, '2020-06-06 17:28:31', '2020-06-06 17:28:31', '2021-06-06 20:28:31'),
('c502f4025aa1f6ad903ed10c09e4e52b0d26db3b06134623bd1b79ebe0d98261234de60480fe351e', 3, 1, 'usertoken', '[]', 0, '2020-05-27 05:19:44', '2020-05-27 05:19:44', '2021-05-27 08:19:44'),
('c5ae8d971498cddd13fe4b781bc992e190c990aafe4ab0baf1df0b09401fb1bd4bf23df0863b5a40', 4, 1, 'usertoken', '[]', 0, '2020-05-27 04:24:38', '2020-05-27 04:24:38', '2021-05-27 07:24:38'),
('c656de14e00dfe88f32d3f1c6276e9bb9219eb8ff667a267d1e5ce91a4ce6025cd8a193a22299464', 1, 1, 'usertoken', '[]', 0, '2020-05-25 09:21:20', '2020-05-25 09:21:20', '2021-05-25 12:21:20'),
('c79ddb2736ba1e09adb51e925427455f78e0146819bc8ba6d167143784a51b9b48b4de5b161819d4', 1, 1, 'usertoken', '[]', 0, '2020-06-03 12:06:47', '2020-06-03 12:06:47', '2021-06-03 15:06:47'),
('c7e3abf39921eb45acc7af04122c6f1a84ba556079e09659a87661f6f56ba4379c8bb6f1c144f11c', 1, 1, 'orderToken', '[]', 0, '2020-05-18 09:10:13', '2020-05-18 09:10:13', '2021-05-18 12:10:13'),
('c7f7bd622c09702319ec708728ae726ef589eb670089d3e7ea66e5ee9bdd4e0fb99f207451966004', 1, 1, 'usertoken', '[]', 0, '2020-05-25 12:12:15', '2020-05-25 12:12:15', '2021-05-25 15:12:15'),
('c8f2e9df2f16d51363dd601231834af95c274c3a24752648caf83d397824d15e2fa74802e85a7c0b', 9, 1, 'orderToken', '[]', 0, '2020-05-20 13:06:43', '2020-05-20 13:06:43', '2021-05-20 16:06:43'),
('c9725a228a4b98a7322418a5d8cf4e2a95ba4287bc7bf9d65f8106636bb0431e47643faa42a9c208', 1, 1, 'usertoken', '[]', 0, '2020-05-25 08:45:46', '2020-05-25 08:45:46', '2021-05-25 11:45:46'),
('ca4f757ac72757809b9ff893200b4ee599763fa252b66314e1820db626bd4d8dc4211b8ba9912fd9', 3, 1, 'usertoken', '[]', 0, '2020-05-28 08:49:21', '2020-05-28 08:49:21', '2021-05-28 11:49:21'),
('cae655376cf613bf4f76ced65732a69c73b6eafc0e745a5b7388b2cbfacb642156c0530a6ec3991d', NULL, 1, 'usertoken', '[]', 0, '2020-05-25 08:42:01', '2020-05-25 08:42:01', '2021-05-25 11:42:01'),
('cd360abf23a996537c7917819bad53c9424ea375672e1f0e3265473b8299e1faf6e474e3c61f2853', 1, 1, 'usertoken', '[]', 0, '2020-05-25 11:18:45', '2020-05-25 11:18:45', '2021-05-25 14:18:45'),
('cf9ccaa522c705b2c6199e0ba71d93b02f576f960c35f705d32ace8939fedd429c6e2cb39d95da6a', 1, 1, 'usertoken', '[]', 0, '2020-05-19 09:49:53', '2020-05-19 09:49:53', '2021-05-19 12:49:53'),
('d0e28b0c59aff8d6de805f1afea5d22f18eb866954a6c7be512f1dfc4ef10aadf5fe23c9f53b4235', 1, 1, 'usertoken', '[]', 0, '2020-04-26 03:11:04', '2020-04-26 03:11:04', '2021-04-26 06:11:04'),
('d1c3f854bf73f6c45d7c385dc690586f324f33ec91bbc18d25e8ae53bb07d33b2638bd701a4c932e', 3, 1, 'usertoken', '[]', 0, '2020-06-08 15:52:43', '2020-06-08 15:52:43', '2021-06-08 18:52:43'),
('d2981a2e86bc0656ccca8c3b997de46ecbe215fbc1846c3c3c9f61890371aac59fc5520f7b458bf8', 7, 1, 'usertoken', '[]', 0, '2020-05-27 06:05:14', '2020-05-27 06:05:14', '2021-05-27 09:05:14'),
('d38309cedc3e14fc1c193f516318997031f886eae9f0cf5ab38fd715300b3418853e886b55d22293', 1, 1, 'usertoken', '[]', 0, '2020-06-04 07:54:26', '2020-06-04 07:54:26', '2021-06-04 10:54:26'),
('d3b46a945c9efbeeeb0756e6d535048e2ecb2aa835415727b18626c998377bfe4f31f3d5b98dd291', 1, 1, 'usertoken', '[]', 0, '2020-05-16 14:24:57', '2020-05-16 14:24:57', '2021-05-16 17:24:57'),
('d4ff53d7761b8fb3b4fea801a95e0532484aff6927b406f662ff93e8fa6846bf96fa38c35c10eae5', 27, 1, 'orderToken', '[]', 0, '2020-06-03 04:45:12', '2020-06-03 04:45:12', '2021-06-03 07:45:12'),
('d65a354f422c3c9688b72113eaedbcc57799492c68612f363f63b20818ffa5c8ef58db87809c952c', 7, 1, 'usertoken', '[]', 0, '2020-06-04 05:18:23', '2020-06-04 05:18:23', '2021-06-04 08:18:23'),
('d73fe34a741ae0c31d1e393b89b5af6dd044a21e438aa0a7698c71a715d5bba106bbaf057cbdfd04', 39, 1, 'orderToken', '[]', 0, '2020-06-04 06:28:19', '2020-06-04 06:28:19', '2021-06-04 09:28:19'),
('d77a5056ee64d596e49b122014905665cb6be2b9009d7f43e5b9db53f96cb52d13587fe3b0bc6d89', 1, 1, 'usertoken', '[]', 0, '2020-06-05 12:17:32', '2020-06-05 12:17:32', '2021-06-05 15:17:32'),
('d7b49c730d515655111e5a108667069f9862642369fb0eb17612fab24b3bf17f9720adfa8753a7e3', 1, 1, 'orderToken', '[]', 0, '2020-05-29 06:32:41', '2020-05-29 06:32:41', '2021-05-29 09:32:41'),
('dab95a4b23f3ba09ab4aedb281a77eddc08dc5cb6e7d8648b3a252c91b33496aa8110e3133e53772', 3, 1, 'usertoken', '[]', 0, '2020-05-27 03:51:24', '2020-05-27 03:51:24', '2021-05-27 06:51:24'),
('dbae83e5d94e038d35ccab82d7ea85761625f5605a09b3db56874283a338743c10ae50aae957e78c', 1, 1, 'usertoken', '[]', 0, '2020-05-13 12:28:18', '2020-05-13 12:28:18', '2021-05-13 15:28:18'),
('dc77edd974eef2cb5c1d162ba0ac7756fdb63ee1013307b2b02b32e805940b19eddec650fe916c6e', 18, 1, 'orderToken', '[]', 0, '2020-05-26 10:19:28', '2020-05-26 10:19:28', '2021-05-26 13:19:28'),
('dc7e151dfc87cf03e44b3ce561d5372a2216180b5728a74d003492c4ff3d20b8ca9b4ffbeaf59698', 1, 1, 'usertoken', '[]', 0, '2020-05-25 09:33:20', '2020-05-25 09:33:20', '2021-05-25 12:33:20'),
('dcf0a52fa2658f7ae5f669a608bdac14a419a3f64427c9652c628cacc3f315c2ca8bd8c3e3e5717c', 12, 1, 'orderToken', '[]', 0, '2020-05-25 11:25:51', '2020-05-25 11:25:51', '2021-05-25 14:25:51'),
('dd78609bc8ce63e0cdcb3649a8df16e90b72519ef1cb2b0eaa1a189d2c471f4ac3cc0f1db5e5a552', 1, 1, 'usertoken', '[]', 0, '2020-06-01 15:37:46', '2020-06-01 15:37:46', '2021-06-01 18:37:46'),
('dde09f208fd2c09dcf3594894bf89dc6a816e210b37699f401be5dd430dc20c49ad6ab3ae006679c', 1, 1, 'usertoken', '[]', 0, '2020-05-28 13:25:21', '2020-05-28 13:25:21', '2021-05-28 16:25:21'),
('e167c862657a703755e99c6e6a1b1c1cbbe4c5b11df0511a3d8deb5d65b2a80fba8d405c59f3dacf', 1, 1, 'usertoken', '[]', 0, '2020-06-03 12:50:37', '2020-06-03 12:50:37', '2021-06-03 15:50:37'),
('e2042dfa6b437f3d4ef267336b1787d03c095f04f6db54dcc7ae99cc2c1f93116e93d04711f57cc5', 8, 1, 'orderToken', '[]', 0, '2020-05-25 08:32:55', '2020-05-25 08:32:55', '2021-05-25 11:32:55'),
('e25c460a4228731bc0075c246dae528c8b73b2ac6cd9b78360a39a17ad2c4f6e4694420d8b700afe', 1, 1, 'usertoken', '[]', 0, '2020-05-19 08:35:14', '2020-05-19 08:35:14', '2021-05-19 11:35:14'),
('e4d36cc076eefeff61b8a8849ab665d4d3f9e68dfc4fd626c462ba6bb153aad98bad148b339cc034', 1, 1, 'usertoken', '[]', 0, '2020-05-25 09:02:41', '2020-05-25 09:02:41', '2021-05-25 12:02:41'),
('e6b260fa354ca14e266895a99c0068e34836ad0e7e6fca39e7bb2ea04c44f4fa28ea4f0c1ea09e37', 3, 1, 'usertoken', '[]', 0, '2020-06-02 05:05:00', '2020-06-02 05:05:00', '2021-06-02 08:05:00'),
('e9f95438339466c1db4c4d265c85157933c4d2c633823f4769f197fdfca5701b4c4026faf904a61f', 1, 1, 'usertoken', '[]', 0, '2020-06-11 08:51:29', '2020-06-11 08:51:29', '2021-06-11 11:51:29'),
('ea1b4017b85d6c87b03f5c63540ef9eff103e9a926bf2346168b7f1602f0ef750762793135a47e28', 1, 1, 'usertoken', '[]', 0, '2020-05-18 13:35:02', '2020-05-18 13:35:02', '2021-05-18 16:35:02'),
('ea5b84da4f704a35c011e4d17f8fac756e1f18a3dab695120da15bfd0f443817bc8a01b68aee1c48', 1, 1, 'usertoken', '[]', 0, '2020-05-26 10:18:04', '2020-05-26 10:18:04', '2021-05-26 13:18:04'),
('ea802dfa479e4bcde4a80c72d427b47212de597001c89521690a8c1b688907095b3554f4565958f5', 1, 1, 'usertoken', '[]', 0, '2020-05-18 15:36:42', '2020-05-18 15:36:42', '2021-05-18 18:36:42'),
('ed65cdad91ebb4c211642f10c5350dbf8ff23f8b7b30be8a73a87e22ed546087c885fa30c9697dd0', 1, 1, 'usertoken', '[]', 0, '2020-05-15 09:24:32', '2020-05-15 09:24:32', '2021-05-15 12:24:32'),
('edf9f4ce34517636eb8220c40f78c043762bbfcf4806fcd32710bf729a2b807be8af9ce0882bf851', 53, 1, 'orderToken', '[]', 0, '2020-06-05 06:43:25', '2020-06-05 06:43:25', '2021-06-05 09:43:25'),
('ee8640f4370eb21b5b6c8e16ef4b7e64f6b28dbdc8fee2d37248244648ccbe24bf9e238851eb345a', 1, 1, 'usertoken', '[]', 0, '2020-05-19 08:44:25', '2020-05-19 08:44:25', '2021-05-19 11:44:25'),
('f08e3366d8fbc08d3017ba00e97f90cdf5c2eecd304e938ea3962499d8305a4652d6607cba74cba5', 1, 1, 'usertoken', '[]', 0, '2020-05-28 13:23:57', '2020-05-28 13:23:57', '2021-05-28 16:23:57'),
('f1e5e0a2dbb1aa12e032e3d5840b7f791725f43cfdc766bede5e726fda6130a1f11b93e04372f603', 1, 1, 'usertoken', '[]', 0, '2020-05-28 06:02:13', '2020-05-28 06:02:13', '2021-05-28 09:02:13'),
('f3fa9d4afa16cafca2a51edb76bcbf6fe7cb456bea21196a37c95817b5282ff4626866802a8eee0d', 1, 1, 'orderToken', '[]', 0, '2020-05-25 01:03:15', '2020-05-25 01:03:15', '2021-05-25 04:03:15'),
('f5bf25aede8d18dd8f4b38942daddb3830a07a8b8ff5df0dcacc4931b0d266fea074e5d28de2297b', 1, 1, 'usertoken', '[]', 0, '2020-05-18 07:49:18', '2020-05-18 07:49:18', '2021-05-18 10:49:18'),
('f988a20e43d10236bc496168b1922fa44d036f16fe9ed6e73e7ae2d8e50d915056cba7614603003a', 2, 1, 'usertoken', '[]', 0, '2020-05-25 17:07:24', '2020-05-25 17:07:24', '2021-05-25 20:07:24'),
('f9e8ad726c532871de75b404b460d239034a6b452aa962e884a76c35c2a407c66d657c6cac272591', 1, 1, 'usertoken', '[]', 0, '2020-04-29 14:19:44', '2020-04-29 14:19:44', '2021-04-29 17:19:44'),
('fa9e2f3a8ecd4d05296497ea872ccab4c6be70cd6b81d2493e64c139093a45742719af7cd489b5f4', 1, 1, 'usertoken', '[]', 0, '2020-05-29 09:52:26', '2020-05-29 09:52:26', '2021-05-29 12:52:26'),
('fbed9e22ed4e85e1c9cad0584163f85b1f931e247ac25077ecca67bff5c4baea70b9914aacf8099b', 5, 1, 'orderToken', '[]', 0, '2020-05-13 15:32:23', '2020-05-13 15:32:23', '2021-05-13 18:32:23'),
('fc5eba4197b6edbca1d746b998cefa4846bb0ca59f7d29f80b60d02546da51f053f76b01407e71c7', 1, 1, 'usertoken', '[]', 0, '2020-04-26 12:02:56', '2020-04-26 12:02:56', '2021-04-26 15:02:56'),
('fd39e825252acc82c791f337bd70d7c8a05bbdc9eff783a0d640766504c7ffab7e4a12cdade0286d', 1, 1, 'usertoken', '[]', 0, '2020-05-11 16:42:07', '2020-05-11 16:42:07', '2021-05-11 19:42:07');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', '8vqkVKcjaEDL0SAq4NJS7YdQ4BzQJCPH0amRMjBT', 'http://localhost', 1, 0, 0, '2020-04-19 03:23:39', '2020-04-19 03:23:39'),
(2, NULL, 'Laravel Password Grant Client', 'pDrha56EQk1BjgvYBhNlpJINvzJM5RjIQ1X6Luxe', 'http://localhost', 0, 1, 0, '2020-04-19 03:23:40', '2020-04-19 03:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-04-19 03:23:39', '2020-04-19 03:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `operators`
--

CREATE TABLE `operators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sender_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recipient_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `truck_type_id` int(11) NOT NULL,
  `package_price` double(12,2) NOT NULL,
  `distance` double(12,2) NOT NULL,
  `stops_count` int(11) NOT NULL DEFAULT '0',
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_datetime` datetime NOT NULL,
  `delivery_datetime` datetime DEFAULT NULL,
  `instructions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `device` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `category_id`, `user_id`, `sender_name`, `sender_phone`, `recipient_name`, `recipient_phone`, `truck_type_id`, `package_price`, `distance`, `stops_count`, `description`, `pickup_datetime`, `delivery_datetime`, `instructions`, `payment_id`, `status`, `device`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'morris mburu', '0703 640124', 'morris mburu', '0703 640124', 9, 22500.00, 0.00, 0, 'additional information', '2020-05-29 02:00:00', '2020-05-31 03:00:00', 'additional information', 1, 2, 'website', '2020-05-29 06:32:41', '2020-06-01 07:23:16', NULL),
(2, 2, 1, 'morris mburu', '0703 640124', 'morris mburu', '0703 640124', 8, 105836.00, 666.69, 2, 'Flatbed', '2020-05-29 05:00:00', '2020-06-02 02:00:00', 'Flatbed', 2, 4, 'website', '2020-05-29 06:34:46', '2020-06-11 12:20:38', NULL),
(3, 1, 1, 'morris mburu', '0703 640124', 'morris mburu', '0703 640124', 10, 348.00, 3.16, 0, 'additional information', '2020-05-29 03:00:00', '2020-05-30 09:00:00', 'additional information', 3, 1, 'website', '2020-05-29 06:35:41', '2020-06-11 12:39:08', NULL),
(4, 1, 1, 'morris mburu', '0703 640124', 'morris mburu', '0703 640124', 4, 1000.00, 15.36, 0, 'be punctual', '2020-05-29 02:00:00', '2020-06-01 02:00:00', 'be punctual', 4, 1, 'website', '2020-05-29 08:34:59', '2020-05-29 08:37:24', NULL),
(5, 2, 1, 'morris mburu', '0703 640124', 'morris mburu', '0703 640124', 8, 161793.00, 1175.39, 3, 'High sided', '2020-05-29 02:00:00', '2020-06-03 03:00:00', 'High sided', 5, 1, 'website', '2020-05-29 08:36:27', '2020-05-29 08:37:35', NULL),
(8, 1, 3, 'Job Oyagi', '0711 675217', 'Job Oyagi', '0711 675217', 2, 348.00, 15.50, 1, 'PLEASE HURRY', '2020-05-30 09:00:00', '2020-04-30 10:00:00', 'PLEASE HURRY', 8, 1, 'website', '2020-05-31 03:44:34', '2020-05-31 04:03:50', NULL),
(13, 1, 3, 'Job Oyagi', '0711 675217', 'Job Oyagi', '0711 675217', 2, 225.00, 14315.00, 0, 'television', '2020-05-31 14:29:58', NULL, 'take care', 15, 1, 'Android', '2020-05-31 08:30:04', '2020-06-02 13:35:51', NULL),
(15, 1, 3, 'Job Oyagi', '0711 675217', 'Job Oyagi', '0711 675217', 2, 225.00, 14315.00, 0, 'television', '2020-05-31 19:00:21', NULL, 'take care', 17, 1, 'Android', '2020-05-31 13:00:32', '2020-06-02 14:58:41', NULL),
(16, 3, 3, 'Job Oyagi', '0711 675217', 'Job Oyagi', '0711 675217', 3, 10000.00, 21.85, 0, 'Packaging and Moves', '2020-05-31 07:05:54', NULL, 'N/A', 18, 1, 'website', '2020-05-31 16:34:54', '2020-05-31 16:48:55', NULL),
(18, 1, 1, 'morris mburu', '0703 640124', 'morris mburu', '0703 640124', 5, 44839.00, 497.99, 0, 'testing, month june', '2020-06-02 02:00:00', '2020-06-04 03:00:00', 'testing, month june', 20, 1, 'website', '2020-06-02 03:21:28', '2020-06-02 15:05:28', NULL),
(21, 3, 16, 'Kevine James', '+254717050295', 'Kevine James', '+254717050295', 7, 62065.00, 829515.00, 0, 'n/a', '2020-06-02 19:56:16', NULL, 'n/a', 23, 5, 'Android', '2020-06-02 13:58:48', '2020-06-04 08:53:27', NULL),
(22, 1, 13, 'Victor', '+254723393151', 'Victor', '+254723393151', 1, 105.00, 29970.00, 0, 'Test order', '2020-06-02 20:11:25', NULL, 'n/a', 24, 3, 'Android', '2020-06-02 14:11:33', '2020-06-03 13:37:28', NULL),
(23, 1, 1, 'morris mburu', '0703 640124', 'morris mburu', '0703 640124', 9, 67319.00, 497.99, 0, 'testing', '2020-06-02 02:00:00', '2020-06-04 02:00:00', 'testing', 25, 1, 'website', '2020-06-02 15:30:48', '2020-06-02 15:31:45', NULL),
(24, 2, 1, 'morris mburu', '0703 640124', 'morris mburu', '0703 640124', 8, 71113.00, 351.03, 0, 'Flatbed', '1970-01-01 12:00:00', '2020-06-05 01:20:00', 'Flatbed', 26, 1, 'website', '2020-06-02 15:31:25', '2020-06-02 15:33:47', NULL),
(25, 1, 1, 'morris mburu', '0703 640124', 'morris mburu', '0703 640124', 9, 35399.00, 143.32, 0, 'testing', '2020-06-02 09:00:00', '2020-06-04 05:00:00', 'testing', 27, 1, 'website', '2020-06-02 15:36:29', '2020-06-02 16:36:40', NULL),
(26, 2, 1, 'morris mburu', '0703 640124', 'morris mburu', '0703 640124', 8, 71113.00, 351.03, 1, 'Flatbed', '2020-06-02 02:00:00', '2020-06-05 09:00:00', 'Flatbed', 28, 1, 'website', '2020-06-02 15:42:36', '2020-06-03 08:53:53', NULL),
(27, 1, 1, 'morris mburu', '0703 640124', 'morris mburu', '0703 640124', 2, 348.00, 3.57, 1, 'additional info', '2020-06-03 02:00:00', '2020-06-06 01:00:00', 'additional info', 29, 2, 'website', '2020-06-03 04:45:12', '2020-06-04 05:33:49', NULL),
(28, 1, 1, 'morris mburu', '0703 640124', 'morris mburu', '0703 640124', 3, 1950.00, 25461.00, 0, 'TV set', '2020-06-03 13:30:25', NULL, 'testing', 30, 1, 'Android', '2020-06-03 07:31:10', '2020-06-03 08:12:44', NULL),
(29, 2, 1, 'morris mburu', '0703 640124', 'morris mburu', '0703 640124', 6, 7499.00, 351026.00, 1, 'tvset', '2020-06-03 13:37:43', NULL, 'Fragile', 31, 1, 'Android', '2020-06-03 07:37:55', '2020-06-03 07:49:56', NULL),
(30, 3, 1, 'morris mburu', '0703 640124', 'morris mburu', '0703 640124', 7, 7499.00, 36503.00, 0, 'n/a', '2020-06-03 13:44:37', NULL, 'do not tilt', 32, 1, 'Android', '2020-06-03 07:44:43', '2020-06-03 08:04:22', NULL),
(31, 1, 1, 'morris mburu', '0703 640124', 'morris mburu', '0703 640124', 5, 5000.00, 36588.00, 0, 'TV set', '2020-06-03 14:34:32', NULL, 'Fragile', 33, 1, 'Android', '2020-06-03 08:34:37', '2020-06-03 08:52:23', NULL),
(32, 1, 1, 'morris mburu', '0703 640124', 'morris mburu', '0703 640124', 7, 52349.00, 497.99, 0, 'additional information', '2020-06-04 01:00:00', '2020-06-05 02:00:00', 'additional information', 34, 1, 'website', '2020-06-03 08:36:46', '2020-06-03 13:08:11', NULL),
(33, 1, 1, 'morris mburu', '0703 640124', 'morris mburu', '0703 640124', 3, 1950.00, 36276.00, 0, 'TV set', '2020-06-03 16:08:50', NULL, 'Fragile testing', 35, 1, 'Android', '2020-06-03 10:10:27', '2020-06-03 13:06:04', NULL),
(34, 1, 1, 'morris mburu', '0703 640124', 'morris mburu', '0703 640124', 5, 7731.00, 34.14, 1, 'testing changes', '2020-06-03 02:00:00', '2020-06-05 02:00:00', 'testing changes', 36, 1, 'website', '2020-06-03 13:58:38', '2020-06-03 13:58:38', NULL),
(35, 1, 3, 'Job Oyagi', '0711 675217', 'Job Oyagi', '0711 675217', 2, 225.00, 21399.00, 1, 'sticker', '2020-06-03 22:11:48', NULL, 'urgent', 37, 1, 'Android', '2020-06-03 16:11:53', '2020-06-03 16:11:53', NULL),
(36, 1, 1, 'Morrison Mburu', '07899065745', 'Othina Felix', '0713671888', 1, 600.00, 700.00, 0, 'Sofa set', '2020-06-04 09:26:51', '2020-06-04 12:26:51', 'Take care', 1, 0, 'Web', '2020-06-04 06:26:51', '2020-06-04 06:26:51', NULL),
(37, 1, 1, 'Morrison Mburu', '07899065745', 'Othina Felix', '0713671888', 1, 600.00, 700.00, 0, 'Sofa set', '2020-06-04 09:26:51', '2020-06-04 12:26:51', 'Take care', 1, 0, 'Web', '2020-06-04 06:26:51', '2020-06-04 06:26:51', NULL),
(38, 1, 3, 'Job Oyagi', '0711 675217', 'Job Oyagi', '0711 675217', 2, 225.00, 30345.00, 0, 'bgjdgjk', '2020-06-04 11:36:47', NULL, 'take care', 38, 2, 'Android', '2020-06-04 05:36:52', '2020-06-04 06:16:35', NULL),
(39, 1, 1, 'morris mburu', '+254703640124', 'morris mburu', '+254703640124', 9, 25793.00, 36.59, 0, 'testing', '2020-06-04 02:00:00', '2020-06-07 09:00:00', 'testing', 39, 2, 'website', '2020-06-04 06:28:19', '2020-06-04 07:51:14', NULL),
(40, 1, 17, 'Olang Kevine', '+254776574847', 'Olang Kevine', '+254776574847', 3, 1950.00, 505165.00, 0, 'Television', '2020-06-04 12:32:05', NULL, 'n/a', 40, 2, 'Android', '2020-06-04 06:32:12', '2020-06-04 06:33:35', NULL),
(41, 2, 1, 'morris mburu', '+254703640124', 'morris mburu', '+254703640124', 6, 52001.00, 666.69, 1, 'High sided', '2020-06-04 02:00:00', '2020-06-07 02:00:00', 'testing', 41, 2, 'website', '2020-06-04 06:32:37', '2020-06-04 07:56:22', NULL),
(42, 1, 17, 'Olang Kevine', '+254776574847', 'Olang Kevine', '+254776574847', 5, 5000.00, 831764.00, 4, 'Timber', '2020-06-04 14:03:43', NULL, 'n/a', 42, 2, 'Android', '2020-06-04 08:03:51', '2020-06-04 08:04:27', NULL),
(43, 1, 13, 'Victor', '+254723393151', 'Victor', '+254723393151', 2, 225.00, 33286.00, 0, 'test', '2020-06-04 14:05:14', NULL, 'n/a', 43, 2, 'Android', '2020-06-04 08:05:33', '2020-06-04 08:16:32', NULL),
(44, 1, 1, 'morris mburu', '+254703640124', 'morris mburu', '+254703640124', 2, 348.00, 5.23, 0, 'testing information', '2020-06-06 03:00:00', '2020-06-05 02:00:00', 'testing information', 44, 2, 'website', '2020-06-05 04:26:52', '2020-06-05 04:31:22', NULL),
(45, 2, 1, 'morris mburu', '+254703640124', 'morris mburu', '+254703640124', 7, 65002.00, 666.69, 3, 'Flatbed', '2020-06-05 02:00:00', '2020-06-07 02:00:00', 'testing', 45, 0, 'website', '2020-06-05 04:32:58', '2020-06-05 04:32:58', NULL),
(46, 1, 1, 'morris mburu', '+254703640124', 'morris mburu', '+254703640124', 2, 348.00, 2.10, 0, 'testing', '2020-06-05 02:00:00', '2020-06-08 02:00:00', 'testing', 46, 2, 'website', '2020-06-05 04:41:32', '2020-06-05 05:07:27', NULL),
(47, 1, 13, 'Victor', '+254723393151', 'Victor', '+254723393151', 1, 105.00, 376393.00, 0, 'test order', '2020-06-05 11:05:43', NULL, 'n/a', 47, 2, 'Android', '2020-06-05 05:05:49', '2020-06-05 05:06:15', NULL),
(48, 1, 13, 'Victor', '+254723393151', 'Victor', '+254723393151', 1, 105.00, 852313.00, 0, 'test', '2020-06-05 11:07:20', NULL, 'n/a', 48, 2, 'Android', '2020-06-05 05:07:23', '2020-06-05 05:07:55', NULL),
(49, 1, 3, 'Job Oyagi', '0711 675217', 'Job Oyagi', '0711 675217', 6, 7000.00, 31951.00, 0, 'Television', '2020-06-05 11:10:00', NULL, 'n/a', 49, 0, 'Android', '2020-06-05 05:10:04', '2020-06-05 05:10:04', NULL),
(50, 1, 3, 'Job Oyagi', '0711 675217', 'Job Oyagi', '0711 675217', 2, 232.00, 34091.00, 0, 'Food', '2020-06-05 11:12:23', NULL, 'n/a', 50, 2, 'Android', '2020-06-05 05:12:27', '2020-06-05 05:13:34', NULL),
(51, 1, 3, 'Job Oyagi', '0711 675217', 'Job Oyagi', '0711 675217', 2, 232.00, 12913.00, 0, 'Drawings', '2020-06-05 12:37:13', NULL, 'kindly take care', 51, 2, 'Android', '2020-06-05 06:37:25', '2020-06-05 06:48:29', NULL),
(52, 1, 3, 'Job Oyagi', '0711 675217', 'Job Oyagi', '0711 675217', 2, 232.00, 12913.00, 0, 'Drawings', '2020-06-05 12:37:13', NULL, 'kindly take care', 52, 2, 'Android', '2020-06-05 06:37:34', '2020-06-05 06:45:37', NULL),
(53, 1, 3, 'Job Oyagi', '0711 675217', 'Job Oyagi', '0711 675217', 2, 348.00, 13.97, 0, 'please keep time', '2020-06-05 11:00:00', '2020-06-05 12:00:00', 'please keep time', 53, 2, 'website', '2020-06-05 06:43:23', '2020-06-05 06:44:39', NULL),
(54, 1, 3, 'Job Oyagi', '0711 675217', 'Job Oyagi', '0711 675217', 2, 232.00, 22126.00, 0, 'television', '2020-06-06 15:04:22', NULL, 'keep safe', 54, 2, 'Android', '2020-06-06 09:04:43', '2020-06-07 04:05:04', NULL),
(55, 1, 0, 'VICTOR', '+254713671888', 'VICTOR', '+254713671888', 2, 232.00, 23939.00, 0, 'Television', '2020-06-06 21:04:36', NULL, 'Carefully handle.  It\'s fragile.', 55, 0, 'Android', '2020-06-06 15:04:59', '2020-06-06 15:04:59', NULL),
(56, 1, 1, 'morris mburu', '+254703640124', 'morris mburu', '+254703640124', 7, 52349.00, 497.99, 0, 'additional informatiion testing', '2020-06-07 03:00:00', '2020-06-08 02:00:00', 'additional informatiion testing', 56, 0, 'website', '2020-06-06 17:26:57', '2020-06-06 17:26:57', NULL),
(57, 1, 1, 'morris mburu', '+254703640124', 'morris mburu', '+254703640124', 2, 348.00, 1.66, 0, 'testing', '2020-06-07 02:00:00', '2020-06-09 09:00:00', 'testing', 57, 2, 'website', '2020-06-06 17:28:31', '2020-06-06 17:28:55', NULL),
(58, 1, 20, 'VICTOR', '+254713671888', 'VICTOR', '+254713671888', 2, 232.00, 24167.00, 0, 'Television', '2020-06-07 18:49:57', NULL, 'Take good care', 58, 2, 'Android', '2020-06-07 12:50:07', '2020-06-07 12:51:20', NULL),
(59, 1, 20, 'VICTOR', '+254713671888', 'VICTOR', '+254713671888', 4, 1950.00, 24167.00, 0, 'Fridge', '2020-06-07 18:56:42', NULL, 'take care', 59, 3, 'Android', '2020-06-07 12:56:44', '2020-06-11 12:48:27', NULL),
(60, 1, 20, 'VICTOR', '+254713671888', 'VICTOR', '+254713671888', 2, 232.00, 36010.00, 0, 'sofa set', '2020-06-10 08:06:11', NULL, 'take care', 60, 0, 'Android', '2020-06-10 02:06:18', '2020-06-10 02:06:18', NULL),
(61, 3, 20, 'VICTOR', '+254713671888', 'VICTOR', '+254713671888', 7, 7499.00, 7287.00, 0, 'n/a', '2020-06-10 17:11:46', NULL, 'carefully', 61, 0, 'Android', '2020-06-10 11:12:02', '2020-06-10 11:12:02', NULL),
(62, 3, 3, 'Job Oyagi', '0711 675217', 'Job Oyagi', '0711 675217', 3, 10000.00, 2.87, 0, 'Packaging and Moves', '2020-06-10 04:06:02', NULL, 'N/A', 62, 0, 'website', '2020-06-10 13:26:02', '2020-06-10 13:26:02', NULL),
(63, 1, 3, 'Job Oyagi', '0711 675217', 'Job Oyagi', '0711 675217', 2, 232.00, 13820.00, 0, 'Letter', '2020-06-10 19:35:14', NULL, 'take care', 63, 2, 'Android', '2020-06-10 13:35:15', '2020-06-10 13:52:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_payments`
--

CREATE TABLE `order_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_type_id` int(11) NOT NULL,
  `total` double(12,2) NOT NULL,
  `paid_amount` double(12,2) NOT NULL DEFAULT '0.00',
  `balance` double(12,2) NOT NULL DEFAULT '0.00',
  `extra` double(12,2) NOT NULL DEFAULT '0.00',
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `timestamp` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_payments`
--

INSERT INTO `order_payments` (`id`, `payment_type_id`, `total`, `paid_amount`, `balance`, `extra`, `user_id`, `status`, `timestamp`, `created_at`, `updated_at`) VALUES
(1, 2, 22500.00, 0.00, 22500.00, 0.00, 1, 1, 0, '2020-05-29 06:32:41', '2020-05-29 06:32:41'),
(2, 2, 105836.00, 0.00, 105836.00, 0.00, 1, 1, 0, '2020-05-29 06:34:46', '2020-05-29 06:34:46'),
(3, 2, 348.00, 0.00, 348.00, 0.00, 1, 1, 0, '2020-05-29 06:35:41', '2020-05-29 06:35:41'),
(4, 2, 1000.00, 0.00, 1000.00, 0.00, 1, 1, 0, '2020-05-29 08:34:59', '2020-05-29 08:34:59'),
(5, 2, 161793.00, 0.00, 161793.00, 0.00, 1, 1, 0, '2020-05-29 08:36:27', '2020-05-29 08:36:27'),
(6, 1, 43038.00, 0.00, 43038.00, 0.00, 12, 1, 0, '2020-05-30 19:11:24', '2020-05-30 19:11:24'),
(7, 1, 17107.00, 0.00, 17107.00, 0.00, 9, 1, 0, '2020-05-31 02:50:44', '2020-05-31 02:50:44'),
(8, 1, 348.00, 0.00, 348.00, 0.00, 3, 1, 0, '2020-05-31 03:44:34', '2020-05-31 03:44:34'),
(9, 1, 17737.00, 0.00, 17737.00, 0.00, 0, 1, 0, '2020-05-31 05:36:52', '2020-05-31 05:36:52'),
(10, 1, 22734.00, 0.00, 22734.00, 0.00, 11, 1, 0, '2020-05-31 05:57:48', '2020-05-31 05:57:48'),
(11, 1, 43038.00, 0.00, 43038.00, 0.00, 12, 1, 0, '2020-05-31 07:44:00', '2020-05-31 07:44:00'),
(12, 1, 500.00, 0.00, 500.00, 0.00, 3, 1, 0, '2020-05-31 07:49:45', '2020-05-31 07:49:45'),
(13, 1, 1000.00, 0.00, 1000.00, 0.00, 3, 1, 0, '2020-05-31 07:52:43', '2020-05-31 07:52:43'),
(14, 1, 18198.00, 0.00, 18198.00, 0.00, 12, 1, 0, '2020-05-31 08:15:34', '2020-05-31 08:15:34'),
(15, 1, 411.00, 0.00, 411.00, 0.00, 3, 1, 0, '2020-05-31 08:30:03', '2020-05-31 08:30:03'),
(16, 1, 618.00, 0.00, 618.00, 0.00, 0, 1, 0, '2020-05-31 10:10:21', '2020-05-31 10:10:21'),
(17, 2, 411.00, 411.00, 0.00, 0.00, 3, 3, 1590940826655, '2020-05-31 13:00:32', '2020-05-31 13:00:32'),
(18, 1, 10000.00, 0.00, 10000.00, 0.00, 3, 1, 0, '2020-05-31 16:34:54', '2020-05-31 16:34:54'),
(19, 1, 87307.00, 0.00, 87307.00, 0.00, 12, 1, 0, '2020-05-31 17:34:00', '2020-05-31 17:34:00'),
(20, 2, 44839.00, 0.00, 44839.00, 0.00, 1, 1, 0, '2020-06-02 03:21:28', '2020-06-02 03:21:28'),
(21, 1, 82565.00, 0.00, 82565.00, 0.00, 16, 1, 0, '2020-06-02 13:56:20', '2020-06-02 13:56:20'),
(22, 1, 82565.00, 0.00, 82565.00, 0.00, 16, 1, 0, '2020-06-02 13:56:46', '2020-06-02 13:56:46'),
(23, 1, 82565.00, 0.00, 82565.00, 0.00, 16, 1, 0, '2020-06-02 13:58:48', '2020-06-02 13:58:48'),
(24, 1, 355.00, 0.00, 355.00, 0.00, 13, 1, 0, '2020-06-02 14:11:33', '2020-06-02 14:11:33'),
(25, 2, 67319.00, 0.00, 67319.00, 0.00, 1, 1, 0, '2020-06-02 15:30:48', '2020-06-02 15:30:48'),
(26, 2, 71113.00, 0.00, 71113.00, 0.00, 1, 1, 0, '2020-06-02 15:31:25', '2020-06-02 15:31:25'),
(27, 2, 35399.00, 0.00, 35399.00, 0.00, 1, 1, 0, '2020-06-02 15:36:29', '2020-06-02 15:36:29'),
(28, 2, 71113.00, 0.00, 71113.00, 0.00, 1, 1, 0, '2020-06-02 15:42:36', '2020-06-02 15:42:36'),
(29, 2, 348.00, 0.00, 348.00, 0.00, 1, 1, 0, '2020-06-03 04:45:12', '2020-06-03 04:45:12'),
(30, 1, 2723.00, 0.00, 2723.00, 0.00, 1, 1, 0, '2020-06-03 07:31:10', '2020-06-03 07:31:10'),
(31, 1, 28571.00, 0.00, 28571.00, 0.00, 1, 1, 0, '2020-06-03 07:37:55', '2020-06-03 07:37:55'),
(32, 1, 11499.00, 0.00, 11499.00, 0.00, 1, 1, 0, '2020-06-03 07:44:43', '2020-06-03 07:44:43'),
(33, 1, 5579.00, 0.00, 5579.00, 0.00, 1, 1, 0, '2020-06-03 08:34:37', '2020-06-03 08:34:37'),
(34, 2, 52349.00, 0.00, 52349.00, 0.00, 1, 1, 0, '2020-06-03 08:36:46', '2020-06-03 08:36:46'),
(35, 1, 3264.00, 0.00, 3264.00, 0.00, 1, 1, 0, '2020-06-03 10:10:27', '2020-06-03 10:10:27'),
(36, 2, 7731.00, 0.00, 7731.00, 0.00, 1, 1, 0, '2020-06-03 13:58:38', '2020-06-03 13:58:38'),
(37, 1, 553.00, 0.00, 553.00, 0.00, 3, 1, 0, '2020-06-03 16:11:53', '2020-06-03 16:11:53'),
(38, 1, 732.00, 0.00, 732.00, 0.00, 3, 1, 0, '2020-06-04 05:36:52', '2020-06-04 05:36:52'),
(39, 2, 25793.00, 0.00, 25793.00, 0.00, 1, 1, 0, '2020-06-04 06:28:19', '2020-06-04 06:28:19'),
(40, 1, 26708.00, 0.00, 26708.00, 0.00, 17, 1, 0, '2020-06-04 06:32:12', '2020-06-04 06:32:12'),
(41, 2, 52001.00, 0.00, 52001.00, 0.00, 1, 1, 0, '2020-06-04 06:32:37', '2020-06-04 06:32:37'),
(42, 1, 45338.00, 0.00, 45338.00, 0.00, 17, 1, 0, '2020-06-04 08:03:51', '2020-06-04 08:03:51'),
(43, 2, 791.00, 791.00, 0.00, 0.00, 13, 3, 1591268718694, '2020-06-04 08:05:33', '2020-06-04 08:05:33'),
(44, 2, 348.00, 0.00, 348.00, 0.00, 1, 1, 0, '2020-06-05 04:26:52', '2020-06-05 04:26:52'),
(45, 2, 65002.00, 0.00, 65002.00, 0.00, 1, 1, 0, '2020-06-05 04:32:58', '2020-06-05 04:32:58'),
(46, 2, 348.00, 0.00, 348.00, 0.00, 1, 1, 0, '2020-06-05 04:41:32', '2020-06-05 04:41:32'),
(47, 1, 3819.00, 0.00, 3819.00, 0.00, 13, 1, 0, '2020-06-05 05:05:49', '2020-06-05 05:05:49'),
(48, 1, 8578.00, 0.00, 8578.00, 0.00, 13, 1, 0, '2020-06-05 05:07:23', '2020-06-05 05:07:23'),
(49, 1, 7348.00, 0.00, 7348.00, 0.00, 3, 1, 0, '2020-06-05 05:10:04', '2020-06-05 05:10:04'),
(50, 1, 959.00, 0.00, 959.00, 0.00, 3, 1, 0, '2020-06-05 05:12:27', '2020-06-05 05:12:27'),
(51, 1, 430.00, 0.00, 430.00, 0.00, 3, 1, 0, '2020-06-05 06:37:25', '2020-06-05 06:37:25'),
(52, 1, 430.00, 0.00, 430.00, 0.00, 3, 1, 0, '2020-06-05 06:37:34', '2020-06-05 06:37:34'),
(53, 2, 348.00, 0.00, 348.00, 0.00, 3, 1, 0, '2020-06-05 06:43:23', '2020-06-05 06:43:23'),
(54, 1, 660.00, 0.00, 660.00, 0.00, 3, 1, 0, '2020-06-06 09:04:43', '2020-06-06 09:04:43'),
(55, 1, 705.00, 0.00, 705.00, 0.00, 0, 1, 0, '2020-06-06 15:04:59', '2020-06-06 15:04:59'),
(56, 2, 52349.00, 0.00, 52349.00, 0.00, 1, 1, 0, '2020-06-06 17:26:57', '2020-06-06 17:26:57'),
(57, 2, 348.00, 0.00, 348.00, 0.00, 1, 1, 0, '2020-06-06 17:28:31', '2020-06-06 17:28:31'),
(58, 1, 711.00, 0.00, 711.00, 0.00, 20, 1, 0, '2020-06-07 12:50:07', '2020-06-07 12:50:07'),
(59, 1, 2658.00, 0.00, 2658.00, 0.00, 20, 1, 0, '2020-06-07 12:56:44', '2020-06-07 12:56:44'),
(60, 1, 1007.00, 0.00, 1007.00, 0.00, 20, 1, 0, '2020-06-10 02:06:18', '2020-06-10 02:06:18'),
(61, 2, 13499.00, 13499.00, 0.00, 0.00, 20, 3, 1591798309441, '2020-06-10 11:12:02', '2020-06-10 11:12:02'),
(62, 1, 10000.00, 0.00, 10000.00, 0.00, 3, 1, 0, '2020-06-10 13:26:02', '2020-06-10 13:26:02'),
(63, 1, 453.00, 0.00, 453.00, 0.00, 3, 1, 0, '2020-06-10 13:35:15', '2020-06-10 13:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `package_size`
--

CREATE TABLE `package_size` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_size`
--

INSERT INTO `package_size` (`id`, `name`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 'Small', '2020-05-18 22:13:27', NULL, NULL),
(2, 'Medium', '2020-05-18 22:13:27', NULL, NULL),
(3, 'Large', '2020-05-18 22:13:27', NULL, NULL),
(4, 'Special', '2020-05-18 22:13:27', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `package_sizes`
--

CREATE TABLE `package_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `MerchantRequestID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CheckoutRequestID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ResponseCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ResponseDescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CustomerMessage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ResultDesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `MerchantRequestID`, `CheckoutRequestID`, `ResponseCode`, `ResponseDescription`, `CustomerMessage`, `ResultDesc`, `created_at`, `updated_at`) VALUES
(1, '30848-4699652-1', 'ws_CO_190420201402069658', '0', 'Success. Request accepted for processing', 'Success. Request accepted for processing', '', '2020-04-19 08:02:05', '2020-04-19 08:02:05'),
(2, '7308-23950368-1', 'ws_CO_050520201534351933', '0', 'Success. Request accepted for processing', 'Success. Request accepted for processing', '', '2020-05-05 09:34:33', '2020-05-05 09:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `platform` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_types`
--

INSERT INTO `payment_types` (`id`, `name`, `platform`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 'Cash', NULL, '2020-05-18 22:43:54', NULL, NULL),
(2, 'Mpesa', NULL, '2020-05-18 22:43:54', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(5, 'Admin privileges', 'admin', '2020-05-25 11:43:04', '2020-05-25 11:43:04'),
(6, 'Dispatch panel operations', 'admin', '2020-05-25 11:43:19', '2020-05-25 11:43:19');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(16, 'Admin', 'admin', '2020-05-25 11:43:36', '2020-05-25 11:43:36'),
(17, 'Operator', 'admin', '2020-05-25 11:43:56', '2020-05-25 11:43:56');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(5, 16),
(6, 16),
(6, 17);

-- --------------------------------------------------------

--
-- Table structure for table `service_types`
--

CREATE TABLE `service_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serviceType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rateType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instant_bookings` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_methods` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_minute` int(11) NOT NULL,
  `per_kilometer` int(11) NOT NULL,
  `default_cost` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_types`
--

INSERT INTO `service_types` (`id`, `serviceType`, `name`, `rateType`, `instant_bookings`, `nop`, `payment_methods`, `per_minute`, `per_kilometer`, `default_cost`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Classic', 'morris mburu', 'Regular', 'Disable', '8', 'Cash On Delivery', 45, 40, 500, 1, '2020-05-11 10:08:55', '2020-05-11 13:52:47'),
(2, 'Business', 'morris', 'Regular', 'Enable', '11', 'Mpesa', 50, 200, 200, 1, '2020-05-11 16:36:35', '2020-05-26 03:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mpesa_consumerKey` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mpesa_consumerSecret` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trucks`
--

CREATE TABLE `trucks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `truckNo` bigint(20) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ownerShipType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trucks`
--

INSERT INTO `trucks` (`id`, `truckNo`, `type`, `ownerShipType`, `comments`, `created_at`, `updated_at`) VALUES
(1, 67, 'Truck', 'Company Owned', 'no problem', '2020-05-26 03:28:15', '2020-05-26 03:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `truck_types`
--

CREATE TABLE `truck_types` (
  `id` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` double(12,2) NOT NULL DEFAULT '0.00',
  `package_size` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `truck_types`
--

INSERT INTO `truck_types` (`id`, `name`, `capacity`, `package_size`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 'Messager', 0.00, 1, '2020-05-18 22:23:40', NULL, NULL),
(2, 'Express Bike', 0.00, 1, '2020-05-18 22:23:40', NULL, NULL),
(3, 'Pickup', 0.00, 2, '2020-05-18 22:23:40', NULL, NULL),
(4, 'Van', 0.00, 2, '2020-05-18 22:23:40', NULL, NULL),
(5, '3-Tonne Truck', 3.00, 3, '2020-05-18 22:23:40', NULL, NULL),
(6, '5-Tonne Truck', 5.00, 3, '2020-05-18 22:23:40', NULL, NULL),
(7, '10-Tonne Truck', 10.00, 3, '2020-05-18 22:23:40', NULL, NULL),
(8, '28-Tonne Truck', 28.00, 4, '2020-05-18 22:23:40', NULL, NULL),
(9, '14-Tonne Truck', 14.00, 3, '2020-05-23 17:40:37', NULL, NULL),
(10, 'Motor Cycle', 0.00, 1, '2020-05-28 08:56:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `f_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL,
  `account_type` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fcm_token` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `platform` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `username`, `role`, `account_type`, `email`, `password`, `phone`, `phone_2`, `api_token`, `remember_token`, `fcm_token`, `status`, `platform`, `email_verified_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'morris', 'mburu', 'morris mburu', 1, 3, 'morrisonmburu7@gmail.com', '$2y$10$c0b3tourEfzcLtspg3duROAmjTUJ/5UIvy/c6mpcAcCV8ZdAwzRb.', '+254703640124', NULL, NULL, NULL, '0', '1', 'Website', NULL, '2020-05-25 09:34:25', '2020-06-04 02:25:04', NULL),
(3, 'Job', 'Oyagi', 'Job Oyagi', 1, 2, 'oyagijob8@gmail.com', '$2y$10$wQoppF7V0jkrtCSIOh7gc.KyH/LLRvc7EQuJhQ738e9E40Pckb/YK', '0711 675217', NULL, NULL, NULL, '0', '1', 'Website', NULL, '2020-05-27 03:51:23', '2020-05-31 07:54:06', NULL),
(4, 'lucy', 'olive', 'lucy olive', 1, 1, 'luciolivian@gmail.com', '$2y$10$svlCKToaCIWuQpdN95Mq/OFTcW/lc5XNjdUbquyfKE8cWw4nozQmq', '0111 933647', NULL, NULL, NULL, '0', '1', 'Website', NULL, '2020-05-27 04:24:38', '2020-05-27 04:24:38', NULL),
(5, 'Lepheme', 'lepheme', 'Lepheme lepheme', 1, 1, 'lephemesolution@gmail.com', '$2y$10$M50ZeuFuI0H7/amlyovR9.PEIjzJPhvGKpGwdi0pzTtgSHz8AHVJq', '0703 640125', NULL, NULL, NULL, '0', '1', 'Website', NULL, '2020-05-27 04:43:59', '2020-05-27 04:43:59', NULL),
(7, 'steve', 'serria', 'steve serria', 1, 1, 'steveserria@gmail.com', '$2y$10$I29jf7plzb6WFcsqgSiEQ.ONbNwrLmjElcwa5FwEs9wttvs5NBbNe', '0707 295410', NULL, NULL, NULL, '0', '1', 'Website', NULL, '2020-05-27 05:58:28', '2020-05-27 05:58:28', NULL),
(8, 'morris', 'mburu', 'morris mburu', 1, 2, 'volanttesting@gmail.com', '$2y$10$3chduFUvPcakZhKFIiQnaet0VTUMio8jT0ZVcLlp2mYCJzJswn4oi', '0703640129', NULL, NULL, NULL, '0', '0', 'Website', NULL, '2020-05-27 08:44:46', '2020-05-27 08:44:46', NULL),
(13, NULL, NULL, 'Victor', 1, 1, 'migotvictor@gmail.com', '$2y$10$N590GXGxAbPMBatOaDBTNuHU0RFfMbG7N3kf.g.xmNv/GUdR841Ee', '+254723393151', NULL, 'QnvqwFwmkN8PiLLlwBiGoLdX9YDeWT9onJQWmgYGT7N3ZMLVcs0IO0TJXWTy', NULL, '0', '1', 'Android', NULL, '2020-05-31 09:47:16', '2020-05-31 09:47:16', NULL),
(16, NULL, NULL, 'Kevine James', 1, 1, 'kevinejames44@gmail.com', '$2y$10$cKzFew1hM6aZnPT.FBDeMucUz7czjp72avstdhrayZ5LiypPZGvsq', '+254717050295', NULL, 'EnGDNiep1Na6ku1xXtpyHMI22pDxx49i8KuC7lpSLoVjrWnPuqG74oGbMTxm', NULL, '0', '1', 'Android', NULL, '2020-06-02 13:20:26', '2020-06-02 13:20:26', NULL),
(17, NULL, NULL, 'Olang Kevine', 1, 1, 'ubein.app@gmail.com', '$2y$10$2vsj4ns/h/agA6Lw/5FAY.D1BPKfnuX0yksG.aLwcOEWtux30wmFO', '+254776574847', NULL, 'U2eU4nJRpFW3G4lqDX0oFv8lh10zXUqvXI7lG1WN0XZLDmT3vn4xeirX6LHh', NULL, '0', '1', 'Android', NULL, '2020-06-02 13:27:32', '2020-06-02 13:27:32', NULL),
(18, NULL, NULL, 'Victor', 1, 1, 'migotvictor26@gmail.com', '$2y$10$SUSsFGuM7q0aVGeedJYl1eD7zAmf9ZWOszxAkbimiVntg12m2STAG', '+254729812895', NULL, 'ao7MMcKL42M1TVFtH7kvId7bNDOu5Ydro7ngM9JpkhgT5Xg9mkW3hWUPDCBk', NULL, '0', '1', 'Android', NULL, '2020-06-02 13:31:37', '2020-06-02 13:31:37', NULL),
(19, NULL, NULL, 'martha wacuka', 1, 1, 'arswacuka@gmail.com', '$2y$10$fgdNBpB2x.Iox09.q/ZwSOWepzmlhGiZ1FrtNNMxa06fJ1DhTy0eq', '+254727044680', NULL, 'QGeRi4OA0sNqJYVjuVa1TjHej276m2Mh8pDunHLzMJ2RibBMAoLY0MKmN8wZ', NULL, '0', '1', 'Android', NULL, '2020-06-03 03:51:45', '2020-06-03 03:51:45', NULL),
(20, NULL, NULL, 'VICTOR', 1, 1, 'fixoothina@gmail.com', '$2y$10$CqMojpq/QbWicyCX6ZIeY.IARV.S6VbtDLcM22swmWP6ZKZcQ8MZu', '+254713671888', NULL, 'StLANkELcvMvtD2w5RDH4VoNkt0yBk0UJLF6sHby9af3lfoNxMtK9jmDCxRp', NULL, '0', '1', 'Android', NULL, '2020-06-06 15:01:36', '2020-06-06 15:01:36', NULL),
(21, NULL, NULL, 'Ronald Ouma', 1, 1, 'roouma@hotmail.com.com', '$2y$10$uL/Wgj84a1AYef/4I4/KYeTWQvkXgVNXaVDbiJNeuGCF05.n5uCqW', '+254711447292', NULL, '73AH7z6dSM4gWHZupc8G4zpUQnmGFDL7PeEWBKyojBBUj9eluuf4rjGNqgMS', NULL, '0', '1', 'Android', NULL, '2020-06-09 12:33:45', '2020-06-09 12:33:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `name`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 'Customer', '2020-05-18 20:50:06', NULL, NULL),
(2, 'Rider', '2020-05-18 20:55:18', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `volantusers`
--

CREATE TABLE `volantusers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serviceType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `volantusers`
--

INSERT INTO `volantusers` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `serviceType`, `remember_token`, `token`, `created_at`, `updated_at`) VALUES
(1, 'morris mburu', 'morrisonmburu7@gmail.com', '0703640124', NULL, '$2y$10$ABX6FxAb0h88MZek0xOs2OLRQMd2vpY9rKMc5O68N2xHFSHtP8xyS', 'Classic', NULL, '5obqaqKpODXRs4EmUsgrRHHgnUaDQSsqiWBacOkC', '2020-05-11 16:47:58', '2020-05-19 16:11:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_types`
--
ALTER TABLE `account_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `couriers`
--
ALTER TABLE `couriers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dispatches`
--
ALTER TABLE `dispatches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dispatches_dispatchno_unique` (`dispatchno`);

--
-- Indexes for table `extra_moves`
--
ALTER TABLE `extra_moves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freight_orders`
--
ALTER TABLE `freight_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `house_type`
--
ALTER TABLE `house_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `moves_extra`
--
ALTER TABLE `moves_extra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_payments`
--
ALTER TABLE `order_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_size`
--
ALTER TABLE `package_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_sizes`
--
ALTER TABLE `package_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `service_types`
--
ALTER TABLE `service_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trucks`
--
ALTER TABLE `trucks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trucks_truckno_unique` (`truckNo`);

--
-- Indexes for table `truck_types`
--
ALTER TABLE `truck_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volantusers`
--
ALTER TABLE `volantusers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `volantusers_email_unique` (`email`),
  ADD UNIQUE KEY `volantusers_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_types`
--
ALTER TABLE `account_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `couriers`
--
ALTER TABLE `couriers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dispatches`
--
ALTER TABLE `dispatches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `extra_moves`
--
ALTER TABLE `extra_moves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `freight_orders`
--
ALTER TABLE `freight_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `house_type`
--
ALTER TABLE `house_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `moves_extra`
--
ALTER TABLE `moves_extra`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `operators`
--
ALTER TABLE `operators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `order_payments`
--
ALTER TABLE `order_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `package_size`
--
ALTER TABLE `package_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `package_sizes`
--
ALTER TABLE `package_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `service_types`
--
ALTER TABLE `service_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trucks`
--
ALTER TABLE `trucks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `truck_types`
--
ALTER TABLE `truck_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `volantusers`
--
ALTER TABLE `volantusers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
