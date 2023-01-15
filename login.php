<?php  
// session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require("library.php");
$bank = new Banking();

$msg = "";

// get current timestamp
$current_time = time();
if (isset($_POST['login'])) {
  
  $email = $_POST['email'];
  $password = $_POST['password'];
  $remember_me = $_POST['remember_me'];

  if (empty($email)|| empty($password)) {
    $msg = "fields required";
  }

// this section extends user's session for a week once 
  elseif(isset($remember_me)){

    // get current time in seconds
      $start = microtime(true);

    $user_login = $bank->loginUser($email,$password);
    if ($user_login) {
        
        // store user's id in  a session for later usage
         $_SESSION['id'] = $user_login['id'];
        // user sssion last for a week when remember checkbox is ticked
      session_set_cookie_params(3600*24*7);

      // verify time takeb to login with valid details
      $end = microtime(true);
      $time_taken = $end - $start;
    // $_SESSION['login_time'] = $time_taken;
    }

  }
  // keeps user login when session is not cleared from the browser
  else {
     // get current time in seconds
      $start = microtime(true);
    $user_login = $bank->loginUser($email,$password);

        if ($user_login) {

      $_SESSION['id'] = $user_login['id'];
      $_SESSION['email'] = $user_login['email'];
      $_SESSION['first'] = $user_login['first_name'];

       // verify time takeb to login with valid details
      $end = microtime(true);
      $time_taken = $end - $start;
    // $_SESSION['login_time'] = $time_taken;

      // calculate timeout functionality of the login session
      // if the user is authenticated, store the current timestamp in the session
      $_SESSION['last_activity'] = $current_time;

      // generate OTP Code, store in database and send to user email
      $customerLoginCode = $bank->generateCustomerOTP();
      $bank->insertCustomerOTP($_SESSION['id'],$customerLoginCode);
      $bank->emailCustomerOTP($customerLoginCode,$email);


        header("Location:user/homepage.php");
      // header("Location:user/login_code.php");
      exit();
      $msg = '<div class="alert alert-success" role="alert">Login succcessful</div>';
    }else {
      $msg = '<div class="alert alert-danger" role="alert">Login failed.</div>';

      // check if session has timed out
      $session_timeout = 300; //5mins
      if (isset($_SESSION['last_activity']) && ($current_time-$_SESSION['last_activity']) > $session_timeout) {
          // the session has timeout , so destory the session and redirect the user to the login page
        session_destroy();
        $bank->redirect("login.php");

      }else{
        // update the last activity timestamp
        $_SESSION['last_activity'] = $current_time;
      }
    }
        
    
    
  }


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
        .form-group input[type="password"]{
            width: 50%;
        }

        .form-group input[type="checkbox"]{
            margin-top: 2%;
        }

        .form-check-label{
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
                    <a href="" class="h5 text-white">Services</a>
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

            <?php  

            if (isset($msg)) {
                echo $msg;
            }

            ?>
            <h3 class="mb-0">Login into your account</h3>

            <form method="post">
              <div class="form-group">
              <label>Email</label>
                <input type="email" name="email" class="form-control"  placeholder="Enter email" required>
              </div>

              <div class="form-group">
              <label>Password</label>
                <input type="password" name="password" class="form-control"  placeholder="Password" required id="password" autocomplete="off">

              </div>

              <div class="row">

                <div class="col">
                     <div class="form-group">
                  <input class="form-check-input" type="checkbox" value="" onclick="togglePassword()">
                  <label class="form-check-label" for="defaultCheck1">
                    Show password
                  </label>
              </div>
                </div>

                <div class="col">
                    <div class="form-group">
                  <input class="form-check-input" type="checkbox" value="" name="remember

                  ">
                  <label class="form-check-label" for="defaultCheck1">
                    Remember Me
                  </label>
              </div> 
                </div>
                  
              </div>

             

              



    <button type="submit" name="login" class=" btn-primary" style="width:50%; margin-top: 3%;">Login</button> 

              <p class="forget"><a href="forget_password.php">Forget  your password?</a></p><br>
              <p>Don't have an account? <a href="create_account.php">Get Started</a></p>
            </form>
            
            
            <div class="row g-5"></div>
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

        function togglePassword(){

            var passwordField = document.getElementById("password");
            if (passwordField.type == "password") {
                passwordField.type = "text";
            }else{
                passwordField.type = "password";
            }

        }

    </script>
</body>

</html>