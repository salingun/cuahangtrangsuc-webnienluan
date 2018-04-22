<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Products
 *
 * @author PCGAMINGCANTHO
 */
require 'myClass.php';
class Sanpham {
    //put your code here
    function hienthiDSSP($dieukien) {
        $con = new MyConnection();
        $sqlquery = "SELECT * FROM sanpham".$dieukien;
        $result = mysqli_query($con->getMyConnection(), $sqlquery);
        return $result;
    }
    function countDSSP($dieukien) {
        $con = new MyConnection();
        $sqlquery = "SELECT * FROM sanpham".$dieukien;
        $result = mysqli_query($con->getMyConnection(), $sqlquery);
        $count = mysqli_num_rows($result);
        return $count;
    }
    
    function getHinhSPByID($idsanpham){
        $con = new MyConnection();
        $sqlquery = "SELECT hsp_tentaptin FROM hinhsanpham WHERE sp_ma=".$idsanpham;
        $result = mysqli_query($con->getMyConnection(), $sqlquery);
        return $result;
    }
}
