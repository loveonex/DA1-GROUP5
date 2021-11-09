<?php
session_start();
require_once('./../admin/connect_DB.php');
$id_kh = $_SESSION['user']['id'];
$id_sp = intval($_GET['id']);
$conn = getConnection();
$sql = "delete from don_hang where id_khach_hang = :id_kh and id_san_pham = :id_sp";
$statement = $conn->prepare($sql);
$statement->execute(['id_kh' => $id_kh, 'id_sp' => $id_sp]);
function dem(){
    $id = $_SESSION['user']['id'];
    $conn = getConnection();
    $sql = "select count(id) as 'so_luong' from don_hang where id_khach_hang = :id_khach_hang";
    $statement = $conn->prepare($sql);
    $statement->execute(['id_khach_hang' => $id]);
    $id_khach_hang = $statement->fetch();
    return $id_khach_hang['so_luong'];
}
$_SESSION['cart'] = dem();
header("Location: $website/User/cart-user.php");

?>