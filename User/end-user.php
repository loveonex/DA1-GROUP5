<section class="newsletter" id="email">

<div class="content">
    <h3>Đăng Kí Để Được Nhận Tin Tức Mới Nhất Về Chúng Tôi</h3>
    <form action="">
        <input type="email" required placeholder="enter your email" class="box">
        <input type="submit" value="send" class="btn btn-secondary">
    </form>
</div>

</section>

<section class="footer" id="info">

    <div class="box-container">

        <div class="box">
            <h3>Hệ Thống Cửa Hàng</h3>
            <a href="#">Việt Nam</a>
            <a href="#">Mỹ</a>
            <a href="#">Nhật Bản</a>
            <a href="#">Pháp</a>
        </div>

        <div class="box">
            <h3>Xem Nhanh</h3>
            <a href="<?=$website?>/User/home-user.php#home">Trang Chủ</a>
            <a href="<?=$website?>/User/home-user.php#products">Sản Phẩm Mới Nhất</a>
            <a href="<?=$website?>/User/home-user.php#featured">Sản Phẩm Nổi Bật</a>
            <a href="<?=$website?>/User/home-user.php#info">Thông Tin Website</a>
        </div>

        <div class="box">
            <h3>Tác Vụ</h3>
            <a href="#">Tài Khoản</a>
            <a href="#">Yêu Thích</a>
            <a href="#">Đơn Hàng</a>
            <a href="#email">Đăng Kí Nhận Tin</a>
        </div>

        <div class="box">
            <h3>Theo Dõi Chúng Tôi</h3>
            <a href="#"><i class="bi bi-facebook"></i> facebook</a>
            <a href="#"><i class="twitter"></i> twitter</a>
            <a href="#"><i class="instagram"></i> instagram</a>
            <a href="#"><i class="linkedin"></i> linkedin</a>
        </div>
    </div>
</section>
<script>
    function confirm_delete() {
        if (confirm("Bạn chắc muốn xóa không ?") === true) {
            return true;
        } else {
            return false;
        }
    }
    function confirm_thanhtoan(){
        if (confirm("Bạn chắc muốn thanh toán không ?") === true) {
            return true;
        } else {
            return false;
        }
    }
    function confirm_save() {
        if (confirm("Bạn chắc muốn lưu không ?") === true) {
            return true;
        } else {
            return false;
        }
    }
</script>
<script src="./../js/script.js"></script>

</body>

</html>