-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2018 at 08:10 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `bill_type_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `code`, `user_id`, `company_id`, `note`, `bill_type_id`, `created_at`, `updated_at`) VALUES
(15, '1122', 6, NULL, 'Tuaasvan', 2, '2018-05-15 15:55:46', '2018-05-15 15:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `bill_types`
--

CREATE TABLE `bill_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill_types`
--

INSERT INTO `bill_types` (`id`, `name`, `slug`) VALUES
(1, 'Nhập', 'nhap'),
(2, 'Xuất', 'xuat');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` tinytext COLLATE utf8_unicode_ci,
  `band` tinytext COLLATE utf8_unicode_ci,
  `cubic` int(11) DEFAULT NULL,
  `phone` tinytext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `band`, `cubic`, `phone`) VALUES
(1, 'hoa', '1143', 140, '+841247434029');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Cong ty A', 'Địa chỉ', '0909900999', '2018-04-06 02:57:56', '2018-04-06 02:57:56'),
(2, 'Cong ty B', 'Địa chỉ B', '999999999', '2018-04-06 03:05:34', '2018-04-06 03:05:34'),
(3, 'Cong ty C', 'Địa chỉ C', '099093898', '2018-04-06 03:08:41', '2018-04-06 03:08:41'),
(7, 'Cong ty D', 'Dia chi D', '3276234782', '2018-04-06 03:13:44', '2018-04-06 03:13:44'),
(8, 'Cong ty E', 'Địa chỉ E', '9999999999', '2018-04-06 03:20:00', '2018-04-06 03:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` int(11) NOT NULL,
  `contract_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `customer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `user_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `contract_code`, `customer_name`, `note`, `user_id`, `created_at`, `updated_at`) VALUES
(19, 'ABC123', 'Lưu Bá Tài', 'Ghi chú abcdef', 4, '2018-06-21 04:49:37', '2018-06-21 04:49:37');

-- --------------------------------------------------------

--
-- Table structure for table `contract_items`
--

CREATE TABLE `contract_items` (
  `id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `income` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contract_items`
--

INSERT INTO `contract_items` (`id`, `contract_id`, `product_id`, `quantity`, `price`, `income`, `created_at`, `updated_at`) VALUES
(1, 12, 1, 1, 111, 111, '2018-06-21 15:37:32', '2018-06-21 15:37:32'),
(2, 13, 1, 1, 111, 111, '2018-06-21 15:40:20', '2018-06-21 15:40:20'),
(3, 14, 1, 1, 111, 111, '2018-06-21 15:40:33', '2018-06-21 15:40:33'),
(4, 15, 5, 10, 50, 5, '2018-06-21 15:57:03', '2018-06-21 15:57:03'),
(5, 16, 1, 5, 5, 5, '2018-06-21 16:21:38', '2018-06-21 16:21:38'),
(6, 17, 1, 7, 7, 8, '2018-06-21 16:27:40', '2018-06-21 16:27:40'),
(8, 19, 1, 1000, 5200, 2000, '2018-06-21 16:49:37', '2018-06-21 16:49:37'),
(9, 19, 5, 1000, 5200, 2000, '2018-06-21 16:49:37', '2018-06-21 16:49:37');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2018-03-17 04:23:21', '2018-03-17 05:08:48'),
(2, 'master', '2018-03-23 09:41:12', '2018-04-14 04:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(10) UNSIGNED DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `parent_id`, `order`, `route`, `parameters`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dashboard', NULL, NULL, 'ti-anchor', 0, 1, 'dashboard', NULL, '2018-03-23 09:43:22', '2018-04-14 05:18:37'),
(4, 1, 'Người dùng', NULL, NULL, 'ti-user', 0, 2, 'users.index', NULL, '2018-03-23 09:45:29', '2018-03-30 02:21:01'),
(5, 1, 'Vai trò & Quyền', '#', NULL, 'ti-key', 0, 3, NULL, NULL, '2018-03-24 03:26:29', '2018-04-14 05:22:55'),
(6, 1, 'Vai trò', NULL, NULL, NULL, 5, 4, 'roles.index', NULL, '2018-03-24 03:31:57', '2018-04-14 05:22:55'),
(7, 1, 'Quyền', NULL, NULL, NULL, 5, 5, 'permissions.index', NULL, '2018-03-24 03:36:07', '2018-04-14 05:10:31'),
(8, 1, 'Menu Builder', NULL, NULL, 'ti-list', 0, 4, 'menus.index', NULL, '2018-03-24 03:38:24', '2018-04-14 05:22:55'),
(9, 1, 'Sản phẩm', '#', NULL, 'ti-package', 0, 5, NULL, NULL, '2018-03-30 03:05:23', '2018-04-14 05:10:08'),
(13, 1, 'Loại sản phẩm', NULL, NULL, NULL, 9, 6, 'products.types.index', NULL, '2018-03-30 08:08:20', '2018-04-14 05:10:18'),
(14, 1, 'Danh sách sản phẩm', NULL, NULL, NULL, 9, 7, 'products.index', NULL, '2018-03-30 08:15:33', '2018-04-14 05:10:18'),
(15, 1, 'Hóa đơn', '#', NULL, 'ti-receipt', 0, 6, NULL, NULL, '2018-04-06 09:46:25', '2018-06-15 06:53:30'),
(17, 1, 'Nhập', NULL, NULL, NULL, 15, 7, 'bill.import.index', NULL, '2018-04-13 07:10:09', '2018-06-15 06:53:30'),
(18, 1, 'Xuất', NULL, NULL, NULL, 15, 8, 'bill.export.index', NULL, '2018-04-14 02:27:45', '2018-06-15 06:53:30'),
(19, 1, 'Hợp đồng', '#', NULL, 'ti-notepad', 0, 7, NULL, NULL, '2018-06-15 06:52:36', '2018-06-15 06:53:53'),
(20, 1, 'Danh Sách Hợp đồng', NULL, NULL, NULL, 19, 9, 'contracts.index', NULL, '2018-06-15 06:55:32', '2018-06-21 16:08:03'),
(21, 1, 'Thêm Hợp Đồng', NULL, NULL, 'ti-add', 19, 8, 'contracts.create', NULL, '2018-06-20 10:58:58', '2018-06-20 11:02:13');

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
(3, '2018_03_10_031326_laratrust_setup_tables', 1),
(4, '2018_03_17_091235_create_menus_table', 2),
(5, '2018_03_17_091522_create_menu_items_table', 2),
(6, '2018_03_30_092651_create_table_product_types', 3),
(7, '2018_03_30_094302_create_table_products', 3),
(8, '2018_03_31_113117_create_table_companies', 4),
(9, '2018_03_31_113148_create_table_bill_types', 4),
(10, '2018_03_31_113211_create_table_bills', 4),
(11, '2018_03_31_113620_create_table_product_bills', 4),
(12, '2018_04_06_160349_create_datas_table', 5),
(13, '2018_04_07_090557_update_products_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'create-users', 'Create Users', 'Create Users', '2018-04-14 03:40:58', '2018-04-14 03:40:58'),
(2, 'read-users', 'Read Users', 'Read Users', '2018-04-14 03:40:58', '2018-04-14 03:40:58'),
(3, 'update-users', 'Update Users', 'Update Users', '2018-04-14 03:40:58', '2018-04-14 03:40:58'),
(4, 'delete-users', 'Delete Users', 'Delete Users', '2018-04-14 03:40:58', '2018-04-14 03:40:58'),
(5, 'create-acl', 'Create Acl', 'Create Acl', '2018-04-14 03:40:58', '2018-04-14 03:40:58'),
(6, 'read-acl', 'Read Acl', 'Read Acl', '2018-04-14 03:40:58', '2018-04-14 03:40:58'),
(7, 'update-acl', 'Update Acl', 'Update Acl', '2018-04-14 03:40:58', '2018-04-14 03:40:58'),
(8, 'delete-acl', 'Delete Acl', 'Delete Acl', '2018-04-14 03:40:58', '2018-04-14 03:40:58'),
(9, 'read-profile', 'Read Profile', 'Read Profile', '2018-04-14 03:40:58', '2018-04-14 03:40:58'),
(10, 'update-profile', 'Update Profile', 'Update Profile', '2018-04-14 03:40:58', '2018-04-14 03:40:58'),
(11, 'create-roles', 'Create Roles', 'Create Roles', '2018-04-14 03:40:58', '2018-04-14 03:40:58'),
(12, 'read-roles', 'Read Roles', 'Read Roles', '2018-04-14 03:40:58', '2018-04-14 03:40:58'),
(13, 'update-roles', 'Update Roles', 'Update Roles', '2018-04-14 03:40:58', '2018-04-14 03:40:58'),
(14, 'delete-roles', 'Delete Roles', 'Delete Roles', '2018-04-14 03:40:59', '2018-04-14 03:40:59'),
(15, 'create-permissions', 'Create Permissions', 'Create Permissions', '2018-04-14 03:40:59', '2018-04-14 03:40:59'),
(16, 'read-permissions', 'Read Permissions', 'Read Permissions', '2018-04-14 03:40:59', '2018-04-14 03:40:59'),
(17, 'update-permissions', 'Update Permissions', 'Update Permissions', '2018-04-14 03:40:59', '2018-04-14 03:40:59'),
(18, 'delete-permissions', 'Delete Permissions', 'Delete Permissions', '2018-04-14 03:40:59', '2018-04-14 03:40:59'),
(19, 'create-menus', 'Create Menus', 'Create Menus', '2018-04-14 03:40:59', '2018-04-14 03:40:59'),
(20, 'read-menus', 'Read Menus', 'Read Menus', '2018-04-14 03:40:59', '2018-04-14 03:40:59'),
(21, 'update-menus', 'Update Menus', 'Update Menus', '2018-04-14 03:40:59', '2018-04-14 03:40:59'),
(22, 'delete-menus', 'Delete Menus', 'Delete Menus', '2018-04-14 03:40:59', '2018-04-14 03:40:59'),
(23, 'create-products', 'Create Products', 'Create Products', '2018-04-14 03:40:59', '2018-04-14 03:40:59'),
(24, 'read-products', 'Read Products', 'Read Products', '2018-04-14 03:40:59', '2018-04-14 03:40:59'),
(25, 'update-products', 'Update Products', 'Update Products', '2018-04-14 03:40:59', '2018-04-14 03:40:59'),
(26, 'delete-products', 'Delete Products', 'Delete Products', '2018-04-14 03:40:59', '2018-04-14 03:40:59'),
(27, 'create-imports', 'Create Imports', 'Create Imports', '2018-04-14 03:40:59', '2018-04-14 03:40:59'),
(28, 'read-imports', 'Read Imports', 'Read Imports', '2018-04-14 03:40:59', '2018-04-14 03:40:59'),
(29, 'update-imports', 'Update Imports', 'Update Imports', '2018-04-14 03:40:59', '2018-04-14 03:40:59'),
(30, 'delete-imports', 'Delete Imports', 'Delete Imports', '2018-04-14 03:40:59', '2018-04-14 03:40:59'),
(31, 'create-exports', 'Create Exports', 'Create Exports', '2018-04-14 03:40:59', '2018-04-14 03:40:59'),
(32, 'read-exports', 'Read Exports', 'Read Exports', '2018-04-14 03:40:59', '2018-04-14 03:40:59'),
(33, 'update-exports', 'Update Exports', 'Update Exports', '2018-04-14 03:40:59', '2018-04-14 03:40:59'),
(34, 'delete-exports', 'Delete Exports', 'Delete Exports', '2018-04-14 03:41:00', '2018-04-14 03:41:00'),
(35, 'create-contracts', 'Create Contracts', 'Create Contracts', '2018-04-14 03:41:00', '2018-04-14 03:41:00'),
(36, 'read-contracts', 'Read Contracts', 'Read Contracts', '2018-04-14 03:41:00', '2018-04-14 03:41:00'),
(37, 'update-contracts', 'Update Contracts', 'Update Contracts', '2018-04-14 03:41:00', '2018-04-14 03:41:00'),
(38, 'delete-contracts', 'Delete Contracts', 'Delete Contracts', '2018-04-14 03:41:00', '2018-04-14 03:41:00'),
(39, 'read-bills', 'read-bills', 'read-bills', '2018-06-20 17:10:19', '2018-06-20 17:10:19'),
(40, 'create-bills', 'create-bills', 'Create Bills', '2018-06-20 17:11:54', '2018-06-20 17:11:54');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(10, 3),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'App\\\\User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `colors` text COLLATE utf8mb4_unicode_ci,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `quantity_si` int(11) NOT NULL DEFAULT '0',
  `product_type_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `description`, `image`, `slug`, `colors`, `quantity`, `quantity_si`, `product_type_id`, `created_at`, `updated_at`, `price`) VALUES
