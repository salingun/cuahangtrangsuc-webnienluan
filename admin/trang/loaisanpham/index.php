    
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
        <h1>Danh sách loại sản phẩm</h1>
        <p>
        <a href="?trang=loaisanpham&link=create"><span class="glyphicon glyphicon-plus"></span> Thêm mới</a>
        </p>
        <table class="table table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                  <th><strong>Chọn</strong></th>
                    <th><strong>Số thứ tự</strong></th>
                    <th><strong>Tên loại sản phẩm</strong></th>
                     <th><strong>Mô tả</strong></th>
                    <th><strong>Cập nhật</strong></th>
                    <th><strong>Xóa</strong></th>
                </tr>
             </thead>

      <tbody>
            <?php
      
        $stt=1;
        $result = mysqli_query($conn, "SELECT * FROM loaisanpham");
        while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
      ?>
      <tr>
            <td class="cotCheckBox"><input  name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row["lsp_ma"]?> "/></td>
              <td class="cotCheckBox"><?php echo $stt; ?></td>
              <td><?php echo $row["lsp_ten"] ?></td>
              <td><?php echo $row["lsp_mota"] ?></td>
             
              <td align='center' class='cotNutChucNang'><a href="?trang=loaisanpham&link=edit&ma=<?php echo $row["lsp_ma"];?>"><span style="color: blue;" class="glyphicon glyphicon-pencil"></span></td>
              <td align='center' class='cotNutChucNang'><a href="?trang=loaisanpham&ma=<?php echo $row["lsp_ma"];?>" onclick="return ktra()"><span style="color: red;" class="glyphicon glyphicon-remove"></a></td>
            </tr>
            <?php
        $stt++;
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
      $maloai=$_POST['checkbox'][$i];
        mysqli_query($conn,"Delete from loaisanpham where lsp_ma=$maloai") or die(mysqli_error($conn));
      echo "<meta   http-equiv='refresh' content='0, URL=?trang=loaisanpham'/>";
  }
   
}
 ?>
 
 <?php
 if(isset($_GET["ma"]))
 {  $maloai=$_GET['ma'];
     mysqli_query($conn,"Delete from loaisanpham where lsp_ma=$maloai") or die(mysqli_error($conn));
   echo "<meta   http-equiv='refresh' content='0, URL=?trang=loaisanpham'/>";
 
 }
 
 ?>
