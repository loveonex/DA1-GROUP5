<?php
session_start();
require_once('./../admin/connect_DB.php');
require_once('./../admin/functions.php');
require_once('./../admin/validate.php');
extract($_REQUEST);
if  (
    checkEmpty($tai_khoan) == false ||
    checkEmpty($mat_khau) == false ||
    checkEmpty($mat_khau2) == false ||
    checkEmpty($ten) == false ||
    checkEmpty($dia_chi) == false ||
    checkEmpty($email) == false ||
    checkEmpty($sdt) == false
    )
{
    $_SESSION['error'] = "Vui lòng không để trống !";
    header("Location: $website/layout/sign-up.php");
    die;
}

$ton_tai = getSelect_one('khach_hang', 'tai_khoan', $tai_khoan);
if(!empty($ton_tai)){
    $_SESSION['error'] = "Tài khoản đã tồn tại !";
    header("Location: $website/layout/sign-up.php");
    die;
}

if ($mat_khau != $mat_khau2){
    $_SESSION['error'] = "Mật khẩu xác nhận không chính xác !";
    header("Location: $website/layout/sign-up.php");
    die;
}

if (checkSdt($sdt) == false){
    $_SESSION['error'] = "Số điện thoại không đúng định dạng !";
    header("Location: $website/layout/sign-up.php");
    die;
}

if (checkEmail($email) == false){
    $_SESSION['error'] = "Email không đúng định dạng !";
    header("Location: $website/layout/sign-up.php");
    die;
}

$mat_khau = md5('loveonex' . $mat_khau);
$ngay_them = date('Y-m-d');

insert_user($tai_khoan, $mat_khau, $ten, $dia_chi, $email, $ngay_them, $sdt);

$_SESSION['info'] = "<script>alert('Đăng Kí Thành Công! Đăng Nhập Ngay!');</script>";
header("Location: $website/layout/login.php");
?>