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
-- Table structure for table `stock_tag_lists`
--

CREATE TABLE `stock_tag_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `stock_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stock_tag_lists`
--

INSERT INTO `stock_tag_lists` (`id`, `stock_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 42, 1, '2017-05-07 17:00:00', '2017-05-07 17:00:00'),
(2, 42, 2, '2017-05-07 17:00:00', '2017-05-07 17:00:00'),
(3, 42, 3, '2017-05-07 17:00:00', '2017-05-07 17:00:00'),
(4, 27, 5, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(5, 27, 6, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(6, 28, 5, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(7, 28, 6, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(8, 35, 5, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(9, 35, 6, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(10, 30, 4, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(11, 31, 4, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(12, 32, 11, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(13, 32, 12, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(14, 34, 11, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(15, 34, 12, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(16, 39, 14, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(17, 33, 7, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(18, 33, 10, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(19, 33, 9, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(20, 36, 7, '2017-05-14 17:00:00', '2017-05-14 17:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stock_tag_lists`
--
ALTER TABLE `stock_tag_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_tag_lists_stock_id_foreign` (`stock_id`),
  ADD KEY `stock_tag_lists_tag_id_foreign` (`tag_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stock_tag_lists`
--
ALTER TABLE `stock_tag_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `stock_tag_lists`
--
ALTER TABLE `stock_tag_lists`
  ADD CONSTRAINT `stock_tag_lists_stock_id_foreign` FOREIGN KEY (`stock_id`) REFERENCES `stocks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stock_tag_lists_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
