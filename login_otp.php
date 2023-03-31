<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login OTP</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/phone_otp.css">
    <script defer src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
        </script>
    <script defer src="js/main.js"></script>
    <script defer src="js/login_otp.js"></script>
</head>
<?php
    include "subview/nav.inc.php";
?>
<body>
    <?php
    include "subview/nav.inc.php";
    if (!isset($_SESSION['email'])) {
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
        <div class="d-flex justify-content-center align-items-center">
            <div class="card py-5 px-3">
                <h1 class="m-0">OTP:</h1>
                <span class="mobile-text">Enter the code we just send on your mobile phone</span>
                <div class="d-flex flex-row mt-5">
                    <form action="process/process_login.php" method="POST">
                        <div class="form-group">
                            <div class="inputfield" style="width: 100%;display: flex;justify-content: space-around;">
                                <input type="number" maxlength="1" class="input form-control" disabled />
                                <input type="number" maxlength="1" class="input form-control" disabled />
                                <input type="number" maxlength="1" class="input form-control" disabled />
                                <input type="number" maxlength="1" class="input form-control" disabled />
                                <input type="number" maxlength="1" class="input form-control" disabled />
                                <input type="number" maxlength="1" class="input form-control" disabled />
                                <input type="hidden" id="input-otp" name="input-otp" value="">
                                <?php if ($login_error): ?>
                                    <div id="loginErrorMessage" class="alert alert-danger" role="alert">
                                        <?php echo $login_error ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                </div>
                <button class="btn btn-primary" id="submit" onclick="validateOTP()" type="submit">Log In</button>
            </div>
        </div>
        </form>
        </div>
    </main>
</body>
<?php
include "subview/footer.inc.php";
?>
</html>