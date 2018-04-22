<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyConnection
 *
 * @author PCGAMINGCANTHO
 */
class MyConnection {
    //put your code here
    function getMyConnection(){
        $conn=mysqli_connect("localhost","root","") or die ("Không thể kết nối vào MySQL");
	mysqli_select_db($conn, "trangsuc") or die ("Không thể kết nối vào Database");
        return $conn;
    }
}
