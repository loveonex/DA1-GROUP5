<?php
include_once('./../layout/start-admin.php');
?>
<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lí Loại Sản Phẩm</a></li>
            <li class="active">Thêm mới Loại Sản Phẩm</li>
        </ol>
    </section>

    <section class="content">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Thêm mới Loại Sản Phẩm</h3>
                    <span style="color: red">
                        <?php
                            if(isset($_SESSION['error'])){
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            }
                        ?>
                    </span>
                </div>
                <form role="form" action="add.php" enctype="multipart/form-data" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên*</label>
                            <input type="text" class="form-control" name="ten_loai" placeholder="Nhập vào tên">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">File Ảnh*</label>
                            <input type="file" class="form-control" name="hinh" id="" accept="image/png, image/jpg">
                        </div>
                        <div class="box-footer-group">
                            <div class="box-footer">
                                <input type="submit" name="btn-add" class="btn btn-primary" value="Thêm mới">
                            </div>
                            <div class="box-footer">
                            <a href="<?=$website ?>/admin/home/home-admin.php" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i> Trang chủ</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php
include_once('./../layout/end-admin.php');
?>