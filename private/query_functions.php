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

//
function get_latest_products() {
	global $db;

	$sql = "SELECT * FROM products ";
	$sql .= "ORDER BY product_id ASC LIMIT 6";

	$result = mysqli_query($db, $sql);

	return $result;
}

//
function get_all_products() {
	global $db;

	$sql = "SELECT * FROM products ";

	$result = mysqli_query($db, $sql);

	return $result;
}

//
function get_product_by_id($id) {
	global $db;

	$sql = "SELECT * FROM products ";
	$sql .= "WHERE product_id=" . "'" . $id . "'";

	$result = mysqli_query($db, $sql);

	return $result;
}

//
function get_products_by_cat_id($cat_id) {
	global $db;

	$sql = "SELECT * FROM products ";
	$sql .= "WHERE product_cat=" . "'" . $cat_id . "'";

	$result = mysqli_query($db, $sql);

	return $result;
}

//
function get_products_by_brand_id($brand_id) {
	global $db;

	$sql = "SELECT * FROM products ";
	$sql .= "WHERE product_brand=" . "'" . $brand_id . "'";

	$result = mysqli_query($db, $sql);

	return $result;
}

//
function get_products_by_keyword($keyword) {
	global $db;

	$sql = "SELECT * FROM products ";
	$sql .= "WHERE product_keywords LIKE '%" .$keyword . "%' ";

	$result = mysqli_query($db, $sql);

	return $result;
}



function delete_product_by_id($id) {
	global $db;
	$sql = "DELETE * FROM cart WHERE product_id='";
	$sql .=$id ."'";

	$result = mysqli_query($db, $sql);

	return $result;
}

function customer_register($customer=[]) {
	global $db;
		// inserting new customer into db
	$sql = "INSERT INTO customers (";
	$sql .= "customer_name, customer_email,";
	$sql .= "customer_password, customer_country, ";
	$sql .= "customer_city, customer_address, ";
	$sql .= "customer_phone, customer_img ) ";
	$sql .= "VALUES (";
	$sql .= "'" . db_escape($db,$customer['name']) . "', ";
	$sql .= "'" . db_escape($db,$customer['email']) . "', ";
	$sql .= "'" . db_escape($db,$customer['password']) . "', ";
	$sql .= "'" . db_escape($db,$customer['country']) . "', ";
	$sql .= "'" . db_escape($db,$customer['city']) . "', ";
	$sql .= "'" . db_escape($db,$customer['address']) . "', ";
	$sql .= "'" . db_escape($db,$customer['contact']) . "', ";
	$sql .= "'" . db_escape($db,$customer['image']) . "'";
	$sql .= ")";

	$result = mysqli_query($db, $sql);

	if($result) {
		echo "<script>alert('Registration Successful!')</script>";
		// redirect_to(url_for('customer_register.php'));
		// echo "<script>window.open('customer_register.php', 'self')</script>";
	}else {
		}
}





?>