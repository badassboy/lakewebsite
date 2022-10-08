<?php  
session_start(); 
ini_set('display_errors', 1);
error_reporting(E_ALL); 

require("library.php");

$bank = new Banking();
$file_name ="";
$id="";

if (isset($_SESSION['id'])) {

  $id = $_SESSION['id'];

  if (isset($_POST['upload'])) {
    $file_name = $_FILES['photo']['name'];

    $updated = $bank->uploadProfile($file_name,$id);

    if ($updated) {
      echo "<script>alert('uploaded')</script>";
    }else {

      echo "<script>alert('not uploaded')</script>";
    }
   
  }

}

$user_image = $bank->displayUserData($id);
$_SESSION['image'] = $user_image['profile'];


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

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
	    .loan_div {
	       height: 350px;
	       background-color: #f2f2f2;
	       border: 1px solid #f2f2f2;
	       width: 100%;
	       margin-top: -5%;
	    }

	   
	</style>

	
</head>
<body>

	<?php include("header.php"); ?>

	<!-- Navbar Start -->
	<div class="container-fluid position-relative p-0">

	    <?php include("homepage_nav.php");  ?>
	    <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
	        <div class="row py-5">
	            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
	                <h1 class="display-4 text-white animated zoomIn">Edit Profile</h1>
	                <a href="" class="h5 text-white">Home</a>
	                <i class="far fa-circle text-white px-2"></i>
	                <a href="" class="h5 text-white">Loans</a>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- Navbar End -->

	<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
	    <div class="container py-5 loan_div">

	    	  <img src="<?php  echo $_SESSION['image'];?>" alt="" class="d-block ui-w-80" 

	    	  style="width:30%; height: 200px;">

	    	<form method="post" id="edit-form" action="" enctype="multipart/form-data" class="myForm">

	    	  <div class="form-group">
	    	    <input type="file"  class="form-control-file" name="photo"
	    	     id="exampleFormControlFile1" required="required">
	    	  </div>

	    	
	    	  <input type="submit" name="upload" class="btn btn-primary" value="Update profile">
	    	
	    	</form>

	    </div>
	</div>


	  

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

</body>
</html>