(1, 'IPX10', 'IPhone X', 'IPhone X', 'uploads/1522466624.jpg', 'iphone-x', '[\"blue\",\"red\",\"white\"]', 30, 20, 9, '2018-03-30 09:26:41', '2018-05-15 15:55:46', 10),
(5, 'NV3E', 'Product 2 Nova 3e', 'ádasd', 'uploads/1523069201.jpeg', 'product-2-nova-3e', '[\"blue\",\"black\"]', 11, 12, 9, '2018-04-07 02:46:41', '2018-04-13 08:25:38', 200);

-- --------------------------------------------------------

--
-- Table structure for table `product_bills`
--

CREATE TABLE `product_bills` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `bill_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `quantity_si` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_bills`
--

INSERT INTO `product_bills` (`product_id`, `bill_id`, `quantity`, `quantity_si`) VALUES
(1, 15, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(9, 'Smartphone', '2018-03-31 03:25:48', '2018-03-31 03:33:30');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'Superadmin', 'Superadmin', '2018-04-14 03:40:58', '2018-04-14 03:40:58'),
(2, 'admin', 'Admin', 'Admin', '2018-04-14 03:41:02', '2018-04-14 03:41:02'),
(3, 'user', 'User', 'User', '2018-04-14 03:41:03', '2018-04-14 03:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'App\\User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(2, 2, 'App\\User'),
(3, 3, 'App\\User'),
(1, 4, 'App\\User'),
(1, 5, 'App\\User'),
(1, 6, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'admin@likegroup.vn', '$2y$10$/z89L2/RRPHg2SluLZ.miu1fimTm2ieonz3/fBpT5N0Glnu32wTvW', 'ojqffWsZZMPnDftV5Oy6kyPbZdLRsNtc4ndg2SAsM51ayqelmHLpdNIKmTAN', '2018-04-14 03:41:03', '2018-04-14 03:41:03'),
(3, 'User', 'user@likegroup.vn', '$2y$10$NqKFJHzDHl784PEXrdDizeE0PVQsiFKq2OnEpbGBmOuA47.C4dOh2', NULL, '2018-04-14 03:41:03', '2018-04-14 03:41:03'),
(4, 'Superadministrator', 'superadmin@likegroup.vn', '$2y$10$Y6UokbsDh/YpSfjurI47N.mrC6flIJ.XDmvgvddhyi3/1V3ur2dhy', '8GsxdsI2GWVrQzAH6Yv18zeCkLsaCTZsq6fTOe1RU5B4zeU6cBNRiDSN4XFo', '2018-04-14 04:19:42', '2018-04-14 04:19:42'),
(5, 'Lưu Bá Tài', 'luubatai@gmail.com', '$2y$10$djTVg7Bosb.MY/znsUD8feWlD16RquYMe6uv3H3pOCpXv.T3mKxfu', NULL, '2018-05-15 15:41:11', '2018-05-15 15:41:11'),
(6, 'Diệp Xương Kiện', 'kien.diepxuong@gmail.com', '$2y$10$DT4BlPk3OEBXF4y6oeBQKuVCaJU8llj3Y2XwumBu/.xNc7fCpyc7S', 'yjUsG3iinRcrLsdNiI0FhrFilSbohLPLNT6hcP0SG996zWBAdi8rawgczez4', '2018-05-15 15:43:25', '2018-05-15 15:43:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_user_id_foreign` (`user_id`),
  ADD KEY `bills_company_id_foreign` (`company_id`),
  ADD KEY `bills_bill_type_id_foreign` (`bill_type_id`);

--
-- Indexes for table `bill_types`
--
ALTER TABLE `bill_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract_items`
--
ALTER TABLE `contract_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_product_type_id_foreign` (`product_type_id`);

--
-- Indexes for table `product_bills`
--
ALTER TABLE `product_bills`
  ADD KEY `product_bills_product_id_foreign` (`product_id`),
  ADD KEY `product_bills_bill_id_foreign` (`bill_id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bill_types`
--
ALTER TABLE `bill_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contract_items`
--
ALTER TABLE `contract_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_bill_type_id_foreign` FOREIGN KEY (`bill_type_id`) REFERENCES `bill_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bills_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_product_type_id_foreign` FOREIGN KEY (`product_type_id`) REFERENCES `product_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_bills`
--
ALTER TABLE `product_bills`
  ADD CONSTRAINT `product_bills_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_bills_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
