<?php
if(!isset($_SESSION['user_email'])){
	echo "<script>window.open('login.php?not_admin=You are not An Admin!','_self')</script>";
}
else{


?>
<table width="795"align="center" bgcolor="pink">
	<tr align="center">
		<td colspan="6"><h2>View All Brands Here</h2></td>
	</tr>
	<tr align="center" bgcolor="skyblue">
		<th>Brand ID</th>
		<th>Brand Title</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php
	include("includes/db.php");
	$get_brand="select * from brands";
	$run_brand=mysqli_query($con,$get_brand);
	$i=0;
	while($row_cat=mysqli_fetch_array($run_brand)){
		$brand_id=$row_cat['brand_id'];
		$brand_title=$row_cat['brand_title'];
		$i++;


	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $brand_title;?></td>
		<td><a href="index.php?edit_brand=<?php echo $brand_id;?>">Edit</td>
		<td><a href="delete_brand.php?delete_brand=<?php echo $brand_id;?>">Delete</a></td>
	</tr>
<?php } ?>
</table>
<?php } ?>