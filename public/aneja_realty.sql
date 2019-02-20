-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 20, 2019 at 02:13 PM
-- Server version: 5.6.31-0ubuntu0.15.10.1
-- PHP Version: 5.6.11-1ubuntu3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aneja_realty`
--

-- --------------------------------------------------------

--
-- Table structure for table `area_types`
--

CREATE TABLE IF NOT EXISTS `area_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area_types`
--

INSERT INTO `area_types` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Sq.Ft', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(2, 'Sq. Yards', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(3, 'Sq. Meter', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(4, 'Acres', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(5, 'Marla', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(6, 'Cents', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(7, 'Bigha', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(8, 'Kottah', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(9, 'Kanal', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(10, 'Grounds', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(11, 'Ares', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(12, 'Biswa', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(13, 'Guntha', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(14, 'Aankadam', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(15, 'Hectares', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(16, 'Rood', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(17, 'Chataks', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(18, 'Perch', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=>inactive,1=>active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0=>inactive,1=>active'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `slug`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 'india', 'india', 'This is an indian country', 1, 1, '2016-12-08 00:00:00', '2016-12-08 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE IF NOT EXISTS `properties` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `property_code` varchar(100) NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `total_floors` varchar(100) NOT NULL,
  `floor_number` varchar(150) NOT NULL,
  `available_for` varchar(100) NOT NULL,
  `property_type_area_id` int(11) NOT NULL,
  `area_type_id` int(11) NOT NULL,
  `built_up_size` varchar(50) NOT NULL,
  `rent_price` float NOT NULL,
  `total_parking` varchar(100) NOT NULL,
  `buiilding_face` varchar(100) NOT NULL,
  `property_age` varchar(100) NOT NULL,
  `short_address` varchar(200) NOT NULL,
  `flooring` varchar(100) NOT NULL,
  `flat_configuration` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `complete_address` text NOT NULL,
  `image` text NOT NULL,
  `total_file` int(11) NOT NULL,
  `property_type` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` enum('0','1','2','') NOT NULL DEFAULT '1' COMMENT '0=>inactive,1=>active,2=>deleted'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `user_id`, `title`, `property_code`, `bedrooms`, `total_floors`, `floor_number`, `available_for`, `property_type_area_id`, `area_type_id`, `built_up_size`, `rent_price`, `total_parking`, `buiilding_face`, `property_age`, `short_address`, `flooring`, `flat_configuration`, `description`, `complete_address`, `image`, `total_file`, `property_type`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 'test', 'PR1549792966', 14, '1', 'basement', '1', 2, 1, '22', 1111, '1', 'East Facing', 'Under Construction', 'nehru place', 'fddg', '1', 'fkfvhdsusdfusyfusdyuf', 'dskjfds fsdfusdfu', '0', 0, 0, 1, 1, '2019-02-10 10:02:46', '2019-02-10 10:02:46', '1'),
(2, 1, 'test flat 123', 'PR1550076865', 0, '5', '1', '2', 11, 1, '11000', 10000, '5', 'East Facing', 'New Construction', 'shalimar bagh', '', '', 'test description', 'test address', '0', 0, 0, 1, 1, '2019-02-13 16:54:25', '2019-02-13 17:12:01', '1');

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE IF NOT EXISTS `property_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Residence', 2, 2, '2017-01-21 00:00:00', '2017-01-21 00:00:00', '1'),
(2, 'Commercial', 2, 2, '2017-01-21 00:00:00', '2017-01-21 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `property_type_areas`
--

CREATE TABLE IF NOT EXISTS `property_type_areas` (
  `id` int(11) NOT NULL,
  `property_type_id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_type_areas`
--

INSERT INTO `property_type_areas` (`id`, `property_type_id`, `type_name`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 'Residential Apartment', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(2, 1, 'Independent/Builder Floor', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(3, 1, 'Independent House/Villa', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(4, 1, 'Residential Land', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(5, 1, 'Studio Apartment', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(6, 1, 'Farm House', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(7, 1, 'Serviced Apartments', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(8, 1, 'Other', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(9, 2, 'Commercial Shops', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(10, 2, 'Commercial Showrooms', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(11, 2, 'Commercial Office/Space', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(12, 2, 'Commercial Land/Inst. Land', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(13, 2, 'Industrial Lands/Plots', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(14, 2, 'Agricultural/Farm Land', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(15, 2, 'Hotel/Resorts', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(16, 2, 'Guest-House/Banquet-Halls', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(17, 2, 'Time Share', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(18, 2, 'Space in Retail Mall', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(19, 2, 'Office in Business Park', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(20, 2, 'Office in IT Park', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(21, 2, 'Ware House', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(22, 2, 'Cold Storage', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(23, 2, 'Factory', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(24, 2, 'Manufacturing', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(25, 2, 'Business center', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(26, 2, 'Other', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(27, 2, 'Institutional', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(28, 2, 'Hospital', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=>inactive,1=>active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test@test.com', '$2y$10$m..POOMLpRoFKIbNNmqWwOXvfxblq4BVKhJ22KQBVkWGL2OI8iZy6', 'VUzkycaCH0HR6n72srRcMEXUZZ8B0MB9u338aXnyKEiCuat9axVPCqKlg689', '2019-02-09 03:35:49', '2019-02-13 11:43:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area_types`
--
ALTER TABLE `area_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_types`
--
ALTER TABLE `property_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_type_areas`
--
ALTER TABLE `property_type_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `area_types`
--
ALTER TABLE `area_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `property_type_areas`
--
ALTER TABLE `property_type_areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
