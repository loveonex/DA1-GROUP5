<?php
session_start();
require_once('./../admin/connect_DB.php');
?>
<?php
if(!isset($_SESSION['user'])){
    header("Location: $website/layout/login.php");
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi Mật Khẩu</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>

    <div class="auth-wrapper">
        <div class="auth-background"></div>
        <div class="auth-container">
            <form class="auth-form" action="edit.php" method="post">
                <div class="auth-form--title">
                    <h1 style="text-align:center">Đổi Mật Khẩu</h1>
                    <span style="color: red;">
                    <?php 
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
                    </span>
                </div>
                <div class="auth-form--body">
                    <input type="hidden" class="form-control" name="ma_khach_hang"  id="name" value="<?=$_SESSION['user']['ma_khach_hang']?>">
                    <div class="mb-3">
                        <label for="password">Mật Khẩu Mới</label>
                        <input type="password" class="form-control" name="mat_khau"  id="password">
                    </div>
                    <div class="mb-3">
                        <label for="password">Xác Nhận Mật Khẩu</label>
                        <input type="password" class="form-control" name="mat_khau2"  id="password2">
                    </div>
                    <button type="submit" class="btn btn-blue mb-3" name="register">Đổi</button>
                    <a href="<?=$website?>/User/home-user.php" class="btn btn-dark">
                        Trang Chủ
                        <img src="https://www.nicepng.com/png/full/9-97633_right-arrow-white-png-right-arrow-png-white.png" class="btn-icon" style="margin-left: 1rem;width: 20px;height: 18px;"/>
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>