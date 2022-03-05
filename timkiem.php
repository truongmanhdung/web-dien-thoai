<?php
    session_start();
    require_once("./admin/SanPhamDB.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop IPhone Online</title>
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style-responsive.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./wowjs/css/libs/animate.css">
    <link rel="stylesheet" href="./css/slide.css">
    <?php background_before() ?>
</head>

<body onload="loadthongbaongay()">
    <div class="container">
        <!-- open header -->
        <header>
            <div class="top-head">
                <a href="./index.php"><?php logo() ?></a>
                <ul class="wow fadeInRight" data-wow-duration="2s" data-wow-delay=".1s">
                    <li><a href="./">Trang chủ</a></li>
                    <?php if(isset($_SESSION['dangnhap'])){}else{echo '<li><a href="#">Về chúng tôi</a></li><li><a href="#">Dịch vụ</a></li>';} ?>
                    <li><?php if(isset($_SESSION['dangnhap'])){echo '<span>'.'Xin chào: '.'<a href="./Cpanel/pages-profile.php">'.$_SESSION['dangnhap'].'</a>'.'<form style="display: inline; padding: 10px;" action="" method="post"><button style="border: none; background: none;cursor: pointer;" name="logout" type="submit"><i style="padding: 5px; color: #4175c8; font-size: 18px;" class="fas fa-sign-out-alt"></i></button></form>'.'</span>';}else{echo'<a href="./login">Đăng nhập</a>';}; if(isset($_POST['logout'])){echo '<script>alert("Bạn đã đăng xuất")</script>'; unset($_SESSION['dangnhap']); header( "Refresh:0");} ?></li>
                    
                </ul>
            </div>
            <!-- close top-head -->
            <nav <?php background_menu() ?> >
                <div class="nav-left">
                    <span id="menudt" style="font-size: 2.5rem; color: #fff; cursor: pointer; margin-left: 5px;">☰</span>
                    <span id="menudt2" style="font-size: 2.5rem; color: #fff; cursor: pointer; display: none; margin-left: 5px; margin-top: 10px;">☵</span>
                    <ul id="desktop-nav-left">
                        <li><a href="./">HOME</a></li>
                        <!-- <li><a href="#">IPHONE MỚI</a></li>
                        <li><a href="#">IPHONE CŨ</a></li> -->
                        <!-- <li id="pkcl"><a href="#product-all-111">PHỤ KIỆN</a></li> -->
                        <li id="antrendesktop">
                            <input type="search" placeholder="Tìm kiếm">
                          </li>
                    </ul>
                </div>
                <div class="nav-right">
                    <form action="./timkiem.php" method="post" id="searchtx"><input type="text" name="contentTK" placeholder="Nhập tên sản phẩm cần tìm!">
                        <button type="submit" name="btnTK">Tìm</button></form>
                    <div class="cart"><a href="./giohang/addcard.php"><i style="background-color: #ffac00; padding: 8px; border-radius: 50%; opacity: .9;" class="fa fa-shopping-cart" aria-hidden="true"></i><span> Giỏ Hàng</span></a></div>
                </div>
            </nav>
        </header>
        <!-- close header -->
        <div class="content">
            <div class="banner wow fadeInDown" data-wow-duration="1.5s">
                <!-- <img src="./images/banner.jpg" alt=""> -->
                <div class="danhmuc">
                <h2 <?php background_menu() ?>>Danh mục</h2>
                <form action="#denphansanpham" method="post">
                <ul class="danhmuccon">
                   <?php view_DM_home(); ?>
                </ul>
                </form>
                </div>
                <!-- slide -->
                <div class="CSSgal">

  <!-- Don't wrap targets in parent -->
  <s id="s1"></s> 
  <s id="s2"></s>
  <s id="s3"></s>
  <s id="s4"></s>

  <div class="slider">
  <?php slider(); ?>
  </div>
  
  <div class="prevNext">
    <div><a href="#s4"><i class="fas fa-chevron-left"></i></a><a href="#s2"><i class="fas fa-chevron-right"></i></a></div>
    <div><a href="#s1"><i class="fas fa-chevron-left"></i></a><a href="#s3"><i class="fas fa-chevron-right"></i></a></div>
    <div><a href="#s2"><i class="fas fa-chevron-left"></i></a><a href="#s4"><i class="fas fa-chevron-right"></i></a></div>
    <div><a href="#s3"><i class="fas fa-chevron-left"></i></a><a href="#s1"><i class="fas fa-chevron-right"></i></a></div>
  </div>

  <div class="bullets">
    <a href="#s1">1</a>
    <a href="#s2">2</a>
    <a href="#s3">3</a>
    <a href="#s4">4</a>
  </div>

</div>
                <!-- slide -->
            </div>
            <div class="top-active">
                <div class="active-on wow bounceInLeft" data-wow-duration="1.5s" data-wow-delay="1.5s">
                    <img src="./images/giaohang.svg" width="100%" height="100%" alt="">
                    <div class="text-on">
                        <h4>Giao hàng nhanh</h4>
                        <p>Free ship trên toàn quốc</p>
                    </div>
                </div>
                <div class="active-on wow bounceInLeft" data-wow-duration="1.5s" data-wow-delay="1s">
                    <img src="./images/hotro.svg" width="100%" height="100%" alt="">
                    <div class="text-on">
                        <h4>Hỗ trợ 24/7</h4>
                        <p>Luôn hỗ trợ khách hàng mọi lúc</p>
                    </div>
                </div>
                <div class="active-on wow bounceInRight" data-wow-duration="1.5s" data-wow-delay="1s">
                    <img src="./images/safe.svg" width="100%" height="100%" alt="">
                    <div class="text-on">
                        <h4>Đảm bảo an toàn</h4>
                        <p>Hoàn lại 100% tiền với đơn hàng lỗi</p>
                    </div>
                </div>
                <div class="active-on wow bounceInRight" data-wow-duration="1.5s" data-wow-delay="1.5s">
                    <img src="./images/chatluong.svg" width="100%" height="100%" alt="">
                    <div class="text-on">
                        <h4>Chất lượng đảm bảo</h4>
                        <p>Chất lượng hàng hóa đảm bảo 100%</p>
                    </div>
                </div>
            </div>
            <div class="flash-sale wow fadeInUpBig" data-wow-duration="1s" data-wow-delay=".5s">
                <div class="flash-sale-top" <?php background_menu() ?>>
                    <h2><i class="fas fa-bolt"></i> Yêu thích</h2>
                </div>
                <div class="flash-sale-content">
                    <?php spyeuthich(); ?>
                </div>
            </div>
            <!-- close flash-sale -->
            <div class="product-all">
                <div class="title-all" id="denphansanpham">
                    <form action="#denphansanpham" method="post">
                    <h2 id="title-all-product" <?php background_menu() ?>><button type="submit" name="tatca">Sản phẩm bạn tìm</button></h2>
                    </form>
                    <!-- <span id="loinhan" style="margin-left: 180px; margin-top: 10px; opacity: .5;"> Vui lòng truy cập trên Desktop để hiển thị đầy đủ</span> -->
                </div>
                <div class="product-all-content">
                    <div class="product-content-body wow fadeInRight" data-wow-duration="2s" data-wow-delay="1s">
                    <?php
                    $conn = connect_db();
                    if(isset($_POST['btnTK'])){
                        $timkiem=$_POST['contentTK'];
                        $sql="SELECT * FROM product WHERE tensp like '%$timkiem%'";
                        $run_timkiem=mysqli_query($conn,$sql);
                        while ($row=$run_timkiem->fetch_assoc()) {
                            echo '<div class="hot-item">';
                            echo    '<div class="hot-item-inner">';
                            echo        '<a href="./product.php?masp='.$row['masp'].'&iddm='.$row['iddm'].'"><img src="./Cpanel/images/product/'.$row['NCC'].'" alt=""></a>';
                            echo        '<span id="hangnew">News</span>';
                            echo        '<div class="product-info">';
                            echo            '<h4><a href="./product.php?masp='.$row['masp'].'&iddm='.$row['iddm'].'">'.$row['tensp'].'</a></h4>';
                            echo            '<span id="gia">'.number_format($row['DonGia']).' đ</span>';
                            echo            '<span id="giamgiaroi">'.number_format($row['DVT']).' đ</span>';
                            echo        '</div>';
                            echo    '</div>';
                            echo '</div>';
                        }
                    }
                    ?>
                    </div>
                    <?php trang() ?>
                </div>
            </div>
            <!-- phụ kiện -->
            <!-- <div class="product-all wow fadeInDown" data-wow-duration="2s" data-wow-delay="1s" id="product-all-111">
                <div class="title-all">
                    <h2 id="title-all-product" <?php background_menu() ?>>Phụ kiện</h2>
                </div>
                <div class="pk-all-content">
                    <div class="pk-content-body">
                        <img class="wow bounceInLeft" data-wow-duration="2s" data-wow-delay="1.5s" id="anhphukien" style="border-radius: .5rem; opacity: .8;"
                            src="https://cdn.tgdd.vn/2021/01/banner/800-170-800x170-3.png" alt="">
                        <img class="xoatrenmb wow rollIn" data-wow-duration="2s" data-wow-delay="2s" width="100%" height="100%" style="padding-bottom: 3px;"
                            src="https://cdn.tgdd.vn/Products/Images/54/213711/tai-nghe-bluetooth-airpods-pro-apple-mwp22-ava-600x600.jpg"
                            alt="">
                        <img class="xoatrenmb wow rollIn" data-wow-duration="2s" data-wow-delay="2.5s" width="100%" height="100%" style="padding-bottom: 3px;"
                            src="https://ae01.alicdn.com/kf/HTB12i2dhamWBuNjy1Xaq6xCbXXa2/ROCK-Silicone-Case-for-iPhone-7-7-Plus-Anti-Shock-Protection-Phone-Case-for-iPhone7-cover.jpg"
                            alt="">
                    </div>
                    <div class="product-content-body wow fadeInRight" data-wow-duration="2s" data-wow-delay="3s">
                    <?php  phukien(); ?>
                    </div>
                </div>
            </div> -->
            <!-- close phụ kiện -->
            <div class="lienhe">
                <div class="lienhe-content wow bounceInLeft" data-wow-duration="2s" data-wow-delay="1s">
                    <h2 id="title-all-lh" <?php background_menu() ?>>Trợ giúp</h2>
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
                    <h2 id="title-all-lh" <?php background_menu() ?>>VỀ CHÚNG TÔI</h2>
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
                    <h2 id="title-all-lh" <?php background_menu() ?>>QUYỀN RIÊNG TƯ</h2>
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
                    <h2 id="title-all-lh" <?php background_menu() ?>>DỊCH VỤ online</h2>
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
                    <h2 id="title-all-lh" <?php background_menu() ?>>DỊCH VỤ GIAO HÀNG</h2>
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
                        <img src="./images/thanhtoan.png" alt="">
                    </div>
                    <div class="content-footer-on">
                        <h2>Đơn vị vận chuyển</h2>
                        <img src="./images/vanchuyen.png" alt="">
                    </div>
                </div>
            </div>
            <div class="content-footer-down" <?php background_menu() ?>>
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
        .thongbaongay{
            opacity: 0;
            pointer-events: none;
            transition: .5s all ease;
            display: none;
        }
        .thongbaongay.active{
            display: flex;
            align-items: center;
            height: 50vh;
            position: fixed;
            top: 25%;
            left: 24%;
            opacity: 1;
            pointer-events: all;
            z-index: 999;
            transition: .5s all ease;
        }
        .noti-close {
        cursor: pointer;
        position: absolute;
        top: 8%;
        right: -0.5%;
        background: rgb(105, 105, 105);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        color: #fff;
        transition: .5s all ease;
        opacity: .9;
        }
        .noti-close:hover{
            background: #55a4da;
        }
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
    </style>
    <div class="back-to-top"><i class="fas fa-angle-up"></i></div>
    
    <div class="thongbaongay">
        <img width="100%" style="border-radius: 1rem; box-shadow: 1px 1px 30px 0 #2980c7;" src="./images/ngayxinh.jpg" alt="">
        <div class="noti-close"><i class="fas fa-times"></i></div>
    </div>
    <script>
        var checkthongbao = document.querySelector('.thongbaongay');
        checkthongbao.value = sessionStorage.getItem('tbngay');
        function loadthongbaongay() {
            if (checkthongbao.value != "dathongbao") {
                checkthongbao.classList.toggle('active');
            }
        }
        document.querySelector('.noti-close').addEventListener('click', () =>{
            checkthongbao.classList.remove('active');
            sessionStorage.setItem('tbngay', 'dathongbao');
        });

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

    <script src="./js/app.js"></script>
    <script src="./wowjs/wow.min.js"></script>
    <script src="./css/slide.css"></script>
    <script>
        new WOW().init();
    </script>
</body>

</html>