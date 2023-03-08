<head>
    <title>World of Pets</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity=
          "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <!--jQuery-->
    <script async src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!--Bootstrap JS--> 
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous">
    </script>
    <!-- Custom JS -->
    <script defer src="js/main.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body> <?php
    include "nav.inc.php";
    ?>
    <main class="container">
        <h1>Member Registration</h1>
        <p>
            For existing members, please go to the
            <a href="#">Sign In page</a>.
        </p>
        <form action="process_register.php" method="post" >
            <div class="form-group">
                <label for="fname">First Name:</label>
                <input class="form-control" type="text" id="fname"
                       name="fname" placeholder="Enter first name">
            </div>
            <div class="form-group">
                <label for="lname">Last Name:</label>
                <input class="form-control" type="text" id="lname"
                       required name="lname" placeholder="Enter last name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input class="form-control" type="email" id="email"
                       required name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input class="form-control" type="password" id="pwd"
                       required name="pwd" placeholder="Enter password">
            </div>
            <div class="form-group">
                <label for="pwd_confirm">Confirm Password:</label>
                <input class="form-control" type="password" id="pwd_confirm"
                       required name="pwd_confirm" placeholder="Confirm password">
            </div>
            <div class="form-check">
                <label>
                    <input type="checkbox" required name="agree" >
                    Agree to terms and conditions.
                </label>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </main>
    <?php
    include "footer.inc.php";
    ?>
</body>