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
class Nhacungcap {
    //put your code here
    function hienthiDSNhacungcap($dieukien) {
        $con = new MyConnection();
        $sqlquery = "SELECT * FROM nhacungcap".$dieukien;
        $result = mysqli_query($con->getMyConnection(), $sqlquery);
        return $result;
    }
}
