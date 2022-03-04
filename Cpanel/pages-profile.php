<!DOCTYPE html>
<html lang="en">
<?php session_start(); ob_start();
    require_once('../admin/SanPhamDB.php');
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
    <link rel="stylesheet" href="assets\css\app.css" type="text/css">
</head>

<body>
    <div class="be-wrapper">
        <nav class="navbar navbar-expand fixed-top be-top-header">
            <div class="container-fluid">
                <div class="be-navbar-header">
                    <a class="navbar-brand" href="index.php"></a>
                </div>
                <div class="page-title"><span>Profile</span></div>
                <div class="be-right-navbar">
                <?php include('./in_/menu.php'); ?>
                </div>
            </div>
        </nav>
        <div class="be-left-sidebar">
            <div class="left-sidebar-wrapper"><a class="left-sidebar-toggle" href="#">Profile</a>
                <div class="left-sidebar-spacer">
                    <div class="left-sidebar-scroll">
                        <div class="left-sidebar-content">
                        <?php include('./in_/sidebar.php'); ?>
                        </div>
                    </div>
                </div>
                <div class="progress-widget">
                    <div class="progress-data"><span class="progress-value">60%</span><span class="name">Current Project</span></div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary" style="width: 60%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="be-content">
            <div class="main-content container-fluid">
                <div class="user-profile">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="user-display">
                                <div class="user-display-bg"><img src="assets\img\user-profile-display.png" alt="Profile Background"></div>
                                <div class="user-display-bottom">
                                    <div class="user-display-avatar"><img src="<?php if(isset($_SESSION['dangnhap'])){ $email = $_SESSION['dangnhap']; thongtin_user_images($email);}; ?>" alt="Avatar"></div>
                                    <div class="user-display-info">
                                        <div class="name">
                                            <?php if(isset($_SESSION['dangnhap'])){ $email = $_SESSION['dangnhap']; thongtin_user($email);}; ?></div>
                                        <div class="nick"><span class="mdi mdi-email"></span> <?php if(isset($_SESSION['dangnhap'])){echo $_SESSION['dangnhap'];}; ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="user-info-list card">
                                <div class="card-header card-header-divider">Thông tin bản thân<span class="card-subtitle"><?php if(isset($_SESSION['dangnhap'])){ $email = $_SESSION['dangnhap']; thongtin_user_gioithieu($email);}; ?></span></div>
                                <div class="card-body">
                                    <table class="no-border no-strip skills">
                                        <tbody class="no-border-x no-border-y">
                                        <?php if(isset($_SESSION['dangnhap'])){ $email = $_SESSION['dangnhap']; thongtin_user_sdt($email);}; ?>
                                        </tbody>
                                    </table>
                                    <form action="" method="post"><button id="chinhsua" name="chinhsua" type="submit">Chỉnh sửa</button></form>
                                    <style>
                                    .widget-chart-container tr,
                                    .widget-chart-container td {
                                        padding: 10px 20px;
                                    }
                                    
                                    .card-body form {
                                        background: #fff;
                                        display: flex;
                                        align-items: center;
                                        justify-content: space-around;
                                        flex-direction: column;
                                        width: 100%;
                                        grid-row-gap: 5px;
                                    }
                                    
                                    .card-body form input, .card-body select {
                                        height: 55px;
                                        border-radius: .8rem;
                                        outline: none;
                                        width: 80%;
                                        border: none;
                                        background: #e7e7e7;
                                        padding-left: 20px;
                                    }
                                    
                                    .card-body.table-responsive {
                                        height: 450px;
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
                                    .card-body form textarea:nth-child(4) {
                                        height: 100px;
                                        border-radius: .8rem;
                                        outline: none;
                                        width: 80%;
                                        border: none;
                                        background: #e7e7e7;
                                        padding-left: 20px;
                                        padding: 10px;
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
                                    #chinhsua{
                                        border: none;
                                        background: #97caf5;
                                        padding: 5px 10px;
                                        border-radius: 2rem;
                                        outline: none;
                                        margin-bottom: 10px;
                                    }
                                </style>
                                <form action="" method="post">
                                    <?php
                                        if(isset($_SESSION['dangnhap'])){
                                        $email = $_SESSION['dangnhap'];
                                        if (isset($_POST['chinhsua'])) {
                                            echo '<input type="text" name="password" id="password" placeholder="Password" required>
                                            <input type="text" name="images" id="images" placeholder="Ảnh">
                                            <input type="text" name="sdt" id="sdt" placeholder="sdt">
                                            <textarea name="gioithieu" id="gioithieu" cols="40" rows="10"placeholder="gioithieu"></textarea>
                                            <div class="btnSlider">
                                                <button type="submit" name="updatesp">Update</button>
                                            </div>';
                                            timUser($email);
                                        }
                                        if (isset($_POST['updatesp'])) {
                                            $password = $_POST['password'];
                                            $images = $_POST['images'];
                                            $sdt = $_POST['sdt'];
                                            $gioithieu = $_POST['gioithieu'];
                                            updateuser($email, $password, $images, $sdt, $gioithieu);
                                            header("Refresh:0");
                                        }

                                        if (isset($_POST['btnXoauser'])) {
                                            $iduser = $_POST['btnXoauser'];
                                            del_user_cmt($iduser);
                                            del_user($iduser);
                                            header("Refresh:0");
                                        }

                                    }
                                        ?>
                                </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <?php
                            if (isset($_SESSION['dangnhap'])) {
                                        $email =$_SESSION['dangnhap'];
                                    $connect = connect_db();
                                    $result = $connect->query('SELECT * FROM user WHERE isAdmin = 1 and email="'.$email.'" ');
                                    if ($result->num_rows>0) {
                                        $quyenadmin = 1;
                                    }else{
                                        $quyenadmin = 0;
                                    }
                                if ($quyenadmin == 1) {
                                    echo '<div class="widget widget-fullwidth widget-small">
                                <div class="widget-head pb-6">
                                    <div class="title">Quản lý user</div>
                                </div>
                                <div class="widget-chart-container">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width:37%;">User</th>
                                                <th style="width:36%;">Email</th>
                                                <th>Số điện thoại</th>
                                                <th class="actions"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            ';
                                            listUser();
                                            echo'
                                        </tbody>
                                    </table>
                                </div>
                            </div>';
                                }
                            } ?>
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
    <script src="assets\lib\jquery-ui\jquery-ui.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            //-initialize the javascript
            App.init();
            App.pageProfile();
        });
    </script>
</body>

</html>