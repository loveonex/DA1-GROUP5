<?php
require_once('./../admin/connect_DB.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin</title>
    <link rel="stylesheet" href="./css/login.css">
    <style>a{text-align: center;}</style>
</head>
<body>
<?php
    session_start();
?>
    <div class="auth-wrapper">
        <div class="auth-background"></div>
        <div class="auth-container">
            <form class="auth-form" action="<?=$website?>/layout/login-ad.php" method="post">
                <div class="auth-form--title">
                    <h1>Đăng Nhập Quản Trị Viên</h1>
                </div>
                <div class="auth-form--body">
                    <div class="mb-3">
                        <span style="color:red">
                        <?php
                        
                        if (isset($_SESSION['error']))
                        {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                        ?>
                        </span>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email">Tài Khoản</label>
                        <input type="text" class="form-control"  name="tai_khoan" id="tai_khoan" placeholder="Tài Khoản">
                    </div>
                    <div class="mb-3">
                        <label for="password">Mật Khẩu</label>
                        <input type="password" class="form-control" name="mat_khau" id="password" placeholder="******">
                    </div>
                    <div class="mb-3">
                        <label for="password">Mật Khẩu Cấp 2</label>
                        <input type="password" class="form-control" name="mat_khau2" id="password" placeholder="******">
                    </div>
                    
                    <button type="submit" class="btn btn-blue mb-3" name="login">Đăng Nhập</button>
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <div class="form-group-checkbox">
                         
                        </div>
                        <a href="../User/home-user.php" class="btn btn-blue  text-center">Quay Lại</a>
                 
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</body>
</html>