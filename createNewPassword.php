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
    <?php include "nav.inc.php" ?>
    <main class="login-container">
        <div class="login">
            <?php if($validReq): ?>
                <h1>Create New Password</h1>
                <form action="process/process_login.php" method="POST">
                    <div class="form-group">
                        <label for="passwordField"></label>
                        <input type="password" class="form-control" id="passwordField" required placeholder="Enter new password" name="password" >
                    </div>
                    <div class="form-group">
                        <label for="cfmPasswordField"></label>
                        <input type="password" class="form-control" id="cfmPasswordField" required placeholder="Confirm new password" name="cfmPassword" >
                    </div>
                    <input type="hidden" name="selector" value="<?php echo $selector ?>">
                    <input type="hidden" name="validator" value="<?php echo $validator ?>">
                    <input type="hidden" name="createNewPassword" value="true">
                    <button class="btn btn-login" type="submit" name="reset-password-submit">Create New Password</button>
                </form>
                <small><a href="index.php" id="backBtn"><u>Back to Login</u></a></small>
            <?php else: ?>
                <h1>Sorry...</h1>
                <div id="loginErrorMessage" class="alert alert-danger" role="alert">
                    <?php echo $errorMessage ?>
                </div>
                <small><a href="index.php" id="backBtn"><u>Back to Login</u></a></small>
            <?php endif; ?>
        </div>
        <!-- img logo here -->

    </main>
    <div class="footer-margin">
        <?php
            include "footer.inc.php";
        ?>       
         </div>
</html>