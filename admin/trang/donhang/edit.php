<?php

if(isset($_GET['ma']))
{
	$Ma_dh=$_GET['ma'];
	$sq1="SELECT * from donhang where dh_ma ='$Ma_dh'";
	$rs1=mysqli_query($conn, $sq1);
	while($row1=mysqli_fetch_array($rs1, MYSQL_ASSOC))
	{
		$tv_tendangnhap = $row1['tv_tendangnhap'];
		
		$dh_dt = $row1['dh_dt'];
		$dh_noigiao = $row1['dh_noigiao'];
		$dh_ngaylap = $row1['dh_ngaylap'];
		$dh_ngaygiao = $row1['dh_ngaygiao'];
		$dh_trangthai = $row1['dh_trangthai'];
?>
<form class="form-horizontal" role="form" method="post">
<div class="panel panel-success">
  <div class="panel-heading"><?php echo "Đơn hàng số ".$Ma_dh ?></div>
  <?php
  	if(isset($_POST['subcndh']))
  	{
                $con = new MyConnection();
  		$dh_ngaygiao = $_POST['Ngay_gh'];
  		$dh_trangthai = $_POST['Tinhtrang_dh'];
  		$loi = "";
  		if($dh_trangthai=="")	// kiểm tra tình trạng đơn hàng có rỗng không
  		{
  			$loi.='<p style="color:red;"> Chưa chọn tình trạng đơn hàng! </p>';
  		}
  		if(strtotime($dh_ngaygiao) < strtotime($dh_ngaylap)) //kiểm tra ngày giao hàng có trước ngày đặt hàng không
	  	{
  			$loi.='<p style="color:red;"> Ngày giao hàng không thể trước ngày đặt hàng! </p>';
  		}

  		if($loi == "")
  		{
  			mysqli_query($con->getMyConnection(),"UPDATE donhang SET dh_ngaygiao='$dh_ngaygiao', dh_trangthai='$dh_trangthai' Where dh_ma = '$Ma_dh'");
				echo '<p style="color:green;"> Đã cập nhật thành công! </p>';
  		}else {
  			echo $loi;
  		}
  	}
  ?>
  <div class="panel-body">
  		<div class="form-group">
		    <label for="" class="col-xs-3 control-label">Khách hàng:</label>
		    <div class="">
		      <?php echo "$tv_tendangnhap"; ?>
		    </div>
		</div>
	   
	    <div class="form-group">
		    <label for="" class="col-xs-3 control-label">Số điện thoại:</label>
		    <div class="">
		      <?php echo "$dh_dt"; ?>
		    </div>
  		</div>
  		<div class="form-group">
		    <label for="" class="col-xs-3 control-label">Địa chỉ:</label>
		    <div class="">
		      <?php echo "$dh_noigiao"; ?>
		    </div>
  		</div>
  		<div class="form-group">
		    <label for="" class="col-xs-3 control-label">Ngày đặt hàng:</label>
		    <div class="">
		      <?php echo "$dh_ngaylap"; ?>
		    </div>
  		</div>
  		<div class="form-group">
		    <label for="" class="col-xs-3 control-label">Ngày giao hàng:</label>
		    <div class="col-xs-3">
		      <input type="date" id="Ngay_gh" name="Ngay_gh" value="<?php echo "$dh_ngaygiao"; ?>">
		    </div>
  		</div>
  		<div class="form-group">
		    <label for="" class="col-xs-3 control-label">Tình trạng:</label>
		    <div class="col-xs-3">
		      	<select name="Tinhtrang_dh" id="Tinhtrang_dh" class="form-control">
	                <option value="">Tình trạng đơn hàng</option>
	                <option value="xuly" <?php if($dh_trangthai=='xuly'){echo 'selected';} ?> >Đang xử lý</option>
	                <option value="giao" <?php if($dh_trangthai=='giao'){echo 'selected';} ?> >Đang giao</option>
	                <option value="xong" <?php if($dh_trangthai=='xong'){echo 'selected';} ?> >Đã xong</option>
                        <option value="xong" <?php if($dh_trangthai=='huy'){echo 'selected';} ?> >Đã xong</option>
            	</select>
		    </div>
  		</div>
  		<div class="form-group">
		    <label for="" class="col-xs-3 control-label"></label>
		    <div class="col-xs-3">
		      	<input type="submit" id="subcndh" name="subcndh" class="btn btn-default" value="Cập nhật">
		    </div>
  		</div>
  </div>
</div>
</form>
<?php	} ?>

<table class="table table-bordered">
	<tr>
      <th>STT</th>
      <th>Tên sản phẩm</th>
      <th>Loại sản phẩm</th>
      <th>Số lượng</th>
      <th>Đơn giá</th>
      <th>Thành tiền</th>
    </tr>
	<?php
		$sq2= "SELECT b.sp_ma, b.sp_ten, c.lsp_ten, a.ctdh_dongia, a.ctdh_soluong
			from chitiet_donhang as a, sanpham as b, loaisanpham as c
			where a.sp_ma = b.sp_ma and b.lsp_ma = c.lsp_ma and a.dh_ma = '$Ma_dh'";
		$rs2= mysqli_query($conn, $sq2);
		$stt=0;
		$tongtien=0;
		while($row2=mysqli_fetch_array($rs2, MYSQL_ASSOC))
		{
			$Ten_sp=$row2['sp_ten'];
			$Ten_loai=$row2['lsp_ten'];
			$Solg_dh=$row2['ctdh_soluong'];
			$Gia_dh=$row2['ctdh_dongia'];
			$thanhtien=$Solg_dh*$Gia_dh;
			$stt+=1;
			$tongtien=$tongtien+$thanhtien;
	?>
	<tr>
          <td><?php echo "$stt";?></td>
          <td><?php echo "$Ten_sp";?></td>
          <td><?php echo "$Ten_loai";?></td>
          <td><?php echo "$Solg_dh";?></td>
          <td><?php echo number_format($Gia_dh,0,',','.');?></td>
          <td><?php echo number_format($thanhtien,0,',','.');?></td>
    </tr>
<?php } ?>
	<tr>
          <td colspan="3"></td>
          <td colspan="3"><div align="left">Tổng tiền: <?php echo number_format($tongtien,0,',','.')." Đồng";?></div></td>
    </tr>
</table>
<?php } ?>