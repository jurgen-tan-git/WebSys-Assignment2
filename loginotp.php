<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <script defer src="js/login_otp.js"></script>
    </head>
    <body>
        <?php
            include "nav.inc.php";
            if (!isset($_SESSION['email'])){
                session_destroy();
                header("Location: login.php");
            }
            $login_error = "";
            $email = $_SESSION['email'];
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "incorrect") {
                    $login_error = " Sorry, it seems that the <b> OTP is incorrect </b>. Please try again.";
                }
            }
        ?>
        <main class="container">
            </br></br></br></br></br>
            <h1>Please enter OTP:</h1>
            <form action="process/process_login.php" method="POST">
                <div class="form-group">
                    <div class="inputfield" style="width: 100%;display: flex;justify-content: space-around;">
                        <input type="number" maxlength="1" class="input" disabled />
                        <input type="number" maxlength="1" class="input" disabled />
                        <input type="number" maxlength="1" class="input" disabled />
                        <input type="number" maxlength="1" class="input" disabled />
                        <input type="number" maxlength="1" class="input" disabled />
                        <input type="number" maxlength="1" class="input" disabled />
                    </div>
                </div>
                
                <input type="hidden" id="input-otp" name="input-otp" value="">
                <?php if($login_error): ?>
                    <div id="loginErrorMessage" class="alert alert-danger" role="alert">
                        <?php echo $login_error ?>
                    </div>
                <?php endif; ?>
                <button class="btn btn-primary" id="btn-submit" onclick="validateOTP()" type="submit">Log In</button>
            </form>
        </main>
        <?php
        include "footer.inc.php";
        ?>
    </body>
</html>