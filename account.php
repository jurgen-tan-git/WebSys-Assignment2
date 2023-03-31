<!DOCTYPE html>
<html>

<head>
  <title>Bank Account Balance Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/account.css">
  <link rel="stylesheet" href="css/table.css">
</head>

<?php
            include "subview/nav.inc.php";?>
<body>
        <?php
            include_once 'helpers/sql.php';
            $db = new Mysql_Driver();
            if (!isset($_SESSION['email'])|!isset($_SESSION['user_id'])|!isset($_SESSION['telegram_id'])|!isset($_SESSION['fname'])) {
              session_destroy();   
              header("Location: login.php");
              exit;
            }

            //get balance
            $db->connect();
            $qry = "SELECT * FROM account WHERE email = ?";
            $result = $db->query($qry, $_SESSION['email']);
            $db->close();
            if ($db->num_rows($result) > 0) {
                $row = $db->fetch_array($result);
                $balance = $row['balance'];
            }else{
              session_destroy();   
              header("Location: login.php");
            }
            $mobile_browser = '0';

            if(preg_match('/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i', $_SERVER['HTTP_USER_AGENT'])) {
                $mobile_browser++;
            }

            if($mobile_browser > 0) {
                $rows_to_load = 10; // Load 10 rows for mobile devices
            } else {
                $rows_to_load = 20; // Load 50 rows for desktop devices
            }
            ?>
  <div class="container mt-5">
    <h1 class="text-center mb-4 text">Bank Account Balance Dashboard</h1>
    <p class="text">Latest <?php echo $rows_to_load ?> rows:</p>
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th class = "text" scope="col">Date</th>
          <th class = "text" scope="col">Type</th>
          <th class = "text" scope="col">Amount</th>
          <th class = "text" scope="col">Balance</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $db->connect();
            $qry = "SELECT t.*,a.account_id FROM transaction t INNER JOIN account_transaction atran ON atran.transaction_id = t.transaction_id INNER JOIN account a ON atran.account_id = a.account_id WHERE a.email = ? ORDER BY timestamp DESC LIMIT ". $rows_to_load;
            $result = $db->query($qry, $_SESSION['email']);
            $db->close();
            if ($db->num_rows($result)>0) { 
              while($row = $db->fetch_array($result)) {
                //add into list or print out row
                if ($row['istransfer']==1){
                  if ($row['type']==1){
                    $class = "success";
                    $type = "Transfer from ".$row['email'];
                  }else{
                    $class = "danger";
                    $type = "Transfer to ".$row['email'];
                  }
                }else{
                  if ($row['type']==1){
                    $type = "Deposit";
                    $class = "success";
                  }else{
                    $type = "Withdrawal";
                    $class = "danger";
                  }
                }
                
                if ($row['balance'] > 0){
                  $balance_class = "success";
                }else{
                  $balance_class = "danger";
                }
                echo "<tr>".
                        "<td class='text' >".date("j F Y g:i A",strtotime($row['timestamp']))."</td>".
                        "<td class='text'>".$type."</td>".
                        "<td class='text-".$class."'>".number_format($row['amount'],2)." SGD</td>".
                        "<td class='text-".$balance_class."'>".number_format($row['balance'],2)." SGD</td>".
                      "</tr>";
              }
            }
        ?>
      </tbody>
      <tfoot>
        <tr>
          <th scope="row" colspan="3" class="text">Current Balance:</th>
          <td class='text-<?php echo $balance >0 ? "success" : "danger" ?>'><?php echo number_format($balance,2) ?> SGD</td>
        </tr>
      </tfoot>
    </table>
  </div>
  <div>
  </div>
</body>
        <?php
            include "subview/footer.inc.php";
        ?>       
</html>