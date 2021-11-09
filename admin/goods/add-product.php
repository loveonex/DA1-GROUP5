<?php
include_once('./../layout/start-admin.php');
include_once('./../functions.php');
$result = getSelect('loai');
?>
<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lí Sản Phẩm</a></li>
            <li class="active">Thêm mới Sản Phẩm</li>
        </ol>
    </section>

    <section class="content">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Thêm mới Sản Phẩm</h3>
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
                            <input type="text" class="form-control" name="ten_san_pham" placeholder="Nhập vào tên">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số Lượng*</label>
                            <input type="number" class="form-control" name="so_luong" placeholder="Nhập vào số lượng">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá Bán*</label>
                            <input type="number" class="form-control" name="gia" placeholder="Nhập vào giá bán">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">File Ảnh*</label>
                            <input type="file" class="form-control" name="hinh" id="" accept="image/png, image/jpg">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Loại*</label><br>
                            <select class="custom-select custom-select-lg mb-3" name="ma_loai">
                                <option value="" selected>Loại Sản Phẩm</option>
                                <?php
                                    foreach($result as $value){
                                ?>
                                <option value="<?=$value['ma_loai']?>"><?=$value['ten_loai']?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Đặc Biệt*</label><br>
                            <select class="custom-select custom-select-lg mb-3" name="dac_biet">
                                <option value="1" selected>Bình Thường</option>
                                <option value="2">Đặc Biệt</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô Tả*</label><br>
                            <textarea rows="10" cols="150" placeholder="Mô tả sản phẩm" name="mo_ta"></textarea>
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