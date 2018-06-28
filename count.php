<?php
	session_start();

	// get correct file name
	$filename = $_GET['name'];
	$fileName  = substr($filename, 0 , (strrpos($filename, ".")));
	if ($fileName == "can1") {
		$_SESSION['can1']++;
	} else {
		$_SESSION['can2']++;
	}
	
	unset($_SESSION["user_id"]);
	header('Location: index.php');
?>
