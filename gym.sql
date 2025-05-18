-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 12, 2024 lúc 03:19 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `gym`
--

DELIMITER $$
--
-- Thủ tục
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ProG` ()   begin
SELECT * FROM hs_hr_employee_leave_quota;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `MaCV` int(11) NOT NULL,
  `TenCV` varchar(100) NOT NULL,
  `MoTa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`MaCV`, `TenCV`, `MoTa`) VALUES
(1, 'Kế toán', 'Chịu trách nhiệm quản lý tài chính và sổ sách kế toán.'),
(2, 'Kỹ thuật viên', 'Bảo trì và sửa chữa các thiết bị trong trung tâm.'),
(4, 'Lễ tân', 'Tiếp đón khách hàng và xử lý các thủ tục đăng ký.'),
(5, 'Quản lý', 'QUản lý trùm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `goitap`
--

CREATE TABLE `goitap` (
  `MaGT` int(11) NOT NULL,
  `TenGT` varchar(100) NOT NULL,
  `SoTien` float NOT NULL,
  `MoTa` varchar(50) NOT NULL,
  `HinhAnh` varchar(50) NOT NULL,
  `DichVu` varchar(100) NOT NULL,
  `xoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `goitap`
--

INSERT INTO `goitap` (`MaGT`, `TenGT`, `SoTien`, `MoTa`, `HinhAnh`, `DichVu`, `xoa`) VALUES
(1, 'Gói 1 Tháng', 500000, 'Gói tập 1 tháng', 'goi1.jpg', 'Tập Gym, Yoga', 0),
(2, 'Gói 3 Tháng', 1400000, 'Gói tập 3 tháng', 'goi2.jpg', 'Tập Gym, Aerobic, Yoga', 0),
(3, 'Gói 1 Năm', 5000000, 'Gói tập 1 năm', 'goi3.jpg', 'Tập Gym, Bơi lội, Yoga', 0),
(4, 'Gói Gia Đình 6 Tháng', 3000000, 'Gói tập gia đình 6 tháng', 'goi4.jpg', 'Tập Gym, Aerobic, Yoga, Bơi lội', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` int(11) NOT NULL,
  `NgayLap` date NOT NULL,
  `NgayBatDau` date NOT NULL,
  `NgayKetThuc` date NOT NULL,
  `TongTien` decimal(15,2) NOT NULL,
  `TinhTrangTT` varchar(20) DEFAULT NULL CHECK (`TinhTrangTT` in ('Đã thanh toán','Chưa thanh toán')),
  `TinhTrangMail` varchar(20) DEFAULT NULL CHECK (`TinhTrangMail` in ('Đã gửi','Chưa gửi')),
  `MaGT` int(11) DEFAULT NULL,
  `MaTV` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `NgayLap`, `NgayBatDau`, `NgayKetThuc`, `TongTien`, `TinhTrangTT`, `TinhTrangMail`, `MaGT`, `MaTV`) VALUES
(1, '2024-12-01', '2024-12-02', '2024-12-31', 5000000.00, 'Đã thanh toán', 'Đã Gửi', 3, 1),
(2, '2024-12-03', '2024-12-04', '2025-03-03', 1000000.00, 'Chưa thanh toán', 'Chưa gửi', 1, 2),
(3, '2024-12-05', '2024-12-06', '2025-12-05', 2000000.00, 'Đã thanh toán', 'Đã gửi', 3, 3),
(4, '2024-12-07', '2024-12-08', '2025-06-07', 1800000.00, 'Chưa thanh toán', 'Chưa gửi', 4, 4),
(5, '2024-12-09', '2024-12-10', '2025-01-09', 1200000.00, 'Đã thanh toán', 'Đã gửi', 1, 5),
(6, '2024-12-11', '2024-12-12', '2025-03-11', 5000000.00, 'Chưa thanh toán', 'Chưa gửi', 3, 6),
(7, '2024-12-13', '2024-12-14', '2025-12-13', 900000.00, 'Đã thanh toán', 'Đã gửi', 3, 7),
(8, '2024-12-15', '2024-12-16', '2025-06-15', 1700000.00, 'Đã thanh toán', 'Đã gửi', 4, 8),
(9, '2024-12-17', '2024-12-18', '2025-01-17', 2200000.00, 'Chưa thanh toán', 'Chưa gửi', 1, 9),
(10, '2024-12-19', '2024-12-20', '2025-03-19', 1300000.00, 'Đã thanh toán', 'Đã gửi', 2, 10),
(15, '2024-12-12', '2024-12-12', '2025-01-11', 5000000.00, 'Đã thanh toán', NULL, 3, 1),
(16, '2024-12-12', '2024-12-13', '2025-12-13', 5000000.00, 'Đã thanh toán', 'chưa gửi', 1, 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsu`
--

CREATE TABLE `lichsu` (
  `maLS` int(11) NOT NULL,
  `ngayVao` date NOT NULL,
  `gioVao` time NOT NULL,
  `gioRa` time DEFAULT NULL,
  `MaTV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lichsu`
--

INSERT INTO `lichsu` (`maLS`, `ngayVao`, `gioVao`, `gioRa`, `MaTV`) VALUES
(1, '2024-12-01', '08:00:00', '09:30:00', 1),
(2, '2024-12-01', '09:00:00', '10:15:00', 2),
(3, '2024-12-01', '10:30:00', NULL, 3),
(4, '2024-12-02', '07:45:00', '09:00:00', 4),
(5, '2024-12-02', '18:00:00', '19:30:00', 5),
(6, '2024-12-03', '06:30:00', '08:00:00', 6),
(7, '2024-12-03', '08:15:00', NULL, 7),
(8, '2024-12-04', '17:00:00', '18:45:00', 8),
(9, '2024-12-05', '07:00:00', '08:30:00', 9),
(10, '2024-12-05', '08:45:00', '10:00:00', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` int(11) NOT NULL,
  `TenNV` varchar(100) NOT NULL,
  `HinhAnhNV` varchar(255) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Sdt` varchar(15) NOT NULL,
  `NgayVaoLam` date NOT NULL,
  `MaTK` int(11) DEFAULT NULL,
  `MaCV` int(11) DEFAULT NULL,
  `xoa` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `TenNV`, `HinhAnhNV`, `Email`, `Sdt`, `NgayVaoLam`, `MaTK`, `MaCV`, `xoa`) VALUES
(1, 'Nguyễn Văn A', 'nv1.jpg', 'nv1@gmail.com', '0123456781', '2022-01-15', 2, 1, 0),
(2, 'Trần Thị B', 'nv2.jpg', 'nv2@gmail.com', '0123456782', '2022-02-20', 3, 2, 0),
(3, 'Lê Văn Cần', 'phudulich.jpg', 'nv3@gmail.com', '0123456783', '2022-03-05', 4, 4, 0),
(4, 'Phạm Thị D', 'nv4.jpg', 'nv4@gmail.com', '0123456784', '2022-04-10', 5, 4, 0),
(5, 'Hoàng Văn E', 'nv5.jpg', 'nv5@gmail.com', '0123456785', '2022-05-25', 6, 4, 0),
(6, 'Ngọc Phú', 'quanly.jpg', 'phu123@gmail.com', '0123456789', '2021-12-01', 1, 5, 0),
(7, 'Huỳnh Ngọc Phú', 'quanly.jpg', 'ngocphu@gmail.com', '0328250176', '2024-12-12', 18, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanhoi`
--

CREATE TABLE `phanhoi` (
  `maPH` int(11) NOT NULL,
  `TieuDe` varchar(100) DEFAULT NULL,
  `noiDung` varchar(100) DEFAULT NULL,
  `DanhGia` int(11) DEFAULT NULL,
  `HinhAnhDanhGia` varchar(50) DEFAULT NULL,
  `MaTV` int(11) NOT NULL,
  `xoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phanhoi`
--

INSERT INTO `phanhoi` (`maPH`, `TieuDe`, `noiDung`, `DanhGia`, `HinhAnhDanhGia`, `MaTV`, `xoa`) VALUES
(1, 'Tuyệt vời!', 'Mình rất thích không gian ở đây.', 5, NULL, 1, 0),
(2, 'Dịch vụ tốt', 'Nhân viên phục vụ rất nhiệt tình.', 4, NULL, 2, 0),
(3, 'Cần cải thiện', 'Một số máy tập cần bảo trì.', 3, NULL, 3, 0),
(4, 'Rất hài lòng', 'Chất lượng dịch vụ rất tốt, sẽ quay lại.', 5, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieutinhtrangthietbi`
--

CREATE TABLE `phieutinhtrangthietbi` (
  `MaPhieu` int(11) NOT NULL,
  `NgayGhiNhan` date NOT NULL,
  `MoTaLoi` text NOT NULL,
  `PhuongAnSuaChua` text NOT NULL,
  `TrangThai` varchar(50) NOT NULL,
  `NgayBaoTri` date DEFAULT NULL,
  `KetQua` varchar(50) DEFAULT NULL,
  `MaNV` int(11) NOT NULL,
  `MaTB` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieutinhtrangthietbi`
--

INSERT INTO `phieutinhtrangthietbi` (`MaPhieu`, `NgayGhiNhan`, `MoTaLoi`, `PhuongAnSuaChua`, `TrangThai`, `NgayBaoTri`, `KetQua`, `MaNV`, `MaTB`) VALUES
(1, '2024-01-12', '', 'Bảo trì định kỳ', 'Duyệt', '0000-00-00', 'Chưa sửa', 2, 2),
(2, '2024-11-19', 'Bị bung ốc', 'Mua ốc mới gắn vào\r\n', 'Duyệt', '2024-11-11', 'Đã sửa', 2, 1),
(3, '2024-11-19', 'lỗi', 'mua mới', 'Duyệt', '2024-11-19', 'Đã sửa', 2, 1),
(4, '2024-12-08', 'hư nặng', 'mua vật liệu', 'Chưa duyệt', NULL, 'Chưa sửa', 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `MaRole` int(11) NOT NULL,
  `TenRole` varchar(100) NOT NULL,
  `MoTa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`MaRole`, `TenRole`, `MoTa`) VALUES
(1, 'Quản lý', 'Chịu trách nhiệm quản lý và điều hành hệ thống'),
(2, 'Nhân viên', 'Thực hiện các công việc được phân công bởi quản lý'),
(3, 'Thành viên', 'Người sử dụng dịch vụ, có quyền truy cập hạn chế');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTK` int(11) NOT NULL,
  `TaiKhoan` varchar(50) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `MaRole` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MaTK`, `TaiKhoan`, `MatKhau`, `MaRole`) VALUES
(1, '0123456789', 'c4ca4238a0b923820dcc509a6f75849b', 1),
(2, '0123456781', 'c4ca4238a0b923820dcc509a6f75849b', 2),
(3, '0123456782', 'c4ca4238a0b923820dcc509a6f75849b', 2),
(4, '0123456783', 'c4ca4238a0b923820dcc509a6f75849b', 2),
(5, '0123456784', 'c4ca4238a0b923820dcc509a6f75849b', 2),
(6, '0123456785', 'c4ca4238a0b923820dcc509a6f75849b', 2),
(7, '0123456786', 'c4ca4238a0b923820dcc509a6f75849b', 3),
(8, '0123456787', 'c4ca4238a0b923820dcc509a6f75849b', 3),
(9, '0123456788', 'c4ca4238a0b923820dcc509a6f75849b', 3),
(10, '0123456789', 'c4ca4238a0b923820dcc509a6f75849b', 3),
(11, '0123456790', 'c4ca4238a0b923820dcc509a6f75849b', 3),
(12, '0123456791', 'c4ca4238a0b923820dcc509a6f75849b', 3),
(13, '0123456792', 'c4ca4238a0b923820dcc509a6f75849b', 3),
(14, '0123456793', 'c4ca4238a0b923820dcc509a6f75849b', 3),
(15, '0123456794', 'c4ca4238a0b923820dcc509a6f75849b', 3),
(16, '0123456795', 'c4ca4238a0b923820dcc509a6f75849b', 3),
(17, '0328250176', 'c4ca4238a0b923820dcc509a6f75849b', 3),
(18, '0328250176', 'c4ca4238a0b923820dcc509a6f75849b', 2),
(19, '0363576756', 'c4ca4238a0b923820dcc509a6f75849b', 3),
(20, '0987654123', 'c4ca4238a0b923820dcc509a6f75849b', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `MaTV` int(11) NOT NULL,
  `TenTV` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Sdt` varchar(15) NOT NULL,
  `NgaySinh` date DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `HinhAnh` varchar(255) DEFAULT NULL,
  `MaTK` int(11) DEFAULT NULL,
  `TrangThai` varchar(20) DEFAULT NULL CHECK (`TrangThai` in ('Còn tập','Nghỉ'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`MaTV`, `TenTV`, `Email`, `Sdt`, `NgaySinh`, `DiaChi`, `HinhAnh`, `MaTK`, `TrangThai`) VALUES
(1, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '0123456786', '1995-06-15', '123 Đường ABC, TP.HCM', 'hinh1.jpg', 7, 'Còn Tập'),
(2, 'Lê Thị B', 'lethib@gmail.com', '0123456787', '1990-12-22', '456 Đường XYZ, Hà Nội', 'hinh2.jpg', 8, 'Còn Tập'),
(3, 'Phạm Văn C', 'phamvanc@gmail.com', '0123456788', '1985-03-05', '789 Đường DEF, Đà Nẵng', 'hinh3.jpg', 9, 'Còn Tập'),
(4, 'Trần Thị D', 'tranthid@gmail.com', '0123456789', '1998-07-19', '101 Đường GHI, Cần Thơ', 'hinh4.jpg', 10, 'Còn tập'),
(5, 'Hoàng Văn E', 'hoangvane@gmail.com', '0123456790', '2000-11-01', '202 Đường JKL, Hải Phòng', 'hinh5.jpg', 11, 'Còn Tập'),
(6, 'Vũ Thị F', 'vuthif@gmail.com', '0123456791', '1997-09-23', '303 Đường MNO, Nha Trang', 'hinh6.jpg', 12, 'Còn Tập'),
(7, 'Lý Văn G', 'lyvang@gmail.com', '0123456792', '1992-05-14', '404 Đường PQR, Huế', 'hinh7.jpg', 13, 'Còn tập'),
(8, 'Đỗ Thị H', 'dothih@gmail.com', '0123456793', '1994-08-08', '505 Đường STU, Vũng Tàu', 'hinh8.jpg', 14, 'Còn Tập'),
(9, 'Ngô Văn I', 'ngovani@gmail.com', '0123456794', '1989-02-27', '606 Đường VWX, Quy Nhơn', 'hinh9.jpg', 15, 'Còn tập'),
(10, 'Tạ Thị J', 'tatij@gmail.com', '0123456795', '1996-10-10', '707 Đường YZ, Biên Hòa', 'hinh10.jpg', 16, 'Còn tập'),
(11, 'Huynh Ngoc Phu', 'ngocphu123@gmail.com', '0328250176', '2003-10-28', 'Phú Yên', 'phudulich.jpg', 17, 'Còn Tập'),
(12, 'Lưu NN', 'a@gmail.com', '0363576756', '2003-10-28', 'Phú Yên', 'svr.png', 19, 'Nghỉ'),
(13, 'Nguyễn Nam Triệu', 'trieu@gmail.com', '0987654123', '2003-04-10', 'Phú Yên', 'ip.jpg', 20, 'Còn Tập');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thietbi`
--

CREATE TABLE `thietbi` (
  `MaTB` int(11) NOT NULL,
  `TenTB` varchar(50) NOT NULL,
  `NoiSanXuat` varchar(50) NOT NULL,
  `TinhTrang` varchar(50) NOT NULL,
  `xoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thietbi`
--

INSERT INTO `thietbi` (`MaTB`, `TenTB`, `NoiSanXuat`, `TinhTrang`, `xoa`) VALUES
(1, 'Máy chạy bộ', 'Life Fitness', 'Hoạt động', 0),
(2, 'Xe đạp tập', 'Peloton', 'Hoạt động', 0),
(3, 'Máy tập bụng', 'Technogym', 'Bảo trì', 0),
(4, 'Máy kéo tay', 'Matrix', 'Hoạt động', 0),
(5, 'Máy tập tạ', 'Nautilus', 'Hoạt động', 0),
(6, 'Máy elip', 'NordicTrack', 'Ngừng hoạt động', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`MaCV`);

--
-- Chỉ mục cho bảng `goitap`
--
ALTER TABLE `goitap`
  ADD PRIMARY KEY (`MaGT`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `FK_HoaDon_GoiTap` (`MaGT`),
  ADD KEY `FK_HoaDon_ThanhVien` (`MaTV`);

--
-- Chỉ mục cho bảng `lichsu`
--
ALTER TABLE `lichsu`
  ADD PRIMARY KEY (`maLS`),
  ADD KEY `MaTV` (`MaTV`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`),
  ADD KEY `FK_NhanVien_TaiKhoan` (`MaTK`),
  ADD KEY `FK_NhanVien_ChucVu` (`MaCV`);

--
-- Chỉ mục cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  ADD PRIMARY KEY (`maPH`),
  ADD KEY `MaTV` (`MaTV`);

--
-- Chỉ mục cho bảng `phieutinhtrangthietbi`
--
ALTER TABLE `phieutinhtrangthietbi`
  ADD PRIMARY KEY (`MaPhieu`),
  ADD KEY `MaNV` (`MaNV`),
  ADD KEY `MaTB` (`MaTB`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`MaRole`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTK`),
  ADD KEY `FK_TaiKhoan_Role` (`MaRole`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`MaTV`),
  ADD KEY `FK_ThanhVien_TaiKhoan` (`MaTK`);

--
-- Chỉ mục cho bảng `thietbi`
--
ALTER TABLE `thietbi`
  ADD PRIMARY KEY (`MaTB`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `MaCV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `goitap`
--
ALTER TABLE `goitap`
  MODIFY `MaGT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `lichsu`
--
ALTER TABLE `lichsu`
  MODIFY `maLS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  MODIFY `maPH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `phieutinhtrangthietbi`
--
ALTER TABLE `phieutinhtrangthietbi`
  MODIFY `MaPhieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `MaRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `MaTV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `thietbi`
--
ALTER TABLE `thietbi`
  MODIFY `MaTB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `FK_HoaDon_GoiTap` FOREIGN KEY (`MaGT`) REFERENCES `goitap` (`MaGT`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_HoaDon_ThanhVien` FOREIGN KEY (`MaTV`) REFERENCES `thanhvien` (`MaTV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lichsu`
--
ALTER TABLE `lichsu`
  ADD CONSTRAINT `lichsu_ibfk_1` FOREIGN KEY (`MaTV`) REFERENCES `thanhvien` (`MaTV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `FK_NhanVien_ChucVu` FOREIGN KEY (`MaCV`) REFERENCES `chucvu` (`MaCV`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_NhanVien_TaiKhoan` FOREIGN KEY (`MaTK`) REFERENCES `taikhoan` (`MaTK`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `phieutinhtrangthietbi`
--
ALTER TABLE `phieutinhtrangthietbi`
  ADD CONSTRAINT `phieutinhtrangthietbi_ibfk_2` FOREIGN KEY (`MaTB`) REFERENCES `thietbi` (`MaTB`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `FK_TaiKhoan_Role` FOREIGN KEY (`MaRole`) REFERENCES `role` (`MaRole`);

--
-- Các ràng buộc cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD CONSTRAINT `FK_ThanhVien_TaiKhoan` FOREIGN KEY (`MaTK`) REFERENCES `taikhoan` (`MaTK`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
