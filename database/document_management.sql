-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jan 03, 2022 at 09:25 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_bophan`
--

INSERT INTO `tbl_bophan` (`id`, `bo_phan`, `ki_hieu`, `truong_bo_phan`, `trang_thai`, `ghi_chu`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ban giám đốc', 'BGD', NULL, 1, NULL, '2021-12-17 16:46:56', NULL, NULL),
(2, 'Phòng Chuyên đề', 'PCD', NULL, 1, NULL, '2021-12-17 16:51:27', NULL, NULL),
(3, 'Phòng Chương trình', 'PCT', NULL, 1, NULL, '2021-12-17 16:51:27', NULL, NULL),
(4, 'Phòng DV Quảng cáo', 'PDVQC', NULL, 1, NULL, '2021-12-17 16:51:27', NULL, NULL),
(5, 'Phòng Tổ chức và Hành chính', 'PTCHC', NULL, 1, NULL, '2021-12-17 16:51:27', NULL, NULL),
(6, 'Phòng Thời sự', 'PTS', NULL, 1, NULL, '2021-12-17 16:51:27', NULL, NULL),
(7, 'Phòng Văn nghệ', 'PVN', NULL, 1, NULL, '2021-12-17 16:51:27', NULL, NULL),
(8, 'Phòng Kỹ thuật và Công Nghệ', 'PKT', NULL, 1, NULL, '2021-12-17 16:51:27', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chucdanh`
--

DROP TABLE IF EXISTS `tbl_chucdanh`;
CREATE TABLE IF NOT EXISTS `tbl_chucdanh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_quyen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quyen_truy_cap` text COLLATE utf8_unicode_ci,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1',
  `ghi_chu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_chucdanh`
--

