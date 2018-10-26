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

			</div>

		</div>

		<footer>
			&copy; <?php echo date('Y'); ?> Custom Ecommerce site by www.lhabuda.com
			<?php db_disconnect($db); ?>
		</footer>
		
	</div> <!-- main_wrapper ends here -->

</body>
</html>