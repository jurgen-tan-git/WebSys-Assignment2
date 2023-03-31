<!DOCTYPE html>
<html lang="en-us">

    <head>
        <title>Bank Of SIT</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="css/card.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script defer src="js/main.js"></script>

    </head>

    <?php
        include "subview/nav.inc.php";
        ?>
    <body>
        <main class="container">
            <section>
            <div class="top-container">
                <div class="slideshow-container">

                    <div class="mySlides fade">
                        <div class="numbertext">1 / 2</div>
                        <img src="images/Cardbanner.png" style="width:100%" alt="Get neoslife today">
                        <!--<div class="text">Bank today with BANK OF SIT</div>-->
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">2 / 2</div>
                        <img src="images/Cardbanner2.png" style="width:100%" alt="Enjoy the world with the SIT platinum card!">
                        <!--<div class="text">The only reliable bank you need</div>-->
                    </div>
                </div>
                <br>
                <div class="SIT"></div>
                <div style="text-align:center">
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>
                </section>
            
            <section>         
            <div class="container-card">
                <h1 class="text-center mb-3"></h1>
                <table class="table table-striped">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Type</th>
                      <th scope="col">Function</th>
                      <th scope="col">Reward</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>
                              <div class="container-card">
                                  <div class="card-1">
                                      <h3>NeosLife</h3>
                                      <div class="card-inner">                                          
                                          <div class="front">
                                              <img src="images/card_face.png" class="card-img" alt="front of card">
                                          </div>
                                          <div class="back">
                                              <img src="images/card_back.png" class="card-img" alt="back of card">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </td>
                          <td>
                              <div class="container-function">
                                <h4>Debit Card </h4>  
                              </div>
                          </td>
                        <td>
                            <div class="card-reward">
                                <h4> 1 X </h4>
                            </div>
                        </td>
                      </tr>
                  </tbody>
                  <tbody>
                      <tr>
                          <td>
                              <div class="container-card">
                                  <div class="card-1">
                                      <h3>Platinum</h3>
                                      <div class="card-inner">                                          
                                          <div class="front">
                                              <img src="images/card_face_2.png" class="card-img" alt="front of card">
                                          </div>
                                          <div class="back">
                                              <img src="images/card_back.png" class="card-img" alt="back of card">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </td>
                          <td>
                              <div class="container-function">
                                <h4>Credit Card</h4>
                                <h4>Debit Card </h4>  
                              </div>
                          </td>
                        <td>
                            <div class="card-reward">
                                <h4>2 X</h4>
                            </div>
                        </td>
                      </tr>
                  </tbody>
                </table>
            </div>
        </section>
            
        </main>
    </body>
        <?php
        include "subview/footer.inc.php";
        ?>

</html>