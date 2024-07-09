-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 09, 2024 at 09:03 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifications`
--

CREATE TABLE `admin_notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` enum('Đã đọc','Chưa đọc') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Chưa đọc',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_notifications`
--

INSERT INTO `admin_notifications` (`id`, `user_id`, `noi_dung`, `trang_thai`, `created_at`, `updated_at`) VALUES
(10, 10, 'Tài khoản của bạn đã thành công: 20000xu', 'Đã đọc', '2024-07-03 11:07:21', '2024-07-03 15:35:03'),
(11, 10, 'Bạn đã mua phim: HỘI CHỨNG TUỔI THANH XUÂN: CÔ BÉ ĐEO CẶP SÁCH Thành công', 'Đã đọc', '2024-07-03 11:10:24', '2024-07-03 15:35:00'),
(12, 10, 'Tài khoản của bạn đã bị trừ 5000 xu phí phạt spam', 'Đã đọc', '2024-07-03 11:11:41', '2024-07-03 15:14:44'),
(13, 9, 'Tài khoản của bạn đã thực hiện 3 lần spam nếu thực hiện hơn sẽ bị khóa tài khoản hoặc bị trừ 5000 xu', 'Chưa đọc', '2024-07-03 11:17:07', '2024-07-03 11:17:07'),
(14, 17, 'Tài khoản của bạn đã thực hiện 3 lần spam nếu thực hiện hơn sẽ bị khóa tài khoản hoặc bị trừ 5000 xu', 'Chưa đọc', '2024-07-03 11:26:12', '2024-07-03 11:26:12'),
(15, 10, 'Bạn đã mua phim: THIẾU NIÊN VÀ CHIM DIỆC Thành công', 'Đã đọc', '2024-07-03 12:38:10', '2024-07-03 14:23:02'),
(16, 10, 'Bạn đã mua phim: GIA TỘC RỒNG (PHẦN 2) Thành công', 'Đã đọc', '2024-07-03 14:22:42', '2024-07-03 14:22:57'),
(17, 10, 'Bạn đã mua phim: GEATS EXTRA: KAMEN RIDER GAZER Thành công', 'Đã đọc', '2024-07-03 14:40:04', '2024-07-03 14:40:18'),
(18, 10, 'Bạn đã mua phim: CHUYỆN NGÀY XƯA Ở… HOLLYWOOD Thành công', 'Đã đọc', '2024-07-03 14:50:07', '2024-07-03 15:13:18'),
(19, 10, 'Bạn đã mua phim: BỐ GIÀ (2021) Thành công', 'Đã đọc', '2024-07-03 14:50:52', '2024-07-03 15:03:31'),
(20, 10, 'Bạn đã mua phim: CÔ ẤY, NGÀY VÀ ĐÊM Thành công', 'Đã đọc', '2024-07-03 14:52:51', '2024-07-03 15:03:27'),
(21, 10, 'Bạn đã mua phim: 7 NĂM CHƯA CƯỚI SẼ CHIA TAY\r\n Thành công', 'Đã đọc', '2024-07-03 14:54:22', '2024-07-03 14:54:31'),
(22, 10, 'Bạn đã mua phim: 7 VIÊN NGỌC RỒNG\r\n Thành công', 'Đã đọc', '2024-07-03 14:59:44', '2024-07-03 14:59:49'),
(23, 10, 'Bạn đã mua phim: 7 NĂM CHƯA CƯỚI SẼ CHIA TAY\r\n Thành công', 'Đã đọc', '2024-07-03 15:40:23', '2024-07-03 16:06:34'),
(24, 10, 'Tiền thưởng báo lỗi phim trên 10 lần đã giúp admin fix thành công', 'Đã đọc', '2024-07-03 15:41:27', '2024-07-03 16:06:31'),
(25, 10, 'Tiền thưởng báo lỗi phim 10 lần đã giúp admin fix thành công', 'Đã đọc', '2024-07-03 15:45:53', '2024-07-03 16:06:29'),
(26, 10, 'Tiền thưởng báo lỗi phim 10 lần đã giúp admin fix thành công', 'Đã đọc', '2024-07-03 15:45:56', '2024-07-03 16:06:27'),
(27, 10, 'Tiền thưởng báo lỗi phim 10 lần đã giúp admin fix thành công', 'Đã đọc', '2024-07-03 15:46:17', '2024-07-03 16:06:25'),
(28, 10, 'Tiền thưởng báo lỗi phim 10 lần đã giúp admin fix thành công', 'Đã đọc', '2024-07-03 15:46:40', '2024-07-03 16:06:23'),
(29, 10, 'Tiền thưởng báo lỗi phim 10 lần đã giúp admin fix thành công', 'Đã đọc', '2024-07-03 15:46:43', '2024-07-03 16:06:20'),
(30, 10, 'Tiền thưởng báo lỗi phim 10 lần đã giúp admin fix thành công', 'Đã đọc', '2024-07-03 15:46:44', '2024-07-03 16:06:18'),
(31, 10, 'Bạn đã mua phim: CĂN HỘ 404 Thành công', 'Đã đọc', '2024-07-03 16:18:26', '2024-07-04 05:46:14'),
(32, 10, 'Tiền thưởng báo lỗi phim 10 lần đã giúp admin fix thành công', 'Đã đọc', '2024-07-03 16:18:26', '2024-07-03 16:20:48'),
(33, 10, 'Tài khoản của bạn đã bị trừ 5000 xu phí phạt spam', 'Đã đọc', '2024-07-03 16:25:32', '2024-07-03 16:30:38'),
(34, 10, 'Tiền thưởng báo lỗi phim 10 lần đã giúp admin fix thành công', 'Đã đọc', '2024-07-03 16:25:32', '2024-07-03 16:29:28'),
(35, 10, 'Tài khoản của bạn đã bị trừ 5000 xu phí phạt spam', 'Đã đọc', '2024-07-03 16:30:38', '2024-07-04 05:46:12'),
(36, 10, 'Tiền thưởng báo lỗi phim 10 lần đã giúp admin fix thành công', 'Đã đọc', '2024-07-03 16:30:38', '2024-07-04 05:45:43'),
(38, 10, 'Sắp có khuyến mãi', 'Đã đọc', '2024-07-04 07:33:44', '2024-07-04 07:50:17'),
(39, 10, 'Đọc chưa', 'Đã đọc', '2024-07-04 07:46:54', '2024-07-04 07:50:09'),
(40, 15, 'Tại sao?', 'Chưa đọc', '2024-07-04 08:36:12', '2024-07-04 08:36:12'),
(41, 10, 'vip đâu', 'Đã đọc', '2024-07-04 09:12:54', '2024-07-04 12:53:14'),
(42, 16, 'Anh em ơi', 'Chưa đọc', '2024-07-04 09:14:39', '2024-07-04 09:14:39'),
(43, 14, 'Anh em ơi', 'Chưa đọc', '2024-07-04 09:14:39', '2024-07-04 09:14:39'),
(44, 17, 'Anh em ơi', 'Chưa đọc', '2024-07-04 09:14:39', '2024-07-04 09:14:39'),
(45, 9, 'Anh em ơi', 'Chưa đọc', '2024-07-04 09:14:39', '2024-07-04 09:14:39'),
(46, 10, 'Anh em ơi', 'Đã đọc', '2024-07-04 09:14:39', '2024-07-04 12:53:12'),
(47, 12, 'Anh em ơi', 'Chưa đọc', '2024-07-04 09:14:39', '2024-07-04 09:14:39'),
(48, 11, 'Anh em ơi', 'Chưa đọc', '2024-07-04 09:14:39', '2024-07-04 09:14:39'),
(49, 13, 'Anh em ơi', 'Chưa đọc', '2024-07-04 09:14:39', '2024-07-04 09:14:39'),
(50, 19, 'Anh em ơi', 'Chưa đọc', '2024-07-04 09:14:39', '2024-07-04 09:14:39'),
(51, 18, 'Anh em ơi', 'Chưa đọc', '2024-07-04 09:14:39', '2024-07-04 09:14:39'),
(52, 15, 'Anh em ơi', 'Chưa đọc', '2024-07-04 09:14:39', '2024-07-04 09:14:39'),
(53, 20, 'Anh em ơi', 'Chưa đọc', '2024-07-04 09:14:39', '2024-07-04 09:14:39'),
(54, 10, 'Hello vip', 'Đã đọc', '2024-07-04 15:25:44', '2024-07-04 15:26:13'),
(55, 10, 'chào bạn nha', 'Đã đọc', '2024-07-04 15:26:22', '2024-07-04 15:31:18'),
(56, 10, 'Hihi', 'Đã đọc', '2024-07-04 15:26:49', '2024-07-04 15:31:17'),
(57, 21, 'Tài khoản của bạn đã thành công: 12000000xu', 'Chưa đọc', '2024-07-04 17:48:11', '2024-07-04 17:48:11'),
(58, 21, 'Bạn đã mua phim: ULTRAMAN: TRỖI DẬY Thành công', 'Chưa đọc', '2024-07-04 17:50:16', '2024-07-04 17:50:16'),
(59, 10, 'Tiền thưởng báo lỗi phim 10 lần đã giúp admin fix thành công', 'Đã đọc', '2024-07-04 17:51:33', '2024-07-04 18:06:23'),
(60, 10, 'Tiền thưởng báo lỗi phim 10 lần đã giúp admin fix thành công', 'Đã đọc', '2024-07-04 17:51:55', '2024-07-04 18:06:22'),
(61, 10, 'Tiền thưởng báo lỗi phim 10 lần đã giúp admin fix thành công', 'Đã đọc', '2024-07-04 17:52:13', '2024-07-04 18:06:21'),
(62, 10, 'Tiền thưởng báo lỗi phim 10 lần đã giúp admin fix thành công', 'Đã đọc', '2024-07-04 17:52:15', '2024-07-04 18:06:20'),
(63, 10, 'Tiền thưởng báo lỗi phim 10 lần đã giúp admin fix thành công', 'Đã đọc', '2024-07-04 17:53:11', '2024-07-04 18:06:19'),
(64, 21, 'Tài khoản của bạn đã thành công: 9000000xu', 'Chưa đọc', '2024-07-04 18:08:12', '2024-07-04 18:08:12'),
(65, 21, 'Bạn đã mua phim: HỘI CHỨNG TUỔI THANH XUÂN: CÔ BÉ ĐEO CẶP SÁCH Thành công', 'Chưa đọc', '2024-07-04 18:08:42', '2024-07-04 18:08:42'),
(66, 10, 'okok', 'Đã đọc', '2024-07-04 18:37:16', '2024-07-05 05:37:17'),
(67, 21, 'okok', 'Chưa đọc', '2024-07-04 18:37:16', '2024-07-04 18:37:16'),
(68, 10, 'Tài khoản của bạn đã bị trừ 5000 xu phí phạt spam', 'Đã đọc', '2024-07-05 08:25:03', '2024-07-05 10:40:48'),
(69, 10, 'Bạn đã mua phim: STAR WARS: THE ACOLYTE (PHẦN 1) Thành công', 'Đã đọc', '2024-07-05 09:05:43', '2024-07-05 10:40:45'),
(70, 10, 'Bạn đã mua phim: HẠN CHÓT ĐỂ YÊU Thành công', 'Đã đọc', '2024-07-05 09:17:04', '2024-07-05 10:40:40'),
(71, 10, 'Bạn đã mua phim: SHOW CỦA ĐEN Thành công', 'Đã đọc', '2024-07-05 09:22:33', '2024-07-05 10:36:48'),
(72, 10, 'Tài khoản của bạn đã bị trừ 5000 xu phí phạt spam', 'Đã đọc', '2024-07-05 10:21:48', '2024-07-05 10:36:44'),
(92, 10, 'Tài khoản của bạn đã bị trừ 5000 xu phí phạt spam', 'Đã đọc', '2024-07-05 10:51:49', '2024-07-05 10:53:40'),
(96, 10, 'Tài khoản của bạn đã thực hiện 3 lần spam nếu thực hiện hơn sẽ bị khóa tài khoản hoặc bị trừ 5000 xu', 'Đã đọc', '2024-07-05 10:59:11', '2024-07-05 11:01:46'),
(97, 21, 'Tài khoản của bạn đã bị trừ 5000 xu phí phạt spam', 'Đã đọc', '2024-07-05 11:02:53', '2024-07-05 11:36:57'),
(98, 10, 'Tài khoản của bạn đã bị trừ 5000 xu phí phạt spam', 'Đã đọc', '2024-07-05 16:30:31', '2024-07-06 13:39:51'),
(99, 22, 'Tài khoản của bạn đã thành công: 200000xu', 'Chưa đọc', '2024-07-07 06:19:12', '2024-07-07 06:19:12'),
(100, 22, 'Bạn đã mua phim: SHOW CỦA ĐEN Thành công', 'Chưa đọc', '2024-07-07 06:20:06', '2024-07-07 06:20:06'),
(101, 22, 'Bạn đã mua phim: HẠN CHÓT ĐỂ YÊU Thành công', 'Chưa đọc', '2024-07-07 06:21:33', '2024-07-07 06:21:33'),
(102, 22, 'Bạn đã mua phim: BỐ GIÀ (2021) Thành công', 'Đã đọc', '2024-07-07 06:52:40', '2024-07-07 06:52:54'),
(103, 22, 'Bạn đã mua phim: GEATS EXTRA: KAMEN RIDER GAZER Thành công', 'Đã đọc', '2024-07-07 06:54:32', '2024-07-07 07:07:14'),
(104, 22, 'Bạn đã mua phim: HỘI CHỨNG TUỔI THANH XUÂN: CÔ BÉ ĐEO CẶP SÁCH Thành công', 'Đã đọc', '2024-07-07 06:57:32', '2024-07-07 07:07:12'),
(105, 22, 'Bạn đã mua phim: 7 NĂM CHƯA CƯỚI SẼ CHIA TAY\r\n Thành công', 'Đã đọc', '2024-07-07 07:04:42', '2024-07-07 07:07:06'),
(106, 22, 'Bạn đã mua phim: CĂN HỘ 404 Thành công', 'Chưa đọc', '2024-07-07 07:07:36', '2024-07-07 07:07:36'),
(107, 23, 'chào tài khoản mới', 'Chưa đọc', '2024-07-09 08:58:27', '2024-07-09 08:58:27');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `movie_id` bigint UNSIGNED NOT NULL,
  `xu` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `user_id`, `movie_id`, `xu`, `created_at`, `updated_at`) VALUES
