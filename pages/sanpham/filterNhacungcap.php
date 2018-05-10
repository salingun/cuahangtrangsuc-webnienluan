<?php require_once '../../classes/myClass.php';?>
<?php
    if ($_POST['brandss']) {
        if (isset($_GET['sotrang'])){
            $sotrang = $_GET['sotrang'];
        } else {
            $sotrang = 1;
        }
    //unserialize to jquery serialize variable value
    $brandis = array();

    parse_str($_POST['brandss'], $brandis); //changing string into array 
    //split 1st array elements
    foreach ($brandis as $ids) {
        $ids;
    }
    $brandii = implode("','", $ids); //change into comma separated value to sub array
    $spClass = new Sanpham();
    $spResult = $spClass->hienthiDSSP(" WHERE ncc_ma IN ('$brandii')");
    while ($row = mysqli_fetch_array($spResult)) {
        ?>
        <div class="col-md-4 home-grid">
            <div class="home-product-main">
                <div class="home-product-top">
                    <img src="<?php $spHinh = $spClass->getHinhSPByID($row['sp_ma']); echo mysqli_fetch_array($spHinh)['hsp_tentaptin']; ?>" width="245px" />
                </div>
                <div class="home-product-bottom">
                    <h3><a href="?page=sanpham&action=chitietsanpham&masp=<?php echo $row['sp_ma'];?>"><?php echo $tensp = (strlen($row['sp_ten']) <= 20) ? $row['sp_ten'] : substr($row['sp_ten'], 0, 17) . "..."; ?></a></h3>
                    <p><?php echo $row['sp_gia']; ?></p>						
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
        <?php
    }
}
?>




<div class="clearfix"> </div>