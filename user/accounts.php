<?php
session_start();
include("../library.php");
$ch = new Banking();

// if(isset($_POST['laliga'])){
//   $msg = "";
//   $title = trim($_POST['title']);
//   $picture = $_FILES['photo']['name'];
//   $featured_date = $_POST['news_date'];
//   $description = trim($_POST['description']);

//   if(empty($title)|| empty($picture)|| empty($description || empty($featured_date))){
//     $msg = "fields are required";
//   }else {
//     $laliga = $ch->featured($title,$picture,$description,$featured_date);
//     if($laliga){
//       $msg = "News Added";
//     }else {
//       $msg = "failed in posting news";
//     }
//   }

// }
// end of laliga news



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
                height: 750px;
                padding-top: 3%;
                display: none;
            }

        .event{
                background-color:rgb(255, 255, 255);
                height: 500px;
                padding-top: 3%;
                display: none;
            }

            .fund{
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

        .form-group input[type="text"]{
            margin-bottom: 2%;
        }

        .form-group input[type="email"]{
            margin-bottom: 2%;
        }

        .form-group input[type="date"]{
            margin-bottom: 2%;
        }

        .form-group input[type="password"]{
            margin-bottom: 2%;
        }

        .form-group input[type="tel"]{
            margin-bottom: 2%;
        }

        .form-group select{
            margin-bottom: 2%;
        }

        .form-group input[type="money"]{
            margin-bottom: 2%;
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
                <p>Accounts</p>


            <li>
                <a href="#" id="appointment" data-target="one" class="test">Account Details</a>
            </li>

           <!--  <li>
                <a href="#" id="event" data-target="two" class="test">All Accounts</a>
            </li> -->

           <!--  <li>
                <a href="#" id="fund" data-target="three" class="test">Fund Account</a>
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

            <h2>Accounts Page</h2>

            <div class="container appointment show" id="one">

               
               <table class="table">

            <thead>
              <tr>
                
                <th scope="col">Account Number</th>
                <th scope="col">Account Name</th>
                <th scope="col">Account Balance</th>
               <th scope="col">Email</th>

              </tr>
            </thead>

            <tbody>

                <?php

                $details = $ch->customerDetails($_SESSION['id']);
                foreach ($details as $row) {
                    echo '
                            <tr>
                            <td>'.$row['account_number'].'</td>
                            <td>'.$row['first_name'].'</td>
                            <td>'.$row['balance'].'</td>
                            <td>'.$row['email'].'</td>
                            </tr>
                    ';
                }


                ?>

                

            </tbody>

            </table>      

                                           
                     

             
                    

                                         

                    
                     


                        
             
            
               
            </div>

            <!-- show all ccount -->
        <div class="container event" id="two">

               <table class="table">

            <thead>
              <tr>
                
                <th scope="col">Account Number</th>
                <th scope="col">Account Name</th>
                <th scope="col">Balance</th>
               <th scope="col">Email</th>
                <th scope="col">Verify</th>
                <th scope="col">Created</th>
                <th scope="col">Action</th>

              </tr>
            </thead>

            <tbody></tbody>

            </table>
              
            </div>



           



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