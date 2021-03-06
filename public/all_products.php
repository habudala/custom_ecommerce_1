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
					while($category = mysqli_fetch_assoc($result)) {
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

			</div>

			<div id="content_area">
			<?php //add_to_cart('all_products.php'); ?>
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

				<div id="product_box">
					<?php 


						
							$result = get_all_products();
							while ($product = mysqli_fetch_assoc($result)) {
								$product_id = $product['product_id'];
								$product_cat = $product['product_cat'];
								$product_brand = $product['product_brand'];
								$product_title = $product['product_title'];
								$product_price = $product['product_price'];
								$product_image = $product['product_img'];

								echo '<div id="single_product">
										<h3>' . $product_title . '</h3>
										<img src="admin_area/product_images/' . $product_image
										.'" width="240"  height="240" />
										<p>Our Price </p>
									    <h2>$' . $product_price . '</h2>
									    <div id="buttons">
									    	<a  style="float:left" href="details.php?product_id='
									    . $product_id . '" >Details</a>
									    	<a style="float:right" href="cart.php?add='
									    . $product_id .'" >
									    <button>Add to Cart</button></a>
									    </div>
									   </div>'
									;

							}
					?>
				</div>
			</div>

		</div>

		<footer>
			&copy; <?php echo date('Y'); ?> Custom Ecommerce site by www.lhabuda.com
			<?php db_disconnect($db); ?>
		</footer>
		
	</div> <!-- main_wrapper ends here -->

</body>
</html>