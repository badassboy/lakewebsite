<?php
// session_start();
include("../library.php");
$ch = new Banking();
$msg = "";

if(isset($_POST['cust_transfer'])){
  
  $receiver = trim($_POST['receiver']);
  $sender = trim($_POST['sender']);
  $fullname = trim($_POST['full_name']);
  $purpose = trim($_POST['purpose']);
  $amount = trim($_POST['amount']);
  $address = trim($_POST['address']);
  $transfer_date = trim($_POST['transfer_date']);
  $note = trim($_POST['note']);

  $reference_number = rand();

  $transfer = $ch->sendCustomerTransfer($receiver,$sender,$fullname,$purpose,$amount,$address,$transfer_date,
                                        $note,$reference_number);
if ($transfer) {
    $_SESSION['reference'] = $reference_number;
    header("Location:otp.php");
    exit;
}else {
    $msg = '<script>alert("failed in transfering funds")</script>';
}


}






?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Lakeside CreditUnion</title>

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

    

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/sidestyle.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.css">

     <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <style type="text/css">

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
             font-family: 'Roboto', sans-serif;
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

        .counselling{

            background-color:rgb(255, 255, 255);
            height: 350px;
            padding-top: 3%;
            display: none;
        }

        .deposit{
            background-color:rgb(255, 255, 255);
                height: 500px;
                padding-top: 3%;
                display: none;

        }

        .show {
          display: block;
        }


    </style>
    

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Lakeside CreditUnion</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Transactions</p>


            <li>
                <a href="#" id="appointment" data-target="one" class="test">
                <span><i class="fa fa-money" aria-hidden="true"></i></span> Pay bills</a>
            </li>

            <li>
                <a href="#" id="event" data-target="two" class="test">
                    <span><i class="fa fa-usd" aria-hidden="true"></i></span> Send Money</a>
            </li>


            <li>
                <a href="#" id="transfer" data-target="three" class="test">
                    <span><i class="fa fa-exchange" aria-hidden="true"></i></span> Transfers</a>
            </li>

             <li>
                <a href="#" id="deposit" data-target="four" class="test">
                 <span><i class="fa fa-money" aria-hidden="true"></i></span> Deposit</a>
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

                     <form method="post"  action="">

                               <div class="row">

                                <div class="col">
                                    <div class="form-group">
                         <label>Account Number</label>
                         <div class="form-group">
                           <input type="text" class="form-control" name="sender" placeholder="Example:1234567" required>
                            
                          </div>
                       </div>  
                                </div>

                                 <div class="col">
                                    <div class="form-group">
                         
                         
                           <label for="exampleFormControlSelect1">Type of bill</label>
                              <select class="form-control" id="exampleFormControlSelect1">
                                <option>Select</option>
                                <option>Utilities</option>
                                <option>TV & Entertainment</option>
                                <option>School fees</option>
                                <option>General Payment</option>
                              </select>
                            
                        
                       </div>  
                                </div>


                                   
                               </div>       

                      
                       <br>

                         
                <div class="form-group">
         <label>Amount</label>
         <input type="text" step="any" min="1" name="amount" class="form-control"  placeholder="Amount" required>
       </div>
       <br>

                                      

                                     

                      <div class="form-group">
                                           <label>Note</label>
            <textarea class="form-control" name="note" rows="3" placeholder="Your Note"></textarea>
                                           
                           </div>
                           <br>


                                        

                                      

               <button type="submit" name="cust_transfer"  class="btn btn-primary">Submit</button>
                                                     </form>
            
               
            </div>


    
        <div class="container event" id="two">

               <form method="post"  action="">

                            
                               
                                    <div class="form-group">
                         <label>Receiver Account Number</label>
                         <div class="form-group">
                           <input type="text" class="form-control" name="sender" placeholder="Example:1234567" required>
                            
                          </div>
                       </div>  
                               
                    <br>

                         
                <div class="form-group">
         <label>Amount</label>
         <input type="text" step="any" min="1" name="amount" class="form-control"  placeholder="Amount" required>
       </div>
       <br>

                                      

                    <div class="form-group">
               <label>Reference Number</label>
        <input type="text"  name="amount" class="form-control"  placeholder="Enter any number" required>
            
                                           
               </div>
               <br>

        <button type="submit" name="cust_transfer"  class="btn btn-primary">Submit</button>
                                                     </form>
              
            </div>

            <!-- transfer -->

            <div class="container transfer" id="three">

                <?php 

                if (isset($msg)) {
                    echo $msg;
                }

                ?>

                      <form method="post"  action="">

                        <div class="row">

                            <div class="col">
                                <div class="form-group">
                          <label>Receiver Account Number</label>
                          <div class="form-group">
                            <input type="number" class="form-control" name="receiver" placeholder="Example:1234567" required>
                             
                           </div>
                        </div> 
                            </div>

                            <div class="col">
                                <div class="form-group">
                          <label>Sender Account Number</label>
                          <div class="form-group">
                            <input type="number" class="form-control" name="sender" placeholder="Example:1234567" required>
                             
                           </div>
                        </div> 
                            </div>
                            
                        </div>

                       

                        <div class="form-group">
                            <label>Recipient FulName</label>
                            <input type="text" class="form-control" name="full_name" placeholder="FullName" required>
                            
                        </div>

                        <div class="row">

                            <div class="col">
                                <div class="form-group">
                            <label>Purpose</label>
                            <input type="text" class="form-control" name="purpose" placeholder="Purpose">
                            
                        </div>
                            </div>

                            <div class="col">

                                 <div class="form-group">
                          <label>Amount</label>
                          <input type="number" step="any" min="1" name="amount" class="form-control"  placeholder="Amount" required>
                        </div>

                             
                            </div>
                            
                        </div>

                         

                        <div class="row">

                            <div class="col">
                                
                     <div class="form-group">
                  <label>Address</label>
              <input type="text"  name="address" class="form-control"  placeholder="Address" required>
                </div>
                            </div>

                            <div class="col">
                                
                     <div class="form-group">
                  <label>Date</label>
              <input type="date"  name="transfer_date" class="form-control"  required>
                </div>
                            </div>
                            
                        </div>

                           <div class="form-group">
                            <label>Note</label>
         <textarea class="form-control" name="note" rows="3" placeholder="Your Note"></textarea>
                            
                        </div>

<button type="submit" name="cust_transfer"  class="btn btn-primary">Submit</button>
                                      </form>
                </div>

                <!-- deposit -->
                <div class="container deposit" id="four">

                    <form method="post">
                         <div class="form-group">
                            <label>Account Number</label>
         <input type="text" name="myAccount" class="form-control" placeholder="Account Number" required>
                        </div>
                        <br>

                         <div class="form-group">
                            <label>Amount</label>
         <input type="text" name="depositAmount" class="form-control" placeholder="Deposit Amount" required>
                        </div>
                        <br>
         

                            

<button type="submit" name="cust_transfer"  class="btn btn-primary">Submit</button>

                        
                    </form>
                    
                </div>

               
             

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

       
</script>
</body>

</html>