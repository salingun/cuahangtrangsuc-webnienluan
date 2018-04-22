    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.2.0.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
        <?php
			include_once('dbconnect.php');
		?>
         <script language="javascript">
    	function ktra()
		{  
			if(confirm("Bạn có chắc chắn muốn xóa ")) 
			{ 
				return true;
			}
		   else 
		   { 
		   		return false;
			}
		}
    </script>
    <script language="javascript">
    	$(document).ready(function() {
			var table=$('#tablesalomon').DataTable({
				responsive: true,
				"language":{
					"lengthMenu": "Hiển thị _MENU_ dòng dữ liệu trên một trang",
					"info": "Hiển thị _START_ trong tổng số _TOTAL_ dòng dữ liệu",
					"infoEmpty": "Dữ liệu rổng",
					"emptyTable": "Chưa có dữ liệu nào",
					"processing": "Đang xử lý...",
					"search": "Tìm kiếm:",
					"loadingrecords": "Đang load dữ liệu...",
					"zeroRecords": "không tìm thấy dữ liệu",
					"infoFiltered": "(Được từ tổng số _MAX_ dòng dữ liệu)",
					"paginate": {
						"first": "|<",
						"last": ">|",
						"next": ">>",
						"previous": "<<"
					}
				},
				"lengthMenu": [[2, 5, 10, 15, 20, 25, 30, -1], [2, 5, 10, 15, 20, 25, 30, "Tất cả"]]
					
					
            
        });
		new $.fn.dataTable.FixedHeader ( table);
		
        });
    
    </script>
        <form name="frmXoa" method="post" action="">
        <h1>Quản lý hoa</h1>
        <p>
        	<a href="?khoatrang=quanlyhoathemmoi"><img src="images/add.png" alt="Thêm mới" width="16" height="16" border="0" /> Thêm mới</a>
        </p>
        <table id="tablesalomon" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                	<th><strong>Chọn</strong></th>
                    <th><strong>Mã hoa</strong></th>
                    <th><strong>Tên hoa</strong></th>
                    <th><strong>Giá</strong></th>
                    <th><strong>Số lượng</strong></th>
                    <th><strong>Loại hoa</strong></th>
                    <th><strong>Nhà cung cấp</strong></th>
                    <th><strong>Hình ảnh</strong></th>
                    <th><strong>Cập nhật</strong></th>
                    <th><strong>Xóa</strong></th>
                </tr>
             </thead>

			<tbody>
            <?php
					
				$result = mysqli_query($conn, "SELECT h_ma, h_ten, h_mota_ngan, h_gia, h_ngaycapnhat, h_soluong,lh_ten, ncc_ten FROM hoa a JOIN loaihoa b ON a.lh_ma = b.lh_ma JOIN nhacungcap c ON a.ncc_ma = c.ncc_ma ORDER BY h_ma DESC") or die(mysqli_error($conn));
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
			?>
			<tr>
              <td class="cotCheckBox"><input  name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row["h_ma"]?> "/></td>
              <td ><?php echo $row["h_ma"] ?></td>
              <td><?php echo $row["h_ten"] ?></td>
              <td><?php echo $row["h_gia"] ?></td>
               <td ><?php echo $row["h_soluong"] ?></td>
              <td><?php echo $row["lh_ten"] ?></td>
              <td><?php echo $row["ncc_ten"] ?></td>
              
              
             <td align='center' class='cotNutChucNang'><a href="?khoatrang=quanlyhoahinhanh&ma=<?php echo $row['h_ma'] ?>"><img src='images/image_edit.png' border='0'  /></a></td>
             
              <td align='center' class='cotNutChucNang'>
              <a href="?khoatrang=quanlyhoacapnhat&ma=<?php echo $row['h_ma'];?>"><img src='images/edit.png' border='0'/></a>
              </td>
              
              <td align='center' class='cotNutChucNang'>
              	<a href="quanly_hoa.php?ma=<?php  echo $row['h_ma'];?>" onclick="return ktra()"><img src='images/delete.png' border='0' /></a>
              </td>
            </tr>
            <?php
				}
				?>
			</tbody>
        
        </table>  
<!--Nút Thêm mới , xóa tất cả-->
        <div class="row" style="background-color:#FFF"><!--Nút chức nang-->
            <div class="col-md-12">
            	<input  type="submit" value="Xóa mục chọn" name="btnXoa" id="btnXoa" onclick="return ktra()" class="btn btn-primary"/>
            </div>
        </div><!--Nút chức nang-->
 </form>
  <?php
 if(isset($_POST['btnXoa']) && isset($_POST['checkbox']))
 {
	 for($i=0;$i< count($_POST['checkbox']); $i++)
	 {   
	 		$ma=$_POST['checkbox'][$i];
		    mysqli_query($conn,"Delete from hoa where h_ma=$ma") or die(mysqli_error($conn));
			echo "<meta  <meta   http-equiv='refresh' content='0, URL=?khoatrang=quanlyhoa'/>";
	}
	 
}
 ?>
  <?php
 if(isset($_GET["ma"]))
 {  $maloai=$_GET['ma'];
     mysqli_query($conn,"Delete from hoa where h_ma=$maloai") or die(mysqli_error($conn));
	 echo "<meta  <meta   http-equiv='refresh' content='0, URL=quanly_hoa.php'/>";
 
 }
 
 ?>
