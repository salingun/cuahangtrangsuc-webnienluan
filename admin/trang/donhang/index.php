
<div class="page-header">
	<h3>Danh sách đơn hàng</h3>
</div>
	
<form method="POST">
  <table class="table table-hover">
    <tr>
      <th>Chọn</th>
      <th>Mã đặt hàng</th>
      <th>Tên đặt hàng</th>
      <th>Ngày đặt hàng</th>
      <th>Ngày giao hàng</th>
      <th>Nơi giao hàng</th>
      <th>Tổng tiền</th>
      <th>Tình trạng đơn hàng</th>
      <th></th>
      <th></th>
    </tr>
    <?php			
			$sq="Select * From donhang";
			$result= mysqli_query($conn, $sq);
			while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
	?>
    <tr>
	    <td><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['dh_ma']; ?>"></td>
	    <td><?php echo $row['dh_ma'];?></td>
	    <td><?php echo $row['tv_tendangnhap'];?></td>
		<td><?php echo $row['dh_ngaylap'];?></td>
		<td><?php echo $row['dh_ngaygiao'];?></td>
		<td><?php echo $row['dh_noigiao'];?></td>
		<td><?php echo number_format($row['dh_tongtien'],0,',','.');?></td>
		<td><?php if($row['dh_trangthai']=='xuly'){echo "Đang xử lý";}elseif($row['dh_trangthai']=='giao'){echo "Đang giao hàng";}else{echo "Đã xong";};?></td>
	    <td><a href="?trang=donhang&link=edit&ma=<?php echo $row['dh_ma'];?>"><span style="color: blue;" class="glyphicon glyphicon-pencil"></span></a></td>
	    <td><a href="?trang=donhang&link=edit&ma=<?php echo $row['dh_ma'];?>" onclick="return sure();"><span style="color: red;" class="glyphicon glyphicon-remove"></span></a></td>
    </tr>
    <?php
		}
	?>
    <tr>
    	<td colspan="9">
    		<input type="submit" name="subxoanhieu" id="subxoanhieu" value="Xóa các mục" onclick="return sure()">				
    	</td>
    </tr>
  </table>
</form>
<script>
	function sure()
	{	
		result= confirm("Bạn có thực sự muốn xóa?");
		return result;
	}
</script>
 
<?php
		//XÓA NHIỀU

		if (isset($_POST['subxoanhieu'])&& isset($_POST['checkbox']))
		{
			for ($i = 0; $i < count($_POST['checkbox']); $i++)
			{					
						$maxoanhieu = $_POST['checkbox'][$i];
						
						mysqli_query("DELETE FROM donhang WHERE dh_ma='$maxoanhieu'");
						mysqli_query("DELETE FROM chitiet_donhang WHERE dh_ma='$maxoanhieu'");
						echo "<p style='color:green'>Đã xóa thành công đặt hàng $maxoanhieu!</p>";
			}
			echo '<meta http-equiv="refresh" content="2;URL=?trang=donhang"/>';
		}

		//XÓA 1
		if(isset($_GET['ma']))
		{
			$dh_ma = $_GET['ma'];
			mysqli_query("DELETE FROM donhang WHERE dh_ma='$dh_ma'");
			mysqli_query("DELETE FROM chitiet_donhang WHERE dh_ma='$dh_ma'");
			echo "<script>alert('Xóa thành công mã đặt hàng $dh_ma')</script>";
			echo '<meta http-equiv="refresh" content="0;URL=?trang=donhang"/>';
		}

?>
