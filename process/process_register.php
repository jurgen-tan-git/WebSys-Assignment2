<?php
    require_once __DIR__. '/../vendor/autoload.php';
    include_once '../helpers/sql.php';
    $db = new Mysql_Driver();

    $email = $fname = $lname = $pwd = $pwd_cfm = $pwd_hashed = $tg_chat_id = $errorMsg = "";
    $success = true;
    if (isset($_POST["register"])) {
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

        if (!empty($_POST["tg_chat_id"]))
        {
            $tg_chat_id = sanitize_input($_POST["tg_chat_id"]);
            //echo "chatid". $tg_chat_id ;
            if($tg_chat_id == ""){
                $errorMsg .= "Telegram ID cannot be empty.<br>";
                $success = false;
            }
        }

        if ($success)
        {   
            $result = true;
            try{
                $db->connect();
                $qry = "INSERT INTO account (fname, lname,email,tg_chat_id, password) VALUES (?, ?,?, ?, ?)";
                $result = $db->query($qry,$fname, $lname, $email, $tg_chat_id, $pwd);
            }catch (Exception $e) {
                $result = $e;
            } finally {
                $db->close();
            }
            $savetodb = $result;
            if (is_int($savetodb)){
                header("Location: ../login.php?register=success");
            }else if(str_contains($savetodb,"duplicate")){
                header("Location: ../login.php?register=exist");
            }else{
                header("Location: ../register.php?error=invalid");
            }
        }
        else
        {
            header("Location: ../register.php?error=invalid");
        }
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
        global $fname, $lname, $email, $tg_chat_id, $pwd, $db;
    }
?>