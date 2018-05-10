<!--log in start here-->
<div class="login">
    <?php 
        $tvClass = new Thanhvien();
        if(isset($_POST['btnDangnhap'])){
            $username = $_POST['txtTendangnhap'];
            $password = $_POST['txtMatkhau'];
            $tvClass->dangnhap($username,$password);
        }
    ?>
	<div class="container">
		<div class="login-main">
			  <h1>Login</h1>
		  <div class="col-md-6 login-left">
			<h2>Existing User</h2>
                        <form method="POST" name="frmDangnhap" id="frmDangnhap">
                            <input type="text" name="txtTendangnhap" id="txtTendangnhap" placeholder="Username" required="">
                            <input type="password" name="txtMatkhau" id="txtMatkhau" placeholder="Password" required="">
                            <input type="submit" name="btnDangnhap" id="btnDangnhap" value="Login">
			</form>
		  </div>
		  <div class="col-md-6 login-right">
		  	 <h3>New User? Create an Account</h3>
		  	 <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system. and expound the actual teachings of the great.</p>
		     <a href="signup.html" class="login-btn">Create an Account </a>
		  </div>
		  <div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--log in end here-->