<?php require_once('../private/initialize.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>

	<title>Custom Online Store</title>
 
	<link rel="stylesheet" href="styles/style.css" media="all" />

	<meta charset="utf-8">

</head>
<body>

	<div class="main_wrapper">

		<header>

			<a href="index.php"><img id="logo" src="images/ecom_logo.png" /></a>
			<img id="banner" src="images/ad_banner.gif" />
			
		</header>

		<div class="menubar">

			<ul id="menu">

				<li><a href="index.php">Home</a></li>
				<li><a href="all_products.php">All Products</a></li>
				<li><a href="customer/my_account.php">My Account</a></li>
				<li><a href="#">Sign Up</a></li>
				<li><a href="cart.php">Shopping Cart</a></li>
				<li><a href="#">Contact Us</a></li>

			</ul>

			<div id="form">
				<form method="post" action="results.php" enctype="multipart/form-data">
					<input type="text" name="user_query" placeholder="Search product..."/>
					<input type="submit" name="search" value="search"/>
				</form>
			</div>
			
		</div><!-- menubar ends here -->

		<div class="content_wrapper">
		
			<div id="sidebar">

				<div id="sidebar_title">
					Categories
				</div>

				<ul id="cats">

				<?php 	$result = get_cats();
					while( $category = mysqli_fetch_assoc($result)) {
						$cat_id = $category['cat_id'];
						$cat_title = $category['cat_title'];

						echo '<li><a href="index.php?cat_id=' . $cat_id . '">' . $cat_title .'</a></li>';
					}
				?>

				</ul>


				<div id="sidebar_title">
					Brands
				</div>

				<ul id="cats">

				<?php  	
					$result = get_brands();

					while( $brand = mysqli_fetch_assoc($result)) {
						$brand_id = $brand['brand_id'];
						$brand_title = $brand['brand_title'];

						echo '<li><a href="index.php?brand_id=' . $brand_id . '">' . $brand_title .'</a></li>';
				}?>

				</ul>

			</div> <!-- sidebar ends here -->

			<div id="content_area">
				<div id="shopping_cart">
					<span>
						<a href="cart.php">
							<img src="images/cart.png"/>
						</a>
					</span>
			<!-- 		<span>Total: <?php // echo "$" . $total; ?></span>
					<span>Items: <?php //echo total_items(); ?></span> -->
					<span>Welcome Guest!</span>
					
					

				</div>

				<form action="customer_register.php" method="post" enctype="multipart/form-data">
					<table style="margin:auto">
						<tr>
							<td><label>Name</label></td>
							<td><input type="text" name="cust_name" /></td>
						</tr>
						<tr>
							<td><label>Email</label></td>
							<td><input type="text" name="cust_email" /></td>
						</tr>
						<tr>
							<td><label>Password</label></td>
							<td><input type="password" name="cust_password" /></td>
						</tr>
						<tr>
							<td><label>Profile picture</label></td>
							<td><input type="file" name="cust_img" /></td>
						</tr>
						<tr>
							<td><label>Country</label></td>
							<td>
								<select name="cust_country" >
									<option>Select a Country</option>
									<option>USA</option>
									<option>Canada</option>
									<option>Mexico</option>
									<option>UK</option>
									<option>Ireland</option>
									<option>France</option>
									<option>Spain</option>
									<option>Portugal</option>
									<option>Netherlands</option>
									<option>Belgium</option>
									<option>Italy</option>
									<option>Switzerland</option>
									<option>Austria</option>
									<option>Germany</option>
									<option>Hungary</option>
									<option>Poland</option>
									<option>Russia</option>
									<option>China</option>

								</select>
							</td>
						</tr>
						<tr>
							<td><label>City</label></td>
							<td><input type="text" name="cust_city" /></td>
						</tr>
						<tr>
							<td><label>Address</label></td>
							<td><textarea name="cust_addr" ></textarea></td>
						</tr>
						<tr>
							<td><label>Contact number</label></td>
							<td><input type="text" name="cust_phone" /></td>
						</tr>
						<tr>
							<td colspan="2" align="center"><input type="submit" name="register" value="Create account" /></td>
						</tr>

					</table>

				</form>

			</div>

		</div>

		<footer>
			&copy; <?php echo date('Y'); ?> Custom Ecommerce site by www.lhabuda.com
			<?php db_disconnect($db); ?>
		</footer>
		
	</div> <!-- main_wrapper ends here -->

</body>
</html>