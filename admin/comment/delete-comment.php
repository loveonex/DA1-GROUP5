<?php
include_once("./../connect_DB.php");
require_once ('./../functions.php');
$id = intval($_GET['id']);
getDelete('binh_luan', 'ma_binh_luan', $id);
header("Location: $website/admin/comment/list-comment.php");
?>