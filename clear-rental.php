<?php
	session_start();
	unset($_SESSION['rental']);
	header("location: index.php");
?>
