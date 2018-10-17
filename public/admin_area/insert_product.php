<?php require_once('../../private/initialize.php');
	   ?>

<?php 
	if(is_post_request()) {

		// getting post data from user
		$product = [];
		$product['product_title'] = $_POST['product_title'];
		$product['product_category'] = $_POST['product_cat'];
		$product['product_brand'] = $_POST['product_brand'];
		$product['product_price'] = $_POST['product_price'];
		$product['product_desc'] = $_POST['product_desc'];
		// $product['product_img'] = $_POST['product_price'];
		$product['product_keywords'] = $_POST['product_keywords'];

		// getting image field
		$product['product_img'] = $_FILES['product_img']['name'];
		$product_temp_img = $_FILES['product_img']['tmp_name'];

		//uploading image
		move_uploaded_file($product_temp_img, 'product_images/' . $product['product_img']);

		$result = insert_product($product);

		if($result) {

			// message of success & refresh/redirect to same mage
			echo "<script> alert('Product Added!')</script>";
			// echo "<script> window.open('insert_product.php','self')</script>";
		}

		} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Item</title>
 
	<link rel="stylesheet" href="../styles/style.css" media="all" />

	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>


	<meta charset="utf-8">

</head>
<body>
	<div id="insert_form">
		<form action="insert_product.php" method="post" enctype="multipart/form-data">
			<table align="center" width="700">

				<tr>
					<td colspan="2"><h1>Add New Item</h1></td>
				</tr>

				<tr>
					<td><h3>Product Title:</h3></td>
					<td><input type="text" name="product_title"  required/></td>
				</tr>

				<tr>
					<td><h3>Product Category:</h3></td>
					<td><select name="product_cat" required>
							<option>Select a Category</option>

							<?php 	$result = get_cats();
								while( $category = mysqli_fetch_assoc($result)) {
									$cat_id = $category['cat_id'];
									$cat_title = $category['cat_title'];

									echo '<option value="' . $cat_id .'">' . $cat_title .'</option>';
								}
							?>


						</select>
					</td>
				</tr>

				<tr>
					<td><h3>Product Brand:</h3></td>
					<td>
						<select name="product_brand" required>
							<option>Select a Brand</option>

							<?php 	$result = get_brands();
								while( $brand = mysqli_fetch_assoc($result)) {
									$brand_id = $brand['brand_id'];
									$brand_title = $brand['brand_title'];

									echo '<option value="' . $brand_id .'">' . $brand_title .'</option>';
								}
							?>


						</select></td>
				</tr>

				<tr>
					<td><h3>Product Image:</h3></td>
					<td><input type="file" name="product_img" /></td>
				</tr>

				<tr>
					<td><h3>Product Price:</h3></td>
					<td><input type="text" name="product_price" /></td>
				</tr>

				<tr>
					<td><h3>Product Description:</h3></td>
					<td><textarea name="product_desc" cols="50" rows="10"></textarea></td>
				</tr>

				<tr>
					<td><h3>Product Keywords:</h3></td>
					<td><input type="text" name="product_keywords" /></td>
				</tr>

				<tr>
					<td colspan="2" align="center"><input type="submit" name="insert_item" value="Add Item"/></td>
					
				</tr>


				
			</table>

		</form>
	</div> <!-- insert_form ends here -->


</body>
</html>