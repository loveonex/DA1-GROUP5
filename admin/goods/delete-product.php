<?php
include_once('./../connect_DB.php');
require_once ('./../functions.php');
$id = intval($_GET['id']);
$product = getSelect_one('san_pham', 'ma_san_pham', $id);
unlink('C:/xampp/htdocs' . $url_images . $product['anh']);

getDelete('san_pham', 'ma_san_pham', $id);

header("Location: $website/admin/goods/list-product.php");
?>