INSERT INTO `tbl_chucdanh` (`id`, `ten_quyen`, `quyen_truy_cap`, `trang_thai`, `ghi_chu`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bí thư', NULL, 1, 'BT', '2021-12-04 14:43:07', NULL, NULL),
(2, 'Cán bộ', NULL, 1, 'CB', '2021-12-04 14:43:07', NULL, NULL),
(3, 'Cán sự', NULL, 1, 'CS', '2021-12-04 14:43:07', NULL, NULL),
(4, 'Chánh thanh tra', NULL, 1, 'CTTr', '2021-12-04 14:43:07', NULL, NULL),
(5, 'Chánh văn phòng', NULL, 1, 'CVP', '2021-12-04 14:43:07', NULL, NULL),
(6, 'Chi cục Trưởng', NULL, 1, 'CCTr', '2021-12-04 14:43:07', NULL, NULL),
(7, 'Chỉ huy Trưởng', NULL, 1, 'CHTr', '2021-12-04 14:43:07', NULL, NULL),
(8, 'Chuyên viên', NULL, 1, 'CV', '2021-12-04 14:43:07', NULL, NULL),
(9, 'Chủ tịch', NULL, 1, 'CT', '2021-12-04 14:43:07', NULL, NULL),
(10, 'Công an', NULL, 1, 'CA', '2021-12-04 14:43:07', NULL, NULL),
(11, 'Công chức', NULL, 1, 'CC', '2021-12-04 14:43:07', NULL, NULL),
(12, 'Đội phó', NULL, 1, 'ĐP', '2021-12-04 14:43:07', NULL, NULL),
(13, 'Giám đốc', NULL, 1, 'GĐ', '2021-12-04 14:43:07', NULL, NULL),
(14, 'Kế toán', NULL, 1, 'KT', '2021-12-04 14:43:07', NULL, NULL),
(15, 'Nhân viên', NULL, 1, 'NV', '2021-12-04 14:43:07', NULL, NULL),
(16, 'Phó Chi cục Trưởng', NULL, 1, 'P.CCTr', '2021-12-04 14:43:07', NULL, NULL),
(17, 'Phó Ban', NULL, 1, 'P.B', '2021-12-04 14:43:07', NULL, NULL),
(18, 'Phó Bí thư', NULL, 1, 'P.BT', '2021-12-04 14:43:07', NULL, NULL),
(19, 'Phó Chánh tranh tra', NULL, 1, 'P.CTTr', '2021-12-04 14:43:07', NULL, NULL),
(20, 'Phó Chủ tịch', NULL, 1, 'P.CT', '2021-12-04 14:43:07', NULL, NULL),
(21, 'Phó Chánh văn phòng', NULL, 1, 'P.CVP', '2021-12-04 14:43:07', NULL, NULL),
(22, 'Phó Giám đốc', NULL, 1, 'P.GĐ', '2021-12-04 14:43:07', NULL, NULL),
(23, 'Phó Trạm y tế', NULL, 1, 'P.TYT', '2021-12-04 14:43:07', NULL, NULL),
(24, 'Phó Trưởng CA xã', NULL, 1, 'P.TCAX', '2021-12-04 14:43:07', NULL, NULL),
(25, 'Phó Trưởng đài', NULL, 1, 'P.TĐ', '2021-12-04 14:43:07', NULL, NULL),
(26, 'Phó Trưởng phòng', NULL, 1, 'P.TP', '2021-12-04 14:43:07', NULL, NULL),
(27, 'Thương bình - Xã hội', NULL, 1, 'TBXH', '2021-12-04 14:43:07', NULL, NULL),
(28, 'Tài chính - Kế toán', NULL, 1, 'TCKT', '2021-12-04 14:43:07', NULL, NULL),
(29, 'Thanh tra viên', NULL, 1, 'TTV', '2021-12-04 14:43:07', NULL, NULL),
(30, 'Tư pháp - Hộ tịch', NULL, 1, 'TPHT', '2021-12-04 14:43:07', NULL, NULL),
(31, 'TP_QLDT-Đội trưởng', NULL, 1, 'TPQLDT', '2021-12-04 14:43:07', NULL, NULL),
(32, 'Trưởng ban', NULL, 1, 'TB', '2021-12-04 14:43:07', NULL, NULL),
(33, 'Trưởng Công an', NULL, 1, 'TCA', '2021-12-04 14:43:07', NULL, NULL),
(34, 'Trưởng đài', NULL, 1, 'TĐ', '2021-12-04 14:43:07', NULL, NULL),
(35, 'Trưởng phòng', NULL, 1, 'TP', '2021-12-04 14:43:07', NULL, NULL),
(36, 'Trưởng trạm', NULL, 1, 'TTr', '2021-12-04 14:43:07', NULL, NULL),
(37, 'Văn thư', NULL, 1, 'VT', '2021-12-04 14:43:07', NULL, NULL),
(38, 'Văn hóa - Xã hội', NULL, 1, 'VHXH', '2021-12-04 14:43:07', NULL, NULL),
(39, 'Viên chức', NULL, 1, 'VC', '2021-12-04 14:43:07', NULL, NULL),
(40, 'Địa chính - Xây dựng - Môi trường', NULL, 1, 'ĐCXDMT', '2021-12-04 14:43:07', NULL, NULL),
(41, 'Admin', '[\"vanBanDen.index\",\"vanBanDen.create\",\"vanBanDi.index\",\"vanBanDi.create\",\"bophan.index\",\"bophan.create\",\"theLoai.index\",\"theLoai.create\",\"linhVuc.index\",\"linhVuc.create\",\"hinhThuc.index\",\"hinhThuc.create\",\"hinhThucChuyen.index\",\"hinhThucChuyen.create\",\"hinhThucLuu.index\",\"hinhThucLuu.create\",\"doMat.index\",\"doMat.create\",\"doKhan.index\",\"doKhan.create\",\"coQuan.index\",\"coQuan.create\",\"chucDanh.index\",\"chucDanh.create\"]', 1, NULL, '2021-12-17 16:10:22', '2021-12-17 16:10:22', NULL),
(42, 'test chức danh', '[\"vanBanDen.index\",\"vanBanDi.index\",\"theLoai.index\",\"linhVuc.index\",\"doKhan.index\",\"doKhan.create\"]', 1, NULL, '2021-12-29 18:15:05', '2021-12-29 18:15:05', NULL);

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
-- Table structure for table `tbl_nguoidung_chucdanh`
--

DROP TABLE IF EXISTS `tbl_nguoidung_chucdanh`;
CREATE TABLE IF NOT EXISTS `tbl_nguoidung_chucdanh` (
  `id_nguoidung` int(11) NOT NULL,
  `id_chucdanh` int(11) NOT NULL,
  PRIMARY KEY (`id_nguoidung`,`id_chucdanh`),
  KEY `id_chucdanh` (`id_chucdanh`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_nguoidung_chucdanh`
--

INSERT INTO `tbl_nguoidung_chucdanh` (`id_nguoidung`, `id_chucdanh`) VALUES
(1, 13),
(2, 37),
(3, 39);

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
  `trang_thai` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `ghi_chu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_trangthai`
--

INSERT INTO `tbl_trangthai` (`id`, `trang_thai`, `status`, `ghi_chu`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tiếp nhận văn bản đến', 1, 'Văn thư tiếp nhận văn bản đến từ cơ quan ngoài.', '2021-12-10 16:49:06', NULL, NULL),
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
  KEY `FK_hinhthucluu_vbden` (`hinh_thuc_luu`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_vanban_den`
--

INSERT INTO `tbl_vanban_den` (`id`, `so_vb_den`, `ki_hieu`, `ngay_nhan`, `don_vi_ban_hanh`, `hinh_thuc`, `ngay_vb`, `trich_yeu`, `loai`, `linh_vuc`, `nguoi_ky`, `ds_file`, `file_path`, `do_mat`, `do_khan`, `chuc_vu`, `hinh_thuc_chuyen`, `hinh_thuc_luu`, `nv_nhan`, `han_xu_ly`, `trang_thai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'BC-1', '21/12/2021', 13, 1, '21/12/2021', 'Báo cáo thực hiện trong tuần 10 ( 20/12 - 26/12)', 1, 1, '1', '', NULL, 1, 1, 5, 1, 1, 2, '26/12/2021', NULL, '2021-12-21 05:27:39', '2021-12-21 05:27:39', NULL);

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
  KEY `nguoi_ky` (`nguoi_ky`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_vanban_di`
--

INSERT INTO `tbl_vanban_di` (`id`, `so_vb_di`, `ki_hieu`, `ngay_gui`, `loai`, `hinh_thuc`, `linh_vuc`, `so_trang`, `so_luong`, `trich_yeu`, `nguoi_ky`, `nv_phathanh`, `ds_file`, `file_path`, `chuc_vu`, `noi_gui`, `do_khan`, `hinh_thuc_luu`, `noi_nhan`, `han_xu_ly`, `trang_thai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'BC-1', '21/12/2021', 1, 1, 1, 50, 2, 'Báo cáo tiến độ thực hiện tuần 10', 1, 2, '', NULL, 35, 13, 1, 1, '37', '26/12/2021', NULL, '2021-12-21 05:49:21', '2021-12-21 05:49:21', NULL),
(2, '2', 'BC-2', '30/12/2021', 1, 1, 1, 50, 1, 'Báo cáo tiến độ thực hiện đồ án tuần 11', 1, 2, '', NULL, 13, 37, 1, 1, '13', '02/01/2022', NULL, '2021-12-29 19:04:34', '2021-12-29 19:04:34', NULL),
(3, '3', 'BC-3', '02/01/2022', 1, 1, 1, 50, 2, 'Báo cáo tiến độ thực hiện tuần 11', 1, 1, '15_BT1_C1_1811546141_TruongDuongKhang.docx', NULL, 15, 35, 1, 1, '37', '09/01/2022', NULL, '2022-01-02 18:25:24', '2022-01-02 18:25:24', NULL),
(4, '4', 'BC-4', '02/01/2022', 1, 1, 1, 50, 2, 'Báo cáo tiến độ thực hiện tuần 11', 1, 1, '15_BT1_C1_1811546141_TruongDuongKhang.docx', '/storage/vanBanDi/1/0kmeLu3sYbMl8eFLSIBo.docx', 15, 35, 1, 1, '37', '09/01/2022', NULL, '2022-01-02 18:27:49', '2022-01-02 18:27:49', NULL),
(5, '5', 'BC-5', '02/01/2022', 5, 1, 2, 50, 2, 'Về phòng, chống dịch Covid-19', 1, 1, '1063_CD-TTg_31072021_1-signed.pdf', '/storage/vanBanDi/1/WPhpyC5B5ckqKxeUQEZX.pdf', 6, 25, 2, 2, '33', '09/01/2022', NULL, '2022-01-02 18:35:50', '2022-01-02 18:35:50', NULL),
(6, '6', '68/NQ-CP', '01/07/2021', 7, 1, 1, 50, 10, 'Về một số chính sách hỗ trợ người lao động và người sử dụng lao động gặp khó khăn do đại dịch COVID-19', 1, 2, '68.signed.pdf', '/storage/vanBanDi/2/6sQsFJy7rvZNtqz7jV0B.pdf', 6, 30, 2, 1, '45', '19/01/2022', NULL, '2022-01-02 21:02:48', '2022-01-02 21:02:48', NULL);

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
  `ngay_sinh` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gioi_tinh` tinyint(4) DEFAULT NULL,
  `dia_chi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `so_dt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anh` text COLLATE utf8_unicode_ci,
  `file_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chuc_danh` int(10) UNSIGNED DEFAULT NULL,
  `bo_phan` int(10) UNSIGNED DEFAULT NULL,
  `trang_thai` tinyint(4) DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_chuc_danh_foreign` (`chuc_danh`),
  KEY `users_bo_phan_foreign` (`bo_phan`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `ngay_sinh`, `gioi_tinh`, `dia_chi`, `so_dt`, `anh`, `file_path`, `chuc_danh`, `bo_phan`, `trang_thai`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Trương Dương Khang', 'duonkhangaa@gmail.com', NULL, '$2y$10$n7HThy2oC.bFqonIGkmWD.1t66YIy5dyFIyDB/bcZ1x5cVRDTlLAW', '27/07/2000', 1, 'Phường Linh Đông, TP Thủ Đức, Tp Hồ Chí Minh', '0888780807', 'IMG_20200701_115452.jpg', NULL, NULL, NULL, 1, 'yAksuJ7v9n4iZWjrMsIlDMYRXhjw0W5a1uJThYSegZuyWNXFoQcK9rVA19Lf', '2021-12-17 15:54:43', '2021-12-30 13:51:10'),
(2, 'Huỳnh Hồng Hân', 'honghan1303@gmail.com', NULL, '$2y$10$2O7LXcmX4sMGPEGmOel86u66rfnaHnQo6YszYnaQmII0xlu/ENaIm', '13/03/2000', 0, 'Thị trấn Châu Hưng, Vĩnh Lợi, Bạc Liêu', '0825828346', 'IMG_20200701_115444.jpg', NULL, NULL, NULL, 1, NULL, '2021-12-21 05:03:25', '2021-12-21 05:06:25'),
(3, 'Dương Khang', 'admin@gmail.com', NULL, '$2y$10$chby6rTA.wsxECnbMHUFIecCsa.z.r4WXFnXdaLj85e.u.WnIDe2i', '16/05/2000', 1, 'Phường Linh Đông, TP Thủ Đức, Tp Hồ Chí Minh', '0123456789', 'beauty_20190825164453.jpg', NULL, NULL, NULL, 1, NULL, '2021-12-29 18:09:48', '2021-12-29 19:06:15');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
