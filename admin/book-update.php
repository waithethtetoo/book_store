<?php
include("confs/config.php");
$id = $_POST['id'];
$title = $_POST['title'];
$author = $_POST['author'];
$category_id = $_POST['category_id'];
$price = $_POST['price'];
$cover = $_FILES['cover']['name'];
$tmp = $_FILES['cover']['tmp_name'];

if ($cover) {
	move_uploaded_file($tmp, "covers/$cover");
	$sql = "UPDATE books SET title= '$title', author = '$author', modified_date = now(), category_id = '$cateory_id', cover = '$cover', price = '$price' WHERE id = '$id'";
} else {
	$sql = "UPDATE books SET title= '$title', author = '$author', modified_date = now(), category_id = '$cateory_id', price = '$price' WHERE id = '$id'";
}

mysqli_query($conn,$sql);
header("location: book-list.php");
?>
