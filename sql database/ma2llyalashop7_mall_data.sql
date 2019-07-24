-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 24, 2019 at 04:43 PM
-- Server version: 10.3.16-MariaDB
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
-- Database: `ma2llyalashop7_mall_data`
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
(93, 5000, 2, 98, '2019-07-08 13:07:47', '2019-07-08 13:07:47'),
(94, 2000, 2, 99, '2019-07-22 19:01:58', '2019-07-22 19:01:58'),
(95, 77666, 2, 100, '2019-07-22 19:22:18', '2019-07-22 19:22:18'),
(96, 5500, 2, 101, '2019-07-24 02:28:17', '2019-07-24 02:28:17');

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
  `size_id` int(10) UNSIGNED DEFAULT NULL,
  `rated` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill_products`
--

INSERT INTO `bill_products` (`id`, `quantity`, `notes`, `sale`, `bill_id`, `product_id`, `size_id`, `rated`, `created_at`, `updated_at`) VALUES
(3, 1, '51', '1', 93, 25, NULL, 1, '2019-07-08 13:07:47', '2019-07-08 14:11:05'),
(4, 1, 'Ggg', '1', 94, 24, 1, 0, '2019-07-22 19:01:58', '2019-07-22 19:01:58'),
(5, 2, 'Hhg', '1', 95, 28, NULL, 0, '2019-07-22 19:22:18', '2019-07-22 19:22:18'),
(6, 1, 'Hhh', '1', 95, 24, 1, 0, '2019-07-22 19:22:18', '2019-07-22 19:22:18'),
(7, 1, 'Vgh', '1', 95, 31, NULL, 0, '2019-07-22 19:22:18', '2019-07-22 19:22:18'),
(8, 1, 'Vvg', '1', 95, 29, NULL, 0, '2019-07-22 19:22:18', '2019-07-22 19:22:18'),
(9, 1, 'Hhg', '0.02', 95, 44, 1, 0, '2019-07-22 19:22:18', '2019-07-22 19:22:18'),
(10, 1, '', '1', 96, 30, NULL, 0, '2019-07-24 02:28:17', '2019-07-24 02:28:17'),
(11, 1, '', '1', 96, 28, NULL, 0, '2019-07-24 02:28:17', '2019-07-24 02:28:17');

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
(1, '00000000000000052365', NULL, '2019-07-24 15:22:36'),
(2, '888888888', '2019-05-07 05:08:54', '2019-05-07 05:08:54'),
(3, '55555', '2019-07-24 15:00:43', '2019-07-24 15:00:43');

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
(2, 'حلب', NULL, NULL),
(3, 'طرطوس', '2019-05-07 05:02:07', '2019-05-07 05:02:07');

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
  `pointes` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `phone`, `token`, `verification_code`, `verification_request_time`, `blocked`, `pointes`, `created_at`, `updated_at`) VALUES
(1, '0935639194', 'egghsfglmsrujundrtwfwignbtytxgaa', '5652', '2019-03-13 12:42:33', 1, 0, '2019-03-13 10:42:33', '2019-05-07 05:28:30'),
(2, '0935639195', 'iivrlrmmytzjclvbxgvoycdwgerxyubq', '1019', '2019-03-13 12:43:09', 0, 0, '2019-03-13 10:43:09', '2019-03-13 10:43:09'),
(3, '0935639198', 'egghsfglmsrujundrtwfwignbtytxgtq', '6745', '2019-03-13 12:56:16', 0, 0, '2019-03-13 10:56:16', '2019-04-11 08:21:22'),
(4, '0935153780', 'joswlkdmknpbakrijvvinpwdtacrtqgd', '1316', '2019-07-22 20:47:49', 0, 0, '2019-07-22 18:47:49', '2019-07-22 18:53:09');

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
(3, 'مدينه الجلاء', 1, 1, '2019-04-11 09:11:47', '2019-04-11 09:11:47'),
(4, 'مدينه الجلاء', 1, 1, '2019-04-21 09:22:45', '2019-04-21 09:22:45'),
(5, 'مدينه الجلاء', 1, 1, '2019-05-27 06:59:49', '2019-05-27 06:59:49'),
(6, 'مدينه الجلاء', 1, 1, '2019-05-27 07:01:10', '2019-05-27 07:01:10'),
(7, 'مدينه الجلاء', 1, 1, '2019-05-27 07:05:16', '2019-05-27 07:05:16'),
(8, 'مدينه الجلاء', 1, 1, '2019-05-27 07:05:19', '2019-05-27 07:05:19'),
(9, 'مدينه الجلاء', 1, 2, '2019-05-27 07:05:33', '2019-05-27 07:05:33'),
(10, 'مدينه الجلاء', 1, 2, '2019-05-27 07:08:29', '2019-05-27 07:08:29'),
(11, 'Ggt', 4, 2, '2019-07-22 19:01:48', '2019-07-22 19:01:48');

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
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `blocked` tinyint(4) NOT NULL DEFAULT 0,
  `car_id` int(10) UNSIGNED NOT NULL,
  `rate` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `username`, `password`, `token`, `lat`, `lng`, `blocked`, `car_id`, `rate`, `created_at`, `updated_at`) VALUES
(1, 'driver', '1234', 'powabvhwlpiolzqdrrtuahpfyzlpvxqxfffff', 2, 5, 0, 1, 3, NULL, '2019-07-23 13:39:18'),
(2, 'dd3', '1234', 'powabvhwlpiolzqdrrtuahpfyzlpvxqx', 20, 20, 0, 2, 3, '2019-05-07 05:19:19', '2019-07-23 13:38:03'),
(3, 'E', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', NULL, NULL, 0, 1, 0, NULL, NULL),
(4, 'EE', '1234', 'xfytokrbitpomxlhirgftskromjdiuvy', 24, 24, 0, 2, 0, '2019-07-23 13:14:51', '2019-07-23 13:14:51'),
(6, 'EEE', '$2y$10$lwadXyTI2aA1eEk9vgxHN.8JocyGaFaxULNNzx.sUpDb0YQOu.UWu', 'imhniuyoscrsanxckptnvqfvlylqdjpq', 24, 24, 0, 2, 0, '2019-07-23 13:18:42', '2019-07-23 13:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `customer_id`, `product_id`, `created_at`, `updated_at`) VALUES
(3, 1, 25, '2019-07-06 05:49:41', '2019-07-06 05:49:41'),
(4, 4, 28, '2019-07-22 18:59:23', '2019-07-22 18:59:23'),
(5, 4, 28, '2019-07-22 18:59:30', '2019-07-22 18:59:30'),
(6, 4, 44, '2019-07-22 18:59:42', '2019-07-22 18:59:42'),
(7, 4, 28, '2019-07-23 23:22:24', '2019-07-23 23:22:24'),
(8, 4, 28, '2019-07-23 23:22:32', '2019-07-23 23:22:32'),
(9, 4, 24, '2019-07-23 23:22:49', '2019-07-23 23:22:49'),
(10, 4, 28, '2019-07-23 23:23:07', '2019-07-23 23:23:07'),
(11, 4, 28, '2019-07-23 23:23:20', '2019-07-23 23:23:20'),
(12, 4, 28, '2019-07-23 23:23:28', '2019-07-23 23:23:28');

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

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(7, '202326944915590584701603577653.png', 44, '2019-05-28 12:47:51', '2019-05-28 12:47:51');

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
(2, 'مساكن برزه', 1, NULL, NULL),
(3, 'البرامكه', 1, NULL, NULL),
(4, 'الميدان', 1, '2019-05-07 05:05:30', '2019-05-07 05:05:30');

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
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_id` int(10) UNSIGNED NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  `state` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `malls`
--

