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
        ?>
        <main class="container">
            <?php
                $email = $fname = $lname = $pwd = $pwd_cfm = $pwd_hashed = $errorMsg = "";
                $success = true;

                if (!empty($_POST["fname"]))
                {
                    $fname = sanitize_input($_POST["fname"]);
                    if(strlen($fname) > 45){
                        $errorMsg .= "First name cannot be more than 45 characters.<br>";
                        $success = false;
                    }
                }

                if (empty($_POST["lname"]))
                {
                    $errorMsg .= "Last name is required.<br>";
                    $success = false;
                }
                else{
                    $lname = sanitize_input($_POST["lname"]);
                    if(strlen($lname) > 45){
                        $errorMsg .= "Last name cannot be more than 45 characters.<br>";
                        $success = false;
                    }
                }

                if (empty($_POST["pwd"]))
                {
                    $errorMsg .= "Password is required.<br>";
                    $success = false;
                }
                else{
                    $pwd = password_hash($_POST["pwd"],PASSWORD_DEFAULT);
                }

                if (empty($_POST["pwd_confirm"]))
                {
                    $errorMsg .= "Confirm Password is required.<br>";
                    $success = false;
                }
                else{
                    if(!password_verify($_POST["pwd_confirm"],$pwd)){
                        $errorMsg .= "Passwords do not match.<br>";
                        $success = false;
                    }
                }

                if (empty($_POST["email"]))
                {
                    $errorMsg .= "Email is required.<br>";
                    $success = false;
                }
                else
                {
                    $email = sanitize_input($_POST["email"]);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                        $errorMsg .= "Invalid email format.";
                        $success = false;
                    }
                }
                
                if ($success)
                {
                    saveMemberToDB();
                    echo "<h2>Your registration is successful!</h2>";
                    echo "<h3>Thank you for signing up, ". $fname ." ". $lname .".</h3>";
                    echo '<a class="btn btn-success" href="login.php">Log-in</a>';
                    //create log in button

                }
                else
                {
                    echo "<h1>Oops!</h1>";
                    echo "<h2>The following errors were detected:</h2>";
                    echo "<p>" . $errorMsg . "</p>";
                    echo '<a class="btn btn-danger" href="register.php">Return to Sign Up</a>';
                }
                //Helper function that checks input for malicious or unwanted content.
                function sanitize_input($data)
                {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                /*
                * Helper function to write the member data to the DB
                */
                function saveMemberToDB()
                {
                    global $fname, $lname, $email, $pwd, $errorMsg, $success;
                    // Create database connection.
                    $config = parse_ini_file('../../private/db-config.ini');
                    $conn = new mysqli($config['servername'], $config['username'],
                    $config['password'], $config['dbname']);
                    // Check connection
                    if ($conn->connect_error)
                    {
                        $errorMsg = "Connection failed: " . $conn->connect_error;
                        $success = false;
                    }
                    else
                    {
                        // Prepare the statement:
                        $stmt = $conn->prepare("INSERT INTO world_of_pets_members (fname, lname,
                        email, password) VALUES (?, ?, ?, ?)");
                        // Bind & execute the query statement:
                        $stmt->bind_param("ssss", $fname, $lname, $email, $pwd);
                        if (!$stmt->execute())
                        {
                            $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                            $success = false;
                        }
                        $stmt->close();
                    }
                    $conn->close();
                }
            ?>
        </main>
        <?php
            include "footer.inc.php";
        ?>
    </body>
</html>