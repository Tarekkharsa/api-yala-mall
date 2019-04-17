-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2019 at 09:48 AM
-- Server version: 10.3.14-MariaDB-log
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
-- Database: `ma2llyalashop7_yala-mall`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `price`, `shop_id`, `order_id`, `created_at`, `updated_at`) VALUES
(79, 12000, 2, 88, '2019-03-18 09:54:13', '2019-03-18 09:54:13'),
(80, 18000, 4, 88, '2019-03-18 09:54:13', '2019-03-18 09:54:13'),
(81, 12000, 2, 89, '2019-03-18 09:58:09', '2019-03-18 09:58:09'),
(82, 6000, 4, 89, '2019-03-18 09:58:09', '2019-03-18 09:58:09'),
(83, 12000, 2, 90, '2019-03-18 10:23:26', '2019-03-18 10:23:26'),
(84, 6000, 4, 90, '2019-03-18 10:23:26', '2019-03-18 10:23:26'),
(85, 12000, 2, 91, '2019-03-25 11:51:50', '2019-03-25 11:51:50'),
(86, 6000, 4, 91, '2019-03-25 11:51:50', '2019-03-25 11:51:50'),
(87, 10000, 2, 92, '2019-04-15 06:00:22', '2019-04-15 06:00:22'),
(88, 20000, 2, 93, '2019-04-15 06:00:57', '2019-04-15 06:00:57'),
(89, 201000, 3, 94, '2019-04-15 06:03:57', '2019-04-15 06:03:57'),
(90, 201000, 3, 95, '2019-04-16 11:54:37', '2019-04-16 11:54:37'),
(91, 201000, 3, 96, '2019-04-16 11:57:38', '2019-04-16 11:57:38'),
(92, 201000, 3, 97, '2019-04-16 13:30:24', '2019-04-16 13:30:24');

-- --------------------------------------------------------

--
-- Table structure for table `bill_products`
--

