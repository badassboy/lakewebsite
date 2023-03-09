<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$login_button = "";
require("library.php");
include("config.php");
$bank = new Banking();

$msg ="";
if (isset($_POST['account'])) {
  
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $maiden = $_POST['maiden_name'];
  

  if ($bank->firstNameCheck($first_name)) {
      $msg = '<div class="alert alert-danger" role="alert">No special letters allowed</div>';
  }
  // check for password match
  elseif($bank->lastNameCheck($last_name)){
    $msg = '<div class="alert alert-danger" role="alert">no special letters allowed</div>';
  }

  
  else {

    $userAccount = $bank->createAccount($first_name,$last_name,$maiden);

    

  }

}

 

// this code is for authentication using google account
// if (isset($_POST['googleLogin'])) {

    if(!isset($_SESSION['user_token'])) {
   //Create a URL to obtain user authorization
     echo "<a href='".$google_client->createAuthUrl()."'>Google Login</a>";
  
  } else {
    $bank->redirect("user/homepage.php");

   
  }

    
// }

// authenticate code from Google OAuth Flow
// get the code variable after the user has login into the goggle account





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
        
     

        .already_login {
            margin-top: 2%;
        }

            /*login with google*/
            .btn-google {
                color: #545454;
                background-color: #ffffff;
                box-shadow: 0 1px 2px 1px #ddd
            }

          /*  .btn {
border-radius: 2px;
text-transform: capitalize;
font-size: 15px;
padding: 10px 19px;
cursor: pointer
}*/
            /*login with google*/

            .btn-primary{
/*                background-color: red;*/
                margin-top: -50px;

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
                     
<input type="text" name="first_name" class="form-control"  placeholder="Enter first name" required>
                    </div>

                    <div class="form-group">
                     
<input type="text" name="maiden_name" class="form-control"  placeholder="Enter maiden name" >
                    </div>

                    <div class="form-group">
                    
<input type="text" name="last_name" class="form-control last_name"  placeholder="Enter last name" required>
                    </div>

                  
                    <div class="form-group">
                <div type="hidden" id="spinner" class="spinner-border"></div>
                   
               </div>


                 
                 

  <button type="submit" name="account" class="btn btn-primary" style="width:50%;">Continue</button>

  <p class="already_login">Already have an ccount? <a href="login.php">Login</a></p>

  
        
    
     <!-- </div> -->



                </form>

                <form method="post">
                    <!-- <div class="col-md-12"> -->
    <button type="submit" name="googleLogin">
       
    <a class="btn btn-lg btn-google btn-block text-lowercase btn-outline"><img src="https://img.icons8.com/color/16/000000/google-logo.png">Signup Using Google</a>
    </button>
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
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


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