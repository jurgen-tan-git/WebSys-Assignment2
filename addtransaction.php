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
        <script defer src="js/register.js"></script>
    </head>
    <body>
        <?php
            include "nav.inc.php";
            $verify_bot = "Verify";
            $register_error = "";
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
            <h1>Add Transaction</h1>
            <p>
            </p>
            <form action="process/process_transaction.php" method="post" validate>
                <div class="form-group">
                    <label for="amount">Amount:</label>
                    <input class="form-control" type="text" id="amount" maxlength="45" name="amount" placeholder="Enter Amount">
                </div>
                <div class="form-group">
                    <label for="type">Type:</label>
                    <select class="form-control" name="type" id="type">
                        <option value="1">Deposit</option>
                        <option value="2">Withdrawal</option>
                    </select>
                </div>
                <input type="hidden" name="addTransaction" value="true">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </main>
        <div class="footer-margin">
        <?php
            include "footer.inc.php";
        ?>       
         </div>
    </body>
    <script>
        
    </script>
</html>