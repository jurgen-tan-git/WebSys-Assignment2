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
            include "subview/nav.inc.php";
            include_once 'helpers/sql.php';
            $db = new Mysql_Driver();
            if (!isset($_SESSION['email'])|!isset($_SESSION['user_id'])|!isset($_SESSION['telegram_id'])|!isset($_SESSION['fname'])) {
              session_destroy();   
              header("Location: login.php");
              exit;
            }

            //get balance
            $db->connect();
            $qry = "SELECT * FROM Account WHERE email = ?";
            $result = $db->query($qry, $_SESSION['email']);
            $db->close();
            if ($db->num_rows($result) > 0) {
                $row = $db->fetch_array($result);
                $balance = $row['balance'];
            }else{
              session_destroy();   
              header("Location: login.php");
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
                if ($row['balance'] > 0){
                  $balance_class = "success";
                }else{
                  $balance_class = "danger";
                }
                echo "<tr>".
                        "<td>".date("j F Y g:i A",strtotime($row['timestamp']))."</td>".
                        "<td>".$type."</td>".
                        "<td class='text-".$class."'>".number_format($row['amount'],2)." SGD</td>".
                        "<td class='text-".$balance_class."'>".number_format($row['balance'],2)." SGD</td>".
                      "</tr>";
              }
            }
        ?>
      </tbody>
      <tfoot>
        <tr>
          <th scope="row" colspan="3">Current Balance:</th>
          <td class='text-<?php echo $balance >0 ? "success" : "danger" ?>'><?php echo number_format($balance,2) ?> SGD</td>
        </tr>
      </tfoot>
    </table>
  </div>
  <div>
  </div>
  <div class="footer-margin">
        <?php
            include "subview/footer.inc.php";
        ?>       
         </div>
</body>

</html>