<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title>Account Closure</title>    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity=
              "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/account.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script defer src="js/deregister.js"></script>
    </head>
        <?php
        include "subview/nav.inc.php";?>
    <body>
        <?php
        $verify_bot = "Verify";
        $register_error = "";
        if (!isset($_SESSION['email']) | !isset($_SESSION['user_id']) | !isset($_SESSION['telegram_id']) | !isset($_SESSION['fname'])) {
            session_destroy();
            header("Location: login.php");
            exit;
        }
        if (isset($_GET["error"])) {
            $register_error = "Sorry, it seems that something went wrong </b>. Please try again.";
        }
        ?>
        <main class="container">
            <div class="top-container">
            <?php if ($register_error): ?>
                <div id="registerErrorMessage" class="alert alert-danger" role="alert">
                    <?php echo $register_error ?>
                </div>
            <?php endif; ?>
            <div class ="text-center">
                <h1>Close Account</h1>
            </div>
            
            <div class="transaction-form">
                <p class="text">
                Hi <?php echo $_SESSION['fname'] ?>, please check if you have remaining balance in your account before closing, any balance in account will be donated to SIT.
            </p>
            <form action="process/process_deregister.php" method="post" validate>
                <div class="form-group">
                    <label for="pwd" class="control-label col-xs-4">Password:</label>
                    <input class="form-control" type="password" id="pwd" required name="pwd" placeholder="Enter password">
                </div>

                <div class="form-group">
                    <!--get otp-->
                    <label class="control-label col-xs-4" for="otp">Get OTP:</label>
                    <span class="link" onclick="sendOtp()">Send OTP</span>
                    <!--input otp-->
                    <input class="form-control" type="text" id="otp" required name="otp" placeholder="One Time Password">
                    <input type="hidden" name="tg_verified" id="tg_verified" value="0">
                </div>
                <div class="form-check">
                    <label class="control-label col-xs-4">
                        <input type="checkbox" required name="agree">
                        Agree to terms and conditions.
                    </label>
                </div>
                <input type="hidden" name="deregister_otp" value="true">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
            </div>
        </main>
    </body>
            <?php
            include "subview/footer.inc.php";
            ?>      
</html>