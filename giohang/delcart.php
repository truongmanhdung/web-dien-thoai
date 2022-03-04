<?php
session_start();
$cart = $_SESSION['cart'];//lay be session
$id=$_GET['masp'];//lay ve id
if($id==0)
{
    unset($_SESSION['cart']);//xoa gio hang
}
else
{
    unset($_SESSION['cart'][$id]);//xoa san pham trong gio hang
}
header("Location: ../index.php");//tro ve trang index
exit();
?>