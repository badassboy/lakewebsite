<?php

include("../library.php");
$ch = new Banking();
  $msg = "";

if(isset($_POST['loans'])){
  $fullname = trim($_POST['fullname']);
  $email = $_POST['email'];
  $mobile = $_POST['phone'];
  $address = $_POST['address'];
  $loan_type = $_POST['loan_type'];
  $amount = $_POST['amount'];
  $date = $_POST['loan_date'];
  $gross_income = $_POST['gross_income'];
  $occupation = $_POST['occupation'];
  $gender = $_POST['gender'];
  $comment = trim($_POST['comment']);

 
    $laliga = $ch->loans($fullname,$email,$mobile,$address,$loan_type,$amount,$date,$gross_income,
        $occupation,$gender,$comment);
    if($laliga){
      $msg = '<script>alert("Loan Applied")</script>';
    }else {
      $msg = '<script>alert("Failed to applied")</script>';
    }
  

}
// end of laliga news



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
                <p>Loans</p>


            <li>
                <a href="#" id="appointment" data-target="one" class="test">Loan Application</a>
            </li>

            <li>
                <a href="#" id="event" data-target="two" class="test">All Loans</a>
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

            <h2>Loans</h2>

            <div class="container appointment show" id="one">

                    <div class="myForm">

                        <?php 

                        if (isset($msg)) {
                            echo $msg;
                        }
                        ?>

                <form method="post">

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                    <label for="exampleInputEmail1">FullName</label>
                    <input type="text" class="form-control" name="fullname" placeholder="FullName" required>
                    
                  </div> 
                        </div>

                        <div class="col">
                            <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                  </div> 
                        </div>

                        <div class="col">
                            <div class="form-group">
                    <label for="exampleInputPassword1">Mobile</label>
                    <input type="text" class="form-control" name="phone" placeholder="Mobile" required>
                  </div> 
                        </div>

                         <div class="col">
                            <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Address" required>
                  </div> 
                        </div>
                        
                    </div>

                 <div class="row">

                     <div class="col">
                       <div class="form-group">
                    <label for="exampleInputPassword1">Loan Type</label>
                     <select class="form-control" name="loan_type" required>
                      <option value="salary loan">Salary Loan</option>
                      <option value="student loan">Student Loan</option>
                      <option value="business loan">Business Loan</option>
                      <option value="auto loan">Auto Loan</option>
                      <option value="funeral loan">Funeral Loan</option>
                      
                    </select>

                  </div>  
                    </div>

                    <div class="col">
                       <div class="form-group">
                    <label for="exampleInputPassword1">Amount</label>
            <input type="text" class="form-control" name="amount" placeholder="Amount" required>
                  </div>  
                    </div>

                    <div class="col">
                      <div class="form-group">
                    <label for="exampleInputPassword1">Date</label>
                    <input type="date" class="form-control" name="loan_date" placeholder="Address" required>
                  </div>   
                    </div>

                    <div class="col">
                        <div class="form-group">
                    <label for="exampleInputPassword1">Monthly Gross Income</label>
                    <input type="text" class="form-control" name="gross_income" placeholder="Address" required>
                  </div> 
                    </div>
                    
                </div>


                <div class="row">

                    <div class="col">
                       <div class="form-group">
                    <label for="exampleInputPassword1">Occupation</label>
                    <input type="text" class="form-control" name="occupation" placeholder="Occupation" required>
                  </div>  
                    </div>

                    <div class="col">
                       <div class="form-group">
                    <label for="exampleInputPassword1">Gender</label>
                    <select class="form-control" name="gender" required>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                      
                    </select>
                  </div>  
                    </div>

                    <div class="col">
                      <div class="form-group">
                    <label for="exampleInputPassword1">Comment</label>
                    <textarea class="form-control" name="comment" rows="3" placeholder="Comment"></textarea>
                  </div>   
                    </div>

                    
                    </div>
                    
                </div>



                 

                 

                

                  <button type="submit" class="btn btn-primary" name="loans">Submit</button>
                </form>







                        


                        

                        


                        

                
                    </div>
             
            
               
            <!-- </div> -->


    
            


               

                


             <div class="container event" id="two">

               <table class="table">

            <thead>
              <tr>
                
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Amount</th>
                <th scope="col">Loan Type</th>
              
             <th scope="col">Action</th>
              </tr>
            </thead>

            <tbody></tbody>

            </table>
              
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

        // display all featured news
        $(document).ready(function(){

$.ajax({
 url:"loansajax.php",
 type:"get",
 dataType:"JSON",
 success:function(response){
   console.log(response);
     var len = response.length;
     for (var i = 0; i < len; i++) {

           var edit = response[i]['edit'];
         var my_delete  = response[i]["delete"];

         var action = edit.concat(" ", my_delete);

         var first_name = response[i]["first"];

         var last_name = response[i]["last"];
         var email = response[i]["email"];
         var amount = response[i]["amount"];
         var loan_type = response[i]["type"];
       
     

         var table_str = "<tr>" +
                      
                      
                      "<td>" + first_name + "</td>" +
                      "<td>" + last_name + "</td>" +
                      "<td>" + email + "</td>" +
                      "<td>" + amount + "</td>" +
                      "<td>" + loan_type+ "</td>" +
                    "<td>" + action + "</td>" +
                      "</tr>";


              $(".table tbody").append(table_str);

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