<?php 
	$db_server = "localhost";
	$db_user = "gmorontafernand1";
	$db_password = "Mement0-Mor1";
	$database = "gmorontafernand1";

	$conn = new mysqli($db_server, $db_user, $db_password, $database);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	else
	{
		// echo "";
	}

	//This stops SQL Injection in POST vars 
	foreach ($_POST as $key => $value) { 
		 $_POST[$key] = mysqli_real_escape_string($conn,$value);
	}
	//This stops SQL Injection in GET vars 
	foreach ($_GET as $key => $value) {
		 $_GET[$key] = mysqli_real_escape_string($conn,$value);
	 }

	 if (!defined("BASE_URL")){
	 	define("BASE_URL", "http://gmorontafernand1.dmitstudent.ca/dmit2025/lab6/");
	 } 

	 if (!defined("THIS_PAGE")){
	 	define("THIS_PAGE", $_SERVER['PHP_SELF']);
	 } 
?>  