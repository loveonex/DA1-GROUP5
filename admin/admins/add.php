<?php
session_start();
include_once("./../connect_DB.php");
include_once("./../functions.php");
include_once("./../validate.php");
extract($_REQUEST);
$image = $_FILES['anh'];
if  (   
        checkEmpty($tai_khoan) == false ||
        checkEmpty($mat_khau) == false ||
        checkEmpty($mat_khau2) == false ||
        checkEmpty($ten) == false ||
        checkEmpty($sdt) == false ||
        checkEmpty($dia_chi) == false ||
        checkEmpty($email) == false ||
        checkEmpty($image['name']) == false
    ) {
        $_SESSION['error'] = "Vui lòng không để trống !";
        header("Location: $website/admin/admins/add-admin.php");
        die;
    }
$ton_tai = getSelect_one('admin', 'tai_khoan', $tai_khoan);
if(!empty($ton_tai)){
    $_SESSION['error'] = "Tài khoản đã tồn tại !";
    header("Location: $website/admin/admins/add-admin.php");
    die;
}
if(checkEmail($email) == false){
    $_SESSION['error'] = "Email không đúng định dạng !";
    header("Location: $website/admin/admins/add-admin.php");
    die;
}

if (checkSdt($sdt) == false){
    $_SESSION['error'] = "Số điện thoại không đúng định dạng !";
    header("Location: $website/admin/admins/add-admin.php");
    die;
}

if(checkImage($image) == false){
    $_SESSION['error'] = "Avatar phải là ảnh";
    header("Location: $website/admin/admins/add-admin.php");
    die;
}
$mat_khau = md5('loveonex' . $mat_khau);
$mat_khau2 = md5('loveonex' . $mat_khau2);

save_file('anh', $image_path);
$anh = $image['name'];
$ngay_them = date('Y-m-d');
insert_admin($tai_khoan, $mat_khau, $mat_khau2, $ten, $sdt, $dia_chi, $anh, $email, $ngay_them);
header("Location: $website/admin/admins/list-admin.php");
?>