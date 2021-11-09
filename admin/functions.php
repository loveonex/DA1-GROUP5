<?php
include_once('connect_DB.php');
function getSelect($table){
    $sql = "SELECT * FROM $table order by ngay_them desc";
    return query($sql);
}

function getSelect_one($table, $id, $value){
    $sql = "SELECT * FROM $table where $id = ?";
    return query_one($sql, $value);
}

function getDelete($table, $id, $value){
    $sql = "DELETE FROM $table WHERE $id = ?";
    return execute($sql, $value);
}

/*
    ADMIN
*/
function insert_admin($tai_khoan, $mat_khau, $mat_khau2, $ten, $sdt, $dia_chi, $anh, $email, $ngay_them){
    $sql = "INSERT INTO admin(tai_khoan, mat_khau, mat_khau2, ten, sdt, dia_chi, anh, email, ngay_them) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    execute($sql, $tai_khoan, $mat_khau, $mat_khau2, $ten, $sdt, $dia_chi, $anh, $email, $ngay_them);
}
function update_admin($tai_khoan, $mat_khau, $mat_khau2, $ten, $sdt, $dia_chi, $anh, $email, $id){
    $sql = "UPDATE admin set tai_khoan = ?, mat_khau = ?, mat_khau2 = ?, ten = ?, sdt = ?, dia_chi = ?, anh = ?, email = ? where id = ?";
    execute($sql, $tai_khoan, $mat_khau, $mat_khau2, $ten, $sdt, $dia_chi, $anh, $email, $id);
}
/*
    USER
*/
function insert_user($tai_khoan, $mat_khau, $ten, $dia_chi, $email, $ngay_them, $sdt){
    $sql = "INSERT INTO khach_hang(tai_khoan, mat_khau, ten, dia_chi, email, ngay_them, sdt) VALUES (?, ?, ?, ?, ?, ?, ?)";
    execute($sql, $tai_khoan, $mat_khau,  $ten,  $dia_chi, $email, $ngay_them, $sdt);
}
function update_user($tai_khoan, $mat_khau, $ten, $dia_chi, $email , $sdt, $ma_khach_hang){
    $sql = "UPDATE khach_hang set tai_khoan = ?, mat_khau = ?, ten = ?, dia_chi = ?, email = ?, sdt = ? where ma_khach_hang = ?";
    execute($sql, $tai_khoan, $mat_khau, $ten, $dia_chi, $email , $sdt, $ma_khach_hang);
}
/*
    PRODUCT
*/
function insert_product($ma_loai, $ten_san_pham, $gia, $so_luong, $hinh, $ngay_them, $dac_biet, $mo_ta){
    $sql = "INSERT INTO san_pham(ma_loai, ten_san_pham, gia, so_luong, hinh, ngay_them, dac_biet, mo_ta) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    execute($sql, $ma_loai, $ten_san_pham, $gia, $so_luong, $hinh, $ngay_them, $dac_biet, $mo_ta);
}
function update_product($ma_loai, $ten_san_pham, $gia, $so_luong, $hinh, $ngay_sua, $dac_biet, $mo_ta, $ma_san_pham){
    $sql = "UPDATE san_pham set ma_loai = ?, ten_san_pham = ?, gia = ?, so_luong = ?, hinh = ?, ngay_sua = ?, dac_biet = ?, mo_ta = ? where ma_san_pham = ?";
    execute($sql, $ma_loai, $ten_san_pham, $gia, $so_luong, $hinh, $ngay_sua, $dac_biet, $mo_ta, $ma_san_pham);
}
function luot_xem($luot_xem,$id){
    $result = getSelect_one('san_pham', 'ma_san_pham', $id);
    $luot_xem = intval($result['luot_xem']) + intval($luot_xem);
    $sql = "UPDATE san_pham set luot_xem = ? where ma_san_pham = ?";
    execute($sql, $luot_xem, $id);
}
function getSelectByCatetory($id){
    $sql = "SELECT * FROM san_pham where ma_loai = '$id' order by ngay_them desc";
    return query($sql);
}
function getSelectByName($name){
    $sql = "SELECT * FROM san_pham where ten_san_pham like '%$name%' order by ngay_them desc";
    return query($sql);
}
function getSelectTop10(){
    $sql = "SELECT * FROM san_pham order by luot_xem desc limit 0,10";
    return query($sql);
}
/*
    CATETORY
*/
function insert_catetory($ten_loai, $ngay_them, $hinh){
    $sql = "INSERT INTO loai(ten_loai, ngay_them, hinh) VALUES (?, ?, ?)";
    execute($sql, $ten_loai, $ngay_them, $hinh);
}
function update_catetory($ten_loai, $hinh, $ma_loai){
    $sql = "UPDATE loai set ten_loai = ?, hinh = ? where ma_loai = ?";
    execute($sql, $ten_loai, $hinh, $ma_loai);
}
/*
    CART
*/

/*
    COMMENT
*/
function getSelect_comment($ma_san_pham, $id){
    $sql = "SELECT * FROM binh_luan where $ma_san_pham = '$id' order by ngay_them desc";
    return query($sql);
}
function insert_comment($noi_dung, $danh_gia, $ma_san_pham, $ma_khach_hang, $ngay_them){
    $sql = "INSERT INTO binh_luan(noi_dung, danh_gia, ma_san_pham, ma_khach_hang, ngay_them) VALUES (?, ?, ?, ?, ?)";
    execute($sql, $noi_dung, $danh_gia, $ma_san_pham, $ma_khach_hang, $ngay_them);
}
function update_comment($noi_dung, $ma_binh_luan){
    $sql = "UPDATE loai set noi_dung = ? where ma_binh_luan = ?";
    execute($sql, $noi_dung, $ma_binh_luan);
}
?>