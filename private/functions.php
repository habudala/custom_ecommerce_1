<?php 

function url_for($script_path) {
	//add the leading '/' if not present
	if($script_path[0] !='/') {
		$script_path = '/' . $script_path;
	}
	return WWW_ROOT . $script_path;
}


function is_post_request() {

	return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request(){

	return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function get_ip() {
		//whether ip is from share internet
		if (!empty($_SERVER['HTTP_CLIENT_IP']))   
		  {
		    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
		  }
		//whether ip is from proxy
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
		  {
		    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
		  }
		//whether ip is from remote address
		else
		  {
		    $ip_address = $_SERVER['REMOTE_ADDR'];
		  }
		return $ip_address;

}

function redirect_to($location){
	header("Location: " . $location);
		exit;
}

////////////////DB Functions ////////////////////

function db_disconnect($connection) {
	if(isset($connection)){
		mysqli_close($connection);
	}
		
}

//check connection
function confirm_db_connect(){
	if(mysqli_connect_errno()) {
	$msg = "Database connection failed: ";
	$msg .= mysqli_connect_error();
	$msg .= " ( " . mysqli_connect_errno() . " ) ";

	exit($msg);
	}
}

function db_escape($connection, $string){
	return mysqli_real_escape_string($connection,$string);
}



?>