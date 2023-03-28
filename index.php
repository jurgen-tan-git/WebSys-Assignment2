<!DOCTYPE html>
<html lang="en-us">
    <head>
    <title>Bank Of SIT</title>    
        <meta charset="UTF-8">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="css/home.css">
        <link href="https://fonts.googleapis.com/css?family=Inter:100,200,300,regular,500,600,700,800,900&display=swap" rel="stylesheet">
        <script defer src="js/main.js"></script>
    </head>
    
    <body>
        <?php
            include "subview/nav.inc.php";
        ?>
        <img src="images/black.jpg"  width="500" height="110">
        
        <main class="container">
            <div class="top-container">
                <div class="slideshow-container">

                    <div class="mySlides fade">
                        <div class="numbertext">1 / 3</div>
                        <img src="images/intro.jpg" style="width:100%">
                        <!--<div class="text">Bank today with BANK OF SIT</div>-->
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">2 / 3</div>
                        <img src="images/nomin.jpg" style="width:100%">
                        <!--<div class="text">The only reliable bank you need</div>-->
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">3 / 3</div>
                        <img src="images/interest.jpg" style="width:100%">
                        <!--<div class="text">Sky high interest</div>-->
                    </div>

                </div>
                <br>
                <div class="SIT"></div>
                <div style="text-align:center">
                    <span class="dot"></span> 
                    <span class="dot"></span> 
                    <span class="dot"></span> 
                </div>
                <img src="images/daily.jpg"  style="width:100%">
                <center>
                    <marquee  behavior="alternate" direction="left">          
                        <img src="images/gold.jpg" width="40" height="25"
                             alt="GeeksforGeeks logo"> 
                    </marquee>  

                    <marquee  behavior="alternate" direction="right">         
                        <img src="images/logo.jpg" width="40" height="25"
                             alt="GeeksforGeeks logo"> 
                    </marquee>  
                </center>
                <img src="images/lockin.jpg"  style="width:100%">
                <img src="images/ready.jpg"  style="width:100%">
                <img src="images/end.jpg"  style="width:100%">
            </div>
        </main>
        <?php
            include "subview/footer.inc.php";
        ?>       
    </body>
</html>