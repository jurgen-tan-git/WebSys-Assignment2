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
        <link rel="stylesheet" href="css/home.css">
        <script defer
                src="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                crossorigin="anonymous">
        </script>
        <script defer src="js/main.js"></script>
    </head>
    
    <body>
        <?php
            include "subview/nav.inc.php";
        ?>
        <div img src="images/black.jpg"  width="500" height="110">
        </div>
        <main class="container">
            <div class="top-container">
                <div class="slideshow-container">

                    <div class="mySlides fade">
                        <div class="numbertext">1 / 3</div>
                        <img src="images/intro.jpg" style="width:100%">
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">2 / 3</div>
                        <img src="images/nomin.jpg" style="width:100%">
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">3 / 3</div>
                        <img src="images/interest.jpg" style="width:100%">
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
                <p><center> <h7>Get interest credited to your Bank of SIT
                        Savings Account daily, not monthly.
                        Yay to earning interest on your interest every
                        day!*</h7></center></p>
            
                    <marquee  behavior="alternate" direction="left">          
                        <img src="images/Cardbanner.png" width="400" height="150"
                             alt="GeeksforGeeks logo"> 
                    </marquee>  

                    <marquee  behavior="alternate" direction="right">         
                        <img src="images/Cardbanner2.png" width="400" height="150"
                             alt="GeeksforGeeks logo"> 
                    </marquee>  
                </center>
                <img src="images/lockin.jpg"  style="width:100%">
                                <p><center> <h7>Withdraw any amount, anytime back to your
main account.</h7></center></p>
                <img src="images/ready.jpg"  style="width:100%">
                 <p><center> <h7>Save better.</h7></center></p>
            <p><center> <h7>Save with Bank of SIT.</h7></center></p>
                <p><center> <h8>Bank of SIT is the ideal online banking website for those seeking a dependable, high-yield savings account.
With an impressive interest rate and no minimum deposit requirement, Bank of SIT is accessible to everyone, irrespective of their financial standing.
What distinguishes Bank of SIT from other online banking sites is that it is supported by the Singaporean government,
ensuring the safety and security of your money.
This peace of mind, combined with the convenience of online banking, makes Bank of SIT an excellent option for anyone looking to optimize their savings.</h8></center></p>
                <img src="images/end.jpg"  style="width:100%">
<p><center> <h7>Started in singapore, backed by Singapore</h7></center></p>
                <p><center> <h8>
Bank of SIT is a reliable and trustworthy banking app that offers the highest regulatory standards in the industry.
You can bank in peace knowing that your personal information and financial transactions are secure.
With features like checking account balances, transferring funds, and paying bills,
you can manage your finances efficiently from anywhere.
Sign up now to enjoy the peace of mind that comes with banking with a trusted partner.</h8></center></p>
            </div>
        </main>
        <?php
            include "subview/footer.inc.php";
        ?>       
    </body>
</html>