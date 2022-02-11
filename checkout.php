<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");
?>
<html>
<head>
	<title>My Online Shop</title>
	<link rel="stylesheet" href ="styles/style.css" media ="all"/> 
</head>
<body>
	<!-- Main Container starts here-->
	<div class="main_wrapper">
		<!-- Header starts here-->
		<div class="header_wrapper">
			<a href="index.php"><img id="logo" src="images/logo.jpg"/>
			<img id="banner" src="images/ad_banner.jpg"/>
		</div>
	<!-- Header ends here-->
	<!-- Navigation bar starts here-->
	<div class="menubar">
		<ul id="menu">
			<li><a href="index.php">Home</a></li>
			<li><a href="all_products.php"> All Products</a></li>
			<li><a href="customer/my_account.php"> My Account</a></li>
			<li><a href="#"> Sign up</a></li>
			<li><a href="cart.php">Shopping cart</a></li>
			<li><a href="#"> Contact us</a></li>
		</ul>
		<div id="form">
			<form method="get" action="results.php"enctype="multipart/form-data">
				 <input type="text" name="user_query" placeholder="Search a Product" />
				 <input type="submit" name="search" value="Search"/>
			</form>

		</div>
	</div>
	<!-- Navigation bar ends here-->
	<!-- Content wrapper starts here-->
	<div class="content_wrapper">
		<div id="sidebar">
			<div id="sidebar_title">Categories</div>
			<ul id="cats">
				<!--<li><a href="#">Laptops</a></li>
				<li><a href="#">Computers</a></li>
				<li><a href="#">Mobiles</a></li>
				<li><a href="#">Cameras</a></li>
				<li><a href="#">iPads</a></li> 
				<li><a href="#">Dell</a></li>
				<li><a href="#">Motorola</a></li>
				<li><a href="#">Sony Eracson</a></li>
				<li><a href="#">LG</a></li>
				<li><a href="#">Apple</a></li>-->
				<!-- Here we go on dynamically-->
				<?php getCats();?>
			</ul>
			<div id="sidebar_title">Brands</div>
			<ul id="cats">
				<!--<li><a href="#">Laptops</a></li>
				<li><a href="#">Computers</a></li>
				<li><a href="#">Mobiles</a></li>
				<li><a href="#">Cameras</a></li>
				<li><a href="#">iPads</a></li> 
				<li><a href="#">Dell</a></li>
				<li><a href="#">Motorola</a></li>
				<li><a href="#">Sony Eracson</a></li>
				<li><a href="#">LG</a></li>
				<li><a href="#">Apple</a></li>-->
				<!-- Here we go on dynamically-->
				<?php getBrands();?>
			</ul>
		</div>
		<div id="content_area">

			<?php cart();?>
			
			<div id="Shopping_cart">
				<span style="float: right;font-size: 17px;padding: 5px;line-height: 40px;">
					<?php
					if(isset($_SESSION['customer_email'])){
						echo "<b>Welcome:</b>". $_SESSION['customer_email']."<b style='color:yellow;'></b>";
					}
					else
					{
						echo "<b>Welcome Guest:</b>";
					}
					?><b style="color: yellow">Shopping Cart -</b>Total Items: <?php total_items(); ?> Total Price: <?php  total_price(); ?> <a href="cart.php" style="color: yellow">Go to Cart</a>
				</span>
			</div>

			<div id="products_box">
				<?php
				if(!isset($_SESSION['customer_email'])){
					include("customer_login.php");

				}
				else{
					include("payment.php");
				}
				?>
			</div>
		</div>
		</div>
		<!-- Content wrapper ends here--> 
		<div id="footer">
			<h2 style="text-align: center;padding-top: 30px;">&copy;2020 by Chaos Bros</h2>

		</div>
		
	</div>
		<!-- Main Container ends here-->
</body>
</html>