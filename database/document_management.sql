-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jan 08, 2022 at 06:07 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `document_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('duonkhangaa@gmail.com', 'Wd8lvF1V0Dg8V5QAZFYP2qeNuQLXIVBAS6SYWfejXLv5iLL1ravytQaBH0aAZkmy', '2022-01-07 16:59:33'),
('duonkhangaa@gmail.com', 'HkAx4kLrEQbkRPbU89C4QG9dxUjBFNBOHQBgRGoOVezjsyM98iacYHft2dIdX5kc', '2022-01-07 17:00:17'),
('duonkhangaa@gmail.com', '7UMKvkzUcw08SXfzVWzDhEa2r7V3UTdJYu2N3nBQkPityL7EBZ9hPAf9OkjQ7GlD', '2022-01-07 17:04:10');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bophan`
--

DROP TABLE IF EXISTS `tbl_bophan`;
CREATE TABLE IF NOT EXISTS `tbl_bophan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bo_phan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ki_hieu` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `truong_bo_phan` int(11) DEFAULT NULL,
  `trang_thai` tinyint(1) DEFAULT '1',
  `ghi_chu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_truong_bo_phan` (`truong_bo_phan`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_bophan`
--

INSERT INTO `tbl_bophan` (`id`, `bo_phan`, `ki_hieu`, `truong_bo_phan`, `trang_thai`, `ghi_chu`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ban giám đốc', 'BGD', 1, 1, NULL, '2021-12-17 16:46:56', '2022-01-03 20:34:38', NULL),
(2, 'Phòng Chuyên đề', 'PCD', 3, 1, NULL, '2021-12-17 16:51:27', '2022-01-07 15:36:18', NULL),
(3, 'Phòng Chương trình', 'PCT', 2, 1, NULL, '2021-12-17 16:51:27', '2022-01-03 20:34:47', NULL),
(4, 'Phòng DV Quảng cáo', 'PDVQC', NULL, 1, NULL, '2021-12-17 16:51:27', NULL, NULL),
(5, 'Phòng Tổ chức và Hành chính', 'PTCHC', NULL, 1, NULL, '2021-12-17 16:51:27', NULL, NULL),
(6, 'Phòng Thời sự', 'PTS', NULL, 1, NULL, '2021-12-17 16:51:27', NULL, NULL),
(7, 'Phòng Văn nghệ', 'PVN', NULL, 1, NULL, '2021-12-17 16:51:27', NULL, NULL),
(8, 'Phòng Kỹ thuật và Công Nghệ', 'PKT', NULL, 1, NULL, '2021-12-17 16:51:27', NULL, NULL),
(9, 'Test bộ phận', 'Test', 3, 0, 'test bộ phận', '2022-01-03 20:45:53', '2022-01-03 20:46:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coquan`
--

DROP TABLE IF EXISTS `tbl_coquan`;
CREATE TABLE IF NOT EXISTS `tbl_coquan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_co_quan` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1',
  `ghi_chu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_coquan`
--

INSERT INTO `tbl_coquan` (`id`, `ten_co_quan`, `dia_chi`, `trang_thai`, `ghi_chu`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ban an toàn giao thông', 'Phường 3, Tp. Bạc Liêu, Bạc Liêu', 1, 'BLU_BATGT', '2021-12-03 18:52:00', '2022-01-02 21:04:07', NULL),
(2, 'Ban bồi thường Giải phóng mặt bằng', 'Bạc Liêu', 1, 'BLU_BBTGPMB', '2021-12-03 18:52:00', '2021-12-31 13:58:05', NULL),
(3, 'Ban Dân tộc và Tôn giáo tỉnh', 'Số 102 Bà Triệu, Phường 3, TP Bạc Liêu, Bạc Liêu', 1, 'BLU_BDTTGT', '2021-12-03 18:52:00', NULL, NULL),
(4, 'Ban QLDA công trình giao thông tỉnh', 'Bạc Liêu', 1, 'BLU_CTGT', '2021-12-03 18:52:00', NULL, NULL),
(5, 'Ban QLDA ĐTXD công trình dân dụng và công nghiệp', 'Phường 3, Tp. Bạc Liêu, Bạc Liêu', 1, 'BLU_CTDDCNT', '2021-12-03 18:52:00', NULL, NULL),
(6, 'Ban QLDA nông nghiệp và phát triển nông thôn', '56, Nguyễn Huệ, Phường 3, Thành Phố Bạc Liêu, Tỉnh Bạc Liêu', 1, 'BLU_CTNNPTNT', '2021-12-03 18:52:00', NULL, NULL),
(7, 'Ban Quản lý các Khu công nghiệp tỉnh', '48 Bà Triệu, Phường 3, TP Bạc Liêu, Bạc Liêu', 1, 'BLU_KCNT', '2021-12-03 18:52:00', NULL, NULL),
(8, 'Bảo hiểm Xã hội tỉnh', 'Đường Trần Huỳnh, Phường 1, TP Bạc Liêu, Bạc Liêu', 1, 'BLU_BHXH', '2021-12-03 18:52:00', '2021-12-31 14:09:32', NULL),
(9, 'Bộ chỉ huy biên phòng tỉnh', 'số 506 Cao Văn Lầu, Phường 2, TP Bạc Liêu, Bạc Liêu', 1, 'BLU_BCHBPT', '2021-12-03 18:52:00', NULL, NULL),
(10, 'BQL Khu nông nghiệp ứng dụng CNC phát triển tôm', 'Bạc Liêu', 1, 'BLU_KNNUDCNCPTTT', '2021-12-03 18:52:00', NULL, NULL),
(11, 'Công an tỉnh', '78 Lê Duẩn, Phường 1, TP Bạc Liêu, Bạc Liêu', 1, 'BLU_CAT', '2021-12-03 18:52:00', NULL, NULL),
(12, 'Cục Thống kê tỉnh', '35b Bà Triệu, Phường 3, Tp. Bạc Liêu, Bạc Liêu', 1, 'BLU_CTK', '2021-12-03 18:52:00', NULL, NULL),
(13, 'Đài Phát thanh - Truyền hình tỉnh', '410 23 Tháng 8, Phường 8, Tp. Bạc Liêu, Bạc Liêu', 1, 'BLU_DPTTHT', '2021-12-03 18:52:00', NULL, NULL),
(14, 'Hội chữ thập đỏ', '104, Đường Hai Bà Trưng, Phường 3, Tp. Bạc Liêu, Bạc Liêu', 1, 'BLU_HCTD', '2021-12-03 18:52:00', NULL, NULL),
(15, 'Hội Liên hiệp Phụ nữ tỉnh', '4 Cơ Quan Đoàn Thể, Khu Hành Chánh Tỉnh, Đường Nguyễn Tất Thành, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 1, 'BLU_HLHPNT', '2021-12-03 18:52:00', NULL, NULL),
(16, 'Hội Nông dân tỉnh', '56 Bà Triệu, Phường 3, Tp. Bạc Liêu, Bạc Liêu', 1, 'BLU_HNDT', '2021-12-03 18:52:00', NULL, NULL),
(17, 'Sở Công Thương', '7 D. Nguyễn Tất Thành, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 1, 'BLU_SCT', '2021-12-03 18:52:00', NULL, NULL),
(18, 'Sở Giáo dục, Khoa học và Công nghệ', '6 D. Nguyễn Tất Thành, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 1, 'BLU_SGDKHCN', '2021-12-03 18:52:00', NULL, NULL),
(19, 'Sở Giao thông vận tải', ' 6 D. Nguyễn Tất Thành, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 1, 'BLU_SGTVT', '2021-12-03 18:52:00', NULL, NULL),
(20, 'Sở Kế hoạch và Đầu Tư', 'Trung Tâm Hành Chính, Võ Thị Chính, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 1, 'BLU_SKHDT', '2021-12-03 18:52:00', NULL, NULL),
(21, 'Sở Lao động - Thương binh và Xã hội', '52/3 đường Hùng Vương, Phường 7, Tp. Bạc Liêu, Bạc Liêu', 1, 'BLU_SLDTBXH', '2021-12-03 18:52:00', NULL, NULL),
(22, 'Sở Nội vụ', 'Phường 1, Tp. Bạc Liêu, Bạc Liêu', 1, 'BLU_SNV', '2021-12-03 18:52:00', NULL, NULL),
(23, 'Sở Nông nghiệp và Phát triển nông thôn', '8 D. Nguyễn Tất Thành, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 1, 'BLU_SNNPTNT', '2021-12-03 18:52:00', NULL, NULL),
(24, 'Sở Tài chính', 'Nguyễn Bỉnh Khiêm, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 1, 'BLU_STC', '2021-12-03 18:52:00', NULL, NULL),
(25, 'Sở Tài nguyên và Môi trường', '78 Lê Duẩn, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 1, 'BLU_STNMT', '2021-12-03 18:52:01', NULL, NULL),
(26, 'Sở Tư pháp', 'Nguyễn Tất Thành, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 1, 'BLU_STP', '2021-12-03 18:53:55', NULL, NULL),
(27, 'Sở Văn hóa, Thông tin, thể thao và Du lịch', '16 D. Nguyễn Tất Thành, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 1, 'BLU_SVHTTTTDL', '2021-12-03 18:53:55', NULL, NULL),
(28, 'Sở Xây dựng', 'Nguyễn Tất Thành, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 1, 'BLU_SXD', '2021-12-03 18:53:55', NULL, NULL),
(29, 'Sở Y tế', 'Số 07 D. Nguyễn Tất Thành, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 1, 'BLU_SYT', '2021-12-03 18:53:55', NULL, NULL),
(30, 'Thanh tra tỉnh', 'Trần Văn Sớm, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 1, 'BLU_TTT', '2021-12-03 18:53:55', NULL, NULL),
(31, 'Trung tâm Dịch vụ Đô thị tỉnh Bạc Liêu', '80 Hai Bà Trưng, Phường 3, Tp. Bạc Liêu, Bạc Liêu', 1, 'BLU_TTDVDTT', '2021-12-03 18:53:55', NULL, NULL),
(32, 'Trung tâm Phát triển Quỹ Nhà và Đất', 'Số 02 Hòa Bình, Phường 7, Tp. Bạc Liêu, Bạc Liêu', 1, 'BLU_TTPTQND', '2021-12-03 18:53:55', NULL, NULL),
(33, 'Trung tâm Xúc tiến Đầu tư Thương mại & Du lịch', '56 Nguyễn Huệ, Phường 3, Tp. Bạc Liêu, Bạc Liêu', 1, 'BLU_TTXTDT', '2021-12-03 18:53:55', NULL, NULL),
(34, 'Trường Cao đẳng Kinh tế - Kỹ thuật Bạc Liêu', '10 Tôn Đức Thắng, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 1, 'BLU_TCDKTKTBL', '2021-12-03 18:53:55', NULL, NULL),
(35, 'Trường Cao đẳng Nghề Bạc Liêu', '68 Tôn Đức Thắng, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 1, 'BLU_TCDNBL', '2021-12-03 18:53:55', NULL, NULL),
(36, 'Trường Cao đẳng Y tế Bạc Liêu', '1 Đoàn Thị Điểm, Phường 3, Tp. Bạc Liêu, Bạc Liêu', 1, 'BLU_TCDYTBL', '2021-12-03 18:53:55', NULL, NULL),
(37, 'Trường Đại học Bạc Liêu', '108 Võ Thị Sáu, Phường 8, Tp. Bạc Liêu, Bạc Liêu', 1, 'BLU_TDHBL', '2021-12-03 18:53:55', NULL, NULL),
(38, 'UBND huyện Đông Hải', 'Gành Hào, Đông Hải, Bạc Liêu', 1, 'BLU_UBNDHDH', '2021-12-03 18:53:55', NULL, NULL),
(39, 'UBND huyện Hòa Bình', '354 QL1A, Hoà Bình, Bạc Liêu', 1, 'BLU_UBNDHHB', '2021-12-03 18:53:55', NULL, NULL),
(40, 'UBND huyện Hồng Dân', 'Ấp Nội Ô, Hồng Dân, Bạc Liêu', 1, 'BLU_UBNDHHD', '2021-12-03 18:53:55', NULL, NULL),
(41, 'UBND thị xã Giá Rai', 'QL1A, TT. Giá Rai, Giá Rai, Bạc Liêu', 1, 'BLU_UBNDTXGR', '2021-12-03 18:53:55', NULL, NULL),
(42, 'UBND huyện Phước Long', 'TT Phước Long, Phước Long, Bạc Liêu', 1, 'BLU_UBNDHPL', '2021-12-03 18:53:55', NULL, NULL),
(43, 'UBND huyện Vĩnh Lợi', 'TT Châu Hưng, Vĩnh Lợi, Bạc Liêu', 1, 'BLU_UBNDHVL', '2021-12-03 18:53:55', NULL, NULL),
(44, 'UBND thành phố Bạc Liêu', '20 Trần Phú, Phường 3, TP Bạc Liêu, Bạc Liêu', 1, 'BLU_UBNDTPBL', '2021-12-03 18:53:55', NULL, NULL),
(45, 'UBND Tỉnh Bạc Liêu', '5 D. Nguyễn Tất Thành, Phường 1, TP Bạc Liêu, Bạc Liêu', 1, 'BLU_TINHBACLIEU', '2021-12-03 18:53:55', NULL, NULL),
(46, 'Văn phòng Đoàn ĐBQH và HĐND tỉnh', 'Số 10 D. Nguyễn Tất Thành, Phường 1, TP Bạc Liêu, Bạc Liêu', 1, 'BLU_VPHDND', '2021-12-03 18:56:28', NULL, NULL),
(47, 'Văn phòng Tỉnh ủy', 'Đường Nguyễn Tất Thành, Phường 1, TP Bạc Liêu, Bạc Liêu', 1, 'BLU_VPTU', '2021-12-03 18:58:05', NULL, NULL),
(48, 'test', 'Phường Linh Đông, TP Thủ Đức, Tp Hồ Chí Minh', 1, 'test chức danh', '2021-12-31 14:15:32', '2022-01-02 21:04:46', '2022-01-02 21:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokhan`
--

DROP TABLE IF EXISTS `tbl_dokhan`;
CREATE TABLE IF NOT EXISTS `tbl_dokhan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `do_khan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1',
  `ghi_chu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_dokhan`
--

INSERT INTO `tbl_dokhan` (`id`, `do_khan`, `trang_thai`, `ghi_chu`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Thường', 1, 'Độ khẩn thường', '2021-12-04 14:47:26', NULL, NULL),
(2, 'Khẩn', 1, NULL, '2021-12-04 14:47:26', NULL, NULL),
(3, 'Thượng khẩn', 1, NULL, '2021-12-04 14:47:26', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_domat`
--

DROP TABLE IF EXISTS `tbl_domat`;
CREATE TABLE IF NOT EXISTS `tbl_domat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `do_mat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1',
  `ghi_chu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_domat`
--

INSERT INTO `tbl_domat` (`id`, `do_mat`, `trang_thai`, `ghi_chu`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Thường', 1, NULL, '2021-12-04 14:47:48', NULL, NULL),
(2, 'Mật', 1, NULL, '2021-12-04 14:47:48', NULL, NULL),
(3, 'Tuyệt mật', 1, NULL, '2021-12-04 14:48:05', NULL, NULL),
(4, 'Tối mật', 1, NULL, '2021-12-04 14:48:05', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hinhthuc`
--

DROP TABLE IF EXISTS `tbl_hinhthuc`;
CREATE TABLE IF NOT EXISTS `tbl_hinhthuc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hinh_thuc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1',
  `ghi_chu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_hinhthuc`
--

INSERT INTO `tbl_hinhthuc` (`id`, `hinh_thuc`, `trang_thai`, `ghi_chu`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Văn bản mới', 1, NULL, '2021-12-04 14:48:34', NULL, NULL),
(2, 'Thu hồi', 1, NULL, '2021-12-04 14:48:34', NULL, NULL),
(3, 'Thay thế', 1, NULL, '2021-12-04 14:49:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hinhthuc_chuyen`
--

DROP TABLE IF EXISTS `tbl_hinhthuc_chuyen`;
CREATE TABLE IF NOT EXISTS `tbl_hinhthuc_chuyen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hinh_thuc_chuyen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1',
  `ghi_chu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_hinhthuc_chuyen`
--

INSERT INTO `tbl_hinhthuc_chuyen` (`id`, `hinh_thuc_chuyen`, `trang_thai`, `ghi_chu`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Trao tay', 1, NULL, '2021-12-10 16:43:43', '2021-12-10 16:43:43', NULL),
(2, 'Bưu điện', 1, NULL, '2021-12-10 16:43:43', '2021-12-10 16:43:43', NULL),
(3, 'Email', 1, NULL, '2021-12-10 16:43:43', '2021-12-10 16:43:43', NULL),
(4, 'Liên thông', 1, NULL, '2021-12-10 16:43:43', '2021-12-10 16:43:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hinhthuc_luu`
--

DROP TABLE IF EXISTS `tbl_hinhthuc_luu`;
CREATE TABLE IF NOT EXISTS `tbl_hinhthuc_luu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hinh_thuc_luu` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1',
  `ghi_chu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_hinhthuc_luu`
--

INSERT INTO `tbl_hinhthuc_luu` (`id`, `hinh_thuc_luu`, `trang_thai`, `ghi_chu`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bản gốc văn bản', 1, NULL, '2021-12-10 16:44:56', NULL, NULL),
(2, 'Sao Y', 1, NULL, '2021-12-10 16:44:56', NULL, NULL),
(3, 'Sao lục', 1, NULL, '2021-12-10 16:45:30', NULL, NULL),
(4, 'Trích sao', 1, NULL, '2021-12-10 16:45:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_linhvuc`
--

DROP TABLE IF EXISTS `tbl_linhvuc`;
CREATE TABLE IF NOT EXISTS `tbl_linhvuc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `linh_vuc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1',
  `ghi_chu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_linhvuc`
--

INSERT INTO `tbl_linhvuc` (`id`, `linh_vuc`, `trang_thai`, `ghi_chu`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Văn phòng', 1, NULL, '2021-12-10 16:45:54', NULL, NULL),
(2, 'Kỹ thuật', 1, NULL, '2021-12-10 16:45:54', NULL, NULL),
(3, 'Nội dung', 1, NULL, '2021-12-10 16:46:12', NULL, NULL),
(4, 'Khác', 1, NULL, '2021-12-10 16:46:12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nguoidung_vaitro`
--

DROP TABLE IF EXISTS `tbl_nguoidung_vaitro`;
CREATE TABLE IF NOT EXISTS `tbl_nguoidung_vaitro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_nguoidung` int(11) NOT NULL,
  `id_vaitro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_vaitro` (`id_vaitro`),
  KEY `FK_nguoidung` (`id_nguoidung`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_nguoidung_vaitro`
--

INSERT INTO `tbl_nguoidung_vaitro` (`id`, `id_nguoidung`, `id_vaitro`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 1, 5, NULL, NULL, NULL),
(7, 5, 6, NULL, NULL, NULL),
(4, 3, 2, NULL, NULL, NULL),
(5, 2, 3, NULL, NULL, NULL),
(6, 4, 4, NULL, NULL, NULL),
(10, 6, 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quyentruycap`
--

DROP TABLE IF EXISTS `tbl_quyentruycap`;
CREATE TABLE IF NOT EXISTS `tbl_quyentruycap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quyen_truy_cap` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `keycode` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trang_thai` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_quyentruycap`
--

INSERT INTO `tbl_quyentruycap` (`id`, `quyen_truy_cap`, `parent_id`, `keycode`, `trang_thai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Thể loại', 0, 'the-loai', 1, '2022-01-04 18:15:40', '2022-01-06 17:10:36', NULL),
(2, 'Danh sách thể loại', 1, 'danh-sach-the-loai', 1, '2022-01-04 18:22:34', '2022-01-04 18:22:34', NULL),
(3, 'Thêm thể loại', 1, 'them-the-loai', 1, '2022-01-04 18:24:47', '2022-01-04 18:24:47', NULL),
(4, 'Sửa thể loại', 1, 'sua-the-loai', 1, '2022-01-04 18:25:03', '2022-01-04 18:25:03', NULL),
(5, 'Xóa thể loại', 1, 'xoa-the-loai', 1, '2022-01-04 18:25:16', '2022-01-04 18:25:16', NULL),
(6, 'Cơ quan', 0, 'co-quan', 1, '2022-01-04 18:26:11', '2022-01-04 18:26:11', NULL),
(7, 'Danh sách cơ quan', 6, 'danh-sach-co-quan', 1, '2022-01-04 18:26:26', '2022-01-04 18:26:26', NULL),
(8, 'Thêm cơ quan', 6, 'them-co-quan', 1, '2022-01-04 18:26:50', '2022-01-04 18:26:50', NULL),
(9, 'Sửa cơ quan', 6, 'sua-co-quan', 1, '2022-01-04 18:27:03', '2022-01-04 18:27:03', NULL),
(10, 'Xóa cơ quan', 6, 'xoa-co-quan', 1, '2022-01-04 18:27:15', '2022-01-04 18:27:15', NULL),
(11, 'Bộ phận', 0, 'bo-phan', 1, '2022-01-04 20:47:15', '2022-01-04 20:47:15', NULL),
(12, 'Danh sách bộ phận', 11, 'danh-sach-bo-phan', 1, '2022-01-04 20:47:28', '2022-01-04 20:47:28', NULL),
(13, 'Thêm bộ phận', 11, 'them-bo-phan', 1, '2022-01-04 20:47:39', '2022-01-04 20:47:39', NULL),
(14, 'Sửa bộ phận', 11, 'sua-bo-phan', 1, '2022-01-04 20:47:53', '2022-01-04 20:47:53', NULL),
(15, 'Xóa bộ phận', 11, 'xoa-bo-phan', 1, '2022-01-04 20:48:06', '2022-01-04 20:48:06', NULL),
(16, 'Độ khẩn', 0, 'do-khan', 1, '2022-01-04 20:48:23', '2022-01-04 20:48:23', NULL),
(17, 'Danh sách độ khẩn', 16, 'danh-sach-do-khan', 1, '2022-01-04 20:48:36', '2022-01-04 20:48:36', NULL),
(18, 'Thêm độ khẩn', 16, 'them-do-khan', 1, '2022-01-04 20:48:48', '2022-01-04 20:48:48', NULL),
(19, 'Sửa độ khẩn', 16, 'sua-do-khan', 1, '2022-01-04 20:49:02', '2022-01-04 20:49:02', NULL),
(20, 'Xóa độ khẩn', 16, 'xoa-do-khan', 1, '2022-01-04 20:49:15', '2022-01-04 20:49:15', NULL),
(21, 'Độ mật', 0, 'do-mat', 1, '2022-01-04 20:49:28', '2022-01-04 20:49:28', NULL),
(22, 'Danh sách độ mật', 21, 'danh-sach-do-mat', 1, '2022-01-04 20:49:42', '2022-01-04 20:49:42', NULL),
(23, 'Thêm độ mật', 21, 'them-do-mat', 1, '2022-01-04 20:50:44', '2022-01-04 20:50:44', NULL),
(24, 'Sửa độ mật', 21, 'sua-do-mat', 1, '2022-01-04 20:50:57', '2022-01-04 20:50:57', NULL),
(25, 'Xóa độ mật', 21, 'xoa-do-mat', 1, '2022-01-04 20:51:12', '2022-01-04 20:51:12', NULL),
(26, 'Hình thức', 0, 'hinh-thuc', 1, '2022-01-04 20:51:27', '2022-01-04 20:51:27', NULL),
(27, 'Danh sách hình thức', 26, 'danh-sach-hinh-thuc', 1, '2022-01-04 20:51:39', '2022-01-04 20:51:39', NULL),
(28, 'Thêm hình thức', 26, 'them-hinh-thuc', 1, '2022-01-04 20:51:54', '2022-01-04 20:51:54', NULL),
(29, 'Sửa hình thức', 26, 'sua-hinh-thuc', 1, '2022-01-04 20:52:08', '2022-01-04 20:52:08', NULL),
(30, 'Xóa hình thức', 26, 'xoa-hinh-thuc', 1, '2022-01-04 20:52:22', '2022-01-04 20:52:22', NULL),
(31, 'Hình thức chuyển', 0, 'hinh-thuc-chuyen', 1, '2022-01-04 20:52:47', '2022-01-04 20:52:47', NULL),
(32, 'Danh sách hình thức chuyển', 31, 'danh-sach-hinh-thuc-chuyen', 1, '2022-01-04 20:53:01', '2022-01-04 20:53:01', NULL),
(33, 'Thêm hình thức chuyển', 31, 'them-hinh-thuc-chuyen', 1, '2022-01-04 20:53:15', '2022-01-04 20:53:15', NULL),
(34, 'Sửa hình thức chuyển', 31, 'sua-hinh-thuc-chuyen', 1, '2022-01-04 20:53:33', '2022-01-04 20:53:33', NULL),
(35, 'Xóa hình thức chuyển', 31, 'xoa-hinh-thuc-chuyen', 1, '2022-01-04 20:53:46', '2022-01-04 20:53:46', NULL),
(36, 'Hình thức lưu', 0, 'hinh-thuc-luu', 1, '2022-01-04 20:53:58', '2022-01-04 20:53:58', NULL),
(37, 'Danh sách hình thức lưu', 36, 'danh-sach-hinh-thuc-luu', 1, '2022-01-04 20:54:11', '2022-01-04 20:54:11', NULL),
(38, 'Thêm hình thức lưu', 36, 'them-hinh-thuc-luu', 1, '2022-01-04 20:54:28', '2022-01-04 20:54:28', NULL),
(39, 'Sửa hình thức lưu', 36, 'sua-hinh-thuc-luu', 1, '2022-01-04 20:54:46', '2022-01-04 20:54:46', NULL),
(40, 'Xóa hình thức lưu', 36, 'xoa-hinh-thuc-luu', 1, '2022-01-04 20:55:06', '2022-01-04 20:55:06', NULL),
(41, 'Lĩnh vực', 0, 'linh-vuc', 1, '2022-01-04 20:55:38', '2022-01-04 20:55:38', NULL),
(42, 'Danh sách lĩnh vực', 41, 'danh-sach-linh-vuc', 1, '2022-01-04 20:55:52', '2022-01-04 20:55:52', NULL),
(43, 'Thêm lĩnh vực', 41, 'them-linh-vuc', 1, '2022-01-04 20:56:04', '2022-01-04 20:56:04', NULL),
(44, 'Sửa lĩnh vực', 41, 'sua-linh-vuc', 1, '2022-01-04 20:56:22', '2022-01-04 20:56:22', NULL),
(45, 'Xóa lĩnh vực', 41, 'xoa-linh-vuc', 1, '2022-01-04 20:56:34', '2022-01-04 20:56:34', NULL),
(46, 'Trạng thái', 0, 'trang-thai', 1, '2022-01-04 20:56:43', '2022-01-04 20:56:43', NULL),
(47, 'Danh sách trạng thái', 46, 'danh-sach-trang-thai', 1, '2022-01-04 20:56:56', '2022-01-04 20:56:56', NULL),
(48, 'Thêm trạng thái', 46, 'them-trang-thai', 1, '2022-01-04 20:57:10', '2022-01-04 20:57:10', NULL),
(49, 'Sửa trạng thái', 46, 'sua-trang-thai', 1, '2022-01-04 20:57:21', '2022-01-04 20:57:21', NULL),
(50, 'Xóa trạng thái', 46, 'xoa-trang-thai', 1, '2022-01-04 20:57:33', '2022-01-04 20:57:33', NULL),
(51, 'Người dùng', 0, 'nguoi-dung', 1, '2022-01-04 20:57:48', '2022-01-04 20:57:48', NULL),
(52, 'Danh sách tài khoản', 51, 'danh-sach-tai-khoan', 1, '2022-01-04 20:58:03', '2022-01-04 20:58:03', NULL),
(53, 'Thêm người dùng', 51, 'them-nguoi-dung', 1, '2022-01-04 20:58:21', '2022-01-04 20:58:21', NULL),
(54, 'Sửa người dùng', 51, 'sua-nguoi-dung', 1, '2022-01-04 20:58:33', '2022-01-04 20:58:33', NULL),
(55, 'Xóa người dùng', 51, 'xoa-nguoi-dung', 1, '2022-01-04 20:58:45', '2022-01-04 20:58:45', NULL),
(56, 'Văn bản đến', 0, 'van-ban-den', 1, '2022-01-04 20:58:53', '2022-01-04 20:58:53', NULL),
(57, 'Danh sách văn bản đến', 56, 'danh-sach-van-ban-den', 1, '2022-01-04 20:59:08', '2022-01-04 20:59:08', NULL),
(58, 'Thêm văn bản đến', 56, 'them-van-ban-den', 1, '2022-01-04 20:59:22', '2022-01-04 20:59:22', NULL),
(59, 'Sửa văn bản đến', 56, 'sua-van-ban-den', 1, '2022-01-04 20:59:34', '2022-01-04 20:59:34', NULL),
(60, 'Xóa văn bản đến', 56, 'xoa-van-ban-den', 1, '2022-01-04 20:59:46', '2022-01-04 20:59:46', NULL),
(61, 'Văn bản đi', 0, 'van-ban-di', 1, '2022-01-04 20:59:54', '2022-01-04 20:59:54', NULL),
(62, 'Danh sách văn bản đi', 61, 'danh-sach-van-ban-di', 1, '2022-01-04 21:00:06', '2022-01-04 21:00:06', NULL),
(63, 'Thêm văn bản đi', 61, 'them-van-ban-di', 1, '2022-01-04 21:00:17', '2022-01-04 21:00:17', NULL),
(64, 'Sửa văn bản đi', 61, 'sua-van-ban-di', 1, '2022-01-04 21:00:31', '2022-01-04 21:00:31', NULL),
(65, 'Xóa văn bản đi', 61, 'xoa-van-ban-di', 1, '2022-01-04 21:00:45', '2022-01-04 21:00:45', NULL),
(66, 'Vai trò', 0, 'vai-tro', 1, '2022-01-04 21:00:54', '2022-01-04 21:00:54', NULL),
(67, 'Danh sách vai trò', 66, 'danh-sach-vai-tro', 1, '2022-01-04 21:01:10', '2022-01-04 21:01:10', NULL),
(68, 'Thêm vai trò', 66, 'them-vai-tro', 1, '2022-01-04 21:01:22', '2022-01-04 21:01:22', NULL),
(69, 'Sửa vai trò', 66, 'sua-vai-tro', 1, '2022-01-04 21:01:34', '2022-01-04 21:01:34', NULL),
(70, 'Xóa vai trò', 66, 'xoa-vai-tro', 1, '2022-01-04 21:01:46', '2022-01-04 21:01:46', NULL),
(71, 'Quyền truy cập', 0, 'quyen-truy-cap', 1, '2022-01-04 21:01:56', '2022-01-04 21:01:56', NULL),
(72, 'Danh sách quyền truy cập', 71, 'danh-sach-quyen-truy-cap', 1, '2022-01-04 21:02:09', '2022-01-04 21:02:09', NULL),
(73, 'Thêm quyền truy cập', 71, 'them-quyen-truy-cap', 1, '2022-01-04 21:02:21', '2022-01-04 21:02:21', NULL),
(74, 'Sửa quyền truy cập', 71, 'sua-quyen-truy-cap', 1, '2022-01-04 21:02:33', '2022-01-04 21:02:33', NULL),
(75, 'Xóa quyền truy cập', 71, 'xoa-quyen-truy-cap', 1, '2022-01-04 21:02:51', '2022-01-04 21:02:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theloai`
--

DROP TABLE IF EXISTS `tbl_theloai`;
CREATE TABLE IF NOT EXISTS `tbl_theloai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_loai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1',
  `ghi_chu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_theloai`
--

INSERT INTO `tbl_theloai` (`id`, `ten_loai`, `trang_thai`, `ghi_chu`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Báo cáo', 1, 'bc', '2021-12-03 19:05:32', NULL, NULL),
(2, 'Báo cáo nhanh', 1, 'bcn', '2021-12-03 19:06:23', NULL, NULL),
(3, 'Biên bản', 1, 'bb', '2021-12-03 19:07:19', NULL, NULL),
(4, 'Chương trình', 1, 'ctr', '2021-12-03 19:08:48', NULL, NULL),
(5, 'Chỉ thị', 1, 'ct', '2021-12-03 19:09:28', NULL, NULL),
(6, 'Công hàm', 1, 'ch', '2021-12-03 19:10:10', NULL, NULL),
(7, 'Nghị quyết', 1, 'NQ', '2021-12-03 19:10:29', NULL, NULL),
(8, 'Quyết định', 1, 'QĐ', '2021-12-03 19:11:59', NULL, NULL),
(9, 'Quy chế', 1, 'QC', '2021-12-03 19:12:47', NULL, NULL),
(10, 'Quy định', 1, 'QYĐ', '2021-12-03 19:13:26', NULL, NULL),
(11, 'Thông cáo', 1, 'TC', '2021-12-03 19:14:12', NULL, NULL),
(12, 'Thông báo', 1, 'TB', '2021-12-03 19:16:35', NULL, NULL),
(13, 'Hướng dẫn', 1, 'HD', '2021-12-03 19:16:33', NULL, NULL),
(14, 'Kế hoạch', 1, 'KH', '2021-12-03 19:17:31', NULL, NULL),
(15, 'Phương án', 1, 'PA', '2021-12-03 19:18:50', NULL, NULL),
(16, 'Đề án', 1, 'ĐA', '2021-12-03 19:19:26', NULL, NULL),
(17, 'Dự án', 1, 'DA', '2021-12-03 19:20:05', NULL, NULL),
(18, 'Tờ trình', 1, 'TTr', '2021-12-03 19:21:15', NULL, NULL),
(19, 'Hợp đồng', 1, 'HĐ', '2021-12-03 19:22:04', NULL, NULL),
(20, 'Công văn', 1, 'CV', '2021-12-03 19:23:51', NULL, NULL),
(21, 'Công điện', 1, 'CĐ', '2021-12-03 19:24:21', NULL, NULL),
(22, 'Bản ghi nhớ', 1, 'BGN', '2021-12-03 19:25:13', NULL, NULL),
(23, 'Bản thỏa thuận', 1, 'BTT', '2021-12-03 19:26:15', NULL, NULL),
(24, 'Giấy ủy quyền', 1, 'GUQ', '2021-12-03 19:27:46', NULL, NULL),
(25, 'Giấy mời', 1, 'GM', '2021-12-03 19:28:12', NULL, NULL),
(26, 'Giấy giới thiệu', 1, 'GGT', '2021-12-03 19:29:08', NULL, NULL),
(27, 'Giấy nghỉ phép', 1, 'GNP', '2021-12-03 19:30:22', NULL, NULL),
(28, 'Phiếu gửi', 1, 'PG', '2021-12-03 19:31:46', NULL, NULL),
(29, 'Phiếu chuyển', 1, 'PC', '2021-12-03 19:32:29', NULL, NULL),
(30, 'Phiếu báo', 1, 'PB', '2021-12-03 19:33:47', NULL, NULL),
(31, 'Thư công', 1, 'ThC', '2021-12-03 19:34:27', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trangthai`
--

DROP TABLE IF EXISTS `tbl_trangthai`;
CREATE TABLE IF NOT EXISTS `tbl_trangthai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_trang_thai` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1',
  `ghi_chu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_trangthai`
--

INSERT INTO `tbl_trangthai` (`id`, `ten_trang_thai`, `trang_thai`, `ghi_chu`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Tiếp nhận văn bản đến', 1, 'Văn thư tiếp nhận văn bản đến từ cơ quan ngoài.', '2021-12-10 17:02:05', NULL, NULL),
(3, 'Trình lãnh đạo đơn vị', 1, 'Văn thư chuyển văn bản đến vừa tiếp nhận cho lãnh đạo đơn vị xem xét.', '2021-12-10 17:02:05', NULL, NULL),
(4, 'Lãnh đạo đơn vị yêu cầu giải quyết', 1, 'Lãnh đạo đơn vị chuyển văn bản đến vừa tiếp nhận cho cấp dưới để xử lý.', '2021-12-10 17:02:05', NULL, NULL),
(5, 'Văn bản đến chờ xử lý', 1, 'Văn bản đến trong trạng thái chờ đơn vị xử lý.', '2021-12-10 17:02:05', NULL, NULL),
(6, 'Văn bản đến đã xử lý', 1, 'Văn bản đến đã được xử lý.', '2021-12-10 17:02:05', NULL, NULL),
(7, 'Văn bản đi đã ban hành', 1, 'Văn bản đi đã được đơn vị ban hành.', '2021-12-10 17:02:05', NULL, NULL),
(8, 'Văn bản đi đã xử lý', 1, 'Văn bản đi đã được xử lý.', '2021-12-10 17:02:05', NULL, NULL),
(9, 'Văn bản đi chờ xử lý', 1, 'Văn bản đi trong trạng thái chờ đơn vị xử lý.', '2021-12-10 17:02:05', NULL, NULL),
(10, 'Lãnh đạo đơn vị yêu cầu xử lý', 1, 'Lãnh đạo đơn vị chuyển văn bản đi cần xử lý cho cấp dưới để xử lý.', '2021-12-10 17:02:05', NULL, NULL),
(11, 'Ban hành văn bản đi', 1, 'Lãnh đạo đơn vị chuyển văn bản đi cần ban hành cho văn thư để chuyển ra cơ quan khác.', '2021-12-10 17:02:05', NULL, NULL),
(12, 'Ban hành văn bản đi', 1, 'Văn thư ban hành văn bản đi ra cơ quan khác.', '2021-12-10 17:02:05', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vaitro`
--

DROP TABLE IF EXISTS `tbl_vaitro`;
CREATE TABLE IF NOT EXISTS `tbl_vaitro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vai_tro` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1',
  `ghi_chu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_vaitro`
--

INSERT INTO `tbl_vaitro` (`id`, `vai_tro`, `trang_thai`, `ghi_chu`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Admin', 1, 'Quản trị hệ thống', '2022-01-04 21:29:11', '2022-01-04 21:29:11', NULL),
(3, 'Văn thư', 1, NULL, '2022-01-05 14:13:54', '2022-01-05 14:13:54', NULL),
(4, 'Trưởng đơn vị', 1, NULL, '2022-01-05 14:14:36', '2022-01-05 14:14:36', NULL),
(5, 'Trưởng phòng', 1, NULL, '2022-01-05 14:15:22', '2022-01-05 14:15:22', NULL),
(6, 'Chuyên viên', 1, NULL, '2022-01-05 14:15:48', '2022-01-05 14:15:48', NULL),
(8, 'Test', 1, 'test chức danh', '2022-01-05 15:01:20', '2022-01-05 15:01:43', '2022-01-05 15:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vaitro_quyentruycap`
--

DROP TABLE IF EXISTS `tbl_vaitro_quyentruycap`;
CREATE TABLE IF NOT EXISTS `tbl_vaitro_quyentruycap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_vaitro` int(11) NOT NULL,
  `id_quyentruycap` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_vaitro` (`id_vaitro`),
  KEY `FK_quyentruycap` (`id_quyentruycap`)
) ENGINE=MyISAM AUTO_INCREMENT=154 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_vaitro_quyentruycap`
--

INSERT INTO `tbl_vaitro_quyentruycap` (`id`, `id_vaitro`, `id_quyentruycap`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 2, 2, NULL, NULL, NULL),
(3, 2, 3, NULL, NULL, NULL),
(4, 2, 4, NULL, NULL, NULL),
(5, 2, 5, NULL, NULL, NULL),
(6, 2, 7, NULL, NULL, NULL),
(7, 2, 8, NULL, NULL, NULL),
(8, 2, 9, NULL, NULL, NULL),
(9, 2, 10, NULL, NULL, NULL),
(10, 2, 12, NULL, NULL, NULL),
(11, 2, 13, NULL, NULL, NULL),
(12, 2, 14, NULL, NULL, NULL),
(13, 2, 15, NULL, NULL, NULL),
(14, 2, 17, NULL, NULL, NULL),
(15, 2, 18, NULL, NULL, NULL),
(16, 2, 19, NULL, NULL, NULL),
(17, 2, 20, NULL, NULL, NULL),
(18, 2, 22, NULL, NULL, NULL),
(19, 2, 23, NULL, NULL, NULL),
(20, 2, 24, NULL, NULL, NULL),
(21, 2, 25, NULL, NULL, NULL),
(22, 2, 27, NULL, NULL, NULL),
(23, 2, 28, NULL, NULL, NULL),
(24, 2, 29, NULL, NULL, NULL),
(25, 2, 30, NULL, NULL, NULL),
(26, 2, 32, NULL, NULL, NULL),
(27, 2, 33, NULL, NULL, NULL),
(28, 2, 34, NULL, NULL, NULL),
(29, 2, 35, NULL, NULL, NULL),
(30, 2, 37, NULL, NULL, NULL),
(31, 2, 38, NULL, NULL, NULL),
(32, 2, 39, NULL, NULL, NULL),
(33, 2, 40, NULL, NULL, NULL),
(34, 2, 42, NULL, NULL, NULL),
(35, 2, 43, NULL, NULL, NULL),
(36, 2, 44, NULL, NULL, NULL),
(37, 2, 45, NULL, NULL, NULL),
(38, 2, 47, NULL, NULL, NULL),
(39, 2, 48, NULL, NULL, NULL),
(40, 2, 49, NULL, NULL, NULL),
(41, 2, 50, NULL, NULL, NULL),
(42, 2, 52, NULL, NULL, NULL),
(43, 2, 53, NULL, NULL, NULL),
(44, 2, 54, NULL, NULL, NULL),
(45, 2, 55, NULL, NULL, NULL),
(46, 2, 57, NULL, NULL, NULL),
(47, 2, 58, NULL, NULL, NULL),
(48, 2, 59, NULL, NULL, NULL),
(49, 2, 60, NULL, NULL, NULL),
(50, 2, 62, NULL, NULL, NULL),
(51, 2, 63, NULL, NULL, NULL),
(52, 2, 64, NULL, NULL, NULL),
(53, 2, 65, NULL, NULL, NULL),
(54, 2, 67, NULL, NULL, NULL),
(55, 2, 68, NULL, NULL, NULL),
(56, 2, 69, NULL, NULL, NULL),
(57, 2, 70, NULL, NULL, NULL),
(58, 2, 72, NULL, NULL, NULL),
(59, 2, 73, NULL, NULL, NULL),
(60, 2, 74, NULL, NULL, NULL),
(61, 2, 75, NULL, NULL, NULL),
(62, 3, 2, NULL, NULL, NULL),
(63, 3, 3, NULL, NULL, NULL),
(64, 3, 4, NULL, NULL, NULL),
(65, 3, 5, NULL, NULL, NULL),
(66, 3, 7, NULL, NULL, NULL),
(67, 3, 8, NULL, NULL, NULL),
(68, 3, 9, NULL, NULL, NULL),
(69, 3, 10, NULL, NULL, NULL),
(70, 3, 12, NULL, NULL, NULL),
(71, 3, 13, NULL, NULL, NULL),
(72, 3, 14, NULL, NULL, NULL),
(73, 3, 15, NULL, NULL, NULL),
(74, 3, 17, NULL, NULL, NULL),
(75, 3, 18, NULL, NULL, NULL),
(76, 3, 19, NULL, NULL, NULL),
(77, 3, 20, NULL, NULL, NULL),
(78, 3, 22, NULL, NULL, NULL),
(79, 3, 23, NULL, NULL, NULL),
(80, 3, 24, NULL, NULL, NULL),
(81, 3, 25, NULL, NULL, NULL),
(82, 3, 27, NULL, NULL, NULL),
(83, 3, 28, NULL, NULL, NULL),
(84, 3, 29, NULL, NULL, NULL),
(85, 3, 30, NULL, NULL, NULL),
(86, 3, 32, NULL, NULL, NULL),
(87, 3, 33, NULL, NULL, NULL),
(88, 3, 34, NULL, NULL, NULL),
(89, 3, 35, NULL, NULL, NULL),
(90, 3, 37, NULL, NULL, NULL),
(91, 3, 38, NULL, NULL, NULL),
(92, 3, 39, NULL, NULL, NULL),
(93, 3, 40, NULL, NULL, NULL),
(94, 3, 42, NULL, NULL, NULL),
(95, 3, 43, NULL, NULL, NULL),
(96, 3, 44, NULL, NULL, NULL),
(97, 3, 45, NULL, NULL, NULL),
(98, 3, 47, NULL, NULL, NULL),
(99, 3, 48, NULL, NULL, NULL),
(100, 3, 49, NULL, NULL, NULL),
(101, 3, 50, NULL, NULL, NULL),
(102, 3, 57, NULL, NULL, NULL),
(103, 3, 58, NULL, NULL, NULL),
(104, 3, 59, NULL, NULL, NULL),
(105, 3, 60, NULL, NULL, NULL),
(106, 3, 62, NULL, NULL, NULL),
(107, 3, 63, NULL, NULL, NULL),
(108, 3, 64, NULL, NULL, NULL),
(109, 3, 65, NULL, NULL, NULL),
(110, 4, 7, NULL, NULL, NULL),
(111, 4, 8, NULL, NULL, NULL),
(112, 4, 9, NULL, NULL, NULL),
(114, 4, 57, NULL, NULL, NULL),
(115, 4, 58, NULL, NULL, NULL),
(116, 4, 59, NULL, NULL, NULL),
(118, 4, 62, NULL, NULL, NULL),
(119, 4, 63, NULL, NULL, NULL),
(120, 4, 64, NULL, NULL, NULL),
(122, 5, 57, NULL, NULL, NULL),
(153, 5, 64, NULL, NULL, NULL),
(151, 5, 59, NULL, NULL, NULL),
(125, 5, 60, NULL, NULL, NULL),
(126, 5, 62, NULL, NULL, NULL),
(127, 5, 63, NULL, NULL, NULL),
(152, 5, 58, NULL, NULL, NULL),
(129, 5, 65, NULL, NULL, NULL),
(130, 6, 57, NULL, NULL, NULL),
(131, 6, 58, NULL, NULL, NULL),
(132, 6, 62, NULL, NULL, NULL),
(133, 6, 63, NULL, NULL, NULL),
(149, 8, 5, NULL, NULL, NULL),
(148, 8, 4, NULL, NULL, NULL),
(147, 8, 3, NULL, NULL, NULL),
(146, 8, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vanban_den`
--

DROP TABLE IF EXISTS `tbl_vanban_den`;
CREATE TABLE IF NOT EXISTS `tbl_vanban_den` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `so_vb_den` int(11) NOT NULL,
  `ki_hieu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_nhan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `don_vi_ban_hanh` int(11) NOT NULL,
  `hinh_thuc` int(11) NOT NULL,
  `ngay_vb` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `trich_yeu` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `loai` int(11) DEFAULT NULL,
  `linh_vuc` int(11) DEFAULT NULL,
  `nguoi_ky` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ds_file` text COLLATE utf8_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `do_mat` int(11) DEFAULT NULL,
  `do_khan` int(11) DEFAULT NULL,
  `chuc_vu` int(11) DEFAULT NULL,
  `hinh_thuc_chuyen` int(11) DEFAULT NULL,
  `hinh_thuc_luu` int(11) DEFAULT NULL,
  `nv_nhan` int(11) NOT NULL,
  `nv_xuly` int(11) DEFAULT NULL,
  `han_xu_ly` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trang_thai` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_vbden_nv` (`nv_nhan`),
  KEY `fk_vb_hinhthuc` (`hinh_thuc`),
  KEY `fk_vb_loai` (`loai`),
  KEY `fk_vb_domat` (`do_mat`),
  KEY `fk_vb_dokhan` (`do_khan`),
  KEY `fk_vb_trangthai` (`trang_thai`),
  KEY `FK_donvibanhanh_vbden` (`don_vi_ban_hanh`),
  KEY `FK_linhvuc_vbden` (`linh_vuc`),
  KEY `FK_nguoiky_vbden` (`nguoi_ky`),
  KEY `FK_chucvu_vbden` (`chuc_vu`),
  KEY `FK_hinhthucchuyen_vbden` (`hinh_thuc_chuyen`),
  KEY `FK_hinhthucluu_vbden` (`hinh_thuc_luu`),
  KEY `FK_nv_xuly_vanban` (`nv_xuly`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_vanban_den`
--

INSERT INTO `tbl_vanban_den` (`id`, `so_vb_den`, `ki_hieu`, `ngay_nhan`, `don_vi_ban_hanh`, `hinh_thuc`, `ngay_vb`, `trich_yeu`, `loai`, `linh_vuc`, `nguoi_ky`, `ds_file`, `file_path`, `do_mat`, `do_khan`, `chuc_vu`, `hinh_thuc_chuyen`, `hinh_thuc_luu`, `nv_nhan`, `nv_xuly`, `han_xu_ly`, `trang_thai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 3, '43/2021/QĐ-UBND', '30/11/2021', 45, 1, '30/11/2021', 'Ban hành quy định lập, thẩm định và phê duyệt Kế hoạch ứng phó sự cố tràn dầu của cấp cơ sở trên địa bàn tỉnh Bạc Liêu.', 8, 1, 'Cao Xuân Thu Vân', '42-QDQPPL.signed.pdf', '/storage/vanBanDi/2/vpB92BIl7d5cXvEa2KfD.pdf', 1, 1, 4, 1, 1, 2, 2, '10/01/2022', NULL, '2022-01-03 20:28:00', '2022-01-03 20:28:00', NULL),
(2, 2, '44/2021/QĐ-UBND', '30/12/2021', 45, 1, '30/12/2021', 'Quy định vùng tạo nguồn cán bộ cho các dân tộc thiểu số thuộc diện tuyển sinh vào Trường phổ thông Dân tộc nội trú trên địa bàn tỉnh Bạc Liêu', 8, 3, 'Phan Thanh Duy', '44-QDQPPL.signed.pdf', '/storage/vanBanDi/2/M3Gs4OAZgOX2SkfVFKVt.pdf', 1, 1, 5, 1, 1, 2, 5, '09/01/2022', NULL, '2022-01-03 18:13:22', '2022-01-03 18:13:22', NULL),
(4, 4, '01/2022/QĐ-UBND', '07/01/2022', 45, 1, '04/01/2022', 'Ban hành Quy định về phân cấp Quản lý kiến trúc trên địa bàn tỉnh Bạc Liêu', 8, 3, 'Lê Tấn Cận', '01-QDQPPL.signed.pdf', '/storage/vanBanDi/1/tnZQYgmFWIgFZZOGl2EW.pdf', 1, 1, 4, 4, 1, 1, NULL, '09/01/2022', NULL, '2022-01-07 18:02:05', '2022-01-07 18:02:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vanban_di`
--

DROP TABLE IF EXISTS `tbl_vanban_di`;
CREATE TABLE IF NOT EXISTS `tbl_vanban_di` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `so_vb_di` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ki_hieu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_gui` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `loai` int(11) DEFAULT NULL,
  `hinh_thuc` int(11) DEFAULT NULL,
  `linh_vuc` int(11) DEFAULT NULL,
  `so_trang` int(11) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `trich_yeu` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_ky` int(10) NOT NULL,
  `nv_phathanh` int(11) NOT NULL,
  `nv_xuly` int(11) NOT NULL,
  `ds_file` text COLLATE utf8_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chuc_vu` int(11) NOT NULL,
  `noi_gui` int(11) NOT NULL,
  `do_khan` int(11) DEFAULT NULL,
  `hinh_thuc_luu` int(11) DEFAULT NULL,
  `noi_nhan` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `han_xu_ly` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trang_thai` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_vbdi_cq` (`noi_nhan`),
  KEY `fk_vb_hinhthuc` (`hinh_thuc`),
  KEY `fk_vb_loai` (`loai`),
  KEY `fk_vb_dokhan` (`do_khan`),
  KEY `fk_vb_trangthai` (`trang_thai`),
  KEY `FK_linhvuc_vbdi` (`linh_vuc`),
  KEY `FK_chucvu_vbdi` (`chuc_vu`),
  KEY `FK_hinhthucluu_vbdi` (`hinh_thuc_luu`),
  KEY `FK_nvphathanh_vbdi` (`nv_phathanh`),
  KEY `FK_coquangui_vbdi` (`noi_gui`),
  KEY `nguoi_ky` (`nguoi_ky`),
  KEY `FK_nv_xuly_vanban` (`nv_xuly`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_vanban_di`
--

INSERT INTO `tbl_vanban_di` (`id`, `so_vb_di`, `ki_hieu`, `ngay_gui`, `loai`, `hinh_thuc`, `linh_vuc`, `so_trang`, `so_luong`, `trich_yeu`, `nguoi_ky`, `nv_phathanh`, `nv_xuly`, `ds_file`, `file_path`, `chuc_vu`, `noi_gui`, `do_khan`, `hinh_thuc_luu`, `noi_nhan`, `han_xu_ly`, `trang_thai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'BC-1', '21/12/2021', 1, 1, 1, 50, 2, 'Báo cáo tiến độ thực hiện tuần 10', 1, 2, 5, '', NULL, 4, 13, 1, 1, '37', '26/12/2021', NULL, '2021-12-21 05:49:21', '2021-12-21 05:49:21', NULL),
(2, '2', 'BC-2', '30/12/2021', 1, 1, 1, 50, 1, 'Báo cáo tiến độ thực hiện đồ án tuần 11', 2, 2, 0, '', NULL, 5, 13, 1, 1, '14', '02/01/2022', NULL, '2021-12-29 19:04:34', '2021-12-29 19:04:34', NULL),
(3, '3', 'BC-3', '02/01/2022', 1, 1, 1, 50, 2, 'Báo cáo tiến độ thực hiện tuần 11', 3, 1, 0, '', NULL, 4, 13, 1, 1, '37', '09/01/2022', NULL, '2022-01-02 18:25:24', '2022-01-02 18:25:24', NULL),
(4, '4', 'BC-4', '02/01/2022', 1, 1, 1, 50, 2, 'Báo cáo tiến độ thực hiện tuần 11', 1, 1, 1, 'BÁO CÁO KẾT QUẢ THỰC HIỆN DỰ ÁN TRONG TUẦN 11.docx', '/storage/vanBanDi/1/0kmeLu3sYbMl8eFLSIBo.docx', 5, 13, 1, 1, '37', '09/01/2022', NULL, '2022-01-02 18:27:49', '2022-01-02 18:27:49', NULL),
(5, '5', 'BC-5', '02/01/2022', 5, 1, 2, 50, 2, 'Về phòng, chống dịch Covid-19', 2, 1, 0, '1063_CD-TTg_31072021_1-signed.pdf', '/storage/vanBanDi/1/WPhpyC5B5ckqKxeUQEZX.pdf', 5, 13, 2, 2, '33', '09/01/2022', NULL, '2022-01-02 18:35:50', '2022-01-02 18:35:50', NULL),
(6, '6', '68/NQ-CP', '01/07/2021', 7, 1, 1, 50, 10, 'Về một số chính sách hỗ trợ người lao động và người sử dụng lao động gặp khó khăn do đại dịch COVID-19', 1, 2, 0, '68.signed.pdf', '/storage/vanBanDi/2/6sQsFJy7rvZNtqz7jV0B.pdf', 4, 13, 2, 1, '45', '19/01/2022', NULL, '2022-01-02 21:02:48', '2022-01-02 21:02:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vbden_nguoidung`
--

DROP TABLE IF EXISTS `tbl_vbden_nguoidung`;
CREATE TABLE IF NOT EXISTS `tbl_vbden_nguoidung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_vanbanden` int(11) DEFAULT NULL,
  `id_nguoidung` int(11) DEFAULT NULL,
  `id_nguoidung_xuly` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_vanbanden` (`id_vanbanden`),
  KEY `FK_nguoidung` (`id_nguoidung`),
  KEY `FK_nguoidung_xuly` (`id_nguoidung_xuly`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_vbden_nguoidung`
--

INSERT INTO `tbl_vbden_nguoidung` (`id`, `id_vanbanden`, `id_nguoidung`, `id_nguoidung_xuly`) VALUES
(11, 2, 1, 3),
(10, 3, 2, 3),
(9, 2, 2, 1),
(7, 3, 1, NULL),
(8, 4, 2, NULL),
(12, 3, 1, 1),
(13, 3, 1, 2),
(14, 4, 1, 6),
(15, 2, 1, 1),
(16, 2, 1, 2),
(17, 3, 1, 2),
(18, 2, 2, 1),
(19, 2, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vbdi_nguoidung`
--

DROP TABLE IF EXISTS `tbl_vbdi_nguoidung`;
CREATE TABLE IF NOT EXISTS `tbl_vbdi_nguoidung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_vanbandi` int(11) DEFAULT NULL,
  `id_nguoidung` int(11) DEFAULT NULL,
  `id_nguoidung_xuly` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_vanbandi` (`id_vanbandi`),
  KEY `FK_nguoidung` (`id_nguoidung`),
  KEY `FK_nguoidung_xuly` (`id_nguoidung_xuly`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_vbdi_nguoidung`
--

INSERT INTO `tbl_vbdi_nguoidung` (`id`, `id_vanbandi`, `id_nguoidung`, `id_nguoidung_xuly`) VALUES
(1, 4, 2, 3),
(12, 1, 3, 5),
(13, 1, 3, 5),
(14, 1, 3, 5),
(15, 1, 3, NULL),
(16, 1, 3, NULL),
(17, 1, 3, 5),
(18, 4, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `ngay_sinh` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gioi_tinh` tinyint(4) DEFAULT NULL,
  `dia_chi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `so_dt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anh` text COLLATE utf8_unicode_ci,
  `file_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bo_phan` int(11) DEFAULT NULL,
  `vai_tro` int(11) NOT NULL,
  `trang_thai` tinyint(4) DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `FK_bophan_nguoidung` (`bo_phan`),
  KEY `FK_vaitro` (`vai_tro`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
-- user 2: password: 123456
-- user 1, 3, 4, 5: password 123456789
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `created_by`, `ngay_sinh`, `gioi_tinh`, `dia_chi`, `so_dt`, `anh`, `file_path`, `bo_phan`, `vai_tro`, `trang_thai`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Trương Dương Khang', 'duonkhangaa@gmail.com', NULL, '$2y$10$n7HThy2oC.bFqonIGkmWD.1t66YIy5dyFIyDB/bcZ1x5cVRDTlLAW', 1, '27/07/2000', 1, 'Phường Linh Đông, TP Thủ Đức, Tp Hồ Chí Minh', '0888780807', 'beauty_20200701121629.jpg', '/storage/avatar/1/A4ePlozWkaaauGcdxscG.jpg', 3, 5, 1, '7EwFmA1UXjvOpYlxizoycVI16C5BuWAUHxiUTUlOna8O6UMOp4ushKZXAkaS', '2021-12-17 15:54:43', '2022-01-05 19:59:10', NULL),
(2, 'Huỳnh Hồng Hân', 'honghan1303@gmail.com', NULL, '$2y$10$2O7LXcmX4sMGPEGmOel86u66rfnaHnQo6YszYnaQmII0xlu/ENaIm', NULL, '13/03/2000', 1, 'Thị trấn Châu Hưng, Vĩnh Lợi, Bạc Liêu', '0825828346', 'IMG_20200701_115444.jpg', '/storage/avatar/2/T30qIgI7vnCyKtF0aYAn.jpg', 5, 3, 1, NULL, '2021-12-21 05:03:25', '2022-01-05 19:58:08', NULL),
(3, 'Dương Khang Admin', 'admin@gmail.com', NULL, '$2y$10$VPBdWAhgnFbDwLlqchBemeQ2vasKOQQu9tZlCTlUzVyhXowtY5ZWu', 1, '16/05/1999', 1, 'Phường Linh Đông, TP Thủ Đức, Tp Hồ Chí Minh', '0123456654', 'jYAei3hE349pl1fO6YAE.jpg', '/storage/avatar/3/wwf2AA0iYmQKtnVGxfBU.jpg', 1, 2, 1, NULL, '2021-12-29 18:09:48', '2022-01-08 05:26:49', NULL),
(4, 'Test data', 'test@email.com', NULL, '$2y$10$r3/8nu5oiQYJ6OiUMCbvruU5iK3qwpPDjKgRiMnHI1x6df722NLxi', 1, '04/01/2000', 1, 'demo', '0123654789', 'IMG_20210214_210622_744.jpg', '/storage/avatar/1/jYAei3hE349pl1fO6YAE.jpg', 6, 4, 1, NULL, '2022-01-03 22:47:15', '2022-01-05 19:58:30', NULL),
(5, 'Tôi là Dương Khang', 'truongduongkhang277@gmail.com', NULL, '$2y$10$kkcRMDgqyHR9EUqfp87i4e6fgpihjiX5v.VO3ITcbtkTWzHoHt0Sq', 1, '06/01/2000', 1, 'Phường Linh Đông, TP Thủ Đức, Tp Hồ Chí Minh', '0147852369', 'test.jpg', '/storage/avatar/1/WYcTbZhAlzugFgpCTMM7.jpg', 5, 6, 1, NULL, '2022-01-05 17:03:04', '2022-01-08 05:26:37', NULL),
(6, 'Văn thư demo', 'vanthudemo@gmail.com', NULL, '$2y$10$OAu4jXgyIpY1viPZSdBPJebl0rS8zWb59sG5xTgPPMvahUrS6DAU.', 3, '12/03/2000', 0, 'Thị trấn Châu Hưng, Vĩnh Lợi, Bạc Liêu', '0123654777', 'z2612263601972_88ed25aa8572fbe1c3fb586bf7802ff1.jpg', '/storage/avatar/3/M4I0IUHYjT1B4kl9vjr0.jpg', 5, 3, 1, NULL, '2022-01-07 08:21:26', '2022-01-07 08:21:26', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
