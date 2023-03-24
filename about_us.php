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
                    <h2>About Us</h2>
                    <div class="row">
                        <article class="col-sm" >
                            <h3>Who we are</h3>
                            <p>
                                We are the first ever bank from Singapore. 
                                The bank was founded in 2018, something
                                We are based on NYP@SIT.
                            </p>
                        </article>
                        <article class="col-sm">
                            <h3>Map</h3>
                            <figure>
                                <img src="images/SIT.jpg"style="width: 50%">
                            <figcaption>NYP@SIT</figcaption>
                            </figure>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.665403029679!2d103.84659831453857!3d1.3774333989953997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da16e96db0a1ab%3A0x3d0be54fbbd6e1cd!2sSingapore%20Institute%20of%20Technology%20(SIT%40NYP)!5e0!3m2!1sen!2ssg!4v1678260741181!5m2!1sen!2ssg" width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                        </article>
                    </div>
                </section>
                    <h2 class="h4 text-white mb-5" >Contact us</h2>
                        <div class="row form-group">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label class="text-black" for="fname"> First Name</label>
                                <input type="text" id="fname" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="text-black" for="lname">Last Name</label>
                                <input type="text" id="lname" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                         <div class="col-md-12">
                             <label class="text-black" for="email"> Email</label>
                             <input type="email" id="email" class="form-control">
                         </div>
                     </div>
                     <div class="row form-group">
                         <div class="col-md-12">
                             <label class="text-black" for="subject"> Subject</label>
                             <input type="subject" id="subject" class="form-control">
                         </div>
                     </div>
                     <div class="row form-group">
                         <div class="col-md-12">
                             <label class="text-black" for="message">Message</label>
                             <textarea name="message" id="message" cols="30" 
                                       rows="7" class="form-control" placeholder="Write your question here..."></textarea>
                         </div>
                     </div>
                     <div class="row form-group" >
                        <div class="col-md-12">
                            <input type="submit" value="Send Message" class="btn btn-primary btn-md text-white">
                        
                        </div>
                      </div>
                    <img src="images/black.jpg"  width="500" height="100">
                   
                </center>
              
            <div class="footer-margin">
        <?php
            include "subview/footer.inc.php";
        ?>       
         </div>     
         </div>
    </body>
</html>