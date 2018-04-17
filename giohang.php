<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Shoplist A Ecommerce Category Flat Bootstrap Responsive  Website Template | Checkout :: w3layouts</title>
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
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
<!-- //end-smoth-scrolling -->
<script src="js/simpleCart.min.js"> </script>
<script src="js/bootstrap.min.js"></script>
</head>
<body>
<!--header strat here-->
<?php
	include_once("header.html");
?>
<!--header end here-->
<!--start-ckeckout-->
	<div class="ckeckout">
		<div class="container">
			<div class="ckeckout-top">
			<div class=" cart-items heading">
			 <h1>My Shopping Bag (3)</h1>
				<script>$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cart-header').fadeOut('slow', function(c){
							$('.cart-header').remove();
						});
						});	  
					});
			   </script>
			<script>$(document).ready(function(c) {
					$('.close2').on('click', function(c){
						$('.cart-header1').fadeOut('slow', function(c){
							$('.cart-header1').remove();
						});
						});	  
					});
			   </script>
			   <script>$(document).ready(function(c) {
					$('.close3').on('click', function(c){
						$('.cart-header2').fadeOut('slow', function(c){
							$('.cart-header2').remove();
						});
						});	  
					});
			   </script>
				
			<div class="in-check" >
				<ul class="unit">
					<li><span>Item</span></li>
					<li><span>Product Name</span></li>		
					<li><span>Unit Price</span></li>
					<li><span>Delivery Details</span></li>
					<li> </li>
					<div class="clearfix"> </div>
				</ul>
				<ul class="cart-header simpleCart_shelfItem">
					<div class="close1"> </div>
						<li class="ring-in"><a href="chitiet.php" ><img src="images/c.jpg" class="img-responsive" alt=""></a>
						</li>
						<li><span>Bracelets</span></li>
						<li><span class="item_price">$ 290.00</span></li>
						<li> <a href="#" class="add-cart cart-check item_add">Add to cart</a></li>				
					<div class="clearfix"> </div>
				</ul>
				<ul class=" cart-header1 simpleCart_shelfItem">
					<div class="close2"> </div>
						<li class="ring-in"><a href="chitiet.php" ><img src="images/c2.jpg" class="img-responsive" alt=""></a>
						</li>
						<li><span>Watches</span></li>
						<li><span class="item_price">$ 300.00</span></li>
						<li> <a href="#" class="add-cart cart-check item_add">Add to cart</a></li>						
						<div class="clearfix"> </div>
				</ul>
				<ul class="cart-header2 simpleCart_shelfItem">
					<div class="close3"> </div>
						<li class="ring-in"><a href="chitiet.php" ><img src="images/c3.jpg" class="img-responsive" alt=""></a>
						</li>
						<li><span>Handbag</span></li>
						<li><span class="item_price">$ 360.00</span></li>
						<li> <a href="#" class="add-cart cart-check item_add">Add to cart</a></li>						
						<div class="clearfix"> </div>
				</ul>
			</div>
			</div>  
		 </div>
		</div>
	</div>
<!--end-ckeckout-->
<!--footer strat here-->
<?php
	include_once("footer.html");
?>
<!--footer end here-->
</body>
</html>