<div id="result" class="col-md-9 product-block">
    <?php
    $spClass = new Sanpham();
    $spResult = $spClass->hienthiDSSP("");
    while ($row = mysqli_fetch_array($spResult,MYSQLI_ASSOC)) {
    ?>
        
        <div class="col-md-4 home-grid">
            <div class="home-product-main">
                <div class="home-product-top">
                    <img src="<?php $spHinh=$spClass->getHinhSPByID($row['sp_ma']); echo mysqli_fetch_array($spHinh)['hsp_tentaptin']; ?>" width="245px" />
                </div>
                <div class="home-product-bottom">
                    <h3><a href="single.html"><?php echo $tensp=(strlen($row['sp_ten'])<=20)?$row['sp_ten']:substr($row['sp_ten'],0,17)."..."; ?></a></h3>
                    <p>Explore Now</p>						
                </div>
                <div class="srch">
                    <span><?php echo $row['sp_gia'] ?></span>
                </div>
            </div>
        </div>
        
    <?php } ?>
    
    <div class="clearfix"> </div>
</div>
<div id="getdata" class="col-md-9 product-block"></div>