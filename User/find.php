<?php
session_start();
require_once('./../admin/connect_DB.php');
require_once('./../admin/functions.php');
require_once('./../admin/validate.php');
extract($_REQUEST);
$result = getSelectByName($search);
$so_luong = count($result);
$_SESSION['empty'] = "<h5 style='text-align:center;color: red'>Có $so_luong sản phẩm chứa từ khóa '$search'</h5>";
$_SESSION['search'] = $result;
$_SESSION['sluong'] = $so_luong;
header("Location: $website/user/home-user.php#products");
?>