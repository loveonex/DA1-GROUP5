<?php
session_start();
include_once('./../admin/functions.php');
require_once ('./../admin/validate.php');
extract($_REQUEST);

if(!isset($_SESSION['user'])){
    header("Location: $website/layout/login.php");
    die;
}

if  (
    checkEmpty($mat_khau) == false ||
    checkEmpty($mat_khau2) == false
    )
{
    $_SESSION['error'] = "Vui lòng không để trống !";
    header("Location: $website/layout/edit-pass.php");
    die;
}

if ($mat_khau != $mat_khau2){
    $_SESSION['error'] = "Xác nhận mật khẩu không khớp !";
    header("Location: $website/layout/edit-pass.php");
    die;
}
$mat_khau = md5('loveonex' . $mat_khau);
update_user($_SESSION['user']['tai_khoan'], $mat_khau, $_SESSION ['user']['ten'], $_SESSION['user']['dia_chi'], $_SESSION['user']['email'], $_SESSION['user']['sdt'], $ma_khach_hang);
$_SESSION['user'] = getSelect_one('khach_hang', 'ma_khach_hang', $ma_khach_hang);
header("Location: $website/User/home-user.php");
?>