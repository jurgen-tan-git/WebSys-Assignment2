<?php
    require_once __DIR__. '/../vendor/autoload.php';
    if (isset($_POST['submit'])){
        if (isset($_POST['name'])||isset($_POST['subject'])||isset($_POST['mail'])||isset($_POST['message'])){
            $name = sanitize_input($_POST['name']);
            $subject = sanitize_input($_POST['subject']);
            $mailTo = sanitize_input($_POST['mail']);
            $message = sanitize_input($_POST['message']);
            try{        
                $mail = new PHPMailer\PHPMailer\PHPMailer();
                
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
                $mail->AddAddress($mailTo); //to
                //Message
                $mail->isHTML();
                $mail->Subject = $subject;
                $message = "<p>You have received an e-mail from ".$name.".\n\n".$message."</p>";
                $mail->Body = $message;

                if (!$mail->send()) {
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                    $pageUrl = "../about_us.php?mailsend==fail";
                } else {
                    echo 'Message sent!';
                    $pageUrl = "../about_us.php?mailsend=success";
                }
                header("Location: $pageUrl");
                exit();
            } catch (Exception $e) {
                echo $e;
                die($e->getMessage());
            }
        }
    }
//Not sure if we have a email but bankofsit@gmail.com and pw is Bankofsit1009
function sanitize_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>