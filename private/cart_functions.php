<?php  

if(isset($_GET['add'])){
// echo "blah";

	$sql = "SELECT product_id, quantity FROM products WHERE product_id='" . mysqli_real_escape_string($db, (int)$_GET['add']) . "'";

	$quantity = mysqli_query($db, $sql);

	while($q_row = mysqli_fetch_assoc($quantity)) {
		// if qty in db doesn't match qty in sessions then ... (meaning not out of qty) add 1 to session qty
		if($q_row['quantity'] != $_SESSION['cart_id_' . (int) $_GET['add']]){
			$_SESSION['cart_id_' . (int)$_GET['add']] += '1' ;
			// redirect so session variables are detected
			
		}
	}

	header('location:cart.php');
}

if(isset($_GET['remove'])){
	$_SESSION['cart_id_' .(int)$_GET['remove']]--;
	header('location:cart.php');
}

if(isset($_GET['delete'])){
	$_SESSION['cart_id_' . (int)$_GET['delete']] ='0';
	header('location:cart.php');
}




// getting products for index page
function get_products(){
	global $db;
	$sql ="SELECT * FROM products WHERE quantity > 0 ORDER BY product_id DESC ";
	$result = mysqli_query($db, $sql);

	// testing for returned value
	if(!$result) {
	exit("Database query failed");
	}

	if(mysqli_num_rows($result) == 0){
		echo "There are no product to display";
	}else{
		//echo "Success. See products soon...";
		while($get_row = mysqli_fetch_assoc($result)){
			// here we spit back products from db
			echo '<p>' . $get_row['product_title'] . '</p>
			<p>' . $get_row['product_img'] . '</p>
			<p>$' . number_format($get_row['product_price'], 2) . '</p><br/> 
			<a href="cart.php?add='. $get_row['product_id'].'" >Add to cart</a>';

		}
	}

}

function cart(){
	global $db;
	 $total = 0;
	foreach($_SESSION as $key => $value) {
		// echo $key . ' has value' . $value;
		if($value > 0){
			if(substr($key, 0, 8) == 'cart_id_') {
				$id = substr($key, 8, (strlen($key)-8));
				//echo $id ."</br>";
				$sql = "SELECT product_id, product_title, product_price, product_img FROM products WHERE product_id='" .mysqli_real_escape_string($db, (int)$id) . "'";
				$result = mysqli_query($db, $sql);
				while($get_row = mysqli_fetch_assoc($result)){
					$sub = $get_row['product_price'] * $value;



					echo '<tr>
							<td>
								<div>
									<img id="cart_img" src="' . url_for('/admin_area/product_images/' . $get_row['product_img']) . '"/>
								</div
								<div>
									<h3>' . $get_row['product_title'] . '</h3>
								</div>
							</td>
								<td>
									<a href="cart.php?add=' . $id . '">
										<div id="add_div">
											<img id="add_img" src="' .url_for('images/increment.png') . '" />
										</div>
									</a>
									<h2>$ ' . $value . '</h2>
									<a href="cart.php?remove=' . $id . '">
										<div id="add_div">
											<img id="add_img" src="' .url_for('images/decrement.png') . '" />
										</div>
									</a>
								</td>
								<td>
									<a href="cart.php?delete=' . $id . '">Delete</a>
								</td>
								<td>
									<p> item price: $ ' . $sub . '</p>
								</td>
							<tr/>';

					$total+=$sub;				
				}
			}
			
		}
		
	}
	
	if($total == 0){
		echo 'your cart is empty!';
	}else {}

	return $total;

}

//echo 'connection sucessful! Happy codidng!';




