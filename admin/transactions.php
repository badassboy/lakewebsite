<?php

include("../library.php");
$ch = new Banking();

if(isset($_POST['deposit'])){
  $msg = "";
  $amount = trim($_POST['amount']);
  $account = trim($_POST['account']);
 
if(empty($amount) || empty($account)){
    $msg = "fields are required";
  }else {
    $laliga = $ch->deposit($amount,$account);
    if($laliga){
      $msg = "Deposit added";
    }else {
      $msg = "Deposit Added";
    }
  }

}
// end of laliga news

if(isset($_POST['withdrawal'])){
  $msg = "";
  $amount = trim($_POST['withdraw_amount']);
  $account = trim($_POST['user']);
 
if(empty($amount) || empty($account)){
    $msg = "fields are required";
  }else {
    $laliga = $ch->withdrawal($amount,$account);
    if($laliga){
      $msg = "withdrawal added";
    }else {
      $msg = "withdrawal failed";
    }
  }

}





?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

    

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/sidestyle.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.css">

    <style type="text/css">

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .appointment{
                background-color:rgb(255, 255, 255);
                height: 500px;
                padding-top: 3%;
                display: none;
            }

        .event{
                background-color:rgb(255, 255, 255);
                height: 500px;
                padding-top: 3%;
                display: none;
            }

             .transfer{
                background-color:rgb(255, 255, 255);
                height: 500px;
                padding-top: 3%;
                display: none;
            }

            .loans{
                background-color:rgb(255, 255, 255);
                height: 500px;
                padding-top: 3%;
                display: none;
            }

        .counselling{

            background-color:rgb(255, 255, 255);
            height: 350px;
            padding-top: 3%;
            display: none;
        }

        .show {
          display: block;
        }

        button[type="submit"]
        {
            margin-top: 2%;
            width: 30%;
        }


    </style>
    

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>LEMONFIRM</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Transactions</p>


            <li>
                <a href="#" id="appointment" data-target="one" class="test">Deposit</a>
            </li>

            <li>
                <a href="#" id="event" data-target="two" class="test">Withdrawal</a>
            </li>

            <li>
                <a href="#" id="transfer" data-target="three" class="test">Customer Transfer</a>
            </li>

            <li>
                <a href="#" id="loans" data-target="four" class="test">Customer Loans</a>
            </li>
         
           
           


            </ul>

           

        </nav>
        <!-- end of sidebar -->

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Toggle Sidebar</span>
                </button>
                
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                    
                </div>
            </nav>

            <h2>Transactions</h2>

            <div class="container appointment show" id="one">

                    <div class="myForm">
                        <?php 
                        if (isset($msg)) {
                            echo $msg;
                        }

                        ?>

                   <form method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Amount</label>
        <input type="number" step="any" min="1" name="amount" class="form-control" required>
      </div>

                  <div class="form-group">
                     <label for="exampleFormControlSelect1">Account Name</label>
                     <select class="form-control" name="account" required>
                        <?php 

                        $userAccount = $ch->getAccount();
                        foreach ($userAccount as $row) {
                            echo '
                                <option value="'.$row['first_name'].'">'.$row['first_name'].'</option>

                            ';
                        }


                        ?>
                       
                     </select>
                   </div>
                   
                 <button type="submit" class="btn btn-primary" name="deposit">Submit</button>
                </form>


                        
                    </div>

            </div>
                                


                                

        <div class="container event" id="two">

              <form method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Amount</label>
        <input type="number" step="any" min="1" name="withdraw_amount" class="form-control" required>
      </div>

                  <div class="form-group">
                     <label for="exampleFormControlSelect1">Account Name</label>
                     <select class="form-control" name="user" required>
                        <?php 

                        $userAccount = $ch->getAccount();
                        foreach ($userAccount as $row) {
                            echo '
                                <option value="'.$row['first_name'].'">'.$row['first_name'].'</option>

                            ';
                        }


                        ?>
                       
                     </select>
                   </div>
                   
                 <button type="submit" class="btn btn-primary" name="withdrawal">Submit</button>
                </form>
              
            </div>

            <!-- customer transfer -->
              <div class="container transfer" id="three">

                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">FullName</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Address</th>
                        <th scope="col">Date</th>
                        <th scope="col">Reference Code</th>
                        <th scope="col">OTP</th>
                        <!-- <th scope="col">Actions</th> -->
                      </tr>
                    </thead>
                    <tbody>
                        <?php 

                        $data = $ch->allCustomerTransfer();
                        foreach ($data as $row) {
                            echo '
                                <tr>
                                <td>'.$row['fullname'].'</td>
                                <td>'.$row['amount'].'</td>
                                <td>'.$row['address'].'</td>
                                <td>'.$row['transfer_date'].'</td>
                                <td>'.$row['reference_number'].'</td>
                                <td>'.$row['otp'].'</td>
                                </tr>
                            ';
                        }


                        ?>
                    </tbody>
                  </table>
                    
                  </div>
            <!-- customer transfer -->

            <!-- customer loans -->
            <div class="container loans" id="four">

                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">FullName</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Address</th>
                        <th scope="col">Date</th>
                        <th scope="col">Loan Type</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody id="test">
                    </tbody>
                  </table>
                    
                  </div>
            <!-- customer loans -->
               
             

            <!-- end of div -->

        </div>
        <!-- end of  content -->
           
    </div>
    <!-- end of wrapper -->

