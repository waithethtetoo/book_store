<?php include ("confs/auth.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Rental List</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Rental List</h1>

	<ul class="menu">
		<li><a href="book-list.php">Manage Books</a></li>
		<li><a href="cat-list.php">Manage Categories</a></li>
		<li><a href="rental.php">Rental Books</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>

	<?php
		include("confs/config.php");
		$rentals = mysqli_query($conn, "SELECT * FROM rental");
	?>

	<ul class="rental">
		<?php while($rental = mysqli_fetch_assoc($rentals)): ?>
			<?php if ($rental['status']) : ?>
			<li class="taken">
			
			<?php else : ?>
			<li>
			<?php endif; ?>

			<div class="rental">

				<b><?php echo $rental['name'] ?></b>
				<i><?php echo $rental['email'] ?></i>
				<span><?php echo $rental['phone'] ?></span>
				<p><?php echo $rental['address'] ?></p>
				
				<?php if($rental['status']): ?>
				* <a href="rental-status.php?id=<?php echo $rental['id'] ?>&status=0">
				Undo</a>
				<?php else: ?>
				* <a href="rental-status.php?id=<?php echo $rental['id'] ?>&status=1">
				Mark as Taken
				<?php endif; ?>
			</div>

			<div class="items">
				<?php 
					$rental_id = $rental['id'];
					$items = mysqli_query($conn,"SELECT rental_items.*, books.title 
						FROM rental_items LEFT JOIN books ON rental_items.book_id = books.id
						WHERE rental_items.rental_id = $rental_id "); 

					while ($item = mysqli_fetch_assoc($items)) :
				?>

				<b>
					<a href="../book-detail.php?id=<?php echo $item['book_id'] ?>">
					<?php echo $item['title'] ?>
					</a>	
				</b>
				<?php endwhile; ?>
				
				<?php 
					$result = mysqli_query($conn,"SELECT COUNT(qty) FROM rental_items");
					$row = mysqli_fetch_array($result);
					$total = $row[0];
				?>
				<b>	<?php echo "Total Rental Books: " .$total ?>
				</b>

			</div>
			</li>
		<?php endwhile; ?>
	</ul>
</body>
</html>
