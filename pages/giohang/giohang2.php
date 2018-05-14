<?php
    $tvClass = new Thanhvien();
    $tvClass->checkLoggedGoLogin();
?>

<?php
//phần xử lý vào CSDL
if (isset($_POST['subdathang'])) {
    $giohangClass = new Giohang();
    $dh_ma = $giohangClass->getMadhtutang();
    $_SESSION['dh_ma'] = $dh_ma;
    $ngaylap = $_POST['dateNgaydathang'];
    $tennguoinhan = $_POST['txtTenkh'];
    $noigiao = $_POST['txtDiachi'];
    $dt = $_POST['txtSodt'];
    $ghichu = $_POST['txtGhichu'];
    $trangthai = "xuly";
    $httt_ma = $_POST['cbHttt'];
    $tendangnhap = $_SESSION['User'];
//them vao bang don hang
    $giohangClass->themDonhang($ngaylap, $tennguoinhan, $noigiao, $dt, $ghichu, $trangthai, $httt_ma, $tendangnhap);
//them vao bang chi tiet don hang
    $spClass = new Sanpham();
    $dieukien = "";
    $spResult = $spClass->hienthiDSSP($dieukien);
    while ($row = mysqli_fetch_array($spResult, MYSQLI_ASSOC)) {
        if (isset($_SESSION["'" . $row['sp_ma'] . "'"])) {
            $giohangClass->themChitietdonhang($dh_ma, $row['sp_ma'], $_SESSION["'" . $row['sp_ma'] . "'"], $row['sp_gia']);
            //sua so luong trong bang san pham
            $giohangClass->suaSoluongSanpham($row['sp_ma'], $_SESSION["'" . $row['sp_ma'] . "'"]);
            unset($_SESSION["'" . $row['sp_ma'] . "'"]);
        }
    }
    echo '<meta http-equiv="refresh" content="0;URL=?page=giohang&action=giohang3">';
}
?>
<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">Thông tin đặt hàng</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST">
            <?php
            $tvClass = new Thanhvien();
            $tendangnhap = $_SESSION['User'];
            $tv = $tvClass->hienthi1Thanhvien("'" . $tendangnhap . "'");
            ?>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Tài khoản:</label>
                <div class="col-xs-3">
                    <input type="text" class="form-control" id="txtTaikhoan" name="txtTaikhoan" value="<?php echo $tv['tv_tendangnhap']; ?>" readonly=readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Tên người nhận*:</label>
                <div class="col-xs-3">
                    <input type="text" class="form-control" id="txtTenkh" name="txtTenkh" value="<?php echo $tv['tv_ten']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Số điện thoại*:</label>
                <div class="col-xs-3">
                    <input type="text" class="form-control" id="txtSodt" name="txtSodt" value="<?php echo $tv['tv_dienthoai']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Địa chỉ nhận hàng*:</label>
                <div class="col-xs-5">
                    <textarea class="form-control" id="txtDiachi" name="txtDiachi"><?php echo $tv['tv_diachi']; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Hình thức thanh toán:</label>
                <div class="col-xs-3">
                    <select name="cbHttt" id="cbHttt" class="form-control">
                        <?php
                        $giohangClass = new Giohang();
                        $result = $giohangClass->hienthiDSHttt();
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<option value="' . $row['httt_ma'] . '">' . $row['httt_ten'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Ngày đặt hàng:</label>
                <div class="col-xs-3">
                    <input type="date" readonly="true" class="form-control" id="dateNgaydathang" name="dateNgaydathang" value="<?php $date = date("Y-m-d");
                        echo $date; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Ghi chú:</label>
                <div class="col-xs-5">
                    <textarea class="form-control" id="txtGhichu" name="txtGhichu"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label"></label>
                <div class="col-xs-6">
                    <input type="submit" class="btn btn-success" id="subdathang" name="subdathang" value="Đặt hàng">
                    <input type="button" class="btn btn-default" id="subhuy" name="subhuy" value="Hủy bỏ"
                    onclick="window.location='?page=giohang&action=giohang1'" />
                </div>
            </div>

        </form>
    </div>
</div>