<?php
include_once("./../layout/start-admin.php");
include_once("./../functions.php");
$id = $_POST['search-id'];
$result = getSelect_one('san_pham', 'ma_san_pham', $id);
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
                    <a href="add-admin.php" class="btn btn-success">+Thêm mới Sản Phẩm</a>

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
                                <td>Đặc Biệt</td>
                                <td>Ngày Thêm</td>
                                <td colspan="2">Thao Tác</td>    
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(empty($result)){
                            } else {
                            ?>
                            <tr>
                                <td>
                                    <br>
                                    <?php echo $result['ma_san_pham']?>
                                </td>
                                <td>
                                    <br>
                                    <?php echo $result['ten_san_pham']?>
                                </td>
                                <td>
                                    <img width="60px" height="45px" src="<?php echo $url_images . $result['hinh'] ?>" alt="">
                                </td>
                                <td>
                                    <br>
                                    <?php echo $result['so_luong']?>
                                </td>
                                <td>
                                    <br>
                                    <?php echo number_format($result['gia'])?> VNĐ
                                </td>
                                <td>
                                    <br>
                                    <?php echo $result['luot_xem'] ?>
                                </td>
                                <td>
                                    <br>
                                    <?php echo intval($result['dac_biet']) == 1 ? "Bình Thường" : "Đặc Biệt"?>
                                </td>
                                <td>
                                    <br>
                                    <?php echo $result['ngay_them'] ?>
                                </td>
                                <td>
                                    <br>
                                    <a href="<?=$website?>/admin/goods/update-product.php?id=<?php echo $result['ma_san_pham']?>" class="btn btn-success">Update</a>
                                    <a href="<?=$website?>/admin/goods/delete-product.php?id=<?php  echo $result['ma_san_pham']?>" onclick="return confirm_delete()" class="btn btn-danger">Delete</a>
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
