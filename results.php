<!DOCTYPE>
<?php
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
			<a href="index.php"><img id="logo" src="images/logo.png"/>
			<img id="banner" src="images/logo.png"/>
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
				<li><a href="#">Tablets</a></li>-->
				<!-- Here we go on dynamically-->
				<?php getCats();?>
			</ul>


			<div id="sidebar_title">Brands</div>
			<ul id="cats">
				<!-- Here we go on dynamically-->
				<?php getBrands();?>
			</ul>
		</div>
		<div id="content_area">
			<div id="Shopping_cart">
				<span style="float: right;font-size: 18px;padding: 5px;line-height: 40px;">Welcome Guest! <b style="color: yellow">Shopping Cart -</b>Total Items: Total Price: <a href="cart.php" style="color: yellow">Go to Cart</a>
				</span>
			</div>
			

			<div id="products_box">
		<?php
			if(isset($_GET['search'])){
				$search_query=$_GET['user_query'];

			$get_pro="select * from products where product_keywords like '%$search_query%'";
			$run_pro=mysqli_query($con,$get_pro);
			while ($row_pro=mysqli_fetch_array($run_pro)) {
		$pro_id=$row_pro['product_id'];
		$pro_cat=$row_pro['product_cat'];
		$pro_brand=$row_pro['product_brand'];
		$pro_title=$row_pro['product_title'];
		$pro_price=$row_pro['product_price'];
		$pro_image=$row_pro['product_image'];
		echo 
		"<div id='single_product'>
		<h3>$pro_title</h3>
		<center><img src='admin_area/product_images/$pro_image' width='220' height='160'style='margin-top:5px'/>
		<p style='margin-top:5px'><b> ???$pro_price </b></p>

		<a href='details.php?pro_id= $pro_id' style='float:left;padding-left:25px;margin-top:10px'>Details</a>

		<a href='index.php?pro_id= $pro_id'><button style='float:right;margin-right:27px;margin-top:10px'>Add to Cart</button></a></center>
		</div>";
	}
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