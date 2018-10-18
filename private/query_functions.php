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

function add_to_cart() {
	if(isset($_GET['product_id'])) {
		global $db;
		$ip = get_ip();
		$product_id = $_GET['product_id'];

		$sql = "SELECT * FROM cart WHERE ip_address=";
		$sql .= "'" . $ip . "' AND product_id=";
		$sql .= "'" . $product_id . "'";

		$result = mysqli_query($db, $sql);

		if(mysqli_num_rows($result) > 0) {
			echo "";
		}else{
			$sql = "INSERT INTO cart (";
			$sql .= "product_id, ip_address) VALUES (";
			$sql .=  "'" . $product_id . "', '" . $ip .  "')";

			$result = mysqli_query($db, $sql);

			echo "<script>window.open('index.php','self')</script>";
		}
	}
}

function total_items() {
	global $db;
	$ip =get_ip();

	if(isset($_GET['product_id'])) {
			
			

			$sql = "SELECT * FROM cart WHERE ip_address=";
			$sql .= "'" . $ip . "'";

			$result = mysqli_query($db, $sql);

			$result_num = mysqli_num_rows($result);

		}else {
			

			$sql = "SELECT * FROM cart WHERE ip_address=";
			$sql .= "'" . $ip . "'";

			$result = mysqli_query($db, $sql);

			$result_num = mysqli_num_rows($result);
		}

		return $result_num;
}



?>