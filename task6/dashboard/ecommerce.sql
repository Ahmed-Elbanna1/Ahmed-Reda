-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220519.4c1c1fcc18
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2022 at 09:43 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(320) NOT NULL,
  `pasword` varchar(225) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `phone_verified_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `adresses`
--

CREATE TABLE `adresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `street` varchar(60) NOT NULL,
  `bulding` int(60) NOT NULL,
  `floor` smallint(3) NOT NULL,
  `flat` int(3) NOT NULL,
  `notes` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(32) NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0-> not active\r\n1 -> active',
  `image` varchar(64) NOT NULL DEFAULT 'default_brand.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name_ar`, `name_en`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'لينوفو', 'lenovo', 1, 'default_brand.jpg', '2022-05-31 17:28:07', NULL),
(2, 'ديل', 'dell', 1, 'default_brand.jpg', '2022-05-31 17:28:07', NULL),
(3, 'أبل', 'ِApple', 1, 'default_brand.jpg', '2022-05-31 17:28:50', NULL),
(4, 'اتس بي', 'hp', 1, 'default_brand.jpg', '2022-05-31 17:28:50', NULL),
(5, 'سامسونج', 'samsung', 1, 'default_brand.jpg', '2022-05-31 17:35:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quntity` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(32) NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0-> not active\r\n 1 -> active',
  `image` varchar(64) NOT NULL DEFAULT 'default_categories.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_ar`, `name_en`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'الكترونيات', 'Eleectronics', 1, 'default_categories.jpg', '2022-05-31 17:30:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cites`
--

CREATE TABLE `cites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(32) NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `lant_point` decimal(8,0) NOT NULL,
  `long_point` decimal(9,0) NOT NULL,
  `distance` decimal(20,0) NOT NULL,
  `status` enum('not available','available','','') NOT NULL DEFAULT 'available',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `complains_replies`
--

CREATE TABLE `complains_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `massege` text NOT NULL,
  `reply_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` mediumint(20) UNSIGNED NOT NULL,
  `discount` int(1) NOT NULL,
  `discount_type` enum('percentage','cash') NOT NULL DEFAULT 'cash' COMMENT '0-> percentage \r\n1-> cash	',
  `mini_order_price` smallint(6) NOT NULL,
  `max_discount_value` int(11) NOT NULL,
  `max_number_of_usage` smallint(3) NOT NULL,
  `max_number_of_usage_per_user` tinyint(1) NOT NULL DEFAULT 1,
  `status` enum('active','not active') NOT NULL DEFAULT 'not active' COMMENT '0 -> not active\r\n1->active',
  `start_datetime` timestamp NULL DEFAULT NULL,
  `end_datetime` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` text NOT NULL,
  `title_ar` text NOT NULL,
  `image` varchar(64) NOT NULL DEFAULT 'defult_offer.jpg',
  `discount` tinyint(1) UNSIGNED NOT NULL,
  `discount_type` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0-> percentage\r\n1-> cash',
  `start_datetime` datetime DEFAULT NULL,
  `end_datetime` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` mediumint(10) UNSIGNED NOT NULL,
  `total_price` int(10) UNSIGNED NOT NULL,
  `payment_method` enum('money bookers','neteller','paypal','bank transfer') NOT NULL,
  `status` enum('placed','processing','on its way','deliverd') NOT NULL,
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(512) NOT NULL,
  `name_en` varchar(512) NOT NULL,
  `details_ar` mediumtext NOT NULL,
  `details_en` mediumtext NOT NULL,
  `price` decimal(7,0) UNSIGNED NOT NULL,
  `quantity` smallint(4) UNSIGNED NOT NULL DEFAULT 1,
  `code` mediumint(5) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1-> active\r\n0-> not active',
  `image` varchar(64) NOT NULL DEFAULT 'product.png',
  `subcategorie_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_ar`, `name_en`, `details_ar`, `details_en`, `price`, `quantity`, `code`, `status`, `image`, `subcategorie_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(1, 'اتش بي 1253161', 'Hp 1253161', 'daaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaa', '5000', 1, 20108, 0, 'null', 1, 4, '2022-05-31 17:33:06', '2022-06-02 18:11:05'),
(2, 'سامسونج ا 30', 'Samsung A30', 'sssssssssssss', 'sssssssssssss', '2000', 20, 20202, 1, '', 2, 5, '2022-05-31 17:36:44', '2022-06-02 18:09:09');

-- --------------------------------------------------------

--
-- Table structure for table `products_offers`
--

CREATE TABLE `products_offers` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `offer_id` bigint(20) UNSIGNED NOT NULL,
  `price_after_discount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products_orders`
--

CREATE TABLE `products_orders` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `price` smallint(6) NOT NULL,
  `quantity` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products_specs`
--

CREATE TABLE `products_specs` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `spec_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(32) NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `lat_point` decimal(8,6) NOT NULL,
  `long_point` decimal(9,6) NOT NULL,
  `distance` bigint(20) NOT NULL,
  `status` enum('not available','available','','') NOT NULL DEFAULT 'available',
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rate` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 -> 5',
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `specs`
--

CREATE TABLE `specs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(32) NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0-> not active\r\n 1 -> active',
  `image` varchar(64) NOT NULL DEFAULT 'default_sub.jpg',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name_ar`, `name_en`, `status`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'لاب توب', 'laptop', 1, 'default_sub.jpg', 1, '2022-05-31 17:31:29', NULL),
(2, 'موبايلات', 'phones', 1, 'default_sub.jpg', 1, '2022-05-31 17:31:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(320) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `status` enum('active','blocked') NOT NULL DEFAULT 'active',
  `birthdate` date DEFAULT NULL,
  `code` int(5) UNSIGNED DEFAULT NULL,
  `image` varchar(64) NOT NULL DEFAULT 'default_user_Image.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`, `gender`, `status`, `birthdate`, `code`, `image`, `email_verified_at`, `phone_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed ', 'Reda', 'areda9922@gmail.com', '01092112438', '$2y$10$xiH2qvHPheOz3GmlNUCZ6.3qgGS5ock63zGllG0eLX3iqXLbRp2q6', 'male', 'active', NULL, 582407, 'default_user_Image.png', NULL, NULL, '2022-05-26 16:15:24', NULL),
(2, 'Ahmed ', 'Ali', 'areda99922@gmail.com', '01062112438', '$2y$10$AuDOfHZfVqLEQfUpjYrwq.1HpYWuR.bhLG8w.EzgAE0L4PZGjnwkC', 'male', 'active', NULL, 938831, 'default_user_Image.png', NULL, NULL, '2022-05-26 16:20:19', NULL),
(3, 'Sara', 'Awad', 'sara124@gmail.com', '01022112438', '$2y$10$YmqbuSwaQpUM5Xcp.JYjXe0sPZyiLFiv0H3ERa.EliDDtxNChTvle', 'female', 'active', NULL, 929481, 'default_user_Image.png', NULL, NULL, '2022-05-26 16:29:05', NULL),
(4, 'hany', 'Awad', 'hany124@gmail.com', '01025112438', '$2y$10$CFlpdihMfD265KbwbnTYouhAyaDpvGQ1GOsjUaa6Xe35ig9SKuix6', 'male', 'active', NULL, 782389, 'default_user_Image.png', NULL, NULL, '2022-05-26 16:30:27', NULL),
(5, 'Ahmed', 'Awad', 'Ahmed124@gmail.com', '01092112757', '$2y$10$X8qSLcNLRBsxbg9ET.wENurYND.aS3RmBr2V0RkI7Xo2pAm3iJSx6', 'male', 'active', NULL, 112223, 'default_user_Image.png', NULL, NULL, '2022-05-26 18:58:33', NULL),
(6, 'Ahmed', 'Awad', 'Ahmed2124@gmail.com', '01092112759', '$2y$10$2ZhO4g2vnhJLcdcxhv99Eu7LNCfWUY1es6Q3z0Sp71yzO56lz/MP2', 'male', 'active', NULL, 780103, 'default_user_Image.png', NULL, NULL, '2022-05-26 18:59:49', NULL),
(7, 'Ahmed', 'Awad', 'Ahmed212a4@gmail.com', '01092222458', '$2y$10$QZ9aiSjtWaeKACdGZ.R7YOn5tBf/FzvJ5BpVipS5P2cy7ypNASs6e', 'male', 'active', NULL, 369257, 'default_user_Image.png', NULL, NULL, '2022-05-26 19:01:09', NULL),
(8, 'Ahmed', 'Awad', 'Ahmed2124a4@gmail.com', '01092222418', '$2y$10$DFXruxqK6bXmBR9U01OavuuiQcD2hWFIC7XMvi2cOy3fqUTOdg9.a', 'male', 'active', NULL, 438353, 'default_user_Image.png', NULL, NULL, '2022-05-26 19:03:59', NULL),
(9, 'Ahmed ', 'Awad', 'areda9922v@gmail.com', '01065832281', '$2y$10$SnYJhYoioJXKqF2e2eu7TOLtBxl6KfAcOZfBI9LwawCo4Xs7.qore', 'male', 'active', NULL, 252545, 'default_user_Image.png', NULL, NULL, '2022-05-26 19:05:59', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_users_fk` (`user_id`),
  ADD KEY `addresses_regions_fk` (`region_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`product_id`,`user_id`),
  ADD KEY `cart_user_fk` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cites`
--
ALTER TABLE `cites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complains_replies`
--
ALTER TABLE `complains_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complains_replys_fk1` (`reply_id`),
  ADD KEY `complains_user_fk` (`user_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`product_id`,`user_id`),
  ADD KEY `favorite_user_fk` (`user_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_orders_fk` (`address_id`),
  ADD KEY `coupon_orders_fk` (`coupon_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `product_subcategory_fk` (`subcategorie_id`),
  ADD KEY `brand_product_fk` (`brand_id`);

--
-- Indexes for table `products_offers`
--
ALTER TABLE `products_offers`
  ADD PRIMARY KEY (`product_id`,`offer_id`),
  ADD KEY `products_offer_fk` (`offer_id`);

--
-- Indexes for table `products_orders`
--
ALTER TABLE `products_orders`
  ADD PRIMARY KEY (`product_id`,`order_id`),
  ADD KEY `products_order_fk2` (`order_id`);

--
-- Indexes for table `products_specs`
--
ALTER TABLE `products_specs`
  ADD PRIMARY KEY (`product_id`,`spec_id`),
  ADD KEY `products_specs_fk2` (`spec_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_regions_fk` (`city_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`product_id`,`user_id`),
  ADD KEY `rev_user_fk` (`user_id`);

--
-- Indexes for table `specs`
--
ALTER TABLE `specs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_subcategory_fk` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `adresses`
--
ALTER TABLE `adresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cites`
--
ALTER TABLE `cites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complains_replies`
--
ALTER TABLE `complains_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specs`
--
ALTER TABLE `specs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adresses`
--
ALTER TABLE `adresses`
  ADD CONSTRAINT `addresses_regions_fk` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `addresses_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `cart_product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `cart_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `complains_replies`
--
ALTER TABLE `complains_replies`
  ADD CONSTRAINT `complains_replys_fk1` FOREIGN KEY (`reply_id`) REFERENCES `complains_replies` (`id`),
  ADD CONSTRAINT `complains_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorite_product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorite_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `addresses_orders_fk` FOREIGN KEY (`address_id`) REFERENCES `adresses` (`id`),
  ADD CONSTRAINT `coupon_orders_fk` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `brand_product_fk` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `product_subcategory_fk` FOREIGN KEY (`subcategorie_id`) REFERENCES `subcategories` (`id`);

--
-- Constraints for table `products_offers`
--
ALTER TABLE `products_offers`
  ADD CONSTRAINT `products_offer_fk` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_offer_fk2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_orders`
--
ALTER TABLE `products_orders`
  ADD CONSTRAINT `products_order_fk1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_order_fk2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_specs`
--
ALTER TABLE `products_specs`
  ADD CONSTRAINT `products_specs_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `products_specs_fk2` FOREIGN KEY (`spec_id`) REFERENCES `specs` (`id`);

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `cities_regions_fk` FOREIGN KEY (`city_id`) REFERENCES `cites` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `rev_product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rev_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `category_subcategory_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



