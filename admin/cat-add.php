<?php
	include("confs/config.php");
	$name = $_POST['name'];
	$remark = $_POST['remark'];
	$sql = "INSERT INTO categories (name,remark,created_date,modified_date) VALUES ('$name','$remark',now(),now())";

	mysqli_query($sql);

	header("location: cat-list.php");
?>
