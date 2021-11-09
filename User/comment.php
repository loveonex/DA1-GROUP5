<?php
session_start();
require_once('./../admin/connect_DB.php');
require_once('./../admin/functions.php');
require_once('./../admin/validate.php');
extract($_REQUEST);

if(checkEmpty($danh_gia) == false || checkEmpty($noi_dung) == false){
    $_SESSION['error_cmt'] = "<h2 style='color:red'>Vui lòng không để trống</h2>";
    header("Location: $website/User/detail_product.php?id=$ma_san_pham#comment");
    die;
}
if(strlen($noi_dung) > 2000){
    $_SESSION['error_cmt'] = "<h2 style='color:red'>Nội dung đánh giá không quá 2000 kí tự !</h2>";
    header("Location: $website/User/detail_product.php?id=$ma_san_pham#comment");
    die;
}
$ngay_them = date('Y-m-d H:i:s');
insert_comment($noi_dung, $danh_gia, $ma_san_pham, $ma_khach_hang, $ngay_them);
header("Location: $website/User/detail_product.php?id=$ma_san_pham#cmt");
?>