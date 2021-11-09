<?php
include_once("./../layout/start-admin.php");
include_once("./../functions.php");
$result = getSelect('san_pham');
?>
<div class="content-wrapper">
    
    <section class="content-header">
        <h1>
            Thông Tin Sản Phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý Sản Phẩm</a></li>
            <li class="active">Danh Sách Sản Phẩm</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="add-product.php" class="btn btn-success">+Thêm mới Sản Phẩm</a>

                    <div class="box-tools">
                        <form action="<?=$website?>/admin/goods/find-product.php" class="input-group input-group-sm" style="width: 150px;" method="POST">
                            <input type="text" name="search-id" class="form-control pull-right"placeholder="Search ID">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Tên</td>
                                <td>Ảnh</td>
                                <td>Số Lượng</td>
                                <td>Giá</td>
                                <td>Lượt Xem</td>
                                <td>Loại</td>
                                <td>Đặc Biệt</td>
                                <td>Ngày Thêm</td>
                                <td>Ngày Sửa</td>
                                <td colspan="2">Thao Tác</td>   
                            </tr>
                        </thead>

                        <tbody>
                            <?php for($i = 0; $i < count($result); $i++) {?>
                                <tr>
                                    <td>
                                        <br>
                                        <?php echo $result[$i]['ma_san_pham']?>
                                    </td>
                                    <td>
                                        <br>
                                        <?php echo $result[$i]['ten_san_pham']?>
                                    </td>
                                    <td>
                                        <img width="60px" height="45px" src="<?php echo $url_images . $result[$i]['hinh'] ?>" alt="">
                                    </td>
                                    <td>
                                        <br>
                                        <?php echo $result[$i]['so_luong']?>
                                    </td>
                                    <td>
                                        <br>
                                        <?php echo number_format($result[$i]['gia'])?> VNĐ
                                    </td>
                                    <td>
                                        <br>
                                        <?php echo $result[$i]['luot_xem'] ?>
                                    </td>
                                    <td>
                                        <br>
                                        <?php
                                        $result1 = getSelect_one('loai', 'ma_loai', $result[$i]['ma_loai']); 
                                        echo $result1['ten_loai'];
                                        ?>
                                    </td>
                                    <td>
                                        <br>
                                        <?php echo $result[$i]['dac_biet'] == 0 ? "Bình Thường" : "Đặc Biệt"?>
                                    </td>
                                    <td>
                                        <br>
                                        <?php echo $result[$i]['ngay_them'] ?>
                                    </td>
                                    <td>
                                        <br>
                                        <?php echo $result[$i]['ngay_sua'] ?>
                                    </td>
                                    <td>
                                        <br>
                                        <a href="<?=$website?>/admin/goods/update-product.php?id=<?php echo $result[$i]['ma_san_pham']?>" class="btn btn-success">Update</a>
                                        <a href="<?=$website?>/admin/goods/delete-product.php?id=<?php  echo $result[$i]['ma_san_pham']?>" onclick="return confirm_delete()" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
include_once("./../layout/end-admin.php");
?>
