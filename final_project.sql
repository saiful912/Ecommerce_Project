-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 04, 2019 at 07:52 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Super Admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone_number`, `password`, `image`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Saiful Islam', 'mdsaifulislampyada@gmail.com', '01700899080', '$2y$10$5ZUUGxbldoux6zOmkZs.SuqbAJ10rv/yXzHoiI4VSzACY7jvSZHDC', 'c2921679b3396726c54288e1a3201b8b.jpg', 'Super Admin', NULL, '2019-09-02 08:06:46', '2019-09-04 13:42:34');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Home', NULL, '1567011247.jpg', '2019-08-28 10:54:07', '2019-08-28 10:54:07'),
(3, 'Face', NULL, '1567011265.jpg', '2019-08-28 10:54:25', '2019-08-28 10:54:25'),
(4, 'sexco', NULL, '1567011301.png', '2019-08-28 10:55:01', '2019-08-28 10:55:01'),
(5, 'Luchiffa', NULL, '1567011354.jpg', '2019-08-28 10:55:54', '2019-08-28 10:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `order_id`, `ip_address`, `product_quantity`, `created_at`, `updated_at`) VALUES
(53, 8, NULL, 3, '127.0.0.1', 1, '2019-09-04 02:19:30', '2019-09-04 02:20:30'),
(54, 9, NULL, 3, '127.0.0.1', 1, '2019-09-04 02:19:32', '2019-09-04 02:20:30'),
(55, 4, NULL, 4, '127.0.0.1', 1, '2019-09-04 02:39:23', '2019-09-04 02:40:05'),
(57, 12, NULL, NULL, '127.0.0.1', 1, '2019-09-04 08:41:35', '2019-09-04 08:41:35');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `parent_id`, `created_at`, `updated_at`) VALUES
(6, 'House', 'Terrible House', '1567001872.jpg', NULL, '2019-08-28 08:17:53', '2019-08-28 08:17:53'),
(7, 'Laptop', 'Terrible Leptop', '1567001914.jpg', NULL, '2019-08-28 08:18:34', '2019-08-28 08:18:34'),
(8, 'Man', 'Terrible Man', '1567001945.jpg', NULL, '2019-08-28 08:19:05', '2019-08-28 08:19:05'),
(9, 'Phone', 'Terrible Phone', '1567001970.jpg', NULL, '2019-08-28 08:19:30', '2019-08-28 08:19:30'),
(10, 'Horrors Phone', 'Horrors Phone can taking life', '1567002067.jpg', 9, '2019-08-28 08:21:07', '2019-08-28 08:21:07'),
(11, 'Horrors Laptop', 'Horrors Laptop Horrors Laptop', '1567002292.jpg', 7, '2019-08-28 08:24:53', '2019-08-28 08:24:53'),
(12, 'Horrors Man', 'Horrors Man Horrors Man', '1567002325.jpg', 8, '2019-08-28 08:25:25', '2019-08-28 08:25:25'),
(13, 'Horrors House', 'Horrors House Horrors House', '1567002380.jpg', 6, '2019-08-28 08:26:21', '2019-08-28 08:26:21'),
(14, 'Arcel Baw', 'He is not man', '1567009022.jpg', 8, '2019-08-28 10:17:02', '2019-08-28 10:17:02');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `division_id`, `created_at`, `updated_at`) VALUES
(2, 'Zalokathi', 10, '2019-08-30 03:02:58', '2019-08-30 03:02:58'),
(3, 'Savar', 9, '2019-08-30 03:03:10', '2019-08-30 03:03:10'),
(4, 'Pabna', 3, '2019-08-30 03:03:20', '2019-08-30 03:03:20'),
(5, 'Serpur', 2, '2019-08-30 03:03:33', '2019-08-30 03:03:33'),
(6, 'Comilla', 8, '2019-08-30 03:03:48', '2019-08-30 03:03:48'),
(7, 'Satkhira', 4, '2019-08-30 03:04:02', '2019-08-30 03:04:02'),
(8, 'Gaibandha', 7, '2019-08-30 03:04:14', '2019-08-30 03:04:14'),
(9, 'Habigonj', 6, '2019-08-30 03:04:23', '2019-08-30 03:04:23');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `priority`, `created_at`, `updated_at`) VALUES
(2, 'Mymensingh', 8, '2019-08-30 02:35:49', '2019-08-30 02:35:49'),
(3, 'Rajshahi', 2, '2019-08-30 02:36:17', '2019-08-30 02:36:17'),
(4, 'Khulna', 4, '2019-08-30 02:36:28', '2019-08-30 02:36:28'),
(6, 'Sylhet', 3, '2019-08-30 02:37:35', '2019-08-30 02:37:35'),
(7, 'Rangpur', 6, '2019-08-30 02:37:50', '2019-08-30 02:37:50'),
(8, 'Chittagong', 7, '2019-08-30 02:38:52', '2019-08-30 02:38:52'),
(9, 'Dhaka', 1, '2019-08-30 03:02:03', '2019-08-30 03:02:03'),
(10, 'Barishal', 5, '2019-08-30 03:02:15', '2019-08-30 03:02:15');

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
(3, '2019_08_10_185530_create_admins_table', 2),
(4, '2019_08_10_185655_create_categories_table', 2),
(5, '2019_08_10_190144_create_product_image_table', 3),
(6, '2019_08_10_191746_create_brands_table', 3),
(7, '2019_08_12_110123_create_sliders_table', 3),
(8, '2019_08_12_110433_create_divisions_table', 4),
(9, '2019_08_12_110525_create_settings_table', 4),
(10, '2019_08_12_110553_create_payments_table', 4),
(12, '2014_10_12_000000_create_users_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_charge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '60',
  `custom_discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `is_seen_by_admin` tinyint(1) NOT NULL DEFAULT '0',
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `ip_address`, `name`, `phone_no`, `shipping_address`, `shipping_charge`, `custom_discount`, `email`, `message`, `is_paid`, `is_completed`, `is_seen_by_admin`, `transaction_id`, `created_at`, `updated_at`) VALUES
(4, NULL, 2, '127.0.0.1', 'Roni', '01700899084', 'Mirpur,Dhaka', '60', '0', 'mdsaifulislampyada@gmail.com', 'Payment Home', 0, 0, 1, '123', '2019-09-04 02:40:05', '2019-09-04 02:40:19');

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
('mdsaifulislampyada@gmail.com', '$2y$10$DJAuqhygxQA/yYV6TM5Wd.pYsidAYhgXlyxkds72GcUkF8d5cl.OG', '2019-09-02 11:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` tinyint(4) NOT NULL DEFAULT '1',
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Payment No',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Agent|Personal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `image`, `priority`, `short_name`, `no`, `type`, `created_at`, `updated_at`) VALUES
(1, 'cash_in', 'image.jpg', 1, 'cash_in', NULL, NULL, '2019-09-01 19:09:13', '2019-09-01 19:09:13'),
(2, 'Rocket', 'image.jpg', 2, 'rocket', '017008990840', 'personal', '2019-09-01 19:10:16', '2019-09-01 19:10:16'),
(3, 'Bkash', 'image.jpg', 3, 'bkash', '01700899084', 'personal', '2019-09-01 19:11:49', '2019-09-01 19:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `title`, `description`, `slug`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(4, 13, 2, 'Horror House', 'This Place is very Dangerous and Horrors', 'horror-house', 2, 355000, '2019-08-28 07:54:05', '2019-08-29 00:38:45'),
(5, 11, 5, 'Horror Laptop', 'This Laptop develop by Arcrusa', 'horror-laptop', 3, 180000, '2019-08-28 07:56:08', '2019-08-29 00:38:26'),
(6, 12, 3, 'Horror Man', 'The man was died 1917', 'horror-man', 1, 248000, '2019-08-28 07:57:09', '2019-08-29 00:38:11'),
(7, 10, 4, 'Horror Phone', 'The phone uses by Ghost', 'horror-phone', 4, 45000, '2019-08-28 08:10:35', '2019-08-29 00:37:54'),
(8, 13, 2, 'Batla House', 'People died here', 'batla-house', 2, 450000, '2019-08-28 08:12:20', '2019-08-29 00:37:39'),
(9, 11, 5, 'Dead Laptop', 'The Laptop died by 1890', 'dead-laptop', 1, 280000, '2019-08-28 08:14:31', '2019-08-29 00:37:24'),
(10, 13, 2, 'Arcell House', 'Arcell House is very dangerous', 'arcell-house', 1, 346000, '2019-08-28 12:00:32', '2019-08-29 00:36:21'),
(11, 14, 3, 'Arcel Baw', 'Arcell Baw Arcell Baw Arcell Baw', 'arcel-baw', 1, 490000, '2019-08-29 00:32:53', '2019-08-29 00:32:53'),
(12, 10, 5, 'Lqiu Phone', 'Lqiu Phone Lqiu Phone Lqiu Phone', 'lqiu-phone', 1, 126000, '2019-08-29 00:41:06', '2019-08-29 00:41:06'),
(14, 12, 3, 'Princes Lumaqo', 'Princes Lumaqo was dies 1902', 'princes-lumaqo', 1, 234000, '2019-08-29 00:45:59', '2019-08-29 00:45:59'),
(15, 11, 5, 'Laptop 1730', 'Laptop 1730 Laptop 1730 Laptop 1730', 'laptop-1730', 1, 234000, '2019-08-29 00:54:12', '2019-08-29 00:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(15, 4, '1567000445.jpg', '2019-08-28 07:54:05', '2019-08-28 07:54:05'),
(16, 5, '1567000568.jpg', '2019-08-28 07:56:08', '2019-08-28 07:56:08'),
(17, 6, '1567000629.jpg', '2019-08-28 07:57:09', '2019-08-28 07:57:09'),
(18, 7, '1567001436.jpg', '2019-08-28 08:10:36', '2019-08-28 08:10:36'),
(19, 8, '1567001540.jpg', '2019-08-28 08:12:20', '2019-08-28 08:12:20'),
(20, 9, '1567001672.jpg', '2019-08-28 08:14:33', '2019-08-28 08:14:33'),
(21, 10, '1567015232.jpg', '2019-08-28 12:00:33', '2019-08-28 12:00:33'),
(22, 11, '1567060373.jpg', '2019-08-29 00:32:55', '2019-08-29 00:32:55'),
(23, 12, '1567060866.jpg', '2019-08-29 00:41:06', '2019-08-29 00:41:06'),
(24, 13, '1567061077.jpg', '2019-08-29 00:44:37', '2019-08-29 00:44:37'),
(25, 14, '1567061159.jpg', '2019-08-29 00:46:00', '2019-08-29 00:46:00'),
(26, 15, '1567061652.jpg', '2019-08-29 00:54:12', '2019-08-29 00:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` int(10) UNSIGNED NOT NULL DEFAULT '100',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `phone_no`, `address`, `shipping_cost`, `created_at`, `updated_at`) VALUES
(1, 'saiful', '01700899084', 'mirpur,Dhaka', 100, '2019-09-01 18:19:11', '2019-09-01 18:19:11');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` tinyint(3) UNSIGNED NOT NULL DEFAULT '10',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `button_text`, `button_link`, `priority`, `created_at`, `updated_at`) VALUES
(2, 'Horror House Slider', '1567519437.jpg', 'Ghost', 'https://www.google.com', 5, '2019-09-03 08:03:57', '2019-09-03 08:03:57'),
(3, 'Horror Laptop Slider', '1567519494.jpg', 'Ghost', 'https://www.google.com', 5, '2019-09-03 08:04:54', '2019-09-03 08:04:54'),
(4, 'Horrors Man slider', '1567519547.jpg', 'Ghost', 'https://www.google.com', 5, '2019-09-03 08:05:47', '2019-09-03 08:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `division_id` int(10) UNSIGNED NOT NULL COMMENT 'Division Table ID',
  `district_id` int(10) UNSIGNED NOT NULL COMMENT 'District Table ID',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0=Inactive|1=active|2=Ban',
  `shipping_address` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone_no`, `email`, `password`, `address`, `division_id`, `district_id`, `image`, `status`, `shipping_address`, `remember_token`, `created_at`, `updated_at`) VALUES
(11, 'Saiful', '01700899084', 'mdsaifulislampyada@gmail.com', '$2y$10$Ki6w9hGkJWYVfpcvyWKTOO7FJDl1Lc3ZmLx5icCfY3VobxFzcovWi', 'Mirpur,section-2,Dhaka', 9, 3, '5109f58444a1715f900f2739f4c05ed3.jpg', 1, NULL, NULL, '2019-08-31 10:21:42', '2019-08-31 11:21:05'),
(12, 'Roni', '01700899085', 'mdroni@gmail.com', '$2y$10$JVUEd5e/lGjaG2/GDZR8HOzPDFISW/6GB1MiI/VGA3NvribsyCpR2', 'Mirpur,section-2,Dhaka', 9, 3, 'image_5d6aaced8e32d5.63854047RrQoIf1H3L.jpg', 1, NULL, NULL, '2019-08-31 11:22:53', '2019-08-31 11:23:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_phone_number_unique` (`phone_number`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_short_name_unique` (`short_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_phone_no_unique` (`phone_no`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
