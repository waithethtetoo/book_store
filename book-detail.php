<!DOCTYPE html>
<html>
<head>
	<title>Book Detail</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Book Detail</h1>

	<?php 
		include ("admin/confs/config.php");
		$id = $_GET['id'];
		$books = mysqli_query($conn,"SELECT * FROM books WHERE id = $id");
		$row = mysqli_fetch_assoc($books);
	?>

	<div class="detail">
		<a href="index.php" class="back">&laquo; Go Back</a>

		<img src="admin/covers/<?php echo $row['cover'] ?>">
		<h2><?php echo $row['title'] ?></h2>
		<i>by <?php echo $row['author'] ?></i>
		<b>Ks<?php echo $row['price'] ?></b>

		<a href="add-to-rental.php?id=<?php echo $id ?>" class="add-to-rental"> Add to Rental</a>
	</div>
	
	<div class="footer">
		&copy; <?php echo date("Y") ?>. All right reserved.
	</div>
</body>
</html>
