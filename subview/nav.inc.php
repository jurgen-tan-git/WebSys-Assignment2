<?php
session_start();
//Display guest welcome message, Login and Registration links
//when shopper has yet to login,
$content1 = "Welcome Guest<br />";
// $content2 = "<a class='Button StreamsSignUp js-signup' href='register.php'>Sign Up</a>
// <a class='Button StreamsLogin js-login' href='login.php'>Log In </a>";

if (isset($_SESSION["fname"])) {
	$content1 = "Welcome <b>$_SESSION[fname]</b>";
	$content2 = "<li class='nav-item'>
					<a class='nav-link' href='account.php'>Account Details</a>
				</li>
				<li class='nav-item'>
					<a class='nav-link' href='add_transaction.php'>Add Transaction</a>
				</li>
				<li class='nav-item'>
					<a class='nav-link' href='close_account.php'>Close Account</a>
				</li>
				<a class='nav-link'>".$_SESSION['fname']."</a>
				<li class='nav-item'>
					<a class='nav-link' href='process/process_logout.php'>Logout</a>
				</li>";
}else{
	$content2 = "<li class='nav-item'>
					<a class='nav-link' href='register.php'>Sign Up</a>
				</li>
				<li class='nav-item'>
					<a class='nav-link' href='login.php'>Log In</a>
				</li>";
}
?>

<!DOCTYPE html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Website</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
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
				<li class="nav-item">
					<a class="nav-link" href="membership.php">Memberships</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="services.php">Services</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="about_us.php">About Us</a>
				</li>

				<!--if log in-->			
				<?php echo $content2;?>
			</ul>
		</div>
		</nav>


		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.1/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>


