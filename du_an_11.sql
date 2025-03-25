-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 25, 2025 at 07:02 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `du_an_11`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luans`
--

CREATE TABLE `binh_luans` (
  `id` int NOT NULL,
  `nguoi_dung_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `binh_luan` text NOT NULL,
  `ngay_dang` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `id` int NOT NULL,
  `don_hang_id` int DEFAULT NULL,
  `san_pham_id` int DEFAULT NULL,
  `don_gia` decimal(10,2) NOT NULL,
  `so_luong` int NOT NULL,
  `thanh_tien` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chi_tiet_don_hangs`
--

INSERT INTO `chi_tiet_don_hangs` (`id`, `don_hang_id`, `san_pham_id`, `don_gia`, `so_luong`, `thanh_tien`) VALUES
(1, 3, 6, '12245.00', 1, '12336.00'),
(2, 3, 7, '1224555.00', 1, '42952.00'),
(3, 4, 10, '3900000.00', 2, '75000000.00'),
(4, 4, 8, '900000.00', 1, '999000.00'),
(5, 16, 1, '11000000.00', 1, '11000000.00'),
(6, 18, 2, '15000000.00', 3, '45000000.00'),
(7, 19, 1, '11000000.00', 1, '11000000.00'),
(8, 19, 2, '15000000.00', 1, '15000000.00'),
(9, 20, 23, '20000000.00', 1, '20000000.00'),
(10, 21, 2, '15000000.00', 1, '15000000.00'),
(11, 22, 23, '20000000.00', 1, '20000000.00'),
(12, 23, 1, '11000000.00', 3, '33000000.00'),
(13, 24, 3, '18000000.00', 1, '18000000.00');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_gio_hangs`
--

