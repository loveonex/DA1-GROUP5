<?php
include_once('./../connect_DB.php');
include_once('./../layout/start-admin.php');
include_once('./../functions.php');
$result = selectDonHang();
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Quản Lí Đơn Hàng
        </h1>
    </section>
    <?php
    if(empty($result)){
        echo "<h4 class='content-header' style='color: red'>Không có đơn hàng nào !</h4>";
    } else {
        for($i = 0; $i < count($result); $i++){
    ?>
    <section class="content">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>Tên Sản Phẩm</td>
                                <td>Ảnh Sản Phẩm</td>
                                <td>Số Lượng</td>
                                <td>Giá</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            $convert = 0;
                            $tong = 0;
                            for($j = 0; $j < count($result[$i]); $j++) {
                            ?>
                                <tr>
                                    <td>
                                        <br>
                                        <?php echo $result[$i][$j]['ten_san_pham']?>
                                    </td>
                                    <td>
                                        <img width="50px" height="30px" src="<?php echo $result[$i][$j]['anh']?>" alt="">
                                    </td>
                                    <td>
                                        <br>
                                        <?php echo $result[$i][$j]['so_luong']?>
                                    </td>
                                    <td>
                                        <br>
                                        <?php echo number_format($result[$i][$j]['gia']*$result[$i][$j]['so_luong'])?>
                                    </td>
                                </tr>
                                
                            <?php 
                            $convert += $result[$i][$j]['gia'];
                            $tong = number_format($convert);
                            $id = $result[$i][$j]['id_khach_hang'];
                            $ma = $result[$i][$j]['ma'];
                            }
                            echo "
                                <tr>
                                    <td colspan='3'><h4 style='text-align:right'>Tổng: </h4></td>
                                    <td><h4 style='color:red'>$tong VNĐ</h4></td>
                                </tr>";
                            ?>
                        <tbody>
                            <a href="<?=$website?>/admin/users/find-user.php?id=<?php echo $id?>" class="btn btn-primary">Xem Khách Hàng</a>
                            <a href="<?=$website?>/admin/cart/delete.php?ma=<?php echo $ma?>" onclick="return confirm_delete()" class="btn btn-danger" style="float:right">Xóa Đơn Hàng</a>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <?php
        }
    }
    ?>
    
</div>

<?php
include_once('./../layout/end-admin.php');
?>