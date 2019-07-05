<meta http-equiv = 'Content-Type' content = 'text/html;charset=UTF-8'/>
<?php

	$server = 'localhost';
	$username = 'root';
	$password = '';
	$database_name = 'athens';


	// $server = 'localhost';
	// $username = 'athens';
	// $password = 'taberna';
	// $database_name = 'athens_db';


	$conn = mysqli_connect($server, $username, $password);
	mysqli_select_db($conn, $database_name) or die(mysqli_error());

	mysqli_set_charset($conn,"utf8");

?>

	