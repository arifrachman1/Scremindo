<?php 
	
	session_start();
	$_SESSION["tbl_customer_id_customer"];
	$_SESSION["tbl_customer_email"];

	unset($_SESSION["tbl_customer_id_customer"]);
	unset($_SESSION["tbl_customer_email"]);

	session_unset();
	session_destroy();

	header("location: index.php");

?>