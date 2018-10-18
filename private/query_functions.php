<?php 

// getting all categories from db for sidebar
function get_cats(){
	global $db;

	$sql = "SELECT * FROM categories";

	$result = mysqli_query($db, $sql);

		return $result;
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

function get_latest_products() {
	global $db;

	$sql = "SELECT * FROM products ";
	$sql .= "ORDER BY product_id ASC LIMIT 6";

	$result = mysqli_query($db, $sql);

	return $result;
}

function get_all_products() {
	global $db;

	$sql = "SELECT * FROM products ";

	$result = mysqli_query($db, $sql);

	return $result;
}

function get_product_by_id($id) {
	global $db;

	$sql = "SELECT * FROM products ";
	$sql .= "WHERE product_id=" . "'" . $id . "'";

	$result = mysqli_query($db, $sql);

	return $result;
}

function get_products_by_cat_id($cat_id) {
	global $db;

	$sql = "SELECT * FROM products ";
	$sql .= "WHERE product_cat=" . "'" . $cat_id . "'";

	$result = mysqli_query($db, $sql);

	return $result;
}

function get_products_by_brand_id($brand_id) {
	global $db;

	$sql = "SELECT * FROM products ";
	$sql .= "WHERE product_brand=" . "'" . $brand_id . "'";

	$result = mysqli_query($db, $sql);

	return $result;
}

function get_products_by_keyword($keyword) {
	global $db;

	$sql = "SELECT * FROM products ";
	$sql .= "WHERE product_keywords LIKE '%" .$keyword . "%' ";

	$result = mysqli_query($db, $sql);

	return $result;
}



?>