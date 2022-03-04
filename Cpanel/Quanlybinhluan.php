<!DOCTYPE html>
<html lang="en">
<?php session_start(); require_once("../admin/SanPhamDB.php");ob_start(); ?>
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
    <style>
    .csschon{
        background: #54aed8;
        padding: 5px 10px;
        border: 1px solid black;
        cursor: pointer;
    }
    .csschon2{
        background: #54aed8;
        padding: 2.5px 10px;
        border: 1px solid black;
        cursor: pointer;
    }
    #chitiet{
        border: none;
        background: #4dabe3;
        padding: 6px 10px;
        border-radius: 1rem;
        color: #fff;
        outline: none;
    }
    </style>
</head>

<body>
    <div class="be-wrapper">
        <nav class="navbar navbar-expand fixed-top be-top-header">
            <div class="container-fluid">
                <div class="be-navbar-header">
                    <a class="navbar-brand" href="index.html"></a>
                </div>
                <div class="page-title"><span>Quản lý bình luận</span></div>
                <div class="be-right-navbar">
                  <?php include('../Cpanel/in_/menu.php'); ?>
                </div>
            </div>
        </nav>
        <div class="be-left-sidebar">
            <div class="left-sidebar-wrapper"><a class="left-sidebar-toggle" href="#">General Tables</a>
                <div class="left-sidebar-spacer">
                    <div class="left-sidebar-scroll">
                        <div class="left-sidebar-content">
                        <?php include('../Cpanel/in_/sidebar.php'); ?>
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
            <div class="page-head">
                <h2 class="page-head-title">Tables</h2>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb page-head-nav">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Tables</a></li>
                        <li class="breadcrumb-item active">General</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-header">Tất cả bình luận
                            <div class="tools dropdown"><span class="icon mdi mdi-download"></span><a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"><span class="icon mdi mdi-more-vert"></span></a>
                                <div class="dropdown-menu" role="menu"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive noSwipe">
                                <form action="./tables-general.php" method="post">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width:20%;">Tên sản phẩm</th>
                                            <th style="width:17%;">Số bình luận</th>
                                            <th style="width:10%;">Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php big_cmt();?>
                                    </tbody>
                                </table>
                                </form>
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
    <script type="text/javascript">
        $(document).ready(function() {
            //-initialize the javascript
            App.init();
        });

        // Chức năng chọn hết
                document.querySelector(".btn1").onclick = function () 
            {
                // Lấy danh sách checkbox
                var checkboxes = document.querySelectorAll('.checkok');
                // Lặp và thiết lập checked
                for (var i = 0; i < checkboxes.length; i++){
                    checkboxes[i].checked = true;
                }
            };
 
            // Chức năng bỏ chọn hết
            document.querySelector(".btn2").onclick = function () 
            {
                // Lấy danh sách checkbox
                var checkboxes = document.querySelectorAll('.checkok');
                // Lặp và thiết lập Uncheck
                for (var i = 0; i < checkboxes.length; i++){
                    checkboxes[i].checked = false;
                }
            };
    </script>
</body>

</html>