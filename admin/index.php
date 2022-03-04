<!DOCTYPE html>
<?php
    require_once('./SanPhamDB.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/style-responsive.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../wowjs/css/libs/animate.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <!-- open header -->
        <header>
            <div class="top-head">
                <img style="animation: rotato-q 2s ease;" src="../images/logo.png" alt="">
                <ul class="wow fadeInRight" data-wow-duration="2s" data-wow-delay=".1s">
                    <li><a href="">Information</a></li>
                    <li><a href="">Service</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="#">Chào bạn Ad</a></li>
                </ul>
            </div>
            <!-- close top-head -->
            <nav>
                <div class="nav-left">
                    <span id="menudt" style="font-size: 2.5rem; color: #fff; cursor: pointer; margin-left: 5px;">☰</span>
                    <span id="menudt2" style="font-size: 2.5rem; color: #fff; cursor: pointer; display: none; margin-left: 5px; margin-top: 10px;">☵</span>
                    <ul id="desktop-nav-left">
                        <li><a href="../index.php">HOME</a></li>
                        <li><a href="">IPHONE MỚI</a></li>
                        <li><a href="">IPHONE CŨ</a></li>
                        <li id="pkcl"><a href="#product-all-111">PHỤ KIỆN</a></li>
                        <li id="antrendesktop">
                            <input type="search" placeholder="Tìm kiếm">
                          </li>
                    </ul>
                </div>
                <div class="nav-right">
                    <i id="searchtx"><input type="text" placeholder="Nhập tên sản phẩm cần tìm!">
                        <button><i class="fa fa-search" aria-hidden="true"></i></button></i>
                    <div class="cart"><a href="./Cart/cart.html"><i style="background-color: #ffac00; padding: 8px; border-radius: 50%; opacity: .9;" class="fa fa-shopping-cart" aria-hidden="true"></i><span> Giỏ Hàng</span></a></div>
                </div>
            </nav>
        </header>
        <!-- close header -->
        <div class="content">
            <!-- <div class="banner wow fadeInDown" data-wow-duration="1.5s">
                <img src="../images/banner.jpg" alt="">
            </div> -->
            <div class="top-active">
                <div class="active-on wow bounceInLeft" data-wow-duration="1.5s" data-wow-delay="1.5s">
                    <img src="../images/giaohang.svg" width="100%" height="100%" alt="">
                    <div class="text-on">
                        <h4>Tín</h4>
                        <p>Luôn đặt chữ tín lên hàng đầu</p>
                    </div>
                </div>
                <div class="active-on wow bounceInLeft" data-wow-duration="1.5s" data-wow-delay="1s">
                    <img src="../images/hotro.svg" width="100%" height="100%" alt="">
                    <div class="text-on">
                        <h4>Nghĩa</h4>
                        <p>Sống phải có nghĩa khí</p>
                    </div>
                </div>
                <div class="active-on wow bounceInRight" data-wow-duration="1.5s" data-wow-delay="1s">
                    <img src="../images/safe.svg" width="100%" height="100%" alt="">
                    <div class="text-on">
                        <h4>Danh</h4>
                        <p>Xây dựng thương hiệu uy tín thành danh</p>
                    </div>
                </div>
                <div class="active-on wow bounceInRight" data-wow-duration="1.5s" data-wow-delay="1.5s">
                    <img src="../images/chatluong.svg" width="100%" height="100%" alt="">
                    <div class="text-on">
                        <h4>Lợi</h4>
                        <p>Luôn đặt lợi ích của bản thân sau cùng</p>
                    </div>
                </div>
            </div>
            <div class="admin-main">
                <div class="admin-top">
                    <h2>Admin Cpanel</h2>
                </div>
                <div class="admin-main-content">
                        <form class="themdulieu" action="" method="post">
                            <p><h2 id="updateText1">Thêm dữ liệu</h2><h2 id="updateText2">Update dữ liệu</h2></p>
                            <p><span>Mã sản phẩm</span><input type="text" name="maSP" id="maSP" value="" required></p>
                            <p><span>Tên sản phẩm</span><input type="text" name="tenSP" id="tenSP" required></p>
                            <p><span>Đơn vị tính</span><input type="text" name="DVT" id="DVT" required></p>
                            <p><span>Đơn giá</span><input type="text" name="donGia" id="DonGia" required></p>
                            <p><span>NCC</span><input type="text" name="ncc" id="NCC" required></p>
                            <p><span>loai</span><input type="text" name="loai" id="loai" required></p>
                            <p id="themOKCT"><input id="themOK" type="submit" name="submitOK" id="" value="Thêm"></p>
                            <p><input id="capnhatOK" type="submit" name="updateOK" id="" value="Update"></p>
                            <?php
                                if (isset($_POST['submitOK'])) {
                                    $maSP = $_POST['maSP'];
                                    $tenSP = $_POST['tenSP'];
                                    $DVT = $_POST['DVT'];
                                    $donGia = $_POST['donGia'];
                                    $ncc = $_POST['ncc'];
                                    $loai = $_POST['loai'];
                                    $insert_product = insert_product($maSP, $tenSP, $DVT, $donGia, $ncc, $loai);
                                }
                                if (isset($_POST["updateOK"])) {
                                    $maSP = $_POST['maSP'];
                                    $tenSP = $_POST['tenSP'];
                                    $DVT = $_POST['DVT'];
                                    $donGia = $_POST['donGia'];
                                    $NCC = $_POST['ncc'];
                                    updateOK($maSP, $tenSP, $DVT, $donGia, $NCC);
                                }
                            ?>
                        </form>
                    <div class="hienthidulieu">
                        <?php if (isset($_POST['btnXoaAll'])) {del_all_product();} ?>
                        <h2>Hiển thị dữ liệu</h2>
                        <form action="" method="post">
                        <button id='hienThi' name='btnView'>Hiển Thị</button>
                        <button id='An' name='btnView'>Load...</button>
                        <button id="hienThi" name="btnXoaAll">Xoá All</button>
                        </form>
                        <?php if (isset($_POST['btnView'])) { view_product();} ?>
                        <?php if (isset($_POST['btnXoa'])) { $maSP = $_POST['btnXoa']; del_product($maSP);} ?>
                        <?php if (isset($_POST['btnSua'])) { $maSP = $_POST['btnSua'];$resulttimkiem = searchID($maSP);}?>
                    </div>
                </div>
            </div>
            <div class="lienhe">
                <div class="lienhe-content wow bounceInLeft" data-wow-duration="2s" data-wow-delay="1s">
                    <h2 id="title-all-lh">Trợ giúp</h2>
                    <div class="widget-content">
                        <ul>
                            <li><a href="#">Thanh toán</a></li>
                            <li><a href="#">Vận chuyển</a></li>
                            <li><a href="#">Đổi trả</a></li>
                            <li><a href="#">Hướng dẫn khác</a></li>
                        </ul>
                    </div>
                </div>
                <div class="lienhe-content wow bounceInLeft" data-wow-duration="2s" data-wow-delay=".5s">
                    <h2 id="title-all-lh">VỀ CHÚNG TÔI</h2>
                    <div class="widget-content">
                        <ul>
                            <li><a href="#">Thương hiệu</a></li>
                            <li><a href="#">Địa chỉ</a></li>
                            <li><a href="#">Giám đốc</a></li>
                            <li><a href="#">KTV</a></li>
                        </ul>
                    </div>
                </div>
                <div class="lienhe-content wow bounceInDown" data-wow-duration="2s" data-wow-delay="1.5s">
                    <h2 id="title-all-lh">QUYỀN RIÊNG TƯ</h2>
                    <div class="widget-content">
                        <ul>
                            <li><a href="#">Chính sách quyền riêng tư</a></li>
                            <li><a href="#">Chương trình Afliate</a></li>
                            <li><a href="#">Các điều khoản & điều kiện</a></li>
                            <li><a href="#">TienDatComputer Directory</a></li>
                        </ul>
                    </div>
                </div>
                <div class="lienhe-content wow bounceInRight" data-wow-duration="2s" data-wow-delay=".5s">
                    <h2 id="title-all-lh">DỊCH VỤ online</h2>
                    <div class="widget-content">
                        <ul>
                            <li><a href="#">Checked Iphone</a></li>
                            <li><a href="#">Mua đi bán lại</a></li>
                            <li><a href="#">Trả góp</a></li>
                            <li><a href="#">Dịch vụ khác</a></li>
                        </ul>
                    </div>
                </div>
                <div class="lienhe-content itembian wow bounceInRight" data-wow-duration="2s" data-wow-delay="1s">
                    <h2 id="title-all-lh">DỊCH VỤ GIAO HÀNG</h2>
                    <div class="widget-content">
                        <ul>
                            <li><a href="#">Viettel Post</a></li>
                            <li><a href="#">Giao hàng nhanh</a></li>
                            <li><a href="#">Giao hàng tiết kiệm</a></li>
                            <li><a href="#">Giao hàng J TET</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="big-content-footer">
                <div class="content-footer">
                    <div class="content-footer-on">
                        <h2>Chấp nhận thanh toán</h2>
                        <img src="../images/thanhtoan.png" alt="">
                    </div>
                    <div class="content-footer-on">
                        <h2>Đơn vị vận chuyển</h2>
                        <img src="../images/vanchuyen.png" alt="">
                    </div>
                </div>
            </div>
            <div class="content-footer-down">
                <span id="mobile-sp">Copyright © 2021 TienDatComputer</span>
                <span id="mobile-ok">©TienDatComputer</span>
                <span>
                    <ul>
                        <li>Mạng xã hội:</li>
                        <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </span>
            </div>
        </footer>   
    </div>

    <style>
        .back-to-top{
        cursor: pointer;
        opacity: 0;
        background: #333;
        padding: 15px;
        border-radius: 5rem;
        width: 50px;
        height: 50px;
        position: fixed;
        bottom: 3.5%;
        right: 1.5%;
        transition: .5s all ease;
        color: #fff;
        font-size: 30px;
        align-items: center;
        justify-content: center;
        pointer-events: none;
        transition: 1s all ease;
        }
        .back-to-top:hover{
            background: rgb(80, 176, 206);
        }
        .content{
            margin: initial !important;
        }
    </style>
    <div class="back-to-top"><i class="fas fa-angle-up"></i></div>
    <script>
        window.onscroll = function () { backtop(); };
        var backtotop = document.querySelector('.back-to-top');
        function backtop() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                backtotop.style.display = 'flex';
                backtotop.style.opacity = '1';
                backtotop.style.pointerEvents = "all";
            } else {
                backtotop.style.opacity = '0';
                backtotop.style.pointerEvents = "none";
            }
        }
        backtotop.addEventListener('click', () =>{
            document.body.scrollTop = '0';
            document.documentElement.scrollTop = '0';
        });
    </script>

    <script src="../js/app.js"></script>
    <script src="../wowjs/wow.min.js"></script>
    <script src="./appadmin.js"></script>
    <script>
        new WOW().init();
    </script>
    <?php
        if (isset($_POST["btnAdd"])) {
            $code = $_POST["btnAdd"];
            echo $code;
        }
    ?>
</body>

</html>