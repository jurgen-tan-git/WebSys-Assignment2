<?php
    session_start();

    include_once '../helpers/sql.php';
    $db = new Mysql_Driver();

    if (isset($_POST["authenticate"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        // check if email field
        if (empty($email) || empty($password)) {
            // check if email field
            session_destroy();
            header("Location: login.php");
            exit;
        } else {
            // check if account is valid
            $db->connect();
            $qry = "SELECT * FROM Account WHERE email = ?";
            $result = $db->perform_query($qry, $email);
            $db->close();
            
            if ($db->num_rows($result) > 0) { 
                $row = $db->fetch_array($result);
                $userId = $row["id"]; 
                $fname = $row["fname"];
                if (password_verify($password, $row["password"])) {
                    /*session_regenerate_id();
                    $_SESSION['loggedin'] = TRUE;*/
                    $_SESSION['email'] = $email;
                    $_SESSION['user_id'] = $userId;
                    $_SESSION['fname'] = $fname;

                    //otp
                    $otp = rand(100000,999999);
                    //send otp
                    $apiToken = "";
                    $message = "This is your OTP:". "\n" .$otp ;
                    $data = [
                    'chat_id' => '-1001888468634',
                    'text' => $message 
                    ];
                    $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );

                    //update otp to db
                    $db->connect();
                    $qry= "UPDATE account SET otp=?, otp_timestamp_expired=DATE_ADD(NOW(), INTERVAL 1 MINUTE) WHERE email=?";
                    $result = $db->perform_query($qry,password_hash($otp,PASSWORD_DEFAULT),$email);
                    $db->close();
                    header("Location: ../loginotp.php");
                    exit;
                }
            }
            header("Location: ../login.php?error=incorrect");
            exit;
        }
    }if (isset($_POST["input-otp"])){        
        $input = $_POST["input-otp"];
        // check if email field
        if (empty($input)) {
            session_destroy();
            header("Location: ../login.php");
            exit;
        } else {
            // check if otp is valid
            $db->connect();
            $qry = "SELECT * FROM Account WHERE email = ?";
            $result = $db->perform_query($qry, $_SESSION['email']);
            $db->close();
            
            if ($db->num_rows($result) > 0) { 
                $row = $db->fetch_array($result);
                $hashed_otp = $row["otp"]; 
                $expiry_timestamp = $row["otp_timestamp_expired"];
                if (password_verify($input, $hashed_otp)) {
                    //check timing
                    if (time() < strtotime($expiry_timestamp)){
                        //if correct
                        session_regenerate_id();
                        $_SESSION['loggedin'] = TRUE;
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['fname'] = $row['fname'];
                        header("Location: ../index.php");
                        exit;
                    }
                }
            }
            header("Location: ../loginotp.php?error=incorrect");
            exit;
        }
    }else {
        echo $_SESSION['email'];
    }

?>