CREATE TABLE `chi_tiet_gio_hangs` (
  `id` int NOT NULL,
  `gio_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `so_luong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danh_gia`
--

CREATE TABLE `danh_gia` (
  `id` int NOT NULL,
  `danh_gia` tinyint NOT NULL,
  `nguoi_dung_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `ngay_dang` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `danh_gia`
--

INSERT INTO `danh_gia` (`id`, `danh_gia`, `nguoi_dung_id`, `san_pham_id`, `ngay_dang`, `trang_thai`) VALUES
(1, 5, 6, 6, '2024-11-11 17:00:00', 1),
(2, 4, 34, 7, '2024-11-03 17:00:00', 1),
(3, 5, 5, 7, '2024-11-02 17:00:00', 1),
(4, 4, 5, 7, '2024-11-02 17:00:00', 1),
(5, 4, 34, 6, '2024-11-25 13:39:53', 1),
(6, 3, 31, 6, '2024-11-25 13:40:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `id` int NOT NULL,
  `ten_danh_muc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danh_mucs`
--

INSERT INTO `danh_mucs` (`id`, `ten_danh_muc`) VALUES
(1, 'DELL'),
(2, 'ACER'),
(3, 'HP'),
(4, 'Lenovo'),
(11, 'MAC');

-- --------------------------------------------------------

--
-- Table structure for table `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` int NOT NULL,
  `ma_don_hang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nguoi_dung_id` int DEFAULT NULL,
  `ten_nguoi_nhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sdt_nguoi_nhan` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_nguoi_nhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dia_chi_nguoi_nhan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ghi_chu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `tong_tien` decimal(10,2) NOT NULL,
  `trang_thai_don_hang_id` int DEFAULT NULL,
  `phuong_thuc_thanh_toan_id` int DEFAULT NULL,
  `trang_thai_thanh_toan_id` int DEFAULT NULL,
  `ngay_dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `ma_don_hang`, `nguoi_dung_id`, `ten_nguoi_nhan`, `sdt_nguoi_nhan`, `email_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ghi_chu`, `tong_tien`, `trang_thai_don_hang_id`, `phuong_thuc_thanh_toan_id`, `trang_thai_thanh_toan_id`, `ngay_dat`) VALUES
(12, 'DH001', 10, 'lam', '0123456789', 'nguyenvana@example.com', '123 Đường ABC, Quận 1, TP.HCM', 'Giao buổi sáng', '1500000.00', 5, 1, 2, '2024-11-20 18:00:00'),
(13, 'DH002', 12, 'Trường', '0987654321', 'tranthib@example.com', '456 Đường XYZ, Quận 2, TP.HCM', 'Hàng lỗi', '2000000.00', 7, 2, 2, '2024-11-23 07:00:00'),
(14, 'DH003', 10, 'lam', '0123456789', 'nguyenvana@example.com', '123 Đường ABC, Quận 1, TP.HCM', 'Giao buổi chiều', '1500000.00', 3, 1, 2, '2024-11-24 01:00:00'),
(15, 'DH5673', 17, 'admin', '0966957311', 'truongndph50320@gmail.com', 'Hà Nội', 'sdbgsgs', '30000.00', 1, 1, 1, '2024-11-30 15:29:39'),
(16, 'DH9077', 17, 'admin', '0966957311', 'truongndph50320@gmail.com', 'Hà Nội', 'sdbgsgs', '11030000.00', 7, 1, 1, '2024-11-30 15:30:16'),
(18, 'DH2364', 17, 'admin', '0966957311', 'truongndph50320@gmail.com', 'Hà Nội', 'sehsrwye5', '45030000.00', 7, 1, 1, '2024-11-30 22:28:09'),
(19, 'DH2050', 17, 'admin', '0966957311', 'truongndph50320@gmail.com', 'Hà Nội', 'aqcw', '26030000.00', 5, 1, 1, '2024-12-01 23:12:09'),
(20, 'DH8683', 17, 'admin', '0966957311', 'truongndph50320@gmail.com', 'Hà Nội', '', '20030000.00', 1, 1, 1, '2024-12-05 02:51:21'),
(21, 'DH9733', 23, 'admin123', '0966957312', 'admin1a@gmail.com', 'hà nội', 'sdgrewsg', '15030000.00', 7, 1, 1, '2024-12-05 08:51:38'),
(22, 'DH6454', 24, 'admin1234', '0777966573', 'admin12a@gmail.com', 'hà nội', 'zxvs', '20030000.00', 7, 1, 1, '2024-12-05 08:56:12'),
(23, 'DH2480', 26, 'Nguyen', '0966957314', 'admin1@gmail.com', 'hà nội', 'Giao sang', '33030000.00', 7, 1, 1, '2024-12-05 21:44:08'),
(24, 'DH4292', 27, 'Nguyen12', '0966957316', 'admin133@gmail.com', 'hà nội', 'cfhfd', '18030000.00', 5, 1, 1, '2024-12-05 23:48:22');

-- --------------------------------------------------------

--
-- Table structure for table `gio_hangs`
--

CREATE TABLE `gio_hangs` (
  `id` int NOT NULL,
  `tai_khoan_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gio_hangs`
--

INSERT INTO `gio_hangs` (`id`, `tai_khoan_id`) VALUES
(10, 17),
(11, 23),
(12, 24),
(13, 26),
(14, 27),
(8, 50),
(9, 52);

-- --------------------------------------------------------

--
-- Table structure for table `khuyen_mais`
--

CREATE TABLE `khuyen_mais` (
  `id` int NOT NULL,
  `ten_khuyen_mai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ma_khuyen_mai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gia_tri` decimal(10,2) NOT NULL,
  `ngay_bat_dau` date NOT NULL,
  `ngay_ket_thuc` date NOT NULL,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khuyen_mais`
--

INSERT INTO `khuyen_mais` (`id`, `ten_khuyen_mai`, `ma_khuyen_mai`, `gia_tri`, `ngay_bat_dau`, `ngay_ket_thuc`, `mo_ta`, `trang_thai`) VALUES
(1, 'Giảm 30%', 'giam30', '2314.00', '2024-11-06', '2024-11-26', 'kk', 1),
(2, 'Giảm 15k', 'GG2011', '120000.00', '2024-11-19', '2024-11-21', '20/11', 1),
(3, 'Giảm 50%', 'sss2222', '44444.00', '2024-11-13', '2024-11-23', '20/11/2024', 1),
(4, 'Giảm 20%', 'GG2011', '444444.00', '2024-11-21', '2024-11-26', 'sâsas', 1),
(6, 'FreeShip', 'MSDFG65', '4000000.00', '2024-11-28', '2024-12-05', 'azeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lien_hes`
--

CREATE TABLE `lien_hes` (
  `id` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `noi_dung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trang_thai` tinyint DEFAULT '1',
  `ten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sdt` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dungs`
--

CREATE TABLE `nguoi_dungs` (
  `id` int NOT NULL,
  `ten_nguoi_dung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ho_va_ten` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sdt` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dia_chi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `mat_khau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `gioi_tinh` tinyint(1) NOT NULL,
  `thoi_gian_tao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `vai_tro` tinyint(1) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nguoi_dungs`
--

INSERT INTO `nguoi_dungs` (`id`, `ten_nguoi_dung`, `ho_va_ten`, `email`, `sdt`, `dia_chi`, `mat_khau`, `ngay_sinh`, `gioi_tinh`, `thoi_gian_tao`, `avatar`, `vai_tro`, `trang_thai`) VALUES
(10, 'lam', 'lâm', 'duclamx18@gmail.com', '0966957311', 'Hà Nội', '25d55ad283aa400af464c76d713c07ad', '2024-11-29', 0, '2024-11-11 05:13:13', 'uploads/avatars/51242_tai_nghe_e_dra_eh412_pro_71_led_rgb_usb_0001_1.jpg', 0, 1),
(12, 'Trường', 'Nguyễn Đức Trường', 'thoakhanh01041994y05@hotmail.com', '0966957311', 'Hà Nội', '25d55ad283aa400af464c76d713c07ad', '2024-11-15', 1, '2024-11-20 05:50:06', 'uploads/avatars/84455_may_choi_game_cam_tay_lenovo_legion_go_8apu1_2.jpg', 0, 1),
(17, 'admin', 'Nguyễn Đức Trường', 'truongndph50320@gmail.com', '0966957311', 'Hà Nội', 'c4ca4238a0b923820dcc509a6f75849b', '2024-12-13', 1, '2024-11-30 22:26:38', 'uploads/avatars/1733393582_51242_tai_nghe_e_dra_eh412_pro_71_led_rgb_usb_0001_1.jpg', 0, 1),
(23, 'admin123', 'Nguyễn Đức Trường', 'admin1a@gmail.com', '0966957312', 'Hà Nội', 'd41d8cd98f00b204e9800998ecf8427e', '2024-12-11', 1, '2024-12-05 15:49:14', 'uploads/avatars/1733414868_84455_may_choi_game_cam_tay_lenovo_legion_go_8apu1_2.jpg', 1, 1),
(24, 'admin1234', 'Nguyễn Đức Trường', 'admin12a@gmail.com', '0777966573', 'Hà Nội', 'd41d8cd98f00b204e9800998ecf8427e', '2024-12-12', 1, '2024-12-05 15:54:22', 'uploads/avatars/1733414892_ghe-game-EDRA-DIGNITY-egc234-h5.jpg', 1, 1),
(26, 'Nguyen', 'Tạ Trung Nguyên', 'admin1@gmail.com', '0966957314', NULL, 'da4da198bde061b696fa2d782ded73e3', NULL, 1, '2024-12-06 04:41:23', '/uploads/avatars/images.jpg', 1, 1),
(27, 'Nguyen12', 'Tạ Trung Nguyên', 'admin133@gmail.com', '0966957316', NULL, '70873e8580c9900986939611618d7b1e', NULL, 1, '2024-12-06 06:43:42', '/uploads/avatars/images.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `phuong_thuc_thanh_toan`
--

CREATE TABLE `phuong_thuc_thanh_toan` (
  `id` int NOT NULL,
  `ten_phuong_thuc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phuong_thuc_thanh_toan`
--

INSERT INTO `phuong_thuc_thanh_toan` (`id`, `ten_phuong_thuc`) VALUES
(1, 'COD'),
(2, 'VNPay');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ma_san_pham` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int NOT NULL,
  `name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `description` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ram` varchar(355) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `storage` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(15,2) NOT NULL,
  `sku` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `stock_quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ma_san_pham`, `product_id`, `name`, `brand`, `category_id`, `description`, `ram`, `storage`, `color`, `image_url`, `price`, `sku`, `status`, `stock_quantity`) VALUES
('P001', 1, 'Laptop Dell Inspiron', 'DELL', 11, 'Máy tính xách tay phổ thông', '8GB', '256GB', 'Xám', 'uploads/a1.jpg', '11000000.00', 'D12345', 1, 6),
('P002', 2, 'Laptop Acer Aspire', 'ACER', 2, 'Máy tính xách tay văn phòng', '8GB', '512GB', 'Đen', 'uploads/OIP (6).jpg', '15000000.00', 'A12345', 0, 15),
('P003', 3, 'Laptop HP Pavilion', 'HP', 3, 'Máy tính xách tay đa dụng', '16GB', '1TB', 'Bạc', 'uploads/a1.jpg', '18000000.00', 'H12345', 1, 14),
('P004', 20, 'Laptop Asus Vivobook', 'Asus', 1, 'Máy tính xách tay đa năng dành cho sinh viên', '8GB', '512GB', 'Trắng', 'uploads/a2.jpg', '12000000.00', 'AS12345', 1, 25),
('P006', 22, 'Lenovo ThinkPad X1 Carbon', 'Lenovo', 2, 'Máy tính doanh nhân mỏng nhẹ', '16GB', '1TB', 'Đen', 'uploads/a4.jpg', '45000000.00', 'TP12345', 1, 10),
('P007', 23, 'Laptop Lenovo Gaming GF63', 'Lenovo', 4, 'Laptop chơi game mạnh mẽ', '16GB', '512GB', 'Đỏ', 'uploads/a5.jpg', '20000000.00', 'MS12345', 1, 28),
('P008', 24, 'Dell XPS 13', 'Dell', 1, 'Laptop cao cấp với thiết kế hiện đại', '16GB', '512GB', 'Bạc', 'uploads/a5.jpg', '35000000.00', 'DX12345', 1, 12),
('P009', 25, 'HP Envy x360', 'HP', 3, 'Laptop cảm ứng xoay gập 360 độ', '8GB', '256GB', 'Xám', 'uploads/a7.jpg', '25000000.00', 'HE12345', 1, 18),
('P0010', 26, 'Acer Nitro 5', 'Acer', 4, 'Laptop chơi game giá rẻ', '8GB', '512GB', 'Đen', 'uploads/a8.jpg', '15000000.00', 'AN12345', 1, 20),
('P012', 28, 'Apple MacBook Air M2 2024', 'MAC', 11, 'Laptop dành cho văn phòng', '8GB', '256GB', 'Xanh', 'uploads/a1.jpg', '20000000.00', 'SB12345', 1, 14),
('P013', 32, 'Apple MacBook Pro 14-inch M2 2024', 'MAC', 11, 'Laptop cao cấp cho người dùng chuyên nghiệp', '16GB', '512GB', 'Xám', 'uploads/mac.jpg', '50000000.00', 'MBP142024', 1, 10),
('P014', 33, 'Apple MacBook Pro 16-inch M2 Max 2024', 'MAC', 11, 'Laptop cao cấp với hiệu năng cực mạnh', '32GB', '1TB', 'Bạc', 'uploads/mac2.jpg', '75000000.00', 'MBP162024', 1, 5),
('P8340', 34, 'Dell office', 'Dell', 1, 'Hàng chính hãng', '16GB', '1TB', 'Đen', 'uploads/mac2.jpg', '5000000.00', 'SKU-6752821319D1A', 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tin_tucs`
--

CREATE TABLE `tin_tucs` (
  `id` int NOT NULL,
  `tieu_de` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `noi_dung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ngay_tao` date NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `hinh_anh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tin_tucs`
--

INSERT INTO `tin_tucs` (`id`, `tieu_de`, `noi_dung`, `ngay_tao`, `trang_thai`, `hinh_anh`) VALUES
(10, 'Laptop Dell được xác nhận có ram 16gb ấn tượng', 'OPPO vào ngày 25/11 tới sẽ ra mắt các điện thoại Reno mới được nhiều người mong đợi, bao gồm 2 model là Reno13 và Reno13 Pro.\r\n\r\nGần đây, công ty đã xác nhận thiết kế, tùy chọn màu sắc và cấu hình của cả hai điện thoại này. Hôm nay, một giám đốc điều hành của OPPO đã xác nhận dung lượng pin của model Reno13 tiêu chuẩn.\r\n\r\nOPPO Reno13 có pin 5,600 mAh ấn tượng\r\nOPPO Reno13 có pin 5,600 mAh ấn tượng\r\nNhư bạn có thể thấy trong ảnh chụp màn hình ở trên, Giám đốc điều hành OPPO đã xác nhận rằng Reno13 sẽ có pin 5,600mAh, lớn hơn đáng kể so với pin 5,000 mAh của Reno12, hứa hẹn mang đến thời gian sử dụng tốt hơn cho người dùng.\r\n\r\nOPPO hiện chưa xác nhận dung lượng pin của model Reno13 Pro cao cấp hơn nhưng theo các nguồn tin rò rỉ, nó sẽ có dung lượng 5,900 mAh.\r\n\r\nDòng Reno13 sẽ ra mắt ngày 25/11 tới\r\nDòng Reno13 sẽ ra mắt ngày 25/11 tới\r\nCòn theo các báo cáo trước đây, Reno13 sẽ được trang bị màn hình OLED phẳng 6.59 inch, đi kèm các tùy chọn cấu hình 12GB + 256GB, 12GB + 512GB, 16GB + 256GB, 16GB + 512GB và 16GB + 1TB. Điện thoại thông minh này sẽ có các tùy chọn màu Midnight Black, Butterfly Purple và Galaxy Blue.\r\n\r\nMặt khác, Reno13 Pro được tiết lộ sẽ có màn hình OLED 6.83 inch với thiết kế cong bốn cạnh siêu nhỏ. Bên trong, điện thoại này có thể sử dụng chipset Dimensity 8300 hoặc Dimensity 8350, đi kèm các phiên bản cấu hình 12GB + 256GB, 12GB + 512GB, 16GB + 512GB và 16GB + 1TB.\r\n\r\nNgoài ra, di động OPPO còn được tiết lộ có các tùy chọn màu Midnight Black, Butterfly Purple và Starlight Pink. Về khả năng nhiếp ảnh, điện thoại có thể sở hữu cụm ba camera 50 megapixel + 8 megapixel + 50 megapixel (tele). Mặt trước có cảm biến 50 megapixel để người dùng chụp ảnh selfie và video call.', '2024-11-21', 1, 'a1.jpg'),
(12, 'Cách để nhận biết Laptop đã thay màn hình', 'Màn hình iPhone zin là màn hình chính hãng do Apple sản xuất, đi kèm máy, chất lượng tốt. Thế nhưng số lượng linh kiện màn hình zin vô cùng khan hiếm do Apple không sản xuất riêng linh kiện màn hình. Giá màn hình linh kiện vô cùng đắt đỏ.\r\n\r\nMàn hình iPhone linh kiện là màn hình do bên thứ 3 sản xuất, chất lượng tương đương với màn hình zin, giá màn hình loại này rẻ hơn nhiều so với màn hình zin, nên được các trung tâm sửa chữa và người tiêu dùng tin tưởng sử dụng khi thay màn hình iPhone.\r\n\r\nMàn hình iPhone lô là hàng kém chất lượng, hàng fake, không rõ nguồn gốc xuất sứ, toàn là hàng trôi nổi trên thị trường.', '2024-11-20', 1, 'a2.jpg'),
(13, 'Laptop Acer đỉnh cao, giá từ 23.9 triệu', 'Thiết kế và ngoại hình OPPO Find X8 \r\nNgay từ cảm giác cầm nắm, OPPO Find X8 mang đến cảm giác vô cùng dễ chịu với sự mỏng nhẹ mà nó mang lại. Máy có trọng lượng chỉ 193gr với độ dày chỉ 7.85mm. Mặt lưng máy còn được phủ lớp chống bám vân tay và hạn chế tình trạng trơn trượt của máy trong quá trình sử dụng thực tế.\r\n\r\nOPPO Find X8 có trọng lượng chỉ 193gr với độ dày chỉ 7.85mm\r\nBên cạnh đó, thiết kế mô-đun camera sau tương tự như những mẫu flagship đến từ Trung Quốc với các ống kính được bố trí hình tròn.\r\n\r\nOPPO Find X8 có mặt lưng nổi bật với ống kính đặt trong mô-đun hình tròn\r\nLưu ý rằng phiên bản màu sắc Đen và Xanh (Starfield Black và Windchaser Blue) sẽ có ống kính màu đen, trong khi phiên bản màu hồng và màu trắng trong bài viết này sẽ có ống kính cùng màu với màu sắc mặt lưng.\r\n\r\nLogo Hasselblad được đặt giữa các ống kính tạo sự cân đối hơn\r\nLogo của Hasselblad được đặt ngay giữa các ống kính tạo cảm giác đồng tâm hơn, cân đối hơn. Đèn flash LED đặt bên ngoài mô-đun sẽ tạo cảm giác khó chịu nếu như bạn là người có xu hướng yêu thích sự cân đối và hoàn hảo.\r\n\r\nCạnh phải là khu vực đặt nút nguồn và nút điều khiển âm lượng.', '2024-11-07', 1, 'a3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_don_hangs`
--

CREATE TABLE `trang_thai_don_hangs` (
  `id` int NOT NULL,
  `ten_trang_thai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trang_thai_don_hangs`
--

INSERT INTO `trang_thai_don_hangs` (`id`, `ten_trang_thai`) VALUES
(1, 'Chờ xác nhận'),
(2, 'Đã xác nhận'),
(3, 'Đang giao'),
(4, 'Đã giao'),
(5, 'Giao hàng thành công'),
(6, 'Giao hàng thất bại'),
(7, 'Đã hủy');

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_thanh_toan`
--

CREATE TABLE `trang_thai_thanh_toan` (
  `id` int NOT NULL,
  `ten_thanh_toan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trang_thai_thanh_toan`
--

INSERT INTO `trang_thai_thanh_toan` (`id`, `ten_thanh_toan`) VALUES
(1, 'Chưa thanh Toán'),
(2, 'Đã thanh toán');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoi_dung_id` (`nguoi_dung_id`),
  ADD KEY `san_pham_id` (`san_pham_id`);

--
-- Indexes for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `don_hang_id` (`don_hang_id`),
  ADD KEY `san_pham_id` (`san_pham_id`);

--
-- Indexes for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gio_hang_id` (`gio_hang_id`),
  ADD KEY `san_pham_id` (`san_pham_id`);

--
-- Indexes for table `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoi_dung_id` (`nguoi_dung_id`),
  ADD KEY `san_pham_id` (`san_pham_id`);

--
-- Indexes for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoi_dung_id` (`nguoi_dung_id`),
  ADD KEY `trang_thai_don_hang_id` (`trang_thai_don_hang_id`),
  ADD KEY `phuong_thuc_thanh_toan_id` (`phuong_thuc_thanh_toan_id`),
  ADD KEY `trang_thai_thanh_toan_id` (`trang_thai_thanh_toan_id`);

--
-- Indexes for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tai_khoan_id` (`tai_khoan_id`);

--
-- Indexes for table `khuyen_mais`
--
ALTER TABLE `khuyen_mais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lien_hes`
--
ALTER TABLE `lien_hes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nguoi_dungs`
--
ALTER TABLE `nguoi_dungs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phuong_thuc_thanh_toan`
--
ALTER TABLE `phuong_thuc_thanh_toan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tin_tucs`
--
ALTER TABLE `tin_tucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trang_thai_thanh_toan`
--
ALTER TABLE `trang_thai_thanh_toan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `khuyen_mais`
--
ALTER TABLE `khuyen_mais`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lien_hes`
--
ALTER TABLE `lien_hes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nguoi_dungs`
--
ALTER TABLE `nguoi_dungs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `phuong_thuc_thanh_toan`
--
ALTER TABLE `phuong_thuc_thanh_toan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tin_tucs`
--
ALTER TABLE `tin_tucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trang_thai_thanh_toan`
--
ALTER TABLE `trang_thai_thanh_toan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD CONSTRAINT `fk_binhluans_nguoidungs` FOREIGN KEY (`nguoi_dung_id`) REFERENCES `nguoi_dungs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_binhluans_products` FOREIGN KEY (`san_pham_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD CONSTRAINT `don_hangs_ibfk_1` FOREIGN KEY (`nguoi_dung_id`) REFERENCES `nguoi_dungs` (`id`),
  ADD CONSTRAINT `don_hangs_ibfk_2` FOREIGN KEY (`trang_thai_don_hang_id`) REFERENCES `trang_thai_don_hangs` (`id`),
  ADD CONSTRAINT `don_hangs_ibfk_3` FOREIGN KEY (`phuong_thuc_thanh_toan_id`) REFERENCES `phuong_thuc_thanh_toan` (`id`),
  ADD CONSTRAINT `don_hangs_ibfk_4` FOREIGN KEY (`trang_thai_thanh_toan_id`) REFERENCES `trang_thai_thanh_toan` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `danh_mucs` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
