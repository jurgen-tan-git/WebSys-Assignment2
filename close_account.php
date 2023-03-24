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
        <script defer src="js/deregister.js"></script>
    </head>
    <body>
        <?php
            include "subview/nav.inc.php";
            $verify_bot = "Verify";
            $register_error = "";
            if (!isset($_SESSION['email'])|!isset($_SESSION['user_id'])|!isset($_SESSION['telegram_id'])|!isset($_SESSION['fname'])) {
                session_destroy();   
                header("Location: login.php");
                exit;
            }
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
            <h1>Close Account</h1>
            <p>
                Hi <?php echo $_SESSION['fname'] ?>, please check if you have remaining balance in your account before closing, any balance in account will be donated to SIT.
            </p>
            <form action="process/process_deregister.php" method="post" validate>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input class="form-control" type="password" id="pwd" required name="pwd" placeholder="Enter password">
                </div>

                <div class="form-group">
                <!--get otp-->
                    <label for="otp">Get OTP:</label>
                    <button class="btn" type="button" id="btnotp" onclick="sendOtp()">Send OTP</button>
                    <!--input otp-->
                    <input class="form-control" type="text" id="otp" required name="otp" placeholder="One Time Password">
                    <input type="hidden" name="tg_verified" id="tg_verified" value="0">
                </div>
                <div class="form-check">
                    <label>
                        <input type="checkbox" required name="agree">
                        Agree to terms and conditions.
                    </label>
                </div>
                <input type="hidden" name="deregister_otp" value="true">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </main>
        <div class="footer-margin">
        <?php
            include "subview/footer.inc.php";
        ?>       
         </div>
    </body>
    <script>
    </script>
</html>