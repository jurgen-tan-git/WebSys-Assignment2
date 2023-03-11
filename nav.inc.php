<?php 
session_start();
//Display guest welcome message, Login and Registration links
//when shopper has yet to login,
$content1 = "Welcome Guest<br />";
$content2 = "<a class='Button StreamsSignUp js-signup' href='register.php'>Sign Up</a>
<a class='Button StreamsLogin js-login' href='login.php'>Log In </a>";

if(isset($_SESSION["fname"])) { 
	$content1 = "Welcome <b>$_SESSION[fname]</b>";
	$content2 = "<a class='Button StreamsSignUp js-signup'>".$_SESSION["fname"]."</a>
  <a class='Button StreamsLogin js-login' href='process/process_logout.php'>Log Out</a>";
}
?>

<div class="StreamsHero-image">
  <div class="StreamsHero-content">
    <div class="StreamsHero-buttonContainer">
      <a href="https://twitter.com/fredsrocha" class="js-nav" data-element="logo" target="_blank">
        <i class="fa fa-twitter fa-2x" aria-hidden="true"></i><!--
--><small></small></a>
      
      <a class="Button StreamsSignUp js-signup" href="index.php">Home 
      <a class="Button StreamsLogin js-login"href='login.php'>Memberships</a>
      <a class="Button StreamsSignUp js-signup" href='register.php'>Services 
      <a class="Button StreamsLogin js-login"href='login.php'>Account Details</a>
      <a class="Button StreamsSignUp js-signup" href='register.php'>About Us</a>

      <?php echo $content2;?>

      <a class="navbar-brand" href="index.php"><img src="images/logo.jpg"  width="80" height="40"
                                                    alt="Logo"
                                                    title="View larger image..."></a>
    </div>
  </div>
</div>