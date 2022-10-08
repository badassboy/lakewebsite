<?php

include("../library.php");
$ch = new Banking();

if(isset($_POST['add'])){
  $msg = "";
  $branch = trim($_POST['branch']);
  $address = trim($_POST['address']);
  $location= $_POST['location'];
  $mobile = trim($_POST['mobile']);

  if(empty($branch)|| empty($address)|| empty($location) || empty($mobile)){
    $msg = "fields are required";
  }else {
    $laliga = $ch->addBranch($branch,$address,$location,$mobile);
    if($laliga){
      $msg = "Branch Created";
    }else {
      $msg = "failed in adding branch";
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

        button[type="submit"]{
            margin: 2%;
            width: 50%;
            margin-left: 40%;
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
                <p>BRANCHES</p>


            <li>
                <a href="#" id="appointment" data-target="one" class="test">Create Branches</a>
            </li>

            <li>
                <a href="#" id="event" data-target="two" class="test">All Branches</a>
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

            <h2>BRANCHES</h2>

            <div class="container appointment show" id="one">

                            <div class="myForm">
                                <?php 

                                if (isset($msg)) {
                                    echo $msg;
                                }

                                ?>

           <form method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Branch Name</label>
            <input type="text" class="form-control" name="branch" placeholder="Branch Name" required>
           
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Address</label>
            <input type="text" class="form-control" name="address" placeholder="Address" required>
          </div>

           <div class="form-group">
            <label for="exampleInputPassword1">Location</label>
            <input type="text" class="form-control" name="location" placeholder="location" required>
          </div>

           <div class="form-group">
            <label for="exampleInputPassword1">Telephone Number</label>
            <input type="tel" class="form-control" name="mobile" placeholder="Mobile" required>
          </div>

         

          <button type="submit" class="btn btn-primary" name="add">Submit</button>
        </form>




                                

                                
                                

                                

                                


                                

                        
                            </div>
             
            
               
            </div>


    
            


               

                


             <div class="container event" id="two">

               <table class="table">

            <thead>
              <tr>
                
                <th scope="col">Amount</th>
                <th scope="col">Accnt Holder</th>
                <th scope="col">Accnt Number</th>
                <th scope="col">Status</th>

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
 url:"featuredajax.php",
 type:"get",
 dataType:"JSON",
 success:function(response){
   console.log(response);
     var len = response.length;
     for (var i = 0; i < len; i++) {

           var edit = response[i]['edit'];
         var my_delete  = response[i]["delete"];

         var action = edit.concat(" ", my_delete);

         var branch = response[i]["branch"];

         var address = response[i]["address"];
       
         var location = response[i]["location"];
         var mobile = response[i]["mobile"];

         var table_str = "<tr>" +
                      
                      
                      "<td>" + branch + "</td>" +
                      "<td>" + address + "</td>" +
                    
                      "<td>" + location + "</td>" +
                      "<td>" + mobile + "</td>" +
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