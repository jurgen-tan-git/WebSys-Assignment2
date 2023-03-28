<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    <main class="container">
        <div class="top-container">
            <?php if ($register_msg): ?>
                <div id="registerSuccessMessage" class="alert" role="alert">
                    <?php echo $register_msg ?>
                </div>
            <?php endif; ?>
            <div class="signup-form">
            <form action="process/process_login.php" method="POST" class="form-horizontal">
                    <div class="col-xs-8 col-xs-offset-4">
                        <h2>Member Log In</h2>
                        <p>
                            Do not have an account? please go to the
                            <a href="register.php">Sign Up page</a>.
                        </p>
                    </div>
                         <div class="form-group">
                            <label class="control-label col-xs-4" for="emailAddressField">Email Address:</label>
                            <div class="col-xs-8">
                                <input type="email" class="form-control" id="emailAddressField" required
                                    placeholder="Email Address" name="email" value="<?php echo $email ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-4" for="passwordField">Password:</label>
                            <div class="col-xs-8">
                                <input type="password" class="form-control" id="passwordField" required
                                    placeholder="Password" name="password" value="<?php echo $password ?>">
                            </div>
                        </div>
                        <input type="hidden" name="authenticate" value="true">
                        <?php if ($login_error): ?>
                            <div id="loginErrorMessage" class="alert alert-danger" role="alert">
                                <?php echo $login_error ?>
                            </div>
                        <?php endif; ?>
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">Log In</button>
                        </div>
                        <div class="text-center">
                            <a href="forgot_password.php">Forgot Password</a>
                        </div>
                    </form>
            </div>
        </div>
    </main>
        <?php
        include "subview/footer.inc.php";
        ?>
</body>

</html>