INSERT INTO `malls` (`id`, `name`, `logo`, `address`, `phone`, `website`, `location_id`, `open_time`, `close_time`, `state`, `created_at`, `updated_at`, `lat`, `lng`) VALUES
(1, 'سيتي مول', 'orland-square-mall-05.jpg', 'المزه', '', '', 1, '09:00:00', '21:00:00', 1, '2019-04-22 21:00:00', '2019-07-24 08:08:06', NULL, NULL),
(3, 'مول قاسيون', 'metropol-7.jpg', 'اوتستراد حاميش', '0935639194', '', 2, '07:00:00', '10:00:00', 0, '2019-04-22 21:00:00', '2019-07-24 08:08:06', NULL, NULL),
(7, 'mall1', 'metropol-7.jpg', 'البرامكه', '09336598562', 'www.mall.com', 3, '10:00:00', '17:00:00', 1, '2019-05-04 10:26:55', '2019-07-24 08:08:06', NULL, NULL),
(8, 'hgggggggggggggg', '1563877111.png', 'tareqvyvhgsc', '0944901335', 'www.tareq.com', 2, '13:15:00', '13:15:00', 0, '2019-07-23 11:18:31', '2019-07-23 14:43:59', 22, 11);

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
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `title`, `description`, `status`, `customer_id`, `product_id`, `created_at`, `updated_at`) VALUES
(9, 'title', 'description', 0, 1, 25, '2019-07-08 14:10:36', '2019-07-08 14:10:36'),
(11, 'title', 'description', 0, 1, 25, '2019-07-08 14:11:05', '2019-07-08 14:11:05');

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
(1, 'عروض مغريه', 'GALERIA-2.jpg', 'اشتري منتجين واربح هديه منتج مجانا', 1000, 1, 2, '2019-03-15 23:00:00', '2019-05-04 11:25:51'),
(2, 'تخفيضات بنصف القميه ', '0224.jpg', 'تخفيضات بنصف القميه تخفيضات بنصف القميه تخفيضات بن...', 1000, 1, 4, '2019-04-23 02:00:00', '2019-05-04 11:25:55'),
(3, 'this is test title', '1558687408.png', 'this is test description', 1500, 1, 3, NULL, NULL),
(4, 'this is first offer', '1558695298.png', 'this is first offer this is first offer', 200, 1, 3, NULL, NULL);

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
(98, 5000, 0, '2019-07-08 16:07:47', NULL, 3, 1, 1, 1, '2019-07-05 13:07:47', '2019-07-16 09:28:03'),
(99, 2000, 0, '2019-07-22 21:01:58', NULL, 1, 4, 11, NULL, '2019-07-22 19:01:58', '2019-07-22 19:01:58'),
(100, 12333, 0, '2019-07-22 21:22:18', NULL, 1, 4, 11, NULL, '2019-07-22 19:22:18', '2019-07-22 19:22:18'),
(101, 5500, 0, '2019-07-24 04:28:17', NULL, 1, 4, 11, NULL, '2019-07-24 02:28:17', '2019-07-24 02:28:17');

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
(1, 'جاهز الانتظار', NULL, NULL),
(2, 'جاري التحضير', NULL, NULL),
(3, 'جاهز', NULL, NULL),
(4, 'جاري التوصيل', NULL, NULL),
(5, 'تم التوصيل', NULL, NULL);

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
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `full_name`, `username`, `password`, `phone`, `token`, `created_at`, `updated_at`) VALUES
(1, 'محمد التل ', 'التل', '1234', '0936528647', 'saraznmpnknpvovpmtltkhlewfnxcrtm', NULL, '2019-04-23 06:25:44'),
(2, 'فراس الشاهر', 'فراس', '1234', '0930301103', 'iokixzbhtodafzgianefdacanhqtgswa', NULL, '2019-04-23 06:26:19'),
(3, 'محمد شحود ', 'محمد', '1234', '0930301101', '', NULL, NULL),
(4, 'mohammad', 'mmh', '$2y$10$2AQW4413AVmGM3pn3vAcM.fZgyvToNdARvoZkCICUlV78pZz.QI2.', '0935639293', 'ojdeltvijdlgeyletizvenczqawjylty', '2019-05-19 11:13:42', '2019-05-19 11:13:42'),
(22, 'Feras', 'ggggg', '$2y$10$RJV0Tz4IjdFW/vqnj9W.Qun4aSX2MTVpZSJ9q8kAGRLlhDNilsrve', '0944901335', 'oijepywcpqgmumjrkilxurmhnktcwgko', '2019-07-22 11:15:36', '2019-07-22 11:15:36');

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
(8, 'Samsung', 3, NULL, NULL),
(9, 'PDf', 4, '2019-05-04 11:03:16', '2019-05-04 11:03:16'),
(10, 'جاكيت', 2, NULL, NULL);

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
  `mall_id` int(10) UNSIGNED NOT NULL,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `pcategory_id` int(10) UNSIGNED NOT NULL,
  `rate` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `available`, `description`, `price`, `discount`, `mall_id`, `shop_id`, `pcategory_id`, `rate`, `created_at`, `updated_at`) VALUES
