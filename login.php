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
    </head>
    <body>
        <?php
        include "nav.inc.php";
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
                $register_msg = "You have an existing email! Please log-in.";
            } 
        }
        ?>
        <main class="container">
            <?php if($register_msg): ?>
                <div id="registerSuccessMessage" class="alert" role="alert">
                    <?php echo $register_msg ?>
                </div>
            <?php endif; ?>
            <h1>Member Log In</h1>
            <p>
                Do not have an account? please go to the
                <a href="register.php">Sign Up page</a>.
            </p>
            <form action="process/process_login.php" method="POST">
                <div class="form-group">
                    <label for="emailAddressField"></label>
                    <input type="email" class="text-field" id="emailAddressField" placeholder="Email Address" name="email" value="<?php echo $email ?>" >
                </div>
                <div class="form-group">
                    <label for="passwordField"></label>
                    <input type="password" class="text-field" id="passwordField" placeholder="Password" name="password" value="<?php echo $password ?>" >
                </div>
                <input type="hidden" name="authenticate" value="true">
                <?php if($login_error): ?>
                    <div id="loginErrorMessage" class="alert alert-danger" role="alert">
                        <?php echo $login_error ?>
                    </div>
                <?php endif; ?>
                <button class="btn btn-primary" type="submit">Log In</button>
            </form>
        </main>
        <?php
        include "footer.inc.php";
        ?>
    </body>
</html>