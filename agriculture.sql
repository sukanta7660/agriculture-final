-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2018 at 03:38 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agriculture`
--

-- --------------------------------------------------------

--
-- Table structure for table `bankbook`
--

CREATE TABLE `bankbook` (
  `bankbookID` int(10) UNSIGNED NOT NULL,
  `bankID` int(10) UNSIGNED NOT NULL,
  `amountIN` double NOT NULL DEFAULT '0',
  `amountOut` double NOT NULL DEFAULT '0',
  `transactionType` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'IN',
  `descriptions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bankbook`
--

INSERT INTO `bankbook` (`bankbookID`, `bankID`, `amountIN`, `amountOut`, `transactionType`, `descriptions`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 20125, 0, 'IN', NULL, NULL, '2018-07-25 11:58:06', '2018-07-25 11:58:06'),
(2, 2, 0, 12560, 'OUT', NULL, NULL, '2018-07-25 12:00:24', '2018-07-25 12:00:24'),
(3, 2, 5000, 0, 'IN', NULL, NULL, '2018-07-25 12:01:03', '2018-07-25 12:01:03'),
(4, 2, 0, 890, 'OUT', NULL, NULL, '2018-07-28 09:34:47', '2018-07-28 09:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `bankID` int(10) UNSIGNED NOT NULL,
  `name` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accountNo` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactPerson` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` double NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`bankID`, `name`, `accountNo`, `branch`, `contactPerson`, `contact`, `balance`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'UCB LTD.', '1432020045', 'Shibgonj, Sylhet', 'Rj. Dipen', '01719894414', 5000, NULL, '2018-07-25 11:37:12', '2018-07-25 11:37:12');

-- --------------------------------------------------------

--
-- Table structure for table `general_expanse`
--

