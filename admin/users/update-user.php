<?php
include_once('./../connect_DB.php');
include_once("./../layout/start-admin.php");
include_once('./../functions.php');
$id = intval($_GET['id']);
$result = getSelect_one('khach_hang', 'ma_khach_hang', $id);
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
                    <h3>Update User</h3>
                    <span style="color: red;">
                    <?php 
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
                    </span>
                </div>
                <form role="form" action="update.php" method="POST">
                    <input type="hidden" name = "ma_khach_hang" value = "<?php echo $result['ma_khach_hang'] ?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Tài Khoản*</label>
                            <input type="text" class="form-control" id="username"  name ="tai_khoan" value="<?php echo $result['tai_khoan'] ?>">
                            <input type="hidden" class="form-control" id="username"  name ="tai_khoan_cu" value="<?php echo $result['tai_khoan'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Mật Khẩu*</label>
                            <input type="password" class="form-control" id="password"  name= "mat_khau" value="<?php echo $result['mat_khau'] ?>">
                            <input type="hidden" class="form-control" id="password"  name= "mat_khau_cu" value="<?php echo $result['mat_khau'] ?>">
                        </div>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box box-primary">Thông Tin cá nhân</h3>
                        <div class="form-group">
                            <label>Họ Tên*</label>
                            <input type="text" class="form-control" name= "ten" value="<?php echo $result['ten'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ*</label>
                            <input type="text" class="form-control" name= "dia_chi" value="<?php echo $result['dia_chi'] ?>">
                        </div>
                        <div class="form-group">
                            <label>SĐT*</label>
                            <input type="text" class="form-control" name= "sdt" value="<?php echo $result['sdt'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Email*</label>
                            <input type="text" class="form-control" name= "email" value="<?php echo $result['email'] ?>">
                        </div>
                    </div>
                    <div class="box-footer-group">
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                        <div class="box-footer">
                            <a href="<?php echo $website ?>/admin/users/list-user.php" class="btn btn-primary"></i> Quay Lại</a>
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