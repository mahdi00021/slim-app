-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2021 at 10:22 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auth`
--

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` int(255) NOT NULL,
  `site_id` int(255) NOT NULL,
  `price` int(255) DEFAULT NULL,
  `is_active` enum('yes','no','','') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  `title_fa` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `dimensions` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `site_id`, `price`, `is_active`, `title_fa`, `description`, `dimensions`, `title_en`, `created_at`, `updated_at`) VALUES
(1, 1, 16000000, 'yes', 'Ø«Ø§Ø¨Øª Ú¯ÙˆØ´Ù‡ ØµÙØ­Ù‡ Ø¨Ø§Ù„Ø§', 'Ø«Ø§Ø¨Øª Ú¯ÙˆØ´Ù‡ ØµÙØ­Ù‡ Ø¨Ø§Ù„Ø§ Ø«Ø§Ø¨Øª Ú¯ÙˆØ´Ù‡ ØµÙØ­Ù‡ Ø¨Ø§Ù„Ø§\r\nØ«Ø§Ø¨Øª Ú¯ÙˆØ´Ù‡ ØµÙØ­Ù‡ Ø¨Ø§Ù„Ø§', '512x24x15', 'Ø¨Ø§Ù„Ø§ Ú¯ÙˆØ´Ù‡ØŒ a2', '2021-08-05 00:59:51', '2021-08-05 00:59:51'),
(4, 3, 97000000, 'yes', 'Ù…Ú©Ø§Ù† Ø«Ø§Ø¨Øª ØµÙØ­Ù‡ Ø§ØµÙ„ÛŒ', 'ØªØ¨Ù„ÛŒØºØ§Øª Ø¯Ø± Ø³Ø§ÛŒØª Ø§ØµÙ„ÛŒ', '512x24x40', 'const place main page', '2021-08-05 20:41:39', '2021-08-05 20:41:39'),
(5, 4, 82000000, 'yes', 'Ù…Ú©Ø§Ù† Ø«Ø§Ø¨Øª ØµÙØ­Ù‡ Ø§ØµÙ„ÛŒ', 'const place main pageÙ„Ù†Ø³ÛŒÙ…ØªÙ„Ù†Ø§ÛŒØ¨Ù„Ø§', '812x60x40', 'const place main page', '2021-08-05 21:40:31', '2021-08-05 21:40:31');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` int(255) NOT NULL,
  `site_name_fa` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `site_name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `alexa_local_rank` int(255) NOT NULL,
  `alexa_global_rank` int(255) NOT NULL,
  `site_url` varchar(255) NOT NULL,
  `is_active` enum('yes','no','','') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `site_name_fa`, `site_name_en`, `alexa_local_rank`, `alexa_global_rank`, `site_url`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'aparat', 'aparat', 2, 80, 'www.aparat.com', 'yes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'filimo', 'filimo', 5, 120, 'filimo.ir', 'yes', '2021-08-05 00:22:20', '2021-08-05 00:22:20'),
(3, 'Ø§Ù†ØªØ®Ø§Ø¨', 'Entekhab', 5, 156, 'https://www.entekhab.ir', 'yes', '2021-08-05 20:30:17', '2021-08-05 20:30:17'),
(4, 'Ø®Ø¨Ø±Ø¢Ù†Ù„Ø§ÛŒÙ†', 'khabaronline', 9, 140, 'https://khabaronline.ir', 'yes', '2021-08-05 21:39:36', '2021-08-05 21:39:36');

-- --------------------------------------------------------

--
-- Table structure for table `site_pics`
--

CREATE TABLE `site_pics` (
  `id` int(255) NOT NULL,
  `title_fa` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8 NOT NULL,
  `site_id` int(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_pics`
--

INSERT INTO `site_pics` (`id`, `title_fa`, `title_en`, `site_id`, `created_at`, `updated_at`) VALUES
(15, 'Ø«Ø§Ø¨Øª', 'const', 1, '2021-08-05 14:27:27', '2021-08-05 14:27:27'),
(16, 'Ø«Ø§Ø¨Øª', 'const', 2, '2021-08-05 14:28:12', '2021-08-05 14:28:12'),
(17, 'Ù…Ú©Ø§Ù† Ø«Ø§Ø¨Øª ØµÙØ­Ù‡ Ø§ØµÙ„ÛŒ', 'const place main page', 3, '2021-08-05 20:42:59', '2021-08-05 20:42:59'),
(18, 'Ù…Ú©Ø§Ù† Ø«Ø§Ø¨Øª ØµÙØ­Ù‡ Ø§ØµÙ„ÛŒ', 'const place main page', 4, '2021-08-05 21:41:23', '2021-08-05 21:41:23');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `code` int(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expired` enum('yes','no','','') NOT NULL DEFAULT 'no',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `user_id`, `code`, `date`, `expired`, `created_at`, `updated_at`) VALUES
(163, 3, 244627, '2021-08-05 21:23:59', 'no', '2021-08-05 21:23:59', '2021-08-05 21:23:59'),
(164, 3, 866875, '2021-08-05 21:29:08', 'no', '2021-08-05 21:29:08', '2021-08-05 21:29:08'),
(165, 1, 782475, '2021-08-05 21:31:05', 'no', '2021-08-05 21:31:05', '2021-08-05 21:31:05'),
(166, 3, 569844, '2021-08-05 21:34:09', 'no', '2021-08-05 21:34:09', '2021-08-05 21:34:09'),
(167, 1, 341653, '2021-08-05 21:36:12', 'no', '2021-08-05 21:36:12', '2021-08-05 21:36:12'),
(168, 3, 161867, '2021-08-05 21:42:30', 'no', '2021-08-05 21:42:30', '2021-08-05 21:42:30'),
(169, 1, 606208, '2021-08-07 00:46:41', 'no', '2021-08-07 00:46:41', '2021-08-07 00:46:41'),
(170, 3, 158519, '2021-08-07 00:51:34', 'no', '2021-08-07 00:51:34', '2021-08-07 00:51:34'),
(171, 1, 988100, '2021-08-07 00:52:27', 'no', '2021-08-07 00:52:27', '2021-08-07 00:52:27'),
(172, 1, 678424, '2021-08-07 00:57:15', 'no', '2021-08-07 00:57:15', '2021-08-07 00:57:15'),
(173, 1, 519313, '2021-08-07 01:12:58', 'no', '2021-08-07 01:12:58', '2021-08-07 01:12:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `role` enum('admin','user') NOT NULL,
  `mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `created_at`, `updated_at`, `role`, `mobile`) VALUES
(1, 'mahdi', 'norouzi', '2021-07-24 15:12:38', '2021-08-03 20:00:33', 'admin', '09355188545'),
(3, 'amir', 'bahrami', '2021-07-26 20:13:43', '2021-08-03 20:00:38', 'user', '09121234567');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banners_ibfk_1` (`site_id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_pics`
--
ALTER TABLE `site_pics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `site_pics_ibfk_1` (`site_id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tokens_ibfk_1` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `site_pics`
--
ALTER TABLE `site_pics`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `prices`
--
ALTER TABLE `prices`
  ADD CONSTRAINT `prices_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `site_pics`
--
ALTER TABLE `site_pics`
  ADD CONSTRAINT `site_pics_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
