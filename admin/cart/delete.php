<?php
include_once('./../connect_DB.php');
require_once('./../functions.php');
$ma = $_GET['ma'];
deleteDonHang($ma);
header("Location: $website/admin/cart/list-receipt.php");
?>