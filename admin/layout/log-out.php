<?php
session_start();
require_once('./../connect_DB.php');
unset($_SESSION['admin']);
header("Location: $website/User/home-user.php");
?>