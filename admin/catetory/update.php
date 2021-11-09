<?php
session_start();
include_once('./../connect_DB.php');
include_once("./../functions.php");
include_once("./../validate.php");
extract($_REQUEST);
$image = $_FILES['hinh'];
if(checkEmpty($ten_loai) == false) {
    $_SESSION['error'] = "Vui lòng không để trống !";
    header("Location: $website/admin/catetory/update-catetory.php?id=$ma_loai");
    die;
}
$catetory = getSelect_one('loai', 'ma_loai', $id);
if(checkEmpty($image) == false){
    update_catetory($ten_loai, $catetory['hinh'], $ma_loai);
} else {
    if(checkImage($image) == false){
        $_SESSION['error'] = "Avatar phải là ảnh";
        header("Location: $website/admin/catetory/update-catetory.php?id=$ma_loai");
        die;
    }
    save_file('hinh', $image_path);
    $hinh = $image['name'];
    unlink('C:/xampp/htdocs/' . $url_images . $catetory['hinh']);
    update_catetory($ten_loai, $hinh, $ma_loai);
}
header("Location: $website/admin/catetory/list-catetory.php");
?>