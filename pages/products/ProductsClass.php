<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of productsClass
 *
 * @author PCGAMINGCANTHO
 */

    class ProductsClass {
        //put your code here

        function hienthiDSSP($conn, $dieukien) {
            if($dieukien==null){
                $sqlquery = "SELECT * FROM sanpham";
            } else {
                $sqlquery = "SELECT * FROM sanpham"." ".$dieukien;
            }
            $result = mysqli_query($conn, $sqlquery);
            return $result;
        }
    }
?>