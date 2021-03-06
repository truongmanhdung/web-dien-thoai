<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
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
                <div class="page-title"><span>Bảng điều khiển</span></div>
                <div class="be-right-navbar">
                    <?php include('./in_/menu.php'); ?>
                </div>
            </div>
        </nav>
        <div class="be-left-sidebar">
            <div class="left-sidebar-wrapper"><a class="left-sidebar-toggle" href="#">Dashboard</a>
                <div class="left-sidebar-spacer">
                    <div class="left-sidebar-scroll">
                        <div class="left-sidebar-content">
                        <?php include('./in_/sidebar.php'); ?>
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
                <?php include('./in_/sp.php'); ?>
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
    <script type="text/javascript">
        $(document).ready(function() {
            //-initialize the javascript
            App.init();
            App.dashboard();

        });
    </script>
</body>

</html>