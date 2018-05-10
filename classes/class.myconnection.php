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
        $db_server = 'localhost';
        $db_username = 'root';
        $db_password = '';
        $db_database = 'trangsuc';
        $db = mysqli_connect($db_server,$db_username,$db_password,$db_database) or die ("Không thể kết nối vào MySQL");
        return $db;
    }
}
