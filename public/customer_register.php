<?php require_once('../private/initialize.php'); 

if(isset($_POST['register'])) {

	$customer = [];

	$customer['name'] = $_POST['cust_name'];
	$customer['email'] = $_POST['cust_email'];
	$customer['password'] = $_POST['cust_password'];
	$customer['image'] = $_FILES['cust_img']['name'];
	$customer['temp_image'] = $_FILES['cust_img']['tmp_name'];
	$customer['country'] = $_POST['cust_country'];
	$customer['city'] = $_POST['cust_city'];
	$customer['contact'] = $_POST['cust_phone'];
	$customer['address'] = $_POST['cust_address'];


	 //move_uploaded_file($cust_image_tmp, 'customer/customer_images/' . basename($cust_image));
	 move_uploaded_file($customer['temp_image'], 'customer/customer_images/' . $customer['image']);
	

	 customer_register($customer);


	if($_SESSION['buyer'] == true) {

			foreach($_SESSION as $key => $value) {
			 if(substr($key, 0, 8) == 'cart_id_') {
			 	$has_item = true;
			 	// break;
			 }

			}

			if($has_item){

				$_SESSION['customer_email'] = $customer['email'];

				echo "<script>alert('Account has been created sucessfully!')</script>";

				redirect_to(url_for('checkout.php'));
				 //echo "<script>window.open('checkout.php', 'self')</script>";

			}else{
				$_SESSION['customer_email'] = $customer['email'];

				echo "<script>alert('Account has been created sucessfully!')</script>";

				redirect_to(url_for('/customers/my_account.php'));

				 //echo "<script>window.open('/customers/my_account.php', 'self')</script>";

			}
 
		
	}else{
		$_SESSION['customer_email'] = $customer['email'];

		echo "<script>alert('Account has been created sucessfully! No items in sessions')</script>";

		redirect_to(url_for('/customers/my_account.php'));

		//echo "<script>window.open('/customers/my_account.php', 'self')</script>";
		}



}





?>

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
					<!-- <span>Total: <?php //echo "$" . total_price(); ?></span> -->
					<!-- <span>Items: <?php //echo total_items(); ?></span> -->

										<span>
					<?php 
						if(!isset($_SESSION['customer_email'])) {
							echo '<a href="checkout.php" >Log In</a>';
							}else{
								echo '<a href="logout.php" >Log Out</a>';
							}
					?>
					</span>
					
					<!-- <span>Welcome Guest!</span> -->

						<?php 
							if(isset($_SESSION['customer_email'])) {
								echo "<span>Welcome " . $_SESSION['customer_email'] . "!</span>";
							} else {
								echo "<span>Welcome Guest!</span>";
							}
						?>
					
					

				</div>

				<form action="customer_register.php" method="post" enctype="multipart/form-data">
					<table style="margin:auto">
						<tr>
							<td><label>Name</label></td>
							<td style="padding-top:5px"><input type="text" name="cust_name" required/></td>
						</tr>
						<tr>
							<td><label>Email</label></td>
							<td style="padding-top:5px"><input type="text" name="cust_email" required /></td>
						</tr>
						<tr>
							<td><label>Password</label></td>
							<td style="padding-top:5px"><input type="password" name="cust_password" required /></td>
						</tr>
						<tr>
							<td><label>Profile picture</label></td>
							<td style="padding-top:5px"><input type="file" name="cust_img"  /></td>
						</tr>
						<tr>
							<td><label>Country</label></td>
							<td style="padding-top:5px">
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
							<td style="padding-top:5px" ><input type="text" name="cust_city" required /></td>
						</tr>
						<tr>
							<td><label>Address</label></td>
							<td style="padding-top:5px"><textarea  name="cust_address" required ></textarea></td>
						</tr>
						<tr>
							<td><label>Contact number</label></td>
							<td style="padding-top:5px"><input type="text" name="cust_phone" required /></td>
						</tr>
						<tr>
							<td colspan="2" style="padding-top:15px" align="center"><input type="submit" name="register" value="Create account" /></td>
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