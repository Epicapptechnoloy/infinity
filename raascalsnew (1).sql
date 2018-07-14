-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2018 at 09:27 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raascalsnew`
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

-- --------------------------------------------------------

--
-- Table structure for table `sb_address`
--

CREATE TABLE `sb_address` (
  `address_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `addrss_type` int(2) NOT NULL,
  `customer_addrss_type` int(2) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `company` varchar(40) NOT NULL,
  `address_1` varchar(128) NOT NULL,
  `address_2` varchar(128) NOT NULL,
  `city` varchar(128) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT '0',
  `zone_id` int(11) NOT NULL DEFAULT '0',
  `custom_field` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_admin`
--

CREATE TABLE `sb_admin` (
  `id` int(11) NOT NULL,
  `titleId` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modifyBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sb_admin`
--

INSERT INTO `sb_admin` (`id`, `titleId`, `fname`, `mname`, `lname`, `email`, `password`, `remember_token`, `status`, `created_at`, `updated_at`, `modifyBy`) VALUES
(1, 1, 'Alok', NULL, 'Saxena', 'aloksaxena624@gmail.com', '$2y$10$tLR5kjHONnGk.xr4eCdBfe.zJkqxwwmUBc.sddyk6sLg.gBnQE1L6', 'Q4fEcQBJWD3mVfrEURgqJNUyIvsm2ByHPgZnff3duzwJLHbbRBAa786aao0O', 1, '2017-11-12 10:01:18', '2018-01-02 12:51:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sb_banners`
--

CREATE TABLE `sb_banners` (
  `id` int(11) NOT NULL,
  `doctorId` int(11) NOT NULL,
  `bannerName` varchar(100) NOT NULL,
  `bannerImage` varchar(100) NOT NULL,
  `bannerText` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modifyBy` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sb_banners`
--

INSERT INTO `sb_banners` (`id`, `doctorId`, `bannerName`, `bannerImage`, `bannerText`, `status`, `created_at`, `updated_at`, `modifyBy`) VALUES
(1, 1, 'first banner', 'Chrysanthemum.jpg', 'banner first description', 1, '2017-05-02 12:22:09', '2017-05-02 12:22:09', 1),
(2, 1, 'Desert.jpg', 'second banner', 'second banner description', 1, '2017-05-02 12:22:09', '2017-05-02 12:22:09', 1),
(3, 1, 'third banner', 'Hydrangeas.jpg', 'third banner description', 1, '2017-05-02 12:23:08', '2017-05-02 12:23:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sb_banner_image`
--

CREATE TABLE `sb_banner_image` (
  `banner_image_id` int(11) NOT NULL,
  `banner_id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `sort_order` int(3) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_category`
--

CREATE TABLE `sb_category` (
  `category_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `top` tinyint(1) NOT NULL,
  `column` int(3) NOT NULL,
  `sort_order` int(3) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_category_description`
--

CREATE TABLE `sb_category_description` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sb_coupon`
--

CREATE TABLE `sb_coupon` (
  `coupon_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `code` varchar(20) NOT NULL,
  `type` char(1) NOT NULL,
  `discount` decimal(15,4) NOT NULL,
  `logged` tinyint(1) NOT NULL,
  `shipping` tinyint(1) NOT NULL,
  `total` decimal(15,4) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `uses_total` int(11) NOT NULL,
  `uses_customer` varchar(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_coupon_category`
--

CREATE TABLE `sb_coupon_category` (
  `coupon_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_coupon_history`
--

CREATE TABLE `sb_coupon_history` (
  `coupon_history_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `amount` decimal(15,4) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_coupon_product`
--

CREATE TABLE `sb_coupon_product` (
  `coupon_product_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_customer`
--

CREATE TABLE `sb_customer` (
  `customer_id` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(96) NOT NULL,
  `telephone` varchar(32) NOT NULL,
  `fax` varchar(32) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(9) NOT NULL,
  `cart` text,
  `wishlist` text,
  `newsletter` tinyint(1) NOT NULL DEFAULT '0',
  `address_id` int(11) NOT NULL DEFAULT '0',
  `custom_field` text NOT NULL,
  `ip` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `safe` tinyint(1) NOT NULL,
  `token` text NOT NULL,
  `code` varchar(40) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_customer_activity`
--

CREATE TABLE `sb_customer_activity` (
  `customer_activity_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `key` varchar(64) NOT NULL,
  `data` text NOT NULL,
  `ip` varchar(40) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_customer_history`
--

CREATE TABLE `sb_customer_history` (
  `customer_history_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb _customer_search`
--

CREATE TABLE `sb _customer_search` (
  `customer_search_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category` tinyint(1) NOT NULL,
  `description` tinyint(1) NOT NULL,
  `products` int(11) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_customer_transaction`
--

CREATE TABLE `sb_customer_transaction` (
  `customer_transaction_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `amount` decimal(15,4) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_customer_wishlist`
--

CREATE TABLE `sb_customer_wishlist` (
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_order`
--

CREATE TABLE `sb_order` (
  `order_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL DEFAULT '0',
  `invoice_prefix` varchar(26) NOT NULL,
  `customer_id` int(11) NOT NULL DEFAULT '0',
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(96) NOT NULL,
  `telephone` varchar(32) NOT NULL,
  `fax` varchar(32) NOT NULL,
  `custom_field` text NOT NULL,
  `payment_firstname` varchar(32) NOT NULL,
  `payment_lastname` varchar(32) NOT NULL,
  `payment_company` varchar(60) NOT NULL,
  `payment_address_1` varchar(128) NOT NULL,
  `payment_address_2` varchar(128) NOT NULL,
  `payment_city` varchar(128) NOT NULL,
  `payment_postcode` varchar(10) NOT NULL,
  `payment_country` varchar(128) NOT NULL,
  `payment_country_id` int(11) NOT NULL,
  `payment_zone` varchar(128) NOT NULL,
  `payment_zone_id` int(11) NOT NULL,
  `payment_address_format` text NOT NULL,
  `payment_custom_field` text NOT NULL,
  `payment_method` varchar(128) NOT NULL,
  `payment_code` varchar(128) NOT NULL,
  `shipping_address_id` int(11) NOT NULL,
  `billing_addrss_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `total` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `order_status_id` int(11) NOT NULL DEFAULT '0',
  `affiliate_id` int(11) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_order_history`
--

CREATE TABLE `sb_order_history` (
  `order_history_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_status_id` int(11) NOT NULL,
  `notify` tinyint(1) NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_order_product`
--

CREATE TABLE `sb_order_product` (
  `order_product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `model` varchar(64) NOT NULL,
  `quantity` int(4) NOT NULL,
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `total` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `tax` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `reward` int(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_order_shipment`
--

CREATE TABLE `sb_order_shipment` (
  `order_shipment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `shipping_courier_id` varchar(255) NOT NULL DEFAULT '',
  `tracking_number` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_order_status`
--

CREATE TABLE `sb_order_status` (
  `order_status_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_order_total`
--

CREATE TABLE `sb_order_total` (
  `order_total_id` int(10) NOT NULL,
  `order_id` int(11) NOT NULL,
  `code` varchar(32) NOT NULL,
  `title` varchar(255) NOT NULL,
  `value` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `sort_order` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_order_voucher`
--

CREATE TABLE `sb_order_voucher` (
  `order_voucher_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `voucher_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `code` varchar(10) NOT NULL,
  `from_name` varchar(64) NOT NULL,
  `from_email` varchar(96) NOT NULL,
  `to_name` varchar(64) NOT NULL,
  `to_email` varchar(96) NOT NULL,
  `voucher_theme_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `amount` decimal(15,4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_product`
--

CREATE TABLE `sb_product` (
  `product_id` int(11) NOT NULL,
  `model` varchar(64) NOT NULL,
  `sku` varchar(64) NOT NULL,
  `upc` varchar(12) NOT NULL,
  `ean` varchar(14) NOT NULL,
  `jan` varchar(13) NOT NULL,
  `isbn` varchar(17) NOT NULL,
  `mpn` varchar(64) NOT NULL,
  `quantity` int(4) NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `shipping` tinyint(1) NOT NULL DEFAULT '1',
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `points` int(8) NOT NULL DEFAULT '0',
  `date_available` date NOT NULL,
  `weight` decimal(15,8) NOT NULL DEFAULT '0.00000000',
  `weight_class_id` int(11) NOT NULL DEFAULT '0',
  `length` decimal(15,8) NOT NULL DEFAULT '0.00000000',
  `width` decimal(15,8) NOT NULL DEFAULT '0.00000000',
  `height` decimal(15,8) NOT NULL DEFAULT '0.00000000',
  `subtract` tinyint(1) NOT NULL DEFAULT '1',
  `minimum` int(11) NOT NULL DEFAULT '1',
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `viewed` int(5) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_product_attribute`
--

CREATE TABLE `sb_product_attribute` (
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_product_description`
--

CREATE TABLE `sb_product_description` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `tag` text NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_product_discount`
--

CREATE TABLE `sb_product_discount` (
  `product_discount_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(4) NOT NULL DEFAULT '0',
  `priority` int(5) NOT NULL DEFAULT '1',
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `date_start` date NOT NULL,
  `date_end` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_product_image`
--

CREATE TABLE `sb_product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `imageName` varchar(255) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sb_product_related`
--

CREATE TABLE `sb_product_related` (
  `product_id` int(11) NOT NULL,
  `related_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_product_reward`
--

CREATE TABLE `sb_product_reward` (
  `product_reward_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `points` int(8) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_product_special`
--

CREATE TABLE `sb_product_special` (
  `product_special_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `priority` int(5) NOT NULL DEFAULT '1',
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `date_start` date NOT NULL,
  `date_end` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_product_to_category`
--

CREATE TABLE `sb_product_to_category` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_return`
--

CREATE TABLE `sb_return` (
  `return_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(96) NOT NULL,
  `telephone` varchar(32) NOT NULL,
  `product` varchar(255) NOT NULL,
  `model` varchar(64) NOT NULL,
  `quantity` int(4) NOT NULL,
  `opened` tinyint(1) NOT NULL,
  `return_reason_id` int(11) NOT NULL,
  `return_action_id` int(11) NOT NULL,
  `return_status_id` int(11) NOT NULL,
  `comment` text,
  `date_ordered` date NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_return_action`
--

CREATE TABLE `sb_return_action` (
  `return_action_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_return_history`
--

CREATE TABLE `sb_return_history` (
  `return_history_id` int(11) NOT NULL,
  `return_id` int(11) NOT NULL,
  `return_status_id` int(11) NOT NULL,
  `notify` tinyint(1) NOT NULL,
  `comment` text NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_return_reason`
--

CREATE TABLE `sb_return_reason` (
  `return_reason_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_return_status`
--

CREATE TABLE `sb_return_status` (
  `return_status_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_review`
--

CREATE TABLE `sb_review` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `author` varchar(64) NOT NULL,
  `text` text NOT NULL,
  `rating` int(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_voucher`
--

CREATE TABLE `sb_voucher` (
  `voucher_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `from_name` varchar(64) NOT NULL,
  `from_email` varchar(96) NOT NULL,
  `to_name` varchar(64) NOT NULL,
  `to_email` varchar(96) NOT NULL,
  `voucher_theme_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `amount` decimal(15,4) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_voucher_history`
--

CREATE TABLE `sb_voucher_history` (
  `voucher_history_id` int(11) NOT NULL,
  `voucher_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` decimal(15,4) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_voucher_theme`
--

CREATE TABLE `sb_voucher_theme` (
  `name` varchar(32) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `provider_user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isVerified` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `doctor_id`, `provider_user_id`, `provider`, `name`, `email`, `password`, `number`, `api_token`, `otp`, `isVerified`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 'ajaykumar', 'ajaykumar@gmail.com', '$2y$10$odi2BsVVsoDIZvQQmpszoO2Vo9a4gJD2zJxqR7pLbDa3WMIVLlb0i', '9971568608', NULL, 'MQ==', NULL, 1, 'JOPQAvbwmFmkHBxsFcG8BnDDWtC1UKISiY6DfCjqOTin25VXNPkl6gplyKtR', '2018-01-01 07:16:40', '2018-01-05 06:49:20'),
(2, NULL, NULL, NULL, 'Alok Kumar', 'admin@cgda.com', '$2y$10$fG9q1QhpCo9wdYY.lwIvzu08vCIRNmSCuG9UOuW8CiUC4sWa8r/Zu', NULL, NULL, 'Mg==', NULL, 1, NULL, '2018-01-01 07:20:19', '2018-01-04 06:14:15'),
(3, NULL, NULL, NULL, 'anil kumar', 'anil1@gmail.com', '$2y$10$DyjAdLEu/LsEsfvqPjmxGuZP9rjEGXm/bW.UhoIQQJElRb5N7fTRi', '123456789', NULL, NULL, NULL, 1, '8cHV5TIy9YbWozu749wDrf5w5tmpSCnZqGFY8Vjq4twGAXwnZCI3qKZwZMEm', '2018-01-01 07:23:52', '2018-01-04 11:39:56'),
(4, NULL, NULL, NULL, 'ajay kumar', 'ajay@gmail.com', '$2y$10$aSUtiodYr6SuscRwrQq9nO9gBsEbDkODk8CaoDtyQaqZ.4pL5sYNu', '9971568609', NULL, NULL, NULL, 1, '7czReFVUsV8RY0uNKq9aEwgx8eQJlUmUIBNZmzFeFAay9oymQcnLp1Shjt8D', '2018-01-02 14:21:27', '2018-01-05 08:17:32'),
(5, NULL, NULL, NULL, 'Kuldeep Kumar', 'kuldeep@gmail.com', '$2y$10$AsUSbUbw4Jn5hhP/Ri2v8ORlP7D2C2EczWTWL639fonmm5vDDCnJq', '7508939355', NULL, NULL, NULL, 1, 'GnSzVVXTYEXZoRbuMO29ma6uCTudR5pEAvfeqBZpfVOdTvqVQI82lnm4a2B9', '2018-01-03 06:56:25', '2018-01-03 06:58:41'),
(6, NULL, NULL, NULL, NULL, 'sds@gmail.com', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2018-01-03 11:45:26', '2018-01-03 11:45:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sb_address`
--
ALTER TABLE `sb_address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `sb_admin`
--
ALTER TABLE `sb_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `sb_banners`
--
ALTER TABLE `sb_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sb_category`
--
ALTER TABLE `sb_category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `sb_coupon`
--
ALTER TABLE `sb_coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `sb_coupon_category`
--
ALTER TABLE `sb_coupon_category`
  ADD PRIMARY KEY (`coupon_id`,`category_id`);

--
-- Indexes for table `sb_coupon_history`
--
ALTER TABLE `sb_coupon_history`
  ADD PRIMARY KEY (`coupon_history_id`);

--
-- Indexes for table `sb_coupon_product`
--
ALTER TABLE `sb_coupon_product`
  ADD PRIMARY KEY (`coupon_product_id`);

--
-- Indexes for table `sb_customer`
--
ALTER TABLE `sb_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `sb_customer_activity`
--
ALTER TABLE `sb_customer_activity`
  ADD PRIMARY KEY (`customer_activity_id`);

--
-- Indexes for table `sb_customer_history`
--
ALTER TABLE `sb_customer_history`
  ADD PRIMARY KEY (`customer_history_id`);

--
-- Indexes for table `sb_customer_wishlist`
--
ALTER TABLE `sb_customer_wishlist`
  ADD PRIMARY KEY (`customer_id`,`product_id`);

--
-- Indexes for table `sb_order`
--
ALTER TABLE `sb_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `sb_order_history`
--
ALTER TABLE `sb_order_history`
  ADD PRIMARY KEY (`order_history_id`);

--
-- Indexes for table `sb_order_product`
--
ALTER TABLE `sb_order_product`
  ADD PRIMARY KEY (`order_product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `sb_product_attribute`
--
ALTER TABLE `sb_product_attribute`
  ADD PRIMARY KEY (`product_id`,`attribute_id`);

--
-- Indexes for table `sb_product_description`
--
ALTER TABLE `sb_product_description`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `sb_product_discount`
--
ALTER TABLE `sb_product_discount`
  ADD PRIMARY KEY (`product_discount_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `sb_product_image`
--
ALTER TABLE `sb_product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sb_product_related`
--
ALTER TABLE `sb_product_related`
  ADD PRIMARY KEY (`product_id`,`related_id`);

--
-- Indexes for table `sb_product_reward`
--
ALTER TABLE `sb_product_reward`
  ADD PRIMARY KEY (`product_reward_id`);

--
-- Indexes for table `sb_product_special`
--
ALTER TABLE `sb_product_special`
  ADD PRIMARY KEY (`product_special_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `sb_product_to_category`
--
ALTER TABLE `sb_product_to_category`
  ADD PRIMARY KEY (`product_id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `sb_return`
--
ALTER TABLE `sb_return`
  ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `sb_return_action`
--
ALTER TABLE `sb_return_action`
  ADD PRIMARY KEY (`return_action_id`);

--
-- Indexes for table `sb_return_history`
--
ALTER TABLE `sb_return_history`
  ADD PRIMARY KEY (`return_history_id`);

--
-- Indexes for table `sb_return_reason`
--
ALTER TABLE `sb_return_reason`
  ADD PRIMARY KEY (`return_reason_id`);

--
-- Indexes for table `sb_return_status`
--
ALTER TABLE `sb_return_status`
  ADD PRIMARY KEY (`return_status_id`);

--
-- Indexes for table `sb_review`
--
ALTER TABLE `sb_review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `sb_voucher`
--
ALTER TABLE `sb_voucher`
  ADD PRIMARY KEY (`voucher_id`);

--
-- Indexes for table `sb_voucher_history`
--
ALTER TABLE `sb_voucher_history`
  ADD PRIMARY KEY (`voucher_history_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sb_admin`
--
ALTER TABLE `sb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sb_banners`
--
ALTER TABLE `sb_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sb_category`
--
ALTER TABLE `sb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sb_coupon`
--
ALTER TABLE `sb_coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sb_coupon_history`
--
ALTER TABLE `sb_coupon_history`
  MODIFY `coupon_history_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sb_coupon_product`
--
ALTER TABLE `sb_coupon_product`
  MODIFY `coupon_product_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sb_customer`
--
ALTER TABLE `sb_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sb_customer_activity`
--
ALTER TABLE `sb_customer_activity`
  MODIFY `customer_activity_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sb_customer_history`
--
ALTER TABLE `sb_customer_history`
  MODIFY `customer_history_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sb_order`
--
ALTER TABLE `sb_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sb_order_history`
--
ALTER TABLE `sb_order_history`
  MODIFY `order_history_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sb_order_product`
--
ALTER TABLE `sb_order_product`
  MODIFY `order_product_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sb_product_discount`
--
ALTER TABLE `sb_product_discount`
  MODIFY `product_discount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=441;
--
-- AUTO_INCREMENT for table `sb_product_image`
--
ALTER TABLE `sb_product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sb_product_reward`
--
ALTER TABLE `sb_product_reward`
  MODIFY `product_reward_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=546;
--
-- AUTO_INCREMENT for table `sb_product_special`
--
ALTER TABLE `sb_product_special`
  MODIFY `product_special_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=440;
--
-- AUTO_INCREMENT for table `sb_return`
--
ALTER TABLE `sb_return`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sb_return_action`
--
ALTER TABLE `sb_return_action`
  MODIFY `return_action_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sb_return_history`
--
ALTER TABLE `sb_return_history`
  MODIFY `return_history_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sb_return_reason`
--
ALTER TABLE `sb_return_reason`
  MODIFY `return_reason_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sb_return_status`
--
ALTER TABLE `sb_return_status`
  MODIFY `return_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sb_review`
--
ALTER TABLE `sb_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sb_voucher`
--
ALTER TABLE `sb_voucher`
  MODIFY `voucher_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sb_voucher_history`
--
ALTER TABLE `sb_voucher_history`
  MODIFY `voucher_history_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
