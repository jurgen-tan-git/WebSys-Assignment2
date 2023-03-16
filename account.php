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
            include_once 'helpers/sql.php';
            $db = new Mysql_Driver();
            if (!isset($_SESSION['email'])|!isset($_SESSION['user_id'])) {   
              header("Location: login.php");
              exit;
            }
            ?>
        <img src="images/black.jpg"  width="500" height="110">
  <div class="container mt-5">
    <h1 class="text-center mb-4">Bank Account Balance Dashboard</h1>
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Date</th>
          <th scope="col">T</th>
          <th scope="col">Amount</th>
          <th scope="col">Balance</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $db->connect();
            $qry = "SELECT t.*,a.account_id,a.email FROM transaction t INNER JOIN account_transaction atran ON atran.transaction_id = t.transaction_id INNER JOIN account a ON atran.account_id = a.account_id WHERE email = ? ORDER BY timestamp DESC";
            $result = $db->query($qry, $_SESSION['email']);
            $db->close();
            if ($db->num_rows($result)>0) { 
              while($row = $db->fetch_array($result)) {
                //add into list or print out row
                if ($row['type']==1){
                  $type = "Deposit";
                  $class = "success";
                }else{
                  $type = "Withdrawal";
                  $class = "danger";
                }
                echo "<tr>".
                        "<td>".date("j F Y g:i A",strtotime($row['timestamp']))."</td>".
                        "<td>".$type."</td>".
                        "<td class='text-".$class."'>".number_format($row['amount'],2)." SGD</td>".
                        "<td class='text-success'>".number_format($row['balance'],2)." SGD</td>".
                      "</tr>";
              }
            }
        ?>
      </tbody>
      <tfoot>
        <tr>
          <th scope="row" colspan="3">Current Balance:</th>
          <td class="text-success"><?php echo number_format($_SESSION['balance'],2) ?> SGD</td>
        </tr>
      </tfoot>
    </table>
  </div>
  <div>
  </div>
  <?php
  include "footer.inc.php";
  ?>
</body>

</html>