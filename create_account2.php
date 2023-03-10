<?php
// session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require("library.php");
// require("email_library.php");
$bank = new Banking();
// $user_email = new Email();



$msg ="";


if (isset($_POST['customer'])) {

 
         
  if (isset($_SESSION["id"])) {


     // var_dump($id);
  $birthday = $_POST['birthday'];
  // echo $birthday;
  $email = $_POST['email'];
  // echo $email;
  $country = $_POST['country'];
  // echo $country;
  

  if ($bank->validEmail($email)) {
      $msg = '<div class="alert alert-danger" role="alert">Invalid email</div>';
  }

  elseif($bank->checkDuplicateEmail($email)){
    $msg = '<div class="alert alert-danger" role="alert">Email already exist</div>';
  }
  
  else{
    $userAccount = $bank->secondPageRegister($birthday,$email,$country,$_SESSION["id"]);
  }


      
   } else {
    echo "false";
   }
  // echo $id;

 
    
   
   
 
  
    
 

  

  
   
  
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Startup - Startup Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style type="text/css">
        
         .btn-primary{
/*                background-color: red;*/
                margin-top: -50px;
                width: 50%;

            }

        .already_login {
            margin-top: 2%;
        }
    </style>
</head>

<body>
    <!-- Spinner Start -->
   <!--  <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div> -->
    <!-- Spinner End -->

   




    <!-- Topbar Start -->
   <?php include("header.php"); ?>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">

        <?php include("nav.php");  ?>
        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Services</h1>
                    <a href="" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="" class="h5 text-white">Account Creation</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


    <!-- Service Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <!-- <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;"> -->
                <h5 class="fw-bold text-primary text-uppercase">Account Creation</h5>
                <h5 class="mb-0">Please fill below form to create your account</h5>

                <?php 



                if (isset($msg)) {
                  
                    echo $msg;
                }


                ?>

                <form method="post">

                   

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
                <div type="hidden" id="spinner" class="spinner-border"></div>
                   
               </div>


<button type="submit" name="customer" class="btn btn-primary">Continue</button>

  <p class="already_login">Already have an ccount? <a href="login.php">Login</a></p>

                </form>


            <!-- </div> -->

            <!-- <div class="row g-5"></div> -->
        </div>
    </div>
    <!-- Service End -->


    <!-- Footer Start -->
    <?php include("footer.php"); ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a> -->


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script type="text/javascript">

        function show_spinner() {

            var spinner = document.getElementById("spinner");
            spinner.show();
            
        }

        function hide_spinner(){
             var spinner = document.getElementById("spinner");
            spinner.hide();   
        }
        

    </script>


    
</body>

</html>