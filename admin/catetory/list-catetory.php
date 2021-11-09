<?php
include_once("./../layout/start-admin.php");
include_once("./../functions.php");
$result = getSelect('loai');
?>
<div class="content-wrapper">
    
    <section class="content-header">
        <h1>
            Thông Tin Loại Sản Phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý Loại Sản Phẩm</a></li>
            <li class="active">Danh Sách Loại Sản Phẩm</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="add-catetory.php" class="btn btn-success">+Thêm mới Loại Sản Phẩm</a>

                    <div class="box-tools">
                        <form action="<?=$website?>/admin/catetory/find-catetory.php" class="input-group input-group-sm" style="width: 150px;" method="POST">
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
                                <td>Ngày Thêm</td>
                                <td colspan="2">Thao Tác</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php for($i = 0; $i < count($result); $i++) {?>
                                <tr>
                                    <td>
                                        <br>
                                        <?php echo $result[$i]['ma_loai']?>
                                    </td>
                                    <td>
                                        <br>
                                        <?php echo $result[$i]['ten_loai']?>
                                    </td>
                                    <td>
                                        <img width="60px" height="45px" src="<?php echo $url_images . $result[$i]['hinh'] ?>" alt="">
                                    </td>
                                    <td>
                                        <br>
                                        <?php echo $result[$i]['ngay_them']?>
                                    </td>
                                    <td>
                                        <br>
                                        <a href="<?=$website?>/admin/catetory/update-catetory.php?id=<?php echo $result[$i]['ma_loai']?>" class="btn btn-success">Update</a>
                                        <a href="<?=$website?>/admin/catetory/delete-catetory.php?id=<?php  echo $result[$i]['ma_loai']?>" onclick="return confirm('Bạn có chắc muốn xóa không ? ')" class="btn btn-danger">Delete</a>
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
