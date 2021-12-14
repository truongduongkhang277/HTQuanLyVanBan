-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 10, 2021 at 05:21 PM
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
-- Table structure for table `tbl_chucdanh`
--

DROP TABLE IF EXISTS `tbl_chucdanh`;
CREATE TABLE IF NOT EXISTS `tbl_chucdanh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_quyen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_chucdanh`
--

INSERT INTO `tbl_chucdanh` (`id`, `ten_quyen`, `ghi_chu`, `created_at`, `updated_at`) VALUES
(1, 'Bí thư', 'BT', '2021-12-04 14:43:07', NULL),
(2, 'Cán bộ', 'CB', '2021-12-04 14:43:07', NULL),
(3, 'Cán sự', 'CS', '2021-12-04 14:43:07', NULL),
(4, 'Chánh thanh tra', 'CTTr', '2021-12-04 14:43:07', NULL),
(5, 'Chánh văn phòng', 'CVP', '2021-12-04 14:43:07', NULL),
(6, 'Chi cục Trưởng', 'CCTr', '2021-12-04 14:43:07', NULL),
(7, 'Chỉ huy Trưởng', 'CHTr', '2021-12-04 14:43:07', NULL),
(8, 'Chuyên viên', 'CV', '2021-12-04 14:43:07', NULL),
(9, 'Chủ tịch', 'CT', '2021-12-04 14:43:07', NULL),
(10, 'Công an', 'CA', '2021-12-04 14:43:07', NULL),
(11, 'Công chức', 'CC', '2021-12-04 14:43:07', NULL),
(12, 'Đội phó', 'ĐP', '2021-12-04 14:43:07', NULL),
(13, 'Giám đốc', 'GĐ', '2021-12-04 14:43:07', NULL),
(14, 'Kế toán', 'KT', '2021-12-04 14:43:07', NULL),
(15, 'Nhân viên', 'NV', '2021-12-04 14:43:07', NULL),
(16, 'Phó Chi cục Trưởng', 'P.CCTr', '2021-12-04 14:43:07', NULL),
(17, 'Phó Ban', 'P.B', '2021-12-04 14:43:07', NULL),
(18, 'Phó Bí thư', 'P.BT', '2021-12-04 14:43:07', NULL),
(19, 'Phó Chánh tranh tra', 'P.CTTr', '2021-12-04 14:43:07', NULL),
(20, 'Phó Chủ tịch', 'P.CT', '2021-12-04 14:43:07', NULL),
(21, 'Phó Chánh văn phòng', 'P.CVP', '2021-12-04 14:43:07', NULL),
(22, 'Phó Giám đốc', 'P.GĐ', '2021-12-04 14:43:07', NULL),
(23, 'Phó Trạm y tế', 'P.TYT', '2021-12-04 14:43:07', NULL),
(24, 'Phó Trưởng CA xã', 'P.TCAX', '2021-12-04 14:43:07', NULL),
(25, 'Phó Trưởng đài', 'P.TĐ', '2021-12-04 14:43:07', NULL),
(26, 'Phó Trưởng phòng', 'P.TP', '2021-12-04 14:43:07', NULL),
(27, 'Thương bình - Xã hội', 'TBXH', '2021-12-04 14:43:07', NULL),
(28, 'Tài chính - Kế toán', 'TCKT', '2021-12-04 14:43:07', NULL),
(29, 'Thanh tra viên', 'TTV', '2021-12-04 14:43:07', NULL),
(30, 'Tư pháp - Hộ tịch', 'TPHT', '2021-12-04 14:43:07', NULL),
(31, 'TP_QLDT-Đội trưởng', 'TPQLDT', '2021-12-04 14:43:07', NULL),
(32, 'Trưởng ban', 'TB', '2021-12-04 14:43:07', NULL),
(33, 'Trưởng Công an', 'TCA', '2021-12-04 14:43:07', NULL),
(34, 'Trưởng đài', 'TĐ', '2021-12-04 14:43:07', NULL),
(35, 'Trưởng phòng', 'TP', '2021-12-04 14:43:07', NULL),
(36, 'Trưởng trạm', 'TTr', '2021-12-04 14:43:07', NULL),
(37, 'Văn thư', 'VT', '2021-12-04 14:43:07', NULL),
(38, 'Văn hóa - Xã hội', 'VHXH', '2021-12-04 14:43:07', NULL),
(39, 'Viên chức', 'VC', '2021-12-04 14:43:07', NULL),
(40, 'Địa chính - Xây dựng - Môi trường', 'ĐCXDMT', '2021-12-04 14:43:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coquan`
--

DROP TABLE IF EXISTS `tbl_coquan`;
CREATE TABLE IF NOT EXISTS `tbl_coquan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_co_quan` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_coquan`
--

INSERT INTO `tbl_coquan` (`id`, `ten_co_quan`, `dia_chi`, `ghi_chu`, `created_at`, `updated_at`) VALUES
(1, 'Ban an toàn giao thông', 'Phường 3, Tp. Bạc Liêu, Bạc Liêu', 'BLU_BATGT', '2021-12-03 18:52:00', NULL),
(2, 'Ban bồi thường Giải phóng mặt bằng', 'Bạc Liêu', 'BLU_BBTGPMB', '2021-12-03 18:52:00', NULL),
(3, 'Ban Dân tộc và Tôn giáo tỉnh', 'Số 102 Bà Triệu, Phường 3, TP Bạc Liêu, Bạc Liêu', 'BLU_BDTTGT', '2021-12-03 18:52:00', NULL),
(4, 'Ban QLDA công trình giao thông tỉnh', 'Bạc Liêu', 'BLU_CTGT', '2021-12-03 18:52:00', NULL),
(5, 'Ban QLDA ĐTXD công trình dân dụng và công nghiệp', 'Phường 3, Tp. Bạc Liêu, Bạc Liêu', 'BLU_CTDDCNT', '2021-12-03 18:52:00', NULL),
(6, 'Ban QLDA nông nghiệp và phát triển nông thôn', '56, Nguyễn Huệ, Phường 3, Thành Phố Bạc Liêu, Tỉnh Bạc Liêu', 'BLU_CTNNPTNT', '2021-12-03 18:52:00', NULL),
(7, 'Ban Quản lý các Khu công nghiệp tỉnh', '48 Bà Triệu, Phường 3, TP Bạc Liêu, Bạc Liêu', 'BLU_KCNT', '2021-12-03 18:52:00', NULL),
(8, 'Bảo hiểm Xã hội tỉnh', 'Đường Trần Huỳnh, Phường 1, TP Bạc Liêu, Bạc Liêu', 'BLU_BHXH', '2021-12-03 18:52:00', NULL),
(9, 'Bộ chỉ huy biên phòng tỉnh', 'số 506 Cao Văn Lầu, Phường 2, TP Bạc Liêu, Bạc Liêu', 'BLU_BCHBPT', '2021-12-03 18:52:00', NULL),
(10, 'BQL Khu nông nghiệp ứng dụng CNC phát triển tôm', 'Bạc Liêu', 'BLU_KNNUDCNCPTTT', '2021-12-03 18:52:00', NULL),
(11, 'Công an tỉnh', '78 Lê Duẩn, Phường 1, TP Bạc Liêu, Bạc Liêu', 'BLU_CAT', '2021-12-03 18:52:00', NULL),
(12, 'Cục Thống kê tỉnh', '35b Bà Triệu, Phường 3, Tp. Bạc Liêu, Bạc Liêu', 'BLU_CTK', '2021-12-03 18:52:00', NULL),
(13, 'Đài Phát thanh - Truyền hình tỉnh', '410 23 Tháng 8, Phường 8, Tp. Bạc Liêu, Bạc Liêu', 'BLU_DPTTHT', '2021-12-03 18:52:00', NULL),
(14, 'Hội chữ thập đỏ', '104, Đường Hai Bà Trưng, Phường 3, Tp. Bạc Liêu, Bạc Liêu', 'BLU_HCTD', '2021-12-03 18:52:00', NULL),
(15, 'Hội Liên hiệp Phụ nữ tỉnh', '4 Cơ Quan Đoàn Thể, Khu Hành Chánh Tỉnh, Đường Nguyễn Tất Thành, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 'BLU_HLHPNT', '2021-12-03 18:52:00', NULL),
(16, 'Hội Nông dân tỉnh', '56 Bà Triệu, Phường 3, Tp. Bạc Liêu, Bạc Liêu', 'BLU_HNDT', '2021-12-03 18:52:00', NULL),
(17, 'Sở Công Thương', '7 D. Nguyễn Tất Thành, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 'BLU_SCT', '2021-12-03 18:52:00', NULL),
(18, 'Sở Giáo dục, Khoa học và Công nghệ', '6 D. Nguyễn Tất Thành, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 'BLU_SGDKHCN', '2021-12-03 18:52:00', NULL),
(19, 'Sở Giao thông vận tải', ' 6 D. Nguyễn Tất Thành, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 'BLU_SGTVT', '2021-12-03 18:52:00', NULL),
(20, 'Sở Kế hoạch và Đầu Tư', 'Trung Tâm Hành Chính, Võ Thị Chính, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 'BLU_SKHDT', '2021-12-03 18:52:00', NULL),
(21, 'Sở Lao động - Thương binh và Xã hội', '52/3 đường Hùng Vương, Phường 7, Tp. Bạc Liêu, Bạc Liêu', 'BLU_SLDTBXH', '2021-12-03 18:52:00', NULL),
(22, 'Sở Nội vụ', 'Phường 1, Tp. Bạc Liêu, Bạc Liêu', 'BLU_SNV', '2021-12-03 18:52:00', NULL),
(23, 'Sở Nông nghiệp và Phát triển nông thôn', '8 D. Nguyễn Tất Thành, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 'BLU_SNNPTNT', '2021-12-03 18:52:00', NULL),
(24, 'Sở Tài chính', 'Nguyễn Bỉnh Khiêm, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 'BLU_STC', '2021-12-03 18:52:00', NULL),
(25, 'Sở Tài nguyên và Môi trường', '78 Lê Duẩn, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 'BLU_STNMT', '2021-12-03 18:52:01', NULL),
(26, 'Sở Tư pháp', 'Nguyễn Tất Thành, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 'BLU_STP', '2021-12-03 18:53:55', NULL),
(27, 'Sở Văn hóa, Thông tin, thể thao và Du lịch', '16 D. Nguyễn Tất Thành, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 'BLU_SVHTTTTDL', '2021-12-03 18:53:55', NULL),
(28, 'Sở Xây dựng', 'Nguyễn Tất Thành, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 'BLU_SXD', '2021-12-03 18:53:55', NULL),
(29, 'Sở Y tế', 'Số 07 D. Nguyễn Tất Thành, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 'BLU_SYT', '2021-12-03 18:53:55', NULL),
(30, 'Thanh tra tỉnh', 'Trần Văn Sớm, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 'BLU_TTT', '2021-12-03 18:53:55', NULL),
(31, 'Trung tâm Dịch vụ Đô thị tỉnh Bạc Liêu', '80 Hai Bà Trưng, Phường 3, Tp. Bạc Liêu, Bạc Liêu', 'BLU_TTDVDTT', '2021-12-03 18:53:55', NULL),
(32, 'Trung tâm Phát triển Quỹ Nhà và Đất', 'Số 02 Hòa Bình, Phường 7, Tp. Bạc Liêu, Bạc Liêu', 'BLU_TTPTQND', '2021-12-03 18:53:55', NULL),
(33, 'Trung tâm Xúc tiến Đầu tư Thương mại & Du lịch', '56 Nguyễn Huệ, Phường 3, Tp. Bạc Liêu, Bạc Liêu', 'BLU_TTXTDT', '2021-12-03 18:53:55', NULL),
(34, 'Trường Cao đẳng Kinh tế - Kỹ thuật Bạc Liêu', '10 Tôn Đức Thắng, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 'BLU_TCDKTKTBL', '2021-12-03 18:53:55', NULL),
(35, 'Trường Cao đẳng Nghề Bạc Liêu', '68 Tôn Đức Thắng, Phường 1, Tp. Bạc Liêu, Bạc Liêu', 'BLU_TCDNBL', '2021-12-03 18:53:55', NULL),
(36, 'Trường Cao đẳng Y tế Bạc Liêu', '1 Đoàn Thị Điểm, Phường 3, Tp. Bạc Liêu, Bạc Liêu', 'BLU_TCDYTBL', '2021-12-03 18:53:55', NULL),
(37, 'Trường Đại học Bạc Liêu', '108 Võ Thị Sáu, Phường 8, Tp. Bạc Liêu, Bạc Liêu', 'BLU_TDHBL', '2021-12-03 18:53:55', NULL),
(38, 'UBND huyện Đông Hải', 'Gành Hào, Đông Hải, Bạc Liêu', 'BLU_UBNDHDH', '2021-12-03 18:53:55', NULL),
(39, 'UBND huyện Hòa Bình', '354 QL1A, Hoà Bình, Bạc Liêu', 'BLU_UBNDHHB', '2021-12-03 18:53:55', NULL),
(40, 'UBND huyện Hồng Dân', 'Ấp Nội Ô, Hồng Dân, Bạc Liêu', 'BLU_UBNDHHD', '2021-12-03 18:53:55', NULL),
(41, 'UBND thị xã Giá Rai', 'QL1A, TT. Giá Rai, Giá Rai, Bạc Liêu', 'BLU_UBNDTXGR', '2021-12-03 18:53:55', NULL),
(42, 'UBND huyện Phước Long', 'TT Phước Long, Phước Long, Bạc Liêu', 'BLU_UBNDHPL', '2021-12-03 18:53:55', NULL),
(43, 'UBND huyện Vĩnh Lợi', 'TT Châu Hưng, Vĩnh Lợi, Bạc Liêu', 'BLU_UBNDHVL', '2021-12-03 18:53:55', NULL),
(44, 'UBND thành phố Bạc Liêu', '20 Trần Phú, Phường 3, TP Bạc Liêu, Bạc Liêu', 'BLU_UBNDTPBL', '2021-12-03 18:53:55', NULL),
(45, 'UBND Tỉnh Bạc Liêu', '5 D. Nguyễn Tất Thành, Phường 1, TP Bạc Liêu, Bạc Liêu', 'BLU_TINHBACLIEU', '2021-12-03 18:53:55', NULL),
(46, 'Văn phòng Đoàn ĐBQH và HĐND tỉnh', 'Số 10 D. Nguyễn Tất Thành, Phường 1, TP Bạc Liêu, Bạc Liêu', 'BLU_VPHDND', '2021-12-03 18:56:28', NULL),
(47, 'Văn phòng Tỉnh ủy', 'Đường Nguyễn Tất Thành, Phường 1, TP Bạc Liêu, Bạc Liêu', 'BLU_VPTU', '2021-12-03 18:58:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokhan`
--

DROP TABLE IF EXISTS `tbl_dokhan`;
CREATE TABLE IF NOT EXISTS `tbl_dokhan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `do_khan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ghi_chu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_dokhan`
--

INSERT INTO `tbl_dokhan` (`id`, `do_khan`, `ghi_chu`, `created_at`, `updated_at`) VALUES
(1, 'Thường', 'Độ khẩn thường', '2021-12-04 14:47:26', NULL),
(2, 'Khẩn', NULL, '2021-12-04 14:47:26', NULL),
(3, 'Thượng khẩn', NULL, '2021-12-04 14:47:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_domat`
--

DROP TABLE IF EXISTS `tbl_domat`;
CREATE TABLE IF NOT EXISTS `tbl_domat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `do_mat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ghi_chu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_domat`
--

INSERT INTO `tbl_domat` (`id`, `do_mat`, `ghi_chu`, `created_at`, `updated_at`) VALUES
(1, 'Thường', NULL, '2021-12-04 14:47:48', NULL),
(2, 'Mật', NULL, '2021-12-04 14:47:48', NULL),
(3, 'Tuyệt mật', NULL, '2021-12-04 14:48:05', NULL),
(4, 'Tối mật', NULL, '2021-12-04 14:48:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hinhthuc`
--

DROP TABLE IF EXISTS `tbl_hinhthuc`;
CREATE TABLE IF NOT EXISTS `tbl_hinhthuc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hinh_thuc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ghi_chu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_hinhthuc`
--

INSERT INTO `tbl_hinhthuc` (`id`, `hinh_thuc`, `ghi_chu`, `created_at`, `updated_at`) VALUES
(1, 'Văn bản mới', NULL, '2021-12-04 14:48:34', NULL),
(2, 'Thu hồi', NULL, '2021-12-04 14:48:34', NULL),
(3, 'Thay thế', NULL, '2021-12-04 14:49:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hinhthuc_chuyen`
--

DROP TABLE IF EXISTS `tbl_hinhthuc_chuyen`;
CREATE TABLE IF NOT EXISTS `tbl_hinhthuc_chuyen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hinh_thuc_chuyen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ghi_chu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_hinhthuc_chuyen`
--

INSERT INTO `tbl_hinhthuc_chuyen` (`id`, `hinh_thuc_chuyen`, `ghi_chu`, `created_at`, `updated_at`) VALUES
(1, 'Trao tay', NULL, '2021-12-10 16:43:43', '2021-12-10 16:43:43'),
(2, 'Bưu điện', NULL, '2021-12-10 16:43:43', '2021-12-10 16:43:43'),
(3, 'Email', NULL, '2021-12-10 16:43:43', '2021-12-10 16:43:43'),
(4, 'Liên thông', NULL, '2021-12-10 16:43:43', '2021-12-10 16:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hinhthuc_luu`
--

DROP TABLE IF EXISTS `tbl_hinhthuc_luu`;
CREATE TABLE IF NOT EXISTS `tbl_hinhthuc_luu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hinh_thuc_luu` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ghi_chu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_hinhthuc_luu`
--

INSERT INTO `tbl_hinhthuc_luu` (`id`, `hinh_thuc_luu`, `ghi_chu`, `created_at`, `updated_at`) VALUES
(1, 'Bản gốc văn bản', NULL, '2021-12-10 16:44:56', NULL),
(2, 'Sao Y', NULL, '2021-12-10 16:44:56', NULL),
(3, 'Sao lục', NULL, '2021-12-10 16:45:30', NULL),
(4, 'Trích sao', NULL, '2021-12-10 16:45:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_linhvuc`
--

DROP TABLE IF EXISTS `tbl_linhvuc`;
CREATE TABLE IF NOT EXISTS `tbl_linhvuc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `linh_vuc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ghi_chu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_linhvuc`
--

INSERT INTO `tbl_linhvuc` (`id`, `linh_vuc`, `ghi_chu`, `created_at`, `updated_at`) VALUES
(1, 'Văn phòng', NULL, '2021-12-10 16:45:54', NULL),
(2, 'Kỹ thuật', NULL, '2021-12-10 16:45:54', NULL),
(3, 'Nội dung', NULL, '2021-12-10 16:46:12', NULL),
(4, 'Khác', NULL, '2021-12-10 16:46:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nguoidung`
--

DROP TABLE IF EXISTS `tbl_nguoidung`;
CREATE TABLE IF NOT EXISTS `tbl_nguoidung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_dang_nhap` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ho_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_sinh` datetime DEFAULT NULL,
  `gioi_tinh` tinyint(1) DEFAULT NULL,
  `dia_chi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `so_dt` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anh` text COLLATE utf8_unicode_ci,
  `chuc_danh` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_nv_quyen` (`chuc_danh`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theloai`
--

DROP TABLE IF EXISTS `tbl_theloai`;
CREATE TABLE IF NOT EXISTS `tbl_theloai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_loai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ghi_chu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_theloai`
--

INSERT INTO `tbl_theloai` (`id`, `ten_loai`, `ghi_chu`, `created_at`, `updated_at`) VALUES
(1, 'Báo cáo', 'bc', '2021-12-03 19:05:32', NULL),
(2, 'Báo cáo nhanh', 'bcn', '2021-12-03 19:06:23', NULL),
(3, 'Biên bản', 'bb', '2021-12-03 19:07:19', NULL),
(4, 'Chương trình', 'ctr', '2021-12-03 19:08:48', NULL),
(5, 'Chỉ thị', 'ct', '2021-12-03 19:09:28', NULL),
(6, 'Công hàm', 'ch', '2021-12-03 19:10:10', NULL),
(7, 'Nghị quyết', 'NQ', '2021-12-03 19:10:29', NULL),
(8, 'Quyết định', 'QĐ', '2021-12-03 19:11:59', NULL),
(9, 'Quy chế', 'QC', '2021-12-03 19:12:47', NULL),
(10, 'Quy định', 'QYĐ', '2021-12-03 19:13:26', NULL),
(11, 'Thông cáo', 'TC', '2021-12-03 19:14:12', NULL),
(12, 'Thông báo', 'TB', '2021-12-03 19:16:35', NULL),
(13, 'Hướng dẫn', 'HD', '2021-12-03 19:16:33', NULL),
(14, 'Kế hoạch', 'KH', '2021-12-03 19:17:31', NULL),
(15, 'Phương án', 'PA', '2021-12-03 19:18:50', NULL),
(16, 'Đề án', 'ĐA', '2021-12-03 19:19:26', NULL),
(17, 'Dự án', 'DA', '2021-12-03 19:20:05', NULL),
(18, 'Tờ trình', 'TTr', '2021-12-03 19:21:15', NULL),
(19, 'Hợp đồng', 'HĐ', '2021-12-03 19:22:04', NULL),
(20, 'Công văn', 'CV', '2021-12-03 19:23:51', NULL),
(21, 'Công điện', 'CĐ', '2021-12-03 19:24:21', NULL),
(22, 'Bản ghi nhớ', 'BGN', '2021-12-03 19:25:13', NULL),
(23, 'Bản thỏa thuận', 'BTT', '2021-12-03 19:26:15', NULL),
(24, 'Giấy ủy quyền', 'GUQ', '2021-12-03 19:27:46', NULL),
(25, 'Giấy mời', 'GM', '2021-12-03 19:28:12', NULL),
(26, 'Giấy giới thiệu', 'GGT', '2021-12-03 19:29:08', NULL),
(27, 'Giấy nghỉ phép', 'GNP', '2021-12-03 19:30:22', NULL),
(28, 'Phiếu gửi', 'PG', '2021-12-03 19:31:46', NULL),
(29, 'Phiếu chuyển', 'PC', '2021-12-03 19:32:29', NULL),
(30, 'Phiếu báo', 'PB', '2021-12-03 19:33:47', NULL),
(31, 'Thư công', 'ThC', '2021-12-03 19:34:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trangthai`
--

DROP TABLE IF EXISTS `tbl_trangthai`;
CREATE TABLE IF NOT EXISTS `tbl_trangthai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trang_thai` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_trangthai`
--

INSERT INTO `tbl_trangthai` (`id`, `trang_thai`, `ghi_chu`, `created_at`, `updated_at`) VALUES
(1, 'Tiếp nhận văn bản đến', 'Văn thư tiếp nhận văn bản đến từ cơ quan ngoài.', '2021-12-10 16:49:06', NULL),
(2, 'Tiếp nhận văn bản đến', 'Văn thư tiếp nhận văn bản đến từ cơ quan ngoài.', '2021-12-10 17:02:05', NULL),
(3, 'Trình lãnh đạo đơn vị', 'Văn thư chuyển văn bản đến vừa tiếp nhận cho lãnh đạo đơn vị xem xét.', '2021-12-10 17:02:05', NULL),
(4, 'Lãnh đạo đơn vị yêu cầu giải quyết', 'Lãnh đạo đơn vị chuyển văn bản đến vừa tiếp nhận cho cấp dưới để xử lý.', '2021-12-10 17:02:05', NULL),
(5, 'Văn bản đến chờ xử lý', 'Văn bản đến trong trạng thái chờ đơn vị xử lý.', '2021-12-10 17:02:05', NULL),
(6, 'Văn bản đến đã xử lý', 'Văn bản đến đã được xử lý.', '2021-12-10 17:02:05', NULL),
(7, 'Văn bản đi đã ban hành', 'Văn bản đi đã được đơn vị ban hành.', '2021-12-10 17:02:05', NULL),
(8, 'Văn bản đi đã xử lý', 'Văn bản đi đã được xử lý.', '2021-12-10 17:02:05', NULL),
(9, 'Văn bản đi chờ xử lý', 'Văn bản đi trong trạng thái chờ đơn vị xử lý.', '2021-12-10 17:02:05', NULL),
(10, 'Lãnh đạo đơn vị yêu cầu xử lý', 'Lãnh đạo đơn vị chuyển văn bản đi cần xử lý cho cấp dưới để xử lý.', '2021-12-10 17:02:05', NULL),
(11, 'Ban hành văn bản đi', 'Lãnh đạo đơn vị chuyển văn bản đi cần ban hành cho văn thư để chuyển ra cơ quan khác.', '2021-12-10 17:02:05', NULL),
(12, 'Ban hành văn bản đi', 'Văn thư ban hành văn bản đi ra cơ quan khác.', '2021-12-10 17:02:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vanban_den`
--

DROP TABLE IF EXISTS `tbl_vanban_den`;
CREATE TABLE IF NOT EXISTS `tbl_vanban_den` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `so_vb_den` int(11) NOT NULL,
  `ki_hieu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_nhan` datetime NOT NULL,
  `don_vi_ban_hanh` int(11) NOT NULL,
  `hinh_thuc` int(11) NOT NULL,
  `ngay_vb` datetime NOT NULL,
  `trich_yeu` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `loai` int(11) NOT NULL,
  `linh_vuc` int(11) NOT NULL,
  `nguoi_ky` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ds_file` text COLLATE utf8_unicode_ci NOT NULL,
  `do_mat` int(11) NOT NULL,
  `do_khan` int(11) NOT NULL,
  `chuc_vu` int(11) NOT NULL,
  `hinh_thuc_chuyen` int(11) NOT NULL,
  `hinh_thuc_luu` int(11) NOT NULL,
  `nv_nhan` int(11) NOT NULL,
  `han_xu_ly` date NOT NULL,
  `trang_thai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vanban_di`
--

DROP TABLE IF EXISTS `tbl_vanban_di`;
CREATE TABLE IF NOT EXISTS `tbl_vanban_di` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `so_vb_di` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `trich_yeu` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_vb` datetime NOT NULL,
  `nguoi_ky` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ki_hieu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hinh_thuc` int(11) NOT NULL,
  `loai` int(11) NOT NULL,
  `do_mat` int(11) NOT NULL,
  `do_khan` int(11) NOT NULL,
  `ds_file` text COLLATE utf8_unicode_ci NOT NULL,
  `so_trang` int(11) NOT NULL,
  `ngay_gui` datetime NOT NULL,
  `noi_nhan` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_vbdi_cq` (`noi_nhan`),
  KEY `fk_vb_hinhthuc` (`hinh_thuc`),
  KEY `fk_vb_loai` (`loai`),
  KEY `fk_vb_domat` (`do_mat`),
  KEY `fk_vb_dokhan` (`do_khan`),
  KEY `fk_vb_trangthai` (`trang_thai`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yeucaugiaiquyet_vbden`
--

DROP TABLE IF EXISTS `tbl_yeucaugiaiquyet_vbden`;
CREATE TABLE IF NOT EXISTS `tbl_yeucaugiaiquyet_vbden` (
  `ma_yeu_cau` int(11) NOT NULL AUTO_INCREMENT,
  `han_giai_quyet` datetime NOT NULL,
  `han_thu_hoi` datetime DEFAULT NULL,
  `noi_dung` text COLLATE utf8_unicode_ci NOT NULL,
  `chu_tri` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `phoi_hop` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ma_nv` int(11) NOT NULL,
  `ma_ld` int(11) NOT NULL,
  `so_vb_den` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ma_yeu_cau`),
  KEY `fk_yc_nv_giaiquyet` (`ma_nv`),
  KEY `fk_yc_ld_giaiquyet` (`ma_ld`),
  KEY `fk_yc_giaiquyet_vbden` (`so_vb_den`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yeucauxuly_vbdi`
--

DROP TABLE IF EXISTS `tbl_yeucauxuly_vbdi`;
CREATE TABLE IF NOT EXISTS `tbl_yeucauxuly_vbdi` (
  `ma_yeu_cau` int(11) NOT NULL AUTO_INCREMENT,
  `han_xu_ly` datetime NOT NULL,
  `han_thu_hoi` datetime DEFAULT NULL,
  `noi_dung` text COLLATE utf8_unicode_ci NOT NULL,
  `chu_tri` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `phoi_hop` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ma_nv` int(11) NOT NULL,
  `ma_ld` int(11) NOT NULL,
  `so_vb_di` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ma_yeu_cau`),
  KEY `fk_yc_nv_xuly` (`ma_nv`),
  KEY `fk_yc_ld_xuly` (`ma_ld`),
  KEY `fk_yc_xuly_vbdi` (`so_vb_di`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
