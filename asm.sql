-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 05, 2022 lúc 06:10 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.11

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
(1, 'RAM - Bá»™ nhá»› trong'),
(2, 'MAINBOARD - BO Máº CH CHá»¦'),
(3, 'VGA - CARD MÃ€N HÃŒNH'),
(4, 'CASE - Vá»Ž MÃY TÃNH'),
(26, 'á»” Cá»¨NG HDD');

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
(6, 'RAM SERVER & WORKSTATION KINGSTON (KSM26ES8/8HD) 8GB DDR4 2666MHZ ECC', 1819000, 1599000, '250_57920_kingston_8gb_kdm26es8_8hd.jpg', 'ChÃ­nh hÃ£', 'Trong nh?ng thï¿½ng cu?i n?m 2020, Apple ?ï¿½ chï¿½nh th?c gi?i thi?u ??n ng??i dï¿½ng c?ng nh? iFan th? h? iPhone 12 series m?i v?i hï¿½ng lo?t tï¿½nh n?ng b?t phï¿½, thi?t k? ???c l?t xï¿½c hoï¿½n toï¿½n, hi?u n?ng ??y m?nh m? vï¿½ m?t trong s? ?ï¿½ chï¿½nh lï¿½ iPhone 12 128GB.<b></b>', 8, 1),
(7, 'RAM DESKTOP CORSAIR VENGEANCE PRO RGB (CMW16GX4M2D3000C16) 16GB', 2999000, 9000000, '250_47008_corsair_vengeance_pro_rgb.jpg', 'XÃ¡ch tay', 'iPhone SE 128GB 2020 s?n ph?m ??n t? th??ng hi?u Apple v?i ngo?i hï¿½nh nh? g?n ???c sao chï¿½p t? iPhone 8 nh?ng mang trong mï¿½nh m?t hi?u n?ng m?nh m? v?i vi x? lï¿½ A13 Bionic, m?c giï¿½ h?p d?n h?a h?n s? lï¿½ y?u t? ï¿½hï¿½t khï¿½chï¿½ c?a smartphone ?ï¿½nh ?ï¿½m ??n t? nhï¿½ Tï¿½o khuy?t.<b></b>', 3, 1),
(8, 'KIT RAM 4 KINGSTON HYPERX FURY BLACK 16GB BUS 2666MHZ (2*8GB) - HX426C16FB3K2/16', 2399000, 1959000, '250_48825_hyperx_fury_16gb_2666mhz_ddr4_cl16_dimm_1rx8_black_xmp_desktop_memory_hx426c16fb3k2_16.jpg', 'ChÃ­nh hÃ£', 'iPhone SE 128GB2020 s?n ph?m ??n t? th??ng hi?u Apple v?i ngo?i hï¿½nh nh? g?n ???c sao chï¿½p t? iPhone 8 nh?ng mang trong mï¿½nh m?t hi?u n?ng m?nh m? v?i vi x? lï¿½ A13 Bionic, m?c giï¿½ h?p d?n h?a h?n s? lï¿½ y?u t? ï¿½hï¿½t khï¿½chï¿½ c?a smartphone ?ï¿½nh ?ï¿½m ??n t? nhï¿½ Tï¿½o khuy?t.<b></b>', 1, 1),
(9, 'RAM DESKTOP ADATA XPG SPECTRIX D41 RGB GREY (AX4U320016G16A-ST41) 16GB', 2399000, 2029000, '250_60545_ram_desktop_adata_xpg_spectrix_d41_rgb_grey_5.jpeg', 'ChÃ­nh hÃ£', 'iPhone SE 64GB 2020 s?n ph?m ??n t? th??ng hi?u Apple v?i ngo?i hï¿½nh nh? g?n ???c sao chï¿½p t? iPhone 8 nh?ng mang trong mï¿½nh m?t hi?u n?ng m?nh m? v?i vi x? lï¿½ A13 Bionic, m?c giï¿½ h?p d?n h?a h?n s? lï¿½ y?u t? ï¿½hï¿½t khï¿½chï¿½ c?a smartphone ?ï¿½nh ?ï¿½m ??n t? nhï¿½ Tï¿½o khuy?t.<b></b>', 2, 1),
(10, 'RAM DESKTOP GIGABYTE AORUS (GP-ARS32G52D5) 32GB (2X16GB) DDR5 5200MHZ ', 8299000, 8299000, '250_62640_ram_desktop_gigabyte_aorus_gp_ars32g52d5_32gb_2x16gb_ddr5_5200mhz_1.jpg', 'ChÃ­nh hÃ£', 'iPhone 12 Pro Max 64GB - ??ng c?p t? tï¿½n g?i ??n t?ng chi ti?t. Ngay t? khi ch? lï¿½ tin ??n thï¿½ chi?c smartphone nï¿½y ?ï¿½ lï¿½m ??ng ng?i khï¿½ng yï¿½n bao ï¿½fan c?ngï¿½ nhï¿½ Apple, v?i nh?ng nï¿½ng c?p vï¿½ cï¿½ng n?i b?t h?a h?n s? mang ??n nh?ng tr?i nghi?m t?t nh?t v? m?i m?t mï¿½ ch?a m?t chi?c iPhone ti?n nhi?m nï¿½o cï¿½ ???c.<b></b>', 7, 1),
(11, 'RAM DESKTOP CORSAIR VENGEANCE LPX BLACK HEATSPREADER', 10699000, 10699000, '250_63350_ram_desktop_corsair_vengeance_lpx_black_heatspreader_cmk32gx5m2b5600c36_32gb_2x16gb_ddr5_5600mhz_1.jpg', 'ChÃ­nh hÃ£', '<b></b>', 2, 1),
(17, 'CARD MÃ€N HÃŒNH ASUS PH RTX 3050-8G', 10999000, 10699000, '250_63732_card_man_hinh_asus_ph_rtx_3050_8g_1.jpg', 'ChÃ­nh hÃ£', '<b></b>', 14, 3),
(26, 'CARD MÃ€N HÃŒNH ASUS ROG-STRIX-RTX 3050-O8G-GAMING', 13999000, 13699000, '250_63733_card_man_hinh_asus_rog_strix_rtx_3050_o8g_gaming_1.jpg', 'ChÃ­nh hÃ£', '<b></b>', 7, 3),
(27, 'CARD MÃ€N HÃŒNH ASUS ROG-STRIX-RTX 3050-8G-GAMING', 13799000, 12799000, '250_63734_card_man_hinh_asus_rog_strix_rtx_3050_8g_gaming_1.jpg', 'ChÃ­nh hÃ£', '<b></b>', 16, 3),
(28, 'CARD MÃ€N HÃŒNH INNO3D GTX 1660 SUPER TWIN X2 6GB (N166S2-06D6-1712VA15L)', 13299000, 11599000, '250_49621_inno3d_gtx_1660_super_twin_x2_01.jpg', 'XÃ¡ch tay', '???c xem lï¿½ m?t trong nh?ng phiï¿½n b?n iPhone giï¿½ r? c?a b? 3 <i><b>iPhone 11</b></i> series nh?ng iPhone 11 256<b><u>GB</u></b> v?n s? h?u cho mï¿½nh r?t nhi?u ?u ?i?m mï¿½ hi?m cï¿½ m?t chi?c smartphone nï¿½o khï¿½c s? h?u.<br><br>Nï¿½ng c?p m?nh m? v? c?m camera N?m nay v?i iPhone 11 thï¿½ Apple ?ï¿½ nï¿½ng c?p khï¿½ nhi?u v? camera n?u so sï¿½nh v?i chi?c iPhone Xr 128GB n?m ngoï¿½i.<br>', 330, 3),
(35, 'CARD MÃ€N HÃŒNH GIGABYTE RTX 2060 WINDFORCE OC - 12GD (12GB GDDR6, 192-BIT, HDMI+DP,', 15999000, 14799000, '250_62473_card_man_hinh_gigabyte_rtx_2060_windforce_oc_12gd_1.jpg', 'XÃ¡ch tay', '???c xem lï¿½ phiï¿½n b?n iPhone giï¿½ r? ??y hoï¿½n h?o, iPhone Xr 128GB khi?n ng??i dï¿½ng cï¿½ nhi?u s? l?a ch?n h?n v? mï¿½u s?c ?a d?ng nh?ng v?n s? h?u c?u hï¿½nh m?nh m? vï¿½ thi?t k? sang tr?ng. Mï¿½n hï¿½nh trï¿½n vi?n cï¿½ng ngh? LCD - True Tone Thay vï¿½ s? h?u mï¿½n hï¿½nh OLED truy?n th?ng, chi?c smartphone nï¿½y s? h?u mï¿½n hï¿½nh LCD.<br><br>Bï¿½ l?i v?i cï¿½ng ngh? True Tone cï¿½ng mï¿½n hï¿½nh trï¿½n vi?n r?ng t?i 6.1 inch, m?i tr?i nghi?m trï¿½n mï¿½y v?n ?em l?i s? thï¿½ch thï¿½ vï¿½ hoï¿½n h?o, nh? dï¿½ng cao c?p khï¿½c c?a Apple.<br>', 38, 3),
(38, 'CARD MÃ€N HÃŒNH MSI RTX 3080 TI GAMING X TRIO 12G', 47999000, 45999000, '250_59525_card_man_hinh_msi_rtx_3080_ti_gaming_x_trio_12g.jpg', 'XÃ¡ch tay', 'Trong nh?ng thï¿½ng cu?i n?m 2020, Apple ?ï¿½ chï¿½nh th?c gi?i thi?u ??n ng??i dï¿½ng c?ng nh? iFan th? h? iPhone 12 series m?i v?i hï¿½ng lo?t tï¿½nh n?ng b?t phï¿½, thi?t k? ???c l?t xï¿½c hoï¿½n toï¿½n, hi?u n?ng ??y m?nh m? vï¿½ m?t trong s? ?ï¿½ chï¿½nh lï¿½ iPhone 12 128GB.<b></b>', 1, 3),
(39, 'Vá»Ž CASE INWIN A1 PLUS WHITE QI CHARGER - FULL SIDE TEMPERED GLASS MINI ITX ( MINI', 5759000, 4949000, '250_51730_inwin_a1_plus_white_0000_1.jpg', 'ChÃ­nh hÃ£', '<br>', 0, 4),
(40, 'Vá»Ž CASE IN-WIN 305 - FULL SIDE TEMPERED GLASS (MID TOWER/MÃ€U ÄEN)', 3529000, 2739000, '250_42537_case_in_win_305_black___full_side_tempered_glass_mid_tower_0005_1__1_.jpg', 'ChÃ­nh hÃ£', '<br>', 0, 4),
(41, 'Vá»Ž CASE NZXT H510 MATTE (MID TOWER/MÃ€U ÄEN)', 15520000, 14000000, '250_47673_case_nzxt_h510_matte_black_0004_1__1_.jpg', 'ChÃ­nh hÃ£', '<br>', 0, 4),
(42, 'Vá»Ž CASE XIGMATEK AQUARIUS PLUS (MID-TOWER /MÃ€U TRáº®NG)', 2200000, 2100000, '250_48574_case_xigmatek_aquarius_plus_white_no_fan_0003_1__4_.jpg', 'ChÃ­nh hÃ£', '<br>', 0, 4),
(43, 'HDD WD GOLD (2TB/3.5/SATA 3/128MB CACHE/7200RPM) (WD2005FBYZ)', 3500000, 3100000, '250_51401_hdd_wd_gold_2tb35sata_3128mb_cache7200rpm_wd2005fbyz_01.jpg', 'ChÃ­nh hÃ£', '<br>', 0, 26),
(44, 'HDD WD GOLD (1TB/3.5/SATA 3/128MB CACHE/7200RPM) (WD1005FBYZ)', 2399000, 2199000, '250_51401_hdd_wd_gold_2tb35sata_3128mb_cache7200rpm_wd2005fbyz_01.jpg', 'ChÃ­nh hÃ£', '<br>', 0, 26),
(45, 'MAINBOARD ASUS ROG STRIX X570-E GAMING (AMD X570, SOCKET AM4, ATX, 4 KHE RAM', 8389000, 8089000, '250_47571_rog_strix_x570_e_gaming_aura_sync_01.png', 'ChÃ­nh hÃ£', '<br>', 0, 2),
(46, 'MAINBOARD ASUS ROG X570 CROSSHAIR VIII HERO (AMD X570, SOCKET AM4, ATX, 4 KHE RAM', 10709000, 9709000, '250_47571_rog_strix_x570_e_gaming_aura_sync_01.png', 'ChÃ­nh hÃ£', '<br>', 0, 2),
(47, 'MAINBOARD ASUS ROG STRIX X570-F GAMING (AMD X570 ,SOCKET AM4, ATX, 4 KHE RAM', 7900000, 7600000, '250_47571_rog_strix_x570_e_gaming_aura_sync_01.png', 'ChÃ­nh hÃ£', '<br>', 0, 2);

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
(2, '250_42537_case_in_win_305_black___full_side_tempered_glass_mid_tower_0005_1__1_.jpg', 'Vá»Ž CASE NZXT H510 ELITE (MID TOWER/MÃ€U ÄEN)', 'Vá»Ž CASE NZXT H510 ELITE (MID TOWER/MÃ€U ÄEN)', 'http://localhost/ASSIGNMENT/product.php?masp=6&iddm=1'),
(3, '250_48825_hyperx_fury_16gb_2666mhz_ddr4_cl16_dimm_1rx8_black_xmp_desktop_memory_hx426c16fb3k2_16.jpg', 'RAM DESKTOP GSKILL RIPJAWS V (F4-3200C16D-16GVKB) 16GB (2X8GB) DDR4 3200MHZ', 'RAM DESKTOP GSKILL RIPJAWS V (F4-3200C16D-16GVKB) 16GB (2X8GB) DDR4 3200MHZ', 'http://localhost/assignment/product.php?masp=3&iddm=2'),
(4, '250_47178_rog_strix_x570_f_gaming_aura_sync_01.png', 'MAINBOARD ASUS ROG STRIX X570-E GAMING (AMD X570, SOCKET AM4, ATX, 4 KHE RAM', 'MAINBOARD ASUS ROG STRIX X570-E GAMING (AMD X570, SOCKET AM4, ATX, 4 KHE RAM', 'http://localhost/assignment/product.php?masp=3&iddm=2'),
(13, '250_48574_case_xigmatek_aquarius_plus_white_no_fan_0003_1__4_.jpg', 'Vá»Ž CASE GAMEMAX REVOLT (MID TOWER/MÃ€U ÄEN)', 'MAINBOARD ASUS ROG STRIX X570-E GAMING (AMD X570, SOCKET AM4, ATX, 4 KHE RAM', 'http://localhost/assignment/product.php?masp=3&iddm=2');

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
(1, 'admin', '123456', 'admin@gmail.com', 'https://i-giaitri.vnecdn.net/2021/03/14/Avatar-1615695904-2089-1615696022_680x0.jpg', 123456789, 'Tï¿½i lï¿½ Ti?n, m?t ng??i yï¿½u CNTT v?i ??c m? tr? thï¿½nh m?t Developer & Designer chuyï¿½n nghi?p, tï¿½i thï¿½ch khï¿½m phï¿½, tï¿½m tï¿½i, h?c h?i nh?ng ?i?u thï¿½ v? trï¿½n m?ng Internet. Bi?t ?ï¿½i chï¿½t v? HTML, CSS, JS, PTS,...', 1);

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
  MODIFY `iddm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `phukien`
--
ALTER TABLE `phukien`
  MODIFY `idpk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `masp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`iddm`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
