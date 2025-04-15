-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2024 at 03:12 PM
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
-- Database: `new_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`id`, `order_id`, `user_id`, `name`, `email`, `phone`, `company`, `address`, `notes`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'abc', 'abc123@gmail.com', '123123', 'asdasdas', 'asdasd', 'rgadgdfg', '2024-09-13 18:30:38', NULL),
(2, 3, 1, 'abc', 'abc123@gmail.com', '123123', 'asdasdas', 'asdasd', 'rgadgdfg', '2024-09-13 18:32:10', NULL),
(3, 4, 1, 'abc', 'abc123@gmail.com', '912031203', 'asdasdas', 'fdshggds', 'rweatwetewat', '2024-09-13 18:36:28', NULL),
(4, 5, 5, '123', '123@gmail.com', '09867435341', NULL, 'dhaka', NULL, '2024-09-15 08:43:08', NULL),
(5, 6, 5, '123', '123@gmail.com', '09867435341', NULL, 'dhaka', NULL, '2024-09-15 08:43:56', NULL),
(6, 7, 5, '123', '123@gmail.com', '09867435341', NULL, 'dhaka', NULL, '2024-09-15 08:46:20', NULL),
(7, 8, 5, '123', '123@gmail.com', '09867435341', NULL, 'dhaka', 'dsads', '2024-09-15 08:46:36', NULL),
(8, 9, 5, '123', '123@gmail.com', '09867435341', NULL, 'dhaka', NULL, '2024-09-15 08:52:20', NULL),
(9, 10, 5, '123', '123@gmail.com', '09867435341', NULL, 'dhaka', NULL, '2024-09-15 08:53:03', NULL),
(10, 11, 5, '123', '123@gmail.com', '09867435341', NULL, 'dhaka', 's', '2024-09-15 08:54:04', NULL),
(11, 12, 5, '123', '123@gmail.com', '09867435341', NULL, 'dhaka', NULL, '2024-09-15 08:55:27', NULL),
(12, 13, 5, '123', '123@gmail.com', '09867435341', NULL, 'dhaka', 'wds', '2024-09-15 09:02:52', NULL),
(13, 14, 5, '123', '123@gmail.com', '09867435341', NULL, 'dhaka', 'sa', '2024-09-15 09:04:34', NULL),
(14, 15, 5, '123', '123@gmail.com', '09867435341', NULL, 'dhaka', 'sdfff', '2024-09-15 09:12:18', NULL),
(15, 16, 5, '123', '123@gmail.com', '09867435341', NULL, 'dhaka', 'sdfff', '2024-09-15 09:12:24', NULL),
(16, 17, 5, '123', '123@gmail.com', '12345678912', NULL, 'dhaka', 'tgh', '2024-09-15 09:15:05', NULL),
(17, 18, 6, '123', '123@hotmail.com', '1862603774', NULL, 'dsfsdv', 'hgfhg', '2024-09-16 11:02:03', NULL),
(18, 19, 6, '123', '123@hotmail.com', '1862603774', NULL, 'dsfsdv', 'fgd', '2024-09-16 11:04:02', NULL),
(19, 20, 6, '123', '123@hotmail.com', '1862603774', NULL, 'dsfsdv', 'rg', '2024-09-20 06:29:30', NULL),
(20, 21, 6, '123', '123@hotmail.com', '1862603774', NULL, 'dsfsdv', 'dsa', '2024-09-20 06:34:26', NULL),
(21, 22, 6, '123', '123@hotmail.com', '1862603774', NULL, 'dfdsf', 'leave on doorstep', '2024-09-20 06:39:18', NULL),
(22, 24, 6, '123', '123@hotmail.com', '1862603774', NULL, 'dfdsf', 'sd', '2024-09-20 06:41:12', NULL),
(23, 25, 2, 'User1', 'user1@gmail.com', '123123', NULL, 'Dhaka', 'nothing to note.', '2024-09-20 11:52:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) DEFAULT NULL,
  `size_id` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_image`, `added_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'plants', NULL, 1, NULL, '2024-09-13 18:11:24', NULL),
(2, 'Seeds', NULL, 1, NULL, '2024-09-13 18:15:06', NULL),
(3, 'fruits', '3.jpg', 1, NULL, '2024-09-13 19:29:44', '2024-09-13 19:29:44');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_name` varchar(255) NOT NULL,
  `color_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `validity` date NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_logins`
