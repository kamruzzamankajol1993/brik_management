-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2022 at 11:51 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brick_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ward_id` int(100) DEFAULT NULL,
  `staff_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_main_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(20) DEFAULT 1,
  `cstatus` int(11) DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `ward_id`, `staff_id`, `staff_main_id`, `name`, `email`, `phone`, `username`, `email_verified_at`, `password`, `image`, `status`, `cstatus`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, '4004', NULL, 'superadmin', 'superadmin@gmail.com', NULL, 'superadmin', NULL, '$2y$10$P7XKbcdy.V46KeuF1PljgOoXXfAQvqjuZkPg71AyMlNUkdcWbBXjS', 'user-photo/1645269974.jpg', 1, 5, 'FG02fU5JUxwMYkzV3EyWJHZ8MixpTEkr4g8Motf3KkUXzlRZQzQ5COL0TSBB', '2021-03-24 05:29:53', '2022-02-19 05:26:14'),
(2, NULL, NULL, NULL, 'admin', 'kajol1122018@gmail.com', NULL, NULL, NULL, '$2y$10$dSPMgoOjeaGN2C1kaNe1aeJFSr5wh5I8IWe0C5tIncxF2LUkp6toS', NULL, 1, 5, NULL, '2021-03-24 06:14:00', '2022-08-10 03:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `caranddrivers`
--

CREATE TABLE `caranddrivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `caranddrivers`
--

INSERT INTO `caranddrivers` (`id`, `main_date`, `driver_name`, `car_number`, `contact_no`, `status`, `created_at`, `updated_at`) VALUES
(3, '2022-11-16', 'Rasel', '12345', '54322', '1', '2022-11-16 03:19:32', '2022-11-16 03:19:32'),
(4, '2022-11-16', 'Ranu', '54443', '54543543', '1', '2022-11-16 03:19:48', '2022-11-16 03:19:48');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_cat` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_one` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_two` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_three` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_four` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_five` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_six` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_seven` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_eight` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `image`, `cat_name`, `sub_cat`, `child_one`, `child_two`, `child_three`, `child_four`, `child_five`, `child_six`, `child_seven`, `child_eight`, `status`, `created_at`, `updated_at`) VALUES
(9, NULL, 'Cosplay Products', 'Anime', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-12 05:19:09', '2022-08-12 05:19:09'),
(15, NULL, 'Jewelry & Accessories', 'Headband', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-16 02:12:49', '2022-08-16 02:12:49'),
(16, NULL, 'Shoes Collection', 'Casual Shoes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-16 02:14:53', '2022-08-16 02:14:53'),
(17, NULL, 'Women Collection', 'Crop Top', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-08-16 02:17:21', '2022-08-16 02:17:21'),
(23, NULL, 'Panjabi Collection', 'Casual Punjabi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-08-16 06:32:34', '2022-08-16 06:32:34'),
(24, NULL, 'Kids Collection', '1-5 Years', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-08-16 06:46:56', '2022-08-16 06:46:56'),
(25, NULL, 'Jersey Collection', 'Half Sleeve', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-08-16 06:47:50', '2022-08-16 06:47:50'),
(26, NULL, 'Denim Collection', 'Jeans', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-08-16 06:48:12', '2022-08-16 06:48:12'),
(27, NULL, 'Shirt Collection', 'Half Sleeve Shirt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-08-16 06:48:38', '2022-08-16 06:48:38'),
(28, NULL, 'Winter Collection', 'Hoodie Collection', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-08-16 06:49:30', '2022-08-16 06:49:30'),
(29, NULL, 'Bottom Wear', 'TROUSERS & JOGGERS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-08-16 06:49:45', '2022-08-16 06:49:45'),
(33, NULL, 'T-Shirt Collection', 'Full Sleeve T-Shirt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-08-17 01:56:16', '2022-08-17 01:56:16'),
(42, NULL, 'T-Shirt Collection', 'Half Sleeve T-Shirt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-11-07 15:49:59', '2022-11-07 15:49:59'),
(43, NULL, 'T-Shirt Collection', 'Drop Shoulder T-Shirt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-11-07 15:52:04', '2022-11-07 15:52:04'),
(44, NULL, 'T-Shirt Collection', 'Polo T-Shirt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-11-07 15:53:49', '2022-11-07 15:53:49'),
(45, NULL, 'T-Shirt Collection', 'Raglan Full Sleeve T-Shirt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-11-07 15:54:55', '2022-11-07 15:54:55'),
(46, NULL, 'T-Shirt Collection', 'Raglan Half Sleeve T-Shirt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-11-07 15:56:09', '2022-11-07 15:56:09'),
(47, NULL, 'Denim Collection', 'Jeans', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-11-07 16:01:54', '2022-11-07 16:01:54'),
(48, NULL, 'Winter Collection', 'Bomber Jacket', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-11-07 16:04:07', '2022-11-07 16:04:07'),
(49, NULL, 'Winter Collection', 'Tracksuits', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-11-07 23:16:16', '2022-11-07 23:16:16'),
(52, NULL, 'Shirt Collection', 'Full Sleeve Shirt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-11-07 23:22:49', '2022-11-07 23:22:49'),
(53, NULL, 'Jersey Collection', 'Full Sleeve', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-11-07 23:26:47', '2022-11-07 23:26:47'),
(54, NULL, 'Kids Collection', '6-10 Years', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-11-07 23:28:02', '2022-11-07 23:28:02'),
(55, NULL, 'Panjabi Collection', 'Kabli Punjabi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-11-07 23:30:21', '2022-11-07 23:30:21'),
(56, NULL, 'Jewelry & Accessories', 'Pendant Necklace', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-11-07 23:35:13', '2022-11-07 23:35:13'),
(57, NULL, 'Jewelry & Accessories', 'Pendant Key Ring', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-11-07 23:35:38', '2022-11-07 23:35:38'),
(58, NULL, 'Jewelry & Accessories', 'Bracelet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-11-07 23:36:00', '2022-11-07 23:36:00'),
(59, NULL, 'Jewelry & Accessories', 'Note Book', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-11-07 23:36:17', '2022-11-07 23:36:17'),
(60, NULL, 'Cosplay Products', 'DC/Marvel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-11-07 23:37:33', '2022-11-07 23:37:33'),
(61, NULL, 'Cosplay Products', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-11-07 23:37:45', '2022-11-07 23:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `category_banners`
--

CREATE TABLE `category_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_three` varchar(2555) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_banners`
--

INSERT INTO `category_banners` (`id`, `cat_id`, `t_one`, `t_two`, `t_three`, `image`, `created_at`, `updated_at`) VALUES
(2, 'T-Shirt Collection', 'Made In Bangladesh', 'Now Available', 'Best Product In Town', 'public/product_images/Half-Sleeve-T-Shirt.jpg', '2022-09-22 06:46:36', '2022-11-10 00:25:49'),
(3, 'Winter Collection', 'Winter Is Coming', 'Now Available', 'Winter Collection 2022', 'public/product_images/Hoodie.jpg', '2022-09-22 06:48:22', '2022-11-10 00:26:30'),
(4, 'Jersey Collection', 'Wear Your Jersey With Pride', 'Now Available', 'Best Quality Best Fabric', 'public/product_images/jersey.jpg', '2022-09-22 06:48:37', '2022-11-10 00:28:58'),
(6, 'Jewelry & Accessories', NULL, NULL, NULL, 'public/product_images/ACCES.jpg', '2022-11-08 12:21:23', '2022-11-10 00:21:39'),
(7, 'Shirt Collection', NULL, NULL, NULL, 'public/product_images/Shirt.jpg', '2022-11-08 12:21:48', '2022-11-08 16:34:45');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `c_type`, `name`, `slug`, `phone`, `email`, `address`, `shipping_address`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(20, NULL, 'Ashikur Rahman Mohin', 'ashikur-rahman-mohin_01743763369', '01743763369', 'spotlightattires@gmail.com', 'ADARSHA BUILDERS LTD. 1383/8/1 & 2  , Shohar Khilgaon (7th Floor)', NULL, NULL, NULL, '2022-11-10 17:06:01', '2022-11-10 17:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `consigment_details`
--

CREATE TABLE `consigment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `consigment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consigment_details`
--

INSERT INTO `consigment_details` (`id`, `consigment_id`, `product_name`, `quantity`, `price`, `status`, `created_at`, `updated_at`) VALUES
(3, '1', 'ttt', '44', '44444', '2', '2022-11-15 03:51:23', '2022-11-15 03:51:23'),
(4, '1', 'eee', '3', '33333', '2', '2022-11-15 03:51:23', '2022-11-15 03:51:23'),
(5, '2', 'ttt', '33', '33', '1', '2022-11-16 03:04:29', '2022-11-16 03:09:05'),
(6, '2', 'eee', '50', '900', '1', '2022-11-16 03:04:29', '2022-11-16 03:09:05'),
(7, '3', 'Brick 3', '10', '1000', '1', '2022-11-16 03:20:55', '2022-11-16 03:21:21'),
(8, '3', 'Brick 2', '10', '2000', '1', '2022-11-16 03:20:55', '2022-11-16 03:21:21');

-- --------------------------------------------------------

--
-- Table structure for table `consignments`
--

CREATE TABLE `consignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rmain_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `consignment_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `select_truck` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consignments`
--

INSERT INTO `consignments` (`id`, `main_date`, `rmain_date`, `consignment_number`, `client_name`, `delivery_address`, `contact`, `select_truck`, `driver_name`, `driver_contact`, `request_type`, `status`, `created_at`, `updated_at`) VALUES
(3, '2022-11-16', '2022-11-16', 'SFP8B5Y42X', 'Mr.Rahim', 'Rajshahi', '2333333', '54443', 'Ranu', '54543543', 'Normal', '1', '2022-11-16 03:20:55', '2022-11-16 03:21:21');

-- --------------------------------------------------------

--
-- Table structure for table `consiproducts`
--

CREATE TABLE `consiproducts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `consignment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lot_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sell_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `main_date`, `product_name`, `lot_number`, `quantity`, `sell_quantity`, `status`, `created_at`, `updated_at`) VALUES
(3, '2022-11-16', 'Brick 3', 'BE8T7945AJ', '4990', NULL, '1', '2022-11-16 03:16:41', '2022-11-16 03:20:55'),
(4, '2022-11-16', 'Brick 1', 'D6HENQJR17', '6000', NULL, '1', '2022-11-16 03:17:15', '2022-11-16 03:17:15'),
(5, '2022-11-16', 'Brick 2', '92E807C1J5', '8060', NULL, '1', '2022-11-16 03:17:47', '2022-11-16 04:14:27');

-- --------------------------------------------------------

--
-- Table structure for table `inventorynames`
--

CREATE TABLE `inventorynames` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alert_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventorynames`
--

INSERT INTO `inventorynames` (`id`, `main_date`, `product_name`, `alert_name`, `status`, `created_at`, `updated_at`) VALUES
(3, '2022-11-16', 'Brick 1', '100', '1', '2022-11-16 03:15:53', '2022-11-16 03:15:53'),
(4, '2022-11-16', 'Brick 2', '100', '1', '2022-11-16 03:16:10', '2022-11-16 03:16:10'),
(5, '2022-11-16', 'Brick 3', '100', '1', '2022-11-16 03:16:25', '2022-11-16 03:16:25');

-- --------------------------------------------------------

--
-- Table structure for table `mainclients`
--

CREATE TABLE `mainclients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_purchase` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mainclients`
--

INSERT INTO `mainclients` (`id`, `name`, `address`, `email`, `phone`, `total_purchase`, `main_date`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Mr. Karim', 'mirpur', 'm@gmail.com', '09989', NULL, '2022-11-16', '1', '2022-11-16 03:18:31', '2022-11-16 03:18:31'),
(4, 'Mr.Rahim', 'Rajshahi', 'rrr@gmail.com', '2333333', NULL, '2022-11-16', '1', '2022-11-16 03:19:03', '2022-11-16 03:19:03');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_19_095110_create_permission_tables', 1),
(6, '2022_02_19_102354_create_admins_table', 1),
(7, '2022_02_07_091424_create_system_information_table', 1),
(8, '2022_08_03_235604_create_products_table', 2),
(9, '2022_08_09_221223_create_imageuploads_table', 3),
(10, '2022_08_11_174614_create_categories_table', 4),
(11, '2022_08_11_191230_create_subcategories_table', 5),
(12, '2022_08_13_213352_create_product_categories_table', 5),
(13, '2022_08_17_003243_create_attributes_table', 6),
(14, '2022_08_17_003352_create_attribute_details_table', 6),
(15, '2022_08_20_205107_create_main_products_table', 7),
(16, '2022_08_20_210520_create_brands_table', 7),
(17, '2022_08_20_210546_create_units_table', 7),
(18, '2022_08_20_210645_create_size_charts_table', 7),
(19, '2022_08_20_210833_create_product_colors_table', 7),
(20, '2022_08_20_212726_create_assaign_categories_table', 7),
(21, '2022_08_20_212800_create_image_lists_table', 7),
(22, '2022_08_26_000842_create_extra_sizes_table', 8),
(23, '2022_08_31_220712_create_assaign_colors_table', 9),
(24, '2022_09_01_225744_create_feature_product_images_table', 10),
(25, '2022_09_07_190102_create_assaign_sizes_table', 11),
(26, '2022_09_07_191501_create_color_tables_table', 12),
(27, '2022_09_09_002034_create_product_quantities_table', 12),
(28, '2022_09_12_214304_create_clients_table', 13),
(29, '2022_09_13_003420_create_delivary_addresses_table', 14),
(30, '2022_09_15_215710_create_invoices_table', 15),
(31, '2022_09_15_215747_create_invoice_details_table', 15),
(32, '2022_09_15_220814_create_shipping_addresses_table', 15),
(33, '2022_09_15_220845_create_payments_table', 15),
(34, '2022_09_21_224703_create_category_banners_table', 16),
(35, '2022_09_26_181217_create_shipping_prices_table', 17),
(36, '2022_10_01_183152_create_exchanges_table', 18),
(37, '2022_10_01_183253_create_exchangedetails_table', 18),
(38, '2022_10_01_183543_create_invoicereturns_table', 18),
(39, '2022_10_01_183615_create_invoicereturndetails_table', 18),
(40, '2022_10_02_001608_create_bannerfirsts_table', 19),
(41, '2022_10_02_001646_create_bannerseconds_table', 19),
(42, '2022_10_02_200239_create_aboutustitles_table', 20),
(43, '2022_10_02_200308_create_aboutusbodyfirsts_table', 20),
(44, '2022_10_02_200350_create_aboutusbodyseconds_table', 20),
(45, '2022_10_02_200550_create_contacts_table', 20),
(46, '2022_10_02_200653_create_messagesections_table', 20),
(47, '2022_10_02_200736_create_askquestions_table', 20),
(48, '2022_10_02_200816_create_blogs_table', 20),
(49, '2022_10_02_200848_create_blogcategories_table', 20),
(50, '2022_10_05_210124_create_reviews_table', 21),
(51, '2022_10_09_184829_create_orderbies_table', 22),
(52, '2022_10_09_205058_create_onlineexpenses_table', 23),
(53, '2022_11_14_083857_create_inventorynames_table', 24),
(54, '2022_11_14_083943_create_inventories_table', 24),
(55, '2022_11_14_084026_create_mainclients_table', 24),
(56, '2022_11_14_084131_create_caranddrivers_table', 24),
(57, '2022_11_14_084159_create_consignments_table', 24),
(58, '2022_11_14_084231_create_releases_table', 24),
(59, '2022_11_14_085506_create_consiproducts_table', 24),
(60, '2022_11_15_053636_create_payments_table', 25),
(61, '2022_11_15_061550_create_consigment_details_table', 26),
(62, '2022_11_16_094141_create_productquantities_table', 27);

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
(1, 'App\\Models\\Admin', 1),
(1, 'App\\User', 1),
(2, 'App\\Models\\Admin', 2),
(10, 'App\\Models\\Admin', 19),
(10, 'App\\Models\\Admin', 20),
(13, 'App\\Models\\Admin', 23),
(13, 'App\\Models\\Admin', 25),
(13, 'App\\Models\\Admin', 26),
(13, 'App\\Models\\Admin', 27),
(13, 'App\\Models\\Admin', 28),
(13, 'App\\Models\\Admin', 29),
(13, 'App\\Models\\Admin', 30);

-- --------------------------------------------------------

--
-- Table structure for table `orderbies`
--

CREATE TABLE `orderbies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percentage_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `client_id`, `main_date`, `amount`, `created_at`, `updated_at`) VALUES
(1, '2', '2022-11-15', '1080', '2022-11-15 05:21:56', '2022-11-15 05:21:56'),
(2, '4', '2022-11-16', '9000', '2022-11-16 03:22:13', '2022-11-16 03:22:13'),
(3, '4', '2022-11-16', '80000', '2022-11-16 03:27:00', '2022-11-16 03:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `app_url`, `created_at`, `updated_at`) VALUES
(1, 'dashboard.view', 'admin', 'dashboard', 'admin/dashboard_add', '2021-03-24 02:04:15', '2022-02-15 02:50:30'),
(2, 'dashboard.edit', 'admin', 'dashboard', NULL, '2021-03-24 02:04:15', '2021-03-24 02:04:15'),
(8, 'admin.create', 'admin', 'admin', 'admin/admin_add', '2021-03-24 02:04:16', '2022-02-15 02:48:17'),
(9, 'admin.view', 'admin', 'admin', 'admin/admin.view', '2021-03-24 02:04:16', '2022-02-15 02:48:20'),
(10, 'admin.edit', 'admin', 'admin', 'admin/admin.edit', '2021-03-24 02:04:16', '2022-02-15 02:48:23'),
(11, 'admin.delete', 'admin', 'admin', 'admin/admin.delete', '2021-03-24 02:04:16', '2022-02-15 02:48:25'),
(12, 'admin.approve', 'admin', 'admin', 'admin/admin.approve', '2021-03-24 02:04:16', '2022-02-15 02:48:27'),
(13, 'role.create', 'admin', 'role', NULL, '2021-03-24 02:04:16', '2021-03-24 02:04:16'),
(14, 'role.view', 'admin', 'role', NULL, '2021-03-24 02:04:16', '2021-03-24 02:04:16'),
(15, 'role.edit', 'admin', 'role', NULL, '2021-03-24 02:04:17', '2021-03-24 02:04:17'),
(16, 'role.delete', 'admin', 'role', NULL, '2021-03-24 02:04:17', '2021-03-24 02:04:17'),
(17, 'role.approve', 'admin', 'role', NULL, '2021-03-24 02:04:17', '2021-03-24 02:04:17'),
(18, 'profile.view', 'admin', 'profile', NULL, '2021-03-24 02:04:17', '2021-03-24 02:04:17'),
(19, 'profile.edit', 'admin', 'profile', NULL, '2021-03-24 02:04:17', '2021-03-24 02:04:17'),
(20, 'permission.create', 'admin', 'permission', NULL, NULL, NULL),
(21, 'permission.view', 'admin', 'permission', NULL, NULL, NULL),
(22, 'permission.edit', 'admin', 'permission', NULL, NULL, NULL),
(23, 'permission.delete', 'admin', 'permission', NULL, NULL, NULL),
(29, 'user.create', 'admin', 'User', 'admin/user_add', NULL, NULL),
(30, 'user.view', 'admin', 'User', NULL, NULL, NULL),
(31, 'user.edit', 'admin', 'User', NULL, NULL, NULL),
(32, 'user.delete', 'admin', 'User', NULL, NULL, NULL),
(33, 'user.print', 'admin', 'User', NULL, NULL, NULL),
(315, 'system_information_add', 'admin', 'System information', 'admin/system_information_add', NULL, NULL),
(316, 'system_information_view', 'admin', 'System information', NULL, NULL, NULL),
(317, 'system_information_update', 'admin', 'System information', NULL, NULL, NULL),
(318, 'system_information_delete', 'admin', 'System information', NULL, NULL, NULL),
(480, 'inventory_name_add', 'admin', 'inventory_name', 'admin/inventory_name_add', NULL, NULL),
(481, 'inventory_name_view', 'admin', 'inventory_name', 'admin/inventory_name_view', NULL, NULL),
(482, 'inventory_name_update', 'admin', 'inventory_name', 'admin/inventory_name_update', NULL, NULL),
(483, 'inventory_name_delete', 'admin', 'inventory_name', 'admin/inventory_name_delete', NULL, NULL),
(484, 'inventory_add', 'admin', 'inventory', 'admin/inventory_add', NULL, NULL),
(485, 'inventory_view', 'admin', 'inventory', 'admin/inventory_view', NULL, NULL),
(486, 'inventory_delete', 'admin', 'inventory', 'admin/inventory_delete', NULL, NULL),
(487, 'inventory_update', 'admin', 'inventory', 'admin/inventory_update', NULL, NULL),
(488, 'main_client_add', 'admin', 'main_client', 'admin/main_client_add', NULL, NULL),
(489, 'main_client_view', 'admin', 'main_client', 'admin/main_client_view', NULL, NULL),
(490, 'main_client_delete', 'admin', 'main_client', 'admin/main_client_delete', NULL, NULL),
(491, 'main_client_update', 'admin', 'main_client', 'admin/main_client_update', NULL, NULL),
(492, 'car_and_driver_add', 'admin', 'car_and_driver', 'admin/car_and_driver_add', NULL, NULL),
(493, 'car_and_driver_view', 'admin', 'car_and_driver', 'admin/car_and_driver_view', NULL, NULL),
(494, 'car_and_driver_delete', 'admin', 'car_and_driver', 'admin/car_and_driver_delete', NULL, NULL),
(495, 'car_and_driver_update', 'admin', 'car_and_driver', 'admin/car_and_driver_update', NULL, NULL),
(496, 'consigment_add', 'admin', 'consigment', 'admin/consigment_add', NULL, NULL),
(497, 'consigment_view', 'admin', 'consigment', 'admin/consigment_view', NULL, NULL),
(498, 'consigment_delete', 'admin', 'consigment', 'admin/consigment_delete', NULL, NULL),
(499, 'consigment_update', 'admin', 'consigment', 'admin/consigment_update', NULL, NULL),
(500, 'release_product_add', 'admin', 'release_product', 'admin/release_product_add', NULL, NULL),
(501, 'release_product_view', 'admin', 'release_product', 'admin/release_product_view', NULL, NULL),
(502, 'release_product_delete', 'admin', 'release_product', 'admin/release_product_delete', NULL, NULL),
(503, 'release_product_update', 'admin', 'release_product', 'admin/release_product_update', NULL, NULL);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productquantities`
--

CREATE TABLE `productquantities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `releases`
--

CREATE TABLE `releases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `consignment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_star` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 'superadmin', 'admin', '2021-03-24 02:04:14', '2021-03-24 02:04:14'),
(2, 'admin', 'admin', '2021-03-24 02:04:14', '2021-03-24 02:04:14'),
(10, 'Teacher', 'admin', '2022-01-30 22:59:56', '2022-01-30 22:59:56'),
(13, 'employee', 'admin', '2022-02-07 23:46:42', '2022-02-07 23:46:42');

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
(1, 1),
(1, 2),
(1, 10),
(1, 13),
(2, 1),
(2, 2),
(2, 10),
(2, 13),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(315, 1),
(316, 1),
(317, 1),
(318, 1),
(356, 13),
(357, 13),
(358, 13),
(390, 1),
(391, 1),
(392, 1),
(393, 1),
(394, 1),
(395, 1),
(396, 1),
(397, 1),
(398, 1),
(399, 1),
(400, 1),
(401, 1),
(402, 1),
(403, 1),
(404, 1),
(405, 1),
(406, 1),
(407, 1),
(408, 1),
(409, 1),
(410, 1),
(411, 1),
(412, 1),
(413, 1),
(414, 1),
(415, 1),
(416, 1),
(417, 1),
(418, 1),
(419, 1),
(420, 1),
(421, 1),
(422, 1),
(423, 1),
(424, 1),
(425, 1),
(426, 1),
(427, 1),
(428, 1),
(429, 1),
(430, 1),
(431, 1),
(432, 1),
(433, 1),
(434, 1),
(435, 1),
(436, 1),
(437, 1),
(438, 1),
(439, 1),
(440, 1),
(441, 1),
(442, 1),
(443, 1),
(444, 1),
(445, 1),
(446, 1),
(447, 1),
(448, 1),
(449, 1),
(450, 1),
(451, 1),
(452, 1),
(453, 1),
(454, 1),
(455, 1),
(456, 1),
(457, 1),
(458, 1),
(459, 1),
(460, 1),
(461, 1),
(462, 1),
(463, 1),
(464, 1),
(465, 1),
(466, 1),
(467, 1),
(468, 1),
(469, 1),
(470, 1),
(471, 1),
(472, 1),
(473, 1),
(474, 1),
(475, 1),
(476, 1),
(477, 1),
(478, 1),
(479, 1),
(480, 1),
(481, 1),
(482, 1),
(483, 1),
(484, 1),
(485, 1),
(486, 1),
(487, 1),
(488, 1),
(489, 1),
(490, 1),
(491, 1),
(492, 1),
(493, 1),
(494, 1),
(495, 1),
(496, 1),
(497, 1),
(498, 1),
(499, 1),
(500, 1),
(501, 1),
(502, 1),
(503, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_information`
--

CREATE TABLE `system_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `System_Name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_information`
--

INSERT INTO `system_information` (`id`, `logo`, `icon`, `System_Name`, `Phone`, `Email`, `Address`, `created_at`, `updated_at`) VALUES
(1, 'public/uploads/1668416585.png', 'public/uploads/1668416676.ico', 'Inventory Management', '01743-00000', 'demo@gmail.com', 'demo add', '2022-02-07 04:03:26', '2022-11-14 03:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kamruzzaman kajol', 'admin@gmail.com', '01646735100', NULL, '$2y$10$db/gIq04rutRaow6Ym.yJufvF3lJDEVILPQKo3i2EebPFIXsLa5YK', NULL, '2022-09-27 05:39:34', '2022-09-27 05:39:34'),
(2, 'Nir Rony Hossain', 'ronyhossain1920@gmail.com', '01738300022', NULL, '$2y$10$dqDQsjofK97cGdMK/9pTjeFSpBjjFyFTw8DX6O6ih/KbaAeMj.G2G', NULL, '2022-10-09 17:29:17', '2022-10-09 17:29:17'),
(4, 'Md. Irfan Hossain', 'rakinhasan.badhan33@gmail.com', '01234567981', NULL, '$2y$10$e0pAJKgLU2CxWVIw1UPI3OWKa7fcSmhv1Yrd4sB6y2Aon0RGjvLRK', NULL, '2022-11-08 12:12:57', '2022-11-08 12:12:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `caranddrivers`
--
ALTER TABLE `caranddrivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_banners`
--
ALTER TABLE `category_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consigment_details`
--
ALTER TABLE `consigment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consignments`
--
ALTER TABLE `consignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consiproducts`
--
ALTER TABLE `consiproducts`
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
-- Indexes for table `inventorynames`
--
ALTER TABLE `inventorynames`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mainclients`
--
ALTER TABLE `mainclients`
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
-- Indexes for table `orderbies`
--
ALTER TABLE `orderbies`
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
-- Indexes for table `productquantities`
--
ALTER TABLE `productquantities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `releases`
--
ALTER TABLE `releases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
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
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_information`
--
ALTER TABLE `system_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `caranddrivers`
--
ALTER TABLE `caranddrivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `category_banners`
--
ALTER TABLE `category_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `consigment_details`
--
ALTER TABLE `consigment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `consignments`
--
ALTER TABLE `consignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `consiproducts`
--
ALTER TABLE `consiproducts`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventorynames`
--
ALTER TABLE `inventorynames`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mainclients`
--
ALTER TABLE `mainclients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `orderbies`
--
ALTER TABLE `orderbies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=504;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productquantities`
--
ALTER TABLE `productquantities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `releases`
--
ALTER TABLE `releases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_information`
--
ALTER TABLE `system_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
