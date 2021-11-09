<?php
include_once('./start-user.php');
$slide = getSelect('loai');
if(isset($_GET['id'])){
    $result = getSelectByCatetory($_GET['id']);
} else {
    $result = getSelect('san_pham');
}
$top10 = getSelectTop10();
?>


<section class="home" id="home">
    <div class="slide-container active">
        <div class="slide">
            <div class="content">
                <h3>Giày nike </h3>
            </div>
            <div class="image">
                <img src="images/home-shoe-2.png" class="shoe" alt="">
                <img src="images/home-text-1.png" class="text" alt="">
            </div>
        </div>
    </div>
    <?php
    foreach($slide as $values){
    ?>
    <div class="slide-container">
        <div class="slide">
            <div class="content">
                <h3><?=$values['ten_loai']?></h3>
            </div>
            <div class="image">
                <img src="<?=$url_images . $values['hinh']?>" class="shoe" alt="">
                <img src="images/home-text-1.png" class="text" alt="">
            </div>
        </div>
    </div>
    <?php
    }
    ?>

    <div id="prev" class="fas fa-chevron-left" onclick="prev()"></div>
    <div id="next" class="fas fa-chevron-right" onclick="next()"></div>

</section>

<section class="service">

    <div class="box-container">

        <div class="box">
            <i class="fas fa-shipping-fast"></i>
            <h3>Giao hàng nhanh</h3>
            <p>Bảng Giá Liên Vùng và Liên Vùng Tỉnh, Cước Phí Ưu Đãi</p>
        </div>

        <div class="box">
            <i class="fas fa-undo"></i>
            <h3>Hỗ trợ đổi trả</h3>
            <p>Hỗ Trợ Đổi Trả Miễn Phí Trong Vòng 10 Ngày Kể Từ Khi Nhận Hàng</p>
        </div>

        <div class="box">
            <i class="fas fa-headset"></i>
            <h3>tư vấn 24/7</h3>
            <p>Hệ Thống Tư Vấn, Hỗ Trợ Khách Hàng Miễn Phí 24/7</p>
        </div>

    </div>

</section>

<section class="products" id="products">

    <h1 class="heading"> Sản Phẩm <span>Mới Nhất</span> </h1>
    <?php
    if(isset($_SESSION['empty'])){
        echo $_SESSION['empty'];
        unset($_SESSION['empty']);
    ?>
    <div class="box-container">
        <?php 
        if (!isset($_SESSION['search'])){
        } else {
            foreach($_SESSION['search'] as $result1){
                if(intval($result1['so_luong']) > 0){

        ?>
        <div class="box">
            <a href="<?=$website?>/User/detail_product.php?id=<?php echo $result1['ma_san_pham']?>"><img src="<?php echo $url_images . $result1['hinh'] ?>" class="shoe" alt=""></a>
            <div class="content">
            <a href="<?=$website?>/User/detail_product.php?id=<?php echo $result1['ma_san_pham']?>"><h3><?php echo $result1['ten_san_pham'] ?></h3></a>
                <div class="price"><?php echo number_format($result1['gia']) ?> VNĐ</div>
                <a href="<?=$website?>/layout/cart.php?id=<?php echo $result1['ma_san_pham']?>" class="btn" style="border: 2px solid #000;padding: 10px">Thêm vào giỏ Hàng</a>
            </div>
        </div>
        <?php
                    } else {

                    }
                }
            }
        }
        ?>  
    </div>

    <div class="box-container">
        <?php
        if (empty($result) || isset($_SESSION['search'])){
        } else {
            for($i = 0; $i < count($result); $i++){
                if(intval($result[$i]['so_luong']) > 0){

        ?>
        <div class="box">
            <a href="<?=$website?>/User/detail_product.php?id=<?php echo $result[$i]['ma_san_pham']?>"><img src="<?php echo $url_images . $result[$i]['hinh'] ?>" class="shoe" alt=""></a>
            <div class="content">
            <a href="<?=$website?>/User/detail_product.php?id=<?php echo $result[$i]['ma_san_pham']?>"><h3><?php echo $result[$i]['ten_san_pham'] ?></h3></a>
                <div class="price"><?php echo number_format($result[$i]['gia']) ?> VNĐ</div>
                <a href="<?=$website?>/layout/cart.php?id=<?php echo $result[$i]['ma_san_pham']?>" class="btn" style="border: 2px solid #000;padding: 10px">Thêm vào giỏ Hàng</a>
            </div>
        </div>
        <?php
                } else {

                }
            }
        }
        unset($_SESSION['search']);
        ?>  
    </div>

</section>



<section class="products" id="top">

    <h1 class="heading"> Sản Phẩm <span>Có lượt xem nhiều nhất</span> </h1>

    <div class="box-container">
        <?php if (empty($top10)){
        } else {
            for($i = 0; $i < count($top10); $i++){
                if(intval($top10[$i]['so_luong']) > 0 && intval($top10[$i]['luot_xem']) > 3){

        ?>
        <div class="box">
            <a href="<?=$website?>/User/detail_product.php?id=<?php echo $top10[$i]['ma_san_pham']?>"><img src="<?php echo $url_images . $top10[$i]['hinh'] ?>" class="shoe" alt=""></a>
            <div class="content">
            <a href="<?=$website?>/User/detail_product.php?id=<?php echo $top10[$i]['ma_san_pham']?>"><h3><?php echo $top10[$i]['ten_san_pham'] ?></h3></a>
                <div class="price"><?php echo number_format($top10[$i]['gia']) ?> VNĐ</div>
                <a href="<?=$website?>/layout/cart.php?id=<?php echo $top10[$i]['ma_san_pham']?>" class="btn" style="border: 2px solid #000;padding: 10px">Thêm vào giỏ Hàng</a>
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



<section class="featured" id="featured">

        <h1 class="heading"> <span> Sản Phẩm </span> Nổi Bật </h1>
        <?php
        if (empty($result)){
        } else {
            for($i = 0; $i < count($result); $i++){
                if(intval($result[$i]['so_luong']) > 0 && intval($result[$i]['dac_biet'] == 2)){
        ?>
        <div class="row">
            <div class="image-container">
                <div class="big-image">
                    <img src="<?php echo $url_images . $result[$i]['hinh'] ?>" class="big-image-1" alt="">
                </div>
            </div>
            <div class="content">
                <h3><?=$result[$i]['ten_san_pham'] ?></h3>
                <div class="price"><?=number_format($result[$i]['gia'])?> VNĐ</div>
                <a href="<?=$website?>/layout/cart.php?id=<?php echo $result[$i]['ma_san_pham']?>" class="btn" style="border: 2px solid #000;padding: 10px">Thêm vào giỏ Hàng</a>
            </div>
        </div>
        <?php
                }
            }
        }
        ?>
    </section>


<?php
include_once('./end-user.php');
?>