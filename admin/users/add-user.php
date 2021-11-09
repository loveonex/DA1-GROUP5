<?php
include_once('./../connect_DB.php');
include_once("./../layout/start-admin.php");
?>
<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý User</a></li>
            <li class="active">Thêm Mới User</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Thêm mới User</h3>
                    <span style="color: red;">
                    <?php 
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
                    </span>
                </div>
                <form role="form" action="add.php" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                           <label>Tài Khoản*</label>
                            <input type="text" class="form-control" name ="tai_khoan" placeholder="Nhập vào tài khoản">
                        </div>
                        <div class="form-group">
                            <label>Mật Khẩu*</label>
                            <input type="password" class="form-control" name= "mat_khau"placeholder="Nhập mật khẩu">
                        </div>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box box-primary">Thông Tin cá nhân</h3>
                        <div class="form-group">
                            <label>Họ Tên*</label>
                            <input type="text" class="form-control" name= "ten"placeholder="Nhập họ tên">
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ*</label>
                            <input type="text" class="form-control" name= "dia_chi"placeholder="Nhập địa chỉ">
                        </div>
                        <div class="form-group">
                            <label>SĐT*</label>
                            <input type="text" class="form-control" name= "sdt"placeholder="Nhập số điện thoại">
                        </div>
                        <div class="form-group">
                            <label>Email*</label>
                            <input type="text" class="form-control" name= "email"placeholder="Nhập số email">
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