<?php  
ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../library.php");
$bank = new Banking();

$first_name ="";
$last_name ="";
$first_name ="";
$maiden ="";
$birthday ="";
$email ="";
$country ="";
$address ="";
$phone ="";
$user_account = "";
$account_balance = "";
$password =  "";
$cpwd ="";

if (isset($_POST['first_name'])) {
	$first_name = $_POST['first_name'];
}

if (isset($_POST['last_name'])) {
	$last_name = $_POST['first_name'];
}

if (isset($_POST['maiden_name'])) {
	$maiden = $_POST['first_name'];
}

if (isset($_POST['birthday'])) {
	$birthday = $_POST['birthday'];
}

if (isset($_POST['email'])) {
	$email = $_POST['email'];
}

if (isset($_POST['country'])) {
	$country = $_POST['country'];
}

if (isset($_POST['address'])) {
	$address = $_POST['address'];
}

if (isset($_POST['mobile'])) {
	$phone = $_POST['mobile'];
}


if (isset($_POST['accnt_type'])) {
	$user_account = $_POST['accnt_type'];
}

if (isset($_POST['account_balance'])) {
	$account_balance = $_POST['account_balance'];
}


if (isset($_POST['password'])) {
	$password = $_POST['password'];
}


if (isset($_POST['confirm_password'])) {
	$cpwd= $_POST['first_name'];
}

$account = $bank->adminAccountCreation($account_balance,$first_name,$last_name,$maiden,$birthday,$email,$country,$address,$phone,$user_account,$password);
if ($account) {
	echo '<div class="alert alert-success" role="alert">Account created</div>';
}else {
	echo '<div class="alert alert-danger" role="alert">Failed in creating account</div>';
}




?>