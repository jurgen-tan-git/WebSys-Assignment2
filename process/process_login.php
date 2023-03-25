<?php
    session_start();
    
    require_once __DIR__. '/../vendor/autoload.php';
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
            $result = $db->query($qry, $email);
            $db->close();
            if ($db->num_rows($result) > 0) { 
                $row = $db->fetch_array($result);
                $userId = $row["id"]; 
                $fname = $row["fname"];
                $chat_id = $row["tg_chat_id"];
                if (password_verify($password, $row["password"])) {
                    $_SESSION['email'] = $email;
                    //otp
                    $otp = rand(100000,999999);
                    //send otp
                    $apiToken = "5954482111:AAGscQl3YDz5db9Ixzuu-OGFiGShXPBych4";
                    $message = "This is your OTP:". "\n" .$otp ;
                    $data = [
                    'chat_id' => $chat_id,
                    'text' => $message 
                    ];
                    $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );

                    //update otp to db
                    $db->connect();
                    $qry= "UPDATE account SET otp=?, otp_timestamp_expired=DATE_ADD(NOW(), INTERVAL 1 MINUTE) WHERE email=?";
                    $result = $db->query($qry,password_hash($otp,PASSWORD_DEFAULT),$email);
                    $db->close();
                    header("Location: ../login_otp.php");
                    exit;
                }
            }
            header("Location: ../login.php?error=incorrect");
            exit;
        }
    }

    if (isset($_POST["input-otp"])){        
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
            $result = $db->query($qry, $_SESSION['email']);
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
                        $_SESSION['telegram_id'] = $row['tg_chat_id'];
                        $_SESSION['user_id'] = $row['account_id'];
                        $_SESSION['fname'] = $row['fname'];
                        $_SESSION['balance'] = $row['balance'];
                        header("Location: ../index.php");
                        exit;
                    }
                }
            }
            header("Location: ../login_otp.php?error=incorrect");
            exit;
        }
    }

    if (isset($_POST["forgotPassword"])) {
        try {
            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $selector = bin2hex(random_bytes(8));
            $token = random_bytes(32);

            $url = "/../createNewPassword.php?selector=" . $selector . "&validator=" . bin2hex($token);
            
            // Set expiry for tokens
            $email = $_POST["email"];

            $db->connect();
            $qry = "DELETE FROM pwd_reset WHERE email=?";
            $result = $db->query($qry, $email);
            $qry = "INSERT INTO pwd_reset (email, reset_selector, reset_token, reset_expires) VALUES (?, ?, ?, DATE_ADD(NOW(), INTERVAL 30 MINUTE))";
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
            $result = $db->query($qry, $email, $selector, $hashedToken);
            $db->close();
            
            // Prepare email
            $mail->IsSMTP(); // enable SMTP
            $mail->SMTPDebug = 2;  // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true;  // authentication enabled
            $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
            $mail->Host = 'smtp-mail.outlook.com';
            $mail->Port = 587;
            
            $mail->Username = 'bosit.hello@outlook.com';
            $mail->Password = 'inf1005test';
            
            $mail->setFrom('bosit.hello@outlook.com', 'Bank of SIT');
            $mail->AddAddress($email); //to
            //Message
            $mail->isHTML();
            $mail->Subject = 'Reset password for your Bank of SIT account.';
            $message = "<p>The link to reset your password is at the bottom of this email.
            If you did not make this request, please ignore this email</p>
            <p><b>(This is auto-generated. Please do not reply to this email)</b></p>";
            $message .= "<p> Here is your password reset link: </br>";
            $message .= '<a href="' .$_SERVER['SERVER_NAME']."/". $url . '">' .$_SERVER['SERVER_NAME']."/". $url . '</a></p>';
            $mail->Body = $message;

            if (!$mail->send()) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
                $pageUrl = "../forgot_password.php?reset=fail";
            } else {
                echo 'Message sent!';
                $pageUrl = "../forgot_password.php?reset=success";
            }
            header("Location: $pageUrl");
            exit();
        } catch (Exception $e) {
            echo $e;
            die($e->getMessage());
        }
    }
    if (isset($_POST["createNewPassword"])) {
        $selector = $_POST["selector"];
        $validator = $_POST["validator"];
        $password = $_POST["password"];
        $cfmPassword = $_POST["cfmPassword"];

        if (empty($password) || empty($cfmPassword)) {
            $pageUrl = '../create_password.php' . "?selector=" . $selector . "&validator=" . $validator . "&error=empty";
            header("Location: $pageUrl");
            exit;
        } else if ($password !== $cfmPassword) {
            $pageUrl = '../create_password.php' . "?selector=" . $selector . "&validator=" . $validator . "&error=pwdnotsame";
            header("Location: $pageUrl");
            exit;
        }

        $db->connect();
        $qry = "SELECT * FROM pwd_reset WHERE reset_selector= ? AND reset_expires >= NOW()";
        $result = $db->query($qry, $selector);
        
        if ($db->num_rows($result) <= 0) {
            echo "Please resubmit your password reset request.";
            $pageUrl = '../create_password.php' . '?reset=failed';
            header("Location: $pageUrl");
            exit; 
        }

        while ($row = $db->fetch_array($result)) {
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["reset_token"]);

            if (!$tokenCheck) {
                // You need to resubmit your reset request
                echo "You need to resubmit your reset request2";
                $pageUrl = '../create_password.php' . '?reset=failed2';
                header("Location: $pageUrl");
                exit; 
            } else if ($tokenCheck) {

                // Update the password
                $tokenEmail = $row['email'];

                $qry = "SELECT * FROM account WHERE email=?";

                $accountResult = $db->query($qry, $tokenEmail);

                if ($db->num_rows($accountResult) <= 0) {
                    // You need to resubmit your reset request
                    echo "You need to resubmit your reset request3";
                    $pageUrl = '../create_password.php' . '?reset=failed3';
                    header("Location: $pageUrl");
                    exit; 
                } else {
                    $qry = "UPDATE account SET password=? WHERE email=?";
                    $db->query($qry, password_hash($password, PASSWORD_DEFAULT), $tokenEmail);
    
                    // Delete tokens after use
                    $qry = "DELETE FROM pwd_reset WHERE email=?";
                    $db->query($qry, $tokenEmail);
                    $db->close();
    
                    $pageUrl = '../account.php' . "?pwdupdate=success";
                    header("Location: $pageUrl");
                    exit;
                }
            }
        }
    }
?>