<script src="https://www.google.com/recaptcha/api.js?hl=vi"></script>
<script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'white'
 };
 </script>
 
 <?php
include_once("connection.php");
$api_url='https://google.com/recaptcha/api/siteverify';
$site_key='6Ldl0lEUAAAAANRr3ZqnJF2_7cp33RuFkWubYwtH';
$secret_key='6Ldl0lEUAAAAAMR0JfisVy7H2FysIFV1NtRvAAgw';


if(isset($_POST['btnDangKy'])){	
        $loi = "";
	$tendangnhap =$_POST['txtTenDangNhap'];
	$matkhau=$_POST['txtMatKhau1'];
	$hoten=$_POST['txtHoTen'];
	$email = $_POST['txtEmail'];
	$diachi = $_POST['txtDiaChi'];
	$dienthoai = $_POST['txtDienThoai'];
	$pattern = "^[0-9]{4}-(((0[13578]|(10|12))-(0[1-9]|[1-2][0-9]|3[0-1]))|(02-(0[1-9]|[1-2][0-9]))|((0[469]|11)-(0[1-9]|[1-2][0-9]|30)))$";
        
	if(isset($_POST['grpGioiTinh'])){
		$gioitinh = $_POST['grpGioiTinh'];
	}
	
	
	
	
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
		$loi.='<li>Captcha không đúng</li>';
	}
	if($_POST['txtTenDangNhap']==""||$_POST['txtMatKhau1']==""
	||$_POST['txtMatKhau2']==""||$_POST['txtHoTen']==""
	||$_POST['txtEmail']==""||$_POST['txtDiaChi']==""||!isset($gioitinh)){
		$loi .="<li>Vui lòng nhập đầy đủ thông tin</li>";
	}
	
	if($_POST['txtMatKhau1']!=$_POST['txtMatKhau2'])
	{
		$loi .="<li>Mật khẩu và nhập lại mật khẩu không khớp</li>";
	}
	
	if(strlen($_POST['txtMatKhau1'])<5){
		$loi .="<li>Mật khẩu phải 5 ký tự trở lên. </li>";
	}
	
	if(strpos($_POST['txtEmail'],"@") === false) {
    	$loi .="<li>Địa chỉ email không hợp lệ</li>";
	}
	
	if(empty($_POST['txtSinhnhat'])){
		$loi .="<li>Chưa chọn sinh nhật</li>";
	} else{
            $sinhnhat = $_POST['txtSinhnhat'];
        }

	if($loi!= ""){
		echo "<ul class='cssLoi' style='color: red;'>".$loi."</ul>";
	}
	else{
		
	$sq="SELECT * FROM thanhvien WHERE tv_tendangnhap='$tendangnhap' OR tv_email='$email'";
	$ketqua=mysqli_query($conn,$sq);
	if(mysqli_num_rows($ketqua)==0)
	{
		mysqli_query($conn,"INSERT INTO thanhvien(tv_tendangnhap,tv_matkhau,tv_ten,tv_gioitinh,tv_diachi,tv_dienthoai,tv_email,tv_sinhnhat,tv_trangthai,tv_quyen) values ('$tendangnhap','".md5($matkhau)."','$hoten','$gioitinh','$diachi','$dienthoai','$email','$sinhnhat','dangsudung','tv')") or die(mysqli_error($conn));
echo "<ul class='cssLoi' style='color: green;'>Đăng ký thành công</ul>";
	}
	else {
		echo "<ul class='cssLoi'>Tên đăng nhập hoặc email đã được sử dụng</ul>";
            }
		
	}
}

?>


<div class="singin">
    <div class="container">
        <div class="signin-main">
            <h1>Đăng ký</h1>
            <h2>Thông tin</h2>
            <form id="form1" name="form1" method="post" action="" role="form">
                <input type="text" name="txtTenDangNhap" id="txtTenDangNhap" placeholder="Tên đăng nhập" value="<?php if (isset($tendangnhap)) echo $tendangnhap; ?>"/>

                <input type="password" name="txtMatKhau1" id="txtMatKhau1" class="no-margin" placeholder="Mật khẩu"/>
                
                <input type="password" name="txtMatKhau2" id="txtMatKhau2"  placeholder="Xác nhận mật khẩu"/>

                <input type="text" name="txtHoTen" id="txtHoTen" value="<?php if (isset($hoten)) echo $hoten; ?>" class="no-margin" placeholder="Họ tên"/>

                <input type="text" name="txtEmail" id="txtEmail" value="<?php if (isset($email)) echo $email; ?>" placeholder="Email"/>

                <input type="text" name="txtDiaChi" id="txtDiaChi" value="<?php if (isset($diachi)) echo $diachi; ?>" class="no-margin" placeholder="Địa chỉ"/>

                <input type="text" name="txtDienThoai" id="txtDienThoai" value="<?php if (isset($dienthoai)) echo $dienthoai; ?>" placeholder="Điện thoại" />

                Sinh nhật <input type="date" name="txtSinhnhat" id="txtSinhnhat" value="<?php echo isset($sinhnhat)?$sinhnhat:'';?>"/>
                
                Giới tính <input type="radio" name="grpGioiTinh" value="0" id="grpGioiTinh" class="no-margin"
                   <?php if (isset($gioitinh) && $gioitinh == "0") {
                       echo "checked";
                   } ?> />
                Nam

                <input type="radio" name="grpGioiTinh" value="1" id="grpGioiTinh" 
                <?php if (isset($gioitinh) && $gioitinh == "1") {
                    echo "checked";
                } ?> />
                Nữ

                <div class="g-recaptcha"   data-sitekey="<?php echo $site_key ?>"></div>

                <input type="submit"  class="no-margin" name="btnDangKy" id="btnDangKy" value="Đăng ký"/>


            </form>
        </div>
    </div>
</div>



