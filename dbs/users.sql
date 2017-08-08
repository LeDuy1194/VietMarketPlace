-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2017 at 08:28 AM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '0',
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `level`, `fullname`, `address`, `city`, `district`, `phone`, `dob`, `avatar`, `activated`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'leduy', 'leduy211194@gmail.com', '$2y$10$9rZx5aZ5Y72XFMKrOX0K3eosbeJ.QDEnw65kLr2Ewijg3pzOhBmae', 2, 'Nguyen Le Duy', '55/24/14 Thành Mỹ, quận 10, TP HCM', NULL, NULL, '0165 353 9575', '1994-11-21', '1_leduy.jpg', 1, 'C36GZ6ysA1VXpfpcLumxX9osxQpYKwzALy4VgEjsM0vmKL9o9ZZWWgbGbmRv', '2017-03-27 19:15:47', '2017-06-13 06:28:00'),
(2, 'bipham', 'nobikun1412@gmail.com', '$2y$10$CmEr27d5SbV5Dlaxx6gf5OIsm0sOrU0cXiPnJ8DaYEUC0sgvu09F.', 2, 'Phạm Tuấn Anh', NULL, NULL, NULL, '01223530707', NULL, 'anh.jpg', 1, 'Mw9BjG07HyfwEOTsw9YPx0plF4jaZuSsFTdCuwlcSKIdjUrxggcMqM4musJ6', '2017-03-21 01:26:32', '2017-06-04 09:24:53'),
(3, 'choutruong', 'choutruong@gmail.com', '$2y$10$CeakwJ6Is8SFqNCaZdKK/eETCsvOunYfjKdmdPjN/4oljqe7HWFZi', 2, 'Trương Triệu Hải', '1025/12A CMT8 p7 qTB', NULL, NULL, '0903629676', NULL, 'chou.png', 1, 'JZgoDUF1zWHf6Wa6XikrS0UGkDK7ZIgKKsf4OYwkizGWnL5VVjne6s7HGtpx', '2017-03-22 00:51:17', '2017-06-06 01:17:19'),
(4, 'gvhd', 'ltkt@gmail.com', '$2y$10$sZOhWoq4almHEL.dddkufeC2qd8onJoGQ47/zwVzte46vVTl3t48.', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'ltkt.jpg', 1, 'q7KJDWDmxdlixLnYGDDy3nVNi1uK88Ne8yj8iRhHUmbkiHuBb7AWODNMJadx', '2017-03-23 17:50:16', '2017-05-18 01:29:12'),
(5, 'test1', 'test1@gmail.com', '$2y$10$VYg5xfNdUpf/ZfKTBrC7zOO6xyrC/KqH711O7XNm77PxBJUzRjsXa', 0, 'hnam', '119 - 3 Tháng 2', NULL, NULL, '0903629666', NULL, '5_test1.jpg', 1, 'vYCzuBh5hmgb02cs0nK6WYehSV6cwFlaaZcsDvSf2pUIXD1j2JgJvi2h1qOa', '2017-04-10 06:05:48', '2017-06-06 06:03:35'),
(6, 'test2', 'test2@gmail.com', '$2y$10$bxJ3MoHiGulMS9KLSPKe5.gnG6fali63TOm7OW2Hpzx2HTgeO/iqW', 0, 'ragnarok', '52 Út Tịch, phường 4', NULL, NULL, '0903456789', NULL, 'test2.jpg', 1, 'B3PrDqQ0GDmim9l1pGqthTlhd8VxtFuvBzApWTMqGEK59JAIh6lSokd8zGPg', '2017-04-10 06:06:04', '2017-05-30 00:20:29'),
(7, 'chinchin', 'trinhbu01@gmail.com', '$2y$10$FTGkW9Uz8iEt6evuSa2hPukSvp.gMCQLMCvoteOLPkOjp1eg1LCAK', 0, 'Trịnh Chin Chin', '149 Bành Văn Trân, p7, qTân Bình, Tp HCM', NULL, NULL, '0903629676', NULL, NULL, 1, 'jloYvYdRAUsolAXcG1dHKwKhkQJndCrTFqEercRX', '2017-04-26 06:12:44', '2017-04-26 06:12:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
