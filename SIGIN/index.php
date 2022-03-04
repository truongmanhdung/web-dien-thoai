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
          <h2 id="dangnhap">Đăng ký</h2>
            <input type="email" name="email" placeholder="Email" required/>
            <div class="input-icon">
            <input type="text" name="usernameok" placeholder="username" required/>
              <input type="password" name="pass" placeholder="Password" required/>
            </div>
            <a href="../login" class="forgot">Đã có tài khoản !</a>
            <button name="btnSigup">Sign Up</button>
            <p id="thongbao"><?php if (isset($_POST['btnSigup'])) {sigin_ok(); } ?></p>
          </form>
          <script src="app.js"></script>
</body>
</html>