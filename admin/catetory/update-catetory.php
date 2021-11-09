<?php
include_once('./../layout/start-admin.php');
include_once('./../functions.php');
$id = intval($_GET['id']);
$result = getSelect_one('loai', 'ma_loai', $id);
?>
<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lí Loại Sản Phẩm</a></li>
            <li class="active">Update Loại Sản Phẩm</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Update Loại Sản Phẩm</h3>
                    <span style="color: red">
                        <?php
                            if(isset($_SESSION['error'])){
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            }
                        ?>
                    </span>
                </div>
                <form role="form" action="update.php" enctype="multipart/form-data" method="POST">
                    <input type="hidden" name = "ma_loai" value = "<?php echo $result['ma_loai'] ?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên*</label>
                            <input type="text" class="form-control" name="ten_loai" value="<?php echo $result['ten_loai'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">File Ảnh*</label><br>
                            <input type="image" src="<?php echo $url_images . $result['hinh'] ?>" alt="" width="50"height="60">
                            <input type="file" class="form-control" name="hinh" id="" accept="image/png, image/jpg">
                        </div>
                        <div class="box-footer-group">
                            <div class="box-footer">
                                <input type="submit" name="btn-add" class="btn btn-primary" value="Update">
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