-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2023 at 10:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4
-- Generation Time: May 30, 2023 at 04:42 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `order_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `avatar`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'VNPT', 'Khách hàng VNPT', '2023-05-25__category-vnpt.png', 'vnpt', '2023-05-25 02:35:30', '2023-05-25 09:30:58'),
(2, 'CTU', 'Khách hàng CTU', '2023-05-25__category-ctu.png', 'ctu', '2023-05-25 02:35:38', '2023-05-25 09:31:54'),
(3, 'Khác', 'Khách hàng khác', '2023-05-25__category-viettel.png', 'khac', '2023-05-25 02:35:47', '2023-05-25 09:48:54'),
(4, 'NCTU', 'Khách hàng Nam Cần Thơ', '2023-05-25__caterofy-nctu.png', 'nctu', '2023-05-25 12:16:31', '2023-05-25 12:16:31'),
(5, 'CRM', 'Nhóm crm á', '2023-05-30__screenshot-2022-05-26-095306.jpg', 'crm', '2023-05-30 14:18:40', '2023-06-08 14:04:05');

-- --------------------------------------------------------

--
-- Table structure for table `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` char(36) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` char(36) NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `position_id` int(11) DEFAULT 0,
  `customer_id` int(11) DEFAULT 0,
  `birthday` date DEFAULT NULL,
  `user_id` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `address`, `phone`, `email`, `gender`, `position_id`, `customer_id`, `birthday`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Hà Trung Nghĩa', 'Phú Tân - An Giang', '0339557875', 'nghiavn@gmail.com', NULL, 1, 2, NULL, 1, NULL, NULL),
