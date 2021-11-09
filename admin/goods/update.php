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
    checkEmpty($mo_ta) == false
) {
    $_SESSION['error'] = "Vui lòng không để trống !";
    header("Location: $website/admin/goods/update-product.php?id=$ma_san_pham");
    die;
}

if(checkInt(intval($so_luong)) == false || intval($so_luong) < 0){
    $_SESSION['error'] = "Số lượng sai !";
    header("Location: $website/admin/goods/update-product.php?id=$ma_san_pham");
    die;
}

if(checkInt(intval($gia)) == false || intval($gia) < 0){
    $_SESSION['error'] = "Giá sai !";
    header("Location: $website/admin/goods/update-product.php?id=$ma_san_pham");
    die;
}

$product = getSelect_one('san_pham', 'ma_san_pham', $ma_san_pham);
if(checkEmpty($image['name']) == false){
    $ngay_sua = date('Y-m-d');
    update_product($ma_loai, $ten_san_pham, $gia, $so_luong, $product['hinh'], $ngay_sua, $dac_biet, $mo_ta, $ma_san_pham);
} else {
    if(checkImage($image) == false){
        $_SESSION['error'] = "Avatar phải là ảnh";
        header("Location: $website/admin/goods/update-product.php?id=$ma_san_pham");
        die;
    }
    save_file('hinh', $image_path);
    $hinh = $image['name'];
    $ngay_sua = date('Y-m-d');
    unlink('C:/xampp/htdocs/' . $url_images . $product['hinh']);
    update_product($ma_loai, $ten_san_pham, $gia, $so_luong, $hinh, $ngay_sua, $dac_biet, $mo_ta, $ma_san_pham);
}
header("Location: $website/admin/goods/list-product.php");
?>