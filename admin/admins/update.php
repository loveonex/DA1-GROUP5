<?php
session_start();
include_once('./../connect_DB.php');
include_once('./../functions.php');
include_once('./../validate.php');
extract($_REQUEST);
$image = $_FILES['anh'];
if  (   
        checkEmpty($tai_khoan) == false ||
        checkEmpty($mat_khau) == false ||
        checkEmpty($mat_khau2) == false ||
        checkEmpty($ten) == false ||
        checkEmpty($sdt) == false ||
        checkEmpty($dia_chi) == false ||
        checkEmpty($email) == false
    ) {
        $_SESSION['error'] = "Vui lòng không để trống !";
        header("Location: $website/admin/admins/update-admin.php?id=$id");
        die;
    }

$ton_tai = getSelect_one('admin', 'tai_khoan', $tai_khoan);
if(!empty($ton_tai) && $tai_khoan_cu != $tai_khoan){
    $_SESSION['error'] = "Tài khoản đã tồn tại !";
    header("Location: $website/admin/admins/update-admin.php?id=$id");
    die;
}

if(checkEmail($email) == false){
    $_SESSION['error'] = "Email không đúng định dạng !";
    header("Location: $website/admin/admins/update-admin.php?id=$id");
    die;
}

if (checkSdt($sdt) == false){
    $_SESSION['error'] = "Số điện thoại không đúng định dạng !";
    header("Location: $website/admin/admins/update-admin.php?id=$id");
    die;
}
if($mat_khau_cu == $mat_khau){
    $mat_khau = $mat_khau_cu;
} else {
    $mat_khau = md5('loveonex' . $mat_khau);
}
if($mat_khau_cu2 == $mat_khau2){
    $mat_khau2 = $mat_khau_cu2;
} else {
    $mat_khau2 = md5('loveonex' . $mat_khau2);
}


$admin = getSelect_one('admin', 'id', $id);
if(checkEmpty($image['name']) == false){
    update_admin($tai_khoan, $mat_khau, $mat_khau2, $ten, $sdt, $dia_chi, $admin['anh'], $email, $id);
} else {
    if(checkImage($image) == false){
        $_SESSION['error'] = "Avatar phải là ảnh";
        header("Location: $website/admin/admins/update-admin.php?id=$id");
        die;
    }
    save_file('anh', $image_path);
    $anh = $image['name'];
    unlink('C:/xampp/htdocs/' . $url_images . $admin['anh']);
    update_admin($tai_khoan, $mat_khau, $mat_khau2, $ten, $sdt, $dia_chi, $image, $email, $id);
}
header("Location: $website/admin/admins/list-admin.php");
?>