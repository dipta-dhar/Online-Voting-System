<?php
	session_start();
	$USER = "Please Login";
	if(isset($_SESSION['user_id'])) {
		unset($_SESSION["user_id"]);
		header("location: index.php");
	}
	
	//unset($_SESSION["can1"]);
	//unset($_SESSION["can2"]);
?>