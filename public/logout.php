<?php 
 require_once('../private/initialize.php'); 
session_destroy();

echo "<script>alert('Log out sucessful!')</script>";

redirect_to(url_for('index.php'));

?>