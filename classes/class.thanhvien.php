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
        $con = new MyConnection();
        $sqlquery = "SELECT tv_tendangnhap FROM thanhvien WHERE tv_tendangnhap='$username' AND tv_matkhau='$password'";
        $result = mysqli_query($con->getMyConnection(), $sqlquery);
        $count = mysqli_num_rows($result);
        if($count > 0)
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
    function getUsernameORCode($code){
        if(isset($_SESSION['User'])){
            $code = $_SESSION['User'];
        }
        return $code;
    }
    function getLoggedCode($codechuadn, $codedadn){
        if(isset($_SESSION['User'])){
            $code = $codedadn;
        } else{
            $code = $codechuadn;
        }
        return $code;
    }
    
    function hienthi1Thanhvien($tv_tendangnhap){
        $con = new MyConnection();
        $sqlquery = "SELECT * FROM thanhvien WHERE tv_tendangnhap=".$tv_tendangnhap;
        $result = mysqli_query($con->getMyConnection(), $sqlquery);
        return mysqli_fetch_array($result,MYSQLI_ASSOC);
    }
}
