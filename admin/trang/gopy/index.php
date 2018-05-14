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
<form name="frmXoa" method="post" action="">
        <h1>Danh sách góp ý</h1>
        <table class="table table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>Chọn</strong></th>
                    <th><strong>Mã góp ý</strong></th>
                    <th><strong>Tài khoản góp ý</strong></th>
                    <th><strong>Email</strong></th>
                    <th><strong>Số điện thoại</strong></th>
                    <th><strong>Tiêu đề</strong></th>
                    <th><strong>Nội dung</strong></th>
                    <th><strong>Xóa</strong></th>
                </tr>
             </thead>
             <tbody>
             <?php
                $gyClass = new Gopy();
                $result = $gyClass->hienthiDSGopy();
                while ($row = mysqli_fetch_array($result)) {
             ?>
              <tr>
                  <td><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row["gy_ma"]?> "/></td>
                  <td><?php echo $row['gy_ma']; ?></td>
                  <td><?php echo $row['tv_tendangnhap'];?></td>
                  <td><?php echo $row['gy_email'];?></td>
                  <td><?php echo $row['gy_dienthoai'];?></td>
                  <td><?php echo $row['gy_tieude'];?></td>
                  <td><?php echo substr(strip_tags(htmlspecialchars_decode($row['gy_noidung'])), 0,200);?>...</td>
                  <td><a href="?trang=gopy&ma=<?php  echo $row['gy_ma'];?>" onclick="return ktra()"><span style="color: red;" class="glyphicon glyphicon-remove"></span></a></td>
              </tr>
            <?php } ?>
              </tbody>
        </table>  
        <div class="row" style="background-color:#FFF"><!--Nút chức nang-->
            <div class="col-md-12">
              <input  type="submit" value="Xóa mục chọn" name="btnXoa" id="btnXoa" onclick="return ktra()" class="btn btn-primary"/>
            </div>
        </div><!--Nút chức nang-->
 </form>
 <?php
    //xử lý xóa nhiều
    if(isset($_POST['btnXoa']) && isset($_POST['checkbox']))
    {
      for($i=0;$i< count($_POST['checkbox']); $i++)
      {   
        $ma=$_POST['checkbox'][$i];
        $gyClass->xoaGopy($ma);
        echo "<meta http-equiv='refresh' content='0, URL=?trang=gopy'/>";
     }

   }
   //xử lý xóa 1
    if(isset($_GET["ma"]))
    {
        $ma=$_GET['ma'];
        $gyClass->xoaGopy($ma);
        echo "<meta   http-equiv='refresh' content='0, URL=?trang=gopy'/>";

    }
 
 ?>