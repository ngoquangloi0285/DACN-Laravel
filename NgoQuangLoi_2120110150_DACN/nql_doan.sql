-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2023 at 03:44 AM
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
-- Database: `nql_doan`
--

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_09_21_020038_create_product_table', 1),
(4, '2022_09_21_024529_create_category_table', 1),
(5, '2022_09_21_025038_create_brand_table', 1),
(6, '2022_09_21_030424_create_slider_table', 1),
(7, '2022_09_21_031004_create_contact_table', 1),
(8, '2022_09_21_031301_create_order_table', 1),
(9, '2022_09_21_032020_create_order_detail_table', 1),
(10, '2022_09_21_032343_create_menu_table', 1),
(11, '2022_09_23_105207_create_config_table', 1),
(12, '2022_09_23_105732_create_link_table', 1),
(13, '2022_09_28_062414_create_post_table', 1),
(14, '2022_09_28_062529_create_topic_post_table', 1),
(15, '2022_09_28_064344_create_product_image', 1),
(16, '2022_09_28_064713_create_product_option', 1),
(17, '2022_09_28_064820_create_product_sale', 1),
(18, '2022_09_28_065639_create_product_store', 1),
(19, '2022_09_28_065932_create_product_value', 1),
(20, '2022_10_06_071931_create_user_table', 1),
(21, '2022_12_05_153942_add_role_to_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nql_brand`
--

CREATE TABLE `nql_brand` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `metakey` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metadesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `trash` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nql_brand`
--

INSERT INTO `nql_brand` (`id`, `name`, `slug`, `image`, `sort_order`, `parent_id`, `metakey`, `metadesc`, `created_by`, `updated_by`, `trash`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 'apple', 'apple.png', 0, 0, 'Apple', 'Apple', NULL, NULL, NULL, 1, '2023-01-02 21:32:48', '2023-01-03 01:54:29'),
(2, 'Xiaomi', 'xiaomi', 'xiaomi.png', 0, 0, 'Xiaomi', 'Xiaomi', NULL, NULL, NULL, 1, '2023-01-02 21:49:41', '2023-01-03 01:54:29'),
(3, 'MacBook', 'macbook', 'macbook.png', 0, 0, 'MacBook', 'MacBook', NULL, NULL, NULL, 1, '2023-01-02 22:07:11', '2023-01-03 01:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `nql_category`
--

CREATE TABLE `nql_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL,
  `metakey` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metadesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `trash` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nql_category`
--

INSERT INTO `nql_category` (`id`, `name`, `image`, `slug`, `parent_id`, `sort_order`, `metakey`, `metadesc`, `created_by`, `updated_by`, `trash`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Smart Phone', 'smart-phone.png', 'smart-phone', 0, 0, 'Smart Phone', 'Smart Phone', NULL, NULL, NULL, 1, '2023-01-02 21:33:15', '2023-01-02 21:33:15'),
(2, 'Laptop', 'laptop.png', 'laptop', 0, 0, 'Laptop', 'Laptop', NULL, NULL, NULL, 1, '2023-01-02 21:53:35', '2023-01-02 21:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `nql_config`
--

CREATE TABLE `nql_config` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metakey` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metadesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nql_contact`
--

CREATE TABLE `nql_contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `replay_id` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `trash` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nql_contact`
--

INSERT INTO `nql_contact` (`id`, `user_id`, `image`, `fullname`, `email`, `phone`, `title`, `content`, `replay_id`, `updated_by`, `trash`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'ngo quang loi', 'nql2109@gmail.com', '0382983095', 'Chao ban', 'chao ban', 1, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nql_link`
--

CREATE TABLE `nql_link` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nql_link`
--

INSERT INTO `nql_link` (`id`, `slug`, `type`, `table_id`, `created_at`, `updated_at`) VALUES
(1, 'apple', 'brand', 1, '2023-01-02 21:32:48', '2023-01-02 21:32:48'),
(2, 'smart-phone', 'category', 1, '2023-01-02 21:33:15', '2023-01-02 21:33:15'),
(3, 'xiaomi', 'brand', 2, '2023-01-02 21:49:41', '2023-01-02 21:49:41'),
(4, 'laptop', 'category', 2, '2023-01-02 21:53:35', '2023-01-02 21:53:35'),
(5, 'macbook', 'brand', 3, '2023-01-02 22:07:11', '2023-01-02 22:07:11'),
(6, 'sale-111', 'topic', 1, '2023-01-02 22:16:58', '2023-01-02 22:16:58'),
(7, 'Iphone14', 'slider', 1, '2023-01-02 22:25:23', '2023-01-02 22:25:59'),
(8, 'slide1', 'slider', 2, '2023-01-02 22:27:32', '2023-01-02 22:27:32'),
(9, 'slide2', 'slider', 3, '2023-01-02 22:28:10', '2023-01-02 22:28:10'),
(10, 'slide3', 'slider', 4, '2023-01-02 22:28:36', '2023-01-02 22:28:36'),
(11, 'slide4', 'slider', 5, '2023-01-02 22:29:06', '2023-01-02 22:29:06'),
(12, 'dfd', 'post', 1, '2023-01-03 01:54:02', '2023-01-03 01:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `nql_menu`
--

CREATE TABLE `nql_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_id` int(10) UNSIGNED DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `sort_order` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nql_menu`
--

INSERT INTO `nql_menu` (`id`, `name`, `slug`, `table_id`, `parent_id`, `sort_order`, `type`, `position`, `trash`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Home', '/', NULL, NULL, NULL, 'custom', 'mainmenu', NULL, NULL, NULL, 1, '2023-01-03 02:43:32', '2023-01-03 02:43:32'),
(8, 'Contact', 'contact', NULL, NULL, NULL, 'custom', 'mainmenu', NULL, NULL, NULL, 1, '2023-01-03 02:43:54', '2023-01-03 02:43:54'),
(9, 'News', 'news', NULL, NULL, NULL, 'custom', 'mainmenu', NULL, NULL, NULL, 1, '2023-01-03 02:44:16', '2023-01-03 02:44:16');

-- --------------------------------------------------------

--
-- Table structure for table `nql_order`
--

CREATE TABLE `nql_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `trash` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nql_order`
--

INSERT INTO `nql_order` (`id`, `user_id`, `name`, `phone`, `email`, `address`, `note`, `updated_by`, `trash`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'ngo loi', '222', 'loi@gmail.com', 'kd', 'jjs', NULL, NULL, 1, '2023-01-02 19:29:42', '2023-01-02 19:29:42'),
(2, 1, 'ngo loi', '222', 'loi@gmail.com', 'kd', 'jjs', NULL, NULL, 1, '2023-01-02 19:36:57', '2023-01-02 19:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `nql_order_detail`
--

CREATE TABLE `nql_order_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `price` double(12,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `trash` tinyint(1) DEFAULT NULL,
  `amount` double(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nql_post`
--

CREATE TABLE `nql_post` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metakey` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metadesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `trash` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nql_post`
--

INSERT INTO `nql_post` (`id`, `topic_id`, `title`, `slug`, `detail`, `image`, `type`, `metakey`, `metadesc`, `created_by`, `updated_by`, `trash`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'dfd', 'dfd', 'dfd', 'dfd.jpg', 'post', 'dfd', 'dfd', NULL, NULL, NULL, 0, '2023-01-03 01:54:02', '2023-01-03 01:54:07');

-- --------------------------------------------------------

--
-- Table structure for table `nql_product`
--

CREATE TABLE `nql_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_buy` double NOT NULL,
  `sale` tinyint(1) DEFAULT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `metakey` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metadesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `trash` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nql_product`
--

INSERT INTO `nql_product` (`id`, `category_id`, `brand_id`, `name`, `slug`, `price_buy`, `sale`, `detail`, `metakey`, `metadesc`, `created_by`, `updated_by`, `trash`, `status`, `created_at`, `updated_at`) VALUES
(5, 1, 1, 'Điện thoại iPhone 11 64GB', 'dien-thoai-iphone-11-64gb', 23990000, 0, 'Điện thoại iPhone 11 64GB', 'Điện thoại iPhone 11 64GB', 'Điện thoại iPhone 11 64GB', NULL, NULL, NULL, 1, '2023-01-02 21:54:42', '2023-01-02 21:54:42'),
(6, 1, 1, 'Điện thoại iPhone 14 Pro Max 128GB', 'dien-thoai-iphone-14-pro-max-128gb', 34990000, 1, 'Điện thoại iPhone 14 Pro Max 128GB', 'Điện thoại iPhone 14 Pro Max 128GB', 'Điện thoại iPhone 14 Pro Max 128GB', NULL, NULL, NULL, 1, '2023-01-02 21:56:47', '2023-01-02 21:56:47'),
(7, 1, 1, 'Điện thoại iPhone 14 Pro 128GB', 'dien-thoai-iphone-14-pro-128gb', 34980000, 0, 'Điện thoại iPhone 14 Pro 128GB', 'Điện thoại iPhone 14 Pro 128GB', 'Điện thoại iPhone 14 Pro 128GB', NULL, NULL, NULL, 1, '2023-01-02 21:58:07', '2023-01-02 21:58:07'),
(8, 1, 1, 'Điện thoại iPhone 13 Pro 1TB', 'dien-thoai-iphone-13-pro-1tb', 34790000, 0, 'Điện thoại iPhone 13 Pro 1TB', 'Điện thoại iPhone 13 Pro 1TB', 'Điện thoại iPhone 13 Pro 1TB', NULL, NULL, NULL, 1, '2023-01-02 21:59:24', '2023-01-02 21:59:24'),
(9, 1, 1, 'Điện thoại iPhone 14 Plus 128GB', 'dien-thoai-iphone-14-plus-128gb', 23490000, 0, 'Điện thoại iPhone 14 Plus 128GB', 'Điện thoại iPhone 14 Plus 128GB', 'Điện thoại iPhone 14 Plus 128GB', NULL, NULL, NULL, 1, '2023-01-02 22:00:20', '2023-01-02 22:00:20'),
(10, 1, 1, 'Điện thoại iPhone 14 128GB', 'dien-thoai-iphone-14-128gb', 234565000, 0, 'Điện thoại iPhone 14 128GB', 'Điện thoại iPhone 14 128GB', 'Điện thoại iPhone 14 128GB', NULL, NULL, NULL, 1, '2023-01-02 22:01:32', '2023-01-02 22:01:32'),
(12, 1, 1, 'Điện thoại iPhone 13 128GB', 'dien-thoai-iphone-13-128gb', 24989999, 0, 'Điện thoại iPhone 13 128GB', 'Điện thoại iPhone 13 128GB', 'Điện thoại iPhone 13 128GB', NULL, NULL, NULL, 1, '2023-01-02 22:03:58', '2023-01-02 22:03:58'),
(13, 1, 2, 'Điện thoại Xiaomi Redmi Note 11S 5G', 'dien-thoai-xiaomi-redmi-note-11s-5g', 6499000, 0, 'Điện thoại Xiaomi Redmi Note 11S 5G', 'Điện thoại Xiaomi Redmi Note 11S 5G', 'Điện thoại Xiaomi Redmi Note 11S 5G', NULL, NULL, NULL, 1, '2023-01-02 22:05:14', '2023-01-02 22:05:14'),
(14, 1, 2, 'Điện thoại Xiaomi 12 5G', 'dien-thoai-xiaomi-12-5g', 22330000, 0, 'Điện thoại Xiaomi 12 5G', 'Điện thoại Xiaomi 12 5G', 'Điện thoại Xiaomi 12 5G', NULL, NULL, NULL, 1, '2023-01-02 22:06:24', '2023-01-02 22:06:24'),
(15, 2, 3, 'Laptop Apple MacBook Air M1 2020 16GB/256GB/7-core GPU (Z12A0004Z)', 'laptop-apple-macbook-air-m1-2020-16gb256gb7-core-gpu-z12a0004z', 27290000, 0, 'Laptop Apple MacBook Air M1 2020 16GB/256GB/7-core GPU (Z12A0004Z)', 'Laptop Apple MacBook Air M1 2020 16GB/256GB/7-core GPU (Z12A0004Z)', 'Laptop Apple MacBook Air M1 2020 16GB/256GB/7-core GPU (Z12A0004Z)', NULL, NULL, NULL, 1, '2023-01-02 22:08:17', '2023-01-02 22:08:17');

-- --------------------------------------------------------

--
-- Table structure for table `nql_product_image`
--

CREATE TABLE `nql_product_image` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nql_product_image`
--

INSERT INTO `nql_product_image` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(5, 5, 'dien-thoai-iphone-11-64gb-1.jpg', '2023-01-02 21:54:42', '2023-01-02 21:54:42'),
(6, 6, 'dien-thoai-iphone-14-pro-max-128gb-1.jpg', '2023-01-02 21:56:47', '2023-01-02 21:56:47'),
(7, 7, 'dien-thoai-iphone-14-pro-128gb-1.jpg', '2023-01-02 21:58:07', '2023-01-02 21:58:07'),
(8, 8, 'dien-thoai-iphone-13-pro-1tb-1.jpg', '2023-01-02 21:59:24', '2023-01-02 21:59:24'),
(9, 9, 'dien-thoai-iphone-14-plus-128gb-1.jpg', '2023-01-02 22:00:20', '2023-01-02 22:00:20'),
(10, 10, 'dien-thoai-iphone-14-128gb-1.jpg', '2023-01-02 22:01:32', '2023-01-02 22:01:32'),
(11, 11, 'dien-thoai-iphone-13-128gb-1.jpg', '2023-01-02 22:02:31', '2023-01-02 22:02:31'),
(12, 12, 'dien-thoai-iphone-13-128gb-1.jpg', '2023-01-02 22:03:58', '2023-01-02 22:03:58'),
(13, 13, 'dien-thoai-xiaomi-redmi-note-11s-5g-1.jpg', '2023-01-02 22:05:14', '2023-01-02 22:05:14'),
(14, 14, 'dien-thoai-xiaomi-12-5g-1.jpg', '2023-01-02 22:06:24', '2023-01-02 22:06:24'),
(15, 15, 'laptop-apple-macbook-air-m1-2020-16gb256gb7-core-gpu-z12a0004z-1.jpg', '2023-01-02 22:08:17', '2023-01-02 22:08:17');

-- --------------------------------------------------------

--
-- Table structure for table `nql_product_option`
--

CREATE TABLE `nql_product_option` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nql_product_sale`
--

CREATE TABLE `nql_product_sale` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `price_sale` double DEFAULT NULL,
  `date_begin` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nql_product_sale`
--

INSERT INTO `nql_product_sale` (`id`, `product_id`, `price_sale`, `date_begin`, `date_end`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 5, 0, '0001-11-11 00:00:00', '0001-11-11 00:00:00', NULL, NULL, '2023-01-02 21:54:42', '2023-01-02 21:54:42'),
(4, 6, 5, '0001-02-01 00:00:00', '0001-11-11 00:00:00', NULL, NULL, '2023-01-02 21:56:47', '2023-01-02 21:56:47'),
(5, 7, 0, '0001-01-01 00:00:00', '0001-01-01 00:00:00', NULL, NULL, '2023-01-02 21:58:07', '2023-01-02 21:58:07'),
(6, 8, 0, '0002-02-01 00:00:00', '0002-02-02 00:00:00', NULL, NULL, '2023-01-02 21:59:24', '2023-01-02 21:59:24'),
(7, 9, 0, '0001-11-11 00:00:00', '0001-11-11 00:00:00', NULL, NULL, '2023-01-02 22:00:20', '2023-01-02 22:00:20'),
(8, 10, 0, '0011-11-11 00:00:00', '0001-11-11 00:00:00', NULL, NULL, '2023-01-02 22:01:32', '2023-01-02 22:01:32'),
(9, 12, 0, '0011-11-11 00:00:00', '0011-11-11 00:00:00', NULL, NULL, '2023-01-02 22:03:58', '2023-01-02 22:03:58'),
(10, 13, 0, '0011-11-11 00:00:00', '0001-11-11 00:00:00', NULL, NULL, '2023-01-02 22:05:14', '2023-01-02 22:05:14'),
(11, 14, 0, '0001-11-11 00:00:00', '0001-11-11 00:00:00', NULL, NULL, '2023-01-02 22:06:24', '2023-01-02 22:06:24'),
(12, 15, 0, '0001-11-11 00:00:00', '0001-11-11 00:00:00', NULL, NULL, '2023-01-02 22:08:17', '2023-01-02 22:08:17');

-- --------------------------------------------------------

--
-- Table structure for table `nql_product_store`
--

CREATE TABLE `nql_product_store` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nql_product_store`
--

INSERT INTO `nql_product_store` (`id`, `product_id`, `price`, `quantity`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 5, 1, 1, NULL, NULL, '2023-01-02 21:54:42', '2023-01-02 21:54:42'),
(4, 6, 11, 11, NULL, NULL, '2023-01-02 21:56:47', '2023-01-02 21:56:47'),
(5, 7, 1, 1, NULL, NULL, '2023-01-02 21:58:07', '2023-01-02 21:58:07'),
(6, 8, 2, 2, NULL, NULL, '2023-01-02 21:59:24', '2023-01-02 21:59:24'),
(7, 9, 1, 1, NULL, NULL, '2023-01-02 22:00:20', '2023-01-02 22:00:20'),
(8, 10, 1, 1, NULL, NULL, '2023-01-02 22:01:32', '2023-01-02 22:01:32'),
(10, 12, 1, 1, NULL, NULL, '2023-01-02 22:03:58', '2023-01-02 22:03:58'),
(11, 13, 1, 1, NULL, NULL, '2023-01-02 22:05:14', '2023-01-02 22:05:14'),
(12, 14, 1, 1, NULL, NULL, '2023-01-02 22:06:24', '2023-01-02 22:06:24'),
(13, 15, 1, 1, NULL, NULL, '2023-01-02 22:08:17', '2023-01-02 22:08:17');

-- --------------------------------------------------------

--
-- Table structure for table `nql_product_value`
--

CREATE TABLE `nql_product_value` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `option_id` int(10) UNSIGNED NOT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nql_slider`
--

CREATE TABLE `nql_slider` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `trash` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nql_slider`
--

INSERT INTO `nql_slider` (`id`, `title`, `link`, `position`, `image`, `sort_order`, `created_by`, `updated_by`, `trash`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Iphone14', 'Iphone14', 'slidershow', 'Iphone14.jpg', 0, NULL, NULL, NULL, 0, '2023-01-02 22:25:23', '2023-01-02 22:26:57'),
(2, 'slide1', 'slide1slide1', 'slidershow', 'slide1.jpg', 0, NULL, NULL, NULL, 1, '2023-01-02 22:27:32', '2023-01-02 22:27:32'),
(3, 'slide2', 'slide2slide2', 'slidershow', 'slide2.jpg', 0, NULL, NULL, NULL, 0, '2023-01-02 22:28:10', '2023-01-02 22:29:10'),
(4, 'slide3', 'slide3slide3', 'slidershow', 'slide3.jpg', 0, NULL, NULL, NULL, 0, '2023-01-02 22:28:36', '2023-01-02 22:29:13'),
(5, 'slide4', 'slide4slide4', 'slidershow', 'slide4.jpg', 0, NULL, NULL, NULL, 1, '2023-01-02 22:29:06', '2023-01-02 22:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `nql_topic_post`
--

CREATE TABLE `nql_topic_post` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL,
  `metakey` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metadesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `trash` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nql_topic_post`
--

INSERT INTO `nql_topic_post` (`id`, `name`, `slug`, `parent_id`, `sort_order`, `metakey`, `metadesc`, `created_by`, `updated_by`, `trash`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sale 11/1', 'sale-111', 0, 0, 'Sale 11/1', 'Sale 11/1', NULL, NULL, NULL, 1, '2023-01-02 22:16:58', '2023-01-02 22:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `nql_user`
--

CREATE TABLE `nql_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Họ và tên',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên đăng nhập',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mật khẩu',
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nql_user`
--

INSERT INTO `nql_user` (`user_id`, `fullname`, `name`, `password`, `gender`, `email`, `phone`, `address`, `avatar`, `status`, `created_by`, `updated_by`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'nql', 'nql', '$2y$10$lA5jhceab49RB9cy.iQGGOQhTtF4PuINh3V2.uEEmMIQNgbXfo6jS', 'Male', 'nql@gmail.com', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2023-01-02 14:29:47', '2023-01-02 19:28:35', 1);

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nql_brand`
--
ALTER TABLE `nql_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nql_category`
--
ALTER TABLE `nql_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nql_config`
--
ALTER TABLE `nql_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nql_contact`
--
ALTER TABLE `nql_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nql_link`
--
ALTER TABLE `nql_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nql_menu`
--
ALTER TABLE `nql_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nql_order`
--
ALTER TABLE `nql_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nql_order_detail`
--
ALTER TABLE `nql_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nql_post`
--
ALTER TABLE `nql_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nql_product`
--
ALTER TABLE `nql_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nql_product_image`
--
ALTER TABLE `nql_product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nql_product_option`
--
ALTER TABLE `nql_product_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nql_product_sale`
--
ALTER TABLE `nql_product_sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nql_product_store`
--
ALTER TABLE `nql_product_store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nql_product_value`
--
ALTER TABLE `nql_product_value`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nql_slider`
--
ALTER TABLE `nql_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nql_topic_post`
--
ALTER TABLE `nql_topic_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nql_user`
--
ALTER TABLE `nql_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `nql_user_name_unique` (`name`),
  ADD UNIQUE KEY `nql_user_email_unique` (`email`),
  ADD UNIQUE KEY `nql_user_phone_unique` (`phone`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `nql_brand`
--
ALTER TABLE `nql_brand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nql_category`
--
ALTER TABLE `nql_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nql_config`
--
ALTER TABLE `nql_config`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nql_contact`
--
ALTER TABLE `nql_contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nql_link`
--
ALTER TABLE `nql_link`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nql_menu`
--
ALTER TABLE `nql_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nql_order`
--
ALTER TABLE `nql_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nql_order_detail`
--
ALTER TABLE `nql_order_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nql_post`
--
ALTER TABLE `nql_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nql_product`
--
ALTER TABLE `nql_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `nql_product_image`
--
ALTER TABLE `nql_product_image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `nql_product_option`
--
ALTER TABLE `nql_product_option`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nql_product_sale`
--
ALTER TABLE `nql_product_sale`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nql_product_store`
--
ALTER TABLE `nql_product_store`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `nql_product_value`
--
ALTER TABLE `nql_product_value`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nql_slider`
--
ALTER TABLE `nql_slider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nql_topic_post`
--
ALTER TABLE `nql_topic_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nql_user`
--
ALTER TABLE `nql_user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
