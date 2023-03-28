<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title>World of Pets</title>    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/form.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script defer src="js/main.js"></script>
        <script defer src="js/register.js"></script>
        <link rel="stylesheet" href="css/account.css">
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
                    </div>
                <?php endif; ?>
                <div class ="text-center">
                    <h1>Add Transaction</h1>
                </div>
                <div class="transaction-form">
                    <form action="process/process_transaction.php" method="post" validate>
                        <div class="form-group">
                            <label for="amount" class="control-label col-xs-4">Amount:</label>
                            <input class="form-control" type="number" step='0.01' id="amount" maxlength="45" name="amount" required placeholder="Enter Amount">
                        </div>
                        <div class="form-group">
                            <label for="type" class="control-label col-xs-4">Type:</label>
                            <select class="form-control" name="type" id="type">
                                <option value="1">Deposit</option>
                                <option value="2">Withdrawal</option>
                            </select>
                        </div>
                        <input type="hidden" name="addTransaction" value="true">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                </div>
                </form>
        </main>
        <?php
        include "subview/footer.inc.php";
        ?>       
    </body>
    <script>

    </script>
</html>