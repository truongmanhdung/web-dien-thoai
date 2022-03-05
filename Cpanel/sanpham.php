<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once '../admin/SanPhamDB.php';
?>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="assets\img\logo-fav.png">
        <title>Beagle</title>
        <link rel="stylesheet" type="text/css" href="assets\lib\perfect-scrollbar\css\perfect-scrollbar.css">
        <link rel="stylesheet" type="text/css" href="assets\lib\material-design-icons\css\material-design-iconic-font.min.css">
        <link rel="stylesheet" type="text/css" href="assets\lib\jquery.vectormap\jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" type="text/css" href="assets\lib\jqvmap\jqvmap.min.css">
        <link rel="stylesheet" type="text/css" href="assets\lib\datetimepicker\css\bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="assets\css\app.css" type="text/css">
        <link rel="stylesheet" href="./assets/css/cssthem.css" type="text/css">
    </head>

    <body>
        <div class="be-wrapper be-fixed-sidebar">
            <nav class="navbar navbar-expand fixed-top be-top-header">
                <div class="container-fluid">
                    <div class="be-navbar-header">
                        <a class="navbar-brand" href="../index.php"></a>
                    </div>
                    <div class="page-title"><span>Sản phẩm</span></div>
                    <div class="be-right-navbar">
                        <?php include './in_/menu.php'; ?>
                    </div>
                </div>
            </nav>
            <div class="be-left-sidebar">
                <div class="left-sidebar-wrapper"><a class="left-sidebar-toggle" href="#">Dashboard</a>
                    <div class="left-sidebar-spacer">
                        <div class="left-sidebar-scroll">
                            <div class="left-sidebar-content">
                                <?php include './in_/sidebar.php'; ?>
                            </div>
                        </div>
                    </div>
                    <div class="progress-widget">
                        <div class="progress-data"><span class="progress-value">100%</span><span class="name">Tốc độ</span></div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-primary" style="width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="be-content">
                <div class="main-content container-fluid">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-xl-3">
                            <div class="widget widget-tile">
                                <div class="chart sparkline"><img style="display: inline-block; width: 85px; height: 35px; vertical-align: top;" src="../images/giaohang.svg" width="85" height="35" alt=""></div>
                                <div class="data-info">
                                    <div class="desc" style="font-size: 25px; color: red;">Tín</div>
                                    <div class="value"><span style="font-size: 12px;">Luôn đặt chữ tín lên hàng đầu</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-3">
                            <div class="widget widget-tile">
                                <div class="chart sparkline"><img style="display: inline-block; width: 85px; height: 35px; vertical-align: top;" src="../images/hotro.svg" width="85" height="35" alt=""></div>
                                <div class="data-info">
                                    <div class="desc" style="font-size: 25px; color: red;">Nghĩa</div>
                                    <div class="value"><span style="font-size: 12px;">Sống phải có nghĩa khí</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-3">
                            <div class="widget widget-tile">
                                <div class="chart sparkline"><img style="display: inline-block; width: 85px; height: 35px; vertical-align: top;" src="../images/safe.svg" width="85" height="35" alt=""></div>
                                <div class="data-info">
                                    <div class="desc" style="font-size: 25px; color: red;">Danh</div>
                                    <div class="value"><span style="font-size: 12px;">Thương hiệu toàn quốc</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-3">
                            <div class="widget widget-tile">
                                <div class="chart sparkline"><img style="display: inline-block; width: 85px; height: 35px; vertical-align: top;" src="../images/chatluong.svg" width="85" height="35" alt=""></div>
                                <div class="data-info">
                                    <div class="desc" style="font-size: 25px; color: red;">Lợi</div>
                                    <div class="value"><span style="font-size: 12px;">Lãi sau danh tiếng</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="widget widget-head">
                                <div class="button-toolbar d-none d-md-block">
                                </div><span class="title"><b>Thêm sản phẩm</b></span>
                            </div>
                            <div class="card-body table-responsive">
                                <style>
                                    .widget-chart-container{
                                        height: 650px;
                                    }
                                    .widget-chart-container tr,
                                    .widget-chart-container td {
                                        padding: 10px 10px;
                                    }
                                    
                                    .card-body form {
                                        background: #fff;
                                        display: flex;
                                        align-items: center;
                                        justify-content: space-around;
                                        flex-direction: column;
                                        width: 100%;
                                    }
                                    
                                    .card-body form input, .card-body select {
                                        height: 35px;
                                        border-radius: .8rem;
                                        outline: none;
                                        width: 80%;
                                        border: none;
                                        background: #e7e7e7;
                                        padding-left: 20px;
                                    }
                                    
                                    .card-body.table-responsive {
                                        height: 650px;
                                    }
                                    
                                    .btnSlider {
                                        display: flex;
                                        justify-content: space-around;
                                        grid-column-gap: 1rem;
                                    }
                                    
                                    .btnSlider button {
                                        color: #fff;
                                        background: #3560ff;
                                        height: 30px;
                                        border-radius: .5rem;
                                        border: none;
                                        outline: none;
                                    }
                                    
                                    .btnSlider button:nth-child(2) {
                                        background: #28db88;
                                    }
                                    
                                    .btnSlider button:nth-child(1):hover {
                                        background: #5979ec;
                                    }
                                    
                                    .btnSlider button:nth-child(2):hover {
                                        background: #70eeb3;
                                    }
                                </style>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="text" name="maSP" id="maSP" style="display:none">
                                    <input type="text" name="tenSP" id="tenSP" placeholder="Tên sản phẩm" required>
                                    <input type="text" name="DVT" id="DVT" placeholder="Giá gốc" required>
                                    <input type="text" name="donGia" id="donGia" placeholder="Giá KM" required>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Thêm ảnh</label>
                                        <label for="imgInp" class="ms-2">
                                            <img class="" width="100px" src="https://cdn.pixabay.com/photo/2012/04/13/00/21/plus-31216_960_720.png" alt="" id="blah">
                                        </label>
                                        <input type="file" name="image_product" id="imgInp" hidden>
                                    </div>
                                    <script>
                                    imgInp.onchange = evt => {
                                        const [file] = imgInp.files
                                        if (file) {
                                        blah.src = URL.createObjectURL(file)
                                        }
                                    }
                                    </script>
                                    <textarea name="chitietsp" id="chitietsp" rows="5" cols="42"></textarea>
                                    <select name="loai" id="loai">
                                        <option value="Chính hãng">Chính Hãng</option>
                                        <option value="Xách tay">Xách tay</option>
                                    </select>
                                    <select name="iddm" id="iddm">
                                        <?php danhmucnhap(); ?>
                                    </select>
                                    <div class="btnSlider">
                                        <button type="submit" name="themsp">Thêm SP</button>
                                        <button type="submit" name="updatesp">Update SP</button>
                                    </div>
                                    <?php
                                    if (isset($_POST['themsp'])) {
                                        $tenSP = $_POST['tenSP'];
                                        $DVT = $_POST['DVT'];
                                        $donGia = $_POST['donGia'];
                                        $loai = $_POST['loai'];
                                        $chitietsp = $_POST['chitietsp'];
                                        $iddm = $_POST['iddm'];
                                        if($_FILES['image_product']['type'] == "image/jpeg" || $_FILES['image_product']['type'] == "image/png" || $_FILES['image_product']['type'] == "image/gif" || $_FILES['image_product']['type'] == "image/webp"){
                                            $ncc = $_FILES['image_product']['name'];
                                            $tmp = $_FILES['image_product']['tmp_name'];
                                            // Khai báo biến lưu trữ đường dẫn
                                            move_uploaded_file($tmp, "images/product/" . $ncc);

                                            insert_product(
                                                $tenSP,
                                                $DVT,
                                                $donGia,
                                                $ncc,
                                                $loai,
                                                $chitietsp,
                                                $iddm
                                            );
                                        }   
                                        
                                    }
                                    if (isset($_POST['btnXoa'])) {
                                        $maSP = $_POST['btnXoa'];
                                        del_product($maSP);
                                    }
                                    if (isset($_POST['btnSua'])) {
                                        $maSP = $_POST['btnSua'];
                                        searchID($maSP);
                                    }
                                    if (isset($_POST['updatesp'])) {
                                        $maSP = $_POST['maSP'];
                                        $tenSP = $_POST['tenSP'];
                                        $DVT = $_POST['DVT'];
                                        $donGia = $_POST['donGia'];
                                        $loai = $_POST['loai'];
                                        $chitietsp = $_POST['chitietsp'];
                                        $iddm = $_POST['iddm'];
                                        if($_FILES['image_product']['type'] == "image/jpeg" || $_FILES['image_product']['type'] == "image/png" || $_FILES['image_product']['type'] == "image/gif" || $_FILES['image_product']['type'] == "image/webp"){
                                            $ncc = $_FILES['image_product']['name'];
                                            $tmp = $_FILES['image_product']['tmp_name'];
                                            // Khai báo biến lưu trữ đường dẫn
                                            move_uploaded_file($tmp, "images/product/" . $ncc);

                                            updateOK(
                                                $maSP,
                                                $tenSP,
                                                $DVT,
                                                $donGia,
                                                $ncc,
                                                $loai,
                                                $chitietsp,
                                                $iddm
                                            );
                                        }   
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="widget widget-fullwidth be-loading">
                                <div class="widget-head">
                                    <div class="tools">
                                        <div class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><span class="icon mdi mdi-more-vert d-inline-block d-md-none"></span></a>
                                        </div>
                                        <form action="" method="post">
                                            <button id="btnView" name="btnView" class="icon toggle-loading mdi mdi-refresh-sync"></button><span class="icon mdi mdi-close"></span>
                                        </form>
                                    </div>
                                    <div class="button-toolbar d-none d-md-block">
                                    </div><span class="title"><b>Tất cả sản phẩm</b></span></div>
                                <?php
                                echo '<div class="widget-chart-container">';
                                view_product();
                                echo '</div>';
                                ?>
                                <div class="be-spinner">
                                    <svg width="40px" height="40px" viewbox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
                                        <circle class="circle" fill="none" stroke-width="4" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="card card-table">
                                <div class="card-header">
                                    <div class="tools dropdown"> <span class="icon mdi mdi-download"></span><a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"><span class="icon mdi mdi-more-vert"></span></a>
                                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                    <div class="title">IPhone xách tay</div>
                                </div>
                                <div class="card-body table-responsive">
                                    <?php view_product_xachtay(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="card card-table">
                                <div class="card-header">
                                    <div class="tools dropdown"><span class="icon mdi mdi-download"></span><a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"><span class="icon mdi mdi-more-vert"></span></a>
                                        <div class="dropdown-menu dropdown-menu-right" role="menu"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                    <div class="title">IPhone chính hãng</div>
                                </div>
                                <div class="card-body table-responsive">
                                    <div class="card-body table-responsive">
                                        <?php view_product_chinhhang(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="be-right-sidebar">
                <div class="sb-content">
                    <div class="tab-navigation">
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Chat</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Todo</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Settings</a></li>
                        </ul>
                    </div>
                    <div class="tab-panel">
                        <div class="tab-content">
                            <div class="tab-pane tab-chat active" id="tab1" role="tabpanel">
                                <div class="chat-contacts">
                                    <div class="chat-sections">
                                        <div class="be-scroller-chat">
                                            <div class="content">
                                                <h2>Recent</h2>
                                                <div class="contact-list contact-list-recent">
                                                    <div class="user">
                                                        <a href="#"><img src="assets\img\avatar1.png" alt="Avatar">
                                                            <div class="user-data"><span class="status away"></span><span class="name">Claire Sassu</span><span class="message">Can you share the...</span></div>
                                                        </a>
                                                    </div>
                                                    <div class="user">
                                                        <a href="#"><img src="assets\img\avatar2.png" alt="Avatar">
                                                            <div class="user-data"><span class="status"></span><span class="name">Maggie jackson</span><span class="message">I confirmed the info.</span></div>
                                                        </a>
                                                    </div>
                                                    <div class="user">
                                                        <a href="#"><img src="assets\img\avatar3.png" alt="Avatar">
                                                            <div class="user-data"><span class="status offline"></span><span class="name">Joel King		</span><span class="message">Ready for the meeti...</span></div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <h2>Contacts</h2>
                                                <div class="contact-list">
                                                    <div class="user">
                                                        <a href="#"><img src="assets\img\avatar4.png" alt="Avatar">
                                                            <div class="user-data2"><span class="status"></span><span class="name">Mike Bolthort</span></div>
                                                        </a>
                                                    </div>
                                                    <div class="user">
                                                        <a href="#"><img src="assets\img\avatar5.png" alt="Avatar">
                                                            <div class="user-data2"><span class="status"></span><span class="name">Maggie jackson</span></div>
                                                        </a>
                                                    </div>
                                                    <div class="user">
                                                        <a href="#"><img src="assets\img\avatar6.png" alt="Avatar">
                                                            <div class="user-data2"><span class="status offline"></span><span class="name">Jhon Voltemar</span></div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bottom-input">
                                        <input type="text" placeholder="Search..." name="q"><span class="mdi mdi-search"></span>
                                    </div>
                                </div>
                                <div class="chat-window">
                                    <div class="title">
                                        <div class="user"><img src="assets\img\avatar2.png" alt="Avatar">
                                            <h2>Maggie jackson</h2><span>Active 1h ago</span>
                                        </div><span class="icon return mdi mdi-chevron-left"></span>
                                    </div>
                                    <div class="chat-messages">
                                        <div class="be-scroller-messages">
                                            <div class="content">
                                                <ul>
                                                    <li class="friend">
                                                        <div class="msg">Hello</div>
                                                    </li>
                                                    <li class="self">
                                                        <div class="msg">Hi, how are you?</div>
                                                    </li>
                                                    <li class="friend">
                                                        <div class="msg">Good, I'll need support with my pc</div>
                                                    </li>
                                                    <li class="self">
                                                        <div class="msg">Sure, just tell me what is going on with your computer?</div>
                                                    </li>
                                                    <li class="friend">
                                                        <div class="msg">I don't know it just turns off suddenly</div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-input">
                                        <div class="input-wrapper"><span class="photo mdi mdi-camera"></span>
                                            <input type="text" placeholder="Message..." name="q" autocomplete="off"><span class="send-msg mdi mdi-mail-send"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane tab-todo" id="tab2" role="tabpanel">
                                <div class="todo-container">
                                    <div class="todo-wrapper">
                                        <div class="be-scroller-todo">
                                            <div class="todo-content"><span class="category-title">Today</span>
                                                <ul class="todo-list">
                                                    <li>
                                                        <div class="custom-checkbox custom-control custom-control-sm"><span class="delete mdi mdi-delete"></span>
                                                            <input class="custom-control-input" type="checkbox" checked="" id="tck1">
                                                            <label class="custom-control-label" for="tck1">Initialize the project</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-checkbox custom-control custom-control-sm"><span class="delete mdi mdi-delete"></span>
                                                            <input class="custom-control-input" type="checkbox" id="tck2">
                                                            <label class="custom-control-label" for="tck2">Create the main structure							</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-checkbox custom-control custom-control-sm"><span class="delete mdi mdi-delete"></span>
                                                            <input class="custom-control-input" type="checkbox" id="tck3">
                                                            <label class="custom-control-label" for="tck3">Updates changes to GitHub							</label>
                                                        </div>
                                                    </li>
                                                </ul><span class="category-title">Tomorrow</span>
                                                <ul class="todo-list">
                                                    <li>
                                                        <div class="custom-checkbox custom-control custom-control-sm"><span class="delete mdi mdi-delete"></span>
                                                            <input class="custom-control-input" type="checkbox" id="tck4">
                                                            <label class="custom-control-label" for="tck4">Initialize the project							</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-checkbox custom-control custom-control-sm"><span class="delete mdi mdi-delete"></span>
                                                            <input class="custom-control-input" type="checkbox" id="tck5">
                                                            <label class="custom-control-label" for="tck5">Create the main structure							</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-checkbox custom-control custom-control-sm"><span class="delete mdi mdi-delete"></span>
                                                            <input class="custom-control-input" type="checkbox" id="tck6">
                                                            <label class="custom-control-label" for="tck6">Updates changes to GitHub							</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-checkbox custom-control custom-control-sm"><span class="delete mdi mdi-delete"></span>
                                                            <input class="custom-control-input" type="checkbox" id="tck7">
                                                            <label class="custom-control-label" for="tck7" title="This task is too long to be displayed in a normal space!">This task is too long to be displayed in a normal space!							</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bottom-input">
                                        <input type="text" placeholder="Create new task..." name="q"><span class="mdi mdi-plus"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane tab-settings" id="tab3" role="tabpanel">
                                <div class="settings-wrapper">
                                    <div class="be-scroller-settings"><span class="category-title">General</span>
                                        <ul class="settings-list">
                                            <li>
                                                <div class="switch-button switch-button-sm">
                                                    <input type="checkbox" checked="" name="st1" id="st1"><span>
                            <label for="st1"></label></span>
                                                </div><span class="name">Available</span>
                                            </li>
                                            <li>
                                                <div class="switch-button switch-button-sm">
                                                    <input type="checkbox" checked="" name="st2" id="st2"><span>
                            <label for="st2"></label></span>
                                                </div><span class="name">Enable notifications</span>
                                            </li>
                                            <li>
                                                <div class="switch-button switch-button-sm">
                                                    <input type="checkbox" checked="" name="st3" id="st3"><span>
                            <label for="st3"></label></span>
                                                </div><span class="name">Login with Facebook</span>
                                            </li>
                                        </ul><span class="category-title">Notifications</span>
                                        <ul class="settings-list">
                                            <li>
                                                <div class="switch-button switch-button-sm">
                                                    <input type="checkbox" name="st4" id="st4"><span>
                            <label for="st4"></label></span>
                                                </div><span class="name">Email notifications</span>
                                            </li>
                                            <li>
                                                <div class="switch-button switch-button-sm">
                                                    <input type="checkbox" checked="" name="st5" id="st5"><span>
                            <label for="st5"></label></span>
                                                </div><span class="name">Project updates</span>
                                            </li>
                                            <li>
                                                <div class="switch-button switch-button-sm">
                                                    <input type="checkbox" checked="" name="st6" id="st6"><span>
                            <label for="st6"></label></span>
                                                </div><span class="name">New comments</span>
                                            </li>
                                            <li>
                                                <div class="switch-button switch-button-sm">
                                                    <input type="checkbox" name="st7" id="st7"><span>
                            <label for="st7"></label></span>
                                                </div><span class="name">Chat messages</span>
                                            </li>
                                        </ul><span class="category-title">Workflow</span>
                                        <ul class="settings-list">
                                            <li>
                                                <div class="switch-button switch-button-sm">
                                                    <input type="checkbox" name="st8" id="st8"><span>
                            <label for="st8"></label></span>
                                                </div><span class="name">Deploy on commit</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <script src="assets\lib\jquery\jquery.min.js" type="text/javascript"></script>
        <script src="assets\lib\perfect-scrollbar\js\perfect-scrollbar.min.js" type="text/javascript"></script>
        <script src="assets\lib\bootstrap\dist\js\bootstrap.bundle.min.js" type="text/javascript"></script>
        <script src="assets\js\app.js" type="text/javascript"></script>
        <script src="assets\lib\jquery-flot\jquery.flot.js" type="text/javascript"></script>
        <script src="assets\lib\jquery-flot\jquery.flot.pie.js" type="text/javascript"></script>
        <script src="assets\lib\jquery-flot\jquery.flot.time.js" type="text/javascript"></script>
        <script src="assets\lib\jquery-flot\jquery.flot.resize.js" type="text/javascript"></script>
        <script src="assets\lib\jquery-flot\plugins\jquery.flot.orderBars.js" type="text/javascript"></script>
        <script src="assets\lib\jquery-flot\plugins\curvedLines.js" type="text/javascript"></script>
        <script src="assets\lib\jquery-flot\plugins\jquery.flot.tooltip.js" type="text/javascript"></script>
        <script src="assets\lib\jquery.sparkline\jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="assets\lib\countup\countUp.min.js" type="text/javascript"></script>
        <script src="assets\lib\jquery-ui\jquery-ui.min.js" type="text/javascript"></script>
        <script src="assets\lib\jqvmap\jquery.vmap.min.js" type="text/javascript"></script>
        <script src="assets\lib\jqvmap\maps\jquery.vmap.world.js" type="text/javascript"></script>
        <!-- wysiwyg editor html -->
        <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
        <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
        <!-- wysiwyg editor html -->
        <script type="text/javascript">
            $(document).ready(function() {
                //-initialize the javascript
                App.init();
                App.dashboard();

            });
        </script>
    </body>

</html>