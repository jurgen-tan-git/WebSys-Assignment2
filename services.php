<!DOCTYPE html>
<html lang="en-us">
  <head>
    <title>Bank Of SIT - Products and Services</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/services.css">
    <link href="https://fonts.googleapis.com/css?family=Inter:100,200,300,regular,500,600,700,800,900&display=swap" rel="stylesheet">
    <script defer src="js/main.js"></script>
    <script src="converter.js"></script>
  </head>
  <?php
        include "chatbot.php";
    ?>
  <body id="bootstrap-overrides"> <?php
            include "subview/nav.inc.php";
        ?> <div class="bg-1">
      <h1>Put your dollar to work.</h1>
    </div>
    <div class="bg-2">
      <h1>Get rewarded.</h1>
    </div>
    <div class="bg-3">
      <h1>Smooth transfers.</h1>
    </div>
    <div class="bg-4">
      <h1>Top-class customer service.</h1>
    </div>
    <div class="bg-5">
      <h1>What are you waiting for?</h1>
    </div>
    <main class="container">
      <section class="mt-5 mb-5">
        <h2 class="font-weight-bold mb-4">Our Products and Services</h2>
        <div class="row">
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="firstAnimation">
              <div class="secondAnimation">
                <div class="card h-100">
                  <div class="card-body">
                    <h3 class="card-title font-weight-bold">Checking Accounts</h3>
                    <p class="card-text">Open a checking account with us and enjoy easy access to your funds with low fees and competitive interest rates.</p>
                  </div>
                  <div class="card-footer">
                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#checking-modal">Learn More</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="firstAnimation">
              <div class="secondAnimation">
                <div class="card h-100">
                  <div class="card-body">
                    <h3 class="card-title font-weight-bold">Savings Accounts</h3>
                    <p class="card-text">Save for your future with our range of savings accounts, which offer high interest rates and flexible withdrawal options.</p>
                  </div>
                  <div class="card-footer">
                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#savings-modal">Learn More</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="firstAnimation">
              <div class="secondAnimation">
                <div class="card h-100">
                  <div class="card-body">
                    <h3 class="card-title font-weight-bold">Credit Cards</h3>
                    <p class="card-text">Our credit cards offer great rewards, competitive interest rates, and a range of benefits to help you manage your finances.</p>
                  </div>
                  <div class="card-footer">
                    <a href="Membership.php" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#credit-cards-modal">Learn More</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="firstAnimation">
              <div class="secondAnimation">
                <div class="card h-100" style="margin-bottom: 80px;">
                  <div class="card-body">
                    <h3 class="card-title font-weight-bold">Retirement Planning</h3>
                    <p class="card-text">Plan for your retirement with our range of investment products and services, which can help you achieve your long-term financial goals.</p>
                  </div>
                  <div class="card-footer">
                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#retirement-planning-modal">Learn More</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="firstAnimation">
              <div class="secondAnimation">
                <div class="card h-100" style="margin-bottom: 80px;">
                  <div class="card-body">
                    <h3 class="card-title font-weight-bold">Small Business Services</h3>
                    <p class="card-text">We offer a range of financial services to help small businesses grow and succeed, including loans, checking accounts, and more.</p>
                  </div>
                  <div class="card-footer">
                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#small-business-modal">Learn More</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      </div>
      </section>
      <!-- Modal for Checking Accounts -->
      <div class="modal fade" id="checking-modal" tabindex="-1" role="dialog" aria-labelledby="checking-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="checking-modal-label">Checking Accounts</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <img src="/images/s8.jpg" alt="alt" />
              <p>Open a checking account with us and enjoy easy access to your funds with low fees and competitive interest rates.</p>
              <p>Our checking accounts also come with free online banking and mobile app access, so you can manage your money on-the-go.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal for Savings Accounts -->
      <div class="modal fade" id="savings-modal" tabindex="-1" role="dialog" aria-labelledby="savings-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="savings-modal-label">Savings Accounts</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Save for your future with our range of savings accounts, which offer high interest rates and flexible withdrawal options.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal for Credit Cards -->
      <div class="modal fade" id="credit-cards-modal" tabindex="-1" role="dialog" aria-labelledby="credit-cards-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="credit-cards-modal-label">Credit Cards</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Our credit cards offer great rewards, competitive interest rates, and a range of benefits to help you manage your finances.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal for Retirement Planning -->
      <div class="modal fade" id="retirement-planning-modal" tabindex="-1" role="dialog" aria-labelledby="retirement-planning-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="retirement-planning-modal-label">Retirement Planning</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Plan for your retirement with our expert guidance and customized solutions. Our retirement planning services can help you achieve your financial goals and ensure a comfortable future.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal for Small Business Services -->
      <div class="modal fade" id="small-business-modal" tabindex="-1" role="dialog" aria-labelledby="small-business-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="small-business-modal-label">Small Business Services</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="amount">Amount:</label>
                  <input type="number" class="form-control" id="amount" placeholder="Enter amount" required>
                </div>
                <div class="form-group">
                  <label for="from">From currency:</label>
                  <select class="form-control" id="from">
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                    <option value="JPY">JPY</option>
                    <option value="GBP">GBP</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="to">To currency:</label>
                  <select class="form-control" id="to">
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                    <option value="JPY">JPY</option>
                    <option value="GBP">GBP</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="result">Result:</label>
                  <input type="text" class="form-control" id="result" disabled>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="convert()">Convert</button>
            </div>
          </div>
        </div>
    </main>
        <?php
            include "subview/footer.inc.php";
        ?> 
  </body>
</html>