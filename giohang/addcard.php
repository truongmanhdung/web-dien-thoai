<?php
session_start();
ob_start();
require_once('../admin/SanPhamDB.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./style.css" />
  <title>Giỏ Hàng</title>
</head>

<body>
  <div class="container">
    <header style="display:flex;justify-content: space-between; color:#fff;">
      <p>Xin chào! <b><?php if(isset($_SESSION['dangnhap'])){echo $_SESSION['dangnhap'];}; ?></b></p>
      <a href="../index.php"><i class="fas fa-angle-double-right"></i> Tiếp tục mua hàng
      </a>
    </header>
    <!-- end header -->
    <main>
      <div class="main-top">
        <hr />
      </div>
      <!-- end main top -->
      <div class="content">
        <h1><i class="fas fa-shopping-cart"> My Cart</i></h1>
        <div class="showCart">
          <span class = "error">Giỏ Hàng Trống</span>
          <form action="" method="post">
            <table>
              <tr>
                <th>STT</th>
                <th>MSP</th>
                <th>Sản Phẩm</th>
                <th>Tên Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Đơn Giá</th>
                <th>Tổng Tiền</th>
                <th>Tác Vụ</th>
              </tr>
              <?php

              if (isset($_GET['masp'])) { // kiểm tra id có đc gửi lên hay ko
                $soluong = (float)$_GET['qty'];
                $id = $_GET['masp'];  // lấy id xuống 
                if (!isset($_SESSION['cart']))   // kiểm tra tồn tại của session
                  $_SESSION['cart'] = array();    // nếu mà chưa thì tạo một mảng mới cho session
                if (isset($_SESSION['cart'][$id])) {  // kiểm tra sản phẩm có tồn tại trong giỏ hàng hay chưa
                  $_SESSION['cart'][$id]['qty'] += $soluong;  // nếu có thì + thêm 1
                } else {
                  $_SESSION['cart'][$id] = $id;  // Nếu chưa thì thêm nó vào
                  $_SESSION['cart'][$id] = array(  // đoạn này là gán trực tiếp vào mảng gồm 2 trường là id và số lượng
                    'qty' => $soluong,
                    'masp' => "$id"

                  );
                }
              }
              
              $conn = new mysqli("localhost", "root", "", "asm"); // kết nối với sql
              $totalCash = 0;
              $i = 1;
              if (isset($_SESSION['cart'])) {
              // ---- đoạn này là dùng 2 vòng lặp để lấy giá trị
                 // vòng lặp 1( foreach) dùng để lấy ra tất cả các id của sản phẩm đã lưu trong session['cart']
                 // vòng lặp 2(while) dùng để đối chiếu với sql(id của vòng lặp 1 đc lấy ra thì đồng thời vòng lặp của databast để lấy toàn bộ thông tin ra và gán vào bảng table)
                foreach ($_SESSION['cart'] as $list) { // vòng 1 lặp lấy ra tất cả các id trong session['cart']
                $result = $conn->query("SELECT * FROM product SP WHERE SP.masp ='".$list['masp']."'");
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) { // vòng lặp 2 lấy dữ liệu từ databast
                    $amount = $list['qty'];
                    echo '
                          <tr>
                          <td>' . $i++ . '</td>
                          <td><input name="masp" value="'.$row['masp'].'"/></td>
                          <td><img class="imgProduct" style = "width: 80px;"src="../Cpanel/images/product/'.$row['NCC'].'"></img></td>
                          <td><input name="tensp" value="'.$row['tensp'].'"/></td>
                          <td><input name="sl" class="amount" value="'.(int)$amount.'" min="1" max="999" type="number" /></td>
                          <td><input name="dongia" class="productCash" value="' . ($row['DonGia']) . '"/>VND</td>
                          <td> <input name="tongtien" value="'.($amount * $row['DonGia']) . '" class="totalCash"/> VND</td>
                          <td><button id="button_xoa" name="deleteCart" value = "'.$row['masp'].'">Xóa</button></td>
                          </tr>';
                    $totalCash += $amount * $row['DonGia']; // tổng tiền += số lượng * đơn giá
                  }
                } else {
                  echo "<span class='error'>Giỏ Hàng Trống !</span>";
                }
              }
              }
              echo '<tr class="totalCash">
                      <td>Tổng Tiền:</td>
                      <td colspan="6" class="showTotalCash">'.number_format($totalCash).' VND</td>
                    </tr>';
              // xoa Sản Phẩm Trong Giỏ Hàng
              if (isset($_POST['deleteCart'])) {
                $valSP = $_POST['deleteCart'];
                unset($_SESSION['cart'][$valSP]); // dùng hàm unset để xóa từng sản phẩm có trong cart
                if (!empty(($_SESSION['cart'][$valSP]))) {
                  echo "<script>alert('Xóa Thất Bại !')</script>";
                } else {
                  header('location: http://localhost/assignment/giohang/addcard.php');
                }
              }
              // sua Sản Phẩm Trong Giỏ Hàng
              if (isset($_POST['updateCart'])) {
                $valSP = $_POST['updateCart'];
                $_SESSION['cart'][$valSP]; // dùng hàm unset để xóa từng sản phẩm có trong cart
                if (!empty(($_SESSION['cart'][$valSP]))) {
                  echo "<script>alert('Sửa Thất Bại !')</script>";
                } else {
                  header('location: http://localhost/assignment/giohang/addcard.php');
                }
              }
              ?>
            </table>
            <script>
                document.querySelector('#sua').addEventListener('click', ()=>{
                var soluongxxx = document.querySelector('#suasoluong').value;
                document.querySelector('.amount').value = soluongxxx;
                });
            </script>
            <div class="form-submit">
            <button id="loading" type="submit" name="dathang"> Đặt hàng</i></button>
              <!-- <button id="loading" type="submit" name=""><i class="fas fa-sync-alt"> Reload</i></button> -->
              <button id="delete" type="submit" name="deleteAll">Xóa Tất Cả</button>
            </div>
          </form>
        <?php 
        // xóa tất cả
        if (isset($_POST['deleteAll'])) {
               session_destroy(); //sử dụng hàm session_destroy() để xóa sạch bộ nhớ session
               header("location: http://localhost/assignment/giohang/addcard.php");
        }
        
        ?>
        <!-- end showcart -->
      </div>
      <!-- end content -->
    </main>
    <!-- end main -->
  </div>
  <?php
    if (isset($_POST['dathang'])) {
      $sl = $_POST['sl'];
      $dongia = $_POST['dongia'];
      $tongtien = $_POST['tongtien'];
      $masp = $_POST['masp'];
      $email = $_SESSION['dangnhap'];
      $iduser = laytennguoimuahang($email);
      insert_orders($sl, $dongia, $tongtien, $masp, $iduser);
    } ?>

  <script>
   var valCash = document.querySelector('.showTotalCash').innerHTML
   if (valCash == "0 VND") {
     document.querySelector('.error').style.display = "flex";
   } else{
    document.querySelector('.error').style.display = "none";
   }
  
  
  </script>

</body>

</html>