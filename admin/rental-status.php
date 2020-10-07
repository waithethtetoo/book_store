<?php 
	include("confs/config.php");
	$id = $_GET['id'];
	$status = $_GET['status'];

	mysqli_query($conn, "UPDATE rental SET
	status=$status, modified_date=now() WHERE id=$id ");

	header("location: rental.php");
?>
