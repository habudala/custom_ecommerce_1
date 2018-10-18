<?php 

require_once('../private/initialize.php'); 
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

			<img id="logo" src="images/ecom_logo.png" />
			<img id="banner" src="images/ad_banner.gif" />
			
		</header>

		<div class="menubar">

			<ul id="menu">

				<li><a href="index.php">Home</a></li>
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

				<div id="shopping_cart">
					<span><a href="cart.php">Cart</a></span>
					<span>Total:</span>
					<span>Items:</span>
					<span>Welcome Guest!</span>
					
					

				</div>

				<div id="product_box">
					<?php 
						if(isset($_GET['product_id'])){
							$product_id = $_GET['product_id'];
						}
						$result = get_product_by_id($product_id);
						while ($product = mysqli_fetch_assoc($result)) {
							// $product_id = $product['product_id'];
							$product_brand = $product['product_brand'];
							$product_title = $product['product_title'];
							$product_price = $product['product_price'];
							$product_image = $product['product_img'];
							$product_desc = $product['product_desc'];

							echo '<div id="single_product">
									<h3>' . $product_title . '</h3>'
									. '<img src="admin_area/product_images/' . $product_image
									.'" width="400"  height="300" />
								    <h2>$' . $product_price . '</h2>'
								    . '<p>' . $product_desc . '</p>'
								    . '<a  style="float:left" href="index.php" >Go Back</a>
								    <a style="float:right" href="index.php?product_id='
								    . $product_id .'" >'
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