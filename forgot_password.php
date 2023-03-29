<?php  
    $success = false;
    if (isset($_GET["reset"])) {
        if ($_GET["reset"] == "success") {
            $success = !$success;
        }
    }
    $email = "";
?>

<!DOCTYPE html>
<html lang="en">
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
        <link rel="stylesheet" href="css/forgetpass.css">
        <script defer
                src="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                crossorigin="anonymous">
        </script>
        <script defer src="js/main.js"></script>
    </head>
    <body>
        <?php
            include "subview/nav.inc.php";
        ?>
        <main class="container">
            <div class="forgetpass-form">
                <form class="forgetpass-form" action="process/process_login.php" method="POST">
                    <div class="col-xs-8 col-xs-offset-4">
                        <h2>Reset your Password</h2>
                        <p>An e-mail will be send to you with instructions on how to reset your password.</p>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="hidden" name="forgotPassword" value="true">
                            <label class="text-black control-label col-xs-4" for="emailAddressField">Email Address:</label>
                            <input type="email" class="form-control" id="emailAddressField" required placeholder="Email Address" name="email" value="<?php echo $email ?>" >
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit" name="reset-request-submit">Reset Password</button>
                        </div>
                    </div>
                    <?php if($success): ?>
                        <div id="loginErrorMessage" class="alert alert-success" role="alert">
                            Email sent successfully, Please check your email!
                        </div>
                    <?php endif; ?>
                </form>
                <small><a href="<?php echo $helper->pageUrl("index.php")?>" id="backBtn"><u>Back to Login</u></a></small>
            </div>
        </main>
        <?php
            include "subview/footer.inc.php";
        ?> 
    </body>
</html>