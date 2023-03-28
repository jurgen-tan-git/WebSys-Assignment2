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
    

	<?php
	$login_error = "";
	$register_msg = "";
	$success_reset = "";
	$email = "";
	$password = "";

	if (isset($_GET["error"])) {
		if ($_GET["error"] == "empty") {
			$login_error = "Please fill both <b> email and password </b> fields.";
		} else if ($_GET["error"] == "incorrect") {
			$login_error = " Sorry, it seems that the <b> email and/or password is incorrect </b>. Please try again.";
		}
	}
	if (isset($_GET["register"])) {
		if ($_GET["register"] == "success") {
			$register_msg = "Registration success! Please log-in.";
		} else if ($_GET["register"] == "exist") {
			$register_msg = "You have an existing account! Please log-in.";
		}
	}
	if (isset($_GET["deregister"])) {
		if ($_GET["deregister"] == "success") {
			$register_msg = "Account deleted.";
		}
	}

	?>
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

					<!--<div class="modal fade" id="loginModal" tabindex="-1" role="dialog"
						aria-labelledby="loginModal" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header border-bottom-0">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="form-title text-center">
										<h4>Login</h4>
									</div>
									<div class="d-flex flex-column text-center">
										<form action="process/process_login.php" method="POST">
											<div class="form-group">
												<label for="emailAddressField">Email Address:</label>
												<input type="email" class="form-control" id="emailAddressField"
													name="email" required placeholder="Your email address..."
													value="<?php echo $email ?>">
											</div>
											<div class="form-group">
												<label for="passwordField">Password:</label>
												<input type="password" class="form-control" id="passwordField" required
													placeholder="Your password..." name="password"
													value="<?php echo $password ?>">
												<input type="hidden" name="authenticate" value="true">
												<?php if ($login_error): ?>
													<div id="loginErrorMessage" class="alert alert-danger" role="alert">
														<?php echo $login_error ?>
													</div>
												<?php endif; ?>
											</div>
											<button type="submit"
												class="btn btn-info btn-block btn-round">Login</button>
										</form>
										<a href="forgot_password.php">Forgot Password</a>
									</div>
								</div>
								<div class="modal-footer d-flex justify-content-center">
									<div class="signup-section"><a href="register.php" class="text-info"> Sign
											Up</a>.
									</div>
								</div>
							</div>
						</div>
					</div>-->
				</ul>
			</div>
		</nav>
</body>