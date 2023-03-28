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
        <link rel="stylesheet" href="css/form.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/account.css">

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script defer src="js/main.js"></script>
        <script defer src="js/transfer.js"></script>
    </head>
    <body>
        <?php
        include "subview/nav.inc.php";
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
                    <?php endif; ?>
                    <div class="text-center">
                        <h1>Transfer</h1>
                    </div>
                    <div class="transaction-form">
                        <form action="process/process_transfer.php" onsubmit="return checkValue()" method="post" validate>
                            <div class="form-group">
                                <label for="amount" class="control-label col-xs-4">Amount:</label>
                                <input class="form-control" type="number" step='0.01' id="amount" maxlength="45" name="amount" placeholder="Enter Amount">
                            </div>
                            <div class="form-group">
                                <!--get otp-->
                                <label for="toAccount" class="control-label col-xs-4">To:</label>
                                <!--input otp-->
                                <input class="form-control" type="email" id="toAccount" required name="toAccount" placeholder="To Email:">
                                <span class="link" onclick="checkaccount()">Check Account</span>                   
                                <input type="hidden" name="transfer" value="true">
                                <label for="account_check" id="result"></label>
                                <input type="hidden" name="acct_exist" id="acct_exist" value="0">
                            </div>               
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Transfer</button>
                            </div>
                    </div>
                    </form>
                </div>
        </main>

        <?php
        include "subview/footer.inc.php";
        ?>       
    </body>
</html>