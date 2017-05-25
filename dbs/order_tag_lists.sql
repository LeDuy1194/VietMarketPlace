-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2017 at 05:25 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vietmarketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_tag_lists`
--

CREATE TABLE `order_tag_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_tag_lists`
--

INSERT INTO `order_tag_lists` (`id`, `order_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 30, 1, '2017-05-07 17:00:00', '2017-05-07 17:00:00'),
(2, 30, 2, '2017-05-07 17:00:00', '2017-05-07 17:00:00'),
(3, 30, 3, '2017-05-07 17:00:00', '2017-05-07 17:00:00'),
(4, 18, 4, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(5, 19, 4, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(6, 23, 4, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(7, 24, 5, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(8, 24, 6, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(9, 22, 7, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(10, 25, 7, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(11, 29, 7, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(12, 22, 9, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(13, 27, 8, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(14, 22, 10, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(15, 20, 11, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(16, 21, 11, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(17, 20, 12, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(18, 21, 12, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(19, 28, 14, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(22, 33, 4, '2017-05-15 19:00:00', '2017-05-15 19:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_tag_lists`
--
ALTER TABLE `order_tag_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_tag_lists_order_id_foreign` (`order_id`),
  ADD KEY `order_tag_lists_tag_id_foreign` (`tag_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_tag_lists`
--
ALTER TABLE `order_tag_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_tag_lists`
--
ALTER TABLE `order_tag_lists`
  ADD CONSTRAINT `order_tag_lists_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_tag_lists_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
