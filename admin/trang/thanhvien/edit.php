
<div class="page-header"><h3>Sửa thông tin thành viên</h3></div>

<?php
if(isset($_GET['ma']))
{
  $email = $_GET['ma'];
  $sq = "select * from thanhvien where tv_email='$email'";
  $rs = mysqli_query($conn, $sq);
  $r = mysqli_fetch_array($rs);
?>
<?php
    if(isset($_POST['subsuatv']))
    {
      if($_POST['Pass']!="")
      {
        $Pass = md5($_POST['Pass']);
      }else{
        $Pass = $r['Pass'];
      }
      $Ten_tv = $_POST['Ten_tv'];
      $Tendangnhap_tv = $_POST['Tendangnhap_tv'];
      $Dt_tv = $_POST['Dt_tv'];
      $Dc_tv = $_POST['Dc_tv'];
      $quyen_tv = $_POST['quyen_tv'];
      if($Ten_tv!="" && $Dt_tv!="" && $Dc_tv!="" && $Dt_tv!="" && $quyen_tv!="")
      {
        mysqli_query($conn, "UPDATE thanhvien SET tv_matkhau='$Pass', tv_ten='$Ten_tv', tv_tendangnhap='$Tendangnhap_tv', tv_diachi='$Dc_tv', tv_dienthoai='$Dt_tv', tv_quyen='$quyen_tv'
          Where tv_mail = '$email'") or die (mysqli_error($conn));;
        echo '<p style="color:green;"> Đã cập nhật thành công! </p>';
        echo '<meta http-equiv="refresh" content="2;URL=?trang=thanhvien">';  
      }
      else
      {
        echo '<p style="color:red;"> Nhập đầy đủ tên, tên đăng nhập, điện thoại, địa chỉ, quyền của thành viên! </p>';
      }
    }
  ?>
<div id="" width="80%" align="center">
  <form name="" id="frm-themsp" class="frm-themsp form-horizontal" action="" method="post">
    <div class="form-group">
      <label for="inputText3" class="col-sm-2 control-label">Email</label>
      <div class="col-xs-3">
        <input type="text" id="Email" name="Email" class="form-control" readonly="readonly" value="<?php echo $r['tv_email'];?>">
      </div>
    </div>
    <div class="form-group">
      <label for="inputText3" class="col-sm-2 control-label">Password</label>
      <div class="col-xs-3">
        <input type="password" id="Pass" name="Pass" class="form-control" value="">
      </div>
    </div>
    <div class="form-group">
      <label for="inputText3" class="col-sm-2 control-label">Tên thành viên</label>
      <div class="col-xs-3">
        <input type="text" id="Ten_tv" name="Ten_tv" class="form-control" value="<?php echo $r['tv_ten'];?>">
      </div>
    </div>
    <div class="form-group">
      <label for="inputText3" class="col-sm-2 control-label">Tên đăng nhập</label>
      <div class="col-xs-3">
        <input type="text" id="Tendangnhap_tv" name="Tendangnhap_tv" class="form-control" value="<?php echo $r['tv_tendangnhap'];?>">
      </div>
    </div>
    <div class="form-group">
      <label for="inputText3" class="col-sm-2 control-label">Điện thoại</label>
      <div class="col-xs-3">
        <input type="text" id="Dt_tv" name="Dt_tv" class="form-control" value="<?php echo $r['tv_dienthoai'];?>">
      </div>
    </div>
    <div class="form-group">
      <label for="inputNumber3" class="col-sm-2 control-label">Địa chỉ</label>
      <div class="col-xs-3">
        <input type="text" id="Dc_tv" name="Dc_tv" class="form-control" value="<?php echo $r['tv_diachi'];?>">
      </div>
    </div>
    <div class="form-group">
      <label for="inputNumber3" class="col-sm-2 control-label">Quyền</label>
      <div class="col-xs-3">
        <select name="quyen_tv" id="quyen_tv" class="form-control">
                <option value="">Chọn quyền thành viên</option>
                <option value="tv" <?php if($r['tv_quyen']=='tv'){echo 'selected';} ?> >Thành viên</option>
                <option value="qt" <?php if($r['tv_quyen']=='qt'){echo 'selected';} ?> >Quản trị</option>
              </select>
      </div>
    </div>
    
    <div class="form-group">
      <label for="inputTexr3" class="col-sm-2 control-label"></label>
      <div class="col-xs-3">
          <input type="submit" name="subsuatv" id="subsuatv" class="btn btn-default btn-lg" value="Cập nhật"/>
       </div>
    </div>
</form>
</div>
<?php } ?>

     