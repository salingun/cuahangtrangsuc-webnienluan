<?php
    $tvClass = new Thanhvien();
    $tvClass->checkLoggedGoLogin();
?>
<?php
$tvClass = new Thanhvien();
$tendangnhap = $_SESSION['User'];
$r = $tvClass->hienthi1Thanhvien("'" . $tendangnhap . "'");
?>
<div class="panel panel-success" style="width: 80%; margin: 0 auto">
    <div class="panel-heading">Sửa thông tin</div>
    <div class="panel-body">
        <div id="" align="center">
            <form name="frm-suathongtin" id="frm-suathongtin" class="form-horizontal" action="" method="POST">
                <div class="form-group">
                    <label for="inputText3" class="col-sm-3 control-label">Tên đăng nhập</label>
                    <div class="col-xs-3">
                        <input type="text" id="txtTendangnhap" name="txtTendangnhap" class="form-control" readonly="readonly" value="<?php echo $r['tv_tendangnhap']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputText3" class="col-sm-3 control-label">Tên thành viên</label>
                    <div class="col-xs-3">
                        <input type="text" id="txtTen" name="txtTen" class="form-control" value="<?php echo $r['tv_ten']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputText3" class="col-sm-3 control-label">CMND/Hộ chiếu</label>
                    <div class="col-xs-3">
                        <input type="text" id="txtCMND" name="txtCMND" class="form-control" value="<?php echo $r['tv_cmnd']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputText3" class="col-sm-3 control-label">Điện thoại</label>
                    <div class="col-xs-3">
                        <input type="text" id="txtDienthoai" name="txtDienthoai" class="form-control" value="<?php echo $r['tv_dienthoai']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputText3" class="col-sm-3 control-label">Email</label>
                    <div class="col-xs-3">
                        <input type="text" id="txtEmail" name="txtEmail" class="form-control" value="<?php echo $r['tv_email']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNumber3" class="col-sm-3 control-label">Địa chỉ</label>
                    <div class="col-xs-3">
                        <input type="text" id="txtDiachi" name="txtDiachi" class="form-control" value="<?php echo $r['tv_diachi']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNumber3" class="col-sm-3 control-label">Giới tính</label>
                    <div class="col-xs-3">
                        <select id="txtGioitinh" name="txtGioitinh" class="form-control">
                            <option value="nam" <?php echo $r['tv_gioitinh'] == "nam" ? "selected" : "" ?>>Nam</option>
                            <option value="nu" <?php echo $r['tv_gioitinh'] == "nu" ? "selected" : "" ?>>Nữ</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNumber3" class="col-sm-3 control-label">Sinh nhật</label>
                    <div class="col-xs-3">
                        <input type="date" id="txtSinhnhat" name="txtSinhnhat" class="form-control" value="<?php echo date('Y-m-d', strtotime($r['tv_sinhnhat'])); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputTexr3" class="col-sm-3 control-label"></label>
                    <div class="col-xs-3">
                        <input type="submit" name="subsuatt" id="subsuatt" class="btn btn-primary" value="Cập nhật"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="panel panel-success" style="width: 80%; margin: 0 auto">
    <div class="panel-heading">Đổi mật khẩu</div>
    <div class="panel-body">
        <div id="" align="center">
            <form name="frm-doimatkhau" id="frm-doimatkhau" class="form-horizontal" action="" method="POST">
                <div class="form-group">
                    <label for="inputText3" class="col-sm-3 control-label">Mật khẩu hiện tại</label>
                    <div class="col-xs-3">
                        <input type="password" id="txtPasscu" name="txtPasscu" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputText3" class="col-sm-3 control-label">Mật khẩu mới</label>
                    <div class="col-xs-3">
                        <input type="password" id="txtPassmoi1" name="txtPassmoi1" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputText3" class="col-sm-3 control-label">Nhập lại mật khẩu mới</label>
                    <div class="col-xs-3">
                        <input type="password" id="txtPassmoi2" name="txtPassmoi2" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputTexr3" class="col-sm-3 control-label"></label>
                    <div class="col-xs-3">
                        <input type="submit" name="subdoimk" id="subdoimk" class="btn btn-primary" value="Cập nhật"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    //xử lý sửa thông tin
    if(isset($_POST['subsuatt'])){
        $tendangnhap = $_SESSION['User'];
        $ten = $_POST['txtTen'];
        $gioitinh = $_POST['txtGioitinh'];
        $diachi = $_POST['txtDiachi'];
        $dienthoai = $_POST['txtDienthoai'];
        $email = $_POST['txtEmail'];
        $sinhnhat = $_POST['txtSinhnhat'];
        $cmnd = $_POST['txtCMND'];
        
        if($ten!=""&&$gioitinh!=""&&$diachi!=""&&$dienthoai!=""&&$email!=""&&$sinhnhat!=""&&$cmnd!=""){
            $tvClass->capnhatThongtinTv($tendangnhap, $ten, $gioitinh, $diachi, $dienthoai, $email, $sinhnhat, $cmnd);
            echo "<script>alert('Đã sửa thông tin!')</script>";
        }else{
            echo "<script>alert('Các trường không được rỗng!')</script>";
        }
    }
    
    //xử lý đổi pass
    if(isset($_POST['subdoimk'])){
        $tendangnhap = $_SESSION['User'];
        $passcu = md5($_POST['txtPasscu']);
        $passmoi1 = md5($_POST['txtPassmoi1']);
        $passmoi2 = md5($_POST['txtPassmoi2']);
        
        if($passmoi1==$passmoi2){
            $check = $tvClass->checkUserPass($tendangnhap, $passcu);
            if($check == TRUE){
                $tvClass->capnhatPassword($tendangnhap, $passcu, $passmoi1);
                echo "<script>alert('Đã đổi password!')</script>";
                $thisurl="?page=thanhvien&action=suathongtin";
                echo '<meta http-equiv="refresh" content="0;URL='.$thisurl.'">';
            } else{
                echo "<script>alert('Mật khẩu hiện tại không chính xác!')</script>";
            }
        }else{
            echo "<script>alert('Mật khẩu mới và nhập lại mật khẩu không giống!')</script>";
        }
    }
?>

