<?php
include_once("./../layout/start-admin.php");
?>
<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý Admin</a></li>
            <li class="active">Thêm Mới Admin</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Thêm mới Admin</h3>
                    <br>
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
                            <label>Tài Khoản</label>
                            <input type="text" class="form-control" id="username" name ="tai_khoan" placeholder="Nhập vào Tài Khoản">
                        </div>
                        <div class="form-group">
                            <label>Mật Khẩu</label>
                            <input type="password" class="form-control" id="password" name= "mat_khau"placeholder="Nhập mật khẩu">
                        </div>
                        <div class="form-group">
                            <label>Mật Khẩu Cấp 2</label>
                            <input type="password" class="form-control" id="password" name= "mat_khau2"placeholder="Nhập mật khẩu cấp 2">
                        </div>
                    </div>
                    <div class="box-header with-border box box-primary">
                        <h3 class="box-title">Thông tin cá nhân</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Họ Tên</label>
                            <input type="text" class="form-control" id="name" name ="ten" placeholder="Nhập vào tên">
                        </div>
                        <div class="form-group">
                            <label>SĐT</label>
                            <input type="text" class="form-control" id="name" name ="sdt" placeholder="Nhập vào SĐT">
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ</label>
                            <input type="text" class="form-control" id="address" name ="dia_chi" placeholder="Nhập vào Địa Chỉ">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" id="address" name ="email" placeholder="Nhập vào Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Avartar</label>
                            <input type="file" class="form-control" name="anh" id="" accept="image/png, image/jpg">
                        </div>
                    </div>
                    
                    <div class="box-footer-group">
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </div>
                        <div class="box-footer">
                            <a href="<?php echo $website ?>/admin/home/home-admin.php" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i> Trang chủ</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php
  include_once("./../layout/end-admin.php");
?>