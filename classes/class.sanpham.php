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
    
    function hienthiDSSPPhantrang($dieukien,$sotrang,$sosptrentrang){
        $con = new MyConnection();
        $sqlquery = "SELECT * FROM sanpham".$dieukien." LIMIT ".(($sotrang-1)*$sosptrentrang).",".$sosptrentrang;
        $result = mysqli_query($con->getMyConnection(), $sqlquery);
        return $result;
    }
    
    function countSotrangSP($dieukien){
        $con = new MyConnection();
        $sosptrentrang = 12;
        $sqlquery = "SELECT * FROM sanpham".$dieukien;
        $result = mysqli_query($con->getMyConnection(), $sqlquery);
        $tongsosp = mysqli_num_rows($result);
        $sotrang = ceil($tongsosp/$sosptrentrang);
        return $sotrang;
    }
    
    function linkPhantrang($searchkey,$cate,$sotrang){
        $linkPhantrang = "?page=sanpham&action=index&sotrang=".$sotrang;
        if($searchkey!=null) {
            $linkPhantrang = "?page=sanpham&action=index&searchkey=".$searchkey."&sotrang=".$sotrang;
        }
        if($cate!=null) {
            $linkPhantrang = "?page=sanpham&action=index&cate=".$cate."&sotrang=".$sotrang;
        }
        return $linkPhantrang;
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
    
    function getTenspByMaSP($sp_ma){
        $con = new MyConnection();
        $sqlquery = "SELECT sp_ten FROM sanpham WHERE sp_ma=".$sp_ma;
        $result = mysqli_query($con->getMyConnection(), $sqlquery);
        $row =  mysqli_fetch_array($result,MYSQLI_ASSOC);
        return $row['sp_ten'];
    }
    
    function hienthi1SP($sp_ma){
        $con = new MyConnection();
        $sqlquery = "SELECT * FROM sanpham WHERE sp_ma=".$sp_ma;
        $result = mysqli_query($con->getMyConnection(), $sqlquery);
        return mysqli_fetch_array($result,MYSQLI_ASSOC);
    }
    
    function getTenLoaiByIdSP($sp_ma){
        $con = new MyConnection();
        $sqlquery = "SELECT lsp_ten FROM loaisanpham INNER JOIN sanpham ON loaisanpham.lsp_ma=sanpham.lsp_ma WHERE sanpham.sp_ma=".$sp_ma;
        $result = mysqli_query($con->getMyConnection(), $sqlquery);
        $row = mysqli_fetch_array($result);
        return $row['lsp_ten'];
    }
    
    function getTenNccByIdSP($sp_ma){
        $con = new MyConnection();
        $sqlquery = "SELECT ncc_ten FROM nhacungcap INNER JOIN sanpham ON nhacungcap.ncc_ma=sanpham.ncc_ma WHERE sanpham.sp_ma=".$sp_ma;
        $result = mysqli_query($con->getMyConnection(), $sqlquery);
        $row = mysqli_fetch_array($result);
        return $row['ncc_ten'];
    }
}
