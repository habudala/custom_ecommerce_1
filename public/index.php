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

			<img id="logo" src="images/ecom_logo.png" />
			<img id="banner" src="images/ad_banner.gif" />
			
		</header>

		<div class="menubar">

			<ul id="menu">

				<li><a href="#">Home</a></li>
				<li><a href="#">All Products</a></li>
				<li><a href="#">My Account</a></li>
				<li><a href="#">Sign Up</a></li>
				<li><a href="#">Shopping Cart</a></li>
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

						echo '<li><a href="#">' . $cat_title .'</a></li>';
					}
				?>
<!-- 					<li><a href="#">Cell phones</a></li>
					<li><a href="#">Tablets</a></li>
					<li><a href="#">Laptops</a></li>
					<li><a href="#">Computers</a></li>
					<li><a href="#">Cameras</a></li>
					<li><a href="#">Smart Tvs</a></li>
					<li><a href="#">Acessories</a></li> -->
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

						echo '<li><a href="#">' . $brand_title .'</a></li>';
				}?>
<!-- 					<li><a href="#">Cell phones</a></li>
					<li><a href="#">Tablets</a></li>
					<li><a href="#">Laptops</a></li>
					<li><a href="#">Computers</a></li>
					<li><a href="#">Cameras</a></li>
					<li><a href="#">Smart Tvs</a></li>
					<li><a href="#">Acessories</a></li> -->
				</ul>

			</div>

			<div id="content_area">
				<div id="product_box">
					<?php 
						$result = get_products();
						while ($product = mysqli_fetch_assoc($result)) {
							$product_id = $product['product_id'];
							$product_cat = $product['product_cat'];
							$product_brand = $product['product_brand'];
							$product_title = $product['product_title'];
							$product_price = $product['product_price'];
							$product_image = $product['product_img'];

							echo '<div id="single_product">
										<h3>' . $product_title . '</h3>'
									    . '<img src="admin_area/product_images/' . $product_image
									    .'" width="224"  height="224" />
								        <h2>$' . $product_price . '</h2>'
								        . '<a  style="float:left" href="details.php" >Details</a>
								        <a style="float:right" href="index.php" >'
								       .'<button>Add to Cart</button></a>
								   </div>'
								;

						}
					?>
				</div>
			</div>

		</div>

		<footer>&copy; <?php echo date('Y'); ?> Custom Ecommerce site by www.lhabuda.com</footer>
		
	</div> <!-- main_wrapper ends here -->

</body>
</html>