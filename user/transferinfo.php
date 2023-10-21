

<ul class="list-group">
             <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Transfer</h5>
      <!-- <small>3 days ago</small> -->
    </div>
     <?php
               $dbh = DB();
              $sql = "SELECT transfers.userId, transfers.amount
                      FROM transfers
                      INNER JOIN account ON transfers.userId=account.userId";
              $stmt = $dbh->prepare($sql);
              $stmt->execute();
              $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
              foreach ($data as $row) {
                // var_dump($row);
               
            ?>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              Amount
              <span class="badge badge-primary badge-pill">$<?php echo $row['amount']; ?></span>
            </li>
           
          </ul>

           <?php } ?>