--

CREATE TABLE `customer_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_logins`
--

INSERT INTO `customer_logins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(2, 'User1', 'user1@gmail.com', '$2y$10$LrjoH50ctCTAdIAOQg0wueoK4VyYTH0o0lYtQnQVWELAeKPeN6BLS', '2024-09-13 23:14:06', NULL),
(3, 'Alif', 'alif321@gmail.com', '$2y$10$jsQjz7ML3E/DSv2S4SZoaObIxNf8M.w83jS38Hw0D6FsHWlSUvjYu', '2024-09-13 23:15:36', NULL),
(4, 'user2', 'user2@gmail.com', '$2y$10$0mmEl5XGr9y3J8.ILLy32eJtdjbllDpgQadoS83zfV7BcCx5GdL9G', '2024-09-14 09:24:17', NULL),
(5, '123', '123@gmail.com', '$2y$10$HKinUc5kmlsdCzpBlUulYePz5pxfjzTcCSKU3WjQE1y6x8A0OhoG.', '2024-09-15 08:39:16', NULL),
(6, '123', '123@hotmail.com', '$2y$10$69Ru2d9e4nGeVDMctzeEKuZxH6WdTKEep4xP4F8klKxv.Nd9M/TTS', '2024-09-16 10:47:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_pass_resets`
--

CREATE TABLE `customer_pass_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_verifies`
--

