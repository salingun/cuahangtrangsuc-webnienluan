    
   <?php
    
	if(isset($_GET["ma"]))
			{
				$ma = $_GET["ma"];
				$result = mysqli_query($conn, "SELECT lsp_ten, lsp_mota FROM loaisanpham WHERE lsp_ma=$ma");
				$row = mysqli_fetch_row($result);
				$ten = $row[0];
				$moTa =$row[1];

	?>
<div class="container">
	<h2>Cập nhật loại sản phẩm</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
					<div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Tên loại sản phẩm(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtTen" id="txtTen" class="form-control" placeholder="Tên loại sản phẩm" value='<?php echo $ten; ?>'>
							</div>
					</div>
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Mô tả(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtMoTa" id="txtMoTa" class="form-control" placeholder="Mô tả" value='<?php echo $moTa; ?>'>
							</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnCapNhat" id="btnCapNhat" value="Cập nhật"/>
                              <input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Bỏ qua" onclick="window.location='?trang=loaisanpham'" />                              	
						</div>
					</div>
				</form>
	</div>
    <?php
	}
	else
	{
		echo '<meta http-equiv="refresh" content="0;URL=?trang=loaisanpham"/>';
	}
	?>

	<?php
    //Kiểm tra có phải submit form hay không?
    if(isset($_POST["btnCapNhat"]))
    {
        $ten = $_POST["txtTen"];
        $moTa = $_POST["txtMoTa"];
        $loi="";
        if($ten=="")
        {
            $loi.="<li>Mời nhập tên loại sản phẩm</li>";
        }
        if($loi!="")
        {
            echo "<ul>$loi</ul>";
        }
        else
        {	
        mysqli_query($conn, "UPDATE loaisanpham SET lsp_ten = '$ten', lsp_mota='$moTa' WHERE lsp_ma=$ma");
        echo '<meta http-equiv="refresh" content="0;URL=?trang=loaisanpham"/>';
        }
    
    }
    ?>
      