CREATE TABLE `general_expanse` (
  `generalExpanseID` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_expanse`
--

INSERT INTO `general_expanse` (`generalExpanseID`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Dipen', NULL, '2018-07-24 11:15:13', '2018-07-24 11:15:13'),
(3, 'Action', NULL, '2018-07-24 16:06:22', '2018-07-24 16:06:22'),
(4, 'Moish', NULL, '2018-07-24 16:06:30', '2018-07-24 16:06:30'),
(5, 'Goru', NULL, '2018-07-24 16:06:39', '2018-07-24 16:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `gen_exp_transaction`
--

CREATE TABLE `gen_exp_transaction` (
  `generalExpanseTransactionID` int(10) UNSIGNED NOT NULL,
  `generalExpanseID` int(10) UNSIGNED NOT NULL,
  `amountIN` double NOT NULL DEFAULT '0',
  `amountOut` double NOT NULL DEFAULT '0',
  `transactionType` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'OUT',
  `descriptions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gen_exp_transaction`
--

INSERT INTO `gen_exp_transaction` (`generalExpanseTransactionID`, `generalExpanseID`, `amountIN`, `amountOut`, `transactionType`, `descriptions`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 0, 7000, 'OUT', NULL, NULL, '2018-07-24 17:27:30', '2018-07-24 17:54:45'),
(2, 3, 0, 5000, 'OUT', 'healthy', NULL, '2018-07-24 17:59:37', '2018-07-24 18:00:06'),
(3, 4, 0, 450, 'OUT', 'hgjnkm,.n', NULL, '2018-07-28 10:41:09', '2018-07-28 10:41:19'),
(4, 5, 0, 78000, 'OUT', 'jhjhfhf', NULL, '2018-07-28 10:41:30', '2018-07-28 10:41:40'),
(5, 2, 0, 5000, 'OUT', 'jhsjhjsh', NULL, '2018-07-28 10:43:51', '2018-07-28 10:44:06'),
(6, 2, 0, 4500, 'OUT', NULL, NULL, '2018-07-31 08:47:28', '2018-07-31 08:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `inexp_cat`
--

CREATE TABLE `inexp_cat` (
  `inexpCatID` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `projectID` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inexp_cat`
--

INSERT INTO `inexp_cat` (`inexpCatID`, `name`, `projectID`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Gulalo', 2, NULL, '2018-07-25 12:31:13', '2018-07-25 12:31:13'),
(2, 'Romantic', 2, NULL, '2018-07-25 12:33:08', '2018-07-25 12:33:08'),
(4, 'Dipen', 3, NULL, '2018-07-25 12:41:44', '2018-07-25 16:28:22'),
(5, 'Dipen Kumer', 3, NULL, '2018-07-25 12:41:51', '2018-07-25 16:28:13'),
(6, 'Cow', 2, NULL, '2018-07-25 16:14:39', '2018-07-25 16:14:39'),
(7, 'Dipen Kumer', 2, NULL, '2018-07-25 16:14:44', '2018-07-25 16:27:47'),
(8, 'loihghg', 4, NULL, '2018-07-27 15:19:17', '2018-07-27 15:19:17'),
(9, 'Arts Faculty', 4, NULL, '2018-07-27 15:19:23', '2018-07-27 15:19:23'),
(10, 'Sar', 5, NULL, '2018-07-28 10:52:22', '2018-07-28 10:52:22'),
(11, 'Sar', 8, NULL, '2018-07-31 08:49:26', '2018-07-31 08:49:26'),
(12, 'ijijif', 9, NULL, '2018-07-31 10:43:50', '2018-07-31 10:43:50'),
(13, 'oilo', 9, NULL, '2018-07-31 10:44:00', '2018-07-31 10:44:00'),
(14, 'Cow', 10, NULL, '2018-08-01 10:39:16', '2018-08-01 10:39:16'),
(15, 'lal', 10, NULL, '2018-08-01 10:39:23', '2018-08-01 10:39:23');

-- --------------------------------------------------------

--
-- Table structure for table `inexp_transaction`
--

CREATE TABLE `inexp_transaction` (
  `inexpTransactionID` int(10) UNSIGNED NOT NULL,
  `inexpCatID` int(10) UNSIGNED NOT NULL,
  `amountIN` double NOT NULL DEFAULT '0',
  `amountOut` double NOT NULL DEFAULT '0',
  `transactionType` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'OUT',
  `descriptions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `projectID` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inexp_transaction`
--

INSERT INTO `inexp_transaction` (`inexpTransactionID`, `inexpCatID`, `amountIN`, `amountOut`, `transactionType`, `descriptions`, `projectID`, `deleted_at`, `created_at`, `updated_at`) VALUES
(8, 5, 0, 7800, 'OUT', 'ji', 3, NULL, '2018-07-26 12:47:56', '2018-07-26 13:25:15'),
(9, 6, 0, 50000, 'OUT', NULL, 2, NULL, '2018-07-27 10:53:05', '2018-07-27 10:53:49'),
(11, 5, 0, 7000, 'OUT', NULL, 3, NULL, '2018-07-27 10:56:23', '2018-07-27 10:56:49'),
(12, 9, 0, 5802, 'OUT', NULL, 4, NULL, '2018-07-27 15:19:58', '2018-07-27 15:19:58'),
(15, 10, 0, 10000, 'OUT', 'hfdj', 5, NULL, '2018-07-28 11:08:07', '2018-07-28 11:08:37'),
(16, 10, 0, 600000, 'OUT', NULL, 5, NULL, '2018-07-29 11:48:53', '2018-07-29 11:48:53'),
(17, 10, 0, 70000000, 'OUT', NULL, 5, NULL, '2018-07-29 12:09:42', '2018-07-29 12:09:42'),
(18, 11, 0, 5000, 'OUT', NULL, 8, NULL, '2018-07-31 08:49:40', '2018-07-31 08:49:40'),
(19, 13, 0, 500, 'OUT', NULL, 9, NULL, '2018-07-31 10:44:21', '2018-07-31 10:44:21'),
(20, 15, 0, 5000, 'OUT', NULL, 10, NULL, '2018-08-01 10:40:40', '2018-08-01 10:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `investment`
--

CREATE TABLE `investment` (
  `investmentID` int(10) UNSIGNED NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `projectID` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investment`
--

INSERT INTO `investment` (`investmentID`, `amount`, `description`, `projectID`, `deleted_at`, `created_at`, `updated_at`) VALUES
(8, 50000, 'sfgh', 3, NULL, '2018-07-26 13:05:30', '2018-07-26 13:05:50'),
(9, 100000, NULL, 2, NULL, '2018-07-27 10:52:15', '2018-07-27 10:52:15'),
(10, 5000, NULL, 3, NULL, '2018-07-27 11:00:52', '2018-07-27 11:00:52'),
(11, 50000, NULL, 4, NULL, '2018-07-27 15:18:40', '2018-07-27 15:18:40'),
(12, 80000, 'Invest', 5, NULL, '2018-07-28 10:51:50', '2018-07-28 10:55:54'),
(13, 70000, 'today', 5, NULL, '2018-07-28 16:57:40', '2018-07-28 16:57:40'),
(14, 70000, NULL, 8, NULL, '2018-07-31 08:48:50', '2018-07-31 08:48:50'),
(15, 7000, NULL, 9, NULL, '2018-07-31 10:41:33', '2018-07-31 10:41:33'),
(16, 80000, NULL, 10, NULL, '2018-08-01 10:39:57', '2018-08-01 10:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_07_23_115515_create_table_projects', 1),
(4, '2018_07_23_115715_create_investment_table', 1),
(5, '2018_07_23_115926_create_income_expanse_category_table', 1),
(6, '2018_07_23_120045_create_income_expanse_transaction_table', 1),
(7, '2018_07_23_120502_create_general_expanse_table', 1),
(8, '2018_07_23_120822_create_general_exp_transaction_table', 1),
(9, '2018_07_23_120903_create_banks_table', 1),
(10, '2018_07_23_120936_create_bank_transaction_table', 1),
(11, '2018_07_23_122247_create_project_sell_table', 1),
(12, '2018_07_23_122248_create_project_transaction_table', 1);

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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `projectID` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` double NOT NULL DEFAULT '0',
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Running',
  `ending` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectID`, `name`, `balance`, `status`, `ending`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Dipen Kumer Das', 10000, 'Completed', '2018-07-31', NULL, '2018-07-24 10:05:58', '2018-07-30 20:16:05'),
(3, 'Comeddy', 28000, 'Completed', NULL, NULL, '2018-07-24 10:24:22', '2018-07-30 14:43:45'),
(4, 'Cow', 44198, 'Completed', NULL, NULL, '2018-07-27 15:17:42', '2018-07-29 18:52:19'),
(5, 'Capsicum', -70470000, 'Completed', NULL, NULL, '2018-07-28 10:51:14', '2018-07-29 16:05:05'),
(6, 'Sp Stocks', 0, 'Completed', NULL, NULL, '2018-07-29 16:00:08', '2018-07-29 16:02:58'),
(7, 'Subhash', 0, 'Completed', '2018-07-31', NULL, '2018-07-30 20:23:40', '2018-07-30 20:23:46'),
(8, 'Capcicum', 65000, 'Completed', '2018-07-31', NULL, '2018-07-31 08:48:16', '2018-07-31 08:53:01'),
(9, 'Iftekhar', 6500, 'Completed', '2018-07-31', NULL, '2018-07-31 10:40:48', '2018-07-31 10:46:01'),
(10, 'Sar', 75000, 'Completed', '2018-08-01', NULL, '2018-08-01 10:38:51', '2018-08-01 10:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `project_sell`
--

CREATE TABLE `project_sell` (
  `projectSellID` int(10) UNSIGNED NOT NULL,
  `descriptions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `projectID` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_sell`
--

INSERT INTO `project_sell` (`projectSellID`, `descriptions`, `amount`, `projectID`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'sell', 390, 3, NULL, '2018-07-26 10:50:37', '2018-07-26 10:50:37'),
(3, '1st', 100000, 5, NULL, '2018-07-29 11:52:14', '2018-07-29 11:52:14'),
(4, '2nd', 200000, 5, NULL, '2018-07-29 11:52:27', '2018-07-29 11:52:39'),
(5, '3rd', 300000, 5, NULL, '2018-07-29 11:52:57', '2018-07-29 11:52:57'),
(6, '4rth', 400000, 5, NULL, '2018-07-29 11:54:28', '2018-07-29 11:54:28'),
(7, NULL, 500000, 2, NULL, '2018-07-29 12:07:57', '2018-07-29 12:07:57'),
(8, NULL, 4500, 8, NULL, '2018-07-31 08:50:03', '2018-07-31 08:50:03'),
(9, NULL, 7000, 8, NULL, '2018-07-31 08:52:20', '2018-07-31 08:52:20'),
(10, NULL, 5000, 9, NULL, '2018-07-31 10:45:16', '2018-07-31 10:45:16'),
(11, NULL, 5000, 10, NULL, '2018-08-01 10:41:04', '2018-08-01 10:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `project_transaction`
--

CREATE TABLE `project_transaction` (
  `projectTransactionID` int(10) UNSIGNED NOT NULL,
  `projectID` int(10) UNSIGNED NOT NULL,
  `amountIN` double NOT NULL DEFAULT '0',
  `amountOut` double NOT NULL DEFAULT '0',
  `transactionType` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'IN',
  `descriptions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_transaction`
--

INSERT INTO `project_transaction` (`projectTransactionID`, `projectID`, `amountIN`, `amountOut`, `transactionType`, `descriptions`, `deleted_at`, `created_at`, `updated_at`) VALUES
(8, 3, 0, 7000, 'OUT', 'a:3:{s:6:\"sector\";s:7:\"Expanse\";s:3:\"ref\";s:2:\"11\";s:11:\"description\";N;}', NULL, '2018-07-26 12:47:56', '2018-07-27 10:56:50'),
(9, 3, 50000, 0, 'IN', 'a:3:{s:6:\"sector\";s:10:\"Investment\";s:3:\"ref\";s:1:\"8\";s:12:\"descriptions\";s:4:\"sfgh\";}', NULL, '2018-07-26 13:05:30', '2018-07-26 13:05:50'),
(10, 2, 100000, 0, 'IN', 'a:3:{s:6:\"sector\";s:10:\"Investment\";s:3:\"ref\";i:9;s:11:\"description\";N;}', NULL, '2018-07-27 10:52:15', '2018-07-27 10:52:15'),
(11, 2, 0, 50000, 'OUT', 'a:3:{s:6:\"sector\";s:7:\"Expanse\";s:3:\"ref\";s:1:\"9\";s:11:\"description\";N;}', NULL, '2018-07-27 10:53:05', '2018-07-27 10:53:49'),
(12, 3, 0, 7000, 'OUT', 'a:3:{s:6:\"sector\";s:7:\"Expanse\";s:3:\"ref\";s:2:\"11\";s:11:\"description\";N;}', NULL, '2018-07-27 10:55:22', '2018-07-27 10:56:50'),
(13, 3, 0, 7000, 'OUT', 'a:3:{s:6:\"sector\";s:7:\"Expanse\";s:3:\"ref\";s:2:\"11\";s:11:\"description\";N;}', NULL, '2018-07-27 10:56:23', '2018-07-27 10:56:50'),
(14, 3, 5000, 0, 'IN', 'a:3:{s:6:\"sector\";s:10:\"Investment\";s:3:\"ref\";i:10;s:11:\"description\";N;}', NULL, '2018-07-27 11:00:52', '2018-07-27 11:00:52'),
(15, 4, 50000, 0, 'IN', 'a:3:{s:6:\"sector\";s:10:\"Investment\";s:3:\"ref\";i:11;s:11:\"description\";N;}', NULL, '2018-07-27 15:18:40', '2018-07-27 15:18:40'),
(16, 4, 0, 5802, 'OUT', 'a:3:{s:6:\"sector\";s:7:\"Expanse\";s:3:\"ref\";i:12;s:11:\"description\";N;}', NULL, '2018-07-27 15:19:58', '2018-07-27 15:19:58'),
(17, 5, 80000, 0, 'IN', 'a:3:{s:6:\"sector\";s:10:\"Investment\";s:3:\"ref\";s:2:\"12\";s:12:\"descriptions\";s:6:\"Invest\";}', NULL, '2018-07-28 10:51:50', '2018-07-28 10:55:54'),
(20, 5, 0, 10000, 'OUT', 'a:3:{s:6:\"sector\";s:7:\"Expanse\";s:3:\"ref\";s:2:\"15\";s:11:\"description\";s:4:\"hfdj\";}', NULL, '2018-07-28 11:08:07', '2018-07-28 11:08:37'),
(21, 5, 70000, 0, 'IN', 'a:3:{s:6:\"sector\";s:10:\"Investment\";s:3:\"ref\";i:13;s:11:\"description\";s:5:\"today\";}', NULL, '2018-07-28 16:57:40', '2018-07-28 16:57:40'),
(22, 5, 0, 600000, 'OUT', 'a:3:{s:6:\"sector\";s:7:\"Expanse\";s:3:\"ref\";i:16;s:11:\"description\";N;}', NULL, '2018-07-29 11:48:53', '2018-07-29 11:48:53'),
(23, 5, 0, 70000000, 'OUT', 'a:3:{s:6:\"sector\";s:7:\"Expanse\";s:3:\"ref\";i:17;s:11:\"description\";N;}', NULL, '2018-07-29 12:09:42', '2018-07-29 12:09:42'),
(24, 8, 70000, 0, 'IN', 'a:3:{s:6:\"sector\";s:10:\"Investment\";s:3:\"ref\";i:14;s:11:\"description\";N;}', NULL, '2018-07-31 08:48:50', '2018-07-31 08:48:50'),
(25, 8, 0, 5000, 'OUT', 'a:3:{s:6:\"sector\";s:7:\"Expanse\";s:3:\"ref\";i:18;s:11:\"description\";N;}', NULL, '2018-07-31 08:49:40', '2018-07-31 08:49:40'),
(26, 9, 7000, 0, 'IN', 'a:3:{s:6:\"sector\";s:10:\"Investment\";s:3:\"ref\";i:15;s:11:\"description\";N;}', NULL, '2018-07-31 10:41:33', '2018-07-31 10:41:33'),
(27, 9, 0, 500, 'OUT', 'a:3:{s:6:\"sector\";s:7:\"Expanse\";s:3:\"ref\";i:19;s:11:\"description\";N;}', NULL, '2018-07-31 10:44:21', '2018-07-31 10:44:21'),
(28, 10, 80000, 0, 'IN', 'a:3:{s:6:\"sector\";s:10:\"Investment\";s:3:\"ref\";i:16;s:11:\"description\";N;}', NULL, '2018-08-01 10:39:57', '2018-08-01 10:39:57'),
(29, 10, 0, 5000, 'OUT', 'a:3:{s:6:\"sector\";s:7:\"Expanse\";s:3:\"ref\";i:20;s:11:\"description\";N;}', NULL, '2018-08-01 10:40:40', '2018-08-01 10:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userRoll` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Employee',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `nid`, `address`, `district`, `postcode`, `userRoll`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Dipen Kumer Das', 'admin@admin.com', '$2y$10$M0NZe8aUMeySzVeCRhHcR.gdbMiDXPsiuJkCFMuxIc6zHmmp0TDvu', '01719894414', '1234567890', 'Sylhet', 'Sylhet', '3030', 'Employee', NULL, '2Xx1A93ucx0VwpmRdmO8grltEPmXj61fZTl3t0iLGLg1tcytVCaDyt5Nfncx', '2018-08-07 08:27:15', '2018-08-07 19:21:10'),
(3, 'Sukanta', 'kitakortam@gmail.com', '$2y$10$twm3nEG6bwCTQrw0hmdWq.eHvrlPSeM5vsbgv5yJ7pYq2A9.ZfQFW', '4555555', '1234567890', 'Sylhet', 'Sylhet', '3030', 'Owner', NULL, 'YBqxK33sSEIrucwwZAuMzONGOLqrQtg3SRk84zkBTUA3vnfLvaS71wN2UqZx', '2018-08-07 08:53:54', '2018-08-07 08:53:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bankbook`
--
ALTER TABLE `bankbook`
  ADD PRIMARY KEY (`bankbookID`),
  ADD KEY `bankbook_bankid_index` (`bankID`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`bankID`);

--
-- Indexes for table `general_expanse`
--
ALTER TABLE `general_expanse`
  ADD PRIMARY KEY (`generalExpanseID`),
  ADD UNIQUE KEY `general_expanse_name_unique` (`name`);

--
-- Indexes for table `gen_exp_transaction`
--
ALTER TABLE `gen_exp_transaction`
  ADD PRIMARY KEY (`generalExpanseTransactionID`),
  ADD KEY `gen_exp_transaction_generalexpanseid_index` (`generalExpanseID`);

--
-- Indexes for table `inexp_cat`
--
ALTER TABLE `inexp_cat`
  ADD PRIMARY KEY (`inexpCatID`),
  ADD UNIQUE KEY `inexp_cat_name_projectid_unique` (`name`,`projectID`),
  ADD KEY `inexp_cat_projectid_index` (`projectID`);

--
-- Indexes for table `inexp_transaction`
--
ALTER TABLE `inexp_transaction`
  ADD PRIMARY KEY (`inexpTransactionID`),
  ADD KEY `inexp_transaction_inexpcatid_index` (`inexpCatID`),
  ADD KEY `inexp_transaction_projectid_index` (`projectID`);

--
-- Indexes for table `investment`
--
ALTER TABLE `investment`
  ADD PRIMARY KEY (`investmentID`),
  ADD KEY `investment_projectid_index` (`projectID`);

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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectID`);

--
-- Indexes for table `project_sell`
--
ALTER TABLE `project_sell`
  ADD PRIMARY KEY (`projectSellID`),
  ADD KEY `project_sell_projectid_index` (`projectID`);

--
-- Indexes for table `project_transaction`
--
ALTER TABLE `project_transaction`
  ADD PRIMARY KEY (`projectTransactionID`),
  ADD KEY `project_transaction_projectid_index` (`projectID`);

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
-- AUTO_INCREMENT for table `bankbook`
--
ALTER TABLE `bankbook`
  MODIFY `bankbookID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `bankID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `general_expanse`
--
ALTER TABLE `general_expanse`
  MODIFY `generalExpanseID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gen_exp_transaction`
--
ALTER TABLE `gen_exp_transaction`
  MODIFY `generalExpanseTransactionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inexp_cat`
--
ALTER TABLE `inexp_cat`
  MODIFY `inexpCatID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `inexp_transaction`
--
ALTER TABLE `inexp_transaction`
  MODIFY `inexpTransactionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `investment`
--
ALTER TABLE `investment`
  MODIFY `investmentID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projectID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `project_sell`
--
ALTER TABLE `project_sell`
  MODIFY `projectSellID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `project_transaction`
--
ALTER TABLE `project_transaction`
  MODIFY `projectTransactionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bankbook`
--
ALTER TABLE `bankbook`
  ADD CONSTRAINT `bankbook_bankid_foreign` FOREIGN KEY (`bankID`) REFERENCES `banks` (`bankID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `gen_exp_transaction`
--
ALTER TABLE `gen_exp_transaction`
  ADD CONSTRAINT `gen_exp_transaction_generalexpanseid_foreign` FOREIGN KEY (`generalExpanseID`) REFERENCES `general_expanse` (`generalExpanseID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `inexp_cat`
--
ALTER TABLE `inexp_cat`
  ADD CONSTRAINT `inexp_cat_projectid_foreign` FOREIGN KEY (`projectID`) REFERENCES `projects` (`projectID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `inexp_transaction`
--
ALTER TABLE `inexp_transaction`
  ADD CONSTRAINT `inexp_transaction_inexpcatid_foreign` FOREIGN KEY (`inexpCatID`) REFERENCES `inexp_cat` (`inexpCatID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `inexp_transaction_projectid_foreign` FOREIGN KEY (`projectID`) REFERENCES `projects` (`projectID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `investment`
--
ALTER TABLE `investment`
  ADD CONSTRAINT `investment_projectid_foreign` FOREIGN KEY (`projectID`) REFERENCES `projects` (`projectID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `project_sell`
--
ALTER TABLE `project_sell`
  ADD CONSTRAINT `project_sell_projectid_foreign` FOREIGN KEY (`projectID`) REFERENCES `projects` (`projectID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `project_transaction`
--
ALTER TABLE `project_transaction`
  ADD CONSTRAINT `project_transaction_projectid_foreign` FOREIGN KEY (`projectID`) REFERENCES `projects` (`projectID`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
