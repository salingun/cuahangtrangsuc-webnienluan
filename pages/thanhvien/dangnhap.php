<!--log in start here-->
<div class="login">
    <?php 
        $tvClass = new Thanhvien();
        if(isset($_POST['btnDangnhap'])){
            $username = $_POST['txtTendangnhap'];
            $password = md5($_POST['txtMatkhau']);
            $tvClass->dangnhap($username,$password);
        }
    ?>
	<div class="container">
		<div class="login-main">
			  <h1>Đăng nhập</h1>
		  <div class="col-md-6 login-left">
			<h2>Thông tin</h2>
                        <form method="POST" name="frmDangnhap" id="frmDangnhap">
                            <input type="text" name="txtTendangnhap" id="txtTendangnhap" placeholder="Tên đăng nhập" required="">
                            <input type="password" name="txtMatkhau" id="txtMatkhau" placeholder="Mật khẩu" required="">
                            <input type="submit" name="btnDangnhap" id="btnDangnhap" value="Đăng nhập">
			</form>
		  </div>
		  <div class="col-md-6 login-right">
		  	 <h3>Bạn chưa có tài khoản? Đăng ký ngay!</h3>
		  	 <p>Bạn chưa có tài khoản vẫn có thể xem sản phẩm, các thông tin và góp ý trên trang web nhưng có tài khoản sẽ giúp bạn dễ dàng quản lý, mua hàng và lưu trữ thông tin. Hãy đăng ký ngay tài khoản chỉ với 1 bước dễ dàng!</p>
		     <a href="?page=thanhvien&action=dangky" class="login-btn">Tạo tài khoản </a>
		  </div>
		  <div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--log in end here-->