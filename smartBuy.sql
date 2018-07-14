-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 13, 2017 at 11:06 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.1.11-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartBuy`
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
(1, 1, 'Alok', NULL, 'Saxena', 'aloksaxena624@gmail.com', '$2y$10$fTx4S2FywWS0uXtEINSVzOa2n1g.GzM6kQ97KQcib3vixBueZ8aZq', 'UyVfqq3OwygDVxQTHWb2wxNDbJxTOfL58CoPJA25SSRHDefaCpYSC4pCE23w', 1, '2017-11-12 10:01:18', '2017-12-11 19:00:44', 1);

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
(1, 1, NULL, NULL, 'alok', 'alok@gmail.com', '$2y$10$z7EuS1ENoLAXW45PmDi1P.6OB96Fkz1fGUBeCzNKSN3yttwuOGSc2', '1234567890', 'GANr6q9460J4IS3YWMgQthtN8aaSjQXM47TOG110a8c7lmWiJ0pvOX1CZpnv', '12345', 1, 1, 'GNxivA3GUJ6ysasWdY6RNfACkIULzL8UYkwM86wO6KXBNbECHtCeKYdEhgpF', '2017-04-07 07:03:04', '2017-04-23 16:02:45'),
(2, 1, NULL, NULL, 'santosh', 'santosh@gmail.com', '$2y$10$f8TFzyvLsgrWz2rbGhNzeOdjiKXa6lIUeOk.I22IecM2qk8i/.vVS', '9876543210', NULL, NULL, NULL, 1, NULL, '2017-04-07 07:07:18', '2017-04-25 09:29:53'),
(3, 1, NULL, NULL, 'alok', 'saxena@gmail.com', '$2y$10$TBVOUGru47syMfkJiOZdhusmwxSutZdTgrAOL4afQINlFEZ5tLlgi', '123456', NULL, NULL, NULL, 1, NULL, '2017-04-07 14:45:00', '2017-04-25 09:29:58'),
(4, 1, NULL, NULL, 'alok', 'saxena4u@gmail.com', '$2y$10$GvNKZVhv0q9ke.R5w6KyKOP8uWe9DEShnBJiQiYw/QVDF3UnayJfi', '123456', NULL, '23649', 1, 0, NULL, '2017-04-07 15:33:01', '2017-04-25 09:30:01'),
(5, 1, NULL, NULL, 'abc', 'abc@gmail.com', '$2y$10$b4RP3fiXTU.Ouo5euMVLDezHSC4G9mYTstWMR13WqBP2OBavaht7a', '1234567890', 'vpr4p87VWOrpaSSy0g0c6ZDaIBOJma1AqsBKHoVDy2TqcxVfX1LZYV8FHVYO', '28094', 1, 1, NULL, '2017-04-10 00:40:11', '2017-04-12 01:48:37'),
(6, 1, NULL, NULL, 'ram', 'bittukhokher@gmail.com', '$2y$10$xYXN/tujIliiSH5LGhiioONg6lOyqpKc90yFw/HtyiqGoBWa3XRuu', '1234567890', 'XjIyrsgfwYrCCcfqxyRQrdnUuSzWasElilka1J7uYWjSGKVoIx8Dj6r1Qxto', '20249', NULL, 1, NULL, '2017-04-10 03:14:16', '2017-04-25 09:30:04'),
(7, 1, NULL, NULL, 'bittu', 'bittu@gami.com', '$2y$10$yzMEAQ2tqt2Q8LbZdVOp.uR186Q6DMjjvRgn0YpnfYQSax6SZ7j7m', '9911725801', NULL, '3858', NULL, 1, NULL, '2017-04-10 05:00:11', '2017-04-10 05:00:11'),
(8, 1, NULL, NULL, 'bxjfh', 'bittu@gamil.com', '$2y$10$NQZ6uJf1bvBB.krMm0K6PuL.yxDAt52haEhxRwUeRw7.pM7frd9X2', '9911725802', NULL, '6368', NULL, 1, NULL, '2017-04-10 05:05:00', '2017-04-10 05:05:00'),
(9, 1, NULL, NULL, 'bittu', 'bittu@gsjs.com', '$2y$10$2b87raJ/XXkpiNTnKOkZ3OCeNBEGQQC4d9XTHlYeaalm/aV/OS1vC', '9911725803', NULL, '24419', NULL, 1, NULL, '2017-04-10 05:32:16', '2017-04-10 05:32:16'),
(10, 1, NULL, NULL, 'bittu', 'abc@f.com', '$2y$10$T2bu8WBzJGD7xvW7yAtrP.mIcDYYWbnwizxjUU5nq.qOsT97NtdfW', '9911725800', NULL, '28812', NULL, 1, NULL, '2017-04-10 05:39:56', '2017-04-10 05:39:56'),
(11, 1, NULL, NULL, 'bbs', 'gsgd@ggs.com', '$2y$10$7UZrQXba5GA92YUwQ6wH.eW.ic.49pSSOH8HY44oNQ7hCNgpPPfJq', '9911725805', NULL, '30698', NULL, 1, NULL, '2017-04-10 05:47:21', '2017-04-10 05:47:21'),
(12, 1, NULL, NULL, 'bittu', 'bittu@gm.com', '$2y$10$O2vD3D9KufBs9l8zHBG62eE.bD5Gly2Yk6t.v49McGgq2lqkUwmtu', '9911725807', NULL, '18513', NULL, 1, NULL, '2017-04-10 05:56:53', '2017-04-10 05:56:53'),
(13, 2, NULL, NULL, 'ram', 'bittukhokher1@gmail.com', '$2y$10$LjwINsl0NrIN3a8D4etJluQIbZeGqdCCCvLWD0WPnoZMt2b6OSRIq', '1234567890', NULL, '1109', NULL, 1, NULL, '2017-04-10 06:52:55', '2017-04-10 06:52:55'),
(14, 1, NULL, NULL, 'bdhh', 'dgdhh@hh.com', '$2y$10$a9Fyan/5L.kcDGy34XWySu2F9eqXFPAV9Y5ZENIkADAUcQgoSPipG', '9911725888', NULL, '11579', NULL, 1, NULL, '2017-04-10 07:19:19', '2017-04-10 07:19:19'),
(15, 1, NULL, NULL, 'hdhdh', 'bittu@jdye.com', '$2y$10$fXSNtl1v9eAXp8azH2SvMOCV9Sw2gyB9wqeEEeD70rCJfL3Ovxouy', '124576890', NULL, '7716', NULL, 1, NULL, '2017-04-10 07:20:14', '2017-04-10 07:20:14'),
(16, 1, NULL, NULL, 'bdb', 'hhshd@ghs.com', '$2y$10$m3O0v9wtdNamH450i7kvxe.HgDwe5o.Z9XceazmpY9fh9K7dcjY7m', '512184848', NULL, '27736', NULL, 1, NULL, '2017-04-10 08:13:14', '2017-04-10 08:13:14'),
(17, 1, NULL, NULL, 'bittu', 'bit1tu@gmail.com', '$2y$10$tOolU1wekeVq1wzzaayDROXpGB0pYAkUkvM3WPkGl0gqhbKRIe4sG', '147258098564', NULL, '25111', NULL, 1, NULL, '2017-04-11 00:16:07', '2017-04-11 00:16:07'),
(18, 1, NULL, NULL, 'bittu', 'bittuz@gamil.com', '$2y$10$I84yOKbaTAcdKJaYZ18y6Ogsti.5fhqj.C.NcuHzvVfv03H0WcIpm', '1472580369', NULL, '30212', NULL, 1, NULL, '2017-04-11 00:20:00', '2017-04-11 00:20:00'),
(19, 1, NULL, NULL, 'bittukhokher', 'bittgdhhd@gamil.com', '$2y$10$nT4iUt4WRt96v1F07t9PB.pH7qRnM1HRvmQXnEJlyvt2QhJ4zDPEW', '98989892580', NULL, '10221', NULL, 1, NULL, '2017-04-11 00:23:22', '2017-04-11 00:23:22'),
(20, 1, NULL, NULL, 'bittu', 'bittu@gmailhdjf.com', '$2y$10$b1kYHjM0Bk2hzvZVCzNz5.v8mgxN3IaChTdiO0kyOq4MHD7Hk9APi', '978484646611', NULL, '26146', NULL, 1, NULL, '2017-04-11 00:27:20', '2017-04-11 00:27:20'),
(23, 1, NULL, NULL, 'vdndj', 'bxxn@gam.com', '$2y$10$KpoEiDilzRoIx2N2PDZjyenXuHoDcaNl.GY2GFBUyltJ//nfQ76S2', '989565659898', NULL, '6322', NULL, 1, NULL, '2017-04-11 01:12:41', '2017-04-11 01:12:41'),
(24, 1, NULL, NULL, 'bittu', 'bittukhokher@gamfgg.com', '$2y$10$Y4Vj05NbqHUWHs1nxR9YnusLQD45Weu4ujG/T3ozRq466/da7Luwm', '46656568', NULL, '28675', NULL, 1, NULL, '2017-04-11 01:20:19', '2017-04-11 01:20:19'),
(25, 1, NULL, NULL, 'bbxhxhx', 'bittukhokher@gamfgg.comthxhxh', '$2y$10$O3XsP1/Lp/jiQghoQyZLY.RovpvfVF3FKhfVw1kXtYQMhAloxzmNq', '89989', NULL, '26728', NULL, 1, NULL, '2017-04-11 01:25:08', '2017-04-11 01:25:08'),
(26, 1, NULL, NULL, 'bittu', 'bittukhokher@gmail.comiy', '$2y$10$bO5QO3vJe4fepdjxHhqY7.HcTuO4O6sDtbeWKnHFXPUGTbbHKdt.W', '9565566568', NULL, '19328', NULL, 1, NULL, '2017-04-11 01:27:27', '2017-04-11 01:27:27'),
(27, 1, NULL, NULL, 'vitt', 'bdnd@hdh.com', '$2y$10$b77Lc7Z1C/atpJQo4RAhg.RcuFREMcPB6X6tgA7Qo5ZO4YNprd.QC', '64659890', NULL, '32603', NULL, 1, NULL, '2017-04-11 01:29:33', '2017-04-11 01:29:33'),
(28, 1, NULL, NULL, 'bittujdj', 'bxhxhd@gam.com', '$2y$10$j/045vkOn6Ij/xhfBEAnsum2wmywM4qyZjcchh0QrEGbuVS1yIVpC', '98896565958', NULL, '21945', NULL, 1, NULL, '2017-04-11 01:34:51', '2017-04-11 01:34:51'),
(30, 2, NULL, NULL, 'prashant kumar', 'prashant@yahoo.com', '$2y$10$z7EuS1ENoLAXW45PmDi1P.6OB96Fkz1fGUBeCzNKSN3yttwuOGSc2', '1234567890', 'jvRfwEtYuwqniyl0x49UhQbArLFnekAiFWBVWwXeOIyFwyFE3GpAeyfLoLqx', '17006', NULL, 1, NULL, '2017-04-11 01:38:58', '2017-04-11 01:38:58'),
(31, 1, NULL, NULL, 'bittu', 'gshdhdhdh@g.com', '$2y$10$OF3XP7XkQEVFkPr.5fj0K.qHTxkmNmAOttksK2pwH4dWuIdT2Aoem', '5468988446', 'ytc52L8epD9IGh5C4cKRYCfFeguvIuqEHHOzF2qbZ0bQwasAF2JfvkJNKSi3', '26533', NULL, 1, NULL, '2017-04-11 01:40:43', '2017-04-11 01:40:43'),
(32, 1, NULL, NULL, 'bittu', 'bittu@ghshs.com', '$2y$10$qZC1x.hyTNUAztURLJRbV.1c8/Ju/EO21ARzp3oTSP0WHqjpTco8S', '8464689880', 'irMmh3cSvxUwJ44K4BuW36PEiusk5CS26GVJNqzznvN6OxvrfI1lT2QXs7mR', '3597', NULL, 1, NULL, '2017-04-11 02:29:59', '2017-04-11 02:29:59'),
(33, 1, NULL, NULL, 'bittu', 'bittu@gmail.com', '$2y$10$E67PJ4WFa8VFZjIumKld.egg6QvzhfeLrkBMiews9pUFJj997FuC2', '9911725809', 'gXNzljIPRfIeul3Ub0O7KhilncMZipD7KGqjLZtJiXEHDVRPXeHF1JjwOIJG', '11219', NULL, 1, NULL, '2017-04-11 02:36:41', '2017-04-11 02:36:41'),
(34, 1, NULL, NULL, 'bittukhokher', 'bittu@gamilhdhd.com', '$2y$10$GTTVo9Ks5lmlP0bO/ZumgOUuvkIELNFhTDShS3gnxUhPVNlyMluvu', '566598988', 'R4NbNaajgLfLge1WVi7iankym7hhKm4dRF9NwewVCkEc6PeX3edtWBiSpzXw', '5245', NULL, 1, NULL, '2017-04-11 03:33:33', '2017-04-11 03:33:33'),
(35, 1, NULL, NULL, 'bittukhokher', 'gsdh@ghdhdhr.com', '$2y$10$Hd1fOifXMPhskoa0Eybj7uesvMopcV2SNrk8DLvbSkt8ogN/x7dWG', '646598', 'lCN1S6OfUgUjnWZWcIzaTv0K3Kwp4GbzocWPvANU2wpwELTU8J7bzCqqmfwB', '1311', NULL, 1, NULL, '2017-04-11 04:00:40', '2017-04-11 04:00:40'),
(36, 1, NULL, NULL, 'bittu', 'dgdhhd@gdhdh.com', '$2y$10$hdbVjNPwlAaeb3G9439COuAadYuff.bl/KfRkx6/oIbb7ZTld3lgu', '5464980', NULL, '2762', NULL, 1, NULL, '2017-04-11 04:10:21', '2017-04-11 04:10:21'),
(37, 1, NULL, NULL, 'hdhd', 'bxhd@gghza.com', '$2y$10$vWAXFSL7k73jmw2XE4RRvOKgwKshHQck4y7GQZOPs7ZZ4kLnDGd8y', '656656565', NULL, '12871', NULL, 1, NULL, '2017-04-11 04:28:29', '2017-04-11 04:28:29'),
(38, 1, NULL, NULL, 'bjfj', 'gshd@gdhhd.com', '$2y$10$K/pI3MFAlahhgLgP2Rqsf.ItHLb756viaXzr5dqaqG17B3JhjOO0y', '4665888959', NULL, '14964', NULL, 1, NULL, '2017-04-11 04:39:56', '2017-04-11 04:39:56'),
(39, 1, NULL, NULL, 'vxbxhdhdhhr', 'hdhdhgdhd@gdhdhd.com', '$2y$10$XxoaA/HRIhQvsvWS77dI/eMevLJW7fPQ.AAxY1FYHmmZsityMk6Ym', '98959', NULL, '27549', NULL, 1, NULL, '2017-04-11 04:47:32', '2017-04-11 04:47:32'),
(40, 1, NULL, NULL, 'bittukhohokher', 'bittu@gdhdhghh.com', '$2y$10$ayW5J5t3kXAr9kUbIcW61.xESVAesqomXVdCi534tT99.UORJo21e', '846569588', NULL, '22546', NULL, 1, NULL, '2017-04-11 04:58:44', '2017-04-11 04:58:44'),
(41, 1, NULL, NULL, 'bitti', 'bitt@ghsjd.com', '$2y$10$DZIEZ4lzhFFcmc5Hhbr44u0y/3gxm09MaSTvz3ObnWK0IIYKYkUUW', '6464989', NULL, '25612', NULL, 1, NULL, '2017-04-11 05:23:48', '2017-04-11 05:23:48'),
(42, 1, NULL, NULL, 'bshsh', 'hshdh@gamil.com', '$2y$10$ab4XzbnT0rylbL7336An0eT9g6kolyNxDeVjHfW6aLoLFPpw.JsD6', '545480894646', NULL, '29013', NULL, 1, NULL, '2017-04-11 05:30:42', '2017-04-11 05:30:42'),
(43, 1, NULL, NULL, 'bshsh', 'hshdh@gamil.comdff', '$2y$10$M8bQXwE6ncTGJVf8hm96LOygUjMQj.NV7vc0FR4TKdIPBiL6IhX9e', '545480894646', NULL, '22378', NULL, 1, NULL, '2017-04-11 05:38:07', '2017-04-11 05:38:07'),
(44, 1, NULL, NULL, 'cgh', 'ggg@gh.com', '$2y$10$3dZUcEE5Flpiyt2oFkTwF.Qe/lGaBbgDBWRV9ekTpKvwljiPHVUUW', '8558', NULL, '13403', NULL, 1, NULL, '2017-04-11 05:39:37', '2017-04-11 05:39:37'),
(45, 1, NULL, NULL, 'bxbddh', 'hdhhd@hhdhd.com', '$2y$10$vRgMo15mlydnauitXCByaue4sXunGW0K729B/kgqjtuOwh7c6u2Ju', '54646556', NULL, '13560', NULL, 1, NULL, '2017-04-11 05:53:25', '2017-04-11 05:53:25'),
(46, 1, NULL, NULL, 'hdhd', 'hhdh@gdhdh.com', '$2y$10$/7e8mpECEZDusEIU0Pn0OeHYqN/ifaPalFo4BXWx9n188bZLbD0X2', '5457880', NULL, '19921', NULL, 1, NULL, '2017-04-11 05:55:39', '2017-04-11 05:55:39'),
(47, 1, NULL, NULL, 'bittu@&', 'd@hdjxjcjvj.com', '$2y$10$rZQkVbrkxLeqRsRfmcei8.iZZx9xiG4Ab8UqeHI27oi3J2px90zQq', '8989899856688', NULL, '10404', NULL, 1, NULL, '2017-04-11 06:01:18', '2017-04-11 06:01:18'),
(48, 1, NULL, NULL, 'bittukhodh', 'bittgdh@gdhdh.com', '$2y$10$ZCBQETeUzu459nhtgsoMXuJhrsIjNvKdFN7cRF1yPfBGBDW8rVwxa', '94659898898997', NULL, '22981', NULL, 1, NULL, '2017-04-11 06:06:09', '2017-04-11 06:06:09'),
(49, 1, NULL, NULL, 'bittukhokher', 'gshdh@ghdhdhddd.com', '$2y$10$HhRAfgcesKrJs4NjjcQpmu0blOYNJxQTHTw4goLWAAAZV26Rjf.F.', '949890', NULL, '27211', NULL, 1, NULL, '2017-04-11 06:08:33', '2017-04-11 06:08:33'),
(50, 1, NULL, NULL, 'gdhdh', 'ghdgd@hdjjd.com', '$2y$10$r7IKWlSwftXEIeCqvg333O3wiRBI.ofeITlmZxTSHhBjg3jiQpH9G', '96464989', NULL, '17700', NULL, 1, NULL, '2017-04-11 06:09:30', '2017-04-11 06:09:30'),
(51, 1, NULL, NULL, 'bittu', 'bdbdh@gdhjf.com', '$2y$10$bdAAUZUAk2b9OzenO7StWuRjrQ0C.68iFF3.U2fd7WxwU6szNjv0e', '54649807', NULL, '6722', NULL, 1, NULL, '2017-04-11 06:15:30', '2017-04-11 06:15:30'),
(52, 1, NULL, NULL, 'bittu', 'hdhd@ghdhd.com', '$2y$10$IGzQctLA.KvMsC4h2leT1ecCaE2oVg0kydByOOLpJbzvxXFMAkUUG', '99898', NULL, '6286', NULL, 1, NULL, '2017-04-11 06:19:17', '2017-04-11 06:19:17'),
(53, 1, NULL, NULL, 'ghd', 'hd@gxjdf.com', '$2y$10$kIES1XzLz71uG.ToMHiee.NUdOnxyNH/5HupABYA0px56WsKKJqrW', '98988689', NULL, '5308', NULL, 1, NULL, '2017-04-11 06:20:59', '2017-04-11 06:20:59'),
(54, 1, NULL, NULL, 'bittuhfh', 'hhhx@gdjxn.com', '$2y$10$zv5NT5L72p0K/NL6P9YAKuQnv.hpXJ7vi6SsoXTzIwqOMFwPCvtVa', '97', NULL, '4793', NULL, 1, NULL, '2017-04-11 06:23:30', '2017-04-11 06:23:30'),
(55, 1, NULL, NULL, 'bhdhdh', 'bittu@gsmz.com', '$2y$10$5hSWhRWK9y3SxzvB80uWnepWJ79mq16IsjwPnrZPN8ZZd/dIuxTyG', '54648', NULL, '3679', NULL, 1, NULL, '2017-04-11 06:24:31', '2017-04-11 06:24:31'),
(56, 1, NULL, NULL, 'gdgd', 'vdvdv@ghdhdx.com', '$2y$10$ux4LpR11wRseUH1Dc8lSh.3GM5PoDKxjHIYNQT4uf8J.HJhexb212', '979798', NULL, '24561', NULL, 1, NULL, '2017-04-11 06:26:19', '2017-04-11 06:26:19'),
(57, 1, NULL, NULL, 'bittu', 'bittu@gajs.com', '$2y$10$afecPi.LbIlDwbfsNxt0UuvMAiEZZNlljuOciZVVrNbpQ9eIUn0E2', '9977784854', NULL, '26032', NULL, 1, NULL, '2017-04-11 06:28:34', '2017-04-11 06:28:34'),
(58, 1, NULL, NULL, 'vshs', 'hdhdh@gdhhs.com', '$2y$10$4tyBFay4XEe7sNraOPDjqe/Cf1Ohh5Fep9YBj9hAymlT22S5SB.2O', '949749859', NULL, '26676', NULL, 1, NULL, '2017-04-11 06:33:43', '2017-04-11 06:33:43'),
(59, 1, NULL, NULL, 'bittukhokher', 'gshgd@ghdhd.com', '$2y$10$DSw5fEtdfaD98C9vJc/5lOonS1.E29o/Gf0mo5U.us6geYLPe55NK', '5464989', NULL, '11484', NULL, 1, NULL, '2017-04-11 06:39:06', '2017-04-11 06:39:06'),
(60, 1, NULL, NULL, 'bittu@GAMIL', 'ghdhdh@gshd.com', '$2y$10$BRQRO/a8iCXjuuh85w8zpekCchkRbCjrizTLD./PTqtsi0XQzOZHa', '8959898', NULL, '24779', NULL, 1, NULL, '2017-04-11 07:28:58', '2017-04-11 07:28:58'),
(61, 1, NULL, NULL, 'bittukh', 'bittu@gamam.com', '$2y$10$969.uwRI.zhI/.bb229dXeTLF.tD01AUhXlrggUovekalt/1qkWg2', '5475998464', NULL, '26561', NULL, 1, NULL, '2017-04-11 07:50:27', '2017-04-11 07:50:27'),
(62, 1, NULL, NULL, 'bittukhojh', 'bitdtu@ggshs.com', '$2y$10$jN.oNTBKZqEecblijTJj/eTscJVvV8B6uKinooVM89W/girls/w6K', '9780575754', NULL, '11110', NULL, 1, NULL, '2017-04-11 07:54:29', '2017-04-11 07:54:29'),
(63, 1, NULL, NULL, 'bittukhojher@gnsns', 'hxhhd@gdhd.com', '$2y$10$1yiwROGwmVl3nSLhqlpdxODReIQWblAWbOG6993hojnlzNkiPV00C', '9911725809', NULL, '16125', NULL, 1, NULL, '2017-04-11 08:04:48', '2017-04-11 08:04:48'),
(64, 1, NULL, NULL, 'gddhdh', 'hdhd@hdhdh.com', '$2y$10$2rMCqXj6gRsyEHcpq0.3KeCB8xHa/svVQ8kHMn2AcDKIESwFe1i/a', '64656565', NULL, '7747', NULL, 1, NULL, '2017-04-11 08:07:11', '2017-04-11 08:07:11'),
(65, 1, NULL, NULL, 'abc', 'abcd@gmail.com', '$2y$10$jSZ0rBV0XkpB8pfi943Z2e4IlVvr1x200SqlbWrxCfE/Fq08ByyZy', '1234567890', NULL, '9452', NULL, 1, NULL, '2017-04-11 09:17:19', '2017-04-11 09:17:19'),
(66, 1, NULL, NULL, 'bittukhojher', 'bittukhojher@gshshs.com', '$2y$10$ED3i9bFvRSKHfm.rmo9.D.No2blpzsfx.9G2hDEZJy0w//SYfV2vy', '4656689898', NULL, '25318', NULL, 1, NULL, '2017-04-12 00:22:05', '2017-04-12 00:22:05'),
(67, 1, NULL, NULL, 'bittu', 'hsgdh@ggshs.com', '$2y$10$V4IQrKB8m6g43mlMhe9LMOdVREQf7OuDV3xpGvG466Atx8EwNDMh6', '546494', NULL, '24615', 1, 1, NULL, '2017-04-12 00:25:22', '2017-04-12 00:25:25'),
(68, 1, NULL, NULL, 'test1@gmail.com', 'test1@gmail.com', '$2y$10$2dD.2lOwWLCFHs.CDVawXuSoo.pITgqNaOirpLJy5dIRdw7zgCkau', '9871236540', NULL, '31869', NULL, 1, NULL, '2017-04-12 02:34:21', '2017-04-12 02:34:21'),
(69, 1, NULL, NULL, 'gghyu@gmail.com', 'gghyu@gmail.com', '$2y$10$g05gaFo5CEX/vKVaYkbkKOe3M6w2UwZfJ9UHGclRMkLtkBnhKVuTu', '9632587410', NULL, '18290', NULL, 1, NULL, '2017-04-12 02:35:39', '2017-04-12 02:35:39'),
(70, 1, NULL, NULL, 'udf@gmail.com', 'udf@gmail.com', '$2y$10$8NIlhyBhqFsh2Dxi0lkFgevSTBKYMVoh.jorXxKbWDZhBqm.mpyG6', '1234567890', NULL, '22467', NULL, 1, NULL, '2017-04-12 02:40:15', '2017-04-12 02:40:15'),
(71, 1, NULL, NULL, 'ucu@gmail.com', 'ucu@gmail.com', '$2y$10$lrN.Q4jLI0jo4qMeTGvSou4Wasw/vxOjqr/kGANTWwm/O354fG7Su', '9632587410', NULL, '30784', NULL, 1, NULL, '2017-04-12 02:48:15', '2017-04-12 02:48:15'),
(72, 1, NULL, NULL, 'sss@gmail.com', 'sss@gmail.com', '$2y$10$ZrD.zZkkYfqCaeSgwPR5ZOEjvB1MienyzjmNuCAqg5Apf62S9xg/O', '9632587410', NULL, '25465', NULL, 1, NULL, '2017-04-12 02:51:40', '2017-04-12 02:51:40'),
(73, 1, NULL, NULL, 'bittukho', 'bittu@gssma.com', '$2y$10$QL66Y7t5IOyddMtF0GaCJuapqKvz8GFtYyEmSXWASGjb2kSkXXeUC', '97989898', NULL, '17201', 1, 1, NULL, '2017-04-12 03:29:41', '2017-04-12 03:29:44'),
(74, 1, NULL, NULL, 'pk@gmail.com', 'pk@gmail.com', '$2y$10$CfJ.vIYZWe4ZFvj3YYOl7ONI4aIs2naNo3l4rS4mX0xAUzH07obFm', '9632587410', NULL, '14870', NULL, 1, NULL, '2017-04-12 03:30:35', '2017-04-12 03:30:35'),
(75, NULL, NULL, NULL, 'Raj', 'raj@gmail.com', '$2y$10$fTx4S2FywWS0uXtEINSVzOa2n1g.GzM6kQ97KQcib3vixBueZ8aZq', NULL, NULL, NULL, NULL, 1, NULL, '2017-11-12 13:17:15', '2017-11-12 13:17:15');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
