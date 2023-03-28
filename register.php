<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Bootstrap Sign up Form Horizontal</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link rel="stylesheet" href="css/register.css">
</head>
<body>
<?php
            include "subview/nav.inc.php";
            $verify_bot = "Verify";
            $register_error = "";
            if (isset($_GET["error"])) {
                $register_error = "Sorry, it seems that something went wrong </b>. Please try again.";
            }
        ?>
<main class = "container">
<?php if($register_error): ?>
                <div id="registerErrorMessage" class="alert alert-danger" role="alert">
                    <?php echo $register_error ?>
                </div>
            <?php endif; ?>

<div class="signup-form">
    <form action="/examples/actions/confirmation.php" method="post" class="form-horizontal">
		<div class="col-xs-8 col-xs-offset-4">
			<h2>Member Registration</h2>
            <p>
                For existing members, please go to the
                <a href="login.php">Sign In page</a>.
            </p>
		</div>
        <form action="process/process_register.php" method="post" onsubmit="return checkValue()" validate>
		
        <div class="form-group">
			<label class="control-label col-xs-4" for="fname">First Name:</label>
            <div class="col-xs-8">
                <input class="form-control" type="text" id="fname" required maxlength="45" name="fname" placeholder="Enter first name">
            </div>        	
        </div>
		<div class="form-group">
			<label class="control-label col-xs-4" for="lname">Last Name:</label>
			<div class="col-xs-8">
            <input class="form-control" type="text" id="lname" required maxlength="45" name="lname" placeholder="Enter last name">
            </div>        	
        </div>
        <div class="form-group">
			<label class="control-label col-xs-4" for="email">Email:</label>
			<div class="col-xs-8">
            <input class="form-control" type="email" id="email" required name="email" placeholder="Enter email">
            </div>        	
        </div>

		<div class="form-group">
			<label class="control-label col-xs-4" for="pwd">Password:</label>
			<div class="col-xs-8">
            <input class="form-control" type="password" id="pwd" required name="pwd" placeholder="Enter password">
            </div>        	
        </div>
		<div class="form-group">
			<label class="control-label col-xs-4" for="pwd_confirm">Confirm Password:</label>
			<div class="col-xs-8">
            <input class="form-control" type="password" id="pwd_confirm" required name="pwd_confirm" placeholder="Confirm password">
            </div>        	
        </div>

        <div class="form-group">
			<label class="control-label col-xs-4" for="telegram_id">Register Telegram Bot 2FA:</label>
			<div class="col-xs-8">

            <input class="form-control" type="text" id="telegram_id" required name="telegram_id" placeholder="Telegram ID">
            <a href="https://t.me/bankofsit_bot?start=start">Here</a>
            <label for="telegram_check" id="result"></label>
            <input type="hidden" name="tg_verified" id="tg_verified" value="0">
            <input type="hidden" name="tg_chat_id" id="tg_chat_id">
            </div>        	
        </div>

        <input type="hidden" name="register" value="true">
		<div class="form-group">
			<div class="col-xs-8 col-xs-offset-4">
				<p><label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a>.</label></p>
				<button class="btn btn-primary" type="submit" onclick="checkInput()">Submit</button>
			</div>  
		</div>		              
    </form>
	
</div>
</main>
<div class="footer-margin">
<?php
            include "subview/footer.inc.php";
        ?>   
</div>
</body>
</html>