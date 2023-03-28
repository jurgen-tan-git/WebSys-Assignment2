<!DOCTYPE html>
<html lang="en-us">

<head>
    <title>Bank Of SIT</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <script defer src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
        </script>
    <script defer src="js/main.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/card.css">
</head>

<body>
    <?php
    include "subview/nav.inc.php";
    ?>
    

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
        </div>
        
        <div class="card-container">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="images/card_face.png" alt="alt" width="260px" height="180px" />
                    </div>
                    <div class="flip-card-back">
                        <div class="strip"></div>
                        <div class="mstrip"></div>
                        <div class="sstrip">
                            <p class="code">***</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flip-card-2">
                <div class="flip-card-inner-2">
                    <div class="flip-card-front-2">
                        <img src="images/card_face_2.png" alt="alt" width="260px" height="180px" />
                    </div>
                    <div class="flip-card-back-2">
                        <div class="strip"></div>
                        <div class="mstrip"></div>
                        <div class="sstrip">
                            <p class="code">***</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <img src="images/carddifferent.png" style="width:100%">

        </div>
    </main>
    <?php
    include "subview/footer.inc.php";
    ?>
</body>

</html>