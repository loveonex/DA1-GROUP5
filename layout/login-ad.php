<?php
session_start();
require_once('./../admin/connect_DB.php');
require_once ('./../admin/functions.php');
require_once ('./../admin/validate.php');
extract($_REQUEST);
if (
    checkEmpty($tai_khoan) == false ||
    checkEmpty($mat_khau) == false ||
    checkEmpty($mat_khau2) == false
    ) {
        $_SESSION['error'] = "Vui lòng không để trống !";
        header("Location: $website/layout/login-admin.php");
        die;
    }

$admin = getSelect_one('admin', 'tai_khoan', $tai_khoan);
if(empty($admin) == true || $admin['mat_khau'] != md5('loveonex' . $mat_khau) || $admin['mat_khau2'] != md5('loveonex' . $mat_khau2)){
    $_SESSION['error'] = "Thông Tin Tài Khoản Mật Khẩu Không Chính Xác !";
    header("Location: $website/layout/login-admin.php");
    die;
}
$_SESSION['admin'] = $admin;

header("Location: $website/admin/home/home-admin.php");
?>