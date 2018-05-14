<div id="result" class="col-md-9 product-block">
    <?php
    $spClass = new Sanpham();
    if (!empty($_GET['searchkey'])) {
        $searchkey = $_GET['searchkey'];
        $dieukien = " WHERE sp_ten LIKE '%".$searchkey."%'";
    } else {
        $dieukien = "";
    }
    if (!empty($_GET['cate'])) {
        $dieukien = " WHERE lsp_ma = " . $_GET['cate'];
    } else {
        $dieukien = "";
    }
    if (isset($_GET['sotrang'])){
        $sotrang = $_GET['sotrang'];
    } else {
        $sotrang = 1;
    }
    
    if($spClass->countDSSP($dieukien)<1){?>
    <p>Không có sản phẩm để hiển thị</p>
    <?php } else{
        $spResult = $spClass->hienthiDSSPPhantrang($dieukien, $sotrang,12);
        while ($row = mysqli_fetch_array($spResult, MYSQLI_ASSOC)) {
        ?>

        <div class="col-md-4 home-grid">
            <div class="home-product-main">
                <div class="home-product-top">
                    <img src="product-imgs/<?php
                    $spHinh = $spClass->getHinhSPByID($row['sp_ma']);
                    echo mysqli_fetch_array($spHinh)['hsp_tentaptin'];
                    ?>" width="245px" />
                </div>
                <div class="home-product-bottom">
                    <h3><a href="?page=sanpham&action=chitietsanpham&masp=<?php echo $row['sp_ma'];?>"><?php echo $tensp = (strlen($row['sp_ten']) <= 20) ? $row['sp_ten'] : substr($row['sp_ten'], 0, 17) . "..."; ?></a></h3>
                    <p><?php echo number_format($row['sp_gia'],0,',','.') ; ?>đ</p>	
                </div>
                <div class="srch">
                    <form name="frmDathang" method="POST">
                        <span>
                            <input type="hidden" id="txtMasp" name="txtMasp" value="<?php echo $row['sp_ma']; ?>"/>
                            <input type="submit" name="btnDathang" id="btnDathang" class="buttonlink" value="Thêm vào giỏ"/>
                        </span>
                    </form>
                </div>
            </div>
        </div>
        <?php }} ?>
    
    <div class="clearfix"> </div>
    
    <?php
    //phân trang
        $counttrang = $spClass->countSotrangSP($dieukien);
        $searchkey = null;
        if(isset($_GET['searchkey'])){
            $searchkey = $_GET['searchkey'];
        }
        $cate = null;
        if(isset($_GET['cate'])){
            $cate = $_GET['cate'];
        }
    ?>
    <ul class="pagination">
        <?php if($sotrang>1){?>
            <li><a href="<?php echo $spClass->linkPhantrang($searchkey,$cate, $sotrang-1);?>">&laquo;</a></li>
        <?php } ?>
        <?php for($trang=1;$trang<=$counttrang;$trang++){?>
            <li <?php if($trang==$sotrang){echo 'class="active"';} ?>>
                <a href="<?php echo $spClass->linkPhantrang($searchkey,$cate, $trang);?>"><?php echo $trang; ?></a>
            </li>
        <?php } ?>
        <?php if($sotrang<$counttrang){ ?>
            <li><a href="<?php echo $spClass->linkPhantrang($searchkey,$cate, $sotrang+1);?>">&raquo;</a></li>
        <?php } ?>
    </ul>
</div>
<div id="getdata" class="col-md-9 product-block"></div>
