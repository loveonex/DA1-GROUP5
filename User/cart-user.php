<?php
include_once('./../admin/connect_DB.php');
include_once('./../admin/functions.php');
include_once('./start-user.php');
$_SESSION['ma'] ++;
if (isset($_POST['edit']) && (int) $_POST['edit'] != 0) {
    if ($_POST['sp_' . $_POST['edit']] < 1){
        $_SESSION['error'] = "<script>alert('Số lượng không được < 1');</script>";
        header("Location: $website/User/cart-user.php");
        die;
    }
    $_SESSION['sp_' . $_POST['edit']] = $_POST['sp_' . $_POST['edit']];
    $value = getSelect_one('san_pham', 'ma_san_pham ', $_POST['edit']);
    
    $_SESSION['ten_' . $_POST['edit']] = $value['ten'];
    $_SESSION['anh_' . $_POST['edit']] = $value['anh'];
    $_SESSION['so_luong_' . $_POST['edit']] = $_POST['sp_' . $_POST['edit']];
    $_SESSION['gia_' . $_POST['edit']] = $value['gia'];
    header("Location: $website/User/cart-user.php");
}
if (isset($_POST['delete']) && (int) $_POST['delete'] != 0) {
    $_SESSION['sp_' . $_POST['delete']] = 0;
    if(
        isset($_SESSION['ten_' . $_POST['delete']]) &&
        isset($_SESSION['anh_' . $_POST['delete']]) &&
        isset($_SESSION['so_luong_' . $_POST['delete']]) &&
        isset($_SESSION['gia_' . $_POST['delete']])
    ){
        unset($_SESSION['ten_' . $_POST['delete']]);
        unset($_SESSION['anh_' . $_POST['delete']]);
        unset($_SESSION['so_luong_' . $_POST['delete']]);
        unset($_SESSION['gia_' . $_POST['delete']]);
    }
    header("Location: $website/User/cart-user.php");
}
?>
<?php
session_start();
if (isset($_SESSION['error'])){
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
?>
<div style="margin-top: 100px;"></div>
    <div class="container mt-5">
        <h1 style="text-align: center; color: #ff9f1a; margin-bottom: 50px;">Giỏ Hàng Của Bạn</h1>
        <br>
        <table class="table table-hover">
            <?php
            if($sosp == 0){
                echo '<h2 style="text-align: center; margin-bottom: 50px;">Không có Sản Phẩm</h2>'; 
            } else {
                echo "
                <thead>
                    <tr>
                        <td>STT</td>
                        <td>Tên Sản Phẩm</td>
                        <td>Ảnh Sản Phẩm</td>
                        <td>Số Lượng</td>
                        <td>Giá</td>
                        <td>Thao Tác</td>
                    </tr>
                </thead>
                ";
                $stt = 1;
                $tong = 0;
                for ($i = 1; $i <= 100; $i++) {
                    if (isset($_SESSION['sp_' . $i]) && (int)$_SESSION['sp_' . $i] != 0) {
                        $data = getSelect_one('san_pham', 'ma_san_pham ', $i);
                        $tong += $data['gia']*$_SESSION['sp_' .  $data['id']];
            ?>
            <form method="POST">
            <tbody>
                <tr>
                    <td><br><?php echo $stt ?></td>
                    <td><br><?php echo $data['ten'] ?></td>
                    <td><img src="<?php echo $data['anh'] ?>" witdh="60px" height="70px" alt=""></td>
                    <td><br><input type="number" name="sp_<?php echo $data['id']; ?>" value="<?= $_SESSION['sp_' .  $data['id']]; ?>"></td>
                    <td><br><?php echo number_format($data['gia']*$_SESSION['sp_' .  $data['id']]); ?> VNĐ</td>
                    <td><br><button name="edit" value="<?php echo $data['id'] ?>" onclick="return confirm_save();" class="btn btn-danger">Lưu</button><button name="delete" value="<?php echo $data['id'] ?>" onclick="return confirm_delete();" class="btn btn-danger">Xóa</button></td>
                </tr>
            </tbody>
                </form>
            <?php
                        $stt++;
                    }
                }
                echo 
                "
                <tbody>
                    <tr>
                        <td colspan='4' style='text-align:right'><h2>Tổng Tiền: </h2></td>
                        <td colspan='2'><h2 style='color: red'>$tong VNĐ</h2></td>
                    </tr>
                </tbody>
                <a href='./receipt.php' class='btn btn-primary' onclick='return confirm_thanhtoan();'>Thanh Toán</a>
                ";
            }
            ?>

        </table>
    </div>


<div style="margin: 30px;"></div>

<?php
include_once('./end-user.php');
?>

