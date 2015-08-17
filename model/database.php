<?php
// Set up the database connection
$dsn = 'mysql:host=localhost;dbname=bamboo';
$username = //enter user name here;
$password = //enter password here;
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION); 

try {
	$db = new PDO($dsn, $username, $password, $options);
} catch (PDOEXCEPTION $e) {
	$error_message = $e->getMessage();
	include('errors/db_error_connect.php');
	exit();
}


?>

