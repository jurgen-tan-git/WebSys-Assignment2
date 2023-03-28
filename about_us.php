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
        <link rel="stylesheet" href="css/aboutus.css">
    </head>
    <?php
        include "chatbot.php";
        ?>
    
    <body>
        
        <?php
            include "subview/nav.inc.php";
        ?>
        
        <img src="images/black.jpg"  width="500" height="110">
        
        <main class="container">
            <div class="top-container">
                
                <center>
                <section id="aboutus">
                    <h2>
                        <img src="images/Aboutustitle.png" alt="About Us">
                    </h2>
                    
                    <div class="row">
                        <div class="col-sm-6" >
                            <div class="about-us-box">
                                <h3>Who we are</h3>
                                <p>
                                    We are the first ever bank from Singapore. 
                                    We are dedicated to provide convenient banking
                                    solution for our customers. In the world today
                                    people has prefer manage their finances and transactions
                                    online without visiting a physical bank.

                                    Our website is designed to provided a user-friendly experience
                                    for our customers, with easy-to-use features that allow
                                    them to manage their finances online from anywhere.
                                    We are based on NYP@SIT.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="SIT-map">
                                <h3>Map</h3>
                                <figure>
                                    <img src="images/SIT.jpg" alt="Main-Building" style="width: 70%">
                                <figcaption>NYP@SIT</figcaption>
                                </figure>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.665403029679!2d103.84659831453857!3d1.3774333989953997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da16e96db0a1ab%3A0x3d0be54fbbd6e1cd!2sSingapore%20Institute%20of%20Technology%20(SIT%40NYP)!5e0!3m2!1sen!2ssg!4v1678260741181!5m2!1sen!2ssg" width="400" height="250" style="border:0;" allowfullscreen="" loading="eager" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </section>
                    <form class="contact-form" action="process/process_contact.php" method="post">
                        <h2 class="h4 text-white mb-5" >Contact us</h2>
                            <div class="row form-group">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label class="text-black" for="fname"></label>
                                    <input type="text" name="name" id="fname" class="form-control" placeholder="First Name">
                                </div>
                                <div class="col-md-6">
                                    <label class="text-black" for="lname"></label>
                                    <input type="text" id="lname" class="form-control" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="row form-group">
                             <div class="col-md-12">
                                 <label class="text-black" for="email"></label>
                                 <input type="email" name="mail" id="email" class="form-control" placeholder="Email">
                             </div>
                         </div>
                         <div class="row form-group">
                             <div class="col-md-12">
                                 <label class="text-black" for="subject"></label>
                                 <input type="subject" name="subject" id="subject" class="form-control" placeholder="Subject">
                             </div>
                         </div>
                         <div class="row form-group">
                             <div class="col-md-12">
                                 <label class="text-black" for="message"></label>
                                 <textarea name="message" id="message" cols="30" 
                                           rows="7" class="form-control" placeholder="Write your question here..."></textarea>
                             </div>
                         </div>
                         <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" name="submit" value="Send Message" class="btn btn-primary btn-md text-white">
                            </div>
                        </div>
                    </form>
                </center>
              
        <?php
            include "subview/footer.inc.php";
        ?>       
         </div>
    </body>
</html>