<?php include("confs/auth.php") ?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Store</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Category List</h1>
	<ul class="menu">
		<li><a href="book-list.php">Manage Books</a></li>
		<li><a href="cat-list.php">Manage Categories</a></li>
		<li><a href="rental.php">Rental Books</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>
	<?php
		include("confs/config.php");
		$result = mysqli_query($conn,"SELECT * FROM categories");
		?>
		<ul>
			<?php while ($row = mysqli_fetch_assoc($result)): ?>
				<li title="<?php echo $row['remark'] ?>">
				[<a href="cat-delete.php?id=<?php echo $row['id'] ?>" class="del">delete</a>]
				[<a href="cat-edit.php?id=<?php echo $row['id'] ?>" class="edit">edit</a>]
				<?php echo $row['name'] ?>
				</li>
			<?php endwhile; ?>
		</ul>

		<a href="cat-new.php" class="new"> New Category </a>
</body>
</html>
