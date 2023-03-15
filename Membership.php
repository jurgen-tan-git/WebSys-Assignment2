<!DOCTYPE html>
<html lang="en-us">
    <head>
    <title>Bank Of SIT</title>    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity=
        "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">
        <link rel="stylesheet" href="css/main.css">
        <script defer
                src="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                crossorigin="anonymous">
        </script>
        <script defer src="js/main.js"></script>
    </head>
    
    <body>
        <?php
            include "nav.inc.php";
        ?>
        <img src="images/black.jpg"  width="500" height="110">
        
        <main class="container">
            <div class="top-container">
                <div class="slideshow-container">

                    <div class="mySlides fade">
                        <div class="numbertext">1 / 2</div>
                        <img src="images/Cardbanner.png" style="width:100%">
                        <div class="text">Bank today with BANK OF SIT</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">2 / 2</div>
                        <img src="images/Cardbanner2.png" style="width:100%">
                        <div class="text">The only reliable bank you need</div>
                    </div>
                </div>
                <br>
                <div class="SIT"></div>
                <div style="text-align:center">
                    <span class="dot"></span> 
                    <span class="dot"></span> 
                </div>
                <img src="images/carddifferent.png"  style="width:100%">
                
            </div>
                            <img src="images/black.jpg"  width="500" height="100">
         <div>
        <?php
            include "footer.inc.php";
        ?>       
         </div>
    </body>
</html>