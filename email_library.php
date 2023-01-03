<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("database.php");

// this class is for all logics related to emails
class Email{

	// remove all illegal characters from an email address
	public function sanitize_email($email)
	{
		try{

			return (filter_var($email,FILTER_SANITIZE_EMAIL)) ? true : false;

		}catch(Exception $ex){
			print($ex->getMessage());
		}
	}

	public function getUserByEmail($email)
	{
		try{

			$stmt = $dbh->prepare("SELECT * FROM account WHERE email = ?");
		    $stmt->execute([$email]);
		    $data = $stmt->fetch(PDO::FETCH_ASSOC);
		    return count($data) ? true : false;

			}catch(Exception $ex){
				print($ex->getMessage());
			}

		

	}

	public function checkDuplicateEmail($email)
	{
	  
	  return $this->getUserByEmail($email);

	}


}



 ?>