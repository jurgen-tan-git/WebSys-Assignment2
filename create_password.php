<?php 
    $validReq = false;
    $errorMessage = "";

    $selector = "";
    $validator = "";

    // Valid request
    if (isset($_GET["selector"]) && isset($_GET["validator"])) {
        $selector = $_GET["selector"];
        $validator = $_GET["validator"];
        if (!empty($_GET["selector"]) && !empty($_GET["validator"])) {
            $validReq = true;
        }
    } else if (isset($_GET["reset"])) {
        $validReq = false;
        $errorMessage = "Reset password failed! Please try requesting for a new email password reset.";

    } else {
        $validReq = false;
        $errorMessage = "We could not validate your request! Please try again";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" href="css/createpass.css">
    </head>
    <?php include "subview/nav.inc.php" ?>
    <main class="container">
        <div class="login">
            <?php if($validReq): ?>
                <div class="createpass-form">
                    <form class="createpass-form" action="process/process_login.php" method="POST">
                        <h1>Create New Password</h1>
                        <div class="row form-group">
                            <label class="text-black control-label col-xs-4" for="passwordField">Password:</label>
                            <input type="password" class="form-control" id="passwordField" required placeholder="Enter new password" name="password" >
                        </div>
                        <div class="row form-group">
                            <label class="text-black control-label col-xs-4" for="cfmPasswordField">Confirm Password:</label>
                            <input type="password" class="form-control" id="cfmPasswordField" required placeholder="Confirm new password" name="cfmPassword" >
                        </div>
                        <input type="hidden" name="selector" value="<?php echo $selector ?>">
                        <input type="hidden" name="validator" value="<?php echo $validator ?>">
                        <input type="hidden" name="createNewPassword" value="true">
                        <div class="row form-group">
                        <button class="btn btn-primary" type="submit" name="reset-password-submit">Create New Password</button>
                        </div>
                        <div class="row form-group">
                        <small><a href="index.php" id="backBtn"><u>Back to Login</u></a></small>
                        </div>
                    </form>
                </div>
            <?php else: ?>
                <h1>Sorry...</h1>
                <div id="loginErrorMessage" class="alert alert-danger" role="alert">
                    <?php echo $errorMessage ?>
                </div>
                <a href="login.php">Back to Login</a>
            <?php endif; ?>
        </div>
        <!-- img logo here -->

    </main>
        <?php
            include "subview/footer.inc.php";
        ?>       
</html>