<!-- jQuery CDN  -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   
    <!-- Bootstrap JS -->
   <script type="text/javascript" src="../bootstrap/dist/js/bootstrap.js"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });

        // creating an array-like based of child nodes on a specified class name
        var links = document.getElementsByClassName("test");

     //attach click handler to each
        for (var i = 0; i < links.length; i++) {
            links[i].onclick = toggleVisible;
        }

        function toggleVisible(){
                //hide currently shown item
               document.getElementsByClassName('show')[0].classList.remove('show');
               // getting info from custom data-target  set on the element
               var id = this.dataset.target;
               // showing div
               document.getElementById(id).classList.add('show');
        }

        // display all featured news
//         $(document).ready(function(){

// $.ajax({
//  url:"customer_transfer_ajax.php",
//  type:"get",
//  dataType:"JSON",
//  success:function(response){
//    console.log(response);
//      var len = response.length;
//      for (var i = 0; i < len; i++) {

//            var edit = response[i]['edit'];
         

//          var fullname = response[i]["full_name"];

//          var amount = response[i]["amount"];
       
//          var address = response[i]["address"];
//          var transfer_date = response[i]["transfer_date"];
//          var reference_number = response[i]["reference"];
//          var otp = response[i]["otp"];

//          var table_str = "<tr>" +
                      
                      
//                       "<td>" + fullname + "</td>" +
//                       "<td>" + amount + "</td>" +
                    
//                       "<td>" + address + "</td>" +
//                       "<td>" + loan_date + "</td>" +
//                       "<td>" + reference_number + "</td>" +
//                       "<td>" + otp + "</td>" +
//                       "<td>" + edit + "</td>" +
//                       "</tr>";


//               $(".table tbody").append(table_str);

//             }
             
//           },
//           error:function(response){
//             console.log("Error: "+ response);
//           }
      
//           });  

//       });

        // customer loans ajax
        $(document).ready(function(){

    $.ajax({
     url:"customer_loans_ajax.php",
     type:"get",
     dataType:"JSON",
     success:function(response){
       console.log(response);
     var len = response.length;
     for (var i = 0; i < len; i++) {

           var edit = response[i]['edit'];
         

         var fullname = response[i]["full_name"];

         var amount = response[i]["amount"];
       
         var address = response[i]["address"];
         var loan_date = response[i]["loan_date"];
         var loan_type = response[i]["loan_type"];

         var table_str = "<tr>" +
                      
                      
                      "<td>" + fullname + "</td>" +
                      "<td>" + amount + "</td>" +
                    
                      "<td>" + address + "</td>" +
                      "<td>" + loan_date + "</td>" +
                      "<td>" + loan_type + "</td>" +
                      "<td>" + edit + "</td>" +
                      "</tr>";


              $(".table #test").append(table_str);

            }
             
          },
          error:function(response){
            console.log("Error: "+ response);
          }
      
          });  

      });



       

              


        

           






        


    </script>
</body>

</html>