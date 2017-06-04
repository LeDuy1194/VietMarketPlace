-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2017 at 10:03 AM
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
-- Table structure for table `cates`
--

CREATE TABLE `cates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cates`
--

INSERT INTO `cates` (`id`, `name`, `alias`, `order`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Điện thoại', 'dien-thoai', 1, 0, '2017-03-16 12:52:56', '2017-03-16 12:52:56'),
(2, 'Máy tính', 'may-tinh', 2, 0, '2017-03-16 12:53:20', '2017-03-16 12:53:20'),
(3, 'Sách', 'sach', 3, 0, '2017-03-16 12:53:29', '2017-03-16 12:53:29');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cityid` varchar(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cityid`, `name`, `type`) VALUES
('79', 'Hồ Chí Minh', 'Thành Phố');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `districtid` varchar(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `cityid` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`districtid`, `name`, `type`, `location`, `cityid`) VALUES
('760', 'Quận 1', 'Quận', '10 46 34N, 106 41 45E', '79'),
('761', 'Quận 12', 'Quận', '10 51 43N, 106 39 32E', '79'),
('762', 'Quận Thủ Đức', 'Quận', '10 51 20N, 106 45 05E', '79'),
('763', 'Quận 9', 'Quận', '10 49 49N, 106 49 03E', '79'),
('764', 'Quận Gò Vấp', 'Quận', '10 50 12N, 106 39 52E', '79'),
('765', 'Quận Bình Thạnh', 'Quận', '10 48 46N, 106 42 57E', '79'),
('766', 'Quận Tân Bình', 'Quận', '10 48 13N, 106 39 03E', '79'),
('767', 'Quận Tân Phú', 'Quận', '10 47 32N, 106 37 31E', '79'),
('768', 'Quận Phú Nhuận', 'Quận', '10 48 06N, 106 40 39E', '79'),
('769', 'Quận 2', 'Quận', '10 46 51N, 106 45 25E', '79'),
('770', 'Quận 3', 'Quận', '10 46 48N, 106 40 46E', '79'),
('771', 'Quận 10', 'Quận', '10 46 25N, 106 40 02E', '79'),
('772', 'Quận 11', 'Quận', '10 46 01N, 106 38 44E', '79'),
('773', 'Quận 4', 'Quận', '10 45 42N, 106 42 09E', '79'),
('774', 'Quận 5', 'Quận', '10 45 24N, 106 40 00E', '79'),
('775', 'Quận 6', 'Quận', '10 44 46N, 106 38 10E', '79'),
('776', 'Quận 8', 'Quận', '10 43 24N, 106 37 40E', '79'),
('777', 'Quận Bình Tân', 'Quận', '10 46 16N, 106 35 26E', '79'),
('778', 'Quận 7', 'Quận', '10 44 19N, 106 43 35E', '79'),
('783', 'Quận Củ Chi', 'Huyện', '11 02 17N, 106 30 20E', '79'),
('784', 'Quận Hóc Môn', 'Huyện', '10 52 42N, 106 35 33E', '79'),
('785', 'Quận Bình Chánh', 'Huyện', '10 45 01N, 106 30 45E', '79'),
('786', 'Quận Nhà Bè', 'Huyện', '10 39 06N, 106 43 35E', '79'),
('787', 'Quận Cần Giờ', 'Huyện', '10 30 43N, 106 52 50E', '79');

-- --------------------------------------------------------

--
-- Table structure for table `favos`
--

CREATE TABLE `favos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `favos`
--

INSERT INTO `favos` (`id`, `user_id`, `order_id`, `created_at`, `updated_at`) VALUES
(2, 1, 27, '2017-05-14 18:49:05', '2017-05-14 18:49:05'),
(4, 1, 29, '2017-05-15 21:17:04', '2017-05-15 21:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `favs`
--

CREATE TABLE `favs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `stock_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `favs`
--

INSERT INTO `favs` (`id`, `user_id`, `stock_id`, `created_at`, `updated_at`) VALUES
(1, 1, 37, '2017-05-14 18:48:56', '2017-05-14 18:48:56'),
(5, 1, 31, '2017-05-14 19:36:17', '2017-05-14 19:36:17'),
(6, 1, 30, '2017-05-15 19:02:52', '2017-05-15 19:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `matchs`
--

CREATE TABLE `matchs` (
  `id` int(10) UNSIGNED NOT NULL,
  `stock_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `point` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `matchs`
--

