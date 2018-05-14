<!--start-ckeckout-->
<div class="ckeckout">
    <div class="container">
        <div class="ckeckout-top">
            <div class=" cart-items heading">
                <h1>Giỏ hàng</h1>
                <form method="POST" name="frmGiohang" id="frmGiohang">
                    <div class="in-check" >
                        <ul class="unit">
                            <li><span>Hình ảnh</span></li>
                            <li><span>Sản phẩm</span></li>
                            <li><span>Số lượng</span></li>
                            <li><span>Đơn giá</span></li>
                            <li><span>Thành tiền</span></li>
                            <div class="clearfix"> </div>
                        </ul>
                        <?php
                        $giohangClass = new Giohang();
                        $spClass = new Sanpham();
                        $dieukien = "";
                        $spResult = $spClass->hienthiDSSP($dieukien);
                        $tongtien = 0;
                        while ($row = mysqli_fetch_array($spResult, MYSQLI_ASSOC)) {
                            if (isset($_SESSION["'" . $row['sp_ma'] . "'"])) {
                                ?>
                                <ul class="cart-header simpleCart_shelfItem">
                                    <li class="ring-in">
                                        <a href="single.html" >
                                            <img width="80px" src="<?php $spHinh = $spClass->getHinhSPByID($row['sp_ma']);
                        echo mysqli_fetch_array($spHinh)['hsp_tentaptin'];
                                ?>" class="img-responsive" alt="">
                                        </a>
                                    </li>
                                    <li><span><?php echo $row['sp_ten']; ?></span></li>
                                    <li>
                                        <span><?php $soluongxet=$_SESSION["'" . $row['sp_ma'] . "'"];
                                                if($soluongxet>$row['sp_soluong']){
                                                    echo "<script>alert('".$row['sp_ten']." chỉ tồn kho ".$row['sp_soluong']."');</script>";
                                                }
                                             ?>
                                            <input type="number" style="width:3em;" id="cnsl<?php echo $row['sp_ma']; ?>" name="cnsl<?php echo $row['sp_ma']; ?>" value="<?php echo $soluongxet; ?>"/>
                                        </span>
                                        SL tối đa có thể đặt: <?php echo $row['sp_soluong'] ?>
                                    </li>
                                    <li><span class="item_price"><?php echo number_format($row['sp_gia'], 0, ',', '.'); ?></span></li>
                                    <li><span class="item_price"><?php echo number_format($giohangClass->thanhtiensp($_SESSION["'" . $row['sp_ma'] . "'"], $row['sp_gia']), 0, ',', '.'); ?></span></li>
                                    <div class="clearfix"> </div>
                                </ul>
        <?php $tongtien += $giohangClass->thanhtiensp($_SESSION["'" . $row['sp_ma'] . "'"], $row['sp_gia']);
    }
} ?>
                        <h3 style="text-align: right;">
                            Tổng tiền: <?php echo number_format($tongtien, 0, ',', '.'); ?></span></li>
                        </h3>

                    </div>
                    <input type="submit" class="btn btn-primary" name="btnCapnhatgiohang" id="btnCapnhatgiohang" value="Cập nhật"/>
                </form>
            </div>
            <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2">
                    <a class="btn btn-success" href="?page=giohang&action=giohang2">Tiếp tục <span class="glyphicon glyphicon-play"></span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
//cập nhật số lượng giỏ hàng
if (isset($_POST['btnCapnhatgiohang'])) {
    $spClass = new Sanpham();
    $spResult = $spClass->hienthiDSSP("");
    while ($row = mysqli_fetch_array($spResult, MYSQLI_ASSOC)) {
        if (isset($_SESSION["'" . $row['sp_ma'] . "'"])) {
            $x = "cnsl" . $row['sp_ma'];
            $soluongmoi = $_POST[$x];
            $soluongcu = $_SESSION["'" . $row['sp_ma'] . "'"];
            $soluongkho = $row['sp_soluong'];

            $_SESSION["'" . $row['sp_ma'] . "'"] = $giohangClass->capnhatSoluong($soluongcu, $soluongmoi, $soluongkho);
            if ($_SESSION["'" . $row['sp_ma'] . "'"] <= 0) {
                unset($_SESSION["'" . $row['sp_ma'] . "'"]);
            }
            echo '<meta http-equiv="refresh" content="0;URL=?page=giohang&action=giohang1"/>';
        }
    }
    
}
?>
<!--end-ckeckout-->