CREATE TABLE `bill_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `bill_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill_products`
--

INSERT INTO `bill_products` (`id`, `quantity`, `notes`, `sale`, `bill_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 2, '51', '1', 87, 15, '2019-04-15 06:00:22', '2019-04-15 06:00:22'),
(2, 2, '51', '1', 88, 15, '2019-04-15 06:00:57', '2019-04-15 06:00:57'),
(3, 1, '51', '1', 88, 17, '2019-04-15 06:00:57', '2019-04-15 06:00:57'),
(4, 2, '51', '1', 89, 23, '2019-04-15 06:03:57', '2019-04-15 06:03:57'),
(5, 1, '51', '1', 89, 24, '2019-04-15 06:03:57', '2019-04-15 06:03:57'),
(6, 2, '51', '1', 90, 23, '2019-04-16 11:54:37', '2019-04-16 11:54:37'),
(7, 1, '51', '1', 90, 24, '2019-04-16 11:54:37', '2019-04-16 11:54:37'),
(8, 2, '51', '1', 91, 23, '2019-04-16 11:57:38', '2019-04-16 11:57:38'),
(9, 1, '51', '1', 91, 24, '2019-04-16 11:57:38', '2019-04-16 11:57:38'),
(10, 2, '51', '1', 92, 23, '2019-04-16 13:30:24', '2019-04-16 13:30:24'),
(11, 1, '51', '1', 92, 24, '2019-04-16 13:30:24', '2019-04-16 13:30:24');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `number`, `created_at`, `updated_at`) VALUES
(1, '5552365', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'دمشق', NULL, NULL),
(2, 'حلب', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verification_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verification_request_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blocked` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `phone`, `token`, `verification_code`, `verification_request_time`, `blocked`, `created_at`, `updated_at`) VALUES
(1, '0935639194', 'qnuamrgyvtnorivcoarvuygdtykmifja', '5652', '2019-03-13 12:42:33', 0, '2019-03-13 10:42:33', '2019-03-13 10:42:33'),
(2, '0935639195', 'iivrlrmmytzjclvbxgvoycdwgerxyubq', '1019', '2019-03-13 12:43:09', 0, '2019-03-13 10:43:09', '2019-03-13 10:43:09'),
(3, '0935639198', 'egghsfglmsrujundrtwfwignbtytxgtq', '6745', '2019-03-13 12:56:16', 0, '2019-03-13 10:56:16', '2019-04-11 08:21:22'),
(4, '0944901335', 'trteuibcdtsokoqzbdigzissqdbplieo', '8178', '2019-04-16 13:01:10', 0, '2019-04-16 11:01:10', '2019-04-16 11:01:10');

-- --------------------------------------------------------

--
-- Table structure for table `customer_locations`
--

CREATE TABLE `customer_locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `location_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_locations`
--

INSERT INTO `customer_locations` (`id`, `address`, `customer_id`, `location_id`, `created_at`, `updated_at`) VALUES
(1, 'مدينه الجلاء', 1, 1, '2019-03-13 13:49:40', '2019-03-13 13:49:40'),
(2, 'مدينه الجلاء', 1, 1, '2019-03-14 08:33:17', '2019-03-14 08:33:17'),
(3, 'مدينه الجلاء', 1, 1, '2019-04-11 09:11:47', '2019-04-11 09:11:47'),
(4, 'sdfsd', 4, 1, '2019-04-16 11:09:20', '2019-04-16 11:09:20'),
(5, 'sdfsd', 4, 1, '2019-04-16 11:09:21', '2019-04-16 11:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `car_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `username`, `password`, `token`, `lat`, `lng`, `car_id`, `created_at`, `updated_at`) VALUES
(1, 'driver', '1234', '', 2, 5, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'المزه', 1, NULL, NULL),
(2, 'مساكن برزه', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `malls`
--

CREATE TABLE `malls` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `malls`
--

INSERT INTO `malls` (`id`, `name`, `logo`, `address`, `phone`, `website`, `location_id`, `created_at`, `updated_at`) VALUES
(1, 'سيتي مول', '1.jpg', 'المزه', '', '', 1, NULL, NULL),
(3, 'مول قاسيون', '2.jpg', 'اوتستراد حاميش', '0935639194', '', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_05_19_173453_create_menu_table', 1),
(6, '2016_10_21_190000_create_roles_table', 1),
(7, '2016_10_21_190000_create_settings_table', 1),
(8, '2016_11_30_135954_create_permission_table', 1),
(9, '2016_11_30_141208_create_permission_role_table', 1),
(10, '2016_12_26_201236_data_types__add__server_side', 1),
(11, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(12, '2017_01_14_005015_create_translations_table', 1),
(13, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(14, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(15, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(16, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(17, '2017_08_05_000000_add_group_to_settings_table', 1),
(18, '2017_11_26_013050_add_user_role_relationship', 1),
(19, '2017_11_26_015000_create_user_roles_table', 1),
(20, '2018_03_11_000000_add_user_settings', 1),
(21, '2018_03_14_000000_add_details_to_data_types_table', 1),
(22, '2018_03_16_000000_make_settings_value_nullable', 1),
(23, '2019_03_12_152503_create_cities_table', 1),
(24, '2019_03_12_152520_create_locations_table', 1),
(25, '2019_03_12_152632_create_scategories_table', 1),
(26, '2019_03_12_152731_create_shop_statuses_table', 1),
(27, '2019_03_12_152839_create_tags_table', 1),
(28, '2019_03_12_152854_create_sizes_table', 1),
(29, '2019_03_12_152911_create_cars_table', 1),
(30, '2019_03_12_152931_create_drivers_table', 1),
(31, '2019_03_12_152954_create_order_statuses_table', 1),
(32, '2019_03_12_153015_create_customers_table', 1),
(33, '2019_03_12_153030_create_customer_locations_table', 1),
(34, '2019_03_12_153046_create_malls_table', 1),
(35, '2019_03_12_153101_create_shops_table', 1),
(36, '2019_03_12_153102_create_owners_table', 1),
(37, '2019_03_12_153133_create_shop_categories_table', 1),
(38, '2019_03_12_153222_create_offers_table', 1),
(39, '2019_03_12_153250_create_products_table', 1),
(40, '2019_03_12_153432_create_galleries_table', 1),
(41, '2019_03_12_153459_create_tag_products_table', 1),
(42, '2019_03_12_153531_create_size_products_table', 1),
(43, '2019_03_12_153548_create_orders_table', 1),
(44, '2019_03_12_153615_create_bills_table', 1),
(45, '2019_03_12_153644_create_bill_products_table', 1),
(46, '2019_03_18_142249_create_pcategories_table', 2),
(47, '2019_03_18_142343_create_size_types_table', 2),
(48, '2019_03_18_143712_create_size_types_table', 3),
(49, '2019_03_18_143713_create_pcategories_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `title`, `image`, `description`, `price`, `active`, `shop_id`, `created_at`, `updated_at`) VALUES
(1, 'عروض مغريه', NULL, 'اشتري منتجين واربح هديه منتج مجانا', 1000, 1, 2, '2019-03-15 23:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `delivery_cost` int(11) NOT NULL DEFAULT 0,
  `order_time` datetime DEFAULT NULL,
  `delivery_time` datetime DEFAULT NULL,
  `order_status_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_location_id` int(10) UNSIGNED NOT NULL,
  `driver_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `price`, `delivery_cost`, `order_time`, `delivery_time`, `order_status_id`, `customer_id`, `customer_location_id`, `driver_id`, `created_at`, `updated_at`) VALUES
(88, 18000, 0, '2019-03-18 11:54:13', NULL, 1, 1, 1, NULL, '2019-03-18 09:54:13', '2019-03-18 09:54:13'),
(89, 18000, 0, '2019-03-18 11:58:09', NULL, 1, 1, 1, NULL, '2019-03-18 09:58:09', '2019-03-18 09:58:09'),
(90, 18000, 0, '2019-03-18 12:23:26', NULL, 1, 1, 1, NULL, '2019-03-18 10:23:26', '2019-03-18 10:23:26'),
(91, 18000, 0, '2019-03-25 13:51:50', NULL, 1, 1, 1, NULL, '2019-03-25 11:51:50', '2019-03-25 11:51:50'),
(92, 10000, 0, '2019-04-15 09:00:22', NULL, 1, 1, 1, NULL, '2019-04-15 06:00:22', '2019-04-15 06:00:22'),
(93, 20000, 0, '2019-04-15 09:00:57', NULL, 1, 1, 1, NULL, '2019-04-15 06:00:57', '2019-04-15 06:00:57'),
(94, 201000, 0, '2019-04-15 09:03:57', NULL, 1, 1, 1, NULL, '2019-04-15 06:03:57', '2019-04-15 06:03:57'),
(95, 201000, 0, '2019-04-16 13:54:37', NULL, 1, 1, 1, NULL, '2019-04-16 11:54:37', '2019-04-16 11:54:37'),
(96, 201000, 0, '2019-04-16 13:54:37', NULL, 1, 1, 1, NULL, '2019-04-16 11:57:38', '2019-04-16 11:57:38'),
(97, 201000, 0, '2019-04-16 15:30:24', NULL, 1, 1, 1, NULL, '2019-04-16 13:30:24', '2019-04-16 13:30:24');

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'جاري التوصيل', NULL, NULL),
(2, 'تم التوصيل', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `full_name`, `username`, `password`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'محمد التل ', 'التل', '1234', '0936528647', NULL, NULL),
(2, 'فراس الشاهر', 'فراس', '1234', '0930301103', NULL, NULL),
(3, 'محمد شحود ', 'محمد', '1234', '0930301101', NULL, NULL),
(4, 'عماد الدين', 'عماد', '1234', '0935635985', NULL, NULL);

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
-- Table structure for table `pcategories`
--

CREATE TABLE `pcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scatogory_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pcategories`
--

INSERT INTO `pcategories` (`id`, `name`, `scatogory_id`, `created_at`, `updated_at`) VALUES
(5, 'قمصان', 2, NULL, NULL),
(6, 'بنطاال', 2, NULL, NULL),
(7, 'Sony', 3, NULL, NULL),
(8, 'Samsung', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available` tinyint(4) NOT NULL DEFAULT 1,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `discount` float DEFAULT 1,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `size_pcategory_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `available`, `description`, `price`, `discount`, `shop_id`, `size_pcategory_id`, `created_at`, `updated_at`) VALUES
(15, 'قميص', 1, 'رجالي, وردي', 5000, 1, 2, 2, NULL, NULL),
(16, 'قيمص نسواني قصير ', 1, ' قيمص نسواني قصير قيمص نسواني قصير قيمص نسواني قصير قيمص نسواني قصير ', 10000, 1, 2, 3, NULL, NULL),
(17, 'قيمص نسواني طويل ', 1, 'قيمص نسواني طويل قيمص نسواني طويل قيمص نسواني طويل قيمص نسواني طويل ', 10000, 1, 2, 3, NULL, NULL),
(18, 'بنطلوون', 1, 'بنطلوون مشأشأ', 30000, 1, 2, 6, NULL, NULL),
(19, 'بنطلوون قماش ', 1, 'بنطلوون قماش بنطلوون قماش بنطلوون قماش بنطلوون قماش ', 4000, 1, 2, 6, NULL, NULL),
(20, 'بنطلوون تركي ', 1, 'بنطلوون تركي بنطلوون تركي بنطلوون تركي ', 6000, 1, 2, 7, NULL, NULL),
(21, 'بنطلوون اسباني ', 1, 'بنطلوون اسباني بنطلوون اسباني بنطلوون اسباني بنطلوون اسباني ', 5000, 1, 2, 8, NULL, NULL),
(22, 'شاشه سمارت', 1, 'شاشه سمارتشاشه سمارتشاشه سمارتشاشه سمارتشاشه سمارت', 200000, 1, 3, 11, NULL, NULL),
(23, 'شاشه lcd', 1, 'شاشه lcdشاشه  lcdشاشه lcdشاشه lcd', 100000, 1, 3, 10, NULL, NULL),
(24, 'شاشه ابيض واسود', 1, 'شاشه ابيض واسودشاشه ابيض واسودشاشه ابيض واسود', 1000, 1, 3, 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scategories`
--

CREATE TABLE `scategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scategories`
--

INSERT INTO `scategories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'أحذية', NULL, NULL, NULL),
(2, 'ألبسه', NULL, NULL, NULL),
(3, 'جوالات', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flour` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_time` datetime DEFAULT NULL,
  `close_time` datetime DEFAULT NULL,
  `shop_status_id` int(10) UNSIGNED NOT NULL,
  `sale` int(11) NOT NULL DEFAULT 1,
  `min_order_cost` int(11) NOT NULL DEFAULT 0,
  `mall_id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `name`, `logo`, `flour`, `open_time`, `close_time`, `shop_status_id`, `sale`, `min_order_cost`, `mall_id`, `owner_id`, `created_at`, `updated_at`) VALUES
(2, 'محل التل', 's1.jpg', '3', '2019-03-13 01:00:00', '2019-03-13 15:00:00', 2, 1, 1000, 1, 1, NULL, NULL),
(3, 'محل شحود', 's2.jpg', '5', '2019-03-18 01:00:00', '2019-03-18 10:00:00', 2, 1, 0, 3, 3, NULL, NULL),
(4, 'محل فراس', 's3.jpg', '5', '2019-03-18 01:00:00', '2019-03-18 14:00:00', 2, 1, 2000, 1, 2, NULL, NULL),
(5, 'محل عماد الدين', 's4.jpg', '5', '2019-04-15 01:00:00', '2019-04-15 08:00:00', 2, 1, 200000, 1, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_categories`
--

CREATE TABLE `shop_categories` (
  `shop_id` int(10) UNSIGNED NOT NULL,
  `scategory_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_categories`
--

INSERT INTO `shop_categories` (`shop_id`, `scategory_id`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, NULL),
(3, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_statuses`
--

CREATE TABLE `shop_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_statuses`
--

INSERT INTO `shop_statuses` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'مغلق', NULL, NULL, NULL),
(2, 'متوفر', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'small', NULL, NULL),
(2, 'Midum', NULL, NULL),
(3, 'Large', NULL, NULL),
(4, 'Xlarge', NULL, NULL),
(5, '5inch', NULL, NULL),
(6, '6inch', NULL, NULL),
(7, '7inch', NULL, NULL),
(8, '8inch', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `size_pcategories`
--

CREATE TABLE `size_pcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pcategory_id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `size_pcategories`
--

INSERT INTO `size_pcategories` (`id`, `name`, `pcategory_id`, `size_id`, `created_at`, `updated_at`) VALUES
(2, NULL, 5, 1, NULL, NULL),
(3, NULL, 5, 2, NULL, NULL),
(4, NULL, 5, 3, NULL, NULL),
(5, NULL, 5, 4, NULL, NULL),
(6, NULL, 6, 1, NULL, NULL),
(7, NULL, 6, 2, NULL, NULL),
(8, NULL, 6, 3, NULL, NULL),
(9, NULL, 6, 4, NULL, NULL),
(10, NULL, 8, 5, NULL, NULL),
(11, NULL, 8, 6, NULL, NULL),
(12, NULL, 8, 7, NULL, NULL),
(13, NULL, 8, 8, NULL, NULL),
(14, NULL, 7, 5, NULL, NULL),
(15, NULL, 7, 6, NULL, NULL),
(16, NULL, 7, 7, NULL, NULL),
(17, NULL, 7, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tag_products`
--

CREATE TABLE `tag_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_shop_id_foreign` (`shop_id`),
  ADD KEY `bills_order_id_foreign` (`order_id`);

--
-- Indexes for table `bill_products`
--
ALTER TABLE `bill_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_products_bill_id_foreign` (`bill_id`),
  ADD KEY `bill_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_phone_unique` (`phone`);

--
-- Indexes for table `customer_locations`
--
ALTER TABLE `customer_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_locations_customer_id_foreign` (`customer_id`),
  ADD KEY `customer_locations_location_id_foreign` (`location_id`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `drivers_username_unique` (`username`),
  ADD KEY `drivers_car_id_foreign` (`car_id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_product_id_foreign` (`product_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locations_city_id_foreign` (`city_id`);

--
-- Indexes for table `malls`
--
ALTER TABLE `malls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `malls_phone_unique` (`phone`),
  ADD KEY `malls_location_id_foreign` (`location_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offers_shop_id_foreign` (`shop_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_order_status_id_foreign` (`order_status_id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`),
  ADD KEY `orders_customer_location_id_foreign` (`customer_location_id`),
  ADD KEY `orders_driver_id_foreign` (`driver_id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `owners_username_unique` (`username`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pcategories`
--
ALTER TABLE `pcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pcategories_scatogory_id_foreign` (`scatogory_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_shop_id_foreign` (`shop_id`),
  ADD KEY `size_pcategory_forign_key` (`size_pcategory_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `scategories`
--
ALTER TABLE `scategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shops_shop_status_id_foreign` (`shop_status_id`),
  ADD KEY `shops_mall_id_foreign` (`mall_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `shop_categories`
--
ALTER TABLE `shop_categories`
  ADD KEY `shop_categories_shop_id_foreign` (`shop_id`),
  ADD KEY `shop_categories_scategory_id_foreign` (`scategory_id`);

--
-- Indexes for table `shop_statuses`
--
ALTER TABLE `shop_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size_pcategories`
--
ALTER TABLE `size_pcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pcategory_forign_key` (`pcategory_id`),
  ADD KEY `size_forign_key` (`size_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_products`
--
ALTER TABLE `tag_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_products_tag_id_foreign` (`tag_id`),
  ADD KEY `tag_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `bill_products`
--
ALTER TABLE `bill_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_locations`
--
ALTER TABLE `customer_locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `malls`
--
ALTER TABLE `malls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pcategories`
--
ALTER TABLE `pcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scategories`
--
ALTER TABLE `scategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shop_statuses`
--
ALTER TABLE `shop_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `size_pcategories`
--
ALTER TABLE `size_pcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tag_products`
--
ALTER TABLE `tag_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bills_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bill_products`
--
ALTER TABLE `bill_products`
  ADD CONSTRAINT `bill_products_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bill_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_locations`
--
ALTER TABLE `customer_locations`
  ADD CONSTRAINT `customer_locations_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_locations_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `drivers_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `malls`
--
ALTER TABLE `malls`
  ADD CONSTRAINT `malls_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_customer_location_id_foreign` FOREIGN KEY (`customer_location_id`) REFERENCES `customer_locations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_order_status_id_foreign` FOREIGN KEY (`order_status_id`) REFERENCES `order_statuses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pcategories`
--
ALTER TABLE `pcategories`
  ADD CONSTRAINT `pcategories_scatogory_id_foreign` FOREIGN KEY (`scatogory_id`) REFERENCES `scategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `size_pcategory_forign_key` FOREIGN KEY (`size_pcategory_id`) REFERENCES `size_pcategories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shops`
--
ALTER TABLE `shops`
  ADD CONSTRAINT `shops_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`),
  ADD CONSTRAINT `shops_mall_id_foreign` FOREIGN KEY (`mall_id`) REFERENCES `malls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shops_shop_status_id_foreign` FOREIGN KEY (`shop_status_id`) REFERENCES `shop_statuses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shop_categories`
--
ALTER TABLE `shop_categories`
  ADD CONSTRAINT `shop_categories_scategory_id_foreign` FOREIGN KEY (`scategory_id`) REFERENCES `scategories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shop_categories_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `size_pcategories`
--
ALTER TABLE `size_pcategories`
  ADD CONSTRAINT `pcategory_forign_key` FOREIGN KEY (`pcategory_id`) REFERENCES `pcategories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `size_forign_key` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tag_products`
--
ALTER TABLE `tag_products`
  ADD CONSTRAINT `tag_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tag_products_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
