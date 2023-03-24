<?php
session_start();
require_once __DIR__. '/../vendor/autoload.php';
include_once '../helpers/sql.php';
$db = new Mysql_Driver();

//get request to send otp for deregister
//need to get 
if (!empty($_GET['deregister_otp'])){
    //check !isset $_SESSION['telegram_id'] & $_SESSION['email']
    if(empty($_SESSION['telegram_id']) || empty($_SESSION['email'])){
        //if not set
        session_destroy();
        Header('Location: ../index.php');
    }else{
        //if set
        //get tg id and email from session
        $chat_id = $_SESSION['telegram_id'];
        $email = $_SESSION['email'];
        header('Content-Type: text/plain');
        error_reporting(E_ERROR | E_PARSE);
        //otp
        $otp = rand(100000,999999);
        //send otp
        $apiToken = "5954482111:AAGscQl3YDz5db9Ixzuu-OGFiGShXPBych4";
        if ($chat_id != false){
            $message = "This is your OTP:". "\n" .$otp ;
            $data = [
                'chat_id' => $chat_id,
                'text' => $message 
            ];
            $json_response = curl_req("https://api.telegram.org/bot".$apiToken."/sendMessage?" . http_build_query($data) );
            if($json_response["ok"] == false){
                $response = "false";
            }else{
                $response = $chat_id;
            }
        } else{
          $response = "false";  
        }

        //update otp to db
        $db->connect();
        $qry= "UPDATE account SET otp=?, otp_timestamp_expired=DATE_ADD(NOW(), INTERVAL 1 MINUTE) WHERE email=?";
        $result = $db->query($qry,password_hash($otp,PASSWORD_DEFAULT),$email);
        $db->close();
    }
    // Return the response as plain text
    echo $response;
}

//form sent
if (isset($_POST["deregister_otp"])) {
    $password = $_POST["password"];
    $otp = $_POST["otp"];
    $email = $_SESSION["email"];
    // check if email field
    if (isset($_SESSION["email"]) && empty($password) && empty($otp)) {
        //check if have have email or password
        header("Location: ../close_account.php?error=incrrect");
        exit;
    } else {
        //check if account is valid
        $db->connect();
        $qry = "SELECT * FROM Account WHERE email = ?";
        $result = $db->query($qry, $email);
        $db->close();
        if ($db->num_rows($result) > 0) {
            $row = $db->fetch_array($result);
            $userId = $row["id"];
            $fname = $row["fname"];
            $chat_id = $row["tg_chat_id"];
            //check otp and password correct
            if (password_verify($password, $row["password"]) || password_verify($otp, $row["otp"])) {
                //delete account_transaction & transaction
                $db->connect();
                $qry = "DELETE t,tr FROM account_transaction t INNER JOIN account a ON t.account_id = a.account_id INNER JOIN transaction tr ON tr.transaction_id = t.transaction_id WHERE email = ?";
                $result = $db->query($qry, $email);
                //delete account
                $qry = "DELETE FROM account WHERE email = ?";
                $result = $db->query($qry, $email);
                $db->close();
                session_destroy();
                header("Location: ../login.php");
                exit;
            }else{
                header("Location: ../login.php?error=incorrect");
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

function curl_req($link){
    $cURLConnection = curl_init();
    curl_setopt($cURLConnection, CURLOPT_URL, $link);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    $curl_result = curl_exec($cURLConnection);
    curl_close($cURLConnection);
    return json_decode($curl_result,true);
}
?>