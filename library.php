<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("database.php");

class Banking{

	

public function createAccount($firstName,$lastName,$maiden,$birthday,$email,$country,$address,$phone,$accnt_type,$password)
{


	$dbh = DB();
	$hashed = password_hash($password,PASSWORD_DEFAULT);
	$initial_balance =  20.0;
	$account_number = rand();
	$login_code = rand();
		// insert user account if account does not exist
	$stmt = $dbh->prepare("INSERT INTO account(account_number,balance,first_name,last_name,maiden,birthday,email,country,address,phone,account_type,password,login_code) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");

	$stmt->execute([$account_number,$initial_balance,$firstName,$lastName,$maiden,$birthday,$email,$country,$address,$phone,$accnt_type,$hashed,$login_code]);
	
	$inserted = $stmt->rowCount();
	if ($inserted>0) {
		// email login code to the user.
		$to = $email;
		$subject = "Login Security Code";
		$msg = "Your login code is : '.$login_code.'";

		$headers = array(
			 "From: donotreply@lakesidecreditunion.com",
			 "Content-type: text/html"
			);

			$mail = mail($to,$subject,$msg, implode("\r\n", $headers));

		return true;
	}else {
		return $dbh->errorInfo();
	}

	

	
}

		

		public function accountActivation($email){
			
			$dbh =DB();

			$stmt = $dbh->prepare("SELECT * FROM account WHERE email=?");
			$stmt->execute([$email]);
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

				$id = $row['id'];


			// // Send email to user with the token in a link they can click on
			$to = $email;
			
			$subject = "Click on below link to activate your account";

			
			$msg = "Click <a href='www.lemonfirmbank.com/activate_account.php?user_id=$id'>here</a> to reset your password";
													
				   	// $headers[] = 'MIME-Version: 1.0';
				   	// $headers[] = 'Content-type: text/html; charset=iso-8859-1';
				   	// $headers[] = 'From:webmaster@example.com';
											   
					$email_sent = mail($to, $subject, $msg, implode("\r\n", $headers));

					if ($email_sent) {
						return true;
					}else {
						return false;
					}
			}



			

	}

	public function verificationStatus($id)
	{
		$dbh = DB();
		$stmt = $dbh->prepare("UPDATE account SET verified=1 WHERE id=?");
		$stmt->execute([$id]);
		$data = $stmt->rowCount();
		if ($data>0) {
			return true;
		}else {
			return false;
		}
	}


	
	

	public function firstNameCheck($firstName)
	{
		try{
		  return preg_match('[@_!#$%^&*()<>?/|}{~:]', $firstName);
		}catch(Exception $exception){
		  print($exception->getMessage());
		}
          
	}

	public function lastNameCheck($lastName)
	{
		try{
		   return preg_match('[@_!#$%^&*()<>?/|}{~:]', $lastName);	
		}catch(Exception $exception){
			print($exception->getMessage());
		}
	  
	}

			  

	public function loginUser($email,$password)
		{

		$dbh = DB();
		$current_date = date("Y-m-d");


		$stmt = $dbh->prepare("SELECT * FROM account WHERE email = ?");
		$stmt->execute([$email]);
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		
		
		if($stmt->rowCount()>0){
			if (password_verify($password, $data['password'])) {
				

			// send email to loggedin user after email.
			$to = $email;
			$subject = "Login Notification";
			$message = "New Login. Dear User, we detected an account login from a new device at
			'.$current_date.'.<br><br>
			if it was not you, please change your password or contact us at info@lakesidecreditunion.com";
			$headers = array(
			 "From: donotreply@lakesidecreditunion.com",
			 "Content-type: text/html"
			);

			$mail = mail($to,$subject,$message, implode("\r\n", $headers));
			

			return $data;


			}else {
				return false;
			}
			//return password_verify($password, $data['password']);
		}else {
			return false;
		}


	} 

	public function AuthenticatedUserInfo($id)
	{
		try{
		  $dbh = DB();
		$stmt = $dbh->prepare("SELECT * FROM account WHERE id = ?");
		$stmt->execute([$id]);
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		return $data;
		}catch(Exception $ex){
			print($ex->getMessage());

		}
		
	}

	public function securedPassword($password)
	{
		try{
			// check for capital letters, lower case characters,numbers and special characters

		 return preg_match('@[A-Z]@', $password)|| preg_match('@[a-z]@', $password) || preg_match('@[0-9]@', $password) || preg_match('@[^\w]@', $password);

		}

		catch(Exception $ex){
                 print($ex->getMessage());
		}

		return false;
		
		
	}

	public function passwordLength($password){

		try{

		    return (mb_strlen($password, "UTF-8")<6) ? true : false;
		    

		}catch(Exception $ex){
		  print($ex->getMessage());
		}

		

	}

	// password matches function
	public function passwordMatch($password,$cpwd)


	{
		try{
			return ($password != $cpwd) ? true : false;

		}catch(Exception $ex){
			print($ex->getMessage());
		}

		
		
	}

	

	// validate email
	public function validEmail($email)

	{
		try{
		  return !filter_var($email,FILTER_VALIDATE_EMAIL) == true;
		}catch(Exception $ex){
			print($ex->getMessage());
		}
		
		
	}

	public function forgetLink($email){

		$dbh = DB();

		try{


					// generate a unique random token of length 100
			$stmt = $dbh->prepare("SELECT email,password FROM account  WHERE email = ?");
			$stmt->execute([$email]);
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  
				$email = $row['email'];
				$token = bin2hex(random_bytes(50));

				$stmt =$dbh->prepare("INSERT INTO password_reset(email,token) VALUES(?,?)");
				$stmt->execute([$email,$token]);
				if ($stmt->rowCount()>0) {

									// // Send email to user with the token in a link they can click on
						$to = $email;
						
						$subject = "Click on below link to activate your account";

		$msg = "Click <a href='www.lemonfirmbank.com/new_password.php?token=$token'>here</a> to reset your password";
													
				   	$headers[] = 'MIME-Version: 1.0';
				   	$headers[] = 'Content-type: text/html; charset=iso-8859-1';
											   
					$email_sent = mail($to, $subject, $msg, implode("\r\n", $headers));

					if ($email_sent) {
						return true;
					}else {
						return false;
					}
					
				}
			}

		}catch(PDOException $ex){
			echo $ex->getMessage();
		}

	}

	// change user password
	public function newUserPassword($password){
		$dbh = DB();
		$token = "";
		if (isset($_GET['token'])) {
			$token = $_GET['token'];

			$stmt = $dbh->prepare("SELECT email FROM password_reset WHERE token = ?");
			$stmt->execute([$token]);
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$email = $row['email'];

				if ($email) {
					$new_password = password_hash($password, PASSWORD_DEFAULT);
					$stmt = $dbh->prepare("UPDATE account SET password = ? WHERE email = ?");
					$stmt->execute([$new_password,$email]);
					$row = $stmt->rowCount();
					if ($row>0) {
						return true;
					}else {
						return false;
					}

				}
			}

		}
	}
				

					
	public function transfers($email,$name,$city,$address,$status,$amount,$holder,$account_number)
	{

		$dbh = DB();
		$stmt = $dbh->prepare("INSERT INTO transfers(email,cust_name,city,address,status,amount,account_holder,account_number) VALUES(?,?,?,?,?,?,?,?)");
		$stmt->execute([$email,$name,$city,$address,$status,$amount,$holder,$account_number]);
		$inserted = $stmt->rowCount();
		if ($inserted>0) {
			return true;
		}else {
			return $dbh->errorInfo();
		}
	}

	// public function transfers2($name, $accnt_name,$accnt_number,$city,$address,$mobile,$id)
	public function Receivertransfer($name, $accnt_name,$accnt_number,$city,$address,$phone,$email)
	{

		$dbh = DB();
		
		$stmt = $dbh->prepare("UPDATE transfers SET receiver_name=?, receiver_account_name=?, receiver_account_number=?,receiver_city=?,receiver_address=?,receiver_mobile=? WHERE email=?");
		$stmt->execute([$name, $accnt_name,$accnt_number,$city,$address,$phone,$email]);
		$inserted = $stmt->rowCount(); 
		if ($inserted>0) {
		    return true;
		}else {
		    return $dbh->errorInfo();
		}


	}


	public function codeGeneration($cot,$tax,$imf,$otp,$email)
	{

		$dbh = DB();
		
		$stmt = $dbh->prepare("UPDATE transfers SET cot_code=?, tax_code=?, imf_code=?,otp_code=? WHERE email=?");
		$stmt->execute([$cot,$tax,$imf,$otp,$email]);
		$inserted = $stmt->rowCount(); 
		if ($inserted>0) {
		    return true;
		}else {
		    return $dbh->errorInfo();
		}


	}


	public function registerAdmin($username,$email,$password)
	{
		$dbh = DB();
		$hashed = password_hash($password, PASSWORD_DEFAULT);
		$stmt = $dbh->prepare("INSERT INTO admin(username, email, password) VALUES(?,?,?)");
		$stmt->execute([$username,$email,$hashed]);
		$inserted = $stmt->rowCount();
		if ($inserted>0) {
			return true;
		}else {
			return $dbh->errorInfo();
		}

	}

	public function loginAdmin($email,$password)
	{

		$dbh = DB();
		$stmt = $dbh->prepare("SELECT * FROM admin WHERE email = ?");

		$stmt->execute([$email]);
		$data = $stmt->fetch(PDO::FETCH_ASSOC);

		$count = $stmt->rowCount();
		if ($count == 1) {
			
			if (password_verify($password, $data['password'])) {
				return $data;
			}else{
				return false;
			}
			
		}else{
			return false;
		}

	}


	public function adminAccountCreation($account_balance,$firstName,$lastName,$maiden,$birthday,$email,$country,$address,$phone,$accnt_type,$password)
	{

		$dbh = DB();
		$hashed = password_hash($password,PASSWORD_DEFAULT);
		$account_number = rand();

		$stmt = $dbh->prepare("INSERT INTO account(account_number,balance,first_name,last_name,maiden,birthday,email,country,address,phone,account_type,password) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");

		$stmt->execute([$account_number,$account_balance,$firstName,$lastName,$maiden,$birthday,$email,$country,$address,$phone,$accnt_type,$hashed]);

		$inserted = $stmt->rowCount();
		if ($inserted>0) {
			return true;
		}else {
			return $dbh->errorInfo();
		}
	}

	// Code not working.Have to fixed it
	public function fundAccount($account,$amount)
	{

		$dbh = DB();
		$stmt = $dbh->prepare("UPDATE account SET current_amount =? WHERE first_name =?");
		$stmt->execute([$amount,$account]);
		$data = $stmt->rowCount();
		if ($data>0) {
			return true;
		}else {
			return false;
		}

	}


	public function loans($fullname,$email,$mobile,$address,$loan_type,$amount,$date,$gross_income,
        $occupation,$gender,$comment)
	{
		$dbh = DB();

$stmt = $dbh->prepare("INSERT INTO loans(fullname,email,phone,address,loan_type,amount,loan_date,gross_income,occupation,gender,comment) VALUES(?,?,?,?,?,?,?,?,?,?,?)");

$stmt->execute([$fullname,$email,$mobile,$address,$loan_type,$amount,$date,$gross_income,
        $occupation,$gender,$comment]);

		$inserted = $stmt->rowCount();
		if ($inserted>0) {
			return true;
		}else {
			return false;
		}

	}

	public function displayUserData($id)
	{
		$dbh = DB();
		$stmt = $dbh->prepare("SELECT * FROM account WHERE id=?");
		$stmt->execute([$id]);
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			return $row;
		}
	}

	public function changePassword($id,$pwd1)
	{
		$dbh = DB();

		
		$hashed = password_hash($pwd1,PASSWORD_DEFAULT);
		$stmt = $dbh->prepare("UPDATE account SET password=? WHERE id=?");
		$stmt->execute([$hashed,$id]);
		if ($stmt->rowCount()>0) {
			return true;
		}else {
			return false;
		}
	}


	public function changeCustomerPassword($id,$pwd1)
	{
		$dbh = DB();

		
		$hashed = password_hash($pwd1,PASSWORD_DEFAULT);
		$stmt = $dbh->prepare("UPDATE account SET password=? WHERE id=?");
		$stmt->execute([$hashed,$id]);
		if ($stmt->rowCount()>0) {
			return true;
		}else {
			// var_dump($stmt->errorInfo());
			return false;		
		}
	}

	public function uploadProfile($file_name,$id){
		$dbh = DB();

			 $path = "img/";
			 $errors = array();
		      $file_name = $_FILES["photo"]['name'];
		     
		      $file_size = $_FILES['photo']['size'];

		      $file_tmp = $_FILES['photo']['tmp_name'];
		      $file_type = $_FILES['photo']['type'];
		     

		      $test_file = $path.basename($_FILES["photo"]["name"]);
		      $file_ext = pathinfo($test_file, PATHINFO_EXTENSION);

		      $extensions= array("jpeg","jpg","png","gif");

		      if(in_array($file_ext,$extensions) === false){
		         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		      }

		      if($file_size > 4097152) {
		         $errors[]='File size must be exactly 2MB';
		      }



		      if(empty($errors)==true) {

		    if (move_uploaded_file($file_tmp, "img/".$file_name)) {
		  

				// update user's profile details
 		try{

	        $stmt = $dbh->prepare("UPDATE account SET profile=? WHERE id=?");
	        $stmt->execute(["img/".$file_name, $id]);
	        if ($stmt->rowCount()>0) {
	        	return true;
	        }else {
	        	return false;
	        }
	      

 		}catch(PDOException  $ex){
 			echo $ex->getMessage();
 		}

		     	
		     }else {
		    	return false;
		    }

		     }
 		
	}


	public function transactions($description,$amount,$transact_date)
	{
		$dbh = DB();
		$stmt = $dbh->prepare("INSERT INTO transactions(description, amount,transact_date) VALUES(?,?,?)");
		$stmt->execute([$description,$amount,$transact_date]);
		if ($stmt->rowCount()>0) {
			return true;
		}else {
			return false;
		}
	}

	public function addBranch($branch,$address,$location,$mobile)
	{
		$dbh= DB();
		$stmt = $dbh->prepare("INSERT INTO branches(branch,address,location,mobile) VALUES(?,?,?,?)");
		$stmt->execute([$branch,$address,$location,$mobile]);
		$data = $stmt->rowCount();
		if ($data>0) {
			return true;
		}else {
			return false;
		}
	}

	public function createAdmin($username,$email,$password)
	{
		$dbh = DB();
		$hashed = password_hash($password,PASSWORD_DEFAULT);
		$stmt = $dbh->prepare("INSERT INTO extra_admin(username,email,password) VALUES(?,?,?)");
		$stmt->execute([$username,$email,$hashed]);
		$data = $stmt->rowCount();
		if ($data>0) {
			return true;
		}else {
			return false;
		}

	}

	public function interest($loan,$rate)
	{
		$dbh = DB();
		$stmt = $dbh->prepare("INSERT INTO interest(loan, rate) VALUES(?,?)");
		$stmt->execute([$loan,$rate]);
		$data = $stmt->rowCount();
		if ($data>0) {
			return true;
		}else {
			return false;
		}
	}

	

		public function getAccount()
		{
			$dbh = DB();
			$stmt = $dbh->prepare("SELECT first_name FROM account");
			$stmt->execute();
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}


		public function deposit($amount,$firstName)
		{
			$dbh = DB();
			$transaction_date = date('d-m-y h:i:s');
			$transactionID = rand();
			$stmt = $dbh->prepare("INSERT INTO deposit(amount,first_name,deposit_date,transactionID)
				VALUES(?,?,?,?)");
			$stmt->execute([$amount,$firstName,$transaction_date,$transactionID]);
			$data = $stmt->rowCount();
			if ($data>0) {
				return true;
			}else {
				return false;
			}
		}

		public function getDeposit()
		{
			$dbh = DB();
			$stmt = $dbh->prepare("SELECT * FROM deposit");
			$stmt->execute();
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}

		public function getWithdrawal()
		{
			$dbh = DB();
			$stmt = $dbh->prepare("SELECT * FROM withdrawal");
			$stmt->execute();
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}

		


		public function withdrawal($amount,$firstName)
		{
			$dbh = DB();
			$transaction_date = date('d-m-y h:i:s');
			$transactionID = rand();
			$stmt = $dbh->prepare("INSERT INTO withdrawal(amount,account,withdrawal_date,transactionID)
				VALUES(?,?,?,?)");
			$stmt->execute([$amount,$firstName,$transaction_date,$transactionID]);
			$data = $stmt->rowCount();
			if ($data>0) {
				return true;
			}else {
				return false;
			}
		}

		public function customerDetails($id)
		{
			$dbh = DB();
			$stmt = $dbh->prepare("SELECT * FROM account WHERE id =?");
			$stmt->execute([$id]);
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;

		}

		public function customerTransfer($amount,$to,$fullName,$purpose,$transferCode)
		{
			$dbh = DB();
			$current_date = date('d-m-y h:i:s');
			$reference_number = rand();
			$stmt = $dbh->prepare("INSERT INTO transfers(amount,receiver,transfer_date,fullname,purpose,transferCode,reference_number) VALUES(?,?,?,?,?,?,?)");
			$stmt->execute([$amount,$to,$current_date,$fullName,$purpose,$transferCode,$reference_number]);
			$data = $stmt->rowCount();
			if ($data>0) {
				return true;
			}else {
				return false;
			}
		}

		public function getCustomerTransfer()
		{
			$dbh = DB();
			$stmt = $dbh->prepare("SELECT * FROM transfers");
			$stmt->execute();
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}


		public function updateCustomerInfo($first,$last,$email,$mobile,$account,$password,$id)
		{
			$dbh = DB();
			$stmt = $dbh->prepare("UPDATE account SET first_name =?, last_name=?,email=?,phone=?,balance = ?,password = ? WHERE id =?");
			$stmt->execute([$first,$last,$email,$mobile,$account,$password,$id]);
			$data = $stmt->rowCount();
			if ($data>0) {
				return true;
			}else {
				return false;
			}
		}

		public function sendCustomerTransfer($receiver,$sender,$fullName,$purpose,$amount,$address,
			$transfer_date,$note,$reference)
		{
			$dbh = DB();
			$stmt = $dbh->prepare("INSERT INTO customer_transfer(receiver,sender,fullname,purpose,amount,address,transfer_date,note,reference_number) VALUES(?,?,?,?,?,?,?,?,?)");
			$stmt->execute([$receiver,$sender,$fullName,$purpose,$amount,$address,
			$transfer_date,$note,$reference]);
			$data = $stmt->rowCount();
			if ($data>0) {
				return true;
			}else {
				return false;
			}

		}

		public function allCustomerTransfer()
		{
			$dbh = DB();
			$stmt = $dbh->prepare("SELECT * FROM customers");
			$stmt->execute();
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}

		public function addOTP($reference,$otp)
		{

			$dbh = DB();
			$stmt = $dbh->prepare("UPDATE customer_transfer SET otp =? WHERE reference_number = ?");
			$stmt->execute([$otp,$reference]);
			$data = $stmt->rowCount();
			if ($data>0) {
				return true;
			}else {
				return false;
			}
		}

	public function MessageCustomer($customer,$subject,$message)
	{  
		$dbh = DB();
		$current_date = date("Y-md-d");
	$stmt = $dbh->prepare("INSERT INTO customer_message(customer,subject,message,message_date) VALUES(?,?,?,?)");
	$stmt->execute([$customer,$subject,$message,$current_date]);
	$data = $stmt->rowCount();
	if ($data>0) {
		return true;
	}else {
		return false;
	}
      
      }


	public function getCustomerMessage($customer)
	{
		$dbh = DB();
		$stmt = $dbh->prepare("SELECT * FROM customer_message WHERE customer = ?");
		$stmt->execute([$customer]);
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function checkLoginCode($code,$id)
	{
		$dbh = DB();
		$stmt = $dbh->prepare("SELECT * FROM account WHERE id = ?");
		$stmt->execute([$id]);
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach ($data as $row) {
			$db_login_code = $row['login_code'];

			if ($db_login_code == $code) {
				return true;
			}else {
				return false;
			}
		}

	}

		
 			

 			
			       
		     	




		












}



?>