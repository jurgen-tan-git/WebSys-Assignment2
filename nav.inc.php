<?php 
session_start();
//Display guest welcome message, Login and Registration links
//when shopper has yet to login,
$content1 = "Welcome Guest<br />";
$content2 = "<li class='nav-item'>
			 <a class='nav-link' href='register.php'>Sign Up |</a></li>
			 <li class='nav-item'>
		     <a class='nav-link' href='login.php'>Login</a></li>";

if(isset($_SESSION["fname"])) { 
	$content1 = "Welcome <b>$_SESSION[fname]</b>";
	$content2 = "<li class=' nav-item'>
				<a class='nav-link' >".$_SESSION["fname"]." |</a></li>
				<li class='nav-item'>
				<a class='nav-link' href='process/process_logout.php'>Logout</a></li>";
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php"><img src="images/facebook.png" alt="Logo"
            title="View larger image..."></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php#dogs">Dogs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php#cats">Cats</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
				  <?php echo $content2;?>
      </ul>
    </div>
</nav>