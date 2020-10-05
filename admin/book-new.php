<?php include("confs/auth.php") ?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Store</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
		form label {
			display: block;
			margin-top: 8px;
		}
	</style>
</head>
<body>
	<h1>New Book</h1>
	<ul class="menu">
		<li><a href="book-list.php">Manage Books</a></li>
		<li><a href="cat-list.php">Manage Categories</a></li>
		<li><a href="rental.php">Rental Books</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>
	<form action="book-add.php" method="post" enctype="multipart/form-data">
		<label for="title">Book Title</label>
		<input type="text" name="title" id="title">

		<label for="author">Author</label>
		<input type="text" name="author" id="author">

		<label for="categories">Category</label>
		<select name="category_id" id="categories">
			<option value="0">-- Choose --</option>
			<?php
			include("confs/config.php");
			$result = mysqli_query($conn, "SELECT id, name FROM categories");
			while($row = mysqli_fetch_assoc($result)):
			?>
			<option value="<?php echo $row['id'] ?>">
			<?php echo $row['name'] ?>
			</option>
			<?php endwhile; ?>
		</select>

		<label for="cover">Cover</label>
		<input type="file" name="cover" id="cover">

		<label for="price">Price</label>
		<input type="text" name="price" id="price">	

		<br><br>
		<input type="submit" value="Add New Book">
		<a href="book-list.php" class="back">Back</a>
	</form>
</body>
</html>

