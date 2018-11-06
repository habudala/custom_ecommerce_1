<div id="login_div">
<!-- <h1 align="center" style="font-size:25px">Login or Register to buy</h1> -->

<form method="post" action="">
	<table id="cust_table" >

		<tr>
			<td colspan="2">
				<h1 align="center" style="font-size:25px">Login or Register to buy
				</h1>
			</td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email" placeholder="email" required /></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password" placeholder="password" required /></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><a href="checkout.php?forgot_pass=true" style="font-size:13px" >Forgot password?</a></td>
		</tr>
				
		<tr>
			<td colspan="2" align="center"><input type="submit" name="login" value="login"  /></td>
		</tr>

	</table>

	<h3 align="center"><a style="text-decoration:none"href="customer_register.php" >New? Register Here</a></h3>
</form>

<?php 

if(isset($_POST['login'])) {
	$customer = [];
	$customer['email'] = $_POST['email'];
	$customer['password'] = $_POST['password'];

	$sql = "SELECT * FROM customers WHERE ";
	$sql .= "customer_password='" . db_escape($db, $customer['password']) ."' ";
	$sql .= "AND customer_email='" . db_escape($db, $customer['email']) . "'";

	$result = mysqli_query($db, $sql);

	$customer_found = mysqli_num_rows($result);

	if($customer_found == 0) {
		echo "<script>alert('password or email incorrect')</script>";
		exit;
	}

	if(($_SESSION['buyer'] == false) && ($customer_found > 0)){

			$_SESSION['customer_email'] = $customer['email'];

			echo "<script>alert('Log in sucessful!!')</script>";

			redirect_to(url_for('/customers/my_account.php'));
	} else {
			$_SESSION['customer_email'] = $customer['email'];

			echo "<script>alert('Log in sucessful!!')</script>";

			redirect_to(url_for('checkout.php'));
	}
}





?>

</div>