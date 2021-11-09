<?php
session_start();
include_once('./../connect_DB.php');
include_once("./../functions.php");
include_once("./../validate.php");
extract($_REQUEST);
$image = $_FILES['hinh'];
if(   
    checkEmpty($ten_san_pham) == false ||
    checkEmpty($so_luong) == false ||
    checkEmpty($gia) == false ||
    checkEmpty($ma_loai) == false ||
    checkEmpty($dac_biet) == false ||
    checkEmpty($mo_ta) == false ||
    checkEmpty($image['name']) == false
) {
    $_SESSION['error'] = "Vui lòng không để trống !";
    header("Location: $website/admin/goods/add-product.php");
    die;
}

if (checkInt(intval($so_luong)) == false || intval($so_luong) < 0){
    $_SESSION['error'] = "Số lượng không đúng định dạng !";
    header("Location: $website/admin/goods/add-product.php");
    die;
}

if (checkInt(intval($gia)) == false || intval($gia) < 0){
    $_SESSION['error'] = "Giá không đúng định dạng !";
    header("Location: $website/admin/goods/add-product.php");
    die;
}

if(checkImage($image) == false){
    $_SESSION['error'] = "Avatar phải là ảnh";
    header("Location: $website/admin/goods/add-product.php");
    die;
}

save_file('hinh', $image_path);
$hinh = $image['name'];
$ngay_them = date('Y-m-d');
insert_product($ma_loai, $ten_san_pham, $gia, $so_luong, $hinh, $ngay_them, $dac_biet, $mo_ta);
header("Location: $website/admin/goods/list-product.php");
?>