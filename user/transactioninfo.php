<?php

// include("../database.php");
// $ch = new Banking();
$account_balance = "";
$amount = "";

?>

 <ul class="list-group">
             <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Transaction</h5>

        <?php
       $dbh = DB();
         $sql = "SELECT transactions.userId, transactions.amount
                    FROM transactions
                    INNER JOIN account ON transactions.userId=account.userId";
        $stmt = $dbh->prepare($sql);
      $stmt->execute();
      $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach ($data as $row) {
       
    ?>

      
    </div>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Amount
              <span class="badge badge-primary badge-pill"><?php echo $row['amount']; ?></span>
            </li>
            
          </ul>
          <?php } ?>