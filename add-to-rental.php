<?php
	session_start();
	$id = $_GET['id'];
	$_SESSION['rental'][$id]++;
	
	header("location: index.php");
?>
