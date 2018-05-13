<div class="page-header" style="margin-left: 20px; ">
    <h1>Các sản phẩm mới <small><a href="?page=sanpham&action=index">Xem toàn bộ sản phẩm</a></small></h1>
</div>
<div class="home-block">
    
    <div class="container">
        <div class="home-block-main">



            <?php
            $spClass = new Sanpham();
            $sotrang = 1;
            $dieukien = " ORDER BY sp_ma DESC";
            if ($spClass->countDSSP($dieukien) < 1) {
                ?>
                <p>Không có sản phẩm để hiển thị</p>
                <?php
            } else {
                $spResult = $spClass->hienthiDSSPPhantrang($dieukien, $sotrang, 8);
                while ($row = mysqli_fetch_array($spResult, MYSQLI_ASSOC)) {
                    ?>

                    <div class="col-md-3 home-grid">
                        <div class="home-product-main">
                            <div class="home-product-top">
                                <img src="<?php
                                $spHinh = $spClass->getHinhSPByID($row['sp_ma']);
                                echo mysqli_fetch_array($spHinh)['hsp_tentaptin'];
                                ?>" width="245px" />
                            </div>
                            <div class="home-product-bottom">
                                <h3><a href="?page=sanpham&action=chitietsanpham&masp=<?php echo $row['sp_ma']; ?>"><?php echo $tensp = (strlen($row['sp_ten']) <= 20) ? $row['sp_ten'] : substr($row['sp_ten'], 0, 17) . "..."; ?></a></h3>
                                <p><?php echo number_format($row['sp_gia'], 0, ',', '.'); ?>đ</p>	
                            </div>
                            <div class="srch">
                                <form name="frmDathang" method="POST">
                                    <span>
                                        <input type="hidden" id="txtMasp" name="txtMasp" value="<?php echo $row['sp_ma']; ?>"/>
                                        <input type="submit" name="btnDathang" id="btnDathang" class="buttonlink" value="Đặt hàng"/>
                                    </span>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php }
            }
            ?>




            <div class="clearfix"> </div>
        </div>
    </div>
</div>
