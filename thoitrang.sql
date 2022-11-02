-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 25, 2022 lúc 02:37 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thoitrang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthd`
--

CREATE TABLE `cthd` (
  `ID` int(11) NOT NULL,
  `MaHD` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `SoLuong` float NOT NULL,
  `ThanhTien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cthd`
--

INSERT INTO `cthd` (`ID`, `MaHD`, `MaSP`, `SoLuong`, `ThanhTien`) VALUES
(61, 41, 13, 1, 350000),
(62, 41, 14, 2, 500000),
(63, 42, 14, 1, 250000),
(64, 43, 14, 1, 250000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangnhap`
--

CREATE TABLE `dangnhap` (
  `UserName` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `DiaChiEmail` varchar(225) NOT NULL,
  `Ghichu` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dangnhap`
--

INSERT INTO `dangnhap` (`UserName`, `Password`, `DiaChiEmail`, `Ghichu`) VALUES
('admin', '123', '', ''),
('becun', '123', '', ''),
('beloan', '123', '', ''),
('bemeo', '456', '', ''),
('bemi', '789', '', ''),
('papa00', 'manh2012', 'manhmt585@gmail.com', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `UserName` varchar(200) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `SoLuong` float NOT NULL,
  `ThanhTien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`UserName`, `MaSP`, `SoLuong`, `ThanhTien`) VALUES
