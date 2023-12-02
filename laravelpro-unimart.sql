-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 06:13 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelpro-unimart`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_posts`
--

CREATE TABLE `category_posts` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_slug` varchar(100) NOT NULL,
  `category_desc` text NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_posts`
--

INSERT INTO `category_posts` (`category_id`, `category_name`, `category_slug`, `category_desc`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Khuyến Mãi', 'khuyen-mai', 'ffesfwefwgrgsd', 0, '2023-11-20 13:53:34', '2023-11-14 13:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `category_products`
--

CREATE TABLE `category_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_products`
--

INSERT INTO `category_products` (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Laptop', 'lap-top', 0, '2023-11-07 13:14:27', '2023-11-14 13:14:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `color_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`color_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Vàng', '2023-11-09 03:08:33', '2023-11-16 03:08:33'),
(2, 'Xanh', '2023-11-21 03:08:33', '2023-11-22 03:08:33'),
(3, 'Đỏ', '2023-11-14 03:09:04', '2023-11-28 03:09:04'),
(4, 'Cam', '2023-11-21 03:09:04', '2023-11-24 03:09:04'),
(5, 'Đen', '2023-11-22 03:09:34', '2023-11-19 03:09:34');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `email`, `phone`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Nguyễn Mỹ Duyên', 'Sóc trăng', 'nthimyduyen1012@gmail.com', '097687623', '2023-10-15 03:01:38', '2023-11-09 00:23:24', NULL),
(6, 'Nguyen Ngoc Tuong Vy', 'Hồ Chí Minh', 'nngoctvy@gmail.com', '0890989878', '2023-11-09 00:26:45', '2023-11-09 00:26:45', NULL),
(7, 'Nguyen Tran Anh Khoi', 'Da lat', 'Anhkhoi@gmail.com', '0644543538', '2023-11-09 00:28:47', '2023-11-09 00:59:12', NULL);

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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_size` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_10_10_022303_add_soft_delete_to_users', 2),
(7, '2023_10_11_144645_create_post_table', 3),
(8, '2023_10_11_151409_create_post_table', 4),
(9, '2023_10_11_152951_create_posts_table', 5),
(10, '2023_10_13_132222_add_soft_delete_to_post', 6),
(11, '2023_10_14_104037_create_product_table', 7),
(12, '2023_10_14_124856_create_product_table', 8),
(13, '2023_10_14_130104_create_products_table', 9),
(14, '2023_10_15_091152_add_soft_delete_to_products', 10),
(15, '2023_10_16_015412_create_permissions_table', 11),
(16, '2023_10_16_020231_create_roles_table', 12),
(17, '2023_10_16_020614_create_role_permission', 13),
(18, '2023_10_16_022136_create_user_role_table', 14),
(19, '2023_10_24_004653_create_order_table', 15),
(20, '2023_10_24_010437_create_customer_table', 15),
(21, '2023_10_24_013726_create_customers_table', 16),
(22, '2023_10_24_030012_create_customer_table', 17),
(23, '2023_10_24_030109_create_customers_table', 18),
(24, '2023_10_27_041430_create_pages_table', 19),
(25, '2023_11_01_032013_create_category_posts_table', 20),
(26, '2023_11_01_032709_create_posts_table', 21),
(27, '2023_11_06_073451_create_category_products_table', 22),
(28, '2023_11_06_081255_create_products_tablde', 22),
(29, '2023_11_06_081801_create_products_table', 23),
(30, '2023_11_06_085322_create_category_posts_table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product_quantity` int(3) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `payment_method` enum('COD','Online Payment','','') NOT NULL DEFAULT 'COD',
  `shipping_address` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `product_quantity`, `total_amount`, `order_date`, `payment_method`, `shipping_address`, `status`, `user_id`, `customer_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 24500000, '2023-11-12 02:06:00', 'COD', 'Cần Thơ', 0, 1, 1, '2023-11-07 01:06:00', '2023-11-21 01:06:00', NULL),
(2, 1, 13400000, '2023-11-12 03:33:21', 'COD', 'Cà Mau', 1, 4, 7, '2023-11-20 02:33:21', '2023-11-12 19:31:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_deatils`
--

CREATE TABLE `order_deatils` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color` varchar(250) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_slug` varchar(255) NOT NULL,
  `page_content` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_title`, `page_slug`, `page_content`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Laptop', 'https://www.thegioididong.com/laptop-ldp', 'Với bộ vi xử lý Intel Core i5 11400H có tốc độ lên đến 4.5 GHz, chiếc laptop Asus TUF Gaming này đảm bảo hoạt động mượt mà và có thể đáp ứng tốt các tác vụ đa nhiệm, mang lại trải nghiệm sử dụng tuyệt vời trong cả công việc lẫn giải trí, chiến game ở mức ', 6, '2023-10-10 09:29:10', '2023-10-31 19:30:58', NULL),
(6, 'Hỏi đáp', 'aaaaaaaaaaa', 'aaaaaaaaa', 15, '2023-11-05 04:36:40', '2023-11-05 04:36:40', NULL);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Delete post', 'post.delete', 'Add Post', '2023-10-10 02:09:57', '2023-10-16 19:44:14'),
(3, 'Edit post', 'post.edit', 'Chức năng chỉnh sửa', '2023-10-16 06:13:11', '2023-10-16 06:13:11'),
(4, 'Add Page', 'page.add', NULL, '2023-10-16 19:02:00', '2023-10-16 19:02:00'),
(7, 'Add Product', 'product.add', NULL, '2023-10-18 05:29:18', '2023-10-18 05:29:18'),
(8, 'Delete Page', 'page.delete', NULL, '2023-10-18 05:29:37', '2023-10-18 05:29:37'),
(9, 'Edit Product', 'product.edit', NULL, '2023-10-18 05:29:54', '2023-10-18 05:29:54'),
(10, 'View Role', 'role.view', NULL, '2023-10-21 18:14:57', '2023-10-21 18:14:57'),
(11, 'Add Role', 'role.add', NULL, '2023-10-21 18:15:13', '2023-10-21 18:15:13'),
(12, 'Edit Role', 'role.edit', NULL, '2023-10-21 18:15:31', '2023-10-21 18:15:31'),
(13, 'Delete Role', 'role.delete', NULL, '2023-10-21 19:41:52', '2023-10-21 19:41:52'),
(18, 'View Post', 'post.view', NULL, '2023-10-22 04:55:07', '2023-10-22 04:55:07'),
(19, 'Add post', 'post.add', NULL, '2023-10-22 04:55:35', '2023-10-22 04:55:35'),
(20, 'View Page', 'page.view', NULL, '2023-10-22 04:55:57', '2023-10-22 04:55:57'),
(21, 'Edit Page', 'page.edit', NULL, '2023-10-22 04:56:14', '2023-10-22 04:56:14'),
(22, 'View Product', 'product.view', NULL, '2023-10-22 04:56:35', '2023-10-22 04:56:35'),
(23, 'Delete Product', 'product.delete', NULL, '2023-10-22 04:57:23', '2023-10-22 04:57:23'),
(24, 'View Order', 'order.view', NULL, '2023-10-22 05:30:18', '2023-10-22 05:30:18'),
(25, 'Add Order', 'order.add', NULL, '2023-10-22 05:30:36', '2023-10-22 05:30:36'),
(26, 'Edit Order', 'order.edit', NULL, '2023-10-22 05:30:56', '2023-10-22 05:30:56'),
(27, 'Delete Order', 'order.delete', NULL, '2023-10-22 05:31:09', '2023-10-22 05:31:09'),
(28, 'View Customer', 'customer.view', NULL, '2023-10-23 18:30:42', '2023-10-23 18:30:42'),
(29, 'Add Customer', 'customer.add', NULL, '2023-10-23 18:30:53', '2023-10-23 18:30:53'),
(30, 'Edit Customer', 'customer.edit', NULL, '2023-10-23 18:31:01', '2023-10-23 18:31:01'),
(31, 'Delete Customer', 'customer.delete', NULL, '2023-10-23 18:31:08', '2023-10-23 18:31:08');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `post_title` varchar(250) NOT NULL,
  `post_slug` varchar(100) NOT NULL,
  `post_images` varchar(250) NOT NULL,
  `post_content` varchar(250) NOT NULL,
  `post_status` enum('draft','published','pending','archived') NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_post_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_slug`, `post_images`, `post_content`, `post_status`, `user_id`, `category_post_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'fsfsdfsdfsdf', 'dien-thoai-iphone-14-plus', 'post_images/A6NbtFFdWOEWfDkCNqh2zaoFkGL5U9Yv3LyDNOvB.jpg', 'àefewfwfwef', 'draft', 15, 1, '2023-11-06 06:59:41', '2023-11-06 06:59:41', NULL),
(2, 'Điện thoại iPhone 14 Plus', 'dien-thoai-iphone-14-plus', 'post_images/h7TS2OHDjZlbnXeTaQEKR9pg7ONVltUhTeQX3js1.jpg', 'điện thoại là tính năng cần thiết', 'published', 15, 1, '2023-11-07 00:33:01', '2023-11-07 08:22:42', NULL),
(3, 'laptop i5', 'lap-top-i5', 'post_images/I1nlbkGBefr8w1tRyrOzexUHQ8IWKlLjAmIMHgAm.jpg', 'aaaaaaaaaaaaaaaaaaaaaaaaaa', 'draft', 15, 1, '2023-11-07 08:18:16', '2023-11-07 08:22:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('active','inactive','out_of_stock','') NOT NULL DEFAULT 'active',
  `user_id` int(11) NOT NULL,
  `category_product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `product_image`, `price`, `description`, `status`, `user_id`, `category_product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Laptop Acer Gaming Nitro 5 ', 'Lap-top-Acer-Gaming-Nitro-5 ', 'product_image/A6NbtFFdWOEWfDkCNqh2zaoFkGL5U9Yv3LyDNOvB.jpg', '24900000', 'Trải nghiệm giải trí đỉnh cao nhờ hiệu năng từ con chip Intel Core i7 dòng H series hiệu năng cao cùng ngoại hình độc đáo,', 'active', 1, 1, '2023-11-21 13:21:14', '2023-11-10 18:55:34', NULL),
(3, 'aaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaa', 'product_image/Zzz0IFZySI6rpnxxbBUN82tyHbjAUyBKXJwmF8f4.jpg', '15790000', 'aaaaaaaaaaaaaaaaaaaa', 'active', 15, 1, '2023-11-09 20:16:57', '2023-11-09 20:16:57', NULL),
(4, 'duyen', 'test03', 'product_image/4myOYfbvKvMwYdhtcO0fyyG3wbLgsBpTr350f6Bb.png', '15790000', 'áđá', 'inactive', 15, 1, '2023-11-09 20:20:10', '2023-11-10 18:52:38', '2023-11-10 18:52:38'),
(5, 'ggggggggggg', 'ggggggggggggg', 'product_image/pQ5WPoKnnfzZGopLFwiZAJSKLpPyIXiMq63EUcAT.jpg', '17600000', 'tttttttttttttttttttt', 'inactive', 15, 1, '2023-11-09 20:24:00', '2023-11-10 18:57:10', NULL),
(6, 'anhkhoi1205', 'test03', 'product_image/AhB6ebj1XH22bHIAiTW3rtnqNAeVNm7le46xQKzl.png', '15790000', 'sssss', '', 15, 1, '2023-11-10 22:13:59', '2023-11-10 22:13:59', NULL),
(7, 'anhkhoi1205', 'test03', 'product_image/dvBYpPAm90oJIsaXfwqEE5vgR8pcjVEGo8oZOoh9.png', '15790000', 'sssss', '', 15, 1, '2023-11-10 22:15:14', '2023-11-10 22:15:14', NULL),
(8, 'anhkhoi1205', 'test03', 'product_image/i1hx9bukFPu2ApghySJJASLRMRRbnDOuxCpKkVVY.png', '15790000', 'sssss', '', 15, 1, '2023-11-10 22:17:49', '2023-11-10 22:17:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` int(11) NOT NULL,
  `image_color_path` varchar(250) NOT NULL,
  `image_color_name` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `image_color_path`, `image_color_name`, `status`, `product_id`, `color_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'product_image/A6NbtFFdWOEWfDkCNqh2zaoFkGL5U9Yv3LyDNOvB.jpg', 'laptop', 1, 6, 1, '2023-11-14 03:11:06', '2023-11-25 03:11:06', '2023-11-27 03:11:06'),
(2, 'product_image/Zzz0IFZySI6rpnxxbBUN82tyHbjAUyBKXJwmF8f4.jpg', 'dien thoai', 2, 4, 3, '2023-11-05 03:11:06', '2023-11-08 03:11:06', '2023-11-16 03:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `product_image_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_url` varchar(250) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`product_image_id`, `product_id`, `image_url`, `updated_at`, `created_at`) VALUES
(1, 8, 'product_image/Ax1k1zCVJdBL9WehZOmEMwiERmInmmL1PhQc8Ho5.jpg', '2023-11-10 22:17:49', '2023-11-10 22:17:49'),
(2, 8, 'product_image/MNmnhks9Fmu3L5nm7cXVn21vQfSXWYRV2VXwS2us.png', '2023-11-10 22:17:49', '2023-11-10 22:17:49'),
(3, 8, 'product_image/wPRGCHuYVLO7QYib9PEqhJj3iyY3tWnVqzsj3ld0.png', '2023-11-10 22:17:49', '2023-11-10 22:17:49'),
(4, 8, 'product_image/NFnMjN2nTAYdaCbhnOQBQK89LtjBAzJW0KIgSpT4.jpg', '2023-11-10 22:17:49', '2023-11-10 22:17:49'),
(5, 8, 'product_image/onExYQAAbjevDMngk5HzXyfLx2HeWq33iQvXkGuq.jpg', '2023-11-10 22:17:49', '2023-11-10 22:17:49'),
(6, 8, 'product_image/ia76yzwXt1amt5jiBomuhj5jRilrMshzZMV8pzNH.jpg', '2023-11-10 22:17:49', '2023-11-10 22:17:49'),
(7, 8, 'product_image/AZbHx42BiUNPsxnq80eekH76duLpaCKYBB3Zl8Y8.jpg', '2023-11-10 22:17:49', '2023-11-10 22:17:49'),
(8, 8, 'product_image/ldi1EKTQr7MdN4CdpMP8J3V31bYEADGvjlkmEkkW.jpg', '2023-11-10 22:17:49', '2023-11-10 22:17:49');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(31, 'Content Manager', 'Quản lý nội bộ website', '2023-10-18 06:30:59', '2023-10-18 06:30:59'),
(35, 'Custom manager', 'Người quản lý tùy chỉnh', '2023-10-22 04:50:26', '2023-10-22 04:50:26'),
(42, 'Admin', 'Quản lý toàn bộ hệ thống', '2023-11-04 20:41:29', '2023-11-04 20:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(40, 35, 7, NULL, NULL),
(41, 35, 9, NULL, NULL),
(42, 35, 22, NULL, NULL),
(43, 35, 23, NULL, NULL),
(48, 35, 24, NULL, NULL),
(49, 35, 25, NULL, NULL),
(50, 35, 26, NULL, NULL),
(51, 35, 27, NULL, NULL),
(68, 31, 1, NULL, NULL),
(69, 31, 3, NULL, NULL),
(70, 31, 18, NULL, NULL),
(71, 31, 19, NULL, NULL),
(72, 31, 7, NULL, NULL),
(73, 31, 9, NULL, NULL),
(74, 31, 22, NULL, NULL),
(75, 31, 23, NULL, NULL),
(76, 31, 10, NULL, NULL),
(77, 31, 11, NULL, NULL),
(78, 31, 12, NULL, NULL),
(79, 31, 13, NULL, NULL),
(80, 31, 24, NULL, NULL),
(81, 31, 25, NULL, NULL),
(82, 31, 26, NULL, NULL),
(83, 31, 27, NULL, NULL),
(84, 31, 28, NULL, NULL),
(85, 31, 29, NULL, NULL),
(86, 31, 30, NULL, NULL),
(87, 31, 31, NULL, NULL),
(112, 42, 1, NULL, NULL),
(113, 42, 3, NULL, NULL),
(114, 42, 18, NULL, NULL),
(115, 42, 19, NULL, NULL),
(116, 42, 4, NULL, NULL),
(117, 42, 8, NULL, NULL),
(118, 42, 20, NULL, NULL),
(119, 42, 21, NULL, NULL),
(120, 42, 7, NULL, NULL),
(121, 42, 9, NULL, NULL),
(122, 42, 22, NULL, NULL),
(123, 42, 23, NULL, NULL),
(129, 42, 25, NULL, NULL),
(130, 42, 26, NULL, NULL),
(131, 42, 27, NULL, NULL),
(132, 42, 28, NULL, NULL),
(133, 42, 29, NULL, NULL),
(134, 42, 30, NULL, NULL),
(135, 42, 31, NULL, NULL),
(139, 42, 10, NULL, NULL),
(140, 42, 11, NULL, NULL),
(141, 42, 12, NULL, NULL),
(142, 42, 13, NULL, NULL),
(143, 42, 24, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `slider_id` int(11) NOT NULL,
  `slider_image` varchar(255) NOT NULL,
  `slider_title` varchar(120) NOT NULL,
  `slider_desc` varchar(200) NOT NULL,
  `slider_url` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`slider_id`, `slider_image`, `slider_title`, `slider_desc`, `slider_url`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'public/images/slider-01.jpg', 'dienthoai', 'điện thoại là vật dụng cần thiết cho mọi người', 'http/dienthoai', 10, '2023-11-06 02:01:12', '2023-11-29 02:01:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'myduyen123', 'nguyenngoctuongvy527@gmail.com', NULL, '$2y$10$4Pfp2FdUvcpd4cMmbPFs/.rzkVHlWZUYn3tVYEtNQWkWBXQOO0XO6', 'sguEvq1eDzzK9WDOSD8xayEcqJWD00vdi2ug25PJ5nCJEAHPCycSORw22Xog', '2023-10-07 19:59:01', '2023-11-08 07:51:09', '2023-11-08 07:51:09'),
(4, 'anhkhoi1202', 'Anhkhoi2@gmail.com', NULL, '$2y$10$VFWwZnx/QfkRiR9V1PKco.ynCAuOuI6uIpCUJfLGXaQW1r4m6uV52', NULL, '2023-10-10 06:28:35', '2023-11-04 05:31:37', NULL),
(6, 'minhtriet2308', 'minhtriet2308@gmail.com.vn', NULL, '$2y$10$CbMJTGRdUPirC99mUF/XfOkB4vIisl9d6zZ1UiRgIFEspZerW57R6', NULL, '2023-10-10 20:18:56', '2023-11-04 05:09:14', NULL),
(10, 'linhdang789', 'linhdang123@gmail.com.vn', NULL, '$2y$10$rckDb6AXUBjNnZ8jkXF/BeTNpwKqmq3y4IEw5/.eGax7B5PpeNyVG', NULL, '2023-11-01 05:02:25', '2023-11-01 05:03:23', '2023-11-01 05:03:23'),
(15, 'tuongvy789', 'tuongvy678@gmail.com.vn', NULL, '$2y$12$LYWmbG69FsdI/Fu4CZkhI.MicHJ8Q..AsjfCfSpPdUj1oyhEgZnHm', NULL, '2023-11-04 20:42:34', '2023-11-04 20:42:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 31, 4, NULL, NULL),
(9, 35, 6, NULL, NULL),
(11, 42, 15, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_posts`
--
ALTER TABLE `category_posts`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `category_products`
--
ALTER TABLE `category_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_deatils`
--
ALTER TABLE `order_deatils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `category_post_id` (`category_post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_product_id_foreign` (`category_product_id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `color_id` (`color_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`product_image_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permission_role_id_foreign` (`role_id`),
  ADD KEY `role_permission_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`slider_id`,`slider_desc`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_role_role_id_foreign` (`role_id`),
  ADD KEY `user_role_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_products`
--
ALTER TABLE `category_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `product_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_post_id`) REFERENCES `category_posts` (`category_id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_product_id`) REFERENCES `category_products` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_colors_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `colors` (`color_id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `sliders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
