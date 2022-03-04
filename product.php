<!DOCTYPE html>
<?php
    session_start(); ob_start();
    require_once("./admin/SanPhamDB.php");
?>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sản phẩm</title>
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="style-product.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <?php background_before() ?>
    </head>

    <body>
        <div class="container">
            <!-- open header -->
            <header>
                <div class="top-head">
                    <img src="./images/logo.png" alt="">
                    <ul>
                        <li><a href="./index.php">Trang chủ</a></li>
                        <?php if(isset($_SESSION['dangnhap'])){}else{echo '<li><a href="#">Về chúng tôi</a></li><li><a href="#">Dịch vụ</a></li>';} ?>
                    <li><?php if(isset($_SESSION['dangnhap'])){echo '<span>'.'Xin chào: '.'<a href="./Cpanel/pages-profile.php">'.$_SESSION['dangnhap'].'</a>'.'<form style="display: inline; padding: 10px;" action="" method="post"><button style="border: none; background: none;cursor: pointer;width: 10px !important;" name="logout" type="submit"><i style="padding: 5px; color: #4175c8; font-size: 18px;" class="fas fa-sign-out-alt"></i></button></form>'.'</span>';}else{echo'<a href="./login">Đăng nhập</a>';}; if(isset($_POST['logout'])){echo '<script>alert("Bạn đã đăng xuất")</script>'; unset($_SESSION['dangnhap']); header( "Refresh:0.2; url='./index.php'");} ?></li>
                    </ul>
                </div>
                <!-- close top-head -->
                <nav <?php background_menu() ?>>
                    <div class="nav-left">
                        <ul>
                            <li><a href="./index.php">HOME</a></li>
                            <!-- <li><a href="">IPHONE MỚI</a></li>
                            <li><a href="">IPHONE CŨ</a></li> -->
                            <!-- <li><a href="./index.php#product-all-111">PHỤ KIỆN</a></li> -->
                        </ul>
                    </div>
                    <div class="nav-right">
                        <i><input type="text" placeholder="Nhập tên sản phẩm cần tìm!">
                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                        </i>
                        <div class="cart"><a href="../Cart/cart.html"><i
                        style="background-color: #ffac00; padding: 8px; border-radius: 50%; opacity: .9;"
                        class="fa fa-shopping-cart" aria-hidden="true"></i><span> Giỏ Hàng</span></a></div>
                    </div>
                </nav>
            </header>
            <!-- close header -->
            <div class="content">
                <!-- related product -->
                <div class="big-all">
                    <div class="product-all-1">
                        <div class="thongtinsp">
                            <h2 style="text-align: center; padding: 25px; color: #636363; text-transform: uppercase;">Thông tin sản phẩm</h2>
                            <hr style="margin: 0 20px; border: dashed 1px; opacity: .4;">
                        </div>
                        <div class="big-content-and-img">
                            <div class="img-sp">
                                <?php
                                $cmsp= $_GET['masp'];
                                product_sp($cmsp);
                            ?>
                            </div>
                            <div class="content-sanpham">
                                <h3 id="tensp">
                                    <?php $cmsp= $_GET['masp']; product_sp_title($cmsp); ?>
                                </h3>
                                <span id="giathuc"><?php $cmsp= $_GET['masp']; product_sp_price_new($cmsp); ?> đ</span>
                                <span id="giaao"><?php $cmsp= $_GET['masp']; product_sp_price_old($cmsp); ?> đ</span>
                                <br>
                                <span id="mausac">Giảm giá lên tới: <?php product_sp_giamgialentoi($cmsp); ?></span>
                                <span id="soluong">Số lượng: <form action="" method="post"> <input id="soluongid" type="number" name="soluong" value="1" min="1"></span>
                                <?php $cmsp= $_GET['masp']; product_nut_thanhtoan($cmsp); ?>
                                </form>
                                <!-- <button id="thanhtoan" onclick="thanhtoan()"><i style=" font-size: 20px;" class="fa fa-shopping-cart" aria-hidden="true"></i> Thanh toán</button> -->
                            </div>
                            <img style="margin-top: 60px;" width="100%" src="https://i.ibb.co/VxB8hhj/image.png" alt="">
                        </div>
                        <hr>
                        <div class="khungbinhluan">
                            <div class="cmt_ALL">
                            <?php 
                                if(isset($_SESSION['dangnhap'])){
                                    $email = $_SESSION['dangnhap'];
                                    $conn = connect_db();
                                    $sql = "SELECT * FROM user where email = '$email'";
                                    $result = mysqli_query($conn,$sql);
                                        while($row = $result->fetch_assoc()){
                                                $iduser = $row['iduser'];
                                        }

                                    if (isset($_POST['binhluan'])) {
                                        $noidungcmt = $_POST['noidung'];
                                        $maSP = $_GET['masp'];
                                        cmt($iduser, $noidungcmt, $maSP);
                                    }
                                    echo '<form class="binhluan" action="" method="post">';
                                    avt_cmt($email);
                                    echo'<input type="text" id="id_cmt" name="noidung" id="" cols="10" rows="1" placeholder="Viết bình luận công khai..."></input>
                                    <button name="binhluan" type="submit">Gửi</button>
                                </form>';
                                }else{
                                    echo '<h4 id="cmtlogin">vui lòng đăng nhập để bình luận</h4>';
                                } ?>
                                <?php $maSP = $_GET['masp']; view_cmt($maSP); ?>
                            </div>
                            <div class="motasp">
                                <h2>Giới thiệu sản phẩm</h2><br>
                                <p><?php product_detail($cmsp); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="product-all">
                        <div class="title-all">
                            <h2 id="title-all-product" <?php background_menu() ?>>Sản phẩm liên quan</h2>
                        </div>
                        <div class="product-product-all-content">
                            <div class="product-content-body">
                                <?php $iddm=$_GET['iddm']; splienquan($iddm); $masp= $_GET['masp']; viewsp($masp);?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="right-nav">
                    <div class="title-all">
                        <h2 id="title-all-product" <?php background_menu() ?>><i style="padding: 0 5px; color: #f76f5a; font-size: 21px;" class="fas fa-fire"></i><span>Sản phẩm đang hot</span></h2>
                    </div>
                    <div class="big-all-right">
                        <?php sphot(); ?>
                    </div>
                </div>
                <!-- close related product -->
            </div>
            <div class="lienhe">
                <div class="lienhe-content">
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
                <div class="lienhe-content">
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
                <div class="lienhe-content">
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
                <div class="lienhe-content">
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
                <div class="lienhe-content">
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
                <span>Copyright © <?php copyright(); ?></span>
                <span>
                <ul>
                    <li>Mạng xã hội:</li>
                    <?php social(); ?>
                </ul>
            </span>
            </div>
        </footer>
        </div>
        <style>
            .back-to-top {
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
            
            .back-to-top:hover {
                background: rgb(80, 176, 206);
            }
        </style>
        <div class="back-to-top"><i class="fas fa-angle-up"></i></div>
        <script>
            window.onscroll = function() {
                backtop();
            };
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
            backtotop.addEventListener('click', () => {
                document.body.scrollTop = '0';
                document.documentElement.scrollTop = '0';
            });
        </script>
        <script src="./javascript.js">
        </script>
    </body>

    </html>