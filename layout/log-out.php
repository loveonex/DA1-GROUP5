<?php
require_once('./../admin/connect_DB.php');
session_start();
session_destroy();
header("Location: $website/User/home-user.php");
?>