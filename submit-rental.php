 <?php
	session_start();
	include("admin/confs/config.php");

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];

	mysqli_query($conn, "INSERT INTO rental(name, email, phone, address, status, created_date, modified_date) 
			VALUES('$name', '$email', '$phone', '$address', 0, now(), now())" );

	$rental_id = mysqli_insert_id($conn);
	foreach ($_SESSION['rental'] as $id => $qty) {
		mysqli_query($conn,"INSERT INTO rental_items (book_id, rental_id, qty) VALUES ($id, $rental_id, $qty)");
	}

	unset($_SESSION['rental']);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Rental Submitted</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>Rental Submitted</h1>

	<div class="msg">
		Your rental has been submitted.
		<a href="index.php" class="done">Book Store Home</a>
	</div>

	<div class="footer">
		&copy; <?php echo date("Y") ?>. All right reserved.
	</div>
</body>
</html>
