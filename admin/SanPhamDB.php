<?php
    function connect_db(){
        $connectok = new mysqli('localhost', 'root', '', 'asm');// kết nối đến csdl
        if ($connectok->connect_error) {
            die('Kết nối đến database thất bại => '.$connectok->connect_error); //test loi va hien thi loi
        }else{
            return $connectok;
        }
    }

    function insert_product($tenSP, $DVT, $donGia, $ncc, $loai, $chitietsp, $iddm){
        $connect = connect_db();
        $result = $connect -> query("INSERT INTO product VALUES(null, '$tenSP', '$DVT', '$donGia', '$ncc', '$loai','$chitietsp',0, '$iddm')");
        if ($result) {
            echo 'Thêm thành công';
        }else{
            echo 'Thêm thất bại';
        }
        return $result;
    }

    function del_product($maSP){
        $connect = connect_db();
        $sql = 'DELETE FROM product WHERE masp = "'.$maSP.'" ';
        $resultdel = $connect->query($sql);
        if ($resultdel) {
            echo 'Xoá thành công sản phẩm có mã '.$maSP;
        }else{
            echo 'Xoá thất bại';
        }
        return $resultdel;
    }

    function del_all_product(){
        $connect = connect_db();
        $result_del_all = $connect -> query("DELETE FROM product");
        if ($result_del_all) {
            echo 'Xoá All thành công';
        }else{
            echo 'Xoá All thất bại';
        }
        return $result_del_all;
    }

    function searchID($maSP){
        $connect = connect_db();
        $resulttimkiem = $connect->query('SELECT * FROM product WHERE masp="'.$maSP.'" ');
        while($rowOne = $resulttimkiem->fetch_assoc()){
            echo '<script type="text/javascript">document.getElementById("maSP").value="'.$rowOne['masp'].'";</script>';
            echo '<script type="text/javascript">document.getElementById("tenSP").value="'.$rowOne['tensp'].'";</script>';
            echo '<script type="text/javascript">document.getElementById("DVT").value="'.$rowOne['DVT'].'";</script>';
            echo '<script type="text/javascript">document.getElementById("donGia").value="'.$rowOne['DonGia'].'";</script>';
            echo '<script type="text/javascript">document.getElementById("ncc").value="'.$rowOne['NCC'].'";</script>';
            echo '<script type="text/javascript">document.getElementById("loai").value="'.$rowOne['loai'].'";</script>';
            echo '<script type="text/javascript">document.getElementById("chitietsp").value="'.$rowOne['chitietsp'].'";</script>';
            echo '<script type="text/javascript">document.getElementById("iddm").value="'.$rowOne['iddm'].'";</script>';
        }
        if ($resulttimkiem) {
            echo 'Tìm thành công -> Chỉnh sửa cột bên trái và nhấn vào update';
        }else{
            echo 'Tìm thất bại';
        }
        
        return $resulttimkiem;
    }

    function updateOK($maSP, $tenSP, $DVT, $donGia, $NCC, $loai, $chitietsp, $iddm){
        $connect = connect_db();
        $result_Update = $connect->query('UPDATE product SET tensp ="'.$tenSP.'",DVT ="'.$DVT.'",DonGia ="'.$donGia.'",NCC ="'.$NCC.'",loai ="'.$loai.'",chitietsp ="'.$chitietsp.'",iddm ="'.$iddm.'" WHERE masp="'.$maSP.'" ');
        if ($result_Update) {
            echo 'Update thành công';
        }else{
            echo 'Update thất bại';
        }
        return $result_Update;
    }

    // function view_product(){
    //     $connect = connect_db();
    //     $viewok = "SELECT * FROM product";
    //     $luutam = mysqli_query($connect, $viewok);
    //     echo '<table border="1"><tr><td>Mã sản phẩm</td><td>Tên sản phẩm</td><td>Đơn vị tính</td><td>Đơn giá</td><td colspan="1">Ảnh</td><td colspan="2">Chức năng</td></tr>';
    //     while ($row=$luutam->fetch_assoc()) {
    //         echo '<tr>';
    //         echo '<td>'.$row['masp'].'</td>';
    //         echo '<td>'.$row['tensp'].'</td>';
    //         echo '<td>'.$row['DVT'].'</td>';
    //         echo '<td>'.$row['DonGia'].'</td>';
    //         echo '<td><img width="100%" src="'.$row['NCC'].'" alt=""></td>';
    //         echo '<td>';
    //         echo '<form action="" method="post">';
    //         echo '<button type="submit" name="btnSua" id="Suabtn" value="'.$row['masp'].'">Sửa</button>';
    //         echo '</form>';
    //         echo '</td>';
    //         echo '<td>';
    //         echo '<form action="" method="post">';
    //         echo '<button type="submit" name="btnXoa" id="Xoabtn" value="'.$row['masp'].'">Xoá</button>';
    //         echo '</form>';
    //         echo '</td>';
    //         echo '</tr>';
    //     }
    //     echo '</table>';
    //     // Máy tính sẽ lưu kết quả từ việc truy vấn dữ liệu bảng
    // //     // Do đó chúng ta nên giải phóng bộ nhớ sau khi hoàn tất đọc dữ liệu
    //     mysqli_free_result($luutam);
    // }

    function view_product(){
        $connect = connect_db();
        $viewok = "SELECT * FROM product inner join danhmuc on danhmuc.iddm = product.iddm order by masp asc";
        $luutam = mysqli_query($connect, $viewok);
        $stt = 1;
        echo '<table border="1"><tr><th>STT</th><th>Mã sản phẩm</th><th>Tên sản phẩm</th><th>Giá gốc</th><th>Giá KM</th><th colspan="1">Ảnh</th><th>Loại</th><th>View</th><th>Danh mục</th><th colspan="2">Chức năng</th></tr>';
        while ($row=$luutam->fetch_assoc()) {
            echo '<tr>';
            echo '<td>'.$stt++.'</td>';
            echo '<td>'.$row['masp'].'</td>';
            echo '<td>'.$row['tensp'].'</td>';
            echo '<td>'.$row['DVT'].'</td>';
            echo '<td>'.$row['DonGia'].'</td>';
            echo '<td><img width="100%" src="../Cpanel/images/product/'.$row['NCC'].'" alt=""></td>';
            echo '<td>'.$row['loai'].'</td>';
            echo '<td>'.$row['viewsp'].'</td>';
            echo '<td>'.$row['tendanhmuc'].'</td>';
            echo '<td>';
            echo '<form action="" method="post">';
            echo '<button type="submit" name="btnSua" id="Suabtn" value="'.$row['masp'].'">Sửa</button>';
            echo '</form>';
            echo '</td>';
            echo '<td>';
            echo '<form action="" method="post">';
            echo '<button type="submit" name="btnXoa" onclick="return confirm(\'Bạn có muốn xóa không ?\')" id="Xoabtn" value="'.$row['masp'].'">Xoá</button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
        // Máy tính sẽ lưu kết quả từ việc truy vấn dữ liệu bảng
    //     // Do đó chúng ta nên giải phóng bộ nhớ sau khi hoàn tất đọc dữ liệu
        mysqli_free_result($luutam);
    }
    function count_product(){
        $conn = connect_db();
        $sql = 'SELECT COUNT(masp) AS SL FROM product';
        $row = mysqli_query($conn,$sql)->fetch_assoc();
        echo $row['SL'];
    }

    function view_product_xachtay(){
        $connect = connect_db();
        $viewok = "SELECT * FROM product where loai = 'Xách tay' order by masp desc";
        $luutam = mysqli_query($connect, $viewok);
        $stt = 1;
        echo '<table border="1"><tr><th>STT</th><th>Mã sản phẩm</th><th>Tên sản phẩm</th><th>Giá gốc</th><th>giá KM</th><th colspan="1">Ảnh</th></tr>';
        while ($row=$luutam->fetch_assoc()) {
            echo '<tr>';
            echo '<td>'.$stt++.'</td>';
            echo '<td>'.$row['masp'].'</td>';
            echo '<td>'.$row['tensp'].'</td>';
            echo '<td>'.$row['DVT'].'</td>';
            echo '<td>'.$row['DonGia'].'</td>';
            echo '<td><img width="100px" src="../Cpanel/images/product/'.$row['NCC'].'" alt=""></td>';
            echo '</tr>';
        }
        echo '</table>';
        mysqli_free_result($luutam);
    }

    function view_product_chinhhang(){
        $connect = connect_db();
        $viewok = "SELECT * FROM product where loai = 'Chính hãng' order by masp desc";
        $luutam = mysqli_query($connect, $viewok);
        $stt = 1;
        echo '<table border="1"><tr><th>STT</th><th>Mã sản phẩm</th><th>Tên sản phẩm</th><th>Giá gốc</th><th>giá KM</th><th colspan="1">Ảnh</th></tr>';
        while ($row=$luutam->fetch_assoc()) {
            echo '<tr>';
            echo '<td>'.$stt++.'</td>';
            echo '<td>'.$row['masp'].'</td>';
            echo '<td>'.$row['tensp'].'</td>';
            echo '<td>'.$row['DVT'].'</td>';
            echo '<td>'.$row['DonGia'].'</td>';
            echo '<td><img width="100px" src="../Cpanel/images/product/'.$row['NCC'].'" alt=""></td>';
            echo '</tr>';
        }
        echo '</table>';
        mysqli_free_result($luutam);
    }

    // function view_home(){
    //     $connect = connect_db();
    //     $viewok = "SELECT * FROM product order by masp desc limit 12";
    //     $luutam = mysqli_query($connect, $viewok);
    //     while ($row=$luutam->fetch_assoc()) {
    //         echo '<div class="hot-item">';
    //         echo    '<div class="hot-item-inner">';
    //         echo        '<a href="./product.php?masp='.$row['masp'].'"><img src="'.$row['NCC'].'" alt=""></a>';
    //         echo        '<span id="hangnew">News</span>';
    //         echo        '<div class="product-info">';
    //         echo            '<h4><a href="./product.php?masp='.$row['masp'].'">'.$row['tensp'].'</a></h4>';
    //         echo            '<span id="gia">'.number_format($row['DonGia']).' đ</span>';
    //         echo            '<span id="giamgiaroi">'.number_format($row['DVT']).' đ</span>';
    //         echo        '</div>';
    //         echo    '</div>';
    //         echo '</div>';
    //     }
    //     // echo '</table>';
    //     // Máy tính sẽ lưu kết quả từ việc truy vấn dữ liệu bảng
    // //     // Do đó chúng ta nên giải phóng bộ nhớ sau khi hoàn tất đọc dữ liệu
    //     mysqli_free_result($luutam);
    // }

    function view_home(){
        $connect = connect_db();
        $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:12;
        $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
        $offset = ($current_page - 1) * $item_per_page;
        $products = mysqli_query($connect, "SELECT * FROM `product` ORDER BY `masp` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
        $totalRecords = mysqli_query($connect, "SELECT * FROM `product`");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);

        while ($row=mysqli_fetch_array($products)) {
            echo '<div class="hot-item">';
            echo    '<div class="hot-item-inner">';
            echo        '<a href="./product.php?masp='.$row['masp'].'&iddm='.$row['iddm'].'"><img src="./Cpanel/images/product/'.$row['NCC'].'" alt=""></a>';
            echo        '<span id="hangnew">News</span>';
            echo        '<div class="product-info">';
            echo            '<h4 class="view-title"><a href="./product.php?masp='.$row['masp'].'&iddm='.$row['iddm'].'">'.$row['tensp'].'</a></h4>';
            echo            '<span id="gia">'.number_format($row['DonGia']).' đ</span>';
            echo            '<span id="giamgiaroi">'.number_format($row['DVT']).' đ</span>';
            echo        '</div>';
            echo    '</div>';
            echo '</div>';
        }
        // include './phantrang.php';
    }
    function trang(){
        $connect = connect_db();
        $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:12;
        $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
        $offset = ($current_page - 1) * $item_per_page;
        $products = mysqli_query($connect, "SELECT * FROM `product` ORDER BY `masp` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
        $totalRecords = mysqli_query($connect, "SELECT * FROM `product`");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        include './phantrang.php';
    }

    // lay thong tin o product
    // $cmsp= $_GET['masp'];
    function product_sp_giamgialentoi($cmsp){
        $connect = connect_db();
        $viewok = "SELECT * FROM product WHERE masp='$cmsp' ";
        $luutam = mysqli_query($connect, $viewok);
        while ($row=$luutam->fetch_assoc()) {
            echo '<span style="color: rgb(255, 60, 32);">-'.ceil(($row['DVT']-$row['DonGia'])/($row['DVT'])*100).'%</span>';
        }
    }
    function product_sp($cmsp){
        $connect = connect_db();
        $viewok = "SELECT * FROM product WHERE masp='$cmsp' ";
        $luutam = mysqli_query($connect, $viewok);
        while ($row=$luutam->fetch_assoc()) {
            echo '<img id="imgsp" width="100%" src="./Cpanel/images/product/'.$row['NCC'].'" alt="">';
        }
    }
    function product_sp_title($cmsp){
        $connect = connect_db();
        $viewok = "SELECT * FROM product WHERE masp='$cmsp' ";
        $luutam = mysqli_query($connect, $viewok);
        while ($row=$luutam->fetch_assoc()) {
            echo $row['tensp'];
        }
    }
    function product_sp_price_new($cmsp){
        $connect = connect_db();
        $viewok = "SELECT * FROM product WHERE masp='$cmsp' ";
        $luutam = mysqli_query($connect, $viewok);
        while ($row=$luutam->fetch_assoc()) {
            echo number_format($row['DonGia']);
        }
    }
    function product_sp_price_old($cmsp){
        $connect = connect_db();
        $viewok = "SELECT * FROM product WHERE masp='$cmsp' ";
        $luutam = mysqli_query($connect, $viewok);
        while ($row=$luutam->fetch_assoc()) {
            echo number_format($row['DVT']);
        }
    }

    function product_detail($cmsp){
        $connect = connect_db();
        $viewok = "SELECT * FROM product WHERE masp='$cmsp' ";
        $luutam = mysqli_query($connect, $viewok);
        while ($row=$luutam->fetch_assoc()) {
            echo $row['chitietsp'];
        }
    }

    function product_nut_thanhtoan($cmsp){
        $connect = connect_db();
        $viewok = "SELECT * FROM product WHERE masp='$cmsp' ";
        $luutam = mysqli_query($connect, $viewok);
        if (isset($_POST["muahang"])) {
            $soluong = $_POST["soluong"];
            while ($row=$luutam->fetch_assoc()) {
                header("location: ./giohang/addcard.php?masp=$row[masp]&qty=$soluong");
            }
        } else{
            
        }
            echo "<button type='submit' name='muahang'>Mua Hàng</button>";
        
        // echo '</>';
    }
    // ket thuc lay thong tin o product

    //chay slide
    function danhmucsp_load($loai){
        $connect = connect_db();
        $sql = "SELECT * FROM product WHERE loai = '$loai' or iddm = '$loai'";
        $result = mysqli_query($connect,$sql);
        while($row = $result->fetch_assoc()){
            echo '<div class="hot-item cumoi">';
            echo    '<div class="hot-item-inner">';
            echo        '<a href="./product.php?masp='.$row['masp'].'&iddm='.$row['iddm'].'"><img src="./Cpanel/images/product/'.$row['NCC'].'" alt=""></a>';
            echo        '<span id="hangnew">News</span>';
            echo        '<div class="product-info">';
            echo            '<h4 class="view-title"><a href="./product.php?masp='.$row['masp'].'&iddm='.$row['iddm'].'">'.$row['tensp'].'</a></h4>';
            echo            '<span id="gia">'.number_format($row['DonGia']).' đ</span>';
            echo            '<span id="giamgiaroi">'.number_format($row['DVT']).' đ</span>';
            echo        '</div>';
            echo    '</div>';
            echo '</div>';
        }
    }
    //chay slide
    

    // function login_ok(){
    //     $email = $_POST["email"];
    //     $pass = $_POST["pass"];
    //     $connect = connect_db();
    //       $str = "SELECT * FROM user WHERE email ='$email' and password='$pass'";
    //       $quyenad = "SELECT * FROM user WHERE email ='$email' and password='$pass' and isAdmin = 1";
    //       $res = $connect -> query($str);
    //       $quyenads = $connect -> query($quyenad);
    //       if ($res->num_rows>0) {
    //         echo 'Đăng Nhập thành công';
    //         if ($quyenads->num_rows>0) {
    //             header('location: http://localhost/assignment/cpanel');
    //         }else{
    //             echo '<br>Đây không phải tài khoản quản trị';
    //         }
    //       } else {
    //         echo 'Đăng nhập thất bại';
    //       }
    // }


    function login_ok(){
        session_start();
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $connect = connect_db();
          $str = "SELECT * FROM user WHERE email ='$email' and password='$pass'";
          $quyenad = "SELECT * FROM user WHERE email ='$email' and password='$pass' and isAdmin = 1";
          $res = $connect -> query($str);
          $quyenads = $connect -> query($quyenad);
          if ($res->num_rows>0) {
            echo 'Đăng Nhập thành công';
            $_SESSION['dangnhap']=$email;
            if ($quyenads->num_rows>0) {
                header('location: http://localhost/web-dien-thoai/Cpanel/');
            }else{
                echo '<br>Đây không phải tài khoản quản trị';
                header('location: http://localhost/web-dien-thoai/');
            }
          } else {
            echo 'Đăng nhập thất bại';
          }
    }

    function sigin_ok(){
        $connect = connect_db();
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $username = $_POST["usernameok"];
        $str = "INSERT INTO user VALUES(null,'$username','$pass','$email','http://localhost/assignment/Cpanel/assets/img/avatar-150.png',0,'giới thiệu bản thân ở đây!',0)";
        $res = $connect -> query($str);
        if ($res) {
        echo 'Đăng ký thành công';
        } else {
        echo 'Đăng ký thất bại';
        }
    }

    // slider
    function slider(){
        $connect = connect_db();
        $sql = 'SELECT * FROM slider ORDER BY id DESC limit 4';
        $result = mysqli_query($connect, $sql);
        
        while($row = $result->fetch_assoc()){
            $image = "./Cpanel/images/product/".$row['images'];
            echo '<div style="background-image:url('.$image.'); width: 100%; height: 100%; background-size: contain; background-repeat: no-repeat; background-position: left;">
			<h2 style="color: red">'.$row['title'].'</h2>
			<p>'.$row['detail'].'</p>
            <form action="'.$row['link'].'" method="post">
            <button type="submit">Mua ngay</button>
            </form>
		</div>;';
        }
    }
    
    function insert_slider($images, $title, $detail, $link){
        $connect = connect_db();
        $sql = "INSERT INTO slider VALUES(null,'$images','$title', '$detail', '$link')";
        $result = mysqli_query($connect, $sql);
        if ($result) {
            echo 'thêm slider thành công';
        }else{
            echo 'thêm slider thất bại';
        }
        return $result;
    }

    function view_slider(){
        $connect = connect_db();
        $sql = "SELECT * FROM slider order by id desc";
        $luutam = mysqli_query($connect, $sql);
        $stt = 1;
        echo '<table border="1"><tr><th>STT</th><th>Tiêu đề</th><th>mô tả</th><th>link</th><th colspan="1">Images</th><th colspan="2">Chức năng</th></tr>';
        while ($row=$luutam->fetch_assoc()) {
            echo '<tr>';
            echo '<td>'.$stt++.'</td>';
            echo '<td>'.$row['title'].'</td>';
            echo '<td>'.$row['detail'].'</td>';
            echo '<td>'.$row['link'].'</td>';
            echo '<td><img width="100px" src="../Cpanel/images/product/'.$row['images'].'" alt=""></td>';
            echo '<td>';
            echo '<form action="" method="post">';
            echo '<button type="submit" name="btnSuaSlider" id="Suabtn" value="'.$row['id'].'">Sửa</button>';
            echo '</form>';
            echo '</td>';
            echo '<td>';
            echo '<form action="" method="post">';
            echo '<button type="submit" name="btnXoaSlider" id="Xoabtn" value="'.$row['id'].'">Xoá</button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
        mysqli_free_result($luutam);
    }
    function del_slider($id){
        $connect = connect_db();
        $sql = 'DELETE FROM slider WHERE id = "'.$id.'" ';
        $result = $connect->query($sql);
        if ($result) {
            echo '<script> alert("Xoá thành công slider id = '.$id.'");</script>';
        }else{
            echo '<script> alert("Xoá thất bại");</script>';
        }
        return $result;
    }
    function searchSlider($id){
        $connect = connect_db();
        $resulttimkiem = $connect->query('SELECT * FROM slider WHERE id="'.$id.'" ');
        while($rowOne = $resulttimkiem->fetch_assoc()){
            echo '<script type="text/javascript">document.getElementById("images").value="'.$rowOne['images'].'";</script>';
            echo '<script type="text/javascript">document.getElementById("title").value="'.$rowOne['title'].'";</script>';
            echo '<script type="text/javascript">document.getElementById("detail").value="'.$rowOne['detail'].'";</script>';
            echo '<script type="text/javascript">document.getElementById("link").value="'.$rowOne['link'].'";</script>';
            echo '<script type="text/javascript">document.getElementById("id").value="'.$rowOne['id'].'";</script>';
        }
        if ($resulttimkiem) {
            echo 'Tìm thành công -> Sau khi chỉnh sửa nhấn update để hoàn thành';
        }else{
            echo 'Tìm thất bại';
        }
        
        return $resulttimkiem;
    }

    function updateSlider($id, $images, $title, $detail, $link){
        $connect = connect_db();
        $result_Update = $connect->query('UPDATE slider SET images ="'.$images.'",title ="'.$title.'",detail ="'.$detail.'",link ="'.$link.'" WHERE id="'.$id.'" ');
        if ($result_Update) {
            echo 'Update thành công';
        }else{
            echo 'Update thất bại';
        }
        return $result_Update;
    }
    // quan tri he thong
    function logo(){
        $connect = connect_db();
        $sql = 'SELECT * FROM cpanel';
        $result = mysqli_query($connect, $sql);
        while($row = $result->fetch_assoc()){
            echo '<img style="animation: rotato-q 2s ease;" src="'.$row['logo'].'" alt="">';
        }
    }
    function background_menu(){
        $connect = connect_db();
        $sql = 'SELECT * FROM cpanel';
        $result = mysqli_query($connect, $sql);
        while($row = $result->fetch_assoc()){
            echo 'style="background: '.$row['background_menu'].';"';
        }
    }
    function background_before(){
        $connect = connect_db();
        $sql = 'SELECT * FROM cpanel';
        $result = mysqli_query($connect, $sql);
        while($row = $result->fetch_assoc()){
            echo '<style>#title-all-product::before{border-bottom: 40px solid '.$row['background_menu'].';}#title-all-lh::before{border-bottom: 33.5px solid '.$row['background_menu'].';}.danhmuc li:hover{background:'.$row['background_menu'].';}</style>';
        }
    }
    function copyright(){
        $connect = connect_db();
        $sql = 'SELECT * FROM cpanel';
        $result = mysqli_query($connect, $sql);
        while($row = $result->fetch_assoc()){
            echo $row['copy_right'];
        }
    }
    function social(){
        $connect = connect_db();
        $sql = 'SELECT * FROM cpanel';
        $result = mysqli_query($connect, $sql);
        while($row = $result->fetch_assoc()){
            echo '<li><a href="'.$row['facebook'].'"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
            <li><a href="'.$row['youtube'].'"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
            <li><a href="'.$row['twitter'].'"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="'.$row['instagram'].'"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>';
        }
    }
    function laythongtin_cpanel(){
        $connect = connect_db();
        $result = $connect->query('SELECT * FROM cpanel');
        while($row = $result->fetch_assoc()){
            echo '<script type="text/javascript">document.getElementById("upload").value="'.$row['logo'].'";</script>';
            echo '<script type="text/javascript">document.getElementById("background_menu").value="'.$row['background_menu'].'";</script>';
            echo '<script type="text/javascript">document.getElementById("copyright").value="'.$row['copy_right'].'";</script>';
            echo '<script type="text/javascript">document.getElementById("facebook").value="'.$row['facebook'].'";</script>';
            echo '<script type="text/javascript">document.getElementById("youtube").value="'.$row['youtube'].'";</script>';
            echo '<script type="text/javascript">document.getElementById("twitter").value="'.$row['twitter'].'";</script>';
            echo '<script type="text/javascript">document.getElementById("instagram").value="'.$row['instagram'].'";</script>';
        }
        return $result;
    }
    function update_giaodien($background_menu, $tmp_name, $name, $copyright,$facebook,$youtube,$twitter,$instagram){
        $connect = connect_db();
        $path = "./images"; // Ảnh sẽ lưu vào thư mục images
        move_uploaded_file($tmp_name, "../images/".$name);   
        $image_url = $path .'/'. $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
        $result_Update = $connect->query('UPDATE cpanel SET logo ="'.$image_url.'",background_menu ="'.$background_menu.'",copy_right = "'.$copyright.'",facebook = "'.$facebook.'",youtube = "'.$youtube.'",twitter = "'.$twitter.'",instagram = "'.$instagram.'"');
        if ($result_Update) {
            echo 'Update thành công';
        }else{
            echo 'Update thất bại';
        }
        return $result_Update;
    }

    //phukien
    function phukien(){
        $connect = connect_db();
        $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:6;
        $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
        $offset = ($current_page - 1) * $item_per_page;
        $products = mysqli_query($connect, "SELECT * FROM `phukien` ORDER BY `idpk` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
        $totalRecords = mysqli_query($connect, "SELECT * FROM `phukien`");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);

        while ($row=mysqli_fetch_array($products)) {
            echo '<div class="hot-item">
                    <div class="hot-item-inner">';
            echo          '<a href="./product.php?masp='.$row['idpk'].'"><img src="'.$row['images'].'" alt=""></a>';
                            echo '<span id="hangnew">News</span>
                                <div class="product-info">';
            echo                    '<h4><a href="./product.php?masp='.$row['idpk'].'">'.$row['tenpk'].'</a></h4>
                                    <span id="gia">'.number_format($row['giagoc']).' đ</span>
                                    <span id="giamgiaroi">'.number_format($row['giakm']).' đ</span>
                                </div>
                            </div>
                        </div>';
        }
    }

    function splienquan($iddm){
        $connect = connect_db();
        $sql = "SELECT * FROM product WHERE iddm = '$iddm' order by RAND() limit 4";
        $result = mysqli_query($connect,$sql);
        while($row = $result->fetch_assoc()){
            echo '<div class="hot-item">
                    <div class="hot-item-inner">
                    <a href="./product.php?masp='.$row['masp'].'&iddm='.$row['iddm'].'"><img src="./Cpanel/images/product/'.$row['NCC'].'" alt=""></a>
                        <span id="hangnew">News</span>
                        <div class="product-info">
                        <h4 class="view-title"><a href="./product.php?masp='.$row['masp'].'&iddm='.$row['iddm'].'">'.$row['tensp'].'</a></h4>
                            <span id="gia">'.number_format($row['DonGia']).' đ</span>
                            <span id="giamgiaroi">'.number_format($row['DVT']).' đ</span>
                        </div>
                    </div>
                </div>';
        }
    }

    function viewsp($masp){
        $conn = connect_db();
        $result = $conn->query("UPDATE product SET viewsp = viewsp + 1 WHERE masp = '$masp'");
        return $result;
    }

    function spyeuthich(){
        $connect = connect_db();
        $sql = "SELECT * FROM product order by viewsp DESC limit 6";
        $result = mysqli_query($connect,$sql);
        while($row = $result->fetch_assoc()){
            echo '<div class="hot-item">
                        <div class="hot-item-inner wow fadeInLeft" data-wow-duration="2s" data-wow-delay="1s">
                            <a href="./product.php?masp='.$row['masp'].'&iddm='.$row['iddm'].'"><img src="./Cpanel/images/product/'.$row['NCC'].'" alt=""></a>
                            <span id="giamgia"> -'.ceil(($row['DVT']-$row['DonGia'])/($row['DVT'])*100).'%</span>
                            <div class="product-info">
                                <h4 class="view-title"><a href="./product.php?masp='.$row['masp'].'&iddm='.$row['iddm'].'">'.$row['tensp'].'</a></h4>
                                <span id="gia">'.number_format($row['DonGia']).' đ</span>
                                <span id="giamgiaroi">'.number_format($row['DVT']).' đ</span>
                            </div>
                            <a href="./product.php?masp='.$row['masp'].'&iddm='.$row['iddm'].'" class="hang-giamgia">
                                <h3>Lượt xem</h3>
                                <span>'.$row['viewsp'].' Lượt</span>
                            </a>
                        </div>
                    </div>';
            }
        }
        function sphot(){
            $connect = connect_db();
            $sql = "SELECT * FROM product order by viewsp DESC limit 3";
            $result = mysqli_query($connect,$sql);
            while($row = $result->fetch_assoc()){
                    echo '<div class="hot-item-right">
                            <div class="hot-item-inner-right">
                                <a href="./product.php?masp='.$row['masp'].'&iddm='.$row['iddm'].'"><img src="./Cpanel/images/product/'.$row['NCC'].'" alt=""></a>';
                    echo        '<span id="giagiam-right">-'.ceil(($row['DVT']-$row['DonGia'])/($row['DVT'])*100).'%</span>';
                    echo        '<div class="product-info-right">
                                    <h4 class="view-title"><a href="./product.php?masp='.$row['masp'].'&iddm='.$row['iddm'].'">'.$row['tensp'].'</a></h4>
                                    <span id="gia-right">'.number_format($row['DonGia']).' đ</span>
                                    <span id="giamgiaroi-right">'.number_format($row['DVT']).' đ</span>
                                </div>
                            </div>
                        </div>';
            }
    }

    // user
    function thongtin_user($email){
        $conn = connect_db();
        $sql = "SELECT * FROM user where email = '$email'";
        $result = mysqli_query($conn,$sql);
            while($row = $result->fetch_assoc()){
                    echo $row['username'];
            }
        }
    function thongtin_user_images($email){
        $conn = connect_db();
        $sql = "SELECT * FROM user where email = '$email'";
        $result = mysqli_query($conn,$sql);
            while($row = $result->fetch_assoc()){
                    echo $row['images'];
            }
        }
    function thongtin_user_sdt($email){
        $conn = connect_db();
        $sql = "SELECT * FROM user where email = '$email'";
        $result = mysqli_query($conn,$sql);
            while($row = $result->fetch_assoc()){
                    echo '
                    <tr>
                        <td class="icon"><span class="mdi mdi-smartphone-android"></span></td>
                        <td class="item">Mobile<span class="icon s7-phone"></span></td>
                        <td>'.$row['sdt'].'</td>
                    </tr>';
            }
        }
    function thongtin_user_gioithieu($email){
        $conn = connect_db();
        $sql = "SELECT * FROM user where email = '$email'";
        $result = mysqli_query($conn,$sql);
            while($row = $result->fetch_assoc()){
                    echo $row['gioithieu'];
            }
        }
        function timUser($email){
            $connect = connect_db();
            $resulttimkiem = $connect->query('SELECT * FROM user WHERE email="'.$email.'" ');
            while($rowOne = $resulttimkiem->fetch_assoc()){
                echo '<script type="text/javascript">document.getElementById("password").value="'.$rowOne['password'].'";</script>';
                echo '<script type="text/javascript">document.getElementById("images").value="'.$rowOne['images'].'";</script>';
                echo '<script type="text/javascript">document.getElementById("sdt").value="'.$rowOne['sdt'].'";</script>';
                echo '<script type="text/javascript">document.getElementById("gioithieu").value="'.$rowOne['gioithieu'].'";</script>';
            }
            return $resulttimkiem;
        }
        function updateuser($email, $password, $images, $sdt, $gioithieu){
        $connect = connect_db();
        $result_Update = $connect->query('UPDATE user SET password ="'.$password.'",images ="'.$images.'",sdt ="'.$sdt.'",gioithieu ="'.$gioithieu.'" WHERE email="'.$email.'" ');
        if ($result_Update) {
            echo 'Update thành công';
        }else{
            echo 'Update thất bại';
        }
        return $result_Update;
    }

    function listUser(){
        $conn = connect_db();
        $sql = 'SELECT * FROM user';
        $result = mysqli_query($conn,$sql);
        while($row=$result->fetch_assoc()){
            echo '<tr>
            <td class="user-avatar"> <img src="'.$row['images'].'" alt="Avatar">'.$row['username'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['sdt'].'</td>
            <td class="actions"><form style="display: flex; grid-column-gap: 1rem;" action="" method="post">
            <button style="border:none;" name="btnXoauser" value="'.$row['iduser'].'" class="icon" href="#"><i class="mdi mdi-delete"></i></button>
            </form></td>
        </tr>';
        }
    }
    function del_user_cmt($iduser){
        $conn = connect_db();
        $sql = "DELETE FROM cmt where iduser = $iduser";
        $result = mysqli_query($conn,$sql);
        if ($result) {
            // header("Refresh:0"); 
            echo 'xoa cmt';
        }
    }
    function del_user($iduser){
        $conn = connect_db();
        $sql = "DELETE FROM user where iduser = $iduser";
        $result = mysqli_query($conn,$sql);
        if ($result) {
            // header("Refresh:0"); 
            echo 'xoa user';
        }
    }

    function danhmucnhap(){
        $conn = connect_db();
        $sql = 'SELECT * FROM danhmuc';
        $result = mysqli_query($conn,$sql);
        while($row=$result->fetch_assoc()){
            echo '
            <option value="'.$row['iddm'].'">'.$row['tendanhmuc'].'</option>;
            ';
        }
    }
    function insert_DM($tendanhmuc){
        $connect = connect_db();
        $sql = "INSERT INTO danhmuc VALUES(null,'$tendanhmuc')";
        $result = mysqli_query($connect, $sql);
        if ($result) {
            echo 'thêm danh mục thành công';
        }else{
            echo 'thêm danh mục thất bại';
        }
        return $result;
    }
    function timDM($iddm){
        $connect = connect_db();
        $resulttimkiem = $connect->query('SELECT * FROM danhmuc WHERE iddm="'.$iddm.'" ');
        while($rowOne = $resulttimkiem->fetch_assoc()){
            echo '<script type="text/javascript">document.getElementById("iddm").value="'.$rowOne['iddm'].'";</script>';
            echo '<script type="text/javascript">document.getElementById("tendanhmuc").value="'.$rowOne['tendanhmuc'].'";</script>';
        }
        return $resulttimkiem;
    }
    function updateDM($iddm, $tendanhmuc){
        $connect = connect_db();
        $result_Update = $connect->query('UPDATE danhmuc SET tendanhmuc ="'.$tendanhmuc.'" WHERE iddm="'.$iddm.'" ');
        if ($result_Update) {
            echo 'Update thành công';
        }else{
            echo 'Update thất bại';
        }
        return $result_Update;
    }
    function del_DM($iddm){
        $connect = connect_db();
        $sql = 'DELETE FROM danhmuc WHERE iddm = "'.$iddm.'" ';
        $resultdel = $connect->query($sql);
        if ($resultdel) {
            echo 'Xoá thành công danh mục có mã '.$iddm.' <br>và tất cả sản phẩm thuộc danh mục này';
        }else{
            echo 'Xoá thất bại';
        }
        return $resultdel;
    }
    function del_sp_DM($iddm){
        $connect = connect_db();
        $sql = 'DELETE FROM product WHERE iddm = "'.$iddm.'" ';
        $resultdel = $connect->query($sql);
        return $resultdel;
    }
    function view_DM(){
        $connect = connect_db();
        $viewok = "SELECT * FROM danhmuc order by iddm asc";
        $luutam = mysqli_query($connect, $viewok);
        $stt = 1;
        echo '<table border="1"><tr><th>STT</th><th>Mã danh mục</th><th>Tên danh mục</th><th colspan="2">Chức năng</th></tr>';
        while ($row=$luutam->fetch_assoc()) {
            echo '<tr>';
            echo '<td>'.$stt++.'</td>';
            echo '<td>'.$row['iddm'].'</td>';
            echo '<td>'.$row['tendanhmuc'].'</td>';
            echo '<td>';
            echo '<form action="" method="post">';
            echo '<button type="submit" name="btnSua" id="Suabtn" value="'.$row['iddm'].'">Sửa</button>';
            echo '</form>';
            echo '</td>';
            echo '<td>';
            echo '<form action="" method="post">';
            echo '<button type="submit" name="btnXoa" id="Xoabtn" value="'.$row['iddm'].'">Xoá</button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
        // Máy tính sẽ lưu kết quả từ việc truy vấn dữ liệu bảng
    //     // Do đó chúng ta nên giải phóng bộ nhớ sau khi hoàn tất đọc dữ liệu
        mysqli_free_result($luutam);
    }

    function view_DM_home(){
        $connect = connect_db();
        $viewok = "SELECT * FROM danhmuc order by iddm asc";
        $luutam = mysqli_query($connect, $viewok);
        while ($row=$luutam->fetch_assoc()) {
            echo '<li><button type="submit" name="loai" value="'.$row['iddm'].'">'.$row['tendanhmuc'].'</button></li>';
        }
        mysqli_free_result($luutam);
    }

    // function layiduser($email, $iduser){
    //     $conn = connect_db();
    //     $sql = "SELECT * FROM user where email = '$email'";
    //     $result = mysqli_query($conn,$sql);
    //         while($row = $result->fetch_assoc()){
    //                 $userid = $row['iduser'];
    //         }
    //     return $userid;
    //     }

    function cmt($iduser, $noidungcmt, $maSP){
        $connect = connect_db();
        $sql = "INSERT INTO cmt VALUES(null,'$noidungcmt', null, $maSP, $iduser)";
        $result = mysqli_query($connect, $sql);
        // if ($result) {
        //     echo 'thêm cmt thành công';
        // }else{
        //     echo 'thêm cmt thất bại';
        // }
        return $result;
    }

    function view_cmt($maSP){
        $connect = connect_db();
        $viewok = "SELECT * FROM cmt inner join user on user.iduser = cmt.iduser where cmt.masp = '$maSP' order by idcmt desc";
        $luutam = mysqli_query($connect, $viewok);
        while ($row=$luutam->fetch_assoc()) {
            echo '<div class="binhluan_u">
            <img width="50px" height="50px" src="'.$row['images'].'" alt="">
            <div class="content_bl">
                <div class="top_cmt">';
                    if ($row['isAdmin']==0) {
                        echo '<h3 style="color: green;">'.$row['username'].'</h3>';
                    }else{
                        echo '<h3 style="color: red;">'.$row['username'].'</h3>';
                    }
                    echo'<span>'.$row['ngaycmt'].'</span>
                </div>
                <p>'.$row['noidung'].'</p>
            </div>
        </div>';
        }
        mysqli_free_result($luutam);
    }
    function avt_cmt($email){
        $conn = connect_db();
        $sql = "SELECT * FROM user where email = '$email'";
        $result = mysqli_query($conn,$sql);
            while($row = $result->fetch_assoc()){
                    echo '<img width="50px" height="50px" src="'.$row['images'].'" alt="">';
            }
    }

    function view_quanly_cmt($masp){
        $connect = connect_db();
        $viewok = "SELECT * FROM cmt inner join user inner join product on user.iduser = cmt.iduser and product.masp = cmt.masp and cmt.masp = $masp order by idcmt desc";
        $luutam = mysqli_query($connect, $viewok);
        while ($row=$luutam->fetch_assoc()) {
            echo '<tr>
            <td>
                <div class="custom-control custom-control-sm custom-checkbox">
                    <input type="checkbox" class="checkok" name="checkbox[]" value="'.$row['idcmt'].'">
                </div>
            </td>
            <td class="cell-detail"> <span>'.$row['noidung'].'</span></td>
            <td class="cell-detail"><a href="../product.php?masp='.$row['masp'].'&iddm='.$row['iddm'].'"<span>'.$row['tensp'].'</span></a></td>
            <td class="user-avatar cell-detail user-info"><img src="'.$row['images'].'" alt="Avatar"><span>'.$row['username'].'</span></td>
            <td class="cell-detail"><span>'.$row['ngaycmt'].'</span></td>
            <td class="text-right">
                <div class="btn-group btn-hspace">
                    <button class="btn btn-secondary dropdown-toggle" value="'.$row['idcmt'].'" name="btnXoacmt" type="submit">Xoá</button>
                </div>
            </td>
        </tr>';
        }
        if ($luutam->num_rows<=0) {
            echo '<p style="text-align:center;">Không có bình luận nào!</p>';
        }
    }
    function del_cmt($idcmt){
        $conn = connect_db();
        $sql = "DELETE FROM cmt where idcmt = $idcmt";
        $result = mysqli_query($conn,$sql);
        // if ($result) {
        //     header("Refresh:0"); 
        // }
    }

    // orders
    // function view_orders(){
    //     $connect = connect_db();
    //     $viewok = "SELECT * FROM orders o inner join product p inner join user u on p.masp = o.masp and u.iduser = o.iduser order by id_orders DESC";
    //     $luutam = mysqli_query($connect, $viewok);
    //     echo '<table border="1"><tr><th>ID đơn hàng</th><th>Tên sản phẩm</th><th>Hình Ảnh</th><th>Số lượng</th><th>Đơn giá</th><th>Tổng tiền</th><th>Người đặt hàng</th><th colspan="2">Chức năng</th></tr>';
    //     while ($row=$luutam->fetch_assoc()) {
    //         echo '<tr>';
    //         echo '<td>'.$row['id_orders'].'</td>';
    //         echo '<td>'.$row['tensp'].'</td>';
    //         echo '<td style="width:13%"><img style="width:100%" src="'.$row['NCC'].'" alt=""></td>';
    //         echo '<td>'.$row['soluong_orders'].'</td>';
    //         echo '<td>'.$row['dongia'].'</td>';
    //         echo '<td>'.$row['tongtien'].'</td>';
    //         echo '<td>'.$row['username'].'</td>';
    //         echo '<td>';
    //         echo '<form action="" method="post">';
    //         echo '<button type="submit" name="btnSua" id="Suabtn" value="'.$row['iddm'].'">Sửa</button>';
    //         echo '</form>';
    //         echo '</td>';
    //         echo '<td>';
    //         echo '<form action="" method="post">';
    //         echo '<button type="submit" name="btnXoa" id="Xoabtn" value="'.$row['iddm'].'">Xoá</button>';
    //         echo '</form>';
    //         echo '</td>';
    //         echo '</tr>';
    //     }
    //     echo '</table>';
    //     // Máy tính sẽ lưu kết quả từ việc truy vấn dữ liệu bảng
    // //     // Do đó chúng ta nên giải phóng bộ nhớ sau khi hoàn tất đọc dữ liệu
    //     mysqli_free_result($luutam);
    // }
    
    // function insert_orders($sl, $dongia, $tongtien, $masp, $iduser){
    //     $connect = connect_db();
    //     $result = $connect -> query("INSERT INTO orders VALUES(null, $sl, $dongia, $tongtien, $masp, $iduser)");
    //     if ($result) {
    //         echo 'Đặt hàng thành công';
    //         header("location: http://localhost/assignment/giohang/addcard.php"); 
    //     }else{
    //         echo 'Đặt hàng thất bại';
    //     }
    //     return $result;
    // }
    // function laytennguoimuahang($email){
    //     $connect = connect_db();
    //     $viewok = "SELECT * FROM user where email = '$email'";
    //     $luutam = mysqli_query($connect, $viewok);
    //     while ($row=$luutam->fetch_assoc()) {
    //         $iduser = $row['iduser'];
    //     }
    //     return $iduser;
    // }

    function img_logo(){
        $conn = connect_db();
        $result = mysqli_query($conn,"SELECT logo FROM cpanel");
        while ($row=$result->fetch_assoc()) {
            echo 'http://localhost/assignment/'.$row['logo'];
        }
    }

    function big_cmt(){
        $conn = connect_db();
        $result = mysqli_query($conn, "SELECT *,count(c.idcmt) FROM cmt c inner join product p on p.masp = c.masp GROUP BY c.masp");
        while ($row=$result->fetch_assoc()) {
            echo '<tr>
            <td>'.$row['tensp'].'</td>
            <td>'.$row['count(c.idcmt)'].'</td>
            <td><button id="chitiet" type="submit" name="chitiet" value="'.$row['masp'].'"> Chi tiết </button></td>
        </tr>';
        }
    }

?>