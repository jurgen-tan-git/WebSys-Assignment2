<?php

if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mailFrom = $_POST['mail'];
    $message = $_POST['message'];
    
    $mailTo = "bankofsit@gmail.com";
    $headers = "From: ".$mailFrom;
    $txt = "You have received an e-mail from ".$name.".\n\n".$message;
    
    mail($txt, $subject, $txt, $headers);
    //need to be test online
    header("Location: about_us.php?mailsend");
}
//Not sure if we have a email but bankofsit@gmail.com and pw is Bankofsit1009
