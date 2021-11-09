<?php
session_start();
require_once('./../admin/functions.php');
$dem = 0;
for ($i = 1; $i <= 100; $i++) {
    if (isset($_SESSION['ten_' . $i]) &&
        isset($_SESSION['anh_' . $i]) &&
        isset($_SESSION['so_luong_' . $i]) &&
        isset($_SESSION['gia_' . $i])
    ) {
        $data = [
            'id_khach_hang' => $_SESSION['user']['id'],
            'ten_san_pham' => $_SESSION['ten_' . $i],
            'anh' => $_SESSION['anh_' . $i],
            'so_luong' => $_SESSION['so_luong_' . $i],
            'gia' => $_SESSION['gia_' . $i],
            'ma' => $_SESSION['ma']
        ];
        unset($_SESSION['ten_' . $i]);
        unset($_SESSION['anh_' . $i]);
        unset($_SESSION['so_luong_' . $i]);
        unset($_SESSION['gia_' . $i]);
        insertDonHang($data);
        $dem++;
    }
}
if($dem == 0){
    $_SESSION['error'] = "<script>alert('Vui lòng lưu ít nhất 1 sản phẩm');</script>";
    header("Location: http://localhost/ASM_PHP1_CLASS/User/cart-user.php");
    die;
}
$_SESSION['sucess'] = "<script>alert('Thanh toán thành công')</script>";
header("Location: http://localhost/ASM_PHP1_CLASS/User/home-user.php");
?>