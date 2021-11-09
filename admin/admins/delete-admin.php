<?php
include_once("./../connect_DB.php");
require_once ('./../functions.php');
$id = intval($_GET['id']);
$admin = getSelect_one('admin', 'id', $id);
unlink('C:/xampp/htdocs' . $url_images . $admin['anh']);
getDelete('admin', 'id', $id);

header("Location: $website/admin/admins/list-admin.php");
?>