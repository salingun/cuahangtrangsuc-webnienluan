
<div class="header">
    <div class="container">
        <div class="header-main">
            <div class="top-nav">
                <div class="content white">
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class="navbar-brand logo">
                                <a href="index.php"><img src="images/logo1.png" alt=""></a>
                            </div>
                        </div>
                        <!--/.navbar-header-->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a href="index.php">Home</a></li>
                                <li class="dropdown">
                                    <a href="?page=sanpham&action=index" class="dropdown-toggle" data-toggle="dropdown">Sản phẩm <b class="caret"></b></a>
                                    <ul class="dropdown-menu multi-column columns-2">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <ul class="multi-column-dropdown">
                                                    <li><a href="?page=sanpham&action=index">Tất cả</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-4">
                                                <ul class="multi-column-dropdown">
                                                    <?php 
                                                        $loaispClass = new Loaisanpham();
                                                        $resultlsp = $loaispClass->hienthiDSLoaiSP("");
                                                        while ($rowlsp = mysqli_fetch_array($resultlsp)) {
                                                    ?>
                                                        <li><a href="?page=sanpham&action=index&cate=<?php echo $rowlsp['lsp_ma'];?>"><?php echo $rowlsp['lsp_ten'];?></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                                <li><a href="contact.php">Liên hệ</a></li>
                                <li><a href="about.php">Giới thiệu</a></li>
                            </ul>
                        </div>
                        <!--/.navbar-collapse-->
                    </nav>
                    <!--/.navbar-->
                </div>
            </div>
            <div class="header-right">
                <div class="search">
                    <div class="search-text">
                        <input class="serch" type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {
                                this.value = 'Search';
                            }"/>
                    </div>
                    <div class="cart box_1">
                        <h5>
                            <a href="?page=giohang&action=giohang1">
                                <img src="images/cart.png" alt=""/><span>Giỏ hàng</span>
                            </a>
                            <p><?php $giohangClass = new Giohang(); echo $giohangClass->countGiohang(); ?> sản phẩm</p>
                        </h5>
                    </div>    
                    <div class="head-signin">
                        <h5>
                            <?php
                                $tvClass = new Thanhvien();
                                $codechuadn = '<a href="?page=thanhvien&action=dangnhap"><i class="hd-dign"></i>Sign in</a>';
                                $codedadn = '<div class="btn-group">
                                                    <button type="button" class="buttonlink dropdown-toggle" data-toggle="dropdown">
                                                    <span class="glyphicon glyphicon-user"></span>
                                                     '.$_SESSION['User'].'
                                                      <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                      <li><a href="?page=thanhvien&action=donhang">Lịch sử mua hàng</a></li>
                                                      <li><a href="?page=thanhvien&action=suathongtin">Sửa thông tin</a></li>
                                                      <li><a href="?page=thanhvien&action=logout">Đăng xuất</a></li>
                                                    </ul>
                                                  </div>';
                                echo $tvClass->getLoggedCode($codechuadn, $codedadn);
                            ?>
                        </h5>
                    </div>              
                    <div class="clearfix"> </div>					
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>

</div>
