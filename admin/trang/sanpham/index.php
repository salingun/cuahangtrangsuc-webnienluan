   
     <script src="js/jquery-3.2.0.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>  
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
      var table=$('#table').DataTable({
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
        <h1>Quản lý sản phẩm</h1>
        <p>
          <a href="?trang=sanpham&link=create"><span class="glyphicon glyphicon-plus"></span> Thêm mới</a>
        </p>
        <table id="table" class="table table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                  <th><strong>Chọn</strong></th>
                    <th><strong>Mã sản phẩm</strong></th>
                    <th><strong>Tên sản phẩm</strong></th>
                    <th><strong>Giá</strong></th>
                    <th><strong>Số lượng</strong></th>
                    <th><strong>Loại</strong></th>
                    <th><strong>Nhà cung cấp</strong></th>
                    <th><strong>Hình ảnh</strong></th>
                    <th><strong>Cập nhật</strong></th>
                    <th><strong>Xóa</strong></th>
                </tr>
             </thead>

      <tbody>
            <?php
          
        $result = mysqli_query($conn, "SELECT sp_ma, sp_ten, sp_mota_ngan, sp_gia, sp_ngaycapnhat, sp_soluong,lsp_ten, ncc_ten FROM sanpham a JOIN loaisanpham b ON a.lsp_ma = b.lsp_ma JOIN nhacungcap c ON a.ncc_ma = c.ncc_ma ORDER BY sp_ma DESC") or die(mysqli_error($conn));
        while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
      ?>
      <tr>
              <td class="cotCheckBox"><input  name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row["sp_ma"]?> "/></td>
              <td ><?php echo $row["sp_ma"] ?></td>
              <td><?php echo $row["sp_ten"] ?></td>
              <td><?php echo $row["sp_gia"] ?></td>
               <td ><?php echo $row["sp_soluong"] ?></td>
              <td><?php echo $row["lsp_ten"] ?></td>
              <td><?php echo $row["ncc_ten"] ?></td>
              
              
             <td align='center' class='cotNutChucNang'><a href="?trang=sanpham&link=imgcreate&ma=<?php echo $row['sp_ma'] ?>"><span style="color: blue;" class="glyphicon glyphicon-camera"></span></a></td>
             
              <td align='center' class='cotNutChucNang'>
              <a href="?trang=sanpham&link=edit&ma=<?php echo $row['sp_ma'];?>"><span style="color: blue;" class="glyphicon glyphicon-pencil"></span></a>
              </td>
                
              <td align='center' class='cotNutChucNang'>
                <a href="?trang=sanpham&ma=<?php  echo $row['sp_ma'];?>" onclick="return ktra()"><span style="color: red;" class="glyphicon glyphicon-remove"></span></a>
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
        mysqli_query($conn,"Delete from sanpham where sp_ma=$ma") or die(mysqli_error($conn));
      echo "<meta   http-equiv='refresh' content='0, URL=?trang=sanpham'/>";
  }
   
}
 ?>
  <?php
 if(isset($_GET["ma"]))
 {  $ma=$_GET['ma'];
     mysqli_query($conn,"Delete from sanpham where sp_ma=$ma") or die(mysqli_error($conn));
   echo "<meta   http-equiv='refresh' content='0, URL=?trang=sanpham'/>";
 
 }
 
 ?>


