<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title>Bank Of SIT</title>    
        <meta charset="UTF-8">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Inter:100,200,300,regular,500,600,700,800,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/aboutus.css">
        <script defer src="js/main.js"></script>
    </head>
    <?php
    include "chatbot.php";
    include "subview/nav.inc.php";
    ?>

    <body>

        <main class="container">
            <div class="top-container">

                
                    <section id="aboutus"> 
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
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.665403029679!2d103.84659831453857!3d1.3774333989953997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da16e96db0a1ab%3A0x3d0be54fbbd6e1cd!2sSingapore%20Institute%20of%20Technology%20(SIT%40NYP)!5e0!3m2!1sen!2ssg!4v1678260741181!5m2!1sen!2ssg" class="map" style="border:0; width: 70%"  loading="eager" referrerpolicy="no-referrer-when-downgrade" aria-label="Google Map of Singapore Institute of Technology"></iframe>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class ="contactus-form">
                        <form class="contact-form" action="process/process_contact.php" method="post">
                            <h2 class="h4 text-black mb-5" >Contact us</h2>
                            <div class="row form-group">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label class="text-black control-label col-xs-4" for="fname"> First Name</label>
                                    <input type="text" name="name" id="fname" class="form-control" placeholder="First Name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="text-black control-label col-xs-4" for="lname">Last Name</label>
                                    <input type="text" id="lname" class="form-control" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="text-black control-label col-xs-4" for="email">Email </label>
                                    <input type="email" name="mail" id="email" class="form-control" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="text-black control-label col-xs-4" for="subject">Subject</label>
                                    <input type="subject" name="subject" id="subject" class="form-control" placeholder="Subject">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="text-black control-label col-xs-4" for="message">Message</label>
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
                    </div>
                


            </div>

        </main>
    </body>
        <?php
        include "subview/footer.inc.php";
        ?>    
</html>