<?php session_start(); ?>

<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
    <head>
        <title>Shoplist A Ecommerce Category Flat Bootstrap Responsive  Website Template | Home :: w3layouts</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-1.11.0.min.js"></script>
        <!-- Custom Theme files -->
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
        <!-- Custom Theme files -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Shoplist Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--Google Fonts-->
        <link href='//fonts.googleapis.com/css?family=Hind:400,500,300,600,700' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
        <!-- start-smoth-scrolling -->
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
                });
            });
        </script>
        <!-- //end-smoth-scrolling -->
        <script src="js/simpleCart.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!--flex slider-->
        <script defer src="js/jquery.flexslider.js"></script>
        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
        <script>
        // Can also be used with $(document).ready()
        $(window).load(function() {
          $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
          });
        });
        </script>
        <!--flex slider-->
        <script src="js/imagezoom.js"></script>
        <link href='css/mycss.css' rel='stylesheet' type='text/css' media="all">
    </head>
    <body>
        <?php
            require_once 'classes/myClass.php';
        ?>
        <!--header strat here-->
            <?php include_once 'pages/header.php' ?>
        <!--header end here-->
        
            <?php if (empty($_GET['page'])) {?>
                <!--banner strat here-->
                    <?php include 'pages/banner.php'?>
                <!--banner end here-->

                <!--block-layer2 start here-->
                    <?php include 'pages/blc-layer2.php' ?>
                <!--block-layer2 end here-->

                <!--block-layer1 start here-->
                    <?php include 'pages/blc-layer1.php' ?>
                <!--block-layer1 end here-->

                <!--home-block start here-->
                    <?php include 'pages/home-block.php' ?>
                <!--home block end here-->
            <?php } else { ?>
                <?php
                    if(empty($_GET['action'])){
                        $trang=$_GET['page'].".php";
                    }else{
                        $trang=$_GET['page']."/".$_GET['action'].".php";
                    }
                    include 'pages/'.$trang;
                ?>
            <?php } ?>
        <!--footer strat here-->
            <?php include_once 'pages/footer.php' ?>
        <!--footer end here-->

    <!-- các xử lý chung -->
        <?php
            //xử lý đặt hàng
            if(isset($_POST['btnDathang'])){
                $masp = $_POST['txtMasp'];
                $soluong = 1;
                if(isset($_POST['txtSoluong'])){
                    $soluong = $_POST['txtSoluong'];
                }
                $giohangClass = new Giohang();
                $giohangClass->dathang($masp, $soluong);
            }
            
            //xử lý nút cancel
            if(isset($_POST['btnCancelBill'])){
                $madh = $_POST['txtMadh'];
                $giohangClass->capnhatTrangthaiDh($madh, "cancel");
            }
        ?>
    <!--kết thúc các xử lý chung-->
    </body>
</html>