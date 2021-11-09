<?php
include_once("./../connect_DB.php");
require_once ('./../functions.php');
$id = intval($_GET['id']);
getDelete('khach_hang', 'ma_khach_hang', $id);
header("Location: $website/admin/users/list-user.php");
?>