(24, 'قميص', 1, 'قميص قميص', 2000, 1, 1, 2, 5, 2, NULL, '2019-07-22 18:50:14'),
(25, '25215 قميص', 1, 'رجالي, وردي', 3000, 1, 1, 2, 5, 3, NULL, '2019-07-22 18:55:42'),
(26, 'قميص 2', 1, 'قميص 2قميص 2قميص 2قميص 2', 2000, 1, 1, 3, 5, 0, NULL, NULL),
(27, 'بنطلون 2 ', 1, 'بنطلون 2 بنطلون 2 بنطلون 2 ', 1000, 1, 1, 3, 6, 0, NULL, NULL),
(28, 'قميص نسواني قصير ', 1, ' قيمص نسواني قصير قيمص نسواني قصير قيمص نسواني قصير قيمص نسواني قصير ', 1500, 1, 1, 2, 5, 0, NULL, NULL),
(29, 'قميص نسواني طويل ', 1, 'قيمص نسواني طويل قيمص نسواني طويل قيمص نسواني طويل قيمص نسواني طويل ', 0, 1, 1, 2, 5, 0, NULL, NULL),
(30, 'بنطلوون قماش ', 1, 'بنطلوون قماش بنطلوون قماش بنطلوون قماش بنطلوون قماش ', 4000, 1, 1, 2, 6, 0, NULL, NULL),
(31, 'بنطلوون تركي ', 1, 'بنطلوون تركي بنطلوون تركي بنطلوون تركي ', 6000, 1, 1, 2, 6, 0, NULL, NULL),
(32, 'شاشه سمارت', 1, 'شاشه سمارتشاشه سمارتشاشه سمارتشاشه سمارتشاشه سمارت', 2000, 1, 3, 3, 7, 0, NULL, NULL),
(33, 'شاشه ابيض واسود', 1, 'شاشه ابيض واسودشاشه ابيض واسودشاشه ابيض واسود', 0, 1, 3, 3, 8, 0, NULL, NULL),
(42, 'جاكيت3333', 1, 'جاكيتجاكيتجاكيتجاكيتجاكيت', 5000, 0.2, 1, 2, 10, 2, '2019-05-26 09:07:21', '2019-07-16 07:53:05'),
(43, 'جاكيت3555555', 1, 'جاكيتجاكيتجاكيتجاكيتجاكيت', 5000, 0.02, 1, 2, 10, 0, '2019-05-28 09:17:10', '2019-05-28 09:17:10'),
(44, 'جاكيت6666665', 1, 'جاكيتجاكيتجاكيتجاكيتجاكيت666', 66666, 0.02, 1, 2, 10, 0, '2019-05-28 09:20:48', '2019-05-28 12:36:05');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`id`, `product_id`, `size_id`) VALUES
(1, 25, 3),
(2, 25, 1),
(3, 25, 2),
(4, 27, 1),
(5, 27, 2),
(6, 27, 3),
(7, 24, 1),
(8, 24, 3),
(9, 24, 4),
(10, 24, 3),
(11, 26, 3),
(12, 27, 1),
(13, 27, 2),
(14, 27, 4),
(21, 42, 1),
(23, 44, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rate_services`
--

CREATE TABLE `rate_services` (
  `id` int(11) NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `shop_id` int(11) UNSIGNED DEFAULT NULL,
  `driver_id` int(11) UNSIGNED DEFAULT NULL,
  `product_id` int(11) UNSIGNED DEFAULT NULL,
  `rate` int(11) NOT NULL DEFAULT 0,
  `notes` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rate_services`
--

INSERT INTO `rate_services` (`id`, `customer_id`, `shop_id`, `driver_id`, `product_id`, `rate`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL, 7, 'test7', NULL, '2019-07-16 08:06:52'),
(2, 2, 2, NULL, NULL, 1, 'jhsbvjhbd', NULL, NULL),
(4, 3, 2, NULL, NULL, 3, '\'kfjvnkdbnkdnfk', '2019-07-06 09:10:07', '2019-07-06 09:10:07'),
(11, 3, NULL, 2, NULL, 2, 'kfjvnkdbnkdnfk', '2019-07-06 09:35:18', '2019-07-06 09:35:18'),
(12, 3, NULL, 2, NULL, 3, 'kfjvnkdbnkdnfk', '2019-07-06 09:35:31', '2019-07-06 09:35:31'),
(14, 1, NULL, 2, NULL, 3, 'tttttttt', '2019-07-06 10:44:46', '2019-07-06 10:46:54'),
(15, 1, NULL, NULL, 42, 2, 'test7', '2019-07-16 07:51:04', '2019-07-16 07:53:05'),
(16, 4, NULL, NULL, 24, 2, 'null', '2019-07-22 18:50:14', '2019-07-22 18:50:14'),
(17, 4, 2, NULL, NULL, 4, 'noNote', '2019-07-22 18:51:34', '2019-07-24 02:26:10'),
(18, 4, 4, NULL, NULL, 2, 'Hh', '2019-07-22 18:55:17', '2019-07-22 18:55:17'),
(19, 4, 5, NULL, NULL, 2, 'Yy', '2019-07-22 18:55:27', '2019-07-22 18:55:27'),
(20, 4, NULL, NULL, 25, 3, 'Yyu', '2019-07-22 18:55:42', '2019-07-22 18:55:42'),
(22, 1, NULL, 1, NULL, 3, 'tttttttt', '2019-07-23 13:39:18', '2019-07-23 13:39:18'),
(23, 4, NULL, 1, NULL, 3, 'Hgg', '2019-07-23 19:29:09', '2019-07-23 19:29:09');

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
(3, 'جوالات', NULL, NULL, NULL),
(4, 'كتب', '1556978120.png', '2019-05-04 10:55:20', '2019-05-04 10:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'favorite', 1, NULL, NULL);

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
  `shop_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_time` time DEFAULT NULL,
  `close_time` time DEFAULT NULL,
  `shop_status_id` int(10) UNSIGNED NOT NULL,
  `sale` int(11) NOT NULL DEFAULT 1,
  `min_order_cost` int(11) NOT NULL DEFAULT 0,
  `mall_id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(10) UNSIGNED NOT NULL,
  `rate` int(11) NOT NULL DEFAULT 0,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `name`, `logo`, `shop_phone`, `floor`, `open_time`, `close_time`, `shop_status_id`, `sale`, `min_order_cost`, `mall_id`, `owner_id`, `rate`, `lat`, `lng`, `created_at`, `updated_at`) VALUES
(2, 'محل التل', NULL, NULL, '3', '01:00:00', '15:00:00', 1, 1, 1000, 1, 1, 4, 0, 0, NULL, '2019-07-24 02:26:10'),
(3, 'محل شحود', NULL, NULL, '5', '01:00:00', '10:00:00', 1, 1, 0, 3, 3, 0, 0, 0, NULL, '2019-05-28 11:28:14'),
(4, 'محل فراس', NULL, NULL, '5', '01:00:00', '14:00:00', 2, 1, 2000, 1, 2, 2, 0, 0, NULL, '2019-07-22 18:55:17'),
(5, 'محل التل 2', NULL, NULL, '3', '01:00:00', '13:00:00', 2, 1, 1000, 1, 1, 2, 0, 0, NULL, '2019-07-22 18:55:27'),
(14, 'tareq  kh', '1563790536.png', '0935639294', '3', '13:15:00', '13:15:00', 2, 10, 10000, 3, 22, 0, 22, 11, '2019-07-22 11:15:36', '2019-07-22 13:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `shop_categories`
--

CREATE TABLE `shop_categories` (
  `id` int(11) NOT NULL,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `scategory_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_categories`
--

INSERT INTO `shop_categories` (`id`, `shop_id`, `scategory_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2, NULL, NULL),
(2, 3, 3, NULL, NULL);

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
  `pcategory_id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `size_pcategories`
--

INSERT INTO `size_pcategories` (`id`, `pcategory_id`, `size_id`, `created_at`, `updated_at`) VALUES
(2, 5, 1, NULL, NULL),
(3, 5, 2, NULL, NULL),
(4, 5, 3, NULL, NULL),
(5, 5, 4, NULL, NULL),
(6, 6, 1, NULL, NULL),
(7, 6, 2, NULL, NULL),
(8, 6, 3, NULL, NULL),
(9, 6, 4, NULL, NULL),
(10, 8, 5, NULL, NULL),
(11, 8, 6, NULL, NULL),
(12, 8, 7, NULL, NULL),
(13, 8, 8, NULL, NULL),
(14, 7, 5, NULL, NULL),
(15, 7, 6, NULL, NULL),
(16, 7, 7, NULL, NULL),
(17, 7, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `image` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'slider', 'slide1.png', NULL, NULL),
(2, 'slider2', 'slide2.png', NULL, NULL);

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
  ADD KEY `bill_products_product_id_foreign` (`product_id`),
  ADD KEY `size3_forign_key` (`size_id`);

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
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fav_customer` (`customer_id`),
  ADD KEY `fav_product` (`product_id`);

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
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

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
  ADD KEY `mall_id_forign_key` (`mall_id`),
  ADD KEY `pcategory1_forign_key` (`pcategory_id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_forginkey` (`product_id`),
  ADD KEY `size1_forign_key` (`size_id`);

--
-- Indexes for table `rate_services`
--
ALTER TABLE `rate_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `driver_id` (`driver_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `shop_id` (`shop_id`);

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
-- Indexes for table `services`
--
ALTER TABLE `services`
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
  ADD PRIMARY KEY (`id`),
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
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `bill_products`
--
ALTER TABLE `bill_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_locations`
--
ALTER TABLE `customer_locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `malls`
--
ALTER TABLE `malls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pcategories`
--
ALTER TABLE `pcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `rate_services`
--
ALTER TABLE `rate_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scategories`
--
ALTER TABLE `scategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `shop_categories`
--
ALTER TABLE `shop_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `bill_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `size3_forign_key` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `fav_customer` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fav_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `malls_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

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
  ADD CONSTRAINT `mall_id_forign_key` FOREIGN KEY (`mall_id`) REFERENCES `malls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pcategory1_forign_key` FOREIGN KEY (`pcategory_id`) REFERENCES `pcategories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `product_forginkey` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `size1_forign_key` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rate_services`
--
ALTER TABLE `rate_services`
  ADD CONSTRAINT `rate_services_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `rate_services_ibfk_2` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`),
  ADD CONSTRAINT `rate_services_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `rate_services_ibfk_4` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`);

--
-- Constraints for table `shops`
--
ALTER TABLE `shops`
  ADD CONSTRAINT `shops_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
