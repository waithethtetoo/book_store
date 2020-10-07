<?php 
	session_start();
	if (!isset($_SESSION['rental'])) {
		header("location: index.php");
		exit();
	}
	include("admin/confs/config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Rental</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>View Rental</h1>
	<div class="sidebar">
		<ul class="cats">
			<li><a href="index.php">&laquo; Continue</a></li>
			<li><a href="clear-rental.php" class="del">&times; Clear</a></li>
		</ul>
	</div>

	<div class="main">
		<table>
			<tr>
				<th>Book Title</th>
				<th>Quantity</th>
			</tr>

			<?php 
				$total = 0;
				foreach ($_SESSION['rental'] as $id => $qty) :	
					$result = mysqli_query($conn,"SELECT title FROM books WHERE id = $id");
					$row = mysqli_fetch_assoc($result);
					$total += $qty;
			?>
			<tr>
				<td><?php echo $row['title'] ?></td>
				<td><?php echo $qty ?></td>
			</tr>

			<?php endforeach; ?>

			<tr>
				<td>Total :</td>
				<td><?php echo $total; ?></td>
				<!-- <?php mysqli_query($conn,"INSERT INTO rental(qty) VLAUES ('$total') "); ?> -->
			</tr>
		</table>

		<div class="rental-form">
			<h2>Rental Now</h2>
			<form action="submit-rental.php" method="post">

				<label for="name">Name</label>
				<input type="text" name="name" id="name">

				<label for="email">Email</label>
				<input type="text" name="email" id="email">

				<label for="phone">Phone</label>
				<input type="text" name="phone" id="phone">

				<label for="address">Address</label>
				<textarea name="address" id="address"></textarea>

				<br><br>
				<input type="submit" value="Submit Rental">
				<a href="index.php">Continue</a>
			</form>
		</div>
	</div>
	<div class="footer">
		&copy; <?php echo date("Y") ?>. All right reserved.
	</div>
</body>
</html>
