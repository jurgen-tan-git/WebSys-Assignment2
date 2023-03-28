<?php
session_start();
require_once __DIR__. '/../vendor/autoload.php';
include_once '../helpers/sql.php';
$db = new Mysql_Driver();

//get request to send otp for deregister
//need to get 
if (!empty($_GET['email'])){
    $toEmail = $_GET['email'];
    //check !isset $_SESSION['telegram_id'] & $_SESSION['email']
    if(empty($toEmail)|| !isset($_SESSION['email'])){
        //if not set
        session_destroy();
        Header('Location: ../login.php?error');
        exit();
    }else{
        header('Content-Type: text/plain');
        error_reporting(E_ERROR | E_PARSE);
        //check if toEmail exist
        if($toEmail == $_SESSION['email']){
            $response = "self";
        }else{
            $db->connect();
            $qry = "SELECT * FROM account WHERE email = ?";
            $result = $db->query($qry, $toEmail);
            $db->close();
            if ($db->num_rows($result) > 0) {
                $response = "exist";
            }else{
                $response = "fail";
            }
        }
    }
    // Return the response as plain text
    echo $response;
}

//form sent
if (isset($_POST["transfer"])) {
    $email = $_SESSION["email"];
    // check if email field
    if (!isset($_SESSION["email"]) || empty($_POST['toAccount']) || empty($_POST['amount'])) {
        //check if have have email or password
        header("Location: ../transfer.php?error=empty");
        exit;
    } else {
        $toEmail = $_POST['toAccount'];
        $amount = $_POST['amount'];
        //deduct from email
        createTransaction(0,$amount,$email,$toEmail);
        //add to toEmail
        createTransaction(1,$amount,$email,$toEmail);
        header("Location: ../account.php");
    }
}
//create transaction
function createTransaction($type,$amount,$fromEmail,$toEmail)
{
    $result = true;
    global $db;
    try{
        //insert transaction
        $db->connect();
        //get transaction_id
        if ($type==1){
            $operator = "+";
            $frEmail = $toEmail;
            $rcvEmail = $fromEmail;
        }else{
            $operator = "-";
            $frEmail = $fromEmail;
            $rcvEmail = $toEmail;
        }
        $qry = "INSERT INTO transaction (type, amount, balance,istransfer,email) VALUES (?,?, (SELECT balance FROM account WHERE email = ?)".$operator."?,1,?);";
        $result = $db->query($qry,$type,$amount,$frEmail,$amount,$rcvEmail);
        //check if managed to insert
        if(!empty($result)|!empty($email)){
            $qry = "INSERT INTO account_transaction (account_id, transaction_id) VALUES ((SELECT account_id FROM account WHERE email = ?), ?)";
            $db->query($qry,$frEmail,$result);
            //update account balance
            $qry = "UPDATE account SET balance=(SELECT balance FROM transaction WHERE transaction_id = ?) WHERE email=?";
            $result = $db->query($qry,$result, $frEmail);
        }
    }catch (Exception $e) {
        echo $e;
    } finally {
        $db->close();
        return $result;
    }
}

//read transaction
function readTransaction(){
    global $db;
    $db->connect();
    $qry = "SELECT t.*,a.account_id,a.email FROM transaction t INNER JOIN account_transaction atran ON atran.transaction_id = t.transaction_id INNER JOIN account a ON atran.account_id = a.account_id WHERE email = ? ORDER BY timestamp DESC";
    $result = $db->query($qry, $_SESSION['email']);
    $db->close();
    if ($db->num_rows($result)>0) { 
        $row = $db->fetch_array($result);
        return $row;
    }
}

//update transaction
function updateTransaction($type,$amount,$transaction_id)
{
    global $db;
    $result = true;
    try{
        $db->connect();
        $qry = "UPDATE transaction SET type=?,amount=? WHERE transaction_id=?";
        $result = $db->query($qry,$type,$amount,$transaction_id);
    }catch (Exception $e) {
        echo $e;
        $result= false;
    } finally {
        $db->close();
        return $result;
    }
}

//delete transaction
function deleteTransaction($transaction_id)
{
    global $db;
    $result = true;
    try{
        $db->connect();
        $qry = "DELETE FROM transaction WHERE transaction_id=?";
        $result = $db->query($qry,$transaction_id);
    }catch (Exception $e) {
        echo $e;
        $result= false;
    } finally {
        $db->close();
        return $result;
    }
}

//update balance
function updateBalance($balance)
{
    global $account_id,$db;
    $result = true;
    try{
        $db->connect();
        $qry = "UPDATE account SET balance=? WHERE account_id=?";
        $result = $db->query($qry,$balance, $account_id);
    }catch (Exception $e) {
        echo $e;
        $result= false;
    } finally {
        $db->close();
        return $result;
    }
}
?>