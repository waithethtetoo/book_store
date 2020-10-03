<!DOCTYPE html>
<html>
<head>
	<title>Book Store</title>
	<style>
		body{
			background: #A8EFA6;
			font-family: arial;
		}
	</style>
</head>
<body>
	<h1>Category List</h1>
	<?php
		include("confs/config.php");
		$result = mysqli_query($conn,"SELECT * FROM categories");
		?>
		<ul>
			<?php while ($row = mysqli_fetch_assoc($result)): ?>
				<li title="<?php echo $row['remark'] ?>">
				<?php echo $row['name'] ?>
				</li>
			<?php endwhile; ?>
		</ul>

		<a href="cat-new.php" class="new"> New Category </a>
</body>
</html>
