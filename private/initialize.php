<?php ob_start(); // output buffering is turned on

//dirname()-->returns path to parent directory
// __FILE__ --> returns path to this file
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');

// Asign the root URL to a PHP constant
//*Do not need to include the domain
//* Use same document root as web server
//*Can set a hardcoded value
//define("WWW_ROOT", '/workshop/project1/public');
//define("WWW_ROOT", '');
// can dynamically find everything in the URL up to "/public"
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);


	  require_once('db.php');
 	  require_once('functions.php');
 	  require_once('query_functions.php');




?>