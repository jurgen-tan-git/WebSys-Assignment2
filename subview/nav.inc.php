<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en-us">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Website</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- Font Awesome CSS -->
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.15.3/css/all.css'>
	<link rel="stylesheet" href="css/nav.css">

	<!-- jQuery -->
	<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
	<!-- Popper -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark">
		<a class="navbar-brand" href="index.php"><img src="images/logo.jpg" width="80" height="40" alt="Logo"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarNav" data-bs-theme="dark">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Home</a>
				</li>

				<?php if(!isset($_SESSION['email'])):?>
				<li class="nav-item">
					<a class="nav-link" href="membership.php">Memberships</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="services.php">Services</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="about_us.php">About Us</a>
				</li>
					<li class="nav-item">
					<a class="nav-link" href="login.php">Login</a>
				</li>
				<?php endif; ?>

				<?php if(isset($_SESSION['email'])):?>
				<li class='nav-item'>
					<a class='nav-link' href='account.php'>Account Details</a>
				</li>
				<li class='nav-item'>
					<a class='nav-link' href='add_transaction.php'>Add Transaction</a>
				</li>
				<li class='nav-item'>
					<a class='nav-link' href='transfer.php'>Transfer</a>
				</li>
				<li class='nav-item'>
					<a class='nav-link' href='close_account.php'>Close Account</a>
				</li>
				<li class='nav-item'>
					<a class='nav-link' href='process/process_logout.php'>Logout</a>
				</li>
				<?php endif; ?>
			</ul>
		</div>
	</nav>
</body>