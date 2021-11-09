<?php
session_start();
require_once('./../admin/connect_DB.php');
require_once('./../admin/functions.php');
if (isset($_SESSION['user'])){
    $id = $_SESSION['user']['id'];
    $id_sp = intval($_GET['id']);
    $_SESSION['sp_' . $id_sp] = (int) $_SESSION['sp_' . $id_sp] + 1;
    header("Location: $website/User/home-user.php");
    die;
} else {
    $_SESSION['error-cart'] = "<script>alert('Vui Lòng Đăng Nhập Trước!');</script>";
    header("Location: $website/layout/login.php");
}
?>