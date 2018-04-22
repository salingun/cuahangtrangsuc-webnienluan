<?php
	$conn=mysqli_connect("localhost","root","") or die ("Không thể kết nối vào MySQL");
	mysqli_select_db($conn, "trangsuc") or die ("Không thể kết nối vào Database");
?>