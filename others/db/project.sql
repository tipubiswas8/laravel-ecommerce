-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 06:16 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Food', 'food', NULL, NULL),
(2, 'Stationery', 'stationery', NULL, NULL),
(3, 'Electronic', 'electronic', NULL, NULL),
(4, 'Sports', 'sports', NULL, NULL),
(5, 'Medicine', 'medicine', NULL, NULL),
(6, 'Fashion', 'fashion', NULL, NULL),
(7, 'Cosmetics', 'cosmetics', NULL, NULL),
(8, 'Furniture', 'furniture', NULL, NULL),
(9, 'Jewelry', 'jewelry', NULL, NULL);

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
(5, '2023_04_11_043012_create_categories_table', 2),
(6, '2023_04_11_043242_create_products_table', 2),
(7, '2023_06_11_074005_create_orders_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `amount`, `address`, `status`, `transaction_id`, `currency`, `created_at`, `updated_at`) VALUES
(1, 'Tipu', 'tipumahmud8@gmail.com', '01991978249', 5800, 'Mohakhali, Dhaka', 'Processing', '64b680720be52', 'BDT', NULL, NULL),
(2, 'Lemon', 'you@ex.com', '01735030741', 6815, 'Patuakhali, Barisal', 'Pending', '64b680e2c0add', 'BDT', NULL, NULL),
(3, 'Rima', 'rima@gmail.com', '123456789', 14615, 'Khulna', 'Failed', '0000', 'BDT', NULL, '2023-07-18 06:11:08'),
(4, 'Shati', 'sathi@gmail.com', '01886503353', 55270, 'Rajshahi', 'Delivered', '64b681bdd59bd', 'BDT', NULL, NULL),
(5, 'Akiz', 'akiz@gmail.com', '987654321', 750, 'Dhanmondi, Dhaka', 'Processing', '64b75b2d4077e', 'BDT', NULL, NULL),
(6, 'Pinky', 'pinky@gmail.com', '123456789', 27070, 'Jamalpur', 'Processing', '64bdf5d06bb8f', 'BDT', NULL, NULL),
(7, 'Anika', 'anika@gmail.com', '987654321', 2675, 'Barisal', 'Processing', '64bdf74301ec3', 'BDT', NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `category_id`, `price`, `quantity`, `image`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 'apple', 1, 200, 10, 'storage/products/apple.jpg', 'Discover our cutting-edge collection of electronic items, designed to simplify your life and elevate your digital experience. From innovative gadgets to essential devices, we offer a range of high-quality electronic products that combine functionality, style, and the latest technological advancements.', 1, NULL, '2023-07-16 03:28:41', '2023-07-18 04:23:47'),
(2, 'Cutters', 'cutters', 2, 600, 20, 'storage/products/cutters.jpg', 'Introducing our high-quality stationary items collection, designed to enhance your productivity and inspire creativity. Our carefully crafted products are designed with attention to detail, durability, and functionality in mind.', 1, NULL, '2023-07-17 04:19:09', '2023-07-22 02:45:09'),
(3, 'Camera', 'camera', 3, 9500, 40, 'storage/products/camera.jpg', 'Experience the cutting-edge world of technology with our exceptional collection of electronics items. From innovative gadgets to essential devices, we offer a wide range of high-quality electronic products that enhance your daily life and bring convenience, entertainment, and connectivity to your fingertips. Explore our selection and embrace the power of modern technology.', 1, NULL, '2023-07-18 04:21:40', '2023-07-22 03:25:01'),
(4, 'Lychees', 'lychees', 1, 450, 15, 'storage/products/lychees.jpg', 'Discover our cutting-edge collection of electronic items, designed to simplify your life and elevate your digital experience. From innovative gadgets to essential devices, we offer a range of high-quality electronic products that combine functionality, style, and the latest technological advancements.', 1, NULL, '2023-07-18 04:28:55', '2023-07-22 03:27:35'),
(5, 'Computer', 'computer', 3, 55000, 25, 'storage/products/computer-1.jpg', 'Experience the cutting-edge world of technology with our exceptional collection of electronics items. From innovative gadgets to essential devices, we offer a wide range of high-quality electronic products that enhance your daily life and bring convenience, entertainment, and connectivity to your fingertips. Explore our selection and embrace the power of modern technology.', 1, NULL, '2023-07-18 04:31:33', '2023-07-18 04:31:33'),
(6, 'Calculator', 'calculator', 2, 490, 20, 'storage/products/calculator-2.jpg', 'Introducing our high-quality stationary items collection, designed to enhance your productivity and inspire creativity. Our carefully crafted products are designed with attention to detail, durability, and functionality in mind.', 1, NULL, '2023-07-18 04:33:36', '2023-07-22 03:29:18'),
(7, 'Hand Grip', 'hand-grip', 4, 700, 30, 'storage/products/hand grip.jpg', 'There\'s a whole world of sports out there and Sport Items is here to help you get the most out of every experience. From performance clothing to equipment, our collection has everything you need to stay active and healthy.', 1, NULL, '2023-07-18 04:56:58', '2023-07-22 03:31:54'),
(8, 'Acetazolamide', 'acetazolamide', 5, 270, 40, 'storage/products/acetazolamide.jpg', 'Take care of your health with our comprehensive collection of medicine items. Designed to provide relief, support wellness, and promote a healthy lifestyle, our range of pharmaceutical products caters to various health needs. From over-the-counter remedies to specialized medications, explore our selection and discover the right solutions to help you feel your best.', 1, NULL, '2023-07-18 05:54:44', '2023-07-18 05:54:44'),
(9, 'Panjabi', 'panjabi', 6, 750, 30, 'storage/products/panjabi.jpg', 'Step into the world of style and sophistication with our exquisite collection of fashion items. From timeless classics to the latest trends, we offer a diverse range of apparel and accessories that elevate your personal style and make a statement wherever you go.', 1, NULL, '2023-07-18 05:58:03', '2023-07-18 05:58:03'),
(10, 'Powder', 'powder', 7, 225, 25, 'storage/products/talcum powder.jpg', 'Indulge in the world of beauty and transform your look with our exquisite collection of cosmetics items. From luxurious skincare essentials to vibrant makeup products, we offer a range of high-quality beauty solutions that enhance your natural radiance and empower you to express your unique style.', 1, NULL, '2023-07-18 05:58:55', '2023-07-18 06:00:55'),
(11, 'Sofa Bed', 'sofa-bed', 8, 16500, 10, 'storage/products/sofa bed.jpg', 'Transform your living spaces into havens of comfort and style with our exceptional collection of furniture items. Crafted with exquisite attention to detail and uncompromising quality, our furniture pieces are designed to enhance your home decor, maximize functionality, and create an inviting ambiance.', 1, NULL, '2023-07-18 06:00:04', '2023-07-22 03:40:59'),
(12, 'Football', 'football', 4, 2200, 5, 'storage/products/football.jpg', 'There\'s a whole world of sports out there and Sport Items is here to help you get the most out of every experience. From performance clothing to equipment, our collection has everything you need to stay active and healthy.', 1, NULL, '2023-07-18 06:02:45', '2023-07-22 03:37:40'),
(13, 'Omegranate', 'omegranate', 1, 600, 200, 'storage/products/omegranate.jpg', 'Discover our cutting-edge collection of electronic items, designed to simplify your life and elevate your digital experience. From innovative gadgets to essential devices, we offer a range of high-quality electronic products that combine functionality, style, and the latest technological advancements.', 1, NULL, '2023-07-22 02:31:02', '2023-07-22 03:43:56'),
(14, 'Diary', 'diary', 2, 80, 100, 'storage/products/diary.jpg', 'Introducing our high-quality stationary items collection, designed to enhance your productivity and inspire creativity. Our carefully crafted products are designed with attention to detail, durability, and functionality in mind.', 1, NULL, '2023-07-22 02:35:06', '2023-07-22 02:41:58'),
(15, 'Photocopy', 'photocopy', 3, 45000, 5, 'storage/products/photocopy.jpg', 'Experience the cutting-edge world of technology with our exceptional collection of electronics items. From innovative gadgets to essential devices, we offer a wide range of high-quality electronic products that enhance your daily life and bring convenience, entertainment, and connectivity to your fingertips. Explore our selection and embrace the power of modern technology.', 1, NULL, '2023-07-22 03:45:38', '2023-07-22 03:45:38'),
(16, 'Tennis Bat', 'tennis-bat', 4, 1450, 20, 'storage/products/tape tennis bat.jpg', 'There\'s a whole world of sports out there and Sport Items is here to help you get the most out of every experience. From performance clothing to equipment, our collection has everything you need to stay active and healthy.', 1, NULL, '2023-07-22 03:46:59', '2023-07-22 03:46:59'),
(17, 'Atropine', 'atropine', 5, 45, 20, 'storage/products/atropine.jpg', 'Take care of your health with our comprehensive collection of medicine items. Designed to provide relief, support wellness, and promote a healthy lifestyle, our range of pharmaceutical products caters to various health needs. From over-the-counter remedies to specialized medications, explore our selection and discover the right solutions to help you feel your best.', 1, NULL, '2023-07-22 03:48:35', '2023-07-22 03:48:35'),
(18, 'Saree', 'saree', 6, 1450, 20, 'storage/products/saree.jpg', 'Step into the world of style and sophistication with our exquisite collection of fashion items. From timeless classics to the latest trends, we offer a diverse range of apparel and accessories that elevate your personal style and make a statement wherever you go.', 1, NULL, '2023-07-22 03:49:59', '2023-07-22 03:49:59'),
(19, 'Hair Oil', 'hair-oil', 7, 225, 10, 'storage/products/hair oil.jpg', 'Indulge in the world of beauty and transform your look with our exquisite collection of cosmetics items. From luxurious skincare essentials to vibrant makeup products, we offer a range of high-quality beauty solutions that enhance your natural radiance and empower you to express your unique style.', 1, NULL, '2023-07-22 04:38:53', '2023-07-22 04:38:53'),
(20, 'Bed', 'bed', 8, 15400, 10, 'storage/products/bed.jpg', 'Transform your living spaces into havens of comfort and style with our exceptional collection of furniture items. Crafted with exquisite attention to detail and uncompromising quality, our furniture pieces are designed to enhance your home decor, maximize functionality, and create an inviting ambiance.', 1, NULL, '2023-07-22 04:40:34', '2023-07-22 04:40:34'),
(21, 'Grapes', 'grapes', 1, 450, 20, 'storage/products/grapes.jpg', 'Discover our cutting-edge collection of electronic items, designed to simplify your life and elevate your digital experience. From innovative gadgets to essential devices, we offer a range of high-quality electronic products that combine functionality, style, and the latest technological advancements.', 1, NULL, '2023-07-22 04:42:02', '2023-07-22 04:42:02'),
(22, 'Highlight', 'highlight', 2, 200, 15, 'storage/products/stationary_highlighter.jpg', 'Introducing our high-quality stationary items collection, designed to enhance your productivity and inspire creativity. Our carefully crafted products are designed with attention to detail, durability, and functionality in mind.', 1, NULL, '2023-07-22 04:44:37', '2023-07-23 02:20:47'),
(23, 'Light', 'light', 3, 175, 25, 'storage/products/light.jpg', 'Experience the cutting-edge world of technology with our exceptional collection of electronics items. From innovative gadgets to essential devices, we offer a wide range of high-quality electronic products that enhance your daily life and bring convenience, entertainment, and connectivity to your fingertips. Explore our selection and embrace the power of modern technology.', 1, NULL, '2023-07-22 04:46:15', '2023-07-22 04:46:15'),
(24, 'Dumbbells', 'dumbbells', 4, 890, 40, 'storage/products/adjustable dumbbells.jpg', 'There\'s a whole world of sports out there and Sport Items is here to help you get the most out of every experience. From performance clothing to equipment, our collection has everything you need to stay active and healthy.', 1, NULL, '2023-07-22 04:47:28', '2023-07-22 04:47:28'),
(25, 'Napa', 'napa', 5, 50, 10, 'storage/products/napa.jpg', 'Take care of your health with our comprehensive collection of medicine items. Designed to provide relief, support wellness, and promote a healthy lifestyle, our range of pharmaceutical products caters to various health needs. From over-the-counter remedies to specialized medications, explore our selection and discover the right solutions to help you feel your best.', 1, NULL, '2023-07-22 04:49:37', '2023-07-22 04:49:37'),
(26, 'Blazer', 'blazer', 6, 2480, 5, 'storage/products/blazer.jpg', 'Step into the world of style and sophistication with our exquisite collection of fashion items. From timeless classics to the latest trends, we offer a diverse range of apparel and accessories that elevate your personal style and make a statement wherever you go.', 1, NULL, '2023-07-22 04:50:41', '2023-07-22 04:50:41'),
(27, 'Remover', 'remover', 7, 390, 50, 'storage/products/makeup remover.jpg', 'Indulge in the world of beauty and transform your look with our exquisite collection of cosmetics items. From luxurious skincare essentials to vibrant makeup products, we offer a range of high-quality beauty solutions that enhance your natural radiance and empower you to express your unique style.', 1, NULL, '2023-07-22 04:51:57', '2023-07-22 05:04:37'),
(28, 'Papaya', 'papaya', 1, 80, 45, 'storage/products/papaya.jpg', 'Discover our cutting-edge collection of electronic items, designed to simplify your life and elevate your digital experience. From innovative gadgets to essential devices, we offer a range of high-quality electronic products that combine functionality, style, and the latest technological advancements.', 1, NULL, '2023-07-22 04:53:03', '2023-07-22 04:53:03'),
(29, 'Folder', 'folder', 2, 70, 50, 'storage/products/piano folder.jpg', 'Introducing our high-quality stationary items collection, designed to enhance your productivity and inspire creativity. Our carefully crafted products are designed with attention to detail, durability, and functionality in mind.', 1, NULL, '2023-07-22 04:54:04', '2023-07-22 04:54:04'),
(30, 'Laptop', 'laptop', 3, 45700, 30, 'storage/products/laptop-3.jpg', 'Experience the cutting-edge world of technology with our exceptional collection of electronics items. From innovative gadgets to essential devices, we offer a wide range of high-quality electronic products that enhance your daily life and bring convenience, entertainment, and connectivity to your fingertips. Explore our selection and embrace the power of modern technology.', 1, NULL, '2023-07-22 04:55:20', '2023-07-22 04:55:20'),
(31, 'Scooter', 'scooter', 4, 4650, 15, 'storage/products/balancing scooter.jpg', 'There\'s a whole world of sports out there and Sport Items is here to help you get the most out of every experience. From performance clothing to equipment, our collection has everything you need to stay active and healthy.', 1, NULL, '2023-07-22 04:58:52', '2023-07-22 04:58:52'),
(32, 'Mebendazol', 'mebendazol', 5, 730, 40, 'storage/products/mebendazole.jpg', 'Take care of your health with our comprehensive collection of medicine items. Designed to provide relief, support wellness, and promote a healthy lifestyle, our range of pharmaceutical products caters to various health needs. From over-the-counter remedies to specialized medications, explore our selection and discover the right solutions to help you feel your best.', 1, NULL, '2023-07-22 05:00:29', '2023-07-22 05:00:29'),
(33, 'Jacket', 'jacket', 6, 990, 20, 'storage/products/women jacket.jpg', 'Step into the world of style and sophistication with our exquisite collection of fashion items. From timeless classics to the latest trends, we offer a diverse range of apparel and accessories that elevate your personal style and make a statement wherever you go.', 1, NULL, '2023-07-22 05:01:52', '2023-07-22 05:01:52'),
(34, 'Lip Gloss', 'lip-gloss', 7, 190, 10, 'storage/products/lip gloss.jpg', 'Indulge in the world of beauty and transform your look with our exquisite collection of cosmetics items. From luxurious skincare essentials to vibrant makeup products, we offer a range of high-quality beauty solutions that enhance your natural radiance and empower you to express your unique style.', 1, NULL, '2023-07-22 05:03:17', '2023-07-22 05:03:17'),
(35, 'Sideboard', 'sideboard', 8, 9800, 10, 'storage/products/sideboard.jpg', 'Transform your living spaces into havens of comfort and style with our exceptional collection of furniture items. Crafted with exquisite attention to detail and uncompromising quality, our furniture pieces are designed to enhance your home decor, maximize functionality, and create an inviting ambiance.', 1, NULL, '2023-07-22 05:06:32', '2023-07-22 05:06:32'),
(36, 'Orange', 'orange', 1, 300, 45, 'storage/products/orange.jpg', 'Discover our cutting-edge collection of electronic items, designed to simplify your life and elevate your digital experience. From innovative gadgets to essential devices, we offer a range of high-quality electronic products that combine functionality, style, and the latest technological advancements.', 1, NULL, '2023-07-22 05:07:48', '2023-07-22 05:07:48'),
(37, 'Pencil Box', 'pencil-box', 2, 150, 35, 'storage/products/pencil cases.jpg', 'Introducing our high-quality stationary items collection, designed to enhance your productivity and inspire creativity. Our carefully crafted products are designed with attention to detail, durability, and functionality in mind.', 1, NULL, '2023-07-22 05:08:58', '2023-07-22 05:08:58'),
(38, 'Telephone', 'telephone', 3, 2200, 30, 'storage/products/telephone.jpg', 'Experience the cutting-edge world of technology with our exceptional collection of electronics items. From innovative gadgets to essential devices, we offer a wide range of high-quality electronic products that enhance your daily life and bring convenience, entertainment, and connectivity to your fingertips. Explore our selection and embrace the power of modern technology.', 1, NULL, '2023-07-22 05:10:34', '2023-07-22 05:10:34'),
(39, 'Tennis', 'tennis', 4, 600, 6, 'storage/products/tennis ball.jpg', 'There\'s a whole world of sports out there and Sport Items is here to help you get the most out of every experience. From performance clothing to equipment, our collection has everything you need to stay active and healthy.', 1, NULL, '2023-07-22 05:43:02', '2023-07-22 05:43:02'),
(40, 'Efavirenz', 'efavirenz', 5, 900, 10, 'storage/products/efavirenz.jpg', 'Take care of your health with our comprehensive collection of medicine items. Designed to provide relief, support wellness, and promote a healthy lifestyle, our range of pharmaceutical products caters to various health needs. From over-the-counter remedies to specialized medications, explore our selection and discover the right solutions to help you feel your best.', 1, NULL, '2023-07-22 05:44:47', '2023-07-22 05:44:47'),
(41, 'Winter', 'winter', 6, 1300, 15, 'storage/products/child winter.jpg', 'Step into the world of style and sophistication with our exquisite collection of fashion items. From timeless classics to the latest trends, we offer a diverse range of apparel and accessories that elevate your personal style and make a statement wherever you go.', 1, NULL, '2023-07-22 05:48:30', '2023-07-22 05:48:30'),
(42, 'Primer', 'primer', 7, 1000, 20, 'storage/products/eye primer.jpg', 'Indulge in the world of beauty and transform your look with our exquisite collection of cosmetics items. From luxurious skincare essentials to vibrant makeup products, we offer a range of high-quality beauty solutions that enhance your natural radiance and empower you to express your unique style.', 1, NULL, '2023-07-22 05:50:26', '2023-07-22 05:50:26'),
(43, 'Bookcase', 'bookcase', 8, 3500, 25, 'storage/products/bookcase.jpg', 'Transform your living spaces into havens of comfort and style with our exceptional collection of furniture items. Crafted with exquisite attention to detail and uncompromising quality, our furniture pieces are designed to enhance your home decor, maximize functionality, and create an inviting ambiance.', 1, NULL, '2023-07-22 05:51:52', '2023-07-22 05:51:52'),
(44, 'Earring', 'earring', 9, 16000, 25, 'storage/products/earring.jpg', 'Elevate your style and embrace the elegance of our exquisite jewelry collection. Crafted with precision and artistry, our jewelry items are designed to celebrate your individuality, adorn your looks, and create lasting memories.', 1, NULL, '2023-07-22 05:53:49', '2023-07-22 05:53:49'),
(45, 'Pineapple', 'pineapple', 1, 260, 30, 'storage/products/pineapple.jpg', 'Discover our cutting-edge collection of electronic items, designed to simplify your life and elevate your digital experience. From innovative gadgets to essential devices, we offer a range of high-quality electronic products that combine functionality, style, and the latest technological advancements.', 1, NULL, '2023-07-22 05:55:49', '2023-07-22 05:55:49'),
(46, 'Puncher', 'puncher', 2, 150, 30, 'storage/products/punch machine.jpg', 'Introducing our high-quality stationary items collection, designed to enhance your productivity and inspire creativity. Our carefully crafted products are designed with attention to detail, durability, and functionality in mind.', 1, NULL, '2023-07-22 05:57:16', '2023-07-22 05:57:16'),
(47, 'Sewing', 'sewing', 3, 6000, 35, 'storage/products/sewing machine.jpg', 'Experience the cutting-edge world of technology with our exceptional collection of electronics items. From innovative gadgets to essential devices, we offer a wide range of high-quality electronic products that enhance your daily life and bring convenience, entertainment, and connectivity to your fingertips. Explore our selection and embrace the power of modern technology.', 1, NULL, '2023-07-22 05:59:00', '2023-07-22 05:59:00'),
(48, 'Cycle', 'cycle', 4, 12000, 40, 'storage/products/exercise cycle.jpg', 'There\'s a whole world of sports out there and Sport Items is here to help you get the most out of every experience. From performance clothing to equipment, our collection has everything you need to stay active and healthy.', 1, NULL, '2023-07-22 06:01:00', '2023-07-22 06:01:00'),
(49, 'Gliclazide', 'gliclazide', 5, 900, 50, 'storage/products/gliclazide.jpg', 'Take care of your health with our comprehensive collection of medicine items. Designed to provide relief, support wellness, and promote a healthy lifestyle, our range of pharmaceutical products caters to various health needs. From over-the-counter remedies to specialized medications, explore our selection and discover the right solutions to help you feel your best.', 1, NULL, '2023-07-22 06:02:14', '2023-07-22 06:02:14'),
(50, 'Gown', 'gown', 6, 1400, 5, 'storage/products/gown.jpg', 'Step into the world of style and sophistication with our exquisite collection of fashion items. From timeless classics to the latest trends, we offer a diverse range of apparel and accessories that elevate your personal style and make a statement wherever you go.', 1, NULL, '2023-07-22 06:03:13', '2023-07-22 06:03:13'),
(51, 'Moisturiz', 'moisturiz', 7, 225, 10, 'storage/products/moisturizer.jpg', 'Indulge in the world of beauty and transform your look with our exquisite collection of cosmetics items. From luxurious skincare essentials to vibrant makeup products, we offer a range of high-quality beauty solutions that enhance your natural radiance and empower you to express your unique style.', 1, NULL, '2023-07-22 06:05:02', '2023-07-22 06:05:02'),
(52, 'Rocking', 'rocking', 8, 2600, 15, 'storage/products/rocking chair.jpg', 'Transform your living spaces into havens of comfort and style with our exceptional collection of furniture items. Crafted with exquisite attention to detail and uncompromising quality, our furniture pieces are designed to enhance your home decor, maximize functionality, and create an inviting ambiance.', 1, NULL, '2023-07-22 06:06:14', '2023-07-22 06:06:14'),
(53, 'Watch', 'watch', 9, 3690, 20, 'storage/products/watch.jpg', 'Elevate your style and embrace the elegance of our exquisite jewelry collection. Crafted with precision and artistry, our jewelry items are designed to celebrate your individuality, adorn your looks, and create lasting memories.', 1, NULL, '2023-07-22 06:07:23', '2023-07-22 06:07:23'),
(54, 'Strawberry', 'strawberry', 1, 1000, 35, 'storage/products/strawberry.jpg', 'Discover our cutting-edge collection of electronic items, designed to simplify your life and elevate your digital experience. From innovative gadgets to essential devices, we offer a range of high-quality electronic products that combine functionality, style, and the latest technological advancements.', 1, NULL, '2023-07-22 21:26:53', '2023-07-22 21:26:53'),
(55, 'Remover', 'remover', 2, 45, 40, 'storage/products/stapler pin remover.jpg', 'Introducing our high-quality stationary items collection, designed to enhance your productivity and inspire creativity. Our carefully crafted products are designed with attention to detail, durability, and functionality in mind.', 1, NULL, '2023-07-22 21:28:17', '2023-07-22 21:28:17'),
(56, 'Refriger', 'refriger', 3, 35000, 5, 'storage/products/refrigerator .jpg', 'Experience the cutting-edge world of technology with our exceptional collection of electronics items. From innovative gadgets to essential devices, we offer a wide range of high-quality electronic products that enhance your daily life and bring convenience, entertainment, and connectivity to your fingertips. Explore our selection and embrace the power of modern technology.', 1, NULL, '2023-07-22 21:29:51', '2023-07-22 21:29:51'),
(57, 'Jump Rope', 'jump-rope', 4, 390, 15, 'storage/products/jump rope.jpg', 'There\'s a whole world of sports out there and Sport Items is here to help you get the most out of every experience. From performance clothing to equipment, our collection has everything you need to stay active and healthy.', 1, NULL, '2023-07-22 21:31:07', '2023-07-22 21:31:07'),
(58, 'Fluconazol', 'fluconazol', 5, 400, 10, 'storage/products/fluconazole.jpg', 'Take care of your health with our comprehensive collection of medicine items. Designed to provide relief, support wellness, and promote a healthy lifestyle, our range of pharmaceutical products caters to various health needs. From over-the-counter remedies to specialized medications, explore our selection and discover the right solutions to help you feel your best.', 1, NULL, '2023-07-22 21:32:48', '2023-07-22 21:32:48'),
(59, 'T Shart', 't-shart', 6, 990, 20, 'storage/products/t shart.jpg', 'Step into the world of style and sophistication with our exquisite collection of fashion items. From timeless classics to the latest trends, we offer a diverse range of apparel and accessories that elevate your personal style and make a statement wherever you go.', 1, NULL, '2023-07-22 21:34:01', '2023-07-22 21:34:01'),
(60, 'Lipstick', 'lipstick', 7, 680, 25, 'storage/products/lipstick.jpg', 'Indulge in the world of beauty and transform your look with our exquisite collection of cosmetics items. From luxurious skincare essentials to vibrant makeup products, we offer a range of high-quality beauty solutions that enhance your natural radiance and empower you to express your unique style.', 1, NULL, '2023-07-22 21:35:09', '2023-07-22 21:35:09'),
(61, 'Chair', 'chair', 8, 1200, 30, 'storage/products/chair.jpg', 'Transform your living spaces into havens of comfort and style with our exceptional collection of furniture items. Crafted with exquisite attention to detail and uncompromising quality, our furniture pieces are designed to enhance your home decor, maximize functionality, and create an inviting ambiance.', 1, NULL, '2023-07-22 21:36:14', '2023-07-22 21:36:14'),
(62, 'Pendant', 'pendant', 9, 18000, 35, 'storage/products/pendant.jpg', 'Elevate your style and embrace the elegance of our exquisite jewelry collection. Crafted with precision and artistry, our jewelry items are designed to celebrate your individuality, adorn your looks, and create lasting memories.', 1, NULL, '2023-07-22 21:37:43', '2023-07-22 21:37:43'),
(63, 'Coconut', 'coconut', 1, 75, 40, 'storage/products/coconut.jpg', 'Discover our cutting-edge collection of electronic items, designed to simplify your life and elevate your digital experience. From innovative gadgets to essential devices, we offer a range of high-quality electronic products that combine functionality, style, and the latest technological advancements.', 1, NULL, '2023-07-22 21:38:44', '2023-07-22 21:38:44'),
(64, 'Stapler', 'stapler', 2, 60, 5, 'storage/products/stapler-machine.jpg', 'Introducing our high-quality stationary items collection, designed to enhance your productivity and inspire creativity. Our carefully crafted products are designed with attention to detail, durability, and functionality in mind.', 1, NULL, '2023-07-22 21:39:47', '2023-07-22 21:39:47'),
(65, 'Fan', 'fan', 3, 2500, 10, 'storage/products/fan.jpg', 'Experience the cutting-edge world of technology with our exceptional collection of electronics items. From innovative gadgets to essential devices, we offer a wide range of high-quality electronic products that enhance your daily life and bring convenience, entertainment, and connectivity to your fingertips. Explore our selection and embrace the power of modern technology.', 1, NULL, '2023-07-22 21:40:59', '2023-07-22 21:40:59'),
(66, 'Turf Shoe', 'turf-shoe', 4, 1450, 15, 'storage/products/turf shoe.jpg', 'There\'s a whole world of sports out there and Sport Items is here to help you get the most out of every experience. From performance clothing to equipment, our collection has everything you need to stay active and healthy.', 1, NULL, '2023-07-22 21:42:17', '2023-07-22 21:42:17'),
(67, 'Stavudine', 'stavudine', 5, 700, 20, 'storage/products/stavudine.jpg', 'Take care of your health with our comprehensive collection of medicine items. Designed to provide relief, support wellness, and promote a healthy lifestyle, our range of pharmaceutical products caters to various health needs. From over-the-counter remedies to specialized medications, explore our selection and discover the right solutions to help you feel your best.', 1, NULL, '2023-07-22 21:43:33', '2023-07-22 21:43:33'),
(68, 'B-Pencil', 'b-pencil', 7, 150, 25, 'storage/products/brow pencil.jpg', 'Indulge in the world of beauty and transform your look with our exquisite collection of cosmetics items. From luxurious skincare essentials to vibrant makeup products, we offer a range of high-quality beauty solutions that enhance your natural radiance and empower you to express your unique style.', 1, NULL, '2023-07-22 21:46:29', '2023-07-22 21:46:29'),
(69, 'C-Table', 'c-table', 8, 5500, 30, 'storage/products/coffee table.jpg', 'Transform your living spaces into havens of comfort and style with our exceptional collection of furniture items. Crafted with exquisite attention to detail and uncompromising quality, our furniture pieces are designed to enhance your home decor, maximize functionality, and create an inviting ambiance.', 1, NULL, '2023-07-22 21:48:16', '2023-07-22 21:48:16'),
(70, 'Choker', 'choker', 9, 20000, 35, 'storage/products/choker.jpg', 'Elevate your style and embrace the elegance of our exquisite jewelry collection. Crafted with precision and artistry, our jewelry items are designed to celebrate your individuality, adorn your looks, and create lasting memories.', 1, NULL, '2023-07-22 21:49:19', '2023-07-22 21:49:19'),
(71, 'Guava', 'guava', 1, 90, 40, 'storage/products/guava.jpg', 'Discover our cutting-edge collection of electronic items, designed to simplify your life and elevate your digital experience. From innovative gadgets to essential devices, we offer a range of high-quality electronic products that combine functionality, style, and the latest technological advancements.', 1, NULL, '2023-07-22 21:50:29', '2023-07-22 21:50:29'),
(72, 'Draw Pin', 'draw-pin', 2, 25, 5, 'storage/products/drawing pin.jpg', 'Introducing our high-quality stationary items collection, designed to enhance your productivity and inspire creativity. Our carefully crafted products are designed with attention to detail, durability, and functionality in mind.', 1, NULL, '2023-07-22 21:52:14', '2023-07-22 21:52:14'),
(73, 'Television', 'television', 3, 45000, 10, 'storage/products/television.jpg', 'Experience the cutting-edge world of technology with our exceptional collection of electronics items. From innovative gadgets to essential devices, we offer a wide range of high-quality electronic products that enhance your daily life and bring convenience, entertainment, and connectivity to your fingertips. Explore our selection and embrace the power of modern technology.', 1, NULL, '2023-07-22 21:53:34', '2023-07-22 21:53:34'),
(74, 'Socks', 'socks', 4, 100, 15, 'storage/products/socks.jpg', 'There\'s a whole world of sports out there and Sport Items is here to help you get the most out of every experience. From performance clothing to equipment, our collection has everything you need to stay active and healthy.', 1, NULL, '2023-07-22 21:54:42', '2023-07-22 21:54:42'),
(75, 'Macrobid', 'macrobid', 5, 500, 20, 'storage/products/macrobid.jpg', 'Take care of your health with our comprehensive collection of medicine items. Designed to provide relief, support wellness, and promote a healthy lifestyle, our range of pharmaceutical products caters to various health needs. From over-the-counter remedies to specialized medications, explore our selection and discover the right solutions to help you feel your best.', 1, NULL, '2023-07-22 21:56:06', '2023-07-22 21:56:06'),
(76, 'Shirt', 'shirt', 6, 1350, 25, 'storage/products/shirt.jpg', 'Step into the world of style and sophistication with our exquisite collection of fashion items. From timeless classics to the latest trends, we offer a diverse range of apparel and accessories that elevate your personal style and make a statement wherever you go.', 1, NULL, '2023-07-22 21:57:16', '2023-07-22 21:57:16'),
(77, 'Shelf', 'shelf', 8, 8500, 25, 'storage/products/shelf.jpg', 'Transform your living spaces into havens of comfort and style with our exceptional collection of furniture items. Crafted with exquisite attention to detail and uncompromising quality, our furniture pieces are designed to enhance your home decor, maximize functionality, and create an inviting ambiance.', 1, NULL, '2023-07-22 21:59:33', '2023-07-22 21:59:33'),
(78, 'Diamond', 'diamond', 9, 22500, 30, 'storage/products/diamond.jpg', 'Elevate your style and embrace the elegance of our exquisite jewelry collection. Crafted with precision and artistry, our jewelry items are designed to celebrate your individuality, adorn your looks, and create lasting memories.', 1, NULL, '2023-07-22 22:00:37', '2023-07-22 22:00:37'),
(79, 'Cashew', 'cashew', 1, 900, 20, 'storage/products/cashew.jpg', 'Discover our cutting-edge collection of electronic items, designed to simplify your life and elevate your digital experience. From innovative gadgets to essential devices, we offer a range of high-quality electronic products that combine functionality, style, and the latest technological advancements.', 1, NULL, '2023-07-23 00:51:04', '2023-07-23 00:51:04'),
(80, 'Dispenser', 'dispenser', 2, 30, 25, 'storage/products/tape dispenser.jpg', 'Introducing our high-quality stationary items collection, designed to enhance your productivity and inspire creativity. Our carefully crafted products are designed with attention to detail, durability, and functionality in mind.', 1, NULL, '2023-07-23 00:52:52', '2023-07-23 00:52:52'),
(81, 'Mobile', 'mobile', 3, 24500, 30, 'storage/products/mobile.jpg', 'Experience the cutting-edge world of technology with our exceptional collection of electronics items. From innovative gadgets to essential devices, we offer a wide range of high-quality electronic products that enhance your daily life and bring convenience, entertainment, and connectivity to your fingertips. Explore our selection and embrace the power of modern technology.', 1, NULL, '2023-07-23 00:53:48', '2023-07-23 00:53:48'),
(82, 'Sport Bag', 'sport-bag', 4, 1650, 30, 'storage/products/sport bag.jpg', 'There\'s a whole world of sports out there and Sport Items is here to help you get the most out of every experience. From performance clothing to equipment, our collection has everything you need to stay active and healthy.', 1, NULL, '2023-07-23 00:54:50', '2023-07-23 00:54:50'),
(83, 'Losectil', 'losectil', 5, 95, 35, 'storage/products/losectil.jpg', 'Take care of your health with our comprehensive collection of medicine items. Designed to provide relief, support wellness, and promote a healthy lifestyle, our range of pharmaceutical products caters to various health needs. From over-the-counter remedies to specialized medications, explore our selection and discover the right solutions to help you feel your best.', 1, NULL, '2023-07-23 00:55:55', '2023-07-23 00:55:55'),
(84, 'Pant', 'pant', 6, 1550, 35, 'storage/products/pant.jpg', 'Step into the world of style and sophistication with our exquisite collection of fashion items. From timeless classics to the latest trends, we offer a diverse range of apparel and accessories that elevate your personal style and make a statement wherever you go.', 1, NULL, '2023-07-23 00:56:53', '2023-07-23 00:56:53'),
(85, 'Concealer', 'concealer', 7, 350, 40, 'storage/products/concealer.jpg', 'Indulge in the world of beauty and transform your look with our exquisite collection of cosmetics items. From luxurious skincare essentials to vibrant makeup products, we offer a range of high-quality beauty solutions that enhance your natural radiance and empower you to express your unique style.', 1, NULL, '2023-07-23 00:58:05', '2023-07-23 01:46:24'),
(86, 'Chest', 'chest', 8, 11000, 5, 'storage/products/chest .jpg', 'Transform your living spaces into havens of comfort and style with our exceptional collection of furniture items. Crafted with exquisite attention to detail and uncompromising quality, our furniture pieces are designed to enhance your home decor, maximize functionality, and create an inviting ambiance.', 1, NULL, '2023-07-23 01:50:06', '2023-07-23 01:50:06'),
(87, 'Necklace', 'necklace', 9, 125000, 5, 'storage/products/necklace.jpg', 'Elevate your style and embrace the elegance of our exquisite jewelry collection. Crafted with precision and artistry, our jewelry items are designed to celebrate your individuality, adorn your looks, and create lasting memories.', 1, NULL, '2023-07-23 01:52:29', '2023-07-23 01:52:29'),
(88, 'Banana', 'banana', 1, 400, 40, 'storage/products/banana.jpg', 'Discover our cutting-edge collection of electronic items, designed to simplify your life and elevate your digital experience. From innovative gadgets to essential devices, we offer a range of high-quality electronic products that combine functionality, style, and the latest technological advancements.', 1, NULL, '2023-07-23 01:53:35', '2023-07-23 01:53:35'),
(89, 'Pencil', 'pencil', 2, 300, 30, 'storage/products/pencil.jpg', 'Introducing our high-quality stationary items collection, designed to enhance your productivity and inspire creativity. Our carefully crafted products are designed with attention to detail, durability, and functionality in mind.', 1, NULL, '2023-07-23 01:55:15', '2023-07-23 01:55:15'),
(90, 'Radio', 'radio', 3, 3000, 10, 'storage/products/radio.jpg', 'Experience the cutting-edge world of technology with our exceptional collection of electronics items. From innovative gadgets to essential devices, we offer a wide range of high-quality electronic products that enhance your daily life and bring convenience, entertainment, and connectivity to your fingertips. Explore our selection and embrace the power of modern technology.', 1, NULL, '2023-07-23 01:56:18', '2023-07-23 01:56:18'),
(91, 'Tennis Bat', 'tennis-bat', 4, 1100, 5, 'storage/products/table tennis bat.jpg', 'There\'s a whole world of sports out there and Sport Items is here to help you get the most out of every experience. From performance clothing to equipment, our collection has everything you need to stay active and healthy.', 1, NULL, '2023-07-23 01:57:38', '2023-07-23 01:57:38'),
(92, 'Neuroton', 'neuroton', 5, 1200, 20, 'storage/products/neuroton.jpg', 'Take care of your health with our comprehensive collection of medicine items. Designed to provide relief, support wellness, and promote a healthy lifestyle, our range of pharmaceutical products caters to various health needs. From over-the-counter remedies to specialized medications, explore our selection and discover the right solutions to help you feel your best.', 1, NULL, '2023-07-23 01:58:40', '2023-07-23 01:58:40'),
(93, 'Skirt', 'skirt', 6, 1700, 10, 'storage/products/skirt.jpg', 'Step into the world of style and sophistication with our exquisite collection of fashion items. From timeless classics to the latest trends, we offer a diverse range of apparel and accessories that elevate your personal style and make a statement wherever you go.', 1, NULL, '2023-07-23 01:59:41', '2023-07-23 01:59:41'),
(94, 'Highlight', 'highlight', 7, 500, 40, 'storage/products/cosmatic_highlighter.jpg', 'Indulge in the world of beauty and transform your look with our exquisite collection of cosmetics items. From luxurious skincare essentials to vibrant makeup products, we offer a range of high-quality beauty solutions that enhance your natural radiance and empower you to express your unique style.', 1, NULL, '2023-07-23 02:02:06', '2023-07-23 02:20:21'),
(95, 'Sofa', 'sofa', 8, 14000, 30, 'storage/products/sofa.jpg', 'Transform your living spaces into havens of comfort and style with our exceptional collection of furniture items. Crafted with exquisite attention to detail and uncompromising quality, our furniture pieces are designed to enhance your home decor, maximize functionality, and create an inviting ambiance.', 1, NULL, '2023-07-23 02:03:08', '2023-07-23 02:03:08'),
(96, 'Ring', 'ring', 9, 10000, 10, 'storage/products/ring.jpg', 'Elevate your style and embrace the elegance of our exquisite jewelry collection. Crafted with precision and artistry, our jewelry items are designed to celebrate your individuality, adorn your looks, and create lasting memories.', 1, NULL, '2023-07-23 02:04:30', '2023-07-23 02:04:30'),
(97, 'Startfruit', 'startfruit', 1, 330, 20, 'storage/products/startfruit.jpg', 'Discover our cutting-edge collection of electronic items, designed to simplify your life and elevate your digital experience. From innovative gadgets to essential devices, we offer a range of high-quality electronic products that combine functionality, style, and the latest technological advancements.', 1, NULL, '2023-07-23 02:05:51', '2023-07-23 02:05:51');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
  ADD PRIMARY KEY (`email`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
