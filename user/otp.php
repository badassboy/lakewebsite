<?php
session_start();
require("../library.php");
$bank = new Banking();


$msg = "";
	
	


    if(isset($_POST['update'])){

    	if (isset($_SESSION['reference'])) {
    		$reference = $_SESSION['reference'];
    		 $otp = $_POST['otp'];
       

      
		$customer = $bank->addOTP($reference,$otp);
		if ($customer) {
			$msg = '<div class="alert alert-success" role="alert">Transfer successful</div>';
		}else {
			$msg =  '<div class="alert alert-danger" role="alert">Transfer failed</div>';
		}
	}else {
		$msg = "session does not exist";
	}

       


    }


?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
   <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

   <style type="text/css">
   	
   	*{
   		margin: 0;
   		padding: 0;
   		box-sizing: border-box;
   		font-family: 'Raleway', sans-serif;
   	}

   	

   	.edit-page{

   		background-color:#f2f2f2;
   		height: 800px;
   		display: flex;
   	   flex-direction: row;
   	   flex-wrap: wrap;
   	   justify-content: center;
   	   align-items: center;

   	}


   	.edit-form {
   		background-color: hsl(0, 0%, 100%);
   		height: 640px;
   		width: 50%;
   		padding-top: 3%;

   	}

   	.edit-form h3 {
   		padding-top: 7%;
   		padding-left: 30%;
   		padding-bottom: 1%;
   		font-weight: bolder;
   	}

   	 input[type=text] {
   		width: 100%;
   		/*margin-left: 30%;*/
   		font-size: 20px;
   	}

   	form label {
   		padding-left: 30%;
   		font-weight: bolder;
   	}


   	.btn-primary {
   		width: 100%;
   		height: 40px;
   		/*margin-left: 30%;*/
   		border: 2px solid ##e6e600;
   		font-weight: bolder;
   	}

   </style>

</head>
<body>

	<div class="container-fluid edit-page">

		<div class="container edit-form">
			<?php

			if (isset($msg)) {
				echo $msg;
			}

			?>
			<h3>OTP Code</h3>
			<form method="post" action="">

				<small>*Please contact your bank if you dont have the transfer code</small>

			  <div class="form-group">
			    <label for="exampleInputEmail1">First Name</label>
			    <input type="text" name="otp" class="form-control" placeholder="OTP Code" required>

			    
			  </div>

			 <button type="submit" name="update" class="btn btn-primary">Update</button>
			</form>
		</div>
		
	</div>

	




	 <!-- jQuery CDN  -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
	
	 <!-- Bootstrap JS -->
	<!-- <script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script> -->
	<!-- <script src="../bootstrap/dist/js/bootstrap.min.js"></script> -->

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>