<!DOCTYPE html>
<html>
<head>
	<title>Book Store</title>
	<style>
		body{
			background: #A8EFA6;
			font-family: arial;
		}
		form label {
			display: block;
			margin-top: 8px;
		}
	</style>
</head>
<body>
	<h1>New Category</h1>
	<form action="cat-add.php" method="post">
		<label for="name"> Category name </label>
		<input type="text" name="name" id="name">

		<label for="remark">Remark</label>
		<textarea name="remark" id="remark"></textarea>

		<br><br>
		<input type="submit" value="Add Category">
	</form>
</body>
</html>
