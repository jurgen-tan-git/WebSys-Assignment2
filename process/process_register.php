<?php
    include_once __DIR__. '/../helpers/sql.php';

    $db = new Mysql_Driver();

    $email = $fname = $lname = $pwd = $pwd_cfm = $pwd_hashed = $errorMsg = "";
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
        
        if ($success)
        {   
            $savetodb = saveMemberToDB();
            //echo $savetodb;
            if ($savetodb == false){
                header("Location: ../login.php?register=success");
            }else if($savetodb == "duplicate"){
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
        global $fname, $lname, $email, $pwd, $db;
        $result = true;
        try{
            $db->connect();
            $qry = "INSERT INTO account (fname, lname,email, password) VALUES (?, ?, ?, ?)";
            $result = $db->perform_query($qry,$fname, $lname, $email, $pwd);            
        }catch (Exception $e) {
            echo $e;
        } finally {
            $db->close();
            return $result;
        }
    }
?>