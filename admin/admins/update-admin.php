<?php
include_once("./../layout/start-admin.php");
include_once('./../functions.php');
$id = intval($_GET['id']);
$result = getSelect_one('admin', 'id', $id);
?>
<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý Admin</a></li>
            <li class="active">Update Admin</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Cập Nhật Admin</h3>
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
                    <input type="hidden" name = "id" value = "<?php echo $result['id'] ?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Tài Khoản*</label>
                            <input type="text" class="form-control" id="username" name ="tai_khoan" value="<?php echo $result['tai_khoan'] ?>">
                            <input type="hidden" class="form-control" id="username" name ="tai_khoan_cu" value="<?php echo $result['tai_khoan'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Mật Khẩu*</label>
                            <input type="password" class="form-control" id="password" name= "mat_khau" value="<?php echo $result['mat_khau'] ?>">
                            <input type="hidden" class="form-control" id="password" name= "mat_khau_cu" value="<?php echo $result['mat_khau'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Mật Khẩu Cấp 2*</label>
                            <input type="password" class="form-control" id="password" name= "mat_khau2" value="<?php echo $result['mat_khau2']?>">
                            <input type="hidden" class="form-control" id="password" name= "mat_khau_cu2" value="<?php echo $result['mat_khau2'] ?>">
                        </div>
                    </div>
                    <div class="box-header with-border box box-primary">
                        <h3 class="box-title">Thông tin cá nhân</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Họ Tên*</label>
                            <input type="text" class="form-control" id="name" name ="ten" value="<?php echo $result['ten'] ?>">
                        </div>
                        <div class="form-group">
                            <label>SĐT*</label>
                            <input type="text" class="form-control" id="name" name ="sdt" value="<?php echo $result['sdt'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ*</label>
                            <input type="text" class="form-control" id="address" name ="dia_chi" value="<?php echo $result['dia_chi'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Avatar</label><br>
                            <input type="image" src="<?php echo empty($result['anh']) ? "unuser.png" : $url_images . $result['anh'] ?>" alt="" width="50"height="60">
                            <input type="file" class="form-control" name="anh" id="" accept="image/png, image/jpg">
                        </div>
                        <div class="form-group">
                            <label>Email*</label>
                            <input type="text" class="form-control" id="address" name ="email" value="<?php echo $result['email'] ?>">
                        </div>
                    </div>
                    
                    <div class="box-footer-group">
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                    <div class="box-footer">
                        <a href="<?=$website ?>/admin/home/home-admin.php" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i> Trang chủ</a>
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