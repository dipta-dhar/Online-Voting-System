<?php
	session_start();
	$USER = "Please Login";
	if(isset($_SESSION['user_id'])) {
		$USER = "Hi, ".$_SESSION['user_id'];
	}
?>