(38, 10, 21, 40000, '2024-07-03 11:10:24', '2024-07-03 11:10:24'),
(39, 10, 19, 8000, '2024-07-03 12:38:10', '2024-07-03 12:38:10'),
(40, 10, 16, 120000, '2024-07-03 14:22:42', '2024-07-03 14:22:42'),
(41, 10, 24, 800, '2024-07-03 14:40:04', '2024-07-03 14:40:04'),
(42, 10, 20, 120000, '2024-07-03 14:50:07', '2024-07-03 14:50:07'),
(43, 10, 14, 9600, '2024-07-03 14:50:52', '2024-07-03 14:50:52'),
(44, 10, 15, 120000, '2024-07-03 14:52:51', '2024-07-03 14:52:51'),
(45, 10, 6, 800, '2024-07-03 14:54:22', '2024-07-03 14:54:22'),
(46, 10, 8, 1600, '2024-07-03 14:59:44', '2024-07-03 14:59:44'),
(47, 10, 6, 800, '2024-07-03 15:40:23', '2024-07-03 15:40:23'),
(48, 10, 22, 8000, '2024-07-03 16:18:26', '2024-07-03 16:18:26'),
(49, 21, 27, 9600000, '2024-07-04 17:50:16', '2024-07-04 17:50:16'),
(50, 21, 21, 40000, '2024-07-04 18:08:42', '2024-07-04 18:08:42'),
(51, 10, 32, 200000, '2024-07-05 09:05:43', '2024-07-05 09:05:43'),
(52, 10, 33, 16000, '2024-07-05 09:17:04', '2024-07-05 09:17:04'),
(53, 10, 34, 80000, '2024-07-05 09:22:33', '2024-07-05 09:22:33'),
(54, 22, 34, 80000, '2024-07-07 06:20:06', '2024-07-07 06:20:06'),
(55, 22, 33, 16000, '2024-07-07 06:21:33', '2024-07-07 06:21:33'),
(56, 22, 14, 9600, '2024-07-07 06:52:40', '2024-07-07 06:52:40'),
(57, 22, 24, 800, '2024-07-07 06:54:32', '2024-07-07 06:54:32'),
(58, 22, 21, 40000, '2024-07-07 06:57:32', '2024-07-07 06:57:32'),
(59, 22, 6, 800, '2024-07-07 07:04:42', '2024-07-07 07:04:42'),
(60, 22, 22, 8000, '2024-07-07 07:07:36', '2024-07-07 07:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `catelogues`
--

CREATE TABLE `catelogues` (
  `id` bigint UNSIGNED NOT NULL,
  `ten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catelogues`
--

INSERT INTO `catelogues` (`id`, `ten`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Hành động', 'hanh-dong', NULL, NULL),
(2, 'Phim bom tấn', 'phim-bom-tan', NULL, '2024-06-30 09:13:35'),
(3, 'Chính kịch', 'chinh-kich', NULL, NULL),
(4, 'Tình cảm', 'tinh-cam', NULL, NULL),
(5, 'Hài', 'hai', NULL, NULL),
(6, 'Hình Sự', 'hinh-su', NULL, NULL),
(7, 'Hoạt Hình', 'hoat-hinh', NULL, NULL),
(8, 'Kinh dị', 'kinh-di', '2024-06-26 10:03:53', '2024-06-26 10:03:53'),
(9, 'Giải trí', 'giai-tri', '2024-06-27 05:11:09', '2024-06-27 05:11:09'),
(12, 'Siêu nhân', 'sieu-nhan', '2024-07-01 18:30:57', '2024-07-01 18:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `catelogue_posts`
--

CREATE TABLE `catelogue_posts` (
  `id` bigint UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catelogue_posts`
--

INSERT INTO `catelogue_posts` (`id`, `ten`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Tin tức', 'tin-tuc', '2024-06-27 04:10:29', '2024-06-27 04:10:29'),
(3, 'Footer', 'footer', '2024-06-29 15:52:10', '2024-06-29 15:52:10'),
(4, 'Bảng xếp hạng', 'bang-xep-hang', '2024-06-30 06:13:57', '2024-06-30 06:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `movie_id` bigint UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint NOT NULL,
  `sao` int NOT NULL DEFAULT '5',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `movie_id`, `content`, `user_id`, `sao`, `created_at`, `updated_at`) VALUES
(14, 19, 'hay', 9, 5, '2024-06-29 16:16:21', '2024-06-29 16:16:21'),
(15, 8, 'phim vip', 10, 5, '2024-06-29 16:28:24', '2024-06-29 16:28:24'),
(16, 19, 'okok', 10, 5, '2024-06-29 17:39:44', '2024-06-29 17:39:44'),
(17, 19, 'okok', 10, 5, '2024-06-29 17:39:57', '2024-06-29 17:39:57'),
(18, 21, 'okok', 10, 5, '2024-06-30 04:10:30', '2024-06-30 04:10:30'),
(19, 21, 'okok', 9, 5, '2024-06-30 04:11:06', '2024-06-30 04:11:06'),
(20, 22, 'keke', 9, 5, '2024-06-30 05:30:29', '2024-06-30 05:30:29'),
(21, 17, 'okok', 9, 2, '2024-06-30 13:31:22', '2024-06-30 13:31:22'),
(22, 13, 'okok', 9, 5, '2024-06-30 14:46:06', '2024-06-30 14:46:06'),
(23, 13, 'khá quá nhẻ', 9, 5, '2024-06-30 14:50:17', '2024-06-30 14:50:17'),
(24, 24, 'phim hay', 9, 4, '2024-07-02 07:21:27', '2024-07-02 07:21:27'),
(25, 1, 'khá hay', 9, 5, '2024-07-03 07:24:32', '2024-07-03 07:24:32'),
(26, 25, 'hay', 10, 5, '2024-07-03 14:17:24', '2024-07-03 14:17:24'),
(27, 25, 'tạm', 10, 4, '2024-07-03 14:17:47', '2024-07-03 14:17:47'),
(28, 23, 'khá hay', 10, 4, '2024-07-03 16:07:35', '2024-07-03 16:07:35'),
(29, 25, 'Hay phết', 19, 5, '2024-07-03 17:30:37', '2024-07-03 17:30:37'),
(30, 30, 'phim hay', 10, 5, '2024-07-04 15:07:41', '2024-07-04 15:07:41'),
(31, 27, 'Phim bom tấn', 21, 5, '2024-07-04 17:51:02', '2024-07-04 17:51:02'),
(32, 27, 'Quá vip', 21, 5, '2024-07-04 17:51:07', '2024-07-04 17:51:07'),
(33, 16, 'phim hay', 10, 4, '2024-07-05 08:30:22', '2024-07-05 08:30:22'),
(34, 35, 'pim hay', 10, 5, '2024-07-05 10:06:47', '2024-07-05 10:06:47'),
(35, 35, 'Hay phết', 10, 4, '2024-07-05 10:16:18', '2024-07-05 10:16:18'),
(36, 39, 'keke', 10, 5, '2024-07-05 14:14:00', '2024-07-05 14:14:00'),
(37, 36, 'hế lô', 10, 5, '2024-07-05 14:53:57', '2024-07-05 14:53:57'),
(38, 4, 'meme', 10, 5, '2024-07-05 15:19:46', '2024-07-05 15:19:46'),
(39, 29, 'keke', 10, 5, '2024-07-06 13:44:04', '2024-07-06 13:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `comment_likes`
--

CREATE TABLE `comment_likes` (
  `id` bigint UNSIGNED NOT NULL,
  `comment_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment_likes`
--

INSERT INTO `comment_likes` (`id`, `comment_id`, `user_id`, `created_at`, `updated_at`) VALUES
(31, 17, 10, '2024-07-05 15:00:16', '2024-07-05 15:00:16'),
(33, 38, 10, '2024-07-05 15:19:52', '2024-07-05 15:19:52'),
(35, 24, 10, '2024-07-05 16:30:39', '2024-07-05 16:30:39'),
(36, 36, 10, '2024-07-06 13:39:54', '2024-07-06 13:39:54'),
(37, 39, 10, '2024-07-06 13:44:06', '2024-07-06 13:44:06'),
(41, 24, 22, '2024-07-07 06:54:50', '2024-07-07 06:54:50'),
(42, 19, 22, '2024-07-07 06:58:51', '2024-07-07 06:58:51'),
(43, 18, 22, '2024-07-07 06:58:58', '2024-07-07 06:58:58'),
(46, 27, 22, '2024-07-07 07:00:57', '2024-07-07 07:00:57'),
(47, 27, 22, '2024-07-07 07:00:58', '2024-07-07 07:00:58'),
(48, 27, 22, '2024-07-07 07:01:00', '2024-07-07 07:01:00'),
(49, 27, 22, '2024-07-07 07:01:02', '2024-07-07 07:01:02'),
(50, 20, 22, '2024-07-07 07:08:29', '2024-07-07 07:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `id` bigint UNSIGNED NOT NULL,
  `tap` int NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_id` bigint UNSIGNED NOT NULL,
  `luot_xem` bigint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`id`, `tap`, `link`, `movie_id`, `luot_xem`, `created_at`, `updated_at`) VALUES
(1, 1, 'https://embed3.streamc.xyz/embed.php?hash=eb8e650576a8661471ded0a1cf69b7a0\r\n', 1, 5, NULL, '2024-07-03 07:25:25'),
(2, 1, 'https://embed3.streamc.xyz/embed.php?hash=88c8ff74262c6e6e1d7641f569ab28a9\r\n', 2, 0, NULL, NULL),
(3, 2, 'https://embed3.streamc.xyz/embed.php?hash=8a572bd235b45c55b418758c69e47dd5\r\n', 2, 0, NULL, NULL),
(4, 1, 'https://embed2.streamc.xyz/embed.php?hash=a679359192f5de71ece893caf85d429e\r\n', 3, 1, NULL, '2024-07-03 16:33:29'),
(7, 1, 'https://embed2.streamc.xyz/embed.php?hash=8d9ff0bb6c55f1e179d1a1fd0cccb9c7\r\n', 4, 0, NULL, NULL),
(8, 2, 'https://embed2.streamc.xyz/embed.php?hash=00cfd0ce0b6e2a11ed025c9ba010ac6a\r\n', 4, 0, NULL, NULL),
(11, 3, 'https://embed2.streamc.xyz/embed.php?hash=c7450c91b800398d19847871fecdb820\r\n', 4, 0, NULL, NULL),
(12, 4, 'https://embed2.streamc.xyz/embed.php?hash=da50f72b415f7c9fea97ea54f950d7fd\r\n', 4, 0, NULL, NULL),
(13, 5, 'https://embed2.streamc.xyz/embed.php?hash=dd35381adf4d2c2b5e15a91861befb0b\r\n', 4, 0, NULL, NULL),
(14, 6, 'https://embed2.streamc.xyz/embed.php?hash=6bc1f9128c75f0f82b601d91c045ef0e\r\n', 4, 0, NULL, NULL),
(15, 7, 'https://embed2.streamc.xyz/embed.php?hash=2cb7e4a648d71f16f9cacfa0a141e399\r\n', 4, 0, NULL, NULL),
(16, 1, 'https://embed.streamc.xyz/embed.php?hash=779c7b0cdad3975017efe6a2b2fd1acc\r\n', 5, 5, NULL, '2024-07-01 08:30:14'),
(17, 2, 'https://embed.streamc.xyz/embed.php?hash=d549c55e300172708c3805562310c834\r\n', 5, 0, NULL, NULL),
(18, 1, 'https://embed2.streamc.xyz/embed.php?hash=bb475d22e2278469bd6fa629d70af4be\r\n', 6, 2, NULL, '2024-07-03 15:41:27'),
(19, 1, 'https://embed3.streamc.xyz/embed.php?hash=d020a37deeadb1ca9a0553d605cff4ef\n', 7, 0, NULL, NULL),
(20, 1, 'https://embed1.streamc.xyz/embed.php?hash=f5850dbed6258b360c6ea92b3a843fec', 8, 152, '2024-06-21 00:16:07', '2024-06-30 14:42:31'),
(21, 2, 'https://embed1.streamc.xyz/embed.php?hash=e4c03461eea70f65df5d1345fac31296', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(22, 3, 'https://embed1.streamc.xyz/embed.php?hash=8132f499d29b111d447e84abefdff494', 8, 1, '2024-06-21 00:16:07', '2024-07-04 15:42:40'),
(23, 4, 'https://embed1.streamc.xyz/embed.php?hash=0155cb975cc0ee7638a28147e9a04a6a', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(24, 5, 'https://embed1.streamc.xyz/embed.php?hash=78a920ebfc7b0dc3dc3b01d8384e1658', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(25, 6, 'https://embed1.streamc.xyz/embed.php?hash=494fda9bf59fbeaf74087ea0e78f6f22', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(26, 7, 'https://embed1.streamc.xyz/embed.php?hash=2c669c78f36ef94470f0205873e381d1', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(27, 8, 'https://embed1.streamc.xyz/embed.php?hash=00e7e3754f0eb3fec33c79df4fac9bbb', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(28, 9, 'https://embed1.streamc.xyz/embed.php?hash=6e1468fb90ee4db3941fb869395e71f7', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(29, 10, 'https://embed1.streamc.xyz/embed.php?hash=23334d21d0ad9cecf3fc4c69f0f160a2', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(30, 11, 'https://embed1.streamc.xyz/embed.php?hash=78268f01e79ef4f4c237370851321a8b', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(31, 12, 'https://embed1.streamc.xyz/embed.php?hash=94e1238b96f7efb93b215a1ec5907aca', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(32, 13, 'https://embed1.streamc.xyz/embed.php?hash=255e8a116d9db9cf10a486de044d6515', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(33, 14, 'https://embed1.streamc.xyz/embed.php?hash=92262794e23587c34177b799d8ab9e09', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(34, 15, 'https://embed1.streamc.xyz/embed.php?hash=4828173cd4a9813cc2d6592150733f5a', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(35, 16, 'https://embed1.streamc.xyz/embed.php?hash=c330ff9d5096197e79e46fc70613dc3e', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(36, 17, 'https://embed1.streamc.xyz/embed.php?hash=869520d4263ffef161739962b09b90b9', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(37, 18, 'https://embed1.streamc.xyz/embed.php?hash=0cad19417f865a915963da1f074bcd32', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(38, 19, 'https://embed1.streamc.xyz/embed.php?hash=f792706e2d9926683ec953ded8526ded', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(39, 20, 'https://embed1.streamc.xyz/embed.php?hash=bca044ee80ec512e2964271a713e244b', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(40, 21, 'https://embed1.streamc.xyz/embed.php?hash=31300d78488e276f4bd77b92b8f7f063', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(41, 22, 'https://embed1.streamc.xyz/embed.php?hash=0bf2236ba579daceb87098c261757681', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(42, 23, 'https://embed1.streamc.xyz/embed.php?hash=e630b87a3ce64ac3686a213cd7ab873c', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(43, 24, 'https://embed1.streamc.xyz/embed.php?hash=b1fafb47711acb28e1fdce2bb65b3bd4', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(44, 25, 'https://embed1.streamc.xyz/embed.php?hash=d371a4eacbf5d7287673dd042977e084', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(45, 26, 'https://embed1.streamc.xyz/embed.php?hash=113064f202e16daf84a893ef041e3b5c', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(46, 27, 'https://embed1.streamc.xyz/embed.php?hash=6e4e5859a0914cd78aa86c6545e54a53', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(47, 28, 'https://embed1.streamc.xyz/embed.php?hash=45bdaccb27e99113db192a3947479f4c', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(48, 29, 'https://embed1.streamc.xyz/embed.php?hash=75c6d549e3014bd517692c61ec93e49e', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(49, 30, 'https://embed1.streamc.xyz/embed.php?hash=5dc6926736c3f871f6cc7dde92fd580e', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(50, 31, 'https://embed1.streamc.xyz/embed.php?hash=7888e35d06998023735808e81997d1d2', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(51, 32, 'https://embed1.streamc.xyz/embed.php?hash=5100217d4cbc868ddff902dbbc3007ef', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(52, 33, 'https://embed1.streamc.xyz/embed.php?hash=3054b163d20a78182cd7d919d828cca4', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(53, 34, 'https://embed1.streamc.xyz/embed.php?hash=c9ef507423f099338c1bb05596c726a3', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(54, 35, 'https://embed1.streamc.xyz/embed.php?hash=b2d808f8255140f757ded199a290ccc2', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(55, 36, 'https://embed1.streamc.xyz/embed.php?hash=0864618e15b6044f120102416bd13905', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(56, 37, 'https://embed1.streamc.xyz/embed.php?hash=d1c2bf2aba9ed8ca24cb4a3e8cb439b0', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(57, 38, 'https://embed1.streamc.xyz/embed.php?hash=806ab4092a204fd2883cb5f6eb0f32e9', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(58, 39, 'https://embed1.streamc.xyz/embed.php?hash=1a5c03c45497d8139ec9e3c02fb8510e', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(59, 40, 'https://embed1.streamc.xyz/embed.php?hash=1e51c855b121b61d4fe69e73c15d8c7b', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(60, 41, 'https://embed1.streamc.xyz/embed.php?hash=1ce28fa3acbea7645834c13727ef0065', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(61, 42, 'https://embed1.streamc.xyz/embed.php?hash=06a78134d10e31ea1ec46535ccdb6646', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(62, 43, 'https://embed1.streamc.xyz/embed.php?hash=37fdeadd9cc611945984e38b3a9b406d', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(63, 44, 'https://embed1.streamc.xyz/embed.php?hash=32c41090044395590d42dd0492289746', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(64, 45, 'https://embed1.streamc.xyz/embed.php?hash=44ed6455a74500045aedf7137e544c88', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(65, 46, 'https://embed1.streamc.xyz/embed.php?hash=0c4a73deecbb0f85b2d07a46924bb52e', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(66, 47, 'https://embed1.streamc.xyz/embed.php?hash=6782875d146c2faa4eef27e217fa1b61', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(67, 48, 'https://embed1.streamc.xyz/embed.php?hash=81eb351cf56bc9be206ef2597fd6591a', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(68, 49, 'https://embed1.streamc.xyz/embed.php?hash=11d4391082eae3ca83e9b193fc504c06', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(69, 50, 'https://embed1.streamc.xyz/embed.php?hash=faaaeb03f826239d18112f99b54258d8', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(70, 51, 'https://embed1.streamc.xyz/embed.php?hash=9541e8351757f3b9ea44039fccd0cd84', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(71, 52, 'https://embed1.streamc.xyz/embed.php?hash=557c786f4a5c48d46f3091777795cbb8', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(72, 53, 'https://embed1.streamc.xyz/embed.php?hash=61fe028744532f4cfe1a164262a96e17', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(73, 54, 'https://embed1.streamc.xyz/embed.php?hash=9921353e97653a77df0bac911e04e73e', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(74, 55, 'https://embed1.streamc.xyz/embed.php?hash=84abf600a5a1f401399d4797cac8adce', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(75, 56, 'https://embed1.streamc.xyz/embed.php?hash=dbde0064ecc262e13ee659ff5723a7e6', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(76, 57, 'https://embed1.streamc.xyz/embed.php?hash=b0655fcca506cb4c7ce7ffb2bc0746bc', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(77, 58, 'https://embed1.streamc.xyz/embed.php?hash=ce66f2e44413e11e2b1773494c1b48ee', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(78, 59, 'https://embed1.streamc.xyz/embed.php?hash=45cf89aa869458eb6c104f426dcdb3f8', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(79, 60, 'https://embed1.streamc.xyz/embed.php?hash=e64b9d071e888fb0f0f46c30e8eae8f8', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(80, 61, 'https://embed1.streamc.xyz/embed.php?hash=2ebae160d02b9e9f128ce867f4605db5', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(81, 62, 'https://embed1.streamc.xyz/embed.php?hash=4d70b4183d7951bde61aa4ac94f4bb1e', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(82, 63, 'https://embed1.streamc.xyz/embed.php?hash=ab49f1c34db63de924a58a1979b63501', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(83, 64, 'https://embed1.streamc.xyz/embed.php?hash=7b2494e931ddc93e303544d37b632c31', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(84, 65, 'https://embed1.streamc.xyz/embed.php?hash=146f0c60c40667e16bb6b20d7fc17ed9', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(85, 66, 'https://embed1.streamc.xyz/embed.php?hash=b13b67b53d3288d63b28259754d1a280', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(86, 67, 'https://embed1.streamc.xyz/embed.php?hash=29ff4383018b27444c993d0e468c83b3', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(87, 68, 'https://embed1.streamc.xyz/embed.php?hash=7e5beec0d98fa0f31b0d1875b88f0184', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(88, 69, 'https://embed1.streamc.xyz/embed.php?hash=55fa3c0d6b840f5b7f5d8e312798eb43', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(89, 70, 'https://embed1.streamc.xyz/embed.php?hash=005b37c69b336b0dd26d2f3871231e7d', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(90, 71, 'https://embed1.streamc.xyz/embed.php?hash=0934a77ba8d68500df9d2c7cf5129b7c', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(91, 72, 'https://embed1.streamc.xyz/embed.php?hash=a7e0e5b9f9c77d0a002f38afc52e332e', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(92, 73, 'https://embed1.streamc.xyz/embed.php?hash=907fb63134d90c5e506e7f6cf1ad56ef', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(93, 74, 'https://embed1.streamc.xyz/embed.php?hash=f053b28a27a9a5fd6f8e0b08e89cc58c', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(94, 75, 'https://embed1.streamc.xyz/embed.php?hash=289f58e2932b0b9d162c75554b6746ff', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(95, 76, 'https://embed1.streamc.xyz/embed.php?hash=90e8c20f7693e58f868b07105ef4bb61', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(96, 77, 'https://embed1.streamc.xyz/embed.php?hash=c7eddf78712a3b7a9fcf7b1b227f1d14', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(97, 78, 'https://embed1.streamc.xyz/embed.php?hash=d1798c01c5dc73e28cc4fdfb4f6f40a7', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(98, 79, 'https://embed1.streamc.xyz/embed.php?hash=43cdab3aa03de18dc3c711a0672e131e', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(99, 80, 'https://embed1.streamc.xyz/embed.php?hash=7e9b4b17c527c8ec06482c03dc6f5eec', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(100, 81, 'https://embed1.streamc.xyz/embed.php?hash=92a073df515c15f26b47e35363b02637', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(101, 82, 'https://embed1.streamc.xyz/embed.php?hash=f4e09c7fdbf949b0277ff94f6e14343c', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(102, 83, 'https://embed1.streamc.xyz/embed.php?hash=9e3ec29b97bc0e7b249828b242a69e77', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(103, 84, 'https://embed1.streamc.xyz/embed.php?hash=2b1c18171f890af04067fa3db7ec0051', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(104, 85, 'https://embed1.streamc.xyz/embed.php?hash=454430bf3ed0ec0272cfc8b7bcdaae43', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(105, 86, 'https://embed1.streamc.xyz/embed.php?hash=aa87d1267ae87feecb55cfb4ba728e9d', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(106, 87, 'https://embed1.streamc.xyz/embed.php?hash=4f95bbffbfebf3f88c44ed1f3026bfff', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(107, 88, 'https://embed1.streamc.xyz/embed.php?hash=71baac67cbe990da81e4a3b2ff027376', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(108, 89, 'https://embed1.streamc.xyz/embed.php?hash=f0b55c04d97c396b76c66ae3e1e129d3', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(109, 90, 'https://embed1.streamc.xyz/embed.php?hash=6882a4dba3dc24563dfe45e0fc95d82c', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(110, 91, 'https://embed1.streamc.xyz/embed.php?hash=b53a0ff29cb7d51d65b49a69d6f96ac4', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(111, 92, 'https://embed1.streamc.xyz/embed.php?hash=8fbb8e00f1f3209f570b629b2110bb8a', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(112, 93, 'https://embed1.streamc.xyz/embed.php?hash=781f25b1e82fc7a084d0a3a37f35efac', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(113, 94, 'https://embed1.streamc.xyz/embed.php?hash=5152b0e4e4e480ae68c522c4d1c4f50e', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(114, 95, 'https://embed1.streamc.xyz/embed.php?hash=6b8c9c46d13457f5c8f65854dd9b9bb6', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(115, 96, 'https://embed1.streamc.xyz/embed.php?hash=3ac2c0012523e1b336509f5fffe43145', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(116, 97, 'https://embed1.streamc.xyz/embed.php?hash=66a091d3a8ae0d42c104163616be5e09', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(117, 98, 'https://embed1.streamc.xyz/embed.php?hash=8cbdc45699d69e8e26b2cb365937037d', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(118, 99, 'https://embed1.streamc.xyz/embed.php?hash=2a62b0b40c777a0b1dbd230823b72f0c', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(119, 100, 'https://embed1.streamc.xyz/embed.php?hash=3c31f0f40d93dd3e2334b1d857b3d140', 8, 0, '2024-06-21 00:16:07', '2024-06-21 00:16:07'),
(121, 1, 'https://embed2.streamc.xyz/embed.php?hash=1811ea377182fd934dee2abdf1dd4770', 11, 3, '2024-06-22 20:41:03', '2024-07-01 08:11:16'),
(122, 1, 'https://embed1.streamc.xyz/embed.php?hash=d49baae53b5dd62ec03684e5294c12da', 12, 0, '2024-06-22 20:49:36', '2024-06-22 20:49:36'),
(123, 2, 'https://embed1.streamc.xyz/embed.php?hash=f2bd2fdd2625e6a80d72ab635331fab6', 12, 0, '2024-06-22 20:49:36', '2024-06-22 20:49:36'),
(124, 3, 'https://embed1.streamc.xyz/embed.php?hash=ee062fbc82da4faa826ce04d5e127529', 12, 0, '2024-06-22 20:49:36', '2024-06-22 20:49:36'),
(125, 4, 'https://embed1.streamc.xyz/embed.php?hash=b96ce4d861e94ff14576d4c0a7cdeac5', 12, 0, '2024-06-22 20:49:36', '2024-06-22 20:49:36'),
(126, 5, 'https://embed1.streamc.xyz/embed.php?hash=b28f695cea5c6bde7832fe71bc33b523', 12, 0, '2024-06-22 20:49:36', '2024-06-22 20:49:36'),
(127, 6, 'https://embed1.streamc.xyz/embed.php?hash=76f0105b9dd2e1889b751840d8367e03', 12, 0, '2024-06-22 20:49:36', '2024-06-22 20:49:36'),
(128, 7, 'https://embed1.streamc.xyz/embed.php?hash=368f9ae1580bc82368250fe304eed2bb', 12, 0, '2024-06-22 20:49:36', '2024-06-22 20:49:36'),
(129, 8, 'https://embed1.streamc.xyz/embed.php?hash=f81f84c72f178895a2e88b9f64c219c1', 12, 0, '2024-06-22 20:49:36', '2024-06-22 20:49:36'),
(130, 9, 'https://embed1.streamc.xyz/embed.php?hash=e75b60af1a0765a7971077438bed445f', 12, 0, '2024-06-22 20:49:36', '2024-06-22 20:49:36'),
(131, 1, 'https://embed1.streamc.xyz/embed.php?hash=def331739286f8688f2ff646441512de', 13, 15, '2024-06-22 22:37:25', '2024-07-01 09:07:52'),
(133, 1, 'https://embed3.streamc.xyz/embed.php?hash=1c09e8c69fcb9903bbcacf6580d0608b', 15, 0, '2024-06-23 10:12:28', '2024-06-23 10:12:28'),
(134, 2, 'https://embed2.streamc.xyz/embed.php?hash=506ac0b702d016398eff9de601a1686f', 15, 0, '2024-06-23 10:12:28', '2024-06-23 10:12:28'),
(135, 3, 'https://embed3.streamc.xyz/embed.php?hash=6f3b7d5dfd3aa8d13ea0160eb733b586', 15, 0, '2024-06-23 10:12:28', '2024-06-23 10:12:28'),
(136, 4, 'https://embed2.streamc.xyz/embed.php?hash=288577e25f453ea541d77ae322cf1045', 15, 0, '2024-06-23 10:12:28', '2024-06-23 10:12:28'),
(137, 1, 'https://embed2.streamc.xyz/embed.php?hash=682b5a5e7f70df86de42c3b6a07e3f64', 16, 0, '2024-06-25 07:55:24', '2024-06-25 07:55:24'),
(138, 2, 'https://embed3.streamc.xyz/embed.php?hash=958ec819e4f8662676d02994284cb9a6', 16, 0, '2024-06-25 07:55:24', '2024-06-25 07:55:24'),
(139, 1, 'https://embed3.streamc.xyz/embed.php?hash=f772eabebf815ffc2c647f5b5da5ac5c', 17, 0, '2024-06-26 15:42:24', '2024-06-26 15:42:24'),
(140, 1, 'https://embed2.streamc.xyz/embed.php?hash=a1850d2eb1a9ae4a4f8bb4437a881461', 18, 1, '2024-06-26 16:43:04', '2024-07-02 12:37:36'),
(141, 2, 'https://embed3.streamc.xyz/embed.php?hash=d229fadbb283eb017bd8ce4b645c9840', 18, 0, '2024-06-26 16:43:04', '2024-06-26 16:43:04'),
(142, 3, 'https://embed3.streamc.xyz/embed.php?hash=ee0a8d75c63fa5336d6b0c09ac65b314', 18, 0, '2024-06-26 16:43:04', '2024-06-26 16:43:04'),
(143, 4, 'https://embed3.streamc.xyz/embed.php?hash=463dde8ce4abd1cc6bc6c85706995b5f', 18, 0, '2024-06-26 16:43:04', '2024-06-26 16:43:04'),
(144, 5, 'https://embed3.streamc.xyz/embed.php?hash=9888a02d3c9918dcdab979b736457cb4', 18, 0, '2024-06-26 16:43:04', '2024-06-26 16:43:04'),
(145, 6, 'https://embed3.streamc.xyz/embed.php?hash=4c6a8a9924c6cd6230ff4aa62cbc8acb', 18, 0, '2024-06-26 16:43:04', '2024-06-26 16:43:04'),
(146, 7, 'https://embed3.streamc.xyz/embed.php?hash=8ee4d66b2f3d74c2114e6ce51d6b9a6d', 18, 0, '2024-06-26 16:43:04', '2024-06-26 16:43:04'),
(147, 8, 'https://embed3.streamc.xyz/embed.php?hash=bcbd46e8b0b08a62f77c3d7b2da61a16', 18, 0, '2024-06-26 16:43:04', '2024-06-26 16:43:04'),
(148, 9, 'https://embed3.streamc.xyz/embed.php?hash=22a40aace2ce9d4f5ff21fd1855cf181', 18, 0, '2024-06-26 16:43:04', '2024-06-26 16:43:04'),
(149, 10, 'https://embed3.streamc.xyz/embed.php?hash=87c6a7af5325537d48b665d971aecb7a', 18, 0, '2024-06-26 16:43:04', '2024-06-26 16:43:04'),
(155, 1, 'https://embed3.streamc.xyz/embed.php?hash=dbd3333ffc3a9d10a58c100966be0738', 19, 24, NULL, '2024-07-05 14:49:18'),
(157, 1, 'https://embed1.streamc.xyz/embed.php?hash=e2d1e23f12deaff28d9ebac05a4e6e23', 21, 2, '2024-06-29 17:28:13', '2024-07-03 11:11:41'),
(158, 1, 'https://embed3.streamc.xyz/embed.php?hash=16e912c40877de6749fca09cbc0cdc96', 10, 2, NULL, '2024-07-03 11:17:07'),
(159, 1, 'https://embed.streamc.xyz/embed.php?hash=dff2a3f4ad37ff7cc3ab1d4acc8558f0', 22, 1, '2024-06-29 17:57:55', '2024-06-30 16:47:35'),
(160, 2, 'https://embed.streamc.xyz/embed.php?hash=b9ac99089e66610408f0c768b2993c17', 22, 0, '2024-06-29 17:57:55', '2024-06-29 17:57:55'),
(161, 3, 'https://embed.streamc.xyz/embed.php?hash=5292c8a1625f7394206a647811b37f7d', 22, 0, '2024-06-29 17:57:55', '2024-06-29 17:57:55'),
(162, 4, 'https://embed.streamc.xyz/embed.php?hash=1eb67570a7199fca44071a6fba060872', 22, 0, '2024-06-29 17:57:55', '2024-06-29 17:57:55'),
(163, 5, 'https://embed.streamc.xyz/embed.php?hash=c072067abfc3ce3aff9d3c0e11056fa2', 22, 0, '2024-06-29 17:57:55', '2024-06-29 17:57:55'),
(164, 6, 'https://embed.streamc.xyz/embed.php?hash=8d5ff665838a404596c6323c30be586e', 22, 0, '2024-06-29 17:57:55', '2024-06-29 17:57:55'),
(165, 7, 'https://embed.streamc.xyz/embed.php?hash=885db7ee0f95c3cb58d9f21fae73b557', 22, 0, '2024-06-29 17:57:55', '2024-06-29 17:57:55'),
(166, 8, 'https://embed.streamc.xyz/embed.php?hash=66e25884f5440d16ab64247f33783b02', 22, 1, '2024-06-29 17:57:55', '2024-06-30 16:48:10'),
(167, 1, 'https://embed1.streamc.xyz/embed.php?hash=437c68309587575f10a939fb207cecae', 23, 6, '2024-07-01 18:29:06', '2024-07-03 16:24:37'),
(168, 2, 'https://embed1.streamc.xyz/embed.php?hash=0ef83baea1e592ee5cea8931308f2138', 23, 0, '2024-07-01 18:29:06', '2024-07-01 18:29:06'),
(169, 3, 'https://embed1.streamc.xyz/embed.php?hash=9e88b9dff79b1787c50f64000248e3f1', 23, 0, '2024-07-01 18:29:06', '2024-07-01 18:29:06'),
(170, 4, 'https://embed1.streamc.xyz/embed.php?hash=b5c2af6a6100771fe5d7737973305a4f', 23, 0, '2024-07-01 18:29:06', '2024-07-01 18:29:06'),
(171, 5, 'https://embed1.streamc.xyz/embed.php?hash=f6aac8fb9de8bf5957a0201fe12f5586', 23, 0, '2024-07-01 18:29:06', '2024-07-01 18:29:06'),
(172, 6, 'https://embed1.streamc.xyz/embed.php?hash=a3e0c971a7151848f0f87620b191c920', 23, 0, '2024-07-01 18:29:06', '2024-07-01 18:29:06'),
(173, 7, 'https://embed1.streamc.xyz/embed.php?hash=b66dec4b36a11a6d031367eda2fd4c05', 23, 0, '2024-07-01 18:29:06', '2024-07-01 18:29:06'),
(174, 8, 'https://embed1.streamc.xyz/embed.php?hash=0f5fee23ede907a2b41016a01bda0b65', 23, 0, '2024-07-01 18:29:06', '2024-07-01 18:29:06'),
(175, 9, 'https://embed1.streamc.xyz/embed.php?hash=37dedce3093e9d791371f0d24c72bb97', 23, 0, '2024-07-01 18:29:06', '2024-07-01 18:29:06'),
(176, 10, 'https://embed1.streamc.xyz/embed.php?hash=5f0d6149b4c9e8e33e97c7ca1ba68fc2', 23, 0, '2024-07-01 18:29:06', '2024-07-01 18:29:06'),
(177, 11, 'https://embed1.streamc.xyz/embed.php?hash=e456659ea8cf069d4f024510d690edb1', 23, 0, '2024-07-01 18:29:06', '2024-07-01 18:29:06'),
(178, 12, 'https://embed1.streamc.xyz/embed.php?hash=8fd0e4b54caa237f2dcc1a0d510cf72f', 23, 0, '2024-07-01 18:29:06', '2024-07-01 18:29:06'),
(179, 13, 'https://embed1.streamc.xyz/embed.php?hash=7718c74b90c51ed4535f25f365c13fc9', 23, 0, '2024-07-01 18:29:06', '2024-07-01 18:29:06'),
(180, 1, 'https://embed2.streamc.xyz/embed.php?hash=5f462fe9e34075b05656cc16beeb24cd', 24, 3, '2024-07-01 18:32:14', '2024-07-05 16:31:34'),
(181, 1, 'https://embed2.streamc.xyz/embed.php?hash=16e8041dce151ec111c399554abde266', 9, 0, NULL, NULL),
(182, 1, 'https://embed3.streamc.xyz/embed.php?hash=e8b54732a0f30800b851c6789d2cc256', 25, 5, NULL, '2024-07-03 17:29:55'),
(183, 2, 'https://embed3.streamc.xyz/embed.php?hash=a5e112a732d2a638d116a589749496ba', 25, 0, NULL, NULL),
(184, 1, 'https://embed1.streamc.xyz/embed.php?hash=2e1e004d621b46e0acf993cdd9957ab9', 28, 1, '2024-07-04 12:45:04', '2024-07-05 08:25:03'),
(185, 1, 'https://embed.streamc.xyz/embed.php?hash=37b6412633a02a1c8893bdef76875bdd', 29, 1, '2024-07-04 13:00:05', '2024-07-05 05:23:23'),
(186, 2, 'https://embed.streamc.xyz/embed.php?hash=9195d05afee1eeecd849a9eeb6f15864', 29, 0, '2024-07-04 13:00:05', '2024-07-04 13:00:05'),
(187, 3, 'https://embed.streamc.xyz/embed.php?hash=5d37f684f44560f64a15a595bb13eaac', 29, 0, '2024-07-04 13:00:05', '2024-07-04 13:00:05'),
(188, 4, 'https://embed.streamc.xyz/embed.php?hash=19327138c154f910fff4ff31a6cdbbca', 29, 0, '2024-07-04 13:00:05', '2024-07-04 13:00:05'),
(189, 5, 'https://embed.streamc.xyz/embed.php?hash=750123b6f8acf6ace2c76139bd88c615', 29, 0, '2024-07-04 13:00:05', '2024-07-04 13:00:05'),
(190, 1, 'https://embed.streamc.xyz/embed.php?hash=63a34b8d76ec10843570aec2d2c0cb58', 30, 2, '2024-07-04 13:08:50', '2024-07-05 12:26:07'),
(191, 2, 'https://embed.streamc.xyz/embed.php?hash=924b7123021f090cd231709b6f77b464', 30, 0, '2024-07-04 13:08:50', '2024-07-04 13:08:50'),
(192, 3, 'https://embed.streamc.xyz/embed.php?hash=e8041f6e824b2a3e261c4265acbf70b6', 30, 0, '2024-07-04 13:08:50', '2024-07-04 13:08:50'),
(193, 4, 'https://embed.streamc.xyz/embed.php?hash=11c4c684aa2e5e0909c22fb33e029a4e', 30, 0, '2024-07-04 13:08:50', '2024-07-04 13:08:50'),
(194, 5, 'https://embed.streamc.xyz/embed.php?hash=82b23a6dd6b7bbf21255ba63c2529e2a', 30, 0, '2024-07-04 13:08:50', '2024-07-04 13:08:50'),
(195, 6, 'https://embed.streamc.xyz/embed.php?hash=6c93c7c630a1c9e1ec6a2380b5b0a94c', 30, 1, '2024-07-04 13:08:50', '2024-07-05 10:24:19'),
(196, 7, 'https://embed.streamc.xyz/embed.php?hash=cfad7c047d62b27c4b6c0f324f8d090f', 30, 0, '2024-07-04 13:08:50', '2024-07-04 13:08:50'),
(197, 1, 'https://embed.streamc.xyz/embed.php?hash=a8e683e9c81ea14fac266a02d9237d6f', 14, 0, NULL, NULL),
(199, 1, 'https://embed2.streamc.xyz/embed.php?hash=6337e9d8e737da703efb59273dae2f08', 27, 0, NULL, NULL),
(200, 1, 'https://embed2.streamc.xyz/embed.php?hash=03557d2d88c31fd3df0b3f534b6eb1e2', 32, 0, '2024-07-05 09:05:28', '2024-07-05 09:05:28'),
(201, 2, 'https://embed2.streamc.xyz/embed.php?hash=07e02a62e3c89de5c36226ae3c5f42e1', 32, 0, '2024-07-05 09:05:28', '2024-07-05 09:05:28'),
(202, 3, 'https://embed3.streamc.xyz/embed.php?hash=9a238f3c03ba7351845ca1cd886436b6', 32, 0, '2024-07-05 09:05:28', '2024-07-05 09:05:28'),
(203, 4, 'https://embed3.streamc.xyz/embed.php?hash=901a53ab2747d0e576bcf2719c9d537c', 32, 0, '2024-07-05 09:05:28', '2024-07-05 09:05:28'),
(204, 5, 'https://embed2.streamc.xyz/embed.php?hash=318ec194576925e75ff5819c8c11054e', 32, 0, '2024-07-05 09:05:28', '2024-07-05 09:05:28'),
(205, 1, 'https://embed.streamc.xyz/embed.php?hash=f36c938de762371e96460894bfc39031', 33, 0, '2024-07-05 09:09:42', '2024-07-05 09:09:42'),
(206, 2, 'https://embed.streamc.xyz/embed.php?hash=125db2f5da3b8eb1578cb05abeb90a1e', 33, 0, '2024-07-05 09:09:42', '2024-07-05 09:09:42'),
(207, 3, 'https://embed.streamc.xyz/embed.php?hash=fec44bfaeeda298adb8af1d51830cd43', 33, 0, '2024-07-05 09:09:42', '2024-07-05 09:09:42'),
(208, 1, 'https://embed.streamc.xyz/embed.php?hash=3c023d5bda4b93b5477003c41e139e92', 34, 0, '2024-07-05 09:20:57', '2024-07-05 09:20:57'),
(209, 1, 'https://embed1.streamc.xyz/embed.php?hash=9bf451e0a2e053f47057b95c09d8c634', 35, 6, '2024-07-05 09:25:11', '2024-07-07 07:10:30'),
(210, 1, 'https://embed1.streamc.xyz/embed.php?hash=68b38551b2050917df401513a4d05ab5', 36, 1, '2024-07-05 09:28:01', '2024-07-05 14:54:52'),
(211, 2, 'https://embed1.streamc.xyz/embed.php?hash=935b796a09c47d6811cb511beb96e4bc', 36, 0, '2024-07-05 09:28:01', '2024-07-05 09:28:01'),
(212, 3, 'https://embed1.streamc.xyz/embed.php?hash=bebb6faf6450a0b2a8bc3ba7a7969814', 36, 0, '2024-07-05 09:28:01', '2024-07-05 09:28:01'),
(213, 1, 'https://embed.streamc.xyz/embed.php?hash=3be71f0a761dc8984f7172b918293d1a', 39, 4, '2024-07-05 09:59:40', '2024-07-06 13:40:37'),
(214, 2, 'https://embed.streamc.xyz/embed.php?hash=0b0c53e0d9cc5b3749fd0899a555cb4a', 39, 0, '2024-07-05 09:59:40', '2024-07-05 09:59:40'),
(215, 3, 'https://embed.streamc.xyz/embed.php?hash=0f286408ada6acc1c97faff358610608', 39, 0, '2024-07-05 09:59:40', '2024-07-05 09:59:40'),
(216, 4, 'https://embed.streamc.xyz/embed.php?hash=001b961139f9014774839c79f6297d74', 39, 0, '2024-07-05 09:59:40', '2024-07-05 09:59:40'),
(217, 5, 'https://embed.streamc.xyz/embed.php?hash=6f594a709fcf6c9416d4aca587ee0491', 39, 0, '2024-07-05 09:59:40', '2024-07-05 09:59:40'),
(218, 6, 'https://embed.streamc.xyz/embed.php?hash=43e7b42b840a6dd141f35e3bf48d1aa7', 39, 0, '2024-07-05 09:59:40', '2024-07-05 09:59:40'),
(219, 7, 'https://embed.streamc.xyz/embed.php?hash=83564f68828d25da6a2c9bd47369bd77', 39, 0, '2024-07-05 09:59:40', '2024-07-05 09:59:40'),
(220, 8, 'https://embed.streamc.xyz/embed.php?hash=615133405371055c700cbc5beca49d44', 39, 0, '2024-07-05 09:59:40', '2024-07-05 09:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `funds`
--

CREATE TABLE `funds` (
  `id` bigint UNSIGNED NOT NULL,
  `tong_tien` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `funds`
--

INSERT INTO `funds` (`id`, `tong_tien`, `created_at`, `updated_at`) VALUES
(1, 2539200, '2024-07-02 17:47:05', '2024-07-07 07:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `fund_transactions`
--

CREATE TABLE `fund_transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `bien_dong_so_du` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `truoc_giao_dich` bigint NOT NULL,
  `sau_giao_dich` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fund_transactions`
--

INSERT INTO `fund_transactions` (`id`, `user_id`, `bien_dong_so_du`, `mo_ta`, `truoc_giao_dich`, `sau_giao_dich`, `created_at`, `updated_at`) VALUES
(17, 10, '+10000', 'Nạp quỹ khi mua phim HỘI CHỨNG TUỔI THANH XUÂN: CÔ BÉ ĐEO CẶP SÁCH', 0, 10000, '2024-07-03 11:10:24', '2024-07-03 11:10:24'),
(18, 10, '+5000', 'Tiền phạt người dùng spam quá 3 lần', 10000, 15000, '2024-07-03 11:11:41', '2024-07-03 11:11:41'),
(19, 10, '+2000', 'Nạp quỹ khi mua phim THIẾU NIÊN VÀ CHIM DIỆC', 15000, 17000, '2024-07-03 12:38:10', '2024-07-03 12:38:10'),
(20, 10, '+30000', 'Nạp quỹ khi mua phim GIA TỘC RỒNG (PHẦN 2)', 17000, 47000, '2024-07-03 14:22:42', '2024-07-03 14:22:42'),
(21, 10, '+200', 'Nạp quỹ khi mua phim GEATS EXTRA: KAMEN RIDER GAZER', 47000, 47200, '2024-07-03 14:40:04', '2024-07-03 14:40:04'),
(22, 10, '+30000', 'Nạp quỹ khi mua phim CHUYỆN NGÀY XƯA Ở… HOLLYWOOD', 47200, 77200, '2024-07-03 14:50:07', '2024-07-03 14:50:07'),
(23, 10, '+2400', 'Nạp quỹ khi mua phim BỐ GIÀ (2021)', 77200, 79600, '2024-07-03 14:50:52', '2024-07-03 14:50:52'),
(24, 10, '+30000', 'Nạp quỹ khi mua phim CÔ ẤY, NGÀY VÀ ĐÊM', 79600, 109600, '2024-07-03 14:52:51', '2024-07-03 14:52:51'),
(25, 10, '+200', 'Nạp quỹ khi mua phim 7 NĂM CHƯA CƯỚI SẼ CHIA TAY\r\n', 109600, 109800, '2024-07-03 14:54:22', '2024-07-03 14:54:22'),
(26, 10, '+400', 'Nạp quỹ khi mua phim 7 VIÊN NGỌC RỒNG\r\n', 109800, 110200, '2024-07-03 14:59:44', '2024-07-03 14:59:44'),
(27, 10, '-2000', 'Tiền thưởng báo lỗi phim trên 5 lần đã giúp admin fix thành công', 110200, 108200, '2024-07-03 15:37:50', '2024-07-03 15:37:50'),
(28, 10, '-2000', 'Tiền thưởng báo lỗi phim trên 5 lần đã giúp admin fix thành công', 108200, 106200, '2024-07-03 15:38:01', '2024-07-03 15:38:01'),
(29, 10, '-2000', 'Tiền thưởng báo lỗi phim trên 5 lần đã giúp admin fix thành công', 106200, 104200, '2024-07-03 15:38:34', '2024-07-03 15:38:34'),
(30, 10, '-2000', 'Tiền thưởng báo lỗi phim trên 5 lần đã giúp admin fix thành công', 104200, 102200, '2024-07-03 15:40:15', '2024-07-03 15:40:15'),
(31, 10, '-2000', 'Tiền thưởng báo lỗi phim trên 5 lần đã giúp admin fix thành công', 102200, 100200, '2024-07-03 15:40:18', '2024-07-03 15:40:18'),
(32, 10, '-2000', 'Tiền thưởng báo lỗi phim trên 5 lần đã giúp admin fix thành công', 100200, 98200, '2024-07-03 15:40:23', '2024-07-03 15:40:23'),
(33, 10, '+200', 'Nạp quỹ khi mua phim 7 NĂM CHƯA CƯỚI SẼ CHIA TAY\r\n', 98200, 98400, '2024-07-03 15:40:23', '2024-07-03 15:40:23'),
(34, 10, '-2000', 'Tiền thưởng báo lỗi phim trên 5 lần đã giúp admin fix thành công', 98400, 96400, '2024-07-03 15:40:23', '2024-07-03 15:40:23'),
(35, 10, '-2000', 'Tiền thưởng báo lỗi phim trên 5 lần đã giúp admin fix thành công', 96400, 94400, '2024-07-03 15:40:25', '2024-07-03 15:40:25'),
(36, 10, '-2000', 'Tiền thưởng báo lỗi phim trên 5 lần đã giúp admin fix thành công', 94400, 92400, '2024-07-03 15:40:31', '2024-07-03 15:40:31'),
(37, 10, '-2000', 'Tiền thưởng báo lỗi phim trên 5 lần đã giúp admin fix thành công', 92400, 90400, '2024-07-03 15:40:36', '2024-07-03 15:40:36'),
(38, 10, '-2000', 'Tiền thưởng báo lỗi phim trên 5 lần đã giúp admin fix thành công', 90400, 88400, '2024-07-03 15:40:40', '2024-07-03 15:40:40'),
(39, 10, '-2000', 'Tiền thưởng báo lỗi phim trên 5 lần đã giúp admin fix thành công', 88400, 86400, '2024-07-03 15:40:44', '2024-07-03 15:40:44'),
(40, 10, '-2000', 'Tiền thưởng báo lỗi phim trên 5 lần đã giúp admin fix thành công', 86400, 84400, '2024-07-03 15:40:48', '2024-07-03 15:40:48'),
(41, 10, '-5000', 'Tiền thưởng báo lỗi phim trên 10 lần đã giúp admin fix thành công', 84400, 79400, '2024-07-03 15:41:27', '2024-07-03 15:41:27'),
(42, 10, '-5000', 'Tiền thưởng báo lỗi phim trên 10 lần đã giúp admin fix thành công', 79400, 74400, '2024-07-03 15:41:59', '2024-07-03 15:41:59'),
(43, 10, '-5000', 'Tiền thưởng báo lỗi phim trên 10 lần đã giúp admin fix thành công', 74400, 69400, '2024-07-03 15:42:02', '2024-07-03 15:42:02'),
(44, 10, '-5000', 'Tiền thưởng báo lỗi phim trên 10 lần đã giúp admin fix thành công', 69400, 64400, '2024-07-03 15:42:06', '2024-07-03 15:42:06'),
(45, 10, '-5000', 'Tiền thưởng báo lỗi phim trên 10 lần đã giúp admin fix thành công', 64400, 59400, '2024-07-03 15:42:43', '2024-07-03 15:42:43'),
(46, 10, '-5000', 'Tiền thưởng báo lỗi phim trên 10 lần đã giúp admin fix thành công', 59400, 54400, '2024-07-03 15:42:45', '2024-07-03 15:42:45'),
(47, 10, '-5000', 'Tiền thưởng báo lỗi phim trên 10 lần đã giúp admin fix thành công', 54400, 49400, '2024-07-03 15:42:56', '2024-07-03 15:42:56'),
(48, 10, '-5000', 'Tiền thưởng báo lỗi phim trên 10 lần đã giúp admin fix thành công', 49400, 44400, '2024-07-03 15:45:53', '2024-07-03 15:45:53'),
(49, 10, '-5000', 'Tiền thưởng báo lỗi phim trên 10 lần đã giúp admin fix thành công', 44400, 39400, '2024-07-03 15:45:56', '2024-07-03 15:45:56'),
(50, 10, '-5000', 'Tiền thưởng báo lỗi phim trên 10 lần đã giúp admin fix thành công', 39400, 34400, '2024-07-03 15:46:17', '2024-07-03 15:46:17'),
(51, 10, '-5000', 'Tiền thưởng báo lỗi phim trên 10 lần đã giúp admin fix thành công', 34400, 29400, '2024-07-03 15:46:40', '2024-07-03 15:46:40'),
(52, 10, '-5000', 'Tiền thưởng báo lỗi phim trên 10 lần đã giúp admin fix thành công', 29400, 24400, '2024-07-03 15:46:43', '2024-07-03 15:46:43'),
(53, 10, '-5000', 'Tiền thưởng báo lỗi phim trên 10 lần đã giúp admin fix thành công', 24400, 19400, '2024-07-03 15:46:44', '2024-07-03 15:46:44'),
(54, 10, '+2000', 'Nạp quỹ khi mua phim CĂN HỘ 404', 19400, 21400, '2024-07-03 16:18:26', '2024-07-03 16:18:26'),
(55, 10, '-5000', 'Tiền thưởng báo lỗi phim trên 10 lần đã giúp admin fix thành công', 21400, 16400, '2024-07-03 16:18:26', '2024-07-03 16:18:26'),
(56, 10, '+5000', 'Tiền phạt người dùng spam quá 3 lần', 16400, 21400, '2024-07-03 16:25:32', '2024-07-03 16:25:32'),
(57, 10, '-5000', 'Tiền thưởng báo lỗi phim trên 10 lần đã giúp admin fix thành công', 21400, 16400, '2024-07-03 16:25:32', '2024-07-03 16:25:32'),
(58, 10, '+5000', 'Tiền phạt người dùng spam quá 3 lần', 16400, 21400, '2024-07-03 16:30:38', '2024-07-03 16:30:38'),
(59, 10, '-5000', 'Tiền thưởng báo lỗi phim trên 10 lần đã giúp admin fix thành công', 21400, 16400, '2024-07-03 16:30:38', '2024-07-03 16:30:38'),
(60, 21, '+2400000', 'Nạp quỹ khi mua phim ULTRAMAN: TRỖI DẬY', 16400, 2416400, '2024-07-04 17:50:16', '2024-07-04 17:50:16'),
(61, 10, '-5000', 'Tiền thưởng báo lỗi phim trên 10 lần đã giúp admin fix thành công', 2416400, 2411400, '2024-07-04 17:51:33', '2024-07-04 17:51:33'),
(62, 10, '-5000', 'Tiền thưởng báo lỗi phim trên 10 lần đã giúp admin fix thành công', 2411400, 2406400, '2024-07-04 17:51:55', '2024-07-04 17:51:55'),
(63, 10, '-5000', 'Tiền thưởng báo lỗi phim trên 10 lần đã giúp admin fix thành công', 2406400, 2401400, '2024-07-04 17:52:13', '2024-07-04 17:52:13'),
(64, 10, '-5000', 'Tiền thưởng báo lỗi phim trên 10 lần đã giúp admin fix thành công', 2401400, 2396400, '2024-07-04 17:52:15', '2024-07-04 17:52:15'),
(65, 10, '-5000', 'Tiền thưởng báo lỗi phim trên 10 lần đã giúp admin fix thành công', 2396400, 2391400, '2024-07-04 17:53:11', '2024-07-04 17:53:11'),
(66, 21, '+10000', 'Nạp quỹ khi mua phim HỘI CHỨNG TUỔI THANH XUÂN: CÔ BÉ ĐEO CẶP SÁCH', 2391400, 2401400, '2024-07-04 18:08:42', '2024-07-04 18:08:42'),
(67, 10, '+5000', 'Tiền phạt người dùng spam quá 3 lần', 2401400, 2406400, '2024-07-05 08:25:03', '2024-07-05 08:25:03'),
(68, 10, '+50000', 'Nạp quỹ khi mua phim STAR WARS: THE ACOLYTE (PHẦN 1)', 2406400, 2456400, '2024-07-05 09:05:43', '2024-07-05 09:05:43'),
(69, 10, '+4000', 'Nạp quỹ khi mua phim HẠN CHÓT ĐỂ YÊU', 2456400, 2460400, '2024-07-05 09:17:04', '2024-07-05 09:17:04'),
(70, 10, '+20000', 'Nạp quỹ khi mua phim SHOW CỦA ĐEN', 2460400, 2480400, '2024-07-05 09:22:33', '2024-07-05 09:22:33'),
(71, 10, '+5000', 'Tiền phạt người dùng spam quá 3 lần', 2480400, 2485400, '2024-07-05 10:21:48', '2024-07-05 10:21:48'),
(72, 10, '+5000', 'Tiền phạt người dùng spam quá 3 lần', 2485400, 2490400, '2024-07-05 10:51:49', '2024-07-05 10:51:49'),
(73, 21, '+5000', 'Tiền phạt người dùng spam quá 3 lần', 2490400, 2495400, '2024-07-05 11:02:53', '2024-07-05 11:02:53'),
(74, 10, '+5000', 'Tiền phạt người dùng spam quá 3 lần', 2495400, 2500400, '2024-07-05 16:30:31', '2024-07-05 16:30:31'),
(75, 22, '+20000', 'Nạp quỹ khi mua phim SHOW CỦA ĐEN', 2500400, 2520400, '2024-07-07 06:20:06', '2024-07-07 06:20:06'),
(76, 22, '+4000', 'Nạp quỹ khi mua phim HẠN CHÓT ĐỂ YÊU', 2520400, 2524400, '2024-07-07 06:21:33', '2024-07-07 06:21:33'),
(77, 22, '+2400', 'Nạp quỹ khi mua phim BỐ GIÀ (2021)', 2524400, 2526800, '2024-07-07 06:52:40', '2024-07-07 06:52:40'),
(78, 22, '+200', 'Nạp quỹ khi mua phim GEATS EXTRA: KAMEN RIDER GAZER', 2526800, 2527000, '2024-07-07 06:54:32', '2024-07-07 06:54:32'),
(79, 22, '+10000', 'Nạp quỹ khi mua phim HỘI CHỨNG TUỔI THANH XUÂN: CÔ BÉ ĐEO CẶP SÁCH', 2527000, 2537000, '2024-07-07 06:57:32', '2024-07-07 06:57:32'),
(80, 22, '+200', 'Nạp quỹ khi mua phim 7 NĂM CHƯA CƯỚI SẼ CHIA TAY\r\n', 2537000, 2537200, '2024-07-07 07:04:42', '2024-07-07 07:04:42'),
(81, 22, '+2000', 'Nạp quỹ khi mua phim CĂN HỘ 404', 2537200, 2539200, '2024-07-07 07:07:36', '2024-07-07 07:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `id` bigint UNSIGNED NOT NULL,
  `ten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`id`, `ten`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Phim lẻ', 'phim-le', NULL, NULL),
(2, 'Phim bộ', 'phim-bo', NULL, NULL),
(3, 'TV Shows', 'tv-shows', NULL, NULL),
(6, 'Phim sắp chiếu', 'phim-sap-chieu', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_06_20_153812_create_movies_table', 1),
(6, '2024_06_20_155200_create_episodes_table', 1),
(7, '2024_06_20_155323_create_catelogues_table', 1),
(8, '2024_06_20_160537_create_lists_table', 1),
(9, '2024_06_20_162114_create_movie_catelogue_table', 1),
(10, '2024_06_23_094526_create_comments_table', 2),
(11, '2014_10_12_100000_create_password_resets_table', 3),
(12, '2024_06_23_144608_create_user_movie_table', 4),
(13, '2024_06_23_145009_create_user_coin_table', 4),
(14, '2024_06_23_145009_create_user_coins_table', 5),
(15, '2024_06_23_145729_create_bill_table', 5),
(16, '2024_06_25_101627_create_payment_recharges_table', 6),
(17, '2024_06_25_101723_create_bills_table', 6),
(18, '2024_06_26_183405_create_transaction_history_table', 7),
(19, '2024_06_26_183405_create_transaction_histories_table', 8),
(20, '2024_06_27_105406_create_posts_table', 9),
(21, '2024_06_27_105548_create_catelogue_posts_table', 9),
(22, '2024_06_28_110033_create_tag_posts_table', 10),
(23, '2024_06_28_121641_create_post_tagpost_table', 11),
(24, '2024_06_28_191333_create_post_tagpost_table', 12),
(25, '2024_06_28_191647_create_tag_posts_table', 12),
(26, '2024_06_29_195604_create_user_movie_likes_table', 12),
(27, '2024_07_01_153756_create_notifications_table', 13),
(28, '2024_07_03_003604_create_funds_table', 14),
(29, '2024_07_03_004103_create_fund_transactions_table', 15),
(30, '2024_07_03_154652_create_admin_notifications_table', 16),
(31, '2024_07_04_161622_create_setting_controllers_table', 17),
(32, '2024_07_04_161622_create_settings_table', 18),
(33, '2024_07_05_194228_create_comment_likes_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` bigint UNSIGNED NOT NULL,
  `ten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `list_id` bigint UNSIGNED NOT NULL,
  `anh` text COLLATE utf8mb4_unicode_ci,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngon_ngu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_tap` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `chat_luong` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dao_dien` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dien_vien` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nam_phat_hanh` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quoc_gia` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` bigint NOT NULL DEFAULT '0',
  `trang_thai` enum('Full','Đang cập nhật') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Đang cập nhật',
  `is_vip` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `ten`, `list_id`, `anh`, `slug`, `mo_ta`, `ngon_ngu`, `so_tap`, `chat_luong`, `dao_dien`, `dien_vien`, `nam_phat_hanh`, `quoc_gia`, `gia`, `trang_thai`, `is_vip`, `created_at`, `updated_at`) VALUES
(1, 'CHÚNG TA ĐÃ TRƯỞNG THÀNH', 1, 'https://phim.nguonc.com/public/images/Film/fGYX0LCsL4hcirSChhHAevT09nT.jpg', 'chung-ta-da-truong-thanh', 'Câu chuyện xoay quanh hai cậu bé, Malik và Eric, khám phá niềm vui và khó khăn trong việc lớn lên tại khu phức hợp nhà ở công cộng Cabrini-Green ở Chicago vào năm 1992. Phim mang thông điệp về tình bạn và cuộc sống trong môi trường khó khăn.', 'Vietsub', '1', 'HD', 'Minhal Baig', 'Blake Cameron James, Gian Knight Ramirez, S. Epatha Merkerson', '2024', 'United States of America', 0, 'Đang cập nhật', 0, '2024-06-21 03:33:26', '2024-06-21 03:33:26'),
(2, 'PHONG NGUYỆT VÔ BIÊN', 2, 'https://phim.nguonc.com/public/images/Post/5/phong-nguyet-vo-bien.jpg', 'phong-nguyet-vo-bien', 'Cô đào nổi tiếng ở Vân Thành vì muốn trả thù cho sư huynh mà bất chấp nguy hiểm nương thân vào vòng tay của con trai quân phiệt Hạ Hành Châu, đồng thời dày công bố trí cạm bẫy, lợi dụng hắn để từng bước tiếp cận trung tâm quyền lực, cũng dần dần tiến gần đến sự thật. Nhưng không biết từ khi nào trái tim cô đã sa vào mưu kế này mất rồi... Thiếu soái lạnh lùng Hạ Hành Châu được mệnh danh là Diêm La của Vân Thành, dù gặp chuyện nhỏ cũng sẽ báo thù vì đã nhìn thấu sự đen tối và thối nát của thế gian. Mọi người đều cho rằng hắn chấp nhận cô đào chủ động dâng mình này là để trả thù người thương từng phản bội mình, ai ngờ cô lại là tia sáng duy nhất có thể chiếu rọi nội tâm lạnh lùng của Hạ Hành Châu. Bất chấp gió giật mưa rào, hải đường vẫn nở rộ, hai kẻ thông minh tính toán kỹ lưỡng cuối cùng cũng không thể thoát khỏi ải tình, chìm đắm trong mối tình si mê đầy trắc trở...', 'Vietsub', '24', 'HD', 'Đang cập nhật', 'Hồng Tiêu, Nghiêm Tử Hiền', '2024', 'China', 0, 'Đang cập nhật', 0, '2024-06-21 03:33:26', '2024-06-21 03:33:26'),
(3, 'NHỮNG NGƯỜI BẠN TƯỞNG TƯỢNG', 1, 'https://phim.nguonc.com/public/images/Film/qiCCLocNAt9XgyMXOAoDr8iMrg4.jpg', 'nhung-nguoi-ban-tuong-tuong', 'Bộ phim xoay quanh một cô bé bất ngờ phát hiện ra mình có thể nhìn thấy những người bạn tưởng tượng của mọi người. Và cuộc hành trình bắt đầu khi cô bé sử dụng siêu năng lực của mình để giúp đỡ những người bạn tưởng tượng này tránh khỏi việc bị bỏ rơi và lãng quên bằng cách tìm kiếm, kết nối chúng với những đứa trẻ.', 'Lồng tiếng', '1', 'HD', 'John Krasinski', 'Cailey Fleming, Ryan Reynolds, John Krasinski', '2024', 'United States of America', 0, 'Đang cập nhật', 0, '2024-06-21 03:33:26', '2024-06-21 03:33:26'),
(4, 'RAO BÁN LONDON (PHẦN 1)', 3, 'https://phim.nguonc.com/public/images/Post/8/rao-ban-london-phan-1-1.jpg', 'rao-ban-london', 'Nhóm các nhà môi giới bất động sản theo đuổi những bất động sản cao cấp tại các khu vực giàu có của London, cân bằng cuộc sống cá nhân đồng thời phấn đấu trên thị trường bất động sản cao cấp.\r\n\r\n', 'Vietsub', '7', 'HD', 'Đang cập nhật', 'Daniel Daggers\r\n', '2024', 'United Kingdom\r\n', 0, 'Đang cập nhật', 0, NULL, NULL),
(5, 'THỦ QUÂN CỦA WORLD CUP\r\n', 3, 'https://phim.nguonc.com/public/images/Post/2D9ShIkrNJuiPeLZEOzTkbhm1HB.jpg', 'thu-quan-cua-world-cup', 'Từ phòng thay đồ cho đến sân cỏ, loạt phim tài liệu này mang đến góc nhìn độc quyền về toàn bộ 32 đội khi họ chiến đấu vì vinh quang bóng đá tại FIFA World Cup 2022.\r\n\r\n', 'Vietsub', '6', 'HD', 'Ben Turner, Gabe Turner\r\n', 'Lionel Messi, Romain Saiss, Lionel Scaloni\r\n', '2023', 'Argentina', 0, 'Đang cập nhật', 0, NULL, NULL),
(6, '7 NĂM CHƯA CƯỚI SẼ CHIA TAY\r\n', 2, 'https://phim.nguonc.com/public/images/Post/9/7-nam-chua-cuoi-se-chia-tay.jpg', '7-nam-chua-cuoi-se-chia-tay', '7 Năm Chưa Cưới Sẽ Chia Tay xoay quanh câu chuyện của một chàng trai nhà giàu phải lòng cô gái ngây thơ nhưng ngoan cường, người có liên quan đến cái chết của bạn gái anh. Khi câu chuyện mở ra, những bí mật bắt đầu sáng tỏ.\r\n\r\n', 'Việt Nam', '25', 'HD', 'Nguyễn Hoàng Anh\r\n', 'Thúy Ngân, Võ Cảnh, Jun Phạm, Thảo Tâm\r\n', '2024', 'Việt Nam', 1000, 'Đang cập nhật', 0, NULL, NULL),
(7, 'HỌNG SÚNG VÔ HÌNH 2.5\r\n', 1, 'https://phim.nguonc.com/public/images/Film/v9niLQWVzVPB1cP1ThNdEaLZG1Q.jpg', 'hong-sung-vo-hinh', 'Trung úy Frank Drebin phát hiện ra bạn gái mới của bạn gái cũ có liên quan đến âm mưu bắt cóc một nhà khoa học ủng hộ năng lượng mặt trời.\r\n\r\n', 'Vietsub', '1', 'HD', 'David Zucker\r\n', 'Leslie Nielsen, Priscilla Presley, George Kennedy\r\n', '1991', 'United States of America\r\n', 0, 'Đang cập nhật', 0, NULL, NULL),
(8, '7 VIÊN NGỌC RỒNG\r\n', 2, 'https://phim.nguonc.com/public/images/Film/92364.jpg', '7-vien-ngoc-rong', 'Câu chuyện bắt đầu với SonGoku, một cậu bé có đuôi sống với ông nội trong một ngôi nhà nhỏ trong rừng. Ở đây cậu bé gặp Bulma. Bulma được chứng kiến sức mạnh của SonGoku và muốn cùng cô lên đường tìm 7 viên ngọc rồng. Bảy viên ngọc rồng chứa đựng một bí mật có thể triệu hồi Long thần và ban điều ước cho ai sở hữu chúng.Trên cuộc hành trình dài đi tìm bảy viên ngọc rồng, họ gặp những người bạn và những đấu sĩ huyền thoại cũng như nhiều ác quỷ. Họ trải qua những khó khăn và học hỏi các chiêu thức võ thuật đặc biệt để tham gia thi đấu trong đại hội võ thuật thế giới được tổ chức hằng năm. Ngoài các sự kiện đại hội võ thuật, Goku và các bạn còn phải đối phó với các thế lực độc ác như Đại vương Pilaf, Quân đoàn khăn đỏ, Đại ma vương Piccolo và những đứa con của hắn.\r\n\r\n\r\n', 'Vietsub\r\n', '153', 'HD', 'Đang cập nhật', 'Đang cập nhật', '1986', 'Japan', 2000, 'Đang cập nhật', 0, NULL, NULL),
(9, 'ĐỊCH NHÂN KIỆT: ĐẠI HUYỄN THUẬT SƯ', 1, 'https://phim.nguonc.com/public/images/Post/8/v_176908446_m_601_vi_260_360.jpg', 'dinh-nhan-kiet', 'Chuyển thể từ truyền thuyết dân gian, kể về một vụ việc kỳ bí xảy ra tại vùng đất Ninh Châu, khi quái vật đang quấy phá, Địch Nhân Kiệt sau khi biết được chuyện này đã dẫn theo trợ thủ tiến hành điều tra bí mật lại phát hiện ra một vụ án tham nhũng không ai biết đến.', 'Vietsub', '1', 'HD', 'Guo Shaohuan', 'Jiao Hai Hua, Judy, Kenneth, Zhang Li Jun', '2024', 'China', 0, 'Đang cập nhật', 0, NULL, '2024-06-29 03:45:32'),
(10, 'CỬU LONG THÀNH TRẠI: VÂY THÀNH', 1, 'https://phim.nguonc.com/public/images/Film/eUPRPk1q797AcVypqZ1sUdtTauV.jpg', 'cuu-long-thanh-trai-vay-thanh', 'Lạc Quân nhập cảnh trái phép vào Hồng Kông và được Quyền Phong giúp đỡ để tồn tại ở Cửu Long Thành Trại - khu vực phức tạp có rất nhiều băng đảng xã hội đen. Trong lúc gặp nạn họ vô tình phát hiện ra quy luật ngầm giữa sự hỗn loạn phía sau nó. Đứng trước những thế lực tội ác, họ đứng lên chống lại âm mưu đen tối của kẻ thù để giữ lời thề bảo vệ sự bình yên của nơi này.', 'Vietsub', '1', 'HD', 'Trịnh Bảo Thụy', 'Cổ Thiên Lạc, Hồng Kim Bảo, Lâm Phong', '2024', 'China, Hong Kong', 0, 'Full', 0, '2024-06-22 20:14:34', '2024-06-29 17:43:28'),
(11, 'BỆNH VIỆN MA ÁM', 1, 'https://phim.nguonc.com/public/images/Film/qwGTGlI1TU8tFs2LsKSXIAzg2pE.jpg', 'benh-vien-ma-am', 'Các phương pháp không chính thống của Lamb khiến Newgate ngạc nhiên. Lamb nói rằng anh ta không tin vào việc đánh thuốc mê hoặc giam giữ bệnh nhân, và anh ta khuyến khích họ ảo tưởng khi anh ta cảm thấy điều đó sẽ mang lại cho họ hạnh phúc lớn hơn. Như một ví dụ, Lamb khiến Newgate xem xét Arthur Timbs đầy biến động, người bị gia đình bán cho một suất phụ, không có bất kỳ loại thuốc an thần nào mà chỉ sử dụng đôi mắt của anh ấy, với Newgate quản lý để giúp Timbs bình tĩnh lại. Newgate trở nên say mê Graves. Trong một bữa tiệc thịnh soạn, Newgate và Finn tranh cãi, và như một thỏa thuận đình chiến, Finn đề nghị nâng ly chúc mừng. Trước khi Newgate có thể uống nó, Graves khiến anh ta làm đổ đồ uống của mình và lặng lẽ khăng khăng rằng anh ta chạy trốn khỏi trại tị nạn, nhưng Newgate từ chối rời đi mà không có cô ấy', 'Vietsub', '1', 'HD', 'Brad Anderson', 'Kate Beckinsale, Jim Sturgess, David Thewlis', '2014', 'United States of America', 0, 'Đang cập nhật', 0, '2024-06-22 20:41:03', '2024-06-22 20:41:03'),
(12, 'POKEMON (2023)', 2, 'https://phim.nguonc.com/public/images/Film/133946.jpg', 'pokemon-2023', 'Theo dõi Liko và Roy khi họ làm sáng tỏ những bí ẩn xung quanh họ và chạm trán với Friede, Thuyền trưởng Pikachu, Amethio và những người khác trong cuộc phiêu lưu thú vị của họ!', 'Vietsub', '55', 'HD', 'Đang cập nhật', 'Đang cập nhật', '2023', 'Japan', 20000, 'Đang cập nhật', 0, '2024-06-22 20:49:36', '2024-06-22 20:49:36'),
(13, 'DORAEMON (2005)', 2, 'https://phim.nguonc.com/public/images/Film/292.jpg', 'doraemon-2005', 'Doraemon (2005) là bộ anime gần đây nhất dựa trên manga cùng tên của Fujiko Fujio.\r\n\r\nĐây là phiên bản năm 2005 của loạt phim năm 1979, với một số thay đổi nhất định về hình ảnh động và những thứ khác.\r\n\r\nDoraemon là chú mèo máy xuất hiện ở hiện tại để lèo lái Nobita/Noby, một cậu bé khờ khạo, ngây thơ và vụng về đi đúng đường để đảm bảo tương lai của mình. Người yêu của Nobita là Shizuka Minamoto/Sue, kẻ thù không đội trời chung của cậu là Takeshi Goda/Big G và Suneo/Sneech.', 'Vietsub', '815', 'HD', 'Đang cập nhật', 'Đang cập nhật', '2005', 'Japan', 0, 'Đang cập nhật', 0, '2024-06-22 22:37:25', '2024-06-22 22:37:25'),
(14, 'BỐ GIÀ (2021)', 1, 'https://phim.nguonc.com/public/images/Film/WoFe2UXDzLAZAk6aFxcOkBXyfT.jpg', 'bo-gia-2021', 'Trong phim, Trấn Thành vào vai ông Tư – một tài xế xe ôm quần quật làm việc qua ngày để chăm lo cho gia đình của mình. Mặc dù khá bảo thủ, nóng nảy, thường xuyên quát tháo nhưng thực chất ông Tư lại là một người rất giàu lòng yêu thương – không chỉ với người thân mà còn có hàng xóm, bạn bè xung quanh và thậm chí là cả những người xa lạ.', 'Tiếng Việt', '1', 'HD', 'Trấn Thành, Vũ Ngọc Đãng', 'Trấn Thành, Tuấn Trần, Ngân Chi', '2021', 'Việt Nam', 12000, 'Full', 0, '2024-06-23 02:43:06', '2024-07-04 16:33:05'),
(15, 'CÔ ẤY, NGÀY VÀ ĐÊM', 2, 'https://phim.nguonc.com/public/images/Post/7/co-ay-ngay-va-dem.jpg', 'co-ay-ngay-va-dem', 'Chuyển qua lại một cách kỳ diệu giữa độ tuổi 20 và 50, người phụ nữ nọ nhận được suất thực tập tại cơ quan công tố rồi mắc kẹt giữa hai thế hệ và một vị sếp khó tính.', 'Vietsub', '16', 'HD', 'Lee Hyung Min', 'Lee Jung Eun, Jeong Eun Ji, Choi Jin Hyuk', '2024', 'South Korea', 150000, 'Đang cập nhật', 0, '2024-06-23 10:12:28', '2024-06-23 10:12:28'),
(16, 'GIA TỘC RỒNG (PHẦN 2)', 2, 'https://phim.nguonc.com/public/images/Post/7/gia-toc-rong-phan-2.jpg', 'gia-toc-rong-phan-2', 'Kịch bản lấy bối cảnh 200 năm trước các sự kiện của Game of Thrones, kể về câu chuyện của dòng họ Targaryen. Họ chinh phục và thống trị lục địa Westeros trong thời gian dài nhờ khả năng điều khiển loài rồng. Tuy nhiên, cuộc nội chiến đẫm máu kéo dài để tranh giành Ngôi Báu Sắt đã khiến gia tộc này ngày càng suy yếu và đi đến bờ vực của sự diệt vong.', 'Vietsub', '2', 'HD', 'Geeta Vasant Patel, Clare Kilner', 'Matt Smith, Emma D\'Arcy, Olivia Cooke', '2024', 'United States of America', 150000, 'Đang cập nhật', 0, '2024-06-25 07:55:24', '2024-06-25 07:55:24'),
(17, 'PHƯỢNG LẠC GIANG HỒ', 2, 'https://phim.nguonc.com/public/images/Post/8/a_100577341_m_601_en_260_360.jpg', 'phuong-lac-giang-ho', 'Tác giả “sao chép cốt truyện” siêu hot trên mạng Mạnh Tiểu Đường (Kha Dĩnh đóng), gặp được bên A mình luôn ao ước, đập tiền yêu cầu cô tìm lại tâm nguyện thuở đầu của cuốn tiểu thuyết võ hiệp cẩu huyết “Nam Tịch Truyện” kể về nữ chủ phản phái từ bỏ tình yêu chỉ để thượng vị. Mạnh Tiểu Đường vì tiền tùy ý thay đổi hoàn toàn cốt truyện, khiến hệ thống Văn Mạng nổi giận, ngoài ý muốn bị đưa tới thế giới võ hiệp chưa biết trước cốt truyện, trở thành nữ ma đầu hản phái Phượng Nam Tịch bị cả giang hồ truy sát, trong người có Hấp Vân Thần Công vô địch thiên hạ lại không sử dụng được. Trong lúc tìm đường giữ mạng, Phượng Nam Tịch gặp được tên trộm hoa đẹp trai Thẩm Dụ (Đặng Siêu Nguyên đóng), phát hiện mình bị ràng buộc cùng anh không thể giải thích được. Phượng Nam Tịch nếu muốn sử dụng Hấp Vân đại pháp, chỉ có thể dựa vào Thẩm Dụ. Phượng Nam Tịch biết rõ lợi mình, một lòng muốn tìm nam chính nguyên tác Diệp Vô Trần, hoàn thành nhiệm vụ “tái hiện cốt truyện” mà hệ thống giao cho. Trước ngày 15 tháng 8, chính đạo bao vây, khiến Diệp Vô Trần yêu mình, sau đó giết chết hắn. Nhưng trong ngoài giáo nguy cơ tứ phía, khiến cô chỉ có thế nắm chặt “bùa hộ thân” Thẩm Dụ. Phượng Nam Tịch không biết là, thân phận thật của Thẩm Dụ chính là Diệp Vô Trần cô đang vất vả tìm kiếm, đồng thời, mục đích Diệp Vô Trần hóa thân Thẩm Dụ tiếp cận Phượng Nam Tịch, chính là để giết chết cô, cướp đi bí kíp Hấp Vân thần công. Cuộc đọ sức giữa chính đạo và phản phái, sinh tử tồn vong, đóng kịch và chân tình, cứ thế âm thầm diễn ra…\"\"\"\"', 'Vietsub', '24', 'HD', 'Xiu Xiaonan', 'Ying Ke, Deng Chao Yuan, XINGYU CAO, Li Jia Le', '2024', 'Trung Quốc', 0, 'Đang cập nhật', 1, '2024-06-26 15:42:23', '2024-06-26 15:42:23'),
(18, 'NỬA KIA HOÀN HẢO (PHẦN 2)', 3, 'https://phim.nguonc.com/public/images/Post/2/nua-kia-hoan-hao-phan-2.jpg', 'nua-kia-hoan-hao-phan-2', 'Những cặp đôi chứng tỏ được sự tương thích của mình sẽ có được sức mạnh để quyết định hoặc phá vỡ những trận đấu khác trong cuộc thi hẹn hò đầy chiến lược và quyến rũ này.', 'Vietsub', '10', 'HD', 'Florian Gallenberger', 'Toby Sebastian, Lena Klenke, Bianca Bardoe', '2024', 'United States of America', 0, 'Full', 1, '2024-06-26 16:43:04', '2024-06-26 16:43:04'),
(19, 'THIẾU NIÊN VÀ CHIM DIỆC', 1, 'https://phim.nguonc.com/public/images/Film/zC2AoYyY5JGHAT5Y5IidtqEkyVB.jpg', 'thieu-nien-va-chim-diec', 'Đến từ Studio Ghibli và đạo diễn Miyazaki Hayao, bộ phim là câu chuyện về hành trình kỳ diệu của cậu thiếu niên Mahito trong một thế giới hoàn toàn mới lạ. Trải qua nỗi đau mất mẹ cùng mối quan hệ chẳng mấy vui vẻ với gia đình cũng như bạn học, Mahito dần cô lập bản thân... cho đến khi cậu gặp một chú chim diệc biết nói kỳ lạ. Mahito cùng chim diệc bước vào một tòa tháp bí ẩn, nơi một thế giới thần kỳ mở ra, đưa cậu gặp gỡ những người mình yêu thương... trong một nhân dạng hoàn toàn khác.\"\"', 'Vietsub', '1', 'HD', 'Hayao Miyazaki', 'Soma Santoki, Masaki Suda, Ko Shibasaki', '2023', 'Japan', 10000, 'Full', 0, '2024-06-27 16:15:46', '2024-06-27 16:36:33'),
(20, 'CHUYỆN NGÀY XƯA Ở… HOLLYWOOD', 1, 'https://phim.nguonc.com/public/images/Film/jnh7A1ew5eEKORLh6KRSZgIWu6P.jpg', 'chuyen-ngay-xua-o-hollywood', 'Los Angeles, năm 1969, cựu ngôi sao Rick Dalton và người đóng thế lâu năm cho anh là Cliff Booth nay đã thành những kẻ hết thời. Cả hai buộc phải đấu tranh để tồn tại giữa Hollywood khắc nghiệt. Cuối cùng, họ phải nhờ đến sự giúp đỡ của cô hàng xóm- nữ minh tinh xinh đẹp Sharon Tate. Do Quentin Tarantino làm đạo diễn, Leonardo DiCaprio cùng Brad Pitt thủ vai chính, không có gì ngạc nhiên khi Once Upon A Time được nhiều người xem là bộ phim đáng mong đợi nhất 2019.', 'Vietsub', '1', 'HD', 'Quentin Tarantino', 'Leonardo DiCaprio, Brad Pitt, Margot Robbie', '2019', 'United States of America, United Kingdom, China', 150000, 'Đang cập nhật', 0, '2024-06-29 17:22:13', '2024-07-05 08:29:26'),
(21, 'HỘI CHỨNG TUỔI THANH XUÂN: CÔ BÉ ĐEO CẶP SÁCH', 1, 'https://phim.nguonc.com/public/images/Film/138379.jpg', 'hoi-chung-tuoi-thanh-xuan-co-be-deo-cap-sach', 'Cuối cùng, ngày Mai tốt nghiệp cấp ba cũng đã đến. Trong khi Sakuta háo hức chờ đợi bạn gái, thì một em học sinh tiểu học trông y hệt cô xuất hiện trước mặt cậu. Nghi ngờ và vì những lý do không hề hay ho gì... Cùng lúc đó, bố của Sakuta và Kaede bất ngờ gọi điện, nói rằng mẹ họ muốn gặp Kaede. Mẹ cô bé đã nhập viện vì tình trạng của Kaede khiến bà không thể chịu đựng được thêm nữa, vậy bây giờ bà ấy có thể muốn gì?', 'Vietsub', '1', 'HD', 'Đang cập nhật', 'Đang cập nhật', '2023', 'Japan', 50000, 'Full', 0, '2024-06-29 17:28:13', '2024-06-29 17:28:13'),
(22, 'CĂN HỘ 404', 3, 'https://phim.nguonc.com/public/images/PostCat/show-apartment-404-moi-cua-jennie-blackpink-phat-hanh-toan-cau.jpg', 'can-ho-404', 'Chương trình thực tế này không chỉ nổi bật với dàn diễn viên sao lớn mà còn về nỗ lực chung để giải quyết bí ẩn và làm sáng tỏ các câu đố. Các tài liệu quảng cáo và video hậu trường cho thấy sự kết hợp thú vị giữa các thành viên trong đoàn, khiến nó trở thành một chương trình không thể bỏ qua đối với những người hâm mộ thể loại này và các thành viên diễn viên.', 'Vietsub', '9', 'HD', 'Jung Chul Min', 'CĂN HỘ 404', '2024', 'South Korea', 10000, 'Đang cập nhật', 0, '2024-06-29 17:57:55', '2024-06-29 17:57:55'),
(23, 'HIBIKE! EUPHONIUM 3', 2, 'https://phim.nguonc.com/public/images/Film/142086.jpg', 'hibike-euphonium-3', 'Mùa 3 của Hibike! Euphonium.', 'Vietsub', '13', 'HD', 'Đang cập nhật', 'Đang cập nhật', '2024', 'Japan', 0, 'Full', 1, '2024-07-01 18:29:06', '2024-07-01 18:29:06'),
(24, 'GEATS EXTRA: KAMEN RIDER GAZER', 1, 'https://phim.nguonc.com/public/images/Film/rb1pAiwxBE7e9B2DDFq5656fOTy.jpg', 'geats-extra-kamen-rider-gazer', 'Niramu, người vừa được bổ nhiệm làm nhà sản xuất DGP, đến thời kỳ Sengoku ở Nhật Bản để thực hiện công việc đầu tiên. Ở đó, anh tìm hiểu về \"chủ nghĩa hiện thực\" của thời đại này từ người hoa tiêu Miiru và tận hưởng những trải nghiệm quý giá. Trong khi đó, Nemeru, một nhà sản xuất kỳ cựu đã hoạt động trong DGP kể từ khi thành lập, thực hiện một động thái đáng ngờ... Chủ nghĩa hiện thực và hư cấu - điều gì là cần thiết cho giải trí đích thực?', 'Vietsub', '1', 'HD', 'Koichi Sakamoto', 'Ryo Kitamura, Fuku Suzuki, Seia Yasuda', '2024', 'Japan', 1000, 'Full', 0, '2024-07-01 18:32:14', '2024-07-01 18:32:14'),
(25, 'THE MOLE: AI LÀ NỘI GIÁN (PHẦN 2)', 2, 'https://phim.nguonc.com/public/images/Post/7/the-mole-ai-la-noi-gian-phan-2-1.jpg', 'the-mole-ai-la-noi-gian-phan-2', 'Trong bản làm lại chương trình kinh điển đình đám này, mười hai người chơi hoàn thành các thử thách trong khi cố nhận dạng một kẻ trong số họ đang phá hoại các nhiệm vụ.', 'Vietsub', '10', 'HD', 'Alex Wagner, Ari Shapiro, William James Richardson', 'Alex Wagner, Ari Shapiro, William James Richardson', '2024', 'United States of America', 0, 'Đang cập nhật', 0, '2024-07-02 15:13:29', '2024-07-02 17:25:54'),
(26, 'EM ĐẸP HƠN CẢ ÁNH SAO', 6, 'https://phim.nguonc.com/public/images/Post/6/em-dep-hon-ca-anh-sao.jpg', 'em-dep-hon-ca-anh-sao', 'Em Đẹp Hơn Cả Ánh Sao vừa là câu chuyện tình yêu vừa là hành trình trưởng thành của Kỷ Tinh và Hàn Đình. Là nhân tài của ngành khoa học kĩ thuật, Kỷ Tinh sẵn sàng nghỉ việc để tự thân khởi nghiệp và thực hiện ước mơ của riêng mình. Quá trình ban đầu gặp nhiều khó khăn, nhưng nhờ sự giúp đỡ của Hàn Đình, tổng giám đốc một công ty y tế, mà cô dần dà tìm được hướng đi đúng cho công ty của mình. Đồng thời, tình cảm giữa hai người cũng từ từ được vun đắp trong thời gian tiếp xúc và làm việc cùng nhau.', 'Vietsub', '40', 'HD', 'Trần Sướng', 'Đàm Tùng Vận, Hứa Khải, Hà Thụy Hiền', '2024', 'China', 0, 'Đang cập nhật', 0, '2024-07-03 15:30:41', '2024-07-03 15:30:41'),
(27, 'ULTRAMAN: TRỖI DẬY', 1, 'https://phim.nguonc.com/public/images/Film/j886YEkIUsiImY53px5VHKD4lRa.jpg', 'ultraman-troi-day', 'Bất đắc dĩ trở về nhà để đảm nhận nhiệm vụ Ultraman của bố mình, vận động viên ngôi sao nọ bảo vệ Tokyo khỏi đám quái vật khổng lồ và trở thành anh hùng huyền thoại.', 'Vietsub', '1', 'HD', 'Shannon Tindle', 'Christopher Sean, Gedde Watanabe, Tamlyn Tomita', '2024', 'Japan', 12000000, 'Full', 0, '2024-07-04 12:41:17', '2024-07-04 17:49:58'),
(28, 'DORAEMON MOVIE 42: NOBITA VÀ VÙNG ĐẤT LÝ TƯỞNG TRÊN BẦU TRỜI', 1, 'https://phim.nguonc.com/public/images/Film/131609.jpg', 'doraemon-movie-42-nobita-va-vung-dat-ly-tuong-tren-bau-troi', 'Nobita Và Vùng Đất Lý Tưởng Trên Bầu Trời kể câu chuyện khi Nobita tìm thấy một hòn đảo hình lưỡi liềm trên trời mây. Ở nơi đó, tất cả đều hoàn hảo… đến mức cậu nhóc Nobita mê ngủ ngày cũng có thể trở thành một thần đồng toán học, một siêu sao thể thao. Cả hội Doraemon cùng sử dụng một món bảo bối độc đáo chưa từng xuất hiện trước đây để đến với vương quốc tuyệt vời này. Cùng với những người bạn ở đây, đặc biệt là chàng robot mèo Sonya, cả hội đã có chuyến hành trình tới vương quốc trên mây tuyệt vời… cho đến khi những bí mật đằng sau vùng đất lý tưởng này được hé lộ.', 'Vietsub', '1', 'HD', 'Đang cập nhật', 'Đang cập nhật', '2023', 'Japan', 0, 'Full', 0, '2024-07-04 12:45:04', '2024-07-04 12:45:04'),
(29, 'X-MEN ’97 (PHẦN 1)', 2, 'https://phim.nguonc.com/public/images/Post/PostCategory/xmenhellfire2023001-xmen97-variant-1690229461767.jpg', 'x-men-97-phan-1', 'Một nhóm dị nhân sử dụng tài năng kỳ lạ của mình để bảo vệ một thế giới ghét bỏ và sợ hãi họ, họ bị thách thức hơn bao giờ hết, buộc phải đối mặt với một tương lai mới đầy nguy hiểm và bất ngờ.', 'Vietsub', '10', 'HD', 'Jake Castorena, Chase Conley', 'Ray Chase, Jennifer Hale, Alison Sealy-Smith', '2024', 'United States of America', 0, 'Đang cập nhật', 0, '2024-07-04 13:00:05', '2024-07-04 13:00:05'),
(30, 'SONIC PRIME: PHẦN 3', 2, 'https://phim.nguonc.com/public/images/PostCat/oQwgdjp4vrxu9a9EDheip1E5Wsx.jpg', 'sonic-prime-phan-3', 'Khi Nine đánh cắp Lăng Kính Đảo Ngược để tạo ra thế giới riêng, Sonic phải hợp sức với những đồng minh không ngờ tới để bảo vệ Vũ Trụ Vỡ Vụn thân thuộc.', 'Vietsub', '7', 'HD', 'Đang cập nhật', 'Đang cập nhật', '2024', 'United States of America', 0, 'Full', 1, '2024-07-04 13:08:50', '2024-07-04 13:08:50'),
(31, 'HÙNG LONG PHONG BÁ PHẦN 3', 6, 'https://phim.nguonc.com/public/images/Post/10/hung-long-phong-ba-phan-3.jpg', 'hung-long-phong-ba-phan-3', 'Kể từ khi Hai Cường bị bắt, A Hào không thể khống chế mọi thứ, \"thứ bột trắng\" ngày càng tràn vào Chợ Lớn, công cuộc đấu tranh chống tội phạm cũng được đẩy lên cao độ. Điều này đã làm ảnh hưởng đến lợi ích của một nhóm người trong bóng tối, buộc họ phải thả hổ về rừng để tìm kiếm người thay chiếc ghế của Hai Cường.', 'Việt Nam', '1', 'HD', 'Toni Dương Bảo Anh', 'Tùng Min, Steven Nguyễn, Võ Đình Hiếu', '2024', 'Việt Nam', 0, 'Đang cập nhật', 0, '2024-07-04 13:45:14', '2024-07-04 13:45:14'),
(32, 'STAR WARS: THE ACOLYTE (PHẦN 1)', 2, 'https://phim.nguonc.com/public/images/Post/9/star-wars-the-acolyte-phan-1.jpg', 'star-wars-the-acolyte-phan-1', 'Cuộc điều tra về một loạt tội ác gây chấn động khiến Master Jedi đáng kính phải đối mặt với một chiến binh nguy hiểm trong quá khứ. Khi nhiều manh mối xuất hiện hơn, họ đi vào một con đường đen tối, nơi các thế lực độc ác tiết lộ tất cả không như những gì họ tưởng…', 'Vietsub', '8', 'HD', 'Hanelle M. Culpepper, Alex Garcia Lopez', 'Amandla Stenberg, Dafne Keen, Jodie Turner-Smith', '2024', 'United States of America', 250000, 'Đang cập nhật', 0, '2024-07-05 09:05:28', '2024-07-05 09:05:28'),
(33, 'HẠN CHÓT ĐỂ YÊU', 3, 'https://phim.nguonc.com/public/images/Post/1/MV5BZmQ2ZGFlMGMtYTI5Ni00ODI4LWJhZDUtODY0MTQ2NGY2NjMwXkEyXkFqcGdeQXVyMTMzNzIyNDc1__V1_.jpg', 'han-chot-de-yeu', 'Kiếm tìm tình yêu đích thực, các cô nàng gặp các anh chồng tiềm năng khi vi vu đến những thắng cảnh. Vấn đề là chỉ phái nữ mới có thể cầu hôn, phái nam phải chạy đua với thời gian.', 'Vietsub', '10', 'HD', 'Đang cập nhật', 'Victoria Grace, Yuuki Luna', '2024', 'Japan', 20000, 'Đang cập nhật', 0, '2024-07-05 09:09:42', '2024-07-05 09:09:42'),
(34, 'SHOW CỦA ĐEN', 3, 'https://phim.nguonc.com/public/images/Film/vfDF76CIhgI8RhXfGfWMLKB54OQ.jpg', 'show-cua-den', 'Kỷ niệm 10 năm làm nghề, rapper người Việt Đen Vâu trình diễn trong liveshow hoành tráng ở Thành phố Hồ Chí Minh cùng ban nhạc sống và các khách mời đặc biệt.', 'Việt Nam', '1', 'HD', 'Đang cập nhật', 'Nguyễn Đức Cường, Hà Anh Tuấn, JustaTee, Lynk Lee, Kimmese', '2023', 'Việt Nam', 100000, 'Full', 0, '2024-07-05 09:20:57', '2024-07-05 09:20:57'),
(35, 'BẢY VIÊN NGỌC RỒNG SIÊU CẤP: SIÊU ANH HÙNG', 1, 'https://phim.nguonc.com/public/images/Film/122797.jpg', 'bay-vien-ngoc-rong-sieu-cap-sieu-anh-hung', 'Nhiều năm sau khi cha mình bị Gokuu Son ở tuổi vị thành niên đánh bại, Magenta tìm cách trả thù gia đình và đồng minh của Gokuu. Trong nhiệm vụ hồi sinh Đội quân Dải băng đỏ không còn tồn tại, Magenta soạn thảo các dịch vụ của Tiến sĩ Hedo, cháu trai của nhà khoa học huyền thoại độc ác Tiến sĩ Gero. Hedo bắt tay vào phát minh ra một dòng android siêu anh hùng mới để loại bỏ Gokuu sau khi Magenta thao túng anh ta để tin rằng những anh hùng mạnh nhất của Trái đất thực sự là những kẻ phản diện ngoài hành tinh.\r\n\r\nTrong khi Gokuu và Vegeta huấn luyện ngoài thế giới, người ngoài hành tinh Piccolo hướng dẫn Pan, cháu gái mới chập chững biết đi của Gokuu, giống như cách anh ta từng huấn luyện Gohan Son, cha của cô. Bản thân Gohan đã từ bỏ dòng dõi chiến binh của mình để theo đuổi sự nghiệp học thuật. Cả Piccolo và Gohan đều phải bắt tay vào hành động khi cuộc sống bình lặng của họ bị gián đoạn bởi sự xuất hiện của Gamma 1-gou và Gamma 2-gou—sáng tạo người máy mới của Hedo.\r\n\r\nTrong khi những người máy Gamma tin rằng họ đang đấu tranh cho công lý, thì một dự án độc ác hơn đang được ấp ủ bên dưới trụ sở của Red Ribbon. Gohan và Piccolo thực hiện những hành động quyết liệt để bảo vệ Pan và bảo vệ hành tinh trước mối đe dọa robot mới.', 'Vietsub', '1', 'HD', 'Đang cập nhật', 'Đang cập nhật', '2022', 'Japan', 0, 'Full', 0, '2024-07-05 09:25:11', '2024-07-05 09:25:11'),
(36, 'BẢY VIÊN NGỌC RỒNG HEROES', 2, 'https://phim.nguonc.com/public/images/Film/2564.jpg', 'bay-vien-ngoc-rong-heroes', 'Vào tháng 5 năm 2018, V-Jump đã công bố anime quảng cáo cho Dragon Ball Heroes, một trò chơi điện tử và thẻ giao dịch của Nhật Bản. Trò chơi điện tử đã được chuyển thể sang cổng Nintendo Switch dành cho khán giả phương Tây, trong khi trò chơi thẻ bài được phát hành với tên \"Dragon Ball Super TCG\" và được kết hợp với trò chơi thẻ bài khác cùng tên ở Nhật Bản. Anime dự kiến sẽ ngắn và không được phát sóng trên TV. Nó đã chuyển thể Arc Prison Planet của trò chơi, miễn là arc gốc của manga \"Big Bang Mission\" và \"Ultra God Misson\", cũng đầy đủ chi tiết trong manga Heroes được xuất bản trên Saikyou Jump, mặc dù dưới 2 bản giới thiệu riêng biệt. Chúng chưa bao giờ được xuất bản chính thức bằng tiếng Anh. Tập đầu tiên ra mắt vào ngày 1 tháng 7 năm 2018 tại Aeon Lake Town.', 'Vietsub', '55', 'HD', 'Đang cập nhật', 'Đang cập nhật', '2018', 'Japan', 0, 'Đang cập nhật', 1, '2024-07-05 09:28:01', '2024-07-05 09:28:01'),
(37, 'TÂN NƯƠNG BÚP BÊ', 6, 'https://phim.nguonc.com/public/images/Film/l5sZYHCON0tyl4Moeg4XRswYMCY.jpg', 'tan-nuong-bup-be', 'Mười năm trước, trong thị trấn Vân Vụ có một người phụ nữ xinh đẹp khiến mọi người đàn ông trong thị trấn đều không thể nhìn thẳng vào mắt tên là Tố Luyện. Bạn trai mà Tố Luyện đợi chờ chết nơi đất khách quê người. Những người đàn ông đã ao ước cô ấy từ lâu cưỡng chế xâm phạm cô ấy, phụ nữ trong thị trấn không thể kiềm chế được người đàn ông của mình, lại đổ lỗi cho Tố Luyện, gọi cô là hồ ly tinh ai cũng là chồng. Cuối cùng, trong một thị trấn nhỏ không có pháp luật, một người phụ nữ xinh đẹp như vậy đã bị sự đố kỵ và tội ác hủy hoại đến chết. Từ đó, tội ác của mọi người trở thành một bí mật mà không ai dám nói ra trong toàn bộ thị trấn Vân Vụ. Cho đến 10 năm sau, khi đàn ông chết bất thường trong đám cưới hoặc lấy thiếp, luôn có một hình nộm tân nương xuất hiện tại hiện trường, người ta mới nhắc lại tên Tố Luyện. Lời nguyền của hình nộm tân nương khiến người dân trong làng sống trong sợ hãi và lo lắng không thôi.', 'Vietsub', '1', 'HD', 'Liu Chun', 'Hà Trung Hoa, Trần Tín Triết, Vu Chấn, Ân Cảnh, Lưu Thành Thụy, Thượng Na, Thị Tuyên Như', '2024', 'China', 20000, 'Đang cập nhật', 0, '2024-07-05 09:29:08', '2024-07-05 09:29:08'),
(38, 'CÔNG PHU GẤU TRÚC 4', 6, 'https://phim.nguonc.com/public/images/Film/7quq3UOaaB0qNM7TMGMEqqghLck.jpg', 'cong-phu-gau-truc-4', 'Sau khi Po được chọn trở thành Thủ lĩnh tinh thần của Thung lũng Bình Yên, Po cần tìm và huấn luyện một Chiến binh Rồng mới, trong khi đó một mụ phù thủy độc ác lên kế hoạch triệu hồi lại tất cả những kẻ phản diện mà Po đã đánh bại về cõi linh hồn.', 'Vietsub', '1', 'HD', 'Mike Mitchell', 'Jack Black, Awkwafina, Bryan Cranston', '2024', 'United States of America', 0, 'Đang cập nhật', 1, '2024-07-05 09:33:27', '2024-07-05 09:33:27'),
(39, 'THẾ THẦN: NGỰ KHÍ SƯ CUỐI CÙNG: PHẦN 1', 2, 'https://phim.nguonc.com/public/images/Post/2/Avatar_The_Last_Airbender_2024_series_poster.jpg', 'the-than-ngu-khi-su-cuoi-cung-phan-1', 'Cậu bé nổi tiếng với danh xưng Thế thần phải thuần thục bốn sức mạnh nguyên tố để cứu thế giới đang chiến tranh… và chiến đấu với kẻ thù tàn nhẫn muốn ngăn cản mình.', 'Vietsub', '8', 'HD', 'Michael Goi, Roseanne Liang, Jabbar Raisani, Jet Wilkinson', 'Gordon Cormier, Kiawentiio, Ian Ousley', '2024', 'United States of America', 0, 'Full', 1, '2024-07-05 09:59:40', '2024-07-05 09:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `movie_catelogue`
--

CREATE TABLE `movie_catelogue` (
  `movie_id` bigint UNSIGNED NOT NULL,
  `catelogue_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movie_catelogue`
--

INSERT INTO `movie_catelogue` (`movie_id`, `catelogue_id`, `created_at`, `updated_at`) VALUES
(1, 3, NULL, NULL),
(2, 4, NULL, NULL),
(3, 1, NULL, NULL),
(3, 2, NULL, NULL),
(4, 1, NULL, NULL),
(4, 2, NULL, NULL),
(5, 3, NULL, NULL),
(6, 3, NULL, NULL),
(6, 4, NULL, NULL),
(7, 5, NULL, NULL),
(7, 6, NULL, NULL),
(8, 1, NULL, NULL),
(8, 7, NULL, NULL),
(9, 1, NULL, NULL),
(9, 2, NULL, NULL),
(10, 1, NULL, NULL),
(10, 3, NULL, NULL),
(11, 1, NULL, NULL),
(11, 3, NULL, NULL),
(12, 2, NULL, NULL),
(12, 3, NULL, NULL),
(12, 7, NULL, NULL),
(13, 2, NULL, NULL),
(13, 7, NULL, NULL),
(14, 4, NULL, NULL),
(14, 5, NULL, NULL),
(15, 4, NULL, NULL),
(15, 5, NULL, NULL),
(16, 1, NULL, NULL),
(16, 2, NULL, NULL),
(17, 1, NULL, NULL),
(17, 2, NULL, NULL),
(17, 3, NULL, NULL),
(17, 4, NULL, NULL),
(18, 4, NULL, NULL),
(18, 5, NULL, NULL),
(19, 2, NULL, NULL),
(19, 4, NULL, NULL),
(19, 7, NULL, NULL),
(20, 1, NULL, NULL),
(20, 3, NULL, NULL),
(20, 9, NULL, NULL),
(21, 4, NULL, NULL),
(21, 7, NULL, NULL),
(21, 9, NULL, NULL),
(22, 4, NULL, NULL),
(22, 9, NULL, NULL),
(23, 4, NULL, NULL),
(23, 7, NULL, NULL),
(24, 1, NULL, NULL),
(24, 2, NULL, NULL),
(24, 12, NULL, NULL),
(25, 1, NULL, NULL),
(25, 2, NULL, NULL),
(26, 4, NULL, NULL),
(27, 1, NULL, NULL),
(27, 2, NULL, NULL),
(27, 7, NULL, NULL),
(27, 12, NULL, NULL),
(28, 1, NULL, NULL),
(28, 7, NULL, NULL),
(28, 9, NULL, NULL),
(29, 1, NULL, NULL),
(29, 7, NULL, NULL),
(29, 9, NULL, NULL),
(30, 1, NULL, NULL),
(30, 7, NULL, NULL),
(31, 1, NULL, NULL),
(31, 3, NULL, NULL),
(32, 1, NULL, NULL),
(32, 2, NULL, NULL),
(33, 4, NULL, NULL),
(33, 9, NULL, NULL),
(34, 9, NULL, NULL),
(35, 7, NULL, NULL),
(35, 12, NULL, NULL),
(36, 7, NULL, NULL),
(36, 12, NULL, NULL),
(37, 8, NULL, NULL),
(38, 1, NULL, NULL),
(38, 7, NULL, NULL),
(39, 1, NULL, NULL),
(39, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `movie_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `tap` int NOT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` enum('Đã fix','Chưa fix','Spam') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Chưa fix',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `movie_id`, `user_id`, `tap`, `noi_dung`, `trang_thai`, `created_at`, `updated_at`) VALUES
(25, 10, 9, 1, '1', 'Spam', '2024-07-03 11:16:25', '2024-07-03 11:17:04'),
(26, 10, 9, 1, '2', 'Spam', '2024-07-03 11:16:36', '2024-07-03 11:17:00'),
(27, 10, 9, 1, '3', 'Spam', '2024-07-03 11:16:42', '2024-07-03 11:16:54'),
(28, 25, 9, 1, '5', 'Spam', '2024-07-03 11:18:13', '2024-07-03 11:18:25'),
(29, 25, 17, 1, '1', 'Spam', '2024-07-03 11:25:25', '2024-07-03 11:25:57'),
(30, 25, 17, 1, '2', 'Spam', '2024-07-03 11:25:29', '2024-07-03 11:26:29'),
(31, 25, 17, 1, '3', 'Spam', '2024-07-03 11:25:32', '2024-07-03 11:25:50'),
(32, 25, 17, 1, '4', 'Spam', '2024-07-03 11:25:36', '2024-07-03 11:25:45'),
(33, 25, 10, 1, '1', 'Đã fix', '2024-07-03 15:36:54', '2024-07-03 15:37:21'),
(34, 25, 10, 1, '2', 'Đã fix', '2024-07-03 15:36:58', '2024-07-03 15:37:33'),
(35, 25, 10, 1, '3', 'Đã fix', '2024-07-03 15:37:02', '2024-07-03 15:37:38'),
(36, 25, 10, 1, '4', 'Đã fix', '2024-07-03 15:37:06', '2024-07-03 15:37:44'),
(37, 25, 10, 1, '5', 'Đã fix', '2024-07-03 15:37:10', '2024-07-03 15:37:49'),
(38, 6, 10, 1, '3', 'Đã fix', '2024-07-03 15:40:31', '2024-07-03 15:40:56'),
(39, 6, 10, 1, '4', 'Đã fix', '2024-07-03 15:40:36', '2024-07-03 15:41:01'),
(40, 6, 10, 1, '6', 'Đã fix', '2024-07-03 15:40:40', '2024-07-03 15:41:06'),
(41, 6, 10, 1, '4', 'Đã fix', '2024-07-03 15:40:44', '2024-07-03 15:41:10'),
(42, 6, 10, 1, '5', 'Đã fix', '2024-07-03 15:40:48', '2024-07-03 15:41:15'),
(72, 34, 10, 1, '9', 'Đã fix', '2024-07-05 10:52:17', '2024-07-05 10:52:23');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_recharges`
--

CREATE TABLE `payment_recharges` (
  `id` bigint UNSIGNED NOT NULL,
  `so_giao_dich` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `xu` int NOT NULL,
  `phuong_thuc_thanh_toan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinh_trang_thanh_toan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_recharges`
--

INSERT INTO `payment_recharges` (`id`, `so_giao_dich`, `user_id`, `xu`, `phuong_thuc_thanh_toan`, `tinh_trang_thanh_toan`, `created_at`, `updated_at`) VALUES
(27, '14492024', 10, 980000, 'ATM', 'Thành công', '2024-07-03 11:04:29', '2024-07-03 11:04:29'),
(28, '14492028', 10, 20000, 'ATM', 'Thành công', '2024-07-03 11:07:21', '2024-07-03 11:07:21'),
(29, '14494474', 21, 12000000, 'ATM', 'Thành công', '2024-07-04 17:48:11', '2024-07-04 17:48:11'),
(30, '14494486', 21, 9000000, 'ATM', 'Thành công', '2024-07-04 18:08:12', '2024-07-04 18:08:12'),
(31, '0', 10, 44444, 'QRCODE', 'Thất bại', '2024-07-05 08:42:42', '2024-07-05 08:42:42'),
(32, '14497797', 22, 200000, 'ATM', 'Thành công', '2024-07-07 06:19:12', '2024-07-07 06:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `tieu_de` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `luot_xem` bigint NOT NULL DEFAULT '0',
  `user_id` bigint UNSIGNED NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `catelogue_post_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `tieu_de`, `noi_dung`, `anh`, `luot_xem`, `user_id`, `slug`, `catelogue_post_id`, `created_at`, `updated_at`) VALUES
(12, 'Top 15 phim Nhật hay và ý nghĩa mà các bạn không nên bỏ lỡ', '<p>Khi nhắc đến nền điện ảnh Nhật Bản, hẳn ai cũng sẽ nghĩ đến những bộ anime nổi tiếng tr&ecirc;n to&agrave;n thế giới. Nhưng b&ecirc;n cạnh đ&oacute;, c&aacute;c t&aacute;c phẩm điện ảnh v&agrave; phim truyền h&igrave;nh của Nhật Bản cũng c&oacute; chất lượng v&agrave; sức hấp dẫn kh&ocirc;ng hề k&eacute;m. C&ugrave;ng phimmoi điểm qua top c&aacute;c bộ phim Nhật hay nhất kh&ocirc;ng thể bỏ lỡ ngay trong b&agrave;i viết sau!</p><p><strong>1. T&ocirc;i Đ&atilde; Y&ecirc;u Như Một Đ&oacute;a Hoa &ndash; I Fell in Love Like A Flower Bouquet</strong></p><ul><li><strong>Ng&agrave;y ph&aacute;t h&agrave;nh:&nbsp;</strong>29/01/2021</li><li><strong>Thời lượng:&nbsp;</strong>124 ph&uacute;t</li><li><strong>Thể loại</strong>:&nbsp;Phim t&igrave;nh y&ecirc;u, l&atilde;ng mạn, t&acirc;m l&yacute;</li></ul><p>T&ocirc;i Đ&atilde; Y&ecirc;u Như Một Đ&oacute;a Hoa l&agrave; một trong những bộ&nbsp;<strong>phim Nhật hay</strong>&nbsp;về thể loại t&igrave;nh cảm, l&atilde;ng mạn. Phim được sản xuất v&agrave; dẫn dắt bởi đạo diễn l&atilde;o l&agrave;ng Nobuhiro Doi, c&ugrave;ng với sự tham gia của c&aacute;c diễn vi&ecirc;n hot như Masaki Suda, Kasumi Arimura v&agrave; Kaya Kiyohara. Nội dung bộ phim kể về c&acirc;u chuyện t&igrave;nh y&ecirc;u của đ&ocirc;i bạn trẻ t&igrave;nh cờ gặp nhau sau khi lỡ chuyến t&agrave;u cuối c&ugrave;ng tại nh&agrave; ga ở Tokyo. Sau đ&oacute;, họ dần nảy sinh t&igrave;nh cảm với nhau v&agrave; mối t&igrave;nh của họ k&eacute;o d&agrave;i đến 5 năm. Nếu l&agrave; người y&ecirc;u th&iacute;ch m&ocirc; t&iacute;p phim t&igrave;nh cảm lứa đ&ocirc;i l&atilde;ng mạn th&igrave; bạn kh&ocirc;ng thể bỏ qua bộ phim ngọt ng&agrave;o n&agrave;y.</p><p><strong>2. M&atilde;i M&atilde;i Y&ecirc;u Anh &ndash; Love Lasts Forever</strong></p><ul><li><strong>Ng&agrave;y ph&aacute;t h&agrave;nh:&nbsp;</strong>14/01/2020</li><li><strong>Thời lượng:&nbsp;</strong>10 tập</li><li><strong>Thể loại</strong>:&nbsp;Phim ng&ocirc;n t&igrave;nh, l&atilde;ng mạn</li></ul><p>Một trong những&nbsp;<strong>phim t&igrave;nh cảm Nhật Bản hay nhất</strong>&nbsp;phải kể đến Love Lasts Forever &ndash; M&atilde;i M&atilde;i Y&ecirc;u Anh. Nh&acirc;n vật ch&iacute;nh của bộ phim l&agrave; Sakura Nanase, một c&ocirc; y t&aacute; vừa tr&ograve;n 22 tuổi. V&agrave;i năm trước, t&igrave;nh cờ c&ocirc; gặp b&aacute;c sĩ Tendou Kairi v&agrave; đ&atilde; đem l&ograve;ng y&ecirc;u anh. Sakura đ&atilde; cố gắng chăm chỉ học h&agrave;nh v&agrave; cố gắng trở th&agrave;nh y t&aacute; để c&oacute; thể gặp lại Tendou. Cuối c&ugrave;ng sau 5 năm, c&ocirc; ấy đ&atilde; gặp lại Tendou Kairi, nhưng lần n&agrave;y anh ấy rất kh&aacute;c so với những g&igrave; c&ocirc; ấy đ&atilde; gặp. Tendou Kairi 33 tuổi, c&ograve;n được gọi l&agrave; &ldquo;Ma vương.&rdquo; Anh lu&ocirc;n đưa ra những ph&aacute;t ng&ocirc;n &ldquo;kh&oacute; đỡ&rdquo; với c&aacute;c b&aacute;c sĩ, y t&aacute; v&agrave; l&agrave; một người rất cầu to&agrave;n. Sakura Nanase chỉ l&agrave;m việc với mục đ&iacute;ch g&acirc;y ấn tượng với Tendo Kairi v&agrave; cho anh ấy thấy t&igrave;nh y&ecirc;u của m&igrave;nh nhưng kh&ocirc;ng ngờ lại bị từ chối phũ ph&agrave;ng. H&atilde;y theo d&otilde;i bộ phim v&agrave; dự đo&aacute;n xem liệu Sakura c&oacute; t&igrave;m thấy t&igrave;nh y&ecirc;u của đời m&igrave;nh kh&ocirc;ng nh&eacute;!</p><p><strong>3. Năm Th&aacute;ng Ấy T&ocirc;i Từng Theo Đuổi Em &ndash; You Are the Apple of My Eye</strong></p><ul><li><strong>Ng&agrave;y ph&aacute;t h&agrave;nh:&nbsp;</strong>2018</li><li><strong>Thời lượng:&nbsp;</strong>113 ph&uacute;t</li><li><strong>Thể loại</strong>: Phim t&igrave;nh y&ecirc;u&nbsp;học đường</li></ul><p>You Are Apple Of My Eyes l&agrave; bộ phim Đ&agrave;i Loan từng &ldquo;l&agrave;m mưa l&agrave;m gi&oacute;&rdquo; khắp thị trường điện ảnh ch&acirc;u &Aacute;. Sau 7 năm d&agrave;i, Nhật Bản cuối c&ugrave;ng cũng quyết định remake bộ phim n&agrave;y với t&ecirc;n gọi Năm Th&aacute;ng Ấy T&ocirc;i Từng Theo Đuổi Em. Từ đ&acirc;y, bộ phim cũng trở th&agrave;nh một trong những tựa&nbsp;<strong>phim Nhật Bản hay nhất</strong>&nbsp;n&oacute;i về t&igrave;nh y&ecirc;u tuổi học tr&ograve;. Nơi những cảm x&uacute;c, những rung động về t&igrave;nh y&ecirc;u được lột tả một cảnh ch&acirc;n thật nhất. Tất cả đều lặng lẽ, tinh khiết v&agrave; ghi dấu ấn đặc biệt trong tim người xem theo thời gian. H&atilde;y thưởng thức bộ phim tr&ecirc;n để những k&yacute; ức v&agrave; cảm x&uacute;c thời ni&ecirc;n thiếu được &ugrave;a về trong bạn.</p><p><strong>4. L&agrave;m Lại Cuộc Đời &ndash; Relife&nbsp;</strong></p><ul><li><strong>Ng&agrave;y ph&aacute;t h&agrave;nh:&nbsp;</strong>15/04/2017</li><li><strong>Thời lượng:&nbsp;</strong>120 ph&uacute;t</li><li><strong>Thể loại</strong>: Phim t&igrave;nh y&ecirc;u, l&atilde;ng mạn</li></ul><p>L&agrave;m Lại Cuộc Đời l&agrave; một bộ<strong>&nbsp;phim Nhật Bản hay</strong>&nbsp;khi kết hợp yếu tố viễn tưởng c&ugrave;ng c&acirc;u chuyện du h&agrave;nh thời gian. Phim kể về anh nh&acirc;n vi&ecirc;n văn ph&ograve;ng Kaizaki Arata thất nghiệp ở tuổi 27. Anh được mời tham gia một dự &aacute;n c&oacute; t&ecirc;n l&agrave; ReLIFE, anh được thuyết phục để uống một vi&ecirc;n thuốc để trở lại tuổi 17, khi anh vẫn đang l&agrave; một học sinh cấp 3. Bộ phim m&ocirc; tả một số mặt tr&aacute;i của x&atilde; hội v&agrave; thực tế khắc nghiệt của cuộc sống, chẳng hạn như t&agrave;i năng v&agrave; tr&aacute;ch nhiệm kh&ocirc;ng phải l&uacute;c n&agrave;o cũng được sử dụng tốt hay được đền đ&aacute;p xứng đ&aacute;ng. Tuy nhi&ecirc;n, một th&ocirc;ng điệp v&agrave; &yacute; nghĩa xuy&ecirc;n suốt bộ phim l&agrave; k&ecirc;u gọi c&aacute;c bạn trẻ đừng bao giờ bỏ cuộc m&agrave; h&atilde;y lu&ocirc;n n&acirc;ng niu từng khoảnh khắc hiện tại.</p><p><strong>5. Đứa Con Của Thời Tiết &ndash; Weathering with You</strong></p><ul><li><strong>Ng&agrave;y ph&aacute;t h&agrave;nh:&nbsp;</strong>30/08/2019</li><li><strong>Thời lượng:&nbsp;</strong>114 ph&uacute;t</li><li><strong>Thể loại</strong>: Phim&nbsp;hoạt h&igrave;nh anime</li></ul><p>Sẽ thế n&agrave;o nếu một con người nhỏ b&eacute; lại c&oacute; thể điều khiển sức mạnh vĩ đại của thi&ecirc;n nhi&ecirc;n như &ldquo;h&ocirc; mưa gọi nắng&rdquo;? Đứa Con Thời Tiết được xem l&agrave; bộ phim hoạt h&igrave;nh Nhật Bản xuất sắc khi t&aacute;i hiện cả sức mạnh vĩ đại v&agrave; kinh ho&agrave;ng của thi&ecirc;n nhi&ecirc;n cũng như lồng gh&eacute;p mối quan hệ mật thiết của thi&ecirc;n nhi&ecirc;n v&agrave; con người chỉ vỏn vẹn trong 114 ph&uacute;t.&nbsp;Bộ phim như một lời nhắc nhở kịp thời tới mối quan hệ vốn c&oacute; giữa con người v&agrave; thi&ecirc;n nhi&ecirc;n. Thời tiết ảnh hưởng đến c&aacute;ch cảm nhận của mọi người v&agrave; c&aacute;ch họ cư xử trong c&ocirc;ng việc, cuộc sống c&aacute; nh&acirc;n của họ cũng như trong x&atilde; hội. Những yếu tố thần thoại Nhật Bản trong t&aacute;c phẩm n&agrave;y như một th&ocirc;ng điệp tinh tế truyền đạt đến thế hệ ng&agrave;y nay. Đ&oacute; l&agrave; h&atilde;y giữ vững niềm tin v&agrave; t&igrave;nh y&ecirc;u của bản th&acirc;n đối với cuộc sống, vũ trụ sẽ đ&aacute;p trả cho ta kết quả xứng đ&aacute;ng. Đ&acirc;y l&agrave; t&aacute;c phẩm được giới ph&ecirc; b&igrave;nh đ&aacute;nh gi&aacute; rất cao v&agrave; đạt được mức doanh thu kh&aacute; cao.</p><p><strong>6. Ng&agrave;y mai, anh sẽ hẹn h&ograve; với em của ng&agrave;y h&ocirc;m qua &ndash; Tomorrow I Will Date With Yesterday&rsquo;s You</strong></p><ul><li><strong>Ng&agrave;y ph&aacute;t h&agrave;nh:&nbsp;</strong>17/12/2016</li><li><strong>Thời lượng:</strong>&nbsp;111 ph&uacute;t</li><li><strong>Thể loại</strong>: Phim t&igrave;nh y&ecirc;u học đường</li></ul><p>Được đ&aacute;nh gi&aacute; l&agrave; một&nbsp;<strong>phim t&igrave;nh cảm Nhật hay</strong>&nbsp;v&agrave; l&atilde;ng mạn, Ng&agrave;y Mai, Anh Sẽ Hẹn H&ograve; Với Em Của Ng&agrave;y H&ocirc;m Qua kể về c&acirc;u chuyện t&igrave;nh nhẹ nh&agrave;ng giữa một ch&agrave;ng trai sinh vi&ecirc;n nghệ thuật v&agrave; một c&ocirc; g&aacute;i kỳ lạ xuất hiện tr&ecirc;n chuyến t&agrave;u đến trường.&nbsp;Những thước phim đầu ti&ecirc;n đ&atilde; truyền tải cảm gi&aacute;c hạnh ph&uacute;c b&igrave;nh lặng, xuất ph&aacute;t từ t&igrave;nh y&ecirc;u ch&acirc;n th&agrave;nh. Nhưng theo thời gian, bạn sẽ c&oacute; thể cảm nhận được cả sức mạnh v&agrave; chiều s&acirc;u cảm x&uacute;c của Emi, khi Takatoshi sử dụng tất cả nỗ lực của m&igrave;nh để giữ cho t&igrave;nh y&ecirc;u của anh ấy được an to&agrave;n. Bộ phim sẽ khiến c&aacute;c kh&aacute;n giả vừa kh&oacute;c vừa cười c&ugrave;ng c&aacute;c nh&acirc;n vật, với những t&igrave;nh tiết kịch t&iacute;nh, hấp dẫn.</p><p><strong>7. 5 Centimet Tr&ecirc;n Gi&acirc;y&nbsp; &ndash; 5 Centimeters Per Second</strong></p><ul><li><strong>Ng&agrave;y ph&aacute;t h&agrave;nh:&nbsp;</strong>17/12/2016</li><li><strong>Thời lượng:&nbsp;</strong>111 ph&uacute;t</li><li><strong>Thể loại</strong>: Phim anime, l&atilde;ng mạn</li></ul><p>Tuy rằng t&igrave;nh y&ecirc;u chỉ tồn tại trong im lặng v&agrave; ho&agrave;i niệm nhưng mọi điểm nhấn của 5 Centimet Tr&ecirc;n Gi&acirc;y đều khắc họa l&ecirc;n một t&igrave;nh y&ecirc;u đẹp v&agrave; vĩnh cửu. Bộ phim được chia th&agrave;nh ba chương, mỗi chương l&agrave; một giai đoạn của c&acirc;u chuyện t&igrave;nh y&ecirc;u. Nh&acirc;n vật nam ch&iacute;nh Takaki, người buộc phải ra đi v&igrave; t&igrave;nh y&ecirc;u với người h&agrave;ng x&oacute;m Akari. Sau đ&oacute;, họ mất li&ecirc;n lạc trong một thời gian rất d&agrave;i. Nhưng t&igrave;nh cảm Takaki vẫn ở đ&oacute;, tr&agrave;n ngập t&igrave;nh y&ecirc;u d&agrave;nh cho Akari. Liệu t&igrave;nh y&ecirc;u c&oacute; thể tiếp tục k&eacute;o d&agrave;i v&agrave; c&oacute; kết quả hay kh&ocirc;ng ? H&atilde;y đ&oacute;n xem bộ đầy chiều s&acirc;u về t&igrave;nh cảm n&agrave;y.</p><p><strong>8. Đại chiến Titan &ndash; Attack On Titan</strong></p><ul><li><strong>Ng&agrave;y ph&aacute;t h&agrave;nh:&nbsp;</strong>07/04/2013</li><li><strong>Thời lượng:&nbsp;</strong>87 tập</li><li><strong>Thể loại</strong>: Phim&nbsp;h&agrave;nh động, anime</li></ul><p>Attack On Titan l&agrave; một bộ phim hoạt h&igrave;nh Nhật hay, được chuyển thể dựa tr&ecirc;n bộ truyện tranh nổi tiếng c&ugrave;ng t&ecirc;n của t&aacute;c giả Hajime Isayama.&nbsp;Ba nh&acirc;n vật ch&iacute;nh trong phim l&agrave; Eren Jaeger, Mikasa Ackerman v&agrave; Armin Arlert. Cuộc tấn c&ocirc;ng của lũ Titan đ&atilde; ph&aacute; vỡ th&agrave;nh Maria &ndash; bức tường th&agrave;nh bảo vệ sự an nguy của lo&agrave;i người. Lũ Titan tr&agrave;n v&agrave;o quận Shiganshina, ch&uacute;ng ph&aacute; hủy đường phố v&agrave; ăn thịt người một c&aacute;ch t&agrave;n bạo dưới sự chứng kiến của ba nh&acirc;n vật ch&iacute;nh. Đ&acirc;y l&agrave; bộ phim ph&ugrave; hợp với những kh&aacute;n giả y&ecirc;u th&iacute;ch phim chiến đấu sinh tồn. Một bộ&nbsp;phim xứng đ&aacute;ng để bạn d&agrave;nh thời gian thưởng thức.</p><p><strong>9. Nguyện ước y&ecirc;u thương &ndash; From Me to You (Live-action)</strong></p><ul><li><strong>Ng&agrave;y ph&aacute;t h&agrave;nh:&nbsp;</strong>2010</li><li><strong>Thời lượng:&nbsp;</strong>128 ph&uacute;t</li><li><strong>Thể loại</strong>: Phim anime, ch&iacute;nh kịch, l&atilde;ng mạn</li></ul><p>Nguyện Ước Y&ecirc;u Thương kể về c&acirc;u chuyện của Sawako Kuronuma, một học sinh tốt bụng nhưng xa c&aacute;ch với bạn b&egrave;. Kuronuma bị to&agrave;n bộ học sinh tại trường xa l&aacute;nh v&agrave; kỳ thị c&ocirc; v&igrave; m&aacute;i t&oacute;c của c&ocirc; giống với ngoại h&igrave;nh của nh&acirc;n vật ch&iacute;nh trong bộ phim kinh dị Ring. Bộ phim m&ocirc; tả qu&aacute; tr&igrave;nh Sawako v&agrave; bạn b&egrave; dần trở n&ecirc;n th&acirc;n thiết v&agrave; h&ograve;a đồng. Ngo&agrave;i ra c&ograve;n c&oacute; c&acirc;u chuyện t&igrave;nh y&ecirc;u đ&aacute;ng y&ecirc;u của Sawako với người bạn nổi tiếng Shota Kazehaya, người đ&atilde; say đắm c&ocirc; ấy kể từ lần đầu gặp mặt.</p><p><strong>10. Thanh &Acirc;m Trong Mắt Em &ndash; Your Eyes Tell</strong></p><ul><li>&nbsp;<strong>Ng&agrave;y ph&aacute;t h&agrave;nh:&nbsp;</strong>15/10/2020</li><li><strong>Thời lượng:&nbsp;</strong>123 ph&uacute;t</li><li><strong>Thể loại:</strong>&nbsp;Phim t&igrave;nh y&ecirc;u, l&atilde;ng mạn,&nbsp;điện ảnh</li></ul><p>Được remake từ t&aacute;c phẩm Always của H&agrave;n Quốc, Thanh &Acirc;m Trong Mắt Em được nhiều kh&aacute;n giả y&ecirc;u th&iacute;ch v&agrave; b&igrave;nh chọn l&agrave; một trong những t&aacute;c phẩm&nbsp;<strong>phim Nhật hay</strong>&nbsp;năm 2020.&nbsp;C&acirc;u chuyện của bộ phim xoay quanh Akira, một phụ nữ trẻ v&agrave; tuyệt đẹp. C&ocirc; kh&ocirc;ng may mất cha&nbsp;mẹ v&agrave; thị gi&aacute;c của m&igrave;nh trong một vụ tai nạn. Bởi v&igrave; cha mẹ l&agrave; tất cả mọi thứ trong cuộc sống của c&ocirc; v&agrave; họ đ&atilde; mất. Akira đ&atilde; tự đ&aacute;nh đập bản th&acirc;n m&igrave;nh li&ecirc;n tục, nhưng c&ocirc; chưa bao giờ từ bỏ cuộc sống. Thay v&agrave;o đ&oacute;, c&ocirc; ấy lu&ocirc;n duy tr&igrave; một c&aacute;i nh&igrave;n t&iacute;ch cực v&agrave; một nụ cười tươi khi đối mặt với bất cứ điều g&igrave; ở ph&iacute;a trước.</p><p><strong>11. Kẻ trộm si&ecirc;u thị &ndash; Shoplifters</strong></p><ul><li>&nbsp;<strong>Ng&agrave;y ph&aacute;t h&agrave;nh:&nbsp;</strong>08/06/2018</li><li><strong>Thời lượng:&nbsp;</strong>121 ph&uacute;t</li><li><strong>Thể loại</strong>: Phim ch&iacute;nh kịch,&nbsp;tội phạm</li></ul><p>Kẻ Trộm Si&ecirc;u Thị l&agrave; c&acirc;u chuyện kể về năm người ngh&egrave;o c&ugrave;ng sinh sống trong một ng&ocirc;i nh&agrave; v&ugrave;ng trung t&acirc;m. Người chồng l&agrave; Osamu do Lily Franky thủ vai v&agrave; vợ Nobuyo do Sakura Ando thủ vai. Họ lao động nặng nhọc để được trả lương cao v&agrave; thường ăn cắp thực phẩm v&agrave; đồ gia dụng từ c&aacute;c si&ecirc;u thị, cửa h&agrave;ng tiện lợi. Ngo&agrave;i ra, c&ograve;n c&oacute; Aki (Matsuoka Mayu) phải l&agrave;m việc trong một c&acirc;u lạc bộ t&igrave;nh dục, một cậu b&eacute; t&ecirc;n l&agrave; Shota (Jyo Kai) v&agrave; một b&agrave; l&atilde;o c&ugrave;ng sống trong ng&ocirc;i nh&agrave; chật hẹp ấy. Tuy kh&ocirc;ng c&ugrave;ng d&ograve;ng m&agrave;u nhưng họ đ&ugrave;m bọc v&agrave; chia sẻ c&ugrave;ng nhau vượt qua cuộc sống đầy kh&oacute; khăn. Họ l&agrave; những mảnh gh&eacute;p c&ocirc; đơn do nhiều ho&agrave;n cảnh kh&aacute;c nhau, nhưng họ được kết nối lại với nhau như một gia đ&igrave;nh ho&agrave;n chỉnh c&ugrave;ng nhau kiếm sống qua ng&agrave;y.</p><p><strong>12. Bản giao hưởng Tokyo &ndash; Tokyo Sonata</strong></p><ul><li>&nbsp;<strong>Ng&agrave;y ph&aacute;t h&agrave;nh:&nbsp;</strong>27/09/2008</li><li><strong>Thời lượng:&nbsp;</strong>120 ph&uacute;t</li><li><strong>Thể loại</strong>: Phim ch&iacute;nh kịch, t&acirc;m l&yacute;</li></ul><p>Bản Giao Hưởng Tokyo l&agrave; bộ&nbsp;<strong>phim Nhật hay,</strong>&nbsp;ghi lại những hoạt động h&agrave;ng ng&agrave;y của Sasaki, một gia đ&igrave;nh điển h&igrave;nh của tầng lớp lao động tại th&agrave;nh phố n&agrave;y. Gia đ&igrave;nh gồm đ&ocirc;i vợ chồng Sasaki &ndash; Megumi v&agrave; 2 đứa con trai l&agrave; Tashi v&agrave; Kenji.&nbsp;Ryuhei c&oacute; một c&ocirc;ng việc văn ph&ograve;ng ổn định, nhưng bỗng một ng&agrave;y anh bị sa thải do c&ocirc;ng ty t&igrave;m được người l&agrave;m việc với mức lương thấp hơn. Ryuhei t&igrave;nh cờ gặp người bạn cũ Kurosu, người cũng đ&atilde; mất việc v&agrave; đang đi t&igrave;m việc. Ryuhei đ&atilde; được Kurosu chỉ cho một b&iacute; k&iacute;p, đ&oacute; l&agrave; khiến điện thoại đổ chu&ocirc;ng li&ecirc;n tục ngay cả khi kh&ocirc;ng c&oacute; cuộc gọi n&agrave;o đến, để tạo cảm gi&aacute;c rằng anh ấy vẫn đang l&agrave;m việc để giữ l&ograve;ng tin với gia đ&igrave;nh. Ngo&agrave;i ra, Ryuhei quyết định rằng sẽ kh&ocirc;ng cho gia đ&igrave;nh biết rằng anh bị sa thải ở c&ocirc;ng ty. Trong khi hai người đ&agrave;n &ocirc;ng t&igrave;m việc l&agrave;m mới, vợ của Kurosu nảy sinh nghi ngờ. Diễn biến tiếp theo sẽ như thế n&agrave;o ? Liệu c&oacute; b&igrave;nh y&ecirc;n như ti&ecirc;u đề của bộ phim hay kh&ocirc;ng?</p><p><strong>13. Cuốn sổ tử thần &ndash; Death note</strong></p><ul><li>&nbsp;<strong>Ng&agrave;y ph&aacute;t h&agrave;nh:&nbsp;</strong>17/06/2006</li><li><strong>Thời lượng:&nbsp;</strong>126 ph&uacute;t</li><li><strong>Thể loại</strong>: Phim tội phạm, h&igrave;nh sự,&nbsp;viễn tưởng</li></ul><p>&ldquo;Cuốn sổ tử thần&rdquo; kể về Light Yagami, một học sinh xuất sắc đ&atilde; v&ocirc; t&igrave;nh sở hữu được Death Note. V&igrave; thế m&agrave; Light c&oacute; khả năng giết chết bất kỳ ai bằng c&aacute;ch ghi t&ecirc;n người đ&oacute; v&agrave;o cuốn sổ. Light đ&atilde; quyết định sử dụng Death Note để tạo ra một thế giới tươi đẹp hơn bằng c&aacute;ch ti&ecirc;u diệt những kẻ tội phạm v&agrave; những kẻ giết người t&agrave;n &aacute;c. Với h&agrave;nh động đ&oacute;, Light nhận được biệt danh Kira từ cảnh s&aacute;t v&agrave; c&ocirc;ng ch&uacute;ng, những người mong muốn thấy một thế giới trong sạch, đạo đức. Việc giết người h&agrave;ng loạt của Kira đ&atilde; được L-một th&aacute;m tử lừng danh ph&aacute;t gi&aacute;c v&agrave; tiến theo d&otilde;i điều tra. L quyết t&acirc;m bắt Kira v&agrave; đưa anh ta ra trước c&ocirc;ng l&yacute;. Cả Kira v&agrave; L đều tự cho rằng m&igrave;nh th&ocirc;ng minh v&agrave; coi m&igrave;nh l&agrave; sứ giả của ch&iacute;nh nghĩa. Vậy ai sẽ thắng trong trận chiến tinh thần n&agrave;y? Ai l&agrave; người t&agrave;i đức ? Ai l&agrave; người xấu ? H&atilde;y đ&oacute;n xem kết quả trong bộ phim đầy hấp dẫn n&agrave;y.</p><p><strong>14. T&ecirc;n cậu l&agrave; g&igrave;? &ndash; Your name</strong></p><ul><li>&nbsp;<strong>Ng&agrave;y ph&aacute;t h&agrave;nh:&nbsp;</strong>26/08/2016</li><li><strong>Thời lượng:&nbsp;</strong>106 ph&uacute;t</li><li><strong>Thể loại</strong>: Phim anime, l&atilde;ng mạn</li></ul><p>Your Name &ndash; T&ecirc;n Cậu L&agrave; G&igrave;? l&agrave; bộ phim anime Nhật hay xoay quanh nh&acirc;n vật ch&iacute;nh Mitsuha, một c&ocirc; g&aacute;i trẻ sinh sống ở Itomori, một v&ugrave;ng đất bao quanh bởi n&uacute;i rừng. Giống như nhiều c&ocirc; g&aacute;i vị th&agrave;nh ni&ecirc;n kh&aacute;c, Mitsuha mơ ước được rời bỏ v&ugrave;ng n&ocirc;ng th&ocirc;n vắng vẻ, buồn tẻ v&agrave; chuyển đến Tokyo nơi th&agrave;nh ph&igrave; c&oacute; những cửa v&agrave; nhiều địa điểm m&agrave; nơi c&ocirc; đang sống kh&ocirc;ng hề c&oacute;. Một ng&agrave;y nọ, c&ocirc; bắt đầu c&oacute; những giấc mơ kỳ lạ, trong đ&oacute; c&ocirc; thấy m&igrave;nh đang sống trong h&igrave;nh dạng của Taki, một đứa trẻ th&agrave;nh phố với bản t&iacute;nh n&oacute;ng nảy nhưng c&oacute; tr&aacute;i tim nh&acirc;n hậu. Taki, người trẻ tuổi c&ugrave;ng lứa Mitsuha, c&oacute; c&ugrave;ng giấc mơ với nh&acirc;n vật ch&iacute;nh, trong đ&oacute; anh ta thức dậy b&ecirc;n trong cơ thể của một phụ nữ trẻ từ v&ugrave;ng qu&ecirc; ngh&egrave;o khổ, với nhiều tập qu&aacute;n thờ c&uacute;ng thần b&iacute; truyền. Sự trao đổi th&acirc;n x&aacute;c đầy th&uacute; vị v&agrave; sẽ khiến cho cả hai gặp nhiều gặp rối. C&ugrave;ng đ&oacute;n xem bộ phim đầy th&uacute; vị v&agrave; hấp dẫn n&agrave;y.</p><p><strong>15. Cuộc chiến băng đảng &ndash; High and Low</strong></p><ul><li>&nbsp;<strong>Ng&agrave;y ph&aacute;t h&agrave;nh:&nbsp;</strong>16/07/2016</li><li><strong>Thời lượng:&nbsp;</strong>125 ph&uacute;t</li></ul><p>Cuộc Chiến Băng Đảng l&agrave; c&acirc;u chuyện kể về sự tranh gi&agrave;nh quyền kiểm so&aacute;t khu vực S.W.O.R.D của 5 băng đảng Li&ecirc;n Minh Sannou, White Rascals, Cao Trung Oya, Rude Boys v&agrave; Gia tooch Daruma.&nbsp;Cả 5 băng đảng đấu đ&aacute; lẫn nhau để gi&agrave;nh địa b&agrave;n. Nhưng khi c&oacute; thế lực xuất hiện muốn chiếm trọn S.W.O.R.D, tất cả băng đảng c&ugrave;ng nhau đo&agrave;n kết chiến đấu chống kẻ th&ugrave; chung. Xem ngay bộ phim để kh&ocirc;ng bỏ lỡ những t&igrave;nh tiết hấp dẫn, kịch t&iacute;nh tiếp theo!</p>', 'post/IUhUyoOUhNypofvVbQN3gg4jnshfVWTTGy0tBVja.png', 12, 9, 'top-15-phim-nhat-hay-va-y-nghia-ma-cac-ban-khong-nen-bo-lo', 1, '2024-06-28 17:37:27', '2024-07-04 06:20:45'),
(14, 'Trung Tâm Trợ Giúp', '<p>Trung t&acirc;m Trợ Gi&uacute;p cho KienMovie</p><p>Ch&agrave;o mọi người! H&ocirc;m nay ch&uacute;ng ta sẽ c&ugrave;ng t&igrave;m hiểu về Trung t&acirc;m Trợ Gi&uacute;p cho KienMovie, nơi bạn c&oacute; thể t&igrave;m thấy c&aacute;c th&ocirc;ng tin hữu &iacute;ch để sử dụng dịch vụ của ch&uacute;ng t&ocirc;i một c&aacute;ch dễ d&agrave;ng v&agrave; thuận tiện.</p><p>1. Hỗ trợ v&agrave; Dịch vụ</p><p>Trung t&acirc;m Trợ Gi&uacute;p của KienMovie cung cấp c&aacute;c dịch vụ sau:</p><ul><li><p><strong>Hướng dẫn sử dụng</strong>: Bạn sẽ t&igrave;m thấy hướng dẫn chi tiết về c&aacute;ch sử dụng KienMovie để xem phim, quản l&yacute; t&agrave;i khoản, v&agrave; tận hưởng c&aacute;c t&iacute;nh năng đặc biệt.</p></li><li><p><strong>Giải đ&aacute;p thắc mắc</strong>: Ch&uacute;ng t&ocirc;i cung cấp c&acirc;u trả lời cho c&aacute;c c&acirc;u hỏi phổ biến về việc đăng k&yacute;, đăng nhập, thanh to&aacute;n v&agrave; c&aacute;c vấn đề kỹ thuật kh&aacute;c.</p></li></ul><p>2. Li&ecirc;n Hệ</p><p>Nếu bạn c&oacute; bất kỳ c&acirc;u hỏi n&agrave;o kh&ocirc;ng được giải đ&aacute;p trong Trung t&acirc;m Trợ Gi&uacute;p, h&atilde;y li&ecirc;n hệ với ch&uacute;ng t&ocirc;i qua:</p><ul><li><strong>Email</strong>: support@kienmovie.com</li><li><strong>Điện thoại</strong>: (+84) 123 456 789</li><li><strong>Địa chỉ</strong>: 123 Đường X, Quận Y, Th&agrave;nh phố Z</li></ul><p>3. Cập Nhật Th&ocirc;ng Tin</p><p>Để cập nhật th&ocirc;ng tin mới nhất về KienMovie v&agrave; c&aacute;c t&iacute;nh năng mới, bạn c&oacute; thể theo d&otilde;i ch&uacute;ng t&ocirc;i tr&ecirc;n c&aacute;c mạng x&atilde; hội sau:</p><ul><li><strong>Facebook</strong>: facebook.com/kienmovie</li><li><strong>Twitter</strong>: twitter.com/kienmovie</li><li><strong>Instagram</strong>: instagram.com/kienmovie</li></ul><p>Ch&uacute;ng t&ocirc;i lu&ocirc;n sẵn s&agrave;ng hỗ trợ bạn mọi l&uacute;c, mọi nơi. H&atilde;y đảm bảo rằng bạn c&oacute; trải nghiệm tuyệt vời nhất khi sử dụng dịch vụ của ch&uacute;ng t&ocirc;i!</p><p>Cảm ơn bạn đ&atilde; đọc b&agrave;i viết n&agrave;y v&agrave; ch&uacute;c bạn một ng&agrave;y tốt l&agrave;nh!</p>', NULL, 0, 9, 'trung-tam-tro-giup', 3, '2024-06-30 05:37:09', '2024-06-30 05:48:43'),
(15, 'Tuyển Dụng Việc Làm', '<p>Th&ocirc;ng tin về Tuyển Dụng tại KienMovie</p><p>Ch&agrave;o mừng bạn đến với Trang Tuyển Dụng của KienMovie! Ch&uacute;ng t&ocirc;i lu&ocirc;n t&igrave;m kiếm những c&aacute; nh&acirc;n t&agrave;i năng v&agrave; nhiệt huyết để gia nhập đội ngũ của ch&uacute;ng t&ocirc;i. Dưới đ&acirc;y l&agrave; c&aacute;c th&ocirc;ng tin cơ bản về qu&aacute; tr&igrave;nh tuyển dụng tại KienMovie:</p><ul><li><p><strong>C&aacute;c Vị Tr&iacute; Tuyển Dụng</strong>: Ch&uacute;ng t&ocirc;i cung cấp một loạt c&aacute;c vị tr&iacute; từ kỹ thuật vi&ecirc;n đến nh&acirc;n vi&ecirc;n hỗ trợ kh&aacute;ch h&agrave;ng v&agrave; nhiều hơn nữa. Để biết th&ecirc;m chi tiết về c&aacute;c vị tr&iacute; hiện c&oacute;, vui l&ograve;ng truy cập v&agrave;o trang Tuyển Dụng.</p></li><li><p><strong>Quy tr&igrave;nh Tuyển Dụng</strong>: Quy tr&igrave;nh tuyển dụng tại KienMovie bao gồm c&aacute;c bước từ nộp đơn, phỏng vấn đến ch&agrave;o đ&oacute;n v&agrave; bắt đầu l&agrave;m việc. Ch&uacute;ng t&ocirc;i cam kết cung cấp một m&ocirc;i trường c&ocirc;ng bằng v&agrave; cơ hội thăng tiến cho tất cả c&aacute;c ứng vi&ecirc;n.</p></li><li><p><strong>Li&ecirc;n Hệ</strong>: Nếu bạn c&oacute; bất kỳ c&acirc;u hỏi n&agrave;o về việc l&agrave;m tại KienMovie, xin vui l&ograve;ng li&ecirc;n hệ với ch&uacute;ng t&ocirc;i qua email tại hr@kienmovie.com hoặc số điện thoại (+84) 987 654 321.</p></li></ul><p>Ch&uacute;ng t&ocirc;i rất mong được ch&agrave;o đ&oacute;n bạn v&agrave;o gia đ&igrave;nh KienMovie!</p>', NULL, 2, 9, 'tuyen-dung-viec-lam', 3, '2024-06-30 05:38:28', '2024-06-30 14:51:46'),
(16, 'Liên Hệ Với Chúng Tôi', '<p>Hỗ trợ v&agrave; Li&ecirc;n Hệ</p><p>Bạn cần ch&uacute;ng t&ocirc;i gi&uacute;p đỡ hay c&oacute; c&acirc;u hỏi g&igrave; về KienMovie? Đừng ngần ngại li&ecirc;n hệ với ch&uacute;ng t&ocirc;i. Ch&uacute;ng t&ocirc;i sẵn s&agrave;ng hỗ trợ bạn 24/7!</p><ul><li><p><strong>Hỗ Trợ Kh&aacute;ch H&agrave;ng</strong>: Để nhận được trợ gi&uacute;p nhanh nhất, vui l&ograve;ng truy cập v&agrave;o Trung t&acirc;m Trợ Gi&uacute;p của ch&uacute;ng t&ocirc;i tại Trung T&acirc;m Trợ Gi&uacute;p.</p></li><li><p><strong>Li&ecirc;n Hệ</strong>: Nếu bạn c&oacute; c&acirc;u hỏi chung hoặc cần hỗ trợ đặc biệt, vui l&ograve;ng li&ecirc;n hệ với ch&uacute;ng t&ocirc;i qua email tại support@kienmovie.com hoặc số điện thoại (+84) 123 456 789.</p></li></ul>', NULL, 1, 9, 'lien-he-voi-chung-toi', 3, '2024-06-30 05:38:48', '2024-07-06 09:28:09'),
(17, 'Thông Tin Doanh Nghiệp', '<p>Giới Thiệu về KienMovie</p><p>KienMovie l&agrave; nền tảng phim trực tuyến nổi tiếng, cung cấp cho người d&ugrave;ng trải nghiệm xem phim tuyệt vời với h&agrave;ng ng&agrave;n bộ phim từ c&aacute;c thể loại kh&aacute;c nhau. Với sứ mệnh mang lại niềm vui v&agrave; giải tr&iacute; cho mọi gia đ&igrave;nh, KienMovie cam kết cung cấp những nội dung phong ph&uacute; v&agrave; chất lượng nhất.</p><ul><li><strong>Địa Chỉ</strong>: 123 Đường X, Quận Y, Th&agrave;nh phố Z, Việt Nam</li><li><strong>Email</strong>: info@kienmovie.com</li><li><strong>Số Điện Thoại</strong>: (+84) 987 654 321</li></ul><p>KienMovie lu&ocirc;n mở rộng v&agrave; ph&aacute;t triển để mang đến cho người d&ugrave;ng những trải nghiệm th&uacute; vị v&agrave; bổ &iacute;ch nhất. H&atilde;y c&ugrave;ng ch&uacute;ng t&ocirc;i kh&aacute;m ph&aacute; v&agrave; chia sẻ niềm đam m&ecirc; với phim ảnh!</p>', NULL, 2, 9, 'thong-tin-doanh-nghiep', 3, '2024-06-30 05:39:12', '2024-07-01 08:14:07'),
(18, 'Top 10 bộ phim hay nhất mà bạn nên xem một lần trong đời', '<p>Phim truyện l&agrave; một lĩnh vực rộng lớn, c&oacute; rất nhiều thể loại phim với nhưng nội dung v&agrave; &yacute; nghĩa kh&aacute;c nhau. Xem phim kh&ocirc;ng chỉ để giải tr&iacute;, m&agrave; mỗi bộ phim c&ograve;n đem lại những &yacute; nghĩa, những b&agrave;i học hoặc những động lực cho ch&uacute;ng ta. H&atilde;y c&ugrave;ng phimmoi điểm qua 10 bộ phim hay n&ecirc;n xem một lần trong đời để thấy được n&oacute; &yacute; nghĩa như thế n&agrave;o nh&eacute;!</p><p>1. Life Is Beautiful &ndash; Cuộc Sống Tươi Đẹp</p><p>Life Is Beautiful (1997)&nbsp;l&agrave; một bộ phim h&agrave;i kịch của &Yacute;&nbsp;thực hiện bởi đạo diễn Roberto Benigni&nbsp;v&agrave; cũng l&agrave; người thủ vai Guido Orefice&nbsp;trong phim. Bộ phim lấy bối cảnh một thị trấn hư cấu&nbsp;ở&nbsp;&Yacute; trong thế chiến thứ II. Xoay quanh nh&acirc;n vật&nbsp;Guido Orefice ch&agrave;ng trai trẻ người Do Th&aacute;i l&ecirc;n th&agrave;nh phố t&igrave;m kiếm cơ hội việc l&agrave;m mới. Anh đ&atilde; gặp v&agrave; c&oacute; t&igrave;nh y&ecirc;u đẹp với c&ocirc; gi&aacute;o Dora. Cả 2 kết h&ocirc;n v&agrave; sinh được b&eacute; Joshua. Họ c&oacute; khoảng thời gian sống hạnh ph&uacute;c cho tới&nbsp;ng&agrave;y gia đ&igrave;nh họ bị bắt v&agrave;o trại tập trung của ph&aacute;t x&iacute;t Đức. Bộ phim&nbsp;vừa mang t&iacute;nh l&atilde;ng mạn vừa mang t&iacute;nh hiện thực s&acirc;u sắc về t&igrave;nh cảm vợ chồng, t&igrave;nh cảm cha con. Th&ocirc;ng qua bộ phim, người xem c&oacute; thể thấy được sự t&agrave;n bạo&nbsp;của ph&aacute;t x&iacute;t Đức trong c&aacute;c trại tập trung v&agrave; t&igrave;nh cảm thi&ecirc;ng li&ecirc;ng m&agrave; &ocirc;ng bố Guido d&agrave;nh cho con trai của m&igrave;nh, anh đ&atilde; t&igrave;m mọi c&aacute;ch để bảo vệ cho Joshua d&ugrave; cho c&aacute;i chết đ&atilde; cận kề. Phim&nbsp;đ&atilde; nhận&nbsp;được giải&nbsp;Oscar v&agrave; l&agrave; một trong số những bộ phim&nbsp;đ&aacute;ng xem nhất.</p><p>B&agrave;i học r&uacute;t ra trong phim l&agrave; ch&iacute;nh ch&uacute;ng ta l&agrave; người quyết&nbsp;định cuộc sống của m&igrave;nh l&agrave; &ldquo;cuộc sống tươi đẹp&rdquo; hay&nbsp;&ldquo;cuộc sống điạ ngục&rdquo;. H&atilde;y c&oacute; niềm hi vọng bền bỉ v&agrave;o tương lai, th&igrave; kh&oacute; khăn cũng sẽ qua.</p><p>2. The Pursuit of Happyness (Mưu cầu hạnh ph&uacute;c)</p><p>&rdquo;Don&rsquo;t ever let somebody tell you you can&rsquo;t do something! You got a dream&hellip; You gotta protect it.&rdquo; (Đừng để bất kỳ ai n&oacute;i rằng con kh&ocirc;ng thể l&agrave;m điều g&igrave; đ&oacute;! Con c&oacute; giấc mơ&hellip;. Con h&atilde;y bảo vệ n&oacute;).</p><p>The Pursuit of Happyness&nbsp;l&agrave; bộ phim được x&acirc;y dựng dựa tr&ecirc;n c&acirc;u chuyện c&oacute; thật về&nbsp;Chris Gardner&nbsp;&ndash; một nh&acirc;n vi&ecirc;n b&aacute;n h&agrave;ng kh&ocirc;ng may gặp thất bại trong kinh doanh khiến nợ nần chồng chất, hạnh ph&uacute;c tan vỡ, bị đuổi ra khỏi căn nh&agrave; thu&ecirc; do kh&ocirc;ng trả đủ tiền thu&ecirc; nh&agrave; h&agrave;ng th&aacute;ng&hellip;. Cuộc sống trở n&ecirc;n đường c&ugrave;ng khi anh v&agrave; đứa con trai 5 tuổi buộc phải lang thang tr&ecirc;n đường phố cả đ&ecirc;m hay phải bon chen giữa d&ograve;ng người hướng về ph&iacute;a nh&agrave; thờ với hy vọng kiếm được một chỗ ngủ. Tuy nhi&ecirc;n, may mắn đ&atilde; mỉm cười khi anh gi&agrave;nh được vị tr&iacute; thực tập sinh tại một C&ocirc;ng ty chứng kho&aacute;n v&agrave; bằng nỗ lực phi thường, Chris đ&atilde; đ&aacute;nh bại mọi thử th&aacute;ch của cuộc đời để c&oacute; được th&agrave;nh c&ocirc;ng như &yacute; muốn. Phim ca ngợi &yacute; ch&iacute;, niềm tin v&agrave; sự vươn l&ecirc;n kh&ocirc;ng ngừng của con người cũng như nhắc nhở ch&uacute;ng ta về &yacute; nghĩa thực sự của hạnh ph&uacute;c.</p><p>3. 3 idiots (Ba ch&agrave;ng ngốc)</p><p>&rdquo;Pursue excellence and success will follow&rdquo; (H&atilde;y theo đuổi sự ưu t&uacute; v&agrave; th&agrave;nh c&ocirc;ng sẽ đến với bạn).</p><p>3 idiots&nbsp;l&agrave; một trong những bộ phim nổi bật nhất của điện ảnh Ấn Độ kể về 3 người bạn&nbsp;Farhan, Raju&nbsp;v&agrave;&nbsp;Rancho. Mỗi người xuất th&acirc;n từ một ho&agrave;n cảnh kh&aacute;c nhau v&agrave; ch&iacute;nh điều n&agrave;y khiến việc học của họ cũng c&oacute; sự kh&aacute;c biệt. Rancho học ho&agrave;n to&agrave;n v&igrave; nhiệt huyết con tim trong khi Farhan học v&igrave; nguyện vọng của người cha v&agrave; Raju học để gi&uacute;p gia đ&igrave;nh tho&aacute;t ngh&egrave;o. Bộ phim l&agrave; c&acirc;u chuyện cảm động về t&igrave;nh bạn, đồng thời khẳng định một b&agrave;i học đắt gi&aacute;&nbsp;&ldquo;Đại học kh&ocirc;ng phải l&agrave; con đường duy nhất&rdquo;.</p><p>4. The Godfather &ndash; Bố Gi&agrave;</p><p>The Godfather (1972)&nbsp;được sản xuất dựa theo cuốn tiểu thuyết c&ugrave;ng t&ecirc;n của nh&agrave; văn Mario Puzo do&nbsp;đạo diễn Francis Ford Coppola thực hiện. Bộ phim xoay quanh cuộc sống của gia đ&igrave;nh &ocirc;ng tr&ugrave;m mafia&nbsp;kh&eacute;t tiếng nhất nước mỹ Vito Corleone. Con trai &uacute;t michael l&agrave; người&nbsp;kh&ocirc;ng tham gia bất cứ phi vụ n&agrave;o của gia đ&igrave;nh. Tuy nhi&ecirc;n sau vụ cha anh bị &aacute;m s&aacute;t thất bại,&nbsp;Michael bước v&agrave;o h&agrave;nh tr&igrave;nh trả th&ugrave; cho cha đầy m&aacute;u v&agrave; hiểm nguy. Với t&igrave;nh tiết hấp dẫn, gay cấn, những m&agrave;n đấu s&uacute;ng nguy hiểm, phim đưa người xem đến với thế giới tội phạm đầy bạo lực, t&agrave;n nhẫn với những vỏ bọc giả dối th&ocirc;ng qua c&acirc;u chuyện của một gia đ&igrave;nh mafia gốc Italy ở New York.&nbsp;Phim gi&agrave;nh 3 giải Oscar v&agrave; lu&ocirc;n nằm trong số những bộ phim hay nhất của mọi thời đại.</p><p>B&agrave;i học r&uacute;t ra trong phim l&agrave; gia&nbsp;đ&igrave;nh lu&ocirc;n l&agrave; quan trọng nhất v&agrave; trong kinh doanh, tr&ecirc;n thương trường, cạnh tranh l&agrave; kh&ocirc;ng khoan nhượng.</p><p>5. Trước l&uacute;c b&igrave;nh minh &ndash;&nbsp;Before Sunrise</p><p>Jesse v&agrave; Celine, hai con người xa lạ đ&atilde;&nbsp;nảy sinh mối quan hệ khi gặp nhau tr&ecirc;n chuyến t&agrave;u từ Budapest đến Hungary. Mặc d&ugrave; họ chỉ c&oacute;&nbsp;rất &iacute;t thời gian b&ecirc;n nhau nhưng họ đ&atilde; tận dụng tối đa khoảng thời gian đ&oacute; để tạo n&ecirc;n những khoảnh khắc kh&oacute; qu&ecirc;n trong t&acirc;m tr&iacute; hai người.</p><p>Trước l&uacute;c b&igrave;nh minh&nbsp;(1995) nhắc nhở ch&uacute;ng ta n&ecirc;n tr&acirc;n trọng khoảng thời gian b&ecirc;n cạnh những người m&agrave; ch&uacute;ng ta y&ecirc;u thương.</p><p>Mỗi lần bạn ch&uacute; t&acirc;m&nbsp;theo d&otilde;i&nbsp;cuộc tr&ograve; chuyện của hai người lạ n&agrave;y trong&nbsp;Trước l&uacute;c b&igrave;nh minh&nbsp;l&agrave; mỗi lần bạn được truyền cảm hứng tr&acirc;n trọng gi&acirc;y ph&uacute;t b&ecirc;n cạnh người m&igrave;nh y&ecirc;u thương đấy.</p><p>6. Forrest Gump &ndash; Cuộc Đời Forrest Gump</p><p>Forrest Gump (1994)&nbsp;được&nbsp;chuyển thể từ một t&aacute;c phẩm văn học c&ugrave;ng t&ecirc;n của Winston Groom do đạo diễn Robert Zemeckis thực hiện. Bộ phim&nbsp;đ&atilde; khắc họa th&agrave;nh c&ocirc;ng nh&acirc;n vật ch&agrave;ng ngốc tuyệt vời với một tr&aacute;i tim nh&acirc;n&nbsp;&aacute;i v&agrave; một t&igrave;nh y&ecirc;u chung thủy anh d&agrave;nh cho Jenny. Cuộc&nbsp;đời forrest ch&iacute;nh l&agrave; mảnh gh&eacute;p của rất nhiều người Mỹ trong thập ni&ecirc;n 60- 70 của thế kỉ trước. Bộ phim đưa ch&uacute;ng ta&nbsp;đến với nhiều cung bậc cảm x&uacute;c kh&aacute;c nhau về t&igrave;nh mẫu tử, t&igrave;nh y&ecirc;u v&agrave; những nỗ lực kh&ocirc;ng ngừng của ch&agrave;ng trai c&oacute; IQ 75 trở th&agrave;nh một triệu ph&uacute;. Bộ phim&nbsp;đ&atilde; gi&agrave;nh&nbsp;được 6 giải&nbsp;Oscar v&agrave; lu&ocirc;n nằm trong top những bộ phim hay nhất mọi thời&nbsp;đại.</p><p>B&agrave;i học r&uacute;t ra trong phim l&agrave; khi bạn cảm thấy cuộc sống bế tắc, h&atilde;y nghĩ rằng cuộc sống hiện tại của m&igrave;nh c&ograve;n hạnh ph&uacute;c hơn rất nhiều người.</p><p>7. The Help (Người gi&uacute;p việc)</p><p>The Help&nbsp;được chuyển thể từ cuốn tiểu thuyết ăn kh&aacute;ch c&ugrave;ng t&ecirc;n của nữ nh&agrave; văn&nbsp;Kathryn Stockett&nbsp;xuất bản năm 2009. Phim đem tới một c&aacute;i nh&igrave;n tổng thể về x&atilde; hội Mỹ thập ni&ecirc;n 1960 &ndash; khi nạn ph&acirc;n biệt chủng tộc ở giai đoạn mạnh mẽ nhất. Thời đ&oacute;, những người gi&uacute;p việc da m&agrave;u bị những người chủ da trắng sở hữu. Họ nhận đồng lương rẻ mạt v&agrave; bị kỳ thị đủ điều. Họ phải nu&ocirc;i lớn những đứa trẻ da trắng trong khi kh&ocirc;ng được chăm s&oacute;c đứa con do m&igrave;nh sinh ra v&agrave; sau tất cả, sự im lặng đ&atilde; bị ph&aacute; vỡ để tạo ra bước ngoặt l&agrave;m rung chuyển cả một thời đại.</p><p>8. V&ugrave;ng đất linh hồn &ndash;&nbsp;Spirited Away</p><p>Một ng&atilde; rẻ sai lầm đ&atilde; khiến cho Chihiro v&agrave; gia đ&igrave;nh c&ocirc; lạc v&agrave;o nơi sinh sống của những con qu&aacute;i vật v&agrave; những linh hồn. Chihiro phải t&igrave;m c&aacute;ch tho&aacute;t khỏi v&ugrave;ng đất đ&aacute;ng sợ n&agrave;y, v&agrave; trong qu&aacute; tr&igrave;nh đ&oacute; c&ocirc; b&eacute; đ&atilde; nhận ra được gi&aacute; trị của ch&iacute;nh m&igrave;nh.</p><p>V&ugrave;ng đất linh hồn&nbsp;(2001) l&agrave; một c&acirc;u chuyện hoạt h&igrave;nh xinh đẹp chứa đựng một th&ocirc;ng điệp đầy &yacute; nghĩa. H&atilde;y xem bộ&nbsp;phim n&agrave;y mỗi khi bạn đối mặt với c&aacute;c kh&oacute; khăn thử th&aacute;ch v&agrave; nh&igrave;n nhận quan điểm sống của m&igrave;nh.</p><p>9. Minari &ndash; Kh&aacute;t vọng đổi đời (2021)</p><p>Bộ phim về một gia đ&igrave;nh người Mỹ gốc H&agrave;n gồm c&oacute; 5 th&agrave;nh vi&ecirc;n: người cha Jacob mang đầy ho&agrave;i b&atilde;o, người mẹ Monica lu&ocirc;n hết l&ograve;ng v&igrave; gia đ&igrave;nh, c&ocirc; b&eacute; Anne ch&iacute;n chắn trước tuổi, cậu con trai nhỏ David tinh nghịch v&agrave; người b&agrave; ngoại ph&oacute;ng kho&aacute;ng. Sau nhiều năm sinh sống tại th&agrave;nh phố California với nghề ph&acirc;n loại giới t&iacute;nh g&agrave; con, người cha Jacob quyết định mang cả gia đ&igrave;nh đến bang Arkansas &ndash; một v&ugrave;ng qu&ecirc; xa x&ocirc;i, hẻo l&aacute;nh. Tại đ&acirc;y, họ thực hiện ước mơ trồng rau củ, kiếm thật nhiều tiền để tho&aacute;t kiếp l&agrave;m thu&ecirc; đầy tủi nhục.</p><p>V&agrave; đ&oacute; l&agrave; l&uacute;c m&agrave; gia đ&igrave;nh nhỏ xinh đẹp n&agrave;y phải đối diện với nhiều thử th&aacute;ch v&agrave; biến cố. Tưởng chừng sẽ gục ng&atilde;, sẽ phải chia c&aacute;ch nhau nhưng đến cuối c&ugrave;ng, họ vẫn lu&ocirc;n b&ecirc;n cạnh nhau để chinh phục giấc mơ Mỹ ch&aacute;y bỏng..</p><p>Bộ phim l&agrave; một b&aacute;n tự truyện kể về qu&aacute; tr&igrave;nh nu&ocirc;i dạy con c&aacute;i của đạo diễn Lee Isaac Chung, Minari xoay quanh một gia đ&igrave;nh nhập cư người H&agrave;n Quốc đến v&ugrave;ng n&ocirc;ng th&ocirc;n Arkansas để theo đuổi &ldquo;giấc mơ Mỹ&rdquo;. Bộ phim thể hiện trải nghiệm ch&acirc;n thực của người nhập cư ở Mỹ, từ đ&oacute; được đề cử s&aacute;u giải thưởng Oscar năm 2021, bao gồm cả Phim hay nhất.</p><p>10. Call Me By Your Name (2017) &ndash; Gọi Em Bằng T&ecirc;n Anh</p><p>Trong bộ phim l&atilde;ng mạn v&agrave; nghiệt ng&atilde; n&agrave;y, ch&uacute;ng ta được ch&iacute;nh kiến diễn xuất đột ph&aacute; của Timothee Chalamet v&agrave; Armie Hammer. Call Me By Your Name l&agrave; c&acirc;u chuyện về Elio, ch&agrave;ng trai người Do Th&aacute;i 17 tuổi sống trong biệt thự của gia đ&igrave;nh ở &Yacute;. Một ng&agrave;y ch&agrave;ng sinh vi&ecirc;n Oliver đến l&agrave;m thực tập cho cha Elio. Giữa khung cảnh lộng lẫy ngập tr&agrave;n &aacute;nh nắng, Elio v&agrave; Oliver kh&aacute;m ph&aacute; ra t&igrave;nh y&ecirc;u ngọt ng&agrave;o họ d&agrave;nh cho cho nhau.</p>', 'post/TaQ2lNwApBpNDF5v1X3hOFvgMCMGEl0GwHCHTQeB.png', 9, 9, 'top-10-bo-phim-hay-nhat-ma-ban-nen-xem-mot-lan-trong-doi', 4, '2024-06-30 06:15:16', '2024-07-09 08:50:52'),
(19, 'Dàn mỹ nhân \'Anh hùng xạ điêu\' 2024', '<p>Mạnh Tử Nghĩa được khen tạo h&igrave;nh, diễn xuất khi đ&oacute;ng Mai Si&ecirc;u Phong.</p><p>&nbsp;</p><p>&nbsp;</p><p><a href=\"https://vnexpress.net/dan-my-nhan-anh-hung-xa-dieu-2024-4764422.html#box_comment_vne\">12</a></p><p><em>Anh h&ugrave;ng xạ đi&ecirc;u&nbsp;</em>2024 (t&ecirc;n kh&aacute;c:&nbsp;<em>Thế giới v&otilde; hiệp Kim Dung</em>) ra mắt th&aacute;ng 6, Bao Thượng &Acirc;n, 22 tuổi, v&agrave;o vai nữ ch&iacute;nh Ho&agrave;ng Dung - con g&aacute;i Ho&agrave;ng Dược Sư. Trong nguy&ecirc;n t&aacute;c của Kim Dung, Ho&agrave;ng Dung như ti&ecirc;n nữ gi&aacute;ng trần, da trắng như tuyết, tươi như hoa xu&acirc;n, đẹp tựa r&aacute;ng mặt trời buổi b&igrave;nh minh. N&agrave;ng c&ograve;n th&ocirc;ng minh xuất ch&uacute;ng, lắm mưu nhiều kế, t&iacute;nh c&aacute;ch nửa ch&iacute;nh nửa t&agrave;.</p><p>Tr&ecirc;n c&aacute;c diễn đ&agrave;n phim kiếm hiệp, nhiều kh&aacute;n giả khen Thượng &Acirc;n xinh xắn, dễ thương, tạo h&igrave;nh đẹp. Tuy nhi&ecirc;n số kh&aacute;c nhận x&eacute;t diễn xuất của Bao Thượng &Acirc;n&nbsp;<a target=\"_blank\" href=\"https://vnexpress.net/my-nhan-22-tuoi-dien-khong-ra-vai-hoang-dung-4761398.html\">non nớt</a>, chưa l&agrave;m bật được sự kh&ocirc;n ngoan, l&eacute;m lỉnh như mi&ecirc;u tả trong truyện.</p><p>Video Player is loading.</p><p>Dừng</p><p>Hiện tại&nbsp;0:07</p><p>/</p><p>Thời lượng&nbsp;1:02</p><p>Đ&atilde; tải: 0%</p><p>Tiến tr&igrave;nh: 0%</p><p>Bỏ tắt tiếng</p><p>To&agrave;n m&agrave;n h&igrave;nh</p><p>&nbsp;</p><p>Quảng c&aacute;o c&oacute; thể hiển thị sau&nbsp;<strong>3</strong>&nbsp;gi&acirc;y</p><p>Ho&agrave;ng Dung (xuất hiện từ gi&acirc;y thứ ba) ở cảnh nhận ra cha - Ho&agrave;ng Dược Sư - khi &ocirc;ng đeo mặt nạ. Video:&nbsp;<em>QQ</em></p><p>&nbsp;</p><p>Thượng &Acirc;n v&agrave; Thử Sa, t&agrave;i tử đ&oacute;ng Qu&aacute;ch Tĩnh.</p><p>Ho&agrave;ng Nghệ đ&oacute;ng Mục Niệm Từ, c&ocirc; g&aacute;i hiếu thuận, trọng đạo l&yacute;, gặp nhiều khổ đau v&igrave; y&ecirc;u Dương Khang.</p><p>Ho&agrave;ng Nghệ nhận nhiều b&igrave;nh luận t&iacute;ch cực về tạo h&igrave;nh, diễn xuất. Cảnh c&ocirc; quyết định đoạn tuyệt với Dương Khang, v&igrave; người y&ecirc;u vong &acirc;n bội nghĩa, được nhiều kh&aacute;n giả khen ch&acirc;n thực, tạo đồng cảm.</p><p>Ho&agrave;ng Nghệ 27 tuổi, từng đ&oacute;ng&nbsp;<em>Sơn h&agrave; minh nguyệt, Trường An nặc, Lưu Ly, C&acirc;u chuyện hoa hồng</em>.</p><p>Theo&nbsp;<em>Sohu</em>, thể hiện của Mạnh Tử Nghĩa, vai Mai Si&ecirc;u Phong, l&agrave; một trong điểm s&aacute;ng của phim. C&ocirc; lột tả sự si t&igrave;nh, t&agrave;n nhẫn v&agrave; bất lực của nh&acirc;n vật. Trong truyện, Mai Si&ecirc;u Phong l&agrave; đồ đệ của Ho&agrave;ng Dược Sư, y&ecirc;u sư huynh Trần Huyền Phong, b&iacute; mật kết l&agrave;m phu th&ecirc;. Sợ Ho&agrave;ng Dược Sư ph&aacute;t hiện, cả hai lấy trộm quyển hạ bộ Cửu &Acirc;m Ch&acirc;n Kinh của sư phụ rồi trốn khỏi Đảo Đ&agrave;o Hoa, khiến Ph&ugrave;ng H&agrave;nh - vợ Ho&agrave;ng Dược Sư - lao lực viết lại bộ v&otilde;.</p><p>Mạnh Tử Nghĩa 28 tuổi, từng đ&oacute;ng&nbsp;<em>Anh h&ugrave;ng xạ đi&ecirc;u</em>&nbsp;2017 (vai Mục Niệm Từ),&nbsp;<em>Trần t&igrave;nh lệnh, Luận anh h&ugrave;ng ai xứng anh h&ugrave;ng</em>.</p><p>Tạo h&igrave;nh Ph&ugrave;ng Ho&agrave;nh, vợ Ho&agrave;ng Dược Sư, của Trần Đ&ocirc; Linh.</p><p>M&atilde; Lệ &Aacute; đ&oacute;ng c&ocirc;ng ch&uacute;a Hoa Tranh, con của Th&agrave;nh C&aacute;t Tư H&atilde;n, y&ecirc;u Qu&aacute;ch Tĩnh nhưng ch&agrave;ng coi c&ocirc;ng ch&uacute;a như em g&aacute;i.</p><p>Tạo h&igrave;nh Anh C&ocirc; của Vưu Tĩnh Như. Anh C&ocirc; vốn l&agrave; qu&yacute; phi của Đo&agrave;n Tr&iacute; Hưng nhưng nảy sinh t&igrave;nh cảm với Chu B&aacute; Th&ocirc;ng, c&oacute; con với nh&acirc;n t&igrave;nh. Chuyện t&igrave;nh ngang tr&aacute;i l&agrave;m nảy sinh nhiều mối th&ugrave; hận.</p><p>&nbsp;</p><p>&nbsp;</p><p><a href=\"https://vnexpress.net/tao-hinh-cong-tu-hao-sac-o-anh-hung-xa-dieu-2024-4762250.html\">Tạo h&igrave;nh c&ocirc;ng tử h&aacute;o sắc ở &#39;Anh h&ugrave;ng xạ đi&ecirc;u&#39; 2024</a></p><p><a href=\"https://vnexpress.net/tao-hinh-cong-tu-hao-sac-o-anh-hung-xa-dieu-2024-4762250.html\">Vai c&ocirc;ng tử của Trương Ch&iacute; Hạo trong &quot;Anh h&ugrave;ng xạ đi&ecirc;u&quot; 2024 ngoại h&igrave;nh tuấn t&uacute; nhưng nhiều kh&aacute;n giả nhận x&eacute;t &quot;ẻo lả&quot;.</a>&nbsp;<a href=\"https://vnexpress.net/tao-hinh-cong-tu-hao-sac-o-anh-hung-xa-dieu-2024-4762250.html#box_comment_vne\">&nbsp;33</a></p><p>&nbsp;</p><p><a href=\"https://vnexpress.net/hau-truong-quach-tinh-anh-hung-xa-dieu-cuoi-ngua-ban-ten-4756966.html\">Hậu trường Qu&aacute;ch Tĩnh &#39;Anh h&ugrave;ng xạ đi&ecirc;u&#39; cưỡi ngựa bắn t&ecirc;n</a></p><p><a href=\"https://vnexpress.net/hau-truong-quach-tinh-anh-hung-xa-dieu-cuoi-ngua-ban-ten-4756966.html\">Diễn vi&ecirc;n Trung Quốc Thử Sa trổ t&agrave;i bắn cung tr&ecirc;n lưng ngựa khi đ&oacute;ng Qu&aacute;ch Tĩnh phim &quot;Anh h&ugrave;ng xạ đi&ecirc;u&quot; 2024.</a>&nbsp;<a href=\"https://vnexpress.net/hau-truong-quach-tinh-anh-hung-xa-dieu-cuoi-ngua-ban-ten-4756966.html#box_comment_vne\">&nbsp;38</a></p><p>&nbsp;</p><p><a href=\"https://vnexpress.net/my-nhan-22-tuoi-dien-khong-ra-vai-hoang-dung-4761398.html\">Mỹ nh&acirc;n 22 tuổi &#39;diễn kh&ocirc;ng ra&#39; vai Ho&agrave;ng Dung</a></p><p><a href=\"https://vnexpress.net/my-nhan-22-tuoi-dien-khong-ra-vai-hoang-dung-4761398.html\">Sao Trung Quốc Bao Thượng &Acirc;n bị kh&aacute;n giả ch&ecirc; kh&ocirc;ng c&oacute; vẻ sắc sảo của Ho&agrave;ng Dung trong &quot;Anh h&ugrave;ng xạ đi&ecirc;u&quot;.</a>&nbsp;<a href=\"https://vnexpress.net/my-nhan-22-tuoi-dien-khong-ra-vai-hoang-dung-4761398.html#box_comment_vne\">&nbsp;77</a></p>', 'post/gzBSxJewtS45od2D0t4EPw5q5ZAlqPnel8lrbxWs.jpg', 4, 13, 'dan-my-nhan-anh-hung-xa-dieu-2024', 1, '2024-07-01 16:01:12', '2024-07-09 08:48:37'),
(20, '\'Chồng và con trai\' Thanh Hương hội ngộ gây bão, nhan sắc cả hai quá đỉnh', '<p>Kh&aacute;n giả trầm trồ kh&ocirc;ng ngớt trước nhan sắc của &#39;chồng con&#39; nh&agrave; Thanh Hương.</p><p>Mới đ&acirc;y, diễn vi&ecirc;n Việt Ho&agrave;ng c&oacute; dịp hội ngộ bố ruột m&agrave;n ảnh - NSƯT Ho&agrave;ng Hải. Cả hai c&oacute; dịp hợp t&aacute;c trong phim truyền h&igrave;nh&nbsp;<em><strong>Cuộc Đời Vẫn Đẹp Sao</strong></em>&nbsp;c&aacute;ch đ&acirc;y 1 năm.</p><p>Sau 1 năm xa c&aacute;ch, chồng v&agrave; con trai m&agrave;n ảnh của&nbsp;<a href=\"https://www.saostar.vn/dien-anh/thanh-huong-ngoi-khoc-ca-dem-vi-ly-do-bat-ngo-202407021210468383.html\">Thanh Hương</a>&nbsp;khiến d&acirc;n t&igrave;nh bất ngờ, bởi vẻ ngo&agrave;i ng&agrave;y một phong độ, trẻ trung.</p><p>Tr&ecirc;n trang c&aacute; nh&acirc;n, diễn vi&ecirc;n Việt Ho&agrave;ng cho biết, m&igrave;nh vừa c&oacute; cuộc hẹn th&acirc;n mật với bố Lưu (t&ecirc;n nh&acirc;n vật của NSƯT Ho&agrave;ng Hải). Nam diễn vi&ecirc;n cũng h&agrave;i hước kể lại những kỷ niệm vui hồi đ&oacute;ng&nbsp;<em><strong>Cuộc Đời Vẫn Đẹp Sao&nbsp;</strong></em>c&ugrave;ng &ldquo;bố ruột&rdquo;. Trong đ&oacute;, vụ Lưu su&yacute;t b&aacute;n thận để cứu con cũng được anh ch&agrave;ng nhắc lại.</p><p><em>&ldquo;S&aacute;ng sớm Bố Lưu hẹn ra đưa &iacute;t vốn. Bố dặn đi xuất khẩu lao động th&igrave; cầm lấy mấy đồng kh&ocirc;ng kh&oacute; khăn qu&aacute; lại lăn tăn sang đấy lại mất 1 quả&hellip; Vụ su&yacute;t mất 1 quả con vẫn nhớ lắm bố ạ. Bố y&ecirc;n t&acirc;m! Nhưng Bố lấy vốn đ&acirc;u để đưa con mấy đồng thế?&rdquo;,</em>&nbsp;con trai m&agrave;n ảnh Thanh Hương viết.</p><p>Chồng v&agrave; con trai m&agrave;n ảnh của Thanh Hương g&acirc;y sốt v&igrave; qu&aacute; bảnh bao.</p><p>Trong bức ảnh được đ&iacute;nh k&egrave;m, Việt Ho&agrave;ng tr&ocirc;ng ng&agrave;y một chững chạc, ra d&aacute;ng so&aacute;i ca m&agrave;n ảnh. Trong khi đ&oacute;, &ldquo;&ocirc;ng x&atilde;&rdquo; Thanh Hương lại lạ lẫm trong m&aacute;i t&oacute;c bạc trắng. Cả hai cười tươi r&oacute;i, vui vẻ tạo d&aacute;ng tr&ocirc;ng rất th&acirc;n thiết.&nbsp;</p><p>C&oacute; thể n&oacute;i, d&ugrave;&nbsp;<em><strong>Cuộc Đời Vẫn Đẹp Sao</strong></em>&nbsp;đ&atilde; kết th&uacute;c kh&aacute; l&acirc;u, nhưng chồng v&agrave; con trai m&agrave;n ảnh của Thanh Hương vẫn giữ mối quan hệ tốt đẹp với nhau. Được biết, trong thời gian bấm m&aacute;y, Việt Ho&agrave;ng đ&atilde; nhận được sự hỗ trợ, chỉ dẫn nhiệt t&igrave;nh từ Thanh Hương, NSƯT Ho&agrave;ng Hải c&ugrave;ng c&aacute;c diễn vi&ecirc;n gạo cội trong d&agrave;n cast. Kh&aacute;n giả đặt kỳ vọng v&agrave;o m&agrave;n hội ngộ của t&acirc;n binh VFC với bố mẹ m&agrave;n ảnh.</p><p>Kh&aacute;n giả đặt kỳ vọng v&agrave;o m&agrave;n hội ngộ của d&agrave;n cast Cuộc Đời Vẫn Đẹp Sao.</p><p>Việt Ho&agrave;ng sinh năm 1998, g&acirc;y ch&uacute; &yacute; khi v&agrave;o vai Thạch trong phim&nbsp;<em><strong>Cuộc Đời Vẫn Đẹp Sao</strong></em>. Trong phim, anh ch&agrave;ng đảm nhiệm vai con trai của Thanh Hương v&agrave; NSƯT Ho&agrave;ng Hải.&nbsp;</p><p>Sau dự &aacute;n n&agrave;y, &ldquo;con trai&rdquo; Thanh Hương tiếp tục ghi dấu ấn khi g&oacute;p mặt trong nhiều tựa phim mới của vũ trụ VTV như&nbsp;<em><strong>Cuộc Chiến Kh&ocirc;ng Giới Tuyến</strong></em>&nbsp;v&agrave;&nbsp;<em><strong>Những Nẻo Đường Gần Xa</strong></em>.</p><p>Việt Ho&agrave;ng v&agrave; Trần Ki&ecirc;n trong phim Những Nẻo Đường Gần Xa đang l&ecirc;n s&oacute;ng.</p>', 'post/2p02zkCRImrfMt8JZi2bSebXHURuQoBdmEX88uaD.webp', 3, 13, 'chong-va-con-trai-thanh-huong-hoi-ngo-gay-bao-nhan-sac-ca-hai-qua-dinh', 1, '2024-07-03 08:13:54', '2024-07-03 17:38:28');
INSERT INTO `posts` (`id`, `tieu_de`, `noi_dung`, `anh`, `luot_xem`, `user_id`, `slug`, `catelogue_post_id`, `created_at`, `updated_at`) VALUES
(21, 'Quang Sự bất ngờ khoe tài sản khủng sau ly hôn Hồng Diễm – Thu Trang trong Trạm Cứu Hộ Trái Tim', '<h2>Quang Sự bất ngờ khoe khối t&agrave;i sản khủng sau khi ly h&ocirc;n Hồng Diễm, Lương Thu Trang ở Trạm Cứu Hộ Tr&aacute;i Tim.</h2>\r\n\r\n<p><a href=\"https://www.saostar.vn/dien-anh/thuy-diem-bi-boc-tran-tinh-cach-that-o-ngoai-doi-202406291233264187.html\"><em><strong>Trạm Cứu Hộ Tr&aacute;i Tim</strong></em></a>&nbsp;hiện đang l&agrave; bộ phim truyền h&igrave;nh nhận được sự quan t&acirc;m rất lớn của kh&aacute;n giả m&agrave;n ảnh nhỏ. Bộ phim đ&atilde; bước v&agrave;o tập cuối c&ugrave;ng v&agrave; c&agrave;ng khiến người xem hồi hộp chờ đợi nhiều hơn nữa. Mới đ&acirc;y tr&ecirc;n trang c&aacute; nh&acirc;n của m&igrave;nh, Quang Sự đ&atilde; chia sẻ một khoảnh khắc trước thềm tập cuối của&nbsp;<em><strong>Trạm Cứu Hộ Tr&aacute;i Tim</strong></em>.</p>\r\n\r\n<p>Quang Sự viết: &ldquo;<em>Kh&ocirc;ng c&ograve;n c&ocirc; vợ n&agrave;o nữa, đ&uacute;ng l&agrave; một dạng tự do to bự (Nghĩa n&oacute;i). P/s: C&oacute; quả nhẫn kim cương to thế m&agrave; kh&ocirc;ng c&ocirc; n&agrave;o th&egrave;m nhận</em>&rdquo;. K&egrave;m theo đ&oacute; l&agrave; h&igrave;nh ảnh nam diễn vi&ecirc;n đeo chiếc nhẫn kim cương si&ecirc;u to&hellip; bằng b&oacute;ng bay tr&ecirc;n c&aacute;nh tay. Động th&aacute;i n&agrave;y của Quang Sự khiến nhiều người kh&ocirc;ng khỏi bật cười.</p>\r\n\r\n<h2><span style=\"font-size:8px\"><img alt=\"Quang Sự bất ngờ khoe tài sản khủng sau ly hôn Hồng Diễm – Thu Trang trong Trạm Cứu Hộ Trái Tim Ảnh 1\" class=\"left\" src=\"https://ss-images.saostar.vn/wp700/2024/7/2/pc/1719936684170/gn6cf4udb91-f4x6i16s2t2-xk0yrosjcp3.jpg\" style=\"height:915px; width:600px\" /></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Quang Sự khoe nhẫn kim cương si&ecirc;u khủng trước thềm tập cuối của Trạm Cứu Hộ Tr&aacute;i Tim</p>\r\n\r\n<p>Dưới phần b&igrave;nh luận, c&oacute; kh&aacute;n giả đ&ugrave;a vui rằng phải chăng ở tập cuối&nbsp;<em><strong>Trạm Cứu Hộ Tr&aacute;i Tim</strong></em>, Nghĩa sẽ sống hạnh ph&uacute;c với vi&ecirc;n kim cương si&ecirc;u khủng sau khi ly h&ocirc;n hai vợ. Thế nhưng cũng c&oacute; kh&ocirc;ng &iacute;t &yacute; kiến cho rằng c&oacute; lẽ anh Nghĩa đang sống nốt khoảng thời gian gi&agrave;u c&oacute; trước khi phải trả lại hết t&agrave;i sản cho Ng&acirc;n H&agrave;.</p>\r\n\r\n<p>Hiện tại, số phận của d&agrave;n nh&acirc;n vật&nbsp;<em><strong>Trạm Cứu Hộ Tr&aacute;i Tim</strong></em>&nbsp;trong tập cuối vẫn khiến kh&aacute;n giả v&ocirc; c&ugrave;ng mong ng&oacute;ng, đặc biệt l&agrave; nh&acirc;n vật Nghĩa v&agrave; An Nhi&ecirc;n. Cặp đ&ocirc;i n&agrave;y tuy &aacute;c, nhưng c&agrave;ng về sau lại c&agrave;ng khiến người xem cảm thấy đ&aacute;ng thương. Chỉ v&igrave; những th&igrave; hận trong qu&aacute; khứ, Nghĩa v&agrave; An Nhi&ecirc;n đ&atilde; đ&aacute;nh mất l&yacute; tr&iacute; v&agrave; l&agrave;m ra những chuyện sai lầm.</p>\r\n\r\n<p><img alt=\"Quang Sự bất ngờ khoe tài sản khủng sau ly hôn Hồng Diễm – Thu Trang trong Trạm Cứu Hộ Trái Tim Ảnh 3\" class=\"left\" src=\"https://ss-images.saostar.vn/wp700/2024/7/2/pc/1719936684170/ma13zydpcu1-oz122mjmeb2-ur25if2ejo3.jpg\" style=\"height:1000px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Kh&aacute;n giả mong đợi c&aacute;i kết của bộ phim Trạm Cứu Hộ Tr&aacute;i Tim</p>\r\n\r\n<p><em><strong>Trạm Cứu Hộ Tr&aacute;i Tim</strong></em>&nbsp;chỉ c&ograve;n một tập cuối khiến kh&aacute;n giả c&agrave;ng mong đợi nhiều hơn nữa.</p>\r\n\r\n<p>&nbsp;</p>', 'post/S9KyqDqUKrOsNjxMou1MFlPsBiRZQT9uSCvrVJiQ.webp', 1, 10, 'quang-su-bat-ngo-khoe-tai-san-khung-sau-ly-hon-hong-diem-thu-trang-trong-tram-cuu-ho-trai-tim', 1, '2024-07-03 08:18:48', '2024-07-03 08:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `post_tagpost`
--

CREATE TABLE `post_tagpost` (
  `post_id` bigint UNSIGNED NOT NULL,
  `tag_post_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tagpost`
--

INSERT INTO `post_tagpost` (`post_id`, `tag_post_id`) VALUES
(18, 1),
(12, 2),
(18, 2),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(19, 7),
(20, 7),
(21, 7);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `banner_video` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tieu_de` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `banner_video_2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tieu_de_2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung_2` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `banner_video`, `tieu_de`, `noi_dung`, `created_at`, `updated_at`, `banner_video_2`, `tieu_de_2`, `noi_dung_2`) VALUES
(1, 'settings/OeVEKqpLY4qzPJq6kWnAWmnvhbi1a3u3elyXfVkW.mp4', 'CÔNG PHU GẤU TRÚC 4', 'Sau khi Po được chọn trở thành Thủ lĩnh tinh thần của Thung lũng Bình Yên, Po cần tìm và huấn luyện một Chiến binh Rồng mới, trong khi đó một mụ phù thủy độc ác lên kế hoạch triệu hồi lại tất cả những kẻ phản diện mà Po đã đánh bại về cõi linh hồn.', '2024-07-04 09:41:08', '2024-07-05 10:00:11', 'settings/erbHGfFthsJnjFT7PnszD90AEmUcmNCPLtmFNTWG.mp4', 'THẾ THẦN: NGỰ KHÍ SƯ CUỐI CÙNG: PHẦN 1', 'Cậu bé nổi tiếng với danh xưng Thế thần phải thuần thục bốn sức mạnh nguyên tố để cứu thế giới đang chiến tranh… và chiến đấu với kẻ thù tàn nhẫn muốn ngăn cản mình.');

-- --------------------------------------------------------

--
-- Table structure for table `tag_posts`
--

CREATE TABLE `tag_posts` (
  `id` bigint UNSIGNED NOT NULL,
  `ten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tag_posts`
--

INSERT INTO `tag_posts` (`id`, `ten`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Hollywood', 'hollywood', '2024-06-28 04:03:55', '2024-06-28 04:03:55'),
(2, 'Phim bom tấn nhất', 'phim-bom-tan-nhat', '2024-06-28 04:03:55', '2024-06-30 08:56:38'),
(3, 'Footer', 'footer', '2024-06-30 05:36:35', '2024-06-30 05:36:35'),
(7, 'Giải trí', 'giai-tri', '2024-06-30 09:23:56', '2024-06-30 09:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_histories`
--

CREATE TABLE `transaction_histories` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `truoc_giao_dich` bigint NOT NULL,
  `sau_giao_dich` bigint NOT NULL,
  `bien_dong_so_du` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_tao` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_histories`
--

INSERT INTO `transaction_histories` (`id`, `user_id`, `truoc_giao_dich`, `sau_giao_dich`, `bien_dong_so_du`, `mo_ta`, `ngay_tao`, `created_at`, `updated_at`) VALUES
(47, 10, 0, 980000, '+980000', 'Nạp tiền mã giao dịch: 1720004640', '2024-07-03 11:04:29', NULL, NULL),
(48, 10, 980000, 1000000, '+20000', 'Nạp tiền mã giao dịch: 1720004808', '2024-07-03 11:07:21', NULL, NULL),
(49, 10, 1000000, 950000, '-50000', 'Mua phim: HỘI CHỨNG TUỔI THANH XUÂN: CÔ BÉ ĐEO CẶP SÁCH', '2024-07-03 11:10:24', NULL, NULL),
(50, 10, 950000, 945000, '-5000', 'Tiền phạt người dùng spam quá 3 lần', '2024-07-03 11:11:41', NULL, NULL),
(51, 10, 945000, 935000, '-10000', 'Mua phim: THIẾU NIÊN VÀ CHIM DIỆC', '2024-07-03 12:38:10', NULL, NULL),
(52, 10, 935000, 785000, '-150000', 'Mua phim: GIA TỘC RỒNG (PHẦN 2)', '2024-07-03 14:22:42', NULL, NULL),
(53, 10, 785000, 784000, '-1000', 'Mua phim: GEATS EXTRA: KAMEN RIDER GAZER', '2024-07-03 14:40:04', NULL, NULL),
(54, 10, 784000, 634000, '-150000', 'Mua phim: CHUYỆN NGÀY XƯA Ở… HOLLYWOOD', '2024-07-03 14:50:07', NULL, NULL),
(55, 10, 634000, 622000, '-12000', 'Mua phim: BỐ GIÀ (2021)', '2024-07-03 14:50:52', NULL, NULL),
(56, 10, 622000, 472000, '-150000', 'Mua phim: CÔ ẤY, NGÀY VÀ ĐÊM', '2024-07-03 14:52:51', NULL, NULL),
(57, 10, 472000, 471000, '-1000', 'Mua phim: 7 NĂM CHƯA CƯỚI SẼ CHIA TAY\r\n', '2024-07-03 14:54:22', NULL, NULL),
(58, 10, 471000, 469000, '-2000', 'Mua phim: 7 VIÊN NGỌC RỒNG\r\n', '2024-07-03 14:59:44', NULL, NULL),
(59, 10, 469000, 471000, '+2000', 'Tiền thưởng báo lỗi phim trên 5 lần đã giúp admin fix thành công', '2024-07-03 15:37:50', NULL, NULL),
(60, 10, 471000, 470000, '-1000', 'Mua phim: 7 NĂM CHƯA CƯỚI SẼ CHIA TAY\r\n', '2024-07-03 15:40:23', NULL, NULL),
(61, 10, 470000, 475000, '+5000', 'Tiền thưởng báo lỗi phim trên 10 lần đã giúp admin fix thành công', '2024-07-03 15:41:27', NULL, NULL),
(62, 10, 475000, 480000, '+5000', 'Tiền thưởng báo lỗi phim 10 lần đã giúp admin fix thành công', '2024-07-03 15:45:53', NULL, NULL),
(63, 10, 480000, 470000, '-10000', 'Mua phim: CĂN HỘ 404', '2024-07-03 16:18:26', NULL, NULL),
(64, 10, 470000, 465000, '-5000', 'Tiền phạt người dùng spam quá 3 lần', '2024-07-03 16:25:32', NULL, NULL),
(65, 10, 465000, 460000, '-5000', 'Tiền phạt người dùng spam quá 3 lần', '2024-07-03 16:30:38', NULL, NULL),
(66, 21, 0, 12000000, '+12000000', 'Nạp tiền mã giao dịch: 1720115250', '2024-07-04 17:48:11', NULL, NULL),
(67, 21, 12000000, 0, '-12000000', 'Mua phim: ULTRAMAN: TRỖI DẬY', '2024-07-04 17:50:16', NULL, NULL),
(68, 21, 0, 9000000, '+9000000', 'Nạp tiền mã giao dịch: 1720116440', '2024-07-04 18:08:12', NULL, NULL),
(69, 21, 9000000, 8950000, '-50000', 'Mua phim: HỘI CHỨNG TUỔI THANH XUÂN: CÔ BÉ ĐEO CẶP SÁCH', '2024-07-04 18:08:42', NULL, NULL),
(70, 10, 460000, 455000, '-5000', 'Tiền phạt người dùng spam quá 3 lần', '2024-07-05 08:25:03', NULL, NULL),
(71, 10, 455000, 205000, '-250000', 'Mua phim: STAR WARS: THE ACOLYTE (PHẦN 1)', '2024-07-05 09:05:43', NULL, NULL),
(72, 10, 205000, 185000, '-20000', 'Mua phim: HẠN CHÓT ĐỂ YÊU', '2024-07-05 09:17:04', NULL, NULL),
(73, 10, 185000, 85000, '-100000', 'Mua phim: SHOW CỦA ĐEN', '2024-07-05 09:22:33', NULL, NULL),
(74, 10, 85000, 80000, '-5000', 'Tiền phạt người dùng spam quá 3 lần', '2024-07-05 10:21:48', NULL, NULL),
(75, 10, 80000, 75000, '-5000', 'Tiền phạt người dùng spam quá 3 lần', '2024-07-05 10:51:49', NULL, NULL),
(76, 21, 8950000, 8945000, '-5000', 'Tiền phạt người dùng spam quá 3 lần', '2024-07-05 11:02:53', NULL, NULL),
(77, 10, 75000, 70000, '-5000', 'Tiền phạt người dùng spam quá 3 lần', '2024-07-05 16:30:31', NULL, NULL),
(78, 22, 0, 200000, '+200000', 'Nạp tiền mã giao dịch: 1720333123', '2024-07-07 06:19:12', NULL, NULL),
(79, 22, 200000, 100000, '-100000', 'Mua phim: SHOW CỦA ĐEN', '2024-07-07 06:20:06', NULL, NULL),
(80, 22, 100000, 80000, '-20000', 'Mua phim: HẠN CHÓT ĐỂ YÊU', '2024-07-07 06:21:33', NULL, NULL),
(81, 22, 80000, 68000, '-12000', 'Mua phim: BỐ GIÀ (2021)', '2024-07-07 06:52:40', NULL, NULL),
(82, 22, 68000, 67000, '-1000', 'Mua phim: GEATS EXTRA: KAMEN RIDER GAZER', '2024-07-07 06:54:32', NULL, NULL),
(83, 22, 67000, 17000, '-50000', 'Mua phim: HỘI CHỨNG TUỔI THANH XUÂN: CÔ BÉ ĐEO CẶP SÁCH', '2024-07-07 06:57:32', NULL, NULL),
(84, 22, 17000, 16000, '-1000', 'Mua phim: 7 NĂM CHƯA CƯỚI SẼ CHIA TAY\r\n', '2024-07-07 07:04:42', NULL, NULL),
(85, 22, 16000, 6000, '-10000', 'Mua phim: CĂN HỘ 404', '2024-07-07 07:07:36', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','member') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `is_vip` tinyint(1) NOT NULL DEFAULT '0',
  `is_spam` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `is_vip`, `is_spam`, `is_active`, `created_at`, `updated_at`) VALUES
(9, 'Trung Kiên', 'kienltph35295@fpt.edu.vn', NULL, '$2y$12$Eo9tgG/oydB6pgsqomXdV.7Ix1EbfBjARok3O7W42id8TVWt2fYZO', 'aU6L1hyQAgtrAgLdvlQPxKmeFXJLbjFFWCj4yKYekcAfZYiTfDOivv1lg2Ee', 'member', 0, 1, 0, '2024-06-26 12:14:29', '2024-07-03 12:45:27'),
(10, 'Meme', 'lkien0408@gmail.com', NULL, '$2y$12$cMxWBfb.ubEfEFKBoW/KH.qYQU5aerGRdWXt5gSN3d1dHeKkIrF7C', 'QR2Y2ZnIi5VozQkFKOSTd5j1IoFSKkuQwEITeyyE4gIO4am5GY07qaZyKzvQ', 'member', 1, 0, 0, '2024-06-26 14:36:20', '2024-07-05 08:11:27'),
(11, 'Hảo Hạng', 'lkien610@gmail.com', NULL, '$2y$12$fPgJQFtY.Egz8cQtwRryAOKNJN1S4R5nXSb/d2Jh25G2O2L8TbzCS', NULL, 'member', 0, 0, 0, '2024-06-26 16:36:25', '2024-07-02 05:52:39'),
(12, 'Ảo game', 'lkien1234@gmail.com', NULL, '$2y$12$YEyKsh4IzVh7SG12qgTfDejQ6ujkKt/0Wl64QJgXXxQ40a599BdFC', NULL, 'member', 0, 0, 0, '2024-06-29 04:03:56', '2024-07-02 05:48:12'),
(13, 'Admin hảo hảo', 'lkien99@gmail.com', NULL, '$2y$12$kP4x6Kk8vSSmq5BEea9SdO9BhgkAhy0R1GyKj8E/gNpqnc0aZa2te', 'r8idRDYZZkq7Ssu5smgAVxAU6vxDepsaTFYfN2gNkIuv47WBCcnLsFlo8MaP', 'admin', 0, 0, 0, '2024-06-29 13:49:56', '2024-07-02 13:59:23'),
(14, 'Kokomi', 'ewl077373@gmail.com', NULL, '$2y$12$DVzYnOtqk3suzfawIKsf7.yzgWc4risxUzTuVsaaJoMjSklg4M.HO', NULL, 'member', 0, 0, 0, '2024-07-01 07:11:31', '2024-07-01 07:11:31'),
(15, 'Hoàng Nam', 'sos@gmail.com', NULL, '$2y$12$07wOZ6fgRjg3Etr0mlXHE.bvVdU0MzfG/JxtVgXHg27TlOOWZoK3m', NULL, 'member', 0, 0, 1, '2024-07-01 08:18:34', '2024-07-02 08:45:17'),
(16, 'Admin Kiên', 'admin@gmail.com', NULL, '$2y$12$nvNFm8CeGvqvN/Hf9QFG3uybbJu3qdZqeKTJ3bcpdiadCjFJPqxYC', NULL, 'admin', 0, 0, 0, '2024-07-02 13:27:36', '2024-07-02 13:59:43'),
(17, 'Trung Bình cộng', 'hehe@gmail.com', NULL, '$2y$12$uXDHlbZ8ft8d7A3GC.JU9OIqE.FggAN6J8fEl8JDY8NS1FB1n.WIy', NULL, 'member', 0, 1, 0, '2024-07-03 11:25:00', '2024-07-03 11:27:30'),
(18, 'Sasuke', 'sasuke@gmail.com', NULL, '$2y$12$9t5Uj3OjC1kDWiGnEkhuKOSb73PfSrJGt1xYSs1.oOyB555c6BhPy', NULL, 'member', 0, 0, 0, '2024-07-03 17:24:44', '2024-07-03 17:24:44'),
(19, 'Mini', 'mini@gmail.com', NULL, '$2y$12$U2ywRRxePVvYIKjaoB4QZu9YEF/l9DIYd43hgxX27QRjrikWpBrgO', NULL, 'member', 0, 0, 0, '2024-07-03 17:27:27', '2024-07-03 17:27:27'),
(20, 'TekeTeke', 'teke@gmail.com', NULL, '$2y$12$Pupbd1oSEfvAd20a.LLjTegI77e810YSvq0sJaOmPxPl7vnFIBKiu', NULL, 'member', 0, 0, 0, '2024-07-04 09:14:06', '2024-07-04 09:14:06'),
(21, 'Khá quá nhe', 'lkien12374@gmail.com', NULL, '$2y$12$o0eBniaSfJ9tOTPP5GoV5uGTEEVu..pbbNnX6BY8dncgq8R8kKSqq', NULL, 'member', 1, 0, 0, '2024-07-04 17:47:09', '2024-07-04 18:08:12'),
(22, 'Kiên idol', 'kien@fpt.edu.vn', NULL, '$2y$12$o/eigV2nuxAJcb7yR2vOB.llC1yOPIA3zNcjtMpK7jilSJMSZaP2a', NULL, 'member', 0, 0, 0, '2024-07-07 06:17:16', '2024-07-07 06:17:16'),
(23, 'Kiên Trung', 'kien@gmail.com', NULL, '$2y$12$f5PoPQ/Bpv72LDWl48xJPujDaYREpnxiDxj54aQ7QYIyXktcO/XE.', NULL, 'member', 0, 0, 0, '2024-07-09 08:35:30', '2024-07-09 08:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_coins`
--

CREATE TABLE `user_coins` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `coin` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_coins`
--

INSERT INTO `user_coins` (`id`, `user_id`, `coin`, `created_at`, `updated_at`) VALUES
(2, 9, 0, '2024-06-26 12:14:29', '2024-06-26 12:14:29'),
(3, 10, 70000, '2024-06-26 14:36:20', '2024-06-26 14:36:20'),
(4, 11, 0, '2024-06-26 16:36:25', '2024-06-26 16:36:25'),
(5, 12, 0, '2024-06-29 04:03:56', '2024-06-29 04:03:56'),
(6, 13, 0, '2024-06-29 13:49:56', '2024-06-29 13:49:56'),
(7, 14, 0, '2024-07-01 07:11:31', '2024-07-01 07:11:31'),
(8, 15, 0, '2024-07-01 08:18:34', '2024-07-01 08:18:34'),
(9, 17, 0, '2024-07-03 11:25:00', '2024-07-03 11:25:00'),
(10, 18, 0, '2024-07-03 17:24:44', '2024-07-03 17:24:44'),
(11, 19, 0, '2024-07-03 17:27:27', '2024-07-03 17:27:27'),
(12, 20, 0, '2024-07-04 09:14:06', '2024-07-04 09:14:06'),
(13, 21, 8945000, '2024-07-04 17:47:09', '2024-07-04 17:47:09'),
(14, 22, 6000, '2024-07-07 06:17:17', '2024-07-07 06:17:17'),
(15, 23, 0, '2024-07-09 08:35:30', '2024-07-09 08:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_movie`
--

CREATE TABLE `user_movie` (
  `user_id` bigint UNSIGNED NOT NULL,
  `movie_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_movie`
--

INSERT INTO `user_movie` (`user_id`, `movie_id`, `created_at`, `updated_at`) VALUES
(10, 6, NULL, NULL),
(10, 8, NULL, NULL),
(10, 14, NULL, NULL),
(10, 15, NULL, NULL),
(10, 16, NULL, NULL),
(10, 19, NULL, NULL),
(10, 20, NULL, NULL),
(10, 21, NULL, NULL),
(10, 22, NULL, NULL),
(10, 24, NULL, NULL),
(10, 32, NULL, NULL),
(10, 33, NULL, NULL),
(10, 34, NULL, NULL),
(21, 21, NULL, NULL),
(21, 27, NULL, NULL),
(22, 6, NULL, NULL),
(22, 14, NULL, NULL),
(22, 21, NULL, NULL),
(22, 22, NULL, NULL),
(22, 24, NULL, NULL),
(22, 33, NULL, NULL),
(22, 34, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_movie_likes`
--

CREATE TABLE `user_movie_likes` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `movie_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_movie_likes`
--

INSERT INTO `user_movie_likes` (`id`, `user_id`, `movie_id`, `created_at`, `updated_at`) VALUES
(12, 13, 19, '2024-06-29 14:19:19', '2024-06-29 14:19:19'),
(13, 13, 15, '2024-06-29 14:19:34', '2024-06-29 14:19:34'),
(14, 13, 4, '2024-06-29 14:20:43', '2024-06-29 14:20:43'),
(16, 9, 14, '2024-06-29 14:27:08', '2024-06-29 14:27:08'),
(21, 9, 3, '2024-06-29 15:55:35', '2024-06-29 15:55:35'),
(25, 10, 17, '2024-06-29 16:39:56', '2024-06-29 16:39:56'),
(35, 9, 10, '2024-06-29 17:42:23', '2024-06-29 17:42:23'),
(61, 9, 7, '2024-06-30 05:31:19', '2024-06-30 05:31:19'),
(73, 9, 15, '2024-06-30 08:19:35', '2024-06-30 08:19:35'),
(90, 9, 5, '2024-06-30 08:36:02', '2024-06-30 08:36:02'),
(92, 9, 18, '2024-06-30 09:35:01', '2024-06-30 09:35:01'),
(93, 9, 12, '2024-06-30 09:35:57', '2024-06-30 09:35:57'),
(142, 9, 13, '2024-06-30 14:43:42', '2024-06-30 14:43:42'),
(176, 9, 19, '2024-06-30 15:02:04', '2024-06-30 15:02:04'),
(177, 9, 11, '2024-06-30 15:03:32', '2024-06-30 15:03:32'),
(183, 9, 20, '2024-06-30 16:39:30', '2024-06-30 16:39:30'),
(187, 9, 22, '2024-07-01 04:26:36', '2024-07-01 04:26:36'),
(206, 14, 22, '2024-07-01 07:24:06', '2024-07-01 07:24:06'),
(211, 14, 15, '2024-07-01 07:29:54', '2024-07-01 07:29:54'),
(257, 14, 8, '2024-07-01 07:45:25', '2024-07-01 07:45:25'),
(261, 15, 22, '2024-07-01 08:20:23', '2024-07-01 08:20:23'),
(268, 10, 10, '2024-07-01 15:08:56', '2024-07-01 15:08:56'),
(272, 10, 3, '2024-07-01 15:58:51', '2024-07-01 15:58:51'),
(283, 10, 9, '2024-07-01 18:35:18', '2024-07-01 18:35:18'),
(285, 10, 12, '2024-07-02 04:27:58', '2024-07-02 04:27:58'),
(290, 10, 13, '2024-07-02 04:31:24', '2024-07-02 04:31:24'),
(293, 11, 24, '2024-07-02 05:49:46', '2024-07-02 05:49:46'),
(295, 9, 4, '2024-07-02 06:50:55', '2024-07-02 06:50:55'),
(299, 9, 24, '2024-07-02 07:25:50', '2024-07-02 07:25:50'),
(304, 9, 21, '2024-07-02 07:28:47', '2024-07-02 07:28:47'),
(305, 9, 17, '2024-07-02 08:47:23', '2024-07-02 08:47:23'),
(324, 10, 4, '2024-07-03 09:46:44', '2024-07-03 09:46:44'),
(325, 10, 5, '2024-07-03 09:56:03', '2024-07-03 09:56:03'),
(327, 9, 23, '2024-07-03 10:15:48', '2024-07-03 10:15:48'),
(331, 17, 25, '2024-07-03 11:25:15', '2024-07-03 11:25:15'),
(332, 10, 19, '2024-07-03 12:38:18', '2024-07-03 12:38:18'),
(334, 10, 23, '2024-07-03 12:52:36', '2024-07-03 12:52:36'),
(335, 10, 16, '2024-07-03 14:23:08', '2024-07-03 14:23:08'),
(336, 10, 25, '2024-07-03 14:26:23', '2024-07-03 14:26:23'),
(337, 10, 22, '2024-07-03 14:34:45', '2024-07-03 14:34:45'),
(341, 10, 15, '2024-07-03 14:52:57', '2024-07-03 14:52:57'),
(347, 10, 18, '2024-07-03 15:03:17', '2024-07-03 15:03:17'),
(353, 10, 6, '2024-07-03 15:16:57', '2024-07-03 15:16:57'),
(356, 10, 1, '2024-07-03 15:34:53', '2024-07-03 15:34:53'),
(361, 18, 15, '2024-07-03 17:26:02', '2024-07-03 17:26:02'),
(369, 19, 24, '2024-07-03 17:28:35', '2024-07-03 17:28:35'),
(370, 18, 24, '2024-07-03 17:28:36', '2024-07-03 17:28:36'),
(373, 10, 20, '2024-07-03 17:34:20', '2024-07-03 17:34:20'),
(374, 10, 8, '2024-07-03 17:34:30', '2024-07-03 17:34:30'),
(378, 10, 26, '2024-07-04 06:20:23', '2024-07-04 06:20:23'),
(379, 10, 24, '2024-07-04 07:53:21', '2024-07-04 07:53:21'),
(380, 20, 25, '2024-07-04 09:14:23', '2024-07-04 09:14:23'),
(381, 10, 27, '2024-07-04 12:42:28', '2024-07-04 12:42:28'),
(384, 10, 21, '2024-07-04 13:40:41', '2024-07-04 13:40:41'),
(387, 10, 29, '2024-07-04 15:43:17', '2024-07-04 15:43:17'),
(388, 21, 27, '2024-07-04 17:50:34', '2024-07-04 17:50:34'),
(391, 10, 31, '2024-07-05 06:12:18', '2024-07-05 06:12:18'),
(392, 10, 28, '2024-07-05 08:27:54', '2024-07-05 08:27:54'),
(393, 10, 32, '2024-07-05 09:05:40', '2024-07-05 09:05:40'),
(394, 10, 34, '2024-07-05 09:22:46', '2024-07-05 09:22:46'),
(396, 10, 30, '2024-07-05 12:25:02', '2024-07-05 12:25:02'),
(397, 10, 37, '2024-07-05 15:05:26', '2024-07-05 15:05:26'),
(398, 10, 38, '2024-07-05 15:22:14', '2024-07-05 15:22:14'),
(403, 10, 39, '2024-07-06 13:42:28', '2024-07-06 13:42:28'),
(404, 22, 36, '2024-07-07 06:17:39', '2024-07-07 06:17:39'),
(405, 22, 34, '2024-07-07 06:21:22', '2024-07-07 06:21:22'),
(406, 22, 14, '2024-07-07 06:53:00', '2024-07-07 06:53:00'),
(407, 22, 23, '2024-07-07 06:56:22', '2024-07-07 06:56:22'),
(410, 22, 21, '2024-07-07 06:58:08', '2024-07-07 06:58:08'),
(411, 22, 38, '2024-07-07 06:59:57', '2024-07-07 06:59:57'),
(412, 22, 33, '2024-07-07 07:03:35', '2024-07-07 07:03:35'),
(413, 22, 15, '2024-07-07 07:04:18', '2024-07-07 07:04:18'),
(420, 22, 6, '2024-07-07 07:05:13', '2024-07-07 07:05:13'),
(421, 22, 22, '2024-07-07 07:07:52', '2024-07-07 07:07:52'),
(427, 23, 27, '2024-07-09 08:55:26', '2024-07-09 08:55:26'),
(428, 23, 31, '2024-07-09 08:56:02', '2024-07-09 08:56:02'),
(429, 23, 29, '2024-07-09 09:02:55', '2024-07-09 09:02:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_user_id_foreign` (`user_id`),
  ADD KEY `bills_movie_id_foreign` (`movie_id`);

--
-- Indexes for table `catelogues`
--
ALTER TABLE `catelogues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catelogue_posts`
--
ALTER TABLE `catelogue_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_movie_id_foreign` (`movie_id`);

--
-- Indexes for table `comment_likes`
--
ALTER TABLE `comment_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_likes_comment_id_foreign` (`comment_id`),
  ADD KEY `comment_likes_user_id_foreign` (`user_id`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `episodes_movie_id_foreign` (`movie_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `funds`
--
ALTER TABLE `funds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fund_transactions`
--
ALTER TABLE `fund_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fund_transactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `list_id` (`list_id`);

--
-- Indexes for table `movie_catelogue`
--
ALTER TABLE `movie_catelogue`
  ADD PRIMARY KEY (`movie_id`,`catelogue_id`),
  ADD KEY `movie_catelogue_catelogue_id_foreign` (`catelogue_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_movie_id_foreign` (`movie_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_recharges`
--
ALTER TABLE `payment_recharges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_recharges_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `catelogue_post_id` (`catelogue_post_id`);

--
-- Indexes for table `post_tagpost`
--
ALTER TABLE `post_tagpost`
  ADD PRIMARY KEY (`post_id`,`tag_post_id`),
  ADD KEY `post_tagpost_tag_post_id_foreign` (`tag_post_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_posts`
--
ALTER TABLE `tag_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_histories`
--
ALTER TABLE `transaction_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_history_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_coins`
--
ALTER TABLE `user_coins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_coin_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_movie`
--
ALTER TABLE `user_movie`
  ADD PRIMARY KEY (`user_id`,`movie_id`),
  ADD KEY `user_movie_movie_id_foreign` (`movie_id`);

--
-- Indexes for table `user_movie_likes`
--
ALTER TABLE `user_movie_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_movie_likes_user_id_foreign` (`user_id`),
  ADD KEY `user_movie_likes_movie_id_foreign` (`movie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `catelogues`
--
ALTER TABLE `catelogues`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `catelogue_posts`
--
ALTER TABLE `catelogue_posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `comment_likes`
--
ALTER TABLE `comment_likes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funds`
--
ALTER TABLE `funds`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fund_transactions`
--
ALTER TABLE `fund_transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `payment_recharges`
--
ALTER TABLE `payment_recharges`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tag_posts`
--
ALTER TABLE `tag_posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction_histories`
--
ALTER TABLE `transaction_histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_coins`
--
ALTER TABLE `user_coins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_movie_likes`
--
ALTER TABLE `user_movie_likes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=430;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD CONSTRAINT `admin_notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `bills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`);

--
-- Constraints for table `comment_likes`
--
ALTER TABLE `comment_likes`
  ADD CONSTRAINT `comment_likes_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`),
  ADD CONSTRAINT `comment_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `episodes_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`);

--
-- Constraints for table `fund_transactions`
--
ALTER TABLE `fund_transactions`
  ADD CONSTRAINT `fund_transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`list_id`) REFERENCES `lists` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `movie_catelogue`
--
ALTER TABLE `movie_catelogue`
  ADD CONSTRAINT `movie_catelogue_catelogue_id_foreign` FOREIGN KEY (`catelogue_id`) REFERENCES `catelogues` (`id`),
  ADD CONSTRAINT `movie_catelogue_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `notifications_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`);

--
-- Constraints for table `payment_recharges`
--
ALTER TABLE `payment_recharges`
  ADD CONSTRAINT `payment_recharges_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`catelogue_post_id`) REFERENCES `catelogue_posts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `post_tagpost`
--
ALTER TABLE `post_tagpost`
  ADD CONSTRAINT `post_tagpost_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `post_tagpost_tag_post_id_foreign` FOREIGN KEY (`tag_post_id`) REFERENCES `tag_posts` (`id`);

--
-- Constraints for table `transaction_histories`
--
ALTER TABLE `transaction_histories`
  ADD CONSTRAINT `transaction_history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_coins`
--
ALTER TABLE `user_coins`
  ADD CONSTRAINT `user_coin_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_movie`
--
ALTER TABLE `user_movie`
  ADD CONSTRAINT `user_movie_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `user_movie_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_movie_likes`
--
ALTER TABLE `user_movie_likes`
  ADD CONSTRAINT `user_movie_likes_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `user_movie_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
