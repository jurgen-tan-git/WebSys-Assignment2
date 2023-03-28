<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
            <meta charset="UTF-8">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="css/register.css">
        <link rel="stylesheet" href="css/account.css">
        <link href="https://fonts.googleapis.com/css?family=Inter:100,200,300,regular,500,600,700,800,900&display=swap" rel="stylesheet">
        <script defer src="js/main.js"></script>
        <script defer src="js/register.js"></script>
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
			<label class="control-label col-xs-4" for="telegram_id">Register Telegram Bot 2FA <a href="https://t.me/bankofsit_bot?start=start" target="_blank">Here</a>:</label>
			<div class="col-xs-8">

            <input class="form-control" type="text" id="telegram_id" required name="telegram_id" placeholder="Telegram ID">
            <span class="link" onclick="checkInput()">Check Telegram</span>                   
            <label for="telegram_check" id="result"></label>
            <input type="hidden" name="tg_verified" id="tg_verified" value="0">
            <input type="hidden" name="tg_chat_id" required id="tg_chat_id">
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