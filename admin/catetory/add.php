<?php
session_start();
include_once('./../connect_DB.php');
include_once("./../functions.php");
include_once("./../validate.php");
extract($_REQUEST);
$image = $_FILES['hinh'];
if  (   
        checkEmpty($ten_loai) == false ||
        checkEmpty($image['name']) == false
    ) {
        $_SESSION['error'] = "Vui lòng không để trống !";
        header("Location: $website/admin/catetory/add-catetory.php");
        die;
    }

if(checkImage($image) == false){
    $_SESSION['error'] = "Avatar phải là ảnh";
    header("Location: $website/admin/catetory/add-catetory.php");
    die;
}

save_file('hinh', $image_path);
$hinh = $image['name'];
$ngay_them = date('Y-m-d');
insert_catetory($ten_loai, $ngay_them, $hinh);
header("Location: $website/admin/catetory/list-catetory.php");
?>