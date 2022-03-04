<?php
    if(isset($_SESSION['dangnhap'])){
        $email =$_SESSION['dangnhap'];
    $connect = connect_db();
    $result = $connect->query('SELECT * FROM user WHERE isAdmin = 1 and email="'.$email.'" ');
    if ($result->num_rows>0) {
        $quyenadmin = 1;
    }else{
        $quyenadmin = 0;
    }
    if ($quyenadmin == 1) {
        echo'
        <ul class="sidebar-elements">
            <li class="divider">Menu</li>
            <li class="active"><a href="index.php"><i class="icon mdi mdi-home"></i><span>Dashboard</span></a>
            </li>
            <li class="parent"><a href="#"><i class="icon mdi mdi-face"></i><span>Quản trị</span></a>
                <ul class="sub-menu">
                    <li><a href="slider.php">Slider</a>
                    </li>
                    <li><a href="danhmuc.php">Danh mục</a>
                    <li><a href="sanpham.php">Sản phẩm</a>
                    </li>
                    <li><a href="pages-profile.php"><span class="badge badge-primary float-right">User</span>Tài khoản</a>
                    </li>
                    <li><a href="quanlybinhluan.php">Bình luận</a>
                    </li>
                    <li><a href="ui-general.php">Hệ thống</a>
                    </li>
                </ul>
            </li>
        </ul>';
    }
    };
    ?>