INSERT INTO `matchs` (`id`, `stock_id`, `order_id`, `point`, `created_at`, `updated_at`) VALUES
(1, 30, 18, 100, '2017-04-10 06:35:21', '2017-04-10 06:35:21'),
(4, 42, 30, 100, '2017-04-29 06:52:01', '2017-04-29 06:52:01'),
(5, 27, 24, 100, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(6, 28, 24, 100, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(8, 31, 18, 100, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(9, 35, 24, 100, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(12, 42, 38, 50, '2017-06-04 07:43:09', '2017-06-04 07:43:09'),
(13, 43, 38, 100, '2017-06-04 07:43:09', '2017-06-04 07:43:09'),
(14, 44, 38, 100, '2017-06-04 07:43:09', '2017-06-04 07:43:09'),
(15, 45, 38, 100, '2017-06-04 07:43:09', '2017-06-04 07:43:09'),
(16, 46, 38, 100, '2017-06-04 07:43:09', '2017-06-04 07:43:09'),
(17, 47, 38, 100, '2017-06-04 07:43:09', '2017-06-04 07:43:09'),
(18, 49, 20, 100, '2017-06-04 08:00:23', '2017-06-04 08:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `match_notifications`
--

CREATE TABLE `match_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `stock_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `user_id_stock` int(10) UNSIGNED NOT NULL,
  `user_id_order` int(10) UNSIGNED NOT NULL,
  `read_stock` tinyint(4) NOT NULL DEFAULT '0',
  `read_order` tinyint(4) NOT NULL DEFAULT '0',
  `read_stock_at` timestamp NULL DEFAULT NULL,
  `read_order_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(45, '2014_10_12_000000_create_users_table', 1),
(46, '2014_10_12_100000_create_password_resets_table', 1),
(47, '2017_03_13_040246_create_cates_table', 1),
(48, '2017_03_13_041217_create_stocks_table', 1),
(49, '2017_03_13_043004_create_stockimages_table', 1),
(50, '2017_03_13_085146_create_reviews_table', 1),
(51, '2017_03_13_085722_create_orders_table', 1),
(52, '2017_03_13_090250_create_matchs_table', 1),
(53, '2017_03_23_030738_create_orderimages_table', 1),
(54, '2017_03_28_015020_create_favs_table', 2),
(55, '2017_04_10_072141_create_fav-os_table', 3),
(56, '2017_04_07_092904_create_city_table', 4),
(57, '2017_05_02_015407_create_tags_table', 5),
(58, '2017_05_02_015506_create_tag_lists_table', 5),
(59, '2017_05_15_042332_create_notifications_table', 6),
(60, '2017_05_30_183017_create_match_notifications_table', 7),
(61, '2017_06_01_110849_create_stock_notifications_table', 8),
(62, '2017_06_01_110910_create_order_notifications_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('024a4592-3264-41f6-b989-8c4fb64dafb5', 'App\\Notifications\\Matching', 5, 'App\\Models\\User', '{"message":"Tin rao b\\u00e1n c\\u1ee7a b\\u1ea1n \\u0111\\u00e3 c\\u00f3 k\\u1ebft qu\\u1ea3 matching.","action":"http:\\/\\/vietmarketplace.dev\\/match\\/stock--31"}', NULL, '2017-05-15 19:00:01', '2017-05-15 19:00:01'),
('c8783ac4-6197-4947-b167-18d7f5edec02', 'App\\Notifications\\Matching', 5, 'App\\Models\\User', '{"message":"Tin rao b\\u00e1n c\\u1ee7a b\\u1ea1n \\u0111\\u00e3 c\\u00f3 k\\u1ebft qu\\u1ea3 matching.","action":"http:\\/\\/vietmarketplace.dev\\/match\\/stock--30"}', NULL, '2017-05-15 19:00:01', '2017-05-15 19:00:01');

-- --------------------------------------------------------

--
-- Table structure for table `orderimages`
--

CREATE TABLE `orderimages` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderimages`
--

INSERT INTO `orderimages` (`id`, `image`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 'detail-asus-zenfone-3-ze520kl-64g-ram-4g-5380622130-jpg.jpg', 18, NULL, NULL),
(2, 'detail-asus-zenfone-3-ze520kl-64g-ram-4g-8294173638-jpg.jpg', 18, NULL, NULL),
(3, 'detail-tren-tay-asus-zenfone-3-4gb-ram-hnam-1.jpg', 18, NULL, NULL),
(4, 'detail-tren-tay-asus-zenfone-3-4gb-ram-hnam-1.jpg', 19, NULL, NULL),
(5, 'detail-asus-zenfone-3-ze520kl-64g-ram-4g-5380622130-jpg.jpg', 19, NULL, NULL),
(6, 'detail-asus-zenfone-3-ze520kl-64g-ram-4g-2467624056-jpg.jpg', 19, NULL, NULL),
(7, 'detail-2.jpg', 20, NULL, NULL),
(8, 'detail-3.jpg', 20, NULL, NULL),
(9, 'detail-4.jpg', 20, NULL, NULL),
(10, 'detail-4.jpg', 21, NULL, NULL),
(11, 'detail-1.jpg', 21, NULL, NULL),
(12, 'detail-2.jpg', 21, NULL, NULL),
(19, 'detail-636183647782217960_Samsung-Galaxy-J7-Prime-Pink-1-1482370626_1200x0.jpg', 24, NULL, NULL),
(20, 'detail-636183647784238046_Samsung-Galaxy-J7-Prime-Pink-6-1482370694_1200x0.jpg', 24, NULL, NULL),
(21, 'detail-636183647652760462_Samsung-Galaxy-J7-Prime-Pink-2-1482370627_1200x0.jpg', 24, NULL, NULL),
(22, 'detail-macbook pro touch bar 20161 (2).jpg', 25, NULL, NULL),
(23, 'detail-new-macbook-pro-15-inch-256gb-silver-touch-bar-mlw72--2017--4140331228-jpg.jpg', 25, NULL, NULL),
(24, 'detail-new-macbook-pro-15-inch-256gb-silver-touch-bar-mlw72--2017--3280062028-jpg.jpg', 25, NULL, NULL),
(25, 'detail-co_gai_tren_tau.jpg', 26, NULL, NULL),
(26, 'detail-Main_Poster_1__Co_Gai_Tren_Tau.jpg', 26, NULL, NULL),
(27, 'detail-wall-phim-co-gai-tren-tau.jpg', 26, NULL, NULL),
(28, 'detail-apple-new-ipad-2017-wifi-32gb-9084827132-jpg.jpg', 27, NULL, NULL),
(29, 'detail-apple-new-ipad-2017-wifi-32gb-9084827132-jpg.jpg', 27, NULL, NULL),
(30, 'detail-apple-new-ipad-2017-wifi-32gb-7406326873-jpg.jpg', 27, NULL, NULL),
(34, 'detail-macbook-air-13-3-inch-128gb---mmgf2----2016--1120151686-jpg.jpg', 29, NULL, NULL),
(35, 'detail-macbook-air-13-3-inch-128gb---mmgf2----2016--3009940386-jpg.jpg', 29, NULL, NULL),
(36, 'detail-8734.jpg', 29, NULL, NULL),
(37, 'detail-iphone-6-32gb-gold-gold-2-org.jpg', 30, NULL, NULL),
(38, 'detail-iphone-6-32gb-gold-gold-3-org.jpg', 30, NULL, NULL),
(39, 'detail-iphone-6-32gb-vang-400-400x460.png', 30, NULL, NULL),
(49, 'detail-14554.jpg', 34, NULL, NULL),
(50, 'detail-14554.jpg', 34, NULL, NULL),
(51, 'detail-14554.jpg', 34, NULL, NULL),
(52, 'detail-14554.jpg', 35, NULL, NULL),
(53, 'detail-14554.jpg', 35, NULL, NULL),
(54, 'detail-14554.jpg', 35, NULL, NULL),
(55, 'detail-201204-the-lucky-one.jpeg', 36, NULL, NULL),
(56, 'detail-201204-the-lucky-one.jpeg', 36, NULL, NULL),
(57, 'detail-9781455508976.jpg', 36, NULL, NULL),
(58, 'detail-acer-es1-431-n3060-4gb-500gb-1-700x467-win10.png', 37, NULL, NULL),
(59, 'detail-asus-e402sa-wx251t-400-400x400.png', 37, NULL, NULL),
(60, 'detail-asus-e402sa-wx134d-2.jpg', 37, NULL, NULL),
(61, 'detail-apple-iphone-7-plus-4.jpg', 38, NULL, NULL),
(62, 'detail-apple-iphone-7-plus-4.jpg', 38, NULL, NULL),
(63, 'detail-apple-iphone-7-plus-4.jpg', 38, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `place` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL,
  `finished` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `price`, `status`, `description`, `place`, `city`, `district`, `lat`, `lng`, `img`, `user_id`, `cate_id`, `finished`, `created_at`, `updated_at`) VALUES
(18, 'Asus Zenfone 3', 6000000, 0, 'Asus Zenfone 3 (5.5inch) 64GB 4GB RAM\r\nZenfone 3 chỉ sử dụng chip Snapdragon 625 tầm trung nhưng đây là dòng chip  mới dựa trên quy trình 14 nm và có 8 lõi Cortex-A53 tốc độ tối đa 2 GHz. Máy có ram 4GB và bộ nhớ trong 64GB hỗ trợ mở rộng thẻ nhớ ngoài lên đến 128GB.\r\n\r\nDòng Zenfone luôn có nhiều phiên bản có kích cỡ màn hình khác nhau cho người dùng lựa chọn và Zenfone 3 cũng có 2 kích thước màn hình với 5.5 inch và 5.2inch độ phân giải Full HD công nghệ Super IPS+. Zenfone 3 cũng là smartphone đầu tiên trong gia đình Zenfone được trang bị cổng USB Type-C với kết nối USB 2.0. ', '776 CMT8', 'Hồ Chí Minh', 'Quận Tân Bình', 10.788462, 106.661987, 'main-asus-zenfone-3-ze520kl-64g-ram-4g-2467624056-jpg.jpg', 3, 1, 0, '2017-04-10 06:25:43', '2017-04-10 06:25:43'),
(19, 'Asus Zenfone 3', 4000000, 1, 'Asus Zenfone 3 (5.5inch) 64GB 4GB RAM\r\nZenfone 3 chỉ sử dụng chip Snapdragon 625 tầm trung nhưng đây là dòng chip  mới dựa trên quy trình 14 nm và có 8 lõi Cortex-A53 tốc độ tối đa 2 GHz. Máy có ram 4GB và bộ nhớ trong 64GB hỗ trợ mở rộng thẻ nhớ ngoài lên đến 128GB.\r\n\r\nDòng Zenfone luôn có nhiều phiên bản có kích cỡ màn hình khác nhau cho người dùng lựa chọn và Zenfone 3 cũng có 2 kích thước màn hình với 5.5 inch và 5.2inch độ phân giải Full HD công nghệ Super IPS+. Zenfone 3 cũng là smartphone đầu tiên trong gia đình Zenfone được trang bị cổng USB Type-C với kết nối USB 2.0. ', '776 CMT8', 'Hồ Chí Minh', 'Quận Tân Bình', 10.788462, 106.661987, 'main-asus-zenfone-3-ze520kl-64g-ram-4g-8294173638-jpg.jpg', 3, 1, 0, '2017-04-10 06:27:03', '2017-04-10 06:27:03'),
(20, 'Truyện Đôrêmon', 200000, 0, 'Cần mua trọn bộ mới', '1025/20F Cách mạng tháng 8', 'Hồ Chí Minh', 'Quận Tân Bình', 10.789915, 106.655739, 'main-1.jpg', 5, 3, 0, '2017-04-10 06:44:07', '2017-04-10 06:44:07'),
(21, 'Doremon', 90000, 1, 'Mua trọn bộ, cũ cũng đc', '1025/20F Cách mạng tháng 8', 'Hồ Chí Minh', 'Quận Tân Bình', 10.789915, 106.655739, 'main-3.jpg', 5, 3, 0, '2017-04-10 06:45:33', '2017-04-10 06:45:33'),
(24, 'Galaxy J7 Prime', 6000000, 0, 'Can mua moi', '261 Khánh Hội', 'Hồ Chí Minh', 'Quận 4', 10.759609, 106.698318, 'main-636183647783218002_Samsung-Galaxy-J7-Prime-Pink-5-1482370688_1200x0.jpg', 6, 1, 0, '2017-04-10 07:28:12', '2017-04-10 07:28:12'),
(25, 'Macbook Pro', 55000000, 0, 'moi nguyen xach tay, bh 24 thang', '261 Khánh Hội', 'Hồ Chí Minh', 'Quận 4', 10.759609, 106.698318, 'main-new-macbook-pro-15-inch-256gb-silver-touch-bar-mlw72--2017--7237503012-jpg.jpg', 6, 2, 0, '2017-04-10 07:29:52', '2017-04-10 07:29:52'),
(26, 'Cô Gái Trên Tàu', 50000, 0, 'Cô Gái Trên Tàu', '274 Lý Thường Kiệt', 'Hồ Chí Minh', 'Quận 10', 10.778472, 106.656013, 'main-766665.jpg', 4, 3, 0, '2017-04-10 07:45:02', '2017-04-10 07:45:02'),
(27, ' iPad 2017', 5000000, 0, 'iPad 32GB wifi', '346 Bắc Hải', 'Hồ Chí Minh', 'Quận 10', 10.782456, 106.660301, 'main-apple-new-ipad-2017-wifi-32gb-7406326873-jpg.jpg', 4, 2, 0, '2017-04-10 07:48:41', '2017-04-10 07:48:41'),
(29, 'Macbook Air 2017', 35000000, 1, 'Cần gấp', '22 Cửu Long', 'Hồ Chí Minh', 'Quận 10', 10.782361, 106.661835, 'main-macbook-air-13-3-inch-128gb---mmgf2----2016--8122547143-jpg.jpg', 2, 2, 0, '2017-04-10 08:12:40', '2017-04-10 08:12:40'),
(30, 'Iphone6 32GB', 6000000, 1, 'Cũ nhưng nhìn còn mới và xài tốt là được', '1025/20F CMT8', 'Hồ Chí Minh', 'Quận Tân Bình', 10.789915, 106.655739, 'main-iphone-6-32gb-gold-gold-1-org.jpg', 7, 1, 0, '2017-04-28 06:11:13', '2017-04-28 06:11:13'),
(34, 'If Tomorrow Comes', 173000, 0, 'The international bestseller from the master of suspense. A mafia conspiracy and one women against the world. Tracy Whitey is on top of the world. Young, beautiful, intelligent, she is about to marry into wealth and glamour - until, betrayed by her own innocence, she finds herself in prison, framed by a ruthless mafia gang and abandoned by the man she loves. Beaten and broken, but surviving with her dazzling ingenuity, Tracy emerges from her savage ordeal - determined to avenge those who have destroyed her life. Her thirst for revenge takes her from New Orleans to London, from Paris to Madrid and Amsterdam. Tracy is playing for the highest stakes in a deadly game. Only one man can challenge her - he''s handsome, persuasive and every bit as daring. Only one man can stop her - an evil genius whose only hope of salvation is in Tracy''s destruction...', '268 Lý Thường Kiệt, phường 14', 'Hồ Chí Minh', 'Quận 10', 10.772150, 106.657791, 'main-14554.jpg', 1, 3, 0, '2017-06-04 07:20:00', '2017-06-04 07:20:00'),
(35, 'If Tomorrow Comes', 100000, 1, 'The international bestseller from the master of suspense. A mafia conspiracy and one women against the world. Tracy Whitey is on top of the world. Young, beautiful, intelligent, she is about to marry into wealth and glamour - until, betrayed by her own innocence, she finds herself in prison, framed by a ruthless mafia gang and abandoned by the man she loves. Beaten and broken, but surviving with her dazzling ingenuity, Tracy emerges from her savage ordeal - determined to avenge those who have destroyed her life. Her thirst for revenge takes her from New Orleans to London, from Paris to Madrid and Amsterdam. Tracy is playing for the highest stakes in a deadly game. Only one man can challenge her - he''s handsome, persuasive and every bit as daring. Only one man can stop her - an evil genius whose only hope of salvation is in Tracy''s destruction...', '268 Lý Thường Kiệt, phường 14', 'Hồ Chí Minh', 'Quận 10', 10.772139, 106.657860, 'main-14554.jpg', 1, 3, 0, '2017-06-04 07:20:57', '2017-06-04 07:20:57'),
(36, 'The Lucky One', 135000, 0, 'In his 14th book, bestselling author Nicholas Sparks tells the unforgettable story of a man whose brushes with death lead him to the love of his life.\r\n\r\nAfter U.S. Marine Logan Thibault finds a photograph of a smiling young woman buried in the dirt during his tour of duty in Iraq, he experiences a sudden streak of luck - winning poker games and even surviving deadly combat. Only his best friend, Victor, seems to have an explanation for his good fortune: the photograph - his lucky charm.\r\n\r\nBack home in Colorado, Thibault can''t seem to get the woman in the photograph out of his mind and he sets out on a journey across the country to find her. But Thibault is caught off guard by the strong attraction he feels for the woman he encounters in North Carolina - Elizabeth, a divorced mother - and he keeps the story of the photo, and his luck, a secret. As he and Elizabeth embark upon a passionate love affair, his secret soon threatens to tear them apart - destroying not only their love, but also their lives.\r\n\r\nFilled with tender romance and terrific suspense, The Lucky One is an unforgettable story about the surprising paths our lives often take and the power of fate to guide us to true and everlasting love.', '268 Lý Thường Kiệt, phường 14', 'Hồ Chí Minh', 'Quận 10', 10.772308, 106.658043, 'main-9781455508976.jpg', 1, 3, 0, '2017-06-04 07:24:11', '2017-06-04 07:24:11'),
(37, 'Laptop', 6500000, 1, '*Yêu cầu.\r\n - Màn hình: HD, không cảm ứng.\r\n - HĐH: Windows;\r\n - RAM: 4GB, HDD: 500GB;\r\n - DVD: Có.', '268 Lý Thường Kiệt, phường 14', 'Hồ Chí Minh', 'Quận 10', 10.772434, 106.657959, 'main-asus-e402sa-wx134d-2.jpg', 1, 2, 0, '2017-06-04 07:35:29', '2017-06-04 07:35:29'),
(38, 'Iphone', 24000000, 0, 'Điện thoại mới, vừa mua có thể.', '1025/20F Cách mạng tháng 8', 'Hồ Chí Minh', 'Quận Tân Bình', 10.789877, 106.655716, 'main-apple-iphone-7-plus-4.jpg', 5, 1, 0, '2017-06-04 07:43:09', '2017-06-04 07:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `order_notifications`
--

CREATE TABLE `order_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `read` tinyint(4) NOT NULL DEFAULT '0',
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_notifications`
--

INSERT INTO `order_notifications` (`id`, `order_id`, `user_id`, `read`, `read_at`, `created_at`, `updated_at`) VALUES
(1, 38, 5, 1, NULL, '2017-06-04 07:43:09', '2017-06-04 07:43:09'),
(2, 20, 5, 0, NULL, '2017-06-04 08:00:23', '2017-06-04 08:00:23');

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
(7, 24, 5, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(8, 24, 6, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(10, 25, 7, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(11, 29, 7, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(13, 27, 8, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(15, 20, 11, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(16, 21, 11, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(17, 20, 12, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(18, 21, 12, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(23, 34, 13, '2017-06-04 07:20:00', '2017-06-04 07:20:00'),
(24, 34, 19, '2017-06-04 07:20:00', '2017-06-04 07:20:00'),
(25, 34, 20, '2017-06-04 07:20:00', '2017-06-04 07:20:00'),
(26, 35, 13, '2017-06-04 07:20:57', '2017-06-04 07:20:57'),
(27, 35, 19, '2017-06-04 07:20:57', '2017-06-04 07:20:57'),
(28, 35, 20, '2017-06-04 07:20:57', '2017-06-04 07:20:57'),
(29, 36, 13, '2017-06-04 07:24:11', '2017-06-04 07:24:11'),
(30, 36, 20, '2017-06-04 07:24:11', '2017-06-04 07:24:11'),
(31, 36, 21, '2017-06-04 07:24:11', '2017-06-04 07:24:11'),
(32, 37, 22, '2017-06-04 07:35:29', '2017-06-04 07:35:29'),
(33, 38, 1, '2017-06-04 07:43:09', '2017-06-04 07:43:09'),
(34, 38, 15, '2017-06-04 07:43:09', '2017-06-04 07:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('test1@gmail.com', '2cea0a8aa69ce905f39fcaf304bb7ec34faec3f1b7153ddbb74fca44c688436a', '2017-06-04 07:05:43');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `voting_user_id` int(10) UNSIGNED NOT NULL,
  `voted_user_id` int(10) UNSIGNED NOT NULL,
  `vote` tinyint(1) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `voting_user_id`, `voted_user_id`, `vote`, `comment`, `created_at`, `updated_at`) VALUES
(1, 3, 4, 1, 'Truyện hay', '2017-04-12 07:25:44', '2017-04-12 07:25:44'),
(2, 3, 2, 1, 'Giao hàng đúng giờ, sách mới, đẹp', '2017-04-12 07:27:42', '2017-04-12 07:27:42'),
(3, 3, 6, 0, 'máy nứt, mẻ và dơ', '2017-04-12 07:29:22', '2017-04-12 07:29:22'),
(4, 3, 1, 1, 'đẹp mà mắc quá', '2017-04-12 07:31:15', '2017-04-12 07:31:15'),
(5, 3, 5, 1, 'giá tốt', '2017-04-12 07:35:14', '2017-04-12 07:35:14'),
(6, 3, 4, 1, 'máy quá đắt, khó liên lạc với người đăng', '2017-04-12 21:11:27', '2017-04-12 21:11:27'),
(7, 3, 4, 0, 'hẹn hoài không gặp', '2017-04-12 21:11:43', '2017-04-12 21:11:43'),
(8, 1, 3, 1, 'Sản phẩm nhìn tạm ổn', '2017-05-26 07:12:02', '2017-05-26 07:12:02'),
(9, 1, 4, 1, 'Bình thường.', '2017-05-26 07:24:41', '2017-05-26 07:24:41'),
(10, 1, 3, 1, 'Bình thường', '2017-05-28 21:48:45', '2017-05-28 21:48:45'),
(11, 1, 4, 1, 'testting', '2017-05-28 21:49:31', '2017-05-28 21:49:31');

-- --------------------------------------------------------

--
-- Table structure for table `stockimages`
--

CREATE TABLE `stockimages` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stock_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stockimages`
--

INSERT INTO `stockimages` (`id`, `image`, `stock_id`, `created_at`, `updated_at`) VALUES
(30, 'detail-636183647782217960_Samsung-Galaxy-J7-Prime-Pink-1-1482370626_1200x0.jpg', 27, NULL, NULL),
(31, 'detail-636183647783218002_Samsung-Galaxy-J7-Prime-Pink-5-1482370688_1200x0.jpg', 27, NULL, NULL),
(32, 'detail-636183647784238046_Samsung-Galaxy-J7-Prime-Pink-6-1482370694_1200x0.jpg', 27, NULL, NULL),
(33, 'detail-636183647652760462_Samsung-Galaxy-J7-Prime-Pink-2-1482370627_1200x0.jpg', 28, NULL, NULL),
(34, 'detail-636183647782217960_Samsung-Galaxy-J7-Prime-Pink-1-1482370626_1200x0.jpg', 28, NULL, NULL),
(35, 'detail-636183647784238046_Samsung-Galaxy-J7-Prime-Pink-6-1482370694_1200x0.jpg', 28, NULL, NULL),
(39, 'detail-tren-tay-asus-zenfone-3-4gb-ram-hnam-1.jpg', 30, NULL, NULL),
(40, 'detail-asus-zenfone-3-ze520kl-64g-ram-4g-5380622130-jpg.jpg', 30, NULL, NULL),
(41, 'detail-asus-zenfone-3-ze520kl-64g-ram-4g-2467624056-jpg.jpg', 30, NULL, NULL),
(42, 'detail-asus-zenfone-3-ze520kl-64g-ram-4g-5380622130-jpg.jpg', 31, NULL, NULL),
(43, 'detail-asus-zenfone-3-ze520kl-64g-ram-4g-8294173638-jpg.jpg', 31, NULL, NULL),
(44, 'detail-tren-tay-asus-zenfone-3-4gb-ram-hnam-1.jpg', 31, NULL, NULL),
(51, 'detail-4.jpg', 34, NULL, NULL),
(52, 'detail-2.jpg', 34, NULL, NULL),
(53, 'detail-1.jpg', 34, NULL, NULL),
(54, 'detail-636183647783218002_Samsung-Galaxy-J7-Prime-Pink-5-1482370688_1200x0.jpg', 35, NULL, NULL),
(55, 'detail-636183647783218002_Samsung-Galaxy-J7-Prime-Pink-5-1482370688_1200x0.jpg', 35, NULL, NULL),
(56, 'detail-636183647652760462_Samsung-Galaxy-J7-Prime-Pink-2-1482370627_1200x0.jpg', 35, NULL, NULL),
(57, 'detail-8734.jpg', 36, NULL, NULL),
(58, 'detail-macbook-air-13-3-inch-128gb---mmgf2----2016--8122547143-jpg.jpg', 36, NULL, NULL),
(59, 'detail-macbook-air-13-3-inch-128gb---mmgf2----2016--1120151686-jpg.jpg', 36, NULL, NULL),
(60, 'detail-tra-hoa-nu-cover-2.png', 37, NULL, NULL),
(61, 'detail-tra-hoa-nu.u335.d20160802.t142028.544772.png', 37, NULL, NULL),
(62, 'detail-tra-hoa-nu-alexandre-dumas-270x410.jpg', 37, NULL, NULL),
(75, 'detail-iphone-6-32gb-gold-gold-2-org.jpg', 42, NULL, NULL),
(76, 'detail-iphone-6-32gb-gold-gold-3-org.jpg', 42, NULL, NULL),
(77, 'detail-iphone-6-32gb-gold-gold-1-org.jpg', 42, NULL, NULL),
(78, 'detail-images.jpg', 43, NULL, NULL),
(79, 'detail-iphone-7-plus-2-400x460-400x460.png', 43, NULL, NULL),
(80, 'detail-tai xuong.jpg', 43, NULL, NULL),
(81, 'detail-images.jpg', 44, NULL, NULL),
(82, 'detail-iphone-7-plus-2-400x460-400x460.png', 44, NULL, NULL),
(83, 'detail-tai xuong.jpg', 44, NULL, NULL),
(84, 'detail-iphone-7-plus-2-400x460-400x460.png', 45, NULL, NULL),
(85, 'detail-tai xuong.jpg', 45, NULL, NULL),
(86, 'detail-apple-iphone-7-plus-4.jpg', 45, NULL, NULL),
(87, 'detail-images (1).jpg', 46, NULL, NULL),
(88, 'detail-iphone7plus-model-select-201703_AV3.jpg', 46, NULL, NULL),
(89, 'detail-tai xuong (1).jpg', 46, NULL, NULL),
(90, 'detail-images (1).jpg', 47, NULL, NULL),
(91, 'detail-iphone7plus-model-select-201703_AV3.jpg', 47, NULL, NULL),
(92, 'detail-tai xuong (1).jpg', 47, NULL, NULL),
(93, 'detail-comparison-phones-s8+.jpg', 48, NULL, NULL),
(94, 'detail-samsung-galaxy-s8-plus-4-400x460.png', 48, NULL, NULL),
(95, 'detail-images (2).jpg', 48, NULL, NULL),
(96, 'detail-0.jpg', 49, NULL, NULL),
(97, 'detail-8-fahasa-3-644d6.jpg', 49, NULL, NULL),
(98, 'detail-tai xuong (3).jpg', 49, NULL, NULL),
(99, 'detail-0.jpg', 50, NULL, NULL),
(100, 'detail-8-fahasa-3-644d6.jpg', 50, NULL, NULL),
(101, 'detail-tai xuong (3).jpg', 50, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `place` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL,
  `finished` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `name`, `price`, `status`, `description`, `place`, `city`, `district`, `lat`, `lng`, `img`, `user_id`, `cate_id`, `finished`, `created_at`, `updated_at`) VALUES
(27, 'Samsung Galaxy J7 Prime', 5990000, 0, '“Kẻ hủy diệt” Galaxy J7 Prime xứng đáng là 1 đối thủ đáng gòm trong phân khúc giá tầm trung. Được trang bị màn hình TFT, kích thước 5.5 inch, độ phân giải full HD. Máy sử dụng chip Exynos 7870 8 nhân tốc độ 1,6 GHz, RAM 3 GB và bộ nhớ trong 32 GB, viên pin 3.300 mAh. Máy chạy hệ điều hành Android 6.0.', '776 CMT8', 'Hồ Chí Minh', 'Quận Tân Bình', 10.788462, 106.661987, 'main-636183647652760462_Samsung-Galaxy-J7-Prime-Pink-2-1482370627_1200x0.jpg', 3, 1, 0, '2017-04-10 06:15:04', '2017-04-10 06:15:04'),
(28, 'Samsung Galaxy J7 Prime', 4490000, 1, '“Kẻ hủy diệt” Galaxy J7 Prime xứng đáng là 1 đối thủ đáng gòm trong phân khúc giá tầm trung. Được trang bị màn hình TFT, kích thước 5.5 inch, độ phân giải full HD. Máy sử dụng chip Exynos 7870 8 nhân tốc độ 1,6 GHz, RAM 3 GB và bộ nhớ trong 32 GB, viên pin 3.300 mAh. Máy chạy hệ điều hành Android 6.0.', '776 CMT8', 'Hồ Chí Minh', 'Quận Tân Bình', 10.788462, 106.661987, 'main-636183647783218002_Samsung-Galaxy-J7-Prime-Pink-5-1482370688_1200x0.jpg', 3, 1, 0, '2017-04-10 06:17:50', '2017-04-10 06:17:50'),
(30, 'Asus Zenfone 3', 6000000, 0, 'Asus Zenfone 3 (5.5inch) 64GB 4GB RAM', '1025/12A CMT8', 'Hồ Chí Minh', 'Quận Tân Bình', 10.790515, 106.656189, 'main-asus-zenfone-3-ze520kl-64g-ram-4g-2467624056-jpg.jpg', 5, 1, 0, '2017-04-10 06:35:21', '2017-04-10 06:35:21'),
(31, 'Asus Zenfone 3', 5000000, 1, 'Asus Zenfone 3 (5.5inch) 64GB 4GB RAM', '1025/12A CMT8', 'Hồ Chí Minh', 'Quận Tân Bình', 10.790515, 106.656189, 'main-asus-zenfone-3-ze520kl-64g-ram-4g-2467624056-jpg.jpg', 5, 1, 0, '2017-04-10 06:37:49', '2017-04-10 06:37:49'),
(34, 'bo truyen doremon', 240000, 0, 'bo moi gia re', '261 Khánh Hội', 'Hồ Chí Minh', 'Quận 4', 10.759609, 106.698318, 'main-3.jpg', 6, 3, 0, '2017-04-10 07:25:22', '2017-04-10 07:25:22'),
(35, 'Samsung J7 Prime', 5500000, 1, 'mua dc 1 thang', '261 Khánh Hội', 'Hồ Chí Minh', 'Quận 4', 10.759609, 106.698318, 'main-636183647784238046_Samsung-Galaxy-J7-Prime-Pink-6-1482370694_1200x0.jpg', 6, 1, 0, '2017-04-10 07:27:03', '2017-04-10 07:27:03'),
(36, 'Macbook Air', 20000000, 0, 'Macbook Air 13.3 inch 128GB', '268 Lý Thường Kiệt', 'Hồ Chí Minh', 'Quận 10', 10.772168, 106.657883, 'main-macbook-air-13-3-inch-128gb---mmgf2----2016--3009940386-jpg.jpg', 4, 2, 0, '2017-04-10 07:34:13', '2017-04-10 07:34:13'),
(37, 'Trà Hoa Nữ', 49000, 0, 'Nội dung Trà hoa nữ kể về mối tình bất thành của anh nhà giàu Duval với cô kỹ nữ Marguerite, một đề tài tưởng đâu là quen thuộc, nhưng bằng ngòi bút sắc sảo cộng với tình cảm bao dung mà tác giả muốn truyền tải, truyện được độc giả đón nhận không ngần ngại, dù là giới quý tộc, cái giới bị hạ thấp hơn cả cô kỹ nữ trong truyện. Mặc dù Marguerite sống bằng nghề kỹ nữ nhưng trái với nghề của mình, Marguerite là người có tâm hồn và cá tính; nàng có lòng vị tha, biết hi sinh bản thân mình cho người mình yêu. Marguerite Gautier trong truyện được viết dựa trên hình mẫu của Marie Duplessis, người yêu của chính tác giả.', '266 Lý Thường Kiệt', 'Hồ Chí Minh', 'Quận 10', 10.791725, 106.652763, 'main-tra-hoa-nu-ebook.jpg', 4, 3, 0, '2017-04-10 07:41:19', '2017-04-10 07:41:19'),
(42, 'Iphone6 32GB', 6500000, 1, 'Mới mua 4 tháng, không bị trầy xướt, nhìn còn mới', '30 Vân Côi', 'Hồ Chí Minh', 'Quận Tân Bình', 10.785773, 106.656792, 'main-iphone-6-32gb-vang-400-400x460.png', 3, 1, 0, '2017-04-29 06:52:01', '2017-04-29 06:52:01'),
(43, 'iPhone 7 Plus', 21990000, 0, 'Trong hộp có: sạc, tai nghe, sách hướng dẫn, jack chuyển tai nghe 3.5mm, cáp, cây lấy sim.\r\nBảo hành chính hãng: thân máy 12 tháng, sạc 12 tháng, tai nghe 12 tháng.', '268 Lý Thường Kiệt, phường 14', 'Hồ Chí Minh', 'Quận 10', 10.772110, 106.657753, 'main-apple-iphone-7-plus-4.jpg', 1, 1, 0, '2017-06-04 05:57:22', '2017-06-04 05:57:22'),
(44, 'iPhone 7 Plus', 22990000, 0, '*Thông số kỹ thuật:\r\n  - Màn hình: 5.5", Retina HD;\r\n  - HĐH: iOS 10;\r\n  - CPU: Apple A10 Fushion 4 nhân;\r\n  - RAM: 3GB, ROM: 32GB;\r\n  - Camera: Hai camera 12MP, Selfie: 7MP;\r\n  - PIN: 2900mAh, SIM: 1 SIM.\r\n*Trong hộp có: sạc, tai nghe, sách hướng dẫn, jack chuyển tai nghe 3.5mm, cáp, cây lấy sim.', '268 Lý Thường Kiệt, phường 14', 'Hồ Chí Minh', 'Quận 10', 10.772350, 106.657959, 'main-apple-iphone-7-plus-4.jpg', 1, 1, 0, '2017-06-04 06:02:50', '2017-06-04 06:02:50'),
(45, 'iPhone 7 Plus', 20990000, 0, '*Thông số kỹ thuật:\r\n  - Màn hình: 5.5", Retina HD;\r\n  - HĐH: iOS 10;\r\n  - CPU: Apple A10 Fushion 4 nhân;\r\n  - RAM: 3GB, ROM: 32GB;\r\n  - Camera: Hai camera 12MP, Selfie: 7MP;\r\n  - PIN: 2900mAh, SIM: 1 SIM.\r\n*Trong hộp có: sạc, tai nghe, sách hướng dẫn, jack chuyển tai nghe 3.5mm, cáp, cây lấy sim.', '268 Lý Thường Kiệt, phường 14', 'Hồ Chí Minh', 'Quận 10', 10.772150, 106.657799, 'main-images.jpg', 1, 1, 0, '2017-06-04 06:05:06', '2017-06-04 06:05:06'),
(46, 'iPhone 7 Plus Red 128GB', 23990000, 0, '*Thông số kỹ thuật:\r\n  - Màn hình: 5.5", Retina HD;\r\n  - HĐH: iOS 10;\r\n  - CPU: Apple A10 Fushion 4 nhân;\r\n  - RAM: 3GB, ROM: 128GB;\r\n  - Camera: Hai camera 12MP, Selfie: 7MP;\r\n  - PIN: 2900mAh, SIM: 1 SIM.\r\n*Trong hộp có: sạc, tai nghe, sách hướng dẫn, jack chuyển tai nghe 3.5mm, cáp, cây lấy sim.', '268 Lý Thường Kiệt, phường 14', 'Hồ Chí Minh', 'Quận 10', 10.772171, 106.657822, 'main-iphone-7-plus-red-128gb-400x460.png', 1, 1, 0, '2017-06-04 06:50:57', '2017-06-04 06:50:57'),
(47, 'iPhone 7 Plus Red 128GB', 24990000, 0, '*Thông số kỹ thuật:\r\n  - Màn hình: 5.5", Retina HD;\r\n  - HĐH: iOS 10;\r\n  - CPU: Apple A10 Fushion 4 nhân;\r\n  - RAM: 3GB, ROM: 128GB;\r\n  - Camera: Hai camera 12MP, Selfie: 7MP;\r\n  - PIN: 2900mAh, SIM: 1 SIM.\r\n*Trong hộp có: sạc, tai nghe, sách hướng dẫn, jack chuyển tai nghe 3.5mm, cáp, cây lấy sim.', '268 Lý Thường Kiệt, phường 14', 'Hồ Chí Minh', 'Quận 10', 10.772187, 106.657806, 'main-iphone-7-plus-red-128gb-400x460.png', 1, 1, 0, '2017-06-04 06:51:23', '2017-06-04 06:51:23'),
(48, 'Samsung Galaxy S8 Plus', 20490000, 0, '*Thông số kỹ thuật:\r\n  - Màn hình: 6.2", Quad HD;\r\n  - HĐH: Android 7.0;\r\n  - CPU: Exynos 8892 8 nhân;\r\n  - RAM: 4GB, ROM: 64GB;\r\n  - Camera: 12MP, Selfie: 8MP;\r\n  - PIN: 3500mAh, SIM: 2 SIM Nano.\r\n*Trong hộp có: sạc, tai nghe, sách hướng dẫn, cáp OTG(đầu chuyển micro USB sang USB Type-C), cáp, cây lấy sim.', '268 Lý Thường Kiệt, phường 14', 'Hồ Chí Minh', 'Quận 10', 10.772160, 106.657784, 'main-tai xuong (2).jpg', 1, 1, 0, '2017-06-04 06:59:25', '2017-06-04 06:59:25'),
(49, 'Doremon Trọn bộ 45 tập', 200000, 1, 'Doremon là bộ truyện ăn khách nhất trên thế giới được nhiều người biết đến và yêu thích kể người lớn lẫn trẻ con.\r\nBộ truyện dành cho những đọc giả có mong muốn sưu tầm.\r\nCả bộ 45 tập gồm cả truyện dài và các truyện ngắn đầy thú vị.', '268 Lý Thường Kiệt, phường 14', 'Hồ Chí Minh', 'Quận 10', 10.772160, 106.657791, 'main-full_592715056f3e0c872e680a642e43a336.jpg', 2, 3, 0, '2017-06-04 08:00:23', '2017-06-04 08:00:23'),
(50, 'Doremon Trọn bộ 45 tập', 300000, 0, 'Doremon là bộ truyện ăn khách nhất trên thế giới được nhiều người biết đến và yêu thích kể người lớn lẫn trẻ con.\r\nBộ truyện dành cho những đọc giả có mong muốn sưu tầm.\r\nCả bộ 45 tập gồm cả truyện dài và các truyện ngắn đầy thú vị.', '268 Lý Thường Kiệt, phường 14', 'Hồ Chí Minh', 'Quận 10', 10.772153, 106.657791, 'main-full_592715056f3e0c872e680a642e43a336.jpg', 2, 3, 0, '2017-06-04 08:01:17', '2017-06-04 08:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `stock_notifications`
--

CREATE TABLE `stock_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `stock_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `read` tinyint(4) NOT NULL DEFAULT '0',
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stock_notifications`
--

INSERT INTO `stock_notifications` (`id`, `stock_id`, `user_id`, `read`, `read_at`, `created_at`, `updated_at`) VALUES
(1, 28, 3, 1, NULL, '2017-06-03 10:11:58', '2017-06-03 10:14:50'),
(2, 35, 6, 1, NULL, '2017-06-03 10:11:58', '2017-06-03 10:14:50'),
(3, 42, 3, 1, NULL, '2017-06-04 07:43:09', '2017-06-04 07:43:09'),
(4, 43, 1, 1, NULL, '2017-06-04 07:43:09', '2017-06-04 07:43:09'),
(5, 44, 1, 1, NULL, '2017-06-04 07:43:09', '2017-06-04 07:43:09'),
(6, 45, 1, 1, NULL, '2017-06-04 07:43:09', '2017-06-04 07:43:09'),
(7, 46, 1, 1, NULL, '2017-06-04 07:43:09', '2017-06-04 07:43:09'),
(8, 47, 1, 1, NULL, '2017-06-04 07:43:09', '2017-06-04 07:43:09'),
(9, 49, 2, 1, '2017-06-04 08:01:31', '2017-06-04 08:00:23', '2017-06-04 08:00:23');

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
(14, 34, 11, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(15, 34, 12, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(20, 36, 7, '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(21, 43, 1, '2017-06-04 05:57:22', '2017-06-04 05:57:22'),
(22, 43, 3, '2017-06-04 05:57:22', '2017-06-04 05:57:22'),
(23, 43, 15, '2017-06-04 05:57:23', '2017-06-04 05:57:23'),
(24, 44, 1, '2017-06-04 06:02:50', '2017-06-04 06:02:50'),
(25, 44, 3, '2017-06-04 06:02:50', '2017-06-04 06:02:50'),
(26, 44, 15, '2017-06-04 06:02:50', '2017-06-04 06:02:50'),
(27, 45, 1, '2017-06-04 06:05:06', '2017-06-04 06:05:06'),
(28, 45, 3, '2017-06-04 06:05:06', '2017-06-04 06:05:06'),
(29, 45, 15, '2017-06-04 06:05:06', '2017-06-04 06:05:06'),
(30, 46, 1, '2017-06-04 06:50:57', '2017-06-04 06:50:57'),
(31, 46, 15, '2017-06-04 06:50:57', '2017-06-04 06:50:57'),
(32, 46, 16, '2017-06-04 06:50:57', '2017-06-04 06:50:57'),
(33, 47, 1, '2017-06-04 06:51:23', '2017-06-04 06:51:23'),
(34, 47, 15, '2017-06-04 06:51:23', '2017-06-04 06:51:23'),
(35, 47, 16, '2017-06-04 06:51:23', '2017-06-04 06:51:23'),
(36, 48, 5, '2017-06-04 06:59:25', '2017-06-04 06:59:25'),
(37, 48, 17, '2017-06-04 06:59:25', '2017-06-04 06:59:25'),
(38, 48, 18, '2017-06-04 06:59:25', '2017-06-04 06:59:25'),
(39, 49, 12, '2017-06-04 08:00:23', '2017-06-04 08:00:23'),
(40, 49, 11, '2017-06-04 08:00:23', '2017-06-04 08:00:23'),
(41, 50, 12, '2017-06-04 08:01:17', '2017-06-04 08:01:17'),
(42, 50, 11, '2017-06-04 08:01:17', '2017-06-04 08:01:17');

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
(14, 'IELTS', 'ielts', '2017-05-14 17:00:00', '2017-05-14 17:00:00'),
(15, '7 plus', '7-plus', '2017-06-04 05:57:22', '2017-06-04 05:57:22'),
(16, '128gb', '128gb', '2017-06-04 06:50:57', '2017-06-04 06:50:57'),
(17, 'Galaxy', 'galaxy', '2017-06-04 06:59:25', '2017-06-04 06:59:25'),
(18, 's8 plus', 's8-plus', '2017-06-04 06:59:25', '2017-06-04 06:59:25'),
(19, 'sydney sheldon', 'sydney-sheldon', '2017-06-04 07:20:00', '2017-06-04 07:20:00'),
(20, 'tieng anh', 'tieng-anh', '2017-06-04 07:20:00', '2017-06-04 07:20:00'),
(21, 'nicholas sparks', 'nicholas-sparks', '2017-06-04 07:24:11', '2017-06-04 07:24:11'),
(22, 'laptop', 'laptop', '2017-06-04 07:35:29', '2017-06-04 07:35:29');

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
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `level`, `fullname`, `address`, `city`, `district`, `phone`, `dob`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'leduy', 'leduy211194@gmail.com', '$2y$10$9rZx5aZ5Y72XFMKrOX0K3eosbeJ.QDEnw65kLr2Ewijg3pzOhBmae', 2, 'Nguyen Le Duy', '55/24/14 Thành Mỹ, quận 10, TP HCM', NULL, NULL, '0165 353 9575', '1994-11-21', '1_leduy.jpg', 'oUo53AAcqT998PvkZS98oFr3KcbpCSogBAiBMMXJ4dnevfRcf7HWAZr1Fnb9', '2017-03-27 19:15:47', '2017-06-04 07:35:59'),
(2, 'bipham', 'nobikun1412@gmail.com', '$2y$10$CmEr27d5SbV5Dlaxx6gf5OIsm0sOrU0cXiPnJ8DaYEUC0sgvu09F.', 2, 'Phạm Tuấn Anh', NULL, NULL, NULL, '01223530707', NULL, 'anh.jpg', '2577erlWdaNkxHzpWKNIPN64aLyOXIHtnPzD0XnjcNOrxxei0obnHdL21TZU', '2017-03-21 01:26:32', '2017-06-04 08:02:19'),
(3, 'choutruong', 'choutruong@gmail.com', '$2y$10$CeakwJ6Is8SFqNCaZdKK/eETCsvOunYfjKdmdPjN/4oljqe7HWFZi', 2, 'Trương Triệu Hải', '1025/12A CMT8 p7 qTB', NULL, NULL, '0903629676', NULL, 'chou.png', 'KmeasdDguDzJZgOZnmS8GrNcYwqthGjJanxd5yjHQWneh21IwvpeJ6CkiObS', '2017-03-22 00:51:17', '2017-05-18 02:30:28'),
(4, 'gvhd', 'ltkt@gmail.com', '$2y$10$sZOhWoq4almHEL.dddkufeC2qd8onJoGQ47/zwVzte46vVTl3t48.', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'ltkt.jpg', 'q7KJDWDmxdlixLnYGDDy3nVNi1uK88Ne8yj8iRhHUmbkiHuBb7AWODNMJadx', '2017-03-23 17:50:16', '2017-05-18 01:29:12'),
(5, 'test1', 'test1@gmail.com', '$2y$10$aM0uq7ZRfuIOadrd8N6MlOcpD2N18PJb2q2YR1JhC2KhmEAIFyPtG', 0, 'hnam', '119 - 3 Tháng 2', NULL, NULL, '0903629666', NULL, 'tes1.jpg', 'm18r4QoBQFwdZSnofCsiD719ROx07cLBL2ec2QiOjYS2Xb1fQinTBIzHVe2e', '2017-04-10 06:05:48', '2017-06-04 07:44:28'),
(6, 'test2', 'test2@gmail.com', '$2y$10$bxJ3MoHiGulMS9KLSPKe5.gnG6fali63TOm7OW2Hpzx2HTgeO/iqW', 0, 'ragnarok', '52 Út Tịch, phường 4', NULL, NULL, '0903456789', NULL, 'test2.jpg', 'B3PrDqQ0GDmim9l1pGqthTlhd8VxtFuvBzApWTMqGEK59JAIh6lSokd8zGPg', '2017-04-10 06:06:04', '2017-05-30 00:20:29'),
(7, 'chinchin', 'trinhbu01@gmail.com', '$2y$10$FTGkW9Uz8iEt6evuSa2hPukSvp.gMCQLMCvoteOLPkOjp1eg1LCAK', 0, 'Trịnh Chin Chin', '149 Bành Văn Trân, p7, qTân Bình, Tp HCM', NULL, NULL, '0903629676', NULL, NULL, 'jloYvYdRAUsolAXcG1dHKwKhkQJndCrTFqEercRX', '2017-04-26 06:12:44', '2017-04-26 06:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `wardid` varchar(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `districtid` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ward`
--

INSERT INTO `ward` (`wardid`, `name`, `type`, `location`, `districtid`) VALUES
('26734', 'Tân Định', 'Phường', '10 47 36N, 106 41 19E', '760'),
('26737', 'Đa Kao', 'Phường', '10 47 21N, 106 41 49E', '760'),
('26740', 'Bến Nghé', 'Phường', '10 46 56N, 106 42 10E', '760'),
('26743', 'Bến Thành', 'Phường', '10 46 30N, 106 41 32E', '760'),
('26746', 'Nguyễn Thái Bình', 'Phường', '10 46 08N, 106 42 02E', '760'),
('26749', 'Phạm Ngũ Lão', 'Phường', '10 46 07N, 106 21 20E', '760'),
('26752', 'Cầu Ông Lãnh', 'Phường', '10 45 59N, 106 41 44E', '760'),
('26755', 'Cô Giang', 'Phường', '10 45 48N, 106 41 29E', '760'),
('26758', 'Nguyễn Cư Trinh', 'Phường', '10 45 48N, 106 41 07E', '760'),
('26761', 'Cầu Kho', 'Phường', '10 45 30N, 106 41 12E', '760'),
('26764', 'Thạnh Xuân', 'Phường', '10 52 46N, 106 40 10E', '761'),
('26767', 'Thạnh Lộc', 'Phường', '10 52 42N, 106 41 04E', '761'),
('26770', 'Hiệp Thành', 'Phường', '10 52 52N, 106 38 07E', '761'),
('26773', 'Thới An', 'Phường', '10 52 36N, 106 39 16E', '761'),
('26776', 'Tân Chánh Hiệp', 'Phường', '10 51 54N, 106 37 27E', '761'),
('26779', 'An Phú Đông', 'Phường', '10 51 06N, 106 41 50E', '761'),
('26782', 'Tân Thới Hiệp', 'Phường', '10 51 47N, 106 38 20E', '761'),
('26785', 'Trung Mỹ Tây', 'Phường', '10 51 21N, 106 36 57E', '761'),
('26787', 'Tân Hưng Thuận', 'Phường', '', '761'),
('26788', 'Đông Hưng Thuận', 'Phường', '10 50 29N, 106 37 38E', '761'),
('26791', 'Tân Thới Nhất', 'Phường', '10 49 53N, 106 36 49E', '761'),
('26794', 'Linh Xuân', 'Phường', '10 52 56N, 106 46 08E', '762'),
('26797', 'Bình Chiểu', 'Phường', '10 53 03N, 106 43 49E', '762'),
('26800', 'Linh Trung', 'Phường', '10 51 50N, 106 46 58E', '762'),
('26803', 'Tam Bình', 'Phường', '10 52 04N, 106 44 03E', '762'),
('26806', 'Tam Phú', 'Phường', '10 51 29N, 106 44 19E', '762'),
('26809', 'Hiệp Bình Phước', 'Phường', '10 51 15N, 106 43 11E', '762'),
('26812', 'Hiệp Bình Chánh', 'Phường', '10 50 24N, 106 43 19E', '762'),
('26815', 'Linh Chiểu', 'Phường', '10 51 23N, 106 45 45E', '762'),
('26818', 'Linh Tây', 'Phường', '10 51 33N, 106 45 16E', '762'),
('26821', 'Linh Đông', 'Phường', '10 50 52N, 106 44 39E', '762'),
('26824', 'Bình Thọ', 'Phường', '10 50 43N, 106 45 51E', '762'),
('26827', 'Trường Thọ', 'Phường', '10 49 59N, 106 45 18E', '762'),
('26830', 'Long Bình', 'Phường', '10 51 57N, 106 49 57E', '763'),
('26833', 'Long Thạnh Mỹ', 'Phường', '10 51 13N, 106 49 05E', '763'),
('26836', 'Tân Phú', 'Phường', '10 51 40N, 106 47 53E', '763'),
('26839', 'Hiệp Phú', 'Phường', '10 50 56N, 106 46 45E', '763'),
('26842', 'Tăng Nhơn Phú A', 'Phường', '10 50 37N, 106 47 29E', '763'),
('26845', 'Tăng Nhơn Phú B', 'Phường', '10 49 50N, 106 47 11E', '763'),
('26848', 'Phước Long B', 'Phường', '10 49 07N, 106 46 39E', '763'),
('26851', 'Phước Long A', 'Phường', '10 49 22N, 106 45 44E', '763'),
('26854', 'Trường Thạnh', 'Phường', '10 48 26N, 106 49 04E', '763'),
('26857', 'Long Phước', 'Phường', '10 48 17N, 106 51 20E', '763'),
('26860', 'Long Trường', 'Phường', '10 47 39N, 106 49 13E', '763'),
('26863', 'Phước Bình', 'Phường', '10 48 57N, 106 46 14E', '763'),
('26866', 'Phú Hữu', 'Phường', '10 47 55N, 106 48 02E', '763'),
('26869', '15', 'Phường', '10 51 13N, 106 40 08E', '764'),
('26872', '13', 'Phường', '10 51 23N, 106 39 22E', '764'),
('26875', '17', 'Phường', '10 50 33N, 106 40 41E', '764'),
('26876', '6', 'Phường', '', '764'),
('26878', '16', 'Phường', '10 50 47N, 106 39 46E', '764'),
('26881', '12', 'Phường', '10 50 41N, 106 38 33E', '764'),
('26882', '14', 'Phường', '10 49 59N, 106 40 11E', '764'),
('26884', '10', 'Phường', '10 49 50N, 106 41 26E', '764'),
('26887', '05', 'Phường', '10 49 50N, 106 41 26E', '764'),
('26890', '07', 'Phường', '10 49 47N, 106 40 55E', '764'),
('26893', '04', 'Phường', '10 49 18N, 106 41 01E', '764'),
('26896', '01', 'Phường', '10 49 01N, 106 41 11E', '764'),
('26897', '9', 'Phường', '', '764'),
('26898', '8', 'Phường', '', '764'),
('26899', '11', 'Phường', '10 50 24N, 106 39 14E', '764'),
('26902', '03', 'Phường', '10 49 11N, 106 40 37E', '764'),
('26905', '13', 'Phường', '10 49 43N, 106 42 07E', '765'),
('26908', '11', 'Phường', '10 48 59N, 106 41 32E', '765'),
('26911', '27', 'Phường', '10 48 58N, 106 43 05E', '765'),
('26914', '26', 'Phường', '10 48 52N, 106 42 31E', '765'),
('26917', '12', 'Phường', '10 48 48N, 106 41 58E', '765'),
('26920', '25', 'Phường', '10 48 25N, 106 43 02E', '765'),
('26923', '05', 'Phường', '10 48 47N, 106 41 08E', '765'),
('26926', '07', 'Phường', '10 48 29N, 106 41 23E', '765'),
('26929', '24', 'Phường', '10 48 23N, 106 42 11E', '765'),
('26932', '06', 'Phường', '10 48 25N, 106 41 10E', '765'),
('26935', '14', 'Phường', '10 48 29N, 106 41 40E', '765'),
('26938', '15', 'Phường', '10 47 58N, 106 42 10E', '765'),
('26941', '02', 'Phường', '10 47 59N, 106 41 56E', '765'),
('26944', '01', 'Phường', '10 47 57N, 106 41 45E', '765'),
('26947', '03', 'Phường', '10 47 58N, 106 41 29E', '765'),
('26950', '17', 'Phường', '10 47 51N, 106 42 14E', '765'),
('26953', '21', 'Phường', '10 47 52N, 106 42 39E', '765'),
('26956', '22', 'Phường', '10 47 37N, 106 43 05E', '765'),
('26959', '19', 'Phường', '10 47 32N, 106 42 29E', '765'),
('26962', '28', 'Phường', '10 49 22N, 106 44 07E', '765'),
('26965', '02', 'Phường', '10 48 28N, 106 39 56E', '766'),
('26968', '04', 'Phường', '10 48 17N, 106 39 22E', '766'),
('26971', '12', 'Phường', '10 48 06N, 106 38 52E', '766'),
('26974', '13', 'Phường', '10 48 16N, 106 38 22E', '766'),
('26977', '01', 'Phường', '10 47 48N, 106 39 53E', '766'),
('26980', '03', 'Phường', '10 47 41N, 106 39 38E', '766'),
('26983', '11', 'Phường', '10 47 26N, 106 38 45E', '766'),
('26986', '07', 'Phường', '10 47 23N, 106 39 17E', '766'),
('26989', '05', 'Phường', '10 47 24N, 106 39 37E', '766'),
('26992', '10', 'Phường', '10 46 56N, 106 38 40E', '766'),
('26995', '06', 'Phường', '10 47 04N, 106 39 27E', '766'),
('26998', '08', 'Phường', '10 47 08N, 106 39 02E', '766'),
('27001', '09', 'Phường', '10 36 32N, 106 39 00E', '766'),
('27004', '14', 'Phường', '10 47 42N, 106 38 17E', '766'),
('27007', '15', 'Phường', '10 49 16N, 106 39 03E', '766'),
('27010', 'Tân Sơn Nhì', 'Phường', '10 48 00N, 106 37 49E', '767'),
('27013', 'Tây Thạnh', 'Phường', '10 48 53N, 106 37 10E', '767'),
('27016', 'Sơn Kỳ', 'Phường', '10 48 05N, 106 37 04E', '767'),
('27019', 'Tân Quý', 'Phường', '10 47 44N, 106 37 11E', '767'),
('27022', 'Tân Thành', 'Phường', '10 47 32N, 106 37 55E', '767'),
('27025', 'Phú Thọ Hoà', 'Phường', '10 47 10N, 106 37 30E', '767'),
('27028', 'Phú Thạnh', 'Phường', '10 46 57N, 106 37 34E', '767'),
('27031', 'Phú Trung', 'Phường', '10 46 40N, 106 38 23E', '767'),
('27034', 'Hoà Thạnh', 'Phường', '10 46 45N, 106 38 05E', '767'),
('27037', 'Hiệp Tân', 'Phường', '10 46 08N, 106 37 36E', '767'),
('27040', 'Tân Thới Hoà', 'Phường', '10 45 55N, 106 37 39E', '767'),
('27043', '04', 'Phường', '10 48 31N, 106 40 39E', '768'),
('27046', '05', 'Phường', '10 48 29N, 106 40 55E', '768'),
('27049', '09', 'Phường', '10 48 27N, 106 40 19E', '768'),
('27052', '07', 'Phường', '10 48 05N, 106 41 11E', '768'),
('27055', '03', 'Phường', '10 48 10N, 106 40 47E', '768'),
('27058', '01', 'Phường', '10 47 59N, 106 40 49E', '768'),
('27061', '02', 'Phường', '10 47 56N, 106 41 08E', '768'),
('27064', '08', 'Phường', '10 47 54N, 106 40 23E', '768'),
('27067', '15', 'Phường', '10 47 50N, 106 40 40E', '768'),
('27070', '10', 'Phường', '10 47 46N, 106 40 10E', '768'),
('27073', '11', 'Phường', '10 47 39N, 106 40 21E', '768'),
('27076', '17', 'Phường', '10 47 41N, 106 40 52E', '768'),
('27079', '14', 'Phường', '10 47 34N, 106 40 00E', '768'),
('27082', '12', 'Phường', '10 47 37N, 106 40 37E', '768'),
('27085', '13', 'Phường', '10 47 27N, 106 40 06E', '768'),
('27088', 'Thảo Điền', 'Phường', '10 48 36N, 106 44 00E', '769'),
('27091', 'An Phú', 'Phường', '10 47 55N, 106 45 17E', '769'),
('27094', 'Bình An', 'Phường', '10 47 31N, 106 43 39E', '769'),
('27097', 'Bình Trưng Đông', 'Phường', '10 47 07N, 106 46 36E', '769'),
('27100', 'Bình Trưng Tây', 'Phường', '10 47 00N, 106 44 59E', '769'),
('27103', 'Bình Khánh', 'Phường', '10 47 02N, 106 44 05E', '769'),
('27106', 'An Khánh', 'Phường', '10 46 54N, 106 42 57E', '769'),
('27109', 'Cát Lái', 'Phường', '10 46 11N, 106 46 59E', '769'),
('27112', 'Thạnh Mỹ Lợi', 'Phường', '10 45 47N, 106 45 56E', '769'),
('27115', 'An Lợi Đông', 'Phường', '10 46 14N, 106 43 23E', '769'),
('27118', 'Thủ Thiêm', 'Phường', '10 46 19N, 106 42 54E', '769'),
('27121', '08', 'Phường', '10 47 23N, 106 41 05E', '770'),
('27124', '07', 'Phường', '10 47 05N, 106 41 04E', '770'),
('27127', '14', 'Phường', '10 47 23N, 106 40 36E', '770'),
('27130', '12', 'Phường', '10 47 20N, 106 40 19E', '770'),
('27133', '11', 'Phường', '10 47 17N, 106 40 05E', '770'),
('27136', '13', 'Phường', '10 47 15N, 106 40 36E', '770'),
('27139', '06', 'Phường', '10 46 53N, 106 41 23E', '770'),
('27142', '09', 'Phường', '10 46 59N, 106 40 38E', '770'),
('27145', '10', 'Phường', '10 46 57N, 106 40 25E', '770'),
('27148', '04', 'Phường', '10 46 30N, 106 40 51E', '770'),
('27151', '05', 'Phường', '10 46 21N, 106 41 02E', '770'),
('27154', '03', 'Phường', '10 46 17N, 106 40 39E', '770'),
('27157', '02', 'Phường', '10 46 07N, 106 40 47E', '770'),
('27160', '01', 'Phường', '10 46 10N, 106 40 31E', '770'),
('27163', '15', 'Phường', '10 46 58N, 106 39 52E', '771'),
('27166', '13', 'Phường', '10 46 48N, 106 40 08E', '771'),
('27169', '14', 'Phường', '10 46 27N, 106 39 34E', '771'),
('27172', '12', 'Phường', '10 46 30N, 106 40 13E', '771'),
('27175', '11', 'Phường', '10 46 29N, 106 40 34E', '771'),
('27178', '10', 'Phường', '10 46 14N, 106 40 11E', '771'),
('27181', '09', 'Phường', '10 46 02N, 106 40 07E', '771'),
('27184', '01', 'Phường', '10 45 57N, 106 40 34E', '771'),
('27187', '08', 'Phường', '10 45 59N, 106 39 51E', '771'),
('27190', '02', 'Phường', '10 45 55N, 106 40 21E', '771'),
('27193', '04', 'Phường', '10 45 50N, 106 40 05E', '771'),
('27196', '07', 'Phường', '10 45 45N, 106 39 33E', '771'),
('27199', '05', 'Phường', '10 45 45N, 106 39 53E', '771'),
('27202', '06', 'Phường', '10 45 48N, 106 39 42E', '771'),
('27205', '03', 'Phường', '10 45 48N, 106 40 09E', '771'),
('27208', '15', 'Phường', '10 46 17N, 106 39 15E', '772'),
('27211', '05', 'Phường', '10 46 17N, 106 38 24E', '772'),
('27214', '14', 'Phường', '10 46 13N, 106 38 47E', '772'),
('27217', '11', 'Phường', '10 46 02N, 106 38 54E', '772'),
('27220', '03', 'Phường', '10 45 52N, 106 38 11E', '772'),
('27223', '10', 'Phường', '10 45 49N, 106 38 32E', '772'),
('27226', '13', 'Phường', '10 45 55N, 106 39 08E', '772'),
('27229', '08', 'Phường', '10 45 45N, 106 38 48E', '772'),
('27232', '09', 'Phường', '10 45 46N, 106 38 38E', '772'),
('27235', '12', 'Phường', '10 45 42N, 106 39 07E', '772'),
('27238', '07', 'Phường', '10 45 42N, 106 39 25E', '772'),
('27241', '06', 'Phường', '10 45 40N, 106 39 11E', '772'),
('27244', '04', 'Phường', '10 45 33N, 106 39 12E', '772'),
('27247', '01', 'Phường', '10 45 28N, 106 38 12E', '772'),
('27250', '02', 'Phường', '10 45 27N, 106 38 36E', '772'),
('27253', '16', 'Phường', '10 45 26N, 106 38 44E', '772'),
('27256', '12', 'Phường', '10 46 01N, 106 42 13E', '773'),
('27259', '13', 'Phường', '10 45 48N, 106 42 30E', '773'),
('27262', '09', 'Phường', '10 45 52N, 106 42 02E', '773'),
('27265', '06', 'Phường', '10 45 42N, 106 41 52E', '773'),
('27268', '08', 'Phường', '10 45 40N, 106 42 03E', '773'),
('27271', '10', 'Phường', '10 45 42N, 106 42 13E', '773'),
('27274', '05', 'Phường', '10 45 35N, 106 41 44E', '773'),
('27277', '18', 'Phường', '10 45 30N, 106 42 54E', '773'),
('27280', '14', 'Phường', '10 45 33N, 106 42 25E', '773'),
('27283', '04', 'Phường', '10 45 26N, 106 42 05E', '773'),
('27286', '03', 'Phường', '10 45 23N, 106 41 48E', '773'),
('27289', '16', 'Phường', '10 45 23N, 106 42 39E', '773'),
('27292', '02', 'Phường', '10 45 27N, 106 41 35E', '773'),
('27295', '15', 'Phường', '10 45 22N, 106 42 21E', '773'),
('27298', '01', 'Phường', '10 45 21N, 106 41 21E', '773'),
('27301', '04', 'Phường', '10 45 46N, 106 40 37E', '774'),
('27304', '09', 'Phường', '10 45 35N, 106 40 07E', '774'),
('27307', '03', 'Phường', '10 45 35N, 106 40 39E', '774'),
('27310', '12', 'Phường', '10 45 28N, 106 39 33E', '774'),
('27313', '02', 'Phường', '10 45 28N, 106 40 43E', '774'),
('27316', '08', 'Phường', '10 45 26N, 106 40 09E', '774'),
('27319', '15', 'Phường', '10 45 23N, 106 39 06E', '774'),
('27322', '07', 'Phường', '10 45 19N, 106 40 11E', '774'),
('27325', '01', 'Phường', '10 45 17N, 106 40 48E', '774'),
('27328', '11', 'Phường', '10 45 18N, 106 39 38E', '774'),
('27331', '14', 'Phường', '10 45 13N, 106 39 10E', '774'),
('27334', '05', 'Phường', '10 45 08N, 106 40 22E', '774'),
('27337', '06', 'Phường', '10 45 06N, 106 40 06E', '774'),
('27340', '10', 'Phường', '10 45 05N, 106 39 40E', '774'),
('27343', '13', 'Phường', '10 44 59N, 106 39 18E', '774'),
('27346', '14', 'Phường', '10 45 30N, 106 37 46E', '775'),
('27349', '13', 'Phường', '10 45 10N, 106 37 38E', '775'),
('27352', '09', 'Phường', '10 45 11N, 106 38 17E', '775'),
('27355', '06', 'Phường', '10 45 10N, 106 38 39E', '775'),
('27358', '12', 'Phường', '10 45 04N, 106 37 47E', '775'),
('27361', '05', 'Phường', '10 44 57N, 106 38 31E', '775'),
('27364', '11', 'Phường', '10 44 46N, 106 37 46E', '775'),
('27367', '02', 'Phường', '10 45 06N, 106 38 55E', '775'),
('27370', '01', 'Phường', '10 44 49N, 106 38 58E', '775'),
('27373', '04', 'Phường', '10 44 47N, 106 38 37E', '775'),
('27376', '08', 'Phường', '10 44 38N, 106 38 13E', '775'),
('27379', '03', 'Phường', '10 44 38N, 106 38 40E', '775'),
('27382', '07', 'Phường', '10 44 21N, 106 38 13E', '775'),
('27385', '10', 'Phường', '10 44 14N, 106 37 34E', '775'),
('27388', '08', 'Phường', '10 45 00N, 106 40 42E', '776'),
('27391', '02', 'Phường', '10 44 48N, 106 41 04E', '776'),
('27394', '01', 'Phường', '10 44 49N, 106 41 17E', '776'),
('27397', '03', 'Phường', '10 44 45N, 106 40 49E', '776'),
('27400', '11', 'Phường', '10 44 51N, 106 39 33E', '776'),
('27403', '09', 'Phường', '10 44 50N, 106 40 07E', '776'),
('27406', '10', 'Phường', '10 44 49N, 106 39 48E', '776'),
('27409', '04', 'Phường', '10 44 32N, 106 40 26E', '776'),
('27412', '13', 'Phường', '10 44 47N, 106 39 13E', '776'),
('27415', '12', 'Phường', '10 44 39N, 106 39 16E', '776'),
('27418', '05', 'Phường', '10 44 20N, 106 39 43E', '776'),
('27421', '14', 'Phường', '10 44 25N, 106 38 44E', '776'),
('27424', '06', 'Phường', '10 44 09N, 106 38 47E', '776'),
('27427', '15', 'Phường', '10 43 33N, 106 37 57E', '776'),
('27430', '16', 'Phường', '10 43 15N, 106 37 18E', '776'),
('27433', '07', 'Phường', '10 42 48N, 106 37 43E', '776'),
('27436', 'Bình Hưng Hòa', 'Phường', '10 48 09N, 106 36 00E', '777'),
('27439', 'Binh Hưng Hoà A', 'Phường', '10 47 10N, 106 36 19E', '777'),
('27442', 'Binh Hưng Hoà B', 'Phường', '10 48 12N, 106 35 27E', '777'),
('27445', 'Bình Trị Đông', 'Phường', '10 46 01N, 106 36 56E', '777'),
('27448', 'Bình Trị Đông A', 'Phường', '10 46 06N, 106 35 58E', '777'),
('27451', 'Bình Trị Đông B', 'Phường', '10 45 14N, 106 36 37E', '777'),
('27454', 'Tân Tạo', 'Phường', '10 45 30N, 106 35 06E', '777'),
('27457', 'Tân Tạo A', 'Phường', '10 44 52N, 106 34 50E', '777'),
('27460', 'An Lạc', 'Phường', '10 43 45N, 106 36 36E', '777'),
('27463', 'An Lạc A', 'Phường', '10 44 06N, 106 36 37E', '777'),
('27466', 'Tân Thuận Đông', 'Phường', '10 45 30N, 106 44 06E', '778'),
('27469', 'Tân Thuận Tây', 'Phường', '10 45 06N, 106 43 14E', '778'),
('27472', 'Tân Kiểng', 'Phường', '10 44 58N, 106 42 31E', '778'),
('27475', 'Tân Hưng', 'Phường', '10 44 43N, 106 41 45E', '778'),
('27478', 'Bình Thuận', 'Phường', '10 44 41N, 106 43 17E', '778'),
('27481', 'Tân Quy', 'Phường', '10 44 33N, 106 42 28E', '778'),
('27484', 'Phú Thuận', 'Phường', '10 43 47N, 106 44 48E', '778'),
('27487', 'Tân Phú', 'Phường', '10 43 34N, 106 43 22E', '778'),
('27490', 'Tân Phong', 'Phường', '10 43 49N, 106 42 13E', '778'),
('27493', 'Phú Mỹ', 'Phường', '10 42 32N, 106 44 11E', '778'),
('27496', 'Củ Chi', 'Thị Trấn', '10 58 31N, 106 29 32E', '783'),
('27499', 'Phú Mỹ Hưng', 'Xã', '11 07 19N, 106 27 39E', '783'),
('27502', 'An Phú', 'Xã', '11 06 53N, 106 29 58E', '783'),
('27505', 'Trung Lập Thượng', 'Xã', '11 03 58N, 106 26 14E', '783'),
('27508', 'An Nhơn Tây', 'Xã', '11 04 27N, 106 29 26E', '783'),
('27511', 'Nhuận Đức', 'Xã', '11 02 29N, 106 29 13E', '783'),
('27514', 'Phạm Văn Cội', 'Xã', '11 02 30N, 106 31 19E', '783'),
('27517', 'Phú Hòa Đông', 'Xã', '11 01 32N, 106 32 50E', '783'),
('27520', 'Trung Lập Hạ', 'Xã', '11 01 16N, 106 27 49E', '783'),
('27523', 'Trung An', 'Xã', '11 00 54N, 106 35 30E', '783'),
('27526', 'Phước Thạnh', 'Xã', '11 01 05N, 106 25 40E', '783'),
('27529', 'Phước Hiệp', 'Xã', '10 58 59N, 106 26 50E', '783'),
('27532', 'Tân An Hội', 'Xã', '10 58 04N, 106 28 39E', '783'),
('27535', 'Phước Vĩnh An', 'Xã', '10 58 58N, 106 31 10E', '783'),
('27538', 'Thái Mỹ', 'Xã', '10 59 12N, 106 23 35E', '783'),
('27541', 'Tân Thạnh Tây', 'Xã', '10 59 20N, 106 33 26E', '783'),
('27544', 'Hòa Phú', 'Xã', '10 58 41N, 106 36 31E', '783'),
('27547', 'Tân Thạnh Đông', 'Xã', '10 57 14N, 106 35 32E', '783'),
('27550', 'Bình Mỹ', 'Xã', '10 56 55N, 106 37 37E', '783'),
('27553', 'Tân Phú Trung', 'Xã', '10 56 50N, 106 32 59E', '783'),
('27556', 'Tân Thông Hội', 'Xã', '10 56 53N, 106 30 32E', '783'),
('27559', 'Hóc Môn', 'Thị Trấn', '10 53 12N, 106 35 28E', '784'),
('27562', 'Tân Hiệp', 'Xã', '10 54 40N, 106 35 26E', '784'),
('27565', 'Nhị Bình', 'Xã', '10 54 46N, 106 40 15E', '784'),
('27568', 'Đông Thạnh', 'Xã', '10 54 12N, 106 38 32E', '784'),
('27571', 'Tân Thới Nhì', 'Xã', '10 54 12N, 106 32 26E', '784'),
('27574', 'Thới Tam Thôn', 'Xã', '10 53 32N, 106 36 40E', '784'),
('27577', 'Xuân Thới Sơn', 'Xã', '10 52 42N, 106 33 24E', '784'),
('27580', 'Tân Xuân', 'Xã', '10 52 14N, 106 35 51E', '784'),
('27583', 'Xuân Thới Đông', 'Xã', '10 52 03N, 106 35 35E', '784'),
('27586', 'Trung Chánh', 'Xã', '10 52 00N, 106 36 24E', '784'),
('27589', 'Xuân Thới Thượng', 'Xã', '10 51 17N, 106 33 44E', '784'),
('27592', 'Bà Điểm', 'Xã', '10 50 34N, 106 35 43E', '784'),
('27595', 'Tân Túc', 'Thị Trấn', '10 41 15N, 106 34 14E', '785'),
('27598', 'Phạm Văn Hai', 'Xã', '10 49 24N, 106 31 41E', '785'),
('27601', 'Vĩnh Lộc A', 'Xã', '10 49 28N, 106 33 49E', '785'),
('27604', 'Vĩnh Lộc B', 'Xã', '10 47 27N, 106 33 43E', '785'),
('27607', 'Bình Lợi', 'Xã', '10 45 21N, 106 28 20E', '785'),
('27610', 'Lê Minh Xuân', 'Xã', '10 45 22N, 106 31 32E', '785'),
('27613', 'Tân Nhựt', 'Xã', '10 42 58N, 106 33 05E', '785'),
('27616', 'Tân Kiên', 'Xã', '10 42 55N, 106 34 59E', '785'),
('27619', 'Bình Hưng', 'Xã', '10 43 03N, 106 40 07E', '785'),
('27622', 'Phong Phú', 'Xã', '10 42 02N, 106 39 03E', '785'),
('27625', 'An Phú Tây', 'Xã', '10 41 17N, 106 36 22E', '785'),
('27628', 'Hưng Long', 'Xã', '10 40 02N, 106 37 26E', '785'),
('27631', 'Đa Phước', 'Xã', '10 39 51N, 106 39 28E', '785'),
('27634', 'Tân Quý Tây', 'Xã', '10 40 05N, 106 35 43E', '785'),
('27637', 'Bình Chánh', 'Xã', '10 39 55N, 106 33 53E', '785'),
('27640', 'Quy Đức', 'Xã', '10 38 24N, 106 38 45E', '785'),
('27643', 'Nhà Bè', 'Thị Trấn', '10 41 38N, 106 44 23E', '786'),
('27646', 'Phước Kiển', 'Xã', '10 42 14N, 106 42 24E', '786'),
('27649', 'Phước Lộc', 'Xã', '10 41 57N, 106 41 03E', '786'),
('27652', 'Nhơn Đức', 'Xã', '10 40 20N, 106 42 05E', '786'),
('27655', 'Phú Xuân', 'Xã', '10 40 43N, 106 44 57E', '786'),
('27658', 'Long Thới', 'Xã', '10 39 09N, 106 43 22E', '786'),
('27661', 'Hiệp Phước', 'Xã', '10 36 49N, 106 44 57E', '786'),
('27664', 'Cần Thạnh', 'Thị Trấn', '10 24 41N, 106 57 11E', '787'),
('27667', 'Bình Khánh', 'Xã', '10 38 22N, 106 47 24E', '787'),
('27670', 'Tam Thôn Hiệp', 'Xã', '10 35 00N, 106 52 57E', '787'),
('27673', 'An Thới Đông', 'Xã', '10 33 17N, 106 48 20E', '787'),
('27676', 'Thạnh An', 'Xã', '10 30 57N, 106 58 19E', '787'),
('27679', 'Long Hòa', 'Xã', '10 26 45N, 106 54 09E', '787'),
('27682', 'Lý Nhơn', 'Xã', '10 27 22N, 106 48 09E', '787');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cates`
--
ALTER TABLE `cates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cates_name_unique` (`name`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cityid`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`districtid`),
  ADD KEY `cityid` (`cityid`);

--
-- Indexes for table `favos`
--
ALTER TABLE `favos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favos_user_id_foreign` (`user_id`),
  ADD KEY `favos_order_id_foreign` (`order_id`);

--
-- Indexes for table `favs`
--
ALTER TABLE `favs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favs_user_id_foreign` (`user_id`),
  ADD KEY `favs_stock_id_foreign` (`stock_id`);

--
-- Indexes for table `matchs`
--
ALTER TABLE `matchs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matchs_stock_id_foreign` (`stock_id`),
  ADD KEY `matchs_order_id_foreign` (`order_id`);

--
-- Indexes for table `match_notifications`
--
ALTER TABLE `match_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `match_notifications_stock_id_foreign` (`stock_id`),
  ADD KEY `match_notifications_order_id_foreign` (`order_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`);

--
-- Indexes for table `orderimages`
--
ALTER TABLE `orderimages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderimages_order_id_foreign` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_cate_id_foreign` (`cate_id`);

--
-- Indexes for table `order_notifications`
--
ALTER TABLE `order_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_notifications_order_id_foreign` (`order_id`);

--
-- Indexes for table `order_tag_lists`
--
ALTER TABLE `order_tag_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_tag_lists_order_id_foreign` (`order_id`),
  ADD KEY `order_tag_lists_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_rating_user_id_foreign` (`voting_user_id`),
  ADD KEY `reviews_rated_user_id_foreign` (`voted_user_id`);

--
-- Indexes for table `stockimages`
--
ALTER TABLE `stockimages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stockimages_stock_id_foreign` (`stock_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_user_id_foreign` (`user_id`),
  ADD KEY `stocks_cate_id_foreign` (`cate_id`);

--
-- Indexes for table `stock_notifications`
--
ALTER TABLE `stock_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_notifications_stock_id_foreign` (`stock_id`);

--
-- Indexes for table `stock_tag_lists`
--
ALTER TABLE `stock_tag_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_tag_lists_stock_id_foreign` (`stock_id`),
  ADD KEY `stock_tag_lists_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_alias_unique` (`alias`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `ward`
--
ALTER TABLE `ward`
  ADD PRIMARY KEY (`wardid`),
  ADD KEY `districtid` (`districtid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cates`
--
ALTER TABLE `cates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `favos`
--
ALTER TABLE `favos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `favs`
--
ALTER TABLE `favs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `matchs`
--
ALTER TABLE `matchs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `match_notifications`
--
ALTER TABLE `match_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `orderimages`
--
ALTER TABLE `orderimages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `order_notifications`
--
ALTER TABLE `order_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order_tag_lists`
--
ALTER TABLE `order_tag_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `stockimages`
--
ALTER TABLE `stockimages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `stock_notifications`
--
ALTER TABLE `stock_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `stock_tag_lists`
--
ALTER TABLE `stock_tag_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `favos`
--
ALTER TABLE `favos`
  ADD CONSTRAINT `favos_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favs`
--
ALTER TABLE `favs`
  ADD CONSTRAINT `favs_stock_id_foreign` FOREIGN KEY (`stock_id`) REFERENCES `stocks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `matchs`
--
ALTER TABLE `matchs`
  ADD CONSTRAINT `matchs_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matchs_stock_id_foreign` FOREIGN KEY (`stock_id`) REFERENCES `stocks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `match_notifications`
--
ALTER TABLE `match_notifications`
  ADD CONSTRAINT `match_notifications_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `match_notifications_stock_id_foreign` FOREIGN KEY (`stock_id`) REFERENCES `stocks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orderimages`
--
ALTER TABLE `orderimages`
  ADD CONSTRAINT `orderimages_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `cates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_notifications`
--
ALTER TABLE `order_notifications`
  ADD CONSTRAINT `order_notifications_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_tag_lists`
--
ALTER TABLE `order_tag_lists`
  ADD CONSTRAINT `order_tag_lists_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_tag_lists_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_rated_user_id_foreign` FOREIGN KEY (`voted_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_rating_user_id_foreign` FOREIGN KEY (`voting_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stockimages`
--
ALTER TABLE `stockimages`
  ADD CONSTRAINT `stockimages_stock_id_foreign` FOREIGN KEY (`stock_id`) REFERENCES `stocks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `cates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stocks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stock_notifications`
--
ALTER TABLE `stock_notifications`
  ADD CONSTRAINT `stock_notifications_stock_id_foreign` FOREIGN KEY (`stock_id`) REFERENCES `stocks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stock_tag_lists`
--
ALTER TABLE `stock_tag_lists`
  ADD CONSTRAINT `stock_tag_lists_stock_id_foreign` FOREIGN KEY (`stock_id`) REFERENCES `stocks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stock_tag_lists_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
