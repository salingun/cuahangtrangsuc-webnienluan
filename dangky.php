
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.0.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shoplist Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Hind:400,500,300,600,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
<!-- //end-smoth-scrolling -->
<script src="js/simpleCart.min.js"> </script>
<script src="js/bootstrap.min.js"></script>
</head>
<script src="https://www.google.com/recaptcha/api.js?hl=vi"></script>
<script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'white'
 };
 </script>
 
 <?php
include_once("dbconnect.php");
$api_url='https://google.com/recaptcha/api/siteverify';
$site_key='6Lfjdz0UAAAAAGy0-DTaDm5_iKkU4AmUr7G_kDCA';
$secret_key='6Lfjdz0UAAAAAH0sJ2foiwl8RwimNUch8rwfOISf';


if(isset($_POST['btnDangKy'])){	
	$tendangnhap =$_POST['txtTenDangNhap'];
	$matkhau=$_POST['txtMatKhau1'];
	$username=$_POST['txtname'];
	$email = $_POST['txtEmail'];

	
	$loi = "";
	$site_key_post   =  $_POST['g-recaptcha-response'];
	//lay iP khach
	if(!empty($_SERVER['HTTP_CLIENT_IP']))
	{
		$remoteip=$_SERVER['HTTP_CLIENT_IP'];
		
	}
	else if(!empty($_SERVER['HTTP_FORWARDED_FOR']))
	{
		$remoteip=$_SERVER['HTTP_FORWARDED_FOR'];
	}
	else
	{
		$remoteip=$_SERVER['REMOTE_ADDR'];
			
	}
	//tao linknket noi
	$api_url=$api_url.'?secret='.$secret_key.'&response='.$site_key_post.'&remoteip='.$remoteip;
	//lay ket qua tra ve gg
	$response=file_get_contents($api_url);
	$response=json_decode($response);
	if(!($response->success))
	{
		$loi.='<li>Captcha khong dung</li>';
	}
	if($_POST['txtTenDangNhap']==""||$_POST['txtMatKhau1']==""
	||$_POST['txtMatKhau2']==""||$_POST['txtHoTen']==""
	||$_POST['txtEmail']==""||$_POST['txtDiaChi']==""||!isset($gioitinh)){
		$loi .="<li>Vui lòng nhập đầy đủ thông tin có dấu *</li>";
	}
	
	if($_POST['txtMatKhau1']!=$_POST['txtMatKhau2'])
	{
		$loi .="<li>Hai mật khẩu phải trùng nhau</li>";
	}
	
	if(strlen($_POST['txtMatKhau1'])<=5){
		$loi .="<li>Mật khẩu phải nhiều hơn 5 ký tự. </li>";
	}
	
	if(strpos($_POST['txtEmail'],"@") === false) {
    	$loi .="<li>Địa chỉ email không hợp lệ</li>";
	}
	
	if($_POST['slNamSinh']=="0"){
		$loi .="<li>Chưa chọn năm sinh</li>";
	}

	if($loi!= ""){
		echo "<ul class='cssLoi'>".$loi."</ul>";
	}
	else{
		
	$sq="Select * from khachhang where kh_tendangnhap='$tendangnhap' OR kh_email='$email'";
	$ketqua=mysqli_query($conn,$sq);
	if(mysqli_num_rows($ketqua)==0)
	{
		mysqli_query($conn,"INSERT INTO khachhang(kh_tendangnhap,kh_matkhau,kh_ten,kh_gioitinh,kh_diachi,kh_dienthoai,kh_email,kh_ngaysinh,kh_thangsinh,kh_namsinh,kh_cmnd,kh_makichhoat,kh_trangthai,kh_quantri) values ('$tendangnhap','".md5($matkhau)."','$hoten','$gioitinh','$diachi','$dienthoai','$email','$ngaysinh','$thangsinh','$namsinh','','',0,0)") or die(mysqli_error($conn));
echo "<ul class='cssLoi'>Đăng ký thành công</ul>";
	}
	else {
		echo "<ul class='cssLoi'>Tên đăng nhập hoặc email đã được sử dụng</ul>";
		}
		
	}
}

?>


<body>
<!--header strat here-->

<!--header end here-->
<!--sign in start here-->
<div class="signin">
	<div class="container">
		<div class="signin-main">
			<h1>Sign up</h1>
			<h2>Informations</h2>
			<form>
				<input type="text" placeholder="Username">
				<input type="text" class="no-margin" placeholder="E-mail">
				<input type="password" placeholder="Password" required=""/>
				<input type="password" class="no-margin" placeholder="Confirm Password" required=""/>
				<span class="checkbox1">
				 <label class="checkbox"><input type="checkbox" name="" checked=""><i> </i>i agree terms of use and privacy</label>
			   </span>
				<input type="submit" value="Submit">
			</form>
		</div>
	</div>
</div>
<!--sign in end here-->
<!--footer strat here-->
<?php
	include_once("footer.html");
?>
<!--footer end here-->
</body>
</html>