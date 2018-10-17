<?php 

// getting all categories from db for sidebar
function get_cats(){
	global $db;

	$sql = "SELECT * FROM categories";

	$result = mysqli_query($db, $sql);

	while ($category = mysqli_fetch_assoc($result)) {

		$cat_id = $category['cat_id'];
		$cat_title = $category['cat_title'];

		return $result;
	}
}


//
function get_brands() {
	global $db;

	$sql = "SELECT * FROM brands";

	$result = mysqli_query($db, $sql);

	return $result;
}


//
function insert_product($product=[]) {
		global $db;
		
		$sql = "INSERT INTO products ";
		$sql .= "(product_cat, product_brand, product_title, ";
		$sql .= "product_price, product_desc, product_img, ";
		$sql .= "product_keywords ) VALUES (";
		$sql .="'" . $product['product_category'] . "', ";
		$sql .="'" . $product['product_brand'] . "', ";
		$sql .="'" . $product['product_title'] . "', ";
		$sql .="'" . $product['product_price'] . "', ";
		$sql .="'" . $product['product_desc'] . "', ";
		$sql .="'" . $product['product_img'] . "', ";
	    $sql .="'" . $product['product_keywords'] . "') ";

		$result = mysqli_query($db, $sql);

		return $result;
}

function get_products() {
	global $db;

	$sql = "SELECT * FROM products ";
	$sql .= "ORDER BY RAND() LIMIT 6";

	$result = mysqli_query($db, $sql);

	return $result;
}



?>