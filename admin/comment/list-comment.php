<?php
include_once("../layout/start-admin.php");
include_once("./../functions.php");
$result = getSelect('binh_luan');

?>
<?php
if(isset($_SESSION['error'])){
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
?>
<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Thông Tin Bình Luận
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý Bình Luận</a></li>
            <li class="active">Danh Sách Bình Luận</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <form action="find-comment.php" method="POST" >
                        <style>
                            @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
                            /*reset css*/
                            div,label{margin:0;padding:0;}
                            /****** Style Star Rating Widget *****/
                            #rating{border:none;float:left;}
                            #rating>input{display:none;}/*ẩn input radio - vì chúng ta đã có label là GUI*/
                            #rating>label:before{margin:5px;font-size:1.25em;font-family:FontAwesome;display:inline-block;content:"\f005";}/*1 ngôi sao*/
                            #rating>label{float:right;}/*float:right để lật ngược các ngôi sao lại đúng theo thứ tự trong thực tế*/
                            /*thêm màu cho sao đã chọn và các ngôi sao phía trước*/
                            #rating>input:checked~label,
                            #rating:not(:checked)>label:hover, 
                            #rating:not(:checked)>label:hover~label{color:#ff9f1a;}
                            /* Hover vào các sao phía trước ngôi sao đã chọn*/
                            #rating>input:checked+label:hover,
                            #rating>input:checked~label:hover,
                            #rating>label:hover~input:checked~label,
                            #rating>input:checked~label:hover~label{color:#FFD700;} 
                        </style>
                        <div id="rating">
                            <input type="radio" id="star5" value="5" name="danh_gia"/>
                            <label class = "full" for="star5" title="5 Sao"></label>

                            <input type="radio" id="star4" value="4" name="danh_gia"/>
                            <label class = "full" for="star4" title="4 Sao"></label>

                            <input type="radio" id="star3" value="3" name="danh_gia"/>
                            <label class = "full" for="star3" title="3 Sao"></label>

                            <input type="radio" id="star2" value="2" name="danh_gia"/>
                            <label class = "full" for="star2" title="2 Sao"></label>

                            <input type="radio" id="star1" value="1" name="danh_gia"/>
                            <label class = "full" for="star1" title="1 Sao"></label>
                        </div>
                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                    </form>
                    <div class="box-tools">
                        <form action="find-comment.php" class="input-group input-group-sm" style="width: 150px;" method="POST">
                            <input type="text" name="search" class="form-control pull-right" placeholder="Search nội dung">
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
                                <td>Đánh Giá</td>
                                <td>Nội Dung</td>
                                <td>Mã Sản Phẩm</td>
                                <td>Mã Khách Hàng</td>
                                <td>Ngày Đánh Giá</td>
                                <td>Thao Tác</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php for ($i = 0; $i < count($result); $i++) { ?>
                                <tr>
                                    <td>
                                        <?php echo $result[$i]['ma_binh_luan'] ?>
                                    </td>
                                    <td>
                                        <?php
                                        for($k = 0; $k < intval($result[$i]['danh_gia']); $k++){
                                        ?>
                                        <i class="fas fa-star"></i>
                                        <?php
                                        }
                                        for($j = 0; $j < (5 - intval($result[$i]['danh_gia'])); $j++){
                                        ?>
                                        <i class="far fa-star"></i>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $result[$i]['noi_dung'] ?>
                                    </td>
                                    <td>
                                        <?=$result[$i]['ma_san_pham']?>
                                    </td>
                                    <td>
                                        <?=$result[$i]['ma_khach_hang']?>
                                    </td>
                                    <td>
                                        <?php echo $result[$i]['ngay_them'] ?>
                                    </td>
                                    <td>
                                        <a href="<?=$website?>/admin/comment/delete-comment.php?id=<?php echo $result[$i]['ma_binh_luan'] ?>" onclick="return confirm('Bạn có chắc muốn xóa không ? ')" class="btn btn-danger">Delete</a>
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