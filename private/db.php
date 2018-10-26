<?php 

$server = 'localhost';
$user = 'root';
$password = '';
$db_name ='ecommerce_1';

// connecting to db
$db = mysqli_connect($server, $user, $password, $db_name);
// check if db connection is sucessful
if(mysqli_connect_errno()) {
	$msg = "Database connection failed: ";
	$msg .= mysqli_connect_error();
	$msg .= " ( " . mysqli_connect_errno() . " ) ";

	exit($msg);
}

?>