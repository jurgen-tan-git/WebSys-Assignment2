<!DOCTYPE html>
<html>

<head>
  <title>Bank Account Balance Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
        <?php
            include "nav.inc.php";
        ?>
        <img src="images/black.jpg"  width="500" height="110">
  <div class="container mt-5">
    <h1 class="text-center mb-4">Bank Account Balance Dashboard</h1>
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Date</th>
          <th scope="col">Description</th>
          <th scope="col">Amount</th>
          <th scope="col">Balance</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>2023-03-01</td>
          <td>Deposit</td>
          <td class="text-success">$1,000.00</td>
          <td class="text-success">$1,000.00</td>
        </tr>
        <tr>
          <td>2023-03-02</td>
          <td>Withdrawal</td>
          <td class="text-danger">-$200.00</td>
          <td class="text-success">$800.00</td>
        </tr>
        <tr>
          <td>2023-03-03</td>
          <td>Deposit</td>
          <td class="text-success">$500.00</td>
          <td class="text-success">$1,300.00</td>
        </tr>
        <tr>
          <td>2023-03-04</td>
          <td>Withdrawal</td>
          <td class="text-danger">-$100.00</td>
          <td class="text-success">$1,200.00</td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th scope="row" colspan="3">Current Balance:</th>
          <td class="text-success">$1,200.00</td>
        </tr>
      </tfoot>
    </table>


  </div>
  </div>
                            <img src="images/black.jpg"  width="500" height="100">
         <div>
  <?php
  include "footer.inc.php";
  ?>
</body>

</html>