<div class="col-md-9 product-block">
    <?php
    class ProductsClass {
        //put your code here

        function hienthiDSSP($conn, $dieukien) {
            if($dieukien==null){
                $sqlquery = "SELECT * FROM sanpham";
            } else {
                $sqlquery = "SELECT * FROM sanpham"." ".$dieukien;
            }
            $result = mysqli_query($conn, $sqlquery);
            return $result;
        }
    }
    $pClass = new ProductsClass();
    while ($row = mysqli_fetch_array($pClass->hienthiDSSP($conn, null))) {
        ?>

        <div class="col-md-4 home-grid">
            <div class="home-product-main">
                <div class="home-product-top">
                    <!--hinh ở đây-->
                </div>
                <div class="home-product-bottom">
                    <h3><a href="single.html"><?php echo $row['sp_ten'] ?></a></h3>
                    <p>Explore Now</p>						
                </div>
                <div class="srch">
                    <span><?php echo $row['sp_gia'] ?></span>
                </div>
            </div>
        </div>

    <?php } ?>
        <div class="col-md-4 home-grid">
            <div class="home-product-main">
                <div class="home-product-top">
                    <a href="single.html"><img src="images/h5.jpg" alt="" class="img-responsive zoom-img"></a>
                </div>
                <div class="home-product-bottom">
                    <h3><a href="single.html">Smart Shopping</a></h3>
                    <p>Explore Now</p>						
                </div>
                <div class="srch">
                    <span>$200</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 home-grid">
            <div class="home-product-main">
                <div class="home-product-top">
                    <a href="single.html"><img src="images/h6.jpg" alt="" class="img-responsive zoom-img"></a>
                </div>
                <div class="home-product-bottom">
                    <h3><a href="single.html">Smart Shopping</a></h3>
                    <p>Explore Now</p>						
                </div>
                <div class="srch">
                    <span>$200</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 home-grid">
            <div class="home-product-main">
                <div class="home-product-top">
                    <a href="single.html"><img src="images/h7.jpg" alt="" class="img-responsive zoom-img"></a>
                </div>
                <div class="home-product-bottom">
                    <h3><a href="single.html">Smart Shopping</a></h3>
                    <p>Explore Now</p>						
                </div>
                <div class="srch">
                    <span>$200</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 home-grid">
            <div class="home-product-main">
                <div class="home-product-top">
                    <a href="single.html"><img src="images/h8.jpg" alt="" class="img-responsive zoom-img"></a>
                </div>
                <div class="home-product-bottom">
                    <h3><a href="single.html">Smart Shopping</a></h3>
                    <p>Explore Now</p>						
                </div>
                <div class="srch">
                    <span>$200</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 home-grid">
            <div class="home-product-main">
                <div class="home-product-top">
                    <a href="single.html"><img src="images/h9.jpg" alt="" class="img-responsive zoom-img"></a>
                </div>
                <div class="home-product-bottom">
                    <h3><a href="single.html">Smart Shopping</a></h3>
                    <p>Explore Now</p>						
                </div>
                <div class="srch">
                    <span>$200</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 home-grid">
            <div class="home-product-main">
                <div class="home-product-top">
                    <a href="single.html"><img src="images/h10.jpg" alt="" class="img-responsive zoom-img"></a>
                </div>
                <div class="home-product-bottom">
                    <h3><a href="single.html">Smart Shopping</a></h3>
                    <p>Explore Now</p>						
                </div>
                <div class="srch">
                    <span>$200</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 home-grid">
            <div class="home-product-main">
                <div class="home-product-top">
                    <a href="single.html"><img src="images/h11.jpg" alt="" class="img-responsive zoom-img"></a>
                </div>
                <div class="home-product-bottom">
                    <h3><a href="single.html">Smart Shopping</a></h3>
                    <p>Explore Now</p>						
                </div>
                <div class="srch">
                    <span>$200</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 home-grid">
            <div class="home-product-main">
                <div class="home-product-top">
                    <a href="single.html"><img src="images/h12.jpg" alt="" class="img-responsive zoom-img"></a>
                </div>
                <div class="home-product-bottom">
                    <h3><a href="single.html">Smart Shopping</a></h3>
                    <p>Explore Now</p>						
                </div>
                <div class="srch">
                    <span>$200</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 home-grid">
            <div class="home-product-main">
                <div class="home-product-top">
                    <a href="single.html"><img src="images/h13.jpg" alt="" class="img-responsive zoom-img"></a>
                </div>
                <div class="home-product-bottom">
                    <h3><a href="single.html">Smart Shopping</a></h3>
                    <p>Explore Now</p>						
                </div>
                <div class="srch">
                    <span>$200</span>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>