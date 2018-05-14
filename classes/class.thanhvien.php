<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of class
 *
 * @author PCGAMINGCANTHO
 */
require 'myClass.php';
class Thanhvien {
//put your code here
    function dangnhap($username, $password){
        $check = $this->checkUserPass($username, $password);
        if($check==TRUE)
	{
		$_SESSION['User']=$username;
		echo "<script>alert('Đăng nhập thành công!')</script>";
		echo '<meta http-equiv="REFRESH" content ="0;URL=index.php">';
	}
	else
	{
		echo '<loi style="color:red;"> Đăng nhập thất bại! Thử lại hoặc <a href="?page=thanhvien&action=dangky">Đăng ký</a> </loi>';
	}
//	if(isset($_POST['remember']))
//	{
//		setcookie("User", $_SESSION['Email'], time()+(60*60*24*365));
//	}
    }
    
    function checkUserPass($username, $password){
        $con = new MyConnection();
        $sqlquery = "SELECT tv_tendangnhap FROM thanhvien WHERE tv_tendangnhap='$username' AND tv_matkhau='$password'";
        $result = mysqli_query($con->getMyConnection(), $sqlquery);
        $count = mysqli_num_rows($result);
        if($count > 0)
	{
		$check = TRUE;
	}
	else
	{
		$check = FALSE;
	}
        return $check;
    }
    
    function dangnhapxetquyen($username,$password,$rule){
        $check = $this->checkUserPassRule($username, $password, $rule);
        if($check==TRUE)
	{
		$_SESSION['User']=$username;
		echo "<script>alert('Đăng nhập thành công!')</script>";
		echo '<meta http-equiv="REFRESH" content ="0;URL=index.php">';
	}
	else
	{
                $guest_rule = $this->getRuleByUsername($username);
                if($guest_rule!="qt"){
                    echo "<script>alert('Tài khoản của bạn không phải là quản trị!')</script>";
                } else {
                    echo "<script>alert('Sai mật khẩu!')</script>";
                }
	}
    }
    
    function checkUserPassRule($username, $password, $rule){
        $con = new MyConnection();
        $sqlquery = "SELECT tv_tendangnhap FROM thanhvien WHERE tv_tendangnhap='$username' AND tv_matkhau='$password' AND tv_quyen='$rule'";
        $result = mysqli_query($con->getMyConnection(), $sqlquery);
        $count = mysqli_num_rows($result);
        if($count > 0)
	{
		$check = TRUE;
	}
	else
	{
		$check = FALSE;
	}
        return $check;
    }
    
    function getRuleByUsername($username){
        $con = new MyConnection();
        $sqlquery = "SELECT tv_quyen FROM thanhvien WHERE tv_tendangnhap='".$username."'";
        $result = mysqli_query($con->getMyConnection(), $sqlquery);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        return $row['tv_quyen'];
    }
            
    function getUsername(){
        $username = '';
        if(isset($_SESSION['User'])){
            $username = $_SESSION['User'];
        }
        return $username;
    }
    function checkLogged(){
        $check = FALSE;
        if(isset($_SESSION['User'])){
            $check = TRUE;
        }
        return $check;
    }
    
    function checkLoggedRule($rule){
        $check = FALSE;
        if(isset($_SESSION['User'])){
            $username = $_SESSION['User'];
            $guest_rule = $this->getRuleByUsername($username);
            if($guest_rule == $rule){
                $check = TRUE;
            }
        }
        
        return $check;
    }
    
    function checkLoggedGoLogin(){
        if(!isset($_SESSION['User'])){
            echo "<script>alert('Bạn cần đăng nhập!')</script>";
            echo '<meta http-equiv="REFRESH" content ="0;URL=?page=thanhvien&action=dangnhap">';
        }
    }
    
    function checkLoggedGoLoginRule($rule){
        $check = $this->checkLoggedRule($rule);
        if($check != true){
            echo "<script>alert('Bạn cần đăng nhập!')</script>";
            echo '<meta http-equiv="REFRESH" content ="0;URL=login.php">';
        }
    }
    
    function getUsernameORCode($code){
        if(isset($_SESSION['User'])){
            $code = $_SESSION['User'];
        }
        return $code;
    }
    function getLoggedCode($codechuadn){
        $code = $codechuadn;
        if(isset($_SESSION['User'])){
            $code =  '<div class="btn-group">
                        <button type="button" class="buttonlink dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span>
                         '.$_SESSION['User'].'
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                          <li><a href="?page=thanhvien&action=donhang">Lịch sử mua hàng</a></li>
                          <li><a href="?page=thanhvien&action=suathongtin">Sửa thông tin</a></li>
                          <li><a href="?page=thanhvien&action=dangxuat">Đăng xuất</a></li>
                        </ul>
                      </div>';
        }
        return $code;
    }
    
    function getLoggedAndUnloggedCode($codechuadn,$codedadangnhap){
        $code = $codechuadn;
        if(isset($_SESSION['User'])){
            $code =  $codedadangnhap;
        }
        return $code;
    }
    
    function hienthi1Thanhvien($tv_tendangnhap){
        $con = new MyConnection();
        $sqlquery = "SELECT * FROM thanhvien WHERE tv_tendangnhap=".$tv_tendangnhap;
        $result = mysqli_query($con->getMyConnection(), $sqlquery);
        return mysqli_fetch_array($result,MYSQLI_ASSOC);
    }
    
    function capnhatThongtinTv($tendangnhap, $ten, $gioitinh, $diachi, $dienthoai, $email, $sinhnhat, $cmnd){
        $con = new MyConnection();
        $sqlquery = "UPDATE thanhvien SET tv_ten='".$ten."', tv_gioitinh='".$gioitinh."',tv_diachi='".$diachi."',tv_dienthoai='".$dienthoai."',tv_email='".$email."',tv_sinhnhat='".$sinhnhat."',tv_cmnd='".$cmnd."' WHERE tv_tendangnhap='$tendangnhap'";
        mysqli_query($con->getMyConnection(), $sqlquery);
    }
    
    function capnhatPassword($tendangnhap,$passcu,$passmoi){
        $con = new MyConnection();
        $sqlquery = "UPDATE thanhvien SET tv_matkhau='".$passmoi."' WHERE tv_tendangnhap='$tendangnhap'";
        mysqli_query($con->getMyConnection(), $sqlquery);
    }
}
