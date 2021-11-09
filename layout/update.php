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
    checkEmpty($ten) == false ||
    checkEmpty($dia_chi) == false ||
    checkEmpty($email) == false ||
    checkEmpty($sdt) == false
    )
{
    $_SESSION['error'] = "Vui lòng không để trống !";
    header("Location: $website/layout/update-user.php");
    die;
}

if (checkEmail($email) == false){
    $_SESSION['error'] = "Email không đúng định dạng !";
    header("Location: $website/layout/update-user.php");
    die;
}

if (checkSdt($sdt) == false){
    $_SESSION['error'] = "Số điện thoại không đúng định dạng !";
    header("Location: $website/layout/update-user.php");
    die;
}
update_user($_SESSION['user']['tai_khoan'], $_SESSION['user']['mat_khau'], $ten, $dia_chi, $email, $sdt, $ma_khach_hang);
$_SESSION['user'] = getSelect_one('khach_hang', 'ma_khach_hang', $ma_khach_hang);
header("Location: $website/User/home-user.php");