<?php

require("../library.php");
$bank = new Banking();
$db = DB();
$id = "";

$msg = "";
	
	$id = $_GET['edit'];

	if (isset($id)) {


		$stmt = $db->prepare("SELECT * FROM account WHERE id = ?");
		$stmt->execute([$id]);
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $invoice_id = $row['id'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $email = $row['email'];
            $mobile = $row['phone'];
            $balance = $row['balance'];
            $password = $row['password'];


			
		}
	}else {
		echo  "no";
	}


    if(isset($_POST['update'])){

        $first_name = $_POST['first'];
        $last_name = $_POST['last'];
        $email = $_POST['email'];
        $phone = $_POST['mobile'];
        $phone = $_POST['mobile'];
        $balance = $_POST['account_balance'];
        $id = $_POST['id'];

      
		$customer = $bank->updateCustomerInfo($first_name,$last_name,$email,$phone,$balance,$password,$id);
		if ($customer) {
			$msg = '<div class="alert alert-success" role="alert">Info Updated</div>';
		}else {
			$msg =  '<div class="alert alert-danger" role="alert">Failed to update customer info</div>';
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
   		height: 820px;
   		display: flex;
   	   flex-direction: row;
   	   flex-wrap: wrap;
   	   justify-content: center;
   	   align-items: center;
   	   position: relative;

   	}

   	.navigations{
   		position: absolute;
   		top: 8px;
   		left: 16px;
   		font-size: 18px;
   	}


   	.edit-form {
   		background-color: hsl(0, 0%, 100%);
   		height: 650px;
   		width: 50%;
   		padding-top: 3%;

   	}

   	.edit-form h3 {
   		padding-top: 1%;
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

		<div class="navigations">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="homepage.php">Home</a></li>
			    <li class="breadcrumb-item"><a href="accounts.php">Accounts</a></li>
			    <li class="breadcrumb-item active" aria-current="page">Edit Account</li>
			  </ol>
			</nav>
		</div>



			

		<div class="container edit-form">

			
			<?php

			if (isset($msg)) {
				echo $msg;
			}

			?>
			<h3>Edit Customer Info</h3>
			<form method="post" action="">

				<div class="row">

					<div class="col">
						<div class="form-group">
			    <label for="exampleInputEmail1">First Name</label>
			    <input type="text" name="first" class="form-control" value="<?php echo $first_name; ?>">

			  </div>
					</div>

					<div class="col">
						 <div class="form-group">
			    <label for="exampleInputEmail1">Last Name</label>
			    <input type="text" name="last" class="form-control" value="<?php echo $last_name; ?>">
			  </div>
					</div>

					
				</div>
				<!-- end of first row -->


				<div class="row">

					<div class="col">
					 <div class="form-group">
				    <label>Email</label>
				    <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
				  </div>
					</div>

					<div class="col">
						 <div class="form-group">
			    <label for="exampleInputEmail1">Phone Number</label>
			    <input type="text" name="mobile" class="form-control" value="<?php echo $mobile; ?>">
			  </div>
					</div>
					
				</div>

			  
			    

			<div class="form-group">
			    <label for="exampleInputEmail1">Account Balance</label>
			    <input type="number" name="account_balance" class="form-control" value="<?php echo $balance; ?>">
			  </div>


			  <div class="form-group">
			    <label for="exampleInputEmail1">Password</label>
			    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
			  </div>


			  <div class="form-group">
			  	<input type="hidden" name="id" value="<?php echo $invoice_id; ?>">
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