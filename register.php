<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title>World of Pets</title>    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity=
        "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">
        <link rel="stylesheet" href="css/main.css">
        <script defer
                src="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                crossorigin="anonymous">
        </script>
        <script defer src="js/main.js"></script>
        <script defer src="js/register.js"></script>
    </head>
    <body>
        <?php
            include "nav.inc.php";
            $verify_bot = "Verify";
            $register_error = "";
            if (isset($_GET["error"])) {
                $register_error = "Sorry, it seems that something went wrong </b>. Please try again.";
            }
        ?>
        <main class="container">
            <?php if($register_error): ?>
                <div id="registerErrorMessage" class="alert alert-danger" role="alert">
                    <?php echo $register_error ?>
                </div>
            <?php endif; ?>
            <h1>Member Registration</h1>
            <p>
                For existing members, please go to the
                <a href="login.php">Sign In page</a>.
            </p>
            <form action="process/process_register.php" method="post" onsubmit="return checkValue()" validate>
                <div class="form-group">
                    <label for="fname">First Name:</label>
                    <input class="form-control" type="text" id="fname" maxlength="45" name="fname" placeholder="Enter first name">
                </div>
                <div class="form-group">
                    <label for="lname">Last Name:</label>
                    <input class="form-control" type="text" id="lname" required maxlength="45" name="lname" placeholder="Enter last name">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input class="form-control" type="email" id="email" required name="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input class="form-control" type="password" id="pwd" required name="pwd" placeholder="Enter password">
                </div>
                <div class="form-group">
                    <label for="pwd_confirm">Confirm Password:</label>
                    <input class="form-control" type="password" id="pwd_confirm" required name="pwd_confirm" placeholder="Confirm password">
                </div>
                <div class="form-group">
                    <label for="telegram_id">Register Telegram Bot 2FA:</label>
                    <a href="https://t.me/bankofsit_bot?start=start">Here</a>
                    <input class="form-control" type="text" id="telegram_id" required name="telegram_id" placeholder="Telegram ID">
                    <button class="btn" type="button" onclick="checkInput()">Check Input</button>
                    <label for="telegram_check" id="result">Verify</label>
                    <input type="hidden" name="tg_verified" id="tg_verified" value="0">
                    <input type="hidden" name="tg_chat_id" id="tg_chat_id">
                </div>
                <div class="form-check">
                    <label>
                        <input type="checkbox" required name="agree">
                        Agree to terms and conditions.
                    </label>
                </div>
                <input type="hidden" name="register" value="true">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </main>
        <?php
        include "footer.inc.php";
        ?>
    </body>
    <script>
        
    </script>
</html>