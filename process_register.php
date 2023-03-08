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
    <style>
        h4 {
            margin-top: 20px;
        }

        p {
            font-size: 16px;
            text-align: center;
            margin-top: 10px;
            text-decoration: blue;

        }

    </style>

</head>

<?php
$lastName = $email = $password = $confirmPassword = $errorMsg = "";
$success = true;

// Check if the required fields have been provided
if (empty($_POST["lname"])) {
    $errorMsg .= "Last name is <b>required</b><br>";
    $success = false;
} else {
    $lastName = sanitize_input($_POST["lname"]);
}

if (empty($_POST["email"])) {
    $errorMsg .= "Email is <b>required</b>.<br>";
    $success = false;
} else {
    $email = sanitize_input($_POST["email"]);
    // Verify email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg .= "Invalid email format.<br>";
        $success = false;
    }
}

if (empty($_POST["pwd"])) {
    $errorMsg .= "Password is <b>required</b>.<br>";
    $success = false;
}


if (empty($_POST["pwd_confirm"])) {
    $errorMsg .= "Confirm password is <b>required</b>.<br>";
    $success = false;
} else {
    $password = $_POST["pwd"];
    $confirmPassword = $_POST["pwd_confirm"];

    // Check if the passwords match
    if ($password != $confirmPassword) {
        $errorMsg .= "Passwords do not match.<br>";
        $success = false;
    }
}

if ($success) {
    include "nav.inc.php";
    echo "<div class='container mt-5'>";
    echo "<div class='row'>";
    echo "<div class='col-sm-12'>";
    echo "<h4 class='text-center' style ='color:green'>Registration successful!</h4>";
    echo "<p class='text-center'> Thank You For Registering " . $lastName . "</p>";
    echo "<p class='text-center'>Password Hash: " . password_hash($password, PASSWORD_BCRYPT) . "</p>";
    echo "<div class = 'text-center'>";
    echo "<a href='register.php'class = 'text-center'><button class='btn btn-primary btn-lg mx-auto' style='background-color:green; color: white;'>Login</button>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
} else {
    include "nav.inc.php";
    echo "<div class='container mt-5'>";
    echo "<div class='row'>";
    echo "<div class='col-sm-12'>";
    echo "<h4 class ='text-center' style ='color:red'>The following input errors were detected:</h4>";
    echo "<p class = 'text-center'>" . $errorMsg . "</p>";
    echo "<div class = 'text-center'>";
    echo "<a href='register.php'><button class='btn btn-primary btn-lg' style='background-color:red; color: white;'> Return To Sign Up</button>";
     echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}

// Helper function that checks input for malicious or unwanted content.
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function saveMemberToDB()
{
global $fname, $lname, $email, $pwd_hashed, $errorMsg, $success;
// Create database connection.
$config = parse_ini_file('../../private/db-config.ini'); $conn = new mysqli($config['servername'], $config['username'],
$config['password'], $config['dbname']);
// Check connection
if ($conn->connect_error)
{
$errorMsg = "Connection failed: " . $conn->connect_error;
$success = false; }
else {
// Prepare the statement:
$stmt = $conn->prepare("INSERT INTO world_of_pets_members (fname, lname, email, password) VALUES (?, ?, ?, ?)");
// Bind & execute the query statement: $stmt->bind_param("ssss", $fname, $lname, $email, $pwd_hashed); if (!$stmt->execute())
{
$errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
$success = false; }
$stmt->close(); }
$conn->close(); }

?>

