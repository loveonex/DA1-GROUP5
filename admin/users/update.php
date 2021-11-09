<?php
session_start();
include_once('./../functions.php');
require_once ('./../validate.php');
extract($_REQUEST);
if  (
    checkEmpty($tai_khoan) == false ||
    checkEmpty($mat_khau) == false ||
    checkEmpty($ten) == false ||
    checkEmpty($dia_chi) == false ||
    checkEmpty($email) == false ||
    checkEmpty($sdt) == false
    )
{
    $_SESSION['error'] = "Vui lòng không để trống !";
    header("Location: $website/admin/users/update-user.php?id=$ma_khach_hang");
    die;
}

$ton_tai = getSelect_one('khach_hang', 'tai_khoan', $tai_khoan);
if(!empty($ton_tai) && $tai_khoan_cu != $tai_khoan){
    $_SESSION['error'] = "Tài khoản đã tồn tại !";
    header("Location: $website/admin/users/update-user.php?id=$ma_khach_hang");
    die;
}

if (checkEmail($email) == false){
    $_SESSION['error'] = "Email không đúng định dạng !";
    header("Location: $website/admin/users/update-user.php?id=$ma_khach_hang");
    die;
}

if (checkSdt($sdt) == false){
    $_SESSION['error'] = "Số điện thoại không đúng định dạng !";
    header("Location: $website/admin/users/update-user.php?id=$ma_khach_hang");
    die;
}
if($mat_khau_cu == $mat_khau){
    $mat_khau = $mat_khau_cu;
} else {
    $mat_khau = md5('loveonex' . $mat_khau);
}
update_user($tai_khoan, $mat_khau, $ten, $dia_chi, $email, $sdt, $ma_khach_hang);
header("Location: $website/admin/users/list-user.php");
?>