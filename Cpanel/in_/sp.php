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
    echo'<div class="row">
    <div class="col-md-12">
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
                </div><span class="title"><b>Tất cả sản phẩm - Tổng : '; count_product(); echo'</b></span></div>
                ';
                if (isset($_POST['btnView'])) {
                echo '<div class="widget-chart-container">';
                if (isset($_POST["btnView"])) { view_product();}
                echo '</div>';
                }
                echo'
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
            <div class="card-body table-responsive">';
                 view_product_xachtay();
                 echo'
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
            <div class="card-body table-responsive">';
                view_product_chinhhang();
                echo'
            </div>
            </div>
        </div>
    </div>
</div>'; }};
?>