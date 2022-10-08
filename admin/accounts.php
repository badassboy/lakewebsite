<?php

include("../library.php");
$ch = new Banking();

if(isset($_POST['laliga'])){
  $msg = "";
  $title = trim($_POST['title']);
  $picture = $_FILES['photo']['name'];
  $featured_date = $_POST['news_date'];
  $description = trim($_POST['description']);

  if(empty($title)|| empty($picture)|| empty($description) || empty($featured_date)){
    $msg = "fields are required";
  }else {
    $laliga = $ch->featured($title,$picture,$description,$featured_date);
    if($laliga){
      $msg = "News Added";
    }else {
      $msg = "failed in posting news";
    }
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

         .form-group input[type="number"]{
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
                <a href="#" id="appointment" data-target="one" class="test">Register Account</a>
            </li>

            <li>
                <a href="#" id="event" data-target="two" class="test">All Accounts</a>
            </li>

            <li>
                <a href="#" id="fund" data-target="three" class="test">Fund Account</a>
            </li>

             <li>
                <a href="#" id="transfer" data-target="four" class="test">Transfer</a>
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

            <h2>Accounts Page</h2>

            <div class="container appointment show" id="one">

                <div id="response"></div>

                            <div class="myForm">
                        
            <form method="post" id="creation" action="admin_account_creation.php">
                <div  class="row">

                  <div class="col">
                      <div class="form-group">
  <input type="text" name="first_name" class="form-control"  placeholder="Enter first name" required>
              </div>
                  </div>

                  <div class="col">
                      <div class="form-group">
              <input type="text" name="maiden_name" class="form-control"  placeholder="Enter maiden name" >
              </div> 
                  </div>

                  <div class="col">
                       <div class="form-group">
<input type="text" name="last_name" class="form-control"  placeholder="Enter last name" required>
      </div>
                  </div>
                                           
                </div>
                     

                                           
                     

             
                <div class="form-group">
                       
                    <input type="date" name="birthday" class="form-control" required>
                  </div>

                  <div class="form-group">
                 
<input type="email" name="email" class="form-control"  placeholder="Enter email" required>
                  </div>

                                          <div class="form-group">
                                           
                      <input type="text" name="country" class="form-control"  placeholder="Enter country" required>
                                          </div>
                                           

                                        

                    <div class="form-group">
  <input type="text" name="address" class="form-control" placeholder="Residential Address" required>
                    </div>

                    <div class="form-group">
                   
      <input type="tel" name="mobile" class="form-control"  placeholder="Mobile Number" required>
                    </div>
                                         
                 <div class="form-group">
                 
                   <select class="form-control" name="accnt_type" id="exampleFormControlSelect1" required>
                        <option>Select Account</option>
                        <option>Joint Account</option>
                        <option>Savings Account</option>
                        <option>Loans Account</option>
                      </select>
                 </div>

         <div class="form-group">
            <label>Account Balance</label>
            <input type="number" min="1" class="form-control" name="account_balance" placeholder="Account Balance">
             
         </div>



                            <div class="row">
                              <div class="col">
                          <div class="form-group">
         <input type="password" name="password" class="form-control"  placeholder="Password" required>
                       </div>  
                      </div>

                      <div class="col">
                           <div class="form-group">
<input type="password" name="confirm_password" class="form-control"  placeholder="Confirm password" required>
                                     </div>
                      </div>  
                            </div>
                      

    <button type="submit"  class="btn btn-primary" style="width:50%; margin-top: 2%;">Submit</button>

            

                                      </form>


                            </div>
             
            
               
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



            <div class="container fund" id="three">
                <div id="response"></div>

  <form method="post" id="funding" action="fund.php">

    <div class="form-group">
      <label>Account Name</label>
      <div class="form-group">
         <select class="form-control" name="initial_deposit">
            <?php 

                $account = $ch->getAccount();
                foreach ($account as $row) {
                    echo '

                        <option value="'.$row['first_name'].'">'.$row['first_name'].'</option>

                    ';
                }
           


             ?>
         </select>
       </div>

     
    </div>

    <div class="form-group">
      <label>Amount</label>
      <input type="number" step="any" min="1" name="money" class="form-control"  placeholder="Amount">
    </div>

                   

    <button type="submit"  class="btn btn-primary">Submit</button>
                  </form>
                  
        </div>

        <!-- transfer -->
        <div class="container transfer" id="four">
            <div id="response"></div>

              <form method="post" id="transfers" action="transfers.php">

                <div class="form-group">
                  <label>Receiver Account</label>
                  <div class="form-group">
                    <input type="number" class="form-control" name="receiver" placeholder="Example:1234567" required>
                     
                   </div>
                </div>

                <div class="form-group">
                    <label>Recipient FulName</label>
                    <input type="text" class="form-control" name="full_name" placeholder="FullName" required>
                    
                </div>

                 <div class="form-group">
                    <label>Purpose</label>
                    <input type="text" class="form-control" name="purpose" placeholder="Purpose">
                    
                </div>

                 

                <div class="form-group">
                  <label>Amount</label>
                  <input type="number" step="any" min="1" name="amount" class="form-control"  placeholder="Amount">
                </div>

        <div class="form-group">
          <label>Transfer Code</label>
          <input type="number"  name="transfer_code" class="form-control"  placeholder="Transfer Code" required>
        </div>

               
                               

                <button type="submit"  class="btn btn-primary">Submit</button>
                              </form>
              
            </div>
            <!-- end of transfer -->





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


        // register user account section
        $(document).ready(function(){

            $("#creation").submit(function(e){
              e.preventDefault();
              $.ajax({
                type:"post",
                url:"admin_account_creation.php",
                data:$("#creation").serialize()
              })

              .done(function(data){
                $("#response").html(data);
                // console.log("hello");
              })

              .fail(function(data){
                $("#response").html(data);
                // console.log("hi");
              });

             $("#creation").find('input').val(" ");
                
            });

        });

        // fund account
        $(document).ready(function(){

            $("#funding").submit(function(e){
              e.preventDefault();
              $.ajax({
                type:"post",
                url:"fund.php",
                data:$("#funding").serialize()
              })

              .done(function(data){
                $("#response").html(data);
                // console.log("hello");
              })

              .fail(function(data){
                $("#response").html(data);
                // console.log("hi");
              });

             // $("#funding").find('input').val(" ");
                
            });

        });


        $(document).ready(function(){

            $("#transfers").submit(function(e){
              e.preventDefault();
              $.ajax({
                type:"post",
                url:"transfers.php",
                data:$("#transfers").serialize()
              })

              .done(function(data){
                $("#response").html(data);
                // console.log("hello");
              })

              .fail(function(data){
                $("#response").html(data);
                // console.log("hi");
              });

             // $("#funding").find('input').val(" ");
                
            });

        });


        





        // show all users ccount
        $(document).ready(function(){

$.ajax({
 url:"accountajax.php",
 type:"get",
 dataType:"JSON",
 success:function(response){
   console.log(response);
     var len = response.length;
     for (var i = 0; i < len; i++) {

           var edit = response[i]['edit'];
         var my_delete  = response[i]["delete"];

         var action = edit.concat(" ", my_delete);

        var account_number = response[i]['account_number'];
        
         var first_name = response[i]["first"];
         var last_name = response[i]["last"];

         var account_name = first_name + " " + last_name;
        
         var balance = response[i]["balance"];
         var email = response[i]["email"];
         var verify = response[i]["verify"];

        var my_date = response[i]["account_date"];
         

         var table_str = "<tr>" +
                      
                      
                      "<td>" + account_number + "</td>" +
                      "<td>" + account_name + "</td>" +
                      "<td>" + balance + "</td>" +
                      
                      "<td>" + email + "</td>" +
                      "<td>" + verify + "</td>" +
                    
                      "<td>" + my_date + "</td>" +
                     
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