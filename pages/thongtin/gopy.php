<div class="" style="width: 80%; margin: 0 auto;">
    <form class="form-horizontal" role="form" method="POST">
    <?php
        //Gợi ý thông tin khi đã đăng nhập
        $tvClass = new Thanhvien();
        $Tendangnhap_gy = null;
        $Hoten_gy = "";
        $Email_gy = "";
        $Sodt_gy = "";
        $checkdn = $tvClass->checkLogged();
        if($checkdn == TRUE){
            $Tendangnhap_gy = $_SESSION['User'];
            $tv = $tvClass->hienthi1Thanhvien("'".$Tendangnhap_gy."'");
            $Hoten_gy = $tv['tv_ten'];
            $Email_gy = $tv['tv_email'];
            $Sodt_gy = $tv['tv_dienthoai'];
    ?>
    <div class="form-group">
    <label for="" class="col-sm-2 control-label">Tên đăng nhập</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="Tendangnhap_gy" name="Tendangnhap_gy" value="<?php echo $Tendangnhap_gy;?>" placeholder="Họ tên" readonly="true">
    </div>
  </div>
    <?php } ?>
   <div class="form-group">
    <label for="" class="col-sm-2 control-label">Họ tên</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="Hoten_gy" name="Hoten_gy" value="<?php echo $Hoten_gy;?>" placeholder="Họ tên">
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
        <input type="email" class="form-control" id="Email_gy" name="Email_gy" value="<?php echo $Email_gy;?>" placeholder="Email" required="true">
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-sm-2 control-label">Số điện thoại</label>
    <div class="col-sm-10">
        <input type="tel" class="form-control" id="Sodt_gy" name="Sodt_gy" value="<?php echo $Sodt_gy;?>" placeholder="Số điện thoại">
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-sm-2 control-label">Tiêu đề</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Tieude_gy" name="Tieude_gy" placeholder="Tiêu đề bài viết" " size="50">
    </div>
  </div>
 
   <div class="form-group">
    <label for="" class="col-sm-2 control-label">Nội dung</label>
    <div class="col-sm-10">
      <textarea cols="50" rows="10" class="form-control" id="Noidung_gy" name="Noidung_gy" value="<?php echo $Noidung_gy ?>"placeholder="Nội dung"></textarea>
    </div>
  </div>
    <div class="form-group">
    <label for="" class="col-sm-2 control-label">Ngày góp ý</label>
    <div class="col-sm-10">
        <input type="date" class="form-control" id="Ngay_gy" name="Ngay_gy" value="<?php $date=date("Y-m-d");echo $date; ?>" readonly="true">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" id="subgopy" name="subgopy" class="btn btn-primary" value="Đăng góp ý"/>
    </div>
  </div>
</form>

</div>
<?php
    //xử lý đăng góp ý
    if(isset($_POST['subgopy'])){
        $tv_tendangnhap = $Tendangnhap_gy;
        $gy_hoten = $_POST['Hoten_gy'];
        $gy_email = $_POST['Email_gy'];
        $gy_dienthoai = $_POST['Sodt_gy'];
        $gy_tieude = $_POST['Tieude_gy'];
        $gy_noidung = $_POST['Noidung_gy'];
        $gy_ngaygopy = $_POST['Ngay_gy'];
        $gyClass = new Gopy();
        if($gy_hoten!=""&&$gy_email!=""&&$gy_dienthoai!=""&&$gy_tieude!=""&&$gy_noidung!=""&&$gy_ngaygopy!=""){
            $gyClass->themGopy($tv_tendangnhap, $gy_hoten, $gy_email, $gy_dienthoai, $gy_tieude, $gy_noidung, $gy_ngaygopy);
            echo "<script>alert('Đã gửi góp ý của bạn cho quản trị!')</script>";
        } else{
            echo "<script>alert('Các trường không được rỗng!')</script>";
        }
    }
    
?>