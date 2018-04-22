    

<?php
		
    	if(isset($_GET["ma"])){
			$ma = $_GET["ma"];
			$sqlstring = "select sp_ten, sp_mota_ngan, sp_mota_chitiet,sp_gia, sp_soluong, lsp_ma, ncc_ma from sanpham where sp_ma=".$ma;
			$result = mysqli_query($conn, $sqlstring);
			$row = mysqli_fetch_row($result);
			$ten = $row[0];
			$motangan = $row['1'];
			$motachitiet = $row['2'];
			$gia = $row['3'];
			$soluong = $row['4'];
			$loai = $row['5'];
			$ncc = $row['6'];
		}
		else
		{
			echo '<meta http-equiv="refresh" content="0;URL=?trang=sanpham"/>';
		}

	function bindLSPList($conn, $selectedValue) {
    	$sqlstring = "select lsp_ma, lsp_ten from loaisanpham";
        $result = mysqli_query($conn, $sqlstring);
        echo "<select name='slLoaiSanPham'>
            		<option value='0'>Chọn loại sản phẩm </option>";
            		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                		if ($row['lsp_ma'] == $selectedValue) {
                    		echo "<option value='" . $row['lsp_ma']."' selected>".$row['lsp_ten']."</option>";
               			} 
						else {
                    		echo "<option value='".$row['lsp_ma']."'>".$row['lsp_ten']."</option>";
                		}
            		}
        echo "</select>";
	}

        function bindNSXList($conn, $selectedValue) 
		{

            $sqlstring = "select ncc_ma, ncc_ten from nhasanxuat";
            $result = mysqli_query($conn, $sqlstring);
            echo "<select name='slNhaCungCap'>
            		<option value='0'>Chọn nhà cung cấp</option>";
           			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                		if ($row['ncc_ma'] == $selectedValue) {
                    		echo "<option value='".$row['ncc_ma']."' selected>".$row['ncc_ten']."</option>";
                		}
				 		else {
                    		echo "<option value='".$row['ncc_ma']. "'>".$row['ncc_ten']."</option>";
                		}
            		}
            echo "</select>";
        }
		
		if(isset($_POST["btnCapNhat"]))
		{
				$ten = $_POST["txtTen"];
				$motangan = $_POST['txtMoTaNgan'];
				$motachitiet = $_POST['txtMoTaChiTiet'];
				$gia = $_POST['txtGia'];
				$soluong = $_POST['txtSoLuong'];
				$loai = $_POST['slLoaiSanPham'];
				$ncc = $_POST['slNhaCungCap'];
				if(trim($ten=="")){
				echo "Vui lòng nhập tên sản phẩm";
				}else if(!is_numeric($gia)){
					echo "Vui lòng nhập giá sản phẩm";
				}
				else if(!is_numeric($soluong)){
					echo "Vui lòng nhập số lượng sản phẩm";
				}
				else if($loai=="0"){
					echo "Vui lòng chọn loại sản phẩm";
				}
				else if($ncc=="0"){
					echo "Vui lòng chọn nhà cung cấp";
				}
			else
			{	
				$sqlstring="UPDATE sanpham set 
							sp_ten ='".$ten."', 
							sp_gia=".$gia.", 
							sp_mota_ngan='".$motangan."',
							sp_mota_chitiet='".$motachitiet."', 
							sp_soluong=".$soluong.",
							lsp_ma=".$loai.",
							ncc_ma=".$ncc.",
							sp_ngaycapnhat='".date('Y-m-d H:i:s')."'
							WHERE sp_ma=".$ma;
				mysqli_query($conn, $sqlstring );
				echo '<meta http-equiv="refresh" content="0;URL=?trang=sanpham"/>';
			}	
		}
        ?>
<div class="container">
	<h2>Cập nhật sản phẩm</h2>
		
		
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
					<div class="form-group">
						    
                            <label for="txtTen" class="col-sm-2 control-label">Tên sản phẩm(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtTen" id="txtTen" class="form-control" placeholder="Tên sản phẩm" value='<?php echo $ten; ?>'/>
							</div>
                      </div>   
                      <div class="form-group">   
                             <label for="" class="col-sm-2 control-label">Loại sản phẩm(*):  </label>
							<div class="col-sm-10">
							      <?php bindLSPList($conn, $loai); ?>
							</div>
                        </div>
                        
                        <div class="form-group">   
                            <label for="" class="col-sm-2 control-label">Nhà cung cấp(*):  </label>
							<div class="col-sm-10">
							      <?php bindNSXList($conn, $ncc); ?>
							</div>
                          </div>   
                          
                          <div class="form-group">  
                            <label for="lblGia" class="col-sm-2 control-label">Giá(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtGia" id="txtGia" class="form-control" placeholder="Giá" value='<?php echo $gia; ?>'/>
							</div>
                            </div>   
                            
                            <div class="form-group">   
                            <label for="lblMoTa_Ngan" class="col-sm-2 control-label">Mô tả ngắn(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtMoTaNgan" id="txtMoTaNgan" class="form-control" placeholder="Mô tả ngắn" value='<?php echo $motangan; ?>'/>
							</div>
                            </div>
                            
                             <div class="form-group">  
                            <label for="lblMoTaChiTiet" class="col-sm-2 control-label">Mô tả chi tiết(*):  </label>
							<div class="col-sm-10">
							      <textarea name="txtMoTaChiTiet" rows="4" class="ckeditor"><?php echo $motachitiet ?></textarea>
              						<script>
                                        CKEDITOR.replace( 'txtMoTaChiTiet',
                                        
                                    </script> 
                                  
							</div>
                            </div>
                            
                            <div class="form-group">  
                            <label for="lblSoLuong" class="col-sm-2 control-label">Số lượng(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtSoLuong" id="txtSoLuong" maxlength="10" id="txtGia" class="form-control" placeholder="Số lượng" value='<?php echo $soluong; ?>'/>
							</div>
                            </div>
                            
                            
                            
					
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnCapNhat" id="btnCapNhat" value="Cập nhật"/>
                              <input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Bỏ qua" onclick="window.location='?trang=sanpham'" />
                              	
						</div>
					</div>
				</form>
		</div>


