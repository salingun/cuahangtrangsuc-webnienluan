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
class Gopy {
//put your code here
    function themGopy($tv_tendangnhap,$gy_hoten,$gy_email,$gy_dienthoai,$gy_tieude,$gy_noidung,$gy_ngaygopy){
        $con = new MyConnection();
        $sqlquery = "INSERT INTO gopy (tv_tendangnhap,gy_hoten,gy_email,gy_dienthoai,gy_tieude,gy_noidung,gy_ngaygopy) VALUES ('$tv_tendangnhap','$gy_hoten','$gy_email','$gy_dienthoai','$gy_tieude','$gy_noidung','$gy_ngaygopy')";
        mysqli_query($con->getMyConnection(), $sqlquery);
    }
    
    function hienthiDSGopy(){
        $con = new MyConnection();
        $sqlquery = "SELECT * FROM gopy";
        $result = mysqli_query($con->getMyConnection(), $sqlquery);
        return $result;
    }
    
    function xoaGopy($magy){
        $con = new MyConnection();
        $sqlquery = "DELETE FROM gopy WHERE gy_ma=".$magy;
        mysqli_query($con->getMyConnection(), $sqlquery);
    }
}
