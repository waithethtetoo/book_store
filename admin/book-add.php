<?php
include("confs/config.php");

$title = $_POST['title'];
$author = $_POST['author'];
$category_id = $_POST['category_id'];
$cover = $_FILES['cover']['name'];
$tmp = $_FILES['cover']['tmp_name'];
$price = $_POST['price'];

if($cover) {
move_uploaded_file($tmp, "covers/$cover");
}

$sql = "INSERT INTO books (title, author, bought_date, modified_date, category_id, cover, price) 
VALUES ('$title', '$author', now(), now(), '$category_id', '$cover', '$price')";

mysqli_query($conn, $sql);
header("location: book-list.php");
?>
