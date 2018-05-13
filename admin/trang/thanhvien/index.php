    
  
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
        <form name="frmXoa" method="post" action="" class="page-header">
        <h1>Danh sách thành viên</h1>
        <p>
          <a href="?trang=thanhvien&link=create"><span class="glyphicon glyphicon-plus"></span> Thêm mới</a>
        </p>
        <table class="table table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                  
                  <th>Email</th>
                  <th>Tên thành viên</th>
                  <th>Tên đăng nhập</th>
                  <th>Quyền</th>
                  <th>Trạng thái</th>
                  <th></th>
                  
                </tr>
             </thead>

      <tbody>
            <?php
          
        $result = mysqli_query($conn, "SELECT * FROM thanhvien") or die(mysqli_error($conn));
        while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
      ?>
      <tr>
             
                <td><?php echo $row['tv_email'];?></td>
                <td><?php echo $row['tv_ten'];?></td>
                <td><?php echo $row['tv_tendangnhap'];?></td>
                <td><?php echo $row['tv_quyen'];?></td>
                <td><?php echo $row['tv_trangthai'];?></td>
             
              <td align='center' class='cotNutChucNang'>
              <a href="?trang=thanhvien&link=edit&ma=<?php echo $row['tv_email'];?>"><span style="color: blue;" class="glyphicon glyphicon-pencil"></span></a></td>
             <!--  <td align='center' class='cotNutChucNang'>
               <a href="?trang=thanhvien&link=edit&ma=<?php  echo $row['tv_email'];?>" onclick="return ktra()"><span style="color: red;" class="glyphicon glyphicon-remove"></span></a>
              </td>-->
            </tr>
            <?php
        }
        ?>
      </tbody>
        
        </table>  
<!--Nút Thêm mới , xóa tất cả-->
  <!--      <div class="row" style="background-color:#FFF"><!--Nút chức nang-->
      <!--      <div class="col-md-12">
              <input  type="submit" value="Xóa mục chọn" name="btnXoa" id="btnXoa" onclick="return ktra()" class="btn btn-primary"/>
            </div>
        </div>
      -->
 </form>
  <?php
 if(isset($_POST['btnXoa']) && isset($_POST['checkbox']))
 {
   for($i=0;$i< count($_POST['checkbox']); $i++)
   {   
      $email=$_POST['checkbox'][$i];
        mysqli_query($conn,"Delete from thanhvien where tv_email=$email") or die(mysqli_error($conn));
        echo "<script>alert('Xóa thành công')</script>";
      echo "<meta   http-equiv='refresh' content='0, URL=?trang=thanhvien'/>";
  }
   
}
 ?>
  <?php
 if(isset($_GET["ma"]))
 {  $email=$_GET['ma'];
     mysqli_query($conn,"Delete from thanhvien where tv_email=$email") or die(mysqli_error($conn));
     echo "<script>alert('Xóa thành công tài khoản $email')</script>";
   echo "<meta   http-equiv='refresh' content='0, URL=?trang=thanhvien'/>";
 
 }
 
 ?>


