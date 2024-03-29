<?php
session_start();
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

        .counselling{

            background-color:rgb(255, 255, 255);
            height: 350px;
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
                <p>INBOX</p>


            <li>
                <a href="#" id="appointment" data-target="one" class="test">MESSAGES</a>
            </li>

          <!--   <li>
                <a href="#" id="event" data-target="two" class="test">Withdrawal</a>
            </li>


            <li>
                <a href="#" id="transfer" data-target="three" class="test">Transfers</a>
            </li> -->
         
           
           


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

            <h2>MY MESSAGES</h2>

            <div class="container appointment show" id="one">

                           
                <table class="table">

             <thead>
               <tr>
                 
                 <th scope="col">Subject</th>
                 <th scope="col">Message</th>
                 <th scope="col">Date</th>

               </tr>
             </thead>

             <tbody>
                <?php 

                $user_deposit = $ch->getCustomerMessage($_SESSION['first']);
                foreach ($user_deposit as $row) {
                    echo '
                            <tr>
                                <td>'.$row['subject'].'</td>
                                <td>'.$row['message'].'</td>
                                <td>'.$row['message_date'].'</td>
                                
                            </tr>
                    ';
                }

                ?>
                 
             </tbody>

             </table>
            
               
            </div>


    
       
            </div>

            <!-- transfer -->

          

               
             

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