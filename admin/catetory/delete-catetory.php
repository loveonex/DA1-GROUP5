<?php
include_once('./../connect_DB.php');
require_once ('./../functions.php');
$id = intval($_GET['id']);
$catetory = getSelect_one('loai', 'ma_loai', $id);
unlink('C:/xampp/htdocs/' . $url_images . $catetory['hinh']);
getDelete('loai', 'ma_loai', $id);
header("Location: $website/admin/catetory/list-catetory.php");
?>