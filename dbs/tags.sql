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
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `alias`, `created_at`, `updated_at`) VALUES
(1, 'Iphone', 'iphone', '2017-05-07 17:00:00', '2017-05-07 17:00:00'),
(2, 'Iphone 6', 'iphone-6', '2017-05-07 17:00:00', '2017-05-07 17:00:00'),
(3, '32GB', '32gb', '2017-05-07 17:00:00', '2017-05-07 17:00:00'),
(4, 'Asus Zenfone 3', 'asus-zenfone-3', '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(5, 'Samsung', 'samsung', '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(6, 'Galaxy J7', 'galaxy-j7', '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(7, 'Macbook', 'macbook', '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(8, 'iPad', 'ipad', '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(9, '256GB', '256gb', '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(10, '15 inch', '15-inch', '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(11, 'Truyen Tranh', 'truyen-tranh', '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(12, 'Doremon', 'doremon', '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(13, 'Tieu thuyet', 'tieu-thuyet', '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(14, 'IELTS', 'ielts', '2017-05-14 17:00:00', '2017-05-14 17:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_alias_unique` (`alias`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
