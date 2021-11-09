<?php
include_once('./start-user.php');
$id = $_GET['id'];
$luot_xem = 1;
luot_xem($luot_xem, $id);
$result = getSelect_one('san_pham', 'ma_san_pham', $id);
$result1 = getSelectByCatetory($result['ma_loai']);
$comment = getSelect_comment('ma_san_pham',$result['ma_san_pham']);
?>

<div style="margin-top: 150px;"></div>
<h1 style="text-align: center; color: #ff9f1a; margin: 50px 0px;">Chi Tiết Sản Phẩm</h1>
<div class="container mt-5 rows" style="display:grid; grid-template-columns: 3fr 2fr">
    <div><img src="<?=$url_images . $result['hinh']?>" alt="" width="70%"></div>
    <div>
        <h2 style="font-size:30px"><?=$result['ten_san_pham']?></h2>
        <h1 style="border-bottom:1px solid #000"></h1>
        <p style="font-size:17px">Mô tả:</p>
        <p style="font-size:17px"><?=$result['mo_ta']?></p>
        <h1 style="border-bottom:1px solid #000"></h1>
        <br>
        <h3 style="font-site:20px"><?php echo number_format($result['gia']) ?> VNĐ</h3>
        <a href="<?=$website?>/layout/cart.php?id=<?php echo $result['ma_san_pham']?>" class="btn" style="border: 2px solid #000;padding: 10px">Thêm vào giỏ Hàng</a>
    </div>
    
</div>
<div class="container" style="margin-top: 50px;">
<h1 style="border-bottom:1px solid #000"></h1>
</div>
<div class="container col-6">
    <h1 style="text-align: center; color: #ff9f1a; margin: 50px 0px;" id="cmt">Đánh Giá</h1>
    <div style="margin-bottom: 50px;">
        <?php
        if(empty($comment)){
           echo "<h2 style='text-align: center'>Chưa có đánh giá !</h2>";
        } else {
            foreach($comment as $value){
                $user = getSelect_one('khach_hang', 'ma_khach_hang', $value['ma_khach_hang']);
        ?>
        <h4><?=$user['ten']?></h4>
        <div class="stars">
            <?php
            for($i = 0; $i < intval($value['danh_gia']); $i++){
            ?>
            <i class="fas fa-star"></i>
            <?php
            }
            for($j = 0; $j < (5 - intval($value['danh_gia'])); $j++){
            ?>
            <i class="far fa-star"></i>
            <?php
            }
            ?>
            <br>
            <br>
            <p style="font-size:17px"><?=$value['noi_dung']?></p>
            <p>
                <?php
                if(strtotime(date('Y-m-d H:i:s')) - strtotime($value['ngay_them']) < 60){
                    echo (strtotime(date('Y-m-d H:i:s')) - strtotime($value['ngay_them'])) . " Giây trước";
                } else if((strtotime(date('Y-m-d H:i:s')) - strtotime($value['ngay_them'])) < 3600){
                    echo floor((strtotime(date('Y-m-d H:i:s')) - strtotime($value['ngay_them']))/60) . " Phút trước";
                } else if((strtotime(date('Y-m-d H:i:s')) - strtotime($value['ngay_them'])) < 86400){
                    echo floor((strtotime(date('Y-m-d H:i:s')) - strtotime($value['ngay_them']))/3600) . " Giờ trước";
                } else if((strtotime(date('Y-m-d H:i:s')) - strtotime($value['ngay_them'])) < 2592000){
                    echo floor((strtotime(date('Y-m-d H:i:s')) - strtotime($value['ngay_them']))/86400) . " Ngày trước";
                } else {
                    echo floor((strtotime(date('Y-m-d H:i:s')) - strtotime($value['ngay_them']))/2592000) . " Tháng trước";
                }
                
                ?>
            </p>
        </div>
        <h1 style="border-bottom:1px solid #000"></h1>
        <?php
            }
        }
        ?>
    </div>
    <h1 style="border-bottom:1px solid #000"></h1>
    <h1 style="border-bottom:1px solid #000"></h1>
    <h1 style="border-bottom:1px solid #000"></h1>
    <div style="margin: 20px"></div>
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
    <div id="comment">
        <?php
        if(isset($_SESSION['error_cmt'])){
            echo $_SESSION['error_cmt'];
            unset($_SESSION['error_cmt']);
        }
        ?>
        <form action="comment.php" method="POST">
            <h2>Đánh giá</h2>
            <input type="hidden" name="ma_san_pham" value="<?=$result['ma_san_pham']?>">
            <input type="hidden" name="ma_khach_hang" value="<?=isset($_SESSION['user']) ? $_SESSION['user']['ma_khach_hang'] : ""?>">
            <div id="rating">
                <input type="radio" id="star5" value="5" name="danh_gia"/>
                <label class = "full" for="star5" title="Tuyệt vời quá"></label>

                <input type="radio" id="star4" value="4" name="danh_gia"/>
                <label class = "full" for="star4" title="Rất tốt"></label>

                <input type="radio" id="star3" value="3" name="danh_gia"/>
                <label class = "full" for="star3" title="Bình thường"></label>

                <input type="radio" id="star2" value="2" name="danh_gia"/>
                <label class = "full" for="star2" title="Tạm được"></label>

                <input type="radio" id="star1" value="1" name="danh_gia"/>
                <label class = "full" for="star1" title="Không thích"></label>
            </div>
            <br><br>
            <br><br>
            <h2>Nội dung*</h2><br>
            <textarea rows="5" cols="115" name="noi_dung" placeholder="Tối đa 2000 từ" style="font-size: 15px; border: 1px solid #000; border-radius: 7px;"></textarea>
            <?php
            if(!isset($_SESSION['user'])){
            ?>
            <a href="<?=$website?>/layout/login.php" class="btn" style="border: 2px solid #000;padding: 5px; font-size:15px">Đăng nhập ngay để đánh giá</a>
            <?php
            } else {
            ?>
            <button class="btn" style="border: 2px solid #000;padding: 10px">Gửi Đánh Giá</button>
            <?php
            }
            ?>
        </form>
        <div style="margin: 50px"></div>
    </div>
</div>


<section class="products" id="products">

    <h1 class="heading"> Sản Phẩm <span>Liên Quan</span> </h1>

    <div class="box-container">
        <?php if (empty($result1)){
        } else {
            for($i = 0; $i < count($result1); $i++){
                if(intval($result1[$i]['so_luong']) > 0){

        ?>
        <div class="box">
            <a href="<?=$website?>/User/detail_product.php?id=<?php echo $result1[$i]['ma_san_pham']?>"><img src="<?php echo $url_images . $result1[$i]['hinh'] ?>" class="shoe" alt=""></a>
            <div class="content">
            <a href="<?=$website?>/User/detail_product.php?id=<?php echo $result1[$i]['ma_san_pham']?>"><h3><?php echo $result1[$i]['ten_san_pham'] ?></h3></a>
                <div class="price"><?php echo number_format($result1[$i]['gia']) ?> VNĐ</div>
                <a href="<?=$website?>/layout/cart.php?id=<?php echo $result1[$i]['ma_san_pham']?>" class="btn" style="border: 2px solid #000;padding: 10px">Thêm vào giỏ Hàng</a>
            </div>
        </div>
        <?php
                } else {

                }
            }
        }
        ?>  
    </div>

</section>


<?php
include_once('./end-user.php');
?>