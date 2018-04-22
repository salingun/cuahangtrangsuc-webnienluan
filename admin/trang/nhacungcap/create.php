     <!-- Bootstrap --> 
    
  <meta charset="utf-8" />
  
<?php

if(isset($_POST["btnThemMoi"]))
{
  $ten=$_POST['txtTen'];
  $mota=$_POST['txtMoTa'];
  $loi="";
  if($ten=="")
  {
    $loi.="<li>Mời nhập tên nhà cung cấp</li>";
  }
  if($loi!="")
  {
    echo "<ul>$loi</ul";
  }
  else
  {
    $sq="Select * from nhacungcap where ncc_ten='$ten'";
    $result=mysqli_query($conn,$sq);
    if(mysqli_num_rows($result)==0)
    {
      mysqli_query($conn,"Insert into nhacungcap(ncc_ten, ncc_mota) values ('$ten','$mota')") or die(mysqli_error($conn));
      echo "<meta   http-equiv='refresh' content='0, URL=?trang=nhacungcap'/>";
      }
    else
    {
      echo "<li>Trùng tên nhà cung cấp</li>";
      
      }
    
  }
  
  
  
}
?>
<div class="container">
  <h2>Thêm nhà cung cấp</h2>
        <form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
          <div class="form-group">
                <label for="txtTen" class="col-sm-2 control-label">Tên nhà cung cấp(*):  </label>
              <div class="col-sm-10">
                    <input type="text" name="txtTen" id="txtTen" class="form-control" placeholder="Tên nhà cung cấp" value='<?php echo isset($_POST["txtTen"])?($_POST["txtTen"]):"";?>'>
              </div>
          </div>
                    
                    <div class="form-group">
                <label for="txtMoTa" class="col-sm-2 control-label">Mô tả(*):  </label>
              <div class="col-sm-10">
                    <input type="text" name="txtMoTa" id="txtMoTa" class="form-control" placeholder="Mô tả" value='<?php echo isset($_POST["txtMoTa"])?($_POST["txtMoTa"]):"";?>'>
              </div>
          </div>
                    
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit"  class="btn btn-primary" name="btnThemMoi" id="btnThemMoi" value="Thêm mới"/>
                              <input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Bỏ qua" onclick="window.location='?trang=nhacungcap'" />
                                
            </div>
          </div>
        </form>
  </div>