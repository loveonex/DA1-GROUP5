<?php
session_start();
require_once ('./../admin/connect_DB.php');
require_once ('./../admin/functions.php');
require_once ('./../admin/validate.php');
extract($_REQUEST);

if(checkEmpty($tai_khoan) == false || checkEmpty($mat_khau) == false){
    $_SESSION['error'] = "Vui lòng không để trống !";
    header("Location: $website/layout/login.php");
    die;
}

$user = getSelect_one('khach_hang', 'tai_khoan', $tai_khoan);
if(empty($user) == true || $user['mat_khau'] != md5('loveonex' . $mat_khau)){
    $_SESSION['error'] = "Thông Tin Tài Khoản Mật Khẩu Không Chính Xác !";
    header("Location: $website/layout/login.php");
    die;
}
$_SESSION['user'] = $user;
header("Location: $website/User/home-user.php");
?>