-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 17, 2021 lúc 10:46 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `asm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cmt`
--

CREATE TABLE `cmt` (
  `idcmt` int(11) NOT NULL,
  `noidung` varchar(100) NOT NULL,
  `ngaycmt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `masp` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cmt`
--

INSERT INTO `cmt` (`idcmt`, `noidung`, `ngaycmt`, `masp`, `iduser`) VALUES
(85, 'rẻ quá', '2021-06-03 03:17:44', 28, 1),
(86, 'xịn ghê', '2021-06-03 03:17:50', 28, 1),
(89, 'sản phẩm đẹp quá', '2021-06-08 08:07:38', 27, 1),
(90, 'i phone đẹp quá', '2021-06-08 10:14:45', 35, 1),
(91, 'rẻ quá', '2021-06-10 07:43:43', 35, 1),
(92, 'xịn ghê', '2021-06-10 10:46:06', 35, 1),
(93, 'đẹp quá hihi', '2021-06-12 13:34:07', 6, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cpanel`
--

CREATE TABLE `cpanel` (
  `logo` varchar(500) NOT NULL,
  `background_menu` varchar(500) NOT NULL,
  `copy_right` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cpanel`
--

INSERT INTO `cpanel` (`logo`, `background_menu`, `copy_right`, `facebook`, `youtube`, `twitter`, `instagram`) VALUES
('./images/logo.png', '#3f72c6', 'Thế giới Iphone', 'https://www.facebook.com/trantien007', 'https://www.youtube.com/channel/UCHOpNoATku_c6hHhvvYVdLA', 'https://twitter.com', 'https://instagram.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `iddm` int(11) NOT NULL,
  `tendanhmuc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`iddm`, `tendanhmuc`) VALUES
(1, 'Iphone 12 Series'),
(2, 'Iphone 11 Series'),
(3, 'Iphone SE'),
(4, 'Iphone X Series'),
(5, 'Iphone Khác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phukien`
--

CREATE TABLE `phukien` (
  `idpk` int(11) NOT NULL,
  `tenpk` varchar(500) NOT NULL,
  `giagoc` float NOT NULL,
  `giakm` float NOT NULL,
  `images` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phukien`
--

INSERT INTO `phukien` (`idpk`, `tenpk`, `giagoc`, `giakm`, `images`) VALUES
(1, 'Tai nghe AirPods Pro Apple MWP22 Trắng', 10000000, 8900000, 'https://cdn.tgdd.vn/Products/Images/54/213711/tai-nghe-bluetooth-airpods-pro-apple-mwp22-ava-600x600.jpg'),
(2, 'Cáp Type C - Apple MLL82 Trắng', 900000, 1000000, 'https://cdn.tgdd.vn/Products/Images/58/158724/cap-type-c-type-c-2m-apple-mll82-trang-12-1-600x600.jpg'),
(3, 'Bút cảm ứng Apple Pencil Gen 1', 2900000, 2500000, 'https://cdn.tgdd.vn/Products/Images/1882/74048/apple-pencil-10-600x600.jpg'),
(4, 'Adapter 12W iPhone Apple MGN03 Trắng', 230000, 200000, 'https://cdn.tgdd.vn/Products/Images/58/226750/adapter-sac-12w-cho-iphone-ipad-ipod-apple-mgn03-ava-1-600x600.jpg'),
(5, 'Adapter 87W Apple MNF82 Trắng', 5900000, 5000000, 'https://cdn.tgdd.vn/Products/Images/58/209110/adapter-type-c-87w-cho-ipad-macbook-apple-trang-avatar-1-600x600.jpg'),
(6, 'Adapter 60W Apple MNF72 Trắng', 5000000, 4500000, 'https://cdn.tgdd.vn/Products/Images/58/209110/adapter-type-c-87w-cho-ipad-macbook-apple-trang-avatar-1-600x600.jpg'),
(7, 'Adapter 12W iPhone Apple MGN03 Trắng', 230000, 200000, 'https://cdn.tgdd.vn/Products/Images/58/226750/adapter-sac-12w-cho-iphone-ipad-ipod-apple-mgn03-ava-1-600x600.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `masp` int(11) NOT NULL,
  `tensp` varchar(200) NOT NULL,
  `DVT` float NOT NULL,
  `DonGia` float NOT NULL,
  `NCC` varchar(500) NOT NULL,
  `loai` varchar(10) NOT NULL,
  `chitietsp` longtext NOT NULL,
  `viewsp` int(11) NOT NULL,
  `iddm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`masp`, `tensp`, `DVT`, `DonGia`, `NCC`, `loai`, `chitietsp`, `viewsp`, `iddm`) VALUES
(1, 'iPhone 12 Pro Max 256GB (Đen)', 19000000, 15000000, 'https://cdn.tgdd.vn/Products/Images/42/228739/iphone-12-pro-xanh-duong-new-600x600-600x600.jpg', 'Chính hãng', 'Được xem là một trong những phiên bản iPhone giá rẻ của bộ 3<b> iPhone 12</b> series nhưng iPhone 12 256GB vẫn sở hữu cho mình rất nhiều ưu điểm mà hiếm có một chiếc smartphone nào khác sở hữu.<br>', 100, 1),
(3, 'Điện thoại iPhone 11 Pro Max 256GB', 19000000, 15000000, 'https://cdn.tgdd.vn/Products/Images/42/210648/iphone-11-den-600x600.jpg', 'Chính hãng', 'iPhone 11 256GB là chiếc máy có mức giá khá dễ chịu đến từ Apple. Nếu bạn không muốn bỏ ra số tiền quá lớn mà vẫn có được những nâng cấp về camera hay một hiệu năng đầy mạnh mẽ thì đây thực sự là một lựa chọn hàng đầu dành cho bạn.<b></b>', 109, 2),
(4, 'Điện thoại iPhone X 64GB', 14000000, 11000000, 'https://cdn.tgdd.vn/Products/Images/42/190325/iphone-xr-hopmoi-den-600x600-2-600x600.jpg', 'Xách tay', 'Là chiếc điện thoại iPhone có mức giá dễ chịu, phù hợp với nhiều khách hàng hơn, iPhone Xr vẫn được ưu ái trang bị chip Apple A12 mạnh mẽ, màn hình tai thỏ cùng khả năng kháng nước kháng bụi.<b></b>', 3, 4),
(5, 'Điện thoại iPhone SE 256GB 2020', 14000000, 10000000, 'https://cdn.tgdd.vn/Products/Images/42/222629/iphone-se-128gb-2020-trang-600x600.jpg', 'Xách tay', 'iPhone SE 256GB 2020 sản phẩm đến từ thương hiệu Apple với ngoại hình nhỏ gọn được sao chép từ iPhone 8 nhưng mang trong mình một hiệu năng mạnh mẽ với vi xử lý A13 Bionic, mức giá hấp dẫn hứa hẹn sẽ là yếu tố “hút khách” của smartphone đình đám đến từ nhà Táo khuyết.<b></b>', 18, 3),
(6, 'iPhone 12 Pro Max 128GB Mới', 39000000, 35000000, 'https://cdn.tgdd.vn/Products/Images/42/213031/iphone-12-violet-1-600x600.jpg', 'Chính hãng', 'Trong những tháng cuối năm 2020, Apple đã chính thức giới thiệu đến người dùng cũng như iFan thế hệ iPhone 12 series mới với hàng loạt tính năng bứt phá, thiết kế được lột xác hoàn toàn, hiệu năng đầy mạnh mẽ và một trong số đó chính là iPhone 12 128GB.<b></b>', 8, 1),
(7, 'Điện thoại iPhone SE 128GB 2020', 13000000, 9000000, 'https://cdn.tgdd.vn/Products/Images/42/222629/iphone-se-128gb-2020-trang-600x600.jpg', 'Xách tay', 'iPhone SE 128GB 2020 sản phẩm đến từ thương hiệu Apple với ngoại hình nhỏ gọn được sao chép từ iPhone 8 nhưng mang trong mình một hiệu năng mạnh mẽ với vi xử lý A13 Bionic, mức giá hấp dẫn hứa hẹn sẽ là yếu tố “hút khách” của smartphone đình đám đến từ nhà Táo khuyết.<b></b>', 2, 3),
(8, 'iPhone SE 128GB (2020) (Hộp mới)', 15000000, 14000000, 'https://cdn.tgdd.vn/Products/Images/42/222629/iphone-se-128gb-2020-trang-600x600.jpg', 'Chính hãng', 'iPhone SE 128GB2020 sản phẩm đến từ thương hiệu Apple với ngoại hình nhỏ gọn được sao chép từ iPhone 8 nhưng mang trong mình một hiệu năng mạnh mẽ với vi xử lý A13 Bionic, mức giá hấp dẫn hứa hẹn sẽ là yếu tố “hút khách” của smartphone đình đám đến từ nhà Táo khuyết.<b></b>', 1, 3),
(9, 'Điện thoại iPhone SE 64GB 2020', 9000000, 7000000, 'https://cdn.tgdd.vn/Products/Images/42/222629/iphone-se-128gb-2020-trang-600x600.jpg', 'Chính hãng', 'iPhone SE 64GB 2020 sản phẩm đến từ thương hiệu Apple với ngoại hình nhỏ gọn được sao chép từ iPhone 8 nhưng mang trong mình một hiệu năng mạnh mẽ với vi xử lý A13 Bionic, mức giá hấp dẫn hứa hẹn sẽ là yếu tố “hút khách” của smartphone đình đám đến từ nhà Táo khuyết.<b></b>', 2, 3),
(10, 'Điện thoại iPhone 12 Pro Max 64GB', 29000000, 25000000, 'https://cdn.tgdd.vn/Products/Images/42/228744/iphone-12-pro-max-vang-new-600x600-600x600.jpg', 'Xách tay', 'iPhone 12 Pro Max 64GB - đẳng cấp từ tên gọi đến từng chi tiết. Ngay từ khi chỉ là tin đồn thì chiếc smartphone này đã làm đứng ngồi không yên bao “fan cứng” nhà Apple, với những nâng cấp vô cùng nổi bật hứa hẹn sẽ mang đến những trải nghiệm tốt nhất về mọi mặt mà chưa một chiếc iPhone tiền nhiệm nào có được.<b></b>', 7, 1),
(11, 'iPhone 12 Pro Max 256GB (Đen)', 19000000, 15000000, 'https://cdn.tgdd.vn/Products/Images/42/228739/iphone-12-pro-xanh-duong-new-600x600-600x600.jpg', 'Chính hãng', '<b><font color=', 2, 1),
(17, 'iPhone 12 Pro Max 256GB (Đen)', 19000000, 15000000, 'https://cdn.tgdd.vn/Products/Images/42/228739/iphone-12-pro-xanh-duong-new-600x600-600x600.jpg', 'Chính hãng', '<b><font color=', 13, 1),
(26, 'iPhone 11 Pro Max 256GB (Xanh)', 18000000, 15000000, 'https://cdn.tgdd.vn/Products/Images/42/153856/iphone-xi-do-600x600.jpg', 'Chính hãng', '<b></b>', 7, 2),
(27, 'Điện thoại iPhone 11 Pro Max 64GB', 18000000, 14000000, 'https://cdn.tgdd.vn/Products/Images/42/210644/iphone-11-xanhla-600x600.jpg', 'Xách tay', '<b></b>', 14, 2),
(28, 'iPhone 11 Pro Max 256GB LN', 13000000, 11000000, 'https://cdn.tgdd.vn/Products/Images/42/210644/iphone-11-xanhla-600x600.jpg', 'Chính hãng', 'Được xem là một trong những phiên bản iPhone giá rẻ của bộ 3 <i><b>iPhone 11</b></i> series nhưng iPhone 11 256<b><u>GB</u></b> vẫn sở hữu cho mình rất nhiều ưu điểm mà hiếm có một chiếc smartphone nào khác sở hữu.<br><br>Nâng cấp mạnh mẽ về cụm camera Năm nay với iPhone 11 thì Apple đã nâng cấp khá nhiều về camera nếu so sánh với chiếc iPhone Xr 128GB năm ngoái.<br>', 311, 2),
(35, 'Điện thoại iPhone X 128GB', 16000000, 15000000, 'https://cdn.tgdd.vn/Products/Images/42/191483/iphone-xr-128gb-600x600.jpg', 'Xách tay', 'Được xem là phiên bản iPhone giá rẻ đầy hoàn hảo, iPhone Xr 128GB khiến người dùng có nhiều sự lựa chọn hơn về màu sắc đa dạng nhưng vẫn sở hữu cấu hình mạnh mẽ và thiết kế sang trọng. Màn hình tràn viền công nghệ LCD - True Tone Thay vì sở hữu màn hình OLED truyền thống, chiếc smartphone này sở hữu màn hình LCD.<br><br>Bù lại với công nghệ True Tone cùng màn hình tràn viền rộng tới 6.1 inch, mọi trải nghiệm trên máy vẫn đem lại sự thích thú và hoàn hảo, như dòng cao cấp khác của Apple.<br>', 27, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `images` varchar(250) NOT NULL,
  `title` varchar(100) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `link` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`id`, `images`, `title`, `detail`, `link`) VALUES
(1, 'https://cdn.tgdd.vn/Products/Images/42/228739/iphone-12-pro-xanh-duong-new-600x600-600x600.jpg', 'iPhone 12 Pro Max 256GB (Đen)', 'Responsive Slideshow Gallery ', 'http://localhost/ASSIGNMENT/product.php?masp=1&iddm=1'),
(2, 'https://cdn.tgdd.vn/Products/Images/42/213031/iphone-12-violet-1-600x600.jpg', 'iPhone 12 Pro Max 128GB Mới', 'Apple đã chính thức giới thiệu đến người dùng cũng như iFan thế hệ iPhone 12 series', 'http://localhost/ASSIGNMENT/product.php?masp=6&iddm=1'),
(3, 'https://cdn.tgdd.vn/Products/Images/42/210648/iphone-11-den-600x600.jpg', 'iPhone 11 Pro Max 256GB', 'iPhone 11 256GB là chiếc máy có mức giá khá dễ chịu đến từ Apple', 'http://localhost/assignment/product.php?masp=3&iddm=2'),
(4, 'https://cdn.tgdd.vn/Products/Images/42/222629/iphone-se-128gb-2020-trang-600x600.jpg', 'Điện thoại iPhone SE 256GB 2020', 'iPhone SE 256GB 2020 sản phẩm đến từ thương hiệu Apple', 'http://localhost/ASSIGNMENT/product.php?masp=5&iddm=3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `images` varchar(500) NOT NULL,
  `sdt` int(10) NOT NULL,
  `gioithieu` varchar(500) NOT NULL,
  `isAdmin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `email`, `images`, `sdt`, `gioithieu`, `isAdmin`) VALUES
(1, 'admin', '123456', 'admin@gmail.com', 'http://localhost/assignment/Cpanel/assets/img/avatar.png', 123456789, 'Tôi là Tiến, một người yêu CNTT với ước mơ trở thành một Developer & Designer chuyên nghiệp, tôi thích khám phá, tìm tòi, học hỏi những điều thú vị trên mạng Internet. Biết đôi chút về HTML, CSS, JS, PTS,...', 1),
(2, 'Soobin Hoàng Sơn', '123456', 'nguoidung@gmail.com', 'https://yt3.ggpht.com/ytc/AAUvwnjOhuOBHhL2ujoDVeyYnr1J0AkDeQ8t3kw2HJ9lIA=s900-c-k-c0x00ffffff-no-rj', 911, 'không biết giới thiệu gì', 0),
(11, 'Messi', '123456', 'messi@gmail.com', 'http://localhost/assignment/Cpanel/assets/img/avatar-150.png', 0, 'giới thiệu bản thân ở đây!', 0),
(12, 'Định', '123456', 'dinh@gmail.com', 'http://localhost/assignment/Cpanel/assets/img/avatar-150.png', 0, 'giới thiệu bản thân ở đây!', 0),
(14, 'trọng anh', '123456', 'tronganh@gmail.com', 'http://localhost/assignment/Cpanel/assets/img/avatar-150.png', 0, 'giới thiệu bản thân ở đây!', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cmt`
--
ALTER TABLE `cmt`
  ADD PRIMARY KEY (`idcmt`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `masp` (`masp`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`iddm`);

--
-- Chỉ mục cho bảng `phukien`
--
ALTER TABLE `phukien`
  ADD PRIMARY KEY (`idpk`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `iddm` (`iddm`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cmt`
--
ALTER TABLE `cmt`
  MODIFY `idcmt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `iddm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `phukien`
--
ALTER TABLE `phukien`
  MODIFY `idpk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `masp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cmt`
--
ALTER TABLE `cmt`
  ADD CONSTRAINT `cmt_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`),
  ADD CONSTRAINT `cmt_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `product` (`masp`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`iddm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