('beloan', 13, 1, 350000),
('papa00', 13, 1, 350000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` int(11) NOT NULL,
  `UserName` varchar(200) NOT NULL,
  `Ten` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SDT` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `DiaChi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `TrangThai` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `TongTien` float NOT NULL,
  `NgayLap` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `UserName`, `Ten`, `SDT`, `DiaChi`, `TrangThai`, `TongTien`, `NgayLap`) VALUES
(41, 'beloan', '5', '0123456789', 'Bình Định', 'Đã duyệt', 850000, '2022-01-18 00:00:00'),
(42, 'beloan', '5', '0123456789', 'Bình Định', 'Đang phê duyệt', 250000, '2022-01-19 00:00:00'),
(43, 'beloan', 'Tien ', '0123456789', 'Bình Định', 'Đã hủy', 250000, '2022-01-19 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihang`
--

CREATE TABLE `loaihang` (
  `MaHang` int(11) NOT NULL,
  `TenHang` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaihang`
--

INSERT INTO `loaihang` (`MaHang`, `TenHang`) VALUES
(1, 'Giày Nam'),
(2, 'Dép Nam'),
(3, 'Giày Nữ'),
(4, 'Dép Nữ'),
(5, 'Vớ'),
(6, 'Đế Lót');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `TenSP` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `MaHang` int(11) NOT NULL,
  `DonGia` float NOT NULL,
  `SoLuong` text NOT NULL,
  `Anh` text NOT NULL,
  `ThongTin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `MaHang`, `DonGia`, `SoLuong`, `Anh`, `ThongTin`) VALUES
(13, 'Giày Thể Thao Nam MWC', 1, 350000, '398', 'image/mwc.jpg', 'Giày Thể Thao Nam MWC NATT - 5343 với chất vải chuyên dụng trong thể thao tạo cảm giác thoải mái, đồng thời với kiểu dáng thể thao năng động, thiết kế hiện đại sản phẩm sẽ mang đến một phong cách trẻ trung, cá tính cho bạn.'),
(14, 'Giày Thể Thao Nam', 1, 250000, '400', 'image/mwc (1).jpg', 'Mã SP : Giày Thể Thao Nam MWC - 5393 Giày Thể Thao Nam Cao Cấp Đế Cao, Sneaker Da Cổ Thấp Năng Động Cá Tính'),
(15, 'Giày thể thao nam', 1, 250000, '398', 'image/mwc (2).jpg', 'Giày Thể Thao Nam MWC NATT - 5353 là mẫu giày được thiết kế theo phong cách hiện đại, màu sắc khỏe khoắn, sang trọng mang đến cho bạn 1 diện mạo hoàn toàn cá tính. Đặc biệt sản phẩm sử dụng chất liệu cao cấp có độ bền tối ưu giúp bạn thoải mái trong mọi hoàn cảnh.\r\nChất liệu cao cấp : thoáng khí cả mặt trong lẫn mặt ngoài khiến người mang luôn cảm thấy dễ chịu dù hoạt động trong thời gian dài.'),
(16, 'Dép Nam Siêu Cute', 2, 250000, '400', 'image/mwc (3).jpg', ' CHI TIẾT SẢN PHẨM\r\n\r\n- Kiểu dáng: dép quai kẹp đế bằng\r\n\r\n- Quai trên : sử dụng chất liệu da PU cao cấp\r\n\r\n- Đế cao su, xẻ rãnh chống trơn trượt\r\n\r\n- Đường may bền chắc, tinh tế\r\n\r\n- Thiết kế đơn giản, gọn nhẹ, nam tính\r\n\r\n- Form dép ôm chân, thời trang.\r\n\r\n- Màu sắc: Đen/Trắng\r\n\r\n- Xuất sứ thương hiệu: Việt Nam'),
(17, 'Dép Quai Ngang', 2, 250000, '400', 'image/mwc (4).jpg', ' CHI TIẾT SẢN PHẨM\r\n\r\n - Kiểu dáng: dép quai ngang đế bằng\r\n\r\n- Quai trên : chất liệu da PU cao cấp\r\n\r\n- Đế cao su, xẻ rãnh chống trơn trượt\r\n\r\n- Đường may bền chắc, tinh tế\r\n\r\n- Thiết kế đơn giản, gọn nhẹ, nam tính\r\n\r\n- Form dép ôm chân, thời trang.\r\n\r\n- Màu sắc: Đen, Vàng , Xám\r\n\r\n- Xuất sứ thương hiệu: Việt Nam\r\n\r\n'),
(18, 'Giày Nữ Thể Thao Cao Cấp', 3, 250000, '400', 'image/mwc (5).jpg', ' CHI TIẾT SẢN PHẨM\r\n\r\n- Chiều cao giày 5cm\r\n\r\n- Chất liệu da PU cao cấp\r\n\r\n- Chất liệu đế cao su đúc êm mềm, độ đàn hồi tốt, chống trơn trượt\r\n\r\n- Kiểu dáng giày thể thao cổ thấp\r\n\r\n- Màu sắc: Trắng\r\n\r\n- Size: 36 - 37 - 38 - 39 - 40\r\n\r\n- Xuất xứ: Việt Nam'),
(19, 'Giày Nữ Cao Gót Cao Cấp', 3, 250000, '400', 'image/mwc (6).jpg', 'Giày cao gót MWC NUCG-3970 với thiết kế trẻ trung, năng động nhưng không kém phần sang trọng, thanh lịch góp phần tạo nên phong cách cũng như khẳng định khiếu thẩm mỹ của bạn. Đường may tinh tế, sắc sảo, màu sắc trang nhã đẹp mắt tạo nên sự đẳng cấp cho sản phẩm và thương hiệu. Ngoài ra sản phẩm rất dễ dàng phối hợp cùng nhiều loại trang phục khác nhau, thích hợp khi đi làm, dạo phố hoặc dự tiệc...'),
(35, 'Dép Nữ Cao Cấp', 4, 295, '100', 'image/mwc (7).jpg', 'CHI TIẾT SẢN PHẨM\r\n\r\n- Chất liệu da PU cao cấp\r\n\r\n- Chất liệu đế cao su sẽ rảnh,chống trơn trượt,hạn chế tiếng ồn\r\n\r\n- Kiểu dáng dép bánh mì\r\n\r\n- Màu sắc: Đen - Kem\r\n\r\n- Size: 35 - 36 - 37 - 38 – 39\r\n\r\n- Xuất sứ thương hiệu: Việt Nam'),
(36, 'Vớ Nam Nữ Cao Cấp', 5, 500, '1000', 'image/mwc (8).jpg', 'Chất liệu vải mềm hút mồ hôi cực đỉnh'),
(37, 'Vớ Nam Nữ Hiện Đại', 5, 500, '1000', 'image/mwc (9).jpg', 'Hút mồ hôi ngăn ngừa hôi chân'),
(38, 'Đế Lót', 6, 300, '1000', 'image/mwc (10).jpg', 'Đế Lót Cao Cấp Giúp Cải Thiện Chiều Cao');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cthd`
--
ALTER TABLE `cthd`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Chỉ mục cho bảng `dangnhap`
--
ALTER TABLE `dangnhap`
  ADD PRIMARY KEY (`UserName`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD KEY `UserName` (`UserName`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `UserName` (`UserName`);

--
-- Chỉ mục cho bảng `loaihang`
--
ALTER TABLE `loaihang`
  ADD PRIMARY KEY (`MaHang`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `MaHang` (`MaHang`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cthd`
--
ALTER TABLE `cthd`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `loaihang`
--
ALTER TABLE `loaihang`
  MODIFY `MaHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cthd`
--
ALTER TABLE `cthd`
  ADD CONSTRAINT `cthd_ibfk_1` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`UserName`) REFERENCES `dangnhap` (`UserName`),
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`UserName`) REFERENCES `dangnhap` (`UserName`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaHang`) REFERENCES `loaihang` (`MaHang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