CREATE TABLE `email_verifies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `product_id`, `color_id`, `size_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 5, NULL, NULL, 2, '2024-09-13 18:28:20', '2024-09-13 18:36:29'),
(2, 7, NULL, NULL, 50, '2024-09-13 23:18:18', '2024-09-20 11:52:37'),
(3, 8, NULL, NULL, 58, '2024-09-13 23:18:38', '2024-09-20 11:52:37'),
(4, 9, NULL, NULL, 51, '2024-09-13 23:18:49', '2024-09-20 11:48:03'),
(5, 10, NULL, NULL, 10, '2024-09-20 11:47:44', NULL),
(6, 12, NULL, NULL, 70, '2024-09-20 11:51:37', NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_16_225832_create_categories_table', 1),
(6, '2022_07_15_000545_create_sub_categories_table', 1),
(7, '2022_07_22_011102_create_products_table', 1),
(8, '2022_07_25_232802_create_thumbnails_table', 1),
(9, '2022_07_29_234849_create_colors_table', 1),
(10, '2022_07_29_234930_create_sizes_table', 1),
(11, '2022_07_30_231923_create_inventories_table', 1),
(12, '2022_08_17_235231_create_customer_logins_table', 1),
(13, '2022_08_18_165430_create_carts_table', 1),
(14, '2022_08_23_020044_create_coupons_table', 1),
(15, '2022_08_26_153345_create_orders_table', 1),
(16, '2022_08_26_155147_create_billing_details_table', 1),
(17, '2022_08_26_230219_create_order_products_table', 1),
(18, '2022_09_08_000637_create_customer_pass_resets_table', 1),
(19, '2022_09_08_231304_create_email_verifies_table', 1),
(20, '2022_09_14_164200_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `charge` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `sub_total`, `discount`, `charge`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 285, 0, 70, 355, '2024-09-13 18:30:16', NULL),
(2, 1, 285, 0, 70, 285, '2024-09-13 18:30:38', NULL),
(3, 1, 285, 0, 70, 285, '2024-09-13 18:32:10', NULL),
(4, 1, 285, 0, 70, 355, '2024-09-13 18:36:28', NULL),
(5, 5, 180, 0, 70, 250, '2024-09-15 08:43:08', NULL),
(6, 5, 180, 0, 120, 300, '2024-09-15 08:43:56', NULL),
(7, 5, 180, 0, 120, 300, '2024-09-15 08:46:20', NULL),
(8, 5, 180, 0, 120, 300, '2024-09-15 08:46:36', NULL),
(9, 5, 720, 0, 70, 790, '2024-09-15 08:52:20', NULL),
(10, 5, 720, 0, 70, 790, '2024-09-15 08:53:03', NULL),
(11, 5, 720, 0, 70, 790, '2024-09-15 08:54:04', NULL),
(12, 5, 720, 0, 70, 790, '2024-09-15 08:55:27', NULL),
(13, 5, 270, 0, 120, 390, '2024-09-15 09:02:52', NULL),
(14, 5, 305, 0, 70, 375, '2024-09-15 09:04:34', NULL),
(15, 5, 0, 0, 70, 70, '2024-09-15 09:12:18', NULL),
(16, 5, 0, 0, 70, 70, '2024-09-15 09:12:24', NULL),
(17, 5, 135, 0, 70, 205, '2024-09-15 09:15:05', NULL),
(18, 6, 270, 0, 70, 340, '2024-09-16 11:02:03', NULL),
(19, 6, 340, 0, 70, 410, '2024-09-16 11:04:02', NULL),
(20, 6, 645, 0, 120, 765, '2024-09-20 06:29:30', NULL),
(21, 6, 405, 0, 70, 475, '2024-09-20 06:34:26', NULL),
(22, 6, 270, 0, 70, 340, '2024-09-20 06:39:18', NULL),
(23, 6, 270, 0, 70, 340, '2024-09-20 06:41:06', NULL),
(24, 6, 270, 0, 70, 340, '2024-09-20 06:41:12', NULL),
(25, 2, 495, 0, 70, 565, '2024-09-20 11:52:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `review` varchar(255) DEFAULT NULL,
  `star` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `user_id`, `order_id`, `product_id`, `quantity`, `price`, `review`, `star`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 5, 3, 95, NULL, NULL, '2024-09-13 18:36:29', NULL),
(2, 5, 5, 8, 1, 180, NULL, NULL, '2024-09-15 08:43:08', NULL),
(3, 5, 6, 8, 1, 180, NULL, NULL, '2024-09-15 08:43:56', NULL),
(4, 5, 7, 8, 1, 180, NULL, NULL, '2024-09-15 08:46:20', NULL),
(5, 5, 8, 8, 1, 180, NULL, NULL, '2024-09-15 08:46:36', NULL),
(6, 5, 9, 8, 4, 180, NULL, NULL, '2024-09-15 08:52:20', NULL),
(7, 5, 10, 8, 4, 180, NULL, NULL, '2024-09-15 08:53:03', NULL),
(8, 5, 11, 8, 4, 180, NULL, NULL, '2024-09-15 08:54:04', NULL),
(9, 5, 12, 8, 4, 180, NULL, NULL, '2024-09-15 08:55:27', NULL),
(10, 5, 13, 7, 2, 135, NULL, NULL, '2024-09-15 09:02:52', NULL),
(11, 5, 14, 9, 1, 170, NULL, NULL, '2024-09-15 09:04:34', NULL),
(12, 5, 14, 7, 1, 135, NULL, NULL, '2024-09-15 09:04:34', NULL),
(13, 5, 17, 7, 1, 135, NULL, NULL, '2024-09-15 09:15:05', NULL),
(14, 6, 18, 7, 2, 135, NULL, NULL, '2024-09-16 11:02:03', NULL),
(15, 6, 19, 9, 2, 170, NULL, NULL, '2024-09-16 11:04:02', NULL),
(16, 6, 20, 9, 3, 170, NULL, NULL, '2024-09-20 06:29:30', NULL),
(17, 6, 20, 7, 1, 135, NULL, NULL, '2024-09-20 06:29:30', NULL),
(18, 6, 21, 7, 3, 135, NULL, NULL, '2024-09-20 06:34:26', NULL),
(19, 6, 22, 7, 2, 135, NULL, NULL, '2024-09-20 06:39:18', NULL),
(20, 6, 24, 7, 2, 135, NULL, NULL, '2024-09-20 06:41:12', NULL),
(21, 2, 25, 7, 1, 135, NULL, NULL, '2024-09-20 11:52:37', NULL),
(22, 2, 25, 8, 2, 180, NULL, NULL, '2024-09-20 11:52:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `after_discount` decimal(8,2) DEFAULT NULL,
  `short_desp` varchar(255) DEFAULT NULL,
  `long_desp` longtext DEFAULT NULL,
  `sku` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `preview` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `product_name`, `product_price`, `discount`, `after_discount`, `short_desp`, `long_desp`, `sku`, `slug`, `preview`, `created_at`, `updated_at`) VALUES
(7, 1, 2, 'Spider Plant', 150, 10, 135.00, 'A popular air-purifying indoor plant with long, arching leaves and small white flowers. Perfect for hanging baskets.', NULL, 'Spid-d6syY0', 'spider-plant-5201', '7.webp', '2024-09-13 22:45:14', '2024-09-13 22:45:15'),
(8, 1, 2, 'Money Plant', 180, NULL, 180.00, 'Known for its rounded, lush green leaves, this low-maintenance plant brings good luck and enhances home decor.', NULL, 'Mone-vyLSa2', 'money-plant-73', '8.webp', '2024-09-13 22:46:29', '2024-09-13 22:46:29'),
(9, 1, 2, 'Aloe Vera', 200, 15, 170.00, 'A versatile succulent plant known for its medicinal properties. Requires minimal watering and can be used for skin care.', NULL, 'Aloe-GbQxM0', 'aloe-vera-3304', '9.webp', '2024-09-13 22:47:36', '2024-09-13 22:47:36'),
(12, 3, 4, 'Apple', 200, NULL, 200.00, 'Healthy and Tasty Apples', NULL, 'Appl-eB43w3', 'apple-333', '12.jpg', '2024-09-20 11:51:19', '2024-09-20 11:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name`, `created_at`, `updated_at`) VALUES
(2, 1, 'plants', '2024-09-13 22:37:43', NULL),
(3, 2, 'seeds', '2024-09-13 22:37:58', NULL),
(4, 3, 'fruits', '2024-09-13 22:38:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `thumbnails`
--

CREATE TABLE `thumbnails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thumbnails`
--

INSERT INTO `thumbnails` (`id`, `product_id`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 5, '5-1.jpg', '2024-09-13 18:26:04', NULL),
(2, 6, '6-1.jpg', '2024-09-13 18:39:27', NULL),
(3, 7, '7-1.webp', '2024-09-13 22:45:15', NULL),
(4, 8, '8-1.webp', '2024-09-13 22:46:29', NULL),
(5, 9, '9-1.webp', '2024-09-13 22:47:37', NULL),
(6, 10, '10-1.jpg', '2024-09-14 08:33:43', NULL),
(7, 11, '11-1.jpg', '2024-09-14 10:32:51', NULL),
(8, 12, '12-1.jpg', '2024-09-20 11:51:20', NULL);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Admin1', 'admin1@gmail.com', NULL, '$2y$10$zX8zPPGb43xrZI.avjV4Puw/7MF0gTZIHagnYCmfNOwGafJoDtR1K', 'Xe39mXpYu5mRKR7e2JqEJ4EfWBdhRHOPF0omNpAt5KQOHqIPpfmhRam1J2gF', '2024-09-13 23:13:25', '2024-09-13 23:13:25'),
(3, 'abc', 'abc@hotmail', NULL, '$2y$10$kXY9JdACE.gq/t81YzolQe0IwBKJ4xU7D/BDkeXgQ00lVykoL4mTi', 'qadV1m43PoBOtriOIBgrRxQn6xiVbgmfdE91dEUjTINLAeYsYivGBSGmhCqa', '2024-09-15 08:32:25', '2024-09-15 08:32:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
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
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_logins`
--
ALTER TABLE `customer_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_pass_resets`
--
ALTER TABLE `customer_pass_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_verifies`
--
ALTER TABLE `email_verifies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thumbnails`
--
ALTER TABLE `thumbnails`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_logins`
--
ALTER TABLE `customer_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_pass_resets`
--
ALTER TABLE `customer_pass_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_verifies`
--
ALTER TABLE `email_verifies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `thumbnails`
--
ALTER TABLE `thumbnails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
