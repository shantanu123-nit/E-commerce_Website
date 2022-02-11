<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");
?>
<html>
<head>
	<title>My Online Shop</title>
	<link rel="stylesheet" href ="styles2/style3.css" media ="all"/> 
</head>
<body>
	<!-- Main Container starts here-->
	<div class="main_wrapper">
		<!-- Header starts here-->
		<div class="header_wrapper">
			<a href="../index.php"><img id="logo" src="images/logo.jpg"/>
			<img id="banner" src="images/ad_banner.jpg"/>
		</div>
	<!-- Header ends here-->
	<!-- Navigation bar starts here-->
	<div class="menubar">
		<ul id="menu">
			<li><a href="../index.php">Home</a></li>
			<li><a href="../all_products.php"> All Products</a></li>
			<li><a href="../customer/my_account.php"> My Account</a></li>
			<li><a href="#"> Sign up</a></li>
			<li><a href="../cart.php">Shopping cart</a></li>
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
			<div id="sidebar_title">My Account</div>
			<ul id="cats">
				<?php
				$user=$_SESSION['customer_email'];
				$get_img="select * from customers where customer_email='$user'";
				$run_img=mysqli_query($con,$get_img);
				$row_img=mysqli_fetch_array($run_img);
				$c_image=$row_img['customer_image'];
				$c_name=$row_img['customer_name'];
				echo "<p><img src='customer_images/$c_image' width='150' height='150'/></p>";
				?>
				<li><a href="my_account.php?my_orders">My Orders</a></li>
				<li><a href="my_account.php?edit_account">Edit Account</a></li>
				<li><a href="my_account.php?change_pass">Change Password</a></li>
				<li><a href="my_account.php?delete_account">Delete Account</a></li>
				<li><a href="logout.php">Logout</a></li>


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
			</ul>
			</div>
		<div id="content_area">

			<?php cart();?>
			
			<div id="Shopping_cart">
				<span style="float: right;font-size: 16px;padding: 5px;line-height: 40px;">
					<?php
					if(isset($_SESSION['customer_email'])){
						echo "<b>Welcome:</b>". $_SESSION['customer_email'];
					}
					?>


					<?php
						if(!isset($_SESSION['customer_email'])){
							echo "<a href='checkout.php' style='color:orange;'>Login</a>";

						}
						else
						{
								echo "<a href='logout.php' style='color:orange;'>Logout</a>";
						}


					?>

				</span>
			</div>

			<div id="products_box">
			

			<?php
			if(!isset($_GET['my_orders'])){
				if(!isset($_GET['edit_account'])){
					if(!isset($_GET['change_pass'])){
						if(!isset($_GET['delete_account'])){

			
			echo "
			<h2 style='padding: 20px;'>Welcome: $c_name </h2>
			<b><h3>You can see orders progress by clicking this link <a href='my_account.php?my_orders'>link</a></h3></b>";
		}
	}
}
}

			?>
			<?php
			if(isset($_GET['edit_account'])){
				include("edit_account.php");

			}
			if(isset($_GET['change_pass'])){
				include("change_pass.php");

			}
				if(isset($_GET['delete_account'])){
				include("delete_account.php");

			}
			if(isset($_GET['delete_account'])){
				include("delete_account.php");

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