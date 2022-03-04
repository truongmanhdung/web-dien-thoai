<!DOCTYPE html>
<?php require_once('../admin/SanPhamDB.php'); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link
        rel="stylesheet"
        href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
        crossOrigin="anonymous"/>
      <link rel="stylesheet" href="style.css">
</head>
<body>
        <form class="login-form" method="post" action="#">
          <h2 id="dangnhap">Đăng nhập</h2>
            <input type="email" name="email" placeholder="Email" required/>
            <div class="input-icon">
              <input type="password" name="pass" placeholder="Password" required/>
              <i class="fa fa-eye show-password"></i>
            </div>
            <a href="../sigin" class="forgot">Chưa có tài khoản?</a>
            <button name="btnLogin">Sign in</button>
            <p id="thongbao"><?php if (isset($_POST['btnLogin'])) {login_ok(); } ?></p>
          </form>
          <script src="app.js"></script>
</body>
</html>