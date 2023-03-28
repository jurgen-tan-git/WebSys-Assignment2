<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <meta charset="UTF-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/register.css">
    <script defer src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
        </script>
    <script defer src="js/main.js"></script>
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
    <form action="process/process_register.php" method="post" onsubmit="return checkValue()" validate class="form-horizontal">
		<div class="col-xs-8 col-xs-offset-4">
			<h2>Member Registration</h2>
            <p>
                For existing members, please go to the
                <a href="login.php">Sign In page</a>.
            </p>
		</div>
        
        <div class="form-group">
			<label class="control-label col-xs-4" for="fname">First Name:</label>
            <div class="col-xs-8">
                <input class="form-control form-control-lg" type="text" id="fname" required maxlength="45" name="fname" placeholder="Enter first name">
            </div>        	
        </div>
		<div class="form-group">
			<label class="control-label col-xs-4" for="lname">Last Name:</label>
			<div class="col-xs-8">
            <input class="form-control form-control-lg" type="text" id="lname" required maxlength="45" name="lname" placeholder="Enter last name">
            </div>        	
        </div>
        <div class="form-group">
			<label class="control-label col-xs-4" for="email">Email:</label>
			<div class="col-xs-8">
            <input class="form-control form-control-lg" type="email" id="email" required name="email" placeholder="Enter email">
            </div>        	
        </div>
		<div class="form-group">
			<label class="control-label col-xs-4" for="pwd">Password:</label>
			<div class="col-xs-8">
            <input class="form-control form-control-lg" type="password" id="pwd" required name="pwd" placeholder="Enter password">
            </div>        	
        </div>
		<div class="form-group">
			<label class="control-label col-xs-4" for="pwd_confirm">Confirm Password:</label>
			<div class="col-xs-8">
            <input class="form-control form-control-lg" type="password" id="pwd_confirm" required name="pwd_confirm" placeholder="Confirm password">
            </div>        	
        </div>

        <div class="form-group">
			<label class="control-label col-xs-4" for="telegram_id">Register Telegram Bot 2FA <a href="https://t.me/bankofsit_bot?start=start" target="_blank">Here</a>:</label>
			<div class="col-xs-8">

            <input class="form-control form-control-lg" type="text" id="telegram_id" required name="telegram_id" placeholder="Telegram ID">
            <a href="https://t.me/bankofsit_bot?start=start">Here</a>
            <label for="telegram_check" id="result"></label>
            <input type="hidden" name="tg_verified" id="tg_verified" value="0">
            <input type="hidden" name="tg_chat_id" id="tg_chat_id">
            </div>        	
        </div>

        <input type="hidden" name="register" value="true">
        
		<div class="form-group">
			<div class="col-xs-8 col-xs-offset-4">
				<p><label class="checkbox-inline"><input type="checkbox" required> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a>.</label></p>
				<button class="btn btn-primary" type="submit">Submit</button>
			</div>  
		</div>		      
        <div class="text-center">Already have an account? <a id="login" data-toggle="modal" data-target="#loginModal">Login here</a></div>
    </form>
	
</div>
        <?php
            include "subview/footer.inc.php";
        ?>   
</body>
</html>