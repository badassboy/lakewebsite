<?php
include("../database.php");
// $ch = new Banking();
$account_balance = "";

// $user_info = $ch->customerDetails($_SESSION['id']);
// foreach ($user_info as $row) {
//    $account_balance = $row['balance'];
//  } 

  $dbh = DB();
      $stmt = $dbh->prepare("SELECT * FROM account WHERE id =?");
      $stmt->execute([$_SESSION['id']]);
      $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach ($data as $row) {
        $account_balance = $row['balance'];
      }

  


?>

<ul class="list-group">
             <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Accounts</h5>
      <!-- <small>3 days ago</small> -->
    </div>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Checkings
              <span class="badge badge-primary badge-pill">$<?php echo $account_balance;?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Savings
              <span class="badge badge-primary badge-pill">2</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Loans
              <span class="badge badge-primary badge-pill">1</span>
            </li>
          </ul>