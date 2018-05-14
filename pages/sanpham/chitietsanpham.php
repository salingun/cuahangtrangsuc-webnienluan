
<?php
    $masp = $_GET['masp'];
    $spClass = new Sanpham()
;?>
<!--single start here-->
<div class="single">
   <div class="container">
   	 <div class="single-main">
   	 	<div class="single-top-main">
	   		<div class="col-md-5 single-top">	
			   <div class="flexslider">
				  <ul class="slides">
                                    <?php 
                                        $hinhResult = $spClass->getHinhSPByID($masp);
                                        while($rowhinh = mysqli_fetch_array($hinhResult)){
                                    ?>
                                        <li data-thumb="<?php echo $rowhinh['hsp_tentaptin'];?>">
                                            <div class="thumb-image"> <img src="product-imgs/<?php echo $rowhinh['hsp_tentaptin'];?>" data-imagezoom="true" class="img-responsive"> </div>
                                        </li>
                                    <?php } ?>
				  </ul>
                            </div>
			</div>
			<div class="col-md-7 single-top-left simpleCart_shelfItem">
                            <?php
                                $rowctsp = $spClass->hienthi1SP($masp);
                            ?>
				<h1><?php echo $rowctsp['sp_ten'];?></h1>
                                <h2>Danh mục: <?php echo $spClass->getTenLoaiByIdSP($masp);?></h2>
                                <h2>Nhà cung cấp: <?php echo $spClass->getTenNccByIdSP($masp);?></h2>
                                <h6 class="item_price"><?php echo number_format($rowctsp['sp_gia'], 0, ',','.') ;?> VNĐ</h6>			
				<p><?php echo $rowctsp['sp_mota_ngan'];?></p>
				<h4>Số lượng trong kho: <?php echo $rowctsp['sp_soluong'];?></h4>
				<ul class="bann-btns">
                                    <form name="frmDathang" method="POST">
                                        <li>
                                            <input type="hidden" id="txtMasp" name="txtMasp" value="<?php echo $row['sp_ma']; ?>"/>
                                            <input type="number" style="width: 3em" id="txtSoluong" name="txtSoluong" value="" />
                                        </li>
                                        <li><input type="submit" name="btnDathang" id="btnDathang" class="btn btn-success" value="Thêm vào giỏ"/></li>				
                                    </form>
                                </ul>
                        </div>
		   <div class="clearfix"> </div>
	   </div>
	   <div class="singlepage-product">
                <?php echo $rowctsp['sp_mota_chitiet']; ?>	 
                <div class="clearfix"> </div>
	   </div>
   	 </div>
   </div>
</div>
<!--single end here-->