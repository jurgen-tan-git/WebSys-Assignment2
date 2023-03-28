<?php
    session_start();
    include_once '../helpers/sql.php';
    $db = new Mysql_Driver();

    $email = $_SESSION["email"];
    $account_id = $_SESSION['user_id'];
    $balance = $_SESSION['balance'];

    if (empty($email)|empty($account_id)) {
        // check if email field
        session_destroy();
        header("Location: login.php");
        exit;
    }

    //update balanace
    if (isset($_POST["updateBalance"])) {
        $balance = $_POST["balance"];
        $email = $_POST["email"];
        updateBalance($balance,$email);
    }

    if(isset($_POST["addTransaction"])){
        $type = $_POST["type"];
        $amount = $_POST["amount"];
        if (empty($type)|empty($amount)) {
            //show fail
            echo $type;
            echo $amount;
            exit;
        }
        $result = createTransaction($type,$amount,$email);
        echo $result;
        header("Location: ../account.php");
    }

    //create transaction
    function createTransaction($type,$amount)
    {
        $result = true;
        global $email,$account_id,$balance,$db;
        try{
            //insert transaction
            $db->connect();
            //get transaction_id
            if ($type==1){
                $operator = "+";
            }else{
                $operator = "-";
            }
            $qry = "INSERT INTO transaction (type, amount, balance) VALUES (?,?, (SELECT balance FROM account WHERE email = ?)".$operator."?);";
            $result = $db->query($qry,$type,$amount,$email,$amount);
            //check if managed to insert
            if(!empty($result)|!empty($account_id)){
                $qry = "INSERT INTO account_transaction (account_id, transaction_id) VALUES (?, ?)";
                $db->query($qry,$account_id,$result);
                //update account balance
                $qry = "UPDATE account SET balance=(SELECT balance FROM transaction WHERE transaction_id = ?) WHERE account_id=?";
                $result = $db->query($qry,$result, $account_id);
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