(2, 'Huỳnh Nhật Trường', 'Ninh Kiều - Cần Thơ', '0335648586', 'truong@gmail.com', 'Nam', 3, 4, NULL, 5, NULL, NULL),
(3, 'Cao Như Thuần', NULL, '0325658959', 'thuan@gmail.com', NULL, 2, 5, NULL, 0, '2023-06-22 11:32:04', '2023-06-22 11:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `contact_id` int(11) DEFAULT NULL,
  `value` varchar(255) DEFAULT '0',
  `start_day` datetime DEFAULT NULL,
  `finish_day` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contract_type_id` int(11) DEFAULT NULL,
  `payments` varchar(255) DEFAULT NULL,
  `transportation` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `payment_amount` varchar(255) DEFAULT '0',
  `debt` varchar(255) DEFAULT '0',
  `revenue_for` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `user_id`, `customer_id`, `contact_id`, `value`, `start_day`, `finish_day`, `status`, `name`, `contract_type_id`, `payments`, `transportation`, `phone`, `payment_date`, `payment_type`, `payment_amount`, `debt`, `revenue_for`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 2, '5842500.00', '2023-06-07 16:31:31', '2023-06-07 16:31:31', 1, 'Hợp đồng đăng ký gói dịch vụ 01', 2, 'Trả trước', 'J&T', '0339557475', NULL, 'Nhận tiền mặt', '2000000', '0', '', NULL, NULL, '2023-06-29 17:34:32'),
(3, 2, 4, 2, '12000000.00', '2023-06-04 23:28:00', '2023-06-20 23:28:00', -2, 'Test', 5, NULL, NULL, NULL, '2023-06-19 23:28:00', NULL, '2400000', '0', NULL, 'Haizzz', '2023-06-27 16:28:57', '2023-06-27 19:31:23'),
(8, 1, 2, 1, '23275000.00', '2023-06-04 01:04:00', '2023-06-29 01:04:00', 1, 'Test Hàng hóa', 2, NULL, NULL, NULL, NULL, NULL, '23275000', '0', NULL, NULL, '2023-06-29 18:05:06', '2023-06-30 08:03:33'),
(9, 2, 5, 2, '2375000.00', '2023-06-04 15:09:00', '2023-06-30 15:09:00', 1, 'Bảo trì website bán linh kiện điện tử', 3, 'Trả sau', 'Loại hàng hóa không vận chuyển', '0339557475', NULL, NULL, '0', '0', NULL, NULL, '2023-06-30 08:10:19', '2023-06-30 09:11:10'),
(11, 1, 2, 1, '4655000', '2023-05-28 15:26:00', '2023-06-28 15:26:00', 4, 'aaaaaaa', 3, NULL, NULL, NULL, '2023-06-13 21:45:00', 'Nhận tiền mặt', '4655000', '0', NULL, NULL, '2023-06-30 08:26:52', '2023-06-30 20:02:45'),
(12, 2, 2, 2, '5842500.00', '2023-06-04 15:29:00', '2023-06-29 15:29:00', 1, 'BBBBB', 2, 'Trả sau', 'Loại hàng hóa không vận chuyển', NULL, NULL, NULL, '0', '0', 'Lê Thắng', NULL, '2023-06-30 08:29:50', '2023-06-30 13:44:49'),
(13, 1, 5, 3, '0.00', '2023-06-04 16:05:00', '2023-06-29 16:05:00', 0, 'Hợp đồng sử dụng gói DV 01', 2, NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, '2023-06-30 09:06:42', '2023-06-30 09:06:42'),
(14, 5, 5, 1, '4655000', '2023-06-04 17:56:00', '2023-06-29 17:56:00', 1, 'CCCCCC', 3, 'Trả sau', 'Loại hàng hóa không vận chuyển', NULL, '2023-07-18 00:44:00', 'Nhận tiền mặt', '4655000', '0', 'Lê Thắng', NULL, '2023-06-30 10:56:41', '2023-06-30 17:44:17'),
(15, 1, 2, 1, '0.00', '2023-06-05 18:01:00', '2023-06-29 18:01:00', 0, 'testcontracttypeid', 5, NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, '2023-06-30 11:02:00', '2023-06-30 11:02:00'),
(16, 18, 2, 2, '0.00', '2023-06-01 18:12:00', '2023-06-29 18:12:00', 0, 'ZZZZZZZZZZZA', 3, NULL, NULL, '0869888999', NULL, NULL, '0', '0', 'Lê Thắng', NULL, '2023-06-30 11:12:40', '2023-06-30 17:25:33'),
(17, 1, 3, 1, '2375000', '2023-06-04 21:50:00', '2023-06-29 21:50:00', 1, 'Hợp đồng test', 2, 'Trả sau', 'Loại hàng hóa không vận chuyển', NULL, NULL, NULL, '2375000', '0', 'Huỳnh Nhật Trường', NULL, '2023-06-30 14:51:44', '2023-06-30 14:55:41'),
(19, 18, 2, 2, '128155000', '2023-06-04 23:30:00', '2023-06-29 23:30:00', 1, 'Hợp đồng test', 8, 'Trả sau', 'Loại hàng hóa không vận chuyển', '0869888999', NULL, NULL, '0', '128155000', 'Lê Minh Thắng', 'abc', '2023-06-30 16:30:40', '2023-06-30 16:45:01'),
(20, 1, 2, 1, '0', '2023-06-04 23:48:00', '2023-06-29 23:48:00', 0, 'VVVVVVVVV', 8, NULL, NULL, '0869859555', NULL, NULL, '0', '0', NULL, NULL, '2023-06-30 16:48:56', '2023-06-30 16:52:16'),
(21, 16, 2, 1, '0', '2023-06-04 23:53:00', '2023-06-22 23:53:00', 0, 'sadasdfasfv', 5, NULL, NULL, '0869859434', NULL, NULL, '0', '0', NULL, NULL, '2023-06-30 16:53:22', '2023-06-30 16:53:22');

-- --------------------------------------------------------

--
-- Table structure for table `contract_goods_detail`
--

CREATE TABLE `contract_goods_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contract_id` bigint(20) UNSIGNED DEFAULT NULL,
  `goods_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `total_value` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contract_goods_detail`
--

INSERT INTO `contract_goods_detail` (`id`, `contract_id`, `goods_id`, `quantity`, `total_value`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 1, 2280000, '2023-06-29 17:09:41', '2023-06-29 17:09:41'),
(2, 1, 1, 2, 2375000, '2023-06-29 17:10:12', '2023-06-29 17:10:12'),
(3, 8, 4, 2, 4560000, '2023-06-29 19:07:15', '2023-06-29 19:07:15'),
(5, 8, 1, 3, 3562500, '2023-06-29 19:13:06', '2023-06-29 19:13:06'),
(6, 8, 1, 4, 4750000, '2023-06-29 19:20:15', '2023-06-29 19:20:15'),
(7, 8, 1, 1, 1187500, '2023-06-29 19:27:52', '2023-06-29 19:27:52'),
(8, 8, 1, 1, 1187500, '2023-06-29 19:38:17', '2023-06-29 19:38:17'),
(9, 8, 1, 1, 1187500, '2023-06-29 19:40:36', '2023-06-29 19:40:36'),
(10, 8, 4, 2, 4560000, '2023-06-29 19:45:15', '2023-06-29 19:45:15'),
(11, 1, 1, 1, 1187500, '2023-06-29 19:46:59', '2023-06-29 19:46:59'),
(12, 12, 1, 2, 2375000, '2023-06-30 08:36:16', '2023-06-30 08:36:16'),
(13, 12, 4, 1, 2280000, '2023-06-30 08:37:38', '2023-06-30 08:37:38'),
(14, 12, 1, 1, 1187500, '2023-06-30 09:04:17', '2023-06-30 09:04:17'),
(15, 9, 1, 2, 2375000, '2023-06-30 09:11:30', '2023-06-30 09:11:30'),
(16, 11, 1, 2, 2375000, '2023-06-30 11:30:36', '2023-06-30 11:30:36'),
(17, 11, 4, 1, 2280000, '2023-06-30 11:36:07', '2023-06-30 11:36:07'),
(18, 17, 1, 2, 2375000, '2023-06-30 14:52:47', '2023-06-30 14:52:47'),
(19, 14, 1, 2, 2375000, '2023-06-30 17:42:50', '2023-06-30 17:42:50'),
(20, 14, 4, 1, 2280000, '2023-06-30 17:43:07', '2023-06-30 17:43:07'),
(22, 19, 1, 2, 2375000, '2023-06-30 18:43:05', '2023-06-30 18:43:05'),
(23, 19, 4, 1, 2280000, '2023-06-30 19:22:05', '2023-06-30 19:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `contract_types`
--

CREATE TABLE `contract_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contract_types`
--

INSERT INTO `contract_types` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Hợp đồng bảo trì', 'Thực hiện các công việc bảo trì cho chương trình hoặc ứng dụng truyền thông', NULL, '2023-06-30 15:59:07'),
(3, 'Gói dịch vụ', 'Đăng ký sử dụng các gói dịch vụ được cung cấp', NULL, '2023-06-09 09:55:52'),
(5, 'Thiết kế Web', 'Thiết kế website theo yêu cầu cho các mục đích thương mại điện tử, quản lý nghiệp vụ,....', '2023-06-08 13:56:00', '2023-06-08 13:56:00'),
(8, 'Sử dụng chữ ký số', 'Hợp đồng sử dụng chữ ký số quy mô lớn, cấp doanh nghiệp', '2023-06-30 15:57:41', '2023-06-30 15:57:41');
(5, 'Nhóm crm', 'Nhóm crm á', '2023-05-30__screenshot-2022-05-26-095306.jpg', 'nhom-crm', '2023-05-30 14:18:40', '2023-05-30 14:34:32');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `ward_id` int(11) DEFAULT 0,
  `district_id` int(11) DEFAULT 0,
  `province_id` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--


INSERT INTO `customers` (`id`, `name`, `address`, `phone`, `email`, `tax_code`, `description`, `avatar`, `slug`, `status`, `user_id`, `category_id`, `ward_id`, `district_id`, `province_id`, `created_at`, `updated_at`) VALUES
(2, 'Lê Minh Thắng', 'Cần Thơ', '0869859343', 'thang12@gmail.com', 'T02', NULL, '2023-05-25__customer-vnpt.png', 'le-minh-thang', 1, 0, 1, 0, 0, 0, '2023-05-25 02:45:33', '2023-05-25 09:57:19'),
(3, 'Nhật Trường CTU', NULL, '0899555333', NULL, NULL, NULL, '2023-05-25__customer-ctu.png', 'nhat-truong-ctu', 2, 0, 2, 0, 0, 0, '2023-05-25 02:50:54', '2023-05-26 01:56:28'),
(4, 'Cao Thuần', NULL, '0899666333', 'thuan@gmail.com', NULL, NULL, '2023-05-25__customer-ctu.png', 'cao-thuan', 2, 0, 2, 0, 0, 0, '2023-05-25 12:02:32', '2023-05-26 01:54:43'),
(5, 'Bá Tùng', NULL, '0899555333', 'truong@gmail.com', NULL, NULL, NULL, 'ba-tung', 3, 0, 3, 0, 0, 0, '2023-05-26 01:55:03', '2023-05-26 01:55:11'),
(6, 'Khách hàng do Admin - Lê Thắng tạo', NULL, '0899555333', 'truong222@gmail.com', NULL, NULL, NULL, 'khach-hang-do-admin-le-thang-tao', 1, 5, 3, 0, 0, 0, '2023-05-26 03:47:07', '2023-05-26 03:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `prefix` varchar(255) DEFAULT NULL,
  `province_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `customers` (`id`, `name`, `address`, `phone`, `email`, `tax_code`, `description`, `avatar`, `slug`, `status`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 'Lê Minh Thắng', NULL, '0869859343', NULL, NULL, NULL, '2023-05-25__customer-vnpt.png', 'le-minh-thang', 1, 0, 1, '2023-05-25 02:45:33', '2023-05-25 09:57:19'),
(3, 'Nhật Trường CTU', NULL, '0899555333', NULL, NULL, NULL, '2023-05-25__customer-ctu.png', 'nhat-truong-ctu', 2, 0, 2, '2023-05-25 02:50:54', '2023-05-26 01:56:28'),
(4, 'Cao Thuần', NULL, '0899666333', 'thuan@gmail.com', NULL, NULL, '2023-05-25__customer-ctu.png', 'cao-thuan', 2, 0, 2, '2023-05-25 12:02:32', '2023-05-26 01:54:43'),
(5, 'Bá Tùng', NULL, '0899555333', 'truong@gmail.com', NULL, NULL, NULL, 'ba-tung', 3, 0, 3, '2023-05-26 01:55:03', '2023-05-26 01:55:11'),
(6, 'Khách hàng do Admin - Lê Thắng tạo', NULL, '0899555333', 'truong222@gmail.com', NULL, NULL, NULL, 'khach-hang-do-admin-le-thang-tao', 1, 5, 3, '2023-05-26 03:47:07', '2023-05-26 03:47:07');


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

-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `goods_code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `manufacturer` varchar(255) DEFAULT NULL,
  `origin` varchar(255) DEFAULT NULL,
  `guarantee` varchar(255) DEFAULT NULL,
  `describe` varchar(255) DEFAULT NULL,
  `input_price` double DEFAULT NULL,
  `output_price` double DEFAULT NULL,
  `markup_ratio` double DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `tax_value` varchar(255) DEFAULT '0',
  `total` double DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`id`, `order_id`, `goods_code`, `name`, `unit`, `manufacturer`, `origin`, `guarantee`, `describe`, `input_price`, `output_price`, `markup_ratio`, `tax`, `tax_value`, `total`, `avatar`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Gói DV03', 'Gói', 'VNPT', 'Cần Thơ', NULL, NULL, 1000000, 1250000, 25, 5, '62500', 1187500, NULL, NULL, '2023-06-22 18:25:22'),
(4, NULL, NULL, 'Gói DV02', 'Gói', 'VNPT', 'Cần Thơ', '2 tháng', NULL, 2000000, 2400000, 20, 5, '0', 2280000, NULL, '2023-06-22 18:16:58', '2023-06-22 18:16:58'),
(5, NULL, NULL, 'Gói DV04', 'Gói', 'VNPT', 'Cần Thơ', '2 năm', NULL, 100000000000, 105000000000, 5, 1, '0', 103950000000, NULL, '2023-06-29 15:00:55', '2023-06-30 16:22:13'),
(7, NULL, NULL, 'Hàng mới', 'Thùng', 'NSG', 'An Giang', '2 tháng', NULL, 100000000, 130000000, 30, 5, '5500000', 123500000, NULL, '2023-06-30 18:35:20', '2023-06-30 19:18:21');

-- --------------------------------------------------------

--

-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
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
(12, '2023_05_24_163950_create_custumers_table', 1),
(24, '2014_10_12_000000_create_users_table', 2),
(25, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(26, '2019_08_19_000000_create_failed_jobs_table', 2),
(27, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(28, '2023_05_23_152449_create_categories_table', 2),
(29, '2023_05_24_163950_create_customers_table', 2),
(30, '2023_05_25_195044_create_user_type_table', 3),
(31, '2023_05_29_214705_create_jobs_table', 4),
(35, '2023_06_06_212022_create_transactions_table', 5),
(36, '2023_06_07_200414_create_contract_table', 5),
(37, '2023_06_07_211747_create_contract_types_table', 6),
(38, '2023_06_07_212407_create_contract_types_table', 7),
(39, '2023_06_06_235451_create_positions_table', 8),
(40, '2023_06_08_185551_create_contacts_table', 8),
(41, '2023_06_09_162426_create_orders_table', 8),
(42, '2023_06_09_171839_create_goods_table', 8),
(43, '2023_06_11_999999_add_active_status_to_users', 8),
(44, '2023_06_11_999999_add_avatar_to_users', 8),
(45, '2023_06_11_999999_add_dark_mode_to_users', 8),
(46, '2023_06_11_999999_add_messenger_color_to_users', 8),
(47, '2023_06_11_999999_create_chatify_favorites_table', 8),
(48, '2023_06_11_999999_create_chatify_messages_table', 8),
(49, '2023_06_23_004640_create_contract_goods_detail_table', 9),
(50, '2023_06_12_213353_create_locations_table', 10),
(51, '2023_06_12_214131_alter_column_location_in_customer', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code_customer` int(11) DEFAULT NULL,
  `deliver` varchar(255) DEFAULT NULL,
  `contact_id` int(11) DEFAULT NULL,
  `guarantee` varchar(255) DEFAULT NULL,
  `delivery_address` varchar(255) DEFAULT NULL,
  `payments` varchar(255) DEFAULT NULL,
  `delivery_time` date DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
(31, '2023_05_29_214705_create_jobs_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Giám đốc', NULL, NULL),
(2, 'Kỹ thuật', NULL, NULL),
(3, 'Trưởng phòng', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `transaction_type` varchar(255) DEFAULT NULL,
  `contact_id` int(11) DEFAULT NULL,
  `start_day` datetime DEFAULT current_timestamp(),
  `deadline_date` datetime DEFAULT current_timestamp(),
  `finish_day` datetime DEFAULT current_timestamp(),
  `status` int(11) DEFAULT 1,
  `result` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `transaction_address` varchar(255) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `name`, `description`, `user_id`, `customer_id`, `transaction_type`, `contact_id`, `start_day`, `deadline_date`, `finish_day`, `status`, `result`, `priority`, `transaction_address`, `document`, `created_at`, `updated_at`) VALUES
(1, 'Đăng ký Gói DV01', 'Đăng ký sử dụng gói dịch vụ 01 trong 1 tháng tới.', 1, 3, 'Giao dịch cung cấp dịch vụ', 1, '2023-06-06 00:19:34', '2023-06-07 00:19:34', '2023-06-06 00:19:34', 1, 'Thành công', 3, 'An Giang', NULL, '2023-06-05 17:19:34', '2023-06-30 13:13:03'),
(17, 'Test', 'aaaaa', 18, 2, 'Giao dịch hợp tác đối tác', 1, '2023-06-05 20:40:00', '2023-06-21 20:40:00', NULL, 2, 'Thành công', 1, NULL, NULL, '2023-06-27 13:40:57', '2023-06-30 13:08:21'),
(18, 'Giao dịch test lần cuối cùng', 'Được tạo ra để test đó', 18, 3, 'Giao dịch mua sắm', 3, '2023-06-05 22:45:00', '2023-06-29 22:45:00', '2023-06-20 22:45:00', 3, 'Okla', 5, 'Cần Thơ', 'C:\\xampp\\tmp\\php706A.tmp', '2023-06-30 15:46:14', '2023-06-30 15:54:34'),
(19, 'ZZZZZ', NULL, 18, 4, 'Giao dịch mua sắm', 2, '2023-06-04 22:47:00', '2023-06-30 22:47:00', NULL, 0, NULL, 1, 'An Giang', NULL, '2023-06-30 15:48:04', '2023-06-30 15:48:04');

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
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `address`, `gender`, `phone`, `avatar`, `status`, `remember_token`, `created_at`, `updated_at`, `active_status`, `dark_mode`, `messenger_color`) VALUES
(1, 'Lê Minh Thắng', 'thang@gmail.com', NULL, '$2y$10$bY8N540QNNgvsp8.qCYSs.Nt4oa.VCQFWZoJXSajc8yjywd.DgfFG', NULL, NULL, '0869859434', '2023-05-25__avata-2.jpg', 1, NULL, '2023-05-25 15:12:48', '2023-05-26 01:01:06', 0, 0, NULL),
(2, 'Huỳnh Nhật Trường', 'truong@gmail.com', NULL, '$2y$10$v55ze6Zb3e.VEnkrb9SEsOlI6AXNgroCcF30NqjoV6v4RY7vaZo.O', NULL, NULL, '0869859434', '2023-05-25__avata-3.jpg', 2, NULL, '2023-05-25 15:52:46', '2023-05-25 16:24:28', 0, 0, NULL),
(5, 'Lê Thắng', 'admin@gmail.com', NULL, '$2y$10$UM/UghIrzA5wQw6ef307ruRqQn0rQcEan7J2YrbjWyz3vKFo5AR4e', 'Cần Thơ', NULL, '0869888999', NULL, 2, NULL, '2023-05-26 02:38:04', NULL, 0, 0, NULL),
(16, 'Lê Minh Thắng', 'thang259a3@gmail.com', NULL, '$2y$10$uHg7JjROxIYErGcsHniKBeCPH3QGedCEQlmdeA726O9mt3.qauxVi', NULL, NULL, '0869859434', '2023-05-29__z3256462162898-65a4e92d8293f141153ad646073ee509.jpg', 2, NULL, '2023-05-29 15:04:34', '2023-05-29 15:05:06', 0, 0, NULL),
(18, 'Lê Trường', 'truong123@gmail.com', NULL, '$2y$10$rOU.z7b.f90xowv9MNsh7elj5NyZaxlfnMs.E.sHsCI1LZZpXlMRW', 'Cần Thơ', NULL, '0869888999', NULL, 1, NULL, '2023-06-27 12:06:03', NULL, 0, 0, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `address`, `gender`, `phone`, `avatar`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Lê Minh Thắng', 'thang@gmail.com', NULL, '$2y$10$bY8N540QNNgvsp8.qCYSs.Nt4oa.VCQFWZoJXSajc8yjywd.DgfFG', NULL, NULL, '0869859434', '2023-05-25__avata-2.jpg', 1, NULL, '2023-05-25 15:12:48', '2023-05-26 01:01:06'),
(2, 'Huỳnh Nhật Trường', 'truong@gmail.com', NULL, '$2y$10$v55ze6Zb3e.VEnkrb9SEsOlI6AXNgroCcF30NqjoV6v4RY7vaZo.O', NULL, NULL, '0869859434', '2023-05-25__avata-3.jpg', 2, NULL, '2023-05-25 15:52:46', '2023-05-25 16:24:28'),
(5, 'Lê Thắng', 'admin@gmail.com', NULL, '$2y$10$UM/UghIrzA5wQw6ef307ruRqQn0rQcEan7J2YrbjWyz3vKFo5AR4e', 'Cần Thơ', NULL, '0869888999', NULL, 2, NULL, '2023-05-26 02:38:04', NULL),
(16, 'Lê Minh Thắng', 'thang259a3@gmail.com', NULL, '$2y$10$uHg7JjROxIYErGcsHniKBeCPH3QGedCEQlmdeA726O9mt3.qauxVi', NULL, NULL, '0869859434', '2023-05-29__z3256462162898-65a4e92d8293f141153ad646073ee509.jpg', 2, NULL, '2023-05-29 15:04:34', '2023-05-29 15:05:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_types`
--

CREATE TABLE `user_has_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `user_type_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_has_types`
--

INSERT INTO `user_has_types` (`id`, `user_id`, `user_type_id`, `created_at`, `updated_at`) VALUES
(4, 1, 1, '2023-05-25 15:51:53', '2023-05-26 01:01:06'),
(5, 2, 1, '2023-05-25 15:52:46', '2023-05-25 16:24:28'),
(7, 5, 2, '2023-05-26 02:38:58', NULL),
(18, 16, 2, '2023-05-29 15:04:34', NULL),
(20, 18, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'USER ', 'User người dùng (nhân viên)', '2023-05-25 12:55:58', NULL),
(2, 'ADMIN', 'Admin hệ thống ', '2023-05-25 12:55:58', NULL),
(3, 'SYSTEM', 'System tài khoản hệ thống', '2023-05-25 12:58:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `prefix` varchar(255) DEFAULT NULL,
  `province_id` int(11) NOT NULL DEFAULT 0,
  `district_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_slug_unique` (`slug`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_has_types`
--
ALTER TABLE `user_has_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_types_name_unique` (`name`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contract_goods_detail`
--
ALTER TABLE `contract_goods_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `contract_types`
--
ALTER TABLE `contract_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_has_types`
--
ALTER TABLE `user_has_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contract_goods_detail`
--
ALTER TABLE `contract_goods_detail`
  ADD CONSTRAINT `contract_goods_detail_contract_id_foreign` FOREIGN KEY (`contract_id`) REFERENCES `contracts` (`id`),
  ADD CONSTRAINT `contract_goods_detail_goods_id_foreign` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
