<?php
    $tvClass = new Thanhvien();
    $tvClass->checkLoggedGoLogin();
?>
<?php
    $dh_ma = $_GET['madh'];
    $giohangClass = new Giohang();
?>
<div class="panel panel-success" style="width: 70%; margin: 0 auto">
    <div class="panel-heading">Hóa đơn</div>
    <div class="panel-body">
        <?php
        //show bill
        $dh = $giohangClass->hienthi1Donhang($dh_ma);
        ?>
        <div class="row">
            <div class="col-md-3"><b>Mã hóa đơn: </b></div>
            <div class="col-md-3"><?php echo $dh['dh_ma']; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3">Tài khoản đặt hàng: </div>
            <div class="col-md-3"><?php echo $dh['tv_tendangnhap']; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3">Ngày đặt: </div>
            <div class="col-md-3"><?php echo $dh['dh_ngaylap']; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3">Trạng thái: </div>
            <div class="col-md-3"><?php echo $dh['dh_trangthai']; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3"><b>Tên người nhận: </b></div>
            <div class="col-md-3"><?php echo $dh['dh_tennguoinhan']; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3"><b>Địa chỉ nhận: </b></div>
            <div class="col-md-3"><?php echo $dh['dh_noigiao']; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3"><b>Điện thoại: </b></div>
            <div class="col-md-3"><?php echo $dh['dh_dt']; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3">Ghi chú: </div>
            <div class="col-md-3"><?php echo $dh['dh_ghichu']; ?></div>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
            <?php
            //show chi tiet don hang
            $spClass = new Sanpham();
            $tongtien = 0;
            $resultctdh = $giohangClass->hienthiChitietdonhang($dh_ma);
            while ($rowctdh = mysqli_fetch_array($resultctdh)) {
                ?>
                <tr>
                    <td><?php echo $spClass->getTenspByMaSP($rowctdh['sp_ma']); ?></td>
                    <td><?php echo $rowctdh['ctdh_soluong']; ?></td>
                    <td><?php echo number_format($rowctdh['ctdh_dongia'], 0, ',', '.'); ?>đ</td>
                    <td><?php echo number_format($giohangClass->thanhtiensp($rowctdh['ctdh_soluong'], $rowctdh['ctdh_dongia']), 0, ',', '.'); ?>đ</td>
                </tr>
                <?php $tongtien += $giohangClass->thanhtiensp($rowctdh['ctdh_soluong'], $rowctdh['ctdh_dongia']);
            } ?>
        </table>
        <h3 style="text-align: right;">
            Tổng tiền: <?php echo number_format($tongtien, 0, ',', '.'); ?>VNĐ</span></li>
        </h3>
        <form name="frmCancelBill" method="POST"  action="?page=thanhvien&action=chitietdonhang&madh=<?php echo $dh['dh_ma']; ?>">
            <?php
                $trangthaidh =$giohangClass->getTrangthaiByMaDh($dh['dh_ma']);
                if($trangthaidh=="xuly"){?>
                <input type="hidden" id="txtMadh" name="txtMadh" value="<?php echo $dh['dh_ma']; ?>"/>
                <input type="submit" name="btnCancelBill" id="btnCancelBill" class="btn btn-danger" value="Cancel"/>
            <?php } ?>
        </form>
                
    </div>
</div>